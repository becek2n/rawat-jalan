-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 21. Mei 2015 jam 09:11
-- Versi Server: 5.1.41
-- Versi PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rawat-jalan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dataudittrail`
--

CREATE TABLE IF NOT EXISTS `dataudittrail` (
  `idaudit` int(11) NOT NULL AUTO_INCREMENT,
  `tablename` varchar(30) NOT NULL,
  `action` varchar(30) NOT NULL,
  `objfield` text NOT NULL,
  `datecreate` datetime NOT NULL,
  `createby` varchar(30) NOT NULL,
  PRIMARY KEY (`idaudit`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data untuk tabel `dataudittrail`
--

INSERT INTO `dataudittrail` (`idaudit`, `tablename`, `action`, `objfield`, `datecreate`, `createby`) VALUES
(29, 'Poli', 'Add', 'Nama Poli : x | Date Create :  | Create By : admin | ', '0000-00-00 00:00:00', 'admin'),
(28, 'Poli', 'Add', 'Nama Poli : x | Date Create :  | Create By : admin | ', '0000-00-00 00:00:00', 'admin'),
(27, 'Poli', 'Add', 'Nama Poli : x | Date Create :  | Create By : admin | ', '0000-00-00 00:00:00', 'admin'),
(26, 'Poli', 'Add', 'Nama Poli : x | Date Create :  | Create By : admin | ', '0000-00-00 00:00:00', 'admin'),
(25, 'Poli', 'Add', 'Nama Poli : x | Date Create :  | Create By : admin | ', '0000-00-00 00:00:00', 'admin'),
(24, 'Poli', 'Add', 'Nama Poli : xDate Create : Create By : admin', '0000-00-00 00:00:00', 'admin'),
(30, 'Poli', 'Add', 'Nama Poli : x | Date Create :  | Create By : admin | ', '0000-00-00 00:00:00', 'admin'),
(31, 'Poli', 'Add', 'Nama Poli : x | Date Create :  | Create By : admin | ', '0000-00-00 00:00:00', 'admin'),
(32, 'Poli', 'Add', 'Nama Poli :  | Date Create :  | Create By : admin | ', '0000-00-00 00:00:00', 'admin'),
(33, 'Poli', 'Add', 'Nama Poli : x | Date Create :  | Create By : admin | ', '0000-00-00 00:00:00', 'admin'),
(34, 'Poli', 'Add', 'Nama Poli : anak | Date Create :  | Create By : admin | ', '0000-00-00 00:00:00', 'admin'),
(35, 'Dokter', 'Add', 'Nama Dokter : tes | Date Create :  | Create By : admin | ', '0000-00-00 00:00:00', 'admin'),
(36, 'Dokter', 'Add', 'Nama Dokter :  | Date Create :  | Create By : admin | ', '0000-00-00 00:00:00', 'admin'),
(37, 'Dokter', 'Add', 'Nama Dokter : dr. calang | Date Create :  | Create By : admin | ', '0000-00-00 00:00:00', 'admin'),
(38, 'Dokter', 'Delete', 'ID Dokter : 16 | Date :  | Delete By : admin | ', '0000-00-00 00:00:00', 'admin'),
(39, 'Dokter', 'Delete', 'ID Dokter : 15 | Date :  | Delete By : admin | ', '0000-00-00 00:00:00', 'admin'),
(40, 'Dokter', 'Delete', 'ID Dokter : 8 | Date :  | Delete By : admin | ', '0000-00-00 00:00:00', 'admin'),
(41, 'Dokter', 'Delete', 'ID Dokter : 9 | Date :  | Delete By : admin | ', '0000-00-00 00:00:00', 'admin'),
(42, 'Dokter', 'Delete', 'ID Dokter : 12 | Date :  | Delete By : admin | ', '0000-00-00 00:00:00', 'admin'),
(43, 'Dokter', 'Delete', 'ID Dokter : 11 | Date :  | Delete By : admin | ', '0000-00-00 00:00:00', 'admin'),
(44, 'Dokter', 'Add', 'Nama Dokter : testing | Date Create :  | Create By : admin | ', '0000-00-00 00:00:00', 'admin'),
(45, 'Dokter', 'Add', 'Nama Dokter : xxxxxxx | Date Create :  | Create By : admin | ', '0000-00-00 00:00:00', 'admin'),
(46, 'Pasien', 'Add', 'ID Pasien : 2015050882 | Nama Pasien : 2 | Tempat Lahir : 2 | Tanggal Lahir : 05/28/2015 | Usia : 0 | Jenis Kelamin : Laki-laki | Alamat :  | Agama : Islam | Status : Menikah | No Antri : 1 | ID Poli : 3 | ID Dokter : 17 | ID Hari : 2 | Date Create :  | Create By :  | ', '0000-00-00 00:00:00', 'admin'),
(47, 'Pasien', 'Add', 'ID Pasien : 2015050882 | Nama Pasien : 2 | Tempat Lahir : 2 | Tanggal Lahir : 05/28/2015 | Usia : 0 | Jenis Kelamin : Laki-laki | Alamat :  | Agama : Islam | Status : Menikah | No Antri : 1 | ID Poli : 3 | ID Dokter : 17 | ID Hari : 2 | Date Create :  | Create By : admin | ', '0000-00-00 00:00:00', 'admin'),
(48, 'Pasien', 'Add', 'ID Pasien : 2015050882 | Nama Pasien : 2 | Tempat Lahir : 2 | Tanggal Lahir : 05/28/2015 | Usia : 0 | Jenis Kelamin : Laki-laki | Alamat :  | Agama : Islam | Status : Menikah | No Antri : 1 | ID Poli : 3 | ID Dokter : 17 | ID Hari : 2 | Date Create :  | Create By : admin | ', '0000-00-00 00:00:00', 'admin'),
(49, 'Pasien', 'Add', 'ID Pasien : 201505091 | Nama Pasien : tes | Tempat Lahir : www | Tanggal Lahir : 05/30/2015 | Usia : 0 | Jenis Kelamin : Laki-laki | Alamat :  | Agama : Islam | Status : Menikah | No Antri : 1 | ID Poli : 3 | ID Dokter : 17 | ID Hari : 3 | Date Create :  | Create By : admin | ', '0000-00-00 00:00:00', 'admin'),
(50, 'Dokter', 'Add', 'Nama Dokter : xxx | Date Create : 2015-05-09 11:19:46 | Create By : admin', '0000-00-00 00:00:00', 'admin'),
(51, 'Poli', 'Add', 'Nama Poli : ccc | Date Create :  | Create By : admin', '0000-00-00 00:00:00', 'admin'),
(52, 'Poli', 'Add', 'Nama Poli : cccx | Date Create :  | Create By : admin', '0000-00-00 00:00:00', 'admin'),
(53, 'Poli', 'Delete', 'ID Poli :  | Date :  | Delete By : admin | ', '0000-00-00 00:00:00', 'admin'),
(54, 'Poli', 'Delete', 'ID Poli :  | Date :  | Delete By : admin | ', '0000-00-00 00:00:00', 'admin'),
(55, 'Dokter', 'Delete', 'ID Dokter : 20 | Date : 2015-05-09 11:23:43 | Delete By : admin', '0000-00-00 00:00:00', 'admin'),
(56, 'Dokter', 'Delete', 'ID Dokter : 19 | Date : 2015-05-09 11:23:51 | Delete By : admin', '0000-00-00 00:00:00', 'admin'),
(57, 'Dokter', 'Delete', 'ID Dokter : 18 | Date : 2015-05-09 11:23:59 | Delete By : admin', '0000-00-00 00:00:00', 'admin'),
(58, 'Dokter', 'Delete', 'ID Dokter : 13 | Date : 2015-05-09 11:24:06 | Delete By : admin', '0000-00-00 00:00:00', 'admin'),
(59, 'Dokter', 'Delete', 'ID Dokter : 14 | Date : 2015-05-09 11:24:15 | Delete By : admin', '0000-00-00 00:00:00', 'admin'),
(60, 'Dokter', 'Add', 'Nama Dokter : xx | Date Create : 2015-05-09 11:28:13 | Create By : admin', '0000-00-00 00:00:00', 'admin'),
(61, 'Dokter', 'Delete', 'ID Dokter : 21 | Date : 2015-05-09 11:29:56 | Delete By : admin', '0000-00-00 00:00:00', 'admin'),
(62, 'Poli', 'Add', 'Nama Poli : mnb | Date Create : 2015-05-09 11:31:44 | Create By : admin', '0000-00-00 00:00:00', 'admin'),
(63, 'Poli', 'Delete', 'ID Poli :  | Date : 2015-05-09 11:32:57 | Delete By : admin | ', '0000-00-00 00:00:00', 'admin'),
(64, 'Poli', 'Add', 'Nama Poli : x | Date Create : 2015-05-09 17:41:36 | Create By : admin', '0000-00-00 00:00:00', 'admin'),
(65, 'Pasien', 'Add', 'ID Pasien : 20150509995 | Nama Pasien : xcv | Tempat Lahir : x | Tanggal Lahir : 05/22/2015 | Usia : 0 | Jenis Kelamin : Laki-laki | Alamat : x | Agama : Islam | Status : Janda/Duda | No Antri : 4 | ID Poli : 3 | ID Dokter : 17 | ID Hari : 2 | Date Create :  | Create By : admin', '0000-00-00 00:00:00', 'admin'),
(66, 'Pasien', 'Add', 'ID Pasien : 20150509001 | Nama Pasien : as | Tempat Lahir : sss | Tanggal Lahir : 05/23/2015 | Usia : 0 | Jenis Kelamin : Laki-laki | Alamat : x | Agama : Kristen | Status : Menikah | No Antri : 1 | ID Poli : 3 | ID Dokter : 17 | ID Hari : 2 | Date Create :  | Create By : admin', '0000-00-00 00:00:00', 'admin'),
(67, 'Pasien', 'Add', 'ID Pasien : 201505091 | Nama Pasien : x | Tempat Lahir : x | Tanggal Lahir : 05/22/2015 | Usia : 0 | Jenis Kelamin : Laki-laki | Alamat : x | Agama : Kristen | Status : Janda/Duda | No Antri : 2 | ID Poli : 3 | ID Dokter : 17 | ID Hari : 3 | Date Create :  | Create By : admin', '0000-00-00 00:00:00', 'admin'),
(68, 'Pasien', 'Add', 'ID Pasien : 201505101 | Nama Pasien : tes | Tempat Lahir : tes | Tanggal Lahir : 05/02/2015 | Usia : 0 | Jenis Kelamin : Perempuan | Alamat : tes | Agama : Hindu | Status : Janda/Duda | No Antri : 1 | ID Poli : 3 | ID Dokter : 17 | ID Hari : 3 | Date Create :  | Create By : admin', '0000-00-00 00:00:00', 'admin'),
(69, 'Pasien', 'Add', 'ID Pasien : 201505102 | Nama Pasien : s | Tempat Lahir : x | Tanggal Lahir : 05/02/2015 | Usia : 0 | Jenis Kelamin : Laki-laki | Alamat : c | Agama : Islam | Status : Menikah | No Antri : 2 | ID Poli : 3 | ID Dokter : 17 | ID Hari : 2 | Date Create :  | Create By : admin', '0000-00-00 00:00:00', 'admin'),
(70, 'Pasien', 'Add', 'ID Pasien : 201505103 | Nama Pasien : testing | Tempat Lahir : testing | Tanggal Lahir : 05/02/2015 | Usia : 0 | Jenis Kelamin : Laki-laki | Alamat : testing | Agama : Islam | Status : Menikah | No Antri : 3 | ID Poli : 3 | ID Dokter : 17 | ID Hari : 3 | Date Create :  | Create By : admin', '0000-00-00 00:00:00', 'admin'),
(71, 'Pasien', 'Add', 'ID Pasien : 201505104 | Nama Pasien : c | Tempat Lahir : c | Tanggal Lahir : 05/31/2015 | Usia : 0 | Jenis Kelamin : Laki-laki | Alamat : c | Agama : Islam | Status : Menikah | No Antri : 4 | ID Poli : 3 | ID Dokter : 17 | ID Hari : 2 | Date Create :  | Create By : admin', '0000-00-00 00:00:00', 'admin'),
(72, 'Pasien', 'Add', 'ID Pasien : 201505105 | Nama Pasien : x | Tempat Lahir : x | Tanggal Lahir : 05/21/2015 | Usia : 0 | Jenis Kelamin : Laki-laki | Alamat : x | Agama : Islam | Status : Menikah | No Antri : 5 | ID Poli : 3 | ID Dokter : 17 | ID Hari : 3 | Date Create :  | Create By : admin', '0000-00-00 00:00:00', 'admin'),
(73, 'Pasien', 'Add', 'ID Pasien : 201505141 | Nama Pasien : januar | Tempat Lahir : bogor | Tanggal Lahir : 05/02/2015 | Usia : 0 | Jenis Kelamin : Laki-laki | Alamat : bogor | Agama : Islam | Status : Belum Menikah | No Antri : 1 | ID Poli : 3 | ID Dokter : 17 | ID Hari : 3 | Date Create :  | Create By : admin', '0000-00-00 00:00:00', 'admin'),
(74, 'Pasien', 'Add', 'ID Pasien : 201505142 | Nama Pasien : tes | Tempat Lahir : tes | Tanggal Lahir : 05/30/2015 | Usia : 0 | Jenis Kelamin : Perempuan | Alamat : c | Agama : Islam | Status : Menikah | No Antri : 2 | ID Poli : 3 | ID Dokter : 17 | ID Hari : 3 | Date Create :  | Create By : admin', '0000-00-00 00:00:00', 'admin'),
(75, 'Pasien', 'Add', 'ID Pasien : 201505143 | Nama Pasien : x | Tempat Lahir : x | Tanggal Lahir : 05/30/2015 | Usia : 0 | Jenis Kelamin : Laki-laki | Alamat : c` | Agama : Islam | Status : Menikah | No Antri : 3 | ID Poli : 3 | ID Dokter : 17 | ID Hari : 2 | Date Create :  | Create By : admin', '0000-00-00 00:00:00', 'admin'),
(76, 'Pasien', 'Add', 'ID Pasien : 201505144 | Nama Pasien : ccc | Tempat Lahir : ccc | Tanggal Lahir : 05/16/2015 | Usia : 0 | Jenis Kelamin : Laki-laki | Alamat : ccc | Agama : Islam | Status : Menikah | No Antri : 4 | ID Poli : 3 | ID Dokter : 17 | ID Hari : 3 | Date Create :  | Create By : admin', '0000-00-00 00:00:00', 'admin'),
(77, 'Dokter', 'Delete', 'ID Dokter : 10 | Date : 2015-05-17 15:38:00 | Delete By : admin', '0000-00-00 00:00:00', 'admin'),
(78, 'Dokter', 'Delete', 'ID Dokter : 10 | Date : 2015-05-17 15:38:01 | Delete By : admin', '0000-00-00 00:00:00', 'admin'),
(79, 'Pasien', 'Delete', 'ID Pasien :  | Date : 2015-05-17 15:46:24 | Delete By : admin', '0000-00-00 00:00:00', 'admin'),
(80, 'Pasien', 'Delete', 'ID Pasien :  | Date : 2015-05-17 15:47:42 | Delete By : admin', '0000-00-00 00:00:00', 'admin'),
(81, 'Pasien', 'Delete', 'ID Pasien :  | Date : 2015-05-17 15:48:16 | Delete By : admin', '0000-00-00 00:00:00', 'admin'),
(82, 'Chekcup Detail', 'Delete', 'ID Pasien :  | Tindakan : admin | Harga : admin | Date : 2015-05-18 23:40:18 | Delete By : admin', '0000-00-00 00:00:00', 'admin'),
(83, 'Chekcup Detail', 'Delete', 'ID Pasien :  | Tindakan : admin | Harga : admin | Date : 2015-05-18 23:40:42 | Delete By : admin', '0000-00-00 00:00:00', 'admin'),
(84, 'Chekcup Detail', 'Delete', 'ID Pasien : 201505103 | Tindakan : x | Harga : 12222 | Date : 2015-05-18 23:44:06 | Delete By : admin', '2015-05-18 23:44:06', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datcheckup`
--

CREATE TABLE IF NOT EXISTS `datcheckup` (
  `idcheck` int(11) NOT NULL AUTO_INCREMENT,
  `idpoli` int(11) NOT NULL,
  `iddokter` int(11) NOT NULL,
  `noantrian` int(11) NOT NULL,
  `flagbayar` int(1) NOT NULL,
  `flagrawat` int(11) NOT NULL,
  `datecreate` datetime NOT NULL,
  `createby` varchar(30) NOT NULL,
  `idpasien` varchar(12) NOT NULL,
  PRIMARY KEY (`idcheck`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `datcheckup`
--

INSERT INTO `datcheckup` (`idcheck`, `idpoli`, `iddokter`, `noantrian`, `flagbayar`, `flagrawat`, `datecreate`, `createby`, `idpasien`) VALUES
(13, 3, 17, 5, 0, 0, '2015-05-10 00:42:24', 'admin', '201505105'),
(12, 3, 17, 4, 1, 0, '2015-05-10 00:41:36', 'admin', '201505104'),
(11, 3, 17, 3, 1, 0, '2015-05-10 00:40:34', 'admin', '201505103'),
(10, 3, 17, 2, 0, 0, '2015-05-10 00:20:48', 'admin', '201505102'),
(14, 3, 17, 1, 0, 0, '2015-05-14 13:09:10', 'admin', '201505141'),
(15, 3, 17, 2, 0, 0, '2015-05-14 13:10:53', 'admin', '201505142'),
(16, 3, 17, 3, 0, 0, '2015-05-14 13:19:53', 'admin', '201505143'),
(17, 3, 17, 4, 0, 0, '2015-05-14 13:21:26', 'admin', '201505144');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datcheckupdetail`
--

CREATE TABLE IF NOT EXISTS `datcheckupdetail` (
  `idcheckdetail` int(11) NOT NULL AUTO_INCREMENT,
  `idpasien` varchar(12) NOT NULL,
  `tindakan` varchar(100) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `datecreate` datetime NOT NULL,
  `createby` varchar(30) NOT NULL,
  PRIMARY KEY (`idcheckdetail`),
  KEY `idpasien` (`idpasien`,`tindakan`,`harga`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `datcheckupdetail`
--

INSERT INTO `datcheckupdetail` (`idcheckdetail`, `idpasien`, `tindakan`, `harga`, `datecreate`, `createby`) VALUES
(1, '201505104', 'x', '123', '2015-05-10 23:40:18', 'admin'),
(2, '201505104', 'x', '123', '2015-05-10 23:40:42', 'admin'),
(3, '201505103', 'x', '12222', '2015-05-10 23:44:06', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `refdokter`
--

CREATE TABLE IF NOT EXISTS `refdokter` (
  `iddokter` int(11) NOT NULL AUTO_INCREMENT,
  `idpoli` int(11) NOT NULL,
  `namadokter` varchar(35) NOT NULL,
  `datecreate` datetime NOT NULL,
  `createby` varchar(30) NOT NULL,
  `datemodified` datetime NOT NULL,
  `modifiedby` varchar(30) NOT NULL,
  PRIMARY KEY (`iddokter`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data untuk tabel `refdokter`
--

INSERT INTO `refdokter` (`iddokter`, `idpoli`, `namadokter`, `datecreate`, `createby`, `datemodified`, `modifiedby`) VALUES
(1, 0, 'Dr.Adi', '2015-04-01 13:31:53', 'adi', '2015-04-30 13:32:03', 'adi'),
(17, 3, 'dr. calang', '0000-00-00 00:00:00', 'admin', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `refdokterdetailpraktek`
--

CREATE TABLE IF NOT EXISTS `refdokterdetailpraktek` (
  `iddetailprakter` int(11) NOT NULL AUTO_INCREMENT,
  `iddokter` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jamdari` time NOT NULL,
  `jamsampai` time NOT NULL,
  PRIMARY KEY (`iddetailprakter`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `refdokterdetailpraktek`
--

INSERT INTO `refdokterdetailpraktek` (`iddetailprakter`, `iddokter`, `hari`, `jamdari`, `jamsampai`) VALUES
(1, 1, 'xx', '09:00:00', '10:00:00'),
(2, 17, 'Senin', '01:00:00', '05:00:00'),
(3, 17, 'Rabu', '01:00:00', '12:00:00'),
(4, 18, 'Senin', '01:00:00', '14:00:00'),
(5, 19, 'Senin', '01:00:00', '14:00:00'),
(6, 20, 'Senin', '01:00:00', '11:00:00'),
(7, 21, 'Senin', '07:00:00', '11:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `refgroup`
--

CREATE TABLE IF NOT EXISTS `refgroup` (
  `idgroup` int(11) NOT NULL AUTO_INCREMENT,
  `namagroup` varchar(30) NOT NULL,
  `datecreate` datetime NOT NULL,
  `createby` varchar(30) NOT NULL,
  PRIMARY KEY (`idgroup`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `refgroup`
--

INSERT INTO `refgroup` (`idgroup`, `namagroup`, `datecreate`, `createby`) VALUES
(1, 'Administrator', '2015-04-03 02:02:57', 'djanuar'),
(2, 'Registrasi', '2015-04-03 02:03:08', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `refmenu`
--

CREATE TABLE IF NOT EXISTS `refmenu` (
  `idmenu` int(11) NOT NULL AUTO_INCREMENT,
  `mnname` varchar(50) NOT NULL,
  `mnlink` varchar(100) NOT NULL,
  `parenid` int(11) NOT NULL,
  PRIMARY KEY (`idmenu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data untuk tabel `refmenu`
--

INSERT INTO `refmenu` (`idmenu`, `mnname`, `mnlink`, `parenid`) VALUES
(1, 'Home', '#home', 0),
(2, 'Logout', 'index.php?page=logout', 1),
(3, 'Data', '#', 0),
(4, 'Registration', 'index.php?page=pasien', 3),
(5, 'Pembayaran', 'index.php?page=pembayaran', 3),
(10, 'Report', '#', 0),
(12, 'Transaksi', 'index.php?page=reporttransaction', 10),
(13, 'Audit Trail', '#', 10),
(14, 'Master Data', '#', 0),
(15, 'Poli', 'index.php?page=poli', 14),
(16, 'Administrator', '#', 0),
(17, 'Group', 'index.php?page=group', 16),
(18, 'User', 'index.php?page=user', 16),
(19, 'Dokter', 'index.php?page=dokter', 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `refpasien`
--

CREATE TABLE IF NOT EXISTS `refpasien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idpasien` varchar(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempatlahir` varchar(50) NOT NULL,
  `tanggallahir` date NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `usia` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `datecreate` datetime NOT NULL,
  `createby` varchar(30) NOT NULL,
  `datemodified` datetime NOT NULL,
  `modifiedby` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data untuk tabel `refpasien`
--

INSERT INTO `refpasien` (`id`, `idpasien`, `nama`, `tempatlahir`, `tanggallahir`, `jeniskelamin`, `usia`, `alamat`, `agama`, `status`, `datecreate`, `createby`, `datemodified`, `modifiedby`) VALUES
(31, '201505104', 'c', 'c', '0000-00-00', 'Laki-laki', 0, 'c', 'Islam', 'Menikah', '2015-05-10 00:41:29', 'admin', '0000-00-00 00:00:00', ''),
(30, '201505103', 'testing', 'testing', '0000-00-00', 'Laki-laki', 0, 'testing', 'Islam', 'Menikah', '2015-05-10 00:40:32', 'admin', '0000-00-00 00:00:00', ''),
(33, '201505141', 'januar', 'bogor', '0000-00-00', 'Laki-laki', 0, 'bogor', 'Islam', 'Belum Menikah', '2015-05-14 13:09:10', 'admin', '0000-00-00 00:00:00', ''),
(34, '201505142', 'tes', 'tes', '0000-00-00', 'Perempuan', 0, 'c', 'Islam', 'Menikah', '2015-05-14 13:10:53', 'admin', '0000-00-00 00:00:00', ''),
(36, '201505144', 'ccc', 'ccc', '0000-00-00', 'Laki-laki', 0, 'ccc', 'Islam', 'Menikah', '2015-05-14 13:21:26', 'admin', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `refpoli`
--

CREATE TABLE IF NOT EXISTS `refpoli` (
  `idpoli` int(11) NOT NULL AUTO_INCREMENT,
  `namapoli` varchar(100) NOT NULL,
  `datecreate` datetime NOT NULL,
  `createby` varchar(30) NOT NULL,
  `datemodified` datetime NOT NULL,
  `modifiedby` varchar(30) NOT NULL,
  PRIMARY KEY (`idpoli`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data untuk tabel `refpoli`
--

INSERT INTO `refpoli` (`idpoli`, `namapoli`, `datecreate`, `createby`, `datemodified`, `modifiedby`) VALUES
(3, 'Mata', '2015-04-01 22:01:48', '', '2015-04-01 22:01:52', ''),
(4, 'Gigi', '2015-04-01 22:01:57', '', '2015-04-01 22:02:00', ''),
(69, 'anak', '0000-00-00 00:00:00', 'admin', '0000-00-00 00:00:00', ''),
(73, 'x', '2015-05-09 17:41:36', 'admin', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `refrole`
--

CREATE TABLE IF NOT EXISTS `refrole` (
  `idrole` int(11) NOT NULL AUTO_INCREMENT,
  `idgroup` int(11) NOT NULL,
  `idmenu` int(11) NOT NULL,
  `datecreate` datetime DEFAULT NULL,
  `createby` varchar(30) DEFAULT NULL,
  `datemodified` datetime DEFAULT NULL,
  `modifiedby` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idrole`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data untuk tabel `refrole`
--

INSERT INTO `refrole` (`idrole`, `idgroup`, `idmenu`, `datecreate`, `createby`, `datemodified`, `modifiedby`) VALUES
(10, 1, 1, '0000-00-00 00:00:00', 'admin', NULL, NULL),
(56, 2, 7, '0000-00-00 00:00:00', 'admin', NULL, NULL),
(55, 2, 5, '0000-00-00 00:00:00', 'admin', NULL, NULL),
(11, 1, 2, '0000-00-00 00:00:00', 'admin', NULL, NULL),
(12, 1, 3, '0000-00-00 00:00:00', 'admin', NULL, NULL),
(13, 1, 4, '0000-00-00 00:00:00', 'admin', NULL, NULL),
(14, 1, 5, '0000-00-00 00:00:00', 'admin', NULL, NULL),
(15, 1, 6, '0000-00-00 00:00:00', 'admin', NULL, NULL),
(16, 1, 7, '0000-00-00 00:00:00', 'admin', NULL, NULL),
(17, 1, 10, '0000-00-00 00:00:00', 'admin', NULL, NULL),
(18, 1, 12, '0000-00-00 00:00:00', 'admin', NULL, NULL),
(19, 1, 13, '0000-00-00 00:00:00', 'admin', NULL, NULL),
(20, 1, 14, '0000-00-00 00:00:00', 'admin', NULL, NULL),
(21, 1, 15, '0000-00-00 00:00:00', 'admin', NULL, NULL),
(22, 1, 16, '0000-00-00 00:00:00', 'admin', NULL, NULL),
(23, 1, 17, '0000-00-00 00:00:00', 'admin', NULL, NULL),
(24, 1, 18, '0000-00-00 00:00:00', 'admin', NULL, NULL),
(25, 1, 19, '0000-00-00 00:00:00', 'admin', NULL, NULL),
(54, 2, 3, '0000-00-00 00:00:00', 'admin', NULL, NULL),
(53, 2, 2, '0000-00-00 00:00:00', 'admin', NULL, NULL),
(52, 2, 1, '0000-00-00 00:00:00', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `refuser`
--

CREATE TABLE IF NOT EXISTS `refuser` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `idgroup` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `isactive` int(1) NOT NULL,
  `lastlogon` datetime DEFAULT NULL,
  `lastlogoff` datetime DEFAULT NULL,
  `datecreate` datetime DEFAULT NULL,
  `createby` varchar(30) DEFAULT NULL,
  `datemodified` datetime DEFAULT NULL,
  `modifiedby` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `refuser`
--

INSERT INTO `refuser` (`iduser`, `idgroup`, `username`, `fullname`, `password`, `isactive`, `lastlogon`, `lastlogoff`, `datecreate`, `createby`, `datemodified`, `modifiedby`) VALUES
(1, 1, 'admin', 'djanuar aransyah', 'admin', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(3, 2, 'aransyah', 'aransyah', '321', 1, NULL, NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
