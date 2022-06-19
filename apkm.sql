-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 19, 2022 at 08:14 PM
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
(1, 23, 34, 3, '2022-06-13 11:21:18', '2022-06-17 04:17:47', NULL),
(2, 25, 11, 6, '2022-06-14 11:21:26', '2022-06-17 04:18:00', NULL),
(3, 56, 42, 15, '2022-06-15 11:21:30', '2022-06-17 04:18:11', NULL),
(4, 103, 21, 12, '2022-06-16 11:21:34', '2022-06-17 04:18:46', NULL),
(5, 12, 23, 45, '2022-06-17 11:21:37', '2022-06-17 04:19:01', NULL),
(6, 113, 23, 14, '2022-06-17 11:21:41', '2022-06-17 04:19:19', NULL),
(7, 45, 15, 17, '2022-06-04 04:19:31', '2022-06-17 04:19:31', NULL),
(8, 25, 11, 6, '2022-06-14 11:21:26', '2022-06-17 04:18:00', NULL),
(9, 103, 21, 12, '2022-06-16 11:21:34', '2022-06-17 04:18:46', NULL),
(10, 113, 23, 14, '2022-06-17 11:21:41', '2022-06-17 04:19:19', NULL),
(11, 23, 34, 3, '2022-06-13 11:21:18', '2022-06-17 04:17:47', NULL),
(12, 25, 11, 6, '2022-06-14 11:21:26', '2022-06-17 04:18:00', NULL),
(13, 56, 42, 15, '2022-06-15 11:21:30', '2022-06-17 04:18:11', NULL),
(14, 103, 21, 12, '2022-06-16 11:21:34', '2022-06-17 04:18:46', NULL),
(15, 12, 23, 45, '2022-06-17 11:21:37', '2022-06-17 04:19:01', NULL),
(16, 113, 23, 14, '2022-06-17 11:21:41', '2022-06-17 04:19:19', NULL),
(17, 45, 15, 17, '2022-06-04 04:19:31', '2022-06-17 04:19:31', NULL),
(18, 25, 11, 6, '2022-06-14 11:21:26', '2022-06-17 04:18:00', NULL),
(19, 103, 21, 12, '2022-06-16 11:21:34', '2022-06-17 04:18:46', NULL),
(20, 113, 23, 14, '2022-06-17 11:21:41', '2022-06-17 04:19:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_mahasiswas`
--

CREATE TABLE `data_mahasiswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batas_nilai` int(11) DEFAULT NULL,
  `Lulus` float NOT NULL,
  `TidakLulus` float NOT NULL,
  `Active` float NOT NULL,
  `Observers` float NOT NULL,
  `Accuracy` float NOT NULL,
  `RecallLulus` float NOT NULL,
  `RecallTidakLulus` float NOT NULL,
  `PrecisionTidakLulus` float NOT NULL,
  `PrecisionLulus` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_mahasiswas`
--

INSERT INTO `data_mahasiswas` (`id`, `nama`, `batas_nilai`, `Lulus`, `TidakLulus`, `Active`, `Observers`, `Accuracy`, `RecallLulus`, `RecallTidakLulus`, `PrecisionTidakLulus`, `PrecisionLulus`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'qwerty', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-16 01:13:06', '2022-06-18 07:58:51', '2022-06-18 07:58:51'),
(2, '2', 50, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-16 01:30:05', '2022-06-16 01:42:54', NULL),
(3, 'tes1', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 09:11:11', '2022-06-18 09:11:11', NULL),
(4, 'tes1', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 09:12:12', '2022-06-18 09:12:12', NULL),
(5, 'tes1', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 09:17:05', '2022-06-18 09:17:05', NULL),
(6, 'tes1', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 09:18:07', '2022-06-18 09:18:07', NULL),
(7, 'tes1', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 09:20:23', '2022-06-18 09:20:23', NULL),
(8, 'tes1', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 09:20:50', '2022-06-18 09:20:50', NULL),
(9, 'tes1', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 09:21:20', '2022-06-18 09:21:20', NULL),
(10, 'tes1', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 09:25:57', '2022-06-18 09:25:57', NULL),
(11, 'tes1', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 10:20:38', '2022-06-18 10:20:38', NULL),
(12, 'tes1', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 10:21:25', '2022-06-18 10:21:25', NULL),
(13, 'tes2', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 10:22:18', '2022-06-18 10:22:18', NULL),
(14, 'tes4', 80, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 10:28:15', '2022-06-18 10:28:15', NULL),
(15, 'tes3', 70, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 10:29:06', '2022-06-18 10:29:06', NULL),
(16, 'tes4', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 10:30:15', '2022-06-18 10:30:15', NULL),
(17, 'tes5', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 10:41:26', '2022-06-18 10:41:26', NULL),
(18, 'tes5', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 10:41:55', '2022-06-18 10:41:55', NULL),
(19, 'tes5', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 10:42:19', '2022-06-18 10:42:19', NULL),
(20, 'tes5', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 10:43:50', '2022-06-18 10:43:50', NULL),
(21, 'tes6', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 10:44:56', '2022-06-18 10:44:56', NULL),
(22, 'tes6', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 10:46:20', '2022-06-18 10:46:20', NULL),
(23, 'tes6', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 10:47:03', '2022-06-18 10:47:03', NULL),
(24, 'tes6', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 10:48:46', '2022-06-18 10:48:46', NULL),
(25, 'tes6', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 10:49:00', '2022-06-18 10:49:00', NULL),
(26, 'tes6', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 10:51:10', '2022-06-18 10:51:10', NULL),
(27, 'tes6', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 10:52:29', '2022-06-18 10:52:29', NULL),
(28, 'tes6', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 10:53:39', '2022-06-18 10:53:39', NULL),
(29, 'tes6', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 10:56:33', '2022-06-18 10:56:33', NULL),
(30, 'tes6', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 10:57:14', '2022-06-18 10:57:14', NULL),
(31, 'tes6', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 10:58:06', '2022-06-18 10:58:06', NULL),
(32, 'tes6', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 10:59:58', '2022-06-18 10:59:58', NULL),
(33, 'tes7', 70, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 11:01:58', '2022-06-18 11:01:58', NULL),
(34, 'tes8', 70, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 11:05:17', '2022-06-18 11:05:17', NULL),
(35, 'tes9', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 11:07:21', '2022-06-18 11:07:21', NULL),
(36, 'tes10', 50, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 11:09:25', '2022-06-18 11:09:25', NULL),
(37, 'tes12', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 11:11:02', '2022-06-18 11:11:02', NULL),
(38, 'tes13', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 11:14:40', '2022-06-18 11:14:40', NULL),
(39, 'qwerty', 70, 123, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 13:07:27', '2022-06-18 13:07:27', NULL),
(40, 'qwerty', 60, 123, 0, 123, 0, 123, 123, 123, 123, 123, '2022-06-18 13:18:29', '2022-06-18 13:18:29', NULL),
(41, 'qwerty', 70, 22, 0, 123, 0, 123, 123, 123, 123, 123, '2022-06-18 13:23:55', '2022-06-18 13:24:05', NULL),
(42, 'qwerty', 70, 2222, 0, 123, 0, 123, 123, 123, 123, 123, '2022-06-18 13:25:30', '2022-06-18 13:25:38', NULL),
(43, 'qwerty', 70, 22, 0, 123, 0, 123, 123, 123, 123, 123, '2022-06-18 13:26:26', '2022-06-18 13:26:37', NULL),
(44, 'qwerty', 70, 1123, 0, 2123, 0, 1232, 12223, 22123, 22123, 1232, '2022-06-18 13:30:31', '2022-06-18 13:30:39', NULL),
(45, 'tes akhir', 60, 123, 123, 123, 123, 123, 123, 123, 123, 123, '2022-06-18 13:40:14', '2022-06-18 13:40:14', NULL),
(46, 'tes akhir', 60, 123, 123, 123, 123, 123, 123, 123, 123, 123, '2022-06-18 13:41:36', '2022-06-18 13:41:36', NULL),
(47, 'tes akhir', 60, 123, 123, 123, 123, 123, 123, 123, 123, 123, '2022-06-18 13:42:06', '2022-06-18 13:42:06', NULL),
(48, 'tes akhir', 60, 123, 123, 123, 123, 123, 123, 123, 123, 123, '2022-06-18 13:43:13', '2022-06-18 13:43:13', NULL),
(49, 'tes akhir', 60, 123, 123, 123, 123, 123, 123, 123, 123, 123, '2022-06-18 13:48:38', '2022-06-18 13:48:38', NULL),
(50, 'tes akhir', 60, 123, 123, 123, 123, 123, 123, 123, 123, 123, '2022-06-18 13:51:52', '2022-06-18 13:51:52', NULL),
(51, 'tes akhir', 60, 123, 123, 123, 123, 123, 123, 123, 123, 123, '2022-06-18 13:53:11', '2022-06-18 13:53:11', NULL),
(52, 'tes akhir', 60, 10, 2, 62, 16, 0.9192, 1, 0.5833, 0.8, 0.9042, '2022-06-18 13:58:16', '2022-06-18 13:58:24', NULL),
(53, 'tes final', 60, 10, 2, 62, 16, 0.9192, 1, 0.5833, 0.8, 0.9042, '2022-06-18 13:59:10', '2022-06-18 13:59:18', NULL),
(54, 'tes final final', 60, 10, 2, 62, 16, 0.9192, 1, 0.5833, 0.8, 0.9042, '2022-06-18 15:30:19', '2022-06-18 15:31:00', NULL),
(55, 'ads', 40, 123, 123, 123, 123, 123, 123, 123, 123, 123, '2022-06-19 12:50:31', '2022-06-19 12:50:31', NULL),
(56, 'ads', 40, 123, 123, 123, 123, 123, 123, 123, 123, 123, '2022-06-19 12:51:34', '2022-06-19 12:51:34', NULL),
(57, 'ads', 40, 123, 123, 123, 123, 123, 123, 123, 123, 123, '2022-06-19 12:51:58', '2022-06-19 12:51:58', NULL),
(58, 'ads', 40, 123, 123, 123, 123, 123, 123, 123, 123, 123, '2022-06-19 12:54:54', '2022-06-19 12:54:54', NULL),
(59, 'weq', 50, 123, 123, 123, 123, 123, 123, 123, 123, 123, '2022-06-19 12:56:49', '2022-06-19 12:56:49', NULL),
(60, 'weq', 50, 10, 2, 62, 16, 0.9038, 1, 0.5, 0.8, 0.8913, '2022-06-19 12:58:22', '2022-06-19 12:58:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_mahasiswa_on_goings`
--

CREATE TABLE `data_mahasiswa_on_goings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hasil_prediksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_mahasiswa_on_goings`
--

INSERT INTO `data_mahasiswa_on_goings` (`id`, `nama`, `hasil_prediksi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Data ongoing', '1', '2022-06-18 07:59:24', '2022-06-18 08:46:23', NULL),
(2, 'test', '59', '2022-06-18 08:58:44', '2022-06-18 08:58:44', NULL),
(3, 'tes1', NULL, '2022-06-18 09:29:00', '2022-06-18 09:29:00', NULL),
(4, 'tes1', NULL, '2022-06-18 09:31:22', '2022-06-18 09:31:22', NULL),
(5, 'tes1', NULL, '2022-06-18 10:10:22', '2022-06-18 10:10:22', NULL),
(6, 'tes1', NULL, '2022-06-18 10:10:40', '2022-06-18 10:10:40', NULL),
(7, 'tes1', NULL, '2022-06-18 10:10:43', '2022-06-18 10:10:43', NULL),
(8, 'tes1', NULL, '2022-06-18 10:12:11', '2022-06-18 10:12:11', NULL),
(9, 'tes1', NULL, '2022-06-18 10:12:59', '2022-06-18 10:12:59', NULL),
(10, 'tes2', NULL, '2022-06-18 10:19:47', '2022-06-18 10:19:47', NULL),
(11, 'tes5', NULL, '2022-06-18 11:17:44', '2022-06-18 11:17:44', NULL),
(12, 'tes3', NULL, '2022-06-18 11:20:29', '2022-06-18 11:20:29', NULL),
(13, 'qwe', NULL, '2022-06-19 12:21:16', '2022-06-19 12:21:16', NULL),
(14, 'qwe', NULL, '2022-06-19 12:29:29', '2022-06-19 12:29:29', NULL),
(15, 'sda', NULL, '2022-06-19 12:30:29', '2022-06-19 12:30:29', NULL),
(16, 'dsa', NULL, '2022-06-19 12:40:35', '2022-06-19 12:40:35', NULL),
(17, 'sa', NULL, '2022-06-19 12:41:15', '2022-06-19 12:41:15', NULL),
(18, 'dsa', NULL, '2022-06-19 12:43:27', '2022-06-19 12:43:27', NULL),
(19, 'sad', NULL, '2022-06-19 12:46:59', '2022-06-19 12:46:59', NULL),
(20, 'dsa', NULL, '2022-06-19 13:01:05', '2022-06-19 13:01:05', NULL),
(21, 'yui', NULL, '2022-06-19 13:03:15', '2022-06-19 13:03:15', NULL),
(22, 'xc', NULL, '2022-06-19 13:04:00', '2022-06-19 13:04:00', NULL),
(23, 'yii', NULL, '2022-06-19 13:07:45', '2022-06-19 13:07:45', NULL),
(24, 'yii', NULL, '2022-06-19 13:07:50', '2022-06-19 13:07:50', NULL);

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
(1, 1112, 'Bang Umar', 'S3', 'bangumar@gmail.com', '0812311231231', '2022-06-15 19:49:03', '2022-06-15 19:49:03', NULL);

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
(1, '09876', 'Informatika', '2022-06-15 19:45:53', '2022-06-15 19:45:53', NULL),
(2, '09877', 'Seni Rupa', '2022-06-15 19:46:07', '2022-06-15 19:46:17', NULL),
(3, '0988', 'Matematika Murni', '2022-06-15 19:46:30', '2022-06-15 19:46:30', NULL),
(4, '0989', 'Sistem Infomasi', '2022-06-15 19:46:45', '2022-06-15 19:46:45', NULL);

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
(1, 1234, 'Fafa', 2017, 'fail.amir@students.amikom.ac.id', '083148263597', '2022-06-15 19:47:10', '2022-06-15 19:47:10', NULL, 1),
(2, 1235, 'Erik \r\nSudirjo', 2012, 'smartbroadcast.io@gmail.com', '083456765412', '2022-06-15 19:47:43', '2022-06-15 19:47:43', NULL, 2);

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
(1, 5678, 'RPL', 12, '2022-06-15 19:47:59', '2022-06-15 19:47:59', NULL, 1),
(2, 5679, 'Flow Chart', 8, '2022-06-15 19:48:38', '2022-06-15 19:48:38', NULL, 4);

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
(1, 'App\\Models\\DataMahasiswa', 1, '62cf10f3-8828-4bc7-b42c-65ad3b0d1158', 'data_mahasiswa_data_mahasiswa', 'Contoh Data ICE On Going', 'Contoh-Data-ICE-On-Going.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 8831, '[]', '[]', '[]', '[]', 1, '2022-06-16 01:13:03', '2022-06-16 01:13:06'),
(2, 'App\\Models\\DataMahasiswa', 2, 'fd86d670-5517-492a-ba45-b035148b9db8', 'data_mahasiswa_data_mahasiswa', 'Data LMS + Nilai - ICEI Rev 21.03.2021 (1)', 'Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 396687, '[]', '[]', '[]', '[]', 1, '2022-06-16 01:30:04', '2022-06-16 01:30:05'),
(3, 'App\\Models\\DataMahasiswaOnGoing', 1, 'a6974e89-b083-464e-8dbe-5b2544657ebb', 'data_mahasiswa_on_going_data_mahasiswa', 'Contoh Data ICE On Going', 'Contoh-Data-ICE-On-Going.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 8831, '[]', '[]', '[]', '[]', 1, '2022-06-18 07:59:22', '2022-06-18 07:59:24'),
(4, 'App\\Models\\DataMahasiswaOnGoing', 0, '345e6870-ffbf-4302-b997-90deddc5e839', 'data_mahasiswa_on_going_data_mahasiswa', 'Hasil Prediksi', 'Hasil-Prediksi.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 5090, '[]', '[]', '[]', '[]', 1, '2022-06-18 08:56:29', '2022-06-18 08:56:29'),
(5, 'App\\Models\\DataMahasiswaOnGoing', 0, '17361cab-9537-40f8-aa69-9cef8c117a25', 'data_mahasiswa_on_going_data_mahasiswa', 'Hasil Prediksi', 'Hasil-Prediksi.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 5090, '[]', '[]', '[]', '[]', 2, '2022-06-18 08:57:06', '2022-06-18 08:57:06'),
(6, 'App\\Models\\DataMahasiswaOnGoing', 2, '1a964cab-3442-4bed-9779-8202f49047c3', 'data_mahasiswa_on_going_data_mahasiswa', 'Screenshot 2022-06-17 at 21.49.20', 'Screenshot-2022-06-17-at-21.49.20.png', 'image/png', 'public', 'public', 20324, '[]', '[]', '[]', '[]', 3, '2022-06-18 08:58:37', '2022-06-18 08:58:44'),
(7, 'App\\Models\\DataMahasiswa', 3, '24e30c53-f63b-4bde-84c9-61c8dbe7d380', 'data_mahasiswa_data_mahasiswa', 'Data LMS + Nilai - ICEI Rev 21.03.2021 (1)', 'Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 396687, '[]', '[]', '[]', '[]', 1, '2022-06-18 09:11:06', '2022-06-18 09:11:11'),
(8, 'App\\Models\\DataMahasiswaOnGoing', 3, 'f72f36c7-df8b-4e8f-8bb7-7a141bd3c5b1', 'data_mahasiswa_on_going_data_mahasiswa', 'Contoh Data ICE On Going', 'Contoh-Data-ICE-On-Going.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 8831, '[]', '[]', '[]', '[]', 3, '2022-06-18 09:28:56', '2022-06-18 09:29:00'),
(9, 'App\\Models\\DataMahasiswaOnGoing', 10, 'fa7f5a42-e3a2-4e94-982d-e9ff69f4ae77', 'data_mahasiswa_on_going_data_mahasiswa', 'Contoh Data ICE On Going', 'Contoh-Data-ICE-On-Going.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 8831, '[]', '[]', '[]', '[]', 3, '2022-06-18 10:19:42', '2022-06-18 10:19:47'),
(10, 'App\\Models\\DataMahasiswa', 13, '20c03c88-9e26-4ba8-823b-d6944d7dab5a', 'data_mahasiswa_data_mahasiswa', 'Data LMS + Nilai - ICEI Rev 21.03.2021 (1)', 'Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 396687, '[]', '[]', '[]', '[]', 1, '2022-06-18 10:22:10', '2022-06-18 10:22:18'),
(11, 'App\\Models\\DataMahasiswa', 14, '0be6e575-bfbd-41c9-8ca2-5da8d843ddec', 'data_mahasiswa_data_mahasiswa', 'Data LMS + Nilai - ICEI Rev 21.03.2021 (1)', 'Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 396687, '[]', '[]', '[]', '[]', 1, '2022-06-18 10:28:06', '2022-06-18 10:28:15'),
(12, 'App\\Models\\DataMahasiswa', 15, 'd49fea83-b61e-4be7-8c58-0521708bfbd5', 'data_mahasiswa_data_mahasiswa', 'Data LMS + Nilai - ICEI Rev 21.03.2021 (1)', 'Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 396687, '[]', '[]', '[]', '[]', 1, '2022-06-18 10:29:00', '2022-06-18 10:29:06'),
(13, 'App\\Models\\DataMahasiswa', 16, 'ca3928c6-34c4-419b-aa74-63633ea6e948', 'data_mahasiswa_data_mahasiswa', 'Data LMS + Nilai - ICEI Rev 21.03.2021 (1)', 'Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 396687, '[]', '[]', '[]', '[]', 1, '2022-06-18 10:30:05', '2022-06-18 10:30:15'),
(14, 'App\\Models\\DataMahasiswa', 17, 'c45c08e6-d602-46ea-93fa-36e53702dd5f', 'data_mahasiswa_data_mahasiswa', 'Data LMS + Nilai - ICEI Rev 21.03.2021 (1)', 'Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 396687, '[]', '[]', '[]', '[]', 1, '2022-06-18 10:41:18', '2022-06-18 10:41:26'),
(15, 'App\\Models\\DataMahasiswa', 21, 'd97e6edc-849b-40f9-8f87-cc1793abd234', 'data_mahasiswa_data_mahasiswa', 'Data LMS + Nilai - ICEI Rev 21.03.2021 (1)', 'Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 396687, '[]', '[]', '[]', '[]', 1, '2022-06-18 10:44:52', '2022-06-18 10:44:56'),
(16, 'App\\Models\\DataMahasiswa', 33, '20f01809-19e6-4910-9e99-61c4865a74e0', 'data_mahasiswa_data_mahasiswa', 'Data LMS + Nilai - ICEI Rev 21.03.2021 (1)', 'Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 396687, '[]', '[]', '[]', '[]', 1, '2022-06-18 11:01:54', '2022-06-18 11:01:58'),
(17, 'App\\Models\\DataMahasiswa', 34, 'c8256d99-6fd4-495a-8286-4dbc5c51e9b6', 'data_mahasiswa_data_mahasiswa', 'Data LMS + Nilai - ICEI Rev 21.03.2021 (1)', 'Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 396687, '[]', '[]', '[]', '[]', 1, '2022-06-18 11:05:13', '2022-06-18 11:05:17'),
(18, 'App\\Models\\DataMahasiswa', 35, '19aa3b34-0e89-4b45-826f-dca662168f0f', 'data_mahasiswa_data_mahasiswa', 'Data LMS + Nilai - ICEI Rev 21.03.2021 (1)', 'Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 396687, '[]', '[]', '[]', '[]', 1, '2022-06-18 11:07:12', '2022-06-18 11:07:21'),
(19, 'App\\Models\\DataMahasiswa', 36, 'bdb4ef6b-262b-4de4-85a4-a7f557e508c6', 'data_mahasiswa_data_mahasiswa', 'Data LMS + Nilai - ICEI Rev 21.03.2021 (1)', 'Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 396687, '[]', '[]', '[]', '[]', 1, '2022-06-18 11:09:21', '2022-06-18 11:09:25'),
(20, 'App\\Models\\DataMahasiswa', 37, '65006303-c23a-4789-a49a-2c2be3f5fd9d', 'data_mahasiswa_data_mahasiswa', 'Data LMS + Nilai - ICEI Rev 21.03.2021 (1)', 'Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 396687, '[]', '[]', '[]', '[]', 1, '2022-06-18 11:10:59', '2022-06-18 11:11:02'),
(21, 'App\\Models\\DataMahasiswa', 38, '2b314d10-e8e3-450b-be7a-130af89b7a60', 'data_mahasiswa_data_mahasiswa', 'Data LMS + Nilai - ICEI Rev 21.03.2021 (1)', 'Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 396687, '[]', '[]', '[]', '[]', 1, '2022-06-18 11:14:38', '2022-06-18 11:14:40'),
(22, 'App\\Models\\DataMahasiswaOnGoing', 11, '356ee9d9-e77f-4b72-b828-e4f2af36f51e', 'data_mahasiswa_on_going_data_mahasiswa', 'Contoh Data ICE On Going', 'Contoh-Data-ICE-On-Going.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 8831, '[]', '[]', '[]', '[]', 3, '2022-06-18 11:17:40', '2022-06-18 11:17:44'),
(23, 'App\\Models\\DataMahasiswaOnGoing', 12, '42ebeb33-db9b-42be-a337-12b2c00660df', 'data_mahasiswa_on_going_data_mahasiswa', 'Contoh Data ICE On Going', 'Contoh-Data-ICE-On-Going.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 8831, '[]', '[]', '[]', '[]', 3, '2022-06-18 11:20:22', '2022-06-18 11:20:29'),
(24, 'App\\Models\\DataMahasiswa', 39, '80d884cb-28a3-4b0f-9805-1430f0a916bf', 'data_mahasiswa_data_mahasiswa', 'Data LMS + Nilai - ICEI Rev 21.03.2021 (1)', 'Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 396687, '[]', '[]', '[]', '[]', 1, '2022-06-18 13:07:23', '2022-06-18 13:07:27'),
(25, 'App\\Models\\DataMahasiswa', 40, '50a5bd64-33a0-440b-9a3d-b80e23748f4a', 'data_mahasiswa_data_mahasiswa', 'Data LMS + Nilai - ICEI Rev 21.03.2021 (1)', 'Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 396687, '[]', '[]', '[]', '[]', 1, '2022-06-18 13:13:46', '2022-06-18 13:18:29'),
(26, 'App\\Models\\DataMahasiswa', 41, 'a638fb74-b325-43fb-9e47-9f5b902cdb6b', 'data_mahasiswa_data_mahasiswa', 'Data LMS + Nilai - ICEI Rev 21.03.2021 (1)', 'Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 396687, '[]', '[]', '[]', '[]', 1, '2022-06-18 13:23:51', '2022-06-18 13:23:55'),
(27, 'App\\Models\\DataMahasiswa', 45, '194c3c7e-871c-4ec6-8d36-8d61f973bcea', 'data_mahasiswa_data_mahasiswa', 'Data LMS + Nilai - ICEI Rev 21.03.2021 (1)', 'Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 396687, '[]', '[]', '[]', '[]', 1, '2022-06-18 13:39:14', '2022-06-18 13:40:14'),
(28, 'App\\Models\\DataMahasiswa', 47, 'c61c70a2-1d04-4792-a978-647020a035d1', 'data_mahasiswa_data_mahasiswa', 'Data LMS + Nilai - ICEI Rev 21.03.2021 (1)', 'Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 396687, '[]', '[]', '[]', '[]', 1, '2022-06-18 13:42:02', '2022-06-18 13:42:06'),
(29, 'App\\Models\\DataMahasiswa', 53, '360edc36-fc39-4759-876a-46b101360cde', 'data_mahasiswa_data_mahasiswa', 'Data LMS + Nilai - ICEI Rev 21.03.2021 (1)', 'Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 396687, '[]', '[]', '[]', '[]', 1, '2022-06-18 13:59:07', '2022-06-18 13:59:10'),
(30, 'App\\Models\\DataMahasiswa', 54, 'c6d8c720-56aa-44e4-a7d0-37565339b80a', 'data_mahasiswa_data_mahasiswa', 'Data LMS + Nilai - ICEI Rev 21.03.2021 (1)', 'Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 396687, '[]', '[]', '[]', '[]', 1, '2022-06-18 15:29:58', '2022-06-18 15:30:19'),
(31, 'App\\Models\\DataMahasiswaOnGoing', 13, 'fccf5128-c561-4bb5-b932-f5514d095dba', 'data_mahasiswa_on_going_data_mahasiswa', 'Contoh Data ICE On Going', 'Contoh-Data-ICE-On-Going.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 8831, '[]', '[]', '[]', '[]', 3, '2022-06-19 12:21:09', '2022-06-19 12:21:16'),
(32, 'App\\Models\\DataMahasiswaOnGoing', 14, '964e681e-849d-43f2-bd7f-55b9b6fb21ae', 'data_mahasiswa_on_going_data_mahasiswa', 'Contoh Data ICE On Going', 'Contoh-Data-ICE-On-Going.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 8831, '[]', '[]', '[]', '[]', 3, '2022-06-19 12:28:11', '2022-06-19 12:29:29'),
(33, 'App\\Models\\DataMahasiswaOnGoing', 15, '6af7af9c-4369-44be-ab27-92d050eb991e', 'data_mahasiswa_on_going_data_mahasiswa', 'Contoh Data ICE On Going', 'Contoh-Data-ICE-On-Going.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 8831, '[]', '[]', '[]', '[]', 3, '2022-06-19 12:30:28', '2022-06-19 12:30:29'),
(34, 'App\\Models\\DataMahasiswaOnGoing', 16, '298540ea-f73c-470d-b60a-af3b8881b172', 'data_mahasiswa_on_going_data_mahasiswa', 'Contoh Data ICE On Going', 'Contoh-Data-ICE-On-Going.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 8831, '[]', '[]', '[]', '[]', 3, '2022-06-19 12:40:34', '2022-06-19 12:40:35'),
(35, 'App\\Models\\DataMahasiswaOnGoing', 17, '7f078384-90c5-452a-84ae-ce413bc752ca', 'data_mahasiswa_on_going_data_mahasiswa', 'Contoh Data ICE On Going', 'Contoh-Data-ICE-On-Going.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 8831, '[]', '[]', '[]', '[]', 3, '2022-06-19 12:41:14', '2022-06-19 12:41:15'),
(36, 'App\\Models\\DataMahasiswaOnGoing', 18, 'a773744d-7bdc-431d-bd29-dae07dfd8f54', 'data_mahasiswa_on_going_data_mahasiswa', 'Contoh Data ICE On Going', 'Contoh-Data-ICE-On-Going.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 8831, '[]', '[]', '[]', '[]', 3, '2022-06-19 12:43:25', '2022-06-19 12:43:27'),
(37, 'App\\Models\\DataMahasiswaOnGoing', 19, '82ee67ab-0d5f-442c-99b8-2a75aef39d7f', 'data_mahasiswa_on_going_data_mahasiswa', 'Contoh Data ICE On Going', 'Contoh-Data-ICE-On-Going.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 8831, '[]', '[]', '[]', '[]', 3, '2022-06-19 12:46:58', '2022-06-19 12:46:59'),
(38, 'App\\Models\\DataMahasiswa', 55, 'a7bf925c-978c-4050-8fab-429c0edfa3f0', 'data_mahasiswa_data_mahasiswa', 'Data LMS + Nilai - ICEI Rev 21.03.2021 (1)', 'Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 396687, '[]', '[]', '[]', '[]', 1, '2022-06-19 12:50:25', '2022-06-19 12:50:31'),
(39, 'App\\Models\\DataMahasiswa', 59, 'e157336a-71fc-4192-8795-0b7a5470b6cc', 'data_mahasiswa_data_mahasiswa', 'Data LMS + Nilai - ICEI Rev 21.03.2021 (1)', 'Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 396687, '[]', '[]', '[]', '[]', 1, '2022-06-19 12:56:40', '2022-06-19 12:56:49'),
(40, 'App\\Models\\DataMahasiswaOnGoing', 20, '85fb5dc7-6fb2-43ab-842a-f9f7fdccd598', 'data_mahasiswa_on_going_data_mahasiswa', 'Contoh Data ICE On Going', 'Contoh-Data-ICE-On-Going.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 8831, '[]', '[]', '[]', '[]', 3, '2022-06-19 13:01:04', '2022-06-19 13:01:05'),
(41, 'App\\Models\\DataMahasiswaOnGoing', 0, '9156d3af-6ebf-494f-97c3-842d3975897c', 'data_mahasiswa_on_going_data_mahasiswa', 'Contoh Data ICE On Going', 'Contoh-Data-ICE-On-Going.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 8831, '[]', '[]', '[]', '[]', 3, '2022-06-19 13:03:14', '2022-06-19 13:03:14'),
(42, 'App\\Models\\DataMahasiswaOnGoing', 22, 'f731fc0e-2b71-4df5-9fca-70e04fd75d8a', 'data_mahasiswa_on_going_data_mahasiswa', 'Contoh Data ICE On Going', 'Contoh-Data-ICE-On-Going.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 8831, '[]', '[]', '[]', '[]', 4, '2022-06-19 13:03:58', '2022-06-19 13:04:00'),
(43, 'App\\Models\\DataMahasiswaOnGoing', 24, '6f405ee1-4e7b-4ec9-8fb9-6c6e1e5a12a7', 'data_mahasiswa_on_going_data_mahasiswa', 'Contoh Data ICE On Going', 'Contoh-Data-ICE-On-Going.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'public', 'public', 8831, '[]', '[]', '[]', '[]', 4, '2022-06-19 13:07:44', '2022-06-19 13:07:50');

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
(3, '2022_06_18_000001_create_media_table', 1),
(4, '2022_06_18_000002_create_permissions_table', 1),
(5, '2022_06_18_000003_create_roles_table', 1),
(6, '2022_06_18_000004_create_users_table', 1),
(7, '2022_06_18_000005_create_mahasiswas_table', 1),
(8, '2022_06_18_000006_create_mata_kuliahs_table', 1),
(9, '2022_06_18_000007_create_jurusans_table', 1),
(10, '2022_06_18_000008_create_dosens_table', 1),
(11, '2022_06_18_000009_create_data_mahasiswas_table', 1),
(12, '2022_06_18_000010_create_data_dummies_table', 1),
(13, '2022_06_18_000011_create_data_mahasiswa_on_goings_table', 1),
(14, '2022_06_18_000012_create_permission_role_pivot_table', 1),
(15, '2022_06_18_000013_create_role_user_pivot_table', 1),
(16, '2022_06_18_000014_create_dosen_jurusan_pivot_table', 1),
(17, '2022_06_18_000015_add_relationship_fields_to_mahasiswas_table', 1),
(18, '2022_06_18_000016_add_relationship_fields_to_mata_kuliahs_table', 1);

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
(53, 'data_dummy_create', NULL, NULL, NULL),
(54, 'data_dummy_edit', NULL, NULL, NULL),
(55, 'data_dummy_show', NULL, NULL, NULL),
(56, 'data_dummy_delete', NULL, NULL, NULL),
(57, 'data_dummy_access', NULL, NULL, NULL),
(58, 'data_mahasiswa_on_going_create', NULL, NULL, NULL),
(59, 'data_mahasiswa_on_going_edit', NULL, NULL, NULL),
(60, 'data_mahasiswa_on_going_show', NULL, NULL, NULL),
(61, 'data_mahasiswa_on_going_delete', NULL, NULL, NULL),
(62, 'data_mahasiswa_on_going_access', NULL, NULL, NULL);

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
(2, 62);

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
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$aiurAPaQkdKgcwXi5BR4.eZF27eSQzgBCg4d/wl9Z18eoQ6dPpIeS', 'hUTYosM059HQriQDT1lLNBIrVjJ0evHRI1BclagwubEQBMumH70KBK5Bk0vp', NULL, NULL, NULL);

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
-- Indexes for table `data_mahasiswa_on_goings`
--
ALTER TABLE `data_mahasiswa_on_goings`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `data_mahasiswa_on_goings`
--
ALTER TABLE `data_mahasiswa_on_goings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

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
