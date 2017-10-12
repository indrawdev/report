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
				$days = $xRow->fn_1_7 + $xRow->fn_8_15 + $xRow->fn_16_30 + $xRow->fn_61_90 + $xRow->fn_91_120 + $xRow->fn_max;
				$ovd = number_format(($days / $xRow->fn_total) * 100) . '%';
				
				$xArr[] = array(
					'fn_kodekr' => trim($cabang),
					'fd_start' => trim($mulai),
					'fd_end' => trim($selesai),
					'fn_koddel' => trim($xRow->fn_koddel),
					'fs_namdel' => trim($xRow->fs_namdel),
					'fn_current' => trim($xRow->fn_current),
					'fn_1_7' => trim($xRow->fn_1_7),
					'fn_8_15' => trim($xRow->fn_8_15),
					'fn_16_30' => trim($xRow->fn_16_30),
					'fn_31_60' => trim($xRow->fn_31_60),
					'fn_61_90' => trim($xRow->fn_61_90),
					'fn_91_120' => trim($xRow->fn_91_120),
					'fn_max' => trim($xRow->fn_max),
					'fn_total' => trim($xRow->fn_total),
					'fn_ovd' => trim($ovd)
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
				$days = $xRow->fn_1_7 + $xRow->fn_8_15 + $xRow->fn_16_30 + $xRow->fn_61_90 + $xRow->fn_91_120 + $xRow->fn_max;
				$ovd = number_format(($days / $xRow->fn_total) * 100) . '%';

				$xArr[] = array(
					'fn_kodekr' => trim($cabang),
					'fd_start' => trim($mulai),
					'fd_end' => trim($selesai),
					'fs_ptgsvy' => trim($xRow->fs_ptgsvy),
					'fs_nama_surveyor' => trim($xRow->fs_nama_surveyor),
					'fn_current' => trim($xRow->fn_current),
					'fn_1_7' => trim($xRow->fn_1_7),
					'fn_8_15' => trim($xRow->fn_8_15),
					'fn_16_30' => trim($xRow->fn_16_30),
					'fn_31_60' => trim($xRow->fn_31_60),
					'fn_61_90' => trim($xRow->fn_61_90),
					'fn_91_120' => trim($xRow->fn_91_120),
					'fn_max' => trim($xRow->fn_max),
					'fn_total' => trim($xRow->fn_total),
					'fn_ovd' => trim($ovd)
				);
			}
		}
		echo json_encode($xArr);
	}

	// DETAIL REPORT DEALER
	public function previewdealerdetail($cabang, $mulai, $selesai, $dealer) {
		$this->load->library('Pdf');
		$this->load->model('MFpd');
		$this->load->helper('day');

		$data['tanggal_mulai'] = tanggal_indo($mulai);
		$data['tanggal_selesai'] = tanggal_indo($selesai);
		$data['detail'] = $this->MFpd->getDetailDealer($cabang, $mulai, $selesai, $dealer);

		$html = $this->load->view('print/vfpdpdfdealer', $data, true);
		$pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('DAFTAR FIRST PAYMENT DEFAULT');
		$pdf->SetPrintHeader(false);
		$pdf->SetMargins(10, 10, 10, true);
		$pdf->SetPrintFooter(false);
		$pdf->SetAutoPageBreak(True, PDF_MARGIN_FOOTER);
		$pdf->SetAuthor('REPORT');
		$pdf->SetDisplayMode('real', 'default');
		$pdf->SetFont('', '', 7, '', false);
		$pdf->AddPage('L', 'A4');
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->lastPage();
		$pdf->Output('fpd-dealer-'.$cabang.'-'.$dealer.'.pdf', 'I');
	}

	public function downloaddealerdetail($cabang, $mulai, $selesai, $dealer) {
		$this->load->model('MFpd');
		$this->load->helper('day');

		$data['tanggal_mulai'] = tanggal_indo($mulai);
		$data['tanggal_selesai'] = tanggal_indo($selesai);
		$data['detail'] = $this->MFpd->getDetailDealer($cabang, $mulai, $selesai, $dealer);
		$data['nama_cabang'] = $this->MFpd->getCabang($cabang);

		$this->load->view('print/vfpdexceldealer', $data);
	}

	// DETAIL REPORT SURVEYOR
	public function previewsurveyordetail($cabang, $mulai, $selesai, $ptgsvy) {
		$this->load->library('Pdf');
		$this->load->model('MFpd');
		$this->load->helper('day');

		$data['tanggal_mulai'] = tanggal_indo($mulai);
		$data['tanggal_selesai'] = tanggal_indo($selesai);
		$data['detail'] = $this->MFpd->getDetailSurveyor($cabang, $mulai, $selesai, $ptgsvy);
		$data['nama_cabang'] = $this->MFpd->getCabang($cabang);

		$html = $this->load->view('print/vfpdpdfsurveyor', $data,true);
		$pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('DAFTAR FIRST PAYMENT DEFAULT');
		$pdf->SetPrintHeader(false);
		$pdf->SetMargins(10, 10, 10, true);
		$pdf->SetPrintFooter(false);
		$pdf->SetAutoPageBreak(True, PDF_MARGIN_FOOTER);
		$pdf->SetAuthor('REPORT');
		$pdf->SetDisplayMode('real', 'default');
		$pdf->SetFont('', '', 7, '', false);
		$pdf->AddPage('L', 'A4');
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->lastPage();
		$pdf->Output('fpd-surveyor-'.$cabang.'-'.$ptgsvy.'.pdf', 'I');
	}

	public function downloadsurveyordetail($cabang, $mulai, $selesai, $ptgsvy) {
		$this->load->model('MFpd');
		$this->load->helper('day');

		$data['tanggal_mulai'] = tanggal_indo($mulai);
		$data['tanggal_selesai'] = tanggal_indo($selesai);
		$data['detail'] = $this->MFpd->getDetailSurveyor($cabang, $mulai, $selesai, $ptgsvy);
		$data['nama_cabang'] = $this->MFpd->getCabang($cabang);

		$this->load->view('print/vfpdexcelsurveyor', $data);
	}

	// ALL REPORT DEALER
	public function previewpdfdealerall($cabang, $mulai, $selesai) {
		$this->load->library('Pdf');
		$this->load->model('MFpd');
		$this->load->helper('day');

		$data['tanggal_mulai'] = tanggal_indo($mulai);
		$data['tanggal_selesai'] = tanggal_indo($selesai);
		$data['all'] = $this->MFpd->getReportDealer($cabang, $mulai, $selesai);
		$data['nama_cabang'] = $this->MFpd->getCabang($cabang);

		$html = $this->load->view('print/vfpdpdfdealerall', $data,true);
		$pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('DAFTAR FIRST PAYMENT DEFAULT');
		$pdf->SetMargins(10, 10, 10, true);
		$pdf->SetPrintHeader(false);
		$pdf->SetPrintFooter(false);
		$pdf->SetAutoPageBreak(True, PDF_MARGIN_FOOTER);
		$pdf->SetAuthor('REPORT');
		$pdf->SetDisplayMode('real', 'default');
		$pdf->SetFont('', '', 7.2, '', false);
		$pdf->AddPage('L', 'A4');
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->lastPage();
		$pdf->Output('daftar-fpd-dealer-'.$cabang.'.pdf', 'I');
	}

	public function downloadexceldealerall($cabang, $mulai, $selesai) {
		$this->load->model('MFpd');
		$this->load->helper('day');

		$data['tanggal_mulai'] = tanggal_indo($mulai);
		$data['tanggal_selesai'] = tanggal_indo($selesai);
		$data['all'] = $this->MFpd->getReportDealer($cabang, $mulai, $selesai);
		$data['nama_cabang'] = $this->MFpd->getCabang($cabang);

		$this->load->view('print/vfpdexceldealerall', $data);
	}

	// ALL REPORT SURVEYOR
	public function previewpdfsurveyorall($cabang, $mulai, $selesai) {
		$this->load->library('Pdf');
		$this->load->model('MFpd');
		$this->load->helper('day');

		$data['tanggal_mulai'] = tanggal_indo($mulai);
		$data['tanggal_selesai'] = tanggal_indo($selesai);
		$data['all'] = $this->MFpd->getReportSurveyor($cabang, $mulai, $selesai);
		$data['nama_cabang'] = $this->MFpd->getCabang($cabang);

		$html = $this->load->view('print/vfpdpdfsurveyorall', $data, true);
		$pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('DAFTAR FIRST PAYMENT DEFAULT');
		$pdf->SetMargins(10, 10, 10, true);
		$pdf->SetPrintHeader(false);
		$pdf->SetPrintFooter(false);
		$pdf->SetAutoPageBreak(True, PDF_MARGIN_FOOTER);
		$pdf->SetAuthor('REPORT');
		$pdf->SetDisplayMode('real', 'default');
		$pdf->SetFont('', '', 7.2, '', false);
		$pdf->AddPage('L', 'A4');
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->lastPage();
		$pdf->Output('daftar-fpd-surveyor-'.$cabang.'.pdf', 'I');
	}

	public function downloadexcelsurveyorall($cabang, $mulai, $selesai) {
		$this->load->model('MFpd');
		$this->load->helper('day');

		$data['tanggal_mulai'] = tanggal_indo($mulai);
		$data['tanggal_selesai'] = tanggal_indo($selesai);
		$data['all'] = $this->MFpd->getReportSurveyor($cabang, $mulai, $selesai);
		$data['nama_cabang'] = $this->MFpd->getCabang($cabang);

		$this->load->view('print/vfpdexcelsurveyorall', $data);
	}

}