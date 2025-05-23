<?php

class Interaksi_masyarakat extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->render('interaksi_masyarakat');
	}
}

