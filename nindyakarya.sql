/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : nindyakarya

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 22/09/2022 10:52:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (8, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (9, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (10, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (11, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (12, '2022_09_22_025003_ref_pegawai', 1);
INSERT INTO `migrations` VALUES (13, '2022_09_22_025144_ref_jabatan', 1);
INSERT INTO `migrations` VALUES (14, '2022_09_22_025159_ref_unit_kerja', 1);
INSERT INTO `migrations` VALUES (15, '2022_09_22_025218_trans_cuti_pegawai', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp(0) NULL DEFAULT NULL,
  `expires_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ref_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `ref_jabatan`;
CREATE TABLE `ref_jabatan`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_unit_kerja` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ref_jabatan
-- ----------------------------
INSERT INTO `ref_jabatan` VALUES (1, 'STAF PENGEMBANGAN APLIKASI', 1, '2022-09-22 10:21:59', '2022-09-22 10:22:02');
INSERT INTO `ref_jabatan` VALUES (2, 'ANALIS APLIKASI ', 1, '2022-09-22 10:22:56', '2022-09-22 10:22:59');
INSERT INTO `ref_jabatan` VALUES (3, 'STAF PEMASARAN', 1, '2022-09-22 10:23:14', '2022-09-22 10:23:18');
INSERT INTO `ref_jabatan` VALUES (4, 'STAF AKUTANSI DAN PAJAK', 3, '2022-09-22 10:23:30', '2022-09-22 10:23:33');
INSERT INTO `ref_jabatan` VALUES (5, 'DATA ANALIS', 2, '2022-09-22 10:23:48', '2022-09-22 10:23:51');

-- ----------------------------
-- Table structure for ref_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `ref_pegawai`;
CREATE TABLE `ref_pegawai`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `jenis_kelamin` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ref_pegawai
-- ----------------------------
INSERT INTO `ref_pegawai` VALUES (1, 'NK001', 'Andi', 'andi@nk.com', 'Bekasi', 3, 1, '2022-09-22 10:17:28', '2022-09-22 10:17:31');
INSERT INTO `ref_pegawai` VALUES (2, 'NK002', 'amar', 'amar@nk.com', 'Jakarta', 1, 2, '2022-09-22 10:18:08', '2022-09-22 10:18:11');
INSERT INTO `ref_pegawai` VALUES (3, 'NK003', 'Fauzi', 'fauzi@nk.com', 'Bandung', 1, 1, '2022-09-22 10:18:45', '2022-09-22 10:18:49');
INSERT INTO `ref_pegawai` VALUES (4, 'NK004', 'Bambang', 'bambang@nk.com', '-', 0, 0, '2022-09-22 10:20:00', '2022-09-22 10:20:02');
INSERT INTO `ref_pegawai` VALUES (5, 'NK005', 'bella', 'bella@nindya.com', 'palembang', 2, 2, '2022-09-22 10:20:52', '2022-09-22 10:20:56');
INSERT INTO `ref_pegawai` VALUES (6, 'NK006', 'Desta', 'desta@nk.com', 'Bcimahi', 1, 1, '2022-09-22 10:21:22', '2022-09-22 10:21:26');

-- ----------------------------
-- Table structure for ref_unit_kerja
-- ----------------------------
DROP TABLE IF EXISTS `ref_unit_kerja`;
CREATE TABLE `ref_unit_kerja`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for trans_cuti_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `trans_cuti_pegawai`;
CREATE TABLE `trans_cuti_pegawai`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_awal_cuti` date NOT NULL,
  `tgl_akhir cuti` date NOT NULL,
  `perihal_cuti` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
