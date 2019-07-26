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

INSERT INTO `admins` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1,	'admin1@gmial.com',	'123456',	NULL,	NULL);

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

INSERT INTO `announcements` (`id`, `clinic_id`, `title`, `content`, `datetime`, `created_at`, `updated_at`) VALUES
(1,	1,	'系統維修',	'親愛的診所人員您好，本系統將於6/11凌晨01:00進行維修，敬請見諒',	'2019-06-10 04:07:00',	'2019-06-09 20:07:31',	'2019-06-09 20:07:31');

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
(2,	1,	1,	'康祐診所',	'04-23934432',	'台中市太平區中山路一段220號',	'1560127436.jpg',	'星期一～星期五 上午診 08：30 ~ 12：00  下午診 14：00 ~ 17：00   夜診17：30 ~ 21:00',	7,	NULL,	'2019-06-09 16:43:56'),
(3,	2,	2,	'全育診所',	'04-24810136',	'台中市大里區益民路二段333之1號',	'1560127400.jpg',	'星期一～星期五 上午診 09：00 ~ 12：00  下午診 14：00 ~ 17：00   夜診17：30 ~ 20：00\r\n\r\n星期六 上午診 09：30 ~ 12：00  下午診 14：00 ~ 17：00',	7,	NULL,	'2019-06-09 16:43:20'),
(4,	2,	2,	'益民診所',	'04-24872868',	'台中市大里區益民路二段355之10號',	NULL,	'星期一～星期五 上午診 09：00 ~ 12：00  下午診 14：00 ~ 18：00   夜診18：30 ~ 20：00',	14,	NULL,	NULL),
(5,	3,	3,	'霧澄診所',	'04-23334478',	'台中市霧峰區中正路1123號',	NULL,	'星期一～星期五 上午診 09：00 ~ 12：00  下午診 14：00 ~ 17：00   夜診17：30 ~ 20：00',	14,	NULL,	NULL),
(6,	3,	3,	'仁美診所',	'04-23335105',	'台中市霧峰區中正路1062號',	NULL,	'星期一～星期五 上午診 09：00 ~ 12：00  下午診 14：00 ~ 17：00   夜診18：30 ~ 20：00',	14,	NULL,	NULL),
(7,	4,	4,	'長庚診所',	'04-28493044',	'台中市北屯區北屯路212巷8號',	NULL,	'星期一～星期五 上午診 09：00 ~ 12：00  下午診 14：00 ~ 17：00   夜診17：30 ~ 20：00',	14,	NULL,	NULL),
(8,	4,	4,	'承康診所',	'04-24377838',	'台中市北屯區東山路一段300-1號',	NULL,	'星期一～星期五 上午診 09：00 ~ 12：00  下午診 14：00 ~ 17：00   夜診17：30 ~ 20：50',	14,	NULL,	NULL),
(9,	5,	5,	'祐軒診所',	'04-22235124',	'台中市東區台中路300-1號',	NULL,	'星期一～星期五 上午診 09：00 ~ 12：00  下午診 14：00 ~ 17：00   夜診17：30 ~ 21：00',	14,	NULL,	NULL),
(10,	5,	5,	'立人診所',	'04-22816886',	'台中市大公街558號',	NULL,	'星期一～星期五 上午診 09：00 ~ 12：00  下午診 14：00 ~ 17：00   夜診17：30 ~ 20：00',	14,	NULL,	NULL),
(11,	1,	1,	'巫冬梅中醫診所',	'04-22730000',	'台中市太平區中興東路33號',	NULL,	'星期一～星期五 上午診 09：00 ~ 12：00  下午診 14：00 ~ 17：00   夜診17：30 ~ 20：00',	14,	'2019-06-08 12:16:07',	'2019-06-08 12:16:07'),
(12,	2,	3,	'康康診所',	'04-29472834',	'台中市霧峰區中山路125號',	NULL,	'星期一～星期五 上午診 09：00 ~ 12：00  下午診 14：00 ~ 17：00   夜診17：30 ~ 20：00',	14,	'2019-06-08 12:23:43',	'2019-06-08 12:23:43'),
(13,	3,	4,	'慶耀診所',	'04-38472934',	'台中市北屯區東山路58號',	NULL,	'星期一～星期五 上午診 09：00 ~ 12：00  下午診 14：00 ~ 17：00   夜診17：30 ~ 21：00',	14,	'2019-06-08 12:24:42',	'2019-06-08 12:24:42'),
(15,	4,	5,	'里仁診所',	'04-39485738',	'台中市東區大智路384號',	NULL,	'星期一～星期五 上午診 09：00 ~ 12：00  下午診 14：00 ~ 17：00   夜診17：30 ~ 21：00',	14,	'2019-06-08 22:15:05',	'2019-06-08 22:15:05'),
(16,	1,	5,	'星河展所',	'04-38492402',	'臺中市東區承德路68號',	NULL,	'星期一～星期五 上午診 09：00 ~ 12：00  下午診 14：00 ~ 18：00   夜診17：30 ~ 21：00',	14,	'2019-06-08 22:18:04',	'2019-06-08 22:18:04');

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
(3,	3,	1,	'心律不整',	'2019-06-09',	'2019-06-05 03:49:49',	'2019-06-05 03:49:49');

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
(3,	1,	5,	'影像導引介入性檢查與治療',	'台北榮總放射線部主治醫師',	'高雄醫學大學醫學士',	'2019-06-04',	'2019-06-04 17:54:08',	'2019-06-04 17:54:08'),
(4,	2,	12,	'臺大醫院傑出研究獎',	'台灣大學醫學院附設醫院內科部胸腔內科主治醫師',	'台灣大學醫學院醫學系畢業',	'2019-06-01',	'2019-06-09 12:48:43',	'2019-06-09 12:48:43'),
(5,	2,	13,	'糖尿病、肝炎照護',	'台北市立婦幼醫院主治醫師',	'中國醫藥學院醫學系',	'2019-06-01',	'2019-06-09 12:50:25',	'2019-06-09 12:50:25'),
(6,	3,	14,	'中風後遺症、顏面神經麻痺、酸痛等一般針灸科疾病',	'高雄市立中醫醫院住院醫師',	'中國醫藥學院中醫系畢',	'2019-06-01',	'2019-06-09 12:56:01',	'2019-06-09 12:56:01'),
(7,	3,	15,	'一般內科、呼吸道、腸胃道疾病，過敏體質調理',	'高雄市立中醫醫院住院醫師',	'台灣大學醫學院復健醫學系畢',	'2019-06-02',	'2019-06-09 12:58:08',	'2019-06-09 12:58:08');

DROP TABLE IF EXISTS `favorite_clinics`;
CREATE TABLE `favorite_clinics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `clinics_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


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
(10,	1,	'精神安定劑',	NULL,	NULL),
(11,	2,	'抗凝劑',	NULL,	NULL),
(12,	2,	'溶栓劑',	NULL,	NULL),
(13,	2,	'甘露醇',	NULL,	NULL),
(14,	2,	'阿司匹林',	NULL,	NULL),
(15,	2,	'氯吡格雷',	NULL,	NULL),
(16,	2,	'低分子肝素鈣',	NULL,	NULL),
(17,	2,	'華法林(Warfarin)',	NULL,	NULL),
(18,	2,	'阿替普酶(Alteplase)',	NULL,	NULL),
(19,	2,	'尼莫地平(Nimodipine)',	NULL,	NULL),
(20,	2,	'卡馬西平(Carbamazepine)',	NULL,	NULL),
(21,	3,	'活血袪瘀藥',	NULL,	NULL),
(22,	3,	'止血藥',	NULL,	NULL),
(23,	3,	'驅蟲藥',	NULL,	NULL),
(24,	3,	'消食藥',	NULL,	NULL),
(25,	3,	'理氣藥',	NULL,	NULL),
(26,	3,	'補虛藥',	NULL,	NULL),
(27,	3,	'補虛藥',	NULL,	NULL),
(28,	3,	'平肝熄風藥',	NULL,	NULL),
(29,	3,	'安神藥',	NULL,	NULL),
(30,	3,	'化痰止咳平喘藥',	NULL,	NULL);

DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `number` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `members_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `members` (`id`, `name`, `birthday`, `number`, `phone`, `address`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'林建勳',	'1997-11-14',	'N128734935',	'0933457868',	'臺中市太平區中山路二段57號',	'member01@gmail.com',	NULL,	'$2y$10$HvflTADPYiI12FOBC9Ff0uZ8Vwbkfayv9GSXfbZQTJ.A38hHzbuja',	'rrtuLEAlUfHfKuXKm4rWHB1PspfaoDNboh0maE8iYF3ghea7R2bGJlXG9QVB',	'2019-06-04 10:31:07',	'2019-06-04 10:31:07'),
(2,	'賴律妏',	'1998-05-17',	'F228990881',	'0982637445',	'臺中市霧峰區吉峰東路27號',	'member02@gmail.com',	NULL,	'$2y$10$3HDZIP7rV7krM3dc9TLng.IkEH/jgohfcUVdQShrLaTgo3VHY1QlS',	'YZbfz1hYNZyQzoEjSOln0lhM83wwjW6rY4PYAW789fhziyJ4oHKFCjrTX9NG',	'2019-06-04 10:32:30',	'2019-06-04 10:32:30'),
(3,	'劉宜樺',	'1997-12-28',	'L225161748',	'0927297098',	'臺中市太平區中山路二段91號',	'member03@gmail.com',	NULL,	'$2y$10$4aePlu1fMe77/JnFIoNBZeygxAHEuDnw2MYvFvlJFio.gZqRy9roq',	'xntm2xLlGaBmSNIf7KHoARSqPd2MuDbLaj4xBtM6SSTvgxo9rHtAXoQikbL7',	'2019-06-04 10:34:36',	'2019-06-04 10:34:36'),
(4,	'江珮妤',	'1998-05-02',	'B223192541',	'0970776818',	'台中市南區建成路7號',	'member04@gmail.com',	NULL,	'$2y$10$9Osr6LyAHASVd8JOXEWXNuBBbivTYxxgre5Fge3PiAZjOoPcQLur2',	'mkQQpDY99ppCDZeG1HzNYW7yzVNsofmmpFDyCqvO9W72JPgO601yK9Wt5xjm',	'2019-06-04 10:36:51',	'2019-06-04 10:36:51'),
(5,	'黃清愿',	'1998-08-23',	'B229827364',	'0937495873',	'台中市大里區塗城路365號',	'member05@gmail.com',	NULL,	'$2y$10$NbYthUUOf.qfh/6/gA3nwujcSfyb1acsZrH37BlLoRbhw.e8cjv3e',	'7y0A04ZeKArmlJXrKxP576nJ1jpsL1UoYwDMBDpeZkIvHsIoVYTJBHmYZzx6',	'2019-06-04 10:39:21',	'2019-06-04 10:39:21'),
(6,	'劉凰蓮',	'1998-03-31',	'H227493058',	'0937283748',	'台中市太平區中山路一段240號',	'member06@gmail.com',	NULL,	'$2y$10$8P2TB0FlckuJS0gcuYBKS.WOEvWYqFf7L3Kyl1Bzb83ZRPmCcbrLe',	'UIURDU7MfWDWVIXmeOVMWnwQ9dcphnrpiQX3FrMAyCBTlLMHQB69WyYh15Lk',	'2019-06-04 10:42:01',	'2019-06-04 10:42:01'),
(7,	'宋狄峰',	'1997-11-22',	'B124839284',	'0922837485',	'台中市北區力行路399號',	'member07@gmail.com',	NULL,	'$2y$10$VfKg18ejrjUV71vsUzkOJeeFHtfLpYqXC5jn/gWi/FiIsc..p9BJW',	'H3nO5Rdjt0QDPpUUKXWCkGvMvPWA0dz7JRsElKmV7iOFxgZ8Uohfuz9S3zLp',	'2019-06-04 10:43:49',	'2019-06-04 10:43:49'),
(8,	'林欣',	'1997-09-25',	'B223847593',	'0938475993',	'台中市烏日區中正路494號',	'member08@gmail.com',	NULL,	'$2y$10$/DRqhnAYx.0ML5KwXlYaL.BeHsxJgge259rHiuSIod4q2Xn2Qnloq',	'EwWyn6xPE6DOzvblTRJWVLUwpCW2YghanOQJmz5Gcgfe7Getl66sc3U3PVwu',	'2019-06-04 10:46:16',	'2019-06-04 10:46:16'),
(12,	'萬怡旻',	'1997-10-01',	'B223847564',	'0937283748',	'臺中市太平區中山路二段1號',	'member09@gmail.com',	NULL,	'$2y$10$rsf0pbLxcY3gzFJ4o.lL8uDI5cn3V9clkMhMk6FMvd2KWi1p2Beeu',	NULL,	'2019-06-07 10:30:04',	'2019-06-07 10:30:04'),
(13,	'許名耀',	'1998-05-30',	'B128874567',	'0938458765',	'臺中市豐原區至自治路38號',	'member10@gmail.com',	NULL,	'$2y$10$DfGzgzUq7x6tUKAhs53hAObT2/0skLUKbMvBBL6fqffEgwTjJshNW',	'Oljc0TPcQP7ljkMzcld1487NJT2YZTHRUnSCsZgbOjXvog9fsTzu16N2h2un',	'2019-06-09 13:18:15',	'2019-06-09 13:18:15'),
(14,	'黃宣毓',	'1997-11-20',	'B223840938',	'0937262736',	'台中市大里區大里路394號',	'member11@gmail.com',	NULL,	'$2y$10$S6GEASqjSCRdUT06W52hdOXP3n4j4Z2M/oPx2.UDyImMXpnOu3Qt6',	'3q9efOsafyLEQepDLXOnemy8G0TPPxJe2l1D42bgSDy7S12j9JG3xcyG54Wd',	'2019-06-09 13:21:23',	'2019-06-09 13:21:23'),
(15,	'許名毅',	'1997-12-31',	'Q123948203',	'0938475828',	'臺中市東區明仁路223號',	'member12@gmail.com',	NULL,	'$2y$10$undKqTLFLcUKZQyeDPy42OPNMBkf8vEzqtEyrSX08MVzjmaseS3mS',	'hUEtVuFkIq5h2dASwrJTMG0CwnzXoKo42gTsUNDEk3ZLiaPBzrfP6ADP8Thh',	'2019-06-09 13:23:27',	'2019-06-09 13:23:27'),
(16,	'陳思羽',	'1997-10-22',	'P224839286',	'0939482738',	'台中市太平區太平路39號',	'member13@gmail.com',	NULL,	'$2y$10$KO3t9l2dkh2bvj.9BKeZ6uXyzM60R17IjAAueVLDppiCeg/fv7ywy',	'bstMX5UwAiz4bvBKF0CIOfLXQHTXuVgmOrulV2GOdVnPOjmvOJdVggghOie0',	'2019-06-09 13:25:32',	'2019-06-09 13:25:32'),
(18,	'顏以晴',	'1998-08-30',	'B223748293',	'0938472839',	'台中市北屯區崇德路二段526號',	'member14@gmail.com',	NULL,	'$2y$10$LgAce7bmtjSSwtVQHzQHp.deHgn6yF8E7tTY3YLuZVgcjwUoxN03m',	NULL,	'2019-06-09 13:29:09',	'2019-06-09 13:29:09');

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
(17,	1,	'星期五',	'18:00',	'21:00',	'2019-05-03',	NULL,	NULL,	NULL,	NULL),
(18,	4,	'星期一',	'09:00',	'12:00',	'2019-06-01',	NULL,	NULL,	NULL,	NULL),
(19,	5,	'星期一',	'14:00',	'18:00',	'2019-06-01',	NULL,	NULL,	NULL,	NULL),
(20,	4,	'星期一',	'18:00',	'21:00',	'2019-06-01',	NULL,	NULL,	NULL,	NULL),
(21,	4,	'星期二',	'09:00',	'12:00',	'2019-06-01',	NULL,	NULL,	NULL,	NULL),
(22,	5,	'星期二',	'18:00',	'21:00',	'',	NULL,	NULL,	NULL,	NULL),
(23,	4,	'星期三',	'09:00',	'12:00',	'2019-06-01',	NULL,	NULL,	NULL,	NULL),
(24,	5,	'星期三',	'09:00',	'12:00',	'2019-06-01',	NULL,	NULL,	NULL,	NULL),
(25,	4,	'星期三',	'14:00',	'18:00',	'2019-06-01',	NULL,	NULL,	NULL,	NULL),
(26,	5,	'星期三',	'09:00',	'12:00',	'2019-06-01',	NULL,	NULL,	NULL,	NULL),
(27,	4,	'星期四',	'14:00',	'18:00',	'2019-06-01',	NULL,	NULL,	NULL,	NULL),
(28,	5,	'星期四',	'18:00',	'21:00',	'2019-06-01',	NULL,	NULL,	NULL,	NULL),
(29,	4,	'星期五',	'09:00',	'12:00',	'2019-06-01',	NULL,	NULL,	NULL,	NULL),
(30,	4,	'星期五',	'09:00',	'12:00',	'2019-06-01',	NULL,	NULL,	NULL,	NULL),
(31,	5,	'星期五',	'18:00',	'21:00',	'',	NULL,	NULL,	NULL,	NULL),
(32,	6,	'星期一',	'09:00',	'12:00',	'2019-06-01',	NULL,	NULL,	NULL,	NULL),
(33,	7,	'星期一',	'18:00',	'21:00',	'2019-06-01',	NULL,	NULL,	NULL,	NULL),
(34,	6,	'星期二',	'14:00',	'18:00',	'2019-06-01',	NULL,	NULL,	NULL,	NULL),
(35,	7,	'星期二',	'18:00',	'21:00',	'2019-06-01',	NULL,	NULL,	NULL,	NULL),
(36,	6,	'星期三',	'09:00',	'12:00',	'2019-06-01',	NULL,	NULL,	NULL,	NULL),
(37,	6,	'星期三',	'14:00',	'18:00',	'2019-06-01',	NULL,	NULL,	NULL,	NULL),
(38,	7,	'星期三',	'18:00',	'21:00',	'',	NULL,	NULL,	NULL,	NULL),
(39,	7,	'星期四',	'09:00',	'12:00',	'2019-06-01',	NULL,	NULL,	NULL,	NULL),
(40,	6,	'星期四',	'18:00',	'21:00',	'2019-06-01',	NULL,	NULL,	NULL,	NULL),
(41,	6,	'星期五',	'09:00',	'12:00',	'2019-06-01',	NULL,	NULL,	NULL,	NULL),
(42,	7,	'星期五',	'14:00',	'18:00',	'',	NULL,	NULL,	NULL,	NULL);

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

INSERT INTO `posts` (`id`, `admin_id`, `title`, `content`, `time`, `created_at`, `updated_at`) VALUES
(1,	1,	'系統維修',	'親愛的病患您好，本系統將於6月11日凌晨01:00~04:00進行維修，敬請見諒',	'2019-06-09 00:00:00',	NULL,	NULL);

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
(11,	1,	2,	2,	0,	NULL,	NULL,	'',	NULL,	'2019-06-10 03:47:49'),
(12,	1,	6,	3,	0,	NULL,	NULL,	NULL,	NULL,	'2019-06-09 18:32:10'),
(13,	1,	3,	4,	-1,	NULL,	'2',	NULL,	NULL,	'2019-06-09 18:32:12'),
(15,	1,	7,	5,	0,	NULL,	NULL,	NULL,	'2019-06-07 08:55:01',	'2019-06-07 08:55:01'),
(25,	1,	8,	6,	0,	NULL,	NULL,	NULL,	NULL,	NULL),
(26,	1,	12,	7,	0,	NULL,	NULL,	NULL,	NULL,	NULL),
(27,	40,	13,	3,	-1,	NULL,	NULL,	NULL,	NULL,	NULL),
(28,	40,	14,	4,	0,	NULL,	NULL,	NULL,	NULL,	NULL),
(29,	56,	15,	6,	-1,	NULL,	NULL,	NULL,	NULL,	NULL),
(30,	56,	16,	5,	0,	NULL,	NULL,	NULL,	NULL,	NULL);

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
(1,	1,	1,	'2019-07-09',	'14:00',	'18:00',	1,	8,	NULL,	'2019-06-05 07:37:27'),
(2,	1,	2,	'2019-07-09',	'09:00',	'12:00',	0,	1,	NULL,	'2019-06-04 19:15:02'),
(3,	1,	3,	'2019-07-09',	'09:00',	'12:00',	0,	1,	NULL,	'2019-06-04 19:15:29'),
(4,	1,	3,	'2019-07-10',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(5,	1,	1,	'2019-07-10',	'18:00',	'21:00',	0,	1,	NULL,	'2019-06-10 03:47:49'),
(6,	1,	2,	'2019-07-10',	'14:00',	'18:00',	0,	1,	NULL,	'2019-06-08 23:15:29'),
(7,	1,	3,	'2019-07-10',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(8,	1,	1,	'2019-07-11',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(9,	1,	1,	'2019-07-11',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(10,	1,	2,	'2019-07-11',	'18:00',	'21:00',	0,	1,	NULL,	NULL),
(11,	1,	3,	'2019-07-12',	'18:00',	'21:00',	0,	1,	NULL,	NULL),
(12,	1,	2,	'2019-07-12',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(13,	1,	1,	'2019-07-12',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(14,	1,	1,	'2019-07-12',	'18:00',	'21:00',	0,	1,	NULL,	NULL),
(15,	1,	2,	'2019-07-13',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(16,	1,	1,	'2019-07-13',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(17,	1,	3,	'2019-07-13',	'18:00',	'21:00',	0,	1,	NULL,	NULL),
(18,	1,	2,	'2019-07-14',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(19,	1,	1,	'2019-07-14',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(20,	1,	3,	'2019-07-14',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(21,	1,	2,	'2019-07-15',	'18:00',	'21:00',	0,	1,	NULL,	NULL),
(22,	1,	3,	'2019-07-16',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(23,	1,	2,	'2019-07-17',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(24,	1,	3,	'2019-07-17',	'18:00',	'21:00',	0,	1,	NULL,	NULL),
(25,	1,	1,	'2019-07-18',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(26,	1,	2,	'2019-07-18',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(27,	1,	3,	'2019-07-18',	'18:00',	'21:00',	0,	1,	NULL,	NULL),
(28,	1,	2,	'2019-07-19',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(29,	1,	2,	'2019-07-19',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(30,	1,	2,	'2019-07-20',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(31,	1,	1,	'2019-07-20',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(32,	1,	2,	'2019-07-20',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(33,	1,	1,	'2019-07-20',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(34,	1,	1,	'2019-07-20',	'18:00',	'21:00',	0,	1,	NULL,	NULL),
(35,	1,	2,	'2019-07-21',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(36,	1,	2,	'2019-07-21',	'18:00',	'21:00',	0,	1,	NULL,	NULL),
(37,	1,	1,	'2019-07-23',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(38,	1,	2,	'2019-07-23',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(39,	1,	3,	'2019-07-23',	'18:00',	'21:00',	0,	1,	NULL,	NULL),
(40,	2,	4,	'2019-07-09',	'14:00',	'18:00',	1,	2,	NULL,	NULL),
(41,	2,	5,	'2019-07-09',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(42,	2,	4,	'2019-07-10',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(43,	2,	5,	'2019-07-10',	'18:00',	'21:00',	0,	1,	NULL,	NULL),
(44,	2,	5,	'2019-07-10',	'18:00',	'21:00',	0,	1,	NULL,	NULL),
(45,	2,	4,	'2019-07-11',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(46,	2,	4,	'2019-07-11',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(47,	2,	5,	'2019-07-12',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(48,	2,	4,	'2019-07-12',	'18:00',	'21:00',	0,	1,	NULL,	NULL),
(49,	2,	4,	'2019-07-13',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(50,	2,	5,	'2019-07-14',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(51,	2,	4,	'2019-07-14',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(52,	2,	5,	'2019-07-14',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(53,	2,	4,	'2019-07-15',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(54,	2,	5,	'2019-07-15',	'18:00',	'21:00',	0,	1,	NULL,	NULL),
(55,	2,	4,	'2019-07-16',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(56,	3,	7,	'2019-07-09',	'14:00',	'18:00',	2,	3,	NULL,	NULL),
(57,	3,	6,	'2019-07-09',	'14:00',	'18:00',	3,	4,	NULL,	NULL),
(58,	3,	6,	'2019-07-10',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(59,	3,	7,	'2019-07-10',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(60,	3,	7,	'2019-07-11',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(61,	3,	6,	'2019-07-11',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(62,	3,	6,	'2019-07-11',	'18:00',	'21:00',	0,	1,	NULL,	NULL),
(63,	3,	6,	'2019-07-12',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(64,	3,	7,	'2019-07-12',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(65,	3,	6,	'2019-07-12',	'18:00',	'21:00',	0,	1,	NULL,	NULL),
(66,	3,	6,	'2019-07-13',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(67,	3,	7,	'2019-07-13',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(68,	3,	6,	'2019-07-14',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(69,	3,	7,	'2019-07-14',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(70,	3,	7,	'2019-07-15',	'14:00',	'18:00',	0,	1,	NULL,	NULL),
(71,	3,	7,	'2019-07-15',	'18:00',	'21:00',	0,	1,	NULL,	NULL),
(72,	3,	7,	'2019-07-16',	'09:00',	'12:00',	0,	1,	NULL,	NULL),
(73,	3,	6,	'2019-07-16',	'18:00',	'21:00',	0,	1,	NULL,	NULL);

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
(1,	1,	1,	'林建勳',	'1558718450.jpg',	'staff1@gmail.com',	'$2y$10$S0Ha/1or2byrbCSnsyaKh./SyFv0n9BGhvb4CQW9c8FsqOUnv/kiC',	'VAHWTa3WfiQqF6E2hZ0NrT3oedxvEFMg5LoI3FzZdzl94ApxGyg93wJeF9Jb',	'2019-06-04 11:42:43',	'2019-06-04 11:42:43'),
(2,	1,	4,	'張家偉',	'1559699520.jpg',	'doctor1@gmail.com',	'$2y$10$cAivjckXXNmDac8rJRi9JelgyEuz13y9HKYO/z4q8GVadSAAzjcq2',	'WLYjIE24kxmPC3ZyDWsiODjIX2WM0tTBxmMzgC032qSiO4MIxBMkHF3afUNc',	'2019-06-03 16:00:00',	'2019-06-04 17:52:01'),
(4,	1,	4,	'周承凱',	'1559699604.jpg',	'doctor2@gmail.com',	'$2y$10$NjveqfAU8Fw7gdblQp.a6.kqesy869bgjpWJth03lT0VFMWRxseu2',	'666ZSiR7khC4O3CZHLbtdE6H5HbxTuxKCDgaz0LbFhoPKTWZ60pGEIwnbpZU',	'2019-06-03 16:00:00',	'2019-06-04 17:53:24'),
(5,	1,	4,	'陳智軒',	'1559699648.jpg',	'doctor3@gmail.com',	'$2y$10$knZSWwL9ZPA/fgva2e0CvetE8AtYAr8pc9RtcYbh3pWOUDPtj.IV2',	NULL,	'2019-06-03 16:00:00',	'2019-06-04 17:54:08'),
(6,	3,	1,	'林怡君',	'1560113888.jpg',	'staff2@gmail.com',	'$2y$10$2qxT7/alicMhaCQAD6iU2urLe8wHFrENcIc1MISCyRWFczg6OhOfS',	'2NBrrSpLAPX1eN0Zl6u8CbaaaPoFn7MnvTm4d55rZ1GWxklj8mrICW3W8Kd1',	'2019-06-08 12:16:08',	'2019-06-08 12:16:08'),
(7,	2,	1,	'林康康',	'1560113425.jpg',	'staff3@gmail.com',	'$2y$10$a8DTmSmiYbDS5tXTuj.7TuA0n6Dyxe/7RzKHxoE7OBJ8Slj8bZYvm',	'gZxRcV7p1C4uBsgHsyFzYvVGQnewGDt8LXOWYGZhvKUoZp6r9I04GVLsQjY0',	'2019-06-08 12:23:43',	'2019-06-08 12:23:43'),
(8,	13,	1,	'林慶耀',	NULL,	'staff4@gmail.com',	'$2y$10$cxXDJtzY8bZDmi2Ba1.FxuxfnR8fRw44yhi6mtp6ABhiQg7296pfe',	NULL,	'2019-06-08 12:24:42',	'2019-06-08 12:24:42'),
(9,	14,	1,	'吳興哲',	NULL,	'test@gmail.com',	'$2y$10$IP7JKmvqJW2iU/Rq7kYqwu8gLtAy82QVpcX5KnLpsCGhgFCvnkkM.',	NULL,	'2019-06-08 12:26:18',	'2019-06-08 12:26:18'),
(10,	15,	1,	'李里仁',	NULL,	'staff5@gmail.com',	'$2y$10$7sHQ9KAMp7vFTAFMeQ.ANeqE8aK02zfLWdDrkdNoJhIWgSgVFIihq',	NULL,	'2019-06-08 22:15:05',	'2019-06-08 22:15:05'),
(11,	16,	1,	'吳星河',	NULL,	'staff6@gmail.com',	'$2y$10$fbwWCY0.xB2B8evwY1So/e3WWr.x.SoE2yuTS8NxEu1fUwX/or9Jm',	NULL,	'2019-06-08 22:18:04',	'2019-06-08 22:18:04'),
(12,	2,	4,	'連建偉',	'1560113323.jpg',	'doctor4@gmail.com',	'$2y$10$idQUZHS2Bdy76WVf8ki4hOpKcQMeLhFusg8zb1wJMSKlaKO2poAne',	NULL,	'2019-05-31 16:00:00',	'2019-06-09 12:48:43'),
(13,	2,	4,	'陳曉東',	'1560113425.jpg',	'doctor5@gmail.com',	'$2y$10$LnUstLqls4xHCFLZ/PrdDO0pPHI18L.FxCzs72GTMw7N2eKexuqxm',	NULL,	'2019-05-31 16:00:00',	'2019-06-09 12:50:25'),
(14,	3,	4,	'曾梅成',	'1560113761.jpg',	'doctor6@gmail.com',	'$2y$10$A1Ze/Lxbnckk.XxH7DwKVe88Gg6JqcCT8sfNUplt2jLH.Vq6uHZNS',	NULL,	'2019-05-31 16:00:00',	'2019-06-09 12:56:01'),
(15,	3,	4,	'楊千樺',	'1560113888.jpg',	'doctor7@gmail.com',	'$2y$10$y/VXMJ1bjnPzh1PqRlKCruMueb2k64jfWDTX2cRsrZYgRh2rBkuOy',	NULL,	'2019-06-01 16:00:00',	'2019-06-09 12:58:08');

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


-- 2019-06-10 06:46:21