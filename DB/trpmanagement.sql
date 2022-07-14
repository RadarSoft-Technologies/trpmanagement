-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 14, 2022 at 04:41 AM
-- Server version: 5.7.34-log
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trpmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPassword` varchar(255) NOT NULL,
  `adminStatus` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminEmail`, `adminPassword`, `adminStatus`) VALUES
(1, 'admin@gmail.com', '4297f44b13955235245b2497399d7a93', 1);

-- --------------------------------------------------------

--
-- Table structure for table `buyerfiles`
--

CREATE TABLE `buyerfiles` (
  `buyerfileId` int(11) NOT NULL,
  `buyerfileBid` int(11) NOT NULL,
  `buyerfilePath` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `buyerId` int(11) NOT NULL,
  `buyerCompanyname` text,
  `buyerHoaddress` text,
  `buyerGstno` varchar(100) DEFAULT NULL,
  `buyerFullname` varchar(255) DEFAULT NULL,
  `buyerPhone` varchar(11) DEFAULT NULL,
  `buyerEmail` varchar(255) DEFAULT NULL,
  `buyerFile` varchar(255) DEFAULT NULL,
  `buyerWebsite` text,
  `buyerClienttype` text,
  `buyerDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categorymaster`
--

CREATE TABLE `categorymaster` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryCode` varchar(255) DEFAULT NULL,
  `categoryImage` varchar(255) DEFAULT NULL,
  `categoryDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `categoryIs_home` varchar(2) DEFAULT NULL,
  `categoryIs_delete` int(2) NOT NULL DEFAULT '0',
  `categoryStatus` int(11) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phoneno` varchar(255) DEFAULT NULL,
  `whoareyou` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `categoryID` varchar(255) DEFAULT NULL,
  `productProducttypeid` varchar(255) DEFAULT NULL,
  `productname` varchar(255) DEFAULT NULL,
  `productweight` varchar(255) DEFAULT NULL,
  `mrp` varchar(255) DEFAULT NULL,
  `images` longtext,
  `productDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `productStatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `producttypeID` int(11) NOT NULL,
  `producttypeName` varchar(255) DEFAULT NULL,
  `producttypeImage` varchar(255) DEFAULT NULL,
  `producttypeDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `typeId_delete` int(2) NOT NULL DEFAULT '0',
  `producttypeStatus` int(11) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `projectenquiry`
--

CREATE TABLE `projectenquiry` (
  `penquiryId` int(11) NOT NULL,
  `penquiryProjectname` text,
  `penquiryLocation` text,
  `penquiryProjecttype` text,
  `penquiryMaterials` text,
  `penquiryPhone` varchar(15) DEFAULT NULL,
  `penquiryEmail` varchar(255) DEFAULT NULL,
  `penquiryClient` text,
  `penquiryProductids` text NOT NULL,
  `penquiryDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `servicesId` int(11) NOT NULL,
  `servicesName` varchar(255) DEFAULT NULL,
  `servicesCount` varchar(255) DEFAULT NULL,
  `servicesType` varchar(255) DEFAULT NULL,
  `servicesMessage` text,
  `servicesDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `servicesIs_delete` int(2) NOT NULL DEFAULT '0',
  `servicesStatus` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`servicesId`, `servicesName`, `servicesCount`, `servicesType`, `servicesMessage`, `servicesDate`, `servicesIs_delete`, `servicesStatus`) VALUES
(1, 'Material Estimated', '121', 'Cr', 'For M.E.P.F Projects', '2022-06-28 12:34:41', 0, 1),
(2, 'PAN India Vendor Base ', '1442', 'Nos', 'Manufacturers, Distributors & Dealers', '2022-06-28 12:35:27', 0, 1),
(3, 'Projects Estimated', '304', 'Nos', 'PAN INDIA Projects Across Various Sectors & Services', '2022-06-28 12:35:48', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `testimonialId` int(11) NOT NULL,
  `testimonialName` varchar(255) DEFAULT NULL,
  `testimonialPost` varchar(255) DEFAULT NULL,
  `testimonialMessage` text,
  `testimonialDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `testimonialIs_delete` int(2) NOT NULL DEFAULT '0',
  `testimonialStatus` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`testimonialId`, `testimonialName`, `testimonialPost`, `testimonialMessage`, `testimonialDate`, `testimonialIs_delete`, `testimonialStatus`) VALUES
(1, 'STEVE JOBS', 'CEO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '2022-06-28 12:05:27', 0, 1),
(2, ' STEVE JOBSb', 'CEO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '2022-06-28 12:15:03', 0, 1),
(3, 'STEVE JOBSc', 'CEO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '2022-06-28 12:16:03', 0, 1),
(4, 'STEVE JOBSd	', 'CEO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '2022-06-28 12:16:26', 0, 1),
(5, 'STEVE JOBSe	', 'CEO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '2022-06-28 12:16:50', 0, 1),
(6, 'Mr Mukesh Kumar', 'Proprietor ', 'Concept is really futuristic ,getting various materials under one roof and at competitive rates.', '2022-06-28 12:17:13', 0, 1),
(7, 'Mr Sunil', 'Director HVAC Company', 'They have a transparent and professional way of doing the costing of the project. They are quite prompt at their services.', '2022-06-28 12:17:37', 0, 1),
(8, 'Manav', 'PurchaseExecutive', 'TRP has got an excellent and seamless methodology', '2022-06-28 12:17:55', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendorfiles`
--

CREATE TABLE `vendorfiles` (
  `vendorfileId` int(11) NOT NULL,
  `vendorfileVid` int(11) NOT NULL,
  `vendorfilePath` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vendorId` int(11) NOT NULL,
  `vendorCompanyname` text,
  `vendorHoaddress` text,
  `vendorGstno` varchar(100) DEFAULT NULL,
  `vendorFullname` varchar(255) DEFAULT NULL,
  `vendorPhone` varchar(11) DEFAULT NULL,
  `vendorEmail` varchar(255) DEFAULT NULL,
  `vendorFile` varchar(255) DEFAULT NULL,
  `vendorWebsite` text,
  `vendorMaterials` text,
  `vendorDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `buyerfiles`
--
ALTER TABLE `buyerfiles`
  ADD PRIMARY KEY (`buyerfileId`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`buyerId`);

--
-- Indexes for table `categorymaster`
--
ALTER TABLE `categorymaster`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`producttypeID`);

--
-- Indexes for table `projectenquiry`
--
ALTER TABLE `projectenquiry`
  ADD PRIMARY KEY (`penquiryId`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`servicesId`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`testimonialId`);

--
-- Indexes for table `vendorfiles`
--
ALTER TABLE `vendorfiles`
  ADD PRIMARY KEY (`vendorfileId`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendorId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buyerfiles`
--
ALTER TABLE `buyerfiles`
  MODIFY `buyerfileId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `buyerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categorymaster`
--
ALTER TABLE `categorymaster`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `producttypeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projectenquiry`
--
ALTER TABLE `projectenquiry`
  MODIFY `penquiryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `servicesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `testimonialId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vendorfiles`
--
ALTER TABLE `vendorfiles`
  MODIFY `vendorfileId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vendorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
