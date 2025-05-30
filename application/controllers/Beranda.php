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
		// Ambil data berita terbatas (misal 4 berita terbaru)
		$url_berita = 'https://web-admin.malangkab.go.id/api/list-berita?id_pd=5&limit=4';
		$response_berita = @file_get_contents($url_berita);

		if ($response_berita === false) {
			log_message('error', 'Gagal ambil berita dari API dengan file_get_contents.');
			$data['berita'] = [];
			$this->render('beranda', $data);
			return;
		}

		$berita_list = json_decode($response_berita, true);

		// Tambahkan gambar default jika tidak tersedia
		$default_image_url = 'assets/img/logo.png';
		foreach ($berita_list as &$berita) {
			$berita['gambar'] = !empty($berita['artikel_image_url'])
				? 'https://web-admin.malangkab.go.id/5' . $berita['artikel_image_url']
				: $default_image_url;
		}

		$data['berita'] = $berita_list;

		$this->render('beranda', $data);
	}
}
