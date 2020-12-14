-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 12:34 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_billonairebid`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_country` text NOT NULL,
  `admin_about` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_job` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_country`, `admin_about`, `admin_contact`, `admin_job`) VALUES
(3, 'emma', 'emma@gmail.com', 'emma', 'images.jpg', 'Ireland', 'Electronic Eng', '22222222', 'Handy Man');

-- --------------------------------------------------------

--
-- Table structure for table `biders`
--

CREATE TABLE `biders` (
  `bider_id` int(10) NOT NULL,
  `bider_name` varchar(255) NOT NULL,
  `bider_email` varchar(255) NOT NULL,
  `bider_pass` varchar(255) NOT NULL,
  `bider_country` text NOT NULL,
  `bider_city` text NOT NULL,
  `bider_contact` varchar(255) NOT NULL,
  `bider_address` text NOT NULL,
  `bider_image` text NOT NULL,
  `bider_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biders`
--

INSERT INTO `biders` (`bider_id`, `bider_name`, `bider_email`, `bider_pass`, `bider_country`, `bider_city`, `bider_contact`, `bider_address`, `bider_image`, `bider_ip`) VALUES
(5, 'osita', 'osita@gmail.com', 'obi', 'Ireland', 'Limerick', '22222222', '23 upper', 'images.jpg', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `bider_orders`
--

CREATE TABLE `bider_orders` (
  `order_id` int(10) NOT NULL,
  `bider_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bid_cart`
--

CREATE TABLE `bid_cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid_cart`
--

INSERT INTO `bid_cart` (`p_id`, `ip_add`, `qty`, `size`) VALUES
(3, '1', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `bid_categories`
--

CREATE TABLE `bid_categories` (
  `bid_cat_id` int(10) NOT NULL,
  `bid_cat_title` text NOT NULL,
  `bid_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid_categories`
--

INSERT INTO `bid_categories` (`bid_cat_id`, `bid_cat_title`, `bid_cat_desc`) VALUES
(1, 'Japanese ', 'Made in Japan '),
(2, 'Irish ', 'whiskey and spuds'),
(3, 'Art', 'very fancy '),
(4, 'Historic books ', 'Just old books ');

-- --------------------------------------------------------

--
-- Table structure for table `bid_pending_orders`
--

CREATE TABLE `bid_pending_orders` (
  `order_id` int(10) NOT NULL,
  `bider_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `bid_product_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid_pending_orders`
--

INSERT INTO `bid_pending_orders` (`order_id`, `bider_id`, `invoice_no`, `bid_product_id`, `qty`, `order_status`) VALUES
(1, 4, 616256572, '2', 1, 'Complete'),
(2, 4, 616256572, '6', 1, 'pending'),
(3, 4, 616256572, '16', 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `bid_products`
--

CREATE TABLE `bid_products` (
  `bid_product_id` int(10) NOT NULL,
  `bid_p_cat_id` int(10) NOT NULL,
  `bid_cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bid_product_title` text NOT NULL,
  `bid_product_img1` text NOT NULL,
  `bid_product_img2` text NOT NULL,
  `bid_product_img3` text NOT NULL,
  `bid_product_price` int(10) NOT NULL,
  `bid_product_keywords` text NOT NULL,
  `bid_product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid_products`
--

INSERT INTO `bid_products` (`bid_product_id`, `bid_p_cat_id`, `bid_cat_id`, `date`, `bid_product_title`, `bid_product_img1`, `bid_product_img2`, `bid_product_img3`, `bid_product_price`, `bid_product_keywords`, `bid_product_desc`) VALUES
(1, 1, 2, '2020-12-14 10:38:36', 'Middleton very rare 2€0€20', 'Midleton-Very-Rare_Vintage-Release_2020_3-1-980x1070.jpg', 'Midleton-Very-Rare_Vintage-Release_2020_3-1-980x1070.jpg', 'Midleton-Very-Rare_Vintage-Release_2020_3-1-980x1070.jpg', 1231, 'Whiskey ', 'very good '),
(2, 4, 4, '2020-12-14 10:33:44', 'Biafra War ', '51sAIXwN9sL._SX331_BO1,204,203,200_.jpg', '51sAIXwN9sL._SX331_BO1,204,203,200_.jpg', '51sAIXwN9sL._SX331_BO1,204,203,200_.jpg', 121, 'Cheap To Bid', 'The E406 is designed to help you be productive all day - even when you\'re on the move. This compact and lightweight 14-inch laptop is powered by the latest Intel processor and provides long-lasting battery life. And with a NanoEdge display for immersive viewing, it\'s the best laptop for people on the go.'),
(3, 5, 2, '2020-12-14 10:42:27', 'Potatoes ', 'potatoes.jpg', 'potatoes.jpg', 'potatoes.jpg', 55, 'potatoes ', 'boil em mash em stick em in a stew potatoes '),
(4, 1, 1, '2020-12-14 10:32:45', 'Haraujuku experience', 'harajuku.jpg', 'harajuku1.jpg', 'harajuku2.jpg', 100, 'sugoi kawaii', 'Get the latest look'),
(5, 4, 4, '2020-12-14 10:45:30', 'The bloody field ', '9781788491969.jpg', '9781788491969.jpg', '9781788491969.jpg', 103, 'Cheap To Bid', 'The E406 is designed to help you be productive all day - even when you\'re on the move. This compact and lightweight 14-inch laptop is powered by the latest Intel processor and provides long-lasting battery life. And with a NanoEdge display for immersive viewing, it\'s the best laptop for people on the go.'),
(6, 4, 4, '2020-12-14 10:43:11', 'Biafra Genocide', 'biafra_war1.jpg', 'biafra_war1.jpg', 'biafra_war1.jpg', 211, 'Cheap To Bid', 'The E406 is designed to help you be productive all day - even when you\'re on the move. This compact and lightweight 14-inch laptop is powered by the latest Intel processor and provides long-lasting battery life. And with a NanoEdge display for immersive viewing, it\'s the best laptop for people on the go.'),
(7, 31, 1, '2020-12-14 11:29:18', 'Babymetal', 'babymetal.jpg', 'babymetal1.jpg', 'babymetal2.jpg', 45, 'kawaii', 'sugoii'),
(8, 1, 1, '2020-12-14 11:29:39', 'Babymetal experience ', 'BabymealVip.jpg', 'BabymealVip1.jpg', 'BabymealVip2.jpg', 51, 'Ultimate fox good experience ', 'Ultimate fox good experience '),
(9, 2, 1, '2020-12-14 11:06:30', 'Samurai shoes', 'KEGUTSU (1).jpeg', 'KEGUTSU (1).jpeg', 'KEGUTSU (1).jpeg', 166, 'KEGUTSU (1).jpeg', 'wore by a Samurai '),
(10, 51, 3, '2020-12-14 11:21:30', 'Cabinet ', 'Cabinet.jpg', 'Cabinet1.jpg', 'Cabinet2.jpg', 300, 'fancy ', 'Old German press '),
(11, 5, 1, '2020-12-14 11:25:38', 'Imperial Geisha ', 'Geisha.jpg', 'Geisha2.jpg', 'Geisha1.jpg', 50, 'Geisha.jpg', 'Imperial Geisha to host your event '),
(12, 5, 1, '2020-12-14 11:27:55', 'Sadako', 'sadako.jpg', 'sadako1.jpg', 'sadako2.jpg', 45, 'scary ', 'kuiro'),
(13, 3, 11, '2020-12-14 11:31:48', 'Barney the dinosaur ', 'download.jpeg', 'download.jpeg', 'download.jpeg', 40, 'Cheap To Bid', 'The E406 is designed to help you be productive all day - even when you\'re on the move. This compact and lightweight 14-inch laptop is powered by the latest Intel processor and provides long-lasting battery life. And with a NanoEdge display for immersive viewing, it\'s the best laptop for people on the go.'),
(14, 1, 1, '2020-11-14 12:08:22', 'Toshia DEL-7000', 'laptop_hp_1E6T5EA.jpg', 'laptop_hp_1E6T5EA.jpg', 'laptop_hp_1E6T5EA.jpg', 98, 'Cheap To Bid', 'The E406 is designed to help you be productive all day - even when you\'re on the move. This compact and lightweight 14-inch laptop is powered by the latest Intel processor and provides long-lasting battery life. And with a NanoEdge display for immersive viewing, it\'s the best laptop for people on the go.'),
(15, 1, 1, '2020-11-14 12:08:33', 'MacBook Pro DA2020', 'laptop_hp_1E6T5EA.jpg', 'laptop_hp_1E6T5EA.jpg', 'laptop_hp_1E6T5EA.jpg', 90, 'Cheap To Bid', 'The E406 is designed to help you be productive all day - even when you\'re on the move. This compact and lightweight 14-inch laptop is powered by the latest Intel processor and provides long-lasting battery life. And with a NanoEdge display for immersive viewing, it\'s the best laptop for people on the go.'),
(16, 1, 1, '2020-12-14 11:33:30', 'Acer PPN-2020', 'laptop_hp_1E6T5EA.jpg', 'laptop_hp_1E6T5EA.jpg', 'laptop_hp_1E6T5EA.jpg', 99, 'Cheap To Bid', 'The E406 is designed to help you be productive all day - even when you\'re on the move. This compact and lightweight 14-inch laptop is powered by the latest Intel processor and provides long-lasting battery life. And with a NanoEdge display for immersive viewing, it\'s the best laptop for people on the go.');

-- --------------------------------------------------------

--
-- Table structure for table `bid_product_categories`
--

CREATE TABLE `bid_product_categories` (
  `bid_p_cat_id` int(10) NOT NULL,
  `bid_p_cat_title` text NOT NULL,
  `bid_p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid_product_categories`
--

INSERT INTO `bid_product_categories` (`bid_p_cat_id`, `bid_p_cat_title`, `bid_p_cat_desc`) VALUES
(1, 'They have those ', 'I don\'t believe it'),
(2, 'shoes', 'For your feet '),
(3, 'Dinosaur bones ', 'very cool '),
(4, 'Histroy Books', 'just old books '),
(5, 'money ', 'to tight to mention ');

-- --------------------------------------------------------

--
-- Table structure for table `bid_slider`
--

CREATE TABLE `bid_slider` (
  `bid_slide_id` int(10) NOT NULL,
  `bid_slide_name` varchar(255) NOT NULL,
  `bid_slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid_slider`
--

INSERT INTO `bid_slider` (`bid_slide_id`, `bid_slide_name`, `bid_slide_image`) VALUES
(1, 'slide-13', 'slide-13.jpg'),
(2, 'slide-13', 'slide-2.jpg'),
(3, 'slide-13', 'slide-3.jpg'),
(4, 'slide-13', 'slide-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `biders`
--
ALTER TABLE `biders`
  ADD PRIMARY KEY (`bider_id`);

--
-- Indexes for table `bider_orders`
--
ALTER TABLE `bider_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `bid_cart`
--
ALTER TABLE `bid_cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `bid_categories`
--
ALTER TABLE `bid_categories`
  ADD PRIMARY KEY (`bid_cat_id`);

--
-- Indexes for table `bid_pending_orders`
--
ALTER TABLE `bid_pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `bid_products`
--
ALTER TABLE `bid_products`
  ADD PRIMARY KEY (`bid_product_id`);

--
-- Indexes for table `bid_product_categories`
--
ALTER TABLE `bid_product_categories`
  ADD PRIMARY KEY (`bid_p_cat_id`);

--
-- Indexes for table `bid_slider`
--
ALTER TABLE `bid_slider`
  ADD PRIMARY KEY (`bid_slide_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `biders`
--
ALTER TABLE `biders`
  MODIFY `bider_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bider_orders`
--
ALTER TABLE `bider_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bid_categories`
--
ALTER TABLE `bid_categories`
  MODIFY `bid_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bid_pending_orders`
--
ALTER TABLE `bid_pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bid_products`
--
ALTER TABLE `bid_products`
  MODIFY `bid_product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `bid_product_categories`
--
ALTER TABLE `bid_product_categories`
  MODIFY `bid_p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
