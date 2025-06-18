<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permintaan_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function count_all()
	{
		return $this->db->count_all_results('permintaan_informasi');
	}
	public function get_all($limit = 10, $offset = 0)
	{
		$this->db->select('pi.*, users.nama_user');
		$this->db->from('permintaan_informasi as pi');
		$this->db->join('users', 'users.id = pi.user_id', 'left');
		$this->db->order_by('created_at', 'DESC');
		$this->db->limit($limit, $offset);
		return $this->db->get()->result();
	}
}
