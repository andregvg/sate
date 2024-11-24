/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `sate` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;
USE `sate`;

CREATE TABLE IF NOT EXISTS `buses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `capacity` int(10) unsigned NOT NULL,
  `type` enum('regular','adapted') NOT NULL COMMENT 'Type of buses: regular or adaptades van',
  `status` enum('reserved','available') DEFAULT 'available' COMMENT 'bus statys: reserved, available, inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `destinations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adress` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `schedules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `school_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL COMMENT 'Data do agendamento',
  `departure_time` time DEFAULT NULL COMMENT 'Horário do embarque',
  `return_time` time DEFAULT NULL COMMENT 'Horário do retorno',
  `origin_adress` text DEFAULT NULL COMMENT 'Endereço de origem',
  `destination_adress` text DEFAULT NULL COMMENT 'Endereço do destino',
  `passengers` int(10) unsigned DEFAULT NULL COMMENT 'Quantidade de passageiros',
  `contact` tinytext DEFAULT NULL COMMENT 'Dados para contato',
  `status` enum('pending','approved','rejected','deleted') NOT NULL DEFAULT 'pending' COMMENT 'pending, approved, rejected, deleted',
  `comment` text DEFAULT NULL,
  `created_by` int(10) unsigned NOT NULL COMMENT 'Usuário que criou o agendamento',
  `aproved_by` int(10) unsigned DEFAULT NULL COMMENT 'Usuário que aprovou o agendamento',
  `aproved_at` timestamp NULL DEFAULT NULL COMMENT 'Data da aprovação do agendamento',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Data da criação do agendamento',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_school_schedule` (`school_id`),
  CONSTRAINT `fk_school_schedule` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `schools` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `region_code` varchar(1) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `sae_name` varchar(255) NOT NULL COMMENT 'Nome no Sistema SAE',
  `period` enum('EF1','EF2','EF1/EF2') DEFAULT NULL COMMENT 'Etapas de ensino no Fundamental: EF1, EF2, EF1/EF2',
  `eja_modality` enum('Y','N') NOT NULL DEFAULT 'N',
  `inep_code` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `inep_code` (`inep_code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `school_id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `active` enum('Y','N') DEFAULT 'Y',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `fk_user_school` (`school_id`) USING BTREE,
  CONSTRAINT `FK_SCHOOL_USER` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `user_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `schedule_create` enum('Y','N') DEFAULT NULL COMMENT 'Permissão para criar agendamentos',
  `schedule_approve` enum('Y','N') DEFAULT NULL COMMENT 'permissão para aprovar agendamentos',
  `users_create` enum('Y','N') DEFAULT 'N' COMMENT 'Permissão para criar usuários',
  `users_view` enum('Y','N') DEFAULT 'N' COMMENT 'Permissão para visualizar usuários',
  `schools_create` enum('Y','N') DEFAULT 'N' COMMENT 'Permissão para criar escolas',
  `schools_view` enum('Y','N') DEFAULT 'N' COMMENT 'Permissão para visualizar escolas',
  `calendar_edit` enum('Y','N') DEFAULT 'N' COMMENT 'Permissão para editar calendário de agendamento',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_user_permissions` (`user_id`),
  CONSTRAINT `fk_user_permissions` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
