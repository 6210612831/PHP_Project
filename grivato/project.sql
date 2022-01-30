-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2022 at 09:25 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cm_num` int(11) NOT NULL,
  `cm_inf` text NOT NULL,
  `cm_date` datetime NOT NULL,
  `inf_num` int(11) NOT NULL,
  `us_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cm_num`, `cm_inf`, `cm_date`, `inf_num`, `us_email`) VALUES
(3, 'halo\r\n', '2022-01-30 14:21:10', 27, 'day25436@hotmail.co.th'),
(7, 'friday comment', '2022-01-30 14:36:27', 28, 'friday25436@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `inf_num` int(11) NOT NULL,
  `pk_id` int(10) NOT NULL,
  `cu_email` varchar(50) NOT NULL,
  `cu_number` varchar(13) NOT NULL,
  `cu_phone` varchar(10) NOT NULL,
  `cu_pic` varchar(100) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`inf_num`, `pk_id`, `cu_email`, `cu_number`, `cu_phone`, `cu_pic`, `date_start`, `date_end`, `status`) VALUES
(28, 0, '555@555.chrome.galamang', '2147483647', '1234567890', '123456.jpg', '2017-09-30', '2017-09-30', 0),
(27, 0, '555@555.chrome.galamang', '2147483647', '1234567890', '1506583668_8349.jpg', '2017-09-30', '2017-09-30', 0),
(28, 0, 'day25436@hotmail.co.th', '1234567890123', '0830610124', '1643361206_3061.jpg', '2022-01-01', '2022-01-02', 0),
(30, 0, 'day25436@hotmail.co.th', '1234567890123', '0830610124', '1643361617_9786.jpg', '2022-01-28', '2022-01-29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `inf_num` int(11) NOT NULL,
  `inf_name` varchar(100) NOT NULL,
  `inf_money` int(8) NOT NULL,
  `inf_where` varchar(50) NOT NULL,
  `inf_pic` varchar(100) NOT NULL,
  `inf_many` int(11) NOT NULL,
  `inf_det` text NOT NULL,
  `inf_room` int(11) NOT NULL,
  `us_email` varchar(50) NOT NULL,
  `inf_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`inf_num`, `inf_name`, `inf_money`, `inf_where`, `inf_pic`, `inf_many`, `inf_det`, `inf_room`, `us_email`, `inf_date`) VALUES
(27, 'โรงแรมไดมอนด์พลาซ่า', 800, '83/27 อำเภอเมืองสุราษฎร์ธานี สุราษฎร์ธานี 84000', '1643363296_534.jpg', 0, 'ที่พักสะดวกสบาย อาหารเช้าเป็นอาหารพื้นเมืองอาหารอร่อยมาก เหมาะกับการจัดสัมมนา', 0, 'day25436@hotmail.co.th', '2017-08-14 17:13:22'),
(28, 'ซีบีดี โฮเท็ล สุราษฎร์ธานี', 450, '428/8 ถนน หน้าเมือง ตำบลตลาด อำเภอเมือง สุราษฏร์ธา', '1506583514_2353.jpg', 0, 'โรงแรมเปิดใหม่ใจกลางเมืองสุราษฎร์ธานี ห้องสวยสบายใกล้ตลาดศาลเจ้า คุ้มค่าจริงๆ', 0, 'monday25436@hotmail.com', '2017-09-02 12:39:17'),
(30, 'Tu dome', 400, '98/16 หมู่ 18 ถ.เชียงราก ต.คลองหนึ่ง อ.คลองหลวง, 1', '1643364108_3143.jpg', 0, 'มีแหล่งช็อปปิ้งสินค้า และร้านอาหาร\r\nเหมาะสำหรับทุกวัย', 0, 'day25436@hotmail.co.th', '2022-01-28 16:15:59'),
(31, 'หอพัก FENIX 2', 300, '100 ม.17 ต.คลองหนึ่ง อ.คลองหลวง คลองหลวง ปทุมธานี ', '1643385222_4639.jpg', 0, 'หอพัก Fenix จะติดอยู่กับถนนเชียงราก ฝุ่นจะค่อนข้างเยอะนิดนึง และ เนื่องจากหอพักที่นี่ราคาไม่แพง ทำให้ที่นี่มีคนหลายช่วงอายุมาอาศัยอยู่เป็นจำนวนมาก ไม่ว่าจะเป็นวัยทำงาน หรือว่า อยู่กันเป็นครอบครัว ทางเดินในตัวหอสว่างโอเค แต่ติดตรงบริเวณถังขยะที่ค่อนข้างสกปรกจ้า', 0, 'friday25436@hotmail.com', '2022-01-28 22:53:43');

-- --------------------------------------------------------

--
-- Table structure for table `messenger`
--

CREATE TABLE `messenger` (
  `name` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `packet`
--

CREATE TABLE `packet` (
  `pk_id` int(11) NOT NULL,
  `pk_det` text NOT NULL,
  `inf_num` int(11) NOT NULL,
  `inc_money` int(8) NOT NULL,
  `pk_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packet`
--

INSERT INTO `packet` (`pk_id`, `pk_det`, `inf_num`, `inc_money`, `pk_date`) VALUES
(1, 'พาเที่ยวรอบโลกกกวุ้ววววววววววววววววววววววววววววว', 28, 200, '2017-09-02 14:26:56'),
(2, 'พาเที่ยวรอบโลกกกวุ้วววววววววววววววววววววววววววว', 27, 102, '2022-01-28 10:21:20'),
(3, 'พาเที่ยวรอบโลกกกวุ้วววววววววววววววววววววววววววว', 30, 50, '2022-01-28 10:21:20'),
(5, 'พาเที่ยวรอบโลกกกวุ้วววววววว', 27, 50, '2022-01-28 22:09:05'),
(7, 'ตู้เย็น พัดลม แอร์ ที่จอดรถ เครื่องซักผ้า', 31, 200, '2022-01-28 22:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `us_num` int(11) NOT NULL,
  `us_name` varchar(100) NOT NULL,
  `us_email` varchar(50) NOT NULL,
  `us_pass` varchar(20) NOT NULL,
  `us_number` varchar(13) NOT NULL,
  `us_pic` varchar(100) NOT NULL,
  `us_status` int(1) NOT NULL,
  `us_date` datetime NOT NULL,
  `want` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`us_num`, `us_name`, `us_email`, `us_pass`, `us_number`, `us_pic`, `us_status`, `us_date`, `want`) VALUES
(1, 'ScorP1on Afterscore', 'day25436@hotmail.co.th', 'aaazaza', '1849901445419', '', 3, '2017-03-21 09:44:04', 0),
(6, 'friday hotmail', 'friday25436@hotmail.com', 'aaazaza', '1234567890124', '', 2, '2022-01-28 22:42:18', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cm_num`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cu_pic`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`inf_num`);

--
-- Indexes for table `packet`
--
ALTER TABLE `packet`
  ADD PRIMARY KEY (`pk_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`us_num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cm_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `inf_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `packet`
--
ALTER TABLE `packet`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `us_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
