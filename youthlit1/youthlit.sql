-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2024 at 12:10 PM
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
-- Database: `youthlit`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `goodreads_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `image`, `goodreads_link`) VALUES
(1, 'Harry Potter and the Philosopher’s Stone', 'J.K. Rowling', 'assets/images/harrypotter.png', 'https://www.goodreads.com/book/show/42844155-harry-potter-and-the-sorcerer-s-stone'),
(2, 'The Hunger Games', 'Suzanne Collins', 'assets/images/hungergame.png', 'https://www.goodreads.com/book/show/2767052-the-hunger-games'),
(3, 'Percy Jackson & the Olympians', 'Rick Riordan', 'assets/images/percyjackson.png', 'https://www.goodreads.com/book/show/123675190-the-lightning-thief'),
(4, 'Children of Blood and Bone', 'Tomi Adeyemi', 'assets/images/children-of-blood-and-bone.png', 'https://www.goodreads.com/book/show/34728667-children-of-blood-and-bone'),
(5, 'The Fault in Our Stars', 'John Green', 'assets/images/thefaultinourstars.png', 'https://www.goodreads.com/book/show/11870085-the-fault-in-our-stars'),
(6, 'The Night Circus', 'Erin Morgensten', 'assets/images/thenightcircus.png', 'https://www.goodreads.com/book/show/9361589-the-night-circus'),
(7, 'Red Queen', 'Victoria Aveyard', 'assets/images/red-queen.png', 'https://www.goodreads.com/book/show/22328546-red-queen'),
(8, 'Salt to the Sea', 'Ruta Sepetys', 'assets/images/salttothesea.png', 'https://www.goodreads.com/book/show/25614492-salt-to-the-sea'),
(9, 'They Both Die at the End', 'Adam Silvera', 'assets/images/tbdate.png', 'https://www.goodreads.com/book/show/33385229-they-both-die-at-the-end'),
(10, 'The Maze Runner', 'James Dashner', 'assets/images/tmrunner.png', 'https://www.goodreads.com/book/show/6186357-the-maze-runner'),
(11, 'To All the Boys Ive Loved Before', 'Jenny Han', 'assets/images/toallboys.png', 'https://www.goodreads.com/book/show/15749186-to-all-the-boys-i-ve-loved-before'),
(12, 'Ready Player One', 'Ernest Cline', 'assets/images/readypl1.png', 'https://www.goodreads.com/book/show/9969571-ready-player-one'),
(13, 'The Secret Garden', 'Frances Hodgson Burnett', 'assets/images/secretgarden.png', 'https://www.goodreads.com/book/show/2998.The_Secret_Garden'),
(14, 'The Girl with the Pearl Earring', 'Tracy Chevalier', 'assets/images/girlpearlearing.png', 'https://www.goodreads.com/book/show/2865.Girl_with_a_Pearl_Earring'),
(15, 'The Song of Achilles', 'Madeline Miller', 'assets/images/the-song-of-achilles.png', 'https://www.goodreads.com/book/show/13623848-the-song-of-achilles'),
(16, 'The Girl on the Train', 'Paula Hawkins', 'assets/images/the-girl-on-the-train.png', 'https://www.goodreads.com/book/show/22557272-the-girl-on-the-train'),
(17, 'Enders Game', 'Orson Scott Card', 'assets/images/ender-s-game.png', 'https://www.goodreads.com/book/show/375802.Ender_s_Game'),
(18, 'Scythe', 'Neal Shusterman', 'assets/images/scythe.png', 'https://www.goodreads.com/book/show/28954189-scythe');

-- --------------------------------------------------------

--
-- Table structure for table `book_genres`
--

CREATE TABLE `book_genres` (
  `book_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_genres`
--

INSERT INTO `book_genres` (`book_id`, `genre_id`) VALUES
(1, 1),
(1, 4),
(2, 4),
(2, 6),
(3, 1),
(3, 4),
(4, 1),
(4, 4),
(5, 3),
(5, 10),
(6, 1),
(6, 4),
(7, 1),
(7, 3),
(8, 9),
(9, 7),
(10, 4),
(10, 6),
(11, 3),
(11, 10),
(12, 4),
(12, 8),
(13, 2),
(13, 9),
(14, 2),
(14, 9),
(15, 3),
(15, 9),
(16, 3),
(16, 5),
(17, 5),
(17, 8),
(18, 5),
(18, 8);

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `book_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `genre_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre_name`) VALUES
(4, 'Adventure'),
(10, 'Contemporary Fiction'),
(6, 'Dystopian'),
(1, 'Fantasy'),
(9, 'Historical Fiction'),
(7, 'Literary Fiction'),
(2, 'Mystery'),
(3, 'Romance'),
(8, 'Science Fiction'),
(5, 'Thriller');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `top_genres` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `top_genres`) VALUES
(1, 'fatihahdin', '$2y$10$AB5nIDv5J.Z2DnS9N7mjy.qfMBITNoiN0gN72olZFsxriqAEn18Ca', 'fatihahdin@gmail.com', NULL),
(2, 'nadisyafiqah', '$2y$10$40eUxh99weburBujC0QZx.eu5LOeh2SOPYY.9IVn8RaYphfkD3oL.', 'nadisyafiqah@gmail.com', NULL),
(3, 'norfizaibrahim', '$2y$10$E/EdePV6JGHctsUPJhdD2e.z4a77LEcYDL8sl.5Zvmpqd8n3.eAcW', 'norfiza@gmail.com', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_genres`
--
ALTER TABLE `book_genres`
  ADD PRIMARY KEY (`book_id`,`genre_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `genre_name` (`genre_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_genres`
--
ALTER TABLE `book_genres`
  ADD CONSTRAINT `book_genres_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `book_genres_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`);

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
