-- phpMyAdmin SQL Dump
-- version 4.4.14.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Erstellungszeit: 17. Okt 2015 um 18:13
-- Server-Version: 5.5.43-0+deb7u1
-- PHP-Version: 5.5.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `admin_tools_curcode`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `codesnippets`
--

CREATE TABLE IF NOT EXISTS `codesnippets` (
  `snippet_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tags` text NOT NULL,
  `information` longtext,
  `code` text NOT NULL,
  `date_created` datetime NOT NULL,
  `last_change` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `codesnippets`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `language_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `information` longtext,
  `datetime_created` datetime DEFAULT NULL,
  `datetime_insert` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `languages`
--

INSERT INTO `languages` (`language_id`, `name`, `information`, `datetime_created`, `datetime_insert`) VALUES
(1, 'php', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'intelliJ', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'html', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'css', NULL, NULL, NULL),
(5, 'javascript', NULL, NULL, NULL),
(6, 'htaccess', NULL, NULL, NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `codesnippets`
--
ALTER TABLE `codesnippets`
  ADD PRIMARY KEY (`snippet_id`),
  ADD UNIQUE KEY `unique_snipped_id` (`snippet_id`);

--
-- Indizes für die Tabelle `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`language_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `codesnippets`
--
ALTER TABLE `codesnippets`
  MODIFY `snippet_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT für Tabelle `languages`
--
ALTER TABLE `languages`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
