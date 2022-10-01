-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 02, 2022 at 12:19 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `savoir`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_phone_number` varchar(15) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_role` enum('Super Admin','Admin') NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_username`, `admin_email`, `admin_phone_number`, `admin_password`, `admin_role`, `is_active`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'Widiyanto Ramadhan', 'widiramadhan', 'widiyanto.ramadhan@gmail.com', '083815613839', '9cd0430b6db2b011b1d6a81dc1dd5c6c', 'Super Admin', 1, 1, '2022-09-29 20:54:06', 1, '2022-09-30 00:44:01'),
(2, 'Pangky', 'pangky', 'pangky@gmail.com', '08123456789', '9cd0430b6db2b011b1d6a81dc1dd5c6c', 'Super Admin', 1, 1, '2022-09-29 23:53:12', 1, '2022-09-29 23:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_description` text NOT NULL,
  `category_slug` varchar(100) NOT NULL,
  `category_images` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `category_slug`, `category_images`, `is_active`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'Hand Bag', 'Hand Bag', 'hand-bag', 'baner-right-image-01.jpg', 1, NULL, '2022-09-30 00:23:39', 1, '2022-10-02 00:39:36'),
(2, 'Travel Bag', 'Travel Bag', 'travel-bag', 'baner-right-image-02.jpg', 1, NULL, '2022-09-30 00:23:39', 1, '2022-10-02 00:39:46'),
(3, 'Shoes', 'Shoes', 'shoes', 'baner-right-image-03.jpg', 1, NULL, '2022-09-30 00:23:57', 1, '2022-10-02 00:39:48'),
(4, 'Watch', 'Watch', 'watch', 'men-02.jpg', 1, NULL, '2022-09-30 00:23:57', 1, '2022-10-02 00:39:51'),
(5, 'Accessoris', 'Accessoris', 'accessoris', 'baner-right-image-04.jpg', 1, NULL, '2022-09-30 00:24:08', 1, '2022-10-02 00:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `designer`
--

CREATE TABLE `designer` (
  `designer_id` int(11) NOT NULL,
  `designer_name` varchar(100) NOT NULL,
  `designer_description` text NOT NULL,
  `designer_slug` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designer`
--

INSERT INTO `designer` (`designer_id`, `designer_name`, `designer_description`, `designer_slug`, `is_active`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'LV', 'LV', 'lv', 1, NULL, '2022-09-30 00:31:43', 1, '2022-10-02 00:40:07'),
(2, 'Gucci', 'Gucci', 'gucci', 1, NULL, '2022-09-30 00:31:43', 1, '2022-10-02 00:40:10'),
(3, 'Hermes', 'Hermes', 'hermes', 1, NULL, '2022-09-30 00:32:00', 1, '2022-10-02 00:40:12'),
(4, 'Channel', 'Channel', 'channel', 1, NULL, '2022-09-30 00:32:00', 1, '2022-10-02 00:40:18'),
(5, 'Christian Dior', 'Christian Dior', 'christian-dior', 1, NULL, '2022-09-30 00:32:27', 1, '2022-10-02 00:40:21'),
(6, 'Bottega', 'Bottega', 'bottega', 1, NULL, '2022-09-30 00:32:27', 1, '2022-10-02 00:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `message_name` varchar(100) NOT NULL,
  `message_email` varchar(100) NOT NULL,
  `message_value` text NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `message_name`, `message_email`, `message_value`, `is_active`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'test', 'test@gmail.com', 'test', 1, NULL, '2022-09-30 15:28:05', NULL, '2022-09-30 15:28:05');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `designer_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` text NOT NULL,
  `product_quotes` text NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_discount` int(2) NOT NULL DEFAULT 0,
  `product_stock` int(11) NOT NULL,
  `product_slug` varchar(100) NOT NULL,
  `product_images_1` varchar(100) NOT NULL,
  `product_images_2` varchar(100) DEFAULT NULL,
  `product_images_3` varchar(100) DEFAULT NULL,
  `product_images_4` varchar(100) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `designer_id`, `product_name`, `product_description`, `product_quotes`, `product_price`, `product_discount`, `product_stock`, `product_slug`, `product_images_1`, `product_images_2`, `product_images_3`, `product_images_4`, `is_active`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 1, 1, 'Classic Spring', 'Classic Spring', 'Lorem Ipsum', 1200000, 0, 1, 'classic-spring', 'explore-image-01.jpg', 'explore-image-02.jpg', 'baner-right-image-03.jpg', 'baner-right-image-02.jpg', 1, NULL, '2022-09-30 02:26:40', 1, '2022-10-02 00:35:29'),
(3, 1, 2, 'VGC- Aquaracer Chrono 43mm Quartz 2017', 'VGC- Aquaracer Chrono 43mm Quartz 2017', 'lorem ipsum', 2000000, 0, 1, 'vgc-aquaracer-chrono-43mm-quartz-2017', 'explore-image-022.jpg', NULL, NULL, NULL, 1, 1, '2022-10-02 01:17:35', 1, '2022-10-02 01:17:35'),
(4, 1, 1, 'VGC WOC 22cm Black GHW', 'VGC WOC 22cm Black GHW', 'quotes', 34000000, 0, 0, 'vgc-woc-22cm-black-ghw', 'women-02.jpg', NULL, NULL, NULL, 1, 1, '2022-10-02 01:21:24', 1, '2022-10-02 01:21:24'),
(5, 3, 3, 'Picotin 18 Gold Clemence GHW', 'Picotin 18 Gold Clemence GHW', 'quotes', 90000000, 0, 1, 'picotin-18-gold-clemence-ghw', 'single-product-02.jpg', NULL, NULL, NULL, 1, 1, '2022-10-02 01:46:00', 1, '2022-10-02 01:46:00'),
(6, 3, 5, 'Test Product', 'test', 'quotes', 32900000, 0, 0, 'test-product', 'kid-01.jpg', NULL, NULL, NULL, 1, 1, '2022-10-02 01:46:39', 1, '2022-10-02 01:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `subscriber_id` int(11) NOT NULL,
  `subscriber_name` varchar(100) NOT NULL,
  `subscriber_email` varchar(100) NOT NULL,
  `subscriber_phone_number` varchar(15) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`subscriber_id`, `subscriber_name`, `subscriber_email`, `subscriber_phone_number`, `is_active`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'Widiyanto Ramadhan', 'widiyanto.ramadhan@gmail.com', '083815613839', 1, NULL, '2022-10-01 23:45:41', NULL, '2022-10-01 23:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_invoice_no` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `paid_status` enum('Paid','Unpaid') NOT NULL,
  `transaction_status` enum('Preparation','Delivery','Delivered') NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `designer`
--
ALTER TABLE `designer`
  ADD PRIMARY KEY (`designer_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`subscriber_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_invoice_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `designer`
--
ALTER TABLE `designer`
  MODIFY `designer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `subscriber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
