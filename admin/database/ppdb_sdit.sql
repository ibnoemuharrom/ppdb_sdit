-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Sep 2024 pada 09.37
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
-- Database: `ppdb_sdit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `password`, `nama_depan`, `nama_belakang`) VALUES
(3, 'admin@gmail.com', '$2y$10$peqJie0JzBgMghOho37KO.GvriGLd/7pSOZKKCRIfSEPYrFTYCHOW', 'Admin', 'PPDB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id_contact`, `nama`, `email`, `pesan`) VALUES
(2, 'Saroji', 'saroji@gmail.com', 'Mantapp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `no_pendaftaran` varchar(20) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `no_kk` varchar(50) NOT NULL,
  `no_kip` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `tempatlahir` varchar(30) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `bulan` varchar(30) NOT NULL,
  `tahun` varchar(30) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `statuskeluarga` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `nama_wali` varchar(100) NOT NULL,
  `anak_ke` int(10) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `tanggal_daftar` varchar(20) NOT NULL,
  `status_diterima` varchar(10) NOT NULL,
  `foto_siswa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`no_pendaftaran`, `nisn`, `no_kk`, `no_kip`, `nama`, `jk`, `tempatlahir`, `tanggal`, `bulan`, `tahun`, `agama`, `statuskeluarga`, `alamat`, `nama_ayah`, `nama_ibu`, `nama_wali`, `anak_ke`, `no_hp`, `password`, `tanggal_daftar`, `status_diterima`, `foto_siswa`) VALUES
('NP001', '00001', '123415515', '616171717171', 'Saroji', 'L', 'Cirebon', '13', 'Maret', '2014', 'Islam', 'Anak Kandung', 'Cirebon', 'Ayah', 'Ibu', '', 1, '0819191919', '$2y$10$fp/Yh4jQnGF.8evDRcdLb.tUMazz5bMcSM0MlSIOwOQCjgGouneJW', '28-05-2023', 'N', '20230528171748images.jpg'),
('NP002', '00002', '0191999201', '0198188198', 'Haris', 'L', 'Cirebon', '17', 'Agustus', '2016', 'Islam', 'Anak Kandung', 'Cirebon', 'Ayah', 'Ibu', '', 1, '0819199291', '$2y$10$Pklyues13gT.b8kGI5OVbulkyeWi.4XwxU9OSGKRmrCZYctycbjD2', '28-05-2023', 'N', '20230528174523images.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ppdb`
--

CREATE TABLE `ppdb` (
  `id` int(10) NOT NULL,
  `status_ppdb` varchar(10) NOT NULL,
  `tanggal_registrasi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ppdb`
--

INSERT INTO `ppdb` (`id`, `status_ppdb`, `tanggal_registrasi`) VALUES
(1, 'Enabled', '10-08-2023');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`no_pendaftaran`);

--
-- Indeks untuk tabel `ppdb`
--
ALTER TABLE `ppdb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
