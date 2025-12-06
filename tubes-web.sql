-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jan 2024 pada 02.59
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
-- Database: `tubes-web`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `3b71`
--

CREATE TABLE `3b71` (
  `no` int(11) NOT NULL,
  `luaran_penelitian` varchar(100) NOT NULL,
  `tahun` year(4) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `3b71`
--

INSERT INTO `3b71` (`no`, `luaran_penelitian`, `tahun`, `keterangan`) VALUES
(1, 'bebas', '2004', 'mey'),
(2, 'kuaci', '2024', 'wildan'),
(3, 'kucing', '2023', 'liam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `3b72`
--

CREATE TABLE `3b72` (
  `no` int(11) NOT NULL,
  `luaran_penelitian` varchar(100) NOT NULL,
  `tahun` year(4) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `3b73`
--

CREATE TABLE `3b73` (
  `no` int(11) NOT NULL,
  `luaran_penelitian` varchar(100) NOT NULL,
  `tahun` year(4) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `3b74`
--

CREATE TABLE `3b74` (
  `no` int(11) NOT NULL,
  `luaran_penelitian` int(100) NOT NULL,
  `tahun` int(11) NOT NULL,
  `keterangan` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `4`
--

CREATE TABLE `4` (
  `no` int(11) NOT NULL,
  `jenis_penggunaan` varchar(100) NOT NULL,
  `upps_ts_2` int(11) NOT NULL,
  `upps_ts_1` int(100) NOT NULL,
  `upps_ts` int(11) NOT NULL,
  `upps_ratarata` int(11) NOT NULL,
  `ps_ts_2` int(11) NOT NULL,
  `ps_ts_1` int(11) NOT NULL,
  `ps_ts` int(11) NOT NULL,
  `ps_ratarata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `5a`
--

CREATE TABLE `5a` (
  `no` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `kode_matkul` varchar(30) NOT NULL,
  `nama_matkul` varchar(100) NOT NULL,
  `matkul` varchar(100) NOT NULL,
  `bk_responsi` varchar(100) NOT NULL,
  `bk_seminar` varchar(100) NOT NULL,
  `bk_praktikum` varchar(100) NOT NULL,
  `kredit_ke_jam` int(100) NOT NULL,
  `cp_sikap` varchar(100) NOT NULL,
  `cp_pengetahuan` varchar(100) NOT NULL,
  `cp_keterampilan_umum` varchar(100) NOT NULL,
  `cp_keterampilan_khusus` varchar(100) NOT NULL,
  `dokumen_pembelajaran` varchar(100) NOT NULL,
  `unit_penyelenggara` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `5b`
--

CREATE TABLE `5b` (
  `no` int(11) NOT NULL,
  `judul_penelitian` varchar(100) NOT NULL,
  `nama_dosen` varchar(30) NOT NULL,
  `mata_kuliah` varchar(30) NOT NULL,
  `bentuk_integrasi` varchar(100) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `5c`
--

CREATE TABLE `5c` (
  `no` int(11) NOT NULL,
  `aspek` varchar(100) NOT NULL,
  `tk_sangat_baik` int(11) NOT NULL,
  `tk_baik` int(11) NOT NULL,
  `tk_cukup` int(11) NOT NULL,
  `tk_kurang` int(11) NOT NULL,
  `tindak_lanjut_upps` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `3b71`
--
ALTER TABLE `3b71`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `3b72`
--
ALTER TABLE `3b72`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `3b73`
--
ALTER TABLE `3b73`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `3b74`
--
ALTER TABLE `3b74`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `4`
--
ALTER TABLE `4`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `5a`
--
ALTER TABLE `5a`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `5b`
--
ALTER TABLE `5b`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `5c`
--
ALTER TABLE `5c`
  ADD PRIMARY KEY (`no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
