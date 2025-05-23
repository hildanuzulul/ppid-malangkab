<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @property CI_Input $input
 * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 */

class Registrasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->user = $this->db->get_where('users', ['nama_user' => $this->session->userdata('nama_user')])->row_array();
	}

	public function index()
	{
		if ($this->session->userdata('nama_user')) {
			redirect('beranda');
		}

		$this->form_validation->set_rules('nik', 'NIK', 'required|trim|numeric|min_length[16]|max_length[16]');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('telp', 'No Telepon', 'required|trim|numeric|min_length[10]|max_length[15]');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
			'is_unique' => 'Email already registered',
		]);
		$this->form_validation->set_rules('nama_user', 'Nama User', 'required|trim|is_unique[users.nama_user]', [
			'is_unique' => 'Username already registered',
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
			'min_length' => 'Password too short',
		]);
		$this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('header', ['user' => $this->user]);
			$this->load->view('registrasi');
			$this->load->view('footer');
		} else {
			// Inisialisasi variabel
			$new_foto = null;
			$new_ektp = null;

			// Konfigurasi upload file
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = 2048; // 2MB

			$this->load->library('upload', $config);

			// Upload Foto
			if (!empty($_FILES['foto']['name'])) {
				$config['upload_path'] = './assets/img/foto/';
				$config['file_name'] = 'foto_' . time();
				$this->upload->initialize($config);

				if ($this->upload->do_upload('foto')) {
					$new_foto = $this->upload->data('file_name');
				} else {
					// Jika ada error upload
					echo $this->upload->display_errors();
				}
			}

			// Upload E-KTP
			if (!empty($_FILES['ektp']['name'])) {
				$config['upload_path'] = './assets/img/ektp/';
				$config['file_name'] = 'ektp_' . time();
				$this->upload->initialize($config);

				if ($this->upload->do_upload('ektp')) {
					$new_ektp = $this->upload->data('file_name');
				} else {
					echo $this->upload->display_errors();
				}
			}

			// Data untuk database
			$data = [
				'nik' => htmlspecialchars($this->input->post('nik', true)),
				'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap')),
				'alamat' => htmlspecialchars($this->input->post('alamat')),
				'telp' => $this->input->post('telp'),
				'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan')),
				'email' => htmlspecialchars($this->input->post('email')),
				'nama_user' => htmlspecialchars($this->input->post('nama_user')),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'kategori' => $this->input->post('kategori'),
				'foto' => $new_foto,   // Bisa null jika tidak ada upload
				'ektp' => $new_ektp,   // Bisa null jika tidak ada upload
			];

			// Debugging: Lihat data yang akan disimpan
			var_dump($data);
			// die;

			// Insert data
			$this->db->insert('users', $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success">Registrasi Berhasil! Silahkan Login</div>');
			redirect('login');
		}
	}
}
