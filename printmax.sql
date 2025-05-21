-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2025 at 09:21 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `printmax`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `agent_id` int(11) NOT NULL,
  `agent_register` date NOT NULL,
  `agent_token` varchar(255) NOT NULL,
  `agent_platform` varchar(255) NOT NULL,
  `agent_app` varchar(255) NOT NULL,
  `agent_ip` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`agent_id`, `agent_register`, `agent_token`, `agent_platform`, `agent_app`, `agent_ip`) VALUES
(1, '2025-01-04', 'e913b52c3e20ab3e72a095f822b0fdd52f81daeaa3cd80a827848242454197472401736d5e60034eef342df7e73cca04b1da', 'Linux', 'Chrome 130.0.0.0', '172.16.238.1'),
(2, '2025-01-04', '1ee3a71be743f1ecf0c02674ee2b04df99e95a89ae20523bdd9cfa04100e25ea667189341ab5e0ad262126b4d0a19a59339f', 'iOS', 'Safari 604.1', '172.16.238.1'),
(3, '2025-01-04', 'f1fe345d73fbe59ccb9f014f3491f3273a9be940b5bf83d5dbd0c30670b2d10fd2624f175bb1fbd7b5880bd8e8af97aab759', 'iOS', 'Safari 604.1', '172.16.238.1'),
(4, '2025-01-04', 'e6491f4cf7ce90ed71fcbcedde6f4600ca236b9f789c008e6c695373dfe8f055f669ba9dc9294564ffdbe1298086e91edc23', 'Linux', 'Chrome 130.0.0.0', '172.16.238.1'),
(5, '2025-01-04', '77b8086a5e2bfabc7226fd70db84d5620597084e201b9547e50b4002ae55d00540dc63d2b3e951d0ffa71afd5523690ddcdd', 'Linux', 'Chrome 130.0.0.0', '172.16.238.1'),
(6, '2025-01-05', '54e6fec9d6ff20c0932646e60bf8d35adcb42030b4fd50e9c8093bb74c6b1007e93252c7c1f41fd45ffb5adcdebb674f7109', 'Linux', 'Chrome 130.0.0.0', '172.16.238.1'),
(7, '2025-01-05', '150a4e4772c0b6b3c7ffbf76734f8ccc13afcdb92a9c7b10caaf822c8392b4e21dad12d2080df686bc213dba28809068b2a2', 'Linux', 'Chrome 130.0.0.0', '172.16.238.1'),
(8, '2025-04-29', '52efd3986628f8ad14051b1654ba16b409f2423799b3e7b07eaf3c250549d93925826995cfb4aa6342808e1d55e2da587faf', 'Linux', 'Chrome 132.0.0.0', '172.16.238.1'),
(9, '2025-05-18', '683072a66aa1cca3c7da6a72d9cb9aa35b6acd2693ab5b93f15b6d5db3acaf451a519bae8b594e247ee3d434aa47bf468c73', 'Windows 10', 'Chrome 136.0.0.0', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `agent_cart`
--

CREATE TABLE `agent_cart` (
  `agent_cart_id` int(11) NOT NULL,
  `agent_token` varchar(255) NOT NULL,
  `product_token` varchar(255) NOT NULL,
  `product_variant_1_id` int(11) NOT NULL,
  `product_variant_2_id` int(11) NOT NULL,
  `agent_cart_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agent_cart`
--

INSERT INTO `agent_cart` (`agent_cart_id`, `agent_token`, `product_token`, `product_variant_1_id`, `product_variant_2_id`, `agent_cart_qty`) VALUES
(1, '54e6fec9d6ff20c0932646e60bf8d35adcb42030b4fd50e9c8093bb74c6b1007e93252c7c1f41fd45ffb5adcdebb674f7109', '123', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_token` varchar(255) NOT NULL,
  `book_paid` varchar(2) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `price_total` int(11) NOT NULL,
  `book_status` varchar(50) NOT NULL,
  `user_token` int(11) NOT NULL,
  `book_date` varchar(255) NOT NULL,
  `book_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_token`, `book_paid`, `customer_name`, `customer_phone`, `price_total`, `book_status`, `user_token`, `book_date`, `book_key`) VALUES
(1, '9A7C29ED202505192DEB021C', '1', 'Raihan Muhammad Akbar', '08111221030', 150000, 'Progress', 870000000, '2025-05-19 09:29:30', '1F8B-AC4C-61E1-F14E'),
(2, '907108C0202505190D23B9BA', '1', 'Ghina Nur Agsya', '081215616512', 150000, 'Progress', 870000000, '2025-05-19 09:51:49', 'CE36-8850-82C7-F215'),
(3, '660C955E2025051976716A3B', '0', 'Reza Faisal Ramadhan', '083218472971', 440000, 'Progress', 870000000, '2025-05-19 09:53:35', 'B725-D7FB-00EB-66D1'),
(4, '348A2DA120250519D70A3C79', '0', 'Alwan Maulana', '081183793728', 90000, 'Progress', 870000000, '2025-05-19 09:55:08', '29AD-4323-C692-7834'),
(5, 'C9C3EC41202505192B0BA677', '0', 'Mikasa Nara', '08572021293', 80000, 'Progress', 870000000, '2025-05-19 09:57:40', 'FD31-5862-ABF9-648B');

-- --------------------------------------------------------

--
-- Table structure for table `book_product`
--

CREATE TABLE `book_product` (
  `book_product_id` int(11) NOT NULL,
  `book_token` varchar(255) NOT NULL,
  `product_token` varchar(255) NOT NULL,
  `product_variant_1_id` int(11) NOT NULL,
  `product_variant_2_id` int(11) NOT NULL,
  `book_product_qty` int(11) NOT NULL,
  `product_variant_1_price_mark` int(11) NOT NULL,
  `product_variant_2_price_mark` int(11) NOT NULL,
  `book_product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_product`
--

INSERT INTO `book_product` (`book_product_id`, `book_token`, `product_token`, `product_variant_1_id`, `product_variant_2_id`, `book_product_qty`, `product_variant_1_price_mark`, `product_variant_2_price_mark`, `book_product_price`) VALUES
(1, '9A7C29ED202505192DEB021C', 'd6a07450f860209e', 2, 2, 4, 0, 0, 30000),
(2, '9A7C29ED202505192DEB021C', 'a0bc0af2476900bd', 3, 3, 3, 0, 0, 10000),
(3, '907108C0202505190D23B9BA', '9df15f027aa71add', 1, 1, 3, 0, 0, 50000),
(4, '660C955E2025051976716A3B', '9df15f027aa71add', 1, 1, 8, 0, 0, 50000),
(5, '660C955E2025051976716A3B', 'a0bc0af2476900bd', 3, 3, 4, 0, 0, 10000),
(6, '348A2DA120250519D70A3C79', 'd6a07450f860209e', 2, 2, 3, 0, 0, 30000),
(7, 'C9C3EC41202505192B0BA677', 'a0bc0af2476900bd', 3, 3, 8, 0, 0, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(15) NOT NULL,
  `menu_access` varchar(50) NOT NULL,
  `menu_path` varchar(100) NOT NULL,
  `menu_icon` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_access`, `menu_path`, `menu_icon`) VALUES
(1, 'Dashboard', '1,2,3', 'cms/', 'fa-solid fa-chart-line'),
(2, 'Order', '2,3', 'cms/order/', 'fa-solid fa-qrcode'),
(3, 'Product', '2', 'cms/product/', 'fa-solid fa-object-group'),
(4, 'User', '1,2', 'cms/user/', 'fa-solid fa-users'),
(5, 'Summary', '0', 'cms/summary', 'fa-solid fa-list-check'),
(6, 'Invoice', '2,3', '/cms/invoice/', 'fa-solid fa-file-invoice');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `product_thumbnails` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_sold` int(11) NOT NULL DEFAULT 0,
  `product_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_desc`, `product_thumbnails`, `product_price`, `product_sold`, `product_token`) VALUES
(1, 'Sticker Craft', 'Stiker yang terbuat dari kertas craft dan dicetak menggunakan mesin digital printing. Setelah dicetak, sticker craft dapat dipotong sesuai dengan pola yang diinginkan.\r\n\r\nKertas stiker vinyl\r\nKertas stiker HVS\r\nKertas stiker one way\r\nKertas stiker sandblast\r\nKertas stiker carbon kevlar\r\nKertas stiker chromo\r\nKertas stiker oracal\r\nKertas stiker foil', '39646631356630323761613731616464.png', 50000, 0, '9df15f027aa71add'),
(2, 'Sticker', 'Bla Bla BLaaa', '64366130373435306638363032303965.png', 30000, 0, 'd6a07450f860209e'),
(3, 'Poster', 'Product Description', 'default.jpg', 10000, 0, 'a0bc0af2476900bd');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `product_image_id` int(11) NOT NULL,
  `product_token` varchar(255) NOT NULL,
  `product_image_name` varchar(255) NOT NULL,
  `product_image_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`product_image_id`, `product_token`, `product_image_name`, `product_image_token`) VALUES
(13, '9df15f027aa71add', '9df15f027aa71add943e19a6.jpg', 'ed700e554a5858d5'),
(16, '9df15f027aa71add', '9df15f027aa71add1716dc28.png', 'a0d6624ba7007a9e'),
(20, 'd6a07450f860209e', 'd6a07450f860209edc9c7de9.png', '9b98b196663de527'),
(21, 'd6a07450f860209e', 'd6a07450f860209e6da24d91.png', '93fe28d728af8198'),
(22, 'a0bc0af2476900bd', 'a0bc0af2476900bd0a13cfed.png', '87d91bb1ce240aaf');

-- --------------------------------------------------------

--
-- Table structure for table `product_variant_1`
--

CREATE TABLE `product_variant_1` (
  `product_variant_1_id` int(11) NOT NULL,
  `product_token` varchar(255) NOT NULL,
  `product_variant_1_name` varchar(255) NOT NULL,
  `product_variant_1_price_mark` int(11) NOT NULL,
  `visible` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_variant_1`
--

INSERT INTO `product_variant_1` (`product_variant_1_id`, `product_token`, `product_variant_1_name`, `product_variant_1_price_mark`, `visible`) VALUES
(1, '9df15f027aa71add', 'Default', 0, '1'),
(2, 'd6a07450f860209e', 'Default', 0, '1'),
(3, 'a0bc0af2476900bd', 'Default', 0, '1'),
(4, 'd6a07450f860209e', 'Default', 1, '0'),
(5, 'd6a07450f860209e', 'Doff', 3000, '0'),
(6, 'd6a07450f860209e', 'Vinyls', 200, '1'),
(7, 'd6a07450f860209e', 'Lminating', 1000, '1'),
(8, 'd6a07450f860209e', 'Test', 1, '0'),
(9, 'd6a07450f860209e', '2', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `product_variant_2`
--

CREATE TABLE `product_variant_2` (
  `product_variant_2_id` int(11) NOT NULL,
  `product_token` varchar(255) NOT NULL,
  `product_variant_2_name` varchar(255) NOT NULL,
  `product_variant_2_price_mark` int(11) NOT NULL,
  `visible` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_variant_2`
--

INSERT INTO `product_variant_2` (`product_variant_2_id`, `product_token`, `product_variant_2_name`, `product_variant_2_price_mark`, `visible`) VALUES
(1, '9df15f027aa71add', 'Default', 0, '1'),
(2, 'd6a07450f860209e', 'Default', 0, '1'),
(3, 'a0bc0af2476900bd', 'Default', 0, '1'),
(4, 'd6a07450f860209e', '1', 1111, '0'),
(5, 'd6a07450f860209e', '23', 12111, '0'),
(6, 'd6a07450f860209e', 'Not', 1000, ''),
(7, 'a0bc0af2476900bd', 'Abcd', 121, ''),
(8, 'a0bc0af2476900bd', 'Vinyls', 123123, ''),
(9, 'a0bc0af2476900bd', 'Vinyls', 500, '1');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_status` varchar(10) NOT NULL,
  `password_reset` date NOT NULL,
  `user_token` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `role_id`, `user_name`, `user_email`, `user_phone`, `user_password`, `user_status`, `password_reset`, `user_token`) VALUES
(1, 3, 'Raihan Muhammad Akbar', 'raihangl19@gmail.com', '08111221030', '35M33V/Devxnp.7HI26n7elkPXhgMEwEHI1HgNaU/qnlGnsvTNOFC', 'Active', '2024-11-05', 'D7E7CAABEA95E277'),
(2, 2, 'Ghina Nur Agsya', 'gnuragsya@gmail.com', '081215616512', 'O7FwsE71eqd8S70L0xafSeoZjUCSSGNyO88H1VWL8y8uazr6L25ye', 'Active', '2025-04-23', '87E7CAABEA95E277'),
(3, 1, 'root', 'admin@print-max.site', '0000000000', 'OTQlQesBFJYOPcSLuXqlm.JXsOxjzxbdsgsTAUuJ5HvJuImp6ORL.', 'Active', '2025-05-06', '0000000000000000'),
(6, 2, 'Buggy Kasep', 'buggy@gmail.com', '0818319728', 'wkHzI64m6VNGGqvXNRCrx.iruFPOm7PvrWdURCAqnZMvi1pZvUHOy', 'Active', '0000-00-00', '283D202505124139'),
(7, 2, 'Test', 'test1@gmail.com', '0921401294712', 'WS/qf6uzBIpWBkyYQ2PoW.iZzO2jSodg5Sov8HNyZR5cmM9TjphTu', 'Active', '0000-00-00', '266E20250512B2D4');

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `user_cart_id` int(11) NOT NULL,
  `user_token` varchar(255) NOT NULL,
  `product_token` varchar(255) NOT NULL,
  `product_variant_1_id` int(11) NOT NULL,
  `product_variant_2_id` int(11) NOT NULL,
  `user_cart_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`agent_id`);

--
-- Indexes for table `agent_cart`
--
ALTER TABLE `agent_cart`
  ADD PRIMARY KEY (`agent_cart_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_product`
--
ALTER TABLE `book_product`
  ADD PRIMARY KEY (`book_product_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`product_image_id`);

--
-- Indexes for table `product_variant_1`
--
ALTER TABLE `product_variant_1`
  ADD PRIMARY KEY (`product_variant_1_id`);

--
-- Indexes for table `product_variant_2`
--
ALTER TABLE `product_variant_2`
  ADD PRIMARY KEY (`product_variant_2_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`user_cart_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `agent_cart`
--
ALTER TABLE `agent_cart`
  MODIFY `agent_cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `book_product`
--
ALTER TABLE `book_product`
  MODIFY `book_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `product_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_variant_1`
--
ALTER TABLE `product_variant_1`
  MODIFY `product_variant_1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_variant_2`
--
ALTER TABLE `product_variant_2`
  MODIFY `product_variant_2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `user_cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
