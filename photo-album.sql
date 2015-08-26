-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 17, 2014 at 05:26 AM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `photo-album`
--

-- --------------------------------------------------------

--
-- Table structure for table `image-info`
--

CREATE TABLE IF NOT EXISTS `image-info` (
  `image_id` int(12) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(120) NOT NULL,
  `image_src` varchar(120) NOT NULL,
  `user_id` int(12) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `image-info`
--

INSERT INTO `image-info` (`image_id`, `image_name`, `image_src`, `user_id`) VALUES
(2, 'test-2.jpg', '', 2),
(5, 'product-2-1.jpg', 'product-2-1.jpg', 1),
(4, 'pinky-star-racer.png', 'pinky-star-racer.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user-info`
--

CREATE TABLE IF NOT EXISTS `user-info` (
  `user_id` int(8) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_type` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `activate_code` varchar(40) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `user-info`
--

INSERT INTO `user-info` (`user_id`, `user_email`, `user_password`, `user_type`, `is_active`, `activate_code`) VALUES
(1, 'dev@photoalbum.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 1, ''),
(2, 'admin@dev.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, ''),
(3, 'a@a.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, ''),
(4, 'a@photoalbum.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, ''),
(5, 'admin1@dev.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, ''),
(6, 'admin2@dev.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, ''),
(7, 'admin2@dev.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, ''),
(8, 'admin3@dev.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, ''),
(9, 'aw@w.com', 'fcea920f7412b5da7be0cf42b8c93759', 0, 0, ''),
(10, 'aw1@w.com', '617e1d9ab8e80f3017e77b35534719db', 0, 0, ''),
(11, 'aw2@w.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, ''),
(12, 'aw4@w.com', '2467d3744600858cc9026d5ac6005305', 0, 0, ''),
(13, 'aw5@w.com', '228bbc2f87caeb21bb7f6949fddcb91d', 0, 0, ''),
(14, 'aw34@w.com', '149815eb972b3c370dee3b89d645ae14', 0, 0, ''),
(15, 'aw32@w.com', '149815eb972b3c370dee3b89d645ae14', 0, 0, ''),
(16, 'www32@w.com', '1365ffade9f5af7deaa2856389c966f4', 0, 0, ''),
(17, 'wewe32@w.com', '1365ffade9f5af7deaa2856389c966f4', 0, 0, ''),
(18, 'wqqwe32@w.com', 'b2ca678b4c936f905fb82f2733f5297f', 0, 0, ''),
(19, 'erqwe32@w.com', '2467d3744600858cc9026d5ac6005305', 0, 0, ''),
(20, 'wwe32@w.com', '7a12a47984333222320df4510947fbdd', 0, 0, ''),
(21, 'wtwe32@w.com', '1365ffade9f5af7deaa2856389c966f4', 0, 0, ''),
(22, '22we32@w.com', 'eac93fc0e5bfbe34e7ec3ab68738f26e', 0, 0, ''),
(23, '434we32@w.com', '5f6eb0809f31e88067e51bfd2bb0c50e', 0, 0, 'kjv04q6dyo8ewhfuzn5i2b179r3agmpxcstl');
