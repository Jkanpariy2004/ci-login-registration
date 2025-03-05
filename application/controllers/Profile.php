<?php

/** 
  *	@property form_validation $form_validation
  * @property User_model $User_model
  * @property input $input
  * @property session $session
  * @property email_library $email_library
  */

class Profile extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->helper('upload_helper');
	}

	public function index()
	{
		$user = $this->session->userdata('user');

		$data['user'] = $this->User_model->get_user_by_id($user->id);

		$this->load->view('Layouts/Header');
		$this->load->view('Profile', $data);
		$this->load->view('Layouts/Footer');
	}

	public function edit()
	{
		$user = $this->session->userdata('user');

		$data['user'] = $this->User_model->get_user_by_id($user->id);

		$this->load->view('Layouts/Header');
		$this->load->view('EditProfile', $data);
		$this->load->view('Layouts/Footer');
	}

	public function update($id)
	{
		$this->form_validation->set_rules('fullname', 'Full Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone_no', 'Phone No', 'required');
		$this->form_validation->set_rules('dob', 'Date Of Birth', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->edit();
		} else {
			$data = [
				'fullname' => $this->input->post('fullname'),
				'email' => $this->input->post('email'),
				'phone_no' => $this->input->post('phone_no'),
				'dob' => $this->input->post('dob'),
			];

			if ($_FILES['profile_image']['name']) {
				$upload_result = upload_image('profile_image', './uploads/profile/', 'jpg|jpeg|png', 2048);

				if (isset($upload_result['error'])) {
					$this->session->set_flashdata('error', $upload_result['error']);
					$this->edit();
					return;
				} else {
					$user = $this->User_model->get_user_by_id($id);
					if (file_exists('./uploads/profile/' . basename($user->profile_image))) {
						unlink('./uploads/profile/' . basename($user->profile_image));
					}

					$upload_data = $upload_result['upload_data'];
					$profile_image = $upload_data['file_name'];

					$data['profile_image'] = $profile_image;
				}
			}

			$this->User_model->update($id, $data);

			$this->session->set_flashdata('success', 'Profile updated successfully');
			redirect(base_url('profile'));
		}
	}


	public function delete($id)
	{
		if (empty($id)) {
			$this->session->set_flashdata('error', 'Please provide a valid id');
			redirect(base_url('dashboard/profile'));
		}

		$user = $this->User_model->get_user_by_id($id);

		if ($user) {
			if (file_exists('./uploads/profile/' . basename($user->profile_image))) {
				unlink('./uploads/profile/' . basename($user->profile_image));
			}

			$this->User_model->delete($id);

			$this->session->set_flashdata('success', 'User deleted successfully');
			redirect(base_url('/'));;
		} else {
			$this->session->set_flashdata('error', 'User not found');
			redirect(base_url('dashboard/profile'));
		}
	}
}
