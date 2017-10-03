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

	// FUNCTION BUTTON SHOW
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
				$lunas = $this->MFpd->unitLunas1($mulai, $selesai, $xRow->fn_kodsup, $xRow->fn_nomsup);

				$totalLancar = 0;
				$totalOvdue = 0;

				foreach ($unit1->result() as $val) {
					// TOTAL LANCAR
					$nLancar = $this->MFpd->unitLancar($val->fn_kodelk, $val->fn_nomdel, $val->fs_jenpiu, $val->fn_polpen, $val->fn_nompjb);
					$totalLancar += $nLancar->fn_lancar;

					// TOTAL OVERDUE
					$nOvdue = $this->MFpd0>unitOverdue($val->fn_kodelk, $val->fn_nomdel, $val->fs_jenpiu, $val->fn_polpen, $val->fn_nompjb);
					$totalOvdue += $nOvdue->fn_ovdue;
				}

				$xArr[] = array(
					'fn_kodelk' => trim($xRow->fn_kodsup .'-'. $xRow->fn_nomsup),
					'fn_kodsup' => trim($xRow->fn_kodsup),
					'fn_nomsup' => trim($xRow->fn_nomsup),
					'fs_nama_dealer' => trim($xRow->fs_nama_dealer),
					'fs_kode_cabang' => trim($xRow->fs_kode_cabang),
					'fn_penjualan' => trim($xRow->fn_penjualan),
					'fn_lancar' => trim($totalLancar),
					'fn_lunas' => trim($lunas->fn_lunas),
					'fd_start' => trim($mulai),
					'fd_end' => trim($selesai),
					'fn_ovdue' => trim($totalOvdue)
				);
			}
		}
		echo json_encode($xArr);
	}

	public function gridgroupsurveyor() {
		$cabang = $this->input->post('fs_kode_cabang');
		$mulai = $this->input->post('fd_start');
		$selesai = $this->input->post('fd_end');

		$this->db->trans_start();
		$this->load->model('MFpd');
		$sSQL = $this->MFpd->getReportSurveyor($cabang, $mulai, $selesai);
		$xTotal = $sSQL->num_rows();
		$this->db->trans_complete();

		$xArr = array();
		if ($sSQL->num_rows() > 0) {
			foreach ($sSQL->result() as $xRow) {

				$unit2 = $this->MFpd->getUnit2($mulai, $selesai, $xRow->fs_ptgsvy);
				$lunas = $this->MFpd->unitLunas2($mulai, $selesai, $xRow->fs_ptgsvy);

				$totalLancar = 0;
				$totalOvdue = 0;

				foreach ($unit2->result() as $val) {
					$nLancar = $this->MFpd->unitLancar($val->fn_kodelk, $val->fn_nomdel, $val->fs_jenpiu, $val->fn_polpen, $val->fn_nompjb);
					$totalLancar += $nLancar->fn_lancar;

					// TOTAL OVERDUE
					$nOvdue = $this->MFpd0>unitOverdue($val->fn_kodelk, $val->fn_nomdel, $val->fs_jenpiu, $val->fn_polpen, $val->fn_nompjb);
					$totalOvdue += $nOvdue->fn_ovdue;
				}

				$xArr[] = array(
					'fn_kodelk' => trim($xRow->fn_kodelk),
					'fs_nama_surveyor' => trim($xRow->fs_ptgsvy),
					'fs_kode_cabang' => trim($cabang),
					'fd_start' => trim($mulai),
					'fd_end' => trim($selesai),
					'fn_penjualan' => trim($xRow->fn_penjualan),
					'fn_lancar' => trim($totalLancar),
					'fn_lunas' => trim($lunas->fn_lunas),
					'fn_ovdue' => trim($totalOvdue)
				);
			}
		}
		echo json_encode($xArr);
	}

	// DETAIL REPORT DEALER
	public function previewdealerdetail($cabang, $mulai, $selesai, $kodsup, $nomsup) {
		$this->load->library('Pdf');
		$this->load->model('MFpd');

		$data['data_dealer'] = $this->MFpd->getDataDealer($mulai, $selesai, $kodsup, $nomsup);
		$data['tanggal_mulai'] = $mulai;
		$data['tanggal_selesai'] = $selesai;

		$html = $this->load->view('print/vfpdpdfdealer', $data, true);
		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('DAFTAR FIRST PAYMENT DEFAULT');
		$pdf->SetPrintHeader(false);
		$pdf->SetMargins(8, 10, 35, true);
		$pdf->SetPrintFooter(false);
		$pdf->SetAutoPageBreak(True, PDF_MARGIN_FOOTER);
		$pdf->SetAuthor('REPORT');
		$pdf->SetDisplayMode('real', 'default');
		$pdf->SetFont('', '', 7.4, '', false);
		$pdf->AddPage('P', 'A4');
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->lastPage();
		$pdf->Output('daftar-fpd-cabang.pdf', 'I');
	}

	public function downloaddealerdetail($mulai, $selesai, $kodsup, $nomsup) {
		$this->load->model('MFpd');

		$data['data_dealer'] = $this->MFpd->getDataDealer($mulai, $selesai, $kodsup, $nomsup);
		$data['tanggal_mulai'] = $mulai;
		$data['tanggal_selesai'] = $selesai;
		$this->load->view('print/vfpdexceldealer', $data);
	}

	// DETAIL REPORT SURVEYOR
	public function previewsurveyordetail($mulai, $selesai, $ptgsvy, $kodelk) {
		$this->load->library('Pdf');
		$this->load->model('MFpd');

		$data['data_surveyor'] = $this->MFpd->getDataSurveyor($mulai, $selesai, $ptgsvy, $kodelk);
		$data['tanggal_mulai'] = $mulai;
		$data['tanggal_selesai'] = $selesai;

		$html = $this->load->view('print/vfpdpdfsurveyor', $data,true);
		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('DAFTAR FIRST PAYMENT DEFAULT');
		$pdf->SetPrintHeader(false);
		$pdf->SetMargins(10, 10, 40, true);
		$pdf->SetPrintFooter(false);
		$pdf->SetAutoPageBreak(True, PDF_MARGIN_FOOTER);
		$pdf->SetAuthor('REPORT');
		$pdf->SetDisplayMode('real', 'default');
		$pdf->SetFont('', '', 7.4, '', false);
		$pdf->AddPage('P', 'A4');
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->lastPage();
		$pdf->Output('daftar-fpd-cabang.pdf', 'I');
	}

	public function downloadsurveyordetail($mulai, $selesai, $ptgsvy, $kodelk) {
		$this->load->model('MFpd');

		$data['data_surveyor'] = $this->MFpd->getDataSurveyor($mulai, $selesai, $ptgsvy, $kodelk);
		$data['tanggal_mulai'] = $mulai;
		$data['tanggal_selesai'] = $selesai;
		$this->load->view('print/vfpdexcelsurveyor', $data);
	}

	// ALL REPORT DEALER
	public function previewpdfdealerall($cabang, $mulai, $selesai) {
		$this->load->library('Pdf');
		
		$this->db->trans_start();
		$this->load->model('MFpd');
		$sSQL = $this->MFpd->getReportDealer($cabang, $mulai, $selesai);
		$xTotal = $sSQL->num_rows();
		$this->db->trans_complete();

		$xArr = array();
		if ($sSQL->num_rows() > 0) {
			foreach ($sSQL->result() as $xRow) {

			}
		}

		$html = $this->load->view('print/vfpdpdfdealerall', $data,true);
		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('DAFTAR FIRST PAYMENT DEFAULT');
		$pdf->SetMargins(10, 10, 20, true);
		$pdf->SetPrintHeader(false);
		$pdf->SetPrintFooter(false);
		$pdf->SetAutoPageBreak(True, PDF_MARGIN_FOOTER);
		$pdf->SetAuthor('MFAS');
		$pdf->SetDisplayMode('real', 'default');
		$pdf->SetFont('', '', 7.4, '', false);
		$pdf->AddPage('P', 'A4');
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->lastPage();
		$pdf->Output('daftar-fpd-cabang.pdf', 'I');
	}

	public function downloadexceldealerall($cabang, $mulai, $selesai) {

		$this->db->trans_start();
		$this->load->model('MFpd');
		$sSQL = $this->MFpd->getReportDealer($cabang, $mulai, $selesai);
		$xTotal = $sSQL->num_rows();
		$this->db->trans_complete();

		$this->load->view('print/vfpdexceldealerall', $data);
	}

	// ALL REPORT SURVEYOR
	public function previewpdfsurveyorall($cabang, $mulai, $selesai) {
		$this->load->library('Pdf');
		$this->load->model('MFpd');

		$html = $this->load->view('print/vfpdpdfsurveyorall', $data,true);
		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('DAFTAR FIRST PAYMENT DEFAULT');
		$pdf->SetMargins(10, 10, 20, true);
		$pdf->SetPrintHeader(false);
		$pdf->SetPrintFooter(false);
		$pdf->SetAutoPageBreak(True, PDF_MARGIN_FOOTER);
		$pdf->SetAuthor('MFAS');
		$pdf->SetDisplayMode('real', 'default');
		$pdf->SetFont('', '', 7.4, '', false);
		$pdf->AddPage('P', 'A4');
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->lastPage();
		$pdf->Output('daftar-fpd-cabang.pdf', 'I');
	}

	public function downloadexcelsurveyorall($cabang, $mulai, $selesai) {

		$this->db->trans_start();
		$this->load->model('MFpd');
		$sSQL = $this->MFpd->getReportSurveyor($cabang, $mulai, $selesai);
		$xTotal = $sSQL->num_rows();
		$this->db->trans_complete();

		$xArr = array();
		if ($sSQL->num_rows() > 0) {
			foreach ($sSQL->result() as $xRow) {
				$unit1 = $this->MFpd->getUnit1($mulai, $selesai, $xRow->fn_kodsup, $xRow->fn_nomsup);
				$lunas = $this->MFpd->unitLunas1($mulai, $selesai, $xRow->fn_kodsup, $xRow->fn_nomsup);
			}
		}

		$data['tanggal_mulai'] = $mulai;
		$data['tanggal_selesai'] = $selesai;
		$data['data_surveyor'] = '';
		$this->load->view('print/vfpdexcelsurveyorall', $data);
	}

}