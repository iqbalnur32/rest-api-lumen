-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 11 Jun 2020 pada 03.54
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boilprate_lumen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category_ctf`
--

CREATE TABLE `category_ctf` (
  `id_category` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `category_ctf`
--

INSERT INTO `category_ctf` (`id_category`, `category_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Reversing Engineering', 'Reversing Engineering', '2020-05-29 17:06:00', '2020-05-29 17:00:00'),
(2, 'Cryptography', 'cryptography', NULL, NULL),
(3, 'Web', 'Web Security', '2020-06-03 17:12:00', '2020-06-03 17:00:18'),
(4, 'Misc', 'Miscellaneous', '2020-06-03 23:00:00', '2020-06-03 17:14:00'),
(5, 'Forensic', 'Forensic', '2020-06-06 16:06:29', '2020-06-06 16:06:29'),
(7, 'Meachine', 'meachine hacking', '2020-06-10 15:38:03', '2020-06-10 15:38:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_05_24_052427_create_users_level_table', 1),
(2, '2020_05_24_052444_create_users_table', 1),
(3, '2020_05_27_090141_create_task_table', 1),
(4, '2020_05_27_090344_create_score_table', 1),
(5, '2020_05_30_144930_create_soved_ctf', 1),
(6, '2020_05_30_145020_create_category_ctf', 1),
(7, '2020_06_01_190758_create_pengumuman_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman_ctf`
--

CREATE TABLE `pengumuman_ctf` (
  `id_pengumuman` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengumuman_ctf`
--

INSERT INTO `pengumuman_ctf` (`id_pengumuman`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Pengunduran Kompetisi', '<p>Mohon maaf untuk para peserta ctf karena server dalam masalah terpaksa events IndoSec Mencari Bendera kita tunda sampai tanggal 10 Juni 2020 Mohon Maaf</p>\n', '2020-06-02 10:03:46', '2020-06-02 10:03:46'),
(2, 'Pemenang CTF', '<p>Selamat untuk para pemenang</p>\n\n<p>1 = masAyu</p>\n\n<p>2 = InsyallahBisa</p>\n\n<p>3 = MengapaBegini</p>\n\n<p>5 = Kamu Yang</p>\n\n<p>6 = DInda</p>\n', '2020-06-02 10:53:35', '2020-06-02 10:53:35'),
(4, 'CTF IndoSec Mencari Jodoh', '<p><strong>CTF IndoSec membuka pendaftaran CTF dengan syarat-syarat</strong></p>\n\n<p>- Ada KTP</p>\n\n<p>- Ada Team COk</p>\n\n<p><strong>Sekian Terima Kasih</strong></p>\n', '2020-06-10 15:39:38', '2020-06-10 15:39:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `score_ctf`
--

CREATE TABLE `score_ctf` (
  `id_score` int(10) NOT NULL,
  `id_users` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `score_ctf`
--

INSERT INTO `score_ctf` (`id_score`, `id_users`, `score`, `created_at`, `updated_at`) VALUES
(1, 1, 1500, '2020-05-30 18:22:35', '2020-06-07 17:18:03'),
(2, 2, 700, '2020-05-30 18:31:25', '2020-05-30 18:33:04'),
(3, 3, 0, '2020-06-05 23:42:17', '2020-06-10 15:40:06'),
(4, 4, 10, '2020-06-05 21:00:00', '2020-06-06 08:54:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `solved_ctf`
--

CREATE TABLE `solved_ctf` (
  `id_solved` int(10) UNSIGNED NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_task` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `solved_ctf`
--

INSERT INTO `solved_ctf` (`id_solved`, `id_users`, `id_task`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '2020-05-30 18:22:35', '2020-05-30 18:22:35'),
(2, 1, 2, '2020-05-30 18:31:25', '2020-05-30 18:31:25'),
(3, 1, 1, '2020-05-30 18:33:04', '2020-05-30 18:33:04'),
(4, 1, 20, '2020-06-07 17:06:24', '2020-06-07 17:06:24'),
(5, 1, 20, '2020-06-07 17:07:27', '2020-06-07 17:07:27'),
(6, 1, 20, '2020-06-07 17:08:38', '2020-06-07 17:08:38'),
(7, 1, 20, '2020-06-07 17:08:51', '2020-06-07 17:08:51'),
(8, 1, 20, '2020-06-07 17:14:53', '2020-06-07 17:14:53'),
(9, 1, 20, '2020-06-07 17:15:25', '2020-06-07 17:15:25'),
(10, 1, 20, '2020-06-07 17:18:03', '2020-06-07 17:18:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `task_ctf`
--

CREATE TABLE `task_ctf` (
  `id_task` int(10) UNSIGNED NOT NULL,
  `id_category` int(11) NOT NULL,
  `name_task` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hint` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_point` int(11) NOT NULL,
  `flag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `task_ctf`
--

INSERT INTO `task_ctf` (`id_task`, `id_category`, `name_task`, `hint`, `task_point`, `flag`, `author`, `created_at`, `updated_at`) VALUES
(1, 1, 'Crack Saya Cok', 'Seoarang ayah memasukan kata sandi yang salah dan anak membantu unutk menjbolnya apakah anak dapat membantu ayah nya', 200, 'CTF{hahaah_benar}', 'iqbal', '2020-06-04 16:14:51', '2020-06-04 16:14:51'),
(2, 1, 'Reverse Gambar Ini', '<p>Seoarang ayah memasukan kata sandi yang salah dan anak membantu unutk menjbolnya apakah anak dapat membantu ayah nya</p>\n', 200, 'CTF{hahaah_benar}', 'iqbal', '2020-06-04 16:14:51', '2020-06-04 16:14:51'),
(3, 1, 'Crack Saya Cok', 'Seoarang ayah memasukan kata sandi yang salah dan anak membantu unutk menjbolnya apakah anak dapat membantu ayah nya', 200, 'CTF{hahaah_benar}', 'iqbal', '2020-06-04 16:14:51', '2020-06-04 16:14:51'),
(4, 1, 'Crack Saya Cok', 'Seoarang ayah memasukan kata sandi yang salah dan anak membantu unutk menjbolnya apakah anak dapat membantu ayah nya', 200, 'CTF{hahaah_benar}', 'iqbal', '2020-06-04 16:14:51', '2020-06-04 16:14:51'),
(5, 2, 'Crypto', 'Seoarang ayah memasukan kata sandi yang salah dan anak membantu unutk menjbolnya apakah anak dapat membantu ayah nya', 200, 'CTF{hahaah_benar}', 'iqbal', '2020-06-04 16:14:55', '2020-06-04 16:14:55'),
(6, 2, 'Crypto', 'Seoarang ayah memasukan kata sandi yang salah dan anak membantu unutk menjbolnya apakah anak dapat membantu ayah nya', 200, 'CTF{hahaah_benar}', 'iqbal', '2020-06-04 16:14:55', '2020-06-04 16:14:55'),
(7, 2, 'Crypto', 'Seoarang ayah memasukan kata sandi yang salah dan anak membantu unutk menjbolnya apakah anak dapat membantu ayah nya', 200, 'CTF{hahaah_benar}', 'iqbal', '2020-06-04 16:14:56', '2020-06-04 16:14:56'),
(8, 2, 'Crack Saya Cok', 'Seoarang ayah memasukan kata sandi yang salah dan anak membantu unutk menjbolnya apakah anak dapat membantu ayah nya', 200, 'CTF{hahaah_benar}', 'iqbal', '2020-06-04 16:14:56', '2020-06-04 16:14:56'),
(9, 3, 'Web', 'Seoarang ayah memasukan kata sandi yang salah dan anak membantu unutk menjbolnya apakah anak dapat membantu ayah nya', 200, 'CTF{hahaah_benar}', 'iqbal', '2020-06-04 16:15:26', '2020-06-04 16:15:26'),
(10, 3, 'Web', 'Seoarang ayah memasukan kata sandi yang salah dan anak membantu unutk menjbolnya apakah anak dapat membantu ayah nya', 200, 'CTF{hahaah_benar}', 'iqbal', '2020-06-04 16:15:27', '2020-06-04 16:15:27'),
(11, 3, 'Web', 'Seoarang ayah memasukan kata sandi yang salah dan anak membantu unutk menjbolnya apakah anak dapat membantu ayah nya', 200, 'CTF{hahaah_benar}', 'iqbal', '2020-06-04 16:15:27', '2020-06-04 16:15:27'),
(12, 3, 'Web', 'Seoarang ayah memasukan kata sandi yang salah dan anak membantu unutk menjbolnya apakah anak dapat membantu ayah nya', 200, 'CTF{hahaah_benar}', 'iqbal', '2020-06-04 16:15:27', '2020-06-04 16:15:27'),
(13, 4, 'Misc', 'Seoarang ayah memasukan kata sandi yang salah dan anak membantu unutk menjbolnya apakah anak dapat membantu ayah nya', 200, 'CTF{hahaah_benar}', 'iqbal', '2020-06-04 16:15:40', '2020-06-04 16:15:40'),
(14, 4, 'Misc', 'Seoarang ayah memasukan kata sandi yang salah dan anak membantu unutk menjbolnya apakah anak dapat membantu ayah nya', 200, 'CTF{hahaah_benar}', 'iqbal', '2020-06-04 16:15:40', '2020-06-04 16:15:40'),
(15, 4, 'Misc', 'Seoarang ayah memasukan kata sandi yang salah dan anak membantu unutk menjbolnya apakah anak dapat membantu ayah nya', 200, 'CTF{hahaah_benar}', 'iqbal', '2020-06-04 16:15:40', '2020-06-04 16:15:40'),
(16, 4, 'Misc', 'Seoarang ayah memasukan kata sandi yang salah dan anak membantu unutk menjbolnya apakah anak dapat membantu ayah nya', 200, 'CTF{hahaah_benar}', 'iqbal', '2020-06-04 16:15:40', '2020-06-04 16:15:40'),
(17, 5, 'Forensic', 'Seoarang ayah memasukan kata sandi yang salah dan anak membantu unutk menjbolnya apakah anak dapat membantu ayah nya', 200, 'CTF{hahaah_benar}', 'iqbal', '2020-06-04 16:15:50', '2020-06-04 16:15:50'),
(18, 5, 'Forensic', 'Seoarang ayah memasukan kata sandi yang salah dan anak membantu unutk menjbolnya apakah anak dapat membantu ayah nya', 200, 'CTF{hahaah_benar}', 'iqbal', '2020-06-04 16:15:51', '2020-06-04 16:15:51'),
(19, 5, 'Forensic', 'Seoarang ayah memasukan kata sandi yang salah dan anak membantu unutk menjbolnya apakah anak dapat membantu ayah nya', 200, 'CTF{hahaah_benar}', 'iqbal', '2020-06-04 16:15:51', '2020-06-04 16:15:51'),
(20, 5, 'Forensic', 'Seoarang ayah memasukan kata sandi yang salah dan anak membantu unutk menjbolnya apakah anak dapat membantu ayah nya', 200, 'CTF{hahaah_benar}', 'iqbal', '2020-06-04 16:15:51', '2020-06-04 16:15:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_ctf`
--

CREATE TABLE `users_ctf` (
  `id_users` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` date NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users_ctf`
--

INSERT INTO `users_ctf` (`id_users`, `username`, `nama`, `email`, `password`, `website`, `login`, `last_login`, `level_id`, `created_at`, `updated_at`) VALUES
(1, 'iqbalnur32', 'iqbal Nur', 'dkm@dkm.com', '1234', 'dkm@dkm.com', 'true', '2020-06-08', 2, '2020-05-30 15:06:50', '2020-06-08 13:27:44'),
(2, 'pejuangsubuh', 'subuh', 'subuh@gmail.com', '1234', 'subuh@gmail.com', 'true', '2020-06-06', 2, '2020-05-30 18:15:02', '2020-06-06 08:59:12'),
(3, 'admin', 'admin', 'admin@admin.com', '1234', 'admin@admin.com', 'true', '2020-06-10', 1, '2020-06-01 17:10:00', '2020-06-10 15:40:06'),
(4, 'akbar32', 'Akbar Nur', 'akbar32@gmail.com', 'akbar1234', 'akbar32@gmail.com', 'true', '2020-06-06', 2, '2020-06-05 23:42:17', '2020-06-06 09:04:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_level`
--

CREATE TABLE `users_level` (
  `id_level` int(10) UNSIGNED NOT NULL,
  `name_level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users_level`
--

INSERT INTO `users_level` (`id_level`, `name_level`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2020-05-29 21:00:00', '2020-05-29 17:00:00'),
(2, 'Users', '2020-05-29 22:00:00', '2020-05-29 17:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category_ctf`
--
ALTER TABLE `category_ctf`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengumuman_ctf`
--
ALTER TABLE `pengumuman_ctf`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indeks untuk tabel `score_ctf`
--
ALTER TABLE `score_ctf`
  ADD PRIMARY KEY (`id_score`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `solved_ctf`
--
ALTER TABLE `solved_ctf`
  ADD PRIMARY KEY (`id_solved`);

--
-- Indeks untuk tabel `task_ctf`
--
ALTER TABLE `task_ctf`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `id_category` (`id_category`);

--
-- Indeks untuk tabel `users_ctf`
--
ALTER TABLE `users_ctf`
  ADD PRIMARY KEY (`id_users`);

--
-- Indeks untuk tabel `users_level`
--
ALTER TABLE `users_level`
  ADD PRIMARY KEY (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category_ctf`
--
ALTER TABLE `category_ctf`
  MODIFY `id_category` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pengumuman_ctf`
--
ALTER TABLE `pengumuman_ctf`
  MODIFY `id_pengumuman` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `score_ctf`
--
ALTER TABLE `score_ctf`
  MODIFY `id_score` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `solved_ctf`
--
ALTER TABLE `solved_ctf`
  MODIFY `id_solved` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `task_ctf`
--
ALTER TABLE `task_ctf`
  MODIFY `id_task` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `users_ctf`
--
ALTER TABLE `users_ctf`
  MODIFY `id_users` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users_level`
--
ALTER TABLE `users_level`
  MODIFY `id_level` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
