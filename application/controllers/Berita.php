<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		// Ambil berita dari id_pd=3
		$url_berita = 'https://web-admin.malangkab.go.id/api/list-berita?id_pd=5&limit=30';
		$response_berita = file_get_contents($url_berita);
		$berita_list = json_decode($response_berita, true);

		// Ambil gambar dari id_pd=5
		$url_gambar = 'https://web-admin.malangkab.go.id/api/list-berita?id_pd=5&limit=30';
		$response_gambar = file_get_contents($url_gambar);
		$gambar_list = json_decode($response_gambar, true);

		// Buat mapping id_artikel => artikel_image_url dari id_pd=5
		$gambar_map = [];
		foreach ($gambar_list as $item) {
			if (!empty($item['artikel_image_url'])) {
				$gambar_map[$item['id_artikel']] = $item['artikel_image_url'];
			}
		}

		// Gabungkan data berita dengan gambar dari id_pd=5
		$default_image_url = 'assets/img/logo.png';
		foreach ($berita_list as &$berita) {
			$id = $berita['id_artikel'];
			if (isset($gambar_map[$id])) {
				$berita['gambar'] = 'https://web-admin.malangkab.go.id/5' . $gambar_map[$id];
			} else {
				$berita['gambar'] = $default_image_url;
			}
		}

		$data['berita'] = $berita_list;

		$this->render('berita', $data);
	}
	public function detail($id)
	{
		$url_detail = 'https://web-admin.malangkab.go.id/api/list-berita?id_pd=5&limit=30&id_artikel=' . $id;
		$response_detail = file_get_contents($url_detail);
		$detail_berita = json_decode($response_detail, true);

		if (empty($detail_berita)) {
			show_404();
		}

		$berita = null;
		foreach ($detail_berita as $item) {
			if ($item['id_artikel'] == $id) {
				$berita = $item;
				break;
			}
		}

		if ($berita === null) {
			show_404();
		}

		$default_image_url = 'assets/img/logo.png';
		if (!empty($berita['artikel_image_url'])) {
			$berita['gambar'] = 'https://web-admin.malangkab.go.id/5' . $berita['artikel_image_url'];
		} else {
			$berita['gambar'] = $default_image_url;
		}

		$data['berita'] = $berita;
		$this->render('detail', $data);
	}
}
