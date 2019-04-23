-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Abr-2019 às 16:05
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `videos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `video`
--

CREATE TABLE `video` (
  `codvideo` int(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `name` text,
  `question` text,
  `opt1` text,
  `opt1path` text,
  `opt2` text,
  `opt2path` text,
  `ending` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `video`
--

INSERT INTO `video` (`codvideo`, `path`, `name`, `question`, `opt1`, `opt1path`, `opt2`, `opt2path`, `ending`) VALUES
(1, 'v1.mp4', 'Video 1', 'Aquilo?', 'Isto', 'v2.mp4', 'Isto 2', 'v3.mp4', 0),
(2, 'v2.mp4', 'Video 2', 'Porque?', 'Porque sim', 'v4.mp4', 'Porque não', 'v5.mp4', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vidstatus`
--

CREATE TABLE `vidstatus` (
  `video_actual` varchar(255) NOT NULL,
  `video_status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `voting`
--

CREATE TABLE `voting` (
  `userip` varchar(255) NOT NULL,
  `codvideo` int(11) NOT NULL,
  `coption` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`codvideo`,`path`);

--
-- Indexes for table `vidstatus`
--
ALTER TABLE `vidstatus`
  ADD PRIMARY KEY (`video_actual`);

--
-- Indexes for table `voting`
--
ALTER TABLE `voting`
  ADD PRIMARY KEY (`userip`),
  ADD KEY `FK_UserVideo` (`codvideo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `codvideo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `voting`
--
ALTER TABLE `voting`
  ADD CONSTRAINT `FK_UserVideo` FOREIGN KEY (`codvideo`) REFERENCES `video` (`codvideo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
