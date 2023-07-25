-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2023 at 01:43 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chillburn`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `password`) VALUES
(1, 'admin', '$2y$10$UbIBC.A4UpgKs3XWuMW29unkbAgNHpFA1sg3pRrLQENi88tjqSreK'),
(5, 'mikasa', '$2y$10$mPs8R1OJ3Nt1nLSQoCSZdu5hpI5pgHApCZ692Udhk2/VnUJAdCLWq');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `user_id`, `product_id`, `name`, `price`, `quantity`, `image`) VALUES
(42, 11, 10, 'Kue tart', 220, 5, 'Tzuyu 5.jpeg'),
(48, 12, 21, 'Apple Pie', 30000, 5, 'applepie.png'),
(49, 12, 5, 'Red Tea', 25000, 1, 'redtea.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE `tbl_message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(6, 12, 'bayu', '097908797', 'dwi@gmail.com', 'credit card', 'jln Zamrud VI Blok A-7 No 5, Kembangan Utara, Kembangan, Jakarta - 11235', 'AW (10 x 200) - ', 2000, '2023-07-18', 'pending'),
(7, 12, 'bayu', '097908797', 'dwi@gmail.com', 'cash on delivery', 'jln Zamrud VI Blok A-7 No 5, Kembangan Utara, Kembangan, Jakarta - 11235', 'Udang biru (5 x 350) - KFC (5 x 250) - teh ocha (5 x 50) - ', 3250, '2023-07-20', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `category`, `price`, `image`) VALUES
(1, 'Espresso', 'Coffee', 12000, 'espresso.png'),
(2, 'Raspberry Triffle', 'Dessert', 25000, 'raspberrytriffle.png'),
(3, 'Afforgato', 'Coffee', 20000, 'afforgato.png'),
(4, 'Americano', 'Coffee', 10000, 'americano.png'),
(5, 'Red Tea', 'Tea', 25000, 'redtea.png'),
(6, 'Flat White', 'Coffee', 15000, 'flatwhite.png'),
(7, 'Macchiato', 'Coffee', 17000, 'macchiato.png'),
(8, 'Latte', 'Coffee', 15000, 'latte.png'),
(9, 'Cappucino', 'Coffee', 13000, 'cappucino.png'),
(10, 'Banoffee Pie', 'Dessert', 20000, 'banoffeepie.png'),
(11, 'Gelato', 'Dessert', 10000, 'gelato.png'),
(12, 'Mango Sticky Rice', 'Dessert', 17000, 'mangostickyrice.png'),
(13, 'Chamomile Tea', 'Tea', 20000, 'chamomiletea.png'),
(14, 'Cortado', 'Coffee', 25000, 'cortado.png'),
(15, 'Lemon Tea', 'Tea', 10000, 'lemontea.png'),
(16, 'Ice Tea', 'Tea', 5000, 'icedtea.png'),
(17, 'Vanilla Latte', 'Coffee', 18000, 'vanillalatte.png'),
(18, 'Green Tea', 'Tea', 6000, 'greentea.png'),
(19, 'White Tea', 'Tea', 12000, 'whitetea.png'),
(20, 'Brownies', 'Dessert', 10000, 'brownies.png'),
(21, 'Apple Pie', 'Dessert', 30000, 'applepie.png'),
(22, 'Waffle Cake', 'Dessert', 35000, 'wafflecake.png'),
(23, 'Peanut Butter Chessecake', 'Dessert', 50000, 'peanutbutterchessecake.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
  `password` varchar(225) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `number`, `password`, `address`) VALUES
(12, 'bayu', 'dwi@gmail.com', '097908797', '$2y$10$nrDMGg.EoMr1uQPkPuGET.GRPtcT4k4cQHqYPSSdAuiBigiB4r/bm', 'jln Zamrud VI Blok A-7 No 5, Kembangan Utara, Kembangan, Jakarta - 11235'),
(13, 'Syifa Khairunnisa', 'syifakhairunnisa@gmail.com', '0896043335', '$2y$10$2XamHX6u4hywMTpuVZ4jRe5fplBcnLxzXuuYLgGszfpW0FqVX86Ze', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
