-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 19, 2015 at 10:12 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ft2_florakbapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_member`
--

CREATE TABLE IF NOT EXISTS `admin_member` (
`id` int(15) NOT NULL,
  `name` varchar(46) DEFAULT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(46) DEFAULT NULL,
  `salt` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `n_status` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `code_activity`
--

CREATE TABLE IF NOT EXISTS `code_activity` (
`id` int(11) NOT NULL,
  `activityId` int(11) NOT NULL,
  `activityValue` varchar(50) NOT NULL,
  `n_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `code_activity_log`
--

CREATE TABLE IF NOT EXISTS `code_activity_log` (
`id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `activityId` int(11) NOT NULL,
  `activityDesc` text NOT NULL,
  `source` varchar(20) NOT NULL,
  `datetimes` datetime NOT NULL,
  `n_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `code_url_redirect`
--

CREATE TABLE IF NOT EXISTS `code_url_redirect` (
  `id` int(11) NOT NULL,
  `articleId` int(11) DEFAULT NULL,
  `shortUrl` varchar(100) DEFAULT NULL,
  `friendlyUrl` varchar(300) DEFAULT NULL,
  `datetimes` datetime DEFAULT NULL,
  `n_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `floraINA_banner`
--

CREATE TABLE IF NOT EXISTS `floraINA_banner` (
`id` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `posted_date` date NOT NULL,
  `expired_date` date DEFAULT NULL,
  `author_id` tinyint(4) DEFAULT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL,
  `n_stats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `floraINA_news_category`
--

CREATE TABLE IF NOT EXISTS `floraINA_news_category` (
`id` int(11) NOT NULL,
  `catName` varchar(100) DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `floraINA_news_content`
--

CREATE TABLE IF NOT EXISTS `floraINA_news_content` (
`id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `brief` text NOT NULL,
  `content` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `articleType` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `expired_date` datetime NOT NULL,
  `posted_date` datetime NOT NULL,
  `authorid` int(11) NOT NULL,
  `n_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `floraINA_news_content_repo`
--

CREATE TABLE IF NOT EXISTS `floraINA_news_content_repo` (
`id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `brief` text NOT NULL,
  `content` text NOT NULL,
  `typealbum` int(11) NOT NULL COMMENT '1:song;2:images;3:video',
  `gallerytype` int(11) NOT NULL COMMENT '0:content,1:contest',
  `files` varchar(200) NOT NULL COMMENT 'can be image or song',
  `thumbnail` varchar(200) NOT NULL,
  `fromwho` int(11) NOT NULL COMMENT '0;admin;1:user;2:pages',
  `otherid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `n_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `floraINA_repo`
--

CREATE TABLE IF NOT EXISTS `floraINA_repo` (
`id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `category` int(2) NOT NULL,
  `source` text NOT NULL,
  `content` text NOT NULL,
  `files` varchar(200) NOT NULL COMMENT 'can be image or song',
  `filename` varchar(200) NOT NULL,
  `realname` varchar(200) NOT NULL,
  `icon` varchar(200) NOT NULL,
  `file_icon` varchar(200) NOT NULL,
  `authorid` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `floraINA_video`
--

CREATE TABLE IF NOT EXISTS `floraINA_video` (
`id` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `posted_date` date NOT NULL,
  `expired_date` date DEFAULT NULL,
  `langid` tinyint(4) NOT NULL,
  `author_id` tinyint(4) DEFAULT NULL,
  `video_type` varchar(50) NOT NULL,
  `title_bhs` varchar(200) NOT NULL,
  `brief_bhs` text NOT NULL,
  `content_bhs` text NOT NULL,
  `title_en` varchar(200) NOT NULL,
  `brief_en` text NOT NULL,
  `content_en` text NOT NULL,
  `title_uzbek` varchar(200) NOT NULL,
  `brief_uzbek` text NOT NULL,
  `content_uzbek` text NOT NULL,
  `video` varchar(200) NOT NULL,
  `thumbnail_image` varchar(200) DEFAULT NULL,
  `file` varchar(200) NOT NULL,
  `filesize` int(11) DEFAULT NULL,
  `n_stats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `florakb_mail_log`
--

CREATE TABLE IF NOT EXISTS `florakb_mail_log` (
`id` int(11) NOT NULL,
  `receipt` varchar(50) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `encode` text,
  `send_date` datetime DEFAULT NULL,
  `n_status` int(11) DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

-- --------------------------------------------------------

--
-- Table structure for table `florakb_person`
--

CREATE TABLE IF NOT EXISTS `florakb_person` (
  `id` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `salt` varchar(25) NOT NULL,
  `register_date` datetime NOT NULL,
  `verified_date` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `login_count` int(11) NOT NULL,
  `user_type` int(22) NOT NULL,
  `email_token` varchar(50) NOT NULL,
  `n_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `florakb_upload_log`
--

CREATE TABLE IF NOT EXISTS `florakb_upload_log` (
`id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `filename` varchar(200) DEFAULT NULL,
  `desc` text,
  `upload_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_location`
--

CREATE TABLE IF NOT EXISTS `tmp_location` (
  `unique_key` varchar(200) DEFAULT NULL,
  `long` varchar(200) DEFAULT NULL,
  `lat` varchar(200) DEFAULT NULL,
  `elev` varchar(200) DEFAULT NULL,
  `geomorphology` varchar(200) DEFAULT NULL,
  `locality` varchar(200) DEFAULT NULL,
  `kabupaten` varchar(200) DEFAULT NULL,
  `province` varchar(200) DEFAULT NULL,
  `island` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `tmp_unique_key` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_person`
--

CREATE TABLE IF NOT EXISTS `tmp_person` (
  `unique_key` varchar(200) DEFAULT NULL,
  `db_id` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `tmp_unique_key` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_photo`
--

CREATE TABLE IF NOT EXISTS `tmp_photo` (
  `filename` varchar(200) DEFAULT NULL,
  `tree_id` varchar(200) DEFAULT NULL,
  `photographer` varchar(200) DEFAULT NULL,
  `plant_part` varchar(200) DEFAULT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `tmp_person_key` varchar(20) DEFAULT NULL,
  `tmp_indiv_key` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_plant`
--

CREATE TABLE IF NOT EXISTS `tmp_plant` (
  `unique_key` varchar(200) DEFAULT NULL,
  `plantlist_kode` varchar(20) DEFAULT NULL,
  `date` varchar(200) DEFAULT NULL,
  `obs_by` varchar(200) DEFAULT NULL,
  `locn` varchar(200) DEFAULT NULL,
  `microhab` varchar(200) DEFAULT NULL,
  `plot` varchar(200) DEFAULT NULL,
  `tag` varchar(200) DEFAULT NULL,
  `habit` varchar(200) DEFAULT NULL,
  `dbh` varchar(200) DEFAULT NULL,
  `height` varchar(200) DEFAULT NULL,
  `bud` varchar(200) DEFAULT NULL,
  `flower` varchar(200) DEFAULT NULL,
  `fruit` varchar(200) DEFAULT NULL,
  `indiv_notes` varchar(200) DEFAULT NULL,
  `det` varchar(200) DEFAULT NULL,
  `confid` varchar(200) DEFAULT NULL,
  `det_by` varchar(200) DEFAULT NULL,
  `det_date` varchar(200) DEFAULT NULL,
  `det_using` varchar(200) DEFAULT NULL,
  `det_notes` varchar(200) DEFAULT NULL,
  `local_name` varchar(200) DEFAULT NULL,
  `benefit` varchar(200) DEFAULT NULL,
  `tmp_location_key` varchar(20) DEFAULT NULL,
  `tmp_taxon_key` varchar(20) DEFAULT NULL,
  `tmp_person_key` varchar(20) DEFAULT NULL,
  `tmp_indiv_key` varchar(20) DEFAULT NULL,
  `tmp_coll_key` varchar(20) DEFAULT NULL,
  `tmp_creator_key` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_taxon`
--

CREATE TABLE IF NOT EXISTS `tmp_taxon` (
  `unique_key` varchar(200) NOT NULL,
  `db_id` varchar(200) DEFAULT NULL,
  `morphotype` varchar(200) DEFAULT NULL,
  `fam` varchar(200) DEFAULT NULL,
  `gen` varchar(200) DEFAULT NULL,
  `sp` varchar(200) DEFAULT NULL,
  `subtype` varchar(200) DEFAULT NULL,
  `ssp` varchar(200) DEFAULT NULL,
  `ssp_auth` varchar(200) DEFAULT NULL,
  `tmp_unique_key` varchar(200) DEFAULT NULL,
  `kewid` varchar(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_member`
--

CREATE TABLE IF NOT EXISTS `user_member` (
`id` int(15) NOT NULL,
  `name` varchar(46) DEFAULT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verified_date` datetime NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `image_profile` varchar(200) NOT NULL,
  `username` varchar(46) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `sex` varchar(11) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `description` text,
  `middle_name` varchar(46) DEFAULT NULL,
  `last_name` varchar(46) DEFAULT NULL,
  `StreetName` varchar(150) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `n_status` int(3) NOT NULL DEFAULT '0' COMMENT ' pending , approved, verified, rejected ',
  `login_count` int(11) NOT NULL DEFAULT '0',
  `verified` tinyint(3) DEFAULT '0',
  `usertype` int(11) NOT NULL COMMENT '0:online;1:offline;2;existing',
  `salt` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_member`
--
ALTER TABLE `admin_member`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `code_activity`
--
ALTER TABLE `code_activity`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `code_activity_log`
--
ALTER TABLE `code_activity_log`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `code_url_redirect`
--
ALTER TABLE `code_url_redirect`
 ADD UNIQUE KEY `shortUrl` (`shortUrl`), ADD UNIQUE KEY `friendlyUrl` (`friendlyUrl`);

--
-- Indexes for table `floraINA_banner`
--
ALTER TABLE `floraINA_banner`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `floraINA_news_category`
--
ALTER TABLE `floraINA_news_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `floraINA_news_content`
--
ALTER TABLE `floraINA_news_content`
 ADD PRIMARY KEY (`id`), ADD KEY `title` (`title`), ADD KEY `categoryid` (`categoryid`), ADD KEY `created_date` (`created_date`), ADD KEY `posted_date` (`posted_date`), ADD KEY `n_status` (`n_status`), ADD KEY `articleTypeID` (`articleType`), ADD KEY `image` (`image`), ADD KEY `expired_date` (`expired_date`), ADD KEY `aid` (`authorid`), ADD KEY `file` (`file`);

--
-- Indexes for table `floraINA_news_content_repo`
--
ALTER TABLE `floraINA_news_content_repo`
 ADD PRIMARY KEY (`id`), ADD KEY `otherid` (`otherid`), ADD KEY `IDX_typeAlbum` (`typealbum`), ADD KEY `IDX_Album_ID` (`gallerytype`), ADD KEY `IDX_FROM_WHO` (`fromwho`);

--
-- Indexes for table `floraINA_repo`
--
ALTER TABLE `floraINA_repo`
 ADD PRIMARY KEY (`id`), ADD KEY `otherid` (`authorid`);

--
-- Indexes for table `floraINA_video`
--
ALTER TABLE `floraINA_video`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `florakb_mail_log`
--
ALTER TABLE `florakb_mail_log`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `receipt` (`receipt`,`subject`);

--
-- Indexes for table `florakb_person`
--
ALTER TABLE `florakb_person`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `florakb_upload_log`
--
ALTER TABLE `florakb_upload_log`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_member`
--
ALTER TABLE `user_member`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_member`
--
ALTER TABLE `admin_member`
MODIFY `id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `code_activity`
--
ALTER TABLE `code_activity`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `code_activity_log`
--
ALTER TABLE `code_activity_log`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `floraINA_banner`
--
ALTER TABLE `floraINA_banner`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `floraINA_news_category`
--
ALTER TABLE `floraINA_news_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `floraINA_news_content`
--
ALTER TABLE `floraINA_news_content`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `floraINA_news_content_repo`
--
ALTER TABLE `floraINA_news_content_repo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `floraINA_repo`
--
ALTER TABLE `floraINA_repo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `floraINA_video`
--
ALTER TABLE `floraINA_video`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `florakb_mail_log`
--
ALTER TABLE `florakb_mail_log`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `florakb_upload_log`
--
ALTER TABLE `florakb_upload_log`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_member`
--
ALTER TABLE `user_member`
MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
