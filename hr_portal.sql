-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2024 at 08:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `date` date NOT NULL,
  `employee` int(11) NOT NULL,
  `is_approve` tinyint(4) NOT NULL,
  `punch_in_time` time NOT NULL,
  `total_latepunch` int(11) NOT NULL,
  `total_attendance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`date`, `employee`, `is_approve`, `punch_in_time`, `total_latepunch`, `total_attendance`) VALUES
('2024-07-01', 1, 1, '21:26:15', 5, 43),
('2024-07-02', 2, 1, '20:29:38', 12, 22),
('2024-07-03', 3, 0, '21:26:15', 34, 43),
('2024-07-04', 4, 0, '20:29:38', 37, 23);

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `chat_id` int(11) NOT NULL,
  `user1_id` int(11) NOT NULL,
  `user2_id` int(11) NOT NULL,
  `chat_lastmsg` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `current_opening`
--

CREATE TABLE `current_opening` (
  `opening_id` int(11) NOT NULL,
  `role` varchar(45) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `location` varchar(45) NOT NULL,
  `total_required` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `experience` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customization`
--

CREATE TABLE `customization` (
  `font_name` varchar(45) NOT NULL,
  `font_size` int(11) NOT NULL,
  `light_mode` varchar(45) NOT NULL,
  `theme_color` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `shift_timings` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dates`
--

CREATE TABLE `dates` (
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dates`
--

INSERT INTO `dates` (`date`) VALUES
('2024-07-01'),
('2024-07-02'),
('2024-07-03'),
('2024-07-04'),
('2024-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(45) NOT NULL,
  `budget` int(10) NOT NULL,
  `manager` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `budget`, `manager`) VALUES
(1, 'Full-Stack', 12000, 1),
(2, 'Machine Learning', 16000, 2),
(3, 'Management', 100000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `dep_group`
--

CREATE TABLE `dep_group` (
  `dep_id` int(11) NOT NULL,
  `dep_name` varchar(45) NOT NULL,
  `d_lastmessage` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dep_group`
--

INSERT INTO `dep_group` (`dep_id`, `dep_name`, `d_lastmessage`) VALUES
(1, 'Full-Stack', '2024-07-02 12:07:12'),
(2, 'Machine Learning', '2024-07-02 12:07:12'),
(3, 'Management', '2024-07-02 14:26:52');

-- --------------------------------------------------------

--
-- Table structure for table `dep_message`
--

CREATE TABLE `dep_message` (
  `dmsg_id` int(11) NOT NULL,
  `dmsg_body` varchar(45) NOT NULL,
  `dgrp_id` int(11) NOT NULL,
  `demp_id` int(11) NOT NULL,
  `dep_timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `name` varchar(455) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `login_id` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `photo` varchar(45) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `address` varchar(225) NOT NULL,
  `department_id` int(11) NOT NULL,
  `work_status` varchar(40) NOT NULL,
  `bank_name` varchar(45) NOT NULL,
  `account_number` int(16) NOT NULL,
  `ifsc_code` varchar(11) NOT NULL,
  `if_employee` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`name`, `employee_id`, `login_id`, `password`, `dob`, `gender`, `photo`, `phone_number`, `address`, `department_id`, `work_status`, `bank_name`, `account_number`, `ifsc_code`, `if_employee`) VALUES
('Guptesh', 1, 'gupteshmaster@gmail.com', '5289', '2024-06-01', 'Male', '[value-7]', 1234567890, 'Bits Pilani, Pilani Campus', 1, 'Work from home', '[value-12]', 0, '[value-14]', 1),
('Aman', 2, 'f20220152@pilani.bits-pilani.ac.in', '6046', '2024-06-02', 'Male', '[value-7]', 2121212121, 'Bits Pilani, Pilani Campus', 2, 'Work from office', '[value-12]', 0, '[value-14]', 1),
('Rachit', 3, 'f20221642@hyderabad.bits-pilani.ac.in', '1234', '2004-07-01', 'Male', 'image_Rachit', 1111122222, 'Bits Hyderabad', 1, 'Work from home', 'BOI', 0, '1', 0),
('Aadityaraj', 4, 'f20221384@hyderabad.bits-pilani.ac.in', '12345', '2004-07-10', 'Male', 'image_Aaditya', 987654321, 'Bits Hyderabad', 2, 'Work from home', 'ICICI', 0, '1', 0),
('Example', 5, 'example@gmail.com', '67890', '2024-07-01', 'Female', 'image_Example', 101010101, 'Hello how are you', 3, 'Work from office', 'HDFC', 1, '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_depart`
--

CREATE TABLE `emp_depart` (
  `employee_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `designation` varchar(45) NOT NULL,
  `joining_date` date NOT NULL,
  `base_salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_depart`
--

INSERT INTO `emp_depart` (`employee_id`, `department_id`, `designation`, `joining_date`, `base_salary`) VALUES
(1, 1, 'Manager', '2024-06-01', 20000),
(2, 2, 'Lead', '2024-06-01', 16000),
(3, 1, 'Senior developer', '2024-06-01', 30000),
(4, 2, 'Junior developer', '2024-06-01', 10000),
(5, 3, 'Overall manager', '2024-05-01', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `emp_dep_grp`
--

CREATE TABLE `emp_dep_grp` (
  `emp_id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `lastseen` datetime NOT NULL,
  `lastmessage` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_dep_grp`
--

INSERT INTO `emp_dep_grp` (`emp_id`, `dep_id`, `lastseen`, `lastmessage`) VALUES
(1, 1, '2024-07-02 14:45:19', '2024-07-02 14:45:19'),
(2, 2, '2024-07-02 14:45:28', '2024-07-02 14:45:28'),
(3, 1, '2024-07-02 14:45:34', '2024-07-02 14:45:34'),
(4, 2, '2024-07-02 14:45:34', '2024-07-02 14:45:34'),
(5, 3, '2024-07-02 14:45:50', '2024-07-02 14:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `emp_proj_grp`
--

CREATE TABLE `emp_proj_grp` (
  `emp_id` int(11) NOT NULL,
  `proj_id` int(11) NOT NULL,
  `lastseen` datetime NOT NULL,
  `lastmessage` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedback_id` int(11) NOT NULL,
  `feedback_msg` varchar(45) NOT NULL,
  `feedback_for_user` int(11) NOT NULL,
  `feedback_by_user` int(11) NOT NULL,
  `feedback_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `individual_chats`
--

CREATE TABLE `individual_chats` (
  `message_id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
  `message_body` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `emp_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_leaves` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`emp_id`, `date`, `total_leaves`) VALUES
(1, '2024-07-01', 4),
(2, '2024-07-02', 5),
(3, '2024-07-03', 1),
(4, '2024-07-04', 5),
(2, '2024-07-05', 8);

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `emp_id` int(11) NOT NULL,
  `cl` int(11) NOT NULL,
  `sl` int(11) NOT NULL,
  `lwp` int(11) NOT NULL,
  `hl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`emp_id`, `cl`, `sl`, `lwp`, `hl`) VALUES
(4, 1, 2, 3, 4),
(1, 2, 1, 3, 4),
(3, 2, 34, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `meeting_department`
--

CREATE TABLE `meeting_department` (
  `meeting_url` varchar(45) NOT NULL,
  `meeting_host` int(11) NOT NULL,
  `meeting_agenda` varchar(45) NOT NULL,
  `meeting_time` datetime NOT NULL,
  `meet_dep_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meeting_project`
--

CREATE TABLE `meeting_project` (
  `meeting_url` varchar(45) NOT NULL,
  `meeting_host` int(11) NOT NULL,
  `meeting_agenda` varchar(45) NOT NULL,
  `meeting_time` datetime NOT NULL,
  `meet_proj_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `notice_creator` int(11) NOT NULL,
  `content` varchar(100) NOT NULL,
  `notice_time` datetime NOT NULL,
  `notice_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notifications_id` int(11) NOT NULL,
  `notifications_content` varchar(45) NOT NULL,
  `notifications_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payrolls_month_wise`
--

CREATE TABLE `payrolls_month_wise` (
  `number_of_leaves` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `late_punch_ins` int(11) NOT NULL,
  `employee_name` varchar(45) NOT NULL,
  `employee_designation` varchar(45) NOT NULL,
  `expected_salary` double NOT NULL,
  `attendance` int(11) NOT NULL,
  `any_rewards` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_manager` int(11) NOT NULL,
  `domain` varchar(45) NOT NULL,
  `client` varchar(45) NOT NULL,
  `budget` double NOT NULL,
  `deadline` datetime NOT NULL,
  `is_delay` tinyint(4) NOT NULL,
  `project_name` varchar(45) NOT NULL,
  `start_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_manager`, `domain`, `client`, `budget`, `deadline`, `is_delay`, `project_name`, `start_date`) VALUES
(1, 2, 'AIML', 'Google', 1000000, '2024-06-01 23:44:32', 0, 'AI.io', '2024-04-01 23:44:32'),
(2, 3, 'WebDev', 'Microsoft', 1234566, '2024-07-31 23:47:07', 0, 'WD.io', '2024-06-13 23:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `project_employees`
--

CREATE TABLE `project_employees` (
  `project_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `any_rewards` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_employees`
--

INSERT INTO `project_employees` (`project_id`, `employee_id`, `any_rewards`) VALUES
(1, 2, 0),
(1, 4, 0),
(1, 5, 0),
(2, 1, 0),
(2, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_message`
--

CREATE TABLE `project_message` (
  `pmsg_id` int(11) NOT NULL,
  `pmsg_body` varchar(45) NOT NULL,
  `pgrp_id` int(11) NOT NULL,
  `pemp_id` int(11) NOT NULL,
  `proj_timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proj_group`
--

CREATE TABLE `proj_group` (
  `proj_id` int(11) NOT NULL,
  `proj_name` varchar(45) NOT NULL,
  `p_lastmessage` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smtp`
--

CREATE TABLE `smtp` (
  `smtp_server` varchar(45) NOT NULL,
  `port` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `mail_from` varchar(45) NOT NULL,
  `enc_typ` varchar(45) NOT NULL,
  `validation_mail` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teck_stack`
--

CREATE TABLE `teck_stack` (
  `project_id` int(11) NOT NULL,
  `tech_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_conversation`
--

CREATE TABLE `user_conversation` (
  `user_id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `lastseen` datetime NOT NULL,
  `lastmessaged` datetime NOT NULL,
  `message_content` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD KEY `date` (`date`,`employee`);

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `current_opening`
--
ALTER TABLE `current_opening`
  ADD PRIMARY KEY (`opening_id`);

--
-- Indexes for table `dates`
--
ALTER TABLE `dates`
  ADD PRIMARY KEY (`date`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`),
  ADD KEY `dep_emp` (`manager`);

--
-- Indexes for table `dep_group`
--
ALTER TABLE `dep_group`
  ADD KEY `dep_id` (`dep_id`);

--
-- Indexes for table `dep_message`
--
ALTER TABLE `dep_message`
  ADD PRIMARY KEY (`dmsg_id`) USING BTREE,
  ADD KEY `dgrp_id` (`dgrp_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `emp_dep` (`department_id`);

--
-- Indexes for table `emp_depart`
--
ALTER TABLE `emp_depart`
  ADD KEY `employee_id` (`employee_id`,`department_id`),
  ADD KEY `emp_depart_ibfk_2` (`department_id`);

--
-- Indexes for table `emp_dep_grp`
--
ALTER TABLE `emp_dep_grp`
  ADD KEY `emp_id` (`emp_id`,`dep_id`),
  ADD KEY `emp_dep_grp_ibfk_1` (`dep_id`);

--
-- Indexes for table `emp_proj_grp`
--
ALTER TABLE `emp_proj_grp`
  ADD PRIMARY KEY (`emp_id`,`proj_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `individual_chats`
--
ALTER TABLE `individual_chats`
  ADD PRIMARY KEY (`message_id`,`chat_id`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD KEY `emp_id` (`emp_id`,`date`);

--
-- Indexes for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `meeting_department`
--
ALTER TABLE `meeting_department`
  ADD PRIMARY KEY (`meeting_url`);

--
-- Indexes for table `meeting_project`
--
ALTER TABLE `meeting_project`
  ADD PRIMARY KEY (`meeting_url`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notifications_id`);

--
-- Indexes for table `payrolls_month_wise`
--
ALTER TABLE `payrolls_month_wise`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `project_manager` (`project_manager`);

--
-- Indexes for table `project_employees`
--
ALTER TABLE `project_employees`
  ADD KEY `project_id` (`project_id`,`employee_id`),
  ADD KEY `project_employees_ibfk_2` (`employee_id`);

--
-- Indexes for table `project_message`
--
ALTER TABLE `project_message`
  ADD PRIMARY KEY (`pmsg_id`,`pgrp_id`);

--
-- Indexes for table `proj_group`
--
ALTER TABLE `proj_group`
  ADD PRIMARY KEY (`proj_id`);

--
-- Indexes for table `smtp`
--
ALTER TABLE `smtp`
  ADD PRIMARY KEY (`smtp_server`);

--
-- Indexes for table `teck_stack`
--
ALTER TABLE `teck_stack`
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `user_conversation`
--
ALTER TABLE `user_conversation`
  ADD PRIMARY KEY (`user_id`,`chat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`employee`) REFERENCES `employee` (`employee_id`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`date`) REFERENCES `dates` (`date`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `dep_emp` FOREIGN KEY (`manager`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `dep_group`
--
ALTER TABLE `dep_group`
  ADD CONSTRAINT `dep_group_ibfk_1` FOREIGN KEY (`dep_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `dep_message`
--
ALTER TABLE `dep_message`
  ADD CONSTRAINT `dep_message_ibfk_1` FOREIGN KEY (`dgrp_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `emp_dep` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `emp_depart`
--
ALTER TABLE `emp_depart`
  ADD CONSTRAINT `emp_depart_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`),
  ADD CONSTRAINT `emp_depart_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `emp_dep_grp`
--
ALTER TABLE `emp_dep_grp`
  ADD CONSTRAINT `emp_dep_grp_ibfk_1` FOREIGN KEY (`dep_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `emp_dep_grp_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `leave`
--
ALTER TABLE `leave`
  ADD CONSTRAINT `leave_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`employee_id`),
  ADD CONSTRAINT `leave_ibfk_2` FOREIGN KEY (`date`) REFERENCES `dates` (`date`);

--
-- Constraints for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD CONSTRAINT `leave_type_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`project_manager`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `project_employees`
--
ALTER TABLE `project_employees`
  ADD CONSTRAINT `project_employees_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`),
  ADD CONSTRAINT `project_employees_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `teck_stack`
--
ALTER TABLE `teck_stack`
  ADD CONSTRAINT `teck_stack_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
