-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 02:34 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coaching`
--
CREATE DATABASE IF NOT EXISTS `coaching` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `coaching`;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `sid` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `timing` varchar(20) NOT NULL,
  `eid` varchar(14) NOT NULL,
  `batch` varchar(14) NOT NULL,
  `status` varchar(5) NOT NULL,
  `center` varchar(10) NOT NULL,
  `course` varchar(10) NOT NULL,
  `subject` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `sid`, `date`, `timing`, `eid`, `batch`, `status`, `center`, `course`, `subject`) VALUES
(1, 'ST1000', '2020-12-06', '1:30am-2:30pm', 'E10002', '1001', 'p', 'chembur', 'IIT', 'Physics'),
(2, 'ST1000', '2020-10-25', '11:00am-12:00pm', 'E10002', '1001', 'p', 'chembur', 'IIT', 'Physics');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` int(11) NOT NULL,
  `batch` varchar(30) NOT NULL,
  `mentor` varchar(10) NOT NULL,
  `timings` varchar(50) NOT NULL,
  `year` varchar(20) NOT NULL DEFAULT '2018',
  `course` varchar(10) NOT NULL,
  `center` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `batch`, `mentor`, `timings`, `year`, `course`, `center`) VALUES
(1, '1001', 'E10002', '10:00am-2:00pm', '2020', 'IIT', 'chembur'),
(2, '1002', '', '10:00am-2:00pm', '2018', 'IIT', 'chembur'),
(4, '1004', 'E10002', '10:00am-12:00pm', '2018', 'IIT', 'mulund');

-- --------------------------------------------------------

--
-- Table structure for table `centers`
--

CREATE TABLE `centers` (
  `id` int(11) NOT NULL,
  `center` varchar(20) NOT NULL,
  `location` varchar(30) NOT NULL,
  `dateofbuild` date NOT NULL,
  `admin` varchar(20) NOT NULL,
  `coures` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `centers`
--

INSERT INTO `centers` (`id`, `center`, `location`, `dateofbuild`, `admin`, `coures`) VALUES
(1, 'chembur', 'mumbai', '2018-05-07', 'E10001', 'IIT'),
(2, 'mulund', 'chembur', '2018-07-17', 'E10005', 'PMT');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `examname` varchar(20) NOT NULL,
  `batch` varchar(10) NOT NULL,
  `dateofexam` date NOT NULL,
  `center` varchar(10) NOT NULL,
  `course` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `examname`, `batch`, `dateofexam`, `center`, `course`) VALUES
(1, '1st', '1001', '2020-10-10', 'chembur', 'IIT'),
(2, '2nd', '1001', '2020-06-11', 'chembur', 'IIT');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `course` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `examname` varchar(30) NOT NULL,
  `marksobtain` varchar(20) NOT NULL,
  `totalmarks` varchar(20) NOT NULL,
  `eid` varchar(20) NOT NULL,
  `center` varchar(20) NOT NULL,
  `batch` varchar(20) NOT NULL,
  `dateofexam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `sid`, `course`, `subject`, `examname`, `marksobtain`, `totalmarks`, `eid`, `center`, `batch`, `dateofexam`) VALUES
(1, 'ST1000', 'IIT', 'Physics', '1st', '9.5', '10', 'E10003', 'jaipur1', '1001', '2018-06-10'),
(3, 'ST1000', 'IIT', 'chemistry', '1st', '6', '10', 'E10001', 'jaipur1', '1001', '2018-06-10'),
(4, 'ST1000', 'IIT', 'Maths', '1st', '4', '10', 'E10002', 'jaipur1', '1001', '2018-06-10'),
(7, 'ST1001', 'IIT', 'physics', '1st', '0', '10', 'E10003', 'jaipur1', '1001', '2018-06-10'),
(8, 'ST1000', 'IIT', 'physics', '2nd', '9.6', '10', 'E10003', 'jaipur1', '1001', '2018-06-11'),
(9, 'ST1001', 'IIT', 'physics', '2nd', '9.0', '10', 'E10003', 'jaipur1', '1001', '2018-06-11'),
(12, 'ST1001', 'IIT', 'maths', '1st', '10', '10', 'E10002', 'jaipur1', '1001', '2018-06-10'),
(13, 'ST1000', 'IIT', 'maths', '2nd', '10', '10', 'E10002', 'jaipur1', '1001', '2018-06-11'),
(14, 'ST1001', 'IIT', 'maths', '2nd', '10', '10', 'E10002', 'jaipur1', '1001', '2018-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mobileNo` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password1` varchar(255) NOT NULL,
  `password2` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `firstname`, `lastname`, `mobileNo`, `email`, `password1`, `password2`, `address`, `course`, `username`) VALUES
(35, 'dnkddwdj', 'dkwjdwjd', 64872372, 'Hdwh@gmail.com', 'ndwndkw', 'dnkwdn', 'dwjdkd', 'JEE', 'ST1002'),
(49, '', '', 0, '', '', '', '', '', ''),
(50, 'Priyanka', 'Asrani', 2147483647, 'pa@gmail.com', 'priyanka', 'priyanka', 'ASREFEJSKKSK', 'JEE', 'ST1004'),
(51, 'Priyanka', 'Asrani', 2147483647, 'pa@gmail.com', 'priyanka', 'priyanka', 'ASREFEJSKKSK', 'JEE', 'ST1004'),
(52, 'Priyanka', 'Asrani', 2147483647, 'pa@gmail.com', 'priyanka', 'priyanka', 'ASREFEJSKKSK', 'JEE', 'ST1004'),
(53, 'Priyanka', 'Asrani', 2147483647, 'pa@gmail.com', 'priyanka', 'priyanka', 'ASREFEJSKKSK', 'JEE', 'ST1004'),
(54, 'Priyanka', 'Asrani', 2147483647, 'pa@gmail.com', 'priyanka', 'priyanka', 'ASREFEJSKKSK', 'JEE', 'ST1004'),
(55, 'Priyanka', 'Asrani', 2147483647, 'pa@gmail.com', 'priyanka', 'priyanka', 'ASREFEJSKKSK', 'JEE', 'ST1004'),
(56, 'Priyanka', 'Asrani', 2147483647, 'pa@gmail.com', 'priyanka', 'priyanka', 'ASREFEJSKKSK', 'JEE', 'ST1004'),
(57, 'Priyanka', 'Asrani', 2147483647, 'pa@gmail.com', 'priyanka', 'priyanka', 'ASREFEJSKKSK', 'JEE', 'ST1004'),
(58, 'Priyanka', 'Asrani', 2147483647, 'pa@gmail.com', 'priyanka', 'priyanka', 'ASREFEJSKKSK', 'JEE', 'ST1004'),
(59, '', '', 0, '', '', '', '', '', ''),
(60, '', '', 0, '', '', '', '', '', ''),
(61, '', '', 0, '', '', '', '', '', ''),
(62, 'jejd', 'dkwekd', 12345678, 'hdis@gmail.com', 'hfuehif', 'fnenfekf', 'hdwi', 'JEE', 'ST1005'),
(63, 'jejd', 'dkwekd', 12345678, 'hdis@gmail.com', 'hfuehif', 'fnenfekf', 'hdwi', 'JEE', 'ST1005'),
(64, '', '', 0, '', '', '', '', '', ''),
(65, '', '', 0, '', '', '', '', '', ''),
(66, '', '', 0, '', '', '', '', '', ''),
(67, '', '', 0, '', '', '', '', '', ''),
(68, '', '', 0, '', '', '', '', '', ''),
(69, '', '', 0, '', '', '', '', '', ''),
(70, '', '', 0, '', '', '', '', '', ''),
(71, '', '', 0, '', '', '', '', '', ''),
(72, '', '', 0, '', '', '', '', '', ''),
(73, '', '', 0, '', '', '', '', '', ''),
(74, '', '', 0, '', '', '', '', '', ''),
(75, '', '', 0, '', '', '', '', '', ''),
(76, '', '', 0, '', '', '', '', '', ''),
(77, '', '', 0, '', '', '', '', '', ''),
(78, '', '', 0, '', '', '', '', '', ''),
(79, '', '', 0, '', '', '', '', '', ''),
(80, '', '', 0, '', '', '', '', '', ''),
(81, '', '', 0, '', '', '', '', '', ''),
(82, '', '', 0, '', '', '', '', '', ''),
(83, '', '', 0, '', '', '', '', '', ''),
(84, '', '', 0, '', '', '', '', '', ''),
(85, '', '', 0, '', '', '', '', '', ''),
(86, '', '', 0, '', '', '', '', '', ''),
(87, '', '', 0, '', '', '', '', '', ''),
(88, '', '', 0, '', '', '', '', '', ''),
(89, '', '', 0, '', '', '', '', '', ''),
(90, '', '', 0, '', '', '', '', '', ''),
(91, '', '', 0, '', '', '', '', '', ''),
(92, '', '', 0, '', '', '', '', '', ''),
(93, '', '', 0, '', '', '', '', '', ''),
(94, '', '', 0, '', '', '', '', '', ''),
(95, '', '', 0, '', '', '', '', '', ''),
(96, '', '', 0, '', '', '', '', '', ''),
(97, '', '', 0, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(500) NOT NULL,
  `district` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `postalcode` varchar(10) NOT NULL,
  `fee` varchar(10) NOT NULL,
  `scholarship` varchar(10) NOT NULL,
  `paidfee` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `course` varchar(10) NOT NULL,
  `batch` varchar(20) NOT NULL,
  `class` varchar(10) NOT NULL,
  `fathername` varchar(50) NOT NULL,
  `fathermob` varchar(15) NOT NULL,
  `fatheroccu` varchar(20) NOT NULL,
  `mothername` varchar(50) NOT NULL,
  `mothermob` varchar(15) NOT NULL,
  `motheroccu` varchar(20) NOT NULL,
  `10mark` varchar(10) NOT NULL,
  `12mark` varchar(10) NOT NULL,
  `preexam` varchar(10) NOT NULL,
  `preexamyear` varchar(10) NOT NULL,
  `preexammarks` varchar(10) NOT NULL,
  `center` varchar(10) NOT NULL,
  `mentor` varchar(10) NOT NULL,
  `timing` varchar(20) NOT NULL,
  `dateofreg` date NOT NULL,
  `pid` varchar(10) NOT NULL,
  `dateofleft` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `sid`, `fname`, `lname`, `email`, `phone`, `address`, `district`, `state`, `postalcode`, `fee`, `scholarship`, `paidfee`, `status`, `course`, `batch`, `class`, `fathername`, `fathermob`, `fatheroccu`, `mothername`, `mothermob`, `motheroccu`, `10mark`, `12mark`, `preexam`, `preexamyear`, `preexammarks`, `center`, `mentor`, `timing`, `dateofreg`, `pid`, `dateofleft`) VALUES
(1, 'ST1000', 'swara', 'dali', 'swaradali@gmail.com', '9999999999', 'plot no. 300 4s colony', 'mumbai', 'maharashtra', '302013', '100002', '10', '10000', 'yes', 'IIT', '1001', '12+', 'xxxxx xxxxx', '0000000000', 'businessmen', 'xxxxx xxxxx', '000000000', 'houserwife', 'xx', 'xx', 'IIT', '20xx', '120', 'chembur', 'E10002', '10:00am-2:00pm', '2020-06-05', 'P1000', '0000-00-00'),
(2, 'ST1001', 'priyanka', 'asrani', 'priyankaasrani@gmail.com', '9999999999', 'plot no. 300 4s colony', 'mulund', 'maharashtra', '302013', '100002', '10', '10000', 'yes', 'IIT', '1001', '12+', 'xxxxx xxxxx', '0000000000', 'businessmen', 'xxxxx xxxxx', '000000000', 'houserwife', 'xx', 'xx', 'IIT', '20xx', '120', 'mulund', 'E10002', '10:00am-2:00pm', '2018-06-05', 'P1001', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `eid` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `postalcode` varchar(20) NOT NULL,
  `salary` varchar(20) NOT NULL,
  `position` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `course` varchar(20) NOT NULL,
  `center` varchar(20) NOT NULL,
  `dateofjoining` date NOT NULL,
  `experience` varchar(20) NOT NULL,
  `highestqualification` varchar(20) NOT NULL,
  `highestqualificationmarks` varchar(20) NOT NULL,
  `batchmentor` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `eid`, `fname`, `lname`, `email`, `mobile`, `address`, `city`, `state`, `postalcode`, `salary`, `position`, `subject`, `course`, `center`, `dateofjoining`, `experience`, `highestqualification`, `highestqualificationmarks`, `batchmentor`, `status`) VALUES
(1, 'E10002', 'Vedika', 'Shah', 'vedika@gmail.com', '8888888888', '507/B/wing , chembur', 'mumbai', 'maharashtra', '302013', '10000', 'mentor', 'maths', 'IIT', 'chembur', '2018-06-07', '2Y', 'B-Tech', '100', '1001', 'yes'),
(2, 'E10001', 'Anita', 'Bokey', 'anitabokey@gmail.com', '8888888888', '300 4s mulund', 'mumbai', 'maharashtra', '302013', '10000', 'admin', 'physics', 'IIT', 'chembur', '2018-06-07', '2Y', 'B-Tech', '100', '', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `center` varchar(20) NOT NULL,
  `batch` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `timing` varchar(20) NOT NULL,
  `eid` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `course` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `center`, `batch`, `subject`, `timing`, `eid`, `day`, `year`, `course`) VALUES
(1, 'chembur', '1001', 'maths', '10:00am-11:00am', 'E10002', 'Thursday', '2020', 'JEE'),
(2, 'mulund', '1001', 'physics', '10:00am-11:00am', 'E10002', 'Thursday', '2020', 'IIT'),
(3, 'ghatkopar', '1001', 'maths', '10:00am-11:00am', 'E10002', 'Friday', '2020', 'IIT'),
(4, 'chembur', '1001', 'maths', '10:00am-11:00am', 'E10002', 'Monday', '2020', 'IIT'),
(5, 'chembur', '1001', 'physics', '10:00am-11:00am', 'E10002', 'Tuesday', '2020', 'IIT'),
(6, 'chembur', '1001', 'chemistry', '10:00am-11:00am', 'E10002', 'Wednesday', '2020', 'IIT');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`) VALUES
(1, 'E10001', 'priyanka', 'admin'),
(2, 'E10002', 'simran', 'teacher'),
(3, 'ST1000', 'swara', 'student'),
(8, 'ST1002', 'dhwdw', 'student'),
(32, '', '', 'student'),
(33, 'ST1004', 'priyanka', 'student'),
(34, 'ST1004', 'priyanka', 'student'),
(35, 'ST1004', 'priyanka', 'student'),
(36, 'ST1004', 'priyanka', 'student'),
(37, 'ST1004', 'priyanka', 'student'),
(38, 'ST1004', 'priyanka', 'student'),
(39, 'ST1004', 'priyanka', 'student'),
(40, 'ST1004', 'priyanka', 'student'),
(41, 'ST1004', 'priyanka', 'student'),
(42, '', '', 'student'),
(43, '', '', 'student'),
(44, '', '', 'student'),
(45, 'ST1005', 'hfuehif', 'student'),
(46, 'ST1005', 'hfuehif', 'student'),
(47, '', '', 'student'),
(48, '', '', 'student'),
(49, '', '', 'student'),
(50, '', '', 'student'),
(51, '', '', 'student'),
(52, '', '', 'student'),
(53, '', '', 'student'),
(54, '', '', 'student'),
(55, '', '', 'student'),
(56, '', '', 'student'),
(57, '', '', 'student'),
(58, '', '', 'student'),
(59, '', '', 'student'),
(60, '', '', 'student'),
(61, '', '', 'student'),
(62, '', '', 'student'),
(63, '', '', 'student'),
(64, '', '', 'student'),
(65, '', '', 'student'),
(66, '', '', 'student'),
(67, '', '', 'student'),
(68, '', '', 'student'),
(69, '', '', 'student'),
(70, '', '', 'student'),
(71, '', '', 'student'),
(72, '', '', 'student'),
(73, '', '', 'student'),
(74, '', '', 'student'),
(75, '', '', 'student'),
(76, '', '', 'student'),
(77, '', '', 'student'),
(78, '', '', 'student'),
(79, '', '', 'student'),
(80, '', '', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `batch` (`batch`);

--
-- Indexes for table `centers`
--
ALTER TABLE `centers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sid` (`sid`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `eid` (`eid`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `centers`
--
ALTER TABLE `centers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"coaching\",\"table\":\"attendance\"},{\"db\":\"coaching\",\"table\":\"users\"},{\"db\":\"coaching\",\"table\":\"teachers\"},{\"db\":\"coaching\",\"table\":\"centers\"},{\"db\":\"coaching\",\"table\":\"timetable\"},{\"db\":\"coaching\",\"table\":\"batches\"},{\"db\":\"coaching\",\"table\":\"students\"},{\"db\":\"coaching\",\"table\":\"register\"},{\"db\":\"trial\",\"table\":\"register\"},{\"db\":\"trial\",\"table\":\"users\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2020-12-07 12:11:31', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Database: `trial`
--
CREATE DATABASE IF NOT EXISTS `trial` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `trial`;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `password`) VALUES
(1, 'Priyanka', 'priyanka@gmail.com', '5a440b76c06eb46c02725764ee54e00e'),
(2, 'Swarangi', 'swara@gmail.com', '5a440b76c06eb46c02725764ee54e00e'),
(3, 'Simran', 'simran@gmail.com', '5a440b76c06eb46c02725764ee54e00e');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`) VALUES
(1, 'Priyanka', 'Priyanka', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
