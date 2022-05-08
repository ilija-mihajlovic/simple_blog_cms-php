-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2022 at 01:58 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `ID` int(12) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `imageURL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`ID`, `title`, `content`, `date`, `imageURL`) VALUES
(338, 'The rise and fall of Ext JS', 'For being over a decade old, Ext JS is still a good platform to develop many enterprise-grade (think intranet) applications. From 2006 to 2015, I was actively invested in the Sencha community, answering forum posts, publishing articles, books, screencasts, and conducting training around the globe.\r\n\r\nThe purpose of this article is to walk you through the history of this framework and along the way, express my observations and personal thoughts that I’ve held silent for nearly half a decade.\r\n\r\nSencha customers and the community were notified that Sencha had been sold to IDERA by means of a newsletter and a public post on Sencha’s blog.\r\nI was initially excited about the news. However, soon thereafter, my excitement turned into confusion and I learned that I wasn’t alone.', '2017-10-27', 'post337.png'),
(339, '3 Code Splitting Patterns For VueJS andWebpack', 'For being over a decade old, Ext JS is still a good platform to develop many enterprise-grade (think intranet) applications. From 2006 to 2015, I was actively invested in the Sencha community, answering forum posts, publishing articles, books, screencasts and conducting training around the globe.\r\n\r\nThe purpose of this article is to walk you through the history of this framework and along the way, express my observations and personal thoughts that I’ve held silent for nearly half a decade.\r\n\r\nSencha customers and community were notified that Sencha had been sold to IDERA by means of a newsletter and a public post on the Sencha’s blog.\r\nI was initially excited about the news. However, soon thereafter, my excitement turned into confusion and I learned that I wasn’t alone.', '2022-01-27', 'post339.png'),
(340, 'How to write reliable browser tests using Selenium and Node.js', 'For being over a decade old, Ext JS is still a good platform to develop many enterprise-grade (think intranet) applications. From 2006 to 2015, I was actively invested in the Sencha community, answering forum posts, publishing articles, books, screencasts and conducting training around the globe.\r\n\r\nThe purpose of this article is to walk you through the history of this framework and along the way, express my observations and personal thoughts that I’ve held silent for nearly half a decade.\r\n\r\nSencha customers and community were notified that Sencha had been sold to IDERA by means of a newsletter and a public post on the Sencha’s blog.\r\nI was initially excited about the news. However, soon thereafter, my excitement turned into confusion and I learned that I wasn’t alone.', '2022-01-27', 'post340.png'),
(341, 'The Surprising Relationship Between Gamification And Modern Per...', 'For being over a decade old, Ext JS is still a good platform to develop many enterprise-grade (think intranet) applications. From 2006 to 2015, I was actively invested in the Sencha community, answering forum posts, publishing articles, books, screencasts and conducting training around the globe.\r\n\r\nThe purpose of this article is to walk you through the history of this framework and along the way, express my observations and personal thoughts that I’ve held silent for nearly half a decade.\r\n\r\nSencha customers and community were notified that Sencha had been sold to IDERA by means of a newsletter and a public post on the Sencha’s blog.\r\nI was initially excited about the news. However, soon thereafter, my excitement turned into confusion and I learned that I wasn’t alone.', '2022-01-27', 'post337.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'ilija', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=342;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
