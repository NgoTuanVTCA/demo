-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:7888
-- Generation Time: Nov 19, 2019 at 04:00 PM
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
-- Table structure for table `products`
--
 drop database vtcs_dev;
 create database vtcs_dev;
 use vtcs_dev;
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
SELECT * FROM products where categories_id = '1' order by id desc;

INSERT INTO `products` (`id`, `categories_id`, `brand_id`, `name`, `price`, `image`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Áo Vest Đen Cổ Sẫm (NEW)', 2000000, 'vest/AO VEST DEN CO SAM (NEW).jpg', 1, '2019-11-09 12:46:25', '2019-11-09 12:46:25'),
(2, 1, 1, 'Áo Vest Đen Thường (NEW)', 1000000, 'vest/AO VEST DEN THUONG (NEW).jpg', 2, '2019-11-09 12:50:58', '2019-11-09 12:50:58'),
(3, 1, 1, 'Áo Vest Đen Vá Viền (NEW)', 2200000, 'vest/AO VEST DVVMM.jpg', 3, '2019-11-09 13:03:44', '2019-11-09 13:03:44'),
(4, 1, 1, 'Áo Vest Kẻ Ô Xanh Sẫm', 2400000, 'vest/AO VEST KE O XANH SAM.jpg', 4, '2019-11-10 15:58:25', '2019-11-10 15:58:25'),
(5, 1, 1, 'Áo Vest Kẻ Ô Xanh', 2500000, 'vest/AO VEST KE O XANH SANG.jpg', 5, '2019-11-12 03:02:20', '2019-11-12 03:02:20'),
(6, 1, 1, 'Áo Vest Kẻ Xanh Ô Đỏ', 2600000, 'vest/AO VEST KE XANH O DO.jpg', 6, '2019-11-12 03:02:29', '2019-11-12 03:02:29'),
(7, 1, 1, 'Áo Vest Nâu LH26', 1800000, 'vest/AO VEST LH26 NAU.jpg', 8, '2019-11-14 17:06:02', '2019-11-14 17:06:06'),
(8, 1, 1, 'Áo Vest Nâu 2HK', 1800000, 'vest/AO VEST NAU 2HK.jpg', 5, '2019-11-14 17:09:01', '2019-11-14 17:09:05'),
(9, 1, 1, 'Áo Vest Nâu', 1800000, 'vest/AO VEST NAU.jpg', 8, '2019-11-14 17:10:17', '2019-11-14 17:10:23'),
(10, 1, 1, 'Áo Vest Trắng 2 Khuy', 2200000, 'vest/AO VEST TRANG 2 KHUY.jpg', 7, '2019-11-14 17:11:00', '2019-11-14 17:11:04'),
(11, 1, 1, 'Áo Vest Xanh Bò Tối', 2200000, 'vest/AO VEST XANH BO TOI.jpg', 2, '2019-11-14 17:11:47', '2019-11-14 17:11:52'),
(12, 1, 1, 'Áo Vest Xanh Đen Nhũ', 2200000, 'vest/AO VEST XANH DEN NHU.jpg', 2, '2019-11-14 17:12:27', '2019-11-14 17:12:31'),
(13, 1, 1, 'Áo Vest Xanh Nhũ Đỏ', 2200000, 'vest/AO VEST XANH NHU DO.jpg', 2, '2019-11-14 17:13:05', '2019-11-14 17:13:08'),
(14, 1, 1, 'Áo Vest Xanh Rêu 2HK', 1800000, 'vest/AO VEST XANH REU 2HK.jpg', 4, '2019-11-14 17:13:20', '2019-11-14 17:13:16'),
(15, 1, 1, 'Áo Vest Xanh Rêu', 1500000, 'vest/AO VEST XANH REU.jpg', 9, '2019-11-14 17:14:08', '2019-11-14 17:14:12'),
(16, 1, 1, 'Áo Vest Xanh', 1500000, 'vest/AO VEST XANH.jpg', 5, '2019-11-14 17:14:44', '2019-11-14 17:14:47'),
(17, 2, 1, 'Áo Sơ Mi BBR Cao Cấp Nâu Sáng Kẻ', 1, 'so_mi/AO SO MI BBR CAO CAP NAU SANG KE.jpg', 1, '2019-11-15 13:14:57', '2019-11-15 13:14:57'),
(18, 2, 1, 'Áo Sơ Mi Cao Cấp Ghi Vân Vàng', 1, 'so_mi/AO SO MI CAO CAP GHI VAN VANG.jpg', 1, '2019-11-15 13:14:57', '2019-11-15 13:14:57'),
(19, 2, 1, 'Áo Sơ Mi Cao Cấp Kẻ Xanh', 1, 'so_mi/AO SO MI CAO CAP KE XANH.jpg', 1, '2019-11-15 13:14:57', '2019-11-15 13:14:57'),
(20, 2, 1, 'Áo Sơ Mi Đen Nam Cao Cấp', 1, 'so_mi/AO SO MI ĐEN NAM CAO CAP.jpg', 1, '2019-11-15 13:14:57', '2019-11-15 13:14:57'),
(21, 2, 1, 'Áo Sơ Mi Đen Nam Phối Vai Nhũ', 1, 'so_mi/AO SO MI ĐEN NAM PHOI VAI NHU.jpg', 1, '2019-11-15 13:14:57', '2019-11-15 13:14:57'),
(22, 2, 1, 'Áo Sơ Mi Đen Nam Thêu Họa Tiết', 1, 'so_mi/AO SO MI ĐEN NAM THEU HOA TIET.jpg', 1, '2019-11-15 13:14:57', '2019-11-15 13:14:57'),
(23, 2, 1, 'Áo Sơ Mi Đen Nam VTC STORE', 1, 'so_mi/AO SO MI ĐEN NAM VTC STORE.jpg', 1, '2019-11-15 13:14:57', '2019-11-15 13:14:57'),
(24, 2, 1, 'Áo Sơ Mi Đen Nam Xếp Ly Ngang', 1, 'so_mi/AO SO MI ĐEN NAM XEP LY NGANG.jpg', 1, '2019-11-15 13:14:57', '2019-11-15 13:14:57'),
(25, 2, 1, 'Áo Sơ Mi Đẹp Nam Ghi Hoa', 1, 'so_mi/AO SO MI ĐEP NAM GHI HOA.jpg', 1, '2019-11-15 13:14:57', '2019-11-15 13:14:57'),
(26, 2, 1, 'Áo Sơ Mi Họa Tiết Sáng Màu', 1, 'so_mi/AO SO MI HOA TIET SANG MAU.jpg', 1, '2019-11-15 13:14:57', '2019-11-15 13:14:57'),
(27, 2, 1, 'Áo Sơ Mi Kẻ Ghi Nam', 1, 'so_mi/AO SO MI KE GHI NAM.jpg', 1, '2019-11-15 13:14:57', '2019-11-15 13:14:57'),
(28, 2, 1, 'Áo Sơ Mi Nam BBR Nâu Kẻ Đen', 1, 'so_mi/AO SO MI NAM BBR NAU KE ĐEN.jpg', 1, '2019-11-15 13:14:57', '2019-11-15 13:14:57'),
(29, 2, 1, 'Áo Sơ Mi Nam BBR Xanh Sẫm', 1, 'so_mi/AO SO MI NAM BBR XANH SAM.jpg', 1, '2019-11-15 13:14:57', '2019-11-15 13:14:57'),
(30, 2, 1, 'Áo Sơ Mi Nam Cao Cấp Ghi Đậm Vân Chìm', 1, 'so_mi/AO SO MI NAM CAO CAP GHI ĐAM VAN CHIM.jpg', 1, '2019-11-15 13:14:57', '2019-11-15 13:14:57'),
(31, 2, 1, 'Áo Sơ Mi Nam Cao Cấp Họa Tiết', 1, 'so_mi/AO SO MI NAM CAO CAP HOA TIET.jpg', 1, '2019-11-15 13:14:57', '2019-11-15 13:14:57'),
(32, 2, 1, 'Áo Sơ Mi Nam Cao Cấp Kẻ Ghi Sáng', 1, 'so_mi/AO SO MI NAM CAO CAP KE GHI SANG.jpg', 1, '2019-11-15 13:14:57', '2019-11-15 13:14:57'),
(33, 3, 1, 'Cà Vạt Đẹp VTCV0013', 1, 'caravat/CA VAT DEP VTCV0013.jpg', 1, '2019-11-15 13:42:47', '2019-11-15 13:42:47'),
(34, 3, 1, 'Cà Vạt Đẹp VTCV0031', 1, 'caravat/CA VAT DEP VTCV0031.jpg', 1, '2019-11-15 13:42:47', '2019-11-15 13:42:47'),
(35, 3, 1, 'Cà Vạt Đẹp VTCV0034', 1, 'caravat/CA VAT DEP VTCV0034.jpg', 1, '2019-11-15 13:42:47', '2019-11-15 13:42:47'),
(36, 3, 1, 'Cà Vạt Đẹp VTCV0038', 1, 'caravat/CA VAT DEP VTCV0038.jpg', 1, '2019-11-15 13:42:47', '2019-11-15 13:42:47'),
(37, 3, 1, 'Cà Vạt Đẹp VTCV0039', 1, 'caravat/CA VAT DEP VTCV0039.jpg', 1, '2019-11-15 13:42:47', '2019-11-15 13:42:47'),
(38, 3, 1, 'Cà Vạt Đẹp VTCV0045', 1, 'caravat/CA VAT DEP VTCV0045.jpg', 1, '2019-11-15 13:42:47', '2019-11-15 13:42:47'),
(39, 3, 1, 'Cà Vạt Đẹp VTCV0046', 1, 'caravat/CA VAT DEP VTCV0046.jpg', 1, '2019-11-15 13:42:47', '2019-11-15 13:42:47'),
(40, 3, 1, 'Cà Vạt Nam VTCV0011', 1, 'caravat/CA VAT NAM VTCV0011.jpg', 1, '2019-11-15 13:42:47', '2019-11-15 13:42:47'),
(41, 3, 1, 'Cà Vạt Nam VTCV0012', 1, 'caravat/CA VAT NAM VTCV0012.jpg', 1, '2019-11-15 13:42:47', '2019-11-15 13:42:47'),
(42, 3, 1, 'Cà Vạt Nam VTCV0018', 1, 'caravat/CA VAT NAM VTCV0018.jpg', 1, '2019-11-15 13:42:47', '2019-11-15 13:42:47'),
(43, 3, 1, 'Cà Vạt Nam VTCV0027', 1, 'caravat/CA VAT NAM VTCV0027.jpg', 1, '2019-11-15 13:42:47', '2019-11-15 13:42:47'),
(44, 3, 1, 'Cà Vạt Nam VTCV0028', 1, 'caravat/CA VAT NAM VTCV0028.jpg', 1, '2019-11-15 13:42:47', '2019-11-15 13:42:47'),
(45, 3, 1, 'Cà Vạt Nam VTCV0041', 1, 'caravat/CA VAT NAM VTCV0041.jpg', 1, '2019-11-15 13:42:47', '2019-11-15 13:42:47'),
(46, 3, 1, 'Cà Vạt Nam VTCV0048', 1, 'caravat/CA VAT NAM VTCV0048.jpg', 1, '2019-11-15 13:42:47', '2019-11-15 13:42:47'),
(47, 3, 1, 'Cà Vạt Nam VTCV0049', 1, 'caravat/CA VAT NAM VTCV0049.jpg', 1, '2019-11-15 13:42:47', '2019-11-15 13:42:47'),
(48, 3, 1, 'Cà Vạt VTCV0038', 1, 'caravat/CA VAT VTCV0038.jpg', 1, '2019-11-15 13:42:47', '2019-11-15 13:42:47'),
(49, 4, 1, 'Nơ 250', 1, 'no/NO 250.jpg', 1, '2019-11-15 13:43:32', '2019-11-15 13:43:32'),
(50, 4, 1, 'Nơ Cài VEST VTN0039', 1, 'no/NO CAI VEST VTN0039.jpg', 1, '2019-11-15 13:43:32', '2019-11-15 13:43:32'),
(51, 4, 1, 'Nơ Cài VEST VTN0040', 1, 'no/NO CAI VEST VTN0040.jpg', 1, '2019-11-15 13:43:32', '2019-11-15 13:43:32'),
(52, 4, 1, 'Nơ Cài VEST VTN0041', 1, 'no/NO CAI VEST VTN0041.jpg', 1, '2019-11-15 13:43:32', '2019-11-15 13:43:32'),
(53, 4, 1, 'Nơ Cài VEST VTN0044', 1, 'no/NO CAI VEST VTN0044.jpg', 1, '2019-11-15 13:43:32', '2019-11-15 13:43:32'),
(54, 4, 1, 'Nơ Cài VEST VTN0045', 1, 'no/NO CAI VEST VTN0045.jpg', 1, '2019-11-15 13:43:32', '2019-11-15 13:43:32'),
(55, 4, 1, 'Nơ Cài VEST VTN0048', 1, 'no/NO CAI VEST VTN0048.jpg', 1, '2019-11-15 13:43:32', '2019-11-15 13:43:32'),
(56, 4, 1, 'Nơ Cài VEST VTN0051', 1, 'no/NO CAI VEST VTN0051.jpg', 1, '2019-11-15 13:43:32', '2019-11-15 13:43:32'),
(57, 4, 1, 'Nơ Cài VEST VTN0052', 1, 'no/NO CAI VEST VTN0052.jpg', 1, '2019-11-15 13:43:32', '2019-11-15 13:43:32'),
(58, 4, 1, 'Nơ Cài VEST VTN0053', 1, 'no/NO CAI VEST VTN0053.jpg', 1, '2019-11-15 13:43:32', '2019-11-15 13:43:32'),
(59, 4, 1, 'Nơ Cài VEST VTN0065', 1, 'no/NO CAI VEST VTN0065.jpg', 1, '2019-11-15 13:43:32', '2019-11-15 13:43:32'),
(60, 5, 1, 'Khăn Áo VEST VTK0025', 1, 'khan_cai_vest/KHAN AO VEST VTK0025.jpg', 1, '2019-11-15 13:43:32', '2019-11-15 13:43:32'),
(61, 5, 1, 'Khăn Áo VEST VTK0026', 1, 'khan_cai_vest/KHAN AO VEST VTK0026.jpg', 1, '2019-11-15 13:43:32', '2019-11-15 13:43:32'),
(62, 5, 1, 'Khăn Áo VEST VTK0027', 1, 'khan_cai_vest/KHAN AO VEST VTK0027.jpg', 1, '2019-11-15 13:43:32', '2019-11-15 13:43:32'),
(63, 5, 1, 'Khăn Áo VEST VTK0028', 1, 'khan_cai_vest/KHAN AO VEST VTK0028.jpg', 1, '2019-11-15 13:43:32', '2019-11-15 13:43:32'),
(64, 5, 1, 'Khăn Áo VEST VTK0031', 1, 'khan_cai_vest/KHAN AO VEST VTK0031.jpg', 1, '2019-11-15 13:43:32', '2019-11-15 13:43:32'),
(65, 5, 1, 'Khăn Áo VEST VTK0033', 1, 'khan_cai_vest/KHAN AO VEST VTK0033.jpg', 1, '2019-11-15 13:43:37', '2019-11-15 13:43:37'),
(66, 5, 1, 'Khăn Áo VEST VTK0034', 1, 'khan_cai_vest/KHAN AO VEST VTK0034.jpg', 1, '2019-11-15 13:43:37', '2019-11-15 13:43:37'),
(67, 5, 1, 'Khăn Áo VEST VTK0035', 1, 'khan_cai_vest/KHAN AO VEST VTK0035.jpg', 1, '2019-11-15 13:43:37', '2019-11-15 13:43:37'),
(68, 5, 1, 'Khăn Áo VEST VTK0038', 1, 'khan_cai_vest/KHAN AO VEST VTK0038.jpg', 1, '2019-11-15 13:43:37', '2019-11-15 13:43:37'),
(69, 5, 1, 'Khăn Áo VEST VTK0039', 1, 'khan_cai_vest/KHAN AO VEST VTK0039.jpg', 1, '2019-11-15 13:43:37', '2019-11-15 13:43:37'),
(70, 5, 1, 'Khăn Cài Túi Áo VEST VTK0008', 1, 'khan_cai_vest/KHAN CAI TUI AO VEST VTK0008.jpg', 1, '2019-11-15 13:43:37', '2019-11-15 13:43:37'),
(71, 5, 1, 'Khăn Cài Túi Áo VEST VTK0009', 1, 'khan_cai_vest/KHAN CAI TUI AO VEST VTK0009.jpg', 1, '2019-11-15 13:43:37', '2019-11-15 13:43:37'),
(72, 5, 1, 'Khăn Cài Túi Áo VEST VTK0011', 1, 'khan_cai_vest/KHAN CAI TUI AO VEST VTK0011.jpg', 1, '2019-11-15 13:43:37', '2019-11-15 13:43:37'),
(73, 5, 1, 'Khăn Cài Túi Áo VEST VTK0012', 1, 'khan_cai_vest/KHAN CAI TUI AO VEST VTK0012.jpg', 1, '2019-11-15 13:43:37', '2019-11-15 13:43:37'),
(74, 5, 1, 'Khăn Cài Túi Áo VEST VTK0013', 1, 'khan_cai_vest/KHAN CAI TUI AO VEST VTK0013.jpg', 1, '2019-11-15 13:43:37', '2019-11-15 13:43:37'),
(75, 5, 1, 'Khăn Cài Túi Áo VEST VTK0014', 1, 'khan_cai_vest/KHAN CAI TUI AO VEST VTK0014.jpg', 1, '2019-11-15 13:43:37', '2019-11-15 13:43:37'),
(76, 6, 1, 'Giày Âu Nam Chấm Nhỏ TAG GUCCI', 1, 'giay_da/GIAY AU NAM CHAM NHO TAG GUCCI.jpg', 1, '2019-11-15 13:43:37', '2019-11-15 13:43:37'),
(77, 6, 1, 'Giày Âu Nam Đen TAG Trắng VTC STORE', 1, 'giay_da/GIAY AU NAM DEN TAG TRANG VTC STORE.jpg', 1, '2019-11-15 13:43:37', '2019-11-15 13:43:37'),
(78, 6, 1, 'Giày Âu Nam Đen Thừng Kép', 1, 'giay_da/GIAY AU NAM DEN THUNG KEP.jpg', 1, '2019-11-15 13:43:37', '2019-11-15 13:43:37'),
(79, 6, 1, 'Giày Âu Nam Nâu Họa Tiết Thừng Kép', 1, 'giay_da/GIAY AU NAM NAU HOA TIET THUNG KEP.jpg', 1, '2019-11-15 13:43:37', '2019-11-15 13:43:37'),
(80, 6, 1, 'Giày Công Sở Nam Đen Bóng TAG Ngang', 1, 'giay_da/GIAY CONG SO NAM ĐEN BONG TAG NGANG.jpg', 1, '2019-11-15 13:43:37', '2019-11-15 13:43:37'),
(81, 6, 1, 'Giày Da Đen Vân Cá Sấu', 1, 'giay_da/GIAY DA DEN VAN CA SAU.jpg', 1, '2019-11-15 16:04:48', '2019-11-15 16:04:48'),
(82, 6, 1, 'Giày Da Nam Công Sở Nâu Quai Ngang', 1, 'giay_da/GIAY DA NAM CONG SO NAU QUAI NGANG.jpg', 1, '2019-11-15 16:04:48', '2019-11-15 16:04:48'),
(83, 6, 1, 'Giày Da Nam Đen Sần Mới', 1, 'giay_da/GIAY DA NAM DEN SAN MOI.jpg', 1, '2019-11-15 16:04:48', '2019-11-15 16:04:48'),
(84, 6, 1, 'Giày Da Nam Đen TAG Ngang VTC STORE', 1, 'giay_da/GIAY DA NAM DEN TAG NGANG VTC STORE.jpg', 1, '2019-11-15 16:04:48', '2019-11-15 16:04:48'),
(85, 6, 1, 'Giày Da Nam Đen Thừng VTC STORE', 1, 'giay_da/GIAY DA NAM DEN THUNG VTC STORE.jpg', 1, '2019-11-15 16:04:48', '2019-11-15 16:04:48'),
(86, 6, 1, 'Giày Da Nam Đẹp Đen Sần TAG Đen', 1, 'giay_da/GIAY DA NAM DEP DEN SAN TAG ĐEN.jpg', 1, '2019-11-15 16:04:48', '2019-11-15 16:04:48'),
(87, 6, 1, 'Giày Da Nam Đẹp Phối Nhung', 1, 'giay_da/GIAY DA NAM DEP PHOI NHUNG.jpg', 1, '2019-11-15 16:04:48', '2019-11-15 16:04:48'),
(88, 6, 1, 'Giày Da Nam Sần VTC STORE', 1, 'giay_da/GIAY DA NAM SAN VTC STORE.jpg', 1, '2019-11-15 16:04:48', '2019-11-15 16:04:48'),
(89, 6, 1, 'Giày Lười Da Nam Đen Sần TAG Vàng', 1, 'giay_da/GIAY LUOI DA NAM DEN SAN TAG VÀNG.jpg', 1, '2019-11-15 16:04:48', '2019-11-15 16:04:48'),
(90, 6, 1, 'Giày Lười Nam Đen Bóng TAG Quai Sần', 1, 'giay_da/GIAY LUOI NAM DEN BONG TAG QUAI SẦN.jpg', 1, '2019-11-15 16:04:48', '2019-11-15 16:04:48'),
(91, 6, 1, 'Giày Lười Nam Đen VTC STORE', 1, 'giay_da/GIAY LUOI NAM DEN VTC STORE.jpg', 1, '2019-11-15 16:04:48', '2019-11-15 16:04:48'),
(92, 7, 1, 'Đen Cổ Lông', 1, 'ao_da/DEN CO LONG.jpg', 1, '2019-11-15 17:01:34', '2019-11-15 17:01:34'),
(93, 7, 1, 'Áo Đen TXVT7258D', 1, 'ao_da/DEN TXVT7258D.jpg', 1, '2019-11-15 17:01:34', '2019-11-15 17:01:34'),
(94, 7, 1, 'Áo Ghi AKBB909G', 1, 'ao_da/GHI AKBB909G.jpg', 1, '2019-11-15 17:01:34', '2019-11-15 17:01:34'),
(95, 7, 1, 'Áo Ghi VT9928G', 1, 'ao_da/GHI VT9928G.jpg', 1, '2019-11-15 17:01:34', '2019-11-15 17:01:34'),
(96, 7, 1, 'Màu Mận Cổ Lông', 1, 'ao_da/MAU MAN CO LONG.jpg', 1, '2019-11-15 17:01:34', '2019-11-15 17:01:34'),
(97, 7, 1, 'Màu Mận', 1, 'ao_da/MAU MAN.jpg', 1, '2019-11-15 17:01:34', '2019-11-15 17:01:34'),
(98, 7, 1, 'Áo Nâu VT9912N', 1, 'ao_da/NAU VT9912N.jpg', 1, '2019-11-15 17:01:34', '2019-11-15 17:01:34'),
(99, 7, 1, 'Áo Nâu VT9915N', 1, 'ao_da/NAU VT9915N.jpg', 1, '2019-11-15 17:01:34', '2019-11-15 17:01:34'),
(100, 7, 1, 'Áo Nâu VT9918N', 1, 'ao_da/NAU VT9918N.jpg', 1, '2019-11-15 17:01:34', '2019-11-15 17:01:34'),
(101, 7, 1, 'Áo Trắng AKBB909T', 1, 'ao_da/TRANG AKBB909T.jpg', 1, '2019-11-15 17:01:34', '2019-11-15 17:01:34'),
(102, 7, 1, 'Áo Trắng AKBB951T', 1, 'ao_da/TRANG AKBB951T.jpg', 1, '2019-11-15 17:01:34', '2019-11-15 17:01:34'),
(103, 7, 1, 'Áo Xanh 9920X', 1, 'ao_da/XANH 9920X.jpg', 1, '2019-11-15 17:01:34', '2019-11-15 17:01:34'),
(104, 7, 1, 'Áo Xanh VT9912X', 1, 'ao_da/XANH VT9912X.jpg', 1, '2019-11-15 17:01:34', '2019-11-15 17:01:34'),
(105, 8, 1, 'Quần Âu Cao Cấp Kẻ Nhỏ', 1, 'quan_au/QUAN AU CAO CAP KE NHO.jpg', 1, '2019-11-15 17:46:10', '2019-11-15 17:46:10'),
(106, 8, 1, 'Quần Âu Cao Cấp Xanh Ánh', 1, 'quan_au/QUAN AU CAO CAP XANH ANH.jpg', 1, '2019-11-15 17:46:10', '2019-11-15 17:46:10'),
(107, 8, 1, 'Quần Âu Cao Cấp Xanh Rêu', 1, 'quan_au/QUAN AU CAO CAP XANH REU.jpg', 1, '2019-11-15 17:46:10', '2019-11-15 17:46:10'),
(108, 8, 1, 'Quần Âu Đen', 1, 'quan_au/QUAN AU DEN.jpg', 1, '2019-11-15 17:46:10', '2019-11-15 17:46:10'),
(109, 8, 1, 'Quần Âu Hàn Quốc Ghi Sáng', 1, 'quan_au/QUAN AU HAN QUOC GHI SANG.jpg', 1, '2019-11-15 17:46:10', '2019-11-15 17:46:10'),
(110, 8, 1, 'Quần Âu Kẻ Ô Xanh Đen', 1, 'quan_au/QUAN AU KE O XANH DEN.jpg', 1, '2019-11-15 17:46:10', '2019-11-15 17:46:10'),
(111, 8, 1, 'Quần Âu Nam Xanh', 1, 'quan_au/QUAN AU NAM XANH.jpg', 1, '2019-11-15 17:46:10', '2019-11-15 17:46:10'),
(112, 8, 1, 'Quần Âu Nam Be Xước', 1, 'quan_au/QUAN AU NAM BE XUOC.jpg', 1, '2019-11-15 17:46:10', '2019-11-15 17:46:10'),
(113, 8, 1, 'Quần Âu Nam Cao Cấp Nâu Kẻ', 1, 'quan_au/QUAN AU NAM CAO CAP NAU KE.jpg', 1, '2019-11-15 17:46:10', '2019-11-15 17:46:10'),
(114, 8, 1, 'Quần Âu Nam Đen Kẻ LH38', 1, 'quan_au/QUAN AU NAM DEN KE LH38.jpg', 1, '2019-11-15 17:46:10', '2019-11-15 17:46:10'),
(115, 8, 1, 'Quần Âu Nam Đen Kẻ', 1, 'quan_au/QUAN AU NAM DEN KE.jpg', 1, '2019-11-15 17:46:10', '2019-11-15 17:46:10'),
(116, 8, 1, 'Quần Âu Nam Đẹp Ghi Kẻ', 1, 'quan_au/QUAN AU NAM DEP GHI KE.jpg', 1, '2019-11-15 17:46:10', '2019-11-15 17:46:10'),
(117, 8, 1, 'Quần Âu Nam Đẹp Kẻ Ghi', 1, 'quan_au/QUAN AU NAM DEP KE GHI.jpg', 1, '2019-11-15 17:46:10', '2019-11-15 17:46:10'),
(118, 8, 1, 'Quần Âu Nam Đẹp Kẻ Xanh Đỏ', 1, 'quan_au/QUAN AU NAM DEP KE XANH DO.jpg', 1, '2019-11-15 17:46:10', '2019-11-15 17:46:10'),
(119, 8, 1, 'Quần Âu Nam Đẹp Tím Sẫm', 1, 'quan_au/QUAN AU NAM DEP TIM SAM.jpg', 1, '2019-11-15 17:46:10', '2019-11-15 17:46:10'),
(120, 8, 1, 'Quần Âu Nam Đẹp Xanh Cốm', 1, 'quan_au/QUAN AU NAM DEP XANH COM.jpg', 1, '2019-11-15 17:46:10', '2019-11-15 17:46:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
