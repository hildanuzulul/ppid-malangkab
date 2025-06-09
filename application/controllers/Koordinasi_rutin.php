<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Koordinasi_rutin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('pagination');
	}

	public function index()
	{
		$limit  = $this->input->get('limit')  ? (int)$this->input->get('limit')  : 10;
		$offset = $this->input->get('offset') ? (int)$this->input->get('offset') : 0;

		$cache_file = APPPATH . 'cache/koordinasi_rutin_all.json';

		// Cek cache
		if (file_exists($cache_file) && time() - filemtime($cache_file) < 3600) {
			$data_all = json_decode(file_get_contents($cache_file), true);
		} else {
			$url = 'https://web-admin.malangkab.go.id/api/list-berita?id_pd=5'; // Ganti id_pd jika perlu
			$response = @file_get_contents($url);
			$data_all = $response ? json_decode($response, true) : [];
			file_put_contents($cache_file, json_encode($data_all));
		}

		$total_rows = count($data_all);
		$data_page  = array_slice($data_all, $offset, $limit);

		$default_image_url = base_url('assets/img/logo.png');
		foreach ($data_page as &$item) {
			$item['gambar'] = !empty($item['artikel_image_url'])
				? 'https://web-admin.malangkab.go.id/5' . $item['artikel_image_url']
				: $default_image_url;
		}

		// Konfigurasi pagination
		$config['base_url'] = base_url('koordinasi_rutin/index');
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

		// Sidebar (Koordinasi terbaru)
		$sidebar_url = 'https://web-admin.malangkab.go.id/api/list-berita?id_pd=5&limit=4';
		$response_sidebar = @file_get_contents($sidebar_url);
		$sidebar = $response_sidebar ? json_decode($response_sidebar, true) : [];

		foreach ($sidebar as &$b) {
			$b['gambar'] = !empty($b['artikel_image_url'])
				? 'https://web-admin.malangkab.go.id/5' . $b['artikel_image_url']
				: $default_image_url;
		}

		$data['koordinasi_rutin']   = $data_page;
		$data['pagination_links']   = $this->pagination->create_links();
		$data['limit']              = $limit;
		$data['offset']             = $offset;
		$data['total_rows']         = $total_rows;
		$this->set_sidebar_berita($data);
		$this->render('koordinasi_rutin', $data);
	}

	public function detail($id)
	{
		$cache_file = APPPATH . 'cache/koordinasi_rutin_all.json';

		if (!file_exists($cache_file)) {
			show_404();
		}

		$data_all = json_decode(file_get_contents($cache_file), true);
		$detail = null;

		foreach ($data_all as $item) {
			if ($item['id_artikel'] == $id) {
				$detail = $item;
				break;
			}
		}

		if (!$detail) {
			$url_detail = 'https://web-admin.malangkab.go.id/api/list-berita?id_pd=5&limit=30&id_artikel=' . $id;
			$response_detail = @file_get_contents($url_detail);
			$data_all = $response_detail ? json_decode($response_detail, true) : [];

			foreach ($data_all as $item) {
				if ($item['id_artikel'] == $id) {
					$detail = $item;
					break;
				}
			}
		}

		if (!$detail) {
			show_404();
		}

		$default_image_url = base_url('assets/img/logo.png');
		$detail['gambar'] = !empty($detail['artikel_image_url'])
			? 'https://web-admin.malangkab.go.id/5' . $detail['artikel_image_url']
			: $default_image_url;

		// Sidebar koordinasi terbaru
		$sidebar_url = 'https://web-admin.malangkab.go.id/api/list-berita?id_pd=5&limit=4';
		$response_sidebar = @file_get_contents($sidebar_url);
		$sidebar = $response_sidebar ? json_decode($response_sidebar, true) : [];

		foreach ($sidebar as &$b) {
			$b['gambar'] = !empty($b['artikel_image_url'])
				? 'https://web-admin.malangkab.go.id/5' . $b['artikel_image_url']
				: $default_image_url;
		}

		$data['koordinasi_rutin']     = $detail;
		$this->set_sidebar_berita($data);
		$this->render('detail_koordinasi_rutin', $data);
	}
}
