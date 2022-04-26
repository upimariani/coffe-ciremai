-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 01:53 AM
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
  `nama_bahan` varchar(125) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` varchar(15) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahan`, `nama_bahan`, `deskripsi`, `harga`, `stok`) VALUES
(4, 'Coffe Signature', 'Coffe Asli Produk Coffe Ciremai ', '25000', 8);

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
(2, 'Coffe V60', 'Coffe version dark', '25000', 102);

-- --------------------------------------------------------

--
-- Table structure for table `bahan_pkeluar`
--

CREATE TABLE `bahan_pkeluar` (
  `id_pkeluar` int(11) NOT NULL,
  `id_pmasuk` int(11) NOT NULL,
  `id_bahan_jadi` int(11) NOT NULL,
  `qty_bj` int(11) NOT NULL,
  `tgl_keluar` varchar(15) NOT NULL,
  `stokpk` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_pkeluar`
--

INSERT INTO `bahan_pkeluar` (`id_pkeluar`, `id_pmasuk`, `id_bahan_jadi`, `qty_bj`, `tgl_keluar`, `stokpk`, `time`) VALUES
(1, 1, 2, 2, '2022-04-26', 1, '2022-04-26 15:14:26'),
(2, 1, 2, 4, '2022-04-26', 1, '2022-04-26 15:17:19'),
(3, 2, 2, 4, '2022-04-26', 2, '2022-04-26 15:38:27'),
(4, 2, 2, 6, '2022-04-26', 1, '2022-04-26 15:39:09'),
(5, 2, 2, 2, '2022-04-26', 1, '2022-04-26 15:41:02'),
(6, 2, 2, 3, '2022-04-26', 1, '2022-04-26 15:43:59'),
(7, 2, 2, 1, '2022-04-26', 1, '2022-04-26 15:45:32'),
(8, 2, 2, 2, '2022-04-26', 1, '2022-04-26 15:46:32');

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
(1, 4, '2022-04-26', 0, '2022-04-26 13:46:05'),
(2, 2, '2022-04-26', 5, '2022-04-26 13:52:04');

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
(1, '20220426SXOHF1CL', 4, 4),
(2, '202204265JPH1FLQ', 4, 12),
(3, '20220426KD5CEINY', 4, 2),
(4, '202204262AFTQI7K', 4, 2);

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
  `bukti_pembayaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_pabrik`
--

INSERT INTO `transaksi_pabrik` (`id_tpabrik`, `id_user`, `tgl_order`, `total_bayar`, `status_order`, `bukti_pembayaran`) VALUES
('202204262AFTQI7K', 2, '2022-04-26', '50000', 4, '20170910027UpiMariani.jpg'),
('202204265JPH1FLQ', 2, '2022-04-26', '300000', 4, 'download.jpg'),
('20220426KD5CEINY', 2, '2022-04-26', '50000', 0, ''),
('20220426SXOHF1CL', 2, '2022-04-26', '100000', 0, '');

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
(1, 'admin', 'Kuningan, Jawa Barat', '085156727368', 'admin', 'admin', 1),
(2, 'maman', 'ciawigebang', '085156727368', 'pabrik', 'pabrik', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahan`);

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
-- Indexes for table `detail_tpabrik`
--
ALTER TABLE `detail_tpabrik`
  ADD PRIMARY KEY (`id_detail`);

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
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bahan_jadi`
--
ALTER TABLE `bahan_jadi`
  MODIFY `id_bahan_jadi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bahan_pkeluar`
--
ALTER TABLE `bahan_pkeluar`
  MODIFY `id_pkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bahan_pmasuk`
--
ALTER TABLE `bahan_pmasuk`
  MODIFY `id_pmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_tpabrik`
--
ALTER TABLE `detail_tpabrik`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
