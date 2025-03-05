<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('Email_library');
		$this->load->helper('upload_helper');
	}

	public function index()
	{
		$this->load->view('Registration');
	}

	public function submit()
	{
		$this->form_validation->set_rules('fullname', 'Full Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[registration.email]');
		$this->form_validation->set_rules('phone_no', 'Phone No', 'required');
		$this->form_validation->set_rules('dob', 'Date Of Birth', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

		if (empty($_FILES['profile_image']['name'])) {
			$this->form_validation->set_rules('profile_image', 'Profile Image', 'required');
		}

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Registration');
		} else {
			$upload_result = upload_image('profile_image', './uploads/profile/', 'jpg|jpeg|png', 2048);

			if (isset($upload_result['error'])) {
				$this->session->set_flashdata('error', $upload_result['error']);
				redirect(base_url('registration'));
			} else {
				$upload_data = $upload_result['upload_data'];
				$profile_image = $upload_data['file_name'];
			}

			$data = array(
				'fullname' => $this->input->post('fullname'),
				'email' => $this->input->post('email'),
				'phone_no' => $this->input->post('phone_no'),
				'dob' => $this->input->post('dob'),
				'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
				'profile_image' => isset($profile_image) ? $profile_image : null,
			);

			$insert = $this->User_model->insert_user($data);

			if ($insert) {
				$subject = 'Welcome to Our Website';
				$message = "
                    <html>
                    <head>
                        <title>Welcome to Our Website</title>
                    </head>
                    <body>
                        <h2>Dear {$data['fullname']},</h2>
                        <p>Thank you for registering with us. We are excited to have you on board!</p>
                        <p>Best Regards,<br>Your Website Team</p>
                    </body>
                    </html>
                ";
				$mail_name = 'Welcome Mail';

				$email_sent = $this->email_library->send_welcome_email($data['email'], $message, $subject, $mail_name);

				if ($email_sent) {
					$this->session->set_flashdata('success', 'Registration successful. A welcome email has been sent.');
				} else {
					$this->session->set_flashdata('warning', 'Registration successful, but failed to send the welcome email.');
				}

				redirect('/');
			} else {
				$this->session->set_flashdata('error', 'Registration failed! Please try again.');
				redirect(base_url('registration'));
			}
		}
	}
}
