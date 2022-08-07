-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02 Sep 2019 pada 14.00
-- Versi Server: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rumahsakit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(80) NOT NULL,
  `spesialist` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `nama_dokter`, `spesialist`, `alamat`, `no_telp`) VALUES
(4, 'Dr. Sinaga', 'Jantung', 'Pulo Gadung', '085723919283'),
(5, 'Dr. Adi Sunarya', 'Mata', 'Jl. Tanah Tinggi Raya no. 2', '085695469574'),
(6, 'Dr. Udin Sunudin', 'Anak', 'Jl. Kampung Baru 5', '085510920392');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama_obat`, `keterangan`) VALUES
(10, 'Oskadon', 'Obat Sakit Kepala\r\n(3 x 1)'),
(11, 'Bodrex', 'Obat Anak'),
(12, 'Komik', 'Obat Batuk'),
(14, 'Paracetamol', 'Obat Batuk'),
(15, 'Amoxilin', 'Antibiotik'),
(16, 'Dermatix', 'Obat Kulit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` int(11) NOT NULL,
  `no_identitas` varchar(30) NOT NULL,
  `nama_pasien` varchar(80) NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `no_identitas`, `nama_pasien`, `jenis_kelamin`, `alamat`, `no_telp`) VALUES
(46, '019237876231', 'Udin', 'Laki - Laki', 'Jl. Kustamayang no 22', '08320912833'),
(47, '12321903123', 'Ayu', 'Perempuan', 'Jl. Kapak Kuda 5', '0813092812983'),
(48, '12321903332', 'Nur', 'Perempuan', 'Jl. Disini Aja', '213213'),
(49, '241231', 'Nurgianto', 'Laki - Laki', 'Jl. Cisaruk Sari 1 No. 99', '09230102309'),
(50, '24214123', 'Arief', 'Laki - Laki', 'Tangerang', '085695469574'),
(51, '24214123', 'Arief', 'Laki - Laki', 'saddsa', '123213'),
(52, '24214123', 'Arief', 'Laki - Laki', 'sadasd', '213213'),
(53, '51260380', 'Lia', 'Perempuan', 'Tangerang', '0823197619287'),
(54, '77281098', 'Tuti', 'Perempuan', 'Jl. Cisaung Raya no. 93', '0988298120983'),
(55, '88293712', 'Yanto', 'Laki - Laki', 'Jl. Kacawang 5 no. 4', '08271623723');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_poliklinik`
--

CREATE TABLE `tb_poliklinik` (
  `id_poliklinik` int(11) NOT NULL,
  `nama_poliklinik` varchar(50) NOT NULL,
  `gedung` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_poliklinik`
--

INSERT INTO `tb_poliklinik` (`id_poliklinik`, `nama_poliklinik`, `gedung`) VALUES
(2, 'Poli B2', 'A, Lt. 1'),
(4, 'Poli D', 'A, Lt. 1'),
(6, 'Poli F', 'A, lt 2'),
(7, 'Poli A2', 'G, Lt. 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rekammedis`
--

CREATE TABLE `tb_rekammedis` (
  `id_rekammedis` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `keluhan` text NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `diagnosa` text NOT NULL,
  `id_poliklinik` int(11) NOT NULL,
  `tanggal_periksa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rekammedis`
--

INSERT INTO `tb_rekammedis` (`id_rekammedis`, `id_pasien`, `keluhan`, `id_dokter`, `diagnosa`, `id_poliklinik`, `tanggal_periksa`) VALUES
(22, 50, 'Sakit Flu', 5, 'Jangan minus ES', 7, '2019-08-29'),
(23, 49, 'Sakit Kepala', 4, 'Jangan Begadang', 2, '2019-08-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rekammedis_obat`
--

CREATE TABLE `tb_rekammedis_obat` (
  `id` int(11) NOT NULL,
  `id_rekammedis` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rekammedis_obat`
--

INSERT INTO `tb_rekammedis_obat` (`id`, `id_rekammedis`, `id_obat`) VALUES
(50, 22, 12),
(51, 22, 14),
(52, 22, 15),
(53, 23, 10),
(54, 23, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(50) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
('1809088a-c798-11e9-be92-b025aa05b29e', 'Arief', 'arief', '000e065bc2e9b8784cdb0683616186f764133bbf', '1'),
('cdacdd77-c71f-11e9-99a0-b025aa05b29e', 'Arief Nur Hidayah', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tb_poliklinik`
--
ALTER TABLE `tb_poliklinik`
  ADD PRIMARY KEY (`id_poliklinik`);

--
-- Indexes for table `tb_rekammedis`
--
ALTER TABLE `tb_rekammedis`
  ADD PRIMARY KEY (`id_rekammedis`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_poliklinik` (`id_poliklinik`);

--
-- Indexes for table `tb_rekammedis_obat`
--
ALTER TABLE `tb_rekammedis_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_rekammedis` (`id_rekammedis`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_obat`
--
ALTER TABLE `tb_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `tb_poliklinik`
--
ALTER TABLE `tb_poliklinik`
  MODIFY `id_poliklinik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_rekammedis`
--
ALTER TABLE `tb_rekammedis`
  MODIFY `id_rekammedis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tb_rekammedis_obat`
--
ALTER TABLE `tb_rekammedis_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_rekammedis`
--
ALTER TABLE `tb_rekammedis`
  ADD CONSTRAINT `tb_rekammedis_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rekammedis_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rekammedis_ibfk_3` FOREIGN KEY (`id_poliklinik`) REFERENCES `tb_poliklinik` (`id_poliklinik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_rekammedis_obat`
--
ALTER TABLE `tb_rekammedis_obat`
  ADD CONSTRAINT `tb_rekammedis_obat_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rekammedis_obat_ibfk_3` FOREIGN KEY (`id_rekammedis`) REFERENCES `tb_rekammedis` (`id_rekammedis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
