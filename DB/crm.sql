-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 05, 2022 at 06:44 AM
-- Server version: 5.7.36
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `apps_countries`
--

DROP TABLE IF EXISTS `apps_countries`;
CREATE TABLE IF NOT EXISTS `apps_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=296 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apps_countries`
--

INSERT INTO `apps_countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People\'s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People\'s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'ES', 'Spain'),
(203, 'LK', 'Sri Lanka'),
(204, 'SH', 'St. Helena'),
(205, 'PM', 'St. Pierre and Miquelon'),
(206, 'SD', 'Sudan'),
(207, 'SR', 'Suriname'),
(208, 'SJ', 'Svalbard and Jan Mayen Islands'),
(209, 'SZ', 'Swaziland'),
(210, 'SE', 'Sweden'),
(211, 'CH', 'Switzerland'),
(212, 'SY', 'Syrian Arab Republic'),
(213, 'TW', 'Taiwan'),
(214, 'TJ', 'Tajikistan'),
(215, 'TZ', 'Tanzania, United Republic of'),
(216, 'TH', 'Thailand'),
(217, 'TG', 'Togo'),
(218, 'TK', 'Tokelau'),
(219, 'TO', 'Tonga'),
(220, 'TT', 'Trinidad and Tobago'),
(221, 'TN', 'Tunisia'),
(222, 'TR', 'Turkey'),
(223, 'TM', 'Turkmenistan'),
(224, 'TC', 'Turks and Caicos Islands'),
(225, 'TV', 'Tuvalu'),
(226, 'UG', 'Uganda'),
(227, 'UA', 'Ukraine'),
(228, 'AE', 'United Arab Emirates'),
(229, 'GB', 'United Kingdom'),
(230, 'US', 'United States'),
(231, 'UM', 'United States minor outlying islands'),
(232, 'UY', 'Uruguay'),
(233, 'UZ', 'Uzbekistan'),
(234, 'VU', 'Vanuatu'),
(235, 'VA', 'Vatican City State'),
(236, 'VE', 'Venezuela'),
(237, 'VN', 'Vietnam'),
(238, 'VG', 'Virgin Islands (British)'),
(239, 'VI', 'Virgin Islands (U.S.)'),
(240, 'WF', 'Wallis and Futuna Islands'),
(241, 'EH', 'Western Sahara'),
(242, 'YE', 'Yemen'),
(243, 'ZR', 'Zaire'),
(244, 'ZM', 'Zambia'),
(245, 'ZW', 'Zimbabwe'),
(246, 'AF', 'Afghanistan'),
(247, 'AL', 'Albania'),
(248, 'DZ', 'Algeria'),
(249, 'DS', 'American Samoa'),
(250, 'AD', 'Andorra'),
(251, 'AO', 'Angola'),
(252, 'AI', 'Anguilla'),
(253, 'AQ', 'Antarctica'),
(254, 'AG', 'Antigua and Barbuda'),
(255, 'AR', 'Argentina'),
(256, 'AM', 'Armenia'),
(257, 'AW', 'Aruba'),
(258, 'AU', 'Australia'),
(259, 'AT', 'Austria'),
(260, 'AZ', 'Azerbaijan'),
(261, 'BS', 'Bahamas'),
(262, 'BH', 'Bahrain'),
(263, 'BD', 'Bangladesh'),
(264, 'BB', 'Barbados'),
(265, 'BY', 'Belarus'),
(266, 'BE', 'Belgium'),
(267, 'BZ', 'Belize'),
(268, 'BJ', 'Benin'),
(269, 'BM', 'Bermuda'),
(270, 'BT', 'Bhutan'),
(271, 'BO', 'Bolivia'),
(272, 'BA', 'Bosnia and Herzegovina'),
(273, 'BW', 'Botswana'),
(274, 'BV', 'Bouvet Island'),
(275, 'BR', 'Brazil'),
(276, 'IO', 'British Indian Ocean Territory'),
(277, 'BN', 'Brunei Darussalam'),
(278, 'BG', 'Bulgaria'),
(279, 'BF', 'Burkina Faso'),
(280, 'BI', 'Burundi'),
(281, 'KH', 'Cambodia'),
(282, 'CM', 'Cameroon'),
(283, 'CA', 'Canada'),
(284, 'CV', 'Cape Verde'),
(285, 'KY', 'Cayman Islands'),
(286, 'CF', 'Central African Republic'),
(287, 'TD', 'Chad'),
(288, 'CL', 'Chile'),
(289, 'CN', 'China'),
(290, 'CX', 'Christmas Island'),
(291, 'CC', 'Cocos (Keeling) Islands'),
(292, 'CO', 'Colombia'),
(293, 'KM', 'Comoros'),
(294, 'CG', 'Congo'),
(295, 'CK', 'Cook Islands');

-- --------------------------------------------------------

--
-- Table structure for table `check_trade`
--

DROP TABLE IF EXISTS `check_trade`;
CREATE TABLE IF NOT EXISTS `check_trade` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `l_id` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `gstin` varchar(50) DEFAULT NULL,
  `iec` varchar(100) DEFAULT NULL,
  `pan` varchar(50) DEFAULT NULL,
  `cin` varchar(100) DEFAULT NULL,
  `dl` varchar(100) DEFAULT NULL,
  `scode` varchar(20) NOT NULL,
  `state` varchar(100) NOT NULL,
  `df` tinyint(1) DEFAULT '0',
  `ip` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `f_type`
--

DROP TABLE IF EXISTS `f_type`;
CREATE TABLE IF NOT EXISTS `f_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `df` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f_type`
--

INSERT INTO `f_type` (`id`, `name`, `df`) VALUES
(1, 'Phone Call', 0),
(2, 'Mail', 0),
(4, 'Social Media', 0),
(5, 'Meeitng', 0);

-- --------------------------------------------------------

--
-- Table structure for table `india`
--

DROP TABLE IF EXISTS `india`;
CREATE TABLE IF NOT EXISTS `india` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(200) DEFAULT NULL,
  `key_id` varchar(200) DEFAULT NULL,
  `last_date` date DEFAULT NULL,
  `last_time` time NOT NULL,
  `c_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lead_company_detail`
--

DROP TABLE IF EXISTS `lead_company_detail`;
CREATE TABLE IF NOT EXISTS `lead_company_detail` (
  `id` bigint(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `mobile` varchar(200) DEFAULT NULL,
  `mobile2` varchar(200) DEFAULT NULL,
  `address` text,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `country` int(11) NOT NULL DEFAULT '99',
  `website` varchar(200) DEFAULT NULL,
  `c_person` varchar(200) DEFAULT NULL,
  `description` text,
  `lead_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lead_master`
--

DROP TABLE IF EXISTS `lead_master`;
CREATE TABLE IF NOT EXISTS `lead_master` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `serial` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  `source` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `assign_for` varchar(200) NOT NULL,
  `priority` varchar(100) NOT NULL,
  `contact_date` date DEFAULT NULL,
  `close` int(1) NOT NULL DEFAULT '0',
  `customer` tinyint(1) NOT NULL DEFAULT '0',
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `l_date` date NOT NULL,
  `f_type` varchar(100) NOT NULL,
  `f_by` varchar(100) NOT NULL,
  `descr` text NOT NULL,
  `l_id` varchar(100) NOT NULL,
  `f_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `source`
--

DROP TABLE IF EXISTS `source`;
CREATE TABLE IF NOT EXISTS `source` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `df` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `source`
--

INSERT INTO `source` (`id`, `name`, `df`) VALUES
(1, 'Website', 0),
(2, 'D2D Marketing', 0),
(3, 'Trade India', 0),
(4, 'India Mart', 0),
(5, 'Phone Call', 0),
(6, 'CST', 0),
(7, 'Other', 0),
(8, 'Bulk Mail', 0),
(9, 'Medicus', 0),
(10, 'Noreply@TradeIndia', 0),
(11, 'kiyan Reference', 0);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(1, 'Andaman and Nicobar Islands', 101),
(2, 'Andhra Pradesh', 101),
(3, 'Arunachal Pradesh', 101),
(4, 'Assam', 101),
(5, 'Bihar', 101),
(6, 'Chandigarh', 101),
(7, 'Chhattisgarh', 101),
(8, 'Dadra and Nagar Haveli', 101),
(9, 'Daman and Diu', 101),
(10, 'Delhi', 101),
(11, 'Goa', 101),
(12, 'Gujarat', 101),
(13, 'Haryana', 101),
(14, 'Himachal Pradesh', 101),
(15, 'Jammu and Kashmir', 101),
(16, 'Jharkhand', 101),
(17, 'Karnataka', 101),
(18, 'Kenmore', 101),
(19, 'Kerala', 101),
(20, 'Lakshadweep', 101),
(21, 'Madhya Pradesh', 101),
(22, 'Maharashtra', 101),
(23, 'Manipur', 101),
(24, 'Meghalaya', 101),
(25, 'Mizoram', 101),
(26, 'Nagaland', 101),
(27, 'Narora', 101),
(28, 'Natwar', 101),
(29, 'Odisha', 101),
(30, 'Paschim Medinipur', 101),
(31, 'Pondicherry', 101),
(32, 'Punjab', 101),
(33, 'Rajasthan', 101),
(34, 'Sikkim', 101),
(35, 'Tamil Nadu', 101),
(36, 'Telangana', 101),
(37, 'Tripura', 101),
(38, 'Uttar Pradesh', 101),
(39, 'Uttarakhand', 101),
(40, 'Vaishali', 101),
(41, 'West Bengal', 101);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `df` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `df`) VALUES
(1, 'New', 0),
(2, 'Contacted', 0),
(3, 'Active', 0),
(4, 'Open', 0),
(7, 'Booked', 0),
(8, 'Cancel', 0),
(9, 'Not related', 0);

-- --------------------------------------------------------

--
-- Table structure for table `trade_india`
--

DROP TABLE IF EXISTS `trade_india`;
CREATE TABLE IF NOT EXISTS `trade_india` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(200) DEFAULT NULL,
  `profile_id` varchar(200) DEFAULT NULL,
  `key_id` varchar(200) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `c_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(200) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `auth` int(1) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `df` tinyint(1) NOT NULL DEFAULT '0',
  `c_id` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user`, `email`, `name`, `image`, `password`, `mobile`, `auth`, `created_by`, `df`, `c_id`) VALUES
(1, 'administrator', 'admin@gmail.com', 'SuperAdmin', 'image/af462ecb1983417cc051c002e07354f71.png', 'administrator', '9999999999', 0, '1', 0, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
