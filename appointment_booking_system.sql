-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2021 at 02:09 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointment_booking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_booking`
--

CREATE TABLE `appointment_booking` (
  `appointment_id` int(13) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(299) NOT NULL,
  `doctor_name` varchar(299) NOT NULL,
  `doctor_fees` decimal(10,2) NOT NULL,
  `patient_email` varchar(299) NOT NULL,
  `patient_mobile` varchar(10) NOT NULL,
  `appointment_date` varchar(10) NOT NULL,
  `appointment_time` time NOT NULL,
  `payment_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(299) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(299) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `emp_desigation` varchar(250) NOT NULL,
  `emp_address` varchar(299) NOT NULL,
  `emp_email` varchar(299) NOT NULL,
  `emp_mobile` varchar(12) NOT NULL,
  `emp_password` varchar(299) NOT NULL,
  `Concultting_fees` varchar(299) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `enquire_tbl`
--

CREATE TABLE `enquire_tbl` (
  `enquire_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(299) NOT NULL,
  `date` varchar(299) NOT NULL,
  `enquire_text` varchar(299) NOT NULL,
  `patient_phone` varchar(299) NOT NULL,
  `patient_email` varchar(299) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `labs/centers`
--

CREATE TABLE `labs/centers` (
  `lab_id` int(11) NOT NULL,
  `lab_name` varchar(299) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `lab_location` varchar(299) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offers_tbl`
--

CREATE TABLE `offers_tbl` (
  `offer_id` int(11) NOT NULL,
  `offer_name` varchar(299) NOT NULL,
  `offer_description` varchar(299) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offers_tbl`
--

INSERT INTO `offers_tbl` (`offer_id`, `offer_name`, `offer_description`) VALUES
(1, 'Demo Offer', 'Summer Offer Hurry !!!');

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE `patient_info` (
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(299) NOT NULL,
  `patient_birthdate` varchar(299) NOT NULL,
  `patient_gender` varchar(20) NOT NULL,
  `patient_gardian_name` varchar(299) NOT NULL,
  `patient_contact` varchar(12) NOT NULL,
  `patient_email` varchar(299) NOT NULL,
  `patient_city` varchar(299) NOT NULL,
  `patient_blood_group` varchar(299) NOT NULL,
  `patient_occupation` varchar(299) NOT NULL,
  `patient_password` varchar(299) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `register_tbl`
--

CREATE TABLE `register_tbl` (
  `register_id` int(11) NOT NULL,
  `username` varchar(299) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(299) NOT NULL,
  `password` varchar(299) NOT NULL,
  `verification_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register_tbl`
--

INSERT INTO `register_tbl` (`register_id`, `username`, `mobile`, `email`, `password`, `verification_status`) VALUES
(1, 'Admin', '6964834454', 'Admin@ABS.com', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `seo_settings`
--`

CREATE TABLE `seo_settings` (
  `id` int(11) NOT NULL,
  `title` varchar(299) NOT NULL,
  `description` varchar(299) NOT NULL,
  `keywords` varchar(299) NOT NULL,
  `author` varchar(299) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seo_settings`
--

INSERT INTO `seo_settings` (`id`, `title`, `description`, `keywords`, `author`) VALUES
(1, 'Appointment booking system', 'Doctors appointment booking syatem all type of medical problem solving center', 'best clinic for medical issues,best doctors', 'Admin Admin');

-- --------------------------------------------------------

--
-- Table structure for table `timming_doctor`
--

CREATE TABLE `timming_doctor` (
  `time_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timming_doctor`
--

INSERT INTO `timming_doctor` (`time_id`, `start_time`, `end_time`) VALUES
(1, '10:00:00', '11:00:00'),
(2, '11:00:00', '00:00:00'),
(3, '00:00:00', '13:00:00'),
(4, '15:30:00', '16:30:00'),
(5, '16:30:00', '17:30:00'),
(6, '18:30:00', '19:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_booking`
--
ALTER TABLE `appointment_booking`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `enquire_tbl`
--
ALTER TABLE `enquire_tbl`
  ADD PRIMARY KEY (`enquire_id`);

--
-- Indexes for table `labs/centers`
--
ALTER TABLE `labs/centers`
  ADD PRIMARY KEY (`lab_id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `labs/centers_ibfk_1` (`emp_id`);

--
-- Indexes for table `offers_tbl`
--
ALTER TABLE `offers_tbl`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `patient_info`
--
ALTER TABLE `patient_info`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `register_tbl`
--
ALTER TABLE `register_tbl`
  ADD PRIMARY KEY (`register_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `seo_settings`
--
ALTER TABLE `seo_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timming_doctor`
--
ALTER TABLE `timming_doctor`
  ADD PRIMARY KEY (`time_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_booking`
--
ALTER TABLE `appointment_booking`
  MODIFY `appointment_id` int(13) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `enquire_tbl`
--
ALTER TABLE `enquire_tbl`
  MODIFY `enquire_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labs/centers`
--
ALTER TABLE `labs/centers`
  MODIFY `lab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offers_tbl`
--
ALTER TABLE `offers_tbl`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_info`
--
ALTER TABLE `patient_info`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register_tbl`
--
ALTER TABLE `register_tbl`
  MODIFY `register_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seo_settings`
--
ALTER TABLE `seo_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `timming_doctor`
--
ALTER TABLE `timming_doctor`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `labs/centers`
--
ALTER TABLE `labs/centers`
  ADD CONSTRAINT `labs/centers_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
