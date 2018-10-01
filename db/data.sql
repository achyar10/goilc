-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 01, 2018 at 11:55 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goilc`
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `user_full_name`, `user_image`, `user_description`, `user_role_role_id`, `user_input_date`, `user_last_update`, `user_last_login`) VALUES
(1, 'admin@ilc.co.id', 'cfae66c98aa8d86383e07f1e1ea5d68e1cc6a613', 'Administrator', NULL, 'SUPER ADMIN', 1, '2018-10-01 04:15:29', '2018-10-01 04:19:31', '2018-10-01 04:19:31');

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`role_id`, `role_name`) VALUES
(1, 'SUPERADMIN'),
(2, 'ADMIN');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
