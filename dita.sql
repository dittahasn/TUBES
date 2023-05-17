-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Mar 2022 pada 10.14
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
-- Database: `dita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dita_catatan_perjalanan`
--

CREATE TABLE `dita_catatan_perjalanan` (
  `dita_id_catatan_pejalan` int(11) NOT NULL,
  `dita_id_user` int(11) NOT NULL,
  `dita_tanggal` date NOT NULL,
  `dita_waktu` time NOT NULL,
  `dita_suhu_tubuh` varchar(10) NOT NULL,
  `dita_id_lokasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dita_catatan_perjalanan`
--

INSERT INTO `dita_catatan_perjalanan` (`dita_id_catatan_pejalan`, `dita_id_user`, `dita_tanggal`, `dita_waktu`, `dita_suhu_tubuh`, `dita_id_lokasi`) VALUES
(26, 7, '2022-03-28', '13:15:00', '35', 37),
(27, 7, '2022-03-28', '10:50:00', '36', 38),
(28, 7, '2022-03-28', '11:20:00', '37', 39),
(29, 7, '2022-03-22', '13:17:00', '36', 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dita_lokasi`
--

CREATE TABLE `dita_lokasi` (
  `dita_id_lokasi` int(11) NOT NULL,
  `dita_nama_lokasi` varchar(100) NOT NULL,
  `dita_alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dita_lokasi`
--

INSERT INTO `dita_lokasi` (`dita_id_lokasi`, `dita_nama_lokasi`, `dita_alamat`) VALUES
(1, 'Cimahi', 'Cenghar'),
(35, 'Bandung', 'Setiabudi'),
(37, 'Bandung', 'Dago'),
(38, 'Bandung', 'Braga'),
(39, 'Bandung Barat', 'Padalarang'),
(40, 'Bali', 'Bali Zoo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dita_user`
--

CREATE TABLE `dita_user` (
  `dita_id_user` int(11) NOT NULL,
  `dita_nik` int(20) NOT NULL,
  `dita_nama_lengkap` varchar(100) NOT NULL,
  `dita_role` varchar(20) NOT NULL,
  `dita_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dita_user`
--

INSERT INTO `dita_user` (`dita_id_user`, `dita_nik`, `dita_nama_lengkap`, `dita_role`, `dita_foto`) VALUES
(7, 98, 'jungwoo', 'user', 'jisung.jpeg'),
(15, 123, 'Dita Hasna', 'admin', 'mark.jpg'),
(16, 456, 'jaehyun', 'admin', 'jaehyun.jpeg'),
(17, 76, 'jae', 'admin', 'jaehyun.jpeg'),
(18, 57, 'yeri', 'user', 'jisung.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dita_catatan_perjalanan`
--
ALTER TABLE `dita_catatan_perjalanan`
  ADD PRIMARY KEY (`dita_id_catatan_pejalan`),
  ADD KEY `dita_id_user` (`dita_id_user`),
  ADD KEY `dita_id_lokasi` (`dita_id_lokasi`),
  ADD KEY `dita_id_lokasi_2` (`dita_id_lokasi`),
  ADD KEY `dita_id_lokasi_3` (`dita_id_lokasi`);

--
-- Indeks untuk tabel `dita_lokasi`
--
ALTER TABLE `dita_lokasi`
  ADD PRIMARY KEY (`dita_id_lokasi`);

--
-- Indeks untuk tabel `dita_user`
--
ALTER TABLE `dita_user`
  ADD PRIMARY KEY (`dita_id_user`),
  ADD UNIQUE KEY `dita_nik` (`dita_nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dita_catatan_perjalanan`
--
ALTER TABLE `dita_catatan_perjalanan`
  MODIFY `dita_id_catatan_pejalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `dita_lokasi`
--
ALTER TABLE `dita_lokasi`
  MODIFY `dita_id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `dita_user`
--
ALTER TABLE `dita_user`
  MODIFY `dita_id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dita_catatan_perjalanan`
--
ALTER TABLE `dita_catatan_perjalanan`
  ADD CONSTRAINT `dita_catatan_perjalanan_ibfk_1` FOREIGN KEY (`dita_id_user`) REFERENCES `dita_user` (`dita_id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dita_catatan_perjalanan_ibfk_2` FOREIGN KEY (`dita_id_lokasi`) REFERENCES `dita_lokasi` (`dita_id_lokasi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
