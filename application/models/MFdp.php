<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MFdp extends CI_Model {

	public function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function checkJadwal()
	{
		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function checkRuteJadwal()
	{
		$sSQL = $this->db->query($xSQL);
		return $sSQL;
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

	public function getReport()
	{
		$xSQL = ("
			SELECT
			FROM
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getReportSvy()
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