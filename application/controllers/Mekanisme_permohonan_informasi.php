<?php

class Mekanisme_permohonan_informasi extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->render('mekanisme_permohonan_informasi');
	}
}
