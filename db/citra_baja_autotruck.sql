-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Mar 2022 pada 16.24
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `citra_baja_autotruck`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_ahp`
--

CREATE TABLE `t_ahp` (
  `ahp_id` int(11) NOT NULL,
  `ahp_penduduk` text NOT NULL,
  `ahp_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_aspek`
--

CREATE TABLE `t_aspek` (
  `aspek_id` int(11) NOT NULL,
  `aspek_kode` text NOT NULL,
  `aspek_title` text NOT NULL,
  `aspek_bobot` text NOT NULL,
  `aspek_cf` text NOT NULL,
  `aspek_sf` text NOT NULL,
  `aspek_hapus` int(11) NOT NULL DEFAULT 0,
  `aspek_tanggal` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_aspek`
--

INSERT INTO `t_aspek` (`aspek_id`, `aspek_kode`, `aspek_title`, `aspek_bobot`, `aspek_cf`, `aspek_sf`, `aspek_hapus`, `aspek_tanggal`) VALUES
(2, 'AS01', 'Kecerdasan', '20', '60', '40', 0, '2020-06-23'),
(3, 'AS02', 'sikap kerja', '30', '60', '40', 0, '2020-06-23'),
(4, 'AS03', 'prilaku', '50', '60', '40', 0, '2020-06-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_cfsf`
--

CREATE TABLE `t_cfsf` (
  `cfsf_id` int(11) NOT NULL,
  `cfsf_karyawan` int(11) DEFAULT NULL,
  `cfsf_aspek` text DEFAULT NULL,
  `cfsf_cf` text DEFAULT NULL,
  `cfsf_sf` text DEFAULT NULL,
  `cfsf_nilai` text DEFAULT NULL,
  `cfsf_tanggal` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_cfsf`
--

INSERT INTO `t_cfsf` (`cfsf_id`, `cfsf_karyawan`, `cfsf_aspek`, `cfsf_cf`, `cfsf_sf`, `cfsf_nilai`, `cfsf_tanggal`) VALUES
(63, 6, 'AS01', '0.6', '0.4', '2.7', '2022-03-05'),
(64, 6, 'AS02', '0.6', '0.4', '1.4', '2022-03-05'),
(65, 6, 'AS03', '0.6', '0.4', '1.8', '2022-03-05'),
(66, 7, 'AS01', '0.6', '0.4', '2.1', '2022-03-05'),
(67, 7, 'AS02', '0.6', '0.4', '1.8', '2022-03-05'),
(68, 7, 'AS03', '0.6', '0.4', '2.1', '2022-03-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_detail_user`
--

CREATE TABLE `t_detail_user` (
  `detail_id` int(11) NOT NULL,
  `detail_id_user` int(11) DEFAULT NULL,
  `detail_nik` text DEFAULT NULL,
  `detail_departement` text DEFAULT NULL,
  `detail_ttl` text DEFAULT NULL,
  `detail_alamat` text DEFAULT NULL,
  `detail_biodata` text DEFAULT NULL,
  `detail_hapus` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_detail_user`
--

INSERT INTO `t_detail_user` (`detail_id`, `detail_id_user`, `detail_nik`, `detail_departement`, `detail_ttl`, `detail_alamat`, `detail_biodata`, `detail_hapus`) VALUES
(1, 1, '1909232', 'Keuangan', 'Jakarta, 13/12/1990', 'Jakarata Timur', 'ini biodata ku', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_faktor`
--

CREATE TABLE `t_faktor` (
  `faktor_id` int(11) NOT NULL,
  `faktor_kode` text NOT NULL,
  `faktor_aspek` text NOT NULL,
  `faktor_title` text NOT NULL,
  `faktor_nilai` text NOT NULL,
  `faktor_type` text NOT NULL,
  `faktor_hapus` int(11) NOT NULL DEFAULT 0,
  `faktor_tanggal` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_faktor`
--

INSERT INTO `t_faktor` (`faktor_id`, `faktor_kode`, `faktor_aspek`, `faktor_title`, `faktor_nilai`, `faktor_type`, `faktor_hapus`, `faktor_tanggal`) VALUES
(5, 'FK01', '2', 'Common Sense', '3', 'cf', 0, '2020-06-23'),
(6, 'FK02', '2', 'Verbalisasi Ide', '3', 'cf', 0, '2020-06-23'),
(7, 'FK03', '3', 'Sistematika Berpikir', '4', 'sf', 0, '2020-06-23'),
(8, 'FK04', '3', 'Penalaran dan Solusi Real', '4', 'sf', 0, '2020-06-23'),
(9, 'FK05', '4', 'Konsentrasi', '3', 'cf', 0, '2020-06-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_gap`
--

CREATE TABLE `t_gap` (
  `gap_id` int(11) NOT NULL,
  `gap_karyawan` int(11) NOT NULL,
  `gap_aspek` text NOT NULL,
  `gap_faktor` text NOT NULL,
  `gap_hasil` text NOT NULL,
  `gap_tanggal` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_gap`
--

INSERT INTO `t_gap` (`gap_id`, `gap_karyawan`, `gap_aspek`, `gap_faktor`, `gap_hasil`, `gap_tanggal`) VALUES
(195, 7, 'AS01', 'FK01', '-1', '2022-03-05'),
(196, 7, 'AS01', 'FK02', '-2', '2022-03-05'),
(197, 7, 'AS02', 'FK03', '-1', '2022-03-05'),
(198, 7, 'AS02', 'FK04', '0', '2022-03-05'),
(199, 7, 'AS03', 'FK05', '2', '2022-03-05'),
(200, 6, 'AS01', 'FK01', '-1', '2022-03-05'),
(201, 6, 'AS01', 'FK02', '0', '2022-03-05'),
(202, 6, 'AS02', 'FK03', '-2', '2022-03-05'),
(203, 6, 'AS02', 'FK04', '-1', '2022-03-05'),
(204, 6, 'AS03', 'FK05', '-2', '2022-03-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_hasil_konversi`
--

CREATE TABLE `t_hasil_konversi` (
  `hasil_konversi_id` int(11) NOT NULL,
  `hasil_konversi_karyawan` int(11) NOT NULL,
  `hasil_konversi_aspek` text NOT NULL,
  `hasil_konversi_faktor` text NOT NULL,
  `hasil_konversi_nilai` text NOT NULL,
  `hasil_konversi_tanggal` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_hasil_konversi`
--

INSERT INTO `t_hasil_konversi` (`hasil_konversi_id`, `hasil_konversi_karyawan`, `hasil_konversi_aspek`, `hasil_konversi_faktor`, `hasil_konversi_nilai`, `hasil_konversi_tanggal`) VALUES
(185, 7, 'AS02', 'FK04', '5', '2022-03-05'),
(186, 6, 'AS01', 'FK02', '5', '2022-03-05'),
(187, 7, 'AS01', 'FK01', '4', '2022-03-05'),
(188, 7, 'AS02', 'FK03', '4', '2022-03-05'),
(189, 6, 'AS01', 'FK01', '4', '2022-03-05'),
(190, 6, 'AS02', 'FK04', '4', '2022-03-05'),
(191, 7, 'AS03', 'FK05', '3.5', '2022-03-05'),
(192, 7, 'AS01', 'FK02', '3', '2022-03-05'),
(193, 6, 'AS02', 'FK03', '3', '2022-03-05'),
(194, 6, 'AS03', 'FK05', '3', '2022-03-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_karyawan`
--

CREATE TABLE `t_karyawan` (
  `karyawan_id` int(11) NOT NULL,
  `karyawan_nama` text NOT NULL,
  `karyawan_alamat` text NOT NULL,
  `karyawan_departement` text NOT NULL,
  `karyawan_jabatan` text NOT NULL,
  `karyawan_nik` text NOT NULL,
  `karyawan_tempat_lahir` text NOT NULL,
  `karyawan_tanggal_lahir` text DEFAULT NULL,
  `karyawan_tanggal` date DEFAULT NULL,
  `karyawan_hapus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_karyawan`
--

INSERT INTO `t_karyawan` (`karyawan_id`, `karyawan_nama`, `karyawan_alamat`, `karyawan_departement`, `karyawan_jabatan`, `karyawan_nik`, `karyawan_tempat_lahir`, `karyawan_tanggal_lahir`, `karyawan_tanggal`, `karyawan_hapus`) VALUES
(6, 'Turismin', 'Jakarta Timur', 'operator', 'Karyawan', '208713', 'Jakarta', '1990-03-12', NULL, 0),
(7, 'Hadan', 'jakarta Barat', 'Administrasi', 'Karyawan', '208714', 'Bandung', '1995-12-13', NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_konversi`
--

CREATE TABLE `t_konversi` (
  `konversi_id` int(11) NOT NULL,
  `konversi_title` text NOT NULL,
  `konversi_selisih` text NOT NULL,
  `konversi_bobot_nilai` text NOT NULL,
  `konversi_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_konversi`
--

INSERT INTO `t_konversi` (`konversi_id`, `konversi_title`, `konversi_selisih`, `konversi_bobot_nilai`, `konversi_tanggal`) VALUES
(1, 'Tidak ada selisih (kompetensi sesuai dgn yg dibutuhkan)', '0', '5', '2020-05-17'),
(2, 'Kompetensi individu kelebihan 1 tingkat', '1', '4,5', '2020-05-17'),
(3, 'Kompetensi individu kekurangan 1 tingkat', '-1', '4', '2020-05-17'),
(4, 'Kompetensi individu kelebihan 2 tingkat', '2', '3,5', '2020-05-18'),
(5, 'Kompetensi individu kekurangan 2 tingkat', '-2', '3', '2020-05-18'),
(6, 'Kompetensi individu kelebihan 3 tingkat', '3', '2.5', '2020-05-18'),
(7, 'Kompetensi individu kekurangan 3 tingkat', '-3', '2', '2020-05-18'),
(8, 'Kompetensi individu kelebihan 4 tingkat', '4', '1,5', '2020-05-18'),
(9, 'Kompetensi individu kekurangan 4 tingkat', '-4', '1', '2020-05-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kriteria`
--

CREATE TABLE `t_kriteria` (
  `kriteria_id` int(11) NOT NULL,
  `kriteria_kode` text DEFAULT NULL,
  `kriteria_title` text DEFAULT NULL,
  `kriteria_hapus` int(11) DEFAULT 0,
  `kriteria_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_kriteria`
--

INSERT INTO `t_kriteria` (`kriteria_id`, `kriteria_kode`, `kriteria_title`, `kriteria_hapus`, `kriteria_tanggal`) VALUES
(1, 'KR01', 'Sikap Kerja', 0, '2020-06-05'),
(2, 'KR02', 'Mantap Jiwa', 0, '2022-03-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_matching`
--

CREATE TABLE `t_matching` (
  `matching_id` int(11) NOT NULL,
  `matching_karyawan` int(11) NOT NULL,
  `matching_tanggal` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_matching`
--

INSERT INTO `t_matching` (`matching_id`, `matching_karyawan`, `matching_tanggal`) VALUES
(22, 7, '2022-03-04'),
(23, 6, '2022-03-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_penilaian`
--

CREATE TABLE `t_penilaian` (
  `penilaian_id` int(11) NOT NULL,
  `penilaian_karyawan` int(11) NOT NULL,
  `penilaian_aspek` text NOT NULL,
  `penilaian_faktor` text DEFAULT NULL,
  `penilaian_nilai` text NOT NULL,
  `penilaian_tanggal` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_penilaian`
--

INSERT INTO `t_penilaian` (`penilaian_id`, `penilaian_karyawan`, `penilaian_aspek`, `penilaian_faktor`, `penilaian_nilai`, `penilaian_tanggal`) VALUES
(122, 7, 'AS01', 'FK01', '2', '2022-03-04'),
(123, 7, 'AS01', 'FK02', '1', '2022-03-04'),
(124, 7, 'AS02', 'FK03', '3', '2022-03-04'),
(125, 7, 'AS02', 'FK04', '4', '2022-03-04'),
(126, 7, 'AS03', 'FK05', '5', '2022-03-04'),
(127, 6, 'AS01', 'FK01', '2', '2022-03-05'),
(128, 6, 'AS01', 'FK02', '3', '2022-03-05'),
(129, 6, 'AS02', 'FK03', '2', '2022-03-05'),
(130, 6, 'AS02', 'FK04', '3', '2022-03-05'),
(131, 6, 'AS03', 'FK05', '1', '2022-03-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_rangking`
--

CREATE TABLE `t_rangking` (
  `rangking_id` int(11) NOT NULL,
  `rangking_karyawan` text NOT NULL,
  `rangking_nilai` text NOT NULL,
  `rangking_tanggal` text NOT NULL,
  `rangking_hapus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_rangking`
--

INSERT INTO `t_rangking` (`rangking_id`, `rangking_karyawan`, `rangking_nilai`, `rangking_tanggal`, `rangking_hapus`) VALUES
(126, '6', '0.201', '2022-03-03', 0),
(127, '7', '0.367', '2022-03-03', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sub`
--

CREATE TABLE `t_sub` (
  `sub_id` int(11) NOT NULL,
  `sub_kode` text NOT NULL,
  `sub_title` text NOT NULL,
  `sub_kriteria` text NOT NULL,
  `sub_hapus` int(11) NOT NULL DEFAULT 0,
  `sub_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_sub`
--

INSERT INTO `t_sub` (`sub_id`, `sub_kode`, `sub_title`, `sub_kriteria`, `sub_hapus`, `sub_tanggal`) VALUES
(1, 'SK01', 'Integritas', '1', 0, '2020-08-08'),
(2, 'SK02', 'Kerjasama', '1', 0, '2020-08-08'),
(5, 'SK03', 'Cekatan', '1', 0, '2022-02-23'),
(6, 'SK04', 'Tepat Waktu', '1', 0, '2022-02-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_total`
--

CREATE TABLE `t_total` (
  `total_id` int(11) NOT NULL,
  `total_karyawan` text NOT NULL,
  `total_nilai` text NOT NULL,
  `total_tanggal` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_total`
--

INSERT INTO `t_total` (`total_id`, `total_karyawan`, `total_nilai`, `total_tanggal`) VALUES
(26, '6', '1.86', '2022-03-05'),
(27, '7', '2.01', '2022-03-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_email` text DEFAULT NULL,
  `user_password` text DEFAULT NULL,
  `user_tanggal` date DEFAULT NULL,
  `user_foto` text DEFAULT NULL,
  `user_hapus` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_tanggal`, `user_foto`, `user_hapus`) VALUES
(1, 'Riski', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '2019-12-27', 'noimage.gif', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_ahp`
--
ALTER TABLE `t_ahp`
  ADD PRIMARY KEY (`ahp_id`);

--
-- Indeks untuk tabel `t_aspek`
--
ALTER TABLE `t_aspek`
  ADD PRIMARY KEY (`aspek_id`);

--
-- Indeks untuk tabel `t_cfsf`
--
ALTER TABLE `t_cfsf`
  ADD PRIMARY KEY (`cfsf_id`);

--
-- Indeks untuk tabel `t_detail_user`
--
ALTER TABLE `t_detail_user`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indeks untuk tabel `t_faktor`
--
ALTER TABLE `t_faktor`
  ADD PRIMARY KEY (`faktor_id`);

--
-- Indeks untuk tabel `t_gap`
--
ALTER TABLE `t_gap`
  ADD PRIMARY KEY (`gap_id`);

--
-- Indeks untuk tabel `t_hasil_konversi`
--
ALTER TABLE `t_hasil_konversi`
  ADD PRIMARY KEY (`hasil_konversi_id`);

--
-- Indeks untuk tabel `t_karyawan`
--
ALTER TABLE `t_karyawan`
  ADD PRIMARY KEY (`karyawan_id`);

--
-- Indeks untuk tabel `t_konversi`
--
ALTER TABLE `t_konversi`
  ADD PRIMARY KEY (`konversi_id`);

--
-- Indeks untuk tabel `t_kriteria`
--
ALTER TABLE `t_kriteria`
  ADD PRIMARY KEY (`kriteria_id`);

--
-- Indeks untuk tabel `t_matching`
--
ALTER TABLE `t_matching`
  ADD PRIMARY KEY (`matching_id`);

--
-- Indeks untuk tabel `t_penilaian`
--
ALTER TABLE `t_penilaian`
  ADD PRIMARY KEY (`penilaian_id`);

--
-- Indeks untuk tabel `t_rangking`
--
ALTER TABLE `t_rangking`
  ADD PRIMARY KEY (`rangking_id`);

--
-- Indeks untuk tabel `t_sub`
--
ALTER TABLE `t_sub`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indeks untuk tabel `t_total`
--
ALTER TABLE `t_total`
  ADD PRIMARY KEY (`total_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_ahp`
--
ALTER TABLE `t_ahp`
  MODIFY `ahp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_aspek`
--
ALTER TABLE `t_aspek`
  MODIFY `aspek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_cfsf`
--
ALTER TABLE `t_cfsf`
  MODIFY `cfsf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `t_detail_user`
--
ALTER TABLE `t_detail_user`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_faktor`
--
ALTER TABLE `t_faktor`
  MODIFY `faktor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `t_gap`
--
ALTER TABLE `t_gap`
  MODIFY `gap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT untuk tabel `t_hasil_konversi`
--
ALTER TABLE `t_hasil_konversi`
  MODIFY `hasil_konversi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT untuk tabel `t_karyawan`
--
ALTER TABLE `t_karyawan`
  MODIFY `karyawan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `t_konversi`
--
ALTER TABLE `t_konversi`
  MODIFY `konversi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `t_kriteria`
--
ALTER TABLE `t_kriteria`
  MODIFY `kriteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_matching`
--
ALTER TABLE `t_matching`
  MODIFY `matching_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `t_penilaian`
--
ALTER TABLE `t_penilaian`
  MODIFY `penilaian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT untuk tabel `t_rangking`
--
ALTER TABLE `t_rangking`
  MODIFY `rangking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT untuk tabel `t_sub`
--
ALTER TABLE `t_sub`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `t_total`
--
ALTER TABLE `t_total`
  MODIFY `total_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
