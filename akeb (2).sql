-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 05, 2020 at 03:09 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akeb`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=247 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`) VALUES
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
(49, 'CD', 'Democratic Republic of the Congo'),
(50, 'CG', 'Republic of Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GK', 'Guernsey'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard and Mc Donald Islands'),
(96, 'HN', 'Honduras'),
(97, 'HK', 'Hong Kong'),
(98, 'HU', 'Hungary'),
(99, 'IS', 'Iceland'),
(100, 'IN', 'India'),
(101, 'IM', 'Isle of Man'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran (Islamic Republic of)'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'CI', 'Ivory Coast'),
(109, 'JE', 'Jersey'),
(110, 'JM', 'Jamaica'),
(111, 'JP', 'Japan'),
(112, 'JO', 'Jordan'),
(113, 'KZ', 'Kazakhstan'),
(114, 'KE', 'Kenya'),
(115, 'KI', 'Kiribati'),
(116, 'KP', 'Korea, Democratic People\'s Republic of'),
(117, 'KR', 'Korea, Republic of'),
(118, 'XK', 'Kosovo'),
(119, 'KW', 'Kuwait'),
(120, 'KG', 'Kyrgyzstan'),
(121, 'LA', 'Lao People\'s Democratic Republic'),
(122, 'LV', 'Latvia'),
(123, 'LB', 'Lebanon'),
(124, 'LS', 'Lesotho'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libyan Arab Jamahiriya'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lithuania'),
(129, 'LU', 'Luxembourg'),
(130, 'MO', 'Macau'),
(131, 'MK', 'North Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MW', 'Malawi'),
(134, 'MY', 'Malaysia'),
(135, 'MV', 'Maldives'),
(136, 'ML', 'Mali'),
(137, 'MT', 'Malta'),
(138, 'MH', 'Marshall Islands'),
(139, 'MQ', 'Martinique'),
(140, 'MR', 'Mauritania'),
(141, 'MU', 'Mauritius'),
(142, 'TY', 'Mayotte'),
(143, 'MX', 'Mexico'),
(144, 'FM', 'Micronesia, Federated States of'),
(145, 'MD', 'Moldova, Republic of'),
(146, 'MC', 'Monaco'),
(147, 'MN', 'Mongolia'),
(148, 'ME', 'Montenegro'),
(149, 'MS', 'Montserrat'),
(150, 'MA', 'Morocco'),
(151, 'MZ', 'Mozambique'),
(152, 'MM', 'Myanmar'),
(153, 'NA', 'Namibia'),
(154, 'NR', 'Nauru'),
(155, 'NP', 'Nepal'),
(156, 'NL', 'Netherlands'),
(157, 'AN', 'Netherlands Antilles'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Reunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'KN', 'Saint Kitts and Nevis'),
(186, 'LC', 'Saint Lucia'),
(187, 'VC', 'Saint Vincent and the Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'SB', 'Solomon Islands'),
(200, 'SO', 'Somalia'),
(201, 'ZA', 'South Africa'),
(202, 'GS', 'South Georgia South Sandwich Islands'),
(203, 'SS', 'South Sudan'),
(204, 'ES', 'Spain'),
(205, 'LK', 'Sri Lanka'),
(206, 'SH', 'St. Helena'),
(207, 'PM', 'St. Pierre and Miquelon'),
(208, 'SD', 'Sudan'),
(209, 'SR', 'Suriname'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands'),
(211, 'SZ', 'Swaziland'),
(212, 'SE', 'Sweden'),
(213, 'CH', 'Switzerland'),
(214, 'SY', 'Syrian Arab Republic'),
(215, 'TW', 'Taiwan'),
(216, 'TJ', 'Tajikistan'),
(217, 'TZ', 'Tanzania, United Republic of'),
(218, 'TH', 'Thailand'),
(219, 'TG', 'Togo'),
(220, 'TK', 'Tokelau'),
(221, 'TO', 'Tonga'),
(222, 'TT', 'Trinidad and Tobago'),
(223, 'TN', 'Tunisia'),
(224, 'TR', 'Turkey'),
(225, 'TM', 'Turkmenistan'),
(226, 'TC', 'Turks and Caicos Islands'),
(227, 'TV', 'Tuvalu'),
(228, 'UG', 'Uganda'),
(229, 'UA', 'Ukraine'),
(230, 'AE', 'United Arab Emirates'),
(231, 'GB', 'United Kingdom'),
(232, 'US', 'United States'),
(233, 'UM', 'United States minor outlying islands'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VU', 'Vanuatu'),
(237, 'VA', 'Vatican City State'),
(238, 'VE', 'Venezuela'),
(239, 'VN', 'Vietnam'),
(240, 'VG', 'Virgin Islands (British)'),
(241, 'VI', 'Virgin Islands (U.S.)'),
(242, 'WF', 'Wallis and Futuna Islands'),
(243, 'EH', 'Western Sahara'),
(244, 'YE', 'Yemen'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

DROP TABLE IF EXISTS `educations`;
CREATE TABLE IF NOT EXISTS `educations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `from` year(4) NOT NULL,
  `to` year(4) NOT NULL,
  `level` varchar(225) NOT NULL,
  `course` varchar(225) DEFAULT NULL,
  `institution` varchar(225) NOT NULL,
  `school_category` varchar(225) NOT NULL,
  `country` varchar(3) NOT NULL,
  `city` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `student_id`, `from`, `to`, `level`, `course`, `institution`, `school_category`, `country`, `city`) VALUES
(1, 1, 2009, 2020, 'primary', NULL, 'gjhjgh', 'necta', '', ''),
(2, 1, 2009, 2020, 'primary', NULL, 'gjhjgh', 'necta', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`) VALUES
(1, 'Dar Es Salaam'),
(2, 'Morogoro'),
(3, 'Zanzibar'),
(4, 'Mwanza'),
(5, 'Mbeya'),
(6, 'Dodoma'),
(7, 'Kagera '),
(8, 'Mtwara'),
(9, 'Tanga'),
(10, 'Singida');

-- --------------------------------------------------------

--
-- Table structure for table `school_categories`
--

DROP TABLE IF EXISTS `school_categories`;
CREATE TABLE IF NOT EXISTS `school_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `level` int(11) NOT NULL,
  `years` int(11) NOT NULL,
  `result_type` varchar(30) NOT NULL,
  `school_year_start` int(11) NOT NULL,
  `school_year_end` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school_levels`
--

DROP TABLE IF EXISTS `school_levels`;
CREATE TABLE IF NOT EXISTS `school_levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `_id` int(11) DEFAULT NULL,
  `family_id` varchar(225) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `middle_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `nationality` varchar(3) NOT NULL,
  `residence_country` varchar(3) NOT NULL,
  `residence_city` varchar(225) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `ismaili` tinyint(1) NOT NULL,
  `jk` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `income` varchar(225) NOT NULL,
  `dob` date NOT NULL,
  `data` tinyint(1) NOT NULL,
  `computer` tinyint(1) NOT NULL,
  `english` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `_id`, `family_id`, `first_name`, `middle_name`, `last_name`, `nationality`, `residence_country`, `residence_city`, `gender`, `ismaili`, `jk`, `email`, `phone`, `income`, `dob`, `data`, `computer`, `english`, `created`) VALUES
(11, 11, '10002', 'Sameen', 'Alnoor', 'Merali', 'Tan', 'Tan', 'Dar es Salaam', 'Male', 1, 'Kariakoo', '', '', '0', '1999-01-21', 1, 1, 1, '2020-02-05 02:20:51'),
(10, 0, '10005', 'Saima', 'Mehboob', 'Madha', 'Tan', 'Tan', 'Dar es Salaam', 'Female', 1, 'Kariakoo', 'saimamadha@hotmail.com', '', '0', '1995-11-10', 1, 1, 1, '2020-02-05 01:58:50'),
(9, 0, '10002', 'Sameen', 'Alnoor', 'Merali', 'Tan', 'Tan', 'Dar es Salaam', 'Male', 1, 'Kariakoo', '', '', '0', '1999-01-21', 1, 1, 1, '2020-02-05 01:58:50'),
(12, 12, '10005', 'Saima', 'Mehboob', 'Madha', 'Tan', 'Tan', 'Dar es Salaam', 'Female', 1, 'Kariakoo', 'saimamadha@hotmail.com', '', '0', '1995-11-10', 1, 1, 1, '2020-02-05 02:16:00'),
(13, 13, '10005', 'Mehjabeen', 'Mehboob', 'Madha', 'Tan', 'Tan', 'Dar es Salaam', 'Female', 1, 'Kariakoo', 'mejumadha@gmail.com', '', '0', '1997-11-17', 1, 1, 1, '2020-02-05 02:16:00'),
(14, 14, '10005', 'Saima', 'Mehboob', 'Madha', 'Tan', 'Tan', 'Dar es Salaam', 'Female', 1, 'Kariakoo', 'saimamadha@hotmail.com', '', '0', '1995-11-10', 1, 1, 1, '2020-02-05 02:16:33'),
(15, 15, '10005', 'Saima', 'Mehboob', 'Madha', 'Tan', 'Tan', 'Dar es Salaam', 'Female', 1, 'Kariakoo', 'saimamadha@hotmail.com', '', '0', '1995-11-10', 1, 1, 1, '2020-02-05 02:20:51'),
(16, 16, '10005', 'Mehjabeen', 'Mehboob', 'Madha', 'Tan', 'Tan', 'Dar es Salaam', 'Female', 1, 'Kariakoo', 'mejumadha@gmail.com', '', '0', '1997-11-17', 1, 1, 1, '2020-02-05 02:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `tz` varchar(5) NOT NULL,
  `type` varchar(225) NOT NULL,
  `region` int(11) DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_email` (`email`),
  UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `uc_remember_selector` (`remember_selector`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `tz`, `type`, `region`, `location`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$LNZPcI6SpiUM31wYzFvyIOExCCbRYDAeDMixRCGINch7EamWDjLRa', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1580854470, 1, 'Admin', 'istrator', 'ADMIN', '0', '', 'admin', 1, 1),
(2, '127.0.0.1', 'mryoungtommy@gmail.com', '$2y$10$9Xz.60LEdBicYO4k5HroS.jd9Gc4Yf6OpVQG3ILfhQGlG4GbYDYDi', 'mryoungtommy@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1550496517, NULL, 1, 'thomas', 'kidumbuyo', NULL, '0719532004', '', 'seller', NULL, NULL),
(14, '::1', 'thomasalex37@rocketmail.com', '$2y$10$wbu.0pslQSbprKz4Ht6gJ.aeyUszyG9EwVeHX7scYX6v1jAwrxgzC', 'thomasalex37@rocketmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1550828141, NULL, 1, 'thomas', 'kidumbuyo', NULL, '0738234452', '', 'agent', NULL, NULL),
(15, '127.0.0.1', 'h@fgf.om', '$2y$10$iRw0CUsuySxkoCMLh9BMN.9179LrKu0fZFwb.wGC1GulOZKz4T6Y2', 'h@fgf.om', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1561419662, 1562161059, 1, 'thomas', 'h', NULL, '1212', '', 'seller', NULL, NULL),
(16, '127.0.0.1', 'ad@ad.ad', '$2y$10$0KCcztz03qOJ.Yw/BGlqCuYRjVgriagBiM3auaFGC6/7Qu3FYWSgi', 'ad@ad.ad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1561420178, 1561548308, 1, 'gfg', 'bnvn', NULL, '123456', '', 'agent', NULL, NULL),
(17, '::1', 'admin@rocketmail.com', '$2y$10$rpQ8iDNp5wf/up1wmLnr3u0CUdai/XpO6i3NZEJjODSV9JOrQej8u', 'admin@rocketmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1572906429, 1572906462, 1, 'agent', 'sample', NULL, '234234', '', 'agent', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(15, 14, 2),
(16, 15, 2),
(17, 16, 2),
(18, 17, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
