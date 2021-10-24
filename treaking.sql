-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2021 at 10:11 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `treaking`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `top_heading` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bottom_heading` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `top_heading`, `bottom_heading`, `image`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '#1 MOST LOVED BY EVERYONE', 'Simply The Best', 'sl3_1633677798.jpg', 1, NULL, '2021-10-08 01:35:10', '2021-10-08 01:49:22'),
(2, '#1 MOST LOVED BY EVERYONE', 'Simply The Best', 'sl1_1633678498.jpg', 1, NULL, '2021-10-08 01:49:59', '2021-10-08 01:49:59'),
(3, '#1 MOST LOVED BY EVERYONE', 'Simply The Best', 'sl2_1633678513.jpg', 1, NULL, '2021-10-08 01:50:13', '2021-10-08 01:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_by`, `name`, `image`, `slug`, `description`, `summary`, `title_tag`, `meta_keywords`, `meta_description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nepal', 'chandragiri_1576818750_1633511093.jpeg', 'nepal-2', 'So let try to create a destination of nepal', 'The nepal is most poor country', 'Nepal', 'So let try to create a destination of nepal', 'So let try to create a destination of nepal', NULL, '2021-10-06 01:21:43', '2021-10-06 03:19:53'),
(2, 1, 'Bhutan', 'everest6_1576818654_1633504079.jpg', 'bhutan', 'Bhutan is very poor country', 'Bhutan is very poor country', 'Bhootan', 'Bhutan is very poor country', 'Bhutan', NULL, '2021-10-06 01:22:59', '2021-10-06 01:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_day` double NOT NULL,
  `per_night` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`id`, `created_by`, `title`, `per_day`, `per_night`, `created_at`, `updated_at`) VALUES
(1, 1, 'Adult', 15, 20, '2021-10-08 00:31:14', '2021-10-08 00:31:14'),
(2, 1, 'Child', 12, 45, '2021-10-08 00:32:57', '2021-10-08 00:40:22');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_from` bigint(20) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `category_id`, `created_by`, `name`, `image`, `slug`, `start_from`, `description`, `summary`, `title_tag`, `meta_keywords`, `meta_description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Kathmandu', 'chandragiri_1576818750_1633583581.jpeg', 'kathmandu', 250, 'This is for test', 'This is for test', 'Kathmandu', 'This is for test', 'This is for test', NULL, '2021-10-06 04:45:55', '2021-10-06 23:28:01'),
(2, 2, 1, 'Pokhara', 'everest6_1576818654_1633583560.jpg', 'pokhara', 100, 'This is for test', 'This is for test', 'Pokhara', 'This is for test', 'This is for test', NULL, '2021-10-06 04:47:54', '2021-10-06 23:27:41');

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
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` bigint(20) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `created_by`, `name`, `address`, `contact_no`, `email`, `facebook_link`, `twitter_link`, `designation`, `summary`, `description`, `review`, `slug`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Jenife Paoli', 'Kathmandu', 9805777500, 'sehzadetezz@gmail.com', 'https://www.facebook.com/', 'https://www.twitter.com/', 'Support', 'Integer varius pharetra laoreet. Fusce nec tortor efficitur, eleifend neque sit amet, commodo dolor Nam iaculis', '<p><span style=\"background-color:rgb(255,255,255);color:rgb(117,117,117);\">Integer varius pharetra laoreet. Fusce nec tortor efficitur, eleifend neque sit amet, commodo dolor Nam iaculis</span></p>', 0, 'jenife-paoli-2', 'team1_1633845360.jpg', '2021-10-10 00:23:13', '2021-10-10 00:11:00', '2021-10-10 00:23:13'),
(2, 1, 'John Mathew', 'ktm, nepal', 9805777501, 'dangaura.tejendra.123@gmail.com', 'https://www.facebook.com/', 'https://www.twitter.com/', 'Marketing', 'Integer varius pharetra laoreet. Fusce nec tortor efficitur, eleifend neque sit amet, commodo dolor Nam iaculis', '<p>Integer varius pharetra laoreet. Fusce nec tortor efficitur, eleifend neque sit amet, commodo dolor Nam iaculis</p>', 0, 'john-mathew-2', 'team6_1633845897.jpg', NULL, '2021-10-10 00:14:34', '2021-10-10 00:19:57');

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
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2021_10_05_091847_create_settings_table', 2),
(13, '2021_10_06_054540_create_categories_table', 3),
(14, '2021_10_06_091304_create_destinations_table', 4),
(16, '2021_10_07_052244_create_package_categories_table', 5),
(26, '2021_10_07_073435_create_packages_table', 6),
(27, '2021_10_07_074900_create_thumbnails_table', 6),
(28, '2021_10_08_052625_create_charges_table', 7),
(29, '2021_10_08_063741_create_banners_table', 8),
(33, '2021_10_08_090855_create_members_table', 9),
(34, '2021_10_10_063559_create_pages_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_category_id` int(11) NOT NULL,
  `duration_days` int(11) NOT NULL,
  `duration_nights` int(11) NOT NULL,
  `start_from` bigint(20) NOT NULL,
  `difficulty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trip_overview` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `itinearary` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pricing_plan` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `created_by`, `name`, `slug`, `package_category_id`, `duration_days`, `duration_nights`, `start_from`, `difficulty`, `summary`, `trip_overview`, `itinearary`, `pricing_plan`, `booking`, `thumbnail`, `title_tag`, `meta_keywords`, `meta_description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mountain Climbing', 'mountain-climbing-2', 2, 5, 4, 5000, 'Easy', 'We harvest fresh ideas and deliver uncom intelligent design. We collaborate with atr forward thinking ats clients. Lorem Ipsum passages, and more recently including. Dummy text of the printing and type setting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make', '<p>We harvest fresh ideas and deliver uncom intelligent design. We collaborate with atr forward thinking ats clients. Lorem Ipsum passages, and more recently including. Dummy text of the printing and type setting industry. Lorem Ipsum</p><p>We harvest fresh ideas and deliver uncom intelligent design. We collaborate with atr forward thinking ats clients. Lorem Ipsum passages, and more recently including. Dummy text of the printing and type setting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make</p>', '<p>We harvest fresh ideas and deliver uncom intelligent design. We collaborate with atr forward thinking ats clients. Lorem Ipsum passages, and more recently including. Dummy text of the printing and type setting industry. Lorem Ipsum</p><p>We harvest fresh ideas and deliver uncom intelligent design. We collaborate with atr forward thinking ats clients. Lorem Ipsum passages, and more recently including. Dummy text of the printing and type setting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make</p>', '<p>We harvest fresh ideas and deliver uncom intelligent design. We collaborate with atr forward thinking ats clients. Lorem Ipsum passages, and more recently including. Dummy text of the printing and type setting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><p>We harvest fresh ideas and deliver uncom intelligent design. We collaborate with atr forward thinking ats clients. Lorem Ipsum passages, and more recently including. Dummy text of the printing and type setting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '<p>We harvest fresh ideas and deliver uncom intelligent design. We collaborate with atr forward thinking ats clients. Lorem Ipsum passages, and more recently including. Dummy text of the printing and type setting industry. Lorem Ipsum</p><p>We harvest fresh ideas and deliver uncom intelligent design. We collaborate with atr forward thinking ats clients. Lorem Ipsum passages, and more recently including. Dummy text of the printing and type setting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make</p>', 'p-image2_1633668703.jpg', 'Mountain Climbing', 'We, harvest, fresh, ideas,', 'We harvest fresh ideas and deliver uncom intelligent design. We collaborate with', NULL, '2021-10-07 23:06:43', '2021-10-07 23:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `package_categories`
--

CREATE TABLE `package_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_categories`
--

INSERT INTO `package_categories` (`id`, `category_id`, `created_by`, `name`, `summary`, `description`, `image`, `title_tag`, `meta_keywords`, `meta_description`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Treeking In ABC', 'This is for test', NULL, 'everest6_1576818654_1633591253.jpg', 'Treeking In ABC', ']', NULL, 'treeking-in-abc-2', NULL, '2021-10-07 01:21:05', '2021-10-07 01:36:32'),
(2, 1, 1, 'Site Seeing', 'This is for test', NULL, 'chandragiri_1576818750_1633591866.jpeg', 'Site Seeing', NULL, NULL, 'site-seeing', NULL, '2021-10-07 01:46:06', '2021-10-07 01:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `summary`, `description`, `image`, `title_tag`, `meta_keywords`, `meta_description`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'About Us', NULL, '<p>About Company</p><h2><strong>Worthy time spentaround the world with traveltrek.</strong></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.</p><p>it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'about_1633849877.jpg', 'About Us', 'this is for test', 'About Us', 1, NULL, '2021-10-10 01:26:17', '2021-10-10 01:26:17'),
(2, 'Blog', NULL, NULL, NULL, 'Blog', 'blog', 'blog', 1, NULL, '2021-10-10 01:32:16', '2021-10-10 01:32:16'),
(3, 'Booking', NULL, NULL, NULL, 'booking', 'Booking', 'Booking', 1, NULL, '2021-10-10 01:32:48', '2021-10-10 01:32:48'),
(4, 'Contact Us', NULL, NULL, NULL, 'Contact Us', 'Contact Us', 'Contact Us', 1, NULL, '2021-10-10 01:33:13', '2021-10-10 01:33:13'),
(5, 'FAQ', NULL, NULL, NULL, 'FAQ', 'FAQ', 'FAQ', 1, NULL, '2021-10-10 01:33:40', '2021-10-10 01:33:40');

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
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `close_day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `close_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `toll_free` bigint(20) NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `email`, `address`, `close_day`, `open_time`, `close_time`, `contact_no`, `toll_free`, `logo`, `icon`, `location`, `title_tag`, `summary`, `description`, `meta_keywords`, `meta_description`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Treaking App', 'info@treaking.com', 'Basundhara 2 Kathmandu', 'Saturday', '10:00', '16:00', 9805777500, 978888888888, 'logo_1631521587_1633497165.png', 'logo_1631521587_1633497165.png', 'https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6', 'Home', 'This is for test', 'this is for test', 'This is for test', 'This is for test', 1, '2021-10-05 23:27:45', '2021-10-06 01:18:08');

-- --------------------------------------------------------

--
-- Table structure for table `thumbnails`
--

CREATE TABLE `thumbnails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thumbnails`
--

INSERT INTO `thumbnails` (`id`, `package_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'p-image1_1633668704.jpg', '2021-10-07 23:06:44', NULL),
(2, 1, 'p-image3_1633668704.jpg', '2021-10-07 23:06:44', NULL),
(3, 1, 'p-image4_1633668704.jpg', '2021-10-07 23:06:44', NULL),
(4, 1, 'p-image33_1633668704.jpg', '2021-10-07 23:06:44', NULL),
(5, 1, 'p-image44_1633668704.jpg', '2021-10-07 23:06:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` bigint(20) DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `address`, `contact_no`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tejendra Dangaura', 'dangaura.tejendra.123@gmail.com', NULL, '$2y$10$6D7zv6zRV9GqcCG/lmI8UOAapen5hTJc9Y2PIBoPW0YoNCjss3qhm', 'KTM', 9805777500, 'admin', NULL, '2021-10-05 03:01:02', '2021-10-05 03:01:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_title_tag_unique` (`title_tag`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `charges_title_unique` (`title`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `destinations_name_unique` (`name`),
  ADD UNIQUE KEY `destinations_title_tag_unique` (`title_tag`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `members_contact_no_unique` (`contact_no`),
  ADD UNIQUE KEY `members_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `packages_name_unique` (`name`),
  ADD UNIQUE KEY `packages_title_tag_unique` (`title_tag`);

--
-- Indexes for table `package_categories`
--
ALTER TABLE `package_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `package_categories_name_unique` (`name`),
  ADD UNIQUE KEY `package_categories_title_tag_unique` (`title_tag`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_title_unique` (`title`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_email_unique` (`email`),
  ADD UNIQUE KEY `settings_contact_no_unique` (`contact_no`),
  ADD UNIQUE KEY `settings_toll_free_unique` (`toll_free`);

--
-- Indexes for table `thumbnails`
--
ALTER TABLE `thumbnails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_contact_no_unique` (`contact_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `package_categories`
--
ALTER TABLE `package_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `thumbnails`
--
ALTER TABLE `thumbnails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
