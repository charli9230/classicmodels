-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2017 at 09:14 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classicmodels`
--

-- --------------------------------------------------------

--
-- Table structure for table `productline`
--

DROP TABLE IF EXISTS `productline`;
CREATE TABLE IF NOT EXISTS `productline` (
  `productLine` varchar(50) NOT NULL,
  `textDescription` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`productLine`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productline`
--

INSERT INTO `productline` (`productLine`, `textDescription`) VALUES
('HY76', 'DVD PLAYER'),
('PORT', 'DSTV DECODER');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `productCode` varchar(15) NOT NULL,
  `productName` varchar(70) DEFAULT NULL,
  `productLine` varchar(50) DEFAULT NULL,
  `productScale` varchar(10) DEFAULT NULL,
  `productVendor` varchar(50) DEFAULT NULL,
  `productDescription` text,
  `quantityInStock` int(6) DEFAULT NULL,
  `buyPrice` decimal(10,2) DEFAULT NULL,
  `MSRP` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`productCode`),
  KEY `products_productline_fk_idx` (`productLine`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productCode`, `productName`, `productLine`, `productScale`, `productVendor`, `productDescription`, `quantityInStock`, `buyPrice`, `MSRP`) VALUES
('PC101', 'TABLE', 'HY76', '1:89', 'WOOD', 'HOME FURNITURE', 56, '2589.00', '2500.00'),
('PC121', 'LAPTOP', 'HY76', '1:50', 'JVC', 'PERSONAL COMPUTER', 12, '4999.99', '4800.00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_productline_fk` FOREIGN KEY (`productLine`) REFERENCES `productline` (`productLine`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
