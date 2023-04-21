-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2023 at 12:11 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `checkapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_record`
--

CREATE TABLE `cart_record` (
  `Cart_ID` int(11) NOT NULL,
  `Patient_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Pharmacy_ID` int(11) NOT NULL,
  `Product_Photo` varchar(100) NOT NULL,
  `Product_Name` varchar(100) NOT NULL,
  `Product_Price` decimal(7,2) NOT NULL,
  `Total_Price` decimal(7,2) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Product_Stocks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_record`
--

INSERT INTO `cart_record` (`Cart_ID`, `Patient_ID`, `Product_ID`, `Pharmacy_ID`, `Product_Photo`, `Product_Name`, `Product_Price`, `Total_Price`, `Quantity`, `Product_Stocks`) VALUES
(281, 37, 30, 4, '62668-lagundi.png', 'LAGUNDI HERBAL CAPSULE ', '133.00', '133.00', 1, 85),
(293, 37, 46, 4, '76324-cetirizene.png', 'Cetirizine hydrochloride 10mg 1 Tablet ', '15.00', '150.00', 10, 46),
(294, 37, 46, 4, '76324-cetirizene.png', 'Cetirizine hydrochloride 10mg 1 Tablet ', '15.00', '15.00', 1, 46),
(362, 14, 48, 4, '9223-decolgen.png', 'Decolgen Forte   (20 Tablet)', '40.00', '120.00', 3, 498),
(363, 26, 48, 4, '9223-decolgen.png', 'Decolgen Forte   (20 Tablet)', '40.00', '80.00', 2, 498),
(365, 26, 30, 4, '62668-lagundi.png', 'LAGUNDI HERBAL CAPSULE ', '133.00', '133.00', 1, 73);

-- --------------------------------------------------------

--
-- Table structure for table `consultation_record`
--

CREATE TABLE `consultation_record` (
  `Consultation_ID` int(11) NOT NULL,
  `Patient_ID` int(11) NOT NULL,
  `Doctor_ID` int(11) NOT NULL,
  `Doctor_Name` varchar(150) NOT NULL,
  `Patient_Photo` varchar(50) NOT NULL,
  `FirstName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `Gender` varchar(25) DEFAULT NULL,
  `Age` varchar(50) NOT NULL,
  `Symptom` varchar(1000) DEFAULT NULL,
  `Other_Symptom` varchar(500) NOT NULL,
  `AppointmentDate` datetime DEFAULT NULL,
  `Consultation_Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consultation_record`
--

INSERT INTO `consultation_record` (`Consultation_ID`, `Patient_ID`, `Doctor_ID`, `Doctor_Name`, `Patient_Photo`, `FirstName`, `LastName`, `Gender`, `Age`, `Symptom`, `Other_Symptom`, `AppointmentDate`, `Consultation_Status`) VALUES
(133, 26, 12, 'Lexi Lore ', '4364-nami1.jpg', 'Corina', 'Bender', 'Female', '32', 'Sweating, Headache', 'fsaasdsadsa', '2022-11-02 23:04:00', 1),
(135, 27, 15, 'Klemens Wilke ', '45853-bagyo.jpg', 'Corina', 'Bender', 'Female', '51', 'Headache', 'Hahahs', '2022-11-06 23:49:00', 1),
(148, 14, 19, ' Kilimanjaro Tiwaquen ', '97350-mahrc.jpg', 'Ivan Mharc', 'Maglangit', 'Male', '25', 'Sweating, Headache', 'GG', '2022-12-30 11:40:00', 1),
(149, 26, 19, ' Kilimanjaro Tiwaquen ', '90409-b4603c7c69c40401efded3f13f5540f0.gif', 'Corina', 'Bender', 'Female', '32', 'Sweating', 'I have fever for 5 days', '2022-12-16 16:51:00', 1),
(151, 14, 19, ' Kilimanjaro Tiwaquen ', '98051-e5c02c2124bb831f9c6f4e9c2a523ab7.jpg', 'Ivan Mharc', 'Maglangit', 'Male', '22', 'Headache, Muscle aches', 'laban akong ulo!', '2023-01-06 00:04:00', 1),
(154, 14, 19, ' Kilimanjaro Tiwaquen ', '98051-e5c02c2124bb831f9c6f4e9c2a523ab7.jpg', 'Ivan Mharc', 'Maglangit', 'Male', '22', 'Headache, Sweating', '', '2023-01-13 16:40:00', 1),
(155, 14, 19, ' Kilimanjaro Tiwaquen ', '98051-e5c02c2124bb831f9c6f4e9c2a523ab7.jpg', 'Ivan Mharc', 'Maglangit', 'Male', '22', 'Sweating, Headache', 'dasdsadsa', '2023-01-12 05:10:00', 1),
(156, 14, 19, ' Kilimanjaro Tiwaquen ', '98051-e5c02c2124bb831f9c6f4e9c2a523ab7.jpg', 'Ivan Mharc', 'Maglangit', 'Male', '22', 'Sweating, Headache', 'dasdasdas', '2023-01-13 21:10:00', 1),
(157, 14, 19, ' Kilimanjaro Tiwaquen ', '98051-e5c02c2124bb831f9c6f4e9c2a523ab7.jpg', 'Ivan Mharc', 'Maglangit', 'Male', '22', 'Sweating, Headache', 'fhfghfhgfghgh', '2023-01-12 16:10:00', 1),
(158, 14, 19, ' Kilimanjaro Tiwaquen ', '98051-e5c02c2124bb831f9c6f4e9c2a523ab7.jpg', 'Ivan Mharc', 'Maglangit', 'Male', '22', 'Sweating, Headachedd', 'dasdasda', '2023-01-12 23:52:00', 1),
(159, 14, 22, 'Rey Gadgude ', '98051-e5c02c2124bb831f9c6f4e9c2a523ab7.jpg', 'Ivan Mharc', 'Maglangit', 'Male', '22', 'Sweating, Headache', 'Hahaha', '2023-01-13 04:17:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_record`
--

CREATE TABLE `doctor_record` (
  `Doctor_ID` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `MiddleName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Medical_Specialization` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Birthdate` varchar(50) NOT NULL,
  `Age` varchar(50) NOT NULL,
  `Province` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Contact_No` varchar(20) NOT NULL,
  `Photo` varchar(200) NOT NULL,
  `Start_Time` time NOT NULL,
  `End_Time` time NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `User_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_record`
--

INSERT INTO `doctor_record` (`Doctor_ID`, `FirstName`, `MiddleName`, `LastName`, `Medical_Specialization`, `Gender`, `Birthdate`, `Age`, `Province`, `City`, `Contact_No`, `Photo`, `Start_Time`, `End_Time`, `Email`, `Password`, `User_status`) VALUES
(15, 'Klemens', 'kenedy', 'Wilke', ' Internal Medicine', 'Male', '11/13/1992', '30', 'Agusan del Sur', 'Bunawan', '456456', '69756-doctrrr.jpg', '10:00:00', '04:00:00', 'klemens@yahoo.com', '202cb962ac59075b964b07152d234b70', 'inactive'),
(16, 'krizzle ', 'f', ' luna', ' General Medicine', 'Female', '11/23/1989', '33', 'Metro Manila', 'Manila', '456456', '31675-krizzle.jpg', '08:00:00', '12:00:00', 'krizzle@gmail.com', '202cb962ac59075b964b07152d234b70', 'inactive'),
(17, 'Bi', 'A', 'Avinash', ' Internal Medicine', 'Male', '11/10/1994', '28', 'Batangas', 'Batangas City', '09454545454', '92755-avinash.jpg', '08:00:00', '13:00:00', 'avinash@gmail.com', '202cb962ac59075b964b07152d234b70', 'inactive'),
(18, 'Emeka', 'o', 'Okorocha', ' General Medicine', 'Male', '12/08/1983', '39', 'Bukidnon', 'Sumilao', '45456456456456', '97742-emeka.jpg', '04:00:00', '10:00:00', 'emeka@gmail.com', '202cb962ac59075b964b07152d234b70', 'inactive'),
(19, ' Kilimanjaro', 'T', 'Tiwaquen', ' Physician', 'Male', '11/10/1989', '33', 'Metro Manila', 'Manila', '45456456456', '18210-klimanguru.jpeg', '08:00:00', '17:00:00', 'kilimanguru@gmail.com', '202cb962ac59075b964b07152d234b70', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `invitation_record`
--

CREATE TABLE `invitation_record` (
  `Invitation_ID` int(11) NOT NULL,
  `Patient_ID` int(11) NOT NULL,
  `Doctor_ID` int(11) NOT NULL,
  `Doctor_photo` varchar(50) NOT NULL,
  `Doctor_Name` varchar(100) NOT NULL,
  `Recipient_Name` varchar(100) NOT NULL,
  `MeetCode` varchar(150) NOT NULL,
  `Messages` varchar(500) NOT NULL,
  `Invitation_Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invitation_record`
--

INSERT INTO `invitation_record` (`Invitation_ID`, `Patient_ID`, `Doctor_ID`, `Doctor_photo`, `Doctor_Name`, `Recipient_Name`, `MeetCode`, `Messages`, `Invitation_Status`) VALUES
(64, 27, 15, '69756-doctrrr.jpg', 'Klemens Wilke ', 'Corina Bender', 'https://meet.google.com/sgs-rcfo-vgm?authuser=0', '', 1),
(77, 27, 15, '69756-doctrrr.jpg', 'Klemens Wilke ', 'Corina Bender', 'https://meet.google.com/sgs-rcfo-vgm?authuser=0', '', 1),
(79, 27, 15, '69756-doctrrr.jpg', 'Klemens Wilke ', 'Corina Bender', 'https://meet.google.com/sgs-rcfo-vgm?authuser=0', '', 1),
(121, 14, 19, '18210-klimanguru.jpeg', ' Kilimanjaro Tiwaquen ', 'Ivan Mharc Maglangit', 'https://meet.google.com/sgs-rcfo-vgm?authuser=0', '123321', 1),
(122, 14, 19, '18210-klimanguru.jpeg', ' Kilimanjaro Tiwaquen ', 'Ivan Mharc Maglangit', 'https://meet.google.com/azp-kuon-uhh?authuser=0&pli=1', 'dsadas', 1),
(124, 14, 19, '18210-klimanguru.jpeg', ' Kilimanjaro Tiwaquen ', 'Ivan Mharc Maglangit', 'https://meet.google.com/sgs-rcfo-vgm?authuser=0', 'dasdasdas', 1),
(128, 14, 22, '84460-team2.jpg', 'Rey Gadgude ', 'Ivan Mharc Maglangit', 'https://meet.google.com/sgs-rcfo-vgm?authuser=0', 'GFGFHGFHG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `medication_record`
--

CREATE TABLE `medication_record` (
  `Med_ID` int(11) NOT NULL,
  `Doctor_ID` int(11) NOT NULL,
  `Doctor_Photo` varchar(150) NOT NULL,
  `Doctor_Name` varchar(150) NOT NULL,
  `Patient_ID` int(11) NOT NULL,
  `Patient_Photo` varchar(150) NOT NULL,
  `Patient_Name` varchar(150) NOT NULL,
  `Symptoms` varchar(150) NOT NULL,
  `Diagnosis` varchar(300) NOT NULL,
  `Prescription` varchar(100) NOT NULL,
  `Treatment` varchar(300) NOT NULL,
  `Doctor_Signiture` varchar(150) NOT NULL,
  `Notify_Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medication_record`
--

INSERT INTO `medication_record` (`Med_ID`, `Doctor_ID`, `Doctor_Photo`, `Doctor_Name`, `Patient_ID`, `Patient_Photo`, `Patient_Name`, `Symptoms`, `Diagnosis`, `Prescription`, `Treatment`, `Doctor_Signiture`, `Notify_Status`) VALUES
(16, 19, '18210-klimanguru.jpeg', ' Kilimanjaro Tiwaquen ', 26, '90409-b4603c7c69c40401efded3f13f5540f0.gif', 'Corina Bender', 'Sweating, Other Symptoms :  I have fever for 5 days', 'G', 'Paracetamol (Biogesic), Acetaminophen, 500 mg - Tylenol', 'G', 'Doctor_uploads/639e0311afc8f.png', 1),
(17, 19, '18210-klimanguru.jpeg', ' Kilimanjaro Tiwaquen ', 26, '90409-b4603c7c69c40401efded3f13f5540f0.gif', 'Corina Bender', 'Sweating, Other Symptoms :  I have fever for 5 days', 'a', 'Paracetamol and phenylephrine - 325-1000 mg/5-10 mg - Manufacturers: Sin', 'a', 'Doctor_uploads/639e0399bc061.png', 1),
(18, 19, '18210-klimanguru.jpeg', ' Kilimanjaro Tiwaquen ', 26, '90409-b4603c7c69c40401efded3f13f5540f0.gif', 'Corina Bender', 'Sweating, Other Symptoms :  I have fever for 5 days', 'dasdasdas', 'Phenacetin - 300-600 mg - Manufacturers: Acephen', 'take 1 tablet a day', 'Doctor_uploads/639fc33cb6c07.png', 1),
(20, 19, '18210-klimanguru.jpeg', ' Kilimanjaro Tiwaquen ', 26, '90409-b4603c7c69c40401efded3f13f5540f0.gif', 'Corina Bender', 'Sweating, Other Symptoms :  I have fever for 5 days', 'dsadas', 'Cetirizine, 10 mg - Zyrtec', '3 times a day', 'Doctor_uploads/63b658b4d3724.png', 1),
(21, 19, '18210-klimanguru.jpeg', ' Kilimanjaro Tiwaquen ', 14, '98051-e5c02c2124bb831f9c6f4e9c2a523ab7.jpg', 'Ivan Mharc Maglangit', 'Headache, Muscle aches, Other Symptoms :  laban akong ulo!', 'Sever headache', 'Cetirizine, 10 mg - Zyrtec, Paracetamol (Biogesic)', '3 dose a day', 'Doctor_uploads/63ba462755450.png', 1),
(23, 19, '18210-klimanguru.jpeg', ' Kilimanjaro Tiwaquen ', 14, '98051-e5c02c2124bb831f9c6f4e9c2a523ab7.jpg', 'Ivan Mharc Maglangit', 'Sweating, Headache, Other Symptoms :  fhfghfhgfghgh', 'dasdasdsa', 'Cetirizine, 10 mg - Zyrtec', 'dasdas', 'Doctor_uploads/63c018be604b9.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_record`
--

CREATE TABLE `order_record` (
  `Order_ID` int(11) NOT NULL,
  `Transaction_ID` int(11) NOT NULL,
  `Patient_ID` int(11) NOT NULL,
  `Customer_Name` varchar(100) NOT NULL,
  `Street_Address` varchar(100) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `Contact` varchar(100) NOT NULL,
  `Pharmacy_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Product_Photo` varchar(100) NOT NULL,
  `Product_Name` varchar(100) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Total_Price` decimal(7,2) NOT NULL,
  `Payment_Method` varchar(100) NOT NULL,
  `Pickup_Datetime` datetime DEFAULT NULL,
  `Order_Date` date NOT NULL DEFAULT current_timestamp(),
  `Order_Time` time NOT NULL DEFAULT current_timestamp(),
  `Order_Status` varchar(150) NOT NULL,
  `Notify_Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_record`
--

INSERT INTO `order_record` (`Order_ID`, `Transaction_ID`, `Patient_ID`, `Customer_Name`, `Street_Address`, `Location`, `Contact`, `Pharmacy_ID`, `Product_ID`, `Product_Photo`, `Product_Name`, `Quantity`, `Total_Price`, `Payment_Method`, `Pickup_Datetime`, `Order_Date`, `Order_Time`, `Order_Status`, `Notify_Status`) VALUES
(125, 413377, 14, 'Ivan Mharc Maglangit', 'Rosalina 3 blk 21 lot 6 Baliok', 'Davao', '09696251434', 4, 46, '76324-cetirizene.png', 'Cetirizine hydrochloride 10mg 1 Tablet ', 1, '15.00', 'Cash upon pick-up', NULL, '2022-12-18', '21:26:13', 'Completed', 1),
(126, 543942, 37, 'Mharc Maglangit', 'purok sodaco, blk 23 lot 5', 'Davao del Sur, Davao City', '09696251432', 4, 30, '62668-lagundi.png', 'LAGUNDI HERBAL CAPSULE ', 15, '1995.00', 'Cash on delivery', NULL, '2022-12-18', '22:05:09', 'Completed', 1),
(127, 642448, 14, 'Ivan Mharc Maglangit', 'Sodaco', 'Bukidnon, Maramag', '09696251434', 4, 46, '76324-cetirizene.png', 'Cetirizine hydrochloride 10mg 1 Tablet ', 1, '15.00', 'Cash upon pick-up', NULL, '2022-12-18', '23:13:24', 'Completed', 1),
(128, 607911, 14, 'Ivan Mharc Maglangit', '', 'Bukidnon, Maramag', '09696251434', 4, 46, '76324-cetirizene.png', 'Cetirizine hydrochloride 10mg 1 Tablet ', 1, '15.00', 'Cash upon pick-up', NULL, '2022-12-18', '23:19:04', 'Completed', 1),
(129, 227371, 14, 'Ivan Mharc Maglangit', 'Sodaco', 'Bukidnon, Maramag', '09696251434', 4, 45, '86099-advil.png', 'Ibuprofen - Advil  200mg 10 Softgel Capsules ', 10, '875.00', 'Cash on delivery', NULL, '2022-12-19', '00:25:22', 'Completed', 1),
(131, 489705, 14, 'Ivan Mharc Maglangit', '', 'Bukidnon, Maramag', '09696251434', 4, 46, '76324-cetirizene.png', 'Cetirizine hydrochloride 10mg 1 Tablet ', 1, '15.00', 'Cash upon pick-up', NULL, '2022-12-19', '01:06:04', 'Completed', 1),
(132, 545963, 14, 'Ivan Mharc Maglangit', '', 'Bukidnon, Maramag', '09696251434', 4, 46, '76324-cetirizene.png', 'Cetirizine hydrochloride 10mg 1 Tablet ', 1, '15.00', 'Cash upon pick-up', NULL, '2022-12-19', '01:18:00', 'Completed', 1),
(133, 528297, 14, 'Ivan Mharc Maglangit', 'Rosalina 3 blk 21 lot 6 Baliok', 'Davao', '09696251434', 4, 46, '76324-cetirizene.png', 'Cetirizine hydrochloride 10mg 1 Tablet ', 10, '150.00', 'Cash upon pick-up', NULL, '2022-12-19', '12:09:47', 'Completed', 1),
(147, 174941, 26, 'Mharc Ivan Mcheaven', 'Rosalina 3 blk 21 lot 6 Baliok', 'Davao', '09696251434', 4, 46, '76324-cetirizene.png', 'Cetirizine hydrochloride 10mg 1 Tablet ', 1, '15.00', 'Cash on delivery', NULL, '2022-12-24', '11:04:55', 'Completed', 1),
(148, 335802, 14, 'Ivan Mharc Maglangit', 'Rosalina 3 blk 21 lot 6 Baliok', 'Davao', '09696251434', 4, 46, '76324-cetirizene.png', 'Cetirizine hydrochloride 10mg 1 Tablet ', 1, '15.00', 'Cash on delivery', NULL, '2022-12-27', '12:49:05', 'Completed', 1),
(149, 640122, 14, 'Ivan Mharc Maglangit', 'gg', 'Apayao, Conner', '09696251434', 4, 45, '86099-advil.png', 'Ibuprofen - Advil  200mg 10 Softgel Capsules ', 4, '350.00', 'Cash on delivery', NULL, '2023-01-04', '21:28:56', 'Completed', 1),
(159, 908720, 14, 'Ivan Mharc Maglangit', '', 'Apayao, Conner', '09696251434', 4, 45, '86099-advil.png', 'Ibuprofen - Advil  200mg 10 Softgel Capsules ', 1, '87.50', 'Cash upon pick-up', '2023-01-07 16:30:00', '2023-01-06', '02:29:31', 'Completed', 1),
(160, 602050, 14, 'Ivan Mharc Maglangit', 'rosalina 3', 'Apayao, Conner', '09696251434', 4, 46, '76324-cetirizene.png', 'Cetirizine hydrochloride 10mg 1 Tablet ', 1, '15.00', 'Cash on delivery', '0000-00-00 00:00:00', '2023-01-06', '02:50:22', 'Completed', 1),
(161, 576297, 14, 'Ivan Mharc Maglangit', '', 'Apayao, Conner', '09696251434', 4, 46, '76324-cetirizene.png', 'Cetirizine hydrochloride 10mg 1 Tablet ', 2, '30.00', 'Cash upon pick-up', '2023-01-28 04:50:00', '2023-01-12', '01:49:05', 'Completed', 1),
(162, 230631, 14, 'Ivan Mharc Maglangit', 'yawaaaa', 'Apayao, Conner', '09696251434', 4, 30, '62668-lagundi.png', 'LAGUNDI HERBAL CAPSULE ', 2, '266.00', 'Cash on delivery', '0000-00-00 00:00:00', '2023-01-12', '12:01:59', 'Completed', 1),
(163, 617792, 14, 'Ivan Mharc Maglangit', 'dasdasdas', 'Apayao, Conner', '09696251434', 4, 45, '86099-advil.png', 'Ibuprofen - Advil  200mg 10 Softgel Capsules ', 1, '87.50', 'Cash on delivery', '0000-00-00 00:00:00', '2023-01-12', '18:39:08', 'Completed', 1),
(164, 178610, 14, 'Ivan Mharc Maglangit', '', 'Apayao, Conner', '09696251434', 4, 45, '86099-advil.png', 'Ibuprofen - Advil  200mg 10 Softgel Capsules ', 1, '87.50', 'Cash on delivery', '0000-00-00 00:00:00', '2023-01-12', '21:06:50', 'Completed', 1),
(165, 898726, 14, 'Ivan Mharc Maglangit', '', 'Apayao, Conner', '09696251434', 1, 22, '58538-biogesic-6754-9949261-3.jpg', 'Paracetamol Biogesic x 1  ', 1, '75.00', 'Cash upon pick-up', '2023-01-12 21:20:00', '2023-01-12', '21:20:44', 'Order Cancelled', 1),
(166, 392755, 14, 'Ivan Mharc Maglangit', '', 'Apayao, Conner', '09696251434', 4, 48, '9223-decolgen.png', 'Decolgen Forte   (20 Tablet)', 2, '80.00', 'Cash upon pick-up', '2023-01-14 14:01:00', '2023-01-13', '00:00:16', 'Completed', 1),
(167, 64656, 26, 'Mharc Ivan Mcheaven', '', 'Davao del Sur, Davao City', '09696251434', 4, 30, '62668-lagundi.png', 'LAGUNDI HERBAL CAPSULE ', 3, '399.00', 'Cash upon pick-up', '2023-01-14 23:15:00', '2023-01-14', '22:10:22', 'Order Cancelled', 0),
(168, 20687, 26, 'Mharc Ivan Mcheaven', 'dasdsadasdas', 'Davao del Sur, Davao City', '09696251434', 4, 30, '62668-lagundi.png', 'LAGUNDI HERBAL CAPSULE ', 4, '532.00', 'Cash on delivery', '0000-00-00 00:00:00', '2023-01-14', '23:28:22', 'Order Cancelled', 0),
(169, 645359, 26, 'Mharc Ivan Mcheaven', 'dasdasdas', 'Davao del Sur, Davao City', '09696251434', 4, 30, '62668-lagundi.png', 'LAGUNDI HERBAL CAPSULE ', 6, '798.00', 'Cash on delivery', '0000-00-00 00:00:00', '2023-01-14', '23:30:49', 'Order Cancelled', 0),
(170, 286163, 26, 'Mharc Ivan Mcheaven', 'dasdasdas', 'Davao del Sur, Davao City', '09696251434', 4, 30, '62668-lagundi.png', 'LAGUNDI HERBAL CAPSULE ', 6, '798.00', 'Cash on delivery', '0000-00-00 00:00:00', '2023-01-14', '23:31:29', 'Pending Order', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient_record`
--

CREATE TABLE `patient_record` (
  `Patient_ID` int(11) NOT NULL,
  `FirstName` varchar(250) NOT NULL,
  `MiddleName` varchar(250) NOT NULL,
  `LastName` varchar(250) NOT NULL,
  `Birthdate` varchar(50) NOT NULL,
  `Age` varchar(50) NOT NULL,
  `Gender` varchar(15) NOT NULL,
  `Contact_No` varchar(11) NOT NULL,
  `Civil_Status` varchar(50) NOT NULL,
  `Province` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_record`
--

INSERT INTO `patient_record` (`Patient_ID`, `FirstName`, `MiddleName`, `LastName`, `Birthdate`, `Age`, `Gender`, `Contact_No`, `Civil_Status`, `Province`, `City`, `Email`, `Password`, `Photo`) VALUES
(14, 'Ivan Mharc', 'Gadia', 'Maglangit', '03/11/2000', '22', 'Male', '09696251434', 'Single', 'Apayao', 'Conner', 'beamerboy333222@gmail.com', '202cb962ac59075b964b07152d234b70', '98051-e5c02c2124bb831f9c6f4e9c2a523ab7.jpg'),
(26, 'Mharc Ivan', 'gadia', 'Mcheaven', '01/12/1990', '22', 'Female', '09696251434', 'Single', 'Davao del Sur', 'Davao City', 'Bender@gmail.com', '202cb962ac59075b964b07152d234b70', '36080-e5c02c2124bb831f9c6f4e9c2a523ab7.jpg'),
(27, 'Corina', 'kenedy', 'Bender', '03/04/1971', '51', 'Female', 'dasdasdasd', 'Married', 'Davao del Sur', 'Davao City', 'corina@gmail.com', '202cb962ac59075b964b07152d234b70', '45853-bagyo.jpg'),
(29, 'Corina', 'Gadia', 'Bender', '11/13/1992', '30', 'Male', '13213213212', 'Single', 'Aurora', 'Baler', 'mharc@gmail.com', '202cb962ac59075b964b07152d234b70', '48931-untitled.png'),
(30, 'Corina', 'kenedy', 'Bender', '03/11/2000', '22', 'Male', '13213213212', 'Single', 'Antique', 'Tibiao', 'gg@gmail.comn', '202cb962ac59075b964b07152d234b70', '47211-order.png'),
(31, 'Corina', 'Gadia', 'Bender', '03/11/2000', '22', 'Male', '13213213212', 'Single', 'Bataan', 'Orani', 'yawaaa@gmail.com', '202cb962ac59075b964b07152d234b70', '19247-order.png'),
(32, 'ywaaka', 'puta', 'inamo', '03/11/2000', '22', 'Male', '13213213212', 'Single', 'Basilan', 'Akbar', 'yawaaaa@gmail.com', '202cb962ac59075b964b07152d234b70', '43995-order.png'),
(33, 'Corina', 'Gadia', 'Bender', '12/18/2009', '13', 'Male', '13213213212', 'Single', 'Camarines Norte', 'Basud', 'cesarjohn@gmail.com', '202cb962ac59075b964b07152d234b70', '28089-order.png'),
(34, 'Laze', 'kay', 'Flock', '03/11/2000', '22', 'Male', '13213213212', 'Single', 'Apayao', 'Calanasan', 'kayflock@gmail.com', '202cb962ac59075b964b07152d234b70', '49786-lagundi-syrup.png'),
(35, 'ggshit', 'K', 'mcheaven', '12/21/2001', '21', 'Male', '13213213212', 'Single', 'Camarines Norte', 'Basud', 'ggshit@gmail.com', '202cb962ac59075b964b07152d234b70', '32358-bagyo.jpg'),
(36, 'Rocky', 'G', 'Balboa ', '03/18/2000', '22', 'Male', '09696251434', 'Single', 'Davao del Sur', 'Davao City', 'Xanarchy@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '46473-16712463416236208980599366661078.jpg'),
(37, 'Mharc', 'G', 'Maglangit', '03/11/2000', '22', 'Male', '09696251432', 'Single', 'Davao del Sur', 'Davao City', 'Mharc123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '17168-e5c02c2124bb831f9c6f4e9c2a523ab7.jpg'),
(38, 'mharc', 'kenedy', 'mcheaven', '03/11/2000', '23', 'Male', '09696251434', 'Single', 'Davao del Sur', 'Davao City', 'mcheavenivan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '23653-bagyo.jpg'),
(39, 'das', 'das', 'das', '03/16/2000', '23', 'Male', '12312312321', 'Married', 'Cagayan', 'Peñablanca', 'dasdas3@gmail.com', '202cb962ac59075b964b07152d234b70', '13298-decolgen.png'),
(40, 'das', 'das', 'das', '01/09/2023', '02123', 'Male', '3213213', 'Single', 'Camarines Norte', 'Capalonga', 'dasdasdas5@gmail.com', '202cb962ac59075b964b07152d234b70', '16801-meet.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_record`
--

CREATE TABLE `pharmacy_record` (
  `Pharmacy_ID` int(11) NOT NULL,
  `Pharmacy_Name` varchar(100) NOT NULL,
  `Contact_No` varchar(100) NOT NULL,
  `Province` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Pharmacy_Address` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacy_record`
--

INSERT INTO `pharmacy_record` (`Pharmacy_ID`, `Pharmacy_Name`, `Contact_No`, `Province`, `City`, `Pharmacy_Address`, `Email`, `Password`, `Photo`) VALUES
(1, 'Rose Pharmacy', 'xxxxx', 'Basilan', 'Al-Barka', '', 'rose@gmail.com', '202cb962ac59075b964b07152d234b70', '62000-download.jpg'),
(2, 'Rose', 'xxxx', 'Biliran', 'Almeria', '', '123@gmail.com', '202cb962ac59075b964b07152d234b70', '16937-download.jpg'),
(3, 'Amnesco', 'xxxxxx', 'Bohol', 'Mabini', '', 'amnesco@gmail.com', '202cb962ac59075b964b07152d234b70', '50232-download-(1).jpg'),
(4, 'Mcheaven Pharmacy', '456456', 'Davao del Sur', 'Davao City', 'Rosalina 3, Blk 21 , lot 6, Baliok,', 'beamerboy333222@gmail.com', '202cb962ac59075b964b07152d234b70', '9102-biogesic-6754-9949261-3.jpg'),
(5, 'Rose Pharmacy', '13213213212', 'Abra', 'Bangued', 'Doerflerstr. 109a', 'rosePharmacy@gmail.com', '202cb962ac59075b964b07152d234b70', '29889-order.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_record`
--

CREATE TABLE `product_record` (
  `Product_ID` int(11) NOT NULL,
  `Pharmacy_ID` int(11) NOT NULL,
  `Pharmacy_Name` varchar(250) NOT NULL,
  `Product_Photo` varchar(250) NOT NULL,
  `Pharmacy_Photo` varchar(100) NOT NULL,
  `Product_Name` varchar(250) NOT NULL,
  `Product_Price` decimal(7,2) NOT NULL,
  `Product_Description` varchar(5000) NOT NULL,
  `Product_Quantity` varchar(250) NOT NULL,
  `Product_Location` varchar(250) NOT NULL,
  `Pharmacy_Address` varchar(100) NOT NULL,
  `Product_Category` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_record`
--

INSERT INTO `product_record` (`Product_ID`, `Pharmacy_ID`, `Pharmacy_Name`, `Product_Photo`, `Pharmacy_Photo`, `Product_Name`, `Product_Price`, `Product_Description`, `Product_Quantity`, `Product_Location`, `Pharmacy_Address`, `Product_Category`) VALUES
(22, 1, 'Rose Pharmacy', '58538-biogesic-6754-9949261-3.jpg', '', 'Paracetamol Biogesic x 1  ', '75.00', '  Paracetamol is a commonly used medicine that can help treat pain and reduce a high temperature (fever). It\'s typically used to relieve mild or moderate pain, such as headaches, toothache or sprains, and reduce fevers caused by illnesses such as colds and flu.', '5000', 'Davao del Sur, Davao City', '', 'Tablet Medicine'),
(25, 4, 'Mcheaven Pharmacy', '86505-untitled.png', '9102-biogesic-6754-9949261-3.jpg', 'Levocetirizine 5mg Tablet x 1 ', '10.00', 'It is used to relieve seasonal and year-round allergies. This medicine works by blocking certain organic substances, called histamines, in the brain and other areas of the body. Levocit is also used to treat severe allergies due to food, medicines, or other causes. This medicine helps by treating the symptoms of the allergic reaction including skin', '100', 'Davao del Sur, Davao City', '', 'Tablet Medicine'),
(27, 4, 'Mcheaven Pharmacy', '28522-neozep-forte_main.jpg', '9102-biogesic-6754-9949261-3.jpg', 'Neozep Forte 500s x 1 box', '2000.00', 'Phenylephrine HCl is a nasal decongestant, clears obstructed air passages and nasal sinuses due to congestion, making breathing easier. It also reduces postnasal drip.  Chlorphenamine Maleate, an anti-allergy that relieves symptoms such as runny nose, sneezing, and itchy, watery eyes.  Paracetamol is an effective fever reducer and pain reliever.  sold per box of 500s', '90', 'Davao del Sur, Davao City', '', 'Tablet Medicine'),
(30, 4, 'Mcheaven Pharmacy', '62668-lagundi.png', '9102-biogesic-6754-9949261-3.jpg', 'LAGUNDI HERBAL CAPSULE ', '133.00', 'linhua quingwen capsule official store. resista herbal capsule buy 1 take 1. lianhua qingwen capsules original. pampatigas at pampatagal labasan. resista herbal capsule herbenna. Product details of LAGUNDI HERBAL CAPSULE. Lagundi contains antioxidant phenolic compounds and flavonoids such as casticin, chrysoplenol D, luteolin, iso-orientin, and luteolin-7-0-glucoside, epicatechin, quercetin, catechin, myricetin, tocopherol, carotene and lycopene. Chrysoplenol D was identified as the bioactive substance having anti-histaminergic and muscle relaxant properties particularly useful for cough and asthma. Lagundi is also used for the treatment colds, fever, flu, chronic bronchitis, pharyngitis, rheumatism, dyspepsia, boils, diarrhea, and certain skin or digestive complaints. It is primarily recognized as herbal medicine for respiratory problems', '70', 'Davao del Sur, Davao City', 'Rosalina 3, Blk 21 , lot 6, Baliok,', ''),
(31, 4, 'Mcheaven Pharmacy', '31179-lagundi-syrup.png', '9102-biogesic-6754-9949261-3.jpg', 'ASCOF Lagundi for Adults 600mg/5mL Menthol-Flavored Syrup 120mL', '1250.76', 'It is made from first-grade organically grown Lagundi leaves and is used to relieve mild to moderate cough due to common colds and flu, and mild to moderate acute bronchitis.', '80', 'Davao del Sur, Davao City', 'Rosalina 3, Blk 21 , lot 6, Baliok,', 'Liquid Medicine'),
(45, 4, 'Mcheaven Pharmacy', '86099-advil.png', '9102-biogesic-6754-9949261-3.jpg', 'Ibuprofen - Advil  200mg 10 Softgel Capsules ', '87.50', 'Advil Tablets\r\nAdvil has provided safe, effective pain relief for over 35+ years.\r\n\r\nSo whether you have a headache, muscle aches, backaches, menstrual pain, minor arthritis and other joint pain, or aches and pains from the common cold, nothing\'s stronger when used as directed.', '453', 'Davao del Sur, Davao City', 'Rosalina 3, Blk 21 , lot 6, Baliok,', 'Tablet Medicine'),
(46, 4, 'Mcheaven Pharmacy', '76324-cetirizene.png', '9102-biogesic-6754-9949261-3.jpg', 'Cetirizine hydrochloride 10mg 1 Tablet ', '15.00', 'Cetirizine is used for the treatment of allergic rhinitis, conjunctivitis, pruritis (itch), and chronic idiopathic urticaria.\r\n', '18', 'Davao del Sur, Davao City', 'Rosalina 3, Blk 21 , lot 6, Baliok,', 'Tablet Medicine, Capsule Medicine'),
(48, 4, 'Mcheaven Pharmacy', '9223-decolgen.png', '9102-biogesic-6754-9949261-3.jpg', 'Decolgen Forte   (20 Tablet)', '40.00', 'Tambal sa sinus, sip-on', '498', 'Davao del Sur, Davao City', 'Rosalina 3, Blk 21 , lot 6, Baliok,', 'Tablet Medicine');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_record`
--

CREATE TABLE `reservation_record` (
  `Reservation_ID` int(11) NOT NULL,
  `Pharmacy_ID` int(11) NOT NULL,
  `Patient_ID` int(11) NOT NULL,
  `First_Name` varchar(250) NOT NULL,
  `Middle_Name` varchar(250) NOT NULL,
  `Last_Name` varchar(250) NOT NULL,
  `ContactNumber` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Birthdate` varchar(250) NOT NULL,
  `Gender` varchar(250) NOT NULL,
  `Date` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_record`
--
ALTER TABLE `cart_record`
  ADD PRIMARY KEY (`Cart_ID`);

--
-- Indexes for table `consultation_record`
--
ALTER TABLE `consultation_record`
  ADD PRIMARY KEY (`Consultation_ID`);

--
-- Indexes for table `doctor_record`
--
ALTER TABLE `doctor_record`
  ADD PRIMARY KEY (`Doctor_ID`);

--
-- Indexes for table `invitation_record`
--
ALTER TABLE `invitation_record`
  ADD PRIMARY KEY (`Invitation_ID`);

--
-- Indexes for table `medication_record`
--
ALTER TABLE `medication_record`
  ADD PRIMARY KEY (`Med_ID`);

--
-- Indexes for table `order_record`
--
ALTER TABLE `order_record`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `patient_record`
--
ALTER TABLE `patient_record`
  ADD PRIMARY KEY (`Patient_ID`);

--
-- Indexes for table `pharmacy_record`
--
ALTER TABLE `pharmacy_record`
  ADD PRIMARY KEY (`Pharmacy_ID`);

--
-- Indexes for table `product_record`
--
ALTER TABLE `product_record`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `reservation_record`
--
ALTER TABLE `reservation_record`
  ADD PRIMARY KEY (`Reservation_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_record`
--
ALTER TABLE `cart_record`
  MODIFY `Cart_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=371;

--
-- AUTO_INCREMENT for table `consultation_record`
--
ALTER TABLE `consultation_record`
  MODIFY `Consultation_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `doctor_record`
--
ALTER TABLE `doctor_record`
  MODIFY `Doctor_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `invitation_record`
--
ALTER TABLE `invitation_record`
  MODIFY `Invitation_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `medication_record`
--
ALTER TABLE `medication_record`
  MODIFY `Med_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_record`
--
ALTER TABLE `order_record`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `patient_record`
--
ALTER TABLE `patient_record`
  MODIFY `Patient_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `pharmacy_record`
--
ALTER TABLE `pharmacy_record`
  MODIFY `Pharmacy_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_record`
--
ALTER TABLE `product_record`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `reservation_record`
--
ALTER TABLE `reservation_record`
  MODIFY `Reservation_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
