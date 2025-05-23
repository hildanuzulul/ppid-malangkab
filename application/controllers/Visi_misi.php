<?php

class Visi_misi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('visi_misi');
		$this->load->view('footer');
	}
}
