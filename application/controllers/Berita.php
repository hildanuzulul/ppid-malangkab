<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('pagination');
	}

	public function index()
	{
		$limit = $this->input->get('limit') ? (int)$this->input->get('limit') : 10;
		$offset = $this->input->get('offset') ? (int)$this->input->get('offset') : 0;

		$cache_file = APPPATH . 'cache/berita_all.json';

		// Cek cache berita
		if (file_exists($cache_file) && time() - filemtime($cache_file) < 3600) {
			$berita_all = json_decode(file_get_contents($cache_file), true);
		} else {
			$url = 'https://web-admin.malangkab.go.id/api/list-berita?id_pd=5';
			$response = @file_get_contents($url);
			$berita_all = $response ? json_decode($response, true) : [];
			file_put_contents($cache_file, json_encode($berita_all));
		}

		$total_rows = count($berita_all);
		$berita_page = array_slice($berita_all, $offset, $limit);

		$default_image_url = base_url('assets/img/logo.png');
		foreach ($berita_page as &$berita) {
			$berita['gambar'] = !empty($berita['artikel_image_url'])
				? 'https://web-admin.malangkab.go.id/5' . $berita['artikel_image_url']
				: $default_image_url;
		}

		// Konfigurasi pagination
		$config['base_url'] = base_url('berita/index');
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $limit;
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'offset';
		$config['full_tag_open'] = '';
		$config['full_tag_close'] = '';
		$config['cur_tag_open'] = '<a href="#" class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['next_link'] = FALSE;
		$config['prev_link'] = FALSE;

		$this->pagination->initialize($config);

		// Sidebar Berita Terbaru (4 item)
		$sidebar_url = 'https://web-admin.malangkab.go.id/api/list-berita?id_pd=5&limit=4';
		$response_sidebar = @file_get_contents($sidebar_url);
		$sidebar_berita = $response_sidebar ? json_decode($response_sidebar, true) : [];

		foreach ($sidebar_berita as &$b) {
			$b['gambar'] = !empty($b['artikel_image_url'])
				? 'https://web-admin.malangkab.go.id/5' . $b['artikel_image_url']
				: $default_image_url;
		}

		$data['berita'] = $berita_page;
		$data['pagination_links'] = $this->pagination->create_links();
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$data['total_rows'] = $total_rows;
		$data['sidebar_berita'] = $sidebar_berita;

		$this->render('berita', $data);
	}

	public function detail($id)
	{
		$cache_file = APPPATH . 'cache/berita_all.json';

		if (!file_exists($cache_file)) {
			show_404();
		}

		$berita_all = json_decode(file_get_contents($cache_file), true);

		$berita_detail = null;
		foreach ($berita_all as $berita) {
			if ($berita['id_artikel'] == $id) {
				$berita_detail = $berita;
				break;
			}
		}

		if (!$berita_detail) {
			$url_detail = 'https://web-admin.malangkab.go.id/api/list-berita?id_pd=5&limit=30&id_artikel=' . $id;
			$response_detail = @file_get_contents($url_detail);
			$berita_all = $response_detail ? json_decode($response_detail, true) : [];

			foreach ($berita_all as $item) {
				if ($item['id_artikel'] == $id) {
					$berita_detail = $item;
					break;
				}
			}
		}

		if (!$berita_detail) {
			show_404();
		}

		$default_image_url = base_url('assets/img/logo.png');
		$berita_detail['gambar'] = !empty($berita_detail['artikel_image_url'])
			? 'https://web-admin.malangkab.go.id/5' . $berita_detail['artikel_image_url']
			: $default_image_url;

		// Sidebar Berita Terbaru (4 item)
		$sidebar_url = 'https://web-admin.malangkab.go.id/api/list-berita?id_pd=5&limit=4';
		$response_sidebar = @file_get_contents($sidebar_url);
		$sidebar_berita = $response_sidebar ? json_decode($response_sidebar, true) : [];

		foreach ($sidebar_berita as &$b) {
			$b['gambar'] = !empty($b['artikel_image_url'])
				? 'https://web-admin.malangkab.go.id/5' . $b['artikel_image_url']
				: $default_image_url;
		}

		$data['berita'] = $berita_detail;
		$data['sidebar_berita'] = $sidebar_berita;

		$this->render('detail', $data);
	}
}
