-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2018 at 06:36 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fmautomarketdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `carreviews`
--

CREATE TABLE `carreviews` (
  `ReviewID` int(11) NOT NULL,
  `MemberID` int(11) NOT NULL,
  `StockNumber` int(11) NOT NULL,
  `Stars` enum('1','2','3','4','5') NOT NULL,
  `Review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carreviews`
--

INSERT INTO `carreviews` (`ReviewID`, `MemberID`, `StockNumber`, `Stars`, `Review`) VALUES
(1, 9, 1, '5', 'Nice Car, I liked'),
(2, 1, 1, '2', 'Very Expensive'),
(3, 3, 1, '3', 'Is not big deal for the price'),
(4, 9, 1, '2', 'sd'),
(5, 9, 1, '5', 'I would like to buy this car but is too expensive'),
(6, 9, 16, '5', 'Is amazing car'),
(7, 9, 6, '2', 'I don\'t like this monster'),
(8, 4, 1, '4', 'Wow, beautiful!!!!'),
(9, 4, 15, '5', 'Eco cart and smart'),
(10, 4, 7, '3', 'I like this one to buy to my son.  It is good to start.');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `StockNumber` int(11) NOT NULL COMMENT 'Stock Number (Id)',
  `Make` text NOT NULL COMMENT 'Make: (e.g. Audi, Mitsubshi, etc.)',
  `Model` text NOT NULL COMMENT 'Model: (e.g. Q5, ASX, etc.)',
  `Status` enum('Used','New') NOT NULL DEFAULT 'Used' COMMENT 'Status: (Used or New)',
  `RegYear` year(4) NOT NULL COMMENT 'Registration-year: (e.g. 2015)',
  `BodyType` enum('Truck','SUV','Minivan','Sedan','Hatchback','Coupe','Sport','Convertible','Other') NOT NULL COMMENT 'Body Type: (Truck, SUV, Minivan, Seden, Hatchback, Coupe, etc)',
  `Engine` enum('3 Cyl','4 Cyl','6 Cyl','8 Cyl','Electric') NOT NULL COMMENT 'Engine: (e.g. V-6 cyl, V-8 cyl, etc.)',
  `DriveTrain` enum('AWD','FWD','RWD') NOT NULL COMMENT 'Drivetrain : (AWD, FWD )',
  `Transmission` enum('Manual','Automatic') NOT NULL COMMENT 'Transmission : (Automatic or Manual)',
  `FuelType` enum('Gasoline','Diesel','Electric','Biodiesel') NOT NULL COMMENT 'Fuel Type : (Gasoline, Diesel, Biodiesel)',
  `OldPrice` double NOT NULL,
  `CurrentPrice` double NOT NULL,
  `Mileage` double NOT NULL COMMENT 'Mileage/hr(km): (e.g. 10000)',
  `Doors` enum('2','3','4+') NOT NULL COMMENT 'Doors: (e.g. 2, 4 , etc.)',
  `Seats` enum('2','3','4','5','6','7+') NOT NULL COMMENT 'Seats: (e.g. 2, 4 , 7, etc.)',
  `ExtColor` enum('White','Black','Beige','Red','Blue','Green','Grey','Yellow','Brown','Orange','Silver') NOT NULL COMMENT 'Exterior Colour (e.g. White)',
  `IntColor` enum('White','Black','Beige','Red','Blue','Green','Grey','Yellow','Brown','Orange','Silver') NOT NULL COMMENT 'Interior Colour (e.g. Black)',
  `Photo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`StockNumber`, `Make`, `Model`, `Status`, `RegYear`, `BodyType`, `Engine`, `DriveTrain`, `Transmission`, `FuelType`, `OldPrice`, `CurrentPrice`, `Mileage`, `Doors`, `Seats`, `ExtColor`, `IntColor`, `Photo`) VALUES
(1, 'Audi', 'Q5', 'New', 2018, 'SUV', '4 Cyl', 'AWD', 'Automatic', 'Gasoline', 110000, 98000, 0, '4+', '5', 'Black', 'Black', 'CarStock1.jpg'),
(2, 'Audi', 'TT', 'Used', 2017, 'Coupe', '4 Cyl', 'RWD', 'Automatic', 'Gasoline', 68950, 51715, 15000, '4+', '5', 'Grey', 'Black', 'CarStock2.jpg'),
(3, 'Audi', 'A4', 'Used', 2012, 'Coupe', '4 Cyl', 'FWD', 'Manual', 'Gasoline', 16500, 15000, 93000, '4+', '5', 'Grey', 'Grey', 'CarStock3.jpg'),
(4, 'Audi', 'Q5', 'Used', 2012, 'SUV', '4 Cyl', 'AWD', 'Automatic', 'Gasoline', 22000, 19995, 105000, '4+', '5', 'Grey', 'Beige', 'CarStock4.jpg'),
(5, 'Ford', 'Escape SE', 'Used', 2015, 'SUV', '4 Cyl', 'FWD', 'Automatic', 'Gasoline', 24888, 23888, 10500, '4+', '5', 'Red', 'Beige', 'CarStock5.jpg'),
(6, 'Ford', 'F-250', 'New', 2018, 'Truck', '6 Cyl', 'AWD', 'Automatic', 'Gasoline', 116000, 116000, 0, '4+', '4', 'White', 'Black', 'CarStock6.jpg'),
(7, 'Ford', 'Fusion SE', 'Used', 2010, 'Other', '4 Cyl', 'RWD', 'Automatic', 'Gasoline', 10500, 7998, 65000, '4+', '5', 'Red', 'Grey', 'CarStock7.jpg'),
(8, 'Ford', 'Mustang', 'Used', 1970, 'Coupe', '8 Cyl', 'RWD', 'Manual', 'Gasoline', 45000, 42300, 250000, '2', '5', 'Brown', 'Brown', 'CarStock8.jpg'),
(9, 'Hyundai', 'Elantra', 'Used', 2017, 'Other', '4 Cyl', 'RWD', 'Automatic', 'Gasoline', 17987, 17987, 32000, '4+', '5', 'Grey', 'Black', 'CarStock9.jpg'),
(10, 'Hyundai', 'Accent SE', 'Used', 2015, 'Hatchback', '4 Cyl', 'RWD', 'Automatic', 'Gasoline', 12789, 12789, 35685, '4+', '4', 'Red', 'Grey', 'CarStock10.jpg'),
(11, 'Hyundai', 'Entourage', 'Used', 2007, 'Minivan', '6 Cyl', 'RWD', 'Automatic', 'Gasoline', 6500, 4465, 135000, '4+', '7+', 'Blue', 'Grey', 'CarStock11.jpg'),
(12, 'Hyundai', 'Tucson', 'Used', 2017, 'SUV', '4 Cyl', 'FWD', 'Manual', 'Gasoline', 29419, 26169, 207, '4+', '5', 'White', 'Black', 'CarStock12.jpg'),
(13, 'Jeep', 'Wrangler', 'Used', 2012, 'SUV', '6 Cyl', 'FWD', 'Manual', 'Gasoline', 26988, 26988, 91905, '4+', '5', 'Red', 'Beige', 'CarStock13.jpg'),
(14, 'Jeep', 'Renegade', 'Used', 2017, 'SUV', '4 Cyl', 'AWD', 'Automatic', 'Gasoline', 29565, 24495, 22799, '4+', '5', 'Orange', 'Black', 'CarStock14.jpg'),
(15, 'Tesla', 'S P75D', 'Used', 2017, 'Other', 'Electric', 'AWD', 'Automatic', 'Electric', 115000, 105000, 6000, '4+', '5', 'Black', 'Black', 'CarStock15.jpg'),
(16, 'Tesla', 'X 90 D', 'New', 2018, 'SUV', 'Electric', 'AWD', 'Automatic', 'Electric', 139000, 139000, 0, '4+', '5', 'White', 'Beige', 'CarStock16.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `favoritescars`
--

CREATE TABLE `favoritescars` (
  `RefFavorite` int(64) NOT NULL,
  `MemberID` int(64) NOT NULL,
  `StockNumber` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favoritescars`
--

INSERT INTO `favoritescars` (`RefFavorite`, `MemberID`, `StockNumber`) VALUES
(46, 4, 9),
(47, 4, 15),
(48, 4, 1),
(57, 1, 2),
(60, 1, 3),
(61, 1, 16),
(62, 9, 1),
(64, 9, 16),
(65, 9, 6);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `MemberID` int(64) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`MemberID`, `FirstName`, `LastName`, `Username`, `Password`, `email`) VALUES
(1, 'Francisco', 'Maldonado', 'fmtchicho', 'Fmt12624865', 'fmtchicho@gmail.com'),
(2, 'Wendy', 'Cahuano', 'wecleon', '220379', 'wecleon@yahoo.net'),
(3, 'Carlo', 'Maldonado', 'CEMC', '100310', 'cemc@hotmail.com'),
(4, 'John', 'Smith', 'jsmith', '12345', 'jsmith@whatever.net'),
(7, 'Clark', 'Kent', 'steelman', '1234', 'superman@kripton.net'),
(8, 'Donald', 'Trump', 'badBoss', '1234', 'dtrump@withehouse.com'),
(9, 'Justin', 'Trudeau', 'jtrudeau', '12345', 'jtrudeau@jemesouviens.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carreviews`
--
ALTER TABLE `carreviews`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `FK_StockNumber` (`StockNumber`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`StockNumber`);

--
-- Indexes for table `favoritescars`
--
ALTER TABLE `favoritescars`
  ADD PRIMARY KEY (`RefFavorite`),
  ADD KEY `StockNumber` (`StockNumber`) USING BTREE,
  ADD KEY `MemberID` (`MemberID`) USING BTREE;

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`MemberID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carreviews`
--
ALTER TABLE `carreviews`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `StockNumber` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Stock Number (Id)', AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `favoritescars`
--
ALTER TABLE `favoritescars`
  MODIFY `RefFavorite` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `MemberID` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carreviews`
--
ALTER TABLE `carreviews`
  ADD CONSTRAINT `FK_StockNumber` FOREIGN KEY (`StockNumber`) REFERENCES `cars` (`StockNumber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favoritescars`
--
ALTER TABLE `favoritescars`
  ADD CONSTRAINT `favoritescars_ibfk_1` FOREIGN KEY (`StockNumber`) REFERENCES `cars` (`StockNumber`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
