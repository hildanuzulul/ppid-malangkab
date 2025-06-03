<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_lhkpn extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Informasi_model');
		$this->load->library('pagination');
	}

	public function index()
	{
		// Ambil parameter dari URL
		$tahun = $this->input->get('tahun');
		$unit_kerja = $this->input->get('unit_kerja');
		$limit = (int) ($this->input->get('limit') ?? 10);
		$offset = (int) ($this->input->get('offset') ?? 0);

		// Gunakan null jika 'Semua'
		$tahun_filter = ($tahun && $tahun !== 'Semua') ? $tahun : null;
		$unit_filter = ($unit_kerja && $unit_kerja !== 'Semua') ? $unit_kerja : null;

		// Ambil total data dan data sesuai offset
		$total = $this->Informasi_model->count_filtered($tahun_filter, $unit_filter);
		$items = $this->Informasi_model->get_filtered($tahun_filter, $unit_filter, $limit, $offset);

		// Siapkan pagination
		$config['base_url'] = base_url('laporan_lhkpn');
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'offset';
		$config['reuse_query_string'] = TRUE;

		// Custom tampilan pagination
		$config['full_tag_open'] = '';
		$config['full_tag_close'] = '';
		$config['cur_tag_open'] = '<a href="#" class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['next_link'] = FALSE;
		$config['prev_link'] = FALSE;

		$this->pagination->initialize($config);

		// Kirim ke view
		$data['lhkpn'] = $items;
		$data['total_rows'] = $total;
		$data['list_tahun'] = $this->Informasi_model->get_all_tahun();
		$data['list_unit'] = $this->Informasi_model->get_all_units();
		$data['tahun_terpilih'] = $tahun ?? 'Semua';
		$data['unit_terpilih'] = $unit_kerja ?? 'Semua';
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$data['pagination_links'] = $this->pagination->create_links();

		$data['lhkpn'] = $this->Informasi_model->get_filtered($tahun_filter, $unit_filter, $limit, $offset);
		$this->set_sidebar_berita($data);
		$this->render('laporan_lhkpn', $data);
	}
}
