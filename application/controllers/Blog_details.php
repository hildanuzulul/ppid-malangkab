<?php

class Blog_details extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('blog_details');
		$this->load->view('footer');
	}
}
