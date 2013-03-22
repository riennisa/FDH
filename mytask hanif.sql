-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2013 at 05:51 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mytask`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignee`
--

CREATE TABLE IF NOT EXISTS `assignee` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `idtask` int(3) DEFAULT NULL,
  `nama_user` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=192 ;

--
-- Dumping data for table `assignee`
--

INSERT INTO `assignee` (`id`, `idtask`, `nama_user`) VALUES
(81, 7, 'lyon'),
(83, 1, 'haanif'),
(171, 1, 'Pabot'),
(173, 9, ''),
(174, 10, ''),
(175, 11, ''),
(180, 16, ''),
(181, 17, ''),
(182, 18, ''),
(183, 19, ''),
(189, 24, 'dekha'),
(191, 25, 'dekha');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namakat` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `namakat`) VALUES
(1, 'Kuliah'),
(3, 'Kategori X');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idtask` int(11) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `komentar` varchar(1000) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idtask` (`idtask`),
  KEY `iduser` (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `idtask`, `iduser`, `komentar`, `waktu`) VALUES
(19, 7, 2, 'mantap', '03:38 21/03'),
(20, 7, 1, 'keren', '03:38 21/03'),
(42, 7, 2, 'cek', '08:15 21/03'),
(47, 7, 2, 'komen', '11:58 21/03'),
(48, 25, 2, 'tubes ini rada lumayan euy', '04:28 22/03'),
(49, 25, 2, 'susah gituu ?', '04:37 22/03'),
(50, 25, 1, 'masssa sih ?', '04:39 22/03');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idtask` int(11) NOT NULL,
  `namatag` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idtask_2` (`idtask`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=148 ;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `idtask`, `namatag`) VALUES
(117, 7, 'aa'),
(118, 7, ' bbb'),
(119, 7, ' cccc'),
(120, 1, 'dekha'),
(121, 1, ' sangat'),
(122, 1, ' ganteng'),
(140, 24, 'sekolah'),
(141, 24, ' mall'),
(145, 25, 'imam'),
(146, 25, 'sister'),
(147, 25, 'jarkom');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE IF NOT EXISTS `tugas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idkat` int(11) NOT NULL,
  `namatask` varchar(100) NOT NULL,
  `deadline` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `attachment` varbinary(10000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idkat_2` (`idkat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `idkat`, `namatask`, `deadline`, `status`, `attachment`) VALUES
(1, 1, 'Tubes Progin', '2012-01-03', 0, ''),
(7, 3, 'Tubes X', '2012-01-03', 1, ''),
(24, 3, 'beli baju', '2013-03-19', 0, 'a.jpg'),
(25, 1, 'tubes sister', '2013-03-03', 1, 'a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthdate` varchar(11) NOT NULL,
  `avatar` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `email`, `birthdate`, `avatar`) VALUES
(1, 'dekha', 'dekhadekha', 'Dekha A', 'danggareska@yahoo.com', '30-01-1993', 'a.jpg'),
(2, 'pabot', '300193', 'Pabot', 'pabot@pabot.com', '', 'a.jpeg'),
(3, 'haanif', 'haanif', 'Hanif Lyonnais', 'hanif@itb.ac.id', '09/23/1992', 'hanif.jpg'),
(4, 'fdh', 'fdhfdh', 'Filbert Dekha Hanif', 'fdh@microsoft.com', '03/12/2013', 'fdh.jpg'),
(5, 'jokoism', 'jokoisme', 'Joko Susanto', 'joko@gmail.com', '1992/03/12', 'joko.jpg'),
(6, 'tono', 'tonogitu', 'tono surono', 'tono@gmail', '1992/03/14', 'tono.jpg'),
(10, 'mahdan', 'mahdanmahdan', 'Mahdan A', 'mahdan@gmail.com', '1992-03-20', ''),
(11, 'admin', 'adminadmin', 'Admin gile', 'admin@gmail.com', '1992-04-02', ''),
(12, 'angga', 'anggaangga', 'Angga Res', 'angga@gmail.com', '1992-03-13', 'buku.jpg'),
(13, 'haniflyon', 'lyonnais', 'H Lyonnais', 'lyon@yahoo.com', '2013-03-27', 'kecewa.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`idtask`) REFERENCES `tugas` (`id`),
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`);

--
-- Constraints for table `tag`
--
ALTER TABLE `tag`
  ADD CONSTRAINT `tag_ibfk_1` FOREIGN KEY (`idtask`) REFERENCES `tugas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_ibfk_1` FOREIGN KEY (`idkat`) REFERENCES `kategori` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
