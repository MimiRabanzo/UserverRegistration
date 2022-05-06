-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2022 at 07:52 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paramakagraduate`
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
(00000000008, 'SV', 'Active', '9950012197', '$2y$11$M8HARZQrMwz5pS.6C03o6O8E740vZ09LioVBLdrYG9aCMAJ42nEr2', '2022-04-15'),
(00000000017, 'SK', 'Active', '9950012201', '$2y$10$KbI9OABtlpkCiYy/mR1x2e.2SjF21Swvvi8KlgmbIyuR52TwvGV12', '2022-04-29'),
(00000000018, 'SK', 'Active', '9950012202', '$2y$10$KbI9OABtlpkCiYy/mR1x2e.2SjF21Swvvi8KlgmbIyuR52TwvGV12', '2022-04-29'),
(00000000019, 'SK', 'Active', '9950012203', '$2y$10$KbI9OABtlpkCiYy/mR1x2e.2SjF21Swvvi8KlgmbIyuR52TwvGV12', '2022-04-29'),
(00000000020, 'SK', 'Active', '9950012204', '$2y$10$KbI9OABtlpkCiYy/mR1x2e.2SjF21Swvvi8KlgmbIyuR52TwvGV12', '2022-04-29'),
(00000000021, 'SV', 'Active', '9950012205', '$2y$10$KbI9OABtlpkCiYy/mR1x2e.2SjF21Swvvi8KlgmbIyuR52TwvGV12', '2022-04-29'),
(00000000022, 'SV', 'Active', '9950012206', '$2y$10$KbI9OABtlpkCiYy/mR1x2e.2SjF21Swvvi8KlgmbIyuR52TwvGV12', '2022-04-29'),
(00000000023, 'SV', 'Active', '9950012207', '$2y$10$KbI9OABtlpkCiYy/mR1x2e.2SjF21Swvvi8KlgmbIyuR52TwvGV12', '2022-04-29'),
(00000000024, 'SV', 'Active', '9950012208', '$2y$10$KbI9OABtlpkCiYy/mR1x2e.2SjF21Swvvi8KlgmbIyuR52TwvGV12', '2022-04-29');

--
-- Triggers `account`
--
DELIMITER $$
CREATE TRIGGER `basicInfo` AFTER INSERT ON `account` FOR EACH ROW INSERT INTO basic_information (User_ID, ContactNo)
VALUES (new.User_id,new.UserName)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `welcome` AFTER INSERT ON `account` FOR EACH ROW INSERT INTO notification (User_ID, Text)
VALUES (new.User_id, "Welcome to Userve")
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
(00000000005, 'Moratin', 'Jia Nova', 'M', 'NA', '1997-10-10', 'jianovabmontecino@gmail.com', '9950012196'),
(00000000008, 'Rabanzo', 'Mary', 'P', 'NA', '2002-04-14', 'Basta@gmail.com', '9950012197'),
(00000000017, 'Bush', 'Britney', NULL, 'NA', '1996-09-01', 'britneybush@gmail.com', '9950012201'),
(00000000018, 'Hans', 'Blake', NULL, 'NA', '2001-06-17', 'blakehans@gmail.com', '9950012202'),
(00000000019, 'Pots', 'Kriss', NULL, 'NA', '2001-08-10', 'krisspots@gmail.com', '9950012203'),
(00000000020, 'Robinson', 'Kyle', NULL, 'NA', '1994-07-14', 'kylerobinson@gmail.com', '9950012204'),
(00000000021, 'Tsubaki', 'Akira', NULL, 'NA', '1997-10-10', 'tsubakiakira@gmail.com', '9950012205'),
(00000000022, 'Urabe', 'Mikoto', NULL, 'NA', '1997-09-01', 'mikotourabe@gmail.com', '9950012206'),
(00000000023, 'Amano', 'Yuritaro', NULL, 'NA', '2002-04-17', 'yukitaroshuu@gmail.com', '9950012207'),
(00000000024, 'Ryuu', 'Shiro', NULL, 'NA', '2003-06-20', 'shiroryuu@gmail.com', '9950012208');

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
-- Stand-in structure for view `getseekers`
-- (See below for the actual view)
--
CREATE TABLE `getseekers` (
`User_ID` int(11) unsigned zerofill
,`UserStatus` varchar(10)
,`UserName` varchar(10)
,`Password` varchar(255)
,`DateCreated` date
,`USeeker_ID` int(11) unsigned zerofill
,`LastName` varchar(30)
,`FirstName` varchar(30)
,`M_Initial` char(1)
,`Suffix` varchar(5)
,`BirthDate` date
,`email_Add` varchar(50)
,`ContactNo` varchar(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `getservers`
-- (See below for the actual view)
--
CREATE TABLE `getservers` (
`User_ID` int(11) unsigned zerofill
,`UserStatus` varchar(10)
,`UserName` varchar(10)
,`Password` varchar(255)
,`DateCreated` date
,`UServer_ID` int(11) unsigned zerofill
,`About` text
,`Experience` int(2) unsigned zerofill
,`LastName` varchar(30)
,`FirstName` varchar(30)
,`M_Initial` char(1)
,`Suffix` varchar(5)
,`BirthDate` date
,`email_Add` varchar(50)
,`ContactNo` varchar(11)
);

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

--
-- Dumping data for table `grooming_services`
--

INSERT INTO `grooming_services` (`Service_ID`, `ServiceDescription`, `MinPrice`, `MaxPrice`) VALUES
(00000000001, 'Haircut', 50.00, 100.00);

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
  `Rating` float(3,2) NOT NULL,
  `Feedback` text NOT NULL,
  `DateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating_feedback`
--

INSERT INTO `rating_feedback` (`USeeker_ID`, `UServer_ID`, `Rating`, `Feedback`, `DateTime`) VALUES
(00000000007, 00000000002, 4.50, 'good work on the haircut', '2022-04-25 08:26:11'),
(00000000007, 00000000003, 4.30, 'Great Work on my hair', '2022-04-28 20:48:45'),
(00000000007, 00000000004, 4.90, 'Do you need to ask more?', '2022-04-28 20:48:45'),
(00000000007, 00000000005, 5.00, 'Perfect Service', '2022-04-28 20:48:45'),
(00000000007, 00000000006, 4.10, 'Somewhat Good.', '2022-04-28 20:48:45');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `Sched_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `UServer_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `StartTime` time NOT NULL DEFAULT '00:00:00',
  `EndTime` time NOT NULL DEFAULT '00:00:00',
  `Day` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`Sched_ID`, `UServer_ID`, `StartTime`, `EndTime`, `Day`) VALUES
(00000000001, 00000000002, '08:30:00', '05:30:00', 1),
(00000000002, 00000000002, '08:30:00', '05:30:00', 2),
(00000000003, 00000000002, '08:30:00', '05:30:00', 3),
(00000000004, 00000000002, '08:30:00', '05:30:00', 4),
(00000000005, 00000000002, '08:30:00', '05:30:00', 5),
(00000000006, 00000000002, '00:00:00', '00:00:00', 0),
(00000000007, 00000000002, '00:00:00', '00:00:00', 6),
(00000000008, 00000000003, '08:30:00', '05:30:00', 1),
(00000000009, 00000000003, '08:30:00', '05:30:00', 2),
(00000000010, 00000000003, '08:30:00', '05:30:00', 3),
(00000000011, 00000000003, '08:30:00', '05:30:00', 4),
(00000000012, 00000000003, '08:30:00', '05:30:00', 5),
(00000000013, 00000000003, '00:00:00', '00:00:00', 0),
(00000000014, 00000000003, '00:00:00', '00:00:00', 6),
(00000000015, 00000000004, '08:30:00', '05:30:00', 1),
(00000000016, 00000000004, '08:30:00', '05:30:00', 2),
(00000000017, 00000000004, '08:30:00', '05:30:00', 3),
(00000000018, 00000000004, '08:30:00', '05:30:00', 4),
(00000000019, 00000000004, '08:30:00', '05:30:00', 5),
(00000000020, 00000000004, '00:00:00', '00:00:00', 0),
(00000000021, 00000000004, '00:00:00', '00:00:00', 6),
(00000000022, 00000000005, '08:30:00', '05:30:00', 1),
(00000000023, 00000000005, '08:30:00', '05:30:00', 2),
(00000000024, 00000000005, '08:30:00', '05:30:00', 3),
(00000000025, 00000000005, '08:30:00', '05:30:00', 4),
(00000000026, 00000000005, '08:30:00', '05:30:00', 5),
(00000000027, 00000000005, '00:00:00', '00:00:00', 0),
(00000000028, 00000000005, '00:00:00', '00:00:00', 6),
(00000000029, 00000000006, '08:30:00', '05:30:00', 1),
(00000000030, 00000000006, '08:30:00', '05:30:00', 2),
(00000000031, 00000000006, '08:30:00', '05:30:00', 3),
(00000000032, 00000000006, '08:30:00', '05:30:00', 4),
(00000000033, 00000000006, '08:30:00', '05:30:00', 5),
(00000000034, 00000000006, '00:00:00', '00:00:00', 0),
(00000000035, 00000000006, '00:00:00', '00:00:00', 6);

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

--
-- Dumping data for table `server_services`
--

INSERT INTO `server_services` (`Serve_ID`, `UServer_ID`, `Service_ID`, `Price`) VALUES
(00000000001, 00000000002, 00000000001, 80.00),
(00000000003, 00000000003, 00000000001, 79.00),
(00000000004, 00000000004, 00000000001, 75.00),
(00000000005, 00000000005, 00000000001, 85.00),
(00000000006, 00000000006, 00000000001, 90.00);

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
(00000000007, 00000000005),
(00000000009, 00000000017),
(00000000008, 00000000018),
(00000000010, 00000000019),
(00000000011, 00000000020);

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
(00000000002, 00000000008, 'Barber', 01),
(00000000003, 00000000021, 'Barber', 02),
(00000000004, 00000000022, 'Barber', 03),
(00000000005, 00000000023, 'Barber', 02),
(00000000006, 00000000024, 'Barber', 04);

--
-- Triggers `userver`
--
DELIMITER $$
CREATE TRIGGER `scheduleTemplate` AFTER INSERT ON `userver` FOR EACH ROW INSERT INTO schedule (Userver_ID, StartTime, EndTime, Day)
VALUES (new.User_id,0,0,0),(new.User_id,0,0,1),(new.User_id,0,0,2),(new.User_id,0,0,3),(new.User_id,0,0,4),(new.User_id,0,0,5),(new.User_id,0,0,6)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `validity`
--

CREATE TABLE `validity` (
  `User_ID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `valid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `validity`
--
DELIMITER $$
CREATE TRIGGER `virified` AFTER INSERT ON `validity` FOR EACH ROW INSERT INTO notification (User_ID, Text)
VALUES (new.User_id, "User Verified.")
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure for view `getseekers`
--
DROP TABLE IF EXISTS `getseekers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`User_ID`@`%` SQL SECURITY INVOKER VIEW `getseekers`  AS SELECT `account`.`User_ID` AS `User_ID`, `account`.`UserStatus` AS `UserStatus`, `account`.`UserName` AS `UserName`, `account`.`Password` AS `Password`, `account`.`DateCreated` AS `DateCreated`, `useeker`.`USeeker_ID` AS `USeeker_ID`, `basic_information`.`LastName` AS `LastName`, `basic_information`.`FirstName` AS `FirstName`, `basic_information`.`M_Initial` AS `M_Initial`, `basic_information`.`Suffix` AS `Suffix`, `basic_information`.`BirthDate` AS `BirthDate`, `basic_information`.`email_Add` AS `email_Add`, `basic_information`.`ContactNo` AS `ContactNo` FROM ((`account` join `useeker` on(`account`.`User_ID` = `useeker`.`User_ID`)) join `basic_information` on(`account`.`User_ID` = `basic_information`.`User_ID`)) GROUP BY `account`.`User_ID`  ;

-- --------------------------------------------------------

--
-- Structure for view `getservers`
--
DROP TABLE IF EXISTS `getservers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`User_ID`@`%` SQL SECURITY INVOKER VIEW `getservers`  AS SELECT `account`.`User_ID` AS `User_ID`, `account`.`UserStatus` AS `UserStatus`, `account`.`UserName` AS `UserName`, `account`.`Password` AS `Password`, `account`.`DateCreated` AS `DateCreated`, `userver`.`UServer_ID` AS `UServer_ID`, `userver`.`About` AS `About`, `userver`.`Experience` AS `Experience`, `basic_information`.`LastName` AS `LastName`, `basic_information`.`FirstName` AS `FirstName`, `basic_information`.`M_Initial` AS `M_Initial`, `basic_information`.`Suffix` AS `Suffix`, `basic_information`.`BirthDate` AS `BirthDate`, `basic_information`.`email_Add` AS `email_Add`, `basic_information`.`ContactNo` AS `ContactNo` FROM ((`account` join `userver` on(`account`.`User_ID` = `userver`.`User_ID`)) join `basic_information` on(`account`.`User_ID` = `basic_information`.`User_ID`)) GROUP BY `account`.`User_ID`  ;

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

--
-- Indexes for table `server_services`
--
ALTER TABLE `server_services`
  ADD PRIMARY KEY (`Serve_ID`),
  ADD KEY `SSfk1` (`UServer_ID`),
  ADD KEY `SSfk2` (`Service_ID`);

--
-- Indexes for table `service_booking`
--
ALTER TABLE `service_booking`
  ADD PRIMARY KEY (`Book_id_num`),
  ADD KEY `Bookingfk1` (`User_ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`T_id_num`);

--
-- Indexes for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`T_id_num`);

--
-- Indexes for table `useeker`
--
ALTER TABLE `useeker`
  ADD PRIMARY KEY (`USeeker_ID`),
  ADD KEY `seekerfk1` (`User_ID`);

--
-- Indexes for table `userver`
--
ALTER TABLE `userver`
  ADD PRIMARY KEY (`UServer_ID`) COMMENT 'Zero filled',
  ADD KEY `serverfk1` (`User_ID`);

--
-- Indexes for table `validity`
--
ALTER TABLE `validity`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `User_ID` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'Zero fill EX 000000001', AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `User_ID` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `Certificate_ID` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grooming_services`
--
ALTER TABLE `grooming_services`
  MODIFY `Service_ID` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `legal_establishment`
--
ALTER TABLE `legal_establishment`
  MODIFY `Certifier_ID` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PM_ID` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `premium`
--
ALTER TABLE `premium`
  MODIFY `User_ID` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `Sched_ID` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `server_services`
--
ALTER TABLE `server_services`
  MODIFY `Serve_ID` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_booking`
--
ALTER TABLE `service_booking`
  MODIFY `Book_id_num` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `useeker`
--
ALTER TABLE `useeker`
  MODIFY `USeeker_ID` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `userver`
--
ALTER TABLE `userver`
  MODIFY `UServer_ID` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `validity`
--
ALTER TABLE `validity`
  MODIFY `User_ID` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basic_information`
--
ALTER TABLE `basic_information`
  ADD CONSTRAINT `pk,fk1` FOREIGN KEY (`User_ID`) REFERENCES `account` (`User_ID`);

--
-- Constraints for table `booked_service`
--
ALTER TABLE `booked_service`
  ADD CONSTRAINT `Bookedfk2` FOREIGN KEY (`Serve_ID`) REFERENCES `server_services` (`Serve_ID`),
  ADD CONSTRAINT `Bookedpk,fk1` FOREIGN KEY (`Book_id_num`) REFERENCES `service_booking` (`Book_id_num`);

--
-- Constraints for table `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `cardfk1` FOREIGN KEY (`User_ID`) REFERENCES `account` (`User_ID`);

--
-- Constraints for table `certificate`
--
ALTER TABLE `certificate`
  ADD CONSTRAINT `certificatefk1` FOREIGN KEY (`UServer_ID`) REFERENCES `userver` (`UServer_ID`),
  ADD CONSTRAINT `certificatefk2` FOREIGN KEY (`Certifier_ID`) REFERENCES `legal_establishment` (`Certifier_ID`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `messagefk1` FOREIGN KEY (`USeeker_ID`) REFERENCES `useeker` (`USeeker_ID`),
  ADD CONSTRAINT `messagefk2` FOREIGN KEY (`UServer_ID`) REFERENCES `userver` (`UServer_ID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `paymentfk1` FOREIGN KEY (`User_ID`) REFERENCES `account` (`User_ID`);

--
-- Constraints for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `portfoliofk1` FOREIGN KEY (`UServer_ID`) REFERENCES `userver` (`UServer_ID`);

--
-- Constraints for table `premium`
--
ALTER TABLE `premium`
  ADD CONSTRAINT `premiumfk1` FOREIGN KEY (`User_ID`) REFERENCES `account` (`User_ID`);

--
-- Constraints for table `rating_feedback`
--
ALTER TABLE `rating_feedback`
  ADD CONSTRAINT `ratingpk,fk1` FOREIGN KEY (`USeeker_ID`) REFERENCES `useeker` (`USeeker_ID`),
  ADD CONSTRAINT `ratingpk,fk2` FOREIGN KEY (`UServer_ID`) REFERENCES `userver` (`UServer_ID`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedulefk1` FOREIGN KEY (`UServer_ID`) REFERENCES `userver` (`UServer_ID`);

--
-- Constraints for table `server_services`
--
ALTER TABLE `server_services`
  ADD CONSTRAINT `SSfk1` FOREIGN KEY (`UServer_ID`) REFERENCES `userver` (`UServer_ID`),
  ADD CONSTRAINT `SSfk2` FOREIGN KEY (`Service_ID`) REFERENCES `grooming_services` (`Service_ID`);

--
-- Constraints for table `service_booking`
--
ALTER TABLE `service_booking`
  ADD CONSTRAINT `Bookingfk1` FOREIGN KEY (`User_ID`) REFERENCES `account` (`User_ID`);

--
-- Constraints for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD CONSTRAINT `Transactfk1` FOREIGN KEY (`T_id_num`) REFERENCES `transaction` (`T_id_num`);

--
-- Constraints for table `useeker`
--
ALTER TABLE `useeker`
  ADD CONSTRAINT `seekerfk1` FOREIGN KEY (`User_ID`) REFERENCES `account` (`User_ID`);

--
-- Constraints for table `userver`
--
ALTER TABLE `userver`
  ADD CONSTRAINT `serverfk1` FOREIGN KEY (`User_ID`) REFERENCES `account` (`User_ID`);

--
-- Constraints for table `validity`
--
ALTER TABLE `validity`
  ADD CONSTRAINT `validfk1` FOREIGN KEY (`User_ID`) REFERENCES `account` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
