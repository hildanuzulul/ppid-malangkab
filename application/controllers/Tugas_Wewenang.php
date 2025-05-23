<?php

class Tugas_Wewenang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('tugas_wewenang');
		$this->load->view('footer');
	}
}
