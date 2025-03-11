<?php

class Permintaan_data extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('permintaan_data');
		$this->load->view('footer');
	}
}
