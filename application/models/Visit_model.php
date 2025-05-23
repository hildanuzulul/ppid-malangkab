<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visit_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function record_visit($ip_address)
    {
		$one_hour_ago = date('Y-m-d H:i:s', strtotime('-1 hour'));

		$this->db->where('ip_address', $ip_address);
		$this->db->where('visit_time >=', $one_hour_ago);
		$query = $this->db->get('visits');
	
		if ($query->num_rows() == 0) {
			$data = [
				'ip_address' => $ip_address,
				'visit_time' => date('Y-m-d H:i:s')
			];
			return $this->db->insert('visits', $data);
		}
		return FALSE;
    }
	// Fungsi statistik kunjungan
    public function get_stats()
    {
        $today = date('Y-m-d');
        $month = date('Y-m');
        $year = date('Y');

        $stats = [];

        // Hari ini
        $this->db->like('visit_time', $today, 'after');
        $stats['today'] = $this->db->count_all_results('visits');

        // Bulan ini
        $this->db->like('visit_time', $month, 'after');
        $stats['month'] = $this->db->count_all_results('visits');

        // Tahun ini
        $this->db->like('visit_time', $year, 'after');
        $stats['year'] = $this->db->count_all_results('visits');

        return $stats;
    }

}
