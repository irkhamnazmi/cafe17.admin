-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 04, 2021 at 04:19 PM
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
  `blog_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `blog_title` char(255) NOT NULL,
  `cashier_id` int(11) NOT NULL,
  `blog_image` char(100) NOT NULL,
  `blog_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_blog`
--

INSERT INTO `m_blog` (`blog_id`, `blog_date`, `blog_title`, `cashier_id`, `blog_image`, `blog_description`) VALUES
(2, '2021-10-22 23:37:19', 'Turnament Mobile Legend', 4, 'mlegend.png', '<p>Heyooo don&#39;t miss it, come to join our tourney of mobile legends.. Ayo uji squad kalian, jadikan team kalian yang terbaik dan dapatkan hadiah jutaan rupiah.</p>\r\n'),
(3, '2021-10-24 13:56:03', 'Berbagi Bersama Kami', 5, 'berbagi.png', '<p>Terimakasih kepada PT. Berkah Sentosa Perkasa dan mas WiraNagara sudah mempercayakan cafe17 untuk menyalurkan niat baik anda. Donasi berupa 50 nasi box dan tajil serta uang sudah diberikan ke Yayasan Yatim Piatu Karomatul Hikmah. Cafe 17 masih siap menyalurkan niat baik anda, mari silakan konsultasikan pada kami. Wa 085725003400 Semoga rejeki anda selalu berkah. Aamiin.</p>\r\n\r\n<p>#berbagibersamacafe17 #berbagibersama #goodpeople #nasiboxpurwokerto #nasiboxmurahpurwokerto #grabfood #kulinerpurwokertookerto #grabfood #kulinerpurwokerto</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `m_cashier`
--

CREATE TABLE `m_cashier` (
  `cashier_id` int(11) NOT NULL,
  `cashier_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cashier_name` varchar(100) NOT NULL,
  `cashier_address` text NOT NULL,
  `cashier_category` enum('Admin','Cashier') NOT NULL,
  `cashier_email` text NOT NULL,
  `cashier_phone_number` char(20) NOT NULL,
  `cashier_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_cashier`
--

INSERT INTO `m_cashier` (`cashier_id`, `cashier_date`, `cashier_name`, `cashier_address`, `cashier_category`, `cashier_email`, `cashier_phone_number`, `cashier_password`) VALUES
(4, '2021-07-10 11:33:45', 'Wildan', 'Banjar', 'Admin', 'wildan@gmail.com', '08574883999', 'root'),
(5, '2021-10-24 13:26:02', 'Irkham Nazmi Novian', 'bumiayu', 'Admin', 'irkham.nazmi@gmail.com', '085786625255', 'root'),
(6, '2021-07-11 14:49:52', 'Qirman', 'Dukuhwaluh', 'Cashier', 'qirman123@gmail.com', '08578899001', 'qirman1234');

-- --------------------------------------------------------

--
-- Table structure for table `m_menu`
--

CREATE TABLE `m_menu` (
  `menu_id` int(11) NOT NULL,
  `menu_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `menu_code` char(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `menu_category` enum('Makanan','Minuman') NOT NULL,
  `menu_description` text NOT NULL,
  `menu_price` int(11) NOT NULL,
  `menu_image` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_menu`
--

INSERT INTO `m_menu` (`menu_id`, `menu_date`, `menu_code`, `menu_name`, `menu_category`, `menu_description`, `menu_price`, `menu_image`) VALUES
(31, '2021-10-10 23:19:58', 'M1', 'Sop Ayam', 'Makanan', '<p>Wihh enake</p>\r\n', 12000, 'mieayam.jpg'),
(32, '2021-10-11 10:45:53', 'S1', 'Sop Ayam', 'Makanan', '<p>asdasdas</p>\r\n', 14000, 'sop ayam.png'),
(34, '2021-10-22 09:44:48', 'M2', 'Mie ayam', 'Makanan', '<p>Rasanya gurih</p>\r\n', 12000, 'mieayam.jpg'),
(35, '2021-11-01 22:22:36', 'T1', 'Teh Manis', 'Minuman', '<p>Minuman Teh nyegerin</p>\r\n', 5000, 'Tea.png'),
(36, '2021-11-01 22:25:15', 'J1', 'Jus Jeruk', 'Minuman', '<p>Jus Jeruk Baik Untuk Kesehatan kaya akan vitamin C</p>\r\n', 5000, 'juice.png');

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
  `transaction_total_pay` int(11) NOT NULL,
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

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_blog`
-- (See below for the actual view)
--
CREATE TABLE `v_blog` (
`blog_id` int(11)
,`blog_date` datetime
,`blog_title` char(255)
,`cashier_id` int(11)
,`blog_image` char(100)
,`blog_description` text
,`cashier_name` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure for view `v_blog`
--
DROP TABLE IF EXISTS `v_blog`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_blog`  AS  select `a`.`blog_id` AS `blog_id`,`a`.`blog_date` AS `blog_date`,`a`.`blog_title` AS `blog_title`,`a`.`cashier_id` AS `cashier_id`,`a`.`blog_image` AS `blog_image`,`a`.`blog_description` AS `blog_description`,`b`.`cashier_name` AS `cashier_name` from (`m_blog` `a` left join `m_cashier` `b` on((`b`.`cashier_id` = `a`.`cashier_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_blog`
--
ALTER TABLE `m_blog`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `cashier_id` (`cashier_id`);

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
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `t_transaction_detail`
--
ALTER TABLE `t_transaction_detail`
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_blog`
--
ALTER TABLE `m_blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `m_cashier`
--
ALTER TABLE `m_cashier`
  MODIFY `cashier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `m_menu`
--
ALTER TABLE `m_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_transaction`
--
ALTER TABLE `t_transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_blog`
--
ALTER TABLE `m_blog`
  ADD CONSTRAINT `m_blog_ibfk_1` FOREIGN KEY (`cashier_id`) REFERENCES `m_cashier` (`cashier_id`);

--
-- Constraints for table `t_transaction`
--
ALTER TABLE `t_transaction`
  ADD CONSTRAINT `t_transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `m_user` (`user_id`);

--
-- Constraints for table `t_transaction_detail`
--
ALTER TABLE `t_transaction_detail`
  ADD CONSTRAINT `t_transaction_detail_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `t_transaction` (`transaction_id`),
  ADD CONSTRAINT `t_transaction_detail_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `m_menu` (`menu_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
