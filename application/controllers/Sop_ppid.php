<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sop_ppid extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Informasi_model');
	}

	public function index()
	{
		$data['sop'] = $this->Informasi_model->get_all_sop();
		$this->render('sop_ppid', $data);
	}
}
