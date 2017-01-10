-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 10 Janvier 2017 à 13:45
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

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

CREATE TABLE `assaisonner` (
  `idProduit` int(11) NOT NULL,
  `idSauce` int(11) NOT NULL
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

CREATE TABLE `boisson` (
  `volume` float NOT NULL,
  `idProduit` int(11) NOT NULL
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

CREATE TABLE `commande` (
  `idCommande` int(11) NOT NULL,
  `dateHeure` datetime NOT NULL,
  `heureRetrait` time NOT NULL,
  `idUser` int(11) NOT NULL,
  `idTypeRetrait` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `comporter` (
  `idMenu` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL
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

CREATE TABLE `contenir` (
  `idIngredient` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL
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

CREATE TABLE `dessert` (
  `idProduit` int(11) NOT NULL
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

CREATE TABLE `ingredient` (
  `idIngredient` int(11) NOT NULL,
  `nomIngredient` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `menu` (
  `idMenu` int(11) NOT NULL,
  `prixMenu` float NOT NULL,
  `nomMenu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `posseder` (
  `idMenu` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL
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

CREATE TABLE `produit` (
  `idProduit` int(11) NOT NULL,
  `nomProduit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `role` (
  `idRole` int(11) NOT NULL,
  `nomRole` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `sandwich` (
  `temperaturePain` tinyint(1) NOT NULL,
  `idProduit` int(11) NOT NULL
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

CREATE TABLE `sauce` (
  `idSauce` int(11) NOT NULL,
  `nomSauce` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `typeretrait` (
  `idTypeRetrait` int(11) NOT NULL,
  `nomTypeRetrait` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nomUser` varchar(255) NOT NULL,
  `prenomUser` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` text,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `idRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `nomUser`, `prenomUser`, `email`, `tel`, `login`, `mdp`, `idRole`) VALUES
(1, 'richard', 'antoine', 'dfngdf@sidbo.com', '0147852369', 'arichard', 'faf7f638eaa04391f43c8bc1024123b747afc6d6', 1),
(2, 'sabaron', 'benjamin', 'obfgoubf@sdb.df', '0258796413', 'bsabaron', 'eb3b326139faaaa21ab0b3c3a75995d01649707d', 2),
(3, 'dijoux', 'ludovic', 'hdbifbsd@hsbdh.df', '0258796417', 'ldijoux', 'b657bda387fee9bdcb0c17df4c650738f72659c2', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `assaisonner`
--
ALTER TABLE `assaisonner`
  ADD PRIMARY KEY (`idProduit`,`idSauce`),
  ADD KEY `FK_ASSAISONNER_idSauce` (`idSauce`);

--
-- Index pour la table `boisson`
--
ALTER TABLE `boisson`
  ADD PRIMARY KEY (`idProduit`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`),
  ADD KEY `FK_COMMANDE_idUser` (`idUser`),
  ADD KEY `FK_COMMANDE_idTypeRetrait` (`idTypeRetrait`);

--
-- Index pour la table `comporter`
--
ALTER TABLE `comporter`
  ADD PRIMARY KEY (`idMenu`,`idCommande`),
  ADD KEY `FK_COMPORTER_idCommande` (`idCommande`);

--
-- Index pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD PRIMARY KEY (`idIngredient`,`idProduit`),
  ADD KEY `FK_CONTENIR_idProduit` (`idProduit`);

--
-- Index pour la table `dessert`
--
ALTER TABLE `dessert`
  ADD PRIMARY KEY (`idProduit`);

--
-- Index pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`idIngredient`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idMenu`);

--
-- Index pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD PRIMARY KEY (`idMenu`,`idProduit`),
  ADD KEY `FK_POSSEDER_idProduit` (`idProduit`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`);

--
-- Index pour la table `sandwich`
--
ALTER TABLE `sandwich`
  ADD PRIMARY KEY (`idProduit`);

--
-- Index pour la table `sauce`
--
ALTER TABLE `sauce`
  ADD PRIMARY KEY (`idSauce`);

--
-- Index pour la table `typeretrait`
--
ALTER TABLE `typeretrait`
  ADD PRIMARY KEY (`idTypeRetrait`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `FK_USER_idRole` (`idRole`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `idIngredient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `idMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `sauce`
--
ALTER TABLE `sauce`
  MODIFY `idSauce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `typeretrait`
--
ALTER TABLE `typeretrait`
  MODIFY `idTypeRetrait` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
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
