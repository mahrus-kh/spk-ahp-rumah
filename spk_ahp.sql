-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 29, 2018 at 11:55 AM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spk_ahp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `nama`) VALUES
(1, 'andy', 'e10adc3949ba59abbe56e057f20f883e', 'Andy Wahyu'),
(2, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Admin'),
(3, 'malang', 'e10adc3949ba59abbe56e057f20f883e', 'Malang Kota');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matriks_hasil`
--

CREATE TABLE IF NOT EXISTS `tbl_matriks_hasil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rumah` int(11) NOT NULL,
  `harga` float NOT NULL,
  `jkpk` float NOT NULL,
  `luas_tanah` float NOT NULL,
  `luas_bangunan` float NOT NULL,
  `jml_kamar_tidur` float NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matriks_prioritas`
--

CREATE TABLE IF NOT EXISTS `tbl_matriks_prioritas` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `harga_jkpk` tinyint(4) NOT NULL,
  `harga_luas_tanah` tinyint(4) NOT NULL,
  `harga_luas_bangunan` tinyint(4) NOT NULL,
  `harga_jkt` tinyint(4) NOT NULL,
  `jkpk_luas_tanah` tinyint(4) NOT NULL,
  `jkpk_luas_bangunan` tinyint(4) NOT NULL,
  `jkpk_jkt` tinyint(4) NOT NULL,
  `luas_tanah_luas_bangunan` tinyint(4) NOT NULL,
  `luas_tanah_jkt` tinyint(4) NOT NULL,
  `luas_bangunan_jkt` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_matriks_prioritas`
--

INSERT INTO `tbl_matriks_prioritas` (`id`, `harga_jkpk`, `harga_luas_tanah`, `harga_luas_bangunan`, `harga_jkt`, `jkpk_luas_tanah`, `jkpk_luas_bangunan`, `jkpk_jkt`, `luas_tanah_luas_bangunan`, `luas_tanah_jkt`, `luas_bangunan_jkt`) VALUES
(1, 2, 3, 3, 5, 2, 2, 3, 2, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_normalisasi_rumah`
--

CREATE TABLE IF NOT EXISTS `tbl_normalisasi_rumah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rumah` int(11) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `jkpk` varchar(255) NOT NULL,
  `luas_tanah` varchar(255) NOT NULL,
  `luas_bangunan` varchar(255) NOT NULL,
  `jml_kamar_tidur` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbl_normalisasi_rumah`
--

INSERT INTO `tbl_normalisasi_rumah` (`id`, `id_rumah`, `harga`, `jkpk`, `luas_tanah`, `luas_bangunan`, `jml_kamar_tidur`) VALUES
(1, 23, '1', '1', '1', '1', '1'),
(2, 24, '1', '1', '1', '1', '1'),
(3, 3, '1', '1', '1', '1', '1'),
(4, 4, '1', '1', '1', '1', '1'),
(5, 5, '1', '1', '1', '1', '1'),
(6, 6, '1', '1', '1', '1', '1'),
(7, 7, '1', '1', '1', '1', '1'),
(8, 8, '1', '1', '1', '1', '1'),
(9, 9, '1', '1', '1', '1', '1'),
(10, 10, '1', '1', '1', '1', '1'),
(11, 11, '1', '1', '1', '1', '1'),
(12, 12, '1', '1', '1', '1', '1'),
(13, 13, '1', '1', '1', '1', '1'),
(14, 14, '1', '1', '1', '1', '1'),
(15, 15, '1', '1', '1', '1', '1'),
(16, 16, '1', '1', '1', '1', '1'),
(17, 17, '1', '1', '1', '1', '1'),
(18, 18, '1', '1', '1', '1', '1'),
(19, 19, '1', '1', '1', '1', '1'),
(20, 20, '1', '1', '1', '1', '1'),
(21, 21, '1', '1', '1', '1', '1'),
(22, 22, '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prioritas_kriteria_harga`
--

CREATE TABLE IF NOT EXISTS `tbl_prioritas_kriteria_harga` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `tinggi_sedang` tinyint(4) NOT NULL,
  `tinggi_rendah` tinyint(4) NOT NULL,
  `sedang_rendah` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_prioritas_kriteria_harga`
--

INSERT INTO `tbl_prioritas_kriteria_harga` (`id`, `tinggi_sedang`, `tinggi_rendah`, `sedang_rendah`) VALUES
(1, 3, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prioritas_kriteria_jkpk`
--

CREATE TABLE IF NOT EXISTS `tbl_prioritas_kriteria_jkpk` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `tinggi_sedang` tinyint(4) NOT NULL,
  `tinggi_rendah` tinyint(4) NOT NULL,
  `sedang_rendah` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_prioritas_kriteria_jkpk`
--

INSERT INTO `tbl_prioritas_kriteria_jkpk` (`id`, `tinggi_sedang`, `tinggi_rendah`, `sedang_rendah`) VALUES
(1, 3, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prioritas_kriteria_jkt`
--

CREATE TABLE IF NOT EXISTS `tbl_prioritas_kriteria_jkt` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `tinggi_sedang` tinyint(4) NOT NULL,
  `tinggi_rendah` tinyint(4) NOT NULL,
  `sedang_rendah` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_prioritas_kriteria_jkt`
--

INSERT INTO `tbl_prioritas_kriteria_jkt` (`id`, `tinggi_sedang`, `tinggi_rendah`, `sedang_rendah`) VALUES
(1, 4, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prioritas_kriteria_luas_bangunan`
--

CREATE TABLE IF NOT EXISTS `tbl_prioritas_kriteria_luas_bangunan` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `tinggi_sedang` tinyint(4) NOT NULL,
  `tinggi_rendah` tinyint(4) NOT NULL,
  `sedang_rendah` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_prioritas_kriteria_luas_bangunan`
--

INSERT INTO `tbl_prioritas_kriteria_luas_bangunan` (`id`, `tinggi_sedang`, `tinggi_rendah`, `sedang_rendah`) VALUES
(1, 5, 7, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prioritas_kriteria_luas_tanah`
--

CREATE TABLE IF NOT EXISTS `tbl_prioritas_kriteria_luas_tanah` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `tinggi_sedang` tinyint(4) NOT NULL,
  `tinggi_rendah` tinyint(4) NOT NULL,
  `sedang_rendah` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_prioritas_kriteria_luas_tanah`
--

INSERT INTO `tbl_prioritas_kriteria_luas_tanah` (`id`, `tinggi_sedang`, `tinggi_rendah`, `sedang_rendah`) VALUES
(1, 5, 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rumah`
--

CREATE TABLE IF NOT EXISTS `tbl_rumah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_zona_alamat` int(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `harga` float NOT NULL,
  `luas_tanah` float NOT NULL,
  `luas_bangunan` float NOT NULL,
  `jml_kamar_tidur` tinyint(4) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ZONA_ALAMAT` (`id_zona_alamat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tbl_rumah`
--

INSERT INTO `tbl_rumah` (`id`, `id_zona_alamat`, `nama`, `alamat`, `harga`, `luas_tanah`, `luas_bangunan`, `jml_kamar_tidur`, `keterangan`) VALUES
(1, 1, 'Rumah 1', 'Blimbing, Malang', 750000000, 98, 70, 2, 'Nego'),
(2, 1, 'Rumah 2', 'Blimbing, Malang', 900000000, 160, 133, 2, ''),
(3, 2, 'Rumah 3', 'Araya, Malang', 2800000000, 300, 240, 5, 'Nego'),
(4, 2, 'Rumah 4', 'Araya, Malang', 1500000000, 170, 156, 5, 'Nego'),
(5, 2, 'Rumah 5', 'Araya, Malang', 1055000000, 245, 132, 5, ''),
(6, 2, 'Rumah 6', 'Araya, Malang', 2525000000, 200, 175, 4, ''),
(7, 2, 'Rumah 7', 'Araya, Malang', 3300000000, 369, 200, 7, 'Nego'),
(8, 2, 'Rumah 8', 'Araya, Malang', 2100000000, 300, 275, 6, 'Nego'),
(9, 2, 'Rumah 9', 'Araya, Malang', 5000000000, 675, 500, 10, 'Nego'),
(10, 2, 'Rumah 10', 'Araya, Malang', 1600000000, 150, 135, 4, 'Nego'),
(11, 2, 'Rumah 11', 'Araya, Malang', 4100000000, 500, 350, 5, 'Nego'),
(12, 2, 'Rumah 12', 'Araya, Malang', 950000000, 135, 110, 3, 'Nego'),
(13, 2, 'Rumah 13', 'Araya, Malang', 4000000000, 275, 240, 7, 'Nego'),
(14, 2, 'Rumah 14', 'Araya, Malang', 1500000000, 170, 154, 3, 'Nego'),
(15, 2, 'Rumah 15', 'Araya, Malang', 4500000000, 500, 350, 5, ''),
(16, 3, 'Rumah 16', 'Soekarno - Hatta, Malang', 2700000000, 510, 420, 5, 'Nego'),
(17, 3, 'Rumah 17', 'Soekarno - Hatta, Malang', 1900000000, 105, 94, 3, ''),
(18, 3, 'Rumah 18', 'Soekarno - Hatta, Malang', 5000000000, 338, 200, 3, ''),
(19, 3, 'Rumah 19', 'Soekarno - Hatta, Malang', 2850000000, 200, 200, 4, ''),
(20, 3, 'Rumah 20', 'Soekarno - Hatta, Malang', 2400000000, 360, 247, 7, ''),
(21, 3, 'Rumah 21', 'Soekarno - Hatta, Malang', 1350000000, 126, 100, 3, ''),
(22, 3, 'Rumah 22', 'Soekarno - Hatta, Malang', 1100000000, 90, 84, 2, 'Nego');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_zona_alamat`
--

CREATE TABLE IF NOT EXISTS `tbl_zona_alamat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zona_alamat` varchar(255) NOT NULL,
  `jkpk` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_zona_alamat`
--

INSERT INTO `tbl_zona_alamat` (`id`, `zona_alamat`, `jkpk`) VALUES
(1, 'Blimbing', 5),
(2, 'Araya', 8),
(3, 'Soekarno - Hatta', 7);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_rumah`
--
ALTER TABLE `tbl_rumah`
  ADD CONSTRAINT `tbl_rumah_ibfk_1` FOREIGN KEY (`id_zona_alamat`) REFERENCES `tbl_zona_alamat` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
