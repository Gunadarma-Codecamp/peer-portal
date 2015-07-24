-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 24, 2015 at 03:24 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ft2_floraINA_portal`
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

--
-- Dumping data for table `admin_member`
--

INSERT INTO `admin_member` (`id`, `name`, `nickname`, `email`, `register_date`, `username`, `salt`, `password`, `n_status`) VALUES
(1, 'adminSS', 'admin', 'admin@example.com', '2014-08-08 05:56:36', 'admin', 'codekir v3.0', '9aca4c40eb8dbacd4eaf953055d770acd1c815e8', 1);

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
  `n_status` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `floraINA_banner`
--

INSERT INTO `floraINA_banner` (`id`, `created_date`, `posted_date`, `expired_date`, `author_id`, `description`, `image`, `file`, `n_status`) VALUES
(1, '2015-06-22', '2015-07-02', '0000-00-00', 1, '123', '145940be2179e3e885e239749fac8597.jpg', 'http://localhost/floraINA-portal/public_assets/banner/145940be2179e3e885e239749fac8597.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `floraINA_digirepo`
--

CREATE TABLE IF NOT EXISTS `floraINA_digirepo` (
`id` int(11) NOT NULL,
  `otherid` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `category` int(2) NOT NULL,
  `source` text NOT NULL,
  `content` text NOT NULL,
  `files` varchar(200) NOT NULL COMMENT 'can be image or song',
  `filename` varchar(200) NOT NULL,
  `filesize` varchar(200) NOT NULL,
  `realname` varchar(200) NOT NULL,
  `icon` varchar(200) NOT NULL,
  `file_icon` varchar(200) NOT NULL,
  `authorid` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `n_status` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `floraINA_digirepo`
--

INSERT INTO `floraINA_digirepo` (`id`, `otherid`, `title`, `category`, `source`, `content`, `files`, `filename`, `filesize`, `realname`, `icon`, `file_icon`, `authorid`, `created_date`, `n_status`) VALUES
(1, 0, 'SIMILARITY MEASUREMENT OF SCIENTIST AND CITIZEN SCIENTIST MINDSET TASK MODEL ON BIODIVERSITY INFORMATICS APPLICATION', 1, 'Kartika Dwintaputri Siregar', '&lt;p style=&quot;text-align:justify&quot;&gt;Citizen Science is a research collaboration that involves the public in scientific projects to solve specific problems. Inventory data is important in the biodiversity as this can help in controlling the preservation of nature and inventory data can using citizen science system in data collection process.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;Citizen science system is used in biodiversity informatics application flora-kalbar.info. In its development there was a differences between citizen science and scientist mindset on the inventory biodiversity data pro- cess, that needs to be modelled into task model, to produce system model that can be specified for the subsequent design process.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;The concept of mental models will be applied in the research of citizen scientist and scientist mindset. Task modeling will use the ConcurTassTrees notation, then will be search the similarities of citizen scientist and scientist task model with ontology-based semantic similarity approach.&lt;/p&gt;', 'http://localhost/biodiv-checklist-portal/public_assets/digirepo/9cdb6762db1ef9ce51b581a0e0e9ad47.pdf', '9cdb6762db1ef9ce51b581a0e0e9ad47.pdf', '2850159', 'Thesis-KDS_28042015.pdf', 'b8d78e1f41fa2e11861ef2ac693b17d7.png', 'http://localhost/biodiv-checklist-portal/public_assets/digirepo/icon/b8d78e1f41fa2e11861ef2ac693b17d7.png', 1, '2015-06-21 00:00:00', 1),
(12, 3, 'Presentasi Hari 1', 2, 'I Made Wiryana', '', '', '', '', '', 'ff7b01346061aeb3becdbef51a17fc79.jpg', 'http://localhost/floraINA-portal/public_assets/digirepo/icon/ff7b01346061aeb3becdbef51a17fc79.jpg', 1, '2015-06-22 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `floraINA_digirepo_events`
--

CREATE TABLE IF NOT EXISTS `floraINA_digirepo_events` (
`id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `place` varchar(200) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `created_date` datetime NOT NULL,
  `authorid` int(11) NOT NULL,
  `n_status` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `floraINA_digirepo_events`
--

INSERT INTO `floraINA_digirepo_events` (`id`, `title`, `place`, `start_date`, `end_date`, `created_date`, `authorid`, `n_status`) VALUES
(3, 'Workshop PEER Flora Kalbar', 'Kalimantan Barat', '2015-06-01 03:25:00', '2015-06-22 03:25:00', '2015-06-22 00:00:00', 1, 1),
(4, 'Test 123', '', '2015-06-22 03:35:00', '2015-06-22 03:35:00', '2015-06-22 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `floraINA_news_category`
--

CREATE TABLE IF NOT EXISTS `floraINA_news_category` (
`id` int(11) NOT NULL,
  `catName` varchar(100) DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `floraINA_news_category`
--

INSERT INTO `floraINA_news_category` (`id`, `catName`, `n_status`) VALUES
(1, 'Article', 1),
(2, 'About', 1),
(3, 'Workflow', 1),
(4, 'Links', 1),
(5, NULL, NULL),
(6, NULL, NULL),
(7, NULL, NULL),
(8, NULL, NULL),
(9, 'Gallery', 1);

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
  `highlight` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `expired_date` datetime NOT NULL,
  `posted_date` datetime NOT NULL,
  `authorid` int(11) NOT NULL,
  `n_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `floraINA_news_content`
--

INSERT INTO `floraINA_news_content` (`id`, `title`, `brief`, `content`, `image`, `categoryid`, `articleType`, `highlight`, `file`, `created_date`, `expired_date`, `posted_date`, `authorid`, `n_status`) VALUES
(1, 'About', 'Citizen Science Solution For National Biodiversity Data Needs', '&lt;h5&gt;Developing a Plant checklist for West Kalimantan, Indonesia.&lt;/h5&gt;\r\n\r\n&lt;p&gt;Software and Tools developments. Data acquisition and collection tools, social network, research log using mobile devices and digital reference library that has interoperability feature. Capacity building. Intensive training courses (2 locations), and CodeCamp for botanists and computer scientists. Expedition. 15 days expeditions and data will be uploaded and integrated directly. Participants will be equipped with digital camera, netbook and wireless internet connection. Data match and validation. Photographs and data will be matched by technicians at the national herbarium via the developed system. Much of Indonesia&amp;#39;s biodivesrity may be lost forever before it is ever recorded&lt;/p&gt;', '', 2, 0, 0, '', '2015-06-19 22:16:46', '0000-00-00 00:00:00', '2015-06-20 00:00:00', 1, 1),
(2, 'Workshop PEER Flora Kalbar', '', '', '6bf0d1e1ebb0885ec8ad83338e3090ab.JPG', 9, 1, 0, 'http://localhost/biodiv-checklist-portal/public_assets/gallery/images/6bf0d1e1ebb0885ec8ad83338e3090ab.JPG', '2015-06-19 22:42:09', '0000-00-00 00:00:00', '2015-06-19 22:42:09', 0, 1),
(3, 'Workflow - Batch Upload', 'Workflow - Batch Upload', '&lt;h5&gt;Langkah-langkah dalam Batch Upload&lt;/h5&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;Jalankan aplikasi FTP seperti FileZilla&lt;/li&gt;\r\n	&lt;li&gt;Login dengan Username dan Password yang sama dengan Anda login ke dalam situs flora-kalbar.info&lt;/li&gt;\r\n	&lt;li&gt;Upload file zip Anda ke dalam folder ZIP_FILES_HERE&lt;/li&gt;\r\n	&lt;li&gt;Jika langkah 1-3 telah dilakukan, klik tombol Lanjut.&lt;/li&gt;\r\n&lt;/ol&gt;', '', 3, 1, 0, '', '2015-06-20 21:40:34', '0000-00-00 00:00:00', '2015-06-21 00:00:00', 1, 1),
(4, 'Workflow - One by One', 'Workflow - One by One', '', '', 3, 2, 0, '', '2015-06-20 21:41:37', '0000-00-00 00:00:00', '2015-06-21 00:00:00', 1, 1),
(5, 'Kartika Website', 'http://www.kds.my.id', '', 'b5e29c5cd093847311063b15a605282d.jpg', 4, 0, 0, 'http://localhost/biodiv-checklist-portal/public_assets/digirepo/linksIcon/b5e29c5cd093847311063b15a605282d.jpg', '2015-06-21 19:44:28', '0000-00-00 00:00:00', '2015-06-22 00:00:00', 1, 1),
(7, 'Test', '', '', 'ed55119919c7c9bb40a9a439b104cf71.jpg', 9, 1, 0, 'http://localhost/biodiv-checklist-portal/public_assets/gallery/images/ed55119919c7c9bb40a9a439b104cf71.jpg', '2015-06-21 23:00:57', '0000-00-00 00:00:00', '2015-06-22 18:21:38', 0, 1),
(9, 'asddd', '', '', '2289be5edf3c9d7fde191484ab7cbd9e.JPG', 9, 1, 0, 'http://localhost/biodiv-checklist-portal/public_assets/gallery/images/2289be5edf3c9d7fde191484ab7cbd9e.JPG', '2015-06-21 23:04:11', '0000-00-00 00:00:00', '2015-06-22 22:00:32', 0, 1),
(10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent odio leo, consequat sit amet massa quis, elementum laoreet ligula. Duis at nisi a ante congue sodales vel quis arcu. Quisque quis pharetra nisi.', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent odio leo, consequat sit amet massa quis, elementum laoreet ligula. Duis at nisi a ante congue sodales vel quis arcu. Quisque quis pharetra nisi. Nullam nec vestibulum sem, luctus tincidunt diam. Cras ac vestibulum nunc, egestas malesuada erat. Suspendisse ac urna ac quam rutrum lacinia vel dictum enim. Pellentesque eu turpis vel lectus maximus porta in a velit. Nunc non mollis leo, non pharetra eros. Sed viverra auctor nulla in commodo.&lt;/p&gt;\r\n\r\n&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent odio leo, consequat sit amet massa quis, elementum laoreet ligula. Duis at nisi a ante congue sodales vel quis arcu. Quisque quis pharetra nisi. Nullam nec vestibulum sem, luctus tincidunt diam. Cras ac vestibulum nunc, egestas malesuada erat. Suspendisse ac urna ac quam rutrum lacinia vel dictum enim. Pellentesque eu turpis vel lectus maximus porta in a velit. Nunc non mollis leo, non pharetra eros. Sed viverra auctor nulla in commodo.&lt;/p&gt;\r\n\r\n&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent odio leo, consequat sit amet massa quis, elementum laoreet ligula. Duis at nisi a ante congue sodales vel quis arcu. Quisque quis pharetra nisi. Nullam nec vestibulum sem, luctus tincidunt diam. Cras ac vestibulum nunc, egestas malesuada erat. Suspendisse ac urna ac quam rutrum lacinia vel dictum enim. Pellentesque eu turpis vel lectus maximus porta in a velit. Nunc non mollis leo, non pharetra eros. Sed viverra auctor nulla in commodo.&lt;/p&gt;', 'fae79852a1fa79457592463fa17f572b.jpg', 1, 0, 1, 'http://localhost/biodiv-checklist-portal/public_assets/news/fae79852a1fa79457592463fa17f572b.jpg', '2015-06-22 21:34:13', '0000-00-00 00:00:00', '2015-06-23 00:00:00', 1, 1),
(11, 'Suspendisse pharetra ac ex laoreet interdum', 'Suspendisse pharetra ac ex laoreet interdum. Maecenas maximus velit et nulla laoreet, non vehicula lectus volutpat. Fusce ac pellentesque ante.', '&lt;p&gt;Suspendisse pharetra ac ex laoreet interdum. Maecenas maximus velit et nulla laoreet, non vehicula lectus volutpat. Fusce ac pellentesque ante. In sagittis quis urna faucibus sodales. Nunc sapien diam, suscipit a suscipit quis, ultrices vel mauris. Cras eget metus leo. Fusce purus tortor, imperdiet sed gravida eget, egestas nec est. Suspendisse eu velit sodales, dictum dui quis, mattis nibh. Nunc in mi mauris. Donec aliquam vitae enim vitae iaculis. Sed consectetur rhoncus elit, non placerat enim lobortis nec. Nam ex elit, consectetur vel commodo ut, commodo a metus. Duis consectetur eget magna nec vulputate. Cras posuere gravida elit, vitae congue ipsum sodales nec.&lt;/p&gt;\r\n\r\n&lt;p&gt;Suspendisse pharetra ac ex laoreet interdum. Maecenas maximus velit et nulla laoreet, non vehicula lectus volutpat. Fusce ac pellentesque ante. In sagittis quis urna faucibus sodales. Nunc sapien diam, suscipit a suscipit quis, ultrices vel mauris. Cras eget metus leo. Fusce purus tortor, imperdiet sed gravida eget, egestas nec est. Suspendisse eu velit sodales, dictum dui quis, mattis nibh. Nunc in mi mauris. Donec aliquam vitae enim vitae iaculis. Sed consectetur rhoncus elit, non placerat enim lobortis nec. Nam ex elit, consectetur vel commodo ut, commodo a metus. Duis consectetur eget magna nec vulputate. Cras posuere gravida elit, vitae congue ipsum sodales nec.&lt;/p&gt;\r\n\r\n&lt;p&gt;Suspendisse pharetra ac ex laoreet interdum. Maecenas maximus velit et nulla laoreet, non vehicula lectus volutpat. Fusce ac pellentesque ante. In sagittis quis urna faucibus sodales. Nunc sapien diam, suscipit a suscipit quis, ultrices vel mauris. Cras eget metus leo. Fusce purus tortor, imperdiet sed gravida eget, egestas nec est. Suspendisse eu velit sodales, dictum dui quis, mattis nibh. Nunc in mi mauris. Donec aliquam vitae enim vitae iaculis. Sed consectetur rhoncus elit, non placerat enim lobortis nec. Nam ex elit, consectetur vel commodo ut, commodo a metus. Duis consectetur eget magna nec vulputate. Cras posuere gravida elit, vitae congue ipsum sodales nec.&lt;/p&gt;', 'a6215a3d01fa2bb8023bc432d1ff5f8a.jpg', 1, 0, 0, 'http://localhost/biodiv-checklist-portal/public_assets/news/a6215a3d01fa2bb8023bc432d1ff5f8a.jpg', '2015-06-22 21:34:47', '0000-00-00 00:00:00', '2015-06-23 00:00:00', 1, 1),
(12, 'Curabitur mattis facilisis nisl ac porta', 'Curabitur mattis facilisis nisl ac porta. Etiam ornare dui a condimentum rutrum. Nam iaculis ornare mattis. Suspendisse lorem lorem, placerat in ullamcorper eu, feugiat et lorem.', '&lt;p&gt;Curabitur mattis facilisis nisl ac porta. Etiam ornare dui a condimentum rutrum. Nam iaculis ornare mattis. Suspendisse lorem lorem, placerat in ullamcorper eu, feugiat et lorem. Praesent urna dolor, elementum quis purus venenatis, condimentum dignissim dui. Curabitur vitae placerat purus. Fusce vel orci tellus. Aliquam erat volutpat. Morbi vitae bibendum quam. Duis fringilla dolor vitae nibh convallis bibendum. Cras varius est ac odio sodales aliquam. Fusce pellentesque iaculis risus, vel venenatis diam laoreet pretium. Donec vitae fringilla metus. Integer a ante accumsan, malesuada lacus et, congue felis. Maecenas ut tellus sodales, consectetur neque ac, faucibus elit. Etiam commodo dui ut ex suscipit, ut aliquam odio pellentesque.&lt;/p&gt;\r\n\r\n&lt;p&gt;Curabitur mattis facilisis nisl ac porta. Etiam ornare dui a condimentum rutrum. Nam iaculis ornare mattis. Suspendisse lorem lorem, placerat in ullamcorper eu, feugiat et lorem. Praesent urna dolor, elementum quis purus venenatis, condimentum dignissim dui. Curabitur vitae placerat purus. Fusce vel orci tellus. Aliquam erat volutpat. Morbi vitae bibendum quam. Duis fringilla dolor vitae nibh convallis bibendum. Cras varius est ac odio sodales aliquam. Fusce pellentesque iaculis risus, vel venenatis diam laoreet pretium. Donec vitae fringilla metus. Integer a ante accumsan, malesuada lacus et, congue felis. Maecenas ut tellus sodales, consectetur neque ac, faucibus elit. Etiam commodo dui ut ex suscipit, ut aliquam odio pellentesque.&lt;/p&gt;\r\n\r\n&lt;p&gt;Curabitur mattis facilisis nisl ac porta. Etiam ornare dui a condimentum rutrum. Nam iaculis ornare mattis. Suspendisse lorem lorem, placerat in ullamcorper eu, feugiat et lorem. Praesent urna dolor, elementum quis purus venenatis, condimentum dignissim dui. Curabitur vitae placerat purus. Fusce vel orci tellus. Aliquam erat volutpat. Morbi vitae bibendum quam. Duis fringilla dolor vitae nibh convallis bibendum. Cras varius est ac odio sodales aliquam. Fusce pellentesque iaculis risus, vel venenatis diam laoreet pretium. Donec vitae fringilla metus. Integer a ante accumsan, malesuada lacus et, congue felis. Maecenas ut tellus sodales, consectetur neque ac, faucibus elit. Etiam commodo dui ut ex suscipit, ut aliquam odio pellentesque.&lt;/p&gt;', '56206105125efdcb3fe783f019b43090.jpg', 1, 0, 0, 'http://localhost/biodiv-checklist-portal/public_assets/news/56206105125efdcb3fe783f019b43090.jpg', '2015-06-22 21:49:40', '0000-00-00 00:00:00', '2015-06-23 00:00:00', 1, 1),
(13, 'Aenean cursus augue in efficitur consequat', 'Aenean cursus augue in efficitur consequat. Quisque hendrerit nulla sem, at maximus risus viverra non. Vestibulum vitae velit ante.', '&lt;p&gt;Aenean cursus augue in efficitur consequat. Quisque hendrerit nulla sem, at maximus risus viverra non. Vestibulum vitae velit ante. Maecenas sed mi iaculis, tempor nibh vel, tempor libero. Praesent nisl lacus, finibus quis justo sed, iaculis volutpat ex. In tincidunt aliquam varius. Etiam convallis ullamcorper tristique. Aliquam lacinia condimentum nisl, ut suscipit eros sollicitudin non.&lt;/p&gt;\r\n\r\n&lt;p&gt;Aenean cursus augue in efficitur consequat. Quisque hendrerit nulla sem, at maximus risus viverra non. Vestibulum vitae velit ante. Maecenas sed mi iaculis, tempor nibh vel, tempor libero. Praesent nisl lacus, finibus quis justo sed, iaculis volutpat ex. In tincidunt aliquam varius. Etiam convallis ullamcorper tristique. Aliquam lacinia condimentum nisl, ut suscipit eros sollicitudin non.&lt;/p&gt;\r\n\r\n&lt;p&gt;Aenean cursus augue in efficitur consequat. Quisque hendrerit nulla sem, at maximus risus viverra non. Vestibulum vitae velit ante. Maecenas sed mi iaculis, tempor nibh vel, tempor libero. Praesent nisl lacus, finibus quis justo sed, iaculis volutpat ex. In tincidunt aliquam varius. Etiam convallis ullamcorper tristique. Aliquam lacinia condimentum nisl, ut suscipit eros sollicitudin non.&lt;/p&gt;', 'b9e320cae44ce762bed72e618c6beabf.JPG', 1, 1, 1, 'http://localhost/biodiv-checklist-portal/public_assets/news/b9e320cae44ce762bed72e618c6beabf.JPG', '2015-06-22 21:50:29', '0000-00-00 00:00:00', '2015-06-23 00:00:00', 1, 1),
(14, 'Aliquam porta ligula velit, at convallis leo ultricies ac', 'Aliquam porta ligula velit, at convallis leo ultricies ac. Maecenas a varius eros. Nulla posuere sagittis nisl vitae eleifend. Nulla pretium dui ut massa ullamcorper, ut dignissim sem auctor.', '&lt;p&gt;Aliquam porta ligula velit, at convallis leo ultricies ac. Maecenas a varius eros. Nulla posuere sagittis nisl vitae eleifend. Nulla pretium dui ut massa ullamcorper, ut dignissim sem auctor. Quisque vitae mauris feugiat, fringilla mauris nec, volutpat enim. Nam tempor mollis arcu et pellentesque. Quisque id eros eu metus pharetra blandit. Nullam nec ligula blandit, scelerisque lectus in, tincidunt metus. Mauris consectetur purus et commodo viverra.&lt;/p&gt;\r\n\r\n&lt;p&gt;Aliquam porta ligula velit, at convallis leo ultricies ac. Maecenas a varius eros. Nulla posuere sagittis nisl vitae eleifend. Nulla pretium dui ut massa ullamcorper, ut dignissim sem auctor. Quisque vitae mauris feugiat, fringilla mauris nec, volutpat enim. Nam tempor mollis arcu et pellentesque. Quisque id eros eu metus pharetra blandit. Nullam nec ligula blandit, scelerisque lectus in, tincidunt metus. Mauris consectetur purus et commodo viverra.&lt;/p&gt;\r\n\r\n&lt;p&gt;Aliquam porta ligula velit, at convallis leo ultricies ac. Maecenas a varius eros. Nulla posuere sagittis nisl vitae eleifend. Nulla pretium dui ut massa ullamcorper, ut dignissim sem auctor. Quisque vitae mauris feugiat, fringilla mauris nec, volutpat enim. Nam tempor mollis arcu et pellentesque. Quisque id eros eu metus pharetra blandit. Nullam nec ligula blandit, scelerisque lectus in, tincidunt metus. Mauris consectetur purus et commodo viverra.&lt;/p&gt;', '2f6f6f9a0dd71fd275d5ecf3c1fdabac.JPG', 1, 1, 0, 'http://localhost/biodiv-checklist-portal/public_assets/news/2f6f6f9a0dd71fd275d5ecf3c1fdabac.JPG', '2015-06-22 22:19:04', '0000-00-00 00:00:00', '2015-06-23 00:00:00', 1, 1),
(15, 'Duis at nisi a ante congue sodales vel quis arcu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent odio leo, consequat sit amet massa quis, elementum laoreet ligula. Duis at nisi a ante congue sodales vel quis arcu. Quisque quis pharetra nisi.', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent odio leo, consequat sit amet massa quis, elementum laoreet ligula. Duis at nisi a ante congue sodales vel quis arcu. Quisque quis pharetra nisi. Nullam nec vestibulum sem, luctus tincidunt diam. Cras ac vestibulum nunc, egestas malesuada erat. Suspendisse ac urna ac quam rutrum lacinia vel dictum enim. Pellentesque eu turpis vel lectus maximus porta in a velit. Nunc non mollis leo, non pharetra eros. Sed viverra auctor nulla in commodo.&lt;/p&gt;\r\n\r\n&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent odio leo, consequat sit amet massa quis, elementum laoreet ligula. Duis at nisi a ante congue sodales vel quis arcu. Quisque quis pharetra nisi. Nullam nec vestibulum sem, luctus tincidunt diam. Cras ac vestibulum nunc, egestas malesuada erat. Suspendisse ac urna ac quam rutrum lacinia vel dictum enim. Pellentesque eu turpis vel lectus maximus porta in a velit. Nunc non mollis leo, non pharetra eros. Sed viverra auctor nulla in commodo.&lt;/p&gt;\r\n\r\n&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent odio leo, consequat sit amet massa quis, elementum laoreet ligula. Duis at nisi a ante congue sodales vel quis arcu. Quisque quis pharetra nisi. Nullam nec vestibulum sem, luctus tincidunt diam. Cras ac vestibulum nunc, egestas malesuada erat. Suspendisse ac urna ac quam rutrum lacinia vel dictum enim. Pellentesque eu turpis vel lectus maximus porta in a velit. Nunc non mollis leo, non pharetra eros. Sed viverra auctor nulla in commodo.&lt;/p&gt;', '393da6c0374e9892fb5c0ef35e0d0bb3.JPG', 1, 1, 0, 'http://localhost/biodiv-checklist-portal/public_assets/news/393da6c0374e9892fb5c0ef35e0d0bb3.JPG', '2015-06-22 22:20:06', '0000-00-00 00:00:00', '2015-06-23 00:00:00', 1, 1),
(16, 'Fusce vel orci tellus. Aliquam erat volutpat', 'Fusce vel orci tellus. Aliquam erat volutpat. Morbi vitae bibendum quam. Duis fringilla dolor vitae nibh convallis bibendum. Cras varius est ac odio sodales aliquam. Fusce pellentesque iaculis risus, vel venenatis diam laoreet pretium.', '&lt;p&gt;Curabitur mattis facilisis nisl ac porta. Etiam ornare dui a condimentum rutrum. Nam iaculis ornare mattis. Suspendisse lorem lorem, placerat in ullamcorper eu, feugiat et lorem. Praesent urna dolor, elementum quis purus venenatis, condimentum dignissim dui. Curabitur vitae placerat purus. Fusce vel orci tellus. Aliquam erat volutpat. Morbi vitae bibendum quam. Duis fringilla dolor vitae nibh convallis bibendum. Cras varius est ac odio sodales aliquam. Fusce pellentesque iaculis risus, vel venenatis diam laoreet pretium. Donec vitae fringilla metus. Integer a ante accumsan, malesuada lacus et, congue felis. Maecenas ut tellus sodales, consectetur neque ac, faucibus elit. Etiam commodo dui ut ex suscipit, ut aliquam odio pellentesque.&lt;/p&gt;', '623617dcf461436014d5443313ea7982.jpg', 1, 0, 0, 'http://localhost/biodiv-checklist-portal/public_assets/news/623617dcf461436014d5443313ea7982.jpg', '2015-06-22 23:28:39', '0000-00-00 00:00:00', '2015-06-24 00:00:00', 1, 1),
(17, 'asd', '', '', '', 1, 0, 0, '', '2015-06-23 11:20:48', '0000-00-00 00:00:00', '2015-06-23 00:00:00', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `floraINA_news_content_repo`
--

INSERT INTO `floraINA_news_content_repo` (`id`, `title`, `brief`, `content`, `typealbum`, `gallerytype`, `files`, `thumbnail`, `fromwho`, `otherid`, `userid`, `created_date`, `n_status`) VALUES
(1, '', '', 'ba94d90789eb7b586fc33a78ff6e9610.JPG', 2, 9, 'http://localhost/biodiv-checklist-portal/public_assets/gallery/images/ba94d90789eb7b586fc33a78ff6e9610.JPG', '', 0, 2, 0, '2015-06-19 22:42:36', 1),
(2, '', '', '651399b1cfd0cc75ebafb95eb6efdbb2.JPG', 2, 9, 'http://localhost/biodiv-checklist-portal/public_assets/gallery/images/651399b1cfd0cc75ebafb95eb6efdbb2.JPG', '', 0, 2, 0, '2015-06-19 22:42:36', 1),
(3, '', '', '36fa2fba1f4cf3ccb7087864175a2226.JPG', 2, 9, 'http://localhost/biodiv-checklist-portal/public_assets/gallery/images/36fa2fba1f4cf3ccb7087864175a2226.JPG', '', 0, 2, 0, '2015-06-19 22:42:36', 1),
(4, '', '', 'f7ecf1958e768bac68efd77c0c849cc6.JPG', 2, 9, 'http://localhost/biodiv-checklist-portal/public_assets/gallery/images/f7ecf1958e768bac68efd77c0c849cc6.JPG', '', 0, 2, 0, '2015-06-19 22:42:36', 1),
(5, '', '', 'f1f936889528ee63da959a59c93b757f.JPG', 2, 9, 'http://localhost/biodiv-checklist-portal/public_assets/gallery/images/f1f936889528ee63da959a59c93b757f.JPG', '', 0, 2, 0, '2015-06-19 22:42:37', 1),
(6, '', '', 'b46e4bf6118a945d810db2a93c3b7dba.JPG', 2, 9, 'http://localhost/biodiv-checklist-portal/public_assets/gallery/images/b46e4bf6118a945d810db2a93c3b7dba.JPG', '', 0, 2, 0, '2015-06-19 22:42:37', 1),
(7, '', '', 'e0de9ca942fddcafb893050014ba819f.JPG', 2, 9, 'http://localhost/biodiv-checklist-portal/public_assets/gallery/images/e0de9ca942fddcafb893050014ba819f.JPG', '', 0, 2, 0, '2015-06-19 22:42:37', 1),
(8, '', '', '84f7d3787afb0d73733d92212c2bdafc.JPG', 2, 9, 'http://localhost/biodiv-checklist-portal/public_assets/gallery/images/84f7d3787afb0d73733d92212c2bdafc.JPG', '', 0, 2, 0, '2015-06-19 22:42:37', 1),
(9, '', '', 'eefba3c2ae1316c7f995b71998f7af74.JPG', 2, 9, 'http://localhost/biodiv-checklist-portal/public_assets/gallery/images/eefba3c2ae1316c7f995b71998f7af74.JPG', '', 0, 2, 0, '2015-06-19 22:42:37', 1),
(10, '', '', '3757ff1bcca5a1b9495921d92a6fe592.JPG', 2, 9, 'http://localhost/biodiv-checklist-portal/public_assets/gallery/images/3757ff1bcca5a1b9495921d92a6fe592.JPG', '', 0, 2, 0, '2015-06-19 22:42:37', 1),
(11, '', '', '530e06fa24de6e658058b3c4fd6cca07.JPG', 2, 9, 'http://localhost/biodiv-checklist-portal/public_assets/gallery/images/530e06fa24de6e658058b3c4fd6cca07.JPG', '', 0, 2, 0, '2015-06-19 22:42:37', 1),
(12, '', '', '53ef28e6bfe4f8db5ead73965672a661.JPG', 2, 9, 'http://localhost/biodiv-checklist-portal/public_assets/gallery/images/53ef28e6bfe4f8db5ead73965672a661.JPG', '', 0, 2, 0, '2015-06-19 22:42:37', 1),
(13, '', '', '4330692112506d70c7af14559b8b4a89.JPG', 2, 9, 'http://localhost/biodiv-checklist-portal/public_assets/gallery/images/4330692112506d70c7af14559b8b4a89.JPG', '', 0, 2, 0, '2015-06-19 22:42:37', 1),
(14, '', '', '7377a7fed4d61525c800ecf88565c07f.JPG', 2, 9, 'http://localhost/biodiv-checklist-portal/public_assets/gallery/images/7377a7fed4d61525c800ecf88565c07f.JPG', '', 0, 2, 0, '2015-06-19 22:42:37', 1),
(15, '', '', '39b6a12cd29a325ad3c29daa90754d65.JPG', 2, 9, 'http://localhost/biodiv-checklist-portal/public_assets/gallery/images/39b6a12cd29a325ad3c29daa90754d65.JPG', '', 0, 2, 0, '2015-06-19 22:42:37', 1),
(16, '', '', 'ce23da74dfe2da4fcdbc2d5a691856dc.JPG', 2, 9, 'http://localhost/biodiv-checklist-portal/public_assets/gallery/images/ce23da74dfe2da4fcdbc2d5a691856dc.JPG', '', 0, 2, 0, '2015-06-19 22:42:37', 1),
(17, '', '', 'd27c9746d7e286a8e83cc21e2f31d436.JPG', 2, 9, 'http://localhost/biodiv-checklist-portal/public_assets/gallery/images/d27c9746d7e286a8e83cc21e2f31d436.JPG', '', 0, 2, 0, '2015-06-19 22:42:37', 1),
(18, '', '', '05dd2252985a261f2563a9ea6945242a.JPG', 2, 9, 'http://localhost/biodiv-checklist-portal/public_assets/gallery/images/05dd2252985a261f2563a9ea6945242a.JPG', '', 0, 2, 0, '2015-06-19 22:42:37', 1),
(19, '', '', 'a5171df795ce0d0aa014e5547268d2b4.JPG', 2, 9, 'http://localhost/biodiv-checklist-portal/public_assets/gallery/images/a5171df795ce0d0aa014e5547268d2b4.JPG', '', 0, 2, 0, '2015-06-19 22:42:37', 1),
(20, '', '', '20c404bebbb5962561fd785b41beb4af.JPG', 2, 9, 'http://localhost/biodiv-checklist-portal/public_assets/gallery/images/20c404bebbb5962561fd785b41beb4af.JPG', '', 0, 2, 0, '2015-06-19 22:42:37', 1);

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
-- Indexes for table `floraINA_banner`
--
ALTER TABLE `floraINA_banner`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `floraINA_digirepo`
--
ALTER TABLE `floraINA_digirepo`
 ADD PRIMARY KEY (`id`), ADD KEY `otherid` (`authorid`);

--
-- Indexes for table `floraINA_digirepo_events`
--
ALTER TABLE `floraINA_digirepo_events`
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
-- Indexes for table `floraINA_video`
--
ALTER TABLE `floraINA_video`
 ADD PRIMARY KEY (`id`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `floraINA_digirepo`
--
ALTER TABLE `floraINA_digirepo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `floraINA_digirepo_events`
--
ALTER TABLE `floraINA_digirepo_events`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `floraINA_news_category`
--
ALTER TABLE `floraINA_news_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `floraINA_news_content`
--
ALTER TABLE `floraINA_news_content`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `floraINA_news_content_repo`
--
ALTER TABLE `floraINA_news_content_repo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `floraINA_video`
--
ALTER TABLE `floraINA_video`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
