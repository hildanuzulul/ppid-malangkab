<?php

class Permohonan_keberatan extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->render('permohonan_keberatan');
	}
}
