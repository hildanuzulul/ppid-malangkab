<?php

class Visi_misi extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->render('visi_misi');
	}
}
