<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Denda extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('login') <> TRUE) {
			redirect('login');
		}
	}

	public function index() {
		$this->load->view('vdenda');
	}

	public function grid() {
		$cabang = $this->input->post('fs_kode_cabang');
		$mulai = $this->input->post('fd_start');
		$selesai = $this->input->post('fd_end');

		$this->db->trans_start();
		$this->load->model('MDenda');
		$sSQL = $this->MDenda->getDenda($cabang, $mulai, $selesai);
		$xTotal = $sSQL->num_rows();
		$this->db->trans_complete();

		$xArr = array();
		if ($sSQL->num_rows() > 0) {
			foreach ($sSQL->result() as $xRow) {
				$xArr[] = array(

				);
			}
		}
		echo json_encode($xArr);
	}

	public function test() {
		$this->load->library('Pdf');
		$this->load->model('MDenda');
		$this->load->helper('day');

		$data['periode_bulan'] = bulan_indo(date('Y-m-d'));
		$data['cabang_sunter'] = $this->MDenda->getReportAll('11');
		

		$html = $this->load->view('email/vdailyreportdenda', $data, true);
		$pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('DAFTAR REPORT DENDA');
		$pdf->SetPrintHeader(false);
		$pdf->SetMargins(10, 10, 10, true);
		$pdf->SetPrintFooter(false);
		$pdf->SetAutoPageBreak(True, PDF_MARGIN_FOOTER);
		$pdf->SetAuthor('REPORT');
		$pdf->SetDisplayMode('real', 'default');
		$pdf->SetFont('', '', 6, '', false);
		$pdf->AddPage('L', 'A4');
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->lastPage();
		$pdf->Output('report-denda.pdf', 'I');
	}

	public function preview($cabang, $start, $end) {
		$this->load->library('Pdf');
		$this->load->model('MDenda');
		$this->load->helper('day');

		$data['periode_bulan'] = bulan_indo(date($start));
		//$data['denda'] = $this->MDenda->getReportAll($cabang, $start, $end);
		$html = $this->load->view('print/vreportdenda', $data, true);
		$pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('DAFTAR FIRST PAYMENT DEFAULT');
		$pdf->SetPrintHeader(false);
		$pdf->SetMargins(10, 10, 10, true);
		$pdf->SetPrintFooter(false);
		$pdf->SetAutoPageBreak(True, PDF_MARGIN_FOOTER);
		$pdf->SetAuthor('REPORT');
		$pdf->SetDisplayMode('real', 'default');
		$pdf->SetFont('', '', 6, '', false);
		$pdf->AddPage('L', 'A4');
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->lastPage();
		$pdf->Output('report-denda.pdf', 'I');
	}

}