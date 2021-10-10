-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 30, 2018 at 09:01 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `butik`
--

-- --------------------------------------------------------

--
-- Table structure for table `buty`
--

CREATE TABLE `buty` (
  `id` int(11) NOT NULL,
  `nazwa` text NOT NULL,
  `rozmiar` int(11) NOT NULL,
  `rodzaj` char(1) NOT NULL,
  `cena` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buty`
--

INSERT INTO `buty` (`id`, `nazwa`, `rozmiar`, `rodzaj`, `cena`) VALUES
(1, 'kozaki', 38, 'd', 170),
(2, 'buty zimowe', 41, 'm', 200),
(3, 'buty zimowe', 43, 'm', 220),
(4, 'buty zimowe', 45, 'm', 220),
(5, 'kozaki', 37, 'd', 170),
(6, 'kozaki', 36, 'd', 170),
(7, 'buty sportowe', 45, 'm', 399),
(8, 'buty sportowe', 38, 'd', 399);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buty`
--
ALTER TABLE `buty`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buty`
--
ALTER TABLE `buty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
