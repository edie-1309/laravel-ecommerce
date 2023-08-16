-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 03:29 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `platform_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Racing Games', 'racing-games', '2023-02-02 02:27:03', '2023-02-02 02:27:03'),
(2, 'Action', 'action', '2023-02-02 02:27:12', '2023-02-02 02:27:12'),
(3, 'Adventure', 'adventure', '2023-02-02 02:27:43', '2023-02-02 02:27:43'),
(4, 'Multiplayer', 'multiplayer', '2023-02-02 02:28:22', '2023-02-02 02:28:22'),
(5, 'FPS', 'fps', '2023-02-02 02:28:27', '2023-02-02 02:28:27'),
(6, 'Open World', 'open-world', '2023-02-02 02:45:57', '2023-02-02 02:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 4, NULL, NULL),
(4, 2, 1, NULL, NULL),
(5, 2, 2, NULL, NULL),
(6, 2, 4, NULL, NULL),
(7, 3, 2, NULL, NULL),
(8, 3, 3, NULL, NULL),
(9, 4, 2, NULL, NULL),
(10, 4, 4, NULL, NULL),
(11, 4, 5, NULL, NULL),
(12, 5, 1, NULL, NULL),
(13, 5, 2, NULL, NULL),
(14, 6, 2, NULL, NULL),
(15, 6, 3, NULL, NULL),
(16, 6, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `discount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `discount`, `created_at`, `updated_at`) VALUES
(1, 40, '2023-02-02 02:39:20', '2023-02-02 02:39:20');

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
(5, '2023_01_12_025748_create_roles_table', 1),
(6, '2023_01_14_015900_create_categories_table', 1),
(7, '2023_01_14_021054_create_products_table', 1),
(8, '2023_01_14_022348_add_foreign_role_id_to_users_table_', 1),
(9, '2023_01_14_044120_create_stock_table', 1),
(10, '2023_01_14_135459_create_category_product_table', 1),
(11, '2023_01_18_105445_create_platform_table', 1),
(12, '2023_01_18_131825_create_product_platform', 1),
(13, '2023_01_19_044341_add_foreign_platform_id_to_stock_table', 1),
(14, '2023_01_23_023303_create_cart_table', 1),
(15, '2023_01_26_074955_create_orders_table', 1),
(16, '2023_01_26_075535_create_order_detail_table', 1),
(17, '2023_01_26_090527_add_unique_for_slug_to_orders_table', 1),
(18, '2023_01_28_141842_add_column_to_users_table', 1),
(19, '2023_01_30_090236_add_default_for_user_image_to_users_table', 1),
(20, '2023_01_31_081851_create_discount_table', 1),
(21, '2023_01_31_082345_add_foreign_id_discount_to_products_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `slug`, `user_id`, `payment`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 'lIB5V5433y', 2, 'COD', 1010000, 'Already Received', '2023-02-02 03:58:25', '2023-02-02 04:00:23'),
(2, 'BQJnk4Yx3q', 2, 'COD', 709000, 'On Process', '2023-02-02 04:01:22', '2023-02-02 04:01:22');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `platform_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `platform_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 3, 1, '2023-02-02 03:58:25', '2023-02-02 03:58:25'),
(2, 1, 3, 1, 1, '2023-02-02 03:58:25', '2023-02-02 03:58:25'),
(3, 2, 1, 3, 1, '2023-02-02 04:01:22', '2023-02-02 04:01:22');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `platform`
--

CREATE TABLE `platform` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `platform`
--

INSERT INTO `platform` (`id`, `slug`, `name`, `created_at`, `updated_at`) VALUES
(1, 'playstation-4', 'Playstation 4', '2023-02-02 02:30:04', '2023-02-02 02:30:04'),
(2, 'playstation-5', 'Playstation 5', '2023-02-02 02:30:10', '2023-02-02 02:30:10'),
(3, 'xbox-series-x', 'Xbox Series X', '2023-02-02 02:30:37', '2023-02-02 02:30:37'),
(4, 'xbox-series-s', 'Xbox Series S', '2023-02-02 02:30:48', '2023-02-02 02:30:48');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `discount_id` bigint(20) UNSIGNED DEFAULT NULL,
  `publish_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `price`, `image`, `discount_id`, `publish_at`, `created_at`, `updated_at`) VALUES
(1, 'Forza Horizon 5', 'forza-horizon-5', '<div>&nbsp;Your Ultimate Horizon Adventure awaits! Explore the vibrant open world landscapes of Mexico with limitless, fun driving action in the world’s greatest cars. Blast off to Hot Wheels Park and experience the most extreme tracks ever devised. Requires Forza Horizon 5 game, expansion sold separately.&nbsp;</div>', 699000, 'product-image/beXE3rVyuWQbyNAiCYKnzj4KJp9SIRSyGGuDB4bU.jpg', NULL, NULL, '2023-02-02 02:32:48', '2023-02-02 02:32:48'),
(2, 'Need For Speed', 'need-for-speed', '<div>&nbsp;Ready to own the streets? Get behind the wheel of iconic cars and floor it through Ventura Bay, a sprawling urban playground. Explore overlapping stories as you build your reputation – and your dream car – and become the ultimate racing icon.&nbsp;</div>', 400000, 'product-image/FMGTYb5ahDCKzXSMJQBY6FRbNLzkxh9JlR6cbhy0.jpg', NULL, NULL, '2023-02-02 02:35:41', '2023-02-02 02:35:41'),
(3, 'Death Stranding', 'death-stranding', '<div>From legendary game creator Hideo Kojima comes a genre-defying experience, now expanded in this definitive DIRECTOR’S CUT. As Sam Bridges, your mission is to deliver hope to humanity by connecting the last survivors of a decimated America. Can you reunite the shattered world, one step at a time?&nbsp;</div>', 600000, 'product-image/7GTAymQRfwzrbX9d8jwpdChih5qIgL5DyN2w1rmq.jpg', NULL, NULL, '2023-02-02 02:37:08', '2023-02-02 02:37:08'),
(4, 'Call Of Duty Infinite Warfare', 'call-of-duty-infinite-warfare', '<div>&nbsp;Infinite Warfare delivers three unique game modes: Campaign, Multiplayer, and Zombies.&nbsp;</div>', 300000, 'product-image/m2PBYpsh3etHP2DXOLDvxQIRyn8ViDXava5etgS7.jpg', 1, NULL, '2023-02-02 02:39:10', '2023-02-02 02:39:32'),
(5, 'Need For Speed Unbound', 'need-for-speed-unbound', '<div>Race to the top, definitely don’t flop. Outsmart the cops, and enter weekly qualifiers for The Grand: the ultimate street race. Pack your garage with precision-tuned, custom rides and light up the streets with your style.&nbsp;</div>', 600000, 'product-image/dkvhHTPpzv17HvhkEpYtTnNWDtGCz2db1GqdJr2L.png', NULL, NULL, '2023-02-02 02:41:24', '2023-02-02 02:41:56'),
(6, 'Cyberpunk 2077', 'cyberpunk-2077', '<div>Cyberpunk 2077 is an open-world, action-adventure RPG set in the dark future of Night City — a dangerous megalopolis obsessed with power, glamor, and ceaseless body modification.&nbsp;</div>', 419400, 'product-image/JJL2dGFc4yisCRzJDSszLAFpB53AJJaAJIoyfBrd.jpg', 1, NULL, '2023-02-02 02:47:30', '2023-02-02 02:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `product_platform`
--

CREATE TABLE `product_platform` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `platform_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_platform`
--

INSERT INTO `product_platform` (`id`, `product_id`, `platform_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2023-02-02 02:32:48', '2023-02-02 02:32:48'),
(2, 1, 4, '2023-02-02 02:32:48', '2023-02-02 02:32:48'),
(3, 2, 1, '2023-02-02 02:35:41', '2023-02-02 02:35:41'),
(4, 2, 3, '2023-02-02 02:35:41', '2023-02-02 02:35:41'),
(5, 2, 4, '2023-02-02 02:35:41', '2023-02-02 02:35:41'),
(6, 3, 1, '2023-02-02 02:37:08', '2023-02-02 02:37:08'),
(7, 3, 2, '2023-02-02 02:37:08', '2023-02-02 02:37:08'),
(8, 4, 1, '2023-02-02 02:39:10', '2023-02-02 02:39:10'),
(9, 5, 2, '2023-02-02 02:41:24', '2023-02-02 02:41:24'),
(10, 5, 3, '2023-02-02 02:41:24', '2023-02-02 02:41:24'),
(11, 5, 4, '2023-02-02 02:41:24', '2023-02-02 02:41:24'),
(12, 6, 1, '2023-02-02 02:47:30', '2023-02-02 02:47:30'),
(13, 6, 2, '2023-02-02 02:47:30', '2023-02-02 02:47:30'),
(14, 6, 3, '2023-02-02 02:47:30', '2023-02-02 02:47:30'),
(15, 6, 4, '2023-02-02 02:47:30', '2023-02-02 02:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', NULL, NULL),
(2, 'user', 'User', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `platform_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `product_id`, `stock`, `created_at`, `updated_at`, `platform_id`) VALUES
(1, 1, 10, '2023-02-02 02:33:27', '2023-02-02 02:33:27', 3),
(2, 1, 15, '2023-02-02 02:33:42', '2023-02-02 02:33:53', 4),
(3, 2, 20, '2023-02-02 02:42:46', '2023-02-02 02:42:46', 1),
(4, 2, 4, '2023-02-02 02:42:53', '2023-02-02 03:59:22', 3),
(5, 3, 99, '2023-02-02 02:43:07', '2023-02-02 03:59:22', 1),
(6, 3, 0, '2023-02-02 02:43:14', '2023-02-02 02:43:14', 2),
(7, 4, 20, '2023-02-02 02:43:50', '2023-02-02 02:43:50', 1),
(8, 5, 30, '2023-02-02 02:44:03', '2023-02-02 02:44:03', 2),
(9, 5, 10, '2023-02-02 02:44:10', '2023-02-02 02:44:10', 3),
(10, 5, 0, '2023-02-02 02:44:16', '2023-02-02 02:44:16', 4),
(11, 6, 10, '2023-02-02 02:48:04', '2023-02-02 02:48:04', 1),
(12, 6, 50, '2023-02-02 02:48:12', '2023-02-02 02:48:12', 2),
(13, 6, 5, '2023-02-02 02:48:23', '2023-02-02 02:48:23', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'user_profile/default.png',
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `user_image`, `email`, `phone_number`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `address`) VALUES
(1, 'Administrator', 'admin123', 'user_profile/default.png', 'admin@gmail.com', '0812345678910', NULL, '$2y$10$xIJ883yf4pvp2DtVYbyR0eGOTWzQXLs3ayYnBCejReI8zwnjV2BWq', NULL, '2023-02-01 22:38:55', '2023-02-01 22:38:55', 1, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam perspiciatis dolore iusto ut tempore, cum cumque doloribus ipsum dolor nisi quia assumenda et deserunt eos non laudantium earum voluptatem explicabo?'),
(2, 'User', 'user123', 'user_profile/default.png', 'user@gmail.com', '0812345678910', NULL, '$2y$10$RkDV1VG/5dSFN8VdCHJgx.EPYizUvwpUF.ZWPwcgfnFaUvzrxDqlO', NULL, '2023-02-02 03:57:51', '2023-02-02 03:57:51', 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium aliquid vitae quasi optio eveniet dolores, tempore ut quisquam sed? Asperiores ratione odit quaerat est itaque autem saepe voluptates unde nam?');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
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
  ADD UNIQUE KEY `orders_slug_unique` (`slug`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `platform`
--
ALTER TABLE `platform`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `platform_slug_unique` (`slug`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Indexes for table `product_platform`
--
ALTER TABLE `product_platform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `platform`
--
ALTER TABLE `platform`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_platform`
--
ALTER TABLE `product_platform`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
