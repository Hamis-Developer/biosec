-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 05:12 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biosec`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitylog`
--

CREATE TABLE `activitylog` (
  `id` int(11) NOT NULL,
  `activity` longtext NOT NULL,
  `datecreated` varchar(255) NOT NULL,
  `timecreated` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activitylog`
--

INSERT INTO `activitylog` (`id`, `activity`, `datecreated`, `timecreated`) VALUES
(1, 'Hamis Ahmed (Web Developer) was added to the employee database.', '7 April 2021', '12:08pm'),
(2, 'Hamis Ahmed (Web Developer) was added to the employee database.', '7 April 2021', '12:09pm'),
(3, 'Hamis Ahmed (Web Developer) was added to the employee database.', '7 April 2021', '12:14pm'),
(4, 'Israel Adesanya (Style Bender) was added to the employee database.', '7 April 2021', '12:16pm'),
(5, 'Usman Kamaru (Coach) was added to the employee database.', '7 April 2021', '02:48pm'),
(6, 'Chisom Henry (Quality Control Assurance) record was updated.', '7 April 2021', '04:56pm'),
(7, 'Helen Paul (Manager) record was updated.', '8 April 2021', '12:34pm'),
(8, 'Hamis Ahmed (Web Developer) was added to the employee database.', '8 April 2021', '02:03pm'),
(9, 'John Cena (Mainstream Wrestler) was added to the employee database.', '8 April 2021', '02:18pm'),
(10, 'John Cena (Mainstream Wrestler) record was updated.', '8 April 2021', '02:25pm'),
(11, 'John Legend (Mainstream Wrestler) record was updated.', '8 April 2021', '02:32pm'),
(12, 'Michael Jackson (Moon Walker) was added to the employee database.', '8 April 2021', '03:47pm'),
(13, 'Michael Jackson (Entertainer) record was updated.', '8 April 2021', '03:47pm');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `photo` longtext NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `designation`, `photo`, `status`) VALUES
(1, 'Agu Osoka', 'agu.o@biosec.com.ng', 'Managing Director', 'http://localhost/biosec/assets/photos/agu.jpg', 'Active'),
(2, 'Helen Paul', 'helen@gmail.com', 'Manager', 'http://localhost/biosec/assets/photos/ada.jpg', 'Active'),
(3, 'Doris Kiptie', 'doris.kiptie@biosec.com.ng', 'Web Development Team Lead', 'http://localhost/biosec/assets/photos/doris.jpg', 'Active'),
(4, 'Olalekan Folayan', 'lekan@biosec.com.ng', 'Entreprise Developer', 'http://localhost/biosec/assets/photos/lekan.jpg', 'Active'),
(5, 'Gabriel Mbaiorga', 'gabriel@biosec.com.ng', 'Mobile Application Developer', 'http://localhost/biosec/assets/photos/gabriel.jpg', 'Archive'),
(6, 'Kelvin Onyeka Morka', 'kelvin@biosec.com.ng', 'P.A To Managing Director', 'http://localhost/biosec/assets/photos/kelvin.jpg', 'Active'),
(7, 'Aisha M Sadiq', 'aisha@biosec.com.ng', 'Program Officer', 'http://localhost/biosec/assets/photos/aisha.jpg', 'Active'),
(8, 'Chisom Henry', 'chisom@biosec.com.ng', 'Quality Control Assurance', 'http://localhost/biosec/assets/photos/chisom.png', 'Archive'),
(9, 'Victoria Okorie', 'vic.o@biosec.com.ng', 'Legal Officer', 'http://localhost/biosec/assets/photos/victoria.jpg', 'Active'),
(10, 'Enoch Sylvanus', 'sylvanus@biosec.com.ng', 'Software Engineer', 'http://localhost/biosec/assets/photos/sylvanus.jpg', 'Active'),
(11, 'Fatima Atta', 'fatima@biosec.com.ng', 'Database Administrator', 'http://localhost/biosec/assets/photos/fatima.jpg', 'Active'),
(15, 'Hamis Ahmed', 'contact@hamisahmed.com', 'Web Developer', 'http://localhost/biosec/assets/photos/hamis.jpg', 'Active'),
(16, 'Israel Adesanya', 'israel@biosec.com.ng', 'Style Bender', 'http://localhost/biosec/assets/photos/israel.jpg', 'Active'),
(17, 'Usman Kamaru', 'usman@biosec.com.ng', 'Coach', 'http://localhost/biosec/assets/photos/usman.jpg', 'Archive'),
(18, 'Hamis Ahmed', 'hamisahmed10@gmail.com', 'Web Developer', 'https://hamisahmed.com/assets/images/hamis.jpg', 'Archive'),
(19, 'John Legend', 'admin@demo.com', 'Mainstream Wrestler', 'https://hamisahmed.com/assets/images/hamis.jpg', 'Archive'),
(20, 'Michael Jackson', 'mj@heavens.com', 'Entertainer', 'https://hamisahmed.com/assets/images/hamis.jpg', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activitylog`
--
ALTER TABLE `activitylog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activitylog`
--
ALTER TABLE `activitylog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
