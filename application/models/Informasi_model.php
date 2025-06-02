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

	// SOP_PPID
	public function get_all_sop()
	{
		return $this->db->order_by('tahun', 'DESC')->get('laporan_sop')->result();
	}
	public function get_sop_by_id($id)
	{
		return $this->db->get_where('laporan_sop', ['id' => $id])->row();
	}
	public function get_sop_by_kategori($kategori)
	{
		return $this->db->get_where('laporan_sop', ['kategori' => $kategori])->result();
	}

	// Laporan LHKPN
	public function get_filtered($tahun, $unit_kerja)
	{
		if ($tahun) {
			$this->db->where('tahun', $tahun);
		}
		if ($unit_kerja !== 'Semua') {
			$this->db->where('unit_kerja', $unit_kerja);
		}
		return $this->db->get('lhkpn')->result();
	}

	public function get_all_tahun()
	{
		$this->db->distinct();
		$this->db->select('tahun');
		$this->db->order_by('tahun', 'ASC');
		return $this->db->get('lhkpn')->result();
	}

	public function get_all_units()
	{
		$this->db->select('unit_kerja');
		$this->db->where('unit_kerja !=', '');
		$this->db->where('unit_kerja IS NOT NULL', null, false);
		$this->db->group_by('unit_kerja');
		$this->db->order_by('unit_kerja', 'ASC');
		return $this->db->get('lhkpn')->result();
	}
}
