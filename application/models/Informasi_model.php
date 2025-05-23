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
		return $this->db->count_all('informasi');
	}

	public function get_all($limit, $start)
	{
		$this->db->limit($limit, $start);
		return $this->db->get('informasi')->result();
	}

	// Laporan LHKPN
	public function get_all_lhkpn()
	{
		return $this->db->get('lhkpn')->result();
	}
	public function get_filtered_lhkpn($tahun, $unit_kerja)
	{
		if ($tahun !== 'Semua') {
			$this->db->where('tahun', $tahun);
		}
		if ($unit_kerja !== 'Semua') {
			$this->db->where('unit_kerja', $unit_kerja);
		}
		return $this->db->get('lhkpn')->result();
	}
	public function get_all_tahun_lhkpn()
	{
		$this->db->select('tahun');
		$this->db->group_by('tahun');
		$this->db->order_by('tahun', 'DESC');
		return $this->db->get('lhkpn')->result();
	}
	public function get_all_unit_kerja_lhkpn()
	{
		$this->db->select('unit_kerja');
		$this->db->group_by('unit_kerja');
		$this->db->order_by('unit_kerja', 'ASC');
		return $this->db->get('lhkpn')->result();
	}
}
