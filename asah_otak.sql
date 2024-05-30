-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 03:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asah_otak`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_kata`
--

CREATE TABLE `master_kata` (
  `id` int(11) NOT NULL,
  `kata` varchar(255) NOT NULL,
  `clue` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_kata`
--

INSERT INTO `master_kata` (`id`, `kata`, `clue`) VALUES
(1, 'mati', 'kembali ke yang maha kuasa'),
(2, 'tari', 'gerak badan secara berirama'),
(3, 'buku', 'himpunan lembar yang mengandung tulisan'),
(4, 'mata', 'bagain tubuh untuk melihat'),
(5, 'gorden', 'kain untuk menutupi jendela untuk menghalangi cahaya'),
(6, 'rumah', 'tempat tinggal'),
(7, 'pecah', 'kaca jika terjatuh'),
(8, 'kolam', 'perairan di daratan yang lebih kecil dari danau'),
(9, 'pensil', 'alat untuk menulis yang isinya terbuat dari karbon'),
(10, 'laptop', 'komputer yang bisa dibawa dengan mudah'),
(11, 'kertas', 'media untuk menulis'),
(12, 'kantor', 'tempat kerja'),
(13, 'sisir', 'alat unutk merpikan rambut'),
(14, 'putih', 'gabungan seluruh warna');

-- --------------------------------------------------------

--
-- Table structure for table `point_game`
--

CREATE TABLE `point_game` (
  `id_point` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `total_point` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `point_game`
--

INSERT INTO `point_game` (`id_point`, `nama_user`, `total_point`, `tanggal`, `waktu_selesai`) VALUES
(2, 'rahman', 2, '2024-05-30', '14:39:21'),
(3, 'rahman', 2, '2024-05-30', '19:42:41'),
(4, 'rahman', 2, '2024-05-30', '19:47:56'),
(5, 'rahman', 18, '2024-05-30', '19:53:43'),
(6, 'Fikri sandes', 16, '2024-05-30', '20:23:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_kata`
--
ALTER TABLE `master_kata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `point_game`
--
ALTER TABLE `point_game`
  ADD PRIMARY KEY (`id_point`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_kata`
--
ALTER TABLE `master_kata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `point_game`
--
ALTER TABLE `point_game`
  MODIFY `id_point` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
