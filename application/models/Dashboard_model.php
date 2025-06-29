<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
	public function get_total_user()
	{
		return $this->db->count_all('users');
	}

	public function get_total_permintaan()
	{
		return $this->db->count_all('permintaan_informasi');
	}

	public function get_total_kritik_saran()
	{
		return $this->db->count_all('kritik_saran');
	}

	public function get_permintaan_per_bulan()
	{
		$this->db->select('MONTH(created_at) as bulan, COUNT(*) as jumlah');
		$this->db->from('permintaan_informasi');
		$this->db->group_by('MONTH(created_at)');
		$this->db->order_by('bulan', 'ASC');
		$query = $this->db->get()->result();

		// Siapkan array kosong 12 bulan
		$data = array_fill(1, 12, 0);
		foreach ($query as $row) {
			$data[(int)$row->bulan] = (int)$row->jumlah;
		}
		return $data;
	}
}
