<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_lhkpn extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Informasi_model');
	}

	public function index()
	{
		$tahun = $this->input->get('tahun') ?? 'Semua';
		$unit_kerja = $this->input->get('unit_kerja') ?? 'Semua';

		$data['lhkpn'] = $this->Informasi_model->get_filtered_lhkpn($tahun, $unit_kerja);
		$data['list_tahun'] = $this->Informasi_model->get_all_tahun_lhkpn();
		$data['list_unit'] = $this->Informasi_model->get_all_unit_kerja_lhkpn();
		$data['tahun_terpilih'] = $tahun;
		$data['unit_terpilih'] = $unit_kerja;

		$this->render('laporan_lhkpn', $data);
	}
}
