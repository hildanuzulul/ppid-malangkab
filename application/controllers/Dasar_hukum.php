<?php

class Dasar_hukum extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('dasar_hukum');
		$this->load->view('footer');
	}
}
