-- phpMyAdmin SQL Dump
-- version 4.2.3
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2017 at 05:25 PM
-- Server version: 5.5.44-MariaDB-log
-- PHP Version: 5.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `reg_db`
--
CREATE DATABASE IF NOT EXISTS `reg_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `reg_db`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
`id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `lang` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_jobs`
--

CREATE TABLE IF NOT EXISTS `admin_jobs` (
`id` int(11) NOT NULL,
  `def` int(11) NOT NULL,
  `meet` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=260 ;

-- --------------------------------------------------------

--
-- Table structure for table `call_count`
--

CREATE TABLE IF NOT EXISTS `call_count` (
  `id` int(11) NOT NULL,
`def` int(11) NOT NULL,
  `admin` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `calls` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Table structure for table `excel`
--

CREATE TABLE IF NOT EXISTS `excel` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_no` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
`def` int(11) NOT NULL,
  `operator` text NOT NULL,
  `id` int(11) NOT NULL,
  `status` text NOT NULL,
  `note` text NOT NULL,
  `last_call` text NOT NULL,
  `meet` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1431 ;

-- --------------------------------------------------------

--
-- Table structure for table `last_call`
--

CREATE TABLE IF NOT EXISTS `last_call` (
`id` int(11) NOT NULL,
  `def` int(11) NOT NULL,
  `lcall` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1025 ;

-- --------------------------------------------------------

--
-- Table structure for table `list_names`
--

CREATE TABLE IF NOT EXISTS `list_names` (
`id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
`def` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `admin` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `note` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2297 ;

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE IF NOT EXISTS `operator` (
`id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `full_name` text NOT NULL,
  `lang` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `pp`
--

CREATE TABLE IF NOT EXISTS `pp` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `phone_no` text NOT NULL,
  `checked_by_admin` int(11) NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `download` int(11) NOT NULL DEFAULT '1',
  `sendto` text,
  `meet` timestamp NULL DEFAULT NULL,
  `note` longtext NOT NULL,
  `sec` int(11) NOT NULL DEFAULT '1',
  `alt_phone` text NOT NULL,
  `work` text NOT NULL,
  `company` text NOT NULL,
  `reg_by` text NOT NULL,
  `op_status` text NOT NULL,
  `lang` varchar(15) NOT NULL,
  `deposit_by` varchar(30) NOT NULL,
  `list_name` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `phone_no` text NOT NULL,
  `checked_by_admin` int(11) NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `download` int(11) NOT NULL DEFAULT '1',
  `sendto` text,
  `meet` timestamp NULL DEFAULT NULL,
  `note` longtext NOT NULL,
  `sec` int(11) NOT NULL DEFAULT '1',
  `alt_phone` text NOT NULL,
  `work` text NOT NULL,
  `company` text NOT NULL,
  `reg_by` text NOT NULL,
  `op_status` text NOT NULL,
  `lang` varchar(15) NOT NULL,
  `deposit_by` varchar(30) NOT NULL,
  `list_name` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1163 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_jobs`
--
ALTER TABLE `admin_jobs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `call_count`
--
ALTER TABLE `call_count`
 ADD PRIMARY KEY (`def`);

--
-- Indexes for table `excel`
--
ALTER TABLE `excel`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
 ADD PRIMARY KEY (`def`);

--
-- Indexes for table `last_call`
--
ALTER TABLE `last_call`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_names`
--
ALTER TABLE `list_names`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
 ADD PRIMARY KEY (`def`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pp`
--
ALTER TABLE `pp`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `admin_jobs`
--
ALTER TABLE `admin_jobs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=260;
--
-- AUTO_INCREMENT for table `call_count`
--
ALTER TABLE `call_count`
MODIFY `def` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `excel`
--
ALTER TABLE `excel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
MODIFY `def` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1431;
--
-- AUTO_INCREMENT for table `last_call`
--
ALTER TABLE `last_call`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1025;
--
-- AUTO_INCREMENT for table `list_names`
--
ALTER TABLE `list_names`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
MODIFY `def` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2297;
--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pp`
--
ALTER TABLE `pp`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1163;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
