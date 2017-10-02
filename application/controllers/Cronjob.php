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
						'fs_recordid' => $val[0], 'fn_nomapk' => $val[1],
						'fs_flagtr' => $val[2], 'fs_nomlks' => $val[3],
						'fn_noapke' => $val[4], 'fs_jnsfrm' => $val[5],
						'fd_tglapk' => date('Y-m-d', strtotime($val[6])), 'fn_kodelk' => $val[7],
						'fn_nomdel' => $val[8], 'fs_jenpiu' => $val[9],
						'fn_polpen' => $val[10], 'fn_nompjb' => $val[11],
						'fd_tglpjb' => date('Y-m-d', strtotime($val[12])), 'fs_nampem' => $val[13],
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
						'fd_sjktgl' => date('Y-m-d', strtotime($val[52])), 'fd_tgltkh' => date('Y-m-d', strtotime($val[53])),
						'fs_jnsklm' => $val[54], 'fs_tptlhr' => $val[55],
						'fd_tgllhr' => date('Y-m-d', strtotime($val[56])), 'fs_agama' => $val[57],
						'fn_penddk' => $val[58], 'fs_status' => $val[59],
						'fs_stskwn' => $val[60], 'fn_tgngan' => $val[61],
						'fn_biayah' => $val[62], 'fd_sjkker' => date('Y-m-d', strtotime($val[63])),
						'fd_tglsvy' => date('Y-m-d', strtotime($val[64])), 'fn_lamsvy' => $val[65],
						'fs_ptgsvy' => $val[66], 'fs_kptsan' => $val[67],
						'fd_tglkep' => date('Y-m-d', strtotime($val[68])), 'fs_ketkep' => $val[69],
						'fd_tglspp' => date('Y-m-d', strtotime($val[70])), 'fs_namsls' => $val[71],
						'fs_resiko' => $val[72], 'fs_flagct' => $val[73],
						'fn_flctdp' => $val[74], 'fn_flctsp' => $val[75],
						'fn_updtke' => $val[76], 'fn_updtsp' => $val[77],
						'fs_tarikw' => $val[78], 'fd_tglinp' => date('Y-m-d', strtotime($val[79])),
						'fs_naminp' => $val[80], 'fs_usersp' => $val[81],
						'fs_srtstj' => $val[82], 'fn_batapk' => $val[83],
						'fn_batspp' => $val[84], 'fs_nomktp' => $val[85],
						'fd_nktpsd' => date('Y-m-d', strtotime($val[86])), 'fs_flappr' => $val[87],
						'fs_apprid' => $val[88], 'fs_nonpwp' => $val[89],
						'fs_sptthn' => $val[90], 'fs_namibu' => $val[91],
						'fs_kecama' => $val[92], 'fs_kelura' => $val[93],
						'fs_jobkon' => $val[94], 'fs_kddati' => $val[95],
						'fd_tglspk' => date('Y-m-d', strtotime($val[96])), date('Y-m-d', strtotime('fd_tgctpo' => $val[97]))
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
						'fn_kodelk' => $val[0], 'fn_nomdel' => $val[1],
						'fs_jenpiu' => $val[2], 'fn_polpen' => $val[3],
						'fn_nompjb' => $val[4], 'fd_tglupd' => date('Y-m-d', strtotime($val[5])),
						'fd_tglovd' => date('Y-m-d', strtotime($val[6])), 'fn_outgrs' => $val[7],
						'fn_outnet' => $val[8], 'fn_ovdgrs' => $val[9],
						'fn_ovdnet' => $val[10], 'fn_lamovd' => $val[11],
						'fn_jumken' => $val[12], 'fs_cabang' => $val[13]
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
						'fn_recordid' => $val[0], 'fn_nomrjb' => $val[1],
						'fn_nomdel' => $val[2], 'fn_kodelk' => $val[3],
						'fn_nomrut' => $val[4], 'fs_jenpiu' => $val[5],
						'fn_polpen' => $val[6], 'fn_nompjb' => $val[7],
						'fn_kodekr' => $val[8], 'fd_tglpjb' => date('Y-m-d', strtotime($val[9])),
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
						'fs_carbar' => $val[60], 'fd_tglang' => date('Y-m-d', strtotime($val[61])),
						'fn_tgangs' => $val[62], 'fn_anggih' => $val[63],
						'fn_juangi' => $val[64], 'fn_juandk' => $val[65],
						'fd_tglstj' => date('Y-m-d', strtotime($val[66])), 'fd_tglrep' => date('Y-m-d', strtotime($val[67])),
						'fn_biarep' => $val[68], 'fn_tagrep' => $val[69],
						'fn_selrep' => $val[70], 'fn_srepdk' => $val[71],
						'fn_angrep' => $val[72], 'fn_arepdk' => $val[73],
						'fn_noskmr' => $val[74], 'fs_tgskmr' => $val[75],
						'fs_flagnw' => $val[76], 'fs_sudobl' => $val[77],
						'fn_nodobl' => $val[78], 'fs_sudoby' => $val[79],
						'fn_nodoby' => $val[80], 'fd_tgllns' => date('Y-m-d', strtotime($val[81])),
						'fd_tglres' => date('Y-m-d', strtotime($val[82])), 'fs_akrctk' => $val[83],
						'fn_kodsup' => $val[84], 'fn_nomsup' => $val[85],
						'fs_flagcr' => $val[86], 'fn_flagbl' => $val[87],
						'fn_kodcab' => $val[88], 'fd_tglanp' => date('Y-m-d', strtotime($val[89])),
						'fn_tgangp' => $val[90], 'fn_aroffs' => $val[91],
						'fs_dndphr' => $val[92], 'fn_prmask' => $val[93],
						'fs_status' => $val[94], 'fn_nlcair' => $val[95],
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