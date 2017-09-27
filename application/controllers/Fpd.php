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

	public function gridtanggal() {
		$cabang = $this->input->post('fs_kode_cabang');
		$this->load->model('MFdp');
	}

	public function previewfpd() {

	}

	public function excelfpd() {

	}

	public function excelsvy() {

	}

}