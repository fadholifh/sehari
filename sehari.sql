-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2019 at 02:46 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sehari`
--
CREATE DATABASE IF NOT EXISTS `sehari` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sehari`;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

DROP TABLE IF EXISTS `level`;
CREATE TABLE `level` (
  `level_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `news` int(2) NOT NULL,
  `pages` int(2) NOT NULL,
  `messages` int(2) NOT NULL,
  `market` int(2) NOT NULL,
  `product` int(2) NOT NULL,
  `user` int(2) NOT NULL,
  `level` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `name`, `news`, `pages`, `messages`, `market`, `product`, `user`, `level`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Super Admin', 1, 1, 1, 1, 1, 1, 1, '2018-02-16 00:00:00', '2018-02-16 00:00:00', 1),
(2, 'Inputer', 1, 1, 0, 1, 0, 0, 1, '2018-02-19 19:59:48', '2018-02-19 23:28:05', 1),
(5, 'Usern', 1, 1, 1, 1, 1, 1, 1, '2018-02-19 19:45:48', '2018-02-19 23:16:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `market`
--

DROP TABLE IF EXISTS `market`;
CREATE TABLE `market` (
  `market_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `img` varchar(100) NOT NULL DEFAULT 'default/img.png',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `author` int(11) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `market`
--

INSERT INTO `market` (`market_id`, `name`, `address`, `img`, `created_at`, `updated_at`, `author`, `status`) VALUES
(1, 'Pasar Wonosobo', 'Jl. Wonosobo', 'market-pasar-wonosobo.png', '2018-02-17 00:00:00', '2018-02-25 10:53:28', 1, 1),
(2, 'Pasar Sukoharjo', 'Jl. Sukoharjo', 'market-pasar-sukoharjo.png', '2018-02-17 00:00:00', '2018-02-25 10:32:37', 1, 1),
(3, 'Pasar Wonosari', 'Jl. Wonosari', 'default/img.png', '2018-02-17 00:00:00', '2018-02-17 00:00:00', 1, 1),
(4, 'Bringharjo Market', 'Jl. Bringharjo No.156, Yogyakarta, Yogyakarta', 'default/img.png', '2018-02-23 18:20:17', '2018-02-23 21:22:23', 1, 1),
(9, 'Pasar Induk Banjarnegara', 'Jl. Pemuda No. 168 Banjarnegara', 'market-pasar-induk-banjarnegara.png', '2018-02-25 10:29:45', '2018-02-25 10:29:45', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `type` varchar(150) NOT NULL,
  `size` varchar(15) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `name`, `type`, `size`, `date`) VALUES
(1, 'bubble.png', 'image/png', '91.23', '2018-02-23'),
(2, 'trash.png', 'image/png', '86.2', '2018-02-23'),
(3, 'trash1.png', 'image/png', '86.2', '2018-02-23'),
(4, 'params.png', 'image/png', '101.67', '2018-02-23'),
(5, 'sunnernote-.png', 'image/png', '75.57', '2018-02-25'),
(6, 'summernote-.png', 'image/png', '91.64', '2018-02-25'),
(7, 'summernote-firepng.png', 'image/png', '80.39', '2018-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `name`, `email`, `phone`, `content`, `created_at`, `status`) VALUES
(1, 'Franssssss', 'frans@gmail.com', '+6329127311', 'Is data update?', '2018-02-17 00:00:00', 0),
(8, 'adam', 'admin@admin.com', 'adam', 'adam', '2018-02-19 01:14:34', 0),
(9, 'adam levine', 'adam@adam.com', 'adam', 'adam', '2018-02-19 01:16:10', 0),
(10, 'James Lebron', 'lebron@james.com', '+1234555312', 'Im MVP', '2018-02-19 12:30:36', 0),
(11, 'John Dowse', 'johm@do.com', '+8273213781', 'aklsdlaksdn', '2018-02-19 20:19:20', 0),
(12, 'john', 'john@fa.com', '+273837817', 'Lol', '2018-02-25 14:28:33', 1),
(13, 'asdad', 'sad@saudh.com', 'asdj', 'ojsado', '2018-02-25 14:29:57', 1),
(14, 'ada', 'aisdh@asldj.com', 'odsmfo', 'omdsvo', '2018-02-25 14:36:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `img` varchar(100) NOT NULL DEFAULT 'default/img.png',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `author` int(11) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `content`, `img`, `created_at`, `updated_at`, `author`, `status`) VALUES
(1, 'Harga Cabai Naik', 'Harga cabai naik, It frees the memory associated with the result and deletes the result resource ID. Normally PHP frees its memory automatically at the end of script execution. However, if you are running a lot of queries in a particular script you might want to free the result after each query result has been generated in order to cut down on memory consumption. It frees the memory associated with the result and deletes the result resource ID. Normally PHP frees its memory automatically at the end of script execution. However, if you are running a lot of queries in a particular script you might want to free the result after each query result has been generated in order to cut down on memory consumption.', 'default/img.png', '2018-02-17 00:00:00', '2018-02-17 00:00:00', 1, 1),
(2, 'harga eek naik ^', '<p>harga eek naik</p><p><img src=\"http://localhost/sehari/assets/images/summernote/trash1.png\" style=\"width: 136.619px; height: 156px;\"><span style=\"color: inherit;\">Harga cabai naik, It frees the memory associated with the result and deletes the result resource ID. Normally PHP frees its memory automatically at the end of script execution. However, if you are running a lot of queries in a particular script you might want to free the result after each query result has been generated in order to cut down on memory consumption. It frees the memory associated with the result and deletes the result resource ID. Normally PHP frees its memory automatically at the end of script execution. However, if you are running a lot of queries in a particular script you might want to free the result after each query result has been generated in order to cut down on memory consumption.</span><br></p>', 'news-harga-eek-naik-.png', '2018-02-23 21:29:09', '2018-02-25 10:56:26', 1, 1),
(3, 'harga eek turun nich', '<p>harga eek turun</p><p><img src=\"http://localhost/sehari/assets/images/summernote/params.png\" style=\"width: 91px; height: 91px;\"><br></p>', 'news-harga-eek-turun-nich.png', '2018-02-23 21:30:07', '2018-02-25 10:49:32', 1, 1),
(4, 'News', '<p>Harga cabai naik, It frees the memory associated with the result and deletes the result resource ID. Normally PHP frees its memory automatically at the end of script execution. However, if you are running a lot of queries in a particular script you might want to free the result after each query result has been generated in order to cut down on memory consumption. It frees the memory associated with the result and deletes the result resource ID. Normally PHP frees its memory automatically at the end of script execution. However, if you are running a lot of queries in a particular script you might want to free the result after each query result has been generated in order to cut down on memory consumption.<br></p>', 'news-news.png', '2018-02-25 10:57:19', '2018-02-25 10:57:19', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
CREATE TABLE `page` (
  `page_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `author` int(11) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`page_id`, `title`, `content`, `created_at`, `updated_at`, `author`, `status`) VALUES
(1, 'Tentang Kami', 'Tentang Kami\r\nDengan ketersediaan data harga bahan pokok yang lengkap, kontinue dan muktahir (update), maka tujuan sehati (pemantauan harga): <div><ol><li>Memantau perkembangan lonjakan harga bahan pokok<br></li><li>Mengetahui penyebab kenaikan harga bahan pokok<br></li><li>Menganalisa apakah inflasi/deflasi yang terjadi terkait perkembangan harga bahan pokok<br></li><li>Mengetahui disparitas harga komoditas antar pasar<br></li><li>Merumuskan kebijakan terkait stabilitas harga dan ketersediaan bahan pokok<br></li><li>Memberikan info harga kepada masyarakat luas<br></li></ol></div>', '2018-02-17 00:00:00', '2018-02-24 22:15:05', 1, 1),
(2, 'Contact Usa', '<p>testing aaaaaalalalalala</p><p><img src=\"http://localhost/sehari/assets/images/summernote/bubble.png\" style=\"width: 181.25px; height: 158.773px;\"><br></p>', '2018-02-23 17:44:51', '2018-02-24 22:15:44', 1, 1),
(3, 'ihsdfoihsfodih', '<p>ihsdoifhosidfhoi aisdhoiasdh</p><p><img src=\"http://localhost/sehari/assets/images/summernote/sunnernote-.png\" style=\"width: 157.25px; height: 113.001px;\"><br></p>', '2018-02-23 20:05:06', '2018-02-25 11:01:49', 1, 1),
(4, 'ushdfisdhfiuh', '<p>uiefhuiewgfigwuef</p><p><img src=\"http://localhost/sehari/assets/images/summernote/summernote-.png\" style=\"width: 109.901px; height: 103px;\"><br></p><p><img src=\"http://localhost/sehari/assets/images/summernote/summernote-firepng.png\" style=\"width: 115.465px; height: 167px;\"><br></p>', '2018-02-25 11:02:29', '2018-02-25 11:06:19', 1, 1),
(5, 'asdsad', '<p><ul><li>asdasdadasd<br></li><li>fhfhfh</li></ul></p>', '2018-02-25 16:15:38', '2018-02-25 16:15:38', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL DEFAULT 'default/img.png',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `author` int(11) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `unit`, `img`, `created_at`, `updated_at`, `author`, `status`) VALUES
(1, 'Beras', 'Kg', 'product-beras.png', '2018-02-17 00:00:00', '2018-02-25 11:10:43', 1, 1),
(2, 'Bawang Merah', 'Kg', 'default/img.png', '2018-02-17 00:00:00', '2018-02-24 22:23:37', 1, 0),
(3, 'Kedelai', 'Kg', 'default/img.png', '2018-02-17 00:00:00', '2018-02-17 00:00:00', 1, 1),
(4, 'Minyak', 'Liter', 'default/img.png', '2018-02-17 00:00:00', '2018-02-17 00:00:00', 1, 1),
(5, 'Gula', 'Kg', 'default/img.png', '2018-02-17 00:00:00', '2018-02-17 00:00:00', 1, 1),
(6, 'Garam', 'gram', 'product-garam.png', '2018-02-23 22:16:49', '2018-02-25 11:10:03', 1, 1),
(7, 'Lada', 'gram', 'product-lada.png', '2018-02-25 11:12:02', '2018-02-25 11:12:02', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

DROP TABLE IF EXISTS `product_detail`;
CREATE TABLE `product_detail` (
  `pd_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `market_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `price` float NOT NULL,
  `author` int(11) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`pd_id`, `product_id`, `market_id`, `date`, `price`, `author`, `status`) VALUES
(1, 1, 1, '2018-02-17', 17000, 1, 1),
(2, 2, 1, '2018-02-17', 13000, 2, 1),
(3, 3, 2, '2018-02-17', 11000, 2, 1),
(4, 1, 1, '2018-02-24', 13000, 1, 1),
(5, 1, 1, '2018-02-25', 1, 1, 1),
(8, 2, 1, '2018-03-02', 6000, 1, 1),
(9, 3, 1, '2018-03-02', 5000, 1, 1),
(10, 4, 1, '2018-03-02', 6000, 1, 1),
(11, 5, 1, '2018-03-02', 6000, 1, 1),
(12, 6, 1, '2018-03-02', 6000, 1, 1),
(13, 7, 1, '2018-03-02', 5000, 1, 1),
(17, 2, 1, '2018-03-01', 6000, 1, 1),
(18, 3, 1, '2018-03-01', 5000, 1, 1),
(19, 4, 1, '2018-03-01', 6000, 1, 1),
(20, 5, 1, '2018-03-01', 6000, 1, 1),
(21, 6, 1, '2018-03-01', 6000, 1, 1),
(22, 7, 1, '2018-03-01', 10000, 1, 1),
(23, 2, 1, '2018-02-28', 6000, 1, 1),
(24, 3, 1, '2018-02-28', 5000, 1, 1),
(25, 4, 1, '2018-02-28', 6000, 1, 1),
(26, 5, 1, '2018-02-28', 6000, 1, 1),
(27, 6, 1, '2018-02-28', 6000, 1, 1),
(28, 7, 1, '2018-02-28', 5000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `name` varchar(100) NOT NULL,
  `avatar` varchar(100) NOT NULL DEFAULT 'default/img.png',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `forgot` varchar(50) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `name`, `avatar`, `created_at`, `updated_at`, `forgot`, `level`, `status`) VALUES
(1, 'admin@admin.com', 'e0523f45b545314fa7f99243db75cab1e9c45aad87482677a3608f862b9d694304736dbfc2c09d42c27cfa96594196b84ba5795a068f10bd6c67e5f47cac34b3', 'Super Admins', 'avatar-super-admins.jpg', '2018-02-16 00:00:00', '2018-03-01 16:55:33', '', 1, 1),
(2, 'seventeenpls@gmail.com', 'bbb1975a3e0ef29eb2f675841a45f7f26c323ca867a3f7a653794d2d2cbb2755f50ac838c271a9e8e106b69f809dab25c74446caed218868152fe28aa224bf0e', 'Ini User', 'avatar-ini-user1.png', '2018-02-17 00:00:00', '2018-02-25 18:10:05', '', 2, 1),
(3, 'adam@adams.com', 'a94d0d671e3caaf72c95fbc0f405ca6f4a7e5e4f7aaecba7164f65829856b5b9c61934f74ad431f413d31dfddb29517df080856a357c11ddcf58865f95e89a98', 'Adams', 'avatar-adams1.png', '2018-02-24 17:11:04', '2018-02-25 18:12:36', '', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `market`
--
ALTER TABLE `market`
  ADD PRIMARY KEY (`market_id`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`page_id`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`pd_id`),
  ADD KEY `market_id` (`market_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `level` (`level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `market`
--
ALTER TABLE `market`
  MODIFY `market_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `market`
--
ALTER TABLE `market`
  ADD CONSTRAINT `market_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `page_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `product_detail_ibfk_1` FOREIGN KEY (`market_id`) REFERENCES `market` (`market_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_detail_ibfk_3` FOREIGN KEY (`author`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`level`) REFERENCES `level` (`level_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
