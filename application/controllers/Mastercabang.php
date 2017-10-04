<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mastercabang extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if ($this->session->userdata('login') <> TRUE) {
            redirect('login');
        }
    }

	public function index() {
		$this->load->view('vmastercabang');
	}

	public function gridcabang() {
		$sCari = trim($this->input->post('fs_cari'));
		$nStart = trim($this->input->post('start'));
		$nLimit = trim($this->input->post('limit'));

		$this->db->trans_start();
		$this->load->model('MMasterCabang');
		$sSQL = $this->MMasterCabang->listCabangAll($sCari);
		$xTotal = $sSQL->num_rows();
		$sSQL = $this->MMasterCabang->listCabang($sCari, $nStart, $nLimit);
		$this->db->trans_complete();

		$xArr = array();
		if ($sSQL->num_rows() > 0) {
			foreach ($sSQL->result() as $xRow) {
				$xArr[] = array(
					'fs_kode_cabang' => trim($xRow->fs_kode_cabang),
					'fs_nama_cabang' => trim($xRow->fs_nama_cabang),
					'fs_alamat_cabang' => trim($xRow->fs_alamat_cabang),
					'fs_kota_cabang' => trim($xRow->fs_kota_cabang),
					'fs_kodepos_cabang' => trim($xRow->fs_kodepos_cabang),
					'fs_telepon_cabang' => trim($xRow->fs_telepon_cabang),
					'fs_fax_cabang' => trim($xRow->fs_fax_cabang),
					'fs_email_cabang' => trim($xRow->fs_email_cabang),
					'fs_nama_pimpinan' => trim($xRow->fs_nama_pimpinan),
					'fs_jabatan_pimpinan' => trim($xRow->fs_jabatan_pimpinan),
					'fs_ktp_pimpinan' => trim($xRow->fs_ktp_pimpinan),
					'fs_email_pimpinan' => trim($xRow->fs_email_pimpinan),
					'fs_nama_bank_angsuran' => trim($xRow->fs_nama_bank_angsuran),
					'fs_rekening_bank_angsuran' => trim($xRow->fs_rekening_bank_angsuran),
					'fs_atasnama_bank_angsuran' => trim($xRow->fs_atasnama_bank_angsuran),
					'fs_wilayah_asuransi' => trim($xRow->fs_wilayah_asuransi),
					'fs_aktif' => trim($xRow->fs_aktif)
				);
			}
		}
		echo '({"total":"'.$xTotal.'","hasil":'.json_encode($xArr).'})';
	}

	public function ceksavecabang() {
		$kode = $this->input->post('fs_kode_cabang');

		if (!empty($kode)) {
			$this->load->model('MMasterSurveyor');

		} else {

		}
	}

	public function savecabang() {
		
		$dt = array(
			'fs_kode_cabang' => '',
			'fs_nama_cabang' => '',
			'fs_alamat_cabang' => '',
			'fs_kota_cabang' => '',
			'fs_kodepos_cabang' => '',
			'fs_telepon_cabang' => '',
			'fs_fax_cabang' => '',
			'fs_email_cabang' => '',
			'fs_nama_pimpinan' => '',
			'fs_jabatan_pimpinan' => '',
			'fs_ktp_pimpinan' => '',
		);
	}

	public function removecabang() {
		$kode = $this->input->post('fs_kode_cabang');

		if (!empty($kode)) {

		} else {

		}
	}

}