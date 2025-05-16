<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$url_berita = 'https://web-admin.malangkab.go.id/api/list-berita?id_pd=3&limit=30';
		$response_berita = file_get_contents($url_berita);
		$berita_list = json_decode($response_berita, true);

		$default_image_url = 'assets/img/logo.png';
		foreach ($berita_list as &$berita) {
			$berita['gambar'] = $default_image_url;
		}

		$data['berita'] = $berita_list;

		$this->load->view('header');
		$this->load->view('berita', $data);
		$this->load->view('footer');
	}

	public function detail($id)
	{
		$url_detail = 'https://web-admin.malangkab.go.id/api/list-berita?id_pd=3&limit=30&id_artikel=' . $id;
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

		$data['berita'] = $berita;
		$this->load->view('header');
		$this->load->view('detail', $data);  // Pastikan Anda punya file view 'detail.php'
		$this->load->view('footer');
	}
}
