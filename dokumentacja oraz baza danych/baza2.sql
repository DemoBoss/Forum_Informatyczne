-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Gru 2019, 12:50
-- Wersja serwera: 10.1.37-MariaDB
-- Wersja PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `baza2`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `avatars`
--

CREATE TABLE `avatars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `avatars`
--

INSERT INTO `avatars` (`id`, `avatar`, `created_at`, `updated_at`) VALUES
(1, '/images/Avatars/black_boy_3.png', NULL, NULL),
(2, '/images/Avatars/black_boy2.png', NULL, NULL),
(3, '/images/Avatars/man.png', NULL, NULL),
(4, '/images/Avatars/man2.png', NULL, NULL),
(5, '/images/Avatars/man3.png', NULL, NULL),
(6, '/images/Avatars/white_girl.png', NULL, NULL),
(7, '/images/Avatars/white_girl2.png', NULL, NULL),
(8, '/images/Avatars/woman.png', NULL, NULL),
(9, '/images/Avatars/woman2.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `content`, `rating`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Nie zabijaj Indianina!!', 1, '2019-05-22 12:53:13', '2019-05-22 13:57:23'),
(2, 3, 1, 'Tylko format', 1, '2019-05-22 12:53:22', '2019-05-22 13:57:22'),
(3, 3, 1, 'Pomóż Indianinowi. Na pewno mu ciężko :)', 1, '2019-05-22 12:53:44', '2019-05-22 13:57:20');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `fingerprint` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `comment_id`, `fingerprint`, `created_at`, `updated_at`) VALUES
(1, 2, 3, '', '2019-05-22 13:57:20', '2019-05-22 13:57:20'),
(2, 2, 2, '', '2019-05-22 13:57:22', '2019-05-22 13:57:22'),
(3, 2, 1, '', '2019-05-22 13:57:23', '2019-05-22 13:57:23'),
(4, 1, 5, '9e75350f6e94db05869a21d8bfc2241b', '2019-12-09 16:30:29', '2019-12-09 16:30:29');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_04_29_092449_create_avatars_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_04_14_091017_create_sections_table', 1),
(5, '2019_04_14_092349_create_topics_table', 1),
(6, '2019_04_14_092854_create_posts_table', 1),
(7, '2019_04_14_092913_create_comments_table', 1),
(8, '2019_05_20_165522_create_likes_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `closed` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `posts`
--

INSERT INTO `posts` (`id`, `name`, `content`, `topic_id`, `user_id`, `closed`, `created_at`, `updated_at`) VALUES
(2, 'Problem z zalogowaniem sie do systemu win10', 'Wpisuje dobre hasło i nie mogę dostać się do systemu :( co zrobić?', 8, 1, 0, '2019-05-22 12:51:37', '2019-05-22 12:51:37'),
(3, 'Trojan i Indianin', 'Mam problem. Mam dwa wirusy i nie wiem skąd. Jeden to trojan a drugi to jakiś Indianin zwijający asfalt.', 2, 1, 0, '2019-05-22 12:52:51', '2019-05-22 12:52:51'),
(4, 'Jak zabezpieczyć swojego kompa', 'Kupiłem nowy komputer. Jak go zabezpieczyć przed wirusami i innymi szkodliwymi programami?', 7, 1, 0, '2019-05-22 12:54:35', '2019-05-22 12:54:35');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `sections`
--

INSERT INTO `sections` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'SOFTWARE', 1, NULL, NULL),
(3, 'HARDWARE', 1, NULL, NULL),
(4, 'MOJE MASZYNY', 1, NULL, NULL),
(5, 'JĘZYKI PROGRAMOWANIA', 1, NULL, NULL),
(6, 'FRAMEWORKI', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`, `user_id`, `section_id`, `created_at`, `updated_at`) VALUES
(1, 'Pokażcie co macie', 'Tutaj wstawiamy swoje maszyny (opis), co chcemy zrobić, co dodać itp.', 1, 4, '2019-05-22 12:45:38', '2019-05-22 12:45:38'),
(2, 'Wirusy', 'Problemy z wirusami', 1, 2, '2019-05-22 12:46:00', '2019-05-22 12:46:00'),
(3, 'Procesory', 'Tematyka procesorów', 1, 3, '2019-05-22 12:46:26', '2019-05-22 12:46:26'),
(4, 'Karty graficzne', 'Tu piszemy o kartach graficznych', 1, 3, '2019-05-22 12:47:04', '2019-05-22 12:47:04'),
(5, 'Obudowy', 'Tu piszemy o obudowach', 1, 3, '2019-05-22 12:47:43', '2019-05-22 12:47:43'),
(6, 'Akcesoria', 'Tu piszemy o akcesoriach', 1, 3, '2019-05-22 12:48:00', '2019-05-22 12:48:00'),
(7, 'Zabezpieczenia', 'Piszemy jak zabezpieczyć swoje \"maszyny\"', 1, 2, '2019-05-22 12:48:54', '2019-05-22 12:48:54'),
(8, 'Problemy', 'Tu piszemy o problemach z systemem', 1, 2, '2019-05-22 12:50:25', '2019-05-22 12:50:25'),
(9, 'Moja konfiguracja sprzętowa', 'Piszemy o maszynach', 1, 4, '2019-05-22 14:01:48', '2019-05-22 14:01:48'),
(11, 'Java', 'Masz kłopoty z Javą? To jest topic dla Ciebie ;) Skorzystaj z pomocy innych użytkowników tego wspaniałego języka!', 1, 5, NULL, NULL),
(12, 'C++', 'Poznaj potęgę następcy języka C!', 1, 5, NULL, NULL),
(13, 'Python', 'Zgłębij tajniki sympatycznego węża, który w ostatnim czasie zaskarbił sobie ogromną rzeszę fanów :D ', 1, 5, NULL, NULL),
(14, 'PHP', '<echo>Witaj w PHP!</echo>', 1, 5, NULL, NULL),
(15, 'Laravel', 'Wspaniały framework, na którym stoi ten serwis :)', 1, 6, NULL, NULL),
(16, 'SpringBoot', 'Narzędzie pomocne w tworzeniu aplikacji w języki Java - zobacz jakie to proste!', 1, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar_id` bigint(20) UNSIGNED NOT NULL,
  `banned` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_name`, `rank_name`, `avatar_id`, `banned`, `created_at`, `updated_at`) VALUES
(1, 'DemoBoss', 'lukasz32877@o2.pl', '$2y$10$/vyCbHqT2qqNdV756vnWPOrtk9txhGgR7t5f01swMjh95gP2Osyeu', 'Admin', 'Zadziorny żółtodziób', 3, 0, '2019-05-22 12:42:33', '2019-12-10 10:01:36'),
(2, 'andre', 'andre@o2.pl', '$2y$10$PXdgemqaR09gRm6oARzfCeoU7Fs0VFjhEWmh2SzrjqJkNCtKarD9i', 'Zwykły użytkownik', 'Nowicjusz', 5, 1, '2019-05-22 13:55:39', '2019-11-07 18:54:44'),
(3, 'adam', 'adam@o2.pl', '$2y$10$gmWwuU8nYSHTXi3gRaKQjeXKUc0BNTWrcuZAsUTJzc67Te5xaziye', 'Zwykły użytkownik', 'Nowicjusz', 1, 0, '2019-05-22 14:09:11', '2019-12-09 16:40:07');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `avatars`
--
ALTER TABLE `avatars`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indeksy dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_comment_id_foreign` (`comment_id`);

--
-- Indeksy dla tabeli `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeksy dla tabeli `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_topic_id_foreign` (`topic_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indeksy dla tabeli `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_user_id_foreign` (`user_id`);

--
-- Indeksy dla tabeli `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topics_user_id_foreign` (`user_id`),
  ADD KEY `topics_section_id_foreign` (`section_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_avatar_id_foreign` (`avatar_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `avatars`
--
ALTER TABLE `avatars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`),
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`),
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`),
  ADD CONSTRAINT `topics_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_avatar_id_foreign` FOREIGN KEY (`avatar_id`) REFERENCES `avatars` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
