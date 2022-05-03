-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2022 at 12:49 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internship`
--

-- --------------------------------------------------------

--
-- Table structure for table `printshastra`
--
-- Creation: May 02, 2022 at 11:24 AM
-- Last update: May 03, 2022 at 10:46 AM
--

CREATE TABLE IF NOT EXISTS `printshastra` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `tele` varchar(12) DEFAULT NULL,
  `address` varchar(120) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `check in date` date DEFAULT current_timestamp(),
  `check out date` date DEFAULT current_timestamp(),
  `payment_status` tinyint(1) DEFAULT NULL,
  `payment_mode` varchar(10) DEFAULT NULL,
  `totalcost` float NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `printshastra`:
--

--
-- Dumping data for table `printshastra`
--

INSERT INTO `printshastra` (`ID`, `name`, `tele`, `address`, `country`, `check in date`, `check out date`, `payment_status`, `payment_mode`, `totalcost`) VALUES
(1, 'Dharma', '9090511393', 'ff dfgfd ,\r\nfdfgd,\r\nfghdg', 'india', '2022-04-28', '2022-04-30', 1, 'card', 3000),
(2, 'Goutam ', '898905667', 'At/po-Nuapada,\r\nVia:chikit,\r\nGanjam', 'India', '2022-05-01', '2022-05-03', 1, 'Paypal', 3000),
(3, 'Jitu Pra', '7735012985', 'Delhi', 'India', '2022-01-01', '2022-12-31', 0, 'Cheque', 653000),
(4, 'Kiran', '789568423', 'Berhampur,Odisha', 'India', '2022-03-30', '2022-04-04', 0, 'Paypal', 6500),
(5, 'Asish', '7735012985', 'Goa', 'India', '2022-04-09', '2022-05-21', 1, 'card', 63000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
