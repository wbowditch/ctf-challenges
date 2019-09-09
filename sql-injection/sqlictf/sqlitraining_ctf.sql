-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2013 at 08:57 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bank`
--
CREATE DATABASE IF NOT EXISTS `bankdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bankdb`;

-- --------------------------------------------------------

--
-- Table structure for table `diskinfo`
--

-- DROP TABLE IF EXISTS `diskinfo`;
-- CREATE TABLE IF NOT EXISTS `diskinfo` (
--   `filename` varchar(100) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --
-- -- Dumping data for table `diskinfo`
-- --

-- INSERT INTO `diskinfo` (`filename`) VALUES
-- ('/var/www/localhost/htdocs/2ccc3f12eb2d6a963094fedf6cdb5f28/flagflagflag.txt');

-- -- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `flag` varchar(100) NOT NULL,
  `is_admin` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `flag`, `is_admin`) VALUES
(1, 'trump', '9f9d51bc70ef21ca5c14f307980a29d8', 'not here', 'no'),
(2, 'johnson', '5470442b7888438730139c8277be0b3c', 'nope', 'no'),
(3, 'elizabeth', '67f2a835697e7c9c2c5146c76eca6038','lol sorry','no'),
(4, 'kim', 'fe6578b055b08e32421df1f301362844', 'fresher{supr3m3_l3ad3r}', 'yes');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
