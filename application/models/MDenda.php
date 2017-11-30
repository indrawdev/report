<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MDenda extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getReportAll($sKdCab, $dStart, $dEnd)
	{
		$xSQL = ("
			SELECT DISTINCT *
			FROM tx_report_denda
			WHERE fn_kodekr = '".trim($sKdCab)."' 
			AND fd_tgljtp BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
		");

		$xSQL = $xSQL.("
			GROUP BY fs_kontrak, fd_tgljtp
			ORDER BY fd_tgljtp ASC
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

}