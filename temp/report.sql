-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2017 at 09:55 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `report`
--

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE `captcha` (
  `captcha_id` bigint(13) UNSIGNED NOT NULL,
  `captcha_time` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `word` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(13, 1506249489, '::1', 'KDK'),
(14, 1506249928, '::1', 'FCS');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('6dfq00lshjkq9c9skq2c85rl9b9kmhmi', '::1', 1505988350, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530353938383335303b766370747c643a313530353938383033373b),
('e7frk5g9i8bd8djrtipaf8j4e9hm0ikd', '::1', 1506011845, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363031313834333b766370747c643a313530363031313834363b),
('nkpl439f6b9detsf16pid50l92k2mb36', '::1', 1506249928, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363234393932363b766370747c643a313530363234393932383b),
('sgsica7ardd3sdun5vd89k7hl251jc11', '::1', 1506013021, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530363031333032303b766370747c643a313530363031333032313b),
('uflqrvtmg3954h7r0kl8v25kfprc66pi', '::1', 1505988352, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530353938383335303b766370747c643a313530353938383335323b);

-- --------------------------------------------------------

--
-- Table structure for table `tb_log`
--

CREATE TABLE `tb_log` (
  `log_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `log_name` varchar(20) NOT NULL,
  `log_user` varchar(15) NOT NULL,
  `log_message` varchar(200) NOT NULL,
  `ip_address` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_log`
--

INSERT INTO `tb_log` (`log_time`, `log_name`, `log_user`, `log_message`, `ip_address`) VALUES
('2017-09-24 10:38:56', 'LOGIN', 'INDRA', 'MASUK KE SISTEM REPORT', '::1'),
('2017-09-24 10:45:26', 'LOGOUT', 'INDRA', 'KELUAR DARI SISTEM REPORT', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `tg_menu`
--

CREATE TABLE `tg_menu` (
  `id_menu` int(6) NOT NULL,
  `fs_group` int(6) NOT NULL DEFAULT '0',
  `fs_kd_comp` varchar(10) NOT NULL,
  `fs_kd_parent` varchar(10) NOT NULL,
  `fs_kd_child` varchar(10) NOT NULL,
  `fs_nm_menu` varchar(50) NOT NULL,
  `fs_nm_form` varchar(50) NOT NULL,
  `fb_root` int(1) NOT NULL,
  `fs_nm_formweb` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tg_menu`
--

INSERT INTO `tg_menu` (`id_menu`, `fs_group`, `fs_kd_comp`, `fs_kd_parent`, `fs_kd_child`, `fs_nm_menu`, `fs_nm_form`, `fb_root`, `fs_nm_formweb`) VALUES
(1, 0, 'REPORT', '1', '', 'REPORT', '0', 1, '0'),
(2, 0, 'REPORT', '1', '200', 'Dashboard', '0', 1, 'dashboard'),
(3, 0, 'REPORT', '1', '201', 'First Payment Default', '0', 1, 'fpd'),
(4, 0, 'REPORT', '1', '202', 'Aging Surveyor', '0', 1, 'aging'),
(5, 0, 'REPORT', '5', '', 'MASTER', '0', 1, '0'),
(6, 0, 'REPORT', '5', '300', 'Master Cabang', '0', 1, 'mastercabang'),
(7, 0, 'REPORT', '5', '301', 'Master Dealer', '0', 1, 'masterdealer'),
(8, 0, 'REPORT', '5', '302', 'Master Surveyor', '0', 1, 'mastersurveyor'),
(9, 0, 'REPORT', '5', '303', 'Master User', '0', 1, 'masteruser'),
(10, 0, 'REPORT', '10', '', 'UTILITY', '0', 1, '0'),
(11, 0, 'REPORT', '10', '400', 'Change Password', '0', 1, 'changepass');

-- --------------------------------------------------------

--
-- Table structure for table `tm_cabang`
--

CREATE TABLE `tm_cabang` (
  `fs_kode_cabang` varchar(2) NOT NULL DEFAULT '0',
  `fs_nama_cabang` varchar(30) NOT NULL,
  `fs_alamat_cabang` varchar(100) NOT NULL,
  `fs_kota_cabang` varchar(30) NOT NULL,
  `fs_kodepos_cabang` varchar(5) DEFAULT NULL,
  `fs_telepon_cabang` varchar(15) DEFAULT NULL,
  `fs_fax_cabang` varchar(15) DEFAULT NULL,
  `fs_email_cabang` varchar(30) NOT NULL,
  `fs_nama_pimpinan` varchar(50) DEFAULT NULL,
  `fs_jabatan_pimpinan` varchar(30) DEFAULT NULL,
  `fs_ktp_pimpinan` varchar(30) DEFAULT NULL,
  `fs_email_pimpinan` varchar(30) DEFAULT NULL,
  `fs_nama_bank_angsuran` varchar(30) DEFAULT NULL,
  `fs_rekening_bank_angsuran` varchar(30) DEFAULT NULL,
  `fs_atasnama_bank_angsuran` varchar(30) DEFAULT NULL,
  `fs_wilayah_asuransi` varchar(1) DEFAULT NULL,
  `fs_aktif` set('1','0') NOT NULL DEFAULT '0',
  `fs_user_buat` varchar(15) DEFAULT NULL,
  `fd_tanggal_buat` date DEFAULT NULL,
  `fs_user_edit` varchar(15) DEFAULT NULL,
  `fd_tanggal_edit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tm_dealer`
--

CREATE TABLE `tm_dealer` (
  `fs_kode_cabang` varchar(2) NOT NULL,
  `fs_kode_dealer1` varchar(2) NOT NULL,
  `fs_kode_dealer2` varchar(2) NOT NULL,
  `fn_cabang_dealer` int(3) NOT NULL,
  `fs_nama_dealer` varchar(30) DEFAULT NULL,
  `fs_alamat_dealer` varchar(100) DEFAULT NULL,
  `fs_kota_dealer` varchar(30) DEFAULT NULL,
  `fs_kodepos_dealer` varchar(5) DEFAULT NULL,
  `fs_telepon_dealer` varchar(15) DEFAULT NULL,
  `fs_handphone_dealer` varchar(15) DEFAULT NULL,
  `fs_nama_pemilik` varchar(30) DEFAULT NULL,
  `fs_npwp_pemilik` varchar(30) DEFAULT NULL,
  `fs_ktp_pemilik` varchar(30) DEFAULT NULL,
  `fs_nama_bank_pencairan` varchar(30) DEFAULT NULL,
  `fs_rekening_bank_pencairan` varchar(30) DEFAULT NULL,
  `fs_atasnama_bank_pencairan` varchar(30) DEFAULT NULL,
  `fn_persen_refund_bunga` decimal(4,2) DEFAULT NULL,
  `fn_persen_refund_asuransi` decimal(4,2) DEFAULT NULL,
  `fs_iduser_buat` varchar(30) DEFAULT NULL,
  `fd_tanggal_buat` date DEFAULT NULL,
  `fs_iduser_edit` varchar(30) DEFAULT NULL,
  `fd_tanggal_edit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tm_parlevel`
--

CREATE TABLE `tm_parlevel` (
  `fs_kd_parent` varchar(2) NOT NULL,
  `fs_kd_child` varchar(4) NOT NULL,
  `fs_level` varchar(20) DEFAULT NULL,
  `fs_index` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tm_parlevel`
--

INSERT INTO `tm_parlevel` (`fs_kd_parent`, `fs_kd_child`, `fs_level`, `fs_index`) VALUES
('7', '301', 'ADMIN', '1'),
('7', '302', 'ADMIN', '1'),
('1', '', 'SUPERVISOR', '1'),
('1', '200', 'SUPERVISOR', '1'),
('1', '201', 'SUPERVISOR', '1'),
('1', '202', 'SUPERVISOR', '1'),
('1', '203', 'SUPERVISOR', '1'),
('1', '204', 'SUPERVISOR', '1'),
('11', '', 'SUPERVISOR', '1'),
('11', '401', 'SUPERVISOR', '1'),
('11', '402', 'SUPERVISOR', '1'),
('1', '', 'SUPERADMIN', '1'),
('1', '200', 'SUPERADMIN', '1'),
('1', '201', 'SUPERADMIN', '1'),
('1', '202', 'SUPERADMIN', '1'),
('1', '203', 'SUPERADMIN', '1'),
('1', '204', 'SUPERADMIN', '1'),
('11', '', 'SUPERADMIN', '1'),
('11', '401', 'SUPERADMIN', '1'),
('11', '402', 'SUPERADMIN', '1'),
('14', '', 'SUPERADMIN', '1'),
('14', '501', 'SUPERADMIN', '1'),
('14', '503', 'SUPERADMIN', '1'),
('14', '504', 'SUPERADMIN', '1'),
('18', '', 'SUPERADMIN', '1'),
('18', '601', 'SUPERADMIN', '1'),
('18', '602', 'SUPERADMIN', '1'),
('18', '603', 'SUPERADMIN', '1'),
('18', '604', 'SUPERADMIN', '1'),
('18', '605', 'SUPERADMIN', '1'),
('18', '606', 'SUPERADMIN', '1'),
('25', '', 'SUPERADMIN', '1'),
('25', '800', 'SUPERADMIN', '1'),
('25', '801', 'SUPERADMIN', '1'),
('25', '802', 'SUPERADMIN', '1'),
('25', '803', 'SUPERADMIN', '1'),
('25', '804', 'SUPERADMIN', '1'),
('25', '805', 'SUPERADMIN', '1'),
('25', '806', 'SUPERADMIN', '1'),
('25', '807', 'SUPERADMIN', '1'),
('34', '', 'SUPERADMIN', '1'),
('34', '901', 'SUPERADMIN', '1'),
('34', '902', 'SUPERADMIN', '1'),
('34', '903', 'SUPERADMIN', '1'),
('34', '904', 'SUPERADMIN', '1'),
('7', '', 'SUPERADMIN', '1'),
('7', '301', 'SUPERADMIN', '1'),
('7', '302', 'SUPERADMIN', '1'),
('7', '303', 'SUPERADMIN', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tm_surveyor`
--

CREATE TABLE `tm_surveyor` (
  `fs_kode_cabang` varchar(2) NOT NULL DEFAULT '0',
  `fs_kode_surveyor` varchar(5) NOT NULL,
  `fs_kode_surveyor_lama` varchar(3) NOT NULL,
  `fs_nama_surveyor` varchar(50) NOT NULL,
  `fs_alamat_surveyor` varchar(100) DEFAULT NULL,
  `fs_ktp_surveyor` varchar(30) DEFAULT NULL,
  `fs_handphone_surveyor` varchar(30) DEFAULT NULL,
  `fs_user_buat` varchar(15) DEFAULT NULL,
  `fd_tanggal_buat` date DEFAULT NULL,
  `fs_user_edit` varchar(15) DEFAULT NULL,
  `fd_tanggal_edit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tm_user`
--

CREATE TABLE `tm_user` (
  `fs_username` varchar(15) NOT NULL,
  `fs_password` varchar(50) NOT NULL,
  `fs_level_user` varchar(20) NOT NULL,
  `fs_pin` varchar(50) DEFAULT NULL,
  `fd_last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fs_ip_address` varchar(15) DEFAULT NULL,
  `fs_aktif` set('0','1') NOT NULL DEFAULT '0',
  `fd_ganti_pass` datetime DEFAULT NULL,
  `fs_user_buat` varchar(15) NOT NULL,
  `fd_tanggal_buat` datetime NOT NULL,
  `fs_user_edit` varchar(15) DEFAULT NULL,
  `fd_tanggal_edit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tm_user`
--

INSERT INTO `tm_user` (`fs_username`, `fs_password`, `fs_level_user`, `fs_pin`, `fd_last_login`, `fs_ip_address`, `fs_aktif`, `fd_ganti_pass`, `fs_user_buat`, `fd_tanggal_buat`, `fs_user_edit`, `fd_tanggal_edit`) VALUES
('INDRA', '59a920b4b99558bcbed3fee8405e1042', 'SUPERADMIN', '', '2017-09-24 17:38:56', '2017-09-24 15:2', '1', '0000-00-00 00:00:00', 'INDRA', '0000-00-00 00:00:00', 'INDRA', '2017-09-24 17:38:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`captcha_id`),
  ADD KEY `word` (`word`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`log_time`);

--
-- Indexes for table `tg_menu`
--
ALTER TABLE `tg_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tm_cabang`
--
ALTER TABLE `tm_cabang`
  ADD PRIMARY KEY (`fs_kode_cabang`);

--
-- Indexes for table `tm_user`
--
ALTER TABLE `tm_user`
  ADD PRIMARY KEY (`fs_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` bigint(13) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
