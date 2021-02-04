-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 04, 2015 at 09:56 AM
-- Server version: 5.6.24-0ubuntu2
-- PHP Version: 5.6.4-4ubuntu6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oneidnet_findit`
--

-- --------------------------------------------------------

--
-- Table structure for table `fi_advertisements`
--

CREATE TABLE IF NOT EXISTS `fi_advertisements` (
  `rec_aid` int(11) NOT NULL,
  `campaign_category` enum('One Liner','Multi Box','Aside Box','') NOT NULL,
  `entity_id` int(11) NOT NULL,
  `campaign_id_fk` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fi_advertisements`
--

INSERT INTO `fi_advertisements` (`rec_aid`, `campaign_category`, `entity_id`, `campaign_id_fk`, `created_on`, `is_active`) VALUES
(0, 'One Liner', 84, 5, '2015-08-02 23:33:59', 0),
(0, 'Multi Box', 90, 17, '2015-08-02 23:51:47', 0),
(0, 'Aside Box', 92, 0, '0000-00-00 00:00:00', 0),
(0, 'Aside Box', 93, 0, '0000-00-00 00:00:00', 0),
(0, 'Aside Box', 94, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fi_asidebox`
--

CREATE TABLE IF NOT EXISTS `fi_asidebox` (
`rec_aid` int(11) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `adv_category` enum('Famous Personality','Tourism Plans','City','Company','Country','Films','Video Games','Sports','Panet','Stores') NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL COMMENT 'ids from modules',
  `description` text NOT NULL,
  `params_str` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fi_asidebox`
--

INSERT INTO `fi_asidebox` (`rec_aid`, `keyword`, `url`, `adv_category`, `name`, `description`, `params_str`, `created_on`) VALUES
(1, 'fgsdfh', 'gdfh', 'City', 'dfhb', '', '', '2015-08-03 11:55:32'),
(2, 'sffs', 'sdg', 'City', 'dvfsd', 'sfsdfg', '', '2015-08-03 12:08:50'),
(3, 'fg', 'fgfdg', 'City', 'dfs', 'fgF', '["Dialing code","dsgd","fgdfg"]', '2015-08-03 12:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `fi_documents`
--

CREATE TABLE IF NOT EXISTS `fi_documents` (
`document_id` bigint(20) NOT NULL,
  `url` varchar(700) NOT NULL,
  `keywords` text NOT NULL,
  `search_weitage` float NOT NULL COMMENT 'this count increases if user actually clicked on that link',
  `title_text` text NOT NULL,
  `meta_description` text NOT NULL,
  `page_content` text NOT NULL,
  `robot_id` int(11) NOT NULL,
  `domain_id_fk` int(11) NOT NULL,
  `last_update_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fi_documents`
--

INSERT INTO `fi_documents` (`document_id`, `url`, `keywords`, `search_weitage`, `title_text`, `meta_description`, `page_content`, `robot_id`, `domain_id_fk`, `last_update_on`) VALUES
(1, 'http://passportindia.gov.in/AppOnlineProject/welcomeLink', '', 3.08, 'How to Apply For a Passport : Procedure & Instruction for Applying Passport  - Latest News, Updates & Events of MEA India at voiceof.india.com', 'How to Apply for a Passport - Procedure & instruction for applying passport. Brief Detail on how to register online for passport at voiceof.india.com', 'how to apply for passport', 0, 0, '2015-05-28 01:57:24'),
(2, 'http://www.aviewoncities.com/london.htm', '', 12.58, 'London', 'London, the capital of England and the United Kingdom, was founded 2000 years ago by the Romans as Londinium. The city has been Western Europe''s largest city for centuries: as early as in 1700 more than 575,000 people lived in London.', 'london city view', 0, 0, '2015-05-28 01:52:54'),
(3, 'http://www.bhea.co.in/', 'Websites, Online Stores, Portals, Custom Web Development, SugarCRM, SugarCRM Installation, SugarCRM Support, Joomla Installation, Joomla Services, Moodle Installation, Moodle Services,', 10.243, 'Home - Welcome To Bhea Knowledge Techonologies', 'Bhea Knowledge Technologies develops websites, eCommerce stores, portals and custom web applications. We provide solutions based on Joomla, SugarCRM and Moodle.', 'bhea knowledge technology', 0, 0, '2015-05-28 01:53:24'),
(4, 'https://www.google.co.in/search?q=order+by+two+colums+in+mysql&oq=order+by+two+colums+in+mysql&aqs=chrome..69i57.6630j0j7&sourceid=chrome&es_sm=0&ie=UTF-8', '', 34.178, 'Welcome to Department of Science and Technology, Govt. of India ::', 'India is one of the top-ranking countries in the field of basic research. Indian Science has come to be regarded as one of the most powerful instruments of growth and development, especially in the emerging scenario and competitive economy. In the wake of the recent developments and the new demands that are being placed on the S&ampT system, it is necessary for us to embark on some major science projects which have relevance to national needs and which will also be relevant for tomorrow''s technology. The Department of Science &amp; Technology plays a pivotal role in promotion of science &amp; technology in the country. ', 'This is page content...India is one of the top-ranking countries in the field of basic research. Indian Science has come to be regarded as one of the most powerful instruments of growth and development, especially in the emerging scenario and competitive economy. In the wake of the recent developments and the new demands that are being placed on the S&ampT system, it is necessary for us to embark on some major science projects which have relevance to national needs and which will also be relevant for tomorrow''s technology. The Department of Science &amp; Technology plays a pivotal role in promotion of science &amp; technology in the country. India is one of the top-ranking countries in the field of basic research. Indian Science has come to be regarded as one of the most powerful instruments of growth and development, especially in the emerging scenario and competitive economy. In the wake of the recent developments and the new demands that are being placed on the S&ampT system, it is necessary for us to embark on some major science projects which have relevance to national needs and which will also be relevant for tomorrow''s technology. The Department of Science &amp; Technology plays a pivotal role in promotion of science &amp; technology in the country. India is one of the top-ranking countries in the field of basic research. Indian Science has come to be regarded as one of the most powerful instruments of growth and development, especially in the emerging scenario and competitive economy. In the wake of the recent developments and the new demands that are being placed on the S&ampT system, it is necessary for us to embark on some major science projects which have relevance to national needs and which will also be relevant for tomorrow''s technology. The Department of Science &amp; Technology plays a pivotal role in promotion of science &amp; technology in the country. ', 0, 0, '2015-05-28 02:00:18'),
(5, '', '', 12.04, 'Welcome to Facebook — Log in, sign up or learn more', 'Facebook is a social utility that connects people with friends and others who work, study and live around them. People use Facebook to keep up with...', 'This is page content...India is one of the top-ranking countries in the field of basic research. Indian Science has come to be regarded as one of the most powerful instruments of growth and development, especially in the emerging scenario and competitive economy. In the wake of the recent developments and the new demands that are being placed on the S&ampT system, it is necessary for us to embark on some major science projects which have relevance to national needs and which will also be relevant for tomorrow''s technology. The Department of Science &amp; Technology plays a pivotal role in promotion of science &amp; technology in the country. India is one of the top-ranking countries in the field of basic research. Indian Science has come to be regarded as one of the most powerful instruments of growth and development, especially in the emerging scenario and competitive economy. In the wake of the recent developments and the new demands that are being placed on the S&ampT system, it is necessary for us to embark on some major science projects which have relevance to national needs and which will also be relevant for tomorrow''s technology. The Department of Science &amp; Technology plays a pivotal role in promotion of science &amp; technology in the country. India is one of the top-ranking countries in the field of basic research. Indian Science has come to be regarded as one of the most powerful instruments of growth and development, especially in the emerging scenario and competitive economy. In the wake of the recent developments and the new demands that are being placed on the S&ampT system, it is necessary for us to embark on some major science projects which have relevance to national needs and which will also be relevant for tomorrow''s technology. The Department of Science &amp; Technology plays a pivotal role in promotion of science &amp; technology in the country. ', 0, 0, '2015-05-28 00:44:41'),
(6, 'https://mail.google.com/mail/u/0/?pli=1#inbox', '', 13.32, ' Gmail - Free Storage and Email from Google', 'Gmail was a project started by Google developer Paul Buchheit, who had already explored the idea of web-based email in the 1990s, before the launch of Hotmail, while working on a personal email software project as a college student.[2] Buchheit began his work on Gmail in August 2001.[3] At Google, Buchheit had first worked on Google Groups and when asked "to build some type of email or personalization product", he created the first version of Gmail in one day, reusing the code from Google Groups.[2] The project was known by the code name Caribou, a reference to a Dilbert comic strip about Project Caribou.[3]\n\nAt the time when Gmail was being developed, existing email services such as Yahoo! Mail and Hotmail featured extremely slow interfaces that were written in plain HTML, with almost every action by the user requiring the server to reload the entire webpage. Buchheit attempted to work around the limitations of HTML by using the highly interactive JavaScript code, an approach that ultimately came to be called AJAX (Asynchronous JavaScript and XML).[3]\n\nBuchheit recalls that the high volume of internal email at Google created "a very big need for search".[2] Advanced search capabilities eventually led to considerations for providing a generous amount of storage space, which in turn opened up the possibility of allowing users to keep their emails forever, rather than having to delete them frantically to stay under the storage limit. After considering alternatives such as 100 MB, the company finally settled upon 1 GB of space, a figure that was preposterous compared to the 2 to 4 MB that was the standard at the time.[3]\n\nBuchheit had been working on Gmail for about a month when he was joined by another engineer, Sanjeev Singh, with whom he would eventually found the social-networking startup FriendFeed after leaving Google in 2006. Gmail''s first product manager, Brian Rakowski, learned about the project on his very first day at Google in 2002, fresh out of college. In August 2003, another new Google recruit, Kevin Fox was assigned the task of designing Gmail''s interface. When the service was finally launched in April 2004, about a dozen people were working on the project.[3]\n\nInitially the software was available only internally as an email system for Google employees.[4] According to Google, the software had been used internally for "a number of years" before it was released to the public in 2004.[4]', 'This is page content...India is one of the top-ranking countries in the field of basic research. Indian Science has come to be regarded as one of the most powerful instruments of growth and development, especially in the emerging scenario and competitive economy. In the wake of the recent developments and the new demands that are being placed on the S&ampT system, it is necessary for us to embark on some major science projects which have relevance to national needs and which will also be relevant for tomorrow''s technology. The Department of Science &amp; Technology plays a pivotal role in promotion of science &amp; technology in the country. India is one of the top-ranking countries in the field of basic research. Indian Science has come to be regarded as one of the most powerful instruments of growth and development, especially in the emerging scenario and competitive economy. In the wake of the recent developments and the new demands that are being placed on the S&ampT system, it is necessary for us to embark on some major science projects which have relevance to national needs and which will also be relevant for tomorrow''s technology. The Department of Science &amp; Technology plays a pivotal role in promotion of science &amp; technology in the country. India is one of the top-ranking countries in the field of basic research. Indian Science has come to be regarded as one of the most powerful instruments of growth and development, especially in the emerging scenario and competitive economy. In the wake of the recent developments and the new demands that are being placed on the S&ampT system, it is necessary for us to embark on some major science projects which have relevance to national needs and which will also be relevant for tomorrow''s technology. The Department of Science &amp; Technology plays a pivotal role in promotion of science &amp; technology in the country. ', 0, 0, '2015-05-28 01:14:07'),
(33, 'http://www.abc.com/q=xcdf&m=12Vx53', 'abc, abcNews', 2.3, 'Welcome to changed Title Text', 'helo esa bela hola changed', 'This is a changed description', 1, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fi_files`
--

CREATE TABLE IF NOT EXISTS `fi_files` (
  `rec_aid` int(11) NOT NULL,
  `link` text NOT NULL,
  `site_name` varchar(150) NOT NULL,
  `alt_text` varchar(150) NOT NULL,
  `file_types` enum('cpp','h','txt','text','svg','rtf','doc','docx','ppt','pptx','xls','xlsx','pdf','swf') NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fi_images`
--

CREATE TABLE IF NOT EXISTS `fi_images` (
`rec_aid` bigint(20) NOT NULL,
  `url` int(11) NOT NULL,
  `site_name` varchar(150) NOT NULL COMMENT 'E.g. google.com, stumbleupon.com',
  `alt` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fi_in_out_links`
--

CREATE TABLE IF NOT EXISTS `fi_in_out_links` (
`rec_aid` bigint(20) NOT NULL,
  `f_domain` varchar(150) NOT NULL,
  `t_domain` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fi_in_out_links`
--

INSERT INTO `fi_in_out_links` (`rec_aid`, `f_domain`, `t_domain`) VALUES
(1, 'http://www.cnn.com', 'http://www.facebook.com'),
(2, 'http://www.cnn.com', 'http://www.facebook1.com');

-- --------------------------------------------------------

--
-- Table structure for table `fi_keywords`
--

CREATE TABLE IF NOT EXISTS `fi_keywords` (
`rec_aid` bigint(20) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `document_id_fk` text NOT NULL COMMENT 'Foreign key from fi_documents',
  `image_id_fk` text NOT NULL,
  `video_id_fk` text NOT NULL,
  `news_id_fk` text NOT NULL,
  `files_id_fk` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fi_keywords`
--

INSERT INTO `fi_keywords` (`rec_aid`, `keyword`, `document_id_fk`, `image_id_fk`, `video_id_fk`, `news_id_fk`, `files_id_fk`, `date`) VALUES
(1, 'how', '1', '', '', '', '', '0000-00-00 00:00:00'),
(2, 'facebook', '6', '', '', '', '', '0000-00-00 00:00:00'),
(3, 'passport', '1', '', '', '', '', '0000-00-00 00:00:00'),
(4, 'india', '1', '', '', '', '', '0000-00-00 00:00:00'),
(5, 'london', '2', '', '', '', '', '0000-00-00 00:00:00'),
(6, 'bhea', '3', '', '', '', '', '0000-00-00 00:00:00'),
(7, 'knowledge', '3', '', '', '', '', '0000-00-00 00:00:00'),
(8, 'technology', '3,4', '', '', '', '', '0000-00-00 00:00:00'),
(10, 'views', '2', '', '', '', '', '0000-00-00 00:00:00'),
(11, 'science', '4', '', '', '', '', '0000-00-00 00:00:00'),
(12, 'login', '6,5', '', '', '', '', '0000-00-00 00:00:00'),
(13, 'gmail', '6', '', '', '', '', '0000-00-00 00:00:00'),
(14, 'danish', '', '', '', '', '', '0000-00-00 00:00:00'),
(16, 'hellboya', '', '', '', '', '', '0000-00-00 00:00:00'),
(19, 'hellboy', '', '', '', '', '', '0000-00-00 00:00:00'),
(21, 'hellboys', '', '', '', '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fi_multibox`
--

CREATE TABLE IF NOT EXISTS `fi_multibox` (
`rec_aid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `price` int(20) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `thumbnail_url` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fi_multibox`
--

INSERT INTO `fi_multibox` (`rec_aid`, `name`, `keyword`, `url`, `price`, `currency_id`, `site_name`, `description`, `thumbnail_url`, `created_on`) VALUES
(16, 'ZV', 'ncbn', 'sfbc', 56, 0, 'bvcb', 'vXB', 'Scr.png', '2015-07-30 05:53:50'),
(17, 'vfdv', 'bgnhh', 'zvdbx', 566, 0, 'fbgdn', 'fdsg', 'Scr.png', '2015-08-03 05:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `fi_robots`
--

CREATE TABLE IF NOT EXISTS `fi_robots` (
`rec_aid` int(11) NOT NULL,
  `robot_name` varchar(45) NOT NULL COMMENT 'E.g. robot_13246 {Always add rec_aid to CONSTANT 786}',
  `domain` varchar(255) NOT NULL,
  `robot_path` varchar(100) NOT NULL,
  `xml_path` varchar(100) NOT NULL,
  `last_run_time` datetime NOT NULL,
  `execution_count` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fi_robots`
--

INSERT INTO `fi_robots` (`rec_aid`, `robot_name`, `domain`, `robot_path`, `xml_path`, `last_run_time`, `execution_count`, `created_on`) VALUES
(1, 'robot_13246', 'http://cnn.com', 'robots/13246/robot_13246.php', 'robots/13246/links_13246.xml', '0000-00-00 00:00:00', 0, '2015-07-05 19:22:15'),
(2, 'robot_13246', 'http://godaddy.com', 'robots/13246/robot_13247.php', 'robots/13247/links_13247.xml', '0000-00-00 00:00:00', 0, '2015-07-05 19:22:30');

-- --------------------------------------------------------

--
-- Table structure for table `fi_robots_log`
--

CREATE TABLE IF NOT EXISTS `fi_robots_log` (
`run_aid` int(11) NOT NULL,
  `robot_id_fk` int(11) NOT NULL,
  `execution_starts_on` datetime NOT NULL,
  `execution_stopped_on` datetime NOT NULL,
  `total_execution_time` double NOT NULL COMMENT '60ms',
  `max_levels` int(9) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fi_sponsered_links`
--

CREATE TABLE IF NOT EXISTS `fi_sponsered_links` (
`splink_aid` bigint(20) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `url` int(11) NOT NULL,
  `site_name` int(11) NOT NULL,
  `location` char(3) NOT NULL COMMENT 'country_code (Three letters)',
  `description` text NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fi_sponsered_links`
--

INSERT INTO `fi_sponsered_links` (`splink_aid`, `keyword`, `url`, `site_name`, `location`, `description`, `is_active`) VALUES
(1, '', 0, 0, 'ggg', 'dfdfdfd dff', 1),
(2, '', 0, 0, 'sss', 'fff', 0),
(3, '', 0, 0, 'ffd', 'ss', 0),
(4, '', 0, 0, 'fdf', 'ff', 0),
(5, 'ghddfh', 0, 0, 'dhd', 'dghdg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fi_unique_domains`
--

CREATE TABLE IF NOT EXISTS `fi_unique_domains` (
`domain_aid` int(11) NOT NULL,
  `domain` varchar(255) NOT NULL COMMENT 'only till  .com',
  `domain_rank` int(9) NOT NULL,
  `last_update_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fi_users_query`
--

CREATE TABLE IF NOT EXISTS `fi_users_query` (
`query_id` int(11) NOT NULL,
  `query` varchar(200) NOT NULL,
  `hit` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fi_users_query`
--

INSERT INTO `fi_users_query` (`query_id`, `query`, `hit`) VALUES
(1, 'How to get selected in Google', 0.02),
(2, 'How to prepare for IAS exam', 0.02),
(3, 'How to be a good group leader', 0.03),
(4, 'anjuman College of Engineering & Technology', 0.02),
(5, 'how to use find it... just find it', 0.03),
(6, 'how fire alarm works', 0.03),
(7, 'how to grow hair faster', 0.03),
(8, 'how to be happy', 0.02),
(9, 'how to use php in javascript', 0.02),
(10, 'how to apply for passport', 0.01),
(11, 'Social Networking website', 0.67),
(12, 'Facebook Conspiracy', 0.8);

-- --------------------------------------------------------

--
-- Table structure for table `fi_videos`
--

CREATE TABLE IF NOT EXISTS `fi_videos` (
`video_aid` bigint(20) NOT NULL,
  `url` varchar(500) NOT NULL,
  `site_name` varchar(150) NOT NULL,
  `title` varchar(300) NOT NULL,
  `thumbnail_url` text NOT NULL,
  `description` text NOT NULL COMMENT 'meta description',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fi_visited_links`
--

CREATE TABLE IF NOT EXISTS `fi_visited_links` (
  `user_id` int(11) NOT NULL,
  `link_id` int(11) NOT NULL COMMENT 'doc_id_fk',
  `visited_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fi_asidebox`
--
ALTER TABLE `fi_asidebox`
 ADD PRIMARY KEY (`rec_aid`);

--
-- Indexes for table `fi_documents`
--
ALTER TABLE `fi_documents`
 ADD PRIMARY KEY (`document_id`), ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `fi_images`
--
ALTER TABLE `fi_images`
 ADD PRIMARY KEY (`rec_aid`), ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `fi_in_out_links`
--
ALTER TABLE `fi_in_out_links`
 ADD PRIMARY KEY (`rec_aid`), ADD UNIQUE KEY `f_domain` (`f_domain`,`t_domain`);

--
-- Indexes for table `fi_keywords`
--
ALTER TABLE `fi_keywords`
 ADD PRIMARY KEY (`rec_aid`), ADD UNIQUE KEY `keyword` (`keyword`);

--
-- Indexes for table `fi_multibox`
--
ALTER TABLE `fi_multibox`
 ADD PRIMARY KEY (`rec_aid`);

--
-- Indexes for table `fi_robots`
--
ALTER TABLE `fi_robots`
 ADD PRIMARY KEY (`rec_aid`);

--
-- Indexes for table `fi_robots_log`
--
ALTER TABLE `fi_robots_log`
 ADD PRIMARY KEY (`run_aid`);

--
-- Indexes for table `fi_sponsered_links`
--
ALTER TABLE `fi_sponsered_links`
 ADD PRIMARY KEY (`splink_aid`);

--
-- Indexes for table `fi_unique_domains`
--
ALTER TABLE `fi_unique_domains`
 ADD PRIMARY KEY (`domain_aid`), ADD UNIQUE KEY `domain` (`domain`);

--
-- Indexes for table `fi_users_query`
--
ALTER TABLE `fi_users_query`
 ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `fi_videos`
--
ALTER TABLE `fi_videos`
 ADD PRIMARY KEY (`video_aid`), ADD UNIQUE KEY `url` (`url`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fi_asidebox`
--
ALTER TABLE `fi_asidebox`
MODIFY `rec_aid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fi_documents`
--
ALTER TABLE `fi_documents`
MODIFY `document_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `fi_images`
--
ALTER TABLE `fi_images`
MODIFY `rec_aid` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fi_in_out_links`
--
ALTER TABLE `fi_in_out_links`
MODIFY `rec_aid` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fi_keywords`
--
ALTER TABLE `fi_keywords`
MODIFY `rec_aid` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `fi_multibox`
--
ALTER TABLE `fi_multibox`
MODIFY `rec_aid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `fi_robots`
--
ALTER TABLE `fi_robots`
MODIFY `rec_aid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fi_robots_log`
--
ALTER TABLE `fi_robots_log`
MODIFY `run_aid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fi_sponsered_links`
--
ALTER TABLE `fi_sponsered_links`
MODIFY `splink_aid` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fi_unique_domains`
--
ALTER TABLE `fi_unique_domains`
MODIFY `domain_aid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fi_users_query`
--
ALTER TABLE `fi_users_query`
MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `fi_videos`
--
ALTER TABLE `fi_videos`
MODIFY `video_aid` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
