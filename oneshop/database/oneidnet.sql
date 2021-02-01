-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2015 at 03:28 AM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oneidnet`
--

-- --------------------------------------------------------

--
-- Table structure for table `os_all_store`
--

CREATE TABLE IF NOT EXISTS `os_all_store` (
  `store_aid` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` varchar(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `package` enum('Basic','Premium','Hyper') NOT NULL,
  `currency` enum('INR: Indian Rupees','USD: US Dollar','SAR: Saudi Rial','EUD: European Dollar') NOT NULL,
  `address_line1` varchar(200) NOT NULL,
  `address_line2` varchar(200) NOT NULL,
  `city` int(6) NOT NULL,
  `state` int(5) NOT NULL,
  `country` int(3) NOT NULL,
  `zip_code` int(9) NOT NULL,
  `enq_mobile_number` varchar(20) NOT NULL,
  `helpline_number` varchar(20) NOT NULL,
  `helpline_email` varchar(100) NOT NULL,
  `service_email` varchar(100) NOT NULL,
  `prob_reporting_email` varchar(100) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `timezone` varchar(70) NOT NULL,
  `is_package_active` enum('Yes','No') NOT NULL,
  `logo_path` varchar(255) NOT NULL,
  `cover_path` varchar(255) NOT NULL,
  `website` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expired_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_official` tinyint(4) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL COMMENT 'IWS Profile Id: Admin ',
  `storage` int(2) NOT NULL,
  `used_space` float NOT NULL,
  `visit_count` int(11) NOT NULL,
  `is_verified` tinyint(4) NOT NULL,
  PRIMARY KEY (`store_aid`),
  UNIQUE KEY `rec_aid` (`store_aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Triggers `os_all_store`
--
DROP TRIGGER IF EXISTS `store_id_delete_in_store_setting`;
DELIMITER //
CREATE TRIGGER `store_id_delete_in_store_setting` AFTER DELETE ON `os_all_store`
 FOR EACH ROW BEGIN
	DELETE FROM os_store_settings WHERE store_id_fk = old.store_aid;
  END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `store_id_insert_in_store_setting`;
DELIMITER //
CREATE TRIGGER `store_id_insert_in_store_setting` AFTER INSERT ON `os_all_store`
 FOR EACH ROW BEGIN
    INSERT INTO os_store_settings SET store_id_fk = NEW.store_aid;
  END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `os_cancellation`
--

CREATE TABLE IF NOT EXISTS `os_cancellation` (
  `rec_aid` int(11) NOT NULL AUTO_INCREMENT,
  `order_num` varchar(60) NOT NULL,
  `ordered_by` int(11) NOT NULL,
  `store_id_fk` int(11) NOT NULL,
  `payer_email` varchar(100) NOT NULL,
  `product_id_str` varchar(100) NOT NULL,
  `quantity_str` varchar(100) NOT NULL,
  `transaction_id` varchar(250) NOT NULL,
  `total_amount_str` varchar(100) NOT NULL,
  `order_cancel_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ordered_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`rec_aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

-- --------------------------------------------------------

--
-- Table structure for table `os_cart_items`
--

CREATE TABLE IF NOT EXISTS `os_cart_items` (
  `product_id_fk` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `store_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='os_cart_tmp';

-- --------------------------------------------------------

--
-- Table structure for table `os_category`
--

CREATE TABLE IF NOT EXISTS `os_category` (
  `category_aid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `groups` enum('Electronics','Fashion Accessories','Clothing','Home & Kitchen') NOT NULL,
  PRIMARY KEY (`category_aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Table structure for table `os_notification`
--

CREATE TABLE IF NOT EXISTS `os_notification` (
  `rec_aid` bigint(16) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `url` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` text NOT NULL,
  `read_or_not` enum('0','1','2','') NOT NULL,
  PRIMARY KEY (`rec_aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

-- --------------------------------------------------------

--
-- Table structure for table `os_orders`
--

CREATE TABLE IF NOT EXISTS `os_orders` (
  `order_aid` int(11) NOT NULL AUTO_INCREMENT,
  `order_num` varchar(60) NOT NULL COMMENT 'generated programatically',
  `ordered_by` int(11) NOT NULL COMMENT 'foreign key of iws_profiles',
  `store_id_fk` int(11) NOT NULL COMMENT 'foreiegn key of os_all_store',
  `payer_email` varchar(100) NOT NULL,
  `product_id_str` varchar(100) NOT NULL,
  `quantity_str` varchar(60) NOT NULL,
  `transaction_id` varchar(150) NOT NULL,
  `total_amount_str` varchar(100) NOT NULL,
  `order_date` datetime NOT NULL,
  `delivery_mode` enum('Standard','Quick') NOT NULL,
  `status` enum('Got Request','Processing','Delivered','Cancel') NOT NULL DEFAULT 'Got Request',
  PRIMARY KEY (`order_aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

-- --------------------------------------------------------

--
-- Table structure for table `os_products`
--

CREATE TABLE IF NOT EXISTS `os_products` (
  `product_aid` int(11) NOT NULL AUTO_INCREMENT,
  `cost_price` int(11) NOT NULL,
  `sell_price` int(11) NOT NULL,
  `name` varchar(65) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `discount` int(3) NOT NULL,
  `manufactering_date` varchar(14) NOT NULL,
  `waranty_if_any` varchar(35) NOT NULL,
  `quantity` int(11) NOT NULL,
  `specification` text NOT NULL,
  `description` text NOT NULL,
  `marked_price` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `Category` int(4) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=149 ;

--
-- Triggers `os_products`
--
DROP TRIGGER IF EXISTS `os_product_more_info_delte`;
DELIMITER //
CREATE TRIGGER `os_product_more_info_delte` AFTER DELETE ON `os_products`
 FOR EACH ROW BEGIN
    DELETE FROM os_product_more_info WHERE product_aid = old.product_aid;
  END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `os_product_more_info_insert`;
DELIMITER //
CREATE TRIGGER `os_product_more_info_insert` AFTER INSERT ON `os_products`
 FOR EACH ROW BEGIN 

    INSERT INTO os_product_more_info SET product_aid = NEW.product_aid;

  END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `os_product_more_info`
--

CREATE TABLE IF NOT EXISTS `os_product_more_info` (
  `rec_aid` int(11) NOT NULL AUTO_INCREMENT,
  `product_aid` int(11) NOT NULL,
  `rank_weitage` float NOT NULL,
  `review_count` int(11) NOT NULL,
  `viewed_count` int(11) NOT NULL,
  `product_manuel_path` varchar(255) NOT NULL,
  PRIMARY KEY (`rec_aid`),
  UNIQUE KEY `product_aid` (`product_aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=152 ;

-- --------------------------------------------------------

--
-- Table structure for table `os_sales`
--

CREATE TABLE IF NOT EXISTS `os_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(60) NOT NULL COMMENT 'foriegn key of os_orders',
  `ordered_by` int(11) NOT NULL,
  `store_id_fk` int(11) NOT NULL,
  `quantity_str` varchar(60) NOT NULL COMMENT 'quantity in string format of the ordered prodcuts',
  `payer_email` varchar(10000) NOT NULL,
  `transaction_id` text NOT NULL,
  `amount` double NOT NULL,
  `ordered_on` datetime NOT NULL,
  `product_id_str` varchar(100) DEFAULT NULL COMMENT 'foreign key of os_products in string format',
  `delivered_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

-- --------------------------------------------------------

--
-- Table structure for table `os_shipping_detail`
--

CREATE TABLE IF NOT EXISTS `os_shipping_detail` (
  `rec_aid` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) NOT NULL,
  `city` int(6) NOT NULL,
  `state` int(5) NOT NULL,
  `country` int(3) NOT NULL,
  `contact` varchar(16) NOT NULL,
  `zip_code` int(9) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rec_aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

--
-- Table structure for table `os_store_official`
--

CREATE TABLE IF NOT EXISTS `os_store_official` (
  `store_id_fk` int(11) NOT NULL,
  `store_name` varchar(100) NOT NULL,
  `reference_name` varchar(100) NOT NULL,
  `reference_number` int(13) NOT NULL,
  `description` text NOT NULL,
  `current_country` int(3) NOT NULL,
  `current_state` int(6) NOT NULL,
  `current_city` int(6) NOT NULL,
  `address_line1` varchar(100) NOT NULL,
  `address_line2` varchar(100) NOT NULL,
  `zipcode` int(9) NOT NULL,
  `personal_mob_no` varchar(30) NOT NULL,
  `personal_email_id` varchar(50) NOT NULL,
  `company_name` varchar(70) NOT NULL,
  `website` varchar(70) NOT NULL,
  `company_turnover` int(9) NOT NULL,
  `landline_no` tinyint(7) NOT NULL,
  `landline_extn` tinyint(4) NOT NULL,
  `verified_on` datetime NOT NULL,
  `requested_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_verified` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `os_store_packages`
--

CREATE TABLE IF NOT EXISTS `os_store_packages` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id_fk` int(3) NOT NULL,
  `percentage_on_each_sale` float NOT NULL,
  `price` int(11) NOT NULL,
  `package_name` enum('Basic','Premium','Hyper') NOT NULL,
  `storage` int(11) NOT NULL COMMENT 'for 1 GB = 1048576 KB, 3GB = 3145728 KB,  5GB = 5242880KB',
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `os_store_problems`
--

CREATE TABLE IF NOT EXISTS `os_store_problems` (
  `report_aid` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(250) NOT NULL,
  `reported_on` datetime NOT NULL,
  `reported_by` int(11) NOT NULL,
  `attachment_path` varchar(150) NOT NULL,
  PRIMARY KEY (`report_aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `os_store_renewals_info`
--

CREATE TABLE IF NOT EXISTS `os_store_renewals_info` (
  `renewal_pckg_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id_fk` int(11) NOT NULL,
  `package_id_fk` int(11) NOT NULL COMMENT 'os_store_packages',
  `renewed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_renewed` tinyint(4) NOT NULL DEFAULT '0',
  `expired_on` datetime NOT NULL,
  PRIMARY KEY (`renewal_pckg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `os_store_settings`
--

CREATE TABLE IF NOT EXISTS `os_store_settings` (
  `store_id_fk` int(11) DEFAULT NULL,
  `order_manager_names` varchar(150) NOT NULL,
  `order_manager_emails` varchar(250) NOT NULL,
  `store_manager_names` varchar(150) NOT NULL,
  `store_manager_emails` varchar(250) NOT NULL,
  `notify_new_orders` enum('Y','N') NOT NULL DEFAULT 'N',
  `notify_out_of_stock` enum('Y','N') NOT NULL DEFAULT 'N',
  `notify_report` enum('Y','N') NOT NULL DEFAULT 'N',
  `notify_cancel` enum('Y','N') NOT NULL,
  `rank_weitage` float NOT NULL,
  `review_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `os_store_tmp`
--

CREATE TABLE IF NOT EXISTS `os_store_tmp` (
  `store_aid` int(11) NOT NULL,
  `store_id` varchar(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `package` enum('Basic','Premium','Hyper') NOT NULL,
  `currency` enum('INR: Indian Rupees','USD: US Dollar','SAR: Saudi Rial','EUD: European Dollar') NOT NULL,
  `address_line1` varchar(200) NOT NULL,
  `address_line2` varchar(200) NOT NULL,
  `city` int(6) NOT NULL,
  `state` int(5) NOT NULL,
  `country` int(3) NOT NULL,
  `zip_code` int(9) NOT NULL,
  `enq_mobile_number` varchar(20) NOT NULL,
  `helpline_number` varchar(20) NOT NULL,
  `helpline_email` varchar(100) NOT NULL,
  `service_email` varchar(100) NOT NULL,
  `prob_reporting_email` varchar(100) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `timezone` varchar(70) NOT NULL,
  `is_package_active` enum('Yes','No') NOT NULL,
  `logo_path` varchar(255) NOT NULL,
  `cover_path` varchar(255) NOT NULL,
  `website` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expired_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_official` tinyint(4) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL COMMENT 'IWS Profile Id: Admin ',
  `storage` int(2) NOT NULL,
  `used_space` float NOT NULL,
  `visit_count` int(11) NOT NULL,
  `package_id_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `os_subcategory`
--

CREATE TABLE IF NOT EXISTS `os_subcategory` (
  `subcategory_aid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `category_aid_fk` int(11) NOT NULL,
  `groups` enum('Electronics','Fashion Accessories','Clothing','Home & Kitchen') NOT NULL,
  PRIMARY KEY (`subcategory_aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

-- --------------------------------------------------------

--
-- Table structure for table `os_user_details`
--

CREATE TABLE IF NOT EXISTS `os_user_details` (
  `profile_id_fk` int(11) NOT NULL,
  `addressline2` varchar(200) NOT NULL,
  `country` int(3) NOT NULL,
  `state` int(5) NOT NULL,
  `city` int(6) NOT NULL,
  `zip_code` int(9) NOT NULL,
  `addressline1` varchar(200) NOT NULL,
  `profile_name` varchar(50) NOT NULL,
  `profile_img` varchar(150) NOT NULL,
  `profile_cover_img` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `os_wishlist`
--

CREATE TABLE IF NOT EXISTS `os_wishlist` (
  `product_id_fk` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
