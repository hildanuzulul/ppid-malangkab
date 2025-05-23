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
		// Ambil data berita terbatas, misal 5 berita terbaru
		$url_berita = 'https://web-admin.malangkab.go.id/api/list-berita?id_pd=3&limit=4';
		$response_berita = file_get_contents($url_berita);
		$berita_list = json_decode($response_berita, true);

		// Jika ingin pasang gambar default
		$default_image_url = 'assets/img/logo.png';
		foreach ($berita_list as &$berita) {
			$berita['gambar'] = $default_image_url;
		}

		$data['berita'] = $berita_list;

		// Load view dan kirim data berita
		$this->render('beranda', $data);
	}
}
