-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 26, 2015 at 04:35 PM
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
-- Table structure for table `global_countries_info`
--

CREATE TABLE IF NOT EXISTS `global_countries_info` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(5) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=248 ;

--
-- Dumping data for table `global_countries_info`
--

INSERT INTO `global_countries_info` (`country_id`, `country_code`, `country_name`) VALUES
(1, 'IR', 'Iran'),
(2, 'RW', 'Rwanda'),
(3, 'SO', 'Somalia'),
(4, 'YE', 'Yemen'),
(5, 'LY', 'Libya'),
(6, 'IQ', 'Iraq'),
(7, 'SA', 'Saudi Arabia'),
(8, 'AO', 'Angola'),
(9, 'CY', 'Cyprus'),
(10, 'AZ', 'Azerbaijan'),
(11, 'TZ', 'Tanzania'),
(12, 'TM', 'Turkmenistan'),
(13, 'SY', 'Syria'),
(14, 'AM', 'Armenia'),
(15, 'ZM', 'Zambia'),
(16, 'KE', 'Kenya'),
(17, 'CD', 'Congo'),
(18, 'DJ', 'Djibouti'),
(19, 'UG', 'Uganda'),
(20, 'CF', 'Central African Republic'),
(21, 'SC', 'Seychelles'),
(22, 'TD', 'Chad'),
(23, 'JO', 'Hashemite Kingdom of Jordan'),
(24, 'GR', 'Greece'),
(25, 'LB', 'Lebanon'),
(26, 'PS', 'Palestine'),
(27, 'IL', 'Israel'),
(28, 'KW', 'Kuwait'),
(29, 'OM', 'Oman'),
(30, 'QA', 'Qatar'),
(31, 'BH', 'Bahrain'),
(32, 'AE', 'United Arab Emirates'),
(33, 'TR', 'Turkey'),
(34, 'ET', 'Ethiopia'),
(35, 'ER', 'Eritrea'),
(36, 'EG', 'Egypt'),
(37, 'SD', 'Sudan'),
(38, 'SS', 'South Sudan'),
(39, 'BI', 'Burundi'),
(40, 'RU', 'Russia'),
(41, 'EE', 'Estonia'),
(42, 'LV', 'Latvia'),
(43, 'UA', 'Ukraine'),
(44, 'LT', 'Republic of Lithuania'),
(45, 'SE', 'Sweden'),
(46, 'KZ', 'Kazakhstan'),
(47, 'GE', 'Georgia'),
(48, 'MD', 'Republic of Moldova'),
(49, 'BY', 'Belarus'),
(50, 'FI', 'Finland'),
(51, 'AX', '??land'),
(52, 'RO', 'Romania'),
(53, 'HU', 'Hungary'),
(54, 'MK', 'Macedonia'),
(55, 'SK', 'Slovakia'),
(56, 'BG', 'Bulgaria'),
(57, 'PL', 'Poland'),
(58, 'NO', 'Norway'),
(59, 'AL', 'Albania'),
(60, 'RS', 'Serbia'),
(61, 'XK', 'Kosovo'),
(62, 'NA', 'Namibia'),
(63, 'ZW', 'Zimbabwe'),
(64, 'YT', 'Mayotte'),
(65, 'KM', 'Comoros'),
(66, 'MW', 'Malawi'),
(67, 'LS', 'Lesotho'),
(68, 'BW', 'Botswana'),
(69, 'MU', 'Mauritius'),
(70, 'SZ', 'Swaziland'),
(71, 'RE', 'R??union'),
(72, 'ZA', 'South Africa'),
(73, 'MZ', 'Mozambique'),
(74, 'MG', 'Madagascar'),
(75, 'TH', 'Thailand'),
(76, 'AF', 'Afghanistan'),
(77, 'PK', 'Pakistan'),
(78, 'BD', 'Bangladesh'),
(79, 'ID', 'Indonesia'),
(80, 'UZ', 'Uzbekistan'),
(81, 'TJ', 'Tajikistan'),
(82, 'MY', 'Malaysia'),
(83, 'LK', 'Sri Lanka'),
(84, 'BT', 'Bhutan'),
(85, 'IN', 'India'),
(86, 'CN', 'China'),
(87, 'MV', 'Maldives'),
(88, 'IO', 'British Indian Ocean Territory'),
(89, 'NP', 'Nepal'),
(90, 'MM', 'Myanmar [Burma]'),
(91, 'MN', 'Mongolia'),
(92, 'KG', 'Kyrgyzstan'),
(93, 'TF', 'French Southern Territories'),
(94, 'CC', 'Cocos [Keeling] Islands'),
(95, 'PW', 'Palau'),
(96, 'VN', 'Vietnam'),
(97, 'TL', 'East Timor'),
(98, 'LA', 'Laos'),
(99, 'TW', 'Taiwan'),
(100, 'PH', 'Philippines'),
(101, 'HK', 'Hong Kong'),
(102, 'BN', 'Brunei'),
(103, 'MO', 'Macao'),
(104, 'KH', 'Cambodia'),
(105, 'KR', 'Republic of Korea'),
(106, 'JP', 'Japan'),
(107, 'KP', 'North Korea'),
(108, 'SG', 'Singapore'),
(109, 'CK', 'Cook Islands'),
(110, 'AU', 'Australia'),
(111, 'CX', 'Christmas Island'),
(112, 'MH', 'Marshall Islands'),
(113, 'FM', 'Federated States of Micronesia'),
(114, 'PG', 'Papua New Guinea'),
(115, 'SB', 'Solomon Islands'),
(116, 'KI', 'Kiribati'),
(117, 'TV', 'Tuvalu'),
(118, 'NR', 'Nauru'),
(119, 'VU', 'Vanuatu'),
(120, 'NC', 'New Caledonia'),
(121, 'NF', 'Norfolk Island'),
(122, 'NZ', 'New Zealand'),
(123, 'FJ', 'Fiji'),
(124, 'CM', 'Cameroon'),
(125, 'SN', 'Senegal'),
(126, 'CG', 'Republic of the Congo'),
(127, 'PT', 'Portugal'),
(128, 'LR', 'Liberia'),
(129, 'CI', 'Ivory Coast'),
(130, 'GH', 'Ghana'),
(131, 'GQ', 'Equatorial Guinea'),
(132, 'NG', 'Nigeria'),
(133, 'BF', 'Burkina Faso'),
(134, 'TG', 'Togo'),
(135, 'GW', 'Guinea-Bissau'),
(136, 'MR', 'Mauritania'),
(137, 'BJ', 'Benin'),
(138, 'GA', 'Gabon'),
(139, 'SL', 'Sierra Leone'),
(140, 'ST', 'S??o Tom?? and Pr??ncipe'),
(141, 'GI', 'Gibraltar'),
(142, 'GM', 'Gambia'),
(143, 'GN', 'Guinea'),
(144, 'NE', 'Niger'),
(145, 'ML', 'Mali'),
(146, 'MA', 'Morocco'),
(147, 'TN', 'Tunisia'),
(148, 'DZ', 'Algeria'),
(149, 'ES', 'Spain'),
(150, 'IT', 'Italy'),
(151, 'MT', 'Malta'),
(152, 'AT', 'Austria'),
(153, 'DK', 'Denmark'),
(154, 'FO', 'Faroe Islands'),
(155, 'IS', 'Iceland'),
(156, 'GB', 'United Kingdom'),
(157, 'IE', 'Ireland'),
(158, 'CH', 'Switzerland'),
(159, 'SJ', 'Svalbard and Jan Mayen'),
(160, 'NL', 'Netherlands'),
(161, 'BE', 'Belgium'),
(162, 'DE', 'Germany'),
(163, 'LU', 'Luxembourg'),
(164, 'FR', 'France'),
(165, 'MC', 'Monaco'),
(166, 'AD', 'Andorra'),
(167, 'LI', 'Liechtenstein'),
(168, 'JE', 'Jersey'),
(169, 'IM', 'Isle of Man'),
(170, 'GG', 'Guernsey'),
(171, 'CZ', 'Czech Republic'),
(172, 'VA', 'Vatican City'),
(173, 'SM', 'San Marino'),
(174, 'HR', 'Croatia'),
(175, 'BA', 'Bosnia and Herzegovina'),
(176, 'SI', 'Slovenia'),
(177, 'ME', 'Montenegro'),
(178, 'SH', 'Saint Helena'),
(179, 'BB', 'Barbados'),
(180, 'CV', 'Cape Verde'),
(181, 'GY', 'Guyana'),
(182, 'GF', 'French Guiana'),
(183, 'SR', 'Suriname'),
(184, 'BR', 'Brazil'),
(185, 'GL', 'Greenland'),
(186, 'PM', 'Saint Pierre and Miquelon'),
(187, 'GS', 'South Georgia and the South Sa'),
(188, 'FK', 'Falkland Islands'),
(189, 'AR', 'Argentina'),
(190, 'PY', 'Paraguay'),
(191, 'UY', 'Uruguay'),
(192, 'VE', 'Venezuela'),
(193, 'MX', 'Mexico'),
(194, 'JM', 'Jamaica'),
(195, 'DO', 'Dominican Republic'),
(196, 'CW', 'Cura??ao'),
(197, 'SX', 'Sint Maarten'),
(198, 'BQ', 'Bonaire'),
(199, 'CU', 'Cuba'),
(200, 'MQ', 'Martinique'),
(201, 'BS', 'Bahamas'),
(202, 'BM', 'Bermuda'),
(203, 'AI', 'Anguilla'),
(204, 'TT', 'Trinidad and Tobago'),
(205, 'KN', 'Saint Kitts and Nevis'),
(206, 'DM', 'Dominica'),
(207, 'AG', 'Antigua and Barbuda'),
(208, 'LC', 'Saint Lucia'),
(209, 'TC', 'Turks and Caicos Islands'),
(210, 'AW', 'Aruba'),
(211, 'VG', 'British Virgin Islands'),
(212, 'VC', 'Saint Vincent and the Grenadin'),
(213, 'MS', 'Montserrat'),
(214, 'GP', 'Guadeloupe'),
(215, 'MF', 'Saint Martin'),
(216, 'BL', 'Saint-Barth??lemy'),
(217, 'GD', 'Grenada'),
(218, 'KY', 'Cayman Islands'),
(219, 'BZ', 'Belize'),
(220, 'SV', 'El Salvador'),
(221, 'GT', 'Guatemala'),
(222, 'HN', 'Honduras'),
(223, 'NI', 'Nicaragua'),
(224, 'CR', 'Costa Rica'),
(225, 'EC', 'Ecuador'),
(226, 'CO', 'Colombia'),
(227, 'PE', 'Peru'),
(228, 'PA', 'Panama'),
(229, 'HT', 'Haiti'),
(230, 'CL', 'Chile'),
(231, 'BO', 'Bolivia'),
(232, 'PF', 'French Polynesia'),
(233, 'PN', 'Pitcairn Islands'),
(234, 'TK', 'Tokelau'),
(235, 'TO', 'Tonga'),
(236, 'WF', 'Wallis and Futuna'),
(237, 'WS', 'Samoa'),
(238, 'NU', 'Niue'),
(239, 'GU', 'Guam'),
(240, 'MP', 'Northern Mariana Islands'),
(241, 'US', 'United States'),
(242, 'PR', 'Puerto Rico'),
(243, 'VI', 'U.S. Virgin Islands'),
(244, 'UM', 'U.S. Minor Outlying Islands'),
(245, 'AS', 'American Samoa'),
(246, 'CA', 'Canada'),
(247, 'AQ', 'Antarctica');

-- --------------------------------------------------------

--
-- Table structure for table `iws_employers`
--

CREATE TABLE IF NOT EXISTS `iws_employers` (
  `rec_aid` int(11) NOT NULL AUTO_INCREMENT,
  `company_code` varchar(10) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `enquiry_email` varchar(100) NOT NULL,
  `toll_free_num` varchar(35) NOT NULL,
  `toll_free_info` varchar(100) NOT NULL COMMENT 'E.g. toll-free from the United States and Canada',
  `website` varchar(70) NOT NULL,
  `logo_path` varchar(255) NOT NULL,
  `cover_path` varchar(255) NOT NULL,
  `company_size` enum('1 - 10','11 - 50','51 - 100','100 - 250','250 - 500','501 - 1000','1000 - 10,000','10,001 - 50,000','50,000 +') NOT NULL,
  `description` text NOT NULL,
  `specialities` text NOT NULL,
  `industry_type` enum('Agriculture','Banking','Grocery','Accounting','Health Care','Advertising','Internet Publishing','Aerospace','Investment Banking','Aircraft','Legal','Airline','Manufacturing','Apparel & Accessories','Motion Picture & Video','Automotive','Music','Newspaper Publishers','Broadcasting','Online Auctions','Brokerage','Pension Funds','Biotechnology','Pharmaceuticals','Call Centers','Private Equity','Cargo Handling','Publishing','Chemical','Real Estate','Computer','Retail & Wholesale','Consulting','Securities & Commodity Exchanges','Consumer Products','Service','Cosmetics','Soap & Detergent','Defense','Software','Department Stores','Sports','Education','Technology','Electronics','Telecommunications','Energy','Television','Entertainment & Leisure','Transportation','Executive Search','Trucking','Financial Services','Venture Capital','Food, Beverage & Tobacco') NOT NULL,
  `founded` int(4) NOT NULL,
  `hq_address_line1` varchar(150) NOT NULL,
  `hq_address_line2` varchar(150) NOT NULL,
  `city` int(6) NOT NULL,
  `state` int(5) NOT NULL,
  `country` char(3) NOT NULL,
  `zip_code` int(9) NOT NULL,
  `licensed_number` varchar(150) NOT NULL,
  `nature_of_organization` enum('Privately Held','Government','Public','Non-Profitable Organization','Self Owned') NOT NULL,
  `is_verified` enum('Yes','No') NOT NULL,
  `registered_by` int(11) NOT NULL,
  `registered_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`rec_aid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `iws_reported_problem`
--

CREATE TABLE IF NOT EXISTS `iws_reported_problem` (
  `rec_aid` int(11) NOT NULL AUTO_INCREMENT,
  `module` enum('Tunnel','CvBank','One Vision','One Network','One ID Ship','One Shop','Travel Time','360 Mail','Is News','Buzzin','Click','Corporate Office','DealerX','VCom','Netpro') NOT NULL,
  `title_of_problem` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `user_location` int(3) NOT NULL,
  `attach_snapshot` varchar(100) NOT NULL COMMENT 'Optional',
  `reported_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reported_by` int(11) NOT NULL COMMENT 'iws_profile_id',
  PRIMARY KEY (`rec_aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `iws_reported_problem`
--

INSERT INTO `iws_reported_problem` (`rec_aid`, `module`, `title_of_problem`, `description`, `user_location`, `attach_snapshot`, `reported_on`, `reported_by`) VALUES
(1, 'One Network', 'gouthamhhhhhhhhhhhhhhhhhhh', 'ffffffffffffff', 8, 'pdata/images/report_snap_shots/12015-06-24-23-23-52.jpg', '2015-06-24 17:53:52', 1);

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
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`country_code`),
  UNIQUE KEY `country_code` (`country_code`)
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
  `audience_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`audience_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `on_banner_marketing`
--

CREATE TABLE IF NOT EXISTS `on_banner_marketing` (
  `rec_aid` int(11) NOT NULL AUTO_INCREMENT,
  `banner_img_path` varchar(255) NOT NULL,
  `title` varchar(150) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `is_active` tinyint(2) NOT NULL,
  PRIMARY KEY (`rec_aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `on_banner_marketing`
--

INSERT INTO `on_banner_marketing` (`rec_aid`, `banner_img_path`, `title`, `link`, `created_on`, `created_by`, `is_active`) VALUES
(0, 'data/banner/tunnel/org/lite-beer.jpg', 'flower2', 'http://designm.ag/inspiration/beautiful-alcohol-related-advertisements-designs/', '2015-04-27 12:48:39', 0, 0),
(1, 'data/banner/tunnel/org/Go5.JPG', 'Advertisement Company', 'http://topnews.us/content/241198-advertisement-company-303-all-set-reach-south-australia', '2015-04-27 12:48:46', 0, 0),
(2, 'data/banner/tunnel/modified/Go5.JPG', 'Advertisement Company', 'http://topnews.us/content/241198-advertisement-company-303-all-set-reach-south-australia', '2015-04-27 12:48:57', 0, 0),
(3, 'data/banner/tunnel/modified/lite-beer.jpg', 'flower2', 'http://designm.ag/inspiration/beautiful-alcohol-related-advertisements-designs/', '2015-04-27 12:49:02', 0, 0),
(4, 'data/banner/tunnel/modified/images.jpeg', 'flower3', 'http://www.brandchannel.com/', '2015-04-27 12:49:06', 0, 0),
(5, 'data/banner/tunnel/org/images.jpeg', 'flower3', 'http://www.brandchannel.com/', '2015-04-27 12:49:09', 0, 0),
(33, '1idmenu.png', 'ffffffffffffffff', 'ssssssssssss', '2015-06-26 07:13:13', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `on_campaigns`
--

CREATE TABLE IF NOT EXISTS `on_campaigns` (
  `campaign_id` int(7) NOT NULL AUTO_INCREMENT,
  `campaign_name` varchar(100) NOT NULL,
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
  `job_title` varchar(100) NOT NULL,
  `language` varchar(45) NOT NULL,
  `nationality` varchar(70) NOT NULL,
  `interest` enum('Infotainment','General','Music','Business','Movies','Sports','Fashion','News') NOT NULL,
  `modules` enum('Click','Tunnel','Buzzin','Netpro','Oneshop','Onevision','ISNews','TravelTime','DealerX','Oneidship') NOT NULL,
  `country_str` text NOT NULL,
  `total_reach` int(11) NOT NULL,
  PRIMARY KEY (`campaign_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `on_campaigns`
--

INSERT INTO `on_campaigns` (`campaign_id`, `campaign_name`, `campign_type`, `campaign_size`, `currency`, `title`, `url`, `size`, `file_path`, `budget`, `source`, `active_on`, `is_active`, `is_payment_done`, `created_by`, `created_on`, `expired_on`, `is_deleted`, `gender`, `city_str`, `age_range`, `job_title`, `language`, `nationality`, `interest`, `modules`, `country_str`, `total_reach`) VALUES
(1, 'medical campaign', 'Click: Page Promotion', '250 * 200 px', 'ARS-Argentina Peso', 'medical campaign title', 'medical campaign url', '300_100', '', 5000, 'Inside', '2015-05-21 05:37:20', 1, 1, 1, '2015-06-24 18:04:58', '0000-00-00 00:00:00', 0, 'All', '', '', '', '', '', '', '', '85', 0),
(2, 'website campaign', 'Banner Marketing', '618 * 222 px', 'ARS-Argentina Peso', 'medical campaign title', 'medical campaign url', '300_100', '', 5000, 'Inside', '2015-05-21 05:37:20', 1, 0, 1, '2015-06-24 18:05:01', '0000-00-00 00:00:00', 0, 'All', '', '', '', '', '', '', '', '85', 0),
(3, 'aaaaa\r\n', '', '', '', '', '', '', '', 0, '', '0000-00-00 00:00:00', 1, 0, 1, '2015-05-21 13:17:15', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', '', 0),
(6, '', 'Banner Marketing', '618 * 222 px', 'AED-United Arab Emirates Dirham', ' sd', 'aaaaaaa', '300_200', '1idmenu.png', 0, 'Inside', '0000-00-00 00:00:00', 0, 0, 1, '2015-06-26 07:06:05', '0000-00-00 00:00:00', 0, 'Male', '', '18 - 25 year', '', '', '', 'Infotainment', 'Click', '', 0),
(7, '', 'Banner Marketing', '618 * 222 px', 'AED-United Arab Emirates Dirham', ' dddddddddddd', 'ssssssssss', '300_200', 'ads.png', 0, 'Inside', '0000-00-00 00:00:00', 0, 0, 1, '2015-06-26 07:08:28', '0000-00-00 00:00:00', 0, 'Male', '', '18 - 25 year', '', '', '', 'Infotainment', 'Click', '', 0),
(8, '', 'Banner Marketing', '618 * 222 px', 'AED-United Arab Emirates Dirham', ' dddddddddddd', 'ssssssssss', '300_200', 'ads.png', 0, 'Inside', '0000-00-00 00:00:00', 0, 0, 1, '2015-06-26 07:08:30', '0000-00-00 00:00:00', 0, 'Male', '', '18 - 25 year', '', '', '', 'Infotainment', 'Click', '', 0),
(9, '', 'Banner Marketing', '618 * 222 px', 'AED-United Arab Emirates Dirham', ' dddddddddddd', 'ssssssssss', '300_200', 'ads.png', 0, 'Inside', '0000-00-00 00:00:00', 0, 0, 1, '2015-06-26 07:08:45', '0000-00-00 00:00:00', 0, 'Male', '', '18 - 25 year', '', '', '', 'Infotainment', 'Click', '', 0),
(10, '', 'Banner Marketing', '618 * 222 px', 'AED-United Arab Emirates Dirham', ' dddddddddddd', 'ssssssssss', '300_200', 'ads.png', 0, 'Inside', '0000-00-00 00:00:00', 0, 0, 1, '2015-06-26 07:08:49', '0000-00-00 00:00:00', 0, 'Male', '', '18 - 25 year', '', '', '', 'Infotainment', 'Click', '', 0),
(11, '', 'Banner Marketing', '618 * 222 px', 'AED-United Arab Emirates Dirham', ' ffffffffffff', 'fffffggggggggggg', '300_200', 'aa.png', 0, 'Inside', '0000-00-00 00:00:00', 0, 0, 1, '2015-06-26 07:11:05', '0000-00-00 00:00:00', 0, 'Male', '', '18 - 25 year', '', '', '', 'Infotainment', 'Click', '', 0),
(12, '', 'Banner Marketing', '618 * 222 px', 'AED-United Arab Emirates Dirham', ' ffffffffffff', 'fffffggggggggggg', '300_200', 'aa.png', 0, 'Inside', '0000-00-00 00:00:00', 0, 0, 1, '2015-06-26 07:11:31', '0000-00-00 00:00:00', 0, 'Male', '', '18 - 25 year', '', '', '', 'Infotainment', 'Click', '', 0),
(13, '', 'Banner Marketing', '618 * 222 px', 'AED-United Arab Emirates Dirham', ' ddddddddddd', 'ddds', '300_200', 'bb.png', 0, 'Inside', '0000-00-00 00:00:00', 0, 0, 1, '2015-06-26 07:11:46', '0000-00-00 00:00:00', 0, 'Male', '', '18 - 25 year', '', '', '', 'Infotainment', 'Click', '', 0),
(14, '', 'Banner Marketing', '618 * 222 px', 'AED-United Arab Emirates Dirham', 'ff', 'sdd', '300_200', '', 0, 'Inside', '0000-00-00 00:00:00', 0, 0, 1, '2015-06-26 07:12:51', '0000-00-00 00:00:00', 0, 'Male', '', '18 - 25 year', '', '', '', 'Infotainment', 'Click', '', 0),
(15, '', 'Banner Marketing', '618 * 222 px', 'AED-United Arab Emirates Dirham', 'ff', 'sdd', '300_200', '', 0, 'Inside', '0000-00-00 00:00:00', 0, 0, 1, '2015-06-26 07:12:58', '0000-00-00 00:00:00', 0, 'Male', '', '18 - 25 year', '', '', '', 'Infotainment', 'Click', '', 0),
(16, '', 'Banner Marketing', '618 * 222 px', 'AED-United Arab Emirates Dirham', 'ffff', 'hhhhhhhhhhhhhhhhhh', '300_200', '', 0, 'Inside', '0000-00-00 00:00:00', 0, 0, 1, '2015-06-26 07:14:00', '0000-00-00 00:00:00', 0, 'Male', '', '18 - 25 year', '', '', '', 'Infotainment', 'Click', '', 0),
(17, '', 'Banner Marketing', '618 * 222 px', 'AED-United Arab Emirates Dirham', 'ffff', 'hhhhhhhhhhhhhhhhhh', '300_200', '', 0, 'Inside', '0000-00-00 00:00:00', 0, 0, 1, '2015-06-26 07:14:04', '0000-00-00 00:00:00', 0, 'Male', '', '18 - 25 year', '', '', '', 'Infotainment', 'Click', '', 0),
(18, '', 'Banner Marketing', '618 * 222 px', 'AED-United Arab Emirates Dirham', 'gggggg', 'ggg', '300_200', '', 0, 'Inside', '0000-00-00 00:00:00', 0, 0, 1, '2015-06-26 07:14:52', '0000-00-00 00:00:00', 0, 'Male', '', '18 - 25 year', '', '', '', 'Infotainment', 'Click', '', 0),
(19, '', 'Banner Marketing', '618 * 222 px', 'AED-United Arab Emirates Dirham', 'ddddddddddd', 'gggggggggg', '300_200', '', 0, 'Inside', '0000-00-00 00:00:00', 0, 0, 1, '2015-06-26 07:17:19', '0000-00-00 00:00:00', 0, 'Male', '', '18 - 25 year', '', '', '', 'Infotainment', 'Click', '', 0),
(20, '', 'Banner Marketing', '618 * 222 px', 'AED-United Arab Emirates Dirham', 'fdfffffffd', 'dddddddddddd', '300_200', '', 0, 'Inside', '0000-00-00 00:00:00', 0, 0, 1, '2015-06-26 07:17:54', '0000-00-00 00:00:00', 0, 'Male', '', '18 - 25 year', '', '', '', 'Infotainment', 'Click', '', 0),
(21, '', 'Banner Marketing', '618 * 222 px', 'AED-United Arab Emirates Dirham', 'ggg', 'ddd', '300_200', '', 0, 'Inside', '0000-00-00 00:00:00', 0, 0, 1, '2015-06-26 07:20:33', '0000-00-00 00:00:00', 0, 'Male', '', '18 - 25 year', '', '', '', 'Infotainment', 'Click', '', 0),
(22, '', 'Banner Marketing', '618 * 222 px', 'AED-United Arab Emirates Dirham', 'hhh', 'jjjj', '300_200', '', 0, 'Inside', '0000-00-00 00:00:00', 0, 0, 1, '2015-06-26 09:47:17', '0000-00-00 00:00:00', 0, 'Male', '', '18 - 25 year', '', '', '', 'Infotainment', 'Click', '', 0),
(23, '', 'Banner Marketing', '618 * 222 px', 'AED-United Arab Emirates Dirham', 'gggdsfff', 'ggg', '300_200', '', 0, 'Inside', '0000-00-00 00:00:00', 0, 0, 1, '2015-06-26 10:05:27', '0000-00-00 00:00:00', 0, 'Male', '', '18 - 25 year', '', '', '', 'Infotainment', 'Click', '', 0),
(24, '', 'Banner Marketing', '618 * 222 px', 'AED-United Arab Emirates Dirham', 'gg', 'ggg', '300_200', '', 0, 'Inside', '0000-00-00 00:00:00', 0, 0, 1, '2015-06-26 10:58:30', '0000-00-00 00:00:00', 0, 'Male', '', '18 - 25 year', '', '', '', 'Infotainment', 'Click', '', 0);

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
  `age_wise_reach` text NOT NULL,
  `close_count` int(11) NOT NULL,
  `last_update_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`campaign_id_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `on_campaign_roi`
--

INSERT INTO `on_campaign_roi` (`campaign_id_fk`, `total_reach`, `total_module_wise_reach`, `actual_module_wise_reach`, `not_interested_count`, `irrevalent_count`, `repetitive_count`, `male_reach`, `female_reach`, `country_wise_reach`, `age_wise_reach`, `close_count`, `last_update_on`) VALUES
(1, 500000, '{"Click":"500","Tunnel":"200"}', '{"Click":"100","Tunnel":"20"}', 5, 6, 8, 9, 12, 'india', '', 2, '2015-06-24 17:59:34'),
(2, 300000, '{"Buzzin":"500","Tunnel":"200"}', '{"Buzzin":"100","Tunnel":"20"}', 5, 6, 8, 9, 12, ' 	india', '', 2, '2015-06-24 17:59:54'),
(3, 0, '', '', 0, 0, 0, 0, 0, ' 	india', '', 0, '2015-06-24 17:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `on_campaign_targets`
--

CREATE TABLE IF NOT EXISTS `on_campaign_targets` (
  `campaign_id_fk` int(11) NOT NULL,
  `user_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `on_database_marketing`
--

CREATE TABLE IF NOT EXISTS `on_database_marketing` (
  `rec_aid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) NOT NULL,
  `recipient_email_address` text NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `content_type` enum('text/plain','text/html') NOT NULL,
  `audlab_id_fk` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`rec_aid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `on_database_stats`
--

CREATE TABLE IF NOT EXISTS `on_database_stats` (
  `adv_id` int(11) NOT NULL,
  `people_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
