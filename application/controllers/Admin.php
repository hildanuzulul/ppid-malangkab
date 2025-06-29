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
		$this->load->model('Dashboard_model'); // Panggil model

		$data['title'] = 'Dashboard Admin';
		$data['active_menu'] = 'dashboard';

		// Data dinamis dari database
		$data['total_user'] = $this->Dashboard_model->get_total_user();
		$data['total_permintaan'] = $this->Dashboard_model->get_total_permintaan();
		$data['total_kritik_saran'] = $this->Dashboard_model->get_total_kritik_saran();

		$bulan_nama = [
			'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		];

		$data['chart_bulan'] = json_encode($bulan_nama);
		$data['chart_jumlah'] = json_encode(array_values($this->Dashboard_model->get_permintaan_per_bulan()));



		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/footer');
		// redirect('admin_informasi_dikecualikan'); // Redirect ke halaman informasi dikecualikan sebagai contoh	)
	}
}
