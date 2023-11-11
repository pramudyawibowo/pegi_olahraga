<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user_id')) {
			$this->session->set_flashdata('notif', 'Anda harus login terlebih dahulu!');
			redirect('auth/login');
		}

		if (!in_array($this->session->userdata('level'), ['admin'])) {
			$this->session->set_flashdata('notif', 'Anda tidak berhak mengakses halaman tersebut!');
			redirect('home');
		}
		$this->load->model('user_model');
		$this->load->model('level_model');
	}

	public function index()
	{
		$data['konten'] = 'user';
		$data['user'] = $this->user_model->get_user();
		$data['level'] = $this->level_model->get_level();
		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('name', 'Nama', 'trim|required');
		$this->form_validation->set_rules('level_id', 'Level', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			if ($this->user_model->tambah() == TRUE) {
				$this->session->set_flashdata('notif', 'Tambah user berhasil');
				redirect('user/index');
			} else {
				$this->session->set_flashdata('notif', 'Tambah user gagal');
				redirect('user/index');
			}
		} else {
			$this->session->set_flashdata('notif', validation_errors());
			redirect('user/index');
		}
	}

	public function get_data_user_by_id($id)
	{
		$data = $this->user_model->get_data_user_by_id($id);
		echo json_encode($data);
	}

	public function ubah()
	{
		if ($this->user_model->ubah() == TRUE) {
			$this->session->set_flashdata('notif', 'Ubah user berhasil');
		} else {
			$this->session->set_flashdata('notif', 'Ubah user gagal');
		}
		redirect('user/index');
	}
}
        
    /* End of file  user.php */
