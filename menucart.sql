-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2022 at 03:29 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `menucart`
--

-- --------------------------------------------------------
--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'drink'),
(2, 'apetizer'),
(3, 'maindish'),
(4, 'dessert');

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--
--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`id`, `name`, `description`, `price`, `image`, `category_id`) VALUES
(1, 'Beer', 'Cold and fresh pint', 2, 'beer-6350ff657320f.jpg', 1),
(2, 'Toast with egg', 'Bread with egg, cheese and ham', 5.99, 'bread-6351000018328.jpg', 2),
(3, 'Bread platter', 'Bread with different sausages and cheese', 7.99, 'bread-platter-63510051b99f2.jpg', 2),
(4, 'Hamburger', 'Juicy Burger made from 100% beef', 3.95, 'burger-63510083ec8b7.jpg', 3),
(5, 'Cola', 'Glass of Coca Cola', 2.5, 'cola-635100a2e18bd.jpg', 1),
(6, 'Ice cream', 'Ice cream with fruit', 3, 'icecream1-635100d76bc89.jpg', 4),
(7, 'Ice cream', 'Ice cream on a horn', 2.5, 'icecream2-63510104e8944.jpg', 4),
(8, 'Strawberry Dessert', 'Yoghurt with strawberries', 4.5, 'strawberry-635101377473f.jpg', 4),
(9, 'Steak', 'Steak from Agnus beef', 17.9, 'steak-635101667cc50.jpg', 3),
(10, 'Lasagne', 'Lasagne with bolognaise', 9.9, 'lasagne-63510185dfdeb.jpg', 3),
(11, 'fruit plate', 'Plate with seasonal fruit', 5.5, 'fruit-635101d51d5c3.jpg', 4),
(12, 'Coffee', 'Coffee from Nicaragua', 3.5, 'coffee-63510206e6a74.jpg', 1),
(13, 'Pizza', 'Pizza with olives', 12.8, 'pizza-635102338dc4c.jpg', 3),
(14, 'French fries', 'French fries with herbs', 3.5, 'french-fries-635102742c267.jpg', 3),
(15, 'Pudding', 'Pudding with fruit', 4.9, 'pudding-63510294dd83a.jpg', 4),
(16, 'Salad', 'Salad with goat cheese and figs', 8, 'salad-635102c8ea84a.jpg', 3),
(17, 'Soup', 'Soup of the day', 3.9, 'soup-635102e3c827b.jpg', 2),
(18, 'Tiramisu', 'Traditional tiramisu', 5, 'tiramisu-635102ffc6bbd.jpg', 4),
(19, 'Vegetable platter', 'Plate of seasonal vegetables', 5, 'vorspeise2-6351035621382.jpg', 2),
(20, 'Vegetable skewer', 'Skewers of roasted vegetables', 7.8, 'vorspeise3-635103757f644.jpg', 2),
(21, 'Water', 'Sparkly or still water', 2.5, 'water-635103d237a8b.jpg', 1),
(22, 'Wine', 'White,red or rose', 5.5, 'wine-635103f4aa12c.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

INSERT INTO `order` (`id`, `table_number`, `ordernumber`, `name`, `price`, `status`) VALUES
(3, '1', '3', 'Bread platter', 7.99, 'archived'),
(5, '1', '2', 'Toast with egg', 5.99, 'open'),
(6, '1', '10', 'Lasagne', 9.9, 'open'),
(8, '5', '5', 'Cola', 2.5, 'open'),
(9, '3', '2', 'Toast with egg', 5.99, 'finished');



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
