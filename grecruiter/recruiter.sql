-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.36 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.7.0.6850
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table grecruiter.esports: ~5 rows (approximately)
INSERT INTO `esports` (`id`, `esport_name`, `description`, `icon`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(12, 'Lien Minh Huyen Thoai', 'LOL', 'lol.png', NULL, '2024-06-30 02:48:51', '2024-06-30 02:48:51'),
	(13, 'Valorant', 'FPS game', 'val.png', NULL, '2024-06-30 03:06:09', '2024-06-30 03:06:09'),
	(14, 'Counter Strike 2', 'Another FPS game!', 'cs2.png', NULL, '2024-06-30 03:06:35', '2024-06-30 05:56:37'),
	(15, 'Street Fighter', 'The RPG game fighting', 'street.png', '2024-09-04 07:00:25', '2024-06-30 03:07:04', '2024-09-04 07:00:25'),
	(16, 'Apex Legends', 'Super FPS game !', 'ape.png', NULL, '2024-06-30 03:07:24', '2024-06-30 03:07:24');

-- Dumping data for table grecruiter.esport_teams: ~2 rows (approximately)
INSERT INTO `esport_teams` (`id`, `name`, `avatar`, `esport_id`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'Nguyễn Ngọc Dũng Tean', 'C:\\Users\\HP\\AppData\\Local\\Temp\\php95AB.tmp', 12, 'asdasdasdasd', '2024-09-04 08:27:25', '2024-09-04 08:21:45', '2024-09-04 08:27:25'),
	(2, 'Nguyễn Ngọc Dũng Team 2', 'fish-logo-icon-design-vector.png', 14, 'dadsad', NULL, '2024-09-04 08:25:07', '2024-09-04 08:55:31');

-- Dumping data for table grecruiter.positions: ~1 rows (approximately)
INSERT INTO `positions` (`id`, `position_name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'ADC - LOL', 'adc', NULL, '2024-08-29 06:42:36', '2024-08-29 06:42:36');

-- Dumping data for table grecruiter.ranks: ~9 rows (approximately)
INSERT INTO `ranks` (`id`, `esport_id`, `rank_name`, `icon`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 12, 'Iron', 'iron.png', NULL, '2024-06-30 07:30:37', '2024-08-29 06:16:25'),
	(2, 12, 'Gold', '250.png', NULL, '2024-06-30 08:04:18', '2024-07-02 09:06:57'),
	(3, 12, 'Silver', '250 (1).png', NULL, '2024-06-30 08:05:37', '2024-06-30 08:05:37'),
	(4, 12, 'Platinum', '5.png', NULL, '2024-06-30 08:06:11', '2024-06-30 08:06:11'),
	(5, 12, 'Emeral', '250 (2).png', NULL, '2024-06-30 08:06:39', '2024-06-30 08:06:39'),
	(6, 12, 'Diamond', '250 (3).png', NULL, '2024-06-30 08:07:08', '2024-06-30 08:07:08'),
	(7, 12, 'Master', 'Master_Emblem_2022.png', NULL, '2024-06-30 08:08:15', '2024-06-30 08:08:15'),
	(9, 12, 'GrandMaster', 'Grandmaster_Emblem_2022.png', NULL, '2024-06-30 08:08:40', '2024-06-30 08:08:40'),
	(10, 12, 'Challenger', '4415894930323.png', NULL, '2024-06-30 08:08:56', '2024-06-30 08:08:56');

-- Dumping data for table grecruiter.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `email`, `name`, `password`, `phone`, `address`, `avatar`, `birthday`, `esport_id`, `nickname`, `rank_id`, `rank_points`, `position_id`, `advantage_1`, `advantage_2`, `advantage_3`, `is_admin`, `deleted_at`, `created_at`, `updated_at`, `remember_token`) VALUES
	(1, 'ngocdung2002d@gmail.com', 'Nguyễn Ngọc Dũng', '$2y$12$O36Xl6uyKf422QV0WdOgnOwixdm7GiAKUxMKOvNQUr.VhvtNavZgS', '0368225831', 'TRường trung học phổ thông quỳnh lưu 4', '453514655_1038246637703242_3169082358294790999_n.jpg', '2024-08-16', 12, 'ngocdung1111', 1, 0, 1, 'd1', 'd2', 'd3', 0, NULL, '2024-08-29 06:42:58', '2024-09-04 07:05:38', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
