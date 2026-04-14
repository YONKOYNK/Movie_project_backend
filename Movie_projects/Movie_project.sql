-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 14 avr. 2026 à 10:45
-- Version du serveur : 8.0.40
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Movie_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE `films` (
  `id_imdb` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_sortie` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `duree` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `affiche` text COLLATE utf8mb4_general_ci,
  `description` text COLLATE utf8mb4_general_ci,
  `acteurs` text COLLATE utf8mb4_general_ci,
  `note_perso` int DEFAULT NULL,
  `commentaire_perso` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id_imdb`, `titre`, `date_sortie`, `duree`, `affiche`, `description`, `acteurs`, `note_perso`, `commentaire_perso`) VALUES
('tt0114369', 'Seven', '1995', '2h 7m', 'https://m.media-amazon.com/images/M/MV5BY2IzNzMxZjctZjUxZi00YzAxLTk3ZjMtODFjODdhMDU5NDM1XkEyXkFqcGc@._V1_QL75_UX190_CR0,8,190,281_.jpg <view-source:https://m.media-amazon.com/images/M/MV5BY2IzNzMxZjctZjUxZi00YzAxLTk3ZjMtODFjODdhMDU5NDM1XkEyXkFqcGc@._V1_QL75_UX190_CR0,8,190,281_.jpg>', 'Two detectives try to track down a serial killer who chooses his victims based on the Seven Deadly Sins.Two detectives try to track down a serial killer who chooses his victims based on the Seven Deadly Sins.Two detectives try to track down a serial killer who chooses his victims based on the Seven Deadly Sins.', NULL, 5, 'ca va c pas null'),
('tt0167260', 'The Lord of the Rings: The Return of the King', '2003', '3h 21m', 'https://m.media-amazon.com/images/M/MV5BMTZkMjBjNWMtZGI5OC00MGU0LTk4ZTItODg2NWM3NTVmNWQ4XkEyXkFqcGc@._V1_QL75_UX190_CR0,0,190,281_.jpg <view-source:https://m.media-amazon.com/images/M/MV5BMTZkMjBjNWMtZGI5OC00MGU0LTk4ZTItODg2NWM3NTVmNWQ4XkEyXkFqcGc@._V1_QL75_UX190_CR0,0,190,281_.jpg>', 'Gandalf and Aragorn lead the World of Men against Sauron&#x27;s army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring.Gandalf and Aragorn lead the World of Men against Sauron&#x27;s army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring.Gandalf and Aragorn lead the World of Men against Sauron&#x27;s army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring.', '\">Peter Jackson, \">J.R.R. Tolkien, \">Fran Walsh, \">Philippa Boyens, \">Elijah Wood, \">Viggo Mortensen, \">Ian McKellen, \">Peter Jackson, \">J.R.R. Tolkien, \">Fran Walsh, \">Philippa Boyens, \">Elijah Wood, \">Viggo Mortensen, \">Ian McKellen, \" class=\"sc-8eb6700a-1 ixSCdD\">Elijah Wood, \" class=\"sc-8eb6700a-1 ixSCdD\">Viggo Mortensen, \" class=\"sc-8eb6700a-1 ixSCdD\">Ian McKellen, \" class=\"sc-8eb6700a-1 ixSCdD\">Noel Appleby, \" class=\"sc-8eb6700a-1 ixSCdD\">Ali Astin, \" class=\"sc-8eb6700a-1 ixSCdD\">Sean Astin, \" class=\"sc-8eb6700a-1 ixSCdD\">David Aston, \" class=\"sc-8eb6700a-1 ixSCdD\">John Bach, \" class=\"sc-8eb6700a-1 ixSCdD\">Sean Bean, \" class=\"sc-8eb6700a-1 ixSCdD\">Cate Blanchett, \" class=\"sc-8eb6700a-1 ixSCdD\">Orlando Bloom, \" class=\"sc-8eb6700a-1 ixSCdD\">Billy Boyd, \" class=\"sc-8eb6700a-1 ixSCdD\">Sadwyn Brophy, \" class=\"sc-8eb6700a-1 ixSCdD\">Alistair Browning, \" class=\"sc-8eb6700a-1 ixSCdD\">Marton Csokas, \" class=\"sc-8eb6700a-1 ixSCdD\">Richard Edge, \" class=\"sc-8eb6700a-1 ixSCdD\">Jason Fitch, \" class=\"sc-8eb6700a-1 ixSCdD\">Bernard Hill, \">Peter Jackson, \">J.R.R. Tolkien, \">Fran Walsh, \">Philippa Boyens, \">Peter Jackson, \">Aragorn, \">Elijah Wood, \">Howard Shore, \">Fran Walsh, \">Annie Lennox, \">Annie Lennox', 9, 'c bien je kiff');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id_imdb`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
