-- phpMyAdmin SQL Dump
-- version 2.11.9.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 01, 2009 at 05:58 PM
-- Server version: 5.0.67
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `giaodn_crawl`
--

-- --------------------------------------------------------

--
-- Table structure for table `cafeshops`
--

DROP TABLE IF EXISTS `cafeshops`;
CREATE TABLE IF NOT EXISTS `cafeshops` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `seo_keywords` varchar(128) collate utf8_unicode_ci NOT NULL,
  `seo_description` varchar(128) collate utf8_unicode_ci NOT NULL,
  `image` varchar(128) collate utf8_unicode_ci NOT NULL,
  `name` varchar(128) collate utf8_unicode_ci NOT NULL,
  `alias` varchar(128) collate utf8_unicode_ci NOT NULL,
  `province_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `ward` varchar(128) collate utf8_unicode_ci NOT NULL,
  `street` varchar(128) collate utf8_unicode_ci NOT NULL,
  `phone` varchar(64) collate utf8_unicode_ci NOT NULL,
  `email` varchar(128) collate utf8_unicode_ci NOT NULL,
  `fax` varchar(64) collate utf8_unicode_ci NOT NULL,
  `website` varchar(128) collate utf8_unicode_ci NOT NULL,
  `number_of_seats` int(11) NOT NULL,
  `open_time_from` int(11) NOT NULL,
  `open_time_to` int(11) NOT NULL,
  `average_price` decimal(10,3) NOT NULL,
  `option_accept_booking` tinyint(1) NOT NULL default '0',
  `option_free_parking` tinyint(1) NOT NULL default '0',
  `option_free_wifi` tinyint(1) NOT NULL default '0',
  `option_breakfast` tinyint(1) NOT NULL default '0',
  `option_club_activities` tinyint(1) NOT NULL default '0',
  `option_air_conditioner` tinyint(1) NOT NULL default '0',
  `option_live_music` tinyint(1) NOT NULL default '0',
  `option_lunch` tinyint(1) NOT NULL default '0',
  `option_football` tinyint(1) NOT NULL default '0',
  `option_fashion` tinyint(1) NOT NULL default '0',
  `summary` text collate utf8_unicode_ci NOT NULL,
  `description` text collate utf8_unicode_ci NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `treatments` text collate utf8_unicode_ci NOT NULL,
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  `status` tinyint(4) NOT NULL default '0',
  `number_views` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cafeshops`
--


-- --------------------------------------------------------

--
-- Table structure for table `cafeshops_categories`
--

DROP TABLE IF EXISTS `cafeshops_categories`;
CREATE TABLE IF NOT EXISTS `cafeshops_categories` (
  `id` int(11) NOT NULL auto_increment,
  `cafeshop_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cafeshops_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL auto_increment,
  `type` varchar(64) collate utf8_unicode_ci NOT NULL,
  `name` varchar(128) collate utf8_unicode_ci NOT NULL,
  `alias` varchar(128) collate utf8_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(128) collate utf8_unicode_ci NOT NULL,
  `alias` varchar(128) collate utf8_unicode_ci NOT NULL,
  `province_id` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `districts`
--


-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int(11) NOT NULL auto_increment,
  `title` text collate utf8_unicode_ci NOT NULL,
  `question` text collate utf8_unicode_ci NOT NULL,
  `answer` text collate utf8_unicode_ci NOT NULL,
  `questioner` varchar(128) collate utf8_unicode_ci NOT NULL,
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `faqs`
--


-- --------------------------------------------------------

--
-- Table structure for table `item_images`
--

DROP TABLE IF EXISTS `item_images`;
CREATE TABLE IF NOT EXISTS `item_images` (
  `id` int(11) NOT NULL auto_increment,
  `image` varchar(128) collate latin1_general_ci NOT NULL,
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  `item_id` int(11) NOT NULL,
  `title` varchar(128) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `item_images`
--


-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(256) collate utf8_unicode_ci NOT NULL,
  `company` varchar(256) collate utf8_unicode_ci NOT NULL,
  `location` varchar(256) collate utf8_unicode_ci NOT NULL,
  `description` text collate utf8_unicode_ci NOT NULL,
  `time_latest` varchar(128) collate utf8_unicode_ci NOT NULL default '',
  `crawl_from` varchar(128) collate utf8_unicode_ci NOT NULL default '',
  `category_id` int(11) NOT NULL,
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `jobs`
--


-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

DROP TABLE IF EXISTS `job_categories`;
CREATE TABLE IF NOT EXISTS `job_categories` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(128) collate utf8_unicode_ci NOT NULL,
  `alias` varchar(128) collate utf8_unicode_ci NOT NULL,
  `url` varchar(256) collate utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

--
-- Dumping data for table `job_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL,
  `url` varchar(128) collate utf8_unicode_ci NOT NULL,
  `description` varchar(128) collate utf8_unicode_ci NOT NULL,
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  `name` varchar(128) collate utf8_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL default '0',
  `category_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `links`
--


-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

DROP TABLE IF EXISTS `manufacturers`;
CREATE TABLE IF NOT EXISTS `manufacturers` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(128) collate utf8_unicode_ci NOT NULL,
  `added_date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `manufacturers`
--


-- --------------------------------------------------------

--
-- Table structure for table `navigations`
--

DROP TABLE IF EXISTS `navigations`;
CREATE TABLE IF NOT EXISTS `navigations` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(128) collate utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL default '0',
  `url` varchar(128) collate utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL default '0',
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  `sort_order` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `navigations`
--


-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `image` varchar(128) collate utf8_unicode_ci NOT NULL,
  `seo_keywords` varchar(128) collate utf8_unicode_ci NOT NULL,
  `seo_description` varchar(128) collate utf8_unicode_ci NOT NULL,
  `title` text collate utf8_unicode_ci,
  `alias` varchar(256) collate utf8_unicode_ci NOT NULL,
  `summary` text collate utf8_unicode_ci NOT NULL,
  `description` text collate utf8_unicode_ci NOT NULL,
  `added_date` datetime default NULL,
  `last_updated` datetime default NULL,
  `source_name` varchar(128) collate utf8_unicode_ci NOT NULL,
  `source_url` varchar(255) collate utf8_unicode_ci default NULL,
  `status` tinyint(1) NOT NULL default '0',
  `number_views` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  FULLTEXT KEY `title` (`title`,`summary`,`description`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `news`
--


-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

DROP TABLE IF EXISTS `news_categories`;
CREATE TABLE IF NOT EXISTS `news_categories` (
  `id` int(11) NOT NULL auto_increment,
  `news_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `news_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `nodes`
--

DROP TABLE IF EXISTS `nodes`;
CREATE TABLE IF NOT EXISTS `nodes` (
  `id` int(11) NOT NULL auto_increment,
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  `name` varchar(128) collate utf8_unicode_ci NOT NULL,
  `reference_name` varchar(128) collate utf8_unicode_ci NOT NULL,
  `seo_keywords` varchar(128) collate utf8_unicode_ci NOT NULL,
  `seo_description` varchar(128) collate utf8_unicode_ci NOT NULL,
  `content` text collate utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nodes`
--


-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL auto_increment,
  `seo_keywords` varchar(128) collate utf8_unicode_ci NOT NULL,
  `seo_description` varchar(128) collate utf8_unicode_ci NOT NULL,
  `name` varchar(128) collate utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text collate utf8_unicode_ci NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `price` decimal(10,3) NOT NULL,
  `treatments` text collate utf8_unicode_ci NOT NULL,
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  `status` tinyint(4) NOT NULL default '0',
  `number_views` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  FULLTEXT KEY `name` (`name`,`description`,`treatments`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `products`
--


-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
CREATE TABLE IF NOT EXISTS `provinces` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(128) collate utf8_unicode_ci NOT NULL,
  `alias` varchar(128) collate utf8_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `provinces`
--


-- --------------------------------------------------------

--
-- Table structure for table `searched_keywords`
--

DROP TABLE IF EXISTS `searched_keywords`;
CREATE TABLE IF NOT EXISTS `searched_keywords` (
  `id` int(11) NOT NULL auto_increment,
  `keyword` varchar(128) collate utf8_unicode_ci NOT NULL,
  `type` varchar(128) collate utf8_unicode_ci NOT NULL,
  `number_times` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `searched_keywords`
--


-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL auto_increment,
  `sender_name` varchar(128) collate utf8_unicode_ci NOT NULL,
  `sender_email` varchar(128) collate utf8_unicode_ci NOT NULL,
  `smtp_host` varchar(128) collate utf8_unicode_ci NOT NULL,
  `smtp_user` varchar(128) collate utf8_unicode_ci NOT NULL,
  `smtp_password` varchar(128) collate utf8_unicode_ci NOT NULL,
  `smtp_auth` tinyint(1) NOT NULL default '0',
  `wordwrap` tinyint(2) NOT NULL default '80',
  `charset` varchar(32) collate utf8_unicode_ci NOT NULL default 'utf-8',
  `contact_address` varchar(256) collate utf8_unicode_ci NOT NULL,
  `contact_email` varchar(64) collate utf8_unicode_ci NOT NULL,
  `contact_phone` varchar(64) collate utf8_unicode_ci NOT NULL,
  `contact_fax` varchar(64) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `settings`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(128) collate utf8_unicode_ci NOT NULL,
  `role` varchar(64) collate utf8_unicode_ci NOT NULL,
  `email` varchar(128) collate utf8_unicode_ci NOT NULL,
  `username` varchar(128) collate utf8_unicode_ci NOT NULL,
  `password` varchar(128) collate utf8_unicode_ci NOT NULL,
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `username`, `password`, `added_date`, `last_updated`) VALUES
(1, 'Đặng Ngọc Giao', 'ADMIN', 'giaodn@gmail.com', 'giaodn', 'c9be812505baea091f4c0c06207c3f94807750db', '2008-03-06 09:31:33', '2008-05-01 03:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

DROP TABLE IF EXISTS `wards`;
CREATE TABLE IF NOT EXISTS `wards` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(128) collate utf8_unicode_ci NOT NULL,
  `alias` varchar(128) collate utf8_unicode_ci NOT NULL,
  `district_id` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wards`
--

