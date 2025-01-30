-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2025 at 06:27 PM
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
-- Database: `toko_sembako`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `gambar`) VALUES
(1, 'Kebutuhan Pokok', 'assets/img/etalase/bahan pokok.png'),
(2, 'Bumbu Dapur', 'assets/img/etalase/bumbu dapur.png'),
(3, 'Minuman', 'assets/img/etalase/minuman.png'),
(4, 'Lain-Lain', 'assets/img/etalase/sabun.png');

--
-- Triggers `kategori`
--
DELIMITER $$
CREATE TRIGGER `before_insert_kategori` BEFORE INSERT ON `kategori` FOR EACH ROW BEGIN
  DECLARE last_id INT;
  SET last_id = (SELECT COALESCE(MAX(id), 0) FROM kategori);
  
  IF last_id >= 0 THEN
    SET NEW.id = last_id + 1;
  ELSE
    SET NEW.id = 1; -- Atau sesuai kebutuhan kamu
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `ketersediaan_produk` enum('habis','tersedia') DEFAULT 'tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `nama`, `harga`, `foto`, `ketersediaan_produk`) VALUES
(1, 1, 'Minyak Goreng Mini', 6000, 'assets/img/produk/minyak.png', 'tersedia'),
(2, 1, 'Tepung Terigu 1/4', 3000, 'assets/img/produk/tepung.png', 'tersedia'),
(3, 1, 'Beras Premium 1kg', 15000, 'assets/img/produk/beras.png', 'tersedia'),
(4, 1, 'Gula Merah 1/4', 6000, 'assets/img/produk/gula merah.png', 'tersedia'),
(5, 1, 'Gas Melon', 25000, 'assets/img/produk/lgp.png', 'tersedia'),
(6, 1, 'Gula Pasir 1kg', 18000, 'assets/img/produk/gula pasir.png', 'tersedia'),
(7, 1, 'Telur Ayam 1/4', 9000, 'assets/img/produk/telur.png', 'tersedia'),
(8, 1, 'Mie Instan', 4000, 'assets/img/produk/mie instan.png', 'tersedia'),
(9, 2, 'Kecap Manis Mini Sc', 1000, 'assets/img/produk/kecap.png', 'tersedia'),
(10, 2, 'Saos Tomat', 8500, 'assets/img/produk/saos.png', 'tersedia'),
(11, 2, 'Bubuk Cabe', 1500, 'assets/img/produk/cabai bubuk.png', 'tersedia'),
(12, 2, 'Kaldu Instan', 500, 'assets/img/produk/kaldu.png', 'tersedia'),
(13, 2, 'Sambal Terasi', 2000, 'assets/img/produk/sambal terasi.png', 'tersedia'),
(14, 2, 'Merica Bubuk', 1000, 'assets/img/produk/ladaku.png', 'tersedia'),
(15, 2, 'Garam Halus', 4000, 'assets/img/produk/garam.png', 'tersedia'),
(16, 2, 'Santan Kara', 4000, 'assets/img/produk/santan kara.png', 'tersedia'),
(17, 3, 'Aqua Botol Besar', 6000, 'assets/img/produk/aqua.png', 'tersedia'),
(18, 3, 'Teh Tong Tji Wuwur', 5000, 'assets/img/produk/Tong tji wuwur.png', 'tersedia'),
(19, 3, 'Jahe Wangi Bubuk', 1000, 'assets/img/produk/Jahe Wangi.png', 'tersedia'),
(20, 3, 'Kopi Kapal Api Sc', 2000, 'assets/img/produk/kopi hitam.png', 'tersedia'),
(21, 3, 'Susu Coklat', 2000, 'assets/img/produk/susu.png', 'tersedia'),
(22, 3, 'Energen Kacang Hijau', 2000, 'assets/img/produk/energen kacang hijau.png', 'tersedia'),
(23, 3, 'Segar Dingin Sc', 1000, 'assets/img/produk/segar dingin.png', 'tersedia'),
(24, 3, 'Susu Milo Sachet', 2000, 'assets/img/produk/susu_milo.png', 'tersedia'),
(25, 3, 'Teh Tong Tji Celup', 3000, 'assets/img/produk/1.png', 'tersedia'),
(26, 2, 'Ketumbar Bubuk Indofood', 1000, 'assets/img/produk/2.png', 'tersedia'),
(27, 3, 'White Coffe Sc', 2000, 'assets/img/produk/3.png', 'tersedia'),
(28, 3, 'Susu Putih Sc', 2000, 'assets/img/produk/4.png', 'tersedia'),
(29, 3, 'Tora Cafee Choco', 2000, 'assets/img/produk/5.png', 'tersedia'),
(30, 4, 'Sabun Nuvo', 3500, 'assets/img/produk/canva (7).png', 'tersedia'),
(31, 4, 'Obat Nyamuk KingKong', 5500, 'assets/img/produk/canva (8).png', 'tersedia'),
(32, 4, 'Sabun Lifebuoy', 3500, 'assets/img/produk/canva (4).png', 'tersedia'),
(33, 4, 'Charm Body Fit', 2000, 'assets/img/produk/canva (1).png', 'tersedia'),
(34, 4, 'Charm Cooling Fresh', 2000, 'assets/img/produk/canva (2).png', 'tersedia'),
(35, 4, 'Charm Night', 3000, 'assets/img/produk/canva (3).png', 'tersedia'),
(36, 4, 'Protex', 2000, 'assets/img/produk/canva (15).png', 'tersedia'),
(37, 4, 'Sabun Cuci Piring Ekonomi', 4000, 'assets/img/produk/canva (9).png', 'tersedia'),
(38, 4, 'Sabun Cuci Piring Sunlight', 2000, 'assets/img/produk/canva (14).png', 'tersedia'),
(39, 4, 'Detergen Bubuk Rinso', 1000, 'assets/img/produk/canva (13).png', 'tersedia'),
(40, 4, 'Pelembut Pakaian', 500, 'assets/img/produk/canva (10).png', 'tersedia'),
(41, 4, 'Detergen Liquid SoKlin', 500, 'assets/img/produk/canva (12).png', 'tersedia'),
(42, 4, 'Soffel Anti Nyamuk', 500, 'assets/img/produk/canva (11).png', 'tersedia'),
(43, 4, 'Sabun Colek Ekonomi', 2500, 'assets/img/produk/canva (6).png', 'tersedia'),
(44, 4, 'Plastik Boyo 1Kg', 5000, 'assets/img/produk/canva (5).png', 'tersedia'),
(45, 4, 'Shampo Sc 2pcs', 1000, 'assets/img/produk/Desain tanpa judul (1).png', 'tersedia'),
(46, 4, 'MSG Moto Mobil Mini', 2000, 'assets/img/produk/Desain tanpa judul (3).png', 'tersedia'),
(47, 4, 'MSG Moto Mobil ', 3000, 'assets/img/produk/Desain tanpa judul (2).png', 'tersedia');

--
-- Triggers `produk`
--
DELIMITER $$
CREATE TRIGGER `before_insert_produk` BEFORE INSERT ON `produk` FOR EACH ROW BEGIN
  DECLARE last_id INT;
  SET last_id = (SELECT COALESCE(MAX(id), 0) FROM produk);
  
  IF last_id >= 0 THEN
    SET NEW.id = last_id + 1;
  ELSE
    SET NEW.id = 1; -- Atau sesuai kebutuhan kamu
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES
(1001, 'nistighfareta@gmail.com', 'nb_laaa', 'Admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`),
  ADD KEY `kategori_produk` (`kategori_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1015;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori_produk` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
