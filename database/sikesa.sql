-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 08:21 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikesa`
--

-- --------------------------------------------------------

--
-- Table structure for table `griya`
--

CREATE TABLE `griya` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `griya`
--

INSERT INTO `griya` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Asy Syifa', '2019-11-29 14:13:26', '2019-11-29 14:13:26');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_11_29_102654_create_siswa_table', 2),
(8, '2019_11_29_103014_create_griya_table', 2),
(9, '2019_11_29_103237_create_pengajar_table', 2),
(10, '2019_11_29_103519_create_program_table', 2),
(13, '2019_12_03_144034_create_pembelajaran_table', 3);

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
-- Table structure for table `pembelajaran`
--

CREATE TABLE `pembelajaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pengajar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jilid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prog_dinar` tinyint(1) NOT NULL DEFAULT 0,
  `prog_liqo` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelajaran`
--

INSERT INTO `pembelajaran` (`id`, `kode_siswa`, `kode_pengajar`, `hari`, `jam`, `jilid`, `prog_dinar`, `prog_liqo`, `created_at`, `updated_at`) VALUES
(1, '3', '4', 'SELASA, RABU, JUMAT', '09-00 - 10.00', '1', 1, 1, '2019-12-08 02:40:03', '2019-12-08 07:22:08'),
(2, '1', '1', 'SELASA, RABU, JUMAT', '09-00 - 10.00', '1', 0, 1, '2019-12-08 06:52:17', '2019-12-08 06:52:45'),
(3, '2', '4', 'SELASA, RABU, JUMAT', '09-00 - 10.00', '1', 1, 0, '2019-12-08 06:53:31', '2019-12-08 07:22:28'),
(4, '4', '4', 'SELASA, RABU, JUMAT', '09-00 - 10.00', '1', 1, 0, '2019-12-08 07:20:13', '2019-12-08 07:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`id`, `nama`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
(4, 'SITI IKILAH', '-', '-', '2019-12-08 14:21:38', '2019-12-08 14:21:38');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profesi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_wali` tinyint(1) NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registered_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `profesi`, `is_wali`, `no_hp`, `registered_at`, `created_at`, `updated_at`) VALUES
(2, 'TITU ANGGAR LARASATI', 'JAKARTA', '1982-08-22', 'DS. JENGGOLO RT 1/ RW 1 JENU', 'IRT', 1, '085330821899', '1970-01-01', '2019-12-02 13:25:42', '2019-12-02 13:25:42'),
(3, 'DYAH MANGKURAWAN', 'tuban', '1969-12-27', 'DS. SEMANDING RT 02 RW 02 SEMANDING', 'PNS GURU', 1, '082233200323', '1970-01-01', '2019-12-04 14:29:32', '2019-12-04 14:29:32'),
(4, 'LINDA DRATMININGSIH', 'TUBAN', '1986-09-06', 'JL. PAHLAWAN RT 05 RW 07 GEDONGOMBO', 'IRT', 1, '085648876628', '1970-01-01', '2019-12-08 14:00:51', '2019-12-08 14:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'arham', 'Mufarrihin Arham', 'administrator', 'farri.arham@gmail.com', NULL, '$2y$10$QFNLeC5K9r5FnEnKkTKiZeOy98AQbbcPZ/b6qWuzgXLLWG8Au/A0C', 'khKEFpuge7XUh1oF72IvjdD2AWsyX2toPCIJPwCi4YhhYOWvyQ3BQpryAc9m', '2019-11-29 03:14:00', '2019-11-29 03:14:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `griya`
--
ALTER TABLE `griya`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pembelajaran`
--
ALTER TABLE `pembelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `griya`
--
ALTER TABLE `griya`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pembelajaran`
--
ALTER TABLE `pembelajaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
