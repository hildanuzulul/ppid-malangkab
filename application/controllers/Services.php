<?php

class Services extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('services');
		$this->load->view('footer');
	}
}

