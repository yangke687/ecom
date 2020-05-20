-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2020-05-20 02:30:56
-- 服务器版本： 10.1.10-MariaDB-log
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- 表的结构 `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `cat_stat` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_stat`) VALUES
(1, 'example 1', 1),
(2, 'example 2', 1),
(5, 'Jeans', 1),
(6, 'Jeans', 0),
(7, 'T-Shirts', 1),
(8, '123', 0),
(9, 'Mac Series', 1),
(10, 'Windows Pro ', 1),
(11, 'Mac Mini', 1),
(12, 'mac mini', 0),
(13, '123', 0),
(14, '321', 0);

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_amount` float NOT NULL,
  `order_transaction` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_currency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`order_id`, `order_amount`, `order_transaction`, `order_status`, `order_currency`) VALUES
(28, 649.96, '79209533UU1048057', 'Completed', 'USD'),
(30, 324.98, '7L935600A8657345K', 'Completed', 'USD'),
(33, 324.98, '7L935600A8657345K1', 'Completed', 'USD'),
(34, 324.98, '7L935600A8657345K2', 'Completed', 'USD'),
(35, 324.98, '7L935600A8657345K3', 'Completed', 'USD'),
(38, 29, '29522648JX927993X', 'Completed', 'USD');

-- --------------------------------------------------------

--
-- 表的结构 `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_description` text NOT NULL,
  `short_desc` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_category_id`, `product_price`, `product_description`, `short_desc`, `product_image`, `product_quantity`) VALUES
(1, 'product 1 billy', 1, 99.99, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ac tempus nisl, at pharetra mi. Ut id tempus erat. Cras ultrices hendrerit nisl, at ultrices massa tincidunt id. Vestibulum quis ligula molestie, malesuada sem id, accumsan enim. Quisque mattis id sem at pharetra. Aenean ut nunc arcu. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam scelerisque odio quam, ac venenatis tellus vestibulum ut. In et turpis vel ex faucibus sollicitudin. Phasellus a tristique massa. Curabitur cursus lorem a lacus ornare, id porttitor augue venenatis. Quisque eu aliquet turpis. Nunc vel lacus quis quam fermentum auctor vel a ipsum. Vestibulum at molestie nulla. Duis porta malesuada tristique.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '320x150.png', 51),
(2, 'product 2', 1, 24.99, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ac tempus nisl, at pharetra mi. Ut id tempus erat. Cras ultrices hendrerit nisl, at ultrices massa tincidunt id. Vestibulum quis ligula molestie, malesuada sem id, accumsan enim. Quisque mattis id sem at pharetra. Aenean ut nunc arcu. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam scelerisque odio quam, ac venenatis tellus vestibulum ut. In et turpis vel ex faucibus sollicitudin. Phasellus a tristique massa. Curabitur cursus lorem a lacus ornare, id porttitor augue venenatis. Quisque eu aliquet turpis. Nunc vel lacus quis quam fermentum auctor vel a ipsum. Vestibulum at molestie nulla. Duis porta malesuada tristique.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '320x150.png', 5),
(15, '123', 1, 111, '321', '11asdfasdf', '320x150.png', 1),
(16, 'Blue Jeans', 2, 29, 'Pretty Blue Jeans', 'good !', '320x150.png', 1),
(17, 'product 2 lually', 1, 24.99, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ac tempus nisl, at pharetra mi. Ut id tempus erat. Cras ultrices hendrerit nisl, at ultrices massa tincidunt id. Vestibulum quis ligula molestie, malesuada sem id, accumsan enim. Quisque mattis id sem at pharetra. Aenean ut nunc arcu. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam scelerisque odio quam, ac venenatis tellus vestibulum ut. In et turpis vel ex faucibus sollicitudin. Phasellus a tristique massa. Curabitur cursus lorem a lacus ornare, id porttitor augue venenatis. Quisque eu aliquet turpis. Nunc vel lacus quis quam fermentum auctor vel a ipsum. Vestibulum at molestie nulla. Duis porta malesuada tristique.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '320x150.png', 5);

-- --------------------------------------------------------

--
-- 表的结构 `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `reports`
--

INSERT INTO `reports` (`report_id`, `order_id`, `product_id`, `product_title`, `product_price`, `product_quantity`) VALUES
(19, 28, 2, 'product 2', 24.99, 2),
(20, 28, 1, 'product 1', 299.99, 2),
(21, 30, 2, 'product 2', 24.99, 1),
(22, 30, 1, 'product 1', 299.99, 1),
(23, 30, 1, 'product 1', 299.99, 1),
(24, 30, 1, 'product 1', 299.99, 1);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `user_photo`) VALUES
(1, 'rico', 'rico@hotmail.com', '123', ''),
(2, 'edwin', 'support@edwindiaz.com', 'secret', ''),
(3, 'edwin', 'support@edwindiaz.com', 'secret', ''),
(7, 'dem_user', 'dem@demo.com', 'dem', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `order_transaction` (`order_transaction`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- 使用表AUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- 使用表AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- 使用表AUTO_INCREMENT `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
