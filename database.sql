-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2025 at 11:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12
-----------------------------------------------
-- Naam script: database.sql  
-- Omschrijving: Dit is de code die wij hebben uitgevoerd om de database te maken
-- Naam ontwikkelaar: JTnadrooi
-- Project: KlantOnderHoudsysteem
-- Datum: 28/03/2025
------------------------------------------------
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keuzedeel_duo`
--
-- --------------------------------------------------------
--
-- Table structure for table `users`
--
CREATE TABLE
  `users` (
    `id` int (11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `phone` varchar(20) DEFAULT NULL,
    `address` text DEFAULT NULL,
    `is_admin` tinyint (1) DEFAULT 0,
    `password` varchar(255) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `users`
--
INSERT INTO
  `users` (
    `id`,
    `name`,
    `email`,
    `phone`,
    `address`,
    `is_admin`,
    `password`
  )
VALUES
  (
    3,
    'John Doe',
    'johndoe@example.com',
    '123-456-7890',
    '123 Main St, Anytown, USA',
    1,
    'password123'
  ),
  (
    4,
    'Jane Smith',
    'janesmith@example.com',
    '987-654-3210',
    '456 Oak St, Sometown, USA',
    0,
    'mypassword'
  );

--
-- Indexes for dumped tables
--
--
-- Indexes for table `users`
--
ALTER TABLE `users` ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users` MODIFY `id` int (11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 5;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;