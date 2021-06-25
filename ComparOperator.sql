-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jun 22, 2021 at 10:16 AM
-- Server version: 10.5.8-MariaDB-1:10.5.8+maria~focal
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ComparOperator`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(10) NOT NULL,
  `location` varchar(150) NOT NULL,
  `price` int(10) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `id_tour_operator` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `location`, `price`, `img`, `description`, `id_tour_operator`) VALUES
(2, 'Sardinia', 450, '/IMG/sardaigne.jpg', 'A voyage over an emerald sea, past characteristic coves and beaches of snowwhite sand … this is Sardinia, an island that strikes its visitors with natural contrasts...', 3),
(3, 'Corsica', 700, '/IMG/corsica.jpg', 'Corsica is a true natural paradise where the heritage is wonderfully well-protected. Very attached to its traditions, this characterful land clearly deserves its nickname...', 5),
(5, 'Venice', 200, '/IMG/venise.jpg', '\r\nFloating between the sea and the lagoon is the beautiful island of the Lido of Venice.Venice and its mainland are particularly rich of museums and historical buildings..', 5),
(17, 'Canada', 1890, '/IMG/rockies.jpg', 'These are mountains the way a kid would draw them.  Get ready to be super jealous of your future self, checking out those alpine meadows, turquoise lakes, waterfalls...', 3),
(18, 'San Fransisco', 2500, '/IMG/sanf.jpg', 'San Francisco is home to a little bit of everything. While we all can\'t experience it like we want to because non-essential travel is discouraged...', 13),
(19, 'San Fransisco', 1800, '/IMG/sanf.jpg', 'San Francisco is home to a little bit of everything. While we all can\'t experience it like we want to because non-essential travel is discouraged...', 1),
(20, 'Amsterdam', 570, '/IMG/amsterdam.jpg', 'Famous museums, tulips, canal-lined streets, \"coffee shops\" and high-end boutiques await you in Amsterdam. Here, you can spend your days gazing at Vincent...', 3),
(21, 'London', 2000, '/IMG/london.jpg', 'London is a world unto itself. The eclectic neighborhoods, which house a blend of historical landmarks and modern-day attractions, can keep you occupied...', 15),
(22, 'New York', 2500, '/IMG/ny.jpg', 'New York City hosts infinite urban adventures: You can wander through Central Park, tour the exhibits at the Met, catch a Broadway show or peruse SoHo\'s stylish boutiques. And at nigh...', 13),
(26, 'Venice', 800, '/IMG/venise.jpg', '\r\nFloating between the sea and the lagoon is the beautiful island of the Lido of Venice.Venice and its mainland are particularly rich of museums and historical buildings..', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) NOT NULL,
  `message` varchar(250) NOT NULL,
  `author` varchar(150) NOT NULL,
  `note` int(11) DEFAULT NULL,
  `id_tour_operator` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `message`, `author`, `note`, `id_tour_operator`) VALUES
(1, 'super club !', 'alex', 2, 1),
(3, 'It was so cool ! Thanks ', 'Jean', 4, 1),
(6, 'Awesome trip ! I recommand it to you guys', 'Jo', 5, 3),
(16, 'We visited Amsterdam and it was a perfect trip ! Thank you', 'Lelou', 5, 3),
(17, 'The flight was awful !!! ', 'Jean', 1, 15),
(18, 'Nothing to say it was brilliant !', 'Anthony', 5, 15),
(19, 'Best trip ever !', 'John', 5, 13),
(20, 'The perfect romantic trip !! But a little bit to expensive for that amount of time..', 'Julia', 4, 5),
(23, 'amazing !!', 'Florent', 5, 3),
(24, 'cool', 'pierre', 5, 5),
(30, 'Awful', 'Max', 1, 5),
(31, 'Cool trip', 'John', 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tour_operators`
--

CREATE TABLE `tour_operators` (
  `id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `grade` float DEFAULT NULL,
  `link` varchar(255) NOT NULL,
  `is_premium` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tour_operators`
--

INSERT INTO `tour_operators` (`id`, `name`, `grade`, `link`, `is_premium`) VALUES
(1, 'Club med', 3.3333, 'https://www.clubmed.fr/', 1),
(3, 'Ailleurs Voyage', 4.5, 'https://www.ailleursvoyages.com/', 0),
(5, 'Thomas Cook', 3.5, 'https://www.thomascook.com/', 1),
(13, 'Discover USA', 3.5, 'https://discoverusa.com', 1),
(15, 'UK Tour', 3, 'https://uktour.uk', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_operator` (`id_tour_operator`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tour_operator` (`id_tour_operator`);

--
-- Indexes for table `tour_operators`
--
ALTER TABLE `tour_operators`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tour_operators`
--
ALTER TABLE `tour_operators`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `destinations`
--
ALTER TABLE `destinations`
  ADD CONSTRAINT `fk_operator` FOREIGN KEY (`id_tour_operator`) REFERENCES `tour_operators` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_tour_operator` FOREIGN KEY (`id_tour_operator`) REFERENCES `tour_operators` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
