<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masteremail extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if ($this->session->userdata('login') <> TRUE) {
            redirect('login');
        }
    }

	public function index() {
		$this->load->view('vmasteremail');
	}

	public function select() {
		$array = array(1 => array('1','YA'), 2 => array('0','TIDAK'));
		$out = array_values($array);
		echo json_encode($out);
	}

	public function grid() {
		$sCari = trim($this->input->post('fs_cari'));
		$nStart = trim($this->input->post('start'));
		$nLimit = trim($this->input->post('limit'));

		$this->db->trans_start();
		$this->load->model('MMasterEmail');
		$sSQL = $this->MMasterEmail->listEmailAll($sCari);
		$xTotal = $sSQL->num_rows();
		$sSQL = $this->MMasterEmail->listEmail($sCari, $nStart, $nLimit);
		$this->db->trans_complete();

		$xArr = array();
		if ($sSQL->num_rows() > 0) {
			foreach ($sSQL->result() as $xRow) {
				$xArr[] = array(
					'fs_email' => trim($xRow->fs_email),
					'fs_nama_lengkap' => trim($xRow->fs_nama_lengkap),
					'fs_aktif' => trim($xRow->fs_aktif)
				);
			}
		}
		echo '({"total":"'.$xTotal.'","hasil":'.json_encode($xArr).'})';
	}

	public function ceksave() {
		$email = $this->input->post('fs_email');

		if (!empty($email)) {
			$this->load->model('MMasterEmail');
			$sSQL = $this->MMasterEmail->checkEmail($email);
			if ($sSQL->num_rows() > 0) {
				$hasil = array(
					'sukses' => true,
					'hasil' => 'Data Email sudah ada, apakah Anda ingin meng-update?'
				);
				echo json_encode($hasil);
			} else {
				$hasil = array(
					'sukses' => true,
					'hasil' => 'Data Email belum ada, apakah Anda ingin menambah baru?'
				);
				echo json_encode($hasil);
			}
		} else {
			$hasil = array(
						'sukses' => false,
						'hasil' => 'Simpan Gagal, Data Email tidak diketahui!'
					);
			echo json_encode($hasil);
		}
	}

	public function save() {
		$user = $this->encryption->decrypt($this->session->userdata('username'));
		
		$email = $this->input->post('fs_email');
		$nama = $this->input->post('fs_nama_lengkap');
		$aktif = $this->input->post('fs_aktif');

		$update = false;
		$this->load->model('MMasterEmail');
		$sSQL = $this->MMasterEmail->checkEmail($email);

		if ($sSQL->num_rows() > 0) {
			$update = true;
		}
		
		$dt = array(
			'fs_email' => trim($email),
			'fs_nama_lengkap' => trim($nama),
			'fs_aktif' => trim($aktif)
		);

		if ($update == false) {
			$dt1 = array(
					'fs_user_buat' => trim($user),
					'fd_tanggal_buat' => date('Y-m-d H:i:s')
				);
			$data = array_merge($dt, $dt1);
			$this->db->insert('tm_email', $data);

			// START LOGGING
			$this->load->model('MLog');
			$this->MLog->logger('MASTER EMAIL', $user, 'DATA EMAIL '.trim($email).' SUDAH DIBUAT');
			// END LOGGING
			$hasil = array(
						'sukses' => true,
						'hasil' => 'Simpan Data Email Baru, Sukses!!'
					);
			echo json_encode($hasil);
		} else {
			$dt2 = array(
					'fs_user_edit' => trim($user),
					'fd_tanggal_edit' => date('Y-m-d H:i:s')
				);
			$data = array_merge($dt, $dt2);
			$where = "fs_email = '".trim($email)."'";
			$this->db->where($where);
			$this->db->update('tm_email', $data);

			// START LOGGING
			$this->load->model('MLog');
			$this->MLog->logger('MASTER EMAIL', $user, 'DATA EMAIL '.trim($email).' SUDAH DIEDIT');
			// END LOGGING

			$hasil = array(
						'sukses' => true,
						'hasil' => 'Update Data Email, Sukses!!'
					);
			echo json_encode($hasil);
		}

	}

	public function remove() {
		$user = $this->encryption->decrypt($this->session->userdata('username'));
		$email = $this->input->post('fs_email');

		if (!empty($email)) {
			$where = "fs_email = '".trim($email)."'";
			$this->db->where($where);
			$this->db->delete('tm_email');

			// START LOGGING
			$this->load->model('MLog');
			$this->MLog->logger('MASTER EMAIL', $user, 'DATA EMAIL '.trim($email).' SUDAH DIHAPUS');
			// END LOGGING

			$hasil = array(
						'sukses' => true,
						'hasil' => 'Data Email dihapus!'
					);
			echo json_encode($hasil);
		} else {
			$hasil = array(
						'sukses' => false,
						'hasil' => 'Hapus Gagal...'
					);
			echo json_encode($hasil);
		}
	}
}