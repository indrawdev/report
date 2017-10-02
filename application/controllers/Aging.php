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
		$cabang = $this->input->post('fs_kode_cabang');
		$mulai = $this->input->post('fd_start');
		$selesai = $this->input->post('fd_end');

		$arr = array(
			'CURRENT', '1-7 Hari',
			'8-15 Hari', '16-30 Hari',
			'31-60 Hari', '61-90 Hari',
			'91-120 Hari', '> 120 Hari', 'Total'
		);

		foreach ($arr as $value) {

			if (!empty($cabang)) {

			} else {
				
			}
		
		}
	}

	public function previewaging() {

	}

	public function excelaging() {

	}

	public function previewagingawal() {

	}

	public function excelagingawal() {
		
	}
}