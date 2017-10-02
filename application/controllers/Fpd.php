<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fpd extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('login') <> TRUE) {
			redirect('login');
		}
	}

	public function index() {
		$this->load->view('vfpd');
	}

	public function gridcabang() {
		$sCari = trim($this->input->post('fs_cari'));
		$nStart = trim($this->input->post('start'));
		$nLimit = trim($this->input->post('limit'));

		$this->db->trans_start();
		$this->load->model('MSearch');
		$sSQL = $this->MSearch->listCabangAll($sCari);
		$xTotal = $sSQL->num_rows();
		$sSQL = $this->MSearch->listCabang($sCari, $nStart, $nLimit);
		$this->db->trans_complete();

		$xArr = array();
		if ($sSQL->num_rows() > 0) {
			foreach ($sSQL->result() as $xRow) {
				$xArr[] = array(
					'fs_kode_cabang' => trim($xRow->fs_kode_cabang),
					'fs_nama_cabang' => trim($xRow->fs_nama_cabang)
				);
			}
		}
		echo '({"total":"'.$xTotal.'","hasil":'.json_encode($xArr).'})';
	}

	public function gridgroupdealer() {
		$cabang = $this->input->post('fs_kode_cabang');
		$mulai = $this->input->post('fd_start');
		$selesai = $this->input->post('fd_end');

		$this->db->trans_start();
		$this->load->model('MFpd');
		$sSQL = $this->MFpd->getReportDealer($cabang, $mulai, $selesai);
		$xTotal = $sSQL->num_rows();
		$this->db->trans_complete();

		$xArr = array();
		if ($sSQL->num_rows() > 0) {
			foreach ($sSQL->result() as $xRow) {

				$unit1 = $this->MFpd->getUnit1($mulai, $selesai, $xRow->fn_kodsup, $xRow->fn_nomsup);
				$lunas = $this->MFpd->unitLunas($mulai, $selesai, $xRow->fn_kodsup, $xRow->fn_nomsup);

				$totalLancar = 0;
				$totalOvdue = 0;

				foreach ($unit1->result() as $val) {
					// TOTAL LANCAR
					$nLancar = $this->MFpd->unitLancar($val->fn_kodelk, $val->fn_nomdel, $val->fs_jenpiu, $val->fn_polpen, $val->fn_nompjb);
					$totalLancar += $nLancar;

					// TOTAL OVERDUE
					$nOvdue = $this->MFpd0>unitOverdue($val->fn_kodelk, $val->fn_nomdel, $val->fs_jenpiu, $val->fn_polpen, $val->fn_nompjb);
					$totalOvdue += $nOvdue;
				}

				$xArr[] = array(
					'fn_kodelk' => '',
					'fn_kodsup' => '',
					'fn_nomsup' => '',
					'fs_nama_dealer' => '',
					'kode_cabang' => '',
					'penjualan' => '',
					'lancar' => '',
					'lunas' => '',
					'tglfix' => '',
					'tglfix2' => '',
					'ovdue' => ''
				);
			}
		}
		echo json_encode($xArr);
	}

	public function gridgroupsurveyor() {
		$cabang = $this->input->post('fs_kode_cabang');
		$this->load->model('MFpd');
	}

	// TAB FORM REPORT DEALER
	public function previewdealerdetail() {

	}

	public function downloaddealerdetail() {

	}

	public function previewpdfdealerall() {

	}

	public function downloadexceldealerall() {

	}

	// TAB FORM REPORT SURVEYOR
	public function previewsurveyordetail() {

	}

	public function downloadsurveyordetail() {

	}

	public function previewpdfsurveyorall() {

	}

	public function downloadexcelsurveyorall() {

	}

}