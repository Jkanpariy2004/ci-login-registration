<?php

class ForgotPassword extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('Email_library');
	}

	public function index()
	{
		$this->load->view('ForgotPassword');
	}

	public function submit()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('forgotpassword');
		} else {
			$email = $this->input->post('email');
			$user = $this->User_model->get_user_by_email($email);

			if ($user) {
				$otp = rand(100000, 999999);
				$expire_at = date("Y-m-d H:i:s", strtotime('+10 minutes'));
				$message = "Your OTP is: $otp";
				$subject = 'Forgot Password OTP';
				$mail_name = 'Forgot Password';

				$this->User_model->store_otp($user->email, $otp, $expire_at);

				$email_sent = $this->email_library->send_welcome_email($email, $message, $subject, $mail_name);

				if ($email_sent) {
					$this->session->set_flashdata('success', 'OTP sent successfully');
					$this->session->set_userdata('forgotemail', $user->email);
					redirect(base_url('forgotpassword/otp'));
				} else {
					$this->session->set_flashdata('error', 'Failed to send the OTP');
					redirect(base_url('forgotpassword'));
				}
			} else {
				$this->session->set_flashdata('error', 'Email does not exist');
				redirect(base_url('forgotpassword'));
			}
		}
	}

	public function otp()
	{
		$this->load->view('OTP');
	}

	public function otpsubmit()
	{
		$this->form_validation->set_rules('otp', 'Otp', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('otp');
		} else {
			$email = $this->session->userdata('forgotemail');
			$otp = $this->input->post('otp');
			$user = $this->User_model->get_user_by_email($email);

			if ($user) {
				$otp_data = $this->User_model->get_otp($email);
				if ($otp_data) {
					if ($otp_data->otp == $otp) {
						$now = date("Y-m-d H:i:s");
						if ($now <= $otp_data->expire_at) {
							$this->session->set_flashdata('success', 'OTP verified successfully');
							redirect(base_url('forgotpassword/resetpassword'));
						} else {
							$otp = rand(100000, 999999);
							$expire_at = date("Y-m-d H:i:s", strtotime('+10 minutes'));
							$message = "Your OTP is: $otp";
							$subject = 'Forgot Password OTP';
							$mail_name = 'Forgot Password';

							$this->User_model->store_otp($user->email, $otp, $expire_at);

							$email_sent = $this->email_library->send_welcome_email($email, $message, $subject, $mail_name);

							if ($email_sent) {
								$this->session->set_flashdata('success', 'OTP has been expired. New OTP sent successfully');
								redirect(base_url('forgotpassword/otp'));
							} else {
								$this->session->set_flashdata('error', 'Failed to send the OTP');
								redirect(base_url('forgotpassword/otp'));
							}
						}
					} else {
						$this->session->set_flashdata('error', 'Invalid OTP');
						redirect(base_url('forgotpassword/otp'));
					}
				} else {
					$this->session->set_flashdata('error', 'OTP not found');
					redirect(base_url('forgotpassword/otp'));
				}
			} else {
				$this->session->set_flashdata('error', 'Email does not exist');
				redirect(base_url('forgotpassword/otp'));
			}
		}
	}

	public function resetpassword()
	{
		$this->load->view('ResetPassword');
	}

	public function resetpasswordsubmit()
	{
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('resetpassword');
		} else {
			$email = $this->session->userdata('forgotemail');
			$user = $this->User_model->get_user_by_email($email);

			if ($user) {
				$password = $this->input->post('password');
				$confirm_password = $this->input->post('confirm_password');

				if ($password == $confirm_password) {
					$data = array(
						'password' => password_hash($password, PASSWORD_BCRYPT),
						'otp' => null,
						'expire_at' => null
					);

					$update = $this->User_model->update_user($email, $data);

					if ($update) {
						$this->session->set_flashdata('success', 'Password reset successfully');
						redirect(base_url('/'));;
					} else {
						$this->session->set_flashdata('error', 'Failed to reset the password');
						redirect(base_url('forgotpassword/resetpassword'));
					}
				} else {
					$this->session->set_flashdata('error', 'Password and Confirm Password do not match');
					redirect(base_url('forgotpassword/resetpassword'));
				}
			} else {
				$this->session->set_flashdata('error', 'Email does not exist');
				redirect(base_url('forgotpassword/resetpassword'));
			}
		}
	}
}
