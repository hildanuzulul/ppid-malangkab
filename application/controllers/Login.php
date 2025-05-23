<?php

defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @property CI_Input $input
 * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_DB_query_builder $db
 * @property CI_Session $session
 */
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		
	}

	public function index()
	{
		if ($this->session->userdata('nama_user')) {
			redirect('beranda');
		}
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('header');
			$this->load->view('login');
			$this->load->view('footer');
		} else {
			$this->_login();	
		}
	}

	private function _login()
	{
		// Fungsi untuk menangani login
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// Cek username dan password di database
		$user = $this->db->get_where('users', ['nama_user' => $username])->row_array();
		if ($user && password_verify($password, $user['password'])) {
			// Jika username dan password benar
			$data = [
				'nama_user' => $user['nama_user'],
				'email' => $user['email'],
			];
			$this->session->set_userdata($data);
			redirect('beranda');
		}else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Username atau Password salah</div>');
			redirect('login');
		}
	}

	public function logout()
	{
		// Fungsi untuk logout
		$this->session->unset_userdata('nama_user');
		$this->session->unset_userdata('email');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Anda sudah logout</div>');
		redirect('login');
	}
}
