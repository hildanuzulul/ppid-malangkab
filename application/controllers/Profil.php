<?php

class Profil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('profil');
		$this->load->view('footer');
	}
}
