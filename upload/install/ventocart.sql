-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 02, 2024 at 04:21 PM
-- Server version: 8.0.35-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upload`
--

-- --------------------------------------------------------

--
-- Table structure for table `ve_address`
--

CREATE TABLE `ve_address` (
  `address_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `firstname` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `company` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address_1` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `postcode` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `country_id` int NOT NULL DEFAULT '0',
  `zone_id` int NOT NULL DEFAULT '0',
  `custom_field` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `default` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_address_format`
--

CREATE TABLE `ve_address_format` (
  `address_format_id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address_format` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_address_format`
--

INSERT INTO `ve_address_format` (`address_format_id`, `name`, `address_format`) VALUES
(1, 'Address Format', '{firstname} {lastname}\n{company}\n{address_1}\n{phone}\n{city}, {zone} {postcode}\n{country}');

-- --------------------------------------------------------

--
-- Table structure for table `ve_antispam`
--

CREATE TABLE `ve_antispam` (
  `antispam_id` int NOT NULL,
  `keyword` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_api`
--

CREATE TABLE `ve_api` (
  `api_id` int NOT NULL,
  `username` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `key` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_api`
--

INSERT INTO `ve_api` (`api_id`, `username`, `key`, `status`, `date_added`, `date_modified`) VALUES
(1, 'Default', 'xAajzSqmAuMoRD6isBuwAIOUVwd7j3RS8cyEfnGPWMvx88WYzTZNSvPzIEjDP4WPRfgAV8uKOzCUV7kskSpFYM3to26YB1Ckyv4uTcLDfjUoSJvhF3CZx4ENSXGR32BUNdRQ0O33zbaV0qSwb06ilWmS3L5OpTRqKZawAqVImLeD3QnvqqpintThvXITNTOMhzKqnoD5WALuiCOyX322YKD8QVjlCKFi1DTgTwzxmCqlDrQkO4hrpiZkY3v5YBgl', 1, '2023-12-02 14:48:28', '2023-12-04 16:19:53');

-- --------------------------------------------------------

--
-- Table structure for table `ve_api_ip`
--

CREATE TABLE `ve_api_ip` (
  `api_ip_id` int NOT NULL,
  `api_id` int NOT NULL,
  `ip` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_api_session`
--

CREATE TABLE `ve_api_session` (
  `api_session_id` int NOT NULL,
  `api_id` int NOT NULL,
  `session_id` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_article`
--

CREATE TABLE `ve_article` (
  `article_id` int NOT NULL,
  `topic_id` int NOT NULL,
  `author` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_article_comment`
--

CREATE TABLE `ve_article_comment` (
  `article_comment_id` int NOT NULL,
  `article_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `author` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_article_description`
--

CREATE TABLE `ve_article_description` (
  `article_id` int NOT NULL,
  `language_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tag` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meta_keyword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_article_rating`
--

CREATE TABLE `ve_article_rating` (
  `article_rating_id` int NOT NULL,
  `article_id` int DEFAULT NULL,
  `article_comment_id` int DEFAULT NULL,
  `store_id` int DEFAULT '0',
  `customer_id` int DEFAULT '0',
  `rating` tinyint DEFAULT NULL,
  `ip` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_added` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_article_to_layout`
--

CREATE TABLE `ve_article_to_layout` (
  `article_id` int NOT NULL,
  `store_id` int NOT NULL,
  `layout_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_article_to_store`
--

CREATE TABLE `ve_article_to_store` (
  `article_id` int NOT NULL,
  `store_id` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_attribute`
--

CREATE TABLE `ve_attribute` (
  `attribute_id` int NOT NULL,
  `attribute_group_id` int NOT NULL,
  `sort_order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_attribute_description`
--

CREATE TABLE `ve_attribute_description` (
  `attribute_id` int NOT NULL,
  `language_id` int NOT NULL,
  `name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_banner`
--

CREATE TABLE `ve_banner` (
  `banner_id` int NOT NULL,
  `name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;


INSERT INTO `ve_banner` (`banner_id`, `name`, `status`) VALUES
(1, 'Banner', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ve_banner_image`
--

CREATE TABLE `ve_banner_image` (
  `banner_image_id` int NOT NULL,
  `banner_id` int NOT NULL,
  `language_id` int NOT NULL,
  `title` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;



 
INSERT INTO `ve_banner_image` (`banner_image_id`, `banner_id`, `language_id`, `title`, `link`, `image`, `sort_order`) VALUES
(3, 1, 1, 'Vento Laptop', '', 'catalog/banner1.png', 0),
(4, 1, 1, 'Vento leds', '', 'catalog/banner8.png', 0),
(5, 1, 1, 'vento shoes', '', 'catalog/banner22.png', 0);


-- --------------------------------------------------------

--
-- Table structure for table `ve_cart`
--

CREATE TABLE `ve_cart` (
  `cart_id` int NOT NULL,
  `api_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `session_id` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_id` int NOT NULL,
  `subscription_plan_id` int NOT NULL,
  `option` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL,
  `override` tinyint(1) NOT NULL,
  `price` decimal(15,4) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_category`
--

CREATE TABLE `ve_category` (
  `category_id` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `top` tinyint(1) NOT NULL,
  `column` int NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_category`
--

INSERT INTO `ve_category` (`category_id`, `image`, `parent_id`, `top`, `column`, `sort_order`, `status`, `date_added`, `date_modified`) VALUES
(59, '', 0, 1, 1, 1, 1, '2023-12-22 03:21:56', '2023-12-22 03:34:00'),
(60, '', 59, 0, 1, 0, 1, '2023-12-22 03:22:27', '2023-12-22 03:22:27'),
(61, '', 60, 0, 1, 0, 1, '2023-12-22 03:22:51', '2023-12-22 03:22:51'),
(62, '', 60, 0, 1, 0, 1, '2023-12-22 03:23:11', '2023-12-22 03:23:11'),
(63, '', 60, 0, 1, 0, 1, '2023-12-22 03:23:34', '2023-12-22 03:23:34'),
(64, '', 59, 0, 1, 0, 1, '2023-12-22 03:23:58', '2023-12-22 03:23:58'),
(65, '', 64, 0, 1, 0, 1, '2023-12-22 03:29:25', '2023-12-22 03:29:25'),
(66, '', 64, 0, 1, 0, 1, '2023-12-22 03:29:55', '2023-12-22 03:29:55'),
(67, '', 0, 1, 1, 2, 1, '2023-12-22 03:30:24', '2023-12-22 03:34:17'),
(68, '', 67, 0, 1, 0, 1, '2023-12-22 03:31:10', '2023-12-22 03:31:59'),
(69, '', 67, 0, 1, 0, 1, '2023-12-22 03:32:14', '2023-12-22 03:32:14'),
(70, '', 0, 1, 1, 3, 1, '2023-12-22 03:32:56', '2023-12-22 03:34:36'),
(71, '', 0, 1, 1, 4, 1, '2023-12-22 03:33:28', '2023-12-22 03:34:52'),
(72, '', 0, 1, 1, 5, 1, '2023-12-22 03:35:21', '2023-12-22 03:35:21'),
(73, '', 0, 1, 1, 7, 1, '2023-12-22 03:35:48', '2023-12-22 03:35:55'),
(74, '', 72, 0, 1, 0, 1, '2023-12-22 03:36:35', '2023-12-22 03:36:35'),
(75, '', 72, 0, 1, 0, 1, '2023-12-22 03:36:49', '2023-12-22 03:36:49'),
(76, '', 0, 1, 1, 8, 1, '2023-12-22 03:37:18', '2023-12-22 03:37:18'),
(77, '', 0, 1, 1, 10, 1, '2023-12-22 03:37:57', '2023-12-22 03:37:57'),
(78, '', 60, 0, 1, 0, 1, '2023-12-22 03:40:46', '2023-12-22 03:40:46'),
(79, '', 0, 1, 1, 1, 1, '2023-12-22 06:49:56', '2023-12-22 06:49:56'),
(81, '', 0, 1, 1, 3, 1, '2023-12-22 06:50:45', '2023-12-22 06:51:21'),
(82, '', 0, 1, 1, 2, 1, '2023-12-22 06:51:13', '2023-12-22 06:52:01'),
(83, '', 0, 1, 1, 6, 1, '2023-12-22 06:51:48', '2023-12-22 06:51:48'),
(84, '', 0, 1, 1, 4, 1, '2023-12-22 06:52:27', '2023-12-22 06:52:27'),
(85, '', 0, 1, 1, 7, 1, '2023-12-22 06:52:51', '2023-12-22 06:52:51'),
(86, '', 79, 0, 1, 0, 1, '2023-12-22 06:53:26', '2023-12-22 06:53:26'),
(87, '', 79, 0, 1, 5, 1, '2023-12-22 06:53:44', '2023-12-22 06:53:44'),
(88, '', 0, 1, 1, 8, 1, '2023-12-22 06:56:11', '2023-12-22 06:56:11');

-- --------------------------------------------------------

--
-- Table structure for table `ve_category_description`
--

CREATE TABLE `ve_category_description` (
  `category_id` int NOT NULL,
  `language_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meta_keyword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_category_description`
--

INSERT INTO `ve_category_description` (`category_id`, `language_id`, `name`, `description`, `meta_title`, `meta_description`, `meta_keyword`) VALUES
(59, 1, 'Clothing and Apparel', '', 'Clothing and Apparel', '', ''),
(60, 1, 'Men\'s Clothing', '', 'Men\'s Clothing', '', ''),
(61, 1, 'T-Shirts', '', 'T-Shirts', '', ''),
(62, 1, 'Shirts', '', 'Shirts', '', ''),
(63, 1, 'Pants', '', 'Pants', '', ''),
(64, 1, 'Women\'s Clothing', '', 'Women\'s Clothing', '', ''),
(65, 1, 'Dresses', '', 'Dresses', '', ''),
(66, 1, 'Tops', '', 'Tops', '', ''),
(67, 1, 'Shoes', '', 'Shoes', '', ''),
(68, 1, 'Snikers', '', 'Snikers', '', ''),
(69, 1, 'Boots', '', 'Boots', '', ''),
(70, 1, 'Home &amp; Garden', '', 'Home &amp; Garden', '', ''),
(71, 1, 'Kids and Toys', '', 'Kids and Toys', '', ''),
(72, 1, 'Electronics', '', 'Electronics', '', ''),
(73, 1, 'Sports and Outdoors', '', 'Sports and Outdoors', '', ''),
(74, 1, 'Smartphones', '', 'Smartphones', '', ''),
(75, 1, 'Gadgets', '', 'Gadgets', '', ''),
(76, 1, 'Beauty &amp; Health', '', 'Beauty &amp; Health', '', ''),
(77, 1, 'Accessories', '', 'Accessories', '', ''),
(78, 1, 'Ties', '', 'Ties', '', ''),
(79, 1, 'Clothing and Apparel', '', 'Clothing and Apparel', '', ''),
(81, 1, 'Shoes', '', 'Shoes', '', ''),
(82, 1, 'Sports and Outdoors', '', 'Sports and Outdoors', '', ''),
(83, 1, 'Electronics', '', 'Electronics', '', ''),
(84, 1, 'Accessories', '', 'Accessories', '', ''),
(85, 1, 'Kids and Toys', '', 'Kids and Toys', '', ''),
(86, 1, 'Men\'s Clothing', '', 'Men\'s Clothing', '', ''),
(87, 1, 'Women\'s Clothing', '', 'Women\'s Clothing', '', ''),
(88, 1, 'Home &amp; Garden', '', 'Home &amp; Garden', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ve_category_filter`
--

CREATE TABLE `ve_category_filter` (
  `category_id` int NOT NULL,
  `filter_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_category_path`
--

CREATE TABLE `ve_category_path` (
  `category_id` int NOT NULL,
  `path_id` int NOT NULL,
  `level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_category_path`
--

INSERT INTO `ve_category_path` (`category_id`, `path_id`, `level`) VALUES
(79, 79, 0),
(81, 81, 0),
(82, 82, 0),
(83, 83, 0),
(84, 84, 0),
(85, 85, 0),
(86, 79, 0),
(86, 86, 1),
(87, 79, 0),
(87, 87, 1),
(88, 88, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ve_category_to_layout`
--

CREATE TABLE `ve_category_to_layout` (
  `category_id` int NOT NULL,
  `store_id` int NOT NULL,
  `layout_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_category_to_layout`
--

INSERT INTO `ve_category_to_layout` (`category_id`, `store_id`, `layout_id`) VALUES
(79, 0, 3),
(81, 0, 3),
(82, 0, 3),
(83, 0, 3),
(84, 0, 3),
(85, 0, 3),
(86, 0, 3),
(87, 0, 3),
(88, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ve_category_to_store`
--

CREATE TABLE `ve_category_to_store` (
  `category_id` int NOT NULL,
  `store_id` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_category_to_store`
--

INSERT INTO `ve_category_to_store` (`category_id`, `store_id`) VALUES
(79, 0),
(81, 0),
(82, 0),
(83, 0),
(84, 0),
(85, 0),
(86, 0),
(87, 0),
(88, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ve_country`
--

CREATE TABLE `ve_country` (
  `country_id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `iso_code_2` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `iso_code_3` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address_format_id` int NOT NULL,
  `postcode_required` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_country`
--

INSERT INTO `ve_country` (`country_id`, `name`, `iso_code_2`, `iso_code_3`, `address_format_id`, `postcode_required`, `status`) VALUES
(1, 'Afghanistan', 'AF', 'AFG', 1, 0, 1),
(2, 'Albania', 'AL', 'ALB', 1, 0, 1),
(3, 'Algeria', 'DZ', 'DZA', 1, 0, 1),
(4, 'American Samoa', 'AS', 'ASM', 1, 0, 1),
(5, 'Andorra', 'AD', 'AND', 1, 0, 1),
(6, 'Angola', 'AO', 'AGO', 1, 0, 1),
(7, 'Anguilla', 'AI', 'AIA', 1, 0, 1),
(8, 'Antarctica', 'AQ', 'ATA', 1, 0, 1),
(9, 'Antigua and Barbuda', 'AG', 'ATG', 1, 0, 1),
(10, 'Argentina', 'AR', 'ARG', 1, 0, 1),
(11, 'Armenia', 'AM', 'ARM', 1, 0, 1),
(12, 'Aruba', 'AW', 'ABW', 1, 0, 1),
(13, 'Australia', 'AU', 'AUS', 1, 0, 1),
(14, 'Austria', 'AT', 'AUT', 1, 0, 1),
(15, 'Azerbaijan', 'AZ', 'AZE', 1, 0, 1),
(16, 'Bahamas', 'BS', 'BHS', 1, 0, 1),
(17, 'Bahrain', 'BH', 'BHR', 1, 0, 1),
(18, 'Bangladesh', 'BD', 'BGD', 1, 0, 1),
(19, 'Barbados', 'BB', 'BRB', 1, 0, 1),
(20, 'Belarus', 'BY', 'BLR', 1, 0, 1),
(21, 'Belgium', 'BE', 'BEL', 1, 0, 1),
(22, 'Belize', 'BZ', 'BLZ', 1, 0, 1),
(23, 'Benin', 'BJ', 'BEN', 1, 0, 1),
(24, 'Bermuda', 'BM', 'BMU', 1, 0, 1),
(25, 'Bhutan', 'BT', 'BTN', 1, 0, 1),
(26, 'Bolivia', 'BO', 'BOL', 1, 0, 1),
(27, 'Bosnia and Herzegovina', 'BA', 'BIH', 1, 0, 1),
(28, 'Botswana', 'BW', 'BWA', 1, 0, 1),
(29, 'Bouvet Island', 'BV', 'BVT', 1, 0, 1),
(30, 'Brazil', 'BR', 'BRA', 1, 0, 1),
(31, 'British Indian Ocean Territory', 'IO', 'IOT', 1, 0, 1),
(32, 'Brunei Darussalam', 'BN', 'BRN', 1, 0, 1),
(33, 'Bulgaria', 'BG', 'BGR', 1, 0, 1),
(34, 'Burkina Faso', 'BF', 'BFA', 1, 0, 1),
(35, 'Burundi', 'BI', 'BDI', 1, 0, 1),
(36, 'Cambodia', 'KH', 'KHM', 1, 0, 1),
(37, 'Cameroon', 'CM', 'CMR', 1, 0, 1),
(38, 'Canada', 'CA', 'CAN', 1, 0, 1),
(39, 'Cape Verde', 'CV', 'CPV', 1, 0, 1),
(40, 'Cayman Islands', 'KY', 'CYM', 1, 0, 1),
(41, 'Central African Republic', 'CF', 'CAF', 1, 0, 1),
(42, 'Chad', 'TD', 'TCD', 1, 0, 1),
(43, 'Chile', 'CL', 'CHL', 1, 0, 1),
(44, 'China', 'CN', 'CHN', 1, 0, 1),
(45, 'Christmas Island', 'CX', 'CXR', 1, 0, 1),
(46, 'Cocos (Keeling) Islands', 'CC', 'CCK', 1, 0, 1),
(47, 'Colombia', 'CO', 'COL', 1, 0, 1),
(48, 'Comoros', 'KM', 'COM', 1, 0, 1),
(49, 'Congo', 'CG', 'COG', 1, 0, 1),
(50, 'Cook Islands', 'CK', 'COK', 1, 0, 1),
(51, 'Costa Rica', 'CR', 'CRI', 1, 0, 1),
(52, 'Cote D\'Ivoire', 'CI', 'CIV', 1, 0, 1),
(53, 'Croatia', 'HR', 'HRV', 1, 0, 1),
(54, 'Cuba', 'CU', 'CUB', 1, 0, 1),
(55, 'Cyprus', 'CY', 'CYP', 1, 0, 1),
(56, 'Czech Republic', 'CZ', 'CZE', 1, 0, 1),
(57, 'Denmark', 'DK', 'DNK', 1, 0, 1),
(58, 'Djibouti', 'DJ', 'DJI', 1, 0, 1),
(59, 'Dominica', 'DM', 'DMA', 1, 0, 1),
(60, 'Dominican Republic', 'DO', 'DOM', 1, 0, 1),
(61, 'East Timor', 'TL', 'TLS', 1, 0, 1),
(62, 'Ecuador', 'EC', 'ECU', 1, 0, 1),
(63, 'Egypt', 'EG', 'EGY', 1, 0, 1),
(64, 'El Salvador', 'SV', 'SLV', 1, 0, 1),
(65, 'Equatorial Guinea', 'GQ', 'GNQ', 1, 0, 1),
(66, 'Eritrea', 'ER', 'ERI', 1, 0, 1),
(67, 'Estonia', 'EE', 'EST', 1, 0, 1),
(68, 'Ethiopia', 'ET', 'ETH', 1, 0, 1),
(69, 'Falkland Islands (Malvinas)', 'FK', 'FLK', 1, 0, 1),
(70, 'Faroe Islands', 'FO', 'FRO', 1, 0, 1),
(71, 'Fiji', 'FJ', 'FJI', 1, 0, 1),
(72, 'Finland', 'FI', 'FIN', 1, 0, 1),
(74, 'France, Metropolitan', 'FR', 'FRA', 1, 1, 1),
(75, 'French Guiana', 'GF', 'GUF', 1, 0, 1),
(76, 'French Polynesia', 'PF', 'PYF', 1, 0, 1),
(77, 'French Southern Territories', 'TF', 'ATF', 1, 0, 1),
(78, 'Gabon', 'GA', 'GAB', 1, 0, 1),
(79, 'Gambia', 'GM', 'GMB', 1, 0, 1),
(80, 'Georgia', 'GE', 'GEO', 1, 0, 1),
(81, 'Germany', 'DE', 'DEU', 1, 1, 1),
(82, 'Ghana', 'GH', 'GHA', 1, 0, 1),
(83, 'Gibraltar', 'GI', 'GIB', 1, 0, 1),
(84, 'Greece', 'GR', 'GRC', 1, 0, 1),
(85, 'Greenland', 'GL', 'GRL', 1, 0, 1),
(86, 'Grenada', 'GD', 'GRD', 1, 0, 1),
(87, 'Guadeloupe', 'GP', 'GLP', 1, 0, 1),
(88, 'Guam', 'GU', 'GUM', 1, 0, 1),
(89, 'Guatemala', 'GT', 'GTM', 1, 0, 1),
(90, 'Guinea', 'GN', 'GIN', 1, 0, 1),
(91, 'Guinea-Bissau', 'GW', 'GNB', 1, 0, 1),
(92, 'Guyana', 'GY', 'GUY', 1, 0, 1),
(93, 'Haiti', 'HT', 'HTI', 1, 0, 1),
(94, 'Heard and Mc Donald Islands', 'HM', 'HMD', 1, 0, 1),
(95, 'Honduras', 'HN', 'HND', 1, 0, 1),
(96, 'Hong Kong', 'HK', 'HKG', 1, 0, 1),
(97, 'Hungary', 'HU', 'HUN', 1, 0, 1),
(98, 'Iceland', 'IS', 'ISL', 1, 0, 1),
(99, 'India', 'IN', 'IND', 1, 0, 1),
(100, 'Indonesia', 'ID', 'IDN', 1, 0, 1),
(101, 'Iran (Islamic Republic of)', 'IR', 'IRN', 1, 0, 1),
(102, 'Iraq', 'IQ', 'IRQ', 1, 0, 1),
(103, 'Ireland', 'IE', 'IRL', 1, 0, 1),
(104, 'Israel', 'IL', 'ISR', 1, 0, 1),
(105, 'Italy', 'IT', 'ITA', 1, 0, 1),
(106, 'Jamaica', 'JM', 'JAM', 1, 0, 1),
(107, 'Japan', 'JP', 'JPN', 1, 0, 1),
(108, 'Jordan', 'JO', 'JOR', 1, 0, 1),
(109, 'Kazakhstan', 'KZ', 'KAZ', 1, 0, 1),
(110, 'Kenya', 'KE', 'KEN', 1, 0, 1),
(111, 'Kiribati', 'KI', 'KIR', 1, 0, 1),
(112, 'North Korea', 'KP', 'PRK', 1, 0, 1),
(113, 'South Korea', 'KR', 'KOR', 1, 0, 1),
(114, 'Kuwait', 'KW', 'KWT', 1, 0, 1),
(115, 'Kyrgyzstan', 'KG', 'KGZ', 1, 0, 1),
(116, 'Lao People\'s Democratic Republic', 'LA', 'LAO', 1, 0, 1),
(117, 'Latvia', 'LV', 'LVA', 1, 0, 1),
(118, 'Lebanon', 'LB', 'LBN', 1, 0, 1),
(119, 'Lesotho', 'LS', 'LSO', 1, 0, 1),
(120, 'Liberia', 'LR', 'LBR', 1, 0, 1),
(121, 'Libyan Arab Jamahiriya', 'LY', 'LBY', 1, 0, 1),
(122, 'Liechtenstein', 'LI', 'LIE', 1, 0, 1),
(123, 'Lithuania', 'LT', 'LTU', 1, 0, 1),
(124, 'Luxembourg', 'LU', 'LUX', 1, 0, 1),
(125, 'Macau', 'MO', 'MAC', 1, 0, 1),
(126, 'FYROM', 'MK', 'MKD', 1, 0, 1),
(127, 'Madagascar', 'MG', 'MDG', 1, 0, 1),
(128, 'Malawi', 'MW', 'MWI', 1, 0, 1),
(129, 'Malaysia', 'MY', 'MYS', 1, 0, 1),
(130, 'Maldives', 'MV', 'MDV', 1, 0, 1),
(131, 'Mali', 'ML', 'MLI', 1, 0, 1),
(132, 'Malta', 'MT', 'MLT', 1, 0, 1),
(133, 'Marshall Islands', 'MH', 'MHL', 1, 0, 1),
(134, 'Martinique', 'MQ', 'MTQ', 1, 0, 1),
(135, 'Mauritania', 'MR', 'MRT', 1, 0, 1),
(136, 'Mauritius', 'MU', 'MUS', 1, 0, 1),
(137, 'Mayotte', 'YT', 'MYT', 1, 0, 1),
(138, 'Mexico', 'MX', 'MEX', 1, 0, 1),
(139, 'Micronesia, Federated States of', 'FM', 'FSM', 1, 0, 1),
(140, 'Moldova, Republic of', 'MD', 'MDA', 1, 0, 1),
(141, 'Monaco', 'MC', 'MCO', 1, 0, 1),
(142, 'Mongolia', 'MN', 'MNG', 1, 0, 1),
(143, 'Montserrat', 'MS', 'MSR', 1, 0, 1),
(144, 'Morocco', 'MA', 'MAR', 1, 0, 1),
(145, 'Mozambique', 'MZ', 'MOZ', 1, 0, 1),
(146, 'Myanmar', 'MM', 'MMR', 1, 0, 1),
(147, 'Namibia', 'NA', 'NAM', 1, 0, 1),
(148, 'Nauru', 'NR', 'NRU', 1, 0, 1),
(149, 'Nepal', 'NP', 'NPL', 1, 0, 1),
(150, 'Netherlands', 'NL', 'NLD', 1, 0, 1),
(151, 'Netherlands Antilles', 'AN', 'ANT', 1, 0, 1),
(152, 'New Caledonia', 'NC', 'NCL', 1, 0, 1),
(153, 'New Zealand', 'NZ', 'NZL', 1, 0, 1),
(154, 'Nicaragua', 'NI', 'NIC', 1, 0, 1),
(155, 'Niger', 'NE', 'NER', 1, 0, 1),
(156, 'Nigeria', 'NG', 'NGA', 1, 0, 1),
(157, 'Niue', 'NU', 'NIU', 1, 0, 1),
(158, 'Norfolk Island', 'NF', 'NFK', 1, 0, 1),
(159, 'Northern Mariana Islands', 'MP', 'MNP', 1, 0, 1),
(160, 'Norway', 'NO', 'NOR', 1, 0, 1),
(161, 'Oman', 'OM', 'OMN', 1, 0, 1),
(162, 'Pakistan', 'PK', 'PAK', 1, 0, 1),
(163, 'Palau', 'PW', 'PLW', 1, 0, 1),
(164, 'Panama', 'PA', 'PAN', 1, 0, 1),
(165, 'Papua New Guinea', 'PG', 'PNG', 1, 0, 1),
(166, 'Paraguay', 'PY', 'PRY', 1, 0, 1),
(167, 'Peru', 'PE', 'PER', 1, 0, 1),
(168, 'Philippines', 'PH', 'PHL', 1, 0, 1),
(169, 'Pitcairn', 'PN', 'PCN', 1, 0, 1),
(170, 'Poland', 'PL', 'POL', 1, 0, 1),
(171, 'Portugal', 'PT', 'PRT', 1, 0, 1),
(172, 'Puerto Rico', 'PR', 'PRI', 1, 0, 1),
(173, 'Qatar', 'QA', 'QAT', 1, 0, 1),
(174, 'Reunion', 'RE', 'REU', 1, 0, 1),
(175, 'România', 'RO', 'ROM', 1, 0, 1),
(176, 'Russian Federation', 'RU', 'RUS', 1, 0, 1),
(177, 'Rwanda', 'RW', 'RWA', 1, 0, 1),
(178, 'Saint Kitts and Nevis', 'KN', 'KNA', 1, 0, 1),
(179, 'Saint Lucia', 'LC', 'LCA', 1, 0, 1),
(180, 'Saint Vincent and the Grenadines', 'VC', 'VCT', 1, 0, 1),
(181, 'Samoa', 'WS', 'WSM', 1, 0, 1),
(182, 'San Marino', 'SM', 'SMR', 1, 0, 1),
(183, 'Sao Tome and Principe', 'ST', 'STP', 1, 0, 1),
(184, 'Saudi Arabia', 'SA', 'SAU', 1, 0, 1),
(185, 'Senegal', 'SN', 'SEN', 1, 0, 1),
(186, 'Seychelles', 'SC', 'SYC', 1, 0, 1),
(187, 'Sierra Leone', 'SL', 'SLE', 1, 0, 1),
(188, 'Singapore', 'SG', 'SGP', 1, 0, 1),
(189, 'Slovak Republic', 'SK', 'SVK', 1, 0, 1),
(190, 'Slovenia', 'SI', 'SVN', 1, 0, 1),
(191, 'Solomon Islands', 'SB', 'SLB', 1, 0, 1),
(192, 'Somalia', 'SO', 'SOM', 1, 0, 1),
(193, 'South Africa', 'ZA', 'ZAF', 1, 0, 1),
(194, 'South Georgia &amp; South Sandwich Islands', 'GS', 'SGS', 1, 0, 1),
(195, 'Spain', 'ES', 'ESP', 1, 0, 1),
(196, 'Sri Lanka', 'LK', 'LKA', 1, 0, 1),
(197, 'St. Helena', 'SH', 'SHN', 1, 0, 1),
(198, 'St. Pierre and Miquelon', 'PM', 'SPM', 1, 0, 1),
(199, 'Sudan', 'SD', 'SDN', 1, 0, 1),
(200, 'Suriname', 'SR', 'SUR', 1, 0, 1),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', 1, 0, 1),
(202, 'Swaziland', 'SZ', 'SWZ', 1, 0, 1),
(203, 'Sweden', 'SE', 'SWE', 1, 1, 1),
(204, 'Switzerland', 'CH', 'CHE', 1, 0, 1),
(205, 'Syrian Arab Republic', 'SY', 'SYR', 1, 0, 1),
(206, 'Taiwan', 'TW', 'TWN', 1, 0, 1),
(207, 'Tajikistan', 'TJ', 'TJK', 1, 0, 1),
(208, 'Tanzania, United Republic of', 'TZ', 'TZA', 1, 0, 1),
(209, 'Thailand', 'TH', 'THA', 1, 0, 1),
(210, 'Togo', 'TG', 'TGO', 1, 0, 1),
(211, 'Tokelau', 'TK', 'TKL', 1, 0, 1),
(212, 'Tonga', 'TO', 'TON', 1, 0, 1),
(213, 'Trinidad and Tobago', 'TT', 'TTO', 1, 0, 1),
(214, 'Tunisia', 'TN', 'TUN', 1, 0, 1),
(215, 'Turkey', 'TR', 'TUR', 1, 0, 1),
(216, 'Turkmenistan', 'TM', 'TKM', 1, 0, 1),
(217, 'Turks and Caicos Islands', 'TC', 'TCA', 1, 0, 1),
(218, 'Tuvalu', 'TV', 'TUV', 1, 0, 1),
(219, 'Uganda', 'UG', 'UGA', 1, 0, 1),
(220, 'Ukraine', 'UA', 'UKR', 1, 0, 1),
(221, 'United Arab Emirates', 'AE', 'ARE', 1, 0, 1),
(222, 'United Kingdom', 'GB', 'GBR', 1, 1, 1),
(223, 'United States', 'US', 'USA', 1, 0, 1),
(224, 'United States Minor Outlying Islands', 'UM', 'UMI', 1, 0, 1),
(225, 'Uruguay', 'UY', 'URY', 1, 0, 1),
(226, 'Uzbekistan', 'UZ', 'UZB', 1, 0, 1),
(227, 'Vanuatu', 'VU', 'VUT', 1, 0, 1),
(228, 'Vatican City State (Holy See)', 'VA', 'VAT', 1, 0, 1),
(229, 'Venezuela', 'VE', 'VEN', 1, 0, 1),
(230, 'Viet Nam', 'VN', 'VNM', 1, 0, 1),
(231, 'Virgin Islands (British)', 'VG', 'VGB', 1, 0, 1),
(232, 'Virgin Islands (U.S.)', 'VI', 'VIR', 1, 0, 1),
(233, 'Wallis and Futuna Islands', 'WF', 'WLF', 1, 0, 1),
(234, 'Western Sahara', 'EH', 'ESH', 1, 0, 1),
(235, 'Yemen', 'YE', 'YEM', 1, 0, 1),
(237, 'Democratic Republic of Congo', 'CD', 'COD', 1, 0, 1),
(238, 'Zambia', 'ZM', 'ZMB', 1, 0, 1),
(239, 'Zimbabwe', 'ZW', 'ZWE', 1, 0, 1),
(242, 'Montenegro', 'ME', 'MNE', 1, 0, 1),
(243, 'Serbia', 'RS', 'SRB', 1, 0, 1),
(244, 'Aaland Islands', 'AX', 'ALA', 1, 0, 1),
(245, 'Bonaire, Sint Eustatius and Saba', 'BQ', 'BES', 1, 0, 1),
(246, 'Curacao', 'CW', 'CUW', 1, 0, 1),
(247, 'Palestinian Territory, Occupied', 'PS', 'PSE', 1, 0, 1),
(248, 'South Sudan', 'SS', 'SSD', 1, 0, 1),
(249, 'St. Barthelemy', 'BL', 'BLM', 1, 0, 1),
(250, 'St. Martin (French part)', 'MF', 'MAF', 1, 0, 1),
(251, 'Canary Islands', 'IC', 'ICA', 1, 0, 1),
(252, 'Ascension Island (British)', 'AC', 'ASC', 1, 0, 1),
(253, 'Kosovo, Republic of', 'XK', 'UNK', 1, 0, 1),
(254, 'Isle of Man', 'IM', 'IMN', 1, 0, 1),
(255, 'Tristan da Cunha', 'TA', 'SHN', 1, 0, 1),
(256, 'Guernsey', 'GG', 'GGY', 1, 0, 1),
(257, 'Jersey', 'JE', 'JEY', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ve_coupon`
--

CREATE TABLE `ve_coupon` (
  `coupon_id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `discount` decimal(15,4) NOT NULL,
  `logged` tinyint(1) NOT NULL,
  `shipping` tinyint(1) NOT NULL,
  `total` decimal(15,4) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `uses_total` int NOT NULL,
  `uses_customer` int NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_coupon`
--

INSERT INTO `ve_coupon` (`coupon_id`, `name`, `code`, `type`, `discount`, `logged`, `shipping`, `total`, `date_start`, `date_end`, `uses_total`, `uses_customer`, `status`, `date_added`) VALUES
(1, '-10% Discount', '2222', 'P', '10.0000', 0, 0, '0.0000', '2014-01-01', '2020-01-01', 10, 10, 0, '2009-01-27 13:55:03'),
(2, 'Free Shipping', '3333', 'P', '0.0000', 0, 1, '100.0000', '2014-01-01', '2014-02-01', 10, 10, 0, '2009-03-14 21:13:53'),
(3, '-10.00 Discount', '1111', 'F', '10.0000', 0, 0, '10.0000', '2014-01-01', '2020-01-01', 100000, 10000, 0, '2009-03-14 21:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `ve_coupon_category`
--

CREATE TABLE `ve_coupon_category` (
  `coupon_id` int NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_coupon_history`
--

CREATE TABLE `ve_coupon_history` (
  `coupon_history_id` int NOT NULL,
  `coupon_id` int NOT NULL,
  `order_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `amount` decimal(15,4) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_coupon_product`
--

CREATE TABLE `ve_coupon_product` (
  `coupon_product_id` int NOT NULL,
  `coupon_id` int NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_cron`
--

CREATE TABLE `ve_cron` (
  `cron_id` int NOT NULL,
  `code` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cycle` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `action` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_cron`
--

INSERT INTO `ve_cron` (`cron_id`, `code`, `description`, `cycle`, `action`, `status`, `date_added`, `date_modified`) VALUES
(1, 'currency', 'Updates currency conversion values.', 'day', 'cron/currency', 1, '2014-09-25 14:40:00', '2014-09-25 14:40:00'),
(2, 'gdpr', 'Deletes and send emails to customers who have requested their GPDR data to be deleted.', 'day', 'cron/gdpr', 1, '2014-09-25 14:40:00', '2014-09-25 14:40:00'),
(3, 'subscription', 'Processes subscriptions by creating new orders, charging customers and sending mails to customers telling them that their subscription has been processed.', 'day', 'cron/subscription', 0, '2014-09-25 14:40:00', '2014-09-25 14:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `ve_currency`
--

CREATE TABLE `ve_currency` (
  `currency_id` int NOT NULL,
  `title` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `symbol_left` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `symbol_right` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `decimal_place` int NOT NULL,
  `value` double(15,8) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_currency`
--

INSERT INTO `ve_currency` (`currency_id`, `title`, `code`, `symbol_left`, `symbol_right`, `decimal_place`, `value`, `status`, `date_modified`) VALUES
(1, 'Pound Sterling', 'GBP', '£', '', 2, 0.78647059, 1, '2024-01-02 14:18:22'),
(2, 'US Dollar', 'USD', '$', '', 2, 1.00000000, 1, '2024-01-02 14:18:22'),
(3, 'Euro', 'EUR', '', '€', 2, 0.90497738, 1, '2024-01-02 14:18:22'),
(4, 'Hong Kong Dollar', 'HKD', 'HK$', '', 2, 7.81122172, 0, '2024-01-02 14:18:22'),
(5, 'Indian Rupee', 'INR', '₹', '', 2, 83.17149321, 0, '2024-01-02 14:18:22'),
(6, 'Russian Ruble', 'RUB', '', '₽', 2, 56.40360000, 0, '2018-02-16 12:00:00'),
(7, 'Chinese Yuan Renminbi', 'CNY', '¥', '', 2, 7.10488688, 0, '2024-01-02 14:18:22'),
(8, 'Australian Dollar', 'AUD', '$', '', 2, 1.47176471, 0, '2024-01-02 14:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `ve_customer`
--

CREATE TABLE `ve_customer` (
  `customer_id` int NOT NULL,
  `customer_group_id` int NOT NULL,
  `store_id` int NOT NULL DEFAULT '0',
  `language_id` int NOT NULL,
  `firstname` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(96) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telephone` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `custom_field` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  `ip` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `safe` tinyint(1) NOT NULL,
  `commenter` tinyint(1) NOT NULL,
  `token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_customer_activity`
--

CREATE TABLE `ve_customer_activity` (
  `customer_activity_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `key` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_customer_affiliate`
--

CREATE TABLE `ve_customer_affiliate` (
  `customer_id` int NOT NULL,
  `company` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tracking` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `balance` decimal(15,4) NOT NULL,
  `commission` decimal(4,2) NOT NULL DEFAULT '0.00',
  `tax` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_method` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cheque` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `paypal` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bank_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bank_branch_number` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bank_swift_code` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bank_account_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bank_account_number` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `custom_field` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_customer_affiliate_report`
--

CREATE TABLE `ve_customer_affiliate_report` (
  `customer_affiliate_report_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `store_id` int NOT NULL,
  `ip` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_customer_approval`
--

CREATE TABLE `ve_customer_approval` (
  `customer_approval_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `type` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_customer_authorize`
--

CREATE TABLE `ve_customer_authorize` (
  `customer_authorize_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `token` varchar(96) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total` int NOT NULL,
  `ip` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_customer_group`
--

CREATE TABLE `ve_customer_group` (
  `customer_group_id` int NOT NULL,
  `approval` int NOT NULL,
  `sort_order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_customer_group`
--

INSERT INTO `ve_customer_group` (`customer_group_id`, `approval`, `sort_order`) VALUES
(1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ve_customer_group_description`
--

CREATE TABLE `ve_customer_group_description` (
  `customer_group_id` int NOT NULL,
  `language_id` int NOT NULL,
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_customer_group_description`
--

INSERT INTO `ve_customer_group_description` (`customer_group_id`, `language_id`, `name`, `description`) VALUES
(1, 1, 'Default', 'Default customer group');

-- --------------------------------------------------------

--
-- Table structure for table `ve_customer_history`
--

CREATE TABLE `ve_customer_history` (
  `customer_history_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_customer_ip`
--

CREATE TABLE `ve_customer_ip` (
  `customer_ip_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `store_id` int NOT NULL,
  `ip` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_customer_login`
--

CREATE TABLE `ve_customer_login` (
  `customer_login_id` int NOT NULL,
  `email` varchar(96) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total` int NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_customer_online`
--

CREATE TABLE `ve_customer_online` (
  `ip` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customer_id` int NOT NULL,
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `referer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_customer_reward`
--

CREATE TABLE `ve_customer_reward` (
  `customer_reward_id` int NOT NULL,
  `customer_id` int NOT NULL DEFAULT '0',
  `order_id` int NOT NULL DEFAULT '0',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `points` int NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_customer_search`
--

CREATE TABLE `ve_customer_search` (
  `customer_search_id` int NOT NULL,
  `store_id` int NOT NULL,
  `language_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `keyword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `category_id` int NOT NULL,
  `sub_category` tinyint(1) NOT NULL,
  `description` tinyint(1) NOT NULL,
  `products` int NOT NULL,
  `ip` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_customer_transaction`
--

CREATE TABLE `ve_customer_transaction` (
  `customer_transaction_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `order_id` int NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `amount` decimal(15,4) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_customer_wishlist`
--

CREATE TABLE `ve_customer_wishlist` (
  `customer_id` int NOT NULL,
  `product_id` int NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_custom_field`
--

CREATE TABLE `ve_custom_field` (
  `custom_field_id` int NOT NULL,
  `type` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `validation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `sort_order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_custom_field`
--

INSERT INTO `ve_custom_field` (`custom_field_id`, `type`, `value`, `validation`, `location`, `status`, `sort_order`) VALUES
(1, 'select', '', '', 'account', 0, 1),
(2, 'radio', '', '', 'account', 0, 2),
(3, 'checkbox', '', '', 'account', 0, 3),
(4, 'text', '', '', 'account', 0, 4),
(5, 'textarea', '', '', 'account', 0, 5),
(6, 'file', '', '', 'account', 0, 6),
(7, 'date', '', '', 'account', 0, 7),
(8, 'time', '', '', 'account', 0, 8),
(9, 'datetime', '', '', 'account', 0, 9),
(11, 'checkbox', '', '', 'address', 0, 3),
(12, 'time', '', '', 'address', 0, 8),
(13, 'date', '', '', 'address', 0, 7),
(14, 'datetime', '', '', 'address', 0, 9),
(15, 'file', '', '', 'address', 0, 6),
(16, 'radio', '', '', 'address', 0, 2),
(17, 'select', '', '', 'address', 0, 1),
(18, 'text', '', '', 'address', 0, 4),
(19, 'textarea', '', '', 'address', 0, 5),
(20, 'checkbox', '', '', 'affiliate', 0, 3),
(21, 'date', '', '', 'affiliate', 0, 8),
(22, 'datetime', '', '', 'affiliate', 0, 9),
(23, 'file', '', '', 'affiliate', 0, 6),
(24, 'radio', '', '', 'affiliate', 0, 2),
(25, 'select', '', '', 'affiliate', 0, 1),
(26, 'text', '', '', 'affiliate', 0, 4),
(27, 'textarea', '', '', 'affiliate', 0, 5),
(28, 'time', '', '', 'affiliate', 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `ve_custom_field_customer_group`
--

CREATE TABLE `ve_custom_field_customer_group` (
  `custom_field_id` int NOT NULL,
  `customer_group_id` int NOT NULL,
  `required` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_custom_field_customer_group`
--

INSERT INTO `ve_custom_field_customer_group` (`custom_field_id`, `customer_group_id`, `required`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 1),
(4, 1, 1),
(5, 1, 1),
(6, 1, 1),
(7, 1, 1),
(8, 1, 1),
(9, 1, 1),
(11, 1, 1),
(12, 1, 1),
(13, 1, 1),
(14, 1, 1),
(15, 1, 1),
(16, 1, 1),
(17, 1, 1),
(18, 1, 1),
(19, 1, 1),
(20, 1, 1),
(21, 1, 1),
(22, 1, 1),
(23, 1, 1),
(24, 1, 1),
(25, 1, 1),
(26, 1, 1),
(27, 1, 1),
(28, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ve_custom_field_description`
--

CREATE TABLE `ve_custom_field_description` (
  `custom_field_id` int NOT NULL,
  `language_id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_custom_field_description`
--

INSERT INTO `ve_custom_field_description` (`custom_field_id`, `language_id`, `name`) VALUES
(1, 1, 'Select'),
(2, 1, 'Radio'),
(3, 1, 'Checkbox'),
(4, 1, 'Text'),
(5, 1, 'Textarea'),
(6, 1, 'File'),
(7, 1, 'Date'),
(8, 1, 'Time'),
(9, 1, 'Date &amp; Time'),
(11, 1, 'Checkbox'),
(12, 1, 'Time'),
(13, 1, 'Date'),
(14, 1, 'Date &amp; Time'),
(15, 1, 'File'),
(16, 1, 'Radio'),
(17, 1, 'Select'),
(18, 1, 'Text'),
(19, 1, 'Textarea'),
(20, 1, 'Checkbox'),
(21, 1, 'Date'),
(22, 1, 'Date &amp; Time'),
(23, 1, 'File'),
(24, 1, 'Radio'),
(25, 1, 'Select'),
(26, 1, 'Text'),
(27, 1, 'Textarea'),
(28, 1, 'Time');

-- --------------------------------------------------------

--
-- Table structure for table `ve_custom_field_value`
--

CREATE TABLE `ve_custom_field_value` (
  `custom_field_value_id` int NOT NULL,
  `custom_field_id` int NOT NULL,
  `sort_order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_custom_field_value`
--

INSERT INTO `ve_custom_field_value` (`custom_field_value_id`, `custom_field_id`, `sort_order`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 2),
(6, 2, 3),
(7, 3, 1),
(8, 3, 2),
(9, 3, 3),
(20, 11, 1),
(21, 11, 2),
(22, 11, 3),
(32, 16, 1),
(33, 16, 2),
(34, 16, 3),
(35, 17, 1),
(36, 17, 2),
(37, 17, 3),
(38, 20, 1),
(39, 20, 2),
(40, 20, 3),
(41, 24, 1),
(42, 24, 2),
(43, 24, 3),
(44, 25, 0),
(45, 25, 0),
(46, 25, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ve_custom_field_value_description`
--

CREATE TABLE `ve_custom_field_value_description` (
  `custom_field_value_id` int NOT NULL,
  `language_id` int NOT NULL,
  `custom_field_id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_custom_field_value_description`
--

INSERT INTO `ve_custom_field_value_description` (`custom_field_value_id`, `language_id`, `custom_field_id`, `name`) VALUES
(1, 1, 1, 'Test 1'),
(2, 1, 1, 'test 2'),
(3, 1, 1, 'Test 3'),
(4, 1, 2, 'Test 1'),
(5, 1, 2, 'Test 2'),
(6, 1, 2, 'Test 3'),
(7, 1, 3, 'Test 1'),
(8, 1, 3, 'Test 2'),
(9, 1, 3, 'Test 3'),
(20, 1, 11, 'Test 1'),
(21, 1, 11, 'Test 2'),
(22, 1, 11, 'Test 3'),
(32, 1, 16, 'Test 1'),
(33, 1, 16, 'Test 2'),
(34, 1, 16, 'Test 3'),
(35, 1, 17, 'Test 1'),
(36, 1, 17, 'Test 2'),
(37, 1, 17, 'Test 3'),
(38, 1, 20, 'Test 1'),
(39, 1, 20, 'Test 2'),
(40, 1, 20, 'Test 3'),
(41, 1, 24, 'Test 1'),
(42, 1, 24, 'Test 2'),
(43, 1, 24, 'Test 3'),
(44, 1, 25, 'Test 1'),
(45, 1, 25, 'Test 2'),
(46, 1, 25, 'Test 3');

-- --------------------------------------------------------

--
-- Table structure for table `ve_download`
--

CREATE TABLE `ve_download` (
  `download_id` int NOT NULL,
  `filename` varchar(160) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mask` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_download_description`
--

CREATE TABLE `ve_download_description` (
  `download_id` int NOT NULL,
  `language_id` int NOT NULL,
  `name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_download_report`
--

CREATE TABLE `ve_download_report` (
  `download_report_id` int NOT NULL,
  `download_id` int NOT NULL,
  `store_id` int NOT NULL,
  `ip` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_event`
--

CREATE TABLE `ve_event` (
  `event_id` int NOT NULL,
  `code` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `trigger` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `action` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `sort_order` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_event`
--

INSERT INTO `ve_event` (`event_id`, `code`, `description`, `trigger`, `action`, `status`, `sort_order`) VALUES
(1, 'activity_customer_add', 'Adds new customer entry in the activity log.', 'catalog/model/account/customer/addCustomer/after', 'event/activity.addCustomer', 1, 1),
(2, 'activity_customer_edit', 'Adds edit customer entry in the activity log.', 'catalog/model/account/customer/editCustomer/after', 'event/activity.editCustomer', 1, 1),
(3, 'activity_customer_password', 'Adds edit password entry in the activity log.', 'catalog/model/account/customer/editPassword/after', 'event/activity.editPassword', 1, 1),
(4, 'activity_customer_forgotten', 'Adds forgotten password entry in the activity log.', 'catalog/model/account/customer/editCode/after', 'event/activity.forgotten', 1, 1),
(5, 'activity_customer_login', 'Adds edit customer entry in the activity log.', 'catalog/model/account/customer/deleteLoginAttempts/after', 'event/activity.login', 1, 1),
(6, 'activity_customer_transaction', 'Adds edit customer entry in the activity log.', 'catalog/model/account/customer/addTransaction/after', 'event/activity.addTransaction', 1, 1),
(7, 'activity_address_add', 'Adds new address entry in the activity log.', 'catalog/model/account/address/addAddress/after', 'event/activity.addAddress', 1, 1),
(8, 'activity_address_edit', 'Adds edit address entry in the activity log.', 'catalog/model/account/address/editAddress/after', 'event/activity.editAddress', 1, 1),
(9, 'activity_address_delete', 'Adds delete address entry in the activity log.', 'catalog/model/account/address/deleteAddress/after', 'event/activity.deleteAddress', 1, 1),
(10, 'activity_affiliate_add', 'Adds new affiliate entry in the activity log.', 'catalog/model/account/affiliate/addAffiliate/after', 'event/activity.addAffiliate', 1, 1),
(11, 'activity_affiliate_edit', 'Adds edit affiliate entry in the activity log.', 'catalog/model/account/affiliate/editAffiliate/after', 'event/activity.editAffiliate', 1, 1),
(12, 'activity_order_add', 'Adds new order entry in the activity log.', 'catalog/model/checkout/order/addHistory/before', 'event/activity.addHistory', 1, 1),
(13, 'activity_return_add', 'Adds new return entry in the activity log.', 'catalog/model/account/returns/addReturn/after', 'event/activity.addReturn', 1, 1),
(14, 'mail_customer_add', 'Sends mail to newly registered customers.', 'catalog/model/account/customer/addCustomer/after', 'mail/register', 1, 1),
(15, 'mail_customer_alert', 'Sends alert mail to store owner when a new customer registers.', 'catalog/model/account/customer/addCustomer/after', 'mail/register.alert', 1, 1),
(16, 'mail_customer_transaction', 'Sends mail to the customer when their transaction balance is updated.', 'catalog/model/account/customer/addTransaction/after', 'mail/transaction', 1, 1),
(17, 'mail_customer_forgotten', 'Sends mail to customers who have forgotten their password.', 'catalog/model/account/customer/editCode/after', 'mail/forgotten', 1, 1),
(18, 'mail_affiliate_add', 'Sends mail to newly registered affiliates.', 'catalog/model/account/affiliate/addAffiliate/after', 'mail/affiliate', 1, 1),
(19, 'mail_affiliate_alert', 'Sends mail to new customers.', 'catalog/model/account/affiliate/addAffiliate/after', 'mail/affiliate.alert', 1, 1),
(20, 'mail_order', 'Sends mail to customer when they make an order.', 'catalog/model/checkout/order/addHistory/before', 'mail/order', 1, 1),
(21, 'mail_order_alert', 'Sends alert mail to new store owner when a new order is made.', 'catalog/model/checkout/order/addHistory/before', 'mail/order.alert', 1, 1),
(22, 'mail_gdpr', 'Sends mail to customers who have requested their data exported or deleted.', 'catalog/model/account/gdpr/addGdpr/after', 'mail/gdpr', 1, 1),
(23, 'mail_gdpr_delete', 'Sends mail to customers to let them know their GDPR data has been deleted.', 'catalog/model/account/gdpr/editStatus/after', 'mail/gdpr.remove', 1, 1),
(24, 'mail_voucher', 'Sends mail to voucher recipient once the order is completed.', 'catalog/model/checkout/order/addHistory/after', 'mail/voucher', 1, 1),
(25, 'mail_review', 'Sends mail to store owner that a new review has been submitted.', 'catalog/model/catalog/review/addReview/after', 'mail/review', 1, 1),
(26, 'mail_subscription', 'Sends mail to store owner that a new subscription has been created.', 'catalog/model/checkout/subscription/addSubscription/after', 'mail/subscription', 1, 1),
(27, 'statistics_review_add', 'Updates review statistics when a new review is added.', 'catalog/model/catalog/review/addReview/after', 'event/statistics.addReview', 1, 1),
(28, 'statistics_return_add', 'Updates return statistics when a new return is added.', 'catalog/model/account/returns/addReturn/after', 'event/statistics.addReturn', 1, 1),
(29, 'statistics_return_delete', 'Updates return statistics when a return is deleted.', 'admin/model/sale/returns/deleteReturn/after', 'event/statistics.deleteReturn', 1, 1),
(30, 'statistics_order_history', 'Updates order status statistics when a order has been updated.', 'catalog/model/checkout/order/addHistory/before', 'event/statistics.addHistory', 1, 1),
(31, 'admin_currency_add', 'Updates currencies when a new currency is added.', 'admin/model/localisation/currency/addCurrency/after', 'event/currency', 1, 1),
(32, 'admin_currency_edit', 'Updates currencies when a currency is edited.', 'admin/model/localisation/currency/editCurrency/after', 'event/currency', 1, 1),
(33, 'admin_currency_setting', 'Updates currencies when settings are saved.', 'admin/model/setting/setting/editSetting/after', 'event/currency', 1, 1),
(34, 'admin_mail_gdpr', 'Sends approval or denial mail to customer who requested GDPR data export or deletion.', 'admin/model/customer/gdpr/editStatus/after', 'mail/gdpr', 1, 1),
(35, 'admin_mail_affiliate_approve', 'Sends mail to the affiliate when their account is approved.', 'admin/model/customer/customer_approval/approveAffiliate/after', 'mail/affiliate.approve', 1, 1),
(36, 'admin_mail_affiliate_deny', 'Sends mail to the affiliate when their account is denied.', 'admin/model/customer/customer_approval/denyAffiliate/after', 'mail/affiliate.deny', 1, 1),
(37, 'admin_mail_customer_approve', 'Sends mail to the customer when their account is approved.', 'admin/model/customer/customer_approval/approveCustomer/after', 'mail/customer.approve', 1, 1),
(38, 'admin_mail_customer_deny', 'Sends mail to the customer when their account is denied.', 'admin/model/customer/customer_approval/denyCustomer/after', 'mail/customer.deny', 1, 1),
(39, 'admin_mail_customer_transaction', 'Sends mail to the customer when their transaction balance is updated.', 'admin/model/customer/customer/addTransaction/after', 'mail/transaction', 1, 1),
(40, 'admin_mail_reward', 'Sends mail to the customer when their reward balance is updated.', 'admin/model/customer/customer/addReward/after', 'mail/reward', 1, 1),
(41, 'admin_mail_return', 'Sends mail to customer when their return status is changed.', 'admin/model/sale/returns/addHistory/after', 'mail/returns', 1, 1),
(42, 'admin_mail_user_forgotten', 'Sends mail to users who have forgotten their password.', 'admin/model/user/user/editCode/after', 'mail/forgotten', 1, 1),
(43, 'admin_mail_user_authorize', 'Sends mail login code to users email to authorize login from a new device.', 'admin/controller/common/authorize.send/after', 'mail/authorize', 1, 1),
(44, 'admin_mail_user_authorize_reset', 'Sends reset link to user who`s account is locked out after 3 wrong authorize code login attempts.', 'admin/model/user/user/editCode/after', 'mail/authorize.reset', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ve_extension`
--

CREATE TABLE `ve_extension` (
  `extension_id` int NOT NULL,
  `extension` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_extension`
--

INSERT INTO `ve_extension` (`extension_id`, `extension`, `type`, `code`) VALUES
(1, 'opencart', 'currency', 'ecb'),
(2, 'opencart', 'module', 'featured'),
(3, 'opencart', 'module', 'banner'),
(4, 'opencart', 'payment', 'cod'),
(5, 'opencart', 'payment', 'free_checkout'),
(6, 'opencart', 'module', 'category'),
(7, 'opencart', 'module', 'account'),
(8, 'opencart', 'module', 'topic'),
(9, 'opencart', 'shipping', 'flat'),
(10, 'opencart', 'theme', 'basic'),
(11, 'opencart', 'total', 'credit'),
(12, 'opencart', 'total', 'shipping'),
(13, 'opencart', 'total', 'sub_total'),
(14, 'opencart', 'total', 'tax'),
(15, 'opencart', 'total', 'total'),
(16, 'opencart', 'total', 'handling'),
(17, 'opencart', 'total', 'low_order_fee'),
(18, 'opencart', 'total', 'coupon'),
(19, 'opencart', 'total', 'reward'),
(20, 'opencart', 'total', 'voucher'),
(21, 'opencart', 'dashboard', 'activity'),
(22, 'opencart', 'dashboard', 'sale'),
(23, 'opencart', 'dashboard', 'recent'),
(24, 'opencart', 'dashboard', 'order'),
(25, 'opencart', 'dashboard', 'online'),
(26, 'opencart', 'dashboard', 'map'),
(27, 'opencart', 'dashboard', 'customer'),
(28, 'opencart', 'dashboard', 'chart'),
(29, 'opencart', 'report', 'sale_coupon'),
(30, 'opencart', 'report', 'customer_search'),
(31, 'opencart', 'report', 'customer_transaction'),
(32, 'opencart', 'report', 'product_purchased'),
(33, 'opencart', 'report', 'product_viewed'),
(34, 'opencart', 'report', 'sale_return'),
(35, 'opencart', 'report', 'sale_order'),
(36, 'opencart', 'report', 'sale_shipping'),
(37, 'opencart', 'report', 'sale_tax'),
(38, 'opencart', 'report', 'customer_activity'),
(39, 'opencart', 'report', 'customer_order'),
(40, 'opencart', 'report', 'customer_reward'),
(41, 'opencart', 'report', 'marketing'),
(43, 'opencart', 'report', 'customer'),
(44, 'opencart', 'module', 'filter'),
(45, 'opencart', 'payment', 'bank_transfer'),
(46, 'opencart', 'shipping', 'free'),
(47, 'opencart', 'module', 'store'),
(48, 'opencart', 'module', 'bestseller'),
(49, 'opencart', 'module', 'mostviewed'),
(52, 'opencart', 'module', 'latest');

-- --------------------------------------------------------

--
-- Table structure for table `ve_extension_install`
--

CREATE TABLE `ve_extension_install` (
  `extension_install_id` int NOT NULL,
  `extension_id` int NOT NULL,
  `extension_download_id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `version` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_extension_install`
--

INSERT INTO `ve_extension_install` (`extension_install_id`, `extension_id`, `extension_download_id`, `name`, `description`, `code`, `version`, `author`, `link`, `status`, `date_added`) VALUES
(1, 1, 0, 'OpenCart Default Extensions', 'This extension contains all the default extensions for modules, currencies, payment methods, shipping methods, anti-fraud, themes, order totals and reports.', 'opencart', '1.0', 'OpenCart Ltd', 'http://www.opencart.com', 1, '2020-08-29 15:35:39'),
(3, 1, 0, 'Stripe', '', 'stripe', '1.0.0', 'stripe', 'https://velecron.com/', 1, '2023-12-04 19:55:24'),
(12, 1, 0, 'OpenCart Language Example', 'This extension is only here for so developers can see how to create a language extension for OpenCart.', 'oc_language_example', '1.0', 'OpenCart Ltd', 'https://www.opencart.com', 0, '2023-12-22 01:02:01'),
(13, 1, 0, 'OpenCart OCMOD Example', '', 'oc_ocmod_example', '1.0', 'OpenCart Ltd', 'https://www.opencart.com', 0, '2023-12-22 01:02:01'),
(14, 1, 0, 'OpenCart Payment Example', 'This extension is only here for so developers can see how to create a payment extension for OpenCart.', 'oc_payment_example', '1.0', 'OpenCart Ltd', 'https://www.opencart.com', 0, '2023-12-22 01:02:01'),
(15, 1, 0, 'OpenCart Theme Example', 'This extension is only here for so developers can see how to create a theme extension for OpenCart.', 'oc_theme_example', '1.0', 'OpenCart Ltd', 'https://www.opencart.com', 0, '2023-12-22 01:02:01'),
(16, 1, 0, 'PayPal', '', 'paypal', '2.1.0', 'Dreamvention', 'https://dreamvention.com/', 1, '2023-12-22 01:02:01');

-- --------------------------------------------------------

--
-- Table structure for table `ve_extension_path`
--

CREATE TABLE `ve_extension_path` (
  `extension_path_id` int NOT NULL,
  `extension_install_id` int NOT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_extension_path`
--

INSERT INTO `ve_extension_path` (`extension_path_id`, `extension_install_id`, `path`) VALUES
(1, 1, 'opencart'),
(2, 1, 'opencart/admin'),
(3, 1, 'opencart/admin/controller'),
(4, 1, 'opencart/admin/controller/analytics'),
(5, 1, 'opencart/admin/controller/analytics/index.html'),
(6, 1, 'opencart/admin/controller/captcha'),
(7, 1, 'opencart/admin/controller/captcha/basic.php'),
(8, 1, 'opencart/admin/controller/currency'),
(9, 1, 'opencart/admin/controller/currency/ecb.php'),
(10, 1, 'opencart/admin/controller/currency/fixer.php'),
(11, 1, 'opencart/admin/controller/dashboard'),
(12, 1, 'opencart/admin/controller/dashboard/activity.php'),
(13, 1, 'opencart/admin/controller/dashboard/chart.php'),
(14, 1, 'opencart/admin/controller/dashboard/customer.php'),
(15, 1, 'opencart/admin/controller/dashboard/map.php'),
(16, 1, 'opencart/admin/controller/dashboard/online.php'),
(17, 1, 'opencart/admin/controller/dashboard/order.php'),
(18, 1, 'opencart/admin/controller/dashboard/recent.php'),
(19, 1, 'opencart/admin/controller/dashboard/sale.php'),
(20, 1, 'opencart/admin/controller/feed'),
(21, 1, 'opencart/admin/controller/feed/index.html'),
(22, 1, 'opencart/admin/controller/fraud'),
(23, 1, 'opencart/admin/controller/fraud/ip.php'),
(24, 1, 'opencart/admin/controller/module'),
(25, 1, 'opencart/admin/controller/module/account.php'),
(26, 1, 'opencart/admin/controller/module/banner.php'),
(27, 1, 'opencart/admin/controller/module/bestseller.php'),
(28, 1, 'opencart/admin/controller/module/category.php'),
(29, 1, 'opencart/admin/controller/module/featured.php'),
(30, 1, 'opencart/admin/controller/module/filter.php'),
(31, 1, 'opencart/admin/controller/module/html.php'),
(32, 1, 'opencart/admin/controller/module/information.php'),
(33, 1, 'opencart/admin/controller/module/latest.php'),
(34, 1, 'opencart/admin/controller/module/special.php'),
(35, 1, 'opencart/admin/controller/module/store.php'),
(36, 1, 'opencart/admin/controller/payment'),
(37, 1, 'opencart/admin/controller/payment/bank_transfer.php'),
(38, 1, 'opencart/admin/controller/payment/cheque.php'),
(39, 1, 'opencart/admin/controller/payment/cod.php'),
(40, 1, 'opencart/admin/controller/payment/free_checkout.php'),
(41, 1, 'opencart/admin/controller/report'),
(42, 1, 'opencart/admin/controller/report/customer.php'),
(43, 1, 'opencart/admin/controller/report/customer_activity.php'),
(44, 1, 'opencart/admin/controller/report/customer_order.php'),
(45, 1, 'opencart/admin/controller/report/customer_reward.php'),
(46, 1, 'opencart/admin/controller/report/customer_search.php'),
(47, 1, 'opencart/admin/controller/report/customer_subscription.php'),
(48, 1, 'opencart/admin/controller/report/customer_transaction.php'),
(49, 1, 'opencart/admin/controller/report/marketing.php'),
(50, 1, 'opencart/admin/controller/report/product_purchased.php'),
(51, 1, 'opencart/admin/controller/report/product_viewed.php'),
(52, 1, 'opencart/admin/controller/report/sale_coupon.php'),
(53, 1, 'opencart/admin/controller/report/sale_order.php'),
(54, 1, 'opencart/admin/controller/report/sale_return.php'),
(55, 1, 'opencart/admin/controller/report/sale_shipping.php'),
(56, 1, 'opencart/admin/controller/report/sale_tax.php'),
(57, 1, 'opencart/admin/controller/shipping'),
(58, 1, 'opencart/admin/controller/shipping/flat.php'),
(59, 1, 'opencart/admin/controller/shipping/free.php'),
(60, 1, 'opencart/admin/controller/shipping/item.php'),
(61, 1, 'opencart/admin/controller/shipping/pickup.php'),
(62, 1, 'opencart/admin/controller/shipping/weight.php'),
(63, 1, 'opencart/admin/controller/theme'),
(64, 1, 'opencart/admin/controller/theme/basic.php'),
(65, 1, 'opencart/admin/controller/total'),
(66, 1, 'opencart/admin/controller/total/coupon.php'),
(67, 1, 'opencart/admin/controller/total/credit.php'),
(68, 1, 'opencart/admin/controller/total/handling.php'),
(69, 1, 'opencart/admin/controller/total/low_order_fee.php'),
(70, 1, 'opencart/admin/controller/total/reward.php'),
(71, 1, 'opencart/admin/controller/total/shipping.php'),
(72, 1, 'opencart/admin/controller/total/sub_total.php'),
(73, 1, 'opencart/admin/controller/total/tax.php'),
(74, 1, 'opencart/admin/controller/total/total.php'),
(75, 1, 'opencart/admin/controller/total/voucher.php'),
(76, 1, 'opencart/admin/language'),
(77, 1, 'opencart/admin/language/en-gb'),
(78, 1, 'opencart/admin/language/en-gb/captcha'),
(79, 1, 'opencart/admin/language/en-gb/captcha/basic.php'),
(80, 1, 'opencart/admin/language/en-gb/currency'),
(81, 1, 'opencart/admin/language/en-gb/currency/ecb.php'),
(82, 1, 'opencart/admin/language/en-gb/currency/fixer.php'),
(83, 1, 'opencart/admin/language/en-gb/dashboard'),
(84, 1, 'opencart/admin/language/en-gb/dashboard/activity.php'),
(85, 1, 'opencart/admin/language/en-gb/dashboard/chart.php'),
(86, 1, 'opencart/admin/language/en-gb/dashboard/customer.php'),
(87, 1, 'opencart/admin/language/en-gb/dashboard/map.php'),
(88, 1, 'opencart/admin/language/en-gb/dashboard/online.php'),
(89, 1, 'opencart/admin/language/en-gb/dashboard/order.php'),
(90, 1, 'opencart/admin/language/en-gb/dashboard/recent.php'),
(91, 1, 'opencart/admin/language/en-gb/dashboard/sale.php'),
(92, 1, 'opencart/admin/language/en-gb/fraud'),
(93, 1, 'opencart/admin/language/en-gb/fraud/ip.php'),
(94, 1, 'opencart/admin/language/en-gb/module'),
(95, 1, 'opencart/admin/language/en-gb/module/account.php'),
(96, 1, 'opencart/admin/language/en-gb/module/banner.php'),
(97, 1, 'opencart/admin/language/en-gb/module/bestseller.php'),
(98, 1, 'opencart/admin/language/en-gb/module/category.php'),
(99, 1, 'opencart/admin/language/en-gb/module/featured.php'),
(100, 1, 'opencart/admin/language/en-gb/module/filter.php'),
(101, 1, 'opencart/admin/language/en-gb/module/html.php'),
(102, 1, 'opencart/admin/language/en-gb/module/information.php'),
(103, 1, 'opencart/admin/language/en-gb/module/latest.php'),
(104, 1, 'opencart/admin/language/en-gb/module/special.php'),
(105, 1, 'opencart/admin/language/en-gb/module/store.php'),
(106, 1, 'opencart/admin/language/en-gb/payment'),
(107, 1, 'opencart/admin/language/en-gb/payment/bank_transfer.php'),
(108, 1, 'opencart/admin/language/en-gb/payment/cheque.php'),
(109, 1, 'opencart/admin/language/en-gb/payment/cod.php'),
(110, 1, 'opencart/admin/language/en-gb/payment/free_checkout.php'),
(111, 1, 'opencart/admin/language/en-gb/report'),
(112, 1, 'opencart/admin/language/en-gb/report/customer.php'),
(113, 1, 'opencart/admin/language/en-gb/report/customer_activity.php'),
(114, 1, 'opencart/admin/language/en-gb/report/customer_order.php'),
(115, 1, 'opencart/admin/language/en-gb/report/customer_reward.php'),
(116, 1, 'opencart/admin/language/en-gb/report/customer_search.php'),
(117, 1, 'opencart/admin/language/en-gb/report/customer_subscription.php'),
(118, 1, 'opencart/admin/language/en-gb/report/customer_transaction.php'),
(119, 1, 'opencart/admin/language/en-gb/report/marketing.php'),
(120, 1, 'opencart/admin/language/en-gb/report/product_purchased.php'),
(121, 1, 'opencart/admin/language/en-gb/report/product_viewed.php'),
(122, 1, 'opencart/admin/language/en-gb/report/sale_coupon.php'),
(123, 1, 'opencart/admin/language/en-gb/report/sale_order.php'),
(124, 1, 'opencart/admin/language/en-gb/report/sale_return.php'),
(125, 1, 'opencart/admin/language/en-gb/report/sale_shipping.php'),
(126, 1, 'opencart/admin/language/en-gb/report/sale_tax.php'),
(127, 1, 'opencart/admin/language/en-gb/shipping'),
(128, 1, 'opencart/admin/language/en-gb/shipping/flat.php'),
(129, 1, 'opencart/admin/language/en-gb/shipping/free.php'),
(130, 1, 'opencart/admin/language/en-gb/shipping/item.php'),
(131, 1, 'opencart/admin/language/en-gb/shipping/pickup.php'),
(132, 1, 'opencart/admin/language/en-gb/shipping/weight.php'),
(133, 1, 'opencart/admin/language/en-gb/theme'),
(134, 1, 'opencart/admin/language/en-gb/theme/basic.php'),
(135, 1, 'opencart/admin/language/en-gb/total'),
(136, 1, 'opencart/admin/language/en-gb/total/coupon.php'),
(137, 1, 'opencart/admin/language/en-gb/total/credit.php'),
(138, 1, 'opencart/admin/language/en-gb/total/handling.php'),
(139, 1, 'opencart/admin/language/en-gb/total/low_order_fee.php'),
(140, 1, 'opencart/admin/language/en-gb/total/reward.php'),
(141, 1, 'opencart/admin/language/en-gb/total/shipping.php'),
(142, 1, 'opencart/admin/language/en-gb/total/sub_total.php'),
(143, 1, 'opencart/admin/language/en-gb/total/tax.php'),
(144, 1, 'opencart/admin/language/en-gb/total/total.php'),
(145, 1, 'opencart/admin/language/en-gb/total/voucher.php'),
(146, 1, 'opencart/admin/model'),
(147, 1, 'opencart/admin/model/dashboard'),
(148, 1, 'opencart/admin/model/dashboard/map.php'),
(149, 1, 'opencart/admin/model/fraud'),
(150, 1, 'opencart/admin/model/fraud/ip.php'),
(151, 1, 'opencart/admin/model/module'),
(152, 1, 'opencart/admin/model/module/bestseller.php'),
(153, 1, 'opencart/admin/model/report'),
(154, 1, 'opencart/admin/model/report/activity.php'),
(155, 1, 'opencart/admin/model/report/coupon.php'),
(156, 1, 'opencart/admin/model/report/customer.php'),
(157, 1, 'opencart/admin/model/report/customer_subscription.php'),
(158, 1, 'opencart/admin/model/report/customer_transaction.php'),
(159, 1, 'opencart/admin/model/report/marketing.php'),
(160, 1, 'opencart/admin/model/report/product_purchased.php'),
(161, 1, 'opencart/admin/model/report/product_viewed.php'),
(162, 1, 'opencart/admin/model/report/returns.php'),
(163, 1, 'opencart/admin/model/report/sale.php'),
(164, 1, 'opencart/admin/view'),
(165, 1, 'opencart/admin/view/image'),
(166, 1, 'opencart/admin/view/image/basic.png'),
(167, 1, 'opencart/admin/view/template'),
(168, 1, 'opencart/admin/view/template/captcha'),
(169, 1, 'opencart/admin/view/template/captcha/basic.twig'),
(170, 1, 'opencart/admin/view/template/currency'),
(171, 1, 'opencart/admin/view/template/currency/ecb.twig'),
(172, 1, 'opencart/admin/view/template/currency/fixer.twig'),
(173, 1, 'opencart/admin/view/template/dashboard'),
(174, 1, 'opencart/admin/view/template/dashboard/activity_form.twig'),
(175, 1, 'opencart/admin/view/template/dashboard/activity_info.twig'),
(176, 1, 'opencart/admin/view/template/dashboard/chart_form.twig'),
(177, 1, 'opencart/admin/view/template/dashboard/chart_info.twig'),
(178, 1, 'opencart/admin/view/template/dashboard/customer_form.twig'),
(179, 1, 'opencart/admin/view/template/dashboard/customer_info.twig'),
(180, 1, 'opencart/admin/view/template/dashboard/map_form.twig'),
(181, 1, 'opencart/admin/view/template/dashboard/map_info.twig'),
(182, 1, 'opencart/admin/view/template/dashboard/online_form.twig'),
(183, 1, 'opencart/admin/view/template/dashboard/online_info.twig'),
(184, 1, 'opencart/admin/view/template/dashboard/order_form.twig'),
(185, 1, 'opencart/admin/view/template/dashboard/order_info.twig'),
(186, 1, 'opencart/admin/view/template/dashboard/recent_form.twig'),
(187, 1, 'opencart/admin/view/template/dashboard/recent_info.twig'),
(188, 1, 'opencart/admin/view/template/dashboard/sale_form.twig'),
(189, 1, 'opencart/admin/view/template/dashboard/sale_info.twig'),
(190, 1, 'opencart/admin/view/template/fraud'),
(191, 1, 'opencart/admin/view/template/fraud/ip.twig'),
(192, 1, 'opencart/admin/view/template/fraud/ip_ip.twig'),
(193, 1, 'opencart/admin/view/template/module'),
(194, 1, 'opencart/admin/view/template/module/account.twig'),
(195, 1, 'opencart/admin/view/template/module/banner.twig'),
(196, 1, 'opencart/admin/view/template/module/bestseller.twig'),
(197, 1, 'opencart/admin/view/template/module/bestseller_report.twig'),
(198, 1, 'opencart/admin/view/template/module/category.twig'),
(199, 1, 'opencart/admin/view/template/module/featured.twig'),
(200, 1, 'opencart/admin/view/template/module/filter.twig'),
(201, 1, 'opencart/admin/view/template/module/html.twig'),
(202, 1, 'opencart/admin/view/template/module/information.twig'),
(203, 1, 'opencart/admin/view/template/module/latest.twig'),
(204, 1, 'opencart/admin/view/template/module/special.twig'),
(205, 1, 'opencart/admin/view/template/module/store.twig'),
(206, 1, 'opencart/admin/view/template/payment'),
(207, 1, 'opencart/admin/view/template/payment/bank_transfer.twig'),
(208, 1, 'opencart/admin/view/template/payment/cheque.twig'),
(209, 1, 'opencart/admin/view/template/payment/cod.twig'),
(210, 1, 'opencart/admin/view/template/payment/free_checkout.twig'),
(211, 1, 'opencart/admin/view/template/report'),
(212, 1, 'opencart/admin/view/template/report/affiliate.twig'),
(213, 1, 'opencart/admin/view/template/report/affiliate_form.twig'),
(214, 1, 'opencart/admin/view/template/report/customer.twig'),
(215, 1, 'opencart/admin/view/template/report/customer_activity.twig'),
(216, 1, 'opencart/admin/view/template/report/customer_activity_form.twig'),
(217, 1, 'opencart/admin/view/template/report/customer_activity_list.twig'),
(218, 1, 'opencart/admin/view/template/report/customer_form.twig'),
(219, 1, 'opencart/admin/view/template/report/customer_list.twig'),
(220, 1, 'opencart/admin/view/template/report/customer_order.twig'),
(221, 1, 'opencart/admin/view/template/report/customer_order_form.twig'),
(222, 1, 'opencart/admin/view/template/report/customer_order_list.twig'),
(223, 1, 'opencart/admin/view/template/report/customer_reward.twig'),
(224, 1, 'opencart/admin/view/template/report/customer_reward_form.twig'),
(225, 1, 'opencart/admin/view/template/report/customer_reward_list.twig'),
(226, 1, 'opencart/admin/view/template/report/customer_search.twig'),
(227, 1, 'opencart/admin/view/template/report/customer_search_form.twig'),
(228, 1, 'opencart/admin/view/template/report/customer_search_list.twig'),
(229, 1, 'opencart/admin/view/template/report/customer_subscription.twig'),
(230, 1, 'opencart/admin/view/template/report/customer_subscription_form.twig'),
(231, 1, 'opencart/admin/view/template/report/customer_subscription_list.twig'),
(232, 1, 'opencart/admin/view/template/report/customer_transaction.twig'),
(233, 1, 'opencart/admin/view/template/report/customer_transaction_form.twig'),
(234, 1, 'opencart/admin/view/template/report/customer_transaction_list.twig'),
(235, 1, 'opencart/admin/view/template/report/marketing.twig'),
(236, 1, 'opencart/admin/view/template/report/marketing_form.twig'),
(237, 1, 'opencart/admin/view/template/report/marketing_list.twig'),
(238, 1, 'opencart/admin/view/template/report/product_purchased.twig'),
(239, 1, 'opencart/admin/view/template/report/product_purchased_form.twig'),
(240, 1, 'opencart/admin/view/template/report/product_purchased_list.twig'),
(241, 1, 'opencart/admin/view/template/report/product_viewed.twig'),
(242, 1, 'opencart/admin/view/template/report/product_viewed_form.twig'),
(243, 1, 'opencart/admin/view/template/report/product_viewed_list.twig'),
(244, 1, 'opencart/admin/view/template/report/sale_coupon.twig'),
(245, 1, 'opencart/admin/view/template/report/sale_coupon_form.twig'),
(246, 1, 'opencart/admin/view/template/report/sale_coupon_list.twig'),
(247, 1, 'opencart/admin/view/template/report/sale_order.twig'),
(248, 1, 'opencart/admin/view/template/report/sale_order_form.twig'),
(249, 1, 'opencart/admin/view/template/report/sale_order_list.twig'),
(250, 1, 'opencart/admin/view/template/report/sale_return.twig'),
(251, 1, 'opencart/admin/view/template/report/sale_return_form.twig'),
(252, 1, 'opencart/admin/view/template/report/sale_return_list.twig'),
(253, 1, 'opencart/admin/view/template/report/sale_shipping.twig'),
(254, 1, 'opencart/admin/view/template/report/sale_shipping_form.twig'),
(255, 1, 'opencart/admin/view/template/report/sale_shipping_list.twig'),
(256, 1, 'opencart/admin/view/template/report/sale_tax.twig'),
(257, 1, 'opencart/admin/view/template/report/sale_tax_form.twig'),
(258, 1, 'opencart/admin/view/template/report/sale_tax_list.twig'),
(259, 1, 'opencart/admin/view/template/shipping'),
(260, 1, 'opencart/admin/view/template/shipping/flat.twig'),
(261, 1, 'opencart/admin/view/template/shipping/free.twig'),
(262, 1, 'opencart/admin/view/template/shipping/item.twig'),
(263, 1, 'opencart/admin/view/template/shipping/pickup.twig'),
(264, 1, 'opencart/admin/view/template/shipping/weight.twig'),
(265, 1, 'opencart/admin/view/template/theme'),
(266, 1, 'opencart/admin/view/template/theme/basic.twig'),
(267, 1, 'opencart/admin/view/template/total'),
(268, 1, 'opencart/admin/view/template/total/coupon.twig'),
(269, 1, 'opencart/admin/view/template/total/credit.twig'),
(270, 1, 'opencart/admin/view/template/total/handling.twig'),
(271, 1, 'opencart/admin/view/template/total/low_order_fee.twig'),
(272, 1, 'opencart/admin/view/template/total/reward.twig'),
(273, 1, 'opencart/admin/view/template/total/shipping.twig'),
(274, 1, 'opencart/admin/view/template/total/sub_total.twig'),
(275, 1, 'opencart/admin/view/template/total/tax.twig'),
(276, 1, 'opencart/admin/view/template/total/total.twig'),
(277, 1, 'opencart/admin/view/template/total/voucher.twig'),
(278, 1, 'opencart/catalog'),
(279, 1, 'opencart/catalog/controller'),
(280, 1, 'opencart/catalog/controller/captcha'),
(281, 1, 'opencart/catalog/controller/captcha/basic.php'),
(282, 1, 'opencart/catalog/controller/currency'),
(283, 1, 'opencart/catalog/controller/currency/ecb.php'),
(284, 1, 'opencart/catalog/controller/currency/fixer.php'),
(285, 1, 'opencart/catalog/controller/module'),
(286, 1, 'opencart/catalog/controller/module/account.php'),
(287, 1, 'opencart/catalog/controller/module/banner.php'),
(288, 1, 'opencart/catalog/controller/module/bestseller.php'),
(289, 1, 'opencart/catalog/controller/module/category.php'),
(290, 1, 'opencart/catalog/controller/module/featured.php'),
(291, 1, 'opencart/catalog/controller/module/filter.php'),
(292, 1, 'opencart/catalog/controller/module/html.php'),
(293, 1, 'opencart/catalog/controller/module/information.php'),
(294, 1, 'opencart/catalog/controller/module/latest.php'),
(295, 1, 'opencart/catalog/controller/module/special.php'),
(296, 1, 'opencart/catalog/controller/module/store.php'),
(297, 1, 'opencart/catalog/controller/payment'),
(298, 1, 'opencart/catalog/controller/payment/bank_transfer.php'),
(299, 1, 'opencart/catalog/controller/payment/cheque.php'),
(300, 1, 'opencart/catalog/controller/payment/cod.php'),
(301, 1, 'opencart/catalog/controller/payment/free_checkout.php'),
(302, 1, 'opencart/catalog/controller/total'),
(303, 1, 'opencart/catalog/controller/total/coupon.php'),
(304, 1, 'opencart/catalog/controller/total/reward.php'),
(305, 1, 'opencart/catalog/controller/total/shipping.php'),
(306, 1, 'opencart/catalog/controller/total/voucher.php'),
(307, 1, 'opencart/catalog/language'),
(308, 1, 'opencart/catalog/language/de-de'),
(309, 1, 'opencart/catalog/language/de-de/module'),
(310, 1, 'opencart/catalog/language/de-de/module/featured.php'),
(311, 1, 'opencart/catalog/language/de-de/payment'),
(312, 1, 'opencart/catalog/language/de-de/payment/cod.php'),
(313, 1, 'opencart/catalog/language/en-gb'),
(314, 1, 'opencart/catalog/language/en-gb/captcha'),
(315, 1, 'opencart/catalog/language/en-gb/captcha/basic.php'),
(316, 1, 'opencart/catalog/language/en-gb/module'),
(317, 1, 'opencart/catalog/language/en-gb/module/account.php'),
(318, 1, 'opencart/catalog/language/en-gb/module/bestseller.php'),
(319, 1, 'opencart/catalog/language/en-gb/module/category.php'),
(320, 1, 'opencart/catalog/language/en-gb/module/featured.php'),
(321, 1, 'opencart/catalog/language/en-gb/module/filter.php'),
(322, 1, 'opencart/catalog/language/en-gb/module/information.php'),
(323, 1, 'opencart/catalog/language/en-gb/module/latest.php'),
(324, 1, 'opencart/catalog/language/en-gb/module/special.php'),
(325, 1, 'opencart/catalog/language/en-gb/module/store.php'),
(326, 1, 'opencart/catalog/language/en-gb/payment'),
(327, 1, 'opencart/catalog/language/en-gb/payment/bank_transfer.php'),
(328, 1, 'opencart/catalog/language/en-gb/payment/cheque.php'),
(329, 1, 'opencart/catalog/language/en-gb/payment/cod.php'),
(330, 1, 'opencart/catalog/language/en-gb/payment/free_checkout.php'),
(331, 1, 'opencart/catalog/language/en-gb/shipping'),
(332, 1, 'opencart/catalog/language/en-gb/shipping/flat.php'),
(333, 1, 'opencart/catalog/language/en-gb/shipping/free.php'),
(334, 1, 'opencart/catalog/language/en-gb/shipping/item.php'),
(335, 1, 'opencart/catalog/language/en-gb/shipping/pickup.php'),
(336, 1, 'opencart/catalog/language/en-gb/shipping/weight.php'),
(337, 1, 'opencart/catalog/language/en-gb/total'),
(338, 1, 'opencart/catalog/language/en-gb/total/coupon.php'),
(339, 1, 'opencart/catalog/language/en-gb/total/credit.php'),
(340, 1, 'opencart/catalog/language/en-gb/total/handling.php'),
(341, 1, 'opencart/catalog/language/en-gb/total/low_order_fee.php'),
(342, 1, 'opencart/catalog/language/en-gb/total/reward.php'),
(343, 1, 'opencart/catalog/language/en-gb/total/shipping.php'),
(344, 1, 'opencart/catalog/language/en-gb/total/sub_total.php'),
(345, 1, 'opencart/catalog/language/en-gb/total/total.php'),
(346, 1, 'opencart/catalog/language/en-gb/total/voucher.php'),
(347, 1, 'opencart/catalog/model'),
(348, 1, 'opencart/catalog/model/fraud'),
(349, 1, 'opencart/catalog/model/fraud/ip.php'),
(350, 1, 'opencart/catalog/model/module'),
(351, 1, 'opencart/catalog/model/module/bestseller.php'),
(352, 1, 'opencart/catalog/model/module/latest.php'),
(353, 1, 'opencart/catalog/model/payment'),
(354, 1, 'opencart/catalog/model/payment/bank_transfer.php'),
(355, 1, 'opencart/catalog/model/payment/cheque.php'),
(356, 1, 'opencart/catalog/model/payment/cod.php'),
(357, 1, 'opencart/catalog/model/payment/free_checkout.php'),
(358, 1, 'opencart/catalog/model/shipping'),
(359, 1, 'opencart/catalog/model/shipping/flat.php'),
(360, 1, 'opencart/catalog/model/shipping/free.php'),
(361, 1, 'opencart/catalog/model/shipping/item.php'),
(362, 1, 'opencart/catalog/model/shipping/pickup.php'),
(363, 1, 'opencart/catalog/model/shipping/weight.php'),
(364, 1, 'opencart/catalog/model/total'),
(365, 1, 'opencart/catalog/model/total/coupon.php'),
(366, 1, 'opencart/catalog/model/total/credit.php'),
(367, 1, 'opencart/catalog/model/total/handling.php'),
(368, 1, 'opencart/catalog/model/total/low_order_fee.php'),
(369, 1, 'opencart/catalog/model/total/reward.php'),
(370, 1, 'opencart/catalog/model/total/shipping.php'),
(371, 1, 'opencart/catalog/model/total/sub_total.php'),
(372, 1, 'opencart/catalog/model/total/tax.php'),
(373, 1, 'opencart/catalog/model/total/total.php'),
(374, 1, 'opencart/catalog/model/total/voucher.php'),
(375, 1, 'opencart/catalog/view'),
(376, 1, 'opencart/catalog/view/template'),
(377, 1, 'opencart/catalog/view/template/captcha'),
(378, 1, 'opencart/catalog/view/template/captcha/basic.twig'),
(379, 1, 'opencart/catalog/view/template/module'),
(380, 1, 'opencart/catalog/view/template/module/account.twig'),
(381, 1, 'opencart/catalog/view/template/module/banner.twig'),
(382, 1, 'opencart/catalog/view/template/module/bestseller.twig'),
(383, 1, 'opencart/catalog/view/template/module/category.twig'),
(384, 1, 'opencart/catalog/view/template/module/featured.twig'),
(385, 1, 'opencart/catalog/view/template/module/filter.twig'),
(386, 1, 'opencart/catalog/view/template/module/html.twig'),
(387, 1, 'opencart/catalog/view/template/module/information.twig'),
(388, 1, 'opencart/catalog/view/template/module/latest.twig'),
(389, 1, 'opencart/catalog/view/template/module/special.twig'),
(390, 1, 'opencart/catalog/view/template/module/store.twig'),
(391, 1, 'opencart/catalog/view/template/payment'),
(392, 1, 'opencart/catalog/view/template/payment/bank_transfer.twig'),
(393, 1, 'opencart/catalog/view/template/payment/cheque.twig'),
(394, 1, 'opencart/catalog/view/template/payment/cod.twig'),
(395, 1, 'opencart/catalog/view/template/payment/free_checkout.twig'),
(396, 1, 'opencart/catalog/view/template/total'),
(397, 1, 'opencart/catalog/view/template/total/coupon.twig'),
(398, 1, 'opencart/catalog/view/template/total/reward.twig'),
(399, 1, 'opencart/catalog/view/template/total/shipping.twig'),
(400, 1, 'opencart/catalog/view/template/total/voucher.twig'),
(401, 1, 'opencart/install.json'),
(1471, 16, 'paypal'),
(1472, 16, 'paypal/admin'),
(1473, 16, 'paypal/admin/controller'),
(1474, 16, 'paypal/admin/controller/payment'),
(1475, 16, 'paypal/admin/controller/payment/paypal.php'),
(1476, 16, 'paypal/admin/language'),
(1477, 16, 'paypal/admin/language/en-gb'),
(1478, 16, 'paypal/admin/language/en-gb/payment'),
(1479, 16, 'paypal/admin/language/en-gb/payment/paypal.php'),
(1480, 16, 'paypal/admin/model'),
(1481, 16, 'paypal/admin/model/payment'),
(1482, 16, 'paypal/admin/model/payment/paypal.php'),
(1483, 16, 'paypal/admin/view'),
(1484, 16, 'paypal/admin/view/image'),
(1485, 16, 'paypal/admin/view/image/payment'),
(1486, 16, 'paypal/admin/view/image/payment/background.jpg'),
(1487, 16, 'paypal/admin/view/image/payment/icon-all-settings-down.svg'),
(1488, 16, 'paypal/admin/view/image/payment/icon-all-settings-up.svg'),
(1489, 16, 'paypal/admin/view/image/payment/icon-applepay-button.svg'),
(1490, 16, 'paypal/admin/view/image/payment/icon-back-dashboard.svg'),
(1491, 16, 'paypal/admin/view/image/payment/icon-button.svg'),
(1492, 16, 'paypal/admin/view/image/payment/icon-card-sale-analytics.svg'),
(1493, 16, 'paypal/admin/view/image/payment/icon-card-statistic.svg'),
(1494, 16, 'paypal/admin/view/image/payment/icon-card.svg'),
(1495, 16, 'paypal/admin/view/image/payment/icon-check-off.svg'),
(1496, 16, 'paypal/admin/view/image/payment/icon-check-on.svg'),
(1497, 16, 'paypal/admin/view/image/payment/icon-contact.svg'),
(1498, 16, 'paypal/admin/view/image/payment/icon-general.svg'),
(1499, 16, 'paypal/admin/view/image/payment/icon-googlepay-button.svg'),
(1500, 16, 'paypal/admin/view/image/payment/icon-logo.svg'),
(1501, 16, 'paypal/admin/view/image/payment/icon-message.svg'),
(1502, 16, 'paypal/admin/view/image/payment/icon-order-status.svg'),
(1503, 16, 'paypal/admin/view/image/payment/icon-product.svg'),
(1504, 16, 'paypal/admin/view/image/payment/icon-section-card.svg'),
(1505, 16, 'paypal/admin/view/image/payment/icon-statistic.svg'),
(1506, 16, 'paypal/admin/view/javascript'),
(1507, 16, 'paypal/admin/view/javascript/bootstrap-switch.js'),
(1508, 16, 'paypal/admin/view/javascript/paypal.js'),
(1509, 16, 'paypal/admin/view/stylesheet'),
(1510, 16, 'paypal/admin/view/stylesheet/bootstrap-switch.css'),
(1511, 16, 'paypal/admin/view/stylesheet/card.css'),
(1512, 16, 'paypal/admin/view/stylesheet/paypal.css'),
(1513, 16, 'paypal/admin/view/template'),
(1514, 16, 'paypal/admin/view/template/payment'),
(1515, 16, 'paypal/admin/view/template/payment/applepay_button.twig'),
(1516, 16, 'paypal/admin/view/template/payment/auth.twig'),
(1517, 16, 'paypal/admin/view/template/payment/button.twig'),
(1518, 16, 'paypal/admin/view/template/payment/card.twig'),
(1519, 16, 'paypal/admin/view/template/payment/contact.twig'),
(1520, 16, 'paypal/admin/view/template/payment/dashboard.twig'),
(1521, 16, 'paypal/admin/view/template/payment/general.twig'),
(1522, 16, 'paypal/admin/view/template/payment/googlepay_button.twig'),
(1523, 16, 'paypal/admin/view/template/payment/message.twig'),
(1524, 16, 'paypal/admin/view/template/payment/order.twig'),
(1525, 16, 'paypal/admin/view/template/payment/order_status.twig'),
(1526, 16, 'paypal/catalog'),
(1527, 16, 'paypal/catalog/controller'),
(1528, 16, 'paypal/catalog/controller/payment'),
(1529, 16, 'paypal/catalog/controller/payment/paypal.php'),
(1530, 16, 'paypal/catalog/controller/payment/paypal_applepay.php'),
(1531, 16, 'paypal/catalog/controller/payment/paypal_googlepay.php'),
(1532, 16, 'paypal/catalog/controller/payment/paypal_paylater.php'),
(1533, 16, 'paypal/catalog/language'),
(1534, 16, 'paypal/catalog/language/en-gb'),
(1535, 16, 'paypal/catalog/language/en-gb/payment'),
(1536, 16, 'paypal/catalog/language/en-gb/payment/paypal.php'),
(1537, 16, 'paypal/catalog/model'),
(1538, 16, 'paypal/catalog/model/payment'),
(1539, 16, 'paypal/catalog/model/payment/paypal.php'),
(1540, 16, 'paypal/catalog/model/payment/paypal_applepay.php'),
(1541, 16, 'paypal/catalog/model/payment/paypal_googlepay.php'),
(1542, 16, 'paypal/catalog/model/payment/paypal_paylater.php'),
(1543, 16, 'paypal/catalog/view'),
(1544, 16, 'paypal/catalog/view/javascript'),
(1545, 16, 'paypal/catalog/view/javascript/paypal.js'),
(1546, 16, 'paypal/catalog/view/stylesheet'),
(1547, 16, 'paypal/catalog/view/stylesheet/card.css'),
(1548, 16, 'paypal/catalog/view/stylesheet/paypal.css'),
(1549, 16, 'paypal/catalog/view/template'),
(1550, 16, 'paypal/catalog/view/template/payment'),
(1551, 16, 'paypal/catalog/view/template/payment/confirm.twig'),
(1552, 16, 'paypal/catalog/view/template/payment/payment_address.twig'),
(1553, 16, 'paypal/catalog/view/template/payment/paypal.twig'),
(1554, 16, 'paypal/catalog/view/template/payment/paypal_applepay.twig'),
(1555, 16, 'paypal/catalog/view/template/payment/paypal_applepay_modal.twig'),
(1556, 16, 'paypal/catalog/view/template/payment/paypal_googlepay.twig'),
(1557, 16, 'paypal/catalog/view/template/payment/paypal_googlepay_modal.twig'),
(1558, 16, 'paypal/catalog/view/template/payment/paypal_modal.twig'),
(1559, 16, 'paypal/catalog/view/template/payment/paypal_paylater.twig'),
(1560, 16, 'paypal/catalog/view/template/payment/paypal_paylater_modal.twig'),
(1561, 16, 'paypal/catalog/view/template/payment/shipping_address.twig'),
(1562, 16, 'paypal/install.json'),
(1563, 16, 'paypal/system'),
(1564, 16, 'paypal/system/config'),
(1565, 16, 'paypal/system/config/paypal.php'),
(1566, 16, 'paypal/system/library'),
(1567, 16, 'paypal/system/library/paypal.php'),
(1568, 3, 'stripe'),
(1569, 3, 'stripe/admin'),
(1570, 3, 'stripe/admin/.DS_Store'),
(1571, 3, 'stripe/admin/controller'),
(1572, 3, 'stripe/admin/controller/.DS_Store'),
(1573, 3, 'stripe/admin/controller/payment'),
(1574, 3, 'stripe/admin/controller/payment/stripe.php'),
(1575, 3, 'stripe/admin/language'),
(1576, 3, 'stripe/admin/language/.DS_Store'),
(1577, 3, 'stripe/admin/language/en-gb'),
(1578, 3, 'stripe/admin/language/en-gb/.DS_Store'),
(1579, 3, 'stripe/admin/language/en-gb/payment'),
(1580, 3, 'stripe/admin/language/en-gb/payment/stripe.php'),
(1581, 3, 'stripe/admin/view'),
(1582, 3, 'stripe/admin/view/.DS_Store'),
(1583, 3, 'stripe/admin/view/image'),
(1584, 3, 'stripe/admin/view/image/payment'),
(1585, 3, 'stripe/admin/view/image/payment/stripe_logo.png'),
(1586, 3, 'stripe/admin/view/template'),
(1587, 3, 'stripe/admin/view/template/.DS_Store'),
(1588, 3, 'stripe/admin/view/template/payment'),
(1589, 3, 'stripe/admin/view/template/payment/stripe.twig'),
(1590, 3, 'stripe/catalog'),
(1591, 3, 'stripe/catalog/.DS_Store'),
(1592, 3, 'stripe/catalog/controller'),
(1593, 3, 'stripe/catalog/controller/.DS_Store'),
(1594, 3, 'stripe/catalog/controller/payment'),
(1595, 3, 'stripe/catalog/controller/payment/stripe.php'),
(1596, 3, 'stripe/catalog/language'),
(1597, 3, 'stripe/catalog/language/.DS_Store'),
(1598, 3, 'stripe/catalog/language/en-gb'),
(1599, 3, 'stripe/catalog/language/en-gb/.DS_Store'),
(1600, 3, 'stripe/catalog/language/en-gb/payment'),
(1601, 3, 'stripe/catalog/language/en-gb/payment/.DS_Store'),
(1602, 3, 'stripe/catalog/language/en-gb/payment/stripe.php'),
(1603, 3, 'stripe/catalog/model'),
(1604, 3, 'stripe/catalog/model/payment'),
(1605, 3, 'stripe/catalog/model/payment/stripe.php'),
(1606, 3, 'stripe/catalog/view'),
(1607, 3, 'stripe/catalog/view/image'),
(1608, 3, 'stripe/catalog/view/image/stripe_logo.png'),
(1609, 3, 'stripe/catalog/view/stylesheet'),
(1610, 3, 'stripe/catalog/view/stylesheet/stripe.css'),
(1611, 3, 'stripe/catalog/view/template'),
(1612, 3, 'stripe/catalog/view/template/.DS_Store'),
(1613, 3, 'stripe/catalog/view/template/payment'),
(1614, 3, 'stripe/catalog/view/template/payment/stripe.twig'),
(1615, 3, 'stripe/install.json'),
(1616, 3, 'stripe/system'),
(1617, 3, 'stripe/system/library'),
(1618, 3, 'stripe/system/library/stripe.php'),
(1619, 3, 'stripe/system/library/stripe'),
(1620, 3, 'stripe/system/library/stripe/Account.php'),
(1621, 3, 'stripe/system/library/stripe/AlipayAccount.php'),
(1622, 3, 'stripe/system/library/stripe/ApiOperations'),
(1623, 3, 'stripe/system/library/stripe/ApiOperations/All.php'),
(1624, 3, 'stripe/system/library/stripe/ApiOperations/Create.php'),
(1625, 3, 'stripe/system/library/stripe/ApiOperations/Delete.php'),
(1626, 3, 'stripe/system/library/stripe/ApiOperations/NestedResource.php'),
(1627, 3, 'stripe/system/library/stripe/ApiOperations/Request.php'),
(1628, 3, 'stripe/system/library/stripe/ApiOperations/Retrieve.php'),
(1629, 3, 'stripe/system/library/stripe/ApiOperations/Update.php'),
(1630, 3, 'stripe/system/library/stripe/ApiRequestor.php'),
(1631, 3, 'stripe/system/library/stripe/ApiResource.php'),
(1632, 3, 'stripe/system/library/stripe/ApiResponse.php'),
(1633, 3, 'stripe/system/library/stripe/ApplePayDomain.php'),
(1634, 3, 'stripe/system/library/stripe/ApplicationFee.php'),
(1635, 3, 'stripe/system/library/stripe/ApplicationFeeRefund.php'),
(1636, 3, 'stripe/system/library/stripe/Balance.php'),
(1637, 3, 'stripe/system/library/stripe/BalanceTransaction.php'),
(1638, 3, 'stripe/system/library/stripe/BankAccount.php'),
(1639, 3, 'stripe/system/library/stripe/BitcoinReceiver.php'),
(1640, 3, 'stripe/system/library/stripe/BitcoinTransaction.php'),
(1641, 3, 'stripe/system/library/stripe/Card.php'),
(1642, 3, 'stripe/system/library/stripe/Charge.php'),
(1643, 3, 'stripe/system/library/stripe/Collection.php'),
(1644, 3, 'stripe/system/library/stripe/CountrySpec.php'),
(1645, 3, 'stripe/system/library/stripe/Coupon.php'),
(1646, 3, 'stripe/system/library/stripe/Customer.php'),
(1647, 3, 'stripe/system/library/stripe/Discount.php'),
(1648, 3, 'stripe/system/library/stripe/Dispute.php'),
(1649, 3, 'stripe/system/library/stripe/EphemeralKey.php'),
(1650, 3, 'stripe/system/library/stripe/Error'),
(1651, 3, 'stripe/system/library/stripe/Error/Api.php'),
(1652, 3, 'stripe/system/library/stripe/Error/ApiConnection.php'),
(1653, 3, 'stripe/system/library/stripe/Error/Authentication.php'),
(1654, 3, 'stripe/system/library/stripe/Error/Base.php'),
(1655, 3, 'stripe/system/library/stripe/Error/Card.php'),
(1656, 3, 'stripe/system/library/stripe/Error/Idempotency.php'),
(1657, 3, 'stripe/system/library/stripe/Error/InvalidRequest.php'),
(1658, 3, 'stripe/system/library/stripe/Error/OAuth'),
(1659, 3, 'stripe/system/library/stripe/Error/OAuth/InvalidClient.php'),
(1660, 3, 'stripe/system/library/stripe/Error/OAuth/InvalidGrant.php'),
(1661, 3, 'stripe/system/library/stripe/Error/OAuth/InvalidRequest.php'),
(1662, 3, 'stripe/system/library/stripe/Error/OAuth/InvalidScope.php'),
(1663, 3, 'stripe/system/library/stripe/Error/OAuth/OAuthBase.php'),
(1664, 3, 'stripe/system/library/stripe/Error/OAuth/UnsupportedGrantType.php'),
(1665, 3, 'stripe/system/library/stripe/Error/OAuth/UnsupportedResponseType.php'),
(1666, 3, 'stripe/system/library/stripe/Error/Permission.php'),
(1667, 3, 'stripe/system/library/stripe/Error/RateLimit.php'),
(1668, 3, 'stripe/system/library/stripe/Error/SignatureVerification.php'),
(1669, 3, 'stripe/system/library/stripe/Event.php'),
(1670, 3, 'stripe/system/library/stripe/ExchangeRate.php'),
(1671, 3, 'stripe/system/library/stripe/File.php'),
(1672, 3, 'stripe/system/library/stripe/FileLink.php'),
(1673, 3, 'stripe/system/library/stripe/FileUpload.php'),
(1674, 3, 'stripe/system/library/stripe/HttpClient'),
(1675, 3, 'stripe/system/library/stripe/HttpClient/ClientInterface.php'),
(1676, 3, 'stripe/system/library/stripe/HttpClient/CurlClient.php'),
(1677, 3, 'stripe/system/library/stripe/Invoice.php'),
(1678, 3, 'stripe/system/library/stripe/InvoiceItem.php'),
(1679, 3, 'stripe/system/library/stripe/InvoiceLineItem.php'),
(1680, 3, 'stripe/system/library/stripe/IssuerFraudRecord.php'),
(1681, 3, 'stripe/system/library/stripe/Issuing'),
(1682, 3, 'stripe/system/library/stripe/Issuing/Authorization.php'),
(1683, 3, 'stripe/system/library/stripe/Issuing/Card.php'),
(1684, 3, 'stripe/system/library/stripe/Issuing/CardDetails.php'),
(1685, 3, 'stripe/system/library/stripe/Issuing/Cardholder.php'),
(1686, 3, 'stripe/system/library/stripe/Issuing/Dispute.php'),
(1687, 3, 'stripe/system/library/stripe/Issuing/Transaction.php'),
(1688, 3, 'stripe/system/library/stripe/LoginLink.php'),
(1689, 3, 'stripe/system/library/stripe/OAuth.php'),
(1690, 3, 'stripe/system/library/stripe/Order.php'),
(1691, 3, 'stripe/system/library/stripe/OrderItem.php'),
(1692, 3, 'stripe/system/library/stripe/OrderReturn.php'),
(1693, 3, 'stripe/system/library/stripe/PaymentIntent.php'),
(1694, 3, 'stripe/system/library/stripe/Payout.php'),
(1695, 3, 'stripe/system/library/stripe/Plan.php'),
(1696, 3, 'stripe/system/library/stripe/Product.php'),
(1697, 3, 'stripe/system/library/stripe/Recipient.php'),
(1698, 3, 'stripe/system/library/stripe/RecipientTransfer.php'),
(1699, 3, 'stripe/system/library/stripe/Refund.php'),
(1700, 3, 'stripe/system/library/stripe/Reporting'),
(1701, 3, 'stripe/system/library/stripe/Reporting/ReportRun.php'),
(1702, 3, 'stripe/system/library/stripe/Reporting/ReportType.php'),
(1703, 3, 'stripe/system/library/stripe/SKU.php'),
(1704, 3, 'stripe/system/library/stripe/Sigma'),
(1705, 3, 'stripe/system/library/stripe/Sigma/ScheduledQueryRun.php'),
(1706, 3, 'stripe/system/library/stripe/SingletonApiResource.php'),
(1707, 3, 'stripe/system/library/stripe/Source.php'),
(1708, 3, 'stripe/system/library/stripe/SourceTransaction.php'),
(1709, 3, 'stripe/system/library/stripe/Stripe.php'),
(1710, 3, 'stripe/system/library/stripe/StripeObject.php'),
(1711, 3, 'stripe/system/library/stripe/Subscription.php'),
(1712, 3, 'stripe/system/library/stripe/SubscriptionItem.php'),
(1713, 3, 'stripe/system/library/stripe/Terminal'),
(1714, 3, 'stripe/system/library/stripe/Terminal/ConnectionToken.php'),
(1715, 3, 'stripe/system/library/stripe/Terminal/Location.php'),
(1716, 3, 'stripe/system/library/stripe/Terminal/Reader.php'),
(1717, 3, 'stripe/system/library/stripe/ThreeDSecure.php'),
(1718, 3, 'stripe/system/library/stripe/Token.php'),
(1719, 3, 'stripe/system/library/stripe/Topup.php'),
(1720, 3, 'stripe/system/library/stripe/Transfer.php'),
(1721, 3, 'stripe/system/library/stripe/TransferReversal.php'),
(1722, 3, 'stripe/system/library/stripe/UsageRecord.php'),
(1723, 3, 'stripe/system/library/stripe/UsageRecordSummary.php'),
(1724, 3, 'stripe/system/library/stripe/Util'),
(1725, 3, 'stripe/system/library/stripe/Util/AutoPagingIterator.php'),
(1726, 3, 'stripe/system/library/stripe/Util/CaseInsensitiveArray.php'),
(1727, 3, 'stripe/system/library/stripe/Util/DefaultLogger.php'),
(1728, 3, 'stripe/system/library/stripe/Util/LoggerInterface.php'),
(1729, 3, 'stripe/system/library/stripe/Util/RandomGenerator.php'),
(1730, 3, 'stripe/system/library/stripe/Util/RequestOptions.php'),
(1731, 3, 'stripe/system/library/stripe/Util/Set.php'),
(1732, 3, 'stripe/system/library/stripe/Util/Util.php'),
(1733, 3, 'stripe/system/library/stripe/Webhook.php'),
(1734, 3, 'stripe/system/library/stripe/WebhookSignature.php');

-- --------------------------------------------------------

--
-- Table structure for table `ve_filter`
--

CREATE TABLE `ve_filter` (
  `filter_id` int NOT NULL,
  `filter_group_id` int NOT NULL,
  `sort_order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_filter_description`
--

CREATE TABLE `ve_filter_description` (
  `filter_id` int NOT NULL,
  `language_id` int NOT NULL,
  `filter_group_id` int NOT NULL,
  `name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_filter_group`
--

CREATE TABLE `ve_filter_group` (
  `filter_group_id` int NOT NULL,
  `sort_order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_filter_group_description`
--

CREATE TABLE `ve_filter_group_description` (
  `filter_group_id` int NOT NULL,
  `language_id` int NOT NULL,
  `name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_gdpr`
--

CREATE TABLE `ve_gdpr` (
  `gdpr_id` int NOT NULL,
  `store_id` int NOT NULL,
  `language_id` int NOT NULL,
  `code` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(96) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `action` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_geo_zone`
--

CREATE TABLE `ve_geo_zone` (
  `geo_zone_id` int NOT NULL,
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_geo_zone`
--

INSERT INTO `ve_geo_zone` (`geo_zone_id`, `name`, `description`) VALUES
(3, 'UK VAT Zone', 'UK VAT'),
(4, 'UK Shipping', 'UK Shipping Zones');

-- --------------------------------------------------------

--
-- Table structure for table `ve_information`
--

CREATE TABLE `ve_information` (
  `information_id` int NOT NULL,
  `bottom` int NOT NULL DEFAULT '0',
  `sort_order` int NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_information`
--

INSERT INTO `ve_information` (`information_id`, `bottom`, `sort_order`, `status`) VALUES
(1, 1, 3, 1),
(2, 1, 1, 1),
(3, 1, 4, 1),
(4, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ve_information_description`
--

CREATE TABLE `ve_information_description` (
  `information_id` int NOT NULL,
  `language_id` int NOT NULL,
  `title` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meta_keyword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_information_description`
--

INSERT INTO `ve_information_description` (`information_id`, `language_id`, `title`, `description`, `meta_title`, `meta_description`, `meta_keyword`) VALUES
(1, 1, 'About Us', '&lt;p&gt;\r\n	About Us&lt;/p&gt;\r\n', 'About Us', '', ''),
(1, 9, 'About Us', '&lt;p&gt;\r\n	About Us&lt;/p&gt;\r\n', 'About Us', '', ''),
(2, 1, 'Terms &amp; Conditions', '&lt;p&gt;\r\n	Terms &amp;amp; Conditions&lt;/p&gt;\r\n', 'Terms &amp; Conditions', '', ''),
(2, 9, 'Terms &amp; Conditions', '&lt;p&gt;\r\n	Terms &amp;amp; Conditions&lt;/p&gt;\r\n', 'Terms &amp; Conditions', '', ''),
(3, 1, 'Privacy Policy', '&lt;p&gt;\r\n	Privacy Policy&lt;/p&gt;\r\n', 'Privacy Policy', '', ''),
(3, 9, 'Privacy Policy', '&lt;p&gt;\r\n	Privacy Policy&lt;/p&gt;\r\n', 'Privacy Policy', '', ''),
(4, 1, 'Delivery Information', '&lt;p&gt;\r\n	Delivery Information&lt;/p&gt;\r\n', 'Delivery Information', '', ''),
(4, 9, 'Delivery Information', '&lt;p&gt;\r\n	Delivery Information&lt;/p&gt;\r\n', 'Delivery Information', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ve_information_to_layout`
--

CREATE TABLE `ve_information_to_layout` (
  `information_id` int NOT NULL,
  `store_id` int NOT NULL,
  `layout_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_information_to_store`
--

CREATE TABLE `ve_information_to_store` (
  `information_id` int NOT NULL,
  `store_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_information_to_store`
--

INSERT INTO `ve_information_to_store` (`information_id`, `store_id`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ve_language`
--

CREATE TABLE `ve_language` (
  `language_id` int NOT NULL,
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `locale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `extension` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_language`
--

INSERT INTO `ve_language` (`language_id`, `name`, `code`, `locale`, `extension`, `sort_order`, `status`) VALUES
(1, 'English', 'en-gb', 'en-gb,en', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ve_layout`
--

CREATE TABLE `ve_layout` (
  `layout_id` int NOT NULL,
  `name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_layout`
--

INSERT INTO `ve_layout` (`layout_id`, `name`) VALUES
(1, 'Home'),
(2, 'Product'),
(3, 'Category'),
(4, 'Default'),
(5, 'Manufacturer'),
(6, 'Account'),
(7, 'Checkout'),
(8, 'Contact'),
(9, 'Sitemap'),
(10, 'Affiliate'),
(11, 'Information'),
(12, 'Compare'),
(13, 'Search'),
(14, 'Blog');

-- --------------------------------------------------------

--
-- Table structure for table `ve_layout_module`
--

CREATE TABLE `ve_layout_module` (
  `layout_module_id` int NOT NULL,
  `layout_id` int NOT NULL,
  `code` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `position` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sort_order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_layout_module`
--

INSERT INTO `ve_layout_module` (`layout_module_id`, `layout_id`, `code`, `position`, `sort_order`) VALUES
(1, 10, 'opencart.account', 'column_right', 1),
(2, 6, 'opencart.account', 'column_right', 1),
(8, 14, 'opencart.topic', 'column_left', 1),
(9, 3, 'opencart.category', 'column_left', 0),
(10, 3, 'opencart.banner.1', 'column_left', 1),
(11, 3, 'opencart.filter', 'column_left', 2),
(31, 1, 'opencart.banner.3', 'content_top', 0),
(32, 1, 'opencart.latest.7', 'content_top', 1),
(33, 1, 'opencart.mostviewed.6', 'content_top', 3),
(34, 1, 'opencart.banner.4', 'content_bottom', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ve_layout_route`
--

CREATE TABLE `ve_layout_route` (
  `layout_route_id` int NOT NULL,
  `layout_id` int NOT NULL,
  `store_id` int NOT NULL,
  `route` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_layout_route`
--

INSERT INTO `ve_layout_route` (`layout_route_id`, `layout_id`, `store_id`, `route`) VALUES
(1, 6, 0, 'account/%'),
(2, 6, 0, 'information/gdpr'),
(3, 10, 0, 'affiliate/%'),
(6, 2, 0, 'product/product'),
(7, 11, 0, 'information/information'),
(8, 7, 0, 'checkout/%'),
(9, 8, 0, 'information/contact'),
(10, 9, 0, 'information/sitemap'),
(11, 4, 0, ''),
(12, 5, 0, 'product/manufacturer'),
(13, 12, 0, 'product/compare'),
(14, 13, 0, 'product/search'),
(15, 14, 0, 'cms/blog'),
(16, 14, 0, 'cms/blog.info'),
(17, 3, 0, 'product/category'),
(22, 1, 0, 'common/home');

-- --------------------------------------------------------

--
-- Table structure for table `ve_length_class`
--

CREATE TABLE `ve_length_class` (
  `length_class_id` int NOT NULL,
  `value` decimal(15,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_length_class`
--

INSERT INTO `ve_length_class` (`length_class_id`, `value`) VALUES
(1, '1.00000000'),
(2, '10.00000000'),
(3, '0.39370000');

-- --------------------------------------------------------

--
-- Table structure for table `ve_length_class_description`
--

CREATE TABLE `ve_length_class_description` (
  `length_class_id` int NOT NULL,
  `language_id` int NOT NULL,
  `title` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `unit` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_length_class_description`
--

INSERT INTO `ve_length_class_description` (`length_class_id`, `language_id`, `title`, `unit`) VALUES
(1, 1, 'Centimeter', 'cm'),
(1, 9, 'Centimeter', 'cm'),
(2, 1, 'Millimeter', 'mm'),
(2, 9, 'Millimeter', 'mm'),
(3, 1, 'Inch', 'in'),
(3, 9, 'Inch', 'in');

-- --------------------------------------------------------

--
-- Table structure for table `ve_location`
--

CREATE TABLE `ve_location` (
  `location_id` int NOT NULL,
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telephone` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `geocode` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `open` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_manufacturer`
--

CREATE TABLE `ve_manufacturer` (
  `manufacturer_id` int NOT NULL,
  `name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sort_order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_manufacturer`
--

INSERT INTO `ve_manufacturer` (`manufacturer_id`, `name`, `image`, `sort_order`) VALUES
(5, 'HTC', 'catalog/demo/htc_logo.jpg', 0),
(6, 'Palm', 'catalog/demo/palm_logo.jpg', 0),
(7, 'Hewlett-Packard', 'catalog/demo/hp_logo.jpg', 0),
(8, 'Apple', 'catalog/demo/apple_logo.jpg', 0),
(9, 'Canon', 'catalog/demo/canon_logo.jpg', 0),
(10, 'Sony', 'catalog/demo/sony_logo.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ve_manufacturer_to_layout`
--

CREATE TABLE `ve_manufacturer_to_layout` (
  `manufacturer_id` int NOT NULL,
  `store_id` int NOT NULL,
  `layout_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_manufacturer_to_store`
--

CREATE TABLE `ve_manufacturer_to_store` (
  `manufacturer_id` int NOT NULL,
  `store_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_manufacturer_to_store`
--

INSERT INTO `ve_manufacturer_to_store` (`manufacturer_id`, `store_id`) VALUES
(5, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ve_marketing`
--

CREATE TABLE `ve_marketing` (
  `marketing_id` int NOT NULL,
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `clicks` int NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_marketing_report`
--

CREATE TABLE `ve_marketing_report` (
  `marketing_report_id` int NOT NULL,
  `marketing_id` int NOT NULL,
  `store_id` int NOT NULL,
  `ip` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_modification`
--

CREATE TABLE `ve_modification` (
  `modification_id` int NOT NULL,
  `extension_install_id` int NOT NULL,
  `name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `author` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `version` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `xml` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_module`
--

CREATE TABLE `ve_module` (
  `module_id` int NOT NULL,
  `name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `setting` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_module`
--

INSERT INTO `ve_module` (`module_id`, `name`, `code`, `setting`) VALUES
(2, 'Featured', 'opencart.featured', '{\"name\":\"Featured\",\"product_name\":\"\",\"product\":[\"43\",\"40\",\"42\",\"30\"],\"axis\":\"horizontal\",\"limit\":\"4\",\"width\":\"200\",\"height\":\"200\",\"status\":\"1\"}'),
(3, 'Homepage Slideshow', 'opencart.banner', '{\"name\":\"Homepage Slideshow\",\"banner_id\":\"1\",\"effect\":\"slide\",\"items\":\"1\",\"controls\":\"1\",\"indicators\":\"1\",\"interval\":\"5000\",\"width\":\"1140\",\"height\":\"380\",\"status\":\"1\",\"module_id\":\"3\"}'),
(5, 'best', 'opencart.bestseller', '{\"name\":\"best\",\"axis\":\"horizontal\",\"limit\":\"5\",\"width\":\"200\",\"height\":\"200\",\"status\":\"1\",\"module_id\":\"0\"}'),
(6, 'Most viewed', 'opencart.mostviewed', '{\"name\":\"Most viewed\",\"axis\":\"horizontal\",\"limit\":\"4\",\"timeframe\":\"month\",\"width\":\"200\",\"height\":\"200\",\"status\":\"1\",\"module_id\":\"6\"}'),
(7, 'Latest', 'opencart.latest', '{\"name\":\"Latest\",\"axis\":\"horizontal\",\"limit\":\"5\",\"width\":\"200\",\"height\":\"200\",\"status\":\"1\",\"module_id\":\"0\"}');

-- --------------------------------------------------------

--
-- Table structure for table `ve_notification`
--

CREATE TABLE `ve_notification` (
  `notification_id` int NOT NULL,
  `title` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_options`
--

CREATE TABLE `ve_options` (
  `option_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int DEFAULT NULL,
  `language_id` int NOT NULL,
  `option_n` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ve_options`
--

INSERT INTO `ve_options` (`option_id`, `name`, `type`, `group_id`, `language_id`, `option_n`) VALUES
(31, 'Color', 'radio', 31, 1, -1),
(32, 'A-black', 'radio', 31, 1, 0),
(33, 'A-black fleece', 'radio', 31, 1, 1),
(34, 'B-apricot', 'radio', 31, 1, 2),
(35, 'B-black', 'radio', 31, 1, 3),
(36, 'Shoe Size', 'radio', 36, 1, -1),
(37, '35', 'radio', 36, 1, 0),
(38, '36', 'radio', 36, 1, 1),
(39, '37', 'radio', 36, 1, 2),
(40, '38', 'radio', 36, 1, 3),
(41, '39', 'radio', 36, 1, 4),
(42, '40', 'radio', 36, 1, 5),
(43, '41', 'radio', 36, 1, 6),
(44, '42', 'radio', 36, 1, 7),
(45, '43', 'radio', 36, 1, 8),
(46, 'Emitting Color', 'radio', 46, 1, -1),
(47, 'WHITE', 'radio', 46, 1, 0),
(48, 'Warm White', 'radio', 46, 1, 1),
(49, 'Length', 'radio', 49, 1, -1),
(50, '2m', 'radio', 49, 1, 0),
(51, '5m', 'radio', 49, 1, 1),
(52, '10m', 'radio', 49, 1, 2),
(53, '15m', 'radio', 49, 1, 3),
(54, '20m', 'radio', 49, 1, 4),
(69, 'Color', 'radio', 69, 1, -1),
(70, 'Red', 'radio', 69, 1, 0),
(71, 'White', 'radio', 69, 1, 1),
(72, 'Green', 'radio', 69, 1, 2),
(73, 'Black', 'radio', 69, 1, 3),
(74, 'Yellow', 'radio', 69, 1, 4),
(75, 'Color', 'radio', 75, 1, -1),
(76, '10.5inch black', 'radio', 75, 1, 0),
(77, '11inch black', 'radio', 75, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ve_order`
--

CREATE TABLE `ve_order` (
  `order_id` int NOT NULL,
  `subscription_id` int NOT NULL,
  `invoice_no` int NOT NULL DEFAULT '0',
  `invoice_prefix` varchar(26) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `transaction_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `store_id` int NOT NULL DEFAULT '0',
  `store_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `store_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customer_id` int NOT NULL DEFAULT '0',
  `customer_group_id` int NOT NULL DEFAULT '0',
  `firstname` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(96) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telephone` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `custom_field` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_address_id` int NOT NULL,
  `payment_firstname` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_lastname` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_company` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_address_1` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_phone` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_city` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_postcode` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_country` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_country_id` int NOT NULL,
  `payment_zone` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_zone_id` int NOT NULL,
  `payment_address_format` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_custom_field` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_method` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_address_id` int NOT NULL,
  `shipping_firstname` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_lastname` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_company` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_address_1` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_phone` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_city` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_postcode` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_country` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_country_id` int NOT NULL,
  `shipping_zone` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_zone_id` int NOT NULL,
  `shipping_address_format` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_custom_field` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_method` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `order_status_id` int NOT NULL DEFAULT '0',
  `affiliate_id` int NOT NULL,
  `commission` decimal(15,4) NOT NULL,
  `marketing_id` int NOT NULL,
  `tracking` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `language_id` int NOT NULL,
  `language_code` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `currency_id` int NOT NULL,
  `currency_code` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `currency_value` decimal(15,8) NOT NULL DEFAULT '1.00000000',
  `ip` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `forwarded_ip` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `accept_language` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_order_history`
--

CREATE TABLE `ve_order_history` (
  `order_history_id` int NOT NULL,
  `order_id` int NOT NULL,
  `order_status_id` int NOT NULL,
  `notify` tinyint(1) NOT NULL DEFAULT '0',
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_order_option`
--

CREATE TABLE `ve_order_option` (
  `order_option_id` int NOT NULL,
  `order_product_id` int NOT NULL,
  `order_id` int NOT NULL,
  `poption_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_order_product`
--

CREATE TABLE `ve_order_product` (
  `order_product_id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `variation_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `model` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `total` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `tax` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `reward` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_order_status`
--

CREATE TABLE `ve_order_status` (
  `order_status_id` int NOT NULL,
  `language_id` int NOT NULL,
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_order_status`
--

INSERT INTO `ve_order_status` (`order_status_id`, `language_id`, `name`) VALUES
(1, 1, 'Pending'),
(2, 1, 'Processing'),
(3, 1, 'Shipped'),
(5, 1, 'Complete'),
(7, 1, 'Canceled'),
(8, 1, 'Denied'),
(9, 1, 'Canceled Reversal'),
(10, 1, 'Failed'),
(11, 1, 'Refunded'),
(12, 1, 'Reversed'),
(13, 1, 'Chargeback'),
(14, 1, 'Expired'),
(15, 1, 'Processed'),
(16, 1, 'Voided');

-- --------------------------------------------------------

--
-- Table structure for table `ve_order_subscription`
--

CREATE TABLE `ve_order_subscription` (
  `order_subscription_id` int NOT NULL,
  `order_product_id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `subscription_plan_id` int NOT NULL,
  `trial_price` decimal(10,4) NOT NULL,
  `trial_tax` decimal(15,4) NOT NULL,
  `trial_frequency` enum('day','week','semi_month','month','year') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `trial_cycle` smallint NOT NULL,
  `trial_duration` smallint NOT NULL,
  `trial_remaining` smallint NOT NULL,
  `trial_status` tinyint(1) NOT NULL,
  `price` decimal(10,4) NOT NULL,
  `tax` decimal(15,4) NOT NULL,
  `frequency` enum('day','week','semi_month','month','year') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cycle` smallint NOT NULL,
  `duration` smallint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_order_total`
--

CREATE TABLE `ve_order_total` (
  `order_total_id` int NOT NULL,
  `order_id` int NOT NULL,
  `extension` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `value` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `sort_order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_order_voucher`
--

CREATE TABLE `ve_order_voucher` (
  `order_voucher_id` int NOT NULL,
  `order_id` int NOT NULL,
  `voucher_id` int NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `from_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `from_email` varchar(96) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `to_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `to_email` varchar(96) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `voucher_theme_id` int NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `amount` decimal(15,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_product`
--

CREATE TABLE `ve_product` (
  `product_id` int NOT NULL,
  `variation_id` int NOT NULL DEFAULT '0',
  `model` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sku` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `upc` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ean` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jan` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `isbn` varchar(17) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mpn` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `variant` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `override` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `stock_status_id` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `manufacturer_id` int NOT NULL,
  `shipping` tinyint(1) NOT NULL DEFAULT '1',
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `supply_cost` decimal(10,0) NOT NULL,
  `points` int NOT NULL DEFAULT '0',
  `tax_class_id` int NOT NULL,
  `date_available` date NOT NULL,
  `weight` decimal(15,8) NOT NULL DEFAULT '0.00000000',
  `weight_class_id` int NOT NULL DEFAULT '0',
  `length` decimal(15,8) NOT NULL DEFAULT '0.00000000',
  `width` decimal(15,8) NOT NULL DEFAULT '0.00000000',
  `height` decimal(15,8) NOT NULL DEFAULT '0.00000000',
  `length_class_id` int NOT NULL DEFAULT '0',
  `subtract` tinyint(1) NOT NULL DEFAULT '1',
  `minimum` int NOT NULL DEFAULT '1',
  `rating` int NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_product`
--

INSERT INTO `ve_product` (`product_id`, `variation_id`, `model`, `sku`, `upc`, `ean`, `jan`, `isbn`, `mpn`, `location`, `variant`, `override`, `quantity`, `stock_status_id`, `image`, `manufacturer_id`, `shipping`, `price`, `supply_cost`, `points`, `tax_class_id`, `date_available`, `weight`, `weight_class_id`, `length`, `width`, `height`, `length_class_id`, `subtract`, `minimum`, `rating`, `sort_order`, `status`, `date_added`, `date_modified`) VALUES
(1, 0, 'AL1005004747443389', 'AL1005004747443389', '', '', '', '', '', '', '', '', 0, 6, 'catalog/products/1/mi4ur_Retro-Plush-.webp', 0, 1, '29.0100', '0', 0, 0, '2024-01-02', '0.50000000', 2, '30.00000000', '20.00000000', '10.00000000', 1, 1, 1, 0, 0, 1, '2024-01-02 10:37:12', '2024-01-02 14:13:29'),
(2, 0, 'AL1005005834080921', 'AL1005005834080921', '', '', '', '', '', '', '', '', 0, 6, 'catalog/products/2/mA9Dv_20M-40M-High.webp', 0, 1, '12.9100', '0', 0, 0, '2024-01-02', '0.40800000', 2, '18.00000000', '17.00000000', '7.00000000', 1, 1, 1, 0, 0, 1, '2024-01-02 10:42:52', '2024-01-02 13:13:29'),
(3, 0, 'CJJJJTCF05893', 'CJJJJTCF05893', '', '', '', '', '', '', '', '', 39567, 6, 'catalog/products/3/17hWRO_507670592e5af3b4c5aa1a5d64536011.mp4', 0, 1, '11.6000', '0', 0, 0, '2024-01-02', '53.00000000', 2, '110.00000000', '53.00000000', '73.00000000', 1, 1, 1, 0, 0, 1, '2024-01-02 12:22:56', '2024-01-02 12:31:50'),
(4, 0, 'CJBJ1314105', 'CJBJ1314105', '', '', '', '', '', '', '', '', 36956, 6, 'catalog/products/4/mJzi3_a9106b99-e17.jpg', 0, 1, '52.4400', '0', 0, 0, '2024-01-02', '900.00000000', 2, '300.00000000', '200.00000000', '50.00000000', 1, 1, 1, 0, 0, 1, '2024-01-02 12:38:06', '2024-01-02 13:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `ve_product_attribute`
--

CREATE TABLE `ve_product_attribute` (
  `product_id` int NOT NULL,
  `attribute_id` int NOT NULL,
  `language_id` int NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_product_bestseller`
--

CREATE TABLE `ve_product_bestseller` (
  `product_id` int NOT NULL,
  `total` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `ve_product_description`
--

CREATE TABLE `ve_product_description` (
  `product_id` int NOT NULL,
  `language_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tag` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meta_keyword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_product_description`
--

INSERT INTO `ve_product_description` (`product_id`, `language_id`, `name`, `description`, `tag`, `meta_title`, `meta_description`, `meta_keyword`) VALUES
(1, 1, 'Retro Plush Warm Autumn Winter Women\'s Boot Vintage Block Heel Ankle Boots Zipper High Heels Women Shoes Big Sizes Botines Mujer', '&lt;p&gt;Retro Plush Warm Autumn Winter Women\'s Boot Vintage Block Heel Ankle Boots Zipper High Heels Women Shoes Big Sizes Botines Mujer&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;widget data-widget-type=&quot;customText&quot; id=&quot;1005000006760804&quot; type=&quot;relation&quot;&gt;&lt;/widget&gt;&lt;/p&gt;\r\n\r\n&lt;div&gt;\r\n&lt;div&gt;\r\n&lt;div&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div&gt;\r\n&lt;div&gt;\r\n&lt;p align=&quot;left&quot;&gt;&lt;img slate-data-type=&quot;image&quot; src=&quot;/image/catalog/products/1/03Fhs_Scc20d49dbc9.webp&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p align=&quot;left&quot;&gt;&lt;br /&gt;\r\n&lt;img slate-data-type=&quot;image&quot; src=&quot;/image/catalog/products/1/1Cnv3_S3d219769827.webp&quot; /&gt;&lt;img slate-data-type=&quot;image&quot; src=&quot;/image/catalog/products/1/24wy5_S21dbe760a14.webp&quot; /&gt;&lt;img slate-data-type=&quot;image&quot; src=&quot;/image/catalog/products/1/39wGn_Seec660469b7.webp&quot; /&gt;&lt;img slate-data-type=&quot;image&quot; src=&quot;/image/catalog/products/1/4kEIj_S9a3e7e41ead.webp&quot; /&gt;&lt;img slate-data-type=&quot;image&quot; src=&quot;/image/catalog/products/1/58r2u_Sf08b5c8e0aa.webp&quot; /&gt;&lt;img slate-data-type=&quot;image&quot; src=&quot;/image/catalog/products/1/6BFuC_S8f9c1a8689c.webp&quot; /&gt;&lt;img slate-data-type=&quot;image&quot; src=&quot;/image/catalog/products/1/74X98_Sa5afeac9dff.webp&quot; /&gt;&lt;img slate-data-type=&quot;image&quot; src=&quot;/image/catalog/products/1/8EhBG_Sbcd674ffa6d.webp&quot; /&gt;&lt;img slate-data-type=&quot;image&quot; src=&quot;/image/catalog/products/1/9m89f_S98e988a5927.webp&quot; /&gt;&lt;/p&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div&gt;Â&amp;nbsp;&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;div&gt;&amp;nbsp;&lt;/div&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;div&gt;&amp;nbsp;&lt;/div&gt;\r\n\r\n&lt;div&gt;&amp;nbsp;&lt;/div&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;script&gt;\r\n            var attributes = [{&quot;attrValue&quot;:&quot;LEISURE&quot;,&quot;attrName&quot;:&quot;Style&quot;},{&quot;attrValue&quot;:&quot;Shallow&quot;,&quot;attrName&quot;:&quot;Fashion Element&quot;},{&quot;attrValue&quot;:&quot;Fits true to size, take your normal size&quot;,&quot;attrName&quot;:&quot;Fit&quot;},{&quot;attrValue&quot;:&quot;flock&quot;,&quot;attrName&quot;:&quot;Shaft Material&quot;},{&quot;attrValue&quot;:&quot;Short Plush&quot;,&quot;attrName&quot;:&quot;Lining Material&quot;},{&quot;attrValue&quot;:&quot;Yes&quot;,&quot;attrName&quot;:&quot;is_handmade&quot;},{&quot;attrValue&quot;:&quot;No&quot;,&quot;attrName&quot;:&quot;With Platforms&quot;},{&quot;attrValue&quot;:&quot;Rubber&quot;,&quot;attrName&quot;:&quot;Outsole Material&quot;},{&quot;attrValue&quot;:&quot;Solid&quot;,&quot;attrName&quot;:&quot;Pattern Type&quot;},{&quot;attrValue&quot;:&quot;PU&quot;,&quot;attrName&quot;:&quot;Insole Material&quot;},{&quot;attrValue&quot;:&quot;Winter&quot;,&quot;attrName&quot;:&quot;Season&quot;},{&quot;attrValue&quot;:&quot;women boot&quot;,&quot;attrName&quot;:&quot;Model Number&quot;},{&quot;attrValue&quot;:&quot;Square heel&quot;,&quot;attrName&quot;:&quot;Heel Type&quot;},{&quot;attrValue&quot;:&quot;High (5cm-8cm)&quot;,&quot;attrName&quot;:&quot;Heel Height&quot;},{&quot;attrValue&quot;:&quot;Pointed toe&quot;,&quot;attrName&quot;:&quot;Toe Shape&quot;},{&quot;attrValue&quot;:&quot;Basic&quot;,&quot;attrName&quot;:&quot;Boot Type&quot;},{&quot;attrValue&quot;:&quot;ZIP&quot;,&quot;attrName&quot;:&quot;Closure Type&quot;},{&quot;attrValue&quot;:&quot;ANKLE&quot;,&quot;attrName&quot;:&quot;Boot Height&quot;},{&quot;attrValue&quot;:&quot;flock&quot;,&quot;attrName&quot;:&quot;Upper Material&quot;},{&quot;attrValue&quot;:&quot;Adult&quot;,&quot;attrName&quot;:&quot;Department Name&quot;},{&quot;attrValue&quot;:&quot;NoEnName_Null&quot;,&quot;attrName&quot;:&quot;Brand Name&quot;},{&quot;attrValue&quot;:&quot;Mainland China&quot;,&quot;attrName&quot;:&quot;Origin&quot;},{&quot;attrValue&quot;:&quot;Boots&quot;,&quot;attrName&quot;:&quot;Item Type&quot;},{&quot;attrValue&quot;:&quot;Zhejiang&quot;,&quot;attrName&quot;:&quot;CN&quot;},{&quot;attrValue&quot;:&quot;chaussure femme&quot;,&quot;attrName&quot;:&quot;ankle boots&quot;},{&quot;attrValue&quot;:&quot;shoes for women 2022&quot;,&quot;attrName&quot;:&quot;sapatos femininos&quot;},{&quot;attrValue&quot;:&quot;boots female women shoes&quot;,&quot;attrName&quot;:&quot;botas mujer invierno 2022&quot;}];\r\n            $(document).ready(function () {\r\n                $(&quot;.nav-tabs li:first&quot;).after(\'&lt;li class=&quot;nav-item&quot; role=&quot;presentation&quot;&gt;&lt;a href=&quot;#tab-specification&quot; data-bs-toggle=&quot;tab&quot; class=&quot;nav-link&quot; aria-selected=&quot;true&quot; role=&quot;tab&quot;&gt;Specification&lt;/a&gt;&lt;/li&gt;\');\r\n                $(&quot;.tab-content&quot;).append(\'&lt;div id=&quot;tab-specification&quot; class=&quot;tab-pane fade mb-4&quot; role=&quot;tabpanel&quot;&gt;\' + generateTable(attributes) + \'&lt;/div&gt;\');\r\n\r\n                function generateTable(data) {\r\n                    let table = \'&lt;table class=&quot;table table-striped table-bordered table-hover&quot;&gt;\';\r\n                    table += \'&lt;tr&gt;&lt;th&gt;Attribute Name&lt;/th&gt;&lt;th&gt;Attribute Value&lt;/th&gt;&lt;/tr&gt;\';\r\n\r\n                    data.forEach(item =&gt; {\r\n                        table += `&lt;tr&gt;&lt;td&gt;${item.attrName}&lt;/td&gt;&lt;td&gt;${item.attrValue}&lt;/td&gt;&lt;/tr&gt;`;\r\n                    });\r\n\r\n                    table += \'&lt;/table&gt;\';\r\n                    return table;\r\n                }\r\n            });\r\n        &lt;/script&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', '', 'Retro Plush Warm Autumn Winter Women\'s Boot Vintage Block Heel Ankle Boots Zipper High Heels Women Shoes Big Sizes Botines Mujer', '', 'Retro, Plush, Warm, Autumn, Winter, Women\'s, Boot, Vintage, Block, Heel, Ankle, Boots, Zipper, High, Heels, Women, Shoes, Big, Sizes, Botines, Mujer'),
(2, 1, '20M 40M High Bright COB LED Strip Light 288leds/M EU Plug 220V CRI RA90 Outdoor Garden FOB LED Tape For Bedroom Kitchen Lighting', '&lt;div class=&quot;detailmodule_text&quot;&gt;\r\n&lt;p class=&quot;detail-desc-decorate-title&quot;&gt;Bright COB LED Strip Light 288leds/M EU Plug 220V CRI RA90 Outdoor Garden FOB LED Tape For Bedroom Kitchen Lighting&lt;/p&gt;\r\n\r\n&lt;p class=&quot;detail-desc-decorate-title&quot;&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p class=&quot;detail-desc-decorate-title&quot;&gt;Specification:&lt;/p&gt;\r\n\r\n&lt;div class=&quot;detailmodule_text&quot;&gt;\r\n&lt;p class=&quot;detail-desc-decorate-content&quot;&gt;Color Temperature: White(6000K-6500K) ; Warm White(2800K-3500K)&lt;br /&gt;\r\nLED Type: COB&lt;br /&gt;\r\nLED Quantity:288 LEDS/meter&lt;br /&gt;\r\nWaterproof Rate:IP67 Waterproof( Can be used outdoors )&lt;br /&gt;\r\nWorking Voltage:AC220Vï¼ˆWith EU Power plug).&lt;br /&gt;\r\nLifetime:50,000 hours&lt;br /&gt;\r\nWarranty:1 years&lt;/p&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;detailmodule_text&quot;&gt;\r\n&lt;p class=&quot;detail-desc-decorate-title&quot;&gt;Applications:&lt;/p&gt;\r\n\r\n&lt;p class=&quot;detail-desc-decorate-content&quot;&gt;1.Light up colorful home life ,DIY household lights for hallways, stairs, trails ,windows,kitchen&lt;br /&gt;\r\n2.Light up colorful life hotels decoration use,Theaters, clubs, shopping malls, festivals and performances&lt;br /&gt;\r\n3.Architectural decorative lighting,Archway, canopy and bridge edge lighting, Security lighting and Emergency&lt;br /&gt;\r\n4.Extensively applied in Backlighting for signage letters, concealed lighting and advertisement sign lighting&lt;br /&gt;\r\n5.Applicable for automobile &amp;amp; Airplane model decoration, contour lighting or border.&lt;/p&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;detailmodule_text-image&quot;&gt;&lt;img class=&quot;detail-desc-decorate-image&quot; slate-data-type=&quot;image&quot; src=&quot;/image/catalog/products/2/0FKmu_S5a706816457.webp&quot; /&gt;&lt;img class=&quot;detail-desc-decorate-image&quot; slate-data-type=&quot;image&quot; src=&quot;/image/catalog/products/2/131se_Scee41edc943.webp&quot; /&gt;&lt;img class=&quot;detail-desc-decorate-image&quot; slate-data-type=&quot;image&quot; src=&quot;/image/catalog/products/2/2NZ5T_Sf31201c663e.webp&quot; /&gt;&lt;img class=&quot;detail-desc-decorate-image&quot; slate-data-type=&quot;image&quot; src=&quot;/image/catalog/products/2/3m597_Scca98bec5c0.webp&quot; /&gt;&lt;img class=&quot;detail-desc-decorate-image&quot; slate-data-type=&quot;image&quot; src=&quot;/image/catalog/products/2/4Ts7R_S6a42cf0d87a.webp&quot; /&gt;&lt;img class=&quot;detail-desc-decorate-image&quot; slate-data-type=&quot;image&quot; src=&quot;/image/catalog/products/2/5zsDg_S5266bcc3cdb.webp&quot; /&gt;&lt;img class=&quot;detail-desc-decorate-image&quot; slate-data-type=&quot;image&quot; src=&quot;/image/catalog/products/2/6uWvP_S076f1f3db9a.webp&quot; /&gt;&lt;img class=&quot;detail-desc-decorate-image&quot; slate-data-type=&quot;image&quot; src=&quot;/image/catalog/products/2/7vyXK_S825b7390a58.webp&quot; /&gt;&lt;img class=&quot;detail-desc-decorate-image&quot; slate-data-type=&quot;image&quot; src=&quot;/image/catalog/products/2/8pqne_Sfaa01c071b0.webp&quot; /&gt;&lt;img class=&quot;detail-desc-decorate-image&quot; slate-data-type=&quot;image&quot; src=&quot;/image/catalog/products/2/9Ql95_Sb98f3a55f65.webp&quot; /&gt;&lt;/div&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;script&gt;\r\n            var attributes = [{&quot;attrValue&quot;:&quot;no&quot;,&quot;attrName&quot;:&quot;Is Smart Device&quot;},{&quot;attrValue&quot;:&quot;SWITCH&quot;,&quot;attrName&quot;:&quot;Power Generation&quot;},{&quot;attrValue&quot;:&quot;220V COB LED Strip&quot;,&quot;attrName&quot;:&quot;Model Number&quot;},{&quot;attrValue&quot;:&quot;SMD2835&quot;,&quot;attrName&quot;:&quot;LED Chip Model&quot;},{&quot;attrValue&quot;:&quot;30000&quot;,&quot;attrName&quot;:&quot;Average Life (hrs)&quot;},{&quot;attrValue&quot;:&quot;ce,FCC,ROHS,UL&quot;,&quot;attrName&quot;:&quot;Certification&quot;},{&quot;attrValue&quot;:&quot;220V&quot;,&quot;attrName&quot;:&quot;Voltage&quot;},{&quot;attrValue&quot;:&quot;AC&quot;,&quot;attrName&quot;:&quot;Power Source&quot;},{&quot;attrValue&quot;:&quot;8.64W\\/m&quot;,&quot;attrName&quot;:&quot;Power Consumption (W\\/m)&quot;},{&quot;attrValue&quot;:&quot;Living Room&quot;,&quot;attrName&quot;:&quot;Occasion&quot;},{&quot;attrValue&quot;:&quot;288leds\\/m&quot;,&quot;attrName&quot;:&quot;LEDs Number\\/M&quot;},{&quot;attrValue&quot;:&quot;Epistar&quot;,&quot;attrName&quot;:&quot;LED Chip Brand&quot;},{&quot;attrValue&quot;:&quot;Yes&quot;,&quot;attrName&quot;:&quot;Waterproof&quot;},{&quot;attrValue&quot;:&quot;288&quot;,&quot;attrName&quot;:&quot;Specifications (light beads \\/ m)&quot;},{&quot;attrValue&quot;:&quot;COB&quot;,&quot;attrName&quot;:&quot;Strip type&quot;},{&quot;attrValue&quot;:&quot;CHNAITEKE&quot;,&quot;attrName&quot;:&quot;Brand Name&quot;},{&quot;attrValue&quot;:&quot;Mainland China&quot;,&quot;attrName&quot;:&quot;Origin&quot;},{&quot;attrValue&quot;:&quot;Strip&quot;,&quot;attrName&quot;:&quot;Item Type&quot;}];\r\n            $(document).ready(function () {\r\n                $(&quot;.nav-tabs li:first&quot;).after(\'&lt;li class=&quot;nav-item&quot; role=&quot;presentation&quot;&gt;&lt;a href=&quot;#tab-specification&quot; data-bs-toggle=&quot;tab&quot; class=&quot;nav-link&quot; aria-selected=&quot;true&quot; role=&quot;tab&quot;&gt;Specification&lt;/a&gt;&lt;/li&gt;\');\r\n                $(&quot;.tab-content&quot;).append(\'&lt;div id=&quot;tab-specification&quot; class=&quot;tab-pane fade mb-4&quot; role=&quot;tabpanel&quot;&gt;\' + generateTable(attributes) + \'&lt;/div&gt;\');\r\n\r\n                function generateTable(data) {\r\n                    let table = \'&lt;table class=&quot;table table-striped table-bordered table-hover&quot;&gt;\';\r\n                    table += \'&lt;tr&gt;&lt;th&gt;Attribute Name&lt;/th&gt;&lt;th&gt;Attribute Value&lt;/th&gt;&lt;/tr&gt;\';\r\n\r\n                    data.forEach(item =&gt; {\r\n                        table += `&lt;tr&gt;&lt;td&gt;${item.attrName}&lt;/td&gt;&lt;td&gt;${item.attrValue}&lt;/td&gt;&lt;/tr&gt;`;\r\n                    });\r\n\r\n                    table += \'&lt;/table&gt;\';\r\n                    return table;\r\n                }\r\n            });\r\n        &lt;/script&gt;', '', '20M 40M High Bright COB LED Strip Light 288leds/M EU Plug 220V CRI RA90 Outdoor Garden FOB LED Tape For Bedroom Kitchen Lighting', '', '20M, 40M, High, Bright, COB, LED, Strip, Light, 288leds/M, EU, Plug, 220V, CRI, RA90, Outdoor, Garden, FOB, LED, Tape, For, Bedroom, Kitchen, Lighting'),
(3, 1, 'Stainless Steel Garlic Masher Garlic Press Household Manual Curve Fruit Vegetable Tools Kitchen Gadgets', '&lt;p&gt;&lt;b&gt;Overview:&lt;/b&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;SAVE LABOUR-Design in accord with human body engineering mechanics, When you use it more effort.&lt;br /&gt;\r\nstainless steel - A garlic press made of stainless steel, Light and strong, Have a non-slip handle Make it more comfortable to use.&lt;br /&gt;\r\nEASY TO CLEAN -It is easy to clean, Rinse under the tap, Garlic does not stay inside, It can be cleaned in the dishwasher.&lt;br /&gt;\r\nNEVER RUST-For it is stainless steel So will not rust You don\'t have to worry about it.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;b&gt;Specifications:&lt;/b&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Utensils type: garlic press&lt;br /&gt;\r\nMaterial: Stainless steel&lt;br /&gt;\r\nSpecification: 304 garlic press&lt;br /&gt;\r\nCustom processing: modern and simple&lt;br /&gt;\r\nScope of application: household, other&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;b&gt;Package Content:&lt;/b&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;1*&lt;span style=&quot;font-size: 1em;&quot;&gt;Garlic Masher&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img height=&quot;759.99&quot; src=&quot;/image/catalog/products/3/0IxGK_f0cc79a4-026.jpg&quot; style=&quot;max-width: 100%;&quot; width=&quot;800&quot; /&gt;&lt;img src=&quot;/image/catalog/products/3/1xDH3_c2358eef-a9f.jpg&quot; /&gt;&lt;img src=&quot;/image/catalog/products/3/2dw21_3f54ac90-4f3.jpg&quot; style=&quot;max-width: 100%;&quot; /&gt;&lt;img src=&quot;/image/catalog/products/3/3Nqv2_d3e01368-d24.jpg&quot; style=&quot;max-width: 100%;&quot; /&gt;&lt;img src=&quot;/image/catalog/products/3/4cO1a_6e61575d-68b.jpg&quot; style=&quot;max-width: 100%;&quot; /&gt;&lt;img src=&quot;/image/catalog/products/3/5Veul_6c32847f-a8d.jpg&quot; style=&quot;font-size: 1em; max-width: 100%;&quot; /&gt;&lt;img src=&quot;/image/catalog/products/3/6WKrs_86f4224a-5d8.jpg&quot; style=&quot;font-size: 1em; max-width: 100%;&quot; /&gt;&lt;img src=&quot;/image/catalog/products/3/72uE3_f0dd3dd1-fd7.jpg&quot; style=&quot;font-size: 1em; max-width: 100%;&quot; /&gt;&lt;img height=&quot;801.5&quot; src=&quot;/image/catalog/products/3/8zH8k_99d7c587-1c3.jpg&quot; style=&quot;font-size: 1em; max-width: 100%;&quot; width=&quot;801.5&quot; /&gt;&lt;img height=&quot;800&quot; src=&quot;/image/catalog/products/3/9qV4z_016c3a9b-549.jpg&quot; style=&quot;font-size: 1em; max-width: 100%;&quot; width=&quot;800&quot; /&gt;&lt;img src=&quot;/image/catalog/products/3/10sHU3_3ba28205-d8d.jpg&quot; style=&quot;font-size: 1em; max-width: 100%;&quot; /&gt;&lt;img src=&quot;/image/catalog/products/3/11yWkF_1e2443cc-14c.jpg&quot; style=&quot;font-size: 1em; max-width: 100%;&quot; /&gt;&lt;img src=&quot;/image/catalog/products/3/126nWY_edba3e18-35f.jpg&quot; style=&quot;font-size: 1em; max-width: 100%;&quot; /&gt;&lt;/p&gt;\r\n&lt;script&gt;\r\n            var attributes = [{&quot;attrName&quot;:&quot;Product&quot;,&quot;attrValue&quot;:&quot;Garlic press&quot;},{&quot;attrName&quot;:&quot;Plastic&quot;,&quot;attrValue&quot;:&quot;Metal&quot;},{&quot;attrName&quot;:&quot;Metal&quot;,&quot;attrValue&quot;:&quot;Plastic&quot;},{&quot;attrName&quot;:&quot;Packing&quot;,&quot;attrValue&quot;:&quot;Plastic bags&quot;}];\r\n            $(document).ready(function () {\r\n                $(&quot;.nav-tabs li:first&quot;).after(\'&lt;li class=&quot;nav-item&quot; role=&quot;presentation&quot;&gt;&lt;a href=&quot;#tab-specification&quot; data-bs-toggle=&quot;tab&quot; class=&quot;nav-link&quot; aria-selected=&quot;true&quot; role=&quot;tab&quot;&gt;Specification&lt;/a&gt;&lt;/li&gt;\');\r\n                $(&quot;.tab-content&quot;).append(\'&lt;div id=&quot;tab-specification&quot; class=&quot;tab-pane fade mb-4&quot; role=&quot;tabpanel&quot;&gt;\' + generateTable(attributes) + \'&lt;/div&gt;\');\r\n\r\n                function generateTable(data) {\r\n                    let table = \'&lt;table class=&quot;table table-striped table-bordered table-hover&quot;&gt;\';\r\n                    table += \'&lt;tr&gt;&lt;th&gt;Attribute Name&lt;/th&gt;&lt;th&gt;Attribute Value&lt;/th&gt;&lt;/tr&gt;\';\r\n\r\n                    data.forEach(item =&gt; {\r\n                        table += `&lt;tr&gt;&lt;td&gt;${item.attrName}&lt;/td&gt;&lt;td&gt;${item.attrValue}&lt;/td&gt;&lt;/tr&gt;`;\r\n                    });\r\n\r\n                    table += \'&lt;/table&gt;\';\r\n                    return table;\r\n                }\r\n            });\r\n        &lt;/script&gt;', '', 'Stainless Steel Garlic Masher Garlic Press Household Manual Curve Fruit Vegetable Tools Kitchen Gadgets', '', 'Stainless, Steel, Garlic, Masher, Garlic, Press, Household, Manual, Curve, Fruit, Vegetable, Tools, Kitchen, Gadgets'),
(4, 1, 'Compatible with Apple, Suitable For Ipad Bluetooth Keyboard Second Control Integrated', '&lt;p&gt;Compatible with Apple, Suitable For Ipad Bluetooth Keyboard Second Control Integrated&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;b&gt;Product information:&lt;/b&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Applicable models: ipad&lt;br /&gt;\r\nInterface: Bluetooth&lt;br /&gt;\r\nLine length: 0 (meters)&lt;br /&gt;\r\nProduct size: 11 inches&lt;br /&gt;\r\nProduct weight: 0.9 (KG)&lt;br /&gt;\r\nProcessing method: OEM processing&lt;br /&gt;\r\nColor: 10.2&amp;amp;10.5 universal black, 10.9&amp;amp;11 inch universal black&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;br /&gt;\r\n&lt;b&gt;Packing list:&lt;/b&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;1*&lt;span style=&quot;font-size: 1em;&quot;&gt;Bluetooth keyboard&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img src=&quot;/image/catalog/products/4/0gDhF_defa7951-212.jpg&quot; style=&quot;max-width:100%;&quot; /&gt;&lt;img src=&quot;/image/catalog/products/4/1wnM3_fc85a367-349.jpg&quot; style=&quot;max-width: 100%;&quot; /&gt;&lt;img src=&quot;/image/catalog/products/4/2qrvR_4e2e31de-f12.jpg&quot; style=&quot;max-width: 100%;&quot; /&gt;&lt;img src=&quot;/image/catalog/products/4/3NtcG_e93822fb-52e.jpg&quot; style=&quot;max-width: 100%;&quot; /&gt;&lt;img src=&quot;/image/catalog/products/4/4k13n_5c162a0c-52a.jpg&quot; style=&quot;max-width: 100%;&quot; /&gt;&lt;/p&gt;\r\n&lt;script&gt;\r\n            var attributes = [{&quot;attrName&quot;:&quot;Product&quot;,&quot;attrValue&quot;:&quot;Plastic wireless keyboard&quot;},{&quot;attrName&quot;:&quot;Material&quot;,&quot;attrValue&quot;:&quot;Plastic&quot;},{&quot;attrName&quot;:&quot;Material information&quot;,&quot;attrValue&quot;:&quot;Plastic&quot;},{&quot;attrName&quot;:&quot;Packing&quot;,&quot;attrValue&quot;:&quot;Plastic bags&quot;}];\r\n            $(document).ready(function () {\r\n                $(&quot;.nav-tabs li:first&quot;).after(\'&lt;li class=&quot;nav-item&quot; role=&quot;presentation&quot;&gt;&lt;a href=&quot;#tab-specification&quot; data-bs-toggle=&quot;tab&quot; class=&quot;nav-link&quot; aria-selected=&quot;true&quot; role=&quot;tab&quot;&gt;Specification&lt;/a&gt;&lt;/li&gt;\');\r\n                $(&quot;.tab-content&quot;).append(\'&lt;div id=&quot;tab-specification&quot; class=&quot;tab-pane fade mb-4&quot; role=&quot;tabpanel&quot;&gt;\' + generateTable(attributes) + \'&lt;/div&gt;\');\r\n\r\n                function generateTable(data) {\r\n                    let table = \'&lt;table class=&quot;table table-striped table-bordered table-hover&quot;&gt;\';\r\n                    table += \'&lt;tr&gt;&lt;th&gt;Attribute Name&lt;/th&gt;&lt;th&gt;Attribute Value&lt;/th&gt;&lt;/tr&gt;\';\r\n\r\n                    data.forEach(item =&gt; {\r\n                        table += `&lt;tr&gt;&lt;td&gt;${item.attrName}&lt;/td&gt;&lt;td&gt;${item.attrValue}&lt;/td&gt;&lt;/tr&gt;`;\r\n                    });\r\n\r\n                    table += \'&lt;/table&gt;\';\r\n                    return table;\r\n                }\r\n            });\r\n        &lt;/script&gt;', '', 'Compatible with Apple, Suitable For Ipad Bluetooth Keyboard Second Control Integrated', '', 'Compatible, with, Apple,, Suitable, For, Ipad, Bluetooth, Keyboard, Second, Control, Integrated');

-- --------------------------------------------------------

--
-- Table structure for table `ve_product_discount`
--

CREATE TABLE `ve_product_discount` (
  `product_discount_id` int NOT NULL,
  `product_id` int NOT NULL,
  `customer_group_id` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `priority` int NOT NULL DEFAULT '1',
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `date_start` date NOT NULL,
  `date_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_product_filter`
--

CREATE TABLE `ve_product_filter` (
  `product_id` int NOT NULL,
  `filter_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_product_image`
--

CREATE TABLE `ve_product_image` (
  `product_image_id` int NOT NULL,
  `product_id` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_product_image`
--

INSERT INTO `ve_product_image` (`product_image_id`, `product_id`, `image`, `sort_order`) VALUES
(110, 3, 'catalog/products/3/0UmJh_3e20ea9e-489.jpg', 0),
(111, 3, 'catalog/products/3/1QAGy_101611442327.jpg', 1),
(112, 3, 'catalog/products/3/2cE64_145737563318.jpg', 2),
(113, 3, 'catalog/products/3/31Sdc_3fbfb3b1-bef.jpg', 3),
(114, 3, 'catalog/products/3/4W8lc_09acf251-b81.jpg', 4),
(115, 3, 'catalog/products/3/5TrKH_242351090605.jpg', 5),
(116, 3, 'catalog/products/3/6C37F_d5272567-f24.jpg', 6),
(117, 3, 'catalog/products/3/7C2x5_898627937252.jpg', 7),
(118, 3, 'catalog/products/3/8wNgZ_4540daa1-484.jpg', 8),
(119, 3, 'catalog/products/3/opt_2hOiT_2987b058-95b.jpg', 9),
(120, 3, 'catalog/products/3/10VYu8_ba87f2bb-b94.jpg', 10),
(121, 3, 'catalog/products/3/1135JX_102607715057.jpg', 11),
(122, 3, 'catalog/products/3/13kf97_ea9167c000e2297315490aa1957a22a2.mp4', 13),
(123, 3, 'catalog/products/3/14C1r3_d3c16a64b309fb1ce1fcef0b61f9dbe2.mp4', 14),
(124, 3, 'catalog/products/3/155tiX_9a033f255b1c6e9f8f21881c8322553d.mp4', 15),
(125, 3, 'catalog/products/3/16r1aT_70e7deeb065ee97538b8559577710446.mp4', 16),
(126, 3, 'catalog/products/3/17hWRO_507670592e5af3b4c5aa1a5d64536011.mp4', 17),
(159, 2, 'catalog/products/2/0y6wd_366674d7f17fc97235912b726fde8e7f.mp4', 0),
(160, 2, 'catalog/products/2/1DwBt_20M-40M-High.webp', 1),
(161, 2, 'catalog/products/2/2NH73_20M-40M-High.webp', 2),
(162, 2, 'catalog/products/2/3UvNT_20M-40M-High.webp', 3),
(163, 2, 'catalog/products/2/4xqm2_20M-40M-High.webp', 4),
(164, 2, 'catalog/products/2/5fiFD_20M-40M-High.webp', 5),
(165, 4, 'catalog/products/4/0H1dm_3928a428-809.jpg', 0),
(166, 4, 'catalog/products/4/126nR_e0e58e36-ee7.jpg', 1),
(167, 4, 'catalog/products/4/2hn7Z_09883df7-72d.jpg', 2),
(168, 4, 'catalog/products/4/3GB2D_7eb0b7c2-1fd.jpg', 3),
(175, 1, 'catalog/products/1/0Eb8u_4669c599bec1ddc210d6eaedb7089393.mp4', 0),
(176, 1, 'catalog/products/1/15PNT_Retro-Plush-.webp', 1),
(177, 1, 'catalog/products/1/2J9h7_Retro-Plush-.webp', 2),
(178, 1, 'catalog/products/1/3376N_Retro-Plush-.webp', 3),
(179, 1, 'catalog/products/1/4QlKg_Retro-Plush-.webp', 4),
(180, 1, 'catalog/products/1/575KL_Retro-Plush-.webp', 5);

-- --------------------------------------------------------

--
-- Table structure for table `ve_product_options`
--

CREATE TABLE `ve_product_options` (
  `poption_id` int NOT NULL,
  `product_id` int NOT NULL,
  `option_id` int NOT NULL,
  `price` decimal(15,8) NOT NULL,
  `price_prefix` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `subtract` tinyint(1) NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int NOT NULL,
  `weight` decimal(15,8) NOT NULL,
  `weight_prefix` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` int NOT NULL,
  `points_prefix` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ve_product_options`
--

INSERT INTO `ve_product_options` (`poption_id`, `product_id`, `option_id`, `price`, `price_prefix`, `quantity`, `subtract`, `value`, `sort_order`, `weight`, `weight_prefix`, `points`, `points_prefix`, `required`) VALUES
(1, 1, 33, '32.43000000', '+', 181, 1, 'catalog/products/1/opt_0YSWA_Retro-Plush-.webp', 2, '0.00000000', '+', 0, '+', 1),
(2, 1, 33, '31.33000000', '+', 181, 1, 'catalog/products/1/opt_1GH8R_Retro-Plush-.webp', 3, '0.00000000', '+', 0, '+', 1),
(3, 1, 34, '32.15000000', '+', 181, 1, 'catalog/products/1/opt_2UK2D_Retro-Plush-.webp', 4, '0.00000000', '+', 0, '+', 1),
(4, 1, 35, '32.01000000', '+', 181, 1, 'catalog/products/1/opt_3ZmWp_Retro-Plush-.webp', 5, '0.00000000', '+', 0, '+', 1),
(5, 1, 37, '29.01000000', '+', 200, 1, '', 7, '0.00000000', '+', 0, '+', 1),
(6, 1, 38, '29.15000000', '+', 198, 1, '', 8, '0.00000000', '+', 0, '+', 1),
(7, 1, 39, '29.29000000', '+', 199, 1, '', 9, '0.00000000', '+', 0, '+', 1),
(8, 1, 40, '29.41000000', '+', 0, 1, '', 10, '0.00000000', '+', 0, '+', 1),
(9, 1, 41, '29.56000000', '+', 0, 1, '', 11, '0.00000000', '+', 0, '+', 1),
(10, 1, 42, '29.70000000', '+', 0, 1, '', 12, '0.00000000', '+', 0, '+', 1),
(11, 1, 43, '29.83000000', '+', 0, 1, '', 13, '0.00000000', '+', 0, '+', 1),
(12, 1, 44, '29.97000000', '+', 0, 1, '', 14, '0.00000000', '+', 0, '+', 1),
(13, 1, 45, '30.11000000', '+', 0, 1, '', 15, '0.00000000', '+', 0, '+', 1),
(14, 2, 47, '0.00000000', '+', 128, 1, 'catalog/products/2/opt_09d1t_20M-40M-High.webp', 0, '0.00000000', '+', 0, '+', 1),
(15, 2, 48, '0.00000000', '+', 128, 1, 'catalog/products/2/opt_1y7Ot_20M-40M-High.webp', 1, '0.00000000', '+', 0, '+', 1),
(16, 2, 50, '12.91000000', '+', 6, 1, '', 0, '0.00000000', '+', 0, '+', 1),
(17, 2, 51, '22.78000000', '+', 67, 1, '', 1, '0.00000000', '+', 0, '+', 1),
(18, 2, 52, '32.88000000', '+', 54, 1, '', 2, '0.00000000', '+', 0, '+', 1),
(19, 2, 53, '44.11000000', '+', 28, 1, '', 3, '0.00000000', '+', 0, '+', 1),
(20, 2, 54, '54.04000000', '+', 116, 1, '', 4, '0.00000000', '+', 0, '+', 1),
(27, 3, 70, '11.60000000', '+', 39567, 1, 'catalog/products/3/opt_0iI8K_d5272567-f24.jpg', 0, '0.00000000', '+', 0, '+', 1),
(28, 3, 71, '11.60000000', '+', 39567, 1, 'catalog/products/3/opt_1JA41_3fbfb3b1-bef.jpg', 1, '0.00000000', '+', 0, '+', 1),
(29, 3, 72, '11.60000000', '+', 39567, 1, 'catalog/products/3/opt_2hOiT_2987b058-95b.jpg', 2, '0.00000000', '+', 0, '+', 1),
(30, 3, 73, '11.60000000', '+', 39567, 1, 'catalog/products/3/opt_33UBr_ba87f2bb-b94.jpg', 3, '0.00000000', '+', 0, '+', 1),
(31, 3, 74, '11.60000000', '+', 39567, 1, 'catalog/products/3/opt_4848J_102607715057.jpg', 4, '0.00000000', '+', 0, '+', 1),
(32, 4, 76, '52.44000000', '+', 36956, 1, 'catalog/products/4/opt_0h787_e0e58e36-ee7.jpg', 0, '0.00000000', '+', 0, '+', 1),
(33, 4, 77, '52.44000000', '+', 36956, 1, 'catalog/products/4/opt_1l7gx_e0e58e36-ee7.jpg', 1, '0.00000000', '+', 0, '+', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ve_product_related`
--

CREATE TABLE `ve_product_related` (
  `product_id` int NOT NULL,
  `related_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_product_report`
--

CREATE TABLE `ve_product_report` (
  `product_report_id` int NOT NULL,
  `product_id` int NOT NULL,
  `store_id` int NOT NULL DEFAULT '0',
  `ip` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_product_reward`
--

CREATE TABLE `ve_product_reward` (
  `product_reward_id` int NOT NULL,
  `product_id` int NOT NULL DEFAULT '0',
  `customer_group_id` int NOT NULL DEFAULT '0',
  `points` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_product_special`
--

CREATE TABLE `ve_product_special` (
  `product_special_id` int NOT NULL,
  `product_id` int NOT NULL,
  `customer_group_id` int NOT NULL,
  `apply` tinyint(1) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `priority` int NOT NULL DEFAULT '1',
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `date_start` date NOT NULL,
  `date_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_product_subscription`
--

CREATE TABLE `ve_product_subscription` (
  `product_id` int NOT NULL,
  `subscription_plan_id` int NOT NULL,
  `customer_group_id` int NOT NULL,
  `trial_price` decimal(10,4) NOT NULL,
  `price` decimal(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_product_to_category`
--

CREATE TABLE `ve_product_to_category` (
  `product_id` int NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_product_to_category`
--

INSERT INTO `ve_product_to_category` (`product_id`, `category_id`) VALUES
(1, 81),
(2, 83),
(4, 83),
(3, 88);

-- --------------------------------------------------------

--
-- Table structure for table `ve_product_to_download`
--

CREATE TABLE `ve_product_to_download` (
  `product_id` int NOT NULL,
  `download_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_product_to_layout`
--

CREATE TABLE `ve_product_to_layout` (
  `product_id` int NOT NULL,
  `store_id` int NOT NULL,
  `layout_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_product_to_layout`
--

INSERT INTO `ve_product_to_layout` (`product_id`, `store_id`, `layout_id`) VALUES
(1, 0, 0),
(2, 0, 0),
(3, 0, 0),
(4, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ve_product_to_store`
--

CREATE TABLE `ve_product_to_store` (
  `product_id` int NOT NULL,
  `store_id` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_product_to_store`
--

INSERT INTO `ve_product_to_store` (`product_id`, `store_id`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ve_product_viewed`
--

CREATE TABLE `ve_product_viewed` (
  `product_id` int NOT NULL,
  `viewed` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_product_viewed`
--

INSERT INTO `ve_product_viewed` (`product_id`, `viewed`, `date`) VALUES
(1, 6, '2024-01-02 11:29:49'),
(2, 6, '2024-01-02 13:13:46'),
(3, 1, '2024-01-02 12:38:24'),
(4, 3, '2024-01-02 13:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `ve_return`
--

CREATE TABLE `ve_return` (
  `return_id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `firstname` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(96) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telephone` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `model` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL,
  `opened` tinyint(1) NOT NULL,
  `return_reason_id` int NOT NULL,
  `return_action_id` int NOT NULL,
  `return_status_id` int NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_ordered` date NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_return_action`
--

CREATE TABLE `ve_return_action` (
  `return_action_id` int NOT NULL,
  `language_id` int NOT NULL DEFAULT '0',
  `name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_return_action`
--

INSERT INTO `ve_return_action` (`return_action_id`, `language_id`, `name`) VALUES
(1, 1, 'Refunded'),
(2, 1, 'Credit Issued'),
(3, 1, 'Replacement Sent');

-- --------------------------------------------------------

--
-- Table structure for table `ve_return_history`
--

CREATE TABLE `ve_return_history` (
  `return_history_id` int NOT NULL,
  `return_id` int NOT NULL,
  `return_status_id` int NOT NULL,
  `notify` tinyint(1) NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_return_reason`
--

CREATE TABLE `ve_return_reason` (
  `return_reason_id` int NOT NULL,
  `language_id` int NOT NULL DEFAULT '0',
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_return_reason`
--

INSERT INTO `ve_return_reason` (`return_reason_id`, `language_id`, `name`) VALUES
(1, 1, 'Dead On Arrival'),
(2, 1, 'Received Wrong Item'),
(3, 1, 'Order Error'),
(4, 1, 'Faulty, please supply details'),
(5, 1, 'Other, please supply details');

-- --------------------------------------------------------

--
-- Table structure for table `ve_return_status`
--

CREATE TABLE `ve_return_status` (
  `return_status_id` int NOT NULL,
  `language_id` int NOT NULL DEFAULT '0',
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_return_status`
--

INSERT INTO `ve_return_status` (`return_status_id`, `language_id`, `name`) VALUES
(1, 1, 'Pending'),
(2, 1, 'Awaiting Products'),
(3, 1, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `ve_review`
--

CREATE TABLE `ve_review` (
  `review_id` int NOT NULL,
  `product_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `author` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rating` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_seo_url`
--

CREATE TABLE `ve_seo_url` (
  `seo_url_id` int NOT NULL,
  `store_id` int NOT NULL,
  `language_id` int NOT NULL,
  `key` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keyword` varchar(768) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sort_order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_seo_url`
--

INSERT INTO `ve_seo_url` (`seo_url_id`, `store_id`, `language_id`, `key`, `value`, `keyword`, `sort_order`) VALUES
(66, 0, 1, 'information_id', '1', 'about-us', 0),
(67, 0, 1, 'information_id', '2', 'terms', 0),
(68, 0, 1, 'information_id', '4', 'delivery', 0),
(69, 0, 1, 'information_id', '3', 'privacy', 0),
(70, 0, 1, 'language', 'en-gb', 'en-gb', -2),
(71, 0, 1, 'route', 'information/information.info', 'info', 0),
(72, 0, 1, 'route', 'information/information', 'information', -1),
(73, 0, 1, 'route', 'product/product', 'product', -1),
(74, 0, 1, 'route', 'product/category', 'catalog', -1),
(75, 0, 1, 'route', 'product/manufacturer', 'brands', -1),
(1016, 0, 1, 'path', '59_60_78', 'Clothing-and-Apparel/Mens-Clothing/Ties', 0),
(1027, 0, 1, 'path', '79', 'Clothing-and-Apparel', 0),
(1031, 0, 1, 'path', '81', 'Shoes', 0),
(1032, 0, 1, 'path', '83', 'Electronics', 0),
(1033, 0, 1, 'path', '82', 'Sports-and-Outdoors', 0),
(1034, 0, 1, 'path', '84', 'Accessories', 0),
(1035, 0, 1, 'path', '85', 'kids-n-toys', 0),
(1036, 0, 1, 'path', '79_86', 'Clothing-and-Apparel/Mens-Clothing', 0),
(1037, 0, 1, 'path', '79_87', 'Clothing-and-Apparel/Womens-Clothing', 0),
(1043, 0, 1, 'path', '88', 'Home-n-Garden', 0),
(1081, 0, 1, 'product_id', '3', 'stainless-steel-garlic-masher-garlic-press', 0),
(1088, 0, 1, 'product_id', '2', '20m-40m-high-bright-cob-led-strip-light-288leds-m-eu-plug-220v', 0),
(1089, 0, 1, 'product_id', '4', 'compatible-with-apple-suitable-for-ipad', 0),
(1091, 0, 1, 'product_id', '1', 'retro-plush-warm-autumn-winter-women-s-boot-vintage-block-heel-ankle-boots', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ve_session`
--

CREATE TABLE `ve_session` (
  `session_id` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `expire` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

 
-- --------------------------------------------------------

--
-- Table structure for table `ve_setting`
--

CREATE TABLE `ve_setting` (
  `setting_id` int NOT NULL,
  `store_id` int NOT NULL DEFAULT '0',
  `code` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `key` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `serialized` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_setting`
--

INSERT INTO `ve_setting` (`setting_id`, `store_id`, `code`, `key`, `value`, `serialized`) VALUES
(130, 0, 'developer', 'developer_sass', '1', 0),
(131, 0, 'currency_ecb', 'currency_ecb_status', '1', 0),
(132, 0, 'payment_free_checkout', 'payment_free_checkout_status', '1', 0),
(133, 0, 'payment_free_checkout', 'payment_free_checkout_order_status_id', '1', 0),
(134, 0, 'payment_free_checkout', 'payment_free_checkout_sort_order', '1', 0),
(135, 0, 'payment_cod', 'payment_cod_sort_order', '5', 0),
(136, 0, 'payment_cod', 'payment_cod_total', '0.01', 0),
(137, 0, 'payment_cod', 'payment_cod_order_status_id', '1', 0),
(138, 0, 'payment_cod', 'payment_cod_geo_zone_id', '0', 0),
(139, 0, 'payment_cod', 'payment_cod_status', '1', 0),
(145, 0, 'total_shipping', 'total_shipping_sort_order', '3', 0),
(146, 0, 'total_sub_total', 'total_sub_total_sort_order', '1', 0),
(147, 0, 'total_sub_total', 'total_sub_total_status', '1', 0),
(148, 0, 'total_tax', 'total_tax_sort_order', '5', 0),
(149, 0, 'total_tax', 'total_tax_status', '1', 0),
(150, 0, 'total_total', 'total_total_sort_order', '9', 0),
(151, 0, 'total_total', 'total_total_status', '1', 0),
(152, 0, 'total_credit', 'total_credit_sort_order', '7', 0),
(153, 0, 'total_credit', 'total_credit_status', '1', 0),
(154, 0, 'total_reward', 'total_reward_sort_order', '2', 0),
(155, 0, 'total_reward', 'total_reward_status', '1', 0),
(156, 0, 'total_shipping', 'total_shipping_status', '1', 0),
(157, 0, 'total_shipping', 'total_shipping_estimator', '1', 0),
(158, 0, 'total_coupon', 'total_coupon_sort_order', '4', 0),
(159, 0, 'total_coupon', 'total_coupon_status', '1', 0),
(160, 0, 'total_voucher', 'total_voucher_sort_order', '8', 0),
(161, 0, 'total_voucher', 'total_voucher_status', '1', 0),
(162, 0, 'module_category', 'module_category_status', '1', 0),
(163, 0, 'module_account', 'module_account_status', '1', 0),
(164, 0, 'module_topic', 'module_topic_status', '1', 0),
(165, 0, 'theme_basic', 'theme_basic_status', '1', 0),
(166, 0, 'dashboard_activity', 'dashboard_activity_status', '1', 0),
(167, 0, 'dashboard_activity', 'dashboard_activity_sort_order', '7', 0),
(168, 0, 'dashboard_sale', 'dashboard_sale_status', '1', 0),
(169, 0, 'dashboard_sale', 'dashboard_sale_width', '3', 0),
(170, 0, 'dashboard_chart', 'dashboard_chart_status', '1', 0),
(171, 0, 'dashboard_chart', 'dashboard_chart_width', '6', 0),
(172, 0, 'dashboard_customer', 'dashboard_customer_status', '1', 0),
(173, 0, 'dashboard_customer', 'dashboard_customer_width', '3', 0),
(174, 0, 'dashboard_map', 'dashboard_map_status', '1', 0),
(175, 0, 'dashboard_map', 'dashboard_map_width', '6', 0),
(176, 0, 'dashboard_online', 'dashboard_online_status', '1', 0),
(177, 0, 'dashboard_online', 'dashboard_online_width', '3', 0),
(178, 0, 'dashboard_order', 'dashboard_order_sort_order', '1', 0),
(179, 0, 'dashboard_order', 'dashboard_order_status', '1', 0),
(180, 0, 'dashboard_order', 'dashboard_order_width', '3', 0),
(181, 0, 'dashboard_sale', 'dashboard_sale_sort_order', '2', 0),
(182, 0, 'dashboard_customer', 'dashboard_customer_sort_order', '3', 0),
(183, 0, 'dashboard_online', 'dashboard_online_sort_order', '4', 0),
(184, 0, 'dashboard_map', 'dashboard_map_sort_order', '5', 0),
(185, 0, 'dashboard_chart', 'dashboard_chart_sort_order', '6', 0),
(186, 0, 'dashboard_recent', 'dashboard_recent_status', '1', 0),
(187, 0, 'dashboard_recent', 'dashboard_recent_sort_order', '8', 0),
(188, 0, 'dashboard_activity', 'dashboard_activity_width', '4', 0),
(189, 0, 'dashboard_recent', 'dashboard_recent_width', '8', 0),
(190, 0, 'report_customer_activity', 'report_customer_activity_status', '1', 0),
(191, 0, 'report_customer_activity', 'report_customer_activity_sort_order', '1', 0),
(192, 0, 'report_customer_order', 'report_customer_order_status', '1', 0),
(193, 0, 'report_customer_order', 'report_customer_order_sort_order', '2', 0),
(194, 0, 'report_customer_reward', 'report_customer_reward_status', '1', 0),
(195, 0, 'report_customer_reward', 'report_customer_reward_sort_order', '3', 0),
(196, 0, 'report_customer_search', 'report_customer_search_status', '1', 0),
(197, 0, 'report_customer_search', 'report_customer_search_sort_order', '4', 0),
(198, 0, 'report_customer_transaction', 'report_customer_transaction_status', '1', 0),
(199, 0, 'report_customer_transaction', 'report_customer_transaction_sort_order', '5', 0),
(200, 0, 'report_customer', 'report_customer_status', '1', 0),
(201, 0, 'report_customer', 'report_customer_sort_order', '6', 0),
(202, 0, 'report_sale_tax', 'report_sale_tax_status', '1', 0),
(203, 0, 'report_sale_tax', 'report_sale_tax_sort_order', '8', 0),
(204, 0, 'report_sale_shipping', 'report_sale_shipping_status', '1', 0),
(205, 0, 'report_sale_shipping', 'report_sale_shipping_sort_order', '9', 0),
(206, 0, 'report_sale_return', 'report_sale_return_status', '1', 0),
(207, 0, 'report_sale_return', 'report_sale_return_sort_order', '10', 0),
(208, 0, 'report_sale_order', 'report_sale_order_status', '1', 0),
(209, 0, 'report_sale_order', 'report_sale_order_sort_order', '11', 0),
(210, 0, 'report_sale_coupon', 'report_sale_coupon_status', '1', 0),
(211, 0, 'report_sale_coupon', 'report_sale_coupon_sort_order', '12', 0),
(212, 0, 'report_product_viewed', 'report_product_viewed_status', '1', 0),
(213, 0, 'report_product_viewed', 'report_product_viewed_sort_order', '13', 0),
(214, 0, 'report_product_purchased', 'report_product_purchased_status', '1', 0),
(215, 0, 'report_product_purchased', 'report_product_purchased_sort_order', '14', 0),
(216, 0, 'report_marketing', 'report_marketing_status', '1', 0),
(217, 0, 'report_marketing', 'report_marketing_sort_order', '15', 0),
(218, 0, 'report_customer_subscription', 'report_customer_subscription_status', '1', 0),
(219, 0, 'report_customer_subscription', 'report_customer_subscription_sort_order', '16', 0),
(221, 0, 'module_filter', 'module_filter_status', '1', 0),
(498, 0, 'payment_bank_transfer', 'payment_bank_transfer_bank_1', 'AAsAS', 0),
(499, 0, 'payment_bank_transfer', 'payment_bank_transfer_order_status_id', '5', 0),
(500, 0, 'payment_bank_transfer', 'payment_bank_transfer_geo_zone_id', '0', 0),
(501, 0, 'payment_bank_transfer', 'payment_bank_transfer_status', '1', 0),
(502, 0, 'payment_bank_transfer', 'payment_bank_transfer_sort_order', '', 0),
(503, 0, 'shipping_flat', 'shipping_flat_cost', '5.00', 0),
(504, 0, 'shipping_flat', 'shipping_flat_tax_class_id', '9', 0),
(505, 0, 'shipping_flat', 'shipping_flat_geo_zone_id', '0', 0),
(506, 0, 'shipping_flat', 'shipping_flat_status', '1', 0),
(507, 0, 'shipping_flat', 'shipping_flat_sort_order', '1', 0),
(508, 0, 'shipping_free', 'shipping_free_total', '', 0),
(509, 0, 'shipping_free', 'shipping_free_geo_zone_id', '0', 0),
(510, 0, 'shipping_free', 'shipping_free_status', '1', 0),
(511, 0, 'shipping_free', 'shipping_free_sort_order', '', 0),
(512, 0, 'module_store', 'module_store_admin', '0', 0),
(513, 0, 'module_store', 'module_store_status', '1', 0),
(662, 0, 'payment_stripe', 'payment_stripe_environment', 'test', 0),
(665, 0, 'payment_stripe', 'payment_stripe_live_public_key', '', 0),
(666, 0, 'payment_stripe', 'payment_stripe_live_secret_key', '', 0),
(667, 0, 'payment_stripe', 'payment_stripe_order_success_status_id', '7', 0),
(668, 0, 'payment_stripe', 'payment_stripe_order_failed_status_id', '7', 0),
(669, 0, 'payment_stripe', 'payment_stripe_status', '1', 0),
(670, 0, 'payment_stripe', 'payment_stripe_debug', '0', 0),
(671, 0, 'payment_stripe', 'payment_stripe_sort_order', '0', 0),
(915, 0, 'config', 'config_meta_title', 'Your Store', 0),
(916, 0, 'config', 'config_meta_description', 'My Store', 0),
(917, 0, 'config', 'config_meta_keyword', '', 0),
(918, 0, 'config', 'config_logo', 'catalog/text3158.png', 0),
(919, 0, 'config', 'config_theme', 'basic', 0),
(920, 0, 'config', 'config_layout_id', '4', 0),
(921, 0, 'config', 'config_name', 'Your Store', 0),
(922, 0, 'config', 'config_owner', 'Your Name', 0),
(923, 0, 'config', 'config_address', 'Address 1', 0),
(924, 0, 'config', 'config_geocode', '', 0),
(925, 0, 'config', 'config_email', 'mystore@mydomain.net', 0),
(926, 0, 'config', 'config_telephone', '123456789', 0),
(927, 0, 'config', 'config_image', '', 0),
(928, 0, 'config', 'config_open', '', 0),
(929, 0, 'config', 'config_comment', '', 0),
(930, 0, 'config', 'config_country_id', '222', 0),
(931, 0, 'config', 'config_zone_id', '3563', 0),
(932, 0, 'config', 'config_timezone', 'UTC', 0),
(933, 0, 'config', 'config_language', 'en-gb', 0),
(934, 0, 'config', 'config_language_admin', 'en-gb', 0),
(935, 0, 'config', 'config_currency', 'USD', 0),
(936, 0, 'config', 'config_currency_engine', 'ecb', 0),
(937, 0, 'config', 'config_currency_auto', '1', 0),
(938, 0, 'config', 'config_length_class_id', '1', 0),
(939, 0, 'config', 'config_weight_class_id', '1', 0),
(940, 0, 'config', 'config_product_description_length', '100', 0),
(941, 0, 'config', 'config_pagination', '10', 0),
(942, 0, 'config', 'config_product_count', '1', 0),
(943, 0, 'config', 'config_pagination_admin', '10', 0),
(944, 0, 'config', 'config_product_report_status', '0', 0),
(945, 0, 'config', 'config_review_status', '1', 0),
(946, 0, 'config', 'config_review_purchased', '0', 0),
(947, 0, 'config', 'config_review_guest', '1', 0),
(948, 0, 'config', 'config_article_description_length', '100', 0),
(949, 0, 'config', 'config_comment_status', '0', 0),
(950, 0, 'config', 'config_comment_guest', '0', 0),
(951, 0, 'config', 'config_comment_approve', '0', 0),
(952, 0, 'config', 'config_voucher_min', '1', 0),
(953, 0, 'config', 'config_voucher_max', '1000', 0),
(954, 0, 'config', 'config_cookie_id', '0', 0),
(955, 0, 'config', 'config_gdpr_id', '0', 0),
(956, 0, 'config', 'config_gdpr_limit', '180', 0),
(957, 0, 'config', 'config_tax', '1', 0),
(958, 0, 'config', 'config_tax_default', 'shipping', 0),
(959, 0, 'config', 'config_tax_customer', 'shipping', 0),
(960, 0, 'config', 'config_customer_online', '0', 0),
(961, 0, 'config', 'config_customer_online_expire', '1', 0),
(962, 0, 'config', 'config_customer_activity', '0', 0),
(963, 0, 'config', 'config_customer_search', '0', 0),
(964, 0, 'config', 'config_customer_group_id', '1', 0),
(965, 0, 'config', 'config_customer_group_display', '[\"1\"]', 1),
(966, 0, 'config', 'config_customer_price', '0', 0),
(967, 0, 'config', 'config_telephone_display', '0', 0),
(968, 0, 'config', 'config_telephone_required', '0', 0),
(969, 0, 'config', 'config_customer_2fa', '0', 0),
(970, 0, 'config', 'config_login_attempts', '5', 0),
(971, 0, 'config', 'config_account_id', '3', 0),
(972, 0, 'config', 'config_invoice_prefix', 'INV-2023-00', 0),
(973, 0, 'config', 'config_cart_weight', '1', 0),
(974, 0, 'config', 'config_checkout_guest', '1', 0),
(975, 0, 'config', 'config_show_company_field', '0', 0),
(976, 0, 'config', 'config_checkout_id', '0', 0),
(977, 0, 'config', 'config_order_status_id', '1', 0),
(978, 0, 'config', 'config_processing_status', '[\"2\"]', 1),
(979, 0, 'config', 'config_complete_status', '[\"5\"]', 1),
(980, 0, 'config', 'config_fraud_status_id', '8', 0),
(981, 0, 'config', 'config_api_id', '1', 0),
(982, 0, 'config', 'config_subscription_status_id', '1', 0),
(983, 0, 'config', 'config_subscription_active_status_id', '2', 0),
(984, 0, 'config', 'config_subscription_expired_status_id', '3', 0),
(985, 0, 'config', 'config_subscription_suspended_status_id', '4', 0),
(986, 0, 'config', 'config_subscription_canceled_status_id', '5', 0),
(987, 0, 'config', 'config_subscription_failed_status_id', '6', 0),
(988, 0, 'config', 'config_subscription_denied_status_id', '7', 0),
(989, 0, 'config', 'config_stock_display', '0', 0),
(990, 0, 'config', 'config_stock_warning', '0', 0),
(991, 0, 'config', 'config_stock_checkout', '0', 0),
(992, 0, 'config', 'config_affiliate_status', '1', 0),
(993, 0, 'config', 'config_affiliate_group_id', '1', 0),
(994, 0, 'config', 'config_affiliate_approval', '0', 0),
(995, 0, 'config', 'config_affiliate_auto', '0', 0),
(996, 0, 'config', 'config_affiliate_commission', '5', 0),
(997, 0, 'config', 'config_affiliate_expire', '', 0),
(998, 0, 'config', 'config_affiliate_id', '4', 0),
(999, 0, 'config', 'config_return_status_id', '2', 0),
(1000, 0, 'config', 'config_return_id', '0', 0),
(1001, 0, 'config', 'config_captcha', '', 0),
(1002, 0, 'config', 'config_captcha_page', '[\"review\",\"contact\"]', 1),
(1003, 0, 'config', 'config_image_default_width', '300', 0),
(1004, 0, 'config', 'config_image_default_height', '300', 0),
(1005, 0, 'config', 'config_image_category_width', '300', 0),
(1006, 0, 'config', 'config_image_category_height', '300', 0),
(1007, 0, 'config', 'config_image_thumb_width', '500', 0),
(1008, 0, 'config', 'config_image_thumb_height', '500', 0),
(1009, 0, 'config', 'config_image_popup_width', '800', 0),
(1010, 0, 'config', 'config_image_popup_height', '800', 0),
(1011, 0, 'config', 'config_image_product_width', '250', 0),
(1012, 0, 'config', 'config_image_product_height', '250', 0),
(1013, 0, 'config', 'config_image_additional_width', '74', 0),
(1014, 0, 'config', 'config_image_additional_height', '74', 0),
(1015, 0, 'config', 'config_image_related_width', '250', 0),
(1016, 0, 'config', 'config_image_related_height', '250', 0),
(1017, 0, 'config', 'config_image_article_width', '1140', 0),
(1018, 0, 'config', 'config_image_article_height', '380', 0),
(1019, 0, 'config', 'config_image_topic_width', '1140', 0),
(1020, 0, 'config', 'config_image_topic_height', '380', 0),
(1021, 0, 'config', 'config_image_compare_width', '90', 0),
(1022, 0, 'config', 'config_image_compare_height', '90', 0),
(1023, 0, 'config', 'config_image_wishlist_width', '47', 0),
(1024, 0, 'config', 'config_image_wishlist_height', '47', 0),
(1025, 0, 'config', 'config_image_cart_width', '47', 0),
(1026, 0, 'config', 'config_image_cart_height', '47', 0),
(1027, 0, 'config', 'config_image_location_width', '268', 0),
(1028, 0, 'config', 'config_image_location_height', '50', 0),
(1029, 0, 'config', 'config_mail_engine', '', 0),
(1030, 0, 'config', 'config_mail_parameter', '', 0),
(1031, 0, 'config', 'config_mail_smtp_hostname', '', 0),
(1032, 0, 'config', 'config_mail_smtp_username', '', 0),
(1033, 0, 'config', 'config_mail_smtp_password', '', 0),
(1034, 0, 'config', 'config_mail_smtp_port', '25', 0),
(1035, 0, 'config', 'config_mail_smtp_timeout', '5', 0),
(1036, 0, 'config', 'config_mail_alert', '[\"order\"]', 1),
(1037, 0, 'config', 'config_mail_alert_email', '', 0),
(1038, 0, 'config', 'config_maintenance', '0', 0),
(1039, 0, 'config', 'config_session_expire', '86400', 0),
(1040, 0, 'config', 'config_session_samesite', 'Strict', 0),
(1041, 0, 'config', 'config_seo_url', '0', 0),
(1042, 0, 'config', 'config_robots', 'abot\r\ndbot\r\nebot\r\nhbot\r\nkbot\r\nlbot\r\nmbot\r\nnbot\r\nobot\r\npbot\r\nrbot\r\nsbot\r\ntbot\r\nvbot\r\nybot\r\nzbot\r\nbot.\r\nbot/\r\n_bot\r\n.bot\r\n/bot\r\n-bot\r\n:bot\r\n(bot\r\ncrawl\r\nslurp\r\nspider\r\nseek\r\naccoona\r\nacoon\r\nadressendeutschland\r\nah-ha.com\r\nahoy\r\naltavista\r\nananzi\r\nanthill\r\nappie\r\narachnophilia\r\narale\r\naraneo\r\naranha\r\narchitext\r\naretha\r\narks\r\nasterias\r\natlocal\r\natn\r\natomz\r\naugurfind\r\nbackrub\r\nbannana_bot\r\nbaypup\r\nbdfetch\r\nbig brother\r\nbiglotron\r\nbjaaland\r\nblackwidow\r\nblaiz\r\nblog\r\nblo.\r\nbloodhound\r\nboitho\r\nbooch\r\nbradley\r\nbutterfly\r\ncalif\r\ncassandra\r\nccubee\r\ncfetch\r\ncharlotte\r\nchurl\r\ncienciaficcion\r\ncmc\r\ncollective\r\ncomagent\r\ncombine\r\ncomputingsite\r\ncsci\r\ncurl\r\ncusco\r\ndaumoa\r\ndeepindex\r\ndelorie\r\ndepspid\r\ndeweb\r\ndie blinde kuh\r\ndigger\r\nditto\r\ndmoz\r\ndocomo\r\ndownload express\r\ndtaagent\r\ndwcp\r\nebiness\r\nebingbong\r\ne-collector\r\nejupiter\r\nemacs-w3 search engine\r\nesther\r\nevliya celebi\r\nezresult\r\nfalcon\r\nfelix ide\r\nferret\r\nfetchrover\r\nfido\r\nfindlinks\r\nfireball\r\nfish search\r\nfouineur\r\nfunnelweb\r\ngazz\r\ngcreep\r\ngenieknows\r\ngetterroboplus\r\ngeturl\r\nglx\r\ngoforit\r\ngolem\r\ngrabber\r\ngrapnel\r\ngralon\r\ngriffon\r\ngromit\r\ngrub\r\ngulliver\r\nhamahakki\r\nharvest\r\nhavindex\r\nhelix\r\nheritrix\r\nhku www octopus\r\nhomerweb\r\nhtdig\r\nhtml index\r\nhtml_analyzer\r\nhtmlgobble\r\nhubater\r\nhyper-decontextualizer\r\nia_archiver\r\nibm_planetwide\r\nichiro\r\niconsurf\r\niltrovatore\r\nimage.kapsi.net\r\nimagelock\r\nincywincy\r\nindexer\r\ninfobee\r\ninformant\r\ningrid\r\ninktomisearch.com\r\ninspector web\r\nintelliagent\r\ninternet shinchakubin\r\nip3000\r\niron33\r\nisraeli-search\r\nivia\r\njack\r\njakarta\r\njavabee\r\njetbot\r\njumpstation\r\nkatipo\r\nkdd-explorer\r\nkilroy\r\nknowledge\r\nkototoi\r\nkretrieve\r\nlabelgrabber\r\nlachesis\r\nlarbin\r\nlegs\r\nlibwww\r\nlinkalarm\r\nlink validator\r\nlinkscan\r\nlockon\r\nlwp\r\nlycos\r\nmagpie\r\nmantraagent\r\nmapoftheinternet\r\nmarvin/\r\nmattie\r\nmediafox\r\nmediapartners\r\nmercator\r\nmerzscope\r\nmicrosoft url control\r\nminirank\r\nmiva\r\nmj12\r\nmnogosearch\r\nmoget\r\nmonster\r\nmoose\r\nmotor\r\nmultitext\r\nmuncher\r\nmuscatferret\r\nmwd.search\r\nmyweb\r\nnajdi\r\nnameprotect\r\nnationaldirectory\r\nnazilla\r\nncsa beta\r\nnec-meshexplorer\r\nnederland.zoek\r\nnetcarta webmap engine\r\nnetmechanic\r\nnetresearchserver\r\nnetscoop\r\nnewscan-online\r\nnhse\r\nnokia6682/\r\nnomad\r\nnoyona\r\nnutch\r\nnzexplorer\r\nobjectssearch\r\noccam\r\nomni\r\nopen text\r\nopenfind\r\nopenintelligencedata\r\norb search\r\nosis-project\r\npack rat\r\npageboy\r\npagebull\r\npage_verifier\r\npanscient\r\nparasite\r\npartnersite\r\npatric\r\npear.\r\npegasus\r\nperegrinator\r\npgp key agent\r\nphantom\r\nphpdig\r\npicosearch\r\npiltdownman\r\npimptrain\r\npinpoint\r\npioneer\r\npiranha\r\nplumtreewebaccessor\r\npogodak\r\npoirot\r\npompos\r\npoppelsdorf\r\npoppi\r\npopular iconoclast\r\npsycheclone\r\npublisher\r\npython\r\nrambler\r\nraven search\r\nroach\r\nroad runner\r\nroadhouse\r\nrobbie\r\nrobofox\r\nrobozilla\r\nrules\r\nsalty\r\nsbider\r\nscooter\r\nscoutjet\r\nscrubby\r\nsearch.\r\nsearchprocess\r\nsemanticdiscovery\r\nsenrigan\r\nsg-scout\r\nshai\'hulud\r\nshark\r\nshopwiki\r\nsidewinder\r\nsift\r\nsilk\r\nsimmany\r\nsite searcher\r\nsite valet\r\nsitetech-rover\r\nskymob.com\r\nsleek\r\nsmartwit\r\nsna-\r\nsnappy\r\nsnooper\r\nsohu\r\nspeedfind\r\nsphere\r\nsphider\r\nspinner\r\nspyder\r\nsteeler/\r\nsuke\r\nsuntek\r\nsupersnooper\r\nsurfnomore\r\nsven\r\nsygol\r\nszukacz\r\ntach black widow\r\ntarantula\r\ntempleton\r\n/teoma\r\nt-h-u-n-d-e-r-s-t-o-n-e\r\ntheophrastus\r\ntitan\r\ntitin\r\ntkwww\r\ntoutatis\r\nt-rex\r\ntutorgig\r\ntwiceler\r\ntwisted\r\nucsd\r\nudmsearch\r\nurl check\r\nupdated\r\nvagabondo\r\nvalkyrie\r\nverticrawl\r\nvictoria\r\nvision-search\r\nvolcano\r\nvoyager/\r\nvoyager-hc\r\nw3c_validator\r\nw3m2\r\nw3mir\r\nwalker\r\nwallpaper\r\nwanderer\r\nwauuu\r\nwavefire\r\nweb core\r\nweb hopper\r\nweb wombat\r\nwebbandit\r\nwebcatcher\r\nwebcopy\r\nwebfoot\r\nweblayers\r\nweblinker\r\nweblog monitor\r\nwebmirror\r\nwebmonkey\r\nwebquest\r\nwebreaper\r\nwebsitepulse\r\nwebsnarf\r\nwebstolperer\r\nwebvac\r\nwebwalk\r\nwebwatch\r\nwebwombat\r\nwebzinger\r\nwhizbang\r\nwhowhere\r\nwild ferret\r\nworldlight\r\nwwwc\r\nwwwster\r\nxenu\r\nxget\r\nxift\r\nxirq\r\nyandex\r\nyanga\r\nyeti\r\nyodao\r\nzao\r\nzippp\r\nzyborg', 0),
(1043, 0, 'config', 'config_compression', '0', 0),
(1044, 0, 'config', 'config_user_2fa', '0', 0),
(1045, 0, 'config', 'config_shared', '0', 0),
(1046, 0, 'config', 'config_file_max_size', '20', 0),
(1047, 0, 'config', 'config_file_ext_allowed', 'zip\r\ntxt\r\npng\r\njpe\r\njpeg\r\nwebp\r\njpg\r\ngif\r\nbmp\r\nico\r\ntiff\r\ntif\r\nsvg\r\nsvgz\r\nzip\r\nrar\r\nmsi\r\ncab\r\nmp3\r\nmp4\r\nqt\r\nmov\r\npdf\r\npsd\r\nai\r\neps\r\nps\r\ndoc', 0),
(1048, 0, 'config', 'config_file_mime_allowed', 'text/plain\r\nimage/png\r\nimage/webp\r\nimage/jpeg\r\nimage/gif\r\nimage/bmp\r\nimage/tiff\r\nimage/svg+xml\r\napplication/zip\r\napplication/x-zip\r\napplication/x-zip-compressed\r\napplication/rar\r\napplication/x-rar\r\napplication/x-rar-compressed\r\napplication/octet-stream\r\naudio/mpeg\r\nvideo/mp4\r\nvideo/quicktime\r\napplication/pdf', 0),
(1049, 0, 'config', 'config_error_display', '1', 0),
(1050, 0, 'config', 'config_error_log', '1', 0),
(1051, 0, 'config', 'config_error_filename', 'error.log', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ve_startup`
--

CREATE TABLE `ve_startup` (
  `startup_id` int NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `action` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `sort_order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_statistics`
--

CREATE TABLE `ve_statistics` (
  `statistics_id` int NOT NULL,
  `code` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `value` decimal(15,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_statistics`
--

INSERT INTO `ve_statistics` (`statistics_id`, `code`, `value`) VALUES
(1, 'order_sale', '45155.4000'),
(2, 'order_processing', '63.0000'),
(3, 'order_complete', '50.0000'),
(4, 'order_other', '0.0000'),
(5, 'returns', '1.0000'),
(6, 'product', '0.0000'),
(7, 'review', '0.0000');

-- --------------------------------------------------------

--
-- Table structure for table `ve_stock_status`
--

CREATE TABLE `ve_stock_status` (
  `stock_status_id` int NOT NULL,
  `language_id` int NOT NULL,
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_stock_status`
--

INSERT INTO `ve_stock_status` (`stock_status_id`, `language_id`, `name`) VALUES
(5, 1, 'Out Of Stock'),
(6, 1, '2-3 Days'),
(7, 1, 'In Stock'),
(8, 1, 'Pre-Order');

-- --------------------------------------------------------

--
-- Table structure for table `ve_store`
--

CREATE TABLE `ve_store` (
  `store_id` int NOT NULL,
  `name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_store`
--

INSERT INTO `ve_store` (`store_id`, `name`, `url`) VALUES
(0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ve_subscription`
--

CREATE TABLE `ve_subscription` (
  `subscription_id` int NOT NULL,
  `order_id` int NOT NULL,
  `order_product_id` int NOT NULL,
  `store_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `payment_address_id` int NOT NULL,
  `payment_method` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_address_id` int NOT NULL,
  `shipping_method` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_id` int NOT NULL,
  `option` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL,
  `subscription_plan_id` int NOT NULL,
  `trial_price` decimal(10,4) NOT NULL,
  `trial_frequency` enum('day','week','semi_month','month','year') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `trial_cycle` smallint NOT NULL,
  `trial_duration` smallint NOT NULL,
  `trial_remaining` smallint NOT NULL,
  `trial_status` tinyint(1) NOT NULL,
  `price` decimal(10,4) NOT NULL,
  `frequency` enum('day','week','semi_month','month','year') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cycle` smallint NOT NULL,
  `duration` smallint NOT NULL,
  `remaining` smallint NOT NULL,
  `date_next` datetime NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subscription_status_id` int NOT NULL,
  `affiliate_id` int NOT NULL,
  `marketing_id` int NOT NULL,
  `tracking` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `language_id` int NOT NULL,
  `currency_id` int NOT NULL,
  `ip` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `forwarded_ip` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `accept_language` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_subscription_history`
--

CREATE TABLE `ve_subscription_history` (
  `subscription_history_id` int NOT NULL,
  `subscription_id` int NOT NULL,
  `subscription_status_id` int NOT NULL,
  `notify` tinyint(1) NOT NULL DEFAULT '0',
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_subscription_plan`
--

CREATE TABLE `ve_subscription_plan` (
  `subscription_plan_id` int NOT NULL,
  `trial_frequency` enum('day','week','semi_month','month','year') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `trial_duration` int NOT NULL,
  `trial_cycle` int NOT NULL,
  `trial_status` tinyint NOT NULL,
  `frequency` enum('day','week','semi_month','month','year') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `duration` int NOT NULL,
  `cycle` int NOT NULL,
  `status` tinyint(1) NOT NULL,
  `sort_order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_subscription_plan`
--

INSERT INTO `ve_subscription_plan` (`subscription_plan_id`, `trial_frequency`, `trial_duration`, `trial_cycle`, `trial_status`, `frequency`, `duration`, `cycle`, `status`, `sort_order`) VALUES
(1, 'day', 10, 1, 1, 'day', 0, 1, 1, 0),
(2, 'week', 11, 2, 1, 'month', 10, 1, 1, 0),
(3, 'day', 0, 1, 0, 'day', 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ve_subscription_plan_description`
--

CREATE TABLE `ve_subscription_plan_description` (
  `subscription_plan_id` int NOT NULL,
  `language_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_subscription_plan_description`
--

INSERT INTO `ve_subscription_plan_description` (`subscription_plan_id`, `language_id`, `name`) VALUES
(1, 1, 'Subscription Plan 1'),
(2, 1, 'Subscription Plan 2'),
(3, 1, 'Subscription Plan 3');

-- --------------------------------------------------------

--
-- Table structure for table `ve_subscription_status`
--

CREATE TABLE `ve_subscription_status` (
  `subscription_status_id` int NOT NULL,
  `language_id` int NOT NULL,
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_subscription_status`
--

INSERT INTO `ve_subscription_status` (`subscription_status_id`, `language_id`, `name`) VALUES
(1, 1, 'Pending'),
(2, 1, 'Active'),
(3, 1, 'Expired'),
(4, 1, 'Suspended'),
(5, 1, 'Cancelled'),
(6, 1, 'Failed'),
(7, 1, 'Denied');

-- --------------------------------------------------------

--
-- Table structure for table `ve_tax_class`
--

CREATE TABLE `ve_tax_class` (
  `tax_class_id` int NOT NULL,
  `title` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_tax_class`
--

INSERT INTO `ve_tax_class` (`tax_class_id`, `title`, `description`) VALUES
(9, 'Taxable Goods', 'Taxed goods'),
(10, 'Downloadable Products', 'Downloadable');

-- --------------------------------------------------------

--
-- Table structure for table `ve_tax_rate`
--

CREATE TABLE `ve_tax_rate` (
  `tax_rate_id` int NOT NULL,
  `geo_zone_id` int NOT NULL DEFAULT '0',
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rate` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `type` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_tax_rate`
--

INSERT INTO `ve_tax_rate` (`tax_rate_id`, `geo_zone_id`, `name`, `rate`, `type`) VALUES
(86, 3, 'VAT (20%)', '20.0000', 'P'),
(87, 3, 'Eco Tax (-2.00)', '2.0000', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `ve_tax_rate_to_customer_group`
--

CREATE TABLE `ve_tax_rate_to_customer_group` (
  `tax_rate_id` int NOT NULL,
  `customer_group_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_tax_rate_to_customer_group`
--

INSERT INTO `ve_tax_rate_to_customer_group` (`tax_rate_id`, `customer_group_id`) VALUES
(86, 1),
(87, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ve_tax_rule`
--

CREATE TABLE `ve_tax_rule` (
  `tax_rule_id` int NOT NULL,
  `tax_class_id` int NOT NULL,
  `tax_rate_id` int NOT NULL,
  `based` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `priority` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_tax_rule`
--

INSERT INTO `ve_tax_rule` (`tax_rule_id`, `tax_class_id`, `tax_rate_id`, `based`, `priority`) VALUES
(120, 10, 87, 'store', 0),
(121, 10, 86, 'payment', 1),
(130, 9, 86, 'shipping', 1),
(131, 9, 87, 'shipping', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ve_theme`
--

CREATE TABLE `ve_theme` (
  `theme_id` int NOT NULL,
  `store_id` int NOT NULL,
  `route` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_topic`
--

CREATE TABLE `ve_topic` (
  `topic_id` int NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_topic_description`
--

CREATE TABLE `ve_topic_description` (
  `topic_id` int NOT NULL,
  `language_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meta_keyword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_topic_to_store`
--

CREATE TABLE `ve_topic_to_store` (
  `topic_id` int NOT NULL,
  `store_id` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_translation`
--

CREATE TABLE `ve_translation` (
  `translation_id` int NOT NULL,
  `store_id` int NOT NULL,
  `language_id` int NOT NULL,
  `route` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `key` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_upload`
--

CREATE TABLE `ve_upload` (
  `upload_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `filename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_user`
--

CREATE TABLE `ve_user` (
  `user_id` int NOT NULL,
  `user_group_id` int NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `firstname` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(96) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `code` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `ip` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

 
-- --------------------------------------------------------

--
-- Table structure for table `ve_user_authorize`
--

CREATE TABLE `ve_user_authorize` (
  `user_authorize_id` int NOT NULL,
  `user_id` int NOT NULL,
  `token` varchar(96) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total` int NOT NULL,
  `ip` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_user_group`
--

CREATE TABLE `ve_user_group` (
  `user_group_id` int NOT NULL,
  `name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `permission` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_user_group`
--

INSERT INTO `ve_user_group` (`user_group_id`, `name`, `permission`) VALUES
(1, 'Administrator', '{\"access\":[\"catalog\\/attribute\",\"catalog\\/category\",\"catalog\\/download\",\"catalog\\/filter\",\"catalog\\/information\",\"catalog\\/manufacturer\",\"catalog\\/option\",\"catalog\\/product\",\"catalog\\/review\",\"catalog\\/subscription_plan\",\"catalog\\/variations\",\"cms\\/antispam\",\"cms\\/article\",\"cms\\/comment\",\"cms\\/topic\",\"common\\/developer\",\"common\\/filemanager\",\"common\\/security\",\"customer\\/address\",\"customer\\/custom_field\",\"customer\\/customer\",\"customer\\/customer_approval\",\"customer\\/customer_group\",\"customer\\/gdpr\",\"design\\/banner\",\"design\\/layout\",\"design\\/seo_url\",\"design\\/theme\",\"design\\/translation\",\"error\\/exception\",\"event\\/modification\",\"extension\\/analytics\",\"extension\\/captcha\",\"extension\\/currency\",\"extension\\/dashboard\",\"extension\\/feed\",\"extension\\/fraud\",\"extension\\/language\",\"extension\\/marketplace\",\"extension\\/module\",\"extension\\/other\",\"extension\\/payment\",\"extension\\/report\",\"extension\\/shipping\",\"extension\\/theme\",\"extension\\/total\",\"localisation\\/address_format\",\"localisation\\/country\",\"localisation\\/currency\",\"localisation\\/geo_zone\",\"localisation\\/language\",\"localisation\\/length_class\",\"localisation\\/location\",\"localisation\\/order_status\",\"localisation\\/return_action\",\"localisation\\/return_reason\",\"localisation\\/return_status\",\"localisation\\/stock_status\",\"localisation\\/subscription_status\",\"localisation\\/tax_class\",\"localisation\\/tax_rate\",\"localisation\\/weight_class\",\"localisation\\/zone\",\"mail\\/affiliate\",\"mail\\/authorize\",\"mail\\/customer\",\"mail\\/forgotten\",\"mail\\/gdpr\",\"mail\\/returns\",\"mail\\/reward\",\"mail\\/subscription\",\"mail\\/transaction\",\"mail\\/voucher\",\"marketing\\/affiliate\",\"marketing\\/contact\",\"marketing\\/coupon\",\"marketing\\/marketing\",\"marketplace\\/api\",\"marketplace\\/cron\",\"marketplace\\/event\",\"marketplace\\/extension\",\"marketplace\\/installer\",\"marketplace\\/marketplace\",\"marketplace\\/modification\",\"marketplace\\/promotion\",\"marketplace\\/startup\",\"report\\/online\",\"report\\/report\",\"report\\/statistics\",\"sale\\/order\",\"sale\\/returns\",\"sale\\/subscription\",\"sale\\/voucher\",\"sale\\/voucher_theme\",\"setting\\/setting\",\"setting\\/store\",\"tool\\/backup\",\"tool\\/log\",\"tool\\/notification\",\"tool\\/upgrade\",\"tool\\/upload\",\"user\\/api\",\"user\\/profile\",\"user\\/user\",\"user\\/user_permission\",\"extension\\/opencart\\/captcha\\/basic\",\"extension\\/opencart\\/currency\\/ecb\",\"extension\\/opencart\\/currency\\/fixer\",\"extension\\/opencart\\/dashboard\\/activity\",\"extension\\/opencart\\/dashboard\\/chart\",\"extension\\/opencart\\/dashboard\\/customer\",\"extension\\/opencart\\/dashboard\\/map\",\"extension\\/opencart\\/dashboard\\/online\",\"extension\\/opencart\\/dashboard\\/order\",\"extension\\/opencart\\/dashboard\\/recent\",\"extension\\/opencart\\/dashboard\\/sale\",\"extension\\/opencart\\/fraud\\/ip\",\"extension\\/opencart\\/module\\/account\",\"extension\\/opencart\\/module\\/banner\",\"extension\\/opencart\\/module\\/bestseller\",\"extension\\/opencart\\/module\\/category\",\"extension\\/opencart\\/module\\/featured\",\"extension\\/opencart\\/module\\/filter\",\"extension\\/opencart\\/module\\/html\",\"extension\\/opencart\\/module\\/information\",\"extension\\/opencart\\/module\\/latest\",\"extension\\/opencart\\/module\\/mostviewed\",\"extension\\/opencart\\/module\\/special\",\"extension\\/opencart\\/module\\/store\",\"extension\\/opencart\\/module\\/topic\",\"extension\\/opencart\\/payment\\/bank_transfer\",\"extension\\/opencart\\/payment\\/cheque\",\"extension\\/opencart\\/payment\\/cod\",\"extension\\/opencart\\/payment\\/free_checkout\",\"extension\\/opencart\\/report\\/customer\",\"extension\\/opencart\\/report\\/customer_activity\",\"extension\\/opencart\\/report\\/customer_order\",\"extension\\/opencart\\/report\\/customer_reward\",\"extension\\/opencart\\/report\\/customer_search\",\"extension\\/opencart\\/report\\/customer_transaction\",\"extension\\/opencart\\/report\\/marketing\",\"extension\\/opencart\\/report\\/product_purchased\",\"extension\\/opencart\\/report\\/product_viewed\",\"extension\\/opencart\\/report\\/sale_coupon\",\"extension\\/opencart\\/report\\/sale_order\",\"extension\\/opencart\\/report\\/sale_return\",\"extension\\/opencart\\/report\\/sale_shipping\",\"extension\\/opencart\\/report\\/sale_tax\",\"extension\\/opencart\\/shipping\\/flat\",\"extension\\/opencart\\/shipping\\/free\",\"extension\\/opencart\\/shipping\\/item\",\"extension\\/opencart\\/shipping\\/pickup\",\"extension\\/opencart\\/shipping\\/weight\",\"extension\\/opencart\\/theme\\/basic\",\"extension\\/opencart\\/total\\/coupon\",\"extension\\/opencart\\/total\\/credit\",\"extension\\/opencart\\/total\\/handling\",\"extension\\/opencart\\/total\\/low_order_fee\",\"extension\\/opencart\\/total\\/reward\",\"extension\\/opencart\\/total\\/shipping\",\"extension\\/opencart\\/total\\/sub_total\",\"extension\\/opencart\\/total\\/tax\",\"extension\\/opencart\\/total\\/total\",\"extension\\/opencart\\/total\\/voucher\",\"extension\\/paypal\\/payment\\/paypal\",\"extension\\/stripe\\/payment\\/stripe\"],\"modify\":[\"catalog\\/attribute\",\"catalog\\/category\",\"catalog\\/download\",\"catalog\\/filter\",\"catalog\\/information\",\"catalog\\/manufacturer\",\"catalog\\/option\",\"catalog\\/product\",\"catalog\\/review\",\"catalog\\/subscription_plan\",\"catalog\\/variations\",\"cms\\/antispam\",\"cms\\/article\",\"cms\\/comment\",\"cms\\/topic\",\"common\\/developer\",\"common\\/filemanager\",\"common\\/security\",\"customer\\/address\",\"customer\\/custom_field\",\"customer\\/customer\",\"customer\\/customer_approval\",\"customer\\/customer_group\",\"customer\\/gdpr\",\"design\\/banner\",\"design\\/layout\",\"design\\/seo_url\",\"design\\/theme\",\"design\\/translation\",\"error\\/exception\",\"event\\/modification\",\"extension\\/analytics\",\"extension\\/captcha\",\"extension\\/currency\",\"extension\\/dashboard\",\"extension\\/feed\",\"extension\\/fraud\",\"extension\\/language\",\"extension\\/marketplace\",\"extension\\/module\",\"extension\\/other\",\"extension\\/payment\",\"extension\\/report\",\"extension\\/shipping\",\"extension\\/theme\",\"extension\\/total\",\"localisation\\/address_format\",\"localisation\\/country\",\"localisation\\/currency\",\"localisation\\/geo_zone\",\"localisation\\/language\",\"localisation\\/length_class\",\"localisation\\/location\",\"localisation\\/order_status\",\"localisation\\/return_action\",\"localisation\\/return_reason\",\"localisation\\/return_status\",\"localisation\\/stock_status\",\"localisation\\/subscription_status\",\"localisation\\/tax_class\",\"localisation\\/tax_rate\",\"localisation\\/weight_class\",\"localisation\\/zone\",\"mail\\/affiliate\",\"mail\\/authorize\",\"mail\\/customer\",\"mail\\/forgotten\",\"mail\\/gdpr\",\"mail\\/returns\",\"mail\\/reward\",\"mail\\/subscription\",\"mail\\/transaction\",\"mail\\/voucher\",\"marketing\\/affiliate\",\"marketing\\/contact\",\"marketing\\/coupon\",\"marketing\\/marketing\",\"marketplace\\/api\",\"marketplace\\/cron\",\"marketplace\\/event\",\"marketplace\\/extension\",\"marketplace\\/installer\",\"marketplace\\/marketplace\",\"marketplace\\/modification\",\"marketplace\\/promotion\",\"marketplace\\/startup\",\"report\\/online\",\"report\\/report\",\"report\\/statistics\",\"sale\\/order\",\"sale\\/returns\",\"sale\\/subscription\",\"sale\\/voucher\",\"sale\\/voucher_theme\",\"setting\\/setting\",\"setting\\/store\",\"tool\\/backup\",\"tool\\/log\",\"tool\\/notification\",\"tool\\/upgrade\",\"tool\\/upload\",\"user\\/api\",\"user\\/profile\",\"user\\/user\",\"user\\/user_permission\",\"extension\\/opencart\\/captcha\\/basic\",\"extension\\/opencart\\/currency\\/ecb\",\"extension\\/opencart\\/currency\\/fixer\",\"extension\\/opencart\\/dashboard\\/activity\",\"extension\\/opencart\\/dashboard\\/chart\",\"extension\\/opencart\\/dashboard\\/customer\",\"extension\\/opencart\\/dashboard\\/map\",\"extension\\/opencart\\/dashboard\\/online\",\"extension\\/opencart\\/dashboard\\/order\",\"extension\\/opencart\\/dashboard\\/recent\",\"extension\\/opencart\\/dashboard\\/sale\",\"extension\\/opencart\\/fraud\\/ip\",\"extension\\/opencart\\/module\\/account\",\"extension\\/opencart\\/module\\/banner\",\"extension\\/opencart\\/module\\/bestseller\",\"extension\\/opencart\\/module\\/category\",\"extension\\/opencart\\/module\\/featured\",\"extension\\/opencart\\/module\\/filter\",\"extension\\/opencart\\/module\\/html\",\"extension\\/opencart\\/module\\/information\",\"extension\\/opencart\\/module\\/latest\",\"extension\\/opencart\\/module\\/mostviewed\",\"extension\\/opencart\\/module\\/special\",\"extension\\/opencart\\/module\\/store\",\"extension\\/opencart\\/module\\/topic\",\"extension\\/opencart\\/payment\\/bank_transfer\",\"extension\\/opencart\\/payment\\/cheque\",\"extension\\/opencart\\/payment\\/cod\",\"extension\\/opencart\\/payment\\/free_checkout\",\"extension\\/opencart\\/report\\/customer\",\"extension\\/opencart\\/report\\/customer_activity\",\"extension\\/opencart\\/report\\/customer_order\",\"extension\\/opencart\\/report\\/customer_reward\",\"extension\\/opencart\\/report\\/customer_search\",\"extension\\/opencart\\/report\\/customer_transaction\",\"extension\\/opencart\\/report\\/marketing\",\"extension\\/opencart\\/report\\/product_purchased\",\"extension\\/opencart\\/report\\/product_viewed\",\"extension\\/opencart\\/report\\/sale_coupon\",\"extension\\/opencart\\/report\\/sale_order\",\"extension\\/opencart\\/report\\/sale_return\",\"extension\\/opencart\\/report\\/sale_shipping\",\"extension\\/opencart\\/report\\/sale_tax\",\"extension\\/opencart\\/shipping\\/flat\",\"extension\\/opencart\\/shipping\\/free\",\"extension\\/opencart\\/shipping\\/item\",\"extension\\/opencart\\/shipping\\/pickup\",\"extension\\/opencart\\/shipping\\/weight\",\"extension\\/opencart\\/theme\\/basic\",\"extension\\/opencart\\/total\\/coupon\",\"extension\\/opencart\\/total\\/credit\",\"extension\\/opencart\\/total\\/handling\",\"extension\\/opencart\\/total\\/low_order_fee\",\"extension\\/opencart\\/total\\/reward\",\"extension\\/opencart\\/total\\/shipping\",\"extension\\/opencart\\/total\\/sub_total\",\"extension\\/opencart\\/total\\/tax\",\"extension\\/opencart\\/total\\/total\",\"extension\\/opencart\\/total\\/voucher\",\"extension\\/paypal\\/payment\\/paypal\",\"extension\\/stripe\\/payment\\/stripe\"]}'),
(2, 'Demonstration', '');

-- --------------------------------------------------------

--
-- Table structure for table `ve_user_login`
--

CREATE TABLE `ve_user_login` (
  `user_login_id` int NOT NULL,
  `user_id` int NOT NULL,
  `ip` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

 
--
-- Table structure for table `ve_variations`
--

CREATE TABLE `ve_variations` (
  `variation_id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `sku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `subtract` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ve_variations`
--

INSERT INTO `ve_variations` (`variation_id`, `product_id`, `sku`, `model`, `quantity`, `price`, `subtract`) VALUES
(1, 1, '14:193#A-black;200000124:200000338', 'A-black, 43', 181, '30.19', 1),
(2, 1, '14:173#A-black fleece;200000124:200000333', 'A-black fleece, 35', 0, '29.20', 1),
(3, 1, '14:173#A-black fleece;200000124:200000334', 'A-black fleece, 36', 0, '29.32', 1),
(4, 1, '14:173#A-black fleece;200000124:100010482', 'A-black fleece, 37', 0, '29.45', 1),
(5, 1, '14:193#A-black;200000124:200000364', 'A-black, 39', 1, '29.69', 1),
(6, 1, '14:193#A-black;200000124:100013888', 'A-black, 40', 183, '29.81', 1),
(7, 1, '14:193#A-black;200000124:100010483', 'A-black, 41', 186, '29.94', 1),
(8, 1, '14:193#A-black;200000124:200000337', 'A-black, 42', 187, '30.06', 1),
(9, 1, '14:193#A-black;200000124:200000333', 'A-black, 35', 188, '29.20', 1),
(10, 1, '14:193#A-black;200000124:200000334', 'A-black, 36', 184, '29.32', 1),
(11, 1, '14:193#A-black;200000124:100010482', 'A-black, 37', 184, '29.45', 1),
(12, 1, '14:193#A-black;200000124:200000898', 'A-black, 38', 179, '29.56', 1),
(13, 1, '14:365458#B-black;200000124:100013888', 'B-black, 40', 199, '29.81', 1),
(14, 1, '14:365458#B-black;200000124:100010483', 'B-black, 41', 195, '29.94', 1),
(15, 1, '14:365458#B-black;200000124:200000337', 'B-black, 42', 199, '30.06', 1),
(16, 1, '14:365458#B-black;200000124:200000338', 'B-black, 43', 198, '30.19', 1),
(17, 1, '14:365458#B-black;200000124:200000334', 'B-black, 36', 200, '29.32', 1),
(18, 1, '14:365458#B-black;200000124:100010482', 'B-black, 37', 196, '29.45', 1),
(19, 1, '14:365458#B-black;200000124:200000898', 'B-black, 38', 199, '29.56', 1),
(20, 1, '14:365458#B-black;200000124:200000364', 'B-black, 39', 196, '29.69', 1),
(21, 1, '14:1254#B-apricot;200000124:100010483', 'B-apricot, 41', 198, '29.94', 1),
(22, 1, '14:1254#B-apricot;200000124:200000337', 'B-apricot, 42', 199, '30.06', 1),
(23, 1, '14:1254#B-apricot;200000124:200000338', 'B-apricot, 43', 199, '30.19', 1),
(24, 1, '14:365458#B-black;200000124:200000333', 'B-black, 35', 199, '29.20', 1),
(25, 1, '14:1254#B-apricot;200000124:100010482', 'B-apricot, 37', 199, '29.45', 1),
(26, 1, '14:1254#B-apricot;200000124:200000898', 'B-apricot, 38', 199, '29.56', 1),
(27, 1, '14:1254#B-apricot;200000124:200000364', 'B-apricot, 39', 197, '29.69', 1),
(28, 1, '14:1254#B-apricot;200000124:100013888', 'B-apricot, 40', 200, '29.81', 1),
(29, 1, '14:173#A-black fleece;200000124:200000337', 'A-black fleece, 42', 0, '30.06', 1),
(30, 1, '14:173#A-black fleece;200000124:200000338', 'A-black fleece, 43', 0, '30.19', 1),
(31, 1, '14:1254#B-apricot;200000124:200000333', 'B-apricot, 35', 200, '29.20', 1),
(32, 1, '14:1254#B-apricot;200000124:200000334', 'B-apricot, 36', 198, '29.32', 1),
(33, 1, '14:173#A-black fleece;200000124:200000898', 'A-black fleece, 38', 0, '29.56', 1),
(34, 1, '14:173#A-black fleece;200000124:200000364', 'A-black fleece, 39', 0, '29.69', 1),
(35, 1, '14:173#A-black fleece;200000124:100013888', 'A-black fleece, 40', 0, '29.81', 1),
(36, 1, '14:173#A-black fleece;200000124:100010483', 'A-black fleece, 41', 0, '29.94', 1),
(37, 2, '136:200003938;380:200746126#5m', '5m', 128, '23.21', 1),
(39, 2, '136:200003938;380:200007624#10m', '10m', 88, '33.92', 1),
(41, 2, '136:29;380:42061083#20m', '20m', 35, '53.20', 1),
(43, 2, '136:200003938;380:201451169#2m', '2m', 187, '13.00', 1),
(44, 2, '136:29;380:200007624#10m', '10m', 54, '33.65', 1),
(45, 2, '136:29;380:201441007#15m', '15m', 28, '45.30', 1),
(46, 2, '136:29;380:201451169#2m', '2m', 6, '12.98', 1),
(47, 2, '136:29;380:200746126#5m', '5m', 67, '23.11', 1),
(48, 2, '136:29;380:201301155', '', 0, '16574.40', 1),
(51, 2, '136:200003938;380:201441007#15m', '15m', 28, '45.27', 1),
(53, 2, '136:200003938;380:42061083#20m', '20m', 116, '55.52', 1),
(61, 3, '11.6', 'Red', 39567, '11.60', 1),
(62, 3, '11.6', 'White', 39567, '11.60', 1),
(63, 3, '11.6', 'Green', 39567, '11.60', 1),
(64, 3, '11.6', 'Black', 39567, '11.60', 1),
(65, 3, '11.6', 'Yellow', 39567, '11.60', 1),
(66, 4, '52.44', '10.5inch black', 36956, '52.44', 1),
(67, 4, '52.44', '11inch black', 36956, '52.44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ve_variation_options`
--

CREATE TABLE `ve_variation_options` (
  `var_opt_id` int NOT NULL,
  `variation_id` int DEFAULT NULL,
  `p_opt_value_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ve_variation_options`
--

INSERT INTO `ve_variation_options` (`var_opt_id`, `variation_id`, `p_opt_value_id`) VALUES
(1, 1, 1),
(2, 1, 13),
(3, 2, 2),
(4, 2, 5),
(5, 3, 2),
(6, 3, 6),
(7, 4, 2),
(8, 4, 7),
(9, 5, 1),
(10, 5, 9),
(11, 6, 1),
(12, 6, 10),
(13, 7, 1),
(14, 7, 11),
(15, 8, 1),
(16, 8, 12),
(17, 9, 1),
(18, 9, 5),
(19, 10, 1),
(20, 10, 6),
(21, 11, 1),
(22, 11, 7),
(23, 12, 1),
(24, 12, 8),
(25, 13, 4),
(26, 13, 10),
(27, 14, 4),
(28, 14, 11),
(29, 15, 4),
(30, 15, 12),
(31, 16, 4),
(32, 16, 13),
(33, 17, 4),
(34, 17, 6),
(35, 18, 4),
(36, 18, 7),
(37, 19, 4),
(38, 19, 8),
(39, 20, 4),
(40, 20, 9),
(41, 21, 3),
(42, 21, 11),
(43, 22, 3),
(44, 22, 12),
(45, 23, 3),
(46, 23, 13),
(47, 24, 4),
(48, 24, 5),
(49, 25, 3),
(50, 25, 7),
(51, 26, 3),
(52, 26, 8),
(53, 27, 3),
(54, 27, 9),
(55, 28, 3),
(56, 28, 10),
(57, 29, 2),
(58, 29, 12),
(59, 30, 2),
(60, 30, 13),
(61, 31, 3),
(62, 31, 5),
(63, 32, 3),
(64, 32, 6),
(65, 33, 2),
(66, 33, 8),
(67, 34, 2),
(68, 34, 9),
(69, 35, 2),
(70, 35, 10),
(71, 36, 2),
(72, 36, 11),
(73, 37, 15),
(74, 37, 17),
(76, 39, 15),
(77, 39, 18),
(79, 41, 14),
(80, 41, 20),
(82, 43, 15),
(83, 43, 16),
(84, 44, 14),
(85, 44, 18),
(86, 45, 14),
(87, 45, 19),
(88, 46, 14),
(89, 46, 16),
(90, 47, 14),
(91, 47, 17),
(92, 48, 14),
(95, 51, 15),
(96, 51, 19),
(98, 53, 15),
(99, 53, 20),
(107, 61, 27),
(108, 62, 28),
(109, 63, 29),
(110, 64, 30),
(111, 65, 31),
(112, 66, 32),
(113, 67, 33);

-- --------------------------------------------------------

--
-- Table structure for table `ve_voucher`
--

CREATE TABLE `ve_voucher` (
  `voucher_id` int NOT NULL,
  `order_id` int NOT NULL,
  `code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `from_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `from_email` varchar(96) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `to_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `to_email` varchar(96) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `voucher_theme_id` int NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `amount` decimal(15,4) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_voucher_history`
--

CREATE TABLE `ve_voucher_history` (
  `voucher_history_id` int NOT NULL,
  `voucher_id` int NOT NULL,
  `order_id` int NOT NULL,
  `amount` decimal(15,4) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ve_voucher_theme`
--

CREATE TABLE `ve_voucher_theme` (
  `voucher_theme_id` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_voucher_theme`
--

INSERT INTO `ve_voucher_theme` (`voucher_theme_id`, `image`) VALUES
(6, 'catalog/demo/apple_logo.jpg'),
(7, 'catalog/demo/gift-voucher-birthday.jpg'),
(8, 'catalog/demo/canon_eos_5d_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ve_voucher_theme_description`
--

CREATE TABLE `ve_voucher_theme_description` (
  `voucher_theme_id` int NOT NULL,
  `language_id` int NOT NULL,
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_voucher_theme_description`
--

INSERT INTO `ve_voucher_theme_description` (`voucher_theme_id`, `language_id`, `name`) VALUES
(6, 1, 'Christmas'),
(7, 1, 'Birthday'),
(8, 1, 'General');

-- --------------------------------------------------------

--
-- Table structure for table `ve_weight_class`
--

CREATE TABLE `ve_weight_class` (
  `weight_class_id` int NOT NULL,
  `value` decimal(15,8) NOT NULL DEFAULT '0.00000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_weight_class`
--

INSERT INTO `ve_weight_class` (`weight_class_id`, `value`) VALUES
(1, '1.00000000'),
(2, '1000.00000000'),
(5, '2.20460000'),
(6, '35.27400000');

-- --------------------------------------------------------

--
-- Table structure for table `ve_weight_class_description`
--

CREATE TABLE `ve_weight_class_description` (
  `weight_class_id` int NOT NULL,
  `language_id` int NOT NULL,
  `title` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `unit` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_weight_class_description`
--

INSERT INTO `ve_weight_class_description` (`weight_class_id`, `language_id`, `title`, `unit`) VALUES
(1, 1, 'Kilogram', 'kg'),
(2, 1, 'Gram', 'g'),
(5, 1, 'Pound ', 'lb'),
(6, 1, 'Ounce', 'oz');

-- --------------------------------------------------------

--
-- Table structure for table `ve_zone`
--

CREATE TABLE `ve_zone` (
  `zone_id` int NOT NULL,
  `country_id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_zone`
--

INSERT INTO `ve_zone` (`zone_id`, `country_id`, `name`, `code`, `status`) VALUES
(1, 1, 'Badakhshan', 'BDS', 1),
(2, 1, 'Badghis', 'BDG', 1),
(3, 1, 'Baghlan', 'BGL', 1),
(4, 1, 'Balkh', 'BAL', 1),
(5, 1, 'Bamian', 'BAM', 1),
(6, 1, 'Farah', 'FRA', 1),
(7, 1, 'Faryab', 'FYB', 1),
(8, 1, 'Ghazni', 'GHA', 1),
(9, 1, 'Ghowr', 'GHO', 1),
(10, 1, 'Helmand', 'HEL', 1),
(11, 1, 'Herat', 'HER', 1),
(12, 1, 'Jowzjan', 'JOW', 1),
(13, 1, 'Kabul', 'KAB', 1),
(14, 1, 'Kandahar', 'KAN', 1),
(15, 1, 'Kapisa', 'KAP', 1),
(16, 1, 'Khost', 'KHO', 1),
(17, 1, 'Konar', 'KNR', 1),
(18, 1, 'Kondoz', 'KDZ', 1),
(19, 1, 'Laghman', 'LAG', 1),
(20, 1, 'Lowgar', 'LOW', 1),
(21, 1, 'Nangrahar', 'NAN', 1),
(22, 1, 'Nimruz', 'NIM', 1),
(23, 1, 'Nurestan', 'NUR', 1),
(24, 1, 'Oruzgan', 'ORU', 1),
(25, 1, 'Paktia', 'PIA', 1),
(26, 1, 'Paktika', 'PKA', 1),
(27, 1, 'Parwan', 'PAR', 1),
(28, 1, 'Samangan', 'SAM', 1),
(29, 1, 'Sar-e Pol', 'SAR', 1),
(30, 1, 'Takhar', 'TAK', 1),
(31, 1, 'Wardak', 'WAR', 1),
(32, 1, 'Zabol', 'ZAB', 1),
(33, 2, 'Berat', 'BR', 1),
(34, 2, 'Bulqize', 'BU', 1),
(35, 2, 'Delvine', 'DL', 1),
(36, 2, 'Devoll', 'DV', 1),
(37, 2, 'Diber', 'DI', 1),
(38, 2, 'Durres', 'DR', 1),
(39, 2, 'Elbasan', 'EL', 1),
(40, 2, 'Kolonje', 'ER', 1),
(41, 2, 'Fier', 'FR', 1),
(42, 2, 'Gjirokaster', 'GJ', 1),
(43, 2, 'Gramsh', 'GR', 1),
(44, 2, 'Has', 'HA', 1),
(45, 2, 'Kavaje', 'KA', 1),
(46, 2, 'Kurbin', 'KB', 1),
(47, 2, 'Kucove', 'KC', 1),
(48, 2, 'Korce', 'KO', 1),
(49, 2, 'Kruje', 'KR', 1),
(50, 2, 'Kukes', 'KU', 1),
(51, 2, 'Librazhd', 'LB', 1),
(52, 2, 'Lezhe', 'LE', 1),
(53, 2, 'Lushnje', 'LU', 1),
(54, 2, 'Malesi e Madhe', 'MM', 1),
(55, 2, 'Mallakaster', 'MK', 1),
(56, 2, 'Mat', 'MT', 1),
(57, 2, 'Mirdite', 'MR', 1),
(58, 2, 'Peqin', 'PQ', 1),
(59, 2, 'Permet', 'PR', 1),
(60, 2, 'Pogradec', 'PG', 1),
(61, 2, 'Puke', 'PU', 1),
(62, 2, 'Shkoder', 'SH', 1),
(63, 2, 'Skrapar', 'SK', 1),
(64, 2, 'Sarande', 'SR', 1),
(65, 2, 'Tepelene', 'TE', 1),
(66, 2, 'Tropoje', 'TP', 1),
(67, 2, 'Tirane', 'TR', 1),
(68, 2, 'Vlore', 'VL', 1),
(69, 3, 'Adrar', '01', 1),
(70, 3, 'Ain Defla', '44', 1),
(71, 3, 'Ain Temouchent', '46', 1),
(72, 3, 'Alger', '16', 1),
(73, 3, 'Annaba', '23', 1),
(74, 3, 'Batna', '05', 1),
(75, 3, 'Bechar', '08', 1),
(76, 3, 'Bejaia', '06', 1),
(77, 3, 'Biskra', '07', 1),
(78, 3, 'Blida', '09', 1),
(79, 3, 'Bordj Bou Arreridj', '34', 1),
(80, 3, 'Bouira', '10', 1),
(81, 3, 'Boumerdes', '35', 1),
(82, 3, 'Chlef', '02', 1),
(83, 3, 'Constantine', '26', 1),
(84, 3, 'Djelfa', '17', 1),
(85, 3, 'El Bayadh', '32', 1),
(86, 3, 'El Oued', '39', 1),
(87, 3, 'El Tarf', '36', 1),
(88, 3, 'Ghardaia', '47', 1),
(89, 3, 'Guelma', '24', 1),
(90, 3, 'Illizi', '33', 1),
(91, 3, 'Jijel', '18', 1),
(92, 3, 'Khenchela', '40', 1),
(93, 3, 'Laghouat', '03', 1),
(94, 3, 'Mascara', '29', 1),
(95, 3, 'Medea', '26', 1),
(96, 3, 'Mila', '43', 1),
(97, 3, 'Mostaganem', '27', 1),
(98, 3, 'M\'Sila', '28', 1),
(99, 3, 'Naama', '45', 1),
(100, 3, 'Oran', '31', 1),
(101, 3, 'Ouargla', '30', 1),
(102, 3, 'Oum el-Bouaghi', '04', 1),
(103, 3, 'Relizane', '48', 1),
(104, 3, 'Saida', '20', 1),
(105, 3, 'Setif', '19', 1),
(106, 3, 'Sidi Bel Abbes', '22', 1),
(107, 3, 'Skikda', '21', 1),
(108, 3, 'Souk Ahras', '41', 1),
(109, 3, 'Tamanrasset', '11', 1),
(110, 3, 'Tebessa', '12', 1),
(111, 3, 'Tiaret', '14', 1),
(112, 3, 'Tindouf', '37', 1),
(113, 3, 'Tipaza', '42', 1),
(114, 3, 'Tissemsilt', '38', 1),
(115, 3, 'Tizi Ouzou', '15', 1),
(116, 3, 'Tlemcen', '13', 1),
(117, 4, 'Eastern', 'E', 1),
(118, 4, 'Manu\'a', 'M', 1),
(119, 4, 'Rose Island', 'R', 1),
(120, 4, 'Swains Island', 'S', 1),
(121, 4, 'Western', 'W', 1),
(122, 5, 'Andorra la Vella', 'ALV', 1),
(123, 5, 'Canillo', 'CAN', 1),
(124, 5, 'Encamp', 'ENC', 1),
(125, 5, 'Escaldes-Engordany', 'ESE', 1),
(126, 5, 'La Massana', 'LMA', 1),
(127, 5, 'Ordino', 'ORD', 1),
(128, 5, 'Sant Julia de Loria', 'SJL', 1),
(129, 6, 'Bengo', 'BGO', 1),
(130, 6, 'Benguela', 'BGU', 1),
(131, 6, 'Bie', 'BIE', 1),
(132, 6, 'Cabinda', 'CAB', 1),
(133, 6, 'Cuando-Cubango', 'CCU', 1),
(134, 6, 'Cuanza Norte', 'CNO', 1),
(135, 6, 'Cuanza Sul', 'CUS', 1),
(136, 6, 'Cunene', 'CNN', 1),
(137, 6, 'Huambo', 'HUA', 1),
(138, 6, 'Huila', 'HUI', 1),
(139, 6, 'Luanda', 'LUA', 1),
(140, 6, 'Lunda Norte', 'LNO', 1),
(141, 6, 'Lunda Sul', 'LSU', 1),
(142, 6, 'Malange', 'MAL', 1),
(143, 6, 'Moxico', 'MOX', 1),
(144, 6, 'Namibe', 'NAM', 1),
(145, 6, 'Uige', 'UIG', 1),
(146, 6, 'Zaire', 'ZAI', 1),
(147, 9, 'Saint George', 'ASG', 1),
(148, 9, 'Saint John', 'ASJ', 1),
(149, 9, 'Saint Mary', 'ASM', 1),
(150, 9, 'Saint Paul', 'ASL', 1),
(151, 9, 'Saint Peter', 'ASR', 1),
(152, 9, 'Saint Philip', 'ASH', 1),
(153, 9, 'Barbuda', 'BAR', 1),
(154, 9, 'Redonda', 'RED', 1),
(155, 10, 'Antartida e Islas del Atlantico', 'AN', 1),
(156, 10, 'Buenos Aires', 'B', 1),
(157, 10, 'Catamarca', 'K', 1),
(158, 10, 'Chaco', 'H', 1),
(159, 10, 'Chubut', 'U', 1),
(160, 10, 'Cordoba', 'X', 1),
(161, 10, 'Corrientes', 'W', 1),
(162, 10, 'Ciudad Autónoma de Buenos Aires', 'C', 1),
(163, 10, 'Entre Rios', 'E', 1),
(164, 10, 'Formosa', 'P', 1),
(165, 10, 'Jujuy', 'Y', 1),
(166, 10, 'La Pampa', 'L', 1),
(167, 10, 'La Rioja', 'F', 1),
(168, 10, 'Mendoza', 'M', 1),
(169, 10, 'Misiones', 'N', 1),
(170, 10, 'Neuquen', 'Q', 1),
(171, 10, 'Rio Negro', 'R', 1),
(172, 10, 'Salta', 'A', 1),
(173, 10, 'San Juan', 'J', 1),
(174, 10, 'San Luis', 'D', 1),
(175, 10, 'Santa Cruz', 'Z', 1),
(176, 10, 'Santa Fe', 'S', 1),
(177, 10, 'Santiago del Estero', 'G', 1),
(178, 10, 'Tierra del Fuego', 'V', 1),
(179, 10, 'Tucuman', 'T', 1),
(180, 11, 'Aragatsotn', 'AGT', 1),
(181, 11, 'Ararat', 'ARR', 1),
(182, 11, 'Armavir', 'ARM', 1),
(183, 11, 'Geghark\'unik\'', 'GEG', 1),
(184, 11, 'Kotayk\'', 'KOT', 1),
(185, 11, 'Lorri', 'LOR', 1),
(186, 11, 'Shirak', 'SHI', 1),
(187, 11, 'Syunik\'', 'SYU', 1),
(188, 11, 'Tavush', 'TAV', 1),
(189, 11, 'Vayots\' Dzor', 'VAY', 1),
(190, 11, 'Yerevan', 'YER', 1),
(191, 13, 'Australian Capital Territory', 'ACT', 1),
(192, 13, 'New South Wales', 'NSW', 1),
(193, 13, 'Northern Territory', 'NT', 1),
(194, 13, 'Queensland', 'QLD', 1),
(195, 13, 'South Australia', 'SA', 1),
(196, 13, 'Tasmania', 'TAS', 1),
(197, 13, 'Victoria', 'VIC', 1),
(198, 13, 'Western Australia', 'WA', 1),
(199, 14, 'Burgenland', '1', 1),
(200, 14, 'Kärnten', '2', 1),
(201, 14, 'Niederösterreich', '3', 1),
(202, 14, 'Oberösterreich', '4', 1),
(203, 14, 'Salzburg', '5', 1),
(204, 14, 'Steiermark', '6', 1),
(205, 14, 'Tirol', '7', 1),
(206, 14, 'Vorarlberg', '8', 1),
(207, 14, 'Wien', '9', 1),
(208, 15, 'Ali Bayramli', 'AB', 1),
(209, 15, 'Abseron', 'ABS', 1),
(210, 15, 'AgcabAdi', 'AGC', 1),
(211, 15, 'Agdam', 'AGM', 1),
(212, 15, 'Agdas', 'AGS', 1),
(213, 15, 'Agstafa', 'AGA', 1),
(214, 15, 'Agsu', 'AGU', 1),
(215, 15, 'Astara', 'AST', 1),
(216, 15, 'Baki', 'BA', 1),
(217, 15, 'BabAk', 'BAB', 1),
(218, 15, 'BalakAn', 'BAL', 1),
(219, 15, 'BArdA', 'BAR', 1),
(220, 15, 'Beylaqan', 'BEY', 1),
(221, 15, 'Bilasuvar', 'BIL', 1),
(222, 15, 'Cabrayil', 'CAB', 1),
(223, 15, 'Calilabab', 'CAL', 1),
(224, 15, 'Culfa', 'CUL', 1),
(225, 15, 'Daskasan', 'DAS', 1),
(226, 15, 'Davaci', 'DAV', 1),
(227, 15, 'Fuzuli', 'FUZ', 1),
(228, 15, 'Ganca', 'GA', 1),
(229, 15, 'Gadabay', 'GAD', 1),
(230, 15, 'Goranboy', 'GOR', 1),
(231, 15, 'Goycay', 'GOY', 1),
(232, 15, 'Haciqabul', 'HAC', 1),
(233, 15, 'Imisli', 'IMI', 1),
(234, 15, 'Ismayilli', 'ISM', 1),
(235, 15, 'Kalbacar', 'KAL', 1),
(236, 15, 'Kurdamir', 'KUR', 1),
(237, 15, 'Lankaran', 'LA', 1),
(238, 15, 'Lacin', 'LAC', 1),
(239, 15, 'Lankaran', 'LAN', 1),
(240, 15, 'Lerik', 'LER', 1),
(241, 15, 'Masalli', 'MAS', 1),
(242, 15, 'Mingacevir', 'MI', 1),
(243, 15, 'Naftalan', 'NA', 1),
(244, 15, 'Neftcala', 'NEF', 1),
(245, 15, 'Oguz', 'OGU', 1),
(246, 15, 'Ordubad', 'ORD', 1),
(247, 15, 'Qabala', 'QAB', 1),
(248, 15, 'Qax', 'QAX', 1),
(249, 15, 'Qazax', 'QAZ', 1),
(250, 15, 'Qobustan', 'QOB', 1),
(251, 15, 'Quba', 'QBA', 1),
(252, 15, 'Qubadli', 'QBI', 1),
(253, 15, 'Qusar', 'QUS', 1),
(254, 15, 'Saki', 'SA', 1),
(255, 15, 'Saatli', 'SAT', 1),
(256, 15, 'Sabirabad', 'SAB', 1),
(257, 15, 'Sadarak', 'SAD', 1),
(258, 15, 'Sahbuz', 'SAH', 1),
(259, 15, 'Saki', 'SAK', 1),
(260, 15, 'Salyan', 'SAL', 1),
(261, 15, 'Sumqayit', 'SM', 1),
(262, 15, 'Samaxi', 'SMI', 1),
(263, 15, 'Samkir', 'SKR', 1),
(264, 15, 'Samux', 'SMX', 1),
(265, 15, 'Sarur', 'SAR', 1),
(266, 15, 'Siyazan', 'SIY', 1),
(267, 15, 'Susa', 'SS', 1),
(268, 15, 'Susa', 'SUS', 1),
(269, 15, 'Tartar', 'TAR', 1),
(270, 15, 'Tovuz', 'TOV', 1),
(271, 15, 'Ucar', 'UCA', 1),
(272, 15, 'Xankandi', 'XA', 1),
(273, 15, 'Xacmaz', 'XAC', 1),
(274, 15, 'Xanlar', 'XAN', 1),
(275, 15, 'Xizi', 'XIZ', 1),
(276, 15, 'Xocali', 'XCI', 1),
(277, 15, 'Xocavand', 'XVD', 1),
(278, 15, 'Yardimli', 'YAR', 1),
(279, 15, 'Yevlax', 'YEV', 1),
(280, 15, 'Zangilan', 'ZAN', 1),
(281, 15, 'Zaqatala', 'ZAQ', 1),
(282, 15, 'Zardab', 'ZAR', 1),
(283, 15, 'Naxcivan', 'NX', 1),
(284, 16, 'Acklins', 'ACK', 1),
(285, 16, 'Berry Islands', 'BER', 1),
(286, 16, 'Bimini', 'BIM', 1),
(287, 16, 'Black Point', 'BLK', 1),
(288, 16, 'Cat Island', 'CAT', 1),
(289, 16, 'Central Abaco', 'CAB', 1),
(290, 16, 'Central Andros', 'CAN', 1),
(291, 16, 'Central Eleuthera', 'CEL', 1),
(292, 16, 'City of Freeport', 'FRE', 1),
(293, 16, 'Crooked Island', 'CRO', 1),
(294, 16, 'East Grand Bahama', 'EGB', 1),
(295, 16, 'Exuma', 'EXU', 1),
(296, 16, 'Grand Cay', 'GRD', 1),
(297, 16, 'Harbour Island', 'HAR', 1),
(298, 16, 'Hope Town', 'HOP', 1),
(299, 16, 'Inagua', 'INA', 1),
(300, 16, 'Long Island', 'LNG', 1),
(301, 16, 'Mangrove Cay', 'MAN', 1),
(302, 16, 'Mayaguana', 'MAY', 1),
(303, 16, 'Moore\'s Island', 'MOO', 1),
(304, 16, 'North Abaco', 'NAB', 1),
(305, 16, 'North Andros', 'NAN', 1),
(306, 16, 'North Eleuthera', 'NEL', 1),
(307, 16, 'Ragged Island', 'RAG', 1),
(308, 16, 'Rum Cay', 'RUM', 1),
(309, 16, 'San Salvador', 'SAL', 1),
(310, 16, 'South Abaco', 'SAB', 1),
(311, 16, 'South Andros', 'SAN', 1),
(312, 16, 'South Eleuthera', 'SEL', 1),
(313, 16, 'Spanish Wells', 'SWE', 1),
(314, 16, 'West Grand Bahama', 'WGB', 1),
(315, 17, 'Capital', 'CAP', 1),
(316, 17, 'Central', 'CEN', 1),
(317, 17, 'Muharraq', 'MUH', 1),
(318, 17, 'Northern', 'NOR', 1),
(319, 17, 'Southern', 'SOU', 1),
(320, 18, 'Barisal', 'BAR', 1),
(321, 18, 'Chittagong', 'CHI', 1),
(322, 18, 'Dhaka', 'DHA', 1),
(323, 18, 'Khulna', 'KHU', 1),
(324, 18, 'Rajshahi', 'RAJ', 1),
(325, 18, 'Sylhet', 'SYL', 1),
(326, 19, 'Christ Church', 'CC', 1),
(327, 19, 'Saint Andrew', 'AND', 1),
(328, 19, 'Saint George', 'GEO', 1),
(329, 19, 'Saint James', 'JAM', 1),
(330, 19, 'Saint John', 'JOH', 1),
(331, 19, 'Saint Joseph', 'JOS', 1),
(332, 19, 'Saint Lucy', 'LUC', 1),
(333, 19, 'Saint Michael', 'MIC', 1),
(334, 19, 'Saint Peter', 'PET', 1),
(335, 19, 'Saint Philip', 'PHI', 1),
(336, 19, 'Saint Thomas', 'THO', 1),
(337, 20, 'Brestskaya (Brest)', 'BR', 1),
(338, 20, 'Homyel\'skaya (Homyel\')', 'HO', 1),
(339, 20, 'Horad Minsk', 'HM', 1),
(340, 20, 'Hrodzyenskaya (Hrodna)', 'HR', 1),
(341, 20, 'Mahilyowskaya (Mahilyow)', 'MA', 1),
(342, 20, 'Minskaya', 'MI', 1),
(343, 20, 'Vitsyebskaya (Vitsyebsk)', 'VI', 1),
(344, 21, 'Antwerpen', 'VAN', 1),
(345, 21, 'Brabant Wallon', 'WBR', 1),
(346, 21, 'Hainaut', 'WHT', 1),
(347, 21, 'Liège', 'WLG', 1),
(348, 21, 'Limburg', 'VLI', 1),
(349, 21, 'Luxembourg', 'WLX', 1),
(350, 21, 'Namur', 'WNA', 1),
(351, 21, 'Oost-Vlaanderen', 'VOV', 1),
(352, 21, 'Vlaams Brabant', 'VBR', 1),
(353, 21, 'West-Vlaanderen', 'VWV', 1),
(354, 22, 'Belize', 'BZ', 1),
(355, 22, 'Cayo', 'CY', 1),
(356, 22, 'Corozal', 'CR', 1),
(357, 22, 'Orange Walk', 'OW', 1),
(358, 22, 'Stann Creek', 'SC', 1),
(359, 22, 'Toledo', 'TO', 1),
(360, 23, 'Alibori', 'AL', 1),
(361, 23, 'Atakora', 'AK', 1),
(362, 23, 'Atlantique', 'AQ', 1),
(363, 23, 'Borgou', 'BO', 1),
(364, 23, 'Collines', 'CO', 1),
(365, 23, 'Donga', 'DO', 1),
(366, 23, 'Kouffo', 'KO', 1),
(367, 23, 'Littoral', 'LI', 1),
(368, 23, 'Mono', 'MO', 1),
(369, 23, 'Oueme', 'OU', 1),
(370, 23, 'Plateau', 'PL', 1),
(371, 23, 'Zou', 'ZO', 1),
(372, 24, 'Devonshire', 'DS', 1),
(373, 24, 'Hamilton City', 'HC', 1),
(374, 24, 'Hamilton', 'HA', 1),
(375, 24, 'Paget', 'PG', 1),
(376, 24, 'Pembroke', 'PB', 1),
(377, 24, 'Saint George City', 'GC', 1),
(378, 24, 'Saint George\'s', 'SG', 1),
(379, 24, 'Sandys', 'SA', 1),
(380, 24, 'Smith\'s', 'SM', 1),
(381, 24, 'Southampton', 'SH', 1),
(382, 24, 'Warwick', 'WA', 1),
(383, 25, 'Bumthang', 'BUM', 1),
(384, 25, 'Chukha', 'CHU', 1),
(385, 25, 'Dagana', 'DAG', 1),
(386, 25, 'Gasa', 'GAS', 1),
(387, 25, 'Haa', 'HAA', 1),
(388, 25, 'Lhuntse', 'LHU', 1),
(389, 25, 'Mongar', 'MON', 1),
(390, 25, 'Paro', 'PAR', 1),
(391, 25, 'Pemagatshel', 'PEM', 1),
(392, 25, 'Punakha', 'PUN', 1),
(393, 25, 'Samdrup Jongkhar', 'SJO', 1),
(394, 25, 'Samtse', 'SAT', 1),
(395, 25, 'Sarpang', 'SAR', 1),
(396, 25, 'Thimphu', 'THI', 1),
(397, 25, 'Trashigang', 'TRG', 1),
(398, 25, 'Trashiyangste', 'TRY', 1),
(399, 25, 'Trongsa', 'TRO', 1),
(400, 25, 'Tsirang', 'TSI', 1),
(401, 25, 'Wangdue Phodrang', 'WPH', 1),
(402, 25, 'Zhemgang', 'ZHE', 1),
(403, 26, 'Beni', 'BEN', 1),
(404, 26, 'Chuquisaca', 'CHU', 1),
(405, 26, 'Cochabamba', 'COC', 1),
(406, 26, 'La Paz', 'LPZ', 1),
(407, 26, 'Oruro', 'ORU', 1),
(408, 26, 'Pando', 'PAN', 1),
(409, 26, 'Potosi', 'POT', 1),
(410, 26, 'Santa Cruz', 'SCZ', 1),
(411, 26, 'Tarija', 'TAR', 1),
(412, 27, 'Brcko district', 'BRO', 1),
(413, 27, 'Unsko-Sanski Kanton', 'FUS', 1),
(414, 27, 'Posavski Kanton', 'FPO', 1),
(415, 27, 'Tuzlanski Kanton', 'FTU', 1),
(416, 27, 'Zenicko-Dobojski Kanton', 'FZE', 1),
(417, 27, 'Bosanskopodrinjski Kanton', 'FBP', 1),
(418, 27, 'Srednjebosanski Kanton', 'FSB', 1),
(419, 27, 'Hercegovacko-neretvanski Kanton', 'FHN', 1),
(420, 27, 'Zapadnohercegovacka Zupanija', 'FZH', 1),
(421, 27, 'Kanton Sarajevo', 'FSA', 1),
(422, 27, 'Zapadnobosanska', 'FZA', 1),
(423, 27, 'Banja Luka', 'SBL', 1),
(424, 27, 'Doboj', 'SDO', 1),
(425, 27, 'Bijeljina', 'SBI', 1),
(426, 27, 'Vlasenica', 'SVL', 1),
(427, 27, 'Sarajevo-Romanija or Sokolac', 'SSR', 1),
(428, 27, 'Foca', 'SFO', 1),
(429, 27, 'Trebinje', 'STR', 1),
(430, 28, 'Central', 'CE', 1),
(431, 28, 'Ghanzi', 'GH', 1),
(432, 28, 'Kgalagadi', 'KD', 1),
(433, 28, 'Kgatleng', 'KT', 1),
(434, 28, 'Kweneng', 'KW', 1),
(435, 28, 'Ngamiland', 'NG', 1),
(436, 28, 'North East', 'NE', 1),
(437, 28, 'North West', 'NW', 1),
(438, 28, 'South East', 'SE', 1),
(439, 28, 'Southern', 'SO', 1),
(440, 30, 'Acre', 'AC', 1),
(441, 30, 'Alagoas', 'AL', 1),
(442, 30, 'Amapá', 'AP', 1),
(443, 30, 'Amazonas', 'AM', 1),
(444, 30, 'Bahia', 'BA', 1),
(445, 30, 'Ceará', 'CE', 1),
(446, 30, 'Distrito Federal', 'DF', 1),
(447, 30, 'Espírito Santo', 'ES', 1),
(448, 30, 'Goiás', 'GO', 1),
(449, 30, 'Maranhão', 'MA', 1),
(450, 30, 'Mato Grosso', 'MT', 1),
(451, 30, 'Mato Grosso do Sul', 'MS', 1),
(452, 30, 'Minas Gerais', 'MG', 1),
(453, 30, 'Pará', 'PA', 1),
(454, 30, 'Paraíba', 'PB', 1),
(455, 30, 'Paraná', 'PR', 1),
(456, 30, 'Pernambuco', 'PE', 1),
(457, 30, 'Piauí', 'PI', 1),
(458, 30, 'Rio de Janeiro', 'RJ', 1),
(459, 30, 'Rio Grande do Norte', 'RN', 1),
(460, 30, 'Rio Grande do Sul', 'RS', 1),
(461, 30, 'Rondônia', 'RO', 1),
(462, 30, 'Roraima', 'RR', 1),
(463, 30, 'Santa Catarina', 'SC', 1),
(464, 30, 'São Paulo', 'SP', 1),
(465, 30, 'Sergipe', 'SE', 1),
(466, 30, 'Tocantins', 'TO', 1),
(467, 31, 'Peros Banhos', 'PB', 1),
(468, 31, 'Salomon Islands', 'SI', 1),
(469, 31, 'Nelsons Island', 'NI', 1),
(470, 31, 'Three Brothers', 'TB', 1),
(471, 31, 'Eagle Islands', 'EA', 1),
(472, 31, 'Danger Island', 'DI', 1),
(473, 31, 'Egmont Islands', 'EG', 1),
(474, 31, 'Diego Garcia', 'DG', 1),
(475, 32, 'Belait', 'BEL', 1),
(476, 32, 'Brunei and Muara', 'BRM', 1),
(477, 32, 'Temburong', 'TEM', 1),
(478, 32, 'Tutong', 'TUT', 1),
(479, 33, 'Blagoevgrad', '', 1),
(480, 33, 'Burgas', '', 1),
(481, 33, 'Dobrich', '', 1),
(482, 33, 'Gabrovo', '', 1),
(483, 33, 'Haskovo', '', 1),
(484, 33, 'Kardjali', '', 1),
(485, 33, 'Kyustendil', '', 1),
(486, 33, 'Lovech', '', 1),
(487, 33, 'Montana', '', 1),
(488, 33, 'Pazardjik', '', 1),
(489, 33, 'Pernik', '', 1),
(490, 33, 'Pleven', '', 1),
(491, 33, 'Plovdiv', '', 1),
(492, 33, 'Razgrad', '', 1),
(493, 33, 'Shumen', '', 1),
(494, 33, 'Silistra', '', 1),
(495, 33, 'Sliven', '', 1),
(496, 33, 'Smolyan', '', 1),
(497, 33, 'Sofia', '', 1),
(498, 33, 'Sofia - town', '', 1),
(499, 33, 'Stara Zagora', '', 1),
(500, 33, 'Targovishte', '', 1),
(501, 33, 'Varna', '', 1),
(502, 33, 'Veliko Tarnovo', '', 1),
(503, 33, 'Vidin', '', 1),
(504, 33, 'Vratza', '', 1),
(505, 33, 'Yambol', '', 1),
(506, 34, 'Bale', 'BAL', 1),
(507, 34, 'Bam', 'BAM', 1),
(508, 34, 'Banwa', 'BAN', 1),
(509, 34, 'Bazega', 'BAZ', 1),
(510, 34, 'Bougouriba', 'BOR', 1),
(511, 34, 'Boulgou', 'BLG', 1),
(512, 34, 'Boulkiemde', 'BOK', 1),
(513, 34, 'Comoe', 'COM', 1),
(514, 34, 'Ganzourgou', 'GAN', 1),
(515, 34, 'Gnagna', 'GNA', 1),
(516, 34, 'Gourma', 'GOU', 1),
(517, 34, 'Houet', 'HOU', 1),
(518, 34, 'Ioba', 'IOA', 1),
(519, 34, 'Kadiogo', 'KAD', 1),
(520, 34, 'Kenedougou', 'KEN', 1),
(521, 34, 'Komondjari', 'KOD', 1),
(522, 34, 'Kompienga', 'KOP', 1),
(523, 34, 'Kossi', 'KOS', 1),
(524, 34, 'Koulpelogo', 'KOL', 1),
(525, 34, 'Kouritenga', 'KOT', 1),
(526, 34, 'Kourweogo', 'KOW', 1),
(527, 34, 'Leraba', 'LER', 1),
(528, 34, 'Loroum', 'LOR', 1),
(529, 34, 'Mouhoun', 'MOU', 1),
(530, 34, 'Nahouri', 'NAH', 1),
(531, 34, 'Namentenga', 'NAM', 1),
(532, 34, 'Nayala', 'NAY', 1),
(533, 34, 'Noumbiel', 'NOU', 1),
(534, 34, 'Oubritenga', 'OUB', 1),
(535, 34, 'Oudalan', 'OUD', 1),
(536, 34, 'Passore', 'PAS', 1),
(537, 34, 'Poni', 'PON', 1),
(538, 34, 'Sanguie', 'SAG', 1),
(539, 34, 'Sanmatenga', 'SAM', 1),
(540, 34, 'Seno', 'SEN', 1),
(541, 34, 'Sissili', 'SIS', 1),
(542, 34, 'Soum', 'SOM', 1),
(543, 34, 'Sourou', 'SOR', 1),
(544, 34, 'Tapoa', 'TAP', 1),
(545, 34, 'Tuy', 'TUY', 1),
(546, 34, 'Yagha', 'YAG', 1),
(547, 34, 'Yatenga', 'YAT', 1),
(548, 34, 'Ziro', 'ZIR', 1),
(549, 34, 'Zondoma', 'ZOD', 1),
(550, 34, 'Zoundweogo', 'ZOW', 1),
(551, 35, 'Bubanza', 'BB', 1),
(552, 35, 'Bujumbura', 'BJ', 1),
(553, 35, 'Bururi', 'BR', 1),
(554, 35, 'Cankuzo', 'CA', 1),
(555, 35, 'Cibitoke', 'CI', 1),
(556, 35, 'Gitega', 'GI', 1),
(557, 35, 'Karuzi', 'KR', 1),
(558, 35, 'Kayanza', 'KY', 1),
(559, 35, 'Kirundo', 'KI', 1),
(560, 35, 'Makamba', 'MA', 1),
(561, 35, 'Muramvya', 'MU', 1),
(562, 35, 'Muyinga', 'MY', 1),
(563, 35, 'Mwaro', 'MW', 1),
(564, 35, 'Ngozi', 'NG', 1),
(565, 35, 'Rutana', 'RT', 1),
(566, 35, 'Ruyigi', 'RY', 1),
(567, 36, 'Phnom Penh', 'PP', 1),
(568, 36, 'Preah Seihanu (Kompong Som or Sihanoukville)', 'PS', 1),
(569, 36, 'Pailin', 'PA', 1),
(570, 36, 'Keb', 'KB', 1),
(571, 36, 'Banteay Meanchey', 'BM', 1),
(572, 36, 'Battambang', 'BA', 1),
(573, 36, 'Kampong Cham', 'KM', 1),
(574, 36, 'Kampong Chhnang', 'KN', 1),
(575, 36, 'Kampong Speu', 'KU', 1),
(576, 36, 'Kampong Som', 'KO', 1),
(577, 36, 'Kampong Thom', 'KT', 1),
(578, 36, 'Kampot', 'KP', 1),
(579, 36, 'Kandal', 'KL', 1),
(580, 36, 'Kaoh Kong', 'KK', 1),
(581, 36, 'Kratie', 'KR', 1),
(582, 36, 'Mondul Kiri', 'MK', 1),
(583, 36, 'Oddar Meancheay', 'OM', 1),
(584, 36, 'Pursat', 'PU', 1),
(585, 36, 'Preah Vihear', 'PR', 1),
(586, 36, 'Prey Veng', 'PG', 1),
(587, 36, 'Ratanak Kiri', 'RK', 1),
(588, 36, 'Siemreap', 'SI', 1),
(589, 36, 'Stung Treng', 'ST', 1),
(590, 36, 'Svay Rieng', 'SR', 1),
(591, 36, 'Takeo', 'TK', 1),
(592, 37, 'Adamawa (Adamaoua)', 'ADA', 1),
(593, 37, 'Centre', 'CEN', 1),
(594, 37, 'East (Est)', 'EST', 1),
(595, 37, 'Extreme North (Extreme-Nord)', 'EXN', 1),
(596, 37, 'Littoral', 'LIT', 1),
(597, 37, 'North (Nord)', 'NOR', 1),
(598, 37, 'Northwest (Nord-Ouest)', 'NOT', 1),
(599, 37, 'West (Ouest)', 'OUE', 1),
(600, 37, 'South (Sud)', 'SUD', 1),
(601, 37, 'Southwest (Sud-Ouest).', 'SOU', 1),
(602, 38, 'Alberta', 'AB', 1),
(603, 38, 'British Columbia', 'BC', 1),
(604, 38, 'Manitoba', 'MB', 1),
(605, 38, 'New Brunswick', 'NB', 1),
(606, 38, 'Newfoundland and Labrador', 'NL', 1),
(607, 38, 'Northwest Territories', 'NT', 1),
(608, 38, 'Nova Scotia', 'NS', 1),
(609, 38, 'Nunavut', 'NU', 1),
(610, 38, 'Ontario', 'ON', 1),
(611, 38, 'Prince Edward Island', 'PE', 1),
(612, 38, 'Qu&eacute;bec', 'QC', 1),
(613, 38, 'Saskatchewan', 'SK', 1),
(614, 38, 'Yukon Territory', 'YT', 1),
(615, 39, 'Boa Vista', 'BV', 1),
(616, 39, 'Brava', 'BR', 1),
(617, 39, 'Calheta de Sao Miguel', 'CS', 1),
(618, 39, 'Maio', 'MA', 1),
(619, 39, 'Mosteiros', 'MO', 1),
(620, 39, 'Paul', 'PA', 1),
(621, 39, 'Porto Novo', 'PN', 1),
(622, 39, 'Praia', 'PR', 1),
(623, 39, 'Ribeira Grande', 'RG', 1),
(624, 39, 'Sal', 'SL', 1),
(625, 39, 'Santa Catarina', 'CA', 1),
(626, 39, 'Santa Cruz', 'CR', 1),
(627, 39, 'Sao Domingos', 'SD', 1),
(628, 39, 'Sao Filipe', 'SF', 1),
(629, 39, 'Sao Nicolau', 'SN', 1),
(630, 39, 'Sao Vicente', 'SV', 1),
(631, 39, 'Tarrafal', 'TA', 1),
(632, 40, 'Creek', 'CR', 1),
(633, 40, 'Eastern', 'EA', 1),
(634, 40, 'Midland', 'ML', 1),
(635, 40, 'South Town', 'ST', 1),
(636, 40, 'Spot Bay', 'SP', 1),
(637, 40, 'Stake Bay', 'SK', 1),
(638, 40, 'West End', 'WD', 1),
(639, 40, 'Western', 'WN', 1),
(640, 41, 'Bamingui-Bangoran', 'BBA', 1),
(641, 41, 'Basse-Kotto', 'BKO', 1),
(642, 41, 'Haute-Kotto', 'HKO', 1),
(643, 41, 'Haut-Mbomou', 'HMB', 1),
(644, 41, 'Kemo', 'KEM', 1),
(645, 41, 'Lobaye', 'LOB', 1),
(646, 41, 'Mambere-KadeÔ', 'MKD', 1),
(647, 41, 'Mbomou', 'MBO', 1),
(648, 41, 'Nana-Mambere', 'NMM', 1),
(649, 41, 'Ombella-M\'Poko', 'OMP', 1),
(650, 41, 'Ouaka', 'OUK', 1),
(651, 41, 'Ouham', 'OUH', 1),
(652, 41, 'Ouham-Pende', 'OPE', 1),
(653, 41, 'Vakaga', 'VAK', 1),
(654, 41, 'Nana-Grebizi', 'NGR', 1),
(655, 41, 'Sangha-Mbaere', 'SMB', 1),
(656, 41, 'Bangui', 'BAN', 1),
(657, 42, 'Batha', 'BA', 1),
(658, 42, 'Biltine', 'BI', 1),
(659, 42, 'Borkou-Ennedi-Tibesti', 'BE', 1),
(660, 42, 'Chari-Baguirmi', 'CB', 1),
(661, 42, 'Guera', 'GU', 1),
(662, 42, 'Kanem', 'KA', 1),
(663, 42, 'Lac', 'LA', 1),
(664, 42, 'Logone Occidental', 'LC', 1),
(665, 42, 'Logone Oriental', 'LR', 1),
(666, 42, 'Mayo-Kebbi', 'MK', 1),
(667, 42, 'Moyen-Chari', 'MC', 1),
(668, 42, 'Ouaddai', 'OU', 1),
(669, 42, 'Salamat', 'SA', 1),
(670, 42, 'Tandjile', 'TA', 1),
(671, 43, 'Aisen del General Carlos Ibanez', 'AI', 1),
(672, 43, 'Antofagasta', 'AN', 1),
(673, 43, 'Araucania', 'AR', 1),
(674, 43, 'Atacama', 'AT', 1),
(675, 43, 'Bio-Bio', 'BI', 1),
(676, 43, 'Coquimbo', 'CO', 1),
(677, 43, 'Libertador General Bernardo O\'Higgins', 'LI', 1),
(678, 43, 'Los Lagos', 'LL', 1),
(679, 43, 'Magallanes y de la Antartica Chilena', 'MA', 1),
(680, 43, 'Maule', 'ML', 1),
(681, 43, 'Region Metropolitana', 'RM', 1),
(682, 43, 'Tarapaca', 'TA', 1),
(683, 43, 'Valparaiso', 'VS', 1),
(684, 44, 'Anhui', 'AN', 1),
(685, 44, 'Beijing', 'BE', 1),
(686, 44, 'Chongqing', 'CH', 1),
(687, 44, 'Fujian', 'FU', 1),
(688, 44, 'Gansu', 'GA', 1),
(689, 44, 'Guangdong', 'GU', 1),
(690, 44, 'Guangxi', 'GX', 1),
(691, 44, 'Guizhou', 'GZ', 1),
(692, 44, 'Hainan', 'HA', 1),
(693, 44, 'Hebei', 'HB', 1),
(694, 44, 'Heilongjiang', 'HL', 1),
(695, 44, 'Henan', 'HE', 1),
(696, 44, 'Hong Kong', 'HK', 1),
(697, 44, 'Hubei', 'HU', 1),
(698, 44, 'Hunan', 'HN', 1),
(699, 44, 'Inner Mongolia', 'IM', 1),
(700, 44, 'Jiangsu', 'JI', 1),
(701, 44, 'Jiangxi', 'JX', 1),
(702, 44, 'Jilin', 'JL', 1),
(703, 44, 'Liaoning', 'LI', 1),
(704, 44, 'Macau', 'MA', 1),
(705, 44, 'Ningxia', 'NI', 1),
(706, 44, 'Shaanxi', 'SH', 1),
(707, 44, 'Shandong', 'SA', 1),
(708, 44, 'Shanghai', 'SG', 1),
(709, 44, 'Shanxi', 'SX', 1),
(710, 44, 'Sichuan', 'SI', 1),
(711, 44, 'Tianjin', 'TI', 1),
(712, 44, 'Xinjiang', 'XI', 1),
(713, 44, 'Yunnan', 'YU', 1),
(714, 44, 'Zhejiang', 'ZH', 1),
(715, 46, 'Direction Island', 'D', 1),
(716, 46, 'Home Island', 'H', 1),
(717, 46, 'Horsburgh Island', 'O', 1),
(718, 46, 'South Island', 'S', 1),
(719, 46, 'West Island', 'W', 1),
(720, 47, 'Amazonas', 'AMA', 1),
(721, 47, 'Antioquia', 'ANT', 1),
(722, 47, 'Arauca', 'ARA', 1),
(723, 47, 'Atlantico', 'ATL', 1),
(724, 47, 'Bogota D.C.', 'DC', 1),
(725, 47, 'Bolivar', 'BOL', 1),
(726, 47, 'Boyaca', 'BOY', 1),
(727, 47, 'Caldas', 'CAL', 1),
(728, 47, 'Caqueta', 'CAQ', 1),
(729, 47, 'Casanare', 'CAS', 1),
(730, 47, 'Cauca', 'CAU', 1),
(731, 47, 'Cesar', 'CES', 1),
(732, 47, 'Choco', 'CHO', 1),
(733, 47, 'Cordoba', 'COR', 1),
(734, 47, 'Cundinamarca', 'CUN', 1),
(735, 47, 'Guainia', 'GNA', 1),
(736, 47, 'Guajira', 'GJR', 1),
(737, 47, 'Guaviare', 'GUV', 1),
(738, 47, 'Huila', 'HUI', 1),
(739, 47, 'Magdalena', 'MAG', 1),
(740, 47, 'Meta', 'MET', 1),
(741, 47, 'Narino', 'NAR', 1),
(742, 47, 'Norte de Santander', 'NSA', 1),
(743, 47, 'Putumayo', 'PUT', 1),
(744, 47, 'Quindio', 'QUI', 1),
(745, 47, 'Risaralda', 'RIS', 1),
(746, 47, 'San Andres y Providencia', 'SAP', 1),
(747, 47, 'Santander', 'SAN', 1),
(748, 47, 'Sucre', 'SUC', 1),
(749, 47, 'Tolima', 'TOL', 1),
(750, 47, 'Valle del Cauca', 'VAC', 1),
(751, 47, 'Vaupes', 'VAU', 1),
(752, 47, 'Vichada', 'VID', 1),
(753, 48, 'Grande Comore', 'G', 1),
(754, 48, 'Anjouan', 'A', 1),
(755, 48, 'Moheli', 'M', 1),
(756, 49, 'Bouenza', 'BO', 1),
(757, 49, 'Brazzaville', 'BR', 1),
(758, 49, 'Cuvette', 'CU', 1),
(759, 49, 'Cuvette-Ouest', 'CO', 1),
(760, 49, 'Kouilou', 'KO', 1),
(761, 49, 'Lekoumou', 'LE', 1),
(762, 49, 'Likouala', 'LI', 1),
(763, 49, 'Niari', 'NI', 1),
(764, 49, 'Plateaux', 'PL', 1),
(765, 49, 'Pool', 'PO', 1),
(766, 49, 'Sangha', 'SA', 1),
(767, 50, 'Pukapuka', 'PU', 1),
(768, 50, 'Rakahanga', 'RK', 1),
(769, 50, 'Manihiki', 'MK', 1),
(770, 50, 'Penrhyn', 'PE', 1),
(771, 50, 'Nassau Island', 'NI', 1),
(772, 50, 'Surwarrow', 'SU', 1),
(773, 50, 'Palmerston', 'PA', 1),
(774, 50, 'Aitutaki', 'AI', 1),
(775, 50, 'Manuae', 'MA', 1),
(776, 50, 'Takutea', 'TA', 1),
(777, 50, 'Mitiaro', 'MT', 1),
(778, 50, 'Atiu', 'AT', 1),
(779, 50, 'Mauke', 'MU', 1),
(780, 50, 'Rarotonga', 'RR', 1),
(781, 50, 'Mangaia', 'MG', 1),
(782, 51, 'Alajuela', 'AL', 1),
(783, 51, 'Cartago', 'CA', 1),
(784, 51, 'Guanacaste', 'GU', 1),
(785, 51, 'Heredia', 'HE', 1),
(786, 51, 'Limon', 'LI', 1),
(787, 51, 'Puntarenas', 'PU', 1),
(788, 51, 'San Jose', 'SJ', 1),
(789, 52, 'Abengourou', 'ABE', 1),
(790, 52, 'Abidjan', 'ABI', 1),
(791, 52, 'Aboisso', 'ABO', 1),
(792, 52, 'Adiake', 'ADI', 1),
(793, 52, 'Adzope', 'ADZ', 1),
(794, 52, 'Agboville', 'AGB', 1),
(795, 52, 'Agnibilekrou', 'AGN', 1),
(796, 52, 'Alepe', 'ALE', 1),
(797, 52, 'Bocanda', 'BOC', 1),
(798, 52, 'Bangolo', 'BAN', 1),
(799, 52, 'Beoumi', 'BEO', 1),
(800, 52, 'Biankouma', 'BIA', 1),
(801, 52, 'Bondoukou', 'BDK', 1),
(802, 52, 'Bongouanou', 'BGN', 1),
(803, 52, 'Bouafle', 'BFL', 1),
(804, 52, 'Bouake', 'BKE', 1),
(805, 52, 'Bouna', 'BNA', 1),
(806, 52, 'Boundiali', 'BDL', 1),
(807, 52, 'Dabakala', 'DKL', 1),
(808, 52, 'Dabou', 'DBU', 1),
(809, 52, 'Daloa', 'DAL', 1),
(810, 52, 'Danane', 'DAN', 1),
(811, 52, 'Daoukro', 'DAO', 1),
(812, 52, 'Dimbokro', 'DIM', 1),
(813, 52, 'Divo', 'DIV', 1),
(814, 52, 'Duekoue', 'DUE', 1),
(815, 52, 'Ferkessedougou', 'FER', 1),
(816, 52, 'Gagnoa', 'GAG', 1),
(817, 52, 'Grand-Bassam', 'GBA', 1),
(818, 52, 'Grand-Lahou', 'GLA', 1),
(819, 52, 'Guiglo', 'GUI', 1),
(820, 52, 'Issia', 'ISS', 1),
(821, 52, 'Jacqueville', 'JAC', 1),
(822, 52, 'Katiola', 'KAT', 1),
(823, 52, 'Korhogo', 'KOR', 1),
(824, 52, 'Lakota', 'LAK', 1),
(825, 52, 'Man', 'MAN', 1),
(826, 52, 'Mankono', 'MKN', 1),
(827, 52, 'Mbahiakro', 'MBA', 1),
(828, 52, 'Odienne', 'ODI', 1),
(829, 52, 'Oume', 'OUM', 1),
(830, 52, 'Sakassou', 'SAK', 1),
(831, 52, 'San-Pedro', 'SPE', 1),
(832, 52, 'Sassandra', 'SAS', 1),
(833, 52, 'Seguela', 'SEG', 1),
(834, 52, 'Sinfra', 'SIN', 1),
(835, 52, 'Soubre', 'SOU', 1),
(836, 52, 'Tabou', 'TAB', 1),
(837, 52, 'Tanda', 'TAN', 1),
(838, 52, 'Tiebissou', 'TIE', 1),
(839, 52, 'Tingrela', 'TIN', 1),
(840, 52, 'Tiassale', 'TIA', 1),
(841, 52, 'Touba', 'TBA', 1),
(842, 52, 'Toulepleu', 'TLP', 1),
(843, 52, 'Toumodi', 'TMD', 1),
(844, 52, 'Vavoua', 'VAV', 1),
(845, 52, 'Yamoussoukro', 'YAM', 1),
(846, 52, 'Zuenoula', 'ZUE', 1),
(847, 53, 'Bjelovarsko-bilogorska', 'BB', 1),
(848, 53, 'Grad Zagreb', 'GZ', 1),
(849, 53, 'Dubrovačko-neretvanska', 'DN', 1),
(850, 53, 'Istarska', 'IS', 1),
(851, 53, 'Karlovačka', 'KA', 1),
(852, 53, 'Koprivničko-križevačka', 'KK', 1),
(853, 53, 'Krapinsko-zagorska', 'KZ', 1),
(854, 53, 'Ličko-senjska', 'LS', 1),
(855, 53, 'Međimurska', 'ME', 1),
(856, 53, 'Osječko-baranjska', 'OB', 1),
(857, 53, 'Požeško-slavonska', 'PS', 1),
(858, 53, 'Primorsko-goranska', 'PG', 1),
(859, 53, 'Šibensko-kninska', 'SK', 1),
(860, 53, 'Sisačko-moslavačka', 'SM', 1),
(861, 53, 'Brodsko-posavska', 'BP', 1),
(862, 53, 'Splitsko-dalmatinska', 'SD', 1),
(863, 53, 'Varaždinska', 'VA', 1),
(864, 53, 'Virovitičko-podravska', 'VP', 1),
(865, 53, 'Vukovarsko-srijemska', 'VS', 1),
(866, 53, 'Zadarska', 'ZA', 1),
(867, 53, 'Zagrebačka', 'ZG', 1),
(868, 54, 'Camaguey', 'CA', 1),
(869, 54, 'Ciego de Avila', 'CD', 1),
(870, 54, 'Cienfuegos', 'CI', 1),
(871, 54, 'Ciudad de La Habana', 'CH', 1),
(872, 54, 'Granma', 'GR', 1),
(873, 54, 'Guantanamo', 'GU', 1),
(874, 54, 'Holguin', 'HO', 1),
(875, 54, 'Isla de la Juventud', 'IJ', 1),
(876, 54, 'La Habana', 'LH', 1),
(877, 54, 'Las Tunas', 'LT', 1),
(878, 54, 'Matanzas', 'MA', 1),
(879, 54, 'Pinar del Rio', 'PR', 1),
(880, 54, 'Sancti Spiritus', 'SS', 1),
(881, 54, 'Santiago de Cuba', 'SC', 1),
(882, 54, 'Villa Clara', 'VC', 1),
(883, 55, 'Famagusta', 'F', 1),
(884, 55, 'Kyrenia', 'K', 1),
(885, 55, 'Larnaca', 'A', 1),
(886, 55, 'Limassol', 'I', 1),
(887, 55, 'Nicosia', 'N', 1),
(888, 55, 'Paphos', 'P', 1),
(889, 56, 'Ústecký', 'U', 1),
(890, 56, 'Jihočeský', 'C', 1),
(891, 56, 'Jihomoravský', 'B', 1),
(892, 56, 'Karlovarský', 'K', 1),
(893, 56, 'Královehradecký', 'H', 1),
(894, 56, 'Liberecký', 'L', 1),
(895, 56, 'Moravskoslezský', 'T', 1),
(896, 56, 'Olomoucký', 'M', 1),
(897, 56, 'Pardubický', 'E', 1),
(898, 56, 'Plzeňský', 'P', 1),
(899, 56, 'Praha', 'A', 1),
(900, 56, 'Středočeský', 'S', 1),
(901, 56, 'Vysočina', 'J', 1),
(902, 56, 'Zlínský', 'Z', 1),
(903, 57, 'Nordjyland', '81', 1),
(904, 57, 'Midtjylland', '82', 1),
(905, 57, 'Syddanmark', '83', 1),
(906, 57, 'Faroe Islands', 'FO', 1),
(907, 57, 'Hovedstaden', '84', 1),
(908, 57, 'Sjælland', '85', 1),
(919, 58, '\'Ali Sabih', 'S', 1),
(920, 58, 'Dikhil', 'K', 1),
(921, 58, 'Djibouti', 'J', 1),
(922, 58, 'Obock', 'O', 1),
(923, 58, 'Tadjoura', 'T', 1),
(924, 59, 'Saint Andrew Parish', 'AND', 1),
(925, 59, 'Saint David Parish', 'DAV', 1),
(926, 59, 'Saint George Parish', 'GEO', 1),
(927, 59, 'Saint John Parish', 'JOH', 1),
(928, 59, 'Saint Joseph Parish', 'JOS', 1),
(929, 59, 'Saint Luke Parish', 'LUK', 1),
(930, 59, 'Saint Mark Parish', 'MAR', 1),
(931, 59, 'Saint Patrick Parish', 'PAT', 1),
(932, 59, 'Saint Paul Parish', 'PAU', 1),
(933, 59, 'Saint Peter Parish', 'PET', 1),
(934, 60, 'Distrito Nacional', 'DN', 1),
(935, 60, 'Azua', 'AZ', 1),
(936, 60, 'Baoruco', 'BC', 1),
(937, 60, 'Barahona', 'BH', 1),
(938, 60, 'Dajabon', 'DJ', 1),
(939, 60, 'Duarte', 'DU', 1),
(940, 60, 'Elias Pina', 'EL', 1),
(941, 60, 'El Seybo', 'SY', 1),
(942, 60, 'Espaillat', 'ET', 1),
(943, 60, 'Hato Mayor', 'HM', 1),
(944, 60, 'Independencia', 'IN', 1),
(945, 60, 'La Altagracia', 'AL', 1),
(946, 60, 'La Romana', 'RO', 1),
(947, 60, 'La Vega', 'VE', 1),
(948, 60, 'Maria Trinidad Sanchez', 'MT', 1),
(949, 60, 'Monsenor Nouel', 'MN', 1),
(950, 60, 'Monte Cristi', 'MC', 1),
(951, 60, 'Monte Plata', 'MP', 1),
(952, 60, 'Pedernales', 'PD', 1),
(953, 60, 'Peravia (Bani)', 'PR', 1),
(954, 60, 'Puerto Plata', 'PP', 1),
(955, 60, 'Salcedo', 'SL', 1),
(956, 60, 'Samana', 'SM', 1),
(957, 60, 'Sanchez Ramirez', 'SH', 1),
(958, 60, 'San Cristobal', 'SC', 1),
(959, 60, 'San Jose de Ocoa', 'JO', 1),
(960, 60, 'San Juan', 'SJ', 1),
(961, 60, 'San Pedro de Macoris', 'PM', 1),
(962, 60, 'Santiago', 'SA', 1),
(963, 60, 'Santiago Rodriguez', 'ST', 1),
(964, 60, 'Santo Domingo', 'SD', 1),
(965, 60, 'Valverde', 'VA', 1),
(966, 61, 'Aileu', 'AL', 1),
(967, 61, 'Ainaro', 'AN', 1),
(968, 61, 'Baucau', 'BA', 1),
(969, 61, 'Bobonaro', 'BO', 1),
(970, 61, 'Cova Lima', 'CO', 1),
(971, 61, 'Dili', 'DI', 1),
(972, 61, 'Ermera', 'ER', 1),
(973, 61, 'Lautem', 'LA', 1),
(974, 61, 'Liquica', 'LI', 1),
(975, 61, 'Manatuto', 'MT', 1),
(976, 61, 'Manufahi', 'MF', 1),
(977, 61, 'Oecussi', 'OE', 1),
(978, 61, 'Viqueque', 'VI', 1),
(979, 62, 'Azuay', 'AZU', 1),
(980, 62, 'Bolivar', 'BOL', 1),
(981, 62, 'Ca&ntilde;ar', 'CAN', 1),
(982, 62, 'Carchi', 'CAR', 1),
(983, 62, 'Chimborazo', 'CHI', 1),
(984, 62, 'Cotopaxi', 'COT', 1),
(985, 62, 'El Oro', 'EOR', 1),
(986, 62, 'Esmeraldas', 'ESM', 1),
(987, 62, 'Gal&aacute;pagos', 'GPS', 1),
(988, 62, 'Guayas', 'GUA', 1),
(989, 62, 'Imbabura', 'IMB', 1),
(990, 62, 'Loja', 'LOJ', 1),
(991, 62, 'Los Rios', 'LRO', 1),
(992, 62, 'Manab&iacute;', 'MAN', 1),
(993, 62, 'Morona Santiago', 'MSA', 1),
(994, 62, 'Napo', 'NAP', 1),
(995, 62, 'Orellana', 'ORE', 1),
(996, 62, 'Pastaza', 'PAS', 1),
(997, 62, 'Pichincha', 'PIC', 1),
(998, 62, 'Sucumb&iacute;os', 'SUC', 1),
(999, 62, 'Tungurahua', 'TUN', 1),
(1000, 62, 'Zamora Chinchipe', 'ZCH', 1),
(1001, 63, 'Ad Daqahliyah', 'DHY', 1),
(1002, 63, 'Al Bahr al Ahmar', 'BAM', 1),
(1003, 63, 'Al Buhayrah', 'BHY', 1),
(1004, 63, 'Al Fayyum', 'FYM', 1),
(1005, 63, 'Al Gharbiyah', 'GBY', 1),
(1006, 63, 'Al Iskandariyah', 'IDR', 1),
(1007, 63, 'Al Isma\'iliyah', 'IML', 1),
(1008, 63, 'Al Jizah', 'JZH', 1),
(1009, 63, 'Al Minufiyah', 'MFY', 1),
(1010, 63, 'Al Minya', 'MNY', 1),
(1011, 63, 'Al Qahirah', 'QHR', 1),
(1012, 63, 'Al Qalyubiyah', 'QLY', 1),
(1013, 63, 'Al Wadi al Jadid', 'WJD', 1),
(1014, 63, 'Ash Sharqiyah', 'SHQ', 1),
(1015, 63, 'As Suways', 'SWY', 1),
(1016, 63, 'Aswan', 'ASW', 1),
(1017, 63, 'Asyut', 'ASY', 1),
(1018, 63, 'Bani Suwayf', 'BSW', 1),
(1019, 63, 'Bur Sa\'id', 'BSD', 1),
(1020, 63, 'Dumyat', 'DMY', 1),
(1021, 63, 'Janub Sina\'', 'JNS', 1),
(1022, 63, 'Kafr ash Shaykh', 'KSH', 1),
(1023, 63, 'Matruh', 'MAT', 1),
(1024, 63, 'Qina', 'QIN', 1),
(1025, 63, 'Shamal Sina\'', 'SHS', 1),
(1026, 63, 'Suhaj', 'SUH', 1),
(1027, 64, 'Ahuachapan', 'AH', 1),
(1028, 64, 'Cabanas', 'CA', 1),
(1029, 64, 'Chalatenango', 'CH', 1),
(1030, 64, 'Cuscatlan', 'CU', 1),
(1031, 64, 'La Libertad', 'LB', 1),
(1032, 64, 'La Paz', 'PZ', 1),
(1033, 64, 'La Union', 'UN', 1),
(1034, 64, 'Morazan', 'MO', 1),
(1035, 64, 'San Miguel', 'SM', 1),
(1036, 64, 'San Salvador', 'SS', 1),
(1037, 64, 'San Vicente', 'SV', 1),
(1038, 64, 'Santa Ana', 'SA', 1),
(1039, 64, 'Sonsonate', 'SO', 1),
(1040, 64, 'Usulutan', 'US', 1),
(1041, 65, 'Provincia Annobon', 'AN', 1),
(1042, 65, 'Provincia Bioko Norte', 'BN', 1),
(1043, 65, 'Provincia Bioko Sur', 'BS', 1),
(1044, 65, 'Provincia Centro Sur', 'CS', 1),
(1045, 65, 'Provincia Kie-Ntem', 'KN', 1),
(1046, 65, 'Provincia Litoral', 'LI', 1),
(1047, 65, 'Provincia Wele-Nzas', 'WN', 1),
(1048, 66, 'Central (Maekel)', 'MA', 1),
(1049, 66, 'Anseba (Keren)', 'KE', 1),
(1050, 66, 'Southern Red Sea (Debub-Keih-Bahri)', 'DK', 1),
(1051, 66, 'Northern Red Sea (Semien-Keih-Bahri)', 'SK', 1),
(1052, 66, 'Southern (Debub)', 'DE', 1),
(1053, 66, 'Gash-Barka (Barentu)', 'BR', 1),
(1054, 67, 'Harjumaa (Tallinn)', 'HA', 1),
(1055, 67, 'Hiiumaa (Kardla)', 'HI', 1),
(1056, 67, 'Ida-Virumaa (Johvi)', 'IV', 1),
(1057, 67, 'Jarvamaa (Paide)', 'JA', 1),
(1058, 67, 'Jogevamaa (Jogeva)', 'JO', 1),
(1059, 67, 'Laane-Virumaa (Rakvere)', 'LV', 1),
(1060, 67, 'Laanemaa (Haapsalu)', 'LA', 1),
(1061, 67, 'Parnumaa (Parnu)', 'PA', 1),
(1062, 67, 'Polvamaa (Polva)', 'PO', 1),
(1063, 67, 'Raplamaa (Rapla)', 'RA', 1),
(1064, 67, 'Saaremaa (Kuessaare)', 'SA', 1),
(1065, 67, 'Tartumaa (Tartu)', 'TA', 1),
(1066, 67, 'Valgamaa (Valga)', 'VA', 1),
(1067, 67, 'Viljandimaa (Viljandi)', 'VI', 1),
(1068, 67, 'Vorumaa (Voru)', 'VO', 1),
(1069, 68, 'Afar', 'AF', 1),
(1070, 68, 'Amhara', 'AH', 1),
(1071, 68, 'Benishangul-Gumaz', 'BG', 1),
(1072, 68, 'Gambela', 'GB', 1),
(1073, 68, 'Hariai', 'HR', 1),
(1074, 68, 'Oromia', 'OR', 1),
(1075, 68, 'Somali', 'SM', 1),
(1076, 68, 'Southern Nations - Nationalities and Peoples Region', 'SN', 1),
(1077, 68, 'Tigray', 'TG', 1),
(1078, 68, 'Addis Ababa', 'AA', 1),
(1079, 68, 'Dire Dawa', 'DD', 1),
(1080, 71, 'Central Division', 'C', 1),
(1081, 71, 'Northern Division', 'N', 1),
(1082, 71, 'Eastern Division', 'E', 1),
(1083, 71, 'Western Division', 'W', 1),
(1084, 71, 'Rotuma', 'R', 1),
(1085, 72, 'Ahvenanmaan lääni', 'AL', 1),
(1086, 72, 'Etelä-Suomen lääni', 'ES', 1),
(1087, 72, 'Itä-Suomen lääni', 'IS', 1),
(1088, 72, 'Länsi-Suomen lääni', 'LS', 1),
(1089, 72, 'Lapin lääni', 'LA', 1),
(1090, 72, 'Oulun lääni', 'OU', 1),
(1114, 74, 'Ain', '01', 1),
(1115, 74, 'Aisne', '02', 1),
(1116, 74, 'Allier', '03', 1),
(1117, 74, 'Alpes de Haute Provence', '04', 1),
(1118, 74, 'Hautes-Alpes', '05', 1),
(1119, 74, 'Alpes Maritimes', '06', 1),
(1120, 74, 'Ard&egrave;che', '07', 1),
(1121, 74, 'Ardennes', '08', 1),
(1122, 74, 'Ari&egrave;ge', '09', 1),
(1123, 74, 'Aube', '10', 1),
(1124, 74, 'Aude', '11', 1),
(1125, 74, 'Aveyron', '12', 1),
(1126, 74, 'Bouches du Rh&ocirc;ne', '13', 1),
(1127, 74, 'Calvados', '14', 1),
(1128, 74, 'Cantal', '15', 1),
(1129, 74, 'Charente', '16', 1),
(1130, 74, 'Charente Maritime', '17', 1),
(1131, 74, 'Cher', '18', 1),
(1132, 74, 'Corr&egrave;ze', '19', 1),
(1133, 74, 'Corse du Sud', '2A', 1),
(1134, 74, 'Haute Corse', '2B', 1),
(1135, 74, 'C&ocirc;te d&#039;or', '21', 1),
(1136, 74, 'C&ocirc;tes d&#039;Armor', '22', 1),
(1137, 74, 'Creuse', '23', 1),
(1138, 74, 'Dordogne', '24', 1),
(1139, 74, 'Doubs', '25', 1),
(1140, 74, 'Dr&ocirc;me', '26', 1),
(1141, 74, 'Eure', '27', 1),
(1142, 74, 'Eure et Loir', '28', 1),
(1143, 74, 'Finist&egrave;re', '29', 1),
(1144, 74, 'Gard', '30', 1),
(1145, 74, 'Haute Garonne', '31', 1),
(1146, 74, 'Gers', '32', 1),
(1147, 74, 'Gironde', '33', 1),
(1148, 74, 'H&eacute;rault', '34', 1),
(1149, 74, 'Ille et Vilaine', '35', 1),
(1150, 74, 'Indre', '36', 1),
(1151, 74, 'Indre et Loire', '37', 1),
(1152, 74, 'Is&eacute;re', '38', 1),
(1153, 74, 'Jura', '39', 1),
(1154, 74, 'Landes', '40', 1),
(1155, 74, 'Loir et Cher', '41', 1),
(1156, 74, 'Loire', '42', 1),
(1157, 74, 'Haute Loire', '43', 1),
(1158, 74, 'Loire Atlantique', '44', 1),
(1159, 74, 'Loiret', '45', 1),
(1160, 74, 'Lot', '46', 1),
(1161, 74, 'Lot et Garonne', '47', 1),
(1162, 74, 'Loz&egrave;re', '48', 1),
(1163, 74, 'Maine et Loire', '49', 1),
(1164, 74, 'Manche', '50', 1),
(1165, 74, 'Marne', '51', 1),
(1166, 74, 'Haute Marne', '52', 1),
(1167, 74, 'Mayenne', '53', 1),
(1168, 74, 'Meurthe et Moselle', '54', 1),
(1169, 74, 'Meuse', '55', 1),
(1170, 74, 'Morbihan', '56', 1),
(1171, 74, 'Moselle', '57', 1),
(1172, 74, 'Ni&egrave;vre', '58', 1),
(1173, 74, 'Nord', '59', 1),
(1174, 74, 'Oise', '60', 1),
(1175, 74, 'Orne', '61', 1),
(1176, 74, 'Pas de Calais', '62', 1),
(1177, 74, 'Puy de D&ocirc;me', '63', 1),
(1178, 74, 'Pyr&eacute;n&eacute;es Atlantiques', '64', 1),
(1179, 74, 'Hautes Pyr&eacute;n&eacute;es', '65', 1),
(1180, 74, 'Pyr&eacute;n&eacute;es Orientales', '66', 1),
(1181, 74, 'Bas Rhin', '67', 1),
(1182, 74, 'Haut Rhin', '68', 1),
(1183, 74, 'Rh&ocirc;ne', '69', 1),
(1184, 74, 'Haute Sa&ocirc;ne', '70', 1),
(1185, 74, 'Sa&ocirc;ne et Loire', '71', 1),
(1186, 74, 'Sarthe', '72', 1),
(1187, 74, 'Savoie', '73', 1),
(1188, 74, 'Haute Savoie', '74', 1),
(1189, 74, 'Paris', '75', 1),
(1190, 74, 'Seine Maritime', '76', 1),
(1191, 74, 'Seine et Marne', '77', 1),
(1192, 74, 'Yvelines', '78', 1),
(1193, 74, 'Deux S&egrave;vres', '79', 1),
(1194, 74, 'Somme', '80', 1),
(1195, 74, 'Tarn', '81', 1),
(1196, 74, 'Tarn et Garonne', '82', 1),
(1197, 74, 'Var', '83', 1),
(1198, 74, 'Vaucluse', '84', 1),
(1199, 74, 'Vend&eacute;e', '85', 1),
(1200, 74, 'Vienne', '86', 1),
(1201, 74, 'Haute Vienne', '87', 1),
(1202, 74, 'Vosges', '88', 1),
(1203, 74, 'Yonne', '89', 1),
(1204, 74, 'Territoire de Belfort', '90', 1),
(1205, 74, 'Essonne', '91', 1),
(1206, 74, 'Hauts de Seine', '92', 1),
(1207, 74, 'Seine St-Denis', '93', 1),
(1208, 74, 'Val de Marne', '94', 1),
(1209, 74, 'Val d\'Oise', '95', 1),
(1210, 76, 'Archipel des Marquises', 'M', 1),
(1211, 76, 'Archipel des Tuamotu', 'T', 1),
(1212, 76, 'Archipel des Tubuai', 'I', 1),
(1213, 76, 'Iles du Vent', 'V', 1),
(1214, 76, 'Iles Sous-le-Vent', 'S', 1),
(1215, 77, 'Iles Crozet', 'C', 1),
(1216, 77, 'Iles Kerguelen', 'K', 1),
(1217, 77, 'Ile Amsterdam', 'A', 1),
(1218, 77, 'Ile Saint-Paul', 'P', 1),
(1219, 77, 'Adelie Land', 'D', 1),
(1220, 78, 'Estuaire', 'ES', 1),
(1221, 78, 'Haut-Ogooue', 'HO', 1),
(1222, 78, 'Moyen-Ogooue', 'MO', 1),
(1223, 78, 'Ngounie', 'NG', 1),
(1224, 78, 'Nyanga', 'NY', 1),
(1225, 78, 'Ogooue-Ivindo', 'OI', 1),
(1226, 78, 'Ogooue-Lolo', 'OL', 1),
(1227, 78, 'Ogooue-Maritime', 'OM', 1),
(1228, 78, 'Woleu-Ntem', 'WN', 1),
(1229, 79, 'Banjul', 'BJ', 1),
(1230, 79, 'Basse', 'BS', 1),
(1231, 79, 'Brikama', 'BR', 1),
(1232, 79, 'Janjangbure', 'JA', 1),
(1233, 79, 'Kanifeng', 'KA', 1),
(1234, 79, 'Kerewan', 'KE', 1),
(1235, 79, 'Kuntaur', 'KU', 1),
(1236, 79, 'Mansakonko', 'MA', 1),
(1237, 79, 'Lower River', 'LR', 1),
(1238, 79, 'Central River', 'CR', 1),
(1239, 79, 'North Bank', 'NB', 1),
(1240, 79, 'Upper River', 'UR', 1),
(1241, 79, 'Western', 'WE', 1),
(1242, 80, 'Abkhazia', 'AB', 1),
(1243, 80, 'Ajaria', 'AJ', 1),
(1244, 80, 'Tbilisi', 'TB', 1),
(1245, 80, 'Guria', 'GU', 1),
(1246, 80, 'Imereti', 'IM', 1),
(1247, 80, 'Kakheti', 'KA', 1),
(1248, 80, 'Kvemo Kartli', 'KK', 1),
(1249, 80, 'Mtskheta-Mtianeti', 'MM', 1),
(1250, 80, 'Racha Lechkhumi and Kvemo Svanet', 'RL', 1),
(1251, 80, 'Samegrelo-Zemo Svaneti', 'SZ', 1),
(1252, 80, 'Samtskhe-Javakheti', 'SJ', 1),
(1253, 80, 'Shida Kartli', 'SK', 1),
(1254, 81, 'Baden-Württemberg', 'BW', 1),
(1255, 81, 'Bayern', 'BY', 1),
(1256, 81, 'Berlin', 'BE', 1),
(1257, 81, 'Brandenburg', 'BB', 1),
(1258, 81, 'Bremen', 'HB', 1),
(1259, 81, 'Hamburg', 'HH', 1),
(1260, 81, 'Hessen', 'HE', 1),
(1261, 81, 'Mecklenburg-Vorpommern', 'MV', 1),
(1262, 81, 'Niedersachsen', 'NI', 1),
(1263, 81, 'Nordrhein-Westfalen', 'NW', 1),
(1264, 81, 'Rheinland-Pfalz', 'RP', 1),
(1265, 81, 'Saarland', 'SL', 1),
(1266, 81, 'Sachsen', 'SN', 1),
(1267, 81, 'Sachsen-Anhalt', 'ST', 1),
(1268, 81, 'Schleswig-Holstein', 'SH', 1),
(1269, 81, 'Thüringen', 'TH', 1),
(1270, 82, 'Ashanti Region', 'AS', 1),
(1271, 82, 'Brong-Ahafo Region', 'BA', 1),
(1272, 82, 'Central Region', 'CE', 1),
(1273, 82, 'Eastern Region', 'EA', 1),
(1274, 82, 'Greater Accra Region', 'GA', 1),
(1275, 82, 'Northern Region', 'NO', 1),
(1276, 82, 'Upper East Region', 'UE', 1),
(1277, 82, 'Upper West Region', 'UW', 1),
(1278, 82, 'Volta Region', 'VO', 1),
(1279, 82, 'Western Region', 'WE', 1),
(1280, 84, 'Attica', 'AT', 1),
(1281, 84, 'Central Greece', 'CN', 1),
(1282, 84, 'Central Macedonia', 'CM', 1),
(1283, 84, 'Crete', 'CR', 1),
(1284, 84, 'East Macedonia and Thrace', 'EM', 1),
(1285, 84, 'Epirus', 'EP', 1),
(1286, 84, 'Ionian Islands', 'II', 1),
(1287, 84, 'North Aegean', 'NA', 1),
(1288, 84, 'Peloponnesos', 'PP', 1),
(1289, 84, 'South Aegean', 'SA', 1),
(1290, 84, 'Thessaly', 'TH', 1),
(1291, 84, 'West Greece', 'WG', 1),
(1292, 84, 'West Macedonia', 'WM', 1),
(1293, 85, 'Avannaa', 'A', 1),
(1294, 85, 'Tunu', 'T', 1),
(1295, 85, 'Kitaa', 'K', 1),
(1296, 86, 'Saint Andrew', 'A', 1),
(1297, 86, 'Saint David', 'D', 1),
(1298, 86, 'Saint George', 'G', 1),
(1299, 86, 'Saint John', 'J', 1),
(1300, 86, 'Saint Mark', 'M', 1),
(1301, 86, 'Saint Patrick', 'P', 1),
(1302, 86, 'Carriacou', 'C', 1),
(1303, 86, 'Petit Martinique', 'Q', 1),
(1304, 89, 'Alta Verapaz', 'AV', 1),
(1305, 89, 'Baja Verapaz', 'BV', 1),
(1306, 89, 'Chimaltenango', 'CM', 1),
(1307, 89, 'Chiquimula', 'CQ', 1),
(1308, 89, 'El Peten', 'PE', 1),
(1309, 89, 'El Progreso', 'PR', 1),
(1310, 89, 'El Quiche', 'QC', 1),
(1311, 89, 'Escuintla', 'ES', 1),
(1312, 89, 'Guatemala', 'GU', 1),
(1313, 89, 'Huehuetenango', 'HU', 1),
(1314, 89, 'Izabal', 'IZ', 1),
(1315, 89, 'Jalapa', 'JA', 1),
(1316, 89, 'Jutiapa', 'JU', 1),
(1317, 89, 'Quetzaltenango', 'QZ', 1),
(1318, 89, 'Retalhuleu', 'RE', 1),
(1319, 89, 'Sacatepequez', 'ST', 1),
(1320, 89, 'San Marcos', 'SM', 1),
(1321, 89, 'Santa Rosa', 'SR', 1),
(1322, 89, 'Solola', 'SO', 1),
(1323, 89, 'Suchitepequez', 'SU', 1),
(1324, 89, 'Totonicapan', 'TO', 1),
(1325, 89, 'Zacapa', 'ZA', 1),
(1326, 90, 'Conakry', 'CNK', 1),
(1327, 90, 'Beyla', 'BYL', 1),
(1328, 90, 'Boffa', 'BFA', 1),
(1329, 90, 'Boke', 'BOK', 1),
(1330, 90, 'Coyah', 'COY', 1),
(1331, 90, 'Dabola', 'DBL', 1),
(1332, 90, 'Dalaba', 'DLB', 1),
(1333, 90, 'Dinguiraye', 'DGR', 1),
(1334, 90, 'Dubreka', 'DBR', 1),
(1335, 90, 'Faranah', 'FRN', 1),
(1336, 90, 'Forecariah', 'FRC', 1),
(1337, 90, 'Fria', 'FRI', 1),
(1338, 90, 'Gaoual', 'GAO', 1),
(1339, 90, 'Gueckedou', 'GCD', 1),
(1340, 90, 'Kankan', 'KNK', 1),
(1341, 90, 'Kerouane', 'KRN', 1),
(1342, 90, 'Kindia', 'KND', 1),
(1343, 90, 'Kissidougou', 'KSD', 1),
(1344, 90, 'Koubia', 'KBA', 1),
(1345, 90, 'Koundara', 'KDA', 1),
(1346, 90, 'Kouroussa', 'KRA', 1),
(1347, 90, 'Labe', 'LAB', 1),
(1348, 90, 'Lelouma', 'LLM', 1),
(1349, 90, 'Lola', 'LOL', 1),
(1350, 90, 'Macenta', 'MCT', 1),
(1351, 90, 'Mali', 'MAL', 1),
(1352, 90, 'Mamou', 'MAM', 1),
(1353, 90, 'Mandiana', 'MAN', 1),
(1354, 90, 'Nzerekore', 'NZR', 1),
(1355, 90, 'Pita', 'PIT', 1),
(1356, 90, 'Siguiri', 'SIG', 1),
(1357, 90, 'Telimele', 'TLM', 1),
(1358, 90, 'Tougue', 'TOG', 1),
(1359, 90, 'Yomou', 'YOM', 1),
(1360, 91, 'Bafata Region', 'BF', 1),
(1361, 91, 'Biombo Region', 'BB', 1),
(1362, 91, 'Bissau Region', 'BS', 1),
(1363, 91, 'Bolama Region', 'BL', 1),
(1364, 91, 'Cacheu Region', 'CA', 1),
(1365, 91, 'Gabu Region', 'GA', 1),
(1366, 91, 'Oio Region', 'OI', 1),
(1367, 91, 'Quinara Region', 'QU', 1),
(1368, 91, 'Tombali Region', 'TO', 1),
(1369, 92, 'Barima-Waini', 'BW', 1),
(1370, 92, 'Cuyuni-Mazaruni', 'CM', 1),
(1371, 92, 'Demerara-Mahaica', 'DM', 1),
(1372, 92, 'East Berbice-Corentyne', 'EC', 1),
(1373, 92, 'Essequibo Islands-West Demerara', 'EW', 1),
(1374, 92, 'Mahaica-Berbice', 'MB', 1),
(1375, 92, 'Pomeroon-Supenaam', 'PM', 1),
(1376, 92, 'Potaro-Siparuni', 'PI', 1),
(1377, 92, 'Upper Demerara-Berbice', 'UD', 1),
(1378, 92, 'Upper Takutu-Upper Essequibo', 'UT', 1),
(1379, 93, 'Artibonite', 'AR', 1),
(1380, 93, 'Centre', 'CE', 1),
(1381, 93, 'Grand\'Anse', 'GA', 1),
(1382, 93, 'Nord', 'ND', 1),
(1383, 93, 'Nord-Est', 'NE', 1),
(1384, 93, 'Nord-Ouest', 'NO', 1),
(1385, 93, 'Ouest', 'OU', 1),
(1386, 93, 'Sud', 'SD', 1),
(1387, 93, 'Sud-Est', 'SE', 1),
(1388, 94, 'Flat Island', 'F', 1),
(1389, 94, 'McDonald Island', 'M', 1),
(1390, 94, 'Shag Island', 'S', 1),
(1391, 94, 'Heard Island', 'H', 1),
(1392, 95, 'Atlantida', 'AT', 1),
(1393, 95, 'Choluteca', 'CH', 1),
(1394, 95, 'Colon', 'CL', 1),
(1395, 95, 'Comayagua', 'CM', 1),
(1396, 95, 'Copan', 'CP', 1),
(1397, 95, 'Cortes', 'CR', 1),
(1398, 95, 'El Paraiso', 'PA', 1),
(1399, 95, 'Francisco Morazan', 'FM', 1),
(1400, 95, 'Gracias a Dios', 'GD', 1),
(1401, 95, 'Intibuca', 'IN', 1),
(1402, 95, 'Islas de la Bahia (Bay Islands)', 'IB', 1),
(1403, 95, 'La Paz', 'PZ', 1),
(1404, 95, 'Lempira', 'LE', 1),
(1405, 95, 'Ocotepeque', 'OC', 1),
(1406, 95, 'Olancho', 'OL', 1),
(1407, 95, 'Santa Barbara', 'SB', 1),
(1408, 95, 'Valle', 'VA', 1),
(1409, 95, 'Yoro', 'YO', 1),
(1410, 96, 'Central and Western Hong Kong Island', 'HCW', 1),
(1411, 96, 'Eastern Hong Kong Island', 'HEA', 1),
(1412, 96, 'Southern Hong Kong Island', 'HSO', 1),
(1413, 96, 'Wan Chai Hong Kong Island', 'HWC', 1),
(1414, 96, 'Kowloon City Kowloon', 'KKC', 1),
(1415, 96, 'Kwun Tong Kowloon', 'KKT', 1),
(1416, 96, 'Sham Shui Po Kowloon', 'KSS', 1),
(1417, 96, 'Wong Tai Sin Kowloon', 'KWT', 1),
(1418, 96, 'Yau Tsim Mong Kowloon', 'KYT', 1),
(1419, 96, 'Islands New Territories', 'NIS', 1),
(1420, 96, 'Kwai Tsing New Territories', 'NKT', 1),
(1421, 96, 'North New Territories', 'NNO', 1),
(1422, 96, 'Sai Kung New Territories', 'NSK', 1),
(1423, 96, 'Sha Tin New Territories', 'NST', 1),
(1424, 96, 'Tai Po New Territories', 'NTP', 1),
(1425, 96, 'Tsuen Wan New Territories', 'NTW', 1),
(1426, 96, 'Tuen Mun New Territories', 'NTM', 1),
(1427, 96, 'Yuen Long New Territories', 'NYL', 1),
(1467, 98, 'Austurland', 'AL', 1),
(1468, 98, 'Hofuoborgarsvaeoi', 'HF', 1),
(1469, 98, 'Norourland eystra', 'NE', 1),
(1470, 98, 'Norourland vestra', 'NV', 1),
(1471, 98, 'Suourland', 'SL', 1),
(1472, 98, 'Suournes', 'SN', 1),
(1473, 98, 'Vestfiroir', 'VF', 1),
(1474, 98, 'Vesturland', 'VL', 1),
(1475, 99, 'Andaman and Nicobar Islands', 'AN', 1),
(1476, 99, 'Andhra Pradesh', 'AP', 1),
(1477, 99, 'Arunachal Pradesh', 'AR', 1),
(1478, 99, 'Assam', 'AS', 1),
(1479, 99, 'Bihar', 'BR', 1),
(1480, 99, 'Chandigarh', 'CH', 1),
(1481, 99, 'Dadra and Nagar Haveli and Davan and Diu', 'DH', 1),
(1483, 99, 'Delhi', 'DL', 1),
(1484, 99, 'Goa', 'GA', 1),
(1485, 99, 'Gujarat', 'GJ', 1),
(1486, 99, 'Haryana', 'HR', 1),
(1487, 99, 'Himachal Pradesh', 'HP', 1),
(1488, 99, 'Jammu and Kashmir', 'JK', 1),
(1489, 99, 'Karnataka', 'KA', 1),
(1490, 99, 'Kerala', 'KL', 1),
(1491, 99, 'Lakshadweep', 'LD', 1),
(1492, 99, 'Madhya Pradesh', 'MP', 1),
(1493, 99, 'Maharashtra', 'MH', 1),
(1494, 99, 'Manipur', 'MN', 1),
(1495, 99, 'Meghalaya', 'ML', 1),
(1496, 99, 'Mizoram', 'MZ', 1),
(1497, 99, 'Nagaland', 'NL', 1),
(1498, 99, 'Odisha', 'OR', 1),
(1499, 99, 'Puducherry', 'PY', 1),
(1500, 99, 'Punjab', 'PB', 1),
(1501, 99, 'Rajasthan', 'RJ', 1),
(1502, 99, 'Sikkim', 'SK', 1),
(1503, 99, 'Tamil Nadu', 'TN', 1),
(1504, 99, 'Tripura', 'TR', 1),
(1505, 99, 'Uttar Pradesh', 'UP', 1),
(1506, 99, 'West Bengal', 'WB', 1),
(1507, 100, 'Aceh', 'AC', 1),
(1508, 100, 'Bali', 'BA', 1),
(1509, 100, 'Banten', 'BT', 1),
(1510, 100, 'Bengkulu', 'BE', 1),
(1511, 100, 'Kalimantan Utara', 'BD', 1),
(1512, 100, 'Gorontalo', 'GO', 1),
(1513, 100, 'Jakarta', 'JK', 1),
(1514, 100, 'Jambi', 'JA', 1),
(1515, 100, 'Jawa Barat', 'JB', 1),
(1516, 100, 'Jawa Tengah', 'JT', 1),
(1517, 100, 'Jawa Timur', 'JI', 1),
(1518, 100, 'Kalimantan Barat', 'KB', 1),
(1519, 100, 'Kalimantan Selatan', 'KS', 1),
(1520, 100, 'Kalimantan Tengah', 'KT', 1),
(1521, 100, 'Kalimantan Timur', 'KI', 1),
(1522, 100, 'Kepulauan Bangka Belitung', 'BB', 1),
(1523, 100, 'Lampung', 'LA', 1),
(1524, 100, 'Maluku', 'MA', 1),
(1525, 100, 'Maluku Utara', 'MU', 1),
(1526, 100, 'Nusa Tenggara Barat', 'NB', 1),
(1527, 100, 'Nusa Tenggara Timur', 'NT', 1),
(1528, 100, 'Papua', 'PA', 1),
(1529, 100, 'Riau', 'RI', 1),
(1530, 100, 'Sulawesi Selatan', 'SN', 1),
(1531, 100, 'Sulawesi Tengah', 'ST', 1),
(1532, 100, 'Sulawesi Tenggara', 'SG', 1),
(1533, 100, 'Sulawesi Utara', 'SA', 1),
(1534, 100, 'Sumatera Barat', 'SB', 1),
(1535, 100, 'Sumatera Selatan', 'SS', 1),
(1536, 100, 'Sumatera Utara', 'SU', 1),
(1537, 100, 'Yogyakarta', 'YO', 1),
(1538, 101, 'Tehran', 'TEH', 1),
(1539, 101, 'Qom', 'QOM', 1),
(1540, 101, 'Markazi', 'MKZ', 1),
(1541, 101, 'Qazvin', 'QAZ', 1),
(1542, 101, 'Gilan', 'GIL', 1),
(1543, 101, 'Ardabil', 'ARD', 1),
(1544, 101, 'Zanjan', 'ZAN', 1),
(1545, 101, 'East Azarbaijan', 'EAZ', 1),
(1546, 101, 'West Azarbaijan', 'WEZ', 1),
(1547, 101, 'Kurdistan', 'KRD', 1),
(1548, 101, 'Hamadan', 'HMD', 1),
(1549, 101, 'Kermanshah', 'KRM', 1),
(1550, 101, 'Ilam', 'ILM', 1),
(1551, 101, 'Lorestan', 'LRS', 1),
(1552, 101, 'Khuzestan', 'KZT', 1),
(1553, 101, 'Chahar Mahaal and Bakhtiari', 'CMB', 1),
(1554, 101, 'Kohkiluyeh and Buyer Ahmad', 'KBA', 1),
(1555, 101, 'Bushehr', 'BSH', 1),
(1556, 101, 'Fars', 'FAR', 1),
(1557, 101, 'Hormozgan', 'HRM', 1),
(1558, 101, 'Sistan and Baluchistan', 'SBL', 1),
(1559, 101, 'Kerman', 'KRB', 1),
(1560, 101, 'Yazd', 'YZD', 1),
(1561, 101, 'Esfahan', 'EFH', 1),
(1562, 101, 'Semnan', 'SMN', 1),
(1563, 101, 'Mazandaran', 'MZD', 1),
(1564, 101, 'Golestan', 'GLS', 1),
(1565, 101, 'North Khorasan', 'NKH', 1),
(1566, 101, 'Razavi Khorasan', 'RKH', 1),
(1567, 101, 'South Khorasan', 'SKH', 1),
(1568, 102, 'Baghdad', 'BD', 1),
(1569, 102, 'Salah ad Din', 'SD', 1),
(1570, 102, 'Diyala', 'DY', 1),
(1571, 102, 'Wasit', 'WS', 1),
(1572, 102, 'Maysan', 'MY', 1),
(1573, 102, 'Al Basrah', 'BA', 1),
(1574, 102, 'Dhi Qar', 'DQ', 1),
(1575, 102, 'Al Muthanna', 'MU', 1),
(1576, 102, 'Al Qadisyah', 'QA', 1),
(1577, 102, 'Babil', 'BB', 1),
(1578, 102, 'Al Karbala', 'KB', 1),
(1579, 102, 'An Najaf', 'NJ', 1),
(1580, 102, 'Al Anbar', 'AB', 1),
(1581, 102, 'Ninawa', 'NN', 1),
(1582, 102, 'Dahuk', 'DH', 1),
(1583, 102, 'Arbil', 'AL', 1),
(1584, 102, 'Kirkuk', 'KI', 1),
(1585, 102, 'As Sulaymaniyah', 'SL', 1),
(1586, 103, 'Carlow', 'CA', 1),
(1587, 103, 'Cavan', 'CV', 1),
(1588, 103, 'Clare', 'CL', 1),
(1589, 103, 'Cork', 'CO', 1),
(1590, 103, 'Donegal', 'DO', 1),
(1591, 103, 'Dublin', 'DU', 1),
(1592, 103, 'Galway', 'GA', 1),
(1593, 103, 'Kerry', 'KE', 1),
(1594, 103, 'Kildare', 'KI', 1),
(1595, 103, 'Kilkenny', 'KL', 1),
(1596, 103, 'Laois', 'LA', 1),
(1597, 103, 'Leitrim', 'LE', 1),
(1598, 103, 'Limerick', 'LI', 1),
(1599, 103, 'Longford', 'LO', 1),
(1600, 103, 'Louth', 'LU', 1),
(1601, 103, 'Mayo', 'MA', 1),
(1602, 103, 'Meath', 'ME', 1),
(1603, 103, 'Monaghan', 'MO', 1),
(1604, 103, 'Offaly', 'OF', 1),
(1605, 103, 'Roscommon', 'RO', 1),
(1606, 103, 'Sligo', 'SL', 1),
(1607, 103, 'Tipperary', 'TI', 1),
(1608, 103, 'Waterford', 'WA', 1),
(1609, 103, 'Westmeath', 'WE', 1),
(1610, 103, 'Wexford', 'WX', 1),
(1611, 103, 'Wicklow', 'WI', 1);
INSERT INTO `ve_zone` (`zone_id`, `country_id`, `name`, `code`, `status`) VALUES
(1612, 104, 'Be\'er Sheva', 'BS', 1),
(1613, 104, 'Bika\'at Hayarden', 'BH', 1),
(1614, 104, 'Eilat and Arava', 'EA', 1),
(1615, 104, 'Galil', 'GA', 1),
(1616, 104, 'Haifa', 'HA', 1),
(1617, 104, 'Jehuda Mountains', 'JM', 1),
(1618, 104, 'Jerusalem', 'JE', 1),
(1619, 104, 'Negev', 'NE', 1),
(1620, 104, 'Semaria', 'SE', 1),
(1621, 104, 'Sharon', 'SH', 1),
(1622, 104, 'Tel Aviv (Gosh Dan)', 'TA', 1),
(1643, 106, 'Clarendon Parish', 'CLA', 1),
(1644, 106, 'Hanover Parish', 'HAN', 1),
(1645, 106, 'Kingston Parish', 'KIN', 1),
(1646, 106, 'Manchester Parish', 'MAN', 1),
(1647, 106, 'Portland Parish', 'POR', 1),
(1648, 106, 'Saint Andrew Parish', 'AND', 1),
(1649, 106, 'Saint Ann Parish', 'ANN', 1),
(1650, 106, 'Saint Catherine Parish', 'CAT', 1),
(1651, 106, 'Saint Elizabeth Parish', 'ELI', 1),
(1652, 106, 'Saint James Parish', 'JAM', 1),
(1653, 106, 'Saint Mary Parish', 'MAR', 1),
(1654, 106, 'Saint Thomas Parish', 'THO', 1),
(1655, 106, 'Trelawny Parish', 'TRL', 1),
(1656, 106, 'Westmoreland Parish', 'WML', 1),
(1657, 107, 'Aichi', 'AI', 1),
(1658, 107, 'Akita', 'AK', 1),
(1659, 107, 'Aomori', 'AO', 1),
(1660, 107, 'Chiba', 'CH', 1),
(1661, 107, 'Ehime', 'EH', 1),
(1662, 107, 'Fukui', 'FK', 1),
(1663, 107, 'Fukuoka', 'FU', 1),
(1664, 107, 'Fukushima', 'FS', 1),
(1665, 107, 'Gifu', 'GI', 1),
(1666, 107, 'Gumma', 'GU', 1),
(1667, 107, 'Hiroshima', 'HI', 1),
(1668, 107, 'Hokkaido', 'HO', 1),
(1669, 107, 'Hyogo', 'HY', 1),
(1670, 107, 'Ibaraki', 'IB', 1),
(1671, 107, 'Ishikawa', 'IS', 1),
(1672, 107, 'Iwate', 'IW', 1),
(1673, 107, 'Kagawa', 'KA', 1),
(1674, 107, 'Kagoshima', 'KG', 1),
(1675, 107, 'Kanagawa', 'KN', 1),
(1676, 107, 'Kochi', 'KO', 1),
(1677, 107, 'Kumamoto', 'KU', 1),
(1678, 107, 'Kyoto', 'KY', 1),
(1679, 107, 'Mie', 'MI', 1),
(1680, 107, 'Miyagi', 'MY', 1),
(1681, 107, 'Miyazaki', 'MZ', 1),
(1682, 107, 'Nagano', 'NA', 1),
(1683, 107, 'Nagasaki', 'NG', 1),
(1684, 107, 'Nara', 'NR', 1),
(1685, 107, 'Niigata', 'NI', 1),
(1686, 107, 'Oita', 'OI', 1),
(1687, 107, 'Okayama', 'OK', 1),
(1688, 107, 'Okinawa', 'ON', 1),
(1689, 107, 'Osaka', 'OS', 1),
(1690, 107, 'Saga', 'SA', 1),
(1691, 107, 'Saitama', 'SI', 1),
(1692, 107, 'Shiga', 'SH', 1),
(1693, 107, 'Shimane', 'SM', 1),
(1694, 107, 'Shizuoka', 'SZ', 1),
(1695, 107, 'Tochigi', 'TO', 1),
(1696, 107, 'Tokushima', 'TS', 1),
(1697, 107, 'Tokyo', 'TK', 1),
(1698, 107, 'Tottori', 'TT', 1),
(1699, 107, 'Toyama', 'TY', 1),
(1700, 107, 'Wakayama', 'WA', 1),
(1701, 107, 'Yamagata', 'YA', 1),
(1702, 107, 'Yamaguchi', 'YM', 1),
(1703, 107, 'Yamanashi', 'YN', 1),
(1704, 108, '\'Amman', 'AM', 1),
(1705, 108, 'Ajlun', 'AJ', 1),
(1706, 108, 'Al \'Aqabah', 'AA', 1),
(1707, 108, 'Al Balqa\'', 'AB', 1),
(1708, 108, 'Al Karak', 'AK', 1),
(1709, 108, 'Al Mafraq', 'AL', 1),
(1710, 108, 'At Tafilah', 'AT', 1),
(1711, 108, 'Az Zarqa\'', 'AZ', 1),
(1712, 108, 'Irbid', 'IR', 1),
(1713, 108, 'Jarash', 'JA', 1),
(1714, 108, 'Ma\'an', 'MA', 1),
(1715, 108, 'Madaba', 'MD', 1),
(1716, 109, 'Almaty', 'AL', 1),
(1717, 109, 'Almaty City', 'AC', 1),
(1718, 109, 'Aqmola', 'AM', 1),
(1719, 109, 'Aqtobe', 'AQ', 1),
(1720, 109, 'Astana City', 'AS', 1),
(1721, 109, 'Atyrau', 'AT', 1),
(1722, 109, 'Batys Qazaqstan', 'BA', 1),
(1723, 109, 'Bayqongyr City', 'BY', 1),
(1724, 109, 'Mangghystau', 'MA', 1),
(1725, 109, 'Ongtustik Qazaqstan', 'ON', 1),
(1726, 109, 'Pavlodar', 'PA', 1),
(1727, 109, 'Qaraghandy', 'QA', 1),
(1728, 109, 'Qostanay', 'QO', 1),
(1729, 109, 'Qyzylorda', 'QY', 1),
(1730, 109, 'Shyghys Qazaqstan', 'SH', 1),
(1731, 109, 'Soltustik Qazaqstan', 'SO', 1),
(1732, 109, 'Zhambyl', 'ZH', 1),
(1733, 110, 'Central', 'CE', 1),
(1734, 110, 'Coast', 'CO', 1),
(1735, 110, 'Eastern', 'EA', 1),
(1736, 110, 'Nairobi Area', 'NA', 1),
(1737, 110, 'North Eastern', 'NE', 1),
(1738, 110, 'Nyanza', 'NY', 1),
(1739, 110, 'Rift Valley', 'RV', 1),
(1740, 110, 'Western', 'WE', 1),
(1741, 111, 'Abaiang', 'AG', 1),
(1742, 111, 'Abemama', 'AM', 1),
(1743, 111, 'Aranuka', 'AK', 1),
(1744, 111, 'Arorae', 'AO', 1),
(1745, 111, 'Banaba', 'BA', 1),
(1746, 111, 'Beru', 'BE', 1),
(1747, 111, 'Butaritari', 'bT', 1),
(1748, 111, 'Kanton', 'KA', 1),
(1749, 111, 'Kiritimati', 'KR', 1),
(1750, 111, 'Kuria', 'KU', 1),
(1751, 111, 'Maiana', 'MI', 1),
(1752, 111, 'Makin', 'MN', 1),
(1753, 111, 'Marakei', 'ME', 1),
(1754, 111, 'Nikunau', 'NI', 1),
(1755, 111, 'Nonouti', 'NO', 1),
(1756, 111, 'Onotoa', 'ON', 1),
(1757, 111, 'Tabiteuea', 'TT', 1),
(1758, 111, 'Tabuaeran', 'TR', 1),
(1759, 111, 'Tamana', 'TM', 1),
(1760, 111, 'Tarawa', 'TW', 1),
(1761, 111, 'Teraina', 'TE', 1),
(1762, 112, 'Chagang-do', 'CHA', 1),
(1763, 112, 'Hamgyong-bukto', 'HAB', 1),
(1764, 112, 'Hamgyong-namdo', 'HAN', 1),
(1765, 112, 'Hwanghae-bukto', 'HWB', 1),
(1766, 112, 'Hwanghae-namdo', 'HWN', 1),
(1767, 112, 'Kangwon-do', 'KAN', 1),
(1768, 112, 'P\'yongan-bukto', 'PYB', 1),
(1769, 112, 'P\'yongan-namdo', 'PYN', 1),
(1770, 112, 'Ryanggang-do (Yanggang-do)', 'YAN', 1),
(1771, 112, 'Rason Directly Governed City', 'NAJ', 1),
(1772, 112, 'P\'yongyang Special City', 'PYO', 1),
(1788, 114, 'Al \'Asimah', 'AL', 1),
(1789, 114, 'Al Ahmadi', 'AA', 1),
(1790, 114, 'Al Farwaniyah', 'AF', 1),
(1791, 114, 'Al Jahra\'', 'AJ', 1),
(1792, 114, 'Hawalli', 'HA', 1),
(1793, 115, 'Bishkek', 'GB', 1),
(1794, 115, 'Batken', 'B', 1),
(1795, 115, 'Chu', 'C', 1),
(1796, 115, 'Jalal-Abad', 'J', 1),
(1797, 115, 'Naryn', 'N', 1),
(1798, 115, 'Osh', 'O', 1),
(1799, 115, 'Talas', 'T', 1),
(1800, 115, 'Ysyk-Kol', 'Y', 1),
(1801, 116, 'Vientiane', 'VT', 1),
(1802, 116, 'Attapu', 'AT', 1),
(1803, 116, 'Bokeo', 'BK', 1),
(1804, 116, 'Bolikhamxai', 'BL', 1),
(1805, 116, 'Champasak', 'CH', 1),
(1806, 116, 'Houaphan', 'HO', 1),
(1807, 116, 'Khammouan', 'KH', 1),
(1808, 116, 'Louang Namtha', 'LM', 1),
(1809, 116, 'Louangphabang', 'LP', 1),
(1810, 116, 'Oudomxai', 'OU', 1),
(1811, 116, 'Phongsali', 'PH', 1),
(1812, 116, 'Salavan', 'SL', 1),
(1813, 116, 'Savannakhet', 'SV', 1),
(1814, 116, 'Vientiane', 'VI', 1),
(1815, 116, 'Xaignabouli', 'XA', 1),
(1816, 116, 'Xekong', 'XE', 1),
(1817, 116, 'Xiangkhoang', 'XI', 1),
(1818, 116, 'Xaisomboun', 'XN', 1),
(1852, 119, 'Berea', 'BE', 1),
(1853, 119, 'Butha-Buthe', 'BB', 1),
(1854, 119, 'Leribe', 'LE', 1),
(1855, 119, 'Mafeteng', 'MF', 1),
(1856, 119, 'Maseru', 'MS', 1),
(1857, 119, 'Mohale\'s Hoek', 'MH', 1),
(1858, 119, 'Mokhotlong', 'MK', 1),
(1859, 119, 'Qacha\'s Nek', 'QN', 1),
(1860, 119, 'Quthing', 'QT', 1),
(1861, 119, 'Thaba-Tseka', 'TT', 1),
(1862, 120, 'Bomi', 'BI', 1),
(1863, 120, 'Bong', 'BG', 1),
(1864, 120, 'Grand Bassa', 'GB', 1),
(1865, 120, 'Grand Cape Mount', 'CM', 1),
(1866, 120, 'Grand Gedeh', 'GG', 1),
(1867, 120, 'Grand Kru', 'GK', 1),
(1868, 120, 'Lofa', 'LO', 1),
(1869, 120, 'Margibi', 'MG', 1),
(1870, 120, 'Maryland', 'ML', 1),
(1871, 120, 'Montserrado', 'MS', 1),
(1872, 120, 'Nimba', 'NB', 1),
(1873, 120, 'River Cess', 'RC', 1),
(1874, 120, 'Sinoe', 'SN', 1),
(1875, 121, 'Ajdabiya', 'AJ', 1),
(1876, 121, 'Al \'Aziziyah', 'AZ', 1),
(1877, 121, 'Al Fatih', 'FA', 1),
(1878, 121, 'Al Jabal al Akhdar', 'JA', 1),
(1879, 121, 'Al Jufrah', 'JU', 1),
(1880, 121, 'Al Khums', 'KH', 1),
(1881, 121, 'Al Kufrah', 'KU', 1),
(1882, 121, 'An Nuqat al Khams', 'NK', 1),
(1883, 121, 'Ash Shati\'', 'AS', 1),
(1884, 121, 'Awbari', 'AW', 1),
(1885, 121, 'Az Zawiyah', 'ZA', 1),
(1886, 121, 'Banghazi', 'BA', 1),
(1887, 121, 'Darnah', 'DA', 1),
(1888, 121, 'Ghadamis', 'GD', 1),
(1889, 121, 'Gharyan', 'GY', 1),
(1890, 121, 'Misratah', 'MI', 1),
(1891, 121, 'Murzuq', 'MZ', 1),
(1892, 121, 'Sabha', 'SB', 1),
(1893, 121, 'Sawfajjin', 'SW', 1),
(1894, 121, 'Surt', 'SU', 1),
(1895, 121, 'Tarabulus (Tripoli)', 'TL', 1),
(1896, 121, 'Tarhunah', 'TH', 1),
(1897, 121, 'Tubruq', 'TU', 1),
(1898, 121, 'Yafran', 'YA', 1),
(1899, 121, 'Zlitan', 'ZL', 1),
(1900, 122, 'Vaduz', 'V', 1),
(1901, 122, 'Schaan', 'A', 1),
(1902, 122, 'Balzers', 'B', 1),
(1903, 122, 'Triesen', 'N', 1),
(1904, 122, 'Eschen', 'E', 1),
(1905, 122, 'Mauren', 'M', 1),
(1906, 122, 'Triesenberg', 'T', 1),
(1907, 122, 'Ruggell', 'R', 1),
(1908, 122, 'Gamprin', 'G', 1),
(1909, 122, 'Schellenberg', 'L', 1),
(1910, 122, 'Planken', 'P', 1),
(1911, 123, 'Alytus', 'AL', 1),
(1912, 123, 'Kaunas', 'KA', 1),
(1913, 123, 'Klaipeda', 'KL', 1),
(1914, 123, 'Marijampole', 'MA', 1),
(1915, 123, 'Panevezys', 'PA', 1),
(1916, 123, 'Siauliai', 'SI', 1),
(1917, 123, 'Taurage', 'TA', 1),
(1918, 123, 'Telsiai', 'TE', 1),
(1919, 123, 'Utena', 'UT', 1),
(1920, 123, 'Vilnius', 'VI', 1),
(1921, 124, 'Diekirch', 'DD', 1),
(1922, 124, 'Clervaux', 'DC', 1),
(1923, 124, 'Redange', 'DR', 1),
(1924, 124, 'Vianden', 'DV', 1),
(1925, 124, 'Wiltz', 'DW', 1),
(1926, 124, 'Grevenmacher', 'GG', 1),
(1927, 124, 'Echternach', 'GE', 1),
(1928, 124, 'Remich', 'GR', 1),
(1929, 124, 'Luxembourg', 'LL', 1),
(1930, 124, 'Capellen', 'LC', 1),
(1931, 124, 'Esch-sur-Alzette', 'LE', 1),
(1932, 124, 'Mersch', 'LM', 1),
(1933, 125, 'Our Lady Fatima Parish', 'OLF', 1),
(1934, 125, 'St. Anthony Parish', 'ANT', 1),
(1935, 125, 'St. Lazarus Parish', 'LAZ', 1),
(1936, 125, 'Cathedral Parish', 'CAT', 1),
(1937, 125, 'St. Lawrence Parish', 'LAW', 1),
(1938, 127, 'Antananarivo', 'AN', 1),
(1939, 127, 'Antsiranana', 'AS', 1),
(1940, 127, 'Fianarantsoa', 'FN', 1),
(1941, 127, 'Mahajanga', 'MJ', 1),
(1942, 127, 'Toamasina', 'TM', 1),
(1943, 127, 'Toliara', 'TL', 1),
(1944, 128, 'Balaka', 'BLK', 1),
(1945, 128, 'Blantyre', 'BLT', 1),
(1946, 128, 'Chikwawa', 'CKW', 1),
(1947, 128, 'Chiradzulu', 'CRD', 1),
(1948, 128, 'Chitipa', 'CTP', 1),
(1949, 128, 'Dedza', 'DDZ', 1),
(1950, 128, 'Dowa', 'DWA', 1),
(1951, 128, 'Karonga', 'KRG', 1),
(1952, 128, 'Kasungu', 'KSG', 1),
(1953, 128, 'Likoma', 'LKM', 1),
(1954, 128, 'Lilongwe', 'LLG', 1),
(1955, 128, 'Machinga', 'MCG', 1),
(1956, 128, 'Mangochi', 'MGC', 1),
(1957, 128, 'Mchinji', 'MCH', 1),
(1958, 128, 'Mulanje', 'MLJ', 1),
(1959, 128, 'Mwanza', 'MWZ', 1),
(1960, 128, 'Mzimba', 'MZM', 1),
(1961, 128, 'Ntcheu', 'NTU', 1),
(1962, 128, 'Nkhata Bay', 'NKB', 1),
(1963, 128, 'Nkhotakota', 'NKH', 1),
(1964, 128, 'Nsanje', 'NSJ', 1),
(1965, 128, 'Ntchisi', 'NTI', 1),
(1966, 128, 'Phalombe', 'PHL', 1),
(1967, 128, 'Rumphi', 'RMP', 1),
(1968, 128, 'Salima', 'SLM', 1),
(1969, 128, 'Thyolo', 'THY', 1),
(1970, 128, 'Zomba', 'ZBA', 1),
(1971, 129, 'Johor', 'MY-01', 1),
(1972, 129, 'Kedah', 'MY-02', 1),
(1973, 129, 'Kelantan', 'MY-03', 1),
(1974, 129, 'Labuan', 'MY-15', 1),
(1975, 129, 'Melaka', 'MY-04', 1),
(1976, 129, 'Negeri Sembilan', 'MY-05', 1),
(1977, 129, 'Pahang', 'MY-06', 1),
(1978, 129, 'Perak', 'MY-08', 1),
(1979, 129, 'Perlis', 'MY-09', 1),
(1980, 129, 'Pulau Pinang', 'MY-07', 1),
(1981, 129, 'Sabah', 'MY-12', 1),
(1982, 129, 'Sarawak', 'MY-13', 1),
(1983, 129, 'Selangor', 'MY-10', 1),
(1984, 129, 'Terengganu', 'MY-11', 1),
(1985, 129, 'Kuala Lumpur', 'MY-14', 1),
(1986, 130, 'Thiladhunmathi Uthuru', 'THU', 1),
(1987, 130, 'Thiladhunmathi Dhekunu', 'THD', 1),
(1988, 130, 'Miladhunmadulu Uthuru', 'MLU', 1),
(1989, 130, 'Miladhunmadulu Dhekunu', 'MLD', 1),
(1990, 130, 'Maalhosmadulu Uthuru', 'MAU', 1),
(1991, 130, 'Maalhosmadulu Dhekunu', 'MAD', 1),
(1992, 130, 'Faadhippolhu', 'FAA', 1),
(1993, 130, 'Male Atoll', 'MAA', 1),
(1994, 130, 'Ari Atoll Uthuru', 'AAU', 1),
(1995, 130, 'Ari Atoll Dheknu', 'AAD', 1),
(1996, 130, 'Felidhe Atoll', 'FEA', 1),
(1997, 130, 'Mulaku Atoll', 'MUA', 1),
(1998, 130, 'Nilandhe Atoll Uthuru', 'NAU', 1),
(1999, 130, 'Nilandhe Atoll Dhekunu', 'NAD', 1),
(2000, 130, 'Kolhumadulu', 'KLH', 1),
(2001, 130, 'Hadhdhunmathi', 'HDH', 1),
(2002, 130, 'Huvadhu Atoll Uthuru', 'HAU', 1),
(2003, 130, 'Huvadhu Atoll Dhekunu', 'HAD', 1),
(2004, 130, 'Fua Mulaku', 'FMU', 1),
(2005, 130, 'Addu', 'ADD', 1),
(2006, 131, 'Gao', 'GA', 1),
(2007, 131, 'Kayes', 'KY', 1),
(2008, 131, 'Kidal', 'KD', 1),
(2009, 131, 'Koulikoro', 'KL', 1),
(2010, 131, 'Mopti', 'MP', 1),
(2011, 131, 'Segou', 'SG', 1),
(2012, 131, 'Sikasso', 'SK', 1),
(2013, 131, 'Tombouctou', 'TB', 1),
(2014, 131, 'Bamako Capital District', 'CD', 1),
(2015, 132, 'Attard', 'ATT', 1),
(2016, 132, 'Balzan', 'BAL', 1),
(2017, 132, 'Birgu', 'BGU', 1),
(2018, 132, 'Birkirkara', 'BKK', 1),
(2019, 132, 'Birzebbuga', 'BRZ', 1),
(2020, 132, 'Bormla', 'BOR', 1),
(2021, 132, 'Dingli', 'DIN', 1),
(2022, 132, 'Fgura', 'FGU', 1),
(2023, 132, 'Floriana', 'FLO', 1),
(2024, 132, 'Gudja', 'GDJ', 1),
(2025, 132, 'Gzira', 'GZR', 1),
(2026, 132, 'Gargur', 'GRG', 1),
(2027, 132, 'Gaxaq', 'GXQ', 1),
(2028, 132, 'Hamrun', 'HMR', 1),
(2029, 132, 'Iklin', 'IKL', 1),
(2030, 132, 'Isla', 'ISL', 1),
(2031, 132, 'Kalkara', 'KLK', 1),
(2032, 132, 'Kirkop', 'KRK', 1),
(2033, 132, 'Lija', 'LIJ', 1),
(2034, 132, 'Luqa', 'LUQ', 1),
(2035, 132, 'Marsa', 'MRS', 1),
(2036, 132, 'Marsaskala', 'MKL', 1),
(2037, 132, 'Marsaxlokk', 'MXL', 1),
(2038, 132, 'Mdina', 'MDN', 1),
(2039, 132, 'Melliea', 'MEL', 1),
(2040, 132, 'Mgarr', 'MGR', 1),
(2041, 132, 'Mosta', 'MST', 1),
(2042, 132, 'Mqabba', 'MQA', 1),
(2043, 132, 'Msida', 'MSI', 1),
(2044, 132, 'Mtarfa', 'MTF', 1),
(2045, 132, 'Naxxar', 'NAX', 1),
(2046, 132, 'Paola', 'PAO', 1),
(2047, 132, 'Pembroke', 'PEM', 1),
(2048, 132, 'Pieta', 'PIE', 1),
(2049, 132, 'Qormi', 'QOR', 1),
(2050, 132, 'Qrendi', 'QRE', 1),
(2051, 132, 'Rabat', 'RAB', 1),
(2052, 132, 'Safi', 'SAF', 1),
(2053, 132, 'San Giljan', 'SGI', 1),
(2054, 132, 'Santa Lucija', 'SLU', 1),
(2055, 132, 'San Pawl il-Bahar', 'SPB', 1),
(2056, 132, 'San Gwann', 'SGW', 1),
(2057, 132, 'Santa Venera', 'SVE', 1),
(2058, 132, 'Siggiewi', 'SIG', 1),
(2059, 132, 'Sliema', 'SLM', 1),
(2060, 132, 'Swieqi', 'SWQ', 1),
(2061, 132, 'Ta Xbiex', 'TXB', 1),
(2062, 132, 'Tarxien', 'TRX', 1),
(2063, 132, 'Valletta', 'VLT', 1),
(2064, 132, 'Xgajra', 'XGJ', 1),
(2065, 132, 'Zabbar', 'ZBR', 1),
(2066, 132, 'Zebbug', 'ZBG', 1),
(2067, 132, 'Zejtun', 'ZJT', 1),
(2068, 132, 'Zurrieq', 'ZRQ', 1),
(2069, 132, 'Fontana', 'FNT', 1),
(2070, 132, 'Ghajnsielem', 'GHJ', 1),
(2071, 132, 'Gharb', 'GHR', 1),
(2072, 132, 'Ghasri', 'GHS', 1),
(2073, 132, 'Kercem', 'KRC', 1),
(2074, 132, 'Munxar', 'MUN', 1),
(2075, 132, 'Nadur', 'NAD', 1),
(2076, 132, 'Qala', 'QAL', 1),
(2077, 132, 'Victoria', 'VIC', 1),
(2078, 132, 'San Lawrenz', 'SLA', 1),
(2079, 132, 'Sannat', 'SNT', 1),
(2080, 132, 'Xagra', 'ZAG', 1),
(2081, 132, 'Xewkija', 'XEW', 1),
(2082, 132, 'Zebbug', 'ZEB', 1),
(2083, 133, 'Ailinginae', 'ALG', 1),
(2084, 133, 'Ailinglaplap', 'ALL', 1),
(2085, 133, 'Ailuk', 'ALK', 1),
(2086, 133, 'Arno', 'ARN', 1),
(2087, 133, 'Aur', 'AUR', 1),
(2088, 133, 'Bikar', 'BKR', 1),
(2089, 133, 'Bikini', 'BKN', 1),
(2090, 133, 'Bokak', 'BKK', 1),
(2091, 133, 'Ebon', 'EBN', 1),
(2092, 133, 'Enewetak', 'ENT', 1),
(2093, 133, 'Erikub', 'EKB', 1),
(2094, 133, 'Jabat', 'JBT', 1),
(2095, 133, 'Jaluit', 'JLT', 1),
(2096, 133, 'Jemo', 'JEM', 1),
(2097, 133, 'Kili', 'KIL', 1),
(2098, 133, 'Kwajalein', 'KWJ', 1),
(2099, 133, 'Lae', 'LAE', 1),
(2100, 133, 'Lib', 'LIB', 1),
(2101, 133, 'Likiep', 'LKP', 1),
(2102, 133, 'Majuro', 'MJR', 1),
(2103, 133, 'Maloelap', 'MLP', 1),
(2104, 133, 'Mejit', 'MJT', 1),
(2105, 133, 'Mili', 'MIL', 1),
(2106, 133, 'Namorik', 'NMK', 1),
(2107, 133, 'Namu', 'NAM', 1),
(2108, 133, 'Rongelap', 'RGL', 1),
(2109, 133, 'Rongrik', 'RGK', 1),
(2110, 133, 'Toke', 'TOK', 1),
(2111, 133, 'Ujae', 'UJA', 1),
(2112, 133, 'Ujelang', 'UJL', 1),
(2113, 133, 'Utirik', 'UTK', 1),
(2114, 133, 'Wotho', 'WTH', 1),
(2115, 133, 'Wotje', 'WTJ', 1),
(2116, 135, 'Adrar', 'AD', 1),
(2117, 135, 'Assaba', 'AS', 1),
(2118, 135, 'Brakna', 'BR', 1),
(2119, 135, 'Dakhlet Nouadhibou', 'DN', 1),
(2120, 135, 'Gorgol', 'GO', 1),
(2121, 135, 'Guidimaka', 'GM', 1),
(2122, 135, 'Hodh Ech Chargui', 'HC', 1),
(2123, 135, 'Hodh El Gharbi', 'HG', 1),
(2124, 135, 'Inchiri', 'IN', 1),
(2125, 135, 'Tagant', 'TA', 1),
(2126, 135, 'Tiris Zemmour', 'TZ', 1),
(2127, 135, 'Trarza', 'TR', 1),
(2128, 135, 'Nouakchott', 'NO', 1),
(2129, 136, 'Beau Bassin-Rose Hill', 'BR', 1),
(2130, 136, 'Curepipe', 'CU', 1),
(2131, 136, 'Port Louis', 'PU', 1),
(2132, 136, 'Quatre Bornes', 'QB', 1),
(2133, 136, 'Vacoas-Phoenix', 'VP', 1),
(2134, 136, 'Agalega Islands', 'AG', 1),
(2135, 136, 'Cargados Carajos Shoals (Saint Brandon Islands)', 'CC', 1),
(2136, 136, 'Rodrigues', 'RO', 1),
(2137, 136, 'Black River', 'BL', 1),
(2138, 136, 'Flacq', 'FL', 1),
(2139, 136, 'Grand Port', 'GP', 1),
(2140, 136, 'Moka', 'MO', 1),
(2141, 136, 'Pamplemousses', 'PA', 1),
(2142, 136, 'Plaines Wilhems', 'PW', 1),
(2143, 136, 'Port Louis', 'PL', 1),
(2144, 136, 'Riviere du Rempart', 'RR', 1),
(2145, 136, 'Savanne', 'SA', 1),
(2146, 138, 'Baja California', 'BCN', 1),
(2147, 138, 'Baja California Sur', 'BCS', 1),
(2148, 138, 'Campeche', 'CAM', 1),
(2149, 138, 'Chiapas', 'CHP', 1),
(2150, 138, 'Chihuahua', 'CHH', 1),
(2151, 138, 'Coahuila de Zaragoza', 'COA', 1),
(2152, 138, 'Colima', 'COL', 1),
(2153, 138, 'Cuidad de Mexico', 'CMX', 1),
(2154, 138, 'Durango', 'DUR', 1),
(2155, 138, 'Guanajuato', 'GUA', 1),
(2156, 138, 'Guerrero', 'GRO', 1),
(2157, 138, 'Hidalgo', 'HID', 1),
(2158, 138, 'Jalisco', 'JAL', 1),
(2159, 138, 'Mexico', 'MEX', 1),
(2160, 138, 'Michoacan de Ocampo', 'MIC', 1),
(2161, 138, 'Morelos', 'MOR', 1),
(2162, 138, 'Nayarit', 'NAY', 1),
(2163, 138, 'Nuevo Leon', 'NLE', 1),
(2164, 138, 'Oaxaca', 'OAX', 1),
(2165, 138, 'Puebla', 'PUE', 1),
(2166, 138, 'Queretaro', 'QUE', 1),
(2167, 138, 'Quintana Roo', 'ROO', 1),
(2168, 138, 'San Luis Potosi', 'SLP', 1),
(2169, 138, 'Sinaloa', 'SIN', 1),
(2170, 138, 'Sonora', 'SON', 1),
(2171, 138, 'Tabasco', 'TAB', 1),
(2172, 138, 'Tamaulipas', 'TAM', 1),
(2173, 138, 'Tlaxcala', 'TLA', 1),
(2174, 138, 'Veracruz de Ignacio de la Llave', 'VER', 1),
(2175, 138, 'Yucatan', 'YUC', 1),
(2176, 138, 'Zacatecas', 'ZAC', 1),
(2177, 139, 'Chuuk', 'C', 1),
(2178, 139, 'Kosrae', 'K', 1),
(2179, 139, 'Pohnpei', 'P', 1),
(2180, 139, 'Yap', 'Y', 1),
(2181, 140, 'Gagauzia', 'GA', 1),
(2182, 140, 'Chisinau', 'CU', 1),
(2183, 140, 'Balti', 'BA', 1),
(2184, 140, 'Cahul', 'CA', 1),
(2185, 140, 'Edinet', 'ED', 1),
(2186, 140, 'Lapusna', 'LA', 1),
(2187, 140, 'Orhei', 'OR', 1),
(2188, 140, 'Soroca', 'SO', 1),
(2189, 140, 'Tighina', 'TI', 1),
(2190, 140, 'Ungheni', 'UN', 1),
(2191, 140, 'St‚nga Nistrului', 'SN', 1),
(2192, 141, 'Fontvieille', 'FV', 1),
(2193, 141, 'La Condamine', 'LC', 1),
(2194, 141, 'Monaco-Ville', 'MV', 1),
(2195, 141, 'Monte-Carlo', 'MC', 1),
(2196, 142, 'Ulanbaatar', '1', 1),
(2197, 142, 'Orhon', '035', 1),
(2198, 142, 'Darhan uul', '037', 1),
(2199, 142, 'Hentiy', '039', 1),
(2200, 142, 'Hovsgol', '041', 1),
(2201, 142, 'Hovd', '043', 1),
(2202, 142, 'Uvs', '046', 1),
(2203, 142, 'Tov', '047', 1),
(2204, 142, 'Selenge', '049', 1),
(2205, 142, 'Suhbaatar', '051', 1),
(2206, 142, 'Omnogovi', '053', 1),
(2207, 142, 'Ovorhangay', '055', 1),
(2208, 142, 'Dzavhan', '057', 1),
(2209, 142, 'DundgovL', '059', 1),
(2210, 142, 'Dornod', '061', 1),
(2211, 142, 'Dornogov', '063', 1),
(2212, 142, 'Govi-Sumber', '064', 1),
(2213, 142, 'Govi-Altay', '065', 1),
(2214, 142, 'Bulgan', '067', 1),
(2215, 142, 'Bayanhongor', '069', 1),
(2216, 142, 'Bayan-Olgiy', '071', 1),
(2217, 142, 'Arhangay', '073', 1),
(2218, 143, 'Saint Anthony', 'A', 1),
(2219, 143, 'Saint Georges', 'G', 1),
(2220, 143, 'Saint Peter', 'P', 1),
(2221, 144, 'Agadir', 'AGD', 1),
(2222, 144, 'Al Hoceima', 'HOC', 1),
(2223, 144, 'Azilal', 'AZI', 1),
(2224, 144, 'Beni Mellal', 'BME', 1),
(2225, 144, 'Ben Slimane', 'BSL', 1),
(2226, 144, 'Boulemane', 'BLM', 1),
(2227, 144, 'Casablanca', 'CBL', 1),
(2228, 144, 'Chaouen', 'CHA', 1),
(2229, 144, 'El Jadida', 'EJA', 1),
(2230, 144, 'El Kelaa des Sraghna', 'EKS', 1),
(2231, 144, 'Er Rachidia', 'ERA', 1),
(2232, 144, 'Essaouira', 'ESS', 1),
(2233, 144, 'Fes', 'FES', 1),
(2234, 144, 'Figuig', 'FIG', 1),
(2235, 144, 'Guelmim', 'GLM', 1),
(2236, 144, 'Ifrane', 'IFR', 1),
(2237, 144, 'Kenitra', 'KEN', 1),
(2238, 144, 'Khemisset', 'KHM', 1),
(2239, 144, 'Khenifra', 'KHN', 1),
(2240, 144, 'Khouribga', 'KHO', 1),
(2241, 144, 'Laayoune', 'LYN', 1),
(2242, 144, 'Larache', 'LAR', 1),
(2243, 144, 'Marrakech', 'MRK', 1),
(2244, 144, 'Meknes', 'MKN', 1),
(2245, 144, 'Nador', 'NAD', 1),
(2246, 144, 'Ouarzazate', 'ORZ', 1),
(2247, 144, 'Oujda', 'OUJ', 1),
(2248, 144, 'Rabat-Sale', 'RSA', 1),
(2249, 144, 'Safi', 'SAF', 1),
(2250, 144, 'Settat', 'SET', 1),
(2251, 144, 'Sidi Kacem', 'SKA', 1),
(2252, 144, 'Tangier', 'TGR', 1),
(2253, 144, 'Tan-Tan', 'TAN', 1),
(2254, 144, 'Taounate', 'TAO', 1),
(2255, 144, 'Taroudannt', 'TRD', 1),
(2256, 144, 'Tata', 'TAT', 1),
(2257, 144, 'Taza', 'TAZ', 1),
(2258, 144, 'Tetouan', 'TET', 1),
(2259, 144, 'Tiznit', 'TIZ', 1),
(2260, 144, 'Ad Dakhla', 'ADK', 1),
(2261, 144, 'Boujdour', 'BJD', 1),
(2262, 144, 'Es Smara', 'ESM', 1),
(2263, 145, 'Cabo Delgado', 'CD', 1),
(2264, 145, 'Gaza', 'GZ', 1),
(2265, 145, 'Inhambane', 'IN', 1),
(2266, 145, 'Manica', 'MN', 1),
(2267, 145, 'Maputo (city)', 'MC', 1),
(2268, 145, 'Maputo', 'MP', 1),
(2269, 145, 'Nampula', 'NA', 1),
(2270, 145, 'Niassa', 'NI', 1),
(2271, 145, 'Sofala', 'SO', 1),
(2272, 145, 'Tete', 'TE', 1),
(2273, 145, 'Zambezia', 'ZA', 1),
(2274, 146, 'Ayeyarwady', 'AY', 1),
(2275, 146, 'Bago', 'BG', 1),
(2276, 146, 'Magway', 'MG', 1),
(2277, 146, 'Mandalay', 'MD', 1),
(2278, 146, 'Sagaing', 'SG', 1),
(2279, 146, 'Tanintharyi', 'TN', 1),
(2280, 146, 'Yangon', 'YG', 1),
(2281, 146, 'Chin State', 'CH', 1),
(2282, 146, 'Kachin State', 'KC', 1),
(2283, 146, 'Kayah State', 'KH', 1),
(2284, 146, 'Kayin State', 'KN', 1),
(2285, 146, 'Mon State', 'MN', 1),
(2286, 146, 'Rakhine State', 'RK', 1),
(2287, 146, 'Shan State', 'SH', 1),
(2288, 147, 'Caprivi', 'CA', 1),
(2289, 147, 'Erongo', 'ER', 1),
(2290, 147, 'Hardap', 'HA', 1),
(2291, 147, 'Karas', 'KR', 1),
(2292, 147, 'Kavango', 'KV', 1),
(2293, 147, 'Khomas', 'KH', 1),
(2294, 147, 'Kunene', 'KU', 1),
(2295, 147, 'Ohangwena', 'OW', 1),
(2296, 147, 'Omaheke', 'OK', 1),
(2297, 147, 'Omusati', 'OT', 1),
(2298, 147, 'Oshana', 'ON', 1),
(2299, 147, 'Oshikoto', 'OO', 1),
(2300, 147, 'Otjozondjupa', 'OJ', 1),
(2301, 148, 'Aiwo', 'AO', 1),
(2302, 148, 'Anabar', 'AA', 1),
(2303, 148, 'Anetan', 'AT', 1),
(2304, 148, 'Anibare', 'AI', 1),
(2305, 148, 'Baiti', 'BA', 1),
(2306, 148, 'Boe', 'BO', 1),
(2307, 148, 'Buada', 'BU', 1),
(2308, 148, 'Denigomodu', 'DE', 1),
(2309, 148, 'Ewa', 'EW', 1),
(2310, 148, 'Ijuw', 'IJ', 1),
(2311, 148, 'Meneng', 'ME', 1),
(2312, 148, 'Nibok', 'NI', 1),
(2313, 148, 'Uaboe', 'UA', 1),
(2314, 148, 'Yaren', 'YA', 1),
(2315, 149, 'Bagmati', 'BA', 1),
(2316, 149, 'Bheri', 'BH', 1),
(2317, 149, 'Dhawalagiri', 'DH', 1),
(2318, 149, 'Gandaki', 'GA', 1),
(2319, 149, 'Janakpur', 'JA', 1),
(2320, 149, 'Karnali', 'KA', 1),
(2321, 149, 'Kosi', 'KO', 1),
(2322, 149, 'Lumbini', 'LU', 1),
(2323, 149, 'Mahakali', 'MA', 1),
(2324, 149, 'Mechi', 'ME', 1),
(2325, 149, 'Narayani', 'NA', 1),
(2326, 149, 'Rapti', 'RA', 1),
(2327, 149, 'Sagarmatha', 'SA', 1),
(2328, 149, 'Seti', 'SE', 1),
(2329, 150, 'Drenthe', 'DR', 1),
(2330, 150, 'Flevoland', 'FL', 1),
(2331, 150, 'Friesland', 'FR', 1),
(2332, 150, 'Gelderland', 'GE', 1),
(2333, 150, 'Groningen', 'GR', 1),
(2334, 150, 'Limburg', 'LI', 1),
(2335, 150, 'Noord-Brabant', 'NB', 1),
(2336, 150, 'Noord-Holland', 'NH', 1),
(2337, 150, 'Overijssel', 'OV', 1),
(2338, 150, 'Utrecht', 'UT', 1),
(2339, 150, 'Zeeland', 'ZE', 1),
(2340, 150, 'Zuid-Holland', 'ZH', 1),
(2341, 152, 'Iles Loyaute', 'L', 1),
(2342, 152, 'Nord', 'N', 1),
(2343, 152, 'Sud', 'S', 1),
(2344, 153, 'Auckland', 'AUK', 1),
(2345, 153, 'Bay of Plenty', 'BOP', 1),
(2346, 153, 'Canterbury', 'CAN', 1),
(2347, 153, 'Coromandel', 'COR', 1),
(2348, 153, 'Gisborne', 'GIS', 1),
(2349, 153, 'Fiordland', 'FIO', 1),
(2350, 153, 'Hawke\'s Bay', 'HKB', 1),
(2351, 153, 'Marlborough', 'MBH', 1),
(2352, 153, 'Manawatu-Wanganui', 'MWT', 1),
(2353, 153, 'Mt Cook-Mackenzie', 'MCM', 1),
(2354, 153, 'Nelson', 'NSN', 1),
(2355, 153, 'Northland', 'NTL', 1),
(2356, 153, 'Otago', 'OTA', 1),
(2357, 153, 'Southland', 'STL', 1),
(2358, 153, 'Taranaki', 'TKI', 1),
(2359, 153, 'Wellington', 'WGN', 1),
(2360, 153, 'Waikato', 'WKO', 1),
(2361, 153, 'Wairarapa', 'WAI', 1),
(2362, 153, 'West Coast', 'WTC', 1),
(2363, 154, 'Atlantico Norte', 'AN', 1),
(2364, 154, 'Atlantico Sur', 'AS', 1),
(2365, 154, 'Boaco', 'BO', 1),
(2366, 154, 'Carazo', 'CA', 1),
(2367, 154, 'Chinandega', 'CI', 1),
(2368, 154, 'Chontales', 'CO', 1),
(2369, 154, 'Esteli', 'ES', 1),
(2370, 154, 'Granada', 'GR', 1),
(2371, 154, 'Jinotega', 'JI', 1),
(2372, 154, 'Leon', 'LE', 1),
(2373, 154, 'Madriz', 'MD', 1),
(2374, 154, 'Managua', 'MN', 1),
(2375, 154, 'Masaya', 'MS', 1),
(2376, 154, 'Matagalpa', 'MT', 1),
(2377, 154, 'Nuevo Segovia', 'NS', 1),
(2378, 154, 'Rio San Juan', 'RS', 1),
(2379, 154, 'Rivas', 'RI', 1),
(2380, 155, 'Agadez', 'AG', 1),
(2381, 155, 'Diffa', 'DF', 1),
(2382, 155, 'Dosso', 'DS', 1),
(2383, 155, 'Maradi', 'MA', 1),
(2384, 155, 'Niamey', 'NM', 1),
(2385, 155, 'Tahoua', 'TH', 1),
(2386, 155, 'Tillaberi', 'TL', 1),
(2387, 155, 'Zinder', 'ZD', 1),
(2388, 156, 'Abia', 'AB', 1),
(2389, 156, 'Abuja Federal Capital Territory', 'CT', 1),
(2390, 156, 'Adamawa', 'AD', 1),
(2391, 156, 'Akwa Ibom', 'AK', 1),
(2392, 156, 'Anambra', 'AN', 1),
(2393, 156, 'Bauchi', 'BC', 1),
(2394, 156, 'Bayelsa', 'BY', 1),
(2395, 156, 'Benue', 'BN', 1),
(2396, 156, 'Borno', 'BO', 1),
(2397, 156, 'Cross River', 'CR', 1),
(2398, 156, 'Delta', 'DE', 1),
(2399, 156, 'Ebonyi', 'EB', 1),
(2400, 156, 'Edo', 'ED', 1),
(2401, 156, 'Ekiti', 'EK', 1),
(2402, 156, 'Enugu', 'EN', 1),
(2403, 156, 'Gombe', 'GO', 1),
(2404, 156, 'Imo', 'IM', 1),
(2405, 156, 'Jigawa', 'JI', 1),
(2406, 156, 'Kaduna', 'KD', 1),
(2407, 156, 'Kano', 'KN', 1),
(2408, 156, 'Katsina', 'KT', 1),
(2409, 156, 'Kebbi', 'KE', 1),
(2410, 156, 'Kogi', 'KO', 1),
(2411, 156, 'Kwara', 'KW', 1),
(2412, 156, 'Lagos', 'LA', 1),
(2413, 156, 'Nassarawa', 'NA', 1),
(2414, 156, 'Niger', 'NI', 1),
(2415, 156, 'Ogun', 'OG', 1),
(2416, 156, 'Ondo', 'ONG', 1),
(2417, 156, 'Osun', 'OS', 1),
(2418, 156, 'Oyo', 'OY', 1),
(2419, 156, 'Plateau', 'PL', 1),
(2420, 156, 'Rivers', 'RI', 1),
(2421, 156, 'Sokoto', 'SO', 1),
(2422, 156, 'Taraba', 'TA', 1),
(2423, 156, 'Yobe', 'YO', 1),
(2424, 156, 'Zamfara', 'ZA', 1),
(2425, 159, 'Northern Islands', 'N', 1),
(2426, 159, 'Rota', 'R', 1),
(2427, 159, 'Saipan', 'S', 1),
(2428, 159, 'Tinian', 'T', 1),
(2429, 160, 'Akershus', 'AK', 1),
(2430, 160, 'Aust-Agder', 'AA', 1),
(2431, 160, 'Buskerud', 'BU', 1),
(2432, 160, 'Finnmark', 'FM', 1),
(2433, 160, 'Hedmark', 'HM', 1),
(2434, 160, 'Hordaland', 'HL', 1),
(2435, 160, 'More og Romdal', 'MR', 1),
(2436, 160, 'Nord-Trondelag', 'NT', 1),
(2437, 160, 'Nordland', 'NL', 1),
(2438, 160, 'Ostfold', 'OF', 1),
(2439, 160, 'Oppland', 'OP', 1),
(2440, 160, 'Oslo', 'OL', 1),
(2441, 160, 'Rogaland', 'RL', 1),
(2442, 160, 'Sor-Trondelag', 'ST', 1),
(2443, 160, 'Sogn og Fjordane', 'SJ', 1),
(2444, 160, 'Svalbard', 'SV', 1),
(2445, 160, 'Telemark', 'TM', 1),
(2446, 160, 'Troms', 'TR', 1),
(2447, 160, 'Vest-Agder', 'VA', 1),
(2448, 160, 'Vestfold', 'VF', 1),
(2449, 161, 'Ad Dakhiliyah', 'DA', 1),
(2450, 161, 'Al Batinah', 'BA', 1),
(2451, 161, 'Al Wusta', 'WU', 1),
(2452, 161, 'Ash Sharqiyah', 'SH', 1),
(2453, 161, 'Az Zahirah', 'ZA', 1),
(2454, 161, 'Masqat', 'MA', 1),
(2455, 161, 'Musandam', 'MU', 1),
(2456, 161, 'Zufar', 'ZU', 1),
(2457, 162, 'Balochistan', 'B', 1),
(2458, 162, 'Federally Administered Tribal Areas', 'T', 1),
(2459, 162, 'Islamabad Capital Territory', 'I', 1),
(2460, 162, 'North-West Frontier', 'N', 1),
(2461, 162, 'Punjab', 'P', 1),
(2462, 162, 'Sindh', 'S', 1),
(2463, 163, 'Aimeliik', 'AM', 1),
(2464, 163, 'Airai', 'AR', 1),
(2465, 163, 'Angaur', 'AN', 1),
(2466, 163, 'Hatohobei', 'HA', 1),
(2467, 163, 'Kayangel', 'KA', 1),
(2468, 163, 'Koror', 'KO', 1),
(2469, 163, 'Melekeok', 'ME', 1),
(2470, 163, 'Ngaraard', 'NA', 1),
(2471, 163, 'Ngarchelong', 'NG', 1),
(2472, 163, 'Ngardmau', 'ND', 1),
(2473, 163, 'Ngatpang', 'NT', 1),
(2474, 163, 'Ngchesar', 'NC', 1),
(2475, 163, 'Ngeremlengui', 'NR', 1),
(2476, 163, 'Ngiwal', 'NW', 1),
(2477, 163, 'Peleliu', 'PE', 1),
(2478, 163, 'Sonsorol', 'SO', 1),
(2479, 164, 'Bocas del Toro', 'BT', 1),
(2480, 164, 'Chiriqui', 'CH', 1),
(2481, 164, 'Cocle', 'CC', 1),
(2482, 164, 'Colon', 'CL', 1),
(2483, 164, 'Darien', 'DA', 1),
(2484, 164, 'Herrera', 'HE', 1),
(2485, 164, 'Los Santos', 'LS', 1),
(2486, 164, 'Panama', 'PA', 1),
(2487, 164, 'San Blas', 'SB', 1),
(2488, 164, 'Veraguas', 'VG', 1),
(2489, 165, 'Bougainville', 'BV', 1),
(2490, 165, 'Central', 'CE', 1),
(2491, 165, 'Chimbu', 'CH', 1),
(2492, 165, 'Eastern Highlands', 'EH', 1),
(2493, 165, 'East New Britain', 'EB', 1),
(2494, 165, 'East Sepik', 'ES', 1),
(2495, 165, 'Enga', 'EN', 1),
(2496, 165, 'Gulf', 'GU', 1),
(2497, 165, 'Madang', 'MD', 1),
(2498, 165, 'Manus', 'MN', 1),
(2499, 165, 'Milne Bay', 'MB', 1),
(2500, 165, 'Morobe', 'MR', 1),
(2501, 165, 'National Capital', 'NC', 1),
(2502, 165, 'New Ireland', 'NI', 1),
(2503, 165, 'Northern', 'NO', 1),
(2504, 165, 'Sandaun', 'SA', 1),
(2505, 165, 'Southern Highlands', 'SH', 1),
(2506, 165, 'Western', 'WE', 1),
(2507, 165, 'Western Highlands', 'WH', 1),
(2508, 165, 'West New Britain', 'WB', 1),
(2509, 166, 'Alto Paraguay', 'AG', 1),
(2510, 166, 'Alto Parana', 'AN', 1),
(2511, 166, 'Amambay', 'AM', 1),
(2512, 166, 'Asuncion', 'AS', 1),
(2513, 166, 'Boqueron', 'BO', 1),
(2514, 166, 'Caaguazu', 'CG', 1),
(2515, 166, 'Caazapa', 'CZ', 1),
(2516, 166, 'Canindeyu', 'CN', 1),
(2517, 166, 'Central', 'CE', 1),
(2518, 166, 'Concepcion', 'CC', 1),
(2519, 166, 'Cordillera', 'CD', 1),
(2520, 166, 'Guaira', 'GU', 1),
(2521, 166, 'Itapua', 'IT', 1),
(2522, 166, 'Misiones', 'MI', 1),
(2523, 166, 'Neembucu', 'NE', 1),
(2524, 166, 'Paraguari', 'PA', 1),
(2525, 166, 'Presidente Hayes', 'PH', 1),
(2526, 166, 'San Pedro', 'SP', 1),
(2527, 167, 'Amazonas', 'AM', 1),
(2528, 167, 'Ancash', 'AN', 1),
(2529, 167, 'Apurimac', 'AP', 1),
(2530, 167, 'Arequipa', 'AR', 1),
(2531, 167, 'Ayacucho', 'AY', 1),
(2532, 167, 'Cajamarca', 'CJ', 1),
(2533, 167, 'Callao', 'CL', 1),
(2534, 167, 'Cusco', 'CU', 1),
(2535, 167, 'Huancavelica', 'HV', 1),
(2536, 167, 'Huanuco', 'HO', 1),
(2537, 167, 'Ica', 'IC', 1),
(2538, 167, 'Junin', 'JU', 1),
(2539, 167, 'La Libertad', 'LD', 1),
(2540, 167, 'Lambayeque', 'LY', 1),
(2541, 167, 'Lima', 'LI', 1),
(2542, 167, 'Loreto', 'LO', 1),
(2543, 167, 'Madre de Dios', 'MD', 1),
(2544, 167, 'Moquegua', 'MO', 1),
(2545, 167, 'Pasco', 'PA', 1),
(2546, 167, 'Piura', 'PI', 1),
(2547, 167, 'Puno', 'PU', 1),
(2548, 167, 'San Martin', 'SM', 1),
(2549, 167, 'Tacna', 'TA', 1),
(2550, 167, 'Tumbes', 'TU', 1),
(2551, 167, 'Ucayali', 'UC', 1),
(2552, 168, 'Abra', 'ABR', 1),
(2553, 168, 'Agusan del Norte', 'ANO', 1),
(2554, 168, 'Agusan del Sur', 'ASU', 1),
(2555, 168, 'Aklan', 'AKL', 1),
(2556, 168, 'Albay', 'ALB', 1),
(2557, 168, 'Antique', 'ANT', 1),
(2558, 168, 'Apayao', 'APY', 1),
(2559, 168, 'Aurora', 'AUR', 1),
(2560, 168, 'Basilan', 'BAS', 1),
(2561, 168, 'Bataan', 'BTA', 1),
(2562, 168, 'Batanes', 'BTE', 1),
(2563, 168, 'Batangas', 'BTG', 1),
(2564, 168, 'Biliran', 'BLR', 1),
(2565, 168, 'Benguet', 'BEN', 1),
(2566, 168, 'Bohol', 'BOL', 1),
(2567, 168, 'Bukidnon', 'BUK', 1),
(2568, 168, 'Bulacan', 'BUL', 1),
(2569, 168, 'Cagayan', 'CAG', 1),
(2570, 168, 'Camarines Norte', 'CNO', 1),
(2571, 168, 'Camarines Sur', 'CSU', 1),
(2572, 168, 'Camiguin', 'CAM', 1),
(2573, 168, 'Capiz', 'CAP', 1),
(2574, 168, 'Catanduanes', 'CAT', 1),
(2575, 168, 'Cavite', 'CAV', 1),
(2576, 168, 'Cebu', 'CEB', 1),
(2577, 168, 'Compostela', 'CMP', 1),
(2578, 168, 'Davao del Norte', 'DNO', 1),
(2579, 168, 'Davao del Sur', 'DSU', 1),
(2580, 168, 'Davao Oriental', 'DOR', 1),
(2581, 168, 'Eastern Samar', 'ESA', 1),
(2582, 168, 'Guimaras', 'GUI', 1),
(2583, 168, 'Ifugao', 'IFU', 1),
(2584, 168, 'Ilocos Norte', 'INO', 1),
(2585, 168, 'Ilocos Sur', 'ISU', 1),
(2586, 168, 'Iloilo', 'ILO', 1),
(2587, 168, 'Isabela', 'ISA', 1),
(2588, 168, 'Kalinga', 'KAL', 1),
(2589, 168, 'Laguna', 'LAG', 1),
(2590, 168, 'Lanao del Norte', 'LNO', 1),
(2591, 168, 'Lanao del Sur', 'LSU', 1),
(2592, 168, 'La Union', 'UNI', 1),
(2593, 168, 'Leyte', 'LEY', 1),
(2594, 168, 'Maguindanao', 'MAG', 1),
(2595, 168, 'Marinduque', 'MRN', 1),
(2596, 168, 'Masbate', 'MSB', 1),
(2597, 168, 'Mindoro Occidental', 'MIC', 1),
(2598, 168, 'Mindoro Oriental', 'MIR', 1),
(2599, 168, 'Misamis Occidental', 'MSC', 1),
(2600, 168, 'Misamis Oriental', 'MOR', 1),
(2601, 168, 'Mountain', 'MOP', 1),
(2602, 168, 'Negros Occidental', 'NOC', 1),
(2603, 168, 'Negros Oriental', 'NOR', 1),
(2604, 168, 'North Cotabato', 'NCT', 1),
(2605, 168, 'Northern Samar', 'NSM', 1),
(2606, 168, 'Nueva Ecija', 'NEC', 1),
(2607, 168, 'Nueva Vizcaya', 'NVZ', 1),
(2608, 168, 'Palawan', 'PLW', 1),
(2609, 168, 'Pampanga', 'PMP', 1),
(2610, 168, 'Pangasinan', 'PNG', 1),
(2611, 168, 'Quezon', 'QZN', 1),
(2612, 168, 'Quirino', 'QRN', 1),
(2613, 168, 'Rizal', 'RIZ', 1),
(2614, 168, 'Romblon', 'ROM', 1),
(2615, 168, 'Samar', 'SMR', 1),
(2616, 168, 'Sarangani', 'SRG', 1),
(2617, 168, 'Siquijor', 'SQJ', 1),
(2618, 168, 'Sorsogon', 'SRS', 1),
(2619, 168, 'South Cotabato', 'SCO', 1),
(2620, 168, 'Southern Leyte', 'SLE', 1),
(2621, 168, 'Sultan Kudarat', 'SKU', 1),
(2622, 168, 'Sulu', 'SLU', 1),
(2623, 168, 'Surigao del Norte', 'SNO', 1),
(2624, 168, 'Surigao del Sur', 'SSU', 1),
(2625, 168, 'Tarlac', 'TAR', 1),
(2626, 168, 'Tawi-Tawi', 'TAW', 1),
(2627, 168, 'Zambales', 'ZBL', 1),
(2628, 168, 'Zamboanga del Norte', 'ZNO', 1),
(2629, 168, 'Zamboanga del Sur', 'ZSU', 1),
(2630, 168, 'Zamboanga Sibugay', 'ZSI', 1),
(2631, 170, 'Dolnoslaskie', 'DO', 1),
(2632, 170, 'Kujawsko-Pomorskie', 'KP', 1),
(2633, 170, 'Lodzkie', 'LO', 1),
(2634, 170, 'Lubelskie', 'LL', 1),
(2635, 170, 'Lubuskie', 'LU', 1),
(2636, 170, 'Malopolskie', 'ML', 1),
(2637, 170, 'Mazowieckie', 'MZ', 1),
(2638, 170, 'Opolskie', 'OP', 1),
(2639, 170, 'Podkarpackie', 'PP', 1),
(2640, 170, 'Podlaskie', 'PL', 1),
(2641, 170, 'Pomorskie', 'PM', 1),
(2642, 170, 'Slaskie', 'SL', 1),
(2643, 170, 'Swietokrzyskie', 'SW', 1),
(2644, 170, 'Warminsko-Mazurskie', 'WM', 1),
(2645, 170, 'Wielkopolskie', 'WP', 1),
(2646, 170, 'Zachodniopomorskie', 'ZA', 1),
(2647, 198, 'Saint Pierre', 'P', 1),
(2648, 198, 'Miquelon', 'M', 1),
(2649, 171, 'A&ccedil;ores', '20', 1),
(2650, 171, 'Aveiro', '01', 1),
(2651, 171, 'Beja', '02', 1),
(2652, 171, 'Braga', '03', 1),
(2653, 171, 'Bragan&ccedil;a', '04', 1),
(2654, 171, 'Castelo Branco', '05', 1),
(2655, 171, 'Coimbra', '06', 1),
(2656, 171, '&Eacute;vora', '07', 1),
(2657, 171, 'Faro', '08', 1),
(2658, 171, 'Guarda', '09', 1),
(2659, 171, 'Leiria', '10', 1),
(2660, 171, 'Lisboa', '11', 1),
(2661, 171, 'Madeira', '30', 1),
(2662, 171, 'Portalegre', '12', 1),
(2663, 171, 'Porto', '13', 1),
(2664, 171, 'Santar&eacute;m', '14', 1),
(2665, 171, 'Set&uacute;bal', '15', 1),
(2666, 171, 'Viana do Castelo', '16', 1),
(2667, 171, 'Vila Real', '17', 1),
(2668, 171, 'Viseu', 'VI', 1),
(2669, 173, 'Ad Dawhah', 'DW', 1),
(2670, 173, 'Al Ghuwayriyah', 'GW', 1),
(2671, 173, 'Al Jumayliyah', 'JM', 1),
(2672, 173, 'Al Khawr', 'KR', 1),
(2673, 173, 'Al Wakrah', 'WK', 1),
(2674, 173, 'Ar Rayyan', 'RN', 1),
(2675, 173, 'Jarayan al Batinah', 'JB', 1),
(2676, 173, 'Madinat ash Shamal', 'MS', 1),
(2677, 173, 'Umm Sa\'id', 'UD', 1),
(2678, 173, 'Umm Salal', 'UL', 1),
(2679, 175, 'Alba', 'AB', 1),
(2680, 175, 'Arad', 'AR', 1),
(2681, 175, 'Argeș', 'AG', 1),
(2682, 175, 'Bacău', 'BC', 1),
(2683, 175, 'Bihor', 'BH', 1),
(2684, 175, 'Bistrița-Năsăud', 'BN', 1),
(2685, 175, 'Botoșani', 'BT', 1),
(2686, 175, 'Brașov', 'BV', 1),
(2687, 175, 'Brăila', 'BR', 1),
(2688, 175, 'București', 'B', 1),
(2689, 175, 'Buzău', 'BZ', 1),
(2690, 175, 'Caraș-Severin', 'CS', 1),
(2691, 175, 'Călărași', 'CL', 1),
(2692, 175, 'Cluj', 'CJ', 1),
(2693, 175, 'Constanța', 'CT', 1),
(2694, 175, 'Covasna', 'CV', 1),
(2695, 175, 'Dâmbovița', 'DB', 1),
(2696, 175, 'Dolj', 'DJ', 1),
(2697, 175, 'Galați', 'GL', 1),
(2698, 175, 'Giurgiu', 'GR', 1),
(2699, 175, 'Gorj', 'GJ', 1),
(2700, 175, 'Harghita', 'HR', 1),
(2701, 175, 'Hunedoara', 'HD', 1),
(2702, 175, 'Ialomița', 'IL', 1),
(2703, 175, 'Iași', 'IS', 1),
(2704, 175, 'Ilfov', 'IF', 1),
(2705, 175, 'Maramureș', 'MM', 1),
(2706, 175, 'Mehedinți', 'MH', 1),
(2707, 175, 'Mureș', 'MS', 1),
(2708, 175, 'Neamț', 'NT', 1),
(2709, 175, 'Olt', 'OT', 1),
(2710, 175, 'Prahova', 'PH', 1),
(2711, 175, 'Satu-Mare', 'SM', 1),
(2712, 175, 'Sălaj', 'SJ', 1),
(2713, 175, 'Sibiu', 'SB', 1),
(2714, 175, 'Suceava', 'SV', 1),
(2715, 175, 'Teleorman', 'TR', 1),
(2716, 175, 'Timiș', 'TM', 1),
(2717, 175, 'Tulcea', 'TL', 1),
(2718, 175, 'Vaslui', 'VS', 1),
(2719, 175, 'Vâlcea', 'VL', 1),
(2720, 175, 'Vrancea', 'VN', 1),
(2809, 177, 'Butare', 'BU', 1),
(2810, 177, 'Byumba', 'BY', 1),
(2811, 177, 'Cyangugu', 'CY', 1),
(2812, 177, 'Gikongoro', 'GK', 1),
(2813, 177, 'Gisenyi', 'GS', 1),
(2814, 177, 'Gitarama', 'GT', 1),
(2815, 177, 'Kibungo', 'KG', 1),
(2816, 177, 'Kibuye', 'KY', 1),
(2817, 177, 'Kigali Rurale', 'KR', 1),
(2818, 177, 'Kigali-ville', 'KV', 1),
(2819, 177, 'Ruhengeri', 'RU', 1),
(2820, 177, 'Umutara', 'UM', 1),
(2821, 178, 'Christ Church Nichola Town', 'CCN', 1),
(2822, 178, 'Saint Anne Sandy Point', 'SAS', 1),
(2823, 178, 'Saint George Basseterre', 'SGB', 1),
(2824, 178, 'Saint George Gingerland', 'SGG', 1),
(2825, 178, 'Saint James Windward', 'SJW', 1),
(2826, 178, 'Saint John Capesterre', 'SJC', 1),
(2827, 178, 'Saint John Figtree', 'SJF', 1),
(2828, 178, 'Saint Mary Cayon', 'SMC', 1),
(2829, 178, 'Saint Paul Capesterre', 'CAP', 1),
(2830, 178, 'Saint Paul Charlestown', 'CHA', 1),
(2831, 178, 'Saint Peter Basseterre', 'SPB', 1),
(2832, 178, 'Saint Thomas Lowland', 'STL', 1),
(2833, 178, 'Saint Thomas Middle Island', 'STM', 1),
(2834, 178, 'Trinity Palmetto Point', 'TPP', 1),
(2835, 179, 'Anse-la-Raye', 'AR', 1),
(2836, 179, 'Castries', 'CA', 1),
(2837, 179, 'Choiseul', 'CH', 1),
(2838, 179, 'Dauphin', 'DA', 1),
(2839, 179, 'Dennery', 'DE', 1),
(2840, 179, 'Gros-Islet', 'GI', 1),
(2841, 179, 'Laborie', 'LA', 1),
(2842, 179, 'Micoud', 'MI', 1),
(2843, 179, 'Praslin', 'PR', 1),
(2844, 179, 'Soufriere', 'SO', 1),
(2845, 179, 'Vieux-Fort', 'VF', 1),
(2846, 180, 'Charlotte', 'C', 1),
(2847, 180, 'Grenadines', 'R', 1),
(2848, 180, 'Saint Andrew', 'A', 1),
(2849, 180, 'Saint David', 'D', 1),
(2850, 180, 'Saint George', 'G', 1),
(2851, 180, 'Saint Patrick', 'P', 1),
(2852, 181, 'A\'ana', 'AN', 1),
(2853, 181, 'Aiga-i-le-Tai', 'AI', 1),
(2854, 181, 'Atua', 'AT', 1),
(2855, 181, 'Fa\'asaleleaga', 'FA', 1),
(2856, 181, 'Gaga\'emauga', 'GE', 1),
(2857, 181, 'Gagaifomauga', 'GF', 1),
(2858, 181, 'Palauli', 'PA', 1),
(2859, 181, 'Satupa\'itea', 'SA', 1),
(2860, 181, 'Tuamasaga', 'TU', 1),
(2861, 181, 'Va\'a-o-Fonoti', 'VF', 1),
(2862, 181, 'Vaisigano', 'VS', 1),
(2863, 182, 'Acquaviva', 'AC', 1),
(2864, 182, 'Borgo Maggiore', 'BM', 1),
(2865, 182, 'Chiesanuova', 'CH', 1),
(2866, 182, 'Domagnano', 'DO', 1),
(2867, 182, 'Faetano', 'FA', 1),
(2868, 182, 'Fiorentino', 'FI', 1),
(2869, 182, 'Montegiardino', 'MO', 1),
(2870, 182, 'Citta di San Marino', 'SM', 1),
(2871, 182, 'Serravalle', 'SE', 1),
(2872, 183, 'Sao Tome', 'S', 1),
(2873, 183, 'Principe', 'P', 1),
(2874, 184, 'Al Bahah', 'BH', 1),
(2875, 184, 'Al Hudud ash Shamaliyah', 'HS', 1),
(2876, 184, 'Al Jawf', 'JF', 1),
(2877, 184, 'Al Madinah', 'MD', 1),
(2878, 184, 'Al Qasim', 'QS', 1),
(2879, 184, 'Ar Riyad', 'RD', 1),
(2880, 184, 'Ash Sharqiyah (Eastern)', 'AQ', 1),
(2881, 184, '\'Asir', 'AS', 1),
(2882, 184, 'Ha\'il', 'HL', 1),
(2883, 184, 'Jizan', 'JZ', 1),
(2884, 184, 'Makkah', 'ML', 1),
(2885, 184, 'Najran', 'NR', 1),
(2886, 184, 'Tabuk', 'TB', 1),
(2887, 185, 'Dakar', 'DA', 1),
(2888, 185, 'Diourbel', 'DI', 1),
(2889, 185, 'Fatick', 'FA', 1),
(2890, 185, 'Kaolack', 'KA', 1),
(2891, 185, 'Kolda', 'KO', 1),
(2892, 185, 'Louga', 'LO', 1),
(2893, 185, 'Matam', 'MA', 1),
(2894, 185, 'Saint-Louis', 'SL', 1),
(2895, 185, 'Tambacounda', 'TA', 1),
(2896, 185, 'Thies', 'TH', 1),
(2897, 185, 'Ziguinchor', 'ZI', 1),
(2898, 186, 'Anse aux Pins', 'AP', 1),
(2899, 186, 'Anse Boileau', 'AB', 1),
(2900, 186, 'Anse Etoile', 'AE', 1),
(2901, 186, 'Anse Louis', 'AL', 1),
(2902, 186, 'Anse Royale', 'AR', 1),
(2903, 186, 'Baie Lazare', 'BL', 1),
(2904, 186, 'Baie Sainte Anne', 'BS', 1),
(2905, 186, 'Beau Vallon', 'BV', 1),
(2906, 186, 'Bel Air', 'BA', 1),
(2907, 186, 'Bel Ombre', 'BO', 1),
(2908, 186, 'Cascade', 'CA', 1),
(2909, 186, 'Glacis', 'GL', 1),
(2910, 186, 'Grand\' Anse (on Mahe)', 'GM', 1),
(2911, 186, 'Grand\' Anse (on Praslin)', 'GP', 1),
(2912, 186, 'La Digue', 'DG', 1),
(2913, 186, 'La Riviere Anglaise', 'RA', 1),
(2914, 186, 'Mont Buxton', 'MB', 1),
(2915, 186, 'Mont Fleuri', 'MF', 1),
(2916, 186, 'Plaisance', 'PL', 1),
(2917, 186, 'Pointe La Rue', 'PR', 1),
(2918, 186, 'Port Glaud', 'PG', 1),
(2919, 186, 'Saint Louis', 'SL', 1),
(2920, 186, 'Takamaka', 'TA', 1),
(2921, 187, 'Eastern', 'E', 1),
(2922, 187, 'Northern', 'N', 1),
(2923, 187, 'Southern', 'S', 1),
(2924, 187, 'Western', 'W', 1),
(2925, 189, 'Banskobystrický', 'BC', 1),
(2926, 189, 'Bratislavský', 'BL', 1),
(2927, 189, 'Košický', 'KI', 1),
(2928, 189, 'Nitriansky', 'NI', 1),
(2929, 189, 'Prešovský', 'PV', 1),
(2930, 189, 'Trenčiansky', 'TC', 1),
(2931, 189, 'Trnavský', 'TA', 1),
(2932, 189, 'Žilinský', 'ZI', 1),
(2933, 191, 'Central', 'CE', 1),
(2934, 191, 'Choiseul', 'CH', 1),
(2935, 191, 'Guadalcanal', 'GC', 1),
(2936, 191, 'Honiara', 'HO', 1),
(2937, 191, 'Isabel', 'IS', 1),
(2938, 191, 'Makira', 'MK', 1),
(2939, 191, 'Malaita', 'ML', 1),
(2940, 191, 'Rennell and Bellona', 'RB', 1),
(2941, 191, 'Temotu', 'TM', 1),
(2942, 191, 'Western', 'WE', 1),
(2943, 192, 'Awdal', 'AW', 1),
(2944, 192, 'Bakool', 'BK', 1),
(2945, 192, 'Banaadir', 'BN', 1),
(2946, 192, 'Bari', 'BR', 1),
(2947, 192, 'Bay', 'BY', 1),
(2948, 192, 'Galguduud', 'GA', 1),
(2949, 192, 'Gedo', 'GE', 1),
(2950, 192, 'Hiiraan', 'HI', 1),
(2951, 192, 'Jubbada Dhexe', 'JD', 1),
(2952, 192, 'Jubbada Hoose', 'JH', 1),
(2953, 192, 'Mudug', 'MU', 1),
(2954, 192, 'Nugaal', 'NU', 1),
(2955, 192, 'Sanaag', 'SA', 1),
(2956, 192, 'Shabeellaha Dhexe', 'SD', 1),
(2957, 192, 'Shabeellaha Hoose', 'SH', 1),
(2958, 192, 'Sool', 'SL', 1),
(2959, 192, 'Togdheer', 'TO', 1),
(2960, 192, 'Woqooyi Galbeed', 'WG', 1),
(2961, 193, 'Eastern Cape', 'EC', 1),
(2962, 193, 'Free State', 'FS', 1),
(2963, 193, 'Gauteng', 'GP', 1),
(2964, 193, 'KwaZulu-Natal', 'KZN', 1),
(2965, 193, 'Limpopo', 'LP', 1),
(2966, 193, 'Mpumalanga', 'MP', 1),
(2967, 193, 'North West', 'NW', 1),
(2968, 193, 'Northern Cape', 'NC', 1),
(2969, 193, 'Western Cape', 'WC', 1),
(2970, 195, 'La Coru&ntilde;a', 'C', 1),
(2971, 195, '&Aacute;lava', 'VI', 1),
(2972, 195, 'Albacete', 'AB', 1),
(2973, 195, 'Alicante', 'A', 1),
(2974, 195, 'Almeria', 'AL', 1),
(2975, 195, 'Asturias', 'O', 1),
(2976, 195, '&Aacute;vila', 'AV', 1),
(2977, 195, 'Badajoz', 'BA', 1),
(2978, 195, 'Baleares', 'IB', 1),
(2979, 195, 'Barcelona', 'B', 1),
(2980, 195, 'Burgos', 'BU', 1),
(2981, 195, 'C&aacute;ceres', 'CC', 1),
(2982, 195, 'C&aacute;diz', 'CA', 1),
(2983, 195, 'Cantabria', 'S', 1),
(2984, 195, 'Castell&oacute;n', 'CS', 1),
(2985, 195, 'Ceuta', 'CE', 1),
(2986, 195, 'Ciudad Real', 'CR', 1),
(2987, 195, 'C&oacute;rdoba', 'CO', 1),
(2988, 195, 'Cuenca', 'CU', 1),
(2989, 195, 'Girona', 'GI', 1),
(2990, 195, 'Granada', 'GR', 1),
(2991, 195, 'Guadalajara', 'GU', 1),
(2992, 195, 'Guip&uacute;zcoa', 'SS', 1),
(2993, 195, 'Huelva', 'H', 1),
(2994, 195, 'Huesca', 'HU', 1),
(2995, 195, 'Ja&eacute;n', 'J', 1),
(2996, 195, 'La Rioja', 'LO', 1),
(2997, 195, 'Las Palmas', 'GC', 1),
(2998, 195, 'Leon', 'CL', 1),
(2999, 195, 'Lleida', 'L', 1),
(3000, 195, 'Lugo', 'LU', 1),
(3001, 195, 'Madrid', 'M', 1),
(3002, 195, 'Malaga', 'MA', 1),
(3003, 195, 'Melilla', 'ML', 1),
(3004, 195, 'Murcia', 'MU', 1),
(3005, 195, 'Navarra', 'NA', 1),
(3006, 195, 'Ourense', 'OR', 1),
(3007, 195, 'Palencia', 'P', 1),
(3008, 195, 'Pontevedra', 'PO', 1),
(3009, 195, 'Salamanca', 'SA', 1),
(3010, 195, 'Santa Cruz de Tenerife', 'TF', 1),
(3011, 195, 'Segovia', 'SG', 1),
(3012, 195, 'Sevilla', 'SE', 1),
(3013, 195, 'Soria', 'SO', 1),
(3014, 195, 'Tarragona', 'T', 1),
(3015, 195, 'Teruel', 'TE', 1),
(3016, 195, 'Toledo', 'TO', 1),
(3017, 195, 'Valencia', 'V', 1),
(3018, 195, 'Valladolid', 'VA', 1),
(3019, 195, 'Bizkaia', 'BI', 1),
(3020, 195, 'Zamora', 'ZA', 1),
(3021, 195, 'Zaragoza', 'Z', 1),
(3022, 196, 'Central', 'CE', 1),
(3023, 196, 'Eastern', 'EA', 1),
(3024, 196, 'North Central', 'NC', 1),
(3025, 196, 'Northern', 'NO', 1),
(3026, 196, 'North Western', 'NW', 1),
(3027, 196, 'Sabaragamuwa', 'SA', 1),
(3028, 196, 'Southern', 'SO', 1),
(3029, 196, 'Uva', 'UV', 1),
(3030, 196, 'Western', 'WE', 1),
(3032, 197, 'Saint Helena', 'S', 1),
(3034, 199, 'A\'ali an Nil', 'ANL', 1),
(3035, 199, 'Al Bahr al Ahmar', 'BAM', 1),
(3036, 199, 'Al Buhayrat', 'BRT', 1),
(3037, 199, 'Al Jazirah', 'JZR', 1),
(3038, 199, 'Al Khartum', 'KRT', 1),
(3039, 199, 'Al Qadarif', 'QDR', 1),
(3040, 199, 'Al Wahdah', 'WDH', 1),
(3041, 199, 'An Nil al Abyad', 'ANB', 1),
(3042, 199, 'An Nil al Azraq', 'ANZ', 1),
(3043, 199, 'Ash Shamaliyah', 'ASH', 1),
(3044, 199, 'Bahr al Jabal', 'BJA', 1),
(3045, 199, 'Gharb al Istiwa\'iyah', 'GIS', 1),
(3046, 199, 'Gharb Bahr al Ghazal', 'GBG', 1),
(3047, 199, 'Gharb Darfur', 'GDA', 1),
(3048, 199, 'Gharb Kurdufan', 'GKU', 1),
(3049, 199, 'Janub Darfur', 'JDA', 1),
(3050, 199, 'Janub Kurdufan', 'JKU', 1),
(3051, 199, 'Junqali', 'JQL', 1),
(3052, 199, 'Kassala', 'KSL', 1),
(3053, 199, 'Nahr an Nil', 'NNL', 1),
(3054, 199, 'Shamal Bahr al Ghazal', 'SBG', 1),
(3055, 199, 'Shamal Darfur', 'SDA', 1),
(3056, 199, 'Shamal Kurdufan', 'SKU', 1),
(3057, 199, 'Sharq al Istiwa\'iyah', 'SIS', 1),
(3058, 199, 'Sinnar', 'SNR', 1),
(3059, 199, 'Warab', 'WRB', 1),
(3060, 200, 'Brokopondo', 'BR', 1),
(3061, 200, 'Commewijne', 'CM', 1),
(3062, 200, 'Coronie', 'CR', 1),
(3063, 200, 'Marowijne', 'MA', 1),
(3064, 200, 'Nickerie', 'NI', 1),
(3065, 200, 'Para', 'PA', 1),
(3066, 200, 'Paramaribo', 'PM', 1),
(3067, 200, 'Saramacca', 'SA', 1),
(3068, 200, 'Sipaliwini', 'SI', 1),
(3069, 200, 'Wanica', 'WA', 1),
(3070, 202, 'Hhohho', 'H', 1),
(3071, 202, 'Lubombo', 'L', 1),
(3072, 202, 'Manzini', 'M', 1),
(3073, 202, 'Shishelweni', 'S', 1),
(3074, 203, 'Blekinge', 'K', 1),
(3075, 203, 'Dalarna', 'W', 1),
(3076, 203, 'Gävleborg', 'X', 1),
(3077, 203, 'Gotland', 'I', 1),
(3078, 203, 'Halland', 'N', 1),
(3079, 203, 'Jämtland', 'Z', 1),
(3080, 203, 'Jönköping', 'F', 1),
(3081, 203, 'Kalmar', 'H', 1),
(3082, 203, 'Kronoberg', 'G', 1),
(3083, 203, 'Norrbotten', 'BD', 1),
(3084, 203, 'Örebro', 'T', 1),
(3085, 203, 'Östergötland', 'E', 1),
(3086, 203, 'Sk&aring;ne', 'M', 1),
(3087, 203, 'Södermanland', 'D', 1),
(3088, 203, 'Stockholm', 'AB', 1),
(3089, 203, 'Uppsala', 'C', 1),
(3090, 203, 'Värmland', 'S', 1),
(3091, 203, 'Västerbotten', 'AC', 1),
(3092, 203, 'Västernorrland', 'Y', 1),
(3093, 203, 'Västmanland', 'U', 1),
(3094, 203, 'Västra Götaland', 'O', 1),
(3095, 204, 'Aargau', 'AG', 1),
(3096, 204, 'Appenzell Ausserrhoden', 'AR', 1),
(3097, 204, 'Appenzell Innerrhoden', 'AI', 1),
(3098, 204, 'Basel-Stadt', 'BS', 1),
(3099, 204, 'Basel-Landschaft', 'BL', 1),
(3100, 204, 'Bern', 'BE', 1),
(3101, 204, 'Fribourg', 'FR', 1),
(3102, 204, 'Gen&egrave;ve', 'GE', 1),
(3103, 204, 'Glarus', 'GL', 1),
(3104, 204, 'Graubünden', 'GR', 1),
(3105, 204, 'Jura', 'JU', 1),
(3106, 204, 'Luzern', 'LU', 1),
(3107, 204, 'Neuch&acirc;tel', 'NE', 1),
(3108, 204, 'Nidwald', 'NW', 1),
(3109, 204, 'Obwald', 'OW', 1),
(3110, 204, 'St. Gallen', 'SG', 1),
(3111, 204, 'Schaffhausen', 'SH', 1),
(3112, 204, 'Schwyz', 'SZ', 1),
(3113, 204, 'Solothurn', 'SO', 1),
(3114, 204, 'Thurgau', 'TG', 1),
(3115, 204, 'Ticino', 'TI', 1),
(3116, 204, 'Uri', 'UR', 1),
(3117, 204, 'Valais', 'VS', 1),
(3118, 204, 'Vaud', 'VD', 1),
(3119, 204, 'Zug', 'ZG', 1),
(3120, 204, 'Zürich', 'ZH', 1),
(3121, 205, 'Al Hasakah', 'HA', 1),
(3122, 205, 'Al Ladhiqiyah', 'LA', 1),
(3123, 205, 'Al Qunaytirah', 'QU', 1),
(3124, 205, 'Ar Raqqah', 'RQ', 1),
(3125, 205, 'As Suwayda', 'SU', 1),
(3126, 205, 'Dara', 'DA', 1),
(3127, 205, 'Dayr az Zawr', 'DZ', 1),
(3128, 205, 'Dimashq', 'DI', 1),
(3129, 205, 'Halab', 'HL', 1),
(3130, 205, 'Hamah', 'HM', 1),
(3131, 205, 'Hims', 'HI', 1),
(3132, 205, 'Idlib', 'ID', 1),
(3133, 205, 'Rif Dimashq', 'RD', 1),
(3134, 205, 'Tartus', 'TA', 1),
(3135, 206, 'Chang-hua', 'CH', 1),
(3136, 206, 'Chia-i', 'CI', 1),
(3137, 206, 'Hsin-chu', 'HS', 1),
(3138, 206, 'Hua-lien', 'HL', 1),
(3139, 206, 'I-lan', 'IL', 1),
(3140, 206, 'Kao-hsiung county', 'KH', 1),
(3141, 206, 'Kin-men', 'KM', 1),
(3142, 206, 'Lien-chiang', 'LC', 1),
(3143, 206, 'Miao-li', 'ML', 1),
(3144, 206, 'Nan-t\'ou', 'NT', 1),
(3145, 206, 'P\'eng-hu', 'PH', 1),
(3146, 206, 'P\'ing-tung', 'PT', 1),
(3147, 206, 'T\'ai-chung', 'TG', 1),
(3148, 206, 'T\'ai-nan', 'TA', 1),
(3149, 206, 'T\'ai-pei county', 'TP', 1),
(3150, 206, 'T\'ai-tung', 'TT', 1),
(3151, 206, 'T\'ao-yuan', 'TY', 1),
(3152, 206, 'Yun-lin', 'YL', 1),
(3153, 206, 'Chia-i city', 'CC', 1),
(3154, 206, 'Chi-lung', 'CL', 1),
(3155, 206, 'Hsin-chu', 'HC', 1),
(3156, 206, 'T\'ai-chung', 'TH', 1),
(3157, 206, 'T\'ai-nan', 'TN', 1),
(3158, 206, 'Kao-hsiung city', 'KC', 1),
(3159, 206, 'T\'ai-pei city', 'TC', 1),
(3160, 207, 'Gorno-Badakhstan', 'GB', 1),
(3161, 207, 'Khatlon', 'KT', 1),
(3162, 207, 'Sughd', 'SU', 1),
(3163, 208, 'Arusha', 'AR', 1),
(3164, 208, 'Dar es Salaam', 'DS', 1),
(3165, 208, 'Dodoma', 'DO', 1),
(3166, 208, 'Iringa', 'IR', 1),
(3167, 208, 'Kagera', 'KA', 1),
(3168, 208, 'Kigoma', 'KI', 1),
(3169, 208, 'Kilimanjaro', 'KJ', 1),
(3170, 208, 'Lindi', 'LN', 1),
(3171, 208, 'Manyara', 'MY', 1),
(3172, 208, 'Mara', 'MR', 1),
(3173, 208, 'Mbeya', 'MB', 1),
(3174, 208, 'Morogoro', 'MO', 1),
(3175, 208, 'Mtwara', 'MT', 1),
(3176, 208, 'Mwanza', 'MW', 1),
(3177, 208, 'Pemba North', 'PN', 1),
(3178, 208, 'Pemba South', 'PS', 1),
(3179, 208, 'Pwani', 'PW', 1),
(3180, 208, 'Rukwa', 'RK', 1),
(3181, 208, 'Ruvuma', 'RV', 1),
(3182, 208, 'Shinyanga', 'SH', 1),
(3183, 208, 'Singida', 'SI', 1),
(3184, 208, 'Tabora', 'TB', 1),
(3185, 208, 'Tanga', 'TN', 1),
(3186, 208, 'Zanzibar Central/South', 'ZC', 1),
(3187, 208, 'Zanzibar North', 'ZN', 1),
(3188, 208, 'Zanzibar Urban/West', 'ZU', 1),
(3189, 209, 'Amnat Charoen', '37', 1),
(3190, 209, 'Ang Thong', '15', 1),
(3192, 209, 'Bangkok', '10', 1),
(3193, 209, 'Buri Ram', '31', 1),
(3194, 209, 'Chachoengsao', '24', 1),
(3195, 209, 'Chai Nat', '18', 1),
(3196, 209, 'Chaiyaphum', '36', 1),
(3197, 209, 'Chanthaburi', '22', 1),
(3198, 209, 'Chiang Mai', '50', 1),
(3199, 209, 'Chiang Rai', '57', 1),
(3200, 209, 'Chon Buri', '20', 1),
(3201, 209, 'Chumphon', '86', 1),
(3202, 209, 'Kalasin', '46', 1),
(3203, 209, 'Kamphaeng Phet', '62', 1),
(3204, 209, 'Kanchanaburi', '71', 1),
(3205, 209, 'Khon Kaen', '40', 1),
(3206, 209, 'Krabi', '81', 1),
(3207, 209, 'Lampang', '52', 1),
(3208, 209, 'Lamphun', '51', 1),
(3209, 209, 'Loei', '42', 1),
(3210, 209, 'Lop Buri', '1', 1),
(3211, 209, 'Mae Hong Son', '55', 1),
(3212, 209, 'Maha Sarakham', '44', 1),
(3213, 209, 'Mukdahan', '49', 1),
(3214, 209, 'Nakhon Nayok', '26', 1),
(3215, 209, 'Nakhon Pathom', '73', 1),
(3216, 209, 'Nakhon Phanom', '48', 1),
(3217, 209, 'Nakhon Ratchasima', '30', 1),
(3218, 209, 'Nakhon Sawan', '60', 1),
(3219, 209, 'Nakhon Si Thammarat', '80', 1),
(3220, 209, 'Nan', '55', 1),
(3221, 209, 'Narathiwat', '96', 1),
(3222, 209, 'Nong Bua Lamphu', '39', 1),
(3223, 209, 'Nong Khai', '43', 1),
(3224, 209, 'Nonthaburi', '12', 1),
(3225, 209, 'Pathum Thani', '13', 1),
(3226, 209, 'Pattani', '94', 1),
(3227, 209, 'Phangnga', '82', 1),
(3228, 209, 'Phatthalung', '93', 1),
(3229, 209, 'Phayao', 'Phayao', 1),
(3230, 209, 'Phetchabun', '67', 1),
(3231, 209, 'Phetchaburi', '76', 1),
(3232, 209, 'Phichit', '66', 1),
(3233, 209, 'Phitsanulok', '65', 1),
(3234, 209, 'Phrae', '54', 1),
(3235, 209, 'Phuket', '83', 1),
(3236, 209, 'Prachin Buri', '25', 1),
(3237, 209, 'Prachuap Khiri Khan', '77', 1),
(3238, 209, 'Ranong', '21', 1),
(3239, 209, 'Ratchaburi', '70', 1),
(3240, 209, 'Rayong', '21', 1),
(3241, 209, 'Roi Et', '45', 1),
(3242, 209, 'Sa Kaeo', '27', 1),
(3243, 209, 'Sakon Nakhon', '47', 1),
(3244, 209, 'Samut Prakan', '11', 1),
(3245, 209, 'Samut Sakhon', '74', 1),
(3246, 209, 'Samut Songkhram', '75', 1),
(3247, 209, 'Saraburi', '19', 1),
(3248, 209, 'Satun', '91', 1),
(3249, 209, 'Sing Buri', '17', 1),
(3250, 209, 'Si Sa Ket', '33', 1),
(3251, 209, 'Songkhla', '90', 1),
(3252, 209, 'Sukhothai', '64', 1),
(3253, 209, 'Suphan Buri', '72', 1),
(3254, 209, 'Surat Thani', '84', 1),
(3255, 209, 'Surin', '32', 1),
(3256, 209, 'Tak', '63', 1),
(3257, 209, 'Trang', '92', 1),
(3258, 209, 'Trat', '23', 1),
(3259, 209, 'Ubon Ratchathani', '34', 1),
(3260, 209, 'Udon Thani', '41', 1),
(3261, 209, 'Uthai Thani', '61', 1),
(3262, 209, 'Uttaradit', '53', 1),
(3263, 209, 'Yala', '95', 1),
(3264, 209, 'Yasothon', '35', 1),
(3265, 210, 'Kara', 'K', 1),
(3266, 210, 'Plateaux', 'P', 1),
(3267, 210, 'Savanes', 'S', 1),
(3268, 210, 'Centrale', 'C', 1),
(3269, 210, 'Maritime', 'M', 1),
(3270, 211, 'Atafu', 'A', 1),
(3271, 211, 'Fakaofo', 'F', 1);
INSERT INTO `ve_zone` (`zone_id`, `country_id`, `name`, `code`, `status`) VALUES
(3272, 211, 'Nukunonu', 'N', 1),
(3273, 212, 'Ha\'apai', 'H', 1),
(3274, 212, 'Tongatapu', 'T', 1),
(3275, 212, 'Vava\'u', 'V', 1),
(3276, 213, 'Couva/Tabaquite/Talparo', 'CT', 1),
(3277, 213, 'Diego Martin', 'DM', 1),
(3278, 213, 'Mayaro/Rio Claro', 'MR', 1),
(3279, 213, 'Penal/Debe', 'PD', 1),
(3280, 213, 'Princes Town', 'PT', 1),
(3281, 213, 'Sangre Grande', 'SG', 1),
(3282, 213, 'San Juan/Laventille', 'SL', 1),
(3283, 213, 'Siparia', 'SI', 1),
(3284, 213, 'Tunapuna/Piarco', 'TP', 1),
(3285, 213, 'Port of Spain', 'PS', 1),
(3286, 213, 'San Fernando', 'SF', 1),
(3287, 213, 'Arima', 'AR', 1),
(3288, 213, 'Point Fortin', 'PF', 1),
(3289, 213, 'Chaguanas', 'CH', 1),
(3290, 213, 'Tobago', 'TO', 1),
(3291, 214, 'Ariana', 'AR', 1),
(3292, 214, 'Beja', 'BJ', 1),
(3293, 214, 'Ben Arous', 'BA', 1),
(3294, 214, 'Bizerte', 'BI', 1),
(3295, 214, 'Gabes', 'GB', 1),
(3296, 214, 'Gafsa', 'GF', 1),
(3297, 214, 'Jendouba', 'JE', 1),
(3298, 214, 'Kairouan', 'KR', 1),
(3299, 214, 'Kasserine', 'KS', 1),
(3300, 214, 'Kebili', 'KB', 1),
(3301, 214, 'Kef', 'KF', 1),
(3302, 214, 'Mahdia', 'MH', 1),
(3303, 214, 'Manouba', 'MN', 1),
(3304, 214, 'Medenine', 'ME', 1),
(3305, 214, 'Monastir', 'MO', 1),
(3306, 214, 'Nabeul', 'NA', 1),
(3307, 214, 'Sfax', 'SF', 1),
(3308, 214, 'Sidi', 'SD', 1),
(3309, 214, 'Siliana', 'SL', 1),
(3310, 214, 'Sousse', 'SO', 1),
(3311, 214, 'Tataouine', 'TA', 1),
(3312, 214, 'Tozeur', 'TO', 1),
(3313, 214, 'Tunis', 'TU', 1),
(3314, 214, 'Zaghouan', 'ZA', 1),
(3315, 215, 'Adana', 'TR-01', 1),
(3316, 215, 'Adıyaman', 'TR-02', 1),
(3317, 215, 'Afyonkarahisar', 'TR-03', 1),
(3318, 215, 'Ağrı', 'TR-04', 1),
(3319, 215, 'Aksaray', 'TR-68', 1),
(3320, 215, 'Amasya', 'TR-05', 1),
(3321, 215, 'Ankara', 'TR-06', 1),
(3322, 215, 'Antalya', 'TR-07', 1),
(3323, 215, 'Ardahan', 'TR-75', 1),
(3324, 215, 'Artvin', 'TR-08', 1),
(3325, 215, 'Aydın', 'TR-09', 1),
(3326, 215, 'Balıkesir', 'TR-10', 1),
(3327, 215, 'Bartın', 'TR-74', 1),
(3328, 215, 'Batman', 'TR-72', 1),
(3329, 215, 'Bayburt', 'TR-69', 1),
(3330, 215, 'Bilecik', 'TR-11', 1),
(3331, 215, 'Bingöl', 'TR-12', 1),
(3332, 215, 'Bitlis', 'TR-13', 1),
(3333, 215, 'Bolu', 'TR-14', 1),
(3334, 215, 'Burdur', 'TR-15', 1),
(3335, 215, 'Bursa', 'TR-16', 1),
(3336, 215, 'Çanakkale', 'TR-17', 1),
(3337, 215, 'Çankırı', 'TR-18', 1),
(3338, 215, 'Çorum', 'TR-19', 1),
(3339, 215, 'Denizli', 'TR-20', 1),
(3340, 215, 'Diyarbakır', 'TR-21', 1),
(3341, 215, 'Düzce', 'TR-81', 1),
(3342, 215, 'Edirne', 'TR-22', 1),
(3343, 215, 'Elazığ', 'TR-23', 1),
(3344, 215, 'Erzincan', 'TR-24', 1),
(3345, 215, 'Erzurum', 'TR-25', 1),
(3346, 215, 'Eskişehir', 'TR-26', 1),
(3347, 215, 'Gaziantep', 'TR-27', 1),
(3348, 215, 'Giresun', 'TR-28', 1),
(3349, 215, 'Gümüşhane', 'TR-29', 1),
(3350, 215, 'Hakkari', 'TR-30', 1),
(3351, 215, 'Hatay', 'TR-31', 1),
(3352, 215, 'Iğdır', 'TR-76', 1),
(3353, 215, 'Isparta', 'TR-32', 1),
(3354, 215, 'İstanbul', 'TR-34', 1),
(3355, 215, 'İzmir', 'TR-35', 1),
(3356, 215, 'Kahramanmaraş', 'TR-46', 1),
(3357, 215, 'Karabük', 'TR-78', 1),
(3358, 215, 'Karaman', 'TR-70', 1),
(3359, 215, 'Kars', 'TR-36', 1),
(3360, 215, 'Kastamonu', 'TR-37', 1),
(3361, 215, 'Kayseri', 'TR-38', 1),
(3362, 215, 'Kilis', 'TR-79', 1),
(3363, 215, 'Kırıkkale', 'TR-71', 1),
(3364, 215, 'Kırklareli', 'TR-39', 1),
(3365, 215, 'Kırşehir', 'TR-40', 1),
(3366, 215, 'Kocaeli', 'TR-41', 1),
(3367, 215, 'Konya', 'TR-42', 1),
(3368, 215, 'Kütahya', 'TR-43', 1),
(3369, 215, 'Malatya', 'TR-44', 1),
(3370, 215, 'Manisa', 'TR-45', 1),
(3371, 215, 'Mardin', 'TR-47', 1),
(3372, 215, 'Mersin', 'TR-33', 1),
(3373, 215, 'Muğla', 'TR-48', 1),
(3374, 215, 'Muş', 'TR-49', 1),
(3375, 215, 'Nevşehir', 'TR-50', 1),
(3376, 215, 'Niğde', 'TR-51', 1),
(3377, 215, 'Ordu', 'TR-52', 1),
(3378, 215, 'Osmaniye', 'TR-80', 1),
(3379, 215, 'Rize', 'TR-53', 1),
(3380, 215, 'Sakarya', 'TR-54', 1),
(3381, 215, 'Samsun', 'TR-55', 1),
(3382, 215, 'Şanlıurfa', 'TR-63', 1),
(3383, 215, 'Siirt', 'TR-56', 1),
(3384, 215, 'Sinop', 'TR-57', 1),
(3385, 215, 'Şırnak', 'TR-73', 1),
(3386, 215, 'Sivas', 'TR-58', 1),
(3387, 215, 'Tekirdağ', 'TR-59', 1),
(3388, 215, 'Tokat', 'TR-60', 1),
(3389, 215, 'Trabzon', 'TR-61', 1),
(3390, 215, 'Tunceli', 'TR-62', 1),
(3391, 215, 'Uşak', 'TR-64', 1),
(3392, 215, 'Van', 'TR-65', 1),
(3393, 215, 'Yalova', 'TR-77', 1),
(3394, 215, 'Yozgat', 'TR-66', 1),
(3395, 215, 'Zonguldak', 'TR-67', 1),
(3396, 216, 'Ahal Welayaty', 'A', 1),
(3397, 216, 'Balkan Welayaty', 'B', 1),
(3398, 216, 'Dashhowuz Welayaty', 'D', 1),
(3399, 216, 'Lebap Welayaty', 'L', 1),
(3400, 216, 'Mary Welayaty', 'M', 1),
(3401, 217, 'Ambergris Cays', 'AC', 1),
(3402, 217, 'Dellis Cay', 'DC', 1),
(3403, 217, 'French Cay', 'FC', 1),
(3404, 217, 'Little Water Cay', 'LW', 1),
(3405, 217, 'Parrot Cay', 'RC', 1),
(3406, 217, 'Pine Cay', 'PN', 1),
(3407, 217, 'Salt Cay', 'SL', 1),
(3408, 217, 'Grand Turk', 'GT', 1),
(3409, 217, 'South Caicos', 'SC', 1),
(3410, 217, 'East Caicos', 'EC', 1),
(3411, 217, 'Middle Caicos', 'MC', 1),
(3412, 217, 'North Caicos', 'NC', 1),
(3413, 217, 'Providenciales', 'PR', 1),
(3414, 217, 'West Caicos', 'WC', 1),
(3415, 218, 'Nanumanga', 'NMG', 1),
(3416, 218, 'Niulakita', 'NLK', 1),
(3417, 218, 'Niutao', 'NTO', 1),
(3418, 218, 'Funafuti', 'FUN', 1),
(3419, 218, 'Nanumea', 'NME', 1),
(3420, 218, 'Nui', 'NUI', 1),
(3421, 218, 'Nukufetau', 'NFT', 1),
(3422, 218, 'Nukulaelae', 'NLL', 1),
(3423, 218, 'Vaitupu', 'VAI', 1),
(3424, 219, 'Kalangala', 'KAL', 1),
(3425, 219, 'Kampala', 'KMP', 1),
(3426, 219, 'Kayunga', 'KAY', 1),
(3427, 219, 'Kiboga', 'KIB', 1),
(3428, 219, 'Luwero', 'LUW', 1),
(3429, 219, 'Masaka', 'MAS', 1),
(3430, 219, 'Mpigi', 'MPI', 1),
(3431, 219, 'Mubende', 'MUB', 1),
(3432, 219, 'Mukono', 'MUK', 1),
(3433, 219, 'Nakasongola', 'NKS', 1),
(3434, 219, 'Rakai', 'RAK', 1),
(3435, 219, 'Sembabule', 'SEM', 1),
(3436, 219, 'Wakiso', 'WAK', 1),
(3437, 219, 'Bugiri', 'BUG', 1),
(3438, 219, 'Busia', 'BUS', 1),
(3439, 219, 'Iganga', 'IGA', 1),
(3440, 219, 'Jinja', 'JIN', 1),
(3441, 219, 'Kaberamaido', 'KAB', 1),
(3442, 219, 'Kamuli', 'KML', 1),
(3443, 219, 'Kapchorwa', 'KPC', 1),
(3444, 219, 'Katakwi', 'KTK', 1),
(3445, 219, 'Kumi', 'KUM', 1),
(3446, 219, 'Mayuge', 'MAY', 1),
(3447, 219, 'Mbale', 'MBA', 1),
(3448, 219, 'Pallisa', 'PAL', 1),
(3449, 219, 'Sironko', 'SIR', 1),
(3450, 219, 'Soroti', 'SOR', 1),
(3451, 219, 'Tororo', 'TOR', 1),
(3452, 219, 'Adjumani', 'ADJ', 1),
(3453, 219, 'Apac', 'APC', 1),
(3454, 219, 'Arua', 'ARU', 1),
(3455, 219, 'Gulu', 'GUL', 1),
(3456, 219, 'Kitgum', 'KIT', 1),
(3457, 219, 'Kotido', 'KOT', 1),
(3458, 219, 'Lira', 'LIR', 1),
(3459, 219, 'Moroto', 'MRT', 1),
(3460, 219, 'Moyo', 'MOY', 1),
(3461, 219, 'Nakapiripirit', 'NAK', 1),
(3462, 219, 'Nebbi', 'NEB', 1),
(3463, 219, 'Pader', 'PAD', 1),
(3464, 219, 'Yumbe', 'YUM', 1),
(3465, 219, 'Bundibugyo', 'BUN', 1),
(3466, 219, 'Bushenyi', 'BSH', 1),
(3467, 219, 'Hoima', 'HOI', 1),
(3468, 219, 'Kabale', 'KBL', 1),
(3469, 219, 'Kabarole', 'KAR', 1),
(3470, 219, 'Kamwenge', 'KAM', 1),
(3471, 219, 'Kanungu', 'KAN', 1),
(3472, 219, 'Kasese', 'KAS', 1),
(3473, 219, 'Kibaale', 'KBA', 1),
(3474, 219, 'Kisoro', 'KIS', 1),
(3475, 219, 'Kyenjojo', 'KYE', 1),
(3476, 219, 'Masindi', 'MSN', 1),
(3477, 219, 'Mbarara', 'MBR', 1),
(3478, 219, 'Ntungamo', 'NTU', 1),
(3479, 219, 'Rukungiri', 'RUK', 1),
(3480, 220, 'Cherkaska', '23', 1),
(3481, 220, 'Chernihivska', '25', 1),
(3482, 220, 'Chernivetska', '24', 1),
(3483, 220, 'Avtonomna Respublika Krym', '27', 1),
(3484, 220, 'Dnipropetrovska', '04', 1),
(3485, 220, 'Donetska', '05', 1),
(3486, 220, 'Ivano-Frankivska', '09', 1),
(3487, 220, 'Khersonska', '21', 1),
(3488, 220, 'Khmelnytska', '22', 1),
(3489, 220, 'Kirovohradska', '35', 1),
(3490, 220, 'Kyiv', '26', 1),
(3491, 220, 'Kyivska', '10', 1),
(3492, 220, 'Luhanska', '12', 1),
(3493, 220, 'Lvivska', '13', 1),
(3494, 220, 'Mykolaivska', '14', 1),
(3495, 220, 'Odeska', '15', 1),
(3496, 220, 'Poltavska', '16', 1),
(3497, 220, 'Rivnenska', '17', 1),
(3498, 220, 'Sevastopol', '28', 1),
(3499, 220, 'Sumska', '18', 1),
(3500, 220, 'Ternopilska', '19', 1),
(3501, 220, 'Vinnytska', '02', 1),
(3502, 220, 'Volynska', '03', 1),
(3503, 220, 'Zakarpatska', '07', 1),
(3504, 220, 'Zaporizka', '08', 1),
(3505, 220, 'Zhytomyrskа', '06', 1),
(3506, 221, 'Abu Dhabi', 'ADH', 1),
(3507, 221, '\'Ajman', 'AJ', 1),
(3508, 221, 'Al Fujayrah', 'FU', 1),
(3509, 221, 'Ash Shāriqah', 'SH', 1),
(3510, 221, 'Dubai', 'DU', 1),
(3511, 221, 'Ra’s al Khaymah', 'RK', 1),
(3512, 221, 'Umm al Qaywayn', 'UQ', 1),
(3513, 222, 'Aberdeen', 'ABN', 1),
(3514, 222, 'Aberdeenshire', 'ABNS', 1),
(3515, 222, 'Anglesey', 'ANG', 1),
(3516, 222, 'Angus', 'AGS', 1),
(3517, 222, 'Argyll and Bute', 'ARY', 1),
(3518, 222, 'Bedfordshire', 'BEDS', 1),
(3519, 222, 'Berkshire', 'BERKS', 1),
(3520, 222, 'Blaenau Gwent', 'BLA', 1),
(3521, 222, 'Bridgend', 'BRI', 1),
(3522, 222, 'Bristol', 'BSTL', 1),
(3523, 222, 'Buckinghamshire', 'BUCKS', 1),
(3524, 222, 'Caerphilly', 'CAE', 1),
(3525, 222, 'Cambridgeshire', 'CAMBS', 1),
(3526, 222, 'Cardiff', 'CDF', 1),
(3527, 222, 'Carmarthenshire', 'CARM', 1),
(3528, 222, 'Ceredigion', 'CDGN', 1),
(3529, 222, 'Cheshire', 'CHES', 1),
(3530, 222, 'Clackmannanshire', 'CLACK', 1),
(3531, 222, 'Conwy', 'CON', 1),
(3532, 222, 'Cornwall', 'CORN', 1),
(3533, 222, 'Denbighshire', 'DNBG', 1),
(3534, 222, 'Derbyshire', 'DERBY', 1),
(3535, 222, 'Devon', 'DVN', 1),
(3536, 222, 'Dorset', 'DOR', 1),
(3537, 222, 'Dumfries and Galloway', 'DGL', 1),
(3538, 222, 'Dundee', 'DUND', 1),
(3539, 222, 'Durham', 'DHM', 1),
(3540, 222, 'East Ayrshire', 'ARYE', 1),
(3541, 222, 'East Dunbartonshire', 'DUNBE', 1),
(3542, 222, 'East Lothian', 'LOTE', 1),
(3543, 222, 'East Renfrewshire', 'RENE', 1),
(3544, 222, 'East Riding of Yorkshire', 'ERYS', 1),
(3545, 222, 'East Sussex', 'SXE', 1),
(3546, 222, 'Edinburgh', 'EDIN', 1),
(3547, 222, 'Essex', 'ESX', 1),
(3548, 222, 'Falkirk', 'FALK', 1),
(3549, 222, 'Fife', 'FFE', 1),
(3550, 222, 'Flintshire', 'FLINT', 1),
(3551, 222, 'Glasgow', 'GLAS', 1),
(3552, 222, 'Gloucestershire', 'GLOS', 1),
(3553, 222, 'Greater London', 'LDN', 1),
(3554, 222, 'Greater Manchester', 'MCH', 1),
(3555, 222, 'Gwynedd', 'GDD', 1),
(3556, 222, 'Hampshire', 'HANTS', 1),
(3557, 222, 'Herefordshire', 'HWR', 1),
(3558, 222, 'Hertfordshire', 'HERTS', 1),
(3559, 222, 'Highlands', 'HLD', 1),
(3560, 222, 'Inverclyde', 'IVER', 1),
(3561, 222, 'Isle of Wight', 'IOW', 1),
(3562, 222, 'Kent', 'KNT', 1),
(3563, 222, 'Lancashire', 'LANCS', 1),
(3564, 222, 'Leicestershire', 'LEICS', 1),
(3565, 222, 'Lincolnshire', 'LINCS', 1),
(3566, 222, 'Merseyside', 'MSY', 1),
(3567, 222, 'Merthyr Tydfil', 'MERT', 1),
(3568, 222, 'Midlothian', 'MLOT', 1),
(3569, 222, 'Monmouthshire', 'MMOUTH', 1),
(3570, 222, 'Moray', 'MORAY', 1),
(3571, 222, 'Neath Port Talbot', 'NPRTAL', 1),
(3572, 222, 'Newport', 'NEWPT', 1),
(3573, 222, 'Norfolk', 'NOR', 1),
(3574, 222, 'North Ayrshire', 'ARYN', 1),
(3575, 222, 'North Lanarkshire', 'LANN', 1),
(3576, 222, 'North Yorkshire', 'YSN', 1),
(3577, 222, 'Northamptonshire', 'NHM', 1),
(3578, 222, 'Northumberland', 'NLD', 1),
(3579, 222, 'Nottinghamshire', 'NOT', 1),
(3580, 222, 'Orkney Islands', 'ORK', 1),
(3581, 222, 'Oxfordshire', 'OFE', 1),
(3582, 222, 'Pembrokeshire', 'PEM', 1),
(3583, 222, 'Perth and Kinross', 'PERTH', 1),
(3584, 222, 'Powys', 'PWS', 1),
(3585, 222, 'Renfrewshire', 'REN', 1),
(3586, 222, 'Rhondda Cynon Taff', 'RHON', 1),
(3587, 222, 'Rutland', 'RUT', 1),
(3588, 222, 'Scottish Borders', 'BOR', 1),
(3589, 222, 'Shetland Islands', 'SHET', 1),
(3590, 222, 'Shropshire', 'SPE', 1),
(3591, 222, 'Somerset', 'SOM', 1),
(3592, 222, 'South Ayrshire', 'ARYS', 1),
(3593, 222, 'South Lanarkshire', 'LANS', 1),
(3594, 222, 'South Yorkshire', 'YSS', 1),
(3595, 222, 'Staffordshire', 'SFD', 1),
(3596, 222, 'Stirling', 'STIR', 1),
(3597, 222, 'Suffolk', 'SFK', 1),
(3598, 222, 'Surrey', 'SRY', 1),
(3599, 222, 'Swansea', 'SWAN', 1),
(3600, 222, 'Torfaen', 'TORF', 1),
(3601, 222, 'Tyne and Wear', 'TWR', 1),
(3602, 222, 'Vale of Glamorgan', 'VGLAM', 1),
(3603, 222, 'Warwickshire', 'WARKS', 1),
(3604, 222, 'West Dunbartonshire', 'WDUN', 1),
(3605, 222, 'West Lothian', 'WLOT', 1),
(3606, 222, 'West Midlands', 'WMD', 1),
(3607, 222, 'West Sussex', 'SXW', 1),
(3608, 222, 'West Yorkshire', 'YSW', 1),
(3609, 222, 'Western Isles', 'WIL', 1),
(3610, 222, 'Wiltshire', 'WLT', 1),
(3611, 222, 'Worcestershire', 'WORCS', 1),
(3612, 222, 'Wrexham', 'WRX', 1),
(3613, 223, 'Alabama', 'AL', 1),
(3614, 223, 'Alaska', 'AK', 1),
(3615, 223, 'American Samoa', 'AS', 1),
(3616, 223, 'Arizona', 'AZ', 1),
(3617, 223, 'Arkansas', 'AR', 1),
(3618, 223, 'Armed Forces Africa', 'AF', 1),
(3619, 223, 'Armed Forces Americas', 'AA', 1),
(3620, 223, 'Armed Forces Canada', 'AC', 1),
(3621, 223, 'Armed Forces Europe', 'AE', 1),
(3622, 223, 'Armed Forces Middle East', 'AM', 1),
(3623, 223, 'Armed Forces Pacific', 'AP', 1),
(3624, 223, 'California', 'CA', 1),
(3625, 223, 'Colorado', 'CO', 1),
(3626, 223, 'Connecticut', 'CT', 1),
(3627, 223, 'Delaware', 'DE', 1),
(3628, 223, 'District of Columbia', 'DC', 1),
(3629, 223, 'Federated States Of Micronesia', 'FM', 1),
(3630, 223, 'Florida', 'FL', 1),
(3631, 223, 'Georgia', 'GA', 1),
(3632, 223, 'Guam', 'GU', 1),
(3633, 223, 'Hawaii', 'HI', 1),
(3634, 223, 'Idaho', 'ID', 1),
(3635, 223, 'Illinois', 'IL', 1),
(3636, 223, 'Indiana', 'IN', 1),
(3637, 223, 'Iowa', 'IA', 1),
(3638, 223, 'Kansas', 'KS', 1),
(3639, 223, 'Kentucky', 'KY', 1),
(3640, 223, 'Louisiana', 'LA', 1),
(3641, 223, 'Maine', 'ME', 1),
(3642, 223, 'Marshall Islands', 'MH', 1),
(3643, 223, 'Maryland', 'MD', 1),
(3644, 223, 'Massachusetts', 'MA', 1),
(3645, 223, 'Michigan', 'MI', 1),
(3646, 223, 'Minnesota', 'MN', 1),
(3647, 223, 'Mississippi', 'MS', 1),
(3648, 223, 'Missouri', 'MO', 1),
(3649, 223, 'Montana', 'MT', 1),
(3650, 223, 'Nebraska', 'NE', 1),
(3651, 223, 'Nevada', 'NV', 1),
(3652, 223, 'New Hampshire', 'NH', 1),
(3653, 223, 'New Jersey', 'NJ', 1),
(3654, 223, 'New Mexico', 'NM', 1),
(3655, 223, 'New York', 'NY', 1),
(3656, 223, 'North Carolina', 'NC', 1),
(3657, 223, 'North Dakota', 'ND', 1),
(3658, 223, 'Northern Mariana Islands', 'MP', 1),
(3659, 223, 'Ohio', 'OH', 1),
(3660, 223, 'Oklahoma', 'OK', 1),
(3661, 223, 'Oregon', 'OR', 1),
(3662, 223, 'Palau', 'PW', 1),
(3663, 223, 'Pennsylvania', 'PA', 1),
(3664, 223, 'Puerto Rico', 'PR', 1),
(3665, 223, 'Rhode Island', 'RI', 1),
(3666, 223, 'South Carolina', 'SC', 1),
(3667, 223, 'South Dakota', 'SD', 1),
(3668, 223, 'Tennessee', 'TN', 1),
(3669, 223, 'Texas', 'TX', 1),
(3670, 223, 'Utah', 'UT', 1),
(3671, 223, 'Vermont', 'VT', 1),
(3672, 223, 'Virgin Islands', 'VI', 1),
(3673, 223, 'Virginia', 'VA', 1),
(3674, 223, 'Washington', 'WA', 1),
(3675, 223, 'West Virginia', 'WV', 1),
(3676, 223, 'Wisconsin', 'WI', 1),
(3677, 223, 'Wyoming', 'WY', 1),
(3678, 224, 'Baker Island', 'BI', 1),
(3679, 224, 'Howland Island', 'HI', 1),
(3680, 224, 'Jarvis Island', 'JI', 1),
(3681, 224, 'Johnston Atoll', 'JA', 1),
(3682, 224, 'Kingman Reef', 'KR', 1),
(3683, 224, 'Midway Atoll', 'MA', 1),
(3684, 224, 'Navassa Island', 'NI', 1),
(3685, 224, 'Palmyra Atoll', 'PA', 1),
(3686, 224, 'Wake Island', 'WI', 1),
(3687, 225, 'Artigas', 'AR', 1),
(3688, 225, 'Canelones', 'CA', 1),
(3689, 225, 'Cerro Largo', 'CL', 1),
(3690, 225, 'Colonia', 'CO', 1),
(3691, 225, 'Durazno', 'DU', 1),
(3692, 225, 'Flores', 'FS', 1),
(3693, 225, 'Florida', 'FA', 1),
(3694, 225, 'Lavalleja', 'LA', 1),
(3695, 225, 'Maldonado', 'MA', 1),
(3696, 225, 'Montevideo', 'MO', 1),
(3697, 225, 'Paysandu', 'PA', 1),
(3698, 225, 'Rio Negro', 'RN', 1),
(3699, 225, 'Rivera', 'RV', 1),
(3700, 225, 'Rocha', 'RO', 1),
(3701, 225, 'Salto', 'SL', 1),
(3702, 225, 'San Jose', 'SJ', 1),
(3703, 225, 'Soriano', 'SO', 1),
(3704, 225, 'Tacuarembo', 'TA', 1),
(3705, 225, 'Treinta y Tres', 'TT', 1),
(3706, 226, 'Andijon', 'AN', 1),
(3707, 226, 'Buxoro', 'BU', 1),
(3708, 226, 'Farg\'ona', 'FA', 1),
(3709, 226, 'Jizzax', 'JI', 1),
(3710, 226, 'Namangan', 'NG', 1),
(3711, 226, 'Navoiy', 'NW', 1),
(3712, 226, 'Qashqadaryo', 'QA', 1),
(3713, 226, 'Qoraqalpog\'iston Republikasi', 'QR', 1),
(3714, 226, 'Samarqand', 'SA', 1),
(3715, 226, 'Sirdaryo', 'SI', 1),
(3716, 226, 'Surxondaryo', 'SU', 1),
(3717, 226, 'Toshkent City', 'TK', 1),
(3718, 226, 'Toshkent Region', 'TO', 1),
(3719, 226, 'Xorazm', 'XO', 1),
(3720, 227, 'Malampa', 'MA', 1),
(3721, 227, 'Penama', 'PE', 1),
(3722, 227, 'Sanma', 'SA', 1),
(3723, 227, 'Shefa', 'SH', 1),
(3724, 227, 'Tafea', 'TA', 1),
(3725, 227, 'Torba', 'TO', 1),
(3726, 229, 'Amazonas', 'Z', 1),
(3727, 229, 'Anzoategui', 'B', 1),
(3728, 229, 'Apure', 'C', 1),
(3729, 229, 'Aragua', 'D', 1),
(3730, 229, 'Barinas', 'E', 1),
(3731, 229, 'Bolivar', 'F', 1),
(3732, 229, 'Carabobo', 'G', 1),
(3733, 229, 'Cojedes', 'H', 1),
(3734, 229, 'Delta Amacuro', 'Y', 1),
(3735, 229, 'Dependencias Federales', 'W', 1),
(3736, 229, 'Distrito Capital', 'A', 1),
(3737, 229, 'Falcon', 'I', 1),
(3738, 229, 'Guarico', 'J', 1),
(3739, 229, 'Lara', 'K', 1),
(3740, 229, 'Merida', 'L', 1),
(3741, 229, 'Miranda', 'M', 1),
(3742, 229, 'Monagas', 'N', 1),
(3743, 229, 'Nueva Esparta', 'O', 1),
(3744, 229, 'Portuguesa', 'P', 1),
(3745, 229, 'Sucre', 'R', 1),
(3746, 229, 'Tachira', 'S', 1),
(3747, 229, 'Trujillo', 'T', 1),
(3748, 229, 'Vargas', 'X', 1),
(3749, 229, 'Yaracuy', 'U', 1),
(3750, 229, 'Zulia', 'V', 1),
(3751, 230, 'An Giang', 'AG', 1),
(3752, 230, 'Bac Giang', 'BG', 1),
(3753, 230, 'Bac Kan', 'BK', 1),
(3754, 230, 'Bac Lieu', 'BL', 1),
(3755, 230, 'Bac Ninh', 'BC', 1),
(3756, 230, 'Ba Ria-Vung Tau', 'BR', 1),
(3757, 230, 'Ben Tre', 'BN', 1),
(3758, 230, 'Binh Dinh', 'BH', 1),
(3759, 230, 'Binh Duong', 'BU', 1),
(3760, 230, 'Binh Phuoc', 'BP', 1),
(3761, 230, 'Binh Thuan', 'BT', 1),
(3762, 230, 'Ca Mau', 'CM', 1),
(3763, 230, 'Can Tho', 'CT', 1),
(3764, 230, 'Cao Bang', 'CB', 1),
(3765, 230, 'Dak Lak', 'DL', 1),
(3766, 230, 'Dak Nong', 'DG', 1),
(3767, 230, 'Da Nang', 'DN', 1),
(3768, 230, 'Dien Bien', 'DB', 1),
(3769, 230, 'Dong Nai', 'DI', 1),
(3770, 230, 'Dong Thap', 'DT', 1),
(3771, 230, 'Gia Lai', 'GL', 1),
(3772, 230, 'Ha Giang', 'HG', 1),
(3773, 230, 'Hai Duong', 'HD', 1),
(3774, 230, 'Hai Phong', 'HP', 1),
(3775, 230, 'Ha Nam', 'HM', 1),
(3776, 230, 'Ha Noi', 'HI', 1),
(3777, 230, 'Ha Tay', 'HT', 1),
(3778, 230, 'Ha Tinh', 'HH', 1),
(3779, 230, 'Hoa Binh', 'HB', 1),
(3780, 230, 'Ho Chi Minh City', 'HC', 1),
(3781, 230, 'Hau Giang', 'HU', 1),
(3782, 230, 'Hung Yen', 'HY', 1),
(3783, 232, 'Saint Croix', 'C', 1),
(3784, 232, 'Saint John', 'J', 1),
(3785, 232, 'Saint Thomas', 'T', 1),
(3786, 233, 'Alo', 'A', 1),
(3787, 233, 'Sigave', 'S', 1),
(3788, 233, 'Wallis', 'W', 1),
(3789, 235, 'Abyan', 'AB', 1),
(3790, 235, 'Adan', 'AD', 1),
(3791, 235, 'Amran', 'AM', 1),
(3792, 235, 'Al Bayda', 'BA', 1),
(3793, 235, 'Ad Dali', 'DA', 1),
(3794, 235, 'Dhamar', 'DH', 1),
(3795, 235, 'Hadramawt', 'HD', 1),
(3796, 235, 'Hajjah', 'HJ', 1),
(3797, 235, 'Al Hudaydah', 'HU', 1),
(3798, 235, 'Ibb', 'IB', 1),
(3799, 235, 'Al Jawf', 'JA', 1),
(3800, 235, 'Lahij', 'LA', 1),
(3801, 235, 'Ma\'rib', 'MA', 1),
(3802, 235, 'Al Mahrah', 'MR', 1),
(3803, 235, 'Al Mahwit', 'MW', 1),
(3804, 235, 'Sa\'dah', 'SD', 1),
(3805, 235, 'San\'a', 'SN', 1),
(3806, 235, 'Shabwah', 'SH', 1),
(3807, 235, 'Ta\'izz', 'TA', 1),
(3812, 237, 'Bas-Congo', 'BC', 1),
(3813, 237, 'Bandundu', 'BN', 1),
(3814, 237, 'Equateur', 'EQ', 1),
(3815, 237, 'Katanga', 'KA', 1),
(3816, 237, 'Kasai-Oriental', 'KE', 1),
(3817, 237, 'Kinshasa', 'KN', 1),
(3818, 237, 'Kasai-Occidental', 'KW', 1),
(3819, 237, 'Maniema', 'MA', 1),
(3820, 237, 'Nord-Kivu', 'NK', 1),
(3821, 237, 'Orientale', 'OR', 1),
(3822, 237, 'Sud-Kivu', 'SK', 1),
(3823, 238, 'Central', 'CE', 1),
(3824, 238, 'Copperbelt', 'CB', 1),
(3825, 238, 'Eastern', 'EA', 1),
(3826, 238, 'Luapula', 'LP', 1),
(3827, 238, 'Lusaka', 'LK', 1),
(3828, 238, 'Northern', 'NO', 1),
(3829, 238, 'North-Western', 'NW', 1),
(3830, 238, 'Southern', 'SO', 1),
(3831, 238, 'Western', 'WE', 1),
(3832, 239, 'Bulawayo', 'BU', 1),
(3833, 239, 'Harare', 'HA', 1),
(3834, 239, 'Manicaland', 'ML', 1),
(3835, 239, 'Mashonaland Central', 'MC', 1),
(3836, 239, 'Mashonaland East', 'ME', 1),
(3837, 239, 'Mashonaland West', 'MW', 1),
(3838, 239, 'Masvingo', 'MV', 1),
(3839, 239, 'Matabeleland North', 'MN', 1),
(3840, 239, 'Matabeleland South', 'MS', 1),
(3841, 239, 'Midlands', 'MD', 1),
(3842, 105, 'Agrigento', 'AG', 1),
(3843, 105, 'Alessandria', 'AL', 1),
(3844, 105, 'Ancona', 'AN', 1),
(3845, 105, 'Aosta', 'AO', 1),
(3846, 105, 'Arezzo', 'AR', 1),
(3847, 105, 'Ascoli Piceno', 'AP', 1),
(3848, 105, 'Asti', 'AT', 1),
(3849, 105, 'Avellino', 'AV', 1),
(3850, 105, 'Bari', 'BA', 1),
(3851, 105, 'Belluno', 'BL', 1),
(3852, 105, 'Benevento', 'BN', 1),
(3853, 105, 'Bergamo', 'BG', 1),
(3854, 105, 'Biella', 'BI', 1),
(3855, 105, 'Bologna', 'BO', 1),
(3856, 105, 'Bolzano', 'BZ', 1),
(3857, 105, 'Brescia', 'BS', 1),
(3858, 105, 'Brindisi', 'BR', 1),
(3859, 105, 'Cagliari', 'CA', 1),
(3860, 105, 'Caltanissetta', 'CL', 1),
(3861, 105, 'Campobasso', 'CB', 1),
(3863, 105, 'Caserta', 'CE', 1),
(3864, 105, 'Catania', 'CT', 1),
(3865, 105, 'Catanzaro', 'CZ', 1),
(3866, 105, 'Chieti', 'CH', 1),
(3867, 105, 'Como', 'CO', 1),
(3868, 105, 'Cosenza', 'CS', 1),
(3869, 105, 'Cremona', 'CR', 1),
(3870, 105, 'Crotone', 'KR', 1),
(3871, 105, 'Cuneo', 'CN', 1),
(3872, 105, 'Enna', 'EN', 1),
(3873, 105, 'Ferrara', 'FE', 1),
(3874, 105, 'Firenze', 'FI', 1),
(3875, 105, 'Foggia', 'FG', 1),
(3876, 105, 'Forli-Cesena', 'FC', 1),
(3877, 105, 'Frosinone', 'FR', 1),
(3878, 105, 'Genova', 'GE', 1),
(3879, 105, 'Gorizia', 'GO', 1),
(3880, 105, 'Grosseto', 'GR', 1),
(3881, 105, 'Imperia', 'IM', 1),
(3882, 105, 'Isernia', 'IS', 1),
(3883, 105, 'L&#39;Aquila', 'AQ', 1),
(3884, 105, 'La Spezia', 'SP', 1),
(3885, 105, 'Latina', 'LT', 1),
(3886, 105, 'Lecce', 'LE', 1),
(3887, 105, 'Lecco', 'LC', 1),
(3888, 105, 'Livorno', 'LI', 1),
(3889, 105, 'Lodi', 'LO', 1),
(3890, 105, 'Lucca', 'LU', 1),
(3891, 105, 'Macerata', 'MC', 1),
(3892, 105, 'Mantova', 'MN', 1),
(3893, 105, 'Massa-Carrara', 'MS', 1),
(3894, 105, 'Matera', 'MT', 1),
(3896, 105, 'Messina', 'ME', 1),
(3897, 105, 'Milano', 'MI', 1),
(3898, 105, 'Modena', 'MO', 1),
(3899, 105, 'Napoli', 'NA', 1),
(3900, 105, 'Novara', 'NO', 1),
(3901, 105, 'Nuoro', 'NU', 1),
(3904, 105, 'Oristano', 'OR', 1),
(3905, 105, 'Padova', 'PD', 1),
(3906, 105, 'Palermo', 'PA', 1),
(3907, 105, 'Parma', 'PR', 1),
(3908, 105, 'Pavia', 'PV', 1),
(3909, 105, 'Perugia', 'PG', 1),
(3910, 105, 'Pesaro e Urbino', 'PU', 1),
(3911, 105, 'Pescara', 'PE', 1),
(3912, 105, 'Piacenza', 'PC', 1),
(3913, 105, 'Pisa', 'PI', 1),
(3914, 105, 'Pistoia', 'PT', 1),
(3915, 105, 'Pordenone', 'PN', 1),
(3916, 105, 'Potenza', 'PZ', 1),
(3917, 105, 'Prato', 'PO', 1),
(3918, 105, 'Ragusa', 'RG', 1),
(3919, 105, 'Ravenna', 'RA', 1),
(3920, 105, 'Reggio Calabria', 'RC', 1),
(3921, 105, 'Reggio Emilia', 'RE', 1),
(3922, 105, 'Rieti', 'RI', 1),
(3923, 105, 'Rimini', 'RN', 1),
(3924, 105, 'Roma', 'RM', 1),
(3925, 105, 'Rovigo', 'RO', 1),
(3926, 105, 'Salerno', 'SA', 1),
(3927, 105, 'Sassari', 'SS', 1),
(3928, 105, 'Savona', 'SV', 1),
(3929, 105, 'Siena', 'SI', 1),
(3930, 105, 'Siracusa', 'SR', 1),
(3931, 105, 'Sondrio', 'SO', 1),
(3932, 105, 'Taranto', 'TA', 1),
(3933, 105, 'Teramo', 'TE', 1),
(3934, 105, 'Terni', 'TR', 1),
(3935, 105, 'Torino', 'TO', 1),
(3936, 105, 'Trapani', 'TP', 1),
(3937, 105, 'Trento', 'TN', 1),
(3938, 105, 'Treviso', 'TV', 1),
(3939, 105, 'Trieste', 'TS', 1),
(3940, 105, 'Udine', 'UD', 1),
(3941, 105, 'Varese', 'VA', 1),
(3942, 105, 'Venezia', 'VE', 1),
(3943, 105, 'Verbano-Cusio-Ossola', 'VB', 1),
(3944, 105, 'Vercelli', 'VC', 1),
(3945, 105, 'Verona', 'VR', 1),
(3946, 105, 'Vibo Valentia', 'VV', 1),
(3947, 105, 'Vicenza', 'VI', 1),
(3948, 105, 'Viterbo', 'VT', 1),
(3949, 222, 'County Antrim', 'ANT', 1),
(3950, 222, 'County Armagh', 'ARM', 1),
(3951, 222, 'County Down', 'DOW', 1),
(3952, 222, 'County Fermanagh', 'FER', 1),
(3953, 222, 'County Londonderry', 'LDY', 1),
(3954, 222, 'County Tyrone', 'TYR', 1),
(3955, 222, 'Cumbria', 'CMA', 1),
(3956, 190, 'Pomurska', '1', 1),
(3957, 190, 'Podravska', '2', 1),
(3958, 190, 'Koroška', '3', 1),
(3959, 190, 'Savinjska', '4', 1),
(3960, 190, 'Zasavska', '5', 1),
(3961, 190, 'Spodnjeposavska', '6', 1),
(3962, 190, 'Jugovzhodna Slovenija', '7', 1),
(3963, 190, 'Osrednjeslovenska', '8', 1),
(3964, 190, 'Gorenjska', '9', 1),
(3965, 190, 'Notranjsko-kraška', '10', 1),
(3966, 190, 'Goriška', '11', 1),
(3967, 190, 'Obalno-kraška', '12', 1),
(3968, 33, 'Ruse', '', 1),
(3969, 101, 'Alborz', 'ALB', 1),
(3970, 21, 'Brussels-Capital Region', 'BRU', 1),
(3971, 138, 'Aguascalientes', 'AG', 1),
(3973, 242, 'Andrijevica', '01', 1),
(3974, 242, 'Bar', '02', 1),
(3975, 242, 'Berane', '03', 1),
(3976, 242, 'Bijelo Polje', '04', 1),
(3977, 242, 'Budva', '05', 1),
(3978, 242, 'Cetinje', '06', 1),
(3979, 242, 'Danilovgrad', '07', 1),
(3980, 242, 'Herceg-Novi', '08', 1),
(3981, 242, 'Kolašin', '09', 1),
(3982, 242, 'Kotor', '10', 1),
(3983, 242, 'Mojkovac', '11', 1),
(3984, 242, 'Nikšić', '12', 1),
(3985, 242, 'Plav', '13', 1),
(3986, 242, 'Pljevlja', '14', 1),
(3987, 242, 'Plužine', '15', 1),
(3988, 242, 'Podgorica', '16', 1),
(3989, 242, 'Rožaje', '17', 1),
(3990, 242, 'Šavnik', '18', 1),
(3991, 242, 'Tivat', '19', 1),
(3992, 242, 'Ulcinj', '20', 1),
(3993, 242, 'Žabljak', '21', 1),
(3994, 243, 'Belgrade', '00', 1),
(3995, 243, 'North Bačka', '01', 1),
(3996, 243, 'Central Banat', '02', 1),
(3997, 243, 'North Banat', '03', 1),
(3998, 243, 'South Banat', '04', 1),
(3999, 243, 'West Bačka', '05', 1),
(4000, 243, 'South Bačka', '06', 1),
(4001, 243, 'Srem', '07', 1),
(4002, 243, 'Mačva', '08', 1),
(4003, 243, 'Kolubara', '09', 1),
(4004, 243, 'Podunavlje', '10', 1),
(4005, 243, 'Braničevo', '11', 1),
(4006, 243, 'Šumadija', '12', 1),
(4007, 243, 'Pomoravlje', '13', 1),
(4008, 243, 'Bor', '14', 1),
(4009, 243, 'Zaječar', '15', 1),
(4010, 243, 'Zlatibor', '16', 1),
(4011, 243, 'Moravica', '17', 1),
(4012, 243, 'Raška', '18', 1),
(4013, 243, 'Rasina', '19', 1),
(4014, 243, 'Nišava', '20', 1),
(4015, 243, 'Toplica', '21', 1),
(4016, 243, 'Pirot', '22', 1),
(4017, 243, 'Jablanica', '23', 1),
(4018, 243, 'Pčinja', '24', 1),
(4020, 245, 'Bonaire', 'BO', 1),
(4021, 245, 'Saba', 'SA', 1),
(4022, 245, 'Sint Eustatius', 'SE', 1),
(4023, 248, 'Central Equatoria', 'EC', 1),
(4024, 248, 'Eastern Equatoria', 'EE', 1),
(4025, 248, 'Jonglei', 'JG', 1),
(4026, 248, 'Lakes', 'LK', 1),
(4027, 248, 'Northern Bahr el-Ghazal', 'BN', 1),
(4028, 248, 'Unity', 'UY', 1),
(4029, 248, 'Upper Nile', 'NU', 1),
(4030, 248, 'Warrap', 'WR', 1),
(4031, 248, 'Western Bahr el-Ghazal', 'BW', 1),
(4032, 248, 'Western Equatoria', 'EW', 1),
(4035, 129, 'Putrajaya', 'MY-16', 1),
(4038, 117, 'Aizkraukles novads', '002', 1),
(4040, 117, 'Aizputes novads', '003', 1),
(4042, 117, 'Aknīstes novads', '004', 1),
(4044, 117, 'Alojas novads', '005', 1),
(4045, 117, 'Alsungas novads', '006', 1),
(4047, 117, 'Alūksnes novads', '007', 1),
(4048, 117, 'Amatas novads', '008', 1),
(4050, 117, 'Apes novads', '008', 1),
(4052, 117, 'Auces novads', '010', 1),
(4053, 117, 'Ādažu novads', '011', 1),
(4054, 117, 'Babītes novads', '012', 1),
(4056, 117, 'Baldones novads', '013', 1),
(4058, 117, 'Baltinavas novads', '014', 1),
(4060, 117, 'Balvu novads', '015', 1),
(4062, 117, 'Bauskas novads', '016', 1),
(4063, 117, 'Beverīnas novads', '017', 1),
(4065, 117, 'Brocēnu novads', '018', 1),
(4066, 117, 'Burtnieku novads', '019', 1),
(4067, 117, 'Carnikavas novads', '020', 1),
(4069, 117, 'Cesvaines novads', '021', 1),
(4071, 117, 'Cēsu novads', '022', 1),
(4072, 117, 'Ciblas novads', '023', 1),
(4074, 117, 'Dagdas novads', '024', 1),
(4075, 117, 'Daugavpils', 'DGV', 1),
(4076, 117, 'Daugavpils novads', '025', 1),
(4078, 117, 'Dobeles novads', '026', 1),
(4079, 117, 'Dundagas novads', '027', 1),
(4081, 117, 'Durbes novads', '028', 1),
(4082, 117, 'Engures novads', '029', 1),
(4083, 117, 'Ērgļu novads', '030', 1),
(4084, 117, 'Garkalnes novads', '031', 1),
(4086, 117, 'Grobiņas novads', '032', 1),
(4088, 117, 'Gulbenes novads', '033', 1),
(4089, 117, 'Iecavas novads', '034', 1),
(4091, 117, 'Ikšķiles novads', '035', 1),
(4093, 117, 'Ilūkstes novads', '036', 1),
(4094, 117, 'Inčukalna novads', '037', 1),
(4096, 117, 'Jaunjelgavas novads', '038', 1),
(4097, 117, 'Jaunpiebalgas novads', '039', 1),
(4098, 117, 'Jaunpils novads', '040', 1),
(4099, 117, 'Jelgava', 'JEL', 1),
(4100, 117, 'Jelgavas novads', '041', 1),
(4101, 117, 'Jēkabpils', 'JKB', 1),
(4102, 117, 'Jēkabpils novads', '042', 1),
(4103, 117, 'Jūrmala', 'JUR', 1),
(4106, 117, 'Kandavas novads', '043', 1),
(4108, 117, 'Kārsavas novads', '044', 1),
(4110, 117, 'Kokneses novads', '046', 1),
(4112, 117, 'Krāslavas novads', '047', 1),
(4113, 117, 'Krimuldas novads', '048', 1),
(4114, 117, 'Krustpils novads', '049', 1),
(4116, 117, 'Kuldīgas novads', '050', 1),
(4117, 117, 'Ķeguma novads', '051', 1),
(4119, 117, 'Ķekavas novads', '052', 1),
(4121, 117, 'Lielvārdes novads', '053', 1),
(4122, 117, 'Liepāja', 'LPX', 1),
(4124, 117, 'Limbažu novads', '054', 1),
(4126, 117, 'Līgatnes novads', '055', 1),
(4128, 117, 'Līvānu novads', '056', 1),
(4130, 117, 'Lubānas novads', '057', 1),
(4132, 117, 'Ludzas novads', '058', 1),
(4134, 117, 'Madonas novads', '059', 1),
(4136, 117, 'Mazsalacas novads', '060', 1),
(4137, 117, 'Mālpils novads', '061', 1),
(4138, 117, 'Mārupes novads', '062', 1),
(4139, 117, 'Mērsraga novads', '063', 1),
(4140, 117, 'Naukšēnu novads', '064', 1),
(4141, 117, 'Neretas novads', '065', 1),
(4142, 117, 'Nīcas novads', '066', 1),
(4144, 117, 'Ogres novads', '067', 1),
(4146, 117, 'Olaines novads', '068', 1),
(4147, 117, 'Ozolnieku novads', '069', 1),
(4148, 117, 'Pārgaujas novads', '070', 1),
(4150, 117, 'Pāvilostas novads', '071', 1),
(4153, 117, 'Pļaviņu novads', '072', 1),
(4155, 117, 'Preiļu novads', '073', 1),
(4157, 117, 'Priekules novads', '074', 1),
(4158, 117, 'Priekuļu novads', '075', 1),
(4159, 117, 'Raunas novads', '076', 1),
(4160, 117, 'Rēzekne', 'REZ', 1),
(4161, 117, 'Rēzeknes novads', '077', 1),
(4162, 117, 'Riebiņu novads', '078', 1),
(4163, 117, 'Rīga', 'RIX', 1),
(4164, 117, 'Rojas novads', '079', 1),
(4165, 117, 'Ropažu novads', '080', 1),
(4166, 117, 'Rucavas novads', '081', 1),
(4167, 117, 'Rugāju novads', '082', 1),
(4168, 117, 'Rundāles novads', '083', 1),
(4170, 117, 'Rūjienas novads', '084', 1),
(4173, 117, 'Salacgrīvas novads', '086', 1),
(4174, 117, 'Salas novads', '085', 1),
(4175, 117, 'Salaspils novads', '087', 1),
(4177, 117, 'Saldus novads', '088', 1),
(4178, 117, 'Saldus, Saldus novads', '0840201', 1),
(4180, 117, 'Saulkrastu novads', '089', 1),
(4182, 117, 'Sējas novads', '090', 1),
(4184, 117, 'Siguldas novads', '091', 1),
(4185, 117, 'Skrīveru novads', '092', 1),
(4187, 117, 'Skrundas novads', '093', 1),
(4189, 117, 'Smiltenes novads', '094', 1),
(4192, 117, 'Stopiņu novads', '095', 1),
(4194, 117, 'Strenču novads', '096', 1),
(4197, 117, 'Talsu novads', '097', 1),
(4198, 117, 'Tērvetes novads', '098', 1),
(4199, 117, 'Tukuma novads', '099', 1),
(4201, 117, 'Vaiņodes novads', '100', 1),
(4204, 117, 'Valkas novads', '101', 1),
(4205, 117, 'Valmiera', 'VMR', 1),
(4208, 117, 'Varakļānu novads', '102', 1),
(4209, 117, 'Vārkavas novads', '103', 1),
(4210, 117, 'Vecpiebalgas novads', '104', 1),
(4211, 117, 'Vecumnieku novads', '105', 1),
(4212, 117, 'Ventspils', 'VEN', 1),
(4213, 117, 'Ventspils novads', '106', 1),
(4215, 117, 'Viesītes novads', '107', 1),
(4217, 117, 'Viļakas novads', '108', 1),
(4219, 117, 'Viļānu novads', '109', 1),
(4221, 117, 'Zilupes novads', '110', 1),
(4222, 43, 'Arica y Parinacota', 'AP', 1),
(4223, 43, 'Los Rios', 'LR', 1),
(4224, 220, 'Kharkivs\'ka Oblast\'', '63', 1),
(4225, 118, 'Beirut', 'LB-BR', 1),
(4226, 118, 'Bekaa', 'LB-BE', 1),
(4227, 118, 'Mount Lebanon', 'LB-ML', 1),
(4228, 118, 'Nabatieh', 'LB-NB', 1),
(4229, 118, 'North', 'LB-NR', 1),
(4230, 118, 'South', 'LB-ST', 1),
(4231, 99, 'Telangana', 'TS', 1),
(4232, 44, 'Qinghai', 'QH', 1),
(4233, 100, 'Papua Barat', 'PB', 1),
(4234, 100, 'Sulawesi Barat', 'SR', 1),
(4235, 100, 'Kepulauan Riau', 'KR', 1),
(4236, 105, 'Barletta-Andria-Trani', 'BT', 1),
(4237, 105, 'Fermo', 'FM', 1),
(4238, 105, 'Monza Brianza', 'MB', 1),
(4239, 113, 'Seoul-teukbyeolsi', '11', 1),
(4240, 113, 'Busan-gwangyeoksi', '26', 1),
(4241, 113, 'Daegu-gwangyeoksi', '27', 1),
(4242, 113, 'Daejeon-gwangyeoksi', '30', 1),
(4243, 113, 'Gwangju-gwangyeoksi', '29', 1),
(4244, 113, 'Incheon-gwangyeoksi', '28', 1),
(4245, 113, 'Ulsan-gwangyeoksi', '31', 1),
(4246, 113, 'Chungcheongbuk-do', '43', 1),
(4247, 113, 'Chungcheongnam-do', '44', 1),
(4248, 113, 'Gangwon-do', '42', 1),
(4249, 113, 'Gyeonggi-do', '41', 1),
(4250, 113, 'Gyeongsangbuk-do', '47', 1),
(4251, 113, 'Gyeongsangnam-do', '48', 1),
(4252, 113, 'Jeollabuk-do', '45', 1),
(4253, 113, 'Jeollanam-do', '46', 1),
(4254, 113, 'Jeju-teukbyeoljachido', '49', 1),
(4255, 113, 'Sejong-teukbyeoljachisi', '50', 1),
(4256, 209, 'Phra Nakhon Si Ayutthaya', '14', 1),
(4257, 176, 'Adygea, Republic of', 'RU-AD', 1),
(4258, 176, 'Bashkortostan, Republic of', 'RU-BA', 1),
(4259, 176, 'Buryatia, Republic of', 'RU-BU', 1),
(4260, 176, 'Altai Republic', 'RU-AL', 1),
(4261, 176, 'Dagestan, Republic of', 'RU-DA', 1),
(4262, 176, 'Ingushetia, Republic of', 'RU-IN', 1),
(4263, 176, 'Kabardino-Balkar Republic', 'RU-KB', 1),
(4264, 176, 'Kalmykia, Republic of', 'RU-KL', 1),
(4265, 176, 'Karachay-Cherkess Republic', 'RU-KC', 1),
(4266, 176, 'Karelia, Republic of', 'RU-KR', 1),
(4267, 176, 'Komi Republic', 'RU-KO', 1),
(4268, 176, 'Mari El Republic', 'RU-ME', 1),
(4269, 176, 'Mordovia, Republic of', 'RU-MO', 1),
(4270, 176, 'Sakha (Yakutia) Republic', 'RU-SA', 1),
(4271, 176, 'North Ossetia-Alania, Republic of', 'RU-SE', 1),
(4272, 176, 'Tatarstan, Republic of', 'RU-TA', 1),
(4273, 176, 'Tuva Republic', 'RU-TY', 1),
(4274, 176, 'Udmurt Republic', 'RU-UD', 1),
(4275, 176, 'Khakassia, Republic of', 'RU-KK', 1),
(4276, 176, 'Chechen Republic', 'RU-CE', 1),
(4277, 176, 'Chuvash Republic', 'RU-CU', 1),
(4278, 176, 'Altai Krai', 'RU-ALT', 1),
(4279, 176, 'Krasnodar Krai', 'RU-KDA', 1),
(4280, 176, 'Krasnoyarsk Krai', 'RU-KYA', 1),
(4281, 176, 'Primorsky Krai', 'RU-PRI', 1),
(4282, 176, 'Stavropol Krai', 'RU-STA', 1),
(4283, 176, 'Khabarovsk Krai', 'RU-KHA', 1),
(4284, 176, 'Amur Oblast', 'RU-AMU', 1),
(4285, 176, 'Arkhangelsk Oblast', 'RU-ARK', 1),
(4286, 176, 'Astrakhan Oblast', 'RU-AST', 1),
(4287, 176, 'Belgorod Oblast', 'RU-BEL', 1),
(4288, 176, 'Bryansk Oblast', 'RU-BRY', 1),
(4289, 176, 'Vladimir Oblast', 'RU-VLA', 1),
(4290, 176, 'Volgograd Oblast', 'RU-VGG', 1),
(4291, 176, 'Vologda Oblast', 'RU-VLG', 1),
(4292, 176, 'Voronezh Oblast', 'RU-VOR', 1),
(4293, 176, 'Ivanovo Oblast', 'RU-IVA', 1),
(4294, 176, 'Irkutsk Oblast', 'RU-IRK', 1),
(4295, 176, 'Kaliningrad Oblast', 'RU-KGD', 1),
(4296, 176, 'Kaluga Oblast', 'RU-KLU', 1),
(4297, 176, 'Kamchatka Krai', 'RU-KAM', 1),
(4298, 176, 'Kemerovo Oblast', 'RU-KEM', 1),
(4299, 176, 'Kirov Oblast', 'RU-KIR', 1),
(4300, 176, 'Kostroma Oblast', 'RU-KOS', 1),
(4301, 176, 'Kurgan Oblast', 'RU-KGN', 1),
(4302, 176, 'Kursk Oblast', 'RU-KRS', 1),
(4303, 176, 'Leningrad Oblast', 'RU-LEN', 1),
(4304, 176, 'Lipetsk Oblast', 'RU-LIP', 1),
(4305, 176, 'Magadan Oblast', 'RU-MAG', 1),
(4306, 176, 'Moscow Oblast', 'RU-MOS', 1),
(4307, 176, 'Murmansk Oblast', 'RU-MUR', 1),
(4308, 176, 'Nizhny Novgorod Oblast', 'RU-NIZ', 1),
(4309, 176, 'Novgorod Oblast', 'RU-NGR', 1),
(4310, 176, 'Novosibirsk Oblast', 'RU-NVS', 1),
(4311, 176, 'Omsk Oblast', 'RU-OMS', 1),
(4312, 176, 'Orenburg Oblast', 'RU-ORE', 1),
(4313, 176, 'Oryol Oblast', 'RU-ORL', 1),
(4314, 176, 'Penza Oblast', 'RU-PNZ', 1),
(4315, 176, 'Perm Krai', 'RU-PER', 1),
(4316, 176, 'Pskov Oblast', 'RU-PSK', 1),
(4317, 176, 'Rostov Oblast', 'RU-ROS', 1),
(4318, 176, 'Ryazan Oblast', 'RU-RYA', 1),
(4319, 176, 'Samara Oblast', 'RU-SAM', 1),
(4320, 176, 'Saratov Oblast', 'RU-SAR', 1),
(4321, 176, 'Sakhalin Oblast', 'RU-SAK', 1),
(4322, 176, 'Sverdlovsk Oblast', 'RU-SVE', 1),
(4323, 176, 'Smolensk Oblast', 'RU-SMO', 1),
(4324, 176, 'Tambov Oblast', 'RU-TAM', 1),
(4325, 176, 'Tver Oblast', 'RU-TVE', 1),
(4326, 176, 'Tomsk Oblast', 'RU-TOM', 1),
(4327, 176, 'Tula Oblast', 'RU-TUL', 1),
(4328, 176, 'Tyumen Oblast', 'RU-TYU', 1),
(4329, 176, 'Ulyanovsk Oblast', 'RU-ULY', 1),
(4330, 176, 'Chelyabinsk Oblast', 'RU-CHE', 1),
(4331, 176, 'Zabaykalsky Krai', 'RU-ZAB', 1),
(4332, 176, 'Yaroslavl Oblast', 'RU-YAR', 1),
(4333, 176, 'Moscow', 'RU-MOW', 1),
(4334, 176, 'Saint Petersburg', 'RU-SPE', 1),
(4335, 176, 'Jewish Autonomous Oblast', 'RU-YEV', 1),
(4336, 176, 'Nenets Autonomous Okrug', 'RU-NEN', 1),
(4337, 176, 'Khanty–Mansi Autonomous Okrug – Yugra', 'RU-KHM', 1),
(4338, 176, 'Chukotka Autonomous Okrug', 'RU-CHU', 1),
(4339, 176, 'Yamalo-Nenets Autonomous Okrug', 'RU-YAN', 1),
(4340, 117, 'Aglonas novads', '001', 1),
(4341, 99, 'Chhattisgarh', 'CT', 1),
(4342, 99, 'Ladakh', 'LA', 1),
(4343, 99, 'Uttarakhand', 'UT', 1),
(4344, 81, 'Mecklenburg-Vorpommern, Ahrendsberg (Ostsee)', 'MV-OS01', 1),
(4345, 81, 'Mecklenburg-Vorpommern, Balmer Werder (Ostsee)', 'MV-OS02', 1),
(4346, 81, 'Mecklenburg-Vorpommern, Barther Oie (Ostsee)', 'MV-OS03', 1),
(4347, 81, 'Mecklenburg-Vorpommern, Baumwerder (Ostsee)', 'MV-OS04', 1),
(4348, 81, 'Mecklenburg-Vorpommern, Beuchel (Ostsee)', 'MV-OS05', 1),
(4349, 81, 'Mecklenburg-Vorpommern, Bock (Ostsee)', 'MV-OS06', 1),
(4350, 81, 'Mecklenburg-Vorpommern, Brinkenberg (Ostsee)', 'MV-OS07', 1),
(4351, 81, 'Mecklenburg-Vorpommern, Bullenriff o. Kuhwerder (Ostsee)', 'MV-OS08', 1),
(4352, 81, 'Mecklenburg-Vorpommern, Böhmke (Ostsee)', 'MV-OS09', 1),
(4353, 81, 'Mecklenburg-Vorpommern, Dänholm (Kröslin, Ostsee)', 'MV10', 1),
(4354, 81, 'Mecklenburg-Vorpommern, Dänholm (Ostsee)', 'MV-OS11', 1),
(4355, 81, 'Mecklenburg-Vorpommern, Fährinsel (Ostsee)', 'MV-OS12', 1),
(4356, 81, 'Schleswig-Holstein, Fehmarn (Ostsee)', 'SH-OS13', 1),
(4357, 81, 'Mecklenburg-Vorpommern, Gänsewerder (Ostsee)', 'MV-OS14', 1),
(4358, 81, 'Mecklenburg-Vorpommern, Görmitz (Ostsee)', 'MV-OS15', 1),
(4359, 81, 'Mecklenburg-Vorpommern, Greifswalder Oie (Ostsee)', 'MV-OS16', 1),
(4360, 81, 'Mecklenburg-Vorpommern, Großer Werder (Zingst, Ostsee)', 'MV-OS17', 1),
(4361, 81, 'Mecklenburg-Vorpommern, Großer Wotig (Ostsee)', 'MV-OS18', 1),
(4362, 81, 'Mecklenburg-Vorpommern, Grot Deil (Ostsee)', 'MV-OS19', 1),
(4363, 81, 'Mecklenburg-Vorpommern, Heuwiese (Ostsee)', 'MV-OS20', 1),
(4364, 81, 'Mecklenburg-Vorpommern, Hiddensee, MV (Ostsee)', 'MV-OS21', 1),
(4365, 81, 'Mecklenburg-Vorpommern, Kastenwerder (Ostsee)', 'MV-OS22', 1),
(4366, 81, 'Mecklenburg-Vorpommern, Kieler Ort (Ostsee)', 'MV-OS23', 1),
(4367, 81, 'Mecklenburg-Vorpommern, Kirr (Ostsee)', 'MV-OS24', 1),
(4368, 81, 'Mecklenburg-Vorpommern, Kleiner Rohrplan (Ostsee)', 'MV-OS25', 1),
(4369, 81, 'Mecklenburg-Vorpommern, Kleiner Werder (Ostsee)', 'MV-OS26', 1),
(4370, 81, 'Mecklenburg-Vorpommern, Kleiner Wotig (Ostsee)', 'MV-OS27', 1),
(4371, 81, 'Mecklenburg-Vorpommern, Kleine Werder (Ostsee)', 'MV-OS28', 1),
(4372, 81, 'Mecklenburg-Vorpommern, Koos (Ostsee)', 'MV-OS29', 1),
(4373, 81, 'Mecklenburg-Vorpommern, Langenwerder (Ostsee)', 'MV-OS30', 1),
(4374, 81, 'Mecklenburg-Vorpommern, Liebes (Ostsee)', 'MV-OS31', 1),
(4375, 81, 'Mecklenburg-Vorpommern, Liebitz (Ostsee)', 'MV-OS32', 1),
(4376, 81, 'Mecklenburg-Vorpommern, Mährens (Ostsee)', 'MV-OS33', 1),
(4377, 81, 'Mecklenburg-Vorpommern, Öhe (Ostsee)', 'MV-OS34', 1),
(4378, 81, 'Mecklenburg-Vorpommern, Poel (Ostsee)', 'MV-OS35', 1),
(4379, 81, 'Mecklenburg-Vorpommern, Prosnitzer o. Gustower Werder (Ostsee)', 'MV-OS36', 1),
(4380, 81, 'Mecklenburg-Vorpommern, Riems (Ostsee)', 'MV-OS37', 1),
(4381, 81, 'Mecklenburg-Vorpommern, Riffbrink (Ostsee)', 'MV-OS38', 1),
(4382, 81, 'Mecklenburg-Vorpommern, Riether Werder (Ostsee)', 'MV-OS39', 1),
(4383, 81, 'Mecklenburg-Vorpommern, Ruden (Ostsee)', 'MV-OS40', 1),
(4384, 81, 'Mecklenburg-Vorpommern, Rügen (Ostsee)', 'MV-OS41', 1),
(4385, 81, 'Mecklenburg-Vorpommern, Schlossinsel (Ostsee)', 'MV-OS42', 1),
(4386, 81, 'Mecklenburg-Vorpommern, Struck (Halbinsel, Ostsee)', 'MV-OS43', 1),
(4387, 81, 'Mecklenburg-Vorpommern, Tedingsinsel (Ostsee)', 'MV-OS44', 1),
(4388, 81, 'Mecklenburg-Vorpommern, Tollow (Ostsee)', 'MV-OS45', 1),
(4389, 81, 'Mecklenburg-Vorpommern, Ummanz (Ostsee)', 'MV-OS46', 1),
(4390, 81, 'Mecklenburg-Vorpommern, Urkevitz (Ostsee)', 'MV-OS47', 1),
(4391, 81, 'Mecklenburg-Vorpommern, Usedom (Ostsee)', 'MV-OS48', 1),
(4392, 81, 'Mecklenburg-Vorpommern, Vilm (Ostsee)', 'MV-OS49', 1),
(4393, 81, 'Mecklenburg-Vorpommern, Vogelinsel o. Vauglinsel (Ostsee)', 'MV-OS50', 1),
(4394, 81, 'Mecklenburg-Vorpommern, Walfisch (Ostsee)', 'MV-OS51', 1),
(4395, 81, 'Schleswig-Holstein, Warder (Ostsee)', 'SH-OS52', 1),
(4396, 81, 'Mecklenburg-Vorpommern, Weidenschwanz (Ostsee)', 'MV-OS53', 1),
(4397, 81, 'Mecklenburg-Vorpommern, Werder (Ostsee)', 'MV-OS54', 1),
(4398, 81, 'Mecklenburg-Vorpommern, Wührens (Ostsee)', 'MV-OS55', 1),
(4399, 81, 'Schleswig-Holstein, Amrum (Nordsee)', 'SH-NS56', 1),
(4400, 81, 'Schleswig-Holstein, Föhr (Nordsee)', 'SH-NS57', 1),
(4401, 81, 'Schleswig-Holstein, Pellworm (Nordsee)', 'SH-NS58', 1),
(4402, 81, 'Schleswig-Holstein, Sylt (Nordsee)', 'SH-NS59', 1),
(4403, 81, 'Schleswig-Holstein, Uthörn (Sylt, Nordsee)', 'SH-NS60', 1),
(4404, 81, 'Schleswig-Holstein, Gröde (Hallig)', 'SH-NS61', 1),
(4405, 81, 'Schleswig-Holstein, Habel (Hallig)', 'SH-NS62', 1),
(4406, 81, 'Schleswig-Holstein, Hooge (Hallig, Nordsee)', 'SH-NS63', 1),
(4407, 81, 'Schleswig-Holstein, Hamburger Hallig', 'SH-NS64', 1),
(4408, 81, 'Schleswig-Holstein, Langeneß (Hallig, Nordsee)', 'SH-NS65', 1),
(4409, 81, 'Schleswig-Holstein, Nordstrandischmoor (Hallig)', 'SH-NS66', 1),
(4410, 81, 'Schleswig-Holstein, Oland (Hallig)', 'SH-NS67', 1),
(4411, 81, 'Schleswig-Holstein, Norderoog (Hallig)', 'SH-NS68', 1),
(4412, 81, 'Schleswig-Holstein, Süderoog (Hallig)', 'SH-NS69', 1),
(4413, 81, 'Schleswig-Holstein, Südfall (Hallig)', 'SH-NS70', 1),
(4414, 81, 'Schleswig-Holstein, Norderoogsand (Nordsee)', 'SH-NS71', 1),
(4415, 81, 'Schleswig-Holstein, Blauort (Meldorfer Bucht)', 'SH-NS72', 1),
(4416, 81, 'Schleswig-Holstein, Trischen (Meldorfer Bucht)', 'SH-NS73', 1),
(4417, 81, 'Hamburg, Neuwerk (Helgoländer Bucht)', 'HH-NS74', 1),
(4418, 81, 'Hamburg, Scharhörn und Nigehörn (Helgoländer Bucht)', 'HH-NS75', 1),
(4419, 81, 'Niedersachsen, Mellum (Nordsee)', 'NI-NS76', 1),
(4420, 81, 'Niedersachsen, Minsener Oog (Nordsee)', 'NI-NS77', 1),
(4421, 81, 'Niedersachsen, Wangerooge (Nordsee)', 'NI-NS78', 1),
(4422, 81, 'Niedersachsen, Spiekeroog (Nordsee)', 'NI-NS79', 1),
(4423, 81, 'Niedersachsen, Langeoog (Nordsee)', 'NI-NS80', 1),
(4424, 81, 'Niedersachsen, Baltrum (Nordsee)', 'NI-NS81', 1),
(4425, 81, 'Niedersachsen, Norderney (Nordsee)', 'NI-NS82', 1),
(4426, 81, 'Niedersachsen, Juist (Nordsee)', 'NI-NS83', 1),
(4427, 81, 'Niedersachsen, Memmert (Nordsee)', 'NI-NS84', 1),
(4428, 81, 'Niedersachsen, Kachelotplate (Nordsee)', 'NI-NS85', 1),
(4429, 81, 'Niedersachsen, Lütje Hörn (Nordsee)', 'NI-NS86', 1),
(4430, 81, 'Niedersachsen, Borkum (Nordsee)', 'NI-NS87', 1),
(4431, 81, 'Schleswig-Holstein, Helgoland (Nordsee)', 'SH-NS88', 1),
(4432, 81, 'Schleswig-Holstein, Helgoland-Düne (Nordsee)', 'SH-NS89', 1),
(4433, 81, 'Baden-Württemberg, Büsingen', 'BW-E01', 1),
(4434, 204, 'Schaffhausen, Büsingen', 'SH-E01', 1),
(4435, 81, 'Bayern, Jungholz', 'BY-E01', 1),
(4436, 14, 'Tirol, Jungholz', '7-E01', 1),
(4437, 81, 'Bayern, Mittelberg', 'BY-E02', 1),
(4438, 14, 'Vorarlberg, Mittelberg', '8-E01', 1),
(4439, 105, 'Sondrio, Livigno', 'SO-E01', 1),
(4440, 105, 'Como, Campione d’Italia and terretory Lake Lugano', 'CO-E01', 1),
(4441, 84, 'Mount Athos', 'AO', 1),
(4442, 109, 'Abai', 'ABA', 1),
(4443, 109, 'Jetisu', 'JET', 1),
(4444, 109, 'Shymkent', 'SHY', 1),
(4445, 109, 'Ulytau', 'ULY', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ve_zone_to_geo_zone`
--

CREATE TABLE `ve_zone_to_geo_zone` (
  `zone_to_geo_zone_id` int NOT NULL,
  `country_id` int NOT NULL,
  `zone_id` int NOT NULL DEFAULT '0',
  `geo_zone_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ve_zone_to_geo_zone`
--

INSERT INTO `ve_zone_to_geo_zone` (`zone_to_geo_zone_id`, `country_id`, `zone_id`, `geo_zone_id`) VALUES
(1, 222, 0, 4),
(2, 222, 3513, 3),
(3, 222, 3514, 3),
(4, 222, 3515, 3),
(5, 222, 3516, 3),
(6, 222, 3517, 3),
(7, 222, 3518, 3),
(8, 222, 3519, 3),
(9, 222, 3520, 3),
(10, 222, 3521, 3),
(11, 222, 3522, 3),
(12, 222, 3523, 3),
(13, 222, 3524, 3),
(14, 222, 3525, 3),
(15, 222, 3526, 3),
(16, 222, 3527, 3),
(17, 222, 3528, 3),
(18, 222, 3529, 3),
(19, 222, 3530, 3),
(20, 222, 3531, 3),
(21, 222, 3532, 3),
(22, 222, 3533, 3),
(23, 222, 3534, 3),
(24, 222, 3535, 3),
(25, 222, 3536, 3),
(26, 222, 3537, 3),
(27, 222, 3538, 3),
(28, 222, 3539, 3),
(29, 222, 3540, 3),
(30, 222, 3541, 3),
(31, 222, 3542, 3),
(32, 222, 3543, 3),
(33, 222, 3544, 3),
(34, 222, 3545, 3),
(35, 222, 3546, 3),
(36, 222, 3547, 3),
(37, 222, 3548, 3),
(38, 222, 3549, 3),
(39, 222, 3550, 3),
(40, 222, 3551, 3),
(41, 222, 3552, 3),
(42, 222, 3553, 3),
(43, 222, 3554, 3),
(44, 222, 3555, 3),
(45, 222, 3556, 3),
(46, 222, 3557, 3),
(47, 222, 3558, 3),
(48, 222, 3559, 3),
(49, 222, 3560, 3),
(50, 222, 3561, 3),
(51, 222, 3562, 3),
(52, 222, 3563, 3),
(53, 222, 3564, 3),
(54, 222, 3565, 3),
(55, 222, 3566, 3),
(56, 222, 3567, 3),
(57, 222, 3568, 3),
(58, 222, 3569, 3),
(59, 222, 3570, 3),
(60, 222, 3571, 3),
(61, 222, 3572, 3),
(62, 222, 3573, 3),
(63, 222, 3574, 3),
(64, 222, 3575, 3),
(65, 222, 3576, 3),
(66, 222, 3577, 3),
(67, 222, 3578, 3),
(68, 222, 3579, 3),
(69, 222, 3580, 3),
(70, 222, 3581, 3),
(71, 222, 3582, 3),
(72, 222, 3583, 3),
(73, 222, 3584, 3),
(74, 222, 3585, 3),
(75, 222, 3586, 3),
(76, 222, 3587, 3),
(77, 222, 3588, 3),
(78, 222, 3589, 3),
(79, 222, 3590, 3),
(80, 222, 3591, 3),
(81, 222, 3592, 3),
(82, 222, 3593, 3),
(83, 222, 3594, 3),
(84, 222, 3595, 3),
(85, 222, 3596, 3),
(86, 222, 3597, 3),
(87, 222, 3598, 3),
(88, 222, 3599, 3),
(89, 222, 3600, 3),
(90, 222, 3601, 3),
(91, 222, 3602, 3),
(92, 222, 3603, 3),
(93, 222, 3604, 3),
(94, 222, 3605, 3),
(95, 222, 3606, 3),
(96, 222, 3607, 3),
(97, 222, 3608, 3),
(98, 222, 3609, 3),
(99, 222, 3610, 3),
(100, 222, 3611, 3),
(101, 222, 3612, 3),
(102, 222, 3949, 3),
(103, 222, 3950, 3),
(104, 222, 3951, 3),
(105, 222, 3952, 3),
(106, 222, 3953, 3),
(107, 222, 3954, 3),
(108, 222, 3955, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ve_address`
--
ALTER TABLE `ve_address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `ve_address_format`
--
ALTER TABLE `ve_address_format`
  ADD PRIMARY KEY (`address_format_id`);

--
-- Indexes for table `ve_antispam`
--
ALTER TABLE `ve_antispam`
  ADD PRIMARY KEY (`antispam_id`),
  ADD KEY `keyword` (`keyword`);

--
-- Indexes for table `ve_api`
--
ALTER TABLE `ve_api`
  ADD PRIMARY KEY (`api_id`);

--
-- Indexes for table `ve_api_ip`
--
ALTER TABLE `ve_api_ip`
  ADD PRIMARY KEY (`api_ip_id`),
  ADD KEY `fk_ve_api_ip_api_id` (`api_id`);

--
-- Indexes for table `ve_api_session`
--
ALTER TABLE `ve_api_session`
  ADD PRIMARY KEY (`api_session_id`),
  ADD KEY `fk_ve_api_session_api_id` (`api_id`);

--
-- Indexes for table `ve_article`
--
ALTER TABLE `ve_article`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `ve_article_comment`
--
ALTER TABLE `ve_article_comment`
  ADD PRIMARY KEY (`article_comment_id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `fk_ve_article_comment_customer_id` (`customer_id`);

--
-- Indexes for table `ve_article_description`
--
ALTER TABLE `ve_article_description`
  ADD PRIMARY KEY (`article_id`,`language_id`),
  ADD KEY `name` (`name`),
  ADD KEY `fk_ve_article_description_language_id` (`language_id`);

--
-- Indexes for table `ve_article_rating`
--
ALTER TABLE `ve_article_rating`
  ADD PRIMARY KEY (`article_rating_id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `article_comment_id` (`article_comment_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `ve_article_to_layout`
--
ALTER TABLE `ve_article_to_layout`
  ADD PRIMARY KEY (`article_id`,`store_id`),
  ADD KEY `fk_ve_article_to_layout_store_id` (`store_id`),
  ADD KEY `fk_ve_article_to_layout_layout_id` (`layout_id`);

--
-- Indexes for table `ve_article_to_store`
--
ALTER TABLE `ve_article_to_store`
  ADD PRIMARY KEY (`article_id`,`store_id`),
  ADD KEY `fk_ve_article_to_store_store_id` (`store_id`);

--
-- Indexes for table `ve_attribute`
--
ALTER TABLE `ve_attribute`
  ADD PRIMARY KEY (`attribute_id`);

--
-- Indexes for table `ve_attribute_description`
--
ALTER TABLE `ve_attribute_description`
  ADD PRIMARY KEY (`attribute_id`,`language_id`),
  ADD KEY `fk_ve_attribute_description_language_id` (`language_id`);

--
-- Indexes for table `ve_banner`
--
ALTER TABLE `ve_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `ve_banner_image`
--
ALTER TABLE `ve_banner_image`
  ADD PRIMARY KEY (`banner_image_id`),
  ADD KEY `fk_ve_banner_image_banner_id` (`banner_id`),
  ADD KEY `fk_ve_banner_image_language_id` (`language_id`);

--
-- Indexes for table `ve_cart`
--
ALTER TABLE `ve_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_id` (`api_id`,`customer_id`,`session_id`,`product_id`,`subscription_plan_id`),
  ADD KEY `fk_ve_cart_customer_id` (`customer_id`),
  ADD KEY `fk_ve_cart_session_id` (`session_id`),
  ADD KEY `fk_ve_cart_product_id` (`product_id`),
  ADD KEY `fk_ve_cart_subscription_plan_id` (`subscription_plan_id`);

--
-- Indexes for table `ve_category`
--
ALTER TABLE `ve_category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `ve_category_description`
--
ALTER TABLE `ve_category_description`
  ADD PRIMARY KEY (`category_id`,`language_id`),
  ADD KEY `name` (`name`),
  ADD KEY `fk_ve_category_description_language_id` (`language_id`);

--
-- Indexes for table `ve_category_filter`
--
ALTER TABLE `ve_category_filter`
  ADD PRIMARY KEY (`category_id`,`filter_id`),
  ADD KEY `fk_ve_category_filter_filter_id` (`filter_id`);

--
-- Indexes for table `ve_category_path`
--
ALTER TABLE `ve_category_path`
  ADD PRIMARY KEY (`category_id`,`path_id`);

--
-- Indexes for table `ve_category_to_layout`
--
ALTER TABLE `ve_category_to_layout`
  ADD PRIMARY KEY (`category_id`,`store_id`),
  ADD KEY `fk_ve_category_to_layout_layout_id` (`layout_id`),
  ADD KEY `fk_ve_category_to_layout_store_id` (`store_id`);

--
-- Indexes for table `ve_category_to_store`
--
ALTER TABLE `ve_category_to_store`
  ADD PRIMARY KEY (`category_id`,`store_id`),
  ADD KEY `fk_ve_category_to_store_store_id` (`store_id`);

--
-- Indexes for table `ve_country`
--
ALTER TABLE `ve_country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `ve_coupon`
--
ALTER TABLE `ve_coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `ve_coupon_category`
--
ALTER TABLE `ve_coupon_category`
  ADD PRIMARY KEY (`coupon_id`,`category_id`),
  ADD KEY `fk_ve_coupon_category_category_id` (`category_id`);

--
-- Indexes for table `ve_coupon_history`
--
ALTER TABLE `ve_coupon_history`
  ADD PRIMARY KEY (`coupon_history_id`),
  ADD KEY `fk_ve_coupon_history_coupon_id` (`coupon_id`),
  ADD KEY `fk_ve_coupon_history_order_id` (`order_id`),
  ADD KEY `fk_ve_coupon_history_customer_id` (`customer_id`);

--
-- Indexes for table `ve_coupon_product`
--
ALTER TABLE `ve_coupon_product`
  ADD PRIMARY KEY (`coupon_product_id`),
  ADD KEY `fk_ve_coupon_product_coupon_id` (`coupon_id`),
  ADD KEY `fk_ve_coupon_product_product_id` (`product_id`);

--
-- Indexes for table `ve_cron`
--
ALTER TABLE `ve_cron`
  ADD PRIMARY KEY (`cron_id`);

--
-- Indexes for table `ve_currency`
--
ALTER TABLE `ve_currency`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `ve_customer`
--
ALTER TABLE `ve_customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `email` (`email`),
  ADD KEY `fk_ve_customer_customer_group_id` (`customer_group_id`),
  ADD KEY `fk_ve_customer_store_id` (`store_id`),
  ADD KEY `fk_ve_customer_language_id` (`language_id`);

--
-- Indexes for table `ve_customer_activity`
--
ALTER TABLE `ve_customer_activity`
  ADD PRIMARY KEY (`customer_activity_id`),
  ADD KEY `fk_ve_customer_activity_customer_id` (`customer_id`);

--
-- Indexes for table `ve_customer_affiliate`
--
ALTER TABLE `ve_customer_affiliate`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `ve_customer_affiliate_report`
--
ALTER TABLE `ve_customer_affiliate_report`
  ADD PRIMARY KEY (`customer_affiliate_report_id`),
  ADD KEY `fk_ve_customer_affiliate_report_customer_id` (`customer_id`),
  ADD KEY `fk_ve_customer_affiliate_report_store_id` (`store_id`);

--
-- Indexes for table `ve_customer_approval`
--
ALTER TABLE `ve_customer_approval`
  ADD PRIMARY KEY (`customer_approval_id`),
  ADD KEY `fk_ve_customer_approval_customer_id` (`customer_id`);

--
-- Indexes for table `ve_customer_authorize`
--
ALTER TABLE `ve_customer_authorize`
  ADD PRIMARY KEY (`customer_authorize_id`);

--
-- Indexes for table `ve_customer_group`
--
ALTER TABLE `ve_customer_group`
  ADD PRIMARY KEY (`customer_group_id`);

--
-- Indexes for table `ve_customer_group_description`
--
ALTER TABLE `ve_customer_group_description`
  ADD PRIMARY KEY (`customer_group_id`,`language_id`),
  ADD KEY `fk_ve_customer_group_description_language_id` (`language_id`);

--
-- Indexes for table `ve_customer_history`
--
ALTER TABLE `ve_customer_history`
  ADD PRIMARY KEY (`customer_history_id`);

--
-- Indexes for table `ve_customer_ip`
--
ALTER TABLE `ve_customer_ip`
  ADD PRIMARY KEY (`customer_ip_id`),
  ADD KEY `ip` (`ip`);

--
-- Indexes for table `ve_customer_login`
--
ALTER TABLE `ve_customer_login`
  ADD PRIMARY KEY (`customer_login_id`),
  ADD KEY `email` (`email`),
  ADD KEY `ip` (`ip`);

--
-- Indexes for table `ve_customer_online`
--
ALTER TABLE `ve_customer_online`
  ADD PRIMARY KEY (`ip`);

--
-- Indexes for table `ve_customer_reward`
--
ALTER TABLE `ve_customer_reward`
  ADD PRIMARY KEY (`customer_reward_id`),
  ADD KEY `fk_ve_customer_reward_customer_id` (`customer_id`),
  ADD KEY `fk_ve_customer_reward_order_id` (`order_id`);

--
-- Indexes for table `ve_customer_search`
--
ALTER TABLE `ve_customer_search`
  ADD PRIMARY KEY (`customer_search_id`),
  ADD KEY `fk_ve_customer_search_store_id` (`store_id`),
  ADD KEY `fk_ve_customer_search_language_id` (`language_id`),
  ADD KEY `fk_ve_customer_search_customer_id` (`customer_id`),
  ADD KEY `fk_ve_customer_search_category_id` (`category_id`);

--
-- Indexes for table `ve_customer_transaction`
--
ALTER TABLE `ve_customer_transaction`
  ADD PRIMARY KEY (`customer_transaction_id`),
  ADD KEY `fk_ve_customer_transaction_customer_id` (`customer_id`),
  ADD KEY `fk_ve_customer_transaction_order_id` (`order_id`);

--
-- Indexes for table `ve_customer_wishlist`
--
ALTER TABLE `ve_customer_wishlist`
  ADD PRIMARY KEY (`customer_id`,`product_id`),
  ADD KEY `fk_ve_customer_wishlist_product_id` (`product_id`);

--
-- Indexes for table `ve_custom_field`
--
ALTER TABLE `ve_custom_field`
  ADD PRIMARY KEY (`custom_field_id`);

--
-- Indexes for table `ve_custom_field_customer_group`
--
ALTER TABLE `ve_custom_field_customer_group`
  ADD PRIMARY KEY (`custom_field_id`,`customer_group_id`),
  ADD KEY `fk_ve_custom_field_customer_group_customer_group_id` (`customer_group_id`);

--
-- Indexes for table `ve_custom_field_description`
--
ALTER TABLE `ve_custom_field_description`
  ADD PRIMARY KEY (`custom_field_id`,`language_id`),
  ADD KEY `fk_ve_custom_field_description_language_id` (`language_id`);

--
-- Indexes for table `ve_custom_field_value`
--
ALTER TABLE `ve_custom_field_value`
  ADD PRIMARY KEY (`custom_field_value_id`),
  ADD KEY `fk_ve_custom_field_value_custom_field_id` (`custom_field_id`);

--
-- Indexes for table `ve_custom_field_value_description`
--
ALTER TABLE `ve_custom_field_value_description`
  ADD PRIMARY KEY (`custom_field_value_id`,`language_id`),
  ADD KEY `fk_ve_custom_field_value_description_language_id` (`language_id`),
  ADD KEY `fk_ve_custom_field_value_description_custom_field_id` (`custom_field_id`);

--
-- Indexes for table `ve_download`
--
ALTER TABLE `ve_download`
  ADD PRIMARY KEY (`download_id`);

--
-- Indexes for table `ve_download_description`
--
ALTER TABLE `ve_download_description`
  ADD PRIMARY KEY (`download_id`,`language_id`),
  ADD KEY `fk_ve_download_description_language_id` (`language_id`);

--
-- Indexes for table `ve_download_report`
--
ALTER TABLE `ve_download_report`
  ADD PRIMARY KEY (`download_report_id`),
  ADD KEY `fk_ve_download_report_download_id` (`download_id`),
  ADD KEY `fk_ve_download_report_store_id` (`store_id`);

--
-- Indexes for table `ve_event`
--
ALTER TABLE `ve_event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `ve_extension`
--
ALTER TABLE `ve_extension`
  ADD PRIMARY KEY (`extension_id`);

--
-- Indexes for table `ve_extension_install`
--
ALTER TABLE `ve_extension_install`
  ADD PRIMARY KEY (`extension_install_id`),
  ADD KEY `fk_ve_extension_install_extension_id` (`extension_id`);

--
-- Indexes for table `ve_extension_path`
--
ALTER TABLE `ve_extension_path`
  ADD PRIMARY KEY (`extension_path_id`),
  ADD KEY `path` (`path`),
  ADD KEY `fk_ve_extension_path_extension_install_id` (`extension_install_id`);

--
-- Indexes for table `ve_filter`
--
ALTER TABLE `ve_filter`
  ADD PRIMARY KEY (`filter_id`),
  ADD KEY `fk_ve_filter_filter_group_id` (`filter_group_id`);

--
-- Indexes for table `ve_filter_description`
--
ALTER TABLE `ve_filter_description`
  ADD PRIMARY KEY (`filter_id`,`language_id`),
  ADD KEY `fk_ve_filter_description_language_id` (`language_id`),
  ADD KEY `fk_ve_filter_description_filter_group_id` (`filter_group_id`);

--
-- Indexes for table `ve_filter_group`
--
ALTER TABLE `ve_filter_group`
  ADD PRIMARY KEY (`filter_group_id`);

--
-- Indexes for table `ve_filter_group_description`
--
ALTER TABLE `ve_filter_group_description`
  ADD PRIMARY KEY (`filter_group_id`,`language_id`),
  ADD KEY `fk_ve_filter_group_description_language_id` (`language_id`);

--
-- Indexes for table `ve_gdpr`
--
ALTER TABLE `ve_gdpr`
  ADD PRIMARY KEY (`gdpr_id`),
  ADD KEY `fk_ve_gdpr_store_id` (`store_id`),
  ADD KEY `fk_ve_gdpr_language_id` (`language_id`);

--
-- Indexes for table `ve_geo_zone`
--
ALTER TABLE `ve_geo_zone`
  ADD PRIMARY KEY (`geo_zone_id`);

--
-- Indexes for table `ve_information`
--
ALTER TABLE `ve_information`
  ADD PRIMARY KEY (`information_id`);

--
-- Indexes for table `ve_information_description`
--
ALTER TABLE `ve_information_description`
  ADD PRIMARY KEY (`information_id`,`language_id`),
  ADD KEY `fk_ve_information_description_language_id` (`language_id`);

--
-- Indexes for table `ve_information_to_layout`
--
ALTER TABLE `ve_information_to_layout`
  ADD PRIMARY KEY (`information_id`,`store_id`),
  ADD KEY `fk_ve_information_to_layout_store_id` (`store_id`),
  ADD KEY `fk_ve_information_to_layout_layout_id` (`layout_id`);

--
-- Indexes for table `ve_information_to_store`
--
ALTER TABLE `ve_information_to_store`
  ADD PRIMARY KEY (`information_id`,`store_id`);

--
-- Indexes for table `ve_language`
--
ALTER TABLE `ve_language`
  ADD PRIMARY KEY (`language_id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `ve_layout`
--
ALTER TABLE `ve_layout`
  ADD PRIMARY KEY (`layout_id`);

--
-- Indexes for table `ve_layout_module`
--
ALTER TABLE `ve_layout_module`
  ADD PRIMARY KEY (`layout_module_id`),
  ADD KEY `fk_ve_layout_module_layout_id` (`layout_id`);

--
-- Indexes for table `ve_layout_route`
--
ALTER TABLE `ve_layout_route`
  ADD PRIMARY KEY (`layout_route_id`),
  ADD KEY `fk_ve_layout_route_layout_id` (`layout_id`);

--
-- Indexes for table `ve_length_class`
--
ALTER TABLE `ve_length_class`
  ADD PRIMARY KEY (`length_class_id`);

--
-- Indexes for table `ve_length_class_description`
--
ALTER TABLE `ve_length_class_description`
  ADD PRIMARY KEY (`length_class_id`,`language_id`),
  ADD KEY `fk_ve_length_class_description_language_id` (`language_id`);

--
-- Indexes for table `ve_location`
--
ALTER TABLE `ve_location`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `ve_manufacturer`
--
ALTER TABLE `ve_manufacturer`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `ve_manufacturer_to_layout`
--
ALTER TABLE `ve_manufacturer_to_layout`
  ADD PRIMARY KEY (`manufacturer_id`,`store_id`),
  ADD KEY `fk_ve_manufacturer_to_layout_store_id` (`store_id`),
  ADD KEY `fk_ve_manufacturer_to_layout_layout_id` (`layout_id`);

--
-- Indexes for table `ve_manufacturer_to_store`
--
ALTER TABLE `ve_manufacturer_to_store`
  ADD PRIMARY KEY (`manufacturer_id`,`store_id`);

--
-- Indexes for table `ve_marketing`
--
ALTER TABLE `ve_marketing`
  ADD PRIMARY KEY (`marketing_id`);

--
-- Indexes for table `ve_marketing_report`
--
ALTER TABLE `ve_marketing_report`
  ADD PRIMARY KEY (`marketing_report_id`),
  ADD KEY `fk_ve_marketing_report_marketing_id` (`marketing_id`),
  ADD KEY `fk_ve_marketing_report_store_id` (`store_id`);

--
-- Indexes for table `ve_modification`
--
ALTER TABLE `ve_modification`
  ADD PRIMARY KEY (`modification_id`);

--
-- Indexes for table `ve_module`
--
ALTER TABLE `ve_module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `ve_notification`
--
ALTER TABLE `ve_notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `ve_options`
--
ALTER TABLE `ve_options`
  ADD PRIMARY KEY (`option_id`);

CREATE INDEX idx_ve_options_language_id ON ve_options (language_id);
CREATE INDEX idx_ve_options_group_id ON ve_options (group_id);
CREATE INDEX idx_ve_options_group_option_language ON ve_options (group_id, option_n, language_id);



--
-- Indexes for table `ve_order`
--
ALTER TABLE `ve_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `email` (`email`),
  ADD KEY `fk_ve_order_store_id` (`store_id`),
  ADD KEY `fk_ve_order_customer_id` (`customer_id`),
  ADD KEY `fk_ve_order_customer_group_id` (`customer_group_id`),
  ADD KEY `fk_ve_order_payment_country_id` (`payment_country_id`),
  ADD KEY `fk_ve_order_payment_zone_id` (`payment_zone_id`),
  ADD KEY `fk_ve_order_shipping_country_id` (`shipping_country_id`),
  ADD KEY `fk_ve_order_shipping_zone_id` (`shipping_zone_id`),
  ADD KEY `fk_ve_order_order_status_id` (`order_status_id`),
  ADD KEY `fk_ve_order_affiliate_id` (`affiliate_id`),
  ADD KEY `fk_ve_order_marketing_id` (`marketing_id`),
  ADD KEY `fk_ve_order_language_id` (`language_id`),
  ADD KEY `fk_ve_order_currency_id` (`currency_id`);

--
-- Indexes for table `ve_order_history`
--
ALTER TABLE `ve_order_history`
  ADD PRIMARY KEY (`order_history_id`),
  ADD KEY `fk_ve_order_history_order_id` (`order_id`),
  ADD KEY `fk_ve_order_history_order_status_id` (`order_status_id`);

--
-- Indexes for table `ve_order_option`
--
ALTER TABLE `ve_order_option`
  ADD PRIMARY KEY (`order_option_id`),
  ADD KEY `fk_ve_order_option_order_id` (`order_id`),
  ADD KEY `fk_ve_order_option_order_product_id` (`order_product_id`),
  ADD KEY `fk_ve_order_option_poption_id` (`poption_id`);

--
-- Indexes for table `ve_order_product`
--
ALTER TABLE `ve_order_product`
  ADD PRIMARY KEY (`order_product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `fk_ve_order_product_product_id` (`product_id`);

--
-- Indexes for table `ve_order_status`
--
ALTER TABLE `ve_order_status`
  ADD PRIMARY KEY (`order_status_id`,`language_id`);

--
-- Indexes for table `ve_order_subscription`
--
ALTER TABLE `ve_order_subscription`
  ADD PRIMARY KEY (`order_subscription_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `ve_order_total`
--
ALTER TABLE `ve_order_total`
  ADD PRIMARY KEY (`order_total_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `ve_order_voucher`
--
ALTER TABLE `ve_order_voucher`
  ADD PRIMARY KEY (`order_voucher_id`);

--
-- Indexes for table `ve_product`
--
ALTER TABLE `ve_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `ve_product_attribute`
--
ALTER TABLE `ve_product_attribute`
  ADD PRIMARY KEY (`product_id`,`attribute_id`,`language_id`);

--
-- Indexes for table `ve_product_bestseller`
--
ALTER TABLE `ve_product_bestseller`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `ve_product_description`
--
ALTER TABLE `ve_product_description`
  ADD PRIMARY KEY (`product_id`,`language_id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `ve_product_discount`
--
ALTER TABLE `ve_product_discount`
  ADD PRIMARY KEY (`product_discount_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `ve_product_filter`
--
ALTER TABLE `ve_product_filter`
  ADD PRIMARY KEY (`product_id`,`filter_id`);

--
-- Indexes for table `ve_product_image`
--
ALTER TABLE `ve_product_image`
  ADD PRIMARY KEY (`product_image_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `ve_product_options`
--
ALTER TABLE `ve_product_options`
  ADD PRIMARY KEY (`poption_id`),
  ADD KEY `ve_product_options_ibfk_1` (`product_id`),
  ADD KEY `fk_ve_product_options_option_id` (`option_id`);

--
-- Indexes for table `ve_product_related`
--
ALTER TABLE `ve_product_related`
  ADD PRIMARY KEY (`product_id`,`related_id`);

--
-- Indexes for table `ve_product_report`
--
ALTER TABLE `ve_product_report`
  ADD PRIMARY KEY (`product_report_id`);

--
-- Indexes for table `ve_product_reward`
--
ALTER TABLE `ve_product_reward`
  ADD PRIMARY KEY (`product_reward_id`);

--
-- Indexes for table `ve_product_subscription`
--
ALTER TABLE `ve_product_subscription`
  ADD PRIMARY KEY (`product_id`,`subscription_plan_id`,`customer_group_id`);

--
-- Indexes for table `ve_product_to_category`
--
ALTER TABLE `ve_product_to_category`
  ADD PRIMARY KEY (`product_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `ve_product_to_download`
--
ALTER TABLE `ve_product_to_download`
  ADD PRIMARY KEY (`product_id`,`download_id`);

--
-- Indexes for table `ve_product_to_layout`
--
ALTER TABLE `ve_product_to_layout`
  ADD PRIMARY KEY (`product_id`,`store_id`);

--
-- Indexes for table `ve_product_to_store`
--
ALTER TABLE `ve_product_to_store`
  ADD PRIMARY KEY (`product_id`,`store_id`);

--
-- Indexes for table `ve_product_viewed`
--
ALTER TABLE `ve_product_viewed`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `ve_return`
--
ALTER TABLE `ve_return`
  ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `ve_return_action`
--
ALTER TABLE `ve_return_action`
  ADD PRIMARY KEY (`return_action_id`,`language_id`);

--
-- Indexes for table `ve_return_history`
--
ALTER TABLE `ve_return_history`
  ADD PRIMARY KEY (`return_history_id`);

--
-- Indexes for table `ve_return_reason`
--
ALTER TABLE `ve_return_reason`
  ADD PRIMARY KEY (`return_reason_id`,`language_id`);

--
-- Indexes for table `ve_return_status`
--
ALTER TABLE `ve_return_status`
  ADD PRIMARY KEY (`return_status_id`,`language_id`);

--
-- Indexes for table `ve_review`
--
ALTER TABLE `ve_review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `ve_seo_url`
--
ALTER TABLE `ve_seo_url`
  ADD PRIMARY KEY (`seo_url_id`),
  ADD KEY `keyword` (`keyword`),
  ADD KEY `query` (`key`,`value`);

--
-- Indexes for table `ve_session`
--
ALTER TABLE `ve_session`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `expire` (`expire`);

--
-- Indexes for table `ve_setting`
--
ALTER TABLE `ve_setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `ve_startup`
--
ALTER TABLE `ve_startup`
  ADD PRIMARY KEY (`startup_id`);

--
-- Indexes for table `ve_statistics`
--
ALTER TABLE `ve_statistics`
  ADD PRIMARY KEY (`statistics_id`);

--
-- Indexes for table `ve_stock_status`
--
ALTER TABLE `ve_stock_status`
  ADD PRIMARY KEY (`stock_status_id`,`language_id`);

--
-- Indexes for table `ve_store`
--
ALTER TABLE `ve_store`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `ve_subscription`
--
ALTER TABLE `ve_subscription`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `ve_subscription_history`
--
ALTER TABLE `ve_subscription_history`
  ADD PRIMARY KEY (`subscription_history_id`);

--
-- Indexes for table `ve_subscription_plan`
--
ALTER TABLE `ve_subscription_plan`
  ADD PRIMARY KEY (`subscription_plan_id`);

--
-- Indexes for table `ve_subscription_plan_description`
--
ALTER TABLE `ve_subscription_plan_description`
  ADD PRIMARY KEY (`subscription_plan_id`,`language_id`);

--
-- Indexes for table `ve_subscription_status`
--
ALTER TABLE `ve_subscription_status`
  ADD PRIMARY KEY (`subscription_status_id`,`language_id`);

--
-- Indexes for table `ve_tax_class`
--
ALTER TABLE `ve_tax_class`
  ADD PRIMARY KEY (`tax_class_id`);

--
-- Indexes for table `ve_tax_rate`
--
ALTER TABLE `ve_tax_rate`
  ADD PRIMARY KEY (`tax_rate_id`);

--
-- Indexes for table `ve_tax_rate_to_customer_group`
--
ALTER TABLE `ve_tax_rate_to_customer_group`
  ADD PRIMARY KEY (`tax_rate_id`,`customer_group_id`);

--
-- Indexes for table `ve_tax_rule`
--
ALTER TABLE `ve_tax_rule`
  ADD PRIMARY KEY (`tax_rule_id`);

--
-- Indexes for table `ve_theme`
--
ALTER TABLE `ve_theme`
  ADD PRIMARY KEY (`theme_id`);

--
-- Indexes for table `ve_topic`
--
ALTER TABLE `ve_topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `ve_topic_description`
--
ALTER TABLE `ve_topic_description`
  ADD PRIMARY KEY (`topic_id`,`language_id`),
  ADD KEY `name` (`name`),
  ADD KEY `fk_ve_topic_description_language_id` (`language_id`);

--
-- Indexes for table `ve_topic_to_store`
--
ALTER TABLE `ve_topic_to_store`
  ADD PRIMARY KEY (`topic_id`,`store_id`),
  ADD KEY `fk_ve_topic_to_store_store_id` (`store_id`);

--
-- Indexes for table `ve_translation`
--
ALTER TABLE `ve_translation`
  ADD PRIMARY KEY (`translation_id`);

--
-- Indexes for table `ve_upload`
--
ALTER TABLE `ve_upload`
  ADD PRIMARY KEY (`upload_id`);

--
-- Indexes for table `ve_user`
--
ALTER TABLE `ve_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `ve_user_authorize`
--
ALTER TABLE `ve_user_authorize`
  ADD PRIMARY KEY (`user_authorize_id`);

--
-- Indexes for table `ve_user_group`
--
ALTER TABLE `ve_user_group`
  ADD PRIMARY KEY (`user_group_id`);

--
-- Indexes for table `ve_user_login`
--
ALTER TABLE `ve_user_login`
  ADD PRIMARY KEY (`user_login_id`);

--
-- Indexes for table `ve_variations`
--
ALTER TABLE `ve_variations`
  ADD PRIMARY KEY (`variation_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `ve_variation_options`
--
ALTER TABLE `ve_variation_options`
  ADD PRIMARY KEY (`var_opt_id`),
  ADD KEY `variation_id` (`variation_id`),
  ADD KEY `fk_ve_variation_options_p_opt_value_id` (`p_opt_value_id`);

--
-- Indexes for table `ve_voucher`
--
ALTER TABLE `ve_voucher`
  ADD PRIMARY KEY (`voucher_id`);

--
-- Indexes for table `ve_voucher_history`
--
ALTER TABLE `ve_voucher_history`
  ADD PRIMARY KEY (`voucher_history_id`);

--
-- Indexes for table `ve_voucher_theme`
--
ALTER TABLE `ve_voucher_theme`
  ADD PRIMARY KEY (`voucher_theme_id`);

--
-- Indexes for table `ve_voucher_theme_description`
--
ALTER TABLE `ve_voucher_theme_description`
  ADD PRIMARY KEY (`voucher_theme_id`,`language_id`);

--
-- Indexes for table `ve_weight_class`
--
ALTER TABLE `ve_weight_class`
  ADD PRIMARY KEY (`weight_class_id`);

--
-- Indexes for table `ve_weight_class_description`
--
ALTER TABLE `ve_weight_class_description`
  ADD PRIMARY KEY (`weight_class_id`,`language_id`);

--
-- Indexes for table `ve_zone`
--
ALTER TABLE `ve_zone`
  ADD PRIMARY KEY (`zone_id`);

--
-- Indexes for table `ve_zone_to_geo_zone`
--
ALTER TABLE `ve_zone_to_geo_zone`
  ADD PRIMARY KEY (`zone_to_geo_zone_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ve_address`
--
ALTER TABLE `ve_address`
  MODIFY `address_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_address_format`
--
ALTER TABLE `ve_address_format`
  MODIFY `address_format_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_antispam`
--
ALTER TABLE `ve_antispam`
  MODIFY `antispam_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_api`
--
ALTER TABLE `ve_api`
  MODIFY `api_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_api_ip`
--
ALTER TABLE `ve_api_ip`
  MODIFY `api_ip_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_api_session`
--
ALTER TABLE `ve_api_session`
  MODIFY `api_session_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_article`
--
ALTER TABLE `ve_article`
  MODIFY `article_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_article_comment`
--
ALTER TABLE `ve_article_comment`
  MODIFY `article_comment_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_attribute`
--
ALTER TABLE `ve_attribute`
  MODIFY `attribute_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_banner`
--
ALTER TABLE `ve_banner`
  MODIFY `banner_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_banner_image`
--
ALTER TABLE `ve_banner_image`
  MODIFY `banner_image_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_cart`
--
ALTER TABLE `ve_cart`
  MODIFY `cart_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_category`
--
ALTER TABLE `ve_category`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_country`
--
ALTER TABLE `ve_country`
  MODIFY `country_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_coupon`
--
ALTER TABLE `ve_coupon`
  MODIFY `coupon_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_coupon_history`
--
ALTER TABLE `ve_coupon_history`
  MODIFY `coupon_history_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_coupon_product`
--
ALTER TABLE `ve_coupon_product`
  MODIFY `coupon_product_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_cron`
--
ALTER TABLE `ve_cron`
  MODIFY `cron_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_currency`
--
ALTER TABLE `ve_currency`
  MODIFY `currency_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_customer`
--
ALTER TABLE `ve_customer`
  MODIFY `customer_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_customer_activity`
--
ALTER TABLE `ve_customer_activity`
  MODIFY `customer_activity_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_customer_affiliate_report`
--
ALTER TABLE `ve_customer_affiliate_report`
  MODIFY `customer_affiliate_report_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_customer_approval`
--
ALTER TABLE `ve_customer_approval`
  MODIFY `customer_approval_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_customer_authorize`
--
ALTER TABLE `ve_customer_authorize`
  MODIFY `customer_authorize_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_customer_group`
--
ALTER TABLE `ve_customer_group`
  MODIFY `customer_group_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_customer_history`
--
ALTER TABLE `ve_customer_history`
  MODIFY `customer_history_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_customer_ip`
--
ALTER TABLE `ve_customer_ip`
  MODIFY `customer_ip_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_customer_login`
--
ALTER TABLE `ve_customer_login`
  MODIFY `customer_login_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_customer_reward`
--
ALTER TABLE `ve_customer_reward`
  MODIFY `customer_reward_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_customer_search`
--
ALTER TABLE `ve_customer_search`
  MODIFY `customer_search_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_customer_transaction`
--
ALTER TABLE `ve_customer_transaction`
  MODIFY `customer_transaction_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_custom_field`
--
ALTER TABLE `ve_custom_field`
  MODIFY `custom_field_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_custom_field_value`
--
ALTER TABLE `ve_custom_field_value`
  MODIFY `custom_field_value_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_download`
--
ALTER TABLE `ve_download`
  MODIFY `download_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_download_report`
--
ALTER TABLE `ve_download_report`
  MODIFY `download_report_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_event`
--
ALTER TABLE `ve_event`
  MODIFY `event_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_extension`
--
ALTER TABLE `ve_extension`
  MODIFY `extension_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_extension_install`
--
ALTER TABLE `ve_extension_install`
  MODIFY `extension_install_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_extension_path`
--
ALTER TABLE `ve_extension_path`
  MODIFY `extension_path_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_filter`
--
ALTER TABLE `ve_filter`
  MODIFY `filter_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_filter_group`
--
ALTER TABLE `ve_filter_group`
  MODIFY `filter_group_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_gdpr`
--
ALTER TABLE `ve_gdpr`
  MODIFY `gdpr_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_geo_zone`
--
ALTER TABLE `ve_geo_zone`
  MODIFY `geo_zone_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_information`
--
ALTER TABLE `ve_information`
  MODIFY `information_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_language`
--
ALTER TABLE `ve_language`
  MODIFY `language_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_layout`
--
ALTER TABLE `ve_layout`
  MODIFY `layout_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_layout_module`
--
ALTER TABLE `ve_layout_module`
  MODIFY `layout_module_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_layout_route`
--
ALTER TABLE `ve_layout_route`
  MODIFY `layout_route_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_length_class`
--
ALTER TABLE `ve_length_class`
  MODIFY `length_class_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_location`
--
ALTER TABLE `ve_location`
  MODIFY `location_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_manufacturer`
--
ALTER TABLE `ve_manufacturer`
  MODIFY `manufacturer_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_marketing`
--
ALTER TABLE `ve_marketing`
  MODIFY `marketing_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_marketing_report`
--
ALTER TABLE `ve_marketing_report`
  MODIFY `marketing_report_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_modification`
--
ALTER TABLE `ve_modification`
  MODIFY `modification_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_module`
--
ALTER TABLE `ve_module`
  MODIFY `module_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_notification`
--
ALTER TABLE `ve_notification`
  MODIFY `notification_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_options`
--
ALTER TABLE `ve_options`
  MODIFY `option_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_order`
--
ALTER TABLE `ve_order`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_order_history`
--
ALTER TABLE `ve_order_history`
  MODIFY `order_history_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_order_option`
--
ALTER TABLE `ve_order_option`
  MODIFY `order_option_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_order_product`
--
ALTER TABLE `ve_order_product`
  MODIFY `order_product_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_order_status`
--
ALTER TABLE `ve_order_status`
  MODIFY `order_status_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_order_subscription`
--
ALTER TABLE `ve_order_subscription`
  MODIFY `order_subscription_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_order_total`
--
ALTER TABLE `ve_order_total`
  MODIFY `order_total_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_order_voucher`
--
ALTER TABLE `ve_order_voucher`
  MODIFY `order_voucher_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_product`
--
ALTER TABLE `ve_product`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_product_discount`
--
ALTER TABLE `ve_product_discount`
  MODIFY `product_discount_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_product_image`
--
ALTER TABLE `ve_product_image`
  MODIFY `product_image_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_product_options`
--
ALTER TABLE `ve_product_options`
  MODIFY `poption_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_product_report`
--
ALTER TABLE `ve_product_report`
  MODIFY `product_report_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_product_reward`
--
ALTER TABLE `ve_product_reward`
  MODIFY `product_reward_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_return`
--
ALTER TABLE `ve_return`
  MODIFY `return_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_return_action`
--
ALTER TABLE `ve_return_action`
  MODIFY `return_action_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_return_history`
--
ALTER TABLE `ve_return_history`
  MODIFY `return_history_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_return_reason`
--
ALTER TABLE `ve_return_reason`
  MODIFY `return_reason_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_return_status`
--
ALTER TABLE `ve_return_status`
  MODIFY `return_status_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_review`
--
ALTER TABLE `ve_review`
  MODIFY `review_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_seo_url`
--
ALTER TABLE `ve_seo_url`
  MODIFY `seo_url_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_setting`
--
ALTER TABLE `ve_setting`
  MODIFY `setting_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_startup`
--
ALTER TABLE `ve_startup`
  MODIFY `startup_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_statistics`
--
ALTER TABLE `ve_statistics`
  MODIFY `statistics_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_stock_status`
--
ALTER TABLE `ve_stock_status`
  MODIFY `stock_status_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_store`
--
ALTER TABLE `ve_store`
  MODIFY `store_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_subscription`
--
ALTER TABLE `ve_subscription`
  MODIFY `subscription_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_subscription_history`
--
ALTER TABLE `ve_subscription_history`
  MODIFY `subscription_history_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_subscription_plan`
--
ALTER TABLE `ve_subscription_plan`
  MODIFY `subscription_plan_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_subscription_status`
--
ALTER TABLE `ve_subscription_status`
  MODIFY `subscription_status_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_tax_class`
--
ALTER TABLE `ve_tax_class`
  MODIFY `tax_class_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_tax_rate`
--
ALTER TABLE `ve_tax_rate`
  MODIFY `tax_rate_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_tax_rule`
--
ALTER TABLE `ve_tax_rule`
  MODIFY `tax_rule_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_theme`
--
ALTER TABLE `ve_theme`
  MODIFY `theme_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_topic`
--
ALTER TABLE `ve_topic`
  MODIFY `topic_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_translation`
--
ALTER TABLE `ve_translation`
  MODIFY `translation_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_upload`
--
ALTER TABLE `ve_upload`
  MODIFY `upload_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_user`
--
ALTER TABLE `ve_user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_user_authorize`
--
ALTER TABLE `ve_user_authorize`
  MODIFY `user_authorize_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_user_group`
--
ALTER TABLE `ve_user_group`
  MODIFY `user_group_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_user_login`
--
ALTER TABLE `ve_user_login`
  MODIFY `user_login_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_variations`
--
ALTER TABLE `ve_variations`
  MODIFY `variation_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_variation_options`
--
ALTER TABLE `ve_variation_options`
  MODIFY `var_opt_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_voucher`
--
ALTER TABLE `ve_voucher`
  MODIFY `voucher_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_voucher_history`
--
ALTER TABLE `ve_voucher_history`
  MODIFY `voucher_history_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_voucher_theme`
--
ALTER TABLE `ve_voucher_theme`
  MODIFY `voucher_theme_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_weight_class`
--
ALTER TABLE `ve_weight_class`
  MODIFY `weight_class_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_zone`
--
ALTER TABLE `ve_zone`
  MODIFY `zone_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ve_zone_to_geo_zone`
--
ALTER TABLE `ve_zone_to_geo_zone`
  MODIFY `zone_to_geo_zone_id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ve_address`
--
ALTER TABLE `ve_address`
  ADD CONSTRAINT `fk_ve_address_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `ve_customer` (`customer_id`);

--
-- Constraints for table `ve_api_ip`
--
ALTER TABLE `ve_api_ip`
  ADD CONSTRAINT `fk_ve_api_ip_api_id` FOREIGN KEY (`api_id`) REFERENCES `ve_api` (`api_id`);

--
-- Constraints for table `ve_api_session`
--
ALTER TABLE `ve_api_session`
  ADD CONSTRAINT `fk_ve_api_session_api_id` FOREIGN KEY (`api_id`) REFERENCES `ve_api` (`api_id`);

--
-- Constraints for table `ve_article_comment`
--
ALTER TABLE `ve_article_comment`
  ADD CONSTRAINT `fk_ve_article_comment_article_id` FOREIGN KEY (`article_id`) REFERENCES `ve_article` (`article_id`),
  ADD CONSTRAINT `fk_ve_article_comment_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `ve_customer` (`customer_id`);

--
-- Constraints for table `ve_article_description`
--
ALTER TABLE `ve_article_description`
  ADD CONSTRAINT `fk_ve_article_description_language_id` FOREIGN KEY (`language_id`) REFERENCES `ve_language` (`language_id`);

--
-- Constraints for table `ve_article_rating`
--
ALTER TABLE `ve_article_rating`
  ADD CONSTRAINT `fk_ve_article_rating_article_comment_id` FOREIGN KEY (`article_comment_id`) REFERENCES `ve_article_comment` (`article_comment_id`),
  ADD CONSTRAINT `fk_ve_article_rating_article_id` FOREIGN KEY (`article_id`) REFERENCES `ve_article` (`article_id`),
  ADD CONSTRAINT `fk_ve_article_rating_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `ve_customer` (`customer_id`),
  ADD CONSTRAINT `fk_ve_article_rating_store_id` FOREIGN KEY (`store_id`) REFERENCES `ve_store` (`store_id`);

--
-- Constraints for table `ve_article_to_layout`
--
ALTER TABLE `ve_article_to_layout`
  ADD CONSTRAINT `fk_ve_article_to_layout_article_id` FOREIGN KEY (`article_id`) REFERENCES `ve_article` (`article_id`),
  ADD CONSTRAINT `fk_ve_article_to_layout_layout_id` FOREIGN KEY (`layout_id`) REFERENCES `ve_layout` (`layout_id`),
  ADD CONSTRAINT `fk_ve_article_to_layout_store_id` FOREIGN KEY (`store_id`) REFERENCES `ve_store` (`store_id`);

--
-- Constraints for table `ve_article_to_store`
--
ALTER TABLE `ve_article_to_store`
  ADD CONSTRAINT `fk_ve_article_to_store_article_id` FOREIGN KEY (`article_id`) REFERENCES `ve_article` (`article_id`),
  ADD CONSTRAINT `fk_ve_article_to_store_store_id` FOREIGN KEY (`store_id`) REFERENCES `ve_store` (`store_id`);

--
-- Constraints for table `ve_attribute_description`
--
ALTER TABLE `ve_attribute_description`
  ADD CONSTRAINT `fk_ve_attribute_description_attribute_id` FOREIGN KEY (`attribute_id`) REFERENCES `ve_attribute` (`attribute_id`),
  ADD CONSTRAINT `fk_ve_attribute_description_language_id` FOREIGN KEY (`language_id`) REFERENCES `ve_language` (`language_id`);

--
-- Constraints for table `ve_banner_image`
--
ALTER TABLE `ve_banner_image`
  ADD CONSTRAINT `fk_ve_banner_image_banner_id` FOREIGN KEY (`banner_id`) REFERENCES `ve_banner` (`banner_id`),
  ADD CONSTRAINT `fk_ve_banner_image_language_id` FOREIGN KEY (`language_id`) REFERENCES `ve_language` (`language_id`);

--
-- Constraints for table `ve_cart`
--
ALTER TABLE `ve_cart`
  ADD CONSTRAINT `fk_ve_cart_api_id` FOREIGN KEY (`api_id`) REFERENCES `ve_api` (`api_id`),
  ADD CONSTRAINT `fk_ve_cart_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `ve_customer` (`customer_id`),
  ADD CONSTRAINT `fk_ve_cart_product_id` FOREIGN KEY (`product_id`) REFERENCES `ve_product` (`product_id`),
  ADD CONSTRAINT `fk_ve_cart_session_id` FOREIGN KEY (`session_id`) REFERENCES `ve_session` (`session_id`),
  ADD CONSTRAINT `fk_ve_cart_subscription_plan_id` FOREIGN KEY (`subscription_plan_id`) REFERENCES `ve_subscription_plan` (`subscription_plan_id`);

--
-- Constraints for table `ve_category_description`
--
ALTER TABLE `ve_category_description`
  ADD CONSTRAINT `fk_ve_category_description_language_id` FOREIGN KEY (`language_id`) REFERENCES `ve_language` (`language_id`);

--
-- Constraints for table `ve_category_filter`
--
ALTER TABLE `ve_category_filter`
  ADD CONSTRAINT `fk_ve_category_filter_category_id` FOREIGN KEY (`category_id`) REFERENCES `ve_category` (`category_id`),
  ADD CONSTRAINT `fk_ve_category_filter_filter_id` FOREIGN KEY (`filter_id`) REFERENCES `ve_filter` (`filter_id`);

--
-- Constraints for table `ve_category_path`
--
ALTER TABLE `ve_category_path`
  ADD CONSTRAINT `fk_ve_category_path_category_id` FOREIGN KEY (`category_id`) REFERENCES `ve_category` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `ve_category_to_layout`
--
ALTER TABLE `ve_category_to_layout`
  ADD CONSTRAINT `fk_ve_category_to_layout_category_id` FOREIGN KEY (`category_id`) REFERENCES `ve_category` (`category_id`),
  ADD CONSTRAINT `fk_ve_category_to_layout_layout_id` FOREIGN KEY (`layout_id`) REFERENCES `ve_layout` (`layout_id`),
  ADD CONSTRAINT `fk_ve_category_to_layout_store_id` FOREIGN KEY (`store_id`) REFERENCES `ve_store` (`store_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
