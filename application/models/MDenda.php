<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MDenda extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}



	public function getReportAll($sKdCab)
	{
		$xSQL = ("
			SELECT DISTINCT fs_kontrak, fs_nampem, fd_tgljtp,
				fn_jlangd, fd_tglbyr, fn_jumbyr, fd_tgltrm, fn_jumlah,
				fn_anggih, fn_lamang, fn_outnet, fn_ovdnet, fn_lamovd,
				fn_ovdgrs, fd_tglupd, fn_sisabyr, fn_jlsisa, fn_sisabyr1
			FROM tx_report2
			WHERE fn_kodekr = '".trim($sKdCab)."' 
			AND MONTH(fd_tgljtp) = MONTH(now()) AND YEAR(fd_tgljtp) = YEAR(now())
		");

		$xSQL = $xSQL.("
			GROUP BY fs_kontrak
			ORDER BY fd_tgljtp ASC
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getReport($sKdCab, $dPeriode)
	{
		$xSQL = ("
			SELECT DISTINCT fs_kontrak, fs_nampem, fd_tgljtp,
				fn_jlangd, fd_tglbyr, fn_jumbyr, fd_tgltrm, fn_jumlah,
				fn_anggih, fn_lamang, fn_outnet, fn_ovdnet, fn_lamovd,
				fn_ovdgrs, fd_tglupd, fn_sisabyr, fn_jlsisa, fn_sisabyr1
			FROM tx_report2
			WHERE fn_kodekr = '".trim($sKdCab)."' AND MONTH(fd_tgljtp) = MONTH('".trim($dPeriode)."') 
		");

		$xSQL = $xSQL.("
			GROUP BY fs_kontrak
			ORDER BY fd_tgljtp ASC
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

}