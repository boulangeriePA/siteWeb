-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 14 Décembre 2016 à 12:55
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestage`
--
CREATE DATABASE IF NOT EXISTS `gestage` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gestage`;

-- --------------------------------------------------------

--
-- Structure de la table `anneescol`
--

DROP TABLE IF EXISTS `anneescol`;
CREATE TABLE IF NOT EXISTS `anneescol` (
  `ANNEESCOL` char(9) NOT NULL,
  PRIMARY KEY (`ANNEESCOL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `anneescol`
--

INSERT INTO `anneescol` (`ANNEESCOL`) VALUES
('2008-2009'),
('2009-2010'),
('2010-2011'),
('2011-2012'),
('2012-2013'),
('2013-2014'),
('2014-2015');

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `NUMCLASSE` char(32) NOT NULL,
  `IDSPECIALITE` smallint(6) DEFAULT NULL,
  `NUMFILIERE` int(11) NOT NULL,
  `NOMCLASSE` varchar(128) NOT NULL,
  PRIMARY KEY (`NUMCLASSE`),
  KEY `CLASSE_IBFK_1` (`IDSPECIALITE`),
  KEY `CLASSE_IBFK_2` (`NUMFILIERE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `classe`
--

INSERT INTO `classe` (`NUMCLASSE`, `IDSPECIALITE`, `NUMFILIERE`, `NOMCLASSE`) VALUES
('1SIOA', NULL, 4, '1ére année BTS Service Informatique auxOrganisation'),
('1SIOB', NULL, 4, '1ére année BTS Service Informatique auxOrganisation'),
('2SISR', 2, 4, '2ème année BTS Service Informatique auxOrganisation'),
('2SLAM', 1, 4, '2ème année BTS Service Informatique auxOrganisation');

-- --------------------------------------------------------

--
-- Structure de la table `contact_organisation`
--

DROP TABLE IF EXISTS `contact_organisation`;
CREATE TABLE IF NOT EXISTS `contact_organisation` (
  `IDORGANISATION` int(11) NOT NULL,
  `IDCONTACT` int(11) NOT NULL,
  `FONCTION` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`IDORGANISATION`,`IDCONTACT`),
  KEY `I_FK_CONTACT_ORGANISATION_ORGA` (`IDORGANISATION`),
  KEY `I_FK_CONTACT_ORGANISATION_PERS` (`IDCONTACT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

DROP TABLE IF EXISTS `filiere`;
CREATE TABLE IF NOT EXISTS `filiere` (
  `NUMFILIERE` int(11) NOT NULL,
  `LIBELLEFILIERE` varchar(128) NOT NULL,
  PRIMARY KEY (`NUMFILIERE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `filiere`
--

INSERT INTO `filiere` (`NUMFILIERE`, `LIBELLEFILIERE`) VALUES
(1, 'Management des Unités Commerciales'),
(2, 'Comptabilité et Gestion des Organisations'),
(3, 'Informatique de Gestion'),
(4, 'Services Informatiques aux Organisations'),
(5, 'Diplôme de Comptabilité et de Gestion'),
(6, 'Formation Complémentaire d''Initiative Locale');

-- --------------------------------------------------------

--
-- Structure de la table `organisation`
--

DROP TABLE IF EXISTS `organisation`;
CREATE TABLE IF NOT EXISTS `organisation` (
  `IDORGANISATION` int(11) NOT NULL,
  `NOM_ORGANISATION` varchar(255) NOT NULL,
  `VILLE_ORGANISATION` varchar(128) NOT NULL,
  `ADRESSE_ORGANISATION` varchar(128) NOT NULL,
  `CP_ORGANISATION` char(10) NOT NULL,
  `TEL_ORGANISATION` char(15) NOT NULL,
  `FAX_ORGANISATION` char(15) DEFAULT NULL,
  `FORMEJURIDIQUE` varchar(10) NOT NULL,
  `ACTIVITE` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`IDORGANISATION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `organisation`
--

INSERT INTO `organisation` (`IDORGANISATION`, `NOM_ORGANISATION`, `VILLE_ORGANISATION`, `ADRESSE_ORGANISATION`, `CP_ORGANISATION`, `TEL_ORGANISATION`, `FAX_ORGANISATION`, `FORMEJURIDIQUE`, `ACTIVITE`) VALUES
(1, 'ECOLES DES MINES', 'NANTES', '4 rue alfred kastler', '44300', '0251858100', '1574893129', 'SA', 'dev'),
(2, 'Info Transit', 'STHERBLAIN', 'rue de la roulette', '48520', '0305040207', '', 'SArl', 'res');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `IDPERSONNE` int(11) NOT NULL AUTO_INCREMENT,
  `IDSPECIALITE` smallint(6) DEFAULT NULL,
  `IDROLE` smallint(6) NOT NULL,
  `CIVILITE` char(32) NOT NULL,
  `NOM` varchar(30) NOT NULL,
  `PRENOM` varchar(20) NOT NULL,
  `NUM_TEL` char(13) NOT NULL,
  `ADRESSE_MAIL` varchar(30) NOT NULL,
  `NUM_TEL_MOBILE` char(15) DEFAULT NULL,
  `ETUDES` varchar(40) DEFAULT NULL,
  `FORMATION` varchar(128) DEFAULT NULL,
  `LOGINUTILISATEUR` varchar(128) DEFAULT NULL,
  `MDPUTILISATEUR` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`IDPERSONNE`),
  KEY `PERSONNE_IBFK_1` (`IDSPECIALITE`),
  KEY `PERSONNE_IBFK_2` (`IDROLE`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`IDPERSONNE`, `IDSPECIALITE`, `IDROLE`, `CIVILITE`, `NOM`, `PRENOM`, `NUM_TEL`, `ADRESSE_MAIL`, `NUM_TEL_MOBILE`, `ETUDES`, `FORMATION`, `LOGINUTILISATEUR`, `MDPUTILISATEUR`) VALUES
(1, NULL, 1, 'Monsieur', 'Bourgeois', 'Nicolas', '0000000000', 'test@gmail.com', NULL, NULL, NULL, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(2, NULL, 2, 'Madame', 'Tygne', 'Charlotte', '0000000000', 'test@gmail.com', NULL, NULL, NULL, 'secretaire', '0a9819b7419168b4b9ab2d8563b5983dc818130f'),
(13, NULL, 5, 'Monsieur', 'Jobs', 'Steve', '0000000000', 'test@gmail.com', NULL, NULL, NULL, 'stage', 'ac5d84bfae726a96cc419c0f657e50e600c0157e'),
(14, NULL, 3, 'Monsieur', 'Beauvais', 'Jean pierre', '0000000000', 'test@gmail.com', NULL, NULL, NULL, 'prof', 'd9f02d46be016f1b301f7c02a4b9c4ebe0dde7ef'),
(16, NULL, 4, 'Monsieur', 'Goulet', 'Jerome', '0000000000', 'test@gmail.com', '0000000000', 'SIO', 'SLAM', 'etudiant', '0bbf31d9da625147cbe69f7b1f5af704a8105f12'),
(21, NULL, 0, 'Monsieur', 'Smith', 'John', '0000000000', 'test@gmail.com', NULL, NULL, NULL, 'autre', '522597dd184c134dbd8500c66d3243630545fbdc'),
(29, 1, 4, 'Monsieur', 'RICHARD', 'Antoine', '0000000000', 'antoine.richard19@gmail.com', '', '', '', 'arichard', 'faf7f638eaa04391f43c8bc1024123b747afc6d6'),
(31, 1, 4, 'Monsieur', 'Essai', 'Test', '0000000000', 'test@test.net', '0000000000', 'BTS', 'SIO', 'test', '51abb9636078defbf888d8457a7c76f85c8f114c'),
(54, 1, 4, 'Madame', 'trh', 'rsththr', '0000000000', 'ehts@rsht.ghg', '', 'sh', 'gfdh', '1234567', '20eabe5d64b0e216796e834f52d61fd0b70332fc');

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `ANNEESCOL` char(9) NOT NULL,
  `IDPERSONNE` int(11) NOT NULL,
  `NUMCLASSE` char(32) NOT NULL,
  PRIMARY KEY (`ANNEESCOL`,`IDPERSONNE`,`NUMCLASSE`),
  KEY `PROMOTION_IBFK_4` (`IDPERSONNE`),
  KEY `PROMOTION_IBFK_5` (`NUMCLASSE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `IDROLE` smallint(6) NOT NULL,
  `RANG` smallint(6) NOT NULL,
  `LIBELLE` varchar(30) NOT NULL,
  PRIMARY KEY (`IDROLE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`IDROLE`, `RANG`, `LIBELLE`) VALUES
(0, 0, 'Autre'),
(1, 1, 'Administrateur'),
(2, 2, 'Secrétaire'),
(3, 3, 'Professeur'),
(4, 4, 'Etudiant'),
(5, 5, 'MaitreDeStage');

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

DROP TABLE IF EXISTS `specialite`;
CREATE TABLE IF NOT EXISTS `specialite` (
  `IDSPECIALITE` smallint(6) NOT NULL,
  `LIBELLECOURTSPECIALITE` varchar(10) NOT NULL,
  `LIBELLELONGSPECIALITE` varchar(128) NOT NULL,
  PRIMARY KEY (`IDSPECIALITE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `specialite`
--

INSERT INTO `specialite` (`IDSPECIALITE`, `LIBELLECOURTSPECIALITE`, `LIBELLELONGSPECIALITE`) VALUES
(1, 'SLAM', 'Solutions logicielles et applications métiers'),
(2, 'SISR', 'Solutions d''infrastructures systèmes et réseaux');

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

DROP TABLE IF EXISTS `stage`;
CREATE TABLE IF NOT EXISTS `stage` (
  `NUM_STAGE` int(11) NOT NULL AUTO_INCREMENT,
  `ANNEESCOL` char(9) NOT NULL,
  `IDETUDIANT` int(11) NOT NULL,
  `IDPROFESSEUR` int(11) NOT NULL,
  `IDORGANISATION` int(11) NOT NULL,
  `IDMAITRESTAGE` int(11) NOT NULL,
  `DATEDEBUT` date NOT NULL,
  `DATEFIN` date NOT NULL,
  `DATEVISITESTAGE` date DEFAULT NULL,
  `VILLE` varchar(128) NOT NULL,
  `DIVERS` varchar(255) DEFAULT NULL,
  `BILANTRAVAUX` varchar(255) NOT NULL,
  `RESSOURCESOUTILS` varchar(255) NOT NULL,
  `COMMENTAIRES` varchar(255) NOT NULL,
  `PARTICIPATIONCCF` varchar(255) NOT NULL,
  PRIMARY KEY (`NUM_STAGE`),
  KEY `I_FK_STAGE_ANNEESCOL` (`ANNEESCOL`),
  KEY `I_FK_STAGE_ORGANISATION` (`IDORGANISATION`),
  KEY `I_FK_STAGE_PERSONNE` (`IDETUDIANT`),
  KEY `I_FK_STAGE_PERSONNE3` (`IDPROFESSEUR`),
  KEY `I_FK_STAGE_PERSONNE4` (`IDMAITRESTAGE`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `stage`
--

INSERT INTO `stage` (`NUM_STAGE`, `ANNEESCOL`, `IDETUDIANT`, `IDPROFESSEUR`, `IDORGANISATION`, `IDMAITRESTAGE`, `DATEDEBUT`, `DATEFIN`, `DATEVISITESTAGE`, `VILLE`, `DIVERS`, `BILANTRAVAUX`, `RESSOURCESOUTILS`, `COMMENTAIRES`, `PARTICIPATIONCCF`) VALUES
(2, '2008-2009', 2, 14, 2, 14, '2013-10-17', '2013-10-18', '2013-10-18', 'nantes', NULL, '', '', '', '0'),
(14, '2008-2009', 2, 14, 1, 13, '2013-09-10', '2013-11-10', '2013-11-02', 'Nantes', 'teqe', 'fefsseffes', 'efssfe', 'sfesfe', '11'),
(15, '2011-2012', 2, 14, 1, 13, '2013-09-10', '2013-11-10', '2013-11-02', 'Nantes', 'Stage sur Linux', 'efes', 'fes', 'fsefse', '1'),
(16, '2012-2013', 16, 14, 2, 13, '2013-09-10', '2013-11-10', '2013-11-02', 'Marseille', '', '', '', '', '');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `CLASSE_IBFK_1` FOREIGN KEY (`IDSPECIALITE`) REFERENCES `specialite` (`IDSPECIALITE`),
  ADD CONSTRAINT `CLASSE_IBFK_2` FOREIGN KEY (`NUMFILIERE`) REFERENCES `filiere` (`NUMFILIERE`);

--
-- Contraintes pour la table `contact_organisation`
--
ALTER TABLE `contact_organisation`
  ADD CONSTRAINT `FK_CONTACT_ORGANISATION_ORGANI` FOREIGN KEY (`IDORGANISATION`) REFERENCES `organisation` (`IDORGANISATION`),
  ADD CONSTRAINT `FK_CONTACT_ORGANISATION_PERSON` FOREIGN KEY (`IDCONTACT`) REFERENCES `personne` (`IDPERSONNE`);

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `PERSONNE_IBFK_1` FOREIGN KEY (`IDSPECIALITE`) REFERENCES `specialite` (`IDSPECIALITE`),
  ADD CONSTRAINT `PERSONNE_IBFK_2` FOREIGN KEY (`IDROLE`) REFERENCES `role` (`IDROLE`);

--
-- Contraintes pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `PROMOTION_IBFK_3` FOREIGN KEY (`ANNEESCOL`) REFERENCES `anneescol` (`ANNEESCOL`),
  ADD CONSTRAINT `PROMOTION_IBFK_4` FOREIGN KEY (`IDPERSONNE`) REFERENCES `personne` (`IDPERSONNE`),
  ADD CONSTRAINT `PROMOTION_IBFK_5` FOREIGN KEY (`NUMCLASSE`) REFERENCES `classe` (`NUMCLASSE`);

--
-- Contraintes pour la table `stage`
--
ALTER TABLE `stage`
  ADD CONSTRAINT `FK_STAGE_ANNEESCOL` FOREIGN KEY (`ANNEESCOL`) REFERENCES `anneescol` (`ANNEESCOL`),
  ADD CONSTRAINT `FK_STAGE_ORGANISATION` FOREIGN KEY (`IDORGANISATION`) REFERENCES `organisation` (`IDORGANISATION`),
  ADD CONSTRAINT `FK_STAGE_PERSONNE` FOREIGN KEY (`IDETUDIANT`) REFERENCES `personne` (`IDPERSONNE`),
  ADD CONSTRAINT `FK_STAGE_PERSONNE1` FOREIGN KEY (`IDETUDIANT`) REFERENCES `personne` (`IDPERSONNE`),
  ADD CONSTRAINT `FK_STAGE_PERSONNE2` FOREIGN KEY (`IDETUDIANT`) REFERENCES `personne` (`IDPERSONNE`),
  ADD CONSTRAINT `FK_STAGE_PERSONNE3` FOREIGN KEY (`IDPROFESSEUR`) REFERENCES `personne` (`IDPERSONNE`),
  ADD CONSTRAINT `FK_STAGE_PERSONNE4` FOREIGN KEY (`IDMAITRESTAGE`) REFERENCES `personne` (`IDPERSONNE`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
