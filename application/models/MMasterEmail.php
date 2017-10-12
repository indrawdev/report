<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MMasterEmail extends CI_Model
{
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function checkEmail($sEmail)
	{
		$xSQL = ("
			SELECT fs_nama_lengkap, fs_aktif
			FROM tm_email
			WHERE fs_email = '".trim($sEmail)."'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function listEmailAll($sCari)
	{
		$xSQL = ("
			SELECT fs_email, fs_nama_lengkap, fs_aktif
			FROM tm_email
		");

		if (!empty($sCari)) {
			$xSQL = $xSQL.("
				WHERE fs_email LIKE '%".trim($sCari)."%' 
					OR fs_nama_lengkap LIKE '%".trim($sCari)."%'
			");
		}

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function listEmail($sCari, $nStart, $nLimit)
	{
		$xSQL = ("
			SELECT fs_email, fs_nama_lengkap, fs_aktif
			FROM tm_email
		");

		if (!empty($sCari)) {
			$xSQL = $xSQL.("
				WHERE fs_email LIKE '%".trim($sCari)."%' 
					OR fs_nama_lengkap LIKE '%".trim($sCari)."%'
			");
		}

		$xSQL = $xSQL.("
			ORDER BY fd_tanggal_buat DESC LIMIT ".$nStart.",".$nLimit."
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}
}