-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2022 at 04:19 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffe-ciremai`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_bahan` varchar(125) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` varchar(15) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahan`, `id_user`, `nama_bahan`, `deskripsi`, `harga`, `stok`) VALUES
(1, 1, 'Biji Kopi Robusta', 'Coffea Canephora', '25000', 47),
(2, 5, 'Biji Kopi Arabika', 'Coffea Arabica', '30000', 8),
(3, 1, 'Biji Kopi Ekspreso', 'Ekspreso', '30000', 80),
(5, 5, 'Gula Merah', 'Brown Sugar Premium', '14000', 39),
(6, 5, 'Susu Creamer', 'Full Cream Ultra', '17000', 17);

-- --------------------------------------------------------

--
-- Table structure for table `bahan_dkeluar`
--

CREATE TABLE `bahan_dkeluar` (
  `id_dkeluar` int(11) NOT NULL,
  `id_dmasuk` int(11) NOT NULL,
  `tgl_keluar` varchar(15) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `qty_kel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_dkeluar`
--

INSERT INTO `bahan_dkeluar` (`id_dkeluar`, `id_dmasuk`, `tgl_keluar`, `time`, `qty_kel`) VALUES
(1, 3, '2022-05-09', '2022-05-09 02:18:15', 2);

-- --------------------------------------------------------

--
-- Table structure for table `bahan_dmasuk`
--

CREATE TABLE `bahan_dmasuk` (
  `id_dmasuk` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `stokd` int(11) NOT NULL,
  `tgl_masuk` varchar(15) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_dmasuk`
--

INSERT INTO `bahan_dmasuk` (`id_dmasuk`, `id_detail`, `stokd`, `tgl_masuk`, `time`) VALUES
(1, 1, 5, '2022-05-09', '2022-05-09 02:14:38'),
(2, 2, 3, '2022-05-09', '2022-05-09 02:14:38'),
(3, 3, 10, '2022-05-09', '2022-05-09 02:15:05'),
(4, 4, 5, '2022-05-09', '2022-05-09 02:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_jadi`
--

CREATE TABLE `bahan_jadi` (
  `id_bahan_jadi` int(11) NOT NULL,
  `nm_bhn_jd` varchar(125) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` varchar(15) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_jadi`
--

INSERT INTO `bahan_jadi` (`id_bahan_jadi`, `nm_bhn_jd`, `deskripsi`, `harga`, `stok`) VALUES
(1, 'Bubuk Kopi Arabika', 'Arabika coffe', '65000', 8),
(2, 'Bubuk Coffe Robusta', 'Robusta Coffe', '70000', 8),
(3, 'Bubuk Coffe Ekspreso', 'Ekspreso Coffe', '80000', 10);

-- --------------------------------------------------------

--
-- Table structure for table `bahan_pkeluar`
--

CREATE TABLE `bahan_pkeluar` (
  `id_pkeluar` int(11) NOT NULL,
  `id_pmasuk` int(11) NOT NULL,
  `tgl_keluar` varchar(15) NOT NULL,
  `stokpk` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_pkeluar`
--

INSERT INTO `bahan_pkeluar` (`id_pkeluar`, `id_pmasuk`, `tgl_keluar`, `stokpk`, `time`) VALUES
(1, 1, '2022-05-09', 2, '2022-05-09 02:06:26'),
(2, 3, '2022-05-09', 1, '2022-05-09 02:06:37'),
(3, 2, '2022-05-09', 6, '2022-05-09 02:06:46');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_pmasuk`
--

CREATE TABLE `bahan_pmasuk` (
  `id_pmasuk` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `tgl_masuk` varchar(15) NOT NULL,
  `stokp` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_pmasuk`
--

INSERT INTO `bahan_pmasuk` (`id_pmasuk`, `id_detail`, `tgl_masuk`, `stokp`, `time`) VALUES
(1, 3, '2022-05-09', 3, '2022-05-09 02:05:51'),
(2, 4, '2022-05-09', 11, '2022-05-09 02:05:51'),
(3, 5, '2022-05-09', 2, '2022-05-09 02:05:51'),
(4, 1, '2022-05-09', 3, '2022-05-09 02:05:57'),
(5, 2, '2022-05-09', 20, '2022-05-09 02:05:57');

-- --------------------------------------------------------

--
-- Table structure for table `detail_tdistributor`
--

CREATE TABLE `detail_tdistributor` (
  `id_detail` int(11) NOT NULL,
  `id_tdistributor` varchar(30) NOT NULL,
  `id_bahan_jadi` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_tdistributor`
--

INSERT INTO `detail_tdistributor` (`id_detail`, `id_tdistributor`, `id_bahan_jadi`, `qty`) VALUES
(1, '20220509L7X1BM4G', 1, 5),
(2, '20220509L7X1BM4G', 3, 3),
(3, '20220509MRGDH5T6', 2, 12),
(4, '20220509MRGDH5T6', 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `detail_tpabrik`
--

CREATE TABLE `detail_tpabrik` (
  `id_detail` int(11) NOT NULL,
  `id_tpabrik` varchar(30) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_tpabrik`
--

INSERT INTO `detail_tpabrik` (`id_detail`, `id_tpabrik`, `id_bahan`, `qty`) VALUES
(1, '20220509A8GUJVH3', 1, 3),
(2, '20220509A8GUJVH3', 3, 20),
(3, '20220509RZYJCMHL', 2, 5),
(4, '20220509RZYJCMHL', 5, 17),
(5, '20220509RZYJCMHL', 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_distributor`
--

CREATE TABLE `transaksi_distributor` (
  `id_tdistributor` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_order` varchar(15) NOT NULL,
  `total_bayar` varchar(15) NOT NULL,
  `status_order` int(11) NOT NULL,
  `bukti_pembayaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_distributor`
--

INSERT INTO `transaksi_distributor` (`id_tdistributor`, `id_user`, `tgl_order`, `total_bayar`, `status_order`, `bukti_pembayaran`) VALUES
('20220509L7X1BM4G', 4, '2022-05-09', '565000', 4, 'gambar.gif'),
('20220509MRGDH5T6', 6, '2022-05-09', '1240000', 4, 'download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pabrik`
--

CREATE TABLE `transaksi_pabrik` (
  `id_tpabrik` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_order` varchar(20) NOT NULL,
  `total_bayar` varchar(20) NOT NULL,
  `status_order` int(11) NOT NULL,
  `bukti_pembayaran` text NOT NULL,
  `supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_pabrik`
--

INSERT INTO `transaksi_pabrik` (`id_tpabrik`, `id_user`, `tgl_order`, `total_bayar`, `status_order`, `bukti_pembayaran`, `supplier`) VALUES
('20220509A8GUJVH3', 2, '2022-05-09', '675000', 4, 'download1.jpg', 1),
('20220509RZYJCMHL', 2, '2022-05-09', '439000', 4, 'download.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(125) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat`, `no_hp`, `username`, `password`, `level_user`) VALUES
(1, 'Yayan Ahmad', 'Kuningan, Jawa Barat', '085156727368', 'supplier', 'supplier', 1),
(2, 'maman', 'ciawigebang', '085156727368', 'pabrik', 'pabrik', 2),
(4, 'distributor', 'Cigadung Kuningan', '08987654678', 'distributor', 'distributor', 3),
(5, 'Dahlan Sadikin', 'Cilebak, Kuningan', '089765678765', 'supplier2', 'supplier2', 1),
(6, 'distributor2', 'distributor2', '087894653425', 'distributor2', 'distributor2', 3),
(7, 'Pemilik', 'Cigugur Kab Kuningan', '0897654345652', 'pemilik', 'pemilik', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `bahan_dkeluar`
--
ALTER TABLE `bahan_dkeluar`
  ADD PRIMARY KEY (`id_dkeluar`);

--
-- Indexes for table `bahan_dmasuk`
--
ALTER TABLE `bahan_dmasuk`
  ADD PRIMARY KEY (`id_dmasuk`);

--
-- Indexes for table `bahan_jadi`
--
ALTER TABLE `bahan_jadi`
  ADD PRIMARY KEY (`id_bahan_jadi`);

--
-- Indexes for table `bahan_pkeluar`
--
ALTER TABLE `bahan_pkeluar`
  ADD PRIMARY KEY (`id_pkeluar`);

--
-- Indexes for table `bahan_pmasuk`
--
ALTER TABLE `bahan_pmasuk`
  ADD PRIMARY KEY (`id_pmasuk`);

--
-- Indexes for table `detail_tdistributor`
--
ALTER TABLE `detail_tdistributor`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `detail_tpabrik`
--
ALTER TABLE `detail_tpabrik`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `transaksi_distributor`
--
ALTER TABLE `transaksi_distributor`
  ADD PRIMARY KEY (`id_tdistributor`);

--
-- Indexes for table `transaksi_pabrik`
--
ALTER TABLE `transaksi_pabrik`
  ADD PRIMARY KEY (`id_tpabrik`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bahan_dkeluar`
--
ALTER TABLE `bahan_dkeluar`
  MODIFY `id_dkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bahan_dmasuk`
--
ALTER TABLE `bahan_dmasuk`
  MODIFY `id_dmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bahan_jadi`
--
ALTER TABLE `bahan_jadi`
  MODIFY `id_bahan_jadi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bahan_pkeluar`
--
ALTER TABLE `bahan_pkeluar`
  MODIFY `id_pkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bahan_pmasuk`
--
ALTER TABLE `bahan_pmasuk`
  MODIFY `id_pmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_tdistributor`
--
ALTER TABLE `detail_tdistributor`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_tpabrik`
--
ALTER TABLE `detail_tpabrik`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
