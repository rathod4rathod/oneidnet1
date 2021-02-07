-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 03, 2015 at 09:57 AM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onenetwork1`
--

-- --------------------------------------------------------

--
-- Table structure for table `on_campaigns`
--

CREATE TABLE IF NOT EXISTS `on_campaigns` (
  `campaign_id` int(7) NOT NULL AUTO_INCREMENT,
  `campaign_name` varchar(100) NOT NULL,
  `email_body` varchar(255) NOT NULL,
  `email_subject` varchar(255) NOT NULL,
  `campign_type` enum('Banner Marketing','Website Marketing','Seasonal Marketing','Email Marketing','Flash Marketing','Click: Page Promotion','Tunnel: Channel Promotion','Netpro: Company Page Promotion','Oneshop: Store Promotion','Buzzin: Celebrity Account Promotion','One Vision: Episode Promotion','One Vision: Channel Promotion','IS News: Sponsered News','Travel Time: Package Promotion','Petition') NOT NULL,
  `campaign_size` enum('618 * 222 px','250 * 200 px','250 * 450 px','250 * 600 px') NOT NULL COMMENT 'Width * Height',
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
  `expired_on` datetime NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `gender` enum('Male','Female','All') NOT NULL,
  `city_str` text NOT NULL,
  `age_range` enum('18 - 25 year','25 - 45 year','45 - 65 year','65+ year') NOT NULL,
  `marital_status` enum('Single','Married') NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `language` varchar(45) NOT NULL,
  `nationality` varchar(70) NOT NULL,
  `interest` enum('Infotainment','General','Music','Business','Movies','Sports','Fashion','News') NOT NULL,
  `category` varchar(255) NOT NULL,
  `modules` varchar(255) NOT NULL,
  `country_str` text NOT NULL,
  `total_reach` int(11) NOT NULL,
  `industry` enum('Agriculture','Banking','Grocery','Accounting','Health Care','Advertising','Internet Publishing','Aerospace','Investment Banking','Aircraft','Legal','Airline','Manufacturing','Apparel & Accessories','Motion Picture & Video','Automotive','Music','Newspaper Publishers','Broadcasting','Online Auctions','Brokerage','Pension Funds','Biotechnology','Pharmaceuticals','Call Centers','Private Equity','Cargo Handling','Publishing','Chemical','Real Estate','Computer','Retail & Wholesale','Consulting','Securities & Commodity Exchanges','Consumer Products','Service','Cosmetics','Soap & Detergent','Defense','Software','Department Stores','Sports','Education','Technology','Electronics','Telecommunications','Energy','Television','Entertainment & Leisure','Transportation','Executive Search','Trucking','Financial Services','Venture Capital','Food, Beverage & Tobacco') NOT NULL,
  `entity_id` int(15) NOT NULL,
  PRIMARY KEY (`campaign_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `on_campaigns`
--

INSERT INTO `on_campaigns` (`campaign_id`, `campaign_name`, `email_body`, `email_subject`, `campign_type`, `campaign_size`, `currency`, `title`, `url`, `size`, `file_path`, `budget`, `source`, `active_on`, `is_active`, `is_payment_done`, `created_by`, `created_on`, `expired_on`, `is_deleted`, `gender`, `city_str`, `age_range`, `marital_status`, `job_title`, `language`, `nationality`, `interest`, `category`, `modules`, `country_str`, `total_reach`, `industry`, `entity_id`) VALUES
(1, 'medical campaign', '', '', 'Click: Page Promotion', '250 * 200 px', 'ARS-Argentina Peso', 'medical campaign title', 'medical campaign url', '300_100', '', 5000, 'Inside', '2015-05-21 05:37:20', 1, 1, 1, '2015-05-22 05:25:28', '0000-00-00 00:00:00', 0, 'All', '', '', 'Single', '', '', '', '', '', '', '', 0, 'Agriculture', 0),
(2, 'website campaign', '', '', 'Banner Marketing', '618 * 222 px', 'ARS-Argentina Peso', 'medical campaign title', 'medical campaign url', '300_100', '', 5000, 'Inside', '2015-05-21 05:37:20', 1, 0, 1, '2015-05-21 13:17:21', '0000-00-00 00:00:00', 0, 'All', '', '', 'Single', '', '', '', '', '', '', '', 0, 'Agriculture', 0),
(3, 'aaaaa\r\n', '', '', '', '', '', '', '', '', '', 0, '', '0000-00-00 00:00:00', 1, 0, 1, '2015-07-02 10:35:53', '0000-00-00 00:00:00', 1, '', '', '', 'Single', '', '', '', '', '', '', '', 0, 'Agriculture', 0),
(33, 'banner marketing', '', '', 'Banner Marketing', '618 * 222 px', 'ALL-Albania Lek', '', '', '300_200', '', 4444, 'Inside', '0000-00-00 00:00:00', 0, 0, 0, '2015-06-30 13:20:25', '0000-00-00 00:00:00', 0, 'Female', '', '18 - 25 year', 'Single', '', '', 'Albanian', 'General', '', '["Click"]', '', 0, 'Agriculture', 0),
(56, 'ff', '', '', 'Banner Marketing', '618 * 222 px', 'AMD-Armenia Dram', '', '', '300_200', '', 45, 'Inside', '0000-00-00 00:00:00', 0, 0, 0, '2015-07-02 11:42:22', '0000-00-00 00:00:00', 0, 'Male', '', '25 - 45 year', 'Single', '', '', 'Bahamian', 'Business', '', '', '', 0, 'Agriculture', 0),
(58, 'ddddddddddddddddddddd', '', '', 'Click: Page Promotion', '618 * 222 px', 'AFN-Afghanistan Afghani', '', '', '300_200', '', 45, 'Inside', '0000-00-00 00:00:00', 0, 0, 0, '2015-07-02 11:47:42', '0000-00-00 00:00:00', 0, 'Male', '', '18 - 25 year', 'Single', '', '', 'Australian', 'Sports', '', '', '', 0, 'Agriculture', 0),
(59, 'dsfsf', '', '', 'Click: Page Promotion', '618 * 222 px', 'ANG-Netherlands Antilles Guilder', '', '1', '300_200', '', 23, 'Inside', '0000-00-00 00:00:00', 0, 0, 0, '2015-07-02 11:53:53', '0000-00-00 00:00:00', 0, 'Female', '', '25 - 45 year', 'Single', '', '', 'Angolan', 'Music', '', '', '', 0, 'Agriculture', 0),
(61, 'cnammme', '', '', 'Tunnel: Channel Promotion', '618 * 222 px', 'AED-United Arab Emirates Dirham', '', '2', '300_200', '', 34, 'Inside', '0000-00-00 00:00:00', 0, 0, 0, '2015-07-02 11:58:26', '0000-00-00 00:00:00', 0, 'Male', '', '18 - 25 year', 'Single', '', '', 'Albanian', 'Music', '', '', '', 0, 'Agriculture', 0),
(62, 'cooffce', '', '', '', '618 * 222 px', 'AFN-Afghanistan Afghani', '', '4', '300_200', '', 34, 'Inside', '0000-00-00 00:00:00', 0, 0, 0, '2015-07-02 12:02:23', '0000-00-00 00:00:00', 0, 'Female', '', '25 - 45 year', 'Single', '', '', 'Bangladeshi', 'Movies', '', '', '', 0, 'Agriculture', 0),
(63, 'oneshop', '', '', 'Oneshop: Store Promotion', '618 * 222 px', 'AED-United Arab Emirates Dirham', '', '5', '300_200', '', 12, 'Inside', '0000-00-00 00:00:00', 0, 0, 0, '2015-07-02 12:05:34', '0000-00-00 00:00:00', 0, 'Female', '', '25 - 45 year', 'Single', '', '', 'Algerian', 'Music', '', '', '', 0, 'Agriculture', 0),
(64, 'onevision', '', '', 'One Vision: Episode Promotion', '618 * 222 px', 'ALL-Albania Lek', '', '4', '300_200', '', 45, 'Inside', '0000-00-00 00:00:00', 0, 0, 0, '2015-07-02 12:09:40', '0000-00-00 00:00:00', 0, 'Male', '', '25 - 45 year', 'Single', '', '', 'Algerian', 'Movies', '', '', '', 0, 'Agriculture', 0),
(65, 'news', '', '', 'IS News: Sponsered News', '618 * 222 px', 'AFN-Afghanistan Afghani', '', '7', '300_200', '', 45, 'Inside', '0000-00-00 00:00:00', 0, 0, 0, '2015-07-02 12:12:01', '0000-00-00 00:00:00', 0, 'Male', '', '45 - 65 year', 'Single', '', '', 'Armenian', 'General', '', '', '', 0, 'Agriculture', 0),
(66, 'bannnmm', '', '', 'Banner Marketing', '250 * 200 px', 'AFN-Afghanistan Afghani', '                            yyyyyyy', 'fffff', '300_200', 'Screenshot from 2015-06-11 04:37:00.png', 45, 'Outside', '0000-00-00 00:00:00', 0, 0, 0, '2015-07-02 12:40:36', '0000-00-00 00:00:00', 0, 'Male', '', '18 - 25 year', 'Single', '', '', 'Albanian', 'Music', '', '', '', 0, 'Agriculture', 0),
(67, 'bannwerr', '', '', 'Banner Marketing', '618 * 222 px', 'AUD-Australia Dollar', '                            webofbanner', 'google.com', '300_200', 'Screenshot from 2015-06-11 04:37:00.png', 45, 'Outside', '0000-00-00 00:00:00', 0, 0, 0, '2015-07-02 12:48:30', '0000-00-00 00:00:00', 0, 'Male', '', '45 - 65 year', 'Single', '', '', 'Antiguans, Barbudans', 'Business', 'Social', '["4Selected"]', '', 0, 'Agriculture', 0),
(68, 'tttt', '', '', 'Banner Marketing', '250 * 450 px', 'AMD-Armenia Dram', '                            hh', 'fdd', '300_200', 'Screenshot from 2015-06-11 04:37:00.png', 56, 'Outside', '0000-00-00 00:00:00', 0, 0, 0, '2015-07-02 12:50:22', '0000-00-00 00:00:00', 0, 'Male', '', '25 - 45 year', 'Single', '', '', 'Azerbaijani', 'Movies', 'Social', '["Click","Tunnel"," Buzzin "]', '', 0, 'Agriculture', 0),
(69, 'flash', '', '', 'Flash Marketing', '250 * 200 px', 'AFN-Afghanistan Afghani', ' ddd', 'asasd', '300_200', '', 45, 'Outside', '0000-00-00 00:00:00', 0, 0, 0, '2015-07-02 12:55:50', '0000-00-00 00:00:00', 0, 'Female', '', '18 - 25 year', 'Single', '', '', 'Algerian', 'General', 'Social', '["Click","Tunnel"," Buzzin "]', '', 0, 'Agriculture', 0),
(70, 'bannwerr', '', '', 'Click: Page Promotion', '618 * 222 px', 'AMD-Armenia Dram', '', '2', '300_200', '', 12, 'Inside', '0000-00-00 00:00:00', 0, 0, 0, '2015-07-02 15:43:37', '0000-00-00 00:00:00', 0, 'Female', '', '18 - 25 year', 'Single', '', '', 'Bahamian', 'General', '', '', '', 0, 'Agriculture', 0),
(71, 'fdxgc', '', '', 'Flash Marketing', '618 * 222 px', 'AMD-Armenia Dram', ' ffffffffffffffffff', 'dcxxxxxxx', '300_200', '', 45, 'Outside', '0000-00-00 00:00:00', 0, 0, 0, '2015-07-02 15:53:05', '0000-00-00 00:00:00', 0, 'Female', '', '18 - 25 year', 'Single', '', '', 'Armenian', 'Music', 'Social', '["Buzzin","Oneshop "]', '', 0, 'Agriculture', 0),
(72, 'fdxgc', '', '', 'Banner Marketing', '250 * 200 px', 'AFN-Afghanistan Afghani', '                            gdfgc', 'fg', '300_200', 'Screenshot from 2015-06-11 04:37:00.png', 45, 'Outside', '0000-00-00 00:00:00', 0, 0, 0, '2015-07-03 04:10:13', '0000-00-00 00:00:00', 0, 'Male', '', '18 - 25 year', 'Single', '', '', 'Bahamian', 'General', 'Social', '["Click","Tunnel"," Oneshop "]', '', 0, 'Agriculture', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
