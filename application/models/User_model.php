<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insert_user($data)
	{
		if ($data) {
			return $this->db->insert('registration', $data);
		} else {
			return false;
		}
	}

	public function get_user_by_email($email)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('registration');
		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function get_all_users()
	{
		$query = $this->db->get('registration');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function search_users($search = "")
	{
		if (!empty($search)) {
			$this->db->like('fullname', $search);
			$this->db->or_like('email', $search);
			$this->db->or_like('dob', $search);
		}
		$query = $this->db->get('registration');
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
}
