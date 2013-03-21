-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2013 at 03:43 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `assignee`
--

INSERT INTO `assignee` (`id`, `idtask`, `nama_user`) VALUES
(31, 3, 'dekhaa'),
(32, 3, 'paboot'),
(33, 4, 'haniflyon'),
(34, 4, 'dekhaa'),
(35, 4, 'paboot');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namakat` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `namakat`) VALUES
(1, 'Kuliah');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idtask` int(11) DEFAULT NULL,
  `komentar` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idtask` (`idtask`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `idtask`, `namatag`) VALUES
(1, 1, 'lelah'),
(2, 1, 'huft'),
(58, 3, 'sekolah'),
(59, 3, 'sekolah'),
(60, 3, 'univ'),
(61, 3, 'univ'),
(62, 4, 'akademik'),
(63, 4, 'belajar'),
(64, 4, 'study');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `idkat`, `namatask`, `deadline`, `status`, `attachment`) VALUES
(1, 1, 'Tubes Progin', '0000-00-00', 1, ''),
(3, 3, 'dassa', '2013-03-07', 0, 'bar_task.JPG'),
(4, 3, 'Baca Kesling', '2013-03-13', 0, 'add.JPG');

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
(1, 'dekhaa', 'dekhaa', 'Dekha Anggareska', 'danggareska@yahoo.com', '06/01/1992', 'dekha.jpg'),
(2, 'paboot', 'paboot', 'Filbert Reinaldha', 'pabot10@gmail.com', '05/21/1994', 'pabot.jpg'),
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
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`idtask`) REFERENCES `tugas` (`id`);

--
-- Constraints for table `tag`
--
ALTER TABLE `tag`
  ADD CONSTRAINT `tag_ibfk_1` FOREIGN KEY (`idtask`) REFERENCES `tugas` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
