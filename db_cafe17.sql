-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 07 Jan 2022 pada 10.53
-- Versi Server: 10.1.24-MariaDB
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
-- Struktur dari tabel `m_blog`
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
-- Dumping data untuk tabel `m_blog`
--

INSERT INTO `m_blog` (`blog_id`, `blog_date`, `blog_title`, `cashier_id`, `blog_image`, `blog_description`) VALUES
(2, '2021-10-22 23:37:19', 'Turnament Mobile Legend', 4, 'mlegend.png', '<p>Heyooo don&#39;t miss it, come to join our tourney of mobile legends.. Ayo uji squad kalian, jadikan team kalian yang terbaik dan dapatkan hadiah jutaan rupiah.</p>\r\n'),
(3, '2021-10-24 13:56:03', 'Berbagi Bersama Kami', 5, 'berbagi.png', '<p>Terimakasih kepada PT. Berkah Sentosa Perkasa dan mas WiraNagara sudah mempercayakan cafe17 untuk menyalurkan niat baik anda. Donasi berupa 50 nasi box dan tajil serta uang sudah diberikan ke Yayasan Yatim Piatu Karomatul Hikmah. Cafe 17 masih siap menyalurkan niat baik anda, mari silakan konsultasikan pada kami. Wa 085725003400 Semoga rejeki anda selalu berkah. Aamiin.</p>\r\n\r\n<p>#berbagibersamacafe17 #berbagibersama #goodpeople #nasiboxpurwokerto #nasiboxmurahpurwokerto #grabfood #kulinerpurwokertookerto #grabfood #kulinerpurwokerto</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_cashier`
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
-- Dumping data untuk tabel `m_cashier`
--

INSERT INTO `m_cashier` (`cashier_id`, `cashier_date`, `cashier_name`, `cashier_address`, `cashier_category`, `cashier_email`, `cashier_phone_number`, `cashier_password`) VALUES
(4, '2021-12-21 11:54:39', 'Wildan', 'Banjar', 'Cashier', 'wildan@gmail.com', '08574883999', 'root'),
(5, '2021-10-24 13:26:02', 'Irkham Nazmi Novian', 'bumiayu', 'Admin', 'irkham.nazmi@gmail.com', '085786625255', 'root'),
(6, '2021-07-11 14:49:52', 'Qirman', 'Dukuhwaluh', 'Cashier', 'qirman123@gmail.com', '08578899001', 'qirman1234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_menu`
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
-- Dumping data untuk tabel `m_menu`
--

INSERT INTO `m_menu` (`menu_id`, `menu_date`, `menu_code`, `menu_name`, `menu_category`, `menu_description`, `menu_price`, `menu_image`) VALUES
(34, '2021-10-22 09:44:48', 'M2', 'Mie ayam', 'Makanan', '<p>Rasanya gurih</p>\r\n', 12000, 'mieayam.jpg'),
(35, '2021-11-01 22:22:36', 'T1', 'Teh Manis', 'Minuman', '<p>Minuman Teh nyegerin</p>\r\n', 6000, 'Tea.png'),
(37, '2022-01-07 15:01:56', 'K1', 'Kwetiau Mangkok', 'Makanan', '<p>-</p>\r\n', 11000, '6728d0c6-8fac-49ec-aa7a-63965f34a9f5.jpeg'),
(38, '2022-01-07 15:05:20', 'A1', 'Ayam Bakar Pedas', 'Makanan', '<p>-</p>\r\n', 13000, 'WhatsApp Image 2022-01-07 at 14.59.59.jpeg'),
(39, '2022-01-07 15:06:44', 'A2', 'Paket Nasi Ayam Sambel Matah', 'Makanan', '<p>-</p>\r\n', 15000, 'WhatsApp Image 2022-01-07 at 15.02.06.jpeg'),
(40, '2022-01-07 15:08:03', 'P1', 'Paket Nasi + Ayam + Terong + Kol/Kubis Goreng (Geprek)', 'Makanan', '<p>-</p>\r\n', 13000, 'WhatsApp Image 2022-01-07 at 15.03.08.jpeg'),
(41, '2022-01-07 15:09:06', 'A3', 'Ayam Geprek Keju', 'Makanan', '<p>-</p>\r\n', 15000, 'WhatsApp Image 2022-01-07 at 15.04.20.jpeg'),
(42, '2022-01-07 15:10:48', 'A4', 'Ayam Crispy Saos Asam Pedas ', 'Makanan', '<p>-</p>\r\n', 14000, 'WhatsApp Image 2022-01-07 at 15.06.02.jpeg'),
(43, '2022-01-07 15:12:04', 'P2', 'Paket Nasi + Telor dadar + Terong Goreng + Kol/Kobis Goreng (Geprek)', 'Makanan', '<p>-</p>\r\n', 10000, 'WhatsApp Image 2022-01-07 at 15.08.27.jpeg'),
(44, '2022-01-07 15:20:20', 'E1', 'Es Jeruk', 'Minuman', '<p>-</p>\r\n', 4000, 'WhatsApp Image 2022-01-07 at 15.16.55.jpeg'),
(45, '2022-01-07 15:21:03', 'E2', 'Es Lemon Tea', 'Minuman', '<p>-</p>\r\n', 6000, 'WhatsApp Image 2022-01-07 at 15.17.56.jpeg'),
(46, '2022-01-07 15:22:40', 'J2', 'Jus Alpukat', 'Minuman', '<p>-</p>\r\n', 7000, 'WhatsApp Image 2022-01-07 at 15.21.36.jpeg'),
(47, '2022-01-07 16:51:59', 'S1', 'Sop Ayam Kemangi', 'Makanan', '<p>-</p>\r\n', 13000, 'WhatsApp Image 2022-01-07 at 16.18.08.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_user`
--

CREATE TABLE `m_user` (
  `user_id` int(11) NOT NULL,
  `user_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone_number` char(20) NOT NULL,
  `user_address` text NOT NULL,
  `user_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_user`
--

INSERT INTO `m_user` (`user_id`, `user_date`, `user_name`, `user_email`, `user_phone_number`, `user_address`, `user_password`) VALUES
(15, '2021-12-23 10:36:59', 'Nazmiu', 'nazmiirkham@hotmail.com', '085786625255', 'Dukuhwaluh', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_transaction`
--

CREATE TABLE `t_transaction` (
  `transaction_id` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `transaction_invoice_code` char(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_pay_total` int(11) NOT NULL,
  `transaction_status` enum('Keranjang','Menunggu Konfirmasi','Menunggu Pembayaran','Sedang Proses','Lunas') NOT NULL,
  `transaction_method` enum('Bayar di Tempat','Dompet Digital') NOT NULL,
  `transaction_category` enum('Online','Offline') NOT NULL,
  `transaction_customer_name` text NOT NULL,
  `transaction_customer_address` text NOT NULL,
  `transaction_customer_phone_number` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_transaction`
--

INSERT INTO `t_transaction` (`transaction_id`, `transaction_date`, `transaction_invoice_code`, `user_id`, `transaction_pay_total`, `transaction_status`, `transaction_method`, `transaction_category`, `transaction_customer_name`, `transaction_customer_address`, `transaction_customer_phone_number`) VALUES
(20, '2022-01-06 10:52:50', 'CAFE17PWT/20220103/INV001', 15, 12000, 'Menunggu Pembayaran', '', 'Online', 'Nazmiu', 'Dukuhwaluh', '085786625255'),
(21, '2022-01-06 17:56:15', 'CAFE17PWT/20220104/INV002', 15, 12000, 'Menunggu Pembayaran', '', 'Online', 'Nazmiu', 'Dukuhwaluh', '085786625255'),
(23, '2022-01-06 18:04:49', 'CAFE17PWT/20220106/INV003', 15, 12000, 'Menunggu Konfirmasi', '', 'Online', 'Nazmiu', 'Dukuhwaluh', '085786625255');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_transaction_detail`
--

CREATE TABLE `t_transaction_detail` (
  `transaction_detail_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `transaction_detail_qty` int(11) NOT NULL,
  `transaction_detail_price_total` int(11) NOT NULL,
  `transaction_detail_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `t_transaction_detail`
--
DELIMITER $$
CREATE TRIGGER `tr_transaction_detail_delete` AFTER DELETE ON `t_transaction_detail` FOR EACH ROW UPDATE t_transaction 
SET transaction_pay_total = (SELECT SUM(transaction_detail_price_total) FROM t_transaction_detail WHERE transaction_id = old.transaction_id)
WHERE transaction_id = old.transaction_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_transaction_detail_insert` AFTER INSERT ON `t_transaction_detail` FOR EACH ROW UPDATE t_transaction 
SET transaction_pay_total = (SELECT SUM(transaction_detail_price_total) FROM t_transaction_detail WHERE transaction_id = new.transaction_id)
WHERE transaction_id = new.transaction_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_transaction_detail_update` AFTER UPDATE ON `t_transaction_detail` FOR EACH ROW UPDATE t_transaction 
SET transaction_pay_total = (SELECT SUM(transaction_detail_price_total) FROM t_transaction_detail WHERE transaction_id = old.transaction_id)
WHERE transaction_id = old.transaction_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_blog`
-- (Lihat di bawah untuk tampilan aktual)
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
-- Stand-in structure for view `v_transaction`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_transaction` (
`transaction_id` int(11)
,`transaction_invoice_code` char(50)
,`transaction_date` datetime
,`user_id` int(11)
,`transaction_pay_total` int(11)
,`transaction_method` enum('Bayar di Tempat','Dompet Digital')
,`transaction_status` enum('Keranjang','Menunggu Konfirmasi','Menunggu Pembayaran','Sedang Proses','Lunas')
,`transaction_category` enum('Online','Offline')
,`transaction_customer_name` text
,`transaction_customer_phone_number` char(20)
,`transaction_customer_address` text
,`transaction_detail_id` int(11)
,`transaction_detail_note` text
,`transaction_detail_qty` int(11)
,`transaction_detail_price_total` int(11)
,`user_name` varchar(255)
,`user_address` text
,`user_phone_number` char(20)
,`user_email` varchar(255)
,`menu_id` int(11)
,`menu_code` char(11)
,`menu_name` varchar(100)
,`menu_image` char(100)
,`menu_price` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_transaction_payment`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_transaction_payment` (
`transaction_id` int(11)
,`transaction_invoice_code` char(50)
,`transaction_date` datetime
,`user_id` int(11)
,`transaction_pay_total` int(11)
,`transaction_method` enum('Bayar di Tempat','Dompet Digital')
,`transaction_status` enum('Keranjang','Menunggu Konfirmasi','Menunggu Pembayaran','Sedang Proses','Lunas')
,`transaction_category` enum('Online','Offline')
,`transaction_customer_name` text
,`transaction_customer_phone_number` char(20)
,`transaction_customer_address` text
,`transaction_detail_id` int(11)
,`transaction_detail_note` text
,`transaction_detail_qty` int(11)
,`transaction_detail_price_total` int(11)
,`user_name` varchar(255)
,`user_address` text
,`user_phone_number` char(20)
,`menu_id` int(11)
,`menu_name` varchar(100)
,`menu_image` char(100)
,`menu_price` int(11)
,`transaction_qty_total` bigint(21)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_blog`
--
DROP TABLE IF EXISTS `v_blog`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_blog`  AS  select `a`.`blog_id` AS `blog_id`,`a`.`blog_date` AS `blog_date`,`a`.`blog_title` AS `blog_title`,`a`.`cashier_id` AS `cashier_id`,`a`.`blog_image` AS `blog_image`,`a`.`blog_description` AS `blog_description`,`b`.`cashier_name` AS `cashier_name` from (`m_blog` `a` left join `m_cashier` `b` on((`b`.`cashier_id` = `a`.`cashier_id`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_transaction`
--
DROP TABLE IF EXISTS `v_transaction`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaction`  AS  select `a`.`transaction_id` AS `transaction_id`,`a`.`transaction_invoice_code` AS `transaction_invoice_code`,`a`.`transaction_date` AS `transaction_date`,`a`.`user_id` AS `user_id`,`a`.`transaction_pay_total` AS `transaction_pay_total`,`a`.`transaction_method` AS `transaction_method`,`a`.`transaction_status` AS `transaction_status`,`a`.`transaction_category` AS `transaction_category`,`a`.`transaction_customer_name` AS `transaction_customer_name`,`a`.`transaction_customer_phone_number` AS `transaction_customer_phone_number`,`a`.`transaction_customer_address` AS `transaction_customer_address`,`b`.`transaction_detail_id` AS `transaction_detail_id`,`b`.`transaction_detail_note` AS `transaction_detail_note`,`b`.`transaction_detail_qty` AS `transaction_detail_qty`,`b`.`transaction_detail_price_total` AS `transaction_detail_price_total`,`c`.`user_name` AS `user_name`,`c`.`user_address` AS `user_address`,`c`.`user_phone_number` AS `user_phone_number`,`c`.`user_email` AS `user_email`,`d`.`menu_id` AS `menu_id`,`d`.`menu_code` AS `menu_code`,`d`.`menu_name` AS `menu_name`,`d`.`menu_image` AS `menu_image`,`d`.`menu_price` AS `menu_price` from (((`t_transaction` `a` left join `t_transaction_detail` `b` on((`b`.`transaction_id` = `a`.`transaction_id`))) left join `m_user` `c` on((`c`.`user_id` = `a`.`user_id`))) left join `m_menu` `d` on((`d`.`menu_id` = `b`.`menu_id`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_transaction_payment`
--
DROP TABLE IF EXISTS `v_transaction_payment`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaction_payment`  AS  select `a`.`transaction_id` AS `transaction_id`,`a`.`transaction_invoice_code` AS `transaction_invoice_code`,`a`.`transaction_date` AS `transaction_date`,`a`.`user_id` AS `user_id`,`a`.`transaction_pay_total` AS `transaction_pay_total`,`a`.`transaction_method` AS `transaction_method`,`a`.`transaction_status` AS `transaction_status`,`a`.`transaction_category` AS `transaction_category`,`a`.`transaction_customer_name` AS `transaction_customer_name`,`a`.`transaction_customer_phone_number` AS `transaction_customer_phone_number`,`a`.`transaction_customer_address` AS `transaction_customer_address`,`b`.`transaction_detail_id` AS `transaction_detail_id`,`b`.`transaction_detail_note` AS `transaction_detail_note`,`b`.`transaction_detail_qty` AS `transaction_detail_qty`,`b`.`transaction_detail_price_total` AS `transaction_detail_price_total`,`c`.`user_name` AS `user_name`,`c`.`user_address` AS `user_address`,`c`.`user_phone_number` AS `user_phone_number`,`d`.`menu_id` AS `menu_id`,`d`.`menu_name` AS `menu_name`,`d`.`menu_image` AS `menu_image`,`d`.`menu_price` AS `menu_price`,count(`b`.`transaction_detail_id`) AS `transaction_qty_total` from (((`t_transaction` `a` left join `t_transaction_detail` `b` on((`b`.`transaction_id` = `a`.`transaction_id`))) left join `m_user` `c` on((`c`.`user_id` = `a`.`user_id`))) left join `m_menu` `d` on((`d`.`menu_id` = `b`.`menu_id`))) group by `a`.`transaction_id` ;

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
  ADD PRIMARY KEY (`transaction_detail_id`),
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
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `t_transaction`
--
ALTER TABLE `t_transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `t_transaction_detail`
--
ALTER TABLE `t_transaction_detail`
  MODIFY `transaction_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `m_blog`
--
ALTER TABLE `m_blog`
  ADD CONSTRAINT `m_blog_ibfk_1` FOREIGN KEY (`cashier_id`) REFERENCES `m_cashier` (`cashier_id`);

--
-- Ketidakleluasaan untuk tabel `t_transaction_detail`
--
ALTER TABLE `t_transaction_detail`
  ADD CONSTRAINT `t_transaction_detail_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `t_transaction` (`transaction_id`),
  ADD CONSTRAINT `t_transaction_detail_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `m_menu` (`menu_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
