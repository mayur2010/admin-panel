-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 21, 2022 at 11:28 AM
-- Server version: 8.0.30-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u896408170_vc_vpn`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_active_log`
--

CREATE TABLE `tbl_active_log` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `date_time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_active_log`
--

INSERT INTO `tbl_active_log` (`id`, `user_id`, `date_time`) VALUES
(5, 9, '1627467515'),
(7, 12, '1628247846'),
(8, 13, '1656649478'),
(9, 14, '1629460644'),
(10, 15, '1629784707'),
(11, 16, '1629859650'),
(12, 17, '1629812613'),
(13, 18, '1647667759'),
(14, 20, '1629924830'),
(15, 21, '1629996271'),
(16, 22, '1630022109'),
(18, 24, '1630233455'),
(19, 25, '1630240733'),
(20, 26, '1642771091'),
(21, 28, '1630964675'),
(22, 29, '1631003387'),
(23, 30, '1634545283'),
(24, 31, '1631584189'),
(25, 32, '1643038534'),
(26, 33, '1640879033'),
(27, 34, '1632893947'),
(28, 35, '1633311550'),
(29, 36, '1633451709'),
(30, 37, '1634354332'),
(31, 39, '1634416607'),
(32, 40, '1634815452'),
(33, 41, '1634820338'),
(34, 42, '1647785396'),
(35, 43, '1634820447'),
(36, 44, '1640428508'),
(37, 45, '1641406413'),
(38, 46, '1641513393'),
(39, 47, '1641654807'),
(40, 48, '1641654946'),
(41, 49, '1641798062'),
(42, 50, '1651385873'),
(43, 51, '1642633259'),
(44, 53, '1651611775'),
(45, 54, '1642994126'),
(46, 55, '1643108933'),
(47, 56, '1646676617'),
(48, 57, '1643440898'),
(49, 58, '1643554606'),
(50, 59, '1643807345'),
(51, 60, '1645299653'),
(52, 61, '1644741358'),
(53, 62, '1644585053'),
(54, 64, '1644819598'),
(55, 65, '1644997903'),
(56, 66, '1644838825'),
(57, 67, '1646635065'),
(58, 68, '1645246289'),
(59, 69, '1653152349'),
(60, 70, '1645541588'),
(61, 72, '1646416055'),
(62, 73, '1646303146'),
(63, 74, '1645934633'),
(64, 76, '1646735555'),
(65, 77, '1646766225'),
(66, 78, '1646903014'),
(67, 79, '1647683345'),
(68, 80, '1650986933'),
(69, 81, '1647479299'),
(70, 86, '1648120084'),
(71, 87, '1648524621'),
(72, 88, '1648579139'),
(73, 89, '1648545899'),
(74, 92, '1649507356'),
(75, 96, '1653229591'),
(76, 98, '1649838163'),
(77, 101, '1650248624'),
(78, 103, '1651151955'),
(79, 104, '1654516698'),
(80, 105, '1652802090'),
(81, 106, '1652890033'),
(82, 107, '1653108861'),
(83, 108, '1656305894'),
(84, 110, '1656498660'),
(85, 112, '1656669840'),
(87, 114, '1656583594'),
(90, 118, '1656584748'),
(91, 119, '1656584791'),
(92, 120, '1656585327'),
(93, 121, '1656653040'),
(94, 122, '1656668147'),
(95, 123, '1656653071'),
(96, 124, '1656659911'),
(97, 125, '1656744686');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `email`, `image`) VALUES
(1, 'admin', 'Admin@12345', 'example@gmail.com', '85826_jan-kopriva-RPN81TBxIXE-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_apps`
--

CREATE TABLE `tbl_apps` (
  `id` int NOT NULL,
  `app_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_category_id` int NOT NULL,
  `page_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'true',
  `privacy_policy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qureka_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qureka_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'true',
  `random_ads_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'true',
  `ads_type_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ads_1_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'true',
  `banner_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `inter_id_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `native_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_native_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_ads_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `back_inter_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ads_type_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ads_2_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'true',
  `banner_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `inter_id_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `native_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_native_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_ads_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `back_inter_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ads_type_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ads_3_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'true',
  `banner_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `inter_id_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `native_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_native_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_ads_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `back_inter_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_ads_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'true',
  `back_ads_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'true',
  `in_min` int NOT NULL,
  `in_max` int NOT NULL,
  `back_min` int NOT NULL,
  `back_max` int NOT NULL,
  `vpn_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'true',
  `vpn_country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vpn_country_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'true',
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'true',
  `start_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_apps`
--

INSERT INTO `tbl_apps` (`id`, `app_name`, `package_name`, `page_category_id`, `page_status`, `privacy_policy`, `qureka_link`, `qureka_status`, `random_ads_status`, `ads_type_1`, `ads_1_status`, `banner_1`, `inter_id_1`, `native_1`, `full_native_1`, `open_ads_1`, `back_inter_1`, `ads_type_2`, `ads_2_status`, `banner_2`, `inter_id_2`, `native_2`, `full_native_2`, `open_ads_2`, `back_inter_2`, `ads_type_3`, `ads_3_status`, `banner_3`, `inter_id_3`, `native_3`, `full_native_3`, `open_ads_3`, `back_inter_3`, `in_ads_status`, `back_ads_status`, `in_min`, `in_max`, `back_min`, `back_max`, `vpn_status`, `vpn_country`, `vpn_country_key`, `location_status`, `location`, `time_status`, `start_time`, `end_time`, `status`) VALUES
(8, 'merge master', 'com.test.sahil', 1, 'false', 'asdhgajskd', 'ajdghajskgdas', 'true', 'false', 'Google', 'true', '12dad6925', 'dfgdfg', 'dfgdfg', '', 'ca-app-pub-3940256099942544/3419835294', '1', 'Google', 'false', 'ads', 'adasd', 'asdasdas', '', 'adasd', 'adasd', 'Google', 'false', 'adasd', 'adasd', 'asdasd', '', 'adas', 'aasd', 'false', 'false', 1, 2, 1, 2, 'true', '7', '4', 'false', 'Pakistan', 'false', '10:33', '13:35', 1),
(9, 'merge master', 'com.merge.master.game3D', 1, 'false', 'asdhgajskd', 'ajdghajskgdas', 'true', 'false', 'Google', 'true', '12dad6925', 'inter', 'nativ', '', 'ca-app-pub-3940256099942544/3419835294', '1', 'Google', 'false', 'ads', 'adasd', 'asdasdas', '', 'adasd', 'adasd', 'Google', 'false', 'adasd', 'adasd', 'asdasd', '', 'adas', 'aasd', 'false', 'false', -1, 1, 1, -1, 'false', '7', '4', 'false', 'pakistan', 'false', '17:21', '17:26', 1),
(10, 'merge master', 'com.merge.master.dino.game', 1, 'false', 'asdhgajskd', 'ajdghajskgdas', 'false', 'false', 'Google', 'true', '12dad6925', 'inter', 'nativ', '', 'ca-app-pub-3940256099942544/3419835294', '1', 'Google', 'false', 'ads', 'adasd', 'asdasdas', '', 'adasd', 'adasd', 'Google', 'false', 'adasd', 'adasd', 'asdasd', '', 'adas', 'aasd', 'false', 'false', 1, 1, 1, 1, 'false', '7', '4', 'false', 'Pakistan', 'false', '22:50', '22:55', 1),
(11, 'snake io', 'com.snack.io.game.snack', 1, 'false', 'asdhgajskd', 'ajdghajskgdas', 'false', 'false', 'Google', 'true', '12dad6925', 'inter', 'ca-app-pub-3940256099942544/6300978111', '', 'ca-app-pub-3940256099942544/3419835294', 'on', 'Google', 'false', 'ads', 'adasd', 'asdasdas', '', 'adasd', 'adasd', 'Google', 'false', 'adasd', 'adasd', '', '', 'adas', 'aasd', 'false', 'false', 1, 1, 1, 1, 'false', '7', '4', 'false', 'pakistan,IN', 'false', '13:48', '15:50', 1),
(12, 'snake io2', 'com.snack.io.game.snack2', 1, 'false', 'asdhgajskd', 'ajdghajskgdas', 'false', 'false', 'Google', 'true', '12dad6925', 'inter', 'ca-app-pub-3940256099942544/6300978111', '', 'ca-app-pub-3940256099942544/3419835294', '1', 'Google', 'false', 'ads', 'adasd', 'asdasdas', '', 'adasd', 'adasd', 'Google', 'false', 'adasd', 'adasd', 'asdasd', '', 'adas', 'aasd', 'false', 'false', 2, 1, 2, 1, 'true', '7', '4', 'false', 'India,pakistN,IN', 'false', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_block_users`
--

CREATE TABLE `tbl_block_users` (
  `id` int NOT NULL,
  `device_ids` text NOT NULL,
  `package_ids` text NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_block_users`
--

INSERT INTO `tbl_block_users` (`id`, `device_ids`, `package_ids`, `status`) VALUES
(3, '1010,1010,1010,1010', 'com.snack.io.game.snack', 1),
(4, '3ff5ab65b69dd8d8,3ff5ab65b69dd8d8,3ff5ab65b69dd8d8', 'com.snack.io.game.snack2', 1),
(5, '3ff5ab65b69dd8d8,3ff5ab65b69dd8d8,3ff5ab65b69dd8d8,a21c3f87606f778b', 'com.merge.master.game3D', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `id` int NOT NULL,
  `country_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`id`, `country_name`, `status`) VALUES
(1, 'India', 1),
(2, 'Canada', 1),
(3, 'Germany', 1),
(4, 'Pakistan', 1),
(5, 'China', 1),
(6, 'Nepal', 1),
(7, 'us', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `id` int NOT NULL,
  `pc_id` int NOT NULL,
  `page_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`id`, `pc_id`, `page_text`, `status`) VALUES
(1, 1, 'Page 1', 1),
(2, 1, 'Page 2', 1),
(3, 1, 'Page 3', 1),
(4, 2, 'Page 1', 1),
(5, 2, 'Page 2', 1),
(6, 2, 'Page 3', 1),
(7, 3, 'Page 1', 1),
(8, 3, 'Page 2', 1),
(9, 3, 'Page 3', 1),
(10, 4, 'Page 1', 1),
(11, 4, 'Page 2', 1),
(12, 4, 'Page 3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page_category`
--

CREATE TABLE `tbl_page_category` (
  `id` int NOT NULL,
  `page_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_page_category`
--

INSERT INTO `tbl_page_category` (`id`, `page_name`, `page_color`, `status`) VALUES
(1, 'App Name 1', '#FF5C1D', 1),
(2, 'App Name 2', '#7CFF22', 1),
(3, 'App Name 3', '#5271FF', 1),
(4, 'App Name 4', '#76FFD0', 1),
(19, 'demo', '#2F75E9', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int NOT NULL,
  `envato_buyer_name` varchar(255) NOT NULL,
  `envato_purchase_code` varchar(255) NOT NULL,
  `envato_buyer_email` varchar(150) NOT NULL,
  `envato_purchased_status` int NOT NULL DEFAULT '0',
  `package_name` varchar(255) NOT NULL,
  `onesignal_app_id` varchar(500) NOT NULL,
  `onesignal_rest_key` varchar(500) NOT NULL,
  `email_from` varchar(255) NOT NULL,
  `app_name` varchar(255) NOT NULL,
  `app_logo` varchar(255) NOT NULL,
  `app_email` varchar(255) NOT NULL,
  `app_version` varchar(255) NOT NULL,
  `app_author` varchar(255) NOT NULL,
  `app_contact` varchar(255) NOT NULL,
  `app_website` varchar(255) NOT NULL,
  `app_description` text NOT NULL,
  `app_developed_by` varchar(255) NOT NULL,
  `app_privacy_policy` text NOT NULL,
  `api_latest_limit` int NOT NULL,
  `api_cat_order_by` varchar(255) NOT NULL,
  `api_cat_post_order_by` varchar(255) NOT NULL,
  `publisher_id` varchar(500) NOT NULL,
  `interstital_ad` varchar(500) NOT NULL,
  `interstital_ad_id` varchar(500) NOT NULL,
  `interstital_ad_click` varchar(500) NOT NULL,
  `banner_ad` varchar(500) NOT NULL,
  `banner_ad_id` varchar(500) NOT NULL,
  `banner_ad_type` varchar(30) NOT NULL DEFAULT 'admob',
  `banner_facebook_id` text NOT NULL,
  `interstital_ad_type` varchar(30) NOT NULL DEFAULT 'admob',
  `interstital_facebook_id` text NOT NULL,
  `native_ad` varchar(20) NOT NULL DEFAULT 'false',
  `native_ad_type` varchar(30) NOT NULL DEFAULT 'admob',
  `native_ad_id` text NOT NULL,
  `native_facebook_id` text NOT NULL,
  `native_position` int NOT NULL DEFAULT '5',
  `app_update_status` varchar(10) NOT NULL DEFAULT 'false',
  `app_new_version` double NOT NULL DEFAULT '1',
  `app_update_desc` text NOT NULL,
  `app_redirect_url` text NOT NULL,
  `cancel_update_status` varchar(10) NOT NULL DEFAULT 'false',
  `song_download` varchar(255) NOT NULL DEFAULT 'true',
  `book_coins` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `envato_buyer_name`, `envato_purchase_code`, `envato_buyer_email`, `envato_purchased_status`, `package_name`, `onesignal_app_id`, `onesignal_rest_key`, `email_from`, `app_name`, `app_logo`, `app_email`, `app_version`, `app_author`, `app_contact`, `app_website`, `app_description`, `app_developed_by`, `app_privacy_policy`, `api_latest_limit`, `api_cat_order_by`, `api_cat_post_order_by`, `publisher_id`, `interstital_ad`, `interstital_ad_id`, `interstital_ad_click`, `banner_ad`, `banner_ad_id`, `banner_ad_type`, `banner_facebook_id`, `interstital_ad_type`, `interstital_facebook_id`, `native_ad`, `native_ad_type`, `native_ad_id`, `native_facebook_id`, `native_position`, `app_update_status`, `app_new_version`, `app_update_desc`, `app_redirect_url`, `cancel_update_status`, `song_download`, `book_coins`) VALUES
(1, 'ffgg', '527841', 'user@example.com', 1, 'com.eng.audiobook', '03bb7f45-551a-4a5b-91db-0540a27a1c6b', 'ZDQzMjIwNTUtYjc4NC00MjNiLTg1ZDEtMWMyNjFhYzI4NTkw', '-', 'VPN', 'networking-icon-shield-icon-vpn-icon-L2igGxiG.jpg', 'info@demo.com', '1.0.0', 'demo', '+91 8888888888', 'www.demo.com', '<p> </p>\r\n\r\n<h3> </h3>\r\n', 'example', '<p><strong>We are committed to protecting your privacy</strong></p>\n\n<p>We collect the minimum amount of information about you that is commensurate with providing you with a satisfactory service. This policy indicates the type of processes that may result in data being collected about you. Your use of this website gives us the right to collect that information.&nbsp;</p>\n\n<p><strong>Information Collected</strong></p>\n\n<p>We may collect any or all of the information that you give us depending on the type of transaction you enter into, including your name, address, telephone number, and email address, together with data about your use of the website. Other information that may be needed from time to time to process a request may also be collected as indicated on the website.</p>\n\n<p><strong>Information Use</strong></p>\n\n<p>We use the information collected primarily to process the task for which you visited the website. Data collected in the UK is held in accordance with the Data Protection Act. All reasonable precautions are taken to prevent unauthorised access to this information. This safeguard may require you to provide additional forms of identity should you wish to obtain information about your account details.</p>\n\n<p><strong>Cookies</strong></p>\n\n<p>Your Internet browser has the in-built facility for storing small files - &quot;cookies&quot; - that hold information which allows a website to recognise your account. Our website takes advantage of this facility to enhance your experience. You have the ability to prevent your computer from accepting cookies but, if you do, certain functionality on the website may be impaired.</p>\n\n<p><strong>Disclosing Information</strong></p>\n\n<p>We do not disclose any personal information obtained about you from this website to third parties unless you permit us to do so by ticking the relevant boxes in registration or competition forms. We may also use the information to keep in contact with you and inform you of developments associated with us. You will be given the opportunity to remove yourself from any mailing list or similar device. If at any time in the future we should wish to disclose information collected on this website to any third party, it would only be with your knowledge and consent.&nbsp;</p>\n\n<p>We may from time to time provide information of a general nature to third parties - for example, the number of individuals visiting our website or completing a registration form, but we will not use any information that could identify those individuals.&nbsp;</p>\n\n<p>In addition Dummy may work with third parties for the purpose of delivering targeted behavioural advertising to the Dummy website. Through the use of cookies, anonymous information about your use of our websites and other websites will be used to provide more relevant adverts about goods and services of interest to you. For more information on online behavioural advertising and about how to turn this feature off, please visit youronlinechoices.com/opt-out.</p>\n\n<p><strong>Changes to this Policy</strong></p>\n\n<p>Any changes to our Privacy Policy will be placed here and will supersede this version of our policy. We will take reasonable steps to draw your attention to any changes in our policy. However, to be on the safe side, we suggest that you read this document each time you use the website to ensure that it still meets with your approval.</p>\n\n<p><strong>Contacting Us</strong></p>\n\n<p>If you have any questions about our Privacy Policy, or if you want to know what information we have collected about you, please email us at hd@dummy.com. You can also correct any factual errors in that information or require us to remove your details form any list under our control.</p>\n', 4, 'category_name', 'DESC', 'pub-8356404931736973', 'true', 'ca-app-pub-3940256099942544/1033173712', '5', 'true', 'ca-app-pub-3940256099942544/6300978111', 'admob', '', 'admob', 'ujuol', 'true', 'admob', '525', 'oplioiu', 23, 'false', 1, '', 'https://play.google.com/store/apps/', 'false', 'true', '47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int NOT NULL,
  `device_id` varchar(255) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `country` varchar(255) NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `region_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lon` varchar(255) NOT NULL,
  `timezone` varchar(255) NOT NULL,
  `isp` varchar(255) NOT NULL,
  `org` varchar(255) NOT NULL,
  `as_` varchar(255) NOT NULL,
  `query` varchar(255) NOT NULL,
  `package` varchar(255) NOT NULL,
  `registered_on` varchar(200) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `device_id`, `status`, `country`, `country_code`, `region_name`, `city`, `zip`, `lat`, `lon`, `timezone`, `isp`, `org`, `as_`, `query`, `package`, `registered_on`) VALUES
(1, '3ff5ab65b69dd8d8', 1, 'India', 'IN', 'Gujarat', 'Ahmedabad', '380009', '23.0276', '72.5871', 'Asia/Kolkata', 'Bharti Airtel', 'Bharti Airtel Ltd', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '117.97.175.112', 'com.merge.master.dino.game', '1660979235'),
(2, '1010', 1, 'India', 'IN', 'GJ', 'Ahmedabad', '380009', '23.0276', '72.5871', 'Asia/Kolkata', 'Bharti Airte', 'Bharti Airte Ltd', 'AS24560 Bharti Airte Ltd., Telemedia Services', '117.97.175.112', 'com.snack.io.game.snack2', '1660982639'),
(3, '3ff5ab65b69dd8d8', 1, 'India', 'IN', 'Gujarat', 'Ahmedabad', '380009', '23.0276', '72.5871', 'Asia/Kolkata', 'Bharti Airtel', 'Bharti Airtel Ltd', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '117.97.175.112', 'com.snack.io.game.snack', '1660983345'),
(4, '3ff5ab65b69dd8d8', 1, 'India', 'IN', 'Gujarat', 'Ahmedabad', '380009', '23.0276', '72.5871', 'Asia/Kolkata', 'Bharti Airtel', 'Bharti Airtel Ltd', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '117.97.175.112', 'com.merge.master.game3D', '1660993816'),
(5, '1010', 1, 'India', 'IN', 'GJ', 'Ahmedabad', '380009', '23.0276', '72.5871', 'Asia/Kolkata', 'Bharti Airte', 'Bharti Airte Ltd', 'AS24560 Bharti Airte Ltd., Telemedia Services', '117.97.175.112', 'com.test.sahil', '1660995738'),
(6, '1010', 1, 'India', 'IN', 'GJ', 'Ahmedabad', '380009', '23.0276', '72.5871', 'Asia/Kolkata', 'Bharti Airte', 'Bharti Airte Ltd', 'AS24560 Bharti Airte Ltd., Telemedia Services', '117.97.175.112', 'com.merge.master.game3D', '1660995805'),
(7, '1010', 1, 'India', 'IN', 'GJ', 'Ahmedabad', '380009', '23.0276', '72.5871', 'Asia/Kolkata', 'Bharti Airte', 'Bharti Airte Ltd', 'AS24560 Bharti Airte Ltd., Telemedia Services', '117.97.175.112', 'com.snack.io.game.snack', '1660995905'),
(8, 'a21c3f87606f778b', 1, 'India', 'IN', 'Gujarat', 'Ahmedabad', '380009', '23.0276', '72.5871', 'Asia/Kolkata', 'Bharti Airtel', 'Bharti Airtel Ltd', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '117.97.175.112', 'com.merge.master.game3D', '1660996848'),
(9, '46e953cc12e61b85', 1, 'United States', 'US', 'Virginia', 'Reston', '22096', '38.9687', '-77.3411', 'America/New_York', 'Google LLC', 'Google LLC', 'AS15169 Google LLC', '108.177.7.82', 'com.snack.io.game.snack', '1661006711'),
(10, '303a6200477dd5b5', 1, 'United States', 'US', 'California', 'Mountain View', '94043', '37.422', '-122.084', 'America/Los_Angeles', 'Google LLC', 'Google LLC', 'AS15169 Google LLC', '66.249.88.53', 'com.snack.io.game.snack', '1661006732'),
(11, 'aa1448ba33ae1ede', 1, 'United States', 'US', 'California', 'Palo Alto', '94306', '37.4152', '-122.1224', 'America/Los_Angeles', 'Google LLC', 'Google LLC', 'AS15169 Google LLC', '70.32.128.250', 'com.snack.io.game.snack', '1661006738'),
(12, '7940e2316e47e6d1', 1, 'United States', 'US', 'California', 'Mountain View', '94043', '37.422', '-122.084', 'America/Los_Angeles', 'Google LLC', 'Google LLC', 'AS15169 Google LLC', '66.249.80.151', 'com.snack.io.game.snack', '1661006812'),
(13, '00a39142c2db802d', 1, 'United States', 'US', 'California', 'Mountain View', '94043', '37.422', '-122.084', 'America/Los_Angeles', 'Google LLC', 'Google LLC', 'AS15169 Google LLC', '66.249.80.151', 'com.snack.io.game.snack', '1661006874'),
(14, '92ca931d4902fe2a', 1, 'United States', 'US', 'Virginia', 'Reston', '22096', '38.9687', '-77.3411', 'America/New_York', 'Google LLC', 'Google LLC', 'AS15169 Google LLC', '108.177.7.89', 'com.snack.io.game.snack', '1661006936'),
(15, 'bcb532b41a3da661', 1, 'United States', 'US', 'California', 'Palo Alto', '94306', '37.4152', '-122.1224', 'America/Los_Angeles', 'Google LLC', 'Google LLC', 'AS15169 Google LLC', '70.32.128.240', 'com.snack.io.game.snack', '1661006951'),
(16, 'b75beee95f04e4b7', 1, 'United States', 'US', 'Virginia', 'Reston', '22096', '38.9687', '-77.3411', 'America/New_York', 'Google LLC', 'Google LLC', 'AS15169 Google LLC', '108.177.7.79', 'com.snack.io.game.snack', '1661007240'),
(17, 'be2fe26908a969c5', 1, 'United States', 'US', 'California', 'Palo Alto', '94306', '37.4152', '-122.1224', 'America/Los_Angeles', 'Google LLC', 'Google LLC', 'AS15169 Google LLC', '70.32.128.245', 'com.snack.io.game.snack', '1661007622'),
(18, '5e7f5da8baaae409', 1, 'United States', 'US', 'California', 'Palo Alto', '94306', '37.4152', '-122.1224', 'America/Los_Angeles', 'Google LLC', 'Google LLC', 'AS15169 Google LLC', '70.32.128.252', 'com.merge.master.dino.game', '1661007705'),
(19, '92ca931d4902fe2a', 1, 'United States', 'US', 'Virginia', 'Reston', '22096', '38.9687', '-77.3411', 'America/New_York', 'Google LLC', 'Google LLC', 'AS15169 Google LLC', '108.177.7.92', 'com.merge.master.dino.game', '1661007778'),
(20, '1dd9704e0ab03f8e', 1, 'United States', 'US', 'Virginia', 'Reston', '22096', '38.9687', '-77.3411', 'America/New_York', 'Google LLC', 'Google LLC', 'AS15169 Google LLC', '108.177.7.87', 'com.merge.master.dino.game', '1661007784'),
(21, '09994db350b70840', 1, 'United States', 'US', 'California', 'Palo Alto', '94306', '37.4152', '-122.1224', 'America/Los_Angeles', 'Google LLC', 'Google LLC', 'AS15169 Google LLC', '70.32.128.251', 'com.merge.master.dino.game', '1661007895'),
(22, 'ac657bd63b79bce2', 1, 'United States', 'US', 'California', 'Palo Alto', '94306', '37.4152', '-122.1224', 'America/Los_Angeles', 'Google LLC', 'Google LLC', 'AS15169 Google LLC', '70.32.128.254', 'com.merge.master.dino.game', '1661008029'),
(23, '80665f06fc53fcfb', 1, 'United States', 'US', 'Virginia', 'Reston', '22096', '38.9687', '-77.3411', 'America/New_York', 'Google LLC', 'Google LLC', 'AS15169 Google LLC', '108.177.7.90', 'com.merge.master.dino.game', '1661008091'),
(24, '066aa289562fe707', 1, 'United States', 'US', 'California', 'Mountain View', '94043', '37.422', '-122.084', 'America/Los_Angeles', 'Google LLC', 'Google LLC', 'AS15169 Google LLC', '66.102.8.222', 'com.merge.master.dino.game', '1661008238'),
(25, 'b32c79634c11befd', 1, 'United States', 'US', 'California', 'Mountain View', '94043', '37.422', '-122.084', 'America/Los_Angeles', 'Google LLC', 'Google LLC', 'AS15169 Google LLC', '66.102.8.220', 'com.merge.master.dino.game', '1661008567'),
(26, '2d0714528f7cd86e', 1, 'United States', 'US', 'California', 'Mountain View', '94043', '37.422', '-122.084', 'America/Los_Angeles', 'Google LLC', 'Google LLC', 'AS15169 Google LLC', '74.125.209.49', 'com.merge.master.dino.game', '1661010366');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vpn_key`
--

CREATE TABLE `tbl_vpn_key` (
  `id` int NOT NULL,
  `vpn_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vpn_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_vpn_key`
--

INSERT INTO `tbl_vpn_key` (`id`, `vpn_key`, `vpn_url`, `status`) VALUES
(1, 'Vpn Key 1', 'aa', 1),
(2, 'Vpn Key 2', 'aa', 1),
(3, 'dir_xprovpn', 'www.google.com', 1),
(4, 'aft_vpn_test', 'https://d2isj403unfbyl.cloudfront.net', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_active_log`
--
ALTER TABLE `tbl_active_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_apps`
--
ALTER TABLE `tbl_apps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_block_users`
--
ALTER TABLE `tbl_block_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_page_category`
--
ALTER TABLE `tbl_page_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vpn_key`
--
ALTER TABLE `tbl_vpn_key`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_active_log`
--
ALTER TABLE `tbl_active_log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_apps`
--
ALTER TABLE `tbl_apps`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_block_users`
--
ALTER TABLE `tbl_block_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_page_category`
--
ALTER TABLE `tbl_page_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_vpn_key`
--
ALTER TABLE `tbl_vpn_key`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
