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

	public function get_user_by_id($id)
	{
		$this->db->where('id', $id);
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

	public function store_otp($user_id, $otp, $expire_at)
	{
		$data = array(
			'otp' => $otp,
			'expire_at' => $expire_at
		);

		if ($data) {
			$this->db->where('email', $user_id);
			$this->db->update('registration', $data);
		} else {
			return false;
		}
	}

	public function get_otp($email)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('registration');
		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function update_user($email, $data)
	{
		if ($email && $data) {
			$this->db->where('email', $email);
			return $this->db->update('registration', $data);
		} else {
			return false;
		}
	}

	public function update($id, $data)
	{
		if ($id && $data) {
			$this->db->where('id', $id);
			return $this->db->update('registration', $data);
		} else {
			return false;
		}
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('registration');
	}
}
