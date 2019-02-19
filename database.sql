-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2019 at 05:38 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projects2`
--
CREATE DATABASE IF NOT EXISTS `projects2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projects2`;

-- --------------------------------------------------------

--
-- Table structure for table `data_audio`
--

CREATE TABLE `data_audio` (
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
-- Dumping data for table `data_audio`
--

INSERT INTO `data_audio` (`id`, `name`, `tags`, `desc`, `download_titel`, `acces`, `acces_download`, `category`, `license`, `language`, `system`, `file`, `size_file`, `default_screenshoot`, `size_default`, `additional_screenshoot`, `time_stamp`) VALUES
(1, 'pai25', 'audio,pertama', 'ini adalah audio rahasia jangan bilang siapa siapa s', 'Audio Pertama', 'true', 'true', NULL, NULL, NULL, NULL, 'Dewa_19_-_Mahameru_nex4music_com.mp3', 4793, NULL, NULL, NULL, '2019-02-18 04:54:46'),
(2, 'ferymember', 'saf,asf,sf', 'wew', 'test', 'true', 'true', NULL, NULL, NULL, NULL, 'Sheila_On_7_-_Dan.mp3', 4570, NULL, NULL, NULL, '2019-02-14 16:09:26'),
(4, 'ferymember', 'suara', 'suara aneh', 'suara', 'true', 'true', NULL, NULL, NULL, NULL, 'Sheila_On_7_-_Pejantan_Tangguh.mp3', 3321, NULL, NULL, NULL, '2019-02-14 16:26:03');

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
(2, 'pai25', 'rizky@gmail.com', 'Rizky Ripaii', 'Rizky.com', 'Test 2 Brooo', NULL, NULL, NULL, NULL, NULL, NULL, '2__Jurnal_Rahmadana_Tanjung.pdf', 400, NULL, NULL, NULL, '2019-02-18 05:00:01'),
(3, 'pai25', 'rizky@budiluhur.ac.id', 'ferat', 'pdf.com', 'jurnal pdf', NULL, NULL, NULL, NULL, NULL, NULL, 'Unicheck_Report_Jurnal_Online_Ferrat_Muzaddid-1311511404_30Jan2019_en_EN_lib.pdf', 340, NULL, NULL, NULL, '2019-02-18 05:00:07');

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
  `status` int(1) NOT NULL DEFAULT '0',
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id`, `username`, `password`, `name`, `email`, `status`, `time_stamp`) VALUES
(4, 'pai25', '4297f44b13955235245b2497399d7a93', 'Rizky Ripai', 'rizky@gmailc.om', 0, '2019-02-11 06:01:22'),
(5, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator', 'admin@gmail.com', 1, '2019-02-11 06:01:52'),
(6, 'userit', 'efe6398127928f1b2e9ef3207fb82663', 'userit', 'userit@gmail.com', 2, '2019-02-11 06:05:26'),
(7, 'fery', '698d51a19d8a121ce581499d7b701668', 'fery', 'fery.kamaludim@budiluhur.ac.id', 1, '2019-02-14 15:36:19'),
(8, 'ferymember', '202cb962ac59075b964b07152d234b70', 'ferygood', 'ferymember@budiluhur.ac.id', 0, '2019-02-14 15:52:20');

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
(3, 'pai25', 'kereeens', 'keraeeenss', 'Tutorial CI Kedua', 'true', 'true', NULL, NULL, NULL, NULL, 'Langkah_Mudah_Membuat_Login_Dengan_Codeigniter1.mp4', 63842, NULL, NULL, NULL, '2019-02-18 04:35:06'),
(4, 'pai25', 'last', 'last', 'Tutorial CI KETIGA', 'true', 'true', NULL, NULL, NULL, NULL, 'Langkah_Mudah_Membuat_Login_Dengan_Codeigniter2.mp4', 63842, NULL, NULL, NULL, '2019-02-11 16:38:37'),
(5, 'ferymember', 'ap aja', 'ap aja', 'tutorial video', 'true', 'true', NULL, NULL, NULL, NULL, 'WhatsApp_Video_2019-02-14_at_14_10_00.mp4', 823, NULL, NULL, NULL, '2019-02-14 15:59:41');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_data_dokumen_video`
-- (See below for the actual view)
--
CREATE TABLE `v_data_dokumen_video` (
`id` int(11)
,`name` varchar(130)
,`email` text
,`author_name` varchar(180)
,`author_website` varchar(180)
,`download_titel` varchar(300)
,`file` varchar(280)
,`size_file` int(11)
,`time_stamp` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_data_dokumen_video_audio`
-- (See below for the actual view)
--
CREATE TABLE `v_data_dokumen_video_audio` (
`id` int(11)
,`name` varchar(130)
,`email` text
,`author_name` varchar(180)
,`author_website` varchar(180)
,`download_titel` varchar(300)
,`file` varchar(280)
,`size_file` int(11)
,`time_stamp` timestamp
);

-- --------------------------------------------------------

--
-- Structure for view `v_data_dokumen_video`
--
DROP TABLE IF EXISTS `v_data_dokumen_video`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_data_dokumen_video`  AS  select `data_dokumen`.`id` AS `id`,`data_dokumen`.`name` AS `name`,`data_dokumen`.`email` AS `email`,`data_dokumen`.`author_name` AS `author_name`,`data_dokumen`.`author_website` AS `author_website`,`data_dokumen`.`download_titel` AS `download_titel`,`data_dokumen`.`file` AS `file`,`data_dokumen`.`size_file` AS `size_file`,`data_dokumen`.`time_stamp` AS `time_stamp` from `data_dokumen` union all select `data_video`.`id` AS `id`,`data_video`.`name` AS `name`,`data_video`.`desc` AS `desc`,`data_video`.`acces` AS `acces`,`data_video`.`acces_download` AS `acces_download`,`data_video`.`download_titel` AS `download_titel`,`data_video`.`file` AS `file`,`data_video`.`size_file` AS `size_file`,`data_video`.`time_stamp` AS `time_stamp` from `data_video` where (`data_video`.`acces` = 'true') order by `time_stamp` desc ;

-- --------------------------------------------------------

--
-- Structure for view `v_data_dokumen_video_audio`
--
DROP TABLE IF EXISTS `v_data_dokumen_video_audio`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_data_dokumen_video_audio`  AS  select `v_data_dokumen_video`.`id` AS `id`,`v_data_dokumen_video`.`name` AS `name`,`v_data_dokumen_video`.`email` AS `email`,`v_data_dokumen_video`.`author_name` AS `author_name`,`v_data_dokumen_video`.`author_website` AS `author_website`,`v_data_dokumen_video`.`download_titel` AS `download_titel`,`v_data_dokumen_video`.`file` AS `file`,`v_data_dokumen_video`.`size_file` AS `size_file`,`v_data_dokumen_video`.`time_stamp` AS `time_stamp` from `v_data_dokumen_video` union all select `data_audio`.`id` AS `id`,`data_audio`.`name` AS `name`,`data_audio`.`desc` AS `desc`,`data_audio`.`acces` AS `acces`,`data_audio`.`acces_download` AS `acces_download`,`data_audio`.`download_titel` AS `download_titel`,`data_audio`.`file` AS `file`,`data_audio`.`size_file` AS `size_file`,`data_audio`.`time_stamp` AS `time_stamp` from `data_audio` where (`data_audio`.`acces` = 'true') order by `time_stamp` desc ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_audio`
--
ALTER TABLE `data_audio`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `data_video`
--
ALTER TABLE `data_video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_audio`
--
ALTER TABLE `data_audio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_dokumen`
--
ALTER TABLE `data_dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_pesan`
--
ALTER TABLE `data_pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_video`
--
ALTER TABLE `data_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
