-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 27, 2019 at 03:00 PM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kominfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `__instansi`
--

CREATE TABLE IF NOT EXISTS `__instansi` (
  `id_instansi` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text,
  `tempat` varchar(10) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `__instansi`
--

INSERT INTO `__instansi` (`id_instansi`, `nama`, `alamat`, `tempat`, `is_active`) VALUES
(1, 'Kominfo Surabaya', 'Jl Surabaya Raya No.01 Surabaya', 'Luar', 1),
(2, 'Ds Majan', 'Ds. Majan Kec.Kedungwaru Kab. Tulungagung', 'Dalam', 1),
(3, 'Pemkab Tulungagung', 'Jl Tulungagung Raya ...', 'Dalam', 1);

-- --------------------------------------------------------

--
-- Table structure for table `__petugas`
--

CREATE TABLE IF NOT EXISTS `__petugas` (
  `id_petugas` int(11) NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `pangkat` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `__petugas`
--

INSERT INTO `__petugas` (`id_petugas`, `nip`, `nama`, `pangkat`, `jabatan`, `is_active`) VALUES
(1, '19761009 200604 1 011', 'CAHYA LUCKITA N. S.Ta', 'Penata (III/C)', 'Kasi Infrastruktur dan Teknologi Kabupaten Tulunga', 1),
(2, '19770405 201001 1 015', 'ARIF HARI PURNOMO S.T', 'Penata ( III / C )', 'Kasi Keamanan Informasi dan Telekomunikasi Kabupat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `__sppd`
--

CREATE TABLE IF NOT EXISTS `__sppd` (
  `id_sppd` int(11) NOT NULL,
  `id_spt` int(11) DEFAULT NULL,
  `angkutan` varchar(100) DEFAULT NULL,
  `tempat_berangkat` varchar(100) DEFAULT NULL,
  `lama_perjalanan` varchar(100) DEFAULT NULL,
  `tanggal_berangkat` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `hasil` text,
  `catatan` text
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `__sppd`
--

INSERT INTO `__sppd` (`id_sppd`, `id_spt`, `angkutan`, `tempat_berangkat`, `lama_perjalanan`, `tanggal_berangkat`, `tanggal_kembali`, `hasil`, `catatan`) VALUES
(1, 2, 'Kendaraan Umum', 'Tulungagung', '1 hari', '2019-01-28', '2019-01-28', '<p style="text-align: justify; "><span style="font-size: 16px;">Retribusi pengendalian menara telekomunikasi di adakan di Kec. Kedungwaru Kab. Tulungagung. Kunjungan lokasi untuk menentukan data terbaru untuk perhitungan retribusi menara.&nbsp; Adapun provider yang akan di cek lokasi yaitu PT.Protelindo yang berada Ds. Majan RT. 09 RW. 02 Kec. Kedungwaru, Kab.Tulungagung dengan ketinggian menara 42 Meter dan mulai dibangun tahun 2014 Peninjauan di lokasi juga untuk menentukan besaran tingkat penggunaan jasa retribusi tersebut. Setelah didapat nilainya akan dimasukan ke perhitungan total retribusi di lokasi tersebut.</span><br></p>', ''),
(2, 2, 'Kendaraan Umum', 'Tulungagung', '2 hari', '2019-01-28', '2019-01-29', '<p style="text-align: justify;"><span style="font-size: 16px;">Retribusi pengendalian menara telekomunikasi di adakan di Kec. Kedungwaru Kab. Tulungagung. Kunjungan lokasi untuk menentukan data terbaru untuk perhitungan retribusi menara.&nbsp; Adapun provider yang akan di cek lokasi yaitu PT.Protelindo yang berada Ds. Majan RT. 09 RW. 02 Kec. Kedungwaru, Kab.Tulungagung dengan ketinggian menara 42 Meter dan mulai dibangun tahun 2014 Peninjauan di lokasi juga untuk menentukan besaran tingkat penggunaan jasa retribusi tersebut. Setelah didapat nilainya akan dimasukan ke perhitungan total retribusi di lokasi tersebut.</span><br></p>', '');

-- --------------------------------------------------------

--
-- Table structure for table `__spt`
--

CREATE TABLE IF NOT EXISTS `__spt` (
  `id_spt` int(11) NOT NULL,
  `nomor` varchar(100) DEFAULT NULL,
  `dasar` text,
  `id_instansi` int(11) DEFAULT NULL,
  `keperluan` text,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `__spt`
--

INSERT INTO `__spt` (`id_spt`, `nomor`, `dasar`, `id_instansi`, `keperluan`, `tanggal`) VALUES
(1, '094/0001/109/2018', '<div><span style="font-size: 16px;">Dokumen Pelaksanaan Anggaran Satuan Kerja Perangkat Daerah / DPA-SKPD Tahun Anggaran 2018 tanggal 9 Januari 2018,</span></div><div><span style="font-size: 16px;">Kegiatan Rapat Koordinasi dan Konsultasi ke Dalam Daerah Dinas Komunikasi dan Informatika Kabupaten Tulungagung Tahun 2018</span></div>', 2, '<p style="text-align: left; "><span style="font-size: 16px;">Koordinasi kegiatan optimalisasi layanan telekomunikasi&nbsp;</span><br></p>', '2019-01-28'),
(2, '094/0002/109/2018', '<div><span style="font-size: 16px;">Dokumen Pelaksana Anggaran Satuan Kerja Perangkat Daerah/DPA SKPD Tahun Anggaran 2018, tanggal 09 Januari 2018.</span></div><div><span style="font-size: 16px;">Kegiatan Optimalisasi Layanan Telekomunikasi.</span></div>', 1, '<p><span style="font-size:12.0pt;line-height:115%;\nfont-family:"Arial",sans-serif;mso-fareast-font-family:Calibri;mso-ansi-language:\nEN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA">Koordinasi kegiatan\noptimalisasi layanan telekomunikasi </span><br></p>', '2019-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `__spt_petugas`
--

CREATE TABLE IF NOT EXISTS `__spt_petugas` (
  `id_spt_pet` int(11) NOT NULL,
  `id_spt` int(11) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `__spt_petugas`
--

INSERT INTO `__spt_petugas` (`id_spt_pet`, `id_spt`, `id_petugas`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `__users`
--

CREATE TABLE IF NOT EXISTS `__users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `__users`
--

INSERT INTO `__users` (`user_id`, `fullname`, `username`, `password`, `is_active`) VALUES
(1, 'Root', '3f52df3f499b06337b90475c794382cb', '3f52df3f499b06337b90475c794382cb', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `__instansi`
--
ALTER TABLE `__instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `__petugas`
--
ALTER TABLE `__petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `__sppd`
--
ALTER TABLE `__sppd`
  ADD PRIMARY KEY (`id_sppd`);

--
-- Indexes for table `__spt`
--
ALTER TABLE `__spt`
  ADD PRIMARY KEY (`id_spt`);

--
-- Indexes for table `__spt_petugas`
--
ALTER TABLE `__spt_petugas`
  ADD PRIMARY KEY (`id_spt_pet`),
  ADD KEY `id_spt` (`id_spt`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `__users`
--
ALTER TABLE `__users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `__instansi`
--
ALTER TABLE `__instansi`
  MODIFY `id_instansi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `__petugas`
--
ALTER TABLE `__petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `__sppd`
--
ALTER TABLE `__sppd`
  MODIFY `id_sppd` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `__spt`
--
ALTER TABLE `__spt`
  MODIFY `id_spt` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `__spt_petugas`
--
ALTER TABLE `__spt_petugas`
  MODIFY `id_spt_pet` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `__users`
--
ALTER TABLE `__users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `__spt_petugas`
--
ALTER TABLE `__spt_petugas`
  ADD CONSTRAINT `__spt_petugas_ibfk_1` FOREIGN KEY (`id_spt`) REFERENCES `__spt` (`id_spt`),
  ADD CONSTRAINT `__spt_petugas_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `__petugas` (`id_petugas`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
