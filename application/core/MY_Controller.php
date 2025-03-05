<?php
defined('BASEPATH') or exit('No direct script access allowed');

/** 
  *	@property form_validation $form_validation
  * @property User_model $User_model
  * @property input $input
  * @property session $session
  * @property email_library $email_library
  */

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
