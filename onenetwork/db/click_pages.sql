-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2015 at 11:35 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_oneidnet`
--

-- --------------------------------------------------------

--
-- Table structure for table `click_pages`
--

CREATE TABLE IF NOT EXISTS `click_pages` (
  `page_aid` int(9) NOT NULL AUTO_INCREMENT,
  `page_code` varchar(15) NOT NULL,
  `page_name` varchar(100) NOT NULL,
  `page_type` enum('LOCAL_BUSINESS','COMPANY','BRAND','ARTIST','ENTERTAINMENT','PLACE','ORGANISATION','INSTITUTION','PRODUCT','PUBLIC_FIGURE','BAND','FOOD') NOT NULL,
  `page_interest` varchar(30) NOT NULL COMMENT '''Music'',''Films'',''Business'',''Health'',''Astrology'',''Art'',''Fashion'',''Travel'',''Charity'',''Science & Technology'',''Human Rights'',''Enviornment'',''Religious'',''News'',''Reknowned Personality'',''Politics'',''Law'',''Infotainment'',''Books''',
  `street` varchar(60) NOT NULL,
  `city_id_fk` int(6) NOT NULL,
  `country_id_fk` int(3) NOT NULL,
  `zip_code` int(9) NOT NULL,
  `phone_no` varchar(25) NOT NULL,
  `description` varchar(600) NOT NULL,
  `about` varchar(200) NOT NULL,
  `website` varchar(120) NOT NULL,
  `logo_path` varchar(100) NOT NULL COMMENT 'Store Only Name',
  `cover_path` varchar(100) NOT NULL COMMENT 'Store Only Name',
  `total_likes` int(9) NOT NULL,
  `is_official` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`page_aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `click_pages`
--

INSERT INTO `click_pages` (`page_aid`, `page_code`, `page_name`, `page_type`, `page_interest`, `street`, `city_id_fk`, `country_id_fk`, `zip_code`, `phone_no`, `description`, `about`, `website`, `logo_path`, `cover_path`, `total_likes`, `is_official`, `created_on`, `created_by`, `is_deleted`) VALUES
(1, 'SYSTEM', 'SYSTEM', '', 'SYSTEM', 'SYSTEM', 1, 1, 1, 'SYSTEM', 'SYSTEM', 'SYSTEM', 'SYSTEM', 'SYSTEM', 'SYSTEM', 0, 0, '2015-06-29 19:25:35', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
