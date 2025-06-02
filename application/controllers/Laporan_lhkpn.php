<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_lhkpn extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Informasi_model');
		$this->load->helper('url');
	}

	public function index()
	{
		$tahun = $this->input->get('tahun');
		$unit_kerja = $this->input->get('unit_kerja');

		// Gunakan nilai default jika tidak ada filter
		$tahun = ($tahun && $tahun !== 'Semua') ? $tahun : null;
		$unit_kerja = ($unit_kerja && $unit_kerja !== 'Semua') ? $unit_kerja : null;

		// Filter data dari model
		$data['lhkpn'] = $this->Informasi_model->get_filtered($tahun, $unit_kerja);

		$data['lhkpn'] = $this->Informasi_model->get_filtered($tahun, $unit_kerja);
		$data['list_tahun'] = $this->Informasi_model->get_all_tahun();
		$data['list_unit'] = $this->Informasi_model->get_all_units();
		$data['tahun_terpilih'] = $this->input->get('tahun') ?? 'Semua';
		$data['unit_terpilih'] = $this->input->get('unit_kerja') ?? 'Semua';

		$this->set_sidebar_berita($data);
		$this->render('laporan_lhkpn', $data);
	}
}
