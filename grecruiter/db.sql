-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.36 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table grecruiter.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `post_id` bigint unsigned NOT NULL,
  `comment_text` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table grecruiter.comments: ~12 rows (approximately)
INSERT INTO `comments` (`id`, `user_id`, `post_id`, `comment_text`, `created_at`, `updated_at`) VALUES
	(1, 6, 6, 'kekkee', '2024-10-27 08:46:19', NULL),
	(2, 6, 6, 'dasdasdsa', '2024-10-27 08:46:50', NULL),
	(3, 6, 6, 'asdadads', '2024-10-27 09:12:37', NULL),
	(4, 6, 6, 'troi oi  hay qua troi', '2024-10-27 09:14:30', NULL),
	(5, 6, 6, 'troi oi hay qua troi\nchac tui chec que hehehe \nasdasdadd', '2024-10-27 09:16:52', NULL),
	(6, 6, 6, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2024-10-27 09:18:31', NULL),
	(7, 6, 6, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\nádasdddddddddđ\nads\na\nsd', '2024-10-27 09:18:37', NULL),
	(8, 6, 6, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\nádasdddddddddđ\nads\na\nsd', '2024-10-27 09:19:45', NULL),
	(9, 6, 6, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\nádasdddddddddđ\nads\na\nsd', '2024-10-27 09:19:53', NULL),
	(10, 1, 6, 'dasdasd', '2024-11-01 13:23:06', '2024-11-01 13:23:06'),
	(11, 1, 6, 'dasdad', '2024-11-01 13:23:08', '2024-11-01 13:23:08'),
	(12, 1, 5, 'kakakaak', '2024-11-01 13:23:28', '2024-11-01 13:23:28'),
	(13, 1, 4, 'quafo hay qua \n', '2024-11-01 13:23:45', '2024-11-01 13:23:45');

-- Dumping structure for table grecruiter.esports
CREATE TABLE IF NOT EXISTS `esports` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `esport_name` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb3_unicode_ci,
  `icon` text COLLATE utf8mb3_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table grecruiter.esports: ~5 rows (approximately)
INSERT INTO `esports` (`id`, `esport_name`, `description`, `icon`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(12, 'Lien Minh Huyen Thoai', 'LOL', 'lol.png', NULL, '2024-06-30 02:48:51', '2024-06-30 02:48:51'),
	(13, 'Valorant', 'FPS game', 'val.png', NULL, '2024-06-30 03:06:09', '2024-06-30 03:06:09'),
	(14, 'Counter Strike 2', 'Another FPS game!', 'cs2.png', NULL, '2024-06-30 03:06:35', '2024-06-30 05:56:37'),
	(15, 'Street Fighter', 'The RPG game fighting', 'street.png', '2024-09-04 07:00:25', '2024-06-30 03:07:04', '2024-09-04 07:00:25'),
	(16, 'Apex Legends', 'Super FPS game !', 'ape.png', NULL, '2024-06-30 03:07:24', '2024-06-30 03:07:24');

-- Dumping structure for table grecruiter.esport_teams
CREATE TABLE IF NOT EXISTS `esport_teams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `esport_id` bigint unsigned NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `esportteams_esport_id_foreign` (`esport_id`),
  CONSTRAINT `esportteams_esport_id_foreign` FOREIGN KEY (`esport_id`) REFERENCES `esports` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table grecruiter.esport_teams: ~2 rows (approximately)
INSERT INTO `esport_teams` (`id`, `name`, `avatar`, `esport_id`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(2, 'Natius Vitus', 'RIeDYZSl_400x400.jpg', 14, 'dadsad', NULL, '2024-09-04 08:25:07', '2024-09-13 09:12:00');

-- Dumping structure for table grecruiter.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table grecruiter.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table grecruiter.likes
CREATE TABLE IF NOT EXISTS `likes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `post_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table grecruiter.likes: ~4 rows (approximately)
INSERT INTO `likes` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
	(11, 6, 6, '2024-10-27 09:41:42', '2024-10-27 09:41:42'),
	(12, 6, 5, '2024-10-27 09:43:04', '2024-10-27 09:43:04'),
	(13, 1, 6, '2024-11-01 13:23:16', '2024-11-01 13:23:16'),
	(16, 1, 4, '2024-11-01 13:23:38', '2024-11-01 13:23:38');

-- Dumping structure for table grecruiter.members
CREATE TABLE IF NOT EXISTS `members` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `esport_team_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `position_id` bigint unsigned NOT NULL DEFAULT '0',
  `confirm` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `members_esport_team_id_foreign` (`esport_team_id`),
  KEY `members_user_id_foreign` (`user_id`),
  KEY `members_position_id_foreign` (`position_id`),
  CONSTRAINT `members_esport_team_id_foreign` FOREIGN KEY (`esport_team_id`) REFERENCES `esport_teams` (`id`),
  CONSTRAINT `members_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`),
  CONSTRAINT `members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table grecruiter.members: ~2 rows (approximately)
INSERT INTO `members` (`id`, `esport_team_id`, `user_id`, `position_id`, `confirm`, `created_at`, `updated_at`) VALUES
	(1, 2, 2, 1, 1, '2024-09-05 02:49:53', '2024-09-05 02:49:54'),
	(2, 2, 1, 2, 1, '2024-09-05 02:50:05', '2024-09-05 02:50:05');

-- Dumping structure for table grecruiter.menus
CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `order` int NOT NULL,
  `route` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon` char(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `type` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table grecruiter.menus: ~6 rows (approximately)
INSERT INTO `menus` (`id`, `menu_name`, `order`, `route`, `created_at`, `updated_at`, `icon`, `type`) VALUES
	(1, 'Trang chủ', 1, 'client.index', '2024-09-17 03:00:11', '2024-09-17 03:00:11', 'fa-solid fa-house', 1),
	(2, 'Posts', 2, 'client.post.index', '2024-09-17 03:00:41', '2024-09-17 06:41:01', 'fa-solid fa-newspaper', 1),
	(4, 'Player', 3, '', '2024-09-17 06:41:34', '2024-09-17 06:41:34', 'fa-solid fa-user-group', 1),
	(5, 'Writing', 4, 'client.write', '2024-09-17 06:41:55', '2024-09-17 06:41:55', 'fa-solid fa-pen-nib', 1),
	(7, 'Edit', 2, '', '2024-09-17 06:42:35', '2024-09-17 06:42:35', 'fa-solid fa-pen-to-square', 2),
	(8, 'Log out', 3, '', '2024-09-17 06:42:51', '2024-09-17 06:42:51', 'fa-solid fa-right-from-bracket', 2);

-- Dumping structure for table grecruiter.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table grecruiter.migrations: ~10 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(2, '2019_08_19_000000_create_failed_jobs_table', 1),
	(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(4, '2024_06_30_034140_create_esports_table', 1),
	(5, '2024_06_30_034550_create_positions_table', 1),
	(6, '2024_06_30_034550_create_ranks_table', 1),
	(7, '2024_06_30_034551_create_users_table', 1),
	(15, '2024_08_20_100027_create_members_table', 2),
	(16, '2024_09_17_093051_create_menus_table', 3),
	(17, '2024_09_18_072555_create_topics_table', 4),
	(18, '2024_09_18_072829_create_table_posts', 5),
	(19, '2024_10_27_145944_create_likes_table', 6),
	(20, '2024_10_27_150006_create_comments_table', 7);

-- Dumping structure for table grecruiter.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table grecruiter.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table grecruiter.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb3_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table grecruiter.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table grecruiter.positions
CREATE TABLE IF NOT EXISTS `positions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `position_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT '',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `esport_id` bigint DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table grecruiter.positions: ~8 rows (approximately)
INSERT INTO `positions` (`id`, `position_name`, `description`, `deleted_at`, `created_at`, `updated_at`, `esport_id`) VALUES
	(1, 'Adc', 'adc', NULL, '2024-08-29 06:42:36', '2024-10-20 00:37:32', 12),
	(2, 'AdminTeam', 'admin of team', NULL, '2024-09-19 10:42:03', '2024-10-20 00:36:45', 0),
	(3, 'Mid', NULL, NULL, '2024-10-20 00:34:48', '2024-10-20 00:34:48', 12),
	(4, 'Support', NULL, NULL, '2024-10-20 00:34:59', '2024-10-20 00:34:59', 12),
	(5, 'Top', NULL, NULL, '2024-10-20 00:35:06', '2024-10-20 00:35:06', 12),
	(6, 'Jungle', NULL, NULL, '2024-10-20 00:35:13', '2024-10-20 00:35:13', 12),
	(7, 'Spiker', NULL, NULL, '2024-10-20 00:35:20', '2024-10-20 00:35:20', 13),
	(8, 'Molly', NULL, NULL, '2024-10-20 00:35:30', '2024-10-20 00:35:30', 13),
	(9, 'Healer', NULL, NULL, '2024-10-20 00:35:42', '2024-10-20 00:35:42', 13),
	(10, 'Waller', NULL, NULL, '2024-10-20 00:36:36', '2024-10-20 00:36:36', 13);

-- Dumping structure for table grecruiter.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `abstract` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `topic_id` bigint unsigned DEFAULT '0',
  `user_id` bigint unsigned DEFAULT NULL,
  `esport_id` bigint unsigned DEFAULT NULL,
  `esport_team_id` bigint DEFAULT NULL,
  `content` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `position_id` bigint DEFAULT NULL,
  `is_privated` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `views` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table grecruiter.posts: ~6 rows (approximately)
INSERT INTO `posts` (`id`, `title`, `slug`, `abstract`, `topic_id`, `user_id`, `esport_id`, `esport_team_id`, `content`, `thumbnail`, `position_id`, `is_privated`, `created_at`, `updated_at`, `deleted_at`, `views`) VALUES
	(1, 'PROVIDING QUALITY RECRUITING SERVICES SINCE 1977', 'providing-quality-recruiting-services-since-1977', 'Professional Recruiters is dedicated to filling the increasing need for quality recruiting services. As professionals we concentrate on the recruiting requirements of business and industry and refer only those individuals who are specifically qualified.', 6, 1, 12, NULL, '<section style=\'outline: none; position: relative; padding-bottom: 50px; margin: 150px 0px; color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\' id="isPasted"><div style="outline: none; position: relative;"><div style="outline: none; display: flow-root; box-sizing: content-box; max-width: 1200px; margin-left: auto; margin-right: auto; padding-left: 40px; padding-right: 40px;"><div style="outline: none; display: flex; margin-bottom: 0px;"><div style="outline: none; box-sizing: border-box; width: 600px; max-width: 100%;"><div style="outline: none; display: flex; min-height: 500px;"><div style="outline: none; margin-top: auto !important; margin-bottom: auto !important;"><div style="outline: none;"><div style="outline: none;"><p style=\'outline: none; margin: 0px 0px 20px; font-family: "Josefin Sans", sans-serif; color: rgb(32, 32, 32); line-height: 26px;\'>Professional Recruiters knows companies must be fiscally and people wise. Seasoned management and qualified personnel add technical strength to your front line, value to your bottom line. The addition of one key player, recruited directly from your competition, who knows the market, the ropes, and where the mines are buried, can expand your success. The best potential teammates are not looking for new jobs. We will recruit corporate stars and put them to work for you</p></div></div></div></div></div></div></div></div></section>', 'bluescreen.png', 0, 1, '2024-10-20 01:35:30', '2024-10-26 20:08:02', '2024-10-27 03:15:04', 0),
	(2, 'SIMPLIFYING THE RECRUITMENT PROCESS FOR YOU', 'simplifying-the-recruitment-process-for-you', 'Our recruiters save you time, money and mistakes. We’ll help define your needs, confidentially screen candidates, focus on the precise background, education, and corporate culture needed, and handle delicate salary negotiations for smooth entry onto your corporate team. Professional Recruiters can guide your Human Capital investment.', 4, 1, 12, NULL, '<p><span style=\'color: rgb(248, 248, 248); font-family: "Josefin Sans", sans-serif; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\' id="isPasted"><strong>&ldquo;This team was truly professional! They worked with me from a distance, but I received quality service at all times! They helped to place me in a position that was a perfect fit for my career and maintained constant communication at all times. I truly appreciate Professional Recruiters and highly recommend their services!&rdquo;</strong></span></p>', 'tải xuống.jpg', 4, 0, '2024-10-20 01:36:46', '2024-10-20 01:36:46', NULL, 0),
	(3, 'Seeking Talented [Game] Players to Join Our Elite Esports Team!', 'seeking-talented-game-players-to-join-our-elite-esports-team', 'Are you a passionate and skilled [Game] player looking to take your gaming career to the next level? [Team Name] is currently seeking highly competitive players to join our roster. If you have what it takes to compete at the highest level, we encourage you to apply.', 4, 6, 12, NULL, '<p data-sourcepos="11:1-11:17" id="isPasted"><strong>Introduction:</strong></p><ul data-sourcepos="13:1-16:0"><li data-sourcepos="13:1-13:87">Briefly introduce your esports team, including its history, achievements, and vision.</li><li data-sourcepos="14:1-14:71">Highlight the unique opportunities and benefits of joining your team.</li><li data-sourcepos="15:1-16:0">Express your enthusiasm for finding talented individuals to join your roster.</li></ul><p data-sourcepos="17:1-17:17"><strong>Requirements:</strong></p><ul data-sourcepos="19:1-24:0"><li data-sourcepos="19:1-19:103"><strong>Skill Level:</strong> Clearly define the required skill level, such as rank or rating in competitive play.</li><li data-sourcepos="20:1-20:81"><strong>Experience:</strong> Specify any previous competitive experience or accomplishments.</li><li data-sourcepos="21:1-21:89"><strong>Champions/Roles:</strong> List the specific champions or roles that the team is looking for.</li><li data-sourcepos="22:1-22:93"><strong>Teamwork:</strong> Emphasize the importance of teamwork, communication, and a positive attitude.</li><li data-sourcepos="23:1-24:0"><strong>Availability:</strong> Specify the required time commitment and availability for practice and tournaments.</li></ul><p data-sourcepos="25:1-25:24"><strong>Application Process:</strong></p><ul data-sourcepos="27:1-29:0"><li data-sourcepos="27:1-27:146"><strong>How to Apply:</strong> Provide clear instructions on how to submit an application, including the required documents (e.g., resume, gameplay footage).</li><li data-sourcepos="28:1-29:0"><strong>Deadline:</strong> Set a clear deadline for applications.</li></ul><p data-sourcepos="30:1-30:24"><strong>Contact Information:</strong></p><ul data-sourcepos="32:1-34:0"><li data-sourcepos="32:1-32:61"><strong>Email:</strong> Provide a dedicated email address for inquiries.</li><li data-sourcepos="33:1-34:0"><strong>Discord:</strong> If applicable, provide a Discord server or channel for further communication.</li></ul><p data-sourcepos="35:1-35:19"><strong>Call to Action:</strong></p><ul data-sourcepos="37:1-39:0"><li data-sourcepos="37:1-37:73">Encourage potential candidates to apply and become a part of your team.</li><li data-sourcepos="38:1-39:0">Reiterate the benefits of joining your team.</li></ul>', 'jerax-esports-player.png', 4, 0, '2024-10-26 20:31:00', '2024-10-26 20:31:00', NULL, 0),
	(4, 'Seeking Talented League of Legends Players to Join the Apex Predators!', 'seeking-talented-league-of-legends-players-to-join-the-apex-predators', 'Are you a League of Legends player with exceptional mechanical skills and a strategic mind? The Apex Predators are looking for highly competitive players to join our starting roster. If you\'re ready to dominate the Summoner\'s Rift, apply now!', 7, 6, 13, NULL, '<p data-sourcepos="50:1-50:261" id="isPasted">The Apex Predators are a renowned esports organization with a rich history in competitive League of Legends. We have consistently achieved top rankings in major tournaments and are dedicated to fostering a supportive and competitive environment for our players.</p><p data-sourcepos="52:1-52:17"><strong>Requirements:</strong></p><ul data-sourcepos="54:1-59:0"><li data-sourcepos="54:1-54:71"><strong>Skill Level:</strong> Challenger or Grandmaster rank in ranked solo queue.</li><li data-sourcepos="55:1-55:73"><strong>Experience:</strong> Prior experience in competitive leagues or tournaments.</li><li data-sourcepos="56:1-56:122"><strong>Champions/Roles:</strong> Proficiency in at least three top-tier champions for your preferred role (e.g., mid lane, jungler).</li><li data-sourcepos="57:1-57:97"><strong>Teamwork:</strong> Excellent communication skills and the ability to work effectively within a team.</li><li data-sourcepos="58:1-59:0"><strong>Availability:</strong> Must be able to commit to at least 20 hours of practice per week.</li></ul><p data-sourcepos="60:1-60:24"><strong>Application Process:</strong></p><p data-sourcepos="62:1-62:145">To apply, please send your resume and a highlight reel of your best gameplay to [email protected] Applications will be accepted until [deadline].</p><p data-sourcepos="64:1-64:24"><strong>Contact Information:</strong></p><p data-sourcepos="66:1-66:62">For any questions, please contact us at [Discord server link].</p><p data-sourcepos="68:1-68:19"><strong>Call to Action:</strong></p><p data-sourcepos="70:1-70:78">Join the Apex Predators and become a legend on the Summoner&#39;s Rift. Apply now!</p><p data-sourcepos="72:1-72:20"><strong>Additional Tips:</strong></p><ul data-sourcepos="74:1-78:0"><li data-sourcepos="74:1-74:37"><strong>Use clear and concise language.</strong></li><li data-sourcepos="75:1-75:55"><strong>Highlight the unique selling points of your team.</strong></li><li data-sourcepos="76:1-76:55"><strong>Make the application process as easy as possible.</strong></li><li data-sourcepos="77:1-78:0"><strong>Promote your post on relevant social media platforms.</strong></li></ul><p data-sourcepos="79:1-79:131"><strong>By following these guidelines, you can create a compelling recruitment post that attracts top-tier talent to your esports team.</strong></p><p data-sourcepos="81:1-81:87"><strong>Would you like me to create a more tailored post based on a specific game or team?</strong></p>', 'Virtus-Pro-playing-under-outsiders-967x544.jpg', 8, 0, '2024-10-26 20:39:13', '2024-11-01 13:25:37', NULL, 3),
	(5, 'Professional Player Recruitment - [GAM ESPORT]', 'professional-player-recruitment-gam-esport', 'GAM ESPORT is seeking highly skilled and passionate gamers to join our professional gaming team. We are looking for individuals who possess exceptional gaming abilities, a strong team spirit, and a drive to compete at the highest level. Successful candidates will have the opportunity to represent our organization in major esports tournaments and work alongside experienced coaches and staff.', 6, 6, 12, NULL, '<p data-sourcepos="15:1-17:23" id="isPasted"><strong>Position:</strong> Professional Player<strong>Location:</strong> [Địa điểm]<strong>Department:</strong> Esports</p><p data-sourcepos="19:1-19:21"><strong>Responsibilities:</strong></p><ul data-sourcepos="20:1-25:0"><li data-sourcepos="20:1-20:73">Represent [T&ecirc;n Đội/Tổ Chức] in various esports tournaments and leagues.</li><li data-sourcepos="21:1-21:74">Train and practice regularly to improve individual and team performance.</li><li data-sourcepos="22:1-22:61">Maintain a positive and professional attitude at all times.</li><li data-sourcepos="23:1-23:39">Adhere to team rules and regulations.</li><li data-sourcepos="24:1-25:0">Participate in team-building activities and community events.</li></ul><p data-sourcepos="26:1-26:17"><strong>Requirements:</strong></p><ul data-sourcepos="27:1-34:0"><li data-sourcepos="27:1-27:42">Proven experience in competitive gaming.</li><li data-sourcepos="28:1-28:51">High-level skill and understanding of [T&ecirc;n game].</li><li data-sourcepos="29:1-29:53">Excellent game sense and decision-making abilities.</li><li data-sourcepos="30:1-30:43">Strong teamwork and communication skills.</li><li data-sourcepos="31:1-31:52">Ability to work under pressure and meet deadlines.</li><li data-sourcepos="32:1-32:51">Willingness to travel for tournaments and events.</li><li data-sourcepos="33:1-34:0">Fluent in English (both written and spoken).</li></ul><p data-sourcepos="35:1-35:29"><strong>Preferred Qualifications:</strong></p><ul data-sourcepos="36:1-39:0"><li data-sourcepos="36:1-36:46">Experience in streaming or content creation.</li><li data-sourcepos="37:1-37:43">Knowledge of esports industry and trends.</li><li data-sourcepos="38:1-39:0">A large and engaged social media following.</li></ul><p data-sourcepos="40:1-41:132"><strong>How to Apply:</strong>Please submit your resume and a gaming resume (highlighting your achievements, statistics, and gameplay footage) to [Địa chỉ email].</p><p data-sourcepos="43:1-43:165"><strong>[T&ecirc;n Đội/Tổ Chức]</strong> is an equal opportunity employer. We celebrate diversity and are committed to creating an inclusive environment for all employees. &nbsp;&nbsp;</p>', 'post1.jpg', 3, 0, '2024-10-26 20:43:40', '2024-10-26 20:43:40', NULL, 0),
	(6, 'Professional Gamer Wanted: Join Our Esports Team', 'professional-gamer-wanted-join-our-esports-team', 'Are you a passionate gamer with exceptional skills and a competitive spirit? We are seeking talented individuals to join our esports team. Successful candidates will have a deep understanding of [game name], a proven track record of success in competitive gaming, and the ability to work effectively within a team.', 9, 6, 12, NULL, '<p data-sourcepos="14:1-15:106" id="isPasted"><strong>About Us:</strong>[Insert a brief overview of your esports organization, including your history, achievements, and mission.]</p><p data-sourcepos="17:1-17:20"><strong>Job Description:</strong></p><ul data-sourcepos="19:1-24:0"><li data-sourcepos="19:1-19:60">Represent our team in [game name] tournaments and leagues.</li><li data-sourcepos="20:1-20:74">Train and practice regularly to improve individual and team performance.</li><li data-sourcepos="21:1-21:61">Maintain a positive and professional attitude at all times.</li><li data-sourcepos="22:1-22:73">Collaborate with coaches and teammates to develop effective strategies.</li><li data-sourcepos="23:1-24:0">Participate in team-building activities and community events.</li></ul><p data-sourcepos="25:1-25:17"><strong>Requirements:</strong></p><ul data-sourcepos="27:1-41:0"><li data-sourcepos="27:1-31:62"><strong>Skillset:</strong><ul data-sourcepos="28:3-31:62"><li data-sourcepos="28:3-28:46">Advanced level of gameplay in [game name].</li><li data-sourcepos="29:3-29:63">Deep understanding of game mechanics, strategies, and meta.</li><li data-sourcepos="30:3-30:55">Excellent game sense and decision-making abilities.</li><li data-sourcepos="31:3-31:62">Ability to adapt to different playstyles and compositions.</li></ul></li><li data-sourcepos="32:1-35:38"><strong>Experience:</strong><ul data-sourcepos="33:3-35:38"><li data-sourcepos="33:3-33:57">Proven track record of success in competitive gaming.</li><li data-sourcepos="34:3-34:49">Experience playing in tournaments or leagues.</li><li data-sourcepos="35:3-35:38">Knowledge of the esports industry.</li></ul></li><li data-sourcepos="36:1-41:0"><strong>Personal Qualities:</strong><ul data-sourcepos="37:3-41:0"><li data-sourcepos="37:3-37:37">Strong work ethic and dedication.</li><li data-sourcepos="38:3-38:35">Excellent communication skills.</li><li data-sourcepos="39:3-39:40">Ability to work well under pressure.</li><li data-sourcepos="40:3-41:0">Team player with a positive attitude.</li></ul></li></ul><p data-sourcepos="42:1-42:18"><strong>What We Offer:</strong></p><ul data-sourcepos="44:1-50:0"><li data-sourcepos="44:1-44:58"><strong>Competitive salary:</strong> [Insert salary range or details]</li><li data-sourcepos="45:1-45:57"><strong>Performance-based bonuses:</strong> [Insert bonus structure]</li><li data-sourcepos="46:1-46:106"><strong>Opportunities for growth and development:</strong> [Insert details about training programs, mentorship, etc.]</li><li data-sourcepos="47:1-47:57"><strong>Access to top-tier gaming equipment and facilities.</strong></li><li data-sourcepos="48:1-48:60"><strong>Travel opportunities to attend tournaments and events.</strong></li><li data-sourcepos="49:1-50:0"><strong>A supportive and collaborative team environment.</strong></li></ul><p data-sourcepos="51:1-51:17"><strong>How to Apply:</strong></p><p data-sourcepos="53:1-53:144">Please submit your resume and a brief cover letter to [email protected] Include your in-game name and any relevant links to your gaming profile.</p>', 'SAF-FIFA-eSports-Player-Kai.png', 5, 0, '2024-10-26 21:01:40', '2024-10-26 21:01:40', NULL, 0);

-- Dumping structure for table grecruiter.ranks
CREATE TABLE IF NOT EXISTS `ranks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `esport_id` bigint unsigned NOT NULL,
  `rank_name` text COLLATE utf8mb3_unicode_ci,
  `icon` text COLLATE utf8mb3_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ranks_esport_id_foreign` (`esport_id`),
  CONSTRAINT `ranks_esport_id_foreign` FOREIGN KEY (`esport_id`) REFERENCES `esports` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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

-- Dumping structure for table grecruiter.time_lines
CREATE TABLE IF NOT EXISTS `time_lines` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `start_time` date NOT NULL,
  `end_time` date NOT NULL,
  `description` varchar(500) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `time_lines_user_id_foreign` (`user_id`),
  CONSTRAINT `time_lines_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table grecruiter.time_lines: ~0 rows (approximately)

-- Dumping structure for table grecruiter.topics
CREATE TABLE IF NOT EXISTS `topics` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `esport_id` bigint DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table grecruiter.topics: ~9 rows (approximately)
INSERT INTO `topics` (`id`, `topic_name`, `created_at`, `updated_at`, `esport_id`) VALUES
	(1, 'Tuyển dụng game thủ chuyên nghiệp', '2024-09-18 00:58:20', '2024-10-19 23:49:21', 12),
	(2, 'Tuyển dụng vị trí ADC', '2024-09-18 01:09:18', '2024-10-19 23:49:38', 12),
	(4, 'Ứng tuyển vị trí Support', '2024-10-19 23:48:18', '2024-10-19 23:48:18', 12),
	(5, 'Ứng tuyển vị trí Mid', '2024-10-19 23:48:30', '2024-10-19 23:48:30', 12),
	(6, 'Ứng tuyển vị trí HLV', '2024-10-19 23:48:46', '2024-10-19 23:48:46', 12),
	(7, 'Ứng tuyển vị trí Top Laner', '2024-10-19 23:48:57', '2024-10-19 23:48:57', 12),
	(8, 'Ứng tuyển vị trí ADC', '2024-10-19 23:49:07', '2024-10-19 23:49:07', 12),
	(9, 'Ứng tuyển vị trí HLV múa lửa', '2024-10-20 00:09:47', '2024-10-20 00:20:16', 12),
	(10, 'Tuyển dụng Phân tích viên', '2024-10-20 00:16:56', '2024-10-20 00:20:34', 12);

-- Dumping structure for table grecruiter.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `address` varchar(250) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `avatar` varchar(500) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `birthday` date DEFAULT NULL,
  `esport_id` bigint unsigned NOT NULL DEFAULT '0',
  `nickname` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `rank_id` bigint unsigned NOT NULL DEFAULT '0',
  `rank_points` bigint DEFAULT '0',
  `position_id` bigint unsigned DEFAULT NULL,
  `advantage_1` text COLLATE utf8mb3_unicode_ci,
  `advantage_2` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `advantage_3` text COLLATE utf8mb3_unicode_ci,
  `is_admin` tinyint(1) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `esport_team` bigint DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_nickname_unique` (`nickname`),
  KEY `users_position_id_foreign` (`position_id`),
  CONSTRAINT `users_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table grecruiter.users: ~7 rows (approximately)
INSERT INTO `users` (`id`, `email`, `name`, `password`, `phone`, `address`, `avatar`, `birthday`, `esport_id`, `nickname`, `rank_id`, `rank_points`, `position_id`, `advantage_1`, `advantage_2`, `advantage_3`, `is_admin`, `deleted_at`, `created_at`, `updated_at`, `remember_token`, `esport_team`) VALUES
	(1, 'ngocdung2002d@gmail.com', 'Nguyễn Ngọc Dũng', '$2y$12$RvhSm/tQJimlUdk53Wb6ju89fguRZnQYcMWNivo8qFvK1TiMzRuGG', '0368225831', 'TRường trung học phổ thông quỳnh lưu 4', '453514655_1038246637703242_3169082358294790999_n.jpg', '2024-08-16', 12, 'SK T1 Hasmesd', 1, 0, 1, 'd1', 'd2', 'd3', 0, NULL, '2024-08-29 06:42:58', '2024-09-17 23:59:26', 'B95SdM8siT4SdJ2F4qG7GdghatjELz2dtbDxK3lMwE4rdCsi2eEaRvlDABJ6', 0),
	(2, 'n2d@gmail.comm', 'Peter Hugo', '$2y$12$RvhSm/tQJimlUdk53Wb6ju89fguRZnQYcMWNivo8qFvK1TiMzRuGG', '0368225832', 'TRường trung học phổ thông quỳnh lưu 4', 'IMG_5882.PNG', '2024-09-08', 12, 'SSG Viktor', 9, 0, 1, '111111', 'aaaaaaaaaaaaaaaa', 'asdasda', 0, NULL, '2024-09-04 19:48:14', '2024-09-17 23:59:57', 'Pk6y4ehI62924I2nwnHko0KtWgZGecSu4pevgYecGMfSr28n1T1p9KgtxXof', 0),
	(3, 'ndasdad02d@gmail.com', 'asdadsdadsa', '$2y$12$RvhSm/tQJimlUdk53Wb6ju89fguRZnQYcMWNivo8qFvK1TiMzRuGG', '1234566541', NULL, '', NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 1, NULL, '2024-09-15 11:37:10', '2024-09-15 11:37:10', NULL, 0),
	(4, 'asdadg2002d@gmail.com', 'Ngọc Dũng', '$2y$12$RvhSm/tQJimlUdk53Wb6ju89fguRZnQYcMWNivo8qFvK1TiMzRuGG', '0362225831', NULL, '', NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 1, NULL, '2024-09-15 20:05:03', '2024-09-15 20:05:03', NULL, 0),
	(5, 'ngoc.dung.304.1975@gmail.com', 'Duxng CACA', '$2y$12$RvhSm/tQJimlUdk53Wb6ju89fguRZnQYcMWNivo8qFvK1TiMzRuGG', '0368115131', NULL, '', NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 1, NULL, '2024-09-15 20:15:21', '2024-09-15 20:15:21', NULL, 0),
	(6, 'fakernguyen5831@gmail.com', 'Lee Sang Hyuk', '$2y$12$RvhSm/tQJimlUdk53Wb6ju89fguRZnQYcMWNivo8qFvK1TiMzRuGG', '0362222831', 'TRường trung học phổ thông quỳnh lưu 4', 'post1.jpg', '2024-09-05', 12, 'DWG Madlife', 1, 0, 1, 'dasda', 'asdasdasd', 'aasdadadsas', 0, NULL, '2024-09-18 00:00:53', '2024-09-18 00:00:53', NULL, 0),
	(7, 'ngocddfedd@gmail.com', 'HaoShen', '$2y$12$RvhSm/tQJimlUdk53Wb6ju89fguRZnQYcMWNivo8qFvK1TiMzRuGG', '0333325831', 'TRường trung học phổ thông quỳnh lưu 4', '1293302.jpg', '2024-09-22', 12, 'PLW Katatta', 1, 0, 1, 'dasda', 'dasdasd', 'dasda', 0, NULL, '2024-09-18 00:01:42', '2024-09-18 00:01:42', NULL, 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
