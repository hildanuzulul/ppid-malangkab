<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_situs_pd extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Situs_model');
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

		$config['base_url'] = base_url('admin_situs_pd/index');
		$config['total_rows'] = $this->Situs_model->count_all();
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

		$data['situs'] = $this->Situs_model->get_all($limit, $offset);
		$data['total_rows'] = $config['total_rows'];
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		// var_dump($data['situs']);
		// die;

		// Kirim link pagination ke view
		$data['pagination_links'] = $this->pagination->create_links();
		$data['title'] = 'Situs PD';
		$data['active_menu'] = 'situs_pd';

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/situs', $data);
		$this->load->view('admin/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Situs PD';
		$data['active_menu'] = 'situs_pd';
		$data['user'] = $this->user;
		$data['kategori'] = $this->Situs_model->get_kategori();
		// var_dump($data['kategori']);	
		// die;

		// Set rules untuk validasi form
		$this->form_validation->set_rules('nama_pd', 'Nama PD', 'required|trim');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|min_length[5]|max_length[255]');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|trim|numeric|min_length[10]|max_length[15]');

		if ($this->form_validation->run() == FALSE) {
			// 	var_dump('sampai sini false');
			// die;
			// Jika validasi gagal, tampilkan form tambah
			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/situs_tambah', $data);
			$this->load->view('admin/footer');
			return;
		} else {
			// Jika validasi berhasil, simpan data
			$data_insert = [
				'nama_pd' => $this->input->post('nama_pd'),
				'kategori' => $this->input->post('kategori'),
				'alamat' => $this->input->post('alamat'),
				'telepon' => $this->input->post('telepon')
			];

			if ($this->db->insert('situs_pd', $data_insert)) {
				redirect('admin_situs_pd');
			} else {
				log_message('error', 'Gagal insert: ' . $this->db->last_query());
				show_error('Gagal menyimpan ke database.');
			}
		}
	}

	public function edit($id)
	{
		$data['title'] = 'Tambah Situs PD';
		$data['active_menu'] = 'situs_pd';
		$data['user'] = $this->user;
		$data['situs'] = $this->db->get_where('situs_pd', ['id' => $id])->row();
		$data['kategori'] = $this->Situs_model->get_kategori();
		// var_dump($data['unit_kerja']);
		// die;
		if (!$data) {
			show_404();
		}
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/situs_edit', $data);
		$this->load->view('admin/footer');
	}

	public function update($id)
	{
		$data['title'] = 'Edit Situs PD';
		$data['active_menu'] = 'situs_pd';
		$data['user'] = $this->user;

		// Set rules untuk validasi form
		$this->form_validation->set_rules('nama_pd', 'Nama PD', 'required|trim');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|min_length[5]|max_length[255]');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|trim|numeric|min_length[10]|max_length[15]');

		if ($this->form_validation->run() == FALSE) {

			$data['title'] = 'Tambah Situs PD';
			$data['active_menu'] = 'situs_pd';
			$data['user'] = $this->user;
			$data['situs'] = $this->db->get_where('situs_pd', ['id' => $id])->row();
			$data['kategori'] = $this->Situs_model->get_kategori();

			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/situs_edit', $data);
			$this->load->view('admin/footer');
			return;
		} else {
			// Jika validasi berhasil, simpan data
			$data_update = [
				'nama_pd' => $this->input->post('nama_pd'),
				'kategori' => $this->input->post('kategori'),
				'alamat' => $this->input->post('alamat'),
				'telepon' => $this->input->post('telepon')
			];

			if ($this->db->update('situs_pd', $data_update, ['id' => $id])) {
				redirect('admin_situs_pd');
			} else {
				log_message('error', 'Gagal update: ' . $this->db->last_query());
				show_error('Gagal menyimpan ke database.');
			}
		}
	}
	public function delete($id)
	{
		if ($this->db->delete('situs_pd', ['id' => $id])) {
			redirect('admin_situs_pd');
		} else {
			log_message('error', 'Gagal delete: ' . $this->db->last_query());
			show_error('Gagal menghapus data.');
		}
	}
}
