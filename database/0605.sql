-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `announcements`;
CREATE TABLE `announcements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clinic_id` int(10) unsigned NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `areas`;
CREATE TABLE `areas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `areas` (`id`, `area`, `created_at`, `updated_at`) VALUES
(1,	'太平區',	NULL,	NULL),
(2,	'大里區',	NULL,	NULL),
(3,	'霧峰區',	NULL,	NULL),
(4,	'北屯區',	NULL,	NULL),
(5,	'東區',	NULL,	NULL);

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1,	'內科',	NULL,	NULL),
(2,	'中醫',	NULL,	NULL),
(3,	'耳鼻喉科',	NULL,	NULL),
(4,	'骨科',	NULL,	NULL),
(5,	'眼科',	NULL,	NULL);

DROP TABLE IF EXISTS `clinics`;
CREATE TABLE `clinics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned DEFAULT NULL,
  `area_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_week_sections` text COLLATE utf8mb4_unicode_ci,
  `reservable_day` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `clinics` (`id`, `category_id`, `area_id`, `name`, `tel`, `address`, `photo`, `per_week_sections`, `reservable_day`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	'勤益診所',	'04-23933999',	'台中市太平區中山路一段319號',	'1558725116.jpg',	'星期一～星期五 上午診 09：00 ~ 12：00  下午診 14：00 ~ 17：00   夜診17：30 ~ 22：00\r\n星期六 上午診 09：30 ~ 12：00  下午診 14：00 ~ 18：30   ',	14,	NULL,	NULL),
(2,	1,	1,	'康祐診所',	'04-23934432',	'台中市太平區中山路一段220號',	NULL,	'星期一～星期五 上午診 08：30 ~ 12：00  下午診 14：00 ~ 17：00   夜診17：30 ~ 21:00',	14,	NULL,	NULL),
(3,	2,	2,	'全育診所',	'04-24810136',	'台中市大里區益民路二段333之1號',	NULL,	'星期一～星期五 上午診 09：00 ~ 12：00  下午診 14：00 ~ 17：00   夜診17：30 ~ 20：00\r\n\r\n星期六 上午診 09：30 ~ 12：00  下午診 14：00 ~ 17：00   ',	14,	NULL,	NULL),
(4,	2,	2,	'益民診所',	'04-24872868',	'台中市大里區益民路二段355之10號',	NULL,	'星期一～星期五 上午診 09：00 ~ 12：00  下午診 14：00 ~ 18：00   夜診18：30 ~ 20：00',	14,	NULL,	NULL),
(5,	3,	3,	'霧澄診所',	'04-23334478',	'台中市霧峰區中正路1123號',	NULL,	'星期一～星期五 上午診 09：00 ~ 12：00  下午診 14：00 ~ 17：00   夜診17：30 ~ 20：00',	14,	NULL,	NULL),
(6,	3,	3,	'仁美診所',	'04-23335105',	'台中市霧峰區中正路1062號',	NULL,	'星期一～星期五 上午診 09：00 ~ 12：00  下午診 14：00 ~ 17：00   夜診18：30 ~ 20：00',	14,	NULL,	NULL),
(7,	4,	4,	'長庚診所',	'04-28493044',	'台中市北屯區北屯路212巷8號',	NULL,	'星期一～星期五 上午診 09：00 ~ 12：00  下午診 14：00 ~ 17：00   夜診17：30 ~ 20：00',	14,	NULL,	NULL),
(8,	4,	4,	'承康診所',	'04-24377838',	'台中市北屯區東山路一段300-1號',	NULL,	'星期一～星期五 上午診 09：00 ~ 12：00  下午診 14：00 ~ 17：00   夜診17：30 ~ 20：50',	14,	NULL,	NULL),
(9,	5,	5,	'祐軒診所',	'04-22235124',	'台中市東區台中路300-1號',	NULL,	'星期一～星期五 上午診 09：00 ~ 12：00  下午診 14：00 ~ 17：00   夜診17：30 ~ 21：00',	14,	NULL,	NULL),
(10,	5,	5,	'立人診所',	'04-22816886',	'台中市大公街558號',	NULL,	'星期一～星期五 上午診 09：00 ~ 12：00  下午診 14：00 ~ 17：00   夜診17：30 ~ 20：00',	14,	NULL,	NULL);

DROP TABLE IF EXISTS `clinic_medicines`;
CREATE TABLE `clinic_medicines` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clinic_id` int(10) unsigned NOT NULL,
  `medicine_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `diagnoses`;
CREATE TABLE `diagnoses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(10) unsigned NOT NULL,
  `doctor_id` int(10) unsigned NOT NULL,
  `symptom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `diagnoses` (`id`, `member_id`, `doctor_id`, `symptom`, `date`, `created_at`, `updated_at`) VALUES
(2,	1,	1,	'頭痛',	'2019-06-05',	'2019-06-05 03:44:46',	'2019-06-05 03:44:46'),
(3,	3,	1,	'心律不整',	'2019-06-04',	'2019-06-05 03:49:49',	'2019-06-05 03:49:49');

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE `doctors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clinic_id` int(10) unsigned NOT NULL,
  `staff_id` int(10) unsigned NOT NULL,
  `specialties` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experiences` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `degrees` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clinic_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `doctors` (`id`, `clinic_id`, `staff_id`, `specialties`, `experiences`, `degrees`, `clinic_date`, `created_at`, `updated_at`) VALUES
(1,	1,	2,	'內科專科、心臟內科專科',	'臺大醫院胸腔科研究員、臺大醫院新竹分院老人內科主任',	'國防醫學院 醫學系',	'2019-06-04',	'2019-06-04 17:52:45',	'2019-06-04 17:52:45'),
(2,	1,	4,	'視網膜裂孔及剝離、飛蚊症、糖尿病視網膜病變、高血壓視網膜病變、黃斑部病變、玻璃體出血、小切口白内障手術',	'台北國泰醫學中心視網膜科主治醫師 、美國約翰霍普金斯醫學中心視網膜研究 、中華民國眼科醫學會會員 、美國眼科醫學會會員',	'中國醫藥學院醫學系畢業',	'2019-06-04',	'2019-06-04 17:53:24',	'2019-06-04 17:53:24'),
(3,	1,	5,	NULL,	NULL,	NULL,	'2019-06-04',	'2019-06-04 17:54:08',	'2019-06-04 17:54:08');

DROP TABLE IF EXISTS `favorite_clinics`;
CREATE TABLE `favorite_clinics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `clinics_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `favorite_clinics` (`id`, `user_id`, `clinics_id`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	'2019-06-04 18:53:47',	'2019-06-04 18:53:47');

DROP TABLE IF EXISTS `first_consultations`;
CREATE TABLE `first_consultations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(10) unsigned NOT NULL,
  `medical_history` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `allergy` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `medicines`;
CREATE TABLE `medicines` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clinic_id` int(10) unsigned NOT NULL,
  `medicine` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `medicines` (`id`, `clinic_id`, `medicine`, `created_at`, `updated_at`) VALUES
(1,	1,	'心達舒錠',	NULL,	NULL),
(2,	1,	'樂壓錠',	NULL,	NULL),
(3,	1,	'定脈平錠',	NULL,	NULL),
(4,	1,	'胃全膠曩',	NULL,	NULL),
(5,	1,	'樂謝錠',	NULL,	NULL),
(6,	1,	'蘇拉通錠',	NULL,	NULL),
(7,	1,	'諾合隆錠',	NULL,	NULL),
(8,	1,	'固力康錠',	NULL,	NULL),
(9,	1,	'解熱鎮痛劑',	NULL,	NULL),
(10,	1,	'精神安定劑',	NULL,	NULL);

DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `number` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `members_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `members` (`id`, `name`, `birthday`, `number`, `phone`, `address`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'林建勳',	'1997-11-14',	'N128734935',	'0933457868',	'臺中市太平區中山路二段57號',	'member01@gmail.com',	NULL,	'$2y$10$HvflTADPYiI12FOBC9Ff0uZ8Vwbkfayv9GSXfbZQTJ.A38hHzbuja',	'MQYL0eoeq71kdQg6f2NtUswaqNbwOQg3BLyp5qo3O8UGN5RR2txBgZePOJuM',	'2019-06-04 10:31:07',	'2019-06-04 10:31:07'),
(2,	'賴律妏',	'1998-05-17',	'F228990881',	'0982637445',	'臺中市霧峰區吉峰東路27號',	'member02@gmail.com',	NULL,	'$2y$10$3HDZIP7rV7krM3dc9TLng.IkEH/jgohfcUVdQShrLaTgo3VHY1QlS',	'YZbfz1hYNZyQzoEjSOln0lhM83wwjW6rY4PYAW789fhziyJ4oHKFCjrTX9NG',	'2019-06-04 10:32:30',	'2019-06-04 10:32:30'),
(3,	'劉宜樺',	'1997-12-28',	'L225161748',	'0927297098',	'臺中市太平區中山路二段91號',	'member03@gmail.com',	NULL,	'$2y$10$4aePlu1fMe77/JnFIoNBZeygxAHEuDnw2MYvFvlJFio.gZqRy9roq',	'xntm2xLlGaBmSNIf7KHoARSqPd2MuDbLaj4xBtM6SSTvgxo9rHtAXoQikbL7',	'2019-06-04 10:34:36',	'2019-06-04 10:34:36'),
(4,	'江珮妤',	'1998-05-02',	'B223192541',	'0970776818',	'台中市南區建成路7號',	'member04@gmail.com',	NULL,	'$2y$10$9Osr6LyAHASVd8JOXEWXNuBBbivTYxxgre5Fge3PiAZjOoPcQLur2',	'mkQQpDY99ppCDZeG1HzNYW7yzVNsofmmpFDyCqvO9W72JPgO601yK9Wt5xjm',	'2019-06-04 10:36:51',	'2019-06-04 10:36:51'),
(5,	'黃清愿',	'1998-08-23',	'B229827364',	'0937495873',	'台中市大里區塗城路365號',	'member05@gmail.com',	NULL,	'$2y$10$NbYthUUOf.qfh/6/gA3nwujcSfyb1acsZrH37BlLoRbhw.e8cjv3e',	'7y0A04ZeKArmlJXrKxP576nJ1jpsL1UoYwDMBDpeZkIvHsIoVYTJBHmYZzx6',	'2019-06-04 10:39:21',	'2019-06-04 10:39:21'),
(6,	'劉凰蓮',	'1998-03-31',	'H227493058',	'0937283748',	'台中市太平區中山路一段240號',	'member06@gmail.com',	NULL,	'$2y$10$8P2TB0FlckuJS0gcuYBKS.WOEvWYqFf7L3Kyl1Bzb83ZRPmCcbrLe',	'UIURDU7MfWDWVIXmeOVMWnwQ9dcphnrpiQX3FrMAyCBTlLMHQB69WyYh15Lk',	'2019-06-04 10:42:01',	'2019-06-04 10:42:01'),
(7,	'宋狄峰',	'1997-11-22',	'B124839284',	'0922837485',	'台中市北區力行路399號',	'member07@gmail.com',	NULL,	'$2y$10$VfKg18ejrjUV71vsUzkOJeeFHtfLpYqXC5jn/gWi/FiIsc..p9BJW',	'H3nO5Rdjt0QDPpUUKXWCkGvMvPWA0dz7JRsElKmV7iOFxgZ8Uohfuz9S3zLp',	'2019-06-04 10:43:49',	'2019-06-04 10:43:49'),
(8,	'林欣',	'1997-09-25',	'B223847593',	'0938475993',	'台中市烏日區中正路494號',	'member08@gmail.com',	NULL,	'$2y$10$/DRqhnAYx.0ML5KwXlYaL.BeHsxJgge259rHiuSIod4q2Xn2Qnloq',	'EwWyn6xPE6DOzvblTRJWVLUwpCW2YghanOQJmz5Gcgfe7Getl66sc3U3PVwu',	'2019-06-04 10:46:16',	'2019-06-04 10:46:16');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2018_12_14_062352_create_doctors_table',	1),
(4,	'2018_12_14_062621_create_staff_table',	1),
(5,	'2018_12_14_062716_create_reservations_table',	1),
(6,	'2018_12_14_062845_create_clinics_table',	1),
(7,	'2018_12_14_063007_create_announcements_table',	1),
(8,	'2018_12_14_063358_create_admins_table',	1),
(9,	'2018_12_14_063512_create_posts_table',	1),
(10,	'2018_12_14_063810_create_medicines_table',	1),
(11,	'2018_12_14_063852_create_registers_table',	1),
(12,	'2018_12_14_093622_create_sections_table',	1),
(13,	'2019_01_29_191154_create_clinic_medicines_table',	1),
(14,	'2019_03_16_100943_create_first_consultations_table',	1),
(15,	'2019_03_16_101311_create_diagnoses_table',	1),
(16,	'2019_03_16_101338_create_positions_table',	1),
(17,	'2019_03_16_101608_create_per_week_sections_table',	1),
(18,	'2019_03_16_101714_create_prescriptions_table',	1),
(19,	'2019_03_16_101848_create_categories_table',	1),
(20,	'2019_03_16_101907_create_areas_table',	1),
(21,	'2019_03_16_204727_create_members_table',	1),
(22,	'2019_04_21_234249_create_favorite_clinic_table',	1);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `per_week_sections`;
CREATE TABLE `per_week_sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `doctor_id` int(10) unsigned NOT NULL,
  `weekday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suspense_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suspense_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `per_week_sections` (`id`, `doctor_id`, `weekday`, `start_time`, `end_time`, `from`, `suspense_from`, `suspense_to`, `created_at`, `updated_at`) VALUES
(1,	1,	'星期一',	'09:00',	'12:00',	'2019-05-03',	NULL,	NULL,	NULL,	NULL),
(2,	1,	'星期一',	'14:00',	'18:00',	'2019-05-03',	NULL,	NULL,	NULL,	NULL),
(3,	2,	'星期一',	'18:00',	'21:00',	'2019-05-03',	NULL,	NULL,	NULL,	NULL),
(4,	3,	'星期一',	'18:00',	'21:00',	'2019-05-03',	NULL,	NULL,	NULL,	NULL),
(5,	1,	'星期二',	'09:00',	'12:00',	'2019-05-03',	NULL,	NULL,	NULL,	NULL),
(6,	2,	'星期二',	'14:00',	'18:00',	'2019-05-03',	NULL,	NULL,	NULL,	NULL),
(7,	3,	'星期二',	'18:00',	'21:00',	'2019-05-03',	NULL,	NULL,	NULL,	NULL),
(8,	1,	'星期三',	'09:00',	'12:00',	'2019-05-03',	NULL,	NULL,	NULL,	NULL),
(9,	1,	'星期三',	'14:00',	'18:00',	'2019-05-03',	NULL,	NULL,	NULL,	NULL),
(10,	2,	'星期三',	'18:00',	'21:00',	'2019-05-03',	NULL,	NULL,	NULL,	NULL),
(11,	3,	'星期三',	'18:00',	'21:00',	'2019-05-03',	NULL,	NULL,	NULL,	NULL),
(12,	2,	'星期四',	'09:00',	'12:00',	'2019-05-03',	NULL,	NULL,	NULL,	NULL),
(13,	2,	'星期四',	'14:00',	'18:00',	'2019-05-03',	NULL,	NULL,	NULL,	NULL),
(14,	3,	'星期四',	'18:00',	'21:00',	'2019-05-03',	NULL,	NULL,	NULL,	NULL),
(15,	3,	'星期五',	'09:00',	'12:00',	'2019-05-03',	NULL,	NULL,	NULL,	NULL),
(16,	2,	'星期五',	'14:00',	'18:00',	'2019-05-03',	NULL,	NULL,	NULL,	NULL),
(17,	1,	'星期五',	'18:00',	'21:00',	'2019-05-03',	NULL,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `positions`;
CREATE TABLE `positions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `positions` (`id`, `position`, `created_at`, `updated_at`) VALUES
(1,	'診所管理員',	NULL,	NULL),
(2,	'櫃台人員',	NULL,	NULL),
(3,	'助理護士',	NULL,	NULL),
(4,	'醫生',	NULL,	NULL);

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` int(10) unsigned NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `prescriptions`;
CREATE TABLE `prescriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `diagnosis_id` int(10) unsigned NOT NULL,
  `medicine_id` int(10) unsigned NOT NULL,
  `dosage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `prescriptions` (`id`, `diagnosis_id`, `medicine_id`, `dosage`, `note`, `created_at`, `updated_at`) VALUES
(3,	2,	1,	'每日4次',	'飯後服用',	'2019-06-04 19:50:32',	'2019-06-04 19:50:32'),
(4,	3,	3,	'每日4次',	'飯後服用',	'2019-06-03 23:17:19',	'2019-06-04 23:17:19');

DROP TABLE IF EXISTS `registers`;
CREATE TABLE `registers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `section_id` int(10) unsigned NOT NULL,
  `member_id` int(10) unsigned NOT NULL,
  `reservation_no` float unsigned NOT NULL,
  `status` int(11) NOT NULL DEFAULT '-1',
  `reminding_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reminding_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `registers` (`id`, `section_id`, `member_id`, `reservation_no`, `status`, `reminding_time`, `reminding_no`, `note`, `created_at`, `updated_at`) VALUES
(8,	1,	5,	1,	2,	NULL,	NULL,	NULL,	NULL,	NULL),
(9,	1,	3,	2,	0,	NULL,	NULL,	NULL,	NULL,	'2019-06-04 23:25:29'),
(11,	1,	6,	3,	0,	NULL,	NULL,	NULL,	NULL,	'2019-06-05 07:37:27'),
(12,	1,	7,	4,	0,	NULL,	NULL,	NULL,	NULL,	'2019-06-05 07:37:27'),
(13,	1,	8,	5,	0,	NULL,	NULL,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE `reservations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `section_id` int(10) unsigned NOT NULL,
  `member_id` int(10) unsigned NOT NULL,
  `number` int(10) unsigned NOT NULL,
  `reminding_time` datetime NOT NULL,
  `reminding_no` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `sections`;
CREATE TABLE `sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clinic_id` int(10) unsigned NOT NULL,
  `doctor_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `start` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_no` int(11) NOT NULL,
  `next_register_no` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sections` (`id`, `clinic_id`, `doctor_id`, `date`, `start`, `end`, `current_no`, `next_register_no`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	'2019-06-05',	'14:00',	'18:00',	1,	6,	NULL,	'2019-06-05 07:37:27'),
(2,	1,	1,	'2019-06-06',	'14:00',	'18:00',	0,	1,	NULL,	'2019-06-04 19:15:02'),
(3,	1,	2,	'2019-06-06',	'09:00',	'12:00',	0,	1,	NULL,	'2019-06-04 19:15:29'),
(4,	1,	3,	'2019-06-06',	'18:00',	'21:00',	0,	1,	NULL,	NULL),
(5,	1,	1,	'2019-06-07',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(6,	1,	2,	'2019-06-07',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(7,	1,	3,	'2019-06-07',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(8,	1,	1,	'2019-06-08',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(9,	1,	1,	'2019-06-08',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(10,	1,	2,	'2019-06-08',	'18:00',	'21:00',	0,	1,	NULL,	NULL),
(11,	1,	3,	'2019-06-08',	'18:00',	'21:00',	0,	1,	NULL,	NULL),
(12,	1,	2,	'2019-06-09',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(13,	1,	1,	'2019-06-10',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(14,	1,	1,	'2019-06-10',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(15,	1,	2,	'2019-06-10',	'18:00',	'21:00',	0,	1,	NULL,	NULL),
(16,	1,	1,	'2019-06-11',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(17,	1,	3,	'2019-06-11',	'18:00',	'21:00',	0,	1,	NULL,	NULL),
(18,	1,	2,	'2019-06-12',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(19,	1,	1,	'2019-06-11',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(20,	1,	3,	'2019-06-12',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(21,	1,	2,	'2019-06-12',	'18:00',	'21:00',	0,	1,	NULL,	NULL),
(22,	1,	3,	'2019-06-13',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(23,	1,	2,	'2019-06-13',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(24,	1,	3,	'2019-06-13',	'18:00',	'21:00',	0,	1,	NULL,	NULL),
(25,	1,	1,	'2019-06-14',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(26,	1,	2,	'2019-06-14',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(27,	1,	3,	'2019-06-14',	'18:00',	'21:00',	0,	1,	NULL,	NULL),
(28,	1,	2,	'2019-06-15',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(29,	1,	2,	'2019-06-15',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(30,	1,	2,	'2019-06-17',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(31,	1,	1,	'2019-06-17',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(32,	1,	2,	'2019-06-18',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(33,	1,	1,	'2019-06-18',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(34,	1,	1,	'2019-06-18',	'18:00',	'21:00',	0,	1,	NULL,	NULL),
(35,	1,	2,	'2019-06-19',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(36,	1,	2,	'2019-06-19',	'18:00',	'21:00',	0,	1,	NULL,	NULL),
(37,	1,	1,	'2019-06-20',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(38,	1,	2,	'2019-06-20',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(39,	1,	3,	'2019-06-20',	'18:00',	'21:00',	0,	1,	NULL,	NULL);

DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clinic_id` int(10) unsigned DEFAULT NULL,
  `position_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `staff` (`id`, `clinic_id`, `position_id`, `name`, `photo`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	'林建勳',	'1558718450.jpg',	'staff1@gmail.com',	'$2y$10$S0Ha/1or2byrbCSnsyaKh./SyFv0n9BGhvb4CQW9c8FsqOUnv/kiC',	'ZuMILeAyitmwN37dGwGhF3gYfOENXYqbvla8wFIG7DssopKLgdhqUhvQTgjh',	'2019-06-04 11:42:43',	'2019-06-04 11:42:43'),
(2,	1,	4,	'張家偉',	'1559699520.jpg',	'doctor1@gmail.com',	'$2y$10$cAivjckXXNmDac8rJRi9JelgyEuz13y9HKYO/z4q8GVadSAAzjcq2',	'6bIHM0uyokUqdeBDb50P09fLbDAha0OnwyR9umm4Qao4vHAQXdV0e8aPdpZd',	'2019-06-03 16:00:00',	'2019-06-04 17:52:01'),
(4,	1,	4,	'周承凱',	'1559699604.jpg',	'doctor2@gmail.com',	'$2y$10$NjveqfAU8Fw7gdblQp.a6.kqesy869bgjpWJth03lT0VFMWRxseu2',	NULL,	'2019-06-03 16:00:00',	'2019-06-04 17:53:24'),
(5,	1,	4,	'陳智軒',	'1559699648.jpg',	'doctor3@gmail.com',	'$2y$10$knZSWwL9ZPA/fgva2e0CvetE8AtYAr8pc9RtcYbh3pWOUDPtj.IV2',	NULL,	'2019-06-03 16:00:00',	'2019-06-04 17:54:08');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2019-06-05 08:08:48