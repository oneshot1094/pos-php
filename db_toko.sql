-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 06, 2022 at 08:22 PM
-- Server version: 10.5.15-MariaDB-0+deb11u1
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `merk` varchar(255) NOT NULL,
  `harga_beli` varchar(255) NOT NULL,
  `harga_jual` varchar(255) NOT NULL,
  `satuan_barang` varchar(255) NOT NULL,
  `stok` text NOT NULL,
  `tgl_input` varchar(255) NOT NULL,
  `tgl_update` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `id_barang`, `id_kategori`, `id_supplier`, `nama_barang`, `merk`, `harga_beli`, `harga_jual`, `satuan_barang`, `stok`, `tgl_input`, `tgl_update`) VALUES
(2, 'BR002', 5, 3, 'Sabun', 'Lifeboy', '1800', '3000', 'PCS', '102', '6 October 2020, 0:41', '6 October 2020, 0:54'),
(4, 'BR004', 5, 4, 'Shampo', 'Pantene', '350', '500', 'PCS', '63', '19 September 2022, 22:49', '19 September 2022, 23:03');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `tgl_input`) VALUES
(1, 'ATK', '7 May 2017, 10:23'),
(5, 'Sabun', '7 May 2017, 10:28'),
(6, 'Snack', '6 October 2020, 0:19'),
(7, 'Minuman', '6 October 2020, 0:20');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` char(32) NOT NULL,
  `id_member` int(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `user`, `pass`, `id_member`, `role`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 1, 1),
(2, 'kasir', 'c7911af3adbd12a035b289556d96470a', 2, 2),
(6, 'pimpinan', '827ccb0eea8a706c4c34a16891f84e7b', 6, 3),
(7, 'kasirdua', '202cb962ac59075b964b07152d234b70', 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nm_member` varchar(255) NOT NULL,
  `alamat_member` text NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gambar` text NOT NULL,
  `NIK` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nm_member`, `alamat_member`, `telepon`, `email`, `gambar`, `NIK`) VALUES
(1, 'Fauzan Falah', 'uj harapan', '089618173609', 'fauzanfalah21@gmail.com', '1665008121post-it-note-1gr38qq.jpg', '12314121'),
(2, 'kasir', 'bekasi', '08123443212', 'kasir@gmail.com', '1665062027kasir.jpg', '1234554321'),
(6, 'Pimpinan', 'pimpinan', '0811111', 'pimpinan@gmail.com', '1665061496gov.jpg', '12345'),
(7, 'Kasir Dua', 'bekasi', '1234567', 'kasirdua@gmail.com', '1665062088jalan-santai-2.jpg', '54321');

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  `periode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id_nota`, `id_barang`, `id_member`, `id_pelanggan`, `jumlah`, `total`, `tanggal_input`, `periode`) VALUES
(1, 'BR001', 1, 0, '4', '12000', '6 October 2020, 0:45', '10-2020'),
(2, 'BR001', 1, 0, '4', '12000', '6 October 2020, 0:45', '10-2020'),
(3, 'BR001', 1, 0, '4', '12000', '6 October 2020, 0:45', '10-2020'),
(4, 'BR001', 1, 0, '4', '12000', '6 October 2020, 0:45', '10-2020'),
(5, 'BR001', 1, 0, '2', '6000', '6 October 2020, 0:49', '10-2020'),
(6, 'BR001', 1, 0, '2', '6000', '6 October 2020, 0:49', '10-2020'),
(7, 'BR001', 1, 0, '2', '6000', '6 October 2020, 1:15', '10-2020'),
(8, 'BR002', 1, 0, '2', '6000', '6 October 2020, 1:17', '10-2020'),
(9, 'BR001', 1, 0, '2', '6000', '6 October 2020, 1:20', '10-2020'),
(10, 'BR004', 2, 3, '9', '4500', '6 October 2022, 5:32', '10-2022'),
(11, 'BR004', 2, 3, '9', '4500', '6 October 2022, 5:32', '10-2022'),
(12, 'BR004', 2, 3, '9', '4500', '6 October 2022, 5:32', '10-2022'),
(13, 'BR004', 2, 3, '1', '500', '6 October 2022, 6:16', '10-2022');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL,
  `alamat_pelanggan` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `tgl_input`, `alamat_pelanggan`, `telepon`) VALUES
(2, 'Sasa', '6 October 2022, 5:14', 'Bekasi', '08767889782'),
(3, 'Sinta', '6 October 2022, 5:53', 'Bekasi', '08989876745'),
(4, 'Budi', '6 October 2022, 20:07', 'Jakarta', '0812345');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_barang`, `id_member`, `id_pelanggan`, `jumlah`, `total`, `tanggal_input`) VALUES
(25, 'BR004', 2, 3, '1', '500', '6 October 2022, 6:16');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL,
  `alamat_supplier` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `tgl_input`, `alamat_supplier`, `telepon`) VALUES
(3, 'unilever', '19 September 2022, 22:45', 'Jakarta', '0811111111'),
(4, 'Unilever 2', '19 September 2022, 23:03', 'Bekasi', '0899976856'),
(5, 'Jhonsons', '19 September 2022, 23:43', 'Cikarang', '08989849839'),
(6, 'Jhonson 2', '19 September 2022, 23:44', 'Bogor', '090987485'),
(7, 'Unilever 3', '20 September 2022, 8:55', 'Bekasi Timur', '08988873232');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `alamat_toko` text NOT NULL,
  `tlp` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat_toko`, `tlp`, `nama_pemilik`) VALUES
(1, 'CV Daruttaqwa', 'Jl. Ujung Harapan Kav. Daruttaqwa RT 005/014 No.47, Kab. Bekasi ', '089618173609', 'Fauzan Falah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;