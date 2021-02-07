-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 04, 2015 at 09:59 AM
-- Server version: 5.6.24-0ubuntu2
-- PHP Version: 5.6.4-4ubuntu6

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
-- Table structure for table `on_ads_pricings`
--

CREATE TABLE IF NOT EXISTS `on_ads_pricings` (
  `country_code` char(3) NOT NULL,
  `size` enum('618 * 222 px','250 * 200 px','250 * 450 px','250 * 600 px') NOT NULL,
  `type` enum('Flash Marketing','Banner Marketing','Website Marketing','Inside System') NOT NULL,
  `unit_cost` int(5) NOT NULL COMMENT 'each person per day',
  `adjust_discount` float NOT NULL COMMENT 'Percentage E.g. 5% = 0.05',
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `on_ads_pricings`
--

INSERT INTO `on_ads_pricings` (`country_code`, `size`, `type`, `unit_cost`, `adjust_discount`, `last_modified_date`) VALUES
('IND', '618 * 222 px', 'Flash Marketing', 10, 0.05, '2015-05-19 22:23:50');

-- --------------------------------------------------------

--
-- Table structure for table `on_audience`
--

CREATE TABLE IF NOT EXISTS `on_audience` (
`audience_id` int(11) NOT NULL,
  `gender` enum('Male','Female','All') NOT NULL,
  `city_str` text NOT NULL,
  `age_range` enum('18 - 25 year','25 - 45 year','45 - 65 year','65+ year') NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `language` varchar(45) NOT NULL,
  `nationality` varchar(70) NOT NULL,
  `interest` enum('Infotainment','General','Music','Business','Movies','Sports','Fashion','News') NOT NULL,
  `modules` set('Click','Tunnel','Buzzin','Netpro','Oneshop','Onevision','ISNews','TravelTime','DealerX','Oneidship') NOT NULL,
  `country_str` text NOT NULL COMMENT '12,45',
  `total_reach` int(11) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `on_campaigns`
--

CREATE TABLE IF NOT EXISTS `on_campaigns` (
`campaign_id` int(7) NOT NULL,
  `campaign_name` varchar(100) NOT NULL,
  `email_body` varchar(255) NOT NULL,
  `email_subject` varchar(255) NOT NULL,
  `campign_type` enum('Banner Marketing','Website Marketing','Seasonal Marketing','Email Marketing','Flash Marketing','Click: Page Promotion','Tunnel: Channel Promotion','Corporate Office: Company Page Promotion','Oneshop: Store Promotion','Buzzin: Celebrity Account Promotion','One Vision: Episode Promotion','One Vision: Channel Promotion','IS News: Sponsered News','Travel Time: Package Promotion','Petition','Find-It') NOT NULL,
  `campaign_size` enum('','618*222px','250*200px','250*450px','250*600px') NOT NULL COMMENT 'Width * Height',
  `currency` enum('AED-United Arab Emirates Dirham','AFN-Afghanistan Afghani','ALL-Albania Lek','AMD-Armenia Dram','ANG-Netherlands Antilles Guilder','AOA-Angola Kwanza','ARS-Argentina Peso','AUD-Australia Dollar','AWG-Aruba Guilder','AZN-Azerbaijan New Manat','BAM-Bosnia and Herzegovina Convert','BBD-Barbados Dollar','BDT-Bangladesh Taka','BGN-Bulgaria Lev','BHD-Bahrain Dinar','BIF-Burundi Franc','BMD-Bermuda Dollar','BND-Brunei Darussalam Dollar','BOB-Bolivia Boliviano','BRL-Brazil Real','BSD-Bahamas Dollar','BTN-Bhutan Ngultrum','BWP-Botswana Pula','BYR-Belarus Ruble','BZD-Belize Dollar','CAD-Canada Dollar','CDF-Congo/Kinshasa Franc','CHF-Switzerland Franc','CLP-Chile Peso','CNY-China Yuan Renminbi','COP-Colombia Peso','CRC-Costa Rica Colon','CUC-Cuba Convertible Peso','CUP-Cuba Peso','CVE-Cape Verde Escudo','CZK-Czech Republic Koruna','DJF-Djibouti Franc','DKK-Denmark Krone','DOP-Dominican Republic Peso','DZD-Algeria Dinar','EGP-Egypt Pound','ERN-Eritrea Nakfa','ETB-Ethiopia Birr','EUR-Euro Member Countries','FJD-Fiji Dollar','FKP-Falkland Islands Po','GBP-United Kingdom Pound','GEL-Georgia Lari','GGP-Guernsey Pound','GHS-Ghana Cedi','GIP-Gibraltar Pound','GMD-Gambia Dalasi','GNF-Guinea Franc','GTQ-Guatemala Quetzal','GYD-Guyana Dollar','HKD-Hong Kong Dollar','HNL-Honduras Lempira','HRK-Croatia Kuna','HTG-Haiti Gourde','HUF-Hungary Forint','IDR-Indonesia Rupiah','ILS-Israel Shekel','IMP-Isle of Man Pound','INR-India Rupee','IQD-Iraq Dinar','IRR-Iran Rial','ISK-Iceland Krona','JEP-Jersey Pound','JMD-Jamaica Dollar','JOD-Jordan Dinar','JPY-Japan Yen','KES-Kenya Shilling','KGS-Kyrgyzstan Som','KHR-Cambodia Riel','KMF-Comoros Franc','KPW-Korea North Won','KRW-Korea South Won','KWD-Kuwait Dinar','KYD-Cayman Islands Dollar','KZT-Kazakhstan Tenge','LAK-Laos Kip','LBP-Lebanon Pound','LKR-Sri Lanka Rupee','LRD-Liberia Dollar','LSL-Lesotho Loti','LYD-Libya Dinar','MAD-Morocco Dirham','MDL-Moldova Leu','MGA-Madagascar Ariary','MKD-Macedonia Denar','MMK-Myanmar Kyat','MNT-Mongolia Tughrik','MOP-Macau Pataca','MRO-Mauritania Ouguiya','MUR-Mauritius Rupee','MVR-Maldives Islands Ruf','MWK-Malawi Kwacha','MXN-Mexico Peso','MYR-Malaysia Ringgit','MZN-Mozambique Metical','NAD-Namibia Dollar','NGN-Nigeria Naira','NIO-Nicaragua Cordoba','NOK-Norway Krone','NPR-Nepal Rupee','NZD-New Zealand Dollar','OMR-Oman Rial','PAB-Panama Balboa','PEN-Peru Nuevo Sol','PGK-Papua New Guinea Kina','PHP-Philippines Peso','PKR-Pakistan Rupee','PLN-Poland Zloty','PYG-Paraguay Guarani','QAR-Qatar Riyal','RON-Romania New Leu','RSD-Serbia Dinar','RUB-Russia Ruble','RWF-Rwanda Franc','SAR-Saudi Arabia Riyal','SBD-Solomon Islands Dollar','SCR-Seychelles Rupee','SDG-Sudan Pound','SEK-Sweden Krona','SGD-Singapore Dollar','SHP-Saint Helena Pound','SLL-Sierra Leone Leone','SOS-Somalia Shilling','SPL*-Seborga Luigino','SRD-Suriname Dollar','STD-São Tomé and Príncipe Dobra','SVC-El Salvador Colon','SYP-Syria Pound','SZL-Swaziland Lilangeni','THB-Thailand Baht','TJS-Tajikistan Somoni','TMT-Turkmenistan Manat','TND-Tunisia Dinar','TOP-Tonga Pa anga','TRY-Turkey Lira','TTD-Trinidad Tobago Dollar','TVD-Tuvalu Dollar','TWD-Taiwan New Dollar','TZS-Tanzania Shilling','UAH-Ukraine Hryvnia','UGX-Uganda Shilling','USD-United States Dollar','UYU-Uruguay Peso','UZS-Uzbekistan Som','VEF-Venezuela Bolivar','VND-Viet Nam Dong','VUV-Vanuatu Vatu','WST-Samoa Tala','XAF-Communauté Financière Africain','XCD-East Caribbean Dollar','XDR-International Monetary Fund','XOF-Communauté Financière Africain','XPF-Comptoirs Français du Pacifiqu','YER-Yemen Rial','ZAR-South Africa Rand','ZMW-Zambia Kwacha','ZWD-Zimbabwe Dollar') NOT NULL,
  `title` varchar(45) NOT NULL,
  `url` text NOT NULL,
  `size` enum('300_200','300_100','300_300') NOT NULL,
  `file_path` varchar(150) NOT NULL,
  `budget` int(8) NOT NULL,
  `source` enum('Inside','Outside') NOT NULL,
  `active_on` datetime NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `is_payment_done` tinyint(4) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `campaign_start_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `campaign_expired_on` datetime NOT NULL,
  `life_time` tinyint(4) NOT NULL,
  `duration` int(11) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `gender` enum('Male','Female','All') NOT NULL,
  `age_range` enum('18 - 25 year','25 - 45 year','45 - 65 year','65+ year') NOT NULL,
  `marital_status` enum('Single','Married') NOT NULL,
  `language` varchar(45) NOT NULL,
  `interest` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `modules` text NOT NULL,
  `total_reach` int(11) NOT NULL,
  `estimated_daily_reach` int(11) NOT NULL,
  `industry` enum('Agriculture','Banking','Grocery','Accounting','Health Care','Advertising','Internet Publishing','Aerospace','Investment Banking','Aircraft','Legal','Airline','Manufacturing','Apparel & Accessories','Motion Picture & Video','Automotive','Music','Newspaper Publishers','Broadcasting','Online Auctions','Brokerage','Pension Funds','Biotechnology','Pharmaceuticals','Call Centers','Private Equity','Cargo Handling','Publishing','Chemical','Real Estate','Computer','Retail & Wholesale','Consulting','Securities & Commodity Exchanges','Consumer Products','Service','Cosmetics','Soap & Detergent','Defense','Software','Department Stores','Sports','Education','Technology','Electronics','Telecommunications','Energy','Television','Entertainment & Leisure','Transportation','Executive Search','Trucking','Financial Services','Venture Capital','Food, Beverage & Tobacco') NOT NULL,
  `entity_id` int(15) NOT NULL,
  `location` text NOT NULL,
  `total_module_wise_reach` text NOT NULL,
  `actual_module_wise_reach` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `on_campaigns`
--

INSERT INTO `on_campaigns` (`campaign_id`, `campaign_name`, `email_body`, `email_subject`, `campign_type`, `campaign_size`, `currency`, `title`, `url`, `size`, `file_path`, `budget`, `source`, `active_on`, `is_active`, `is_payment_done`, `created_by`, `created_on`, `campaign_start_on`, `campaign_expired_on`, `life_time`, `duration`, `is_deleted`, `gender`, `age_range`, `marital_status`, `language`, `interest`, `category`, `modules`, `total_reach`, `estimated_daily_reach`, `industry`, `entity_id`, `location`, `total_module_wise_reach`, `actual_module_wise_reach`) VALUES
(1, 'sdfs', '', '', 'Tunnel: Channel Promotion', '', 'AED-United Arab Emirates Dirham', '', 'http://localhost/tunnel', '300_200', '', 6000, 'Inside', '0000-00-00 00:00:00', 1, 1, 1, '2015-07-27 13:53:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'Male', '18 - 25 year', 'Single', '', 'Foot ball,Arts', '', '[]', 0, 0, 'Agriculture', 0, 'India,Hyderabad', '', ''),
(2, 'new campaign', '', '', 'Corporate Office: Company Page Promotion', '', 'AFN-Afghanistan Afghani', '', 'http://localhost/coffice', '300_200', '', 3000, 'Inside', '0000-00-00 00:00:00', 1, 1, 1, '2015-07-27 12:46:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'Male', '18 - 25 year', 'Single', '', '', '', '[]', 0, 0, 'Agriculture', 0, 'aaadfd,Finland', '', ''),
(3, 'errrr', '', '', '', '', 'AFN-Afghanistan Afghani', '', '', '300_200', '', 3500, '', '0000-00-00 00:00:00', 1, 1, 1, '2015-07-27 13:39:31', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'Male', '25 - 45 year', 'Single', '', 'aa,Foot ball', '', '[]', 0, 0, 'Agriculture', 0, 'ss,dd', '', ''),
(4, 'abcd', '', '', 'Corporate Office: Company Page Promotion', '250*200px', 'AFN-Afghanistan Afghani', '', 'http://localhost/coffice', '300_200', 'surya-and-karthi-2.jpg', 50000, 'Inside', '2015-07-15 00:00:00', 1, 1, 1, '2015-07-28 04:54:59', '2015-07-14 18:30:00', '2015-07-21 10:20:10', 0, 0, 0, 'Male', '25 - 45 year', 'Single', '', 'dfds,fdfd,fdfd', '', '', 0, 0, 'Agriculture', 0, 'dfd,fd', '', ''),
(6, 'aaaa', '', '', 'Banner Marketing', '', 'AFN-Afghanistan Afghani', '', '', '300_200', '', 34, 'Inside', '0000-00-00 00:00:00', 0, 0, 0, '2015-07-09 08:57:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'Male', '18 - 25 year', 'Single', '', '', '', '', 0, 0, 'Agriculture', 0, '', '', ''),
(7, 'dfdf', '', '', 'Banner Marketing', '', 'AED-United Arab Emirates Dirham', ' hhhh', 'ggg', '300_200', 'data/banner/1bannar2015-07-09-02-56-19.png', 1111, 'Outside', '0000-00-00 00:00:00', 0, 0, 1, '2015-07-09 09:26:44', '2015-07-09 06:30:00', '2015-07-21 12:00:00', 0, 12, 0, 'Male', '25 - 45 year', 'Single', '', 'aadfd,df', 'Social', '["Click","Tunnel"," Buzzin"," Oneshop "]', 0, 0, 'Agriculture', 0, 'ddfd,fdf', '', ''),
(9, 'hhhh', 'dfdf dfdsfdfdf df df dfd fds fdsfdsf', 'sdffdf', 'Email Marketing', '', 'ALL-Albania Lek', '', '', '300_200', '', 677, 'Outside', '0000-00-00 00:00:00', 0, 0, 1, '2015-07-09 09:40:07', '2015-07-10 06:30:00', '2015-07-15 12:00:00', 0, 5, 0, 'Female', '25 - 45 year', 'Single', '', 'dfdsf,dfds,fds,fdsf,ds', 'Social', '["Click","Tunnel"," Buzzin"," Oneshop "]', 0, 0, 'Agriculture', 0, 'dfd,fdf,f,d', '', ''),
(16, 'new oneee', '', '', 'Banner Marketing', '', 'ALL-Albania Lek', ' afgc', 'degc', '300_200', 'data/banner/2bannar2015-07-09-03-48-21.png', 355, 'Outside', '0000-00-00 00:00:00', 0, 0, 2, '2015-07-14 07:02:36', '2015-07-10 06:30:00', '2015-07-23 12:00:00', 0, 13, 0, 'Female', '18 - 25 year', 'Single', '', 'afef,ddf', 'Social', '["Click","Buzzin"]', 0, 0, 'Agriculture', 0, 'dfd', '', ''),
(17, 'abcdef', '', '', 'Tunnel: Channel Promotion', '', 'INR-India Rupee', '', 'http://localhost/tunnel', '300_200', '', 12000, 'Inside', '0000-00-00 00:00:00', 1, 1, 2, '2015-07-09 10:23:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'Male', '18 - 25 year', 'Single', '', 'agcd', '', '', 0, 0, 'Agriculture', 0, 'drd', '', ''),
(18, 'aaaaaaaaaaaa', '', '', 'Website Marketing', '', 'INR-India Rupee', 'sdfdsfdsfd', 'fd fsfdsf dsfdsf f', '300_200', '', 230000, 'Outside', '0000-00-00 00:00:00', 1, 1, 2, '2015-07-10 04:17:31', '2015-07-14 06:30:00', '2015-07-23 12:00:00', 0, 9, 1, 'Male', '25 - 45 year', 'Single', '', 'afdfd', 'Social', '["Click","Tunnel"," Oneshop "]', 0, 0, 'Agriculture', 0, 'd,fdfd', '', ''),
(19, 'aaaa', '', '', 'Tunnel: Channel Promotion', '', 'ANG-Netherlands Antilles Guilder', '', 'http://localhost/tunnel', '300_200', '', 345, 'Inside', '0000-00-00 00:00:00', 0, 0, 2, '2015-07-10 04:32:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'Female', '18 - 25 year', 'Single', '', 'aaafd', '', '', 0, 0, 'Agriculture', 0, 'dfdf,dfd,hyderabad', '', ''),
(20, 'aaaadfdfsdf', '', '', 'Tunnel: Channel Promotion', '', 'ALL-Albania Lek', '', 'http://localhost/tunnel', '300_200', '', 34, 'Inside', '0000-00-00 00:00:00', 0, 0, 2, '2015-07-10 04:46:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'Male', '25 - 45 year', 'Single', '', 'aadfsd,sdfsd,fsdfdsfsdf,dsf', '', '', 0, 0, 'Agriculture', 0, 'dfff,dfdfdf,dfd,dfdf', '', ''),
(21, 'aaaa', '', '', 'Tunnel: Channel Promotion', '', 'ARS-Argentina Peso', '', 'http://localhost/tunnel', '300_200', '', 67, 'Inside', '0000-00-00 00:00:00', 0, 0, 2, '2015-07-10 04:48:54', '2015-07-10 06:30:00', '2015-07-24 12:00:00', 0, 14, 0, 'Male', '18 - 25 year', 'Single', '', 'Array', '', '', 0, 0, '', 0, 'Array', '', ''),
(22, 'new campaign awwwwwwwwwwwwwwwwwwfffff', '', '', 'Tunnel: Channel Promotion', '', 'INR-India Rupee', '', 'http://localhost/tunnel', '300_200', '', 50000, 'Inside', '0000-00-00 00:00:00', 1, 1, 2, '2015-07-31 07:35:59', '2015-07-17 06:30:00', '2015-07-22 12:00:00', 0, 5, 0, 'Female', '25 - 45 year', 'Single', '', 'Array', '', '', 0, 0, '', 0, 'Array', '', ''),
(23, 'new camp', '', '', 'Tunnel: Channel Promotion', '', 'BAM-Bosnia and Herzegovina Convert', '', 'http://localhost/tunnel', '300_200', '', 25000, 'Inside', '0000-00-00 00:00:00', 1, 1, 2, '2015-07-10 11:12:19', '2015-07-10 06:30:00', '2015-07-23 12:00:00', 0, 13, 0, 'Male', '25 - 45 year', 'Single', '', 'Array', '', '', 0, 0, '', 0, 'Array', '', ''),
(24, 'sss', '', '', 'Tunnel: Channel Promotion', '', 'ARS-Argentina Peso', '', 'http://localhost/tunnel', '300_200', '', 42000, 'Inside', '0000-00-00 00:00:00', 1, 1, 2, '2015-07-10 06:55:04', '2015-07-16 06:30:00', '2015-07-30 12:00:00', 0, 14, 0, 'Male', '25 - 45 year', 'Single', '', '["dffdsfd","fdsf","dsfds"]', '', '', 0, 0, '', 0, '["fds","fdsf","dfdsf","dsfsd"]', '', ''),
(25, 'testing', '', '', 'Oneshop: Store Promotion', '', 'DJF-Djibouti Franc', '', 'http://localhost/tunnel', '300_200', '', 1200, 'Inside', '0000-00-00 00:00:00', 1, 1, 2, '2015-08-03 11:17:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'Male', '18 - 25 year', 'Single', '', 'dfsdsfd,dsfsdf,dfsd,f,dsfds,fds', '', '', 0, 0, 'Agriculture', 0, 'fsd,fsdf,fsdfdsf,Sdier', '', ''),
(26, 'dfdfsfgfghgg ', '', '', 'Tunnel: Channel Promotion', '', 'AED-United Arab Emirates Dirham', '', 'http://localhost/tunnel', '300_200', '', 12500, 'Inside', '0000-00-00 00:00:00', 1, 1, 2, '2015-07-10 11:17:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'Male', '18 - 25 year', 'Single', '', '["ffdssd","fsd"]', '', '', 0, 0, 'Agriculture', 0, '["dsfdsfdsf"]', '', ''),
(27, 'sdfds', '', '', 'Banner Marketing', '', 'ANG-Netherlands Antilles Guilder', ' bbbb', 'ffff', '300_200', 'data/banner/2bannar2015-07-10-11-37-26.png', 120000, 'Outside', '0000-00-00 00:00:00', 0, 0, 2, '2015-07-10 06:07:51', '2015-07-10 06:30:00', '2015-07-16 12:00:00', 0, 6, 0, 'Female', '18 - 25 year', 'Single', '', '["sdf","ddsfds","fdsf","sdf"]', 'Social', '', 0, 0, 'Automotive', 0, '["dfd","fdfdsfdsfds"]', '', ''),
(29, 'aaaaaaaaa', '', '', 'Website Marketing', '', 'ALL-Albania Lek', 'fdfdsf', 'dfsdfdsf', '300_200', '', 123000, 'Outside', '0000-00-00 00:00:00', 1, 1, 2, '2015-07-15 05:02:16', '2015-07-11 06:30:00', '2015-07-22 12:00:00', 0, 0, 0, 'Male', '18 - 25 year', 'Single', '', '["Arts","SYSTEM","tadf"]', 'Social', '["Click","Tunnel"," Buzzin"," Oneshop "]', 0, 0, 'Agriculture', 0, '["india","Hyderabad"]', '', ''),
(30, 'aaaaaaaaaaaa', '', '', 'Website Marketing', '', 'AWG-Aruba Guilder', 'aaaaaaaaaaaa', 'ssssssssssssssssss', '300_200', '', 4500, 'Outside', '0000-00-00 00:00:00', 1, 1, 2, '2015-07-29 08:52:33', '2015-07-10 06:30:00', '2015-07-15 12:00:00', 0, 0, 0, 'Male', '25 - 45 year', 'Single', '', '["dfdsfds","dsfds","fsdfds"]', 'Social', '["Click","Tunnel"," Buzzin"," Oneshop "]', 0, 0, 'Agriculture', 0, '["fdsfs","sdfdsfdsfsf"]', '', ''),
(31, 'new campaignn', '', '', 'Banner Marketing', '', 'ARS-Argentina Peso', ' dffdd', 'ddddd', '300_200', 'data/banner/2bannar2015-07-10-05-24-51.png', 5000, 'Outside', '0000-00-00 00:00:00', 1, 1, 2, '2015-07-15 04:42:03', '2015-07-10 06:30:00', '2015-07-22 12:00:00', 0, 0, 0, 'Male', '18 - 25 year', 'Married', '', '["fdfdsf","dsdsff"]', 'Social', '["Click","Tunnel","Buzzin","Oneshop","Onevision"]', 0, 0, 'Agriculture', 0, '["dfd","df"]', '', ''),
(32, 'abcdf', '', '', 'Website Marketing', '', 'AOA-Angola Kwanza', 'fdfs', 'dffdf', '300_200', '', 1200, 'Outside', '0000-00-00 00:00:00', 1, 1, 2, '2015-07-15 05:00:03', '2015-07-11 06:30:00', '2015-07-22 12:00:00', 0, 0, 0, 'Female', '18 - 25 year', 'Single', '', '["dfsdfsd","fdsfsfsd"]', 'Social', '["Click","Tunnel","Buzzin","Onevision","ISNews"]', 0, 0, 'Agriculture', 0, '["sdfdsfsdf"]', '', ''),
(33, 'aaa', '', '', 'Website Marketing', '', 'AMD-Armenia Dram', 'dddddddddddd', 'dddfffffffffffffff', '300_200', '', 1000, 'Outside', '0000-00-00 00:00:00', 1, 1, 2, '2015-07-29 09:09:45', '2015-07-10 06:30:00', '2015-07-15 12:00:00', 0, 0, 0, 'Female', '25 - 45 year', 'Single', '', '["dfdsffds","dsfd","dfsdfsd"]', 'Social', '["Click","Tunnel"," Buzzin "]', 10, 0, 'Agriculture', 0, '["dsfs","dsdfsdffs"]', '{"Click":"1000","Tunnel":"1500","Buzzin":"500","Oneshop":"2000"}', ''),
(34, 'abdd', '', '', 'Tunnel: Channel Promotion', '', 'ALL-Albania Lek', '', 'http://localhost/tunnel', '300_200', '', 12000, 'Inside', '0000-00-00 00:00:00', 1, 1, 1, '2015-07-21 06:20:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'Male', '18 - 25 year', 'Single', '', '["Arts","Foot ball"]', '', '', 0, 0, 'Agriculture', 0, '["Hyderabad"]', '', ''),
(35, 'gouthami', '', '', 'Website Marketing', '', 'AUD-Australia Dollar', 'ssssssssss', 'ffffffff', '300_200', '', 350, 'Outside', '0000-00-00 00:00:00', 1, 1, 1, '2015-07-27 11:39:06', '2015-07-21 06:30:00', '2015-07-29 12:00:00', 0, 8, 0, 'Male', '18 - 25 year', 'Single', '', '["Foot ball","Arts","SYSTEM"]', 'Social', '["Click","Tunnel","Buzzin"]', 0, 0, 'Agriculture', 0, '["Indiana","India"]', '', ''),
(36, 'aadd', '', '', 'Tunnel: Channel Promotion', '', 'ANG-Netherlands Antilles Guilder', '', 'http://localhost/tunnel', '300_200', '', 2000, 'Inside', '0000-00-00 00:00:00', 1, 1, 1, '2015-07-27 13:42:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'Male', '18 - 25 year', 'Single', '', '["sss","Foot ball","SYSTEM"]', '', '[]', 0, 0, 'Agriculture', 0, '["Hyderabad"]', '', ''),
(38, '', '', '', 'Website Marketing', '', 'INR-India Rupee', 'aaadfd', 'dfdfdf', '300_200', '', 400, 'Outside', '0000-00-00 00:00:00', 0, 0, 1, '2015-07-22 09:27:10', '2015-07-22 06:30:00', '2015-07-31 12:00:00', 0, 9, 0, 'Male', '18 - 25 year', 'Single', '', '["Foot ball","Arts"]', 'social', '', 0, 0, 'Agriculture', 0, '["India","Indiana","Hyderabad"]', '', ''),
(39, 'new camp', '', '', 'Website Marketing', '', 'ANG-Netherlands Antilles Guilder', 'sddff', 'fffffddd', '300_200', '', 500, 'Outside', '0000-00-00 00:00:00', 1, 1, 1, '2015-07-27 11:41:25', '2015-07-22 06:30:00', '2015-07-31 12:00:00', 0, 9, 0, 'Male', '25 - 45 year', 'Single', '', '["Foot ball","Arts"]', 'social', '', 0, 0, 'Agriculture', 0, '["Hyderabad","India"]', '', ''),
(41, 'abcee', '', '', 'Oneshop: Store Promotion', '', 'ALL-Albania Lek', '', 'http://localhost/oneshop', '300_200', '', 500, 'Inside', '0000-00-00 00:00:00', 1, 1, 1, '2015-07-23 07:36:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'Male', '25 - 45 year', 'Single', '', '["Foot ball","Arts"]', '', '', 0, 0, 'Agriculture', 0, '["India","Sri Lanka"]', '', ''),
(42, 'aaa', '', '', 'Website Marketing', '', 'ALL-Albania Lek', 'dfds', 'fsd', '300_200', '', 500, 'Outside', '0000-00-00 00:00:00', 1, 1, 1, '2015-07-27 11:35:51', '2015-07-29 06:30:00', '2015-07-31 12:00:00', 0, 2, 0, 'Female', '25 - 45 year', 'Single', '', '["Foot ball"]', '', '["Click","Tunnel","Buzzin"]', 0, 0, 'Agriculture', 0, '["Indiana"]', '', ''),
(44, 'aaa', '', '', 'Website Marketing', '', 'AED-United Arab Emirates Dirham', 'dsfsf', 'dsfs', '300_200', '', 5000, 'Outside', '0000-00-00 00:00:00', 1, 1, 1, '2015-07-27 11:37:34', '2015-07-23 06:30:00', '2015-07-29 12:00:00', 0, 6, 0, 'Male', '18 - 25 year', 'Single', '', '["Foot ball"]', '', '["Click","Tunnel","Buzzin"]', 0, 0, 'Agriculture', 0, '[""]', '', ''),
(45, 'aaa', '', '', 'Website Marketing', '', 'AED-United Arab Emirates Dirham', 'dsf', 'sdsf', '300_200', '', 500, 'Outside', '0000-00-00 00:00:00', 1, 1, 1, '2015-07-27 11:47:35', '2015-07-24 06:30:00', '2015-07-27 12:00:00', 0, 3, 0, 'Male', '25 - 45 year', 'Single', '', '[""]', '', '["Click","Tunnel","Buzzin"]', 0, 0, 'Agriculture', 0, '[""]', '', ''),
(46, 'aed', 'dfdsfdsfdsfsd', 'dfdsf', 'Banner Marketing', '618*222px', 'AFN-Afghanistan Afghani', '', '', '300_200', 'Community-Workshop-Banner-618x222.jpg', 500, 'Outside', '0000-00-00 00:00:00', 1, 1, 2, '2015-07-29 09:53:30', '2015-07-23 06:30:00', '2015-07-29 12:00:00', 0, 6, 0, 'Female', '18 - 25 year', 'Single', '', '["Foot ball","Arts"]', '', '["Click","Tunnel","Buzzin"]', 0, 0, 'Agriculture', 0, '["India","Indianapolis"]', '{"Click":"375","Tunnel":"250","Buzzin":"500","Oneshop":"125"}', 'null'),
(47, 'aede', 'fsdfsdf', 'dfsfds', 'Email Marketing', '', 'AMD-Armenia Dram', '', '', '300_200', '', 50, 'Outside', '0000-00-00 00:00:00', 0, 0, 1, '2015-07-29 04:13:25', '2015-07-23 06:30:00', '2015-07-24 12:00:00', 0, 1, 0, 'Male', '18 - 25 year', 'Single', '', '["Foot ball","Arts"]', '', '["Click","Tunnel","Buzzin","Oneshop"]', 0, 0, 'Agriculture', 0, '["India","Indonesia"]', '{"Click":"375","Tunnel":"250","Buzzin":"500","Oneshop":"125"}', '{"Click":"375","Tunnel":"250","Buzzin":"500","Oneshop":"125"}'),
(48, 'india', 'dsfdf', 'sdfsf', 'Email Marketing', '', 'INR-India Rupee', '', '', '300_200', '', 500, 'Outside', '0000-00-00 00:00:00', 1, 1, 1, '2015-07-29 04:13:37', '2015-07-23 06:30:00', '2015-07-30 12:00:00', 0, 7, 0, 'Male', '18 - 25 year', 'Single', '', '["Foot ball"]', 'professional', '["Netpro","Cvbank","CorporateOffice"]', 0, 0, 'Agriculture', 0, '["India","Indaiatuba"]', '{"Netpro":"3750","Cvbank":"2500","CorporateOffice":"3750"}', '{"Netpro":"3750","Cvbank":"2500","CorporateOffice":"3750"}'),
(49, 'new website', '', '', 'Banner Marketing', '250*200px', 'INR-India Rupee', 'fdsfdff', 'fffddd', '300_200', 'suriya.jpg', 250, 'Outside', '0000-00-00 00:00:00', 1, 1, 1, '2015-07-30 13:02:04', '2015-07-27 06:40:05', '2015-07-31 12:00:00', 0, 4, 0, 'Female', '25 - 45 year', 'Married', '', '["Foot ball","Arts"]', 'social', '["Click","Tunnel","Buzzin"]', 180, 45, 'Agriculture', 0, '["Hyderabad","Hyderabad Lines"]', '{"Click":"80","Tunnel":"40","Buzzin":"60"}', '{"Click":"1500","Tunnel":"1625","Buzzin":"3125"}'),
(50, 'test', '', '', 'Website Marketing', '', 'AMD-Armenia Dram', 'dsfds', 'fdsfs', '300_200', '', 500, 'Outside', '0000-00-00 00:00:00', 1, 1, 1, '2015-07-29 04:14:02', '2015-07-23 06:30:00', '2015-07-28 12:00:00', 0, 5, 0, 'Male', '18 - 25 year', 'Single', '', '["Foot ball","Arts"]', 'social', '["Click","Tunnel","Buzzin"]', 12500, 0, 'Agriculture', 0, '["India","Indonesia"]', '{"Click":"6250","Tunnel":"3125","Buzzin":"3125"}', '{"Click":"6250","Tunnel":"3125","Buzzin":"3125"}'),
(51, 'proceed', '', '', 'Banner Marketing', '250*200px', 'AED-United Arab Emirates Dirham', 'fdg', 'fgdg', '300_200', 'paulwalker-1391702379.jpg', 200, 'Outside', '0000-00-00 00:00:00', 1, 1, 1, '2015-07-28 06:53:36', '2015-07-23 06:30:00', '2015-07-29 12:00:00', 0, 6, 0, 'Male', '18 - 25 year', 'Single', '', '["Arts","Foot ball"]', 'social', '', 0, 0, 'Agriculture', 0, '["Hyderabad","Hyderabad Lines"]', '', ''),
(52, 'ssdd', '', '', 'Website Marketing', '', 'AMD-Armenia Dram', 'fdfd', 'fdsf', '300_200', '', 50, 'Outside', '0000-00-00 00:00:00', 0, 0, 1, '2015-07-29 04:14:13', '2015-07-23 06:30:00', '2015-07-29 12:00:00', 0, 6, 0, 'Male', '18 - 25 year', 'Single', '', '["Foot ball","Arts"]', 'social', '["Click","Tunnel","Buzzin"]', 1250, 0, 'Agriculture', 0, '["Indaiabira","India","Inazawa"]', '{"Click":"625","Tunnel":"375","Buzzin":"250"}', '{"Click":"625","Tunnel":"375","Buzzin":"250"}'),
(53, 'test banner', '', '', 'Banner Marketing', '250*200px', 'AFN-Afghanistan Afghani', ' fff', 'ddddff', '300_200', '1kajal-birthday2015-07-23-12-43-35.jpg', 550, 'Outside', '0000-00-00 00:00:00', 1, 1, 1, '2015-08-03 05:34:39', '2015-07-23 06:30:00', '2015-08-03 12:00:00', 0, 6, 0, 'Male', '18 - 25 year', 'Single', '', '["Foot ball","games"]', 'social', '["Click","Tunnel","Buzzin"]', 13750, 0, 'Agriculture', 0, '["Hyderabad"]', '{"Click":"6875","Tunnel":"2750","Buzzin":"4125"}', '{"Click":"6875","Tunnel":"2750","Buzzin":"4125"}'),
(54, 'aaa', '', '', 'Banner Marketing', '250*200px', 'ANG-Netherlands Antilles Guilder', ' dfd', 'dfdfd', '300_200', 'kajal-birthday.jpg', 500, 'Outside', '0000-00-00 00:00:00', 1, 1, 1, '2015-08-03 05:31:57', '2015-07-23 06:30:00', '2015-08-03 12:00:00', 0, 6, 0, 'Male', '25 - 45 year', 'Single', '', '["Arts","Foot ball"]', 'social', '["Click","Tunnel","Buzzin"]', 12500, 0, 'Agriculture', 0, '["India"]', '{"Click":"6250","Tunnel":"2500","Buzzin":"3750"}', '{"Click":"6250","Tunnel":"2500","Buzzin":"3750"}'),
(55, 'dtd', '', '', 'Banner Marketing', '618*222px', 'INR-India Rupee', ' vbvb', 'vbvb', '300_200', 'Community-Workshop-Banner-618x222.jpg', 500, 'Outside', '0000-00-00 00:00:00', 1, 1, 1, '2015-07-29 04:14:42', '2015-07-23 06:30:00', '2015-07-29 12:00:00', 0, 6, 0, 'Male', '18 - 25 year', 'Single', '', '["dfdf","Foot ball"]', 'social', '["Click","Buzzin","Oneshop"]', 12500, 0, 'Agriculture', 0, '["Hyderabad"]', '{"Click":"6250","Buzzin":"2500","Oneshop":"3750"}', '{"Click":"6250","Buzzin":"2500","Oneshop":"3750"}'),
(56, 'new campaign', '', '', 'Banner Marketing', '618*222px', 'INR-India Rupee', 'banner marketing', 'www.banner.com', '300_200', 'shop.jpg', 200, 'Outside', '0000-00-00 00:00:00', 1, 1, 2, '2015-07-29 04:14:50', '2015-07-23 06:30:00', '2015-07-30 12:00:00', 0, 7, 0, 'Male', '18 - 25 year', 'Single', '', '["Foot ball","Arts"]', 'social', '["Click","Tunnel","Buzzin","Oneshop"]', 5000, 0, 'Agriculture', 0, '["India","Hyderabad"]', '{"Click":"1000","Tunnel":"1500","Buzzin":"500","Oneshop":"2000"}', '{"Click":"1000","Tunnel":"1500","Buzzin":"500","Oneshop":"2000"}'),
(57, 'dfe', '', '', 'Website Marketing', '', 'ANG-Netherlands Antilles Guilder', 'df', 'df', '300_200', '', 5000, 'Outside', '0000-00-00 00:00:00', 1, 1, 1, '2015-07-29 04:13:13', '2015-07-27 06:30:00', '2015-07-31 12:00:00', 0, 4, 0, 'Male', '18 - 25 year', 'Single', '', '["Foot ball","Arts"]', 'social', '["Click","Tunnel","Buzzin"]', 125000, 0, 'Agriculture', 0, '["Hyderabad"]', '{"Click":"62500","Tunnel":"31250","Buzzin":"31250"}', '{"Click":"62500","Tunnel":"31250","Buzzin":"31250"}'),
(58, 'aswd', '', '', 'Tunnel: Channel Promotion', '', 'ARS-Argentina Peso', '', 'http://localhost/tunnel', '300_200', '', 5000, 'Inside', '0000-00-00 00:00:00', 1, 1, 1, '2015-07-30 11:08:28', '2015-07-26 18:30:00', '2015-07-31 00:00:00', 0, 3, 0, 'Female', '25 - 45 year', 'Single', '', '["Foot ball","Arts"]', '', '', 180, 60, 'Agriculture', 0, '["Indonesia","Hyderabad"]', '', ''),
(59, 'asdfd', '', '', 'Banner Marketing', '', 'ANG-Netherlands Antilles Guilder', '', '', '300_200', '', 1000, 'Outside', '0000-00-00 00:00:00', 0, 0, 0, '2015-07-30 11:21:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 3, 0, 'Male', '18 - 25 year', 'Single', '', '', '', '', 0, 0, 'Agriculture', 0, '', '', ''),
(60, 'dfd', '', '', 'Website Marketing', '', 'AFN-Afghanistan Afghani', 'dfd', 'df', '300_200', '', 420, 'Outside', '0000-00-00 00:00:00', 0, 0, 1, '2015-07-30 12:58:23', '2015-07-30 06:30:00', '2015-08-29 12:00:00', 0, 30, 0, 'Male', '18 - 25 year', 'Single', '', '["Foot ball"]', 'social', '["Click","Tunnel","Buzzin"]', 10500, 0, 'Agriculture', 0, '[""]', '', '{"Click":"5250","Tunnel":"2625","Buzzin":"2625"}'),
(61, 'aaaa', '', '', 'Banner Marketing', '', 'AFN-Afghanistan Afghani', '', '', '300_200', '', 80, 'Outside', '0000-00-00 00:00:00', 0, 0, 0, '2015-07-31 04:27:57', '2015-07-31 04:27:57', '2016-01-27 09:57:57', 0, 180, 0, 'Male', '18 - 25 year', 'Single', '', '', '', '', 0, 0, 'Agriculture', 0, '', '', ''),
(62, 'fdfd', '', '', 'Banner Marketing', '', 'ALL-Albania Lek', '', '', '300_200', '', 60, 'Outside', '0000-00-00 00:00:00', 0, 0, 0, '2015-07-31 04:29:35', '2015-07-31 04:29:35', '2015-10-29 09:59:35', 0, 90, 0, 'Male', '18 - 25 year', 'Single', '', '', '', '', 0, 0, 'Agriculture', 0, '', '', ''),
(63, 'aadd', '', '', 'Banner Marketing', '', 'AED-United Arab Emirates Dirham', '', '', '300_200', '', 100, 'Outside', '0000-00-00 00:00:00', 0, 0, 0, '2015-08-03 04:39:56', '2015-08-03 04:39:56', '2015-09-02 10:09:56', 0, 30, 0, 'Male', '18 - 25 year', 'Single', '', '', '', '', 0, 0, 'Agriculture', 0, '', '', ''),
(64, 'dfdf', '', '', 'Banner Marketing', '', 'ALL-Albania Lek', '', '', '300_200', '', 12500, 'Outside', '0000-00-00 00:00:00', 0, 0, 0, '2015-08-03 06:20:08', '2015-08-03 06:20:08', '2015-09-02 11:50:08', 0, 30, 0, 'Male', '18 - 25 year', 'Single', '', '', '', '', 0, 0, 'Agriculture', 0, '', '', ''),
(65, 'one liner', '', '', 'Banner Marketing', '', 'ALL-Albania Lek', '', '', '300_200', '', 60, 'Outside', '0000-00-00 00:00:00', 0, 0, 0, '2015-08-03 06:52:05', '2015-08-03 06:52:05', '2015-11-01 12:22:05', 0, 90, 0, 'Male', '18 - 25 year', 'Single', '', '', '', '', 0, 0, 'Agriculture', 0, '', '', ''),
(66, 'one liner', '', '', 'Banner Marketing', '', 'ALL-Albania Lek', '', '', '300_200', '', 60, 'Outside', '0000-00-00 00:00:00', 0, 0, 0, '2015-08-03 06:52:20', '2015-08-03 06:52:20', '2015-11-01 12:22:20', 0, 90, 0, 'Male', '18 - 25 year', 'Single', '', '', '', '', 0, 0, 'Agriculture', 0, '', '', ''),
(67, 'ssdd', '', '', 'Banner Marketing', '', 'ALL-Albania Lek', '', '', '300_200', '', 200, 'Outside', '0000-00-00 00:00:00', 0, 0, 0, '2015-08-03 06:55:55', '2015-08-03 06:55:55', '2015-09-02 12:25:55', 0, 30, 0, 'Male', '18 - 25 year', 'Single', '', '', '', '', 0, 0, 'Agriculture', 0, '', '', ''),
(68, 'rrtr', '', '', 'Banner Marketing', '', 'AFN-Afghanistan Afghani', '', '', '300_200', '', 6000, 'Outside', '0000-00-00 00:00:00', 0, 0, 0, '2015-08-03 06:57:32', '2015-08-03 06:57:32', '2015-09-02 12:27:32', 0, 30, 0, 'Male', '18 - 25 year', 'Single', '', '', '', '', 0, 0, 'Agriculture', 0, '', '', ''),
(69, 'ffss', '', '', 'Banner Marketing', '', 'AFN-Afghanistan Afghani', '', '', '300_200', '', 200, 'Outside', '0000-00-00 00:00:00', 0, 0, 0, '2015-08-03 07:02:31', '2015-08-03 07:02:31', '2015-09-02 12:32:31', 0, 30, 0, 'Male', '18 - 25 year', 'Single', '', '', '', '', 0, 0, 'Agriculture', 0, '', '', ''),
(70, 'fd', '', '', 'Banner Marketing', '', 'ALL-Albania Lek', '', '', '300_200', '', 1200, 'Outside', '0000-00-00 00:00:00', 0, 0, 0, '2015-08-03 07:04:30', '2015-08-03 07:04:30', '2015-09-02 12:34:30', 0, 30, 0, 'Male', '18 - 25 year', 'Single', '', '', '', '', 0, 0, 'Agriculture', 0, '', '', ''),
(71, 'ttt', '', '', 'Banner Marketing', '', 'ALL-Albania Lek', '', '', '300_200', '', 300, 'Outside', '0000-00-00 00:00:00', 0, 0, 0, '2015-08-03 07:05:45', '2015-08-03 07:05:45', '2015-09-02 12:35:45', 0, 30, 0, 'Male', '18 - 25 year', 'Single', '', '', '', '', 0, 0, 'Agriculture', 0, '', '', ''),
(72, 'fdf', '', '', 'Banner Marketing', '', 'AMD-Armenia Dram', '', '', '300_200', '', 100, 'Outside', '0000-00-00 00:00:00', 0, 0, 0, '2015-08-03 07:10:13', '2015-08-03 07:10:13', '2015-09-02 12:40:13', 0, 30, 0, 'Male', '18 - 25 year', 'Single', '', '', '', '', 0, 0, 'Agriculture', 0, '', '', ''),
(73, 'df', '', '', 'Banner Marketing', '', 'ALL-Albania Lek', '', '', '300_200', '', 650, 'Outside', '0000-00-00 00:00:00', 0, 0, 0, '2015-08-03 07:28:30', '2015-08-03 07:28:30', '2015-09-02 12:58:30', 0, 30, 0, 'Male', '18 - 25 year', 'Single', '', '', '', '', 0, 0, 'Agriculture', 0, '', '', ''),
(74, 'ff', '', '', 'Banner Marketing', '', 'AFN-Afghanistan Afghani', '', '', '300_200', '', 250, 'Outside', '0000-00-00 00:00:00', 0, 0, 0, '2015-08-03 07:30:21', '2015-08-03 07:30:21', '2015-09-02 13:00:21', 0, 30, 0, 'Male', '18 - 25 year', 'Single', '', '', '', '', 0, 0, 'Agriculture', 0, '', '', ''),
(75, 'drr', '', '', 'Banner Marketing', '', 'ALL-Albania Lek', '', '', '300_200', '', 250, 'Outside', '0000-00-00 00:00:00', 0, 0, 0, '2015-08-03 07:32:00', '2015-08-03 07:32:00', '2015-09-02 13:02:00', 0, 30, 0, 'Male', '18 - 25 year', 'Single', '', '', '', '', 0, 0, 'Agriculture', 0, '', '', ''),
(76, 'df', '', '', 'Banner Marketing', '', 'AFN-Afghanistan Afghani', '', '', '300_200', '', 50, 'Outside', '0000-00-00 00:00:00', 0, 0, 0, '2015-08-03 11:30:13', '2015-08-03 11:30:13', '2015-11-01 17:00:13', 0, 90, 0, 'Male', '18 - 25 year', 'Single', '', '', '', '', 0, 0, 'Agriculture', 0, '', '', ''),
(77, 'df', '', '', 'Banner Marketing', '', 'AFN-Afghanistan Afghani', '', '', '300_200', '', 50, 'Outside', '0000-00-00 00:00:00', 0, 0, 0, '2015-08-03 11:30:20', '2015-08-03 11:30:20', '2015-11-01 17:00:20', 0, 90, 0, 'Male', '18 - 25 year', 'Single', '', '', '', '', 0, 0, 'Agriculture', 0, '', '', ''),
(78, 'dfdf', '', '', 'Banner Marketing', '', 'AMD-Armenia Dram', '', '', '300_200', '', 70, 'Outside', '0000-00-00 00:00:00', 0, 0, 0, '2015-08-03 11:32:23', '2015-08-03 11:32:23', '2016-01-30 17:02:23', 0, 180, 0, 'Male', '18 - 25 year', 'Single', '', '', '', '', 0, 0, 'Agriculture', 0, '', '', ''),
(79, 'asidebox', '', '', 'Banner Marketing', '', 'KES-Kenya Shilling', '', '', '300_200', '', 60, 'Outside', '0000-00-00 00:00:00', 0, 0, 0, '2015-08-04 04:00:16', '2015-08-04 04:00:16', '2015-11-02 09:30:16', 0, 90, 0, 'Male', '18 - 25 year', 'Single', '', '', '', '', 0, 0, 'Agriculture', 0, '', '', ''),
(80, 'asidebox', '', '', 'Banner Marketing', '', 'KES-Kenya Shilling', '', '', '300_200', '', 60, 'Outside', '0000-00-00 00:00:00', 0, 0, 0, '2015-08-04 04:00:32', '2015-08-04 04:00:32', '2015-11-02 09:30:32', 0, 90, 0, 'Male', '18 - 25 year', 'Single', '', '', '', '', 0, 0, 'Agriculture', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `on_campaign_roi`
--

CREATE TABLE IF NOT EXISTS `on_campaign_roi` (
  `campaign_id_fk` int(11) NOT NULL,
  `total_reach` int(11) NOT NULL,
  `total_module_wise_reach` text NOT NULL,
  `actual_module_wise_reach` text NOT NULL,
  `not_interested_count` int(11) NOT NULL,
  `irrevalent_count` int(11) NOT NULL,
  `repetitive_count` int(11) NOT NULL,
  `male_reach` int(8) NOT NULL,
  `female_reach` int(8) NOT NULL,
  `country_wise_reach` text NOT NULL,
  `city_wise_reach` text NOT NULL,
  `age_wise_reach` text NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `interest` text NOT NULL,
  `last_update_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `on_campaign_roi`
--

INSERT INTO `on_campaign_roi` (`campaign_id_fk`, `total_reach`, `total_module_wise_reach`, `actual_module_wise_reach`, `not_interested_count`, `irrevalent_count`, `repetitive_count`, `male_reach`, `female_reach`, `country_wise_reach`, `city_wise_reach`, `age_wise_reach`, `marital_status`, `interest`, `last_update_on`) VALUES
(1, 0, '', '', 0, 0, 0, 0, 0, '', '', '', '', '', '2015-07-27 13:53:12'),
(2, 0, '', '', 0, 0, 0, 0, 0, '', '', '', '', '', '2015-07-27 12:46:58'),
(3, 0, '', '', 0, 0, 0, 0, 0, '', '', '', '', '', '2015-05-21 11:59:13'),
(4, 300000, '{"Buzzin":"500","Tunnel":"200"}', '{"Buzzin":"100","Tunnel":"20"}', 9, 10, 8, 9, 12, '{"GEO":"50","IND":"60","KWT":"10","KOR":"20"}', '{"937":"20","164827":"10","120620":"15","120886":"15","126":"10","149":"20","278":"20","599":"10","1053":"10","24":"20"}', '{"45 - 65 year":"10","18-25 year":"20","25-45 year":"12","65+ year":"5"}', '{"Single":"25","Married":"30"}', '{"Football":"20","Books":"25","Movies":"20"}', '2015-07-28 04:08:52'),
(17, 500000, '{"Click":"500","Tunnel":"200"}', '{"Click":"100","Tunnel":"300"}', 5, 6, 8, 9, 12, '{"GEO":"50","IND":"60","KWT":"10","KOR":"20"}', '', '', '', '', '2015-07-15 06:32:35'),
(18, 300000, '{"Buzzin":"500","Tunnel":"200"}', '{"Buzzin":"100","Tunnel":"20"}', 5, 6, 8, 9, 12, '', '', '', '', '', '2015-07-09 11:52:44'),
(22, 500000, '{"Click":"500","Tunnel":"200"}', '{"Click":"100","Tunnel":"20"}', 5, 6, 8, 9, 12, '', '', '', '', '', '2015-07-10 11:43:29'),
(23, 500000, '{"Click":"500","Tunnel":"200"}', '{"Click":"100","Tunnel":"20"}', 5, 6, 8, 9, 12, '', '', '', '', '', '2015-07-10 11:43:29'),
(24, 500000, '{"Click":"500","Tunnel":"200"}', '{"Click":"100","Tunnel":"20"}', 5, 6, 8, 9, 12, '', '', '', '', '', '2015-07-10 11:43:29'),
(26, 500000, '{"Click":"500","Tunnel":"200"}', '{"Click":"100","Tunnel":"20"}', 5, 6, 8, 9, 12, '', '', '', '', '', '2015-07-10 11:45:37'),
(29, 0, '', '', 0, 0, 0, 0, 0, '', '', '', '', '', '2015-07-15 05:02:16'),
(30, 0, '', '', 0, 0, 0, 0, 0, '', '', '', '', '', '2015-07-29 08:52:33'),
(32, 0, '', '', 0, 0, 0, 0, 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(33, 0, '', '', 0, 0, 0, 0, 0, '', '', '', '', '', '2015-07-29 08:58:35'),
(34, 0, '', '', 0, 0, 0, 0, 0, '', '', '', '', '', '2015-07-21 06:20:45'),
(35, 0, '', '', 0, 0, 0, 0, 0, '', '', '', '', '', '2015-07-27 11:39:06'),
(36, 0, '', '', 0, 0, 0, 0, 0, '', '', '', '', '', '2015-07-27 13:42:12'),
(39, 0, '', '', 0, 0, 0, 0, 0, '', '', '', '', '', '2015-07-27 11:41:25'),
(41, 0, '', '', 0, 0, 0, 0, 0, '', '', '', '', '', '2015-07-23 07:36:02'),
(42, 0, '', '', 0, 0, 0, 0, 0, '', '', '', '', '', '2015-07-27 11:35:51'),
(44, 0, '', '', 0, 0, 0, 0, 0, '', '', '', '', '', '2015-07-27 11:37:34'),
(45, 0, '', '', 0, 0, 0, 0, 0, '', '', '', '', '', '2015-07-27 11:47:35'),
(46, 500, '{"Click":"1500","Tunnel":"1625","Buzzin":"3125"}', '{"Buzzin":"100","Tunnel":"20"}', 1, 6, 1, 0, 5, '{"GEO":"50","IND":"60","KWT":"10","KOR":"20"}', '', '{"45 - 65 year":"10","18-25 year":"20","25-45 year":"12","65+ year":"5"}', '{"Single":"25","Married":"30"}', '{"Football":"20","Books":"25","Movies":"20"}', '2015-07-31 13:03:33'),
(48, 0, '', '', 0, 0, 0, 0, 0, '', '', '', '', '', '2015-07-27 13:19:37'),
(49, 50, '{"Click":"1500","Tunnel":"1625","Buzzin":"3125"}', '', 12, 3, 2, 10, 10, '{"GEO":"50","IND":"60","KWT":"10","KOR":"20"}', '', '{"45 - 65 year":"10","18-25 year":"20","25-45 year":"12","65+ year":"5"}', '{"Single":"25","Married":"30"}', '{"Football":"20","Books":"25","Movies":"20"}', '2015-07-29 11:19:20'),
(50, 0, '', '', 0, 0, 0, 0, 0, '', '', '', '', '', '2015-07-27 12:39:03'),
(51, 0, '', '', 1, 0, 0, 0, 0, '', '', '', '', '', '2015-07-28 05:56:17'),
(53, 13750, '{"Click":"6875","Tunnel":"2750","Buzzin":"4125"}', '{"Click":"6875","Tunnel":"2750","Buzzin":"4125"}', 0, 1, 0, 0, 1, '', '', '', '', '', '2015-07-29 13:19:26'),
(54, 0, '', '', 0, 0, 0, 0, 0, '', '', '', '', '', '2015-07-27 11:58:49'),
(55, 0, '', '', 1, 1, 5, 0, 1, '', '', '', '', '', '2015-07-29 12:27:03'),
(56, 0, '', '', 17, 7, 3, 0, 0, '', '', '', '', '', '2015-07-29 12:28:41'),
(57, 0, '', '', 0, 0, 0, 0, 0, '', '', '', '', '', '2015-07-27 13:30:14'),
(58, 0, '', '', 0, 0, 0, 0, 0, '', '', '', '', '', '2015-07-28 12:18:13');

-- --------------------------------------------------------

--
-- Table structure for table `on_campaign_targets`
--

CREATE TABLE IF NOT EXISTS `on_campaign_targets` (
  `campaign_id_fk` int(11) NOT NULL,
  `user_id_fk` int(11) NOT NULL,
  `date` date NOT NULL,
  `module` varchar(100) NOT NULL,
  `seen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `on_campaign_targets`
--

INSERT INTO `on_campaign_targets` (`campaign_id_fk`, `user_id_fk`, `date`, `module`, `seen`) VALUES
(46, 1, '2015-08-03', 'Tunnel', 1),
(46, 2, '2015-08-03', 'Tunnel', 1),
(46, 1, '2015-08-03', 'Buzzin', 1),
(46, 2, '2015-08-03', 'Buzzin', 1),
(46, 10, '2015-08-03', 'Buzzin', 0),
(46, 2, '2015-08-03', 'Oneshop', 1),
(46, 1, '2015-08-03', 'Oneshop', 1),
(46, 1, '2015-08-03', 'Oneshop', 1),
(46, 1, '2015-08-03', 'Tunnel', 1),
(46, 2, '2015-08-03', 'Tunnel', 1),
(46, 1, '2015-08-03', 'Buzzin', 1),
(46, 2, '2015-08-03', 'Buzzin', 1),
(46, 10, '2015-08-03', 'Buzzin', 0),
(46, 2, '2015-08-03', 'Oneshop', 1),
(46, 1, '2015-08-03', 'Oneshop', 1),
(46, 1, '2015-08-03', 'Oneshop', 1),
(58, 1, '2015-07-25', '', 0),
(33, 1, '2015-07-25', 'Tunnel', 0),
(33, 2, '2015-07-27', 'Tunnel', 0),
(33, 1, '2015-07-25', 'Buzzin', 0),
(33, 2, '2015-07-27', 'Buzzin', 0),
(33, 10, '2015-07-20', 'Buzzin', 0),
(33, 2, '2015-07-27', 'Oneshop', 0),
(33, 1, '2015-07-25', 'Oneshop', 0),
(33, 1, '2015-07-25', 'Oneshop', 0),
(33, 1, '2015-07-25', 'Tunnel', 0),
(33, 2, '2015-07-27', 'Tunnel', 0),
(33, 1, '2015-07-25', 'Buzzin', 0),
(33, 2, '2015-07-27', 'Buzzin', 0),
(33, 10, '2015-07-20', 'Buzzin', 0),
(33, 2, '2015-07-27', 'Oneshop', 0),
(33, 1, '2015-07-25', 'Oneshop', 0),
(33, 1, '2015-07-25', 'Oneshop', 0),
(53, 2, '2015-08-03', 'Oneshop', 0),
(53, 4, '2015-08-03', 'Buzzin', 0),
(53, 5, '2015-08-03', 'Buzzin', 0),
(53, 6, '2015-08-03', 'Tunnel', 0),
(53, 5, '2015-08-03', 'Tunnel', 0),
(53, 8, '2015-08-03', 'Tunnel', 0),
(53, 9, '2015-08-03', 'Tunnel', 0),
(58, 1, '2015-07-27', '', 0),
(58, 6, '2015-07-27', '', 0),
(58, 8, '2015-07-27', '', 0),
(58, 12, '2015-07-27', '', 0),
(58, 17, '2015-07-27', '', 0),
(58, 27, '2015-07-27', '', 0),
(58, 32, '2015-07-27', '', 0),
(58, 37, '2015-07-27', '', 0),
(58, 42, '2015-07-27', '', 0),
(58, 47, '2015-07-27', '', 0),
(58, 2, '2015-07-27', '', 0),
(58, 9, '2015-07-27', '', 0),
(58, 13, '2015-07-27', '', 0),
(58, 18, '2015-07-27', '', 0),
(58, 23, '2015-07-27', '', 0),
(58, 28, '2015-07-27', '', 0),
(58, 33, '2015-07-27', '', 0),
(58, 38, '2015-07-27', '', 0),
(58, 48, '2015-07-27', '', 0),
(58, 3, '2015-07-27', '', 0),
(58, 7, '2015-07-27', '', 0),
(58, 14, '2015-07-27', '', 0),
(58, 19, '2015-07-27', '', 0),
(58, 24, '2015-07-27', '', 0),
(58, 34, '2015-07-27', '', 0),
(58, 39, '2015-07-27', '', 0),
(58, 44, '2015-07-27', '', 0),
(58, 49, '2015-07-27', '', 0),
(58, 4, '2015-07-27', '', 0),
(58, 15, '2015-07-27', '', 0),
(58, 20, '2015-07-27', '', 0),
(58, 25, '2015-07-27', '', 0),
(58, 30, '2015-07-27', '', 0),
(58, 35, '2015-07-27', '', 0),
(58, 40, '2015-07-27', '', 0),
(58, 45, '2015-07-27', '', 0),
(58, 50, '2015-07-27', '', 0),
(58, 5, '2015-07-27', '', 0),
(58, 11, '2015-07-27', '', 0),
(58, 16, '2015-07-27', '', 0),
(58, 21, '2015-07-27', '', 0),
(58, 26, '2015-07-27', '', 0),
(58, 36, '2015-07-27', '', 0),
(58, 46, '2015-07-27', '', 0),
(58, 111, '2015-07-27', '', 0),
(58, 112, '2015-07-27', '', 0),
(58, 113, '2015-07-27', '', 0),
(58, 114, '2015-07-27', '', 0),
(58, 115, '2015-07-27', '', 0),
(58, 116, '2015-07-27', '', 0),
(58, 117, '2015-07-27', '', 0),
(58, 118, '2015-07-27', '', 0),
(58, 119, '2015-07-27', '', 0),
(58, 120, '2015-07-27', '', 0),
(58, 151, '2015-07-27', '', 0),
(58, 153, '2015-07-27', '', 0),
(58, 154, '2015-07-27', '', 0),
(58, 155, '2015-07-27', '', 0),
(58, 156, '2015-07-27', '', 0),
(58, 157, '2015-07-27', '', 0),
(58, 158, '2015-07-28', '', 0),
(58, 159, '2015-07-28', '', 0),
(58, 160, '2015-07-28', '', 0),
(58, 161, '2015-07-28', '', 0),
(58, 163, '2015-07-28', '', 0),
(58, 164, '2015-07-28', '', 0),
(58, 165, '2015-07-28', '', 0),
(58, 166, '2015-07-28', '', 0),
(58, 167, '2015-07-28', '', 0),
(58, 168, '2015-07-28', '', 0),
(58, 169, '2015-07-28', '', 0),
(58, 170, '2015-07-28', '', 0),
(58, 172, '2015-07-28', '', 0),
(58, 173, '2015-07-28', '', 0),
(58, 174, '2015-07-28', '', 0),
(58, 175, '2015-07-28', '', 0),
(58, 176, '2015-07-28', '', 0),
(58, 177, '2015-07-28', '', 0),
(58, 178, '2015-07-28', '', 0),
(58, 179, '2015-07-28', '', 0),
(58, 180, '2015-07-28', '', 0),
(58, 182, '2015-07-28', '', 0),
(58, 183, '2015-07-28', '', 0),
(58, 184, '2015-07-28', '', 0),
(58, 185, '2015-07-28', '', 0),
(58, 186, '2015-07-28', '', 0),
(58, 187, '2015-07-28', '', 0),
(58, 188, '2015-07-28', '', 0),
(58, 189, '2015-07-28', '', 0),
(58, 190, '2015-07-28', '', 0),
(58, 191, '2015-07-28', '', 0),
(58, 192, '2015-07-28', '', 0),
(58, 193, '2015-07-28', '', 0),
(58, 194, '2015-07-28', '', 0),
(58, 195, '2015-07-28', '', 0),
(58, 196, '2015-07-28', '', 0),
(58, 197, '2015-07-28', '', 0),
(58, 199, '2015-07-28', '', 0),
(58, 200, '2015-07-28', '', 0),
(58, 101, '2015-07-28', '', 0),
(58, 102, '2015-07-28', '', 0),
(58, 104, '2015-07-28', '', 0),
(58, 105, '2015-07-28', '', 0),
(58, 106, '2015-07-28', '', 0),
(58, 107, '2015-07-28', '', 0),
(58, 109, '2015-07-28', '', 0),
(58, 110, '2015-07-28', '', 0),
(58, 121, '2015-07-28', '', 0),
(58, 122, '2015-07-28', '', 0),
(58, 123, '2015-07-28', '', 0),
(58, 125, '2015-07-28', '', 0),
(58, 126, '2015-07-28', '', 0),
(58, 127, '2015-07-28', '', 0),
(58, 128, '2015-07-28', '', 0),
(58, 129, '2015-07-28', '', 0),
(58, 91, '2015-07-28', '', 0),
(58, 92, '2015-07-28', '', 0),
(58, 93, '2015-07-28', '', 0),
(58, 94, '2015-07-28', '', 0),
(58, 95, '2015-07-28', '', 0),
(58, 96, '2015-07-29', '', 0),
(58, 97, '2015-07-29', '', 0),
(58, 98, '2015-07-29', '', 0),
(58, 99, '2015-07-29', '', 0),
(58, 100, '2015-07-29', '', 0),
(58, 131, '2015-07-29', '', 0),
(58, 132, '2015-07-29', '', 0),
(58, 133, '2015-07-29', '', 0),
(58, 134, '2015-07-29', '', 0),
(58, 136, '2015-07-29', '', 0),
(58, 137, '2015-07-29', '', 0),
(58, 138, '2015-07-29', '', 0),
(58, 139, '2015-07-29', '', 0),
(58, 140, '2015-07-29', '', 0),
(58, 82, '2015-07-29', '', 0),
(58, 83, '2015-07-29', '', 0),
(58, 84, '2015-07-29', '', 0),
(58, 85, '2015-07-29', '', 0),
(58, 86, '2015-07-29', '', 0),
(58, 87, '2015-07-29', '', 0),
(58, 88, '2015-07-29', '', 0),
(58, 89, '2015-07-29', '', 0),
(58, 90, '2015-07-29', '', 0),
(58, 61, '2015-07-29', '', 0),
(58, 62, '2015-07-29', '', 0),
(58, 63, '2015-07-29', '', 0),
(58, 64, '2015-07-29', '', 0),
(58, 65, '2015-07-29', '', 0),
(58, 66, '2015-07-29', '', 0),
(58, 67, '2015-07-29', '', 0),
(58, 68, '2015-07-29', '', 0),
(58, 69, '2015-07-29', '', 0),
(58, 70, '2015-07-29', '', 0),
(58, 71, '2015-07-29', '', 0),
(58, 72, '2015-07-29', '', 0),
(58, 73, '2015-07-29', '', 0),
(58, 74, '2015-07-29', '', 0),
(58, 75, '2015-07-29', '', 0),
(58, 76, '2015-07-29', '', 0),
(58, 77, '2015-07-29', '', 0),
(58, 78, '2015-07-29', '', 0),
(58, 79, '2015-07-29', '', 0),
(58, 80, '2015-07-29', '', 0),
(58, 141, '2015-07-29', '', 0),
(58, 142, '2015-07-29', '', 0),
(58, 144, '2015-07-29', '', 0),
(58, 145, '2015-07-29', '', 0),
(58, 146, '2015-07-29', '', 0),
(58, 147, '2015-07-29', '', 0),
(58, 148, '2015-07-29', '', 0),
(58, 149, '2015-07-29', '', 0),
(58, 150, '2015-07-29', '', 0),
(58, 51, '2015-07-29', '', 0),
(58, 54, '2015-07-29', '', 0),
(58, 55, '2015-07-29', '', 0),
(58, 56, '2015-07-29', '', 0),
(58, 57, '2015-07-29', '', 0),
(58, 58, '2015-07-29', '', 0),
(58, 59, '2015-07-29', '', 0),
(58, 60, '2015-07-29', '', 0),
(49, 1, '2015-08-03', 'Tunnel', 0),
(49, 3, '2015-08-03', 'Tunnel', 0),
(49, 2, '2015-08-03', 'Tunnel', 0),
(49, 4, '2015-08-03', 'Tunnel', 0),
(49, 5, '2015-08-03', 'Tunnel', 0),
(49, 6, '2015-08-03', 'Tunnel', 0),
(49, 8, '2015-08-03', 'Tunnel', 0),
(49, 1, '2015-08-03', 'Buzzin', 0),
(49, 2, '2015-08-03', 'Buzzin', 0),
(49, 3, '2015-08-03', 'Buzzin', 0),
(49, 4, '2015-08-03', 'Buzzin', 0),
(49, 5, '2015-08-03', 'Buzzin', 0),
(49, 8, '2015-08-03', 'Buzzin', 0),
(49, 10, '2015-08-03', 'Buzzin', 0),
(49, 11, '2015-08-03', 'Buzzin', 0),
(49, 12, '2015-08-03', 'Buzzin', 0),
(49, 13, '2015-08-03', 'Buzzin', 0),
(49, 14, '2015-08-03', 'Buzzin', 0),
(49, 15, '2015-08-03', 'Buzzin', 0),
(49, 16, '2015-08-03', 'Buzzin', 0),
(49, 17, '2015-08-03', 'Buzzin', 0),
(49, 18, '2015-08-03', 'Buzzin', 0),
(49, 19, '2015-08-03', 'Buzzin', 0),
(49, 20, '2015-08-03', 'Buzzin', 0),
(49, 21, '2015-08-03', 'Buzzin', 0),
(49, 22, '2015-08-03', 'Buzzin', 0),
(49, 23, '2015-08-03', 'Buzzin', 0),
(49, 24, '2015-08-03', 'Buzzin', 0),
(49, 25, '2015-08-03', 'Buzzin', 0),
(49, 26, '2015-08-03', 'Buzzin', 0),
(49, 27, '2015-08-03', 'Buzzin', 0),
(49, 28, '2015-08-03', 'Buzzin', 0),
(49, 29, '2015-08-03', 'Buzzin', 0),
(49, 30, '2015-08-03', 'Buzzin', 0),
(49, 31, '2015-08-03', 'Buzzin', 0),
(49, 32, '2015-08-03', 'Buzzin', 0),
(49, 33, '2015-08-03', 'Buzzin', 0),
(49, 34, '2015-08-03', 'Buzzin', 0),
(49, 35, '2015-08-03', 'Buzzin', 0),
(49, 36, '2015-08-03', 'Buzzin', 0),
(49, 37, '2015-08-03', 'Buzzin', 0),
(49, 38, '2015-08-03', 'Buzzin', 0),
(49, 39, '2015-08-03', 'Buzzin', 0),
(49, 40, '2015-08-03', 'Buzzin', 0),
(49, 41, '2015-08-03', 'Buzzin', 0),
(49, 42, '2015-08-03', 'Buzzin', 0),
(49, 43, '2015-08-03', 'Buzzin', 0),
(49, 44, '2015-08-03', 'Buzzin', 0),
(49, 45, '2015-08-03', 'Buzzin', 0),
(49, 46, '2015-08-03', 'Buzzin', 0),
(49, 47, '2015-08-03', 'Buzzin', 0),
(49, 48, '2015-08-03', 'Buzzin', 0),
(49, 49, '2015-08-03', 'Buzzin', 0),
(49, 50, '2015-08-03', 'Buzzin', 0),
(49, 51, '2015-08-03', 'Buzzin', 0),
(49, 52, '2015-08-03', 'Buzzin', 0),
(49, 53, '2015-08-03', 'Buzzin', 0),
(49, 1, '2015-08-03', 'Tunnel', 0),
(49, 3, '2015-08-03', 'Tunnel', 0),
(49, 2, '2015-08-03', 'Tunnel', 0),
(49, 4, '2015-08-03', 'Tunnel', 0),
(49, 5, '2015-08-03', 'Tunnel', 0),
(49, 6, '2015-08-03', 'Tunnel', 0),
(49, 8, '2015-08-03', 'Tunnel', 0),
(49, 1, '2015-08-03', 'Buzzin', 0),
(49, 2, '2015-08-03', 'Buzzin', 0),
(49, 3, '2015-08-03', 'Buzzin', 0),
(49, 4, '2015-08-03', 'Buzzin', 0),
(49, 5, '2015-08-03', 'Buzzin', 0),
(49, 8, '2015-08-03', 'Buzzin', 0),
(49, 10, '2015-08-03', 'Buzzin', 0),
(49, 11, '2015-08-03', 'Buzzin', 0),
(49, 12, '2015-08-03', 'Buzzin', 0),
(49, 13, '2015-08-03', 'Buzzin', 0),
(49, 14, '2015-08-03', 'Buzzin', 0),
(49, 15, '2015-08-03', 'Buzzin', 0),
(49, 16, '2015-08-03', 'Buzzin', 0),
(49, 17, '2015-08-03', 'Buzzin', 0),
(49, 18, '2015-08-03', 'Buzzin', 0),
(49, 19, '2015-08-03', 'Buzzin', 0),
(49, 20, '2015-08-03', 'Buzzin', 0),
(49, 21, '2015-08-03', 'Buzzin', 0),
(49, 22, '2015-08-03', 'Buzzin', 0),
(49, 23, '2015-08-03', 'Buzzin', 0),
(49, 24, '2015-08-03', 'Buzzin', 0),
(49, 25, '2015-08-03', 'Buzzin', 0),
(49, 26, '2015-08-03', 'Buzzin', 0),
(49, 27, '2015-08-03', 'Buzzin', 0),
(49, 28, '2015-08-03', 'Buzzin', 0),
(49, 29, '2015-08-03', 'Buzzin', 0),
(49, 30, '2015-08-03', 'Buzzin', 0),
(49, 31, '2015-08-03', 'Buzzin', 0),
(49, 32, '2015-08-03', 'Buzzin', 0),
(49, 33, '2015-08-03', 'Buzzin', 0),
(49, 34, '2015-08-03', 'Buzzin', 0),
(49, 35, '2015-08-03', 'Buzzin', 0),
(49, 36, '2015-08-03', 'Buzzin', 0),
(49, 37, '2015-08-03', 'Buzzin', 0),
(49, 38, '2015-08-03', 'Buzzin', 0),
(49, 39, '2015-08-03', 'Buzzin', 0),
(49, 40, '2015-08-03', 'Buzzin', 0),
(49, 41, '2015-08-03', 'Buzzin', 0),
(49, 42, '2015-08-03', 'Buzzin', 0),
(49, 43, '2015-08-03', 'Buzzin', 0),
(49, 44, '2015-08-03', 'Buzzin', 0),
(49, 45, '2015-08-03', 'Buzzin', 0),
(49, 46, '2015-08-03', 'Buzzin', 0),
(49, 47, '2015-08-03', 'Buzzin', 0),
(49, 48, '2015-08-03', 'Buzzin', 0),
(49, 49, '2015-08-03', 'Buzzin', 0),
(49, 50, '2015-08-03', 'Buzzin', 0),
(49, 51, '2015-08-03', 'Buzzin', 0),
(49, 52, '2015-08-03', 'Buzzin', 0),
(49, 53, '2015-08-03', 'Buzzin', 0),
(49, 2, '2015-08-03', 'Oneshop', 0),
(54, 2, '2015-08-03', 'Oneshop', 0),
(51, 2, '2015-07-31', 'Oneshop', 0),
(41, 1, '2015-08-03', 'Oneshop', 0),
(25, 1, '2015-08-03', 'Oneshop', 0);

-- --------------------------------------------------------

--
-- Table structure for table `on_database_marketing`
--

CREATE TABLE IF NOT EXISTS `on_database_marketing` (
`rec_aid` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `recipient_email_address` text NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `content_type` enum('text/plain','text/html') NOT NULL,
  `audlab_id_fk` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `on_database_stats`
--

CREATE TABLE IF NOT EXISTS `on_database_stats` (
  `adv_id` int(11) NOT NULL,
  `people_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `on_ads_pricings`
--
ALTER TABLE `on_ads_pricings`
 ADD PRIMARY KEY (`country_code`), ADD UNIQUE KEY `country_code` (`country_code`);

--
-- Indexes for table `on_audience`
--
ALTER TABLE `on_audience`
 ADD PRIMARY KEY (`audience_id`);

--
-- Indexes for table `on_campaigns`
--
ALTER TABLE `on_campaigns`
 ADD PRIMARY KEY (`campaign_id`);

--
-- Indexes for table `on_campaign_roi`
--
ALTER TABLE `on_campaign_roi`
 ADD PRIMARY KEY (`campaign_id_fk`);

--
-- Indexes for table `on_database_marketing`
--
ALTER TABLE `on_database_marketing`
 ADD PRIMARY KEY (`rec_aid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `on_audience`
--
ALTER TABLE `on_audience`
MODIFY `audience_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `on_campaigns`
--
ALTER TABLE `on_campaigns`
MODIFY `campaign_id` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `on_database_marketing`
--
ALTER TABLE `on_database_marketing`
MODIFY `rec_aid` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
