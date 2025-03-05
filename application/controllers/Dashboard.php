<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	public function index()
	{
		$this->load->view('Layouts/Header');
		$this->load->view('Dashboard');
		$this->load->view('Layouts/Footer');
	}

	public function search_users()
	{
		$this->load->model('User_model');
		$search = $this->input->get('search');

		$users = $this->User_model->search_users($search);

		echo json_encode(["data" => $users]);
	}
}
