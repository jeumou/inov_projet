-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 16 jan. 2024 à 12:45
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `membres`
--

-- --------------------------------------------------------

--
-- Structure de la table `chats`
--

CREATE TABLE `chats` (
  `chat_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `opened` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chats`
--

INSERT INTO `chats` (`chat_id`, `from_id`, `to_id`, `message`, `opened`, `created_at`) VALUES
(34, 78, 52, 'BONJOUE', 1, '2023-12-28 15:27:11'),
(35, 78, 52, 'yo', 1, '2023-12-28 15:38:20'),
(36, 52, 78, 'bonjour', 1, '2023-12-28 15:40:40'),
(37, 78, 52, 'ok', 1, '2023-12-28 15:40:50'),
(38, 52, 78, 'yo\n', 1, '2023-12-28 15:41:27'),
(39, 78, 52, 'ok', 1, '2023-12-28 15:41:33'),
(40, 52, 78, 'bonjour\n', 0, '2023-12-28 15:51:01'),
(41, 52, 78, 'ikj', 0, '2023-12-28 15:53:47'),
(42, 43, 52, 'hi', 1, '2023-12-28 21:30:06'),
(43, 43, 52, 'hello', 1, '2023-12-28 21:32:55'),
(44, 43, 52, 'hi', 1, '2023-12-29 13:09:07');

-- --------------------------------------------------------

--
-- Structure de la table `communiquer`
--

CREATE TABLE `communiquer` (
  `ID_STAGIAIRE` bigint(4) NOT NULL,
  `MATRICULE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `conversations`
--

CREATE TABLE `conversations` (
  `conversation_id` int(11) NOT NULL,
  `user_1` int(11) NOT NULL,
  `user_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `conversations`
--

INSERT INTO `conversations` (`conversation_id`, `user_1`, `user_2`) VALUES
(5, 43, 52);

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `id_equipe` int(11) NOT NULL,
  `nom_equipe` varchar(30) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`id_equipe`, `nom_equipe`, `description`) VALUES
(1, 'dev', 'les developpeurs'),
(3, 'les chomeurs', 'la pauvrete est du...'),
(4, 'politesse', 'dire bonjour'),
(5, 'savoir', 'savoir parler'),
(6, 'jeumou laurelle', 'les developpeurs'),
(7, 'les bir', 'la pauvrete est du...'),
(10, 'taureau', 'plus fort');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tel` int(11) NOT NULL,
  `city` varchar(30) NOT NULL,
  `Rule` varchar(30) NOT NULL,
  `id_equipe` int(11) NOT NULL,
  `last_seen` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `username`, `email`, `password`, `tel`, `city`, `Rule`, `id_equipe`, `last_seen`) VALUES
(43, 'jeumou laurelle', 'jeumou@gmail.com', '$2y$10$CZHeuPPkoqskIa79JZGxhO.GQ1O94TycadQlBKi/kr5rvi4IlUE8G', 681505417, 'Douala', 'admin', 1, NULL),
(52, 'jovani', 'jojo@gmail.com', '$2y$10$S78iO9GhMrfTAnEaWy/CZun5EKwUdotm3nJ8gx6M9RsRgX7wcyEsu', 678782231, 'doul', 'stagiaire', 1, NULL),
(53, 'cerie', 'ceri@gmail.com', '$2y$10$ks0uGiuuUPQXjclPpU9gL.PLQkNtIyKVeWu4EB31rnSa4DWzLJH8C', 2147483647, 'pariso', 'Stagiaire', 3, NULL),
(56, 'laurelle ngongang', 'ngongang@gmail.com', '$2y$10$fpsqGdM0x6Gaic3Gx47IyeVPGsGbrcsWyUTflizkjMeahLe.yoQjm', 23456789, 'douala', 'stagiaire', 5, NULL),
(57, 'laurelle ngongang', 'ngongang@gmail.com', '$2y$10$mNYoiPnrhSOSNiUX.JjYjedAGASE2P0J19VE37ECf9zaj2bSuVaAu', 681505417, 'douala', 'stagiaire', 4, NULL),
(58, 'laurelle ngongang', 'ngongang@gmail.com', '$2y$10$bJbAH5yxjrTmok4TboTg2e1NYtjDR2va5dX7rNH3glu7QefrnCdtm', 12345789, 'douala', 'admin', 0, NULL),
(61, 'vandi', 'van@gmail.com', '$2y$10$z5BVqhybQfjgZuAmlbHj8O8HVA7pUtAzp1FuHN24.wzVhVM5HCBYa', 234567890, 'ebolowa', 'Stagiaire', 5, NULL),
(62, 'loic', 'loic@gmail.com', '$2y$10$KvUHPWfKNnwJcYgPxhwTEeK1msZbU.yDLYxqd1dWijYeizYFNy4ve', 45678, 'Douala', 'Stagiaire', 4, NULL),
(65, 'laurelle', 'jeumou@gmail.com', '$2y$10$F9ECuPty9LinhjHWDU7SdeDTl14op1zgnc0rfOFU57bfErM92364C', 34356789, 'douala', 'Stagiaire', 7, NULL),
(66, 'valdes soa', 'valdes@gmail.com', '$2y$10$GrIHpPru2ScvnDY6ptP5PeDP/ePHojizBkT6GhU5sOkaXl2D64CLe', 134567990, 'yaounde', 'Stagiaire', 10, NULL),
(68, 'charly', 'charly@gmail.com', '$2y$10$C9YBaRLfqRdZAsRRr4KmXO.nlOVZetibGBCfGfogjseCaLWuEL8T.', 674535536, 'yaounde', 'Stagiaire', 7, NULL),
(69, 'sandra', 'sandra@gmail.com', '$2y$10$Narn3QohmeZ1ClS3mSe/YOFK4RLfyau9nwqYx0VCKcJ1DErtftzJy', 654321189, 'limbe', 'Stagiaire', 10, NULL),
(70, 'PEGUY', 'peguynk10@gmail.com', '$2y$10$I39tUNJ.h7KS/KvhgXZ7gOX0wmtTkfzAEStxlQ5OJ6549Fbgdroky', 678563771, 'douala', 'encadreur', 1, NULL),
(71, 'DAMASE MBA', 'damase@gmail.com', '$2y$10$96mWhE1DNZEj2larEWcXh.33xyapLUIvkf.ykJFV7rYYoVxTxR0uC', 678543212, 'douala', 'encadreur', 7, NULL),
(72, 'MICHAEL', 'michael@gmail.com', '$2y$10$iU2XNLDbweReUuASho2NS.O3tiDmgpIkXQXiaERQ4YAFxl5xZN/bS', 675432145, 'yaounde', 'encadreur', 4, NULL),
(73, 'zacharie', 'z@gmail.com', '6M9RsRgX7wcyEsu', 677699239, 'yaounde', 'stagiaire', 1, NULL),
(74, 'honorine', 'honorine@gmail.com', '$2y$10$RtK8VeHsD.eYbc9U7E4bMe/WHt3gRgoEaTurdMBvD0cG44rXJ8QIi', 677418941, 'yaounde', 'Stagiaire', 7, NULL),
(77, 'HUBERT', 'hub@gmail.com', '$2y$10$mWxwoiFIa9QLCuJ07ol0Auy2Hv8GZeAOQLast5aeLOoCtkQnvd2Iu', 650142828, 'douala', 'encadreur', 1, NULL),
(78, 'ciara', 'ciara@gmail.com', '$2y$10$29u./AvTDoOjXpwL9z2/9uDi6eqvFVae1nzFYz9e29CciXzBi5a/G', 677654321, 'douala', 'Stagiaire', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `personnels`
--

CREATE TABLE `personnels` (
  `MATRICULE` varchar(255) NOT NULL,
  `NOM` varchar(255) DEFAULT NULL,
  `PRENOM` varchar(255) DEFAULT NULL,
  `VILLLE` varchar(255) DEFAULT NULL,
  `TEL` varchar(255) DEFAULT NULL,
  `ROLE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `presence`
--

CREATE TABLE `presence` (
  `ID_PRESENCE` int(11) NOT NULL,
  `ID_STAGIAIRE` int(11) NOT NULL,
  `STATUT` varchar(30) NOT NULL,
  `DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `presence`
--

INSERT INTO `presence` (`ID_PRESENCE`, `ID_STAGIAIRE`, `STATUT`, `DATE`) VALUES
(4, 53, 'present', '2023-09-28'),
(5, 56, 'absent', '2023-09-28'),
(6, 57, 'permissionnaire', '2023-09-28'),
(7, 61, 'permissionnaire', '2023-09-28'),
(8, 62, 'absent', '2023-09-28'),
(9, 65, 'present', '2023-09-28'),
(10, 53, 'absent', '2023-09-30'),
(11, 56, 'present', '2023-09-30'),
(12, 57, 'present', '2023-09-30'),
(13, 61, 'present', '2023-09-30'),
(14, 62, 'present', '2023-09-30'),
(15, 65, 'present', '2023-09-30'),
(16, 52, 'present', '2023-10-03'),
(17, 53, 'absent', '2023-10-03'),
(18, 56, 'absent', '2023-10-03'),
(19, 57, 'permissionnaire', '2023-10-03'),
(20, 61, 'absent', '2023-10-03'),
(21, 62, 'permissionnaire', '2023-10-03'),
(22, 65, 'present', '2023-10-03'),
(23, 66, 'absent', '2023-10-03'),
(24, 52, 'present', '2023-10-26'),
(25, 53, 'absent', '2023-10-26'),
(26, 56, 'absent', '2023-10-26'),
(27, 57, 'absent', '2023-10-26'),
(28, 61, 'permissionnaire', '2023-10-26'),
(29, 62, 'permissionnaire', '2023-10-26'),
(30, 65, 'permissionnaire', '2023-10-26'),
(31, 66, 'present', '2023-10-26'),
(32, 68, 'present', '2023-10-26'),
(33, 69, 'permissionnaire', '2023-10-26'),
(34, 74, 'absent', '2023-10-26'),
(35, 52, 'present', '2023-11-19'),
(36, 53, 'present', '2023-11-19'),
(37, 56, 'absent', '2023-11-19'),
(38, 57, 'absent', '2023-11-19'),
(39, 61, 'present', '2023-11-19'),
(40, 62, 'permissionnaire', '2023-11-19'),
(41, 65, 'present', '2023-11-19'),
(42, 66, 'absent', '2023-11-19'),
(43, 68, 'permissionnaire', '2023-11-19'),
(44, 69, 'absent', '2023-11-19'),
(45, 74, 'present', '2023-11-19'),
(46, 52, 'present', '2023-12-12'),
(47, 53, 'present', '2023-12-12'),
(48, 56, 'absent', '2023-12-12'),
(49, 57, 'absent', '2023-12-12'),
(50, 61, 'present', '2023-12-12'),
(51, 62, 'permissionnaire', '2023-12-12'),
(52, 65, 'present', '2023-12-12'),
(53, 66, 'permissionnaire', '2023-12-12'),
(54, 68, 'present', '2023-12-12'),
(55, 69, 'absent', '2023-12-12'),
(56, 73, 'present', '2023-12-12'),
(57, 74, 'present', '2023-12-12'),
(58, 52, 'permissionnaire', '2023-12-13'),
(59, 53, 'present', '2023-12-13'),
(60, 56, 'present', '2023-12-13'),
(61, 57, 'absent', '2023-12-13'),
(62, 61, 'present', '2023-12-13'),
(63, 62, 'absent', '2023-12-13'),
(64, 65, 'present', '2023-12-13'),
(65, 66, 'present', '2023-12-13'),
(66, 68, 'permissionnaire', '2023-12-13'),
(67, 69, 'absent', '2023-12-13'),
(68, 73, 'present', '2023-12-13'),
(69, 74, 'present', '2023-12-13'),
(70, 52, 'absent', '2023-12-14'),
(71, 53, 'absent', '2023-12-14'),
(72, 56, 'present', '2023-12-14'),
(73, 57, 'permissionnaire', '2023-12-14'),
(74, 61, 'present', '2023-12-14'),
(75, 62, 'absent', '2023-12-14'),
(76, 65, 'present', '2023-12-14'),
(77, 66, 'present', '2023-12-14'),
(78, 68, 'present', '2023-12-14'),
(79, 69, 'present', '2023-12-14'),
(80, 73, 'permissionnaire', '2023-12-14'),
(81, 74, 'present', '2023-12-14'),
(82, 52, 'present', '2023-12-26'),
(83, 53, 'present', '2023-12-26'),
(84, 56, 'absent', '2023-12-26'),
(85, 57, 'present', '2023-12-26'),
(86, 61, 'permissionnaire', '2023-12-26'),
(87, 62, 'permissionnaire', '2023-12-26'),
(88, 65, 'present', '2023-12-26'),
(89, 66, 'present', '2023-12-26'),
(90, 68, 'present', '2023-12-26'),
(91, 69, 'absent', '2023-12-26'),
(92, 73, 'present', '2023-12-26'),
(93, 74, 'present', '2023-12-26'),
(94, 52, 'absent', '2023-12-26'),
(95, 53, 'present', '2023-12-26'),
(96, 56, 'absent', '2023-12-26'),
(97, 57, 'present', '2023-12-26'),
(98, 61, 'present', '2023-12-26'),
(99, 62, 'absent', '2023-12-26'),
(100, 65, 'present', '2023-12-26'),
(101, 66, 'present', '2023-12-26'),
(102, 68, 'present', '2023-12-26'),
(103, 69, 'permissionnaire', '2023-12-26'),
(104, 73, 'permissionnaire', '2023-12-26'),
(105, 74, 'present', '2023-12-26'),
(106, 52, 'present', '2023-12-27'),
(107, 53, 'absent', '2023-12-27'),
(108, 56, 'present', '2023-12-27'),
(109, 57, 'permissionnaire', '2023-12-27'),
(110, 61, 'present', '2023-12-27'),
(111, 62, 'present', '2023-12-27'),
(112, 65, 'absent', '2023-12-27'),
(113, 66, 'absent', '2023-12-27'),
(114, 68, 'present', '2023-12-27'),
(115, 69, 'permissionnaire', '2023-12-27'),
(116, 73, 'present', '2023-12-27'),
(117, 74, 'present', '2023-12-27'),
(118, 52, 'present', '2023-12-29'),
(119, 53, 'permissionnaire', '2023-12-29'),
(120, 56, 'absent', '2023-12-29'),
(121, 57, 'permissionnaire', '2023-12-29'),
(122, 61, 'present', '2023-12-29'),
(123, 62, 'present', '2023-12-29'),
(124, 65, 'absent', '2023-12-29'),
(125, 66, 'present', '2023-12-29'),
(126, 68, 'present', '2023-12-29'),
(127, 69, 'present', '2023-12-29'),
(128, 73, 'absent', '2023-12-29'),
(129, 74, 'present', '2023-12-29'),
(130, 78, 'absent', '2023-12-29'),
(131, 52, 'absent', '2023-12-30'),
(132, 53, 'present', '2023-12-30'),
(133, 56, 'absent', '2023-12-30'),
(134, 57, 'present', '2023-12-30'),
(135, 61, 'present', '2023-12-30'),
(136, 62, 'permissionnaire', '2023-12-30'),
(137, 65, 'present', '2023-12-30'),
(138, 66, 'permissionnaire', '2023-12-30'),
(139, 68, 'present', '2023-12-30'),
(140, 69, 'present', '2023-12-30'),
(141, 73, 'permissionnaire', '2023-12-30'),
(142, 74, 'present', '2023-12-30'),
(143, 78, 'present', '2023-12-30'),
(144, 52, 'present', '2024-01-04'),
(145, 53, 'absent', '2024-01-04'),
(146, 56, 'present', '2024-01-04'),
(147, 57, 'present', '2024-01-04'),
(148, 61, 'present', '2024-01-04'),
(149, 62, 'present', '2024-01-04'),
(150, 65, 'permissionnaire', '2024-01-04'),
(151, 66, 'present', '2024-01-04'),
(152, 68, 'permissionnaire', '2024-01-04'),
(153, 69, 'present', '2024-01-04'),
(154, 73, 'permissionnaire', '2024-01-04'),
(155, 74, 'present', '2024-01-04'),
(156, 78, 'absent', '2024-01-04');

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `ID_PROFIL` int(11) NOT NULL,
  `ID_STAGIAIRE` int(11) NOT NULL,
  `PHOTO` text NOT NULL,
  `NIVEAU` varchar(30) NOT NULL,
  `ECOLE` varchar(30) NOT NULL,
  `DIPLOME` varchar(30) NOT NULL,
  `CV` text NOT NULL,
  `DATE_DEBUT` date DEFAULT NULL,
  `DATE_FIN` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`ID_PROFIL`, `ID_STAGIAIRE`, `PHOTO`, `NIVEAU`, `ECOLE`, `DIPLOME`, `CV`, `DATE_DEBUT`, `DATE_FIN`) VALUES
(2, 52, 'photo/1695823841WIN_20230418_19_09_31_Pro.jpg', 'GL3', 'IUT DE DOUALA', 'LICENCE ', 'cv/1695825686', '2023-10-03', '2023-10-05'),
(3, 65, 'photo/1696330549Snapchat-1838162062.jpg', 'GL3', 'buea', 'LICENCE', 'cv/1696330549EXO+CORRECTION SGBDRgen2.pdf', NULL, NULL),
(5, 53, 'photo/1696335877Screenshot_20230330-212123.png', 'gl2', 'IUT DE DOUALA', 'bts 4', 'cv/16963358773985.pdf', '0000-00-00', '0000-00-00'),
(6, 61, 'photo/1696338744Annotation 2023-03-30 174352.png', 'GL3', 'IUT', 'LICENCE', 'cv/1696338744Le livre du C pour les vrais debutants en programmation.pdf', '2023-10-03', '2023-12-03'),
(8, 56, 'photo/1697829235', '', '', '', 'cv/1697829235', '0000-00-00', '0000-00-00'),
(12, 77, 'photo/1703616407', '', '', '', 'cv/1703616407', '0000-00-00', '0000-00-00'),
(13, 43, 'photo/1703757518Snapchat-1070103459.jpg', '', '', '', 'cv/1703757518', '0000-00-00', '0000-00-00'),
(14, 78, 'photo/1703772720Screenshot_20230330-211838.png', '', '', '', 'cv/1703772720', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id_equipe` int(11) NOT NULL,
  `DESCRIPTION` varchar(255) DEFAULT NULL,
  `NOM_PROJET` varchar(30) NOT NULL,
  `STATUT` varchar(30) NOT NULL DEFAULT 'En cours',
  `DATE_DEBUT` date NOT NULL,
  `DATE_FIN` datetime NOT NULL,
  `ID_PROJET` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id_equipe`, `DESCRIPTION`, `NOM_PROJET`, `STATUT`, `DATE_DEBUT`, `DATE_FIN`, `ID_PROJET`) VALUES
(1, 'creation d\'un site web pour le cga ', 'developpement', 'terminee', '2023-09-20', '2023-09-20 22:24:00', 1),
(4, 'gestion de stagiaire', 'gestion', 'en cours', '2023-09-23', '2023-09-20 19:27:00', 2),
(3, 'HOMME', 'la famille', 'annulee', '2023-09-20', '2023-09-21 17:31:00', 3),
(1, 'femme', 'developpement', 'en cours', '2023-09-24', '2023-09-09 22:19:00', 4),
(5, 'ecole', 'gestion', 'en cours', '2023-09-28', '2023-09-29 16:01:00', 5),
(4, 'geretet', 'joseph', 'en cours', '2023-09-30', '2023-10-01 12:26:00', 6),
(1, 'sante', 'good health', 'terminee', '2023-09-30', '2023-10-01 18:36:00', 8),
(5, 'soyez sages', 'developpement', 'en cours', '2023-10-11', '2023-10-13 23:46:00', 9),
(5, 'gestion de messagerie', 'messagerie interne', 'en  cours', '2023-11-27', '2023-11-30 20:04:00', 10);

-- --------------------------------------------------------

--
-- Structure de la table `rapport`
--

CREATE TABLE `rapport` (
  `ID_RAPPORT` bigint(4) NOT NULL,
  `ID_STAGIAIRE` bigint(4) NOT NULL,
  `NOM` varchar(255) DEFAULT NULL,
  `PRENOM` varchar(255) DEFAULT NULL,
  `DATED` date DEFAULT NULL,
  `DATEF` date DEFAULT NULL,
  `DETAILS` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `stagiaires`
--

CREATE TABLE `stagiaires` (
  `ID_STAGIAIRE` bigint(4) NOT NULL,
  `CARTE_ETUDIANT` varchar(255) DEFAULT NULL,
  `NOM` varchar(255) DEFAULT NULL,
  `PRENOM` varchar(255) DEFAULT NULL,
  `VILLE` varchar(255) DEFAULT NULL,
  `TEL` varchar(255) DEFAULT NULL,
  `ROLE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `stagiaires`
--

INSERT INTO `stagiaires` (`ID_STAGIAIRE`, `CARTE_ETUDIANT`, `NOM`, `PRENOM`, `VILLE`, `TEL`, `ROLE`) VALUES
(0, 'num', 'laurelle', 'jeumou', 'douala', '3894087757', 'stagiaire');

-- --------------------------------------------------------

--
-- Structure de la table `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(11) NOT NULL,
  `id_sup` int(11) NOT NULL,
  `id_stag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `supervisor`
--

INSERT INTO `supervisor` (`id`, `id_sup`, `id_stag`) VALUES
(25, 70, 52),
(26, 70, 53),
(27, 70, 56),
(28, 71, 61),
(29, 71, 62),
(30, 70, 65),
(31, 72, 66),
(32, 70, 68);

-- --------------------------------------------------------

--
-- Structure de la table `taches`
--

CREATE TABLE `taches` (
  `ID_TACHE` int(11) NOT NULL,
  `ID_STAGIAIRE` int(11) NOT NULL,
  `SUJET` text NOT NULL,
  `DATE_DEBUT` date NOT NULL,
  `DATE_REMISE` datetime NOT NULL,
  `STATUT` varchar(30) NOT NULL DEFAULT 'en cours',
  `DESCRIPTION_T` longtext NOT NULL,
  `OBSERVATION_T` text DEFAULT NULL,
  `DATETIME_T` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `taches`
--

INSERT INTO `taches` (`ID_TACHE`, `ID_STAGIAIRE`, `SUJET`, `DATE_DEBUT`, `DATE_REMISE`, `STATUT`, `DESCRIPTION_T`, `OBSERVATION_T`, `DATETIME_T`) VALUES
(12, 52, 'creer un site dynamique', '2023-10-17', '2023-10-19 17:31:00', 'terminee', '', 'complexe', '0000-00-00 00:00:00'),
(13, 74, 'location de voiture', '2023-10-22', '2023-10-29 23:20:00', 'en cours', '', '', NULL),
(14, 69, 'course', '2023-11-28', '2023-12-07 14:05:00', 'en cours', '', '', NULL),
(15, 73, 'publication', '2023-12-07', '2023-12-05 12:55:00', 'annulee', '', NULL, NULL),
(16, 68, 'gestion de meuble', '2023-12-07', '2023-12-18 22:34:00', 'terminee', '', NULL, NULL),
(17, 53, 'billets d\'avion', '2023-12-07', '2023-12-13 12:30:00', 'terminee', '', NULL, NULL),
(19, 52, 'Vente en ligne', '2023-12-12', '2023-12-14 12:12:00', 'en cours', '', NULL, NULL),
(22, 78, 'sport', '2023-12-28', '2023-12-30 15:12:00', 'en cours', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `themes`
--

CREATE TABLE `themes` (
  `nom_theme` varchar(255) DEFAULT NULL,
  `des_themes` text NOT NULL,
  `id_stagiaire` int(11) NOT NULL,
  `ID_THEME` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `themes`
--

INSERT INTO `themes` (`nom_theme`, `des_themes`, `id_stagiaire`, `ID_THEME`) VALUES
('application de stagiaire', 'suivie de tache de stagiaires', 62, 6),
('portail captif', 'cours de reseau', 52, 7);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`chat_id`);

--
-- Index pour la table `communiquer`
--
ALTER TABLE `communiquer`
  ADD PRIMARY KEY (`ID_STAGIAIRE`,`MATRICULE`),
  ADD KEY `I_FK_COMMUNIQUER_STAGIAIRES` (`ID_STAGIAIRE`),
  ADD KEY `I_FK_COMMUNIQUER_PERSONNELS` (`MATRICULE`);

--
-- Index pour la table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`conversation_id`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id_equipe`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_equipe` (`id_equipe`);

--
-- Index pour la table `personnels`
--
ALTER TABLE `personnels`
  ADD PRIMARY KEY (`MATRICULE`);

--
-- Index pour la table `presence`
--
ALTER TABLE `presence`
  ADD PRIMARY KEY (`ID_PRESENCE`),
  ADD KEY `fk_ID_STAGIAIRE3` (`ID_STAGIAIRE`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`ID_PROFIL`),
  ADD KEY `fk_ID_STAGIAIRE_PROFIL` (`ID_STAGIAIRE`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`ID_PROJET`),
  ADD UNIQUE KEY `ID_PROJET` (`ID_PROJET`),
  ADD UNIQUE KEY `ID_PROJET_2` (`ID_PROJET`),
  ADD KEY `fk_id_equipe` (`id_equipe`),
  ADD KEY `ID_PROJET_3` (`ID_PROJET`);

--
-- Index pour la table `rapport`
--
ALTER TABLE `rapport`
  ADD PRIMARY KEY (`ID_RAPPORT`),
  ADD KEY `I_FK_RAPPORT_STAGIAIRES` (`ID_STAGIAIRE`);

--
-- Index pour la table `stagiaires`
--
ALTER TABLE `stagiaires`
  ADD PRIMARY KEY (`ID_STAGIAIRE`);

--
-- Index pour la table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sup` (`id_sup`),
  ADD KEY `id_stag` (`id_stag`);

--
-- Index pour la table `taches`
--
ALTER TABLE `taches`
  ADD PRIMARY KEY (`ID_TACHE`),
  ADD KEY `FK_ID_STAGIAIRE` (`ID_STAGIAIRE`);

--
-- Index pour la table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`ID_THEME`),
  ADD KEY `themes_ibfk_1` (`id_stagiaire`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id_equipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT pour la table `presence`
--
ALTER TABLE `presence`
  MODIFY `ID_PRESENCE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `ID_PROFIL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `ID_PROJET` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `taches`
--
ALTER TABLE `taches`
  MODIFY `ID_TACHE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `themes`
--
ALTER TABLE `themes`
  MODIFY `ID_THEME` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `communiquer`
--
ALTER TABLE `communiquer`
  ADD CONSTRAINT `FK_COMMUNIQUER_PERSONNELS` FOREIGN KEY (`MATRICULE`) REFERENCES `personnels` (`MATRICULE`),
  ADD CONSTRAINT `FK_COMMUNIQUER_STAGIAIRES` FOREIGN KEY (`ID_STAGIAIRE`) REFERENCES `stagiaires` (`ID_STAGIAIRE`);

--
-- Contraintes pour la table `presence`
--
ALTER TABLE `presence`
  ADD CONSTRAINT `fk_ID_STAGIAIRE3` FOREIGN KEY (`ID_STAGIAIRE`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `fk_ID_STAGIAIRE_PROFIL` FOREIGN KEY (`ID_STAGIAIRE`) REFERENCES `membres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `fk_id_equipe` FOREIGN KEY (`id_equipe`) REFERENCES `equipe` (`id_equipe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rapport`
--
ALTER TABLE `rapport`
  ADD CONSTRAINT `FK_RAPPORT_STAGIAIRES` FOREIGN KEY (`ID_STAGIAIRE`) REFERENCES `stagiaires` (`ID_STAGIAIRE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `supervisor`
--
ALTER TABLE `supervisor`
  ADD CONSTRAINT `supervisor_ibfk_1` FOREIGN KEY (`id_sup`) REFERENCES `membres` (`id`),
  ADD CONSTRAINT `supervisor_ibfk_2` FOREIGN KEY (`id_stag`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `taches`
--
ALTER TABLE `taches`
  ADD CONSTRAINT `FK_ID_STAGIAIRE` FOREIGN KEY (`ID_STAGIAIRE`) REFERENCES `membres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `themes`
--
ALTER TABLE `themes`
  ADD CONSTRAINT `themes_ibfk_1` FOREIGN KEY (`id_stagiaire`) REFERENCES `membres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
