-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Agu 2022 pada 14.20
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spkbr`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobot`
--

CREATE TABLE `bobot` (
  `id_bobot` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `nilai_bobot` enum('1','2','3','4','5','6') NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bobot`
--

INSERT INTO `bobot` (`id_bobot`, `id_kriteria`, `id_subkriteria`, `nilai_bobot`, `keterangan`) VALUES
(38, 5, 19, '3', 'Hak Milik'),
(39, 5, 19, '2', 'Warisan'),
(40, 5, 19, '1', 'Hak Pakai'),
(41, 5, 20, '3', 'Sempit'),
(42, 5, 20, '2', 'Sedang'),
(43, 5, 20, '1', 'Luas'),
(44, 5, 21, '3', 'Ijuk'),
(45, 5, 21, '2', 'Genteng'),
(46, 5, 21, '1', 'Seng'),
(47, 5, 22, '3', 'Bambu'),
(48, 5, 22, '2', 'Seng'),
(49, 5, 22, '1', 'Papan'),
(50, 5, 23, '3', 'Tanah'),
(51, 5, 23, '2', 'Karpet Plastik'),
(52, 5, 23, '1', 'Plester'),
(53, 6, 24, '3', 'Cerai Mati'),
(54, 6, 24, '2', 'Cerai Hidup'),
(55, 6, 24, '1', 'Kawin'),
(56, 6, 26, '6', 'Tidak bekerja'),
(57, 6, 26, '5', 'Serabutan'),
(58, 6, 26, '4', 'Petani/Nelayan'),
(59, 6, 26, '3', 'Pedagang'),
(60, 6, 26, '2', 'Wiraswasta'),
(61, 6, 26, '1', 'Pegawai Swasta'),
(62, 6, 28, '4', 'Dibawah 1.000.000'),
(63, 6, 28, '3', '1.000.000 - 2.000.000'),
(64, 6, 28, '2', '2.000.000 - 3.000.000'),
(65, 6, 28, '1', 'Diatas 3.000.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(200) NOT NULL,
  `jenis_kriteria` enum('Core Factor','Secondary Factor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `jenis_kriteria`) VALUES
(5, 'Rumah', 'Core Factor'),
(6, 'Pemilik', 'Secondary Factor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `nilai_bobot` enum('1','2','3','4','5','6') NOT NULL,
  `pengurangan` int(20) NOT NULL,
  `pembobotan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_warga`, `id_kriteria`, `id_subkriteria`, `nilai_bobot`, `pengurangan`, `pembobotan`) VALUES
(105, 12, 5, 19, '3', 0, 5),
(106, 13, 5, 19, '2', -1, 4),
(107, 13, 5, 20, '3', 0, 5),
(108, 13, 5, 21, '3', 0, 5),
(109, 13, 5, 22, '1', -2, 3),
(110, 13, 5, 23, '3', 0, 5),
(111, 13, 6, 24, '3', 0, 5),
(112, 13, 6, 26, '3', -3, 2),
(113, 13, 6, 28, '2', -2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama_subkriteria` varchar(200) NOT NULL,
  `jenis_subkriteria` enum('Core Factor','Secondary Factor') NOT NULL,
  `nilai_maks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_subkriteria`, `id_kriteria`, `nama_subkriteria`, `jenis_subkriteria`, `nilai_maks`) VALUES
(19, 5, 'Kepemilikan', 'Core Factor', 3),
(20, 5, 'Bangunan', 'Core Factor', 3),
(21, 5, 'Atap', 'Core Factor', 3),
(22, 5, 'Dinding', 'Secondary Factor', 3),
(23, 5, 'Lantai', 'Secondary Factor', 3),
(24, 6, 'Status Pernikahan', 'Core Factor', 3),
(26, 6, 'Pekerjaan', 'Core Factor', 6),
(28, 6, 'Penghasilan', 'Secondary Factor', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user1`
--

CREATE TABLE `user1` (
  `id_user1` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak_akses` enum('A','P') NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user1`
--

INSERT INTO `user1` (`id_user1`, `username`, `password`, `hak_akses`) VALUES
(2, 'Kepala', 'kepala123', 'P'),
(3, 'Admin', 'admin123', 'A'),
(4, 'adit100', 'adit0510', 'P');

-- --------------------------------------------------------

--
-- Struktur dari tabel `warga`
--

CREATE TABLE `warga` (
  `id_warga` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `tempat_lahir` varchar(200) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `warga`
--

INSERT INTO `warga` (`id_warga`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`) VALUES
(12, 'Akat', 'Air Hitam', '1977-08-07', 'P', 'RT 03 RW 01 Dusun Paras'),
(13, 'Amat Jauhari', 'Sinar Jaya', '1983-09-18', 'P', 'RT 03 RW 01 Dusun Paras');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indeks untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- Indeks untuk tabel `user1`
--
ALTER TABLE `user1`
  ADD PRIMARY KEY (`id_user1`);

--
-- Indeks untuk tabel `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id_warga`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id_bobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `user1`
--
ALTER TABLE `user1`
  MODIFY `id_user1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `warga`
--
ALTER TABLE `warga`
  MODIFY `id_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
