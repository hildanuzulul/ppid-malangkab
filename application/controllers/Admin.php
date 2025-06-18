<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		// Cek login
		if (
			!$this->session->userdata('nama_user') ||
			$this->session->userdata('role') !== 'admin'
		) {
			redirect('login'); // Atau redirect ke halaman lain seperti unauthorized
		}
	}

	public function index()
	{
		$data['title'] = 'Dashboard Admin';
		$data['active_menu'] = 'dashboard';

		// $this->load->view('admin/header', $data);
		// $this->load->view('admin/sidebar', $data);
		// $this->load->view('admin/dashboard', $data);
		// $this->load->view('admin/footer');
		redirect('admin_informasi_dikecualikan'); // Redirect ke halaman informasi dikecualikan sebagai contoh	)
	}
}
