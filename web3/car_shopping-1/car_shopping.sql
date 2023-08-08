-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2023 at 12:38 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_shopping`
--
CREATE DATABASE IF NOT EXISTS `car_shopping` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `car_shopping`;

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `address_id` int(11) NOT NULL,
  `street` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`address_id`, `street`, `city`, `description`) VALUES
(1, 'Kfarchima main road', 'Kfarchima', 'First floor, bloc A'),
(2, 'Sioufi', 'Achrafiieh', 'Bloc B first floor');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `car_year` int(11) NOT NULL,
  `mileage` int(11) NOT NULL,
  `fuel_type` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `available` int(11) NOT NULL,
  `photo` text NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `car_description` text DEFAULT NULL,
  `car_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `user_id`, `model_id`, `car_year`, `mileage`, `fuel_type`, `price`, `available`, `photo`, `category_id`, `car_description`, `car_address`) VALUES
(33, 6, 17, 1905, 6, 'diesel', 5, 1, '64c843301d852_Image_created_with_a_mobile_phone.png', 4, 'ded', 'dewd');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_id`, `user_id`, `car_id`) VALUES
(4, 6, 33);

-- --------------------------------------------------------

--
-- Table structure for table `car_brands`
--

CREATE TABLE `car_brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_brands`
--

INSERT INTO `car_brands` (`brand_id`, `brand_name`) VALUES
(78, 'Acura'),
(79, 'Alfa Romeo'),
(80, 'Aston Martin'),
(81, 'Audi'),
(82, 'Bentley'),
(83, 'BMW'),
(84, 'Bugatti'),
(85, 'Buick'),
(86, 'Cadillac'),
(87, 'Chevrolet'),
(88, 'Chrysler'),
(89, 'Citroen'),
(90, 'Dodge'),
(91, 'Ferrari'),
(92, 'Fiat'),
(93, 'Ford'),
(94, 'Genesis'),
(95, 'GMC'),
(96, 'Honda'),
(97, 'Hyundai'),
(98, 'Infiniti'),
(99, 'Jaguar'),
(100, 'Jeep'),
(101, 'Kia'),
(102, 'Koenigsegg'),
(103, 'Lamborghini'),
(104, 'Land Rover'),
(105, 'Lexus'),
(106, 'Lincoln'),
(107, 'Lotus'),
(108, 'Maserati'),
(109, 'Mazda'),
(110, 'McLaren'),
(111, 'Mercedes-Benz'),
(112, 'Mini'),
(113, 'Mitsubishi'),
(114, 'Nissan'),
(115, 'Pagani'),
(116, 'Porsche'),
(117, 'Ram'),
(118, 'Rolls-Royce'),
(119, 'Subaru'),
(120, 'Suzuki'),
(121, 'Tesla'),
(122, 'Toyota'),
(123, 'Volkswagen'),
(124, 'Volvo');

-- --------------------------------------------------------

--
-- Table structure for table `car_category`
--

CREATE TABLE `car_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_category`
--

INSERT INTO `car_category` (`category_id`, `category_name`) VALUES
(1, 'Compact'),
(2, 'Sedan'),
(3, 'Hatchback'),
(4, 'SUV'),
(5, 'Crossover'),
(6, 'Convertible'),
(7, 'Coupe'),
(8, 'Minivan'),
(9, 'Pickup Truck'),
(10, 'Electric'),
(11, 'Hybrid'),
(12, 'Luxury'),
(13, 'Sports'),
(14, 'Off-Road'),
(15, 'Family'),
(16, 'Economy'),
(17, 'MPV (Multi-Purpose Vehicle)'),
(18, 'Station Wagon'),
(19, 'Truck'),
(20, 'Van'),
(21, 'SUV - Compact'),
(22, 'SUV - Midsize'),
(23, 'SUV - Full-Size'),
(24, 'Crossover - Compact'),
(25, 'Crossover - Midsize'),
(26, 'Crossover - Full-Size'),
(27, 'Luxury - Compact'),
(28, 'Luxury - Midsize'),
(29, 'Luxury - Full-Size'),
(30, 'Sports - Compact'),
(31, 'Sports - Midsize'),
(32, 'Sports - Full-Size'),
(33, 'Electric - Compact'),
(34, 'Electric - Midsize'),
(35, 'Electric - Full-Size'),
(36, 'Hybrid - Compact'),
(37, 'Hybrid - Midsize'),
(38, 'Hybrid - Full-Size'),
(39, 'Off-Road - Compact'),
(40, 'Off-Road - Midsize'),
(41, 'Off-Road - Full-Size'),
(42, 'Convertible - Compact'),
(43, 'Convertible - Midsize'),
(44, 'Convertible - Full-Size'),
(45, 'Coupe - Compact'),
(46, 'Coupe - Midsize'),
(47, 'Coupe - Full-Size'),
(48, 'Sedan - Compact'),
(49, 'Sedan - Midsize'),
(50, 'Sedan - Full-Size'),
(51, 'Hatchback - Compact'),
(52, 'Hatchback - Midsize'),
(53, 'Hatchback - Full-Size'),
(54, 'Minivan - Compact'),
(55, 'Minivan - Midsize'),
(56, 'Minivan - Full-Size'),
(57, 'Pickup - Compact'),
(58, 'Pickup - Midsize'),
(59, 'Pickup - Full-Size'),
(60, 'Economy - Compact'),
(61, 'Economy - Midsize'),
(62, 'Economy - Full-Size');

-- --------------------------------------------------------

--
-- Table structure for table `car_models`
--

CREATE TABLE `car_models` (
  `model_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_models`
--

INSERT INTO `car_models` (`model_id`, `brand_id`, `model_name`) VALUES
(5, 78, 'MDX'),
(6, 78, 'NSX'),
(7, 78, 'RDX'),
(8, 79, 'Giulia'),
(9, 79, 'Stelvio'),
(10, 80, 'DB11'),
(11, 80, 'Vantage'),
(12, 80, 'DBS Superleggera'),
(13, 81, 'A3'),
(14, 81, 'A4'),
(15, 81, 'A5'),
(16, 82, 'Continental GT'),
(17, 82, 'Flying Spur'),
(18, 82, 'Mulsanne'),
(19, 83, 'X3'),
(20, 83, 'X5'),
(21, 83, '3 Series'),
(22, 84, 'Chiron'),
(23, 84, 'Veyron'),
(24, 84, 'La Voiture Noire'),
(25, 85, 'Enclave'),
(26, 85, 'Encore'),
(27, 85, 'Envision'),
(28, 86, 'CT4'),
(29, 86, 'CT5'),
(30, 86, 'Escalade'),
(31, 87, 'Camaro'),
(32, 87, 'Corvette'),
(33, 87, 'Malibu'),
(34, 88, '300'),
(35, 88, 'Pacifica'),
(36, 88, 'Voyager'),
(37, 89, 'C3'),
(38, 89, 'C4'),
(39, 89, 'C5 Aircross'),
(40, 90, 'Challenger'),
(41, 90, 'Charger'),
(42, 90, 'Durango'),
(43, 91, 'F8 Tributo'),
(44, 91, '812 Superfast'),
(45, 91, 'Roma'),
(46, 92, '500'),
(47, 92, 'Panda'),
(48, 92, 'Tipo'),
(49, 93, 'F-150'),
(50, 93, 'Mustang'),
(51, 93, 'Focus'),
(52, 94, 'G70'),
(53, 94, 'G80'),
(54, 94, 'G90'),
(55, 95, 'Sierra'),
(56, 95, 'Terrain'),
(57, 95, 'Yukon'),
(58, 96, 'Accord'),
(59, 96, 'Civic'),
(60, 96, 'CR-V'),
(61, 97, 'Elantra'),
(62, 97, 'Santa Fe'),
(63, 97, 'Tucson'),
(64, 98, 'Q50'),
(65, 98, 'Q60'),
(66, 98, 'QX50'),
(67, 99, 'F-Type'),
(68, 99, 'XE'),
(69, 99, 'F-PACE'),
(70, 100, 'Cherokee'),
(71, 100, 'Grand Cherokee'),
(72, 100, 'Wrangler'),
(73, 101, 'Forte'),
(74, 101, 'Optima'),
(75, 101, 'Seltos'),
(76, 102, 'Jesko'),
(77, 102, 'Gemera'),
(78, 102, 'Regera'),
(79, 103, 'Aventador'),
(80, 103, 'Huracan'),
(81, 103, 'Urus'),
(82, 104, 'Defender'),
(83, 104, 'Discovery'),
(84, 104, 'Range Rover'),
(85, 105, 'ES'),
(86, 105, 'RX'),
(87, 105, 'NX'),
(88, 106, 'Aviator'),
(89, 106, 'Corsair'),
(90, 106, 'Navigator'),
(91, 107, 'Elise'),
(92, 107, 'Evora'),
(93, 107, 'Exige'),
(94, 108, 'Ghibli'),
(95, 108, 'Levante'),
(96, 108, 'Quattroporte'),
(97, 109, 'CX-5'),
(98, 109, 'Mazda3'),
(99, 109, 'MX-5 Miata'),
(100, 110, '570S'),
(101, 110, '720S'),
(102, 110, 'GT'),
(103, 111, 'A-Class'),
(104, 111, 'E-Class'),
(105, 111, 'S-Class'),
(106, 112, 'Cooper'),
(107, 112, 'Countryman'),
(108, 112, 'Clubman'),
(109, 113, 'Eclipse Cross'),
(110, 113, 'Outlander'),
(111, 113, 'Pajero'),
(112, 114, '370Z'),
(113, 114, 'GT-R'),
(114, 114, 'LEAF'),
(115, 115, 'Huayra'),
(116, 115, 'Zonda'),
(117, 116, 'Panamera'),
(118, 116, '911'),
(119, 116, 'Cayenne'),
(120, 117, '1500'),
(121, 117, '1500 TRX'),
(122, 117, 'ProMaster'),
(123, 118, 'Cullinan'),
(124, 118, 'Ghost'),
(125, 118, 'Phantom'),
(126, 119, 'BRZ'),
(127, 119, 'Outback'),
(128, 119, 'WRX'),
(129, 120, 'Celerio'),
(130, 120, 'Swift'),
(131, 120, 'Vitara'),
(132, 121, 'Model 3'),
(133, 121, 'Model S'),
(134, 121, 'Model X'),
(135, 122, '4Runner'),
(136, 122, 'Camry'),
(137, 122, 'Corolla'),
(138, 123, 'Arteon'),
(139, 123, 'Golf'),
(140, 123, 'Passat'),
(141, 124, 'S60'),
(142, 124, 'XC60'),
(143, 124, 'XC90');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `total_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `pwd`, `phone_number`) VALUES
(1, 'Anthony', 'Moussa', 'ant@test.com', '$2y$10$wJtja1p0K/8d2ActP8c5LeXw9W0JQhbMWjYqaEaLvEn29M/RLWEPy', '05453235'),
(2, 'Elie', 'Be', 'elie@test.com', '$2y$12$LFvUJQWPP4d5pW.F1rYQReY/Kp0vCAo7wIM6iLm1hxKm/JuQPe7mO', '07346734'),
(3, 'sandr', 'mal', 'sandr_mal@test.com', '123', '123456543'),
(5, 'test', 'test', 'test@test.com', 't', '12345678'),
(6, 'AAA', 'BBB', 'aaa@hotmail.com', '$2y$10$IFRggtuyLn1LdCl2ul4dfeWSs7/LPrLhEHnbF0/358ehDYANuRoPK', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `visit_requests`
--

CREATE TABLE `visit_requests` (
  `request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `visit_date` date NOT NULL,
  `visit_time` time NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `model_id` (`model_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `car_brands`
--
ALTER TABLE `car_brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `car_category`
--
ALTER TABLE `car_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `car_models`
--
ALTER TABLE `car_models`
  ADD PRIMARY KEY (`model_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `unique_username` (`email`);

--
-- Indexes for table `visit_requests`
--
ALTER TABLE `visit_requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `car_id` (`car_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `car_brands`
--
ALTER TABLE `car_brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `car_category`
--
ALTER TABLE `car_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `car_models`
--
ALTER TABLE `car_models`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `visit_requests`
--
ALTER TABLE `visit_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cars_ibfk_2` FOREIGN KEY (`model_id`) REFERENCES `car_models` (`model_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cars_ibfk_4` FOREIGN KEY (`category_id`) REFERENCES `car_category` (`category_id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `car_models`
--
ALTER TABLE `car_models`
  ADD CONSTRAINT `car_models_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `car_brands` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD CONSTRAINT `chat_messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visit_requests`
--
ALTER TABLE `visit_requests`
  ADD CONSTRAINT `visit_requests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visit_requests_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
