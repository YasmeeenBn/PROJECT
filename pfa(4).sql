-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 26 mai 2020 à 20:56
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
  `et_email` varchar(30) DEFAULT NULL,
  `en_web` varchar(30) NOT NULL,
  `et_mdp` varchar(15) DEFAULT NULL,
  `en_status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`e_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`e_id`, `en_nom`, `en_ville`, `en_tele`, `et_email`, `en_web`, `et_mdp`, `en_status`) VALUES
(9, 'myopla', 'casa', 598765345, 'myopla@gmail.com', '', 'myopla', 1),
(10, 'quintel', 'tanger', 567867938, 'quintel@gmail.com', '', NULL, 0),
(11, 'PROTOOLS', 'casa', 98765435, 'PROTOOLS@gmail.com', '', NULL, 0),
(12, 'Best agency', 'Casa', 536475879, 'best_agency@gmail.com', '', NULL, 0),
(13, 'Confidentiel', 'Casa', 537096758, 'confidentiel@confidentiel.ma', '', NULL, 1),
(14, 'Mekia', 'meknes', 656453789, 'mekia@gmail.com', '', NULL, 1),
(15, 'E-MAROC WAVE', 'Rabat', 576898756, 'emaroc_wave@gmail.com', '', NULL, 0);

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
  `et_link` varchar(30) DEFAULT NULL,
  `et_cv` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`et_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`et_id`, `et_nom`, `et_prenom`, `et_email`, `et_mdp`, `et_annee`, `et_naissance`, `et_tele`, `et_status`, `et_cne`, `et_link`, `et_cv`) VALUES
(26, 'EL MALAKI', 'khalil', 'EL MALAKIkhalil@gmail.com', 'khalil', '2017', '23-09-1997', 665435245, 0, NULL, NULL, NULL),
(25, 'BAHRANI', 'imane', 'BAHRANIimane@gmail.com', 'imane', '2018', '03-11-1998', 654379812, 0, NULL, NULL, NULL),
(24, 'AIT LAHCEN', 'ahmed', 'AIT LAHCENahmed@gmail.com', 'ahmed', '2018', '25-09-1998', 654342539, 0, NULL, NULL, NULL),
(23, 'AATAOUI', 'mohamed', 'AATAOUI@gmail.com', 'mohamed', '2018', '15-04-1998', 678897534, 1, NULL, NULL, NULL),
(22, 'AABBAR', 'adnane', 'adnaneaabbar@gmail.com', 'adnane', '2018', '12-01-1998', 665435245, 1, NULL, NULL, NULL),
(18, 'lmkelkha', 'yasmine', 'yasmine@mkelkha.com', 'yasmine', '2019', '11-05-1999', 661361139, 1, NULL, NULL, NULL),
(21, 'benhima', 'anass', 'benhimanas@gmail.com', 'anass', '2019', '23-09-1998', 665434246, 0, NULL, NULL, NULL),
(20, 'bouchdak ', 'Kaoutar', 'bouchdakkawtar@gmail.com', 'kaoutar', '2019', '13-07-1999', 678987654, 0, NULL, NULL, NULL),
(19, 'ghazi', 'zouhair', 'zouhair@gmail.com', 'zouhair', '2019', '24-10-1999', 666916445, 0, NULL, NULL, NULL),
(27, 'bouzari', 'rim', 'rimbouzari@gmail.com', 'rim', '2019', '23-09-1999', 678980001, 1, NULL, NULL, NULL),
(28, 'boumlik', 'ayoub', 'ayoubboumlik@gmail.com', 'ayoub', '2019', '24-10-1999', 612234451, 1, NULL, NULL, NULL),
(29, 'hafsa', 'bougtib', 'hafsabougtib@gmail.com', 'hafsa', '2019', '1999-05-19', 653452837, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `lettres_motivation`
--

DROP TABLE IF EXISTS `lettres_motivation`;
CREATE TABLE IF NOT EXISTS `lettres_motivation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `et_id` int(11) NOT NULL,
  `of_id` int(11) NOT NULL,
  `objet` varchar(200) NOT NULL,
  `lettre` text NOT NULL,
  `e_id` int(11) NOT NULL DEFAULT 9,
  `et_acc` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lettres_motivation`
--

INSERT INTO `lettres_motivation` (`id`, `et_id`, `of_id`, `objet`, `lettre`, `e_id`, `et_acc`) VALUES
(6, 29, 1, 'test', 'yasmine', 9, 0),
(8, 29, 1, 'yasmine', 'yasmine', 9, 0),
(9, 29, 1, 'yasmine postuler', 'postuler', 9, 1),
(14, 18, 1, 'Reponse d l\'offre de stage Dev Web', 'Yasmine . <yasminebenomar3@gmail.com>\r\n	\r\nPièces jointesmar. 19 mai 05:35 (il y a 4 jours)\r\n	\r\nÀ sm\r\nBonjour,\r\nJ\'ai regardé votre offre sur internet et je tenais a postuler.\r\n\r\nEtant étudiante en première année en école nationale supérieure d’informatique et d’analyse des systèmes ENSIAS, je suis actuellement a la recherche d’un travail en freelance d\'été dans le cadre de ma formation qui réunit à la fois le développement web et applications mobiles et la science des données.\r\n\r\nVous trouverez ci joint mon CV, n\'hésitez pas a me contacter, je suis disponible.\r\n\r\nJe vous remercie de l\'attention que vous porterez à cette demande d\'emploi et Je vous prie d’agréer, l’expression de mes salutations distinguées. ', 9, 1),
(16, 18, 1, 'Réponse a votre offre d\'emploi', 'Etant étudiante en première année en école nationale supérieure d’informatique et d’analyse des systèmes ENSIAS, je suis actuellement a la recherche d’un travail en freelance d\'été dans le cadre de ma formation qui réunit à la fois le développement web et applications mobiles et la science des données.\r\nJe vous remercie de l\'attention que vous porterez à cette demande d\'emploi et Je vous prie d’agréer, l’expression de mes salutations distinguées. ', 9, 0);

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
  `e_id` int(11) NOT NULL,
  PRIMARY KEY (`of_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`of_id`, `of_sujet`, `of_description`, `of_datedebut`, `of_datefin`, `of_duree`, `image`, `of_status`, `e_id`) VALUES
(1, 'Developpment web', 'chez MYOLPLA, Nous recherchons un Stagiaire pour le poste DÃ©veloppeur Web / Javascript / SQL - - une bonne MaÃ®trise du langage JAVASCRIPT / SQL - Transport assurÃ©.\r\nStage rÃ©munÃ©rÃ©.', '2020-07-02', '2020-09-10', 2, 'index.jpg', 1, 9),
(25, 'stage web', 'chez QUINTEL,nous recherchons un\r\nStagiaire en dÃ©veloppement WordPress\r\nPoste\r\nTÃ¢ches :\r\nâ€¢ CrÃ©ation des nouveaux sites CMS wordpress ( php, html, javascript, mysql )\r\nâ€¢ Refonte des sites WordPress existants\r\nâ€¢ Maintenance sur les sites wordpress existants (nouvelles fonctionnalitÃ©s, etc.)', '2020-06-15', '2020-10-10', 4, 'images.png', 0, 10),
(26, 'Stage en DÃ©veloppement WEB', 'chez PROTOOLS, crÃ©er des professionnel site internet de e-commerce de a a z\r\nsolution crm et autre technique\r\ndes nouveau idÃ©e dans le domaine\r\nAprÃ¨s la pÃ©riode de formation, nous dÃ©tenons un contrat pour continuer avec nous avec un bon salaire si le stagiaire fait du bon travail', '2020-06-20', '2020-07-30', 1, 'protools.png', 0, 11),
(27, 'STAGE en developpement web et mobile ', 'BEST AGENCY est Ã  la recherche d\'un stagiaire en dÃ©veloppement web et mobile (android ios react). vous avez une formation bac+ 2/3/4 en informatique. vous avez une expÃ©rience dans le dÃ©veloppement web+connaissance en c#, .net, mobile (android, ios ou mixte) .', '2020-07-01', '2020-08-30', 2, 'images.jpg', 0, 12),
(28, 'DÃ©veloppeur WEB (Stage prÃ©-embauche)', 'chez CONFIDENTIEL, vous serez principalement chargÃ© de dÃ©velopper des applications dÃ©diÃ©es sur le site en PHP, vos diffÃ©rentes responsabilitÃ©s seront:- le dÃ©veloppement des sites web- Lâ€™animation Ã©ditoriale et graphique ;- L\'IntÃ©gration des pages et formulaires web respectant les standards W3C; - Etudier et proposer les meilleures solutions techniques;- ImplÃ©menter et dÃ©velopper les applications, tests, intÃ©gration et rÃ©daction des documentations', '2020-07-01', '2020-10-31', 3, 'anonyme.jpg', 1, 13),
(29, 'Stage DÃ©veloppement Informatique', 'chez MEKIA, votre mission sera la construction dâ€™applications performantes et flexibles ainsi que dâ€™autres actions support en lien avec nos projets. vous devrez Ãªtre capable de bien comprendre les besoins de nos clients et dâ€™analyser et dÃ©velopper des composants logiciels en utilisant les langages appropriÃ©s ainsi que de documenter le travail effectuÃ©.\r\n', '2020-06-10', '2020-08-10', 2, 'mekia.png', 1, 14),
(30, 'STAGIAIRE EN DÃ‰VELOPPEMENT WEB', 'E MAROC WAVE est a la recherche de profils interesses par le developpement web et mobile. Vos Missions :En tant que DÃ©veloppeur Web, vous serez en charge du dÃ©veloppement de nos nouveaux projets web et de la maintenance de notre site e-commerce.', '2020-06-25', '2020-09-10', 3, 'wave.png', 0, 15);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
