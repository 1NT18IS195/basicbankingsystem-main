-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2020 at 03:47 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tsf`
--

-- --------------------------------------------------------

--
-- Table structure for table `transection`
--

CREATE TABLE IF NOT EXISTS `transection` (
  `sid` int(4) NOT NULL,
  `sac` varchar(10) NOT NULL,
  `sna` varchar(20) NOT NULL,
  `rid` int(4) NOT NULL,
  `rac` varchar(10) NOT NULL,
  `rna` varchar(20) NOT NULL,
  `amt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transection`
--

INSERT INTO `transection` (`sid`, `sac`, `sna`, `rid`, `rac`, `rna`, `amt`) VALUES
(1001, '20563987', 'Ms.Helly Shah', 671, '23651489', 'Mr.Nayan Parekh', 500),
(601, '02035698', 'Mr.Ronak Patel', 1001, '20563987', 'Ms.Helly Shah', 500),
(2114, '02080125', 'Ms.Sanya Pathan', 555, '02081452', 'Mr.Ramesh Yadav', 10000),
(2114, '02080125', 'Ms.Sanya Pathan', 555, '02081452', 'Mr.Ramesh Yadav', 500),
(845, '02075698', 'Mrs.Riya Godbole', 555, '02081452', 'Mr.Ramesh Yadav', 750),
(8741, '02314587', 'Ms.Priyanka Gupta', 1001, '20563987', 'Ms.Helly Shah', 800),
(845, '02075698', 'Mrs.Riya Godbole', 8741, '02314587', 'Ms.Priyanka Gupta', 1000),
(450, '02080965', 'Mr.Yash Chauhan', 8700, '02356874', 'Mrs.Leela Kumari', 500);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(4) NOT NULL,
  `ac` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `no` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `amt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `ac`, `name`, `no`, `email`, `amt`) VALUES
(1001, '20563987', 'Ms.Helly Shah', '+91-8569214587', 'helly2098@gmail.com', 28625),
(671, '23651489', 'Mr.Nayan Parekh', '+91-9875423610', 'parekhnayan@yahoo.in', 8375),
(8700, '02356874', 'Mrs.Leela Kumari', '+91-6352417899', 'leelakumari99@gmail.com', 50500),
(8741, '02314587', 'Ms.Priyanka Gupta', '+91-6325418967', 'guptapriyanka10@yahoo.in', 15000),
(601, '02035698', 'Mr.Ronak Patel', '+91-8745962002', 'rspatel20@gmail.com', 54000),
(222, '02080568', 'Mrs.Rashmi Singh', '+91-8563210907', 'rashmikasigh@gmail.com', 20000),
(450, '02080965', 'Mr.Yash Chauhan', '+91-7048596245', 'yashchauhan@gmail.com', 10000),
(2114, '02080125', 'Ms.Sanya Pathan', '+91-9998745123', 'pathansanu@yahoo.in', 49000),
(555, '02081452', 'Mr.Ramesh Yadav', '+91-8575612453', 'rameshyadav@gmail.com', 19750),
(845, '02075698', 'Mrs.Riya Godbole', '+91-8745692000', 'riyugodbole123@gmail.com', 34000);
