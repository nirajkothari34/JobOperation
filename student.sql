-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2021 at 03:00 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_detail`
--

CREATE TABLE `student_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `email` varchar(70) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `qualification` varchar(40) NOT NULL,
  `Institute_name` varchar(80) NOT NULL,
  `skills` varchar(70) NOT NULL,
  `exp` varchar(50) NOT NULL,
  `Resume` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_detail`
--

INSERT INTO `student_detail` (`id`, `name`, `email`, `phone_number`, `address`, `qualification`, `Institute_name`, `skills`, `exp`, `Resume`) VALUES
(17, 'Nitish', 'nitish@gmail.com', '9850291455', 'Patna', 'MCA', 'Pune', 'PHP', '0 to 1 Year', 'Nitish@resume.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_detail`
--
ALTER TABLE `student_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_detail`
--
ALTER TABLE `student_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
