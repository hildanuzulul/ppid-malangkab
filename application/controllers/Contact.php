<?php

class Contact extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
			'required' => 'Nama tidak boleh kosong',
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim', [
			'required' => 'Email tidak boleh kosong',
			'valid_email' => 'Email tidak valid',
		]);
		$this->form_validation->set_rules('pesan', 'Pesan', 'required|trim', [
			'required' => 'Pesan tidak boleh kosong',
		]);
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|trim', [
			'required' => 'Telepon tidak boleh kosong',
		]);

		$data['kritik_saran'] = $this->db->get('kritik_saran')->result();
		// var_dump($data['kritik_saran']);
		// die;
		if ($this->form_validation->run() == FALSE) {
			// Jika validasi gagal, tampilkan form kontak
			$this->render('contact', $data);
			return;
		} else {
			// Jika validasi berhasil, simpan data kontak
			$data_insert = [
				'nama_pengirim' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'pesan' => $this->input->post('pesan'),
				'telepon' => $this->input->post('telepon'),
				'created_at' => date('Y-m-d H:i:s'),
			];

			if ($this->db->insert('kritik_saran', $data_insert)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success">Pesan berhasil dikirim</div>');
				redirect('contact');
			} else {
				log_message('error', 'Gagal insert: ' . $this->db->last_query());
				show_error('Gagal menyimpan ke database.');
			}
		}
	}
}
