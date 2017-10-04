<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MMasterCabang extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function checkCabang($nKode)
	{
		$xSQL = ("
			SELECT fs_kode_cabang, fs_nama_cabang
			FROM tm_cabang
			WHERE fs_kode_cabang = '".trim($nKode)."'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function listCabangAll($sCari)
	{
		$xSQL = ("
			SELECT fs_kode_cabang, fs_nama_cabang
			FROM tm_cabang
			WHERE fs_aktif = '1'
		");

		if (!empty($sCari)) {
			$xSQL = $xSQL.("
				AND fs_nama_cabang LIKE '%".trim($sCari)."%'
			");
		}

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function listCabang($sCari, $nStart, $nLimit)
	{
		$xSQL = ("
			SELECT fs_kode_cabang, fs_nama_cabang
			FROM tm_cabang
			WHERE fs_aktif = '1'
		");

		if (!empty($sCari)) {
			$xSQL = $xSQL.("
				AND fs_nama_cabang LIKE '%".trim($sCari)."%'
			");
		}

		$xSQL = $xSQL.("
			ORDER BY fs_kode_cabang ASC LIMIT ".$nStart.",".$nLimit."
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

}