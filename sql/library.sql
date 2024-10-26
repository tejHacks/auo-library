-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2024 at 03:15 PM
-- Server version: 10.4.32-MariaDB 
-- PHP Version:  8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE DATABASE auolibrary;


--
-- Database: `auolibrary`
--




USE auolibrary;
-- --------------------------------------------------------


--
-- Table structure for table `Students`
--
CREATE TABLE Student (
  `ID` INT(10) AUTO_INCREMENT PRIMARY KEY,
   `StudentID` VARCHAR(20) NOT NULL UNIQUE,
  `Fullname` VARCHAR(250) NOT NULL,
  `Email` VARCHAR(255) NOT NULL,
  `MobileNumber` VARCHAR(30) NOT NULL,  -- Phone number with max 11 characters
  `Gender` VARCHAR(30) NOT NULL,
  `Level` VARCHAR(30) NOT NULL,
  `Department` VARCHAR(255) NOT NULL,
  `Course` VARCHAR(255) NOT NULL,
  `Password` VARCHAR(255) NOT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
   `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB COLLATE utf8mb4_unicode_ci;


ALTER TABLE `Student` COLLATE utf8mb4_unicode_ci;

--
-- Table structure for table `admin`
--

CREATE TABLE `Librarian` (
  `ID` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `Fullname` varchar(200) NOT NULL,
  `LibrarianID` varchar(200) NOT NULL UNIQUE,
  `LibrarianEmail` varchar(255) NOT NULL,
  `Contact` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Status` varchar(20) DEFAULT 'Active',
  `Role` VARCHAR(255) DEFAULT  'Librarian',
  `JobTitle` VARCHAR(255) NOT NULL,
  `Department` VARCHAR(200) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `RegDate` timestamp DEFAULT current_timestamp(),
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
)  ENGINE=InnoDB COLLATE utf8mb4_unicode_ci;



INSERT INTO `Librarian` (Fullname, LibrarianID, LibrarianEmail, Contact, Password, Status, Role, JobTitle, Department, Gender) 
VALUES('ACHIEVERS UNIVERITY LIBRARIAN','AU21AC3778','olateju202@gmail.com','+2348086976247','$2y$10$ia0Zh.rtw3bJ6CWfw5r6u.EVGcaKd5JXkfeuahYOZ5FF2kXsfx3ou','Active','Master Librarian','ADMINISTRATOR','LIBRARY','Male');

-- 
-- 
-- 

--
-- Table structure for table `tblissuedbookdetails`
--


-- Tbale structures for Lecturers


CREATE TABLE Lecturers(
  `LecturerID` INT(10) AUTO_INCREMENT PRIMARY KEY,
  `StaffID` VARCHAR(20) NOT NULL UNIQUE,
  `Fullname` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL UNIQUE,
  `Phonenumber` varchar(20) NOT NULL,
  `Department` varchar(200) NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `JobTitle` varchar(200) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `RecoveryKey` varchar(255) NOT NULL,
    `RegDate` timestamp DEFAULT current_timestamp(),
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
)  ENGINE=InnoDB COLLATE utf8mb4_unicode_ci;


CREATE TABLE `tblissuedbookdetails` (
  `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `BookId` int(11) DEFAULT NULL,
  `BookTitle` varchar(255) DEFAULT NULL,
  `Fullname` varchar(255) DEFAULT NULL,
  `StudentID` varchar(150) DEFAULT NULL,
  `IssuesDate` timestamp NULL DEFAULT current_timestamp(),
  `ReturnDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `RetrunStatus` int(1) DEFAULT NULL,
  `fine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;