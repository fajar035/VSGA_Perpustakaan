-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Okt 2021 pada 09.20
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelatihan_dbpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `nm_admin` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `sesi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`idadmin`, `nm_admin`, `username`, `password`, `sesi`) VALUES
(1, 'Fajar Pratama', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbanggota`
--

CREATE TABLE `tbanggota` (
  `id` int(11) NOT NULL,
  `kode_anggota` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT '0' COMMENT '0 = tidak meminjam\r\n1 = sedang meminjam',
  `foto` varchar(50) NOT NULL,
  `waktu_dibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbanggota`
--

INSERT INTO `tbanggota` (`id`, `kode_anggota`, `nama`, `jeniskelamin`, `alamat`, `status`, `foto`, `waktu_dibuat`) VALUES
(1, 'ANG000', 'Agastya', 'Pria', '', '0', '', '2021-08-27 05:46:36'),
(2, 'ANG001', 'Udin', 'Pria', '', '0', '', '2021-08-27 05:46:43'),
(3, 'ANG002', 'NIning', 'Wanita', '', '0', '', '2021-08-27 05:46:49'),
(4, 'ANG003', 'Mawar', 'Wanita', '', '0', '', '2021-08-27 05:46:54'),
(5, 'ANG004', 'Inem', 'Wanita', '', '0', '', '2021-08-27 05:47:01'),
(7, 'ANG005', 'Asri', 'Wanita', '', '0', '', '2021-08-27 05:47:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbbuku`
--

CREATE TABLE `tbbuku` (
  `id` int(11) NOT NULL,
  `kode_buku` varchar(10) NOT NULL,
  `judulbuku` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `pengarang` varchar(40) NOT NULL,
  `penerbit` varchar(40) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '0' COMMENT '0 = tidak dipinjam\r\n1 = dipinjam',
  `waktu_dibuat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbbuku`
--

INSERT INTO `tbbuku` (`id`, `kode_buku`, `judulbuku`, `kategori`, `pengarang`, `penerbit`, `status`, `waktu_dibuat`) VALUES
(1, 'NK000', 'Apa yang benar bukan siapa yang benar', '4', '4', '3', '0', '2021-08-27 12:56:11'),
(2, 'NK001', 'Dari Pojok Sejarah', '1', '4', '3', '1', '2021-08-27 12:56:27'),
(3, 'NK002', 'Indonesia Sebagian Dari desa saya', '1', '4', '3', '0', '2021-08-27 12:56:49'),
(4, 'NK003', 'Pemograman Web', '3', '3', '2', '0', '2021-08-27 12:57:12'),
(5, 'NK004', 'Seni Mencintai', '5', '1', '3', '1', '2021-08-27 12:57:38'),
(6, 'NK005', 'Lari dari kebebasan', '5', '1', '3', '0', '2021-08-27 12:57:47'),
(7, 'NK006', 'Retrotika Aristoteles', '2', '3', '1', '0', '2021-08-27 12:58:00'),
(8, 'NK007', 'sample', '5', '6', '3', '0', '2021-08-27 13:02:17'),
(9, 'NK008', 'asdsadasd', '5', '6', '3', '0', '2021-10-23 14:12:40'),
(10, 'NK009', 'Belajar GAME MOBA', '5', '6', '3', '0', '2021-10-23 14:12:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbkategori`
--

CREATE TABLE `tbkategori` (
  `id` int(11) NOT NULL,
  `kode_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbkategori`
--

INSERT INTO `tbkategori` (`id`, `kode_kategori`, `nama_kategori`) VALUES
(1, 'KT000', 'Ilmu Agama'),
(2, 'KT001', 'Filsafat'),
(3, 'KT002', 'Komputer'),
(4, 'KT003', 'Agama'),
(5, 'KT004', 'Psikolog');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpenerbit`
--

CREATE TABLE `tbpenerbit` (
  `id` int(11) NOT NULL,
  `kode_penerbit` varchar(10) NOT NULL,
  `nama_penerbit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbpenerbit`
--

INSERT INTO `tbpenerbit` (`id`, `kode_penerbit`, `nama_penerbit`) VALUES
(1, 'PNR000', 'Gramedia'),
(2, 'PNR001', 'Informatika'),
(3, 'PNR002', 'Mizan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpenulis`
--

CREATE TABLE `tbpenulis` (
  `id` int(11) NOT NULL,
  `kode_penulis` varchar(10) NOT NULL,
  `nama_penulis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbpenulis`
--

INSERT INTO `tbpenulis` (`id`, `kode_penulis`, `nama_penulis`) VALUES
(1, 'PEN000', 'Erich Fromm'),
(2, 'PEN001', 'Sigmun Freud'),
(3, 'PEN002', 'Aristoteles'),
(4, 'PEN003', 'Emha Ainun Nadjib'),
(5, 'PEN004', 'Sudjiwo Tedjo'),
(6, 'PEN005', 'Plato');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbtransaksi`
--

CREATE TABLE `tbtransaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(10) NOT NULL,
  `idanggota` varchar(5) NOT NULL,
  `idbuku` varchar(5) NOT NULL,
  `tglpinjam` date NOT NULL,
  `tglkembali` date NOT NULL,
  `status_peminjaman` int(11) NOT NULL COMMENT '0 = dikembalikan\r\n1 = masih dipinjam'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbtransaksi`
--

INSERT INTO `tbtransaksi` (`id_transaksi`, `kode_transaksi`, `idanggota`, `idbuku`, `tglpinjam`, `tglkembali`, `status_peminjaman`) VALUES
(1, 'TRK000', '7', '1', '2021-08-27', '2021-08-27', 0),
(2, 'TRK001', '7', '5', '2021-08-27', '2021-08-27', 1),
(3, 'TRK002', '3', '3', '2021-08-27', '2021-08-27', 0),
(4, 'TRK003', '7', '2', '2021-08-27', '0000-00-00', 1),
(5, 'TRK004', '1', '9', '2021-10-01', '2021-10-23', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbuser`
--

CREATE TABLE `tbuser` (
  `iduser` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `password` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbuser`
--

INSERT INTO `tbuser` (`iduser`, `nama`, `alamat`, `password`) VALUES
('US001', 'Andi Rahman Hakim', 'Jl.Pramuka No 9', '1234');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indeks untuk tabel `tbanggota`
--
ALTER TABLE `tbanggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbbuku`
--
ALTER TABLE `tbbuku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbkategori`
--
ALTER TABLE `tbkategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbpenerbit`
--
ALTER TABLE `tbpenerbit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbpenulis`
--
ALTER TABLE `tbpenulis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbtransaksi`
--
ALTER TABLE `tbtransaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbanggota`
--
ALTER TABLE `tbanggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbbuku`
--
ALTER TABLE `tbbuku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbkategori`
--
ALTER TABLE `tbkategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbpenerbit`
--
ALTER TABLE `tbpenerbit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbpenulis`
--
ALTER TABLE `tbpenulis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbtransaksi`
--
ALTER TABLE `tbtransaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
