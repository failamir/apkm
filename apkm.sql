-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 20, 2022 at 09:21 AM
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
-- Table structure for table `data_mahasiswas`
--

CREATE TABLE `data_mahasiswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batas_nilai` int(11) DEFAULT NULL,
  `lulus` int(11) DEFAULT NULL,
  `tidaklulus` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `observers` int(11) DEFAULT NULL,
  `accuracy` double(15,2) DEFAULT NULL,
  `recall_lulus` double(15,2) DEFAULT NULL,
  `recall_tidak_lulus` double(15,2) DEFAULT NULL,
  `precision_tidak_lulus` double(15,2) DEFAULT NULL,
  `precision_lulus` double(15,2) DEFAULT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_mahasiswas`
--

INSERT INTO `data_mahasiswas` (`id`, `nama`, `batas_nilai`, `lulus`, `tidaklulus`, `active`, `observers`, `accuracy`, `recall_lulus`, `recall_tidak_lulus`, `precision_tidak_lulus`, `precision_lulus`, `location`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'tes 1', 50, 10, 2, 62, 16, 0.90, 1.00, 0.50, 0.80, 0.89, '', '2022-06-19 15:28:35', '2022-06-19 15:28:46', NULL),
(2, 'tes 2', 40, 10, 2, 62, 16, 0.93, 1.00, 0.63, 0.80, 0.92, '', '2022-06-19 15:38:09', '2022-06-19 15:38:17', NULL),
(3, 'tes local', 40, 10, NULL, 62, 16, 0.93, 1.00, 0.63, 0.80, 0.92, '/Users/macbook/GitHub/apkm/public/storage/4/Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', '2022-06-20 02:05:15', '2022-06-20 02:05:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_mahasiswa_on_goings`
--

CREATE TABLE `data_mahasiswa_on_goings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hasil_prediksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lulus` int(11) DEFAULT NULL,
  `tidak_lulus` int(11) DEFAULT NULL,
  `prediksi_tidak_lulus` int(11) NOT NULL,
  `active` int(11) DEFAULT NULL,
  `observers` int(11) DEFAULT NULL,
  `accuracy` double(15,2) DEFAULT NULL,
  `recall_lulus` double(15,2) DEFAULT NULL,
  `recall_tidak_lulus` double(15,2) DEFAULT NULL,
  `precision_tidak_lulus` double(15,2) DEFAULT NULL,
  `precision_lulus` double(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `data_history_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_mahasiswa_on_goings`
--

INSERT INTO `data_mahasiswa_on_goings` (`id`, `nama`, `hasil_prediksi`, `lulus`, `tidak_lulus`, `prediksi_tidak_lulus`, `active`, `observers`, `accuracy`, `recall_lulus`, `recall_tidak_lulus`, `precision_tidak_lulus`, `precision_lulus`, `created_at`, `updated_at`, `deleted_at`, `data_history_id`) VALUES
(1, 'tes1', '19062022101652HasilPrediksi.xlsx', 10, 2, 0, 62, 16, 0.90, 1.00, 0.50, 0.80, 0.89, '2022-06-19 15:52:16', '2022-06-19 15:52:27', NULL, 1),
(2, 'tes ongoing local', '20062022090407HasilPrediksi.xlsx', 6, 1, 2, 7, 2, 0.93, 1.00, 0.63, 0.80, 0.92, '2022-06-20 02:07:04', '2022-06-20 02:07:14', NULL, 3);

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

-- --------------------------------------------------------

--
-- Table structure for table `dosen_jurusan`
--

CREATE TABLE `dosen_jurusan` (
  `dosen_id` bigint(20) UNSIGNED NOT NULL,
  `jurusan_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'App\\Models\\DataMahasiswa', 1, '142f3c62-3d0f-4ed9-a8fb-4e367f4be4b4', 'data_mahasiswa_data_mahasiswa', 'Data LMS + Nilai - ICEI Rev 21.03.2021 (1)', 'Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 396687, '[]', '[]', '[]', '[]', 1, '2022-06-19 15:28:24', '2022-06-19 15:28:35'),
(2, 'App\\Models\\DataMahasiswa', 2, 'de17b4bd-2c31-4d35-8005-f6e248af72e1', 'data_mahasiswa_data_mahasiswa', 'Data LMS + Nilai - ICEI Rev 21.03.2021 (1)', 'Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 396687, '[]', '[]', '[]', '[]', 1, '2022-06-19 15:37:55', '2022-06-19 15:38:09'),
(3, 'App\\Models\\DataMahasiswaOnGoing', 1, '550ad8ef-0318-42ea-8e5c-1098fead4448', 'data_mahasiswa_on_going_data_mahasiswa', 'Contoh Data ICE On Going', 'Contoh-Data-ICE-On-Going.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 8831, '[]', '[]', '[]', '[]', 1, '2022-06-19 15:51:48', '2022-06-19 15:52:16'),
(4, 'App\\Models\\DataMahasiswa', 3, 'e4651a93-a7f0-4387-94ce-c208de08ee8f', 'data_mahasiswa_data_mahasiswa', 'Data LMS + Nilai - ICEI Rev 21.03.2021 (1)', 'Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 396687, '[]', '[]', '[]', '[]', 1, '2022-06-20 02:05:12', '2022-06-20 02:05:15'),
(5, 'App\\Models\\DataMahasiswaOnGoing', 2, 'c1804624-1bc0-4ed2-b675-bbcdef60d90a', 'data_mahasiswa_on_going_data_mahasiswa', 'Contoh Data ICE On Going', 'Contoh-Data-ICE-On-Going.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 8831, '[]', '[]', '[]', '[]', 1, '2022-06-20 02:05:45', '2022-06-20 02:07:04');

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
(3, '2022_06_19_000001_create_media_table', 1),
(4, '2022_06_19_000002_create_permissions_table', 1),
(5, '2022_06_19_000003_create_roles_table', 1),
(6, '2022_06_19_000004_create_users_table', 1),
(7, '2022_06_19_000005_create_mahasiswas_table', 1),
(8, '2022_06_19_000006_create_mata_kuliahs_table', 1),
(9, '2022_06_19_000007_create_jurusans_table', 1),
(10, '2022_06_19_000008_create_dosens_table', 1),
(11, '2022_06_19_000009_create_data_mahasiswas_table', 1),
(12, '2022_06_19_000010_create_data_mahasiswa_on_goings_table', 1),
(13, '2022_06_19_000011_create_permission_role_pivot_table', 1),
(14, '2022_06_19_000012_create_role_user_pivot_table', 1),
(15, '2022_06_19_000013_create_dosen_jurusan_pivot_table', 1),
(16, '2022_06_19_000014_add_relationship_fields_to_mahasiswas_table', 1),
(17, '2022_06_19_000015_add_relationship_fields_to_mata_kuliahs_table', 1),
(18, '2022_06_19_000016_add_relationship_fields_to_data_mahasiswa_on_goings_table', 1);

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
(37, 'report_access', NULL, NULL, NULL),
(38, 'data_mahasiswa_history_create', NULL, NULL, NULL),
(39, 'data_mahasiswa_history_edit', NULL, NULL, NULL),
(40, 'data_mahasiswa_history_show', NULL, NULL, NULL),
(41, 'data_mahasiswa_history_delete', NULL, NULL, NULL),
(42, 'data_mahasiswa_history_access', NULL, NULL, NULL),
(43, 'tentang_aplikasi_create', NULL, NULL, NULL),
(44, 'tentang_aplikasi_edit', NULL, NULL, NULL),
(45, 'tentang_aplikasi_show', NULL, NULL, NULL),
(46, 'tentang_aplikasi_delete', NULL, NULL, NULL),
(47, 'tentang_aplikasi_access', NULL, NULL, NULL),
(48, 'data_mahasiswa_create', NULL, NULL, NULL),
(49, 'data_mahasiswa_edit', NULL, NULL, NULL),
(50, 'data_mahasiswa_show', NULL, NULL, NULL),
(51, 'data_mahasiswa_delete', NULL, NULL, NULL),
(52, 'data_mahasiswa_access', NULL, NULL, NULL),
(53, 'data_mahasiswa_on_going_create', NULL, NULL, NULL),
(54, 'data_mahasiswa_on_going_edit', NULL, NULL, NULL),
(55, 'data_mahasiswa_on_going_show', NULL, NULL, NULL),
(56, 'data_mahasiswa_on_going_delete', NULL, NULL, NULL),
(57, 'data_mahasiswa_on_going_access', NULL, NULL, NULL);

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
(2, 57);

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
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$eXCG6hcExAyYTWyYZSNFIeTO2ySVfZINZBKcNWVKpB/rJOy9RZJiK', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_mahasiswas`
--
ALTER TABLE `data_mahasiswas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_mahasiswa_on_goings`
--
ALTER TABLE `data_mahasiswa_on_goings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_history_fk_6829417` (`data_history_id`);

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
-- AUTO_INCREMENT for table `data_mahasiswas`
--
ALTER TABLE `data_mahasiswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_mahasiswa_on_goings`
--
ALTER TABLE `data_mahasiswa_on_goings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dosens`
--
ALTER TABLE `dosens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mata_kuliahs`
--
ALTER TABLE `mata_kuliahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

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
-- Constraints for table `data_mahasiswa_on_goings`
--
ALTER TABLE `data_mahasiswa_on_goings`
  ADD CONSTRAINT `data_history_fk_6829417` FOREIGN KEY (`data_history_id`) REFERENCES `data_mahasiswas` (`id`);

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
