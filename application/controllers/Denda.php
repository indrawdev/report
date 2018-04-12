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
		$data['cabang_bsd'] = $this->MDenda->getReportAll('12');
		$data['cabang_bogor'] = $this->MDenda->getReportAll('14');
		$data['cabang_fatmawati1'] = $this->MDenda->getReportAll('15');
		$data['cabang_cibubur'] = $this->MDenda->getReportAll('18');
		$data['cabang_banjarmasin'] = $this->MDenda->getReportAll('21');
		$data['cabang_palangkaraya'] = $this->MDenda->getReportAll('24');
		$data['cabang_sampit'] = $this->MDenda->getReportAll('25');
		$data['cabang_pangkalanbun'] = $this->MDenda->getReportAll('26');
		$data['cabang_surabaya'] = $this->MDenda->getReportAll('30');
		$data['cabang_bali'] = $this->MDenda->getReportAll('32');
		$data['cabang_manado'] = $this->MDenda->getReportAll('40');
		$data['cabang_tomohon'] = $this->MDenda->getReportAll('45');
		$data['cabang_pangkalpinang'] = $this->MDenda->getReportAll('51');
		$data['cabang_jambi'] = $this->MDenda->getReportAll('60');
		$data['cabang_palembang'] = $this->MDenda->getReportAll('61');
		$data['cabang_fatmawati2'] = $this->MDenda->getReportAll('73');
		$data['cabang_jakarta1'] = $this->MDenda->getReportAll('82');
		$data['cabang_jakarta2'] = $this->MDenda->getReportAll('83');

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
		$pdf->Output('aging-denda.pdf', 'I');
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