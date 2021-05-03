-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 03, 2021 at 07:39 PM
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
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `created_at`, `updated_at`, `user_id`, `message_id`) VALUES
(2, 'I\'m going to insult your hair, Josuke!', '2021-05-04 00:03:50', '2021-05-04 00:03:50', 2, 1),
(4, 'You\'re really having a romantic date with your hair, huh?', '2021-05-04 02:14:23', '2021-05-04 02:14:23', 2, 3),
(5, 'Crazy Diamond!!!!', '2021-05-04 03:06:09', '2021-05-04 03:06:09', 1, 2),
(6, 'I\'m going to insult your hair, Josuke!', '2021-05-04 03:29:29', '2021-05-04 03:29:29', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `created_at`, `updated_at`, `user_id`) VALUES
(5, 'I love my hair!!!!', '2021-05-04 03:25:49', '2021-05-04 03:25:49', 1),
(6, 'I\'m cute!!!', '2021-05-04 03:25:58', '2021-05-04 03:25:58', 1),
(7, 'I\'m fabulous!!!!', '2021-05-04 03:28:24', '2021-05-04 03:28:24', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `salt`, `created_at`, `updated_at`) VALUES
(1, 'Josuke', 'Higashikata', 'josuke@jojo.com', 'aa46ca184f85c7e55fcfc36a027df48c', 'ad04715c7cfa31068e9f02aaa5b89b0635dafe4e4a24', '2021-04-30 21:48:44', '2021-04-30 21:48:44'),
(2, 'Rohan', 'Kishibe', 'rohan@jojo.com', 'aa3ee23d75d97b89354941e40950537a', '996a6101df99a9f45e12ace28ef9cff32fd03f5b551f', '2021-04-30 23:27:33', '2021-04-30 23:27:33');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
