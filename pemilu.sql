-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2017 at 12:09 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemilu`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon`
--

CREATE TABLE `calon` (
  `id` int(11) NOT NULL,
  `c_ketua` varchar(200) NOT NULL,
  `cw_ketua` varchar(200) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `foto_ketua` varchar(200) NOT NULL,
  `foto_wakil` varchar(200) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calon`
--

INSERT INTO `calon` (`id`, `c_ketua`, `cw_ketua`, `no_urut`, `foto_ketua`, `foto_wakil`, `visi`, `misi`) VALUES
(13, 'BUKHORI', 'YOGIE AJIE PURNOMO', 1, '37F1E114003.JPG', '72F1E114029.JPG', '', ''),
(14, 'DEDI KURNIAWAN', 'AFDHAL PRATAMA PUTRA', 4, '18F1E114028.JPG', '98F1E114022.JPG', '', ''),
(15, 'WAHYU BUDIMAN', 'ANDRE OKTARI', 3, '100F1E114024.JPG', '70F1E114018.JPG', '', ''),
(16, 'M.RODRIGUES SUMARSONO', 'SATRIA PURNOMO AJI', 2, '21F1E115013.JPG', '45F1E115020.JPG', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pemilih`
--

CREATE TABLE `pemilih` (
  `id` int(11) NOT NULL,
  `nim` varchar(200) NOT NULL,
  `no_pemilih` varchar(200) NOT NULL,
  `angkatan` varchar(200) NOT NULL,
  `prodi` varchar(200) NOT NULL,
  `status_milih` enum('sudah','belum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemilih`
--

INSERT INTO `pemilih` (`id`, `nim`, `no_pemilih`, `angkatan`, `prodi`, `status_milih`) VALUES
(11, 'F1E114002', '445451', '2014', 'Sistem Informasi', 'belum'),
(12, 'F1E114003', '527219', '2014', 'Sistem Informasi', 'sudah'),
(13, 'F1E114004', '502213', '2014', 'Sistem Informasi', 'sudah'),
(14, 'F1E114005', '915619', '2014', 'Sistem Informasi', 'sudah'),
(15, 'F1E114006', '104417', '2014', 'Sistem Informasi', 'sudah'),
(16, 'F1E114009', '964684', '2014', 'Sistem Informasi', 'sudah'),
(17, 'F1E114008', '567920', '2014', 'Sistem Informasi', 'sudah'),
(18, 'F1E114010', '575818', '2014', 'Sistem Informasi', 'sudah'),
(19, 'F1E114011', '604618', '2014', 'Sistem Informasi', 'sudah'),
(20, 'F1E114012', '771891', '2014', 'Sistem Informasi', 'sudah'),
(21, 'F1E114013', '618546', '2014', 'Sistem Informasi', 'sudah'),
(22, 'F1E114014', '551460', '2014', 'Sistem Informasi', 'sudah'),
(23, 'F1E114015', '392422', '2014', 'Sistem Informasi', 'sudah'),
(24, 'F1E114017', '672940', '2014', 'Sistem Informasi', 'sudah'),
(25, 'F1E114018', '913791', '2014', 'Sistem Informasi', 'sudah'),
(26, 'F1E114021', '129732', '2014', 'Sistem Informasi', 'sudah'),
(27, 'F1E114022', '767047', '2014', 'Sistem Informasi', 'sudah'),
(28, 'F1E114023', '746033', '2014', 'Sistem Informasi', 'sudah'),
(29, 'F1E114024', '844774', '2014', 'Sistem Informasi', 'sudah'),
(31, 'F1E114026', '146551', '2014', 'Sistem Informasi', 'sudah'),
(32, 'F1E114028', '286193', '2014', 'Sistem Informasi', 'sudah'),
(33, 'F1E114029', '744260', '2014', 'Sistem Informasi', 'sudah'),
(34, 'F1E114030', '473777', '2014', 'Sistem Informasi', 'sudah'),
(35, 'F1E114031', '327251', '2014', 'Sistem Informasi', 'sudah'),
(36, 'F1E114032', '934932', '2014', 'Sistem Informasi', 'sudah'),
(37, 'F1E114033', '913362', '2014', 'Sistem Informasi', 'sudah'),
(38, 'F1E114035', '278863', '2014', 'Sistem Informasi', 'sudah'),
(39, 'F1E114037', '701916', '2014', 'Sistem Informasi', 'belum'),
(40, 'F1E113002', '234689', '2013', 'Sistem Informasi', 'sudah'),
(41, 'F1E113003', '899183', '2013', 'Sistem Informasi', 'sudah'),
(42, 'F1E113005', '377549', '2013', 'Sistem Informasi', 'sudah'),
(43, 'F1E113006', '329133', '2013', 'Sistem Informasi', 'sudah'),
(44, 'F1E113008', '622788', '2013', 'Sistem Informasi', 'sudah'),
(45, 'F1E113009', '322418', '2013', 'Sistem Informasi', 'sudah'),
(46, 'F1E113010', '751712', '2013', 'Sistem Informasi', 'sudah'),
(47, 'F1E113011', '765849', '2013', 'Sistem Informasi', 'sudah'),
(48, 'F1E113012', '752277', '2013', 'Sistem Informasi', 'sudah'),
(50, 'F1E113014', '156313', '2013', 'Sistem Informasi', 'sudah'),
(53, 'F1E113016', '173945', '2013', 'Sistem Informasi', 'sudah'),
(54, 'F1E114025', '518571', '2014', 'Sistem Informasi', 'sudah'),
(55, 'F1E114016', '582216', '2014', 'Sistem Informasi', 'sudah'),
(57, 'F1E113018', '793480', '2013', 'Sistem Informasi', 'sudah'),
(58, 'F1E113019', '304128', '2013', 'Sistem Informasi', 'sudah'),
(59, 'F1E113020', '136194', '2013', 'Sistem Informasi', 'sudah'),
(60, 'F1E113021', '156943', '2013', 'Sistem Informasi', 'belum'),
(61, 'F1E113023', '479378', '2013', 'Sistem Informasi', 'sudah'),
(62, 'F1E113024', '654258', '2013', 'Sistem Informasi', 'belum'),
(63, 'F1E113025', '737888', '2013', 'Sistem Informasi', 'sudah'),
(64, 'F1E113026', '183880', '2013', 'Sistem Informasi', 'sudah'),
(65, 'F1E113027', '593896', '2013', 'Sistem Informasi', 'sudah'),
(66, 'F1E113028', '225448', '2013', 'Sistem Informasi', 'sudah'),
(67, 'F1E113030', '518334', '2013', 'Sistem Informasi', 'sudah'),
(68, 'F1E113031', '232534', '2013', 'Sistem Informasi', 'sudah');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id` int(11) NOT NULL,
  `nim` varchar(200) NOT NULL,
  `no_pemilih` varchar(200) NOT NULL,
  `pertanyaan` text NOT NULL,
  `status` enum('belum','sudah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `nim`, `no_pemilih`, `pertanyaan`, `status`) VALUES
(58, 'F1E113002', '234689', 'sip		', 'sudah');

-- --------------------------------------------------------

--
-- Table structure for table `suara`
--

CREATE TABLE `suara` (
  `id` int(11) NOT NULL,
  `id_pemilih` varchar(200) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `jumlah_suara` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suara`
--

INSERT INTO `suara` (`id`, `id_pemilih`, `no_urut`, `jumlah_suara`) VALUES
(17, '232534', 1, 1),
(18, '518334', 1, 1),
(19, '225448', 1, 1),
(20, '737888', 1, 1),
(21, '479378', 3, 1),
(22, '136194', 4, 1),
(23, '793480', 1, 1),
(24, '751712', 1, 1),
(25, '329133', 3, 1),
(26, '327251', 1, 1),
(27, '913362', 1, 1),
(28, '934932', 1, 1),
(29, '473777', 1, 1),
(30, '286193', 3, 1),
(31, '744260', 1, 1),
(32, '844774', 3, 1),
(33, '746033', 1, 1),
(34, '129732', 1, 1),
(35, '913791', 1, 1),
(36, '392422', 1, 1),
(37, '551460', 1, 1),
(38, '771891', 1, 1),
(39, '567920', 1, 1),
(40, '915619', 1, 1),
(41, '502213', 1, 1),
(42, '964684', 1, 1),
(43, '575818', 3, 1),
(44, '618546', 1, 1),
(45, '527219', 1, 1),
(46, '518571', 3, 1),
(49, '234689', 2, 1),
(50, '899183', 3, 1),
(51, '377549', 3, 1),
(52, '622788', 1, 1),
(53, '322418', 4, 1),
(54, '765849', 3, 1),
(55, '752277', 2, 1),
(56, '156313', 3, 1),
(57, '173945', 3, 1),
(58, '304128', 4, 1),
(59, '183880', 4, 1),
(60, '593896', 4, 1),
(61, '604618', 2, 1),
(62, '582216', 3, 1),
(63, '672940', 4, 1),
(64, '767047', 4, 1),
(65, '146551', 4, 1),
(66, '278863', 3, 1),
(67, '104417', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `level` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `fullname`, `email`, `level`) VALUES
(1, 'wahyu', '32c9e71e866ecdbc93e497482aa6779f', 'Wahyu Budiman', 'wahyubudimanstt@gmail.com', 'Super');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon`
--
ALTER TABLE `calon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemilih`
--
ALTER TABLE `pemilih`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_pemilih` (`no_pemilih`);

--
-- Indexes for table `suara`
--
ALTER TABLE `suara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calon`
--
ALTER TABLE `calon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pemilih`
--
ALTER TABLE `pemilih`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `suara`
--
ALTER TABLE `suara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
