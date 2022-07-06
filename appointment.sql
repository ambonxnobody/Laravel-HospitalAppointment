-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2022 at 02:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `status` enum('pending','done') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `date`, `startTime`, `endTime`, `status`, `created_at`, `updated_at`) VALUES
(1, '2022-07-11', '08:00:00', '09:00:00', 'pending', '2022-07-05 01:59:03', '2022-07-05 01:59:03'),
(2, '2022-07-12', '09:00:00', '10:00:00', 'pending', '2022-07-05 02:05:21', '2022-07-05 02:05:21'),
(3, '2022-07-11', '09:00:00', '10:00:00', 'pending', '2022-07-05 02:06:11', '2022-07-05 02:06:11'),
(4, '2022-07-07', '09:00:00', '10:00:00', 'pending', '2022-07-05 02:07:53', '2022-07-05 02:07:53'),
(5, '2022-07-07', '09:00:00', '10:00:00', 'pending', '2022-07-05 02:08:01', '2022-07-05 02:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `concerns` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symptoms` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `patient_id`, `appointment_id`, `concerns`, `symptoms`, `created_at`, `updated_at`) VALUES
(1, 7, 1, NULL, NULL, '2022-07-05 01:59:03', '2022-07-05 01:59:03'),
(2, 7, 2, NULL, NULL, '2022-07-05 02:05:21', '2022-07-05 02:05:21'),
(3, 8, 3, 'Sakit Gigi', 'Ngiliu', '2022-07-05 02:06:11', '2022-07-05 02:09:52'),
(4, 8, 4, NULL, NULL, '2022-07-05 02:07:53', '2022-07-05 02:07:53'),
(5, 8, 5, NULL, NULL, '2022-07-05 02:08:01', '2022-07-05 02:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `diagnose`
--

CREATE TABLE `diagnose` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `diagnosis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prescription` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnose`
--

INSERT INTO `diagnose` (`id`, `doctor_id`, `appointment_id`, `diagnosis`, `prescription`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL, '2022-07-05 01:59:03', '2022-07-05 01:59:03'),
(2, 3, 2, NULL, NULL, '2022-07-05 02:05:21', '2022-07-05 02:05:21'),
(3, 2, 3, NULL, NULL, '2022-07-05 02:06:11', '2022-07-05 02:06:11'),
(4, 3, 4, NULL, NULL, '2022-07-05 02:07:53', '2022-07-05 02:07:53'),
(5, 4, 5, NULL, NULL, '2022-07-05 02:08:01', '2022-07-05 02:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedule`
--

CREATE TABLE `doctor_schedule` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_schedule`
--

INSERT INTO `doctor_schedule` (`id`, `doctor_id`, `schedule_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2022-07-05 01:49:43', '2022-07-05 01:49:43'),
(2, 2, 3, '2022-07-05 01:49:43', '2022-07-05 01:49:43'),
(3, 2, 5, '2022-07-05 01:49:43', '2022-07-05 01:49:43'),
(4, 2, 7, '2022-07-05 01:49:43', '2022-07-05 01:49:43'),
(5, 3, 2, '2022-07-05 01:49:43', '2022-07-05 01:49:43'),
(6, 3, 4, '2022-07-05 01:49:43', '2022-07-05 01:49:43'),
(7, 3, 6, '2022-07-05 01:49:43', '2022-07-05 01:49:43'),
(8, 4, 4, '2022-07-05 01:49:43', '2022-07-05 01:49:43'),
(9, 5, 5, '2022-07-05 01:49:43', '2022-07-05 01:49:43'),
(10, 6, 6, '2022-07-05 01:49:43', '2022-07-05 01:49:43'),
(11, 2, 6, '2022-07-05 02:01:45', '2022-07-05 02:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medical_histories`
--

CREATE TABLE `medical_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `condition` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surgeries` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medication` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_histories`
--

INSERT INTO `medical_histories` (`id`, `condition`, `surgeries`, `medication`, `patient_id`, `created_at`, `updated_at`) VALUES
(1, 'Sakit Gigi', 'Tambal Gigi', '- Oskadon 3x', 7, '2022-07-05 01:57:31', '2022-07-05 01:57:31');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_24_182722_create_medical_histories_table', 1),
(6, '2022_06_25_091339_create_schedules_table', 1),
(7, '2022_06_25_134313_create_doctor_schedule_table', 1),
(8, '2022_06_25_200443_create_appointments_table', 1),
(9, '2022_06_25_201037_create_diagnose_table', 1),
(10, '2022_06_25_201105_create_complaint_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `breakTime` time DEFAULT NULL,
  `day` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `startTime`, `endTime`, `breakTime`, `day`, `created_at`, `updated_at`) VALUES
(1, '08:00:00', '20:00:00', '12:00:00', 'Senin', '2022-07-05 01:49:43', '2022-07-05 01:49:43'),
(2, '08:00:00', '20:00:00', '12:00:00', 'Selasa', '2022-07-05 01:49:43', '2022-07-05 01:49:43'),
(3, '08:00:00', '20:00:00', '12:00:00', 'Rabu', '2022-07-05 01:49:43', '2022-07-05 01:49:43'),
(4, '08:00:00', '20:00:00', '12:00:00', 'Kamis', '2022-07-05 01:49:43', '2022-07-05 01:49:43'),
(5, '08:00:00', '20:00:00', '11:00:00', 'Jumat', '2022-07-05 01:49:43', '2022-07-05 01:49:43'),
(6, '08:00:00', '20:00:00', '12:00:00', 'Sabtu', '2022-07-05 01:49:43', '2022-07-05 01:49:43'),
(7, '15:00:00', '20:00:00', NULL, 'Minggu', '2022-07-05 01:49:43', '2022-07-05 01:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('M','F','L','G','B','T','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','doctor','patient') COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `gender`, `role`, `address`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Admin', 'M', 'admin', 'Ds. Sumpah Pemuda No. 327, Binjai 79854, DKI', 'Ttxcmjgq1Ya7P0MssnwmQ6XBcL7wDJteHiRkNdT9JPZf6iEiv5MyWpKiMjjK', '2022-07-05 01:49:43', '2022-07-05 01:49:43', NULL),
(2, 'doctor@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Doctor', 'M', 'doctor', 'Kpg. Panjaitan No. 853, Yogyakarta 52654, Papua', 'LGEfll7EhxxjuTnCHIcjImAjTHusuToMbZFUE5jZyBqdBzzAyjmwhxXPt4O0', '2022-07-05 01:49:43', '2022-07-05 01:49:43', NULL),
(3, 'anggraini.nadine@yahoo.co.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Tri Bala Mandala', 'N', 'doctor', 'Ki. Fajar No. 459, Tual 48540, Kaltara', 'j9TRfXYCBQ5zgy175qw8', '2022-07-05 01:49:43', '2022-07-05 01:49:43', NULL),
(4, 'fpranowo@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Gara Prabowo Ramadan S.IP', 'G', 'doctor', 'Ds. Labu No. 42, Pangkal Pinang 63500, Lampung', 'EBunDM77EMvO7BXe8RAw', '2022-07-05 01:49:43', '2022-07-05 01:49:43', NULL),
(5, 'prakosa69@yahoo.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Zizi Yessi Andriani', 'N', 'doctor', 'Ki. Cemara No. 389, Tasikmalaya 54469, DKI', '758Hs6cMUe52wqYkYfb5', '2022-07-05 01:49:43', '2022-07-05 01:49:43', NULL),
(6, 'dagel.marpaung@gmail.co.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Mursita Suwarno', 'F', 'doctor', 'Dk. Cemara No. 856, Tomohon 87844, Lampung', 'l6YslrJDv2WpsAQniJF3', '2022-07-05 01:49:43', '2022-07-05 01:49:43', NULL),
(7, 'patient@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Patient', 'M', 'patient', 'Kpg. Wahid Hasyim No. 421, Padangpanjang 88381, Sulsel', 'IBdJvPk78WTbi4TLxdL4cX2uQbYVBeIXNxYXfhX114LIunUKMKZUULd5Cmtx', '2022-07-05 01:49:43', '2022-07-05 01:49:43', NULL),
(8, 'santoso.putri@gmail.co.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Enteng Tarihoran', 'N', 'patient', 'Gg. Basoka No. 991, Administrasi Jakarta Barat 77087, Pabar', 'nJ2EYkQ4RRYMoeaDh1J6gaMEg1N8AuWIoMy0V26lGjwaUS9n3Nbo5uEXXXvJ', '2022-07-05 01:49:43', '2022-07-05 01:49:43', NULL),
(9, 'opradana@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Edi Firgantoro', 'N', 'patient', 'Dk. Karel S. Tubun No. 927, Pekalongan 47388, Kepri', 'Sb9ckEcpnB5dMXBOU5xQ', '2022-07-05 01:49:43', '2022-07-05 01:49:43', NULL),
(10, 'ifa.saptono@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Danu Haryanto', 'F', 'patient', 'Kpg. Kyai Gede No. 914, Palu 41332, Kepri', 'MKhBRUuttyWQfj5K16eR', '2022-07-05 01:49:43', '2022-07-05 01:49:43', NULL),
(11, 'xrajata@gmail.co.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Estiawan Wibowo', 'N', 'patient', 'Psr. Adisumarmo No. 830, Mojokerto 17186, NTT', 'Una3IbLMERYIiY7h9BlW', '2022-07-05 01:49:43', '2022-07-05 01:49:43', NULL),
(12, 'lazuardi.zelda@gmail.co.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Saiful Hutasoit', 'M', 'patient', 'Kpg. Basoka No. 451, Palangka Raya 16410, Pabar', '9IHnoRGO9cbtmiiEoUE3', '2022-07-05 01:49:43', '2022-07-05 01:49:43', NULL),
(13, 'laswi11@gmail.co.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ratih Anggraini', 'M', 'patient', 'Dk. Tambak No. 578, Singkawang 28434, Kalteng', 'ovKx6p47kARDLBmyKVXR', '2022-07-05 01:49:43', '2022-07-05 01:49:43', NULL),
(14, 'qastuti@yahoo.co.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Amalia Devi Riyanti S.E.', 'N', 'patient', 'Dk. Pattimura No. 375, Serang 66751, Jateng', 'EBSSkzrEfbIhtIaB9STj', '2022-07-05 01:49:43', '2022-07-05 01:49:43', NULL),
(15, 'paramita.wahyuni@yahoo.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Perkasa Habibi', 'T', 'patient', 'Jr. Teuku Umar No. 466, Administrasi Jakarta Pusat 55416, NTB', 'lSSWZXWaeBnPDMYDitR4', '2022-07-05 01:49:43', '2022-07-05 01:49:43', NULL),
(16, 'legawa07@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Farah Zulaikha Laksmiwati S.T.', 'B', 'patient', 'Jr. Baladewa No. 147, Metro 77317, Malut', 'P6llpO1eOmm8K01CsKbg', '2022-07-05 01:49:43', '2022-07-05 01:49:43', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complaint_appointment_id_foreign` (`appointment_id`);

--
-- Indexes for table `diagnose`
--
ALTER TABLE `diagnose`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diagnose_appointment_id_foreign` (`appointment_id`);

--
-- Indexes for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `medical_histories`
--
ALTER TABLE `medical_histories`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `diagnose`
--
ALTER TABLE `diagnose`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_histories`
--
ALTER TABLE `medical_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `diagnose`
--
ALTER TABLE `diagnose`
  ADD CONSTRAINT `diagnose_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
