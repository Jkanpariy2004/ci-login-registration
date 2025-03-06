<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property MailTemplete_model $MailTemplete_model
 */

class MailTemplete extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('MailTemplete_model');
	}

	public function index()
	{
		$this->load->view('Layouts/Header');
		$this->load->view('MailTemplete/Index');
		$this->load->view('Layouts/Footer');
	}

	public function get()
	{
		$Templete = $this->MailTemplete_model->get_all_mail_templetes();

		echo json_encode(["data" => $Templete]);
	}

	public function add()
	{
		$this->load->view('Layouts/Header');
		$this->load->view('MailTemplete/Add');
		$this->load->view('Layouts/Footer');
	}

	public function submit()
	{
		$this->form_validation->set_rules('key', 'Key', 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('subject', 'Subject', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Layouts/Header');
			$this->load->view('MailTemplete/Add');
			$this->load->view('Layouts/Footer');
		} else {
			$data = array(
				'key' => $this->input->post('key'),
				'title' => $this->input->post('title'),
				'subject' => $this->input->post('subject'),
				'content' => $this->input->post('content'),
			);

			$insert = $this->MailTemplete_model->insert_templete($data);

			if ($insert) {
				$this->session->set_flashdata('success', 'Mail Templete Created Successfully.');
				redirect(base_url('mailtemplete'));
			} else {
				$this->session->set_flashdata('error', 'error to mail templete create.');
				redirect(base_url('mailtemplete/add'));
			}
		}
	}

	public function edit($id)
	{
		if (empty($id)) {
			$this->session->set_flashdata('error', 'Templete Not Found.');
			redirect(base_url('mailtemplete'));
		}

		$data['templete'] = $this->MailTemplete_model->get_template_by_id($id);
		$this->load->view('Layouts/Header');
		$this->load->view('MailTemplete/Edit', $data);
		$this->load->view('Layouts/Footer');
	}

	public function update($id)
	{
		if (empty($id)) {
			$this->session->set_flashdata('error', 'Templete Not Found.');
			redirect(base_url('mailtemplete'));
		}

		$this->form_validation->set_rules('key', 'Key', 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('subject', 'Subject', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Layouts/Header');
			$this->load->view('MailTemplete/Add');
			$this->load->view('Layouts/Footer');
		} else {
			$data = array(
				'key' => $this->input->post('key'),
				'title' => $this->input->post('title'),
				'subject' => $this->input->post('subject'),
				'content' => $this->input->post('content'),
			);

			$insert = $this->MailTemplete_model->update_templete($id, $data);

			if ($insert) {
				$this->session->set_flashdata('success', 'Mail Templete Updated Successfully.');
				redirect(base_url('mailtemplete'));
			} else {
				$this->session->set_flashdata('error', 'error to mail templete update.');
				redirect(base_url('mailtemplete/add'));
			}
		}
	}

	public function delete($id)
	{
		if (empty($id)) {
			$this->session->set_flashdata('error', 'Templete Not Found.');
			redirect(base_url('mailtemplete'));
		}

		$Templete = $this->MailTemplete_model->get_template_by_id($id);

		if ($Templete) {
			$delete = $this->MailTemplete_model->delete($id);

			if ($delete) {
				$this->session->set_flashdata('success', 'Mail Templete Deleted Successfully.');
				redirect(base_url('mailtemplete'));
			} else {
				$this->session->set_flashdata('error', 'Error To delete Templete.');
				redirect(base_url('mailtemplete'));
			}
		} else {
			$this->session->set_flashdata('error', 'Templete Not Found.');
			redirect(base_url('mailtemplete'));
		}
	}
}
