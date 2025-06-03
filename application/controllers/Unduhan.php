<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unduhan extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Informasi_model');
		$this->load->helper('url');
		$this->load->library('pagination');
	}

	public function index()
	{
		$limit = (int) ($this->input->get('limit') ?? 10);
		$offset = (int) ($this->input->get('offset') ?? 0);

		$total_rows = $this->Informasi_model->count_unduhan();

		// Konfigurasi pagination
		$config['base_url'] = base_url('unduhan');
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

		// Data untuk view
		$data['dokumen'] = $this->Informasi_model->get_paginated_unduhan($limit, $offset);
		$data['total_rows'] = $total_rows;
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$data['pagination_links'] = $this->pagination->create_links();

		$data['sop'] = $this->Informasi_model->get_all_sop();
		$this->set_sidebar_berita($data);
		$this->render('unduhan', $data);
	}
}
