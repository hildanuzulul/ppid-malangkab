<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Situs_pd extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Situs_model');
		$this->load->library('pagination');
		$this->load->helper('url');
	}

	public function index($slug = 'badan')
	{
		// Mapping slug ke label kategori
		$slug_to_label = [
			'badan' => 'badan',
			'bagian' => 'bagian',
			'desa' => 'desa',
			'dinas' => 'dinas',
			'kecamatan' => 'kecamatan',
			'kelurahan' => 'kelurahan',
			'lembaga' => 'lembaga',
			'malangkab' => 'malangkab',
			'organisasi' => 'organisasi',
			'ppid' => 'ppid',
			'upt_puskesmas' => 'upt puskesmas'
		];

		if (!array_key_exists($slug, $slug_to_label)) {
			show_404();
		}

		$kategori = $slug_to_label[$slug];

		// Ambil limit dan offset dari query string
		$limit  = $this->input->get('limit') ? (int)$this->input->get('limit') : 10;
		$offset = $this->input->get('offset') ? (int)$this->input->get('offset') : 0;

		// Hitung total data
		$total_rows = $this->Situs_model->count_by_kategori($kategori);

		// Konfigurasi pagination
		$config['base_url'] = base_url('situs_pd/index/' . $slug);
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $limit;
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'offset';
		$config['reuse_query_string']  = TRUE;
		$config['full_tag_open']  = '';
		$config['full_tag_close'] = '';
		$config['cur_tag_open']   = '<a href="#" class="current">';
		$config['cur_tag_close']  = '</a>';
		$config['first_link']     = FALSE;
		$config['last_link']      = FALSE;
		$config['next_link']      = FALSE;
		$config['prev_link']      = FALSE;
		$this->pagination->initialize($config);

		// Ambil data berdasarkan kategori dan pagination
		$data['kategori']         = $kategori;
		$data['menu_kategori']    = $slug_to_label;
		$data['list_pd']          = $this->Situs_model->get_by_kategori($kategori, $limit, $offset);
		$data['total_rows']       = $total_rows;
		$data['limit']            = $limit;
		$data['offset']           = $offset;
		$data['pagination_links'] = $this->pagination->create_links();

		$this->set_sidebar_berita($data);
		$this->render('situs_pd', $data);
	}
}
