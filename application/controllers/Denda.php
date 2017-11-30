<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Denda extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('login') <> TRUE) {
			redirect('login');
		}
	}

	public function test() {
		$this->load->library('Pdf');
		$this->load->model('MDenda');
		$this->load->helper('day');

		$start = date('Y-m-d', mktime(0, 0, 0, date('m'), '01', date('Y')));
		$end = date('Y-m-d', mktime(0, 0, 0, date('m'), '30', date('Y')));

		$data['periode_bulan'] = bulan_indo(date('Y-m-d'));
		$data['cabang_sunter'] = $this->MDenda->getReportAll('11', $start, $end);
		$html = $this->load->view('email/vdailyreportdenda', $data, true);
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
		$pdf->Output('aging-denda.pdf', 'I');
	}

}