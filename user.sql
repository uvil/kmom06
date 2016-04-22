-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 19 apr 2016 kl 11:31
-- Serverversion: 5.6.17
-- PHP-version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `phpmvc`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acronym` varchar(20) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `name` varchar(80) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `active` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `acronym` (`acronym`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumpning av Data i tabell `user`
--

INSERT INTO `user` (`id`, `acronym`, `email`, `name`, `password`, `created`, `updated`, `deleted`, `active`) VALUES
(1, 'admin', 'admin@dbwebb.se', 'Administrator', '$2y$10$avKDwaCkpzanrSvkcLflZuLxC1Q1KcRYLkymgwEzP2N6yokuratu.', '2016-04-11 12:18:17', NULL, NULL, '2016-04-11 12:18:17'),
(2, 'doe', 'doe@dbwebb.se', 'John/Jane Doe', '$2y$10$wbt0aLPSFydeIimLEPzdxe3Ren5A4zzPknfu8c1z0wmrwBrcgqIFK', '2016-04-11 12:18:17', NULL, NULL, '2016-04-11 12:18:17');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
