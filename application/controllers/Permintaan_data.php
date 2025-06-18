<?php

class Permintaan_data extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->user = $this->db->get_where('users', ['nama_user' => $this->session->userdata('nama_user')])->row_array();
		if (!$this->session->userdata('nama_user')) {
			$this->session->set_flashdata('message', '<div class="alert alert-warning">Login terlebihdahulu sebelum melakukan permintaan data</div>');
			redirect('login');
		}
	}

	public function index()
	{
		$this->form_validation->set_rules('permintaan_informasi', 'Permintaan Informasi', 'required|trim', [
			'required' => 'Permintaan informasi tidak boleh kosong',
		]);
		$this->form_validation->set_rules('tujuan_penggunaan', 'Tujuan Penggunaan', 'required|trim', [
			'required' => 'Tujuan tidak boleh kosong',
		]);
		$this->form_validation->set_rules('cara_memperoleh', 'Cara Memperoleh', 'required|trim', [
			'required' => 'Cara memperoleh tidak boleh kosong',
		]);
		$this->form_validation->set_rules('bentuk_salinan','Bentuk Salinan' ,'required|trim');
		$this->form_validation->set_rules('kirim_salinan', 'Cara Mendapatkan Salinan', 'required|trim', [
			'required' => 'Cara mendapatkan salinan tidak boleh kosong',
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->render('permintaan_data');
		}else{
			$data_insert = [
				'user_id' => $this->user['id'],
				'permintaan_informasi' => $this->input->post('permintaan_informasi'),
				'tujuan_penggunaan' => $this->input->post('tujuan_penggunaan'),
				'cara_memperoleh' => $this->input->post('cara_memperoleh'),
				'bentuk_salinan' => $this->input->post('bentuk_salinan'),
				'kirim_salinan' => $this->input->post('kirim_salinan'),
				'keterangan' => 'ditinjau',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
			];

			if ($this->db->insert('permintaan_informasi', $data_insert)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success">Permintaan data berhasil dikirim</div>');
				redirect('permintaan_data');
			} else {
				log_message('error', 'Gagal insert: ' . $this->db->last_query());
				show_error('Gagal menyimpan ke database.');
			}
		}
	}
}
