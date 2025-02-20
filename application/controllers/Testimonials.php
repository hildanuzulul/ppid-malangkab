<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimonials extends CI_Controller
{
	public function index()
	{
		$this->load->view('testimonials');
	}
}
