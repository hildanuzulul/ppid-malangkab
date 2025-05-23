<?php

class Maklumat_Pelayanan extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->render('maklumat_pelayanan');
	}
}
