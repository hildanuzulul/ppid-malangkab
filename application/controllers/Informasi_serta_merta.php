<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi_serta_merta extends MY_Controller
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

		// Ambil data dari API
		$url = 'https://web-admin.malangkab.go.id/api/list-berita?id_pd=5';
		$response = @file_get_contents($url);
		$informasi_all = $response ? json_decode($response, true) : [];

		$total_rows = count($informasi_all);
		$informasi_page = array_slice($informasi_all, $offset, $limit);

		$default_image = base_url('assets/img/logo.png');
		foreach ($informasi_page as &$item) {
			$item['gambar'] = !empty($item['artikel_image_url'])
				? 'https://web-admin.malangkab.go.id/5' . $item['artikel_image_url']
				: $default_image;
		}

		// Konfigurasi pagination
		$config['base_url'] = base_url('informasi_serta_merta/index');
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $limit;
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'offset';
		$config['reuse_query_string'] = TRUE;
		$config['full_tag_open'] = '';
		$config['full_tag_close'] = '';
		$config['cur_tag_open'] = '<a href="#" class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['next_link'] = FALSE;
		$config['prev_link'] = FALSE;

		$this->pagination->initialize($config);

		$data['informasi'] = $informasi_page;
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$data['total_rows'] = $total_rows;
		$data['pagination_links'] = $this->pagination->create_links();

		$this->render('informasi_serta_merta', $data);
	}

	public function detail($id)
	{
		$url_detail = 'https://web-admin.malangkab.go.id/api/list-berita?id_pd=5&limit=30&id_artikel=' . $id;
		$response_detail = @file_get_contents($url_detail);
		$data_all = $response_detail ? json_decode($response_detail, true) : [];

		$detail = null;
		foreach ($data_all as $item) {
			if ($item['id_artikel'] == $id) {
				$detail = $item;
				break;
			}
		}

		if (!$detail) {
			show_404();
		}

		$default_image = base_url('assets/img/logo.png');
		$detail['gambar'] = !empty($detail['artikel_image_url'])
			? 'https://web-admin.malangkab.go.id/5' . $detail['artikel_image_url']
			: $default_image;

		$data['informasi'] = $detail;

		$this->render('detail_informasi_serta_merta', $data);
	}
}
