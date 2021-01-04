-- phpMyAdmin SQL Dump
-- version 5.0.3-dev
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 04, 2021 at 04:23 AM
-- Server version: 8.0.22
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int NOT NULL,
  `classname` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `classname`, `created_at`) VALUES
(10, 'IX', '2021-01-04 03:16:38'),
(11, 'X', '2021-01-04 03:16:42'),
(12, 'XII', '2021-01-04 03:16:46');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `description`, `created_at`) VALUES
(1, 'Ini adalah sejarah SMK Yapin 02 Setu...', '2020-12-13 09:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `name` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`) VALUES
(1, 'admin', 'Admin', '2020-11-16 06:15:00'),
(2, 'teacher', 'Guru', '2020-11-16 06:15:00'),
(3, 'student', 'Murid', '2020-11-16 06:15:14');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int NOT NULL,
  `subclass_id` int NOT NULL,
  `start_time` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `end_time` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `day` tinyint(1) NOT NULL,
  `created-at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `subclass_id`, `start_time`, `end_time`, `day`, `created-at`) VALUES
(1, 153, '07:00', '08:30', 1, '2021-01-04 03:30:50'),
(2, 154, '07:30', '08:30', 2, '2021-01-04 03:31:08'),
(3, 157, '08:00', '09:30', 3, '2021-01-04 03:31:21'),
(4, 159, '09:00', '10:00', 6, '2021-01-04 03:58:30'),
(5, 160, '10:00', '12:00', 6, '2021-01-04 03:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int NOT NULL,
  `semester_name` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `semester_name`, `created_at`) VALUES
(2, 'Semester 2', '2020-11-21 13:38:25'),
(8, 'Semester 1', '2020-11-30 17:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `nis` int DEFAULT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `birth_place` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `gender` enum('Laki - Laki','Perempuan') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(14) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `major` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `class_id` int NOT NULL,
  `semester_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `nis`, `name`, `birth_place`, `birth_date`, `gender`, `address`, `phone`, `email`, `major`, `class_id`, `semester_id`, `user_id`, `created_at`) VALUES
(10, 123, 'Atun', 'Bekasi', '1999-01-01', 'Perempuan', 'Bekasi', '0981-9829-3182', 'atun@gmail.com', '', 10, 8, 19, '2021-01-04 03:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `student_values`
--

CREATE TABLE `student_values` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `subclass_id` int NOT NULL,
  `task` int NOT NULL,
  `midtest` int NOT NULL,
  `endtest` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_values`
--

INSERT INTO `student_values` (`id`, `student_id`, `subclass_id`, `task`, `midtest`, `endtest`, `created_at`) VALUES
(19, 10, 161, 90, 90, 80, '2021-01-04 03:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `subclass`
--

CREATE TABLE `subclass` (
  `id` int NOT NULL,
  `class_id` int NOT NULL,
  `semester_id` int NOT NULL,
  `subject_id` int NOT NULL,
  `year` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subclass`
--

INSERT INTO `subclass` (`id`, `class_id`, `semester_id`, `subject_id`, `year`, `created_at`) VALUES
(153, 10, 8, 13, 2021, '2021-01-04 03:29:15'),
(154, 10, 8, 14, 2021, '2021-01-04 03:29:16'),
(155, 10, 8, 15, 2021, '2021-01-04 03:29:18'),
(156, 10, 2, 13, 2021, '2021-01-04 03:29:20'),
(157, 10, 2, 14, 2021, '2021-01-04 03:29:22'),
(158, 10, 2, 15, 2021, '2021-01-04 03:29:23'),
(159, 10, 8, 16, 2021, '2021-01-04 03:54:34'),
(160, 10, 2, 16, 2021, '2021-01-04 03:54:43'),
(161, 11, 8, 13, 2021, '2021-01-04 03:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int NOT NULL,
  `subject_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `created_at`) VALUES
(13, 'Matematika', '2021-01-04 03:16:56'),
(14, 'Bahasa Indonesia', '2021-01-04 03:17:05'),
(15, 'IPA', '2021-01-04 03:17:14'),
(16, 'IPS', '2021-01-04 03:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `subteachers`
--

CREATE TABLE `subteachers` (
  `id` int NOT NULL,
  `subclass_id` int NOT NULL,
  `teacher_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subteachers`
--

INSERT INTO `subteachers` (`id`, `subclass_id`, `teacher_id`, `created_at`) VALUES
(54, 153, 10, '2021-01-04 03:30:11'),
(55, 154, 11, '2021-01-04 03:30:27'),
(56, 155, 11, '2021-01-04 03:30:30'),
(57, 156, 11, '2021-01-04 03:30:32'),
(58, 157, 10, '2021-01-04 03:30:35'),
(59, 158, 10, '2021-01-04 03:30:38'),
(60, 159, 11, '2021-01-04 03:55:07'),
(61, 160, 10, '2021-01-04 03:55:09'),
(62, 161, 11, '2021-01-04 03:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int NOT NULL,
  `nip` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `birth_place` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `gender` enum('Laki - Laki','Perempuan') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(14) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `education` enum('S1','S2','S3') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `major` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Lajang','Menikah') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `work_status` enum('PNS','Honorer') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `nip`, `name`, `birth_place`, `birth_date`, `gender`, `address`, `phone`, `email`, `education`, `major`, `status`, `work_status`, `user_id`, `created_at`) VALUES
(10, '123', 'Atun', 'Bekasi', '1999-01-07', 'Laki - Laki', 'Bekasi', '0896-8777-7777', 'atun_guru@gmail.com', 'S1', 'Teknik Informatika', 'Lajang', 'Honorer', 17, '2021-01-04 03:17:57'),
(11, '1234', 'Arman', 'Bekasi', '1999-01-01', 'Laki - Laki', 'Bekasi', '0999-9999-9999', 'arman_guru@gmail.com', 'S1', 'TI', 'Menikah', 'PNS', 18, '2021-01-04 03:30:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role` int NOT NULL,
  `token` varchar(62) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `token_password` varchar(62) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `token`, `token_password`, `is_verified`, `created_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$spDBjwixY6YbiJ2SZOXZKuXjURsZx8l4a/kDhS0y9uJgCymtRhTei', 1, '', '', 1, '2020-11-16 06:14:13'),
(16, 'Arman', 'arman@gmail.com', '$2y$10$QhSr2w4D4SlKVIwXOKsjx.p0LycV2U5OfV7Yh6h1PaqRA9ABR20Om', 3, '', '', 1, '2020-12-21 17:33:15'),
(17, 'Atun', 'atun_guru@gmail.com', '$2y$10$g7pk1DYv8bpqkrPwAez9velW7RwzQLtwRKNos/sdxTiZJv0M0FlMe', 2, '', '', 1, '2021-01-04 03:17:57'),
(18, 'Arman', 'arman_guru@gmail.com', '$2y$10$epvBsd6e/LELwy0VCmTcVu9tAhQtGiYcDEavTHOg/8tU/cDIm7uuW', 2, '', '', 1, '2021-01-04 03:30:05'),
(19, 'Atun', 'atun@gmail.com', '$2y$10$klM0pQkxYfzhds08WyB0y.MHuQFw65cM94VCiYu5A1FpQDpZEt/5u', 3, '', '', 1, '2021-01-04 03:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `vision_mission`
--

CREATE TABLE `vision_mission` (
  `id` int NOT NULL,
  `vision` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mission` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vision_mission`
--

INSERT INTO `vision_mission` (`id`, `vision`, `mission`, `created_at`) VALUES
(1, 'Visi SMK Yapin 02 Setu...', 'Misi SMK Yapin 02 Setu...', '2020-12-12 08:13:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`,`semester_id`,`user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `semester_id` (`semester_id`);

--
-- Indexes for table `student_values`
--
ALTER TABLE `student_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`,`subclass_id`),
  ADD KEY `subclass_id` (`subclass_id`);

--
-- Indexes for table `subclass`
--
ALTER TABLE `subclass`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`) USING BTREE,
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `semester_id` (`semester_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subteachers`
--
ALTER TABLE `subteachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subclass_id` (`subclass_id`) USING BTREE,
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `vision_mission`
--
ALTER TABLE `vision_mission`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_values`
--
ALTER TABLE `student_values`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subclass`
--
ALTER TABLE `subclass`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subteachers`
--
ALTER TABLE `subteachers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `vision_mission`
--
ALTER TABLE `vision_mission`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_values`
--
ALTER TABLE `student_values`
  ADD CONSTRAINT `student_values_ibfk_1` FOREIGN KEY (`subclass_id`) REFERENCES `subclass` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_values_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subclass`
--
ALTER TABLE `subclass`
  ADD CONSTRAINT `subclass_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subclass_ibfk_2` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subclass_ibfk_3` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subteachers`
--
ALTER TABLE `subteachers`
  ADD CONSTRAINT `subteachers_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subteachers_ibfk_2` FOREIGN KEY (`subclass_id`) REFERENCES `subclass` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
