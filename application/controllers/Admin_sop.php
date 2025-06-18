<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_sop extends CI_Controller
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
		$data['title'] = 'SOP';
		$data['active_menu'] = 'sop';
		$data['user'] = $this->user;
		$data['sop'] = $this->Informasi_model->get_all_sop();
		// var_dump($data['sop']);
		// die;

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/sop', $data);
		$this->load->view('admin/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah SOP';
		$data['active_menu'] = 'sop';
		$data['user'] = $this->user;

		// Set rules untuk validasi form
		$this->form_validation->set_rules('tahun', 'Tahun', 'required|trim');
		$this->form_validation->set_rules('nama_sop', 'Nama SOP', 'required|trim');
		$this->form_validation->set_rules('file', 'File', 'trim');

		if ($this->form_validation->run() == FALSE) {
			// 	var_dump('sampai sini false');
			// die;
			// Jika validasi gagal, tampilkan form tambah
			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/sop_tambah', $data);
			return;
		} else {
			// Jika validasi berhasil, simpan data
			$data_insert = [
				'id' => $this->db->select_max('id')->get('laporan_sop')->row()->id + 1,
				'tahun' => $this->input->post('tahun'),
				'nama_sop' => $this->input->post('nama_sop'),
				'file_sop' => $this->input->post('file')
			];

			if ($this->db->insert('laporan_sop', $data_insert)) {
				redirect('admin_sop');
			} else {
				log_message('error', 'Gagal insert: ' . $this->db->last_query());
				show_error('Gagal menyimpan ke database.');
			}
		}
	}

	public function edit($id)
	{
		$data['title'] = 'Tambah SOP';
		$data['active_menu'] = 'sop';
		$data['user'] = $this->user;
		$data['sop'] = $this->db->get_where('laporan_sop', ['id' => $id])->row();
		// var_dump($data['unit_kerja']);
		// die;
		if (!$data) {
			show_404();
		}
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/sop_edit', $data);
		$this->load->view('admin/footer');
	}

	public function update($id)
	{
		$data['title'] = 'Edit SOP';
		$data['active_menu'] = 'sop';
		$data['user'] = $this->user;

		// Set rules untuk validasi form
		$this->form_validation->set_rules('tahun', 'Tahun', 'required|trim');
		$this->form_validation->set_rules('nama_sop', 'Nama SOP', 'required|trim');
		$this->form_validation->set_rules('file', 'File', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Tambah SOP';
			$data['active_menu'] = 'sop';
			$data['user'] = $this->user;
			$data['sop'] = $this->db->get_where('laporan_sop', ['id' => $id])->row();
			
			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/sop_edit', $data);
			$this->load->view('admin/footer');
			return;
		} else {
			// Jika validasi berhasil, simpan data
			$data_update = [
				'tahun' => $this->input->post('tahun'),
				'nama_sop' => $this->input->post('nama_sop'),
				'file_sop' => $this->input->post('file')
			];

			if ($this->db->update('laporan_sop', $data_update, ['id' => $id])) {
				redirect('admin_sop');
			} else {
				log_message('error', 'Gagal update: ' . $this->db->last_query());
				show_error('Gagal menyimpan ke database.');
			}
		}
	}
	public function delete($id)
	{
		if ($this->db->delete('laporan_sop', ['id' => $id])) {
			redirect('admin_sop');
		} else {
			log_message('error', 'Gagal delete: ' . $this->db->last_query());
			show_error('Gagal menghapus data.');
		}
	}
}
