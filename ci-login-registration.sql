-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2025 at 02:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci-login-registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expiry` varchar(50) NOT NULL,
  `created_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_tokens`
--

INSERT INTO `auth_tokens` (`id`, `user_id`, `token`, `expiry`, `created_at`) VALUES
(4, 4, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImphaW5pc2hrYW5wYXJpeWFAZ21haWwuY29tIiwicGFzc3dvcmQiOiIkMnkkMTAkbU9HVVJ6VUx6WG1TQWV6RENyZFh3T25QWDh6aHhPak9uRnl0ZWlBelBqRkVTMTk0Y1kxZGUiLCJleHAiOjE3NDEyNDI1NDh9.mwpvmVtftTb6QHr1O5FPJUfgzeeEU1cId8SIAEO5mr0', '2025-03-06 11:59:08', '2025-03-06 10:59');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_templete`
--

CREATE TABLE `email_templete` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `email_templete`
--

INSERT INTO `email_templete` (`id`, `title`, `key`, `subject`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Forgot Password Otp', 'forgot_password_otp', 'Forgot Password', '<p>Your OTP is: <strong>{Otp}</strong></p>', '2025-03-06 07:25:43', '2025-03-06 07:25:43'),
(3, 'Welcome Mail', 'welcome_mail', 'Welcome Mail', '<h2>Dear {Fullname},</h2>\r\n<p>Thank you for registering with us. We are excited to have you on board!<br>Your Login Details:-<br>&nbsp; &nbsp; &nbsp; <strong>Email</strong>:- {Email}<br>&nbsp; &nbsp; &nbsp; <strong>Password</strong>:- {Password}</p>\r\n<p>Best Regards,<br>Your Website Team</p>', '2025-03-06 08:40:48', '2025-03-06 08:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_image` text NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `password` text NOT NULL,
  `otp` int(11) DEFAULT NULL,
  `expire_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `fullname`, `email`, `profile_image`, `phone_no`, `dob`, `password`, `otp`, `expire_at`, `created_at`, `updated_at`) VALUES
(1, 'Jenish Kanpariya', 'jainishkanpariya@gmail.com', '1741252151_auth-login.png', '7845124512', '2025-03-06', '$2y$10$HtZNH2WxAQkSomTA6XqhLeoaqAIuiHgu5nEUaVTolEo/pRETfk47G', NULL, NULL, '2025-03-06 09:09:11', '2025-03-06 09:09:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templete`
--
ALTER TABLE `email_templete`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `email_templete`
--
ALTER TABLE `email_templete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
