<?php
defined('BASEPATH') or exit('No direct script access allowed');

class informasi_berkala extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Informasi_model');
		$this->load->library('pagination');
	}

	public function index()
	{
		// 1. Ambil limit & offset
		$limit  = $this->input->get('limit')  ? (int)$this->input->get('limit')  : 10;
		$offset = $this->input->get('offset') ? (int)$this->input->get('offset') : 0;

		// 2. Gunakan kategori “berkala”
		$kategori = 'berkala';

		// 3. Hitung total row untuk kategori ini
		$total_rows = $this->Informasi_model->count_by_kategori($kategori);

		// 4. Setup pagination
		$config['base_url'] = base_url('informasi_berkala/index');
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
		$this->load->library('pagination');
		$this->pagination->initialize($config);

		// 5. Ambil data sesuai kategori + pagination
		$data['informasi']       = $this->Informasi_model->get_by_kategori($kategori, $limit, $offset);
		$data['total_rows']      = $total_rows;
		$data['limit']           = $limit;
		$data['offset']          = $offset;
		$data['pagination_links'] = $this->pagination->create_links();


		$this->render('informasi_berkala', $data);
	}
}
