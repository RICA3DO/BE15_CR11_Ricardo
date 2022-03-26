-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2022 at 05:32 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be15_cr11_petadoption_ricardo`
--
CREATE DATABASE IF NOT EXISTS `be15_cr11_petadoption_ricardo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be15_cr11_petadoption_ricardo`;

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `animal_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `location` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `size` varchar(15) NOT NULL,
  `age` int(30) NOT NULL,
  `hobbies` varchar(50) NOT NULL,
  `breed` varchar(50) NOT NULL,
  `color_pattern` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`animal_id`, `name`, `photo`, `location`, `description`, `size`, `age`, `hobbies`, `breed`, `color_pattern`) VALUES
(1, 'Béla', 'English_bulldog.jpg', 'Kettenbrückengasse 14', 'Béla is a very friendly and has a lot of energy. He\'s an English Bulldog.', '38 cm', 9, 'He likes to go to parks and he loves sticks.', 'Male', 'Red with white '),
(2, 'Karcsú', 'whippet.jpeg', 'Praterstrasse 24', 'Karcsú is really fast and has a lot of energy. She\'s a Whippet.', '46 cm', 8, 'She loves when someone pets her, and care for her.', 'Female', 'black with brown stripes'),
(3, 'Bob', 'Bobtail.jpeg', 'Kagraner Platz 11', 'Bob is very slow and lazy, He\'s a Bobtail.', '58 cm', 10, 'he likes to stay home and eat a lot.', 'Male', 'greyish'),
(4, 'Bika', 'bullterrier.jpeg', 'Siebenbürgerstrasse 12', 'Bika is a very chill dog, who\'s never angry. He\'s a bullterrier.', ' 45 cm', 5, 'He likes to chase butterflies and sticks', 'Male', 'white and black brindle'),
(5, 'Bigi', 'beagle.jpeg', 'industrierstrasse 34', 'Bigi is a very shy dog, she almost never wants to be near another dog. She\'s a Beagle.', '33 cm', 4, 'She loves to be with her carer.', 'Female', 'Orange-White'),
(6, 'Griffith', 'y_terrier.jpeg', 'stadtlauerstrasse 42', 'Griffith is a happy dog. He\'s a yorkshire terrier.', '20 cm', 4, 'Griffith likes to eat a lot and sleep.', 'Male', 'Black-Blue'),
(7, 'Zoro', 'e_setter.jpg', 'An der Bien 16', 'Zoro is very smart and kind dog. He\'s an english setter.', '66 cm', 5, 'Zoro likes to run and to meet new dogs.', 'Male', 'White with black dots'),
(8, 'Batman', 't_terrier.jpg', 'Danzergasse 13', 'Batman is often angry and hard to tame, but he has a good heart. He\'s an english toy terrier.', '30 cm', 8, 'He loves to run and to play.', 'Male', 'Black'),
(9, 'Pofi', 'mastiff.png', 'Guglgasse 14', 'Pofi is very smart and fast. She\'s a mastiff.', '75 cm', 4, 'so she likes to play a lot.', 'Female', 'Brown with white'),
(10, 'Franky', 'bulldog.jpg', 'Litfaßstraße 6-8', 'Franky is a very charismatic dog. He\'s a french bulldog.', '25 cm', 3, 'He loves to run and play with sticks.', 'Male', 'Grey');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` int(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animal_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
