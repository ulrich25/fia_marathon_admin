-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage de la structure de table semi_marathon. admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `mail` varchar(50) DEFAULT NULL,
  `nom_admin` varchar(50) NOT NULL DEFAULT '',
  `prenom_admin` varchar(50) NOT NULL DEFAULT '',
  `mot_passe` varchar(100) NOT NULL,
  `telephone_admin` int NOT NULL DEFAULT '0',
  `Profession_admin` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table semi_marathon.admins : ~1 rows (environ)
DELETE FROM `admins`;
INSERT INTO `admins` (`id_admin`, `mail`, `nom_admin`, `prenom_admin`, `mot_passe`, `telephone_admin`, `Profession_admin`, `created_at`, `updated_at`) VALUES
	(1, 'andi@mail.com', '', '', '12345', 0, 'maitre', '2023-10-09 23:12:29', '2023-10-09 23:12:33');

-- Listage de la structure de table semi_marathon. categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id_categories` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_categories`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table semi_marathon.categories : ~5 rows (environ)
DELETE FROM `categories`;
INSERT INTO `categories` (`id_categories`, `libelle`, `created_at`, `updated_at`) VALUES
	(1, 'Ecoles', NULL, NULL),
	(2, 'ENTREPRISES', NULL, NULL),
	(3, 'CORPS CONSTITUES', NULL, NULL),
	(4, 'COMMUNES', NULL, NULL),
	(5, 'INDIVIDUELS', NULL, NULL);

-- Listage de la structure de table semi_marathon. courses
CREATE TABLE IF NOT EXISTS `courses` (
  `id_courses` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `montant` int NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_courses`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table semi_marathon.courses : ~3 rows (environ)
DELETE FROM `courses`;
INSERT INTO `courses` (`id_courses`, `libelle`, `montant`, `created_at`, `updated_at`) VALUES
	(1, 'FITINI( 5KM )', 10000, '2023-10-10 15:04:46', NULL),
	(2, 'MINI ( 10KM )', 10000, '2023-10-10 15:05:06', NULL),
	(3, 'SEMI ( 21KM )', 15000, '2023-10-10 15:05:19', NULL);

-- Listage de la structure de table semi_marathon. moyenpaiements
CREATE TABLE IF NOT EXISTS `moyenpaiements` (
  `idMoyenPaie` bigint NOT NULL DEFAULT '0',
  `libelleMoyenPaie` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `codeMoyenPaien` char(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idMoyenPaie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table semi_marathon.moyenpaiements : ~5 rows (environ)
DELETE FROM `moyenpaiements`;
INSERT INTO `moyenpaiements` (`idMoyenPaie`, `libelleMoyenPaie`, `codeMoyenPaien`, `created_at`, `updated_at`) VALUES
	(1, 'FLOOZ', NULL, '2023-10-15 13:15:56', NULL),
	(2, 'MTN MONNEY', NULL, '2023-10-15 13:16:34', NULL),
	(3, 'ORANGE MONNEY', NULL, '2023-10-15 13:16:50', NULL),
	(4, 'WAVE', NULL, '2023-10-15 13:17:03', NULL),
	(5, 'CARTE BANCAIRE', NULL, '2023-10-15 13:17:21', NULL);

-- Listage de la structure de table semi_marathon. participants
CREATE TABLE IF NOT EXISTS `participants` (
  `Id_participant` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(200) NOT NULL,
  `Adresse` varchar(100) NOT NULL,
  `Profession` varchar(100) NOT NULL,
  `Date_de_Naissance` date NOT NULL,
  `Courses` int NOT NULL DEFAULT '0',
  `Categories` tinyint NOT NULL DEFAULT '0',
  `Nationalite` varchar(25) NOT NULL,
  `Telephone` varchar(50) NOT NULL DEFAULT '',
  `Nom_equipe` varchar(50) NOT NULL,
  `Genre` varchar(12) NOT NULL,
  `montant` bigint DEFAULT '0',
  `code_paiement` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `etat_paiement` tinyint NOT NULL DEFAULT '1',
  `reference_paiement` varchar(150) DEFAULT NULL,
  `idMoyenPaie` bigint DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`Id_participant`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table semi_marathon.participants : ~3 rows (environ)
DELETE FROM `participants`;
INSERT INTO `participants` (`Id_participant`, `Nom`, `Prenom`, `Adresse`, `Profession`, `Date_de_Naissance`, `Courses`, `Categories`, `Nationalite`, `Telephone`, `Nom_equipe`, `Genre`, `montant`, `code_paiement`, `etat_paiement`, `reference_paiement`, `idMoyenPaie`, `password`, `created_at`, `updated_at`) VALUES
	(1, 'KONAN', 'Florences', 'mail@mail.com', 'joueur', '2023-10-10', 1, 1, 'ivoire', '0758924279', 'gome', 'F', 25000, 'ANrences20231011091050', 1, NULL, NULL, '1', '2023-10-11 09:26:50', '2023-10-11 09:26:50'),
	(2, 'ANDERSON KASSI', 'Florences', 'mail@mail.com', 'joueur', '2023-10-18', 2, 3, 'ivoire', '0758924280', 'gome', 'M', 0, 'ERSON KASSIrences20231015051033', 1, NULL, NULL, 'azerty', '2023-10-15 05:18:33', '2023-10-15 05:18:33'),
	(3, 'ANDERSON KASSI', 'Florences', 'mail@mail.com', 'joueur', '2023-09-29', 1, 1, 'ivoire', '0758924278', 'gome', 'M', 0, 'ERSON KASSIrences20231015051003', 2, 'azeadazda', NULL, 'azerty', '2023-10-15 05:25:03', '2023-10-15 05:25:03');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
