<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Level extends CI_Controller
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
		$this->load->model('level_model');
	}

	public function index()
	{
		$data['konten'] = 'level';
		$data['level'] = $this->level_model->get_level();
		$this->load->view('template', $data);
	}
	public function tambah()
	{
		$this->form_validation->set_rules('nama_level', 'Nama Level', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			if ($this->level_model->tambah() == TRUE) {
				$this->session->set_flashdata('notif', 'Tambah level berhasil');
				redirect('level/index');
			} else {
				$this->session->set_flashdata('notif', 'Tambah level gagal');
				redirect('level/index');
			}
		} else {
			$this->session->set_flashdata('notif', validation_errors());
			redirect('level/index');
		}
	}
	public function ubah()
	{
		$this->form_validation->set_rules('ubah_nama_level', 'nama_level', 'trim|required');


		if ($this->form_validation->run() == TRUE) {
			if ($this->level_model->ubah() == TRUE) {
				$this->session->set_flashdata('notif', 'Ubah Level berhasil');
				redirect('level/index');
			} else {
				$this->session->set_flashdata('notif', 'Ubah Level gagal');
				redirect('level/index');
			}
		} else {
			$this->session->set_flashdata('notif', validation_errors());
			redirect('level/index');
		}
	}

	public function hapus()
	{
		if ($this->level_model->hapus() == TRUE) {
			$this->session->set_flashdata('notif', 'Hapus Level Berhasil');
			redirect('level/index');
		} else {
			$this->session->set_flashdata('notif', 'Hapus Level gagal');
			redirect('level/index');
		}
	}

	public function get_data_level_by_id($id)
	{
		$data = $this->level_model->get_data_level_by_id($id);
		echo json_encode($data);
	}
}
