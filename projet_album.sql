-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 16 Mai 2015 à 20:26
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projet_album`
--

-- --------------------------------------------------------

--
-- Structure de la table `folders`
--

CREATE TABLE IF NOT EXISTS `folders` (
  `IDfolder` int(11) NOT NULL AUTO_INCREMENT,
  `theme` varchar(30) COLLATE utf8_bin NOT NULL,
  `lettre` varchar(1) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`IDfolder`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=26 ;

--
-- Contenu de la table `folders`
--

INSERT INTO `folders` (`IDfolder`, `theme`, `lettre`) VALUES
(21, 'Cheval', 'C'),
(24, 'Bateau', 'B'),
(25, 'Soleil', 'S');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `IDimage` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(40) COLLATE utf8_bin NOT NULL,
  `filenameTiny` varchar(40) COLLATE utf8_bin NOT NULL,
  `theme` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`IDimage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=27 ;

--
-- Contenu de la table `images`
--

INSERT INTO `images` (`IDimage`, `filename`, `filenameTiny`, `theme`) VALUES
(10, 'cheval-fotolia_03.jpg', '', 'cheval'),
(11, 'bateau-fotolia_06.jpg', '', 'bateau'),
(12, 'soleil-fotolia_05.jpg', '', 'soleil'),
(13, '1', '', 'cheval'),
(14, 'soleil-image-2', '', 'soleil'),
(15, 'soleil-image-3.fotolia_02.jpg', '', 'soleil'),
(16, 'soleil-image-4.jpg', '', 'soleil'),
(17, 'soleil-image-5.jpg', '', 'soleil'),
(18, 'soleil-image-6.jpg', '', 'soleil'),
(19, 'soleil-image-7.jpg', '', 'soleil'),
(20, 'soleil-image-8.jpg', '', 'soleil'),
(21, 'cheval-image-2.jpg', '', 'cheval'),
(22, 'soleil-image-9.jpg', '', 'soleil'),
(23, 'soleil-image-10.jpg', '', 'soleil'),
(24, 'soleil-image-11.jpg', '', 'soleil'),
(25, 'soleil-image-12.jpg', '', 'soleil'),
(26, 'bateau-image-2.jpg', 'bateau-image-2-tiny.jpg', 'bateau');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `IDmenu` int(11) NOT NULL AUTO_INCREMENT,
  `lettre` varchar(1) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`IDmenu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=27 ;

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`IDmenu`, `lettre`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(6, 'F'),
(7, 'G'),
(8, 'H'),
(9, 'I'),
(10, 'J'),
(11, 'K'),
(12, 'L'),
(13, 'M'),
(14, 'N'),
(15, 'O'),
(16, 'P'),
(17, 'Q'),
(18, 'R'),
(19, 'S'),
(20, 'T'),
(21, 'U'),
(22, 'V'),
(23, 'W'),
(24, 'X'),
(25, 'Y'),
(26, 'Z');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
