<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
	}

	public function index()
	{
		$this->load->view('Dashboard');
	}

	public function search_users()
	{
		$this->load->model('User_model');
		$search = $this->input->get('search');

		$users = $this->User_model->search_users($search);

		echo json_encode(["data" => $users]);
	}

	public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
