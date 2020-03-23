-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 18 mrt 2020 om 13:42
-- Serverversie: 8.0.18
-- PHP-versie: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pokemons`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pokemons`
--

CREATE TABLE `pokemons` (
  `id` int(123) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `energyType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `health` int(123) NOT NULL,
  `attack1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `attack1_damage` int(123) NOT NULL,
  `attack2` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `attack2_damage` int(123) NOT NULL,
  `weakness` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `weakness_multiplier` float NOT NULL,
  `resistance` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `resistance_value` int(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `pokemons`
--

INSERT INTO `pokemons` (`id`, `name`, `energyType`, `health`, `attack1`, `attack1_damage`, `attack2`, `attack2_damage`, `weakness`, `weakness_multiplier`, `resistance`, `resistance_value`) VALUES
(1, 'Pikachu', 'Electric', 50, 'Pika Punch', 20, 'Electric Ring', 50, 'Fire', 1.5, 'Fighting', 20),
(2, 'Charmeleon', 'Fire', 60, 'Head Butt', 10, 'Flare', 30, 'Water', 2, 'Electric', 10);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `pokemons`
--
ALTER TABLE `pokemons`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `pokemons`
--
ALTER TABLE `pokemons`
  MODIFY `id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
