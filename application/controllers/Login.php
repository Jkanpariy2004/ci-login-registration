<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['form', 'url']);
		$this->load->model('User_model');
	}

	public function index()
	{
		$this->load->view('Login');
	}

	public function submit()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('Login');
		} else {
			$email    = $this->input->post('email');
			$password = $this->input->post('password');

			$user = $this->User_model->get_user_by_email($email);
			if ($user && password_verify($password, $user->password)) {
				$this->session->set_userdata('user', $user);
				if ($this->session->userdata('user')) {
					redirect(base_url('dashboard'));
				} else {
					$this->session->set_flashdata('error', 'Session issue occurred');
					redirect(base_url('login'));
				}
			}
		}
	}
}
