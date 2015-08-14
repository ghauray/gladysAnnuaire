-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 14 Août 2015 à 14:56
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gladys`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`, `parent`) VALUES
(1, 'Famille', 0),
(2, 'Cousin', 1),
(3, 'Travail', 0),
(4, 'Oncles et Tantes', 1),
(5, 'Oncles', 4),
(6, 'Patron', 3),
(7, 'Amis', 0),
(18, 'Nantes', 7),
(47, 'Yoga', 0),
(19, 'Ã‰cole', 0),
(13, 'Administratif', 0);

-- --------------------------------------------------------

--
-- Structure de la table `category_record`
--

CREATE TABLE IF NOT EXISTS `category_record` (
  `id_category` int(11) NOT NULL,
  `id_record` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `category_record`
--

INSERT INTO `category_record` (`id_category`, `id_record`) VALUES
(1, 20),
(2, 21),
(47, 20),
(47, 19);

-- --------------------------------------------------------

--
-- Structure de la table `record`
--

CREATE TABLE IF NOT EXISTS `record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `record`
--

INSERT INTO `record` (`id`, `title`, `description`) VALUES
(1, 'Maman', '01 44 55 66 44'),
(17, 'Francis', '02 55 88 99 77'),
(18, 'Satan', '06 66 66 66 66'),
(19, 'Oriane', '08 44 55 44 22'),
(20, 'Quentin', '02 22 44 55 66'),
(21, 'Fanch', '01 22 33 44 55');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
