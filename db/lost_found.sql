-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 08, 2025 at 06:45 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lost_found`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `loacation_found` varchar(255) NOT NULL,
  `contact_info` varchar(255) NOT NULL,
  `status` enum('pending','approved') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `type`, `description`, `image`, `loacation_found`, `contact_info`, `status`, `created_at`) VALUES
(10, 'Watch (Casio)', '	Electronics', 'Digital, black strap, working', '681b766c374c11.33490597.webp', 'Nyarutarama, Roadside', '0725551212', 'approved', '2025-05-07 15:04:12'),
(11, 'School Backpack', 'Bag', 'Blue with white stripes, books inside', '681ba73b663227.01055325.jpg', 'Gikondo, Near IPRC', '0739876543', 'pending', '2025-05-07 18:32:27'),
(12, 'Umbrella (Blue)', 'Personal Item', 'Large, with wooden handle', '681ba7b8370e88.45336631.jpg', 'Kicukiro, Bus Stop', 'goodsam@mail.com', 'approved', '2025-05-07 18:34:32'),
(13, 'Passport (Rwandan)', 'Documents', 'Name: \"Jean Uwimana\", expires 2025', '681ba833c9ee18.67266880.jpg', 'Nyamirambo, Near Mosque', 'returndocs@proton.me', 'pending', '2025-05-07 18:36:35'),
(14, 'Silver Earrings', 'Jewelry', 'Small hoop earrings, one missing', '681ba8db028cf7.29619825.jfif', 'Nyabugogo Bus Station', 'finder2@yahoo.com', 'approved', '2025-05-07 18:39:23'),
(15, 'Sunglasses (Ray-Ban)', 'Accessories', 'Black aviator style, slight scratch', '681ba9a0ae30e5.35931674.avif', 'Kacyiru, Near Parliament', '0725551212', 'pending', '2025-05-07 18:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(8, 'test4', 'test4@gmail.com', '4tests', 'user'),
(7, 'test3', 'test3@gmail.com', 'test', 'user'),
(6, 'test', 'test@gmail.com', '1345', 'user'),
(5, 'sam', 'sam@gmsil.com', '1234', 'user'),
(9, 'kezia', 'kezia@shadow.com', '0987', 'user'),
(11, 'Admin', 'samueluwayo17@gmail.com', 'sam1000$', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
