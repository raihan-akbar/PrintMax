-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2025 at 06:49 AM
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
(1, '2025-05-30', '683072a66aa1cca3c7da6a72d9cb9aa35b6acd2693ab5b93f15b6d5db3acaf451a519bae8b594e247ee3d434aa47bf468c73', 'Windows 10', 'Chrome 136.0.0.0', '127.0.0.1');

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
  `user_token` varchar(255) NOT NULL,
  `book_date` varchar(255) NOT NULL,
  `book_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_token`, `book_paid`, `customer_name`, `customer_phone`, `price_total`, `book_status`, `user_token`, `book_date`, `book_key`) VALUES
(1, 'A244C1F820250601CAA6D3D9', '1', 'Eren Kruger', '628111221030', 30000, 'Pending', '87E7CAABEA95E277', '2025-06-01 16:55:57', '42025-10601'),
(2, 'DB6548A220250601BAAFD16A', '1', 'Mikasa Nara', '6281215616512', 9000, 'Pending', 'XXXXXXXXXXXXXX', '2025-06-01 18:16:27', '5525-70601'),
(3, '88B1C73420250602C96097FC', '1', 'Alwan Maulana', '6281215616512', 25000, 'Pending', 'XXXXXXXXXXXXXX', '2025-06-02 16:20:54', '14125-70602'),
(4, 'BB8DD8EA2025060312D6531D', '1', 'Rachel Teller', '628572021293', 1100000, 'Progress', '87E7CAABEA95E277', '2025-06-03 10:51:37', '58625-40603'),
(5, '71FCBD5320250603DB9E1B8F', '1', 'Reza Faisal Ramadhan', '628572021293', 9000, 'Progress', '87E7CAABEA95E277', '2025-06-03 18:54:06', '51925-40603'),
(6, '7DDF40FA20250604F3D8A1A8', '1', 'Fat Cotton', '628111221030', 134000, 'Progress', '87E7CAABEA95E277', '2025-06-04 08:57:48', '83625-30604'),
(7, 'F0E6B23B202506049EAB662E', '1', 'Raihan', '6281215616512', 91000, 'Progress', '87E7CAABEA95E277', '2025-06-04 09:57:36', '34825-00604'),
(8, '4776DC432025060400B3A6E1', '1', 'Johan Cruyff', '628111221030', 216000, 'Progress', '87E7CAABEA95E277', '2025-06-04 11:15:54', '91325-20604'),
(9, '1C5ED71120250604966A0967', '1', 'Dejan Soekri Stankovic', '6281215616512', 12500, 'Progress', '87E7CAABEA95E277', '2025-06-04 19:14:58', '73025-00604'),
(10, 'C0B88B77202506040E3EB8FE', '0', 'gn', '6281215616512', 105000, 'Pending', 'XXXXXXXXXXXXXX', '2025-06-04 20:25:12', '77725-60604');

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
  `book_product_price` int(11) NOT NULL,
  `book_product_status` varchar(255) NOT NULL,
  `book_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_product`
--

INSERT INTO `book_product` (`book_product_id`, `book_token`, `product_token`, `product_variant_1_id`, `product_variant_2_id`, `book_product_qty`, `product_variant_1_price_mark`, `product_variant_2_price_mark`, `book_product_price`, `book_product_status`, `book_key`) VALUES
(1, 'A244C1F820250601CAA6D3D9', '79999e1a3fd814f9', 5, 5, 1, 0, 0, 16000, 'Pending', '42025-10601'),
(2, 'A244C1F820250601CAA6D3D9', '74c750610ba09eb2', 13, 13, 2, 0, 0, 7000, 'Pending', '42025-10601'),
(3, 'DB6548A220250601BAAFD16A', 'bd9f03b9ffadf79a', 4, 4, 1, 0, 0, 9000, 'Pending', '5525-70601'),
(4, '88B1C73420250602C96097FC', '2c0079aba1848afa', 3, 3, 1, 0, 0, 16000, 'Progress', '14125-70602'),
(5, '88B1C73420250602C96097FC', 'bd9f03b9ffadf79a', 4, 4, 1, 0, 0, 9000, 'Progress', '14125-70602'),
(6, 'BB8DD8EA2025060312D6531D', '224b1aaee8f036fd', 10, 10, 1, 0, 0, 100000, 'Pending', '58625-40603'),
(7, 'BB8DD8EA2025060312D6531D', '065309f0221cffd8', 11, 11, 5, 0, 0, 200000, 'Pending', '58625-40603'),
(8, '71FCBD5320250603DB9E1B8F', 'bd9f03b9ffadf79a', 4, 4, 1, 0, 0, 9000, 'Pending', '51925-40603'),
(9, '7DDF40FA20250604F3D8A1A8', 'bd9f03b9ffadf79a', 4, 4, 6, 0, 0, 9000, 'Pending', '83625-30604'),
(10, '7DDF40FA20250604F3D8A1A8', '20f9b3d1c890f129', 6, 6, 2, 0, 0, 40000, 'Pending', '83625-30604'),
(11, 'F0E6B23B202506049EAB662E', '2c0079aba1848afa', 3, 3, 4, 0, 0, 16000, 'Pending', '34825-00604'),
(12, 'F0E6B23B202506049EAB662E', 'bd9f03b9ffadf79a', 4, 4, 3, 0, 0, 9000, 'Pending', '34825-00604'),
(13, '4776DC432025060400B3A6E1', '2c0079aba1848afa', 3, 3, 1, 0, 0, 16000, 'Pending', '91325-20604'),
(14, '4776DC432025060400B3A6E1', 'fdba35ca19cb198b', 7, 7, 1, 0, 0, 200000, 'Pending', '91325-20604'),
(15, '1C5ED71120250604966A0967', '9b1cb8a0ad609c76', 9, 9, 1, 0, 0, 12500, 'Pending', '73025-00604'),
(16, 'C0B88B77202506040E3EB8FE', 'fb28b97c60d3b02a', 2, 2, 3, 0, 0, 35000, 'Pending', '77725-60604');

--
-- Triggers `book_product`
--
DELIMITER $$
CREATE TRIGGER `Update Product Sold` AFTER INSERT ON `book_product` FOR EACH ROW BEGIN
    UPDATE product
    SET product_sold = product_sold + NEW.book_product_qty
    WHERE product_token = NEW.product_token;
END
$$
DELIMITER ;

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
(1, 'Poster', 'Kami menyediakan produk poster untuk mempromosikan usaha, kegiatan, atau komunitas yang kamu miliki. Kami menyediakan bermacam ukuran, berbagai jenis bahan, dan beragam bentuk finishing dengan proses cetak terbaik.', '63373865643964313933653731373335.jpg', 4000, 0, 'c78ed9d193e71735'),
(2, 'Kartu Nama', 'Kartu nama menjadi tanda pengenal yang identik untuk menggambarkan seseorang, Kartu nama kamu dicetak dengan bahan dan kualitas terbaik.', '66623238623937633630643362303261.jpg', 35000, 3, 'fb28b97c60d3b02a'),
(3, 'Sticker Vinyl', 'Kertas stiker yang terbuat dari bahan Vinyl atau sebuah plastik lentur. Dengan menggunakan stiker Vinyl ini maka daya tahan jenis stiker ini memang sangat baik karena lebih tahan dengan air dan juga cuaca.', '32633030373961626131383438616661.jpg', 16000, 6, '2c0079aba1848afa'),
(4, 'Sticker Cromo', 'Stiker Cromo merupakan stiker (dari bahan kertas licin) yang memang bagus untuk dicetak separasi, juga memiliki daya lengket yang bagus biasa digunakan pada label botol, promosi. Stiker Cromo tidak tahan dengan air, oleh karena itu cocok ditempelkan atau digunakan indoor.', '62643966303362396666616466373961.jpg', 9000, 12, 'bd9f03b9ffadf79a'),
(5, 'Stiker Vinyl Transparan', 'Stiker Vinyl Transparant merupakan kertas stiker yang terbuat dari bahan Vinyl atau sebuah plastik lentur yang transparant. Dengan menggunakan stiker Vinyl ini maka daya tahan jenis stiker ini memang sangat baik karena lebih tahan dengan air dan juga cuaca.', '373939393965316133666438313466391.jpg', 16000, 4, '79999e1a3fd814f9'),
(6, 'Mini X Banner', 'Kami menyediakan produk Mini X Banner untuk mempromosikan usaha, kegiatan, atau komunitas yang kamu miliki. Mini X Banner hanya memiliki 1 ukuran yakni, 28.5 x 43 mm. Mini X Banner cocok digunakan untuk aktivitas indoor dan sangat mudah untuk dibawa kemanapun kamu pergi.', '323066396233643163383930663132391.jpg', 40000, 2, '20f9b3d1c890f129'),
(7, 'Tripod Banner', 'Kami menyediakan produk Tripod Banner untuk mempromosikan usaha, kegiatan, atau komunitas yang anda miliki. Tripod Banner memiliki beragam ukuran sesuai dengan kebutuhan anda yang cocok digunakan untuk indoor maupun outdoor.', '66646261333563613139636231393862.jpg', 200000, 1, 'fdba35ca19cb198b'),
(8, 'Tote Bag', 'Buat tote bag sesuai selera dan desain kamu dengan Direct Transfer Fillm (DTF) adalah metode printing digital yang menggunakan paduan tinta pigment dengan hotmelt powder.', '63343131386434303565396263316231.jpg', 25000, 0, 'c4118d405e9bc1b1'),
(9, 'Photo Polaroid', 'Nggak harus punya kamera polaroid untuk mendapatkan hasil foto ala polaroid. Kami menyediakan 2 jenis ukuran untuk foto polaroid yakni 8.5 x 10 cm dan 9 x 6 cm. Anda dapat memilih template sesuai dengan ukuran yang tersedia. ', '39623163623861306164363039633736.jpg', 12500, 5, '9b1cb8a0ad609c76'),
(10, 'Photo Book', 'Photo Book adalah album foto berupa buku yang berisi foto kenangan atau portofolio Anda, bisa dilengkapi dengan judul dan tulisan di dalamnya. Photo Book sudah menjadi tren pengganti album foto konvensional karena bisa didesain sesuai keinginan, berkelas dan personal.', '323234623161616565386630333666641.jpg', 100000, 1, '224b1aaee8f036fd'),
(11, 'Brosur (500)', 'Kami menyediakan paket brosur untuk mempromosikan usaha, kegiatan, atau komunitas yang kamu miliki. Kami menyediakan bermacam ukuran, berbagai jenis bahan, dan beragam bentuk finishing dengan proses cetak terbaik.', '30363533303966303232316366666438.jpg', 200000, 5, '065309f0221cffd8'),
(12, 'Pin', 'Pin adalah salah satu assesoris yang biasa menghiasi pakaian, topi, tas yang digunakan sebagai alat promosi komunitas, perusahaan, sekolah, kegiatan ataupun kampanye politik. Bentuk yang unik serta harga yang terjangkau serta desain yang menarik selalu menjadikan produk ini pilihan yang tepat untuk berpromosi.', '34613162376632613430306366663230.jpg', 6000, 0, '4a1b7f2a400cff20'),
(13, 'Gantungan Kunci', 'Gantungan  kunci yang berbentuk Akrilik adalah salah satu assesoris yang biasa digunakan sebagai alat promosi komunitas, perusahaan, sekolah, kegiatan ataupun kampanye politik. Bentuk yang unik serta harga yang terjangkau serta desain yang menarik selalu menjadikan produk ini pilihan yang tepat untuk berpromosi.', '37346337353036313062613039656232.jpg', 7000, 4, '74c750610ba09eb2');

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
(1, 'c78ed9d193e71735', 'c78ed9d193e71735c08895cd.jpg', '635b9524f891b468'),
(2, '2c0079aba1848afa', '2c0079aba1848afa12442bad.jpg', 'f427f7f353880c38');

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
(1, 'c78ed9d193e71735', 'Default', 0, ''),
(2, 'fb28b97c60d3b02a', 'Default', 0, ''),
(3, '2c0079aba1848afa', 'Default', 0, ''),
(4, 'bd9f03b9ffadf79a', 'Default', 0, ''),
(5, '79999e1a3fd814f9', 'Default', 0, ''),
(6, '20f9b3d1c890f129', 'Default', 0, ''),
(7, 'fdba35ca19cb198b', 'Default', 0, ''),
(8, 'c4118d405e9bc1b1', 'Default', 0, ''),
(9, '9b1cb8a0ad609c76', 'Default', 0, ''),
(10, '224b1aaee8f036fd', 'Default', 0, ''),
(11, '065309f0221cffd8', 'Default', 0, ''),
(12, '4a1b7f2a400cff20', 'Default', 0, ''),
(13, '74c750610ba09eb2', 'Default', 0, '');

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
(1, 'c78ed9d193e71735', 'Default', 0, ''),
(2, 'fb28b97c60d3b02a', 'Default', 0, ''),
(3, '2c0079aba1848afa', 'Default', 0, ''),
(4, 'bd9f03b9ffadf79a', 'Default', 0, ''),
(5, '79999e1a3fd814f9', 'Default', 0, ''),
(6, '20f9b3d1c890f129', 'Default', 0, ''),
(7, 'fdba35ca19cb198b', 'Default', 0, ''),
(8, 'c4118d405e9bc1b1', 'Default', 0, ''),
(9, '9b1cb8a0ad609c76', 'Default', 0, ''),
(10, '224b1aaee8f036fd', 'Default', 0, ''),
(11, '065309f0221cffd8', 'Default', 0, ''),
(12, '4a1b7f2a400cff20', 'Default', 0, ''),
(13, '74c750610ba09eb2', 'Default', 0, '');

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
(7, 2, 'Test', 'test1@gmail.com', '0921401294712', 'WS/qf6uzBIpWBkyYQ2PoW.iZzO2jSodg5Sov8HNyZR5cmM9TjphTu', 'Active', '0000-00-00', '266E20250512B2D4'),
(8, 1, 'PrintMax ', 'admin@print-max.site', '628111111111', 'O7FwsE71eqd8S70L0xafSeoZjUCSSGNyO88H1VWL8y8uazr6L25ye', 'Deactive', '2025-06-04', 'XXXXXXXXXXXXXX');

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
  MODIFY `agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agent_cart`
--
ALTER TABLE `agent_cart`
  MODIFY `agent_cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `book_product`
--
ALTER TABLE `book_product`
  MODIFY `book_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `product_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_variant_1`
--
ALTER TABLE `product_variant_1`
  MODIFY `product_variant_1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_variant_2`
--
ALTER TABLE `product_variant_2`
  MODIFY `product_variant_2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `user_cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
