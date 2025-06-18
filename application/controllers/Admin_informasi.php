<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_informasi extends CI_Controller
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

		$config['base_url'] = base_url('admin_informasi/index');
		$config['total_rows'] = $this->Informasi_model->get_count();
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

		$data['informasi'] = $this->Informasi_model->get_all($limit, $offset);
		$data['total_rows'] = $config['total_rows'];
		$data['limit'] = $limit;
		$data['offset'] = $offset;

		// Kirim link pagination ke view
		$data['pagination_links'] = $this->pagination->create_links();
		$data['title'] = 'Informasi';
		$data['active_menu'] = 'informasi';

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/informasi', $data);
		$this->load->view('admin/footer');
	}

	public function tambah()
	{

		$data['title'] = 'Tambah Informasi Dikecualikan';
		$data['active_menu'] = 'informasi';
		$data['user'] = $this->user;

		$this->form_validation->set_rules('judul', 'Judul', 'required|trim');
		$this->form_validation->set_rules('ringkasan', 'Ringkasan', 'required|trim');
		$this->form_validation->set_rules('pejabat', 'Pejabat', 'required|trim');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required|trim');
		$this->form_validation->set_rules('waktu_penerbitan', 'Waktu Penerbitan', 'trim');
		$this->form_validation->set_rules('bentuk', 'Bentuk', 'required|trim');
		$this->form_validation->set_rules('jangka_waktu', 'Jangka Waktu', 'required|trim');
		$this->form_validation->set_rules('media', 'Media', 'required|trim');
		$this->form_validation->set_rules('berkas', 'Berkas', 'trim');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');

		if ($this->form_validation->run() === FALSE) {
			// var_dump($this->input->post());
			// die;
			// Jika validasi gagal, tampilkan form tambah
			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/informasi_tambah');
			$this->load->view('admin/footer');
		} else {
			// Jika validasi berhasil, simpan data
			$data_insert = [
				'id' => $this->db->select_max('id')->get('informasi')->row()->id + 1,
				'judul' => $this->input->post('judul'),
				'ringkasan' => $this->input->post('ringkasan'),
				'pejabat' => $this->input->post('pejabat'),
				'penanggung_jawab' => $this->input->post('penanggung_jawab'),
				'waktu_penerbitan' => $this->input->post('waktu_penerbitan'),
				'bentuk' => $this->input->post('bentuk'),
				'jangka_waktu' => $this->input->post('jangka_waktu'),
				'media' => $this->input->post('media'),
				'berkas' => $this->input->post('berkas'),
				'tanggal_unggah' => date('Y-m-d H:i:s'),
				'kategori' => $this->input->post('kategori'),

			];
			if ($this->db->insert('informasi', $data_insert)) {
				redirect('admin_informasi');
			} else {
				log_message('error', 'Gagal insert: ' . $this->db->last_query());
				show_error('Gagal menyimpan ke database.');
			}
		}
	}

	public function edit($id)
	{
		$data['title'] = 'Tambah Informasi';
		$data['active_menu'] = 'informasi';
		$data['user'] = $this->user;
		$data['informasi'] = $this->Informasi_model->get_info_by_id($id);
		// var_dump($data['informasi']);
		// die;
		if (!$data) {
			show_404();
		}
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/informasi_edit', $data);
		$this->load->view('admin/footer');
	}

	public function update($id)
	{
		$data['title'] = 'Update Informasi';
		$data['active_menu'] = 'informasi';
		$data['user'] = $this->user;

		$this->form_validation->set_rules('judul', 'Judul', 'required|trim');
		$this->form_validation->set_rules('ringkasan', 'Ringkasan', 'required|trim');
		$this->form_validation->set_rules('pejabat', 'Pejabat', 'required|trim');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required|trim');
		$this->form_validation->set_rules('waktu_penerbitan', 'Waktu Penerbitan', 'trim');
		$this->form_validation->set_rules('bentuk', 'Bentuk', 'required|trim');
		$this->form_validation->set_rules('jangka_waktu', 'Jangka Waktu', 'required|trim');
		$this->form_validation->set_rules('media', 'Media', 'required|trim');
		$this->form_validation->set_rules('berkas', 'Berkas', 'trim');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');

		if ($this->form_validation->run() === FALSE) {
			$data['title'] = 'Tambah Informasi';
			$data['active_menu'] = 'informasi';
			$data['user'] = $this->user;
			$data['informasi'] = $this->Informasi_model->get_info_by_id($id);

			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/informasi_edit', $data);
			$this->load->view('admin/footer');
			return;
		} else {
			// Jika validasi berhasil, update data
			$data_update = [
				'judul' => $this->input->post('judul'),
				'ringkasan' => $this->input->post('ringkasan'),
				'pejabat' => $this->input->post('pejabat'),
				'penanggung_jawab' => $this->input->post('penanggung_jawab'),
				'waktu_penerbitan' => $this->input->post('waktu_penerbitan'),
				'bentuk' => $this->input->post('bentuk'),
				'jangka_waktu' => $this->input->post('jangka_waktu'),
				'media' => $this->input->post('media'),
				'berkas' => $this->input->post('berkas'),
				'tanggal_unggah' => date('Y-m-d H:i:s'),
				'kategori' => $this->input->post('kategori'),
			];
			// var_dump($data_update);
			// die;
			$this->db->where('id', $id);
			if ($this->db->update('informasi', $data_update)) {
				redirect('admin_informasi');
			} else {
				log_message('error', 'Gagal update: ' . $this->db->last_query());
				show_error('Gagal menyimpan ke database.');
			}
		}
	}

	public function hapus($id)
	{
		$this->db->where('id', $id);
		if ($this->db->delete('informasi')) {
			redirect('admin_informasi');
		} else {
			log_message('error', 'Gagal hapus: ' . $this->db->last_query());
			show_error('Gagal menghapus data.');
		}
	}
}
