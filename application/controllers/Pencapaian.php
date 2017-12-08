<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencapaian extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('login') <> TRUE) {
			redirect('login');
		}
	}

	public function index() {
		$this->load->view('vpencapaian');
	}

	public function grid() {
		$cabang = $this->input->post('fs_kode_cabang');
		$periode = $this->input->post('fd_periode');

		$this->db->trans_start();
		$this->load->model('MDenda');
		$sSQL = $this->MDenda->getReport($cabang, $periode);
		$xTotal = $sSQL->num_rows();
		$this->db->trans_complete();

		$xArr = array();
		if ($sSQL->num_rows() > 0) {
			foreach ($sSQL->result() as $xRow) {
				$total = $xRow->fn_sisabyr + $xRow->fn_jlsisa + $xRow->fn_sisabyr1 + $xRow->fn_jumlah;
				
				$xArr[] = array(
					'fs_kontrak' => trim($xRow->fs_kontrak),
					'fs_nampem' => trim($xRow->fs_nampem),
					'fd_tgljtp' => trim($xRow->fd_tgljtp),
					'fn_jlangd' => trim($xRow->fn_jlangd),
					'fd_tglbyr' => trim($xRow->fd_tglbyr),
					'fn_jumbyr' => trim($xRow->fn_jumbyr),
					'fd_tgltrm' => trim($xRow->fd_tgltrm),
					'fn_jumlah' => trim($xRow->fn_jumlah),
					'fn_anggih' => trim($xRow->fn_anggih),
					'fn_lamang' => trim($xRow->fn_lamang),
					'fn_outnet' => trim($xRow->fn_outnet),
					'fn_ovdnet' => trim($xRow->fn_ovdnet),
					'fn_lamovd' => trim($xRow->fn_lamovd),
					'fn_ovdgrs' => trim($xRow->fn_ovdgrs),
					'fd_tglupd' => trim($xRow->fd_tglupd),
					'fn_sisabyr' => trim($xRow->fn_sisabyr),
					'fn_jlsisa' => trim($xRow->fn_jlsisa),
					'fn_sisabyr1' => trim($xRow->fn_sisabyr1),
					'fn_total' => trim($total)
				);
			}
		}
		echo json_encode($xArr);
	}

	public function preview($cabang, $periode) {
		$this->load->library('Pdf');
		$this->load->model('MDenda');
		$this->load->helper('day');

		$data['periode_bulan'] = bulan_indo(date($periode));
		$data['pencapaian'] = $this->MDenda->getReport($cabang, $periode);
		$html = $this->load->view('print/vreportpencapaian', $data, true);
		$pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('DAFTAR PENCAPAIAN PENAGIHAN');
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
		$pdf->Output('report-pencapaian-penagihan.pdf', 'I');
	}

}