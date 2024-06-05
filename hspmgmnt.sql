-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2023 at 06:54 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hspmgmnt`
--

-- --------------------------------------------------------

--
-- Table structure for table `administration`
--

CREATE TABLE `administration` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administration`
--

INSERT INTO `administration` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `date_admit` date DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `room_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`date_admit`, `patient_id`, `room_no`) VALUES
('2023-01-01', 1, 321),
('2023-01-02', 1, 321);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_no` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `discharge_date` date DEFAULT NULL,
  `room_charges` float DEFAULT NULL,
  `no_of_days` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_no`, `patient_id`, `discharge_date`, `room_charges`, `no_of_days`) VALUES
(1, 5, '2023-01-03', 300, 1),
(2, 2, '2023-01-05', 345, 3);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `speciality` varchar(50) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `name`, `speciality`, `age`, `contact`, `gender`) VALUES
(1, 'Narayan Patil', 'Cardiologist', 21, 1234567890, 'M'),
(2, 'Deepak B', 'Neurologists', 20, 1234568763, 'M'),
(3, 'Omkar Kallekar', 'Family Physicians', 22, 1234597654, 'M'),
(4, 'Athar Ansari', 'Pathologists', 21, 657943205, 'M'),
(5, 'Gouri Rane', 'General Surgeons', 20, 657423158, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `nurse_id` int(11) NOT NULL,
  `nurse_name` varchar(20) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `room_no` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`nurse_id`, `nurse_name`, `contact`, `address`, `room_no`, `doctor_id`) VALUES
(111, 'Arya', 254697631, 'Khanapur', 321, 4),
(112, 'Rio', 657894321, 'Belgaum', 333, 1);

-- --------------------------------------------------------

--
-- Table structure for table `out_patient`
--

CREATE TABLE `out_patient` (
  `patient_id` int(11) NOT NULL,
  `out_date` date DEFAULT NULL,
  `bill_status` varchar(10) DEFAULT NULL,
  `amount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `out_patient`
--

INSERT INTO `out_patient` (`patient_id`, `out_date`, `bill_status`, `amount`) VALUES
(5, '2023-01-03', 'Paid', 300);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `full_name` varchar(30) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `disease` varchar(30) DEFAULT NULL,
  `phone` bigint(10) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `full_name`, `age`, `gender`, `address`, `disease`, `phone`, `doctor_id`) VALUES
(0, 'helloo', 654, 'M', 'idk', 'diseaseas', 1234567890, NULL),
(1, 'hell', 14, 'F', 'addrsda', 'diseaseas', 369852147, 3),
(2, 'Monkey D. Luffy', 19, 'M', 'East blue', 'No Swimming', 0, 3),
(3, 'Zorro', 21, 'M', 'Shimotsuki Village', 'No direction', 0, 3),
(4, 'please work yy', 5, 'F', 'addrsda', 'iddkkk', 1234567890, 5),
(5, 'Mob Psycho', 20, 'M', 'Hidden city', 'Psycho', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_no` int(11) NOT NULL,
  `room_type` varchar(15) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_no`, `room_type`, `status`, `price`, `patient_id`) VALUES
(321, 'Oxygen room', 'Occupied', 350, 1),
(333, 'ICU', 'Empty', 444, NULL),
(335, 'Emergency ', 'Occupied', 666, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD KEY `room_no` (`room_no`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_no`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`nurse_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `out_patient`
--
ALTER TABLE `out_patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_no`),
  ADD KEY `patient_id` (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administration`
--
ALTER TABLE `administration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admission`
--
ALTER TABLE `admission`
  ADD CONSTRAINT `admission_ibfk_1` FOREIGN KEY (`room_no`) REFERENCES `room` (`room_no`) ON DELETE CASCADE;

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`) ON DELETE CASCADE;

--
-- Constraints for table `nurse`
--
ALTER TABLE `nurse`
  ADD CONSTRAINT `nurse_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE CASCADE;

--
-- Constraints for table `out_patient`
--
ALTER TABLE `out_patient`
  ADD CONSTRAINT `out_patient_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
