-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 25, 2026 at 10:48 AM
-- Server version: 8.0.46-0ubuntu0.24.04.3
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `GestNote`
--
CREATE DATABASE IF NOT EXISTS `GestNote` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `GestNote`;

-- --------------------------------------------------------

--
-- Table structure for table `classe`
--

CREATE TABLE `classe` (
  `id_class` int NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `classe`
--

INSERT INTO `classe` (`id_class`, `nom`, `user_id`) VALUES
(1, 'Sixième', NULL),
(2, 'Cinquième', NULL),
(3, 'Quatrième - Allemand', NULL),
(4, 'Quatrième - Espagnol', NULL),
(5, 'Quatrième - Chinois', NULL),
(6, 'Quatrième - Arabe', NULL),
(7, 'Troisième - Allemand', NULL),
(8, 'Troisième - Espagnol', NULL),
(9, 'Troisième - Chinois', NULL),
(10, 'Troisième - Arabe', NULL),
(11, 'Seconde A1', NULL),
(12, 'Seconde A2', NULL),
(13, 'Seconde A3', NULL),
(14, 'Seconde A4 - Allemand', NULL),
(15, 'Seconde A4 - Espagnol', NULL),
(16, 'Seconde A4 - Chinois', NULL),
(17, 'Seconde A4 - Arabe', NULL),
(18, 'Seconde A5', NULL),
(19, 'Seconde C', NULL),
(20, 'Seconde D', NULL),
(21, 'Seconde SH', NULL),
(22, 'Seconde AC', NULL),
(23, 'Première A1', NULL),
(24, 'Première A2', NULL),
(25, 'Première A3', NULL),
(26, 'Première A4 - Allemand', NULL),
(27, 'Première A4 - Espagnol', NULL),
(28, 'Première A4 - Chinois', NULL),
(29, 'Première A4 - Arabe', NULL),
(30, 'Première A5', NULL),
(31, 'Première ABI', NULL),
(32, 'Première C', NULL),
(33, 'Première D', NULL),
(34, 'Première TI', NULL),
(35, 'Première SH', NULL),
(36, 'Première AC', NULL),
(37, 'Terminale A1', NULL),
(38, 'Terminale A2', NULL),
(39, 'Terminale A3', NULL),
(40, 'Terminale A4 - Allemand', NULL),
(41, 'Terminale A4 - Espagnol', NULL),
(42, 'Terminale A4 - Chinois', NULL),
(43, 'Terminale A4 - Arabe', NULL),
(44, 'Terminale A5', NULL),
(45, 'Terminale ABI', NULL),
(46, 'Terminale C', NULL),
(47, 'Terminale D', NULL),
(48, 'Terminale TI', NULL),
(49, 'Terminale SH', NULL),
(50, 'Terminale AC', NULL),
(51, '1ère année MACO', NULL),
(52, '2ème année MACO', NULL),
(53, '3ème année MACO', NULL),
(54, '4ème année MACO', NULL),
(55, '1ère année Électricité', NULL),
(56, '2ème année Électricité', NULL),
(57, '3ème année Électricité', NULL),
(58, '4ème année Électricité', NULL),
(59, '1ère année Menuiserie', NULL),
(60, '2ème année Menuiserie', NULL),
(61, '3ème année Menuiserie', NULL),
(62, '4ème année Menuiserie', NULL),
(63, '1ère année Froid', NULL),
(64, '2ème année Froid', NULL),
(65, '3ème année Froid', NULL),
(66, '4ème année Froid', NULL),
(67, '1ère année ESF', NULL),
(68, '2ème année ESF', NULL),
(69, '3ème année ESF', NULL),
(70, '4ème année ESF', NULL),
(71, 'Seconde F1', NULL),
(72, 'Seconde F2', NULL),
(73, 'Seconde F3', NULL),
(74, 'Seconde F4', NULL),
(75, 'Seconde F5', NULL),
(76, 'Seconde F7', NULL),
(77, 'Seconde G1', NULL),
(78, 'Seconde G2', NULL),
(79, 'Seconde G3', NULL),
(80, 'Seconde ESF', NULL),
(81, 'Seconde CH', NULL),
(82, 'Seconde IB', NULL),
(83, 'Seconde IH', NULL),
(84, 'Seconde MA', NULL),
(85, 'Seconde CM', NULL),
(86, 'Première F1', NULL),
(87, 'Première F2', NULL),
(88, 'Première F3', NULL),
(89, 'Première F4', NULL),
(90, 'Première F5', NULL),
(91, 'Première F7', NULL),
(92, 'Première G1', NULL),
(93, 'Première G2', NULL),
(94, 'Première G3', NULL),
(95, 'Première ESF', NULL),
(96, 'Première CH', NULL),
(97, 'Première IB', NULL),
(98, 'Première IH', NULL),
(99, 'Première MA', NULL),
(100, 'Première CM', NULL),
(101, 'Terminale F1', NULL),
(102, 'Terminale F2', NULL),
(103, 'Terminale F3', NULL),
(104, 'Terminale F4', NULL),
(105, 'Terminale F5', NULL),
(106, 'Terminale F7', NULL),
(107, 'Terminale G1', NULL),
(108, 'Terminale G2', NULL),
(109, 'Terminale G3', NULL),
(110, 'Terminale ESF', NULL),
(111, 'Terminale CH', NULL),
(112, 'Terminale IB', NULL),
(113, 'Terminale IH', NULL),
(114, 'Terminale MA', NULL),
(115, 'Terminale CM', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `eleve`
--

CREATE TABLE `eleve` (
  `id_eleve` int NOT NULL,
  `matricule` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom_complet` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `lieux_naissance` varchar(100) NOT NULL,
  `sexe` varchar(15) NOT NULL,
  `situation` varchar(20) NOT NULL,
  `redoublan` varchar(4) NOT NULL,
  `nom_classe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `eleve`
--

INSERT INTO `eleve` (`id_eleve`, `matricule`, `nom_complet`, `date_naissance`, `lieux_naissance`, `sexe`, `situation`, `redoublan`, `nom_classe`) VALUES
(1, '2026-0001', 'niatize kempa joyce', '2008-03-09', 'FOKOUE', 'MASCULIN', 'Ancien', 'Non', 'Terminale TI'),
(2, '2026-0001', 'Ni pro dev', '0222-12-22', 'FOKOUE', 'MASCULIN', 'Ancien', 'Non', 'Terminale TI'),
(3, '2026-0002', 'DEV vontact', '2312-11-11', 'FOKOUE', 'MASCULIN', 'Ancien', 'Non', 'Terminale TI'),
(4, '2026-0003', 'Aloura king', '2323-03-23', 'DOUALA', 'MASCULIN', 'Ancien', 'Oui', 'Terminale TI'),
(5, '2026-0005', 'dev contact', '0222-02-22', 'BAFOUSSAM', 'FEMININ', 'Nouveau', 'Oui', 'Première TI'),
(6, '2026-0005', 'CRISTIANT', '2231-02-09', 'BAFOUSSAM', 'MASCULIN', 'Ancien', 'Non', 'Première TI'),
(7, '2026-0007', 'niatize kempa joyc', '2008-03-09', 'FOKOUE', 'MASCULIN', 'Ancien', 'Non', 'Première TI'),
(8, '2026-0008', 'niatize kempa', '2008-03-09', 'FOKOUE', 'MASCULIN', 'Ancien', 'Non', 'Première TI'),
(9, '2026-0009', 'contact DEV', '2008-03-09', 'BAFOUSSAM', 'MASCULIN', 'Ancien', 'Non', 'Première TI'),
(10, '2026-00010', 'niatize kempa king', '2008-03-09', 'FOKOUE', 'MASCULIN', 'Ancien', 'Non', 'Première TI'),
(11, '2026-00011', 'kamga plus', '0233-12-22', 'fokoue', 'MASCULIN', 'Ancien', 'Non', 'Première TI'),
(12, '2026-00012', 'kamga plusffdfvr', '1997-05-31', 'fokoue', 'MASCULIN', 'Ancien', 'Non', 'Première TI'),
(13, '2026-00012', '(--\'\"(-grrfvfvtrb', '3232-02-12', 'fokoue', 'MASCULIN', 'Ancien', 'Non', 'Première TI'),
(14, '2026-00014', 'rrfrf((', '2323-03-23', 'rddff', 'MASCULIN', 'Ancien', 'Non', 'Première TI'),
(15, '2026-00015', 'é\"(ttv', '0003-06-03', 'fokoue', 'MASCULIN', 'Ancien', 'Non', 'Première TI'),
(16, '2026-00016', 'vrtr r', '2008-12-31', 'rddff', 'MASCULIN', 'Ancien', 'Non', 'Première TI'),
(17, '2026-00016', 'niazddrdcd', '2053-12-08', 'fokoue', 'MASCULIN', 'Ancien', 'Non', 'Première TI');

-- --------------------------------------------------------

--
-- Table structure for table `etablissement`
--

CREATE TABLE `etablissement` (
  `id` int NOT NULL,
  `school_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `logo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `id_classes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `etablissement`
--

INSERT INTO `etablissement` (`id`, `school_name`, `logo`, `id_classes`) VALUES
(1, 'CEFTI', NULL, '34, 48, 71, 86, 101, 72, 87, 102, 73, 88, 103, 74, 89, 104, 75, 90, 105, 76, 91, 106, 77, 92, 107, 78, 93, 108, 79, 94, 109, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 1, 2, 3, 4, 7, 8, 9, 19'),
(2, 'RAPHA', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `matiere`
--

CREATE TABLE `matiere` (
  `id_mat` int NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `matiere`
--

INSERT INTO `matiere` (`id_mat`, `nom`) VALUES
(63, 'Algorithmique & Programmation'),
(10, 'Allemand (LV2)'),
(13, 'Arabe (LV2 / LV3)'),
(24, 'Arts Cinématographiques'),
(23, 'Arts Plastiques / Dessin'),
(36, 'Automatisme / Régulation'),
(48, 'Béton Armé'),
(29, 'Bureautique / Sténotypie'),
(3, 'Chimie'),
(56, 'Chimie Industrielle'),
(12, 'Chinois (LV2 / LV3)'),
(27, 'Comptabilité Analytique'),
(26, 'Comptabilité Générale / Financière'),
(52, 'Construction Mécanique'),
(30, 'Correspondance Commerciale'),
(45, 'Dessin de Bâtiment'),
(33, 'Dessin Technique / Schéma'),
(62, 'Droit Commercial / Des Affaires'),
(42, 'Droit Général et du Travail'),
(41, 'Économie d\'Entreprise / Organisation'),
(40, 'Économie Générale'),
(43, 'Économie Sociale et Familiale / Couture'),
(20, 'Éducation à la Citoyenneté et à la Morale (ECM)'),
(25, 'Éducation Musicale'),
(22, 'Éducation Physique et Sportive (EPS)'),
(35, 'Électronique'),
(34, 'Électrotechnique'),
(8, 'English Language'),
(9, 'English Literature'),
(11, 'Espagnol (LV2)'),
(61, 'Fiscalité'),
(57, 'Génie des Procédés'),
(19, 'Géographie'),
(28, 'Gestion Financière'),
(16, 'Grec Ancienne'),
(18, 'Histoire'),
(55, 'Hydraulique & Pneumatique'),
(5, 'Informatique'),
(14, 'Italien (LV2 / LV3)'),
(6, 'Langue Française'),
(17, 'Langues et Cultures Nationales (LCN)'),
(15, 'Latin'),
(7, 'Littérature / Culture Générale'),
(53, 'Maintenance Automobile'),
(58, 'Marketing / Action Commerciale'),
(1, 'Mathématiques'),
(59, 'Mathématiques Financières / Calculs Financiers'),
(32, 'Mécanique Appliquée'),
(46, 'Mécanique des Sols'),
(50, 'Mesures Électriques'),
(51, 'Microprocesseurs / Automates Programmables'),
(54, 'Moteurs à Combustion Interne'),
(31, 'Organisation Administrative / Secrétariat'),
(21, 'Philosophie'),
(2, 'Physique'),
(44, 'Puériculture et Nutrition'),
(65, 'Réseaux Informatiques'),
(39, 'Résistance des Matériaux (RDM)'),
(49, 'Schémas Électriques'),
(60, 'Statistiques Appliquées'),
(4, 'SVT / EEHB (Sciences de la Vie et de la Terre)'),
(64, 'Systèmes d\'Information & Bases de Données'),
(38, 'Technologie de Construction / Bâtiment'),
(37, 'Thermodynamique / Froid & Climatisation'),
(47, 'Topographie / Métré');

-- --------------------------------------------------------

--
-- Table structure for table `matiere_coeff`
--

CREATE TABLE `matiere_coeff` (
  `id_mat_class` int NOT NULL,
  `id_class` int NOT NULL,
  `id_mat` int NOT NULL,
  `coefficient` decimal(3,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `matiere_coeff`
--

INSERT INTO `matiere_coeff` (`id_mat_class`, `id_class`, `id_mat`, `coefficient`) VALUES
(1, 1, 1, 4.0),
(2, 1, 6, 5.0),
(3, 1, 8, 3.0),
(4, 1, 4, 2.0),
(5, 1, 2, 2.0),
(6, 1, 5, 2.0),
(7, 1, 18, 2.0),
(8, 1, 19, 2.0),
(9, 1, 20, 1.0),
(10, 1, 17, 1.0),
(11, 1, 22, 2.0),
(12, 1, 23, 1.0),
(13, 2, 1, 4.0),
(14, 2, 6, 5.0),
(15, 2, 8, 3.0),
(16, 2, 4, 2.0),
(17, 2, 2, 2.0),
(18, 2, 5, 2.0),
(19, 2, 18, 2.0),
(20, 2, 19, 2.0),
(21, 2, 20, 1.0),
(22, 2, 17, 1.0),
(23, 2, 22, 2.0),
(24, 2, 23, 1.0),
(25, 3, 1, 4.0),
(26, 3, 6, 4.0),
(27, 3, 8, 3.0),
(28, 3, 10, 3.0),
(29, 3, 2, 2.0),
(30, 3, 3, 2.0),
(31, 3, 4, 2.0),
(32, 3, 5, 2.0),
(33, 3, 18, 2.0),
(34, 3, 19, 2.0),
(35, 3, 20, 1.0),
(36, 3, 22, 2.0),
(37, 7, 1, 4.0),
(38, 7, 6, 4.0),
(39, 7, 8, 3.0),
(40, 7, 10, 3.0),
(41, 7, 2, 2.0),
(42, 7, 3, 2.0),
(43, 7, 4, 2.0),
(44, 7, 5, 2.0),
(45, 7, 18, 2.0),
(46, 7, 19, 2.0),
(47, 7, 20, 1.0),
(48, 7, 22, 2.0),
(49, 4, 1, 4.0),
(50, 4, 6, 4.0),
(51, 4, 8, 3.0),
(52, 4, 11, 3.0),
(53, 4, 2, 2.0),
(54, 4, 3, 2.0),
(55, 4, 4, 2.0),
(56, 4, 5, 2.0),
(57, 4, 18, 2.0),
(58, 4, 19, 2.0),
(59, 4, 20, 1.0),
(60, 4, 22, 2.0),
(61, 8, 1, 4.0),
(62, 8, 6, 4.0),
(63, 8, 8, 3.0),
(64, 8, 11, 3.0),
(65, 8, 2, 2.0),
(66, 8, 3, 2.0),
(67, 8, 4, 2.0),
(68, 8, 5, 2.0),
(69, 8, 18, 2.0),
(70, 8, 19, 2.0),
(71, 8, 20, 1.0),
(72, 8, 22, 2.0),
(73, 5, 1, 4.0),
(74, 5, 6, 4.0),
(75, 5, 8, 3.0),
(76, 5, 12, 3.0),
(77, 5, 2, 2.0),
(78, 5, 3, 2.0),
(79, 5, 4, 2.0),
(80, 5, 5, 2.0),
(81, 5, 18, 2.0),
(82, 5, 19, 2.0),
(83, 5, 20, 1.0),
(84, 5, 22, 2.0),
(85, 9, 1, 4.0),
(86, 9, 6, 4.0),
(87, 9, 8, 3.0),
(88, 9, 12, 3.0),
(89, 9, 2, 2.0),
(90, 9, 3, 2.0),
(91, 9, 4, 2.0),
(92, 9, 5, 2.0),
(93, 9, 18, 2.0),
(94, 9, 19, 2.0),
(95, 9, 20, 1.0),
(96, 9, 22, 2.0),
(97, 6, 1, 4.0),
(98, 6, 6, 4.0),
(99, 6, 8, 3.0),
(100, 6, 13, 3.0),
(101, 6, 2, 2.0),
(102, 6, 3, 2.0),
(103, 6, 4, 2.0),
(104, 6, 5, 2.0),
(105, 6, 18, 2.0),
(106, 6, 19, 2.0),
(107, 6, 20, 1.0),
(108, 6, 22, 2.0),
(109, 10, 1, 4.0),
(110, 10, 6, 4.0),
(111, 10, 8, 3.0),
(112, 10, 13, 3.0),
(113, 10, 2, 2.0),
(114, 10, 3, 2.0),
(115, 10, 4, 2.0),
(116, 10, 5, 2.0),
(117, 10, 18, 2.0),
(118, 10, 19, 2.0),
(119, 10, 20, 1.0),
(120, 10, 22, 2.0),
(121, 14, 6, 5.0),
(122, 14, 7, 3.0),
(123, 14, 8, 3.0),
(124, 14, 10, 3.0),
(125, 14, 1, 2.0),
(126, 14, 18, 2.0),
(127, 14, 19, 2.0),
(128, 14, 20, 1.0),
(129, 14, 5, 2.0),
(130, 14, 22, 2.0),
(131, 15, 6, 5.0),
(132, 15, 7, 3.0),
(133, 15, 8, 3.0),
(134, 15, 11, 3.0),
(135, 15, 1, 2.0),
(136, 15, 18, 2.0),
(137, 15, 19, 2.0),
(138, 15, 20, 1.0),
(139, 15, 5, 2.0),
(140, 15, 22, 2.0),
(141, 16, 6, 5.0),
(142, 16, 7, 3.0),
(143, 16, 8, 3.0),
(144, 16, 12, 3.0),
(145, 16, 1, 2.0),
(146, 16, 18, 2.0),
(147, 16, 19, 2.0),
(148, 16, 20, 1.0),
(149, 16, 5, 2.0),
(150, 16, 22, 2.0),
(151, 17, 6, 5.0),
(152, 17, 7, 3.0),
(153, 17, 8, 3.0),
(154, 17, 13, 3.0),
(155, 17, 1, 2.0),
(156, 17, 18, 2.0),
(157, 17, 19, 2.0),
(158, 17, 20, 1.0),
(159, 17, 5, 2.0),
(160, 17, 22, 2.0),
(161, 26, 6, 4.0),
(162, 26, 7, 3.0),
(163, 26, 8, 3.0),
(164, 26, 10, 3.0),
(165, 26, 21, 3.0),
(166, 26, 18, 2.0),
(167, 26, 19, 2.0),
(168, 26, 1, 2.0),
(169, 26, 20, 1.0),
(170, 26, 5, 2.0),
(171, 26, 22, 2.0),
(172, 27, 6, 4.0),
(173, 27, 7, 3.0),
(174, 27, 8, 3.0),
(175, 27, 11, 3.0),
(176, 27, 21, 3.0),
(177, 27, 18, 2.0),
(178, 27, 19, 2.0),
(179, 27, 1, 2.0),
(180, 27, 20, 1.0),
(181, 27, 5, 2.0),
(182, 27, 22, 2.0),
(183, 28, 6, 4.0),
(184, 28, 7, 3.0),
(185, 28, 8, 3.0),
(186, 28, 12, 3.0),
(187, 28, 21, 3.0),
(188, 28, 18, 2.0),
(189, 28, 19, 2.0),
(190, 28, 1, 2.0),
(191, 28, 20, 1.0),
(192, 28, 5, 2.0),
(193, 28, 22, 2.0),
(194, 29, 6, 4.0),
(195, 29, 7, 3.0),
(196, 29, 8, 3.0),
(197, 29, 13, 3.0),
(198, 29, 21, 3.0),
(199, 29, 18, 2.0),
(200, 29, 19, 2.0),
(201, 29, 1, 2.0),
(202, 29, 20, 1.0),
(203, 29, 5, 2.0),
(204, 29, 22, 2.0),
(205, 40, 21, 5.0),
(206, 40, 7, 4.0),
(207, 40, 6, 3.0),
(208, 40, 8, 3.0),
(209, 40, 10, 3.0),
(210, 40, 18, 2.0),
(211, 40, 19, 2.0),
(212, 40, 1, 2.0),
(213, 40, 20, 1.0),
(214, 40, 5, 2.0),
(215, 40, 22, 2.0),
(216, 41, 21, 5.0),
(217, 41, 7, 4.0),
(218, 41, 6, 3.0),
(219, 41, 8, 3.0),
(220, 41, 11, 3.0),
(221, 41, 18, 2.0),
(222, 41, 19, 2.0),
(223, 41, 1, 2.0),
(224, 41, 20, 1.0),
(225, 41, 5, 2.0),
(226, 41, 22, 2.0),
(227, 42, 21, 5.0),
(228, 42, 7, 4.0),
(229, 42, 6, 3.0),
(230, 42, 8, 3.0),
(231, 42, 12, 3.0),
(232, 42, 18, 2.0),
(233, 42, 19, 2.0),
(234, 42, 1, 2.0),
(235, 42, 20, 1.0),
(236, 42, 5, 2.0),
(237, 42, 22, 2.0),
(238, 43, 21, 5.0),
(239, 43, 7, 4.0),
(240, 43, 6, 3.0),
(241, 43, 8, 3.0),
(242, 43, 13, 3.0),
(243, 43, 18, 2.0),
(244, 43, 19, 2.0),
(245, 43, 1, 2.0),
(246, 43, 20, 1.0),
(247, 43, 5, 2.0),
(248, 43, 22, 2.0),
(249, 11, 6, 5.0),
(250, 11, 7, 3.0),
(251, 11, 15, 3.0),
(252, 11, 16, 2.0),
(253, 11, 8, 3.0),
(254, 11, 1, 2.0),
(255, 11, 18, 2.0),
(256, 11, 19, 2.0),
(257, 11, 22, 2.0),
(258, 23, 6, 4.0),
(259, 23, 7, 3.0),
(260, 23, 15, 3.0),
(261, 23, 16, 2.0),
(262, 23, 21, 3.0),
(263, 23, 8, 3.0),
(264, 23, 1, 2.0),
(265, 23, 18, 2.0),
(266, 23, 22, 2.0),
(267, 37, 21, 5.0),
(268, 37, 7, 4.0),
(269, 37, 15, 3.0),
(270, 37, 16, 2.0),
(271, 37, 6, 3.0),
(272, 37, 8, 3.0),
(273, 37, 1, 2.0),
(274, 37, 18, 2.0),
(275, 37, 22, 2.0),
(276, 19, 1, 6.0),
(277, 19, 2, 4.0),
(278, 19, 3, 2.0),
(279, 19, 4, 2.0),
(280, 19, 6, 4.0),
(281, 19, 8, 3.0),
(282, 19, 18, 1.0),
(283, 19, 19, 1.0),
(284, 19, 5, 2.0),
(285, 19, 22, 2.0),
(286, 20, 1, 5.0),
(287, 20, 4, 4.0),
(288, 20, 2, 3.0),
(289, 20, 3, 2.0),
(290, 20, 6, 4.0),
(291, 20, 8, 3.0),
(292, 20, 18, 1.0),
(293, 20, 19, 1.0),
(294, 20, 5, 2.0),
(295, 20, 22, 2.0),
(296, 32, 1, 6.0),
(297, 32, 2, 5.0),
(298, 32, 3, 3.0),
(299, 32, 6, 3.0),
(300, 32, 8, 3.0),
(301, 32, 21, 2.0),
(302, 32, 18, 1.0),
(303, 32, 19, 1.0),
(304, 32, 5, 2.0),
(305, 32, 22, 2.0),
(306, 46, 1, 7.0),
(307, 46, 2, 6.0),
(308, 46, 3, 3.0),
(309, 46, 21, 3.0),
(310, 46, 6, 2.0),
(311, 46, 8, 3.0),
(312, 46, 18, 1.0),
(313, 46, 19, 1.0),
(314, 46, 5, 2.0),
(315, 46, 22, 2.0),
(316, 33, 4, 5.0),
(317, 33, 1, 4.0),
(318, 33, 2, 3.0),
(319, 33, 3, 2.0),
(320, 33, 6, 3.0),
(321, 33, 8, 3.0),
(322, 33, 21, 2.0),
(323, 33, 18, 1.0),
(324, 33, 19, 1.0),
(325, 33, 5, 2.0),
(326, 33, 22, 2.0),
(327, 47, 4, 6.0),
(328, 47, 1, 4.0),
(329, 47, 2, 3.0),
(330, 47, 3, 2.0),
(331, 47, 21, 3.0),
(332, 47, 6, 2.0),
(333, 47, 8, 3.0),
(334, 47, 18, 1.0),
(335, 47, 19, 1.0),
(336, 47, 5, 2.0),
(337, 47, 22, 2.0),
(338, 34, 63, 4.0),
(339, 34, 64, 3.0),
(340, 34, 65, 3.0),
(341, 34, 5, 2.0),
(342, 34, 1, 4.0),
(343, 34, 2, 2.0),
(344, 34, 3, 1.0),
(345, 34, 6, 3.0),
(346, 34, 7, 2.0),
(347, 34, 8, 3.0),
(348, 34, 18, 1.0),
(349, 34, 19, 1.0),
(350, 34, 20, 1.0),
(351, 34, 21, 2.0),
(352, 34, 22, 2.0),
(353, 48, 63, 5.0),
(354, 48, 64, 4.0),
(355, 48, 65, 4.0),
(356, 48, 5, 2.0),
(357, 48, 1, 4.0),
(358, 48, 2, 2.0),
(359, 48, 6, 2.0),
(360, 48, 7, 2.0),
(361, 48, 8, 3.0),
(362, 48, 21, 3.0),
(363, 48, 18, 1.0),
(364, 48, 19, 1.0),
(365, 48, 20, 1.0),
(366, 48, 22, 2.0),
(367, 72, 35, 5.0),
(368, 72, 34, 4.0),
(369, 72, 33, 3.0),
(370, 72, 1, 4.0),
(371, 72, 2, 3.0),
(372, 72, 6, 3.0),
(373, 72, 8, 2.0),
(374, 72, 22, 2.0),
(375, 87, 35, 6.0),
(376, 87, 34, 4.0),
(377, 87, 51, 3.0),
(378, 87, 1, 4.0),
(379, 87, 2, 3.0),
(380, 87, 6, 3.0),
(381, 87, 8, 2.0),
(382, 87, 21, 2.0),
(383, 87, 22, 2.0),
(384, 102, 35, 7.0),
(385, 102, 34, 4.0),
(386, 102, 51, 4.0),
(387, 102, 1, 4.0),
(388, 102, 2, 3.0),
(389, 102, 6, 2.0),
(390, 102, 8, 2.0),
(391, 102, 21, 3.0),
(392, 102, 22, 2.0),
(393, 77, 31, 5.0),
(394, 77, 29, 4.0),
(395, 77, 30, 3.0),
(396, 77, 26, 3.0),
(397, 77, 6, 4.0),
(398, 77, 8, 3.0),
(399, 77, 1, 3.0),
(400, 77, 22, 2.0),
(401, 92, 31, 6.0),
(402, 92, 29, 4.0),
(403, 92, 30, 3.0),
(404, 92, 26, 3.0),
(405, 92, 42, 2.0),
(406, 92, 6, 3.0),
(407, 92, 8, 3.0),
(408, 92, 1, 3.0),
(409, 92, 22, 2.0),
(410, 107, 31, 7.0),
(411, 107, 29, 4.0),
(412, 107, 30, 3.0),
(413, 107, 26, 3.0),
(414, 107, 62, 3.0),
(415, 107, 6, 3.0),
(416, 107, 8, 3.0),
(417, 107, 21, 2.0),
(418, 107, 22, 2.0),
(419, 78, 26, 6.0),
(420, 78, 40, 3.0),
(421, 78, 41, 2.0),
(422, 78, 1, 4.0),
(423, 78, 6, 4.0),
(424, 78, 8, 3.0),
(425, 78, 22, 2.0),
(426, 93, 26, 6.0),
(427, 93, 27, 4.0),
(428, 93, 40, 3.0),
(429, 93, 42, 2.0),
(430, 93, 59, 3.0),
(431, 93, 1, 4.0),
(432, 93, 6, 3.0),
(433, 93, 8, 3.0),
(434, 93, 22, 2.0),
(435, 108, 26, 6.0),
(436, 108, 27, 4.0),
(437, 108, 28, 4.0),
(438, 108, 61, 3.0),
(439, 108, 62, 3.0),
(440, 108, 1, 4.0),
(441, 108, 6, 3.0),
(442, 108, 8, 3.0),
(443, 108, 22, 2.0),
(444, 51, 38, 6.0),
(445, 51, 33, 4.0),
(446, 51, 1, 3.0),
(447, 51, 6, 3.0),
(448, 51, 8, 2.0),
(449, 51, 22, 2.0),
(450, 52, 38, 6.0),
(451, 52, 33, 4.0),
(452, 52, 1, 3.0),
(453, 52, 6, 3.0),
(454, 52, 8, 2.0),
(455, 52, 22, 2.0),
(456, 55, 34, 6.0),
(457, 55, 49, 4.0),
(458, 55, 1, 3.0),
(459, 55, 6, 3.0),
(460, 55, 8, 2.0),
(461, 55, 22, 2.0),
(462, 56, 34, 6.0),
(463, 56, 49, 4.0),
(464, 56, 1, 3.0),
(465, 56, 6, 3.0),
(466, 56, 8, 2.0),
(467, 56, 22, 2.0),
(468, 67, 43, 6.0),
(469, 67, 44, 4.0),
(470, 67, 6, 4.0),
(471, 67, 8, 2.0),
(472, 67, 1, 2.0),
(473, 67, 22, 2.0),
(474, 68, 43, 6.0),
(475, 68, 44, 4.0),
(476, 68, 6, 4.0),
(477, 68, 8, 2.0),
(478, 68, 1, 2.0),
(479, 68, 22, 2.0),
(480, 22, 24, 6.0),
(481, 22, 6, 4.0),
(482, 22, 7, 3.0),
(483, 22, 8, 3.0),
(484, 22, 1, 2.0),
(485, 22, 18, 2.0),
(486, 22, 19, 2.0),
(487, 22, 22, 2.0),
(488, 36, 24, 6.0),
(489, 36, 6, 4.0),
(490, 36, 7, 3.0),
(491, 36, 8, 3.0),
(492, 36, 21, 2.0),
(493, 36, 18, 2.0),
(494, 36, 19, 2.0),
(495, 36, 22, 2.0),
(496, 50, 24, 7.0),
(497, 50, 21, 4.0),
(498, 50, 7, 3.0),
(499, 50, 6, 3.0),
(500, 50, 8, 3.0),
(501, 50, 18, 2.0),
(502, 50, 19, 2.0),
(503, 50, 22, 2.0),
(504, 21, 18, 4.0),
(505, 21, 19, 4.0),
(506, 21, 20, 2.0),
(507, 21, 6, 4.0),
(508, 21, 7, 3.0),
(509, 21, 8, 3.0),
(510, 21, 1, 2.0),
(511, 21, 22, 2.0),
(512, 35, 18, 4.0),
(513, 35, 19, 4.0),
(514, 35, 20, 2.0),
(515, 35, 21, 3.0),
(516, 35, 6, 3.0),
(517, 35, 8, 3.0),
(518, 35, 1, 2.0),
(519, 35, 22, 2.0),
(520, 49, 18, 5.0),
(521, 49, 19, 5.0),
(522, 49, 20, 2.0),
(523, 49, 21, 4.0),
(524, 49, 6, 3.0),
(525, 49, 8, 3.0),
(526, 49, 1, 2.0),
(527, 49, 22, 2.0),
(528, 71, 52, 6.0),
(529, 71, 32, 4.0),
(530, 71, 1, 4.0),
(531, 71, 2, 3.0),
(532, 71, 6, 3.0),
(533, 71, 8, 2.0),
(534, 71, 22, 2.0),
(535, 86, 52, 6.0),
(536, 86, 32, 4.0),
(537, 86, 39, 3.0),
(538, 86, 1, 4.0),
(539, 86, 2, 3.0),
(540, 86, 6, 3.0),
(541, 86, 8, 2.0),
(542, 86, 22, 2.0),
(543, 101, 52, 7.0),
(544, 101, 32, 4.0),
(545, 101, 39, 4.0),
(546, 101, 1, 4.0),
(547, 101, 2, 3.0),
(548, 101, 6, 2.0),
(549, 101, 8, 2.0),
(550, 101, 22, 2.0),
(551, 74, 45, 5.0),
(552, 74, 38, 4.0),
(553, 74, 39, 3.0),
(554, 74, 1, 4.0),
(555, 74, 2, 3.0),
(556, 74, 6, 3.0),
(557, 74, 8, 2.0),
(558, 74, 22, 2.0),
(559, 89, 45, 5.0),
(560, 89, 48, 4.0),
(561, 89, 39, 4.0),
(562, 89, 47, 3.0),
(563, 89, 1, 4.0),
(564, 89, 2, 3.0),
(565, 89, 6, 3.0),
(566, 89, 8, 2.0),
(567, 89, 22, 2.0),
(568, 104, 48, 6.0),
(569, 104, 45, 4.0),
(570, 104, 39, 4.0),
(571, 104, 47, 3.0),
(572, 104, 1, 4.0),
(573, 104, 2, 3.0),
(574, 104, 6, 2.0),
(575, 104, 8, 2.0),
(576, 104, 22, 2.0),
(577, 75, 37, 6.0),
(578, 75, 55, 3.0),
(579, 75, 1, 4.0),
(580, 75, 2, 3.0),
(581, 75, 6, 3.0),
(582, 75, 8, 2.0),
(583, 75, 22, 2.0),
(584, 90, 37, 6.0),
(585, 90, 55, 4.0),
(586, 90, 1, 4.0),
(587, 90, 2, 3.0),
(588, 90, 6, 3.0),
(589, 90, 8, 2.0),
(590, 90, 22, 2.0),
(591, 105, 37, 7.0),
(592, 105, 55, 4.0),
(593, 105, 1, 4.0),
(594, 105, 2, 3.0),
(595, 105, 6, 2.0),
(596, 105, 8, 2.0),
(597, 105, 22, 2.0),
(598, 76, 56, 5.0),
(599, 76, 3, 4.0),
(600, 76, 4, 3.0),
(601, 76, 1, 4.0),
(602, 76, 2, 3.0),
(603, 76, 6, 3.0),
(604, 76, 8, 2.0),
(605, 76, 22, 2.0),
(606, 91, 56, 6.0),
(607, 91, 57, 4.0),
(608, 91, 3, 4.0),
(609, 91, 1, 4.0),
(610, 91, 2, 3.0),
(611, 91, 6, 3.0),
(612, 91, 8, 2.0),
(613, 91, 22, 2.0),
(614, 106, 56, 6.0),
(615, 106, 57, 5.0),
(616, 106, 3, 4.0),
(617, 106, 1, 4.0),
(618, 106, 2, 3.0),
(619, 106, 6, 2.0),
(620, 106, 8, 2.0),
(621, 106, 22, 2.0),
(622, 53, 38, 6.0),
(623, 53, 33, 4.0),
(624, 53, 1, 3.0),
(625, 53, 6, 3.0),
(626, 53, 8, 2.0),
(627, 53, 22, 2.0),
(628, 54, 38, 6.0),
(629, 54, 33, 4.0),
(630, 54, 1, 3.0),
(631, 54, 6, 3.0),
(632, 54, 8, 2.0),
(633, 54, 22, 2.0),
(634, 57, 34, 6.0),
(635, 57, 49, 4.0),
(636, 57, 1, 3.0),
(637, 57, 6, 3.0),
(638, 57, 8, 2.0),
(639, 57, 22, 2.0),
(640, 58, 34, 6.0),
(641, 58, 49, 4.0),
(642, 58, 1, 3.0),
(643, 58, 6, 3.0),
(644, 58, 8, 2.0),
(645, 58, 22, 2.0),
(646, 59, 38, 6.0),
(647, 59, 33, 4.0),
(648, 59, 1, 3.0),
(649, 59, 6, 3.0),
(650, 59, 8, 2.0),
(651, 59, 22, 2.0),
(652, 60, 38, 6.0),
(653, 60, 33, 4.0),
(654, 60, 1, 3.0),
(655, 60, 6, 3.0),
(656, 60, 8, 2.0),
(657, 60, 22, 2.0),
(658, 61, 38, 6.0),
(659, 61, 33, 4.0),
(660, 61, 1, 3.0),
(661, 61, 6, 3.0),
(662, 61, 8, 2.0),
(663, 61, 22, 2.0),
(664, 62, 38, 6.0),
(665, 62, 33, 4.0),
(666, 62, 1, 3.0),
(667, 62, 6, 3.0),
(668, 62, 8, 2.0),
(669, 62, 22, 2.0),
(670, 63, 37, 6.0),
(671, 63, 33, 4.0),
(672, 63, 1, 3.0),
(673, 63, 6, 3.0),
(674, 63, 8, 2.0),
(675, 63, 22, 2.0),
(676, 64, 37, 6.0),
(677, 64, 33, 4.0),
(678, 64, 1, 3.0),
(679, 64, 6, 3.0),
(680, 64, 8, 2.0),
(681, 64, 22, 2.0),
(682, 65, 37, 6.0),
(683, 65, 33, 4.0),
(684, 65, 1, 3.0),
(685, 65, 6, 3.0),
(686, 65, 8, 2.0),
(687, 65, 22, 2.0),
(688, 66, 37, 6.0),
(689, 66, 33, 4.0),
(690, 66, 1, 3.0),
(691, 66, 6, 3.0),
(692, 66, 8, 2.0),
(693, 66, 22, 2.0),
(694, 69, 43, 6.0),
(695, 69, 44, 4.0),
(696, 69, 6, 4.0),
(697, 69, 8, 2.0),
(698, 69, 1, 2.0),
(699, 69, 22, 2.0),
(700, 70, 43, 6.0),
(701, 70, 44, 4.0),
(702, 70, 6, 4.0),
(703, 70, 8, 2.0),
(704, 70, 1, 2.0),
(705, 70, 22, 2.0),
(706, 12, 6, 5.0),
(707, 12, 7, 3.0),
(708, 12, 10, 3.0),
(709, 12, 15, 3.0),
(710, 12, 8, 3.0),
(711, 12, 1, 2.0),
(712, 12, 18, 2.0),
(713, 12, 19, 2.0),
(714, 12, 5, 2.0),
(715, 12, 22, 2.0),
(716, 13, 6, 5.0),
(717, 13, 7, 4.0),
(718, 13, 15, 4.0),
(719, 13, 8, 3.0),
(720, 13, 1, 2.0),
(721, 13, 18, 2.0),
(722, 13, 19, 2.0),
(723, 13, 5, 2.0),
(724, 13, 22, 2.0),
(725, 18, 6, 5.0),
(726, 18, 7, 3.0),
(727, 18, 10, 3.0),
(728, 18, 11, 3.0),
(729, 18, 8, 3.0),
(730, 18, 1, 2.0),
(731, 18, 18, 2.0),
(732, 18, 19, 2.0),
(733, 18, 5, 2.0),
(734, 18, 22, 2.0),
(735, 24, 6, 4.0),
(736, 24, 7, 3.0),
(737, 24, 10, 3.0),
(738, 24, 15, 3.0),
(739, 24, 21, 3.0),
(740, 24, 8, 3.0),
(741, 24, 1, 2.0),
(742, 24, 18, 2.0),
(743, 24, 19, 2.0),
(744, 24, 22, 2.0),
(745, 25, 6, 4.0),
(746, 25, 7, 4.0),
(747, 25, 15, 4.0),
(748, 25, 21, 3.0),
(749, 25, 8, 3.0),
(750, 25, 1, 2.0),
(751, 25, 18, 2.0),
(752, 25, 19, 2.0),
(753, 25, 22, 2.0),
(754, 30, 6, 4.0),
(755, 30, 7, 3.0),
(756, 30, 10, 3.0),
(757, 30, 11, 3.0),
(758, 30, 21, 3.0),
(759, 30, 8, 3.0),
(760, 30, 1, 2.0),
(761, 30, 18, 2.0),
(762, 30, 19, 2.0),
(763, 30, 22, 2.0),
(764, 31, 6, 4.0),
(765, 31, 8, 5.0),
(766, 31, 9, 3.0),
(767, 31, 7, 3.0),
(768, 31, 21, 3.0),
(769, 31, 1, 2.0),
(770, 31, 18, 2.0),
(771, 31, 19, 2.0),
(772, 31, 22, 2.0),
(773, 38, 21, 5.0),
(774, 38, 7, 4.0),
(775, 38, 10, 3.0),
(776, 38, 15, 3.0),
(777, 38, 6, 3.0),
(778, 38, 8, 3.0),
(779, 38, 1, 2.0),
(780, 38, 18, 2.0),
(781, 38, 19, 2.0),
(782, 38, 22, 2.0),
(783, 39, 21, 5.0),
(784, 39, 7, 5.0),
(785, 39, 15, 4.0),
(786, 39, 6, 3.0),
(787, 39, 8, 3.0),
(788, 39, 1, 2.0),
(789, 39, 18, 2.0),
(790, 39, 19, 2.0),
(791, 39, 22, 2.0),
(792, 44, 21, 5.0),
(793, 44, 7, 4.0),
(794, 44, 10, 3.0),
(795, 44, 11, 3.0),
(796, 44, 6, 3.0),
(797, 44, 8, 3.0),
(798, 44, 1, 2.0),
(799, 44, 18, 2.0),
(800, 44, 19, 2.0),
(801, 44, 22, 2.0),
(802, 45, 21, 5.0),
(803, 45, 8, 5.0),
(804, 45, 9, 4.0),
(805, 45, 7, 3.0),
(806, 45, 6, 3.0),
(807, 45, 1, 2.0),
(808, 45, 18, 2.0),
(809, 45, 19, 2.0),
(810, 45, 22, 2.0),
(811, 73, 34, 6.0),
(812, 73, 49, 4.0),
(813, 73, 50, 3.0),
(814, 73, 1, 4.0),
(815, 73, 2, 3.0),
(816, 73, 6, 3.0),
(817, 73, 8, 2.0),
(818, 73, 22, 2.0),
(819, 88, 34, 6.0),
(820, 88, 49, 4.0),
(821, 88, 50, 3.0),
(822, 88, 51, 3.0),
(823, 88, 1, 4.0),
(824, 88, 2, 3.0),
(825, 88, 6, 3.0),
(826, 88, 8, 2.0),
(827, 88, 22, 2.0),
(828, 79, 58, 6.0),
(829, 79, 40, 3.0),
(830, 79, 41, 3.0),
(831, 79, 1, 3.0),
(832, 79, 6, 4.0),
(833, 79, 8, 3.0),
(834, 79, 22, 2.0),
(835, 94, 58, 6.0),
(836, 94, 60, 3.0),
(837, 94, 40, 3.0),
(838, 94, 62, 2.0),
(839, 94, 1, 3.0),
(840, 94, 6, 3.0),
(841, 94, 8, 3.0),
(842, 94, 22, 2.0),
(843, 80, 43, 6.0),
(844, 80, 44, 4.0),
(845, 80, 6, 4.0),
(846, 80, 8, 3.0),
(847, 80, 1, 2.0),
(848, 80, 3, 2.0),
(849, 80, 22, 2.0),
(850, 95, 43, 6.0),
(851, 95, 44, 4.0),
(852, 95, 6, 3.0),
(853, 95, 8, 3.0),
(854, 95, 21, 2.0),
(855, 95, 1, 2.0),
(856, 95, 3, 2.0),
(857, 95, 22, 2.0),
(858, 81, 56, 6.0),
(859, 81, 3, 4.0),
(860, 81, 1, 4.0),
(861, 81, 2, 3.0),
(862, 81, 6, 3.0),
(863, 81, 8, 2.0),
(864, 81, 22, 2.0),
(865, 96, 56, 6.0),
(866, 96, 57, 4.0),
(867, 96, 3, 4.0),
(868, 96, 1, 4.0),
(869, 96, 2, 3.0),
(870, 96, 6, 3.0),
(871, 96, 8, 2.0),
(872, 96, 22, 2.0),
(873, 82, 38, 6.0),
(874, 82, 33, 4.0),
(875, 82, 1, 4.0),
(876, 82, 2, 3.0),
(877, 82, 6, 3.0),
(878, 82, 8, 2.0),
(879, 82, 22, 2.0),
(880, 97, 38, 6.0),
(881, 97, 33, 4.0),
(882, 97, 39, 3.0),
(883, 97, 1, 4.0),
(884, 97, 2, 3.0),
(885, 97, 6, 3.0),
(886, 97, 8, 2.0),
(887, 97, 22, 2.0),
(888, 83, 43, 6.0),
(889, 83, 44, 3.0),
(890, 83, 41, 3.0),
(891, 83, 6, 4.0),
(892, 83, 8, 3.0),
(893, 83, 1, 2.0),
(894, 83, 22, 2.0),
(895, 98, 43, 6.0),
(896, 98, 44, 3.0),
(897, 98, 41, 3.0),
(898, 98, 6, 3.0),
(899, 98, 8, 3.0),
(900, 98, 21, 2.0),
(901, 98, 1, 2.0),
(902, 98, 22, 2.0),
(903, 84, 53, 6.0),
(904, 84, 54, 4.0),
(905, 84, 33, 3.0),
(906, 84, 1, 4.0),
(907, 84, 2, 3.0),
(908, 84, 6, 3.0),
(909, 84, 8, 2.0),
(910, 84, 22, 2.0),
(911, 85, 52, 6.0),
(912, 85, 33, 4.0),
(913, 85, 32, 3.0),
(914, 85, 1, 4.0),
(915, 85, 2, 3.0),
(916, 85, 6, 3.0),
(917, 85, 8, 2.0),
(918, 85, 22, 2.0),
(919, 99, 53, 6.0),
(920, 99, 54, 4.0),
(921, 99, 33, 3.0),
(922, 99, 1, 4.0),
(923, 99, 2, 3.0),
(924, 99, 6, 3.0),
(925, 99, 8, 2.0),
(926, 99, 22, 2.0),
(927, 114, 53, 7.0),
(928, 114, 54, 4.0),
(929, 114, 33, 3.0),
(930, 114, 1, 4.0),
(931, 114, 2, 3.0),
(932, 114, 6, 2.0),
(933, 114, 8, 2.0),
(934, 114, 21, 2.0),
(935, 114, 22, 2.0),
(936, 100, 52, 6.0),
(937, 100, 33, 4.0),
(938, 100, 32, 3.0),
(939, 100, 1, 4.0),
(940, 100, 2, 3.0),
(941, 100, 6, 3.0),
(942, 100, 8, 2.0),
(943, 100, 22, 2.0),
(944, 115, 52, 7.0),
(945, 115, 33, 4.0),
(946, 115, 32, 3.0),
(947, 115, 1, 4.0),
(948, 115, 2, 3.0),
(949, 115, 6, 2.0),
(950, 115, 8, 2.0),
(951, 115, 21, 2.0),
(952, 115, 22, 2.0),
(953, 103, 34, 7.0),
(954, 103, 49, 4.0),
(955, 103, 50, 3.0),
(956, 103, 51, 3.0),
(957, 103, 1, 4.0),
(958, 103, 2, 3.0),
(959, 103, 6, 2.0),
(960, 103, 8, 2.0),
(961, 103, 21, 2.0),
(962, 103, 22, 2.0),
(963, 109, 58, 7.0),
(964, 109, 60, 3.0),
(965, 109, 40, 3.0),
(966, 109, 62, 3.0),
(967, 109, 1, 3.0),
(968, 109, 6, 3.0),
(969, 109, 8, 3.0),
(970, 109, 21, 2.0),
(971, 109, 22, 2.0),
(972, 110, 43, 7.0),
(973, 110, 44, 4.0),
(974, 110, 6, 3.0),
(975, 110, 8, 3.0),
(976, 110, 21, 2.0),
(977, 110, 1, 2.0),
(978, 110, 3, 2.0),
(979, 110, 22, 2.0),
(980, 111, 56, 6.0),
(981, 111, 57, 5.0),
(982, 111, 3, 4.0),
(983, 111, 1, 4.0),
(984, 111, 2, 3.0),
(985, 111, 6, 2.0),
(986, 111, 8, 2.0),
(987, 111, 21, 2.0),
(988, 111, 22, 2.0),
(989, 112, 38, 7.0),
(990, 112, 33, 4.0),
(991, 112, 39, 3.0),
(992, 112, 1, 4.0),
(993, 112, 2, 3.0),
(994, 112, 6, 2.0),
(995, 112, 8, 2.0),
(996, 112, 21, 2.0),
(997, 112, 22, 2.0),
(998, 113, 43, 7.0),
(999, 113, 44, 3.0),
(1000, 113, 41, 3.0),
(1001, 113, 6, 3.0),
(1002, 113, 8, 3.0),
(1003, 113, 21, 2.0),
(1004, 113, 1, 2.0),
(1005, 113, 22, 2.0);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id_note` int NOT NULL,
  `id_mat` int NOT NULL,
  `note_cc` decimal(4,2) DEFAULT NULL,
  `note_eval` decimal(4,2) DEFAULT NULL,
  `note_seq` decimal(4,2) GENERATED ALWAYS AS (((`note_cc` + `note_eval`) / 2)) STORED NOT NULL,
  `id_eleve` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id_note`, `id_mat`, `note_cc`, `note_eval`, `id_eleve`) VALUES
(44, 1, 20.00, 12.00, 9),
(45, 1, 11.00, 13.00, 6),
(46, 1, 11.00, 15.00, 5),
(47, 1, 20.00, 12.00, 8),
(50, 3, 20.00, 11.00, 9),
(51, 3, 12.00, 20.00, 6),
(52, 3, 15.00, 19.00, 5),
(53, 3, 17.00, 14.00, 8),
(54, 3, 12.00, 11.00, 7),
(55, 3, 9.00, 12.00, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `pass_word` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(30) NOT NULL,
  `telephone` int NOT NULL,
  `statut` text NOT NULL,
  `etablissement_id` int NOT NULL,
  `classes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `matieres` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `profil` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `access` int DEFAULT NULL,
  `serie` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `pass_word`, `email`, `telephone`, `statut`, `etablissement_id`, `classes`, `matieres`, `profil`, `access`, `serie`) VALUES
(1, 'kempa', '$2y$10$/wDew4X9w42YMfVPLO2nvuV.tPnZ3.th9s8HK76jHwj2U9Ejx8GJi', 'niatizepro@gmail.com', 687043746, 'Professeur', 1, 'Première TI+ Terminale TI+ Cinquième+ Quatrième - Arabe+ Seconde D+ Quatrième - Allemand+ Seconde C+ Première AC', 'Mathématiques, Physique, Chimie, SVT / EEHB, Informatique, Histoire, Géographie, Génie des Procédés, Marketing / Action Commerciale, Mathématiques Financières / Calculs Financiers, Statistiques Appliquées, Fiscalité, Droit Commercial / Des Affaires, Algorithmique et Programmation, Systèmes d\'Information & Bases de Données, Réseaux Informatiques+ Mathématiques, Physique, Chimie, SVT / EEHB, Informatique, Informatique Théorique, Informatique Pratique / Systèmes d\'Information, Allemand (LV2), Histoire, Géographie, Éducation à la Citoyenneté et à la Morale (ECM), Philosophie, Éducation Physique et Sportive (EPS), Arts Plastiques / Dessin, Moteurs à Combustion Interne, Chimie Industrielle, Génie des Procédés, Marketing / Action Commerciale, Fiscalité, Droit Commercial / Des Affaires, Algorithmique et Programmation, Systèmes d\'Information & Bases de Données, Réseaux Informatiques+ Mathématiques, Physique, Chimie, SVT / EEHB, Informatique, Informatique Générale / TIC, Allemand (LV2), Espagnol (LV2), Grec Ancienne, Histoire+ Mathématiques, Physique, SVT / EEHB, Informatique, Allemand (LV2), Espagnol (LV2), Chinois (LV2 / LV3), Arabe (LV2 / LV3), Éducation Physique et Sportive (EPS), Arts Plastiques / Dessin, Arts Cinématographiques+ Informatique Pratique / Systèmes d\'Information, Langue Française, Organisation Administrative / Secrétariat, Construction Mécanique, Maintenance Automobile, Moteurs à Combustion Interne, Hydraulique & Pneumatique+ SVT / EEHB, Espagnol (LV2), Chinois (LV2 / LV3), Marketing / Action Commerciale, Mathématiques Financières / Calculs Financiers, Statistiques Appliquées, Fiscalité+ Moteurs à Combustion Interne, Hydraulique & Pneumatique, Génie des Procédés+ Mathématiques, Physique, Chimie, SVT / EEHB, Informatique, Maintenance Automobile, Moteurs à Combustion Interne', 'app/profiles/img_6a983054243ed6.37812621.png', NULL, ''),
(3, 'niatize kempa joyce', '$2y$10$uDOSURUzmIxaiC3qHziOjO0MOLs7Chsuc1/zlVU8/cjKaRBj1/gV2', 'feudiopro@hahoo.com', 687043746, 'Administrareur', 1, NULL, NULL, 'app/profiles/img_6a995270c1b547.97674442.png', NULL, ''),
(4, 'km', '$2y$10$Ao9X9fQFQA6/cSeRYyuvAObrCmNex6OnvbLBM9097jJhcTEO9mofe', 'km@gmail.com', 656565656, 'Administrareur', 1, NULL, NULL, 'app/profiles/img_6ab4be2d9d7099.26564358.png', NULL, 'Generale,Technique'),
(5, 'kl', '$2y$10$8B4YDZuuDJmilAQHc2Ow2ewJX2uFpwzEXWkLLDNQVOx83k6Syakzu', 'km@gmail.com', 656565656, 'Professeur', 1, 'Sixième', 'Mathématiques, Physique, Espagnol (LV2), Chinois (LV2 / LV3)', 'app/profiles/img_6ab4be53612511.62847064.png', NULL, 'Generale,Technique');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id_class`,`nom`),
  ADD UNIQUE KEY `subject_name` (`nom`(50)),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `nom` (`nom`);

--
-- Indexes for table `eleve`
--
ALTER TABLE `eleve`
  ADD PRIMARY KEY (`id_eleve`,`matricule`,`nom_complet`),
  ADD UNIQUE KEY `nom_complet_2` (`nom_complet`),
  ADD KEY `nom_complet` (`nom_complet`),
  ADD KEY `nom_classe` (`nom_classe`),
  ADD KEY `nom_classe_2` (`nom_classe`),
  ADD KEY `id_eleve` (`id_eleve`);

--
-- Indexes for table `etablissement`
--
ALTER TABLE `etablissement`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`school_name`);

--
-- Indexes for table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id_mat`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Indexes for table `matiere_coeff`
--
ALTER TABLE `matiere_coeff`
  ADD PRIMARY KEY (`id_mat_class`),
  ADD KEY `id_class` (`id_class`),
  ADD KEY `id_mat` (`id_mat`),
  ADD KEY `id_class_2` (`id_class`,`id_mat`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id_note`),
  ADD KEY `id_mat_coeff` (`id_mat`),
  ADD KEY `id_eleve` (`id_eleve`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`full_name`),
  ADD UNIQUE KEY `full_name` (`full_name`,`email`,`telephone`),
  ADD UNIQUE KEY `full_name_2` (`full_name`),
  ADD KEY `etablissement_id` (`etablissement_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classe`
--
ALTER TABLE `classe`
  MODIFY `id_class` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `eleve`
--
ALTER TABLE `eleve`
  MODIFY `id_eleve` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `etablissement`
--
ALTER TABLE `etablissement`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id_mat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `matiere_coeff`
--
ALTER TABLE `matiere_coeff`
  MODIFY `id_mat_class` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id_note` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `classe_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `eleve`
--
ALTER TABLE `eleve`
  ADD CONSTRAINT `eleve_ibfk_1` FOREIGN KEY (`nom_classe`) REFERENCES `classe` (`nom`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `matiere_coeff`
--
ALTER TABLE `matiere_coeff`
  ADD CONSTRAINT `matiere_coeff_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `classe` (`id_class`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `matiere_coeff_ibfk_2` FOREIGN KEY (`id_mat`) REFERENCES `matiere` (`id_mat`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`id_mat`) REFERENCES `matiere` (`id_mat`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `notes_ibfk_3` FOREIGN KEY (`id_eleve`) REFERENCES `eleve` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`etablissement_id`) REFERENCES `etablissement` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `query` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `col_length` text COLLATE utf8mb3_bin,
  `col_collation` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8mb3_bin DEFAULT '',
  `col_default` text COLLATE utf8mb3_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `settings_data` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Settings related to Designer';

--
-- Dumping data for table `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('niatize', '{\"angular_direct\":\"angular\",\"snap_to_grid\":\"off\",\"relation_lines\":\"true\"}'),
('root', '{\"angular_direct\":\"direct\",\"relation_lines\":\"true\",\"snap_to_grid\":\"off\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8mb3_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `template_data` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `tables` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `page_nr` int UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='PDF relation pages for phpMyAdmin';

--
-- Dumping data for table `pma__pdf_pages`
--

INSERT INTO `pma__pdf_pages` (`db_name`, `page_nr`, `page_descr`) VALUES
('GestNote', 1, 'Gestnote_relation'),
('projet', 2, 'relations');

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `tables` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('niatize', '[{\"db\":\"projet\",\"table\":\"administrateurs\"},{\"db\":\"projet\",\"table\":\"clients\"},{\"db\":\"GestNote\",\"table\":\"user\"},{\"db\":\"GestNote\",\"table\":\"notes\"},{\"db\":\"GestNote\",\"table\":\"eleve\"},{\"db\":\"GestNote\",\"table\":\"matiere\"},{\"db\":\"GestNote\",\"table\":\"matiere_coeff\"},{\"db\":\"GestNote\",\"table\":\"classe\"},{\"db\":\"GestNote\",\"table\":\"etablissement\"}]'),
('root', '[{\"db\":\"projet\",\"table\":\"clients\"},{\"db\":\"projet\",\"table\":\"administrateurs\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `pdf_page_number` int NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

--
-- Dumping data for table `pma__table_coords`
--

INSERT INTO `pma__table_coords` (`db_name`, `table_name`, `pdf_page_number`, `x`, `y`) VALUES
('GestNote', 'classe', 1, 493, 0),
('GestNote', 'eleve', 1, 510, 150),
('GestNote', 'etablissement', 1, 35, 0),
('GestNote', 'matiere', 1, 1000, 5),
('GestNote', 'matiere_coeff', 1, 679, 0),
('GestNote', 'notes', 1, 1016, 170),
('GestNote', 'user', 1, 265, 0),
('projet', 'administrateurs', 2, 52, 440),
('projet', 'categories', 2, 740, 189),
('projet', 'clients', 2, 1030, 172),
('projet', 'commandes', 2, 338, 518),
('projet', 'paniers', 2, 894, 61),
('projet', 'produits', 2, 452, 8),
('projet', 'tables', 2, 133, 44);

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `prefs` text COLLATE utf8mb3_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('niatize', 'GestNote', 'matiere_coeff', '{\"sorted_col\":\"`matiere_coeff`.`id_class` ASC\"}', '2026-09-03 13:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `version` int UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8mb3_bin NOT NULL,
  `schema_sql` text COLLATE utf8mb3_bin,
  `data_sql` longtext COLLATE utf8mb3_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8mb3_bin DEFAULT NULL,
  `tracking_active` int UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('niatize', '2026-09-25 10:48:15', '{\"Console\\/Mode\":\"collapse\"}'),
('root', '2026-09-23 17:28:25', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8mb3_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `projet`
--
CREATE DATABASE IF NOT EXISTS `projet` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `projet`;

-- --------------------------------------------------------

--
-- Table structure for table `administrateurs`
--

CREATE TABLE `administrateurs` (
  `id` int NOT NULL,
  `nom` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `motDePasse` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrateurs`
--

INSERT INTO `administrateurs` (`id`, `nom`, `motDePasse`) VALUES
(1, 'admin', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `nom` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'repas'),
(2, 'boisson');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int NOT NULL,
  `nom` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `sexe` tinyint(1) NOT NULL,
  `tel` varchar(9) COLLATE utf8mb4_general_ci NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `motDePasse` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `email`, `sexe`, `tel`, `dateCreation`, `motDePasse`) VALUES
(1, 'steve', 'steve@client.com', 1, '676068279', '2024-03-15 22:26:22', '1234'),
(8, 'diego', 'diego@client.com', 1, '693217123', '2024-03-15 22:26:22', 'azerty'),
(17, 'client', 'client@client.com', 1, '675606317', '2024-03-19 23:18:47', 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `id` int NOT NULL,
  `client` int NOT NULL,
  `produit` int NOT NULL,
  `quantite` int NOT NULL,
  `prixUnitaire` float NOT NULL,
  `prixTotal` float NOT NULL,
  `noTable` int NOT NULL,
  `dateCmd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`id`, `client`, `produit`, `quantite`, `prixUnitaire`, `prixTotal`, `noTable`, `dateCmd`) VALUES
(6, 8, 29, 1, 6000, 6000, 1, '2024-03-21 23:22:57'),
(10, 8, 31, 8, 500, 4000, 1, '2024-03-22 01:18:51'),
(11, 1, 28, 2, 5000, 10000, 2, '2024-03-22 01:27:44'),
(12, 1, 30, 1, 5000, 5000, 2, '2024-03-22 01:27:44'),
(13, 17, 30, 2, 5000, 10000, 3, '2024-03-22 01:41:38'),
(14, 1, 29, 1, 6000, 6000, 4, '2024-03-25 11:07:39'),
(15, 1, 32, 1, 6000, 6000, 4, '2024-03-25 11:07:39');

-- --------------------------------------------------------

--
-- Table structure for table `paniers`
--

CREATE TABLE `paniers` (
  `client` int NOT NULL,
  `produit` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id` int NOT NULL,
  `categorie` int DEFAULT NULL,
  `nom` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `image` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `prix` float NOT NULL,
  `description` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `archiver` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id`, `categorie`, `nom`, `image`, `prix`, `description`, `archiver`) VALUES
(28, 1, 'ndolè', 'ndolè.jpg', 5000, 'lorem, ipsum dolor sit amet consectetur adipisicing elit. facilis doloribus ducimus quaerat minima laborum molestiae debitis dolorem repellendus incidunt, facere ratione sint officiis, necessitatibus unde cumque nam corporis vero natus.', 0),
(29, 1, 'eru', 'eru.jpg', 6000, 'lorem, ipsum dolor sit amet consectetur adipisicing elit. facilis doloribus ducimus quaerat minima laborum molestiae debitis dolorem repellendus incidunt, facere ratione sint officiis, necessitatibus unde cumque nam corporis vero natus.', 0),
(30, 1, 'hot-dog', 'hot-dog.png', 5000, 'lorem, ipsum dolor sit amet consectetur adipisicing elit. facilis doloribus ducimus quaerat minima laborum molestiae debitis dolorem repellendus incidunt, facere ratione sint officiis, necessitatibus unde cumque nam corporis vero natus.', 1),
(31, 2, 'eau fraiche', 'water.webp', 500, 'lorem, ipsum dolor sit amet consectetur adipisicing elit. facilis doloribus ducimus quaerat minima laborum molestiae debitis dolorem repellendus incidunt, facere ratione sint officiis, necessitatibus unde cumque nam corporis vero natus.', 0),
(32, 1, 'taro', 'taro.png', 6000, 'lorem, ipsum dolor sit amet consectetur adipisicing elit. facilis doloribus ducimus quaerat minima laborum molestiae debitis dolorem repellendus incidunt, facere ratione sint officiis, necessitatibus unde cumque nam corporis vero natus.', 0),
(33, 2, 'cocktail with ice mint', 'cocktail with ice mint.jpg', 1000, 'lorem ipsum dolor sit amet consectetur, adipisicing elit. est reprehenderit numquam debitis quos dolore explicabo magni, tempore eveniet delectus expedita ducimus aspernatur architecto maxime laboriosam culpa doloribus. aut, reprehenderit voluptas.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int NOT NULL,
  `numero` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `numero`) VALUES
(1, 1),
(2, 2),
(5, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client` (`client`),
  ADD KEY `produit` (`produit`);

--
-- Indexes for table `paniers`
--
ALTER TABLE `paniers`
  ADD KEY `client` (`client`),
  ADD KEY `produit` (`produit`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie` (`categorie`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero` (`numero`),
  ADD UNIQUE KEY `numero_2` (`numero`),
  ADD UNIQUE KEY `numero_3` (`numero`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`client`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `commandes_ibfk_2` FOREIGN KEY (`produit`) REFERENCES `produits` (`id`);

--
-- Constraints for table `paniers`
--
ALTER TABLE `paniers`
  ADD CONSTRAINT `paniers_ibfk_1` FOREIGN KEY (`client`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `paniers_ibfk_2` FOREIGN KEY (`produit`) REFERENCES `produits` (`id`);

--
-- Constraints for table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`categorie`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
