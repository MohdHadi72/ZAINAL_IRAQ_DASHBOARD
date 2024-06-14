-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2024 at 12:06 PM
-- Server version: 10.6.17-MariaDB-cll-lve
-- PHP Version: 8.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ZainalDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_ons`
--

CREATE TABLE `add_ons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `projectName` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_ons`
--

INSERT INTO `add_ons` (`id`, `name`, `price`, `detail`, `projectName`, `created_at`, `updated_at`) VALUES
(7, 'Cooler,', '2000', 'Room Tempraure Maintain only', '7', '2024-03-30 00:38:08', '2024-06-11 13:30:52'),
(9, 'Hhh888', '888888', 'Hhhhyyyyyyyyy', '9', '2024-03-30 18:06:50', '2024-03-30 18:07:17'),
(10, 'Hadi Zaidilskdf', '80000099', 'Hjkhjllkkk;;lkjxclgk', '10', '2024-03-30 18:40:06', '2024-04-08 17:20:10'),
(12, 'Hhhhhh', '8888', 'Jkhhh', '14', '2024-04-16 14:10:35', '2024-04-16 14:10:35'),
(13, 'Asdfasd', '73473743', 'Asdfasdfas', '13', '2024-04-16 14:11:26', '2024-04-16 14:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `add_properties`
--

CREATE TABLE `add_properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `houseNo` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_properties`
--

INSERT INTO `add_properties` (`id`, `project`, `location`, `houseNo`, `zone`, `contact`, `detail`, `category`, `created_at`, `updated_at`) VALUES
(1, '9', 'Ruby Cleveland', '12', '[\"sec-5\",\"sec-10\",\"sec-55\"]', '7496154154', 'Esse ipsam officiis', 'apartment', '2023-09-11 13:37:27', '2023-09-11 13:37:27');

-- --------------------------------------------------------

--
-- Table structure for table `add_zones`
--

CREATE TABLE `add_zones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `projectName_id` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_zones`
--

INSERT INTO `add_zones` (`id`, `projectName_id`, `zone`, `created_at`, `updated_at`) VALUES
(9, '2', 'test', '2023-11-17 14:10:03', '2023-11-17 14:10:03'),
(10, '2', 'A', '2024-03-21 00:24:53', '2024-03-30 17:34:38'),
(12, '8', 'test', '2023-11-18 11:12:02', '2023-11-18 11:12:02'),
(13, '7', 'test1', '2023-11-18 11:13:46', '2023-11-19 00:38:24'),
(14, '8', 'check1', '2023-11-19 00:37:04', '2023-11-19 00:37:13'),
(15, '12', 'test2', '2023-11-19 02:03:27', '2023-11-19 02:03:27'),
(16, '12', 'test3', '2023-11-19 02:03:52', '2023-11-19 02:03:52'),
(17, '6', 'A', '2024-02-07 00:38:24', '2024-02-07 00:38:24'),
(18, '6', 'B', '2024-02-07 00:38:42', '2024-02-07 00:38:42'),
(19, '17', 'C', '2024-03-21 00:29:10', '2024-03-21 00:29:10'),
(21, '2', 'test A', '2024-03-21 00:29:58', '2024-03-21 00:29:58'),
(22, '6', 'blovA', '2024-03-30 18:07:43', '2024-03-30 18:07:43'),
(23, '13', 'hluiuh444', '2024-03-30 18:08:56', '2024-03-30 18:08:56'),
(24, '9', 'ds', '2024-03-30 18:09:14', '2024-03-30 18:09:14'),
(26, '6', 'hluiuh444', '2024-03-30 22:04:54', '2024-03-30 22:04:54'),
(27, '24', 'A', '2024-04-01 23:24:07', '2024-04-01 23:24:07'),
(28, '24', 'B', '2024-04-01 23:24:17', '2024-04-01 23:24:17'),
(29, '8', 'blovA', '2024-04-09 01:11:20', '2024-04-09 01:11:20'),
(30, 'Select Project Name', 'karnadfka', '2024-04-09 01:14:47', '2024-04-09 01:14:47'),
(31, '8', 'sdfasdfa', '2024-04-09 01:16:25', '2024-04-09 01:16:25'),
(32, '9', 'asdf', '2024-04-09 01:19:29', '2024-04-09 01:19:29'),
(33, '7', 'asdfasd', '2024-04-09 01:21:03', '2024-04-09 01:21:03'),
(34, '13', 'asdfasdsfasdlfkasdfasld', '2024-04-09 01:21:31', '2024-04-09 01:21:31'),
(35, '2', 'karna', '2024-04-09 02:36:21', '2024-04-09 02:36:21'),
(36, '6', 'kARANasdFASDF', '2024-04-09 04:55:39', '2024-04-09 04:55:39'),
(37, '9', 'SDFASDFASDFASDFAS', '2024-04-09 04:55:57', '2024-04-09 04:55:57'),
(38, '13', 'KARAN JAIN', '2024-04-09 04:56:06', '2024-04-09 04:56:06'),
(39, '13', 'fdfd', '2024-06-13 18:33:17', '2024-06-13 18:33:17'),
(40, '2', 'Haifds', '2024-06-13 18:36:37', '2024-06-13 18:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `auditors`
--

CREATE TABLE `auditors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `houseNumber_id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `projectName` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `addOn` varchar(255) DEFAULT NULL,
  `landSize` varchar(255) DEFAULT NULL,
  `uiid` varchar(255) NOT NULL,
  `area` varchar(255) DEFAULT NULL,
  `housePrice` varchar(255) NOT NULL,
  `totalPrice` varchar(255) NOT NULL,
  `downPayment` varchar(255) DEFAULT NULL,
  `installment` varchar(255) DEFAULT NULL,
  `emi` varchar(255) DEFAULT NULL,
  `fileCreation` varchar(255) NOT NULL,
  `idType` varchar(255) NOT NULL,
  `idNumber` varchar(255) NOT NULL,
  `issueDate` varchar(255) NOT NULL,
  `alternaticePhone` varchar(255) DEFAULT NULL,
  `docs` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auditors`
--

INSERT INTO `auditors` (`id`, `houseNumber_id`, `fname`, `mname`, `lname`, `address`, `phone`, `occupation`, `projectName`, `zone`, `category`, `addOn`, `landSize`, `uiid`, `area`, `housePrice`, `totalPrice`, `downPayment`, `installment`, `emi`, `fileCreation`, `idType`, `idNumber`, `issueDate`, `alternaticePhone`, `docs`, `created_at`, `updated_at`) VALUES
(1, 10, 'Germane', 'Nathaniel', 'Jamalia', 'Ishmael', '6496845965', 'Harper', '2', '[\"sec-58\",\"Tighri Gol Chakr\",\"Kishan Chowk\"]', 'Apartment', 'Add-On', '631', '84646416-zxndbsjhf-djhd1w2', '125', '65656', '283', 'Quas quo officia mag', 'Id aliquid dolorem q', NULL, '1973-12-30', '1', 'Montana', '1974-07-14', NULL, 'Sachin  (3).pdf', '2023-10-21 08:23:06', '2023-10-25 11:43:11'),
(2, 10, 'Yeo', 'Driscoll', 'Garrison', 'Amery', '674645649498', 'Audrey', '2', '[\"sec-58\",\"Tighri Gol Chakr\",\"Kishan Chowk\"]', 'Apartment', '2', '631', '468-134dbdsh-dbjgfs', '125', '464646', '46460', '45', '45', '1,031.4,444,444,444,443', '1975-12-28', 'aadhar', 'Hasad', '1992-05-02', '641964', 'tarun.pdf', '2023-10-21 08:25:52', '2023-10-21 08:25:52'),
(3, 10, 'raza', 'khan', 'malik', 'malik road', '76146652695', 'builder', '2', '[\"sec-58\",\"Tighri Gol Chakr\",\"Kishan Chowk\"]', 'Apartment', '2', '631', '86693ceb-fd84-4ff9-8e5d-ab6028a0d50f', '125', '4566', '15555', '3660', '36', '330.4,166,666,666,667', '2023-10-18', 'identity', 'kjnkh6874', '2023-10-26', NULL, 'ANKIT PIC DOCX.pdf', '2023-10-25 10:03:48', '2023-10-25 10:03:48'),
(4, 10, 'raza', 'khan', 'malik', 'malik road', '76146652695', 'builder', '2', '[\"sec-58\",\"Tighri Gol Chakr\",\"Kishan Chowk\"]', NULL, '2', NULL, 'b5ba79d0-ab19-4a81-b9d0-cc34fef4fec7', NULL, '4566', '15555', '3660', '36', NULL, '2023-10-18', 'identity', 'kjnkh6874', '2023-10-26', NULL, 'ANKIT PIC DOCX.pdf', '2023-10-25 10:07:21', '2023-10-25 10:07:21');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `salesman` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `projectName` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Assigned` text NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `fname`, `mname`, `lname`, `phone`, `salesman`, `address`, `occupation`, `projectName`, `desc`, `created_at`, `updated_at`, `Assigned`, `Status`) VALUES
(72, 'Mohd Hadi', 'Ali', 'Zaidi', '999999999999', 'saif', 'masdkfasdf', 'Asdfasdf', 'starx', 'Hii', '2024-06-11 17:10:50', '2024-06-13 18:40:41', 'saif@gmail.com', 'Admin'),
(74, 'Mohd HAdi', 'Hadi', 'Zaidi', '999999999999', 'Mohd Hadi', 'masdkfasdf', 'Asdfasdf', 'starx', 'Hii', '2024-06-11 17:21:43', '2024-06-11 17:21:43', 'zainaliraq@gmail.com', 'Admin'),
(75, '05025252525', 'Jaat', 'HadierMedhi', '999999999', 'saif', 'jkjkl', 'Lkj', 'Humayutllklkl', 'Hi', '2024-06-11 17:28:59', '2024-06-13 17:31:26', 'mehwarmedhi@hotemale.com', 'Receptionist'),
(77, 'Mohd', 'H', 'Zaidi', '0000000000', 'Mohd Hadi', 'HAdi Zaidi', 'Hadf', 'starx', 'Hii', '2024-06-11 17:38:25', '2024-06-11 17:38:25', 'zainaliraq@gmail.com', 'Admin'),
(79, 'Mohd', 'H', 'Hello', '0000000000', 'saif', 'HAdi Zaidi', 'Helo', 'starx', 'Hii', '2024-06-11 18:02:48', '2024-06-11 18:02:48', 'zainaliraq@gmail.com', 'Admin'),
(80, 'Mohd', NULL, 'Afasdf', '0000000000', 'saif', 'HAdi Zaidi', 'Hadf', 'mahojong', 'Hii', '2024-06-11 18:34:44', '2024-06-11 18:34:44', 'zainaliraq@gmail.com', 'Admin'),
(82, 'Mohd HAdi', 'Sdfa', 'Zaidi', '999999999999', 'saif', 'masdkfasdf', 'Asdfasdf', 'mahakosalya', 'Hii', '2024-06-12 21:40:24', '2024-06-12 21:40:24', 'saif@gmail.com', 'Salesman'),
(83, 'Mosdfs', 'Sdfa', 'Zaidi', '999999999999', 'Mohd Hadi', 'masdkfasdf', 'Fasdf', 'starx', 'Hiigttrrdce', '2024-06-12 22:48:36', '2024-06-12 22:48:36', 'aayaz@gmail.com', 'Receptionist'),
(86, 'Mehwarmedhi', 'Zaid', 'Zaidid', '9999999999', 'saif', 'asd', 'Fasdf', 'Ajnara', 'Hhiiii', '2024-06-12 23:02:34', '2024-06-12 23:02:34', 'zainaliraq@gmail.com', 'Admin'),
(87, 'Aaka', NULL, 'Zaidid', '99999999999', 'Mohd Hadi', 'khatauli', 'Fasdf', 'Humayutllklkl', 'Skjsdfkdlf', '2024-06-12 23:29:35', '2024-06-13 09:23:15', 'saif@gmail.com', 'Receptionist'),
(94, 'Mehwarmzaidi', 'Jaat', 'Ali zaidi', '9090909090', 'Mohd Hadi', 'sarai rasulpur', 'HELLO WORLD', 'Humayutllklkl', 'Huuul', '2024-06-13 17:32:16', '2024-06-13 17:32:36', 'ali00@gmail.com', 'Admin'),
(95, 'ALI zaididi', 'Jaat', 'ZAIDI', '9090909090', 'Mohd Hadi', 'AREAI', 'Hello world', 'mahakosalya', 'Hii new', '2024-06-13 17:57:42', '2024-06-13 20:25:21', 'aayaz@gmail.com', 'Receptionist'),
(96, 'ALI', 'Ali', 'Ali zaidi', '909090909090', '', 'sarai', 'Hiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 'Humayutllklkl', 'Hello world new', '2024-06-13 17:59:18', '2024-06-13 17:59:18', 'mehwarmedhi@hotemale.com', 'Receptionist'),
(98, '05025252525', NULL, 'HadierMedhi', '999999999', NULL, 'jkjkl', 'Lkj', 'Hadi Zaidi', 'Hello world', '2024-06-13 17:51:35', '2024-06-13 17:51:35', 'zainaliraq@gmail.com', 'Admin'),
(99, 'Mohd', 'H', 'Zaidi', '0000000000', NULL, 'HAdi Zaidi', 'Hadf', 'Ajnara', 'Hii', '2024-06-13 17:51:44', '2024-06-13 17:51:44', 'zainaliraq@gmail.com', 'Admin'),
(101, 'Mohd HAdi', 'Sdfa', 'Zaidi', '9999999999', 'saif', 'asdfasdf', 'Asdf', 'mahojong', 'Hii', '2024-06-13 21:40:40', '2024-06-13 21:40:40', 'mehwarmedhi@hotemale.com', 'Receptionist'),
(102, 'Mohd HAdi', 'Hadi', 'Zaidi', '999999999999', 'Mohd Hadi', 'masdkfasdf', 'Sf', 'vinjara', 'F\r\nasdf', '2024-06-13 21:43:25', '2024-06-13 21:43:25', 'zainaliraq@gmail.com', 'Admin'),
(103, 'ALI', 'Jaat', 'ZAIDI', '00090909009', 'saif', 'sarai rasulpur', 'Hello world', 'Ajnara', 'Kk', '2024-06-13 21:50:43', '2024-06-13 21:54:31', 'aayaz@gmail.com', 'Receptionist'),
(104, 'ALI', 'Ali', 'J', '00090909009', 'Mohd Hadi', 'sarai', 'Hello world', 'Raihana Housing Complex', 'Dkl', '2024-06-13 21:54:22', '2024-06-13 21:54:22', 'aayaz@gmail.com', 'Receptionist'),
(105, 'Mehwarmzaidi', NULL, 'Ali zaidi', '90909090909', 'Mohd Hadi', 'AREAI', 'Hiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 'Ajnara', 'K', '2024-06-13 21:55:32', '2024-06-13 21:55:32', 'aayaz@gmail.com', 'Receptionist'),
(106, 'Mohd HAdi', NULL, 'Fasdfad', '999999999999', NULL, 'masdkfasdf', 'Asdfa', 'vinjara', 'Adfasd', '2024-06-13 22:00:07', '2024-06-13 22:00:07', 'zainaliraq@gmail.com', 'Admin'),
(107, 'Aakash', NULL, 'Ali zaidi', '9090909090', 'Mohd Hadi', 'AREAI', 'Hello world', 'Hadi Zaidi', 'K', '2024-06-13 22:01:45', '2024-06-13 22:01:45', 'aayaz@gmail.com', 'Receptionist'),
(108, 'Sd', NULL, 'S', '90909090909', NULL, 'sdf', 'Sd', 'Ajnara', 'Sf', '2024-06-13 22:02:05', '2024-06-13 22:02:05', 'aayaz@gmail.com', 'Receptionist'),
(109, 'Ali000000000000000000', 'Jaat', 'ZAIDI', '00090909009', 'Mohd Hadi', 'sarai rasulpur', 'HELLO WORLD', 'Test Project SuperNova', 'Sdf', '2024-06-13 22:02:58', '2024-06-13 22:06:50', 'aayaz@gmail.com', 'Receptionist');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(5, '2023_08_19_090725_create_permission_tables', 1),
(6, '2023_08_19_090942_create_products_table', 2),
(7, '2023_08_22_154332_create_enquiries_table', 3),
(8, '2023_09_08_162547_create_add_ons_table', 4),
(9, '2023_09_11_184730_create_add_properties_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 46),
(1, 'App\\Models\\User', 50),
(2, 'App\\Models\\User', 48),
(2, 'App\\Models\\User', 49),
(3, 'App\\Models\\User', 40),
(3, 'App\\Models\\User', 44),
(4, 'App\\Models\\User', 47);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mohdhadi440@gmail.com', '$2y$10$PXrW/EB2l3hFtdPy7kaMDexRsXZ2sTxKcrZu4yaBPKBiCMMY7y8xC', '2024-03-30 18:26:21'),
('pankajpal197@gmail.com', '$2y$10$mvnaITLizqTpfHg/yxndgeninz1Y.hXnhLpBcqXO0UodyxKAEP04m', '2024-01-07 00:12:42'),
('Senorita@gmail.com', '$2y$10$.UWfC59j/oM7XdQ8WhVTLuwPNAy9Aw4HDTMK.xTOp4.c3lsLojPZ.', '2024-01-06 22:53:11'),
('zainaliraq@gmail.com', '$2y$10$pU4WJ75Yn66oHeQBiipgI.juJ31JN2lMHhzyA30YfCWvDTV8XzHUu', '2023-09-11 12:30:22');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2023-08-19 03:58:04', '2023-08-19 03:58:04'),
(2, 'role-create', 'web', '2023-08-19 03:58:04', '2023-08-19 03:58:04'),
(3, 'role-edit', 'web', '2023-08-19 03:58:04', '2023-08-19 03:58:04'),
(4, 'role-delete', 'web', '2023-08-19 03:58:04', '2023-08-19 03:58:04'),
(5, 'product-list', 'web', '2023-08-19 03:58:04', '2023-08-19 03:58:04'),
(6, 'product-create', 'web', '2023-08-19 03:58:04', '2023-08-19 03:58:04'),
(7, 'product-edit', 'web', '2023-08-19 03:58:04', '2023-08-19 03:58:04'),
(8, 'product-delete', 'web', '2023-08-19 03:58:04', '2023-08-19 03:58:04'),
(9, 'enquiry-list', 'web', '2023-09-05 17:04:05', '2023-09-05 17:04:05'),
(10, 'enquiry-create', 'web', '2023-09-05 17:04:05', '2023-09-05 17:04:05'),
(11, 'enquiry-edit', 'web', '2023-09-05 17:05:31', '2023-09-05 17:05:31'),
(12, 'enquiry-delete', 'web', '2023-09-05 17:05:31', '2023-09-05 17:05:31'),
(13, 'addon-list', 'web', '2023-10-31 05:23:36', '2023-10-31 05:23:36'),
(14, 'addon-create', 'web', '2023-10-31 05:23:36', '2023-10-31 05:23:36'),
(15, 'addOn-edit', 'web', '2023-10-31 05:26:05', '2023-10-31 05:26:05'),
(16, 'addOn-delete', 'web', '2023-10-31 05:26:05', '2023-10-31 05:26:05'),
(17, 'user-list', 'web', '2023-10-31 05:35:19', '2023-10-31 05:35:19'),
(18, 'user-create', 'web', '2023-10-31 05:35:19', '2023-10-31 05:35:19'),
(19, 'user-edit', 'web', '2023-10-31 05:36:34', '2023-10-31 05:36:34'),
(20, 'user-delete', 'web', NULL, NULL),
(21, 'project-list', 'web', '2023-10-31 06:04:20', '2023-10-31 06:04:20'),
(22, 'project-create', 'web', '2023-10-31 06:04:20', '2023-10-31 06:04:20'),
(23, 'project-edit', 'web', '2023-10-31 06:05:33', '2023-10-31 06:05:33'),
(24, 'project-delete', 'web', '2023-10-31 06:05:33', '2023-10-31 06:05:33'),
(25, 'salesman-list', 'web', '2023-10-31 06:11:57', '2023-10-31 06:11:57'),
(26, 'salesman-create', 'web', '2023-10-31 06:11:57', '2023-10-31 06:11:57'),
(27, 'salesman-edit', 'web', '2023-10-31 06:13:21', '2023-10-31 06:13:21'),
(28, 'salesman-delete', 'web', '2023-10-31 06:13:21', '2023-10-31 06:13:21'),
(30, 'auditor-list', 'web', '2023-10-31 06:18:16', '2023-10-31 06:18:16'),
(31, 'auditor-create', 'web', '2023-10-31 06:18:16', '2023-10-31 06:18:16'),
(32, 'auditor-edit', 'web', '2023-10-31 06:18:57', '2023-10-31 06:18:57'),
(33, 'auditor-delete', 'web', '2023-10-31 06:18:57', '2023-10-31 06:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `projectName_id` bigint(20) UNSIGNED NOT NULL,
  `zone` varchar(255) NOT NULL,
  `houseNumber` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `downPayment` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `landSize` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `totalAmount` varchar(255) DEFAULT NULL,
  `intrestRate` varchar(255) DEFAULT NULL,
  `monthTime` varchar(255) DEFAULT NULL,
  `totalPayment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `projectName_id`, `zone`, `houseNumber`, `category`, `downPayment`, `price`, `landSize`, `area`, `totalAmount`, `intrestRate`, `monthTime`, `totalPayment`, `created_at`, `updated_at`) VALUES
(24, 13, '23', 'Jk 20', 'SDFASD', '4500', '23', '99', 'ASDFASDFASDFASDF', '23000', NULL, '3', '15000', '2024-04-09 15:50:58', '2024-04-25 17:05:34'),
(25, 6, '18', '8787huh\\', 'SDFASD', '8898', '878888', '99', 'jhhh88', NULL, NULL, NULL, NULL, '2024-04-16 14:05:30', '2024-04-16 14:05:30'),
(26, 2, '9', '777777', 'jjjjjjjjjj', '4565', '9876', '56', 'kjhhhutfr', NULL, NULL, NULL, NULL, '2024-04-16 14:07:03', '2024-04-16 14:07:03'),
(27, 8, '12', '7685', 'ed', '888', '78634', '34d', 'adfadsfa', NULL, NULL, NULL, NULL, '2024-04-16 14:08:02', '2024-04-16 14:08:02'),
(28, 8, '12', 'asdfasdfasdfasdfa', 'sdfa', 'adfasdfas234', '23434', 'adsfasd', 'adsfasdf', '3434', NULL, '3', '4567', '2024-04-16 14:08:41', '2024-04-16 14:08:41');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `addOn` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `location`, `phone`, `email`, `addOn`, `created_at`, `updated_at`) VALUES
(2, 'Gour City', 'Gr.Noida', '4774945498', 'gaurcity@gmail.com', 'test', '2023-10-03 14:19:44', '2023-10-03 14:19:44'),
(6, 'mahojong', 'Noida', '4649446465', 'maha@gmail.com', 'test', '2023-10-04 13:57:23', '2023-10-04 13:57:23'),
(7, 'Ajnara', 'noida', '546494949', 'aj@gmail.com', '\"2\"', '2023-10-05 13:11:14', '2023-10-05 13:11:14'),
(8, 'starx', 'Gr.noida', '68744646649', 'start@star.com', '[\"1\",\"2\"]', '2023-10-05 13:12:58', '2023-10-05 13:12:58'),
(9, 'Ajnara', 'noida', '546494949', 'aj@gmail.com', '[\"1\",\"2\"]', '2023-10-05 13:18:33', '2023-10-05 13:18:33'),
(10, 'vinjara', 'noida', '546494949', 'aj@gmail.com', '[\"1\",\"2\"]', '2023-10-05 13:27:52', '2023-10-05 13:27:52'),
(12, 'mahakosalya', 'Delhi', '56656516546', 'kc@gmail.com', '[\"2\",\"5\"]', '2023-10-07 19:16:02', '2023-10-07 19:16:37'),
(13, 'Raihana Housing Complex', 'Karbala', '7740024224', 'raihanacomplex@gmail.com', NULL, '2023-10-30 17:45:26', '2023-11-28 01:03:45'),
(14, 'Test Project SuperNova', 'Karbala, Iraq', '1234567890', 'supernova@supernova.com', 'null', '2023-11-11 14:06:15', '2023-11-11 14:06:15'),
(15, 'Humayutllklkl', 'kkjkMustanz', '890890890890', 'rahuliyana@mailinator.comm', '6', '2023-11-19 02:48:49', '2024-03-30 17:55:52'),
(25, 'Mohd Ha', 'asdfa', '2343', 'pankajpal197@gmail.com', NULL, '2024-04-09 05:08:49', '2024-04-09 05:38:59'),
(26, 'Hadi Zaidi', 'ASDas', '1232132', 'HadasdAi@email.com', '10', '2024-04-09 15:46:38', '2024-04-09 15:46:38'),
(27, 'Mohd Hadi', 'Zaidi Hadin Noida', '999999999999', 'kkk@gmail.com', '7', '2024-04-15 18:50:42', '2024-04-15 18:50:42'),
(28, 'new', 'hhhhnhh', '9999999999', 'A@gmail.com', '10', '2024-04-16 14:10:16', '2024-04-16 14:10:16'),
(29, 'Ali', 'Khatauli', '0000000000', 'Karan@gmail.com', '7', '2024-06-13 18:34:37', '2024-06-13 18:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2023-08-19 03:59:33', '2023-08-19 03:59:33'),
(2, 'Receptionist', 'web', '2023-08-25 13:49:14', '2023-08-25 13:49:14'),
(3, 'Salesman', 'web', '2023-08-25 13:50:00', '2023-08-25 13:50:00'),
(4, 'Auditor', 'web', '2023-08-25 13:51:56', '2023-08-25 13:51:56');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 4),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(11, 3),
(12, 1),
(12, 2),
(13, 1),
(13, 4),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(25, 3),
(25, 4),
(26, 1),
(26, 3),
(27, 1),
(27, 3),
(28, 1),
(28, 3),
(30, 1),
(30, 4),
(31, 1),
(31, 4),
(32, 1),
(32, 4),
(33, 1);

-- --------------------------------------------------------

--
-- Table structure for table `salesmen`
--

CREATE TABLE `salesmen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `proviens` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `idNumber` varchar(255) NOT NULL,
  `issueDate` varchar(255) NOT NULL,
  `uiid` varchar(255) NOT NULL,
  `projectName_id` varchar(255) NOT NULL,
  `houseNumber_id` bigint(20) UNSIGNED NOT NULL,
  `zone` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `addOn` varchar(255) DEFAULT NULL,
  `emi` varchar(255) DEFAULT NULL,
  `landSize` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `addOnPrice` varchar(255) DEFAULT NULL,
  `emiAmount` varchar(255) DEFAULT NULL,
  `downPayment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `AuditorData` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salesmen`
--

INSERT INTO `salesmen` (`id`, `fname`, `mname`, `lname`, `proviens`, `address`, `phone`, `occupation`, `idNumber`, `issueDate`, `uiid`, `projectName_id`, `houseNumber_id`, `zone`, `category`, `addOn`, `emi`, `landSize`, `area`, `price`, `addOnPrice`, `emiAmount`, `downPayment`, `created_at`, `updated_at`, `AuditorData`) VALUES
(8, 'Surya', 'Kumar', 'Yadav', 'Heigenic', 'Noida sector 122', '9956748952', 'Teacher', 'Hqw234p', '2024-03-27', '7668351256', '17', 17, '19', 'Good Condition', 'Ac', '36', '333', '250', '2000000', '5000', '55555', '150000', '2024-03-27 02:21:00', '2024-03-27 02:21:00', ''),
(10, 'Alizaidi', 'Aisdi', 'Zaidi', 'Djfajdals', 'lkdslsdk', '939393939', 'Dslkfjsdl', '0982200', '2024-03-14', '8415149178', '6', 14, '17', 'Special', 'Select Addon', '12', '200', '350', '365480', 'NaN', '3100', '50000', '2024-03-30 19:12:38', '2024-03-30 19:12:38', ''),
(11, 'Alizaidi', 'Aisdi', 'Zaidi', 'Djfajdals', 'lkdslsdk', '939393939', 'Dslkfjsdl', '0982200', '2024-03-14', '8415149178', '6', 14, '17', 'Special', 'Select Addon', '12', '200', '350', '365480', 'NaN', '3100', '50000', '2024-03-30 19:13:25', '2024-03-30 19:13:25', ''),
(12, 'Alizaidi', 'Aisdi', 'Zaidi', 'Djfajdals', 'lkdslsdk', '939393939', 'Dslkfjsdl', 'Jh989879788', '2024-02-29', '7385181313', '8', 6, '14', 'sqertr', 'Select Addon', '6', '631', '1250', '6545', 'NaN', '120', '52360', '2024-03-30 19:16:40', '2024-03-30 19:16:40', ''),
(13, 'Anul', 'naqui', 'Abbas', 'Data test', 'Lucknow', '8080808080', 'Driver', 'Test user', '2024-04-02', '8069448447', '24', 19, '27', 'Apartment', NULL, '3', '6310', '3BHK', '500000', NULL, '10000', '20000', '2024-04-01 23:45:24', '2024-04-01 23:45:24', ''),
(14, 'Karan', 'Mohd Handi', 'Kuman', 'Kasdjf', 'srai rasool pur', '0000000000', 'Asdfasdfasd', '394u3', '2024-04-20', '5088453684', '13', 24, '23', 'SDFASD', NULL, '3', '99', 'ASDFASDFASDFASDF', '23', NULL, '23000', '4500', '2024-04-25 17:14:18', '2024-04-25 17:14:18', 'Mohd Hadi Zadi'),
(15, 'Karan', 'Mohd Handi', 'Kuman', 'Sdfas', 'srai rasool pur', '0000000000', 'Asdfasdfasd', '9999', '2024-04-25', '9302000348', '13', 24, '23', 'SDFASD', NULL, '3', '99', 'ASDFASDFASDFASDF', '23', NULL, '23000', '4500', '2024-04-25 17:30:37', '2024-04-25 17:30:37', 'Mohd Hadi Zadi'),
(16, 'Karan', 'Mohd Handi', 'Kuman', 'Sdfas', 'srai rasool pur', '0000000000', 'Asdfasdfasd', '99', '2024-04-27', '8775328011', '13', 24, '23', 'SDFASD', NULL, '3', '99', 'ASDFASDFASDFASDF', '23', NULL, '23000', '4500', '2024-04-25 17:31:58', '2024-04-25 17:31:58', 'Hadi Zaidi'),
(17, 'Karan', 'Mohd Handi', 'Kuman', '32', 'srai rasool pur', '0000000000', 'Asdfasdfasd', '54', '2024-04-09', '8546563290', '13', 24, '23', 'SDFASD', 'Hadi Zaidilskdf', '3', '99', 'ASDFASDFASDFASDF', '23', '80000099', '23000', '4500', '2024-04-26 20:22:01', '2024-04-26 20:23:17', 'Select Auditor'),
(20, 'Mahwar Zaidi', 'Hadi', 'Zaidi', '00909009', 'asdfasdf', '9999999999', 'Asdfasdf', '786786786', '2024-05-17', '2151247269', '13', 24, '23', 'SDFASD', NULL, '3', '99', 'ASDFASDFASDFASDF', '23', NULL, '23000', '4500', '2024-05-31 16:26:16', '2024-05-31 16:26:16', 'Hadi Zaidi');

-- --------------------------------------------------------

--
-- Table structure for table `stage_first_docs`
--

CREATE TABLE `stage_first_docs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `buyerName` varchar(255) NOT NULL,
  `houseNumber` bigint(20) UNSIGNED NOT NULL,
  `dateIssue` varchar(255) NOT NULL,
  `amountNumber` varchar(255) NOT NULL,
  `amountWords` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `product_id` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stage_first_docs`
--

INSERT INTO `stage_first_docs` (`id`, `title`, `buyerName`, `houseNumber`, `dateIssue`, `amountNumber`, `amountWords`, `role`, `deleted_at`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'First House', 'Surya Yadav', 8, '2024-03-27', '2000000', 'Twenty Lakhs Rupees Only', 'Salesman', NULL, 17, '2024-03-29 17:15:29', '2024-03-29 20:21:02'),
(2, 'first stage', 'Alizaidi Zaidi', 11, '2024-03-14', '365480', 'kkkk', 'Salesman', NULL, 14, '2024-03-30 22:06:17', '2024-03-30 22:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `stage_second_docs`
--

CREATE TABLE `stage_second_docs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `houseNumber` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `dateIssue` varchar(255) NOT NULL,
  `workPlace` varchar(255) NOT NULL,
  `buyerName` varchar(255) NOT NULL,
  `alternatePhone` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `priceAddOn` varchar(255) DEFAULT NULL,
  `emiPeriod` varchar(255) DEFAULT NULL,
  `firstInstallment` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `buyersign` varchar(255) NOT NULL,
  `dateIssueFile` varchar(255) NOT NULL,
  `idNumber` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `housePrice` varchar(255) NOT NULL,
  `buildArea` varchar(255) NOT NULL,
  `landArea` varchar(255) NOT NULL,
  `agentsign` varchar(255) NOT NULL,
  `accountantsign` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stage_second_docs`
--

INSERT INTO `stage_second_docs` (`id`, `houseNumber`, `title`, `dateIssue`, `workPlace`, `buyerName`, `alternatePhone`, `phone`, `address`, `priceAddOn`, `emiPeriod`, `firstInstallment`, `role`, `buyersign`, `dateIssueFile`, `idNumber`, `occupation`, `category`, `housePrice`, `buildArea`, `landArea`, `agentsign`, `accountantsign`, `product_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'level-2', '2024-03-27', 'test', 'Surya Yadav', NULL, '9956748952', 'Noida sector 122', '5000', '36', '150000', 'Auditor', 'images/1708186706-pankajp.jpg', '2024-03-29', 'Hqw234p', 'Teacher', 'Good Condition', '2000000', '250', '333', 'images/1708186706-pankajp.jpg', 'images/1708186706-pankajp.jpg', '17', NULL, '2024-03-29 20:00:11', '2024-03-29 20:00:11');

-- --------------------------------------------------------

--
-- Table structure for table `stage_third_docs`
--

CREATE TABLE `stage_third_docs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `houseNumber` bigint(20) UNSIGNED NOT NULL,
  `dateIssue` varchar(255) NOT NULL,
  `workPlace` varchar(255) NOT NULL,
  `buyerName` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `priceAddOn` varchar(255) DEFAULT NULL,
  `emiPeriod` varchar(255) DEFAULT NULL,
  `firstInstallment` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `addOn` varchar(255) DEFAULT NULL,
  `buyersign` varchar(255) NOT NULL,
  `dateIssueFile` varchar(255) NOT NULL,
  `idNumber` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `housePrice` varchar(255) NOT NULL,
  `buildArea` varchar(255) NOT NULL,
  `landArea` varchar(255) NOT NULL,
  `agentsign` varchar(255) NOT NULL,
  `accountantsign` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stage_third_docs`
--

INSERT INTO `stage_third_docs` (`id`, `title`, `houseNumber`, `dateIssue`, `workPlace`, `buyerName`, `phone`, `address`, `priceAddOn`, `emiPeriod`, `firstInstallment`, `zone`, `addOn`, `buyersign`, `dateIssueFile`, `idNumber`, `occupation`, `category`, `housePrice`, `buildArea`, `landArea`, `agentsign`, `accountantsign`, `role`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'level-3', 1, '2024-03-27', 'test', 'Surya Yadav', '9956748952', 'Noida sector 122', NULL, '36', '150000', 'tets', NULL, 'public/images/zAcimkmvc31pkCGfDNfoL966eXtXVELNWukpHR4g.jpg', '2024-03-29', 'Hqw234p', 'Teacher', 'Good Condition', '2000000', '250', '333', 'public/images/Y1f33eoRtg37PmLHqU7pGvRVA1PtUXDy1HjVQqEt.jpg', 'public/images/lnqNBTbsBSuW2gYHxvsOqXvHGKw7kwguuNwYBe2g.jpg', 'Accountant', NULL, '2024-03-29 20:16:48', '2024-03-29 20:16:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'zainal Iraq', 'zainaliraq@gmail.com', NULL, '$2y$10$cHVh/9ss4Lk687sYGO6YxOPAIIriD436gd6Kyk8JJb4eVIUuoBicW', 'rhlXxrf0Tx1T6tIgiwl5HbrIuFZpelXZHV8Lkm6b86RoylL1I2bYeBNMrM8C', '1704529442.jpg', '2023-08-19 03:59:33', '2024-01-06 15:24:02'),
(40, 'saif', 'saif@gmail.com', NULL, '$2y$10$UxB0C7Q4dyzJKIHgW5lnz.fUe4oZqchjd.WEp7J46pxlOfrsATmCa', 'caPROiqEkUM2VFnVWROhvQQYnPZCz6oqAF5oJXMPPaOVlQEJQEGVHIvAtGYe', NULL, '2024-06-08 18:30:35', '2024-06-08 18:30:35'),
(44, 'Mohd Hadi', 'zainaliraq1234@gmail.com', NULL, '$2y$10$OJnML04G4rbLgjE/cALuK.XPVTQprHx68PLiMsR6/jwayg7t7Gcay', 'F6St0zTR4Eh3Hodbm5J6HXJpCHGZvfGwkQiWmYwCkrSiZzLDVeqmhD40T1iN', NULL, '2024-06-09 20:35:34', '2024-06-13 19:02:38'),
(46, 'alizaidi', 'ali00@gmail.com', NULL, '$2y$10$6eT23G.4aZfE5yo0tted4.TQ.htUbRTDsvKSFLRTrvJ2j1tbNFwui', 'zyTFMPRFbIz2NCu2gSNazAQOXzM23DuxTZFKVV26IoDiN7UvbmcoN4u67qQz', NULL, '2024-06-10 01:30:00', '2024-06-10 01:30:00'),
(47, 'alizaidi.', 'alizaidi@GMAIL.COM', NULL, '$2y$10$.96x9aAkXCoGCxkreYmc3.cJ9ZP0AIoHS/EqKbpIHK6oqphLHO5nO', 'K8LAKOCjQx4srvWPKF3mQvRQpcChVi444qk1OItwbbgmC8O9gRW8rcHW7fD9', NULL, '2024-06-10 01:42:38', '2024-06-11 14:11:17'),
(48, 'MehwarMedhi', 'mehwarmedhi@hotemale.com', NULL, '$2y$10$2xucnkW6KCw7myYXjIY8c.GIiiGUIcaqEm.TW1gmAl41iKzOTTxoC', '1mGOqmejxSK5SaeyAZatBsxColOa1a9rvFpNW32qnvQcn3t5JRUSJ9Rc5rLA', NULL, '2024-06-11 16:31:47', '2024-06-11 16:31:47'),
(49, 'ali', 'aayaz@gmail.com', NULL, '$2y$10$pdWO.pmdEd56lHS6lkbI/eviVcpjR6ixaoTIyglSzWKX8F09DRYFO', 'zT1BHGKabOeqMuqvOSVRJZyqgr3b8z0s5XIb0yCPAD62m2QXlYkrEAvGG1gn', NULL, '2024-06-11 17:35:38', '2024-06-11 17:35:38'),
(50, 'ABCD', 'ABCD@GMAIL.COM', NULL, '$2y$10$6Ts9aeTgoUfx4OAVbY4rn.c845i7GpEMWFWwyQlB0jLcxd/K9YpkC', 'd1aLHKbJ0WTVfvqF9Od0rIKe11oYkYvkfnVmRxN8OAQ47Nkd4g8OemhgWtU7', NULL, '2024-06-12 21:46:52', '2024-06-12 21:46:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_ons`
--
ALTER TABLE `add_ons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_properties`
--
ALTER TABLE `add_properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_zones`
--
ALTER TABLE `add_zones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auditors`
--
ALTER TABLE `auditors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auditors_housenumber_id_foreign` (`houseNumber_id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_projectname_foreign` (`projectName_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `salesmen`
--
ALTER TABLE `salesmen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salesmen_housenumber_id_foreign` (`houseNumber_id`);

--
-- Indexes for table `stage_first_docs`
--
ALTER TABLE `stage_first_docs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stage_first_docs_housenumber_unique` (`houseNumber`);

--
-- Indexes for table `stage_second_docs`
--
ALTER TABLE `stage_second_docs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stage_second_docs_housenumber_unique` (`houseNumber`);

--
-- Indexes for table `stage_third_docs`
--
ALTER TABLE `stage_third_docs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stage_third_docs_housenumber_unique` (`houseNumber`);

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
-- AUTO_INCREMENT for table `add_ons`
--
ALTER TABLE `add_ons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `add_properties`
--
ALTER TABLE `add_properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `add_zones`
--
ALTER TABLE `add_zones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `auditors`
--
ALTER TABLE `auditors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `salesmen`
--
ALTER TABLE `salesmen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `stage_first_docs`
--
ALTER TABLE `stage_first_docs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stage_second_docs`
--
ALTER TABLE `stage_second_docs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stage_third_docs`
--
ALTER TABLE `stage_third_docs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stage_first_docs`
--
ALTER TABLE `stage_first_docs`
  ADD CONSTRAINT `stage_first_docs_housenumber_foreign` FOREIGN KEY (`houseNumber`) REFERENCES `salesmen` (`id`);

--
-- Constraints for table `stage_second_docs`
--
ALTER TABLE `stage_second_docs`
  ADD CONSTRAINT `stage_second_docs_housenumber_foreign` FOREIGN KEY (`houseNumber`) REFERENCES `stage_first_docs` (`id`);

--
-- Constraints for table `stage_third_docs`
--
ALTER TABLE `stage_third_docs`
  ADD CONSTRAINT `stage_third_docs_housenumber_foreign` FOREIGN KEY (`houseNumber`) REFERENCES `stage_second_docs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
