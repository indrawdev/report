<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MCronJob extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insertAllReport()
	{
		$xSQL = ("
			INSERT INTO tx_report
			SELECT DISTINCT b.fn_kodekr, CONCAT(a.fn_kodelk, a.fn_nomdel, a.fs_jenpiu, a.fn_polpen, a.fn_nompjb) as fs_kontrak,
			b.fs_nampem, c.fs_model_kendaraan, b.fn_thnken, 
			CONCAT(d.fn_cabang, d.fn_kodelk, d.fn_nomdel) as fn_koddel, d.fs_namdel, b.fd_tglstj, 
			(b.fn_anggih + 1) as fn_anggih, b.fn_lamang, (b.fn_juhang - b.fn_biangd) as fn_pokhut, 
			a.fn_outnet, a.fn_ovdnet, a.fn_lamovd, a.fn_ovdgrs, a.fd_tglupd, e.fs_ptgsvy
			FROM tx_arovdd a
			LEFT JOIN tx_arpjb b ON b.fn_kodelk = a.fn_kodelk AND b.fn_nomdel = a.fn_nomdel
			AND b.fs_jenpiu = a.fs_jenpiu AND b.fn_polpen = a.fn_polpen AND b.fn_nompjb = a.fn_nompjb
			LEFT JOIN tm_kendaraan c ON c.fs_kode_kendaraan = b.fs_jenken
			LEFT JOIN tx_arcmas d ON d.fn_cabang = b.fn_kodekr AND d.fn_kodelk = b.fn_kodsup AND d.fn_nomdel = b.fn_nomsup
			LEFT JOIN tx_arapk e ON  e.fn_kodelk = a.fn_kodelk AND e.fn_nomdel = a.fn_nomdel
			AND e.fs_jenpiu = a.fs_jenpiu AND e.fn_polpen = a.fn_polpen AND e.fn_nompjb = a.fn_nompjb
			WHERE a.fn_outnet <> '0' AND b.fd_tgllns = '0000-00-00';
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}
}