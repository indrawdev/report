<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cronjob extends CI_Controller {

	public function index() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			// CALL BACK ALL FUCTION CRONTAB
			$this->cronARAPK();
			$this->cronAROVDD();
			$this->cronARPJB();
			$this->cronARCMAS();
			$this->cronARDENDA();
			$this->cronAPOVDD();
			$this->cronREPORT();
			$this->cronFILEPDF();
			$this->cronEMAIL();
			$this->cronLog();
		}
	}

	// CRONTAB ARAPK
	public function cronARAPK() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$db = dbase_open('./temp/dbf/ARAPK.DBF', 0);
			if ($db) {

				// TRUNCATE TABLE
				$this->load->database();
				$this->db->truncate('tx_arapk');

				$num_row = dbase_numrecords($db);
				for ($i = 1; $i <= $num_row; $i++) {
					$val = dbase_get_record($db, $i);

					$data = array(
						'fs_recordid' => $val[0], 'fn_nomapk' => $val[1],
						'fs_flagtr' => $val[2], 'fs_nomlks' => $val[3],
						'fn_noapke' => $val[4], 'fs_jnsfrm' => $val[5],
						'fd_tglapk' => $val[6], 'fn_kodelk' => $val[7],
						'fn_nomdel' => $val[8], 'fs_jenpiu' => $val[9],
						'fn_polpen' => $val[10], 'fn_nompjb' => $val[11],
						'fd_tglpjb' => $val[12], 'fs_nampem' => $val[13],
						'fs_alpem1' => $val[14], 'fs_alpem2' => $val[15],
						'fs_namkot' => $val[16], 'fn_kodeps' => $val[17],
						'fs_notelp' => $val[18], 'fs_hphone' => $val[19],
						'fs_tpager' => $val[20], 'fs_ushpem' => $val[21],
						'fs_kuspem' => $val[22], 'fs_alupe1' => $val[23],
						'fs_alupe2' => $val[24], 'fs_tlupem' => $val[25],
						'fn_gajpem' => $val[26], 'fs_namphl' => $val[27],
						'fs_ushphl' => $val[28], 'fs_kusphl' => $val[29],
						'fs_aluph1' => $val[30], 'fs_aluph2' => $val[31],
						'fs_tluphl' => $val[32], 'fn_gajphl' => $val[33],
						'fs_nampjm' => $val[34], 'fs_alpjm1' => $val[35],
						'fs_alpjm2' => $val[36], 'fs_kotpjm' => $val[37],
						'fn_kdppjm' => $val[38], 'fs_tlppjm' => $val[39],
						'fs_ushpjm' => $val[40], 'fs_kuspjm' => $val[41],
						'fs_stapjm' => $val[42], 'fs_alupj1' => $val[43],
						'fs_alupj2' => $val[44], 'fs_tlupjm' => $val[45],
						'fn_gajpjm' => $val[46], 'fs_alkor1' => $val[47],
						'fs_alkor2' => $val[48], 'fs_kotkor' => $val[49],
						'fs_poskor' => $val[50], 'fn_stsrmh' => $val[51],
						'fd_sjktgl' => $val[52], 'fd_tgltkh' => $val[53],
						'fs_jnsklm' => $val[54], 'fs_tptlhr' => $val[55],
						'fd_tgllhr' => $val[56], 'fs_agama' => $val[57],
						'fn_penddk' => $val[58], 'fs_status' => $val[59],
						'fs_stskwn' => $val[60], 'fn_tgngan' => $val[61],
						'fn_biayah' => $val[62], 'fd_sjkker' => $val[63],
						'fd_tglsvy' => $val[64], 'fn_lamsvy' => $val[65],
						'fs_ptgsvy' => $val[66], 'fs_kptsan' => $val[67],
						'fd_tglkep' => $val[68], 'fs_ketkep' => $val[69],
						'fd_tglspp' => $val[70], 'fs_namsls' => $val[71],
						'fs_resiko' => $val[72], 'fs_flagct' => $val[73],
						'fn_flctdp' => $val[74], 'fn_flctsp' => $val[75],
						'fn_updtke' => $val[76], 'fn_updtsp' => $val[77],
						'fs_tarikw' => $val[78], 'fd_tglinp' => $val[79],
						'fs_naminp' => $val[80], 'fs_usersp' => $val[81],
						'fs_srtstj' => $val[82], 'fn_batapk' => $val[83],
						'fn_batspp' => $val[84], 'fs_nomktp' => $val[85],
						'fd_nktpsd' => $val[86], 'fs_flappr' => $val[87],
						'fs_apprid' => $val[88], 'fs_nonpwp' => $val[89],
						'fs_sptthn' => $val[90], 'fs_namibu' => $val[91],
						'fs_kecama' => $val[92], 'fs_kelura' => $val[93],
						'fs_jobkon' => $val[94], 'fs_kddati' => $val[95],
						'fd_tglspk' => $val[96], 'fd_tgctpo' => $val[97],
						'fd_tanggal_buat' => date('Y-m-d H:i:s')
					);

					$this->db->insert('tx_arapk', $data);
				}

				dbase_close($db);

				// LOGGING
				$log = array(
					'log_time' => date('Y-m-d H:i:s'),
					'log_name' => 'CRONTAB',
					'log_user' => 'SERVER',
					'log_message' => 'CRON ARAPK',
					'ip_address' => 'NO-IP'
				);
				$this->db->insert('tb_log', $log);
			}
		}
	} 

	// CRONTAB AROVDD
	public function cronAROVDD() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$db = dbase_open('./temp/dbf/AROVDD.DBF', 0);

			if ($db) {
				// TRUNCATE TABLE
				$this->load->database();
				$this->db->truncate('tx_arovdd');

				$num_row = dbase_numrecords($db);
				for ($i = 1; $i <= $num_row; $i++) {
					$val = dbase_get_record($db, $i);

					$data = array(
						'fn_kodelk' => $val[0], 'fn_nomdel' => $val[1],
						'fs_jenpiu' => $val[2], 'fn_polpen' => $val[3],
						'fn_nompjb' => $val[4], 'fd_tglupd' => $val[5],
						'fd_tglovd' => $val[6], 'fn_outgrs' => $val[7],
						'fn_outnet' => $val[8], 'fn_ovdgrs' => $val[9],
						'fn_ovdnet' => $val[10], 'fn_lamovd' => $val[11],
						'fn_jumken' => $val[12], 'fs_cabang' => $val[13],
						'fd_tanggal_buat' => date('Y-m-d H:i:s')
					);

					$this->db->insert('tx_arovdd', $data);
				}
				dbase_close($db);

				// LOGGING
				$log = array(
					'log_time' => date('Y-m-d H:i:s'),
					'log_name' => 'CRONTAB',
					'log_user' => 'SERVER',
					'log_message' => 'CRON AROVDD',
					'ip_address' => 'NO-IP'
				);
				$this->db->insert('tb_log', $log);
			}
		}
	}

	// CRONTAB ARPJB
	public function cronARPJB() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$db = dbase_open('./temp/dbf/ARPJB.DBF', 0);

			if ($db) {
				// TRUNCATE TABLE
				$this->load->database();
				$this->db->truncate('tx_arpjb');

				$num_row = dbase_numrecords($db);
				for ($i = 1; $i <= $num_row; $i++) {
					$val = dbase_get_record($db, $i);

					$data = array(
						'fn_recordid' => $val[0], 'fn_nomrjb' => $val[1],
						'fn_nomdel' => $val[2], 'fn_kodelk' => $val[3],
						'fn_nomrut' => $val[4], 'fs_jenpiu' => $val[5],
						'fn_polpen' => $val[6], 'fn_nompjb' => $val[7],
						'fn_kodekr' => $val[8], 'fd_tglpjb' => $val[9],
						'fn_jumken' => $val[10], 'fs_jenken' => $val[11],
						'fn_thnken' => $val[12], 'fn_kodebk' => $val[13],
						'fn_kowibk' => $val[14], 'fs_noacbk' => $val[15],
						'fn_nombbk' => $val[16], 'fn_nombbt' => $val[17],
						'fn_nobbkt' => $val[18], 'fn_masafl' => $val[19],
						'fs_nampem' => $val[20], 'fs_alpem1' => $val[21],
						'fs_alpem2' => $val[22], 'fs_namkot' => $val[23],
						'fn_hrgotr' => $val[24], 'fn_potang' => $val[25],
						'fn_umpmlk' => $val[26], 'fn_prempl' => $val[27],
						'fs_perbap' => $val[28], 'fs_perbep' => $val[29],
						'fn_biangp' => $val[30], 'fn_jlangp' => $val[31],
						'fn_jaytsp' => $val[32], 'fs_anytsp' => $val[33],
						'fn_umdeal' => $val[34], 'fn_premdl' => $val[35],
						'fs_perbad' => $val[36], 'fs_perbed' => $val[37],
						'fn_biangd' => $val[38], 'fn_juhang' => $val[39],
						'fn_juhadk' => $val[40], 'fn_jlangd' => $val[41],
						'fn_jlayts' => $val[42], 'fs_angyts' => $val[43],
						'fs_apbyrm' => $val[44], 'fn_apbyrk' => $val[45],
						'fn_apbyrv' => $val[46], 'fn_apbydk' => $val[47],
						'fn_biaadm' => $val[48], 'fn_dendad' => $val[49],
						'fn_binori' => $val[50], 'fn_biasur' => $val[51],
						'fn_pdtlin' => $val[52], 'fn_residu' => $val[53],
						'fs_carang' => $val[54], 'fn_lamang' => $val[55],
						'fn_masang' => $val[56], 'fn_bekang' => $val[57],
						'fn_bekanp' => $val[58], 'fs_angdel' => $val[59],
						'fs_carbar' => $val[60], 'fd_tglang' => $val[61],
						'fn_tgangs' => $val[62], 'fn_anggih' => $val[63],
						'fn_juangi' => $val[64], 'fn_juandk' => $val[65],
						'fd_tglstj' => $val[66], 'fd_tglrep' => $val[67],
						'fn_biarep' => $val[68], 'fn_tagrep' => $val[69],
						'fn_selrep' => $val[70], 'fn_srepdk' => $val[71],
						'fn_angrep' => $val[72], 'fn_arepdk' => $val[73],
						'fn_noskmr' => $val[74], 'fs_tgskmr' => $val[75],
						'fs_flagnw' => $val[76], 'fs_sudobl' => $val[77],
						'fn_nodobl' => $val[78], 'fs_sudoby' => $val[79],
						'fn_nodoby' => $val[80], 'fd_tgllns' => $val[81],
						'fd_tglres' => $val[82], 'fs_akrctk' => $val[83],
						'fn_kodsup' => $val[84], 'fn_nomsup' => $val[85],
						'fs_flagcr' => $val[86], 'fn_flagbl' => $val[87],
						'fn_kodcab' => $val[88], 'fd_tglanp' => $val[89],
						'fn_tgangp' => $val[90], 'fn_aroffs' => $val[91],
						'fs_dndphr' => $val[92], 'fn_prmask' => $val[93],
						'fs_status' => $val[94], 'fn_nlcair' => $val[95],
						'fd_tanggal_buat' => date('Y-m-d H:i:s')
					);

					$this->db->insert('tx_arpjb', $data);
				}
				dbase_close($db);

				// LOGGING
				$log = array(
					'log_time' => date('Y-m-d H:i:s'),
					'log_name' => 'CRONTAB',
					'log_user' => 'SERVER',
					'log_message' => 'CRON ARPJB',
					'ip_address' => 'NO-IP'
				);
				$this->db->insert('tb_log', $log);
			}
		}
	}

	// CONTAB ARCMAS
	public function cronARCMAS() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$db = dbase_open('./temp/dbf/ARCMAS.DBF', 0);

			if ($db) {
				// TRUNCATE TABLE
				$this->load->database();
				$this->db->truncate('tx_arcmas');

				$num_row = dbase_numrecords($db);

				for ($i = 1; $i <= $num_row; $i++) {
					$val = dbase_get_record($db, $i);
					
					$data = array(
						'fs_recordid' => $val[0], 'fn_nomdel' => $val[1],
						'fn_kodelk' => $val[2], 'fn_polpen' => $val[3],
						'fs_namdel' => $val[4], 'fs_aldel1' => $val[5],
						'fs_aldel1' => $val[6], 'fs_namkot' => $val[7],
						'fs_nampem' => $val[8], 'fn_plafon' => $val[9],
						'fd_tglpla' => $val[10], 'fs_matlkp' => $val[11],
						'fn_salwal' => $val[12], 'fn_salwap' => $val[13],
						'fn_jumpen' => $val[14], 'fn_jumpep' => $val[15],
						'fn_jumbyr' => $val[16], 'fn_jumbyb' => $val[17],
						'fn_jumbyp' => $val[18], 'fn_notbit' => $val[19],
						'fn_notbip' => $val[20], 'fn_notkre' => $val[21],
						'fn_notkrp' => $val[22], 'fn_tungak' => $val[23],
						'fn_tungap' => $val[24], 'fs_flagtg' => $val[25],
						'fn_dlmpro' => $val[26], 'fn_dlmprp' => $val[27],
						'fd_tglpjl' => $val[28], 'fn_bbkpro' => $val[29],
						'fn_bbkprp' => $val[30], 'fn_ddpjml' => $val[31],
						'fn_dppbbk' => $val[32], 'fs_pladep' => $val[33],
						'fs_potdep' => $val[34], 'fn_dpplin' => $val[35],
						'fn_sispla' => $val[36], 'fn_sisplp' => $val[37],
						'fn_niljam' => $val[38], 'fs_nabank' => $val[39],
						'fs_acbank' => $val[40], 'fs_anbank' => $val[41],
						'fn_kowibk' => $val[42], 'fn_kodebk' => $val[43],
						'fn_noskmr' => $val[44], 'fs_flagnw' => $val[45],
						'fs_naskm1' => $val[46], 'fs_jaskm1' => $val[47],
						'fs_naskm2' => $val[48], 'fs_jaskm2' => $val[49],
						'fs_nopeku' => $val[50], 'fs_tgpeku' => $val[51],
						'fs_nanota' => $val[52], 'fs_konota' => $val[53],
						'fs_fltpbp' => $val[54], 'fd_tglinp' => $val[55],
						'fs_flctdp' => $val[56], 'fs_updtke' => $val[57],
						'fs_userid' => $val[58], 'fs_nombat' => $val[59],
						'fn_cabang' => $val[60], 'fd_tanggal_buat' => date('Y-m-d H:i:s')
					);

					$this->db->insert('tx_arcmas', $data);
				}
				dbase_close($db);

				// LOGGING
				$log = array(
					'log_time' => date('Y-m-d H:i:s'),
					'log_name' => 'CRONTAB',
					'log_user' => 'SERVER',
					'log_message' => 'CRON ARCMAS',
					'ip_address' => 'NO-IP'
				);
				$this->db->insert('tb_log', $log);
			}
		}
	}

	// CRONTAB ARDENDA
	public function cronARDENDA() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$db = dbase_open('./temp/dbf/ARDENDA.DBF', 0);

			if ($db) {
				// TRUNCATE TABLE
				$this->load->database();
				$this->db->truncate('tx_ardenda');

				$num_row = dbase_numrecords($db);
				for ($i = 1; $i <= $num_row; $i++) {
					$val = dbase_get_record($db, $i);

					$data = array(
						'fs_recoid' => $val[0], 'fn_nomdel' => $val[1], 
						'fn_kodelk' => $val[2], 'fn_nomrut' => $val[3],
						'fs_jenpiu' => $val[4], 'fn_polpen' => $val[5],
						'fn_nompjb' => $val[6],  'fn_angske' => $val[7],
						'fd_tgljtp' => $val[8],  'fn_jdenda' => $val[9],
						'fn_jlsisa' => $val[10],  'fs_carbar' => $val[11],
						'fs_sumdok' => $val[12],  'fn_nomdok' => $val[13],
						'fd_tglbyr' => $val[14],  'fn_noskmr' => $val[15],
						'fn_jumbyr' => $val[16],  'fs_flagct' => $val[17],
						'fn_nomttd' => $val[18],  'fn_nokuit' => $val[19],
						'fd_tangka' => $val[20],  'fd_tgltma' => $val[21],
						'fn_jlangd' => $val[22]

					);
					$this->db->insert('tx_ardenda', $data);
				}
				dbase_close($db);

				// LOGGING
				$log = array(
					'log_time' => date('Y-m-d H:i:s'),
					'log_name' => 'CRONTAB',
					'log_user' => 'SERVER',
					'log_message' => 'CRON ARDENDA',
					'ip_address' => 'NO-IP'
				);
				$this->db->insert('tb_log', $log);
			}
		}
	}

	// CRONTAB APOVDD
	public function cronAPOVDD() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$db = dbase_open('./temp/dbf/APOVDD.DBF', 0);
			
			if ($db) {
				// TRUNCATE TABLE
				$this->load->database();
				$this->db->truncate('tx_apovdd');

				$num_row = dbase_numrecords($db);
				for ($i = 1; $i <= $num_row; $i++) {
					$val = dbase_get_record($db, $i);

					$data = array(
						'fn_kodekr' => $val[0], 'fn_kodelk' => $val[1],
						'fn_nomdel' => $val[2], 'fs_jenpiu' => $val[3],
						'fn_polpen' => $val[4], 'fn_nompjb' => $val[5],
						'fd_tglupd' => $val[6], 'fd_tglovd' => $val[7],
						'fn_outgrs' => $val[8], 'fn_outnet' => $val[9], 
						'fn_ovdgrs' => $val[10], 'fn_ovdnet' => $val[11],
						'fn_lamovd' => $val[12], 'fn_jumken' => $val[13]
					);

					$this->db->insert('tx_apovdd', $data);
				}

				// LOGGING
				$log = array(
					'log_time' => date('Y-m-d H:i:s'),
					'log_name' => 'CRONTAB',
					'log_user' => 'SERVER',
					'log_message' => 'CRON APOVDD',
					'ip_address' => 'NO-IP'
				);
				$this->db->insert('tb_log', $log);
			}
		}
	}

	// CRONTAB REPORT
	public function cronREPORT() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			// TRUNCATE TABLE
			$this->load->database();
			$this->db->truncate('tx_report');

			// insert to tx_report
			$this->load->model('MCronJob');
			$this->MCronJob->insertAllReport();

			// LOGGING
			$log = array(
				'log_time' => date('Y-m-d H:i:s'),
				'log_name' => 'CRONTAB',
				'log_user' => 'SERVER',
				'log_message' => 'CRON REPORT',
				'ip_address' => 'NO-IP'
			);
			$this->db->insert('tb_log', $log);
		}
	}

	// CRONTAB CREATE FILE PDF
	public function cronFILEPDF() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$this->dailyReportDealer();
			$this->dailyReportSurveyor();

			// LOGGING
			$this->load->database();
			$log = array(
				'log_time' => date('Y-m-d H:i:s'),
				'log_name' => 'CRONTAB',
				'log_user' => 'SERVER',
				'log_message' => 'CRON FILEPDF',
				'ip_address' => 'NO-IP'
			);
			$this->db->insert('tb_log', $log);
		}
	}

	// CRONTAB EMAIL NOTIF
	public function cronEMAIL() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$this->load->model('MEmail');
			$sSQL = $this->MEmail->getEmail();
			if ($sSQL->num_rows() > 0) {
				// looping send email
				foreach ($sSQL->result() as $val) {
					// call back function
					$this->sendNotifDealer($val->fs_email);
					// delay 15 second
					sleep(15);
					$this->sendNotifSurveyor($val->fs_email);
				}
				
				// LOGGING
				$this->load->database();
				$log = array(
					'log_time' => date('Y-m-d H:i:s'),
					'log_name' => 'CRONTAB',
					'log_user' => 'SERVER',
					'log_message' => 'CRON EMAIL',
					'ip_address' => 'NO-IP'
				);
				$this->db->insert('tb_log', $log);
			}
		}
	}

	// CRONTAB ACTIVITY
	public function cronLog() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$this->load->database();
			$data = array(
				'log_time' => date('Y-m-d H:i:s'),
				'log_name' => 'CRONJOB',
				'log_user' => 'SERVER',
				'log_message' => 'CRONJOB FINISH',
				'ip_address' => 'NO-IP'
			);
			$this->db->insert('tb_log', $data);
		}
	}

	// DAILY REPORT DEALER
	public function dailyReportDealer() {
		$this->load->library('Pdf');
		$this->load->model('MFpd');
		$this->load->helper('day');

		$start = date('Y-m-d', mktime(0, 0, 0, date('m')-9, '01', date('Y')));
		$end = date('Y-m-d');

		$data['tanggal_mulai'] = tanggal_indo($start);
		$data['tanggal_selesai'] = tanggal_indo($end);

		$data['cabang_sunter'] = $this->MFpd->getReportDealerAll('11', $start, $end);
		$data['cabang_bsd'] = $this->MFpd->getReportDealerAll('12', $start, $end);
		$data['cabang_bogor'] = $this->MFpd->getReportDealerAll('14', $start, $end);
		$data['cabang_fatmawati1'] = $this->MFpd->getReportDealerAll('15', $start, $end);
		$data['cabang_cibubur'] = $this->MFpd->getReportDealerAll('18', $start, $end);
		$data['cabang_banjarmasin'] = $this->MFpd->getReportDealerAll('21', $start, $end);
		$data['cabang_palangkaraya'] = $this->MFpd->getReportDealerAll('24', $start, $end);
		$data['cabang_sampit'] = $this->MFpd->getReportDealerAll('25', $start, $end);
		$data['cabang_pangkalanbun'] = $this->MFpd->getReportDealerAll('26', $start, $end);
		$data['cabang_surabaya'] = $this->MFpd->getReportDealerAll('30', $start, $end);
		$data['cabang_bali'] = $this->MFpd->getReportDealerAll('32', $start, $end);
		$data['cabang_manado'] = $this->MFpd->getReportDealerAll('40', $start, $end);
		$data['cabang_tomohon'] = $this->MFpd->getReportDealerAll('45', $start, $end);
		$data['cabang_pangkalpinang'] = $this->MFpd->getReportDealerAll('51', $start, $end);
		$data['cabang_sungailiat'] = $this->MFpd->getReportDealerAll('52', $start, $end);
		$data['cabang_jambi'] = $this->MFpd->getReportDealerAll('60', $start, $end);
		$data['cabang_palembang'] = $this->MFpd->getReportDealerAll('61', $start, $end);
		$data['cabang_fatmawati2'] = $this->MFpd->getReportDealerAll('73', $start, $end);
		$data['cabang_jakarta1'] = $this->MFpd->getReportDealerAll('82', $start, $end);
		$data['cabang_jakarta2'] = $this->MFpd->getReportDealerAll('83', $start, $end);

		$html = $this->load->view('email/vdailyreportdealer', $data, true);
		$pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('DAFTAR FIRST PAYMENT DEFAULT');
		$pdf->SetPrintHeader(false);
		$pdf->SetMargins(10, 10, 10, true);
		$pdf->SetPrintFooter(false);
		$pdf->SetAutoPageBreak(True, PDF_MARGIN_FOOTER);
		$pdf->SetAuthor('REPORT');
		$pdf->SetDisplayMode('real', 'default');
		$pdf->SetFont('', '', 7, '', false);
		$pdf->AddPage('L', 'A4');
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->lastPage();
		$pdf->Output('/var/www/report/temp/pdf/fpd-dealer-daily.pdf', 'F');
	}

	// DAILY REPORT SURVEYOR
	public function dailyReportSurveyor() {
		$this->load->library('Pdf');
		$this->load->model('MFpd');
		$this->load->helper('day');

		$start = date('Y-m-d', mktime(0, 0, 0, date('m')-9, '01', date('Y')));
		$end = date('Y-m-d');

		$data['tanggal_mulai'] = tanggal_indo($start);
		$data['tanggal_selesai'] = tanggal_indo($end);

		$data['cabang_sunter'] = $this->MFpd->getReportSurveyorAll('11', $start, $end);
		$data['cabang_bsd'] = $this->MFpd->getReportSurveyorAll('12', $start, $end);
		$data['cabang_bogor'] = $this->MFpd->getReportSurveyorAll('14', $start, $end);
		$data['cabang_fatmawati1'] = $this->MFpd->getReportSurveyorAll('15', $start, $end);
		$data['cabang_cibubur'] = $this->MFpd->getReportSurveyorAll('18', $start, $end);
		$data['cabang_banjarmasin'] = $this->MFpd->getReportSurveyorAll('21', $start, $end);
		$data['cabang_palangkaraya'] = $this->MFpd->getReportSurveyorAll('24', $start, $end);
		$data['cabang_sampit'] = $this->MFpd->getReportSurveyorAll('25', $start, $end);
		$data['cabang_pangkalanbun'] = $this->MFpd->getReportSurveyorAll('26', $start, $end);
		$data['cabang_surabaya'] = $this->MFpd->getReportSurveyorAll('30', $start, $end);
		$data['cabang_bali'] = $this->MFpd->getReportSurveyorAll('32', $start, $end);
		$data['cabang_manado'] = $this->MFpd->getReportSurveyorAll('40', $start, $end);
		$data['cabang_tomohon'] = $this->MFpd->getReportSurveyorAll('45', $start, $end);
		$data['cabang_pangkalpinang'] = $this->MFpd->getReportSurveyorAll('51', $start, $end);
		$data['cabang_sungailiat'] = $this->MFpd->getReportSurveyorAll('52', $start, $end);
		$data['cabang_jambi'] = $this->MFpd->getReportSurveyorAll('60', $start, $end);
		$data['cabang_palembang'] = $this->MFpd->getReportSurveyorAll('61', $start, $end);
		$data['cabang_fatmawati2'] = $this->MFpd->getReportSurveyorAll('73', $start, $end);
		$data['cabang_jakarta1'] = $this->MFpd->getReportSurveyorAll('82', $start, $end);
		$data['cabang_jakarta2'] = $this->MFpd->getReportSurveyorAll('83', $start, $end);

		$html = $this->load->view('email/vdailyreportsurveyor', $data, true);
		$pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('DAFTAR FIRST PAYMENT DEFAULT');
		$pdf->SetPrintHeader(false);
		$pdf->SetMargins(10, 10, 10, true);
		$pdf->SetPrintFooter(false);
		$pdf->SetAutoPageBreak(True, PDF_MARGIN_FOOTER);
		$pdf->SetAuthor('REPORT');
		$pdf->SetDisplayMode('real', 'default');
		$pdf->SetFont('', '', 7, '', false);
		$pdf->AddPage('L', 'A4');
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->lastPage();
		$pdf->Output('/var/www/report/temp/pdf/fpd-surveyor-daily.pdf', 'F');
	}

	// SENDER EMAIL
	public function sendEmail($to, $subject, $content, $file) {
		// CATEGORY NOTIFIKASI 'N'
		$this->load->model('MEmail');
		$email = $this->MEmail->config('N');

		$this->load->library('email');
		$config = array(
				'protocol' => $email->protocol,
				'smtp_crypto' => $email->smtp_crypto,
				'smtp_host' => $email->smtp_host,
				'smtp_user' => $email->smtp_user,
				'smtp_pass' => $email->smtp_pass,
				'smtp_port' => $email->smtp_port,
				'mailtype' => $email->mailtype,
				'smtp_timeout' => $email->smtp_timeout,
				'charset' => $email->charset,

			);
		$config['newline'] = "\r\n";
		$this->email->clear(TRUE);
		$this->email->initialize($config);
		$this->email->from($email->smtp_user, "Reporting System");
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($content);
		$this->email->attach($file);
		$this->email->set_crlf("\r\n");
		$this->email->set_newline("\r\n");

		if (!$this->email->send()) {
			show_error($this->email->print_debugger());
		}
	}

	// SEND EMAIL NOTIF DEALER
	public function sendNotifDealer($to) {
		$this->load->helper('day');
		$start = date('Y-m-d', mktime(0, 0, 0, date('m')-9, '01', date('Y')));
		$end = date('Y-m-d');

		$subject = 'Daily Report - Fpd Dealer';
		$content = "REPORT FDP DEALER ".strtoupper(tanggal_indo($start) .' S/D ' . tanggal_indo($end))."";
		$file = '/var/www/report/temp/pdf/fpd-dealer-daily.pdf';
		if (!empty($file)) {
			$this->sendEmail($to, $subject, $content, $file);
		}
	}

	// SEND EMAIL NOTIF SURVEYOR
	public function sendNotifSurveyor($to) {
		$this->load->helper('day');
		$start = date('Y-m-d', mktime(0, 0, 0, date('m')-9, '01', date('Y')));
		$end = date('Y-m-d');

		$subject = 'Daily Report - Fpd Surveyor';
		$content = "REPORT FDP SURVEYOR ".strtoupper(tanggal_indo($start) .' S/D ' . tanggal_indo($end))."";
		$file = '/var/www/report/temp/pdf/fpd-surveyor-daily.pdf';
		if (!empty($file)) {
			$this->sendEmail($to, $subject, $content, $file);
		}
	}
}
