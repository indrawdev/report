<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MMasterDealer extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function checkDealer($nKode)
	{
		$xSQL = ("
			SELECT fs_kode_dealer, fs_nama_dealer
			FROM tm_dealer
			WHERE fs_kode_dealer = '".trim($nKode)."'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function listDealerAll($sCari)
	{
		$xSQL = ("
			SELECT fs_kode_dealer, fs_nama_dealer
			FROM tm_dealer
		");

		if (!empty($sCari)) {
			$xSQL = $xSQL.("
				WHERE (fs_kode_dealer LIKE '%".trim($sCari)."%'
					OR fs_nama_dealer LIKE '%".trim($sCari)."%')
			");
		}

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function listDealer($sCari, $nStart, $nLimit)
	{
		$xSQL = ("
			SELECT fs_kode_dealer, fs_nama_dealer
			FROM tm_dealer
		");

		if (!empty($sCari)) {
			$xSQL = $xSQL.("
				WHERE (fs_kode_dealer LIKE '%".trim($sCari)."%'
					OR fs_nama_dealer LIKE '%".trim($sCari)."%')
			");
		}

		$xSQL = $xSQL.("
			ORDER BY fs_kode_dealer ASC LIMIT ".$nStart.",".$nLimit."
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

}