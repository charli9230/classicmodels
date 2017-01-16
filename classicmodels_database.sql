CREATE DATABASE IF NOT EXISTS classicmodels;

USE classicmodels;
DROP TABLE IF EXISTS `productline`;
CREATE TABLE IF NOT EXISTS `productline` (
  `productLine` varchar(50) NOT NULL,
  `textDescription` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`productLine`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

USE classicmodels;
INSERT INTO `productline` (`productLine`, `textDescription`) VALUES
('HY76', 'DVD PLAYER'),
('PORT', 'DSTV DECODER');

USE classicmodels;
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

USE classicmodels;
INSERT INTO `products` (`productCode`, `productName`, `productLine`, `productScale`, `productVendor`, `productDescription`, `quantityInStock`, `buyPrice`, `MSRP`) VALUES
('PC101', 'TABLE', 'HY76', '1:89', 'WOOD', 'HOME FURNITURE', 56, '2589.00', '2500.00'),
('PC121', 'LAPTOP', 'HY76', '1:50', 'JVC', 'PERSONAL COMPUTER', 12, '4999.99', '4800.00');

USE classicmodels;
ALTER TABLE `products`
  ADD CONSTRAINT `products_productline_fk` FOREIGN KEY (`productLine`) REFERENCES `productline` (`productLine`) ON DELETE NO ACTION ON UPDATE NO ACTION;

USE classicmodels;
CREATE USER 'user'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON * . * TO 'user'@'localhost';

