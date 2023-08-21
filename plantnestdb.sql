-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2023 at 05:16 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plantnestdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_Id` int(11) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_Id`, `admin_name`, `admin_password`) VALUES
(1, 'admin', '123\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Category_Id` int(11) NOT NULL,
  `Category_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Category_Id`, `Category_Name`) VALUES
(7, 'Flowering'),
(8, 'Non-flowering'),
(9, 'Indoor'),
(10, 'Outdoor'),
(11, 'Succulents'),
(12, 'Medicinal'),
(32, 'Conifer');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `User_Id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `user_Email` varchar(255) NOT NULL,
  `userfeedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`User_Id`, `Username`, `user_Email`, `userfeedback`) VALUES
(3, 'ahmed08', 'ahmed@gmail.com', 'We are leading in the plants service fields.\r\n\r\n'),
(6, 'john080', 'john@gmail.com', 'Great Experience of shopping');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Product_Id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `Quantity` int(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `Order_Date` date NOT NULL DEFAULT current_timestamp(),
  `Total_Amount` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_Id`, `User_Id`, `Product_Id`, `product_name`, `Quantity`, `address`, `remarks`, `Order_Date`, `Total_Amount`) VALUES
(1, 3, 10, 'Peace lily Plant', 1, 'steel town Karachiasd', '        gfgdg', '2023-08-12', 850),
(2, 3, 13, 'Purple Lavender Flower', 1, 'steel town Karachiasd', '        gfgdg', '2023-08-12', 1600),
(3, 3, 10, 'Peace lily Plant', 1, 'awami colony karachi ', '        ', '2023-08-13', 850),
(4, 3, 18, 'Plant Cutter', 2, 'awami colony karachi ', '        ', '2023-08-13', 2550);

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
  `Plant_Id` int(11) NOT NULL,
  `Plant_Name` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Price` int(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `Category_Id` int(11) NOT NULL,
  `stock` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plants`
--

INSERT INTO `plants` (`Plant_Id`, `Plant_Name`, `Description`, `Price`, `image`, `Category_Id`, `stock`) VALUES
(9, 'Red Rose Plant', 'Their stems are usually prickly and their glossy, green leaves have toothed edges.', 1250, 'rose.png', 7, 'Not-Available'),
(10, 'Peace lily Plant', 'Peace lilies are sturdy, easy to grow plants with glossy, dark green oval leaves that narrow to a point. The leaves rise directly from the soil.', 850, 'lily.jpg', 9, 'Available'),
(11, 'Cycadasea Pers', 'Cycads  have a cylindrical, usually unbranched, trunk of spongy wood. The evergreen leaves grow in a rosette directly from the top of the trunk, creating a crown of foliage as the plant ages and the older leaves fall off.', 2500, 'cycadplant.png', 8, 'Available'),
(12, 'Pink Yarrow Plant', 'yarrow has flat-topped or dome-shaped clusters of small white flowers that bloom from April to October. An attractive, hardy perennial, yarrow can reach about 3 feet in height.', 1450, 'yarrow.jpg', 12, 'Available'),
(13, 'Purple Lavender Flower', 'It is a beautiful aromatic shrub with average height of 2 feet (60 cm). It produces purple flowers, which contain high levels of essential oil', 750, 'lavender.png', 7, 'Not-Available'),
(14, 'Marigold Rose Plant', 'Marigolds have cheery, pom-pom, anemone, or daisy-shaped inflorescences in colors ranging from yellow and gold to orange, red, and mahogany. ', 800, 'marigold.jpg', 7, 'Not-Available'),
(15, 'Aloe Vera Plant', ' They have sharp, pinkish spines along their edges and are the source of the colourless gel found in many commercial and medicinal products', 350, 'aloe-vera.png', 11, 'Available'),
(16, 'Spider Plant', 'This clump-forming, perennial, herbaceous plant, native to coastal areas of South Africa, has narrow, strap-shaped leaves arising from a central point. The leaves may be solid green or variegated with lengthwise stripes of white or yellow. ', 450, 'spiderplant.jpg', 8, 'Available'),
(17, 'Spray Bottle', 'U-M Water Spray Bottle, Manual Salon Atomizer, Plastic Barber Tool, Refillable Bottles, Trigger Sprayer, Hairdressing Misting Spray Bottle Fashion Processed', 650, 'spray.png', 9, 'Available'),
(18, 'Plant Cutter', 'Fiskars SoftGrip Bypass Pruner 5/8', 850, 'plantcutter.jpg', 10, 'Available'),
(19, 'Juniper berry', 'Over 5 Years Old Juniper Indoor Bonsai Tree with Natural Rock and Tray', 1800, 'juniper.jpg', 32, 'Available'),
(20, 'SunFlower Plant', 'Nearly Natural 16in. Peony, Dahlia and Sunflower Artificial Flower Bouquet (Set of 2)', 260, 'sunflower.jpg', 7, 'Available'),
(21, 'Ashwaganda Plant', 'Ashwagandha is renowned for its adaptogenic properties, meaning it may assist the body in adapting to various stressors, whether physical, mental, or environmental.', 450, 'ashwaganda.jpg', 12, 'Available'),
(22, 'Plant Fertilizer', 'These fertilizers are formulated with specific nutrient ratios, making it easier to target the exact nutritional needs of plants. They are generally faster-acting and can provide a rapid boost to plant growth.', 850, 'fertilizer.jpg', 10, 'Not-Available'),
(23, 'Bunny ears cactus', 'The Bunny Ears Cactus, scientifically known as Opuntia microdasys, is a captivating and unique succulent that draws attention with its distinctive appearance and minimal care requirements.', 1750, 'Bunny ears cactus.jpg', 11, 'Available'),
(24, 'Indoor Grow Lights:', 'For indoor succulent enthusiasts, specialized grow lights provide the essential light spectrum for healthy growth, especially in areas with limited natural sunlight.', 6500, 'Grow Lights.jpg', 11, 'Not-Available');

-- --------------------------------------------------------

--
-- Table structure for table `usercontact`
--

CREATE TABLE `usercontact` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usercontact`
--

INSERT INTO `usercontact` (`user_id`, `username`, `useremail`, `subject`, `message`) VALUES
(3, 'ahmed08', 'ahmed@gmail.com', '', 'i want to visit store'),
(3, 'ahmed08', 'ahmed@gmail.com', '', 'gfdgdgdfgf'),
(6, 'john080', 'john@gmail.com', '', 'i want to visit store');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_Id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `username`, `user_email`, `Password`) VALUES
(3, 'ahmed08', 'ahmed@gmail.com', '$2y$10$Xyu5eRYlrAMs6NYzb.3GKOYCifAGbojjDBdqsnTYbSpQX7l0e/0K2'),
(4, 'Faizan', 'faizan@gmail.com', '$2y$10$.r563/hxwzMeGWnctH5CgehMtUbD0b81vWI/YI.cQmX6lr0BKgt4m'),
(5, 'Javed080', 'Javed080@gmail.com', '$2y$10$c3KTEmN9gDo/3VXAfXmBROtYSDM1Feh7dZZXYN8MIsHKRGNo27N4q'),
(6, 'john080', 'john@gmail.com', '$2y$10$Jow8r8H.tkT4J4iP.54dfOtK8Uvx.eMQthg8wIPew4ejYQOeN6IsS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_Id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_Id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_Id`),
  ADD KEY `Plant_Id` (`Product_Id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`Plant_Id`),
  ADD KEY `Category_Id` (`Category_Id`);

--
-- Indexes for table `usercontact`
--
ALTER TABLE `usercontact`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Category_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plants`
  MODIFY `Plant_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `users` (`User_Id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Product_Id`) REFERENCES `plants` (`Plant_Id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`User_Id`) REFERENCES `users` (`User_Id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`Product_Id`) REFERENCES `plants` (`Plant_Id`);

--
-- Constraints for table `plants`
--
ALTER TABLE `plants`
  ADD CONSTRAINT `plants_ibfk_1` FOREIGN KEY (`Category_Id`) REFERENCES `categories` (`Category_Id`);

--
-- Constraints for table `usercontact`
--
ALTER TABLE `usercontact`
  ADD CONSTRAINT `usercontact_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`User_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
