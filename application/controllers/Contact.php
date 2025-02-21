<?php

class Contact extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('contact');
		$this->load->view('footer');
	}
}
