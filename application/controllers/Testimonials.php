<?php

class Testimonials extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('testimonials');
		$this->load->view('footer');
	}
}

