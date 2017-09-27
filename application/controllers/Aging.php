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

	public function gridtanggal() {
		$cabang = $this->input->post('fs_kode_cabang');
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