<?php

class Maklumat_Pelayanan extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$data = [];
		$this->set_sidebar_berita($data);
		$this->render('maklumat_pelayanan', $data);
	}
}
