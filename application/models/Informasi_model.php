<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_count_info_dikecualikan()
	{
		return $this->db->where('kategori', 'dikecualikan')->count_all_results('informasi');
	}
	public function get_all_info_dikecualikan($limit, $start)
	{
		$this->db->order_by('tanggal_unggah', 'DESC');
		$this->db->limit($limit, $start);
		return $this->db->where('kategori', 'dikecualikan')->get('informasi')->result();
	}
	public function get_info_dikecualikan_by_id($id)
	{
		return $this->db->get_where('informasi', ['id' => $id, 'kategori' => 'dikecualikan'])->row();

	}

	public function get_count()
	{
		$this->db->where_not_in('kategori', ['dikecualikan']);
		return $this->db->count_all('informasi');
	}

	public function get_all($limit, $start)
	{
		$this->db->where_not_in('kategori', ['dikecualikan']);
		$this->db->order_by('tanggal_unggah', 'DESC');
		$this->db->limit($limit, $start);
		return $this->db->get('informasi')->result();
	}
	public function get_info_by_id($id)
	{
		return $this->db->get_where('informasi', ['id' => $id])->row();

	}


	// SOP_PPID
	public function get_all_sop()
	{
		$this->db->order_by('created_at', 'DESC');
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
	public function count_filtered($tahun = null, $unit_kerja = null)
	{
		if ($tahun) {
			$this->db->where('tahun', $tahun);
		}
		if ($unit_kerja && $unit_kerja !== 'Semua') {
			$this->db->where('unit_kerja', $unit_kerja);
		}
		return $this->db->count_all_results('lhkpn');
	}

	public function get_filtered($tahun, $unit_kerja, $limit = null, $offset = 0)
	{
		if ($tahun) {
			$this->db->where('tahun', $tahun);
		}
		if ($unit_kerja && $unit_kerja !== 'Semua') {
			$this->db->where('unit_kerja', $unit_kerja);
		}
		if ($limit !== null) {
			$this->db->limit($limit, $offset);
		}
		$this->db->order_by('created_at', 'DESC');
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

	// Unduhan
	public function count_unduhan()
    {
        return $this->db->count_all('dokumen');
    }

    public function get_paginated_unduhan($limit, $offset)
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('dokumen', $limit, $offset)->result();
    }

    public function count_by_kategori($kategori)
    {
        $this->db->where('kategori', $kategori);
        return $this->db->count_all_results('informasi');
    }

    public function get_by_kategori($kategori, $limit = null, $offset = 0)
    {
        $this->db->where('kategori', $kategori);
        $this->db->order_by('tanggal_unggah', 'DESC');
        if ($limit !== null) {
            $this->db->limit($limit, $offset);
        }
        return $this->db->get('informasi')->result();
    }
}
