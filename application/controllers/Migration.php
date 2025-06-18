<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('migration');
		$this->load->dbforge();
	}

	public function index()
	{
		// var_dump($this->migration->version(1)); // Ganti dengan versi migrasi yang ingin dijalankan
		// die;

		if ($this->migration->current() === FALSE) {
			show_error($this->migration->error_string());
		} else {
			echo "Migrasi berhasil dijalankan!";
		}
	}
}
