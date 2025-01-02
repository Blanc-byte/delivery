-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2024 at 11:11 AM
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
-- Database: `delivery-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `rider_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_fee` decimal(8,2) DEFAULT 5.00,
  `delivery_date` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`id`, `order_id`, `rider_id`, `delivery_fee`, `delivery_date`, `status`, `created_at`, `updated_at`) VALUES
(18, 93, 19, 5.00, '2024-12-28 14:02:37', 'delivered', '2024-12-28 14:02:37', '2024-12-28 14:03:14'),
(19, 94, 19, 5.00, '2024-12-28 14:02:39', 'delivered', '2024-12-28 14:02:39', '2024-12-28 14:03:18');

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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `concern` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `customer_id`, `order_id`, `concern`, `created_at`) VALUES
(1, 18, 93, 'Bros so late', '2024-12-28 22:28:07');

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
(5, '2024_10_19_030101_add_role_to_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` enum('placed','out_for_delivery','delivered') DEFAULT 'placed',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `price` decimal(11,0) NOT NULL,
  `total` decimal(11,0) NOT NULL,
  `payment_method` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `product_id`, `quantity`, `status`, `created_at`, `updated_at`, `price`, `total`, `payment_method`) VALUES
(93, 18, 220, 2, 'delivered', '2024-12-28 14:02:07', '2024-12-28 14:03:14', 6, 12, 5),
(94, 18, 221, 1, 'delivered', '2024-12-28 14:02:07', '2024-12-28 14:03:18', 6, 6, 5),
(95, 18, 223, 1, 'placed', '2024-12-28 14:04:03', '2024-12-28 14:04:03', 7, 7, 1);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(254) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `status`) VALUES
(1, 'Cash', 1),
(2, 'GCash', 1),
(3, 'PayMaya', 1),
(4, 'PayPal', 1),
(5, 'Visa', 1);

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
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image_url` text DEFAULT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `created_at`, `updated_at`, `image_url`, `category`) VALUES
(220, 'Classic Burger', 'A juicy beef patty with lettuce, tomato, and cheese.', 5.99, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/burgers/classic.jpg', 'Burgers'),
(221, 'Cheeseburger', 'A beef patty topped with melted cheese, lettuce, and tomato.', 6.49, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/burgers/cheeseburger.jpg', 'Burgers'),
(222, 'Bacon Burger', 'A beef patty with crispy bacon, lettuce, and tomato.', 7.49, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/burgers/baconburger.jpg', 'Burgers'),
(223, 'Chicken Burger', 'Grilled chicken breast with lettuce and mayo.', 6.99, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/burgers/chickenburger.jpg', 'Burgers'),
(224, 'Vegan Burger', 'A plant-based patty with vegan mayo and veggies.', 7.99, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/burgers/veganburger.jpg', 'Burgers'),
(225, 'Coca-Cola', 'Chilled Coca-Cola in a 500ml bottle.', 1.49, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/drinks/coke.jpg', 'Drinks'),
(226, 'Pepsi', 'Refreshing Pepsi in a 500ml bottle.', 1.49, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/drinks/pepsi.jpg', 'Drinks'),
(227, 'Lemonade', 'Freshly squeezed lemonade with ice.', 2.49, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/drinks/lemonade.jpg', 'Drinks'),
(228, 'Orange Juice', 'Pure orange juice with no added sugar.', 2.99, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/drinks/orangejuice.jpg', 'Drinks'),
(229, 'Iced Tea', 'Cool iced tea with a hint of lemon.', 1.99, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/drinks/icedtea.jpg', 'Drinks'),
(230, 'Margherita Pizza', 'Classic pizza with tomato, basil, and mozzarella.', 8.99, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/pizzas/margherita.jpg', 'Pizzas'),
(231, 'Pepperoni Pizza', 'Loaded with pepperoni and cheese.', 9.99, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/pizzas/pepperoni.jpg', 'Pizzas'),
(232, 'BBQ Chicken Pizza', 'BBQ chicken with onions and cheese.', 10.99, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/pizzas/bbqchicken.jpg', 'Pizzas'),
(233, 'Veggie Pizza', 'Topped with mushrooms, peppers, and olives.', 8.49, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/pizzas/veggie.jpg', 'Pizzas'),
(234, 'Meat Lovers Pizza', 'Packed with ham, sausage, and pepperoni.', 11.99, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/pizzas/meatlovers.jpg', 'Pizzas'),
(235, 'Chocolate Cake', 'Rich chocolate cake with a creamy frosting.', 4.99, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/desserts/chocolatecake.jpg', 'Desserts'),
(236, 'Apple Pie', 'Classic apple pie with a flaky crust.', 3.99, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/desserts/applepie.jpg', 'Desserts'),
(237, 'Ice Cream Sundae', 'Vanilla ice cream with chocolate syrup and nuts.', 3.49, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/desserts/sundae.jpg', 'Desserts'),
(238, 'Brownie', 'Fudgy chocolate brownie with walnuts.', 2.99, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/desserts/brownie.jpg', 'Desserts'),
(239, 'Cheesecake', 'Creamy cheesecake with a graham cracker crust.', 4.49, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/desserts/cheesecake.jpg', 'Desserts'),
(240, 'Fries', 'Crispy golden fries.', 2.49, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/snacks/fries.jpg', 'Snacks'),
(241, 'Nachos', 'Tortilla chips with cheese and jalapenos.', 3.99, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/snacks/nachos.jpg', 'Snacks'),
(242, 'Onion Rings', 'Crispy fried onion rings.', 2.99, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/snacks/onionrings.jpg', 'Snacks'),
(243, 'Chicken Nuggets', 'Crispy chicken nuggets.', 4.49, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/snacks/nuggets.jpg', 'Snacks'),
(244, 'Garlic Bread', 'Toasted garlic bread with herbs.', 3.49, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/snacks/garlicbread.jpg', 'Snacks'),
(245, 'Double Cheeseburger', 'Two beef patties with cheese.', 8.49, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/burgers/doublecheeseburger.jpg', 'Burgers'),
(246, 'Spicy Chicken Burger', 'Spicy grilled chicken with jalapenos.', 7.49, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/burgers/spicychickenburger.jpg', 'Burgers'),
(247, 'Strawberry Milkshake', 'Creamy milkshake with fresh strawberries.', 3.99, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/drinks/strawberrymilkshake.jpg', 'Drinks'),
(248, 'Espresso', 'Strong and rich espresso coffee.', 2.49, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/drinks/espresso.jpg', 'Drinks'),
(249, 'Meatball Pizza', 'Pizza topped with savory meatballs.', 10.49, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/pizzas/meatballpizza.jpg', 'Pizzas'),
(250, 'Tiramisu', 'Classic Italian dessert with coffee and mascarpone.', 5.49, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/desserts/tiramisu.jpg', 'Desserts'),
(251, 'Mozzarella Sticks', 'Fried mozzarella cheese sticks.', 3.99, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/snacks/mozzarellasticks.jpg', 'Snacks'),
(252, 'Veggie Wrap', 'A healthy wrap filled with fresh vegetables.', 5.49, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/snacks/veggiewrap.jpg', 'Snacks'),
(253, 'Chocolate Milkshake', 'Rich chocolate milkshake.', 3.99, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/drinks/chocolatemilkshake.jpg', 'Drinks'),
(254, 'Iced Coffee', 'Cold brewed coffee served on ice.', 2.99, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/drinks/icedcoffee.jpg', 'Drinks'),
(255, 'Hawaiian Pizza', 'Ham and pineapple pizza.', 9.99, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/pizzas/hawaiianpizza.jpg', 'Pizzas'),
(256, 'Chocolate Chip Cookie', 'Soft-baked cookie with chocolate chips.', 1.99, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/desserts/cookie.jpg', 'Desserts'),
(257, 'Loaded Fries', 'Fries topped with cheese and bacon bits.', 4.99, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/snacks/loadedfries.jpg', 'Snacks'),
(258, 'Grilled Cheese Sandwich', 'Crispy bread with melted cheese.', 3.99, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/snacks/grilledcheese.jpg', 'Snacks'),
(259, 'Blueberry Muffin', 'Freshly baked blueberry muffin.', 2.49, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/desserts/blueberrymuffin.jpg', 'Desserts'),
(260, 'Sprite', 'Refreshing lemon-lime soda.', 1.49, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/drinks/sprite.jpg', 'Drinks'),
(261, 'Garlic Butter Pizza', 'Pizza with a garlic butter base.', 9.49, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/pizzas/garlicbutterpizza.jpg', 'Pizzas'),
(262, 'BBQ Wings', 'Spicy BBQ chicken wings.', 6.99, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/snacks/bbqwings.jpg', 'Snacks'),
(263, 'Caesar Salad', 'Classic salad with Caesar dressing.', 5.99, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/snacks/caesarsalad.jpg', 'Snacks'),
(264, 'Vanilla Ice Cream', 'Classic vanilla-flavored ice cream.', 2.99, '2024-12-28 13:48:23', '2024-12-28 13:48:23', 'images/desserts/vanillaicecream.jpg', 'Desserts');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `star` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `product_id`, `customer_id`, `star`) VALUES
(1, 220, 18, 1),
(3, 221, 18, 1),
(4, 223, 18, 4),
(5, 264, 18, 5),
(6, 7, 18, 5);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(2, 'Shera', 'shera@gmail.com', '2024-10-19 10:33:38', '$2y$10$3GZu2TEjsyaFsdr2SI2lHOiDqAAOmfmgTbwafqM.Gzc361DZmh2.S', NULL, '2024-10-19 10:33:22', '2024-12-05 23:06:38', 'admin'),
(18, 'customer', 'customer@gmail.com', '2024-11-25 08:59:19', '$2y$10$hh0mtxGmOMu/dOuk7XFAIe6mUmeucXbmxxdz3t.DPW/9r28PcGIqK', NULL, '2024-11-25 08:58:46', '2024-11-25 08:59:19', 'user'),
(19, 'rider', 'rider@gmail.com', '2024-11-25 09:00:37', '$2y$10$QJSxAFsy/yvi34OC7ox47..gbv8crChyyDEKdL8aEWe7NzS6WmgNC', NULL, '2024-11-25 09:00:11', '2024-11-25 09:00:37', 'rider'),
(20, 'Customer2', 'customer2@gmail.com', '2024-12-15 05:06:02', '$2y$10$cihMMvjazDCgBj.jUEZXtepZoPSk5A6nx/FsKweQNWVqFDgDpozEO', NULL, '2024-12-15 05:05:09', '2024-12-15 05:06:02', 'user'),
(21, 'rider2', 'rider2@gmail.com', '2024-12-15 05:09:18', '$2y$10$oDPPW74ix8z5yLOCrL4vRest8yF0TYS31mZAApyiGGEX76yG2kAOK', NULL, '2024-12-15 05:09:09', '2024-12-15 05:09:18', 'rider'),
(22, 'administrator', 'adminstrator@gmail.com', '2024-12-26 22:54:49', '$2y$10$kkEbZTPGB3yvcu5gNuOateYXGAceg4WLFBnxSqTaKg3tExYlU8.e2', NULL, '2024-12-26 22:54:21', '2024-12-26 22:54:49', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `rider_id` (`rider_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `fk_payment_method` (`payment_method`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD CONSTRAINT `deliveries_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `deliveries_ibfk_2` FOREIGN KEY (`rider_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_payment_method` FOREIGN KEY (`payment_method`) REFERENCES `payments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
