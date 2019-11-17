-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:7888
-- Generation Time: Nov 16, 2019 at 08:16 AM
-- Server version: 5.7.24-log
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vtcs_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) NOT NULL,
  `name` varchar(60) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) NOT NULL,
  `name` varchar(60) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `brand_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `price` double NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `upadated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `area` varchar(40) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `categories_id` bigint(20) NOT NULL,
  `brand_id` bigint(20) NOT NULL,
  `name` varchar(60) NOT NULL,
  `price` double NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categories_id`, `brand_id`, `name`, `price`, `image`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Áo Vest Đen Cổ Sẫm (NEW)', 2000000, 'uploads/AO VEST DEN CO SAM (NEW).jpg', 1, '2019-11-09 12:46:25', '2019-11-09 12:46:25'),
(2, 1, 1, 'Áo Vest Đen Thường (NEW)', 1000000, 'uploads/AO VEST DEN THUONG (NEW).jpg', 2, '2019-11-09 12:50:58', '2019-11-09 12:50:58'),
(3, 1, 1, 'Áo Vest Đen Vá Viền (NEW)', 2200000, 'uploads/AO VEST DVVMM.jpg', 3, '2019-11-09 13:03:44', '2019-11-09 13:03:44'),
(4, 1, 1, 'Áo Vest Kẻ Ô Xanh Sẫm', 2400000, 'uploads/AO VEST KE O XANH SAM.jpg', 4, '2019-11-10 15:58:25', '2019-11-10 15:58:25'),
(5, 1, 1, 'Áo Vest Kẻ Ô Xanh', 2500000, 'uploads/AO VEST KE O XANH SANG.jpg', 5, '2019-11-12 03:02:20', '2019-11-12 03:02:20'),
(6, 1, 1, 'Áo Vest Kẻ Xanh Ô Đỏ', 2600000, 'uploads/AO VEST KE XANH O DO.jpg', 6, '2019-11-12 03:02:29', '2019-11-12 03:02:29'),
(7, 1, 1, 'Áo Vest Nâu LH26', 1800000, 'uploads/AO VEST LH26 NAU.jpg', 8, '2019-11-14 17:06:02', '2019-11-14 17:06:06'),
(8, 1, 1, 'Áo Vest Nâu 2HK', 1800000, 'uploads/AO VEST NAU 2HK.jpg', 5, '2019-11-14 17:09:01', '2019-11-14 17:09:05'),
(9, 1, 1, 'Áo Vest Nâu', 1800000, 'uploads/AO VEST NAU.jpg', 8, '2019-11-14 17:10:17', '2019-11-14 17:10:23'),
(10, 1, 1, 'Áo Vest Trắng 2 Khuy', 2200000, 'uploads/AO VEST TRANG 2 KHUY.jpg', 7, '2019-11-14 17:11:00', '2019-11-14 17:11:04'),
(11, 1, 1, 'Áo Vest Xanh Bò Tối', 2200000, 'uploads/AO VEST XANH BO TOI.jpg', 2, '2019-11-14 17:11:47', '2019-11-14 17:11:52'),
(12, 1, 1, 'Áo Vest Xanh Đen Nhũ', 2200000, 'uploads/AO VEST XANH DEN NHU.jpg', 2, '2019-11-14 17:12:27', '2019-11-14 17:12:31'),
(13, 1, 1, 'Áo Vest Xanh Nhũ Đỏ', 2200000, 'uploads/AO VEST XANH NHU DO.jpg', 2, '2019-11-14 17:13:05', '2019-11-14 17:13:08'),
(14, 1, 1, 'Áo Vest Xanh Rêu 2HK', 1800000, 'uploads/AO VEST XANH REU 2HK.jpg', 4, '2019-11-14 17:13:20', '2019-11-14 17:13:16'),
(15, 1, 1, 'Áo Vest Xanh Rêu', 1500000, 'uploads/AO VEST XANH REU.jpg', 9, '2019-11-14 17:14:08', '2019-11-14 17:14:12'),
(16, 1, 1, 'Áo Vest Xanh', 1500000, 'uploads/AO VEST XANH.jpg', 5, '2019-11-14 17:14:44', '2019-11-14 17:14:47'),
(17, 2, 1, 'Áo Sơ Mi BBR Cao Cấp Nâu Sáng Kẻ', 1, 'uploads/AO SO MI BBR CAO CAP NAU SANG KE.jpg', 1, '2019-11-15 13:14:57', NULL),
(18, 2, 1, 'Áo Sơ Mi Cao Cấp Ghi Vân Vàng', 1, 'uploads/AO SO MI CAO CAP GHI VAN VANG.jpg', 1, '2019-11-15 13:14:57', NULL),
(19, 2, 1, 'Áo Sơ Mi Cao Cấp Kẻ Xanh', 1, 'uploads/AO SO MI CAO CAP KE XANH.jpg', 1, '2019-11-15 13:14:57', NULL),
(20, 2, 1, 'Áo Sơ Mi Đen Nam Cao Cấp', 1, 'uploads/AO SO MI ĐEN NAM CAO CAP.jpg', 1, '2019-11-15 13:14:57', NULL),
(21, 2, 1, 'Áo Sơ Mi Đen Nam Phối Vai Nhũ', 1, 'uploads/AO SO MI ĐEN NAM PHOI VAI NHU.jpg', 1, '2019-11-15 13:14:57', NULL),
(22, 2, 1, 'Áo Sơ Mi Đen Nam Thêu Họa Tiết', 1, 'uploads/AO SO MI ĐEN NAM THEU HOA TIET.jpg', 1, '2019-11-15 13:14:57', NULL),
(23, 2, 1, 'Áo Sơ Mi Đen Nam VTC STORE', 1, 'uploads/AO SO MI ĐEN NAM VTC STORE.jpg', 1, '2019-11-15 13:14:57', NULL),
(24, 2, 1, 'Áo Sơ Mi Đen Nam Xếp Ly Ngang', 1, 'uploads/AO SO MI ĐEN NAM XEP LY NGANG.jpg', 1, '2019-11-15 13:14:57', NULL),
(25, 2, 1, 'Áo Sơ Mi Đẹp Nam Ghi Hoa', 1, 'uploads/AO SO MI ĐEP NAM GHI HOA.jpg', 1, '2019-11-15 13:14:57', NULL),
(26, 2, 1, 'Áo Sơ Mi Họa Tiết Sáng Màu', 1, 'uploads/AO SO MI HOA TIET SANG MAU.jpg', 1, '2019-11-15 13:14:57', NULL),
(27, 2, 1, 'Áo Sơ Mi Kẻ Ghi Nam', 1, 'uploads/AO SO MI KE GHI NAM.jpg', 1, '2019-11-15 13:14:57', NULL),
(28, 2, 1, 'Áo Sơ Mi Nam BBR Nâu Kẻ Đen', 1, 'uploads/AO SO MI NAM BBR NAU KE ĐEN.jpg', 1, '2019-11-15 13:14:57', NULL),
(29, 2, 1, 'Áo Sơ Mi Nam BBR Xanh Sẫm', 1, 'uploads/AO SO MI NAM BBR XANH SAM.jpg', 1, '2019-11-15 13:14:57', NULL),
(30, 2, 1, 'Áo Sơ Mi Nam Cao Cấp Ghi Đậm Vân Chìm', 1, 'uploads/AO SO MI NAM CAO CAP GHI ĐAM VAN CHIM.jpg', 1, '2019-11-15 13:14:57', NULL),
(31, 2, 1, 'Áo Sơ Mi Nam Cao Cấp Họa Tiết', 1, 'uploads/AO SO MI NAM CAO CAP HOA TIET.jpg', 1, '2019-11-15 13:14:57', NULL),
(32, 2, 1, 'Áo Sơ Mi Nam Cao Cấp Kẻ Ghi Sáng', 1, 'uploads/AO SO MI NAM CAO CAP KE GHI SANG.jpg', 1, '2019-11-15 13:14:57', NULL),
(33, 3, 1, 'Cà Vạt Đẹp VTCV0013', 1, 'uploads/CA VAT DEP VTCV0013.jpg', 1, '2019-11-15 13:42:47', NULL),
(34, 3, 1, 'Cà Vạt Đẹp VTCV0031', 1, 'uploads/CA VAT DEP VTCV0031.jpg', 1, '2019-11-15 13:42:47', NULL),
(35, 3, 1, 'Cà Vạt Đẹp VTCV0034', 1, 'uploads/CA VAT DEP VTCV0034.jpg', 1, '2019-11-15 13:42:47', NULL),
(36, 3, 1, 'Cà Vạt Đẹp VTCV0038', 1, 'uploads/CA VAT DEP VTCV0038.jpg', 1, '2019-11-15 13:42:47', NULL),
(37, 3, 1, 'Cà Vạt Đẹp VTCV0039', 1, 'uploads/CA VAT DEP VTCV0039.jpg', 1, '2019-11-15 13:42:47', NULL),
(38, 3, 1, 'Cà Vạt Đẹp VTCV0045', 1, 'uploads/CA VAT DEP VTCV0045.jpg', 1, '2019-11-15 13:42:47', NULL),
(39, 3, 1, 'Cà Vạt Đẹp VTCV0046', 1, 'uploads/CA VAT DEP VTCV0046.jpg', 1, '2019-11-15 13:42:47', NULL),
(40, 3, 1, 'Cà Vạt Nam VTCV0011', 1, 'uploads/CA VAT NAM VTCV0011.jpg', 1, '2019-11-15 13:42:47', NULL),
(41, 3, 1, 'Cà Vạt Nam VTCV0012', 1, 'uploads/CA VAT NAM VTCV0012.jpg', 1, '2019-11-15 13:42:47', NULL),
(42, 3, 1, 'Cà Vạt Nam VTCV0018', 1, 'uploads/CA VAT NAM VTCV0018.jpg', 1, '2019-11-15 13:42:47', NULL),
(43, 3, 1, 'Cà Vạt Nam VTCV0027', 1, 'uploads/CA VAT NAM VTCV0027.jpg', 1, '2019-11-15 13:42:47', NULL),
(44, 3, 1, 'Cà Vạt Nam VTCV0028', 1, 'uploads/CA VAT NAM VTCV0028.jpg', 1, '2019-11-15 13:42:47', NULL),
(45, 3, 1, 'Cà Vạt Nam VTCV0041', 1, 'uploads/CA VAT NAM VTCV0041.jpg', 1, '2019-11-15 13:42:47', NULL),
(46, 3, 1, 'Cà Vạt Nam VTCV0048', 1, 'uploads/CA VAT NAM VTCV0048.jpg', 1, '2019-11-15 13:42:47', NULL),
(47, 3, 1, 'Cà Vạt Nam VTCV0049', 1, 'uploads/CA VAT NAM VTCV0049.jpg', 1, '2019-11-15 13:42:47', NULL),
(48, 3, 1, 'Cà Vạt VTCV0038', 1, 'uploads/CA VAT VTCV0038.jpg', 1, '2019-11-15 13:42:47', NULL),
(49, 3, 1, 'Nơ 250', 1, 'uploads/NO 250.jpg', 1, '2019-11-15 13:43:32', NULL),
(50, 3, 1, 'Nơ Cài VEST VTN0039', 1, 'uploads/NO CAI VEST VTN0039.jpg', 1, '2019-11-15 13:43:32', NULL),
(51, 3, 1, 'Nơ Cài VEST VTN0040', 1, 'uploads/NO CAI VEST VTN0040.jpg', 1, '2019-11-15 13:43:32', NULL),
(52, 3, 1, 'Nơ Cài VEST VTN0041', 1, 'uploads/NO CAI VEST VTN0041.jpg', 1, '2019-11-15 13:43:32', NULL),
(53, 3, 1, 'Nơ Cài VEST VTN0044', 1, 'uploads/NO CAI VEST VTN0044.jpg', 1, '2019-11-15 13:43:32', NULL),
(54, 3, 1, 'Nơ Cài VEST VTN0045', 1, 'uploads/NO CAI VEST VTN0045.jpg', 1, '2019-11-15 13:43:32', NULL),
(55, 3, 1, 'Nơ Cài VEST VTN0048', 1, 'uploads/NO CAI VEST VTN0048.jpg', 1, '2019-11-15 13:43:32', NULL),
(56, 3, 1, 'Nơ Cài VEST VTN0051', 1, 'uploads/NO CAI VEST VTN0051.jpg', 1, '2019-11-15 13:43:32', NULL),
(57, 3, 1, 'Nơ Cài VEST VTN0052', 1, 'uploads/NO CAI VEST VTN0052.jpg', 1, '2019-11-15 13:43:32', NULL),
(58, 3, 1, 'Nơ Cài VEST VTN0053', 1, 'uploads/NO CAI VEST VTN0053.jpg', 1, '2019-11-15 13:43:32', NULL),
(59, 3, 1, 'Nơ Cài VEST VTN0065', 1, 'uploads/NO CAI VEST VTN0065.jpg', 1, '2019-11-15 13:43:32', NULL),
(60, 3, 1, 'Khăn Áo VEST VTK0025', 1, 'uploads/KHAN AO VEST VTK0025.jpg', 1, '2019-11-15 13:43:32', NULL),
(61, 3, 1, 'Khăn Áo VEST VTK0026', 1, 'uploads/KHAN AO VEST VTK0026.jpg', 1, '2019-11-15 13:43:32', NULL),
(62, 3, 1, 'Khăn Áo VEST VTK0027', 1, 'uploads/KHAN AO VEST VTK0027.jpg', 1, '2019-11-15 13:43:32', NULL),
(63, 3, 1, 'Khăn Áo VEST VTK0028', 1, 'uploads/KHAN AO VEST VTK0028.jpg', 1, '2019-11-15 13:43:32', NULL),
(64, 3, 1, 'Khăn Áo VEST VTK0031', 1, 'uploads/KHAN AO VEST VTK0031.jpg', 1, '2019-11-15 13:43:32', NULL),
(65, 3, 1, 'Khăn Áo VEST VTK0033', 1, 'uploads/KHAN AO VEST VTK0033.jpg', 1, '2019-11-15 13:43:37', NULL),
(66, 3, 1, 'Khăn Áo VEST VTK0034', 1, 'uploads/KHAN AO VEST VTK0034.jpg', 1, '2019-11-15 13:43:37', NULL),
(67, 3, 1, 'Khăn Áo VEST VTK0035', 1, 'uploads/KHAN AO VEST VTK0035.jpg', 1, '2019-11-15 13:43:37', NULL),
(68, 3, 1, 'Khăn Áo VEST VTK0038', 1, 'uploads/KHAN AO VEST VTK0038.jpg', 1, '2019-11-15 13:43:37', NULL),
(69, 3, 1, 'Khăn Áo VEST VTK0039', 1, 'uploads/KHAN AO VEST VTK0039.jpg', 1, '2019-11-15 13:43:37', NULL),
(70, 3, 1, 'Khăn Cài Túi Áo VEST VTK0008', 1, 'uploads/KHAN CAI TUI AO VEST VTK0008.jpg', 1, '2019-11-15 13:43:37', NULL),
(71, 3, 1, 'Khăn Cài Túi Áo VEST VTK0009', 1, 'uploads/KHAN CAI TUI AO VEST VTK0009.jpg', 1, '2019-11-15 13:43:37', NULL),
(72, 3, 1, 'Khăn Cài Túi Áo VEST VTK0011', 1, 'uploads/KHAN CAI TUI AO VEST VTK0011.jpg', 1, '2019-11-15 13:43:37', NULL),
(73, 3, 1, 'Khăn Cài Túi Áo VEST VTK0012', 1, 'uploads/KHAN CAI TUI AO VEST VTK0012.jpg', 1, '2019-11-15 13:43:37', NULL),
(74, 3, 1, 'Khăn Cài Túi Áo VEST VTK0013', 1, 'uploads/KHAN CAI TUI AO VEST VTK0013.jpg', 1, '2019-11-15 13:43:37', NULL),
(75, 3, 1, 'Khăn Cài Túi Áo VEST VTK0014', 1, 'uploads/KHAN CAI TUI AO VEST VTK0014.jpg', 1, '2019-11-15 13:43:37', NULL),
(76, 4, 1, 'Giày Âu Nam Chấm Nhỏ TAG GUCCI', 1, 'uploads/GIAY AU NAM CHAM NHO TAG GUCCI.jpg', 1, '2019-11-15 13:43:37', NULL),
(77, 4, 1, 'Giày Âu Nam Đen TAG Trắng VTC STORE', 1, 'uploads/GIAY AU NAM DEN TAG TRANG VTC STORE.jpg', 1, '2019-11-15 13:43:37', NULL),
(78, 4, 1, 'Giày Âu Nam Đen Thừng Kép', 1, 'uploads/GIAY AU NAM DEN THUNG KEP.jpg', 1, '2019-11-15 13:43:37', NULL),
(79, 4, 1, 'Giày Âu Nam Nâu Họa Tiết Thừng Kép', 1, 'uploads/GIAY AU NAM NAU HOA TIET THUNG KEP.jpg', 1, '2019-11-15 13:43:37', NULL),
(80, 4, 1, 'Giày Công Sở Nam Đen Bóng TAG Ngang', 1, 'uploads/GIAY CONG SO NAM ĐEN BONG TAG NGANG.jpg', 1, '2019-11-15 13:43:37', NULL),
(81, 4, 1, 'Giày Da Đen Vân Cá Sấu', 1, 'uploads/GIAY DA DEN VAN CA SAU.jpg', 1, '2019-11-15 16:04:48', NULL),
(82, 4, 1, 'Giày Da Nam Công Sở Nâu Quai Ngang', 1, 'uploads/GIAY DA NAM CONG SO NAU QUAI NGANG.jpg', 1, '2019-11-15 16:04:48', NULL),
(83, 4, 1, 'Giày Da Nam Đen Sần Mới', 1, 'uploads/GIAY DA NAM DEN SAN MOI.jpg', 1, '2019-11-15 16:04:48', NULL),
(84, 4, 1, 'Giày Da Nam Đen TAG Ngang VTC STORE', 1, 'uploads/GIAY DA NAM DEN TAG NGANG VTC STORE.jpg', 1, '2019-11-15 16:04:48', NULL),
(85, 4, 1, 'Giày Da Nam Đen Thừng VTC STORE', 1, 'uploads/GIAY DA NAM DEN THUNG VTC STORE.jpg', 1, '2019-11-15 16:04:48', NULL),
(86, 4, 1, 'Giày Da Nam Đẹp Đen Sần TAG Đen', 1, 'uploads/GIAY DA NAM DEP DEN SAN TAG ĐEN.jpg', 1, '2019-11-15 16:04:48', NULL),
(87, 4, 1, 'Giày Da Nam Đẹp Phối Nhung', 1, 'uploads/GIAY DA NAM DEP PHOI NHUNG.jpg', 1, '2019-11-15 16:04:48', NULL),
(88, 4, 1, 'Giày Da Nam Sần VTC STORE', 1, 'uploads/GIAY DA NAM SAN VTC STORE.jpg', 1, '2019-11-15 16:04:48', NULL),
(89, 4, 1, 'Giày Lười Da Nam Đen Sần TAG Vàng', 1, 'uploads/GIAY LUOI DA NAM DEN SAN TAG VÀNG.jpg', 1, '2019-11-15 16:04:48', NULL),
(90, 4, 1, 'Giày Lười Nam Đen Bóng TAG Quai Sần', 1, 'uploads/GIAY LUOI NAM DEN BONG TAG QUAI SẦN.jpg', 1, '2019-11-15 16:04:48', NULL),
(91, 4, 1, 'Giày Lười Nam Đen VTC STORE', 1, 'uploads/GIAY LUOI NAM DEN VTC STORE.jpg', 1, '2019-11-15 16:04:48', NULL),
(92, 5, 1, 'Đen Cổ Lông', 1, 'uploads/DEN CO LONG.jpg', 1, '2019-11-15 17:01:34', NULL),
(93, 5, 1, 'Áo Đen TXVT7258D', 1, 'uploads/DEN TXVT7258D.jpg', 1, '2019-11-15 17:01:34', NULL),
(94, 5, 1, 'Áo Ghi AKBB909G', 1, 'uploads/GHI AKBB909G.jpg', 1, '2019-11-15 17:01:34', NULL),
(95, 5, 1, 'Áo Ghi VT9928G', 1, 'uploads/GHI VT9928G.jpg', 1, '2019-11-15 17:01:34', NULL),
(96, 5, 1, 'Màu Mận Cổ Lông', 1, 'uploads/MAU MAN CO LONG.jpg', 1, '2019-11-15 17:01:34', NULL),
(97, 5, 1, 'Màu Mận', 1, 'uploads/MAU MAN.jpg', 1, '2019-11-15 17:01:34', NULL),
(98, 5, 1, 'Áo Nâu VT9912N', 1, 'uploads/NAU VT9912N.jpg', 1, '2019-11-15 17:01:34', NULL),
(99, 5, 1, 'Áo Nâu VT9915N', 1, 'uploads/NAU VT9915N.jpg', 1, '2019-11-15 17:01:34', NULL),
(100, 5, 1, 'Áo Nâu VT9918N', 1, 'uploads/NAU VT9918N.jpg', 1, '2019-11-15 17:01:34', NULL),
(101, 5, 1, 'Áo Trắng AKBB909T', 1, 'uploads/TRANG AKBB909T.jpg', 1, '2019-11-15 17:01:34', NULL),
(102, 5, 1, 'Áo Trắng AKBB951T', 1, 'uploads/TRANG AKBB951T.jpg', 1, '2019-11-15 17:01:34', NULL),
(103, 5, 1, 'Áo Xanh 9920X', 1, 'uploads/XANH 9920X.jpg', 1, '2019-11-15 17:01:34', NULL),
(104, 5, 1, 'Áo Xanh VT9912X', 1, 'uploads/XANH VT9912X.jpg', 1, '2019-11-15 17:01:34', NULL),
(105, 6, 1, 'Quần Âu Cao Cấp Kẻ Nhỏ', 1, 'uploads/QUAN AU CAO CAP KE NHO.jpg', 1, '2019-11-15 17:46:10', NULL),
(106, 6, 1, 'Quần Âu Cao Cấp Xanh Ánh', 1, 'uploads/QUAN AU CAO CAP XANH ANH.jpg', 1, '2019-11-15 17:46:10', NULL),
(107, 6, 1, 'Quần Âu Cao Cấp Xanh Rêu', 1, 'uploads/QUAN AU CAO CAP XANH REU.jpg', 1, '2019-11-15 17:46:10', NULL),
(108, 6, 1, 'Quần Âu Đen', 1, 'uploads/QUAN AU DEN.jpg', 1, '2019-11-15 17:46:10', NULL),
(109, 6, 1, 'Quần Âu Hàn Quốc Ghi Sáng', 1, 'uploads/QUAN AU HAN QUOC GHI SANG.jpg', 1, '2019-11-15 17:46:10', NULL),
(110, 6, 1, 'Quần Âu Kẻ Ô Xanh Đen', 1, 'uploads/QUAN AU KE O XANH DEN.jpg', 1, '2019-11-15 17:46:10', NULL),
(111, 6, 1, 'Quần Âu Nam Xanh', 1, 'uploads/QUAN AU NAM XANH.jpg', 1, '2019-11-15 17:46:10', NULL),
(112, 6, 1, 'Quần Âu Nam Be Xước', 1, 'uploads/QUAN AU NAM BE XUOC.jpg', 1, '2019-11-15 17:46:10', NULL),
(113, 6, 1, 'Quần Âu Nam Cao Cấp Nâu Kẻ', 1, 'uploads/QUAN AU NAM CAO CAP NAU KE.jpg', 1, '2019-11-15 17:46:10', NULL),
(114, 6, 1, 'Quần Âu Nam Đen Kẻ LH38', 1, 'uploads/QUAN AU NAM DEN KE LH38.jpg', 1, '2019-11-15 17:46:10', NULL),
(115, 6, 1, 'Quần Âu Nam Đen Kẻ', 1, 'uploads/QUAN AU NAM DEN KE.jpg', 1, '2019-11-15 17:46:10', NULL),
(116, 6, 1, 'Quần Âu Nam Đẹp Ghi Kẻ', 1, 'uploads/QUAN AU NAM DEP GHI KE.jpg', 1, '2019-11-15 17:46:10', NULL),
(117, 6, 1, 'Quần Âu Nam Đẹp Kẻ Ghi', 1, 'uploads/QUAN AU NAM DEP KE GHI.jpg', 1, '2019-11-15 17:46:10', NULL),
(118, 6, 1, 'Quần Âu Nam Đẹp Kẻ Xanh Đỏ', 1, 'uploads/QUAN AU NAM DEP KE XANH DO.jpg', 1, '2019-11-15 17:46:10', NULL),
(119, 6, 1, 'Quần Âu Nam Đẹp Tím Sẫm', 1, 'uploads/QUAN AU NAM DEP TIM SAM.jpg', 1, '2019-11-15 17:46:10', NULL),
(120, 6, 1, 'Quần Âu Nam Đẹp Xanh Cốm', 1, 'uploads/QUAN AU NAM DEP XANH COM.jpg', 1, '2019-11-15 17:46:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `size_id` bigint(20) NOT NULL,
  `quantity_stock` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) NOT NULL,
  `name` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `phone_number`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'HN', '0987654321', 'admin@gmail.com', '$2y$10$pF91OeFg/ZdNTWkrSBidhepdy3y2yjpvkeRGqiSGJk/MWzgPyF19K', 1, '2019-11-13 19:04:43', '2019-11-13 19:04:43'),
(17, 'Ngo Duc Nam', 'LS', '0356969828', 'nam@gmail.com', '$2y$10$oe1/l6GuglSMjczkiVluA.VMoEEYguD9.DxIU7u06sOhn5mUWIoMS', 2, '2019-11-13 22:49:21', '2019-11-14 17:34:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_unique` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
