<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * MY_Controller - Base Controller
 */
class MY_B_Controller extends CI_Controller
{
    public $user = null;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
		$this->load->model('Visit_model');
		$this->load->helper('url');
		if(!$this->session->userdata('logged_in')) {
            redirect('login');
        }

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
		$data['title'] = 'Dashboard Admin';
        $data['active_menu'] = 'dashboard';
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view($view, $data);
        $this->load->view('admin/footer');
		
    }
}
