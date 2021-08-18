-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 15, 2021 at 04:53 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookname` varchar(100) NOT NULL,
  `authorname` varchar(50) NOT NULL,
  `edition` varchar(10) NOT NULL,
  `numberofcopy` int(10) NOT NULL,
  `shelfno` int(10) NOT NULL,
  `bookid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookname`, `authorname`, `edition`, `numberofcopy`, `shelfno`, `bookid`) VALUES
('art of thinking clearly', 'rolf dobelli', '1st', 1, 1, 9),
('art of thinking clearly', 'rolf dobelli', '1st', 1, 1, 10),
('Origin', 'Dan Brown', '4nd', 5, 11, 12);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `Firstname` varchar(15) NOT NULL,
  `Lastname` varchar(15) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DOB` date NOT NULL,
  `Religion` varchar(15) NOT NULL,
  `Presentaddress` varchar(100) DEFAULT NULL,
  `Permanentaddress` varchar(100) DEFAULT NULL,
  `Phone` int(15) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Website` varchar(50) DEFAULT NULL,
  `Username` varchar(15) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`Firstname`, `Lastname`, `Gender`, `DOB`, `Religion`, `Presentaddress`, `Permanentaddress`, `Phone`, `Email`, `Website`, `Username`, `Password`, `id`) VALUES
('Arafat', 'Hossain', 'Male', '2021-05-31', 'Islam', 'dhaka update', 'faridpur new', 1626789352, 'araft6462@gmail.com', 'http://localhos', 'Arafat', '1', 1),
('Arafat', 'Hossain', 'Male', '2021-06-29', 'islam', '', '', 1626789352, 'Arafat6462@gmail.com', '', 'u', 'u', 12);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentName` varchar(50) NOT NULL,
  `studentId` int(10) NOT NULL,
  `currentBorrow` int(10) NOT NULL,
  `bookid` int(10) NOT NULL,
  `allhistory` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentName`, `studentId`, `currentBorrow`, `bookid`, `allhistory`) VALUES
('Arafat', 1, 0, -1, 13),
('Ashiq', 2, 1, 2, 3),
('Atik', 3, 0, -1, 2),
('Saurav', 4, 0, -1, 1),
('Biddendu', 5, 1, 2, 2),
('Himel', 6, 1, 2, 3),
('Anika', 7, 0, -1, 0),
('Oindrella', 8, 0, -1, 1),
('Durjoy', 9, 1, 2, 2),
('Shoaib', 10, 0, -1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD UNIQUE KEY `bookid` (`bookid`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD UNIQUE KEY `studentId` (`studentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
