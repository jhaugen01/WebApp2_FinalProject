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
-- Table structure for table `toppings_sold`
--

CREATE TABLE IF NOT EXISTS `toppings_sold` (
  `topping_id` int(11) NOT NULL,
  `topping_name` varchar(50) NOT NULL,
  `amount_sold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toppings_sold`
--

INSERT INTO `toppings_sold` (`topping_id`, `topping_name`, `amount_sold`) VALUES
(1, 'Cheese', 5),
(2, 'Sausage', 4),
(3, 'Pepperoni', 3),
(4, 'Meat', 3),
(5, 'Veggies', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `toppings_sold`
--
ALTER TABLE `toppings_sold`
 ADD UNIQUE KEY `topping_id` (`topping_id`,`topping_name`), ADD KEY `toppings_sold_ibfk_2` (`topping_name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `toppings_sold`
--
ALTER TABLE `toppings_sold`
ADD CONSTRAINT `toppings_sold_ibfk_1` FOREIGN KEY (`topping_id`) REFERENCES `toppings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `toppings_sold_ibfk_2` FOREIGN KEY (`topping_name`) REFERENCES `toppings` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
