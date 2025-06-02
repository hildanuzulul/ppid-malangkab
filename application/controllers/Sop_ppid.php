<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sop_ppid extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Informasi_model');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['sop'] = $this->Informasi_model->get_all_sop();
		$this->set_sidebar_berita($data);
		$this->render('sop_ppid', $data);
	}
}
