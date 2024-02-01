-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2023 at 07:22 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sharemsg`
--

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `aid` int(11) NOT NULL,
  `linkid` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `readstatus` tinyint(1) DEFAULT 0,
  `created` datetime DEFAULT current_timestamp(),
  `ip` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `query` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`aid`, `linkid`, `message`, `readstatus`, `created`, `ip`, `query`) VALUES
(14, 'BKrfs7', 'test', 1, '2023-01-11 12:38:02', '::1', NULL),
(15, 'h6lGt3', 'Checking\r\n', 1, '2023-01-11 12:56:27', '192.168.31.61', NULL),
(16, 'BKrfs7', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent molestie leo ornare enim facilisis malesuada. Pellentesque sit amet mollis quam est.', 1, '2023-01-12 14:44:10', '::1', NULL),
(17, 'BKrfs7', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce feugiat eu orci non consectetur. Aenean sed dui vitae turpis mollis tristique non sit amet nunc. Sed arcu neque, posuere et ipsum ut, consectetur sollicitudin magna. Nam eu dui a arcu molestie.', 1, '2023-01-12 15:05:01', '::1', NULL),
(18, 'BKrfs7', 'sssss', 1, '2023-01-12 15:14:16', '::1', NULL),
(19, 'QVHM4Q', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae mi id felis interdum tincidunt. Nullam ornare augue nec aliquam sollicitudin nam.', 1, '2023-01-20 20:49:56', '::1', NULL),
(20, 'QVHM4Q', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent porta ante justo. Sed ac velit finibus, rhoncus dolor ut, condimentum arcu. Morbi rhoncus enim odio, eget luctus felis fermentum quis. Duis pharetra id ante non dignissim. Nunc blandit nisi.', 0, '2023-01-20 20:52:48', '::1', NULL),
(21, 'QVHM4Q', 'LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT. INTEGER AUCTOR UT URNA VEL FRINGILLA. DONEC ALIQUET FINIBUS TELLUS, SIT AMET TEMPOR ODIO PORTA VEL. INTEGER ET INTERDUM AUGUE, AC SCELERISQUE AUGUE. SED SIT AMET PLACERAT NUNC. PELLENTESQUE PHARETRA.', 1, '2023-01-20 21:03:18', '::1', NULL),
(22, 'QVHM4Q', 'ne ami tomake bhalo vhese phelechilam. etao lijkte hbe? bhalo bchese? bara protek ta spelling, e gaar mereche, amar ar na thik ache, ar kichu chup lano lopre geli, e bara paglachoda', 0, '2023-01-20 21:06:22', '::1', NULL),
(23, 'Q2UGxe', 'asdsaasfacxcccccccccccccccccccccccccccccc ', 1, '2023-01-23 15:07:49', '::1', NULL),
(24, 'IGiTDP', ' â¤ï¸â¤ï¸â¤ï¸â¤ï¸â¤ï¸â¤ï¸â¤ï¸', 1, '2023-02-01 21:01:12', '::1', NULL),
(25, 'IGiTDP', 'â¤ï¸â¤ï¸â¤ï¸â¤ï¸â¤ï¸', 1, '2023-02-01 21:03:32', '::1', NULL),
(26, 'IGiTDP', '?????', 1, '2023-02-02 14:43:59', '::1', NULL),
(27, 'IGiTDP', '&#65;&#65;&#65;&#65;', 1, '2023-02-02 14:47:36', '::1', NULL),
(28, 'IGiTDP', '?????', 1, '2023-02-02 14:54:28', '192.168.31.61', NULL),
(29, 'IGiTDP', '👌👌👌👌', 1, '2023-02-02 15:17:45', '::1', NULL),
(30, 'IGiTDP', '🐱‍👤🐱‍👤🐱‍👤🐱‍👤🐱‍👤', 1, '2023-02-02 15:52:59', '::1', NULL),
(31, 'IGiTDP', 'hello obi ❤❤❤❤ you looking hot today💋💋🌹🌹✔✔✔ need to play valo to get toxic🎉', 1, '2023-02-02 15:59:03', '::1', NULL),
(33, 'IGiTDP', '❤🧡💛💚💙💜🤎🖤💖💗💓💞💕💔🤍💘💝💟💌💢💥💤💦🎉🎊🎃✨🧨🎇🎆🎋🎍🎏🧧🛒🎠🎟🖼🎪🎁🎗😀😁😂😃😅😆😗😍😚😑😣😥😑😌😌😣🙂😙🤩🤔😣😑dfadsfadfaffsdfsdfssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 1, '2023-02-02 20:23:17', '::1', NULL),
(34, 'IGiTDP', 'ðŸ”¥ðŸ”¥ðŸ”¥ðŸ”¥â¤ï¸â¤ï¸â¤ï¸i love myself. Thia site is best mummy or everest ðŸ‘ŒðŸ‘ŒðŸ‘ŒðŸ‘ŒðŸ˜˜ðŸ˜…ðŸ˜…ðŸ˜ðŸ¤­ðŸ˜µðŸ˜ƒðŸ˜‰ðŸ˜ŽðŸ¤®ðŸ”¥ðŸ”¥ðŸ”¥ðŸ”¥ðŸ”¥ðŸ‘‰', 1, '2023-02-02 20:27:14', '::1', NULL),
(35, 'h6lGt3', '🤤♥️🤦🤘😂🤮🤔😎yehsklapab sjaibq sidjwowk diso🤤👌😔😱😉🖕😃😵😱👍👏👉👉😘😉😵😁🤦', 1, '2023-02-03 12:01:45', '192.168.31.61', NULL),
(36, 'IGiTDP', 'hello', 1, '2023-02-03 15:24:28', '::1', NULL),
(37, 'IGiTDP', 'rhgfbvcxrfdgfdsgfsg', 1, '2023-03-08 19:00:01', '::1', NULL),
(38, 'IGiTDP', 'dddddddddddd', 1, '2023-03-08 19:01:17', '::1', 'what is cat?'),
(39, 'IGiTDP', 'fhdfghnndhtd', 1, '2023-03-08 19:01:36', '::1', ''),
(40, 'IGiTDP', 'iuluh,hbv,jyflfy,yfl', 1, '2023-03-08 19:02:19', '::1', NULL),
(41, 'IGiTDP', 'iuluh,hbv,jyflfy,yfl', 1, '2023-03-08 19:02:32', '::1', NULL),
(44, 'IGiTDP', 'rteryefgbedbeh', 1, '2023-03-08 19:16:43', '::1', NULL),
(45, 'IGiTDP', '💥😦🤔😚💜🤩🧨sfdsdfsf', 1, '2023-09-03 21:17:27', '::1', 'Send anonymous message to hell77');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret_key` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkid` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `joined` datetime DEFAULT current_timestamp(),
  `lastseen` datetime DEFAULT current_timestamp(),
  `refid` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `query` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `querytime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `secret_key`, `linkid`, `status`, `joined`, `lastseen`, `refid`, `email`, `ip`, `query`, `querytime`) VALUES
(1, 'sanjeev', 'b5qDG3g2', 'BKrfs7', 0, '2023-01-03 13:48:17', '2023-01-16 20:38:11', 'f8gVas', 'test@gmail.com', '::1', NULL, NULL),
(2, 'Harry', 'boHxW0PB', 'h6lGt3', 1, '2023-01-11 12:54:46', '2023-02-03 13:31:33', NULL, NULL, '192.168.31.61', NULL, NULL),
(3, 'harry', 'uBHpNbHA', 'QVHM4Q', 1, '2023-01-20 20:47:07', '2023-01-20 21:06:30', 'BKrfs7', NULL, '::1', NULL, NULL),
(4, 'test', 'vAkPx4Bx', 'lUX6lV', 1, '2023-01-21 20:19:59', '2023-01-21 20:20:17', NULL, NULL, '::1', NULL, NULL),
(5, 'kal', 'nfeFf08D', 'Q2UGxe', 1, '2023-01-22 13:26:08', '2023-01-29 17:28:09', NULL, NULL, '::1', NULL, NULL),
(6, 'hello', 'GWwLi1ZF', 'IGiTDP', 1, '2023-02-01 18:32:11', '2023-09-16 13:53:06', NULL, NULL, '::1', NULL, '2023-09-14 14:42:15'),
(7, 'New feature', 'uN4TCBgw', 'EjVIlX', 1, '2023-03-08 19:14:14', '2023-03-08 19:14:14', NULL, NULL, '::1', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
