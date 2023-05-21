-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 03:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `Id_Absensi` int(11) NOT NULL,
  `Kode_Kelas` varchar(20) NOT NULL,
  `STB` int(11) NOT NULL,
  `Id_Pert` int(11) NOT NULL,
  `Keterangan` varchar(50) NOT NULL,
  `Tanggal_Absen` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`Id_Absensi`, `Kode_Kelas`, `STB`, `Id_Pert`, `Keterangan`, `Tanggal_Absen`) VALUES
(2, '2ADS4-A', 182209, 1, 'Hadir', '0000-00-00 00:00:00'),
(21, '2ADS4-A', 182209, 2, 'Hadir', '2022-06-26 02:32:08'),
(23, '2ADS4-A', 192051, 2, 'Hadir', '2022-06-26 02:33:05'),
(27, '2ADS4-A', 192051, 1, 'Hadir', '2022-06-26 02:54:57'),
(28, '2ADS4-A', 182209, 3, 'Izin', '2022-06-26 03:38:49'),
(29, '2ADS4-A', 192051, 3, 'Izin', '2022-06-26 03:38:55'),
(30, '2ADS4-G', 182209, 13, 'Hadir', '2022-06-29 00:32:27'),
(31, '3STD2-F', 211121, 14, 'Izin', '2022-06-29 00:55:03'),
(32, '6TAAL-G', 192051, 15, 'Hadir', '2022-07-03 21:27:53'),
(33, '6TAAL-G', 192051, 16, 'Hadir', '2022-07-03 21:32:09'),
(34, '6TAAL-G', 192110, 16, 'Sakit', '2022-07-03 21:32:46'),
(35, '2ADS4-V', 192064, 17, 'Hadir', '2022-10-12 11:01:29'),
(36, '2ADS4-G', 202020, 13, 'Hadir', '2022-10-12 14:23:55');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Username`, `Password`) VALUES
(1, 'e3afed0047b08059d0fada10f400c1e5', 'e3afed0047b08059d0fada10f400c1e5');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `NIDN` int(11) NOT NULL,
  `Nama_Dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`NIDN`, `Nama_Dosen`) VALUES
(123456, 'ibu Ayuuuu'),
(192051, 'Ibu sukmawati'),
(192251, 'ibu sukmaa'),
(941234, 'Ibu Suci'),
(941235, 'Ibu Sinta'),
(941236, 'Pak Rahmat'),
(941237, 'Ibu Sukma'),
(941238, 'Pak Rahim'),
(941240, 'Pak Muhammad');

-- --------------------------------------------------------

--
-- Table structure for table `inti`
--

CREATE TABLE `inti` (
  `Id_Inti` int(11) NOT NULL,
  `Kode_Kelas` varchar(20) NOT NULL,
  `STB` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inti`
--

INSERT INTO `inti` (`Id_Inti`, `Kode_Kelas`, `STB`) VALUES
(1, '2ADS4-A', 182209),
(2, '2ADS4-A', 192051),
(3, '2ADS4-A', 192222),
(5, '2ADS4-G', 182209),
(6, '2ADS4-G', 202020),
(7, '3STD2-F', 192051),
(8, '3STD2-F', 182209),
(9, '3STD2-F', 211121),
(10, '6TAAL-G', 192051),
(11, '6TAAL-G', 192110),
(12, '6TAAL-G', 192249),
(13, '6TAAL-G', 182209),
(14, '6TAAL-G', 192222),
(15, '6TAAL-G', 202020),
(16, '6TAAL-G', 211121),
(17, '2ADS4-V', 192044),
(18, '2ADS4-V', 192064),
(19, '2ADS4-V', 192051);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `Id_Jadwal` int(11) NOT NULL,
  `Kode_Kelas` varchar(20) NOT NULL,
  `Hari` varchar(50) NOT NULL,
  `Jam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`Id_Jadwal`, `Kode_Kelas`, `Hari`, `Jam`) VALUES
(1, '2ADS4-A', 'Selasa', '07:30-09:10'),
(2, '2ADS4-B', 'Selasa', '09:20-11:00'),
(3, '2ADS4-A', 'Senin', '07:30-09:10'),
(23, '2CPP4-B', 'Senin', '15:40-17:00'),
(24, '2ADS4-G', 'Selasa', '11:10-12:50'),
(25, '3STD2-F', 'Rabu', '13:40-15:10'),
(26, '6TAAL-G', 'Senin', '13:40-15:10');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `Kode_Kelas` varchar(20) NOT NULL,
  `Kode_MK` varchar(20) NOT NULL,
  `NIDN` int(11) NOT NULL,
  `Nama_Kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`Kode_Kelas`, `Kode_MK`, `NIDN`, `Nama_Kelas`) VALUES
('2ADS4-A', '2ADS4', 941237, 'A'),
('2ADS4-B', '2ADS4', 941235, 'B'),
('2ADS4-G', '2ADS4', 192051, 'G'),
('2ADS4-V', '2ADS4', 192051, 'V'),
('2CPP4-A', '2CPP4', 941236, 'A'),
('2CPP4-B', '2CPP4', 941237, 'B'),
('3STD2-C', '3STD2', 192051, 'C'),
('3STD2-F', '3STD2', 123456, 'F'),
('3STD2-S', '3STD2', 941238, 'S'),
('6TAAL-G', '6TAAL', 192251, 'G');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `STB` int(11) NOT NULL,
  `Nama_Mahasiswa` varchar(200) NOT NULL,
  `Jenis_Kelamin` enum('L','P') NOT NULL,
  `Angkatan` int(4) NOT NULL,
  `Foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`STB`, `Nama_Mahasiswa`, `Jenis_Kelamin`, `Angkatan`, `Foto`) VALUES
(182209, 'Sukmaaaawati', 'P', 2002, 'MHS_182209.jpg'),
(192044, 'Awalia', 'P', 2017, 'MHS_192044.jpg'),
(192051, 'Sukmawatiyyyy', 'P', 2018, 'MHS_192051.jpg'),
(192059, 'Wulan', 'P', 2020, 'MHS_192059.jpg'),
(192060, 'Riska', 'P', 2000, 'MHS_192060.jpg'),
(192064, 'Ayu Andira', 'P', 2019, 'MHS_192064.jpg'),
(192071, 'ilmy', 'P', 2021, 'MHS_192071.jpg'),
(192110, 'Onya', 'P', 2017, 'MHS_192110.jpg'),
(192222, 'Cinderella', 'P', 2019, 'MHS_192222.jpg'),
(192249, 'safira', 'P', 2020, 'MHS_192249.jpg'),
(202020, 'Tingker bell', 'P', 2020, 'MHS_202020.jpg'),
(211121, 'Raja', 'L', 2021, 'MHS_211121.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `Kode_MK` varchar(20) NOT NULL,
  `Nama_Matakuliah` varchar(200) NOT NULL,
  `Semester` int(11) NOT NULL,
  `SKS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`Kode_MK`, `Nama_Matakuliah`, `Semester`, `SKS`) VALUES
('2ADS4', 'Administrasi Web', 2, 4),
('2CPP4', 'Algoritma dan pemograman', 4, 4),
('3STD2', 'Struktur Data', 3, 2),
('6TAAL', 'Analisis Algoritma', 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pertemuan`
--

CREATE TABLE `pertemuan` (
  `Id_Pert` int(11) NOT NULL,
  `Kode_Kelas` varchar(20) NOT NULL,
  `Nama_Pert` varchar(200) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pertemuan`
--

INSERT INTO `pertemuan` (`Id_Pert`, `Kode_Kelas`, `Nama_Pert`, `datetime`) VALUES
(1, '2ADS4-A', 'Pertemuan 1', '2022-06-25 05:00:00'),
(2, '2ADS4-A', 'Pertemuan 2', '2022-06-27 00:00:00'),
(3, '2ADS4-A', 'Pertemuan 3', '2022-06-26 03:38:11'),
(9, '2ADS4-A', 'Pertemuan 4', '2022-06-28 11:24:35'),
(13, '2ADS4-G', 'Pertemuan 1', '2022-06-28 22:59:53'),
(14, '3STD2-F', 'Pertemuan 1', '2022-06-29 00:51:30'),
(15, '6TAAL-G', 'Pertemuan 1', '2022-07-03 21:25:09'),
(16, '6TAAL-G', 'Pertemuan 2', '2022-07-03 21:31:40'),
(17, '2ADS4-V', 'Pertemuan 1', '2022-10-12 11:00:46'),
(18, '2ADS4-G', 'Pertemuan 2', '2022-10-12 14:21:39'),
(19, '2ADS4-G', 'Pertemuan 3', '2022-10-12 14:25:50'),
(20, '3STD2-C', 'Pertemuan 1', '2022-10-14 16:23:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`Id_Absensi`),
  ADD KEY `Id_Pert` (`Id_Pert`),
  ADD KEY `Kode_Kelas` (`Kode_Kelas`),
  ADD KEY `STB` (`STB`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`NIDN`);

--
-- Indexes for table `inti`
--
ALTER TABLE `inti`
  ADD PRIMARY KEY (`Id_Inti`),
  ADD KEY `Kode_Kelas` (`Kode_Kelas`),
  ADD KEY `STB` (`STB`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`Id_Jadwal`),
  ADD KEY `Kode_Kelas` (`Kode_Kelas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`Kode_Kelas`),
  ADD KEY `NIDN` (`NIDN`),
  ADD KEY `Kode_MK` (`Kode_MK`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`STB`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`Kode_MK`);

--
-- Indexes for table `pertemuan`
--
ALTER TABLE `pertemuan`
  ADD PRIMARY KEY (`Id_Pert`),
  ADD KEY `Kode_Kelas` (`Kode_Kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `Id_Absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inti`
--
ALTER TABLE `inti`
  MODIFY `Id_Inti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `Id_Jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pertemuan`
--
ALTER TABLE `pertemuan`
  MODIFY `Id_Pert` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`Id_Pert`) REFERENCES `pertemuan` (`Id_Pert`),
  ADD CONSTRAINT `absensi_ibfk_2` FOREIGN KEY (`Kode_Kelas`) REFERENCES `kelas` (`Kode_Kelas`),
  ADD CONSTRAINT `absensi_ibfk_3` FOREIGN KEY (`STB`) REFERENCES `mahasiswa` (`STB`);

--
-- Constraints for table `inti`
--
ALTER TABLE `inti`
  ADD CONSTRAINT `inti_ibfk_1` FOREIGN KEY (`Kode_Kelas`) REFERENCES `kelas` (`Kode_Kelas`),
  ADD CONSTRAINT `inti_ibfk_2` FOREIGN KEY (`STB`) REFERENCES `mahasiswa` (`STB`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`Kode_Kelas`) REFERENCES `kelas` (`Kode_Kelas`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`NIDN`) REFERENCES `dosen` (`NIDN`),
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`Kode_MK`) REFERENCES `matakuliah` (`Kode_MK`);

--
-- Constraints for table `pertemuan`
--
ALTER TABLE `pertemuan`
  ADD CONSTRAINT `pertemuan_ibfk_1` FOREIGN KEY (`Kode_Kelas`) REFERENCES `kelas` (`Kode_Kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
