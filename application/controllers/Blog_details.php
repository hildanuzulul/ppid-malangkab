<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog_details extends CI_Controller
{
	public function index()
	{
		$this->load->view('blog_details'); 
	}
}
