<?php

class Sengketa extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->render('sengketa');
	}
}
