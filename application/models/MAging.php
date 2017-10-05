<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MAging extends CI_Model
{
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

	public function getAging($sKdCab, $dStart, $dEnd)
	{	
		$xSQL = ("
			SELECT fn_kodelk, fn_nomdel, fs_jenpiu, 
				fn_polpen, fn_nompjb, fs_nampem, fn_thnken, fd_tglstj, fn_anggih, fn_lamang,
				fn_juhang, fn_biangd
			FROM tx_arpjb
			WHERE fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND fd_tgllns = '0000-00-00'
		");

		if (!empty($sKdCab)) {
			$xSQL = $xSQL.("
				AND fn_kodekr = '".trim($sKdCab)."'
			");
		}

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getCurrent($sKdCab, $dStart, $dEnd)
	{
		$xSQL = ("
			SELECT COUNT(a.fn_recordid) as fn_unit
			FROM tx_arpjb a
			LEFT JOIN tx_arovdd b ON b.fn_kodelk = a.fn_kodelk AND b.fn_nomdel = a.fn_nomdel
			AND b.fs_jenpiu = a.fs_jenpiu AND b.fn_polpen = a.fn_polpen AND b.fn_nompjb = a.fn_nompjb
			WHERE a.fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND b.fn_lamovd = 0 AND b.fn_ovdnet = 0 AND a.fd_tgllns = '0000-00-00'
		");

		if (!empty($sKdCab)) {
			$xSQL = $xSQL.("
				AND a.fn_kodekr = '".trim($sKdCab)."'
			");
		}

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getUnit($sKdCab, $dStart, $dEnd, $nPrm1, $nPrm2)
	{
		$xSQL = ("
			SELECT COUNT(a.fn_recordid) as fn_unit
			FROM tx_arpjb a
			LEFT JOIN tx_arovdd b ON b.fn_kodelk = a.fn_kodelk AND b.fn_nomdel = a.fn_nomdel
			AND b.fs_jenpiu = a.fs_jenpiu AND b.fn_polpen = a.fn_polpen AND b.fn_nompjb = a.fn_nompjb
			WHERE a.fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND b.fn_lamovd > '".trim($nPrm1)."' AND b.fn_lamovd <= '".trim($nPrm2)."' AND a.fd_tgllns = '0000-00-00'
		");

		if (!empty($sKdCab)) {
			$xSQL = $xSQL.("
				AND a.fn_kodekr = '".trim($sKdCab)."'
			");
		}

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getMax($sKdCab, $dStart, $dEnd, $nPrm)
	{
		$xSQL = ("
			SELECT COUNT(a.fn_recordid) as fn_unit
			FROM tx_arpjb a
			LEFT JOIN tx_arovdd b ON b.fn_kodelk = a.fn_kodelk AND b.fn_nomdel = a.fn_nomdel
			AND b.fs_jenpiu = a.fs_jenpiu AND b.fn_polpen = a.fn_polpen AND b.fn_nompjb = a.fn_nompjb
			WHERE a.fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."' 
			AND b.fn_lamovd > '".trim($nPrm)."' AND a.fd_tgllns = '0000-00-00'
		");

		if (!empty($sKdCab)) {
			$xSQL = $xSQL.("
				AND a.fn_kodekr = '".trim($sKdCab)."'
			");
		}

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getTotal($sKdCab, $dStart, $dEnd)
	{
		$xSQL = ("
			SELECT COUNT(a.fn_recordid) as fn_unit
			FROM tx_arpjb a
			LEFT JOIN tx_arovdd b ON b.fn_kodelk = a.fn_kodelk AND b.fn_nomdel = a.fn_nomdel
			AND b.fs_jenpiu = a.fs_jenpiu AND b.fn_polpen = a.fn_polpen AND b.fn_nompjb = a.fn_nompjb
			WHERE a.fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."' AND a.fd_tgllns = '0000-00-00'
		");

		if (!empty($sKdCab)) {
			$xSQL = $xSQL.("
				AND a.fn_kodekr = '".trim($sKdCab)."'
			");
		}

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getDetailCurrent($nKdLk, $nNoDl, $sJnPi, $nPolpn, $nNoPj)
	{
		$xSQL = ("
			SELECT fn_outnet
			FROM tx_arovdd
			WHERE fn_kodelk = '".trim($nKdLk)."' AND fn_nomdel = '".trim($nNoDl)."'
			AND fs_jenpiu = '".trim($sJnPi)."' AND fn_polpen = '".trim($nPolpn)."'
			AND fn_nompjb = '".trim($nNoPj)."' AND fn_lamovd = 0
			AND fn_ovdnet = 0
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getDetailUnit($nKdLk, $nNoDl, $sJnPi, $nPolpn, $nNoPj, $sPrm1, $sPrm2)
	{
		$xSQL = ("
			SELECT fn_outnet
			FROM tx_arovdd
			WHERE fn_kodelk = '".trim($nKdLk)."' AND fn_nomdel = '".trim($nNoDl)."'
			AND fs_jenpiu = '".trim($sJnPi)."' AND fn_polpen = '".trim($nPolpn)."'
			AND fn_nompjb = '".trim($nNoPj)."' AND fn_lamovd > '".trim($sPrm1)."' 
			AND fn_lamovd <= '".trim($sPrm2)."'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getDetailMax($nKdLk, $nNoDl, $sJnPi, $nPolpn, $nNoPj, $sPrm)
	{
		$xSQL = ("
			SELECT fn_outnet
			FROM tx_arovdd
			WHERE fn_kodelk = '".trim($nKdLk)."' AND fn_nomdel = '".trim($nNoDl)."'
			AND fs_jenpiu = '".trim($sJnPi)."' AND fn_polpen = '".trim($nPolpn)."'
			AND fn_nompjb = '".trim($nNoPj)."' AND fn_lamovd > '".trim($sPrm)."'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getDetailTotal($nKdLk, $nNoDl, $sJnPi, $nPolpn, $nNoPj)
	{
		$xSQL = ("
			SELECT fn_outnet
			FROM tx_arovdd
			WHERE fn_kodelk = '".trim($nKdLk)."' AND fn_nomdel = '".trim($nNoDl)."'
			AND fs_jenpiu = '".trim($sJnPi)."' AND fn_polpen = '".trim($nPolpn)."'
			AND fn_nompjb = '".trim($nNoPj)."'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}
}