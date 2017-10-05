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
				$unit = $this->MAging->getCurrent($cabang, $mulai, $selesai);
			}

			if ($val == '1-7 Hari') {
				$unit = $this->MAging->getUnit($cabang, $mulai, $selesai, 1, 7);
			}

			if ($val == '8-15 Hari') {
				$unit = $this->MAging->getUnit($cabang, $mulai, $selesai, 7, 15);
			}

			if ($val == '16-30 Hari') {
				$unit = $this->MAging->getUnit($cabang, $mulai, $selesai, 15, 30);
			}

			if ($val == '31-60 Hari') {
				$unit = $this->MAging->getUnit($cabang, $mulai, $selesai, 30, 60);
			}

			if ($val == '61-90 Hari') {
				$unit = $this->MAging->getUnit($cabang, $mulai, $selesai, 60, 90);
			}

			if ($val == '91-120 Hari') {
				$unit = $this->MAging->getUnit($cabang, $mulai, $selesai, 90, 120);
			}

			if ($val == '> 120 Hari') {
				$unit = $this->MAging->getMax($cabang, $mulai, $selesai, 120);
			}

			if ($val == 'TOTAL') {
				$unit = $this->MAging->getTotal($cabang, $mulai, $selesai);
			}

			$units = $unit->row();

			$totalpokok = 0;

			$aging = $this->MAging->getAging($cabang, $mulai, $selesai);

			foreach ($aging->result() as $a) {
				if ($val == 'CURRENT') {
					$detail = $this->MAging->getDetailCurrent($a->fn_kodelk, $a->fn_nomdel, $a->fs_jenpiu, $a->fn_polpen, $a->fn_nompjb);
					if ($detail->num_rows() > 0) {
						$outnet = 0;
						$d = $detail->row();

						if ($d->fn_outnet) {
							$outnet = $d->fn_outnet;
						}
						$totalpokok += $outnet;
					}
				}

				if ($val == '1-7 Hari') {
					$detail = $this->MAging->getDetailUnit($a->fn_kodelk, $a->fn_nomdel, $a->fs_jenpiu, $a->fn_polpen, $a->fn_nompjb, 1, 7);
					if ($detail->num_rows() > 0) {
						$outnet = 0;
						$d = $detail->row();

						if ($d->fn_outnet) {
							$outnet = $d->fn_outnet;
						}
						$totalpokok += $outnet;
					}
				}

				if ($val == '8-15 Hari') {
					$detail = $this->MAging->getDetailUnit($a->fn_kodelk, $a->fn_nomdel, $a->fs_jenpiu, $a->fn_polpen, $a->fn_nompjb, 7, 15);
					if ($detail->num_rows() > 0) {
						$outnet = 0;
						$d = $detail->row();

						if ($d->fn_outnet) {
							$outnet = $d->fn_outnet;
						}
						$totalpokok += $outnet;
					}
				}

				if ($val == '16-30 Hari') {
					$detail = $this->MAging->getDetailUnit($a->fn_kodelk, $a->fn_nomdel, $a->fs_jenpiu, $a->fn_polpen, $a->fn_nompjb, 15, 30);
					if ($detail->num_rows() > 0) {
						$outnet = 0;
						$d = $detail->row();

						if ($d->fn_outnet) {
							$outnet = $d->fn_outnet;
						}
						$totalpokok += $outnet;
					}
				}

				if ($val == '31-60 Hari') {
					$detail = $this->MAging->getDetailUnit($a->fn_kodelk, $a->fn_nomdel, $a->fs_jenpiu, $a->fn_polpen, $a->fn_nompjb, 30, 60);
					if ($detail->num_rows() > 0) {
						$outnet = 0;
						$d = $detail->row();

						if ($d->fn_outnet) {
							$outnet = $d->fn_outnet;
						}
						$totalpokok += $outnet;
					}
				}

				if ($val == '61-90 Hari') {
					$detail = $this->MAging->getDetailUnit($a->fn_kodelk, $a->fn_nomdel, $a->fs_jenpiu, $a->fn_polpen, $a->fn_nompjb, 60, 90);
					if ($detail->num_rows() > 0) {
						$outnet = 0;
						$d = $detail->row();

						if ($d->fn_outnet) {
							$outnet = $d->fn_outnet;
						}
						$totalpokok += $outnet;
					}
				}

				if ($val == '91-120 Hari') {
					$detail = $this->MAging->getDetailUnit($a->fn_kodelk, $a->fn_nomdel, $a->fs_jenpiu, $a->fn_polpen, $a->fn_nompjb, 90, 120);
					if ($detail->num_rows() > 0) {
						$outnet = 0;
						$d = $detail->row();

						if ($d->fn_outnet) {
							$outnet = $d->fn_outnet;
						}
						$totalpokok += $outnet;
					}
				}

				if ($val == '> 120 Hari') {
					$detail = $this->MAging->getDetailMax($a->fn_kodelk, $a->fn_nomdel, $a->fs_jenpiu, $a->fn_polpen, $a->fn_nompjb, 120);
					if ($detail->num_rows() > 0) {
						$outnet = 0;
						$d = $detail->row();

						if ($d->fn_outnet) {
							$outnet = $d->fn_outnet;
						}
						$totalpokok += $outnet;
					}
				}

				if ($val == 'TOTAL') {
					$detail = $this->MAging->getDetailTotal($a->fn_kodelk, $a->fn_nomdel, $a->fs_jenpiu, $a->fn_polpen, $a->fn_nompjb);
					if ($detail->num_rows() > 0) {
						$outnet = 0;
						$d = $detail->row();

						if ($d->fn_outnet) {
							$outnet = $d->fn_outnet;
						}
						$totalpokok += $outnet;
					}
				}
			}

			$xArr[] = array(
				'fs_kode_cabang' => trim($cabang),
				'fd_start' => trim($mulai),
				'fd_end' => trim($selesai),
				'fs_kategori' => trim($val),
				'fn_unit' => trim($units->fn_unit),
				'fn_ospokok' => number_format($totalpokok, 0, ',', '.'),
			);		
		}

		echo json_encode($xArr);
	}

	// DETAIL REPORT AGING
	public function previewagingdetail($cabang, $mulai, $selesai, $kategori) {
		$this->load->library('Pdf');
		$this->load->model('MAging');

		$data['tanggal_mulai'] = $mulai;
		$data['tanggal_selesai'] = $selesai;
		$data['kategori'] = $kategori;
		$data['nama_cabang'] = $this->MAging->getCabang($cabang);
		$data['agings'] = $this->MAging->getAging($cabang, $mulai, $selesai);
		
		/*
		// DETAIL
		$data['detail_current'] = $this->MAging->getCurrent($cabang, $mulai, $selesai, 0, 0);
		$data['detail_1_7'] = $this->MAging->getUnit($cabang, $mulai, $selesai, 1, 7);
		$data['detail_8_15'] = $this->MAging->getUnit($cabang, $mulai, $selesai, 7, 15);
		$data['detail_16_30'] = $this->MAging->getUnit($cabang, $mulai, $selesai, 15, 30);
		$data['detail_31_60'] = $this->MAging->getUnit($cabang, $mulai, $selesai, 30, 60);
		$data['detail_61_90'] = $this->MAging->getUnit($cabang, $mulai, $selesai, 60, 90);
		$data['detail_91_120'] = $this->MAging->getUnit($cabang, $mulai, $selesai, 90, 120);
		$data['detail_120'] = $this->MAging->getMax($cabang, $mulai, $selesai, 120);
		$data['detail_total'] = $this->MAging->getTotal($cabang, $mulai, $selesai);
		*/

		$html = $this->load->view('print/vagingpdfsurveyor', $data, true);
		$pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('DAFTAR FIRST PAYMENT DEFAULT');
		$pdf->SetPrintHeader(false);
		$pdf->SetMargins(10, 10, 40, true);
		$pdf->SetPrintFooter(false);
		$pdf->SetAutoPageBreak(True, PDF_MARGIN_FOOTER);
		$pdf->SetAuthor('REPORT');
		$pdf->SetDisplayMode('real', 'default');
		$pdf->SetFont('', '', 7.4, '', false);
		$pdf->AddPage('L', 'A4');
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->lastPage();
		$pdf->Output('daftar-aging-surveyor.pdf', 'I');
	}

	public function downloadagingdetail($cabang, $mulai, $selesai, $kategori) {
		$this->load->model('MAging');

		$data['tanggal_mulai'] = date('Y-m-d', strtotime($mulai));
		$data['tanggal_selesai'] = date('Y-m-d', strtotime($selesai));
		$data['kategori'] = $kategori;
		$data['nama_cabang'] = $this->MAging->getCabang($cabang);
		$data['detail_aging'] = $this->MAging->getAging($cabang, $mulai, $selesai);
		$this->load->view('print/vagingexcelsurveyor', $data);
	}

	// ALL REPORT AGING
	public function previewpdfagingall($cabang, $mulai, $selesai) {
		$this->load->library('Pdf');
		$this->load->model('MAging');

		$arr = array(
			'CURRENT', '1-7 Hari',
			'8-15 Hari', '16-30 Hari',
			'31-60 Hari', '61-90 Hari',
			'91-120 Hari', '> 120 Hari', 'TOTAL'
		);

		$xArr = array();
		foreach ($arr as $val) {
			$display = $this->MAging->getDisplay($cabang, $mulai, $selesai);
			$count = $this->MAging->getCount($cabang, $mulai, $selesai);

			if ($val == 'CURRENT') {
				$unit = $this->MAging->getCurrent($cabang, $mulai, $selesai, 0, 0);
			}

			if ($val == '1-7 Hari') {
				$unit = $this->MAging->getUnit($cabang, $mulai, $selesai, 1, 7);
			}

			if ($val == '8-15 Hari') {
				$unit = $this->MAging->getUnit($cabang, $mulai, $selesai, 7, 15);
			}

			if ($val == '16-30 Hari') {
				$unit = $this->MAging->getUnit($cabang, $mulai, $selesai, 15, 30);
			}

			if ($val == '31-60 Hari') {
				$unit = $this->MAging->getUnit($cabang, $mulai, $selesai, 30, 60);
			}

			if ($val == '61-90 Hari') {
				$unit = $this->MAging->getUnit($cabang, $mulai, $selesai, 60, 90);
			}

			if ($val == '91-120 Hari') {
				$unit = $this->MAging->getUnit($cabang, $mulai, $selesai, 90, 120);
			}

			if ($val == '> 120 Hari') {
				$unit = $this->MAging->getMax($cabang, $mulai, $selesai, 120);
			}

			if ($val == 'TOTAL') {
				$unit = $this->MAging->getTotal($cabang, $mulai, $selesai);
			}

			$units = $unit->row();

			$totalpokok = 0;
			$totalpiuta = 0;
			$tanggalupd = '';

			foreach ($display->result() as $key) {
				
				if ($val == 'CURRENT') {
					$detail = $this->MAging->getDetailCurrent($key->fn_kodelk, $key->fn_nomdel, $key->fs_jenpiu, $key->fn_polpen, $key->fn_nompjb, 0, 0);
					
					if ($detail->num_rows() > 0) {
						$outgrs = 0;
						$outnet = 0;
						$tglupd = '';

						$a = $detail->row();

						if (!empty($a->fn_outgrs)) {
							$outgrs = $a->fn_outgrs;
						}

						if (!empty($a->fn_outnet)) {
							$outnet = $a->fn_outnet;
						}

						if (!empty($a->fd_tglupd)) {
							$tglupd = $a->fd_tglupd;
						}

						$totalpokok += $outgrs;
						$totalpiuta += $outnet;
						$tanggalupd = $tglupd;
					}
				}
				
				if ($val == '1-7 Hari') {
					$detail = $this->MAging->getDetailUnit($key->fn_kodelk, $key->fn_nomdel, $key->fs_jenpiu, $key->fn_polpen, $key->fn_nompjb, 0, 7);
					if ($detail->num_rows() > 0) {
						$outgrs = 0;
						$outnet = 0;
						$tglupd = '';

						$a = $detail->row();

						if (!empty($a->fn_outgrs)) {
							$outgrs = $a->fn_outgrs;
						}

						if (!empty($a->fn_outnet)) {
							$outnet = $a->fn_outnet;
						}

						if (!empty($a->fd_tglupd)) {
							$tglupd = $a->fd_tglupd;
						}

						$totalpokok += $outgrs;
						$totalpiuta += $outnet;
						$tanggalupd = $tglupd;
					}
				}

				if ($val == '8-15 Hari') {
					$detail = $this->MAging->getDetailUnit($key->fn_kodelk, $key->fn_nomdel, $key->fs_jenpiu, $key->fn_polpen, $key->fn_nompjb, 7, 15);
					if ($detail->num_rows() > 0) {
						$outgrs = 0;
						$outnet = 0;
						$tglupd = '';

						$a = $detail->row();

						if (!empty($a->fn_outgrs)) {
							$outgrs = $a->fn_outgrs;
						}

						if (!empty($a->fn_outnet)) {
							$outnet = $a->fn_outnet;
						}

						if (!empty($a->fd_tglupd)) {
							$tglupd = $a->fd_tglupd;
						}

						$totalpokok += $outgrs;
						$totalpiuta += $outnet;
						$tanggalupd = $tglupd;
					}
				}

				if ($val == '16-30 Hari') {
					$detail = $this->MAging->getDetailUnit($key->fn_kodelk, $key->fn_nomdel, $key->fs_jenpiu, $key->fn_polpen, $key->fn_nompjb, 15, 30);
					if ($detail->num_rows() > 0) {
						$outgrs = 0;
						$outnet = 0;
						$tglupd = '';

						$a = $detail->row();

						if (!empty($a->fn_outgrs)) {
							$outgrs = $a->fn_outgrs;
						}

						if (!empty($a->fn_outnet)) {
							$outnet = $a->fn_outnet;
						}

						if (!empty($a->fd_tglupd)) {
							$tglupd = $a->fd_tglupd;
						}

						$totalpokok += $outgrs;
						$totalpiuta += $outnet;
						$tanggalupd = $tglupd;
					}
				}

				if ($val == '31-60 Hari') {
					$detail = $this->MAging->getDetailUnit($key->fn_kodelk, $key->fn_nomdel, $key->fs_jenpiu, $key->fn_polpen, $key->fn_nompjb, 30, 60);
					if ($detail->num_rows() > 0) {
						$outgrs = 0;
						$outnet = 0;
						$tglupd = '';

						$a = $detail->row();

						if (!empty($a->fn_outgrs)) {
							$outgrs = $a->fn_outgrs;
						}

						if (!empty($a->fn_outnet)) {
							$outnet = $a->fn_outnet;
						}

						if (!empty($a->fd_tglupd)) {
							$tglupd = $a->fd_tglupd;
						}

						$totalpokok += $outgrs;
						$totalpiuta += $outnet;
						$tanggalupd = $tglupd;
					}
				}

				if ($val == '61-90 Hari') {
					$detail = $this->MAging->getDetailUnit($key->fn_kodelk, $key->fn_nomdel, $key->fs_jenpiu, $key->fn_polpen, $key->fn_nompjb, 60, 90);
					if ($detail->num_rows() > 0) {
						$outgrs = 0;
						$outnet = 0;
						$tglupd = '';

						$a = $detail->row();

						if (!empty($a->fn_outgrs)) {
							$outgrs = $a->fn_outgrs;
						}

						if (!empty($a->fn_outnet)) {
							$outnet = $a->fn_outnet;
						}

						if (!empty($a->fd_tglupd)) {
							$tglupd = $a->fd_tglupd;
						}

						$totalpokok += $outgrs;
						$totalpiuta += $outnet;
						$tanggalupd = $tglupd;
					}
				}

				if ($val == '91-120 Hari') {
					$detail = $this->MAging->getDetailUnit($key->fn_kodelk, $key->fn_nomdel, $key->fs_jenpiu, $key->fn_polpen, $key->fn_nompjb, 90, 120);
					if ($detail->num_rows() > 0) {
						$outgrs = 0;
						$outnet = 0;
						$tglupd = '';

						$a = $detail->row();

						if (!empty($a->fn_outgrs)) {
							$outgrs = $a->fn_outgrs;
						}

						if (!empty($a->fn_outnet)) {
							$outnet = $a->fn_outnet;
						}

						if (!empty($a->fd_tglupd)) {
							$tglupd = $a->fd_tglupd;
						}

						$totalpokok += $outgrs;
						$totalpiuta += $outnet;
						$tanggalupd = $tglupd;
					}
				}

				if ($val == '> 120 Hari') {
					$detail = $this->MAging->getDetailMax($key->fn_kodelk, $key->fn_nomdel, $key->fs_jenpiu, $key->fn_polpen, $key->fn_nompjb, 120);
					if ($detail->num_rows() > 0) {
						$outgrs = 0;
						$outnet = 0;
						$tglupd = '';

						$a = $detail->row();

						if (!empty($a->fn_outgrs)) {
							$outgrs = $a->fn_outgrs;
						}

						if (!empty($a->fn_outnet)) {
							$outnet = $a->fn_outnet;
						}

						if (!empty($a->fd_tglupd)) {
							$tglupd = $a->fd_tglupd;
						}

						$totalpokok += $outgrs;
						$totalpiuta += $outnet;
						$tanggalupd = $tglupd;
					}
				}

				if ($val == 'TOTAL') {
					$detail = $this->MAging->getDetailTotal($key->fn_kodelk, $key->fn_nomdel, $key->fs_jenpiu, $key->fn_polpen, $key->fn_nompjb);
					if ($detail->num_rows() > 0) {
						$outgrs = 0;
						$outnet = 0;
						$tglupd = '';

						$a = $detail->row();

						if (!empty($a->fn_outgrs)) {
							$outgrs = $a->fn_outgrs;
						}

						if (!empty($a->fn_outnet)) {
							$outnet = $a->fn_outnet;
						}

						if (!empty($a->fd_tglupd)) {
							$tglupd = $a->fd_tglupd;
						}

						$totalpokok += $outgrs;
						$totalpiuta += $outnet;
						$tanggalupd = $tglupd;
					}
				}
			}

			$xArr[] = array(
				'fd_start' => trim($mulai),
				'fd_end' => trim($selesai),
				'fn_unit' => trim($units->fn_unit),
				'fs_kode_cabang' => trim($cabang),
				'fs_kategori' => trim($val),
				'fn_ospiuta' => number_format($totalpiuta, 0, ',', '.'),
				'fn_ospokok' => number_format($totalpokok, 0, ',', '.'),
			);
		}

		$data['all_aging'] = $xArr;
		$data['nama_cabang'] = $this->MAging->getCabang($cabang);

		$html = $this->load->view('print/vagingpdfsurveyorall', $data, true);
		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetMargins(10, 10, 20, true);
		$pdf->SetTitle('DAFTAR AGING SURVEYOR');
		$pdf->SetPrintHeader(false);
		$pdf->SetPrintFooter(false);
		$pdf->SetAutoPageBreak(True, PDF_MARGIN_FOOTER);
		$pdf->SetAuthor('REPORT');
		$pdf->SetDisplayMode('real', 'default');
		$pdf->SetFont('', '', 7.4, '', false);
		$pdf->AddPage('P', 'A4');
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->lastPage();
		$pdf->Output('daftar-aging-all.pdf', 'I');
	}

	public function downloadexcelagingall($cabang, $mulai, $selesai) {
		$this->load->model('MAging');
		
		$arr = array(
			'CURRENT', '1-7 Hari',
			'8-15 Hari', '16-30 Hari',
			'31-60 Hari', '61-90 Hari',
			'91-120 Hari', '> 120 Hari', 'TOTAL'
		);

		$xArr = array();
		foreach ($arr as $val) {
			$display = $this->MAging->getDisplay($cabang, $mulai, $selesai);
			$count = $this->MAging->getCount($cabang, $mulai, $selesai);

			if ($val == 'CURRENT') {
				$unit = $this->MAging->getCurrent($cabang, $mulai, $selesai, 0, 0);
			}

			if ($val == '1-7 Hari') {
				$unit = $this->MAging->getUnit($cabang, $mulai, $selesai, 1, 7);
			}

			if ($val == '8-15 Hari') {
				$unit = $this->MAging->getUnit($cabang, $mulai, $selesai, 7, 15);
			}

			if ($val == '16-30 Hari') {
				$unit = $this->MAging->getUnit($cabang, $mulai, $selesai, 15, 30);
			}

			if ($val == '31-60 Hari') {
				$unit = $this->MAging->getUnit($cabang, $mulai, $selesai, 30, 60);
			}

			if ($val == '61-90 Hari') {
				$unit = $this->MAging->getUnit($cabang, $mulai, $selesai, 60, 90);
			}

			if ($val == '91-120 Hari') {
				$unit = $this->MAging->getUnit($cabang, $mulai, $selesai, 90, 120);
			}

			if ($val == '> 120 Hari') {
				$unit = $this->MAging->getMax($cabang, $mulai, $selesai, 120);
			}

			if ($val == 'TOTAL') {
				$unit = $this->MAging->getTotal($cabang, $mulai, $selesai);
			}

			$units = $unit->row();

			$totalpokok = 0;
			$totalpiuta = 0;
			$tanggalupd = '';

			foreach ($display->result() as $key) {
				
				if ($val == 'CURRENT') {
					$detail = $this->MAging->getDetailCurrent($key->fn_kodelk, $key->fn_nomdel, $key->fs_jenpiu, $key->fn_polpen, $key->fn_nompjb, 0, 0);
					
					if ($detail->num_rows() > 0) {
						$outgrs = 0;
						$outnet = 0;
						$tglupd = '';

						$a = $detail->row();

						if (!empty($a->fn_outgrs)) {
							$outgrs = $a->fn_outgrs;
						}

						if (!empty($a->fn_outnet)) {
							$outnet = $a->fn_outnet;
						}

						if (!empty($a->fd_tglupd)) {
							$tglupd = $a->fd_tglupd;
						}

						$totalpokok += $outgrs;
						$totalpiuta += $outnet;
						$tanggalupd = $tglupd;
					}
				}
				
				if ($val == '1-7 Hari') {
					$detail = $this->MAging->getDetailUnit($key->fn_kodelk, $key->fn_nomdel, $key->fs_jenpiu, $key->fn_polpen, $key->fn_nompjb, 0, 7);
					if ($detail->num_rows() > 0) {
						$outgrs = 0;
						$outnet = 0;
						$tglupd = '';

						$a = $detail->row();

						if (!empty($a->fn_outgrs)) {
							$outgrs = $a->fn_outgrs;
						}

						if (!empty($a->fn_outnet)) {
							$outnet = $a->fn_outnet;
						}

						if (!empty($a->fd_tglupd)) {
							$tglupd = $a->fd_tglupd;
						}

						$totalpokok += $outgrs;
						$totalpiuta += $outnet;
						$tanggalupd = $tglupd;
					}
				}

				if ($val == '8-15 Hari') {
					$detail = $this->MAging->getDetailUnit($key->fn_kodelk, $key->fn_nomdel, $key->fs_jenpiu, $key->fn_polpen, $key->fn_nompjb, 7, 15);
					if ($detail->num_rows() > 0) {
						$outgrs = 0;
						$outnet = 0;
						$tglupd = '';

						$a = $detail->row();

						if (!empty($a->fn_outgrs)) {
							$outgrs = $a->fn_outgrs;
						}

						if (!empty($a->fn_outnet)) {
							$outnet = $a->fn_outnet;
						}

						if (!empty($a->fd_tglupd)) {
							$tglupd = $a->fd_tglupd;
						}

						$totalpokok += $outgrs;
						$totalpiuta += $outnet;
						$tanggalupd = $tglupd;
					}
				}

				if ($val == '16-30 Hari') {
					$detail = $this->MAging->getDetailUnit($key->fn_kodelk, $key->fn_nomdel, $key->fs_jenpiu, $key->fn_polpen, $key->fn_nompjb, 15, 30);
					if ($detail->num_rows() > 0) {
						$outgrs = 0;
						$outnet = 0;
						$tglupd = '';

						$a = $detail->row();

						if (!empty($a->fn_outgrs)) {
							$outgrs = $a->fn_outgrs;
						}

						if (!empty($a->fn_outnet)) {
							$outnet = $a->fn_outnet;
						}

						if (!empty($a->fd_tglupd)) {
							$tglupd = $a->fd_tglupd;
						}

						$totalpokok += $outgrs;
						$totalpiuta += $outnet;
						$tanggalupd = $tglupd;
					}
				}

				if ($val == '31-60 Hari') {
					$detail = $this->MAging->getDetailUnit($key->fn_kodelk, $key->fn_nomdel, $key->fs_jenpiu, $key->fn_polpen, $key->fn_nompjb, 30, 60);
					if ($detail->num_rows() > 0) {
						$outgrs = 0;
						$outnet = 0;
						$tglupd = '';

						$a = $detail->row();

						if (!empty($a->fn_outgrs)) {
							$outgrs = $a->fn_outgrs;
						}

						if (!empty($a->fn_outnet)) {
							$outnet = $a->fn_outnet;
						}

						if (!empty($a->fd_tglupd)) {
							$tglupd = $a->fd_tglupd;
						}

						$totalpokok += $outgrs;
						$totalpiuta += $outnet;
						$tanggalupd = $tglupd;
					}
				}

				if ($val == '61-90 Hari') {
					$detail = $this->MAging->getDetailUnit($key->fn_kodelk, $key->fn_nomdel, $key->fs_jenpiu, $key->fn_polpen, $key->fn_nompjb, 60, 90);
					if ($detail->num_rows() > 0) {
						$outgrs = 0;
						$outnet = 0;
						$tglupd = '';

						$a = $detail->row();

						if (!empty($a->fn_outgrs)) {
							$outgrs = $a->fn_outgrs;
						}

						if (!empty($a->fn_outnet)) {
							$outnet = $a->fn_outnet;
						}

						if (!empty($a->fd_tglupd)) {
							$tglupd = $a->fd_tglupd;
						}

						$totalpokok += $outgrs;
						$totalpiuta += $outnet;
						$tanggalupd = $tglupd;
					}
				}

				if ($val == '91-120 Hari') {
					$detail = $this->MAging->getDetailUnit($key->fn_kodelk, $key->fn_nomdel, $key->fs_jenpiu, $key->fn_polpen, $key->fn_nompjb, 90, 120);
					if ($detail->num_rows() > 0) {
						$outgrs = 0;
						$outnet = 0;
						$tglupd = '';

						$a = $detail->row();

						if (!empty($a->fn_outgrs)) {
							$outgrs = $a->fn_outgrs;
						}

						if (!empty($a->fn_outnet)) {
							$outnet = $a->fn_outnet;
						}

						if (!empty($a->fd_tglupd)) {
							$tglupd = $a->fd_tglupd;
						}

						$totalpokok += $outgrs;
						$totalpiuta += $outnet;
						$tanggalupd = $tglupd;
					}
				}

				if ($val == '> 120 Hari') {
					$detail = $this->MAging->getDetailMax($key->fn_kodelk, $key->fn_nomdel, $key->fs_jenpiu, $key->fn_polpen, $key->fn_nompjb, 120);
					if ($detail->num_rows() > 0) {
						$outgrs = 0;
						$outnet = 0;
						$tglupd = '';

						$a = $detail->row();

						if (!empty($a->fn_outgrs)) {
							$outgrs = $a->fn_outgrs;
						}

						if (!empty($a->fn_outnet)) {
							$outnet = $a->fn_outnet;
						}

						if (!empty($a->fd_tglupd)) {
							$tglupd = $a->fd_tglupd;
						}

						$totalpokok += $outgrs;
						$totalpiuta += $outnet;
						$tanggalupd = $tglupd;
					}
				}

				if ($val == 'TOTAL') {
					$detail = $this->MAging->getDetailTotal($key->fn_kodelk, $key->fn_nomdel, $key->fs_jenpiu, $key->fn_polpen, $key->fn_nompjb);
					if ($detail->num_rows() > 0) {
						$outgrs = 0;
						$outnet = 0;
						$tglupd = '';

						$a = $detail->row();

						if (!empty($a->fn_outgrs)) {
							$outgrs = $a->fn_outgrs;
						}

						if (!empty($a->fn_outnet)) {
							$outnet = $a->fn_outnet;
						}

						if (!empty($a->fd_tglupd)) {
							$tglupd = $a->fd_tglupd;
						}

						$totalpokok += $outgrs;
						$totalpiuta += $outnet;
						$tanggalupd = $tglupd;
					}
				}
			}

			$xArr[] = array(
				'fd_start' => trim($mulai),
				'fd_end' => trim($selesai),
				'fn_unit' => trim($units->fn_unit),
				'fs_kode_cabang' => trim($cabang),
				'fs_kategori' => trim($val),
				'fn_ospiuta' => number_format($totalpiuta, 0, ',', '.'),
				'fn_ospokok' => number_format($totalpokok, 0, ',', '.'),
			);
		}

		$data['all_aging'] = $xArr;
		$this->load->view('print/vagingexcelsurveyorall', $data);
	}

}