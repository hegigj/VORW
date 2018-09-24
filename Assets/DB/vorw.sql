-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2018 at 10:29 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vorw`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Aid` int(11) NOT NULL,
  `Aemer` varchar(20) NOT NULL,
  `Ambiemer` varchar(20) NOT NULL,
  `Atel` varchar(13) NOT NULL,
  `Aemail` varchar(50) NOT NULL,
  `Ausername` varchar(20) NOT NULL,
  `Apassword` varchar(20) NOT NULL,
  `Apin` char(4) NOT NULL,
  `Aimg` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Aid`, `Aemer`, `Ambiemer`, `Atel`, `Aemail`, `Ausername`, `Apassword`, `Apin`, `Aimg`) VALUES
(1, 'Hegi', 'Gjoka', '+355696952094', 'hgjoka15@epoka.edu.al', 'hgjoka18', 'Erme!998', '1934', 'IMG_2707.jpg'),
(2, 'Ermelinda', 'Topciu', '+355698594746', 'topciuerme@gmail.com', 'erme18', 'uzkm2017', '0000', '');

-- --------------------------------------------------------

--
-- Table structure for table `pkategori`
--

CREATE TABLE `pkategori` (
  `PKid` int(11) NOT NULL,
  `Unipt` char(10) NOT NULL,
  `Pkategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pkategori`
--

INSERT INTO `pkategori` (`PKid`, `Unipt`, `Pkategori`) VALUES
(1, 'H12345678G', 'Pije Freskuse'),
(2, 'H12345678G', 'Makarona'),
(3, 'H12345678G', 'Tost'),
(4, 'H12345678G', 'Embelsira');

-- --------------------------------------------------------

--
-- Table structure for table `produkt`
--

CREATE TABLE `produkt` (
  `Pid` int(11) NOT NULL,
  `Unipt` char(10) NOT NULL,
  `Pkategori` varchar(50) NOT NULL,
  `Pemer` varchar(50) NOT NULL,
  `Ppershkrim` text NOT NULL,
  `Pnjesia` varchar(20) NOT NULL,
  `Psasia` int(11) NOT NULL,
  `Pcmimi` int(11) NOT NULL,
  `Pgjendje` char(1) NOT NULL,
  `Pshitje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produkt`
--

INSERT INTO `produkt` (`Pid`, `Unipt`, `Pkategori`, `Pemer`, `Ppershkrim`, `Pnjesia`, `Psasia`, `Pcmimi`, `Pgjendje`, `Pshitje`) VALUES
(1, 'H12345678G', 'Pije Freskuse', 'Dragon Blu', 'Dragon Heart Blu me permbajtje te ulet kafeine, pa taurine 500ml', 'cope', 271, 100, '1', 123220),
(2, 'H12345678G', 'Pije Freskuse', 'Dragon i Kuq', 'Dragon Heart i Kuq me permbajtje te lart kafeine, pa taurine 500ml', 'cope', 117, 80, '1', 19520),
(3, 'H12345678G', 'Makarona', 'Spageti Misko', 'Spageti Misko Nr.6 me salce, me kackavall te grir, ullinj dhe e sherbyer me djath te bardh siper', 'cope', 263, 200, '1', 196200),
(4, 'H12345678G', 'Tost', 'Tost Sophie', 'Tost Sophie me djath guda,proshut pule,majoneze tusch,philadelphia dhe domate', 'cope', 267, 150, '1', 214500),
(5, 'H12345678G', 'Embelsira', 'Kek Perside', 'Kek i pergatitur nga Persida e sherbyer me nutella siper dhe kontur frutash stine anash', 'cope', 258, 150, '1', 160200);

-- --------------------------------------------------------

--
-- Table structure for table `tavolin`
--

CREATE TABLE `tavolin` (
  `Tid` int(11) NOT NULL,
  `Unipt` char(10) NOT NULL,
  `Tnr` varchar(4) NOT NULL,
  `Tprodukt` varchar(50) NOT NULL,
  `Tnjesia` varchar(20) NOT NULL,
  `Tsasia` int(11) NOT NULL,
  `Tcmimi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Uid` int(11) NOT NULL,
  `Unipt` char(10) NOT NULL,
  `Uemer` varchar(50) NOT NULL,
  `Uqytet` varchar(20) NOT NULL,
  `Uadresa` text NOT NULL,
  `UdataRegj` date NOT NULL,
  `Udata` date NOT NULL,
  `Utel` varchar(13) NOT NULL,
  `Uemail` varchar(50) NOT NULL,
  `Uusername` varchar(20) NOT NULL,
  `Upassword` varchar(20) NOT NULL,
  `UwifiUsername` varchar(20) NOT NULL,
  `UwifiPassword` varchar(20) NOT NULL,
  `UlogoImg` varchar(500) NOT NULL,
  `UsfondImg` varchar(500) NOT NULL,
  `Upercent` double NOT NULL,
  `Ushitje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Uid`, `Unipt`, `Uemer`, `Uqytet`, `Uadresa`, `UdataRegj`, `Udata`, `Utel`, `Uemail`, `Uusername`, `Upassword`, `UwifiUsername`, `UwifiPassword`, `UlogoImg`, `UsfondImg`, `Upercent`, `Ushitje`) VALUES
(1, 'H12345678G', 'Hegi Home Bar', 'Tirane', 'Rr. Sabi Preveza, Astir, Kompleksi Gora Jon, Ap 11', '2018-07-27', '2018-07-27', '+355696952094', 'hgjoka15@epoka.edu.al', 'hgjoka15', 'erme0000', 'Hegi_WiFi', 'BosiNgaLasi', 'IMG_2891.jpg', 'IMG_2886.jpg', 0.02, 14073);

-- --------------------------------------------------------

--
-- Table structure for table `waiter`
--

CREATE TABLE `waiter` (
  `Wid` int(11) NOT NULL,
  `Unipt` char(10) NOT NULL,
  `Widcard` char(10) NOT NULL,
  `Wemer` varchar(20) NOT NULL,
  `Wmbiemer` varchar(20) NOT NULL,
  `Wtel` varchar(13) NOT NULL,
  `Wusername` varchar(20) NOT NULL,
  `Wpassword` varchar(20) NOT NULL,
  `Wdata` date NOT NULL,
  `Wworktime` int(11) NOT NULL,
  `Wroga` int(11) NOT NULL,
  `Wshitje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waiter`
--

INSERT INTO `waiter` (`Wid`, `Unipt`, `Widcard`, `Wemer`, `Wmbiemer`, `Wtel`, `Wusername`, `Wpassword`, `Wdata`, `Wworktime`, `Wroga`, `Wshitje`) VALUES
(1, 'H12345678G', 'J70116067N', 'Hegi', 'Gjoka', '+355696952094', 'hgjoka3pm', '1934', '2018-07-28', 0, 10000, 36900);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Aid`);

--
-- Indexes for table `pkategori`
--
ALTER TABLE `pkategori`
  ADD PRIMARY KEY (`PKid`);

--
-- Indexes for table `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`Pid`);

--
-- Indexes for table `tavolin`
--
ALTER TABLE `tavolin`
  ADD PRIMARY KEY (`Tid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Uid`);

--
-- Indexes for table `waiter`
--
ALTER TABLE `waiter`
  ADD PRIMARY KEY (`Wid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pkategori`
--
ALTER TABLE `pkategori`
  MODIFY `PKid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produkt`
--
ALTER TABLE `produkt`
  MODIFY `Pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tavolin`
--
ALTER TABLE `tavolin`
  MODIFY `Tid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `waiter`
--
ALTER TABLE `waiter`
  MODIFY `Wid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
