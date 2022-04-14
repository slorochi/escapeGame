-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 14 avr. 2022 à 19:40
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

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
  `description` text,
  PRIMARY KEY (`idEscape`),
  KEY `idType` (`idType`),
  KEY `niveau` (`niveau`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `escapegame`
--

INSERT INTO `escapegame` (`idEscape`, `nom`, `niveau`, `idType`, `adresse`, `cp`, `ville`, `description`) VALUES
(1, 'EscapePierre', 1, 1, '2 route des barbue qui pue', 28100, 'Dreux', 'Le monde du western est pourtant un univers iconique que toutes les générations sont capables de se représenter en une fraction de seconde, un terreau fertile sur lequel il y a tant à imaginer. Un revolver Colt, un chapeau Stetson, une étoile de shérif, un verre de gnôle et des éperons… Rien que ces quelques accessoires suffisent à transporter au pays de Lucky Luke. Ajoutez un joli et immersif décor comme The Game a l’habitude d’en produire, et vous retrouverez notre équipe en train de s’exercer au lasso et de danser la country !'),
(2, 'EscapePasla', 3, 3, '2 rue des chateau', 75000, 'Paris', 'Le mythique Orient-Express poursuit son voyage en direction d’Istanbul dans le luxe et le calme. Tout d\'un coup, un cri, suivi d’un bruit sourd en provenance de la cabine de Samuel Lioretti, viennent briser le silence de la nuit. Il est mort ! Assassiné… Mais comment est-ce possible ? Sa cabine est fermée de l\'intérieur. Vous êtes les seuls passagers de ce train, le meurtrier ne peut être que parmi vous ! Vous incarnerez les suspects et tous les soupçons pèseront sur vous. Préparez-vous à vivre un huis clos éprouvant et… prenez garde, les apparences sont parfois trompeuses... Saurez-vous être à la hauteur ?'),
(3, 'La pierre de lumière', 1, 1, '11 rue Desprez', 75014, 'Paris', 'Pandore & Associés s’occupe du gardiennage du monde des contes. Cet univers est un subtil mélange de magie, de technologie et de personnages hauts en couleur. Mais ce monde est plus fragile qu’il n’en a l’air… Le moindre dysfonctionnement peut perturber son équilibre. Pour s’assurer qu\'il ne s’effondre pas, Pandore a créé l’unité LXR, garante de sa protection et de son bon fonctionnement. Vous êtes embauché pour de simples opérations de maintenance. Mais si les choses venaient à s’envenimer, nous comptons sur vous pour faire preuve de courage et d’ingéniosité.'),
(4, 'coucou', 2, 2, '2rue des patate', 23489548, 'Dreuxcaze', 'zerzertzerazera');

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
  `note` int(5) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL,
  KEY `idUser` (`idUser`),
  KEY `idEscape` (`idEscape`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jouer`
--

INSERT INTO `jouer` (`idUser`, `idEscape`, `date`, `temps`, `note`, `message`) VALUES
(2, 1, '2022-04-01', '01:18.06', 1, ''),
(3, 3, '2022-04-14', '00:56.18', 4, ''),
(1, 1, '2022-04-09', '00:48.12', 3, 'Pas trop mal, à tester'),
(4, 2, '2022-04-08', '00:48.12', 5, 'Excellent, j\'adore !'),
(1, 3, '2022-04-11', '00:50:54', 5, 'Incroyable !!');

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
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  KEY `niveau` (`niveau`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `nom`, `email`, `mdp`, `niveau`, `adresse`, `cp`, `ville`, `admin`) VALUES
(1, 'Anthony', 'Anthony@gmail.com', '123', 2, '2 rue des antho', 28120, 'Dreux', NULL),
(2, 'Theo', 'Theo@gmail.com', '456', 1, '5rue des league of legend', 28100, 'Blizzard', NULL),
(3, 'Gaétan', 'Gaetan@gmail.com', '324', 2, '22', 28800, 'Bonneval', NULL),
(4, 'Océane', 'Oceane@gmail.com', 'motdepasse', 4, '2 rue des nenufard', 28100, 'Dauville', NULL),
(5, 'admin', 'admin@admin.com', 'admin', 1, '2 rue des dieux', 0, 'Partout', 1);

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
