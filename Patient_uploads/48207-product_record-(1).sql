-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 06:29 PM
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
-- Database: `checkapp2`
--

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
(22, 1, 'Rose Pharmacy', '58538-biogesic-6754-9949261-3.jpg', '', 'Paracetamol Biogesic x 1', '75.00', 'Paracetamol is a commonly used medicine that can help treat pain and reduce a high temperature (fever). It\'s typically used to relieve mild or moderate pain, such as headaches, toothache or sprains, and reduce fevers caused by illnesses such as colds and flu.', '500', 'Davao del Sur, Davao City', '', 'Tablet Medicine'),
(25, 4, 'Mcheaven Pharmacy', '86505-untitled.png', '9102-biogesic-6754-9949261-3.jpg', 'Levocetirizine 5mg Tablet x 1', '10.00', 'It is used to relieve seasonal and year-round allergies. This medicine works by blocking certain organic substances, called histamines, in the brain and other areas of the body. Levocit is also used to treat severe allergies due to food, medicines, or other causes. This medicine helps by treating the symptoms of the allergic reaction including skin', '100', 'Davao del Sur, Davao City', '', 'Tablet Medicine'),
(27, 4, 'Mcheaven Pharmacy', '28522-neozep-forte_main.jpg', '9102-biogesic-6754-9949261-3.jpg', 'Neozep Forte 500s x 1 box', '2000.00', 'Phenylephrine HCl is a nasal decongestant, clears obstructed air passages and nasal sinuses due to congestion, making breathing easier. It also reduces postnasal drip.  Chlorphenamine Maleate, an anti-allergy that relieves symptoms such as runny nose, sneezing, and itchy, watery eyes.  Paracetamol is an effective fever reducer and pain reliever.  sold per box of 500s', '95', 'Davao del Sur, Davao City', '', 'Tablet Medicine'),
(29, 4, 'Mcheaven Pharmacy', '80736-9ed41b4c90549ba1bd5bf29948cefe7f.jpg', '9102-biogesic-6754-9949261-3.jpg', 'Alaxan Fr 10s Capsule', '75.52', ' Pain Reliever with Ibuprofen & Paracetamol - For Body Aches, Reduces Fever, Fast Relief', '100', 'Davao del Sur, Davao City', 'Rosalina 3, Blk 21 , lot 6, Baliok,', 'Capsul Medicine'),
(30, 4, 'Mcheaven Pharmacy', '62668-lagundi.png', '9102-biogesic-6754-9949261-3.jpg', 'LAGUNDI HERBAL CAPSULE', '133.00', 'linhua quingwen capsule official store. resista herbal capsule buy 1 take 1. lianhua qingwen capsules original. pampatigas at pampatagal labasan. resista herbal capsule herbenna. Product details of LAGUNDI HERBAL CAPSULE. Lagundi contains antioxidant phenolic compounds and flavonoids such as casticin, chrysoplenol D, luteolin, iso-orientin, and luteolin-7-0-glucoside, epicatechin, quercetin, catechin, myricetin, tocopherol, carotene and lycopene. Chrysoplenol D was identified as the bioactive substance having anti-histaminergic and muscle relaxant properties particularly useful for cough and asthma. Lagundi is also used for the treatment colds, fever, flu, chronic bronchitis, pharyngitis, rheumatism, dyspepsia, boils, diarrhea, and certain skin or digestive complaints. It is primarily recognized as herbal medicine for respiratory problems', '95', 'Davao del Sur, Davao City', 'Rosalina 3, Blk 21 , lot 6, Baliok,', ''),
(31, 4, 'Mcheaven Pharmacy', '31179-lagundi-syrup.png', '9102-biogesic-6754-9949261-3.jpg', 'ASCOF Lagundi for Adults 600mg/5mL Menthol-Flavored Syrup 120mL', '1250.76', 'It is made from first-grade organically grown Lagundi leaves and is used to relieve mild to moderate cough due to common colds and flu, and mild to moderate acute bronchitis.', '100', 'Davao del Sur, Davao City', 'Rosalina 3, Blk 21 , lot 6, Baliok,', ''),
(32, 4, 'Mcheaven Pharmacy', '79009-lagundi-syrup.png', '9102-biogesic-6754-9949261-3.jpg', 'ASCOF Lagundi for Adults 600mg/5mL Menthol-Flavored Syrup 120mL', '1000.00', 'sdadsada', '100', 'Davao del Sur, Davao City', 'Rosalina 3, Blk 21 , lot 6, Baliok,', 'Liquid Medicine'),
(33, 4, 'Mcheaven Pharmacy', '10101-ointment.png', '9102-biogesic-6754-9949261-3.jpg', 'Bioderm Ointment (Antibacterial & Antifungal) 5g eczema', '65.00', 'Bioderm Ointment\r\n\r\nAntibacterial/ AntiFungal\r\n\r\nWeight: 5grams\r\n\r\nIndications:\r\nRingworm, eczema, blackheads, pimples, furunculosis, acne, skin itch, white spots, athletes foot, boils, barbers itch, insect bites and other skin irritations on the head and on the body. Bioderm Ointment is also effective for prickly heat, dhobie itch, mange, Hongkobg foot and itching dandruff.\r\n\r\nDirections for Use:\r\nWash the affected areas with soap and warm water. Dry gently bu thoroughly. Apply Bioderm Ointment liberally morning and night.\r\n\r\nExpiration: 2026', '95', 'Davao del Sur, Davao City', 'Rosalina 3, Blk 21 , lot 6, Baliok,', 'Topical medicine');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_record`
--
ALTER TABLE `product_record`
  ADD PRIMARY KEY (`Product_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_record`
--
ALTER TABLE `product_record`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
