<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MAging extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getDataDealer($dStart, $dEnd, $nKdSup, $nNoSup)
	{
		$xSQL = ("
			SELECT d.fs_nama_dealer, b.fn_kodelk, b.fn_nomdel, b.fn_polpen, b.fs_jenpiu,
				b.fn_nompjb, b.fs_nampem, a.fn_lamovd, a.fn_outgrs, a.fn_outnet,
				a.fn_ovdgrs, a.fn_ovdnet, b.fd_tglstj
			FROM tx_arpjb b
			LEFT JOIN tm_dealer d ON d.fs_kode_dealer1 = b.fn_kodsup AND d.fs_kode_dealer2 = b.fn_nomsup
			LEFT JOIN tx_arovdd a ON a.fn_nompjb = b.fn_nompjb AND a.fn_kodelk = b.fn_kodelk 
			AND a.fn_nomdel = b.fn_nomdel AND a.fn_polpen = b.fn_polpen AND a.fs_jenpiu = b.fs_jenpiu
			WHERE b.fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND b.fn_kodsup = '".trim($nKdSup)."' AND b.fn_nomsup = '".trim($nNoSup)."'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL->result();
	}

	public function getDataSurveyor($dStart, $dEnd, $sSrVey, $nKdLk)
	{
		$xSQL = ("
			SELECT b.fn_kodelk, b.fn_nomdel, b.fn_polpen, b.fs_jenpiu, b.fn_nompjb, b.fs_nampem,
				a.fn_lamovd, a.fn_outgrs,a.fn_outnet,a.fn_ovdgrs,a.fn_ovdnet, b.fd_tglstj
			FROM tx_arpjb b
			LEFT JOIN tx_arovdd a ON a.fn_nompjb = b.fn_nompjb AND a.fn_kodelk = b.fn_kodelk 
			AND a.fn_nomdel = b.fn_nomdel AND a.fn_polpen = b.fn_polpen AND a.fs_jenpiu = b.fs_jenpiu
			LEFT JOIN tx_arapk d ON b.fn_nompjb = d.fn_nompjb AND b.fn_kodelk = d.fn_kodelk 
			AND b.fn_nomdel = d.fn_nomdel AND b.fn_polpen = d.fn_polpen AND b.fs_jenpiu = d.fs_jenpiu
			WHERE b.fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND d.fs_ptgsvy = '".trim($sSrVey)."' AND b.fn_kodekr = '".trim($nKdLk)."'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL->result();
	}

	public function getAging($sKdCab, $dStart, $dEnd)
	{	
		$xSQL = ("
			SELECT fn_kodelk, fn_nomdel, fs_jenpiu, fn_polpen, fn_nompjb, fs_nampem
			FROM tx_arpjb
			WHERE fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND fd_tgllns = ''
		");

		if (!empty($sKdCab)) {
			$xSQL = $xSQL.("
				AND fn_kodekr = '".trim($sKdCab)."'
			");
		}

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
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

	public function getDisplay($sKdCab, $dStart, $dEnd)
	{
		$xSQL = ("
			SELECT fn_kodelk, fn_nomdel, fs_jenpiu, fn_polpen, fn_nompjb
			FROM tx_arpjb
			WHERE fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."' 
			AND fd_tgllns = ''
		");

		if (!empty($sKdCab)) {
			$xSQL = $xSQL.("
				AND fn_kodekr = '".trim($sKdCab)."'
			");
		}

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getCount($sKdCab, $dStart, $dEnd)
	{
		$xSQL = ("
			SELECT COUNT(*) as fn_unit
			FROM tx_arpjb
			WHERE fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."' 
			AND fd_tgllns = ''
		");

		if (!empty($sKdCab)) {
			$xSQL = $xSQL.("
				AND fn_kodekr = '".trim($sKdCab)."'
			");
		}

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getCurrent($sKdCab, $dStart, $dEnd, $nPrm1, $nPrm2)
	{
		$xSQL = ("
			SELECT COUNT(*) as fn_unit
			FROM tx_arpjb a
			LEFT JOIN tx_arovdd b ON b.fn_kodelk = a.fn_kodelk AND b.fn_nomdel = a.fn_nomdel
			AND b.fs_jenpiu = a.fs_jenpiu AND b.fn_polpen = a.fn_polpen AND b.fn_nompjb = a.fn_nompjb
			WHERE a.fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND b.fn_lamovd = '".trim($nPrm1)."' AND b.fn_ovdnet = '".trim($nPrm2)."' AND a.fd_tgllns = ''
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
			SELECT COUNT(*) as fn_unit
			FROM tx_arpjb a
			LEFT JOIN tx_arovdd b ON b.fn_kodelk = a.fn_kodelk AND b.fn_nomdel = a.fn_nomdel
			AND b.fs_jenpiu = a.fs_jenpiu AND b.fn_polpen = a.fn_polpen AND b.fn_nompjb = a.fn_nompjb
			WHERE a.fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND b.fn_lamovd > '".trim($nPrm1)."' AND b.fn_lamovd <= '".trim($nPrm2)."' AND a.fd_tgllns = ''
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
			SELECT COUNT(*) as fn_unit
			FROM tx_arpjb a
			LEFT JOIN tx_arovdd b ON b.fn_kodelk = a.fn_kodelk AND b.fn_nomdel = a.fn_nomdel
			AND b.fs_jenpiu = a.fs_jenpiu AND b.fn_polpen = a.fn_polpen AND b.fn_nompjb = a.fn_nompjb
			WHERE a.fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."' 
			AND b.fn_lamovd > '".trim($nPrm)."' AND a.fd_tgllns = ''
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
			SELECT COUNT(*) as fn_unit
			FROM tx_arpjb a
			LEFT JOIN tx_arovdd b ON b.fn_kodelk = a.fn_kodelk AND b.fn_nomdel = a.fn_nomdel
			AND b.fs_jenpiu = a.fs_jenpiu AND b.fn_polpen = a.fn_polpen AND b.fn_nompjb = a.fn_nompjb
			WHERE a.fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."' AND a.fd_tgllns = ''
		");

		if (!empty($sKdCab)) {
			$xSQL = $xSQL.("
				AND a.fn_kodekr = '".trim($sKdCab)."'
			");
		}

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getDetailCurrent($nKdLk, $nNoDl, $sJnPi, $nPolpn, $nNoPj, $sPrm1, $sPrm2)
	{
		$xSQL = ("
			SELECT fn_outgrs, fn_outnet, fd_tglupd
			FROM tx_arovdd
			WHERE fn_kodelk = '".trim($nKdLk)."' AND fn_nomdel = '".trim($nNoDl)."'
			AND fs_jenpiu = '".trim($sJnPi)."' AND fn_polpen = '".trim($nPolpn)."'
			AND fn_nompjb = '".trim($nNoPj)."' AND fn_lamovd = '".trim($sPrm1)."' 
			AND fn_ovdnet = '".trim($sPrm2)."'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getDetailUnit($nKdLk, $nNoDl, $sJnPi, $nPolpn, $nNoPj, $sPrm1, $sPrm2)
	{
		$xSQL = ("
			SELECT fn_outgrs, fn_outnet, fd_tglupd
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
			SELECT fn_outgrs, fn_outnet, fd_tglupd
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
			SELECT fn_outgrs, fn_outnet, fd_tglupd
			FROM tx_arovdd
			WHERE fn_kodelk = '".trim($nKdLk)."' AND fn_nomdel = '".trim($nNoDl)."'
			AND fs_jenpiu = '".trim($sJnPi)."' AND fn_polpen = '".trim($nPolpn)."'
			AND fn_nompjb = '".trim($nNoPj)."'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}
}