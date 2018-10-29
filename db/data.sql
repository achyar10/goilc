-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 29, 2018 at 11:39 PM
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
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`) VALUES
(1, 'Pelatihan');

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `setting_name`, `setting_value`, `setting_last_update`) VALUES
(1, 'setting_pt', 'PT INOVASI LENTERA CIPTA KREASI', '2018-10-27 03:54:11'),
(2, 'setting_address', 'Gedung Senayan Trade Center [ STC ] Senayan Lt. 4 No. 69 A, Jl. Asia Afrika, Senayan, Jakarta Pusat 10270', '2018-10-27 03:54:11'),
(3, 'setting_phone', '(021) 5793-9389', '2018-10-27 03:54:11'),
(4, 'setting_fax', '(021) 2954-3463', '2018-10-27 03:54:11'),
(5, 'setting_email', 'info@goilc.co.id', '2018-10-27 03:54:11'),
(6, 'setting_linkedin', '-', '2018-10-27 03:54:11'),
(7, 'setting_fb', 'https://facebook.com/achyar.anshorie', '2018-10-27 03:54:11'),
(8, 'setting_twitter', '-', '2018-10-27 03:54:11'),
(9, 'setting_instagram', '-', '2018-10-27 03:54:11');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `user_full_name`, `user_image`, `user_description`, `user_role_role_id`, `user_input_date`, `user_last_update`, `user_last_login`) VALUES
(1, 'admin@goilc.co.id', 'cfae66c98aa8d86383e07f1e1ea5d68e1cc6a613', 'Administrator', NULL, 'SUPER ADMIN', 1, '2018-10-01 04:15:29', '2018-10-02 04:33:56', '2018-10-02 04:33:56');

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`role_id`, `role_name`) VALUES
(1, 'SUPERADMIN'),
(2, 'ADMIN');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
