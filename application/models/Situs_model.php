<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Situs_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_by_kategori($kategori, $limit = 10, $offset = 0)
	{
		$this->db->where('kategori', $kategori);
		$this->db->limit($limit, $offset);
		return $this->db->get('situs_pd')->result();
	}

	public function count_by_kategori($kategori)
	{
		$this->db->where('kategori', $kategori);
		return $this->db->count_all_results('situs_pd');
	}
}
