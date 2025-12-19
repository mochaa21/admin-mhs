-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Nov 2025 pada 23.53
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kemahasiswaan`
--
CREATE DATABASE IF NOT EXISTS `db_kemahasiswaan` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_kemahasiswaan`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nidn` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mata_kuliah` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama`, `email`, `mata_kuliah`) VALUES
('1103029002', 'Ayu Ahadi Ningrum, SE, S.ST. M. Tr.Kom', '123456789@gmail.com', 'Pemrograman Web I');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `fakultas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `prodi`, `fakultas`) VALUES
('2455201110009', 'Mochammad Syahid Fariz Abqari', 'Informatika', 'Teknik'),
('2455201110010', 'Nadya Rahma', 'S1 Farmasi', 'Farmasi'),
('2455201110011', 'Tasya', 'S1 Farmasi', 'Farmasi'),
('2455201110012', 'Rudi Gunawan', 'Informatika', 'Teknik'),
('2455201110013', 'Natasha', 'S1 Keperawatan', 'FKIK'),
('2455201110014', 'Leona Nikki', 'S1 Keperawatan', 'FKIK'),
('2455201110020', 'Ahmad Dani', 'Informatika', 'Teknik'),
('2455201110021', 'Budi Santoso', 'S1 Farmasi', 'Farmasi'),
('2455201110022', 'Citra Kirana', 'S1 Keperawatan', 'FKIK'),
('2455201110023', 'Dewi Sartika', 'Informatika', 'Teknik'),
('2455201110024', 'Eko Prasetyo', 'Sipil', 'Teknik'),
('2455201110025', 'Fajar Nugraha', 'S1 Farmasi', 'Farmasi'),
('2455201110026', 'Gita Gutawa', 'Kesehatan Masyarakat', 'FKIK'),
('2455201110027', 'Hendra Wijaya', 'Informatika', 'Teknik'),
('2455201110028', 'Indah Permatasari', 'S1 Keperawatan', 'FKIK'),
('2455201110029', 'Joko Anwar', 'Sipil', 'Teknik'),
('2455201110030', 'Kartika Putri', 'S1 Farmasi', 'Farmasi'),
('2455201110031', 'Lukman Sardi', 'Informatika', 'Teknik'),
('2455201110032', 'Mawar Eva', 'S1 Keperawatan', 'FKIK'),
('2455201110033', 'Naufal Azmi', 'Informatika', 'Teknik'),
('2455201110034', 'Olivia Jensen', 'S1 Farmasi', 'Farmasi'),
('2455201110035', 'Putra Siregar', 'Sipil', 'Teknik'),
('2455201110036', 'Qory Gore', 'Informatika', 'Teknik'),
('2455201110037', 'Rina Nose', 'Kesehatan Masyarakat', 'FKIK'),
('2455201110038', 'Sule Sutisna', 'S1 Farmasi', 'Farmasi'),
('2455201110039', 'Taufik Hidayat', 'Informatika', 'Teknik'),
('2455201110040', 'Uya Kuya', 'S1 Keperawatan', 'FKIK'),
('2455201110041', 'Vino G Bastian', 'Sipil', 'Teknik'),
('2455201110042', 'Wulan Guritno', 'S1 Farmasi', 'Farmasi'),
('2455201110043', 'Xavier Hernandes', 'Informatika', 'Teknik'),
('2455201110044', 'Yuki Kato', 'Kesehatan Masyarakat', 'FKIK'),
('2455201110045', 'Zaskia Gotik', 'S1 Keperawatan', 'FKIK'),
('2455201110046', 'Agus Ringgo', 'Informatika', 'Teknik'),
('2455201110047', 'Bella Shofie', 'S1 Farmasi', 'Farmasi'),
('2455201110048', 'Chiko Jerikho', 'Sipil', 'Teknik'),
('2455201110049', 'Desta Mahendra', 'Informatika', 'Teknik'),
('2455201110050', 'Enzy Storia', 'Kesehatan Masyarakat', 'FKIK'),
('2455201110051', 'Ferry Maryadi', 'S1 Keperawatan', 'FKIK'),
('2455201110052', 'Gading Marten', 'S1 Farmasi', 'Farmasi'),
('2455201110053', 'Hesti Purwadinata', 'Informatika', 'Teknik'),
('2455201110054', 'Irfan Hakim', 'Sipil', 'Teknik'),
('2455201110055', 'Jessica Iskandar', 'S1 Farmasi', 'Farmasi'),
('2455201110056', 'Kevin Julio', 'Informatika', 'Teknik'),
('2455201110057', 'Luna Maya', 'Kesehatan Masyarakat', 'FKIK'),
('2455201110058', 'Marcel Widianto', 'S1 Keperawatan', 'FKIK'),
('2455201110059', 'Nia Ramadhani', 'S1 Farmasi', 'Farmasi'),
('2455201110060', 'Omesh Ananda', 'Informatika', 'Teknik'),
('2455201110061', 'Prilly Latuconsina', 'Sipil', 'Teknik'),
('2455201110062', 'Raditya Dika', 'Informatika', 'Teknik'),
('2455201110063', 'Raffi Ahmad', 'S1 Farmasi', 'Farmasi'),
('2455201110064', 'Soimah Pancawati', 'Kesehatan Masyarakat', 'FKIK'),
('2455201110065', 'Tora Sudiro', 'S1 Keperawatan', 'FKIK'),
('2455201110066', 'Uus Firdaus', 'Informatika', 'Teknik'),
('2455201110067', 'Vincent Rompies', 'Sipil', 'Teknik'),
('2455201110068', 'Wendy Cagur', 'S1 Farmasi', 'Farmasi'),
('2455201110069', 'Yayan Ruhian', 'Informatika', 'Teknik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto_profil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `nama`, `password`, `foto_profil`) VALUES
(10, 'aby@gmail.com', 'Abyy', '$2y$10$qP0Dj/12cyeP1Jh/7XTbHurOwwXur01JHpnFyC1yCJegUNN5k1gS6', ''),
(11, '1@gmail.com', '1', '$2y$10$WTsh6.fae2mYW8kP3addh.2wbhHXzi.O/WiF2Us/LuqhKlyuFg.DC', ''),
(13, 'nikkigenz__@gmail.com', 'Nikki', '$2y$10$TBYHTyFW72pRP3Z4sdWSdO8rWNXcz2u7AR3MEBs33AGp8pJPE6YU.', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
