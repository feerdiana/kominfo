-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2019 at 08:05 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `kwitansi`
--

CREATE TABLE `kwitansi` (
  `id` int(10) NOT NULL,
  `no_bku` varchar(50) NOT NULL,
  `kode_rek` varchar(50) NOT NULL,
  `no` varchar(50) NOT NULL,
  `dari` varchar(200) NOT NULL,
  `sejumlah` varchar(200) NOT NULL,
  `untuk` varchar(500) NOT NULL,
  `rp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kwitansi`
--

INSERT INTO `kwitansi` (`id`, `no_bku`, `kode_rek`, `no`, `dari`, `sejumlah`, `untuk`, `rp`) VALUES
(1, '094/119/407.109/2018', '1.02.10.1.02.10.10', '1', 'Kuasa Pengguna Anggaran Kegiatan Optimalisasi Layanan Telekomunikasi', '950.000,00', 'Biaya Perjalanan Dinas Luar Daerah Sdr Sumarji Kuswantoro, S.Pd. MM ke Dinas Kominfo Kabupaten Lamongan pada tgl. 2 Mei 2018 dalam rangka Koordinasi terkait Optimalisasi Layanan Telekomunikasi.', '950.000,00'),
(4, '094/119/407.109/2018', '1.02.10.1.02.10.10', '2', 'Kuasa Pengguna Anggaran Kegiatan Optimalisasi Layanan Telekomunikasi', '800.000,00', 'Biaya Perjalanan Dinas Luar Daerah Sdr Cahya Luckita N, S.T ke Dinas Kominfo Kabupaten Lamongan pada tgl.2 Mei 2018 dalam rangka Koordinasi terkait Optimalisasi Layanan Telekomunikasi.', '800.000,00'),
(5, '094/119/407.109/2018', '1.02.10.1.02.10.10', '3', 'Kuasa Pengguna Anggaran Kegiatan Optimalisasi Layanan Telekomunikasi', '800.000,00', 'Biaya Perjalanan Dinas Luar Daerah Sdr Ahmad Muzaki, S.T ke Dinas Kominfo Kabupaten Lamongan pada tgl. 2 Mei 2018 dalam rangka Koordinasi terkait Optimalisasi Layanan Telekomunikasi.', '800.000,00');

-- --------------------------------------------------------

--
-- Table structure for table `pengurusan_spt`
--

CREATE TABLE `pengurusan_spt` (
  `fk_spt` int(10) NOT NULL,
  `fk_petugas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengurusan_spt`
--

INSERT INTO `pengurusan_spt` (`fk_spt`, `fk_petugas`) VALUES
(11, 1),
(11, 2),
(11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(50) NOT NULL,
  `nama_petugas` varchar(100) DEFAULT NULL,
  `nip` varchar(100) DEFAULT NULL,
  `pangkat` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `fk_pegawai` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `nip`, `pangkat`, `jabatan`, `fk_pegawai`) VALUES
(1, 'SUMARJI KUSWANTORO, S.Pd, MM', '196804131991031009', 'Pembina (IV/A)', 'Kabid Penyelenggaraan E-Government ', 11),
(2, 'CAHYA LUCKITA N. S.T', '197610092006041011', 'Penata (III/C)', 'Kasi Infrastruktur dan Teknologi', 11),
(3, 'AHMAD MUZAKI S.T', '198306102010011029', 'Penata Muda TK I ( III / B )', 'Kasi Pengembangan Aplikasi ', 11);

-- --------------------------------------------------------

--
-- Table structure for table `sppd`
--

CREATE TABLE `sppd` (
  `id` int(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pangkat` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `maksud` varchar(100) NOT NULL,
  `tmp_berangkat` varchar(100) NOT NULL,
  `tmp_tujuan` varchar(100) NOT NULL,
  `tgl_berangkat` varchar(100) NOT NULL,
  `tgl_kembali` varchar(100) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `rekening` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sppd`
--

INSERT INTO `sppd` (`id`, `nama`, `pangkat`, `jabatan`, `maksud`, `tmp_berangkat`, `tmp_tujuan`, `tgl_berangkat`, `tgl_kembali`, `instansi`, `rekening`) VALUES
(1, 'SUMARJI KUSWANTORO, S.Pd, MM', 'Pembina (IV/A)', 'Kabid Penyelenggaraan E-Government', 'Koordinasi Kegiatan Optimalisasi Layanan Telekomunikasi', 'Tulungagung', 'Dinas Kominfo Kabupaten Lamongan', '02-05-2019', '02-05-2019', 'Dinas Komunikasi dan Informatika ', '1.02.10.1.02.10.10'),
(2, 'CAHYA LUCKITA N. S.T', 'Penata (III/C)', 'Kasi Infrastruktur dan Teknologi', 'Koordinasi Kegiatan Optimalisasi Layanan Telekomunikasi', 'Tulungagung', 'Dinas Kominfo Kabupaten Lamongan', '02-05-2019', '02-05-2019', 'Dinas Komunikasi dan Informatika', '1.02.10.1.02.10.10'),
(3, 'AHMAD MUZAKI S.T', 'Penata Muda TK I ( III / B )', 'Kasi Pengembangan Aplikasi', 'Koordinasi Kegiatan Optimalisasi Layanan Telekomunikasi', 'Tulungagung', 'Dinas Kominfo Kabupaten Lamongan', '02-05-2019', '02-05-2019', 'Dinas Komunikasi dan Informatika', '1.02.10.1.02.10.10');

-- --------------------------------------------------------

--
-- Table structure for table `spt`
--

CREATE TABLE `spt` (
  `id` int(50) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `petugas` varchar(100) NOT NULL,
  `tujuan` varchar(500) NOT NULL,
  `hasil` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spt`
--

INSERT INTO `spt` (`id`, `no_surat`, `perihal`, `tanggal`, `petugas`, `tujuan`, `hasil`) VALUES
(11, '094/119/407.109/2018', 'Koordinasi kegiatan Optimalisasi Layanan Telekomunikasi kabupaten Lamongan', '2019-05-02', '3', 'Dinas Komunikasi dan Informatika Kab. Lamongan. Jl. Kyai H. Ahmad Dahlan No.1, Lamongan', 'Dinas Komunikasi dan Propinsi  Surabaya dalam salah satu tugasnya menyebarluaskan kepada publik data pendukung lainnya yang disusun oleh Kementerian Komunikasi dan Informatika terkait dengan kebijakan dan program pemerintah, menyampaikan setiap kebijakan dan program pemerintah secara lintas sektoral dan lintas daerah kepada publik secara cepat dan tepat. Dalam rangka  hal tersebut diatas Dinas Komunikasi dan Informatika Kabupaten Tulungagung memberikan layanan kepada masyarakat dengan menyampaikan informasi melalui berbagai saluran komunikasi kepada masyarakat secara tepat, cepat, obyektif dan mudah dimengerti dengan kebijakan dan program pemerintah');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(1, 'Ferdiana', 'e1e335f98d2905e4548d0f330cfee5de', 'user'),
(2, 'Admin', 'e3afed0047b08059d0fada10f400c1e5', 'admin'),
(3, 'FRC', 'fee69989f4a16376afc2a35094ec5540', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kwitansi`
--
ALTER TABLE `kwitansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `fk_pegawai_idx` (`fk_pegawai`);

--
-- Indexes for table `sppd`
--
ALTER TABLE `sppd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spt`
--
ALTER TABLE `spt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kwitansi`
--
ALTER TABLE `kwitansi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sppd`
--
ALTER TABLE `sppd`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `spt`
--
ALTER TABLE `spt`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `fk_pegawai` FOREIGN KEY (`fk_pegawai`) REFERENCES `spt` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
