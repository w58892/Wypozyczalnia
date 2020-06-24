-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 24 Cze 2020, 03:54
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `wypozyczalnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `caravanmodels`
--

CREATE TABLE `caravanmodels` (
  `modelID` int(11) NOT NULL,
  `producer` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `model` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `price` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  `lengthInside` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `widthInside` int(11) NOT NULL,
  `people` int(11) NOT NULL,
  `water` int(11) NOT NULL,
  `hotWater` tinyint(1) NOT NULL,
  `shower` tinyint(1) NOT NULL,
  `fridge` tinyint(1) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `caravanmodels`
--

INSERT INTO `caravanmodels` (`modelID`, `producer`, `model`, `price`, `weight`, `length`, `lengthInside`, `width`, `widthInside`, `people`, `water`, `hotWater`, `shower`, `fridge`, `picture`) VALUES
(1, 'Hobby', 'DeLuxe 400 SFE', 120, 1300, 2633, 1950, 2300, 2172, 3, 25, 1, 0, 1, 'Hobby-DeLuxe-400-SFE.jpg'),
(2, 'Hobby', 'DeLuxe 490 KMF', 200, 1252, 6888, 5696, 2300, 2172, 5, 25, 1, 1, 1, 'Hobby-DeLuxe-490-KMF.jpg'),
(3, 'Hobby', 'Prestige 650 UMFe', 250, 1662, 7154, 6840, 2500, 2367, 5, 50, 1, 1, 1, 'Hobby-Prestige-650-UMFe.jpg'),
(4, 'KNAUS', 'Sudwind 580 QS Silver', 240, 1260, 7850, 5680, 2500, 2340, 5, 25, 1, 1, 1, 'KNAUS-Sudwind-580-QS-Silver.jpg'),
(6, 'BUERSNTER ', 'PREMIO LIFE 420 TS', 100, 1100, 4930, 4200, 2120, 2050, 3, 12, 1, 0, 1, 'premio-life-420-ts.jpg.jpg'),
(7, 'BUERSNTER ', 'PREMIO 495 TK', 250, 1160, 5870, 5250, 2320, 2150, 5, 44, 1, 1, 1, 'PREMIO-495-TK.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `caravans`
--

CREATE TABLE `caravans` (
  `caravanID` int(11) NOT NULL,
  `numberPlate` varchar(7) NOT NULL,
  `modelID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `caravans`
--

INSERT INTO `caravans` (`caravanID`, `numberPlate`, `modelID`) VALUES
(1, 'RZ8429D', 2),
(2, 'RZ3BC54', 3),
(3, 'RZAF542', 1),
(4, 'RZJF35H', 2),
(5, 'RZD2F5S', 6),
(6, 'RZF2G15', 4),
(7, 'RZ5F2D3', 7),
(8, 'RZG3S6F', 2),
(9, 'RZ47336', 1),
(10, 'RZH4ND6', 2),
(11, 'RZH3MD7', 3),
(12, 'RZ4BR5G', 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reservations`
--

CREATE TABLE `reservations` (
  `reservationID` int(11) NOT NULL,
  `reservationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `begin` date NOT NULL,
  `end` date NOT NULL,
  `userID` int(11) NOT NULL,
  `caravanID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `reservations`
--

INSERT INTO `reservations` (`reservationID`, `reservationDate`, `begin`, `end`, `userID`, `caravanID`) VALUES
(3, '2020-06-24 01:53:44', '2020-06-15', '2020-06-20', 11, 4),
(88, '2020-06-23 21:35:06', '2020-06-11', '2020-06-12', 11, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(70) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `admin` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`userID`, `email`, `password`, `admin`) VALUES
(1, 'olihugod@gmail.com', '$2y$10$0YA4ukEzZCS1a4C9omQRiOOznizr3zkcelcVnDx3gS7AewlsrSbJ6', b'1'),
(11, 'test@test.pl', '$2y$10$Mjgm2ecUTZqC6hxWUE9U0e90xOXx4WKq49VERMdQDMzGPJbOhC/Eq', b'0');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `caravanmodels`
--
ALTER TABLE `caravanmodels`
  ADD PRIMARY KEY (`modelID`);

--
-- Indeksy dla tabeli `caravans`
--
ALTER TABLE `caravans`
  ADD PRIMARY KEY (`caravanID`),
  ADD KEY `modelID` (`modelID`);

--
-- Indeksy dla tabeli `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservationID`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `caravanmodels`
--
ALTER TABLE `caravanmodels`
  MODIFY `modelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `caravans`
--
ALTER TABLE `caravans`
  MODIFY `caravanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `caravans`
--
ALTER TABLE `caravans`
  ADD CONSTRAINT `caravans_ibfk_1` FOREIGN KEY (`modelID`) REFERENCES `caravanmodels` (`modelID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
