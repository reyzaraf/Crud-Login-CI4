-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2022 pada 07.55
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mabook`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_preloved`
--

CREATE TABLE `buku_preloved` (
  `id` int(11) NOT NULL,
  `judul_buku` varchar(128) NOT NULL,
  `pengarang` varchar(128) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku_preloved`
--

INSERT INTO `buku_preloved` (`id`, `judul_buku`, `pengarang`, `harga`, `stok`, `image`) VALUES
(1, 'Bidadari Di Bawah Hujan', 'Valleria Verawati', 70000, 1, 'bidadari.jpg'),
(2, 'dan hujanpun berhenti...', 'Farida Susanty', 75000, 1, 'hujan.jpg'),
(3, 'Buku daur ulang', '-', 30000, 12, 'buku.jpg\r\n'),
(4, 'Negeri Para Bedebah', 'Tere Liye', 70000, 1, 'negeri.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daur_ulang`
--

CREATE TABLE `daur_ulang` (
  `id` int(11) NOT NULL,
  `batch_daurulang` varchar(128) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daur_ulang`
--

INSERT INTO `daur_ulang` (`id`, `batch_daurulang`, `alamat`, `keterangan`, `image`) VALUES
(1, 'Batch 8 ', 'Jl. Kenangan Gedung Mabook lt.2, Jakarta Selatan', 'Ayo segera kirimkan buku atau kertas yang sudah usang untuk di daur ulang.', 'daur.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasi`
--

CREATE TABLE `donasi` (
  `id` int(11) NOT NULL,
  `nama_donasi` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `keterangan` varchar(300) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `donasi`
--

INSERT INTO `donasi` (`id`, `nama_donasi`, `alamat`, `keterangan`, `image`) VALUES
(1, 'Donasi untuk SD Suka Mulia di NTT', 'Jl. Kwangya Desa. Suka Mulia', 'Ayo ikut donasikan buku-buku untuk adik-adik kita di SD Suka Mulia.', 'donasi.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `role_id`, `is_active`) VALUES
(2, 'Jay Park', 'yangjungwon@gmail.com', '$2y$10$CqCtbk/G55pwkR80SDY.x.VLn.U6XZ4qSjRF8NaCicRiQOxtUdJvi', 1, 1),
(3, 'Mark Lee ', 'subak@gmail.com', '$2y$10$dK38dM9G478P471xSwR2YOrFyGR47sUPhbBfNxOKtPntHNx1CJEJa', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku_preloved`
--
ALTER TABLE `buku_preloved`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `daur_ulang`
--
ALTER TABLE `daur_ulang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku_preloved`
--
ALTER TABLE `buku_preloved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `daur_ulang`
--
ALTER TABLE `daur_ulang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
