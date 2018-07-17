-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2016 at 02:11 PM
-- Server version: 5.0.51b-community-nt
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `docan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(100) default NULL,
  `username` varchar(255) default NULL,
  `password` varchar(128) default NULL,
  `remember_token` varchar(100) default NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(19, 'admin', 'admin', '$2y$10$mxarkdmRxWXp/GxgGdtIUOgUjHvFSba2pq8pxQ.JcCtVMTMbwXLfq', 'B5h05VbagI4vSu1NdNEGUPh2ADLtbhVbzj43bxpAPSsgKEocSMs8NipqxS5e', '2016-03-09 18:04:41', '2016-02-02 04:09:06'),
(20, 'admin', 'adminstrator', '$2y$10$RZFWE7zWZ/EUT0wvcoYnXusNVsgCWApnNRcRDf4artPldFexF3ofW', 'L4YWHNZ4VIdK4oTyxV81tLACAK76pA1EiYvbsNTcMzx9JejCY3rh0OSzvocQ', '2016-05-13 19:18:27', '2016-05-13 17:18:27');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `id` int(11) NOT NULL auto_increment,
  `link` varchar(500) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `link`, `image`, `created_at`, `updated_at`) VALUES
(1, 'http://google.com/', 'images.jpg', '2016-05-23 20:12:39', '2016-05-23 20:12:39');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE IF NOT EXISTS `attributes` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `type` varchar(255) collate utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL default NULL,
  `updated_at` timestamp NULL default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'dropdown', NULL, NULL),
(2, 'text', NULL, NULL),
(3, 'text', NULL, NULL),
(4, 'text', NULL, NULL),
(5, 'dropdown', NULL, NULL),
(6, 'text', NULL, NULL),
(7, 'text', '2016-06-06 22:26:45', '2016-06-06 22:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `attributes_values`
--

CREATE TABLE IF NOT EXISTS `attributes_values` (
  `id` int(11) NOT NULL auto_increment,
  `attribute_id` int(11) NOT NULL,
  `value` varchar(222) NOT NULL,
  `lang` varchar(222) NOT NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `attributes_values`
--

INSERT INTO `attributes_values` (`id`, `attribute_id`, `value`, `lang`, `created_at`, `updated_at`) VALUES
(1, 1, 'احمر', 'ar', '2016-06-06 07:57:58', '2016-06-06 07:57:58'),
(2, 1, 'red', 'en', '2016-06-06 07:57:58', '2016-06-06 07:57:58');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_translations`
--

CREATE TABLE IF NOT EXISTS `attribute_translations` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `lang` varchar(2) collate utf8_unicode_ci NOT NULL default 'ar',
  `attribute_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL default NULL,
  PRIMARY KEY  (`id`),
  KEY `attribute_translations_attribute_id_foreign` (`attribute_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `attribute_translations`
--

INSERT INTO `attribute_translations` (`id`, `name`, `lang`, `attribute_id`, `created_at`, `updated_at`) VALUES
(1, 'اللون', 'ar', 1, '2016-06-01 16:44:55', NULL),
(2, 'الطول', 'ar', 2, '2016-06-01 16:44:55', NULL),
(5, 'condition', 'ar', 3, '2016-06-01 16:44:55', NULL),
(6, 'usage time', 'ar', 4, '2016-06-01 16:44:55', NULL),
(7, 'الخامه', 'ar', 5, '2016-06-01 16:44:55', NULL),
(8, 'نوع الخشب', 'ar', 6, '2016-06-01 16:44:55', NULL),
(9, 'ييببب', 'ar', 7, '2016-06-06 22:26:45', '2016-06-06 22:26:45'),
(10, '', 'en', 7, '2016-06-06 22:26:45', '2016-06-06 22:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `perant_id` int(10) unsigned default NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `perant_id`, `created_at`, `updated_at`) VALUES
(1, 0, '2016-06-04 10:51:37', '2016-06-04 00:06:31'),
(2, 0, '2016-06-04 10:51:37', '2016-06-04 00:06:31'),
(3, 0, '2016-06-04 10:51:00', '2016-06-04 00:06:31'),
(4, 1, '2016-06-04 00:06:31', '2016-06-04 00:06:31'),
(5, 1, '2016-06-04 00:06:31', '2016-06-04 00:06:31'),
(6, 2, '2016-06-04 00:06:31', '2016-06-04 00:06:31'),
(7, 2, '2016-06-04 00:06:31', '2016-06-04 00:06:31'),
(8, 3, '2016-06-04 00:06:31', '2016-06-04 00:06:31'),
(9, 3, '2016-06-04 00:06:31', '2016-06-04 00:06:31'),
(10, 4, '2016-06-04 00:06:31', '2016-06-04 00:06:31'),
(11, 4, '2016-06-04 00:06:31', '2016-06-04 00:06:31'),
(12, 0, '2016-06-04 10:51:37', '2016-06-04 00:06:31'),
(13, 12, '2016-06-04 00:06:31', '2016-06-04 00:06:31'),
(14, 12, '2016-06-04 00:06:31', '2016-06-04 00:06:31'),
(15, 6, '2016-06-04 00:06:31', '2016-06-04 00:06:31'),
(16, 6, '2016-06-04 00:06:31', '2016-06-04 00:06:31'),
(17, 8, '2016-06-04 00:06:31', '2016-06-04 00:06:31'),
(18, 8, '2016-06-04 00:06:31', '2016-06-04 00:06:31'),
(19, 13, '2016-06-04 00:06:31', '2016-06-04 00:06:31'),
(20, 13, '2016-06-04 00:06:31', '2016-06-04 00:06:31'),
(28, 0, '2016-06-04 07:59:21', '2016-06-04 07:59:21'),
(29, 0, '2016-06-04 08:01:19', '2016-06-04 08:01:19'),
(30, 0, '2016-06-04 08:29:06', '2016-06-04 08:29:06'),
(31, 0, '2016-06-04 08:31:15', '2016-06-04 08:31:15'),
(32, 1, '2016-06-04 08:44:59', '2016-06-04 08:44:59'),
(33, 14, '2016-06-07 11:53:39', '2016-06-07 11:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `category_attribute`
--

CREATE TABLE IF NOT EXISTS `category_attribute` (
  `id` int(11) NOT NULL auto_increment,
  `category_id` int(10) unsigned NOT NULL,
  `attribute_id` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `category_attribute`
--

INSERT INTO `category_attribute` (`id`, `category_id`, `attribute_id`, `created_at`, `updated_at`) VALUES
(1, 10, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 10, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 11, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 11, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 13, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 14, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 14, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 15, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 15, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 16, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 16, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 17, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 17, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 18, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 19, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 20, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 20, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category_shop`
--

CREATE TABLE IF NOT EXISTS `category_shop` (
  `id` int(11) NOT NULL auto_increment,
  `category_id` int(10) unsigned NOT NULL,
  `shop_id` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `category_shop`
--

INSERT INTO `category_shop` (`id`, `category_id`, `shop_id`, `created_at`, `updated_at`) VALUES
(1, 10, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 10, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 11, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 11, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 10, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 11, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 10, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 11, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 10, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 11, 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 10, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 11, 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 10, 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 11, 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 10, 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 11, 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 10, 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 10, 21, '2016-05-11 14:06:05', '2016-05-11 14:06:05'),
(19, 10, 22, '2016-05-13 19:28:46', '2016-05-13 19:28:46'),
(20, 10, 23, '2016-05-13 19:41:51', '2016-05-13 19:41:51'),
(21, 10, 24, '2016-05-13 19:44:06', '2016-05-13 19:44:06'),
(22, 10, 25, '2016-05-13 19:48:04', '2016-05-13 19:48:04'),
(23, 10, 26, '2016-05-13 19:52:29', '2016-05-13 19:52:29'),
(24, 10, 27, '2016-05-13 19:53:59', '2016-05-13 19:53:59'),
(25, 10, 28, '2016-05-13 19:55:04', '2016-05-13 19:55:04'),
(26, 10, 29, '2016-05-13 19:58:30', '2016-05-13 19:58:30'),
(27, 10, 30, '2016-05-13 20:01:20', '2016-05-13 20:01:20'),
(28, 10, 31, '2016-05-13 20:07:02', '2016-05-13 20:07:02'),
(29, 10, 32, '2016-05-13 20:09:23', '2016-05-13 20:09:23'),
(30, 10, 33, '2016-05-13 20:11:13', '2016-05-13 20:11:13'),
(31, 10, 34, '2016-05-13 20:20:21', '2016-05-13 20:20:21'),
(32, 10, 35, '2016-05-14 10:12:51', '2016-05-14 10:12:51'),
(33, 15, 36, '2016-05-15 11:40:29', '2016-05-15 11:40:29'),
(34, 16, 37, '2016-05-15 11:43:19', '2016-05-15 11:43:19'),
(35, 15, 38, '2016-05-15 11:45:07', '2016-05-15 11:45:07'),
(36, 16, 39, '2016-05-15 11:49:05', '2016-05-15 11:49:05'),
(37, 17, 40, '2016-05-15 11:52:37', '2016-05-15 11:52:37'),
(38, 17, 41, '2016-05-15 11:53:22', '2016-05-15 11:53:22'),
(39, 10, 42, '2016-05-15 11:54:07', '2016-05-15 11:54:07'),
(40, 17, 43, '2016-05-15 11:55:06', '2016-05-15 11:55:06'),
(41, 18, 44, '2016-05-15 11:59:25', '2016-05-15 11:59:25'),
(42, 18, 45, '2016-05-15 12:02:13', '2016-05-15 12:02:13'),
(43, 18, 46, '2016-05-15 12:04:11', '2016-05-15 12:04:11'),
(44, 18, 47, '2016-05-15 12:05:00', '2016-05-15 12:05:00'),
(45, 19, 48, '2016-05-15 12:06:20', '2016-05-15 12:06:20'),
(46, 19, 49, '2016-05-15 12:07:13', '2016-05-15 12:07:13'),
(47, 20, 50, '2016-05-15 12:07:58', '2016-05-15 12:07:58'),
(48, 20, 51, '2016-05-15 12:09:46', '2016-05-15 12:09:46'),
(49, 10, 52, '2016-05-26 11:28:53', '2016-05-26 11:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE IF NOT EXISTS `category_translations` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `metatitle` varchar(255) collate utf8_unicode_ci default NULL,
  `meta_keywords` varchar(255) collate utf8_unicode_ci default NULL,
  `meta_desc` varchar(255) collate utf8_unicode_ci default NULL,
  `lang` varchar(2) collate utf8_unicode_ci default 'ar',
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  KEY `category_translations_category_id_foreign` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `name`, `metatitle`, `meta_keywords`, `meta_desc`, `lang`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'موضه وازياء', 'موضه وازياء', NULL, NULL, 'ar', 1, '2016-06-04 00:06:21', '2016-06-04 00:06:21'),
(2, 'الكترونات', 'الكترونات', NULL, NULL, 'ar', 2, '2016-06-04 00:06:21', '2016-06-04 00:06:21'),
(3, 'اكسسوارات', 'اكسسوارات', NULL, NULL, 'ar', 3, '2016-06-04 00:06:21', '2016-06-04 00:06:21'),
(4, 'رجالى', 'رجالى', NULL, NULL, 'ar', 4, '2016-06-04 00:06:21', '2016-06-04 00:06:21'),
(5, 'حريمى', 'حريمى', NULL, NULL, 'ar', 5, '2016-06-04 00:06:21', '2016-06-04 00:06:21'),
(6, 'موبايلات', 'موبايل', NULL, NULL, 'ar', 6, '2016-06-04 00:06:21', '2016-06-04 00:06:21'),
(7, 'لاب توب', 'لاب توب', NULL, NULL, 'ar', 7, '2016-06-04 00:06:21', '2016-06-04 00:06:21'),
(8, 'انتيكات', 'انتيكات', NULL, NULL, 'ar', 8, '2016-06-04 00:06:21', '2016-06-04 00:06:21'),
(9, 'تحف', 'تحف', NULL, NULL, 'ar', 9, '2016-06-04 00:06:21', '2016-06-04 00:06:21'),
(10, 'ساعات', 'ساعات', NULL, NULL, 'ar', 10, '2016-06-04 00:06:21', '2016-06-04 00:06:21'),
(11, 'حقائب', 'حقائب', NULL, NULL, 'ar', 11, '2016-06-04 00:06:21', '2016-06-04 00:06:21'),
(12, 'ادوات منزليه', '', NULL, NULL, 'ar', 12, '2016-06-04 00:06:21', '2016-06-04 00:06:21'),
(13, 'اثاث منزلى ', '', NULL, NULL, 'ar', 13, '2016-06-04 00:06:21', '2016-06-04 00:06:21'),
(14, 'مطابخ', '', NULL, NULL, 'ar', 14, '2016-06-04 00:06:21', '2016-06-04 00:06:21'),
(15, 'موبيلات ذكيه', '', NULL, NULL, 'ar', 16, '2016-06-04 00:06:21', '2016-06-04 00:06:21'),
(18, 'تابات', '', NULL, NULL, 'ar', 15, '2016-06-04 00:06:21', '2016-06-04 00:06:21'),
(19, 'تماثيل خشبيه', '', NULL, NULL, 'ar', 17, '2016-06-04 00:06:21', '2016-06-04 00:06:21'),
(20, 'بورتريهات', '', NULL, NULL, 'ar', 18, '2016-06-04 00:06:21', '2016-06-04 00:06:21'),
(21, 'غرف اطفال', '', NULL, NULL, 'ar', 19, '2016-06-04 00:06:21', '2016-06-04 00:06:21'),
(22, 'غرف صالون', '', NULL, NULL, 'ar', 20, '2016-06-04 00:06:21', '2016-06-04 00:06:21'),
(24, 'يبليبل', NULL, NULL, NULL, 'ar', 28, '2016-06-04 07:59:21', '2016-06-04 07:59:21'),
(25, 'fdgdfgfd', NULL, NULL, NULL, 'en', 28, '2016-06-04 07:59:22', '2016-06-04 07:59:22'),
(26, 'يبليبل', NULL, NULL, NULL, 'ar', 29, '2016-06-04 08:01:19', '2016-06-04 08:01:19'),
(27, 'fdgdfgfd', NULL, NULL, NULL, 'en', 29, '2016-06-04 08:01:19', '2016-06-04 08:01:19'),
(28, 'سسيلبسلسبل', NULL, NULL, NULL, 'ar', 30, '2016-06-04 08:29:06', '2016-06-04 08:29:06'),
(29, 'fgfdgfdgfdg', NULL, NULL, NULL, 'en', 30, '2016-06-04 08:29:06', '2016-06-04 08:29:06'),
(30, 'يبييييي', NULL, NULL, NULL, 'ar', 31, '2016-06-04 08:31:15', '2016-06-04 08:31:15'),
(31, 'dsffdfdsf', NULL, NULL, NULL, 'en', 31, '2016-06-04 08:31:15', '2016-06-04 08:31:15'),
(32, 'بلبلل', 'يسيسليسل', 'سيلسيللسيل', 'لسيليسليسلسيل', 'ar', 32, '2016-06-04 08:44:59', '2016-06-04 08:44:59'),
(33, 'dfsdfdsf', 'sdfdsfdsf', 'dsfdfdsf', 'sdffdsfsf', 'en', 32, '2016-06-04 08:44:59', '2016-06-04 08:44:59'),
(34, 'بلالبالبا', 'بلالب', 'يبايبا', 'البالبا', 'ar', 33, '2016-06-07 11:53:39', '2016-06-07 11:53:39'),
(35, '', '', '', '', 'en', 33, '2016-06-07 11:53:39', '2016-06-07 11:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `dropdowns`
--

CREATE TABLE IF NOT EXISTS `dropdowns` (
  `id` int(10) NOT NULL auto_increment,
  `attribute_id` int(10) unsigned NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `attribute_id` (`attribute_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dropdowns`
--

INSERT INTO `dropdowns` (`id`, `attribute_id`, `value`) VALUES
(1, 1, 'green'),
(2, 1, 'red'),
(3, 5, 'جلد'),
(4, 5, 'قماش');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) collate utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_04_27_085007_create_categories_table', 1),
('2016_04_27_085148_create_category_translations_table', 1),
('2016_05_05_095745_create_shops_table', 2),
('2016_05_05_095809_create_shops_translations_table', 2),
('2016_05_05_104302_attributes', 3),
('2016_05_05_104407_categories_shops', 3),
('2016_05_05_104450_create_products_table', 3),
('2016_05_05_104609_shops_products', 3),
('2016_05_05_104801_create_souqs_table', 3),
('2016_05_05_111311_create_products_translations_table', 3),
('2016_05_05_111828_create_products_attributes_table', 3),
('2016_05_05_113123_create_attribute_translations_table', 3),
('2016_05_05_114540_categories_attributes', 4),
('2016_05_05_115147_create_product_images_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `total` double default NULL,
  `user_id` int(10) unsigned default NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  KEY `FK_order_1` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total`, `user_id`, `created_at`, `updated_at`) VALUES
(10, 23545, 1, '2016-02-28 11:10:57', '0000-00-00 00:00:00'),
(12, 300, 5, '2016-05-25 12:33:46', '2016-05-25 12:33:46'),
(13, 200, 5, '2016-05-25 12:52:39', '2016-05-25 12:52:39'),
(14, 200, 7, '2016-06-07 09:14:15', '2016-06-07 09:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE IF NOT EXISTS `order_products` (
  `id` int(11) NOT NULL auto_increment,
  `product_id` int(11) unsigned NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` varchar(230) character set utf8 NOT NULL,
  `price` varchar(230) character set utf8 NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `product_id`, `order_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 10, '300', '28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 11, '343', '564', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 12, '3', '100', '2016-05-25 14:33:46', '2016-05-25 14:33:46'),
(4, 3, 13, '1', '100', '2016-05-25 14:52:39', '2016-05-25 14:52:39'),
(5, 5, 13, '1', '100', '2016-05-25 14:52:39', '2016-05-25 14:52:39'),
(6, 1, 14, '1', '100', '2016-06-07 12:14:15', '2016-06-07 12:14:15'),
(7, 3, 14, '1', '100', '2016-06-07 12:14:15', '2016-06-07 12:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `order_shipping`
--

CREATE TABLE IF NOT EXISTS `order_shipping` (
  `id` int(11) NOT NULL auto_increment,
  `order_id` int(11) NOT NULL,
  `payment` varchar(230) character set utf8 NOT NULL,
  `city` varchar(230) character set utf8 NOT NULL,
  `governate` varchar(230) character set utf8 NOT NULL,
  `address` varchar(230) character set utf8 NOT NULL,
  `post_num` varchar(230) character set utf8 NOT NULL,
  `country` varchar(55) character set utf8 NOT NULL,
  `mark` varchar(55) character set utf8 NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `order_shipping`
--

INSERT INTO `order_shipping` (`id`, `order_id`, `payment`, `city`, `governate`, `address`, `post_num`, `country`, `mark`, `created_at`, `updated_at`) VALUES
(1, 10, 'نقدى', 'طنطا', 'الغربية', 'ييي', '98', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 12, 'نقدى', 'طنطا', 'الغربيه', 'مركز', '19099', '???', '???????', '2016-05-25 14:33:46', '2016-05-25 14:33:46'),
(3, 13, 'نقدى', 'طنطا', 'الغربيه', 'مركز', '19099', 'مصر', 'المقابر', '2016-05-25 14:52:39', '2016-05-25 14:52:39'),
(4, 14, 'نقدى', 'None (International)', 'trhthtrht', 'shebin el kom', '12345', 'Egypt', 'rgegrg', '2016-06-07 12:14:15', '2016-06-07 12:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE IF NOT EXISTS `order_status` (
  `id` int(11) NOT NULL auto_increment,
  `order_id` int(11) NOT NULL,
  `status` varchar(230) character set utf8 NOT NULL,
  `notes` text character set utf8,
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `order_id`, `status`, `notes`, `updated_at`, `created_at`) VALUES
(18, 10, 'تم التسليم', ' اليوم', '2016-02-28 19:13:29', '2016-02-28 19:13:29'),
(19, 11, 'ملغى', ' اليوم', '2016-02-28 19:15:13', '2016-02-28 19:15:13'),
(20, 10, 'مرتجع', ' لاه', '2016-02-28 19:15:40', '2016-02-28 19:15:40'),
(21, 11, 'محجوز', ' bfg', '2016-03-05 11:39:42', '2016-03-05 11:39:42'),
(22, 12, 'قيد التنفيذ', NULL, '2016-05-25 12:33:46', '2016-05-25 12:33:46'),
(23, 13, 'قيد التنفيذ', NULL, '2016-05-25 12:52:39', '2016-05-25 12:52:39'),
(24, 14, 'قيد التنفيذ', NULL, '2016-06-07 09:14:15', '2016-06-07 09:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) collate utf8_unicode_ci NOT NULL,
  `token` varchar(255) collate utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `num` int(11) NOT NULL,
  `price` double NOT NULL,
  `model` varchar(255) collate utf8_unicode_ci default NULL,
  `image` varchar(255) collate utf8_unicode_ci default NULL,
  `active` tinyint(4) default NULL,
  `views` int(11) default NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `num`, `price`, `model`, `image`, `active`, `views`, `created_at`, `updated_at`) VALUES
(1, 1, 100, 'كاسيو', '9_2.jpg', 1, 33, '2016-06-02 02:37:56', '2016-06-02 02:37:56'),
(2, 2, 200, 'كاسيو', '9_2.jpg', 1, 22, '2016-06-02 02:37:56', '2016-06-02 02:37:56'),
(3, 3, 100, 'كاسيو', '9_2.jpg', 1, 8, '2016-06-02 02:37:56', '2016-06-02 02:37:56'),
(4, 3, 200, 'كاسيو', '9_2.jpg', 1, 46, '2016-06-02 02:37:56', '2016-06-02 02:37:56'),
(5, 1, 100, 'كاسيو', '9_2.jpg', 1, 9, '2016-06-02 02:37:56', '2016-06-02 02:37:56'),
(6, 0, 200, 'كاسيو', '9_2.jpg', 1, 8, '2016-06-02 02:37:56', '2016-06-02 02:37:56'),
(7, 0, 100, 'كاسيو', '9_2.jpg', 1, 44, '2016-06-02 02:37:56', '2016-06-02 02:37:56'),
(8, 0, 200, 'كاسيو', '9_2.jpg', 1, 5, '2016-06-02 02:37:56', '2016-06-02 02:37:56'),
(9, 0, 100, 'كاسيو', '9_2.jpg', 1, 7, '2016-06-02 02:37:56', '2016-06-02 02:37:56'),
(10, 0, 200, 'كاسيو', '9_2.jpg', 1, 452, '2016-06-02 02:37:56', '2016-06-02 02:37:56'),
(11, 4, 20, 'اى حاجه', '03c3c3ff199c0b80ce19a0306655e613.jpg', 0, 4, '2016-05-12 09:40:48', '2016-05-12 09:40:48'),
(13, 2, 124, 's3', 'arabic_logo_designs_1.png', 0, 12, '2016-05-14 08:06:15', '2016-05-14 08:06:15'),
(17, 1, 12, 's3', '03c3c3ff199c0b80ce19a0306655e613.jpg', 0, 458, '2016-05-19 05:55:26', '2016-05-19 05:55:26'),
(18, 2, 222, 'منتج اى حاجه منتج اى حاجه منتج اى حاجه ', '9_2.jpg', 1, 125, '2016-06-02 02:37:56', '2016-06-02 02:37:56'),
(19, 5, 44, 'قلبلبيلبي', '13343146_1056868331059038_8428569366379416423_n.jpg', NULL, NULL, '2016-06-02 13:31:32', '2016-06-02 13:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `products_translations`
--

CREATE TABLE IF NOT EXISTS `products_translations` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `details` text collate utf8_unicode_ci,
  `metatitle` varchar(255) collate utf8_unicode_ci default NULL,
  `meta_keywords` varchar(255) collate utf8_unicode_ci default NULL,
  `meta_desc` varchar(255) collate utf8_unicode_ci default NULL,
  `lang` varchar(2) collate utf8_unicode_ci NOT NULL default 'ar',
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `products_translations`
--

INSERT INTO `products_translations` (`id`, `name`, `details`, `metatitle`, `meta_keywords`, `meta_desc`, `lang`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'ساعه', 'شاعه ساعه ساعه ساعه ', 'ساعات', 'ساعات', 'ساعات', 'ar', 1, '2016-06-01 16:11:17', NULL),
(2, 'ساعه ', 'ساعات ', 'ساعات', 'ساعات', 'ساعات ساعات ساعات', 'ar', 2, '2016-06-01 16:11:17', NULL),
(3, 'ساعه', 'شاعه ساعه ساعه ساعه ', 'ساعات', 'ساعات', 'ساعات', 'ar', 3, '2016-06-01 16:11:17', NULL),
(4, 'ساعه ', 'ساعات ', 'ساعات', 'ساعات', 'ساعات ساعات ساعات', 'ar', 4, '2016-06-01 16:11:17', NULL),
(5, 'ساعه', 'شاعه ساعه ساعه ساعه ', 'ساعات', 'ساعات', 'ساعات', 'ar', 5, '2016-06-01 16:11:17', NULL),
(6, 'ساعه ', 'ساعات ', 'ساعات', 'ساعات', 'ساعات ساعات ساعات', 'ar', 6, '2016-06-01 16:11:17', NULL),
(7, 'ساعه', 'شاعه ساعه ساعه ساعه ', 'ساعات', 'ساعات', 'ساعات', 'ar', 7, '2016-06-01 16:11:17', NULL),
(8, 'ساعه ', 'ساعات ', 'ساعات', 'ساعات', 'ساعات ساعات ساعات', 'ar', 8, '2016-06-01 16:11:17', NULL),
(9, 'ساعه', 'شاعه ساعه ساعه ساعه ', 'ساعات', 'ساعات', 'ساعات', 'ar', 9, '2016-06-01 16:11:17', NULL),
(10, 'ساعه ', 'ساعات ', 'ساعات', 'ساعات', 'ساعات ساعات ساعات', 'ar', 10, '2016-06-01 16:11:17', NULL),
(11, 'اى حاجه', 'حنكختهاعغلفقيففغعهخحطخ', NULL, NULL, NULL, 'ar', 11, '2016-05-12 09:40:48', '2016-05-12 09:40:48'),
(12, 'حاجه حلوه اوى حاجه حلوه اوى حاجه حلوه اوى', 'iuygtrdtgfgyujkl;kjjg', NULL, NULL, NULL, 'ar', 13, '2016-06-02 02:10:58', '2016-05-14 08:06:15'),
(13, 'حاجه حلوه اوى', 'kjhgfrdsoijuhyugtr', NULL, NULL, NULL, 'ar', 17, '2016-05-19 05:55:26', '2016-05-19 05:55:26'),
(14, 'منتج اى حاجه منتج اى حاجه منتج اى حاجه vdvsvsdvdsv', '181818181818kjhgfrdsoijuhyugtrkjhgfrdsoijuhyugtrkjhgfrdsoijuhyugtr', 'سبشبشب', 'بشسبشسبشسب', 'سشببسشب', 'ar', 18, '2016-06-01 16:14:24', NULL),
(15, 'اعلان  جديد ', 'يليبلبيب نيتلنتنلبتيل مان  ىف اعلان جميل جدا جدا \r\nاسمه اى اعلان \r\nوهنا  كان عنده بتاع غفريب وعجيب ووحش وحلو  وكان كل حاجه حلوه  فيه  وهو كمان يلعمل كدا كدا هو ', NULL, NULL, NULL, 'ar', 19, '2016-06-02 13:31:32', '2016-06-02 13:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute`
--

CREATE TABLE IF NOT EXISTS `product_attribute` (
  `id` int(11) NOT NULL auto_increment,
  `product_id` int(10) unsigned NOT NULL,
  `attribute_id` int(10) unsigned NOT NULL,
  `lang` varchar(2) default 'ar',
  `created_at` datetime default NULL,
  `updated_at` datetime default NULL,
  `value` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `product_attribute`
--

INSERT INTO `product_attribute` (`id`, `product_id`, `attribute_id`, `lang`, `created_at`, `updated_at`, `value`) VALUES
(1, 1, 1, 'ar', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'احمر'),
(2, 1, 2, 'ar', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '50 سم'),
(5, 17, 3, 'ar', '2016-05-19 07:55:26', '2016-05-19 07:55:26', 'used'),
(6, 17, 4, 'ar', '2016-05-19 07:55:26', '2016-05-19 07:55:26', '1year'),
(7, 1, 5, 'ar', NULL, NULL, 'بللبب'),
(8, 1, 6, 'ar', NULL, NULL, 'يبليبلبيل'),
(9, 1, 7, 'ar', NULL, NULL, 'بيلبيل'),
(10, 1, 8, 'ar', NULL, NULL, 'لبيلبيل'),
(11, 1, 9, 'ar', NULL, NULL, 'لبيلبي'),
(12, 1, 10, 'ar', NULL, NULL, 'بيلبيل'),
(13, 1, 11, 'ar', NULL, NULL, 'يبلبيل'),
(14, 1, 12, 'ar', NULL, NULL, 'يبلبيل'),
(15, 19, 1, 'ar', '2016-06-02 16:31:32', '2016-06-02 16:31:32', 'red"'),
(16, 19, 2, 'ar', '2016-06-02 16:31:32', '2016-06-02 16:31:32', '55');

-- --------------------------------------------------------

--
-- Table structure for table `product_favorite`
--

CREATE TABLE IF NOT EXISTS `product_favorite` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `product_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product_favorite`
--

INSERT INTO `product_favorite` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 19, 6, '2016-06-02 13:36:12', '2016-06-02 13:36:12'),
(2, 17, 7, '2016-06-07 21:00:05', '2016-06-07 21:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `image` varchar(255) collate utf8_unicode_ci NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '9_2.jpg', 1, '2016-06-01 16:40:33', NULL),
(2, '9_2.jpg', 1, '2016-06-01 16:40:33', NULL),
(3, '9_2.jpg', 1, '2016-06-01 16:40:51', NULL),
(4, '9_2.jpg', 2, '2016-06-01 16:40:33', NULL),
(5, '9_2.jpg', 3, '2016-06-01 16:40:33', NULL),
(6, '9_2.jpg', 3, '2016-06-01 16:40:33', NULL),
(7, '9_2.jpg', 4, '2016-06-01 16:40:33', NULL),
(8, '9_2.jpg', 4, '2016-06-01 16:40:33', NULL),
(9, '9_2.jpg', 5, '2016-06-01 16:40:33', NULL),
(10, '9_2.jpg', 5, '2016-06-01 16:40:33', NULL),
(11, '9_2.jpg', 6, '2016-06-01 16:40:33', NULL),
(12, '9_2.jpg', 6, '2016-06-01 16:40:33', NULL),
(13, '9_2.jpg', 7, '2016-06-01 16:40:33', NULL),
(14, '9_2.jpg', 7, '2016-06-01 16:40:33', NULL),
(15, '9_2.jpg', 8, '2016-06-01 16:40:33', NULL),
(16, '9_2.jpg', 8, '2016-06-01 16:40:33', NULL),
(17, '9_2.jpg', 9, '2016-06-01 16:40:33', NULL),
(18, '9_2.jpg', 9, '2016-06-01 16:40:33', NULL),
(19, '9_2.jpg', 10, '2016-06-01 16:40:33', NULL),
(20, '9_2.jpg', 10, '2016-06-01 16:40:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE IF NOT EXISTS `product_review` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `product_id` int(10) unsigned default NULL,
  `user_id` int(10) unsigned default NULL,
  `review` varchar(555) default NULL,
  `stars` varchar(45) default NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  KEY `FK_product_review_1` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`id`, `product_id`, `user_id`, `review`, `stars`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'بليلالتلات بلالبا بلالبا بلا  بليلالتلات بلالبا بلالبا بلا  بليلالتلات بلالبا بلالبا بلا  ', '4', '2016-06-01 18:46:21', '0000-00-00 00:00:00'),
(2, 1, 2, 'رلاىرلاىلارىلارى سؤسيبيسب', '1', '2016-06-01 18:46:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_shop`
--

CREATE TABLE IF NOT EXISTS `product_shop` (
  `id` int(11) NOT NULL auto_increment,
  `product_id` int(10) unsigned NOT NULL,
  `shop_id` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `product_shop`
--

INSERT INTO `product_shop` (`id`, `product_id`, `shop_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 4, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 5, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 7, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 8, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 9, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 10, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 18, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE IF NOT EXISTS `shops` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `logo` varchar(500) collate utf8_unicode_ci NOT NULL,
  `phone` varchar(255) collate utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) collate utf8_unicode_ci NOT NULL,
  `email` varchar(255) collate utf8_unicode_ci NOT NULL,
  `views` int(11) default NULL,
  `vip` tinyint(4) NOT NULL default '0',
  `active` tinyint(4) default NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL default NULL,
  `updated_at` timestamp NULL default NULL,
  PRIMARY KEY  (`id`),
  KEY `shops_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=53 ;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `logo`, `phone`, `mobile`, `email`, `views`, `vip`, `active`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'image.jpg', '012345656556', '3546345445', 'ahmed@ahmed.com', 0, 1, 0, 1, NULL, NULL),
(3, 'image.jpg', '12345678', '123456789', 'ahmed@ahmed.com', 0, 1, 0, 1, NULL, NULL),
(4, 'image.jpg', '1234567890', '12345678', 'AHMED@AHMED.COM', 0, 1, 0, 1, NULL, NULL),
(5, 'image.jpg', '12345678', '09876543', 'ELSADANY@YAHOO.COM', 0, 0, 0, 1, NULL, NULL),
(6, 'image.jpg', '13245787675', '124443576576', 'ahmed@ahmed.com', 0, 0, 0, 1, NULL, NULL),
(7, 'image.jpg', '13245787675', '124443576576', 'ahmed@ahmed.com', 0, 1, 0, 1, NULL, NULL),
(8, 'image.jpg', '13245787675', '124443576576', 'ahmed@ahmed.com', 0, 0, 0, 1, NULL, NULL),
(9, 'image.jpg', '13245787675', '124443576576', 'ahmed@ahmed.com', 0, 1, 0, 1, NULL, NULL),
(10, 'image.jpg', '13245787675', '124443576576', 'ahmed@ahmed.com', 0, 0, 0, 1, NULL, NULL),
(11, 'image.jpg', '13245787675', '124443576576', 'ahmed@ahmed.com', 0, 1, 0, 1, NULL, NULL),
(12, 'image.jpg', '13245787675', '124443576576', 'ahmed@ahmed.com', 0, 0, 0, 1, NULL, NULL),
(13, 'image.jpg', '13245787675', '124443576576', 'ahmed@ahmed.com', 0, 0, 0, 1, NULL, NULL),
(14, 'image.jpg', '13245787675', '124443576576', 'ahmed@ahmed.com', 0, 0, 0, 1, NULL, NULL),
(15, 'image.jpg', '13245787675', '124443576576', 'ahmed@ahmed.com', 0, 0, 0, 1, NULL, NULL),
(16, 'image.jpg', '13245787675', '124443576576', 'ahmed@ahmed.com', 0, 0, 0, 1, NULL, NULL),
(17, 'image.jpg', '13245787675', '124443576576', 'ahmed@ahmed.com', 0, 0, 0, 1, NULL, NULL),
(18, 'image.jpg', '13245787675', '124443576576', 'ahmed@ahmed.com', 0, 0, 0, 1, NULL, NULL),
(21, '12992327_262911147378141_1065177298_n.jpg', '0123333333', '0111459164', 'hi@yahoo.com', NULL, 1, NULL, 1, '2016-05-11 12:06:05', '2016-05-11 12:06:05'),
(22, 'arabic_logo_designs_1.png', '0123333333', '0111459164', 'how@yahoo.com', NULL, 0, NULL, 1, '2016-05-13 17:28:46', '2016-05-13 17:28:46'),
(23, 'mnbaa-logo.png', '0123333333', '0111459164', 'elsadany@yahoo.com', NULL, 0, NULL, 1, '2016-05-13 17:41:51', '2016-05-13 17:41:51'),
(24, 'united-states-telecommunications-logo-design.png', '0123333333', '0111459164', 'elsadany@yahoo.com', NULL, 1, NULL, 1, '2016-05-13 17:44:05', '2016-05-13 17:44:05'),
(25, 'index.jpg', '0123333333', '0111459164', 'elsadany@yahoo.com', NULL, 0, NULL, 1, '2016-05-13 17:48:04', '2016-05-13 17:48:04'),
(26, '03-590x368.png', '0123333333', '0111459164', 'elsadany@yahoo.com', NULL, 0, NULL, 1, '2016-05-13 17:52:29', '2016-05-13 17:52:29'),
(27, '03-590x368.png', '0123333333', '0111459164', 'elsadany@yahoo.com', NULL, 1, NULL, 1, '2016-05-13 17:53:59', '2016-05-13 17:53:59'),
(28, '03-590x368.png', '0123333333', '0111459164', 'elsadany@yahoo.com', NULL, 0, NULL, 1, '2016-05-13 17:55:04', '2016-05-13 17:55:04'),
(29, '03c3c3ff199c0b80ce19a0306655e613.jpg', '0123333333', '0111459164', 'elsadany@yahoo.com', NULL, 0, NULL, 1, '2016-05-13 17:58:30', '2016-05-13 17:58:30'),
(30, 'arabic_logo_by_eje_studio___ebrahim_jaffar_by_one_bh-d8rd4ms.jpg', '0123333333', '0111459164', 'elsadany@yahoo.com', NULL, 0, NULL, 1, '2016-05-13 18:01:20', '2016-05-13 18:01:20'),
(31, 'arabic-calligraphy-eduard06.jpg', '0123333333', '0111459167', 'elsadany@yahoo.com', NULL, 0, NULL, 1, '2016-05-13 18:07:01', '2016-05-13 18:07:01'),
(32, 'fbbe067d19a5d462b5854913b37925af.jpg', '0123333333', '0111459164', 'elsadany@yahoo.com', NULL, 0, NULL, 1, '2016-05-13 18:09:23', '2016-05-13 18:09:23'),
(33, 'bbfa1a80ab9d480201cbe8c5fc4c4fb9.jpg', '0123333333', '0111459164', 'elsadany@yahoo.com', NULL, 0, NULL, 1, '2016-05-13 18:11:13', '2016-05-13 18:11:13'),
(34, 'fbbe067d19a5d462b5854913b37925af.jpg', '0123333333', '0111459164', 'elsadany@yahoo.com', NULL, 0, NULL, 1, '2016-05-13 18:20:21', '2016-05-13 18:20:21'),
(35, 'd4d7e845b2ffe69a42ff0dfebc594661.jpg', '0123333333', '0111459164', 'elsadany@yahoo.com', NULL, 0, NULL, 4, '2016-05-14 08:12:51', '2016-05-14 08:12:51'),
(36, 'd4d7e845b2ffe69a42ff0dfebc594661.jpg', '0123333333', '0111459164', 'elsadany@yahoo.com', NULL, 0, NULL, 1, '2016-05-15 09:40:29', '2016-05-15 09:40:29'),
(37, '349279667.jpg', '0123333333', '0111459164', 'elsadany@yahoo.com', NULL, 0, NULL, 1, '2016-05-15 09:43:19', '2016-05-15 09:43:19'),
(38, 'images.png', '0123333333', '0111459164', 'elsadany@yahoo.com', NULL, 0, NULL, 1, '2016-05-15 09:45:07', '2016-05-15 09:45:07'),
(39, '349279667.jpg', '0123333333', '0111459164', 'elsadany@yahoo.com', NULL, 0, NULL, 1, '2016-05-15 09:49:05', '2016-05-15 09:49:05'),
(40, 'RollsKneelingLG.jpg', '0123333333', '0111459164', 'elsadany@yahoo.com', NULL, 0, NULL, 1, '2016-05-15 09:52:37', '2016-05-15 09:52:37'),
(41, 'RollsKneelingLG.jpg', '0123333333', '0111459164', 'eng.ahmedelsadany1@gmail.com', NULL, 0, NULL, 1, '2016-05-15 09:53:22', '2016-05-15 09:53:22'),
(42, 'RollsKneelingLG.jpg', '0123333333', '0111459164', 'hi@yahoo.com', NULL, 0, NULL, 1, '2016-05-15 09:54:07', '2016-05-15 09:54:07'),
(43, 'RollsKneelingLG.jpg', '01015622206', '01114591647', 'hi@yahoo.com', NULL, 0, NULL, 1, '2016-05-15 09:55:06', '2016-05-15 09:55:06'),
(44, 'adlisamazigh.png', '0123333333', '0111459164', 'elsadany@yahoo.com', NULL, 0, NULL, 1, '2016-05-15 09:59:25', '2016-05-15 09:59:25'),
(45, 'adlisamazigh.png', '0123333333', '0111459164', 'elsadany@yahoo.com', NULL, 0, NULL, 1, '2016-05-15 10:02:13', '2016-05-15 10:02:13'),
(46, 'adlisamazigh.png', '01015622206', '0111459164', 'elsadany@yahoo.com', NULL, 0, NULL, 1, '2016-05-15 10:04:10', '2016-05-15 10:04:10'),
(47, 'adlisamazigh.png', '0123333333', '0111459164', 'elsadany@yahoo.com', NULL, 0, NULL, 1, '2016-05-15 10:04:59', '2016-05-15 10:04:59'),
(48, 'index.png', '0123333333', '0111459164', 'elsadany@yahoo.com', NULL, 0, NULL, 1, '2016-05-15 10:06:20', '2016-05-15 10:06:20'),
(49, 'index.png', '0123333333', '0111459167', 'admin@yahoo.com', NULL, 0, NULL, 1, '2016-05-15 10:07:13', '2016-05-15 10:07:13'),
(50, 'index.png', '0123333333', '0111459164', 'hi@yahoo.com', NULL, 0, NULL, 1, '2016-05-15 10:07:58', '2016-05-15 10:07:58'),
(51, 'index.png', '0123333333', '0111459164', 'eng.ahmedelsadany1@gmail.com', NULL, 0, NULL, 1, '2016-05-15 10:09:46', '2016-05-15 10:09:46'),
(52, '6137.20120108103729.Hamza Logo 3.jpg', '11111111111', '0111459164', 'elsadany@yahoo.com', NULL, 0, NULL, 5, '2016-05-26 09:28:53', '2016-05-26 09:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `shops_follower`
--

CREATE TABLE IF NOT EXISTS `shops_follower` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `shop_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `shop_id` (`shop_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `shops_follower`
--

INSERT INTO `shops_follower` (`id`, `shop_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 24, 5, '2016-05-24 10:28:27', '2016-05-24 10:28:27');

-- --------------------------------------------------------

--
-- Table structure for table `shops_translations`
--

CREATE TABLE IF NOT EXISTS `shops_translations` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `description` varchar(255) collate utf8_unicode_ci NOT NULL,
  `keyword` varchar(255) collate utf8_unicode_ci NOT NULL,
  `address` varchar(255) collate utf8_unicode_ci NOT NULL,
  `lang` varchar(2) collate utf8_unicode_ci NOT NULL,
  `shop_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL default NULL,
  `updated_at` timestamp NULL default NULL,
  PRIMARY KEY  (`id`),
  KEY `shops_translations_shop_id_foreign` (`shop_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=56 ;

--
-- Dumping data for table `shops_translations`
--

INSERT INTO `shops_translations` (`id`, `name`, `description`, `keyword`, `address`, `lang`, `shop_id`, `created_at`, `updated_at`) VALUES
(1, 'SHOP1', 'SWRXDCFGBHNJMKJGFCDXCGJBKJLJKHBVF1', 'ملابس', 'يفبغلاتىمنةكمو', 'ar', 2, NULL, NULL),
(2, 'shop2', 'lkjhjkjvkjhgvjbvijdcl', 'uhygvhjhknjbhhujkh', 'pjiuhgftgvjghujjlkhb', 'ar', 3, NULL, NULL),
(3, 'shop3', 'gvfcdxgcfvjbhknmk', 'iugtfdxftgyhujlk', 'kmjgtdxcfghkjlkm;l,', 'ar', 4, NULL, NULL),
(4, 'shop5', 'oijouygftrdesdfgjykuj', 'iuytfrftgyhukjik', 'ertyuio', 'ar', 5, NULL, NULL),
(8, 'دكان', 'دكان دكان دكان دكان دكان', 'ساعات', 'ككككنتمانلتبؤيءبسيلبالاتن', 'ar', 6, NULL, NULL),
(9, 'دكان', 'دكان دكان دكان دكان دكان', 'ساعات', 'ككككنتمانلتبؤيءبسيلبالاتن', 'ar', 7, NULL, NULL),
(10, 'دكان', 'دكان دكان دكان دكان دكان', 'ساعات', 'ككككنتمانلتبؤيءبسيلبالاتن', 'ar', 8, NULL, NULL),
(11, 'دكان', 'دكان دكان دكان دكان دكان', 'ساعات', 'ككككنتمانلتبؤيءبسيلبالاتن', 'ar', 9, NULL, NULL),
(12, 'دكان', 'دكان دكان دكان دكان دكان', 'ساعات', 'ككككنتمانلتبؤيءبسيلبالاتن', 'ar', 10, NULL, NULL),
(13, 'دكان', 'دكان دكان دكان دكان دكان', 'ساعات', 'ككككنتمانلتبؤيءبسيلبالاتن', 'ar', 11, NULL, NULL),
(14, 'دكان', 'دكان دكان دكان دكان دكان', 'ساعات', 'ككككنتمانلتبؤيءبسيلبالاتن', 'ar', 12, NULL, NULL),
(15, 'دكان', 'دكان دكان دكان دكان دكان', 'ساعات', 'ككككنتمانلتبؤيءبسيلبالاتن', 'ar', 13, NULL, NULL),
(16, 'دكان', 'دكان دكان دكان دكان دكان', 'ساعات', 'ككككنتمانلتبؤيءبسيلبالاتن', 'ar', 14, NULL, NULL),
(17, 'دكان', 'دكان دكان دكان دكان دكان', 'ساعات', 'ككككنتمانلتبؤيءبسيلبالاتن', 'ar', 15, NULL, NULL),
(18, 'دكان', 'دكان دكان دكان دكان دكان', 'ساعات', 'ككككنتمانلتبؤيءبسيلبالاتن', 'ar', 16, NULL, NULL),
(20, 'دكان', 'دكان دكان دكان دكان دكان', 'ساعات', 'ككككنتمانلتبؤيءبسيلبالاتن', 'ar', 17, NULL, NULL),
(21, 'دكان', 'دكان دكان دكان دكان دكان', 'ساعات', 'ككككنتمانلتبؤيءبسيلبالاتن', 'ar', 17, NULL, NULL),
(22, 'دكان', 'دكان دكان دكان دكان دكان', 'ساعات', 'ككككنتمانلتبؤيءبسيلبالاتن', 'ar', 18, NULL, NULL),
(24, 'ahmed', 'szxdgfhgjhkjnkml,.;kkk', 'ساعات', 'تتتتتتت', 'ar', 21, '2016-05-11 12:06:05', '2016-05-11 12:06:05'),
(25, 'اى حاجه', 'iouiygtgyuikolokjuhyg', 'ساعات', 'hjk', 'ar', 22, '2016-05-13 17:28:46', '2016-05-13 17:28:46'),
(26, 'اى حاج', 'kjuhgghjk[poiuj\\''[p;oli'';lk', 'ساعات', 'تتتتتتت', 'ar', 23, '2016-05-13 17:41:51', '2016-05-13 17:41:51'),
(27, 'ahmed', 'mmmmmmmmmmmmmmmmmmmmm', 'ساعات', 'تتتتتتت', 'ar', 24, '2016-05-13 17:44:06', '2016-05-13 17:44:06'),
(28, 'ahmed', 'pokijhuygtfrdtfyuiop', 'ساعات', 'تتتتتتت', 'ar', 25, '2016-05-13 17:48:04', '2016-05-13 17:48:04'),
(31, 'ahmed', 'iuhygtfrdtfgyhukjikll', 'ساعات', 'تتتتتتت', 'ar', 28, '2016-05-13 17:55:04', '2016-05-13 17:55:04'),
(32, 'hjkkk', 'oiuytfrdttyuiok;pk;oo;ko;ko;', 'ساعات', 'تتتتتتت', 'ar', 29, '2016-05-13 17:58:30', '2016-05-13 17:58:30'),
(33, 'tvk', 'ojiuytrdfyguhijll;oklijkjhghgf', 'ساعات', 'تتتتتتت', 'ar', 30, '2016-05-13 18:01:20', '2016-05-13 18:01:20'),
(34, 'ahmed', 'hjbkjlkmlkkkijhbjjikijkjiok', 'ساعات', 'تتتتتتت', 'ar', 31, '2016-05-13 18:07:02', '2016-05-13 18:07:02'),
(35, 'مترو', 'كخنمتناتلرابؤلالتانمتنكم', 'ساعات', 'تتتتتتت', 'ar', 32, '2016-05-13 18:09:23', '2016-05-13 18:09:23'),
(36, 'مترو', 'تتنالاتةانتمنممتممتمتممت', 'ساعات', 'تتتتتتت', 'ar', 33, '2016-05-13 18:11:13', '2016-05-13 18:11:13'),
(37, 'مترو', 'ممنعغفقييفبغاعنممكخهع', 'ساعات', 'تتتتتتت', 'ar', 34, '2016-05-13 18:20:21', '2016-05-13 18:20:21'),
(38, 'حاجه حلوه اوى', 'عفبقفيثفقبفلغعاتهمخكنهعغفق', 'ساعات', 'تتتتتتت', 'ar', 35, '2016-05-14 08:12:51', '2016-05-14 08:12:51'),
(39, 'اى حاجه', 'خعهاغعلفبقفيثسصشثقفبع', 'تابات', 'تتتتتتت', 'ar', 36, '2016-05-15 09:40:29', '2016-05-15 09:40:29'),
(40, 'موبيل', 'عغعفقفثسقثفبغلعاتهنخ', 'موبيلات ذكيه', 'تتتتتتت', 'ar', 37, '2016-05-15 09:43:19', '2016-05-15 09:43:19'),
(41, 'حاجه حلوه اوى', 'تابات تابات تابات تابات', 'تابات', 'تتتتتتت', 'ar', 38, '2016-05-15 09:45:07', '2016-05-15 09:45:07'),
(42, 'ahmed', 'كهتعاغلفبقيثسصشضصضثصقفغلعاهت', 'موبيلات ذكيه', 'تتتتتتت', 'ar', 39, '2016-05-15 09:49:05', '2016-05-15 09:49:05'),
(43, 'حاجه حلوه اوى', 'مةنتاغلبقيسشِسيئءبؤلالاتىنةم', 'تماثيل خشبيه', 'تتتتتتتتتتتت', 'ar', 40, '2016-05-15 09:52:37', '2016-05-15 09:52:37'),
(44, 'حاجه حلوه اوى', 'طتعغلفقيثسصشققفلغاعت', 'تماثيل خشبيه', 'aaaaaaaaaaaaaaa', 'ar', 41, '2016-05-15 09:53:22', '2016-05-15 09:53:22'),
(45, 'حاجه حلوه اوى', 'ككخنتهعغلفق54بلغتنهنخكمهتعناغلت', 'ساعات', 'تتتتتتت', 'ar', 42, '2016-05-15 09:54:07', '2016-05-15 09:54:07'),
(46, 'مترو', 'تعاغلفبقيفبغلعهعغلفبق', 'تماثيل خشبيه', 'تتتتتتتتتتتت', 'ar', 43, '2016-05-15 09:55:06', '2016-05-15 09:55:06'),
(47, 'ahmed', 'مهنعغتلفقيثسصثقيقبفلنخنه', 'بورتريهات', 'تتتتتتت', 'ar', 44, '2016-05-15 09:59:25', '2016-05-15 09:59:25'),
(48, 'حاجه حلوه اوى', 'كهتاعغلفقيثسصشسقيفبلتهنخم', 'بورتريهات', 'تتتتتتتتتتتت', 'ar', 45, '2016-05-15 10:02:13', '2016-05-15 10:02:13'),
(49, 'حاجه حلوه اوى', 'مكنمتتتتممتتمتمتمتمتمتمتم', 'بورتريهات', 'تتتتتتتتتتتت', 'ar', 46, '2016-05-15 10:04:10', '2016-05-15 10:04:10'),
(50, 'حاجه حلوه اوى', 'هعاغلفبقيثقسصصضعغغفنتن', 'بورتريهات', 'تتتتتتت', 'ar', 47, '2016-05-15 10:05:00', '2016-05-15 10:05:00'),
(51, 'حاجه حلوه اوى', 'IUHYGTRDESWAQEWRTYUIU', 'غرف اطفال', 'تتتتتتت', 'ar', 48, '2016-05-15 10:06:20', '2016-05-15 10:06:20'),
(52, 'حاجه حلوه اوى', 'خهعغفقثصضصضصثصقفغعهخ', 'غرف اطفال', 'تتتتتتت', 'ar', 49, '2016-05-15 10:07:13', '2016-05-15 10:07:13'),
(53, 'حاجه حلوه اوى', 'كنمنتاتلابيثصسثسثقبفنتاغلق', 'غرف صالون', 'تتتتتتت', 'ar', 50, '2016-05-15 10:07:58', '2016-05-15 10:07:58'),
(54, 'حاجه حلوه اوى', 'كهتعغفقثصضنختهعالاخخخخ', 'غرف صالون', 'تتتتتتت', 'ar', 51, '2016-05-15 10:09:46', '2016-05-15 10:09:46'),
(55, 'حاجه حلوه اوى', 'kjhgfddsdrtfgyhujikol', 'ساعات', 'تتتتتتت', 'ar', 52, '2016-05-26 09:28:53', '2016-05-26 09:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `souqs`
--

CREATE TABLE IF NOT EXISTS `souqs` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `cat_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL default NULL,
  `updated_at` timestamp NULL default NULL,
  PRIMARY KEY  (`id`),
  KEY `souqs_cat_id_foreign` (`cat_id`),
  KEY `souqs_product_id_foreign` (`product_id`),
  KEY `souqs_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `souqs`
--

INSERT INTO `souqs` (`id`, `cat_id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 10, 1, 1, NULL, NULL),
(2, 10, 2, 1, NULL, NULL),
(11, 10, 3, 1, NULL, NULL),
(12, 10, 4, 1, NULL, NULL),
(13, 10, 5, 1, NULL, NULL),
(14, 10, 6, 1, NULL, NULL),
(15, 10, 7, 1, NULL, NULL),
(16, 10, 8, 1, NULL, NULL),
(17, 10, 9, 1, NULL, NULL),
(18, 10, 10, 1, NULL, NULL),
(19, 10, 13, 4, '2016-05-14 08:06:15', '2016-05-14 08:06:15'),
(20, 11, 17, 4, '2016-05-19 05:55:26', '2016-05-19 05:55:26'),
(21, 10, 19, 6, '2016-06-02 13:31:32', '2016-06-02 13:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `email` varchar(255) collate utf8_unicode_ci NOT NULL,
  `password` varchar(255) collate utf8_unicode_ci NOT NULL,
  `phone` varchar(255) collate utf8_unicode_ci NOT NULL,
  `address` varchar(255) collate utf8_unicode_ci NOT NULL,
  `country` varchar(255) collate utf8_unicode_ci NOT NULL,
  `image` varchar(255) collate utf8_unicode_ci default NULL,
  `remember_token` varchar(100) collate utf8_unicode_ci default NULL,
  `created_at` timestamp NULL default NULL,
  `updated_at` timestamp NULL default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `country`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'احمد', 'elsadany@yahoo.com', '$2y$10$aaktTHqG/CjOu38kzw20GO7PejQFidKEq9LccswsUwyVLDx3m3XtG', '0123333333', 'تتتتتتتتتتتت', 'مصر', 'image.jpg', 'gmhX1HJsOtbMCht04fwalHbyAvcqZZIH9M9JCj3bYPL1p67lP0qKdrcucTy4', '2016-05-05 04:20:23', '2016-05-12 09:19:09'),
(2, 'ahmed', 'ahmed@ahmed.com', '$2y$10$srURPBvhvaWr6nNrQclc/ufMS39f66d07SR1Egelcmoh1gD9lwTFa', '0123333333', 'تتتتتتت', 'مصر', '03-590x368.png', NULL, '2016-05-08 06:28:29', '2016-05-08 06:28:29'),
(3, 'elmalllah', 'moh@gmail.com', '$2y$10$4jtC0LO6Pz5ynQmBWCojM.uBSz.AUCRrt4ADVcfSY8iiRUAIDUcNC', '01015622206', 'تتتتتتت', 'مصر', 'jodur_magazine_logo_by_one_bh-d50t15r.jpg', NULL, '2016-05-14 07:36:42', '2016-05-14 07:36:42'),
(4, 'mohamed', 'mallah@gmail.com', '$2y$10$oCSa.tRSyTeM8459vkGMHekCa6D0xLOnVSx5FlJq1iUaaBUdtgqIq', '1111111', 'mmmmm', 'mmmmmm', NULL, NULL, '2016-05-14 07:46:46', '2016-05-14 07:46:46'),
(5, 'ahmed', 'eng.ahmedelsadany1@gmail.com', '$2y$10$dR3k6rByarJ9fbipQO00y.j.e/dF0yxlMRPSOeLG/q.wruhYF9JPW', '01015622206', 'aaaaaaaaaaaaaaa', 'مصر', '6137.20120108103729.Hamza Logo 3.jpg', NULL, '2016-05-23 16:14:42', '2016-05-23 16:14:42'),
(6, 'yara Ahmed Amin ', 'yara@gmail.com', '$2y$10$LcSaqL1u/yv0HI0drbP5Ce6DcqDr02cJQut4.iciQ4Y2yy6O4BFXu', '01015209317', '', '', 'Al-khawaja-Abdel-Qader-Episode-22_i770.jpg', NULL, '2016-06-02 11:53:14', '2016-06-02 11:53:14'),
(7, 'ahmed abd elwahab', 'aboda@gmail.com', '$2y$10$eLOiQNlQ5KhIpGFNy7Ao/O3h7rZ6NCcHX1cAtdLp1uK/Nv3tBHnOC', '01019076464', '', '', 'fg.jpg', NULL, '2016-06-07 09:11:33', '2016-06-07 09:11:33');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_translations`
--
ALTER TABLE `attribute_translations`
  ADD CONSTRAINT `attribute_translations_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`);

--
-- Constraints for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `dropdowns`
--
ALTER TABLE `dropdowns`
  ADD CONSTRAINT `dropdowns_ibfk_1` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_favorite`
--
ALTER TABLE `product_favorite`
  ADD CONSTRAINT `product_favorite_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_favorite_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_review`
--
ALTER TABLE `product_review`
  ADD CONSTRAINT `FK_product_review_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `shops`
--
ALTER TABLE `shops`
  ADD CONSTRAINT `shops_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `shops_follower`
--
ALTER TABLE `shops_follower`
  ADD CONSTRAINT `shops_follower_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shops_follower_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shops_translations`
--
ALTER TABLE `shops_translations`
  ADD CONSTRAINT `shops_translations_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`);

--
-- Constraints for table `souqs`
--
ALTER TABLE `souqs`
  ADD CONSTRAINT `souqs_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `souqs_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `souqs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
