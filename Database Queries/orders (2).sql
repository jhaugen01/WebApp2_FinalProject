-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2015 at 04:38 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webapp2`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `crust` varchar(50) NOT NULL,
  `topping_1` varchar(50) NOT NULL,
  `topping_2` varchar(50) NOT NULL,
  `topping_3` varchar(50) NOT NULL,
  `cost` int(11) NOT NULL,
  `status_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `size`, `crust`, `topping_1`, `topping_2`, `topping_3`, `cost`, `status_time`, `status`) VALUES
(1, 'Josh', 'Large', 'Hand-Tossed', 'Cheese', '', '', 12, '2015-04-17 18:02:04', 'Complete'),
(2, 'Josh', 'Large', 'Deep-Dish', 'Cheese', 'Sausage', 'Sausage', 17, '2015-04-20 16:25:51', 'Complete'),
(3, 'Josh', 'Large', 'Hand-Tossed', 'Cheese', 'Sausage', 'Pepperoni', 16, '2015-04-20 16:26:42', 'Complete'),
(4, 'Josh', 'Medium', 'Hand-Tossed', 'Cheese', 'Sausage', 'Pepperoni', 15, '2015-04-20 16:28:03', 'Complete'),
(5, 'Josh', 'Small', 'Hand-Tossed', 'Cheese', 'Sausage', 'Pepperoni', 14, '2015-04-20 16:28:58', 'Complete'),
(6, 'Josh', 'Large', 'Deep-Dish', 'Meat', 'Veggies', '', 20, '2015-04-20 16:56:38', 'Complete'),
(7, 'Josh', 'Medium', 'Thin', 'Veggies', 'Meat', '', 17, '2015-04-22 15:04:38', 'Complete'),
(8, 'Josh', 'Large', 'Deep-Dish', 'Cheese', 'Meat', 'Veggies', 21, '2015-04-22 15:04:50', 'Complete'),
(9, 'Josh', 'Large', 'Thin', 'Meat', '', '', 15, '2015-04-22 15:11:14', 'Complete'),
(10, 'Josh', 'Medium', 'Deep-Dish', 'Pineapple', 'Veggies', 'Meat', 21, '2015-04-22 15:11:31', 'Complete'),
(11, 'Josh', 'Large', 'Thin', 'Pepperoni', 'Veggies', '', 15, '2015-04-22 17:19:20', 'Complete'),
(12, 'Josh', 'Large', 'Thin', 'Pineapple', 'Sausage', 'Meat', 19, '2015-04-27 14:53:09', 'Complete'),
(13, 'Zach', 'Medium', 'Hand-Tossed', 'Cheese', '', '', 11, '2015-04-27 15:54:03', 'None'),
(14, 'Zach', 'Large', 'Deep-Dish', 'Cheese', 'Meat', '', 18, '2015-04-27 15:46:34', 'None'),
(15, 'Steph', 'Medium', 'Hand-Tossed', 'Meat', 'Meat', 'Cheese', 21, '2015-04-27 16:12:52', 'None'),
(16, 'Zach', 'Medium', 'Thin', 'Cheese', 'Sausage', 'Pepperoni', 14, '2015-04-28 23:06:02', 'None');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`), ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`username`) REFERENCES `customers` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
