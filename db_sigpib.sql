-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2018 at 10:13 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sigpib`
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
  `nama_wil` varchar(5) DEFAULT NULL,
  `jenis_kelamin` varchar(9) DEFAULT NULL,
  `tempat_lahir` varchar(75) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `status_nikah` varchar(5) DEFAULT NULL,
  `baptis` varchar(5) DEFAULT NULL,
  `sidi` varchar(5) DEFAULT NULL,
  `life` varchar(4) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `kel_umur` varchar(10) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_individu`
--

INSERT INTO `t_individu` (`id_individu`, `nama_individu`, `nama_wil`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `telp`, `pekerjaan`, `status_nikah`, `baptis`, `sidi`, `life`, `foto`, `kel_umur`, `status`) VALUES
(2, 'gila banget', '1', '0', 'adfa', '2012-07-18', '<p>dfadf</p>', '23423', 'sdf', '0', '0', '0', '1', 'asciifull.gif', NULL, 1),
(1, 'wrawer', '1', '0', 'adfa', '2012-07-18', 'dfadf', '23423', 'sdf', '0', '0', '0', '1', 'superman.png', NULL, 1),
(3, 'test', '1', '0', 'test', '2012-07-19', 'test', '2342', 'test', '0', '0', '0', '1', '', NULL, 1);

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
  `active` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_keluarga`
--

INSERT INTO `t_keluarga` (`id`, `nama`, `wilayah`, `alamat`, `notelp`, `active`) VALUES
(1, 'teseterer', '1', '<p>test</p>', '123', 1),
(2, 'asgasw', '2', 'adfasdfasdf', '324234', 0);

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
(1, '2', '1', '', '2012-01-24', 1),
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
(4, '2012-07-23', 'test', 'tsts', 'asfasf', '2', 1),
(5, '2015-12-23', 'test1', 'Matius 22:16', 'Hanya testing', '1', 1);

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
('<p>Berikut struktur organisasi Gereja Kristen Sumba Waingapu:<br /> 1. test</p>\r\n<p>2. Tus</p>', '2012-06-14 17:04:18', 'Administrator');

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
(1, 'test', '827ccb0eea8a706c4c34a16891f84e7b', 'Administrator', 1, '2015-12-23', 1),
(2, 'ucup', 'd41d8cd98f00b204e9800998ecf8427e', 'test joki aja', 2, '2012-07-08', 1);

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
-- Indexes for table `t_pendeta`
--
ALTER TABLE `t_pendeta`
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
-- AUTO_INCREMENT for table `t_galery`
--
ALTER TABLE `t_galery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
