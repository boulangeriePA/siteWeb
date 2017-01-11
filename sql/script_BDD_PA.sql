-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 10 Janvier 2017 à 13:09
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `boulangeriepa`
--
CREATE DATABASE IF NOT EXISTS `boulangeriepa` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `boulangeriepa`;

-- --------------------------------------------------------

--
-- Structure de la table `assaisonner`
--

DROP TABLE IF EXISTS `assaisonner`;
CREATE TABLE IF NOT EXISTS `assaisonner` (
  `idProduit` int(11) NOT NULL,
  `idSauce` int(11) NOT NULL,
  PRIMARY KEY (`idProduit`,`idSauce`),
  KEY `FK_ASSAISONNER_idSauce` (`idSauce`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `assaisonner`
--

INSERT INTO `assaisonner` (`idProduit`, `idSauce`) VALUES
(5, 1),
(6, 1),
(6, 2),
(5, 3),
(5, 4),
(6, 4),
(5, 5),
(5, 6);

-- --------------------------------------------------------

--
-- Structure de la table `boisson`
--

DROP TABLE IF EXISTS `boisson`;
CREATE TABLE IF NOT EXISTS `boisson` (
  `volume` float NOT NULL,
  `idProduit` int(11) NOT NULL,
  PRIMARY KEY (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `boisson`
--

INSERT INTO `boisson` (`volume`, `idProduit`) VALUES
(33, 1),
(25, 2),
(33, 3),
(33, 4);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `dateHeure` datetime NOT NULL,
  `heureRetrait` time NOT NULL,
  `idUser` int(11) NOT NULL,
  `idTypeRetrait` int(11) NOT NULL,
  PRIMARY KEY (`idCommande`),
  KEY `FK_COMMANDE_idUser` (`idUser`),
  KEY `FK_COMMANDE_idTypeRetrait` (`idTypeRetrait`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `dateHeure`, `heureRetrait`, `idUser`, `idTypeRetrait`) VALUES
(1, '2017-01-09 11:00:00', '11:45:00', 1, 1),
(2, '2017-01-10 11:07:00', '12:00:00', 1, 2),
(3, '2017-01-11 10:39:00', '11:30:00', 2, 1),
(4, '2017-01-13 12:00:00', '12:45:00', 2, 1),
(5, '2017-01-16 09:17:00', '12:00:00', 3, 2),
(6, '2017-01-10 11:13:00', '12:15:00', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `comporter`
--

DROP TABLE IF EXISTS `comporter`;
CREATE TABLE IF NOT EXISTS `comporter` (
  `idMenu` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL,
  PRIMARY KEY (`idMenu`,`idCommande`),
  KEY `FK_COMPORTER_idCommande` (`idCommande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `comporter`
--

INSERT INTO `comporter` (`idMenu`, `idCommande`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6);

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

DROP TABLE IF EXISTS `contenir`;
CREATE TABLE IF NOT EXISTS `contenir` (
  `idIngredient` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  PRIMARY KEY (`idIngredient`,`idProduit`),
  KEY `FK_CONTENIR_idProduit` (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `contenir`
--

INSERT INTO `contenir` (`idIngredient`, `idProduit`) VALUES
(3, 5),
(5, 5),
(6, 5),
(7, 5),
(1, 6),
(4, 6),
(1, 7),
(4, 7),
(7, 7);

-- --------------------------------------------------------

--
-- Structure de la table `dessert`
--

DROP TABLE IF EXISTS `dessert`;
CREATE TABLE IF NOT EXISTS `dessert` (
  `idProduit` int(11) NOT NULL,
  PRIMARY KEY (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `dessert`
--

INSERT INTO `dessert` (`idProduit`) VALUES
(8),
(9),
(10);

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `idIngredient` int(11) NOT NULL AUTO_INCREMENT,
  `nomIngredient` varchar(255) NOT NULL,
  PRIMARY KEY (`idIngredient`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ingredient`
--

INSERT INTO `ingredient` (`idIngredient`, `nomIngredient`) VALUES
(1, 'Poulet'),
(2, 'Porc'),
(3, 'Emmental'),
(4, 'Riot'),
(5, 'Steak'),
(6, 'Frites'),
(7, 'Tomate');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `idMenu` int(11) NOT NULL AUTO_INCREMENT,
  `prixMenu` float NOT NULL,
  `nomMenu` varchar(255) NOT NULL,
  PRIMARY KEY (`idMenu`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`idMenu`, `prixMenu`, `nomMenu`) VALUES
(1, 5.3, 'Sandwich Froid + Boisson ou Dessert'),
(2, 5.5, 'Panini + Boisson ou Dessert'),
(3, 6.4, 'Sandwich Froid + Boisson + Dessert'),
(4, 7, 'Panini + Boisson + Dessert'),
(5, 6.1, 'Américain + Boisson ou Dessert'),
(6, 8, 'Américain + Boisson + Dessert');

-- --------------------------------------------------------

--
-- Structure de la table `posseder`
--

DROP TABLE IF EXISTS `posseder`;
CREATE TABLE IF NOT EXISTS `posseder` (
  `idMenu` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  PRIMARY KEY (`idMenu`,`idProduit`),
  KEY `FK_POSSEDER_idProduit` (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `posseder`
--

INSERT INTO `posseder` (`idMenu`, `idProduit`) VALUES
(1, 1),
(5, 1),
(2, 3),
(5, 5),
(2, 6),
(1, 7);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  `nomProduit` varchar(255) NOT NULL,
  PRIMARY KEY (`idProduit`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `nomProduit`) VALUES
(1, 'Coca'),
(2, 'Orangina'),
(3, 'Sprite'),
(4, 'IceTea'),
(5, 'Américain'),
(6, 'Panini'),
(7, 'Sandwich'),
(8, 'Cookies'),
(9, 'Tarte aux pommes'),
(10, 'Muffins');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `idRole` int(11) NOT NULL AUTO_INCREMENT,
  `nomRole` varchar(255) NOT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`idRole`, `nomRole`) VALUES
(1, 'Administrateur'),
(2, 'Client'),
(3, 'Boulanger');

-- --------------------------------------------------------

--
-- Structure de la table `sandwich`
--

DROP TABLE IF EXISTS `sandwich`;
CREATE TABLE IF NOT EXISTS `sandwich` (
  `temperaturePain` tinyint(1) NOT NULL,
  `idProduit` int(11) NOT NULL,
  PRIMARY KEY (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sandwich`
--

INSERT INTO `sandwich` (`temperaturePain`, `idProduit`) VALUES
(1, 5),
(1, 6),
(0, 7);

-- --------------------------------------------------------

--
-- Structure de la table `sauce`
--

DROP TABLE IF EXISTS `sauce`;
CREATE TABLE IF NOT EXISTS `sauce` (
  `idSauce` int(11) NOT NULL AUTO_INCREMENT,
  `nomSauce` varchar(255) NOT NULL,
  PRIMARY KEY (`idSauce`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sauce`
--

INSERT INTO `sauce` (`idSauce`, `nomSauce`) VALUES
(1, 'Ketchup'),
(2, 'Blanche'),
(3, 'Mayonnaise'),
(4, 'Barbecue'),
(5, 'Samouraï'),
(6, 'Moutarde');

-- --------------------------------------------------------

--
-- Structure de la table `typeretrait`
--

DROP TABLE IF EXISTS `typeretrait`;
CREATE TABLE IF NOT EXISTS `typeretrait` (
  `idTypeRetrait` int(11) NOT NULL AUTO_INCREMENT,
  `nomTypeRetrait` varchar(255) NOT NULL,
  PRIMARY KEY (`idTypeRetrait`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `typeretrait`
--

INSERT INTO `typeretrait` (`idTypeRetrait`, `nomTypeRetrait`) VALUES
(1, 'Sur place'),
(2, 'Á emporter');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nomUser` varchar(255) NOT NULL,
  `prenomUser` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` text,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `idRole` int(11) NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `login` (`login`),
  KEY `FK_USER_idRole` (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `nomUser`, `prenomUser`, `email`, `tel`, `login`, `mdp`, `idRole`) VALUES
(1, 'richard', 'antoine', 'dfngdf@sidbo.com', '0147852369', 'arichard', 'faf7f638eaa04391f43c8bc1024123b747afc6d6', 1),
(2, 'sabaron', 'benjamin', 'obfgoubf@sdb.df', '0258796413', 'bsabaron', 'eb3b326139faaaa21ab0b3c3a75995d01649707d', 2),
(3, 'dijoux', 'ludovic', 'hdbifbsd@hsbdh.df', '0258796417', 'ldijoux', 'b657bda387fee9bdcb0c17df4c650738f72659c2', 3);


-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `assaisonner`
--
ALTER TABLE `assaisonner`
  ADD CONSTRAINT `FK_ASSAISONNER_idProduit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`),
  ADD CONSTRAINT `FK_ASSAISONNER_idSauce` FOREIGN KEY (`idSauce`) REFERENCES `sauce` (`idSauce`);

--
-- Contraintes pour la table `boisson`
--
ALTER TABLE `boisson`
  ADD CONSTRAINT `FK_BOISSON_idProduit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_COMMANDE_idTypeRetrait` FOREIGN KEY (`idTypeRetrait`) REFERENCES `typeretrait` (`idTypeRetrait`),
  ADD CONSTRAINT `FK_COMMANDE_idUser` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Contraintes pour la table `comporter`
--
ALTER TABLE `comporter`
  ADD CONSTRAINT `FK_COMPORTER_idCommande` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`),
  ADD CONSTRAINT `FK_COMPORTER_idMenu` FOREIGN KEY (`idMenu`) REFERENCES `menu` (`idMenu`);

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `FK_CONTENIR_idIngredient` FOREIGN KEY (`idIngredient`) REFERENCES `ingredient` (`idIngredient`),
  ADD CONSTRAINT `FK_CONTENIR_idProduit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`);

--
-- Contraintes pour la table `dessert`
--
ALTER TABLE `dessert`
  ADD CONSTRAINT `FK_DESSERT_idProduit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`);

--
-- Contraintes pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD CONSTRAINT `FK_POSSEDER_idMenu` FOREIGN KEY (`idMenu`) REFERENCES `menu` (`idMenu`),
  ADD CONSTRAINT `FK_POSSEDER_idProduit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`);

--
-- Contraintes pour la table `sandwich`
--
ALTER TABLE `sandwich`
  ADD CONSTRAINT `FK_SANDWICH_idProduit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_USER_idRole` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
