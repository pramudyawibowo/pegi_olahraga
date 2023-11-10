<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
		if (!$this->session->userdata('user_id')) {
			$this->session->set_flashdata('notif', 'Anda harus login terlebih dahulu!');
			redirect('auth/login');
		}
		$this->load->model('transaksi_model');
		$this->load->model('lapangan_model');
	}

	public function index()
	{
		$this->load->view('template', [
			'konten' => 'transaksi',
			'lapangan'	=> $this->lapangan_model->get_lapangan(),
			'transaksi' => $this->transaksi_model->get_transaksi(),
		]);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('lapangan_id', 'lapangan', 'trim|required');
		$this->form_validation->set_rules('renter_name', 'Nama Penyewa', 'trim|required');
		$this->form_validation->set_rules('duration', 'Durasi', 'trim|required');
		$this->form_validation->set_rules('waktu', 'Waktu Sewa', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('notif', validation_errors());
		} else {
			if ($this->transaksi_model->tambah() == FALSE) {
				$this->session->set_flashdata('notif', 'Tambah transaksi gagal');
			} else {
				$this->session->set_flashdata('notif', 'Tambah transaksi berhasil');
			}
		}
		redirect('transaksi/index');
	}

	public function batalkan()
	{
		if ($this->transaksi_model->update_status(4) == TRUE) {
			$this->session->set_flashdata('notif', 'Batalkan transaksi Berhasil');
		} else {
			$this->session->set_flashdata('notif', 'Batalkan transaksi gagal');
		}
		redirect('transaksi/index');
	}

	public function bayar()
	{
		if (!in_array($this->session->userdata('level'), ['admin', 'manager'])) {
			$this->session->set_flashdata('notif', 'Anda tidak berhak mengakses halaman tersebut!');
			redirect('transaksi/index');
		}

		if ($this->transaksi_model->update_status(2) == TRUE) {
			$this->session->set_flashdata('notif', 'Konfirmasi pembayaran transaksi Berhasil');
		} else {
			$this->session->set_flashdata('notif', 'Konfirmasi pembayaran transaksi gagal');
		}
		redirect('transaksi/index');
	}

	public function hapus()
	{
		if ($this->transaksi_model->hapus() == TRUE) {
			$this->session->set_flashdata('notif', 'Hapus transaksi Berhasil');
		} else {
			$this->session->set_flashdata('notif', 'Hapus transaksi gagal');
		}
		redirect('transaksi/index');
	}
}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */
