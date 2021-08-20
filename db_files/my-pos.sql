-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2021 at 06:53 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my-pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `ar_name`, `en_name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'الكترونيات', 'electronics', NULL, '2021-08-19 21:04:07', '2021-08-19 21:04:07'),
(3, 'موبايلات', 'phones', NULL, '2021-08-19 21:19:11', '2021-08-19 21:19:11'),
(4, 'هاواوي', 'hawaii', 3, '2021-08-19 21:20:10', '2021-08-19 21:20:10'),
(5, 'شاومي', 'xiaomi', 3, '2021-08-19 21:21:12', '2021-08-19 21:21:12'),
(6, 'مستحضرات تجميل', 'makeup', NULL, '2021-08-19 21:22:31', '2021-08-19 21:22:31'),
(7, 'تليفزيونات', 'TV', 1, '2021-08-19 21:23:26', '2021-08-19 21:30:49'),
(8, 'لابتوب', 'lap top', NULL, '2021-08-19 23:01:17', '2021-08-19 23:01:17'),
(9, 'اتش بي', 'Hp', 8, '2021-08-19 23:02:11', '2021-08-19 23:02:11'),
(10, 'ديل', 'Dell', 8, '2021-08-19 23:05:28', '2021-08-19 23:05:28'),
(11, 'لينوفو', 'Lenovo', 8, '2021-08-19 23:05:58', '2021-08-19 23:05:58'),
(12, 'ثلاجات', 'refrigerators', 1, '2021-08-19 23:50:53', '2021-08-19 23:50:53');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'ahmed mahmoud', '[\"01020304050\",\"0030405050\"]', 'cairo', '2021-08-19 22:56:48', '2021-08-19 22:56:48'),
(2, 'Allaa Mohamed', '[\"020202020\"]', 'tanta', '2021-08-19 23:07:12', '2021-08-19 23:07:12'),
(3, 'omr gamal', '[\"0101010103030\"]', 'alex', '2021-08-19 23:07:34', '2021-08-19 23:07:34'),
(4, 'shahd eszzat', '[\"0102043040\"]', 'fayiom', '2021-08-19 23:09:08', '2021-08-19 23:09:08'),
(5, 'mohamed eissa', '[\"01030405060600\",\"00040500660\"]', 'kafr', '2021-08-19 23:09:31', '2021-08-20 02:31:48'),
(6, 'ali ahmed', '[\"0000060600606\"]', 'gizza', '2021-08-19 23:09:50', '2021-08-19 23:09:58');

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
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_resets_table', 1),
(21, '2019_08_19_000000_create_failed_jobs_table', 1),
(22, '2021_08_13_092402_laratrust_setup_tables', 1),
(23, '2021_08_15_081136_create_categories_table', 1),
(24, '2021_08_16_212631_create_products_table', 1),
(25, '2021_08_17_095742_create_customers_table', 1),
(26, '2021_08_18_073532_create_orders_table', 1),
(27, '2021_08_18_073634_product_order', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1, 2400.00, '2021-07-19 22:58:09', '2021-08-19 22:58:09'),
(2, 6, 8200.00, '2021-01-19 23:53:43', '2021-08-19 23:54:26'),
(3, 2, 12600.00, '2021-05-19 23:55:54', '2021-08-19 23:55:54'),
(4, 4, 8950.00, '2021-02-20 00:58:44', '2021-08-20 00:58:45'),
(5, 3, 7600.00, '2021-03-20 00:59:02', '2021-08-20 00:59:02'),
(6, 2, 10500.00, '2021-04-20 00:59:16', '2021-08-20 00:59:16'),
(7, 1, 10500.00, '2021-06-20 00:59:31', '2021-08-20 00:59:31'),
(8, 5, 7200.00, '2021-08-20 01:01:08', '2021-08-20 01:01:08'),
(9, 3, 23400.00, '2021-08-20 01:33:29', '2021-08-20 01:33:30'),
(10, 6, 8950.00, '2021-08-20 02:33:10', '2021-08-20 02:33:10'),
(11, 6, 12600.00, '2021-08-20 02:45:29', '2021-08-20 02:46:08');

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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2021-08-19 21:03:16', '2021-08-19 21:03:16'),
(2, 'users-read', 'Read Users', 'Read Users', '2021-08-19 21:03:16', '2021-08-19 21:03:16'),
(3, 'users-update', 'Update Users', 'Update Users', '2021-08-19 21:03:17', '2021-08-19 21:03:17'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2021-08-19 21:03:17', '2021-08-19 21:03:17'),
(5, 'products-create', 'Create Products', 'Create Products', '2021-08-19 21:03:17', '2021-08-19 21:03:17'),
(6, 'products-read', 'Read Products', 'Read Products', '2021-08-19 21:03:17', '2021-08-19 21:03:17'),
(7, 'products-update', 'Update Products', 'Update Products', '2021-08-19 21:03:17', '2021-08-19 21:03:17'),
(8, 'products-delete', 'Delete Products', 'Delete Products', '2021-08-19 21:03:17', '2021-08-19 21:03:17'),
(9, 'customers-create', 'Create Customers', 'Create Customers', '2021-08-19 21:03:17', '2021-08-19 21:03:17'),
(10, 'customers-read', 'Read Customers', 'Read Customers', '2021-08-19 21:03:17', '2021-08-19 21:03:17'),
(11, 'customers-update', 'Update Customers', 'Update Customers', '2021-08-19 21:03:17', '2021-08-19 21:03:17'),
(12, 'customers-delete', 'Delete Customers', 'Delete Customers', '2021-08-19 21:03:17', '2021-08-19 21:03:17'),
(13, 'orders-create', 'Create Orders', 'Create Orders', '2021-08-19 21:03:17', '2021-08-19 21:03:17'),
(14, 'orders-read', 'Read Orders', 'Read Orders', '2021-08-19 21:03:17', '2021-08-19 21:03:17'),
(15, 'orders-update', 'Update Orders', 'Update Orders', '2021-08-19 21:03:17', '2021-08-19 21:03:17'),
(16, 'orders-delete', 'Delete Orders', 'Delete Orders', '2021-08-19 21:03:17', '2021-08-19 21:03:17'),
(17, 'categories-create', 'Create Categories', 'Create Categories', '2021-08-19 21:03:17', '2021-08-19 21:03:17'),
(18, 'categories-read', 'Read Categories', 'Read Categories', '2021-08-19 21:03:17', '2021-08-19 21:03:17'),
(19, 'categories-update', 'Update Categories', 'Update Categories', '2021-08-19 21:03:17', '2021-08-19 21:03:17'),
(20, 'categories-delete', 'Delete Categories', 'Delete Categories', '2021-08-19 21:03:17', '2021-08-19 21:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_user`
--

INSERT INTO `permission_user` (`permission_id`, `user_id`, `user_type`) VALUES
(2, 2, 'App\\Models\\User'),
(5, 2, 'App\\Models\\User'),
(6, 2, 'App\\Models\\User'),
(10, 2, 'App\\Models\\User'),
(14, 2, 'App\\Models\\User'),
(17, 2, 'App\\Models\\User'),
(18, 2, 'App\\Models\\User'),
(2, 3, 'App\\Models\\User'),
(5, 3, 'App\\Models\\User'),
(6, 3, 'App\\Models\\User'),
(7, 3, 'App\\Models\\User'),
(10, 3, 'App\\Models\\User'),
(14, 3, 'App\\Models\\User'),
(18, 3, 'App\\Models\\User'),
(2, 4, 'App\\Models\\User'),
(6, 4, 'App\\Models\\User'),
(10, 4, 'App\\Models\\User'),
(14, 4, 'App\\Models\\User'),
(18, 4, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `ar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchese_price` double(8,2) NOT NULL,
  `sale_price` double(8,2) NOT NULL,
  `stock` double(8,2) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `ar_name`, `en_name`, `ar_description`, `en_description`, `purchese_price`, `sale_price`, `stock`, `image`, `created_at`, `updated_at`) VALUES
(1, 4, 'هواوي y9', 'hawaii y9', '<p>هواوي y9</p>', '<p>hawaii y9</p>', 2050.00, 2400.00, 96.00, 'b8slQV2xaPOhxVRwLq5HsqQp1f9v1Dks0GWyTNBS.jpg', '2021-08-19 22:52:52', '2021-08-20 02:33:10'),
(2, 5, 'شاومي مي 9 تي', 'Xiaomi mi9t', '<p>شاومي مي 9 تي</p>', '<p>Xiaomi mi9t</p>', 5000.00, 5200.00, 99.00, 'Z6JOB6pEeXl2uhCMJwsCdoEUCu845RoERFiamHDW.jpg', '2021-08-19 23:00:18', '2021-08-20 00:59:02'),
(3, 10, 'ديل 102', 'Dell 102', '<p>ديل 102</p>', '<p>Dell 102</p>', 10000.00, 10500.00, 97.00, 'ouNnkwa9S2twpuzsPXq8mcSHaFrn6zLjK1MedHfv.jpg', '2021-08-19 23:11:54', '2021-08-20 01:33:30'),
(4, 11, 'لينوفو 23', 'lenovo 23', '<p>لينوفو 23</p>', '<p>lenovo 23</p>', 12000.00, 12900.00, 99.00, '25Xi4G1Ct2SPO60F4Uh30wzeHBWwKXUn2YZPAabr.png', '2021-08-19 23:13:15', '2021-08-20 01:33:30'),
(5, 5, 'شاومي نوت 10', 'Xiaomi Not 10', '<p>شاومي نوت 10</p>', '<p>Xiaomi Not 10</p>', 7000.00, 7200.00, 99.00, 'ESRCXTr3pA5I46nEK5LpuiExljffAshR2sPwbmmS.jpg', '2021-08-19 23:14:40', '2021-08-20 01:01:08'),
(6, 4, 'هواوي y10', 'hawaii y10', '<p>هواوي y10</p>', '<p>hawaii y10</p>', 6000.00, 6550.00, 98.00, 'uBuLzAcsSj00plkVaf5lGnG39fIZftr6aK4v4zap.jpg', '2021-08-19 23:16:14', '2021-08-20 02:33:10'),
(7, 12, 'توشيبا 2021', 'toshiba 2021', '<p>توشيبا 2021</p>', '<p>toshiba 2021</p>', 8000.00, 8200.00, 97.00, 'L5313zDDTJQ5ywYp4QRVn6qSCHXqFQRsZyteON7P.jpg', '2021-08-19 23:52:36', '2021-08-20 02:45:29'),
(8, 7, 'شارب 2021', 'sharp 2021', '<p>شارب 2021</p>', '<p>sharp 2021</p>', 12000.00, 12600.00, 98.00, '94yXNcwman4wVcI8kPdyeiMovTmp1MyAf3lPgATp.jpg', '2021-08-19 23:55:35', '2021-08-20 02:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`id`, `product_id`, `order_id`, `quantity`) VALUES
(1, 1, 1, 1),
(2, 7, 2, 1),
(3, 8, 3, 1),
(4, 6, 4, 1),
(5, 1, 4, 1),
(6, 2, 5, 1),
(7, 1, 5, 1),
(8, 3, 6, 1),
(9, 3, 7, 1),
(10, 5, 8, 1),
(11, 3, 9, 1),
(12, 4, 9, 1),
(13, 6, 10, 1),
(14, 1, 10, 1),
(15, 8, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'Super Admin', 'Super Admin', '2021-08-19 21:03:16', '2021-08-19 21:03:16'),
(2, 'admin', 'Admin', 'Admin', '2021-08-19 21:03:18', '2021-08-19 21:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\User'),
(2, 2, 'App\\Models\\User'),
(2, 3, 'App\\Models\\User'),
(2, 4, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'super', 'admin', 'superadmin@admin.com', 'default.png', NULL, '$2y$10$AOiGoQPc3v6oS/G5/Xmk7.uwwfjgm5O8ERTMuQv3FJIgnWfQHqVsW', '02CY9oWuYKW7I6igb40VIGsa5SPcwog4YPk5gxbrDRaBEug3VTHU4M0I3dKs', '2021-08-19 21:03:19', '2021-08-19 21:03:19'),
(2, 'Mahmoud', 'Kamal', 'mohamed@gmail.com', 'UrgFnFlO3XZSSJL6IDC0CdmXI1aFHNs4FprVW05r.jpg', NULL, '$2y$10$rDgIUgbZWOsi4/PrfUd8ge6vsqzGRkC4flGYVkN4zgJySz933KxWK', NULL, '2021-08-20 00:17:08', '2021-08-20 00:17:24'),
(3, 'Emad', 'Essam', 'emad@gmail.com', 'jjyffgZuV049qkZfSJUTDt8Xa4ccYmG7uVuIPaSV.jpg', NULL, '$2y$10$p9gxpv4NkQZbXuDCSLfHk.e.A.WopRGFEDx/dNS0zmqS7wJWTptvm', 'DP1cPr6GkLnLuPkVqQOEo0Tsux4uYqdvS0EnANDCH3gMAKpZ2QggWHi42Pg9', '2021-08-20 01:38:05', '2021-08-20 01:38:06'),
(4, 'mark', 'nabil', 'mark@gmail.com', 'dDgcOyPnmegoWTeBagldbLGBNv2UmMd7MhaiLbv0.jpg', NULL, '$2y$10$eSBNtsp6iQ/uHckJiOaNQOYrMhaHoraNjWXuzKD2GMHdcdJITGo22', NULL, '2021-08-20 01:40:24', '2021-08-20 01:40:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_ar_name_unique` (`ar_name`),
  ADD UNIQUE KEY `categories_en_name_unique` (`en_name`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_order_product_id_foreign` (`product_id`),
  ADD KEY `product_order_order_id_foreign` (`order_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product_order_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_order_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
