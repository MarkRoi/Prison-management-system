-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 03, 2022 at 01:25 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prison_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `cell`
--

DROP TABLE IF EXISTS `cell`;
CREATE TABLE IF NOT EXISTS `cell` (
  `cellno` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(15) NOT NULL,
  PRIMARY KEY (`cellno`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cell`
--

INSERT INTO `cell` (`cellno`, `section`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'A'),
(4, 'A'),
(5, 'B'),
(6, 'B'),
(7, 'B'),
(8, 'B'),
(9, 'C'),
(10, 'C'),
(11, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `prisoner`
--

DROP TABLE IF EXISTS `prisoner`;
CREATE TABLE IF NOT EXISTS `prisoner` (
  `prisonerId` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(9) NOT NULL,
  `nin` varchar(30) DEFAULT NULL,
  `residence` varchar(50) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `crimedetails` varchar(50) NOT NULL,
  `arrivaldate` date DEFAULT NULL,
  `height` varchar(15) NOT NULL,
  `prisonerweight` varchar(15) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `country` varchar(20) NOT NULL,
  `photo` text,
  `punishmentduration` varchar(11) NOT NULL,
  `cellno` int(11) NOT NULL,
  `pmId` int(11) NOT NULL,
  `ADemail` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`prisonerId`),
  KEY `cellno` (`cellno`),
  KEY `pmId` (`pmId`),
  KEY `ADemail` (`ADemail`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prisoner`
--

INSERT INTO `prisoner` (`prisonerId`, `fullname`, `age`, `gender`, `nin`, `residence`, `contact`, `crimedetails`, `arrivaldate`, `height`, `prisonerweight`, `remarks`, `country`, `photo`, `punishmentduration`, `cellno`, `pmId`, `ADemail`) VALUES
(1, 'Mpale Franscis', 65, 'Male', 'CM34875434456JH', 'Mityana', '0755060662', 'Thief', '2021-12-13', '5ft', '85kg', 'very rude', 'Uganda', '0295690b06d598ca4af51229b07610b8.png', '8 months', 2, 1, ''),
(2, 'Sekide John', 65, 'Male', 'CM345678909LT94', 'Mityana', '0789755664', 'Hit and run', '2021-12-21', '5.6ft', '72kg', 'Grey hair', 'Uganda', '912cc31797c31ceff80f342b2c104888.jpg', '4months', 2, 1, 'kalemamark46@gmail.com'),
(3, 'Mary Stuart Kasiita', 28, 'Female', 'CM876545678887', 'Kiwatule', '0786325664', 'Assault', '2021-12-08', '4.8ft', '60kg', 'Brown', 'Uganda', 'anime-wallpapers-anime-nanatsu-no-taizai-meliodas.jpg', '5yrs', 3, 1, ''),
(4, 'Bob Marley', 45, 'Male', 'CMF0987909KT89', 'Jinja', '0798644245', 'Theft', '2022-01-13', '5ft', '70kg', 'Fat', 'Uganda', 'attack-titan-theme-30.jpg', '4 months', 5, 1, ''),
(5, 'muhingo kenneth', 45, 'Male ', 'CM345678909HT45 ', 'Kampala ', '0786342567 ', 'Armed robbery', '2022-03-15', '5ft ', '72kg ', 'short', 'Uganda ', '', '1yr ', 2, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `prisonmanager`
--

DROP TABLE IF EXISTS `prisonmanager`;
CREATE TABLE IF NOT EXISTS `prisonmanager` (
  `pmId` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `pass` varchar(15) DEFAULT NULL,
  `verpass` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`pmId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prisonmanager`
--

INSERT INTO `prisonmanager` (`pmId`, `fullname`, `username`, `email`, `pass`, `verpass`) VALUES
(1, 'Aareba Tedy', 'administrator', 'aareba.t@mail.com', 'administrator', 'administrator'),
(2, 'George', 'uyttuyioi', 'hns@gmail.com', 'home', 'home'),
(3, 'Kalanzi', 'Ebenezer', 'kalaebs@gmail.com', 'Ebenezer', 'Eben'),
(4, 'kalema Mark', 'Markroi', 'kalemamark01@gmail.com', 'kalema1', 'kalema1'),
(5, 'Mukasa Fred', 'mbh', 'bnb', '123456', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `staffid` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `nin` varchar(30) NOT NULL,
  `email` varchar(25) NOT NULL,
  `contact` varchar(25) NOT NULL,
  `residence` varchar(50) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `duty` varchar(20) NOT NULL,
  `photo` text,
  `dob` date NOT NULL,
  `pmId` int(11) NOT NULL,
  `ADemail` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`staffid`),
  KEY `pmid` (`pmId`),
  KEY `ADemail` (`ADemail`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffid`, `fullname`, `age`, `gender`, `nin`, `email`, `contact`, `residence`, `nationality`, `duty`, `photo`, `dob`, `pmId`, `ADemail`) VALUES
(1, 'Donald Muwanguzi', 27, 'Male', 'CMF0987909KT89', 'd.mukisa@gmail.com', '0789755664', 'Mukono', 'UGANDAN', 'Security', 'anime-4k-image-download-hd-wallpaper-preview.jpg', '2021-12-13', 1, 'kalemamark46@gmail.com'),
(2, 'Mary Jane Louis', 29, 'Female', 'CM987654334567HD23', 'maryjane@hotmail.com', '0784352685', 'Muyuga', 'USA', 'IT consultant', '09a4582c26324a6077dd920438b53e9a.png', '2021-12-01', 1, ''),
(5, 'Dominic Mukiibi', 50, 'Male', 'CM3465435469HT98', 'don.frg55@gmail.com', '07756325864', 'Banda', 'Ugandan', 'Supervisor', 'thumb-350-681016.jpg', '1970-03-24', 1, ''),
(6, 'Mukene Pius', 30, 'Male', 'CMF2347909LT34', 'Mukpius30@gmail.com', '0789834537', 'Bombo', 'Ugandan  ', 'Cook', 'images.jpg', '1990-03-16', 1, ''),
(7, 'Atim Dorothy', 30, 'Female ', 'CM345678909HT45 ', 'atimd@gmail.com', '0786342567 ', 'Kololo', 'Ugandan    ', 'Cleaner', 'anime-wallpapers-anime-nanatsu-no-taizai-meliodas.jpg', '1990-08-22', 1, ''),
(9, 'Sekide John ', 26, 'Male ', 'CMF0987909KT89 ', 'sek.john@gmail.com ', '0786342567  ', 'Kisaasi', 'Ugandan ', 'Security ', 'attack-on-titan-anime-sword-hd-wallpaper-preview.jpg', '2022-03-02', 1, ''),
(10, 'Sekibije Daniel', 26, 'Male ', 'CM345678909HT45 ', 'sek.da@gmail.com', '0789755664 ', 'Makerere', 'Kenyan', 'Cleaner ', '09a4582c26324a6077dd920438b53e9a.png', '2022-03-14', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `visitation`
--

DROP TABLE IF EXISTS `visitation`;
CREATE TABLE IF NOT EXISTS `visitation` (
  `prisonerId` int(11) NOT NULL,
  `vistorID` int(11) NOT NULL,
  `visitDate` date DEFAULT NULL,
  PRIMARY KEY (`prisonerId`,`vistorID`),
  KEY `visitorID` (`vistorID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitation`
--

INSERT INTO `visitation` (`prisonerId`, `vistorID`, `visitDate`) VALUES
(1, 1, '2022-01-03'),
(2, 2, '2022-02-15'),
(1, 3, '2022-02-15'),
(6, 4, '2022-02-16'),
(2, 5, '2022-02-17'),
(6, 6, '2022-03-08');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

DROP TABLE IF EXISTS `visitor`;
CREATE TABLE IF NOT EXISTS `visitor` (
  `vistorID` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(25) NOT NULL,
  `gender` varchar(9) NOT NULL,
  `nin` varchar(30) NOT NULL,
  `residence` varchar(50) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `relationship` varchar(30) DEFAULT NULL,
  `prisonerId` int(11) DEFAULT NULL,
  `visitDate` date DEFAULT NULL,
  PRIMARY KEY (`vistorID`),
  KEY `prisonerId` (`prisonerId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`vistorID`, `fullname`, `gender`, `nin`, `residence`, `nationality`, `contact`, `relationship`, `prisonerId`, `visitDate`) VALUES
(1, 'Mondo Paul ', 'Male  ', 'CM345678909HT45 ', 'Naalya', 'Ugandan   ', '0755060456', 'Cousin ', 1, '2022-02-03'),
(2, 'Kamoga Heinrich', 'Male', 'CM343458909KT45', 'Bombo', 'Ugandan    ', '0768464245', 'Son', 2, '2022-02-15'),
(3, 'Nelson mandela', 'Male ', '876r56tdfuinhgftc', 'Soweto', 'South Africa ', '0778960662', 'Friend', 1, '2022-02-15'),
(4, 'Okello Brian', 'Male ', 'CM345656809HT64', 'Lira', 'Ugandan  ', '0789853544', 'Cousin', 6, '2022-02-16'),
(5, 'Achom Martha', 'Female ', 'CMF0086909UH34', 'Gulu', 'Ugandan     ', '0798654345', 'Sister', 2, '2022-02-17'),
(6, 'Mukwaaya Paul', 'Male ', 'CM345678909HT45  ', 'Naalya', 'Ugandan    ', '0786342567 ', 'Brother ', 6, '2022-03-08'),
(7, 'katami', 'female', 'CM345678909HT45', 'kampala', 'Ugandan', '0786342567 ', 'sister', 1, '2022-03-08');

-- --------------------------------------------------------

--
-- Table structure for table `webadmin`
--

DROP TABLE IF EXISTS `webadmin`;
CREATE TABLE IF NOT EXISTS `webadmin` (
  `fullname` varchar(30) NOT NULL,
  `ADemail` varchar(40) NOT NULL,
  PRIMARY KEY (`ADemail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webadmin`
--

INSERT INTO `webadmin` (`fullname`, `ADemail`) VALUES
('Kalema Mark', 'kalemamark46@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
