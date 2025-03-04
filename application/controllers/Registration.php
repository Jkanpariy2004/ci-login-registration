<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	public function index()
	{
		$this->load->view('Registration');
	}

	public function submit()
	{
		$this->form_validation->set_rules('fullname', 'Full Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone_no', 'Phone No', 'required');
		$this->form_validation->set_rules('dob', 'Date Of Birth', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Registration');
		} else {
			$data = array(
				'fullname' => $this->input->post('fullname'),
				'email' => $this->input->post('email'),
				'phone_no' => $this->input->post('phone_no'),
				'dob' => $this->input->post('dob'),
				'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
			);

			$insert = $this->User_model->insert_user($data);

			if ($insert) {
				$this->load->library('Email_library');
				$email_sent = $this->email_library->send_welcome_email($data['email'], $data['fullname']);

				if ($email_sent) {
					$this->session->set_flashdata('success', 'Registration successful. A welcome email has been sent.');
				} else {
					$this->session->set_flashdata('warning', 'Registration successful, but failed to send the welcome email.');
				}

				redirect('login');
			} else {
				$this->session->set_flashdata('error', 'Registration failed');
				$this->load->view('Registration');
			}
		}
	}
}
