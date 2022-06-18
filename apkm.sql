-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 18, 2022 at 02:49 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_dummies`
--

CREATE TABLE `data_dummies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lulus` int(11) DEFAULT NULL,
  `tidak_lulus` int(11) DEFAULT NULL,
  `observers` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_dummies`
--

INSERT INTO `data_dummies` (`id`, `lulus`, `tidak_lulus`, `observers`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 23, 34, 3, '2022-06-13 18:21:18', '2022-06-17 11:17:47', NULL),
(2, 25, 11, 6, '2022-06-14 18:21:26', '2022-06-17 11:18:00', NULL),
(3, 56, 42, 15, '2022-06-15 18:21:30', '2022-06-17 11:18:11', NULL),
(4, 103, 21, 12, '2022-06-16 18:21:34', '2022-06-17 11:18:46', NULL),
(5, 12, 23, 45, '2022-06-17 18:21:37', '2022-06-17 11:19:01', NULL),
(6, 113, 23, 14, '2022-06-17 18:21:41', '2022-06-17 11:19:19', NULL),
(7, 45, 15, 17, '2022-06-04 11:19:31', '2022-06-17 11:19:31', NULL),
(8, 25, 11, 6, '2022-06-14 18:21:26', '2022-06-17 11:18:00', NULL),
(9, 103, 21, 12, '2022-06-16 18:21:34', '2022-06-17 11:18:46', NULL),
(10, 113, 23, 14, '2022-06-17 18:21:41', '2022-06-17 11:19:19', NULL),
(11, 23, 34, 3, '2022-06-13 18:21:18', '2022-06-17 11:17:47', NULL),
(12, 25, 11, 6, '2022-06-14 18:21:26', '2022-06-17 11:18:00', NULL),
(13, 56, 42, 15, '2022-06-15 18:21:30', '2022-06-17 11:18:11', NULL),
(14, 103, 21, 12, '2022-06-16 18:21:34', '2022-06-17 11:18:46', NULL),
(15, 12, 23, 45, '2022-06-17 18:21:37', '2022-06-17 11:19:01', NULL),
(16, 113, 23, 14, '2022-06-17 18:21:41', '2022-06-17 11:19:19', NULL),
(17, 45, 15, 17, '2022-06-04 11:19:31', '2022-06-17 11:19:31', NULL),
(18, 25, 11, 6, '2022-06-14 18:21:26', '2022-06-17 11:18:00', NULL),
(19, 103, 21, 12, '2022-06-16 18:21:34', '2022-06-17 11:18:46', NULL),
(20, 113, 23, 14, '2022-06-17 18:21:41', '2022-06-17 11:19:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_mahasiswas`
--

CREATE TABLE `data_mahasiswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batas_nilai` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_mahasiswas`
--

INSERT INTO `data_mahasiswas` (`id`, `nama`, `batas_nilai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'qwerty', 60, '2022-06-16 08:13:06', '2022-06-16 08:43:05', NULL),
(2, '2', 50, '2022-06-16 08:30:05', '2022-06-16 08:42:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dosens`
--

CREATE TABLE `dosens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosens`
--

INSERT INTO `dosens` (`id`, `id_dosen`, `nama_dosen`, `title`, `email`, `no_hp`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1112, 'Bang Umar', 'S3', 'bangumar@gmail.com', '0812311231231', '2022-06-16 02:49:03', '2022-06-16 02:49:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dosen_jurusan`
--

CREATE TABLE `dosen_jurusan` (
  `dosen_id` bigint(20) UNSIGNED NOT NULL,
  `jurusan_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen_jurusan`
--

INSERT INTO `dosen_jurusan` (`dosen_id`, `jurusan_id`) VALUES
(1, 1),
(1, 3),
(1, 2),
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `jurusans`
--

CREATE TABLE `jurusans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusans`
--

INSERT INTO `jurusans` (`id`, `id_jurusan`, `nama_jurusan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '09876', 'Informatika', '2022-06-16 02:45:53', '2022-06-16 02:45:53', NULL),
(2, '09877', 'Seni Rupa', '2022-06-16 02:46:07', '2022-06-16 02:46:17', NULL),
(3, '0988', 'Matematika Murni', '2022-06-16 02:46:30', '2022-06-16 02:46:30', NULL),
(4, '0989', 'Sistem Infomasi', '2022-06-16 02:46:45', '2022-06-16 02:46:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `jurusan_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswas`
--

INSERT INTO `mahasiswas` (`id`, `id_mahasiswa`, `nama`, `angkatan`, `email`, `no_hp`, `created_at`, `updated_at`, `deleted_at`, `jurusan_id`) VALUES
(1, 1234, 'Fafa', 2017, 'fail.amir@students.amikom.ac.id', '083148263597', '2022-06-16 02:47:10', '2022-06-16 02:47:10', NULL, 1),
(2, 1235, 'Erik \r\nSudirjo', 2012, 'smartbroadcast.io@gmail.com', '083456765412', '2022-06-16 02:47:43', '2022-06-16 02:47:43', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliahs`
--

CREATE TABLE `mata_kuliahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_mtk` int(11) NOT NULL,
  `nama_mtk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_sks` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `jurusan_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mata_kuliahs`
--

INSERT INTO `mata_kuliahs` (`id`, `id_mtk`, `nama_mtk`, `jumlah_sks`, `created_at`, `updated_at`, `deleted_at`, `jurusan_id`) VALUES
(1, 5678, 'RPL', 12, '2022-06-16 02:47:59', '2022-06-16 02:47:59', NULL, 1),
(2, 5679, 'Flow Chart', 8, '2022-06-16 02:48:38', '2022-06-16 02:48:38', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\DataMahasiswa', 1, '62cf10f3-8828-4bc7-b42c-65ad3b0d1158', 'data_mahasiswa_data_mahasiswa', 'Contoh Data ICE On Going', 'Contoh-Data-ICE-On-Going.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 8831, '[]', '[]', '[]', '[]', 1, '2022-06-16 08:13:03', '2022-06-16 08:13:06'),
(2, 'App\\Models\\DataMahasiswa', 2, 'fd86d670-5517-492a-ba45-b035148b9db8', 'data_mahasiswa_data_mahasiswa', 'Data LMS + Nilai - ICEI Rev 21.03.2021 (1)', 'Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 396687, '[]', '[]', '[]', '[]', 1, '2022-06-16 08:30:04', '2022-06-16 08:30:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_06_17_000001_create_media_table', 1),
(4, '2022_06_17_000002_create_permissions_table', 1),
(5, '2022_06_17_000003_create_roles_table', 1),
(6, '2022_06_17_000004_create_users_table', 1),
(7, '2022_06_17_000005_create_mahasiswas_table', 1),
(8, '2022_06_17_000006_create_mata_kuliahs_table', 1),
(9, '2022_06_17_000007_create_jurusans_table', 1),
(10, '2022_06_17_000008_create_dosens_table', 1),
(11, '2022_06_17_000009_create_data_mahasiswas_table', 1),
(12, '2022_06_17_000010_create_data_dummies_table', 1),
(13, '2022_06_17_000011_create_permission_role_pivot_table', 1),
(14, '2022_06_17_000012_create_role_user_pivot_table', 1),
(15, '2022_06_17_000013_create_dosen_jurusan_pivot_table', 1),
(16, '2022_06_17_000014_add_relationship_fields_to_mahasiswas_table', 1),
(17, '2022_06_17_000015_add_relationship_fields_to_mata_kuliahs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', NULL, NULL, NULL),
(2, 'permission_create', NULL, NULL, NULL),
(3, 'permission_edit', NULL, NULL, NULL),
(4, 'permission_show', NULL, NULL, NULL),
(5, 'permission_delete', NULL, NULL, NULL),
(6, 'permission_access', NULL, NULL, NULL),
(7, 'role_create', NULL, NULL, NULL),
(8, 'role_edit', NULL, NULL, NULL),
(9, 'role_show', NULL, NULL, NULL),
(10, 'role_delete', NULL, NULL, NULL),
(11, 'role_access', NULL, NULL, NULL),
(12, 'user_create', NULL, NULL, NULL),
(13, 'user_edit', NULL, NULL, NULL),
(14, 'user_show', NULL, NULL, NULL),
(15, 'user_delete', NULL, NULL, NULL),
(16, 'user_access', NULL, NULL, NULL),
(17, 'mahasiswa_create', NULL, NULL, NULL),
(18, 'mahasiswa_edit', NULL, NULL, NULL),
(19, 'mahasiswa_show', NULL, NULL, NULL),
(20, 'mahasiswa_delete', NULL, NULL, NULL),
(21, 'mahasiswa_access', NULL, NULL, NULL),
(22, 'mata_kuliah_create', NULL, NULL, NULL),
(23, 'mata_kuliah_edit', NULL, NULL, NULL),
(24, 'mata_kuliah_show', NULL, NULL, NULL),
(25, 'mata_kuliah_delete', NULL, NULL, NULL),
(26, 'mata_kuliah_access', NULL, NULL, NULL),
(27, 'jurusan_create', NULL, NULL, NULL),
(28, 'jurusan_edit', NULL, NULL, NULL),
(29, 'jurusan_show', NULL, NULL, NULL),
(30, 'jurusan_delete', NULL, NULL, NULL),
(31, 'jurusan_access', NULL, NULL, NULL),
(32, 'dosen_create', NULL, NULL, NULL),
(33, 'dosen_edit', NULL, NULL, NULL),
(34, 'dosen_show', NULL, NULL, NULL),
(35, 'dosen_delete', NULL, NULL, NULL),
(36, 'dosen_access', NULL, NULL, NULL),
(37, 'upload_data_mahasiswa_on_going_create', NULL, NULL, NULL),
(38, 'upload_data_mahasiswa_on_going_edit', NULL, NULL, NULL),
(39, 'upload_data_mahasiswa_on_going_show', NULL, NULL, NULL),
(40, 'upload_data_mahasiswa_on_going_delete', NULL, NULL, NULL),
(41, 'upload_data_mahasiswa_on_going_access', NULL, NULL, NULL),
(42, 'report_access', NULL, NULL, NULL),
(43, 'data_mahasiswa_history_create', NULL, NULL, NULL),
(44, 'data_mahasiswa_history_edit', NULL, NULL, NULL),
(45, 'data_mahasiswa_history_show', NULL, NULL, NULL),
(46, 'data_mahasiswa_history_delete', NULL, NULL, NULL),
(47, 'data_mahasiswa_history_access', NULL, NULL, NULL),
(48, 'data_mahasiswa_on_going_create', NULL, NULL, NULL),
(49, 'data_mahasiswa_on_going_edit', NULL, NULL, NULL),
(50, 'data_mahasiswa_on_going_show', NULL, NULL, NULL),
(51, 'data_mahasiswa_on_going_delete', NULL, NULL, NULL),
(52, 'data_mahasiswa_on_going_access', NULL, NULL, NULL),
(53, 'upload_data_mahasiswa_history_create', NULL, NULL, NULL),
(54, 'upload_data_mahasiswa_history_edit', NULL, NULL, NULL),
(55, 'upload_data_mahasiswa_history_show', NULL, NULL, NULL),
(56, 'upload_data_mahasiswa_history_delete', NULL, NULL, NULL),
(57, 'upload_data_mahasiswa_history_access', NULL, NULL, NULL),
(58, 'tentang_aplikasi_create', NULL, NULL, NULL),
(59, 'tentang_aplikasi_edit', NULL, NULL, NULL),
(60, 'tentang_aplikasi_show', NULL, NULL, NULL),
(61, 'tentang_aplikasi_delete', NULL, NULL, NULL),
(62, 'tentang_aplikasi_access', NULL, NULL, NULL),
(63, 'data_mahasiswa_create', NULL, NULL, NULL),
(64, 'data_mahasiswa_edit', NULL, NULL, NULL),
(65, 'data_mahasiswa_show', NULL, NULL, NULL),
(66, 'data_mahasiswa_delete', NULL, NULL, NULL),
(67, 'data_mahasiswa_access', NULL, NULL, NULL),
(68, 'data_dummy_create', NULL, NULL, NULL),
(69, 'data_dummy_edit', NULL, NULL, NULL),
(70, 'data_dummy_show', NULL, NULL, NULL),
(71, 'data_dummy_delete', NULL, NULL, NULL),
(72, 'data_dummy_access', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(2, 49),
(2, 50),
(2, 51),
(2, 52),
(2, 53),
(2, 54),
(2, 55),
(2, 56),
(2, 57),
(2, 58),
(2, 59),
(2, 60),
(2, 61),
(2, 62),
(2, 63),
(2, 64),
(2, 65),
(2, 66),
(2, 67),
(2, 68),
(2, 69),
(2, 70),
(2, 71),
(2, 72);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, NULL, NULL),
(2, 'User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$jJPN9HaAWoC54kyqLyhGfuNq8DOKwIb/y.asQKlAmL84J4/6LYaUe', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_dummies`
--
ALTER TABLE `data_dummies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_mahasiswas`
--
ALTER TABLE `data_mahasiswas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosens`
--
ALTER TABLE `dosens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dosens_id_dosen_unique` (`id_dosen`);

--
-- Indexes for table `dosen_jurusan`
--
ALTER TABLE `dosen_jurusan`
  ADD KEY `dosen_id_fk_6788624` (`dosen_id`),
  ADD KEY `jurusan_id_fk_6788624` (`jurusan_id`);

--
-- Indexes for table `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jurusans_id_jurusan_unique` (`id_jurusan`);

--
-- Indexes for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mahasiswas_id_mahasiswa_unique` (`id_mahasiswa`),
  ADD KEY `jurusan_fk_6788710` (`jurusan_id`);

--
-- Indexes for table `mata_kuliahs`
--
ALTER TABLE `mata_kuliahs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mata_kuliahs_id_mtk_unique` (`id_mtk`),
  ADD KEY `jurusan_fk_6788712` (`jurusan_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `role_id_fk_6788561` (`role_id`),
  ADD KEY `permission_id_fk_6788561` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `user_id_fk_6788570` (`user_id`),
  ADD KEY `role_id_fk_6788570` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_dummies`
--
ALTER TABLE `data_dummies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `data_mahasiswas`
--
ALTER TABLE `data_mahasiswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dosens`
--
ALTER TABLE `dosens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mata_kuliahs`
--
ALTER TABLE `mata_kuliahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen_jurusan`
--
ALTER TABLE `dosen_jurusan`
  ADD CONSTRAINT `dosen_id_fk_6788624` FOREIGN KEY (`dosen_id`) REFERENCES `dosens` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jurusan_id_fk_6788624` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD CONSTRAINT `jurusan_fk_6788710` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusans` (`id`);

--
-- Constraints for table `mata_kuliahs`
--
ALTER TABLE `mata_kuliahs`
  ADD CONSTRAINT `jurusan_fk_6788712` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusans` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_id_fk_6788561` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_id_fk_6788561` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_id_fk_6788570` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_6788570` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
