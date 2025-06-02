<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Situs_pd extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Situs_model');
		$this->load->helper('url');
	}

	public function index($kategori = 'badan')
	{
		$allowed = ['badan', 'bagian', 'desa', 'dinas', 'kecamatan', 'kelurahan', 'lembaga', 'malangkab', 'organisasi', 'ppid', 'upt'];

		if (!in_array($kategori, $allowed)) {
			show_404();
		}

		$data['kategori'] = $kategori;
		$data['menu_kategori'] = $allowed;
		$data['list_pd'] = $this->Situs_model->get_by_kategori($kategori);
		$this->set_sidebar_berita($data);
		$this->render('situs_pd', $data);
	}
}
