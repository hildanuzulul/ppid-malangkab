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
		// Ambil 4 berita terbaru untuk konten utama
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

		// === Sidebar: ambil 4 berita juga ===
		$sidebar_url = 'https://web-admin.malangkab.go.id/api/list-berita?id_pd=5&limit=4';
		$response_sidebar = @file_get_contents($sidebar_url);
		$sidebar_berita = $response_sidebar ? json_decode($response_sidebar, true) : [];

		foreach ($sidebar_berita as &$item) {
			$item['gambar'] = !empty($item['artikel_image_url'])
				? 'https://web-admin.malangkab.go.id/5' . $item['artikel_image_url']
				: $default_image_url;
		}

		$data['sidebar_berita'] = $sidebar_berita;

		// Render view
		$this->render('beranda', $data);
	}
}
