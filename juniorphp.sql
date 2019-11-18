-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2019 at 07:55 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `juniorphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(22) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `is_checked` tinyint(1) NOT NULL,
  `is_valid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `message`, `is_checked`, `is_valid`) VALUES
(1, 'Branko Anokic', 'brankoanokic@hotmail.com', 'Lorem Ipsum is simply dummy text of the pr make but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 1),
(2, 'Orlando Bloom', 'bloom@gmail', 'Donec eget magna a massa dignissim pulvinar. Suspendisse tristique, dolor a semper pharetra, eros metus tempor lacus, ac auctor lacus dui et mauris.', 1, 1),
(3, 'James Orwel', 'james@gmail.com', 'Cras vel lorem eu justo gravida ornare at porttitor velit. Ut egestas metus quis augue pharetra, at lacinia velit sodales. Integer sit amet magna nec risus euismod ultrices.', 1, 1),
(4, 'Christian Bale', 'bale@gmail.com', 'Fusce a sem eu leo posuere tristique. Nam diam sapien, gravida vel purus ac, tristique gravida quam. Sed felis orci, maximus vitae magna vel, accumsan vehicula diam.', 1, 1),
(5, 'Crvena Bubica', 'crvenabuba9@gmail.com', 'Mauris mattis turpis feugiat, efficitur nisl vel, tincidunt nunc. Nam sit amet maximus lectus. Mauris mattis turpis feugiat, efficitur nisl vel, tincidunt nunc. Nam sit amet maximus lectus.', 1, 1),
(7, 'Kevin Wiliams', 'kevin@gmail.com', 'Praesent pharetra, urna malesuada efficitur tempus, ex magna euismod mauris, sed porta nunc odio vel nunc. Ut odio nibh, consequat non lectus quis, congue ultrices orci.', 0, 0),
(19, 'Stacy Miller', 'stacy@gmail.com', 'Fusce in nisl vel tortor fermentum aliquam. Quisque hendrerit vestibulum erat, in blandit enim finibus congue. Quisque bibendum nulla eget velit volutpat dictum. Curabitur at sapien urna.', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `image_src` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_title` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `image_src`, `product_title`, `description`) VALUES
(1, 'assets/img/orange.png', 'Orange', 'Oranges are round orange-coloured fruit that grow on a tree which can reach 10 metres (33 ft) high.'),
(2, 'assets/img/apple.png', 'Green Apple', 'An apple is a sweet, edible fruit produced by an apple tree (Malus domestica). Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus.'),
(3, 'assets/img/mango.jfif', 'Mango', 'Mango, Mangifera indica, is an evergreen tree in the family Anacardiaceae grown for its edible fruit. The mango tree is erect and branching with a thick trunk and broad, rounded canopy.'),
(4, 'assets/img/banana.png', 'Banana', 'It grows in bunches on a banana tree. To \"go bananas\" is a slangy way of saying \"go crazy\" or act ridiculous, and if someone refers to the \"top banana,\" they mean the most important person in a particular group.'),
(5, 'assets/img/Strawberry.png', 'Strawberry', 'A strawberry is both a low-growing, flowering plant and also the name of the fruit that it produces. Strawberries are soft, sweet, bright red berries.'),
(6, 'assets/img/kiwi.jfif', 'Kiwi', 'The ellipsoidal kiwi fruit is a true berry and has furry brownish green skin. The firm translucent green flesh has numerous edible purple-black seeds embedded around a white centre.'),
(7, 'assets/img/cherries.png', 'Cherries', 'A cherry is the fruit of many plants of the genus Prunus, and is a fleshy drupe (stone fruit).'),
(8, 'assets/img/peach.png', 'Peach', 'The peach (Prunus persica) is a deciduous tree native to the region of Northwest China between the Tarim Basin and the north slopes of the Kunlun Mountains, where it was first domesticated and cultivated'),
(9, 'assets/img/lime.png', 'Lime', 'A lime (from French lime, from Arabic līma, from Persian līmū, \"lemon\") is a citrus fruit, which is typically round, green in color.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
