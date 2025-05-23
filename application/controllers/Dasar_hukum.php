<?php

class Dasar_hukum extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->render('dasar_hukum');
	}
}
