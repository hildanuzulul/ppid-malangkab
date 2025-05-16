<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_count()
	{
		return $this->db->count_all('informasi_dikecualikan');
	}

	public function get_all($limit, $start)
	{
		$this->db->limit($limit, $start);
		return $this->db->get('informasi_dikecualikan')->result();
	}
}
