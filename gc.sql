-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 09:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gc`
--

-- --------------------------------------------------------

--
-- Table structure for table `available_class`
--

CREATE TABLE `available_class` (
  `lectureID` int(11) NOT NULL,
  `classID` varchar(20) NOT NULL,
  `timeID` varchar(20) NOT NULL,
  `dayID` int(10) NOT NULL,
  `facultyID` varchar(20) NOT NULL,
  `subjectCode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `available_class`
--

INSERT INTO `available_class` (`lectureID`, `classID`, `timeID`, `dayID`, `facultyID`, `subjectCode`) VALUES
(1, 'A201', 't1', 1, '22F301', '2CP01'),
(2, 'A202', 't1', 1, '22F303', '2CP04'),
(3, 'A201', 't2', 4, '22F301', '2CP01'),
(4, 'A203', 't2', 4, '22F303', '2CP04'),
(5, 'A202', 't1', 6, '22F303', '2CP04'),
(6, 'A204', 't1', 6, '22F303', '2CP01'),
(7, 'A202', 't1', 2, '22F303', '2CP04'),
(8, 'A202', 't1', 7, '22F303', '2CP04'),
(9, 'A201', 't1', 4, '22F303', '2CP04'),
(11, 'A201', 't2', 3, '22F301', '2CP01'),
(12, 'A201', 't1', 5, '22F301', '2CP01');

-- --------------------------------------------------------

--
-- Table structure for table `class_info`
--

CREATE TABLE `class_info` (
  `classID` varchar(20) NOT NULL,
  `strength` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_info`
--

INSERT INTO `class_info` (`classID`, `strength`) VALUES
('A201', 50),
('A202', 60),
('A203', 70),
('A204', 100);

-- --------------------------------------------------------

--
-- Table structure for table `day_of_class`
--

CREATE TABLE `day_of_class` (
  `dayID` int(10) NOT NULL,
  `day` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `day_of_class`
--

INSERT INTO `day_of_class` (`dayID`, `day`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday'),
(7, 'Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `facultyID` varchar(20) NOT NULL,
  `userID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`facultyID`, `userID`) VALUES
('22F301', 'mayurvegad12'),
('22F303', 'narendrapatel12');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_subject`
--

CREATE TABLE `faculty_subject` (
  `facultyID` varchar(20) NOT NULL,
  `subjectCode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_subject`
--

INSERT INTO `faculty_subject` (`facultyID`, `subjectCode`) VALUES
('22F301', '2CP01'),
('22F303', '2CP04');

-- --------------------------------------------------------

--
-- Table structure for table `stud`
--

CREATE TABLE `stud` (
  `studentID` varchar(20) NOT NULL,
  `userID` varchar(20) NOT NULL,
  `fatherName` varchar(20) NOT NULL,
  `motherName` varchar(20) NOT NULL,
  `semester` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stud`
--

INSERT INTO `stud` (`studentID`, `userID`, `fatherName`, `motherName`, `semester`) VALUES
('22CP316', 'kushtolia2003', 'Bhaveshbhai', 'Amitaben', 6);

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `studentID` varchar(20) NOT NULL,
  `lectureID` int(11) NOT NULL,
  `attendance` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `study_material`
--

CREATE TABLE `study_material` (
  `sno` int(20) NOT NULL,
  `subjectCode` varchar(20) NOT NULL,
  `userID` varchar(20) NOT NULL,
  `unitNo` int(20) NOT NULL,
  `unitName` varchar(20) NOT NULL,
  `author` varchar(20) NOT NULL,
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `study_material`
--

INSERT INTO `study_material` (`sno`, `subjectCode`, `userID`, `unitNo`, `unitName`, `author`, `path`) VALUES
(4, '2CP01', 'mayurvegad12', 4, 'Permutation', 'Roason', 'PDF Placement_2022-23.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `subject_details`
--

CREATE TABLE `subject_details` (
  `facultyID` varchar(20) DEFAULT NULL,
  `subjectCode` varchar(20) NOT NULL,
  `subjectName` text NOT NULL,
  `branch` varchar(20) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_details`
--

INSERT INTO `subject_details` (`facultyID`, `subjectCode`, `subjectName`, `branch`, `semester`) VALUES
('22F301', '2CP01', 'Discrete Mathematics', 'computer', 3),
('22F303', '2CP04', 'Computer Organization And Architecture', 'computer', 4);

-- --------------------------------------------------------

--
-- Table structure for table `time_of_class`
--

CREATE TABLE `time_of_class` (
  `timeID` varchar(20) NOT NULL,
  `start_time` time(6) NOT NULL,
  `end_time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time_of_class`
--

INSERT INTO `time_of_class` (`timeID`, `start_time`, `end_time`) VALUES
('t1', '10:30:00.000000', '11:30:00.000000'),
('t2', '11:30:00.000000', '12:30:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` varchar(20) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `fullName` varchar(40) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `pinCode` int(20) NOT NULL,
  `img_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `fullName`, `branch`, `email`, `password`, `gender`, `role`, `phoneNumber`, `dob`, `address`, `pinCode`, `img_url`) VALUES
('admin1', 'Gyandeep', 'Class', 'Gyandeep Class', '', 'kushtolia6767@gmail.com', '11', 'male', 'admin', '8758174630', '2003-10-18', 'Galaria Complex, Jamnagar', 361008, 'gc.jpg'),
('kushtolia2003', 'Kush', 'Tolia', 'Kush Tolia', 'Computer Engineering', 'kushtolia6767@gmail.com', '11', 'male', 'student', '8758174630', '1970-01-01', 'Patel Colony, Jamnagar', 361008, 'IMG-646f1ac3e4acf4.21973707.jpg'),
('mayurvegad12', 'Dr. Mayur', 'Vegad', 'Dr. Mayur Vegad', 'Computer Engineering', 'mayurvegad12@gmail.com', '12', 'male', 'faculty', '872359101', '1970-01-01', 'Moti Taki Chowk, Rajkot', 785002, 'IMG-64705af95c3ee0.70597164.jpg'),
('narendrapatel12', 'Narendra', 'Patel', 'Narendra Patel', 'Computer Engineering', 'narendrapatterl12@gmail.com', '12', 'male', 'faculty', '9842145677', '1991-07-02', 'VVNagar', 361008, 'nmp_sir.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `available_class`
--
ALTER TABLE `available_class`
  ADD PRIMARY KEY (`lectureID`),
  ADD KEY `classID` (`classID`),
  ADD KEY `dayID` (`dayID`),
  ADD KEY `timeID` (`timeID`),
  ADD KEY `facultyID` (`facultyID`),
  ADD KEY `available_class_ibfk_4` (`subjectCode`);

--
-- Indexes for table `class_info`
--
ALTER TABLE `class_info`
  ADD PRIMARY KEY (`classID`);

--
-- Indexes for table `day_of_class`
--
ALTER TABLE `day_of_class`
  ADD PRIMARY KEY (`dayID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`facultyID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `faculty_subject`
--
ALTER TABLE `faculty_subject`
  ADD PRIMARY KEY (`facultyID`,`subjectCode`),
  ADD KEY `subjectCode` (`subjectCode`);

--
-- Indexes for table `stud`
--
ALTER TABLE `stud`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD KEY `studentID` (`studentID`),
  ADD KEY `lectureID` (`lectureID`);

--
-- Indexes for table `study_material`
--
ALTER TABLE `study_material`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `subjectCode` (`subjectCode`),
  ADD KEY `study_material_ibfk_2` (`userID`);

--
-- Indexes for table `subject_details`
--
ALTER TABLE `subject_details`
  ADD PRIMARY KEY (`subjectCode`),
  ADD KEY `facultyID` (`facultyID`);

--
-- Indexes for table `time_of_class`
--
ALTER TABLE `time_of_class`
  ADD PRIMARY KEY (`timeID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `available_class`
--
ALTER TABLE `available_class`
  MODIFY `lectureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `study_material`
--
ALTER TABLE `study_material`
  MODIFY `sno` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `available_class`
--
ALTER TABLE `available_class`
  ADD CONSTRAINT `available_class_ibfk_1` FOREIGN KEY (`classID`) REFERENCES `class_info` (`classID`),
  ADD CONSTRAINT `available_class_ibfk_2` FOREIGN KEY (`dayID`) REFERENCES `day_of_class` (`dayID`),
  ADD CONSTRAINT `available_class_ibfk_3` FOREIGN KEY (`timeID`) REFERENCES `time_of_class` (`timeID`),
  ADD CONSTRAINT `available_class_ibfk_4` FOREIGN KEY (`subjectCode`) REFERENCES `subject_details` (`subjectCode`),
  ADD CONSTRAINT `available_class_ibfk_5` FOREIGN KEY (`facultyID`) REFERENCES `faculty` (`facultyID`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `faculty_subject`
--
ALTER TABLE `faculty_subject`
  ADD CONSTRAINT `faculty_subject_ibfk_1` FOREIGN KEY (`facultyID`) REFERENCES `faculty` (`facultyID`),
  ADD CONSTRAINT `faculty_subject_ibfk_2` FOREIGN KEY (`subjectCode`) REFERENCES `subject_details` (`subjectCode`);

--
-- Constraints for table `stud`
--
ALTER TABLE `stud`
  ADD CONSTRAINT `stud_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD CONSTRAINT `student_attendance_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `stud` (`studentID`),
  ADD CONSTRAINT `student_attendance_ibfk_3` FOREIGN KEY (`lectureID`) REFERENCES `available_class` (`lectureID`);

--
-- Constraints for table `study_material`
--
ALTER TABLE `study_material`
  ADD CONSTRAINT `study_material_ibfk_1` FOREIGN KEY (`subjectCode`) REFERENCES `subject_details` (`subjectCode`),
  ADD CONSTRAINT `study_material_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `subject_details`
--
ALTER TABLE `subject_details`
  ADD CONSTRAINT `subject_details_ibfk_1` FOREIGN KEY (`facultyID`) REFERENCES `faculty` (`facultyID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
