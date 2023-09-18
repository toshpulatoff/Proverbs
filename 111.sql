-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
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

-- Dumping data for table proverbs.categories: ~7 rows (approximately)
INSERT INTO `categories` (`id`, `parent_id`, `created_at`, `updated_at`) VALUES
	(3, 0, '2023-07-02 09:54:17', '2023-07-02 09:54:17'),
	(4, 0, '2023-07-03 12:28:12', '2023-07-03 12:28:12'),
	(6, 4, '2023-08-01 16:58:10', '2023-08-01 16:58:10'),
	(11, 0, '2023-08-07 15:48:58', '2023-08-07 15:48:58'),
	(13, 0, '2023-09-07 10:40:12', '2023-09-07 10:40:12'),
	(15, 0, '2023-09-13 14:59:17', '2023-09-13 14:59:17');

-- Dumping data for table proverbs.category_proverb: ~8 rows (approximately)
INSERT INTO `category_proverb` (`category_id`, `proverb_id`) VALUES
	(4, 6),
	(3, 10),
	(11, 12),
	(13, 13),
	(3, 14),
	(13, 15),
	(3, 16),
	(3, 17),
	(6, 17),
	(3, 20);

-- Dumping data for table proverbs.category_translations: ~4 rows (approximately)
INSERT INTO `category_translations` (`id`, `category_id`, `name`, `description`, `locale`, `created_at`, `updated_at`) VALUES
	(3, 3, 'Justice', 'about justice', 'oz', '2023-07-02 09:54:17', '2023-07-03 12:30:27'),
	(4, 4, 'Do\'stlik1', 'dostlik haqida1', 'oz', '2023-07-03 12:28:12', '2023-07-03 12:29:55'),
	(6, 6, 'Sub friend', 'dasfafddafa', 'oz', '2023-08-01 16:58:10', '2023-08-01 16:58:10'),
	(11, 11, 'yengi', 'new desc', 'oz', '2023-08-07 15:48:58', '2023-08-07 15:48:58'),
	(13, 13, 'Oila', 'Family', 'oz', '2023-09-07 10:40:12', '2023-09-07 10:40:12'),
	(14, 15, 'Business', 'Business des', 'oz', '2023-09-13 14:59:17', '2023-09-13 14:59:17');

-- Dumping data for table proverbs.failed_jobs: ~0 rows (approximately)

-- Dumping data for table proverbs.migrations: ~13 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(313, '2014_10_12_000000_create_users_table', 1),
	(314, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(315, '2019_08_19_000000_create_failed_jobs_table', 1),
	(316, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(317, '2023_03_11_104142_create_categories_table', 1),
	(318, '2023_03_11_104207_create_proverbs_table', 1),
	(319, '2023_03_11_104238_create_tags_table', 1),
	(320, '2023_03_12_171619_create_roles_table', 1),
	(321, '2023_03_12_173253_create_role_user_table', 1),
	(322, '2023_03_12_173457_create_proverb_tag_table', 1),
	(323, '2023_03_12_173637_create_category_proverb_table', 1),
	(324, '2023_03_13_072223_create_proverb_translations_table', 1),
	(325, '2023_03_13_072719_create_category_translations_table', 1);

-- Dumping data for table proverbs.password_reset_tokens: ~0 rows (approximately)

-- Dumping data for table proverbs.personal_access_tokens: ~0 rows (approximately)

-- Dumping data for table proverbs.proverbs: ~8 rows (approximately)
INSERT INTO `proverbs` (`id`, `author_id`, `status`, `created_at`, `updated_at`) VALUES
	(6, 1, 0, '2023-07-02 14:59:19', '2023-07-02 14:59:19'),
	(10, 1, 0, '2023-07-05 17:36:57', '2023-07-05 17:36:57'),
	(12, 2, 0, '2023-09-05 16:17:28', '2023-09-05 16:17:28'),
	(13, 2, 0, '2023-09-07 10:51:21', '2023-09-07 10:51:21'),
	(14, 2, 0, '2023-09-07 12:27:25', '2023-09-07 12:27:25'),
	(15, 2, 0, '2023-09-08 10:28:36', '2023-09-08 10:28:36'),
	(16, 2, 0, '2023-09-11 11:21:19', '2023-09-11 11:21:19'),
	(17, 2, 0, '2023-09-13 13:53:23', '2023-09-13 13:53:23'),
	(20, 2, 0, '2023-09-13 16:29:25', '2023-09-13 16:29:25');

-- Dumping data for table proverbs.proverb_tag: ~13 rows (approximately)
INSERT INTO `proverb_tag` (`proverb_id`, `tag_id`) VALUES
	(6, 1),
	(6, 2),
	(10, 3),
	(12, 2),
	(12, 3),
	(14, 1),
	(14, 2),
	(14, 3),
	(15, 4),
	(16, 3),
	(16, 4),
	(17, 1),
	(20, 1);

-- Dumping data for table proverbs.proverb_translations: ~33 rows (approximately)
INSERT INTO `proverb_translations` (`id`, `proverb_id`, `content`, `locale`, `created_at`, `updated_at`) VALUES
	(21, 6, '1', 'oz', '2023-07-02 14:59:19', '2023-07-03 13:22:12'),
	(22, 6, '2', 'uz', '2023-07-02 14:59:19', '2023-07-03 13:22:12'),
	(23, 6, '3', 'en', '2023-07-02 14:59:19', '2023-07-03 13:22:12'),
	(24, 6, '4', 'ru', '2023-07-02 14:59:19', '2023-07-03 13:22:12'),
	(37, 10, 'Quam doloremque quis', 'oz', '2023-07-05 17:36:57', '2023-07-05 17:36:57'),
	(38, 10, 'Consequatur Quaerat', 'uz', '2023-07-05 17:36:57', '2023-07-05 17:36:57'),
	(39, 10, 'Veniam ea molestiae', 'en', '2023-07-05 17:36:57', '2023-07-05 17:36:57'),
	(40, 10, 'Officiis incidunt e', 'ru', '2023-07-05 17:36:57', '2023-07-05 17:36:57'),
	(45, 12, 'Harum quaerat anim v', 'oz', '2023-09-05 16:17:28', '2023-09-05 16:17:28'),
	(46, 12, 'Minim provident rer', 'uz', '2023-09-05 16:17:28', '2023-09-05 16:17:28'),
	(47, 12, 'Ea aut laborum tempo', 'en', '2023-09-05 16:17:28', '2023-09-05 16:17:28'),
	(48, 12, 'Veniam officia maio', 'ru', '2023-09-05 16:17:28', '2023-09-05 16:17:28'),
	(49, 13, 'Қариб қуйилмаган, Ачиб суюлмас.', 'oz', '2023-09-07 10:51:21', '2023-09-07 10:51:21'),
	(50, 13, 'Qarib quyilmagan, Achib suyulmas.', 'uz', '2023-09-07 10:51:21', '2023-09-07 10:51:21'),
	(51, 13, 'Young saint, old devil.', 'en', '2023-09-07 10:51:21', '2023-09-07 10:51:21'),
	(52, 13, 'Ha седину беспадок.', 'ru', '2023-09-07 10:51:21', '2023-09-07 10:51:21'),
	(53, 14, 'Illum necessitatibu', 'oz', '2023-09-07 12:27:25', '2023-09-07 12:27:25'),
	(54, 14, 'Libero dolor accusam', 'uz', '2023-09-07 12:27:25', '2023-09-07 12:27:25'),
	(55, 14, 'Dolorum optio repre', 'en', '2023-09-07 12:27:25', '2023-09-07 12:27:25'),
	(56, 14, 'Voluptatum atque in', 'ru', '2023-09-07 12:27:25', '2023-09-07 12:27:25'),
	(57, 15, 'Nisi consectetur vo', 'oz', '2023-09-08 10:28:36', '2023-09-08 10:28:36'),
	(58, 15, 'Esse autem quo veni', 'uz', '2023-09-08 10:28:36', '2023-09-08 10:28:36'),
	(59, 15, 'Ex dolore sit qui qu', 'en', '2023-09-08 10:28:36', '2023-09-08 10:28:36'),
	(60, 15, 'Molestiae omnis ea q', 'ru', '2023-09-08 10:28:36', '2023-09-08 10:28:36'),
	(61, 16, 'Consectetur omnis ad', 'oz', '2023-09-11 11:21:19', '2023-09-11 11:21:19'),
	(62, 16, 'Natus aliquip conseq', 'uz', '2023-09-11 11:21:19', '2023-09-11 11:21:19'),
	(63, 16, 'Qui totam dolores al', 'en', '2023-09-11 11:21:19', '2023-09-11 11:21:19'),
	(64, 16, 'Nostrud corrupti lo', 'ru', '2023-09-11 11:21:19', '2023-09-11 11:21:19'),
	(65, 17, 'oz ', 'oz', '2023-09-13 15:04:58', '2023-09-13 15:08:33'),
	(66, 17, 'uz', 'uz', '2023-09-13 15:08:33', '2023-09-13 15:08:33'),
	(67, 17, 'en', 'en', '2023-09-13 15:08:33', '2023-09-13 15:08:33'),
	(68, 17, 'ru', 'ru', '2023-09-13 15:08:33', '2023-09-13 15:08:33'),
	(69, 20, 'oz', 'oz', '2023-09-13 16:29:25', '2023-09-13 16:29:25'),
	(70, 20, 'q', 'uz', '2023-09-13 16:29:25', '2023-09-13 16:29:25'),
	(71, 20, 'q', 'en', '2023-09-13 16:29:25', '2023-09-13 16:29:25'),
	(72, 20, 'q', 'ru', '2023-09-13 16:29:25', '2023-09-13 16:29:25');

-- Dumping data for table proverbs.roles: ~0 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'administrator', '2023-08-28 10:54:35', '2023-08-28 10:54:35'),
	(2, 'qw', '2023-09-12 14:53:27', '2023-09-12 14:53:27');

-- Dumping data for table proverbs.role_user: ~1 rows (approximately)
INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
	(1, 2);

-- Dumping data for table proverbs.tags: ~2 rows (approximately)
INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'uy', '2023-07-01 16:50:12', '2023-09-07 10:59:28'),
	(2, 'mashina', '2023-07-01 16:50:22', '2023-07-01 16:50:22'),
	(3, 'test', '2023-07-01 16:50:34', '2023-07-01 16:50:34'),
	(4, 'baxt', '2023-09-07 12:27:04', '2023-09-07 12:27:04'),
	(5, 'best', '2023-09-13 14:30:19', '2023-09-13 14:30:19');

-- Dumping data for table proverbs.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'qwe', 'qwe@qwe.com', NULL, '$2y$10$fMKqFZEpLOfuGLbwwYrrBOgRDBhKlF6bL4MRI1OedrnqLGaSI5xke', 1, NULL, '2023-07-01 16:49:27', '2023-07-01 16:49:27'),
	(2, 'Admin', 'admin@admin.com', NULL, '$2y$10$/WHTLP7qB.Isyd3Ht0QeCekyYEI0n4q23gdOzePYTmDq9zOmu8Y1q', 1, NULL, '2023-08-28 10:54:35', '2023-08-28 10:54:35');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
