-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2018 at 07:07 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `c_id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `id` int(11) NOT NULL,
  `cm_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`c_id`, `user`, `comment`, `id`, `cm_date`) VALUES
(3, 'revanth', 'good one', 3, '2018-11-18'),
(4, 'revanth', 'nice', 3, '2018-11-18'),
(9, 'abhi', 'abhi', 3, '2019-11-18'),
(10, 'abhi', 'good and nice', 3, '2019-11-18'),
(11, 'abhi', 'super', 5, '2019-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `title` varchar(60) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(60) NOT NULL,
  `blog_date` date NOT NULL,
  `user` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image`, `blog_date`, `user`) VALUES
(3, 'Title', '            happy yyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyyyy yyyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyyyyyy    yyyyyyyyyyyyyyyyyyyyyyyyyy\r\nyyyyyyyyyyyyyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy yyyyyyyyyyyy yyyyyyyyy yyyyyyyy                                                            ', '1542462456abhi.jpg', '2018-11-16', 'abhi'),
(4, 'Title', ' Abhishek gone to ttttttttttttt tttttttttttttttttt ', '1542463984abhi1.jpg', '2018-11-17', 'abhi'),
(5, 'first', 'this is first blog            ', '1542525613abhi.jpg', '2018-11-18', 'abhi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `image` varchar(60) NOT NULL,
  `blog_id` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `image`, `blog_id`, `email`) VALUES
('abhi', 'saiabhi1', '1542462456abhi.jpg', 'abhi', ''),
('admin', 'saiabhi1', '', 'admin', 'saiabhishek1997@gmail.com'),
('revanth', 'revanth', '', 'revanth', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
