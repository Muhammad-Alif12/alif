-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.3.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for 21_jwt_capil
CREATE DATABASE IF NOT EXISTS `21_jwt_capil` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `21_jwt_capil`;

-- Dumping structure for table 21_jwt_capil.layanan_konsolidasi
CREATE TABLE IF NOT EXISTS `layanan_konsolidasi` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `tujuan_konsolidasi` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'BELUM PROSES',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table 21_jwt_capil.layanan_konsolidasi: ~1 rows (approximately)
/*!40000 ALTER TABLE `layanan_konsolidasi` DISABLE KEYS */;
INSERT INTO `layanan_konsolidasi` (`id`, `nik`, `nama`, `no_hp`, `tujuan_konsolidasi`, `status`) VALUES
  (1, '123', 'oioi', '123', '', 'SEDANG PROSES'),
  (2, '123', 'oioi', '123', 'BPJS', 'BELUM PROSES');
/*!40000 ALTER TABLE `layanan_konsolidasi` ENABLE KEYS */;

-- Dumping structure for table 21_jwt_capil.layanan_umum
CREATE TABLE IF NOT EXISTS `layanan_umum` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `jenis_layanan` varchar(20) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'BELUM PROSES',
  `file` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table 21_jwt_capil.layanan_umum: ~1 rows (approximately)
/*!40000 ALTER TABLE `layanan_umum` DISABLE KEYS */;
INSERT INTO `layanan_umum` (`id`, `jenis_layanan`, `nik`, `nama`, `no_hp`, `status`, `file`) VALUES
  (6, 'KTP', '123', 'oioi', '123', 'SEDANG PROSES', '');
/*!40000 ALTER TABLE `layanan_umum` ENABLE KEYS */;

-- Dumping structure for table 21_jwt_capil.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table 21_jwt_capil.user: ~0 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table 21_jwt_capil.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table 21_jwt_capil.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
  (1, 'muh alif', 'karya mula', 'alif@gmail.com', '$2y$10$Ca8WCshEwhz8geJmqCvzVO50KJyQnV2FpvI5XcEvFxBPAP0ob2UZu');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
