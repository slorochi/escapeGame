-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 16 mars 2022 à 07:34
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bloc`
--

-- --------------------------------------------------------

--
-- Structure de la table `escapegame`
--

DROP TABLE IF EXISTS `escapegame`;
CREATE TABLE IF NOT EXISTS `escapegame` (
  `idEscape` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `niveau` int(11) NOT NULL,
  `idType` int(11) NOT NULL,
  `adresse` varchar(60) NOT NULL,
  `cp` int(11) NOT NULL,
  `ville` varchar(60) NOT NULL,
  PRIMARY KEY (`idEscape`),
  KEY `idType` (`idType`),
  KEY `niveau` (`niveau`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `escapegame`
--

INSERT INTO `escapegame` (`idEscape`, `nom`, `niveau`, `idType`, `adresse`, `cp`, `ville`) VALUES
(1, 'EscapePierre', 1, 1, '2 route des barbue qui pue', 28100, 'Dreux'),
(2, 'EscapePasla', 3, 3, '2 rue des chateau', 75000, 'Paris'),
(3, 'La pierre de lumiere', 1, 1, '11 rue Desprez', 75014, 'Paris'),
(4, 'mission yakuza', 2, 2, '23 rue servan', 75011, 'Paris');

-- --------------------------------------------------------

--
-- Structure de la table `jouer`
--

DROP TABLE IF EXISTS `jouer`;
CREATE TABLE IF NOT EXISTS `jouer` (
  `idUser` int(11) DEFAULT NULL,
  `idEscape` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `temps` varchar(10) NOT NULL,
  `note` int(5) NOT NULL,
  `message` varchar(100) NOT NULL,
  KEY `idUser` (`idUser`),
  KEY `idEscape` (`idEscape`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
CREATE TABLE IF NOT EXISTS `niveau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  `ordreNiveau` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`id`, `titre`, `description`, `ordreNiveau`) VALUES
(1, 'Boulet', 'Niveau de découverte', 1),
(2, 'Apprenti', 'S\'échappe pas si mal', 2),
(3, 'Chercheur', 'en cours de recherche', 3),
(4, 'Maitre', 'Le talent a l\'état pur', 4),
(5, 'Elu des douzes', 'Dieu de l\'énigme et de la fuite', 5);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `idType` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`idType`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`idType`, `nom`, `description`) VALUES
(1, 'Horreur', 'Escape Game d\'horreur'),
(2, 'Fantaisie', 'Escape Game Fantaisie'),
(3, 'Médiéval ', 'Escape Game Médiéval');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(47) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `niveau` int(11) NOT NULL,
  `adresse` varchar(60) NOT NULL,
  `cp` int(11) NOT NULL,
  `ville` varchar(60) NOT NULL,
  PRIMARY KEY (`idUser`),
  KEY `niveau` (`niveau`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `nom`, `email`, `mdp`, `niveau`, `adresse`, `cp`, `ville`) VALUES
(1, 'Anthony', 'Anthony@gmail.com', '123', 2, '2 rue des champs de blé', 28120, 'Dreux'),
(2, 'Theo', 'Theo@gmail.com', '456', 1, '5rue des league of legend', 28100, 'Blizzard'),
(3, 'Gaétan', 'Gaetan@gmail.com', '789', 5, '22 rue des putain de beaux goss', 28800, 'Bonneval'),
(4, 'Océane', 'Oceane@gmail.com', 'motdepasse', 3, '2 rue des nenufard', 28100, 'Dauville');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `escapegame`
--
ALTER TABLE `escapegame`
  ADD CONSTRAINT `escapegame_ibfk_1` FOREIGN KEY (`niveau`) REFERENCES `niveau` (`id`),
  ADD CONSTRAINT `escapegame_ibfk_2` FOREIGN KEY (`idType`) REFERENCES `type` (`idType`);

--
-- Contraintes pour la table `jouer`
--
ALTER TABLE `jouer`
  ADD CONSTRAINT `jouer_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `jouer_ibfk_2` FOREIGN KEY (`idEscape`) REFERENCES `escapegame` (`idEscape`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`niveau`) REFERENCES `niveau` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
