-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2022 at 09:09 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vizsgaremek`
--

-- --------------------------------------------------------

--
-- Table structure for table `beerkezesek`
--

CREATE TABLE `beerkezesek` (
  `beerk_id` int(11) NOT NULL,
  `beszallito` varchar(50) COLLATE utf8_hungarian_ci NOT NULL COMMENT 'Az áru beszállítója',
  `atvetel_datum` datetime NOT NULL,
  `dolgozo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `beerkezett_termek`
--

CREATE TABLE `beerkezett_termek` (
  `beerk_id` int(11) NOT NULL,
  `termek_id` int(11) NOT NULL,
  `mennyiseg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dolgozo`
--

CREATE TABLE `dolgozo` (
  `dolgozo_id` int(11) NOT NULL,
  `felhasznalonev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `jelszo` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `nev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rendeles`
--

CREATE TABLE `rendeles` (
  `rendeles_id` int(11) NOT NULL,
  `vasarlo_id` int(11) NOT NULL,
  `rendeles_datum` datetime NOT NULL,
  `osszeg` int(11) NOT NULL,
  `megjegyzes` text COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `rendeles`
--

INSERT INTO `rendeles` (`rendeles_id`, `vasarlo_id`, `rendeles_datum`, `osszeg`, `megjegyzes`) VALUES
(4, 9, '2022-02-20 21:30:08', 7130, 'valami'),
(5, 9, '2022-02-20 21:34:47', 11490, 'valami2'),
(8, 11, '2022-02-26 14:07:57', 14750, 'Nem akarok ennyit fizetni'),
(9, 9, '2022-03-14 19:33:09', 16630, 'test valami test valami test valami test valami test valami test valami test valami test valami test valami test valami test valami test valami test valami test valami '),
(10, 9, '2022-03-27 17:47:21', 3270, ''),
(11, 9, '2022-03-27 18:08:39', 7920, 'nem létező termék teszt'),
(12, 16, '2022-03-29 19:50:50', 14160, ''),
(13, 16, '2022-03-29 19:51:01', 2970, 'megjegyzés'),
(14, 16, '2022-03-29 20:12:16', 3270, ''),
(15, 9, '2022-04-20 20:02:11', 4160, 'asddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddsad\r\n\r\nddddddddddddddddddddddddddddddd\r\n               d');

-- --------------------------------------------------------

--
-- Table structure for table `rendelt_termek`
--

CREATE TABLE `rendelt_termek` (
  `rendeles_id` int(11) NOT NULL,
  `termek_id` int(11) NOT NULL,
  `mennyiseg` int(11) NOT NULL,
  `osszeg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `rendelt_termek`
--

INSERT INTO `rendelt_termek` (`rendeles_id`, `termek_id`, `mennyiseg`, `osszeg`) VALUES
(4, 2, 3, 1090),
(4, 5, 1, 990),
(4, 4, 2, 990),
(4, 6, 1, 890),
(5, 2, 7, 1090),
(5, 5, 1, 990),
(5, 4, 2, 990),
(5, 6, 1, 890),
(8, 6, 1, 890),
(8, 4, 9, 990),
(8, 5, 5, 990),
(9, 3, 2, 990),
(9, 2, 2, 1090),
(9, 4, 9, 990),
(9, 6, 4, 890),
(10, 2, 3, 1090),
(11, 4, 7, 990),
(11, 5, 1, 990),
(12, 2, 3, 1090),
(12, 5, 4, 990),
(12, 4, 3, 990),
(12, 3, 4, 990),
(13, 4, 3, 990),
(14, 2, 3, 1090),
(15, 2, 2, 1090),
(15, 4, 2, 990);

-- --------------------------------------------------------

--
-- Table structure for table `termek`
--

CREATE TABLE `termek` (
  `termek_id` int(11) NOT NULL,
  `nev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `ar` int(11) NOT NULL,
  `keszlet` int(11) NOT NULL,
  `foglalat` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `forma` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `teljesitmeny` int(11) NOT NULL,
  `szinhomerseklet` int(11) NOT NULL,
  `termekkod` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `ean` int(13) NOT NULL,
  `allapot` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `leiras` text COLLATE utf8_hungarian_ci NOT NULL,
  `elerheto` enum('1','0') COLLATE utf8_hungarian_ci NOT NULL,
  `akcio` enum('1','0') COLLATE utf8_hungarian_ci NOT NULL,
  `marka` varchar(20) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `termek`
--

INSERT INTO `termek` (`termek_id`, `nev`, `ar`, `keszlet`, `foglalat`, `forma`, `teljesitmeny`, `szinhomerseklet`, `termekkod`, `ean`, `allapot`, `leiras`, `elerheto`, `akcio`, `marka`) VALUES
(2, 'Bright Stick T37 8W E14 3000K', 1090, 100, 'e14', 't37', 8, 3000, 'bse148w3000', 1, 'ép', 'Az Avide LED-fényforrások a hagyományos izzókat helyettesítő magas hatékonyságú LED-ek. Tökéletesek háztartásokban található világítástechnikai megoldások lecserélésére. Többféle formában érhetők el, mint például különböző méretű gömb, mini gömb, stick, gyertya, szpot, reflektív és kapszula. Minden típusú égőnk megtalálható többféle színhőmérsékletben, több különböző foglalattal. Alacsony fogyasztásuknak és hosszú élettartamuknak köszönhetően jelentős megtakarítást eredményeznek. Nem villognak, kímélik a szemet. A ki- és bekapcsolásnak nincs élettartamot rövidítő hatása.\r\n\r\nA LED fényforrások nem egy fémszál felmelegedéséből érik el a fény kibocsátását, hanem elektronok szabadulnak fel, ezáltal minimális a hőveszteségük. LED technológiával a hagyományos izzókhoz képest akár 80%-os energiamegtakarítás is elérhető. A LED fényforrások hőtermelése minimális, ezáltal felhasználható olyan helyeken is, ahol a melegedés veszélyforrás lehet.', '1', '', ''),
(3, 'Bright Stick T37 8W E14 4000K', 990, 2, 'e14', 't37', 8, 4000, 'bse148w4000', 2, 'épp', 'Az Avide LED-fényforrások a hagyományos izzókat helyettesítő magas hatékonyságú LED-ek. Tökéletesek háztartásokban található világítástechnikai megoldások lecserélésére. Többféle formában érhetők el, mint például különböző méretű gömb, mini gömb, stick, gyertya, szpot, reflektív és kapszula. Minden típusú égőnk megtalálható többféle színhőmérsékletben, több különböző foglalattal. Alacsony fogyasztásuknak és hosszú élettartamuknak köszönhetően jelentős megtakarítást eredményeznek. Nem villognak, kímélik a szemet. A ki- és bekapcsolásnak nincs élettartamot rövidítő hatása.\r\n\r\nA LED fényforrások nem egy fémszál felmelegedéséből érik el a fény kibocsátását, hanem elektronok szabadulnak fel, ezáltal minimális a hőveszteségük. LED technológiával a hagyományos izzókhoz képest akár 80%-os energiamegtakarítás is elérhető. A LED fényforrások hőtermelése minimális, ezáltal felhasználható olyan helyeken is, ahol a melegedés veszélyforrás lehet.', '1', '', ''),
(4, 'Candle C35 4W E14 4000K', 990, 2, 'e14', 'c35', 4, 4000, 'ce144w4000', 3, 'épp', 'Az Avide LED-fényforrások a hagyományos izzókat helyettesítő magas hatékonyságú LED-ek. Tökéletesek háztartásokban található világítástechnikai megoldások lecserélésére. Többféle formában érhetők el, mint például különböző méretű gömb, mini gömb, stick, gyertya, szpot, reflektív és kapszula. Minden típusú égőnk megtalálható többféle színhőmérsékletben, több különböző foglalattal. Alacsony fogyasztásuknak és hosszú élettartamuknak köszönhetően jelentős megtakarítást eredményeznek. Nem villognak, kímélik a szemet. A ki- és bekapcsolásnak nincs élettartamot rövidítő hatása.\r\n\r\nA LED fényforrások nem egy fémszál felmelegedéséből érik el a fény kibocsátását, hanem elektronok szabadulnak fel, ezáltal minimális a hőveszteségük. LED technológiával a hagyományos izzókhoz képest akár 80%-os energiamegtakarítás is elérhető. A LED fényforrások hőtermelése minimális, ezáltal felhasználható olyan helyeken is, ahol a melegedés veszélyforrás lehet.', '1', '', ''),
(5, 'Candle C35 4W E14 3000K', 990, 2, 'e14', 'c35', 4, 3000, 'ce144w3000', 4, 'épp', 'Az Avide LED-fényforrások a hagyományos izzókat helyettesítő magas hatékonyságú LED-ek. Tökéletesek háztartásokban található világítástechnikai megoldások lecserélésére. Többféle formában érhetők el, mint például különböző méretű gömb, mini gömb, stick, gyertya, szpot, reflektív és kapszula. Minden típusú égőnk megtalálható többféle színhőmérsékletben, több különböző foglalattal. Alacsony fogyasztásuknak és hosszú élettartamuknak köszönhetően jelentős megtakarítást eredményeznek. Nem villognak, kímélik a szemet. A ki- és bekapcsolásnak nincs élettartamot rövidítő hatása.\r\n\r\nA LED fényforrások nem egy fémszál felmelegedéséből érik el a fény kibocsátását, hanem elektronok szabadulnak fel, ezáltal minimális a hőveszteségük. LED technológiával a hagyományos izzókhoz képest akár 80%-os energiamegtakarítás is elérhető. A LED fényforrások hőtermelése minimális, ezáltal felhasználható olyan helyeken is, ahol a melegedés veszélyforrás lehet.', '1', '', ''),
(6, 'Globe A60 8W E27 4000K', 890, 2, 'e27', 'a60', 8, 4000, 'ge278w4000', 5, 'épp', 'Az Avide LED-fényforrások a hagyományos izzókat helyettesítő magas hatékonyságú LED-ek. Tökéletesek háztartásokban található világítástechnikai megoldások lecserélésére. Többféle formában érhetők el, mint például különböző méretű gömb, mini gömb, stick, gyertya, szpot, reflektív és kapszula. Minden típusú égőnk megtalálható többféle színhőmérsékletben, több különböző foglalattal. Alacsony fogyasztásuknak és hosszú élettartamuknak köszönhetően jelentős megtakarítást eredményeznek. Nem villognak, kímélik a szemet. A ki- és bekapcsolásnak nincs élettartamot rövidítő hatása.\r\n\r\nA LED fényforrások nem egy fémszál felmelegedéséből érik el a fény kibocsátását, hanem elektronok szabadulnak fel, ezáltal minimális a hőveszteségük. LED technológiával a hagyományos izzókhoz képest akár 80%-os energiamegtakarítás is elérhető. A LED fényforrások hőtermelése minimális, ezáltal felhasználható olyan helyeken is, ahol a melegedés veszélyforrás lehet.', '1', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `vasarlo`
--

CREATE TABLE `vasarlo` (
  `vasarlo_id` int(11) NOT NULL,
  `vnev` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `knev` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `elfogadva` datetime NOT NULL,
  `jelszo` longtext COLLATE utf8_hungarian_ci NOT NULL,
  `irszam` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `varos` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `utca` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `hazszam` varchar(20) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `vasarlo`
--

INSERT INTO `vasarlo` (`vasarlo_id`, `vnev`, `knev`, `email`, `phone`, `elfogadva`, `jelszo`, `irszam`, `varos`, `utca`, `hazszam`) VALUES
(9, 'Nagy', 'Béla', 'test@email.com', '3670635333', '2022-02-13 21:03:32', '$2y$10$E3CkBf7zRMc1joTaGRvZ1.5WmlVtPWiuggm53JA3pP.gSN.gVi2a6', '4027', 'Debrecen', 'Füredi út', '17'),
(11, 'Taksony', 'Balambér', 'pontez@pont.po', '123456789', '2022-02-26 14:07:13', '$2y$10$aUYisEhKaEkJASyzYxJu1ulg.fWgfwJkN9rImUvPDrpP6YJCNMI/S', '1134', 'Budapest', 'Nemtom', '15'),
(12, 'test', 'test', 'asd@email.com', '99999999', '2022-03-27 17:27:11', '$2y$10$yUhIlEhYGnW7H6JRSewJZ.Seut/hf0c5d.fNask/xBJn.mQ1xmwHe', ' ', 'test', 'test', 'test'),
(13, 'Ts', 'asd', 'pelda@email.hu', '1111', '2022-03-29 19:14:11', '$2y$10$497lZ08zKTHdMkGT/jLjpuNCP1d6PdslooX03gZ9uB4EauW./4OHS', 'test', 'test', 'test', 'test'),
(14, 'test', 'test', 'asdasdasdasd@email.com', '+123456789012345', '2022-03-29 19:22:32', '$2y$10$hR98FM0cSQsjCQq1biBwpeJ28R0Yl0aAWgXgHUCIIzHrwQyemrEGC', 'test', 'test', 'test', 'test'),
(15, 'test', 'test', 'ad11dd1@email.com', '+1234567', '2022-03-29 19:22:43', '$2y$10$X4POByx.2/S2dH/ffIZz0uxmfXuGEmDjYVyH3b3lJi7gVDMfpO0Oq', 'test', 'test', 'test', 'test'),
(16, 'Kis', 'Aladár', 'kisaladar@email.com', '+123206353333', '2022-03-29 19:50:34', '$2y$10$mL.ggMbmTO9A4AitQTjgquqqDrqWzMZq003KUnc3ntUn9vVh/pcyq', '1234', 'Debrecen', 'Füredi út', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beerkezesek`
--
ALTER TABLE `beerkezesek`
  ADD PRIMARY KEY (`beerk_id`),
  ADD KEY `dolgozo` (`dolgozo_id`);

--
-- Indexes for table `beerkezett_termek`
--
ALTER TABLE `beerkezett_termek`
  ADD KEY `beerkezes` (`beerk_id`),
  ADD KEY `termek` (`termek_id`);

--
-- Indexes for table `dolgozo`
--
ALTER TABLE `dolgozo`
  ADD PRIMARY KEY (`dolgozo_id`);

--
-- Indexes for table `rendeles`
--
ALTER TABLE `rendeles`
  ADD PRIMARY KEY (`rendeles_id`),
  ADD KEY `vasarloo` (`vasarlo_id`);

--
-- Indexes for table `rendelt_termek`
--
ALTER TABLE `rendelt_termek`
  ADD KEY `rendeles` (`rendeles_id`),
  ADD KEY `termekk` (`termek_id`);

--
-- Indexes for table `termek`
--
ALTER TABLE `termek`
  ADD PRIMARY KEY (`termek_id`);

--
-- Indexes for table `vasarlo`
--
ALTER TABLE `vasarlo`
  ADD PRIMARY KEY (`vasarlo_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beerkezesek`
--
ALTER TABLE `beerkezesek`
  MODIFY `beerk_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dolgozo`
--
ALTER TABLE `dolgozo`
  MODIFY `dolgozo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rendeles`
--
ALTER TABLE `rendeles`
  MODIFY `rendeles_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `termek`
--
ALTER TABLE `termek`
  MODIFY `termek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vasarlo`
--
ALTER TABLE `vasarlo`
  MODIFY `vasarlo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beerkezesek`
--
ALTER TABLE `beerkezesek`
  ADD CONSTRAINT `dolgozo` FOREIGN KEY (`dolgozo_id`) REFERENCES `dolgozo` (`dolgozo_id`);

--
-- Constraints for table `beerkezett_termek`
--
ALTER TABLE `beerkezett_termek`
  ADD CONSTRAINT `beerkezes` FOREIGN KEY (`beerk_id`) REFERENCES `beerkezesek` (`beerk_id`),
  ADD CONSTRAINT `termek` FOREIGN KEY (`termek_id`) REFERENCES `termek` (`termek_id`);

--
-- Constraints for table `rendeles`
--
ALTER TABLE `rendeles`
  ADD CONSTRAINT `vasarlo` FOREIGN KEY (`vasarlo_id`) REFERENCES `vasarlo` (`vasarlo_id`);

--
-- Constraints for table `rendelt_termek`
--
ALTER TABLE `rendelt_termek`
  ADD CONSTRAINT `rendeles` FOREIGN KEY (`rendeles_id`) REFERENCES `rendeles` (`rendeles_id`),
  ADD CONSTRAINT `termekk` FOREIGN KEY (`termek_id`) REFERENCES `termek` (`termek_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
