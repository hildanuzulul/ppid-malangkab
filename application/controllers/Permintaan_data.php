<?php

class Permintaan_data extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->render('permintaan_data');
	}
}
