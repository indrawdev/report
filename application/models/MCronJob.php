<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MCronJob extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insertAllReport()
	{
		$xSQL = ("
			INSERT INTO tx_report
			SELECT DISTINCT b.fn_kodekr, CONCAT(a.fn_kodelk, a.fn_nomdel, a.fs_jenpiu, a.fn_polpen, a.fn_nompjb) as fs_kontrak,
			b.fs_nampem, c.fs_model_kendaraan, b.fn_thnken, 
			CONCAT(d.fn_cabang, d.fn_kodelk, d.fn_nomdel) as fn_koddel, d.fs_namdel, b.fd_tglstj, 
			(b.fn_anggih + 1) as fn_anggih, b.fn_lamang, (b.fn_juhang - b.fn_biangd) as fn_pokhut, 
			a.fn_outnet, a.fn_ovdnet, a.fn_lamovd, a.fn_ovdgrs, a.fd_tglupd, e.fs_ptgsvy, f.fn_jlsisa, b.fn_jlangd
			FROM tx_arovdd a
			LEFT JOIN tx_arpjb b ON b.fn_kodelk = a.fn_kodelk AND b.fn_nomdel = a.fn_nomdel
			AND b.fs_jenpiu = a.fs_jenpiu AND b.fn_polpen = a.fn_polpen AND b.fn_nompjb = a.fn_nompjb
			LEFT JOIN tm_kendaraan c ON c.fs_kode_kendaraan = b.fs_jenken
			LEFT JOIN tx_arcmas d ON d.fn_cabang = b.fn_kodekr AND d.fn_kodelk = b.fn_kodsup 
			AND d.fn_nomdel = b.fn_nomsup AND d.fn_polpen = b.fn_polpen
			LEFT JOIN tx_arapk e ON  e.fn_kodelk = a.fn_kodelk AND e.fn_nomdel = a.fn_nomdel
			AND e.fs_jenpiu = a.fs_jenpiu AND e.fn_polpen = a.fn_polpen AND e.fn_nompjb = a.fn_nompjb
			LEFT JOIN tx_ardenda f ON f.fn_kodelk = a.fn_kodelk AND f.fn_nomdel = a.fn_nomdel
			AND f.fs_jenpiu = a.fs_jenpiu AND f.fn_polpen = a.fn_polpen AND f.fn_nompjb = a.fn_nompjb
			WHERE a.fn_outnet <> '0' AND b.fd_tgllns = '0000-00-00';
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function insertARJATE2()
	{
		$xSQL = ("
			INSERT INTO tx_arjate2
			SELECT DISTINCT fs_recoid, fn_nomdel, fn_kodelk, fn_nomrut, fs_jenpiu, fn_polpen, 
				fn_nompjb, fn_angske, fd_tgljtp, fn_jlangp, fn_jlangd, fn_nombbt, fn_nobbkt,
				fs_carbar, fs_sumdok, fn_nomdok, fd_tglbyr, fn_noskmr, fn_kowibk, fn_kodebk,
				fn_bgefek, fn_bgefek1, fn_bgefdk, fn_akrbge, fn_akrang, fs_akrflg, fn_jumbyr,
				fn_jumbdk, fn_flaggr, fs_userid, fs_updtke, fn_noinvo, (fn_jlangd - fn_jumbyr) as fn_sisabyr
			FROM tx_arjate
			WHERE MONTH(fd_tgljtp) < MONTH(now()) AND YEAR(fd_tgljtp) <= YEAR(now())
			GROUP BY fn_kodelk, fn_nomdel, fs_jenpiu, fn_polpen, fn_nompjb
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function insertARNOKRS2()
	{
		$xSQL = ("
			INSERT INTO tx_arnokrs2
			SELECT DISTINCT fs_recoid, fs_sumdok, fn_nomdok, fs_nomoku, fd_tangku, fn_nomtrm,
				fd_tgltrm, fd_tgljtp, fn_nomdel, fn_kodelk, fs_jenpiu, fn_polpen, fn_noskmr, fn_angske,
				fs_carbar, fn_nompjb, fn_jlhpjb, SUM(fn_jumlah) as fn_jumlah, fn_nonota, fn_nokuit, fn_nomttd, fs_flagnk,
				fs_flagup, fs_flagas, fs_flctdp, fs_updtke, fs_userid, fn_nombat
			FROM tx_arnokrs
			WHERE MONTH(fd_tgljtp) = MONTH(now()) AND YEAR(fd_tgljtp) = YEAR(now())
			GROUP BY fn_kodelk, fn_nomdel, fs_jenpiu, fn_polpen, fn_nompjb
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function insertARDENDA2()
	{
		$xSQL = ("
			INSERT INTO tx_ardenda2
			SELECT DISTINCT fs_recoid, fn_nomdel, fn_kodelk, fn_nomrut, fs_jenpiu, fn_polpen, fn_nompjb,
				fn_angske, fd_tgljtp, fn_jdenda, SUM(fn_jlsisa) as fn_jlsisa, fs_carbar, fs_sumdok, fn_nomdok, fd_tglbyr,
				fn_noskmr, fn_jumbyr, fs_flagct, fn_nomttd, fn_nokuit, fd_tangka, fd_tgltma, fn_jlangd
			FROM tx_ardenda
			GROUP BY fn_kodelk, fn_nomdel, fs_jenpiu, fn_polpen, fn_nompjb
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}

	public function insertAllReport2()
	{
		$xSQL = ("
			INSERT INTO tx_report2
			SELECT DISTINCT b.fn_kodekr, CONCAT(a.fn_kodelk, a.fn_nomdel, a.fs_jenpiu, a.fn_polpen, a.fn_nompjb) as fs_kontrak,
			b.fs_nampem, e.fd_tgljtp, c.fn_jlangd, c.fd_tglbyr, c.fn_jumbyr, d.fd_tgltrm, d.fn_jumlah,
			(b.fn_anggih + 1) as fn_anggih, b.fn_lamang,
			a.fn_outnet, a.fn_ovdnet, a.fn_lamovd, a.fn_ovdgrs, a.fd_tglupd, c.fn_sisabyr, f.fn_jlsisa,
			(e.fn_jlangd - e.fn_jumbyr) as fn_sisabyr1, SUM(e.fn_dndbyr) as fn_dndjln
			FROM tx_arovdd a
			LEFT JOIN tx_arpjb b ON b.fn_kodelk = a.fn_kodelk AND b.fn_nomdel = a.fn_nomdel
			AND b.fs_jenpiu = a.fs_jenpiu AND b.fn_polpen = a.fn_polpen AND b.fn_nompjb = a.fn_nompjb
			LEFT JOIN tx_arjate2 c ON c.fn_kodelk = a.fn_kodelk AND c.fn_nomdel = a.fn_nomdel
			AND c.fs_jenpiu = a.fs_jenpiu AND c.fn_polpen = a.fn_polpen AND c.fn_nompjb = a.fn_nompjb
			LEFT JOIN tx_arnokrs2 d ON d.fn_kodelk = a.fn_kodelk AND d.fn_nomdel = a.fn_nomdel
			AND d.fs_jenpiu = a.fs_jenpiu AND d.fn_polpen = a.fn_polpen AND d.fn_nompjb = a.fn_nompjb
			LEFT JOIN tx_arjate e ON e.fn_kodelk = a.fn_kodelk AND e.fn_nomdel = a.fn_nomdel
			AND e.fs_jenpiu = a.fs_jenpiu AND e.fn_polpen = a.fn_polpen AND e.fn_nompjb = a.fn_nompjb
			LEFT JOIN tx_ardenda2 f ON f.fn_kodelk = a.fn_kodelk AND f.fn_nomdel = a.fn_nomdel
			AND f.fs_jenpiu = a.fs_jenpiu AND f.fn_polpen = a.fn_polpen AND f.fn_nompjb = a.fn_nompjb
			WHERE a.fn_outnet <> '0' AND b.fd_tgllns = '0000-00-00';
		");

		$sSQL = $this->db->query($xSQL);
		return $sSQL;
	}
}