<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user_id')) {
			$this->session->set_flashdata('notif', 'Anda harus login terlebih dahulu!');
			redirect('auth/login');
		}

		if (!in_array($this->session->userdata('level'), ['admin', 'manager'])) {
			$this->session->set_flashdata('notif', 'Anda tidak berhak mengakses halaman tersebut!');
			redirect('home');
		}

		$this->load->model('kategori_model');
	}

	public function index()
	{
		$this->load->view('template', [
			'konten' => 'kategori',
			'kategori' => $this->kategori_model->get_kategori()
		]);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('name', 'Nama Kategori', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			if ($this->kategori_model->tambah() == TRUE) {
				$this->session->set_flashdata('notif', 'Tambah kategori berhasil');
				redirect('kategori/index');
			} else {
				$this->session->set_flashdata('notif', 'Tambah kategori gagal');
				redirect('kategori/index');
			}
		} else {
			$this->session->set_flashdata('notif', validation_errors());
			redirect('kategori/index');
		}
	}

	public function ubah()
	{
		$this->form_validation->set_rules('name', 'Nama Kategori', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			if ($this->kategori_model->ubah() == TRUE) {
				$this->session->set_flashdata('notif', 'Ubah kategori berhasil');
				redirect('kategori/index');
			} else {
				$this->session->set_flashdata('notif', 'Ubah kategori gagal');
				redirect('kategori/index');
			}
		} else {
			$this->session->set_flashdata('notif', validation_errors());
			redirect('kategori/index');
		}
	}

	public function hapus()
	{
		if ($this->kategori_model->hapus() == TRUE) {
			$this->session->set_flashdata('notif', 'Hapus kategori berhasil');
			redirect('kategori/index');
		} else {
			$this->session->set_flashdata('notif', 'Hapus kategori gagal');
			redirect('kategori/index');
		}
	}

	public function get_data_kategori_by_id($id)
	{
		$data = $this->kategori_model->get_data_kategori_by_id($id);
		echo json_encode($data);
	}

}

/* End of file kategori.php */
/* Location: ./application/controllers/kategori.php */
