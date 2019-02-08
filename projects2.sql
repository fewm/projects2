-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2019 at 04:30 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

--
-- Database: `projects2`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_dokumen`
--

CREATE TABLE `data_dokumen` (
  `id` int(11) NOT NULL,
  `name` varchar(130) NOT NULL,
  `email` varchar(160) NOT NULL,
  `author_name` varchar(180) NOT NULL,
  `author_website` varchar(180) NOT NULL,
  `download_titel` varchar(300) NOT NULL,
  `version` varchar(12) DEFAULT NULL,
  `price` varchar(12) DEFAULT NULL,
  `category` varchar(12) DEFAULT NULL,
  `license` int(11) DEFAULT NULL,
  `language` int(11) DEFAULT NULL,
  `system` int(11) DEFAULT NULL,
  `file` varchar(280) DEFAULT NULL,
  `size_file` int(11) DEFAULT NULL,
  `default_screenshoot` int(11) DEFAULT NULL,
  `size_default` int(11) DEFAULT NULL,
  `additional_screenshoot` int(11) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_dokumen`
--

INSERT INTO `data_dokumen` (`id`, `name`, `email`, `author_name`, `author_website`, `download_titel`, `version`, `price`, `category`, `license`, `language`, `system`, `file`, `size_file`, `default_screenshoot`, `size_default`, `additional_screenshoot`, `time_stamp`) VALUES
(1, 'Pai', 'pai@g.com', 'Rizky Ripai', 'pai.com', 'bdf43afba160559c52c029b222354df0', NULL, NULL, NULL, NULL, NULL, NULL, 'PedomanTeknisPenulisanKKP-TA-FTI-20181_v06.pdf', 992, NULL, NULL, NULL, '2019-02-07 14:16:08'),
(2, 'Pai', 'rizky@gmail.com', 'Rizky Ripai', 'Rizky.com', 'Test 2 Brooo', NULL, NULL, NULL, NULL, NULL, NULL, '2__Jurnal_Rahmadana_Tanjung.pdf', 400, NULL, NULL, NULL, '2019-02-07 16:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `data_pesan`
--

CREATE TABLE `data_pesan` (
  `id` int(11) NOT NULL,
  `email_from` varchar(160) NOT NULL,
  `email` varchar(160) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `pesan` text NOT NULL,
  `status` int(1) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pesan`
--

INSERT INTO `data_pesan` (`id`, `email_from`, `email`, `subject`, `pesan`, `status`, `time_stamp`) VALUES
(1, 'rizky@gmail.com', 'rizky@gmail.com', 'Test', 'Ini PESAN', 0, '2019-02-07 08:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(160) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(120) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id`, `username`, `password`, `name`, `email`, `time_stamp`) VALUES
(4, 'pai25', '4297f44b13955235245b2497399d7a93', 'Rizky Ripai', 'rizky@gmail.com', '2019-02-06 18:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `data_video`
--

CREATE TABLE `data_video` (
  `id` int(11) NOT NULL,
  `name` varchar(130) NOT NULL,
  `tags` varchar(160) NOT NULL,
  `desc` text NOT NULL,
  `download_titel` varchar(300) NOT NULL,
  `acces` varchar(12) DEFAULT NULL,
  `acces_download` varchar(12) DEFAULT NULL,
  `category` varchar(12) DEFAULT NULL,
  `license` int(11) DEFAULT NULL,
  `language` int(11) DEFAULT NULL,
  `system` int(11) DEFAULT NULL,
  `file` varchar(280) DEFAULT NULL,
  `size_file` int(11) DEFAULT NULL,
  `default_screenshoot` int(11) DEFAULT NULL,
  `size_default` int(11) DEFAULT NULL,
  `additional_screenshoot` int(11) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_video`
--

INSERT INTO `data_video` (`id`, `name`, `tags`, `desc`, `download_titel`, `acces`, `acces_download`, `category`, `license`, `language`, `system`, `file`, `size_file`, `default_screenshoot`, `size_default`, `additional_screenshoot`, `time_stamp`) VALUES
(0, '', 'video,band,seventeen', 'woow bagus banget looh ini', 'Video Band Seventeen', 'true', 'true', NULL, NULL, NULL, NULL, 'SEVENTEEN_-_KEMARIN_VIDEO_LIRIK.mp4', 7701, NULL, NULL, NULL, '2019-02-07 16:35:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_dokumen`
--
ALTER TABLE `data_dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pesan`
--
ALTER TABLE `data_pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id`,`username`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_dokumen`
--
ALTER TABLE `data_dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_pesan`
--
ALTER TABLE `data_pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
