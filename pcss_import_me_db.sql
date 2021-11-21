-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2021 at 05:45 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcss`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultant`
--

CREATE TABLE `consultant` (
  `consultant_id` int(11) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `job` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consultant`
--

INSERT INTO `consultant` (`consultant_id`, `fname`, `lname`, `email`, `password`, `job`) VALUES
(1, 'john', 'doe', 'johndoe@gmail.com', 'johnpass', 'nurse'),
(2, 'zoe', 'hanji', 'zoehanji@gmail.com', 'zoepass', 'pathologist'),
(3, 'ray', 'lee', 'raylee@gmail.com', 'raypass', 'surgeon'),
(9, 'elijah', 'charlotte', 'elijah@gmail.com', 'elijahpass', 'nurse'),
(10, 'alexander', 'harper', 'alexharper@gmail.com', 'alexpass', 'pathologist'),
(11, 'james', 'amelia', 'amelia_james@gmail.com', 'ameliapass', 'surgeon'),
(12, 'william', 'blue', 'blue_william@gmail.com', 'bluepass', 'surgeon'),
(13, 'olive', 'yew', 'yew_olive@gmail.com', 'yepass', 'nurse');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `form_id` int(11) NOT NULL,
  `condition` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `form_dateTime` date NOT NULL,
  `patient_id` int(11) NOT NULL,
  `consultant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`form_id`, `condition`, `reason`, `status`, `remarks`, `form_dateTime`, `patient_id`, `consultant_id`) VALUES
(1, 'high blood', 'My blood sugar level rises periodically', 'pending', NULL, '2021-11-09', 3, NULL),
(2, 'periodic weakness', 'I feel really weak periodically in a weak', 'pending', NULL, '2021-11-01', 4, NULL),
(6, 'Bleeding Disorder, Diabetes, High Cholesterol, Heart Disease, High Blood Pressure', 'I have all the illnesses', 'pending', NULL, '2021-11-30', 5, NULL),
(8, 'High Cholesterol', 'I am overweight and would like to have a check up', 'pending', NULL, '2021-11-10', 5, NULL),
(9, 'Bleeding Disorder', 'There are blood everywhere!!!', 'pending', NULL, '2021-12-03', 6, NULL),
(10, 'High Blood Pressure', 'I need a consultation about my health', 'pending', NULL, '2021-11-24', 7, NULL),
(11, 'High Blood Pressure, Heart Disease', 'regular checkup', 'pending', NULL, '2021-11-02', 11, NULL),
(12, 'Diabetes', 'i am diabetic and would like to ask for advice about my health condition', 'pending', NULL, '2021-11-24', 12, NULL),
(13, 'Heart Disease', 'my heart aches every time i wake up, what I do, I want consultation ', 'pending', NULL, '2021-11-24', 9, NULL),
(14, 'High Blood Pressure, Heart Disease', 'followup on my previous consultation', 'pending', NULL, '2021-11-24', 11, NULL),
(15, 'Bleeding Disorder', 'There are periodic blood that are flowing from my legs after my period every 3 days, ', 'pending', NULL, '2021-11-02', 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hospital_schedule`
--

CREATE TABLE `hospital_schedule` (
  `field_name` varchar(250) NOT NULL,
  `value` varchar(250) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital_schedule`
--

INSERT INTO `hospital_schedule` (`field_name`, `value`, `date_created`) VALUES
('days', 'monday,tuesday,wednesday,thursday,friday', '2021-11-21 03:25:46'),
('time', '8:00 - 19:00', '2021-11-21 03:25:41');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `fname`, `lname`, `birthdate`, `email`, `password`, `phone`) VALUES
(3, 'marry', 'moulic', '1995-12-23', 'marrymoulic@gmail.com', 'marrypass', '09145778435'),
(4, 'gerald anzen', 'canezo', '1999-11-09', 'gerald@gmail.com', 'geraldpass', '09547541646'),
(5, 'adrean', 'palafox', '2001-07-14', 'adrian1144palafoxs@gmail.com', 'adrianpass', '09474318007	'),
(6, 'liam', 'olivia', '1990-03-23', 'liamolivia@gmail.com', 'liampass', '09451537556	'),
(7, 'fay', 'daway', '1971-10-20', 'fay10_daway@gmail.com', 'faypass', '09457566157'),
(9, 'rod', 'knee', '1992-04-22', 'rodemail@gmail.com', 'rodpass', '09487784531'),
(10, 'col', 'fays', '1992-12-18', 'fays_col@gmail.com', 'fayspass', '09644551342'),
(11, 'hank', 'cheef', '1996-07-17', 'hank07@gmail.com', 'hankpass', '09748544332'),
(12, 'rose', 'bush', '1983-01-21', 'rose1983@gmail.com', 'rosepass', '09877365629');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `schedule_dateTime` datetime NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `form_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `schedule_dateTime`, `status`, `form_id`) VALUES
(1, '2021-11-24 10:50:00', 'Pending', 1),
(2, '2021-11-06 11:50:00', 'Cancelled', 2),
(4, '2021-11-30 10:55:00', 'Pending', 6),
(6, '2021-11-07 11:50:00', 'Success', 8),
(7, '2021-12-03 11:55:00', 'Pending', 9),
(8, '2021-11-24 19:00:00', 'Pending', 10),
(9, '2021-11-02 06:50:00', 'Success', 11),
(10, '2021-11-24 10:50:00', 'Pending', 12),
(11, '2021-11-24 07:55:00', 'Pending', 13),
(12, '2021-11-24 14:50:00', 'Pending', 14),
(13, '2021-11-02 19:50:00', 'Pending', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultant`
--
ALTER TABLE `consultant`
  ADD PRIMARY KEY (`consultant_id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`form_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `form_id` (`form_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultant`
--
ALTER TABLE `consultant`
  MODIFY `consultant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `form`
--
ALTER TABLE `form`
  ADD CONSTRAINT `form_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`form_id`) REFERENCES `form` (`form_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
