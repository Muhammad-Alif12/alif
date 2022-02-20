-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 20, 2022 at 10:41 PM
-- Server version: 10.2.41-MariaDB-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manz4648_alif`
--

-- --------------------------------------------------------

--
-- Table structure for table `layanan_konsolidasi`
--

CREATE TABLE `layanan_konsolidasi` (
  `id` int(20) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `tujuan_konsolidasi` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'BELUM PROSES',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ket_pemohon` text DEFAULT NULL,
  `nama_pegawai` varchar(50) DEFAULT NULL,
  `feedback_capil` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan_konsolidasi`
--

INSERT INTO `layanan_konsolidasi` (`id`, `nik`, `nama`, `no_hp`, `tujuan_konsolidasi`, `status`, `created_at`, `ket_pemohon`, `nama_pegawai`, `feedback_capil`) VALUES
(1, '123', 'oioi', '123', 'ASURANSI', 'SEDANG PROSES', '2022-02-14 16:22:21', NULL, NULL, NULL),
(2, '123', 'oioi', '123', 'BPJS', 'BELUM PROSES', '2022-02-14 16:22:21', NULL, NULL, NULL),
(3, '7322032308760002', 'MUH. ILYAS', '081111', 'PAJAK', 'BELUM PROSES', '2022-02-15 01:07:40', NULL, NULL, NULL),
(4, '1803055212820004', 'H. ABD. RAJAB YATO', '123', 'ASURANSI', 'BELUM PROSES', '2022-02-16 09:09:23', NULL, NULL, NULL),
(5, '7322032308760002', 'WATI', '123', 'PAJAK', 'BELUM PROSES', '2022-02-16 09:11:08', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `layanan_umum`
--

CREATE TABLE `layanan_umum` (
  `id` int(20) NOT NULL,
  `jenis_layanan` varchar(20) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'BELUM PROSES',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `file` text DEFAULT NULL,
  `ket_pemohon` text DEFAULT NULL,
  `nama_pegawai` varchar(50) DEFAULT NULL,
  `feedback_capil` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan_umum`
--

INSERT INTO `layanan_umum` (`id`, `jenis_layanan`, `nik`, `nama`, `no_hp`, `status`, `created_at`, `file`, `ket_pemohon`, `nama_pegawai`, `feedback_capil`) VALUES
(6, 'KTP', '123', 'oioi', '123', 'DITOLAK', '2022-02-14 16:22:41', '', '', 'CAPIL CAPIL', 'bagus kali'),
(11, 'ktp', '7322032308760002', 'MUH. NAMRI NAWIR', '123', 'TELAH DISERAHKAN', '2022-02-14 17:06:34', '', '', 'MUH ALIF KARYA MULA', 'bagus kali'),
(16, 'ktp', '7322032308760002', 'H. ABD. RAJAB YATO', '081111', 'SEDANG PROSES', '2022-02-14 17:10:23', '', '', 'MUH ALIF KARYA MULA', '-'),
(17, 'kk', '7322032308760002', 'MUH. NAMRI NAWIR', '123', 'BELUM PROSES', '2022-02-14 17:12:19', '', '', '', ''),
(18, 'kk', '7322032308760002', 'WATI', '081111', 'BELUM PROSES', '2022-02-14 17:12:48', '', '', '', ''),
(19, 'kia', '7322032308760002', 'WATI', '123', 'BELUM PROSES', '2022-02-14 17:14:14', '', '', '', ''),
(20, 'ktp', '7322032308760002', 'WATI', '123', 'BELUM PROSES', '2022-02-14 17:15:38', '-', '', '', ''),
(21, '', '', '', '', 'BELUM PROSES', '2022-02-14 17:18:05', '-', '', '', ''),
(22, 'ktp', '7322032308760002', 'WATI', '123', 'BELUM PROSES', '2022-02-14 17:20:39', 'gambar/Laksamana_Keumala_Hayat', '', '', ''),
(23, 'kia', '7322032308760002', 'WATI', '123', 'BELUM PROSES', '2022-02-14 17:21:48', 'gambar/Laksamana_Keumala_Hayati.jpg', '', '', ''),
(24, 'KIA', '7322032308760002', 'WATI', '123456', 'SELESAI', '2022-02-16 13:45:17', 'gambar/7.png', '', '', ''),
(25, 'KK', '2312313123', 'muh alif karya mula', '21313131', 'BELUM PROSES', '2022-02-16 14:02:38', 'gambar/WhatsApp Image 2022-01-30 at 18.36.33.jpeg', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(150) DEFAULT NULL,
  `last_name` varchar(150) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'muh alif', 'karya mula', 'alif@gmail.com', '$2y$10$Ca8WCshEwhz8geJmqCvzVO50KJyQnV2FpvI5XcEvFxBPAP0ob2UZu'),
(2, 'muh', 'yahya', 'yahya@gmail.com', '$2y$10$yxGLMhPzYGiUrhVCXhXB9euGFVotH.PuziagDsck3e8opCePfMub.'),
(3, 'capil', 'capil', 'capil@gmail.com', '$2y$10$E6cmWNoplPA4i9abMYAn8e2PTNqIBqaSzY0omyrgBWnuwVUp.X3fW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `layanan_konsolidasi`
--
ALTER TABLE `layanan_konsolidasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan_umum`
--
ALTER TABLE `layanan_umum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `layanan_konsolidasi`
--
ALTER TABLE `layanan_konsolidasi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `layanan_umum`
--
ALTER TABLE `layanan_umum`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
