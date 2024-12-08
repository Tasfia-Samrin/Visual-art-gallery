-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2024 at 07:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_art_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` varchar(10) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `UserName` varchar(20) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Name`, `Email`, `UserName`, `Password`) VALUES
('10000', 'Farea Mahdea', ' farea.mahdea@gmail.com', 'farea303', 'farea10000'),
('10001', 'Tasfia Samrin', ' tasfia.samrin@gmail.com', 'tasfia202', 'tasfia10001'),
('10002', 'Minhajur Rahman', ' minhajur.rahman@gmail.com', 'minhajur555', 'minhajur10002'),
('10003', 'Sifat Abrar', ' sifat.abrar@gmail.com', 'sifat222', 'sifat10003');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `Id` varchar(10) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `Phone` varchar(11) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`Id`, `Name`, `email`, `Phone`, `Password`, `Bio`) VALUES
('90000', 'Zainul Abedin', 'zainul.abedin@gmail.com', '01926382644', 'zainul80', 'Zainul Abedin is a pioneering figure in the art world of Bangladesh and is widely regarded as the father of modern Bangladeshi art. His unique style, combining elements of traditional Bengali art with modern techniques, helped lay the foundation for contemporary art in Bangladesh.'),
('90001', 'S.M. Sultan', ' s.m.sultan@gmail.com', '01923462756', 's.m.90', 'S.M. Sultan is referred to as the Rebel Artist of Bangladesh famous  for his monumental paintings of rural farmers, emphasizing their physical strength and resilience.'),
('90002', 'Kanak Chanpa Chakma', ' kanak.chakma@gmail.com', '01878876543', 'kanak80', 'Kanak Chanpa Chakma is one of the most prominent Bangladeshi contemporary artists, celebrated for her vivid depictions of the life and culture of the Chakma people and other indigenous communities in the Chittagong Hill Tracts. '),
('90003', 'Hashem Khan', ' hashem.khan@gmail.com', '01437658439', 'hashem90', 'Hashem Khan is a renowned Bangladeshi painter and one of the leading art educators of the country and he is known for his vibrant depictions of rural Bangladeshi life, its landscapes, and the Liberation War. '),
('90004', 'Nisar Hossain', ' nisar.hossain@gmail.com', '01927543776', 'nisar90', 'Nisar Hossain is a prominent painter and academic in Bangladesh.His artwork often explores sociopolitical themes, incorporating elements of folklore and traditions. '),
('90005', 'Firoz Mahmud', ' firoz.mahmud@gmail.com', '01826547893', 'firoz70', 'Firoz Mahmud is an internationally acclaimed Bangladeshi contemporary artist whose work spans painting, installation, and performance art. '),
('90006', 'Aminul Islam', ' aminul.islam@gmail.com', '01768543567', 'aminul90', 'Aminul Islam is one of the pioneers of modern art in Bangladesh. While primarily known for his abstract works, he also created many iconic pieces that reflect urban life.'),
('9005', 'Firoz Mahmud', 'firoz.mahmud@gmail.com', '01826547893', 'firoz60', 'Firoz Mahmud is an internationally acclaimed Bangladeshi contemporary artist whose work spans painting, installation, and performance art. ');

-- --------------------------------------------------------

--
-- Table structure for table `arttype`
--

CREATE TABLE `arttype` (
  `arttype_id` int(11) NOT NULL,
  `arttype_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `arttype`
--

INSERT INTO `arttype` (`arttype_id`, `arttype_title`) VALUES
(6, 'Abstract'),
(7, 'Calligrapy'),
(13, 'Fantasy Art'),
(9, 'Historical Art'),
(3, 'landscape'),
(4, 'Portrait'),
(10, 'Religious Art'),
(5, 'Sketch'),
(11, 'Still Life'),
(8, 'Wildlife Art');

-- --------------------------------------------------------

--
-- Table structure for table `artwork_images`
--

CREATE TABLE `artwork_images` (
  `imageID` int(11) NOT NULL,
  `artworkID` varchar(10) NOT NULL,
  `imageURL` text NOT NULL,
  `uploadedDate` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artwork_images`
--

INSERT INTO `artwork_images` (`imageID`, `artworkID`, `imageURL`, `uploadedDate`) VALUES
(12, '7000', 'skechfamine.jpg', '2024-11-30'),
(13, '7001', 'harvest.jpg', '2024-11-30'),
(17, '7003', 'wrestler.jpg', '2024-11-30'),
(18, '7004', 'villageLife.jpg', '2024-11-30'),
(19, '7009', 'abstract.jpg', '2024-11-30'),
(20, '7010', 'mother.jpg', '2024-11-30'),
(21, '7011', 'sketch.jpg', '2024-11-30'),
(22, '7012', 'horizon.jpg', '2024-11-30'),
(23, '7015', 'liberation.jpg', '2024-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `art_work`
--

CREATE TABLE `art_work` (
  `id` varchar(10) NOT NULL,
  `title` varchar(30) NOT NULL,
  `artist_id` varchar(10) DEFAULT NULL,
  `arttype_id` int(11) DEFAULT NULL,
  `year_created` date DEFAULT NULL,
  `medium` varchar(30) DEFAULT NULL,
  `dimension` varchar(20) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `is_available` tinyint(1) DEFAULT 1,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `art_work`
--

INSERT INTO `art_work` (`id`, `title`, `artist_id`, `arttype_id`, `year_created`, `medium`, `dimension`, `description`, `price`, `is_available`, `image`) VALUES
('7000', 'Famine Sketches', '90000', 5, '2000-03-02', 'Ink sketches on paper', '30 inches by 20 inch', 'Famine Sketches is Zainul Abedins most famous and impactful series. Created on the Bengal famine of 1943, these sketches capture the horrors and human suffering caused by the famine.', 200000.00, 1, 'skechfamine.jpg'),
('7001', 'The Harvest', '90000', 3, '2002-02-02', 'Oil on canvas', '50 inches by 20 inch', 'This painting portrays the agricultural cycle and the significance of the harvest in rural Bengali life. ', 210000.00, 1, 'harvest.jpg'),
('7003', 'Wrestlers', '90001', 4, '2000-03-03', 'oil painting on canvas', '50inches by 30inches', 'Wrestlers is a perfect example of his ability to blend realism with symbolic abstraction. It captures not only the physicality of the sport but also the emotional depth and spiritual resilience of the figures he portrays. ', 340000.00, 1, 'wrestler.jpg'),
('7004', 'Village Life', '90001', 3, '2002-02-02', 'oil painting on canvas', '50inches by 30inches', ' The colors in these works are vibrant, and the figures are often stylized and simplified, yet filled with movement and emotion representing beauty of nature..', 300000.00, 1, 'villageLife.jpg'),
('7009', 'Rhythms of Nature', '90003', 6, '2000-04-04', 'acrylic on canvas', '40inches by 30inches', ' A painting featuring swirling, fluid forms in hues of red and orange, symbolizing the emotional intensity of life.', 100000.00, 1, 'abstract.jpg'),
('7010', 'Mother and Child', '90006', 4, '2010-07-06', 'oil on canvas', '40inches by40inches', 'One of his famous works that focuses on the theme of motherhood and love, depicted in abstract forms with warm colors and flowing lines.', 300000.00, 1, 'mother.jpg'),
('7011', 'Geometric Patterns', '90006', 5, '2020-02-03', 'Charcoal', '50inches by40inches', ' Representation of spirituality in abstract forms', 50000.00, 1, 'sketch.jpg'),
('7012', 'Bengal Horizon', '90000', 3, '1999-02-04', 'Watercolor', '50inches by 30inches', 'The Bengal Horizon is a watercolor landscape by Zainul Abedin that captures the vast, open plains of rural Bengal.', 230000.00, 1, 'horizon.jpg'),
('7015', 'Liberation war', '90004', 4, '1989-01-02', 'Acrylic on canvas', '50inches by 40inches', 'Artworks depicting the struggles of the freedom fighters, the sacrifices of civilians, and the brutality of war in1971.', 210000.00, 1, 'liberation.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(10) NOT NULL,
  `customerID` int(10) NOT NULL,
  `artworkID` varchar(10) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `addedDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `password`, `address`, `phone`) VALUES
(902, 'faruk', 'faruk@gmail.com', 'faruk20', 'guhc', '01829379467'),
(20000, 'Sabab Riha', 'sabab.riha@gmail.com', '$2y$10$rS9KqB7O16wW8/cYVPe3zOCEMJJ2jgk/tjtQU5GeBdpIdjn7vJGfy', '25/A,Flat-112,Rupnagar,Mirpur,Dhaka', '01827836545'),
(20001, 'Sara Khan', 'sara.khan@gmail.com', '$2y$10$VzQGZKGjB./u1kWCyA9svOyXXLi6R0X0PLM5.5PqfOebXnYk3CjI2', '25/A,Flat-114,Rupnagar,Mirpur,Dhaka', '01827836546'),
(20002, 'Tahira Khan', 'tahira.khan@gmail.com', '$2y$10$GrBXkMK84CNegO8/oR90Ae149V6KoTfoyos5f2bPA7N6qwD5LvjU6', '25/A,Flat-114,Rupnagar,Mirpur,Dhaka', '01827836549'),
(20003, 'Tisha Rahman', 'tisha.rahman@gmail.com', '$2y$10$wxCfe8c.06Mu0djb32wmlu2wExI5SzSgATrro7wM39xrq/6MTQxRS', '25/A,Flat-134,Rupnagar,Mirpur,Dhaka', '01827836533'),
(20004, 'Sakif Hassan', 'sakif.hassan@gmail.com', '$2y$10$BEzK3UfZD8hDC03y/t2RC.xA2BEpXN9A/7rD9e3froThBwu414MhC', '25/A,Flat-144,Rupnagar,Mirpur,Dhaka', '01827836532'),
(20005, 'Sayedul Haque', 'sayedul.haque@gmail.com', '$2y$10$j2WpLU8734412AQ07DjsG.98A3SkzhVfVFCiDfhmpR83hsx5NmX1O', '25/A,Flat-134,Rupnagar,Mirpur,Dhaka', '01827836566');

-- --------------------------------------------------------

--
-- Table structure for table `customer_exhibition`
--

CREATE TABLE `customer_exhibition` (
  `customerID` int(10) NOT NULL,
  `exhibitionID` int(10) NOT NULL,
  `dateAttended` date DEFAULT curdate(),
  `ticketType` enum('Standard','VIP','Student') DEFAULT 'Standard'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `displays_artwork_exhibition`
--

CREATE TABLE `displays_artwork_exhibition` (
  `artwork_id1` varchar(10) NOT NULL,
  `artwork_id2` varchar(10) NOT NULL,
  `artwork_id3` varchar(10) NOT NULL,
  `artwork_id4` varchar(10) NOT NULL,
  `artwork_id5` varchar(10) NOT NULL,
  `exhibition_title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `displays_artwork_exhibition`
--

INSERT INTO `displays_artwork_exhibition` (`artwork_id1`, `artwork_id2`, `artwork_id3`, `artwork_id4`, `artwork_id5`, `exhibition_title`) VALUES
('401', '401', '401', '401', '401', 'Canvas of Dreams'),
('7000', '7001', '7003', '7011', '7012', 'Echoes of Liberation'),
('7000', '7001', '7003', '7012', '7010', 'hg'),
('7000', '7004', '7012', '7015', '7011', 'hb'),
('7000', '7010', '7012', '7015', '7011', 'Art in the Heart of '),
('7001', '7004', '7009', '7012', '7010', 'Colors of the Villag'),
('7001', '7004', '7010', '7011', '7012', 'Nature Whispers');

-- --------------------------------------------------------

--
-- Table structure for table `exhibition`
--

CREATE TABLE `exhibition` (
  `id` int(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `admin_id` varchar(10) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exhibition`
--

INSERT INTO `exhibition` (`id`, `Name`, `admin_id`, `start_date`, `end_date`, `location`, `description`) VALUES
(124, 'Echoes of Liberation', '10001', '2025-03-30', '2025-04-02', ' Liberation War Museum, Agargaon, Dhaka', 'A curated exhibition showcasing artworks that narrate the story of Bangladesh Liberation War. The collection includes paintings, photographs, and sculptures depicting the struggle, sacrifice, and triumph of independence.'),
(125, 'Colors of  Villages', '10002', '2024-12-10', '2024-12-14', ' Bangladesh National Museum, Shahbagh, Dhaka.', 'This exhibition highlights the essence of Bangladeshi rural life through vibrant depictions of folk culture, traditional crafts, and pastoral scenes.'),
(126, 'Nature Whispers', '10003', '2024-12-17', '2024-12-21', 'Drik Gallery, Panthapath, Dhaka.', 'This exhibition brings together artworks that celebrate the beauty of nature in Bangladesh, with a focus on rivers, paddy fields, and mangroves. '),
(127, 'Art in the Heart of ', '10000', '2024-12-17', '2024-12-21', 'Bengal Shilpalay, Dhaka', 'This exhibition showcases a collection of paintings, posters, and sculptures created during and after the Liberation War. It features works that reflect the emotions, struggles, and sacrifices of the war. ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(10) NOT NULL,
  `customerID` int(11) NOT NULL,
  `orderDate` date DEFAULT NULL,
  `Price` decimal(10,2) NOT NULL,
  `status` enum('Pending','Completed','Cancelled') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `orderDetailsID` int(11) NOT NULL,
  `orderID` int(10) NOT NULL,
  `artworkID` varchar(10) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `arttype`
--
ALTER TABLE `arttype`
  ADD PRIMARY KEY (`arttype_id`),
  ADD UNIQUE KEY `arttype_title` (`arttype_title`);

--
-- Indexes for table `artwork_images`
--
ALTER TABLE `artwork_images`
  ADD PRIMARY KEY (`imageID`),
  ADD KEY `fk_art` (`artworkID`);

--
-- Indexes for table `art_work`
--
ALTER TABLE `art_work`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `fk_artist` (`artist_id`),
  ADD KEY `fk_arttype` (`arttype_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `artworkID` (`artworkID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customer_exhibition`
--
ALTER TABLE `customer_exhibition`
  ADD PRIMARY KEY (`customerID`,`exhibitionID`),
  ADD KEY `fk_exID` (`exhibitionID`);

--
-- Indexes for table `displays_artwork_exhibition`
--
ALTER TABLE `displays_artwork_exhibition`
  ADD PRIMARY KEY (`artwork_id1`,`artwork_id2`,`artwork_id3`,`artwork_id4`,`artwork_id5`,`exhibition_title`),
  ADD KEY `fk_arts2` (`artwork_id2`),
  ADD KEY `fk_arts3` (`artwork_id3`),
  ADD KEY `fk_arts4` (`artwork_id4`),
  ADD KEY `fk_arts5` (`artwork_id5`),
  ADD KEY `fk_exhibitiontitle` (`exhibition_title`);

--
-- Indexes for table `exhibition`
--
ALTER TABLE `exhibition`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD KEY `fk_admin` (`admin_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `fk_cust` (`customerID`) USING BTREE;

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`orderDetailsID`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `artworkID` (`artworkID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arttype`
--
ALTER TABLE `arttype`
  MODIFY `arttype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `artwork_images`
--
ALTER TABLE `artwork_images`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exhibition`
--
ALTER TABLE `exhibition`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `orderDetailsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2002;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artwork_images`
--
ALTER TABLE `artwork_images`
  ADD CONSTRAINT `fk_art` FOREIGN KEY (`artworkID`) REFERENCES `art_work` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `art_work`
--
ALTER TABLE `art_work`
  ADD CONSTRAINT `fk_artist` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_arttype` FOREIGN KEY (`arttype_id`) REFERENCES `arttype` (`arttype_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`artworkID`) REFERENCES `art_work` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_exhibition`
--
ALTER TABLE `customer_exhibition`
  ADD CONSTRAINT `fk_custID` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_exID` FOREIGN KEY (`exhibitionID`) REFERENCES `exhibition` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exhibition`
--
ALTER TABLE `exhibition`
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`artworkID`) REFERENCES `art_work` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
