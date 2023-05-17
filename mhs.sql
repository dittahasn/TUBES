-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Mar 2023 pada 08.00
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mhs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mhs_catatan_perjalanan`
--

CREATE TABLE `mhs_catatan_perjalanan` (
  `mhs_id_catatan_pejalan` int(11) NOT NULL,
  `mhs_id_user` int(11) NOT NULL,
  `mhs_tanggal` date NOT NULL,
  `mhs_waktu` time NOT NULL,
  `mhs_catatan` varchar(10) NOT NULL,
  `mhs_id_lokasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mhs_catatan_perjalanan`
--

INSERT INTO `mhs_catatan_perjalanan` (`mhs_id_catatan_pejalan`, `mhs_id_user`, `mhs_tanggal`, `mhs_waktu`, `mhs_catatan`, `mhs_id_lokasi`) VALUES
(26, 7, '2022-03-28', '13:15:00', '35', 37),
(27, 7, '2022-03-28', '10:50:00', '36', 38),
(28, 7, '2022-03-28', '11:20:00', '37', 39),
(29, 7, '2022-03-22', '13:17:00', '36', 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mhs_lokasi`
--

CREATE TABLE `mhs_lokasi` (
  `mhs_id_lokasi` int(11) NOT NULL,
  `mhs_nama_lokasi` varchar(100) NOT NULL,
  `mhs_alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mhs_lokasi`
--

INSERT INTO `mhs_lokasi` (`mhs_id_lokasi`, `mhs_nama_lokasi`, `mhs_alamat`) VALUES
(1, 'Cimahi', 'Cenghar'),
(35, 'Bandung', 'Setiabudi'),
(37, 'Bandung', 'Dago'),
(38, 'Bandung', 'Braga'),
(39, 'Bandung Barat', 'Padalarang'),
(40, 'Bali', 'Bali Zoo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mhs_user`
--

CREATE TABLE `mhs_user` (
  `mhs_id_user` int(11) NOT NULL,
  `mhs_nik` int(20) NOT NULL,
  `mhs_nama_lengkap` varchar(100) NOT NULL,
  `mhs_role` varchar(20) NOT NULL,
  `mhs_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mhs_user`
--

INSERT INTO `mhs_user` (`mhs_id_user`, `mhs_nik`, `mhs_nama_lengkap`, `mhs_role`, `mhs_foto`) VALUES
(7, 98, 'jungwoo', 'user', 'jisung.jpeg'),
(15, 123, 'Dita Hasna', 'admin', 'mark.jpg'),
(16, 456, 'jaehyun', 'admin', 'jaehyun.jpeg'),
(17, 76, 'jae', 'admin', 'jaehyun.jpeg'),
(18, 57, 'yeri', 'user', 'jisung.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mhs_catatan_perjalanan`
--
ALTER TABLE `mhs_catatan_perjalanan`
  ADD PRIMARY KEY (`mhs_id_catatan_pejalan`),
  ADD KEY `dita_id_user` (`mhs_id_user`),
  ADD KEY `dita_id_lokasi` (`mhs_id_lokasi`),
  ADD KEY `dita_id_lokasi_2` (`mhs_id_lokasi`),
  ADD KEY `dita_id_lokasi_3` (`mhs_id_lokasi`);

--
-- Indeks untuk tabel `mhs_lokasi`
--
ALTER TABLE `mhs_lokasi`
  ADD PRIMARY KEY (`mhs_id_lokasi`);

--
-- Indeks untuk tabel `mhs_user`
--
ALTER TABLE `mhs_user`
  ADD PRIMARY KEY (`mhs_id_user`),
  ADD UNIQUE KEY `dita_nik` (`mhs_nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mhs_catatan_perjalanan`
--
ALTER TABLE `mhs_catatan_perjalanan`
  MODIFY `mhs_id_catatan_pejalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `mhs_lokasi`
--
ALTER TABLE `mhs_lokasi`
  MODIFY `mhs_id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `mhs_user`
--
ALTER TABLE `mhs_user`
  MODIFY `mhs_id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mhs_catatan_perjalanan`
--
ALTER TABLE `mhs_catatan_perjalanan`
  ADD CONSTRAINT `mhs_catatan_perjalanan_ibfk_1` FOREIGN KEY (`mhs_id_user`) REFERENCES `mhs_user` (`mhs_id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mhs_catatan_perjalanan_ibfk_2` FOREIGN KEY (`mhs_id_lokasi`) REFERENCES `mhs_lokasi` (`mhs_id_lokasi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
