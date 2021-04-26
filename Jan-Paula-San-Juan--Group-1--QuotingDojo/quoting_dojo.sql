-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 26, 2021 at 07:21 PM
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
-- Database: `quoting_dojo`
--

-- --------------------------------------------------------

--
-- Table structure for table `name_to_quote`
--

DROP TABLE IF EXISTS `name_to_quote`;
CREATE TABLE IF NOT EXISTS `name_to_quote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `quote` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `name_to_quote`
--

INSERT INTO `name_to_quote` (`id`, `name`, `quote`, `created_at`, `updated_at`) VALUES
(1, 'Jana', 'Ohayou minna!!!!', '2021-04-27 00:40:15', '2021-04-27 00:40:15'),
(2, 'Dio Brando', 'Pucci, Do you believe in gravity?', '2021-04-27 02:22:24', '2021-04-27 02:22:24'),
(3, 'Father Enrico Pucci', 'Yes, my beloved Dio!', '2021-04-27 02:27:35', '2021-04-27 02:27:35'),
(4, 'Sister Hot Pants Pucci', 'Diego, I know all about your life and I can find where your father is with the help of the Vatican in exchange of the corpse parts of the holy saint. Deal?', '2021-04-27 02:34:27', '2021-04-27 02:34:27'),
(5, 'Diego Brando!', 'Deal! It was nice kissing you, Hot Pants! Also, it seems that you are a priest in an alternate universe. Remember that we should avoid our alternate universe counterparts at all costs.', '2021-04-27 02:39:05', '2021-04-27 02:39:05'),
(6, 'Jana', 'Pucci, can I kiss your lord Dio?', '2021-04-27 02:59:41', '2021-04-27 02:59:41'),
(7, 'Father Enrico Pucci', 'Jana, no. Dio is mine!', '2021-04-27 03:06:35', '2021-04-27 03:06:35'),
(8, 'Sister Hot Pants Pucci', 'Jana, remember that I\'ve already kissed Diego and we\'re going to date after our battle against President Funny Valentine', '2021-04-27 03:09:20', '2021-04-27 03:09:20'),
(9, 'Diego Brando!', 'You can kiss me, Jana! Dinosaurs are much cuter than vampires! Ushaaaa!!!! Wrrryyyyyyy!!!!', '2021-04-27 03:11:25', '2021-04-27 03:11:25'),
(10, 'Dio Brando', 'Jana, I can let you kiss me as I drink your blood. A vampire like me is much sexier than someone who becomes a dinosaur. Muda muda!!!! Wrrryyyyyy!!!!', '2021-04-27 03:13:36', '2021-04-27 03:13:36'),
(11, 'Jotaro Kujo', 'Shut up, b***h!!!! Give me a break.', '2021-04-27 03:14:30', '2021-04-27 03:14:30'),
(12, 'Robert E.O. Speedwagon', 'Jotaro, welcome to JoJo\'s Bizarre Adventure!', '2021-04-27 03:15:36', '2021-04-27 03:15:36'),
(13, 'Jean Pierre Polnareff', 'Sir Jotaro Kujo and the Passione gang,, thanks for helping me build the Polnareffland today!', '2021-04-27 03:18:04', '2021-04-27 03:18:04');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
