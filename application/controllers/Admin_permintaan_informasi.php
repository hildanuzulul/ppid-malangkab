<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_permintaan_informasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Permintaan_model');
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
		$config['total_rows'] = $this->Permintaan_model->count_all();
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

		$data['permintaan'] = $this->Permintaan_model->get_all($limit, $offset);
		$data['total_rows'] = $config['total_rows'];
		$data['limit'] = $limit;
		$data['offset'] = $offset;

		// Kirim link pagination ke view
		$data['pagination_links'] = $this->pagination->create_links();
		$data['title'] = 'Permintaan Data';
		$data['active_menu'] = 'permintaan_data';

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/permintaan', $data);
		$this->load->view('admin/footer');
	}


	public function edit($id)
	{
		$data['title'] = 'Tambah Unduhan';
		$data['active_menu'] = 'unduhan';
		$data['user'] = $this->user;
		$data['permintaan'] = $this->db->get_where('permintaan_informasi', ['id' => $id])->row();
		// var_dump($this->user['email']);
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
			// var_dump($this->input->post());
			// die;
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
		if ($this->db->delete('dokumen', ['id' => $id])) {
			redirect('admin_permintaan_informasi');
		} else {
			log_message('error', 'Gagal delete: ' . $this->db->last_query());
			show_error('Gagal menghapus data.');
		}
	}

	public function valid_url() {}

	public function upload_berkas($id)
	{
		$data['title'] = 'Permintaan Informasi';
		$data['active_menu'] = 'permintaan_data';
		$data['user'] = $this->user;

		// Set rules untuk validasi form
		$this->form_validation->set_rules('berkas', 'Berkas', 'required|trim', [
			'required' => '|Berkas harus diisi|',
		]);

		if ($this->form_validation->run() === FALSE) {
			$text = validation_errors();

			$parts = explode('|', $text);
			// Jika validasi gagal, tampilkan form tambah
			$this->session->set_flashdata('error_modal', $parts[1]);
			redirect('admin_permintaan_informasi');
		} else {
			// Jika validasi berhasil, simpan data
			$data_update = [
				'berkas' => $this->input->post('berkas'),
				'updated_at' => date('Y-m-d H:i:s'),
			];
			if ($this->db->update('permintaan_informasi', $data_update, ['id' => $id])) {
				$this->db->where('id', $id);
				$data = $this->db->get('permintaan_informasi')->row();
				if ($data->kirim_salinan == 'email') {
					$this->kirim_email($id, true);
				} else {
					$this->session->set_flashdata('success', 'Berkas berhasil disimpan.');
				}
				redirect('admin_permintaan_informasi');
			} else {
				$this->session->set_flashdata('error', 'Berkas gagal disimpan');
				redirect('admin_permintaan_informasi');
			}
		}
	}
	public function kirim_email($id, $input = false)
	{
		$this->db->select('pi.*, u.nama_user, u.email as email_user');
		$this->db->from('permintaan_informasi as pi');
		$this->db->join('users as u', 'u.id = pi.user_id', 'left');
		$this->db->where('pi.id', $id);
		$data = $this->db->get()->row();
		if (!$data) {
			show_404();
		}

		$data_email = [
			'nama_pemohon'      => $data->nama_user,
			'judul_permohonan'  => $data->permintaan_informasi,
			'link_berkas'       => $data->berkas
		];

		$message = $this->load->view('admin/format_email', $data_email, true);

		$this->load->library('email');

		$this->email->from('ppidtes37@gmail.com', 'PPID MalangKab');
		$this->email->to($data->email_user);
		$this->email->subject('Permintaan Informasi - PPID MalangKab');
		$this->email->message($message);

		if ($this->email->send()) {
			$this->db->update('permintaan_informasi', ['kirim_berkas' => true], ['id' => $id]);
			if ($input == true) {
				// Jika berkas berhasil disimpan, tampilkan pesan sukses
				$this->session->set_flashdata('success', 'Berkas berhasil disimpan. Email berhasil dikirim ke ' . $data->email_user);
			} else {
				$this->session->set_flashdata('success', 'Email berhasil dikirim ke ' . $data->email_user);
			}
			redirect('admin_permintaan_informasi');
		} else {
			$this->session->set_flashdata('success', 'Email berhasil dikirim ke ' . $data->email_user);
			redirect('admin_permintaan_informasi');
		}
	}
}
