-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 08, 2017 at 11:56 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `strippenkaart`
--

-- --------------------------------------------------------

--
-- Table structure for table `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'admin', 'admin', 'admin@test.com', 'admin@test.com', 1, NULL, '$2y$13$E2xWe7rEdykto8jbYwkRo.irE.0GJ0TQZh4NjkydAhA6Xf9DKHqGi', '2017-06-08 23:52:18', NULL, NULL, 'a:0:{}');

-- --------------------------------------------------------

--
-- Table structure for table `lid`
--

CREATE TABLE `lid` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `achternaam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `geboortedatum` date DEFAULT NULL,
  `geslacht` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `straatnaam` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `huisnummer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postcode` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wijk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lid`
--

INSERT INTO `lid` (`id`, `voornaam`, `achternaam`, `geboortedatum`, `geslacht`, `email`, `tel`, `tel2`, `straatnaam`, `huisnummer`, `postcode`, `wijk`, `stad`) VALUES
(1, 'Mitchel', 'A', '1991-01-29', 'm', 'speedymitch100@hotmail.com', '0681112591', NULL, 'carel willinklaan', '64', '1328lj', 'Tussen de Vaarten', 'Almere'),
(2, 'Funda', 'Okya', '1988-09-19', 'v', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Stephano', 'Dixon', '2016-01-02', 'm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Dounia', 'Ab', '1996-07-11', 'v', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Gino', 'Dixon', '1991-05-03', 'm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `strip`
--

CREATE TABLE `strip` (
  `id` int(11) NOT NULL,
  `lid_id` int(11) DEFAULT NULL,
  `purchased_at` date NOT NULL,
  `used` tinyint(1) DEFAULT NULL,
  `used_at` date DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `strip`
--

INSERT INTO `strip` (`id`, `lid_id`, `purchased_at`, `used`, `used_at`, `price`) VALUES
(1, 2, '2017-06-08', NULL, NULL, '200'),
(2, 2, '2017-06-08', NULL, NULL, '200'),
(3, 2, '2017-06-08', NULL, NULL, '200'),
(4, 2, '2017-06-08', NULL, NULL, '200'),
(5, 2, '2017-06-08', 1, '2017-06-14', '200'),
(6, 2, '2017-06-08', NULL, NULL, '200'),
(7, 2, '2017-06-08', NULL, NULL, '200'),
(8, 2, '2017-06-08', NULL, NULL, '200'),
(9, 2, '2017-06-08', NULL, NULL, '200'),
(10, 2, '2017-06-08', 1, '2017-06-08', '200'),
(11, 1, '2017-06-08', 1, '2017-06-13', '200'),
(12, 1, '2017-06-08', 1, '2017-06-13', '200'),
(13, 1, '2017-06-08', 1, '2017-06-22', '200'),
(14, 1, '2017-06-08', NULL, NULL, '200'),
(15, 1, '2017-06-08', NULL, NULL, '200'),
(16, 1, '2017-06-08', NULL, NULL, '200'),
(17, 1, '2017-06-08', NULL, NULL, '200'),
(18, 1, '2017-06-08', NULL, NULL, '200'),
(19, 1, '2017-06-08', NULL, NULL, '200'),
(20, 1, '2017-06-08', 1, '2017-06-08', '200'),
(21, 7, '2017-06-08', NULL, NULL, '200'),
(22, 7, '2017-06-08', NULL, NULL, '200'),
(23, 7, '2017-06-08', NULL, NULL, '200'),
(24, 7, '2017-06-08', NULL, NULL, '200'),
(25, 7, '2017-06-08', 1, '2017-06-13', '200'),
(26, 7, '2017-06-08', NULL, NULL, '200'),
(27, 7, '2017-06-08', NULL, NULL, '200'),
(28, 7, '2017-06-08', NULL, NULL, '200'),
(29, 7, '2017-06-08', NULL, NULL, '200'),
(30, 7, '2017-06-08', 1, '2017-06-08', '200'),
(31, 9, '2017-06-08', NULL, NULL, '200'),
(32, 9, '2017-06-08', NULL, NULL, '200'),
(33, 9, '2017-06-08', NULL, NULL, '200'),
(34, 9, '2017-06-08', NULL, NULL, '200'),
(35, 9, '2017-06-08', NULL, NULL, '200'),
(36, 9, '2017-06-08', NULL, NULL, '200'),
(37, 9, '2017-06-08', NULL, NULL, '200'),
(38, 9, '2017-06-08', NULL, NULL, '200'),
(39, 9, '2017-06-08', NULL, NULL, '200'),
(40, 9, '2017-06-08', 1, '2017-06-08', '200'),
(41, 8, '2017-06-08', 1, '2017-06-08', '200'),
(42, 8, '2017-06-08', 1, '2017-06-08', '200'),
(43, 8, '2017-06-08', NULL, NULL, '200'),
(44, 8, '2017-06-08', NULL, NULL, '200'),
(45, 8, '2017-06-08', NULL, NULL, '200'),
(46, 8, '2017-06-08', NULL, NULL, '200'),
(47, 8, '2017-06-08', NULL, NULL, '200'),
(48, 8, '2017-06-08', 1, '2017-06-08', '200'),
(49, 8, '2017-06-08', 1, '2017-06-08', '200'),
(50, 8, '2017-06-08', 1, '2017-06-08', '200');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`);

--
-- Indexes for table `lid`
--
ALTER TABLE `lid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strip`
--
ALTER TABLE `strip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2F424725779207C8` (`lid_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lid`
--
ALTER TABLE `lid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `strip`
--
ALTER TABLE `strip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `strip`
--
ALTER TABLE `strip`
  ADD CONSTRAINT `FK_2F424725779207C8` FOREIGN KEY (`lid_id`) REFERENCES `lid` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
