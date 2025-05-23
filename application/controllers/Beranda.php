<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		// Ambil berita dan gambar dari id_pd=5 (limit 4 untuk beranda)
		$url_api = 'https://web-admin.malangkab.go.id/api/list-berita?id_pd=5&limit=4';
		$response = file_get_contents($url_api);
		$berita_list = json_decode($response, true);

		// Siapkan mapping id_artikel => artikel_image_url
		$gambar_map = [];
		if (is_array($berita_list)) {
			foreach ($berita_list as $item) {
				if (!empty($item['artikel_image_url'])) {
					$gambar_map[$item['id_artikel']] = $item['artikel_image_url'];
				}
			}
		}

		// Tambahkan gambar ke tiap berita
		$default_image_url = 'assets/img/logo.png';
		foreach ($berita_list as &$berita) {
			$id = $berita['id_artikel'];
			if (isset($gambar_map[$id])) {
				$berita['gambar'] = 'https://web-admin.malangkab.go.id/5' . $gambar_map[$id];
			} else {
				$berita['gambar'] = base_url($default_image_url);
			}
		}

		$data['berita'] = $berita_list;
		$this->render('beranda', $data);
	}
}
