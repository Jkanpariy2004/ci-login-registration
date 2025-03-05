<?php

class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->checkAuth();
	}

	private function checkAuth()
	{
		if (!$this->session->userdata('user')) {
			redirect('/');
		}
	}
}
