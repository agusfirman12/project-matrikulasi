-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Agu 2022 pada 05.16
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota_kelompok`
--

CREATE TABLE `anggota_kelompok` (
  `id` int(11) NOT NULL,
  `nama_anggota` varchar(45) NOT NULL,
  `nim` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota_kelompok`
--

INSERT INTO `anggota_kelompok` (`id`, `nama_anggota`, `nim`) VALUES
(1, 'Mohamad Agus Firmansah', '362155401176'),
(2, 'abdur rohman', '362155401185');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nama_dosen` varchar(45) NOT NULL,
  `nik` varchar(45) NOT NULL,
  `gambar` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `nama_dosen`, `nik`, `gambar`, `user_id`) VALUES
(1, 'Ruth Ema Febrita,S.Pd.,M.Kom', '9894801070', 'nophoto.png', 1),
(2, 'Subono,S.T.,M.T', '62949093', 'nophoto.png', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama_mahasiswa` varchar(45) NOT NULL,
  `nim` varchar(45) NOT NULL,
  `kelas` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL,
  `anggota_kelompok_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama_mahasiswa`, `nim`, `kelas`, `email`, `alamat`, `user_id`, `anggota_kelompok_id`) VALUES
(1, 'Mohamad Agus Firmansah', '362155401176', '1F', 'firman@gmail.com', 'wongsorejo', 0, 1),
(2, 'jaki daniyudin', '362155401162', '1F', 'jaki@gmail.com', 'sumatera', 0, 1),
(3, 'indah rahmawati', '362155401165', '1F', 'indah@gmail.com', 'rogojampi', 0, 1),
(4, 'abdur rohman', '362155401185', '1F', 'rohman@gmail.com', 'banyuwangi', 0, 2),
(5, 'hanum faulinur', '362155401184', '1F', 'hanum@gmail.com', 'genteng', 0, 2),
(6, 'pratama ahmad al dzikri', '362155401172', '1F', 'pratama@gmail.com', 'banyuwangi', 0, 1),
(7, 'iwan kurniawan', '362155401159', '1F', 'iwan@gmail.com', 'wongsorejo', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `nilai_pembimbing_lapangan` varchar(45) NOT NULL,
  `nilai_pembimbing_kp` varchar(45) NOT NULL,
  `nilai_penguji` varchar(45) NOT NULL,
  `bukti_nilai_pembimbing_lapangan` varchar(45) NOT NULL,
  `pendaftaran_ujian_kp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id`, `nilai_pembimbing_lapangan`, `nilai_pembimbing_kp`, `nilai_penguji`, `bukti_nilai_pembimbing_lapangan`, `pendaftaran_ujian_kp_id`) VALUES
(9, '80', '90', '80', 'nophoto.png', 2),
(10, '90', '90', '90', 'nophoto.png', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran_kp`
--

CREATE TABLE `pendaftaran_kp` (
  `id` int(11) NOT NULL,
  `tempat_kp` varchar(45) NOT NULL,
  `alamat_kp` varchar(45) NOT NULL,
  `tanggal_mulai` datetime NOT NULL,
  `tanggal_selesai` datetime NOT NULL,
  `proposal` varchar(45) NOT NULL,
  `anggota_kelompok_id` int(11) NOT NULL,
  `dosen_id` int(11) DEFAULT NULL,
  `perusahaan id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftaran_kp`
--

INSERT INTO `pendaftaran_kp` (`id`, `tempat_kp`, `alamat_kp`, `tanggal_mulai`, `tanggal_selesai`, `proposal`, `anggota_kelompok_id`, `dosen_id`, `perusahaan id`) VALUES
(1, 'PT.ABC', 'surabaya', '2022-08-01 09:51:49', '2022-08-31 09:51:49', 'proposal.pdf', 1, 1, 0),
(2, 'PT.ASDP', 'banyuwangi', '2022-08-01 13:41:31', '2022-08-31 13:41:31', 'proposal2.pdf', 2, 2, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran_ujian_kp`
--

CREATE TABLE `pendaftaran_ujian_kp` (
  `id` int(11) NOT NULL,
  `laporan_kp` varchar(45) NOT NULL,
  `jadwal_ujian` varchar(45) NOT NULL,
  `pendaftaran_kp_id` int(11) NOT NULL,
  `acc_ujian_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftaran_ujian_kp`
--

INSERT INTO `pendaftaran_ujian_kp` (`id`, `laporan_kp`, `jadwal_ujian`, `pendaftaran_kp_id`, `acc_ujian_id`) VALUES
(1, 'laporan.pdf', 'sabtu,25 desember 2023', 1, 0),
(2, 'laporan.pdf', 'senin, 10 desember 2022', 2, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `id_role`) VALUES
(1, 'dosen', 'dosen', 2),
(3, 'dosen2', 'dosen2', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `user_role` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `user_role`) VALUES
(1, 'mahasiswa'),
(2, 'dosen');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota_kelompok`
--
ALTER TABLE `anggota_kelompok`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggota_kelompok_id` (`anggota_kelompok_id`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_ibfk_1` (`pendaftaran_ujian_kp_id`);

--
-- Indeks untuk tabel `pendaftaran_kp`
--
ALTER TABLE `pendaftaran_kp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggota_kelompok_id` (`anggota_kelompok_id`),
  ADD KEY `dosen_id` (`dosen_id`);

--
-- Indeks untuk tabel `pendaftaran_ujian_kp`
--
ALTER TABLE `pendaftaran_ujian_kp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendaftaran_kp_id` (`pendaftaran_kp_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota_kelompok`
--
ALTER TABLE `anggota_kelompok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran_kp`
--
ALTER TABLE `pendaftaran_kp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran_ujian_kp`
--
ALTER TABLE `pendaftaran_ujian_kp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`anggota_kelompok_id`) REFERENCES `anggota_kelompok` (`id`);

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`pendaftaran_ujian_kp_id`) REFERENCES `pendaftaran_ujian_kp` (`id`);

--
-- Ketidakleluasaan untuk tabel `pendaftaran_kp`
--
ALTER TABLE `pendaftaran_kp`
  ADD CONSTRAINT `pendaftaran_kp_ibfk_1` FOREIGN KEY (`anggota_kelompok_id`) REFERENCES `anggota_kelompok` (`id`),
  ADD CONSTRAINT `pendaftaran_kp_ibfk_2` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`);

--
-- Ketidakleluasaan untuk tabel `pendaftaran_ujian_kp`
--
ALTER TABLE `pendaftaran_ujian_kp`
  ADD CONSTRAINT `pendaftaran_ujian_kp_ibfk_1` FOREIGN KEY (`pendaftaran_kp_id`) REFERENCES `pendaftaran_kp` (`id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
