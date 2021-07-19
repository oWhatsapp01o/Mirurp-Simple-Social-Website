-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 07:09 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miku`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `accountID` int(11) NOT NULL,
  `name` varchar(110) NOT NULL,
  `user` varchar(110) NOT NULL,
  `pass` varchar(110) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `birthday` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `mobilenumber` varchar(100) NOT NULL,
  `datecreated` varchar(100) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `bio` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountID`, `name`, `user`, `pass`, `image`, `birthday`, `gender`, `mobilenumber`, `datecreated`, `address`, `bio`) VALUES
(1, 'Vincent Perez', 'vince', 'vince', 'wp4827993_1616990739.png', '', 'Male', '', '', 'Pangasinan', '\"Knowing is not enough; we must apply. Willing is not enough; we must do.\" -Johann Wolfgang von Goethe'),
(2, 'Jessa Mea Delos Reyes', 'admin', 'admin', NULL, '2021-03-04', 'Female', '09155882430', '03/28/2021 09:36:30 pm', NULL, ''),
(3, 'Lorraine Ramos', 'lorraine', 'lorraine', NULL, '2021-03-13', 'Female', '09155882430', '03/28/2021 09:57:19 pm', NULL, ''),
(4, 'Jennifer Petaca', 'jennifer', 'jennifer', NULL, '2021-03-10', 'Female', '09155882430', '03/28/2021 09:59:11 pm', NULL, ''),
(5, 'Joan Fernandez', 'joan', 'joan', 'joan.png', '2021-03-16', 'Female', '09155882430', '03/28/2021 10:00:44 pm', NULL, ''),
(6, 'Ricalyn DV. Perriras', '@Ricz', 'r7422596', 'IMG20210321123936_1616996636.jpg', '2001-06-01', 'Female', '09455970777', '03/29/2021 07:15:45 am', '', ''),
(7, 'Miyu ', 'miraxx16', 'natsume143', 'dwadwfaewfsff.png', '2000-04-09', 'female', '09981571398', '03/29/2021 07:41:56 am', NULL, ''),
(8, 'Florevic Calima Tugadi', 'florevxctorea', '1234567890', 'null.gif', '2021-03-29', 'Female', '09634795213', '03/29/2021 11:28:58 am', NULL, ''),
(9, 'Alberto Cancino', 'cancino', 'cancino', 'null.gif', '2021-03-25', 'Male', '4243423', '03/29/2021 12:23:53 pm', NULL, ''),
(10, 'ivan Llasus', 'johnivan49', '123', 'null.gif', 'N/A', 'male', '09458826470', '03/29/2021 01:30:46 pm', NULL, ''),
(11, 'Hazel Joyce Baniqued', 'baniquedhazeljoyce37@gmail.com', 'Asdfgh123!', 'null.gif', '2021-04-03', 'Female', '09950045973', '04/03/2021 11:25:29 pm', NULL, ''),
(12, 'Kathryn Bernardo', 'kath', 'kathryn', 'null.gif', '1999-04-06', 'female', '09123456789', '04/03/2021 11:25:36 pm', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postID` int(10) NOT NULL,
  `accountID` int(10) DEFAULT NULL,
  `postDes` longtext NOT NULL,
  `postImg` varchar(100) DEFAULT NULL,
  `postDate` varchar(100) NOT NULL,
  `welcomeuser` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postID`, `accountID`, `postDes`, `postImg`, `postDate`, `welcomeuser`) VALUES
(1, 0, 'Hi', 'vince.jpg', '', ''),
(2, 0, 'Welcome', NULL, '', ''),
(3, 0, 'hi', NULL, '', ''),
(4, 5, 'Welcome New User!', 'Welcome.png', '03/28/2021 10:00:44 pm', 'Joan Fernandez'),
(6, 0, 'Feeling Satisfied!!', NULL, '03/28/2021 10:51:01 pm', ''),
(7, 0, 'Feeling Satisfied!!', '61f962ee16a7b537efa701d3863ee1fc.jpg', '03/28/2021 10:51:36 pm', ''),
(8, 1, 'Beach', '1_MQKUx-aH5cHwuuQf5QndAg_1616982048.jpeg', '03/29/2021 09:40:48 am', NULL),
(9, 1, 'Morning ', NULL, '03/29/2021 09:42:12 am', NULL),
(11, 1, 'Heres my heart can i have yours?', '1288720_1616983084.png', '03/29/2021 09:58:04 am', NULL),
(12, 7, 'eut', NULL, '03/29/2021 10:12:25 am', NULL),
(13, 7, '', 'meme_1616985486.jpg', '03/29/2021 10:38:06 am', NULL),
(14, 7, '', 'd5c897e851281a852c45c16bc605f4a2_1616985779.gif', '03/29/2021 10:42:59 am', NULL),
(15, 8, 'Welcome New User!', 'Welcome.png', '03/29/2021 11:28:58 am', 'Florevic Calima Tugadi'),
(16, 9, 'Welcome New User!', 'Welcome.png', '03/29/2021 12:23:53 pm', 'Alberto Cancino'),
(17, 10, 'Welcome New User!', 'Welcome.png', '03/29/2021 01:30:46 pm', 'ivan Llasus'),
(18, 6, 'Wassssuuuuppppp!!', 'IMG20210321124406_1616996174.jpg', '03/29/2021 01:36:14 pm', NULL),
(19, 10, 'miku shrine (>//////<)', 'miku_1616996742.jpg', '03/29/2021 01:45:42 pm', NULL),
(20, 1, 'Afternoon ', NULL, '03/29/2021 03:47:31 pm', NULL),
(21, 1, '', 'ddghron-62463cb9-d416-4cde-8c25-6ee721b86796_1617278166.jpg', '04/01/2021 07:56:06 pm', NULL),
(22, 11, 'Welcome New User!', 'Welcome.png', '04/03/2021 11:25:29 pm', 'Hazel Joyce Baniqued'),
(23, 12, 'Welcome New User!', 'Welcome.png', '04/03/2021 11:25:36 pm', 'Kathryn Bernardo');

-- --------------------------------------------------------

--
-- Table structure for table `react`
--

CREATE TABLE `react` (
  `reactID` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  `accPostID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `react`
--

INSERT INTO `react` (`reactID`, `postID`, `accountID`, `accPostID`) VALUES
(15, 19, 1, 10),
(16, 18, 1, 6),
(17, 1, 1, 1),
(18, 2, 1, 1),
(19, 3, 1, 1),
(20, 8, 1, 1),
(21, 9, 1, 1),
(22, 11, 1, 1),
(23, 14, 1, 7),
(24, 13, 1, 7),
(25, 18, 7, 6),
(26, 12, 1, 7),
(27, 20, 1, 1),
(28, 20, 6, 1),
(29, 17, 1, 10),
(30, 15, 1, 8),
(31, 22, 11, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accountID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `react`
--
ALTER TABLE `react`
  ADD PRIMARY KEY (`reactID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `accountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `react`
--
ALTER TABLE `react`
  MODIFY `reactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
