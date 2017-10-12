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

	public function getCurrent($sKdCab, $dStart, $dEnd)
	{
		$xSQL = ("
			SELECT DISTINCT COUNT(*) as fn_unit, SUM(fn_outnet) as fn_total_outnet, fd_tglupd
			FROM tx_report
			WHERE fn_kodekr = '".trim($sKdCab)."' 
			AND fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND fn_lamovd = '0' AND fn_ovdgrs = '0'
		");

		$xSQL = $xSQL.("
			ORDER BY fd_tglupd DESC
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getUnit7($sKdCab, $dStart, $dEnd, $nPrm1, $nPrm2)
	{
		$xSQL = ("
			SELECT DISTINCT COUNT(*) as fn_unit, SUM(fn_outnet) as fn_total_outnet, fd_tglupd
			FROM tx_report
			WHERE fn_kodekr = '".trim($sKdCab)."' 
			AND fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND (fn_lamovd > '".trim($nPrm1)."' AND fn_lamovd <= '".trim($nPrm2)."' OR fn_lamovd = '0' AND fn_ovdnet <> '0')
		");

		$xSQL = $xSQL.("
			ORDER BY fd_tglupd DESC
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getUnitNxt($sKdCab, $dStart, $dEnd, $nPrm1, $nPrm2)
	{
		$xSQL = ("
			SELECT DISTINCT COUNT(*) as fn_unit, SUM(fn_outnet) as fn_total_outnet, fd_tglupd
			FROM tx_report
			WHERE fn_kodekr = '".trim($sKdCab)."' 
			AND fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND fn_lamovd > '".trim($nPrm1)."' AND fn_lamovd <= '".trim($nPrm2)."'
		");

		$xSQL = $xSQL.("
			ORDER BY fd_tglupd DESC
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getMax($sKdCab, $dStart, $dEnd, $nPrm)
	{
		$xSQL = ("
			SELECT DISTINCT COUNT(*) as fn_unit, SUM(fn_outnet) as fn_total_outnet, fd_tglupd
			FROM tx_report
			WHERE fn_kodekr = '".trim($sKdCab)."' 
			AND fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND fn_lamovd > '".trim($nPrm)."'
		");

		$xSQL = $xSQL.("
			ORDER BY fd_tglupd DESC
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getTotal($sKdCab, $dStart, $dEnd)
	{
		$xSQL = ("
			SELECT DISTINCT COUNT(*) as fn_unit, SUM(fn_outnet) as fn_total_outnet, fd_tglupd
			FROM tx_report
			WHERE fn_kodekr = '".trim($sKdCab)."' 
			AND fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
		");

		$xSQL = $xSQL.("
			ORDER BY fd_tglupd DESC
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getDetailCurrent($sKdCab, $dStart, $dEnd)
	{
		$xSQL = ("
			SELECT DISTINCT fs_kontrak,
			fs_nampem, fs_model_kendaraan, fn_thnken, fs_namdel, fd_tglstj, fn_anggih, 
			fn_lamang, fn_pokhut, fn_outnet, fn_lamovd, fd_tglupd, fs_ptgsvy
			FROM tx_report
			WHERE fn_kodekr = '".trim($sKdCab)."' 
			AND fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND fn_lamovd = '0' AND fn_ovdgrs = '0'
		");

		$xSQL = $xSQL.("
			ORDER BY fd_tglupd DESC
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getDetailUnit7($sKdCab, $dStart, $dEnd, $nPrm1, $nPrm2)
	{
		$xSQL = ("
			SELECT DISTINCT fs_kontrak,
			fs_nampem, fs_model_kendaraan, fn_thnken, fs_namdel, fd_tglstj, fn_anggih, 
			fn_lamang, fn_pokhut, fn_outnet, fn_lamovd, fd_tglupd, fs_ptgsvy
			FROM tx_report
			WHERE fn_kodekr = '".trim($sKdCab)."' 
			AND fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND (fn_lamovd > '".trim($nPrm1)."' AND fn_lamovd <= '".trim($nPrm2)."' 
				OR fn_lamovd = '0' AND fn_ovdnet <> '0')
		");

		$xSQL = $xSQL.("
			ORDER BY fd_tglupd DESC
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getDetailUnitNxt($sKdCab, $dStart, $dEnd, $nPrm1, $nPrm2)
	{
		$xSQL = ("
			SELECT DISTINCT fs_kontrak,
			fs_nampem, fs_model_kendaraan, fn_thnken, fs_namdel, fd_tglstj, fn_anggih, 
			fn_lamang, fn_pokhut, fn_outnet, fn_lamovd, fd_tglupd, fs_ptgsvy
			FROM tx_report
			WHERE fn_kodekr = '".trim($sKdCab)."' 
			AND fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND fn_lamovd > '".trim($nPrm1)."' AND fn_lamovd <= '".trim($nPrm2)."'
		");

		$xSQL = $xSQL.("
			ORDER BY fd_tglupd DESC
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getDetailMax($sKdCab, $dStart, $dEnd, $nPrm)
	{
		$xSQL = ("
			SELECT DISTINCT fs_kontrak,
			fs_nampem, fs_model_kendaraan, fn_thnken, fs_namdel, fd_tglstj, fn_anggih, 
			fn_lamang, fn_pokhut, fn_outnet, fn_lamovd, fd_tglupd, fs_ptgsvy
			FROM tx_report
			WHERE fn_kodekr = '".trim($sKdCab)."' 
			AND fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND fn_lamovd > '".trim($nPrm)."'
		");

		$xSQL = $xSQL.("
			ORDER BY fd_tglupd DESC
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getDetailTotal($sKdCab, $dStart, $dEnd)
	{
		$xSQL = ("
			SELECT DISTINCT fs_kontrak,
			fs_nampem, fs_model_kendaraan, fn_thnken, fs_namdel, fd_tglstj, fn_anggih, 
			fn_lamang, fn_pokhut, fn_outnet, fn_lamovd, fd_tglupd, fs_ptgsvy
			FROM tx_report
			WHERE fn_outnet <> '0' AND fn_kodekr = '".trim($sKdCab)."' 
			AND fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
		");

		$xSQL = $xSQL.("
			ORDER BY fd_tglupd DESC
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}
}