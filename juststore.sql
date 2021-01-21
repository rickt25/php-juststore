-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 05:18 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `juststore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`) VALUES
(1, 'Men\'s Fashion', 'bussiness-man.png'),
(2, 'Women\'s Fashion', 'designer.png'),
(4, 'Baby', 'baby-boy.png'),
(5, 'Gadget', 'gadget.png'),
(6, 'Furniture', 'shelf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `couriers`
--

CREATE TABLE `couriers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cost` bigint(20) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `couriers`
--

INSERT INTO `couriers` (`id`, `name`, `cost`, `icon`) VALUES
(1, 'J&T', 6000, 'jnt.png'),
(2, 'JNE', 7000, 'jne.png'),
(3, 'si cepat', 5000, 'sicepat.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `price` bigint(20) NOT NULL,
  `stock` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`) VALUES
(18, 'Headset Kucing', 'Air Jordan adalah merek sneaker basket dan perlengkapan olahraga yang diproduksi Nike. Merek ini khusus diciptakan untuk pemain basket paling fenomenal di dunia, Michael Jordan. Sneaker Air Jordan I yang asli, diproduksi untuk Michael Jordan pada tahun 1984. Tapi baru diluncurkan ke pasaran tahun 1985.            ', 800000, 20),
(19, 'Mouse Gaming Logitech L120', 'Praesent ut dui aliquet elit venenatis ultricies in quis ante. Nullam massa velit, dignissim sit amet neque sit amet, iaculis vestibulum elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In molestie elit at enim accumsan tincidunt.', 20000, 50),
(20, 'Keyboard Gaming Logitech PRO x hero', 'Praesent ut dui aliquet elit venenatis ultricies in quis ante. Nullam massa velit, dignissim sit amet neque sit amet, iaculis vestibulum elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In molestie elit at enim accumsan tincidunt.', 500000, 20),
(21, 'Headset Gimming', 'Praesent ut dui aliquet elit venenatis ultricies in quis ante. Nullam massa velit, dignissim sit amet neque sit amet, iaculis vestibulum elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In molestie elit at enim accumsan tincidunt.', 230000, 12),
(22, 'Sepatu Navy Fladeo', 'Praesent ut dui aliquet elit venenatis ultricies in quis ante. Nullam massa velit, dignissim sit amet neque sit amet, iaculis vestibulum elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In molestie elit at enim accumsan tincidunt.', 560000, 10),
(23, 'PS4 Black', 'Praesent ut dui aliquet elit venenatis ultricies in quis ante. Nullam massa velit, dignissim sit amet neque sit amet, iaculis vestibulum elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In molestie elit at enim accumsan tincidunt.', 3999999, 3),
(24, 'Iphone 6s Baterai Tahan 100%', 'Praesent ut dui aliquet elit venenatis ultricies in quis ante. Nullam massa velit, dignissim sit amet neque sit amet, iaculis vestibulum elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In molestie elit at enim accumsan tincidunt.', 2500000, 4),
(25, 'Topi Hitler', 'Donec tempus vel nisl sed pretium. Donec ut libero tristique, iaculis arcu eget, blandit dolor. Sed sed tempor tellus. Curabitur sed turpis ligula. Aenean tincidunt aliquet orci, tristique hendrerit nisi maximus non. Vivamus nec metus ipsum. Ut eget felis ligula. In hac habitasse platea dictumst.', 500000, 10),
(26, 'Jersey OG', 'Nam consectetur ac nisi sit amet mattis. Nullam sollicitudin id metus at dictum. Curabitur a sodales neque. Integer non magna massa. Donec mattis, urna at volutpat rhoncus, purus ipsum pretium nisl, id accumsan lorem nibh non ex.', 320000, 54),
(27, 'Jersey Liquid', 'vitae tincidunt velit fringilla. Vestibulum arcu dolor, lacinia vel dignissim sit amet, pretium sit amet enim. Sed est nulla, placerat sit amet tristique ac, dignissim et mauris. Nunc feugiat magna et vulputate bibendum. Donec varius turpis sed augue ullamcorper vehicula.', 300000, 22),
(28, 'Jaket Natus V`incere ( NA`Vi )', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tristique luctus mauris in ultrices. Nullam eros felis, tempus id vestibulum quis, cursus vel nulla.', 250000, 14),
(29, 'Dress Motif Bunga', 'Sed tempor sem sit amet rhoncus aliquam. Pellentesque euismod sollicitudin scelerisque. Vestibulum eget gravida mi. Donec rhoncus leo metus, et sollicitudin tellus facilisis eget.', 200000, 5),
(30, 'Dress Putih', 'In hac habitasse platea dictumst. Proin imperdiet varius felis a vehicula. Aenean convallis, eros eget dictum blandit, arcu velit cursus metus, vel porta ex ex quis sapien.', 240000, 7),
(31, 'Purse bag lidah buaya', 'Vestibulum arcu dolor, lacinia vel dignissim sit amet, pretium sit amet enim. Sed est nulla, placerat sit amet tristique ac, dignissim et mauris.', 1200000, 3),
(32, 'Purse Louis Vuittion', 'Morbi condimentum, dui id feugiat eleifend, turpis nisi malesuada odio, non molestie sem justo eget velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 1500000, 4),
(33, 'Toys Story', 'Donec tempus vel nisl sed pretium. Donec ut libero tristique, iaculis arcu eget, blandit dolor. Sed sed tempor tellus. Curabitur sed turpis ligula. Aenean tincidunt aliquet orci, tristique hendrerit nisi maximus non. ', 50000, 13),
(34, 'Rainbow kids', 'Vivamus nec metus ipsum. Ut eget felis ligula. In hac habitasse platea dictumst. Integer vitae arcu et nisi finibus tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.', 68000, 30),
(35, 'Mainan mancing', 'Integer eu sem magna. Nullam efficitur justo sed tempor dapibus. Morbi massa orci, ultricies in magna et, finibus rutrum leo.', 45000, 21),
(36, 'Lego (Minecraft, F.r.i.e.n.d.s)', 'Vivamus suscipit, metus in euismod sodales, leo libero rhoncus mi, eu tempus massa arcu in metus. Phasellus quis consectetur dui, quis dignissim ipsum.', 320000, 8),
(37, 'Meja kayu jati', 'Mauris risus eros, commodo eget leo et, rutrum porta dui. Cras ac urna porttitor, euismod nisi non, mattis magna. Maecenas rutrum elit non massa imperdiet, in ultricies sem rhoncus.', 4199999, 2),
(38, 'Kursi Gaming Rexus', 'Donec tempus vel nisl sed pretium. Donec ut libero tristique, iaculis arcu eget, blandit dolor. Sed sed tempor tellus. Curabitur sed turpis ligula. Aenean tincidunt aliquet orci, tristique hendrerit nisi maximus non. Vivamus nec metus ipsum. Ut eget felis ligula. In hac habitasse platea dictumst. Integer vitae arcu et nisi finibus tincidunt.', 2499999, 12),
(39, 'Sofa empuk', 'Nulla congue sapien vel vestibulum sollicitudin. Proin ullamcorper rutrum risus eget rutrum. Sed pellentesque tempor tortor, eget consequat lorem lacinia in. Sed vestibulum mauris sit amet nisl lobortis, quis facilisis arcu venenatis. Etiam elementum at purus vitae eleifend. Aenean ex neque, tempus at pharetra quis, rhoncus id purus. Fusce placerat varius justo eleifend facilisis. Nulla ultrices dapibus justo a tincidunt. In blandit lorem vel elementum rhoncus. Morbi sit amet ante vel est sagittis tempus. In eu ipsum erat. Morbi quis diam nibh.', 4999999, 1),
(40, 'Hoodie NIGMA', 'Nam consectetur ac nisi sit amet mattis. Nullam sollicitudin id metus at dictum. Curabitur a sodales neque. Integer non magna massa. Donec mattis, urna at volutpat rhoncus, purus ipsum pretium nisl, id accumsan lorem nibh non ex. Integer tristique tortor sed quam semper, in efficitur nisl finibus. Aenean vehicula nibh eu suscipit condimentum. Sed eget odio id tellus cursus accumsan ut sed dui. Proin a ligula massa. Quisque ac leo dui. Nulla rhoncus convallis lorem, in condimentum dolor consectetur sed. Aliquam ultrices vulputate purus. Etiam blandit luctus est, nec placerat odio tincidunt quis. Quisque felis ante, laoreet vitae odio faucibus, accumsan tristique ante. Nam varius faucibus interdum.', 350000, 14),
(41, 'Baju Polos ( Varian warna )', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using', 50000, 122),
(42, 'Jaket Dilan', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,', 110000, 14);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `product_id`, `category_id`) VALUES
(37, 19, 5),
(38, 20, 5),
(39, 21, 5),
(40, 22, 1),
(41, 23, 5),
(42, 24, 5),
(43, 18, 2),
(44, 18, 5),
(45, 25, 1),
(46, 26, 1),
(47, 27, 1),
(48, 28, 1),
(49, 29, 2),
(50, 30, 2),
(51, 31, 2),
(52, 32, 2),
(53, 33, 4),
(54, 34, 4),
(55, 35, 4),
(56, 36, 4),
(57, 37, 6),
(58, 38, 6),
(59, 39, 6),
(60, 40, 1),
(61, 41, 1),
(62, 42, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_gallery`
--

CREATE TABLE `product_gallery` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_gallery`
--

INSERT INTO `product_gallery` (`id`, `product_id`, `image`) VALUES
(17, 18, 'assets/product/b98a97bcb205eff86cd8440bd01e4ecd_tn.jpg'),
(18, 19, 'assets/product/raton_gaming_logitech_g102_prodigy_usb_negro_01_l.jpg'),
(19, 20, 'assets/product/pro-x-keyboard-hero.jpg'),
(20, 21, 'assets/product/61lnzTv2a0L._AC_SX466_.jpg'),
(21, 22, 'assets/product/81QnGdrGwsL._UL1500_.jpg'),
(22, 23, 'assets/product/61ryVJLDlFL._AC_SX569_.jpg'),
(23, 24, 'assets/product/VYHDQWEYQJMUBJTKNV4MMC5KMU.jpg'),
(24, 18, 'assets/product/d4b1170748c7eef271b83895eb424b1f.jpg'),
(26, 18, 'assets/product/images.jpg'),
(27, 18, 'assets/product/batch-upload_39ea4f4b-5c99-4d0e-a8b8-a8e9217d26b9.jpg'),
(28, 25, 'assets/product/24596240_ccfb3847-b880-4db7-93a3-2d391d3aeb99_800_800.jpg'),
(29, 25, 'assets/product/a7a2a8f6834de2e5e92c31ce1276be72.jpg'),
(30, 26, 'assets/product/1619389_e564e90d-6fa8-4ed1-8be8-52113f9d4f10.jpg'),
(31, 27, 'assets/product/31221579_f88ec7da-962f-47bd-b304-45818819dcda_449_450.jpg'),
(32, 28, 'assets/product/SYLARGAMING_NAVIYELLOWBLACKLOGO2016-800x800.jpg'),
(33, 28, 'assets/product/888ac331a29b4218c87e36639fb2d95f.jpg'),
(34, 28, 'assets/product/9939855_ae8516c0-0587-4d09-9a2a-91aa3f57369f.png'),
(35, 29, 'assets/product/89645841ebbd76c9849fcd5950a9de0a.jpg'),
(36, 30, 'assets/product/2013783_3cf5c5bc-b3cc-4dc9-a740-02e63f54823a_370_370.jpg'),
(37, 31, 'assets/product/71h+3Tq1dmL._AC_UX395_.jpg'),
(38, 31, 'assets/product/71sOhIG4OlL._UL1079_.jpg'),
(40, 32, 'assets/product/2020-women-handbags-famous-designer-brand.jpg'),
(41, 33, 'assets/product/71AaH5W7c1L._SL1500_.jpg'),
(42, 34, 'assets/product/28863_LLP_RAINGLOW_UNICORN_VET_SET_S1_F_FEP.jpg'),
(43, 35, 'assets/product/13673619882014.jpg'),
(44, 36, 'assets/product/91id2YFTd2L._AC_SL1500_.jpg'),
(45, 36, 'assets/product/download (1).jpg'),
(46, 36, 'assets/product/697058470_1_720x928.jpg'),
(47, 36, 'assets/product/81OB539XYoL._AC_SX425_.jpg'),
(48, 37, 'assets/product/premium-suar-wood-dining-table-singapore-11-scaled.jpg'),
(49, 38, 'assets/product/21846977_fe2547f0-63bd-4b8d-ae77-5e76f43d6af0_1000_1000.jpg'),
(50, 38, 'assets/product/8822897_af28b08d-e245-4bc8-a093-f380200876a0_700_700.jpg'),
(51, 39, 'assets/product/EZM-374536.jpg'),
(52, 39, 'assets/product/NRA-368641.jpg'),
(53, 39, 'assets/product/jobi.jpg'),
(54, 40, 'assets/product/dbf98860960a1df1021408485f2f0299.jpg'),
(55, 40, 'assets/product/1619389_2ea2ecdb-4ac0-45a3-b048-55b702a2f4f3_1200_1200.jpg'),
(56, 40, 'assets/product/2639b263ff71879eba8652ee846900db_tn.jpg'),
(57, 41, 'assets/product/no_brand_kaos_polos_lengan_pendek_cotton_combed_30s_full01_jd18k8tm.jpg'),
(58, 41, 'assets/product/6570491_43dfd38c-1cc8-48f5-ac73-30ae97dc4dcc.jpg'),
(59, 41, 'assets/product/GROSIR-KAOS-POLOS-DI-PADANG-MURAH-DENGAN-KUALITAS-TERJAMIN.jpg'),
(60, 42, 'assets/product/5783778_5129f46a-c57d-47f9-ab4f-c9a4ba81b44f.jpg'),
(61, 42, 'assets/product/0786aeffcf3f35b4a16b82f16a7b674f.jpg'),
(62, 42, 'assets/product/Jaket_Dilan___Jaket_Jeans_Dilan___Jaket_Denim_Dilan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `product_id`, `user_id`, `rating`, `review`, `date`) VALUES
(7, 18, 3, 5, 'Sangat bagus', '2020-11-22'),
(8, 19, 3, 4, 'Barang berkualitas!', '2020-11-22'),
(9, 18, 4, 4, 'Pacar saya sangat menyukainya', '2020-11-22'),
(10, 20, 12, 1, 'Barang hilang', '2020-11-22'),
(11, 20, 7, 5, 'bagus, enak ketiknya', '2020-11-22'),
(12, 25, 7, 5, 'Bahan bagus dan berkualitas', '2020-11-22'),
(13, 34, 7, 5, 'adik saya menyukainya', '2020-11-22'),
(14, 23, 8, 5, 'Barang mulis tidak lecet', '2020-11-22'),
(15, 24, 8, 5, 'baterainya ternyata 200%, mantap sekali', '2020-11-22'),
(16, 38, 8, 3, 'Kursi keadaan patah', '2020-11-22'),
(17, 40, 9, 5, 'saya langsung pro main dota', '2020-11-22'),
(18, 42, 9, 5, 'tiba\" saya ganteng spt dilan', '2020-11-22'),
(19, 22, 9, 2, 'Sepatu hanya 1 pasang', '2020-11-22'),
(20, 28, 10, 5, 'bahan nyaman dipakai', '2020-11-22'),
(21, 28, 10, 5, 'beli kedua kali untuk sahabat', '2020-11-22'),
(22, 20, 11, 4, 'tidak nyesal beli keyboard ini', '2020-11-22'),
(23, 21, 11, 5, 'suara sangat kencang', '2020-11-22'),
(24, 26, 11, 5, 'sedang membentuk tim pubg, terima kasih kak', '2020-11-22'),
(25, 30, 12, 3, 'saya dilempar batu saat memakainya', '2020-11-22'),
(26, 39, 13, 5, 'Mantap euy empuk banget', '2020-11-22'),
(27, 33, 14, 4, 'Mainan disukai anak anak', '2020-11-22'),
(28, 35, 14, 5, 'sangat seru dan menegangkan', '2020-11-22'),
(29, 36, 14, 5, 'sedikit rumit tapi sangat bagus ', '2020-11-22'),
(30, 37, 15, 5, 'sudah lama saya mencari, mantap', '2020-11-22'),
(31, 31, 16, 2, 'saya pikir ada odadingnya', '2020-11-22'),
(32, 41, 16, 3, 'bahan tipis, tidak bagus', '2020-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `sequence` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `hyperlink` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `image`, `sequence`, `start_date`, `end_date`, `hyperlink`) VALUES
(1, 'Sepeda', 'assets/slider/bicycle.jpg', 2, '2020-11-19', '0000-00-00', 'http://localhost'),
(2, 'PS4 brand new', 'assets/slider/ps4.jpg', 1, '2020-11-19', '0000-00-00', ''),
(5, 'Jam tangan', 'assets/slider/watch.jpg', 3, '2020-11-19', '0000-00-00', ''),
(6, 'Sofa empuk', 'assets/slider/jobi.jpg', 4, '2020-11-22', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `address` longtext NOT NULL,
  `courier_name` varchar(255) NOT NULL,
  `courier_cost` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `notes` longtext DEFAULT NULL,
  `total` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_id`, `transaction_date`, `address`, `courier_name`, `courier_cost`, `phone`, `notes`, `total`, `user_id`) VALUES
(16, 1, '2020-11-22', 'Jalan d.i. panjaitan', 'J&T', '6000', '081239123', 'tidak ada', 840000, 1),
(17, 1, '2020-11-22', 'Jalan Pramuka', 'J&T', '6000', '0819023129', 'sesuai orderan kak', 1000000, 7),
(18, 1, '2020-11-22', 'Jalan ganet', 'si cepat', '5000', '08912093122', 'Kursi warna hitam putih', 8999998, 8),
(19, 1, '2020-11-22', 'Jalan daun hijau', 'JNE', '7000', '0891289318923', '', 460000, 9),
(20, 2, '2020-11-22', 'Jalan daun pisang', 'J&T', '6000', '08128930123', '', 560000, 9),
(21, 1, '2020-11-22', 'Jalan aspal', 'J&T', '6000', '081290312903', 'sesuai pesanan terima kasih', 500000, 10),
(22, 1, '2020-11-22', 'Jalan jahe lima', 'J&T', '6000', '08129031903', '', 500000, 11),
(23, 2, '2020-11-22', 'Jalan amaterasu', 'J&T', '6000', '08123123123', 'hati hati', 230000, 11),
(24, 2, '2020-11-22', 'Jalan pohon pepaya', 'J&T', '6000', '08190231290', '', 68000, 7),
(25, 1, '2020-11-22', 'Jalan pohon raya', 'J&T', '6000', '0812903190', 'lempar dari pagar saja', 500000, 12),
(26, 2, '2020-11-22', 'Jalan batu putih', 'J&T', '6000', '08123123123', '', 250000, 10),
(27, 3, '2020-11-22', 'Jalan tanjungunggat', 'J&T', '6000', '081290313221', '', 1280000, 11),
(28, 2, '2020-11-22', 'Jalan pohon raya', 'J&T', '6000', '08129031239', '', 240000, 12),
(29, 1, '2020-11-22', 'Jalan kantong plastik', 'J&T', '6000', '081290312903', 'diletak didepan saja ya, kemungkinan saya sedang kerja', 4999999, 13),
(30, 1, '2020-11-22', 'Jalan toko mainan', 'J&T', '6000', '08190231923', 'dibungkus bubblewrap', 415000, 14),
(31, 1, '2020-11-22', 'Jalan kardus', 'J&T', '6000', '08120391234', '', 4199999, 15),
(32, 1, '2020-11-22', 'Jalan kemanggisan', 'J&T', '6000', '08129031902', '', 1200000, 16),
(33, 2, '2020-11-22', 'Jalan alam sutera', 'J&T', '6000', '0812803012', 'warna kuning,hijau,biru', 150000, 16);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `transaction_id`, `product_id`, `product_name`, `quantity`, `price`) VALUES
(10, 16, 18, 'Headset Kucing', 1, 800000),
(11, 16, 19, 'Mouse Gaming Logitech L120', 2, 20000),
(12, 17, 20, 'Keyboard Gaming Logitech PRO x hero', 1, 500000),
(13, 17, 25, 'Topi Hitler', 1, 500000),
(14, 18, 23, 'PS4 Black', 1, 3999999),
(15, 18, 24, 'Iphone 6s Baterai Tahan 100%', 1, 2500000),
(16, 18, 38, 'Kursi Gaming Rexus', 1, 2499999),
(17, 19, 40, 'Hoodie NIGMA', 1, 350000),
(18, 19, 42, 'Jaket Dilan', 1, 110000),
(19, 20, 22, 'Sepatu Navy Fladeo', 1, 560000),
(20, 21, 28, 'Jaket Natus V`incere ( NA`Vi )', 2, 250000),
(21, 22, 20, 'Keyboard Gaming Logitech PRO x hero', 1, 500000),
(22, 23, 21, 'Headset Gimming', 1, 230000),
(23, 24, 34, 'Rainbow kids', 1, 68000),
(24, 25, 20, 'Keyboard Gaming Logitech PRO x hero', 1, 500000),
(25, 26, 28, 'Jaket Natus V`incere ( NA`Vi )', 1, 250000),
(26, 27, 26, 'Jersey OG', 4, 320000),
(27, 28, 30, 'Dress Putih', 1, 240000),
(28, 29, 39, 'Sofa empuk', 1, 4999999),
(29, 30, 33, 'Toys Story', 1, 50000),
(30, 30, 35, 'Mainan mancing', 1, 45000),
(31, 30, 36, 'Lego (Minecraft, F.r.i.e.n.d.s)', 1, 320000),
(32, 31, 37, 'Meja kayu jati', 1, 4199999),
(33, 32, 31, 'Purse bag lidah buaya', 1, 1200000),
(34, 33, 41, 'Baju Polos ( Varian warna )', 3, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `address`, `phone`, `email`, `password`, `profile`, `role`) VALUES
(1, 'admin', 'Male', 'admin doesnt need addresaa', '082386783199', 'admin@gmail.com', '$2y$10$1dyD8dxjPhFCy3RC/br9aeUpDN2SYalAYUvaVZDjVaW6AinlxLC3.', 'assets/profile/fa00c7740d6c4453f6fbf2f81172979b94ea96e8.jpg', 'Admin'),
(2, 'staff', 'Male', 'staff doesnt need an address', '082386783199', 'staff@gmail.com', '$2y$10$VHfcOVIAs3BA1zbIsouNieVfn99ZQfoX3b7mQhL8tjAjE74iT6o42', 'assets/profile/a0a5026df2484bcbbd52d203b893d39b.jpg', 'Staff'),
(3, 'derrick', 'Male', 'jalan d.i. panjaitan', 'a82386783199', 'derrick@gmail.com', '$2y$10$VHfcOVIAs3BA1zbIsouNieVfn99ZQfoX3b7mQhL8tjAjE74iT6o42', 'assets/profile/16020918.jpg', 'Staff'),
(4, 'elvin', 'Male', 'Jalan semongko', '08123123123123', 'elvin@gmail.com', '$2y$10$7J0FqFhJ/xsC8pjg63jJPeGHBpRQzEGmawvLeq35mEGu.n1kApAIe', 'assets/profile/Jerry.jpg', 'Staff'),
(5, 'fathariq', 'Male', 'Jalan tugu monas', '12345678910', 'dimas@gmail.com', '$2y$10$su6iQ0izyiJd1ZRVZ3GEVeqA70AVjicreHH1dNIyI7WEz446paUnq', 'assets/profile/d22.jpg', 'Staff'),
(6, 'ricky', 'Male', 'Jalan batu hitams', '08123123123123', 'ricky@gmail.com', '$2y$10$4lRGa3KHF/ESOeHTEzdlEuA.Q5MuZd7BfCUYW6049ysQTFLYJqKt.', 'assets/profile/3427.jpg', 'Staff'),
(7, 'charles', 'Male', 'Jalan kijang barek motor', '081293123123', 'charles@gmail.com', '$2y$10$rjZBcsoHx3FOh0IIbICgZeS7YU3zI8HzqURlY7ty2/e/GO6pKW8jW', 'assets/profile/80485cabbb1f54c710ec5b2ffefbfa9b--venezuela-bit.jpg', 'Customer'),
(8, 'andrian', 'Male', 'Jalan kayang', '08129301239', 'andrian@gmail.com', '$2y$10$jI6WdrI3XEfb5C8dvB3Nlumun6qG2a50WbRiNv6TxaeR8GqIB6tAe', 'assets/profile/92e32c9cedf91ac3dee5113ddeca385e.jpg', 'Customer'),
(9, 'vincent', 'Male', 'Jalan bulan purnama', '0819023190', 'vincent@gmail.com', '$2y$10$eMnpCSoxpM4cQUaQ1QRC4eRJKj1iNsaIcnhkXO4GkZ2dBFQfyH3D6', 'assets/profile/lutfi-agizal-foto-instagram-36-700x521.png', 'Customer'),
(10, 'Robert', 'Male', 'Jalan batu kucing', '08192381203', 'robert@gmail.com', '$2y$10$3iLDtegjs4KmrTPv44BzTuvdvyZnZCmNy9cPg.xr3l3Eb0vpy2v4e', '', 'Customer'),
(11, 'Jonathan', 'Male', 'Jalan bogor', '081290312312', 'jonathan@gmail.com', '$2y$10$uiSsiS/jM85x7i3xw78L5ewZpwayRpX4SmRoEFrv9J28Z0h4JBr8y', 'assets/profile/ef07b38f276b7d44c930243bc002fbf4.jpg', 'Customer'),
(12, 'Udin', 'Male', 'Jalan micin raya', '08912039123', 'udin@gmail.com', '$2y$10$G0GxOJvSIuLNz671nllzSeps9Q1UsbmXzYTtSgXQV5wAZO8DzFGaC', 'assets/profile/cover3.jpg', 'Customer'),
(13, 'Bambang Sucipto', 'Male', 'Jalan Adi Sucipto', '0819203123901', 'bambang@gmail.com', '$2y$10$iBRP1ky9ALib0563qrzeAeMFVcZEUtee2bhAqhi/SBgSure2f1rAO', 'assets/profile/69c.png', 'Customer'),
(14, 'Asep', 'Male', 'Jalan raket listrik', '08123901230', 'asep@gmail.com', '$2y$10$101O7LAeo8eqZlINRIuJ/OPa3dzBEzl1s5Ae4E3y2V58XFTusQPH2', '', 'Customer'),
(15, 'Supratman', 'Male', 'Jalan Ahmad Yani', '08918231030', 'supratman@gmail.com', '$2y$10$W7myex7ebNsdMBkT6mZbd.LMN0WHSmLVRUW/P51MYW/K3JCzD5UJa', 'assets/profile/Screenshot (90).png', 'Customer'),
(16, 'Mang oleh', 'Male', 'Jalan Odading', '081902390120', 'mang@gmail.com', '$2y$10$R/Qp68csICP5lswaciZLXuhpwyPiLeES/Mj752vhMY11oiXF4bocG', 'assets/profile/odading.png', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `couriers`
--
ALTER TABLE `couriers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `couriers`
--
ALTER TABLE `couriers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `product_gallery`
--
ALTER TABLE `product_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
