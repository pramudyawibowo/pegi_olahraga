<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{
		$data['konten'] = "view/dashboard";
		$this->load->view('view/index', $data);
	}
}

/* End of file dashboard_user.php */
/* Location: ./application/controllers/dashboard_user.php */
