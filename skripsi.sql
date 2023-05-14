-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 11:57 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absens`
--

CREATE TABLE `absens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_identitas` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absens`
--

INSERT INTO `absens` (`id`, `no_identitas`, `tanggal`, `keterangan`, `jenis`) VALUES
(1, 123989, '2023-05-14', NULL, 'S');

-- --------------------------------------------------------

--
-- Table structure for table `artikels`
--

CREATE TABLE `artikels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artikels`
--

INSERT INTO `artikels` (`id`, `judul`, `description`, `url`) VALUES
(1, 'Ini Adalah Artikel Pertama', '<p>Ini adalah artikel pertama</p>', 'artikelcover/n6zdzX2ldWx3OeoSY9WEmPXKkKmfydBWB5vTX363.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pelajarans`
--

CREATE TABLE `jadwal_pelajarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `no_identitas` int(11) NOT NULL,
  `jam` int(11) NOT NULL,
  `lama_jam` int(11) NOT NULL,
  `hari` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_pelajarans`
--

INSERT INTO `jadwal_pelajarans` (`id`, `kelas_id`, `mapel_id`, `no_identitas`, `jam`, `lama_jam`, `hari`) VALUES
(1, 1, 1, 123989, 1, 4, 'Senin'),
(3, 1, 1, 123989, 1, 6, 'Kamis'),
(4, 1, 3, 989898, 3, 4, 'Senin'),
(5, 2, 1, 989898, 1, 3, 'Senin'),
(6, 2, 2, 123989, 2, 4, 'Senin'),
(8, 1, 3, 123989, 3, 4, 'Senin'),
(9, 2, 2, 123989, 4, 2, 'Senin');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_masters`
--

CREATE TABLE `kelas_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas_masters`
--

INSERT INTO `kelas_masters` (`id`, `keterangan`) VALUES
(1, '10'),
(2, '11'),
(3, '13'),
(4, '2');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran_masters`
--

CREATE TABLE `mata_pelajaran_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_mapel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mata_pelajaran_masters`
--

INSERT INTO `mata_pelajaran_masters` (`id`, `nama_mapel`) VALUES
(1, 'Matematika'),
(2, 'IPA'),
(3, 'Agama');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_23_054823_create_webs_table', 1),
(6, '2023_03_25_070012_artikel', 1),
(7, '2023_03_26_043837_pelanggarans', 1),
(8, '2023_03_26_043919_pelanggaran_masters', 1),
(9, '2023_03_26_043944_perizinans', 1),
(10, '2023_03_26_043957_penjengukans', 1),
(11, '2023_03_26_044034_santris', 1),
(12, '2023_03_26_044048_absensis', 1),
(13, '2023_03_26_044111_mata_pelajaran_masters', 1),
(14, '2023_03_26_044136_jadwal_pelajarans', 1),
(15, '2023_03_26_044207_nilais', 1),
(16, '2023_03_26_044224_kelas_masters', 1),
(17, '2023_03_26_050315_pengajars', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilais`
--

CREATE TABLE `nilais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_identitas` int(11) DEFAULT NULL,
  `mapel_id` int(11) DEFAULT NULL,
  `periode` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `kitab` double(16,2) DEFAULT NULL,
  `tulis` double(16,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilais`
--

INSERT INTO `nilais` (`id`, `no_identitas`, `mapel_id`, `periode`, `keterangan`, `kitab`, `tulis`) VALUES
(5, 1139, 1, '202306', NULL, 10.00, 10.00),
(6, 1139, 2, '202306', NULL, 80.00, 80.00),
(7, 123123, 2, '202306', NULL, 90.00, 70.00),
(8, 968768, 2, '202306', NULL, 70.00, 70.00);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggarans`
--

CREATE TABLE `pelanggarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pelanggaran_master_id` varchar(255) NOT NULL,
  `no_identitas` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggarans`
--

INSERT INTO `pelanggarans` (`id`, `pelanggaran_master_id`, `no_identitas`, `tanggal`) VALUES
(1, '1', '1139', '2023-05-13'),
(2, '2', '123989', '2023-05-14'),
(3, '1', '123123', '2023-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran_masters`
--

CREATE TABLE `pelanggaran_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `poin` int(11) NOT NULL,
  `jenis_pelanggaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggaran_masters`
--

INSERT INTO `pelanggaran_masters` (`id`, `keterangan`, `poin`, `jenis_pelanggaran`) VALUES
(1, 'Terlambat', 10, 'S'),
(2, 'Terlambat', 10, 'P');

-- --------------------------------------------------------

--
-- Table structure for table `pengajars`
--

CREATE TABLE `pengajars` (
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` tinyint(1) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penjengukans`
--

CREATE TABLE `penjengukans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_santri` varchar(255) NOT NULL,
  `tanggal_penjengukan` date NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perizinans`
--

CREATE TABLE `perizinans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_identitas` varchar(255) DEFAULT NULL,
  `tanggal_permohonan` date DEFAULT NULL,
  `tanggal_perizinan` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `santripengajars`
--

CREATE TABLE `santripengajars` (
  `no_identitas` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `santripengajars`
--

INSERT INTO `santripengajars` (`no_identitas`, `nama`, `alamat`, `jenis_kelamin`, `tanggal_lahir`, `kelas`, `no_hp`, `type`) VALUES
('1139', 'Ichwan', 'malang', '1', '2023-05-27', '2', '0812312', 'S'),
('123123', 'keceng', 'malang', '1', '2023-05-27', '1', '08123123', 'S'),
('123989', 'VIDI', 'Malang', '1', '2023-06-03', NULL, '8971832', 'P'),
('968768', 'budi', 'Malang', '1', '2023-05-18', '1', '8123123', 'S'),
('989898', 'saputra', 'Malang', '1', '2023-05-17', NULL, '06783', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `santris`
--

CREATE TABLE `santris` (
  `nis` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` tinyint(1) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `no_identitas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `level`, `no_identitas`) VALUES
(1, 'rafli', 'rafli@gmail.com', NULL, '$2y$10$Ofl0ZAFmjl8YGXr6VCSFOO83.ICSLiZbEi6Thy6Esz/sQb632MEjy', NULL, '2023-05-12 19:19:37', '2023-05-12 19:19:37', 1, NULL),
(2, 'Ichwan', 'ichwan@gmail.com', NULL, '$2y$10$j6kt5In2g4UitWs/F9Zt9eOoT9ALCY.NO8NB6yrYZP0isL.REbNDi', NULL, '2023-05-12 19:22:53', '2023-05-12 19:22:53', 3, '1139'),
(3, 'keceng', 'keceng@gmail.com', NULL, '$2y$10$Ol95NvSpQpAtO9JL63xBaeeJKnY3aznyDpudO0A47mEF0hlZ9w9ee', NULL, '2023-05-13 20:58:13', '2023-05-13 20:58:13', 3, '123123'),
(4, 'VIDI', 'vidi@gmail.com', NULL, '$2y$10$0ZzymcTyTKHvBoC5opZn1.NW4JSikb9Lu4rYukK/HcgyMIRO3yHJ6', NULL, '2023-05-13 20:58:41', '2023-05-13 20:58:41', 2, '123989'),
(5, 'saputra', 'saputra@gmail.com', NULL, '$2y$10$M5i.lC9GyVQ8kKTFZUpF.eEtSUNeVu/0wd1k9sTl8PXFLoIL5DHvG', NULL, '2023-05-13 21:01:17', '2023-05-13 21:01:17', 2, '989898'),
(6, 'budi', 'budi@gmail.com', NULL, '$2y$10$sYTDm6/sggXM1XmnlM0LXeK9Ic2/w3xgVG0K9imoiQHEGwo3IIaCO', NULL, '2023-05-13 21:13:09', '2023-05-13 21:13:09', 3, '968768');

-- --------------------------------------------------------

--
-- Table structure for table `webs`
--

CREATE TABLE `webs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `webs`
--

INSERT INTO `webs` (`id`, `name`, `description`, `path`) VALUES
(1, 'judulucapan', 'foto/apacsFhjJlPe810bKwOMSA0D0G9wrZoWMVUghfqH.jpg', ''),
(2, 'judulutama', 'PonpesSSSS', ''),
(3, 'detailjudul', 'detailjudul', ''),
(4, 'tagtentang', 'tagtentang', ''),
(5, 'judultentang', 'judultentang', ''),
(6, 'detailtentang', 'detailtentang', ''),
(7, 'deskripsitentang1', 'cobaaa', ''),
(8, 'deskripsitentang2', 'deskripsitentang2', ''),
(9, 'judulhubungi', 'judulhubungi', ''),
(10, 'detailhubungi', 'detailhubungi', ''),
(11, 'tagpelayanan', 'tagpelayanan', ''),
(12, 'judulpelayanan', 'judulpelayanan', ''),
(13, 'detailpelayanan', 'detailpelayanan', ''),
(14, 'tagpengurus', 'tagpengurus', ''),
(15, 'judulpengurus', 'judulpengurus', ''),
(16, 'deskripsipengurus', 'deskripsipengurus', ''),
(17, 'pengurus1', 'pengurus1', ''),
(18, 'jabatan1', 'jabatan1', ''),
(19, 'pengurus2', 'pengurus2', ''),
(20, 'jabatan2', 'jabatan2', ''),
(21, 'pengurus3', 'pengurus3', ''),
(22, 'jabatan3', 'jabatan3', ''),
(23, 'pengurus4', 'pengurus4', ''),
(24, 'jabatan4', 'jabatan4', ''),
(25, 'tagbukutamu', 'tagbukutamu', ''),
(26, 'judulbukutamu', 'judulbukutamu', ''),
(27, 'keteranganbukutamu', 'keteranganbukutamu', ''),
(28, 'fotolayanan1', 'foto/4GPmjnTkJPy8CKvsuVr0eTjp91VvWyFias0MF9hU.jpg', ''),
(29, 'backgroundutama', 'foto/XMtAFw7xlwTEZLAbKTtqjHm2DVoN1On6FOibyM4v.jpg', ''),
(30, 'alamat', 'Jl Malang', ''),
(31, 'email', 'pondok@gmail.com', ''),
(32, 'notelp', '+62 8123 123', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absens`
--
ALTER TABLE `absens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikels`
--
ALTER TABLE `artikels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwal_pelajarans`
--
ALTER TABLE `jadwal_pelajarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas_masters`
--
ALTER TABLE `kelas_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mata_pelajaran_masters`
--
ALTER TABLE `mata_pelajaran_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelanggarans`
--
ALTER TABLE `pelanggarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggaran_masters`
--
ALTER TABLE `pelanggaran_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajars`
--
ALTER TABLE `pengajars`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `penjengukans`
--
ALTER TABLE `penjengukans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perizinans`
--
ALTER TABLE `perizinans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `santripengajars`
--
ALTER TABLE `santripengajars`
  ADD PRIMARY KEY (`no_identitas`);

--
-- Indexes for table `santris`
--
ALTER TABLE `santris`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `webs`
--
ALTER TABLE `webs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absens`
--
ALTER TABLE `absens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artikels`
--
ALTER TABLE `artikels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_pelajarans`
--
ALTER TABLE `jadwal_pelajarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kelas_masters`
--
ALTER TABLE `kelas_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mata_pelajaran_masters`
--
ALTER TABLE `mata_pelajaran_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pelanggarans`
--
ALTER TABLE `pelanggarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggaran_masters`
--
ALTER TABLE `pelanggaran_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penjengukans`
--
ALTER TABLE `penjengukans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perizinans`
--
ALTER TABLE `perizinans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `webs`
--
ALTER TABLE `webs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
