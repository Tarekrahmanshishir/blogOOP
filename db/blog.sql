-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 12:02 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(5) NOT NULL,
  `catId` int(5) NOT NULL,
  `blogTitle` varchar(255) NOT NULL,
  `blogContent` text NOT NULL,
  `blogImage` varchar(55) NOT NULL,
  `autherName` varchar(55) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `catId`, `blogTitle`, `blogContent`, `blogImage`, `autherName`, `status`, `createtime`) VALUES
(18, 23, 'Test Blog', 'Etiam posuere tellus mauris, et dignissim nisl rutrum quis. Mauris tincidunt ante sed velit maximus, vel tincidunt leo imperdiet. Morbi nec lacus et metus semper porttitor. Sed pellentesque ex at pellentesque scelerisque. Aliquam placerat gravida tortor, in fermentum ante commodo quis. Etiam vehicula elementum quam. Aliquam eu augue eu lacus dignissim efficitur. Proin ex metus, ornare placerat nisi at, porta lobortis turpis.', '2105111843.jpg', 'Tarek Shishir', 1, '2021-05-11 05:18:43'),
(20, 19, 'Test', 'Inputs of type \"url\" will also become validated by loading the html5 module.', '2105125829.PNG', 'Tarek Shishir', 1, '2021-05-11 17:26:29'),
(27, 22, 'Welcome to WordPress!', 'We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started: We’ve assembled some links to get you started:&nbsp;', '2105122231.jpg', 'Md Tarek Rahman', 1, '2021-05-12 04:22:31');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(2) NOT NULL,
  `categoryName` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `status`, `createtime`, `updatetime`) VALUES
(1, 'Banana', 1, '2021-05-02 03:21:26', '2021-05-11 23:08:16'),
(2, 'Apple', 1, '2021-05-02 03:23:46', '2021-05-11 23:08:14'),
(19, 'News', 1, '2021-05-03 05:41:09', '2021-05-11 23:08:15'),
(20, 'Latest', 1, '2021-05-03 05:41:17', '2021-05-11 23:08:16'),
(21, 'Movie', 1, '2021-05-03 05:42:19', '2021-05-11 23:08:10'),
(22, 'Laptop', 1, '2021-05-03 05:43:21', '2021-05-11 23:08:09'),
(23, 'Mobile', 1, '2021-05-03 05:43:37', '2021-05-11 23:08:08'),
(25, 'Pineapple ', 1, '2021-05-10 23:50:11', '2021-05-12 00:46:17'),
(27, 'Memes', 1, '2021-05-11 17:45:39', '2021-05-11 23:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `photo` varchar(255) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `status`, `photo`, `createtime`, `updatetime`) VALUES
(1, 'Tarek Shishir', 'shishir', 'e108c762ad97c3be28ecf84fb0d0c70f', 1, '', '2021-05-01 23:20:50', '2021-05-11 02:15:44'),
(5, 'Tarek Rahman', 'tarekrshishir', 'e10adc3949ba59abbe56e057f20f883e', 1, '2105122201.jpg', '2021-05-12 03:22:01', '2021-05-12 03:22:01'),
(6, 'Md Tarek Rahman', 'TarekShishir', 'e108c762ad97c3be28ecf84fb0d0c70f', 1, '2105121941.PNG', '2021-05-12 04:19:41', '2021-05-12 04:19:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`categoryName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
