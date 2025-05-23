<?php

class Tugas_Wewenang extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->render('tugas_wewenang');
	}
}
