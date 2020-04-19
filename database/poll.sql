-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 02:38 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poll`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbadministrators`
--

CREATE TABLE `tbadministrators` (
  `admin_id` int(5) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbadministrators`
--

INSERT INTO `tbadministrators` (`admin_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Suvarna', 'Gaikwad', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbcandidates`
--

CREATE TABLE `tbcandidates` (
  `candidate_id` int(5) NOT NULL,
  `candidate_name` varchar(45) NOT NULL,
  `candidate_position` varchar(45) NOT NULL,
  `candidate_cvotes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbcandidates`
--

INSERT INTO `tbcandidates` (`candidate_id`, `candidate_name`, `candidate_position`, `candidate_cvotes`) VALUES
(1, 'Mamun', 'Chairman', 7),
(2, 'Emran', 'Chairman', 4),
(3, 'Sabuj', 'Vice-Chairman', 1),
(4, 'Sajedul', 'Vice-Chairman', 0),
(5, 'Aman', 'Secretary', 0),
(6, 'suvarna ', 'Secretary', 0),
(8, 'Sujata', 'Treasurer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblvotes`
--

CREATE TABLE `tblvotes` (
  `id` int(11) NOT NULL,
  `voter_id` int(11) NOT NULL,
  `position` varchar(50) NOT NULL,
  `candidateName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvotes`
--

INSERT INTO `tblvotes` (`id`, `voter_id`, `position`, `candidateName`) VALUES
(1, 1, 'Chairperson', 'Luis Nani'),
(2, 5, 'Vice-Secretary', 'Thomas Vaemalen'),
(3, 5, 'Secretary', 'Michael Walters'),
(4, 5, 'Vice-Treasurer', 'Howard Web'),
(5, 5, 'HOD', 'Aman'),
(6, 2, 'Chairman', 'Mamun'),
(7, 5, 'Vice-Chairman', 'Sabuj'),
(8, 5, 'Chairman', 'Mamun'),
(13, 7, 'Chairman', 'Emran'),
(14, 6, 'Chairman', 'Mamun'),
(15, 5, 'Treasurer', 'Sujata');

-- --------------------------------------------------------

--
-- Table structure for table `tbmembers`
--

CREATE TABLE `tbmembers` (
  `member_id` int(5) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `voter_id` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbmembers`
--

INSERT INTO `tbmembers` (`member_id`, `first_name`, `last_name`, `email`, `voter_id`, `password`) VALUES
(1, 'Md. Rezwanul', 'Haque', 'rezwan@gmail.com', '19964714075000192', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'Mahbub', 'Alam', 'mahbub@gmail.com', '19864714075000186', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'Suvarna', 'Gaikwad', 'suvarnawag10@gmail.com', '19864714075000187', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'sujata', 'gaikwad', 'sujata21@gmail.com', '19864714075000190', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'Suvarna', 'Gaikwad', 'suvarnawg10@gmail.com', '19864714075000000', '81dc9bdb52d04dc20036dbd8313ed055'),
(7, 'Vidya', 'Shendge', 'vidyaa26@gmail.com', '19864714075000193', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `tbpositions`
--

CREATE TABLE `tbpositions` (
  `position_id` int(5) NOT NULL,
  `position_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpositions`
--

INSERT INTO `tbpositions` (`position_id`, `position_name`) VALUES
(1, 'Chairman'),
(2, 'Vice-Chairman'),
(3, 'Secretary'),
(4, 'Vice-Secretary'),
(5, 'Organizing-Secretary'),
(6, 'Treasurer'),
(7, 'Vice-Treasurer'),
(8, 'Lady Representative');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbadministrators`
--
ALTER TABLE `tbadministrators`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbcandidates`
--
ALTER TABLE `tbcandidates`
  ADD PRIMARY KEY (`candidate_id`),
  ADD KEY `candidate_id` (`candidate_id`);

--
-- Indexes for table `tblvotes`
--
ALTER TABLE `tblvotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voter_id` (`voter_id`);

--
-- Indexes for table `tbmembers`
--
ALTER TABLE `tbmembers`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tbpositions`
--
ALTER TABLE `tbpositions`
  ADD PRIMARY KEY (`position_id`),
  ADD KEY `position_id` (`position_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbadministrators`
--
ALTER TABLE `tbadministrators`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbcandidates`
--
ALTER TABLE `tbcandidates`
  MODIFY `candidate_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblvotes`
--
ALTER TABLE `tblvotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbmembers`
--
ALTER TABLE `tbmembers`
  MODIFY `member_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbpositions`
--
ALTER TABLE `tbpositions`
  MODIFY `position_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblvotes`
--
ALTER TABLE `tblvotes`
  ADD CONSTRAINT `tblvotes_ibfk_1` FOREIGN KEY (`voter_id`) REFERENCES `tbmembers` (`member_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
