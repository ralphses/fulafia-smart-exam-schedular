-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 09:20 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fulafia-smart-exam-schedular`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--


CREATE DATABASE `fulafia-smart-exam-schedular`;

USE `fulafia-smart-exam-schedular`;

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `assigned` tinyint(1) NOT NULL DEFAULT 0,
  `general` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `department_id`, `title`, `code`, `level`, `semester`, `unit`, `active`, `assigned`, `general`, `created_at`, `updated_at`) VALUES
(1, 1, 'General Mathematics I', 'MTH111', '200', 'first', 3, 1, 0, 0, '2023-02-14 16:10:11', '2023-02-14 16:10:11'),
(2, 1, 'General Mathematics II', 'MTH121', '200', 'first', 3, 1, 0, 0, '2023-02-14 16:10:37', '2023-02-14 16:10:37'),
(3, 1, 'Linear Algebra', 'MTH213', '200', 'first', 3, 1, 0, 0, '2023-02-14 16:11:06', '2023-02-14 16:11:06'),
(4, 1, 'Use of English I', 'GST111', '100', 'first', 2, 1, 0, 1, '2023-02-14 16:11:42', '2023-02-14 16:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `course_student`
--

CREATE TABLE `course_student` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_student`
--

INSERT INTO `course_student` (`id`, `student_id`, `course_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 1),
(6, 2, 2),
(7, 2, 4),
(8, 3, 1),
(9, 3, 2),
(10, 3, 3),
(11, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `faculty_id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Computer Science', 1, '2023-02-14 16:09:42', '2023-02-14 16:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time_slot_id` bigint(20) UNSIGNED NOT NULL,
  `exam_day_id` bigint(20) UNSIGNED NOT NULL,
  `students` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `time_slot_id`, `exam_day_id`, `students`, `created_at`, `updated_at`) VALUES
(9, 1, 5, '1|2|3', '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(10, 2, 5, '1|2|3', '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(11, 3, 5, '1|2|3', '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(12, 1, 6, '1|3', '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(13, 1, 7, '1|2|3', '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(14, 2, 7, '1|2|3', '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(15, 3, 7, '1|3', '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(16, 1, 8, '1|2|3', '2023-02-17 00:23:07', '2023-02-17 00:23:07'),
(17, 2, 8, '1|2|3', '2023-02-17 00:23:07', '2023-02-17 00:23:07'),
(18, 3, 8, '1|2|3', '2023-02-17 00:23:07', '2023-02-17 00:23:07'),
(19, 1, 9, '1|3', '2023-02-17 00:23:07', '2023-02-17 00:23:07'),
(20, 1, 10, '1|2|3', '2023-02-17 01:43:18', '2023-02-17 01:43:18'),
(21, 2, 10, '1|2|3', '2023-02-17 01:43:18', '2023-02-17 01:43:18'),
(22, 3, 10, '1|2|3', '2023-02-17 01:43:18', '2023-02-17 01:43:18'),
(23, 1, 11, '1|3', '2023-02-17 01:43:18', '2023-02-17 01:43:18'),
(24, 1, 12, '1|2|3', '2023-02-17 01:47:28', '2023-02-17 01:47:28'),
(25, 3, 12, '1|3', '2023-02-17 01:47:28', '2023-02-17 01:47:28'),
(26, 1, 13, '1|2|3', '2023-02-17 01:47:28', '2023-02-17 01:47:28'),
(27, 3, 13, '1|2|3', '2023-02-17 01:47:28', '2023-02-17 01:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `exam_centers`
--

CREATE TABLE `exam_centers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(10) UNSIGNED NOT NULL,
  `free_space` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_centers`
--

INSERT INTO `exam_centers` (`id`, `code`, `name`, `capacity`, `free_space`, `active`, `school_id`, `created_at`, `updated_at`) VALUES
(1, 'AUD(PS)', '500 Seater Lecture Theater', 2, 0, 1, 1, '2023-02-14 16:12:21', '2023-02-14 16:12:21'),
(2, 'AUD(TS)', '200 Seater Lecture Theater', 4, 0, 1, 1, '2023-02-14 16:12:48', '2023-02-14 16:12:48'),
(3, 'MPH FS', 'Faculty of Science Multipurpose Hall', 1, 0, 1, 1, '2023-02-14 16:13:06', '2023-02-14 16:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `exam_day`
--

CREATE TABLE `exam_day` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `week_day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_table_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_day`
--

INSERT INTO `exam_day` (`id`, `date`, `week_day`, `time_table_id`, `created_at`, `updated_at`) VALUES
(5, '2023-02-09', 'Thursday', 3, '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(6, '2023-02-10', 'Friday', 3, '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(7, '2023-02-25', 'Saturday', 4, '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(8, '2023-02-20', 'Monday', 5, '2023-02-17 00:23:07', '2023-02-17 00:23:07'),
(9, '2023-02-21', 'Tuesday', 5, '2023-02-17 00:23:07', '2023-02-17 00:23:07'),
(10, '2023-02-27', 'Monday', 6, '2023-02-17 01:43:18', '2023-02-17 01:43:18'),
(11, '2023-02-28', 'Tuesday', 6, '2023-02-17 01:43:18', '2023-02-17 01:43:18'),
(12, '2023-02-11', 'Saturday', 7, '2023-02-17 01:47:28', '2023-02-17 01:47:28'),
(13, '2023-02-13', 'Monday', 7, '2023-02-17 01:47:28', '2023-02-17 01:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `exam_units`
--

CREATE TABLE `exam_units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_center_id` bigint(20) UNSIGNED NOT NULL,
  `exams_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_units`
--

INSERT INTO `exam_units` (`id`, `exam_center_id`, `exams_id`, `created_at`, `updated_at`) VALUES
(15, 2, 9, '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(16, 3, 9, '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(17, 1, 9, '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(18, 2, 10, '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(19, 3, 10, '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(20, 1, 10, '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(21, 2, 11, '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(22, 3, 11, '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(23, 1, 11, '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(24, 1, 12, '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(25, 2, 13, '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(26, 3, 13, '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(27, 1, 13, '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(28, 2, 14, '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(29, 3, 14, '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(30, 1, 14, '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(31, 1, 15, '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(32, 2, 16, '2023-02-17 00:23:07', '2023-02-17 00:23:07'),
(33, 2, 17, '2023-02-17 00:23:07', '2023-02-17 00:23:07'),
(34, 2, 18, '2023-02-17 00:23:07', '2023-02-17 00:23:07'),
(35, 2, 19, '2023-02-17 00:23:07', '2023-02-17 00:23:07'),
(36, 2, 20, '2023-02-17 01:43:18', '2023-02-17 01:43:18'),
(37, 2, 21, '2023-02-17 01:43:18', '2023-02-17 01:43:18'),
(38, 2, 22, '2023-02-17 01:43:18', '2023-02-17 01:43:18'),
(39, 2, 23, '2023-02-17 01:43:18', '2023-02-17 01:43:18'),
(40, 2, 24, '2023-02-17 01:47:28', '2023-02-17 01:47:28'),
(41, 2, 25, '2023-02-17 01:47:28', '2023-02-17 01:47:28'),
(42, 2, 26, '2023-02-17 01:47:28', '2023-02-17 01:47:28'),
(43, 2, 27, '2023-02-17 01:47:28', '2023-02-17 01:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `exam_unit_schedules`
--

CREATE TABLE `exam_unit_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_units_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `students` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_unit_schedules`
--

INSERT INTO `exam_unit_schedules` (`id`, `exam_units_id`, `course_id`, `students`, `created_at`, `updated_at`) VALUES
(15, 15, 4, '4', '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(16, 16, 4, '4', '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(17, 17, 4, '4', '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(18, 18, 2, '2', '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(19, 19, 2, '2', '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(20, 20, 2, '2', '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(21, 21, 1, '1', '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(22, 22, 1, '1', '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(23, 23, 1, '1', '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(24, 24, 3, '3', '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(25, 25, 4, '4', '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(26, 26, 4, '4', '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(27, 27, 4, '4', '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(28, 28, 1, '1', '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(29, 29, 1, '1', '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(30, 30, 1, '1', '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(31, 31, 3, '3', '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(32, 32, 4, '4', '2023-02-17 00:23:07', '2023-02-17 00:23:07'),
(33, 33, 1, '1', '2023-02-17 00:23:07', '2023-02-17 00:23:07'),
(34, 34, 2, '2', '2023-02-17 00:23:07', '2023-02-17 00:23:07'),
(35, 35, 3, '3', '2023-02-17 00:23:07', '2023-02-17 00:23:07'),
(36, 36, 4, '4', '2023-02-17 01:43:18', '2023-02-17 01:43:18'),
(37, 37, 1, '1', '2023-02-17 01:43:18', '2023-02-17 01:43:18'),
(38, 38, 2, '2', '2023-02-17 01:43:18', '2023-02-17 01:43:18'),
(39, 39, 3, '3', '2023-02-17 01:43:18', '2023-02-17 01:43:18'),
(40, 40, 4, '4', '2023-02-17 01:47:28', '2023-02-17 01:47:28'),
(41, 41, 3, '3', '2023-02-17 01:47:28', '2023-02-17 01:47:28'),
(42, 42, 1, '1', '2023-02-17 01:47:28', '2023-02-17 01:47:28'),
(43, 43, 2, '2', '2023-02-17 01:47:28', '2023-02-17 01:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `school_id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Computing', 1, '2023-02-14 16:09:12', '2023-02-14 16:09:12'),
(2, 1, 'Science', 1, '2023-02-14 16:09:26', '2023-02-14 16:09:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '1_2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2_2023_01_10_201753_create_school_table', 2),
(6, '3_2023_01_11_220556_create_faculty_table', 3),
(7, '4_2023_01_12_013237_create_departments_table', 4),
(8, '5_2023_01_11_225357_create_courses_table', 5),
(9, '6_2023_01_12_000750_create_student_table', 6),
(10, '7_2023_01_15_210952_create_students_courses_table', 7),
(11, '8_2023_01_16_085117_create_time_slots_table', 8),
(12, '9_2023_01_16_201235_create_exam_centers_table', 9),
(13, '991_2023_01_16_235448_create_time_tables_table', 10),
(14, '2023_02_13_230643_create_sitting_schedulars_table', 11),
(15, '2023_02_13_230940_create_venue_sitting_schedulars_table', 11),
(16, '2023_02_13_231222_create_time_sitting_schedulars_table', 11),
(17, '992_2023_01_17_091125_create_exam_day_table', 12),
(18, '993_2023_01_17_091153_create_exams_table', 13),
(19, '994_2023_01_17_090839_create_exam_units_table', 14),
(20, '4000_2023_02_13_220454_create_exam_unit_schedules_table', 15),
(21, '2023_04_25_171022_create_student_sitting_schedules_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/media/avatars/avatar5.jpg',
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `user_id`, `name`, `email`, `website`, `address`, `logo`, `active`, `created_at`, `updated_at`) VALUES
(1, 2, 'Federal University of Lafia', NULL, NULL, NULL, '/media/avatars/avatar5.jpg', 1, '2023-02-14 16:04:45', '2023-02-14 16:04:45');

-- --------------------------------------------------------

--
-- Table structure for table `sitting_schedulars`
--

CREATE TABLE `sitting_schedulars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_tables_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sitting_schedulars`
--

INSERT INTO `sitting_schedulars` (`id`, `date`, `time_tables_id`, `created_at`, `updated_at`) VALUES
(5, '2023-Feb-09', 3, '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(6, '2023-Feb-10', 3, '2023-02-14 16:46:51', '2023-02-14 16:46:51'),
(7, '2023-Feb-25', 4, '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(8, '2023-Feb-20', 5, '2023-02-17 00:23:07', '2023-02-17 00:23:07'),
(9, '2023-Feb-21', 5, '2023-02-17 00:23:07', '2023-02-17 00:23:07'),
(10, '2023-Feb-27', 6, '2023-02-17 01:43:18', '2023-02-17 01:43:18'),
(11, '2023-Feb-28', 6, '2023-02-17 01:43:18', '2023-02-17 01:43:18'),
(12, '2023-Feb-11', 7, '2023-02-17 01:47:28', '2023-02-17 01:47:28'),
(13, '2023-Feb-13', 7, '2023-02-17 01:47:28', '2023-02-17 01:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matric` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fees` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `matric`, `email`, `level`, `fees`, `school_id`, `faculty_id`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'Raphael Eze', '2031800071', 'eze.raph21s@gmail.com', '600 Level', '2221112223332', 1, 1, 1, '2023-02-14 16:13:59', '2023-02-14 16:13:59'),
(2, 'Raphaelhhs', '2031800078', 'eze.raph21sssass@gmail.com', '700 Level', '2221112223338hh', 1, 1, 1, '2023-02-14 16:14:34', '2023-02-14 16:14:34'),
(3, 'Raphael Ezes', '2031800075', 'eze.raph21sss@gmail.com', '400 Level', '2221112223332s', 1, 1, 1, '2023-02-14 16:15:28', '2023-02-14 16:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `student_sitting_schedules`
--

CREATE TABLE `student_sitting_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `venue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_slot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_matric` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat_no` bigint(20) UNSIGNED DEFAULT NULL,
  `time_table_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_sitting_schedulars`
--

CREATE TABLE `time_sitting_schedulars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time_slot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `students` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `venue_sitting_schedular_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_sitting_schedulars`
--

INSERT INTO `time_sitting_schedulars` (`id`, `time_slot`, `students`, `venue_sitting_schedular_id`, `created_at`, `updated_at`) VALUES
(15, '09:00AM - 11:00AM', '3', 7, '2023-02-14 16:46:51', '2023-02-14 16:46:51'),
(16, '11:30AM - 1:30PM', '3', 7, '2023-02-14 16:46:51', '2023-02-14 16:46:51'),
(17, '2:00PM - 5:00PM', '3', 7, '2023-02-14 16:46:51', '2023-02-14 16:46:51'),
(18, '09:00AM - 11:00AM', '2', 8, '2023-02-14 16:46:51', '2023-02-14 16:46:51'),
(19, '11:30AM - 1:30PM', '2', 8, '2023-02-14 16:46:51', '2023-02-14 16:46:51'),
(20, '2:00PM - 5:00PM', '2', 8, '2023-02-14 16:46:51', '2023-02-14 16:46:51'),
(21, '09:00AM - 11:00AM', '1', 9, '2023-02-14 16:46:51', '2023-02-14 16:46:51'),
(22, '11:30AM - 1:30PM', '1', 9, '2023-02-14 16:46:51', '2023-02-14 16:46:51'),
(23, '2:00PM - 5:00PM', '1', 9, '2023-02-14 16:46:51', '2023-02-14 16:46:51'),
(24, '09:00AM - 11:00AM', '1|3', 10, '2023-02-14 16:46:51', '2023-02-14 16:46:51'),
(25, '09:00AM - 11:00AM', '3', 11, '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(26, '11:30AM - 1:30PM', '3', 11, '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(27, '09:00AM - 11:00AM', '2', 12, '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(28, '11:30AM - 1:30PM', '2', 12, '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(29, '09:00AM - 11:00AM', '1', 13, '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(30, '11:30AM - 1:30PM', '1', 13, '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(31, '2:00PM - 5:00PM', '1|3', 13, '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(32, '09:00AM - 11:00AM', '1|2|3', 14, '2023-02-17 00:23:07', '2023-02-17 00:23:07'),
(33, '11:30AM - 1:30PM', '1|2|3', 14, '2023-02-17 00:23:07', '2023-02-17 00:23:07'),
(34, '2:00PM - 5:00PM', '1|2|3', 14, '2023-02-17 00:23:07', '2023-02-17 00:23:07'),
(35, '09:00AM - 11:00AM', '1|3', 15, '2023-02-17 00:23:07', '2023-02-17 00:23:07'),
(36, '09:00AM - 11:00AM', '1|2|3', 16, '2023-02-17 01:43:18', '2023-02-17 01:43:18'),
(37, '11:30AM - 1:30PM', '1|2|3', 16, '2023-02-17 01:43:18', '2023-02-17 01:43:18'),
(38, '2:00PM - 5:00PM', '1|2|3', 16, '2023-02-17 01:43:18', '2023-02-17 01:43:18'),
(39, '09:00AM - 11:00AM', '1|3', 17, '2023-02-17 01:43:18', '2023-02-17 01:43:18'),
(40, '09:00AM - 11:00AM', '1|2|3', 18, '2023-02-17 01:47:28', '2023-02-17 01:47:28'),
(41, '2:00PM - 5:00PM', '1|3', 18, '2023-02-17 01:47:28', '2023-02-17 01:47:28'),
(42, '09:00AM - 11:00AM', '1|2|3', 19, '2023-02-17 01:47:28', '2023-02-17 01:47:28'),
(43, '2:00PM - 5:00PM', '1|2|3', 19, '2023-02-17 01:47:28', '2023-02-17 01:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `time_slots`
--

CREATE TABLE `time_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stop_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_slots`
--

INSERT INTO `time_slots` (`id`, `name`, `start_time`, `stop_time`, `duration`, `school_id`, `created_at`, `updated_at`) VALUES
(1, '09:00AM - 11:00AM', '09:00AM', '11:00AM', '2hours 0mins', 1, '2023-02-14 16:06:51', '2023-02-14 16:06:51'),
(2, '11:30AM - 1:30PM', '11:30AM', '1:30PM', '2hours 0mins', 1, '2023-02-14 16:07:34', '2023-02-14 16:07:34'),
(3, '2:00PM - 5:00PM', '2:00PM', '5:00PM', '3hours 0mins', 1, '2023-02-14 16:08:09', '2023-02-14 16:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `time_tables`
--

CREATE TABLE `time_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `stop_date` date NOT NULL,
  `exam_days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filePath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `planner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instructions` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_tables`
--

INSERT INTO `time_tables` (`id`, `start_date`, `stop_date`, `exam_days`, `session`, `semester`, `school_name`, `filePath`, `planner`, `instructions`, `school_id`, `created_at`, `updated_at`) VALUES
(3, '2023-02-09', '2023-02-17', 'Monday|Tuesday|Wednesday|Thursday|Friday|Saturday', '2021/2022', 'FIRST SEMESTER', 'Federal University of Lafia', NULL, 'Mr Adeleke', 'hh', 1, '2023-02-14 16:46:50', '2023-02-14 16:46:50'),
(4, '2023-02-25', '2023-02-25', 'Monday|Tuesday|Wednesday|Thursday|Friday|Saturday', '2021/2022', 'FIRST SEMESTER', 'Federal University of Lafia', NULL, 'offiver', 'hh|kk', 1, '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(5, '2023-02-19', '2023-02-24', 'Monday|Tuesday|Wednesday|Thursday|Friday|Saturday', '2021/2022', 'FIRST SEMESTER', 'Federal University of Lafia', NULL, 'Mr Adeleke', 'hh', 1, '2023-02-17 00:23:07', '2023-02-17 00:23:07'),
(6, '2023-02-26', '2023-03-04', 'Monday|Tuesday|Wednesday|Thursday|Friday|Saturday', '2021/2022', 'SECOND SEMESTER', 'Federal University of Lafia', NULL, 'Mr Adeleke', 'in|in', 1, '2023-02-17 01:43:18', '2023-02-17 01:43:18'),
(7, '2023-02-11', '2023-02-26', 'Monday|Tuesday|Wednesday|Thursday|Friday|Saturday', '2021/2022', 'FIRST SEMESTER', 'Federal University of Lafia', NULL, 'Mr Adeleke', 'in|ss', 1, '2023-02-17 01:47:28', '2023-02-17 01:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Muhammed Musa', 'cbt@fulafia.edu', '2023-02-14 16:04:45', '$2y$10$lUfUWZVC1.b.BFHjaEjr9.uo8z7Tc4ljD62Ru4JeuQUk1E/VKkuYW', NULL, '2023-02-14 16:04:22', '2023-02-14 16:04:45');

-- --------------------------------------------------------

--
-- Table structure for table `venue_sitting_schedulars`
--

CREATE TABLE `venue_sitting_schedulars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `venue_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sitting_schedular_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `venue_sitting_schedulars`
--

INSERT INTO `venue_sitting_schedulars` (`id`, `venue_code`, `sitting_schedular_id`, `created_at`, `updated_at`) VALUES
(7, 'AUD(TS)', 5, '2023-02-14 16:46:51', '2023-02-14 16:46:51'),
(8, 'MPH FS', 5, '2023-02-14 16:46:51', '2023-02-14 16:46:51'),
(9, 'AUD(PS)', 5, '2023-02-14 16:46:51', '2023-02-14 16:46:51'),
(10, 'AUD(PS)', 6, '2023-02-14 16:46:51', '2023-02-14 16:46:51'),
(11, 'AUD(TS)', 7, '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(12, 'MPH FS', 7, '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(13, 'AUD(PS)', 7, '2023-02-16 23:52:33', '2023-02-16 23:52:33'),
(14, 'AUD(TS)', 8, '2023-02-17 00:23:07', '2023-02-17 00:23:07'),
(15, 'AUD(TS)', 9, '2023-02-17 00:23:07', '2023-02-17 00:23:07'),
(16, 'AUD(TS)', 10, '2023-02-17 01:43:18', '2023-02-17 01:43:18'),
(17, 'AUD(TS)', 11, '2023-02-17 01:43:18', '2023-02-17 01:43:18'),
(18, 'AUD(TS)', 12, '2023-02-17 01:47:28', '2023-02-17 01:47:28'),
(19, 'AUD(TS)', 13, '2023-02-17 01:47:28', '2023-02-17 01:47:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_department_id_foreign` (`department_id`);

--
-- Indexes for table `course_student`
--
ALTER TABLE `course_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_student_student_id_foreign` (`student_id`),
  ADD KEY `course_student_course_id_foreign` (`course_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_faculty_id_foreign` (`faculty_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exams_time_slot_id_foreign` (`time_slot_id`),
  ADD KEY `exams_exam_day_id_foreign` (`exam_day_id`);

--
-- Indexes for table `exam_centers`
--
ALTER TABLE `exam_centers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_centers_school_id_foreign` (`school_id`);

--
-- Indexes for table `exam_day`
--
ALTER TABLE `exam_day`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_day_time_table_id_foreign` (`time_table_id`);

--
-- Indexes for table `exam_units`
--
ALTER TABLE `exam_units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_units_exam_center_id_foreign` (`exam_center_id`),
  ADD KEY `exam_units_exams_id_foreign` (`exams_id`);

--
-- Indexes for table `exam_unit_schedules`
--
ALTER TABLE `exam_unit_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_unit_schedules_exam_units_id_foreign` (`exam_units_id`),
  ADD KEY `exam_unit_schedules_course_id_foreign` (`course_id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculties_school_id_foreign` (`school_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schools_user_id_foreign` (`user_id`);

--
-- Indexes for table `sitting_schedulars`
--
ALTER TABLE `sitting_schedulars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sitting_schedulars_time_tables_id_foreign` (`time_tables_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_matric_unique` (`matric`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD UNIQUE KEY `students_fees_unique` (`fees`),
  ADD KEY `students_school_id_foreign` (`school_id`),
  ADD KEY `students_faculty_id_foreign` (`faculty_id`),
  ADD KEY `students_department_id_foreign` (`department_id`);

--
-- Indexes for table `student_sitting_schedules`
--
ALTER TABLE `student_sitting_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_sitting_schedules_time_table_id_foreign` (`time_table_id`);

--
-- Indexes for table `time_sitting_schedulars`
--
ALTER TABLE `time_sitting_schedulars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `time_sitting_schedulars_venue_sitting_schedular_id_foreign` (`venue_sitting_schedular_id`);

--
-- Indexes for table `time_slots`
--
ALTER TABLE `time_slots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `time_slots_school_id_foreign` (`school_id`);

--
-- Indexes for table `time_tables`
--
ALTER TABLE `time_tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `time_tables_school_id_foreign` (`school_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `venue_sitting_schedulars`
--
ALTER TABLE `venue_sitting_schedulars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venue_sitting_schedulars_sitting_schedular_id_foreign` (`sitting_schedular_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_student`
--
ALTER TABLE `course_student`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `exam_centers`
--
ALTER TABLE `exam_centers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam_day`
--
ALTER TABLE `exam_day`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `exam_units`
--
ALTER TABLE `exam_units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `exam_unit_schedules`
--
ALTER TABLE `exam_unit_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sitting_schedulars`
--
ALTER TABLE `sitting_schedulars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_sitting_schedules`
--
ALTER TABLE `student_sitting_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_sitting_schedulars`
--
ALTER TABLE `time_sitting_schedulars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `time_slots`
--
ALTER TABLE `time_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `time_tables`
--
ALTER TABLE `time_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `venue_sitting_schedulars`
--
ALTER TABLE `venue_sitting_schedulars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_student`
--
ALTER TABLE `course_student`
  ADD CONSTRAINT `course_student_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_student_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_exam_day_id_foreign` FOREIGN KEY (`exam_day_id`) REFERENCES `exam_day` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exams_time_slot_id_foreign` FOREIGN KEY (`time_slot_id`) REFERENCES `time_slots` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam_centers`
--
ALTER TABLE `exam_centers`
  ADD CONSTRAINT `exam_centers_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam_day`
--
ALTER TABLE `exam_day`
  ADD CONSTRAINT `exam_day_time_table_id_foreign` FOREIGN KEY (`time_table_id`) REFERENCES `time_tables` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam_units`
--
ALTER TABLE `exam_units`
  ADD CONSTRAINT `exam_units_exam_center_id_foreign` FOREIGN KEY (`exam_center_id`) REFERENCES `exam_centers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_units_exams_id_foreign` FOREIGN KEY (`exams_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam_unit_schedules`
--
ALTER TABLE `exam_unit_schedules`
  ADD CONSTRAINT `exam_unit_schedules_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_unit_schedules_exam_units_id_foreign` FOREIGN KEY (`exam_units_id`) REFERENCES `exam_units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculties`
--
ALTER TABLE `faculties`
  ADD CONSTRAINT `faculties_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `schools`
--
ALTER TABLE `schools`
  ADD CONSTRAINT `schools_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sitting_schedulars`
--
ALTER TABLE `sitting_schedulars`
  ADD CONSTRAINT `sitting_schedulars_time_tables_id_foreign` FOREIGN KEY (`time_tables_id`) REFERENCES `time_tables` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_sitting_schedules`
--
ALTER TABLE `student_sitting_schedules`
  ADD CONSTRAINT `student_sitting_schedules_time_table_id_foreign` FOREIGN KEY (`time_table_id`) REFERENCES `time_tables` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `time_sitting_schedulars`
--
ALTER TABLE `time_sitting_schedulars`
  ADD CONSTRAINT `time_sitting_schedulars_venue_sitting_schedular_id_foreign` FOREIGN KEY (`venue_sitting_schedular_id`) REFERENCES `venue_sitting_schedulars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `time_slots`
--
ALTER TABLE `time_slots`
  ADD CONSTRAINT `time_slots_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `time_tables`
--
ALTER TABLE `time_tables`
  ADD CONSTRAINT `time_tables_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `venue_sitting_schedulars`
--
ALTER TABLE `venue_sitting_schedulars`
  ADD CONSTRAINT `venue_sitting_schedulars_sitting_schedular_id_foreign` FOREIGN KEY (`sitting_schedular_id`) REFERENCES `sitting_schedulars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
