-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2018 at 11:55 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `owners_family_table`
--

CREATE TABLE `owners_family_table` (
  `id` int(11) NOT NULL,
  `o_id` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `frelation` varchar(100) NOT NULL,
  `c_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `owner_table`
--

CREATE TABLE `owner_table` (
  `id` int(11) NOT NULL,
  `owName` varchar(100) NOT NULL,
  `fatName` varchar(100) NOT NULL,
  `motName` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `marital_status` varchar(100) NOT NULL,
  `passposrt` varchar(100) NOT NULL,
  `housenumber` varchar(100) NOT NULL,
  `roadnumber` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `postcode` varchar(100) NOT NULL,
  `policestation` varchar(100) NOT NULL,
  `cell` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `emergenceName` varchar(100) NOT NULL,
  `emergenceRelation` varchar(100) NOT NULL,
  `emergenceNumber` varchar(100) NOT NULL,
  `pword` varchar(100) NOT NULL,
  `personalIMG` varchar(100) NOT NULL,
  `personalNID` varchar(100) NOT NULL,
  `c_date` date NOT NULL,
  `auto_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `owners_family_table`
--
ALTER TABLE `owners_family_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner_table`
--
ALTER TABLE `owner_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `owners_family_table`
--
ALTER TABLE `owners_family_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=798;

--
-- AUTO_INCREMENT for table `owner_table`
--
ALTER TABLE `owner_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
