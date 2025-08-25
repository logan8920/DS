-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2025 at 09:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dropship`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Demo Banner 1', 'banner.jpg', 1, '2025-08-24 18:30:00', '2025-08-24 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `icon`, `is_active`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 'category-1.jpg', 1, NULL, '2025-08-24 18:30:00', '2025-08-25 08:46:38'),
(2, 'Mobiles', 'category-2.jpg', 1, 1, '2025-08-24 18:30:00', '2025-08-25 08:50:11'),
(3, 'Laptops', 'category-3.jpg', 1, 1, '2025-08-24 18:30:00', '2025-08-25 08:50:23'),
(4, 'Fashion', 'category-4.jpg', 1, NULL, '2025-08-24 18:30:00', '2025-08-25 08:50:29'),
(5, 'Men Clothing', 'category-5.jpg', 1, 4, '2025-08-24 18:30:00', '2025-08-25 08:50:43'),
(6, 'Women Clothing', 'category-6.jpg', 1, 4, '2025-08-24 18:30:00', '2025-08-25 08:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `category_attributes`
--

CREATE TABLE `category_attributes` (
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `iso_code` varchar(3) DEFAULT NULL,
  `phone_code` varchar(10) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dropshipper_profiles`
--

CREATE TABLE `dropshipper_profiles` (
  `dropshipper_profile_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_08_18_065521_create_categories_table', 1),
(5, '2025_08_18_065522_create_products_table', 1),
(6, '2025_08_18_065554_create_warehouses_table', 1),
(7, '2025_08_18_065627_create_dropshipper_profiles_table', 1),
(8, '2025_08_18_065709_create_warehouse_product_stocks_table', 1),
(9, '2025_08_18_065741_create_seller_profiles_table', 1),
(10, '2025_08_18_065807_create_product_images_table', 1),
(11, '2025_08_18_065915_create_attributes_table', 1),
(12, '2025_08_18_065916_create_product_attribute_values_table', 1),
(13, '2025_08_18_070019_create_countries_table', 1),
(14, '2025_08_18_070020_create_states_table', 1),
(15, '2025_08_18_070122_create_category_attributes_table', 1),
(16, '2025_08_18_070149_create_warehouse_stock_logs_table', 1),
(17, '2025_08_18_071134_create_source_a_products_table', 1),
(18, '2025_08_25_052045_create_banners_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL COMMENT 'SEO-friendly URL',
  `sku` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount_percentage` decimal(5,2) NOT NULL DEFAULT 0.00,
  `status` enum('Draft','Published','Inactive') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `seller_id`, `category_id`, `name`, `slug`, `sku`, `description`, `price`, `discount_percentage`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Electronics Product 1', 'electronics-product-1', 'SKU-ELEC-001', 'Sample electronic product 1', 1000.00, 5.00, 'Published', '2025-08-25 09:51:59', '2025-08-25 09:51:59'),
(2, 1, 1, 'Electronics Product 2', 'electronics-product-2', 'SKU-ELEC-002', 'Sample electronic product 2', 2000.00, 10.00, 'Draft', '2025-08-25 09:51:59', '2025-08-25 09:51:59'),
(3, 1, 1, 'Electronics Product 3', 'electronics-product-3', 'SKU-ELEC-003', 'Sample electronic product 3', 3000.00, 15.00, 'Inactive', '2025-08-25 09:51:59', '2025-08-25 09:51:59'),
(4, 1, 1, 'Electronics Product 4', 'electronics-product-4', 'SKU-ELEC-004', 'Sample electronic product 4', 4000.00, 20.00, 'Published', '2025-08-25 09:51:59', '2025-08-25 09:51:59'),
(5, 1, 1, 'Electronics Product 5', 'electronics-product-5', 'SKU-ELEC-005', 'Sample electronic product 5', 5000.00, 0.00, 'Draft', '2025-08-25 09:51:59', '2025-08-25 09:51:59'),
(6, 1, 1, 'Electronics Product 6', 'electronics-product-6', 'SKU-ELEC-006', 'Sample electronic product 6', 6000.00, 8.00, 'Inactive', '2025-08-25 09:51:59', '2025-08-25 09:51:59'),
(7, 1, 1, 'Electronics Product 7', 'electronics-product-7', 'SKU-ELEC-007', 'Sample electronic product 7', 7000.00, 12.00, 'Published', '2025-08-25 09:51:59', '2025-08-25 09:51:59'),
(8, 1, 1, 'Electronics Product 8', 'electronics-product-8', 'SKU-ELEC-008', 'Sample electronic product 8', 8000.00, 18.00, 'Draft', '2025-08-25 09:51:59', '2025-08-25 09:51:59'),
(9, 1, 1, 'Electronics Product 9', 'electronics-product-9', 'SKU-ELEC-009', 'Sample electronic product 9', 9000.00, 25.00, 'Inactive', '2025-08-25 09:51:59', '2025-08-25 09:51:59'),
(10, 1, 1, 'Electronics Product 10', 'electronics-product-10', 'SKU-ELEC-010', 'Sample electronic product 10', 10000.00, 30.00, 'Published', '2025-08-25 09:51:59', '2025-08-25 09:51:59'),
(11, 1, 2, 'Mobile Product 1', 'mobile-product-1', 'SKU-MOB-001', 'Sample mobile product 1', 10000.00, 5.00, 'Published', '2025-08-25 09:51:59', '2025-08-25 09:51:59'),
(12, 1, 2, 'Mobile Product 2', 'mobile-product-2', 'SKU-MOB-002', 'Sample mobile product 2', 12000.00, 10.00, 'Draft', '2025-08-25 09:51:59', '2025-08-25 09:51:59'),
(13, 1, 2, 'Mobile Product 3', 'mobile-product-3', 'SKU-MOB-003', 'Sample mobile product 3', 15000.00, 12.00, 'Inactive', '2025-08-25 09:51:59', '2025-08-25 09:51:59'),
(14, 1, 2, 'Mobile Product 4', 'mobile-product-4', 'SKU-MOB-004', 'Sample mobile product 4', 18000.00, 8.00, 'Published', '2025-08-25 09:51:59', '2025-08-25 09:51:59'),
(15, 1, 2, 'Mobile Product 5', 'mobile-product-5', 'SKU-MOB-005', 'Sample mobile product 5', 20000.00, 15.00, 'Draft', '2025-08-25 09:51:59', '2025-08-25 09:51:59'),
(16, 1, 2, 'Mobile Product 6', 'mobile-product-6', 'SKU-MOB-006', 'Sample mobile product 6', 22000.00, 20.00, 'Inactive', '2025-08-25 09:51:59', '2025-08-25 09:51:59'),
(17, 1, 2, 'Mobile Product 7', 'mobile-product-7', 'SKU-MOB-007', 'Sample mobile product 7', 25000.00, 25.00, 'Published', '2025-08-25 09:51:59', '2025-08-25 09:51:59'),
(18, 1, 2, 'Mobile Product 8', 'mobile-product-8', 'SKU-MOB-008', 'Sample mobile product 8', 28000.00, 18.00, 'Draft', '2025-08-25 09:51:59', '2025-08-25 09:51:59'),
(19, 1, 2, 'Mobile Product 9', 'mobile-product-9', 'SKU-MOB-009', 'Sample mobile product 9', 30000.00, 22.00, 'Inactive', '2025-08-25 09:51:59', '2025-08-25 09:51:59'),
(20, 1, 2, 'Mobile Product 10', 'mobile-product-10', 'SKU-MOB-010', 'Sample mobile product 10', 35000.00, 30.00, 'Published', '2025-08-25 09:51:59', '2025-08-25 09:51:59');

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute_values`
--

CREATE TABLE `product_attribute_values` (
  `product_attribute_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attribute_id` bigint(20) UNSIGNED DEFAULT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `image_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `is_primary` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`image_id`, `product_id`, `image_path`, `alt_text`, `is_primary`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, '/products/1-1-1.jpg', 'Product 1 Primary Image', 1, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(2, 1, '/products/1-1-2.jpg', 'Product 1 Secondary Image', 0, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(3, 2, '/products/1-2-1.jpg', 'Product 2 Primary Image', 1, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(4, 2, '/products/1-2-2.jpg', 'Product 2 Secondary Image', 0, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(5, 3, '/products/1-3-1.jpg', 'Product 3 Primary Image', 1, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(6, 3, '/products/1-3-2.jpg', 'Product 3 Secondary Image', 0, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(7, 4, '/products/1-4-1.jpg', 'Product 4 Primary Image', 1, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(8, 4, '/products/1-4-2.jpg', 'Product 4 Secondary Image', 0, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(9, 5, '/products/1-5-1.jpg', 'Product 5 Primary Image', 1, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(10, 5, '/products/1-5-2.jpg', 'Product 5 Secondary Image', 0, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(11, 6, '/products/1-6-1.jpg', 'Product 6 Primary Image', 1, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(12, 6, '/products/1-6-2.jpg', 'Product 6 Secondary Image', 0, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(13, 7, '/products/1-7-1.jpg', 'Product 7 Primary Image', 1, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(14, 7, '/products/1-7-2.jpg', 'Product 7 Secondary Image', 0, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(15, 8, '/products/1-8-1.jpg', 'Product 8 Primary Image', 1, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(16, 8, '/products/1-8-2.jpg', 'Product 8 Secondary Image', 0, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(17, 9, '/products/1-9-1.jpg', 'Product 9 Primary Image', 1, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(18, 9, '/products/1-9-2.jpg', 'Product 9 Secondary Image', 0, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(19, 10, '/products/1-10-1.jpg', 'Product 10 Primary Image', 1, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(20, 10, '/products/1-10-2.jpg', 'Product 10 Secondary Image', 0, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(21, 11, '/products/1-11-1.jpg', 'Product 11 Primary Image', 1, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(22, 11, '/products/1-11-2.jpg', 'Product 3 Secondary Image', 0, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(23, 12, '/products/1-12-1.jpg', 'Product 12 Primary Image', 1, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(24, 12, '/products/1-12-2.jpg', 'Product 12 Secondary Image', 0, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(25, 13, '/products/1-13-1.jpg', 'Product 13 Primary Image', 1, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(26, 13, '/products/1-13-2.jpg', 'Product 13 Secondary Image', 0, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(27, 14, '/products/1-14-1.jpg', 'Product 14 Primary Image', 1, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(28, 14, '/products/1-14-2.jpg', 'Product 14 Secondary Image', 0, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(29, 15, '/products/1-15-1.jpg', 'Product 15 Primary Image', 1, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(30, 15, '/products/1-15-2.jpg', 'Product 15 Secondary Image', 0, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(31, 16, '/products/1-16-1.jpg', 'Product 16 Primary Image', 1, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(32, 16, '/products/1-16-2.jpg', 'Product 16 Secondary Image', 0, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(33, 17, '/products/1-17-1.jpg', 'Product 17 Primary Image', 1, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(34, 17, '/products/1-17-2.jpg', 'Product 17 Secondary Image', 0, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(35, 18, '/products/1-18-1.jpg', 'Product 18 Primary Image', 1, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(36, 18, '/products/1-18-2.jpg', 'Product 18 Secondary Image', 0, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(37, 19, '/products/1-19-1.jpg', 'Product 19 Primary Image', 1, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(38, 19, '/products/1-19-2.jpg', 'Product 19 Secondary Image', 0, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(39, 20, '/products/1-20-1.jpg', 'Product 20 Primary Image', 1, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42'),
(40, 20, '/products/1-20-2.jpg', 'Product 20 Secondary Image', 0, 1, '2025-08-25 16:53:42', '2025-08-25 16:53:42');

-- --------------------------------------------------------

--
-- Table structure for table `seller_profiles`
--

CREATE TABLE `seller_profiles` (
  `seller_profile_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('LAgTYhAQtw7nqzG0hTWqnH9UdgNjezsVcAhJqHCJ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiT3VDWllhWFRIdUhOWUdqV0ROVXI2TmFQUlNzdE5TODhaY3QwUFF0MSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1756149873),
('Z0k66Gh6Kc3svsDBSUqCwVhasAms3idh0gl0yFVM', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMG1HaktCR2E3SHNZek82YlNhMER5T0xwdVowejVKbGZBWFVJMENqMCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1756115290);

-- --------------------------------------------------------

--
-- Table structure for table `source_a_products`
--

CREATE TABLE `source_a_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `expected_price` decimal(2,2) DEFAULT NULL,
  `expected_daily_order` int(11) DEFAULT NULL,
  `image` varchar(96) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'admin1@gmail.com', NULL, '$2y$12$jlZ1W//71SJdOVBTNhdE.OT55MMZlAsmmmqc7NS.qn/Ez..42lyay', NULL, '2025-08-25 02:47:28', '2025-08-25 02:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `warehouse_id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `contact_person_phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_product_stocks`
--

CREATE TABLE `warehouse_product_stocks` (
  `stock_id` bigint(20) UNSIGNED NOT NULL,
  `warehouse_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_stock_logs`
--

CREATE TABLE `warehouse_stock_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`attribute_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_icon_unique` (`icon`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `category_attributes`
--
ALTER TABLE `category_attributes`
  ADD PRIMARY KEY (`attribute_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `dropshipper_profiles`
--
ALTER TABLE `dropshipper_profiles`
  ADD PRIMARY KEY (`dropshipper_profile_id`),
  ADD UNIQUE KEY `dropshipper_profiles_user_id_unique` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD KEY `products_seller_id_foreign` (`seller_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  ADD PRIMARY KEY (`product_attribute_id`),
  ADD KEY `product_attribute_values_product_id_foreign` (`product_id`),
  ADD KEY `product_attribute_values_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `seller_profiles`
--
ALTER TABLE `seller_profiles`
  ADD PRIMARY KEY (`seller_profile_id`),
  ADD UNIQUE KEY `seller_profiles_user_id_unique` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `source_a_products`
--
ALTER TABLE `source_a_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `source_a_products_user_id_foreign` (`user_id`),
  ADD KEY `source_a_products_category_id_foreign` (`category_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`state_id`),
  ADD KEY `states_country_id_foreign` (`country_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`warehouse_id`),
  ADD KEY `warehouses_seller_id_foreign` (`seller_id`);

--
-- Indexes for table `warehouse_product_stocks`
--
ALTER TABLE `warehouse_product_stocks`
  ADD PRIMARY KEY (`stock_id`),
  ADD UNIQUE KEY `warehouse_product_stocks_warehouse_id_product_id_unique` (`warehouse_id`,`product_id`),
  ADD KEY `warehouse_product_stocks_product_id_foreign` (`product_id`);

--
-- Indexes for table `warehouse_stock_logs`
--
ALTER TABLE `warehouse_stock_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `attribute_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_attributes`
--
ALTER TABLE `category_attributes`
  MODIFY `attribute_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dropshipper_profiles`
--
ALTER TABLE `dropshipper_profiles`
  MODIFY `dropshipper_profile_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  MODIFY `product_attribute_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `image_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `seller_profiles`
--
ALTER TABLE `seller_profiles`
  MODIFY `seller_profile_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `source_a_products`
--
ALTER TABLE `source_a_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `state_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `warehouse_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `warehouse_product_stocks`
--
ALTER TABLE `warehouse_product_stocks`
  MODIFY `stock_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `warehouse_stock_logs`
--
ALTER TABLE `warehouse_stock_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`category_id`) ON DELETE SET NULL;

--
-- Constraints for table `dropshipper_profiles`
--
ALTER TABLE `dropshipper_profiles`
  ADD CONSTRAINT `dropshipper_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  ADD CONSTRAINT `product_attribute_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`attribute_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `product_attribute_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE SET NULL;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `seller_profiles`
--
ALTER TABLE `seller_profiles`
  ADD CONSTRAINT `seller_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `source_a_products`
--
ALTER TABLE `source_a_products`
  ADD CONSTRAINT `source_a_products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `source_a_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`) ON DELETE CASCADE;

--
-- Constraints for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD CONSTRAINT `warehouses_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `warehouse_product_stocks`
--
ALTER TABLE `warehouse_product_stocks`
  ADD CONSTRAINT `warehouse_product_stocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `warehouse_product_stocks_warehouse_id_foreign` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`warehouse_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
