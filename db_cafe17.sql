-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 14, 2021 at 04:43 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cafe17`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_blog`
--

CREATE TABLE `m_blog` (
  `blog_id` int(11) NOT NULL,
  `blog_date` datetime NOT NULL,
  `blog_title` char(11) NOT NULL,
  `blog_author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_cashier`
--

CREATE TABLE `m_cashier` (
  `cashier_id` int(11) NOT NULL,
  `cashier_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cashier_name` varchar(100) NOT NULL,
  `cashier_address` text NOT NULL,
  `cashier_type` enum('Admin','Cashier') NOT NULL,
  `cashier_email` text NOT NULL,
  `cashier_phone_number` char(20) NOT NULL,
  `cashier_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_cashier`
--

INSERT INTO `m_cashier` (`cashier_id`, `cashier_date`, `cashier_name`, `cashier_address`, `cashier_type`, `cashier_email`, `cashier_phone_number`, `cashier_password`) VALUES
(4, '2021-07-10 11:33:45', 'Wildan', 'Banjar', 'Admin', 'wildan@gmail.com', '08574883999', 'root'),
(5, '2021-07-11 14:49:30', 'Irkham', 'bumiayu', 'Cashier', 'irkham.nazmi@gmail.com', '085786625255', 'root'),
(6, '2021-07-11 14:49:52', 'Qirman', 'Dukuhwaluh', 'Cashier', 'qirman123@gmail.com', '08578899001', 'qirman1234');

-- --------------------------------------------------------

--
-- Table structure for table `m_menu`
--

CREATE TABLE `m_menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `menu_type` enum('Makanan','Minuman') NOT NULL,
  `menu_description` text NOT NULL,
  `menu_price` int(11) NOT NULL,
  `menu_image` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `user_id` int(11) NOT NULL,
  `user_date` datetime NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone_number` char(20) NOT NULL,
  `user_address` text NOT NULL,
  `user_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_transaction`
--

CREATE TABLE `t_transaction` (
  `transaction_id` int(11) NOT NULL,
  `transaction_invoice_code` char(11) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `transacition_total_pay` int(11) NOT NULL,
  `transaction_status` enum('Not yet Paid','Already paid') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_transaction_detail`
--

CREATE TABLE `t_transaction_detail` (
  `transaction_detail_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `transaction_detail_qty` int(11) NOT NULL,
  `transaction_detail_total_price` int(11) NOT NULL,
  `transaction_detail_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_blog`
--
ALTER TABLE `m_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `m_cashier`
--
ALTER TABLE `m_cashier`
  ADD PRIMARY KEY (`cashier_id`);

--
-- Indexes for table `m_menu`
--
ALTER TABLE `m_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `t_transaction`
--
ALTER TABLE `t_transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_blog`
--
ALTER TABLE `m_blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_cashier`
--
ALTER TABLE `m_cashier`
  MODIFY `cashier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `m_menu`
--
ALTER TABLE `m_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_transaction`
--
ALTER TABLE `t_transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
