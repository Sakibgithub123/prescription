-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2022 at 01:18 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `addchember`
--

CREATE TABLE `addchember` (
  `id` int(4) NOT NULL,
  `aid` int(5) NOT NULL,
  `chember_name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `phn` varchar(30) NOT NULL,
  `location_details` varchar(255) NOT NULL,
  `day` varchar(40) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addchember`
--

INSERT INTO `addchember` (`id`, `aid`, `chember_name`, `location`, `phn`, `location_details`, `day`, `time`) VALUES
(39, 15, 'dhaka medical', 'Shahbag', '1234', 'tt', 'sat, sun', '9 t0 12'),
(40, 16, 'barisal medical', 'barisal', '12345678901', 'tgyggyg', '666tt6t6', '6pm to 9pm'),
(41, 15, 'kiikik', 'o9o9o', '9o9o9', 'lololo', '9ll9', 'p0p0p0'),
(42, 15, 'khulna medical', 'khulna', '12344567', 'khulna lubana complex', 'sat, sun', '9:00am to 8:00pm');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pid` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `complaints` varchar(50) NOT NULL,
  `onexam` varchar(50) NOT NULL,
  `investigation` varchar(50) NOT NULL,
  `diagnose` varchar(50) NOT NULL,
  `date` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pid`, `name`, `age`, `designation`, `complaints`, `onexam`, `investigation`, `diagnose`, `date`) VALUES
(10, 'karin', 5, '', 'sat', 'bp', 'cbct', 'sat', '00:00:00'),
(11, 'rahim', 5, '', 'sun', 'kp', 'rbs', 'sat', '00:00:00'),
(19, 'sakib', 5, '', 'sun', 'bp', 'cbct', 'sat', '00:00:00'),
(20, '', 0, '', 'Malaria', '', '', '', '00:00:00'),
(21, '', 0, '', 'Vitiliga', '', '', '', '00:00:00'),
(22, '', 0, '', 'Vitiliga', '', '', '', '00:00:00'),
(23, '', 0, '', 'zzzz', '', '', '', '00:00:00'),
(24, '', 0, '', 'xxx', '', '', '', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `descrive` varchar(200) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `work` varchar(200) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `cpass` int(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `descrive`, `designation`, `work`, `email`, `password`, `cpass`, `image`, `code`) VALUES
(15, 'karin', 'drytfuty', 'gfyguyuiyit', 'futgfyttfr', 'karin@gmail.com', '1234', 1234, '', '34265'),
(16, 'sakib', 'yftftf', 'vgygy', 'vfgfytt', 's@gmail.com', '1234', 1234, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addchember`
--
ALTER TABLE `addchember`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aid` (`aid`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addchember`
--
ALTER TABLE `addchember`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addchember`
--
ALTER TABLE `addchember`
  ADD CONSTRAINT `addchember_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
