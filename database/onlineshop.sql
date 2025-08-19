-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2025 pada 10.26
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `role`) VALUES
(1, 'Administrator', 'admin@mail.com', '$2y$10$CpalghYghxAcc0Qo0fePiuH0d4JKvPlFRvWzhjJlNQ9WSir64rIbG', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `message` text NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `title`, `slug`) VALUES
(1, 'Baju', 'baju'),
(4, 'Kemeja', 'kemeja'),
(5, 'Jilbab', 'jilbab'),
(7, 'Jeans', 'jeans'),
(8, 'Jaket', 'jaket'),
(9, 'Celana', 'celana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(125) NOT NULL,
  `province` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `courier` varchar(125) NOT NULL,
  `cost_courier` int(11) NOT NULL,
  `waybill` varchar(125) DEFAULT NULL,
  `status` enum('waiting','paid','process','delivered','cancel') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `date`, `invoice`, `total`, `name`, `address`, `city`, `province`, `phone`, `courier`, `cost_courier`, `waybill`, `status`) VALUES
(12, 5, '2025-07-15', '520231215133700', 150000, 'Azriel Fidzlie', 'Jalan Bhineka 4\r\nTinggi', 'Depok', 'Jawa Barat', '08988999259', 'JNE', 38000, '123123', 'cancel'),
(21, 1, '2025-04-29', '120240429143555', 7735000, 'Azriel Fidzlie', 'Jalan Bhineka 4\r\nTinggi', 'Depok', 'Jawa Barat', '08988999259', 'JNE', 988000, NULL, 'waiting'),
(22, 3, '2025-05-23', '320240523223441', 500000, 'Azriel Fidzlie', 'Jalan Bhineka 4\r\nTinggi', 'Depok', 'Jawa Barat', '08988999259', 'JNE', 38000, NULL, 'paid'),
(23, 6, '2025-06-13', '620240613000147', 150000, 'Azriel Fidzlie', 'Jalan Bhineka 4\r\nTinggi', 'Bogor', 'Jawa Barat', '08988999259', 'JNE', 38000, '10006745063933', 'delivered');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_confirm`
--

CREATE TABLE `order_confirm` (
  `id` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order_confirm`
--

INSERT INTO `order_confirm` (`id`, `id_orders`, `account_name`, `account_number`, `nominal`, `note`, `image`) VALUES
(6, 12, 'Azriel', 234234, 138000, '-', '520231215133700-20231215133804.jpg'),
(11, 19, 'Azriel Fidzlie', 5410425, 838000, '-UKuran L om', '520231215165759-20231215165846.jpg'),
(12, 22, 'Azriel', 234234, 88888888, '-', '320240523223441-20240524001955.jpeg'),
(13, 23, 'Azriel', 123123, 123123124, '-', '620240613000147-20240613000209.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `message` text NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_orders`, `id_product`, `quantity`, `message`, `sub_total`) VALUES
(9, 12, 6, 1, '', 150000),
(16, 19, 9, 1, '', 800000),
(17, 20, 8, 1, '', 235000),
(18, 21, 8, 1, '', 235000),
(19, 21, 1, 50, '', 7500000),
(20, 22, 12, 1, '', 500000),
(21, 23, 1, 1, '', 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `size` varchar(125) NOT NULL,
  `color` varchar(255) NOT NULL,
  `type` enum('L','W') NOT NULL,
  `price` int(11) NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `stok` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) NOT NULL,
  `delete` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `id_category`, `slug`, `title`, `description`, `size`, `color`, `type`, `price`, `is_available`, `stok`, `image`, `delete`) VALUES
(1, 1, 'baju-hitam', 'Baju Hitam', 'Baju Hitam', 'M, L, XL', 'Hitam', 'L', 150000, 1, 9, 'image-1.jpg', 1),
(2, 8, 'jaket-hitam', 'Jaket Hitam', 'Jaket Hitam', 'M, L, XL', 'Hitam', 'L', 200000, 1, 79, 'image-2.jpg', 1),
(5, 8, 'hoddie-wanita', 'Hoddie Wanita', 'Hoddie Wanita', 'S, M, L', 'Coklat, Hitam', 'W', 250000, 1, 0, 'hoddie-wanita-20200508171422.jpg', 1),
(6, 1, 'baju-pria-tshirt', 'Baju Pria Tshirt', 'Baju Pria Tshirt', 'S, M, L, XL', 'Merah, Biru', 'L', 150000, 1, 86, 'baju-pria-tshirt-20200508194354.jpg', 1),
(7, 8, 'hoddie-wanita-2', 'Hoddie Wanita', 'Hoddie Wanita', 'M, L, XL', 'Coklat, Hitam', 'W', 100000, 1, 90, 'hoddie-wanita-20200518112238.jpg', 1),
(8, 1, 'new-tshirt-men', 'New Tshirt Men', 'New Tshirt Men', 'M, L, XL', 'Coklat, Hitam', 'L', 235000, 1, 87, 'new-tshirt-men-20200518114434.jpg', 1),
(9, 9, 'adidas', 'Adidas', 'adidas own the run astro pant men', 'S, M, L', 'Hitam', 'L', 800000, 1, 89, 'adidas-own-the-run-astro-pant-men-20200518130239.jpg', 1),
(10, 1, 'mfmw-elyisa', 'MFMW Elyisa', 'MFMW Elyisa Cardigan Coklat', 'S, M, L', 'Coklat', 'W', 200000, 1, 89, 'mfmw-elyisa-20200518131357.jpg', 1),
(11, 1, 'testing', 'Testing', 'Hahaha', 'L', 'Hitam', 'L', 100000, 1, 59, 'testing-20231214011044.png', 0),
(12, 1, 'abaya', 'Abaya', 'benang sutra', 'L, M', 'Putih', 'W', 500000, 1, 29, 'abaya-20240429132013.jpeg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sequence` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id`, `title`, `sequence`, `image`) VALUES
(1, 'Brand Festival Ramadhan', 1, 'img-1.jpg'),
(2, 'Gratis Ongkir', 2, 'img-2.jpg'),
(4, 'Special Ramadhan', 3, 'special-ramadhan-20200514150917.jpg'),
(6, 'apple', 4, 'apple-20231214143647.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `date_register` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `image`, `is_active`, `date_register`) VALUES
(4, 'Trisnawan', 'halo.trisnasejati@gmail.com', '$2y$10$cKvJJ1GwMNL3fIEroVw2Ven5nwZNZ49MoiZ/X8oOJ/hP0JZJp6xAe', '', 1, 1702489057),
(5, 'TUTI', '19215261@bsi.ac.id', '$2y$10$xJxUdEB2nL8zwMamkxMZIu89seTLfsMSwxbTXNOp3Bi5LgHPbp/pq', '', 1, 1702538738),
(6, 'Azriel Fidzlie', 'fidzlieazriel@gmail.com', '$2y$10$m5d1HJbkx/Hg6PeFrDu0w.KCOo.41Qlr205OTonX8X4.t1Fyj0K5y', '', 1, 1716218344);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_confirm`
--
ALTER TABLE `order_confirm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `order_confirm`
--
ALTER TABLE `order_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
