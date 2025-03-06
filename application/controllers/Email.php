<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property config $config
 */

class Email extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function credential()
	{
		$this->config->load('email', TRUE);
		$email_config = $this->config->item('email');

		$this->load->view('Layouts/Header');
		$this->load->view('EmailCredential', ['email_config' => $email_config]);
		$this->load->view('Layouts/Footer');
	}

	public function submit()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('smtp_host', 'SMTP Mail Host', 'required');
		$this->form_validation->set_rules('smtp_user', 'SMTP Mail Username', 'required');
		$this->form_validation->set_rules('smtp_pass', 'SMTP Mail Password', 'required');
		$this->form_validation->set_rules('smtp_port', 'SMTP Mail Port', 'required|integer');
		$this->form_validation->set_rules('smtp_crypto', 'SMTP Mail Crypto', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Layouts/Header');
			$this->load->view('EmailCredential');
			$this->load->view('Layouts/Footer');
		} else {
			$smtp_data = array(
				'protocol'    => 'smtp',
				'smtp_host'   => $this->input->post('smtp_host', TRUE),
				'smtp_user'   => $this->input->post('smtp_user', TRUE),
				'smtp_pass'   => $this->input->post('smtp_pass', TRUE),
				'smtp_port'   => $this->input->post('smtp_port', TRUE),
				'smtp_crypto' => $this->input->post('smtp_crypto', TRUE),
				'mailtype'    => 'html',
				'charset'     => 'utf-8',
				'wordwrap'    => TRUE,
				'newline'     => "\r\n"
			);

			if ($this->update_email_config($smtp_data)) {
				$this->session->set_flashdata('success', 'SMTP settings updated successfully!');
			} else {
				$this->session->set_flashdata('error', 'Failed to update SMTP settings.');
			}

			redirect('email/credential');
		}
	}

	private function update_email_config($data)
	{
		$config_path = APPPATH . 'config/email.php';

		$ordered_keys = [
			'protocol',
			'smtp_host',
			'smtp_user',
			'smtp_pass',
			'smtp_port',
			'smtp_crypto',
			'mailtype',
			'charset',
			'wordwrap',
			'newline'
		];

		$default_config = array(
			'protocol'    => 'smtp',
			'smtp_host'   => 'smtp.example.com',
			'smtp_user'   => 'user@example.com',
			'smtp_pass'   => 'securepassword',
			'smtp_port'   => '587',
			'smtp_crypto' => 'tls',
			'mailtype'    => 'html',
			'charset'     => 'utf-8',
			'wordwrap'    => TRUE,
			'newline'     => "\r\n"
		);

		$final_data = array_merge($default_config, $data);

		$config_content = "<?php\n";
		$config_content .= "\$config = array(\n";

		foreach ($ordered_keys as $key) {
			if (isset($final_data[$key])) {
				if (is_bool($final_data[$key])) {
					$config_content .= "    '$key' => " . ($final_data[$key] ? 'TRUE' : 'FALSE') . ",\n";
				} elseif ($key === 'newline') {
					$config_content .= "    '$key' => \"\\r\\n\",\n";
				} else {
					$config_content .= "    '$key' => '" . addslashes($final_data[$key]) . "',\n";
				}
			}
		}

		$config_content .= ");\n";

		return file_put_contents($config_path, $config_content) !== false;
	}
}
