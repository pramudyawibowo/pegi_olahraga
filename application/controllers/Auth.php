<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
	}

	public function index()
	{
		if ($this->session->userdata('user_id')) {
			redirect('home');
		}
		show_404();
	}

	public function login()
	{
		if ($this->session->userdata('user_id')) {
			redirect('home');
		}
		$this->load->library('form_validation');

		$rules = $this->auth_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			return $this->load->view('login');
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if ($this->auth_model->login($username, $password)) {
			redirect('home');
		} else {
			$this->session->set_flashdata('notif', 'Login Gagal, pastikan username dan password benar!');
		}

		$this->load->view('login');
	}

	public function logout()
	{
		$this->auth_model->logout();
		redirect(site_url());
	}

	public function register()
	{
	}
}

/* End of file  Auth.php */
