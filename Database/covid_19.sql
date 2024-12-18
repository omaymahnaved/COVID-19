-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2024 at 09:37 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid_19`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(1, 'Faiq', 'faiq@gmail.com', 2147483647, 'Review', 'Very Good and mannered staff'),
(2, 'Ali', 'ali@gmail.com', 2147483647, 'Suggestion', 'should improve cleaness'),
(3, 'omaymah', 'omaymah@gmail.com', 2147483647, 'Question', 'Hospital Timming?'),
(4, 'Raza', 'raza@gmail.com', 2147483647, 'Suggestion', 'Should work on having qualified doctors'),
(5, 'Amina Ahmed', 'amina@gmail.com', 2147483647, 'Review', 'very good management');

-- --------------------------------------------------------

--
-- Table structure for table `covid_test_form`
--

CREATE TABLE `covid_test_form` (
  `id` int(200) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `hospital` varchar(300) NOT NULL,
  `h_condition` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL,
  `result` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `covid_test_form`
--

INSERT INTO `covid_test_form` (`id`, `name`, `email`, `hospital`, `h_condition`, `status`, `result`) VALUES
(1, 'omaymah', 'omaymah@gmail.com', 'Civil', 'fever and tonsils', 'Accepted', 'Positive'),
(3, 'Ahmed Raza', 'ahmadraza2527963@gmail.com', 'Jinnah', 'sneezing and coughing', 'Accepted', 'Positive'),
(4, 'Faiq', 'faiq@gmail.com', 'Imam Clinic', 'fever', 'Accepted', 'Negative'),
(5, 'Ali', 'ali@gmail.com', 'Darul Sehat', 'coughing!!', 'Accepted', 'Positive'),
(6, 'Amina Ahmed', 'amina@gmail.com', 'Jinnah', 'coughing and fever', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

CREATE TABLE `feature` (
  `id` int(200) NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feature`
--

INSERT INTO `feature` (`id`, `title`, `description`) VALUES
(1, 'Wear a Mask', 'Wear a mask that covers your nose and mouth, especially in crowded or indoor spaces, to reduce the transmission of respiratory droplets.'),
(2, 'Social Distancing', 'Maintain a distance of at least 6 feet (2 meters) from others, particularly in public settings, to minimize close contact and the spread of the virus.'),
(3, 'Get Vaccinated', 'Stay up to with COVID-19 vaccinations and boosters to protect yourself and others.'),
(4, 'Wash hands', 'Wash your hands frequently with soap and wate for at least 20 with at least 60% alcohol whe soap are not available.');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `rating` varchar(200) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `comment` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `rating`, `name`, `comment`) VALUES
(1, '4', 'Ahmed Raza', 'staff is very good and cooperative '),
(2, '5', 'omaymah', 'the staff at this hospital is very professional and also this website is very user friendly\r\n'),
(3, '4', 'Faiq', 'good management\n');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_registeration`
--

CREATE TABLE `hospital_registeration` (
  `id` int(200) NOT NULL,
  `name` varchar(300) NOT NULL,
  `phone` int(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital_registeration`
--

INSERT INTO `hospital_registeration` (`id`, `name`, `phone`, `address`, `email`, `password`, `status`) VALUES
(1, 'Imam Clinic', 2147483647, 'asd st.', 'Imam@gmail.com', 'qwerty', 'Accepted'),
(2, 'Agha Khan', 123456789, 'zxcv st.', 'aghakhan@gmail.com', 'qwerty', 'Rejected'),
(3, 'Civil', 123456789, 'abc st.', 'civil@gmail.com', 'qwerty', 'Accepted'),
(5, 'Darul Sehat', 123456789, 'qwer st.', 'darul@gmail.com', 'qwerty', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `registeration`
--

CREATE TABLE `registeration` (
  `id` int(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(300) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registeration`
--

INSERT INTO `registeration` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Ahmed Raza', 'ahmadraza2527963@gmail.com', '12345', 'user'),
(2, 'Admin', 'polysiteadmin@gmail.com', 'admin123', 'admin'),
(3, 'Raza', 'raza@gmail.com', '12345', 'user'),
(4, 'Amina Ahmed', 'amina@gmail.com', '12345', 'user'),
(5, 'omaymah', 'omaymah@gmail.com', '12345', 'user'),
(6, 'Faiq', 'faiq@gmail.com', '12345', 'user'),
(7, 'Ali', 'ali@gmail.com', '12345', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `vaccination`
--

CREATE TABLE `vaccination` (
  `id` int(200) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `vaccine` varchar(300) NOT NULL,
  `hospital` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL,
  `progress` varchar(300) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccination`
--

INSERT INTO `vaccination` (`id`, `name`, `email`, `vaccine`, `hospital`, `status`, `progress`, `date`, `time`) VALUES
(4, 'omaymah', 'omaymah@gmail.com', 'AstraZeneca-Oxford (Vaxzevria)', 'Civil', 'Accepted', '2nd', '2024-08-31', '11:43:00'),
(5, 'Ali', 'ali@gmail.com', 'Johnson & Johnson (Janssen)', 'Darul Sehat', 'Accepted', '3rd', '2024-08-31', '11:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `vaccines`
--

CREATE TABLE `vaccines` (
  `id` int(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccines`
--

INSERT INTO `vaccines` (`id`, `title`, `description`, `status`) VALUES
(1, 'Pfizer-BioNTech (Comirnaty)', ' An mRNA vaccine that uses messenger RNA to instruct cells to produce a protein similar to the spike protein found on the surface of the SARS-CoV-2 virus. This stimulates an immune response.', 'Unavailable'),
(2, 'Moderna (Spikevax)', 'Another mRNA vaccine similar to Pfizer-BioNTech’s, which also encodes the spike protein to elicit an immune response against the virus.', 'Available'),
(3, 'AstraZeneca-Oxford (Vaxzevria)', ' A viral vector vaccine that uses a modified adenovirus (not the virus that causes COVID-19) to deliver genetic instructions for the spike protein, triggering an immune response.', 'Available'),
(4, 'Johnson & Johnson (Janssen)', 'A viral vector vaccine that uses a different adenovirus to deliver the genetic material encoding the spike protein. It requires only a single dose.', 'Unavailable'),
(5, 'Sinopharm (BBIBP-CorV)', 'Developed by China’s state-owned pharmaceutical company and used extensively in various countries. It is known for its traditional approach and has been used in many countries with varying degrees of uptake.', 'Available'),
(6, 'Sinovac (CoronaVac)', 'Developed by a Chinese company and used globally, especially in several Latin American and Asian countries. Its traditional vaccine platform is appreciated for its long history of use with other vaccines.', 'Unavailable'),
(7, 'CanSinoBio (Convidecia)', 'The CanSinoBio vaccine is a viral vector vaccine. It uses a modified adenovirus to deliver genetic material that codes for the spike protein of the SARS-CoV-2 virus. This vaccine has been part of the vaccination campaign in Pakistan, known for its single-dose regimen.', 'Available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `covid_test_form`
--
ALTER TABLE `covid_test_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital_registeration`
--
ALTER TABLE `hospital_registeration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registeration`
--
ALTER TABLE `registeration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccination`
--
ALTER TABLE `vaccination`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `covid_test_form`
--
ALTER TABLE `covid_test_form`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feature`
--
ALTER TABLE `feature`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hospital_registeration`
--
ALTER TABLE `hospital_registeration`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registeration`
--
ALTER TABLE `registeration`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vaccination`
--
ALTER TABLE `vaccination`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
