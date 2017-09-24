<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MSearch extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function Dokumen($sKdDokumen)
	{
		$xSQL = ("
			SELECT fs_kode_dokumen, fs_nama_dokumen, fs_template_dokumen
			FROM tm_dokumen_cetak
			WHERE fs_kode_dokumen = '".trim($sKdDokumen)."'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL->row();
	}
	
	public function ambilReferensi($sKode) 
	{
		$xSQL = ("
			SELECT fs_nilai1_referensi, fs_nilai2_referensi, fs_nama_referensi
			FROM tm_referensi
			WHERE fs_kode_referensi = '".trim($sKode)."'
		");

		$xSQL = $xSQL.("
			ORDER BY fs_nilai1_referensi ASC
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}
	
	public function listUserAll($sCari)
	{
		$xSQL = ("
			SELECT a.fn_nik, a.fs_username, a.fs_password, 
			a.fs_level_user, a.fs_pin, a.fd_tanggal_buat,
			b.fs_nama_karyawan
			FROM tm_user a
			LEFT JOIN tm_karyawan b
			ON b.fn_nik = a.fn_nik
		");

		if (!empty($sCari)) {
			$xSQL = $xSQL.("
				AND a.fs_username LIKE '%".trim($sCari)."%'
			");
		}

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function listUser($sCari, $nStart, $nLimit)
	{
		$xSQL = ("
			SELECT a.fn_nik, a.fs_username, a.fs_password, 
			a.fs_level_user, a.fs_pin, a.fd_tanggal_buat,
			b.fs_nama_karyawan
			FROM tm_user a
			LEFT JOIN tm_karyawan b
			ON b.fn_nik = a.fn_nik
		");

		if (!empty($sCari)) {
			$xSQL = $xSQL.("
				AND a.fs_username LIKE '%".trim($sCari)."%'
			");
		}

		$xSQL = $xSQL.("
			ORDER BY a.fd_tanggal_buat DESC LIMIT ".$nStart.",".$nLimit."
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function listKaryawanAll($sCari)
	{
		$xSQL = ("
			SELECT *
			FROM tm_karyawan
			WHERE fs_aktif = '1'
		");

		if (!empty($sCari)) {
			$xSQL = $xSQL.("
				AND fs_nama_karyawan LIKE '%".trim($sCari)."%'
			");
		}

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function listKaryawan($sCari, $nStart, $nLimit)
	{
		$xSQL = ("
			SELECT *
			FROM tm_karyawan
			WHERE fs_aktif = '1'
		");
		
		if (!empty($sCari)) {
			$xSQL = $xSQL.("
				AND fs_nama_karyawan LIKE '%".trim($sCari)."%'
			");
		}

		$xSQL = $xSQL.("
			ORDER BY fd_tanggal_masuk DESC LIMIT ".$nStart.",".$nLimit."
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function listLokasiAll($sCari)
	{
		$xSQL = ("
			SELECT *
			FROM tm_lokasi
			WHERE fs_aktif = '1'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function listLokasi($sCari, $nStart, $nLimit)
	{
		$xSQL = ("
			SELECT *
			FROM tm_lokasi
			WHERE fs_aktif = '1'
		");

		$xSQL = $xSQL.("
			ORDER BY fs_nama_lokasi ASC LIMIT ".$nStart.",".$nLimit."
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function listPerusahaanAll($sCari)
	{
		$xSQL = ("
			SELECT *
			FROM tm_perusahaan
			WHERE fs_aktif = '1'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function listPerusahaan($sCari, $nStart, $nLimit)
	{
		$xSQL = ("
			SELECT *
			FROM tm_perusahaan
			WHERE fs_aktif = '1'
		");

		$xSQL = $xSQL.("
			ORDER BY fs_nama_perusahaan ASC LIMIT ".$nStart.",".$nLimit."
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;	
	}

	public function listDepartemenAll($sCari)
	{
		$xSQL = ("
			SELECT *
			FROM tm_departemen
			WHERE fs_aktif = '1'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function listDepartemen($sCari, $nStart, $nLimit)
	{
		$xSQL = ("
			SELECT *
			FROM tm_departemen
			WHERE fs_aktif = '1'
		");

		$xSQL = $xSQL.("
			ORDER BY fs_nama_departemen ASC LIMIT ".$nStart.",".$nLimit."
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;		
	}

	public function listJabatanAll($sCari)
	{
		$xSQL = ("
			SELECT *
			FROM tm_jabatan
			WHERE fs_aktif = '1'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function listJabatan($sCari, $nStart, $nLimit)
	{
		$xSQL = ("
			SELECT *
			FROM tm_jabatan
			WHERE fs_aktif = '1'
		");

		$xSQL = $xSQL.("
			ORDER BY fs_nama_jabatan ASC LIMIT ".$nStart.",".$nLimit."
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;		
	}

	public function listAksesLokasiAll($sUserName)
	{
		$xSQL = ("
			SELECT a.fs_kode_lokasi, b.fs_nama_lokasi
			FROM tm_akses_lokasi a
			LEFT JOIN tm_lokasi b
			ON b.fs_kode_lokasi = a.fs_kode_lokasi
			WHERE a.fs_username = '".trim($sUserName)."' 
			AND b.fs_aktif = '1'
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function listAksesLokasi($sUserName, $nStart, $nLimit)
	{
		$xSQL = ("
			SELECT a.fs_kode_lokasi, b.fs_nama_lokasi
			FROM tm_akses_lokasi a
			LEFT JOIN tm_lokasi b
			ON b.fs_kode_lokasi = a.fs_kode_lokasi
			WHERE a.fs_username = '".trim($sUserName)."' 
			AND b.fs_aktif = '1'
		");

		$xSQL = $xSQL.("
			ORDER BY b.fs_nama_lokasi ASC LIMIT ".$nStart.",".$nLimit."
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

}