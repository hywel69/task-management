/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.11.10-MariaDB-ubu2204 : Database - management_task
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `admin_company` */

DROP TABLE IF EXISTS `admin_company`;

CREATE TABLE `admin_company` (
  `adcoAdmnId` int(10) unsigned NOT NULL DEFAULT 0,
  `adcoCompId` mediumint(8) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`adcoAdmnId`,`adcoCompId`),
  KEY `adcoCompId` (`adcoCompId`) USING BTREE,
  CONSTRAINT `admin_company_ibfk_1` FOREIGN KEY (`adcoAdmnId`) REFERENCES `admin_users` (`ausrId`),
  CONSTRAINT `admin_company_ibfk_2` FOREIGN KEY (`adcoCompId`) REFERENCES `company` (`compId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci AVG_ROW_LENGTH=8192 COMMENT='Daftar Akses User Admin ke Company';

/*Data for the table `admin_company` */

insert  into `admin_company`(`adcoAdmnId`,`adcoCompId`) values 
(30,1);

/*Table structure for table `admin_users` */

DROP TABLE IF EXISTS `admin_users`;

CREATE TABLE `admin_users` (
  `ausrId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ausrUsername` varchar(32) NOT NULL,
  `ausrPassword` varchar(64) NOT NULL,
  `ausrName` varchar(100) NOT NULL,
  `ausrActive` tinyint(1) NOT NULL DEFAULT 0,
  `ausrLastLogin` datetime NOT NULL,
  `ausrCreated` datetime NOT NULL,
  `ausrRolhId` int(10) NOT NULL DEFAULT 0,
  `ausrUnit` int(10) NOT NULL DEFAULT 0,
  `ausrFirstLogin` tinyint(4) NOT NULL DEFAULT 0,
  `ausrBannedTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ausrCreateTime` datetime DEFAULT NULL,
  `ausrCreateUser` varchar(100) DEFAULT NULL,
  `ausrUpdateTime` datetime DEFAULT NULL,
  `ausrUpdateUser` varchar(100) DEFAULT NULL,
  `ausrDeleteTime` datetime DEFAULT NULL,
  `ausrDeleteUser` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ausrId`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AVG_ROW_LENGTH=910 COMMENT='Daftar Table User';

/*Data for the table `admin_users` */

insert  into `admin_users`(`ausrId`,`ausrUsername`,`ausrPassword`,`ausrName`,`ausrActive`,`ausrLastLogin`,`ausrCreated`,`ausrRolhId`,`ausrUnit`,`ausrFirstLogin`,`ausrBannedTime`,`ausrCreateTime`,`ausrCreateUser`,`ausrUpdateTime`,`ausrUpdateUser`,`ausrDeleteTime`,`ausrDeleteUser`) values 
(30,'root','$2y$10$29RxwXWqBhWKedetmad27u3//VAC3qOjROviGe6Y1lfYcjflXZipS','SuperUser',0,'2025-10-18 11:55:58','0000-00-00 00:00:00',1,0,0,'0000-00-00 00:00:00',NULL,NULL,'2022-08-24 03:39:36','root',NULL,NULL);

/*Table structure for table `company` */

DROP TABLE IF EXISTS `company`;

CREATE TABLE `company` (
  `compId` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `compKey` varchar(100) NOT NULL,
  `compNick` varchar(10) NOT NULL,
  `compName` varchar(35) NOT NULL,
  `compAddress` varchar(75) NOT NULL,
  `compPostCode` varchar(5) NOT NULL,
  `compCity` varchar(50) NOT NULL,
  `compTelp` varchar(15) NOT NULL,
  `compTelp2` varchar(15) NOT NULL,
  `compFax` varchar(15) NOT NULL,
  `compFax2` varchar(15) NOT NULL,
  `compEmail` varchar(25) NOT NULL,
  `compSkpd` varchar(50) NOT NULL,
  `compNonActiveFlag` tinyint(3) NOT NULL DEFAULT 0 COMMENT '0: Active | 1: Non Active',
  `compStatusAnggaran` tinyint(1) NOT NULL DEFAULT 1,
  `compTA` int(11) DEFAULT NULL COMMENT 'Tahun Anggaran',
  `comWorkingDate` date NOT NULL DEFAULT '0000-00-00',
  `compCreatedTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `compCreatedUserId` int(11) NOT NULL,
  `compUpdatedTime` datetime DEFAULT NULL,
  `compUpdatedUserId` int(11) DEFAULT NULL,
  `compDeletedTime` datetime DEFAULT NULL,
  `compDeletedUserId` int(11) DEFAULT NULL,
  PRIMARY KEY (`compId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci AVG_ROW_LENGTH=16384 COMMENT='Daftar Company';

/*Data for the table `company` */

insert  into `company`(`compId`,`compKey`,`compNick`,`compName`,`compAddress`,`compPostCode`,`compCity`,`compTelp`,`compTelp2`,`compFax`,`compFax2`,`compEmail`,`compSkpd`,`compNonActiveFlag`,`compStatusAnggaran`,`compTA`,`comWorkingDate`,`compCreatedTime`,`compCreatedUserId`,`compUpdatedTime`,`compUpdatedUserId`,`compDeletedTime`,`compDeletedUserId`) values 
(1,'','','','','','','','','','','','',0,0,0,'0000-00-00','0000-00-00 00:00:00',2,'2022-08-30 07:15:00',0,NULL,NULL);

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `menuId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `compId` int(11) NOT NULL,
  `menuNama` varchar(100) NOT NULL,
  `menuRoute` varchar(100) DEFAULT NULL,
  `menuIcon` varchar(100) DEFAULT NULL,
  `menuParent` int(11) DEFAULT NULL,
  `menuOrder` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`menuId`)
) ENGINE=InnoDB AUTO_INCREMENT=216 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

/*Data for the table `menu` */

insert  into `menu`(`menuId`,`compId`,`menuNama`,`menuRoute`,`menuIcon`,`menuParent`,`menuOrder`,`created_at`,`updated_at`) values 
(1,1,'Dashboard','dashboard','icon-display4',NULL,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(2,1,'Setup','','icon-cog3',NULL,2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(3,1,'Company','company','',2,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(4,1,'Menu','menu','',2,2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(5,1,'Role','role','',2,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(6,1,'Role Menu','rolemenu','',2,4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(7,1,'User Super','user','',2,5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(8,1,'User Company','usercomp','',2,6,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(9,1,'Ganti Password','gantipass','',2,7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(10,1,'Master','','icon-database2',NULL,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(13,1,'Pegawai',NULL,'icon-user',NULL,4,NULL,'2025-10-17 13:33:55'),
(14,1,'Task',NULL,'icon-list',NULL,5,'0000-00-00 00:00:00','2025-10-17 14:10:58'),
(15,1,'Data Pegawai','datapegawai',NULL,13,1,NULL,'2025-10-17 13:58:55'),
(212,1,'Master Divisi','divisi',NULL,10,2,'2025-10-17 10:22:00','2025-10-17 13:49:18'),
(213,1,'Master Status','status',NULL,10,3,'2025-10-17 10:22:17','2025-10-17 13:49:24'),
(214,1,'Input Data','datatask',NULL,14,1,'2025-10-17 14:11:53','2025-10-17 16:35:06'),
(215,1,'Laporan Pekerjaan','report-task',NULL,14,2,'2025-10-17 14:12:22','2025-10-17 14:12:22');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

/*Data for the table `migrations` */

/*Table structure for table `mscompany` */

DROP TABLE IF EXISTS `mscompany`;

CREATE TABLE `mscompany` (
  `compId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `compLogo` longtext NOT NULL,
  `compNama` varchar(100) DEFAULT NULL,
  `compPemilik` varchar(100) DEFAULT NULL,
  `compDetail` varchar(100) DEFAULT NULL,
  `compLokasi` varchar(200) DEFAULT NULL,
  `compBpjsId` varchar(255) DEFAULT NULL,
  `compKategori` int(11) DEFAULT NULL,
  `compStatusMng` int(11) DEFAULT NULL,
  `compStatus` int(11) DEFAULT NULL,
  `compCity` varchar(100) DEFAULT NULL,
  `compStatusAnggaran` int(11) DEFAULT 6,
  `compTA` int(11) DEFAULT NULL,
  `compLogoKlien` varchar(100) DEFAULT NULL,
  `compKotaKlien` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`compId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

/*Data for the table `mscompany` */

insert  into `mscompany`(`compId`,`compLogo`,`compNama`,`compPemilik`,`compDetail`,`compLokasi`,`compBpjsId`,`compKategori`,`compStatusMng`,`compStatus`,`compCity`,`compStatusAnggaran`,`compTA`,`compLogoKlien`,`compKotaKlien`,`created_at`,`updated_at`) values 
(1,'data:image/png;base64, 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','Logi','Logi','Task Management','Semarang',NULL,NULL,NULL,1,'Semarang',1,2025,'logo.png','Semarang',NULL,'2023-01-09 16:01:44');

/*Table structure for table `msdivisi` */

DROP TABLE IF EXISTS `msdivisi`;

CREATE TABLE `msdivisi` (
  `divisiId` int(11) NOT NULL AUTO_INCREMENT,
  `divisiNm` varchar(255) DEFAULT NULL,
  `compId` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`divisiId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `msdivisi` */

insert  into `msdivisi`(`divisiId`,`divisiNm`,`compId`,`created_at`,`updated_at`) values 
(1,'Frontend',1,'2025-10-17 13:50:02','2025-10-17 13:50:02'),
(2,'Backend',1,'2025-10-17 13:50:10','2025-10-17 13:50:10'),
(3,'QA',1,'2025-10-17 13:50:19','2025-10-17 13:50:19'),
(4,'Design',1,'2025-10-17 13:50:24','2025-10-17 13:50:24'),
(5,'DevOps',1,'2025-10-17 13:50:33','2025-10-17 13:50:33');

/*Table structure for table `mspegawai` */

DROP TABLE IF EXISTS `mspegawai`;

CREATE TABLE `mspegawai` (
  `pegawaiId` int(11) NOT NULL AUTO_INCREMENT,
  `pegawaiNip` varchar(255) DEFAULT NULL,
  `pegawaiNm` text DEFAULT NULL,
  `pegawaiDivisiId` int(11) DEFAULT NULL,
  `compId` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`pegawaiId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `mspegawai` */

/*Table structure for table `msstatus` */

DROP TABLE IF EXISTS `msstatus`;

CREATE TABLE `msstatus` (
  `statusId` int(11) NOT NULL AUTO_INCREMENT,
  `statusNm` varchar(255) DEFAULT NULL,
  `compId` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`statusId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `msstatus` */

insert  into `msstatus`(`statusId`,`statusNm`,`compId`,`created_at`,`updated_at`) values 
(1,'To Do',1,'2025-10-18 11:58:00','2025-10-18 11:58:00'),
(2,'In Progress',1,'2025-10-18 11:58:08','2025-10-18 11:58:08'),
(3,'Done',1,'2025-10-18 11:58:13','2025-10-18 11:58:13');

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1514 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

/*Data for the table `personal_access_tokens` */

insert  into `personal_access_tokens`(`id`,`tokenable_type`,`tokenable_id`,`name`,`token`,`abilities`,`last_used_at`,`created_at`,`updated_at`) values 
(687,'App\\Models\\User',3,'auth_token','6c248ec9b0951735dc4f052ea6767ab9a47c4616573a111ca1fc7b15f0c6eb4d','[\"*\"]',NULL,'2023-03-24 22:08:21','2023-03-24 22:08:21'),
(688,'App\\Models\\User',3,'auth_token','6193f9738e144ce4c8115424a24fe304719861f70ab48bdd4ccb472e73284592','[\"*\"]',NULL,'2023-03-24 22:11:19','2023-03-24 22:11:19'),
(689,'App\\Models\\User',3,'auth_token','176497c11c0a5bf8ba24ef8f49e9f444c0201d9dce6cf4194c29f6aaa9062cf8','[\"*\"]',NULL,'2023-03-24 22:13:41','2023-03-24 22:13:41'),
(691,'App\\Models\\User',3,'auth_token','2f865f3e66a10639d3f7b45fd391a9617a7832420795d45f0f5de707a0bf6a80','[\"*\"]',NULL,'2023-03-24 22:43:27','2023-03-24 22:43:27'),
(696,'App\\Models\\User',3,'auth_token','4b75d201b3620374202371fb3a6ec229620d29c27b76411a9497d595e026ebb6','[\"*\"]',NULL,'2023-03-31 20:44:01','2023-03-31 20:44:01'),
(697,'App\\Models\\User',3,'auth_token','2411afd95fb3949081525ee0f0a4ad3c2d661668124574c1c0198c1f74a929be','[\"*\"]',NULL,'2023-04-03 16:36:26','2023-04-03 16:36:26'),
(705,'App\\Models\\User',3,'auth_token','c92e788ee5b1a35899499356ca53f3e2bbd1f8ea1e0a6d3cacb8d77628d9daba','[\"*\"]',NULL,'2023-04-13 17:33:19','2023-04-13 17:33:19'),
(1510,'App\\Models\\User',5,'auth_token','d015547e16397c29b7a42801f7dd89b690c3112936f7fd9119dad5bd36f81424','[\"*\"]',NULL,'2025-10-17 16:56:35','2025-10-17 16:56:35');

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `roleId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `compId` int(11) NOT NULL,
  `roleNama` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

/*Data for the table `role` */

insert  into `role`(`roleId`,`compId`,`roleNama`,`created_at`,`updated_at`) values 
(1,1,'Administrator Utama',NULL,NULL),
(2,1,'Pegawai','2023-03-24 22:07:40','2023-03-24 22:07:40');

/*Table structure for table `role_menu` */

DROP TABLE IF EXISTS `role_menu`;

CREATE TABLE `role_menu` (
  `rmId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `compId` int(11) NOT NULL,
  `rmRoleId` int(11) NOT NULL,
  `rmMenuId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`rmId`)
) ENGINE=InnoDB AUTO_INCREMENT=7440 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

/*Data for the table `role_menu` */

insert  into `role_menu`(`rmId`,`compId`,`rmRoleId`,`rmMenuId`,`created_at`,`updated_at`) values 
(7419,1,1,2,'2025-10-17 16:51:25','2025-10-17 16:51:25'),
(7420,1,1,3,'2025-10-17 16:51:25','2025-10-17 16:51:25'),
(7421,1,1,4,'2025-10-17 16:51:25','2025-10-17 16:51:25'),
(7422,1,1,5,'2025-10-17 16:51:25','2025-10-17 16:51:25'),
(7423,1,1,6,'2025-10-17 16:51:25','2025-10-17 16:51:25'),
(7424,1,1,7,'2025-10-17 16:51:25','2025-10-17 16:51:25'),
(7425,1,1,8,'2025-10-17 16:51:25','2025-10-17 16:51:25'),
(7426,1,1,9,'2025-10-17 16:51:25','2025-10-17 16:51:25'),
(7427,1,1,10,'2025-10-17 16:51:25','2025-10-17 16:51:25'),
(7428,1,1,13,'2025-10-17 16:51:25','2025-10-17 16:51:25'),
(7429,1,1,14,'2025-10-17 16:51:25','2025-10-17 16:51:25'),
(7430,1,1,15,'2025-10-17 16:51:25','2025-10-17 16:51:25'),
(7431,1,1,212,'2025-10-17 16:51:25','2025-10-17 16:51:25'),
(7432,1,1,213,'2025-10-17 16:51:25','2025-10-17 16:51:25'),
(7433,1,1,214,'2025-10-17 16:51:25','2025-10-17 16:51:25'),
(7434,1,1,215,'2025-10-17 16:51:25','2025-10-17 16:51:25'),
(7435,1,2,2,'2025-10-19 20:52:38','2025-10-19 20:52:38'),
(7436,1,2,9,'2025-10-19 20:52:38','2025-10-19 20:52:38'),
(7437,1,2,14,'2025-10-19 20:52:38','2025-10-19 20:52:38'),
(7438,1,2,214,'2025-10-19 20:52:38','2025-10-19 20:52:38'),
(7439,1,2,215,'2025-10-19 20:52:38','2025-10-19 20:52:38');

/*Table structure for table `syslog` */

DROP TABLE IF EXISTS `syslog`;

CREATE TABLE `syslog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `compId` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `tabel` varchar(255) NOT NULL,
  `query` varchar(255) NOT NULL,
  `detail` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

/*Data for the table `syslog` */

/*Table structure for table `task` */

DROP TABLE IF EXISTS `task`;

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `deadline` datetime DEFAULT NULL,
  `compId` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `task` */

insert  into `task`(`task_id`,`user_id`,`title`,`description`,`status`,`deadline`,`compId`,`created_at`,`updated_at`) values 
(1,5,'Pengembangan SIMRS','Penyesuaian pada antarmuka anjungan pasien beserta sistem antrian',2,'2025-10-24 16:59:39',1,'2025-10-17 08:01:01',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `compId` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`username`,`email`,`email_verified_at`,`password`,`remember_token`,`compId`,`role`,`created_at`,`updated_at`) values 
(1,'admin','admin','admin@gmail.com','2022-07-22 02:31:16','$2y$10$iP1ApzmAeLI5SP/zAV8eR.Xlv0gjCfSL0Vr0IDXx3xyF6clGeF21m','',1,1,NULL,'2022-12-15 00:36:52'),
(5,'Azizul Purnama R','izulramadhan','izul@gmail.com',NULL,'$2y$10$EI.HmkWtP4esoARz1toR9.mtMEqDynIw6o25ehKJBE9v/PiZ/1fqC',NULL,1,1,'2025-10-17 16:56:35','2025-10-17 16:56:35');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
