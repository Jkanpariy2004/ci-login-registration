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

	public function send_welcome_email($to_email, $fullname)
	{
		$this->CI->email->from('jenish.rising@gmail.com', 'New Website');
		$this->CI->email->to($to_email);
		$this->CI->email->subject('Welcome to Our Website');

		$message = "
            <html>
            <head><title>Welcome to Our Website</title></head>
            <body>
                <h2>Dear {$fullname},</h2>
                <p>Thank you for registering with us. We are excited to have you on board!</p>
                <p>Best Regards,<br>Your Website Team</p>
            </body>
            </html>
        ";

		$this->CI->email->message($message);
		$this->CI->email->set_mailtype("html");

		return $this->CI->email->send();
	}
}
