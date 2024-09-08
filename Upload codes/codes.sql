-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2024 at 12:04 AM
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
-- Database: `uploadcodes`
--

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `code_name` varchar(255) NOT NULL,
  `code_text` varchar(255) NOT NULL,
  `code_type` varchar(255) NOT NULL,
  `code_date` text NOT NULL DEFAULT current_timestamp(),
  `u_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `codes`
--

INSERT INTO `codes` (`code_name`, `code_text`, `code_type`, `code_date`, `u_id`) VALUES
('First Code', '45264652328    $code_sender = $_POST[8798412346888selectuser8798412346888];45264652328    $code_type = $_POST[8798412346888selectcodetype8798412346888];45264652328    $code_sent = isset($_POST[8798412346888code_sent8798412346888]) ? $_POST[8798412346888co', 'Mobile', '2024-09-08 21:19:15', 1),
('h', '45264652328    $code_sender = $_POST[8798412346888selectuser8798412346888];45264652328    $code_type = $_POST[8798412346888selectcodetype8798412346888];45264652328    $code_sent = isset($_POST[8798412346888code_sent8798412346888]) ? $_POST[8798412346888co', 'DL-ML-Algorithms', '2024-09-08 21:30:10', 1),
('structure code', '', 'structure', 'urrent_timestamp(', NULL),
('important algorithm', 'd', 'algorithm', 'urrent_timestamp(', NULL),
('frontend styles', '# Insert the code here....', 'Frontend', '2024-09-08 23:48:26', 1),
('backend php code', 'if ($_SERVER[8798412346888REQUEST_METHOD8798412346888] == 8798412346888POST8798412346888){4526465232845264652328}', 'Backend', '2024-09-08 23:55:06', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD KEY `code_idf` (`u_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `codes`
--
ALTER TABLE `codes`
  ADD CONSTRAINT `code_idf` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
