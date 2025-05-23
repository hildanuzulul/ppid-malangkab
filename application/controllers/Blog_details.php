<?php

class Blog_details extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->render('blog_details');
	}
}
