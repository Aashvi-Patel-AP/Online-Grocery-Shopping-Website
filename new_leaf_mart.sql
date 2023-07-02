-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 06:25 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_leaf_mart`
--

-- --------------------------------------------------------

--
-- Table structure for table `adproduct`
--

CREATE TABLE `adproduct` (
  `product_code` int(100) NOT NULL,
  `product_name` varchar(60) CHARACTER SET latin1 NOT NULL,
  `product_desc` varchar(100) CHARACTER SET latin1 NOT NULL,
  `product_img_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `product_qty` varchar(1000) NOT NULL,
  `gi_index` int(5) NOT NULL,
  `isActive` int(10) NOT NULL,
  `c_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adproduct`
--

INSERT INTO `adproduct` (`product_code`, `product_name`, `product_desc`, `product_img_name`, `price`, `product_qty`, `gi_index`, `isActive`, `c_id`) VALUES
(1, 'Apple', 'Fresh Apple 1kg', './image/Apple.jpg', '200', '700 kg', 52, 0, '1'),
(2, 'banana', 'Fresh Banana 1kg', './image/banana.jpg', '100', '60 Dozen', 89, 1, '8'),
(3, 'Brinjal', 'fresh Brinjal 1kg', './image/brinjal.jpg', '60', '600', 15, 1, '2'),
(4, 'bitter', 'fresh Bitter 1kg', './image/bitter.jpg', '70', '500', 18, 1, '2'),
(5, 'grapes', 'fresh Grapes 1kg', './image/grapes.jpg', '100', '500 kg', 53, 1, '1'),
(6, 'Oranges', 'fresh oranges 1kg', './image/Oranges.jpg', '70', '70 kg', 43, 1, '1'),
(7, 'mango', 'fresh mango 1kg', './image/mango.jpg', '100', '80kg', 51, 1, '1'),
(8, 'Strawberry', 'fresh strawberry 1kg', './image/Strawberry.jpg', '60', '15 kg', 41, 1, '1'),
(9, 'Carrot', 'fresh Carrot', './image/Carrot.jpg', '80', '700kg', 16, 1, '7'),
(10, 'Broccoli', 'fresh Broccoli 1kg', './image/Broccoli.jpg', '80', '800 kg', 12, 1, '7'),
(11, 'banana', 'fresh banana ', './image/banana.jpg', '50', '800 ', 50, 1, '1'),
(12, 'Vegan_Gourmet', 'Vegan non GMO ', './image/Vegan_Gourmet.jpeg', '150', '1', 45, 0, '9'),
(13, 'watermelon', 'fresh Watermelon', './image/watermelon.jpg', '100', '50', 55, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(100) NOT NULL,
  `c_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `category_img_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`, `category_img_name`) VALUES
(1, 'Fruits', './image/categories/Fruits.jpg'),
(2, 'Vegetables', './image/categories/Vegetables.jpg'),
(3, 'Dairy_Products ', './image/categories/Dairy_Products.jpg'),
(4, 'Beverages', './image/categories/Beverages.jpg'),
(5, 'Grocery', './image/categories/Grocery.jpg'),
(7, 'weight_Loss', './image/categories/weight_Loss.webp'),
(8, 'Weight_Gain', './image/categories/Weight_Gain.jpeg'),
(9, 'VEGAN', './image/categories/VEGAN.webp');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_Id` varchar(50) NOT NULL,
  `User_Id` int(255) NOT NULL,
  `Payment_Method` varchar(100) NOT NULL,
  `Order_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Delivery_Date` varchar(100) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_Id`, `User_Id`, `Payment_Method`, `Order_Date`, `Delivery_Date`, `Status`, `Total`) VALUES
('OD17051436', 6, 'credit card', '2023-04-24 11:11:17', '    25-04-2023', 'Delivered', 70),
('OD32266061', 6, 'credit card', '2023-04-17 09:48:59', ' 18-04-2023', 'Out For Delivery', 100),
('OD33991720', 6, 'credit card', '2023-04-17 05:42:24', '  18-04-2023', 'Out For Delivery', 70),
('OD60969798', 6, 'credit card', '2023-05-03 06:16:28', '04-05-2023', 'Pending', 270),
('OD70551079', 6, 'credit card', '2023-04-27 06:34:54', '28-04-2023', 'Pending', 70),
('OD73412443', 6, 'credit card', '2023-04-18 12:58:41', ' 19-04-2023', 'Processing', 140),
('OD74936091', 6, 'credit card', '2023-05-13 12:22:07', '14-05-2023', 'Pending', 170),
('OD96433305', 6, 'credit card', '2023-04-30 17:23:37', '01-05-2023', 'Pending', 200);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `p_id` int(5) NOT NULL,
  `price` int(10) NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `u_id` varchar(10) NOT NULL,
  `payment_mode` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(5) NOT NULL,
  `UserType` varchar(10) CHARACTER SET utf8 NOT NULL,
  `Name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Email_Id` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Phone_No` varchar(10) CHARACTER SET utf8 NOT NULL,
  `Address` varchar(300) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `UserType`, `Name`, `Email_Id`, `Phone_No`, `Address`, `Password`) VALUES
(6, 'User', 'ABC', 'abc@gmail.com', '1234567892', '56,new home,surat', '827ccb0eea8a706c4c34a16891f84e7b'),

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adproduct`
--
ALTER TABLE `adproduct`
  ADD PRIMARY KEY (`product_code`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
