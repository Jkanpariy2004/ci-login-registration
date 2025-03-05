<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email_library
{

	protected $CI;

	public function __construct()
	{
		$this->CI = &get_instance();
		$this->CI->load->library('email');
	}

	public function send_welcome_email($to_email, $message, $subject,$mail_name)
	{
		$this->CI->email->from('jenish.rising@gmail.com', $mail_name);
		$this->CI->email->to($to_email);
		$this->CI->email->subject($subject);

		$this->CI->email->message($message);
		$this->CI->email->set_mailtype("html");

		return $this->CI->email->send();
	}
}
