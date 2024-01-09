-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2024 at 11:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newtask`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_tblstcertificate`
--

CREATE TABLE `wp_tblstcertificate` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `Stid` int(150) NOT NULL,
  `StDate` date NOT NULL,
  `StPer` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wp_tblstcertificate`
--

INSERT INTO `wp_tblstcertificate` (`id`, `name`, `Stid`, `StDate`, `StPer`) VALUES
(1, 'Mohd Abid', 1234, '2024-01-01', 90.7),
(2, 'Akash Set', 321, '2024-01-02', 80.6),
(3, 'Abid', 310507, '2024-01-05', 70.9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_tblstcertificate`
--
ALTER TABLE `wp_tblstcertificate`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_tblstcertificate`
--
ALTER TABLE `wp_tblstcertificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
