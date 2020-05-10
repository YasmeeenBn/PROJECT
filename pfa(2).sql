-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 10 mai 2020 à 23:16
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pfa`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_nom` varchar(20) DEFAULT NULL,
  `ad_prenom` varchar(20) DEFAULT NULL,
  `et_email` varchar(30) DEFAULT NULL,
  `et_mdp` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

DROP TABLE IF EXISTS `demande`;
CREATE TABLE IF NOT EXISTS `demande` (
  `demande_id` int(11) NOT NULL,
  `demande_date` date DEFAULT NULL,
  PRIMARY KEY (`demande_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `deposer`
--

DROP TABLE IF EXISTS `deposer`;
CREATE TABLE IF NOT EXISTS `deposer` (
  `etudiant_nbdemandes` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `encadrant`
--

DROP TABLE IF EXISTS `encadrant`;
CREATE TABLE IF NOT EXISTS `encadrant` (
  `encadrant_id` int(11) NOT NULL,
  `encadrant_nom` varchar(20) DEFAULT NULL,
  `encadrant_prenom` varchar(20) DEFAULT NULL,
  `encadrant_email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`encadrant_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `entreprise_id` int(11) NOT NULL AUTO_INCREMENT,
  `en_nom` varchar(20) DEFAULT NULL,
  `en_ville` varchar(10) DEFAULT NULL,
  `en_tele` int(11) DEFAULT NULL,
  `en_email` varchar(30) DEFAULT NULL,
  `en_web` varchar(30) NOT NULL,
  PRIMARY KEY (`entreprise_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`entreprise_id`, `en_nom`, `en_ville`, `en_tele`, `en_email`, `en_web`) VALUES
(1, 'h', 'kj', 987654, 'yas@gmail.com', ''),
(2, 'ff', 'ff', 543412, 'yas@gmail.com', ''),
(3, 'yasmine', 'larache', 987654, 'yas@hotmail.fr', ''),
(4, 'yas', 'kjhlk', 98756, 'yas@gmail.com', ''),
(5, 'yas', 'kjhlk', 98756, 'yas@gmail.com', ''),
(6, 'yas', 'kjhlk', 98756, 'yas@gmail.com', '');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `etudiant_id` int(9) NOT NULL AUTO_INCREMENT,
  `et_nom` varchar(20) DEFAULT NULL,
  `et_prenom` varchar(20) DEFAULT NULL,
  `et_email` varchar(30) DEFAULT NULL,
  `et_mdp` varchar(15) DEFAULT NULL,
  `et_annee` varchar(4) DEFAULT NULL,
  `et_naissance` varchar(20) DEFAULT NULL,
  `et_tele` int(11) DEFAULT NULL,
  PRIMARY KEY (`etudiant_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`etudiant_id`, `et_nom`, `et_prenom`, `et_email`, `et_mdp`, `et_annee`, `et_naissance`, `et_tele`) VALUES
(1, 'test', 'test', 'test@test.test', 'test', 'test', '2020-05-05', 88888),
(2, 'g', 'f', 'test@test.test', 'ff', 'f', '2020-04-26', 33),
(3, 'y', 'h', 'yas@gmail.com', 'h', 'n', '2020-04-26', 9868),
(4, 'y', 'h', 'yas@gmail.com', 'h', 'n', '2020-04-26', 9868),
(5, 'y', 'h', 'yas@gmail.com', 'h', 'n', '2020-04-26', 9868),
(6, 'y', 'h', 'yas@gmail.com', 'h', 'n', '2020-04-26', 9868),
(7, 'y', 'h', 'yas@gmail.com', 'h', 'n', '2020-04-26', 9868),
(8, 'y', 'h', 'yas@gmail.com', 'h', 'n', '2020-04-26', 9868),
(9, 'y', 'h', 'yas@gmail.com', 'h', 'n', '2020-04-26', 9868),
(10, 'y', 'h', 'yas@gmail.com', 'h', 'n', '2020-04-26', 9868),
(11, 'y', 'h', 'yas@gmail.com', 'h', 'n', '2020-04-26', 9868),
(12, 'f', 'f', 'ff@gmail.com', 'f', 'f', '2020-04-26', 244),
(13, 'yasmine', 'hmara', 'yas@gmail.com', 'h', 'n', '2020-04-26', 9868),
(14, 'bibi', 'h', 'yas@gmaiiil.com', 'kjb', 'kj', '2020-04-26', 976),
(15, 'hh', 'h', 'test@test.cm', 'g', 'm', '2020-04-26', 664),
(16, 'hh', 'h', 'test@test.cm', 'g', 'm', '2020-04-26', 664),
(17, 'h', 'c', 'yas@gmail.comf', 'f', 'ff', '2020-04-26', 8976543);

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

DROP TABLE IF EXISTS `offre`;
CREATE TABLE IF NOT EXISTS `offre` (
  `offre_id` int(11) NOT NULL AUTO_INCREMENT,
  `of_sujet` varchar(50) DEFAULT NULL,
  `of_description` varchar(500) DEFAULT NULL,
  `of_status` varchar(15) DEFAULT NULL,
  `of_nbcandidats` int(11) DEFAULT NULL,
  `of_datedebut` varchar(10) DEFAULT NULL,
  `of_datefin` varchar(10) DEFAULT NULL,
  `of_duree` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`offre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`offre_id`, `of_sujet`, `of_description`, `of_status`, `of_nbcandidats`, `of_datedebut`, `of_datefin`, `of_duree`, `image`) VALUES
(1, 'iuh', 'ffdg', NULL, NULL, '2020-04-02', '2020-05-10', 3, '0'),
(2, 'stage', 'tres bon travail', NULL, NULL, '3-4-2020', '5-8-2020', 4, '0'),
(3, 'hbk', 'cgvbhnklm', NULL, NULL, '2020-04-02', '2020-05-30', 4, '0'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ciel.jpg'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ciel.jpg'),
(21, 'test', 'taiuzdhaiuzhdia', NULL, NULL, '2020-04-02', '2020-05-10', 4, '95525181_2621431518137893_4735335064567545856_n.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
