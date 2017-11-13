-- phpMyAdmin SQL Dump
-- version 4.2.3
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2017 at 02:14 PM
-- Server version: 5.5.46-MariaDB-log
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
  `lang` varchar(15) NOT NULL,
  `full_name` text NOT NULL,
  `session` text NOT NULL,
  `table_limit` int(11) NOT NULL DEFAULT '30'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;


INSERT INTO `admins` (`username`, `password`, `lang`, `full_name`, `session`, `table_limit`) VALUES ('admin', 'admin123', 'it', 'Administrator', '', 30);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `akit_reg`
--

CREATE TABLE IF NOT EXISTS `akit_reg` (
`idi` int(11) NOT NULL,
  `id` text NOT NULL,
  `email` text,
  `phone` text,
  `prefix` text,
  `name` text
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19451 ;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
`id` int(11) NOT NULL,
  `lang` text NOT NULL,
  `line_prefix` text NOT NULL,
  `type` varchar(30) NOT NULL,
  `admin` varchar(20) NOT NULL,
  `value` text NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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
-- Table structure for table `fb_reg`
--

CREATE TABLE IF NOT EXISTS `fb_reg` (
`id` int(11) NOT NULL,
  `fbid` text,
  `fbname` varchar(45) DEFAULT NULL,
  `fbemail` varchar(45) DEFAULT NULL,
  `phone` text
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

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
  `meet` datetime DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10138 ;

-- --------------------------------------------------------

--
-- Table structure for table `last_call`
--

CREATE TABLE IF NOT EXISTS `last_call` (
`id` int(11) NOT NULL,
  `def` int(11) NOT NULL,
  `lcall` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3375 ;

-- --------------------------------------------------------

--
-- Table structure for table `list_names`
--

CREATE TABLE IF NOT EXISTS `list_names` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `lang` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14948 ;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
`id` int(11) NOT NULL,
  `admin` varchar(45) DEFAULT NULL,
  `text` text,
  `isRead` int(11) DEFAULT '1',
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `title` text,
  `type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7585 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

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
  `list_name` text NOT NULL,
  `web` int(11) DEFAULT NULL,
  `country` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4069 ;

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
-- Indexes for table `akit_reg`
--
ALTER TABLE `akit_reg`
 ADD PRIMARY KEY (`idi`);

--
-- Indexes for table `call_count`
--
ALTER TABLE `call_count`
 ADD PRIMARY KEY (`def`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `excel`
--
ALTER TABLE `excel`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `fb_reg`
--
ALTER TABLE `fb_reg`
 ADD PRIMARY KEY (`id`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `admin_jobs`
--
ALTER TABLE `admin_jobs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `akit_reg`
--
ALTER TABLE `akit_reg`
MODIFY `idi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `call_count`
--
ALTER TABLE `call_count`
MODIFY `def` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19451;
--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `excel`
--
ALTER TABLE `excel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `fb_reg`
--
ALTER TABLE `fb_reg`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
MODIFY `def` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10138;
--
-- AUTO_INCREMENT for table `last_call`
--
ALTER TABLE `last_call`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3375;
--
-- AUTO_INCREMENT for table `list_names`
--
ALTER TABLE `list_names`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
MODIFY `def` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14948;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7585;
--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4069;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
