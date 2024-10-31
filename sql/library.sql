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
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `RecoveryKey` VARCHAR(50) NOT NULL DEFAULT 'AUADMIN-MASTER'
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






CREATE TABLE Books (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `bookTitle` VARCHAR(255) NOT NULL,
    `bookID` VARCHAR(50) UNIQUE NOT NULL,
    `author` VARCHAR(100) NOT NULL,
    `edition` VARCHAR(50),
    `isbn` VARCHAR(20) UNIQUE NOT NULL,
    `yearOfRelease` INT(6),
    `category` VARCHAR(100),
    `publisher` VARCHAR(100),
    `language` VARCHAR(50),
    `pages` INT,
    `availability` ENUM('available', 'checked_out') DEFAULT 'available',
    `summary` TEXT,
    `addedDate` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `coverImage` VARCHAR(255),
    `rating` DECIMAL(2, 1),
   `units` INT DEFAULT 0, 
    `keywords` VARCHAR(255)
);

INSERT INTO Books 
    (bookTitle, bookID, author, edition, isbn, yearOfRelease, category, publisher, language, pages, availability, summary, coverImage, rating, keywords)
VALUES
    ('The Great Gatsby', 'BG01', 'F. Scott Fitzgerald', '1st', '9780743273565', 1925, 'Fiction', 'Scribner', 'English', 180, 'available', 'A story of the mysteriously wealthy Jay Gatsby and his love for the beautiful Daisy Buchanan.', 'great_gatsby.jpg', 4.3, 'classic,wealth,1920s'),
    ('To Kill a Mockingbird', 'BG02', 'Harper Lee', '1st', '9780061120084', 1960, 'Fiction', 'J.B. Lippincott & Co.', 'English', 281, 'available', 'A gripping, heart-wrenching, and wholly remarkable tale of coming-of-age in a South poisoned by virulent prejudice.', 'to_kill_a_mockingbird.jpg', 4.8, 'racism,justice,coming-of-age'),
    ('1984', 'BG03', 'George Orwell', '1st', '9780451524935', 1949, 'Dystopian', 'Secker & Warburg', 'English', 328, 'available', 'A dystopian novel set in a totalitarian society ruled by Big Brother.', '1984.jpg', 4.2, 'dystopia,totalitarianism,politics'),
    ('Moby Dick', 'BG04', 'Herman Melville', '1st', '9781503280786', 1851, 'Adventure', 'Harper & Brothers', 'English', 585, 'available', 'The narrative of Captain Ahab\'s obsessive quest to kill the giant white whale, Moby Dick.', 'moby_dick.jpg', 3.9, 'adventure,obsession,whale'),
    ('Pride and Prejudice', 'BG05', 'Jane Austen', '1st', '9781503290563', 1813, 'Romance', 'T. Egerton', 'English', 432, 'available', 'A romantic novel that charts the emotional development of the protagonist, Elizabeth Bennet.', 'pride_and_prejudice.jpg', 4.6, 'romance,class,19th century'),
    ('The Catcher in the Rye', 'BG06', 'J.D. Salinger', '1st', '9780316769488', 1951, 'Fiction', 'Little, Brown and Company', 'English', 277, 'available', 'A novel about teenage rebellion and alienation.', 'catcher_in_the_rye.jpg', 4.0, 'rebellion,teenage,identity'),
    ('Brave New World', 'BG07', 'Aldous Huxley', '1st', '9780060850524', 1932, 'Dystopian', 'Chatto & Windus', 'English', 268, 'available', 'A dystopian novel about a technologically advanced future society.', 'brave_new_world.jpg', 4.4, 'dystopia,society,technology'),
    ('The Hobbit', 'BG08', 'J.R.R. Tolkien', '1st', '9780547928227', 1937, 'Fantasy', 'George Allen & Unwin', 'English', 310, 'available', 'A fantasy novel that follows the journey of Bilbo Baggins.', 'the_hobbit.jpg', 4.7, 'fantasy,adventure,jewelry');


USE `auolibrary`;  -- Make sure to select the database first


CREATE TABLE BorrowRequests (
    `request_id` INT AUTO_INCREMENT PRIMARY KEY,
    `userKey` VARCHAR(20) NOT NULL,
    `student_id` VARCHAR(20),                  -- Matches StudentID in Student table
    `bookID` VARCHAR(50),                      -- Matches bookID in Books table

    -- Borrower Information
    `borrower_name` VARCHAR(200) NOT NULL,     -- Full name of the borrower (retrieved from Student table)
    `borrower_role` varchar(20),
    `mobile` VARCHAR(30),                       -- Adjusted to match MobileNumber in Student table
    `course` VARCHAR(255),
    `level` VARCHAR(30),

    -- Book Information
    `book_title` VARCHAR(255) NOT NULL,        -- Title of the book being borrowed (retrieved from Books table)
    `units_requested` INT DEFAULT 1,           -- Number of units to borrow (defaults to 1)
    `publisher` VARCHAR(100),
    `yearOfRelease` VARCHAR(4),                -- Year of release as VARCHAR

    -- Request Status
    `request_date` DATETIME DEFAULT CURRENT_TIMESTAMP, 
    `status` varchar(20) DEFAULT 'Pending',

    -- Foreign Key Constraints
    CONSTRAINT `fk_borrow_student` FOREIGN KEY (`student_id`) REFERENCES Student(`StudentID`) ON DELETE SET NULL,
    CONSTRAINT `fk_borrow_book` FOREIGN KEY (`bookID`) REFERENCES Books(`bookID`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



DROP TABLE IF EXISTS ReadingPlans;
CREATE TABLE ReadingPlans (
    plan_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id VARCHAR(20) NOT NULL,
    plan_name VARCHAR(100) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    description TEXT,
    status VARCHAR(20) DEFAULT 'Pending'  -- Changed to VARCHAR
);


CREATE TABLE ToDoList (
    task_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id VARCHAR(20) NOT NULL,  -- Foreign key for the student
    task_description TEXT NOT NULL,
    due_date DATE,
    status VARCHAR(20) DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE wishlist (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id VARCHAR(50) NOT NULL,
    book_id varchar(11),
    book_title VARCHAR(255),
    book_description TEXT,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    note TEXT
    
);

CREATE TABLE Suggestions (
    suggestion_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id VARCHAR(20) NOT NULL,  -- Foreign key for the student
    experience TEXT NOT NULL,         -- Field for sharing reading experience
    app_rating INT CHECK(app_rating BETWEEN 1 AND 5), -- Rating from 1 to 5
    feature_request TEXT,             -- Field for requesting new features
    additional_feedback TEXT,         -- Any other feedback/comments
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE StudyMaterials (
    material_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    course_code VARCHAR(20) NOT NULL,
    department VARCHAR(50) NOT NULL,
    file_path VARCHAR(255) NOT NULL,   -- Path where the file is stored
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    uploaded_by VARCHAR(50)            -- Name or ID of the admin who uploaded the file
);
