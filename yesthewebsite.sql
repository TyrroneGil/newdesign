-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 05:21 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yesthewebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date_commented` date NOT NULL DEFAULT current_timestamp(),
  `user_image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `image_id`, `user_id`, `comment`, `date_commented`, `user_image_id`) VALUES
(23, 3, 1, 'Hello', '2023-12-13', 5),
(24, 1, 5, 'Anggaling nyo po gabi na po matulog na po kayo', '2023-12-13', 1),
(25, 11, 5, 'Anggaling nyo po gabi na po matulog na po kayo', '2023-12-13', 5),
(26, 11, 5, 'Anggaling nyo po gabi na po matulog na po kayo', '2023-12-13', 5),
(27, 11, 5, 'Anggaling nyo po gabi na po matulog na po kayo', '2023-12-13', 5),
(28, 11, 5, 'Anggaling nyo po gabi na po matulog na po kayo', '2023-12-13', 5);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `ID` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_liked` date NOT NULL DEFAULT current_timestamp(),
  `user_image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`ID`, `image_id`, `user_id`, `date_liked`, `user_image_id`) VALUES
(55, 12, 5, '2023-12-13', 5),
(56, 11, 5, '2023-12-13', 5),
(64, 5, 9, '2023-12-14', 8),
(65, 16, 9, '2023-12-14', 5),
(66, 10, 9, '2023-12-14', 1),
(67, 4, 9, '2023-12-14', 8),
(68, 1, 9, '2023-12-14', 1),
(69, 6, 9, '2023-12-14', 8);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `ID` int(11) NOT NULL,
  `message` text NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `date_messaged` date NOT NULL DEFAULT current_timestamp(),
  `active_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`ID`, `message`, `sender`, `receiver`, `date_messaged`, `active_id`) VALUES
(1, 'asdasd', 1, 5, '2023-12-13', 5),
(2, 'Bakit ngay', 1, 5, '2023-12-13', 5),
(3, '5asdasds', 5, 1, '2023-12-13', 5),
(4, 'asedasd', 1, 5, '2023-12-13', 0),
(5, 'asdasd', 1, 5, '2023-12-13', 5),
(7, 'asd', 1, 5, '2023-12-13', 5),
(8, 'asdasd', 5, 1, '2023-12-13', 1),
(9, 'hm po yung artwork nyo?', 5, 1, '2023-12-13', 1),
(10, 'hm po yung artwork nyo?', 5, 1, '2023-12-13', 1),
(11, 'Hello', 5, 8, '2023-12-13', 8),
(12, 'Bakit ngay', 8, 5, '2023-12-13', 5),
(13, 'Hello po', 1, 8, '2023-12-13', 8),
(14, 'Hello', 5, 1, '2023-12-13', 1),
(15, '100 po', 1, 5, '2023-12-14', 5),
(16, 'Hello', 9, 1, '2023-12-14', 1),
(17, 'Hi', 1, 9, '2023-12-14', 9);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `image`) VALUES
(1, 'Coffee', 'Drinks', '50', 'https://images.contentstack.io/v3/assets/blt370612131b6e0756/blt8128f2ba748627e2/5f7f71b1d48a690f08f8b731/gragas_turntable_img.jpg'),
(2, 'Tyrrone', 'Misc', '10000', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQdZP7PD1skIcZzialB-6ieTzC8GuQlmKF_gpFrDQkbSA&s'),
(3, 'Beef', 'Misc', '10000', 'https://images.contentstack.io/v3/assets/blt370612131b6e0756/blt8128f2ba748627e2/5f7f71b1d48a690f08f8b731/gragas_turntable_img.jpg'),
(4, 'Beef', 'Misc', '10000', 'https://images.contentstack.io/v3/assets/blt370612131b6e0756/blt8128f2ba748627e2/5f7f71b1d48a690f08f8b731/gragas_turntable_img.jpg'),
(5, 'Tyrrone', 'Misc', '12000', 'https://images.contentstack.io/v3/assets/blt370612131b6e0756/blt8128f2ba748627e2/5f7f71b1d48a690f08f8b731/gragas_turntable_img.jpg'),
(6, 'Tyrrone', 'Misc', '10000', 'https://images.contentstack.io/v3/assets/blt370612131b6e0756/blt8128f2ba748627e2/5f7f71b1d48a690f08f8b731/gragas_turntable_img.jpg'),
(7, 'Tyrrone', 'Misc', '10000', 'https://images.contentstack.io/v3/assets/blt370612131b6e0756/blt8128f2ba748627e2/5f7f71b1d48a690f08f8b731/gragas_turntable_img.jpg'),
(8, 'Tyrrone', 'Misc', '10000', 'https://images.contentstack.io/v3/assets/blt370612131b6e0756/blt8128f2ba748627e2/5f7f71b1d48a690f08f8b731/gragas_turntable_img.jpg'),
(9, 'Tyrrone', 'Misc', '10000', 'https://images.contentstack.io/v3/assets/blt370612131b6e0756/blt8128f2ba748627e2/5f7f71b1d48a690f08f8b731/gragas_turntable_img.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'logout',
  `profile_pic` varchar(255) DEFAULT NULL,
  `date_joined` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `email`, `password`, `username`, `status`, `profile_pic`, `date_joined`) VALUES
(1, 'tyrrone@gmail.com', '123', 'Tyrrone', 'logged', 'components/pics/uploads/Screenshot 2023-08-01 220204.png', '2023-12-06'),
(5, 'eloisa23@gmail.com', '123456', 'Eloisa', 'logged', 'components/pics/uploads/Screenshot 2023-05-13 203829.png', '2023-12-06'),
(8, 'ashley@gmail.com', '123', 'ashley', 'logged', 'components/pics/uploads/Screenshot 2023-12-02 103205.png', '2023-12-06'),
(9, 'user@gmail.com', '123456', 'user', 'logged', 'components/pics/uploads/Screenshot 2023-05-11 212759.png', '2023-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `user_post`
--

CREATE TABLE `user_post` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `art_image` varchar(255) NOT NULL,
  `art_title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_posted` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_post`
--

INSERT INTO `user_post` (`ID`, `user_id`, `art_image`, `art_title`, `description`, `date_posted`) VALUES
(1, 1, 'https://helpx.adobe.com/content/dam/help/en/photoshop/using/convert-color-image-black-white/jcr_content/main-pars/before_and_after/image-before/Landscape-Color.jpg', 'Tyrrone', '123123123', '2023-12-06'),
(4, 8, 'https://oyster.ignimgs.com/mediawiki/apis.ign.com/league-of-legends/a/a6/Gragas_lol.jpg?width=640', 'asdasd', 'asdasd', '2023-12-06'),
(5, 8, 'https://buffer.com/cdn-cgi/image/w=1000,fit=contain,q=90,f=auto/library/content/images/size/w1200/2023/10/free-images.jpg', 'Camera Wman', 'Woman with camera', '2023-12-06'),
(6, 8, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Image_created_with_a_mobile_phone.png/1200px-Image_created_with_a_mobile_phone.png', 'Camera under the bridge', 'Tyrrone', '2023-12-06'),
(10, 1, 'components/pics/uploads/306518011_980077596726231_2551287441443378611_n-removebg-preview.png', 'asdasd', 'asdasd', '2023-12-13'),
(16, 5, 'components/pics/uploads/Screenshot 2023-06-15 000731.png', 'Kermit', 'Kermit', '2023-12-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `image_id` (`image_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `image_id` (`image_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `sender` (`sender`),
  ADD KEY `receiver` (`receiver`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_post`
--
ALTER TABLE `user_post`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_post`
--
ALTER TABLE `user_post`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`receiver`) REFERENCES `users` (`ID`);

--
-- Constraints for table `user_post`
--
ALTER TABLE `user_post`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
