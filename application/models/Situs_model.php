<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Situs_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_by_kategori($kategori)
	{
		return $this->db->get_where('situs_pd', ['kategori' => $kategori])->result();
	}
}
