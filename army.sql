-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2018 at 04:39 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `army`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignweapondetails`
--

CREATE TABLE `assignweapondetails` (
  `id` int(11) NOT NULL,
  `agentmailid` varchar(80) NOT NULL,
  `teamid` int(11) NOT NULL,
  `weaponid` int(11) NOT NULL,
  `weapontypeid` int(11) NOT NULL,
  `weaponitemdetails` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignweapondetails`
--

INSERT INTO `assignweapondetails` (`id`, `agentmailid`, `teamid`, `weaponid`, `weapontypeid`, `weaponitemdetails`) VALUES
(1, 'agent@gmail.com', 1, 1, 1, 143);

-- --------------------------------------------------------

--
-- Table structure for table `assignweapons`
--

CREATE TABLE `assignweapons` (
  `id` int(11) NOT NULL,
  `teamid` int(11) NOT NULL,
  `chiefmailid` varchar(80) NOT NULL,
  `agentmailid` varchar(80) NOT NULL,
  `weaponid` int(11) NOT NULL,
  `weapontypeid` int(11) NOT NULL,
  `weaponitems` int(11) NOT NULL,
  `weaponassigndate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignweapons`
--

INSERT INTO `assignweapons` (`id`, `teamid`, `chiefmailid`, `agentmailid`, `weaponid`, `weapontypeid`, `weaponitems`, `weaponassigndate`) VALUES
(1, 1, 'chief@gmail.com', 'agent@gmail.com', 1, 1, 8, '2018-12-03 16:35:52'),
(2, 1, 'chief@gmail.com', 'agent@gmail.com', 1, 1, 8, '2018-12-03 16:38:16'),
(3, 1, 'chief@gmail.com', 'agent@gmail.com', 1, 1, 8, '2018-12-03 16:40:50'),
(4, 1, 'chief@gmail.com', 'agent@gmail.com', 1, 1, 5, '2018-12-03 16:43:25'),
(5, 1, 'chief@gmail.com', 'agent@gmail.com', 1, 1, 5, '2018-12-03 16:45:42'),
(6, 1, 'chief@gmail.com', 'agent@gmail.com', 1, 1, 3, '2018-12-03 16:46:54'),
(7, 1, 'chief@gmail.com', 'agent@gmail.com', 1, 1, 8, '2018-12-03 16:49:54'),
(8, 1, 'chief@gmail.com', 'agent@gmail.com', 1, 1, 2, '2018-12-03 16:50:18'),
(9, 1, 'chief@gmail.com', 'agent@gmail.com', 1, 1, 2, '2018-12-03 16:52:10'),
(10, 1, 'chief@gmail.com', 'agent@gmail.com', 1, 1, 22, '2018-12-03 16:56:50'),
(11, 1, 'chief@gmail.com', 'agent@gmail.com', 1, 1, 22, '2018-12-03 16:57:39'),
(12, 1, 'chief@gmail.com', 'agent@gmail.com', 1, 1, 23, '2018-12-03 17:15:13'),
(13, 1, 'chief@gmail.com', 'agent@gmail.com', 1, 1, 24, '2018-12-03 17:21:32'),
(14, 1, 'chief@gmail.com', 'agent@gmail.com', 1, 1, 5, '2018-12-03 17:24:38'),
(15, 1, 'chief@gmail.com', 'agent@gmail.com', 1, 1, 5, '2018-12-03 18:39:03');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `countryname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `countryname`) VALUES
(1, 'India'),
(2, 'Australia'),
(3, 'Pakistan');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `id` int(11) NOT NULL,
  `fromid` varchar(50) NOT NULL,
  `toid` varchar(50) NOT NULL,
  `message` longtext NOT NULL,
  `replymsg` longtext NOT NULL,
  `senddate` varchar(50) NOT NULL,
  `replydate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `fromid`, `toid`, `message`, `replymsg`, `senddate`, `replydate`) VALUES
(1, 'chief@gmail.com', 'admin@gmail.com', 'Hi chief.', 'Hi sir.', '2018-11-27 17:52:10', '2018-11-27 12:44:17'),
(2, 'admin@gmail.com', 'chief@gmail.com', 'what is my case details.', 'Once check your operation details.', '2018-11-27 18:14:02', '2018-11-27 12:45:29'),
(3, 'chief@gmail.com', 'agent@gmail.com', 'Hi sir this is agent.', 'welcome to hello world !', '2018-11-28 09:06:23', '2018-11-28 03:37:10'),
(4, 'agent@gmail.com', 'chief@gmail.com', 'welcome to hello world !', 'yes sir.', '2018-11-28 09:07:10', '2018-11-28 03:37:40');

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE `mails` (
  `id` int(11) NOT NULL,
  `fromid` varchar(50) NOT NULL,
  `toid` varchar(50) NOT NULL,
  `message` longtext NOT NULL,
  `senddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mails`
--

INSERT INTO `mails` (`id`, `fromid`, `toid`, `message`, `senddate`) VALUES
(1, 'admin@gmail.com', 'chief@gmail.com', 'Hi chief.', '2018-11-27 12:22:10'),
(2, 'chief@gmail.com', 'admin@gmail.com', 'what is my case details.', '2018-11-27 12:44:02'),
(3, 'chief@gmail.com', 'admin@gmail.com', 'Hi sir.', '2018-11-27 12:44:17'),
(4, 'admin@gmail.com', 'chief@gmail.com', 'Once check your operation details.', '2018-11-27 12:45:29'),
(5, 'agent@gmail.com', 'chief@gmail.com', 'Hi sir this is agent.', '2018-11-28 03:36:23'),
(6, 'chief@gmail.com', 'agent@gmail.com', 'welcome to hello world !', '2018-11-28 03:37:10'),
(7, 'agent@gmail.com', 'chief@gmail.com', 'yes sir.', '2018-11-28 03:37:40');

-- --------------------------------------------------------

--
-- Table structure for table `operation`
--

CREATE TABLE `operation` (
  `id` int(11) NOT NULL,
  `operationname` varchar(100) NOT NULL,
  `operationpurpose` varchar(100) NOT NULL,
  `teamid` varchar(50) NOT NULL,
  `startdate` varchar(50) NOT NULL,
  `countryid` int(11) NOT NULL,
  `stateid` int(11) NOT NULL,
  `operationdesc` longtext NOT NULL,
  `status` varchar(50) NOT NULL,
  `operationassigndate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operation`
--

INSERT INTO `operation` (`id`, `operationname`, `operationpurpose`, `teamid`, `startdate`, `countryid`, `stateid`, `operationdesc`, `status`, `operationassigndate`) VALUES
(1, 'Garuda', 'Push back the infiltrators from the Kargil Sector', '1', '08-Nov-2018', 3, 9, 'The Garud Commando Force is the special forces unit of the Indian Army Force.', 'Open', '2018-11-29 12:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `operationupdates`
--

CREATE TABLE `operationupdates` (
  `id` int(11) NOT NULL,
  `operationid` int(11) NOT NULL,
  `startdate` varchar(50) NOT NULL,
  `teamid` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `updatedate` datetime NOT NULL,
  `updatemail` varchar(80) NOT NULL,
  `operationupdatedesc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operationupdates`
--

INSERT INTO `operationupdates` (`id`, `operationid`, `startdate`, `teamid`, `status`, `updatedate`, `updatemail`, `operationupdatedesc`) VALUES
(1, 1, '08-Nov-2018', 1, 'Not-Open', '2018-11-29 12:02:00', 'admin@gmail.com', ''),
(2, 1, '08-Nov-2018', 1, 'Open', '2018-11-29 12:16:38', 'admin@gmail.com', ''),
(3, 1, '08-Nov-2018', 1, 'Process', '2018-11-29 12:19:20', 'admin@gmail.com', ''),
(4, 1, '08-Nov-2018', 1, 'Process', '2018-11-29 12:23:57', 'admin@gmail.com', ''),
(5, 1, '08-Nov-2018', 1, 'Open', '2018-11-29 12:54:03', 'chief@gmail.com', 'We are start the operation.'),
(6, 1, '08-Nov-2018', 1, 'Open', '2018-11-30 10:55:47', 'agent@gmail.com', 'i am doing sir.'),
(7, 1, '08-Nov-2018', 1, 'Open', '2018-11-30 10:56:16', 'agent@gmail.com', 'i am doing sir.');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `fullname` varchar(80) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `emailid` varchar(80) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `image` varchar(100) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `postal` varchar(10) NOT NULL,
  `role` varchar(30) NOT NULL,
  `regdate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fullname`, `gender`, `emailid`, `password`, `mobile`, `image`, `dob`, `address`, `city`, `state`, `country`, `postal`, `role`, `regdate`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin', '0000000000', 'admin.png', '00-00-0000', 'admin', 'admin', 'admin', 'admin', '000000', 'admin', '0000-00-00'),
(2, 'Agent Chief', 'Male', 'chief@gmail.com', 'password', '9898656562', 'user1.png', '1982-01-18', 'sr nagar', 'Hyderabad', 'Telangana', 'india', '500032', 'chief', '2018-11-27 16:06:48'),
(3, 'Chief Agent', 'Male', 'chiefagent@gmail.com', 'password', '9977445588', 'User2.png', '1982-06-15', 'sr nagar', 'Hyderabad', 'Telangana', 'india', '500012', 'chief', '2018-11-27 18:17:57'),
(4, 'agent', 'Male', 'agent@gmail.com', 'password', '9898656565', 'user4.png', '1988-01-05', 'sr nagar', 'Hyderabad', 'Telangana', 'India', '500018', 'agent', '2018-11-27 18:40:20'),
(5, 'Agent name', 'Male', 'agentname@gmail.com', 'password', '8855669977', 'user5.png', '1989-01-20', 'ameerpet', 'Hyderabad', 'Telangana', 'India', '500012', 'agent', '2018-11-27 18:41:30');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `countryid` varchar(10) NOT NULL,
  `statename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `countryid`, `statename`) VALUES
(1, '1', 'Telangana'),
(2, '1', 'Andhra Pradhesh'),
(3, '1', 'Tamilnadu'),
(4, '1', 'Karnataka'),
(5, '1', 'Mumbai'),
(6, '1', 'Kolkatta'),
(7, '1', 'Kashmeer'),
(8, '3', 'Karachi'),
(9, '3', 'Lahore');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `teamname` varchar(100) NOT NULL,
  `teamlead` varchar(80) NOT NULL,
  `teamdesc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `teamname`, `teamlead`, `teamdesc`) VALUES
(1, 'Team 1', 'chief@gmail.com', 'Create the new team.'),
(2, 'Team 2', 'chiefagent@gmail.com', 'Create the new team 2.');

-- --------------------------------------------------------

--
-- Table structure for table `teamassign`
--

CREATE TABLE `teamassign` (
  `id` int(11) NOT NULL,
  `teamid` int(11) NOT NULL,
  `agentmailid` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teamassign`
--

INSERT INTO `teamassign` (`id`, `teamid`, `agentmailid`) VALUES
(1, 1, 'agent@gmail.com'),
(2, 1, 'agentname@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `weapon`
--

CREATE TABLE `weapon` (
  `id` int(11) NOT NULL,
  `weaponcategory` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weapon`
--

INSERT INTO `weapon` (`id`, `weaponcategory`) VALUES
(1, 'Gun'),
(2, 'Bullets');

-- --------------------------------------------------------

--
-- Table structure for table `weaponassign`
--

CREATE TABLE `weaponassign` (
  `id` int(11) NOT NULL,
  `teamid` int(11) NOT NULL,
  `weaponid` int(11) NOT NULL,
  `weapontypeid` int(11) NOT NULL,
  `weaponitems` int(11) NOT NULL,
  `weaponassigndate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weaponassign`
--

INSERT INTO `weaponassign` (`id`, `teamid`, `weaponid`, `weapontypeid`, `weaponitems`, `weaponassigndate`) VALUES
(7, 1, 1, 1, 10, '2018-12-03 14:27:40'),
(8, 1, 2, 4, 100, '2018-12-03 14:28:09'),
(9, 1, 1, 2, 25, '2018-12-03 14:31:05'),
(10, 1, 1, 1, 15, '2018-12-03 14:31:21'),
(11, 2, 2, 6, 150, '2018-12-03 16:04:36'),
(12, 1, 1, 2, 13, '2018-12-03 16:05:07');

-- --------------------------------------------------------

--
-- Table structure for table `weapondetails`
--

CREATE TABLE `weapondetails` (
  `id` int(11) NOT NULL,
  `teamid` int(11) NOT NULL,
  `weaponid` int(11) NOT NULL,
  `weapontypeid` int(11) NOT NULL,
  `weaponsitems` int(11) NOT NULL,
  `avlweaponsitems` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weapondetails`
--

INSERT INTO `weapondetails` (`id`, `teamid`, `weaponid`, `weapontypeid`, `weaponsitems`, `avlweaponsitems`) VALUES
(1, 1, 1, 1, 25, 10),
(2, 1, 2, 4, 100, 100),
(3, 1, 1, 2, 38, 38),
(4, 2, 2, 6, 150, 150);

-- --------------------------------------------------------

--
-- Table structure for table `weapontype`
--

CREATE TABLE `weapontype` (
  `id` int(11) NOT NULL,
  `weaponid` int(11) NOT NULL,
  `weapontype` varchar(100) NOT NULL,
  `weapontypedesc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weapontype`
--

INSERT INTO `weapontype` (`id`, `weaponid`, `weapontype`, `weapontypedesc`) VALUES
(1, 1, 'Daniel Defense AR-15', 'The DDM4V1, the original Daniel Defense Rifle, is built with a Cold Hammer Forged 16â€ M4 Profile barrel with a Carbine gas system.'),
(2, 1, 'AK-47', 'AK-47, also called Kalashnikov Model 1947, Soviet assault rifle, possibly the most widely used shoulder weapon in the world.'),
(3, 1, 'Pistol', 'We will be using â€œpistolâ€ and â€œhandgunâ€ to mean the same thing.'),
(4, 2, '9mm', 'This pistol round is officially known as the â€œ9x19mm Parabellumâ€ or â€œ9mm Lugerâ€ to distinguish it from other 9mm rounds, but you will be fine just saying â€œnine millimeterâ€ or â€œnine milâ€ for those in the know.'),
(5, 2, 'S&W', 'Originally designed for the FBI as a reduced 10mm cartridge and popular with other law enforcement agencies ever since.'),
(6, 2, '7.62x39mm', 'The â€œtwo-two-threeâ€ (inch) Remington has almost the exact dimensions as the â€œfive-five-sixâ€ (mm) NATO cartridge.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignweapondetails`
--
ALTER TABLE `assignweapondetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignweapons`
--
ALTER TABLE `assignweapons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operationupdates`
--
ALTER TABLE `operationupdates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teamassign`
--
ALTER TABLE `teamassign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weapon`
--
ALTER TABLE `weapon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weaponassign`
--
ALTER TABLE `weaponassign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weapondetails`
--
ALTER TABLE `weapondetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weapontype`
--
ALTER TABLE `weapontype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignweapondetails`
--
ALTER TABLE `assignweapondetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `assignweapons`
--
ALTER TABLE `assignweapons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `operation`
--
ALTER TABLE `operation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `operationupdates`
--
ALTER TABLE `operationupdates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `teamassign`
--
ALTER TABLE `teamassign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `weapon`
--
ALTER TABLE `weapon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `weaponassign`
--
ALTER TABLE `weaponassign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `weapondetails`
--
ALTER TABLE `weapondetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `weapontype`
--
ALTER TABLE `weapontype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
