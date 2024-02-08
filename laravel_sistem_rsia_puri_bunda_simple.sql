-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 08, 2024 at 07:52 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_sistem_rsud_puri_bunda_simple`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `img`, `name`, `address`, `phone_number`, `email`, `username`, `password`, `deleted_at`, `created_at`, `updated_at`) VALUES
('e01a57c8-8a18-4e80-bdcd-1a553deada5d', NULL, 'admin', 'Admin address', '0976767576567', 'admin@gmail.com', 'admin', '$2y$10$xBmei/RXTXynvz8f9gU7Q.eq2FqybHh21YIIZUq307F41o3peiNsW', NULL, '2024-02-07 05:24:59', '2024-02-07 05:24:59');

-- --------------------------------------------------------

--
-- Table structure for table `change_passwords`
--

CREATE TABLE `change_passwords` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_03_064422_create_admins_table', 1),
(5, '2023_12_07_135559_create_change_passwords_table', 1),
(6, '2024_01_20_081237_create_workers_table', 2),
(7, '2024_02_07_130838_create_occupations_table', 2),
(8, '2024_02_07_131119_create_units_table', 2),
(9, '2024_02_07_131732_create_worker_units_table', 2),
(10, '2024_02_07_131950_create_worker_login_histories_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `occupations`
--

CREATE TABLE `occupations` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `occupations`
--

INSERT INTO `occupations` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
('6e64c0fe-f5aa-4ee8-9454-b34ecb8e2139', 'Jabatan 1', NULL, '2024-02-07 06:12:20', '2024-02-07 06:12:20'),
('fdfa159e-413d-461b-a1ed-5dc7a096bfce', 'Jabatan 2', NULL, '2024-02-07 06:12:32', '2024-02-07 06:12:32');

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
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
('3d8b9d55-d8c2-4f1d-820a-9bc20f1d65b0', 'Unit 2', NULL, '2024-02-07 06:02:32', '2024-02-07 06:02:32'),
('5111f27d-1284-4c85-8e5d-643efe51f9c8', 'Unit 1', NULL, '2024-02-07 06:02:23', '2024-02-07 06:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_occupation_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_occupation_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `join_date` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`id`, `first_occupation_id`, `second_occupation_id`, `img`, `name`, `address`, `phone_number`, `email`, `username`, `password`, `join_date`, `deleted_at`, `created_at`, `updated_at`) VALUES
('00e44a51-57ec-4001-ab8f-87e4a64ddd3c', 'fdfa159e-413d-461b-a1ed-5dc7a096bfce', NULL, NULL, 'Valerie Glover', '84404 Kulas Ports\nCartwrightchester, WV 14858-4181', '786-636-4600', 'prath@monahan.com', 'cvolkman', '$2y$10$NL0HBz08elRj2HgPxzVbUeBZJI3TBH2EQPHvn9n07J9VOeg.K71fe', '2023-02-08', NULL, '2024-02-08 06:19:50', '2024-02-08 06:19:50'),
('1ddddfe8-df64-46a6-aedd-620d2bc70319', 'fdfa159e-413d-461b-a1ed-5dc7a096bfce', NULL, NULL, 'Della Adams', '202 Cydney Wells\nEast Isai, NJ 01130-2907', '+1 (463) 899-8634', 'meghan.langworth@hotmail.com', 'nina92', '$2y$10$9wBxJaE1eguzQFpJx3pwpOHh.md3BdGyOqj8hirFTUwiYVp29coYu', '2023-08-08', NULL, '2024-02-08 06:19:49', '2024-02-08 06:19:49'),
('29276252-0134-4178-91d3-77959cdb0d48', '6e64c0fe-f5aa-4ee8-9454-b34ecb8e2139', NULL, NULL, 'Dayana Schumm III', '198 Block Mills Suite 083\nPort Salvatoreside, MA 68718-2560', '+1-475-925-6805', 'jamie22@yahoo.com', 'doyle.kozey', '$2y$10$4qWZ8ThCsSWnLRN4jemd3eEffwew/iH7HLdOn4nokYF/96BNug0sq', '2023-10-08', NULL, '2024-02-08 06:19:49', '2024-02-08 06:19:49'),
('3c837973-1273-406d-8971-c9d21e302864', 'fdfa159e-413d-461b-a1ed-5dc7a096bfce', NULL, NULL, 'Rico Cronin', '33486 Sister Prairie\nEast Santiago, SD 29299', '442.913.2659', 'jenkins.marcus@littel.info', 'mckenzie.norma', '$2y$10$yuq39oQmBSFmPx70WIlyB.FRM5lxTnMisSR35pbzNp.X/K8mOv7ja', '2023-08-08', NULL, '2024-02-08 06:19:49', '2024-02-08 06:19:49'),
('563f62fb-d3f8-46f4-9074-df1e6beadc48', '6e64c0fe-f5aa-4ee8-9454-b34ecb8e2139', 'fdfa159e-413d-461b-a1ed-5dc7a096bfce', NULL, 'Edward Sanford', '40657 Larkin Inlet\r\nBeattyburgh, ND 50287-3890', '(612) 403-7435', 'mayert.kristofer@flatley.com', 'gerardo.hahn', '$2y$10$dwa6g1wZFCcJQT2PSHC80uDNVCeULeqiRHIL.wKeC.Ycfokh77hGO', '2024-02-08', NULL, '2024-02-08 06:19:49', '2024-02-08 06:28:18'),
('83893a63-ea2a-4dc2-8a48-708052e31cc0', 'fdfa159e-413d-461b-a1ed-5dc7a096bfce', NULL, NULL, 'Beulah Effertz', '748 Myriam Cove\nEverthaven, CT 30815', '+1.854.837.6323', 'rratke@gmail.com', 'else45', '$2y$10$oAyBMi4NCAGFQL90W2nJq.Fy3QRtWvHa.or/MymrjAQCuBAmuJM7.', '2024-02-08', NULL, '2024-02-08 06:19:49', '2024-02-08 06:19:49'),
('94bfb168-6c63-4c7d-bc6b-0ba1a7b4e53f', '6e64c0fe-f5aa-4ee8-9454-b34ecb8e2139', NULL, NULL, 'Mateo Paucek MD', '281 Fernando Mountain\nRashawnbury, PA 30808', '660.545.8651', 'runolfsson.fiona@nicolas.org', 'pfadel', '$2y$10$3WLtI3tcEHHeWyW6s3ep/eWXjrcl1XINGSz/BqS6FkBtla8LLDUj2', '2023-11-08', NULL, '2024-02-08 06:19:50', '2024-02-08 06:19:50'),
('9c5c904c-39ca-4a1a-8432-481708c72562', 'fdfa159e-413d-461b-a1ed-5dc7a096bfce', NULL, NULL, 'Jonathon Nitzsche', '20402 Colton Parkway Suite 488\nMonicaborough, CO 48809', '+1-970-678-2239', 'ybernhard@toy.org', 'umclaughlin', '$2y$10$2Pd38gi5dx9P0bHEFeioZu7yZq8qBUJo6435FpEEk19EtPuCiPFuu', '2023-09-08', NULL, '2024-02-08 06:19:49', '2024-02-08 06:19:49'),
('c7123ddc-8678-4aca-bf8a-9272d6ccce6f', 'fdfa159e-413d-461b-a1ed-5dc7a096bfce', NULL, NULL, 'Lera Ward', '535 Shanon Spur\nFraneckishire, GA 52039', '1-430-569-2139', 'brekke.denis@trantow.biz', 'raleigh28', '$2y$10$3xipOjh9FlVqHw62zXlrZeB30bddcCPh0IVO4ctPJa1jGVjwPtX.i', '2023-12-08', NULL, '2024-02-08 06:19:49', '2024-02-08 06:19:49'),
('cc048474-00e8-4c65-b89e-544eda19fd25', 'fdfa159e-413d-461b-a1ed-5dc7a096bfce', NULL, NULL, 'Prof. Ophelia Terry III', '99477 Jayda Cliffs Suite 293\nBednarhaven, WY 97331', '+1.951.201.4212', 'josue18@mohr.net', 'dusty.blanda', '$2y$10$V9GRpzYktj/5N.AtwezYkurWH0occabZX3iK4b9KZFbymAUCv1uDO', '2024-02-08', NULL, '2024-02-08 06:19:49', '2024-02-08 06:19:49'),
('eceb9ca5-fc8e-4fbc-b7f5-a64b79b219bf', '6e64c0fe-f5aa-4ee8-9454-b34ecb8e2139', 'fdfa159e-413d-461b-a1ed-5dc7a096bfce', '1707377829.jpg', 'karyawan1', 'ghjbnk', '345678', 'karyawan1@gmail.com', 'karyawan1', '$2y$10$7qWaovwNLTO8L.bolIigsuyE43c6q1NVfcPWPGYIf/a9i8hmiGEwq', '2024-02-01', NULL, '2024-02-08 06:37:10', '2024-02-08 06:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `worker_login_histories`
--

CREATE TABLE `worker_login_histories` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `worker_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `worker_login_histories`
--

INSERT INTO `worker_login_histories` (`id`, `worker_id`, `created_at`, `updated_at`) VALUES
('044f3a95-918a-4605-a3b8-e37f012861fb', '83893a63-ea2a-4dc2-8a48-708052e31cc0', '2024-01-26 05:26:55', '2024-01-26 05:26:55'),
('0475baeb-b4a9-4934-ae67-9514c274b1b2', '00e44a51-57ec-4001-ab8f-87e4a64ddd3c', '2024-01-21 05:38:49', '2024-01-21 05:38:49'),
('057811bb-cf59-40ab-932e-462e0fe19ba4', '563f62fb-d3f8-46f4-9074-df1e6beadc48', '2024-01-29 05:37:51', '2024-01-29 05:37:51'),
('05aff791-3539-4d95-8859-8c8bc91298d2', '29276252-0134-4178-91d3-77959cdb0d48', '2024-02-05 05:53:51', '2024-02-05 05:53:51'),
('072cf54f-9bea-4b2f-a661-e1180b11e7da', '29276252-0134-4178-91d3-77959cdb0d48', '2024-01-29 06:15:48', '2024-01-29 06:15:48'),
('07384ecf-95d4-45d7-8c47-0dd9f1c4642b', '1ddddfe8-df64-46a6-aedd-620d2bc70319', '2024-01-21 05:49:48', '2024-01-21 05:49:48'),
('09d1dfc7-34fc-402e-a98a-8ba625054e0c', '83893a63-ea2a-4dc2-8a48-708052e31cc0', '2024-01-29 06:18:48', '2024-01-29 06:18:48'),
('0c04ceb1-e6c2-4df4-9e86-ca6eb2cb5fd0', '1ddddfe8-df64-46a6-aedd-620d2bc70319', '2024-01-23 05:45:51', '2024-01-23 05:45:51'),
('0c8fef31-c150-4621-8f71-2d86ffbdb441', '9c5c904c-39ca-4a1a-8432-481708c72562', '2024-01-31 05:32:55', '2024-01-31 05:32:55'),
('0da02d78-ea0e-4978-be7a-d7ca4aeb8e73', '00e44a51-57ec-4001-ab8f-87e4a64ddd3c', '2024-01-24 06:17:54', '2024-01-24 06:17:54'),
('0e818db9-4298-4ec1-8162-bee556ca317f', '9c5c904c-39ca-4a1a-8432-481708c72562', '2024-02-06 05:49:50', '2024-02-06 05:49:50'),
('0e84ccf2-8703-40c8-b6b4-3782aa007da7', '9c5c904c-39ca-4a1a-8432-481708c72562', '2024-01-23 05:49:55', '2024-01-23 05:49:55'),
('12f98f0a-7236-4c1b-818e-addb6c8cc2fc', '29276252-0134-4178-91d3-77959cdb0d48', '2024-01-21 05:59:49', '2024-01-21 05:59:49'),
('136bf033-ea86-46b0-89cf-85a58288273d', 'c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '2024-01-31 05:36:51', '2024-01-31 05:36:51'),
('13c11004-77f0-4e68-94e2-56ee749be9bd', '00e44a51-57ec-4001-ab8f-87e4a64ddd3c', '2024-01-22 05:53:51', '2024-01-22 05:53:51'),
('13ebbc18-d520-4b97-b44e-80aec5ea61ed', '9c5c904c-39ca-4a1a-8432-481708c72562', '2024-01-29 05:43:48', '2024-01-29 05:43:48'),
('1947c6b2-4b86-4368-9835-82c32a79512c', 'c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '2024-01-20 05:44:48', '2024-01-20 05:44:48'),
('1a1f99c9-d627-469f-a94c-7fd446fd19df', '563f62fb-d3f8-46f4-9074-df1e6beadc48', '2024-01-25 06:16:48', '2024-01-25 06:16:48'),
('1c17da3b-8b39-4b0e-bf0e-efce17c91142', 'cc048474-00e8-4c65-b89e-544eda19fd25', '2024-01-24 05:41:50', '2024-01-24 05:41:50'),
('1c851d5f-1a32-40ed-80cb-d63420590735', '9c5c904c-39ca-4a1a-8432-481708c72562', '2024-01-30 05:38:50', '2024-01-30 05:38:50'),
('1d48e098-a22c-4c16-b7e4-b7ec839548a8', 'c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '2024-01-25 05:45:54', '2024-01-25 05:45:54'),
('21b7074b-ccc1-4229-a699-8f751ce443a1', '1ddddfe8-df64-46a6-aedd-620d2bc70319', '2024-01-31 06:19:55', '2024-01-31 06:19:55'),
('2235f2f3-8a0b-411d-b6fd-c7dd80769c13', 'c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '2024-02-03 05:38:49', '2024-02-03 05:38:49'),
('225507eb-fa09-44f1-9396-6b7ff8af9d6e', '00e44a51-57ec-4001-ab8f-87e4a64ddd3c', '2024-01-27 05:40:53', '2024-01-27 05:40:53'),
('22590309-48eb-4b3c-b73c-d1a73366d8ca', '29276252-0134-4178-91d3-77959cdb0d48', '2024-01-24 05:54:55', '2024-01-24 05:54:55'),
('225d7049-02fa-4845-8017-e7ad8e46588c', '94bfb168-6c63-4c7d-bc6b-0ba1a7b4e53f', '2024-01-29 06:02:50', '2024-01-29 06:02:50'),
('22ccba81-7511-4d28-b065-e1de457524c8', '3c837973-1273-406d-8971-c9d21e302864', '2024-01-23 05:43:49', '2024-01-23 05:43:49'),
('24cd4701-5516-414f-a6bf-06448d730568', '9c5c904c-39ca-4a1a-8432-481708c72562', '2024-01-21 05:46:52', '2024-01-21 05:46:52'),
('2543b39c-13cd-4439-bd13-b0f27e31b204', '563f62fb-d3f8-46f4-9074-df1e6beadc48', '2024-01-24 06:03:50', '2024-01-24 06:03:50'),
('26a51f9d-d6be-4c27-9487-5d4ef83df909', '83893a63-ea2a-4dc2-8a48-708052e31cc0', '2024-01-27 05:25:48', '2024-01-27 05:25:48'),
('283810f5-af86-440f-96dc-e85b9b273765', 'c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '2024-02-04 05:40:48', '2024-02-04 05:40:48'),
('29eb506f-0e90-4d5b-a0f3-376de61ea77c', '3c837973-1273-406d-8971-c9d21e302864', '2024-02-05 05:32:56', '2024-02-05 05:32:56'),
('2a35e917-14f4-4884-828f-ecc7e934d388', '9c5c904c-39ca-4a1a-8432-481708c72562', '2024-01-19 06:04:52', '2024-01-19 06:04:52'),
('2a767fd6-dccf-4f54-b946-971f5b53463d', '00e44a51-57ec-4001-ab8f-87e4a64ddd3c', '2024-01-19 05:30:50', '2024-01-19 05:30:50'),
('2a7a13b3-a1e7-491a-9cfb-8521270270ca', '29276252-0134-4178-91d3-77959cdb0d48', '2024-02-05 06:18:49', '2024-02-05 06:18:49'),
('2faa0cbd-df6f-482a-85f6-e3ab6fd577c5', '563f62fb-d3f8-46f4-9074-df1e6beadc48', '2024-02-01 05:30:51', '2024-02-01 05:30:51'),
('2fcf12ca-1c42-4608-a9cf-17f0c004ba9c', '3c837973-1273-406d-8971-c9d21e302864', '2024-02-08 05:32:49', '2024-02-08 05:32:49'),
('31679214-e49e-4abd-9a5c-dae3a0ea607b', '94bfb168-6c63-4c7d-bc6b-0ba1a7b4e53f', '2024-02-06 06:04:50', '2024-02-06 06:04:50'),
('3342b832-310a-4cca-a1e7-aff47c9cca28', '563f62fb-d3f8-46f4-9074-df1e6beadc48', '2024-02-06 05:38:51', '2024-02-06 05:38:51'),
('35c280aa-e830-4991-9a8a-66a9cc389e30', '00e44a51-57ec-4001-ab8f-87e4a64ddd3c', '2024-02-06 06:02:49', '2024-02-06 06:02:49'),
('36241080-bd29-40ca-95de-6e60bbf20049', '9c5c904c-39ca-4a1a-8432-481708c72562', '2024-02-06 06:06:48', '2024-02-06 06:06:48'),
('36ba3138-dd19-4935-82ef-622be30d1c84', '00e44a51-57ec-4001-ab8f-87e4a64ddd3c', '2024-01-22 06:16:54', '2024-01-22 06:16:54'),
('371e992e-7a65-4827-8b00-0a6c866290ae', '563f62fb-d3f8-46f4-9074-df1e6beadc48', '2024-01-26 06:17:49', '2024-01-26 06:17:49'),
('38fe241c-6397-4aed-9760-9165980a88bd', '29276252-0134-4178-91d3-77959cdb0d48', '2024-01-29 05:47:50', '2024-01-29 05:47:50'),
('39b01b05-1425-4a79-b939-6a6f4ffe7df7', '29276252-0134-4178-91d3-77959cdb0d48', '2024-01-28 06:09:49', '2024-01-28 06:09:49'),
('3def7e86-8eae-43d5-b64b-c011cc83b67e', '94bfb168-6c63-4c7d-bc6b-0ba1a7b4e53f', '2024-01-28 06:03:48', '2024-01-28 06:03:48'),
('3f977820-a06d-4ea2-b68f-2d3af303b579', 'cc048474-00e8-4c65-b89e-544eda19fd25', '2024-01-19 06:01:51', '2024-01-19 06:01:51'),
('3fb4499a-23a3-497d-a120-5dca1754db73', '29276252-0134-4178-91d3-77959cdb0d48', '2024-02-07 05:55:55', '2024-02-07 05:55:55'),
('434cdcea-8c03-44e3-8ad2-362b4cd038cc', '563f62fb-d3f8-46f4-9074-df1e6beadc48', '2024-01-29 06:04:49', '2024-01-29 06:04:49'),
('4581e2f3-19a6-4e72-9d5f-64063ebbddee', '00e44a51-57ec-4001-ab8f-87e4a64ddd3c', '2024-02-03 05:30:55', '2024-02-03 05:30:55'),
('461d334d-6637-4c18-9d86-1281f930356a', '94bfb168-6c63-4c7d-bc6b-0ba1a7b4e53f', '2024-01-26 05:41:54', '2024-01-26 05:41:54'),
('4693fe84-356b-43a1-88e3-4420772ebe55', '3c837973-1273-406d-8971-c9d21e302864', '2024-01-22 05:42:50', '2024-01-22 05:42:50'),
('47b512a5-ab93-46f6-b310-69bedfe295ba', '9c5c904c-39ca-4a1a-8432-481708c72562', '2024-02-08 05:31:55', '2024-02-08 05:31:55'),
('48b08a27-7a45-4879-a943-d953c63d1aec', 'c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '2024-02-08 06:15:48', '2024-02-08 06:15:48'),
('496eb6ad-720d-44d6-86da-5c84c1c8ee4c', '9c5c904c-39ca-4a1a-8432-481708c72562', '2024-01-23 06:02:54', '2024-01-23 06:02:54'),
('4b917125-c544-449e-b4ef-bcbc3013f071', '00e44a51-57ec-4001-ab8f-87e4a64ddd3c', '2024-01-27 05:26:55', '2024-01-27 05:26:55'),
('4f60604b-2c3f-46be-b35a-ffba303fa917', 'cc048474-00e8-4c65-b89e-544eda19fd25', '2024-01-23 05:35:52', '2024-01-23 05:35:52'),
('5006a2e1-56d7-47c7-87a0-7d7efad63a8b', '29276252-0134-4178-91d3-77959cdb0d48', '2024-01-25 05:51:55', '2024-01-25 05:51:55'),
('5057689a-03ca-468b-b605-30c96d9ff1e6', '29276252-0134-4178-91d3-77959cdb0d48', '2024-01-20 06:03:52', '2024-01-20 06:03:52'),
('509d289c-2b81-42c5-8b36-7a49e5e76fd6', '563f62fb-d3f8-46f4-9074-df1e6beadc48', '2024-02-08 05:26:54', '2024-02-08 05:26:54'),
('51ab1e53-cde6-42b3-a56e-114225edb1fd', '1ddddfe8-df64-46a6-aedd-620d2bc70319', '2024-02-02 05:39:56', '2024-02-02 05:39:56'),
('53a4ef00-5be5-4606-ab65-0b3a789c6adb', '9c5c904c-39ca-4a1a-8432-481708c72562', '2024-01-24 05:40:48', '2024-01-24 05:40:48'),
('54248c5e-315e-4f0d-bbe9-8bd4733c54c4', '83893a63-ea2a-4dc2-8a48-708052e31cc0', '2024-02-05 06:14:48', '2024-02-05 06:14:48'),
('549bff4a-c738-46f0-b51f-559af7a89f02', '1ddddfe8-df64-46a6-aedd-620d2bc70319', '2024-02-02 05:36:49', '2024-02-02 05:36:49'),
('56c598ea-c8f4-4426-9ee7-70183ed3b1b2', 'cc048474-00e8-4c65-b89e-544eda19fd25', '2024-02-07 05:59:55', '2024-02-07 05:59:55'),
('5741e34a-741f-439f-bec0-c0ad3b438278', 'c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '2024-02-04 06:20:50', '2024-02-04 06:20:50'),
('57a01fd7-29d8-4385-ac1a-b70b0c90e833', 'c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '2024-01-30 05:33:49', '2024-01-30 05:33:49'),
('57ab3c3d-2d85-4ff2-bc72-8a6abec99e6f', '1ddddfe8-df64-46a6-aedd-620d2bc70319', '2024-02-03 05:37:49', '2024-02-03 05:37:49'),
('59870144-3806-4774-887a-937b3a4db8ef', '1ddddfe8-df64-46a6-aedd-620d2bc70319', '2024-02-03 05:33:48', '2024-02-03 05:33:48'),
('5a011256-c311-451c-8ea7-85321f129b12', '1ddddfe8-df64-46a6-aedd-620d2bc70319', '2024-01-31 06:00:48', '2024-01-31 06:00:48'),
('5d3c10eb-a068-4dbc-a2ab-67a86195f71f', 'c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '2024-02-08 06:00:50', '2024-02-08 06:00:50'),
('5d5e3cb8-1f8d-4c85-8ad7-330b04c3d1eb', '00e44a51-57ec-4001-ab8f-87e4a64ddd3c', '2024-01-28 05:55:51', '2024-01-28 05:55:51'),
('5e6745e7-bc61-4fbb-8a6e-24ad0ca4b827', '9c5c904c-39ca-4a1a-8432-481708c72562', '2024-01-21 05:43:50', '2024-01-21 05:43:50'),
('5e885419-9ddb-4c3c-ab4c-c32bb46c7a46', '00e44a51-57ec-4001-ab8f-87e4a64ddd3c', '2024-01-20 05:58:49', '2024-01-20 05:58:49'),
('5ec4677c-1321-42e5-9bab-500de6569fdc', '29276252-0134-4178-91d3-77959cdb0d48', '2024-01-27 05:52:49', '2024-01-27 05:52:49'),
('601ce286-99bc-47be-9a7d-852f11e066d0', '94bfb168-6c63-4c7d-bc6b-0ba1a7b4e53f', '2024-01-30 05:27:51', '2024-01-30 05:27:51'),
('63e46e27-15b7-45cd-b930-aaa622e67421', '94bfb168-6c63-4c7d-bc6b-0ba1a7b4e53f', '2024-01-25 06:04:51', '2024-01-25 06:04:51'),
('655db244-ed1d-4b18-ad61-8198a1bd2609', '563f62fb-d3f8-46f4-9074-df1e6beadc48', '2024-01-29 05:40:50', '2024-01-29 05:40:50'),
('687d1b23-82c8-4dd8-a957-3a2cf36eb845', '563f62fb-d3f8-46f4-9074-df1e6beadc48', '2024-01-22 05:40:54', '2024-01-22 05:40:54'),
('69066676-394d-4d8a-9c15-979d32ceb245', '9c5c904c-39ca-4a1a-8432-481708c72562', '2024-01-24 06:07:49', '2024-01-24 06:07:49'),
('69e233e0-eb99-49b4-b746-7c26d35061c4', '9c5c904c-39ca-4a1a-8432-481708c72562', '2024-02-05 05:59:54', '2024-02-05 05:59:54'),
('6c4700b1-96ad-4ce2-a304-0795319b80d3', '9c5c904c-39ca-4a1a-8432-481708c72562', '2024-01-23 05:26:48', '2024-01-23 05:26:48'),
('6d6028a1-c2c9-411e-86d0-c0bc4fae4ca6', '00e44a51-57ec-4001-ab8f-87e4a64ddd3c', '2024-02-06 05:31:48', '2024-02-06 05:31:48'),
('6db4fb79-8881-49af-8593-e18a33eedacf', '563f62fb-d3f8-46f4-9074-df1e6beadc48', '2024-01-21 05:25:52', '2024-01-21 05:25:52'),
('6e537f33-d4e6-437c-a0f6-9cf3df3efa90', 'c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '2024-02-07 05:25:51', '2024-02-07 05:25:51'),
('6e7bc03d-66f7-44e6-89f7-7f78eba78837', '29276252-0134-4178-91d3-77959cdb0d48', '2024-02-07 05:46:52', '2024-02-07 05:46:52'),
('70c749d4-d05e-4b83-b0ad-66593eb298d7', 'c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '2024-02-05 05:30:55', '2024-02-05 05:30:55'),
('7163ccbf-bd92-4686-93bb-746ced876cd8', '94bfb168-6c63-4c7d-bc6b-0ba1a7b4e53f', '2024-01-22 05:38:50', '2024-01-22 05:38:50'),
('7231bf2f-5d86-407c-ae9a-056e215bcce3', '563f62fb-d3f8-46f4-9074-df1e6beadc48', '2024-02-07 05:47:48', '2024-02-07 05:47:48'),
('74b6192d-4882-47fa-b174-bc9d60e1528a', '83893a63-ea2a-4dc2-8a48-708052e31cc0', '2024-01-28 06:19:51', '2024-01-28 06:19:51'),
('750bb9d7-0082-4507-ae81-03bc9a967eb5', 'c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '2024-01-21 05:44:48', '2024-01-21 05:44:48'),
('7525d8da-12be-4387-9bcd-c12c59b3d410', '29276252-0134-4178-91d3-77959cdb0d48', '2024-02-02 05:52:50', '2024-02-02 05:52:50'),
('7729bb8b-ddbe-4b69-865f-5cd7f683ea68', 'cc048474-00e8-4c65-b89e-544eda19fd25', '2024-01-21 05:30:54', '2024-01-21 05:30:54'),
('7811b722-af21-47c6-ad6b-b2100d3007bd', 'c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '2024-01-23 05:31:50', '2024-01-23 05:31:50'),
('786de272-dc2b-448c-9430-2b67231800ad', '00e44a51-57ec-4001-ab8f-87e4a64ddd3c', '2024-02-01 05:55:55', '2024-02-01 05:55:55'),
('7ab018ca-c3a2-42cd-ad8c-d91f09ef53ff', '94bfb168-6c63-4c7d-bc6b-0ba1a7b4e53f', '2024-02-05 05:54:55', '2024-02-05 05:54:55'),
('7b617c87-e351-4265-8274-87e855c009c0', '29276252-0134-4178-91d3-77959cdb0d48', '2024-02-08 05:54:50', '2024-02-08 05:54:50'),
('7f91704c-097f-434c-8d91-818affd33bfd', '3c837973-1273-406d-8971-c9d21e302864', '2024-02-01 05:42:55', '2024-02-01 05:42:55'),
('802326ef-7cab-43a3-84a9-7905d61b4387', '00e44a51-57ec-4001-ab8f-87e4a64ddd3c', '2024-02-06 06:20:49', '2024-02-06 06:20:49'),
('80c7d73a-8bd7-41fb-af7c-8ca0f4e2b88e', '83893a63-ea2a-4dc2-8a48-708052e31cc0', '2024-02-01 06:10:49', '2024-02-01 06:10:49'),
('811fde45-955c-4b29-86f5-0c60db5643a9', 'c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '2024-01-30 06:12:49', '2024-01-30 06:12:49'),
('86245440-1988-4d45-9648-67fb93fcf4af', '29276252-0134-4178-91d3-77959cdb0d48', '2024-01-23 05:56:52', '2024-01-23 05:56:52'),
('8659a602-7c3a-4ba7-a8d1-377b19f00043', '563f62fb-d3f8-46f4-9074-df1e6beadc48', '2024-01-31 06:09:52', '2024-01-31 06:09:52'),
('879b0152-3740-43c1-ab32-a6e5a15b035c', '563f62fb-d3f8-46f4-9074-df1e6beadc48', '2024-01-29 06:01:51', '2024-01-29 06:01:51'),
('8892a5cd-e4ba-4fd5-be5a-52ae6b2fb2ed', '563f62fb-d3f8-46f4-9074-df1e6beadc48', '2024-01-31 06:08:51', '2024-01-31 06:08:51'),
('8c817bd4-de54-43bc-aa85-47cef67e3bfb', '94bfb168-6c63-4c7d-bc6b-0ba1a7b4e53f', '2024-01-24 06:04:54', '2024-01-24 06:04:54'),
('8e5f03ce-6c26-4fa6-8bcb-9896c38c4c4c', '83893a63-ea2a-4dc2-8a48-708052e31cc0', '2024-01-21 05:28:49', '2024-01-21 05:28:49'),
('8e7c6cdb-83cf-4eba-b3b1-63dc918eae68', '1ddddfe8-df64-46a6-aedd-620d2bc70319', '2024-01-21 06:03:54', '2024-01-21 06:03:54'),
('8e878bce-4d44-4537-87b7-42b49262a23c', 'c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '2024-01-23 05:42:55', '2024-01-23 05:42:55'),
('8f3fe59b-517a-437e-a608-fc88c52f1332', '563f62fb-d3f8-46f4-9074-df1e6beadc48', '2024-01-31 05:41:53', '2024-01-31 05:41:53'),
('9067cfe1-8fb5-4501-adf4-59adc7334ce0', 'c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '2024-02-06 06:11:55', '2024-02-06 06:11:55'),
('90816c63-ab9a-4530-a90f-bcc03dfec336', '563f62fb-d3f8-46f4-9074-df1e6beadc48', '2024-02-07 05:54:50', '2024-02-07 05:54:50'),
('911ab54a-f970-4f61-b348-b8c9554219ac', 'c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '2024-02-06 06:08:52', '2024-02-06 06:08:52'),
('91d24c05-5094-473c-a34d-23769f8515c1', '83893a63-ea2a-4dc2-8a48-708052e31cc0', '2024-02-04 06:07:52', '2024-02-04 06:07:52'),
('94d3827d-615a-44f6-a056-3b70b970ebdc', 'cc048474-00e8-4c65-b89e-544eda19fd25', '2024-01-30 06:19:53', '2024-01-30 06:19:53'),
('95a12042-d293-4a79-ad36-eb3ef6ec46a4', '83893a63-ea2a-4dc2-8a48-708052e31cc0', '2024-02-01 06:16:50', '2024-02-01 06:16:50'),
('95ddcf75-d946-4b47-9226-e77a44b4bfe3', '563f62fb-d3f8-46f4-9074-df1e6beadc48', '2024-02-01 06:06:52', '2024-02-01 06:06:52'),
('96611a6f-4eb8-474c-83e3-e1f08749af5f', 'cc048474-00e8-4c65-b89e-544eda19fd25', '2024-01-20 06:06:51', '2024-01-20 06:06:51'),
('97c12635-d118-4959-80cc-14dae10c8eb8', '1ddddfe8-df64-46a6-aedd-620d2bc70319', '2024-01-22 05:37:50', '2024-01-22 05:37:50'),
('98d5458e-d0cf-4620-bff3-c101a80fdeae', '29276252-0134-4178-91d3-77959cdb0d48', '2024-01-24 06:11:50', '2024-01-24 06:11:50'),
('9a5dd7d0-7a94-404a-b2c4-8dc46e833cf5', '9c5c904c-39ca-4a1a-8432-481708c72562', '2024-01-21 06:08:48', '2024-01-21 06:08:48'),
('9a9d05d6-91bc-4fb5-876a-85aa65788b80', '29276252-0134-4178-91d3-77959cdb0d48', '2024-02-02 05:47:50', '2024-02-02 05:47:50'),
('9c589e7e-698a-47ca-af04-27c03ddb1eaa', '9c5c904c-39ca-4a1a-8432-481708c72562', '2024-01-22 06:17:48', '2024-01-22 06:17:48'),
('9cdbeaa1-d1ee-43fb-a3e1-b9872005e298', '9c5c904c-39ca-4a1a-8432-481708c72562', '2024-01-21 06:19:50', '2024-01-21 06:19:50'),
('9d8a8bf1-4d04-42a3-8791-5f022c95de9f', '9c5c904c-39ca-4a1a-8432-481708c72562', '2024-01-26 05:51:51', '2024-01-26 05:51:51'),
('9e73ef62-c90c-475d-8538-5b2f61872a9f', '83893a63-ea2a-4dc2-8a48-708052e31cc0', '2024-01-21 06:02:50', '2024-01-21 06:02:50'),
('a5b50d3d-76bd-4f2c-a014-9a59da3389f1', '3c837973-1273-406d-8971-c9d21e302864', '2024-02-03 06:11:56', '2024-02-03 06:11:56'),
('a7e909b3-c040-45eb-8e51-9027f747827f', '1ddddfe8-df64-46a6-aedd-620d2bc70319', '2024-01-30 06:05:56', '2024-01-30 06:05:56'),
('a7f6d626-ec7e-4d14-be10-e19efc1ed0d1', '563f62fb-d3f8-46f4-9074-df1e6beadc48', '2024-01-22 05:53:51', '2024-01-22 05:53:51'),
('a8774d47-4218-4825-9769-a7adf06c8cca', '83893a63-ea2a-4dc2-8a48-708052e31cc0', '2024-01-25 05:38:49', '2024-01-25 05:38:49'),
('a9576aee-cdf8-4c43-9f33-79b34ec347dd', '3c837973-1273-406d-8971-c9d21e302864', '2024-01-30 06:04:48', '2024-01-30 06:04:48'),
('a998f28f-854c-4f97-a181-6f5eeb6dbc53', '3c837973-1273-406d-8971-c9d21e302864', '2024-01-19 06:19:54', '2024-01-19 06:19:54'),
('aa3e639e-ebf0-48e4-b7a3-fd9b878f559a', '29276252-0134-4178-91d3-77959cdb0d48', '2024-01-19 05:38:50', '2024-01-19 05:38:50'),
('aad932c9-fdf8-499a-9d98-b1ca81a89886', '00e44a51-57ec-4001-ab8f-87e4a64ddd3c', '2024-01-19 06:06:54', '2024-01-19 06:06:54'),
('ab2bb621-e6f4-4bcd-b974-6ad73ca5ae6c', '00e44a51-57ec-4001-ab8f-87e4a64ddd3c', '2024-01-24 05:32:54', '2024-01-24 05:32:54'),
('ab7fb8f1-6b0d-413f-bc24-281d7b607127', '29276252-0134-4178-91d3-77959cdb0d48', '2024-02-06 05:32:53', '2024-02-06 05:32:53'),
('ac6bcf07-2257-4d0b-8116-2c93c763a8e8', 'cc048474-00e8-4c65-b89e-544eda19fd25', '2024-01-21 05:34:49', '2024-01-21 05:34:49'),
('acd5b454-0021-4af9-bc81-cbbb12fcfce6', '3c837973-1273-406d-8971-c9d21e302864', '2024-01-29 05:37:51', '2024-01-29 05:37:51'),
('ad1df9a5-61ed-479d-9f1d-84043220fb22', 'cc048474-00e8-4c65-b89e-544eda19fd25', '2024-01-20 05:37:51', '2024-01-20 05:37:51'),
('aea37893-bb62-4403-979e-d8121d870457', 'cc048474-00e8-4c65-b89e-544eda19fd25', '2024-01-29 06:18:55', '2024-01-29 06:18:55'),
('b019aa87-56ed-4ad5-ac78-95cec07727ad', '29276252-0134-4178-91d3-77959cdb0d48', '2024-01-22 05:25:55', '2024-01-22 05:25:55'),
('b0777f75-154e-44e3-a704-7ffa03bea536', '94bfb168-6c63-4c7d-bc6b-0ba1a7b4e53f', '2024-01-25 06:15:48', '2024-01-25 06:15:48'),
('b0f36b9f-7d29-49c1-8c3f-85ac1cb3c45a', 'c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '2024-01-20 05:58:54', '2024-01-20 05:58:54'),
('b31d96e4-0755-4d5e-8f71-ea6512d7b56b', 'c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '2024-01-23 06:07:52', '2024-01-23 06:07:52'),
('b3571095-749c-49d3-9886-9648d5ae9e2e', '29276252-0134-4178-91d3-77959cdb0d48', '2024-02-06 06:18:49', '2024-02-06 06:18:49'),
('b3b220be-639d-4e47-9935-2677d0e66900', '3c837973-1273-406d-8971-c9d21e302864', '2024-01-28 05:42:52', '2024-01-28 05:42:52'),
('b3c3c80f-8489-468f-bdcf-a72a60e2cf9e', '94bfb168-6c63-4c7d-bc6b-0ba1a7b4e53f', '2024-02-04 05:28:49', '2024-02-04 05:28:49'),
('b3f90cc6-52db-473d-94cf-edc0dfcb46af', 'c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '2024-01-19 06:14:48', '2024-01-19 06:14:48'),
('b5ba7e5c-9634-484f-9e49-e345b4890cc1', '29276252-0134-4178-91d3-77959cdb0d48', '2024-01-23 06:14:55', '2024-01-23 06:14:55'),
('b5ff45d2-379b-41b0-b8db-3f82ba3b77da', 'c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '2024-02-04 06:15:49', '2024-02-04 06:15:49'),
('b92b6225-0efc-4aba-91de-863926975d76', '29276252-0134-4178-91d3-77959cdb0d48', '2024-01-28 05:49:49', '2024-01-28 05:49:49'),
('b96777a7-f89c-4bb3-afba-0a127cd34f76', '00e44a51-57ec-4001-ab8f-87e4a64ddd3c', '2024-01-21 05:35:51', '2024-01-21 05:35:51'),
('baaeb81a-9d88-4218-bc66-1921e1f4a869', '9c5c904c-39ca-4a1a-8432-481708c72562', '2024-01-30 05:52:48', '2024-01-30 05:52:48'),
('bb2d2c69-00b5-44b9-8067-a8065dd6af87', '3c837973-1273-406d-8971-c9d21e302864', '2024-02-05 05:33:55', '2024-02-05 05:33:55'),
('bcd7a3c2-15fe-44ea-8c50-ab5fcc4fce63', '83893a63-ea2a-4dc2-8a48-708052e31cc0', '2024-02-01 06:03:50', '2024-02-01 06:03:50'),
('c1cc94c5-18aa-44cf-a7f5-9f691f312dea', '9c5c904c-39ca-4a1a-8432-481708c72562', '2024-01-25 05:48:49', '2024-01-25 05:48:49'),
('c3237fc8-5542-45a9-9819-ee1e4a5b515e', '00e44a51-57ec-4001-ab8f-87e4a64ddd3c', '2024-02-03 06:16:51', '2024-02-03 06:16:51'),
('c3f3bda3-07a8-4724-8724-f64dde6578cd', 'c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '2024-02-03 06:05:51', '2024-02-03 06:05:51'),
('c4b8b3f3-e7bf-4bfb-9852-0ec5cb86c483', 'c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '2024-01-28 05:53:49', '2024-01-28 05:53:49'),
('cc9c9723-9b22-4d11-9871-d6c47b645043', '00e44a51-57ec-4001-ab8f-87e4a64ddd3c', '2024-02-02 06:14:53', '2024-02-02 06:14:53'),
('ce70da3f-e3ca-4741-bd69-a325f4784b41', '563f62fb-d3f8-46f4-9074-df1e6beadc48', '2024-01-25 05:51:55', '2024-01-25 05:51:55'),
('cea401b9-357c-45bb-9f98-34077525a7e3', 'c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '2024-01-26 06:18:49', '2024-01-26 06:18:49'),
('d037de87-f041-4f6b-b1a7-f3a11a97cc7d', 'c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '2024-02-08 05:55:51', '2024-02-08 05:55:51'),
('d05dcb98-3044-4154-93cc-fcf7dced6664', '00e44a51-57ec-4001-ab8f-87e4a64ddd3c', '2024-02-06 05:40:52', '2024-02-06 05:40:52'),
('d1ceacb8-f4be-4080-a1fc-a80855a84cb4', 'cc048474-00e8-4c65-b89e-544eda19fd25', '2024-01-20 05:45:50', '2024-01-20 05:45:50'),
('d2bdc833-825f-4f6c-a8a4-b698e3433951', '94bfb168-6c63-4c7d-bc6b-0ba1a7b4e53f', '2024-02-03 06:00:56', '2024-02-03 06:00:56'),
('d319a5c2-8f41-4139-a6bb-01d7b058381c', '00e44a51-57ec-4001-ab8f-87e4a64ddd3c', '2024-01-28 05:57:48', '2024-01-28 05:57:48'),
('d36a5326-5ab6-4096-b2ec-49e675b771bb', '9c5c904c-39ca-4a1a-8432-481708c72562', '2024-01-21 05:33:49', '2024-01-21 05:33:49'),
('d4c3b801-165e-4224-8881-733a4aab605d', '9c5c904c-39ca-4a1a-8432-481708c72562', '2024-01-30 05:26:55', '2024-01-30 05:26:55'),
('d4d6d5ea-57ef-4a07-9775-a9e1a2bb9ec4', '3c837973-1273-406d-8971-c9d21e302864', '2024-02-06 05:52:56', '2024-02-06 05:52:56'),
('d6f4c919-08ae-4434-8486-81f58a0eed29', '83893a63-ea2a-4dc2-8a48-708052e31cc0', '2024-02-01 06:05:55', '2024-02-01 06:05:55'),
('d71f4d8b-5c8b-4070-8d0c-62eb4082c9f2', '00e44a51-57ec-4001-ab8f-87e4a64ddd3c', '2024-02-03 06:04:48', '2024-02-03 06:04:48'),
('d7c684bb-7188-47a8-a8fe-5ae43b636c03', '563f62fb-d3f8-46f4-9074-df1e6beadc48', '2024-02-04 06:07:55', '2024-02-04 06:07:55'),
('d9ab769e-aa84-4a0b-8668-fb9211b4bc2e', '9c5c904c-39ca-4a1a-8432-481708c72562', '2024-01-26 05:48:49', '2024-01-26 05:48:49'),
('d9eecf17-2248-4bc3-b369-ac1d8fdf15fc', '1ddddfe8-df64-46a6-aedd-620d2bc70319', '2024-01-19 05:59:51', '2024-01-19 05:59:51'),
('dabd1b97-e4e6-4ff7-a0e6-f5fc788155b4', '00e44a51-57ec-4001-ab8f-87e4a64ddd3c', '2024-02-08 06:33:42', '2024-02-08 06:33:42'),
('dac9a8f7-9edb-482d-a9dc-560f632908c3', '00e44a51-57ec-4001-ab8f-87e4a64ddd3c', '2024-02-05 06:20:52', '2024-02-05 06:20:52'),
('db7af3db-4aa3-4943-9dbe-8d966cd78d8b', '3c837973-1273-406d-8971-c9d21e302864', '2024-01-24 06:00:55', '2024-01-24 06:00:55'),
('dcb84453-dbc7-4dcf-af8e-fab5cb4c55f8', '94bfb168-6c63-4c7d-bc6b-0ba1a7b4e53f', '2024-02-05 06:15:52', '2024-02-05 06:15:52'),
('dee48742-0f05-4cc4-9de5-a4eebbcad39d', '1ddddfe8-df64-46a6-aedd-620d2bc70319', '2024-01-23 05:34:50', '2024-01-23 05:34:50'),
('dfe466ee-3a28-4594-8a84-d7c1953129e7', '563f62fb-d3f8-46f4-9074-df1e6beadc48', '2024-02-08 06:06:50', '2024-02-08 06:06:50'),
('e13614c4-c57d-4069-858b-aba60f9e271c', '1ddddfe8-df64-46a6-aedd-620d2bc70319', '2024-02-02 06:08:56', '2024-02-02 06:08:56'),
('e4d814c7-d199-4833-afdf-eabd27bd498e', '29276252-0134-4178-91d3-77959cdb0d48', '2024-02-02 05:32:48', '2024-02-02 05:32:48'),
('e50801a0-db5f-490f-9cc5-e52744134681', '563f62fb-d3f8-46f4-9074-df1e6beadc48', '2024-02-08 06:05:54', '2024-02-08 06:05:54'),
('e7a6a615-e247-48e8-a000-ca55b880d022', '83893a63-ea2a-4dc2-8a48-708052e31cc0', '2024-01-24 05:36:51', '2024-01-24 05:36:51'),
('e95e347e-e8da-41f2-acd6-8ae2aa9e75e3', '29276252-0134-4178-91d3-77959cdb0d48', '2024-02-05 05:30:50', '2024-02-05 05:30:50'),
('ebdc8fd9-6939-415a-80e1-a835ddc457fc', '83893a63-ea2a-4dc2-8a48-708052e31cc0', '2024-01-31 05:56:50', '2024-01-31 05:56:50'),
('edc6e94a-4842-47f4-87d6-8edb60995234', '1ddddfe8-df64-46a6-aedd-620d2bc70319', '2024-01-29 06:10:49', '2024-01-29 06:10:49'),
('ee4dedff-1dfc-4950-8303-168ca1941ca6', '563f62fb-d3f8-46f4-9074-df1e6beadc48', '2024-02-08 05:52:49', '2024-02-08 05:52:49'),
('ef0e9eb6-8e2b-4bf8-93c7-121d11d9eb9e', '94bfb168-6c63-4c7d-bc6b-0ba1a7b4e53f', '2024-02-02 06:00:49', '2024-02-02 06:00:49'),
('ef101387-09fc-4962-9926-9d4bcf78b459', 'c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '2024-01-27 05:40:50', '2024-01-27 05:40:50'),
('ef163985-fa99-49f3-94c8-f957d48ffd1f', '9c5c904c-39ca-4a1a-8432-481708c72562', '2024-01-24 06:15:55', '2024-01-24 06:15:55'),
('ef222bde-37ab-45df-83d5-71998a801731', '00e44a51-57ec-4001-ab8f-87e4a64ddd3c', '2024-02-08 06:18:51', '2024-02-08 06:18:51'),
('efa4892f-50f0-4d31-96f7-f8170e365692', '563f62fb-d3f8-46f4-9074-df1e6beadc48', '2024-01-24 05:50:54', '2024-01-24 05:50:54'),
('f13c6571-80f3-4c80-bf4e-fab17600889d', '29276252-0134-4178-91d3-77959cdb0d48', '2024-01-26 05:47:48', '2024-01-26 05:47:48'),
('f32e5fb9-becc-4384-818c-e957e4e15472', '9c5c904c-39ca-4a1a-8432-481708c72562', '2024-02-02 06:20:50', '2024-02-02 06:20:50'),
('f4648872-ab6c-4af4-9ed5-6728ffe87b76', '1ddddfe8-df64-46a6-aedd-620d2bc70319', '2024-02-08 05:56:48', '2024-02-08 05:56:48'),
('f75ed103-bd4f-4df9-abc6-9e4e1184c72c', 'c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '2024-02-01 06:07:54', '2024-02-01 06:07:54'),
('fcae5d07-a341-4eff-b258-3072f584ad79', '3c837973-1273-406d-8971-c9d21e302864', '2024-01-26 05:32:49', '2024-01-26 05:32:49'),
('fe1c4d50-67f5-43a9-82c6-a0d661d8dfd1', '9c5c904c-39ca-4a1a-8432-481708c72562', '2024-02-04 06:18:54', '2024-02-04 06:18:54'),
('fee84b2c-9116-4dd6-9dae-2cd638d488a2', '00e44a51-57ec-4001-ab8f-87e4a64ddd3c', '2024-02-03 06:20:54', '2024-02-03 06:20:54');

-- --------------------------------------------------------

--
-- Table structure for table `worker_units`
--

CREATE TABLE `worker_units` (
  `worker_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `worker_units`
--

INSERT INTO `worker_units` (`worker_id`, `unit_id`) VALUES
('3c837973-1273-406d-8971-c9d21e302864', '3d8b9d55-d8c2-4f1d-820a-9bc20f1d65b0'),
('c7123ddc-8678-4aca-bf8a-9272d6ccce6f', '5111f27d-1284-4c85-8e5d-643efe51f9c8'),
('cc048474-00e8-4c65-b89e-544eda19fd25', '5111f27d-1284-4c85-8e5d-643efe51f9c8'),
('83893a63-ea2a-4dc2-8a48-708052e31cc0', '5111f27d-1284-4c85-8e5d-643efe51f9c8'),
('9c5c904c-39ca-4a1a-8432-481708c72562', '3d8b9d55-d8c2-4f1d-820a-9bc20f1d65b0'),
('563f62fb-d3f8-46f4-9074-df1e6beadc48', '5111f27d-1284-4c85-8e5d-643efe51f9c8'),
('29276252-0134-4178-91d3-77959cdb0d48', '5111f27d-1284-4c85-8e5d-643efe51f9c8'),
('1ddddfe8-df64-46a6-aedd-620d2bc70319', '5111f27d-1284-4c85-8e5d-643efe51f9c8'),
('94bfb168-6c63-4c7d-bc6b-0ba1a7b4e53f', '5111f27d-1284-4c85-8e5d-643efe51f9c8'),
('00e44a51-57ec-4001-ab8f-87e4a64ddd3c', '5111f27d-1284-4c85-8e5d-643efe51f9c8'),
('563f62fb-d3f8-46f4-9074-df1e6beadc48', '3d8b9d55-d8c2-4f1d-820a-9bc20f1d65b0'),
('eceb9ca5-fc8e-4fbc-b7f5-a64b79b219bf', '5111f27d-1284-4c85-8e5d-643efe51f9c8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_name_unique` (`name`),
  ADD UNIQUE KEY `admins_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `change_passwords`
--
ALTER TABLE `change_passwords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `change_passwords_email_index` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `occupations`
--
ALTER TABLE `occupations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `occupations_name_unique` (`name`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `units_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `workers_name_unique` (`name`),
  ADD UNIQUE KEY `workers_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `workers_email_unique` (`email`),
  ADD UNIQUE KEY `workers_username_unique` (`username`);

--
-- Indexes for table `worker_login_histories`
--
ALTER TABLE `worker_login_histories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `change_passwords`
--
ALTER TABLE `change_passwords`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
