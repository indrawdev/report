<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MCronSlik extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getHeader()
	{
		$xSQL = ("
			SELECT *
			FROM tm_header
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getIndividu()
	{
		$xSQL = ("
			SELECT *
			FROM tm_debitur_individu
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getBadanUsaha()
	{
		$xSQL = ("
			SELECT *
			FROM tm_debitur_badanusaha
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getKredit()
	{
		$xSQL = ("
			SELECT *
			FROM tx_kredit
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getKreditJoinAcc()
	{
		$xSQL = ("
			SELECT *
			FROM tx_kredit_joinaccount
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getSuratBerharga()
	{
		$xSQL = ("
			SELECT *
			FROM tx_surat_berharga
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getIrrevocable()
	{
		$xSQL = ("
			SELECT *
			FROM tx_irrevocable_lc
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getBankGaransi()
	{
		$xSQL = ("
			SELECT *
			FROM tx_bank_garansi
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getFasilitasLain()
	{
		$xSQL = ("
			SELECT *
			FROM tx_fasilitas_lain
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getAgunan()
	{
		$xSQL = ("
			SELECT *
			FROM tx_agunan
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getPenjamin()
	{
		$xSQL = ("
			SELECT *
			FROM tx_penjamin
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getPengurus()
	{
		$xSQL = ("
			SELECT *
			FROM tx_pengurus
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function getLaporanKeuangan()
	{
		$xSQL = ("
			SELECT *
			FROM tx_laporan_keuangan
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

}