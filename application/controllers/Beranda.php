<?php

class Beranda extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$url_berita = 'https://web-admin.malangkab.go.id/api/list-berita?id_pd=5&limit=4';
		$response_berita = @file_get_contents($url_berita);
		$berita_list = $response_berita ? json_decode($response_berita, true) : [];

		$default_image_url = base_url('assets/img/logo.png');
		foreach ($berita_list as &$berita) {
			$berita['gambar'] = !empty($berita['artikel_image_url'])
				? 'https://web-admin.malangkab.go.id/5' . $berita['artikel_image_url']
				: $default_image_url;
		}

		$data['berita'] = $berita_list;

		$this->set_sidebar_berita($data);

		$this->render('beranda', $data);
	}
}
