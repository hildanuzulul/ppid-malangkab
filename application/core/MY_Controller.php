<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * MY_Controller - Base Controller
 */
class MY_Controller extends CI_Controller
{
    public $user = null;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
		$this->load->model('Visit_model');

        // Ambil data user dari session
        $nama_user = $this->session->userdata('nama_user');

        if ($nama_user) {
            $this->user = $this->db->get_where('users', ['nama_user' => $nama_user])->row_array();
        }
    }

    /**
     * Load view secara global
     */
    protected function render($view, $data = [])
    {
		$ip_address = $this->input->ip_address();
		$this->Visit_model->record_visit($ip_address);
		$data['stats'] = $this->Visit_model->get_stats();
        $data['user'] = $this->user;
        $this->load->view('header', $data);
        $this->load->view($view, $data);
        $this->load->view('footer');
		
    }
}
