<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mastersurveyor extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if ($this->session->userdata('login') <> TRUE) {
            redirect('login');
        }
    }

	public function index() {
		$this->load->view('vmastersurveyor');
	}

	public function gridsurveyor() {
		$sCari = trim($this->input->post('fs_cari'));
		$nStart = trim($this->input->post('start'));
		$nLimit = trim($this->input->post('limit'));

		$this->db->trans_start();
		$this->load->model('MMasterSurveyor');
		$sSQL = $this->MMasterSurveyor->listSurveyorAll($sCari);
		$xTotal = $sSQL->num_rows();
		$sSQL = $this->MMasterSurveyor->listSurveyor($sCari, $nStart, $nLimit);
		$this->db->trans_complete();

		$xArr = array();
		if ($sSQL->num_rows() > 0) {
			foreach ($sSQL->result() as $xRow) {
				$xArr[] = array(
					'fs_kode_cabang' => trim($xRow->fs_kode_cabang),
					'fs_kode_surveyor' => trim($xRow->fs_kode_surveyor),
					'fs_kode_surveyor_lama' => trim($xRow->fs_kode_surveyor_lama),
					'fs_nama_surveyor' => trim($xRow->fs_nama_surveyor),
					'fs_alamat_surveyor' => trim($xRow->fs_alamat_surveyor),
					'fs_ktp_surveyor' => trim($xRow->fs_ktp_surveyor),
					'fs_handphone_surveyor' => trim($xRow->fs_handphone_surveyor)
				);
			}
		}
		echo '({"total":"'.$xTotal.'","hasil":'.json_encode($xArr).'})';
	}

	public function ceksavesurveyor() {
		
	}

	public function savesurveyor() {

	}

	public function removesurveyor() {

	}
}