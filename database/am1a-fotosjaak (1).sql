-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 26 nov 2013 om 10:00
-- Serverversie: 5.6.12-log
-- PHP-versie: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `am1a-fotosjaak`
--
CREATE DATABASE IF NOT EXISTS `am1a-fotosjaak` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `am1a-fotosjaak`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `question_english` text NOT NULL,
  `question_dutch` text NOT NULL,
  `answer_english` text NOT NULL,
  `answer_dutch` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Gegevens worden uitgevoerd voor tabel `faq`
--

INSERT INTO `faq` (`id`, `question_english`, `question_dutch`, `answer_english`, `answer_dutch`) VALUES
(1, 'Is this game hard to play?', 'is dit een moeilijk spel om te spelen?', 'Yes, this game is very hard to play.\r\n', 'Ja, dit spel is echt moeilijk om te spelen'),
(2, 'When is this game completed?', 'Wanneer heb je dit spel uitgespeeld?', 'The game is never ending experience.\r\nFull of joy and pleasure.', 'De game komt nooit ten einde. Het maakt je beter en gelukkiger mens.'),
(3, 'What is my name?', 'wat is mijn naam?', 'My name is Hoessein.', 'Mijn naam is Hoessein'),
(4, 'How old am I?', 'Hoe oud bn ik?', 'I am 17 years old.', 'Ik ben 17 jaar oud.'),
(5, 'When can you play this game?', 'Wanneer kan je dit spel spelen?', 'All day long you can play this game.', 'De hele dag door kan je dit spel spelen'),
(6, 'How long can you play this game?', 'Hoe lang kan je dit spel spelen?', 'How long you want.', 'Hoe lang je maar wilt.'),
(7, 'What for weather is it today?', 'Wat voor weer is het vandaag?', 'It is raining and it is cold', 'Het regent en het is koud.'),
(8, 'Can I help you?', 'Kan ik je helpen?', 'Yes I can.', 'Ja ik kan.'),
(9, 'When are you dead?', 'Wanneer ben je dood?', 'If you dont have any points.', 'Als je geen punten meer hebt.'),
(10, 'Who are you?', 'Wie bn jij?', 'You are my user.', 'Je bent mijn gebruiker.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` varchar(12) NOT NULL,
  `userrole` enum('customer','root','administrator','photographer','developer') NOT NULL DEFAULT 'customer',
  `activated` enum('yes','no') NOT NULL DEFAULT 'no',
  `activationdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `infix` varchar(50) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `addressnumber` varchar(10) NOT NULL,
  `city` varchar(200) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `country` varchar(300) NOT NULL,
  `telephonenumber` varchar(10) NOT NULL,
  `mobilephonenumber` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `infix` varchar(20) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `street` varchar(100) NOT NULL,
  `housenumber` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `zipcode` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `sex` varchar(100) NOT NULL,
  `marital_status` varchar(100) NOT NULL,
  `favorite_game_genres` varchar(100) NOT NULL,
  `favorite_game` varchar(100) NOT NULL,
  `e-mail` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `userrole` enum('admin','root','customer') NOT NULL DEFAULT 'customer',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` (`id`, `firstname`, `infix`, `surname`, `street`, `housenumber`, `address`, `zipcode`, `date`, `sex`, `marital_status`, `favorite_game_genres`, `favorite_game`, `e-mail`, `password`, `userrole`) VALUES
(20, 'Hoessein', '', 'Ait Ichou', 'Nijeveldsingel ', '3', 'Utrecht', '3525CN', '1996-10-19', 'male', 'not married', 'rpg', 'Gta', 'a_hoessein@live.nl', '19o1996H', 'customer'),
(21, 'root', 'de', 'root', 'rootstraat', '12', 'roottown', '1901 CB', '2013-09-09', 'male', 'married', '1', 'game', 'root@live.nl', '19o1996H', 'root'),
(22, 'admin', 'de', 'admin', 'amdinstraat', '1', 'amdintown', '3525CN', '2013-09-09', 'male', 'married', '1', 'gta', 'admin@live.nl', '19o1996H', 'admin'),
(23, 'hamza', '', 'Ait Ichou', 'Nijeveldsingel', '3', 'Utrecht', '3525CN', '2013-09-09', 'male', 'married', '2', 'gta', 'a_hamza@live.nl', '19o1996H', 'customer');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
