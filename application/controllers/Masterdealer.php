<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterdealer extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if ($this->session->userdata('login') <> TRUE) {
            redirect('login');
        }
    }

	public function index() {
		$this->load->view('vmasterdealer');
	}

	public function griddealer() {
		$sCari = trim($this->input->post('fs_cari'));
		$nStart = trim($this->input->post('start'));
		$nLimit = trim($this->input->post('limit'));

		$this->db->trans_start();
		$this->load->model('MMasterDealer');
		$sSQL = $this->MMasterDealer->listDealerAll($sCari);
		$xTotal = $sSQL->num_rows();
		$sSQL = $this->MMasterDealer->listDealer($sCari, $nStart, $nLimit);
		$this->db->trans_complete();

		$xArr = array();
		if ($sSQL->num_rows() > 0) {
			foreach ($sSQL->result() as $xRow) {
				$xArr[] = array(
					'fs_kode_cabang' => trim($xRow->fs_kode_cabang),
					'fs_kode_dealer1' => trim($xRow->fs_kode_dealer1),
					'fs_kode_dealer2' => trim($xRow->fs_kode_dealer2),
					'fn_cabang_dealer' => trim($xRow->fn_cabang_dealer),
					'fs_nama_dealer' => trim($xRow->fs_nama_dealer),
					'fs_alamat_dealer' => trim($xRow->fs_alamat_dealer),
					'fs_kota_dealer' => trim($xRow->fs_kota_dealer),
					'fs_kodepos_dealer' => trim($xRow->fs_kodepos_dealer),
					'fs_kota_dealer' => trim($xRow->fs_kota_dealer),
					'fs_telepon_dealer' => trim($xRow->fs_telepon_dealer),
					'fs_handphone_dealer' => trim($xRow->fs_handphone_dealer),
					'fs_nama_pemilik' => trim($xRow->fs_nama_pemilik),
					'fs_npwp_pemilik' => trim($xRow->fs_npwp_pemilik),
					'fs_ktp_pemilik' => trim($xRow->fs_ktp_pemilik),
					'fs_nama_bank_pencairan' => trim($xRow->fs_nama_bank_pencairan),
					'fs_rekening_bank_pencairan' => trim($xRow->fs_rekening_bank_pencairan),
					'fs_atasnama_bank_pencairan' => trim($xRow->fs_atasnama_bank_pencairan),
					'fn_persen_refund_bunga' => trim($xRow->fn_persen_refund_bunga)
				);
			}
		}
		echo '({"total":"'.$xTotal.'","hasil":'.json_encode($xArr).'})';
	}

	public function ceksavedealer() {
		$kode1 = $this->input->post('fs_kode_dealer1');

		if (!empty($kode1)) {

		} else {

		}
	}

	public function savedealer() {
		$dt = array(
			'' => '',
			'' => '',
			'' => ''
		);
	}

	public function removedealer() {
		$kode1 = $this->input->post('fs_kode_dealer1');

		if (!empty($kode1)) {

		} else {

		}
	}
}