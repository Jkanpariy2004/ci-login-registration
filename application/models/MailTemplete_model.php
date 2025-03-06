<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MailTemplete_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_all_mail_templetes()
	{
		$query = $this->db->get('email_templete');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function insert_templete($data)
	{
		if ($data) {
			return $this->db->insert('email_templete', $data);
		} else {
			return false;
		}
	}

	public function get_email_template($key)
	{
		$this->db->where('key', $key);
		$query = $this->db->get('email_templete');

		if ($query->num_rows() > 0) {
			return $query->row();
		}

		return false;
	}

	public function get_template_by_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('email_templete');
		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function update_templete($id, $data)
	{
		if ($id && $data) {
			$this->db->where('id', $id);
			return $this->db->update('email_templete', $data);
		} else {
			return false;
		}
	}

	public function delete($id)
	{
		if ($id) {
			$query = $this->db->where('id', $id);
			if ($query) {
				return $this->db->delete('email_templete');
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}
