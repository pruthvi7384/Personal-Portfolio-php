-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2021 at 08:03 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `user_name`, `password`) VALUES
(1, 'Pruthviraj Rajput', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `description` varchar(700) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`id`, `type`, `name`, `certificate`, `description`, `added_on`, `status`) VALUES
(31, 'Traning', 'Graphics Desing', '395975_328150_c.jpg', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore', '2021-09-30 05:54:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `meassage` text NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cources`
--

CREATE TABLE `cources` (
  `id` int(11) NOT NULL,
  `cource_name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `platforn_detailes` varchar(500) NOT NULL,
  `description` varchar(700) NOT NULL,
  `performance` int(11) NOT NULL,
  `mode` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cources`
--

INSERT INTO `cources` (`id`, `cource_name`, `start_date`, `end_date`, `platforn_detailes`, `description`, `performance`, `mode`, `added_on`, `status`) VALUES
(12, 'HTML', '2021-09-03', '2021-09-08', 'HI', 'HU', 99, 'Online', '2021-09-30 06:01:30', 1),
(13, 'CSS', '2021-09-08', '2021-09-25', 'CSS', 'CSS', 99, 'Online', '2021-09-30 06:01:56', 1),
(14, 'Javascript ', '2021-09-10', '2021-09-01', 'JavaScript', 'JavaScript ', 99, 'Online', '2021-09-30 06:02:26', 1),
(15, 'Firebase', '2021-09-25', '2021-09-26', 'Firebase', 'Firebase', 99, 'Online', '2021-09-30 06:03:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `cource_name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `institute_detailes` varchar(500) NOT NULL,
  `description` varchar(700) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `cource_name`, `start_date`, `end_date`, `institute_detailes`, `description`, `added_on`, `status`) VALUES
(13, 'BACHELOR OF FINE ARTS & GRAPHIC DESIGN', '2010-01-30', '2014-01-30', 'Rochester Institute of Technology, Rochester, NY', 'Quia nobis sequi est occaecati aut. Repudiandae et iusto quae reiciendis et quis Eius vel ratione eius unde vitae rerum voluptates asperiores voluptatem Earum molestiae consequatur neque etlon sader mart dila', '2021-09-30 05:52:22', 1),
(14, 'MASTER OF FINE ARTS & GRAPHIC DESIGN', '2015-01-30', '2016-05-30', 'Rochester Institute of Technology, Rochester, NY', 'Qui deserunt veniam. Et sed aliquam labore tempore sed quisquam iusto autem sit. Ea vero voluptatum qui ut dignissimos deleniti nerada porti sand markend', '2021-09-30 05:53:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `working` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `company_name` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `description` varchar(700) NOT NULL,
  `mode` varchar(100) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `working`, `start_date`, `end_date`, `company_name`, `address`, `description`, `mode`, `added_on`, `status`) VALUES
(5, 'SENIOR GRAPHIC DESIGN SPECIALIST', '2019-05-03', '2021-01-03', 'Experion, New York, NY', 'New York, NY', 'Supervise the assessment of all graphic materials in order to ensure quality and accuracy of the design', 'virtual ', '2021-09-30 05:55:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `working1` varchar(255) NOT NULL,
  `working2` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `countact_number` varchar(15) NOT NULL,
  `linkdin_link` varchar(255) NOT NULL,
  `github_link` varchar(255) NOT NULL,
  `facebook_link` varchar(255) NOT NULL,
  `Instagram_link` varchar(255) NOT NULL,
  `twitter_link` varchar(255) NOT NULL,
  `gradjution_current` varchar(500) NOT NULL,
  `address` varchar(600) NOT NULL,
  `about_me` varchar(700) NOT NULL,
  `biography` text NOT NULL,
  `summary` varchar(700) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `name`, `image`, `working1`, `working2`, `birthday`, `email_id`, `countact_number`, `linkdin_link`, `github_link`, `facebook_link`, `Instagram_link`, `twitter_link`, `gradjution_current`, `address`, `about_me`, `biography`, `summary`, `added_on`) VALUES
(1, 'Emily Jones.', '703148477_278839364_me.jpg', 'graphic designer', '', '2021-09-14', 'example@gmail.com', '1234567890', 'example.linkdin.com', 'example.github.com', 'example.facebook.com', 'instagram.com', 'twitter.com', 'Master', '                                    New York, USA                                                      ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt adipisci omnis et ut. Nulla accusantium dolor incidunt officia tempore. Et eius omnis. Cupiditate ut dicta maxime officiis quidem quia. Sed et consectetur qui quia repellendus itaque neque. Aliquid amet quidem ut quaerat cupiditate. Ab et eum qui repellendus omnis culpa magni laudantium dolores.', 'Innovative and deadline-driven Graphic Designer with 3+ years of experience designing and developing user-centered digital/print marketing material from initial concept to final, polished deliverable.', '2021-09-30 05:51:17');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `order_by` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `images` varchar(700) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `language` varchar(600) NOT NULL,
  `url` varchar(500) NOT NULL,
  `github_url` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `order_by`, `type`, `name`, `images`, `start_date`, `end_date`, `language`, `url`, `github_url`, `description`, `added_on`, `status`) VALUES
(12, 1, 'Web design', 'ASU Company', '72093_83213_portfolio-details-1.jpg', '2021-01-03', '2021-07-15', 'HTML, CSS, Boostrap', ' www.example.com', ' www.example.com', 'Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.', '2021-09-30 05:59:50', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cources`
--
ALTER TABLE `cources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cources`
--
ALTER TABLE `cources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
