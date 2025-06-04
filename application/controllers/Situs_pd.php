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

	public function index($slug = 'badan')
	{
		$slug_to_label = [
			'badan' => 'badan',
			'bagian' => 'bagian',
			'desa' => 'desa',
			'dinas' => 'dinas',
			'kecamatan' => 'kecamatan',
			'kelurahan' => 'kelurahan',
			'lembaga' => 'lembaga',
			'malangkab' => 'malangkab',
			'organisasi' => 'organisasi',
			'ppid' => 'ppid',
			'upt_puskesmas' => 'upt puskesmas'
		];

		if (!array_key_exists($slug, $slug_to_label)) {
			show_404();
		}

		$kategori = $slug_to_label[$slug];

		$data['kategori'] = $kategori;
		$data['menu_kategori'] = $slug_to_label;
		$data['list_pd'] = $this->Situs_model->get_by_kategori($kategori);
		$this->set_sidebar_berita($data);
		$this->render('situs_pd', $data);
	}
}
