-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 17 mai 2020 à 22:41
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`ad_id`, `ad_nom`, `ad_prenom`, `et_email`, `et_mdp`) VALUES
(1, 'zellou', 'ahmed', 'admin@admin.admin', 'admin@admin');

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
-- Structure de la table `email`
--

DROP TABLE IF EXISTS `email`;
CREATE TABLE IF NOT EXISTS `email` (
  `fromEmail` text NOT NULL,
  `toEmail` text NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `en_nom` varchar(20) DEFAULT NULL,
  `en_ville` varchar(10) DEFAULT NULL,
  `en_tele` int(11) DEFAULT NULL,
  `en_email` varchar(30) DEFAULT NULL,
  `en_web` varchar(30) NOT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`e_id`, `en_nom`, `en_ville`, `en_tele`, `en_email`, `en_web`) VALUES
(9, 'myopla', 'casa', 598765345, 'myopla@gmail.com', ''),
(10, 'quintel', 'tanger', 567867938, 'quintel@gmail.com', ''),
(11, 'PROTOOLS', 'casa', 98765435, 'PROTOOLS@gmail.com', ''),
(12, 'Best agency', 'Casa', 536475879, 'best_agency@gmail.com', ''),
(13, 'Confidentiel', 'Casa', 537096758, 'confidentiel@confidentiel.ma', ''),
(14, 'Mekia', 'meknes', 656453789, 'mekia@gmail.com', ''),
(15, 'E-MAROC WAVE', 'Rabat', 576898756, 'emaroc_wave@gmail.com', '');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `et_id` int(9) NOT NULL AUTO_INCREMENT,
  `et_nom` varchar(20) DEFAULT NULL,
  `et_prenom` varchar(20) DEFAULT NULL,
  `et_email` varchar(30) DEFAULT NULL,
  `et_mdp` varchar(15) DEFAULT NULL,
  `et_annee` varchar(4) DEFAULT NULL,
  `et_naissance` varchar(20) DEFAULT NULL,
  `et_tele` int(11) DEFAULT NULL,
  `et_status` int(11) NOT NULL DEFAULT 0,
  `et_cne` int(10) DEFAULT NULL,
  PRIMARY KEY (`et_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`et_id`, `et_nom`, `et_prenom`, `et_email`, `et_mdp`, `et_annee`, `et_naissance`, `et_tele`, `et_status`, `et_cne`) VALUES
(26, 'EL MALAKI', 'khalil', 'EL MALAKIkhalil@gmail.com', 'khalil', '2017', '23-09-1997', 665435245, 1, NULL),
(25, 'BAHRANI', 'imane', 'BAHRANIimane@gmail.com', 'imane', '2018', '03-11-1998', 654379812, 0, NULL),
(24, 'AIT LAHCEN', 'ahmed', 'AIT LAHCENahmed@gmail.com', 'ahmed', '2018', '25-09-1998', 654342539, 1, NULL),
(23, 'AATAOUI', 'mohamed', 'AATAOUI@gmail.com', 'mohamed', '2018', '15-04-1998', 678897534, 0, NULL),
(22, 'AABBAR', 'adnane', 'adnaneaabbar@gmail.com', 'adnane', '2018', '12-01-1998', 665435245, 1, NULL),
(18, 'benomar', 'yasmine', 'yasmine@gmail.com', 'yasmine', '2019', '11-05-1999', 661361139, 1, NULL),
(21, 'benhima', 'anass', 'benhimanas@gmail.com', 'anass', '2019', '23-09-1998', 665434246, 0, NULL),
(20, 'bouchdak ', 'Kaoutar', 'bouchdakkawtar@gmail.com', 'kaoutar', '2019', '13-07-1999', 678987654, 1, NULL),
(19, 'ghazi', 'zouhair', 'zouhair@gmail.com', 'zouhair', '2019', '24-10-1999', 666916445, 1, NULL),
(27, 'bouzari', 'rim', 'rimbouzari@gmail.com', 'rim', '2019', '23-09-1999', 678980001, 1, NULL),
(28, 'boumlik', 'ayoub', 'ayoubboumlik@gmail.com', 'ayoub', '2019', '24-10-1999', 612234451, 1, NULL),
(29, 'hafsa', 'bougtib', 'hafsabougtib@gmail.com', 'hafsa', '2019', '1999-05-19', 653452837, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

DROP TABLE IF EXISTS `offre`;
CREATE TABLE IF NOT EXISTS `offre` (
  `of_id` int(11) NOT NULL AUTO_INCREMENT,
  `of_sujet` varchar(50) DEFAULT NULL,
  `of_description` varchar(1000) DEFAULT NULL,
  `of_datedebut` varchar(10) DEFAULT NULL,
  `of_datefin` varchar(10) DEFAULT NULL,
  `of_duree` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `of_status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`of_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`of_id`, `of_sujet`, `of_description`, `of_datedebut`, `of_datefin`, `of_duree`, `image`, `of_status`) VALUES
(24, 'Developpment web', 'chez MYOLPLA, Nous recherchons un Stagiaire pour le poste DÃ©veloppeur Web / Javascript / SQL - - une bonne MaÃ®trise du langage JAVASCRIPT / SQL - Transport assurÃ©.\r\nStage rÃ©munÃ©rÃ©.', '2020-07-02', '2020-09-10', 2, 'index.jpg', 1),
(25, 'stage web', 'chez QUINTEL,nous recherchons un\r\nStagiaire en dÃ©veloppement WordPress\r\nPoste\r\nTÃ¢ches :\r\nâ€¢ CrÃ©ation des nouveaux sites CMS wordpress ( php, html, javascript, mysql )\r\nâ€¢ Refonte des sites WordPress existants\r\nâ€¢ Maintenance sur les sites wordpress existants (nouvelles fonctionnalitÃ©s, etc.)', '2020-06-15', '2020-10-10', 4, 'images.png', 1),
(26, 'Stage en DÃ©veloppement WEB', 'chez PROTOOLS, crÃ©er des professionnel site internet de e-commerce de a a z\r\nsolution crm et autre technique\r\ndes nouveau idÃ©e dans le domaine\r\nAprÃ¨s la pÃ©riode de formation, nous dÃ©tenons un contrat pour continuer avec nous avec un bon salaire si le stagiaire fait du bon travail', '2020-06-20', '2020-07-30', 1, 'protools.png', 0),
(27, 'STAGE en developpement web et mobile ', 'BEST AGENCY est Ã  la recherche d\'un stagiaire en dÃ©veloppement web et mobile (android ios react). vous avez une formation bac+ 2/3/4 en informatique. vous avez une expÃ©rience dans le dÃ©veloppement web+connaissance en c#, .net, mobile (android, ios ou mixte) .', '2020-07-01', '2020-08-30', 2, 'images.jpg', 0),
(28, 'DÃ©veloppeur WEB (Stage prÃ©-embauche)', 'chez CONFIDENTIEL, vous serez principalement chargÃ© de dÃ©velopper des applications dÃ©diÃ©es sur le site en PHP, vos diffÃ©rentes responsabilitÃ©s seront:- le dÃ©veloppement des sites web- Lâ€™animation Ã©ditoriale et graphique ;- L\'IntÃ©gration des pages et formulaires web respectant les standards W3C; - Etudier et proposer les meilleures solutions techniques;- ImplÃ©menter et dÃ©velopper les applications, tests, intÃ©gration et rÃ©daction des documentations', '2020-07-01', '2020-10-31', 3, 'anonyme.jpg', 1),
(29, 'Stage DÃ©veloppement Informatique', 'chez MEKIA, votre mission sera la construction dâ€™applications performantes et flexibles ainsi que dâ€™autres actions support en lien avec nos projets. vous devrez Ãªtre capable de bien comprendre les besoins de nos clients et dâ€™analyser et dÃ©velopper des composants logiciels en utilisant les langages appropriÃ©s ainsi que de documenter le travail effectuÃ©.\r\n', '2020-06-10', '2020-08-10', 2, 'mekia.png', 1),
(30, 'STAGIAIRE EN DÃ‰VELOPPEMENT WEB', 'E MAROC WAVE est a la recherche de profils interesses par le developpement web et mobile. Vos Missions :En tant que DÃ©veloppeur Web, vous serez en charge du dÃ©veloppement de nos nouveaux projets web et de la maintenance de notre site e-commerce.', '2020-06-25', '2020-09-10', 3, 'wave.png', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
