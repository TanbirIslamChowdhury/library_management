-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2025 at 09:07 AM
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
-- Database: `library_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `nid` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 active 0 deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `contact_no`, `email`, `gender`, `nid`, `dob`, `address`, `password`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Ibrahim khalil', '0156669998', 'kamal@yahoo.com', NULL, NULL, NULL, NULL, '356a192b7913b04c54574d18c28d46e6395428ab', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 active 0 deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Ibrahim khalil', 'Rem', 1, '2025-06-20 23:33:48', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `publisher_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT NULL,
  `is_populer` tinyint(1) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `offer_price` decimal(10,2) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 active 0 deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `category_id`, `publisher_id`, `name`, `author_id`, `is_featured`, `is_populer`, `price`, `offer_price`, `description`, `image`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 2, 'Computer', 1, 1, 1, '5000.00', '4000.00', 'laksdjfljkjhas dlf', 'images/17504777043466man.jpg', 1, '2025-06-20 23:48:24', NULL, 1, NULL),
(2, 1, 2, 'kamal', 1, 1, 1, '200.00', NULL, 'laksjdfkl', 'images/17504781659728pexels-josh-sorenson-1334597.jpg', 1, '2025-06-20 23:56:05', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book_purchase`
--

CREATE TABLE `book_purchase` (
  `id` int(11) NOT NULL,
  `publisher_id` int(11) DEFAULT NULL,
  `purchase_date` datetime DEFAULT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_purchase`
--

INSERT INTO `book_purchase` (`id`, `publisher_id`, `purchase_date`, `price`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(3, 2, '2025-06-21 00:00:00', '14950.00', 1, '2025-06-21 00:32:03', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book_purchase_items`
--

CREATE TABLE `book_purchase_items` (
  `id` int(11) NOT NULL,
  `book_purchase_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 active 0 deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_purchase_items`
--

INSERT INTO `book_purchase_items` (`id`, `book_purchase_id`, `book_id`, `quantity`, `price`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 3, 2, 5, '230.00', 1, '2025-06-21 00:32:03', NULL, 1, NULL),
(2, 3, 1, 60, '230.00', 1, '2025-06-21 00:32:03', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 active 0 deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'S', 's', 1, '2025-06-20 23:45:14', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `coupon_code` text NOT NULL,
  `validity_date` date NOT NULL,
  `amount_type` int(11) NOT NULL COMMENT '1 fix 2 percent',
  `amount` decimal(10,2) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `name`, `coupon_code`, `validity_date`, `amount_type`, `amount`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Rain', 'RAIN25', '2025-07-31', 2, '25.00', 1, '2025-06-25 00:45:51', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_man`
--

CREATE TABLE `delivery_man` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `nid` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 active 0 deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_man`
--

INSERT INTO `delivery_man` (`id`, `name`, `contact_no`, `email`, `gender`, `nid`, `dob`, `address`, `password`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Ibrahim khalil', '0156669998', 'kamal@yahoo.com', '', '', '0000-00-00', '', '123', 1, '2025-06-03 02:39:33', '2025-06-25 02:29:06', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `division_id`, `name`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 'Cumilla', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2, 1, 'Feni', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(3, 1, 'Brahmanbaria', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(4, 1, 'Rangamati', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(5, 1, 'Noakhali', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(6, 1, 'Chandpur', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(7, 1, 'Lakshmipur', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(8, 1, 'Chattogram', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(9, 1, 'Coxsbazar', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(10, 1, 'Khagrachhari', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(11, 1, 'Bandarban', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(12, 2, 'Sirajganj', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(13, 2, 'Pabna', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(14, 2, 'Bogura', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(15, 2, 'Rajshahi', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(16, 2, 'Natore', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(17, 2, 'Joypurhat', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(18, 2, 'Chapainawabganj', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(19, 2, 'Naogaon', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(20, 3, 'Jashore', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(21, 3, 'Satkhira', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(22, 3, 'Meherpur', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(23, 3, 'Narail', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(24, 3, 'Chuadanga', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(25, 3, 'Kushtia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(26, 3, 'Magura', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(27, 3, 'Khulna', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(28, 3, 'Bagerhat', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(29, 3, 'Jhenaidah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(30, 4, 'Jhalakathi', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(31, 4, 'Patuakhali', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(32, 4, 'Pirojpur', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(33, 4, 'Barisal', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(34, 4, 'Bhola', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(35, 4, 'Barguna', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(36, 5, 'Sylhet', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(37, 5, 'Moulvibazar', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(38, 5, 'Habiganj', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(39, 5, 'Sunamganj', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(40, 6, 'Narsingdi', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(41, 6, 'Gazipur', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(42, 6, 'Shariatpur', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(43, 6, 'Narayanganj', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(44, 6, 'Tangail', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(45, 6, 'Kishoreganj', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(46, 6, 'Manikganj', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(47, 6, 'Dhaka', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(48, 6, 'Munshiganj', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(49, 6, 'Rajbari', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(50, 6, 'Madaripur', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(51, 6, 'Gopalganj', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(52, 6, 'Faridpur', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(53, 7, 'Panchagarh', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(54, 7, 'Dinajpur', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(55, 7, 'Lalmonirhat', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(56, 7, 'Nilphamari', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(57, 7, 'Gaibandha', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(58, 7, 'Thakurgaon', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(59, 7, 'Rangpur', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(60, 7, 'Kurigram', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(61, 8, 'Sherpur', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(62, 8, 'Mymensingh', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(63, 8, 'Jamalpur', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(64, 8, 'Netrokona', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id`, `name`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Chattagram', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2, 'Rajshahi', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(3, 'Khulna', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(4, 'Barisal', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(5, 'Sylhet', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(6, 'Dhaka', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(7, 'Rangpur', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(8, 'Mymensingh', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_amount` decimal(7,2) DEFAULT NULL,
  `shipping_charge` decimal(10,2) DEFAULT NULL,
  `discount_amount` decimal(10,2) DEFAULT NULL,
  `discount_amount_final` decimal(10,2) DEFAULT 0.00,
  `grand_total` decimal(10,2) DEFAULT 0.00,
  `discount_type` int(11) DEFAULT 1 COMMENT '1 fix 2 percent',
  `cupon` varchar(255) DEFAULT NULL,
  `total_item` int(11) DEFAULT 0,
  `order_date` datetime DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `delivery_status` int(11) DEFAULT NULL COMMENT '1 pending 2 processing 3 on the way 4 delivered 5 canceled',
  `status` int(11) DEFAULT NULL,
  `cancel_request` int(11) DEFAULT 0 COMMENT '0 no 1 yes',
  `cancel_reason` text DEFAULT NULL,
  `delivery_man_id` int(11) DEFAULT NULL,
  `delivery_man_comment` text DEFAULT NULL,
  `shipping_method` int(11) DEFAULT NULL,
  `shipping_division` int(11) DEFAULT NULL,
  `shipping_district` int(11) DEFAULT NULL,
  `shipping_address` text DEFAULT NULL,
  `shipping_contact` varchar(255) DEFAULT NULL,
  `billing_address` text DEFAULT NULL,
  `billing_contact` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_amount`, `shipping_charge`, `discount_amount`, `discount_amount_final`, `grand_total`, `discount_type`, `cupon`, `total_item`, `order_date`, `payment_status`, `delivery_status`, `status`, `cancel_request`, `cancel_reason`, `delivery_man_id`, `delivery_man_comment`, `shipping_method`, `shipping_division`, `shipping_district`, `shipping_address`, `shipping_contact`, `billing_address`, `billing_contact`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, '5000.00', '60.00', '25.00', '1250.00', '3810.00', 2, '', 1, '2025-06-25 00:00:00', 0, 3, 1, 0, NULL, 1, NULL, NULL, 1, 8, '', '015', '2no Gate', '', '2025-06-25 02:26:52', '2025-06-25 02:55:10', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `is_returned` tinyint(1) DEFAULT NULL,
  `price_per_unit` decimal(7,2) DEFAULT NULL,
  `refund_amount` decimal(7,2) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 active 0 deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `book_id`, `quantity`, `is_returned`, `price_per_unit`, `refund_amount`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 1, 1, NULL, '5000.00', NULL, 1, '2025-06-25 02:26:52', '2025-06-25 02:26:52', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_track`
--

CREATE TABLE `order_track` (
  `id` int(11) NOT NULL,
  `note` text NOT NULL,
  `order_id` int(11) NOT NULL,
  `delivery_man` int(11) NOT NULL,
  `track_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(15) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 active 0 deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`id`, `name`, `contact_no`, `email`, `address`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Kamal', '015', 'kamal@yahoo.com', '12gate', 1, '2025-06-02 00:58:55', '2025-06-02 01:09:23', 1, 1),
(2, 'Kamal uddin', '015', 'kamal@yahoo.com', '12gate', 1, '2025-06-02 01:00:21', '2025-06-02 01:08:29', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charge`
--

CREATE TABLE `shipping_charge` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `charge` decimal(10,2) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping_charge`
--

INSERT INTO `shipping_charge` (`id`, `name`, `district_id`, `charge`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Cumilla', 1, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(2, 'Feni', 2, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(3, 'Brahmanbaria', 3, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(4, 'Rangamati', 4, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(5, 'Noakhali', 5, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(6, 'Chandpur', 6, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(7, 'Lakshmipur', 7, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(8, 'Chattogram', 8, '60.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(9, 'Coxsbazar', 9, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(10, 'Khagrachhari', 10, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(11, 'Bandarban', 11, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(12, 'Sirajganj', 12, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(13, 'Pabna', 13, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(14, 'Bogura', 14, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(15, 'Rajshahi', 15, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(16, 'Natore', 16, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(17, 'Joypurhat', 17, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(18, 'Chapainawabganj', 18, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(19, 'Naogaon', 19, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(20, 'Jashore', 20, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(21, 'Satkhira', 21, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(22, 'Meherpur', 22, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(23, 'Narail', 23, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(24, 'Chuadanga', 24, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(25, 'Kushtia', 25, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(26, 'Magura', 26, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(27, 'Khulna', 27, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(28, 'Bagerhat', 28, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(29, 'Jhenaidah', 29, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(30, 'Jhalakathi', 30, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(31, 'Patuakhali', 31, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(32, 'Pirojpur', 32, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(33, 'Barisal', 33, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(34, 'Bhola', 34, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(35, 'Barguna', 35, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(36, 'Sylhet', 36, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(37, 'Moulvibazar', 37, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(38, 'Habiganj', 38, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(39, 'Sunamganj', 39, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(40, 'Narsingdi', 40, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(41, 'Gazipur', 41, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(42, 'Shariatpur', 42, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(43, 'Narayanganj', 43, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(44, 'Tangail', 44, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(45, 'Kishoreganj', 45, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(46, 'Manikganj', 46, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(47, 'Dhaka', 47, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(48, 'Munshiganj', 48, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(49, 'Rajbari', 49, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(50, 'Madaripur', 50, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(51, 'Gopalganj', 51, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(52, 'Faridpur', 52, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(53, 'Panchagarh', 53, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(54, 'Dinajpur', 54, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(55, 'Lalmonirhat', 55, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(56, 'Nilphamari', 56, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(57, 'Gaibandha', 57, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(58, 'Thakurgaon', 58, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(59, 'Rangpur', 59, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(60, 'Kurigram', 60, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(61, 'Sherpur', 61, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(62, 'Mymensingh', 62, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(63, 'Jamalpur', 63, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(64, 'Netrokona', 64, '120.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 active 0 deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'cvxc', 'xcz ', 'images/17504771537144pexels-josh-sorenson.jpg', 1, '2025-06-20 23:37:53', '2025-06-20 23:39:13', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `stock_quantity` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 active 0 deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `book_id`, `order_id`, `purchase_id`, `price`, `stock_quantity`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 2, NULL, 3, '230.00', 5, 1, '2025-06-21 00:32:03', NULL, 1, NULL),
(2, 1, NULL, 3, '230.00', 60, 1, '2025-06-21 00:32:03', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `nid` varchar(25) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 active 0 deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contact_no`, `email`, `gender`, `nid`, `dob`, `address`, `password`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Jamal', '015', 'jamal@gmail.com', NULL, NULL, NULL, NULL, '7b52009b64fd0a2a49e6d8a939753077792b0554', 1, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_purchase`
--
ALTER TABLE `book_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_purchase_items`
--
ALTER TABLE `book_purchase_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_man`
--
ALTER TABLE `delivery_man`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_track`
--
ALTER TABLE `order_track`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_charge`
--
ALTER TABLE `shipping_charge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `book_purchase`
--
ALTER TABLE `book_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `book_purchase_items`
--
ALTER TABLE `book_purchase_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_man`
--
ALTER TABLE `delivery_man`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_track`
--
ALTER TABLE `order_track`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_charge`
--
ALTER TABLE `shipping_charge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
