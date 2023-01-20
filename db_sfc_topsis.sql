-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 23, 2021 at 01:23 AM
-- Server version: 5.7.24
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sfc_topsis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_pertandingan`
--

CREATE TABLE `tbl_detail_pertandingan` (
  `id_detail_pertandingan` int(11) NOT NULL,
  `id_pertandingan` int(11) NOT NULL,
  `id_pemain` int(11) NOT NULL,
  `id_tim` int(11) NOT NULL,
  `id_kriteria_turnamen` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_pertandingan`
--

INSERT INTO `tbl_detail_pertandingan` (`id_detail_pertandingan`, `id_pertandingan`, `id_pemain`, `id_tim`, `id_kriteria_turnamen`, `nilai`) VALUES
(61, 8, 2, 2, 42, 2),
(62, 8, 2, 2, 43, 2),
(63, 8, 2, 2, 44, 2),
(64, 8, 2, 2, 45, 2),
(65, 8, 2, 2, 46, 1),
(66, 8, 2, 2, 47, 2),
(67, 8, 2, 2, 48, 2),
(68, 8, 3, 2, 42, 2),
(69, 8, 3, 2, 43, 1),
(70, 8, 3, 2, 44, 1),
(71, 8, 3, 2, 45, 2),
(72, 8, 3, 2, 46, 0),
(73, 8, 3, 2, 47, 3),
(74, 8, 3, 2, 48, 1),
(75, 8, 4, 3, 42, 2),
(76, 8, 4, 3, 43, 2),
(77, 8, 4, 3, 44, 4),
(78, 8, 4, 3, 45, 2),
(79, 8, 4, 3, 46, 1),
(80, 8, 4, 3, 47, 3),
(81, 8, 4, 3, 48, 2),
(82, 8, 27, 3, 42, 1),
(83, 8, 27, 3, 43, 1),
(84, 8, 27, 3, 44, 1),
(85, 8, 27, 3, 45, 2),
(86, 8, 27, 3, 46, 1),
(87, 8, 27, 3, 47, 1),
(88, 8, 27, 3, 48, 3),
(89, 8, 1, 2, 49, 6),
(90, 8, 1, 2, 50, 2),
(91, 8, 1, 2, 51, 0),
(92, 8, 1, 2, 52, 1),
(93, 8, 1, 2, 53, 1),
(94, 8, 1, 2, 54, 0),
(95, 8, 1, 2, 55, 2),
(96, 8, 1, 2, 56, 2),
(97, 8, 1, 2, 57, 3),
(98, 8, 34, 2, 49, 5),
(99, 8, 34, 2, 50, 3),
(100, 8, 34, 2, 51, 1),
(101, 8, 34, 2, 52, 0),
(102, 8, 34, 2, 53, 1),
(103, 8, 34, 2, 54, 0),
(104, 8, 34, 2, 55, 1),
(105, 8, 34, 2, 56, 2),
(106, 8, 34, 2, 57, 3),
(107, 8, 5, 3, 49, 3),
(108, 8, 5, 3, 50, 2),
(109, 8, 5, 3, 51, 0),
(110, 8, 5, 3, 52, 1),
(111, 8, 5, 3, 53, 0),
(112, 8, 5, 3, 54, 1),
(113, 8, 5, 3, 55, 1),
(114, 8, 5, 3, 56, 3),
(115, 8, 5, 3, 57, 3),
(116, 8, 30, 3, 49, 6),
(117, 8, 30, 3, 50, 4),
(118, 8, 30, 3, 51, 1),
(119, 8, 30, 3, 52, 1),
(120, 8, 30, 3, 53, 0),
(121, 8, 30, 3, 54, 0),
(122, 8, 30, 3, 55, 1),
(123, 8, 30, 3, 56, 2),
(124, 8, 30, 3, 57, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria_turnamen`
--

CREATE TABLE `tbl_kriteria_turnamen` (
  `id_kriteria_turnamen` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_turnamen` int(11) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kriteria_turnamen`
--

INSERT INTO `tbl_kriteria_turnamen` (`id_kriteria_turnamen`, `id_kriteria`, `id_turnamen`, `bobot`) VALUES
(42, 1, 4, 25),
(43, 3, 4, 20),
(44, 4, 4, 5),
(45, 5, 4, 10),
(46, 6, 4, 20),
(47, 7, 4, 10),
(48, 8, 4, 10),
(49, 9, 4, 15),
(50, 10, 4, 20),
(51, 11, 4, 10),
(52, 12, 4, 5),
(53, 13, 4, 10),
(54, 14, 4, 20),
(55, 15, 4, 5),
(56, 17, 4, 10),
(57, 18, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_kriteria`
--

CREATE TABLE `tbl_master_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `posisi_kriteria` varchar(15) NOT NULL,
  `tipe_kriteria` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_master_kriteria`
--

INSERT INTO `tbl_master_kriteria` (`id_kriteria`, `nama_kriteria`, `posisi_kriteria`, `tipe_kriteria`) VALUES
(1, 'Gol', 'NON-GK', 'BENEFIT'),
(3, 'Assist', 'NON-GK', 'BENEFIT'),
(4, 'Tembakan ke Gawang', 'NON-GK', 'BENEFIT'),
(5, 'Kartu Kuning', 'NON-GK', 'COST'),
(6, 'Karti Merah', 'NON-GK', 'COST'),
(7, 'Jumlah Protes', 'NON-GK', 'COST'),
(8, 'Pelanggaran', 'NON-GK', 'COST'),
(9, 'Penyelamatan', 'GK', 'BENEFIT'),
(10, 'Kebobolan', 'GK', 'COST'),
(11, 'Gol', 'GK', 'BENEFIT'),
(12, 'Assist', 'GK', 'BENEFIT'),
(13, 'Kartu Kuning', 'GK', 'COST'),
(14, 'Kartu Merah', 'GK', 'COST'),
(15, 'Tendangan ke Gawang', 'GK', 'BENEFIT'),
(17, 'Jumlah Pelanggaran', 'GK', 'COST'),
(18, 'Jumlah Protes', 'GK', 'COST');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_tim`
--

CREATE TABLE `tbl_master_tim` (
  `id_tim` int(11) NOT NULL,
  `nama_tim` varchar(100) NOT NULL,
  `penanggung_jawab` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_master_tim`
--

INSERT INTO `tbl_master_tim` (`id_tim`, `nama_tim`, `penanggung_jawab`, `no_telp`) VALUES
(2, 'Louciver FC', 'Ares', '(0852) 1889-6735'),
(3, 'Sunny-GO', 'Monkey D.Luffy', '(0852) 1100-1100'),
(4, 'klud putra', 'hilmi', '(0812) 1222-22'),
(5, 'satria muda', 'danil lukito', '(0812) 1545-4555'),
(6, 'gajah mada', 'amir ck', '(0342) 6546-6733'),
(7, 'semar fc', 'kaito kip', '(2121) 0082-123'),
(8, 'cahaya', 'supli', '(0812) 1545-458'),
(10, 'cakra', 'saipil', '(2121) 0082-126'),
(11, 'popia', 'jojo', '(2121) 0082-124'),
(12, 'fajar', 'aldi', '(2121) 0082-1269');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemain`
--

CREATE TABLE `tbl_pemain` (
  `id_pemain` int(11) NOT NULL,
  `id_tim` int(11) NOT NULL,
  `nama` char(100) NOT NULL,
  `no_punggung` varchar(3) NOT NULL,
  `posisi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pemain`
--

INSERT INTO `tbl_pemain` (`id_pemain`, `id_tim`, `nama`, `no_punggung`, `posisi`) VALUES
(1, 2, 'Lukito', '34', 'GK'),
(2, 2, 'Amir', '1', 'NON-GK'),
(3, 2, 'Budi', '2', 'NON-GK'),
(4, 3, 'Andre', '9', 'NON-GK'),
(5, 3, 'Santoso', '1', 'GK'),
(6, 7, 'andre', '01', 'NON-GK'),
(7, 7, 'danil', '02', 'NON-GK'),
(8, 7, 'ahmad', '03', 'NON-GK'),
(9, 7, 'hulio', '18', 'NON-GK'),
(10, 7, 'bejo', '09', 'GK'),
(11, 6, 'rizal', '1', 'GK'),
(12, 6, 'dadang', '02', 'NON-GK'),
(13, 6, 'maulana', '27', 'NON-GK'),
(14, 6, 'prasetiya', '88', 'NON-GK'),
(15, 6, 'arif', '87', 'NON-GK'),
(16, 6, 'samsuri', '66', 'GK'),
(17, 5, 'handoyo', '1', 'GK'),
(18, 5, 'mamat', '21', 'NON-GK'),
(19, 5, 'latef', '13', 'NON-GK'),
(20, 5, 'david', '16', 'NON-GK'),
(21, 4, 'ronaldo', '10', 'NON-GK'),
(22, 4, 'tom tom', '12', 'NON-GK'),
(23, 4, 'pogba', '5', 'NON-GK'),
(24, 4, 'sutris', '23', 'NON-GK'),
(25, 4, 'permadi', '1', 'GK'),
(26, 4, 'sengkuni', '99', 'NON-GK'),
(27, 3, 'Hilmi', '66', 'NON-GK'),
(28, 6, 'sukani', '55', 'NON-GK'),
(29, 11, 'panidi', '36', 'NON-GK'),
(30, 3, 'Jojo', '13', 'GK'),
(31, 12, 'michael', '21', 'NON-GK'),
(32, 7, 'mongol', '66', 'NON-GK'),
(33, 5, 'coki pardede', '69', 'NON-GK'),
(34, 2, 'Ronaldo', '11', 'GK'),
(35, 8, 'zaza', '1', 'GK'),
(36, 8, 'ariff', '12', 'NON-GK'),
(37, 8, 'sugeng', '14', 'NON-GK'),
(38, 8, 'tama', '1', 'NON-GK'),
(39, 8, 'hulio', '66', 'NON-GK'),
(40, 8, 'indra', '17', 'NON-GK'),
(41, 10, 'narto', '10', 'GK'),
(42, 10, 'permadi', '18', 'GK'),
(43, 10, 'vicenco', '12', 'NON-GK'),
(44, 10, 'herman', '14', 'NON-GK'),
(45, 10, 'setiyo', '55', 'NON-GK'),
(46, 11, 'Maman Abdurrahman', '4', 'NON-GK'),
(47, 11, 'Braif Fatari', '1', 'NON-GK'),
(48, 11, 'indra', '1', 'NON-GK'),
(49, 11, 'hulio didi', '12', 'GK'),
(50, 11, 'zaza', '15', 'NON-GK'),
(51, 12, 'joko', '1', 'GK'),
(52, 12, 'sutris', '14', 'NON-GK'),
(53, 12, 'putra', '08', 'NON-GK'),
(54, 12, 'subandi', '17', 'NON-GK'),
(55, 12, 'hamzar', '45', 'GK');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pertandingan`
--

CREATE TABLE `tbl_pertandingan` (
  `id_pertandingan` int(11) NOT NULL,
  `id_turnamen` int(11) NOT NULL,
  `tim_satu` varchar(100) NOT NULL,
  `tim_dua` varchar(100) NOT NULL,
  `tgl_pertandingan` date NOT NULL,
  `jam_pertandingan` time NOT NULL,
  `skor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pertandingan`
--

INSERT INTO `tbl_pertandingan` (`id_pertandingan`, `id_turnamen`, `tim_satu`, `tim_dua`, `tgl_pertandingan`, `jam_pertandingan`, `skor`) VALUES
(8, 4, '2', '3', '2021-07-09', '11:20:00', '5 - 4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_turnamen`
--

CREATE TABLE `tbl_turnamen` (
  `id_turnamen` int(11) NOT NULL,
  `nama_turnamen` varchar(200) NOT NULL,
  `tgl_turnamen` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_turnamen`
--

INSERT INTO `tbl_turnamen` (`id_turnamen`, `nama_turnamen`, `tgl_turnamen`) VALUES
(4, 'Contoh Turnamen', '2021-07-06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_turnamen_tim`
--

CREATE TABLE `tbl_turnamen_tim` (
  `id_turnamen_tim` int(11) NOT NULL,
  `id_tim` int(11) NOT NULL,
  `id_turnamen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_turnamen_tim`
--

INSERT INTO `tbl_turnamen_tim` (`id_turnamen_tim`, `id_tim`, `id_turnamen`) VALUES
(1, 2, 4),
(2, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` char(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`) VALUES
(1, 'Joshia TMR', 'jojo', 'jojo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_detail_pertandingan`
--
ALTER TABLE `tbl_detail_pertandingan`
  ADD PRIMARY KEY (`id_detail_pertandingan`),
  ADD KEY `id_pertandingan` (`id_pertandingan`),
  ADD KEY `id_tim` (`id_tim`),
  ADD KEY `id_kriteria_turnamen` (`id_kriteria_turnamen`),
  ADD KEY `tbl_detail_pertandingan_ibfk_2` (`id_pemain`);

--
-- Indexes for table `tbl_kriteria_turnamen`
--
ALTER TABLE `tbl_kriteria_turnamen`
  ADD PRIMARY KEY (`id_kriteria_turnamen`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_turnamen` (`id_turnamen`);

--
-- Indexes for table `tbl_master_kriteria`
--
ALTER TABLE `tbl_master_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tbl_master_tim`
--
ALTER TABLE `tbl_master_tim`
  ADD PRIMARY KEY (`id_tim`);

--
-- Indexes for table `tbl_pemain`
--
ALTER TABLE `tbl_pemain`
  ADD PRIMARY KEY (`id_pemain`),
  ADD KEY `id_tim` (`id_tim`);

--
-- Indexes for table `tbl_pertandingan`
--
ALTER TABLE `tbl_pertandingan`
  ADD PRIMARY KEY (`id_pertandingan`),
  ADD KEY `id_turnamen` (`id_turnamen`);

--
-- Indexes for table `tbl_turnamen`
--
ALTER TABLE `tbl_turnamen`
  ADD PRIMARY KEY (`id_turnamen`);

--
-- Indexes for table `tbl_turnamen_tim`
--
ALTER TABLE `tbl_turnamen_tim`
  ADD PRIMARY KEY (`id_turnamen_tim`),
  ADD KEY `tbl_turnamen_tim_ibfk_1` (`id_tim`),
  ADD KEY `id_turnamen` (`id_turnamen`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_detail_pertandingan`
--
ALTER TABLE `tbl_detail_pertandingan`
  MODIFY `id_detail_pertandingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `tbl_kriteria_turnamen`
--
ALTER TABLE `tbl_kriteria_turnamen`
  MODIFY `id_kriteria_turnamen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_master_kriteria`
--
ALTER TABLE `tbl_master_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_master_tim`
--
ALTER TABLE `tbl_master_tim`
  MODIFY `id_tim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_pemain`
--
ALTER TABLE `tbl_pemain`
  MODIFY `id_pemain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_pertandingan`
--
ALTER TABLE `tbl_pertandingan`
  MODIFY `id_pertandingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_turnamen`
--
ALTER TABLE `tbl_turnamen`
  MODIFY `id_turnamen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_turnamen_tim`
--
ALTER TABLE `tbl_turnamen_tim`
  MODIFY `id_turnamen_tim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_detail_pertandingan`
--
ALTER TABLE `tbl_detail_pertandingan`
  ADD CONSTRAINT `tbl_detail_pertandingan_ibfk_1` FOREIGN KEY (`id_pertandingan`) REFERENCES `tbl_pertandingan` (`id_pertandingan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_pertandingan_ibfk_2` FOREIGN KEY (`id_pemain`) REFERENCES `tbl_pemain` (`id_pemain`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_pertandingan_ibfk_3` FOREIGN KEY (`id_tim`) REFERENCES `tbl_master_tim` (`id_tim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_pertandingan_ibfk_4` FOREIGN KEY (`id_kriteria_turnamen`) REFERENCES `tbl_kriteria_turnamen` (`id_kriteria_turnamen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_kriteria_turnamen`
--
ALTER TABLE `tbl_kriteria_turnamen`
  ADD CONSTRAINT `tbl_kriteria_turnamen_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `tbl_master_kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_kriteria_turnamen_ibfk_2` FOREIGN KEY (`id_turnamen`) REFERENCES `tbl_turnamen` (`id_turnamen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pemain`
--
ALTER TABLE `tbl_pemain`
  ADD CONSTRAINT `tbl_pemain_ibfk_1` FOREIGN KEY (`id_tim`) REFERENCES `tbl_master_tim` (`id_tim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pertandingan`
--
ALTER TABLE `tbl_pertandingan`
  ADD CONSTRAINT `tbl_pertandingan_ibfk_1` FOREIGN KEY (`id_turnamen`) REFERENCES `tbl_turnamen` (`id_turnamen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_turnamen_tim`
--
ALTER TABLE `tbl_turnamen_tim`
  ADD CONSTRAINT `tbl_turnamen_tim_ibfk_1` FOREIGN KEY (`id_tim`) REFERENCES `tbl_master_tim` (`id_tim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_turnamen_tim_ibfk_2` FOREIGN KEY (`id_turnamen`) REFERENCES `tbl_turnamen` (`id_turnamen`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
