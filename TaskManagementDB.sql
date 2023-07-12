-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 12, 2020 at 02:14 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `TaskManagementDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `CATEGORY`
--
create database TaskManagementDB;
use TaskManagementDB;

CREATE TABLE `CATEGORY` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CATEGORY`
--

INSERT INTO `CATEGORY` (`id`, `name`, `date_created`) VALUES
(1, 'Công việc', '2020-06-12 00:00:00'),
(2, 'Cá nhân', '2020-06-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `TASK`
--

CREATE TABLE `TASK` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(400) NOT NULL,
  `status` ENUM('TODO', 'IN PROGRESS', 'FINISHED') NOT NULL,
  `start_date` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `finished_date` datetime DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TASK`
--

INSERT INTO `TASK` (`id`, `name`, `description`, `status`, `start_date`, `due_date`, `finished_date`, `category_id`) VALUES
(3, 'Làm bài tập về nhà UDPT', 'Xây dựng ứng dụng quản lý công việc', 'FINISHED', '2023-07-04 00:00:00', '2023-07-05 00:00:00', '2023-07-04 10:30:00', 1),
(4, 'Đăng ký lớp học bơi', 'Đăng ký lớp học bơi tại hồ bơi Lam Sơn', 'FINISHED', '2023-07-04 11:00:00', '2023-07-05 00:00:00', '2023-07-04 16:30:00', 2),
(5, 'Tìm hiểu đề tài Seminar', 'Tìm hiểu đề tài Seminar Lý thuyết', 'IN PROGRESS', '2023-07-07 00:00:00', '2023-07-08 00:00:00', NULL, 1),
(6, 'Họp nhóm làm đồ án thực hành', 'Họp nhóm làm đồ án thực hành', 'TODO', '2023-07-07 00:00:00', '2023-07-08 00:00:00', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `TASK`
--
ALTER TABLE `TASK`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_TASK_CATEGORY` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `TASK`
--
ALTER TABLE `TASK`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `TASK`
--
ALTER TABLE `TASK`
  ADD CONSTRAINT `FK_TASK_CATEGORY` FOREIGN KEY (`category_id`) REFERENCES `CATEGORY` (`id`);
