-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 13 jun 2021 om 18:43
-- Serverversie: 10.4.14-MariaDB
-- PHP-versie: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databasebbl`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bedrijf`
--

CREATE TABLE `bedrijf` (
  `id_bedrijf` int(11) NOT NULL,
  `id_gebruiker` int(11) NOT NULL,
  `bedrijfsnaam` varchar(25) NOT NULL,
  `kvknummer` varchar(8) NOT NULL,
  `straat` varchar(25) NOT NULL,
  `huisnummer` varchar(5) NOT NULL,
  `huisnummertoevoeging` varchar(5) NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `plaats` varchar(35) NOT NULL,
  `land` varchar(25) NOT NULL,
  `telefoonnummer` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `bedrijf`
--

INSERT INTO `bedrijf` (`id_bedrijf`, `id_gebruiker`, `bedrijfsnaam`, `kvknummer`, `straat`, `huisnummer`, `huisnummertoevoeging`, `postcode`, `plaats`, `land`, `telefoonnummer`) VALUES
(1, 3, 'bedrijf', '12345678', 'teststraat', '12', 'H', '1100TE', 'ESTERAN', 'Nederland', '02012345'),
(2, 4, 'new bedrijf', '87654321', 'teststraat', '12', 'd', '1203OK', 'ESTERAN', 'testland', '02012345');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `meetinstrument`
--

CREATE TABLE `meetinstrument` (
  `id_meetinstrument` int(11) NOT NULL,
  `id_gebruiker` int(11) NOT NULL,
  `onderwerp` varchar(50) NOT NULL,
  `meetinstrument` text NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `meetinstrument`
--

INSERT INTO `meetinstrument` (`id_meetinstrument`, `id_gebruiker`, `onderwerp`, `meetinstrument`, `datum`) VALUES
(1, 1, 'Frontend', 'ik heb meer hulp nodig bij Frontend', '2021-06-10'),
(2, 5, 'Backend', 'ik wil meer info in backend', '2021-06-11');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `np`
--

CREATE TABLE `np` (
  `id_gebruiker` int(11) NOT NULL,
  `geslacht` varchar(20) NOT NULL,
  `titel` varchar(10) NOT NULL,
  `geboortedatum` date NOT NULL,
  `rol` varchar(25) NOT NULL,
  `voornaam` varchar(40) NOT NULL,
  `tussenvoegsels` varchar(25) NOT NULL,
  `achternaam` varchar(25) NOT NULL,
  `straat` varchar(40) NOT NULL,
  `huisnummer` varchar(10) NOT NULL,
  `huisnummertoevoeging` varchar(5) NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `plaats` varchar(30) NOT NULL,
  `land` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefoonnummer` varchar(10) NOT NULL,
  `mobielnummer` varchar(12) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `kvknummer` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `np`
--

INSERT INTO `np` (`id_gebruiker`, `geslacht`, `titel`, `geboortedatum`, `rol`, `voornaam`, `tussenvoegsels`, `achternaam`, `straat`, `huisnummer`, `huisnummertoevoeging`, `postcode`, `plaats`, `land`, `email`, `telefoonnummer`, `mobielnummer`, `wachtwoord`, `kvknummer`) VALUES
(1, 'Man', 'Mr.', '2021-06-09', 'Leerling', 'leerlingtest', 'van', 'test', 'teststraat', '12', 'H', '1100TE', 'ESTERAN', 'Nederland', 'leerling@leerling.nl', '0612345678', '02012345', '$2y$10$w/SW3CHSjx4MDhBNOL0.2umrMW6KieJq/SyJr/PsV0f8sljBBySHa', ' '),
(2, 'Man', 'Mr.', '2021-06-10', 'coach', 'coacht', 'van', 'test', 'teststraat', '12', 'H', '1100TE', 'ESTERAN', 'Nederland', 'coach@test.nl', '0612345678', '02012345', '$2y$10$73Tb4RZ5tKf1c6Gg33VIJeQLp0zJ7Uh1NQtgB.sSKgI9RIw9fOzSK', ' '),
(3, 'Man', 'Mr.', '2021-06-11', 'bedrijf begeleider', 'bedrijf', 'van', 'test', ' ', ' ', ' ', ' ', ' ', ' ', 'bedrijf@test.nl', '0612345678', ' ', '$2y$10$eAxL4PaUD9OE3sVprGJeEewN.wP9K./rgASNOZOtZaYgHQDvBqZsS', '12345678'),
(4, 'Man', 'Mr.', '2021-06-08', 'bedrijf begeleider', 'test', 'e', 'rest', ' ', ' ', ' ', ' ', ' ', ' ', 'bedrijf2@test.nl', '0612345678', ' ', '$2y$10$dPTvne1LUgWHdpU1q7vaTOrRZs87IMAXeprSz9j0uYFsS0RVR1un2', '87654321'),
(5, 'Vrouw', 'Mrs.', '2021-06-11', 'Leerling', 'leerling twee test', 'van', 'test', 'teststraat', '12', 'H', '1100TE', 'ESTERAN', 'Nederland', 'leerling2@leerling2.nl', '0612345678', '02012345', '$2y$10$ACDVzOUVYQq6kOtnJ9IZpu2L1vEdtS9Gj9y/CmSCf2paghf/sx5Pq', ' '),
(6, 'Man', 'Mr.', '2021-06-10', 'Leerling', 'leerlingdrie', 'van', 'rest', 'teststraat', '12', 'H', '1100TE', 'ESTERAN', 'Nederland', 'Leerling3@leerling3.nl', '0612345678', '02012345', '$2y$10$EeTs4gACQBjaJtorrMALle0EfXtcKHLtz/7YkSfc.pI86JTo1/PPS', ' '),
(7, 'Man', 'Mr.', '2021-06-10', 'admin', 'admin', 'van', 'test', 'teststraat', '12', 'H', '1100TE', 'almelo', 'Nederland', 'admin@test.nl', '02012345', '0612345678', '$2y$10$YqE9wjj5l.5WM8aheiUI/OvxVXPN4BL.Vt6aQ.V8d/3XqL9LIxHie', ' ');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `stage`
--

CREATE TABLE `stage` (
  `id_gebruiker` int(11) NOT NULL,
  `id_bedrijf` int(11) NOT NULL,
  `begindatum` date NOT NULL,
  `einddatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `stage`
--

INSERT INTO `stage` (`id_gebruiker`, `id_bedrijf`, `begindatum`, `einddatum`) VALUES
(1, 1, '2021-06-09', '2021-06-13'),
(5, 2, '2021-06-03', '2021-06-13'),
(6, 1, '2021-06-01', '2021-06-02');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bedrijf`
--
ALTER TABLE `bedrijf`
  ADD PRIMARY KEY (`id_bedrijf`),
  ADD KEY `bedrijf` (`id_gebruiker`);

--
-- Indexen voor tabel `meetinstrument`
--
ALTER TABLE `meetinstrument`
  ADD PRIMARY KEY (`id_meetinstrument`),
  ADD KEY `leerling` (`id_gebruiker`);

--
-- Indexen voor tabel `np`
--
ALTER TABLE `np`
  ADD PRIMARY KEY (`id_gebruiker`);

--
-- Indexen voor tabel `stage`
--
ALTER TABLE `stage`
  ADD KEY `bedrijfid` (`id_bedrijf`),
  ADD KEY `gebruikerid` (`id_gebruiker`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bedrijf`
--
ALTER TABLE `bedrijf`
  MODIFY `id_bedrijf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `meetinstrument`
--
ALTER TABLE `meetinstrument`
  MODIFY `id_meetinstrument` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `np`
--
ALTER TABLE `np`
  MODIFY `id_gebruiker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bedrijf`
--
ALTER TABLE `bedrijf`
  ADD CONSTRAINT `bedrijf` FOREIGN KEY (`id_gebruiker`) REFERENCES `np` (`id_gebruiker`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `meetinstrument`
--
ALTER TABLE `meetinstrument`
  ADD CONSTRAINT `leerling` FOREIGN KEY (`id_gebruiker`) REFERENCES `np` (`id_gebruiker`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `stage`
--
ALTER TABLE `stage`
  ADD CONSTRAINT `bedrijfid` FOREIGN KEY (`id_bedrijf`) REFERENCES `bedrijf` (`id_bedrijf`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gebruikerid` FOREIGN KEY (`id_gebruiker`) REFERENCES `np` (`id_gebruiker`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
