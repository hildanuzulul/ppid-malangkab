<?php

class Struktur_organisasi extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->render('struktur_organisasi');
	}
}
