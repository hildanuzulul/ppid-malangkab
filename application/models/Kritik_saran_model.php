<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kritik_saran_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function count_all()
	{
		return $this->db->count_all_results('kritik_saran');
	}
	public function get_all($limit = 10, $offset = 0)
	{
		$this->db->order_by('created_at', 'DESC');
		$this->db->limit($limit, $offset);
		return $this->db->get('kritik_saran')->result();
	}
}
