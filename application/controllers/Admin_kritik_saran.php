<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_kritik_saran extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Kritik_saran_model');
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
		$config['total_rows'] = $this->Kritik_saran_model->count_all();
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

		$data['kritik'] = $this->Kritik_saran_model->get_all($limit, $offset);
		$data['total_rows'] = $config['total_rows'];
		$data['limit'] = $limit;
		$data['offset'] = $offset;

		// Kirim link pagination ke view
		$data['pagination_links'] = $this->pagination->create_links();
		$data['title'] = 'Kritik dan Saran';
		$data['active_menu'] = 'kritik_saran';
		// var_dump($data['kritik']);
		// die;

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/kritik_saran', $data);
		$this->load->view('admin/footer');
	}


	public function edit($id)
	{
		$data['title'] = 'Tambah Unduhan';
		$data['active_menu'] = 'unduhan';
		$data['user'] = $this->user;
		$data['permintaan'] = $this->db->get_where('permintaan_informasi', ['id' => $id])->row();
		// var_dump($data['permintaan']);
		// die;
		if (!$data) {
			show_404();
		}
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/permintaan_edit', $data);
		$this->load->view('admin/footer');
	}

	public function update($id)
	{
		$data['title'] = 'Edit Permintaan Data';
		$data['active_menu'] = 'permintaan_data';
		$data['user'] = $this->user;

		// Set rules untuk validasi form
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			var_dump($this->input->post());
			die;
			redirect('admin_permintaan_informasi/edit/' . $id);
			return;
		} else {
			// Jika validasi berhasil, simpan data
			$data_update = [
				'keterangan' => $this->input->post('keterangan'),
				'updated_at' => date('Y-m-d H:i:s'),
			];

			if ($this->db->update('permintaan_informasi', $data_update, ['id' => $id])) {
				redirect('admin_permintaan_informasi');
			} else {
				log_message('error', 'Gagal update: ' . $this->db->last_query());
				show_error('Gagal menyimpan ke database.');
			}
		}
	}
	public function delete($id)
	{
		if ($this->db->delete('kritik_saran', ['id' => $id])) {
			redirect('admin_kritik_saran');
		} else {
			log_message('error', 'Gagal delete: ' . $this->db->last_query());
			show_error('Gagal menghapus data.');
		}
	}
}
