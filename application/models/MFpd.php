<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MFpd extends CI_Model {

	public function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function getReportDealer($sKdCab, $dStart, $dEnd)
	{
		$xSQL = ("
			SELECT b.fn_kodsup, b.fn_nomsup, d.fs_nama_dealer, COUNT(b.fn_recordid) as fn_penjualan,
				b.fn_kodelk, b.fn_nomdel, b.fn_polpen, b.fs_jenpiu, b.fn_nompjb
			FROM tx_arpjb b
			LEFT JOIN tm_dealer d ON d.fs_kode_dealer1 = b.fn_kodsup AND d.fs_kode_dealer2 = b.fn_nomsup
			WHERE b.fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
		");

		if (!empty($sKdCab)) {
			$xSQL = $xSQL.("
				AND b.fn_kodekr = '".trim($sKdCab)."'
			");
		}

		$xSQL = $xSQL.("
			GROUP BY CONCAT(b.fn_kodsup, '', b.fn_nomsup)
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getReportSurveyor($sKdCab, $dStart, $dEnd)
	{
		$xSQL = ("
			SELECT b.fs_ptgsvy, COUNT(b.fs_recordid) as penjualan, 
				a.fn_kodelk, a.fn_nomdel, a.fn_polpen, a.fs_jenpiu, b.fn_nompjb
			FROM tx_arapk b
			LEFT JOIN tx_arpjb a ON a.fn_nompjb = b.fn_nompjb AND a.fn_kodelk = b.fn_kodelk
			WHERE a.fd_tglstj >= '".trim($dStart)."' AND a.fd_tglstj <= '".trim($dEnd)."'
		");

		if (!empty($sKdCab)) {
			$xSQL = $xSQL.("
				AND a.fn_kodekr = '".trim($sKdCab)."'
			");
		}

		$xSQL = $xSQL.("
			GROUP BY b.fs_ptgsvy
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getUnit1($dStart, $dEnd, $nKdSup, $nNoSup)
	{
		$xSQL = ("
			SELECT *
			FROM tx_arpjb
			WHERE fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND fs_kodsup = '".trim($nKdSup)."' AND fs_nomsup = '".trim($nNoSup)."'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function unitLunas($dStart, $dEnd, $nKdSup, $nNoSup)
	{
		$xSQL = ("
			SELECT COUNT(a.fd_tgllns) as fn_lunas 
			FROM tx_arpjb a LEFT JOIN tx_arapk c ON a.fn_nompjb = c.fn_nompjb AND a.fn_kodelk = c.fn_kodelk
			WHERE a.fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND a.fd_tgllns <> '' AND a.fn_kodsup = '".trim($nKdSup)."' AND a.fn_nomsup = '".trim($nNoSup)."'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function unitLancar($nKdLk, $nNoDl, $sJnPi, $nPolpn, $nNoPj)
	{
		$xSQL = ("
			SELECT COUNT(*) as fn_lancar 
			FROM tx_arovdd
			WHERE fn_lamovd = '0' AND fn_ovdnet = '0'
			AND fn_kodelk = '".trim($nKdLk)."' AND fn_nomdel = '".trim($nNoDl)."'
			AND fs_jenpiu = '".trim($sJnPi)."' AND fn_polpen = '".trim($nPolpn)."'
			AND fn_nompjb = '".trim($nNoPj)."'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL->row();
	}

	public function unitOverdue($nKdLk, $nNoDl, $sJnPi, $nPolpn, $nNoPj)
	{
		$xSQL = ("
			SELECT COUNT(*) as fn_ovdue
			FROM tx_arovdd
			WHERE fn_kodelk = '".trim($nKdLk)."' AND fn_nomdel = '".trim($nNoDl)."'
			AND fs_jenpiu = '".trim($sJnPi)."' AND fn_polpen = '".trim($nPolpn)."'
			AND fn_nompjb = '".trim($nNoPj)."' AND (fn_ovdnet > 0 or fn_lamovd > 0)
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL->row();
	}

	public function getDataDealer()
	{
		$xSQL = ("
			SELECT 
			FROM tx_arpjb a
			LEFT JOIN tm_dealer b
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getDataSurveyor()
	{
		$xSQL = ("
			SELECT
			FROM
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getReportCount()
	{
		$xSQL = ("
			SELECT
			FROM
		");
		
		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

}