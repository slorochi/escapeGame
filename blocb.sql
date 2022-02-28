-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 28, 2022 at 08:08 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blocb`
--

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

CREATE TABLE `avis` (
  `message` varchar(250) NOT NULL,
  `note` int(11) NOT NULL,
  `date` date NOT NULL,
  `idAvis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `escapegame`
--

CREATE TABLE `escapegame` (
  `idEscape` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `niveau` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `adresse` varchar(60) NOT NULL,
  `cp` int(11) NOT NULL,
  `ville` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jouer`
--

CREATE TABLE `jouer` (
  `idUser` int(11) NOT NULL,
  `idEscape` int(11) NOT NULL,
  `date` date NOT NULL,
  `temps` varchar(10) NOT NULL,
  `idAvis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `niveau`
--

CREATE TABLE `niveau` (
  `id` int(11) NOT NULL,
  `titre` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idEscape` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nom` varchar(47) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `niveau` int(11) NOT NULL,
  `adresse` varchar(60) NOT NULL,
  `cp` int(11) NOT NULL,
  `ville` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`idAvis`);

--
-- Indexes for table `escapegame`
--
ALTER TABLE `escapegame`
  ADD PRIMARY KEY (`idEscape`);

--
-- Indexes for table `jouer`
--
ALTER TABLE `jouer`
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idEscape` (`idEscape`),
  ADD KEY `idAvis` (`idAvis`);

--
-- Indexes for table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idEscape` (`idEscape`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avis`
--
ALTER TABLE `avis`
  MODIFY `idAvis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `escapegame`
--
ALTER TABLE `escapegame`
  MODIFY `idEscape` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jouer`
--
ALTER TABLE `jouer`
  ADD CONSTRAINT `jouer_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `jouer_ibfk_2` FOREIGN KEY (`idEscape`) REFERENCES `escapegame` (`idEscape`),
  ADD CONSTRAINT `jouer_ibfk_3` FOREIGN KEY (`idAvis`) REFERENCES `avis` (`idAvis`);

--
-- Constraints for table `niveau`
--
ALTER TABLE `niveau`
  ADD CONSTRAINT `niveau_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `niveau_ibfk_2` FOREIGN KEY (`idEscape`) REFERENCES `escapegame` (`idEscape`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
