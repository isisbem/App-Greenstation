-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 26, 2024 alle 09:09
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `green_station`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `rilevamenti`
--

CREATE TABLE `rilevamenti` (
  `id` int(100) NOT NULL,
  `prese_occupate` int(100) NOT NULL,
  `consumo_istantaneo` int(100) NOT NULL,
  `consumo_totale` int(100) NOT NULL,
  `data_ora_inizio_carica` time(6) NOT NULL,
  `data_ora_fine_carica` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `rilevamenti`
--

INSERT INTO `rilevamenti` (`id`, `prese_occupate`, `consumo_istantaneo`, `consumo_totale`, `data_ora_inizio_carica`, `data_ora_fine_carica`) VALUES
(1, 0, 0, 0, '08:27:09.000000', '13:29:09.000000'),
(2, 0, 0, 0, '08:33:00.000000', '12:06:00.000000'),
(3, 0, 0, 0, '09:00:00.000000', '13:00:00.000000'),
(4, 0, 0, 0, '09:17:00.000000', '13:39:00.000000'),
(5, 0, 0, 0, '09:48:00.000000', '13:54:00.000000'),
(6, 0, 0, 0, '10:02:00.000000', '13:59:00.000000');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `rilevamenti`
--
ALTER TABLE `rilevamenti`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
