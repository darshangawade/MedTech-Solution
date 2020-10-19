-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2020 at 08:32 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `doc_pat_report`
--

CREATE TABLE `doc_pat_report` (
  `sr_no` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `pat_id` int(200) NOT NULL,
  `report_date` date NOT NULL,
  `report_type` varchar(100) NOT NULL,
  `report_descript` varchar(70) NOT NULL,
  `name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doc_pat_report`
--

INSERT INTO `doc_pat_report` (`sr_no`, `doc_id`, `pat_id`, `report_date`, `report_type`, `report_descript`, `name`) VALUES
(7, 3, 1, '2020-10-22', 'X-Ray', '', '1MedTech-Solution-master (7).zip'),
(8, 3, 1, '2020-10-24', 'Blood Report', 'Nice', '2cipherjpg.png'),
(9, 3, 1, '0000-00-00', 'Medicine Prescription', 'hello', '3hw1.css'),
(10, 3, 1, '0000-00-00', 'Medicine Prescription', 'very nice', '4CNS_Exp1.pdf'),
(11, 3, 1, '2020-10-31', 'Thoracentesis', 'Hello world', '5pngwing.com.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doc_pat_report`
--
ALTER TABLE `doc_pat_report`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doc_pat_report`
--
ALTER TABLE `doc_pat_report`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
