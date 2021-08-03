-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 03 août 2021 à 12:00
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `espacemembre`
--

-- --------------------------------------------------------

--
-- Structure de la table `cotisation`
--

DROP TABLE IF EXISTS `cotisation`;
CREATE TABLE IF NOT EXISTS `cotisation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `DateCotis` date NOT NULL,
  `Mois` varchar(255) NOT NULL,
  `Motif` varchar(255) NOT NULL,
  `Montant` varchar(255) NOT NULL,
  `Matricule` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Matricule` (`Matricule`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cotisation`
--

INSERT INTO `cotisation` (`id`, `DateCotis`, `Mois`, `Motif`, `Montant`, `Matricule`) VALUES
(27, '2021-07-17', 'JANVIER', 'Inscription', '70000', '2'),
(29, '2021-07-31', 'JANVIER', 'Inscription', '99000', '3'),
(32, '2021-01-05', 'JANVIER', 'Inscription', '98000', '2'),
(33, '2021-02-03', 'FEVRIER', 'Inscription', '95000', '3'),
(34, '2021-01-07', 'JANVIER', 'Inscription', '175000', '4'),
(35, '2021-08-07', 'MARS', 'Mensualite', '65000', '4'),
(36, '2021-06-09', 'AVRIL', 'Inscription', '60000', '10'),
(37, '2021-06-07', 'FEVRIER', 'Inscription', '40000', '11'),
(38, '2021-05-04', 'MARS', 'Mensualite', '25000', '11');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `matricule` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` int NOT NULL,
  PRIMARY KEY (`matricule`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`matricule`, `nom`, `prenom`, `adresse`, `telephone`) VALUES
(1, 'DIOP', 'NOHINE', 'PARCELLES ASSAINIES', 778262184),
(2, 'DIOP', 'AWA', 'SAINT LOUIS', 779181537),
(3, 'MBAYE', 'NDEYE PENDA', 'MARISTE', 777667643),
(4, 'DIOUF', 'MOUSSA', 'REFANE', 777241499),
(5, 'MBAYE', 'NDEYE GNANGA', 'KEUR MASSAR', 777350568),
(8, 'KAMA', 'DIOR', 'MEDINA', 772193222),
(9, 'NDIAYE', 'ALIONE', 'PARCELLES ASSAINIES', 776515264),
(10, 'NDIAYE', 'ADAMA', 'GRAND YOFF', 782666469),
(11, 'DIOUF', 'MAMADOU LAMINE', 'PIKINE', 773966943),
(12, 'DIOP', 'BABACAR', 'RUFISQUE', 703425678);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
