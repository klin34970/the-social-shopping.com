-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Sam 17 Février 2018 à 19:46
-- Version du serveur :  10.1.26-MariaDB-0+deb9u1
-- Version de PHP :  7.0.19-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `the_social_shopping_com`
--

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2017_07_12_145959_create_permission_tables', 1),
(15, '2017_10_14_094129_users_shops', 2),
(17, '2017_10_15_100522_users_shops_products', 3),
(19, '2017_10_15_114810_users_suppliers', 4),
(20, '2017_10_22_144123_users_stripe', 5),
(21, '2017_10_22_160421_users_orders', 6),
(22, '2017_10_22_162727_users_addresses', 6),
(23, '2017_10_22_163645_stripe_orders', 6),
(24, '2017_10_23_141704_users_shops_stripe', 7),
(27, '2017_10_24_170809_users_shops_facebook_pixel', 8),
(28, '2017_10_26_121258_users_shops_products_gallery', 9),
(29, '2017_10_27_083806_users_shops_products_features', 10),
(36, '2017_11_01_074924_users_shops_products_attributes', 11),
(37, '2017_11_01_074931_users_shops_products_attributes_values', 11),
(42, '2017_11_01_103820_users_shops_products_variants', 12),
(43, '2017_11_01_104031_users_shops_products_combinations', 12);

-- --------------------------------------------------------

--
-- Structure de la table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_id`, `model_type`) VALUES
(1, 1, 'App\\User'),
(2, 1, 'App\\User'),
(3, 15, 'App\\User'),
(3, 16, 'App\\User');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('cdebattista@devsapps.com', '$2y$10$k3aShCK/nCAfUslNVdp1MO1n.h5l.5hMBBkLajFw9dfBgmY9UmhoO', '2017-10-14 09:22:47');

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'users_manage', 'web', '2017-10-07 12:28:54', '2017-10-07 12:28:54'),
(2, 'shop_manage', 'web', '2017-10-07 12:42:05', '2017-10-07 12:42:05'),
(3, 'shop_create', 'web', '2017-10-14 10:23:15', '2017-10-14 11:11:28'),
(4, 'shop_update', 'web', '2017-10-14 10:24:24', '2017-10-14 10:24:24'),
(5, 'shop_view', 'web', '2017-10-14 10:24:30', '2017-10-14 10:24:30'),
(6, 'shop_delete', 'web', '2017-10-14 10:24:37', '2017-10-14 10:24:37'),
(7, 'shop_product_view', 'web', '2017-10-15 10:32:04', '2017-10-15 10:32:04'),
(8, 'shop_product_create', 'web', '2017-10-15 10:32:16', '2017-10-15 10:32:16'),
(9, 'shop_product_update', 'web', '2017-10-15 10:32:25', '2017-10-15 10:32:25'),
(10, 'shop_product_delete', 'web', '2017-10-15 10:32:29', '2017-10-15 10:32:29'),
(11, 'shop_product_manage', 'web', '2017-10-15 10:32:35', '2017-10-15 10:32:35'),
(12, 'supplier_view', 'web', '2017-10-15 12:09:20', '2017-10-15 12:09:20'),
(13, 'supplier_create', 'web', '2017-10-15 12:09:27', '2017-10-15 12:09:27'),
(14, 'supplier_update', 'web', '2017-10-15 12:09:32', '2017-10-15 12:09:32'),
(15, 'supplier_delete', 'web', '2017-10-15 12:09:37', '2017-10-15 12:09:37'),
(16, 'supplier_manage', 'web', '2017-10-15 12:09:43', '2017-10-15 12:09:43'),
(17, 'customer_view', 'web', '2017-10-22 14:28:48', '2017-10-22 14:28:48'),
(18, 'customer_create', 'web', '2017-10-22 14:30:03', '2017-10-22 14:30:03'),
(19, 'customer_update', 'web', '2017-10-22 14:30:09', '2017-10-22 14:30:09'),
(20, 'customer_delete', 'web', '2017-10-22 14:30:13', '2017-10-22 14:30:13'),
(21, 'customer_manage', 'web', '2017-10-22 14:30:18', '2017-10-22 14:30:18'),
(22, 'order_view', 'web', '2017-10-22 14:30:25', '2017-10-22 14:30:25'),
(23, 'order_create', 'web', '2017-10-22 14:30:30', '2017-10-22 14:30:30'),
(24, 'order_update', 'web', '2017-10-22 14:30:35', '2017-10-22 14:30:35'),
(25, 'order_delete', 'web', '2017-10-22 14:30:39', '2017-10-22 14:30:39'),
(26, 'order_manage', 'web', '2017-10-22 14:30:43', '2017-10-22 14:30:43');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'web', '2017-10-07 12:28:54', '2017-10-07 12:28:54'),
(2, 'shopper', 'web', '2017-10-07 12:42:33', '2017-10-07 12:42:33'),
(3, 'customer', 'web', '2017-10-22 14:28:28', '2017-10-22 14:28:28');

-- --------------------------------------------------------

--
-- Structure de la table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 1),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 1),
(17, 2),
(21, 1),
(22, 2),
(22, 3),
(24, 2),
(26, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `banned`, `lastname`, `firstname`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Admin', '', 'admin@admin.com', '$2y$10$Ks/PWiWQ/m3l92ha/ftGAuq83pm5bnOeUhab7HWrtkGHgC6dZ8vDa', 'I7GsJ2D4Trb8oSZW95aElzRSHK2Q4XG709Cp80ZbqJ2gLo7YcazVzLIw2hHX', '2017-10-07 12:28:54', '2017-10-07 13:36:33'),
(15, 0, 'De Battista', 'Clint', 'dj-east@hotmail.fr', '$2y$10$oQXXNsxiXk6iD70RaYXbY.jnmT5gAwG6vILZqoBJf7TGOnrcrl6J.', NULL, '2017-10-24 13:19:33', '2017-10-24 13:19:33'),
(16, 0, 'De Battista', 'Clint', 'cdebattista@devsapps.com', '$2y$10$KYruKAE714LhNek/eRFApuGk7/5wZH44aCBUdsbDSHdNI10IUVH9m', NULL, '2017-10-24 13:24:04', '2017-10-24 13:24:04');

-- --------------------------------------------------------

--
-- Structure de la table `users_addresses`
--

CREATE TABLE `users_addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `company` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_1` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_2` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_3` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_1` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_2` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users_addresses`
--

INSERT INTO `users_addresses` (`id`, `user_id`, `company`, `lastname`, `firstname`, `address_1`, `address_2`, `address_3`, `postcode`, `city`, `country`, `phone_1`, `phone_2`, `created_at`, `updated_at`) VALUES
(1, 1, '1988', 'De Battista', 'Clint', '78 rue Joe Dassin', 'ACMSI', '', '34080', 'Montpellier', 'France', '+33768311743', NULL, '2017-10-24 13:19:34', '2017-10-24 13:19:34'),
(2, 16, '', 'De Battista', 'Clint', '78 rue Joe Dassin, ACMSI', '', '', '34080', 'Montpellier', 'France', '+33768311743', NULL, '2017-10-24 13:24:06', '2017-10-24 13:24:06');

-- --------------------------------------------------------

--
-- Structure de la table `users_orders`
--

CREATE TABLE `users_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `seller_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` decimal(20,6) NOT NULL,
  `product_tax` decimal(20,6) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `reference` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_state` int(11) NOT NULL,
  `payment` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users_orders`
--

INSERT INTO `users_orders` (`id`, `customer_id`, `seller_id`, `address_id`, `product_id`, `product_title`, `product_price`, `product_tax`, `product_quantity`, `reference`, `current_state`, `payment`, `module`, `currency`, `created_at`, `updated_at`) VALUES
(1, 15, 1, 1, 1, 'Product 1', '12.800000', '1.163636', 1, 'XV3JE3GD8BEN8G9', 1, 'Stripe', 'stripe', 'EUR', '2017-10-24 13:19:34', '2017-10-24 13:19:34'),
(2, 16, 1, 2, 1, 'Product 1', '12.800000', '1.163636', 12, 'JZ8JM8P27BRO7QR', 1, 'Stripe', 'stripe', 'EUR', '2017-10-24 13:24:06', '2017-10-24 13:24:06');

-- --------------------------------------------------------

--
-- Structure de la table `users_orders_stripe`
--

CREATE TABLE `users_orders_stripe` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `charge_id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charger_balance_transaction` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge_card_id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge_customer` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users_orders_stripe`
--

INSERT INTO `users_orders_stripe` (`id`, `order_id`, `charge_id`, `charger_balance_transaction`, `charge_card_id`, `charge_customer`, `created_at`, `updated_at`) VALUES
(1, 1, 'ch_1BGSJdFCTCPCSXVYFl3i0Cpx', 'txn_1BGSJeFCTCPCSXVYiBOhPuyI', 'card_1BGSJbFCTCPCSXVYKImUtGWV', 'cus_BdjnWnK7mfgdnY', '2017-10-24 13:19:34', '2017-10-24 13:19:34'),
(2, 2, 'ch_1BGSO1FCTCPCSXVYzgrMZU87', 'txn_1BGSO1FCTCPCSXVY3ZZy1EDP', 'card_1BGSNzFCTCPCSXVYWFlSxxrJ', 'cus_BdjrhhXJIa4Iaa', '2017-10-24 13:24:06', '2017-10-24 13:24:06');

-- --------------------------------------------------------

--
-- Structure de la table `users_shops`
--

CREATE TABLE `users_shops` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `company` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_1` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_2` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_3` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_1` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_2` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `legal_form` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_reason` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free_text` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users_shops`
--

INSERT INTO `users_shops` (`id`, `user_id`, `company`, `address_1`, `address_2`, `address_3`, `postcode`, `city`, `country`, `phone_1`, `phone_2`, `email`, `website`, `legal_form`, `social_reason`, `registration`, `vat`, `currency`, `free_text`, `logo`, `created_at`, `updated_at`) VALUES
(1, 1, 'devsapps', '14 plan de la brigantine', '', '', '34970', 'Lattes', 'France', '+33768311743', '', 'cdebattista@devsapps.com', 'https://devsapps.com', 'EIRL', 'DevsApps', '19564753215', '', 'EUR', '', '/users/1/shops/', '2017-10-24 12:52:47', '2017-10-27 06:12:32'),
(3, 1, 'alert(&#34;S3ri0usH4cK WuZ H3r3&#34;)', '14 plan de la brigantine', 'alert(&#34;S3ri0usH4cK WuZ H3r3&#34;)', 'alert(&#34;S3ri0usH4cK WuZ H3r3&#34;)', '34250', 'Palavas-les-Flots', 'France', '+33768312845', '', 'dj-east@hotmail.fr', 'https://www.the-social-shopping.com', 'alert(&#34;lol&#34;)', 'azzzz', 'alert(&#34;lol&#34;)', 'alert(&#34;lol&#34;)', 'ALL', 'alert(&#34;lol&#34;)', NULL, '2017-11-04 11:28:09', '2017-11-04 11:28:17');

-- --------------------------------------------------------

--
-- Structure de la table `users_shops_facebook_pixel`
--

CREATE TABLE `users_shops_facebook_pixel` (
  `id` int(10) UNSIGNED NOT NULL,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `facebook_pixel_code` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users_shops_facebook_pixel`
--

INSERT INTO `users_shops_facebook_pixel` (`id`, `shop_id`, `facebook_pixel_code`, `created_at`, `updated_at`) VALUES
(2, 1, '285420091967398', '2017-10-24 17:24:35', '2017-10-25 06:44:20'),
(3, 3, 'alert(&#34;lol&#34;)', '2017-11-04 11:28:17', '2017-11-04 11:28:21');

-- --------------------------------------------------------

--
-- Structure de la table `users_shops_products`
--

CREATE TABLE `users_shops_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique_id` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(20,6) NOT NULL,
  `price_discount` decimal(20,6) DEFAULT NULL,
  `taxe` decimal(20,6) NOT NULL,
  `virtual_stock` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users_shops_products`
--

INSERT INTO `users_shops_products` (`id`, `unique_id`, `user_id`, `shop_id`, `supplier_id`, `title`, `sku`, `category`, `short_description`, `full_description`, `price`, `price_discount`, `taxe`, `virtual_stock`, `active`, `created_at`, `updated_at`) VALUES
(1, '12xYddae4kdYAmw', 1, 1, 1, 'Product 1', 'alert(&#34;S3ri0usH4cK WuZ H3r3&#34;)', 'Apps & Games', 'Product 1', 'alert(&#34;S3ri0usH4cK WuZ H3r3&#34;)', '12.800000', NULL, '10.000000', 0, 1, '2017-10-24 13:18:09', '2017-11-04 11:25:06'),
(2, 'WRBJX5mezDeYEj5', 1, 1, 1, '80 x 214 cm Haut de Gamme', '556RTU', 'Health & Personal Care', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '149.900000', '100.900000', '19.000000', 99, 1, '2017-10-24 14:28:48', '2017-10-31 10:48:20'),
(3, 'xV3JE3gQVrKN8g9', 1, 1, 1, 'Product 2', '', 'Car & Motorbike', 'Product 2', '', '11.500000', NULL, '10.000000', 0, 1, '2017-10-26 15:01:11', '2017-10-26 15:01:11'),
(4, 'jazJQrQj96jYxDE', 1, 1, 1, '11/10/2017 - Envoi mail GM', '', 'Apps & Games', 'ezrzerezrezrezrzer', '', '122.990000', NULL, '5.000000', 0, 1, '2017-10-27 08:06:07', '2017-10-27 08:06:07'),
(5, 'xV3JE3gQVrKN8g1', 1, 1, 1, 'alert(&#34;lol&#34;)', 'alert(&#34;lol&#34;)', 'Car & Motorbike', 'alert(&#34;lol&#34;)', 'alert(&#34;lol&#34;)', '11.500000', NULL, '10.000000', 0, 1, '2017-10-26 15:01:11', '2017-11-04 11:29:30');

-- --------------------------------------------------------

--
-- Structure de la table `users_shops_products_attributes`
--

CREATE TABLE `users_shops_products_attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users_shops_products_attributes`
--

INSERT INTO `users_shops_products_attributes` (`id`, `product_id`, `name`, `position`, `created_at`, `updated_at`) VALUES
(57, 2, 'Size', 0, '2017-11-03 13:55:33', '2018-01-16 13:28:35'),
(58, 2, 'Color', 1, '2017-11-03 13:56:04', '2018-01-16 13:28:35'),
(59, 2, 'Style', 2, '2017-11-03 13:56:57', '2018-01-16 13:28:35'),
(60, 1, 'alert(&#34;lol&#34;)', 0, '2017-11-03 13:58:59', '2017-11-04 11:24:45'),
(61, 1, 'Color', 1, '2017-11-03 13:59:29', '2017-11-04 11:24:45'),
(67, 1, 'Size', 2, '2017-11-04 11:11:49', '2017-11-04 11:24:45');

-- --------------------------------------------------------

--
-- Structure de la table `users_shops_products_attributes_values`
--

CREATE TABLE `users_shops_products_attributes_values` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `value` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users_shops_products_attributes_values`
--

INSERT INTO `users_shops_products_attributes_values` (`id`, `product_id`, `attribute_id`, `value`, `position`, `created_at`, `updated_at`) VALUES
(80, 2, 57, 'L', 0, '2017-11-03 13:55:38', '2018-01-16 13:28:35'),
(81, 2, 57, 'XL', 1, '2017-11-03 13:55:49', '2018-01-16 13:28:35'),
(82, 2, 58, 'Blue', 0, '2017-11-03 13:56:08', '2017-11-03 15:40:51'),
(83, 2, 58, 'Red', 1, '2017-11-03 13:56:24', '2017-11-03 15:40:51'),
(84, 2, 59, 'Pop', 0, '2017-11-03 13:57:00', '2017-11-03 15:40:12'),
(85, 1, 60, 'alert(&#34;lol&#34;)', 0, '2017-11-03 13:59:05', '2017-11-04 11:24:30'),
(86, 1, 60, 'Gotik', 1, '2017-11-03 13:59:24', '2017-11-04 11:24:30'),
(87, 1, 61, 'White', 2, '2017-11-03 13:59:36', '2017-11-03 13:59:36'),
(88, 1, 61, 'Black', 3, '2017-11-03 13:59:47', '2017-11-03 13:59:47'),
(89, 2, 59, 'Rock', 1, '2017-11-03 15:40:05', '2017-11-03 15:40:12'),
(90, 2, 59, 'OldSchool', 2, '2017-11-03 15:40:11', '2017-11-03 15:40:12'),
(91, 2, 57, 'S', 2, '2017-11-03 15:40:45', '2018-01-16 13:28:35'),
(92, 2, 58, 'White', 2, '2017-11-03 15:40:51', '2017-11-03 15:40:51'),
(94, 1, 67, 'L', 4, '2017-11-04 11:11:54', '2017-11-04 11:11:54'),
(96, 2, 57, 'MPM', 3, '2018-01-16 13:28:35', '2018-01-16 13:28:35');

-- --------------------------------------------------------

--
-- Structure de la table `users_shops_products_combinations`
--

CREATE TABLE `users_shops_products_combinations` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `variant_id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `attribute_value_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users_shops_products_combinations`
--

INSERT INTO `users_shops_products_combinations` (`id`, `product_id`, `variant_id`, `attribute_id`, `attribute_value_id`, `created_at`, `updated_at`) VALUES
(72, 2, 19, 57, 80, '2017-11-04 10:16:15', '2017-11-04 10:16:15'),
(73, 2, 19, 58, 82, '2017-11-04 10:16:15', '2017-11-04 10:16:15'),
(74, 2, 19, 59, 90, '2017-11-04 10:16:15', '2017-11-04 10:16:15'),
(84, 2, 22, 57, 80, '2017-11-04 10:20:19', '2017-11-04 10:20:19'),
(85, 2, 22, 58, 82, '2017-11-04 10:20:19', '2017-11-04 10:20:19'),
(86, 2, 22, 59, 84, '2017-11-04 10:20:19', '2017-11-04 10:20:19'),
(88, 2, 23, 57, 80, '2017-11-04 11:01:05', '2017-11-04 11:01:05'),
(89, 2, 23, 58, 82, '2017-11-04 11:01:05', '2017-11-04 11:01:05'),
(90, 2, 23, 59, 89, '2017-11-04 11:01:05', '2017-11-04 11:01:05'),
(91, 1, 24, 60, 86, '2017-11-04 11:12:07', '2017-11-04 11:12:07'),
(92, 1, 24, 61, 88, '2017-11-04 11:12:07', '2017-11-04 11:12:07'),
(93, 1, 24, 67, 94, '2017-11-04 11:12:07', '2017-11-04 11:12:07'),
(94, 1, 25, 60, 85, '2017-11-04 11:24:57', '2017-11-04 11:24:57'),
(95, 1, 25, 61, 88, '2017-11-04 11:24:57', '2017-11-04 11:24:57'),
(96, 1, 25, 67, 94, '2017-11-04 11:24:57', '2017-11-04 11:24:57');

-- --------------------------------------------------------

--
-- Structure de la table `users_shops_products_features`
--

CREATE TABLE `users_shops_products_features` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users_shops_products_features`
--

INSERT INTO `users_shops_products_features` (`id`, `product_id`, `title`, `description`, `position`, `created_at`, `updated_at`) VALUES
(15, 2, 'Mise', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 1, '2017-10-27 13:01:28', '2017-11-03 15:55:03'),
(17, 2, 'Fabricant', 'Docle', 0, '2017-10-27 13:12:22', '2017-11-03 15:55:03'),
(21, 4, 'test', 'mimes:jpeg,bmp,png,jpg; dimensions:ratio=1/1; min_width=200; min_height=200; max=500kb', 1, '2017-10-27 15:44:21', '2017-10-27 16:09:06'),
(22, 4, 'Including Lenses', 'Add this product to a collection so it’s easy to find in your store.', 0, '2017-10-27 15:53:41', '2017-10-27 16:09:06');

-- --------------------------------------------------------

--
-- Structure de la table `users_shops_products_gallery`
--

CREATE TABLE `users_shops_products_gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users_shops_products_gallery`
--

INSERT INTO `users_shops_products_gallery` (`id`, `product_id`, `filename`, `position`, `created_at`, `updated_at`) VALUES
(84, 2, 'dlZNoLqo9z8OVPb', 1, '2017-10-27 12:59:13', '2017-11-03 10:15:39'),
(86, 2, 'jazJQrQjyvMYxDE', 2, '2017-10-27 12:59:13', '2017-11-03 10:15:39'),
(89, 2, 'je6O3Wk7zDyOyVP', 0, '2017-10-27 12:59:14', '2017-11-03 10:15:39'),
(92, 4, 'An4Ogqm5evnY59a', 0, '2017-10-27 15:12:42', '2017-10-27 15:12:42'),
(93, 5, 'jZ8JM8Pe0PRO7qR', 0, '2017-10-27 15:12:48', '2017-10-27 15:12:48'),
(94, 3, 'gVoORB5dVMAOnAm', 0, '2017-10-27 15:42:08', '2017-10-27 15:42:08'),
(95, 3, 'mepN4W30waKYL68', 1, '2017-10-27 15:42:08', '2017-10-27 15:42:08'),
(96, 1, 'dlZNoLqokX3OVPb', 1, '2017-10-27 15:42:33', '2018-01-16 13:37:42'),
(99, 1, 'jZ8JM8yXdZKO7qR', 0, '2018-01-16 13:37:38', '2018-01-16 13:37:42');

-- --------------------------------------------------------

--
-- Structure de la table `users_shops_products_variants`
--

CREATE TABLE `users_shops_products_variants` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `sku` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(20,6) NOT NULL,
  `price_discount` decimal(20,6) DEFAULT NULL,
  `virtual_stock` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users_shops_products_variants`
--

INSERT INTO `users_shops_products_variants` (`id`, `product_id`, `sku`, `price`, `price_discount`, `virtual_stock`, `created_at`, `updated_at`) VALUES
(19, 2, 'LBLUOLDTYU', '20.000000', '15.000000', 20, '2017-11-04 10:16:15', '2017-11-04 11:00:55'),
(22, 2, 'LBLUPOPTYU', '66.000000', '33.000000', 10, '2017-11-04 10:20:19', '2017-11-04 11:01:28'),
(23, 2, 'LBLUROC', '85.000000', '43.000000', 99, '2017-11-04 11:01:05', '2017-11-04 11:01:32'),
(24, 1, 'GOTBLAL', '12.000000', '8.000000', 10, '2017-11-04 11:12:07', '2017-11-04 11:14:01'),
(25, 1, 'alert(&#34;S3ri0usH4cK WuZ H3r3&#34;)', '12.800000', '0.000000', 0, '2017-11-04 11:24:57', '2017-11-04 11:24:57');

-- --------------------------------------------------------

--
-- Structure de la table `users_shops_stripe`
--

CREATE TABLE `users_shops_stripe` (
  `id` int(10) UNSIGNED NOT NULL,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `key_public` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_private` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users_shops_stripe`
--

INSERT INTO `users_shops_stripe` (`id`, `shop_id`, `key_public`, `key_private`, `created_at`, `updated_at`) VALUES
(1, 1, 'pk_test_KcghoZWENUnCoqKwd3RRasL7', 'sk_test_MtIVFAI7gnVlMUMIyEJeGpHC', '2017-10-24 12:52:47', '2017-10-24 12:52:47'),
(2, 3, 'alert(&#34;S3ri0usH4cK WuZ H3r3&#34;)', 'alert(&#34;S3ri0usH4cK WuZ H3r3&#34;)', '2017-11-04 11:28:09', '2017-11-04 11:28:09');

-- --------------------------------------------------------

--
-- Structure de la table `users_stripe`
--

CREATE TABLE `users_stripe` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `stripe_id` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users_stripe`
--

INSERT INTO `users_stripe` (`id`, `user_id`, `stripe_id`, `created_at`, `updated_at`) VALUES
(1, 15, 'cus_BdjnWnK7mfgdnY', '2017-10-24 13:19:33', '2017-10-24 13:19:33'),
(2, 16, 'cus_BdjrhhXJIa4Iaa', '2017-10-24 13:24:04', '2017-10-24 13:24:04');

-- --------------------------------------------------------

--
-- Structure de la table `users_suppliers`
--

CREATE TABLE `users_suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `company` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_1` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_2` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_3` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_1` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_2` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `legal_form` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_reason` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users_suppliers`
--

INSERT INTO `users_suppliers` (`id`, `user_id`, `company`, `address_1`, `address_2`, `address_3`, `postcode`, `city`, `country`, `phone_1`, `phone_2`, `email`, `website`, `legal_form`, `social_reason`, `registration`, `vat`, `created_at`, `updated_at`) VALUES
(1, 1, 'Aliexpress', '78 rue de la nem2', '', '', 'China', 'China', 'China (中国)', '+861312526541', '', 'cdebattista@idpot.fr', 'http://www.domaine-saint-vincent.fr/fr/', 'EIRL', 'ACMSI', '19564753215', '', '2017-10-24 12:55:54', '2017-10-26 16:17:01'),
(2, 1, 'alert(&#34;lol&#34;)', 'alert(&#34;lol&#34;)', 'alert(&#34;lol&#34;)', 'alert(&#34;lol&#34;)', '34970', 'alert(&#34;lol&#34;)', 'United States', '+33768665656', '', 'dj-east@hotmail.fr', '', 'alert(&#34;lol&#34;)', 'trytry', 'alert(&#34;lol&#34;)', 'alert(&#34;lol&#34;)', '2017-11-04 11:29:08', '2017-11-04 11:29:08');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_addresses`
--
ALTER TABLE `users_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_addresses_user_id_index` (`user_id`);

--
-- Index pour la table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_orders_user_id_index` (`customer_id`),
  ADD KEY `users_orders_product_id_index` (`product_id`);

--
-- Index pour la table `users_orders_stripe`
--
ALTER TABLE `users_orders_stripe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stripe_orders_order_id_index` (`order_id`);

--
-- Index pour la table `users_shops`
--
ALTER TABLE `users_shops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_shops_user_id_index` (`user_id`);

--
-- Index pour la table `users_shops_facebook_pixel`
--
ALTER TABLE `users_shops_facebook_pixel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_shops_facebook_pixel_shop_id_index` (`shop_id`);

--
-- Index pour la table `users_shops_products`
--
ALTER TABLE `users_shops_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_shops_products_user_id_index` (`user_id`),
  ADD KEY `users_shops_products_shop_id_index` (`shop_id`),
  ADD KEY `users_shops_products_supplier_id_index` (`supplier_id`);

--
-- Index pour la table `users_shops_products_attributes`
--
ALTER TABLE `users_shops_products_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_shops_products_attributes_product_id_index` (`product_id`);

--
-- Index pour la table `users_shops_products_attributes_values`
--
ALTER TABLE `users_shops_products_attributes_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_shops_products_attributes_values_product_id_index` (`product_id`),
  ADD KEY `users_shops_products_attributes_values_attribute_id_index` (`attribute_id`);

--
-- Index pour la table `users_shops_products_combinations`
--
ALTER TABLE `users_shops_products_combinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_shops_products_combinations_product_id_index` (`product_id`),
  ADD KEY `users_shops_products_combinations_variant_id_index` (`variant_id`),
  ADD KEY `users_shops_products_combinations_attribute_id_index` (`attribute_id`),
  ADD KEY `users_shops_products_combinations_attribute_value_id_index` (`attribute_value_id`);

--
-- Index pour la table `users_shops_products_features`
--
ALTER TABLE `users_shops_products_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_shops_products_features_product_id_index` (`product_id`);

--
-- Index pour la table `users_shops_products_gallery`
--
ALTER TABLE `users_shops_products_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_shops_products_gallery_product_id_index` (`product_id`);

--
-- Index pour la table `users_shops_products_variants`
--
ALTER TABLE `users_shops_products_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_shops_products_variants_product_id_index` (`product_id`);

--
-- Index pour la table `users_shops_stripe`
--
ALTER TABLE `users_shops_stripe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_shops_stripe_shop_id_index` (`shop_id`);

--
-- Index pour la table `users_stripe`
--
ALTER TABLE `users_stripe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_stripe_user_id_index` (`user_id`);

--
-- Index pour la table `users_suppliers`
--
ALTER TABLE `users_suppliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_suppliers_user_id_index` (`user_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `users_addresses`
--
ALTER TABLE `users_addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users_orders_stripe`
--
ALTER TABLE `users_orders_stripe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users_shops`
--
ALTER TABLE `users_shops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `users_shops_facebook_pixel`
--
ALTER TABLE `users_shops_facebook_pixel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `users_shops_products`
--
ALTER TABLE `users_shops_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `users_shops_products_attributes`
--
ALTER TABLE `users_shops_products_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT pour la table `users_shops_products_attributes_values`
--
ALTER TABLE `users_shops_products_attributes_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT pour la table `users_shops_products_combinations`
--
ALTER TABLE `users_shops_products_combinations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT pour la table `users_shops_products_features`
--
ALTER TABLE `users_shops_products_features`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `users_shops_products_gallery`
--
ALTER TABLE `users_shops_products_gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT pour la table `users_shops_products_variants`
--
ALTER TABLE `users_shops_products_variants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `users_shops_stripe`
--
ALTER TABLE `users_shops_stripe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users_stripe`
--
ALTER TABLE `users_stripe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users_suppliers`
--
ALTER TABLE `users_suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users_orders_stripe`
--
ALTER TABLE `users_orders_stripe`
  ADD CONSTRAINT `stripe_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `users_orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_shops`
--
ALTER TABLE `users_shops`
  ADD CONSTRAINT `users_shops_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_shops_facebook_pixel`
--
ALTER TABLE `users_shops_facebook_pixel`
  ADD CONSTRAINT `users_shops_facebook_pixel_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `users_shops` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_shops_products`
--
ALTER TABLE `users_shops_products`
  ADD CONSTRAINT `users_shops_products_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `users_shops` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_shops_products_supplier_id_index` FOREIGN KEY (`supplier_id`) REFERENCES `users_suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_shops_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_shops_products_attributes`
--
ALTER TABLE `users_shops_products_attributes`
  ADD CONSTRAINT `users_shops_products_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `users_shops_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_shops_products_attributes_values`
--
ALTER TABLE `users_shops_products_attributes_values`
  ADD CONSTRAINT `users_shops_products_attributes_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `users_shops_products_attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_shops_products_attributes_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `users_shops_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_shops_products_combinations`
--
ALTER TABLE `users_shops_products_combinations`
  ADD CONSTRAINT `users_shops_products_combinations_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `users_shops_products_attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_shops_products_combinations_attribute_value_id_foreign` FOREIGN KEY (`attribute_value_id`) REFERENCES `users_shops_products_attributes_values` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_shops_products_combinations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `users_shops_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_shops_products_combinations_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `users_shops_products_variants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_shops_products_features`
--
ALTER TABLE `users_shops_products_features`
  ADD CONSTRAINT `users_shops_products_features_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `users_shops_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_shops_products_gallery`
--
ALTER TABLE `users_shops_products_gallery`
  ADD CONSTRAINT `users_shops_products_gallery_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `users_shops_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_shops_products_variants`
--
ALTER TABLE `users_shops_products_variants`
  ADD CONSTRAINT `users_shops_products_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `users_shops_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_shops_stripe`
--
ALTER TABLE `users_shops_stripe`
  ADD CONSTRAINT `users_shops_stripe_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `users_shops` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_stripe`
--
ALTER TABLE `users_stripe`
  ADD CONSTRAINT `users_stripe_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_suppliers`
--
ALTER TABLE `users_suppliers`
  ADD CONSTRAINT `users_suppliers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
