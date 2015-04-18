-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 18, 2015 at 04:50 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

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
-- Table structure for table `dataudittrail`
--

CREATE TABLE IF NOT EXISTS `dataudittrail` (
  `idaudit` int(11) NOT NULL AUTO_INCREMENT,
  `tablename` varchar(30) NOT NULL,
  `action` varchar(30) NOT NULL,
  `objfield` text NOT NULL,
  `datecreate` datetime NOT NULL,
  `createby` varchar(30) NOT NULL,
  PRIMARY KEY (`idaudit`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `dataudittrail`
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
(35, 'Dokter', 'Add', 'Nama Dokter : tes | Date Create :  | Create By : admin | ', '0000-00-00 00:00:00', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `datcheckup`
--

CREATE TABLE IF NOT EXISTS `datcheckup` (
  `idcheck` int(11) NOT NULL AUTO_INCREMENT,
  `idpoli` int(11) NOT NULL,
  `noantrian` int(11) NOT NULL,
  `checkke` int(11) NOT NULL,
  `datecreate` int(11) NOT NULL,
  `createby` varchar(30) NOT NULL,
  `datemodified` int(11) NOT NULL,
  `modifiedby` varchar(30) NOT NULL,
  PRIMARY KEY (`idcheck`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `datcheckup`
--


-- --------------------------------------------------------

--
-- Table structure for table `refdokter`
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `refdokter`
--

INSERT INTO `refdokter` (`iddokter`, `idpoli`, `namadokter`, `datecreate`, `createby`, `datemodified`, `modifiedby`) VALUES
(1, 0, 'Dr.Adi', '2015-04-01 13:31:53', 'adi', '2015-04-30 13:32:03', 'adi'),
(2, 6, 'Dr.Adi', '2015-04-01 13:31:53', 'adi', '2015-04-30 13:32:03', 'adi'),
(3, 3, 'tes', '0000-00-00 00:00:00', 'admin', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `refgroup`
--

CREATE TABLE IF NOT EXISTS `refgroup` (
  `idgroup` int(11) NOT NULL AUTO_INCREMENT,
  `namagroup` varchar(30) NOT NULL,
  `datecreate` datetime NOT NULL,
  `createby` varchar(30) NOT NULL,
  PRIMARY KEY (`idgroup`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `refgroup`
--

INSERT INTO `refgroup` (`idgroup`, `namagroup`, `datecreate`, `createby`) VALUES
(1, 'Administrator', '2015-04-03 02:02:57', 'djanuar'),
(2, 'Registrasi', '2015-04-03 02:03:08', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `refharikerja`
--

CREATE TABLE IF NOT EXISTS `refharikerja` (
  `idharikerja` int(11) NOT NULL AUTO_INCREMENT,
  `iddokter` int(11) NOT NULL,
  `harikerja` varchar(10) NOT NULL,
  `jampraktekfrom` time NOT NULL,
  `jampraktekto` time NOT NULL,
  `datecreate` datetime NOT NULL,
  `createby` varchar(30) NOT NULL,
  `datemodified` datetime NOT NULL,
  `modifiedby` varchar(30) NOT NULL,
  PRIMARY KEY (`idharikerja`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `refharikerja`
--


-- --------------------------------------------------------

--
-- Table structure for table `refmenu`
--

CREATE TABLE IF NOT EXISTS `refmenu` (
  `idmenu` int(11) NOT NULL AUTO_INCREMENT,
  `mnname` varchar(50) NOT NULL,
  `mnlink` varchar(100) NOT NULL,
  `parenid` int(11) NOT NULL,
  PRIMARY KEY (`idmenu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `refmenu`
--

INSERT INTO `refmenu` (`idmenu`, `mnname`, `mnlink`, `parenid`) VALUES
(1, 'Home', '#home', 0),
(2, 'Logout', 'index.php?page=logout', 1),
(3, 'Data', '#', 0),
(4, 'Registration', 'index.php?page=pasien', 3),
(5, 'Pembayaran', 'index.php?page=menu', 3),
(6, 'Obat', '#', 5),
(7, 'Perawatan', '#', 5),
(10, 'Report', '#', 0),
(12, 'Transaksi', '#', 10),
(13, 'Audit Trail', '#', 10),
(14, 'Master Data', '#', 0),
(15, 'Poli', 'index.php?page=poli', 14),
(16, 'Administrator', '#', 0),
(17, 'Group', 'index.php?page=group', 16),
(18, 'User', 'index.php?page=user', 16),
(19, 'Dokter', 'index.php?page=dokter', 14);

-- --------------------------------------------------------

--
-- Table structure for table `refpasien`
--

CREATE TABLE IF NOT EXISTS `refpasien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `refpasien`
--

INSERT INTO `refpasien` (`id`, `nama`, `jeniskelamin`, `alamat`, `agama`, `status`) VALUES
(1, 'tes', 'tes', 'tesss', 'tes', 'tes'),
(2, 'tes2', 'tes', 'tesss', 'tes', 'tes'),
(3, 'tes', 'tes', 'asd', 'tes', ''),
(4, 'asd', 'asd', '', '', ''),
(5, 'xx', 'xx', 'xx', 'xx', 'xx'),
(6, 'xx', 'xx', 'xxx', 'xx', 'xx'),
(7, 'xx', 'xx', 'xx', 'xx', 'xx'),
(8, 'xx', 'xx', 'xxx', 'xx', 'xx'),
(9, 'xx', 'xx', 'xx', 'xx', 'xx'),
(10, 'xx', 'xx', 'xxx', 'xx', 'xx'),
(11, 'xx', 'xx', 'xx', 'xx', 'xx'),
(12, 'xx', 'xx', 'xxx', 'xx', 'xx');

-- --------------------------------------------------------

--
-- Table structure for table `refpoli`
--

CREATE TABLE IF NOT EXISTS `refpoli` (
  `idpoli` int(11) NOT NULL AUTO_INCREMENT,
  `namapoli` varchar(100) NOT NULL,
  `datecreate` datetime NOT NULL,
  `createby` varchar(30) NOT NULL,
  `datemodified` datetime NOT NULL,
  `modifiedby` varchar(30) NOT NULL,
  PRIMARY KEY (`idpoli`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `refpoli`
--

INSERT INTO `refpoli` (`idpoli`, `namapoli`, `datecreate`, `createby`, `datemodified`, `modifiedby`) VALUES
(3, 'Mata', '2015-04-01 22:01:48', '', '2015-04-01 22:01:52', ''),
(4, 'Gigi', '2015-04-01 22:01:57', '', '2015-04-01 22:02:00', ''),
(68, 'x', '0000-00-00 00:00:00', 'admin', '0000-00-00 00:00:00', ''),
(69, 'anak', '0000-00-00 00:00:00', 'admin', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `refrole`
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `refrole`
--

INSERT INTO `refrole` (`idrole`, `idgroup`, `idmenu`, `datecreate`, `createby`, `datemodified`, `modifiedby`) VALUES
(10, 1, 1, '0000-00-00 00:00:00', 'admin', NULL, NULL),
(9, 2, 3, '0000-00-00 00:00:00', 'admin', NULL, NULL),
(3, 2, 1, '2015-04-03 22:02:11', 'djanuar', NULL, NULL),
(4, 2, 2, '2015-04-03 22:02:19', 'djanuar', NULL, NULL),
(8, 2, 4, '0000-00-00 00:00:00', 'admin', NULL, NULL),
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
(25, 1, 19, '0000-00-00 00:00:00', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `refuser`
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
-- Dumping data for table `refuser`
--

INSERT INTO `refuser` (`iduser`, `idgroup`, `username`, `fullname`, `password`, `isactive`, `lastlogon`, `lastlogoff`, `datecreate`, `createby`, `datemodified`, `modifiedby`) VALUES
(1, 1, 'admin', 'djanuar aransyah', 'admin', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(3, 2, 'aransyah', 'aransyah', '321', 1, NULL, NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
