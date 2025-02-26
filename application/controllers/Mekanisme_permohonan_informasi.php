<?php

class Mekanisme_permohonan_informasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('mekanisme_permohonan_informasi');
		$this->load->view('footer');
	}
}
