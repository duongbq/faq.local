-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 25, 2014 at 05:22 PM
-- Server version: 5.5.34
-- PHP Version: 5.4.24-1+sury.org~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `faq.local`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `title` text NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `content` text NOT NULL,
  `origin_id` int(11) NOT NULL DEFAULT '0',
  `lang` varchar(45) NOT NULL DEFAULT 'english',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `total_view` int(11) NOT NULL DEFAULT '0',
  `total_vote` int(11) NOT NULL DEFAULT '0',
  `voted_point` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `title`, `meta_description`, `meta_keywords`, `content`, `origin_id`, `lang`, `updated_at`, `total_view`, `total_vote`, `voted_point`) VALUES
(1, 1, 'Welcome!', '', '', '', 0, 'english', '2014-02-16 17:00:00', 40, 10, 19),
(2, 1, 'What can I do if I experience...', '', '', '', 0, 'english', '2014-02-16 17:00:00', 14, 3, 8),
(3, 1, 'How to open an Social Trade ...', '', '', '', 0, 'english', '2014-02-16 17:00:00', 5, 3, 8),
(4, 1, 'What if I forget my...', '', '', '', 0, 'english', '2014-02-16 17:00:00', 6, 1, 4),
(5, 1, 'How do I unlink my...', '', '', '', 0, 'english', '2014-02-16 17:00:00', 6, 1, 4),
(6, 2, 'What is LOVE?', '', '', 'Don''t hurt me!!!!', 0, 'english', '2014-02-16 17:00:00', 0, 0, 0),
(7, 4, 'Tình là gì?', '', '', 'HỎi thể gian tình là gì? ', 6, 'vietnamese', '2014-02-16 17:00:00', 10, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `articles_tags`
--

CREATE TABLE IF NOT EXISTS `articles_tags` (
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`article_id`,`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `origin_id` int(11) NOT NULL DEFAULT '0',
  `lang` varchar(45) NOT NULL DEFAULT 'english',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `origin_id`, `lang`) VALUES
(1, 'Genaral Help', 0, 'english'),
(2, 'Products', 0, 'english'),
(3, 'Trợ giúp tổng quan', 1, 'vietnamese'),
(4, 'Sản phẩm ', 2, 'vietnamese');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
