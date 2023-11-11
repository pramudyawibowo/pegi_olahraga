<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapangan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user_id')) {
			$this->session->set_flashdata('notif', 'Anda harus login terlebih dahulu!');
			redirect('auth/login');
		}

		$this->load->model('lapangan_model');
		$this->load->model('kategori_model');
	}

	public function index()
	{
		$this->load->view('template', [
			'konten' => 'lapangan',
			'lapangan' => $this->lapangan_model->get_lapangan(),
			'kategori' => $this->kategori_model->get_kategori()
		]);
	}

	public function tambah()
	{
		if (!in_array($this->session->userdata('level'), ['admin', 'manager'])) {
			$this->session->set_flashdata('notif', 'Anda tidak berhak mengakses halaman tersebut!');
			redirect('home');
		}

		$this->form_validation->set_rules('kategori_id', 'kategori', 'trim|required');
		$this->form_validation->set_rules('kode', 'kode', 'trim|required');
		$this->form_validation->set_rules('name', 'Nama', 'trim|required');
		$this->form_validation->set_rules('duration', 'durasi', 'trim|required|numeric');
		$this->form_validation->set_rules('price', 'harga', 'trim|required|numeric');
		$this->form_validation->set_rules('unit', 'satuan', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			//upload file
			$config['upload_path'] = './assets/foto_cover/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2000000';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('photo')) {
				if ($this->lapangan_model->tambah($this->upload->data()) == TRUE) {
					$this->session->set_flashdata('notif', 'Tambah lapangan berhasil');
					redirect('lapangan/index');
				} else {
					$this->session->set_flashdata('notif', 'Tambah lapangan gagal');
					redirect('lapangan/index');
				}
			} else {
				$this->session->set_flashdata('notif', $this->upload->display_errors());
				redirect('lapangan/index');
			}
		} else {
			$this->session->set_flashdata('notif', validation_errors());
			redirect('lapangan/index');
		}
	}

	public function ubah()
	{
		if (!in_array($this->session->userdata('level'), ['admin', 'manager'])) {
			$this->session->set_flashdata('notif', 'Anda tidak berhak mengakses halaman tersebut!');
			redirect('home');
		}

		$this->form_validation->set_rules('kategori_id', 'kategori', 'trim|required');
		$this->form_validation->set_rules('kode', 'kode', 'trim|required');
		$this->form_validation->set_rules('name', 'Nama', 'trim|required');
		$this->form_validation->set_rules('duration', 'durasi', 'trim|required|numeric');
		$this->form_validation->set_rules('price', 'harga', 'trim|required|numeric');
		$this->form_validation->set_rules('unit', 'satuan', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			if ($this->lapangan_model->ubah() == TRUE) {
				$this->session->set_flashdata('notif', 'Ubah lapangan berhasil');
				redirect('lapangan/index');
			} else {
				$this->session->set_flashdata('notif', 'Ubah lapangan gagal');
				redirect('lapangan/index');
			}
		} else {
			$this->session->set_flashdata('notif', validation_errors());
			redirect('lapangan/index');
		}
	}

	public function hapus()
	{
		if (!in_array($this->session->userdata('level'), ['admin', 'manager'])) {
			$this->session->set_flashdata('notif', 'Anda tidak berhak mengakses halaman tersebut!');
			redirect('home');
		}

		if ($this->lapangan_model->hapus() == TRUE) {
			$this->session->set_flashdata('notif', 'Hapus lapangan Berhasil');
			redirect('lapangan/index');
		} else {
			$this->session->set_flashdata('notif', 'Hapus lapangan gagal');
			redirect('lapangan/index');
		}
	}

	public function get_data_lapangan_by_id($id)
	{
		$data = $this->lapangan_model->get_data_lapangan_by_id($id);
		echo json_encode($data);
	}
}

/* End of file lapangan.php */
/* Location: ./application/controllers/lapangan.php */
