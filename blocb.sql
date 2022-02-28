-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 28 fév. 2022 à 12:31
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
-- Base de données : `blocb`
--
CREATE DATABASE IF NOT EXISTS `blocb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blocb`;

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `message` varchar(250) NOT NULL,
  `note` int(11) NOT NULL,
  `date` date NOT NULL,
  `idAvis` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idAvis`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`message`, `note`, `date`, `idAvis`) VALUES
('Mais putain Gaétan tu l\'as fais deux fois', 4, '2022-02-10', 1),
('Le mec full vénère', 2, '2022-02-10', 2),
('J\'vais pas mentir', 1, '2022-01-12', 3),
('Aled\r\nJ\'ai un problème\r\nJe me suis perdu \r\nS.O.S', 5, '2022-02-10', 4);

-- --------------------------------------------------------

--
-- Structure de la table `escapegame`
--

DROP TABLE IF EXISTS `escapegame`;
CREATE TABLE IF NOT EXISTS `escapegame` (
  `idEscape` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `niveau` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `adresse` varchar(60) NOT NULL,
  `cp` int(11) NOT NULL,
  `ville` varchar(60) NOT NULL,
  PRIMARY KEY (`idEscape`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `escapegame`
--

INSERT INTO `escapegame` (`idEscape`, `nom`, `niveau`, `type`, `adresse`, `cp`, `ville`) VALUES
(1, 'EscapePierre', 1, 'horreur', '2 route des barbue qui pue', 28100, 'Dreux'),
(2, 'escapeXXX', 5, 'Adulte', '3 Rue du 19 Mars 1962', 28630, 'Le Coudray'),
(3, 'EscapePasla', 3, 'medieval', '2 rue des chateau', 75000, 'Paris');

-- --------------------------------------------------------

--
-- Structure de la table `jouer`
--

DROP TABLE IF EXISTS `jouer`;
CREATE TABLE IF NOT EXISTS `jouer` (
  `idUser` int(11) NOT NULL,
  `idEscape` int(11) NOT NULL,
  `date` date NOT NULL,
  `temps` varchar(10) NOT NULL,
  `idAvis` int(11) NOT NULL,
  KEY `idUser` (`idUser`),
  KEY `idEscape` (`idEscape`),
  KEY `idAvis` (`idAvis`)
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
  `idUser` int(11) NOT NULL,
  `idEscape` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`),
  KEY `idEscape` (`idEscape`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(47) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `niveau` int(11) NOT NULL,
  `adresse` varchar(60) NOT NULL,
  `cp` int(11) NOT NULL,
  `ville` varchar(60) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `nom`, `mail`, `mdp`, `niveau`, `adresse`, `cp`, `ville`) VALUES
(1, 'Anthony', 'Antho.ny@gmail.com', 'azerty', 2, '2 rue des champs de blé', 28120, 'Dreux'),
(2, 'Theo', 'theo@gmail.com', 'qwerty', 1, '5rue des league of legend', 28100, 'Blizzard'),
(3, 'Gaétan', 'Gaetan.bg@gmail.fr', '123', 5, '22 rue des putain de beaux goss', 28800, 'Bonneval'),
(4, 'Océane', 'ocean.mer@gmail.com', 'galet', 3, '2 rue des nenufard', 28100, 'Dauville');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `jouer`
--
ALTER TABLE `jouer`
  ADD CONSTRAINT `jouer_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `jouer_ibfk_2` FOREIGN KEY (`idEscape`) REFERENCES `escapegame` (`idEscape`),
  ADD CONSTRAINT `jouer_ibfk_3` FOREIGN KEY (`idAvis`) REFERENCES `avis` (`idAvis`);

--
-- Contraintes pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD CONSTRAINT `niveau_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `niveau_ibfk_2` FOREIGN KEY (`idEscape`) REFERENCES `escapegame` (`idEscape`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
