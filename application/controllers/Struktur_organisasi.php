<?php

class Struktur_organisasi extends MY_Controller
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
		$this->render('struktur_organisasi', $data);
	}
}
