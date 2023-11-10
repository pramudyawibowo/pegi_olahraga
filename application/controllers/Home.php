<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// check if user is logged in
		if (!$this->session->userdata('user_id')) {
			$this->session->set_flashdata('notif', 'Anda harus login terlebih dahulu!');
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data['konten'] = 'home';
		$this->load->view('template', $data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
