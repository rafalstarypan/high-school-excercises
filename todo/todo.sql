-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Lis 2020, 10:58
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `todo`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `todo`
--

CREATE TABLE `todo` (
  `id_todo` int(11) NOT NULL,
  `nazwa` text NOT NULL,
  `czy_wazne` tinyint(1) NOT NULL,
  `czy_zrobione` tinyint(1) NOT NULL,
  `kolor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `todo`
--

INSERT INTO `todo` (`id_todo`, `nazwa`, `czy_wazne`, `czy_zrobione`, `kolor`) VALUES
(1, 'Ósemka', 0, 0, 'black'),
(2, 'pójść na spacer', 0, 1, 'BLUE'),
(4, 'kupić majtki', 1, 0, 'red');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id_todo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `todo`
--
ALTER TABLE `todo`
  MODIFY `id_todo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
