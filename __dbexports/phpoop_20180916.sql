-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 16, 2018 at 12:45 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpoop`
--

-- --------------------------------------------------------

--
-- Table structure for table `examples`
--

CREATE TABLE `examples` (
  `exampleID` int(11) NOT NULL,
  `exampleName` varchar(50) DEFAULT NULL,
  `exampleDescription` text,
  `created` datetime DEFAULT NULL,
  `creator` int(11) NOT NULL DEFAULT '0',
  `edited` datetime DEFAULT NULL,
  `editor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `examples`
--

INSERT INTO `examples` (`exampleID`, `exampleName`, `exampleDescription`, `created`, `creator`, `edited`, `editor`) VALUES
(1, 'Example 1', 'This is an example', '2018-09-11 15:18:26', 0, '2018-09-15 19:27:16', 0),
(2, 'Example 2', 'This is another example', '2018-09-11 17:41:18', 0, NULL, NULL),
(3, 'Example 3', 'This example has been added using the website form', '2018-09-12 22:00:08', 0, NULL, NULL),
(4, 'Example 4', 'This is also an example which has been added using the website form', '2018-09-12 22:05:42', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pageID` int(11) NOT NULL,
  `pageName` varchar(20) NOT NULL,
  `pageTitle` varchar(50) NOT NULL,
  `metaDescription` varchar(200) DEFAULT NULL,
  `metaKeywords` varchar(100) DEFAULT NULL,
  `pageTheme` varchar(20) DEFAULT NULL,
  `pageTemplate` varchar(20) NOT NULL DEFAULT 'default',
  `pageMenu` varchar(20) NOT NULL DEFAULT 'default',
  `pageHeader` varchar(20) NOT NULL DEFAULT 'default',
  `pageFooter` varchar(20) NOT NULL DEFAULT 'default',
  `pageSidebar` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `creator` int(11) NOT NULL DEFAULT '0',
  `edited` datetime DEFAULT NULL,
  `editor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pageID`, `pageName`, `pageTitle`, `metaDescription`, `metaKeywords`, `pageTheme`, `pageTemplate`, `pageMenu`, `pageHeader`, `pageFooter`, `pageSidebar`, `created`, `creator`, `edited`, `editor`) VALUES
(1, '/index.php', 'My first Object Oriented PHP site!', 'This project shows how to make a website using object oriented programming in PHP. It will use a database class and base classes for collections and objects to inherit from.', 'php, oop', NULL, 'default', 'default', 'default', 'default', NULL, '2018-09-11 13:16:42', 0, NULL, NULL),
(2, '/examples/index.php', 'Add an example to the database', 'Add an example to the database using the Examples collection and Examples object class.', NULL, 'dark', 'default', 'default', 'default', 'default', NULL, '2018-09-12 12:29:36', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `examples`
--
ALTER TABLE `examples`
  ADD PRIMARY KEY (`exampleID`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pageID`),
  ADD UNIQUE KEY `pageName` (`pageName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `examples`
--
ALTER TABLE `examples`
  MODIFY `exampleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
