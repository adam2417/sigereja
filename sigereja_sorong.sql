-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2018 at 10:06 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigereja_sorong`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_artikel`
--

CREATE TABLE `t_artikel` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `judul_artikel` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `uploader` varchar(25) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_artikel`
--

INSERT INTO `t_artikel` (`id`, `tanggal`, `judul_artikel`, `deskripsi`, `uploader`, `active`) VALUES
(1, '2012-06-24', 'test', 'afasdfasfasfasdfaf<br />soisisdfoidsfjgosidjgsiodfjg', 'Administrator', 1),
(2, '2012-06-12', 'ererer', 'adfasdfaewrdafadsfxdfaewrergfdvxcvsfsdg', '1', 1),
(3, '2012-06-24', 'terwwwer', 'adfasfasfaasdf', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_buku_tamu`
--

CREATE TABLE `t_buku_tamu` (
  `id` int(11) NOT NULL,
  `pengiriman` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `pesan` text,
  `terbit` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_buku_tamu`
--

INSERT INTO `t_buku_tamu` (`id`, `pengiriman`, `tanggal`, `pesan`, `terbit`, `active`) VALUES
(1, 'test', '2012-06-19', 'test aj', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_distrik`
--

CREATE TABLE `t_distrik` (
  `id` int(11) NOT NULL,
  `pdesc` varchar(100) DEFAULT NULL,
  `active` int(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_distrik`
--

INSERT INTO `t_distrik` (`id`, `pdesc`, `active`) VALUES
(1, 'Sentani', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_galery`
--

CREATE TABLE `t_galery` (
  `id` int(11) NOT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `publish` int(5) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `tanggal` date DEFAULT NULL,
  `uploader` varchar(25) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_galery`
--

INSERT INTO `t_galery` (`id`, `gambar`, `publish`, `judul`, `deskripsi`, `tanggal`, `uploader`, `active`) VALUES
(1, '01Profile.jpg', NULL, 'test1', NULL, NULL, NULL, NULL),
(2, 'eala.jpg', NULL, 'test2', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_individu`
--

CREATE TABLE `t_individu` (
  `id_individu` int(11) NOT NULL,
  `nama_individu` varchar(50) DEFAULT NULL,
  `id_keluarga` int(11) NOT NULL,
  `jenis_kelamin` varchar(9) DEFAULT NULL,
  `tempat_lahir` varchar(75) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `status_nikah` varchar(5) DEFAULT NULL,
  `baptis` varchar(5) DEFAULT NULL,
  `sidi` varchar(5) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `tanggal_nikah` date NOT NULL,
  `tempat_nikah` varchar(500) NOT NULL,
  `stat_hub_dlm_kel` varchar(100) NOT NULL,
  `pendidikan_terakhir` varchar(100) NOT NULL,
  `gelar` varchar(50) NOT NULL,
  `asal_gereja` varchar(1000) NOT NULL,
  `nama_ibu` varchar(1000) NOT NULL,
  `nama_ayah` varchar(1000) NOT NULL,
  `suku` varchar(500) NOT NULL,
  `intra` varchar(150) NOT NULL,
  `status_domisili` int(11) NOT NULL,
  `life` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_individu`
--

INSERT INTO `t_individu` (`id_individu`, `nama_individu`, `id_keluarga`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `pekerjaan`, `status_nikah`, `baptis`, `sidi`, `foto`, `status`, `gol_darah`, `tanggal_nikah`, `tempat_nikah`, `stat_hub_dlm_kel`, `pendidikan_terakhir`, `gelar`, `asal_gereja`, `nama_ibu`, `nama_ayah`, `suku`, `intra`, `status_domisili`, `life`) VALUES
(2, 'Andrianto Waroway', 1, '1', 'adfa', '1988-07-18', '1', '1', '1', '2', 'asciifull.gif', 1, '3', '1988-07-08', 'Solan', '1', '1', '-', 'GKLB', 'Ibu', 'Ibu', 'Indian', '1', 1, 1),
(1, 'wrawer', 2, '1', 'adfa', '2012-07-18', '1', '1', '1', '2', 'superman.png', 1, '1', '1983-02-26', 'Banggai', '2', '3', '-', '', '', '', '', '1', 1, 1),
(3, 'test', 1, '1', 'test', '2012-07-19', '1', '1', '1', '1', '', 1, '5', '1982-08-15', 'Labobo', '5', '2', '-', '', '', '', '', '1', 1, 1),
(4, 'tes', 3, '1', 'tes', '1992-04-21', '1', '1', '1', '1', 'profile1.png', 1, '1', '1992-04-22', 'Donggala', '1', '5', '-', 'GKJ', 'tes', 'tes', 'tes', '1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_jabatan`
--

CREATE TABLE `t_jabatan` (
  `id` varchar(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_jabatan`
--

INSERT INTO `t_jabatan` (`id`, `nama`, `description`, `active`) VALUES
('1', 'test jabatan', 'teststs', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_jemaat`
--

CREATE TABLE `t_jemaat` (
  `id` int(11) NOT NULL,
  `pdesc` varchar(100) DEFAULT NULL,
  `active` int(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_jemaat`
--

INSERT INTO `t_jemaat` (`id`, `pdesc`, `active`) VALUES
(1, 'Galatia', 1),
(2, 'Filipi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_kabupaten_kota`
--

CREATE TABLE `t_kabupaten_kota` (
  `id` int(11) NOT NULL,
  `pdesc` varchar(100) DEFAULT NULL,
  `active` int(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_kabupaten_kota`
--

INSERT INTO `t_kabupaten_kota` (`id`, `pdesc`, `active`) VALUES
(1, 'Sorong Kota', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_keg_gereja`
--

CREATE TABLE `t_keg_gereja` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `koordinasi` varchar(20) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_keg_gereja`
--

INSERT INTO `t_keg_gereja` (`id`, `nama`, `waktu`, `tempat`, `koordinasi`, `active`) VALUES
(1, 'test keg', '2012-07-10 00:00:00', 'adsfadf', '2', 1),
(6, 'ssdg', '2012-07-20 00:00:00', 'sdgs', '1', 1),
(11, 'afdaf', '2012-07-11 07:07:00', 'asdfa', '1', 1),
(14, 'retireds', '2012-07-19 06:47:00', 'adsfasdfa', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_keluarga`
--

CREATE TABLE `t_keluarga` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `wilayah` varchar(5) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `notelp` varchar(15) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `id_prop` int(11) NOT NULL,
  `id_kab_kota` int(11) NOT NULL,
  `id_distrik` int(11) NOT NULL,
  `id_klasis` int(11) NOT NULL,
  `id_lingkungan` int(11) NOT NULL,
  `id_jemaat` int(11) NOT NULL,
  `id_sektor` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_keluarga`
--

INSERT INTO `t_keluarga` (`id`, `nama`, `wilayah`, `alamat`, `notelp`, `active`, `id_prop`, `id_kab_kota`, `id_distrik`, `id_klasis`, `id_lingkungan`, `id_jemaat`, `id_sektor`) VALUES
(1, 'Kel.Waroway', '1', '<p>test</p>', '123', 1, 1, 1, 1, 1, 1, 1, 5),
(2, 'Kel.Rumambi', '2', '<p>adfasdfasdf</p>', '324234', 1, 1, 1, 1, 1, 1, 2, 3),
(3, 'Kel.Simanjuntak', '1', 'Jalan Warak 5', '02177859331', 1, 1, 1, 1, 1, 1, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `t_kel_umur`
--

CREATE TABLE `t_kel_umur` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `usia_minimal` int(11) DEFAULT NULL,
  `usia_maksimal` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_kel_umur`
--

INSERT INTO `t_kel_umur` (`id`, `nama`, `usia_minimal`, `usia_maksimal`, `active`) VALUES
(1, 'Balita', 0, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_klasis`
--

CREATE TABLE `t_klasis` (
  `id` int(11) NOT NULL,
  `pdesc` varchar(100) DEFAULT NULL,
  `active` int(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_klasis`
--

INSERT INTO `t_klasis` (`id`, `pdesc`, `active`) VALUES
(1, 'Sorong', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_lingkungan`
--

CREATE TABLE `t_lingkungan` (
  `id` int(11) NOT NULL,
  `pdesc` varchar(100) DEFAULT NULL,
  `active` int(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_lingkungan`
--

INSERT INTO `t_lingkungan` (`id`, `pdesc`, `active`) VALUES
(1, 'Satu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_majelis`
--

CREATE TABLE `t_majelis` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `wilayah` varchar(11) DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `tgl_pentahbisan` date DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_majelis`
--

INSERT INTO `t_majelis` (`id`, `nama`, `wilayah`, `jabatan`, `tgl_pentahbisan`, `active`) VALUES
(2, '4', '1', '', '2012-06-13', 1),
(3, '1', '2', '', '2012-07-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_pa`
--

CREATE TABLE `t_pa` (
  `id` int(11) NOT NULL,
  `wilayah` varchar(5) DEFAULT NULL,
  `keluarga` varchar(50) DEFAULT NULL,
  `tgl_kebaktian` date DEFAULT NULL,
  `pemimpin` varchar(30) DEFAULT NULL,
  `pendamping` varchar(30) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pa`
--

INSERT INTO `t_pa` (`id`, `wilayah`, `keluarga`, `tgl_kebaktian`, `pemimpin`, `pendamping`, `status`) VALUES
(2, '1', '2', '2012-06-18', '1', '2', 1),
(3, '3', '1', '2012-06-14', '2', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_param`
--

CREATE TABLE `t_param` (
  `id` int(11) NOT NULL,
  `param_typ` varchar(25) DEFAULT NULL,
  `param_val` varchar(5) DEFAULT NULL,
  `param_desc` varchar(100) DEFAULT NULL,
  `active` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_param`
--

INSERT INTO `t_param` (`id`, `param_typ`, `param_val`, `param_desc`, `active`) VALUES
(1, 'SEX_TYPE', '1', 'Laki-laki', 1),
(2, 'GOLONGAN_DARAH', '1', 'A', 1),
(3, 'STATUS_BAPTIS', '1', 'Belum Baptis', 1),
(4, 'STATUS_SIDI', '1', 'Belum Sidi', 1),
(5, 'STATUS_NIKAH', '1', 'Belum Nikah', 1),
(6, 'STAT_HUB_KEL', '1', 'Kepala Keluarga', 1),
(7, 'PENDIDIKAN', '1', 'Tidak/Belum Sekolah', 1),
(8, 'PEKERJAAN', '1', 'Belum/Tidak Bekerja', 1),
(9, 'INTRA', '1', 'PKB', 1),
(10, 'STATUS_DOMISILI', '1', 'Tetap', 1),
(11, 'STATUS_LIFE', '1', 'Hidup', 1),
(13, 'SEX_TYPE', '2', 'Perempuan', 1),
(14, 'GOLONGAN_DARAH', '2', 'B', 1),
(15, 'GOLONGAN_DARAH', '3', 'AB', 1),
(16, 'GOLONGAN_DARAH', '4', 'O', 1),
(17, 'GOLONGAN_DARAH', '5', 'A+', 1),
(18, 'GOLONGAN_DARAH', '6', 'A-', 1),
(19, 'GOLONGAN_DARAH', '7', 'B+', 1),
(20, 'GOLONGAN_DARAH', '8', 'B-', 1),
(21, 'GOLONGAN_DARAH', '9', 'AB+', 1),
(22, 'GOLONGAN_DARAH', '10', 'AB-', 1),
(23, 'GOLONGAN_DARAH', '11', 'O+', 1),
(24, 'GOLONGAN_DARAH', '12', 'O-', 1),
(25, 'STATUS_BAPTIS', '2', 'Sudah Baptis', 1),
(26, 'STATUS_BAPTIS', '3', 'Tidak tahu', 1),
(27, 'STATUS_SIDI', '2', 'Sudah Sidi', 1),
(28, 'STATUS_SIDI', '3', 'Tidak tahu', 1),
(29, 'STATUS_NIKAH', '2', 'Nikah', 1),
(30, 'STATUS_NIKAH', '3', 'Cerai Hidup', 1),
(31, 'STATUS_NIKAH', '4', 'Cerai Mati', 1),
(32, 'STAT_HUB_KEL', '2', 'Suami', 1),
(33, 'STAT_HUB_KEL', '3', 'Istri', 1),
(34, 'STAT_HUB_KEL', '4', 'Anak', 1),
(35, 'STAT_HUB_KEL', '5', 'Menantu', 1),
(36, 'STAT_HUB_KEL', '6', 'Cucu', 1),
(37, 'STAT_HUB_KEL', '7', 'OrangTua', 1),
(38, 'STAT_HUB_KEL', '8', 'Mertua', 1),
(39, 'STAT_HUB_KEL', '9', 'Kakak Kandung', 1),
(40, 'STAT_HUB_KEL', '10', 'Adik Kandung', 1),
(41, 'STAT_HUB_KEL', '11', 'Famili Lain', 1),
(42, 'STAT_HUB_KEL', '12', 'Pembantu', 1),
(43, 'STAT_HUB_KEL', '13', 'Lainnya', 1),
(44, 'PENDIDIKAN', '2', 'Belum Tamat SD', 1),
(45, 'PENDIDIKAN', '3', 'Tamat SD', 1),
(46, 'PENDIDIKAN', '4', 'SLTP', 1),
(47, 'PENDIDIKAN', '5', 'SLTA', 1),
(48, 'PENDIDIKAN', '6', 'Diploma I', 1),
(49, 'PENDIDIKAN', '7', 'Diploma III', 1),
(50, 'PENDIDIKAN', '8', 'Strata I', 1),
(51, 'PENDIDIKAN', '9', 'Strata II', 1),
(52, 'PENDIDIKAN', '10', 'Strata III', 1),
(53, 'PEKERJAAN', '2', 'Mengurus Rumah Tangga', 1),
(54, 'PEKERJAAN', '3', 'Pelajar/Mahasiswa', 1),
(55, 'PEKERJAAN', '4', 'Pensiunan', 1),
(56, 'PEKERJAAN', '5', 'Pegawai Negeri Sipil', 1),
(57, 'PEKERJAAN', '6', 'Tentara Nasional Indonesia', 1),
(58, 'PEKERJAAN', '7', 'Kepolisian RI(POLRI)', 1),
(59, 'PEKERJAAN', '8', 'Perdagangan', 1),
(60, 'PEKERJAAN', '9', 'Petani/Pekebun', 1),
(61, 'PEKERJAAN', '10', 'Peternak', 1),
(62, 'PEKERJAAN', '11', 'Nelayan/Perikanan', 1),
(63, 'PEKERJAAN', '12', 'Industri', 1),
(64, 'PEKERJAAN', '13', 'Konstruksi', 1),
(65, 'PEKERJAAN', '14', 'Transportasi', 1),
(66, 'PEKERJAAN', '15', 'Karyawan Swasta', 1),
(67, 'PEKERJAAN', '16', 'Karyawan BUMN', 1),
(68, 'PEKERJAAN', '17', 'Karyawan BUMD', 1),
(69, 'PEKERJAAN', '18', 'Karyawan Honorer', 1),
(70, 'PEKERJAAN', '19', 'Buruh Harian Lepas', 1),
(71, 'PEKERJAAN', '20', 'Pembantu Rumah Tangga', 1),
(72, 'PEKERJAAN', '21', 'Tukang Cukur', 1),
(73, 'PEKERJAAN', '22', 'Tukang Listrik', 1),
(74, 'PEKERJAAN', '23', 'Tukang Batu', 1),
(75, 'PEKERJAAN', '24', 'Tukang Kayu', 1),
(76, 'PEKERJAAN', '25', 'Tukang Sol Sepatu', 1),
(77, 'PEKERJAAN', '26', 'Tukang Las/Pandai Besi', 1),
(78, 'PEKERJAAN', '27', 'Tukang Jahit', 1),
(79, 'PEKERJAAN', '28', 'Tukang Gigi', 1),
(80, 'PEKERJAAN', '29', 'Penata Rias', 1),
(81, 'PEKERJAAN', '30', 'Penata Busana', 1),
(82, 'PEKERJAAN', '31', 'Penata Rambut', 1),
(83, 'PEKERJAAN', '32', 'Mekanik', 1),
(84, 'PEKERJAAN', '33', 'Seniman', 1),
(85, 'PEKERJAAN', '34', 'Perancang Busana', 1),
(86, 'PEKERJAAN', '35', 'Penerjemah', 1),
(87, 'PEKERJAAN', '36', 'Pendeta', 1),
(88, 'PEKERJAAN', '37', 'Wartawan', 1),
(89, 'PEKERJAAN', '38', 'Juru Masak', 1),
(90, 'PEKERJAAN', '39', 'Promotor Acara', 1),
(91, 'PEKERJAAN', '40', 'Anggota DPR RI', 1),
(92, 'PEKERJAAN', '41', 'Anggota DPD', 1),
(93, 'PEKERJAAN', '42', 'Anggota BPK', 1),
(94, 'PEKERJAAN', '43', 'Gubernur', 1),
(95, 'PEKERJAAN', '44', 'Wakil Gubernur', 1),
(96, 'PEKERJAAN', '45', 'Bupati', 1),
(97, 'PEKERJAAN', '46', 'Wakil Bupati', 1),
(98, 'PEKERJAAN', '47', 'Walikota', 1),
(99, 'PEKERJAAN', '48', 'Wakil Walikota', 1),
(100, 'PEKERJAAN', '49', 'Anggota DPRD Prov.', 1),
(101, 'PEKERJAAN', '50', 'Anggota DPRD Kab./Kota', 1),
(102, 'PEKERJAAN', '51', 'Dosen', 1),
(103, 'PEKERJAAN', '52', 'Guru', 1),
(104, 'PEKERJAAN', '53', 'Pilot', 1),
(105, 'PEKERJAAN', '54', 'Pengacara', 1),
(106, 'PEKERJAAN', '55', 'Notaris', 1),
(107, 'PEKERJAAN', '56', 'Arsitek', 1),
(108, 'PEKERJAAN', '57', 'Akuntan', 1),
(109, 'PEKERJAAN', '58', 'Konsultan', 1),
(110, 'PEKERJAAN', '59', 'Dokter', 1),
(111, 'PEKERJAAN', '60', 'Bidan', 1),
(112, 'PEKERJAAN', '61', 'Perawat', 1),
(113, 'PEKERJAAN', '62', 'Apoteker', 1),
(114, 'PEKERJAAN', '63', 'Psikiater/Psikolog', 1),
(115, 'PEKERJAAN', '64', 'Penyiar Televisi', 1),
(116, 'PEKERJAAN', '65', 'Penyiar Radio', 1),
(117, 'PEKERJAAN', '66', 'Pelaut', 1),
(118, 'PEKERJAAN', '67', 'Peneliti', 1),
(119, 'PEKERJAAN', '68', 'Sopir', 1),
(120, 'PEKERJAAN', '69', 'Pedagang', 1),
(121, 'PEKERJAAN', '70', 'Perangkat Kampung', 1),
(122, 'PEKERJAAN', '71', 'Kepala Desa', 1),
(123, 'PEKERJAAN', '72', 'Wiraswasta', 1),
(124, 'INTRA', '2', 'PW', 1),
(125, 'INTRA', '3', 'PAM', 1),
(126, 'INTRA', '4', 'PAR', 1),
(127, 'STATUS_DOMISILI', '2', 'Tidak Tetap', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_pendeta`
--

CREATE TABLE `t_pendeta` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tgl_pentahbisan` date DEFAULT NULL,
  `emiritus` date DEFAULT NULL,
  `biografi` text,
  `foto` varchar(25) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pendeta`
--

INSERT INTO `t_pendeta` (`id`, `nama`, `tgl_pentahbisan`, `emiritus`, `biografi`, `foto`, `status`) VALUES
(1, '1', '2012-06-04', '2012-06-10', 'test', NULL, 1),
(2, '2', '2012-07-17', '2012-07-17', '<p>testing-testing aja deh okay? deh</p>', '01Profile.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_profilgereja`
--

CREATE TABLE `t_profilgereja` (
  `description` text,
  `last_edited` datetime DEFAULT NULL,
  `edited_by` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_profilgereja`
--

INSERT INTO `t_profilgereja` (`description`, `last_edited`, `edited_by`) VALUES
('<p>Berikut profil dari Gereja Kristen Sumba Waingapu:<br /> 1. test<br /> 2. <strong>tambah test</strong></p>\r\n<p>ttessssssttttttiiiiiiiinnnnnnnngggggggg</p>\r\n<p>testing aja deh kalo gitu</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>ok22</p>', '2012-06-14 17:03:25', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `t_propinsi`
--

CREATE TABLE `t_propinsi` (
  `id` int(11) NOT NULL,
  `pdesc` varchar(100) DEFAULT NULL,
  `active` int(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_propinsi`
--

INSERT INTO `t_propinsi` (`id`, `pdesc`, `active`) VALUES
(1, 'Papua Barat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_rekap_lap_keu`
--

CREATE TABLE `t_rekap_lap_keu` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jum_pemasukan` float DEFAULT NULL,
  `jum_pengeluaran` float DEFAULT NULL,
  `saldo_akhir` float DEFAULT NULL,
  `keterangan` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_rekap_lap_keu`
--

INSERT INTO `t_rekap_lap_keu` (`id`, `tanggal`, `jum_pemasukan`, `jum_pengeluaran`, `saldo_akhir`, `keterangan`) VALUES
(1, '2012-07-11', 12313, 123123, 123123000, 'aadsfasdf');

-- --------------------------------------------------------

--
-- Table structure for table `t_renungan`
--

CREATE TABLE `t_renungan` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `bacaan` varchar(50) DEFAULT NULL,
  `renungan` text,
  `penulis` varchar(50) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_renungan`
--

INSERT INTO `t_renungan` (`id`, `tanggal`, `judul`, `bacaan`, `renungan`, `penulis`, `active`) VALUES
(1, '2012-06-11', 'Kembalilah Ke Jalan Yang Benar', 'Matius 5:15, Kejadian 1:25-27', 'Setiap orang haruslah kembali ke jalan yang benar,kalau tidak kembali akan tersesat dan tidak dapat menemukan jalan kembali.<br/>\r\nDengan demikian kita harus kembali', '1', 1),
(4, '2012-07-23', 'test', 'tsts', 'asfasf', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_role`
--

CREATE TABLE `t_role` (
  `id` int(11) NOT NULL,
  `role` varchar(25) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_role`
--

INSERT INTO `t_role` (`id`, `role`, `active`) VALUES
(1, 'Administrator', 1),
(2, 'Common User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_sejarah`
--

CREATE TABLE `t_sejarah` (
  `description` text,
  `last_edited` datetime DEFAULT NULL,
  `edited_by` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_sejarah`
--

INSERT INTO `t_sejarah` (`description`, `last_edited`, `edited_by`) VALUES
('<p>Jemaat Waingapu pada awal berdiri masih merupakan bangunan darurat yang berada dibelakang gedung gereja saat ini. Gedung gereja lama dibongkar pada tahun 1973 sedangkan gereja baru diresmikan pada tahun 1974. Bangunan gereja jemaat Waingapu dirancang seorang kebangsaan Belanda yang bernama Winiya, dimana gedung gereja ini berbentuk huruf W. Tiang diluarnya yang berjumlah 6 batang&nbsp; menggambarkan bahwa 6 hari lamanya manusia bekerja memenuhi kebutuhan, dan di dalam gedung hanya satu tiang yang menandakan satu hari yaitu hari sabat Tuhan, manusia diingatkan untuk menguduskannya. Pada bagian atap warna pelangi menggambarkan bahwa jemaat Waingapu barasal dari latar belakang suku, adat, kebiasaan yang berbeda-beda dan tetap satu dalam Tuhan. Pada tanggal 31 April 1931 ditempatkan seorang guru Injil suku Ambon bernama Yacobus Amos Siahainenia untuk melayani jemaat, kemudian ditempatkan guru Injil Namu Praing, disusul Bora Kitu pada tahun 1950. Pada tahun 1967 S. H Dara ditahbiskan menjadi pendeta pertama untuk melayani jemaat Waingapu, kemudian pada tanggal 30 Januari 1968 jemaat Waingapu dilayani oleh seorang pelayan yaitu guru Injil Y. W. Ratu, yang kemudian ditahbiskan menjadi pendeta jemaat Waingapu, kemudian pada periode berikutnya jemaat ini dilayani oleh Pdt. Nicolas He, M.Th,&nbsp; setelah itu pendeta Elias Rawambani Sm.Th, kemudian dua orang pendeta ditahbiskan dalam tahun yang sama yaitu Pdt. Johny Umbu Lado, M .Th dan Pdt. Yulius Djara, Sm.Th pada tahun 1989, kemudian disusul Pdt. Soleman Mara Leo, Sm.Th pada tahun 1993.&nbsp; Kemudian pada tanggal 27 Juni 2006, ditahbiskan&nbsp; pendeta Herlina Ratu Kenya S. Th.</p>\r\n<p>Wilayah pelayanan GKS Waingapu pada permulaan berdiri memiliki cabang dan ranting yang meliputi Umamapu, Wairinding, Ndapayami, Mbokah, Londa Lima, Maudolung, Hambapraing, Mondu, sebagai wilayah I. Wilayah II meliputi Kapunduk, Praibakul, Kadahang, Wunga, Napu, Prailangina, Praimarada dan Bidihunga yang sebelumnya bernana Marawua. Kemudian ranting Kalamba yang&nbsp; digarap oleh GKS Waingapu sejak tahun 2001 telah menjadi salah satu ranting wilayah I. Ranting Wui, Praimerada, Bidihunga, pada mulunya merupakan wilayah pelayanan GKS jemaat Wai-Wai, yang diserahkan kemudian kepada GKS Waingapu. Lalu cabang Lambanapu yang meliputi Wairinding dan&nbsp; Ndapayami dimekarkan menajdi pusat GKS Lambanapu pada tahun 1991. Wilayah telah dimekarkan menjadi wilayah pelayanan GKS Kapunduk.</p>\r\n<p>Pelayan pertama yang melayani di Temu, Londalima, dan Maudolung yaitu awam aktif B. K .H. Lay, kemudian diganti oleh guru Injil M. L Kore sekitar tahun 70an. Dan Kadahang dilayani oleh guru Injil C. K. Kore, Pdt. Elias Rawambani menjadi pendeta pekabar Injil pertama di Kadahang, dan setalah jemaat Waingapu memekarkan jemaat cabang Umamapu, Pdt. Elias Rawambani menjadi pendeta pertama dijemaat Umamapu, Mondu sampai Kapunduk dilayani oleh guru Injil bidang Ndjagar. Pada tanggal 26 Mei 2006 GKS jemaat Waingapu memekarkan Jemaat cabang Kapunduk, menjadi GKS Jemaat Kapunduk. Pada tanggal &nbsp;8 November 2006 mentahbiskan Pdt Herilius F. Lekransi S.Th menjadi pendeta pertama di jemaat tersebut. GKS jemaat Waingapu bergabung dalam suatu klasis yaitu Klasis Waingapu yang terdiri dari Jemaat Waingapu, Jemaat Umamapu, Jemaat Payeti dan Jemaat Kapunduk. Namun sekarang Klasis Waingapu sudah dimekarkan menjadi 2 Klasis Yaitu Klasis Waingapu dan Klasis Haharu. Klasis Waingapu meliputi GKS Jemaat Waingapu, GKS Jemaat Payeti, GKS Jemaat Kambajawa sedangkan Klasis Haharu meliputi GKS Jemaat Umamapu, GKS Jemaat Kanatang, GKS Jemaat Kapunduk.</p>', '2012-07-01 12:27:52', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `t_sektor`
--

CREATE TABLE `t_sektor` (
  `id` int(11) NOT NULL,
  `pdesc` varchar(100) DEFAULT NULL,
  `active` int(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_sektor`
--

INSERT INTO `t_sektor` (`id`, `pdesc`, `active`) VALUES
(1, 'I', 1),
(2, 'II', 1),
(3, 'III', 1),
(4, 'IV', 1),
(5, 'V', 1),
(6, 'VI', 1),
(7, 'VII', 1),
(8, 'VIII', 1),
(9, 'IX', 1),
(10, 'X', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_status_nikah`
--

CREATE TABLE `t_status_nikah` (
  `id` int(11) NOT NULL,
  `status` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_status_nikah`
--

INSERT INTO `t_status_nikah` (`id`, `status`) VALUES
(0, 'Belum Menikah/Single'),
(1, 'Tidak Menikah'),
(2, 'Menikah'),
(3, 'Janda/Duda');

-- --------------------------------------------------------

--
-- Table structure for table `t_strukturorg`
--

CREATE TABLE `t_strukturorg` (
  `description` text,
  `last_edited` datetime DEFAULT NULL,
  `edited_by` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_strukturorg`
--

INSERT INTO `t_strukturorg` (`description`, `last_edited`, `edited_by`) VALUES
('<p>Berikut struktur organisasi Gereja Kristen Sumba Waingapu:<br /> 1. test</p>\r\n<p>2. Tus</p>\r\n<p>&nbsp;<img src="/sigereja_sorong/asset/images/tinymce/tes.jpg" /></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '2017-10-05 16:32:42', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `t_suratatestasi`
--

CREATE TABLE `t_suratatestasi` (
  `id` varchar(25) NOT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `tanggal_atestasi_keluarmasuk` date DEFAULT NULL,
  `gereja_tujuanasal` varchar(50) DEFAULT NULL,
  `alamat_gereja_tujuanasal` varchar(50) DEFAULT NULL,
  `alamat_tinggal` varchar(50) DEFAULT NULL,
  `tanggal_masukkeluar` date DEFAULT NULL,
  `individu` varchar(25) DEFAULT NULL,
  `keluarga` varchar(25) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_suratatestasi`
--

INSERT INTO `t_suratatestasi` (`id`, `tanggal_surat`, `tanggal_atestasi_keluarmasuk`, `gereja_tujuanasal`, `alamat_gereja_tujuanasal`, `alamat_tinggal`, `tanggal_masukkeluar`, `individu`, `keluarga`, `active`) VALUES
('1', '2012-07-17', '2012-07-13', 'test', '<p>test</p>', '<p>test</p>', '2012-07-16', 'test', 'test', 0),
('2', '2012-07-05', '2012-07-13', 'eeaer', 'afadsfas', 'asdfadsf', '2012-07-12', 'asfasf', 'asdfas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_suratbaptisidi`
--

CREATE TABLE `t_suratbaptisidi` (
  `id` varchar(50) NOT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `tanggal_baptis_sidi` date DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat_sidibaptis` varchar(50) DEFAULT NULL,
  `pendeta` varchar(25) DEFAULT NULL,
  `tipe` int(11) DEFAULT NULL COMMENT '0=baptis;1=sidi',
  `keterangan` text,
  `active` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_suratbaptisidi`
--

INSERT INTO `t_suratbaptisidi` (`id`, `tanggal_surat`, `tanggal_baptis_sidi`, `nama`, `tempat_sidibaptis`, `pendeta`, `tipe`, `keterangan`, `active`) VALUES
('4', '2012-07-12', '2012-07-27', 'test', 'test', '7', 0, '<p>afadsf</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `uname` varchar(25) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `name` varchar(25) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `last_login` date DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `uname`, `password`, `name`, `role`, `last_login`, `active`) VALUES
(1, 'admin', '12345', 'Administrator', 1, '2018-02-21', 1),
(2, 'tjakep', 'd41d8cd98f00b204e9800998ecf8427e', 'test joki aja', 2, '2012-07-08', 1),
(3, 'ganteng', '12345', 'Ganteng Aja', 2, '2017-10-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_visimisi`
--

CREATE TABLE `t_visimisi` (
  `description` text,
  `last_edited` datetime DEFAULT NULL,
  `edited_by` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_visimisi`
--

INSERT INTO `t_visimisi` (`description`, `last_edited`, `edited_by`) VALUES
('<p><strong>VISI :</strong></p>\r\n<p>Menjadi Gereja yang merefleksikan kebaikan Allah di tengah-tengah masyarakat majemuk Indonesia.</p>\r\n<p><strong>MISI :</strong></p>\r\n<p>Gereja-gereja di Indonesia: makin menguatkan persekutuan di antara gereja-gereja di Indonesia sebagai basis bagi pelayanan dan kesaksian makin lebih terbuka kepada lingkungan yang di dalamnya mereka hidup; menggiatkan pelayanan yang komprehensip di tengah-tengah masyarakat Indonesia sebagai wujud pemberitaan Kabar Baik; ikut mewujudkan masyarakat majemuk Indonesia yang berkeadaban dengan memelopori berbagai upaya terciptanya hubungan-hubungan yang baik dengan komponen-komponen masyarakat; memberikan sumbangan berharga bagi terjadinya proses demokratisasi yang substansial di dalam Negara Indonesia.</p>', '2012-07-20 12:42:43', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `t_wilayah`
--

CREATE TABLE `t_wilayah` (
  `id` varchar(5) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_wilayah`
--

INSERT INTO `t_wilayah` (`id`, `nama`, `active`) VALUES
('1', 'Wilayah 1', 1),
('2', 'Wilayah 2', 1),
('3', 'Wilayah 4', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_artikel`
--
ALTER TABLE `t_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_buku_tamu`
--
ALTER TABLE `t_buku_tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_distrik`
--
ALTER TABLE `t_distrik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_galery`
--
ALTER TABLE `t_galery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_individu`
--
ALTER TABLE `t_individu`
  ADD PRIMARY KEY (`id_individu`);

--
-- Indexes for table `t_jabatan`
--
ALTER TABLE `t_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_jemaat`
--
ALTER TABLE `t_jemaat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_kabupaten_kota`
--
ALTER TABLE `t_kabupaten_kota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_keg_gereja`
--
ALTER TABLE `t_keg_gereja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_keluarga`
--
ALTER TABLE `t_keluarga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_kel_umur`
--
ALTER TABLE `t_kel_umur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_klasis`
--
ALTER TABLE `t_klasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_lingkungan`
--
ALTER TABLE `t_lingkungan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_majelis`
--
ALTER TABLE `t_majelis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pa`
--
ALTER TABLE `t_pa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_param`
--
ALTER TABLE `t_param`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pendeta`
--
ALTER TABLE `t_pendeta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_propinsi`
--
ALTER TABLE `t_propinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_rekap_lap_keu`
--
ALTER TABLE `t_rekap_lap_keu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_renungan`
--
ALTER TABLE `t_renungan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_role`
--
ALTER TABLE `t_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_sektor`
--
ALTER TABLE `t_sektor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_status_nikah`
--
ALTER TABLE `t_status_nikah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_suratatestasi`
--
ALTER TABLE `t_suratatestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_suratbaptisidi`
--
ALTER TABLE `t_suratbaptisidi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_wilayah`
--
ALTER TABLE `t_wilayah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_distrik`
--
ALTER TABLE `t_distrik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_galery`
--
ALTER TABLE `t_galery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_jemaat`
--
ALTER TABLE `t_jemaat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_kabupaten_kota`
--
ALTER TABLE `t_kabupaten_kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_klasis`
--
ALTER TABLE `t_klasis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_lingkungan`
--
ALTER TABLE `t_lingkungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_param`
--
ALTER TABLE `t_param`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT for table `t_propinsi`
--
ALTER TABLE `t_propinsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_sektor`
--
ALTER TABLE `t_sektor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
