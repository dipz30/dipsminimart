-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2016 at 04:25 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mini`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Contact` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Note` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`ID`, `Name`, `Contact`, `Address`, `Note`) VALUES
(4, 'Richard Diputado', '01920320123', 'Panacan', 'Coca Cola'),
(5, 'Jas', '091203012301', 'Tibungco', 'lik');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Category` varchar(100) NOT NULL,
  `Name` varchar(11) NOT NULL,
  `Quantity` int(100) NOT NULL,
  `Purchase` int(100) NOT NULL,
  `Retail` int(100) NOT NULL,
  `Supplier` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=152 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `Category`, `Name`, `Quantity`, `Purchase`, `Retail`, `Supplier`) VALUES
(150, 'Sandwich', 'Pandesal', 12, 2, 50, 'Uniliver'),
(151, 'Hot Drinks', 'Macquato', 33, 250, 300, 'Pepsi');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Customer` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Amount` int(100) NOT NULL,
  `Quantity` int(100) NOT NULL,
  `Total` int(100) NOT NULL,
  `Profit` int(100) NOT NULL,
  `Tendered` int(100) NOT NULL,
  `Changes` int(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`ID`, `Date`, `Customer`, `Category`, `Name`, `Amount`, `Quantity`, `Total`, `Profit`, `Tendered`, `Changes`) VALUES
(7, '2016-01-16', '', 'Sandwich', 'Pandesal', 50, 4, 200, 192, 300, 100),
(8, '2016-01-16', '', 'Hot Drinks', 'Macquato', 300, 2, 600, 100, 1000, 400),
(9, '2016-01-16', '', 'Sandwich', 'Pandesal', 50, 4, 200, 192, 500, 300),
(10, '2016-01-16', '', 'Hot Drinks', 'Macquato', 300, 5, 1500, 250, 2000, 500);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Suppliername` varchar(100) NOT NULL,
  `Contactperson` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Contactno` varchar(100) NOT NULL,
  `Note` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`ID`, `Suppliername`, `Contactperson`, `Address`, `Contactno`, `Note`) VALUES
(1, 'Pepsi', 'jade jastine diputado', 'Sta. Cruz', '2147483647', 'cute'),
(2, 'Uniliver', 'John', 'Sasa', '09105864377', 'Okie');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Access` varchar(100) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `Access`) VALUES
(1, 'admin', '1234', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
