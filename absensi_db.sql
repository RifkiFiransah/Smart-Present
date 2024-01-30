-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2024 at 07:12 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absensi`
--

CREATE TABLE `tb_absensi` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_absensi`
--

INSERT INTO `tb_absensi` (`id`, `id_siswa`, `id_jadwal`, `tanggal`, `keterangan`) VALUES
(3, 8, 7, '2023-12-27', 'hadir'),
(4, 8, 10, '2023-12-25', 'hadir'),
(5, 8, 10, '2024-01-01', 'hadir'),
(6, 13, 10, '2024-01-01', 'alpha'),
(8, 15, 10, '2024-01-01', 'hadir'),
(9, 10, 10, '2024-01-01', 'hadir'),
(10, 11, 10, '2024-01-01', 'izin'),
(11, 12, 10, '2024-01-01', 'izin'),
(12, 8, 10, '2024-01-08', 'hadir'),
(13, 8, 6, '2024-01-09', 'hadir'),
(14, 8, 6, '2024-01-16', 'hadir'),
(15, 8, 10, '2024-01-15', 'hadir'),
(16, 10, 6, '2024-01-09', 'hadir'),
(17, 15, 6, '2024-01-09', 'hadir'),
(19, 13, 6, '2024-01-09', 'hadir'),
(20, 8, 6, '2024-01-30', 'hadir'),
(21, 10, 6, '2024-01-30', 'hadir');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama`, `username`, `email`, `password`) VALUES
(1, 'Rifki Firansah', 'admin', 'admin@gmail.com', '$2y$10$bhpsywqVslPIWYMnEqqPuOE9Yb3nO2QgotWliFfCb8b7GXO6kE7Xu'),
(2, 'Coba Aja Yaa', 'coba', 'coba@gmail.com', '$2y$10$e5SumN7tyyncjy15iE7yW.8CUxWTyz8389TkLYGk1AvpLWUbGmsyC');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id` int(11) NOT NULL,
  `nip` int(16) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id`, `nip`, `nama_guru`, `email`, `jk`, `alamat`, `password`) VALUES
(2, 123321, 'Jarwo', 'jarwo@gmail.com', 'L', 'Garut', '$2y$10$u9fQak1QviUkjz/cB2nmG.FodGjt.fnxsEudIODzEYbCtHm8AKg1a'),
(4, 11110000, 'Danang', 'danang@gmail.com', 'L', 'Bogor\r\n', '$2y$10$WRpoOrIlBWasAsE/VAkJuebvQA5VXVr50NThKFbiSs6EywnHZy5Ly'),
(5, 11112222, 'Bejo', 'bejo@gmail.com', 'L', 'Bandung', '$2y$10$QNc7pI69Oay/uFZ/iPvUV.n79vqIpHroYaqX0Oh0wx60pya5hPhHa'),
(13, 11113333, 'Nurul Rahma', 'nurul@rahma.id', 'P', 'Cikurapana', '$2y$10$oXNasy1LbjMtFffYPAVTUemUW65qhOEuA3CcUDqyclJC2NUyJ4Z9a');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hari`
--

CREATE TABLE `tb_hari` (
  `id` int(11) NOT NULL,
  `hari` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_hari`
--

INSERT INTO `tb_hari` (`id`, `hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jum\'at');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id` int(11) NOT NULL,
  `id_hari` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id`, `id_hari`, `id_mapel`, `id_guru`, `id_kelas`, `mulai`, `selesai`, `aktif`) VALUES
(6, 2, 6, 4, 2, '12:00:00', '13:00:00', 0),
(7, 3, 5, 2, 2, '07:00:00', '11:00:00', 0),
(8, 4, 11, 4, 2, '08:00:00', '12:00:00', 0),
(9, 5, 8, 2, 3, '09:00:00', '11:50:00', 0),
(10, 1, 8, 5, 2, '09:00:00', '11:00:00', 0),
(11, 1, 2, 5, 3, '08:00:00', '09:30:00', 0),
(12, 2, 6, 5, 1, '10:00:00', '11:00:00', 0),
(13, 2, 10, 5, 1, '07:30:00', '08:20:00', 0),
(14, 3, 4, 5, 2, '12:30:00', '13:20:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id`, `nama_kelas`, `category`) VALUES
(1, 'X', 'A'),
(2, 'XI', 'A'),
(3, 'XII', 'A'),
(6, 'X', 'B'),
(7, 'XI', 'B'),
(8, 'XII', 'B'),
(9, 'X', 'C'),
(10, 'XI', 'C'),
(11, 'XII', 'C'),
(12, 'X', 'D'),
(13, 'XI', 'D'),
(14, 'XII', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id` int(11) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`id`, `nama_mapel`) VALUES
(1, 'Bahasa Indonesia'),
(2, 'Bahasa Inggris'),
(4, 'Bahasa Sunda'),
(5, 'Pendidikan Kewarganegaraan'),
(6, 'Matematika'),
(7, 'Penjaskes'),
(8, 'Seni Budaya'),
(9, 'Ilmu Pengetahuan Sosial'),
(10, 'Ilmu Pengetahuan Alam'),
(11, 'Teknologi Informasi Komputer'),
(12, 'Pendidikan Agama Islam'),
(13, 'Organisasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id` int(11) NOT NULL,
  `nis` int(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id`, `nis`, `nama`, `email`, `jk`, `telp`, `alamat`, `password`, `id_kelas`) VALUES
(7, 112233, 'Nia', 'nia@gmail.com', 'P', '08212121', 'Kuningan', '$2y$10$pNeCTCzJMMnc00p78QnfTeqZqbSD1t0KVJM4hf5L7UTPGfT.oFlau', 3),
(8, 123123, 'Yuda', 'yuda@gmail.com', 'L', '08212121321', 'Cidahu', '$2y$10$97XmDBkXqdqw2X3PPSpEIunf4qqAM8tp9Ufz.iOpzcLBQR5EcUT8O', 2),
(9, 321123, 'Sirla', 'sirla@gmail.com', 'P', '08212121', 'Payakumbuh', '$2y$10$UiOYt7MhHtTHRL2saPj5VuaxhqXGgPXIMokC.afMTux7Te/WQukku', 2),
(10, 1001, 'Rifki', 'rifki@gmail.com', 'L', '08100102', 'Cikeusik', '$2y$10$VIU6hH1LCqO6l5re9TLc..Kh2Xu.1PkFg/uFxNVIQHpckqcBTqXJ.', 2),
(11, 1002, 'Laura', 'laura@gmail.com', 'P', '081002', 'Ciamis', '$2y$10$M4mrJiVTj3XHO8j/XE5pVekS0tOUuNTOQUoXoU8kDAMIsMdYAayIG', 2),
(12, 1003, 'Antonella', 'antonella@gmail.com', 'P', '081003', 'Cinangka', '$2y$10$TMabBRRpTmf69SyfiFsYJOZWWSYhCDfwd3JhV6BdfGiMS.o9pNW5m', 2),
(13, 1004, 'Yanto', 'yanto@gmail.com', 'L', '081004', 'Cileunyi', '$2y$10$EbwjJVHSj9C8lufxyogCXOV1CfnmDLEvSkyiYSUe/A70ZpjLrlc1m', 2),
(15, 1006, 'yandi', 'yandi@gmail.com', 'L', '081006', 'Cimahi', '$2y$10$AITnIsAy/Wqwc4sPRmsetOl.Vkqjhf0ATmMaczsdj54WasesC7ANa', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_hari`
--
ALTER TABLE `tb_hari`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_hari` (`id_hari`) USING BTREE;

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_hari`
--
ALTER TABLE `tb_hari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD CONSTRAINT `tb_absensi_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `tb_jadwal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_absensi_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD CONSTRAINT `tb_jadwal_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `tb_guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jadwal_ibfk_2` FOREIGN KEY (`id_hari`) REFERENCES `tb_hari` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jadwal_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jadwal_ibfk_4` FOREIGN KEY (`id_mapel`) REFERENCES `tb_mapel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
