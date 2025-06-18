<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_unduhan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Informasi_model');
		$this->load->library('pagination');
		$this->load->helper('form');
		$this->user = $this->db->get_where('users', ['nama_user' => $this->session->userdata('nama_user')])->row_array();
		if (
			!$this->session->userdata('nama_user') ||
			$this->session->userdata('role') !== 'admin'
		) {
			redirect('login'); // Atau redirect ke halaman lain seperti unauthorized
		}
	}

	public function index()
	{
		// Ambil limit dan offset dari query string (default limit=10, offset=0)
		$limit = $this->input->get('limit') ? (int)$this->input->get('limit') : 10;
		$offset = $this->input->get('offset') ? (int)$this->input->get('offset') : 0;

		// Konfigurasi pagination

		$config['base_url'] = base_url('admin_unduhan/index');
		$config['total_rows'] = $this->Informasi_model->count_unduhan();
		$config['per_page'] = $limit;
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'offset';

		// Styling pagination: gunakan tag a untuk semua link supaya CSS cocok
		$config['full_tag_open'] = '';
		$config['full_tag_close'] = '';

		$config['cur_tag_open'] = '<a href="#" class="current">';
		$config['cur_tag_close'] = '</a>';

		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['next_link'] = FALSE;
		$config['prev_link'] = FALSE;

		$this->pagination->initialize($config);

		$data['unduhan'] = $this->Informasi_model->get_paginated_unduhan($limit, $offset);
		$data['total_rows'] = $config['total_rows'];
		$data['limit'] = $limit;
		$data['offset'] = $offset;

		// Kirim link pagination ke view
		$data['pagination_links'] = $this->pagination->create_links();
		$data['title'] = 'Unduhan';
		$data['active_menu'] = 'unduhan';

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/unduhan', $data);
		$this->load->view('admin/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Informasi Dikecualikan';
		$data['active_menu'] = 'unduhan';
		$data['user'] = $this->user;

		// Set rules untuk validasi form
		$this->form_validation->set_rules('nama_file', 'Nama File', 'required|trim');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
		$this->form_validation->set_rules('file', 'File', 'trim');

		if ($this->form_validation->run() == FALSE) {
			// 	var_dump('sampai sini false');
			// die;
			// Jika validasi gagal, tampilkan form tambah
			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/unduhan_tambah', $data);
			$this->load->view('admin/footer');
			return;
		} else {
			// Jika validasi berhasil, simpan data
			$data_insert = [
				'id' => $this->db->select_max('id')->get('dokumen')->row()->id + 1,
				'nama_file' => $this->input->post('nama_file'),
				'keterangan' => $this->input->post('keterangan'),
				'url_download' => $this->input->post('file')
			];

			// var_dump($data_insert);
			// die;

			if ($this->db->insert('dokumen', $data_insert)) {
				redirect('admin_unduhan');
			} else {
				log_message('error', 'Gagal insert: ' . $this->db->last_query());
				show_error('Gagal menyimpan ke database.');
			}
		}
	}

	public function edit($id)
	{
		$data['title'] = 'Tambah Unduhan';
		$data['active_menu'] = 'unduhan';
		$data['user'] = $this->user;
		$data['unduhan'] = $this->db->get_where('dokumen', ['id' => $id])->row();
		// var_dump($data['unduhan']);
		// die;
		if (!$data) {
			show_404();
		}
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/unduhan_edit', $data);
		$this->load->view('admin/footer');
	}

	public function update($id)
	{
		$data['title'] = 'Edit Unduhan';
		$data['active_menu'] = 'unduhan';
		$data['user'] = $this->user;

		// Set rules untuk validasi form
		$this->form_validation->set_rules('nama_file', 'Nama File', 'required|trim');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
		$this->form_validation->set_rules('file', 'File', 'trim');


		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Tambah Unduhan';
			$data['active_menu'] = 'unduhan';
			$data['user'] = $this->user;
			$data['unduhan'] = $this->db->get_where('dokumen', ['id' => $id])->row();

			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/unduhan_edit', $data);
			$this->load->view('admin/footer');
			return;
		} else {
			// Jika validasi berhasil, simpan data
			$data_update = [
				'nama_file' => $this->input->post('nama_file'),
				'keterangan' => $this->input->post('keterangan'),
				'url_download' => $this->input->post('file')
			];

			if ($this->db->update('dokumen', $data_update, ['id' => $id])) {
				redirect('admin_unduhan');
			} else {
				log_message('error', 'Gagal update: ' . $this->db->last_query());
				show_error('Gagal menyimpan ke database.');
			}
		}
	}
	public function delete($id)
	{
		if ($this->db->delete('dokumen', ['id' => $id])) {
			redirect('admin_unduhan');
		} else {
			log_message('error', 'Gagal delete: ' . $this->db->last_query());
			show_error('Gagal menghapus data.');
		}
	}
}
