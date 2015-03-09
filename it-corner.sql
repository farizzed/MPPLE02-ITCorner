-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2015 at 06:09 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `it-corner`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
`id_artikel` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `judul_artikel` varchar(100) NOT NULL,
  `isi_artikel` text NOT NULL,
  `kategori_artikel` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `username`, `judul_artikel`, `isi_artikel`, `kategori_artikel`, `tanggal`, `status`) VALUES
(1, 'nicko', 'artikel coba-coba', 'artikel coba-cobaartikel coba-cobaartikel coba-cobaartikel coba-cobaartikel coba-cobaartikel coba-cobaartikel coba-cobaartikel coba-cobaartikel coba-cobaartikel coba-cobaartikel coba-cobaartikel coba-cobaartikel coba-coba', 'hardware', '2015-03-05', '0');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE IF NOT EXISTS `jawaban` (
`id_jawaban` int(10) NOT NULL,
  `id_pertanyaan` int(10) NOT NULL,
  `isi_jawaban` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `id_pertanyaan`, `isi_jawaban`, `nama`, `tanggal`) VALUES
(1, 1, 'jawaban coba-cobajawaban coba-cobajawaban coba-cobajawaban coba-cobajawaban coba-cobajawaban coba-cobajawaban coba-cobajawaban coba-cobajawaban coba-cobajawaban coba-cobajawaban coba-cobajawaban coba-cobajawaban coba-coba', 'Nicko', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
`id_komentar` int(10) NOT NULL,
  `id_artikel` int(10) NOT NULL,
  `isi_komentar` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_artikel`, `isi_komentar`, `nama`, `tanggal`) VALUES
(1, 1, 'komentar coba-cobakomentar coba-cobakomentar coba-cobakomentar coba-cobakomentar coba-cobakomentar coba-cobakomentar coba-cobakomentar coba-cobakomentar coba-cobakomentar coba-cobakomentar coba-coba', 'Nicko', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE IF NOT EXISTS `pertanyaan` (
`id_pertanyaan` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `judul_pertanyaan` varchar(100) NOT NULL,
  `isi_pertanyaan` text NOT NULL,
  `kategori_pertanyaan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `username`, `judul_pertanyaan`, `isi_pertanyaan`, `kategori_pertanyaan`, `tanggal`, `status`) VALUES
(1, 'nicko', 'pertanyaan coba-coba', 'pertanyaan coba-cobapertanyaan coba-cobapertanyaan coba-cobapertanyaan coba-cobapertanyaan coba-cobapertanyaan coba-cobapertanyaan coba-cobapertanyaan coba-cobapertanyaan coba-cobapertanyaan coba-cobapertanyaan coba-coba', 'hardware', '2015-03-05', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jenis_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `nama`, `password`, `email`, `jenis_user`) VALUES
('admin', 'Admin', 'admin', 'admin@gmail.com', 'admin'),
('fariz', 'fariz', 'fariz', 'fariz', 'user'),
('nicko', 'Nicko', 'nicko', 'nicko@gmail', 'user'),
('user', 'user user', 'user', 'user', 'user'),
('widi', 'widi', 'widi', 'widi', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
 ADD PRIMARY KEY (`id_artikel`), ADD KEY `username` (`username`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
 ADD PRIMARY KEY (`id_jawaban`), ADD KEY `id_pertanyaan` (`id_pertanyaan`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
 ADD PRIMARY KEY (`id_komentar`), ADD KEY `id_artikel` (`id_artikel`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
 ADD PRIMARY KEY (`id_pertanyaan`), ADD KEY `username` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
MODIFY `id_artikel` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
MODIFY `id_jawaban` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
MODIFY `id_komentar` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
MODIFY `id_pertanyaan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `jawaban`
--
ALTER TABLE `jawaban`
ADD CONSTRAINT `jawaban_ibfk_1` FOREIGN KEY (`id_pertanyaan`) REFERENCES `pertanyaan` (`id_pertanyaan`);

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id_artikel`);

--
-- Constraints for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
ADD CONSTRAINT `pertanyaan_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
