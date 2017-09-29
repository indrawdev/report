<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MAging extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function getUnit($dStart, $dEnd)
	{
		$xSQL = ("
			SELECT COUNT(*)
			FROM tx_arpjb a
			LEFT JOIN tx_arovdd b 
			ON b.fn_kodelk = a.fn_kodelk
			AND b.fn_nomdel = a.fn_nomdel
			AND b.fs_jenpiu = a.fs_jenpiu
			AND b.fn_polpen = a.fn_polpen
			WHERE fd_tglstj BETWEEN '".trim($dStart)."' AND '".trim($dEnd)."'
		");
		
		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}
}