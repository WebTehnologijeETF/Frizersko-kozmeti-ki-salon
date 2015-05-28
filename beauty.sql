-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2015 at 10:48 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `beauty`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE IF NOT EXISTS `komentari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `novost` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `novost` (`novost`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `komentari`
--

INSERT INTO `komentari` (`id`, `autor`, `tekst`, `email`, `datum`, `novost`) VALUES
(8, 'selma', 'selma', 'selma.tucak@hotmail.com', '0000-00-00 00:00:00', 2),
(9, 'selma tucak', 'ovo je komentar', 'selma.tucak@hotmail.com', '0000-00-00 00:00:00', 2),
(11, 'selma', 'selma', 'selma.tucak@hotmail.com', '2015-05-27 22:28:02', 2),
(12, 'novi autor', 'novi komentar', 'selma.tucak@hotmail.com', '2015-05-27 22:28:16', 2);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `username` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`username`, `password`) VALUES
('selma', 'pass'),
('admin', 'admin'),
('userneki', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `novosti`
--

CREATE TABLE IF NOT EXISTS `novosti` (
  `naslov` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `autor` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slika` varchar(500) COLLATE utf8_slovenian_ci NOT NULL,
  `vise` text COLLATE utf8_slovenian_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `novosti`
--

INSERT INTO `novosti` (`naslov`, `tekst`, `autor`, `datum`, `id`, `slika`, `vise`) VALUES
('BOTOX ZA KOSU', 'Ubrizgavanje keratinske mase direktno u središnji dio kose,\r\nkoltikulu dlake otvaramo hladnom peglom INFRA-RED CRVENOM.\r\nCijena: 150 KM\r\n', 'Selma Tucak', '2015-05-05 16:30:15', 1, 'https://www.ponudadana.hr/dodaci/2657/sjajna_kosa_mala.jpg', NULL),
('BRAZILSKI TRETMAN KOSE', 'Nova usluga u našim salonima:\r\nBrazilski tretman kose\r\nCijena: 50 KM', 'Selma Tucak', '2015-05-27 00:12:12', 2, 'http://www.image.ba/v2/images/stories/brazilski_tretman_kose.png', NULL),
('DIJAMANTNA MIKRODERMOABRAZIJA', 'Mehanicko skidanje površinskih izumrlih slojeva kože\r\nuz pomoc sonde sa dijamantskom glavom i vakumom koji\r\nujedno vrši i vakum masažu, smanjuje proširene pore, smanjuje\r\npjege, male bore i poboljšava tonus kože.', 'Selma Tucak', '2015-05-25 12:21:07', 3, 'http://frizerski-salon-banjaluka.com/wp-content/uploads/2014/01/dijamantna-mikrodermoabrazija-676px-180px.jpg', 'Mikrodermoabraziija je efikasna kod svih tipova kože, a narocito je potrebna\r\nonima koji hoce da smanje pjege, ožiljke, bore, izjednace ten lica, poboljšaju \r\nstanje beživotne sive kože. Mikrodermoabrazija je postala jedna od najpopularnijih\r\ntretmana u svijetu za blistav ten i cistocu lica. Povecava se otpornost kože\r\ni kapacitet za vlagu, a odlicne rezultate postiže u brobi protiv mitisera,\r\nožiljaka i sitnih bora.');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentari`
--
ALTER TABLE `komentari`
  ADD CONSTRAINT `komentari_ibfk_1` FOREIGN KEY (`novost`) REFERENCES `novosti` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
