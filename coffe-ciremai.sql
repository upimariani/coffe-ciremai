-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Okt 2022 pada 04.49
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahanbaku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nm_bahanbaku` varchar(125) NOT NULL,
  `deskripsi_bb` text NOT NULL,
  `harga_bb` varchar(15) NOT NULL,
  `stok_bb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahanbaku`, `id_user`, `nm_bahanbaku`, `deskripsi_bb`, `harga_bb`, `stok_bb`) VALUES
(1, 1, 'Biji Kopi Robusta', 'Coffea Canephora', '25000', 45),
(2, 5, 'Biji Kopi Arabika', 'Coffea Arabica', '30000', 6),
(3, 1, 'Biji Kopi Ekspreso', 'Ekspreso', '30000', 80),
(5, 5, 'Gula Merah', 'Brown Sugar Premium', '14000', 33),
(6, 5, 'Susu Creamer', 'Full Cream Ultra', '17000', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bb_keluarpabrik`
--

CREATE TABLE `bb_keluarpabrik` (
  `id_bbkeluarp` int(11) NOT NULL,
  `id_bbmasukp` int(11) NOT NULL,
  `tgl_keluar` varchar(15) NOT NULL,
  `stokpk` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bb_keluarpabrik`
--

INSERT INTO `bb_keluarpabrik` (`id_bbkeluarp`, `id_bbmasukp`, `tgl_keluar`, `stokpk`, `time`) VALUES
(1, 1, '2022-05-09', 2, '2022-05-09 02:06:26'),
(2, 3, '2022-05-09', 1, '2022-05-09 02:06:37'),
(3, 2, '2022-05-09', 6, '2022-05-09 02:06:46'),
(4, 6, '2022-05-26', 2, '2022-05-25 22:56:43'),
(5, 1, '2022-05-30', 1, '2022-05-30 10:34:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bb_masukpabrik`
--

CREATE TABLE `bb_masukpabrik` (
  `id_bbmasukp` int(11) NOT NULL,
  `id_detailp` int(11) NOT NULL,
  `tgl_masuk` varchar(15) NOT NULL,
  `stokp` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bb_masukpabrik`
--

INSERT INTO `bb_masukpabrik` (`id_bbmasukp`, `id_detailp`, `tgl_masuk`, `stokp`, `time`) VALUES
(1, 3, '2022-05-09', 2, '2022-05-09 02:05:51'),
(2, 4, '2022-05-09', 11, '2022-05-09 02:05:51'),
(3, 5, '2022-05-09', 2, '2022-05-09 02:05:51'),
(4, 1, '2022-05-09', 3, '2022-05-09 02:05:57'),
(5, 2, '2022-05-09', 20, '2022-05-09 02:05:57'),
(6, 6, '2022-05-26', 2, '2022-05-25 22:55:18'),
(7, 7, '2022-05-26', 5, '2022-05-25 22:55:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_invoiced`
--

CREATE TABLE `detail_invoiced` (
  `id_detaild` int(11) NOT NULL,
  `id_invoiced` varchar(30) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_invoiced`
--

INSERT INTO `detail_invoiced` (`id_detaild`, `id_invoiced`, `id_produk`, `qty_produk`) VALUES
(1, '20220509L7X1BM4G', 1, 5),
(2, '20220509L7X1BM4G', 3, 3),
(3, '20220509MRGDH5T6', 2, 12),
(4, '20220509MRGDH5T6', 3, 5),
(5, '202205263I4ZVL5X', 1, 5),
(6, '202205263I4ZVL5X', 3, 5),
(7, '20220530ZBTUANF8', 1, 2),
(8, '20220530ZBTUANF8', 3, 2),
(9, '20220607LYQF4NOK', 2, 2),
(10, '20220607LYQF4NOK', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_invoicep`
--

CREATE TABLE `detail_invoicep` (
  `id_detailp` int(11) NOT NULL,
  `id_invoicep` varchar(30) NOT NULL,
  `id_bahanbaku` int(11) NOT NULL,
  `qty_bb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_invoicep`
--

INSERT INTO `detail_invoicep` (`id_detailp`, `id_invoicep`, `id_bahanbaku`, `qty_bb`) VALUES
(1, '20220509A8GUJVH3', 1, 3),
(2, '20220509A8GUJVH3', 3, 20),
(3, '20220509RZYJCMHL', 2, 5),
(4, '20220509RZYJCMHL', 5, 17),
(5, '20220509RZYJCMHL', 6, 3),
(6, '20220526MVSGOFA7', 5, 4),
(7, '20220526MVSGOFA7', 6, 5),
(8, '20220530NMLU7FE5', 1, 2),
(9, '20220530NMLU7FE5', 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_distributor`
--

CREATE TABLE `invoice_distributor` (
  `id_invoiced` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_orderdistr` varchar(15) NOT NULL,
  `total_bayardistr` varchar(15) NOT NULL,
  `status_orderdistr` int(11) NOT NULL,
  `bukti_bayardistr` text NOT NULL,
  `bts_bayard` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoice_distributor`
--

INSERT INTO `invoice_distributor` (`id_invoiced`, `id_user`, `tgl_orderdistr`, `total_bayardistr`, `status_orderdistr`, `bukti_bayardistr`, `bts_bayard`) VALUES
('20220509L7X1BM4G', 4, '2022-05-09', '565000', 4, 'gambar.gif', '2022-04-19'),
('20220509MRGDH5T6', 6, '2022-05-09', '1240000', 4, 'download.jpg', '2022-04-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_pabrik`
--

CREATE TABLE `invoice_pabrik` (
  `id_invoicep` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_orderpabrik` varchar(20) NOT NULL,
  `total_bayarpabrik` varchar(20) NOT NULL,
  `status_orderpabrik` int(11) NOT NULL,
  `bukti_bayarpabrik` text NOT NULL,
  `supplier` int(11) NOT NULL,
  `bts_bayarp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoice_pabrik`
--

INSERT INTO `invoice_pabrik` (`id_invoicep`, `id_user`, `tgl_orderpabrik`, `total_bayarpabrik`, `status_orderpabrik`, `bukti_bayarpabrik`, `supplier`, `bts_bayarp`) VALUES
('20220509A8GUJVH3', 2, '2022-05-09', '675000', 4, 'download1.jpg', 1, '2022-04-19'),
('20220509RZYJCMHL', 2, '2022-05-09', '439000', 4, 'download.jpg', 5, '2022-04-19'),
('20220526MVSGOFA7', 2, '2022-05-26', '141000', 3, 'download2.jpg', 5, '2022-04-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penawaran`
--

CREATE TABLE `penawaran` (
  `id_penawaran` int(11) NOT NULL,
  `id_bahanbaku` int(11) NOT NULL,
  `tgl_penawaran` varchar(15) NOT NULL,
  `kalimat` text NOT NULL,
  `jml_tawaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penawaran`
--

INSERT INTO `penawaran` (`id_penawaran`, `id_bahanbaku`, `tgl_penawaran`, `kalimat`, `jml_tawaran`) VALUES
(1, 1, '2022-10-19', 'Ayo Lakukan Transaksi, Bahan Baku anda sudah menipis', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nm_produk` varchar(125) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` varchar(15) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nm_produk`, `deskripsi`, `harga`, `stok`) VALUES
(1, 'Bubuk Kopi Arabika', 'Arabika coffe', '65000', 1),
(2, 'Bubuk Coffe Robusta', 'Robusta Coffe', '70000', 6),
(3, 'Bubuk Coffe Ekspreso', 'Ekspreso Coffe', '80000', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_keluardistr`
--

CREATE TABLE `produk_keluardistr` (
  `id_keluard` int(11) NOT NULL,
  `id_masukd` int(11) NOT NULL,
  `tgl_keluar` varchar(15) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `qty_kel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk_keluardistr`
--

INSERT INTO `produk_keluardistr` (`id_keluard`, `id_masukd`, `tgl_keluar`, `time`, `qty_kel`) VALUES
(1, 3, '2022-05-09', '2022-05-09 02:18:15', 2),
(2, 1, '2022-05-26', '2022-05-25 22:43:53', 2),
(3, 8, '2022-05-26', '2022-05-25 23:06:19', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_masukdistr`
--

CREATE TABLE `produk_masukdistr` (
  `id_masukd` int(11) NOT NULL,
  `id_detaild` int(11) NOT NULL,
  `stokd` int(11) NOT NULL,
  `tgl_masuk` varchar(15) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk_masukdistr`
--

INSERT INTO `produk_masukdistr` (`id_masukd`, `id_detaild`, `stokd`, `tgl_masuk`, `time`) VALUES
(1, 1, 3, '2022-05-09', '2022-05-09 02:14:38'),
(2, 2, 3, '2022-05-09', '2022-05-09 02:14:38'),
(3, 3, 10, '2022-05-09', '2022-05-09 02:15:05'),
(4, 4, 5, '2022-05-09', '2022-05-09 02:15:05'),
(7, 5, 5, '2022-05-26', '2022-05-25 23:05:55'),
(8, 6, 3, '2022-05-26', '2022-05-25 23:05:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(125) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `no_rek` varchar(20) NOT NULL,
  `nm_bank` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat`, `no_hp`, `no_rek`, `nm_bank`, `username`, `password`, `level_user`) VALUES
(1, 'Yayan Ahmad', 'Kuningan, Jawa Barat', '085156727368', '0113877635546', 'BRI', 'supplier', 'supplier', 1),
(2, 'maman', 'ciawigebang', '085156727368', '0113332256746534', 'BNI', 'pabrik', 'pabrik', 2),
(4, 'distributor', 'Cigadung Kuningan', '08987654678', '0091827365261728', 'BNI', 'distributor', 'distributor', 3),
(5, 'Dahlan Sadikin', 'Cilebak, Kuningan', '089765678765', '0001212232234456', 'BRI', 'supplier2', 'supplier2', 1),
(6, 'distributor2', 'distributor2', '087894653425', '0098992343787899', 'BRI', 'distributor2', 'distributor2', 3),
(7, 'Pemilik', 'Cigugur Kab Kuningan', '0897654345652', '0011112223245434', 'BRI', 'pemilik', 'pemilik', 4),
(8, 'coba', 'coba', '0875698745633', '123344', 'MANDIRI', 'coba', 'coba', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahanbaku`);

--
-- Indeks untuk tabel `bb_keluarpabrik`
--
ALTER TABLE `bb_keluarpabrik`
  ADD PRIMARY KEY (`id_bbkeluarp`);

--
-- Indeks untuk tabel `bb_masukpabrik`
--
ALTER TABLE `bb_masukpabrik`
  ADD PRIMARY KEY (`id_bbmasukp`);

--
-- Indeks untuk tabel `detail_invoiced`
--
ALTER TABLE `detail_invoiced`
  ADD PRIMARY KEY (`id_detaild`);

--
-- Indeks untuk tabel `detail_invoicep`
--
ALTER TABLE `detail_invoicep`
  ADD PRIMARY KEY (`id_detailp`);

--
-- Indeks untuk tabel `invoice_distributor`
--
ALTER TABLE `invoice_distributor`
  ADD PRIMARY KEY (`id_invoiced`);

--
-- Indeks untuk tabel `invoice_pabrik`
--
ALTER TABLE `invoice_pabrik`
  ADD PRIMARY KEY (`id_invoicep`);

--
-- Indeks untuk tabel `penawaran`
--
ALTER TABLE `penawaran`
  ADD PRIMARY KEY (`id_penawaran`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `produk_keluardistr`
--
ALTER TABLE `produk_keluardistr`
  ADD PRIMARY KEY (`id_keluard`);

--
-- Indeks untuk tabel `produk_masukdistr`
--
ALTER TABLE `produk_masukdistr`
  ADD PRIMARY KEY (`id_masukd`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bahanbaku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `bb_keluarpabrik`
--
ALTER TABLE `bb_keluarpabrik`
  MODIFY `id_bbkeluarp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `bb_masukpabrik`
--
ALTER TABLE `bb_masukpabrik`
  MODIFY `id_bbmasukp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `detail_invoiced`
--
ALTER TABLE `detail_invoiced`
  MODIFY `id_detaild` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `detail_invoicep`
--
ALTER TABLE `detail_invoicep`
  MODIFY `id_detailp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `penawaran`
--
ALTER TABLE `penawaran`
  MODIFY `id_penawaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `produk_keluardistr`
--
ALTER TABLE `produk_keluardistr`
  MODIFY `id_keluard` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produk_masukdistr`
--
ALTER TABLE `produk_masukdistr`
  MODIFY `id_masukd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
