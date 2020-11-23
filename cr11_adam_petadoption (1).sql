-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2020 at 04:54 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_adam_petadoption`
--
CREATE DATABASE IF NOT EXISTS `cr11_adam_petadoption` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cr11_adam_petadoption`;

-- --------------------------------------------------------

--
-- Table structure for table `petadoption`
--

CREATE TABLE `petadoption` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `img` varchar(250) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `hobbies` varchar(250) DEFAULT NULL,
  `age` varchar(20) DEFAULT NULL,
  `breed` varchar(50) DEFAULT NULL,
  `type` enum('Small','Large','Senior') DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `petadoption`
--

INSERT INTO `petadoption` (`id`, `name`, `gender`, `img`, `description`, `hobbies`, `age`, `breed`, `type`, `city`, `zip`, `address`) VALUES
(1, 'Mila', 'Male', 'https://i.imgur.com/hCsSfkyl.jpg', 'This inquisitive dog is loving towards her owner, and will eventually come when called. She is very friendly towards other people and will let anyone pet her, and does not mind other animals.', 'Sulking her favorite toy or blanket, stealing socks, sleeping', '3 years old', 'Staffordshire Bull Terrier Crossbreed', 'Large', 'Upper Austria', '4631', 'Lahof 50'),
(2, 'Bebop', 'Male', 'https://i.redd.it/196t4wg4zwh31.jpg', 'This skittish dog is not always friendly toward his owner, and never comes when called. He will hide for hours if someone new enters the house, and dislikes other animals.', 'He steals keys and other small objects, He occasionally buries important objects in the garden, like keys and remotes.', '5 months old', 'Mutt', 'Small', 'Lower Austria', '4160', 'Hainbuchen 42'),
(3, 'Raisin', 'Male', 'https://brooklinelabrescue.org/dev/wp-content/uploads/2019/07/Marley-Rescue-Ride-07-23.jpg', 'This skittish dog is friendly toward his owner, but will sometimes come when called. He will hide for hours if someone new enters the house, but gets along well with other animals.', 'He loves to run and slide on smooth/hard floors,He likes to sit in the bath.', '9 years old', 'Librador', 'Senior', 'Burgenland', '7350', 'Faerberplatz 91'),
(4, 'Lexus', 'Female', 'https://www.pets4homes.co.uk/images/classifieds/2019/08/09/2397101/large/sphynx-cat-for-sale-4-years-old-had-injections-mal-5d4da01f37f0b.jpg', 'This solitary cat is distrustful toward her owner, and never comes when called. She is generally friendly towards other people but may bite and scratch without warning, and she dislikes other animals.', 'She loves to chew clothing, She will pull all the tissue off the roll if she gets access to it, She loves to zoom around.', '4 years old', 'Sphynx', 'Large', 'Upper Austria', '4861', 'Stadionstrasse 73'),
(5, 'Nixon', 'Male', 'https://i.dailymail.co.uk/1s/2018/11/11/21/6058484-0-image-a-25_1541971398928.jpg', 'This aggressive cat is indifferent toward his owner, but will eventually come when called. He is distrustful of strangers, and hates other animals.', 'He will always rip cardboard when it\'s accessible,He loves to run and slide on smooth/hard floors, and he loves to chew everything.', '9 years old', 'British Short-hair', 'Senior', 'Styria', '8653', 'Ackerweg 62'),
(6, 'Apache', 'Female', 'https://i.pinimg.com/474x/37/45/74/374574eeaf662d35d7e7f22678cba7a0.jpg', 'This laid back rabbit is loving towards her owner, and will eventually come when called. She is not afraid of strangers, and gets along well with other rabbits.', 'She is obsessed with people\'s feet when they\'re wearing socks,', '8,5 years', 'Mini Rex', 'Senior', 'Lower Austria', '4211', 'Leobnerstrasse 54'),
(7, 'Caro', 'Female', 'https://i.redd.it/lephkci6ygu01.jpg', 'This docile parrot is friendly toward her owner, and will sit and stare when called, but won\'t always come. She will buffet everyone who comes near, and she will often fight other animals.', 'She loves knocking everything over, She loves to dance to music, She loves to chew anything wooden.', '11 years old', 'Budgerigar', 'Senior', 'Vienna', '1170', 'Floridusgasse 60'),
(8, 'Splinter', 'Male', 'https://i.redd.it/a5gjqnory6t11.jpg', 'This calm parrot is indifferent toward his owner, but will sometimes respond when called. He does not pay any attention to strangers (but will allow himself to be touched if you can reach him), and he does not mind other animals.', 'loves to eat, and will eat any food he gets access to. His favourite food is clover and he likes to eat electrical cords as well.', '2 years old', 'Cockatiel', 'Large', 'Tyrol', '9920', 'Wiehtestrasse 52'),
(9, 'Sal', 'Female', 'https://www.pets4homes.co.uk/images/classifieds/2019/08/18/2408391/large/baby-tame-blue-headed-pionus-one-baby-left-ready-5d8e5dcdc36c6.jpg', 'This parrot is indifferent toward her owner, and hates to be touched. She always hides from strangers, and she is distrustful of other animals.', 'She enjoys watching TV. Her favourite food is mustard greens and she likes to eat Cashews as well.', '5 months old', 'Pionus', 'Small', 'Lower Austria', '4161', 'Straden 83'),
(10, 'Thistle', 'Male', 'https://i.pinimg.com/originals/69/9a/ab/699aab712c80bd44c005234dbc1d7915.jpg', 'This aggressive cat is friendly toward his owner, and hates to be apart from them. He will scratch any stranger that comes near, and will often fight other animals.', 'He likes to \"groom\" the carpet, He likes to sit up high and watch everyone else, He loves to chew everything.', '2 months old', 'Russian Blue', 'Small', 'Burgenland', '7521', 'Grünbachstrasse 43'),
(11, 'Mana', 'Female', 'https://pbs.twimg.com/media/D0lAu5cWoAApEWQ.jpg', 'This cold rabbit is loving towards her owner, and will follow them around the house. She always hides from strangers, and will often fight other rabbits.', 'She likes to sit inside bags and pockets,', '9 months old', 'Satin', 'Small', 'Lower Austria', '3281', 'Ortsstrasse 6'),
(12, 'Oscar', 'Male', 'https://www.vetstream.com/vetstream/media/images/lapis/16_263618.jpg', 'This docile rabbit is loving towards his owner, and will always come when called. He always acts as though any stranger he meets will harm him, and dislikes other rabbits.', 'He steals socks and other soft objects, and he will destroy chew toys within two play sessions.', '2 years old', 'American Checkered Giant', 'Large', 'Styria', '8412', 'Faschinastrasse 53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` enum('user','admin','super_admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `status`) VALUES
(6, 'admin', 'admin@email.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'admin'),
(8, 'super', 'super@email.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'super_admin'),
(9, 'User', 'user@email.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `petadoption`
--
ALTER TABLE `petadoption`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `petadoption`
--
ALTER TABLE `petadoption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
