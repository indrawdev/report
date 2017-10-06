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
			SELECT COUNT(*) as fn_unit, SUM(a.fn_outnet) as fn_total_outnet, a.fd_tglupd
			FROM tx_arovdd a
			LEFT JOIN tx_arpjb b ON b.fn_kodelk = a.fn_kodelk AND b.fn_nomdel = a.fn_nomdel
			AND b.fs_jenpiu = a.fs_jenpiu AND b.fn_polpen = a.fn_polpen AND b.fn_nompjb = a.fn_nompjb
			WHERE a.fn_outnet <> '0' AND b.fn_kodekr = '".trim($sKdCab)."' 
			AND b.fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND a.fn_lamovd = '0' AND a.fn_ovdgrs = '0'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getUnit7($sKdCab, $dStart, $dEnd, $nPrm1, $nPrm2)
	{
		$xSQL = ("
			SELECT COUNT(*) as fn_unit, SUM(a.fn_outnet) as fn_total_outnet, a.fd_tglupd
			FROM tx_arovdd a
			LEFT JOIN tx_arpjb b ON b.fn_kodelk = a.fn_kodelk AND b.fn_nomdel = a.fn_nomdel
			AND b.fs_jenpiu = a.fs_jenpiu AND b.fn_polpen = a.fn_polpen AND b.fn_nompjb = a.fn_nompjb
			WHERE a.fn_outnet <> '0' AND b.fn_kodekr = '".trim($sKdCab)."' 
			AND b.fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND (a.fn_lamovd > '".trim($nPrm1)."' AND a.fn_lamovd <= '".trim($nPrm2)."' OR a.fn_lamovd = '0' AND a.fn_ovdnet <> '0')
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getUnitNxt($sKdCab, $dStart, $dEnd, $nPrm1, $nPrm2)
	{
		$xSQL = ("
			SELECT COUNT(*) as fn_unit, SUM(a.fn_outnet) as fn_total_outnet, a.fd_tglupd
			FROM tx_arovdd a
			LEFT JOIN tx_arpjb b ON b.fn_kodelk = a.fn_kodelk AND b.fn_nomdel = a.fn_nomdel
			AND b.fs_jenpiu = a.fs_jenpiu AND b.fn_polpen = a.fn_polpen AND b.fn_nompjb = a.fn_nompjb
			WHERE a.fn_outnet <> '0' AND b.fn_kodekr = '".trim($sKdCab)."' 
			AND b.fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND a.fn_lamovd > '".trim($nPrm1)."' AND a.fn_lamovd <= '".trim($nPrm2)."'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getMax($sKdCab, $dStart, $dEnd, $nPrm)
	{
		$xSQL = ("
			SELECT COUNT(*) as fn_unit, SUM(a.fn_outnet) as fn_total_outnet, a.fd_tglupd
			FROM tx_arovdd a
			LEFT JOIN tx_arpjb b ON b.fn_kodelk = a.fn_kodelk AND b.fn_nomdel = a.fn_nomdel
			AND b.fs_jenpiu = a.fs_jenpiu AND b.fn_polpen = a.fn_polpen AND b.fn_nompjb = a.fn_nompjb
			WHERE a.fn_outnet <> '0' AND b.fn_kodekr = '".trim($sKdCab)."' 
			AND b.fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND a.fn_lamovd > '".trim($nPrm)."'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getTotal($sKdCab, $dStart, $dEnd)
	{
		$xSQL = ("
			SELECT COUNT(*) as fn_unit, SUM(a.fn_outnet) as fn_total_outnet, a.fd_tglupd
			FROM tx_arovdd a
			LEFT JOIN tx_arpjb b ON b.fn_kodelk = a.fn_kodelk AND b.fn_nomdel = a.fn_nomdel
			AND b.fs_jenpiu = a.fs_jenpiu AND b.fn_polpen = a.fn_polpen AND b.fn_nompjb = a.fn_nompjb
			WHERE a.fn_outnet <> '0' AND b.fn_kodekr = '".trim($sKdCab)."' 
			AND b.fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getDetailCurrent($sKdCab, $dStart, $dEnd)
	{
		$xSQL = ("
			SELECT CONCAT(a.fn_kodelk, a.fn_nomdel, a.fs_jenpiu, a.fn_polpen, a.fn_nompjb) as fs_kontrak,
			b.fs_nampem, c.fs_model_kendaraan, b.fn_thnken, d.fs_namdel, b.fd_tglstj, 
			(b.fn_anggih + 1) as fn_anggih, b.fn_lamang, (b.fn_juhang - b.fn_biangd) as fn_pokhut, 
			a.fn_outnet, a.fn_lamovd, a.fd_tglupd
			FROM tx_arovdd a
			LEFT JOIN tx_arpjb b ON b.fn_kodelk = a.fn_kodelk AND b.fn_nomdel = a.fn_nomdel
			AND b.fs_jenpiu = a.fs_jenpiu AND b.fn_polpen = a.fn_polpen AND b.fn_nompjb = a.fn_nompjb
			LEFT JOIN tm_kendaraan c ON c.fs_kode_kendaraan = b.fs_jenken
			LEFT JOIN tx_arcmas d ON d.fn_cabang = b.fn_kodekr AND d.fn_kodelk = b.fn_kodsup AND d.fn_nomdel = b.fn_nomsup
			WHERE a.fn_outnet <> '0' AND b.fn_kodekr = '".trim($sKdCab)."' 
			AND b.fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND a.fn_lamovd = '0' AND a.fn_ovdgrs = '0'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getDetailUnit7($sKdCab, $dStart, $dEnd, $nPrm1, $nPrm2)
	{
		$xSQL = ("
			SELECT CONCAT(a.fn_kodelk, a.fn_nomdel, a.fs_jenpiu, a.fn_polpen, a.fn_nompjb) as fs_kontrak,
			b.fs_nampem, c.fs_model_kendaraan, b.fn_thnken, d.fs_namdel, b.fd_tglstj, 
			(b.fn_anggih + 1) as fn_anggih, b.fn_lamang, (b.fn_juhang - b.fn_biangd) as fn_pokhut, 
			a.fn_outnet, a.fn_lamovd, a.fd_tglupd
			FROM tx_arovdd a
			LEFT JOIN tx_arpjb b ON b.fn_kodelk = a.fn_kodelk AND b.fn_nomdel = a.fn_nomdel
			AND b.fs_jenpiu = a.fs_jenpiu AND b.fn_polpen = a.fn_polpen AND b.fn_nompjb = a.fn_nompjb
			LEFT JOIN tm_kendaraan c ON c.fs_kode_kendaraan = b.fs_jenken
			LEFT JOIN tx_arcmas d ON d.fn_cabang = b.fn_kodekr AND d.fn_kodelk = b.fn_kodsup AND d.fn_nomdel = b.fn_nomsup
			WHERE a.fn_outnet <> '0' AND b.fn_kodekr = '".trim($sKdCab)."' 
			AND b.fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND (a.fn_lamovd > '".trim($nPrm1)."' AND a.fn_lamovd <= '".trim($nPrm2)."' 
				OR a.fn_lamovd = '0' AND a.fn_ovdnet <> '0')
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getDetailUnitNxt($sKdCab, $dStart, $dEnd, $nPrm1, $nPrm2)
	{
		$xSQL = ("
			SELECT CONCAT(a.fn_kodelk, a.fn_nomdel, a.fs_jenpiu, a.fn_polpen, a.fn_nompjb) as fs_kontrak,
			b.fs_nampem, c.fs_model_kendaraan, b.fn_thnken, d.fs_namdel, b.fd_tglstj, 
			(b.fn_anggih + 1) as fn_anggih, b.fn_lamang, (b.fn_juhang - b.fn_biangd) as fn_pokhut, 
			a.fn_outnet, a.fn_lamovd, a.fd_tglupd
			FROM tx_arovdd a
			LEFT JOIN tx_arpjb b ON b.fn_kodelk = a.fn_kodelk AND b.fn_nomdel = a.fn_nomdel
			AND b.fs_jenpiu = a.fs_jenpiu AND b.fn_polpen = a.fn_polpen AND b.fn_nompjb = a.fn_nompjb
			LEFT JOIN tm_kendaraan c ON c.fs_kode_kendaraan = b.fs_jenken
			LEFT JOIN tx_arcmas d ON d.fn_cabang = b.fn_kodekr AND d.fn_kodelk = b.fn_kodsup AND d.fn_nomdel = b.fn_nomsup
			WHERE a.fn_outnet <> '0' AND b.fn_kodekr = '".trim($sKdCab)."' 
			AND b.fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND a.fn_lamovd > '".trim($nPrm1)."' AND a.fn_lamovd <= '".trim($nPrm2)."'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getDetailMax($sKdCab, $dStart, $dEnd, $nPrm)
	{
		$xSQL = ("
			SELECT CONCAT(a.fn_kodelk, a.fn_nomdel, a.fs_jenpiu, a.fn_polpen, a.fn_nompjb) as fs_kontrak,
			b.fs_nampem, c.fs_model_kendaraan, b.fn_thnken, d.fs_namdel, b.fd_tglstj, 
			(b.fn_anggih + 1) as fn_anggih, b.fn_lamang, (b.fn_juhang - b.fn_biangd) as fn_pokhut, 
			a.fn_outnet, a.fn_lamovd, a.fd_tglupd
			FROM tx_arovdd a
			LEFT JOIN tx_arpjb b ON b.fn_kodelk = a.fn_kodelk AND b.fn_nomdel = a.fn_nomdel
			AND b.fs_jenpiu = a.fs_jenpiu AND b.fn_polpen = a.fn_polpen AND b.fn_nompjb = a.fn_nompjb
			LEFT JOIN tm_kendaraan c ON c.fs_kode_kendaraan = b.fs_jenken
			LEFT JOIN tx_arcmas d ON d.fn_cabang = b.fn_kodekr AND d.fn_kodelk = b.fn_kodsup AND d.fn_nomdel = b.fn_nomsup
			WHERE a.fn_outnet <> '0' AND b.fn_kodekr = '".trim($sKdCab)."' 
			AND b.fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
			AND a.fn_lamovd > '".trim($nPrm)."'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getDetailTotal($sKdCab, $dStart, $dEnd)
	{
		$xSQL = ("
			SELECT CONCAT(a.fn_kodelk, a.fn_nomdel, a.fs_jenpiu, a.fn_polpen, a.fn_nompjb) as fs_kontrak,
			b.fs_nampem, c.fs_model_kendaraan, b.fn_thnken, d.fs_namdel, b.fd_tglstj, 
			(b.fn_anggih + 1) as fn_anggih, b.fn_lamang, (b.fn_juhang - b.fn_biangd) as fn_pokhut, 
			a.fn_outnet, a.fn_lamovd, a.fd_tglupd
			FROM tx_arovdd a
			LEFT JOIN tx_arpjb b ON b.fn_kodelk = a.fn_kodelk AND b.fn_nomdel = a.fn_nomdel
			AND b.fs_jenpiu = a.fs_jenpiu AND b.fn_polpen = a.fn_polpen AND b.fn_nompjb = a.fn_nompjb
			LEFT JOIN tm_kendaraan c ON c.fs_kode_kendaraan = b.fs_jenken
			LEFT JOIN tx_arcmas d ON d.fn_cabang = b.fn_kodekr AND d.fn_kodelk = b.fn_kodsup AND d.fn_nomdel = b.fn_nomsup
			WHERE a.fn_outnet <> '0' AND b.fn_kodekr = '".trim($sKdCab)."' 
			AND b.fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}
}