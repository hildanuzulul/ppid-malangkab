<?php

class Struktur_organisasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('struktur_organisasi');
		$this->load->view('footer');
	}
}
