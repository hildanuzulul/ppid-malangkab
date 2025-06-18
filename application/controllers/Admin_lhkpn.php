<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_lhkpn extends CI_Controller
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
		$data['title'] = 'Tambah LHKPN';
		$data['active_menu'] = 'lhkpn';
		$data['user'] = $this->user;

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
		$config['base_url'] = base_url('admin_lhkpn');
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

		// $data['lhkpn'] = $this->Informasi_model->get_filtered($tahun_filter, $unit_filter, $limit, $offset);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/lhkpn', $data);
		$this->load->view('admin/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah LHKPN';
		$data['active_menu'] = 'lhkpn';
		$data['user'] = $this->user;
		$data['unit_kerja'] = $this->Informasi_model->get_all_units();

		$this->form_validation->set_rules('tahun', 'Tahun', 'required|numeric');
		$this->form_validation->set_rules('unit_kerja', 'Unit Kerja', 'required|trim');
		$this->form_validation->set_rules('nama_pejabat', 'Nama Pejabat', 'required|trim');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
		$this->form_validation->set_rules('file', 'File', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			// Jika validasi gagal, tampilkan form tambah
			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/lhkpn_tambah', $data);
			return;
		} else {
			// Jika validasi berhasil, simpan data
			$data_insert = [
				'id' => $this->db->select_max('id')->get('nama_tabel')->row()->id + 1,
				'tahun' => $this->input->post('tahun'),
				'nama' => $this->input->post('nama_pejabat'),
				'jabatan' => $this->input->post('jabatan'),
				'unit_kerja' => $this->input->post('unit_kerja'),
				'file_lhkpn' => $this->input->post('file')
			];

			if ($this->db->insert('lhkpn', $data_insert)) {
				redirect('admin_lhkpn');
			} else {
				log_message('error', 'Gagal insert: ' . $this->db->last_query());
				show_error('Gagal menyimpan ke database.');
			}
		}
	}

	public function edit($id)
	{
		$data['title'] = 'Tambah LHKPN';
		$data['active_menu'] = 'lhkpn';
		$data['user'] = $this->user;
		$data['lhkpn'] = $this->db->get_where('lhkpn', ['id' => $id])->row();
		$data['unit_kerja'] = $this->Informasi_model->get_all_units();
		// var_dump($data['unit_kerja']);
		// die;
		if (!$data) {
			show_404();
		}
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/lhkpn_edit', $data);
		$this->load->view('admin/footer');
	}

	public function update($id)
	{
		$data['title'] = 'Edit LHKPN';
		$data['active_menu'] = 'lhkpn';
		$data['user'] = $this->user;


		$this->form_validation->set_rules('tahun', 'Tahun', 'required|numeric');
		$this->form_validation->set_rules('unit_kerja', 'Unit Kerja', 'required|trim');
		$this->form_validation->set_rules('nama_pejabat', 'Nama Pejabat', 'required|trim');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
		$this->form_validation->set_rules('file', 'File', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Tambah LHKPN';
			$data['active_menu'] = 'lhkpn';
			$data['user'] = $this->user;
			$data['lhkpn'] = $this->db->get_where('lhkpn', ['id' => $id])->row();
			$data['unit_kerja'] = $this->Informasi_model->get_all_units();
			
			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/lhkpn_edit', $data);
			$this->load->view('admin/footer');
			return;
		} else {
			// Jika validasi berhasil, simpan data
			$data_update = [
				'tahun' => $this->input->post('tahun'),
				'nama' => $this->input->post('nama_pejabat'),
				'jabatan' => $this->input->post('jabatan'),
				'unit_kerja' => $this->input->post('unit_kerja'),
				'file_lhkpn' => $this->input->post('file')
			];

			if ($this->db->update('lhkpn', $data_update, ['id' => $id])) {
				redirect('admin_lhkpn');
			} else {
				log_message('error', 'Gagal update: ' . $this->db->last_query());
				show_error('Gagal menyimpan ke database.');
			}
		}
	}

	public function delete($id)
	{
		if ($this->db->delete('lhkpn', ['id' => $id])) {
			redirect('admin_lhkpn');
		} else {
			log_message('error', 'Gagal delete: ' . $this->db->last_query());
			show_error('Gagal menghapus data.');
		}
	}
}
