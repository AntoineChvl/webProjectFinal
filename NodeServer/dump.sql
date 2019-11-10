-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 10, 2019 at 06:02 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetwebcentral`
--

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

DROP TABLE IF EXISTS `campus`;
CREATE TABLE IF NOT EXISTS `campus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL DEFAULT '0.0.0.0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`id`, `location`, `ip`) VALUES
(1, 'Brest', '0.0.0.0'),
(2, 'Caen', '0.0.0.0'),
(3, 'Rouen', '0.0.0.0'),
(4, 'Arras', '0.0.0.0'),
(5, 'Lille', '0.0.0.0'),
(6, 'Reims', '0.0.0.0'),
(7, 'Saint-Nazaire', '0.0.0.0'),
(8, 'Nantes', '0.0.0.0'),
(9, 'Le Mans', '0.0.0.0'),
(10, 'Orléans', '0.0.0.0'),
(11, 'Nanterre', '0.0.0.0'),
(12, 'Châteauroux', '0.0.0.0'),
(13, 'La Rochelle', '0.0.0.0'),
(14, 'Angoulème', '0.0.0.0'),
(15, 'Dijon', '0.0.0.0'),
(16, 'Lyon', '0.0.0.0'),
(17, 'Grenoble', '0.0.0.0'),
(18, 'Bordeaux', '0.0.0.0'),
(19, 'Toulouse', '0.0.0.0'),
(20, 'Pau', '0.0.0.0'),
(21, 'Montpellier', '0.0.0.0'),
(22, 'Aix-en-Provence', '0.0.0.0'),
(23, 'Nice', '0.0.0.0'),
(24, 'Alger', '0.0.0.0');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'etudiant');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `campus_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `users_campus_FK` (`campus_id`),
  KEY `users_status0_FK` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `campus_id`, `status_id`) VALUES
(19, 'Tom', 'BANCHEREAU', 'banchereau.tom@gmail.com', '$2y$10$PevrOlCYT/GrlC4VWUjZtugqrz4.4wf3lokDkKX6Xl7frt5ROxJmq', 7, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_campus_FK` FOREIGN KEY (`campus_id`) REFERENCES `campus` (`id`),
  ADD CONSTRAINT `users_status0_FK` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
