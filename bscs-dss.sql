-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 09:01 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bscs-dss`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `Attendance_ID` int(10) UNSIGNED NOT NULL,
  `Event_ID` int(10) UNSIGNED NOT NULL,
  `Student_ID` char(7) NOT NULL,
  `Attendance_Status` enum('Present','Absent','') NOT NULL,
  `Attendance_Time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`Attendance_ID`, `Event_ID`, `Student_ID`, `Attendance_Status`, `Attendance_Time`) VALUES
(368, 70, '19-0001', 'Present', '2023-12-05 07:21:55'),
(369, 70, '19-0099', 'Present', '2023-12-05 07:22:09'),
(370, 70, '19-0002', 'Present', '2023-12-05 07:22:02'),
(371, 70, '19-0003', '', '2023-12-05 07:21:37'),
(372, 70, '19-0088', '', '2023-12-05 07:21:37'),
(373, 71, '19-0001', '', '2023-12-05 09:28:08'),
(374, 71, '19-0099', 'Present', '2023-12-05 09:28:37'),
(375, 71, '19-0002', '', '2023-12-05 09:28:08'),
(376, 71, '19-0003', '', '2023-12-05 09:28:08'),
(377, 71, '19-0088', '', '2023-12-05 09:28:08'),
(378, 72, '19-0001', 'Present', '2023-12-05 10:06:57'),
(379, 72, '19-0099', 'Present', '2023-12-05 10:06:46'),
(380, 72, '19-0002', '', '2023-12-05 10:06:16'),
(381, 72, '19-0003', '', '2023-12-05 10:06:16'),
(382, 72, '19-0088', '', '2023-12-05 10:06:16'),
(383, 73, '19-0001', '', '2023-12-05 11:21:15'),
(384, 73, '19-0099', 'Present', '2023-12-05 11:21:33'),
(385, 73, '19-0002', '', '2023-12-05 11:21:15'),
(386, 73, '19-0003', '', '2023-12-05 11:21:15'),
(387, 73, '19-0088', '', '2023-12-05 11:21:15'),
(388, 74, '19-0001', '', '2023-12-05 11:33:58'),
(389, 74, '19-0099', '', '2023-12-05 11:33:58'),
(390, 74, '19-0002', '', '2023-12-05 11:33:58'),
(391, 74, '19-0003', '', '2023-12-05 11:33:58'),
(392, 74, '19-0088', '', '2023-12-05 11:33:58'),
(393, 75, '19-0001', 'Present', '2023-12-05 11:41:59'),
(394, 75, '19-0099', 'Present', '2023-12-05 11:42:06'),
(395, 75, '19-0002', 'Present', '2023-12-05 11:41:54'),
(396, 75, '19-0003', '', '2023-12-05 11:41:36'),
(397, 75, '19-0088', '', '2023-12-05 11:41:36'),
(398, 76, '19-0001', '', '2023-12-14 14:06:29'),
(399, 76, '19-0099', '', '2023-12-14 14:06:29'),
(400, 76, '19-0002', 'Present', '2023-12-14 14:06:49'),
(401, 76, '19-0003', '', '2023-12-14 14:06:29'),
(402, 76, '19-0088', '', '2023-12-14 14:06:29');

--
-- Triggers `attendance`
--
DELIMITER $$
CREATE TRIGGER `after_attendance_insert` AFTER INSERT ON `attendance` FOR EACH ROW IF NEW.attendance_status = '' THEN
    INSERT INTO fines (Fine_ID, Event_ID, Student_ID, Paid_Amount, Payment_Status)
    VALUES (NEW.Attendance_ID, NEW.Event_ID, NEW.Student_ID, 0, 'Not Cleared');
  END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_attendance_update` AFTER UPDATE ON `attendance` FOR EACH ROW IF NEW.attendance_status = 'Present' AND OLD.attendance_status = '' THEN
    -- If attendance_status changed from empty to 'Present', delete the record from fines
    DELETE FROM fines
    WHERE Student_ID = NEW.Student_ID AND Event_ID = NEW.Event_ID;
  END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `Event_ID` int(10) UNSIGNED NOT NULL,
  `Event_Name` varchar(30) NOT NULL,
  `Event_Date` date NOT NULL,
  `Closing_Time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`Event_ID`, `Event_Name`, `Event_Date`, `Closing_Time`) VALUES
(70, 'Software Engineering Day', '2023-12-05', '2023-12-05 07:23:00'),
(71, 'Software Engineering2', '2023-12-05', '2023-12-05 09:30:00'),
(72, 'Hugyaw', '2023-12-05', '2023-12-05 10:07:00'),
(73, 'Sem Ender', '2023-12-05', '2023-12-05 11:22:00'),
(74, 'Class', '2023-12-05', '2023-12-05 11:34:00'),
(75, 'Chapel Period', '2023-12-05', '2023-12-05 11:44:00'),
(76, 'party', '2023-12-18', '2023-12-18 15:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `fines`
--

CREATE TABLE `fines` (
  `Fine_ID` int(10) UNSIGNED NOT NULL,
  `Student_ID` char(7) NOT NULL,
  `Event_ID` int(10) UNSIGNED NOT NULL,
  `Paid_Amount` int(11) NOT NULL,
  `Payment_Status` enum('Cleared','Not Cleared') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fines`
--

INSERT INTO `fines` (`Fine_ID`, `Student_ID`, `Event_ID`, `Paid_Amount`, `Payment_Status`) VALUES
(371, '19-0003', 70, 35, 'Not Cleared'),
(372, '19-0088', 70, 50, 'Cleared'),
(373, '19-0001', 71, 20, 'Not Cleared'),
(375, '19-0002', 71, 3, 'Not Cleared'),
(376, '19-0003', 71, 1, 'Not Cleared'),
(377, '19-0088', 71, 0, 'Not Cleared'),
(380, '19-0002', 72, 50, 'Cleared'),
(381, '19-0003', 72, 50, 'Not Cleared'),
(382, '19-0088', 72, 0, 'Not Cleared'),
(383, '19-0001', 73, 20, 'Not Cleared'),
(385, '19-0002', 73, 0, 'Not Cleared'),
(386, '19-0003', 73, 0, 'Not Cleared'),
(387, '19-0088', 73, 0, 'Not Cleared'),
(388, '19-0001', 74, 37, 'Not Cleared'),
(389, '19-0099', 74, 1, 'Not Cleared'),
(390, '19-0002', 74, 0, 'Not Cleared'),
(391, '19-0003', 74, 0, 'Not Cleared'),
(392, '19-0088', 74, 0, 'Not Cleared'),
(396, '19-0003', 75, 0, 'Not Cleared'),
(397, '19-0088', 75, 0, 'Not Cleared'),
(398, '19-0001', 76, 0, 'Not Cleared'),
(399, '19-0099', 76, 0, 'Not Cleared'),
(401, '19-0003', 76, 0, 'Not Cleared'),
(402, '19-0088', 76, 0, 'Not Cleared');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_dues`
--

CREATE TABLE `monthly_dues` (
  `Student_ID` char(7) NOT NULL,
  `AUG` int(11) NOT NULL,
  `SEPT` int(11) NOT NULL,
  `OCT` int(11) NOT NULL,
  `NOV` int(11) NOT NULL,
  `DECE` int(11) NOT NULL,
  `JAN` int(11) NOT NULL,
  `FEB` int(11) NOT NULL,
  `MAR` int(11) NOT NULL,
  `APR` int(11) NOT NULL,
  `MAY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `monthly_dues`
--

INSERT INTO `monthly_dues` (`Student_ID`, `AUG`, `SEPT`, `OCT`, `NOV`, `DECE`, `JAN`, `FEB`, `MAR`, `APR`, `MAY`) VALUES
('19-0001', 50, 0, 50, 0, 30, 0, 0, 0, 0, 0),
('19-0002', 50, 30, 20, 1, 0, 0, 0, 0, 0, 5),
('19-0003', 50, 40, 20, 0, 0, 0, 0, 0, 0, 0),
('19-0088', 0, 0, 0, 40, 0, 0, 0, 0, 0, 0),
('19-0099', 160, 20, 0, 0, 30, 0, 0, 0, 70, 50);

-- --------------------------------------------------------

--
-- Table structure for table `payment_records`
--

CREATE TABLE `payment_records` (
  `Payment_ID` int(10) UNSIGNED NOT NULL,
  `Student_ID` char(7) NOT NULL,
  `Payment_Date` datetime NOT NULL DEFAULT current_timestamp(),
  `Amount` int(11) NOT NULL,
  `Payment_Type` enum('Monthly Due','Fine') NOT NULL,
  `Month` enum('AUG','SEPT','OCT','NOV','DECE','JAN','FEB','MAR','APR','MAY') DEFAULT NULL,
  `Fine_ID` int(10) UNSIGNED DEFAULT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_records`
--

INSERT INTO `payment_records` (`Payment_ID`, `Student_ID`, `Payment_Date`, `Amount`, `Payment_Type`, `Month`, `Fine_ID`, `Description`) VALUES
(26, '19-0001', '2023-12-05 00:10:09', 20, 'Monthly Due', 'AUG', NULL, NULL),
(27, '19-0003', '2023-12-05 02:26:54', 20, 'Monthly Due', 'AUG', NULL, NULL),
(28, '19-0003', '2023-12-05 09:29:33', 30, 'Fine', NULL, 371, NULL),
(29, '19-0003', '2023-12-05 09:30:01', 20, 'Fine', NULL, 371, NULL),
(30, '19-0099', '2023-12-05 02:44:10', 50, 'Monthly Due', 'AUG', NULL, NULL),
(31, '19-0099', '2023-12-05 02:44:29', 50, 'Monthly Due', 'AUG', NULL, NULL),
(32, '19-0099', '2023-12-05 02:44:39', 50, 'Monthly Due', 'AUG', NULL, NULL),
(33, '19-0099', '2023-12-05 02:44:58', 50, 'Monthly Due', 'MAY', NULL, NULL),
(34, '19-0088', '2023-12-05 09:51:11', 20, 'Fine', NULL, 372, NULL),
(35, '19-0001', '2023-12-05 03:04:08', 30, 'Monthly Due', 'AUG', NULL, NULL),
(36, '19-0088', '2023-12-05 10:05:38', 30, 'Fine', NULL, 372, NULL),
(37, '19-0099', '2023-12-05 03:11:46', 50, 'Monthly Due', 'APR', NULL, NULL),
(38, '19-0003', '2023-12-05 03:13:27', 10, 'Monthly Due', 'SEPT', NULL, NULL),
(39, '19-0003', '2023-12-05 03:13:39', 30, 'Monthly Due', 'SEPT', NULL, NULL),
(40, '19-0002', '2023-12-05 04:04:40', 20, 'Monthly Due', 'AUG', NULL, NULL),
(41, '19-0003', '2023-12-05 11:06:47', -20, 'Fine', NULL, 371, NULL),
(42, '19-0003', '2023-12-05 04:18:24', 30, 'Monthly Due', 'AUG', NULL, NULL),
(43, '19-0002', '2023-12-05 11:19:52', 50, 'Fine', NULL, 380, NULL),
(44, '19-0002', '2023-12-05 04:30:45', 30, 'Monthly Due', 'AUG', NULL, NULL),
(45, '19-0002', '2023-12-05 04:31:02', 30, 'Monthly Due', 'SEPT', NULL, NULL),
(46, '19-0002', '2023-12-05 04:31:37', 20, 'Monthly Due', 'OCT', NULL, NULL),
(47, '19-0001', '2023-12-05 11:36:21', 20, 'Fine', NULL, 383, NULL),
(48, '19-0099', '2023-12-14 05:07:25', 10, 'Monthly Due', 'AUG', NULL, NULL),
(49, '19-0001', '2023-12-14 06:50:36', 50, 'Monthly Due', 'AUG', NULL, NULL),
(50, '19-0001', '2023-12-14 06:52:39', 50, 'Monthly Due', 'OCT', NULL, NULL),
(51, '19-0001', '2023-12-14 06:53:05', -50, 'Monthly Due', 'AUG', NULL, NULL),
(52, '19-0001', '2023-12-14 06:54:18', -30, 'Monthly Due', 'DECE', NULL, NULL),
(53, '19-0088', '2023-12-14 06:55:36', 40, 'Monthly Due', 'NOV', NULL, NULL),
(54, '19-0003', '2023-12-14 13:57:11', 50, 'Fine', NULL, 381, NULL),
(55, '19-0001', '2024-05-16 11:33:05', 20, 'Fine', NULL, 388, NULL),
(56, '19-0003', '2024-05-16 11:44:06', 1, 'Fine', NULL, 371, NULL),
(57, '19-0003', '2024-05-16 11:44:15', 1, 'Fine', NULL, 371, NULL),
(58, '19-0001', '2024-05-17 16:06:54', 20, 'Fine', NULL, 373, NULL),
(59, '19-0001', '2024-05-19 03:34:37', 2, 'Fine', NULL, 388, NULL),
(60, '19-0001', '2024-05-19 03:36:38', 2, 'Fine', NULL, 388, NULL),
(61, '19-0001', '2024-05-19 03:36:49', 2, 'Fine', NULL, 388, NULL),
(62, '19-0001', '2024-05-19 03:39:39', 2, 'Fine', NULL, 388, NULL),
(63, '19-0099', '2024-05-19 03:40:14', 1, 'Fine', NULL, 389, NULL),
(64, '19-0001', '2024-05-19 03:44:56', 1, 'Fine', NULL, 388, NULL),
(65, '19-0001', '2024-05-19 03:45:38', 1, 'Fine', NULL, 388, NULL),
(66, '19-0001', '2024-05-19 03:46:26', 1, 'Fine', NULL, 388, NULL),
(67, '19-0001', '2024-05-19 03:47:15', 1, 'Fine', NULL, 388, NULL),
(68, '19-0001', '2024-05-19 03:47:52', 1, 'Fine', NULL, 388, NULL),
(69, '19-0001', '2024-05-19 03:49:03', 1, 'Fine', NULL, 388, NULL),
(70, '19-0001', '2024-05-19 03:50:52', 1, 'Fine', NULL, 388, NULL),
(71, '19-0001', '2024-05-19 03:54:53', 1, 'Fine', NULL, 388, NULL),
(72, '19-0001', '2024-05-19 03:55:13', 1, 'Fine', NULL, 388, NULL),
(73, '19-0002', '2024-05-19 07:49:28', 1, 'Fine', NULL, 375, NULL),
(74, '19-0002', '2024-05-19 07:49:55', 1, 'Fine', NULL, 375, NULL),
(75, '19-0002', '2024-05-19 07:52:33', 1, 'Fine', NULL, 375, NULL),
(76, '19-0003', '2024-05-19 03:39:27', 10, 'Monthly Due', 'OCT', NULL, NULL),
(77, '19-0003', '2024-05-19 03:42:39', 10, 'Monthly Due', 'OCT', NULL, NULL),
(78, '19-0002', '2024-05-19 04:28:30', 1, 'Monthly Due', 'NOV', NULL, NULL),
(79, '19-0099', '2024-05-20 08:52:49', 20, 'Monthly Due', 'SEPT', NULL, NULL),
(80, '19-0002', '2024-05-21 00:31:31', 5, 'Monthly Due', 'MAY', NULL, NULL),
(81, '19-0099', '2024-05-21 00:47:11', 30, 'Monthly Due', 'DECE', NULL, NULL),
(82, '19-0001', '2024-05-21 00:47:29', 30, 'Monthly Due', 'DECE', NULL, NULL),
(83, '19-0001', '2024-05-21 00:48:15', 30, 'Monthly Due', 'DECE', NULL, NULL),
(84, '19-0003', '2024-05-21 07:22:12', 1, 'Fine', NULL, 376, NULL),
(85, '19-0003', '2024-05-21 07:43:21', 3, 'Fine', NULL, 371, NULL),
(86, '19-0099', '2024-05-21 02:08:39', 20, 'Monthly Due', 'APR', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_information`
--

CREATE TABLE `student_information` (
  `Student_ID` char(7) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Middle_Name` varchar(20) DEFAULT NULL,
  `Suffix` varchar(5) DEFAULT NULL,
  `Year` int(10) UNSIGNED NOT NULL,
  `User_Type` enum('student','treasurer','secretary','admin') NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_information`
--

INSERT INTO `student_information` (`Student_ID`, `Surname`, `First_Name`, `Middle_Name`, `Suffix`, `Year`, `User_Type`, `Password`) VALUES
('19-0001', 'Magallamento', 'Prinz Juancho', 'MiddleName', 'Sr.', 1, 'student', 'pass'),
('19-0002', 'Penido', 'Xenon', 'Zander', NULL, 2, 'student', 'pass2'),
('19-0003', 'Antoque', 'Jane', 'Tacan', NULL, 4, 'student', 'pass3'),
('19-0088', 'Landero', 'Glazy Kyle', 'Mirafuentes', NULL, 3, 'secretary', 'pass5678'),
('19-0099', 'Silva', 'Lysha', 'Tolentino', NULL, 3, 'treasurer', 'pass1234');

--
-- Triggers `student_information`
--
DELIMITER $$
CREATE TRIGGER `after_adding_student` AFTER INSERT ON `student_information` FOR EACH ROW INSERT INTO monthly_dues (Student_ID, AUG, SEPT, OCT, NOV, DECE, JAN, FEB, MAR, APR, MAY)
    VALUES (NEW.Student_ID, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`Attendance_ID`),
  ADD KEY `Event_ID` (`Event_ID`),
  ADD KEY `Student_ID` (`Student_ID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`Event_ID`);

--
-- Indexes for table `fines`
--
ALTER TABLE `fines`
  ADD PRIMARY KEY (`Fine_ID`),
  ADD KEY `Event_ID` (`Event_ID`),
  ADD KEY `Student_ID` (`Student_ID`);

--
-- Indexes for table `monthly_dues`
--
ALTER TABLE `monthly_dues`
  ADD PRIMARY KEY (`Student_ID`),
  ADD KEY `Student_ID` (`Student_ID`);

--
-- Indexes for table `payment_records`
--
ALTER TABLE `payment_records`
  ADD PRIMARY KEY (`Payment_ID`),
  ADD KEY `Fine_ID` (`Fine_ID`),
  ADD KEY `Student_ID` (`Student_ID`);

--
-- Indexes for table `student_information`
--
ALTER TABLE `student_information`
  ADD PRIMARY KEY (`Student_ID`),
  ADD UNIQUE KEY `Password` (`Password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `Attendance_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=403;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `Event_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `fines`
--
ALTER TABLE `fines`
  MODIFY `Fine_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=403;

--
-- AUTO_INCREMENT for table `payment_records`
--
ALTER TABLE `payment_records`
  MODIFY `Payment_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`Event_ID`) REFERENCES `events` (`Event_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`Student_ID`) REFERENCES `student_information` (`Student_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `fines`
--
ALTER TABLE `fines`
  ADD CONSTRAINT `fines_ibfk_1` FOREIGN KEY (`Event_ID`) REFERENCES `events` (`Event_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fines_ibfk_2` FOREIGN KEY (`Student_ID`) REFERENCES `student_information` (`Student_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `monthly_dues`
--
ALTER TABLE `monthly_dues`
  ADD CONSTRAINT `monthly_dues_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `student_information` (`Student_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `payment_records`
--
ALTER TABLE `payment_records`
  ADD CONSTRAINT `payment_records_ibfk_1` FOREIGN KEY (`Fine_ID`) REFERENCES `fines` (`Fine_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_records_ibfk_2` FOREIGN KEY (`Student_ID`) REFERENCES `student_information` (`Student_ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
