<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MFpd extends CI_Model {

	public function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function getCabang($sKdCab)
	{
		$xSQL = ("
			SELECT fs_nama_cabang
			FROM tm_cabang
			WHERE fs_kode_cabang = '".trim($sKdCab)."'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL->row();
	}

	public function getReportDealer($sKdCab, $dStart, $dEnd)
	{
		$xSQL = ("
			SELECT DISTINCT fn_koddel, fs_namdel, fd_tglupd,
			COUNT(CASE WHEN fn_lamovd = '0' AND fn_ovdgrs = '0' THEN fs_kontrak END) as fn_current,
			COUNT(CASE WHEN (fn_lamovd > '0' AND fn_lamovd < '7' OR fn_lamovd = '0' AND fn_ovdnet <> '0') 
			THEN fs_kontrak END) as fn_1_7,
			COUNT(CASE WHEN fn_lamovd > '7' AND fn_lamovd < '15' THEN fs_kontrak END) as fn_8_15,
			COUNT(CASE WHEN fn_lamovd > '15' AND fn_lamovd < '30' THEN fs_kontrak END) as fn_16_30,
			COUNT(CASE WHEN fn_lamovd > '30' AND fn_lamovd < '60' THEN fs_kontrak END) as fn_31_60,
			COUNT(CASE WHEN fn_lamovd > '60' AND fn_lamovd < '90' THEN fs_kontrak END) as fn_61_90,
			COUNT(CASE WHEN fn_lamovd > '90' AND fn_lamovd < '120' THEN fs_kontrak END) as fn_91_120,
			COUNT(CASE WHEN fn_lamovd > '120' THEN fs_kontrak END) as fn_max,
			COUNT(*) as fn_total 
			FROM tx_report
			WHERE fn_kodekr = '".trim($sKdCab)."' 
			AND fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
		");

		$xSQL = $xSQL.("
			GROUP BY fn_koddel
		");

		$xSQL = $xSQL.("
			ORDER BY fn_lamovd DESC
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getReportSurveyor($sKdCab, $dStart, $dEnd)
	{
		$xSQL = ("
			SELECT DISTINCT a.fs_ptgsvy, b.fs_nama_surveyor, a.fd_tglupd,
			COUNT(CASE WHEN a.fn_lamovd = '0' AND a.fn_ovdgrs = '0' THEN a.fs_kontrak END) as fn_current,
			COUNT(CASE WHEN (a.fn_lamovd > '0' AND a.fn_lamovd < '7' OR a.fn_lamovd = '0' AND a.fn_ovdnet <> '0') 
			THEN fs_kontrak END) as fn_1_7,
			COUNT(CASE WHEN a.fn_lamovd > '7' AND a.fn_lamovd < '15' THEN a.fs_kontrak END) as fn_8_15,
			COUNT(CASE WHEN a.fn_lamovd > '15' AND a.fn_lamovd < '30' THEN a.fs_kontrak END) as fn_16_30,
			COUNT(CASE WHEN a.fn_lamovd > '30' AND a.fn_lamovd < '60' THEN a.fs_kontrak END) as fn_31_60,
			COUNT(CASE WHEN a.fn_lamovd > '60' AND a.fn_lamovd < '90' THEN a.fs_kontrak END) as fn_61_90,
			COUNT(CASE WHEN a.fn_lamovd > '90' AND a.fn_lamovd < '120' THEN a.fs_kontrak END) as fn_91_120,
			COUNT(CASE WHEN a.fn_lamovd > '120' THEN a.fs_kontrak END) as fn_max,
			COUNT(*) as fn_total 
			FROM tx_report a
			LEFT JOIN tm_surveyor b ON b.fs_kode_surveyor_lama = a.fs_ptgsvy
			WHERE a.fn_kodekr = '".trim($sKdCab)."' 
			AND a.fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
		");

		$xSQL = $xSQL.("
			GROUP BY a.fs_ptgsvy
		");

		$xSQL = $xSQL.("
			ORDER BY a.fn_lamovd DESC
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getDetailDealer($sKdCab, $dStart, $dEnd, $sKdDeal)
	{
		$xSQL = ("
			SELECT fs_kontrak, fs_nampem, fs_namdel, fs_ptgsvy, fd_tglstj, 
				fn_anggih, fn_outnet, fn_lamovd, fd_tglupd
			FROM tx_report
			WHERE fn_kodekr = '".trim($sKdCab)."'
			AND fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND fn_koddel = '".trim($sKdDeal)."'
		");

		$xSQL = $xSQL.("
			ORDER BY fn_lamovd DESC
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getDetailSurveyor($sKdCab, $dStart, $dEnd, $sKdSvy)
	{
		$xSQL = ("
			SELECT fs_kontrak, fs_nampem, fs_namdel, fs_ptgsvy, fd_tglstj, 
				fn_anggih, fn_outnet, fn_lamovd, fd_tglupd
			FROM tx_report
			WHERE fn_kodekr = '".trim($sKdCab)."'
			AND fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND fs_ptgsvy = '".trim($sKdSvy)."'
		");

		$xSQL = $xSQL.("
			ORDER BY fn_lamovd DESC
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

}