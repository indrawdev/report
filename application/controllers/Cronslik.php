<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cronslik extends CI_Controller {

	public function index() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {

		}
	}

	// CRONTAB TM_HEADER
	public function cronHeader() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$data = array(
				'fs_flag_header' => '',
				'fs_jenis_pelapor' => '',
				'fs_kode_pelapor' => '',
				'fn_tahun' => '',
				'fn_bulan' => '',
				'fs_kode_segmen' => '',
				'fn_jumlah_file' => '',
				'fn_jumlah_segmen' => ''
			);
			$this->db->insert('tm_header', $data);

			// LOGGING
			$log = array(
				'log_time' => date('Y-m-d H:i:s'),
				'log_name' => 'CRONTAB',
				'log_user' => 'SERVER',
				'log_message' => 'CRON HEADER',
				'ip_address' => 'NO-IP'
			);
			$this->db->insert('tb_log', $log);
		}
	}

	// CRONTAB TM_DEBITUR_INDIVIDU
	public function cronIndividu() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$data = array(
				'fs_flag_detail' => '',
				'fs_nomor_debitur' => '',
				'fs_jenis_identitas' => '',
				'fs_nomor_identitas' => '',
				'fs_nama_sesuai_idt' => '',
				'fs_nama_lengkap' => '',
				'fs_kode_status' => '',
				'fs_jenis_kelamin' => '',
				'fs_tempat_lahir' => '',
				'fd_tanggal_lahir' => '',
				'fs_npwp_debitur' => '',
				'fs_alamat_debitur' => '',
				'fs_kelurahan_debitur' => '',
				'fs_kecamatan_debitur' => '',
				'fs_kodedati_debitur' => '',
				'fs_kodepos_debitur' => '',
				'fs_nomor_telepon' => '',
				'fs_nomor_seluler' => '',
				'fs_email_debitur' => '',
				'fs_kode_negara' => '',
				'fs_kode_pekerjaan' => '',
				'fs_tempat_bekerja' => '',
				'fs_bidang_usaha' => '',
				'fs_alamat_bekerja' => '',
				'fn_penghasilan_bruto_pertahun' => '',
				'fs_kode_sumber_penghasilan' => '',
				'fn_jumlah_tanggungan' => '',
				'fs_kode_hubungan_pelapor' => '',
				'fs_golongan_debitur' => '',
				'fs_identitas_pasangan' => '',
				'fs_nama_pasangan' => '',
				'fd_tanggal_lahir_pasangan' => '',
				'fs_perjanjian_pisahharta' => '',
				'fs_melanggar_bmpk_bmpd_bmpp' => '',
				'fs_melampaui_bmpk_bmpd_bmpp' => '',
				'fs_nama_ibu_kandung' => '',
				'fs_kode_cabang' => '',
				'fs_operasi_data' => ''
			);
			$this->db->insert('tm_debitur_individu', $data);

			// LOGGING
			$log = array(
				'log_time' => date('Y-m-d H:i:s'),
				'log_name' => 'CRONTAB',
				'log_user' => 'SERVER',
				'log_message' => 'CRON INDIVIDU',
				'ip_address' => 'NO-IP'
			);
			$this->db->insert('tb_log', $log);
		}
	}

	// CRONTAB TM_DEBITUR_BADANUSAHA
	public function cronBadanUsaha() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$data = array(
				'fs_flag_detail' => '',
				'fs_nomor_debitur' => '',
				'fs_identitas_badanusaha' => '',
				'fs_nama_badanusaha' => '',
				'fs_jenis_badanusaha' => '',
				'fs_tempat_pendirian' => '',
				'fs_nomor_akta_pendirian' => '',
				'fd_tanggal_akta_pendirian' => '',
				'fs_nomor_akta_perubahan' => '',
				'fd_tanggal_akta_perubahan' => '',
				'fs_nomor_telepon' => '',
				'fs_nomor_seluler' => '',
				'fs_alamat_email' => '',
				'fs_alamat_badanusaha' => '',
				'fs_kelurahan_badanusaha' => '',
				'fs_kecamatan_badanusaha' => '',
				'fs_kodedati_badanusaha' => '',
				'fs_kodepos_badanusaha' => '',
				'fs_kode_negara' => '',
				'fs_bidang_usaha' => '',
				'fs_kode_hubungan_pelapor' => '',
				'fs_melanggar_bmpk_bmpd_bmpp' => '',
				'fs_melampaui_bmpk_bmpd_bmpp' => '',
				'fs_go_public' => '',
				'fs_golongan_debitur' => '',
				'fs_peringkat_debitur' => '',
				'fs_lembaga_pemeringkat' => '',
				'fd_tanggal_pemeringkat' => '',
				'fs_group_badanusaha' => '',
				'fs_kode_cabang' => '',
				'fs_operasi_data' => ''
			);
			$this->db->insert('tm_debitur_badanusaha', $data);

			// LOGGING
			$log = array(
				'log_time' => date('Y-m-d H:i:s'),
				'log_name' => 'CRONTAB',
				'log_user' => 'SERVER',
				'log_message' => 'CRON BADAN USAHA',
				'ip_address' => 'NO-IP'
			);
			$this->db->insert('tb_log', $log);
		}
	}

	// CRONTAB TX_KREDIT
	public function cronKredit() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$data = array(
				'fs_flag_detail' => '',
				'fs_no_rekening' => '',
				'fs_nomor_debitur' => '',
				'fs_sifat_pembiayaan' => '',
				'fs_jenis_pembiayaan' => '',
				'fs_akad_pembiayaan' => '',
				'fs_nomor_akad_awal' => '',
				'fd_tanggal_akad_awal' => '',
				'fs_nomor_akad_akhir' => '',
				'fd_tanggal_akad_akhir' => '',
				'fn_baru_perpanjangan' => '',
				'fd_tanggal_awal_kredit' => '',
				'fd_tanggal_mulai' => '',
				'fd_tanggal_jatuh_tempo' => '',
				'fs_kategori_debitur' => '',
				'fs_jenis_penggunaan' => '',
				'fs_orientasi_penggunaan' => '',
				'fs_sektor_ekonomi' => '',
				'fs_kodedati' => '',
				'fn_nilai_proyek' => '',
				'fs_kode_valuta' => '',
				'fn_persentase_suku_bunga' => '',
				'fs_jenis_suku_bunga' => '',
				'fs_kredit_program_pemerintah' => '',
				'fs_asal_pembiayaan' => '',
				'fs_sumber_dana' => '',
				'fn_plafon_awal' => '',
				'fn_plafon' => '',
				'fn_pencairan_berjalan' => '',
				'fn_denda' => '',
				'fn_baki_debet' => '',
				'fn_nilai_kurs_asal' => '',
				'fs_kolektibilitas' => '',
				'fd_tanggal_macet' => '',
				'fs_sebab_macet' => '',
				'fn_tunggakan_pokok' => '',
				'fn_tunggakan_bunga' => '',
				'fn_jumlah_tunggakan' => '',
				'fn_frekuensi_tunggakan' => '',
				'fn_frekuensi_restrukturisasi' => '',
				'fd_tanggal_restrukturisasi_awal' => '',
				'fd_tanggal_restrukturisasi_akhir' => '',
				'fs_cara_restrukturisasi' => '',
				'fs_kondisi' => '',
				'fd_tanggal_kondisi' => '',
				'fs_keterangan' => '',
				'fs_kode_cabang' => '',
				'fs_operasi_data' => ''
			);
			$this->db->insert('tx_kredit', $data);

			// LOGGING
			$log = array(
				'log_time' => date('Y-m-d H:i:s'),
				'log_name' => 'CRONTAB',
				'log_user' => 'SERVER',
				'log_message' => 'CRON KREDIT',
				'ip_address' => 'NO-IP'
			);
			$this->db->insert('tb_log', $log);
		}
	}

	// CRONTAB TX_KREDIT_JOINACCOUNT
	public function cronJoinAccount() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$data = array(
				'fs_flag_detail' => '',
				'fs_no_rekening' => '',
				'fs_nomor_debitur' => '',
				'fn_debitur_joint_acc' => '',
				'fs_sifat_kredit' => '',
				'fs_jenis_kredit' => '',
				'fs_akad_pembiayaan' => '',
				'fs_nomor_akad_awal' => '',
				'fd_tanggal_akad_awal' => '',
				'fs_nomor_akad_akhir' => '',
				'fd_tanggal_akad_akhir' => '',
				'fn_baru_perpanjangan' => '',
				'fd_tanggal_awal_kredit' => '',
				'fd_tanggal_mulai' => '',
				'fd_tanggal_jatuh_tempo' => '',
				'fs_kategori_debitur' => '',
				'fs_jenis_penggunaaan' => '',
				'fs_orientasi_penggunaan' => '',
				'fs_sektor_ekonomi' => '',
				'fs_kodedati' => '',
				'fn_nilai_proyek' => '',
				'fs_kode_valuta' => '',
				'fn_persentase_sukubunga' => '',
				'fs_jenis_sukubunga' => '',
				'fs_kredit_program_pemerintah' => '',
				'fs_asal_pembiayaan' => '',
				'fs_sumber_dana' => '',
				'fn_plafon_awal' => '',
				'fn_plafon' => '',
				'fn_pencairan_berjalan' => '',
				'fn_denda' => '',
				'fn_baki_debet' => '',
				'fn_nilai_kurs_asal' => '',
				'fs_kolektibilitas' => '',
				'fd_tanggal_macet' => '',
				'fs_sebab_macet' => '',
				'fn_tunggakan_pokok' => '',
				'fn_tunggakan_bunga' => '',
				'fn_jumlah_tunggakan' => '',
				'fn_frekuensi_tunggakan' => '',
				'fn_frekuensi_restrukturisasi' => '',
				'fd_tanggal_restrukturisasi_awal' => '',
				'fd_tanggal_restrukturisasi_akhir' => '',
				'fs_cara_restrukturisasi' => '',
				'fs_kondisi' => '',
				'fd_tanggal_kondisi' => '',
				'fs_keterangan' => '',
				'fs_kode_cabang' => '',
				'fs_operasi_data' => ''
			);
			$this->db->insert('tx_kredit_joinaccount', $data);

			// LOGGING
			$log = array(
				'log_time' => date('Y-m-d H:i:s'),
				'log_name' => 'CRONTAB',
				'log_user' => 'SERVER',
				'log_message' => 'CRON KREDIT JOIN ACCOUNT',
				'ip_address' => 'NO-IP'
			);
			$this->db->insert('tb_log', $log);
		}
	}

	// CRONTAB TX_SURAT_BERHARGA
	public function cronSuratBerharga() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$data = array(
				'fs_flag_detail' => '',
				'fs_no_rekening' => '',
				'fs_nomor_debitur' => '',
				'fs_jenis_suratberharga' => '',
				'fs_sovereign_rate' => '',
				'fs_listing' => '',
				'fs_peringkat_suratberharga' => '',
				'fs_tujuan_kepemilikan' => '',
				'fd_tanggal_penerbitan' => '',
				'fd_tanggal_pembelian' => '',
				'fd_tanggal_jatuh_tempo' => '',
				'fs_kode_valuta' => '',
				'fn_nominal' => '',
				'fn_nilai_kurs_asal' => '',
				'fn_nilai_pasar' => '',
				'fn_nilai_perolehan' => '',
				'fn_persentase_sukubunga' => '',
				'fn_tunggakan' => '',
				'fn_jumlah_tunggakan' => '',
				'fs_kolektibilitas' => '',
				'fd_tanggal_macet' => '',
				'fs_sebab_macet' => '',
				'fs_kondisi' => '',
				'fd_tanggal_kondisi' => '',
				'fs_keterangan' => '',
				'fs_kode_cabang' => '',
				'fs_operasi_data' => ''
 			);
 			$this->db->insert('tx_surat_berharga', $data);

		}
	}

	// CRONTAB TX_IRREVOCABLE_LC
	public function cronIrrevocable() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$data = array(
				'fs_flag_detail' => '',
				'fs_no_rekening' => '',
				'fs_nomor_debitur' => '',
				'fs_jenis_lc' => '',
				'fs_tujuan_lc' => '',
				'fd_tanggal_keluar' => '',
				'fd_tanggal_jatuh_tempo' => '',
				'fs_nomor_akad_awal' => '',
				'fd_tanggal_akad' => '',
				'fs_nomor_akad_akhir' => '',
				'fd_tanggal_akad_akhir' => '',
				'fs_bank_counterparty' => '',
				'fs_kode_valuta' => '',
				'fn_plafon' => '',
				'fn_nominal' => '',
				'fn_setoran_jaminan' => '',
				'fs_kolektibilitas' => '',
				'fd_tanggal_wanprestasi' => '',
				'fs_kondisi' => '',
				'fd_tanggal_kondisi' => '',
				'fs_keterangan' => '',
				'fs_kode_cabang' => '',
				'fs_operasi_data' => ''
			);
			$this->db->insert('tx_irrevocable_lc', $data);
		}
	}

	// CRONTAB TX_BANK_GARANSI
	public function cronBankGaransi() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$data = array(
				'fs_flag_detail' => '',
				'fs_no_rekening' => '',
				'fs_nomor_debitur' => '',
				'fs_jenis_garansi' => '',
				'fs_tujuan_garansi' => '',
				'fd_tanggal_penerbitan' => '',
				'fd_tanggal_jatuh_tempo' => '',
				'fs_nomor_akad_awal' => '',
				'fd_tanggal_akad' => '',
				'fs_nomor_akad_akhir' => '',
				'fd_tanggal_akad_akhir' => '',
				'fs_nama_dijamin' => '',
				'fs_kode_valuta' => '',
				'fn_plafon' => '',
				'fn_nominal' => '',
				'fn_setoran_jaminan' => '',
				'fs_kolektibilitas' => '',
				'fd_tanggal_wanprestasi' => '',
				'fs_kondisi' => '',
				'fd_tanggal_kondisi' => '',
				'fs_keterangan' => '',
				'fs_kode_cabang' => '',
				'fs_operasi_data' => '',
			);
			$this->db->insert('tx_bank_garansi', $data);
		}
	}

	// CRONTAB TX_FASILITAS_LAIN
	public function cronFasilitasLain() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$data = array(
				'fs_flag_detail' => '',
				'fs_no_rekening' => '',
				'fs_nomor_debitur' => '',
				'fs_jenis_fasilitas' => '',
				'fs_sumber_dana' => '',
				'fd_tanggal_mulai' => '',
				'fd_tanggal_jatuh_tempo' => '',
				'fn_persentase_sukubunga' => '',
				'fs_kode_valuta' => '',
				'fn_nominal_kewajiban' => '',
				'fn_nilai_kurs_asal' => '',
				'fs_kolektibilitas' => '',
				'fd_tanggal_macet' => '',
				'fs_sebab_macet' => '',
				'fn_tunggakan' => '',
				'fn_jumlah_tunggakan' => '',
				'fs_kondisi' => '',
				'fd_tanggal_kondisi' => '',
				'fs_keterangan' => '',
				'fs_kode_cabang' => '',
				'fs_operasi_data' => ''
			);
			$this->db->insert('tx_fasilitas_lain', $data);
		}
	}

	// CRONTAB TX_AGUNAN
	public function cronAgunan() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$data = array(
				'fs_flag_detail' => '',
				'fs_nomor_agunan' => '',
				'fs_no_rekening' => '',
				'fs_nomor_debitur' => '',
				'fs_jenis_segmen' => '',
				'fs_status_agunan' => '',
				'fs_jenis_agunan' => '',
				'fs_peringkat_agunan' => '',
				'fs_lembaga_pemeringkat' => '',
				'fs_jenis_pengikat' => '',
				'fd_tanggal_pengikatan' => '',
				'fs_pemilik_agunan' => '',
				'fs_bukti_kepemilikan' => '',
				'fs_alamat_agunan' => '',
				'fs_kodedati' => '',
				'fn_agunan_sesuai_njop' => '',
				'fn_nilai_agunan_pelapor' => '',
				'fd_tanggal_penilaian_pelapor' => '',
				'fn_nilai_agunan_penilai' => '',
				'fs_nama_penilai_independen' => '',
				'fd_tanggal_penilaian_penilai' => '',
				'fs_status_paripasu' => '',
				'fn_persentase_paripasu' => '',
				'fs_status_kredit_join' => '',
				'fs_diasuransikan' => '',
				'fs_keterangan' => '',
				'fs_kode_cabang' => '',
				'fs_operasi_data' => ''
			);
			$this->db->insert('tx_agunan', $data);
		}
	}

	// CRONTAB TX_PENJAMIN
	public function cronPenjamin() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$data = array(
				'fs_flag_detail' => '',
				'fs_identitas_penjamin' => '',
				'fs_no_rekening' => '',
				'fs_nomor_debitur' => '',
				'fs_jenis_segmen' => '',
				'fs_jenis_identitas' => '',
				'fs_nama_sesuai_idt' => '',
				'fs_nama_lengkap' => '',
				'fs_golongan_penjamin' => '',
				'fs_alamat_penjamin' => '',
				'fn_persentase_dijamin' => '',
				'fs_keterangan' => '',
				'fs_kode_cabang' => '',
				'fs_operasi_data' => ''
			);
			$this->db->insert('tx_penjamin', $data);
		}
	}

	// CRONTAB TX_PENGURUS
	public function cronPengurus() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$data = array(
				'fs_flag_detail' => '',
				'fs_identitas_pengurus' => '',
				'fs_no_rekening' => '',
				'fs_jenis_identitas' => '',
				'fs_nama_pengurus' => '',
				'fs_jenis_kelamin' => '',
				'fs_alamat_pengurus' => '',
				'fs_kelurahan_pengurus' => '',
				'fs_kecamatan_pengurus' => '',
				'fs_kodedati' => '',
				'fs_jabatan' => '',
				'fs_pangsa_kepemilikan' => '',
				'fs_status_pengurus' => '',
				'fs_kode_cabang' => '',
				'fs_operasi_data' => ''
			);
			$this->db->insert('tx_pengurus', $data);
		}
	}

	// CRONTAB TX_LAPORAN_KEUANGAN
	public function cronLaporanKeuangan() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$data = array(
				'fs_flag_detail' => '',
				'fs_nomor_debitur' => '',
				'fd_posisi_keuangan_tahunan' => '',
				'fn_aset' => '',
				'fn_aset_lancar' => '',
				'fn_setara_kas' => '',
				'fn_piutang_pembiayaan_aset_lancar' => '',
				'fn_investasi_keuangan_aset_lancar' => '',
				'fn_aset_lancar_lain' => '',
				'fn_aset_tidak_lancar' => '',
				'fn_piutang_pembiayaan_aset_tidaklancar' => '',
				'fn_investasi_keuangan_aset_tidaklancar' => '',
				'fn_tidak_lancar_lain' => '',
				'fn_liabilitas' => '',
				'fn_liabilitas_jangka_pendek' => '',
				'fn_pinjaman_jangka_pendek_liabilitas_pendek' => '',
				'fn_utangusaha_jangka_pendek_liabilitas_pendek' => '',
				'fn_lainnya_jangka_pendek_liabilitas_pendek' => '',
				'fn_liabilitas_jangka_panjang' => '',
				'fn_pinjaman_jangka_panjang_liabilitas_panjang' => '',
				'fn_utangusaha_jangka_panjang_liabilitas_panjang' => '',
				'fn_lainnya_jangka_panjang_liabilitas_panjang' => '',
				'fn_ekuitas' => '',
				'fn_pendapatan_usaha' => '',
				'fn_bahan_pokok_pendapatan' => '',
				'fn_laba_rugi_bruto' => '',
				'fn_pendapatan_lainnya' => '',
				'fn_beban_lainnya' => '',
				'fn_laba_rugi_sebelum_pajak' => '',
				'fn_laba_rugi_tahun_berjalan' => '',
				'fs_kode_cabang' => '',
				'fs_operasi_data' => ''
			);
			$this->db->insert('tx_laporan_keuangan', $data);
		}
	}

	public function createHeader() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$this->load->model('MCronSlik');
			$sSQL = $this->MCronSlik->getHeader();

			if ($sSQL->num_rows() > 0) {
				$file = './temp/txt/header.txt';
				$fh = fopen($file, 'w') or die("Can't create file");

				foreach ($sSQL->result() as $val) {
					fwrite($fh, "'");
					fwrite($fh, $val->fs_flag_header);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_jenis_pelapor);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kode_pelapor);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_tahun);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_bulan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kode_segmen);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_jumlah_file);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_jumlah_segmen);
					fwrite($fh, "'");
					fwrite($fh, "\n");
				}
				fclose($fh);
			}
		}
	}

	public function createIndividu() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$this->load->model('MCronSlik');
			$sSQL = $this->MCronSlik->getIndividu();

			if ($sSQL->num_rows() > 0) {
				$file = './temp/txt/individu.txt';
				$fh = fopen($file, 'w') or die("Can't create file");

				foreach ($sSQL->result() as $val) {
					fwrite($fh, "'");
					fwrite($fh, $val->fs_flag_detail);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nomor_debitur);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_jenis_identitas);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nomor_identitas);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nama_sesuai_idt);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nama_lengkap);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kode_status);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_jenis_kelamin);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_tempat_lahir);
					fwrite($fh, "'");
					fwrite($fh, str_replace("-", "", $val->fd_tanggal_lahir));
					fwrite($fh, "'");
					fwrite($fh, $val->fs_npwp_debitur);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_alamat_debitur);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kelurahan_debitur);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kecamatan_debitur);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kodedati_debitur);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kodepos_debitur);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nomor_telepon);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nomor_seluler);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_email_debitur);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kode_negara);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kode_pekerjaan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_tempat_bekerja);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_bidang_usaha);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_alamat_bekerja);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_penghasilan_bruto_pertahun);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kode_sumber_penghasilan);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_jumlah_tanggungan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kode_hubungan_pelapor);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_golongan_debitur);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_status_perkawinan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_identitas_pasangan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nama_pasangan);
					fwrite($fh, "'");
					fwrite($fh, str_replace("-", "", $val->fd_tanggal_lahir_pasangan));
					fwrite($fh, "'");
					fwrite($fh, $val->fs_perjanjian_pisahharta);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_melanggar_bmpk_bmpd_bmpp);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_melampaui_bmpk_bmpd_bmpp);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nama_ibu_kandung);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kode_cabang);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_operasi_data);
					fwrite($fh, "'");
					fwrite($fh, "\n");
				}
				fclose($fh);
			}
		}
	}

	public function createBadanUsaha() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$this->load->model('MCronSlik');
			$sSQL = $this->MCronSlik->getBadanUsaha();

			if ($sSQL->num_rows() > 0) {
				$file = './temp/txt/badanusaha.txt';
				$fh = fopen($file, 'w') or die("Can't create file");

				foreach ($sSQL->result() as $val) {
					fwrite($fh, "'");
					fwrite($fh, $val->fs_flag_detail);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nomor_debitur);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_identitas_badanusaha);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nama_badanusaha);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_jenis_badanusaha);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_tempat_pendirian);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nomor_akta_pendirian);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_akta_pendirian);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nomor_akta_perubahan);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_akta_perubahan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nomor_telepon);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nomor_seluler);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_alamat_email);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_alamat_badanusaha);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kelurahan_badanusaha);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kecamatan_badanusaha);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kodedati_badanusaha);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kodepos_badanusaha);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kode_negara);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_bidang_usaha);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kode_hubungan_pelapor);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_melanggar_bmpk_bmpd_bmpp);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_melampaui_bmpk_bmpd_bmpp);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_go_public);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_golongan_debitur);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_peringkat_debitur);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_lembaga_pemeringkat);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_pemeringkat);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_group_badanusaha);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kode_cabang);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_operasi_data);
					fwrite($fh, "'");
					fwrite($fh, "\n");
				}
				fclose($fh);
			}
		}
	}

	public function createKredit() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$this->load->model('MCronSlik');
			$sSQL = $this->MCronSlik->getKredit();

			if ($sSQL->num_rows() > 0) {
				$file = './temp/txt/kredit.txt';
				$fh = fopen($file, 'w') or die("Can't create file");

				foreach ($sSQL->result() as $val) {
					fwrite($fh, "'");
					fwrite($fh, $val->fs_flag_detail);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_no_rekening);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nomor_debitur);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_sifat_pembiayaan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_jenis_pembiayaan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_akad_pembiayaan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nomor_akad_awal);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_akad_awal);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nomor_akad_akhir);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_akad_akhir);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_baru_perpanjangan);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_awal_kredit);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_mulai);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_jatuh_tempo);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kategori_debitur);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_jenis_penggunaan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_orientasi_penggunaan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_sektor_ekonomi);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kodedati);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_nilai_proyek);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kode_valuta);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_persentase_suku_bunga);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_jenis_suku_bunga);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kredit_program_pemerintah);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_asal_pembiayaan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_sumber_dana);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_plafon_awal);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_plafon);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_pencairan_berjalan);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_denda);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_baki_debet);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_nilai_kurs_asal);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kolektibilitas);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_macet);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_sebab_macet);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_tunggakan_pokok);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_tunggakan_bunga);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_jumlah_tunggakan);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_frekuensi_tunggakan);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_frekuensi_restrukturisasi);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_restrukturisasi_awal);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_restrukturisasi_akhir);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_cara_restrukturisasi);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kondisi);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_kondisi);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_keterangan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kode_cabang);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_operasi_data);
					fwrite($fh, "'");
					fwrite($fh, "\n");
				}
				fclose($fh);
			}
		}
	}

	public function createJoinAccount() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$this->load->model('MCronSlik');
			$sSQL = $this->MCronSlik->getKreditJoinAcc();

			if ($sSQL->num_rows() > 0) {
				$file = './temp/txt/kredit_joinaccount.txt';
				$fh = fopen($file, 'w') or die("Can't create file");

				foreach ($sSQL->result() as $val) {
					fwrite($fh, "'");
					fwrite($fh, $val->fs_flag_detail);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_no_rekening);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nomor_debitur);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_debitur_joint_acc);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_sifat_kredit);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_jenis_kredit);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_akad_pembiayaan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nomor_akad_awal);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_akad_awal);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nomor_akad_akhir);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_akad_akhir);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_baru_perpanjangan);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_awal_kredit);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_mulai);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_jatuh_tempo);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kategori_debitur);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_jenis_penggunaaan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_orientasi_penggunaan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_sektor_ekonomi);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kodedati);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_nilai_proyek);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kode_valuta);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_persentase_sukubunga);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_jenis_sukubunga);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kredit_program_pemerintah);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_asal_pembiayaan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_sumber_dana);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_plafon_awal);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_plafon);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_pencairan_berjalan);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_denda);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_baki_debet);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_nilai_kurs_asal);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kolektibilitas);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_macet);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_sebab_macet);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_tunggakan_pokok);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_tunggakan_bunga);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_jumlah_tunggakan);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_frekuensi_tunggakan);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_frekuensi_restrukturisasi);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_restrukturisasi_awal);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_restrukturisasi_akhir);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_cara_restrukturisasi);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kondisi);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_kondisi);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_keterangan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kode_cabang);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_operasi_data);
					fwrite($fh, "'");
					fwrite($fh, "\n");
				}
				fclose($fh);
			}
		}
	}

	public function createSuratBerharga() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$this->load->model('MCronSlik');
			$sSQL = $this->MCronSlik->getSuratBerharga();

			if ($sSQL->num_rows() > 0) {
				$file = './temp/txt/surat_berharga.txt';
				$fh = fopen($file, 'w') or die("Can't create file");

				foreach ($sSQL->result() as $val) {
					fwrite($fh, "'");
					fwrite($fh, $val->fs_flag_detail);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_no_rekening);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nomor_debitur);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_jenis_suratberharga);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_sovereign_rate);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_listing);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_peringkat_suratberharga);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_tujuan_kepemilikan);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_penerbitan);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_pembelian);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_jatuh_tempo);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kode_valuta);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_nominal);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_nilai_kurs_asal);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_nilai_pasar);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_nilai_perolehan);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_persentase_sukubunga);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_tunggakan);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_jumlah_tunggakan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kolektibilitas);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_macet);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_sebab_macet);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kondisi);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_kondisi);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_keterangan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kode_cabang);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_operasi_data);
					fwrite($fh, "'");
					fwrite($fh, "\n");
				}
				fclose($fh);
			}
		}
	}

	public function createIrrevocable() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$this->load->model('MCronSlik');
			$sSQL = $this->MCronSlik->getIrrevocable();

			if ($sSQL->num_rows() > 0) {
				$file = './temp/txt/irrevocable.txt';
				$fh = fopen($file, 'w') or die("Can't create file");

				foreach ($sSQL->result() as $val) {
					fwrite($fh, "'");
					fwrite($fh, $val->fs_flag_detail);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_no_rekening);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nomor_debitur);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_jenis_lc);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_tujuan_lc);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_keluar);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_jatuh_tempo);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nomor_akad_awal);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_akad);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nomor_akad_akhir);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_akad_akhir);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_bank_counterparty);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kode_valuta);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_plafon);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_nominal);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_setoran_jaminan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kolektibilitas);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_wanprestasi);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kondisi);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_kondisi);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_keterangan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kode_cabang);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_operasi_data);
					fwrite($fh, "'");
					fwrite($fh, "\n");
				}
				fclose($fh);
			}
		}
	}

	public function createBankGaransi() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$this->load->model('MCronSlik');
			$sSQL = $this->MCronSlik->getBankGaransi();

			if ($sSQL->num_rows() > 0) {
				$file = './temp/txt/bankgaransi.txt';
				$fh = fopen($file, 'w') or die("Can't create file");

				foreach ($sSQL->result() as $val) {
					fwrite($fh, "'");
					fwrite($fh, $val->fs_flag_detail);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_no_rekening);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nomor_debitur);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_jenis_garansi);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_tujuan_garansi);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_penerbitan);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_jatuh_tempo);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nomor_akad_awal);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_akad);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nomor_akad_akhir);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_akad_akhir);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nama_dijamin);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kode_valuta);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_plafon);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_nominal);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_setoran_jaminan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kolektibilitas);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_wanprestasi);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kondisi);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_kondisi);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_keterangan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kode_cabang);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_operasi_data);
					fwrite($fh, "'");
					fwrite($fh, "\n");
				}
				fclose($fh);
			}
		}
	}

	public function createFasilitasLain() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$this->load->model('MCronSlik');
			$sSQL = $this->MCronSlik->getFasilitasLain();

			if ($sSQL->num_rows() > 0) {
				$file = './temp/txt/fasilitaslain.txt';
				$fh = fopen($file, 'w') or die("Can't create file");

				foreach ($sSQL->result() as $val) {
					fwrite($fh, "'");
					fwrite($fh, $val->fs_flag_detail);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_no_rekening);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nomor_debitur);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_jenis_fasilitas);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_sumber_dana);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_mulai);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_jatuh_tempo);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_persentase_sukubunga);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kode_valuta);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_nominal_kewajiban);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_nilai_kurs_asal);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kolektibilitas);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_macet);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_sebab_macet);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_tunggakan);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_jumlah_tunggakan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kondisi);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_kondisi);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_keterangan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kode_cabang);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_operasi_data);
					fwrite($fh, "'");
					fwrite($fh, "\n");
				}
				fclose($fh);
			}
		}
	}

	public function createAgunan() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$this->load->model('MCronSlik');
			$sSQL = $this->MCronSlik->getAgunan();

			if ($sSQL->num_rows() > 0) {
				$file = './temp/txt/agunan.txt';
				$fh = fopen($file, 'w') or die("Can't create file");

				foreach ($sSQL->result() as $val) {
					fwrite($fh, "'");
					fwrite($fh, $val->fs_flag_detail);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nomor_agunan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_no_rekening);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nomor_debitur);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_jenis_segmen);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_status_agunan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_jenis_agunan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_peringkat_agunan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_lembaga_pemeringkat);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_jenis_pengikat);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_pengikatan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_pemilik_agunan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_bukti_kepemilikan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_alamat_agunan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kodedati);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_agunan_sesuai_njop);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_nilai_agunan_pelapor);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_penilaian_pelapor);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_nilai_agunan_penilai);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nama_penilai_independen);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_tanggal_penilaian_penilai);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_status_paripasu);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_persentase_paripasu);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_status_kredit_join);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_diasuransikan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_keterangan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kode_cabang);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_operasi_data);
					fwrite($fh, "'");
					fwrite($fh, "\n");
				}
				fclose($fh);
			}
		}
	}

	public function createPenjamin() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$this->load->model('MCronSlik');
			$sSQL = $this->MCronSlik->getPenjamin();

			if ($sSQL->num_rows() > 0) {
				$file = './temp/txt/penjamin.txt';
				$fh = fopen($file, 'w') or die("Can't create file");

				foreach ($sSQL->result() as $val) {
					fwrite($fh, "'");
					fwrite($fh, $val->fs_flag_detail);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_identitas_penjamin);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_no_rekening);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nomor_debitur);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_jenis_segmen);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_jenis_identitas);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nama_sesuai_idt);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nama_lengkap);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_golongan_penjamin);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_alamat_penjamin);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_persentase_dijamin);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_keterangan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kode_cabang);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_operasi_data);
					fwrite($fh, "'");
					fwrite($fh, "\n");
				}
				fclose($fh);
			}
		}
	}

	public function createPengurus() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$this->load->model('MCronSlik');
			$sSQL = $this->MCronSlik->getPengurus();

			if ($sSQL->num_rows() > 0) {
				$file = './temp/txt/pengurus.txt';
				$fh = fopen($file, 'w') or die("Can't create file");

				foreach ($sSQL->result() as $val) {
					fwrite($fh, "'");
					fwrite($fh, $val->fs_flag_detail);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_identitas_pengurus);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_no_rekening);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_jenis_identitas);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nama_pengurus);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_jenis_kelamin);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_alamat_pengurus);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kelurahan_pengurus);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kecamatan_pengurus);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kodedati);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_jabatan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_pangsa_kepemilikan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_status_pengurus);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kode_cabang);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_operasi_data);
					fwrite($fh, "'");
					fwrite($fh, "\n");
				}
				fclose($fh);
			}
		}
	}

	public function createLaporanKeuangan() {
		if (!$this->input->is_cli_request()) {
			echo "can only be accessed via the command line";
		} else {
			$this->load->model('MCronSlik');
			$sSQL = $this->MCronSlik->getLaporanKeuangan();

			if ($sSQL->num_rows() > 0) {
				$file = './temp/txt/laporankeuangan.txt';
				$fh = fopen($file, 'w') or die("Can't create file");

				foreach ($sSQL->result() as $val) {
					fwrite($fh, "'");
					fwrite($fh, $val->fs_flag_detail);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_nomor_debitur);
					fwrite($fh, "'");
					fwrite($fh, $val->fd_posisi_keuangan_tahunan);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_aset);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_aset_lancar);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_setara_kas);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_piutang_pembiayaan_aset_lancar);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_investasi_keuangan_aset_lancar);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_aset_lancar_lain);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_aset_tidak_lancar);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_piutang_pembiayaan_aset_tidaklancar);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_investasi_keuangan_aset_tidaklancar);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_tidak_lancar_lain);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_liabilitas);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_liabilitas_jangka_pendek);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_pinjaman_jangka_pendek_liabilitas_pendek);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_utangusaha_jangka_pendek_liabilitas_pendek);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_lainnya_jangka_pendek_liabilitas_pendek);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_liabilitas_jangka_panjang);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_pinjaman_jangka_panjang_liabilitas_panjang);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_utangusaha_jangka_panjang_liabilitas_panjang);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_lainnya_jangka_panjang_liabilitas_panjang);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_ekuitas);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_pendapatan_usaha);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_bahan_pokok_pendapatan);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_laba_rugi_bruto);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_pendapatan_lainnya);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_beban_lainnya);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_laba_rugi_sebelum_pajak);
					fwrite($fh, "'");
					fwrite($fh, $val->fn_laba_rugi_tahun_berjalan);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_kode_cabang);
					fwrite($fh, "'");
					fwrite($fh, $val->fs_operasi_data);
					fwrite($fh, "'");
					fwrite($fh, "\n");
				}
				fclose($fh);
			}
		}
	}

}