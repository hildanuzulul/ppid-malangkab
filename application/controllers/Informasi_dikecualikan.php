<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi_dikecualikan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Informasi_model');
        $this->load->library('pagination');
    }

    public function index()
    {
        // Ambil limit dan offset dari query string (default limit=10, offset=0)
        $limit = $this->input->get('limit') ? (int)$this->input->get('limit') : 10;
        $offset = $this->input->get('offset') ? (int)$this->input->get('offset') : 0;

        // Konfigurasi pagination
        $config['base_url'] = base_url('informasi_dikecualikan/index');
        $config['total_rows'] = $this->Informasi_model->get_count();
        $config['per_page'] = $limit;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'offset';

        // Styling pagination: gunakan tag a untuk semua link supaya CSS cocok
        $config['full_tag_open'] = '<div class="pagination-links">';
        $config['full_tag_close'] = '</div>';

        $config['cur_tag_open'] = '<a href="#" class="current">';
        $config['cur_tag_close'] = '</a>';

        $config['num_tag_open'] = '<a href="#">';
        $config['num_tag_close'] = '</a>';

        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<a href="#" class="prev">';
        $config['prev_tag_close'] = '</a>';

        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<a href="#" class="next">';
        $config['next_tag_close'] = '</a>';

        $config['disabled_tag_open'] = '<a href="#" class="disabled">';
        $config['disabled_tag_close'] = '</a>';

        $this->pagination->initialize($config);

        $data['informasi'] = $this->Informasi_model->get_all($limit, $offset);
        $data['total_rows'] = $config['total_rows'];
        $data['limit'] = $limit;
        $data['offset'] = $offset;

        // Kirim link pagination ke view
        $data['pagination_links'] = $this->pagination->create_links();

		$this->render('informasi_dikecualikan', $data);
    }
}
