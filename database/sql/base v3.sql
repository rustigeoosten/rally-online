-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 17 dec 2020 om 20:01
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rally-game`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `drivers`
--

CREATE TABLE `drivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skill` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `nationality`, `skill`, `team_id`, `points`, `created_at`, `updated_at`, `isActive`) VALUES
(1, 'Gert Veldman', 'nl', 0, 0, 0, NULL, NULL, 0),
(2, 'Bart de Vries', 'nl', 0, 0, 0, NULL, NULL, 0),
(3, 'Henk Groeneveld', 'nl', 0, 0, 0, NULL, NULL, 0),
(4, 'Jef Klak', 'be', 0, 0, 0, NULL, NULL, 0),
(5, 'Mohammed al Menkouzi', 'sa', 0, 0, 0, NULL, NULL, 0),
(6, 'Anass Robi', 'ma', 0, 0, 0, NULL, NULL, 0),
(7, 'Ian Morales', 'es', 0, 0, 0, NULL, NULL, 0),
(8, 'Ivan Diez', 'es', 0, 0, 0, NULL, NULL, 0),
(9, 'Pablo Urías', 'es', 0, 0, 0, NULL, NULL, 0),
(10, 'Ekku Heponen', 'fi', 0, 0, 0, NULL, NULL, 0),
(11, 'Kaste Ruutti', 'fi', 0, 0, 0, NULL, NULL, 0),
(12, 'Jeremy Ryti', 'fi', 0, 0, 0, NULL, NULL, 0),
(13, 'Matias Pajumäki', 'fi', 0, 0, 0, NULL, NULL, 0),
(14, 'Justus Kouvonen', 'fi', 0, 0, 0, NULL, NULL, 0),
(15, 'Aaron Hall', 'gb', 0, 0, 0, NULL, NULL, 0),
(16, 'Noah Young', 'gb', 0, 0, 0, NULL, NULL, 0),
(17, 'Harrison Jones', 'gb', 0, 0, 0, NULL, NULL, 0),
(18, 'Lucas Watson', 'gb', 0, 0, 0, NULL, NULL, 0),
(19, 'Kieran Davies', 'gb', 0, 0, 0, NULL, NULL, 0),
(20, 'Sepp Wirth', 'de', 0, 0, 0, NULL, NULL, 0),
(21, 'Alfredo Bolzmann', 'de', 0, 0, 0, NULL, NULL, 0),
(22, 'Elmar Gerlach', 'de', 0, 0, 0, NULL, NULL, 0),
(23, 'Eje Sjöberg', 'se', 0, 0, 0, NULL, NULL, 0),
(24, 'Eskil Eriksson', 'se', 0, 0, 0, NULL, NULL, 0),
(25, 'Jacek Jasinski', 'pl', 0, 0, 0, NULL, NULL, 0),
(26, 'Govinda Upadhyaya\r\n', 'in', 0, 0, 0, NULL, NULL, 0),
(27, 'Matias Gregorsdóttir', 'is', 0, 0, 0, NULL, '0000-00-00 00:00:00', 0),
(28, 'Gamze Taskiran', 'tr', 0, 0, 0, NULL, NULL, 0),
(29, 'Louis De Meyer', 'fr', 0, 0, 0, NULL, NULL, 0),
(30, 'Endra Saputra', 'in', 0, 0, 0, NULL, NULL, 0),
(31, 'Ricky Chaudhary', 'gb', 0, 0, 0, NULL, NULL, 0),
(32, 'Mario Urrutia', 'it', 0, 0, 0, NULL, NULL, 0),
(33, 'Risto Hongisto', 'jp', 0, 0, 0, NULL, NULL, 0),
(34, 'Vlaicu Niculae', 'pt', 0, 0, 0, NULL, NULL, 0),
(35, 'Fryderyk Makowski', 'pl', 0, 0, 0, NULL, NULL, 0),
(36, 'Július Holub', 'es', 0, 0, 0, NULL, NULL, 0),
(37, 'Bishal Dangol', 'cn', 0, 0, 0, NULL, NULL, 0),
(38, 'Jeremy Spinka', 'de', 0, 0, 0, NULL, NULL, 0),
(39, 'Prayoga Gunawan', 'co', 0, 0, 0, NULL, NULL, 0),
(40, 'Alan Paredes', 'fr', 0, 0, 0, NULL, NULL, 0),
(41, 'Raniero Esposito', 'es', 0, 0, 0, NULL, NULL, 0),
(42, 'Marijan Pintar', 'hr', 0, 0, 0, NULL, NULL, 0),
(43, 'Pierre Legendre\r\n', 'fr', 0, 0, 0, NULL, NULL, 0),
(44, 'Rangga Wibowo', 'cz', 0, 0, 0, NULL, NULL, 0),
(45, 'Badr el Hani', 'sa', 0, 0, 0, NULL, NULL, 0),
(46, 'Alexander Simon\r\n', 'gb', 0, 0, 0, NULL, NULL, 0),
(47, 'Merlin Koelpin', 'nl', 0, 0, 0, NULL, NULL, 0),
(48, 'Waylon Grant', 'us', 0, 0, 0, NULL, NULL, 0),
(49, 'Volkmar Beer', 'de', 0, 0, 0, NULL, NULL, 0),
(50, 'Sebastian Jaworski', 'pl', 0, 0, 0, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_17_130907_create_teams_table', 1),
(5, '2020_12_17_133414_create_drivers_table', 1),
(6, '2020_12_17_133424_create_rallies_table', 1),
(7, '2020_12_17_133432_create_stages_table', 1),
(8, '2020_12_17_133439_create_results_table', 1),
(9, '2020_12_17_150457_create_settings_table', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rallies`
--

CREATE TABLE `rallies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idealGear` int(11) NOT NULL,
  `idealBrakeForce` int(11) NOT NULL,
  `idealRideHeight` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `isFinished` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `rallies`
--

INSERT INTO `rallies` (`id`, `country`, `description`, `idealGear`, `idealBrakeForce`, `idealRideHeight`, `order`, `isFinished`, `created_at`, `updated_at`) VALUES
(1, 'pt', 'The rally of Portugal takes place on gravel roads and has many long straights and fast corners. Many obstacles next to the road mean a little mistake can have very bad consequences', 8, 1, 7, 0, 0, NULL, NULL),
(2, 'fi', 'The rally of finland takes place on gravel roads and is one of the fan favorites. Long straights, high jumps and fast corners make this a very exciting challenge for the drivers', 10, 4, 7, 0, 0, NULL, NULL),
(3, 'au', 'The rally of Australia takes place on gravel roads in the Australian outback. Extremely high temperatures make it a big challenge for the cars, and the variety of roads means drivers will have to keep changing their approach', 6, 5, 7, 0, 0, NULL, NULL),
(4, 'gb', 'The rally of Great Britain takes place on many different roads, including mud, gravel and tarmac. Combine this with the high chance of rain, and you have a big challenge for the drivers', 4, 3, 5, 0, 0, NULL, NULL),
(5, 'ar', 'The rally of Argentina takes place on very narrow gravel roads with sharp corners that have many obstacles and very big ditches. One mistake and it is over', 1, 5, 8, 0, 0, NULL, NULL),
(6, 'be', 'The rally of belgium takes place on gravel roads, with some tarmac sections. The roads are medium speed and there aren\'t many elevation changes, making it a fairly easy rally', 5, 5, 5, 0, 0, NULL, NULL),
(7, 'nl', 'The rally of The Netherlands takes place fully on tarmac roads. It has a lot of straights and 90 degree corners, making it a very technical rally', 6, 10, 8, 0, 0, NULL, NULL),
(8, 'es', 'The rally of spain takes place on tarmac roads. The roads have many medium speed corners and quite a bit of elevation changes', 4, 8, 7, 0, 0, NULL, NULL),
(9, 'jp', 'The rally of Japan is a mix of tarmac and mud. Stormy weather and extremely poor road quality make this a bit of a nightmare for the drivers', 5, 7, 8, 0, 0, NULL, NULL),
(10, 'it', 'The rally of Italy is mixed surface, with both tarmac and gravel roads. Most of the corners are quite slow, and there aren\'t many straights', 1, 6, 5, 0, 0, NULL, NULL),
(11, 'se', 'The rally of Sweden is one of the few snow rallies. The medium speed corners make this rally not very challenging, and many inexperienced drivers will like it', 4, 3, 10, 0, 0, NULL, NULL),
(12, 'no', 'The rally of Norway has many snowy roads, but mud is also possible when the temperatures are too high. Many jumps and the extremely low amounts of grip make this quite a difficult rally', 5, 3, 10, 0, 0, NULL, NULL),
(13, 'hr', 'The rally of Croatia takes part on gravel roads. There are many big jumps which can damage the car, so be careful', 5, 3, 9, 0, 0, NULL, NULL),
(14, 'fr', 'The rally of France takes places on very slow tarmac roads. Bits of snowy roads are possible on some sections, but not often', 3, 8, 8, 0, 0, NULL, NULL),
(15, 'ee', 'The rally of Estonia takes place on mud roads. These roads offer next to no grip, creating a big challenge for the drivers', 6, 9, 1, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hasStarted` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `settings`
--

INSERT INTO `settings` (`id`, `hasStarted`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `stages`
--

CREATE TABLE `stages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `values1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `values2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `values3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skill` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `teams`
--

INSERT INTO `teams` (`id`, `name`, `skill`, `points`, `created_at`, `updated_at`, `isActive`) VALUES
(1, 'Abarth', 0, 0, NULL, NULL, 0),
(2, 'Alfa Romeo', 0, 0, NULL, NULL, 0),
(3, 'Alpine', 0, 0, NULL, NULL, 0),
(4, 'Audi', 0, 0, NULL, NULL, 0),
(5, 'BMW', 0, 0, NULL, NULL, 0),
(6, 'Citroen', 0, 0, NULL, NULL, 0),
(7, 'Daihatsu', 0, 0, NULL, NULL, 0),
(8, 'Ford', 0, 0, NULL, NULL, 0),
(9, 'Honda', 0, 0, NULL, NULL, 0),
(10, 'Hyundai', 0, 0, NULL, NULL, 0),
(11, 'Lotus', 0, 0, NULL, NULL, 0),
(12, 'Mazda', 0, 0, NULL, NULL, 0),
(13, 'MG', 0, 0, NULL, NULL, 0),
(14, 'Mitsubishi', 0, 0, NULL, NULL, 0),
(15, 'Nissan', 0, 0, NULL, NULL, 0),
(16, 'Peugeot', 0, 0, NULL, NULL, 0),
(17, 'Porsche', 0, 0, NULL, NULL, 0),
(18, 'Renault', 0, 0, NULL, NULL, 0),
(19, 'Seat', 0, 0, NULL, NULL, 0),
(20, 'Skoda', 0, 0, NULL, NULL, 0),
(21, 'Subaru', 0, 0, NULL, NULL, 0),
(22, 'Suzuki', 0, 0, NULL, NULL, 0),
(23, 'Toyota', 0, 0, NULL, NULL, 0),
(24, 'Volkswagen', 0, 0, NULL, NULL, 0),
(25, 'Lancia', 0, 0, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexen voor tabel `rallies`
--
ALTER TABLE `rallies`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT voor een tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `rallies`
--
ALTER TABLE `rallies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT voor een tabel `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `stages`
--
ALTER TABLE `stages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
