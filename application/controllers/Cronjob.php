<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cronjob extends CI_Controller {

	public function index() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
			return;
		} else {
			$this->cronARAPK();
			$this->cronAROVDD();
			$this->cronARPJB();
			$this->cronlog();
		}
	}

	// CRONTAB ARAPK
	public function cronARAPK() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
			return;
		} else {
			$db = dbase_open('/temp/ARAPK.dbf', 0);
			if ($db) {
				$num_row = dbase_numrecords($db);
				for ($i = 1; $i <= $num_row; $i++) {
					$val = dbase_get_record($num_row, $i);

					$data = array(
						'RECOID' => $i[0], 'NOMAPK' => '',
						'FLAGTR' => '', 'NOMLKS' => '',
						'NOAPKE' => '', 'JNSFRM' => '',
						'TGLAPK' => '', 'KODELK' => '',
						'NOMDEL' => '', 'JENPIU' => '',
						'POLPEN' => '', 'NOMPJB' => '',
						'TGLPJB' => '', 'NAMPEM' => '',
						'ALPEM1' => '', 'ALPEM2' => '',
						'NAMKOT' => '', 'KODEPS' => '',
						'NOTELP' => '', 'HPHONE' => '',
						'TPAGER' => '', 'USHPEM' => '',
						'KUSPEM' => '', 'ALUPE1' => '',
						'ALUPE2' => '', 'TLUPEM' => '',
						'GAJPEM' => '', 'NAMPHL' => '',
						'USHPHL' => '', 'KUSPHL' => '',
						'ALUPH1' => '', 'ALUPH2' => '',
						'TLUPHL' => '', 'GAJPHL' => '',
						'NAMPJM' => '', 'ALPJM1' => '',
						'ALPJM2' => '', 'KOTPJM' => '',
						'KDPPJM' => '', 'TLPPJM' => '',
						'USHPJM' => '', 'KUSPJM' => '',
						'STAPJM' => '', 'ALUPJ1' => '',
						'ALUPJ2' => '', 'TLUPJM' => '',
						'GAJPJM' => '', 'ALKOR1' => '',
						'ALKOR2' => '', 'KOTKOR' => '',
						'POSKOR' => '', 'STSRMH' => '',
						'SJKTGL' => '', 'TGJTKH' => '',
						'JNSKLM' => '', 'TPTLHR' => '',
						'TGLLHR' => '', 'AGAMA' => '',
						'PENDDK' => '', 'STATUS' => '',
						'STSKWN' => '', 'TGNGAN' => '',
						'BIAYAH' => '', 'SJKKER' => '',
						'TGLSVY' => '', 'LAMSVY' => '',
						'PTGSVY' => '', 'KPTSAN' => '',
						'TGLKEP' => '', 'KETKEP' => '',
						'TGLSPP' => '', 'NAMSLS' => '',
						'RESIKO' => '', 'FLAGCT' => '',
						'FLCTDP' => '', 'FLCTSP' => '',
						'UPDTKE' => '', 'UPDTSP' => '',
						'TARIKW' => '', 'TGLINP' => '',
						'NAMINP' => '', 'USERSP' => '',
						'SRTSTJ' => '', 'BATAPK' => '',
						'BATSPP' => '', 'NOMKTP' => '',
						'NKTPSD' => '', 'FLAPPR' => '',
						'APPRID' => '', 'NONPWP' => '',
						'SPTTHN' => '', 'NAMIBU' => '',
						'KECAMA' => '', 'KELURA' => '',
						'JOBKON' => '', 'KDDATI' => '',
						'TGLSPK' => '', 'TGCTPO' => ''
					);

					$this->db->insert('tx_arapk', $data);
				}

				dbase_close($db);
			}
		}
	} 

	// CRONTAB AROVDD
	public function cronAROVDD() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
			return;
		} else {
			$db = dbase_open('/temp/AROVDD.dbf', 0);
			if ($db) {
				$num_row = dbase_numrecords($db);
				for ($i = 1; $i <= $num_row; $i++) {
					$val = dbase_get_record($num_row, $i);

					$data = array(
						'KODELK' => '', 'NOMDEL' => '',
						'JENPIU' => '', 'POLPEN' => '',
						'NOMPJB' => '', 'TGLUPD' => '',
						'TGLOVD' => '', 'OUTGRS' => '',
						'OUTNET' => '', 'OVDGRS' => '',
						'OVDNET' => '', 'LAMOVD' => '',
						'JUMKEN' => '', 'CABANG' => ''
					);

					$this->db->insert('tx_arovdd', $data);
				}
				dbase_close($db);
			}
		}
	}

	// CRONTAB ARPJB
	public function cronARPJB() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
			return;
		} else {
			$db = dbase_open('/temp/ARPJB.dbf', 0);
			if ($db) {
				$num_row = dbase_numrecords($db);
				for ($i = 1; $i <= $num_row; $i++) {
					$val = dbase_get_record($num_row, $i);

					$data = array(
						'RECOID' => '', 'NOMRJB' => '',
						'NOMDEL' => '', 'KODELK' => '',
						'NOMRUT' => '', 'JENPIU' => '',
						'POLPEN' => '', 'NOMPJB' => '',
						'KODEKR' => '', 'TGLPJB' => '',
						'JUMKEN' => '', 'JENKEN' => '',
						'THNKEN' => '', 'KODEBK' => '',
						'KOWIBK' => '', 'NOACBK' => '',
						'NOMBBK' => '', 'NOMBBT' => '',
						'NOBBKT' => '', 'MASAFL' => '',
						'NAMPEM' => '', 'ALPEM1' => '',
						'ALPEM2' => '', 'NAMKOT' => '',
						'HRGOTR' => '', 'POTANG' => '',
						'UMPMLK' => '', 'PREMPL' => '',
						'PERBAP' => '', 'PERBEP' => '',
						'BIANGP' => '', 'JLANGP' => '',
						'JAYTSP' => '', 'ANYTSP' => '',
						'UMDEAL' => '', 'PREMDL' => '',
						'PERBAD' => '', 'PERBED' => '',
						'BIANGD' => '', 'JUHANG' => '',
						'JUHADK' => '', 'JLANGD' => '',
						'JLAYTS' => '', 'ANGYTS' => '',
						'APBYRM' => '', 'APBYRK' => '',
						'APBYRV' => '', 'APBYDK' => '',
						'BIAADM' => '', 'DENDAD' => '',
						'BINORI' => '', 'BIASUR' => '',
						'PDTLIN' => '', 'RESIDU' => '',
						'CARANG' => '', 'LAMANG' => '',
						'MASANG' => '', 'BEKANG' => '',
						'BEKANP' => '', 'ANGDEL' => '',
						'CARBAR' => '', 'TGLANG' => '',
						'TGANGS' => '', 'ANGGIH' => '',
						'JUANGI' => '', 'JUANDK' => '',
						'TGLSTJ' => '', 'TGLREP' => '',
						'BIAREP' => '', 'TAGREP' => '',
						'SELREP' => '', 'SREPDK' => '',
						'ANGREP' => '', 'AREPDK' => '',
						'NOSKMR' => '', 'TGSKMR' => '',
						'FLAGNW' => '', 'SUDOBL' => '',
						'NODOBL' => '', 'SUDOBY' => '',
						'NODOBY' => '', 'TGLLNS' => '',
						'TGLRES' => '', 'AKRCTK' => '',
						'KODSUP' => '', 'NOMSUP' => '',
						'FLAGCR' => '', 'FLAGBL' => '',
						'KODCAB' => '', 'TGLANP' => '',
						'TGANGP' => '', 'AROFFS' => '',
						'DNDPHR' => '', 'PRMASK' => '',
						'STATUS' => '', 'NLCAIR' => '',
					);

					$this->db->insert('tx_arpjb', $data);
				}
				dbase_close($db);
			}
		}
	}

	// CRONTAB ACTIVITY
	public function cronlog() {
		$data = array(
			'log_time' => date('Y-m-d H:i:s'),
			'log_name' => 'CRONJOB',
			'log_user' => 'SERVER',
			'log_message' => 'CRONJOB DBF FILE',
			'ip_address' => $_SERVER['REMOTE_ADDR']
		);
		$this->db->insert('tb_log', $data);
	}

}