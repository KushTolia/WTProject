-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2023 at 01:54 PM
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
(12, 'A201', 't1', 5, '22F301', '2CP01'),
(14, 'A201', 't2', 7, '22F301', '2CP01');

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
-- Table structure for table `quiz_details`
--

CREATE TABLE `quiz_details` (
  `quizID` int(11) NOT NULL,
  `subjectCode` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `description` text DEFAULT NULL,
  `number_of_questions` int(11) NOT NULL,
  `start_time` time(6) NOT NULL,
  `end_time` time(6) NOT NULL,
  `total_marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_details`
--

INSERT INTO `quiz_details` (`quizID`, `subjectCode`, `date`, `description`, `number_of_questions`, `start_time`, `end_time`, `total_marks`) VALUES
(3, '2CP04', '2023-06-28', 'Unit: 1(Introduction To 8085)', 2, '09:10:00.000000', '14:22:00.000000', 2),
(5, '2CP04', '2023-06-28', 'Unit :1', 2, '10:34:00.000000', '14:25:00.000000', 10),
(6, '2CP04', '2023-06-29', 'My Third Quiz', 1, '10:03:00.000000', '10:05:00.000000', 10),
(7, '2CP04', '2023-06-29', 'Unit :1', 2, '15:05:00.000000', '15:07:00.000000', 10),
(12, '2CP04', '2023-06-29', 'Test', 2, '15:45:00.000000', '15:49:00.000000', 2);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `quizID` int(11) NOT NULL,
  `sno` int(11) NOT NULL,
  `question` text NOT NULL,
  `marks` int(11) NOT NULL,
  `option1` text NOT NULL,
  `option2` text NOT NULL,
  `option3` text NOT NULL,
  `option4` text NOT NULL,
  `correct_answer` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`quizID`, `sno`, `question`, `marks`, `option1`, `option2`, `option3`, `option4`, `correct_answer`) VALUES
(3, 1, 'What is the size of 8085 microprocessor?(in bits)', 1, '8', '16', '32', '64', 'Option 1'),
(3, 2, 'How many addresses are available in 8085?', 1, '64 KB', '32 KB', '1 MB', '4 KB', 'Option 1'),
(5, 0, 'Hello Bvm', 5, 'bvm', 'a', 'b', 'c', 'Option 1'),
(5, 1, 'hello gcet', 5, 'a', 'b', 'c', 'gcet', 'Option 4'),
(6, 0, 'Hello BVM! Find Name Of The Collage', 10, 'GCET', 'BVM', 'aa', 'bb', 'Option 2'),
(7, 0, 'Demo Quiz', 5, 'a', 'bb', 'bvm', 'd', 'Option 3'),
(7, 1, 'Hello Gcet', 5, 'GCET', 'b', 'DDIT', 'kush', 'Option 4'),
(12, 1, 'Hello', 1, 'a', 'b', 'c', 'd', 'Option 1'),
(12, 2, 'Friends', 1, 's', 'a', 'h', 'o', 'Option 2');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_result`
--

CREATE TABLE `quiz_result` (
  `quizID` int(11) NOT NULL,
  `studentID` varchar(20) NOT NULL,
  `total_marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_result`
--

INSERT INTO `quiz_result` (`quizID`, `studentID`, `total_marks`) VALUES
(3, '22CP316', 2),
(6, '22CP316', 0),
(7, '22CP316', 5),
(12, '22CP301', 1),
(12, '22CP316', 2);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_stud_answer`
--

CREATE TABLE `quiz_stud_answer` (
  `quizID` int(11) NOT NULL,
  `sno` int(11) NOT NULL,
  `studentID` varchar(20) NOT NULL,
  `attempted_answer` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_stud_answer`
--

INSERT INTO `quiz_stud_answer` (`quizID`, `sno`, `studentID`, `attempted_answer`) VALUES
(3, 1, '22CP316', 'Option 1'),
(3, 2, '22CP316', 'Option 1'),
(6, 0, '22CP316', 'Not Attempted'),
(7, 0, '22CP316', 'Option 3'),
(7, 1, '22CP316', 'Option 3'),
(12, 1, '22CP301', 'Option 1'),
(12, 1, '22CP316', 'Option 1'),
(12, 2, '22CP301', 'Option 4'),
(12, 2, '22CP316', 'Option 2');

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
('22CP301', 'sahilpathan12', 'Ramesh Bhai', 'Nayana Ben', 4),
('22CP316', 'kushtolia2003', 'Bhaveshbhai', 'Amitaben', 4);

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
(4, '2CP01', 'mayurvegad12', 4, 'Permutation', 'Roason', 'PDF Placement_2022-23.pdf'),
(8, '2CP04', 'mayurvegad12', 10, 'Interrupts', 'NMP Sir', 'DOCX plan.docx');

-- --------------------------------------------------------

--
-- Table structure for table `stud_attendance`
--

CREATE TABLE `stud_attendance` (
  `attendanceID` int(11) NOT NULL,
  `studentID` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stud_attendance`
--

INSERT INTO `stud_attendance` (`attendanceID`, `studentID`, `status`) VALUES
(1, '22CP316', 'absent'),
(2, '22CP316', 'present'),
(3, '22CP316', 'present'),
(6, '22CP316', 'present'),
(7, '22CP316', 'present'),
(8, '22CP316', 'absent'),
(26, '22CP301', 'absent'),
(26, '22CP316', 'present'),
(30, '22CP301', 'present'),
(30, '22CP316', 'present'),
(31, '22CP301', 'absent'),
(31, '22CP316', 'absent'),
(33, '22CP301', 'present'),
(33, '22CP316', 'absent');

-- --------------------------------------------------------

--
-- Table structure for table `stud_attendance_detail`
--

CREATE TABLE `stud_attendance_detail` (
  `attendanceID` int(11) NOT NULL,
  `lectureID` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stud_attendance_detail`
--

INSERT INTO `stud_attendance_detail` (`attendanceID`, `lectureID`, `date`) VALUES
(1, 1, '2023-06-13'),
(2, 1, '2023-06-16'),
(3, 2, '2023-06-17'),
(6, 2, '2023-06-18'),
(7, 2, '2023-06-19'),
(8, 4, '2023-06-19'),
(26, 4, '2023-06-21'),
(30, 4, '2023-06-22'),
(31, 4, '2023-06-29'),
(32, 1, '2023-06-29'),
(33, 2, '2023-06-29');

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
('narendrapatel12', 'Narendra', 'Patel', 'Narendra Patel', 'Computer Engineering', 'narendrapatterl12@gmail.com', '12', 'male', 'faculty', '9842145677', '1991-07-02', 'VVNagar', 361008, 'nmp_sir.jpg'),
('sahilpathan12', 'Sahil', 'Pathan', 'Sahil Pathan', 'Computer Engineering', 'sahilpathan12@gmail.com', 'qw', 'male', 'student', '9825217925', '1991-01-01', 'Iskon Mandir,Anand', 321558, 'IMG-649198577f42e6.06284068.png');

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
-- Indexes for table `quiz_details`
--
ALTER TABLE `quiz_details`
  ADD PRIMARY KEY (`quizID`),
  ADD KEY `subjectCode` (`subjectCode`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`quizID`,`sno`);

--
-- Indexes for table `quiz_result`
--
ALTER TABLE `quiz_result`
  ADD PRIMARY KEY (`quizID`,`studentID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `quiz_stud_answer`
--
ALTER TABLE `quiz_stud_answer`
  ADD PRIMARY KEY (`quizID`,`sno`,`studentID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `stud`
--
ALTER TABLE `stud`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `study_material`
--
ALTER TABLE `study_material`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `subjectCode` (`subjectCode`),
  ADD KEY `study_material_ibfk_2` (`userID`);

--
-- Indexes for table `stud_attendance`
--
ALTER TABLE `stud_attendance`
  ADD PRIMARY KEY (`attendanceID`,`studentID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `stud_attendance_detail`
--
ALTER TABLE `stud_attendance_detail`
  ADD PRIMARY KEY (`attendanceID`),
  ADD KEY `lectureID` (`lectureID`);

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
  MODIFY `lectureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `quiz_details`
--
ALTER TABLE `quiz_details`
  MODIFY `quizID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `study_material`
--
ALTER TABLE `study_material`
  MODIFY `sno` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stud_attendance_detail`
--
ALTER TABLE `stud_attendance_detail`
  MODIFY `attendanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
-- Constraints for table `quiz_details`
--
ALTER TABLE `quiz_details`
  ADD CONSTRAINT `quiz_details_ibfk_1` FOREIGN KEY (`subjectCode`) REFERENCES `subject_details` (`subjectCode`);

--
-- Constraints for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD CONSTRAINT `quiz_questions_ibfk_1` FOREIGN KEY (`quizID`) REFERENCES `quiz_details` (`quizID`);

--
-- Constraints for table `quiz_result`
--
ALTER TABLE `quiz_result`
  ADD CONSTRAINT `quiz_result_ibfk_1` FOREIGN KEY (`quizID`) REFERENCES `quiz_details` (`quizID`),
  ADD CONSTRAINT `quiz_result_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `stud` (`studentID`);

--
-- Constraints for table `quiz_stud_answer`
--
ALTER TABLE `quiz_stud_answer`
  ADD CONSTRAINT `quiz_stud_answer_ibfk_1` FOREIGN KEY (`quizID`,`sno`) REFERENCES `quiz_questions` (`quizID`, `sno`),
  ADD CONSTRAINT `quiz_stud_answer_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `stud` (`studentID`);

--
-- Constraints for table `stud`
--
ALTER TABLE `stud`
  ADD CONSTRAINT `stud_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `study_material`
--
ALTER TABLE `study_material`
  ADD CONSTRAINT `study_material_ibfk_1` FOREIGN KEY (`subjectCode`) REFERENCES `subject_details` (`subjectCode`),
  ADD CONSTRAINT `study_material_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `stud_attendance`
--
ALTER TABLE `stud_attendance`
  ADD CONSTRAINT `stud_attendance_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `stud` (`studentID`),
  ADD CONSTRAINT `stud_attendance_ibfk_3` FOREIGN KEY (`attendanceID`) REFERENCES `stud_attendance_detail` (`attendanceID`);

--
-- Constraints for table `stud_attendance_detail`
--
ALTER TABLE `stud_attendance_detail`
  ADD CONSTRAINT `stud_attendance_detail_ibfk_1` FOREIGN KEY (`lectureID`) REFERENCES `available_class` (`lectureID`);

--
-- Constraints for table `subject_details`
--
ALTER TABLE `subject_details`
  ADD CONSTRAINT `subject_details_ibfk_1` FOREIGN KEY (`facultyID`) REFERENCES `faculty` (`facultyID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
