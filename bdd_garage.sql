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


-- Listage de la structure de la base pour garage
CREATE DATABASE IF NOT EXISTS `garage` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `garage`;

-- Listage de la structure de table garage. marque
CREATE TABLE IF NOT EXISTS `marque` (
  `id_marque` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id_marque`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table garage.marque : 27 rows
DELETE FROM `marque`;
/*!40000 ALTER TABLE `marque` DISABLE KEYS */;
INSERT INTO `marque` (`id_marque`, `nom`) VALUES
	(1, 'Toyota'),
	(2, 'Honda'),
	(3, 'Ford'),
	(4, 'Chevrolet'),
	(5, 'Nissan'),
	(6, 'Mercedes-Benz'),
	(7, 'BMW'),
	(8, 'Audi'),
	(9, 'Hyundai'),
	(10, 'Kia'),
	(11, 'Subaru'),
	(12, 'Jeep'),
	(13, 'Porsche'),
	(14, 'Fiat'),
	(15, 'Renault'),
	(16, 'Peugeot'),
	(17, 'Citroën'),
	(18, 'Land Rover'),
	(19, 'Jaguar'),
	(20, 'Mini'),
	(21, 'Tesla'),
	(22, 'Mitsubishi'),
	(23, 'Suzuki'),
	(24, 'Dacia'),
	(25, 'Chrysler'),
	(41, 'Ferrari'),
	(44, 'Lamborghini');
/*!40000 ALTER TABLE `marque` ENABLE KEYS */;

-- Listage de la structure de table garage. modeles
CREATE TABLE IF NOT EXISTS `modeles` (
  `Mod1` int NOT NULL,
  `Mod2` int NOT NULL,
  `Mod3` int NOT NULL,
  `Mod4` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table garage.modeles : 0 rows
DELETE FROM `modeles`;
/*!40000 ALTER TABLE `modeles` DISABLE KEYS */;
/*!40000 ALTER TABLE `modeles` ENABLE KEYS */;

-- Listage de la structure de table garage. utilisateur
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `nom` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prenom` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `IDuser` int NOT NULL AUTO_INCREMENT,
  `mail` varchar(50) NOT NULL,
  `role` enum('client','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'client',
  PRIMARY KEY (`IDuser`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table garage.utilisateur : 2 rows
DELETE FROM `utilisateur`;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` (`nom`, `prenom`, `mdp`, `IDuser`, `mail`, `role`) VALUES
	('Wu', 'Marina', 'Garage123', 0, 'marina.wu00@gmail.com', 'admin'),
	('Bkn', 'Evy', 'evybkn123', 4, 'evy.bkn@gmail.com', 'client');
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;

-- Listage de la structure de table garage. vehicules
CREATE TABLE IF NOT EXISTS `vehicules` (
  `num_imma` varchar(25) NOT NULL,
  `marque` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `modele` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `couleur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prix` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `klm` int NOT NULL,
  `date_premiere` date NOT NULL,
  `date_rentree` date NOT NULL,
  `nb_chevaux` int NOT NULL,
  `description` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(255) NOT NULL,
  `IDvehicule` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`IDvehicule`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table garage.vehicules : 3 rows
DELETE FROM `vehicules`;
/*!40000 ALTER TABLE `vehicules` DISABLE KEYS */;
INSERT INTO `vehicules` (`num_imma`, `marque`, `modele`, `couleur`, `prix`, `klm`, `date_premiere`, `date_rentree`, `nb_chevaux`, `description`, `image`, `IDvehicule`) VALUES
	('521 541 NC', 'Renault', 'ARKANA', 'Noire', '995 000', 20154, '2019-04-02', '2020-08-26', 3, '000', 'image/renault_arkana.jpg', 6),
	('987 541 NC', 'Peugeot', 'Landrek', 'Gris', '745 651 ', 56465, '2019-12-06', '2021-10-04', 95, '000', 'image/peugeot_landrek.png', 11),
	('78538543', 'Citroën', 'rghd', 'rhef', '57865', 78537543, '2021-08-07', '2020-08-07', 8754, '785327', 'image/peugeot208.png', 26);
/*!40000 ALTER TABLE `vehicules` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
