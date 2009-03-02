-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 01, 2009 at 08:42 PM
-- Server version: 5.1.30
-- PHP Version: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crawl`
--

-- --------------------------------------------------------

--
-- Table structure for table `cafeshops`
--

DROP TABLE IF EXISTS `cafeshops`;
CREATE TABLE IF NOT EXISTS `cafeshops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `seo_keywords` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `seo_description` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `ward` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `number_of_seats` int(11) NOT NULL,
  `open_time_from` int(11) NOT NULL,
  `open_time_to` int(11) NOT NULL,
  `average_price` decimal(10,3) NOT NULL,
  `option_accept_booking` tinyint(1) NOT NULL DEFAULT '0',
  `option_free_parking` tinyint(1) NOT NULL DEFAULT '0',
  `option_free_wifi` tinyint(1) NOT NULL DEFAULT '0',
  `option_breakfast` tinyint(1) NOT NULL DEFAULT '0',
  `option_club_activities` tinyint(1) NOT NULL DEFAULT '0',
  `option_air_conditioner` tinyint(1) NOT NULL DEFAULT '0',
  `option_live_music` tinyint(1) NOT NULL DEFAULT '0',
  `option_lunch` tinyint(1) NOT NULL DEFAULT '0',
  `option_football` tinyint(1) NOT NULL DEFAULT '0',
  `option_fashion` tinyint(1) NOT NULL DEFAULT '0',
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `treatments` text COLLATE utf8_unicode_ci NOT NULL,
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `number_views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `cafeshops`
--


-- --------------------------------------------------------

--
-- Table structure for table `cafeshops_categories`
--

DROP TABLE IF EXISTS `cafeshops_categories`;
CREATE TABLE IF NOT EXISTS `cafeshops_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cafeshop_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `cafeshops_categories`
--

INSERT INTO `cafeshops_categories` (`id`, `cafeshop_id`, `category_id`) VALUES
(6, 3, 20),
(5, 3, 27),
(9, 12, 27),
(10, 13, 27),
(11, 13, 20);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `alias`, `province_id`, `sort_order`, `added_date`, `last_updated`) VALUES
(1, 'Ba Đình', 'ba-dinh', 1, 1, '2008-04-19 12:41:24', '2008-04-26 12:41:27'),
(2, 'Cầu Giấy', 'cay-giay', 1, 2, '2008-04-19 12:42:21', '2008-04-19 12:42:23'),
(3, 'Đông Anh', 'dong-anh', 1, 3, '2008-04-22 09:53:56', '2008-04-22 09:53:56'),
(4, 'Đống Đa', 'dong-da', 1, 4, '2008-04-22 09:53:56', '2008-04-22 09:53:56'),
(5, 'Gia Lâm', 'gia-lam', 1, 5, '2008-04-22 09:54:47', '2008-04-22 09:54:47'),
(6, 'Hai Bà  Trưng', 'hai-ba-trung', 1, 6, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(7, 'Hoàn Kiếm', 'hoan-kiem', 1, 7, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(8, 'Hoàng Mai', 'hoang-mai', 1, 8, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(9, 'Long Biên', 'long-bien', 1, 9, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(10, 'Sóc Sơn', 'soc-son', 1, 10, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(11, 'Tây Hồ', 'tay-ho', 1, 11, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(12, 'Quận 1', 'quan-1', 2, 1, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(13, 'Quận 2', 'quan-2', 2, 2, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(14, 'Quận 3', 'quan-3', 2, 3, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(15, 'Quận 4', 'quan-4', 2, 4, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(16, 'Quận 5', 'quan-5', 2, 5, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(17, 'Quận 6', 'quan-6', 2, 6, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(18, 'Quận 7', 'quan-7', 2, 7, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(19, 'Quận 8', 'quan-8', 2, 8, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(20, 'Quận 9', 'quan-9', 2, 9, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(21, 'Quận 10', 'quan-10', 2, 10, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(22, 'Quận 11', 'quan-11', 2, 11, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(23, 'Quận 12', 'quan-12', 2, 12, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(24, 'Bình Chánh', 'binh-chanh', 2, 13, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(25, 'Bình Tân', 'binh-tan', 2, 14, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(26, 'Bình Thạnh', 'binh-thanh', 2, 15, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(27, 'Cần Giờ', 'can-gio', 2, 16, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(28, 'Củ Chi', 'cu-chi', 2, 17, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(29, 'Gò Vấp', 'go-vap', 2, 18, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(30, 'Hócc Môn', 'hoc-mon', 2, 19, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(31, 'Nhà Bè', 'nha-be', 2, 20, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(32, 'Phú Nhuận', 'phu-nhuan', 2, 21, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(33, 'Thủ Đức', 'thu-duc', 2, 22, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(34, 'Tân Bình', 'tan-binh', 2, 23, '2008-04-22 10:10:23', '2008-04-22 10:10:23'),
(35, 'Tân Phú', 'tan-phu', 2, 24, '2008-04-22 10:10:23', '2008-04-22 10:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `questioner` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `faqs`
--


-- --------------------------------------------------------

--
-- Table structure for table `item_images`
--

DROP TABLE IF EXISTS `item_images`;
CREATE TABLE IF NOT EXISTS `item_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(128) COLLATE latin1_general_ci NOT NULL,
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  `item_id` int(11) NOT NULL,
  `title` varchar(128) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `item_images`
--


-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `time_latest` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `crawl_from` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `category_id` int(11) NOT NULL,
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=112 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `company`, `location`, `description`, `time_latest`, `crawl_from`, `category_id`, `added_date`, `last_updated`) VALUES
(1, 'Administration', 'Metropolitan Community College of Omaha Nebraska', 'Omaha, NE', 'Metropolitan Community College is accredited by the Higher Learning Commission and is a member of the North Central Association. With eight different campuses and centers, MCC is', '1 day ago\n        ', ' Patriot Jobs', 2, '2009-03-01 08:10:48', '2009-03-01 08:10:48'),
(2, 'Database Administration', '', 'Peapack, NJ', 'Work Type: Database Administration Senior Oracle DBA (Projects and Development) ... 6+ years progressive experience in database administration including Oracle 10g and 11g-...\n      \n      \n        1 hour ago\n        from', '1 hour ago\n        ', ' Jobirn', 2, '2009-03-01 08:10:48', '2009-03-01 08:10:48'),
(3, 'Systems Administration', '', 'Nutley, NJ', 'years of experience with Solaris systems administration. Familiar with Sun hardware platforms Working knowledge of Relational Database (Sybase knowledge especially General...', '1 hour ago\n        ', ' Jobirn', 2, '2009-03-01 08:10:48', '2009-03-01 08:10:48'),
(4, 'MYSQL Administration', 'Zenith Software', 'Philadelphia, PA', ': MYSQL Administration Location: Philadelphia, PADuration: 4+ month\\''s contractProcess: phone screen ONLY but candidate must be able to relocate - they\\''d prefer local MySQL...\n      \n      \n        2 days ago', '2 days ago\n        ', ' Corp-Corp.com', 2, '2009-03-01 08:10:48', '2009-03-01 08:10:48'),
(5, 'Administration Assistant', 'Yale University', 'New Haven, CT', 'General Purpose Provide wide-ranging administrative and clerical support to the Director of the', '2 days ago\n        ', ' NewHavenCountyJobs.com', 2, '2009-03-01 08:10:48', '2009-03-01 08:10:48'),
(6, 'Weblogic Administration', 'Cybertec', 'Mountain View, CA', '&amp; Application Server Administration Highly technical, quick learner, strong ability ... industry development tools and standards Administration, configuration, design of the...\n      \n      \n        4 days ago\n        from', '4 days ago\n        ', ' Corp-Corp.com', 2, '2009-03-01 08:10:48', '2009-03-01 08:10:48'),
(7, 'Provider Administration Manager', 'Humana', 'Chicago, IL', 'health plan experience. Role: Provider Administration Manager Location: Chicago, IL ... read on! Assignment Capsule As a Provider Administration Manager you will implement a...\n      \n      \n        2 days ago', '2 days ago\n        ', ' Beyond.com', 2, '2009-03-01 08:10:48', '2009-03-01 08:10:48'),
(8, 'Manager- Web Administration', 'Hospitality Company', 'Miami, FL', 'Web Administration Manages a unit within the Technology Service Group consisting of one or more areas responsible for the architecture, implementation and support of mission...\n      \n      \n        6 days ago', '6 days ago\n        ', ' TheLadders.com', 2, '2009-03-01 08:10:48', '2009-03-01 08:10:48'),
(9, 'Supervisor, Administration', 'Executive Network Group', 'California', 'Title: Supervisor, Administration\nCareer Interests: Claims\nDiscipline: Property &amp; ... Annually prepare, implement and complete Administration Units Business Plan.\n10...\n      \n      \n        8 days ago', '8 days ago\n        ', ' UltimateInsuranceJobs.com', 2, '2009-03-01 08:10:48', '2009-03-01 08:10:48'),
(10, 'Systems Administration', 'Visionit', 'New York, NY', 'would have their past experience in the administration and support of multi-tiered medium, over 500 servers, or large', '23 hours ago\n        ', ' VisionIT', 2, '2009-03-01 08:10:48', '2009-03-01 08:10:48'),
(11, 'Jboss Administration/ Web &amp; Application server administration', 'Hevar Systems', 'Mountain View, CA', 'Web &amp; Application server administration Highly technical, quick learner, strong ... industry development tools and standards Administration, configurat', '1 day ago\n        ', ' Corp-Corp.com', 2, '2009-03-01 08:10:53', '2009-03-01 08:10:53'),
(12, 'Administration Coordinator', 'GTECH', 'Charleston, WV', 'GTECH is a leading gaming technology and services company, providing innovative technology, creative content, and superior service delivery. GTECH is a wholly-owned subsidiary of\n      \n      \n        6 days ago\n        from', '6 days ago\n        ', ' GTECH Corporation', 2, '2009-03-01 08:10:53', '2009-03-01 08:10:53'),
(13, 'Network/Engineer/System Administration', 'BAE Systems', 'Washington, DC', 'BAE Systems is the premier global defense and aerospace company, delivering a full range of products and services for air, land, and naval forces, as well as advanced electronics,', '1 day ago\n        ', ' BAE Systems', 2, '2009-03-01 08:10:53', '2009-03-01 08:10:53'),
(14, 'Oracle Database Administration', 'FCS', 'California', 'a wide and varied experience on Database Administration on various versions of ... 10.7, 11.0.3, 11i and R12 installation, administration, implementation (AIM...\n      \n      \n        3 hours ago\n        from', '3 hours ago\n        ', ' Corp-Corp.com', 2, '2009-03-01 08:10:53', '2009-03-01 08:10:53'),
(15, 'Director of Administration', 'Manpower', 'Permanent Placement', 'Our client is looking for a Director of Administration. The ideal candidate must have experience in the following areas:\n* Financial Management/Analysis\n* Human Resources...', '19 hours ago\n        ', ' iHispano', 2, '2009-03-01 08:10:53', '2009-03-01 08:10:53'),
(16, 'Administration Assistant', 'Far East National Bank', 'Los Angeles, CA', 'our Commercial Banking Group department.\n\nAdministration Assistant Commercial Banking ... administration assistant, banking, finance, administration, assistant,...', '1 day ago\n        ', ' iHispano', 2, '2009-03-01 08:10:53', '2009-03-01 08:10:53'),
(17, 'Finance/Administration Specialist', 'AIM Computer Consulting', 'Miami, FL', 'in Public Sector or K-12 preferred Finance/Administration Specialist - (AP)This individual will assist the Controller by maintaining an established and efficient Accounts Payable...', '1 day ago\n        ', ' Corp-Corp.com', 2, '2009-03-01 08:10:53', '2009-03-01 08:10:53'),
(18, 'UNIX/Linux Server Administration', 'Sriven Infosys', 'Trumbull, CT', 'Unix/Linux Server Administration including Installation, troubleshooting, cluster configuration, root cause analysis, security patch installations UpgradeSAN TopologiesNetwork...\n      \n      \n        3 hours', '3 hours ago\n        ', ' Corp-Corp.com', 2, '2009-03-01 08:10:53', '2009-03-01 08:10:53'),
(19, 'Unix/Linux Server Administration', 'Astoline', 'Trumbull, CT', 'Unix/Linux Server Administration including Installation, troubleshooting, cluster configuration, root cause analysis, security patch installations UpgradeSAN TopologiesNetwork...\n      \n      \n        3 hours ago', '3 hours ago\n        ', ' Corp-Corp.com', 2, '2009-03-01 08:10:53', '2009-03-01 08:10:53'),
(20, 'Windows Administration Support Specialist', 'FCS Software Solution', 'Atlanta, GA', 'Windows Server Administration including Installation, troubleshooting, cluster configuration, root cause analysis, security patch installations Upgrade SAN Topologies Network...', '3 hours ago\n        ', ' Corp-Corp.com', 2, '2009-03-01 08:10:53', '2009-03-01 08:10:53'),
(21, 'Windows Administration Support Specialist', 'Econosoft', 'Atlanta, GA', 'Windows Server Administration including Installation, troubleshooting, cluster configuration, root cause analysis, security patch installations Upgrade 2. SAN Topologies 3....\n      \n      \n        3', '3 hours ago\n        ', ' Corp-Corp.com', 2, '2009-03-01 08:10:56', '2009-03-01 08:10:56'),
(22, 'Systems Administration', 'Resource Mine', 'Nutley, NJ', 'Administration Implementation &amp; Support Senior Operations Engineer JOB ... years of experience with Solaris systems administration. Familiar with Sun hardware...\n      \n      \n        1 day ago\n        from', '1 day ago\n        ', ' The Resource Mine, Inc', 2, '2009-03-01 08:10:56', '2009-03-01 08:10:56'),
(23, 'Supervisor, Administration', 'Tokio Marine Management', 'Pasadena, CA', 'Annually prepare, implement and complete Administration Units Business Plan ... as it may relate to the areas in which Administration is involved. 11. Responsible...\n      \n      \n        1 day ago', '1 day ago\n        ', ' GreatInsuranceJobs.com', 2, '2009-03-01 08:10:56', '2009-03-01 08:10:56'),
(24, 'Administration Rep', 'Lockheed Martin', 'Virginia', 'positionQualifications:A BS in Business Administration or related field and 3+ years of experience is r', '1 day ago\n        ', ' iHispano', 2, '2009-03-01 08:10:56', '2009-03-01 08:10:56'),
(25, 'Administration / Office', '', 'Kokomo, IN', 'Administration, Social Work, Business Administration, or related field. Six (6) years successful work experience in high-level management position w/supervisory responsibilities....', '1 day ago\n        ', ' CollegeClassifieds.com', 2, '2009-03-01 08:10:56', '2009-03-01 08:10:56'),
(26, 'Executive Administration', 'Area Temps', 'Maple Heights, OH', 'Location: Maple Heights East side corporation. Multiple openings in the Legal, Legal Research, Collections, Lien and Bankruptcy departments. Professional positions offering\n      \n      \n        3 hours ago', '3 hours ago\n        ', ' cleveland.com', 2, '2009-03-01 08:10:56', '2009-03-01 08:10:56'),
(27, 'ETL Administration Lead', 'Agile Enterprise Solutions', 'Sunnyvale, CA', 'Job Description:Datastage V8 (2+ years), Oracle 10G, PL-SQL, Shell Scripting, Analytical &amp; Problem Solving Skills, OBI EE (nice to have)Candidates should have minimum 5yrs of\n      \n      \n        3', '3 hours ago\n        ', ' Corp-Corp.com', 2, '2009-03-01 08:10:56', '2009-03-01 08:10:56'),
(28, 'Lease Administration and Compliance Manager', 'Johnson Controls', 'Stamford, CT', 'Requisition Number : 037340 Description : Johnson Controls, a $32 billion leader in global end-to-end corporate real estate solutions, unifies real estate management for its', '4 hours ago\n        ', ' Accounting Jobs Today', 2, '2009-03-01 08:10:56', '2009-03-01 08:10:56'),
(29, 'Emergency Services Administration', 'Crouse Hospital', 'Syracuse, NY', 'The Clinical Nurse Specialist assesses, promotes and contributes to the quality of nursing care administered to patients and their support systems throughout the health-illness\n      \n      \n        16 hours ago', '16 hours ago\n        ', ' HEALTHeCAREERS Network', 2, '2009-03-01 08:10:56', '2009-03-01 08:10:56'),
(30, 'Operations Administration', 'Weyerhaeuser Company', 'Utah', 'Weyerhaeuser\\''s iLevel business is leading the world\\''s structural framing market with innovative products, systems, and services for use in a variety of residential, light\n      \n      \n        18 hours ago', '18 hours ago\n        ', ' iHispano', 2, '2009-03-01 08:10:56', '2009-03-01 08:10:56'),
(31, 'Contracts Administration', 'Harris', 'Melbourne, FL', 'Job Description:\n\n*\nParticipates in developing strategies in support of Harris position, performing complex a', '19 hours ago\n        ', ' iHispano', 2, '2009-03-01 08:10:59', '2009-03-01 08:10:59'),
(32, 'Finance and Administration', 'Ipa', 'Las Vegas, NV', 'Dynamic, rapidly-growing, reputable Underground Construction Company needs your business accounting and financial expertise to contribute to the strategic development of this\n      \n      \n        20 hours ago\n        from', '20 hours ago\n        ', ' iHispano', 2, '2009-03-01 08:10:59', '2009-03-01 08:10:59'),
(33, 'TeamCenter System Administration', '', 'Parsippany, NJ', 'Description:This is a Working Interview Program, and our client requires either USCitizenship or a Green Card.Job Responsibilities:* Perform Teamcenter 2007/Multi-Site/NXManager\n      \n      \n        1 day ago\n        from', '1 day ago\n        ', ' Jobirn', 2, '2009-03-01 08:10:59', '2009-03-01 08:10:59'),
(34, 'Administration Specialist', 'Securitas Security Services USA', 'California', 'JOB SUMMARY: Performs a variety of responsible administrative functions that may include payroll, human resources, office management, scheduling, accounts payable and/or accounts', '1 day ago\n        ', ' iHispano', 2, '2009-03-01 08:10:59', '2009-03-01 08:10:59'),
(35, 'Teaching &amp; Administration', 'Sterling Education', 'California', 'teaching positions which includes some administration in a principalship. Anchor Education is located in East Bay,(San Fransico Bay Area) California and is part of the Sterling...\n      \n      \n        1 day ago', '1 day ago\n        ', ' EducationAmerica.net', 2, '2009-03-01 08:10:59', '2009-03-01 08:10:59'),
(36, 'Market Administration Engineer MKO-', 'Midwest ISO', 'Carmel, IN', 'FTR market administration, day-ahead market administration, forward RAC administration, ... Principles, practices, and administration of technical issues\n...\n      \n      \n        2 days ago', '2 days ago\n        ', ' EnergyCentralJobs.com', 2, '2009-03-01 08:10:59', '2009-03-01 08:10:59'),
(37, 'Manager of Administration', 'Bonifield Associates', 'New Jersey', 'executive will assist in the development, administration and monitoring of underwrit', '10 days ago\n        ', ' UltimateInsuranceJobs.com', 2, '2009-03-01 08:10:59', '2009-03-01 08:10:59'),
(38, 'Data Power Administration', 'GS Soft', 'Mountain View, CA', 'Power Administration and Development engineerThe successful candidate must have 6+ ... Exposure in Tibco Administration would be an added advantage...\n      \n      \n        2 days ago\n        from', '2 days ago\n        ', ' Corp-Corp.com', 2, '2009-03-01 08:10:59', '2009-03-01 08:10:59'),
(39, 'Oracle Database Administration', '', 'Unionville, CT', 'Must be able to go permanentIT/ Programmer - Database Administration An experienced Oracle DBA to support day-to-day operations, and projects. Maintenance and DevelopmentSkill...\n      \n      \n        2 days ago\n        from', '2 days ago\n        ', ' Jobirn', 2, '2009-03-01 08:10:59', '2009-03-01 08:10:59'),
(40, 'Systems Administration', 'Mitchell Martin', 'New York, NY', 'Administration\n\nJOB DESCRIPTION - Role and Responsibilities\n\nProviding technical ... would have their past experience in the administration and support of multi-tiered...\n      \n      \n        1 day ago\n        from', '1 day ago\n        ', ' Mitchell Martin Inc.', 2, '2009-03-01 08:10:59', '2009-03-01 08:10:59'),
(41, 'System Administration-UNIX', 'Keen Info Tek', 'Missouri', 'Details:Primary Technical Skill: System Administration-UNIXStart Date: March ... Required Technical Skills 1) System Administration-UNIX - Expert with 5 year(s) experience...\n      \n      \n        2 days ago', '2 days ago\n        ', ' Corp-Corp.com', 2, '2009-03-01 08:11:02', '2009-03-01 08:11:02'),
(42, 'Web &amp; Application server administration', 'AIM Computer Consulting', 'Mountain View, CA', 'industry development tools and standards Administration, configuration, design of the Globalization management system (GMS), SupportSoft content management and Chat Systems...', '2 days ago\n        ', ' Corp-Corp.com', 2, '2009-03-01 08:11:02', '2009-03-01 08:11:02'),
(43, 'Administration Assistant', 'Seal Electric', 'El Cajon, CA', 'Detail oriented, must know Microsoft Word/Excel, knowledge of Contractor V and construction background are a plus. Duties include but are not limited to: Monitoring the computer\n      \n      \n        1 day ago\n        from', '1 day ago\n        ', ' SignOnSanDiego.com', 2, '2009-03-01 08:11:02', '2009-03-01 08:11:02'),
(44, 'Web &amp; Application server administration', 'Dew Softech', 'Mountain View, CA', 'industry development tools and standards Administration, configuration, design of the Globalization management system (GMS), SupportSoft content management and Chat Systems...', '2 days ago\n        ', ' Corp-Corp.com', 2, '2009-03-01 08:11:02', '2009-03-01 08:11:02'),
(45, 'Director of Server Administration', 'Kforce Technology Staffing', 'Cincinnati, OH', 'with metrics\n \n\n \nDirector of Server Administration Qualifications:\n* Must be responsible for multiple data centers, combined IT operations, spending in excess of $10MM, technical...', '2 days ago\n        ', ' KForce Technology Staffing', 2, '2009-03-01 08:11:02', '2009-03-01 08:11:02'),
(46, 'DBA (Database Administration)', '', 'Piscataway, NJ', 'Database Admin position in Piscataway, NJ.This is an entry level position with great potential!Consultant will participate in 6 week training program. This is a great experience,\n      \n      \n        2 days ago\n        from', '2 days ago\n        ', ' Jobirn', 2, '2009-03-01 08:11:03', '2009-03-01 08:11:03'),
(47, 'Director of Nursing Administration', 'Medical Connections', 'Austin, TX', 'of Nursing Administration Inpatient Services Sign on Bonus and Relocation Available! Large inpatient facility providing quality healthcare and bringing the latest medical advances...\n      \n      \n        3 days', '3 days ago\n        ', ' HealthcareRecruitment.com', 2, '2009-03-01 08:11:03', '2009-03-01 08:11:03'),
(48, 'Oracle Applications Administration', '', 'Cleveland, OH', '5+ years with Oracle Applications Administration (11i+) 2+ years in Oracle ... including: Proficient in Oracle 9i/10g administration, SQL and PL/SQL, Backup and...\n      \n      \n        3 days ago\n        from', '3 days ago\n        ', ' Jobirn', 2, '2009-03-01 08:11:03', '2009-03-01 08:11:03'),
(49, 'Web &amp; Application server administration', 'Sriven Infosys', 'Mountain View, CA', 'Skills Web &amp; Application server administration Highly technical, quick learner, ... industry development tools and standards Administration, configuration, design of the...', '3 days ago\n        ', ' Corp-Corp.com', 2, '2009-03-01 08:11:03', '2009-03-01 08:11:03'),
(50, 'Network Administration : Voice / Telecom.', 'Marvel InfoTech', 'Menomonee Falls, WI', 'based on need.Platform and Skill Set Expertise: Network Administration : Voice /...', '3 days ago\n        ', ' Corp-Corp.com', 2, '2009-03-01 08:11:03', '2009-03-01 08:11:03'),
(51, 'Director - Practice Administration', 'Concord Hospital', 'Concord, NH', 'Bachelor\\''s degree in Business or Healthcare Administration; experience and knowledge of ... with other directors of Practice Administration provide leadership and...\n      \n      \n        3 days ag', '3 days ago\n        ', ' HEALTHeCAREERS Network', 2, '2009-03-01 08:11:06', '2009-03-01 08:11:06'),
(52, 'Finance and Administration Manager', 'United Way of Yellowstone County', 'Billings, MT', 'and Administration Manager United Way of Yellowstone County seeks highly ... This position serves as the Finance and Administration Manager and reports directly to...', '4 days ago\n        ', ' Accounting Jobs Today', 2, '2009-03-01 08:11:06', '2009-03-01 08:11:06'),
(53, 'Web &amp; Application server administration', 'Astoline', 'Mountain View, CA', '&amp; Application server administration Highly technical, quick learner, strong ... industry development tools and standards Administration, configuration, design of the...', '4 days ago\n        ', ' Corp-Corp.com', 2, '2009-03-01 08:11:06', '2009-03-01 08:11:06'),
(54, 'Project Administration Manager', '', 'Denver, CO', 'rams. This position manages the project administration functions - including ... experience in university sponsored research administration with supervisory experience...\n      \n      \n        4 days ago\n        from', '4 days ago\n        ', ' Diversity-Jobs.com', 2, '2009-03-01 08:11:06', '2009-03-01 08:11:06'),
(55, 'administration/bookkeeper', 'Peoplelex', 'Tempe, AZ', 'Required Skills for administration', '4 days ago\n        ', ' Peoplelex', 2, '2009-03-01 08:11:06', '2009-03-01 08:11:06'),
(56, 'Web &amp; Application Server Administration', 'Cybertec', 'Mountain View, CA', '&amp; Application Server Administration Highly technical, quick learner, strong ability ... industry development tools and standards Administration, configuration, design of the...', '4 days ago\n        ', ' Corp-Corp.com', 2, '2009-03-01 08:11:06', '2009-03-01 08:11:06'),
(57, 'Mail Clerk/Administration', '', 'Fox Chapel, PA', 'Clerk/Administration Job Description:We are currently hiring for ... resume to .Required Skills for Mail Clerk/Administration Job:CLERICAL...\n      \n      \n        6 days ago\n        from', '6 days ago\n        ', ' Jobirn', 2, '2009-03-01 08:11:06', '2009-03-01 08:11:06'),
(58, 'RESEARCH &amp; MARKETING ADMINISTRATION Internship', 'Le Book Publishing', 'New York, NY', '&amp; MARKETING ADMINISTRATION InternshipLE BOOK Publishing is looking for young and motivated people to perform administrative duties, research, and build relationships within the...', '5 days ago\n        ', ' Realmatch', 2, '2009-03-01 08:11:06', '2009-03-01 08:11:06'),
(59, 'System Administration Analyst (21205)', 'Perot Systems', 'Mount Pleasant, SC', 'Perot Systems Corporation is a worldwide provider of information technology services and business solutions to a broad range of clients. We are currently looking for a Network', '10 days ago\n        ', ' Beyond.com', 2, '2009-03-01 08:11:06', '2009-03-01 08:11:06'),
(60, 'ADMINISTRATION ASSISTANT', '', 'Albuquerque, NM', 'ADMINISTRATION ASSISTANT Must have ability to multi-task &amp; work in a fast paced environment, meet crucial deadlines, &amp; work independently. Must have strong communication, customer...', '6 days ago\n        ', ' careersite.com', 2, '2009-03-01 08:11:06', '2009-03-01 08:11:06'),
(61, 'Business Administration Lecturer (Asia)', 'Raffles Education', 'Trumbauersville, PA', 'mso-bidi-language:#0400;} Business Administration Lecturer (Mongolia,China,Vietnam,HongKong) p style=&quot;text-align:...', '5 days ago\n        ', ' Realmatch', 2, '2009-03-01 08:11:10', '2009-03-01 08:11:10'),
(62, 'Catering Administration', 'ARAMARK', 'Birmingham, AL', 'goal-oriented individuals as: Catering Administration Put your culinary, hospitality and restaurant experience to work for you and become part of the Crimson Tradition of success!...\n      \n      \n        6 days ago\n        from', '6 days ago\n        ', ' al.com', 2, '2009-03-01 08:11:10', '2009-03-01 08:11:10'),
(63, 'Systems Administration Manager', 'ManTech International', 'Washington, DC', 'ID 27719BR Title Systems Administration Manager Division ManTech Information Sy', '6 days ago\n        ', ' washingtonpost.com', 2, '2009-03-01 08:11:10', '2009-03-01 08:11:10'),
(64, 'Director Of Administration', 'Byrne Dairy', 'Syracuse, NY', 'for Dependents Life Insurance DIRECTOR OF ADMINISTRATION Responsible for the overall performance of the accounting, administrative, and customer service areas of the company....\n      \n      \n        6 days ago', '6 days ago\n        ', ' syracuse.com', 2, '2009-03-01 08:11:10', '2009-03-01 08:11:10'),
(65, 'Microsoft SQL server administration', 'Unicom Technologies', 'Texas', 'Required:Required - Microsoft SQL server administration MS SQL 2005 Certified. Bachelor Degree in Computer Science or Information Technology with at least 5 years of related work...', '7 days ago\n        ', ' Corp-Corp.com', 2, '2009-03-01 08:11:10', '2009-03-01 08:11:10'),
(66, 'SUPERVISOR, ADMINISTRATION', 'Della Monica &amp; Associates', 'Pasadena, CA', 'Annually prepare, implement and complete Administration Units Business Plan ... as it may relate to the areas in which Administration is involved. 11. Responsible...', '8 days ago\n        ', ' Prohire', 2, '2009-03-01 08:11:10', '2009-03-01 08:11:10'),
(67, 'Manager, Fund Administration', 'State Street', 'Boston, MA', 'Job Description\nResponsible for overseeing the preparation and review of financial statements, ... may expose the bank to a loss.\n-Reports to Assistant Director, Fund...\n      \n      \n        1 day ago', '1 day ago\n        ', ' State Street', 2, '2009-03-01 08:11:10', '2009-03-01 08:11:10'),
(68, 'Compensation Analyst - Contract Administration (517182)', 'Excel Partners', 'Connecticut', 'and/or assists in all areas of the Contract Administration Department with contract ... supervisory skills to manage the Contract Administration staff, update and code...', '14 hours ago\n        ', ' WestchesterCountyJobs.com', 2, '2009-03-01 08:11:10', '2009-03-01 08:11:10'),
(69, 'Manager, Systems Administration', 'Rand', 'Santa Monica, CA', 'the architectural design and overseeing the administration of all servers, workstations and printers.\n* Responsible for providing adequate, cost-effective processing capacity on...\n      \n      \n        3 hours ago\n        fr', '3 hours ago\n        ', ' RAND Corporation', 2, '2009-03-01 08:11:10', '2009-03-01 08:11:10'),
(70, 'PhD in Policy Research/Administration', 'Rand', 'Washington, DC', 'Public Policy, Policy Research, or Policy Administration (or a similarly designated', '3 hours ago\n        ', ' RAND Corporation', 2, '2009-03-01 08:11:10', '2009-03-01 08:11:10'),
(71, 'Unix/Linux Administration Support Specialist', 'Econosoft', 'Atlanta, GA', 'Unix/Linux Administration Support SpecialistDuration is 5 monthsLocation: ... Unix/Linux Server Administration including Installation, troubleshooting, cluster...', '3 hours ago\n        ', ' Corp-Corp.com', 2, '2009-03-01 08:11:13', '2009-03-01 08:11:13'),
(72, 'Registered Nurse- Clinical Administration', 'Mid', 'columbia Medical Center', 'Clinical Administration department is now accepting applications for a Full-time ... abilities are required as the Clinical Administration nurse may be trained to work...', '9 days ago\n        ', ' Mid-Columbia Medical Center', 2, '2009-03-01 08:11:13', '2009-03-01 08:11:13'),
(73, 'Certified Unix/Linux Server Administration', 'Ziplogic', 'Trumbull, CT', 'Unix/Linux Server Administration including Installation, troubleshooting, cluster configuration, root cause analysis, security patch installations UpgradeSAN TopologiesNetwork...', '3 hours ago\n        ', ' Corp-Corp.com', 2, '2009-03-01 08:11:13', '2009-03-01 08:11:13'),
(74, 'E4802:Administration Rep', 'Lockheed Martin', 'Maryland', 'of administrative and science', '1 day ago\n        ', ' Lockheed Martin', 2, '2009-03-01 08:11:13', '2009-03-01 08:11:13'),
(75, 'CNA- Clinical Administration', 'Mid', 'columbia Medical Center', 'Nurse??s Assistant to join the Clinical Administration department. Current CNA 2 ... to changing environments as the Clinical Administration CNA may be trained and float...\n      \n      \n        9', '9 days ago\n        ', ' Mid-Columbia Medical Center', 2, '2009-03-01 08:11:13', '2009-03-01 08:11:13'),
(76, 'Manager of Administration Major Automotive Group/', 'Yachimec Group', 'Young America, MN', 'JOB: Manager of Administration Job Description Administration Manager ... with extensive automotive accounting and administration experience Preferred A degree...', '1 day ago\n        ', ' Yachimec', 2, '2009-03-01 08:11:13', '2009-03-01 08:11:13'),
(77, 'administration and marketing several positions available', '', 'Miami, FL', '12hr to start depending on skills . to be considered go to jambapost.com and post your qualifications under gigs talent and human resources shall contact you. expanding to our ny\n      \n      \n        3 hours ago\n        from', '3 hours ago\n        ', ' Kijiji', 2, '2009-03-01 08:11:13', '2009-03-01 08:11:13'),
(78, 'Finance Administration Specialist (AP) SAP', '', 'Miami, FL', 'Description:Everest Business Solutions, Inc.(E2SCorp) is a global software company specialized in systems integration, providing IT Staffing and project services with its presence\n      \n      \n        1 day ago\n        from', '1 day ago\n        ', ' Jobirn', 2, '2009-03-01 08:11:13', '2009-03-01 08:11:13'),
(79, 'Clinical Administration Coordinator', 'UnitedHealth Group', 'San Antonio, TX', 'joining our close-knit team as a Clinical Administration', '1 day ago\n        ', ' UnitedHealth Group', 2, '2009-03-01 08:11:13', '2009-03-01 08:11:13'),
(80, 'Senior Clinical Administration Nurse', 'UnitedHealth Group', 'Tucson, AZ', 'before beginning employment.\n\nJob\nClinical', '1 day ago\n        ', ' UnitedHealth Group', 2, '2009-03-01 08:11:13', '2009-03-01 08:11:13'),
(81, 'Database Administration and Application Development Support', 'BAE Systems', 'Lexington, MA', 'Primary responsibility is Database Administration (optimization, documentation, and administration) of the Wingman database. Secondary responsibilities include NET applications...', '5 days ago\n        ', ' BAE Systems', 2, '2009-03-01 08:11:17', '2009-03-01 08:11:17'),
(82, 'PWM Regional Administration Manager', 'Morgan Stanley', 'Atlanta, GA', 'Wealth Management\nRegional Administration Manager\n\nJob ... to the Head of U.S./International Branch Administration.\n\nSkills Required\nsimilar...\n      \n      \n        1', '1 day ago\n        ', ' Morgan Stanley', 2, '2009-03-01 08:11:17', '2009-03-01 08:11:17'),
(83, 'Supervisor- Private Equity Fund Administration', 'Execusearch Group', 'Nyc, NY', 'as the Supervisor of Private Equity Fund Administration. The Supervisor will be ... 3+ years of private equity fund or fund administration experience from a public or...', '1 day ago\n        ', ' The ExecuSearch Group', 2, '2009-03-01 08:11:17', '2009-03-01 08:11:17'),
(84, 'System Administration-UNIX', 'Belcan', 'Saint Louis, MO', 'Technical Skills\n1) System Administration-UNIX - Expert with 5 year(s) experience.\n2) Configuring, installing, and supporting servers in a large distributed LAN/MAN/WAN...\n      \n      \n        1 day ago\n        from', '1 day ago\n        ', ' Belcan Corporation', 2, '2009-03-01 08:11:17', '2009-03-01 08:11:17'),
(85, 'Account Administration Representative', 'Kaiser Permanente', 'San Diego, CA', 'Perform database maintenance and research tasks to support the contract', '1 day ago\n        ', ' Kaiser Permanente', 2, '2009-03-01 08:11:17', '2009-03-01 08:11:17'),
(86, 'SYSTEMS ADMINISTRATION-1', 'L', '3 Communications Holdings', 'individuals capable of providing systems administration, engineering and website ... and softwa', '1 day ago\n        ', ' L-3 Communications Holdings Inc.', 2, '2009-03-01 08:11:17', '2009-03-01 08:11:17'),
(87, 'Finance Administration Specialist (AP) - SAP', 'Everest Business Solutions', 'Miami, FL', 'Job Description:This individual will assist the Controller by maintaining an established and efficient Accounts Payable process.ResponsibilitiesEnsure existing controls are', '1 day ago\n        ', ' Corp-Corp.com', 2, '2009-03-01 08:11:17', '2009-03-01 08:11:17'),
(88, 'E4803:Administration Rep Sr', 'Lockheed Martin', 'Kansas', 'Represents organizational unit on administrative matters. Recommends, interprets,', '1 day ago\n        ', ' Lockheed Martin', 2, '2009-03-01 08:11:17', '2009-03-01 08:11:17'),
(89, 'E4801:Administration Rep Asc', 'Lockheed Martin', 'Maryland', 'Represents organizational unit on administrative matters. Recommends, interp', '1 day ago\n        ', ' Lockheed Martin', 2, '2009-03-01 08:11:17', '2009-03-01 08:11:17'),
(90, 'Senior Manager - Oracle Database Administration', 'Teva Pharmaceuticals', 'North Wales, PA', 'with support from peer DBAs and systems administration teams. *Ultimate ... *Any Linux/Solaris/Unix system administration experiences a plus...', '1 day ago\n        ', ' PharmaDiversityJobBoard.com', 2, '2009-03-01 08:11:17', '2009-03-01 08:11:17'),
(91, 'Retail Lease Administration Manager', 'Lululemon Athletica', 'Vancouver, WA', 'is looking for an outstanding Lease Administration Manager to join our growing ... 5+ years of experience in retail lease administration.\n Paralegal experience would...', '2 days ago\n        ', ' Lululemon Athletica', 2, '2009-03-01 08:11:20', '2009-03-01 08:11:20'),
(92, 'Scrubber Manager/QET Administration', 'Cigna', 'Bloomfield, CT', 'required.\n*Experience with SAM or QET Administration, Function and Structure a plus.\nPay Benefits Work Schedule\nCIGNA offers a competitive compensation and comprehensive benefits...\n      \n      \n        1 day ago', '1 day ago\n        ', ' Cigna Corporation', 2, '2009-03-01 08:11:20', '2009-03-01 08:11:20'),
(93, 'Traffic Administration 1', 'Vought Aircraft Industries', 'Stuart, FL', 'Plans, schedules, and routes inbound and outbound domestic and international shipments of freight, using knowledge of postal regulations, tariffs and company policy. Coordinates\n      \n      \n        1 day ago', '1 day ago\n        ', ' Vought Aircraft Industries, Inc.', 2, '2009-03-01 08:11:20', '2009-03-01 08:11:20'),
(94, 'Director of Finance and Administration', '', 'Indianapolis, IN', 'Provide staff support to the Board of Managers and assist the committee with the development and implementation of fiscal policies and its decision making responsibilities. ...\n      \n      \n        8 days ago\n        from', '8 days ago\n        ', ' Work In Sports', 2, '2009-03-01 08:11:20', '2009-03-01 08:11:20'),
(95, 'Accountant - Plant Operations Administration', 'Vanderbilt University', 'Nashville, TN', 'This position will report to the Director of Financial Management in Plant Operations and share responsibility for the routine accounting activities with the Senior Accountant and', '2 days ago\n        ', ' Vanderbilt University', 2, '2009-03-01 08:11:20', '2009-03-01 08:11:20'),
(96, 'Executive Assistant - Administration', 'Northern Arizona Healthcare', 'Flagstaff, AZ', 'The Executive Assistant provides comprehensive executive support to the President/Chief Executive Officer of Northern Arizona Healthcare by independently handling administrative', '2 days ago\n        ', ' Northern Arizona Healthcare', 2, '2009-03-01 08:11:20', '2009-03-01 08:11:20'),
(97, 'Research Administration Analyst', 'UCSF Medical Center', 'San Francisco, CA', 'Excellence in Womens Health; the Research Administration Analyst is responsible for ... contracts, and gift funding; the Research Administration Analyst will manage incoming...', '2 days ago\n        ', ' UCSF Medical Center', 2, '2009-03-01 08:11:20', '2009-03-01 08:11:20'),
(98, 'Advanced Practice Nurse (Nursing Administration)', 'Medical Connections', 'Chattanooga, TN', 'Practice Nurse (Nursing Administration) Inpatient Facility Sign on Bonus and Relocation Assistance Available! This rehabilitation center is the only faith-based, full-service...', '3 days ago\n        ', ' HealthcareRecruitment.com', 2, '2009-03-01 08:11:20', '2009-03-01 08:11:20'),
(99, 'Research Administration Manager', 'Stanford University', 'Stanford, CA', 'Stanfords Woods Institute for the Environment (Woods) is working to promote environmental sustainability through interdisciplinary research, problem solving and education. To\n      \n      \n        3 day', '3 days ago\n        ', ' Stanford University', 2, '2009-03-01 08:11:20', '2009-03-01 08:11:20'),
(100, 'Business Administration - Adjunct Faculty', 'Montgomery College', 'Rockville, MD', 'Questions). Part-time Faculty - Business Administration This job posting is for ... faculty applicant pool for Business Administration. Catalog descriptions of the...', '9 days ago\n        ', ' washingtonpost.com', 2, '2009-03-01 08:11:20', '2009-03-01 08:11:20'),
(101, 'Hyperion Financials HFM Consultant Administration', 'Ces USA', 'San Jose, CA', 'Ablilty to handle administration of the system and manage issues.Preferably version 9.3.1Techno...', '4 days ago\n        ', ' Corp-Corp.com', 2, '2009-03-01 08:11:24', '2009-03-01 08:11:24'),
(102, 'Consultant, Database Administration', 'Cardinal Health', 'Ohio', 'Database Administration\n\nWhat Database Administration contributes to Cardinal ... Maintenance Plans\n* Ensuring Standardized Administration practices are implemented\n*...\n      \n      \n        4 days ago', '4 days ago\n        ', ' Cardinal Health, Inc.', 2, '2009-03-01 08:11:24', '2009-03-01 08:11:24'),
(103, 'Director, Contract Administration', 'Aetna', 'Hartford, CT', '- Provides contractual oversight and expertise in the execution and administration of the TRIC', '9 days ago\n        ', ' InsuranceJobs.com', 2, '2009-03-01 08:11:24', '2009-03-01 08:11:24'),
(104, 'Database Administration', 'Peoplelex', 'Parlier, CA', 'internal operations, local area network administration and project planning. ... in Database Management Systems (DBMS) administration and maintenance, database...\n      \n      \n        9 days ago\n        from', '9 days ago\n        ', ' Peoplelex', 2, '2009-03-01 08:11:24', '2009-03-01 08:11:24'),
(105, 'Office Administration Specialist III', 'Mitre', 'Mclean, VA', 'Microsoft Word - Intermediate; Microsoft Excel - Intermediate; Microsoft Powerpoint - Intermediate; Microsoft Office - Intermediate; Microsoft Outlook - Intermediate;\n      \n      \n        9 days ago', '9 days ago\n        ', ' washingtonpost.com', 2, '2009-03-01 08:11:24', '2009-03-01 08:11:24'),
(106, 'Director Cash Administration', 'General Dynamics', 'Needham, MA', 'mission-critical IT programs. Director Cash Administration (Needham, Ma) General ... Scottsdale AZ, and Fairfax VA locations AP Administration including, abandoned...\n      \n      \n        9 days ago', '9 days ago\n        ', ' Accounting Jobs Today', 2, '2009-03-01 08:11:24', '2009-03-01 08:11:24'),
(107, 'Credit Administration &amp; Policy Manager', 'Silverton Bank, N.A.', 'Atlanta, GA', 'United States. We are looking for a Credit Administration &amp; Policy Manager for our ... The Credit Administration &amp; Policy Manager position will manage and implement credit...', '5 days ago\n        ', ' Silverton Bank, N.A.', 2, '2009-03-01 08:11:24', '2009-03-01 08:11:24'),
(108, 'Supervisor Of Private Equity Fund Administration', 'Kunin Associates', 'Fort Lauderdale, FL', 'of Private Equity Fund Adminis', '5 days ago\n        ', ' Fresho.com', 2, '2009-03-01 08:11:24', '2009-03-01 08:11:24'),
(109, 'Junior Administration Assistant', 'Jacobs Engineering Group', 'Glasgow, KY', 'and international opportunities.\n\nAs Junior Administration Assistant you will work ... Rooms/lunches etc\n* Other miscellaneous administration functions\n\nTraining will be...\n      \n      \n        5', '5 days ago\n        ', ' Jacobs Engineering Group', 2, '2009-03-01 08:11:24', '2009-03-01 08:11:24'),
(110, 'Transplant &amp; Surgical Services Administration Division', 'Pitt County Memorial Hospital', 'Greenville, NC', 'in the Transplant &amp; Surgical Services Administration Division which includes: Surgical Intensive Care, Surgical Intermediate, General Surgery, Orthopedics &amp; Surgery, Operating...', '4 days ago\n        ', ' HEALTHeCAREERS Network', 2, '2009-03-01 08:11:24', '2009-03-01 08:11:24'),
(111, 'Staff, Systems Administration', 'E*TRADE Financial', 'Alpharetta, GA', 'at local datacenter\n* Assist in systems administration of servers in remote ... with many aspects of UNIX systems administration; for example, configuration...\n      \n      \n        5 days ago', '5 days ago\n        ', ' E*Trade Financial Corp.', 2, '2009-03-01 08:11:27', '2009-03-01 08:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

DROP TABLE IF EXISTS `job_categories`;
CREATE TABLE IF NOT EXISTS `job_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=725 ;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id`, `name`, `alias`, `url`, `parent_id`, `sort_order`, `added_date`, `last_updated`) VALUES
(1, 'Administration', 'administration', 'http://www.simplyhired.com/job-search/onet-430000/', 0, 0, '2009-03-01 01:17:20', '2009-03-01 01:17:20'),
(2, 'Administration Jobs', 'administration-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Administration', 1, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(3, 'Business Administration jobs', 'business-administration-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Business+Administration', 2, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(4, 'Operations Manager jobs', 'operations-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Operations+Manager', 3, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(5, 'Payroll Manager jobs', 'payroll-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Payroll+Manager', 4, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(6, 'Training Manager jobs', 'training-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Training+Manager', 5, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(7, 'Clerical jobs', 'clerical-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Clerical', 6, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(8, 'Accounting Clerk jobs', 'accounting-clerk-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Accounting+Clerk', 7, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(9, 'Accounts Payable jobs', 'accounts-payable-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Accounts+Payable', 8, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(10, 'Accounts Receivable jobs', 'accounts-receivable-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Accounts+Receivable', 9, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(11, 'Bank Teller jobs', 'bank-teller-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Bank+Teller', 10, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(12, 'Banker jobs', 'banker-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Banker', 11, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(13, 'Banking jobs', 'banking-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Banking', 12, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(14, 'Billing jobs', 'billing-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Billing', 13, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(15, 'Billing Clerk jobs', 'billing-clerk-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Billing+Clerk', 14, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(16, 'Bookkeeper jobs', 'bookkeeper-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Bookkeeper', 15, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(17, 'Clerk jobs', 'clerk-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Clerk', 16, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(18, 'Collections jobs', 'collections-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Collections', 17, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(19, 'File Clerk jobs', 'file-clerk-jobs', 'http://www.simplyhired.com/a/jobs/list/q-File+Clerk', 18, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(20, 'Payroll jobs', 'payroll-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Payroll', 19, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(21, 'Teller jobs', 'teller-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Teller', 20, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(22, 'Bilingual Customer Service jobs', 'bilingual-customer-service-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Bilingual+Customer+Service', 7, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(23, 'Customer Service Associate jobs', 'customer-service-associate-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Customer+Service+Associate', 22, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(24, 'Customer Service Representative jobs', 'customer-service-representative-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Customer+Service+Representative', 23, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(25, 'Executive Personal Assistant jobs', 'executive-personal-assistant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Executive+Personal+Assistant', 24, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(26, 'Executive Secretary jobs', 'executive-secretary-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Executive+Secretary', 25, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(27, 'Office Assistant jobs', 'office-assistant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Office+Assistant', 26, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(28, 'Receptionist jobs', 'receptionist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Receptionist', 27, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(29, 'Secretarial jobs', 'secretarial-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Secretarial', 28, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(30, 'Admin jobs', 'admin-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Admin', 29, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(31, 'Administrative Assistant jobs', 'administrative-assistant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Administrative+Assistant', 30, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(32, 'Executive Assistant jobs', 'executive-assistant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Executive+Assistant', 31, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(33, 'Secretary jobs', 'secretary-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Secretary', 32, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(34, 'Shipping jobs', 'shipping-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Shipping', 33, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(35, 'Courier jobs', 'courier-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Courier', 34, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(36, 'Freight Team jobs', 'freight-team-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Freight+Team', 35, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(37, 'Inventory jobs', 'inventory-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Inventory', 36, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(38, 'Inventory Analyst jobs', 'inventory-analyst-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Inventory+Analyst', 37, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(39, 'Inventory Management jobs', 'inventory-management-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Inventory+Management', 38, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(40, 'Post Office jobs', 'post-office-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Post+Office', 39, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(41, 'Postal jobs', 'postal-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Postal', 40, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(42, 'Receiving Associate jobs', 'receiving-associate-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Receiving+Associate', 41, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(43, 'Shipping Clerk jobs', 'shipping-clerk-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Shipping+Clerk', 42, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(44, 'Warehouse jobs', 'warehouse-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Warehouse', 43, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(45, 'Warehouse Manager jobs', 'warehouse-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Warehouse+Manager', 44, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(46, 'Warehouse Supervisor jobs', 'warehouse-supervisor-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Warehouse+Supervisor', 45, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(47, 'Warehouse Worker jobs', 'warehouse-worker-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Warehouse+Worker', 46, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(48, 'Telephone jobs', 'telephone-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Telephone', 47, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(49, 'Operator jobs', 'operator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Operator', 48, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(50, 'Typing jobs', 'typing-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Typing', 49, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(51, 'Data Entry jobs', 'data-entry-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Data+Entry', 50, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(52, 'Typist jobs', 'typist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Typist', 51, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(53, 'Architecture & Engineering', 'architecture--engineering', 'http://www.simplyhired.com/job-search/onet-170000/', 0, 0, '2009-03-01 01:17:22', '2009-03-01 01:17:22'),
(54, 'Architecture & Engineering Jobs', 'architecture--engineering-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Architecture+%26+Engineering', 53, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(55, 'Architecture jobs', 'architecture-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Architecture', 54, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(56, 'Architect jobs', 'architect-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Architect', 55, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(57, 'Landscape Architect jobs', 'landscape-architect-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Landscape+Architect', 56, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(58, 'Survey Technician jobs', 'survey-technician-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Survey+Technician', 57, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(59, 'Surveyor jobs', 'surveyor-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Surveyor', 58, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(60, 'Urban Planner jobs', 'urban-planner-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Urban+Planner', 59, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(61, 'Drafting jobs', 'drafting-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Drafting', 60, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(62, 'Architectural Drafter jobs', 'architectural-drafter-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Architectural+Drafter', 61, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(63, 'CAD jobs', 'cad-jobs', 'http://www.simplyhired.com/a/jobs/list/q-CAD', 62, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(64, 'Drafter jobs', 'drafter-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Drafter', 63, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(65, 'Electronic Technician jobs', 'electronic-technician-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Electronic+Technician', 64, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(66, 'Mechanical Designer jobs', 'mechanical-designer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Mechanical+Designer', 65, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(67, 'Engineering jobs', 'engineering-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Engineering', 66, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(68, 'Chemical Engineer jobs', 'chemical-engineer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Chemical+Engineer', 67, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(69, 'Civil Engineer jobs', 'civil-engineer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Civil+Engineer', 68, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(70, 'Design Engineer jobs', 'design-engineer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Design+Engineer', 69, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(71, 'Electrical Engineer jobs', 'electrical-engineer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Electrical+Engineer', 70, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(72, 'Engineer jobs', 'engineer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Engineer', 71, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(73, 'Engineering Manager jobs', 'engineering-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Engineering+Manager', 72, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(74, 'Environmental Engineer jobs', 'environmental-engineer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Environmental+Engineer', 73, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(75, 'Field Service Engineer jobs', 'field-service-engineer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Field+Service+Engineer', 74, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(76, 'Hardware Design Engineer jobs', 'hardware-design-engineer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Hardware+Design+Engineer', 75, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(77, 'Hardware Engineer jobs', 'hardware-engineer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Hardware+Engineer', 76, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(78, 'Industrial Engineer jobs', 'industrial-engineer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Industrial+Engineer', 77, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(79, 'Manufacturing Engineer jobs', 'manufacturing-engineer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Manufacturing+Engineer', 78, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(80, 'Mechanical Engineer jobs', 'mechanical-engineer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Mechanical+Engineer', 79, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(81, 'Network Engineer jobs', 'network-engineer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Network+Engineer', 80, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(82, 'Optical Engineer jobs', 'optical-engineer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Optical+Engineer', 81, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(83, 'Process Engineer jobs', 'process-engineer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Process+Engineer', 82, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(84, 'Project Engineer jobs', 'project-engineer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Project+Engineer', 83, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(85, 'Software Engineer jobs', 'software-engineer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Software+Engineer', 84, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(86, 'Structural Engineer jobs', 'structural-engineer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Structural+Engineer', 85, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(87, 'System Engineer jobs', 'system-engineer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-System+Engineer', 86, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(88, 'Technical Support Engineer jobs', 'technical-support-engineer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Technical+Support+Engineer', 87, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(89, 'Test Engineer jobs', 'test-engineer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Test+Engineer', 88, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(90, 'Validation Engineer jobs', 'validation-engineer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Validation+Engineer', 89, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(91, 'Arts & Entertainment', 'arts--entertainment', 'http://www.simplyhired.com/job-search/onet-270000/', 0, 0, '2009-03-01 01:17:23', '2009-03-01 01:17:23'),
(92, 'Arts & Entertainment Jobs', 'arts--entertainment-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Arts+%26+Entertainment', 91, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(93, 'Art jobs', 'art-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Art', 92, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(94, 'Art Director jobs', 'art-director-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Art+Director', 93, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(95, 'CAD Designer jobs', 'cad-designer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-CAD+Designer', 94, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(96, 'Designer jobs', 'designer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Designer', 70, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(97, 'Fashion jobs', 'fashion-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Fashion', 96, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(98, 'Floral Designer jobs', 'floral-designer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Floral+Designer', 97, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(99, 'Graphic Artist jobs', 'graphic-artist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Graphic+Artist', 98, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(100, 'Graphic Designer jobs', 'graphic-designer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Graphic+Designer', 99, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(101, 'Graphics Designer Production Artist jobs', 'graphics-designer-production-artist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Graphics+Designer+Production+Artist', 100, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(102, 'Illustrator jobs', 'illustrator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Illustrator', 101, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(103, 'Industrial Designer jobs', 'industrial-designer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Industrial+Designer', 102, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(104, 'Instructional Designer jobs', 'instructional-designer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Instructional+Designer', 103, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(105, 'Interior Designer jobs', 'interior-designer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Interior+Designer', 104, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(106, 'Textile Design jobs', 'textile-design-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Textile+Design', 105, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(107, 'UI Designer jobs', 'ui-designer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-UI+Designer', 106, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(108, 'User Interface Designer jobs', 'user-interface-designer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-User+Interface+Designer', 107, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(109, 'Web Designer jobs', 'web-designer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Web+Designer', 108, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(110, 'Audio Video jobs', 'audio-video-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Audio+Video', 109, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(111, 'Audio Visual Technician jobs', 'audio-visual-technician-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Audio+Visual+Technician', 110, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(112, 'Photographer jobs', 'photographer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Photographer', 111, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(113, 'Video Editor jobs', 'video-editor-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Video+Editor', 112, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(114, 'Entertainment jobs', 'entertainment-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Entertainment', 113, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(115, 'Actor jobs', 'actor-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Actor', 114, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(116, 'Actress jobs', 'actress-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Actress', 115, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(117, 'Announcer jobs', 'announcer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Announcer', 116, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(118, 'Broadcasting jobs', 'broadcasting-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Broadcasting', 117, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(119, 'Film jobs', 'film-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Film', 118, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(120, 'Music jobs', 'music-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Music', 119, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(121, 'News Producer jobs', 'news-producer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-News+Producer', 120, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(122, 'Promotion jobs', 'promotion-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Promotion', 121, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(123, 'Radio jobs', 'radio-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Radio', 122, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(124, 'Record Label jobs', 'record-label-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Record+Label', 123, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(125, 'Sports jobs', 'sports-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Sports', 124, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(126, 'Writer jobs', 'writer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Writer', 125, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(127, 'Media jobs', 'media-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Media', 126, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(128, 'Assistant Editor jobs', 'assistant-editor-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Assistant+Editor', 127, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(129, 'Copywriter jobs', 'copywriter-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Copywriter', 128, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(130, 'Editor jobs', 'editor-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Editor', 129, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(131, 'Editorial Assistant jobs', 'editorial-assistant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Editorial+Assistant', 130, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(132, 'Freelance jobs', 'freelance-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Freelance', 131, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(133, 'Journalism jobs', 'journalism-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Journalism', 132, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(134, 'Journalist jobs', 'journalist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Journalist', 133, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(135, 'News Analyst jobs', 'news-analyst-jobs', 'http://www.simplyhired.com/a/jobs/list/q-News+Analyst', 134, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(136, 'Reporter jobs', 'reporter-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Reporter', 135, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(137, 'Technical Writer jobs', 'technical-writer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Technical+Writer', 136, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(138, 'Writer Editor jobs', 'writer-editor-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Writer+Editor', 126, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(139, 'Business', 'business', 'http://www.simplyhired.com/job-search/onet-130000/', 0, 0, '2009-03-01 01:17:24', '2009-03-01 01:17:24'),
(140, 'Business Jobs', 'business-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Business', 139, 0, '2009-03-01 01:17:25', '2009-03-01 01:17:25'),
(141, 'Finance jobs', 'finance-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Finance', 140, 0, '2009-03-01 01:17:25', '2009-03-01 01:17:25'),
(142, 'Accountant jobs', 'accountant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Accountant', 141, 0, '2009-03-01 01:17:25', '2009-03-01 01:17:25'),
(143, 'Accounting Assistant jobs', 'accounting-assistant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Accounting+Assistant', 142, 0, '2009-03-01 01:17:25', '2009-03-01 01:17:25'),
(144, 'Accounting Manager jobs', 'accounting-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Accounting+Manager', 143, 0, '2009-03-01 01:17:25', '2009-03-01 01:17:25'),
(145, 'Credit Analyst jobs', 'credit-analyst-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Credit+Analyst', 9, 0, '2009-03-01 01:17:25', '2009-03-01 01:17:25'),
(146, 'Financial Analyst jobs', 'financial-analyst-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Financial+Analyst', 145, 0, '2009-03-01 01:17:25', '2009-03-01 01:17:25'),
(147, 'Internal Audit jobs', 'internal-audit-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Internal+Audit', 146, 0, '2009-03-01 01:17:25', '2009-03-01 01:17:25'),
(148, 'Investment Banking jobs', 'investment-banking-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Investment+Banking', 147, 0, '2009-03-01 01:17:25', '2009-03-01 01:17:25'),
(149, 'Loan Officer jobs', 'loan-officer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Loan+Officer', 148, 0, '2009-03-01 01:17:25', '2009-03-01 01:17:25'),
(150, 'Loan Processor jobs', 'loan-processor-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Loan+Processor', 149, 0, '2009-03-01 01:17:26', '2009-03-01 01:17:26'),
(151, 'Staff Accountant jobs', 'staff-accountant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Staff+Accountant', 150, 0, '2009-03-01 01:17:26', '2009-03-01 01:17:26'),
(152, 'Tax Accountant jobs', 'tax-accountant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Tax+Accountant', 151, 0, '2009-03-01 01:17:26', '2009-03-01 01:17:26'),
(153, 'Venture Capital jobs', 'venture-capital-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Venture+Capital', 152, 0, '2009-03-01 01:17:26', '2009-03-01 01:17:26'),
(154, 'Operations jobs', 'operations-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Operations', 153, 0, '2009-03-01 01:17:26', '2009-03-01 01:17:26'),
(155, 'Benefits Administrator jobs', 'benefits-administrator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Benefits+Administrator', 154, 0, '2009-03-01 01:17:26', '2009-03-01 01:17:26'),
(156, 'Benefits Manager jobs', 'benefits-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Benefits+Manager', 155, 0, '2009-03-01 01:17:26', '2009-03-01 01:17:26'),
(157, 'Benefits Specialist jobs', 'benefits-specialist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Benefits+Specialist', 156, 0, '2009-03-01 01:17:26', '2009-03-01 01:17:26'),
(158, 'Business Analyst jobs', 'business-analyst-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Business+Analyst', 157, 0, '2009-03-01 01:17:26', '2009-03-01 01:17:26'),
(159, 'Buyer jobs', 'buyer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Buyer', 158, 0, '2009-03-01 01:17:26', '2009-03-01 01:17:26'),
(160, 'Executive Recruiter jobs', 'executive-recruiter-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Executive+Recruiter', 159, 0, '2009-03-01 01:17:26', '2009-03-01 01:17:26'),
(161, 'HR Administrator jobs', 'hr-administrator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-HR+Administrator', 160, 0, '2009-03-01 01:17:26', '2009-03-01 01:17:26'),
(162, 'HR Consultant jobs', 'hr-consultant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-HR+Consultant', 161, 0, '2009-03-01 01:17:26', '2009-03-01 01:17:26'),
(163, 'HR Coordinator jobs', 'hr-coordinator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-HR+Coordinator', 162, 0, '2009-03-01 01:17:26', '2009-03-01 01:17:26'),
(164, 'HR Generalist jobs', 'hr-generalist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-HR+Generalist', 163, 0, '2009-03-01 01:17:26', '2009-03-01 01:17:26'),
(165, 'HR Manager jobs', 'hr-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-HR+Manager', 164, 0, '2009-03-01 01:17:26', '2009-03-01 01:17:26'),
(166, 'HR Representative jobs', 'hr-representative-jobs', 'http://www.simplyhired.com/a/jobs/list/q-HR+Representative', 165, 0, '2009-03-01 01:17:26', '2009-03-01 01:17:26'),
(167, 'Human Resources Assistant jobs', 'human-resources-assistant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Human+Resources+Assistant', 166, 0, '2009-03-01 01:17:26', '2009-03-01 01:17:26'),
(168, 'Human Resources Director jobs', 'human-resources-director-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Human+Resources+Director', 167, 0, '2009-03-01 01:17:26', '2009-03-01 01:17:26'),
(169, 'Human Resources Manager jobs', 'human-resources-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Human+Resources+Manager', 168, 0, '2009-03-01 01:17:26', '2009-03-01 01:17:26'),
(170, 'Human Resources Specialist jobs', 'human-resources-specialist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Human+Resources+Specialist', 169, 0, '2009-03-01 01:17:26', '2009-03-01 01:17:26'),
(171, 'Purchasing Manager jobs', 'purchasing-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Purchasing+Manager', 170, 0, '2009-03-01 01:17:26', '2009-03-01 01:17:26'),
(172, 'Recruiter jobs', 'recruiter-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Recruiter', 171, 0, '2009-03-01 01:17:26', '2009-03-01 01:17:26'),
(173, 'Recruiting jobs', 'recruiting-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Recruiting', 172, 0, '2009-03-01 01:17:26', '2009-03-01 01:17:26'),
(174, 'Recruiting Manager jobs', 'recruiting-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Recruiting+Manager', 173, 0, '2009-03-01 01:17:26', '2009-03-01 01:17:26'),
(175, 'Technical Recruiter jobs', 'technical-recruiter-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Technical+Recruiter', 174, 0, '2009-03-01 01:17:26', '2009-03-01 01:17:26'),
(176, 'Computer & Math', 'computer--math', 'http://www.simplyhired.com/job-search/onet-150000/', 0, 0, '2009-03-01 01:17:26', '2009-03-01 01:17:26'),
(177, 'Computer & Math Jobs', 'computer--math-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Computer+%26+Math', 176, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(178, 'Computer jobs', 'computer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Computer', 177, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(179, '.Net Developer jobs', 'net-developer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-.Net+Developer', 178, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(180, 'Application Developer jobs', 'application-developer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Application+Developer', 179, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(181, 'Computer Scientist jobs', 'computer-scientist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Computer+Scientist', 180, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(182, 'Data Architect jobs', 'data-architect-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Data+Architect', 181, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(183, 'Database Administrator jobs', 'database-administrator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Database+Administrator', 182, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(184, 'Developer jobs', 'developer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Developer', 183, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(185, 'Development jobs', 'development-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Development', 184, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(186, 'Help Desk jobs', 'help-desk-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Help+Desk', 185, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(187, 'Internet jobs', 'internet-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Internet', 186, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(188, 'IT Director jobs', 'it-director-jobs', 'http://www.simplyhired.com/a/jobs/list/q-IT+Director', 187, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(189, 'IT Manager jobs', 'it-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-IT+Manager', 188, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(190, 'J2EE Developer jobs', 'j2ee-developer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-J2EE+Developer', 189, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(191, 'Java Developer jobs', 'java-developer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Java+Developer', 190, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(192, 'Java Software Engineer jobs', 'java-software-engineer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Java+Software+Engineer', 191, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(193, 'Mainframe jobs', 'mainframe-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Mainframe', 192, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(194, 'Network Administrator jobs', 'network-administrator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Network+Administrator', 193, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(195, 'Oracle DBA jobs', 'oracle-dba-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Oracle+DBA', 81, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(196, 'Oracle Developer jobs', 'oracle-developer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Oracle+Developer', 195, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(197, 'Programmer jobs', 'programmer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Programmer', 196, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(198, 'Programmer Analyst jobs', 'programmer-analyst-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Programmer+Analyst', 197, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(199, 'Programming jobs', 'programming-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Programming', 198, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(200, 'Senior Software Engineer jobs', 'senior-software-engineer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Senior+Software+Engineer', 199, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(201, 'Software Architect jobs', 'software-architect-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Software+Architect', 200, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(202, 'Software Developer jobs', 'software-developer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Software+Developer', 201, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(203, 'System Administrator jobs', 'system-administrator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-System+Administrator', 85, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(204, 'Systems Analyst jobs', 'systems-analyst-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Systems+Analyst', 203, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(205, 'Technical Support jobs', 'technical-support-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Technical+Support', 204, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(206, 'Technology jobs', 'technology-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Technology', 205, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(207, 'Unix Administrator jobs', 'unix-administrator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Unix+Administrator', 206, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(208, 'Web Developer jobs', 'web-developer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Web+Developer', 207, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(209, 'Math jobs', 'math-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Math', 208, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(210, 'Actuary jobs', 'actuary-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Actuary', 209, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(211, 'Analyst jobs', 'analyst-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Analyst', 210, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(212, 'Biostatistician jobs', 'biostatistician-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Biostatistician', 211, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(213, 'Estimator jobs', 'estimator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Estimator', 212, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(214, 'Statistician jobs', 'statistician-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Statistician', 213, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(215, 'Underwriter jobs', 'underwriter-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Underwriter', 214, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(216, 'Construction', 'construction', 'http://www.simplyhired.com/job-search/onet-470000/', 0, 0, '2009-03-01 01:17:27', '2009-03-01 01:17:27'),
(217, 'Construction Jobs', 'construction-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Construction', 216, 0, '2009-03-01 01:17:28', '2009-03-01 01:17:28'),
(218, 'Construction Management jobs', 'construction-management-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Construction+Management', 217, 0, '2009-03-01 01:17:28', '2009-03-01 01:17:28'),
(219, 'Construction Manager jobs', 'construction-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Construction+Manager', 218, 0, '2009-03-01 01:17:28', '2009-03-01 01:17:28'),
(220, 'Construction Project Manager jobs', 'construction-project-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Construction+Project+Manager', 219, 0, '2009-03-01 01:17:28', '2009-03-01 01:17:28'),
(221, 'Construction Superintendent jobs', 'construction-superintendent-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Construction+Superintendent', 220, 0, '2009-03-01 01:17:28', '2009-03-01 01:17:28'),
(222, 'Construction Worker jobs', 'construction-worker-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Construction+Worker', 221, 0, '2009-03-01 01:17:28', '2009-03-01 01:17:28'),
(223, 'Other Construction jobs', 'other-construction-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Other+Construction', 222, 0, '2009-03-01 01:17:28', '2009-03-01 01:17:28'),
(224, 'Construction Estimator jobs', 'construction-estimator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Construction+Estimator', 223, 0, '2009-03-01 01:17:28', '2009-03-01 01:17:28'),
(225, 'Construction Inspector jobs', 'construction-inspector-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Construction+Inspector', 224, 0, '2009-03-01 01:17:28', '2009-03-01 01:17:28'),
(226, 'Trade jobs', 'trade-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Trade', 225, 0, '2009-03-01 01:17:28', '2009-03-01 01:17:28'),
(227, 'Carpenter jobs', 'carpenter-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Carpenter', 226, 0, '2009-03-01 01:17:28', '2009-03-01 01:17:28'),
(228, 'Electrician jobs', 'electrician-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Electrician', 227, 0, '2009-03-01 01:17:28', '2009-03-01 01:17:28'),
(229, 'Framer jobs', 'framer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Framer', 228, 0, '2009-03-01 01:17:28', '2009-03-01 01:17:28'),
(230, 'Heavy Equipment Operator jobs', 'heavy-equipment-operator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Heavy+Equipment+Operator', 229, 0, '2009-03-01 01:17:28', '2009-03-01 01:17:28'),
(231, 'Industrial Electrician jobs', 'industrial-electrician-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Industrial+Electrician', 230, 0, '2009-03-01 01:17:28', '2009-03-01 01:17:28'),
(232, 'Plumber jobs', 'plumber-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Plumber', 231, 0, '2009-03-01 01:17:28', '2009-03-01 01:17:28'),
(233, 'Facilities', 'facilities', 'http://www.simplyhired.com/job-search/onet-370000/', 0, 0, '2009-03-01 01:17:28', '2009-03-01 01:17:28'),
(234, 'Facilities Jobs', 'facilities-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Facilities', 233, 0, '2009-03-01 01:17:29', '2009-03-01 01:17:29'),
(235, 'Building Maintenance jobs', 'building-maintenance-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Building+Maintenance', 234, 0, '2009-03-01 01:17:29', '2009-03-01 01:17:29'),
(236, 'Executive Housekeeper jobs', 'executive-housekeeper-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Executive+Housekeeper', 235, 0, '2009-03-01 01:17:29', '2009-03-01 01:17:29'),
(237, 'Facilities Coordinator jobs', 'facilities-coordinator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Facilities+Coordinator', 236, 0, '2009-03-01 01:17:29', '2009-03-01 01:17:29'),
(238, 'Facilities Manager jobs', 'facilities-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Facilities+Manager', 237, 0, '2009-03-01 01:17:29', '2009-03-01 01:17:29'),
(239, 'Housekeeping Manager jobs', 'housekeeping-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Housekeeping+Manager', 238, 0, '2009-03-01 01:17:29', '2009-03-01 01:17:29'),
(240, 'Janitor jobs', 'janitor-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Janitor', 239, 0, '2009-03-01 01:17:29', '2009-03-01 01:17:29'),
(241, 'Housekeeping jobs', 'housekeeping-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Housekeeping', 240, 0, '2009-03-01 01:17:29', '2009-03-01 01:17:29'),
(242, 'Custodian jobs', 'custodian-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Custodian', 241, 0, '2009-03-01 01:17:29', '2009-03-01 01:17:29'),
(243, 'Housekeeper jobs', 'housekeeper-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Housekeeper', 242, 0, '2009-03-01 01:17:29', '2009-03-01 01:17:29'),
(244, 'Houseperson jobs', 'houseperson-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Houseperson', 243, 0, '2009-03-01 01:17:29', '2009-03-01 01:17:29'),
(245, 'Room Attendant jobs', 'room-attendant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Room+Attendant', 244, 0, '2009-03-01 01:17:29', '2009-03-01 01:17:29'),
(246, 'Landscaping jobs', 'landscaping-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Landscaping', 245, 0, '2009-03-01 01:17:29', '2009-03-01 01:17:29'),
(247, 'Gardener jobs', 'gardener-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Gardener', 246, 0, '2009-03-01 01:17:29', '2009-03-01 01:17:29'),
(248, 'Groundskeeper jobs', 'groundskeeper-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Groundskeeper', 247, 0, '2009-03-01 01:17:29', '2009-03-01 01:17:29'),
(249, 'Landscape Laborer jobs', 'landscape-laborer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Landscape+Laborer', 248, 0, '2009-03-01 01:17:29', '2009-03-01 01:17:29'),
(250, 'Landscaper jobs', 'landscaper-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Landscaper', 249, 0, '2009-03-01 01:17:29', '2009-03-01 01:17:29'),
(251, 'Health Care', 'health-care', 'http://www.simplyhired.com/job-search/onet-290000/', 0, 0, '2009-03-01 01:17:29', '2009-03-01 01:17:29'),
(252, 'Health Care Jobs', 'health-care-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Health+Care', 251, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(253, 'Health jobs', 'health-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Health', 252, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(254, 'Industrial Hygienist jobs', 'industrial-hygienist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Industrial+Hygienist', 253, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(255, 'Occupational Health jobs', 'occupational-health-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Occupational+Health', 254, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(256, 'Personal Trainer jobs', 'personal-trainer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Personal+Trainer', 255, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(257, 'Medical jobs', 'medical-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Medical', 256, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(258, 'Anesthesiologist jobs', 'anesthesiologist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Anesthesiologist', 257, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(259, 'Dentist jobs', 'dentist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Dentist', 258, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(260, 'Hospital Pharmacist jobs', 'hospital-pharmacist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Hospital+Pharmacist', 259, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(261, 'Nurse jobs', 'nurse-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Nurse', 260, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(262, 'Nurse Practitioner jobs', 'nurse-practitioner-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Nurse+Practitioner', 261, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(263, 'Occupational Therapist jobs', 'occupational-therapist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Occupational+Therapist', 262, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(264, 'Pharmaceutical jobs', 'pharmaceutical-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Pharmaceutical', 263, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(265, 'Pharmacist jobs', 'pharmacist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Pharmacist', 264, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(266, 'Physical Therapist jobs', 'physical-therapist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Physical+Therapist', 265, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(267, 'Physician jobs', 'physician-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Physician', 266, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(268, 'Physician Assistant jobs', 'physician-assistant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Physician+Assistant', 267, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(269, 'Physiotherapy jobs', 'physiotherapy-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Physiotherapy', 268, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(270, 'Registered Nurse jobs', 'registered-nurse-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Registered+Nurse', 269, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(271, 'Respiratory Therapist jobs', 'respiratory-therapist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Respiratory+Therapist', 270, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(272, 'RN jobs', 'rn-jobs', 'http://www.simplyhired.com/a/jobs/list/q-RN', 271, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(273, 'Surgeon jobs', 'surgeon-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Surgeon', 272, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(274, 'Vet jobs', 'vet-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Vet', 273, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(275, 'Veterinarian jobs', 'veterinarian-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Veterinarian', 274, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(276, 'Medical Technology jobs', 'medical-technology-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Medical+Technology', 275, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(277, 'CNA jobs', 'cna-jobs', 'http://www.simplyhired.com/a/jobs/list/q-CNA', 276, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(278, 'CRNA jobs', 'crna-jobs', 'http://www.simplyhired.com/a/jobs/list/q-CRNA', 277, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(279, 'Dental Hygienist jobs', 'dental-hygienist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Dental+Hygienist', 278, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(280, 'Licensed Practical Nurse jobs', 'licensed-practical-nurse-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Licensed+Practical+Nurse', 279, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(281, 'LPN jobs', 'lpn-jobs', 'http://www.simplyhired.com/a/jobs/list/q-LPN', 280, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(282, 'LVN jobs', 'lvn-jobs', 'http://www.simplyhired.com/a/jobs/list/q-LVN', 281, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(283, 'Medical Technologist jobs', 'medical-technologist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Medical+Technologist', 282, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(284, 'MRI Technologist jobs', 'mri-technologist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-MRI+Technologist', 283, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(285, 'Nuclear Medicine Technologist jobs', 'nuclear-medicine-technologist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Nuclear+Medicine+Technologist', 284, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(286, 'Paramedic jobs', 'paramedic-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Paramedic', 285, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(287, 'Pharmacy Technician jobs', 'pharmacy-technician-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Pharmacy+Technician', 286, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(288, 'Radiologic Technologist jobs', 'radiologic-technologist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Radiologic+Technologist', 287, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(289, 'Radiology jobs', 'radiology-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Radiology', 288, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(290, 'Radiology Imaging jobs', 'radiology-imaging-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Radiology+Imaging', 289, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(291, 'Surgical Technologist jobs', 'surgical-technologist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Surgical+Technologist', 290, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(292, 'Ultrasound Technologist jobs', 'ultrasound-technologist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Ultrasound+Technologist', 291, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(293, 'Vascular Technologist jobs', 'vascular-technologist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Vascular+Technologist', 292, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(294, 'Veterinary Assistant jobs', 'veterinary-assistant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Veterinary+Assistant', 293, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(295, 'Veterinary Technician jobs', 'veterinary-technician-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Veterinary+Technician', 294, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(296, 'Health Care Support', 'health-care-support', 'http://www.simplyhired.com/job-search/onet-310000/', 0, 0, '2009-03-01 01:17:30', '2009-03-01 01:17:30'),
(297, 'Health Care Support Jobs', 'health-care-support-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Health+Care+Support', 296, 0, '2009-03-01 01:17:31', '2009-03-01 01:17:31'),
(298, 'Nursing Aide jobs', 'nursing-aide-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Nursing+Aide', 297, 0, '2009-03-01 01:17:31', '2009-03-01 01:17:31'),
(299, 'Certified Nursing Assistant jobs', 'certified-nursing-assistant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Certified+Nursing+Assistant', 298, 0, '2009-03-01 01:17:31', '2009-03-01 01:17:31'),
(300, 'Home Health Aide jobs', 'home-health-aide-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Home+Health+Aide', 277, 0, '2009-03-01 01:17:31', '2009-03-01 01:17:31'),
(301, 'Nurse Assistant jobs', 'nurse-assistant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Nurse+Assistant', 300, 0, '2009-03-01 01:17:31', '2009-03-01 01:17:31'),
(302, 'Nursing Assistant jobs', 'nursing-assistant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Nursing+Assistant', 301, 0, '2009-03-01 01:17:31', '2009-03-01 01:17:31'),
(303, 'Other Health Care Support jobs', 'other-health-care-support-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Other+Health+Care+Support', 302, 0, '2009-03-01 01:17:31', '2009-03-01 01:17:31'),
(304, 'Dental jobs', 'dental-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Dental', 303, 0, '2009-03-01 01:17:31', '2009-03-01 01:17:31');
INSERT INTO `job_categories` (`id`, `name`, `alias`, `url`, `parent_id`, `sort_order`, `added_date`, `last_updated`) VALUES
(305, 'Dental Assistant jobs', 'dental-assistant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Dental+Assistant', 304, 0, '2009-03-01 01:17:31', '2009-03-01 01:17:31'),
(306, 'Massage Therapist jobs', 'massage-therapist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Massage+Therapist', 305, 0, '2009-03-01 01:17:31', '2009-03-01 01:17:31'),
(307, 'Medical Assistant jobs', 'medical-assistant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Medical+Assistant', 306, 0, '2009-03-01 01:17:31', '2009-03-01 01:17:31'),
(308, 'Medical Billing Specialist jobs', 'medical-billing-specialist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Medical+Billing+Specialist', 307, 0, '2009-03-01 01:17:31', '2009-03-01 01:17:31'),
(309, 'Medical Receptionist jobs', 'medical-receptionist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Medical+Receptionist', 308, 0, '2009-03-01 01:17:31', '2009-03-01 01:17:31'),
(310, 'Medical Records Clerk jobs', 'medical-records-clerk-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Medical+Records+Clerk', 309, 0, '2009-03-01 01:17:31', '2009-03-01 01:17:31'),
(311, 'Medical Transcriptionist jobs', 'medical-transcriptionist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Medical+Transcriptionist', 310, 0, '2009-03-01 01:17:31', '2009-03-01 01:17:31'),
(312, 'Nutritionist jobs', 'nutritionist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Nutritionist', 311, 0, '2009-03-01 01:17:31', '2009-03-01 01:17:31'),
(313, 'Phlebotomist jobs', 'phlebotomist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Phlebotomist', 312, 0, '2009-03-01 01:17:31', '2009-03-01 01:17:31'),
(314, 'Transcriptionist jobs', 'transcriptionist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Transcriptionist', 313, 0, '2009-03-01 01:17:31', '2009-03-01 01:17:31'),
(315, 'Yoga Instructor jobs', 'yoga-instructor-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Yoga+Instructor', 314, 0, '2009-03-01 01:17:31', '2009-03-01 01:17:31'),
(316, 'Therapy Assistant jobs', 'therapy-assistant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Therapy+Assistant', 315, 0, '2009-03-01 01:17:31', '2009-03-01 01:17:31'),
(317, 'Occupational Therapy Assistant jobs', 'occupational-therapy-assistant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Occupational+Therapy+Assistant', 316, 0, '2009-03-01 01:17:31', '2009-03-01 01:17:31'),
(318, 'Physical Therapy Assistant jobs', 'physical-therapy-assistant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Physical+Therapy+Assistant', 266, 0, '2009-03-01 01:17:31', '2009-03-01 01:17:31'),
(319, 'PTA jobs', 'pta-jobs', 'http://www.simplyhired.com/a/jobs/list/q-PTA', 318, 0, '2009-03-01 01:17:31', '2009-03-01 01:17:31'),
(320, 'Law', 'law', 'http://www.simplyhired.com/job-search/onet-230000/', 0, 0, '2009-03-01 01:17:31', '2009-03-01 01:17:31'),
(321, 'Law Jobs', 'law-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Law', 320, 0, '2009-03-01 01:17:32', '2009-03-01 01:17:32'),
(322, 'Lawyer and Judge jobs', 'lawyer-and-judge-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Lawyer+and+Judge', 321, 0, '2009-03-01 01:17:32', '2009-03-01 01:17:32'),
(323, 'Attorney jobs', 'attorney-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Attorney', 322, 0, '2009-03-01 01:17:32', '2009-03-01 01:17:32'),
(324, 'Corporate Attorney jobs', 'corporate-attorney-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Corporate+Attorney', 323, 0, '2009-03-01 01:17:32', '2009-03-01 01:17:32'),
(325, 'General Counsel jobs', 'general-counsel-jobs', 'http://www.simplyhired.com/a/jobs/list/q-General+Counsel', 324, 0, '2009-03-01 01:17:32', '2009-03-01 01:17:32'),
(326, 'Judge Advocate jobs', 'judge-advocate-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Judge+Advocate', 325, 0, '2009-03-01 01:17:32', '2009-03-01 01:17:32'),
(327, 'Litigation Attorney jobs', 'litigation-attorney-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Litigation+Attorney', 326, 0, '2009-03-01 01:17:32', '2009-03-01 01:17:32'),
(328, 'Patent Attorney jobs', 'patent-attorney-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Patent+Attorney', 327, 0, '2009-03-01 01:17:32', '2009-03-01 01:17:32'),
(329, 'Real Estate Attorney jobs', 'real-estate-attorney-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Real+Estate+Attorney', 328, 0, '2009-03-01 01:17:32', '2009-03-01 01:17:32'),
(330, 'Tax Attorney jobs', 'tax-attorney-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Tax+Attorney', 329, 0, '2009-03-01 01:17:32', '2009-03-01 01:17:32'),
(331, 'Legal Support jobs', 'legal-support-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Legal+Support', 330, 0, '2009-03-01 01:17:32', '2009-03-01 01:17:32'),
(332, 'Commercial Litigation Associate jobs', 'commercial-litigation-associate-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Commercial+Litigation+Associate', 331, 0, '2009-03-01 01:17:32', '2009-03-01 01:17:32'),
(333, 'Legal Assistant jobs', 'legal-assistant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Legal+Assistant', 332, 0, '2009-03-01 01:17:32', '2009-03-01 01:17:32'),
(334, 'Legal Secretary jobs', 'legal-secretary-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Legal+Secretary', 333, 0, '2009-03-01 01:17:32', '2009-03-01 01:17:32'),
(335, 'Litigation Associate jobs', 'litigation-associate-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Litigation+Associate', 334, 0, '2009-03-01 01:17:32', '2009-03-01 01:17:32'),
(336, 'Litigation Paralegal jobs', 'litigation-paralegal-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Litigation+Paralegal', 335, 0, '2009-03-01 01:17:32', '2009-03-01 01:17:32'),
(337, 'Paralegal jobs', 'paralegal-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Paralegal', 336, 0, '2009-03-01 01:17:32', '2009-03-01 01:17:32'),
(338, 'Real Estate Paralegal jobs', 'real-estate-paralegal-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Real+Estate+Paralegal', 337, 0, '2009-03-01 01:17:32', '2009-03-01 01:17:32'),
(339, 'Law Enforcement', 'law-enforcement', 'http://www.simplyhired.com/job-search/onet-330000/', 0, 0, '2009-03-01 01:17:32', '2009-03-01 01:17:32'),
(340, 'Law Enforcement Jobs', 'law-enforcement-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Law+Enforcement', 339, 0, '2009-03-01 01:17:33', '2009-03-01 01:17:33'),
(341, 'Firefighting jobs', 'firefighting-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Firefighting', 340, 0, '2009-03-01 01:17:33', '2009-03-01 01:17:33'),
(342, 'Firefighter jobs', 'firefighter-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Firefighter', 341, 0, '2009-03-01 01:17:33', '2009-03-01 01:17:33'),
(343, 'Other Protective Service jobs', 'other-protective-service-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Other+Protective+Service', 342, 0, '2009-03-01 01:17:33', '2009-03-01 01:17:33'),
(344, 'Border Patrol jobs', 'border-patrol-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Border+Patrol', 343, 0, '2009-03-01 01:17:33', '2009-03-01 01:17:33'),
(345, 'Lifeguard jobs', 'lifeguard-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Lifeguard', 344, 0, '2009-03-01 01:17:33', '2009-03-01 01:17:33'),
(346, 'Loss Prevention Detective jobs', 'loss-prevention-detective-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Loss+Prevention+Detective', 345, 0, '2009-03-01 01:17:33', '2009-03-01 01:17:33'),
(347, 'Loss Prevention Investigator jobs', 'loss-prevention-investigator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Loss+Prevention+Investigator', 346, 0, '2009-03-01 01:17:33', '2009-03-01 01:17:33'),
(348, 'Security Guard jobs', 'security-guard-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Security+Guard', 347, 0, '2009-03-01 01:17:33', '2009-03-01 01:17:33'),
(349, 'Police jobs', 'police-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Police', 348, 0, '2009-03-01 01:17:33', '2009-03-01 01:17:33'),
(350, 'Criminal Investigator jobs', 'criminal-investigator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Criminal+Investigator', 349, 0, '2009-03-01 01:17:33', '2009-03-01 01:17:33'),
(351, 'Police Officer jobs', 'police-officer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Police+Officer', 350, 0, '2009-03-01 01:17:33', '2009-03-01 01:17:33'),
(352, 'Security jobs', 'security-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Security', 351, 0, '2009-03-01 01:17:33', '2009-03-01 01:17:33'),
(353, 'Loss Prevention Manager jobs', 'loss-prevention-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Loss+Prevention+Manager', 352, 0, '2009-03-01 01:17:33', '2009-03-01 01:17:33'),
(354, 'Night jobs', 'night-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Night', 353, 0, '2009-03-01 01:17:33', '2009-03-01 01:17:33'),
(355, 'Security Officer jobs', 'security-officer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Security+Officer', 352, 0, '2009-03-01 01:17:33', '2009-03-01 01:17:33'),
(356, 'Transportation Security Officer jobs', 'transportation-security-officer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Transportation+Security+Officer', 355, 0, '2009-03-01 01:17:33', '2009-03-01 01:17:33'),
(357, 'Maintenance', 'maintenance', 'http://www.simplyhired.com/job-search/onet-490000/', 0, 0, '2009-03-01 01:17:33', '2009-03-01 01:17:33'),
(358, 'Maintenance Jobs', 'maintenance-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Maintenance', 357, 0, '2009-03-01 01:17:34', '2009-03-01 01:17:34'),
(359, 'Automotive jobs', 'automotive-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Automotive', 358, 0, '2009-03-01 01:17:34', '2009-03-01 01:17:34'),
(360, 'Auto Mechanic jobs', 'auto-mechanic-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Auto+Mechanic', 359, 0, '2009-03-01 01:17:34', '2009-03-01 01:17:34'),
(361, 'Automotive Technician jobs', 'automotive-technician-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Automotive+Technician', 360, 0, '2009-03-01 01:17:34', '2009-03-01 01:17:34'),
(362, 'Diesel Mechanic jobs', 'diesel-mechanic-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Diesel+Mechanic', 361, 0, '2009-03-01 01:17:34', '2009-03-01 01:17:34'),
(363, 'Tire Technician jobs', 'tire-technician-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Tire+Technician', 362, 0, '2009-03-01 01:17:34', '2009-03-01 01:17:34'),
(364, 'Eletrical jobs', 'eletrical-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Eletrical', 363, 0, '2009-03-01 01:17:34', '2009-03-01 01:17:34'),
(365, 'Assembly jobs', 'assembly-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Assembly', 364, 0, '2009-03-01 01:17:34', '2009-03-01 01:17:34'),
(366, 'Assembly Technician jobs', 'assembly-technician-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Assembly+Technician', 365, 0, '2009-03-01 01:17:34', '2009-03-01 01:17:34'),
(367, 'Avionics Technician jobs', 'avionics-technician-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Avionics+Technician', 366, 0, '2009-03-01 01:17:34', '2009-03-01 01:17:34'),
(368, 'Field Service Technician jobs', 'field-service-technician-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Field+Service+Technician', 367, 0, '2009-03-01 01:17:34', '2009-03-01 01:17:34'),
(369, 'Telecom jobs', 'telecom-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Telecom', 368, 0, '2009-03-01 01:17:34', '2009-03-01 01:17:34'),
(370, 'Telecommunication jobs', 'telecommunication-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Telecommunication', 369, 0, '2009-03-01 01:17:34', '2009-03-01 01:17:34'),
(371, 'Maintenance Manager jobs', 'maintenance-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Maintenance+Manager', 370, 0, '2009-03-01 01:17:34', '2009-03-01 01:17:34'),
(372, 'HVAC jobs', 'hvac-jobs', 'http://www.simplyhired.com/a/jobs/list/q-HVAC', 371, 0, '2009-03-01 01:17:34', '2009-03-01 01:17:34'),
(373, 'HVAC Manager jobs', 'hvac-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-HVAC+Manager', 372, 0, '2009-03-01 01:17:34', '2009-03-01 01:17:34'),
(374, 'Maintenance Supervisor jobs', 'maintenance-supervisor-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Maintenance+Supervisor', 371, 0, '2009-03-01 01:17:34', '2009-03-01 01:17:34'),
(375, 'Other Maintenance jobs', 'other-maintenance-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Other+Maintenance', 374, 0, '2009-03-01 01:17:34', '2009-03-01 01:17:34'),
(376, 'Handyman jobs', 'handyman-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Handyman', 375, 0, '2009-03-01 01:17:34', '2009-03-01 01:17:34'),
(377, 'HVAC Installer jobs', 'hvac-installer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-HVAC+Installer', 376, 0, '2009-03-01 01:17:34', '2009-03-01 01:17:34'),
(378, 'HVAC Technician jobs', 'hvac-technician-jobs', 'http://www.simplyhired.com/a/jobs/list/q-HVAC+Technician', 377, 0, '2009-03-01 01:17:34', '2009-03-01 01:17:34'),
(379, 'Laborer jobs', 'laborer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Laborer', 378, 0, '2009-03-01 01:17:34', '2009-03-01 01:17:34'),
(380, 'Maintenance Mechanic jobs', 'maintenance-mechanic-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Maintenance+Mechanic', 371, 0, '2009-03-01 01:17:34', '2009-03-01 01:17:34'),
(381, 'Mechanic jobs', 'mechanic-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Mechanic', 380, 0, '2009-03-01 01:17:34', '2009-03-01 01:17:34'),
(382, 'Management', 'management', 'http://www.simplyhired.com/job-search/onet-110000/', 0, 0, '2009-03-01 01:17:34', '2009-03-01 01:17:34'),
(383, 'Management Jobs', 'management-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Management', 382, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(384, 'Advertising & Marketing jobs', 'advertising--marketing-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Advertising+%26+Marketing', 383, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(385, 'Brand Manager jobs', 'brand-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Brand+Manager', 384, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(386, 'Business Development Associate jobs', 'business-development-associate-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Business+Development+Associate', 385, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(387, 'Business Development Manager jobs', 'business-development-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Business+Development+Manager', 386, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(388, 'Business Development Specialist jobs', 'business-development-specialist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Business+Development+Specialist', 387, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(389, 'Business Manager jobs', 'business-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Business+Manager', 388, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(390, 'Communications Specialist jobs', 'communications-specialist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Communications+Specialist', 389, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(391, 'Director of Marketing jobs', 'director-of-marketing-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Director+of+Marketing', 390, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(392, 'Director of Sales jobs', 'director-of-sales-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Director+of+Sales', 391, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(393, 'District Manager jobs', 'district-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-District+Manager', 392, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(394, 'Event Manager jobs', 'event-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Event+Manager', 393, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(395, 'Event Planner jobs', 'event-planner-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Event+Planner', 394, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(396, 'Marketer jobs', 'marketer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Marketer', 395, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(397, 'Marketing Assistant jobs', 'marketing-assistant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Marketing+Assistant', 396, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(398, 'Marketing Associate jobs', 'marketing-associate-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Marketing+Associate', 397, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(399, 'Marketing Communications Manager jobs', 'marketing-communications-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Marketing+Communications+Manager', 398, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(400, 'Marketing Coordinator jobs', 'marketing-coordinator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Marketing+Coordinator', 399, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(401, 'Marketing Manager jobs', 'marketing-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Marketing+Manager', 400, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(402, 'Marketing Specialist jobs', 'marketing-specialist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Marketing+Specialist', 401, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(403, 'Online Marketing Manager jobs', 'online-marketing-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Online+Marketing+Manager', 402, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(404, 'Public Relations Manager jobs', 'public-relations-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Public+Relations+Manager', 403, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(405, 'Relationship Manager jobs', 'relationship-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Relationship+Manager', 404, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(406, 'Territory Manager jobs', 'territory-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Territory+Manager', 405, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(407, 'Executive Management jobs', 'executive-management-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Executive+Management', 406, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(408, 'Chief Executive Officer jobs', 'chief-executive-officer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Chief+Executive+Officer', 407, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(409, 'Chief Financial Officer jobs', 'chief-financial-officer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Chief+Financial+Officer', 408, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(410, 'Executive Director jobs', 'executive-director-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Executive+Director', 409, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(411, 'General Manager jobs', 'general-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-General+Manager', 410, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(412, 'President jobs', 'president-jobs', 'http://www.simplyhired.com/a/jobs/list/q-President', 411, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(413, 'Vice President jobs', 'vice-president-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Vice+President', 412, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(414, 'VP Business Development jobs', 'vp-business-development-jobs', 'http://www.simplyhired.com/a/jobs/list/q-VP+Business+Development', 413, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(415, 'VP Engineering jobs', 'vp-engineering-jobs', 'http://www.simplyhired.com/a/jobs/list/q-VP+Engineering', 414, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(416, 'VP Finance jobs', 'vp-finance-jobs', 'http://www.simplyhired.com/a/jobs/list/q-VP+Finance', 415, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(417, 'VP Human Resources jobs', 'vp-human-resources-jobs', 'http://www.simplyhired.com/a/jobs/list/q-VP+Human+Resources', 416, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(418, 'VP Information Technology jobs', 'vp-information-technology-jobs', 'http://www.simplyhired.com/a/jobs/list/q-VP+Information+Technology', 417, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(419, 'VP Marketing jobs', 'vp-marketing-jobs', 'http://www.simplyhired.com/a/jobs/list/q-VP+Marketing', 418, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(420, 'VP Operations jobs', 'vp-operations-jobs', 'http://www.simplyhired.com/a/jobs/list/q-VP+Operations', 419, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(421, 'VP Sales jobs', 'vp-sales-jobs', 'http://www.simplyhired.com/a/jobs/list/q-VP+Sales', 420, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(422, 'Manager jobs', 'manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Manager', 421, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(423, 'Account Manager jobs', 'account-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Account+Manager', 422, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(424, 'Assistant Controller jobs', 'assistant-controller-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Assistant+Controller', 423, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(425, 'Audit Manager jobs', 'audit-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Audit+Manager', 424, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(426, 'Controller jobs', 'controller-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Controller', 425, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(427, 'Finance Manager jobs', 'finance-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Finance+Manager', 426, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(428, 'Office Manager jobs', 'office-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Office+Manager', 427, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(429, 'Product Manager jobs', 'product-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Product+Manager', 428, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(430, 'Other Management jobs', 'other-management-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Other+Management', 429, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(431, 'Assistant Manager jobs', 'assistant-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Assistant+Manager', 430, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(432, 'Assistant Project Manager jobs', 'assistant-project-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Assistant+Project+Manager', 431, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(433, 'Branch Manager jobs', 'branch-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Branch+Manager', 432, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(434, 'Director of Finance jobs', 'director-of-finance-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Director+of+Finance', 433, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(435, 'Director of Human Resources jobs', 'director-of-human-resources-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Director+of+Human+Resources', 434, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(436, 'Director of Nursing jobs', 'director-of-nursing-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Director+of+Nursing', 435, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(437, 'Management Consulting jobs', 'management-consulting-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Management+Consulting', 436, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(438, 'Manager Trainee jobs', 'manager-trainee-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Manager+Trainee', 437, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(439, 'Program Manager jobs', 'program-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Program+Manager', 438, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(440, 'Project Manager jobs', 'project-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Project+Manager', 439, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(441, 'Senior Project Manager jobs', 'senior-project-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Senior+Project+Manager', 440, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(442, 'Superintendent jobs', 'superintendent-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Superintendent', 441, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(443, 'Tax Manager jobs', 'tax-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Tax+Manager', 442, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(444, 'Manufacturing', 'manufacturing', 'http://www.simplyhired.com/job-search/onet-510000/', 0, 0, '2009-03-01 01:17:36', '2009-03-01 01:17:36'),
(445, 'Manufacturing Jobs', 'manufacturing-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Manufacturing', 444, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(446, 'Assembler jobs', 'assembler-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Assembler', 365, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(447, 'Electronic Assembler jobs', 'electronic-assembler-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Electronic+Assembler', 446, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(448, 'Fabricator jobs', 'fabricator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Fabricator', 447, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(449, 'Mechanical Assembler jobs', 'mechanical-assembler-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Mechanical+Assembler', 448, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(450, 'Carpentry jobs', 'carpentry-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Carpentry', 449, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(451, 'Food Processing jobs', 'food-processing-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Food+Processing', 227, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(452, 'Baker jobs', 'baker-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Baker', 451, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(453, 'Cake Decorator jobs', 'cake-decorator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Cake+Decorator', 452, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(454, 'Meat Cutter jobs', 'meat-cutter-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Meat+Cutter', 453, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(455, 'Machining jobs', 'machining-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Machining', 454, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(456, 'CNC Machinist jobs', 'cnc-machinist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-CNC+Machinist', 455, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(457, 'CNC Operator jobs', 'cnc-operator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-CNC+Operator', 456, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(458, 'Machine Operator jobs', 'machine-operator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Machine+Operator', 457, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(459, 'Machine Operators jobs', 'machine-operators-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Machine+Operators', 458, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(460, 'Machinist jobs', 'machinist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Machinist', 459, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(461, 'MIG Welder jobs', 'mig-welder-jobs', 'http://www.simplyhired.com/a/jobs/list/q-MIG+Welder', 460, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(462, 'Welder jobs', 'welder-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Welder', 461, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(463, 'Power Plant jobs', 'power-plant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Power+Plant', 462, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(464, 'Alternative Energy jobs', 'alternative-energy-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Alternative+Energy', 463, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(465, 'Boiler Operator jobs', 'boiler-operator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Boiler+Operator', 464, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(466, 'Energy jobs', 'energy-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Energy', 465, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(467, 'Plant Operator jobs', 'plant-operator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Plant+Operator', 466, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(468, 'Power Plant Operator jobs', 'power-plant-operator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Power+Plant+Operator', 467, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(469, 'Renewable Energy jobs', 'renewable-energy-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Renewable+Energy', 468, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(470, 'Waste water Treatment jobs', 'waste-water-treatment-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Waste+water+Treatment', 469, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(471, 'Wind Energy jobs', 'wind-energy-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Wind+Energy', 470, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(472, 'Printing jobs', 'printing-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Printing', 471, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(473, 'Printer Repair jobs', 'printer-repair-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Printer+Repair', 472, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(474, 'Production jobs', 'production-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Production', 473, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(475, 'Painting jobs', 'painting-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Painting', 474, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(476, 'QA jobs', 'qa-jobs', 'http://www.simplyhired.com/a/jobs/list/q-QA', 475, 0, '2009-03-01 01:17:37', '2009-03-01 01:17:37'),
(477, 'Quality Assurance jobs', 'quality-assurance-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Quality+Assurance', 476, 0, '2009-03-01 01:17:38', '2009-03-01 01:17:37'),
(478, 'Quality Control Manager jobs', 'quality-control-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Quality+Control+Manager', 477, 0, '2009-03-01 01:17:38', '2009-03-01 01:17:38'),
(479, 'Production Management jobs', 'production-management-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Production+Management', 478, 0, '2009-03-01 01:17:38', '2009-03-01 01:17:38'),
(480, 'Director of Operations jobs', 'director-of-operations-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Director+of+Operations', 479, 0, '2009-03-01 01:17:38', '2009-03-01 01:17:38'),
(481, 'Production Supervisor jobs', 'production-supervisor-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Production+Supervisor', 480, 0, '2009-03-01 01:17:38', '2009-03-01 01:17:38'),
(482, 'Textile jobs', 'textile-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Textile', 481, 0, '2009-03-01 01:17:38', '2009-03-01 01:17:38'),
(483, 'Laundry jobs', 'laundry-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Laundry', 482, 0, '2009-03-01 01:17:38', '2009-03-01 01:17:38'),
(484, 'Seamstress jobs', 'seamstress-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Seamstress', 483, 0, '2009-03-01 01:17:38', '2009-03-01 01:17:38'),
(485, 'Sewing jobs', 'sewing-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Sewing', 484, 0, '2009-03-01 01:17:38', '2009-03-01 01:17:38'),
(486, 'Textile Designer jobs', 'textile-designer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Textile+Designer', 482, 0, '2009-03-01 01:17:38', '2009-03-01 01:17:38'),
(487, 'Upholstery jobs', 'upholstery-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Upholstery', 486, 0, '2009-03-01 01:17:38', '2009-03-01 01:17:38'),
(488, 'Military', 'military', 'http://www.simplyhired.com/job-search/onet-550000/', 0, 0, '2009-03-01 01:17:38', '2009-03-01 01:17:38'),
(489, 'Military Jobs', 'military-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Military', 488, 0, '2009-03-01 01:17:38', '2009-03-01 01:17:38'),
(490, 'Defense jobs', 'defense-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Defense', 489, 0, '2009-03-01 01:17:38', '2009-03-01 01:17:38'),
(491, 'Air Force jobs', 'air-force-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Air+Force', 490, 0, '2009-03-01 01:17:38', '2009-03-01 01:17:38'),
(492, 'Army jobs', 'army-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Army', 491, 0, '2009-03-01 01:17:38', '2009-03-01 01:17:38'),
(493, 'Coast Guard jobs', 'coast-guard-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Coast+Guard', 492, 0, '2009-03-01 01:17:38', '2009-03-01 01:17:38'),
(494, 'Infantry jobs', 'infantry-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Infantry', 493, 0, '2009-03-01 01:17:38', '2009-03-01 01:17:38'),
(495, 'Marine jobs', 'marine-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Marine', 494, 0, '2009-03-01 01:17:38', '2009-03-01 01:17:38'),
(496, 'National Guard jobs', 'national-guard-jobs', 'http://www.simplyhired.com/a/jobs/list/q-National+Guard', 495, 0, '2009-03-01 01:17:39', '2009-03-01 01:17:39'),
(497, 'Weapons Systems jobs', 'weapons-systems-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Weapons+Systems', 496, 0, '2009-03-01 01:17:39', '2009-03-01 01:17:39'),
(498, 'Non-Profit & Social Work', 'nonprofit--social-work', 'http://www.simplyhired.com/job-search/onet-210000/', 0, 0, '2009-03-01 01:17:39', '2009-03-01 01:17:39'),
(499, 'Non-Profit & Social Work Jobs', 'nonprofit--social-work-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Non-Profit+%26+Social+Work', 498, 0, '2009-03-01 01:17:39', '2009-03-01 01:17:39'),
(500, 'Ministry jobs', 'ministry-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Ministry', 499, 0, '2009-03-01 01:17:39', '2009-03-01 01:17:39'),
(501, 'Associate Pastor jobs', 'associate-pastor-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Associate+Pastor', 500, 0, '2009-03-01 01:17:39', '2009-03-01 01:17:39'),
(502, 'Chaplain jobs', 'chaplain-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Chaplain', 501, 0, '2009-03-01 01:17:39', '2009-03-01 01:17:39'),
(503, 'Pastor jobs', 'pastor-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Pastor', 502, 0, '2009-03-01 01:17:39', '2009-03-01 01:17:39'),
(504, 'Religion jobs', 'religion-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Religion', 503, 0, '2009-03-01 01:17:39', '2009-03-01 01:17:39'),
(505, 'Youth Pastor jobs', 'youth-pastor-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Youth+Pastor', 504, 0, '2009-03-01 01:17:39', '2009-03-01 01:17:39'),
(506, 'Social Work jobs', 'social-work-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Social+Work', 505, 0, '2009-03-01 01:17:39', '2009-03-01 01:17:39'),
(507, 'Case Manager jobs', 'case-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Case+Manager', 506, 0, '2009-03-01 01:17:39', '2009-03-01 01:17:39'),
(508, 'Counselor jobs', 'counselor-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Counselor', 507, 0, '2009-03-01 01:17:39', '2009-03-01 01:17:39'),
(509, 'Director of Rehabilitation jobs', 'director-of-rehabilitation-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Director+of+Rehabilitation', 508, 0, '2009-03-01 01:17:39', '2009-03-01 01:17:39'),
(510, 'Enrollment Counselor jobs', 'enrollment-counselor-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Enrollment+Counselor', 509, 0, '2009-03-01 01:17:39', '2009-03-01 01:17:39'),
(511, 'Grant Writer jobs', 'grant-writer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Grant+Writer', 510, 0, '2009-03-01 01:17:39', '2009-03-01 01:17:39'),
(512, 'Medical Social Worker jobs', 'medical-social-worker-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Medical+Social+Worker', 511, 0, '2009-03-01 01:17:39', '2009-03-01 01:17:39'),
(513, 'Non-profit jobs', 'nonprofit-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Non-profit', 512, 0, '2009-03-01 01:17:40', '2009-03-01 01:17:40'),
(514, 'Outreach Coordinator jobs', 'outreach-coordinator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Outreach+Coordinator', 513, 0, '2009-03-01 01:17:40', '2009-03-01 01:17:40'),
(515, 'Social Service jobs', 'social-service-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Social+Service', 514, 0, '2009-03-01 01:17:40', '2009-03-01 01:17:40'),
(516, 'Social Worker jobs', 'social-worker-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Social+Worker', 506, 0, '2009-03-01 01:17:40', '2009-03-01 01:17:40'),
(517, 'Summer camp jobs', 'summer-camp-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Summer+camp', 516, 0, '2009-03-01 01:17:40', '2009-03-01 01:17:40'),
(518, 'Volunteer jobs', 'volunteer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Volunteer', 517, 0, '2009-03-01 01:17:40', '2009-03-01 01:17:40'),
(519, 'Restaurant', 'restaurant', 'http://www.simplyhired.com/job-search/onet-350000/', 0, 0, '2009-03-01 01:17:40', '2009-03-01 01:17:40'),
(520, 'Restaurant Jobs', 'restaurant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Restaurant', 519, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(521, 'Cooking jobs', 'cooking-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Cooking', 520, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(522, 'Cook jobs', 'cook-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Cook', 521, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(523, 'Food Service Specialist jobs', 'food-service-specialist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Food+Service+Specialist', 522, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(524, 'Grill Cook jobs', 'grill-cook-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Grill+Cook', 523, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(525, 'Line Cook jobs', 'line-cook-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Line+Cook', 524, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(526, 'Prep Cook jobs', 'prep-cook-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Prep+Cook', 525, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(527, 'Food Service jobs', 'food-service-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Food+Service', 526, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(528, 'Banquet Server jobs', 'banquet-server-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Banquet+Server', 527, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(529, 'Bartender jobs', 'bartender-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Bartender', 528, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(530, 'Food Service Worker jobs', 'food-service-worker-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Food+Service+Worker', 529, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(531, 'Restaurant Bartender jobs', 'restaurant-bartender-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Restaurant+Bartender', 530, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(532, 'Server jobs', 'server-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Server', 531, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(533, 'Waiter jobs', 'waiter-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Waiter', 532, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(534, 'Waitress jobs', 'waitress-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Waitress', 533, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(535, 'Hospitality jobs', 'hospitality-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Hospitality', 534, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(536, 'Busser jobs', 'busser-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Busser', 535, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(537, 'Greeter jobs', 'greeter-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Greeter', 536, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(538, 'Host Staff jobs', 'host-staff-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Host+Staff', 537, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(539, 'Host/Hostess jobs', 'hosthostess-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Host%2FHostess', 538, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(540, 'Steward jobs', 'steward-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Steward', 539, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(541, 'Restaurant Management jobs', 'restaurant-management-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Restaurant+Management', 540, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(542, 'Chef jobs', 'chef-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Chef', 541, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(543, 'Executive Chef jobs', 'executive-chef-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Executive+Chef', 542, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(544, 'Kitchen Manager jobs', 'kitchen-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Kitchen+Manager', 543, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(545, 'Restaurant Manager jobs', 'restaurant-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Restaurant+Manager', 520, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(546, 'Sous Chef jobs', 'sous-chef-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Sous+Chef', 545, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(547, 'Sales', 'sales', 'http://www.simplyhired.com/job-search/onet-410000/', 0, 0, '2009-03-01 01:17:41', '2009-03-01 01:17:41'),
(548, 'Sales Jobs', 'sales-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Sales', 547, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(549, 'Other Sales jobs', 'other-sales-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Other+Sales', 548, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(550, 'Garden Sales jobs', 'garden-sales-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Garden+Sales', 549, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(551, 'Jewelry jobs', 'jewelry-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Jewelry', 550, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(552, 'Leasing Consultant jobs', 'leasing-consultant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Leasing+Consultant', 551, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(553, 'Sales Assistant jobs', 'sales-assistant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Sales+Assistant', 552, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(554, 'Sales Coordinator jobs', 'sales-coordinator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Sales+Coordinator', 553, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(555, 'Sales Engineer jobs', 'sales-engineer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Sales+Engineer', 554, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(556, 'Sales Professional jobs', 'sales-professional-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Sales+Professional', 555, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(557, 'Retail jobs', 'retail-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Retail', 556, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(558, 'Cashier jobs', 'cashier-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Cashier', 557, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(559, 'Head Cashier jobs', 'head-cashier-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Head+Cashier', 558, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(560, 'Retail Sales Associate jobs', 'retail-sales-associate-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Retail+Sales+Associate', 559, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(561, 'Sales Management jobs', 'sales-management-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Sales+Management', 560, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(562, 'Commercial Sales Manager jobs', 'commercial-sales-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Commercial+Sales+Manager', 561, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(563, 'Regional Sales jobs', 'regional-sales-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Regional+Sales', 562, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(564, 'Retail Management jobs', 'retail-management-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Retail+Management', 563, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(565, 'Sales Associate jobs', 'sales-associate-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Sales+Associate', 564, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(566, 'Sales Executive jobs', 'sales-executive-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Sales+Executive', 565, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(567, 'Sales Manager jobs', 'sales-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Sales+Manager', 561, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(568, 'Store Manager jobs', 'store-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Store+Manager', 567, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(569, 'Sales Rep jobs', 'sales-rep-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Sales+Rep', 568, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(570, 'Account Executive jobs', 'account-executive-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Account+Executive', 569, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(571, 'Account Representative jobs', 'account-representative-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Account+Representative', 570, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(572, 'Call Center jobs', 'call-center-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Call+Center', 571, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(573, 'Claims jobs', 'claims-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Claims', 572, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(574, 'Direct Sales jobs', 'direct-sales-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Direct+Sales', 573, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(575, 'Entry Level Sales jobs', 'entry-level-sales-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Entry+Level+Sales', 574, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(576, 'Field Sales Representative jobs', 'field-sales-representative-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Field+Sales+Representative', 575, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(577, 'Financial Advisor jobs', 'financial-advisor-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Financial+Advisor', 576, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(578, 'Inside Sales jobs', 'inside-sales-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Inside+Sales', 577, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(579, 'Inside Sales Representative jobs', 'inside-sales-representative-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Inside+Sales+Representative', 578, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(580, 'Insurance jobs', 'insurance-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Insurance', 579, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(581, 'Insurance Sales Representative jobs', 'insurance-sales-representative-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Insurance+Sales+Representative', 580, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(582, 'Outside Sales Representative jobs', 'outside-sales-representative-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Outside+Sales+Representative', 581, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(583, 'Sales Consultant jobs', 'sales-consultant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Sales+Consultant', 582, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(584, 'Sales Representative jobs', 'sales-representative-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Sales+Representative', 583, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(585, 'Sales Specialist jobs', 'sales-specialist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Sales+Specialist', 584, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(586, 'Telemarketer jobs', 'telemarketer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Telemarketer', 585, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(587, 'Wholesale Sales jobs', 'wholesale-sales-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Wholesale+Sales', 586, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(588, 'Advertising Sales jobs', 'advertising-sales-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Advertising+Sales', 587, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(589, 'HVAC Sales jobs', 'hvac-sales-jobs', 'http://www.simplyhired.com/a/jobs/list/q-HVAC+Sales', 588, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(590, 'Medical Sales jobs', 'medical-sales-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Medical+Sales', 589, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(591, 'Pharmaceutical Sales jobs', 'pharmaceutical-sales-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Pharmaceutical+Sales', 590, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(592, 'Technical Sales jobs', 'technical-sales-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Technical+Sales', 591, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(593, 'Telecom Sales jobs', 'telecom-sales-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Telecom+Sales', 592, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(594, 'Science', 'science', 'http://www.simplyhired.com/job-search/onet-190000/', 0, 0, '2009-03-01 01:17:42', '2009-03-01 01:17:42'),
(595, 'Science Jobs', 'science-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Science', 594, 0, '2009-03-01 01:17:43', '2009-03-01 01:17:43'),
(596, 'Biology jobs', 'biology-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Biology', 595, 0, '2009-03-01 01:17:43', '2009-03-01 01:17:43'),
(597, 'Agriculture jobs', 'agriculture-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Agriculture', 596, 0, '2009-03-01 01:17:43', '2009-03-01 01:17:43'),
(598, 'Biologist jobs', 'biologist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Biologist', 597, 0, '2009-03-01 01:17:43', '2009-03-01 01:17:43'),
(599, 'Clinical Research jobs', 'clinical-research-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Clinical+Research', 598, 0, '2009-03-01 01:17:43', '2009-03-01 01:17:43'),
(600, 'Epidemiologist jobs', 'epidemiologist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Epidemiologist', 599, 0, '2009-03-01 01:17:43', '2009-03-01 01:17:43'),
(601, 'Farm jobs', 'farm-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Farm', 600, 0, '2009-03-01 01:17:43', '2009-03-01 01:17:43'),
(602, 'Infection Control Practitioner jobs', 'infection-control-practitioner-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Infection+Control+Practitioner', 601, 0, '2009-03-01 01:17:43', '2009-03-01 01:17:43'),
(603, 'Lab Assistant jobs', 'lab-assistant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Lab+Assistant', 602, 0, '2009-03-01 01:17:43', '2009-03-01 01:17:43'),
(604, 'Microbiologist jobs', 'microbiologist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Microbiologist', 603, 0, '2009-03-01 01:17:43', '2009-03-01 01:17:43'),
(605, 'Research Scientist jobs', 'research-scientist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Research+Scientist', 604, 0, '2009-03-01 01:17:43', '2009-03-01 01:17:43');
INSERT INTO `job_categories` (`id`, `name`, `alias`, `url`, `parent_id`, `sort_order`, `added_date`, `last_updated`) VALUES
(606, 'Wildlife Biologist jobs', 'wildlife-biologist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Wildlife+Biologist', 605, 0, '2009-03-01 01:17:43', '2009-03-01 01:17:43'),
(607, 'Environmental jobs', 'environmental-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Environmental', 606, 0, '2009-03-01 01:17:43', '2009-03-01 01:17:43'),
(608, 'Chemical Technician jobs', 'chemical-technician-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Chemical+Technician', 607, 0, '2009-03-01 01:17:43', '2009-03-01 01:17:43'),
(609, 'Civil/Environmental Engineer jobs', 'civilenvironmental-engineer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Civil%2FEnvironmental+Engineer', 608, 0, '2009-03-01 01:17:43', '2009-03-01 01:17:43'),
(610, 'Environmental Specialist jobs', 'environmental-specialist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Environmental+Specialist', 74, 0, '2009-03-01 01:17:43', '2009-03-01 01:17:43'),
(611, 'Environmental Technician jobs', 'environmental-technician-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Environmental+Technician', 610, 0, '2009-03-01 01:17:43', '2009-03-01 01:17:43'),
(612, 'Forestry Technician jobs', 'forestry-technician-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Forestry+Technician', 611, 0, '2009-03-01 01:17:43', '2009-03-01 01:17:43'),
(613, 'Senior Environmental Engineer jobs', 'senior-environmental-engineer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Senior+Environmental+Engineer', 612, 0, '2009-03-01 01:17:44', '2009-03-01 01:17:44'),
(614, 'Physical Scientist jobs', 'physical-scientist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Physical+Scientist', 613, 0, '2009-03-01 01:17:44', '2009-03-01 01:17:44'),
(615, 'Analytical Chemist jobs', 'analytical-chemist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Analytical+Chemist', 614, 0, '2009-03-01 01:17:44', '2009-03-01 01:17:44'),
(616, 'Archaeology jobs', 'archaeology-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Archaeology', 615, 0, '2009-03-01 01:17:44', '2009-03-01 01:17:44'),
(617, 'Biochemist jobs', 'biochemist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Biochemist', 616, 0, '2009-03-01 01:17:44', '2009-03-01 01:17:44'),
(618, 'Chemist jobs', 'chemist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Chemist', 617, 0, '2009-03-01 01:17:44', '2009-03-01 01:17:44'),
(619, 'Ecologist jobs', 'ecologist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Ecologist', 618, 0, '2009-03-01 01:17:44', '2009-03-01 01:17:44'),
(620, 'Environmental Scientist jobs', 'environmental-scientist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Environmental+Scientist', 619, 0, '2009-03-01 01:17:44', '2009-03-01 01:17:44'),
(621, 'Geologist jobs', 'geologist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Geologist', 620, 0, '2009-03-01 01:17:44', '2009-03-01 01:17:44'),
(622, 'GIS jobs', 'gis-jobs', 'http://www.simplyhired.com/a/jobs/list/q-GIS', 621, 0, '2009-03-01 01:17:44', '2009-03-01 01:17:44'),
(623, 'Hydrology jobs', 'hydrology-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Hydrology', 622, 0, '2009-03-01 01:17:44', '2009-03-01 01:17:44'),
(624, 'Metallurgy jobs', 'metallurgy-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Metallurgy', 623, 0, '2009-03-01 01:17:44', '2009-03-01 01:17:44'),
(625, 'Physicist jobs', 'physicist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Physicist', 624, 0, '2009-03-01 01:17:44', '2009-03-01 01:17:44'),
(626, 'Scientist jobs', 'scientist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Scientist', 625, 0, '2009-03-01 01:17:44', '2009-03-01 01:17:44'),
(627, 'Social Science jobs', 'social-science-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Social+Science', 626, 0, '2009-03-01 01:17:44', '2009-03-01 01:17:44'),
(628, 'Clinical Psychologist jobs', 'clinical-psychologist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Clinical+Psychologist', 627, 0, '2009-03-01 01:17:44', '2009-03-01 01:17:44'),
(629, 'Market Research Analyst jobs', 'market-research-analyst-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Market+Research+Analyst', 628, 0, '2009-03-01 01:17:44', '2009-03-01 01:17:44'),
(630, 'Market Researcher jobs', 'market-researcher-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Market+Researcher', 629, 0, '2009-03-01 01:17:44', '2009-03-01 01:17:44'),
(631, 'Marketing Analyst jobs', 'marketing-analyst-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Marketing+Analyst', 630, 0, '2009-03-01 01:17:44', '2009-03-01 01:17:44'),
(632, 'Product Analyst jobs', 'product-analyst-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Product+Analyst', 631, 0, '2009-03-01 01:17:44', '2009-03-01 01:17:44'),
(633, 'Psychologist jobs', 'psychologist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Psychologist', 632, 0, '2009-03-01 01:17:44', '2009-03-01 01:17:44'),
(634, 'Research Assistant jobs', 'research-assistant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Research+Assistant', 633, 0, '2009-03-01 01:17:44', '2009-03-01 01:17:44'),
(635, 'Research Manager jobs', 'research-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Research+Manager', 634, 0, '2009-03-01 01:17:44', '2009-03-01 01:17:44'),
(636, 'Researcher jobs', 'researcher-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Researcher', 635, 0, '2009-03-01 01:17:44', '2009-03-01 01:17:44'),
(637, 'Service', 'service', 'http://www.simplyhired.com/job-search/onet-390000/', 0, 0, '2009-03-01 01:17:44', '2009-03-01 01:17:44'),
(638, 'Service Jobs', 'service-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Service', 637, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(639, 'Animal jobs', 'animal-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Animal', 638, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(640, 'Animal Care Technician jobs', 'animal-care-technician-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Animal+Care+Technician', 639, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(641, 'Animal Caretaker jobs', 'animal-caretaker-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Animal+Caretaker', 640, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(642, 'Animal Control Officer jobs', 'animal-control-officer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Animal+Control+Officer', 641, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(643, 'Beauty jobs', 'beauty-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Beauty', 642, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(644, 'Cosmetologist jobs', 'cosmetologist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Cosmetologist', 643, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(645, 'Esthetician jobs', 'esthetician-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Esthetician', 644, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(646, 'Hair Stylist jobs', 'hair-stylist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Hair+Stylist', 645, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(647, 'Make Up Artist jobs', 'make-up-artist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Make+Up+Artist', 646, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(648, 'Manicurist jobs', 'manicurist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Manicurist', 647, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(649, 'Nail Technician jobs', 'nail-technician-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Nail+Technician', 648, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(650, 'Stylist jobs', 'stylist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Stylist', 649, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(651, 'Caretaking jobs', 'caretaking-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Caretaking', 650, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(652, 'Caregiver jobs', 'caregiver-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Caregiver', 651, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(653, 'Child care jobs', 'child-care-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Child+care', 652, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(654, 'Nanny jobs', 'nanny-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Nanny', 653, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(655, 'Patient Care Coordinator jobs', 'patient-care-coordinator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Patient+Care+Coordinator', 654, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(656, 'Personal Assistant jobs', 'personal-assistant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Personal+Assistant', 655, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(657, 'Residential Counselor jobs', 'residential-counselor-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Residential+Counselor', 656, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(658, 'Hotel jobs', 'hotel-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Hotel', 657, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(659, 'Bellperson jobs', 'bellperson-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Bellperson', 658, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(660, 'Bilingual jobs', 'bilingual-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Bilingual', 659, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(661, 'Concierge jobs', 'concierge-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Concierge', 660, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(662, 'Front Desk Agent jobs', 'front-desk-agent-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Front+Desk+Agent', 661, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(663, 'Front Desk Clerk jobs', 'front-desk-clerk-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Front+Desk+Clerk', 662, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(664, 'Front Desk Coordinator jobs', 'front-desk-coordinator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Front+Desk+Coordinator', 663, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(665, 'Front Desk Receptionist jobs', 'front-desk-receptionist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Front+Desk+Receptionist', 664, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(666, 'Porter jobs', 'porter-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Porter', 665, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(667, 'Travel jobs', 'travel-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Travel', 666, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(668, 'Travel Agent jobs', 'travel-agent-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Travel+Agent', 667, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(669, 'Teaching', 'teaching', 'http://www.simplyhired.com/job-search/onet-250000/', 0, 0, '2009-03-01 01:17:45', '2009-03-01 01:17:45'),
(670, 'Teaching Jobs', 'teaching-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Teaching', 669, 0, '2009-03-01 01:17:46', '2009-03-01 01:17:46'),
(671, 'Assitant Teaching jobs', 'assitant-teaching-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Assitant+Teaching', 670, 0, '2009-03-01 01:17:46', '2009-03-01 01:17:46'),
(672, 'Academic jobs', 'academic-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Academic', 671, 0, '2009-03-01 01:17:46', '2009-03-01 01:17:46'),
(673, 'Professor jobs', 'professor-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Professor', 672, 0, '2009-03-01 01:17:46', '2009-03-01 01:17:46'),
(674, 'Teacher Assistant jobs', 'teacher-assistant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Teacher+Assistant', 673, 0, '2009-03-01 01:17:46', '2009-03-01 01:17:46'),
(675, 'Teacher\\''s Aide jobs', 'teacher-aide-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Teacher%27s+Aide', 674, 0, '2009-03-01 01:17:46', '2009-03-01 01:17:46'),
(676, 'Elementary jobs', 'elementary-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Elementary', 675, 0, '2009-03-01 01:17:46', '2009-03-01 01:17:46'),
(677, 'Coach jobs', 'coach-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Coach', 676, 0, '2009-03-01 01:17:46', '2009-03-01 01:17:46'),
(678, 'Educator jobs', 'educator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Educator', 677, 0, '2009-03-01 01:17:46', '2009-03-01 01:17:46'),
(679, 'Guidance Counselor jobs', 'guidance-counselor-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Guidance+Counselor', 678, 0, '2009-03-01 01:17:46', '2009-03-01 01:17:46'),
(680, 'Instructor jobs', 'instructor-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Instructor', 679, 0, '2009-03-01 01:17:46', '2009-03-01 01:17:46'),
(681, 'Preschool Teacher jobs', 'preschool-teacher-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Preschool+Teacher', 680, 0, '2009-03-01 01:17:46', '2009-03-01 01:17:46'),
(682, 'Special Education Teacher jobs', 'special-education-teacher-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Special+Education+Teacher', 681, 0, '2009-03-01 01:17:46', '2009-03-01 01:17:46'),
(683, 'High School jobs', 'high-school-jobs', 'http://www.simplyhired.com/a/jobs/list/q-High+School', 682, 0, '2009-03-01 01:17:46', '2009-03-01 01:17:46'),
(684, 'Assistant Teacher jobs', 'assistant-teacher-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Assistant+Teacher', 683, 0, '2009-03-01 01:17:46', '2009-03-01 01:17:46'),
(685, 'English Teacher jobs', 'english-teacher-jobs', 'http://www.simplyhired.com/a/jobs/list/q-English+Teacher', 684, 0, '2009-03-01 01:17:46', '2009-03-01 01:17:46'),
(686, 'Math Teacher jobs', 'math-teacher-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Math+Teacher', 685, 0, '2009-03-01 01:17:46', '2009-03-01 01:17:46'),
(687, 'Science Teacher jobs', 'science-teacher-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Science+Teacher', 686, 0, '2009-03-01 01:17:46', '2009-03-01 01:17:46'),
(688, 'Spanish Teacher jobs', 'spanish-teacher-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Spanish+Teacher', 687, 0, '2009-03-01 01:17:46', '2009-03-01 01:17:46'),
(689, 'Teacher jobs', 'teacher-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Teacher', 688, 0, '2009-03-01 01:17:46', '2009-03-01 01:17:46'),
(690, 'Library jobs', 'library-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Library', 689, 0, '2009-03-01 01:17:46', '2009-03-01 01:17:46'),
(691, 'Archivist jobs', 'archivist-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Archivist', 690, 0, '2009-03-01 01:17:46', '2009-03-01 01:17:46'),
(692, 'Librarian jobs', 'librarian-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Librarian', 691, 0, '2009-03-01 01:17:46', '2009-03-01 01:17:46'),
(693, 'Tutoring jobs', 'tutoring-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Tutoring', 692, 0, '2009-03-01 01:17:46', '2009-03-01 01:17:46'),
(694, 'Substitute Teacher jobs', 'substitute-teacher-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Substitute+Teacher', 693, 0, '2009-03-01 01:17:46', '2009-03-01 01:17:46'),
(695, 'Tutor jobs', 'tutor-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Tutor', 694, 0, '2009-03-01 01:17:46', '2009-03-01 01:17:46'),
(696, 'Transportation', 'transportation', 'http://www.simplyhired.com/job-search/onet-530000/', 0, 0, '2009-03-01 01:17:46', '2009-03-01 01:17:46'),
(697, 'Transportation Jobs', 'transportation-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Transportation', 696, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47'),
(698, 'Aviation jobs', 'aviation-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Aviation', 697, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47'),
(699, 'Air Traffic Control jobs', 'air-traffic-control-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Air+Traffic+Control', 698, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47'),
(700, 'Aircraft Mechanic jobs', 'aircraft-mechanic-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Aircraft+Mechanic', 699, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47'),
(701, 'Flight Attendant jobs', 'flight-attendant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Flight+Attendant', 700, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47'),
(702, 'Flight Dispatcher jobs', 'flight-dispatcher-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Flight+Dispatcher', 701, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47'),
(703, 'Pilot jobs', 'pilot-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Pilot', 702, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47'),
(704, 'Driving jobs', 'driving-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Driving', 703, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47'),
(705, 'Bus Driver jobs', 'bus-driver-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Bus+Driver', 704, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47'),
(706, 'CDL Driver jobs', 'cdl-driver-jobs', 'http://www.simplyhired.com/a/jobs/list/q-CDL+Driver', 705, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47'),
(707, 'Delivery jobs', 'delivery-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Delivery', 706, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47'),
(708, 'Driver jobs', 'driver-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Driver', 707, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47'),
(709, 'Driver Class A jobs', 'driver-class-a-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Driver+Class+A', 708, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47'),
(710, 'Driver Class B jobs', 'driver-class-b-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Driver+Class+B', 709, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47'),
(711, 'Truck Driver jobs', 'truck-driver-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Truck+Driver', 710, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47'),
(712, 'Moving jobs', 'moving-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Moving', 711, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47'),
(713, 'Crane Operator jobs', 'crane-operator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Crane+Operator', 712, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47'),
(714, 'Forklift jobs', 'forklift-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Forklift', 713, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47'),
(715, 'Forklift Operator jobs', 'forklift-operator-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Forklift+Operator', 714, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47'),
(716, 'General Labor jobs', 'general-labor-jobs', 'http://www.simplyhired.com/a/jobs/list/q-General+Labor', 715, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47'),
(717, 'Material Handler jobs', 'material-handler-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Material+Handler', 716, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47'),
(718, 'Packer jobs', 'packer-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Packer', 717, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47'),
(719, 'Other Transportation jobs', 'other-transportation-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Other+Transportation', 718, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47'),
(720, 'Attendant jobs', 'attendant-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Attendant', 719, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47'),
(721, 'Transportation Manager jobs', 'transportation-manager-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Transportation+Manager', 720, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47'),
(722, 'Dispatcher jobs', 'dispatcher-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Dispatcher', 721, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47'),
(723, 'Receiving jobs', 'receiving-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Receiving', 722, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47'),
(724, 'Transportation Supervisor jobs', 'transportation-supervisor-jobs', 'http://www.simplyhired.com/a/jobs/list/q-Transportation+Supervisor', 721, 0, '2009-03-01 01:17:47', '2009-03-01 01:17:47');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL,
  `url` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `added_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `manufacturers`
--


-- --------------------------------------------------------

--
-- Table structure for table `navigations`
--

DROP TABLE IF EXISTS `navigations`;
CREATE TABLE IF NOT EXISTS `navigations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `url` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `navigations`
--


-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `image` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `seo_keywords` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `seo_description` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `alias` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `added_date` datetime DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  `source_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `source_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `number_views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  FULLTEXT KEY `title` (`title`,`summary`,`description`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `news`
--


-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

DROP TABLE IF EXISTS `news_categories`;
CREATE TABLE IF NOT EXISTS `news_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=183 ;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`id`, `news_id`, `category_id`) VALUES
(169, 224, 19),
(178, 1, 23),
(177, 2, 19),
(179, 1, 19),
(180, 3, 21),
(181, 4, 28),
(182, 5, 28);

-- --------------------------------------------------------

--
-- Table structure for table `nodes`
--

DROP TABLE IF EXISTS `nodes`;
CREATE TABLE IF NOT EXISTS `nodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `reference_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `seo_keywords` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `seo_description` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `nodes`
--


-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seo_keywords` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `seo_description` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `price` decimal(10,3) NOT NULL,
  `treatments` text COLLATE utf8_unicode_ci NOT NULL,
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `number_views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  FULLTEXT KEY `name` (`name`,`description`,`treatments`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `products`
--


-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
CREATE TABLE IF NOT EXISTS `provinces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `alias`, `sort_order`, `added_date`, `last_updated`) VALUES
(1, 'Hà Nội', 'ha-noi', 1, '2008-04-16 03:40:50', '2008-04-16 03:40:50'),
(2, 'Hồ Chí Minh', 'ho-chi-minh', 2, '2008-04-16 03:40:50', '2008-04-16 03:40:50'),
(3, 'Vũng Tàu', 'vung-tau', 3, '2008-04-22 12:15:12', '2008-04-22 12:15:12');

-- --------------------------------------------------------

--
-- Table structure for table `searched_keywords`
--

DROP TABLE IF EXISTS `searched_keywords`;
CREATE TABLE IF NOT EXISTS `searched_keywords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `number_times` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `searched_keywords`
--


-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `sender_email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `smtp_host` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `smtp_user` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `smtp_password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `smtp_auth` tinyint(1) NOT NULL DEFAULT '0',
  `wordwrap` tinyint(2) NOT NULL DEFAULT '80',
  `charset` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'utf-8',
  `contact_address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `contact_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `contact_phone` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `contact_fax` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sender_name`, `sender_email`, `smtp_host`, `smtp_user`, `smtp_password`, `smtp_auth`, `wordwrap`, `charset`, `contact_address`, `contact_email`, `contact_phone`, `contact_fax`) VALUES
(2, 'VPLS Ho Vu', 'thao-va@vplshovu.com', 'mail.whodigital.com', 'giao.dang@whodigital.com', 'whopassgiao%2007', 1, 80, 'utf-8', '381 Nguyễn An Ninh, Phường 9, Tp. Vũng Tàu', 'thao-va@vplshovu.com', '(0646) 281392', '(0643) 596566');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `username`, `password`, `added_date`, `last_updated`) VALUES
(1, 'Đặng Ngọc Giao', 'ADMIN', 'giaodn@gmail.com', 'giaodn', 'c9be812505baea091f4c0c06207c3f94807750db', '2008-03-06 09:31:33', '2008-05-01 03:42:57'),
(4, 'Vũ Anh Thao', 'ADMIN', '', 'thaova', 'fedea7ac1460908bef6c291e142df20176742b30', '2008-11-18 08:49:57', '2008-11-18 08:49:57');

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

DROP TABLE IF EXISTS `wards`;
CREATE TABLE IF NOT EXISTS `wards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `district_id` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `added_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wards`
--

