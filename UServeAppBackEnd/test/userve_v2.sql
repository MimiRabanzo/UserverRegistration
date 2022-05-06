-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2022 at 07:21 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userve`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `User_ID` int(11) UNSIGNED ZEROFILL NOT NULL COMMENT 'Zero fill EX 000000001',
  `UserType` varchar(255) NOT NULL,
  `UserStatus` varchar(10) NOT NULL DEFAULT 'Active',
  `UserName` varchar(10) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `DateCreated` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`User_ID`, `UserType`, `UserStatus`, `UserName`, `Password`, `DateCreated`) VALUES
(00000000005, 'SK', 'Active', '9950012196', '$2y$11$kwAeb3AxJsquJrhnQ1ClAO9k89mmHzKUIYpfxf3ilo5EckEbIZe16', '2022-04-14'),
(00000000008, 'SV', 'Active', '9950012197', '$2y$11$M8HARZQrMwz5pS.6C03o6O8E740vZ09LioVBLdrYG9aCMAJ42nEr2', '2022-04-15');

--
-- Triggers `account`
--
DELIMITER $$
CREATE TRIGGER `basicInfo` AFTER INSERT ON `account` FOR EACH ROW INSERT INTO basic_information (User_ID)
VALUES (new.User_id)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `basic_information`
--

CREATE TABLE `basic_information` (
  `User_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `LastName` varchar(30) NOT NULL DEFAULT 'Last Name',
  `FirstName` varchar(30) NOT NULL DEFAULT 'First Name',
  `M_Initial` char(1) DEFAULT NULL,
  `Suffix` varchar(5) NOT NULL DEFAULT 'NA',
  `BirthDate` date DEFAULT NULL,
  `email_Add` varchar(50) NOT NULL,
  `ContactNo` varchar(11) NOT NULL DEFAULT '09XXXXXXXXX'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basic_information`
--

INSERT INTO `basic_information` (`User_ID`, `LastName`, `FirstName`, `M_Initial`, `Suffix`, `BirthDate`, `email_Add`, `ContactNo`) VALUES
(00000000005, 'Moratin', 'Jia Nova', 'M', 'III', '1997-10-10', 'jianovabmontecino@gmail.com', '9950012196'),
(00000000008, 'Rabanzo', 'Mary', 'P', 'NA', '2002-04-14', 'Basta@gmail.com', '9950012197');

-- --------------------------------------------------------

--
-- Table structure for table `booked_service`
--

CREATE TABLE `booked_service` (
  `Book_id_num` int(11) UNSIGNED ZEROFILL NOT NULL,
  `Serve_ID` int(11) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `User_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `Total` double(10,2) NOT NULL,
  `Used` double(10,2) NOT NULL,
  `Balance` double(10,2) NOT NULL,
  `Usable` tinyint(1) NOT NULL,
  `SukiCounter` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `Certificate_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `UServer_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `Certifier_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grooming_services`
--

CREATE TABLE `grooming_services` (
  `Service_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `ServiceDescription` varchar(50) NOT NULL,
  `MinPrice` double(10,2) NOT NULL DEFAULT 50.00,
  `MaxPrice` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `legal_establishment`
--

CREATE TABLE `legal_establishment` (
  `Certifier_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `Location` blob NOT NULL,
  `Fields` varchar(100) NOT NULL,
  `Rate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `USeeker_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `UServer_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `Message` text NOT NULL,
  `DateTime` datetime NOT NULL,
  `Sender_ID` int(11) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PM_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `User_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `PaymentM_I` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `Portfolio_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `UServer_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `Title` varchar(20) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `premium`
--

CREATE TABLE `premium` (
  `User_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rating_feedback`
--

CREATE TABLE `rating_feedback` (
  `USeeker_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `UServer_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `Rating` int(50) NOT NULL,
  `Feedback` text NOT NULL,
  `DateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `Sched_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `UServer_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `server_services`
--

CREATE TABLE `server_services` (
  `Serve_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `UServer_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `Service_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `Price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service_booking`
--

CREATE TABLE `service_booking` (
  `Book_id_num` int(11) UNSIGNED ZEROFILL NOT NULL,
  `User_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `DateTime` datetime NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `T_id_num` int(11) UNSIGNED ZEROFILL NOT NULL,
  `User_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `Book_id_num` int(11) UNSIGNED ZEROFILL NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `T_id_num` int(11) UNSIGNED ZEROFILL NOT NULL,
  `Service_S` varchar(100) NOT NULL,
  `Computation` varchar(50) NOT NULL,
  `Total` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `useeker`
--

CREATE TABLE `useeker` (
  `USeeker_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `User_ID` int(11) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useeker`
--

INSERT INTO `useeker` (`USeeker_ID`, `User_ID`) VALUES
(00000000007, 00000000005);

-- --------------------------------------------------------

--
-- Table structure for table `userver`
--

CREATE TABLE `userver` (
  `UServer_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `User_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `About` text NOT NULL,
  `Experience` int(2) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userver`
--

INSERT INTO `userver` (`UServer_ID`, `User_ID`, `About`, `Experience`) VALUES
(00000000002, 00000000008, 'barber', 01);

-- --------------------------------------------------------

--
-- Table structure for table `validity`
--

CREATE TABLE `validity` (
  `User_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `valid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `basic_information`
--
ALTER TABLE `basic_information`
  ADD PRIMARY KEY (`User_ID`) COMMENT 'Same as Account User_id';

--
-- Indexes for table `booked_service`
--
ALTER TABLE `booked_service`
  ADD KEY `Book_id_num` (`Book_id_num`,`Serve_ID`),
  ADD KEY `Bookedfk2` (`Serve_ID`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`Certificate_ID`),
  ADD KEY `certificatefk2` (`Certifier_ID`),
  ADD KEY `certificatefk1` (`UServer_ID`);

--
-- Indexes for table `grooming_services`
--
ALTER TABLE `grooming_services`
  ADD PRIMARY KEY (`Service_ID`);

--
-- Indexes for table `legal_establishment`
--
ALTER TABLE `legal_establishment`
  ADD PRIMARY KEY (`Certifier_ID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD KEY `messagefk1` (`USeeker_ID`),
  ADD KEY `messagefk2` (`UServer_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PM_ID`),
  ADD KEY `paymentfk1` (`User_ID`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`Portfolio_ID`),
  ADD KEY `portfoliofk1` (`UServer_ID`);

--
-- Indexes for table `premium`
--
ALTER TABLE `premium`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `rating_feedback`
--
ALTER TABLE `rating_feedback`
  ADD KEY `ratingpk,fk1` (`USeeker_ID`),
  ADD KEY `ratingpk,fk2` (`UServer_ID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`Sched_ID`),
  ADD KEY `schedulefk1` (`UServer_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
