-- Database Creation (if it doesn't already exist)
CREATE DATABASE IF NOT EXISTS `hotel_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `hotel_db`;

-- --------------------------------------------------------

--
-- Table structure for `User` (Guests / Persons)
-- Represents any person, whether registered or just a guest.
--
CREATE TABLE `User` (
  `idUser` INT(11) NOT NULL AUTO_INCREMENT,
  `firstName` VARCHAR(100) NOT NULL,
  `lastName` VARCHAR(100) NOT NULL,
  `birthDate` DATE NOT NULL,
  `birthPlace` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for `RegisteredUser` (User Accounts)
-- Represents an account with login credentials, linked to a person in `User`.
--
CREATE TABLE `RegisteredUser` (
  `idRegisteredUser` INT(11) NOT NULL AUTO_INCREMENT,
  `idUser` INT(11) NOT NULL, -- FK to User.idUser
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL, -- For hashed password
  `firstName` VARCHAR(100) NOT NULL,
  `lastName` VARCHAR(100) NOT NULL,
  `birthDate` DATE NOT NULL,
  `birthPlace` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idRegisteredUser`),
  UNIQUE KEY `idx_unique_idUser` (`idUser`), -- Ensures 1 account per person
  CONSTRAINT `fk_registered_user_user` FOREIGN KEY (`idUser`) REFERENCES `User` (`idUser`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for `Room`
--
CREATE TABLE `Room` (
  `idRoom` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL UNIQUE,
  `beds` INT(11) NOT NULL,
  `price` DECIMAL(10, 2) NOT NULL, -- Price per one night
  `type` VARCHAR(50) NOT NULL, -- E.g., 'Single', 'Double', 'Suite'
  PRIMARY KEY (`idRoom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for `Booking`
--
CREATE TABLE `Booking` (
  `idBooking` INT(11) NOT NULL AUTO_INCREMENT,
  `idRegisteredUser` INT(11) NOT NULL, -- FK to the user who made the booking
  `idRoom` INT(11) NOT NULL,            -- FK to the booked room
  `checkInDate` DATE NOT NULL,
  `checkOutDate` DATE NOT NULL,
  `totalPrice` DECIMAL(10, 2) NOT NULL,
  `bookingDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, -- Timestamp of booking creation
  `cancellation` BOOLEAN NOT NULL DEFAULT FALSE, -- Flag for soft delete
  PRIMARY KEY (`idBooking`),
  CONSTRAINT `fk_booking_registered_user` FOREIGN KEY (`idRegisteredUser`) REFERENCES `RegisteredUser` (`idRegisteredUser`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_booking_room` FOREIGN KEY (`idRoom`) REFERENCES `Room` (`idRoom`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for `ExtraService`
--
CREATE TABLE `ExtraService` (
  `idExtraService` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL UNIQUE,
  `description` TEXT,
  `price` DECIMAL(10, 2) NOT NULL,
  PRIMARY KEY (`idExtraService`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Linking table structure `Booking_ExtraService`
-- Many-to-Many relationship between Booking and ExtraService.
--
CREATE TABLE `Booking_ExtraService` (
  `idBooking` INT(11) NOT NULL,
  `idExtraService` INT(11) NOT NULL,
  PRIMARY KEY (`idBooking`, `idExtraService`), -- Composite key
  CONSTRAINT `fk_be_booking` FOREIGN KEY (`idBooking`) REFERENCES `Booking` (`idBooking`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_be_extra_service` FOREIGN KEY (`idExtraService`) REFERENCES `ExtraService` (`idExtraService`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for `Review`
--
CREATE TABLE `Review` (
  `idReview` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `rating` INT(11) NOT NULL CHECK (`rating` >= 1 AND `rating` <= 5), -- E.g., from 1 to 5 stars
  `description` TEXT,
  `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idRegisteredUser` INT(11) NOT NULL -- FK to the registered user who left the review
  PRIMARY KEY (`idReview`),
  CONSTRAINT `fk_review_registered_user` FOREIGN KEY (`idRegisteredUser`) REFERENCES `RegisteredUser` (`idRegisteredUser`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
