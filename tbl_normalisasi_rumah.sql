-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 31, 2018 at 02:09 PM
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
(1, 1, 'Rendah', 'Rendah', 'Rendah', 'Rendah', 'Rendah'),
(2, 2, 'Rendah', 'Rendah', 'Rendah', 'Rendah', 'Rendah'),
(3, 3, 'Sedang', 'Tinggi', 'Sedang', 'Sedang', 'Sedang'),
(4, 4, 'Rendah', 'Tinggi', 'Rendah', 'Rendah', 'Sedang'),
(5, 5, 'Rendah', 'Tinggi', 'Rendah', 'Rendah', 'Sedang'),
(6, 6, 'Sedang', 'Tinggi', 'Rendah', 'Rendah', 'Rendah'),
(7, 7, 'Sedang', 'Tinggi', 'Sedang', 'Rendah', 'Sedang'),
(8, 8, 'Rendah', 'Tinggi', 'Sedang', 'Sedang', 'Sedang'),
(9, 9, 'Tinggi', 'Tinggi', 'Tinggi', 'Tinggi', 'Tinggi'),
(10, 10, 'Rendah', 'Tinggi', 'Rendah', 'Rendah', 'Rendah'),
(11, 11, 'Tinggi', 'Tinggi', 'Tinggi', 'Sedang', 'Sedang'),
(12, 12, 'Rendah', 'Tinggi', 'Rendah', 'Rendah', 'Rendah'),
(13, 13, 'Tinggi', 'Tinggi', 'Rendah', 'Sedang', 'Sedang'),
(14, 14, 'Rendah', 'Tinggi', 'Rendah', 'Rendah', 'Rendah'),
(15, 15, 'Tinggi', 'Tinggi', 'Tinggi', 'Sedang', 'Sedang'),
(16, 16, 'Sedang', 'Sedang', 'Tinggi', 'Tinggi', 'Sedang'),
(17, 17, 'Rendah', 'Sedang', 'Rendah', 'Rendah', 'Rendah'),
(18, 18, 'Tinggi', 'Sedang', 'Sedang', 'Rendah', 'Rendah'),
(19, 19, 'Sedang', 'Sedang', 'Rendah', 'Rendah', 'Rendah'),
(20, 20, 'Sedang', 'Sedang', 'Sedang', 'Sedang', 'Sedang'),
(21, 21, 'Rendah', 'Sedang', 'Rendah', 'Rendah', 'Rendah'),
(22, 22, 'Rendah', 'Sedang', 'Rendah', 'Rendah', 'Rendah');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
