<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aging extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('login') <> TRUE) {
			redirect('login');
		}
	}

	public function index() {
		$this->load->view('vaging');
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

	public function gridgrouping() {
		$this->load->model('MAging');

		$cabang = $this->input->post('fs_kode_cabang');
		$mulai = $this->input->post('fd_start');
		$selesai = $this->input->post('fd_end');

		$arr = array(
			'CURRENT', '1-7 Hari',
			'8-15 Hari', '16-30 Hari',
			'31-60 Hari', '61-90 Hari',
			'91-120 Hari', '> 120 Hari', 'TOTAL'
		);

		$xArr = array();
		
		foreach ($arr as $val) {

			if ($val == 'CURRENT') {
				$aging = $this->MAging->getCurrent($cabang, $mulai, $selesai);
			}

			if ($val == '1-7 Hari') {
				$aging = $this->MAging->getUnit7($cabang, $mulai, $selesai, 0, 7);
			}

			if ($val == '8-15 Hari') {
				$aging = $this->MAging->getUnitNxt($cabang, $mulai, $selesai, 7, 15);
			}

			if ($val == '16-30 Hari') {
				$aging = $this->MAging->getUnitNxt($cabang, $mulai, $selesai, 15, 30);
			}

			if ($val == '31-60 Hari') {
				$aging = $this->MAging->getUnitNxt($cabang, $mulai, $selesai, 30, 60);
			}

			if ($val == '61-90 Hari') {
				$aging = $this->MAging->getUnitNxt($cabang, $mulai, $selesai, 60, 90);
			}

			if ($val == '91-120 Hari') {
				$aging = $this->MAging->getUnitNxt($cabang, $mulai, $selesai, 90, 120);
			}

			if ($val == '> 120 Hari') {
				$aging = $this->MAging->getMax($cabang, $mulai, $selesai, 120);
			}

			if ($val == 'TOTAL') {
				$aging = $this->MAging->getTotal($cabang, $mulai, $selesai);
			}

			$data = $aging->row();

			$xArr[] = array(
				'fs_kode_cabang' => trim($cabang),
				'fd_start' => trim($mulai),
				'fd_end' => trim($selesai),
				'fs_kategori' => trim($val),
				'fn_unit' => trim($data->fn_unit),
				'fn_ospokok' => number_format($data->fn_total_outnet, 0, ',', '.'),
			);		
		}

		echo json_encode($xArr);
	}

	// DETAIL REPORT AGING
	public function previewagingdetail($cabang, $mulai, $selesai, $kategori) {
		$this->load->library('Pdf');
		$this->load->model('MAging');
		$this->load->helper('day');

		$xkategori = urldecode($kategori);
		$data['tanggal_mulai'] = tanggal_indo($mulai);
		$data['tanggal_selesai'] = tanggal_indo($selesai);
		$data['kategori'] = $xkategori;
		
		if ($xkategori == 'CURRENT') {
			$data['detail'] = $this->MAging->getDetailCurrent($cabang, $mulai, $selesai);
		} 
		else if ($xkategori == '1-7 Hari') {
			$data['detail'] = $this->MAging->getDetailUnit7($cabang, $mulai, $selesai, 0, 7);
		}
		else if ($xkategori == '8-15 Hari') {
			$data['detail'] = $this->MAging->getDetailUnitNxt($cabang, $mulai, $selesai, 7, 15);
		}
		else if ($xkategori == '16-30 Hari') {
			$data['detail'] = $this->MAging->getDetailUnitNxt($cabang, $mulai, $selesai, 15, 30);
		}
		else if ($xkategori == '31-60 Hari') {
			$data['detail'] = $this->MAging->getDetailUnitNxt($cabang, $mulai, $selesai, 30, 60);
		}
		else if ($xkategori == '61-90 Hari') {
			$data['detail'] = $this->MAging->getDetailUnitNxt($cabang, $mulai, $selesai, 60, 90);
		}
		else if ($xkategori == '91-120 Hari') {
			$data['detail'] = $this->MAging->getDetailUnitNxt($cabang, $mulai, $selesai, 90, 120);
		}
		else if ($xkategori == '> 120 Hari') {
			$data['detail'] = $this->MAging->getDetailMax($cabang, $mulai, $selesai, 120);
		}
		else if ($xkategori == 'TOTAL') {
			$data['detail'] = $this->MAging->getDetailTotal($cabang, $mulai, $selesai);
		}

		$html = $this->load->view('print/vagingpdfsurveyor', $data, true);
		$pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('DAFTAR FIRST PAYMENT DEFAULT');
		$pdf->SetPrintHeader(false);
		$pdf->SetMargins(10, 10, 10, true);
		$pdf->SetPrintFooter(false);
		$pdf->SetAutoPageBreak(True, PDF_MARGIN_FOOTER);
		$pdf->SetAuthor('REPORT');
		$pdf->SetDisplayMode('fullpage');
		$pdf->SetFont('', '', 7, '', false);
		$pdf->AddPage('L', 'A4');
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->lastPage();
		$pdf->Output('daftar-aging-surveyor.pdf', 'I');
	}

	public function downloadagingdetail($cabang, $mulai, $selesai, $kategori) {
		$this->load->model('MAging');
		$this->load->helper('day');

		$xkategori = urldecode($kategori);
		$data['tanggal_mulai'] = tanggal_indo($mulai);
		$data['tanggal_selesai'] = tanggal_indo($selesai);
		$data['kategori'] = $xkategori;
		$data['nama_cabang'] = $this->MAging->getCabang($cabang);
		
		if ($xkategori == 'CURRENT') {
			$data['detail'] = $this->MAging->getDetailCurrent($cabang, $mulai, $selesai);
		} 
		else if ($xkategori == '1-7 Hari') {
			$data['detail'] = $this->MAging->getDetailUnit7($cabang, $mulai, $selesai, 0, 7);
		}
		else if ($xkategori == '8-15 Hari') {
			$data['detail'] = $this->MAging->getDetailUnitNxt($cabang, $mulai, $selesai, 7, 15);
		}
		else if ($xkategori == '16-30 Hari') {
			$data['detail'] = $this->MAging->getDetailUnitNxt($cabang, $mulai, $selesai, 15, 30);
		}
		else if ($xkategori == '31-60 Hari') {
			$data['detail'] = $this->MAging->getDetailUnitNxt($cabang, $mulai, $selesai, 30, 60);
		}
		else if ($xkategori == '61-90 Hari') {
			$data['detail'] = $this->MAging->getDetailUnitNxt($cabang, $mulai, $selesai, 60, 90);
		}
		else if ($xkategori == '91-120 Hari') {
			$data['detail'] = $this->MAging->getDetailUnitNxt($cabang, $mulai, $selesai, 90, 120);
		}
		else if ($xkategori == '> 120 Hari') {
			$data['detail'] = $this->MAging->getDetailMax($cabang, $mulai, $selesai, 120);
		}
		else if ($xkategori == 'TOTAL') {
			$data['detail'] = $this->MAging->getDetailTotal($cabang, $mulai, $selesai);
		}

		$this->load->view('print/vagingexcelsurveyor', $data);
	}

	// ALL REPORT AGING
	public function previewpdfagingall($cabang, $mulai, $selesai) {
		$this->load->library('Pdf');
		$this->load->model('MAging');
		$this->load->helper('day');

		$data['tanggal_mulai'] = tanggal_indo($mulai);
		$data['tanggal_selesai'] = tanggal_indo($selesai);
		$data['nama_cabang'] = $this->MAging->getCabang($cabang);

		// VALUE AGING
		$data['aging_current'] = $this->MAging->getCurrent($cabang, $mulai, $selesai)->row();
		$data['aging_unit0'] = $this->MAging->getUnit7($cabang, $mulai, $selesai, 0, 7)->row();
		$data['aging_unit7'] = $this->MAging->getUnitNxt($cabang, $mulai, $selesai, 7, 15)->row();
		$data['aging_unit15'] = $this->MAging->getUnitNxt($cabang, $mulai, $selesai, 15, 30)->row();
		$data['aging_unit30'] = $this->MAging->getUnitNxt($cabang, $mulai, $selesai, 30, 60)->row();
		$data['aging_unit60'] = $this->MAging->getUnitNxt($cabang, $mulai, $selesai, 60, 90)->row();
		$data['aging_unit90'] = $this->MAging->getUnitNxt($cabang, $mulai, $selesai, 90, 120)->row();
		$data['aging_max'] = $this->MAging->getMax($cabang, $mulai, $selesai, 120)->row();
		$data['aging_total'] = $this->MAging->getTotal($cabang, $mulai, $selesai)->row();

		$html = $this->load->view('print/vagingpdfsurveyorall', $data, true);
		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetMargins(10, 10, 10, true);
		$pdf->SetTitle('DAFTAR AGING SURVEYOR');
		$pdf->SetPrintHeader(false);
		$pdf->SetPrintFooter(false);
		$pdf->SetAutoPageBreak(True, PDF_MARGIN_FOOTER);
		$pdf->SetAuthor('REPORT');
		$pdf->SetDisplayMode('real', 'default');
		$pdf->SetFont('', '', 8, '', false);
		$pdf->AddPage('P', 'A4');
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->lastPage();
		$pdf->Output('daftar-aging-all.pdf', 'I');
	}

	public function downloadexcelagingall($cabang, $mulai, $selesai) {
		$this->load->model('MAging');
		$this->load->helper('day');

		$data['tanggal_mulai'] = tanggal_indo($mulai);
		$data['tanggal_selesai'] = tanggal_indo($selesai);
		$data['nama_cabang'] = $this->MAging->getCabang($cabang);

		// VALUE AGING
		$data['aging_current'] = $this->MAging->getCurrent($cabang, $mulai, $selesai)->row();
		$data['aging_unit0'] = $this->MAging->getUnit7($cabang, $mulai, $selesai, 0, 7)->row();
		$data['aging_unit7'] = $this->MAging->getUnitNxt($cabang, $mulai, $selesai, 7, 15)->row();
		$data['aging_unit15'] = $this->MAging->getUnitNxt($cabang, $mulai, $selesai, 15, 30)->row();
		$data['aging_unit30'] = $this->MAging->getUnitNxt($cabang, $mulai, $selesai, 30, 60)->row();
		$data['aging_unit60'] = $this->MAging->getUnitNxt($cabang, $mulai, $selesai, 60, 90)->row();
		$data['aging_unit90'] = $this->MAging->getUnitNxt($cabang, $mulai, $selesai, 90, 120)->row();
		$data['aging_max'] = $this->MAging->getMax($cabang, $mulai, $selesai, 120)->row();
		$data['aging_total'] = $this->MAging->getTotal($cabang, $mulai, $selesai)->row();

		$this->load->view('print/vagingexcelsurveyorall', $data);
	}

}