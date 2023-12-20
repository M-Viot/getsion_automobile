-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 20 déc. 2023 à 18:04
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `5team`
--

-- --------------------------------------------------------

--
-- Structure de la table `car`
--

DROP TABLE IF EXISTS `car`;
CREATE TABLE IF NOT EXISTS `car` (
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `id_num` varchar(15) NOT NULL,
  `gas` varchar(10) NOT NULL,
  `price` float NOT NULL,
  `is_new` tinyint NOT NULL,
  `is_reserved` tinyint NOT NULL,
  PRIMARY KEY (`id_num`),
  UNIQUE KEY `id_num` (`id_num`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `car`
--

INSERT INTO `car` (`brand`, `model`, `id_num`, `gas`, `price`, `is_new`, `is_reserved`) VALUES
('Volkswagen', 'Golf', 'HQ-961-PE', 'Gasole', 11258, 0, 0),
('Ford', 'Mondéo', 'CT-447-IJ', 'GPL', 18221, 0, 0),
('Citroën', 'Berlingo', 'PD-112-QV', 'Gasole', 14871, 1, 0),
('Citroën', 'C4', 'BG-644-WK', 'Essence', 13585, 0, 0),
('Peugeot', '2008', 'WV-917-OM', 'Électrique', 18833, 0, 1),
('Audi', 'A3', 'BW-252-RY', 'Essence', 16778, 0, 1),
('Volkswagen', 'Touran', 'SW-155-FP', 'Gasole', 19788, 1, 1),
('Audi', 'a5', 'CL-117-UI', 'Essence', 18967, 0, 0),
('Fiat', '500', 'KC-821-GJ', 'Électrique', 17631, 0, 0),
('Volkswagen', 'Polo', 'LW-772-XT', 'Essence', 15763, 1, 0),
('Renault', 'Espace', 'IK-733-AP', 'Gasole', 18926, 0, 0),
('Peugeot', '3008', 'QR-571-YC', 'Hybrid', 18898, 1, 0),
('Renault', 'Clio', 'EB-558-KY', 'Essence', 16776, 1, 1),
('Peugeot', 'Donec', 'PV-304-YX', 'Électrique', 11046, 1, 1),
('Audi', 'A8', 'GL-417-LL', 'Essence', 10000, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
