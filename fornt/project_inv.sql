-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2019 at 08:53 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_inv`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `bid` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`bid`, `brand_name`, `status`) VALUES
(3, 'Huawei', '1'),
(4, 'Samsungs ', '1'),
(10, 'Microsoft', '1'),
(11, 'Dell', '1'),
(12, 'HP', '1'),
(13, 'Asus', '1'),
(14, 'Nokia', '1'),
(15, 'Sony', '1'),
(16, 'LG', '1');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `parent_cat` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `parent_cat`, `category_name`, `status`) VALUES
(1, 0, 'Electronic', '1'),
(4, 0, 'Books', '1'),
(5, 1, 'Mobiles', '1'),
(6, 0, 'Software', '1'),
(9, 1, 'Laptop', '1'),
(11, 1, 'Computer', '1'),
(12, 6, 'Editing Software', '1'),
(13, 4, 'Harry Potter ', '1');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_no` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `order_date` date NOT NULL,
  `sub_total` double NOT NULL,
  `vat` double NOT NULL,
  `discount` double NOT NULL,
  `net_total` double NOT NULL,
  `paid` double NOT NULL,
  `due` double NOT NULL,
  `payment_type` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_no`, `customer_name`, `order_date`, `sub_total`, `vat`, `discount`, `net_total`, `paid`, `due`, `payment_type`) VALUES
(1, 'sojan Mahmud', '2019-02-11', 75000, 11250, 1000, 86250, 86250, 0, 'cash'),
(2, 'Md Sajib', '2019-02-11', 380000, 57000, 7000, 430000, 430000, 0, 'cash'),
(3, 'Md Shawon', '2019-02-11', 3500, 525, 25, 4000, 0, 4000, 'cash'),
(4, 'Md Shawon', '2019-02-11', 165000, 24750, 250, 189500, 0, 189500, 'cash'),
(5, 'sojan Mahmud', '2019-02-11', 1500, 225, 0, 1725, 0, 1725, 'cash'),
(6, 'sojan Mahmud', '2019-02-11', 15000, 2250, 500, 16750, 0, 16750, 'cash'),
(7, 'Md Sajib', '2019-02-11', 1500, 225, 25, 1700, 1700, 0, 'cash'),
(8, 'nishad', '2019-02-11', 15000, 2250, 0, 17250, 17250, 0, 'cash'),
(9, 'sojan Mahmud', '2019-02-11', 1500, 225, 225, 1500, 1500, 0, 'cash'),
(10, 'Md Sajib', '2019-02-11', 15000, 2250, 0, 17250, 17250, 0, 'cash'),
(11, 'Md Sajib', '2019-02-11', 15000, 2250, 0, 17250, 17250, 0, 'cash'),
(12, 'nishad', '2019-02-11', 15000, 2250, 0, 17250, 17250, 0, 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `qty` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice_no`, `product_name`, `price`, `qty`) VALUES
(11, 1, 'Samsung galaxy1', 15000, 5),
(13, 2, 'Samsung galaxy sss', 100000, 2),
(14, 2, 'Office2018', 1500, 4),
(15, 2, 'Pavillion', 58000, 3),
(16, 3, 'Adobe Phptoshope', 1000, 2),
(17, 3, 'Office2018', 1500, 1),
(18, 4, 'Nokia1110', 1500, 10),
(19, 4, 'Ac', 150000, 1),
(20, 5, 'Office2018', 1500, 1),
(21, 6, 'Samsung galaxy1', 15000, 1),
(22, 7, 'Office2018', 1500, 1),
(23, 8, 'Samsung galaxy1', 15000, 1),
(24, 9, 'Office2018', 1500, 1),
(25, 10, 'Samsung galaxy1', 15000, 1),
(26, 11, 'Samsung galaxy1', 15000, 1),
(27, 12, 'Samsung galaxy1', 15000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `products_name` varchar(100) NOT NULL,
  `products_price` double NOT NULL,
  `products_stock` int(11) NOT NULL,
  `added_date` date NOT NULL,
  `p_status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `cid`, `bid`, `products_name`, `products_price`, `products_stock`, `added_date`, `p_status`) VALUES
(3, 5, 3, 'Samsung galaxy sss', 100000, 98, '2019-09-02', '1'),
(4, 5, 4, 'Samsung galaxy1', 15000, 490, '2019-09-02', '1'),
(5, 6, 10, 'Office2018', 1500, 42, '2019-10-02', '1'),
(6, 9, 11, 'Pavillion', 58000, 47, '2019-10-02', '1'),
(7, 12, 10, 'Adobe Phptoshope', 1000, 8, '2019-10-02', '1'),
(8, 5, 14, 'Nokia1110', 1500, 4990, '2019-10-02', '1'),
(9, 1, 16, 'Ac', 150000, 49, '2019-10-02', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(3000) NOT NULL,
  `usertype` enum('Admin','Other') NOT NULL,
  `register_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `usertype`, `register_date`, `last_login`, `notes`) VALUES
(1, 'Sojan', 'soja@gmail.com', '$2y$08$SEfcsHEmZwmGe8aWypaDU.87JiwkK47HbmKgRxBPL8ghSyM0n8yDe', 'Admin', '2019-02-06', '2019-02-06 00:00:00', ''),
(2, 'Nishad', 'nishad@gmail.com', '$2y$08$jQbHxquQUfT.HL2/HFI/8Ojt1BukktLItY9g3fABlTq4.6tchav6i', 'Admin', '2019-02-06', '2019-02-07 06:02:18', ''),
(3, 'sihab uddin', 'nesad.faruki@gmail.com', '$2y$08$kh6oHC7DFEbiBAVvvkaa0OzaU.AMt.SaE57vCIFDratCkLcuNhiHW', 'Admin', '2019-02-06', '2019-02-18 08:02:00', ''),
(4, 'shaharia', 'sihab.uddin@gamil.com', '$2y$08$M0.tzqmNaVTyyFXVMxznVe2p9atE91H8YOtzFxu1ljU5niFgPQTzy', 'Admin', '2019-02-06', '2019-02-06 00:00:00', ''),
(5, 'Jalal Ahmed', 'jalal34@gmail.com', '$2y$08$njnWEsuy3czUpgzHASZmVeyVNaD/xBVC7cBWvNpXM/rDXJ5qeqqza', 'Admin', '2019-02-06', '2019-02-06 00:00:00', ''),
(6, 'Md Shajib', 'sajib@gamil.com', '$2y$08$H8EhTc5y.8z3gs6tZIYZ0OxlG.7oPVppA6NswqEZqQ9Uh0FZ2Ep1m', 'Admin', '2019-02-07', '2019-02-07 07:02:49', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`bid`),
  ADD UNIQUE KEY `brand_name` (`brand_name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_no` (`invoice_no`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `products_name` (`products_name`),
  ADD KEY `bid` (`bid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`invoice_no`) REFERENCES `invoice` (`invoice_no`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `categories` (`cid`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `brands` (`bid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
