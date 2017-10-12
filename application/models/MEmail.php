<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MEmail extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function config($sCategory) 
	{
		$xSQL = ("
			SELECT *
			FROM config_email
			WHERE category = '".trim($sCategory)."' AND status = '1'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL->row();
	}

	public function getEmail()
	{
		$xSQL = ("
			SELECT fs_email
			FROM tm_email
			WHERE fs_aktif = '1'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}
}