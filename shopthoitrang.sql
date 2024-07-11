-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:4306
-- Thời gian đã tạo: Th6 09, 2023 lúc 05:08 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopthoitrang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietanhsanpham`
--

CREATE TABLE `chitietanhsanpham` (
  `id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `Anh` longtext DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(11) NOT NULL,
  `donhang_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `GiaTien` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id`, `donhang_id`, `sanpham_id`, `SoLuong`, `GiaTien`, `created_at`, `updated_at`) VALUES
(40, 24, 1, 18, 117000, '2023-05-30 08:09:55', '2023-05-30 08:09:55'),
(41, 24, 2, 11, 60000, '2023-05-30 08:09:55', '2023-05-30 08:09:55'),
(42, 24, 4, 26, 87000, '2023-05-30 08:09:55', '2023-05-30 08:09:55'),
(43, 24, 5, 8, 110250, '2023-05-30 08:09:55', '2023-05-30 08:09:55'),
(44, 24, 3, 7, 57000, '2023-05-30 08:09:55', '2023-05-30 08:09:55'),
(45, 25, 5, 1, 110250, '2023-05-30 11:57:38', '2023-05-30 11:57:38'),
(46, 25, 2, 1, 60000, '2023-05-30 11:57:38', '2023-05-30 11:57:38'),
(47, 26, 23, 3, 117000, '2023-05-30 16:09:25', '2023-05-30 16:09:25'),
(48, 27, 6, 30, 117000, '2023-05-30 16:10:29', '2023-05-30 16:10:29'),
(49, 28, 36, 12, 117000, '2023-05-30 16:13:01', '2023-05-30 16:13:01'),
(50, 29, 2, 1, 117000, '2023-05-30 16:30:30', '2023-05-30 16:30:30'),
(54, 33, 26, 2, 117000, '2023-05-30 17:23:59', '2023-05-30 17:23:59'),
(55, 34, 1, 3, 117000, '2023-05-30 17:40:58', '2023-05-30 17:40:58'),
(56, 35, 26, 15, 195000, '2023-05-30 18:13:11', '2023-05-30 18:13:11'),
(57, 36, 26, 15, 195000, '2023-05-30 18:16:00', '2023-05-30 18:16:00'),
(58, 37, 3, 1, 57000, '2023-05-31 00:20:59', '2023-05-31 00:20:59'),
(59, 37, 26, 1, 195000, '2023-05-31 00:20:59', '2023-05-31 00:20:59'),
(60, 37, 2, 1, 60000, '2023-05-31 00:20:59', '2023-05-31 00:20:59'),
(61, 37, 5, 1, 110250, '2023-05-31 00:20:59', '2023-05-31 00:20:59'),
(62, 38, 4, 36, 87000, '2023-05-31 00:28:08', '2023-05-31 00:28:08'),
(63, 38, 3, 16, 57000, '2023-05-31 00:28:08', '2023-05-31 00:28:08'),
(64, 39, 4, 4, 87000, '2023-05-31 01:50:54', '2023-05-31 01:50:54'),
(65, 39, 3, 10, 57000, '2023-05-31 01:50:54', '2023-05-31 01:50:54'),
(66, 40, 26, 1, 195000, '2023-05-31 02:37:52', '2023-05-31 02:37:52'),
(67, 41, 4, 1, 145000, '2023-05-31 04:32:09', '2023-05-31 04:32:09'),
(68, 42, 26, 1, 195000, '2023-05-31 04:56:58', '2023-05-31 04:56:58'),
(69, 43, 26, 2, 195000, '2023-05-31 06:02:45', '2023-05-31 06:02:45'),
(70, 44, 3, 1, 57000, '2023-06-01 00:42:08', '2023-06-01 00:42:08'),
(71, 45, 5, 1, 110250, '2023-06-01 01:37:39', '2023-06-01 01:37:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadonnhap`
--

CREATE TABLE `chitiethoadonnhap` (
  `id` int(11) NOT NULL,
  `hoadonnhap_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `GiaTien` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadonnhap`
--

INSERT INTO `chitiethoadonnhap` (`id`, `hoadonnhap_id`, `sanpham_id`, `SoLuong`, `GiaTien`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 80000, '2023-05-10 17:51:59', '2023-05-10 17:51:59'),
(2, 1, 10, 20, 80000, '2023-05-10 17:52:41', '2023-05-10 17:52:41'),
(11, 8, 15, 15, 60000, '2023-05-28 17:21:41', '2023-05-28 17:21:41'),
(12, 8, 25, 200, 80000, '2023-05-28 17:21:41', '2023-05-28 17:21:41'),
(13, 8, 28, 28, 75000, '2023-05-28 17:21:41', '2023-05-28 17:21:41'),
(14, 9, 15, 15, 60000, '2023-05-29 09:50:25', '2023-05-29 09:50:25'),
(19, 11, 15, 3, 60000, '2023-05-31 15:30:15', '2023-05-31 16:01:11'),
(21, 11, 12, 30, 15, '2023-05-31 16:24:40', '2023-05-31 16:24:40'),
(22, 11, 11, 11, 50000, '2023-05-31 16:27:29', '2023-05-31 16:27:29'),
(23, 1, 3, 4, 50000, '2023-05-31 16:28:52', '2023-05-31 16:28:52'),
(25, 11, 1, 1, 80000, '2023-05-31 16:31:50', '2023-05-31 16:31:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietkho`
--

CREATE TABLE `chitietkho` (
  `id` int(11) NOT NULL,
  `kho_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietkho`
--

INSERT INTO `chitietkho` (`id`, `kho_id`, `sanpham_id`, `SoLuong`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 38, '0000-00-00 00:00:00', '2023-05-31 04:57:38'),
(3, 3, 3, 20, '0000-00-00 00:00:00', '2023-05-31 01:51:20'),
(4, 4, 4, 29, '0000-00-00 00:00:00', '2023-05-31 04:32:51'),
(5, 5, 5, 17, '0000-00-00 00:00:00', '2023-05-31 04:57:38'),
(7, 1, 7, 15, '0000-00-00 00:00:00', '2023-05-29 14:25:05'),
(8, 2, 8, 70, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 3, 9, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 4, 10, 30, '0000-00-00 00:00:00', '2023-05-27 12:44:20'),
(11, 5, 11, 45, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 6, 12, 32, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 1, 13, 28, '0000-00-00 00:00:00', '2023-05-27 05:57:18'),
(14, 2, 14, 27, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 3, 15, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 4, 16, 58, '0000-00-00 00:00:00', '2023-05-27 12:44:20'),
(17, 5, 17, 58, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 6, 18, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 1, 19, 29, '0000-00-00 00:00:00', '2023-05-29 14:25:05'),
(20, 2, 20, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 2, 21, 62, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 3, 22, 32, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 6, 23, 33, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 4, 24, 47, '0000-00-00 00:00:00', '2023-05-27 12:44:20'),
(25, 4, 25, 36, '0000-00-00 00:00:00', '2023-05-27 12:44:20'),
(27, 6, 27, 68, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 5, 28, 72, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 5, 29, 77, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 3, 30, 31, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 2, 31, 32, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 5, 32, 39, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 6, 33, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 1, 34, 34, '0000-00-00 00:00:00', '2023-05-29 14:25:05'),
(35, 2, 35, 30, '0000-00-00 00:00:00', '2023-05-27 03:53:44'),
(36, 4, 36, 1, '0000-00-00 00:00:00', '2023-05-31 04:57:30'),
(37, 6, 37, 32, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 5, 38, 32, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 4, 39, 33, '0000-00-00 00:00:00', '2023-05-27 12:44:20'),
(40, 6, 40, 30, '0000-00-00 00:00:00', '2023-05-27 05:54:57'),
(41, 5, 41, 32, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 5, 42, 32, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 6, 20, 10, '2023-05-27 07:25:27', '2023-05-27 07:25:27'),
(72, 6, 10, 30, '2023-05-27 07:25:27', '2023-05-27 07:25:27'),
(76, 16, 20, 12, '2023-05-27 07:28:09', '2023-05-29 14:27:54'),
(82, 16, 21, 73, '2023-05-27 08:01:14', '2023-05-29 14:27:54'),
(85, 17, 2, 76, '2023-05-29 09:48:57', '2023-05-29 14:26:19'),
(87, 1, 40, 124, '2023-05-29 14:25:05', '2023-05-29 14:25:05'),
(88, 17, 38, 32, '2023-05-29 14:26:19', '2023-05-30 12:00:20'),
(89, 1, 42, 1, '2023-05-29 14:40:58', '2023-05-29 14:40:58'),
(98, 17, 1, 20, '2023-05-31 15:26:36', '2023-05-31 15:26:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `TrangThai` tinyint(1) DEFAULT NULL,
  `khachhang_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `TrangThai`, `khachhang_id`, `created_at`, `updated_at`) VALUES
(24, 1, 24, '2023-05-30 08:09:55', '2023-05-30 08:11:01'),
(25, 1, 25, '2023-05-30 11:57:38', '2023-05-31 04:57:38'),
(26, 1, 26, '2023-05-30 16:09:25', '2023-05-30 16:33:15'),
(27, 1, 27, '2023-05-30 16:10:29', '2023-05-31 04:57:34'),
(28, 1, 28, '2023-05-30 16:13:01', '2023-05-31 04:57:30'),
(29, 1, 29, '2023-05-30 16:30:30', '2023-05-30 16:48:26'),
(30, 1, 30, '2023-05-30 16:49:38', '2023-05-30 16:54:00'),
(31, 1, 31, '2023-05-30 16:56:21', '2023-05-30 16:57:03'),
(32, 1, 32, '2023-05-30 17:14:48', '2023-05-30 17:22:19'),
(33, 1, 33, '2023-05-30 17:23:58', '2023-05-30 17:36:52'),
(34, 1, 34, '2023-05-30 17:40:58', '2023-05-30 17:41:25'),
(35, 1, 35, '2023-05-30 18:13:11', '2023-05-30 18:14:02'),
(36, 1, 36, '2023-05-30 18:16:00', '2023-05-30 18:16:34'),
(37, 1, 37, '2023-05-31 00:20:59', '2023-05-31 00:22:11'),
(38, 1, 38, '2023-05-31 00:28:08', '2023-05-31 00:28:42'),
(39, 1, 39, '2023-05-31 01:50:54', '2023-05-31 01:51:20'),
(40, 1, 40, '2023-05-31 02:37:52', '2023-05-31 02:38:29'),
(41, 1, 41, '2023-05-31 04:32:09', '2023-05-31 04:32:51'),
(42, 1, 42, '2023-05-31 04:56:58', '2023-05-31 04:57:46'),
(43, 1, 43, '2023-05-31 06:02:45', '2023-05-31 06:03:13'),
(44, 1, 44, '2023-06-01 00:42:08', '2023-06-01 00:42:45'),
(45, 1, 45, '2023-06-01 01:37:39', '2023-06-01 01:38:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gia`
--

CREATE TABLE `gia` (
  `id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `NgayBD` date DEFAULT NULL,
  `NgayKT` date DEFAULT NULL,
  `DonGia` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gia`
--

INSERT INTO `gia` (`id`, `sanpham_id`, `NgayBD`, `NgayKT`, `DonGia`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-05-05', '2023-07-07', 150000, '2023-05-10 05:27:42', '2023-05-10 05:27:42'),
(2, 2, '2021-03-18', '2023-06-30', 120000, '2023-05-10 05:29:16', '2023-05-10 05:29:16'),
(3, 3, '2017-01-02', '2023-05-20', 190000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 4, '2014-05-05', '2023-07-07', 145000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 5, '2012-05-20', '2023-07-30', 147000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 6, '2011-04-20', '2023-04-18', 160000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 7, '2020-01-01', '2023-12-12', 157000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 8, '2014-01-01', '2023-01-01', 158000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 9, '2020-02-02', '2023-07-07', 185000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 10, '2010-02-05', '2023-10-30', 1250000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 11, '2009-01-05', '2023-01-31', 140000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 12, '2008-03-20', '2023-08-05', 145000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 13, '2009-03-20', '2023-08-05', 175000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 14, '2015-03-20', '2023-08-05', 177000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 15, '2016-03-20', '2023-08-05', 185000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 16, '2017-03-20', '2023-03-05', 199000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 17, '2014-03-20', '2023-08-05', 197000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 18, '2013-03-20', '2023-08-05', 191000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 19, '2012-03-20', '2023-08-05', 115000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 20, '2011-03-20', '2023-08-15', 125000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 21, '2020-03-20', '2023-09-05', 135000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 22, '2020-03-20', '2023-08-25', 185000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 23, '2016-03-20', '2023-06-05', 196000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 24, '2018-03-20', '2023-10-05', 195000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 25, '2017-03-20', '2023-08-05', 195000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 26, '2015-03-20', '2023-06-13', 195000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 27, '2014-03-20', '2023-07-22', 195000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 28, '2013-03-20', '2023-08-05', 195000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 29, '2012-03-20', '2023-08-05', 195000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 30, '2023-06-22', '2023-08-17', 195000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 31, '2018-03-20', '2023-08-19', 195000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 32, '2019-03-20', '2023-08-05', 195000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 33, '2023-06-20', '2023-08-05', 195000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 34, '2023-03-20', '2023-08-05', 195000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 35, '2023-03-20', '2023-08-05', 195000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 36, '2017-03-20', '2023-06-21', 195000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 37, '2016-03-20', '2023-09-30', 195000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 38, '2015-03-20', '2023-10-05', 195000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 39, '2023-07-20', '2023-08-15', 195000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 40, '2023-06-20', '2023-08-25', 195000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 41, '2013-03-20', '2023-08-15', 195000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 42, '2023-07-20', '2023-08-19', 195000, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giamgia`
--

CREATE TABLE `giamgia` (
  `id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `PhanTramGiamGia` int(11) DEFAULT NULL,
  `ThoiGianBatDau` date DEFAULT NULL,
  `ThoiGianKetThuc` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giamgia`
--

INSERT INTO `giamgia` (`id`, `sanpham_id`, `PhanTramGiamGia`, `ThoiGianBatDau`, `ThoiGianKetThuc`, `created_at`, `updated_at`) VALUES
(1, 1, 22, '2021-06-06', '2023-07-12', '2023-05-10 05:54:16', '2023-05-10 05:54:16'),
(2, 2, 50, '2011-11-07', '2023-06-30', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, 70, '2014-08-10', '2023-11-11', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 4, 40, '2015-12-12', '2023-10-10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 5, 25, '2020-05-07', '2023-12-10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 6, 45, '2020-04-07', '2023-10-10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 8, 23, '2023-05-07', '2023-10-10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 12, 26, '2023-08-07', '2023-10-10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 19, 21, '2023-05-27', '2023-10-10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 7, 19, '2011-01-07', '2023-10-10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 25, 18, '2015-04-07', '2023-05-30', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 30, 14, '2014-07-07', '2023-05-29', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 42, 38, '2016-08-07', '2023-06-10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 39, 27, '2018-08-07', '2033-10-10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 34, 11, '2018-10-07', '2023-10-10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 31, 10, '2020-10-07', '2023-06-07', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gioithieu`
--

CREATE TABLE `gioithieu` (
  `id` int(11) NOT NULL,
  `TieuDe` varchar(50) DEFAULT NULL,
  `NoiDung` longtext NOT NULL,
  `Anh` longtext DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gioithieu`
--

INSERT INTO `gioithieu` (`id`, `TieuDe`, `NoiDung`, `Anh`, `created_at`, `updated_at`) VALUES
(1, 'Giới thiệu về WebSite Shop Thời Trang', 'Shop thời trang với tên website là MarkShop là một shop thời trang  trực tuyến được hình thành vào 17/5/2014. \r\nXuất phát từ ý tưởng mang đến cái đẹp hoàn mỹ  – Mua sắm dễ dàng tiện lợi cho người tiêu dùng trên tòan quốc.\r\nĐồng thời, để khách hàng có nhiều lựa chọn cho phong cách thời trang riêng của mình.', NULL, '2023-05-10 03:54:42', '2023-05-10 03:54:42'),
(2, NULL, 'Những sản phẩm tại shop được chính chủ Shop tìm kiếm\r\ntuyển chọn mẫu mã đa dạng phong phú theo xu hướng thời trang \"HOT\" nhất trên thị trường. ', NULL, '2023-05-10 04:05:38', '2023-05-10 04:05:38'),
(3, NULL, 'Các sản phẩm nhập trực tiếp từ các nhãn thời trang uy tín \r\ncủa Hồng Kông, Thượng Hải, Quãng Châu, Thái Lan... với các tiêu chí \"Không qua trung gian - Giá cả hợp lý -Chất lượng đảm bảo', 'anhgt.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Tầm nhì', 'Keng Fashion mong muốn trở thành website cung cấp những sản phẩm thời trang uy tín, chất lượng \r\nvà tốt nhất cho mọi đối tượng trên toàn quốc.', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Sứ mệnh', '\"Chúng tôi sẽ làm bạn hài lòng với dịch vụ tối đa - chi tiêu tối thiểu\"', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Thế mạnh', '\r\n- Đội ngũ nhân viên nhiệt huyết, năng động, thích nghi và linh hoạt với hoàn cảnh.\r\n\r\n- Luôn cập nhật những phong cách mới, hợp xu hướng thời trang.\r\n\r\n- Truyền thông trên nhiều kênh quảng cáo chất lượng.\r\n', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonnhap`
--

CREATE TABLE `hoadonnhap` (
  `id` int(11) NOT NULL,
  `nhacungcap_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadonnhap`
--

INSERT INTO `hoadonnhap` (`id`, `nhacungcap_id`, `users_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2023-05-10 17:51:02', '2023-05-10 17:51:02'),
(8, 1, 2, '2023-05-28 17:21:41', '2023-05-28 17:21:41'),
(9, 1, 2, '2023-05-29 09:50:25', '2023-05-29 09:50:25'),
(10, 1, 2, '2023-05-31 15:21:45', '2023-05-31 15:21:45'),
(11, 1, 3, '2023-05-31 15:30:15', '2023-05-31 16:27:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `TenKhachHang` varchar(50) NOT NULL,
  `DiaChi` varchar(50) DEFAULT NULL,
  `SoDienThoai` varchar(15) DEFAULT NULL,
  `Email` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `TenKhachHang`, `DiaChi`, `SoDienThoai`, `Email`, `created_at`, `updated_at`) VALUES
(1, 'cuongnguyen', NULL, '0818147402', 'cuong31139@gmail.com', '2023-05-10 04:50:18', '2023-05-10 04:50:18'),
(2, 'Phạm nhật vượng', NULL, '0818147402', 'cuong31139@gmail.com', '2023-05-10 05:18:37', '2023-05-10 05:18:37'),
(3, 'cuongnguyen', NULL, '0818147402', 'cuong31139@gmail.com', '2023-05-10 16:04:40', '2023-05-10 16:04:40'),
(4, 'cuongnguyen1', NULL, '0818147402', 'cuong31139@gmail.com', '2023-05-10 16:56:43', '2023-05-10 16:56:43'),
(5, 'cuongnguyen2', NULL, '0818147402', 'cuong31139@gmail.com', '2023-05-10 17:14:47', '2023-05-10 17:14:47'),
(6, 'cuong', NULL, '0818147402', 'cuong31139@gmail.com', '2023-05-10 18:26:20', '2023-05-10 18:26:20'),
(7, 'cuongdeptrai', NULL, '0818147402', 'cuong31139@gmail.com', '2023-05-11 03:29:47', '2023-05-11 03:29:47'),
(8, 'cuongnguyenvan', NULL, '0123456789', 'cuong2000@gmail.com', '2023-05-11 03:47:16', '2023-05-11 03:47:16'),
(9, 'cuongnguyen', NULL, '0818147402', 'cuong31139@gmail.comkn', '2023-05-13 12:53:11', '2023-05-13 12:53:11'),
(10, 'cuongnguyen', NULL, '0818147402', 'cuong31139@gmail.com', '2023-05-13 12:57:37', '2023-05-13 12:57:37'),
(11, 'cuongnguyen', NULL, '0818147402', 'cuong31139@gmail.comvhyvuv', '2023-05-13 13:00:01', '2023-05-13 13:00:01'),
(24, 'cuongnguyen', NULL, '0818147402', 'cuong31139@gmail.com', '2023-05-30 08:09:55', '2023-05-30 08:09:55'),
(25, 'cuongnguyenvan', NULL, '0818147402', 'cuong31139@gmail.com', '2023-05-30 11:57:38', '2023-05-30 11:57:38'),
(26, 'cuongnguyenbbb', NULL, '0818147402', 'cuong31139@gmail.com', '2023-05-30 16:09:25', '2023-05-30 16:09:25'),
(27, 'cuongnguyenmmm', NULL, '0818147402', 'cuong31139@gmail.com', '2023-05-30 16:10:29', '2023-05-30 16:10:29'),
(28, 'cuongnguyenccc', NULL, '0818147402', 'cuong31139@gmail.com', '2023-05-30 16:13:01', '2023-05-30 16:13:01'),
(29, 'cuongssss', NULL, '0818147402', 'cuong31139@gmail.com', '2023-05-30 16:30:30', '2023-05-30 16:30:30'),
(30, 'cuongnguyenooo', NULL, '0818147402', 'cuong31139@gmail.com', '2023-05-30 16:49:38', '2023-05-30 16:49:38'),
(31, 'cuongnguyen888888', NULL, '0818147402', 'cuong31139@gmail.com', '2023-05-30 16:56:21', '2023-05-30 16:56:21'),
(32, 'kkk', NULL, '0818147402', 'cuong31139@gmail.com', '2023-05-30 17:14:48', '2023-05-30 17:14:48'),
(33, 'vhv', NULL, '0818147402', 'cuong31139@gmail.com', '2023-05-30 17:23:58', '2023-05-30 17:23:58'),
(34, 'ihih', NULL, '0818147402', 'cuong31139@gmail.com', '2023-05-30 17:40:58', '2023-05-30 17:40:58'),
(35, 'nhật vượng', NULL, '0818147402', 'cuong31139@gmail.com', '2023-05-30 18:13:11', '2023-05-30 18:13:11'),
(36, 'vuong02', NULL, '0818147402', 'cuong31139@gmail.com', '2023-05-30 18:16:00', '2023-05-30 18:16:00'),
(37, 'Phạm nhật vượng', NULL, '0879081120', 'vuongit2002@gmail.com', '2023-05-31 00:20:59', '2023-05-31 00:20:59'),
(38, 'cuongnguyenbbbk', NULL, '0818147402', 'cuong31139@gmail.com', '2023-05-31 00:28:08', '2023-05-31 00:28:08'),
(39, 'cuongnguyenbh', NULL, '0818147402', 'cuong31139@gmail.com', '2023-05-31 01:50:54', '2023-05-31 01:50:54'),
(40, 'cuongnguyenhbj', NULL, '0818147402', 'cuong31139@gmail.com', '2023-05-31 02:37:52', '2023-05-31 02:37:52'),
(41, 'cuongnguyen', NULL, '0818147402', 'cuong31139@gmail.com', '2023-05-31 04:32:09', '2023-05-31 04:32:09'),
(42, 'cuongnguyen444', NULL, '0818147402', 'cuong31139@gmail.com', '2023-05-31 04:56:58', '2023-05-31 04:56:58'),
(43, 'cuongnguyenkml', NULL, '0818147402', 'cuong31139@gmail.com', '2023-05-31 06:02:45', '2023-05-31 06:02:45'),
(44, 'ckfftfy', NULL, '0123456789', 'cuong31139@gmail.com', '2023-06-01 00:42:08', '2023-06-01 00:42:08'),
(45, 'cuongnguyenvghvcgc', NULL, '0818147402', 'cuong31139@gmail.com', '2023-06-01 01:37:39', '2023-06-01 01:37:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kho`
--

CREATE TABLE `kho` (
  `id` int(11) NOT NULL,
  `TenKho` varchar(30) NOT NULL,
  `DiaChi` varchar(35) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kho`
--

INSERT INTO `kho` (`id`, `TenKho`, `DiaChi`, `created_at`, `updated_at`) VALUES
(1, 'Thái bình', 'Thái bình', '2023-05-10 05:46:28', '2023-05-27 06:18:01'),
(2, 'Hải dương', 'Hải dương', '0000-00-00 00:00:00', '2023-05-27 06:18:17'),
(3, 'Hà nội', 'Hà nội', '0000-00-00 00:00:00', '2023-05-27 06:18:31'),
(4, 'Nam định , thái bình', 'Thái bình', '0000-00-00 00:00:00', '2023-05-27 06:18:50'),
(5, 'Hung yên 1', 'Hưng yên', '0000-00-00 00:00:00', '2023-05-27 06:19:22'),
(6, 'Gia lai', 'Gia lai', '0000-00-00 00:00:00', '2023-05-27 06:19:37'),
(16, 'Hưng yên 2', 'Hưng yên', '2023-05-27 06:13:22', '2023-05-27 06:19:52'),
(17, 'kho hà nội 3', 'Hà Nội', '2023-05-29 09:48:57', '2023-05-31 16:00:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `id` int(11) NOT NULL,
  `ThongTinLienHe` varchar(250) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `SoDienThoai` varchar(15) DEFAULT NULL,
  `CoSoLienHe` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lienhe`
--

INSERT INTO `lienhe` (`id`, `ThongTinLienHe`, `Email`, `SoDienThoai`, `CoSoLienHe`, `created_at`, `updated_at`) VALUES
(1, '123 Nguyễn Văn A,hai bà trưng,hà nội', 'nguyenvana@example.com', '0987654321', 'cơ sở 1', '2023-05-10 04:21:23', '2023-05-10 04:21:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `id` int(11) NOT NULL,
  `TenLoaiSanPham` varchar(35) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`id`, `TenLoaiSanPham`, `created_at`, `updated_at`) VALUES
(1, 'Áo thun nam', '2023-05-10 04:27:30', '2023-05-10 04:27:30'),
(2, 'Áo thun nữ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Áo sơ mi nam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Áo sơ mi nữ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Đầm nữ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Chân váy', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Quần short nữ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Quần jean nữ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Quần thun nữ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Quần jogger nữ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Quần short nam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Quần kaki nam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Quần jean nam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Quần tây nam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Quần jogger nam', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `MaMenuCha` int(11) NOT NULL,
  `TenMenu` varchar(30) NOT NULL,
  `STT` int(11) DEFAULT NULL,
  `link` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`id`, `MaMenuCha`, `TenMenu`, `STT`, `link`, `created_at`, `updated_at`) VALUES
(1, 0, 'Trang Chủ', 1, '/index', '2023-05-10 04:23:00', '2023-05-13 16:09:02'),
(2, 0, 'Sản Phẩm', 2, '/sanpham', '0000-00-00 00:00:00', '2023-05-10 04:18:25'),
(3, 0, 'Thương Hiệu', 3, '/thuonghieu', '0000-00-00 00:00:00', '2023-05-10 04:18:36'),
(4, 0, 'Giới Thiệu', 4, '/gioithieu', '0000-00-00 00:00:00', '2023-05-10 04:18:46'),
(5, 0, 'Tin Tức', 5, '/tintuc', '0000-00-00 00:00:00', '2023-05-10 04:18:59'),
(6, 0, 'Liên Hệ', 6, '/lienhe', '0000-00-00 00:00:00', '2023-05-13 16:09:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(69, '2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `id` int(11) NOT NULL,
  `TenNhaCungCap` varchar(25) NOT NULL,
  `DiaChi` varchar(25) DEFAULT NULL,
  `SoDienThoai` varchar(15) DEFAULT NULL,
  `Email` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`id`, `TenNhaCungCap`, `DiaChi`, `SoDienThoai`, `Email`, `created_at`, `updated_at`) VALUES
(1, 'Công ty may mặc', '114 Lê Trọng Tấn', '0123456789', 'trongtan@gmail.com', '2023-05-10 17:49:54', '2023-05-10 17:49:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `TenSP` longtext NOT NULL,
  `MoTa` longtext NOT NULL,
  `Size` varchar(10) DEFAULT NULL,
  `loaisanpham_id` int(11) NOT NULL,
  `thuonghieu_id` int(11) NOT NULL,
  `AnhDaiDien` longtext DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `TenSP`, `MoTa`, `Size`, `loaisanpham_id`, `thuonghieu_id`, `AnhDaiDien`, `created_at`, `updated_at`) VALUES
(1, 'ÁO THUN NAM NGẮN TAY CỔ TRỤ', 'ÁO THUN NAM NGẮN TAY CỔ TRỤ THUN COTTON SỌC NGANG PHỐI 2 MÀU ĐẸP MẮT<br>Chất liệu: Vải 100% thun cotton mềm mịn, thấm hút mồ hôi tốt', 'xl', 1, 1, 'ao-thun-nam-ngan-tay.jpg', '2023-05-10 04:31:11', '2023-05-10 04:31:11'),
(2, 'ÁO THUN NAM NGẮN TAY CỔ TRỤ', 'ÁO THUN NAM CỔ TRỤ NGẮN TAY VIỀN CỔ IN LOGO MẪU MỚI<br>Chất liệu: Vải 100% thun cotton mềm mịn, thấm hút mồ hôi tốt', 's', 1, 1, 'ao-thun-nam-co-tru-ngan-tay.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'ÁO THUN NAM HÌNH HỔ 3D', 'ÁO THUN NAM HÌNH HỔ 3D: Chất vải thun 3D mịn lạnh, thấm hút mồ hôi nhanh giúp các chàng luôn thoải mái khi vận động, chơi các trò chơi thể thao, thể chất. Bên cạnh đó là thiết kế mạnh mẽ với hình hổ ấn tượng mang đến cho các chàng sự sang trọng, trẻ trung  để các chàng luôn sẵn sàng xuất hiện trước các nàng mà không lo thiếu sự thu hút.<br>Chất liệu: VẢI THUN 3D CO GIÃN CAO CẤP', 'M', 1, 1, 'ao-thun-nam-hinh-ho-3d.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'SƠ MI NAM HÀN QUỐC TRẺ TRUNG', 'SƠ MI NAM HÀN QUỐC TRẺ TRUNG: Chất vải dày dặn cao cấp, đặc biệt với những sọc nhỏ tinh tế cùng dáng áo chuẩn để các chàng tự tin khoe dáng. Bên cạnh đó là chất màu lên tông chuẩn để các chàng lựa chọn phong cách cho mình thật thoải mái. Ngoài ra, với thiết kế tay dài thanh lịch, chiếc áo sẽ là bạn đồng hành cùng các chàng trai trong những ngày lên công tay hay trong những buổi gặp khách hàng.<br>Chất liệu: VẢI KAKI MỀM', 'XXL', 3, 3, 'so-mi-nam-han-quoc.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'SƠ MI NAM CARO Ô LỚ', 'SƠ MI NAM CARO Ô LỚN: Chất vải kate dày dặn cao cấp, dáng áo chuẩn để các chàng tự tin khoe dáng. Bên cạnh đó là họa tiết caro ôn lớn đối xứng sang trọng nhưng không kém phần tươi trẻ kết hợp với thiết kế tay dài thanh lịch, chiếc áo sẽ là bạn đồng hành cùng các chàng trai trong những ngày lên công ty hay trong những buổi gặp khách hàng.<br>Chất liệu: VẢI KATE DÀY MỊ', 'M', 3, 3, 'so-mi-nam-caro.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'ÁO SƠ MI NAM LOANG MÀU THỜI THƯỢNG', 'ÁO SƠ MI NAM LOANG MÀU THỜI THƯỢNG: Chất vải dày dặn cao cấp, dáng áo chuẩn để các chàng tự tin khoe dáng. Bên cạnh đó là chất màu lên tông chuẩn để các chàng lựa chọn phong cách cho mình thật thoải mái. Ngoài ra, với thiết kế tay dài thanh lịch nhưng không mất đi sự trẻ trung pha chút nổi loạn với việc kết hợp màu loang mới mẻ.<br>Chất liệu: KATE BÓNG CAO CẤP', 'L', 3, 3, 'ao-so-mi-nam-loang-mau.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'QUẦN SHORT JEANS CÓ KHUY ĐỘC ĐÁO', 'QUẦN SHORT JEANS CÓ KHUY ĐỘC ĐÁO: Chất vải jeans cao cấp xuất khẩu vừa dày dặn, nhẹ mịn vừa co giãn vừa phải giúp người mang dế chịu, tự tin. Bên cạnh đó còn là thiết kế trẻ trung, năng động và đầy độc đáo với khuy sản phẩm lạ mắt.<br>Chất liệu: VẢI JEANS CAO CẤP XUẤT KHẨU', 'M', 11, 11, 'quan-short-jeans-co-khuy.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'QUẦN ĐÙI NAM SỐ 69 CAO CẤP', 'QUẦN ĐÙI NAM SỐ 69 CAO CẤP: Thiết kế trẻ trung, năng động với thiết kế săn lai ống giúp các trai trông năng động hơn. Bên cạnh đó chất vải jenas dày dặn mang đến sự tự tin cho các chàng trong việc hoạt động vui chơi mà không lo các sự cố khó xửa xảy ra.<br>Chất liệu: VẢI JEANS CAO CẤP XUẤT KHẨU', 'S', 11, 11, 'quan-dui-nam-so-69-cao-cap.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'QUẦN SHORT JEANS NAM KẾT HỢP HỌA TIẾT CHIBI', 'QUẦN SHORT JEANS NAM KẾT HỢP HỌA TIẾT CHIBI ĐÁNG YÊU: Chất vải jeans cao cấp nhập khẩu Thái Lan mang đến cho người mặc sự thoải mái và tin tưởng bởi chất vải dày dặn, mịn nhẹ. bên cạnh đó ngoài những nét cắt rách táo bạo là họa tiết chibi mang đến sự trẻ trung, nắng động cho người mang.<br>Chất liệu: VẢI JEANS NHẬP KHẨU THÁI LA', 'S', 11, 11, 'quan-short-jeans-nam.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'QUẦN JEANS NAM CAO CẤP THIẾT KẾ KẾT HỢP VẢI MẪU', 'QUẦN JEANS NAM CAO CẤP THIẾT KẾ KẾT HỢP VẢI MẪU: Chất vải cao cấp xuất khẩu dày dặn, lên form chuẩn dáng để các chàng thoải mái khoe body. Bên cạnh đó là thiết kế phong cách đường phố mạnh mẽ, phá cách với những nét cắt, xước táo bạo, độc đáo mà chỉ riêng sản phẩm có.<br>Chất liệu: VẢI JEANS NAM CAO CẤP NHẬP KHẨU', 'L', 13, 13, 'quan-jeans-nam-cao-cap.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'QUẦN JEANS NAM NHẤN GỐI TRÁI TINH TẾ', 'QUẦN JEANS NAM NHẤN GỐI TRÁI TINH TẾ: Chất vải cao cấp xuất khẩu dày dặn, lên form chuẩn dáng để các chàng thoải mái khoe body. Bên cạnh đó là thiết kế phong cách đường phố mạnh mẽ, phá cách với những nét cắt, xước táo bạo, độc đáo mà chỉ riêng sản phẩm có.<br>Chất liệu: VẢI JEANS NHẬP KHẨU HÀN QUỐC', 'XL', 13, 13, 'quan-jeans-nam-nhan-goi-trai.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'QUẦN JEAN NAM PHONG CÁC ĐƯỜNG PHỐ MỚI', 'QUẦN JEAN NAM PHONG CÁC ĐƯỜNG PHỐ MỚI: Thiết kế phá cách, theo xu hướng đường phố đem đến cho các chàng trai sự năng động, pha chút nổi loạn làm các chàng trai trông thật sự nổi bật cũng như tự tin thể hiện phong cách của bản thân trong mọi cuộc vui.<br>Chất liệu: VẢI JEANS CAO CẤP XUẤT KHẨU', 'X', 13, 13, 'quan-jean-nam.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'QUẦN KAKI LƯNG PHỐI DÂY SỌC QK005 MÀU XANH ĐE', 'Sớ vải dệt xéo nổi lên khá lạ mắt tạo nên một sản phẩm dày dặn, bền bỉ và ít nhăn, chất liệu cao cấp mang đến sự thoáng mát, thấm hút mồ hôi cao.\r\n<br>- Quần co giãn nhẹ  nhờ có thành phần spandex giúp người mặc cảm thấy thoải mái, dễ chịu hơn.\r\n<br>- Sản phẩm được xử lý wash mềm, đốt lông nên đảm bảo hạn chế co rút, xù lông và bền màu.\r\n<br>- Phần phối dây dệt sọc ở lưng quần làm điểm nhấn mới lạ đầy ấn tượng nhưng vẫn giữ được nét thanh lịch, thời thượng cho phái mạnh.<br>Chất liệu: Khaki 98% cotton 2% spandex twill stretch.', 'L', 12, 12, 'quan-kaki-nam-lung-phoi-day-soc.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'QUẦN KAKI LƯNG PHỐI DÂY SỌC QK005 MÀU CÀ PHÊ', 'Sớ vải dệt xéo nổi lên khá lạ mắt tạo nên một sản phẩm dày dặn, bền bỉ và ít nhăn, chất liệu cao cấp mang đến sự thoáng mát, thấm hút mồ hôi cao.\r\n<br>- Quần co giãn nhẹ  nhờ có thành phần spandex giúp người mặc cảm thấy thoải mái, dễ chịu hơn.\r\n<br>- Sản phẩm được xử lý wash mềm, đốt lông nên đảm bảo hạn chế co rút, xù lông và bền màu.\r\n<br>- Phần phối dây dệt sọc ở lưng quần làm điểm nhấn mới lạ đầy ấn tượng nhưng vẫn giữ được nét thanh lịch, thời thượng cho phái mạnh.<br>Chất liệu: Khaki 98% cotton 2% spandex twill stretch.', 'XS', 12, 12, 'quan-kaki-nam.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'QUẦN KAKI CÓ NẮP TÚI SAU QK003 MÀU XÁM', 'Mềm mại, độ bền cao, hút ẩm và thấm hút mồ hôi tốt. Thiết kế căn bản dễ mix&match nhiều dạng quần áo và phong cách.<br>Chất liệu: 98% cotton, 2% spandex.', 'M', 12, 12, 'quan-nam-kaki-co-nap-tui-sau.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'QUẦN TÂY NAZAFU QT006 MÀU XANH ĐE', 'Chất vải mềm mại, độ bền cao, hút ẩm và thấm hút mồ hôi tốt. Họa tiết kẻ caro Glen plaid rất \"đa dụng\", thanh nhã. <br>Chất liệu: 73% polyester, 26% rayon, 1% spandex.', 'XL', 14, 14, 'quan-tay-nazafu.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'QUẦN TÂY CĂN BẢN FORM SLIMFIT QT015', 'Quần slimfit tôn dáng thon gọn trong thiết kế trơn căn bản. Chất liệu thấm hút tốt, độ bền cao tạo cảm giác thoải mái cho người mặc.<br>Chất liệu: 68% polyester,rayon 29%, 3% spandex.', 'XS', 14, 14, 'quan-tay-phoi-day-det.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'QUẦN TÂY XẾP LY FORM SLIMFIT QT007 MÀU XÁM CHUỘT ĐẬM', 'Chống nhăn, co dãn nhẹ. Thiết kế trên chất vải bóng mịn, sở hữu độ bền màu cao tạo phong thái lịch thiệp và tinh tế cho người mặc.<br>Chất liệu: 83% polyester, 15% rayon, 2% spandex.', 'M', 14, 14, 'quan-tay-xep-ly-form.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'QUẦN JOGGER LƯNG THUN CÀI NÚT J004 MÀU XÁM XANH', 'Mềm mịn, có độ rũ nhẹ. Độ bền màu cao, thấm hút mồ hôi tốt. Co giãn nhẹ, hạn chế nhăn tạo cảm giác thoải mái tối đa trong mọi hoạt động<br>Chất liệu: 83% polyester, 15% rayon, 2% spandex.', 'XS', 15, 15, 'quan-tay-lung-thun-cai-nut.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'QUẦN JOGGER JEAN J13 MÀU XANH ĐE', 'Đậm chất jeans nhưng là jogger năng động & cá tính. Jogger đơn giản với thiết kế bo lưng & bo lai mới tạo điểm nhấn cho quần luôn thoải mái, trẻ trung, jogger thực sự thuộc về các chàng trai ưu thích sự di chuyển.<br>Chất liệu: 98% cotton, 2% spandex', 'XS', 15, 15, 'quan-jogger-jean-mau-xanh-bien.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'QUẦN JOGGER TÚI ĐẮP J001 MÀU ĐE', 'Co giãn vừa phải, bền màu, ít nhăn. Form dáng thoải mái, năng động với 2 túi đắp bên hông quần tạo phong thái trẻ trung và phóng khoáng.<br>Chất liệu: 65% polyester, 32% rayon, 3% spandex.', 'XS', 15, 15, 'quan-jogger-kaki-bo-lai.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'ÁO THUN NỮ TRẺ TRUNG MỚI', 'ÁO THUN NỮ TRẺ TRUNG MỚI: Với thiết kế trẻ trung với viền màu nổi bật cùng hình ảnh bắt mắt bên cạnh đó là chất vải cao cấp, lên màu, lên dáng chuẩn như các cô gái muốn giúp các nàng luôn tự tin tỏa sáng và thoải mái khi mang dù cho là cả ngày dài hoạt động.<br>Chất liệu: VẢI DA CÁ CAO CẤP', 'XXS', 2, 2, 'ao-thun-nu-tre-trung-moi.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'ÁO THUN NỮ HIỆN ĐẠI CAO CẤP', 'ÁO THUN NỮ HIỆN ĐẠI CAO CẤP: Thiết kế hiện đại với kiểu tay phồng nhún viền tinh tế, bắt mắt bên cạnh đó là chất vải thun dày dặn cao cấp không chỉ lên màu chuẩn mà còn lên dáng chuẩn như các nàng muốn giúp các nàng luôn tự tin tỏa sáng và thoải mái khi mang dù cho là cả ngày dài hoạt động.<br>Chất liệu: VẢI THUN CAO CẤP DÀY DẶ', 'XXL', 2, 2, 'ao-thun-nu-hien-dai-cao-cap.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'ÁO THUN NỮ SỌC MÀU NĂNG ĐỘNG', 'ÁO THUN NỮ SỌC MÀU NĂNG ĐỘNG: Thiết kế hiện đại với những sọc màu bắt mắt, sự kết hợp những màu sắc nổi bật đi cùng nhau tạo nên sự khác biệt mang phong cách Hàn Quốc bên cạnh đó là chất vải cao cấp, lên màu, lên dáng chuẩn như ming muốn giúp các nàng luôn tự tin tỏa sáng và thoải mái khi mang dù cho là cả ngày dài hoạt động.<br>Chất liệu: VẢI NHŨ NHẬP KHẨU', 'XS', 2, 2, 'ao-thun-nu-soc-mau-nang-dong.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'SƠ MI NỮ KIỂU CỔ VUÔNG HIỆN ĐẠI', 'SƠ MI NỮ KIỂU CỔ VUÔNG HIỆN ĐẠI: Chất vải voan mềm mịn cùng với chất len gân co giãn mang đến vẻ đẹp dịu dàng nữ tính cùng sự thoải mái, dễ chịu khi hoạt động cả ngày dài. Đặc biệt là thiết kế hiện đại, mang nét gợi cảm giúp người mang nổi bật với nét đẹp hiện đại thời thượng.<br>Chất liệu: VẢI VOAN MỀM KẾT HỢP LEN GÂN MỎNG', 'XS', 4, 4, 'so-mi-nu-kieu-co-vuong-hien-dai.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'ÁO SƠ MI NỮ SỌC TAY LỬNG THIẾT KẾ ĐỘC ĐÁO', 'ÁO SƠ MI NỮ SỌC TAY LỬNG THIẾT KẾ ĐỘC ĐÁO: Chất liệu kate mềm mịn cao cấp thướt tha, nhẹ nhàng, dễ chịu. Kiểu dáng áo cổ bẻ, tay lửng thời trang, mang nền vải sọc vân nhỏ đậm chất lịch sự cho bạn gái thêm phần trang nhã, lịch sự và đầy nữ tính. Chiếc áo không chỉ thích hợp cho những ngày đến cơ quan, công sở mà còn là một sự lựa chọn khá hoàn hảo cho những buổi đầu hẹn hò khi muôn xuất hiện với hình ảnh trang nhã.<br>Chất liệu: VẢI KATE MỀM NHẸ CAO CẤP', 'XS', 4, 4, 'ao-so-mi-nu-soc-tay-lung.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'ÁO SƠ MI NỮ TRƠN FROM ÁO ĐỘC ĐÁO', 'ÁO SƠ MI NỮ TRƠN FROM ÁO ĐỘC ĐÁO: Với chất vải kate cao cấp mềm mịn và thoáng khí giúp người mang thoải mái khi hoạt động cả ngày dù trong thời tiết nắng nóng. Bên cạnh đó là from áo độc đáo mang tới vẻ đẹp cá tính, hiện đại giúp các nàng trông thật nổi bật trong mọi cuộc vui.<br>Chất liệu: VẢI KATE CAO CẤP', 'XL', 4, 4, 'ao-so-mi-nu-tron-from-ao.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'ĐẦM NỮ CỔ CHỮ U XẺ TÀ SÀNH ĐIỆU', 'ĐẦM NỮ CỔ CHỮ U XẺ TÀ SÀNH ĐIỆU: Với chất vải cao cấp nhập khẩu từ Thái Lan, vải dày dặn, thấm hút mồ hôi tốt. Bên cạnh đó thiết kế sang trọng với cổ chữ U và xẻ tà quyến rũ giúp người mặc trông thật trẻ trung năng động và đầy tự tin. <br>Chất liệu: VẢI KATE CO GIÃN NHẬP KHẨU THÁI LA', 'X', 5, 5, 'dam-nu-co-chu-u-xe-ta-sanh-dieu.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'ĐẦM HOA 2 LỚP XẾP EO MS 48B8245', 'Đầm 2 lớp dáng chữ A, cổ tròn. Xếp nếp ở mặt trước phần eo. Tay lỡ. Cài bằng khóa kéo ẩn sau lưng. Vải họa tiết hoa thu hút. Kiểu dáng chữ A, ôm nhẹ với độ dài trên gối cùng phần tay lỡ giúp che đi hầu hết các khuyết điểm cơ thể. Bên cạnh đó chất liệu thô co giãn nhẹ, bền màu, ít nhăn mang lại cảm giác thoải mái khi mặc. <br>Chất liệu: Thô', 'XS', 5, 5, 'damhoa2lop.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'ĐẦM LỤA CHẤM BI 2 LỚP MS 48M4844', 'Đầm lụa chấm bi, cổ chữ V vạt trước đáp chéo được xếp nếp tinh tế, tay ngắn. Dáng ôm. Eo chiết kèm đai cùng màu. Gấu sau xẻ. Cài bằng khóa kéo ẩn sau lưng. Những đường xếp ly ở phần chân váy giúp che được hết những khuyết điểm của cô nàng mảnh khảnh và mang đến sự tinh nghịch, trẻ trung, phá cách mà không kém phần quyến rũ cho phái đẹp. <br>Chất liệu: Lụa', 'XS', 5, 5, 'damluachambi.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Chân Váy Jean Rách', 'Màu sắc: Đen - Trắng. Kiểu dáng: Chất kaki jeans Co giãn, dày dặn, không xù lông và có thể giặt máy. Size : Size: S (dưới 45kg), M(46-50kg), L(51-55kg). Mục đích sử dụng: dạo phố. đi chơi, đi học hoặc đi làm', 'XS', 6, 6, 'chan-vay-jean-rach.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'Chân Váy Jean Ngắ', 'Màu sắc: Đen - Trắng. Kiểu dáng: Chất kaki jeans Co giãn, dày dặn, không xù lông và có thể giặt máy. Size : Size: S (dưới 45kg), M(46-50kg), L(51-55kg). Mục đích sử dụng: dạo phố. đi chơi, đi học hoặc đi làm', 'XS', 6, 6, 'chan-vay-jean-om.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'Chân Váy Xếp Ly', 'Những chiếc Chân Váy Xếp Ly mềm mại với chiều dài trên gối là lựa chọn dành riêng cho các quý cô yêu thích phong cách lãng mạn. Vì sao ư? vì chúng đơn giản nhưng không hề nhàm chán, kín đáo nhưng lại quyến rũ một cách lạ thường. Sự bắt cặp quá đỗi hoàn hảo này là bởi những đường ly thanh mảnh mềm mại đến tinh tế sẽ khiến cho các quý cô trông thật duyên dáng và chiều dài chỉ đến ngang bắp chân sẽ khiến cho mỗi bước đi trông thật uyển chuyển và gợi cảm. Chiếc váy chính là món đồ có thể kết hợp ăn ý cùng áo len chui đầu, áo phông, sơ mi dáng rộng và một đôi giày/sandals cao gót thanh mảnh.', 'XXL', 6, 6, 'chan-vay-xep-ly.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'SHORT LƯNG THUN VIỀN SỌC', 'Mix- Max phối cùng các kiểu áo thun thời trang, croptop phá cách, áo ba lỗ mát mẻ. Lưng thun dây rút tạo cảm giác thoải mái và tự tin cho người mặc. Short viền sọc là style đầy mới mẻ dành cho tủ đồ ngày hè của bạn gái.', 'XS', 7, 7, 'quan-shorrt-nu-lung-thun-vien-soc.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'Quần Short Jean Nhung', 'Quần Short Jean Rách Nhung cách điệu với thiết kế chuẩn form co giãn, đẹp mắt, dễ thương, kiểu dáng đơn giản. Dáng quần vừa vặn nhiều vóc người. Có thể kết hợp cùng nhiều thiết kế áo kiểu khác nhau.', 'S', 7, 7, 'quan-shorrt-nu-lung-thun-vien-soc.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'Quần Short 2 Túi Lai V', 'Mix- Max phối cùng các kiểu áo thun thời trang, croptop phá cách, áo ba lỗ mát mẻ. Lưng thun dây rút tạo cảm giác thoải mái và tự tin cho người mặc. Short viền sọc là style đầy mới mẻ dành cho tủ đồ ngày hè của bạn gái.', 'XS', 7, 7, 'quan-short-2-tui-lai.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'QUẦN JEANS NỮ ỐNG SUÔNG CÁCH ĐIỆU CÁ TÍNH', 'QUẦN JEANS NỮ ỐNG SUÔNG CÁCH ĐIỆU CÁ TÍNH: Với những cô nàng đã cực kỳ đam mê với mẫu quần ống suông nhưng thấy nhàm chán với mẫu basic ban đầu thì chắc chắn sản phẩm sẽ làm các nàng hài lòng với sự nhấn nhá, cách điệu với đường cắt dứt khoác, mạnh mẽ lần lượt tại hông và bắp chân. Đặc biệt là ống quần với thiết kế cắt thuần túy tại nên những tua rua tự nhiên mang đến sự năng động cho các nàng.<br>Chất liệu: VẢI JEANS DÀY MỊ', 'XS', 8, 8, 'quan-jeans-nu-ong-suong-cach-dieu-ca-tinh.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'QUẦN JEANS NỮ NHẤN CHỮ ĐÙI CÁ TÍNH', 'QUẦN JEANS NỮ NHẤN CHỮ ĐÙI CÁ TÍNH : Chất vải jeans cao cấp, tuyển chọn đảm bảo được form quần và màu lên chuẩn cùng với thiết kế hiện đại kèm theo sự trẻ trung thanh lịch để các cô gái luôn có thể tự tin diện ở mọi nơi mà không lo rằng sẽ không phù hợp và chắc chắn là các cô gái sẽ thật tỏa sáng, nổi bật với phong cách nhẹ nhàng.<br>Chất liệu: VẢI JEANS DÀY DẶN XUẤT KHẨU', 'XXS', 8, 8, 'quan-jeans-nu-nhan-chu-dui-ca-tinh.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'QUẦN JEANS NỮ WASH ỐNG ĐỘC ĐÁO', 'QUẦN JEANS NỮ WASH ỐNG ĐỘC ĐÁO: Chất liệu vải jeans dày dặn cao cấp, chắc chắn cho bạn yên tâm khi hoạt động mạnh, có khả năng thấm hút các giọt mồ hôi và co giãn tốt. Kiểu dáng thiết kế ống ôm sang trọng, khoe dáng, luôn luôn được những bạn gái yêu mến trong mọi phong cách thời trang.<br>Chất liệu: VẢI JEANS CHẤT LIỆU CAO CẤP', 'XS', 8, 8, 'quan-jeans-nu-wash-ong-doc-dao.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'QUẦN JOGGER DÂY KÉO NỮ XANH BIỂ', 'Phối quần jogger nữ với Áo crop top là item thời trang không thể thiếu trong tủ đồ hè của bạn gái. Chiếc áo cá tính này cũng là “người bạn thân” với quần jogger nữ. Cách phối đồ với quần jogger nữ và áo crop top không chỉ mang đến vẻ đẹp khoẻ khoắn, trẻ trung mà còn giúp các nàng khoe khéo vòng eo “con kiến” của mình.', 'XS', 9, 9, 'quan-jogger-day-keo-nu-xanh-than.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'QUẦN JOGGER KAKI NỮ XÁM TRẮNG', 'Phối quần jogger nữ với Áo crop top là item thời trang không thể thiếu trong tủ đồ hè của bạn gái. Chiếc áo cá tính này cũng là “người bạn thân” với quần jogger nữ. Cách phối đồ với quần jogger nữ và áo crop top không chỉ mang đến vẻ đẹp khoẻ khoắn, trẻ trung mà còn giúp các nàng khoe khéo vòng eo “con kiến” của mình.', 'XS', 9, 9, 'quan-jogger-kaki-nu-xam-trang.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'QUẦN JOGGER NỮ CÓ KHÓA GỐI KAKI ĐE', 'Phối quần jogger nữ với Áo crop top là item thời trang không thể thiếu trong tủ đồ hè của bạn gái. Chiếc áo cá tính này cũng là “người bạn thân” với quần jogger nữ. Cách phối đồ với quần jogger nữ và áo crop top không chỉ mang đến vẻ đẹp khoẻ khoắn, trẻ trung mà còn giúp các nàng khoe khéo vòng eo “con kiến” của mình.', 'XS', 9, 9, 'quan-jogger-nu-co-khoa.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `Anh` longtext DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `Anh`, `created_at`, `updated_at`) VALUES
(1, '1.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '2.jpg', '2023-05-09 19:52:12', '2023-05-09 19:52:12'),
(3, '3.jpg', '2023-05-09 19:52:31', '2023-05-09 19:52:31'),
(4, '4.jpg', '2023-05-09 19:52:39', '2023-05-09 19:52:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongsosanpham`
--

CREATE TABLE `thongsosanpham` (
  `id` int(11) NOT NULL,
  `TenThongSo` varchar(50) NOT NULL,
  `MoTaThongTin` longtext DEFAULT NULL,
  `sanpham_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongsosanpham`
--

INSERT INTO `thongsosanpham` (`id`, `TenThongSo`, `MoTaThongTin`, `sanpham_id`, `created_at`, `updated_at`) VALUES
(1, 'Kích thước:', '60x80cm', 1, '2023-05-10 05:45:28', '2023-05-10 05:45:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `id` int(11) NOT NULL,
  `TenThuongHieu` varchar(50) NOT NULL,
  `GioiThieu` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thuonghieu`
--

INSERT INTO `thuonghieu` (`id`, `TenThuongHieu`, `GioiThieu`, `created_at`, `updated_at`) VALUES
(1, 'CHANEL', 'Chanel chắc hẳn là cái tên không còn xa lạ gì dù chàng có là \"\"tín đồ thời trang hay không .Bởi thương hiệu đến từ Pháp này vô cùng nổi tiếng với nhiều sản phẩm khác nhau từ nước hoa , quần áo ,túi xanh hay một số loại mỹ phẩm \r\n<br>- Hướng đén phong cách thời trang thời thượng và đẳng cấp do đó các mẫu quần áo của Chanel được làm hoàn toàn từ chất liệu cao cấp cùng công nghệ may tinh xảo nhất .Bởi đó khó có ai có thể cưỡng lại sức hút toát ra từ các sản phẩm thời trang của thương hiệu này \r\n<br>-Đăc biệt , Chanel thường xuyên tổ chức các show diễn thời trang đỉnh cao thu hút rất nhiều nhà thiết kế trẻ ,tài năng để ra mắt bộ sưu tập mới của họ .Nhờ đó ,thương hiệu này ngày càng được nhiều người biết đén và trở thành số 1 trong làng thời trang thế giới', '2023-05-10 04:14:45', '2023-05-10 04:14:45'),
(2, 'GUCCI', 'Là một trong những biểu tượng thời trang co cấp của ý và pháp với những sản phẩm thời trang xa xỉ bậc nhất.Trong đó hai dòng sản phẩm thời trang nam và nữ chủ đạo là The House of Gucci với các mẫu thiết kế độc nhất và thời thượng \r\n<br>-Ngoài ra .Gucci cũng vô cùng nổi tiếng với các dòng túi sách , đồng hồ , kính mắt , phụ kiện thời trang hàng hiệu bậc nhất hiện nay ', '2023-05-10 04:15:32', '2023-05-10 04:15:32'),
(3, 'LOUIS VUITTO', 'là một trong những cái tên vàng trong làng thời trang của pháp ,LOUIS VUITTON không chỉ đơn giản là một thương hiệu thời trang xa xỉ mà nó còn là tượng đài của thời trang thế giới \r\n<br>-Được thành lập từ năm 1854 cho đến nay LOUIS VUITTON đã trở nên vô cùng nổi tiếng trên toàn thế giới và là một trong những thương hiệu thời trang cao cấp giá trị nhất .Không chỉ có những sản phẩm thời trang của nữ mà LOUIS VUITTON cũng có cho mình những bộ sưu tập thời trang nam chất nhất , được nhiều ngôi sao đón nhận \r\n<br>- Đặc biệt điều tạo nên sức hút khó cưỡng của thương hiệu thời trang nổi tiếng này là trang phục đều mang phong cách thời thượng , mới lạ và tinh xảo đến từng chi tiết nhỏ \r\n<br>- Cũng như nhiều thương hiệu thời trang hàng hiệu , cao cấp khác thì LOUIS VUITTON cũng đang ngày càng mở rộng ra các lĩnh vực khác như túi xách , nước hoa ,.....', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'DIOR', 'Được thành lập bởi nhà thiết kế tài ba Christian vào năm 1946 và cho đến nay nó đã trở thành thương hiệu thời trang nổi tiếng cao cấp bậc nhất tại pháp và được toàn thế giới công nhận .\r\n<br>- Đối với các dòng sản phẩm thời trang của Dior , khó cí ai cưỡng lại sức hút của nó bởi phong cách Haute Couture đặc trưng đậm tính kiến trúc và sự quyến rũ \r\n<br>- Nếu Dior Womanswear là một trong những sản phẩm cao cấp dành cho phái nữ đầy quý phái , sang trọng thì Dior Homme là dòng sản phẩm dành cho nam mang thiết kế tối giản ,tinh xảo và vô cùng thanh lịch ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'HERMES', 'HERMES cũng được biết đến là một trong những thương hiệu thời trang xa xỉ do người pháp thành lập từ năm 1837 khởi nguồn từ một cửa hàng bán vật dụng dành cho ngựa .Chính điều này đã tạo nên logo hình chiếc xe ngựa kéo quen thuộc của thương hiệu này \r\n<br>-Ngày nay , hermes đã trở thành đế chế thời trang khổng lồ của thế giới với những mẫu thời trang đẳng cấp và trang trọng nhất .Điểm độc đáo tạo nên sự nổi tiếng của thương hiệu thời trang nổi tiếng này là tất cả các sản phẩm đều được quan tâm đầu tư kỹ lưỡng trong quá trình sản xuất \r\n<br>-Đăc biệt với nhiều sản phẩm thời trang được làm hoàn toàn thủ công từ một người thợ duy nhất đẻ đảm bảo tính thống nhất và riêng biệt của sản phẩm .Nhờ đó , hermes là một trong những thương hiệu thời trang được nhiều ngôi sao nổi tiếng thế giới lựa chọn và sử dụng nhất tính đến 2021', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'DOLCE & GABBANA', 'Là một thương hiệu thời trang nổi tiếng về hàng cao cấp của ý được thành lập bởi chính hai nhà thiết kế này vào năm 1985 \r\n<br>-cũng nhờ được thành lập bởi hai nhà thiết kế tài hoa và có tầm ảnh hưởng lớn đến xu hướng thời trang bấy giờ nên thương hiệu này thực sự đem đến những mẫu thiết kế đẳng cấp , tinh tế mà hiếm thương hiệu nào làm được \r\n<br>-Do đó ,DOLCE & GABBANA được rất nhiều ngôi sao Hollywood tin dùng và ưa chuộng mỗi khi có dịp dự các sự kiện lớn như : Madonna , Monica Bellucci ,...', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'VERSACE', 'Là một biểu tượng thời trang cao cấp bậc nhất của ý , Thương hiệu đã khiến cả thế giới phải ngưỡng mộ và trầm trồ nhờ đem đến những sản phẩm thời trang chất lượng , xa xỉ nhất theo phong cách độc đáo , sang trọng và vô cùng ấn tượng \r\n<br>-Đối với ai yêu thích và là tín đồ của thời trang xa xỉ thế giới chắc hẳn đều nhận thấy họa tiết của các trang phục mang thương hiệu Versace của nghệ thuật Hy lạp cổ đại với màu sắc , chất liệu , nét cổ điển và tính nghệ thuật điển hình , hình khố mới lạ ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'PRADA', 'Là hãng thời trang danh giá nhất của nước ý đặc trưng với phong cách sang trọng , quý phái và thời thượng nên Prada đang ngày càng phát triển và định hướng trở thành thượng hiệu đỉnh cao của làng thời trang \r\n<br>-Cũng giống như nhiều thương hiệu thời trang nổi tiếng khác prada chia sản phẩm thành 2 dòng thời trng nam và nữ đẻ đáp ứng nhu cầu của khách hàng trên toàn thế giới .Đặc trưng của dòng sản phẩm này mang tính nghệ thuật cao có sự kết hợp nét cổ điển và hiện đại \r\n<br>- Do đó ,Prada cũng vẫn luôn tạo ra nét khác biệt mạnh mẽ giữa các thương hiệu thời trang khác ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'BURBERRY', 'Được coi là niềm tự hào của thời trang cao cấp Anh Quốc với lịch sử hình thành lâu đời nhất trên thế giới \r\n<br>- Mặc dù ngày nay thương hiệu này đã cho ra mắt nhiều bộ sưu tập với những thiết kế ấn tượng và thời thượng nhất nhưng một đặc trưng và độc quyền trong phong cách thời trang của thương hiệu này , khiến người ta nhớ mãi là họa tiết sọc caro đơn giản nhưng vô cùng tinh tế trang nhã \r\n<br>- Và chính họa tiết này cũng là cảm hứng thiết kế cho những sản phẩm thời trang khác như đông hồ , mũ , ... của Burberry cho đến tận ngày nay  ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'ARMANI', 'Là một trong những thương hiệu thời trang nổi tiếng của ý có tốc độ phát triển nhanh nhất ,Armani đang ngày càng khẳng định được tiếng tăm của mình trên thị trường thời trang cao cấp của thế giới \r\n<br>- Với những mẫu thời trang nam nữ hướng đến sự tối giản , tinh tế và có tính ứng dụng cao ,Armani đã chinh phục được nhiều nhà thiết kế nổi tiếng khác và nhiều ngôi sao nổi tiếng trên thế giới \r\n<br>-Không chỉ nổi tiếng về các sản phẩm thời trang mà đồng hồ , mỹ phẩm , đồ nội thất cũng là một trong những mặt hàng làm nên tên tuổi của thương hiệu này ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'RALPH LAURE', 'Thương hiệu thời trang nổi tiếng Ralph Lauren được thành lập 1967 bởi nhà thiết kế người mỹ \r\n<br>- Do đó các mẫu thời trang của thương hiệu này mang phong cách vừa sang trọng , vừa phóng khoáng và cổ điển đúng theo gu của người Mỹ \r\n<br>-Đặc biệt RALPH LAUREN còn được biết đến giống như cha` đẻ của biểu tượng Polo ngày nay nhờ bộ sưu tập thời trang giành cho nữ giới mang phong cách trang phục cổ điển của nam giới vào năm 1969 ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'GIVENCHY', 'Là thương hiệu thời trang do chính nhà thiết kế trẻ tài năng người pháp gốc ý cùng tên sáng lập năm 1952\r\n<br>-Tồn tại giữa kinh đô thời trang Paris với nhiều thương hiệu thời trang nổi tiếng và xa xỉ bậc nhất trên thế giớI nhưng GIVENCHY vẫn không hề kém cạnh mà đã tạo dựng cho mình được phong cách thời trang cao cấp khác biệt \r\n<br>-Các sản phẩm thời trang của GIVENCHY đều hướng tới tôn vinh nét đẹp hiện đại và đầy cá tính , sang trọng nhưng năng động của cả phái nam lẫn phái nữ .Nhờ đó , thương hiệu này đã nhanh chóng gia nhập đế chế thời trang hùng mạnh của thế giới một cách nhanh chóng ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'FENDI', 'Là thương hiệu thời trang nổi tiếng của ý do Edoardo và Adele Fendi sáng lập chuyên về các sản phẩm thời trang cao cấp , nước hoa , giày dép và các phụ kiện thời trang khác \r\n<br>-Trong đó ấn tượng nhất của các mẫu thời trang của thương hiệu này đều được làm từ da và lông thú - hai chất liệu cao cấp và xa xỉ hàng đầu .Bởi thế , mỗi khi các bộ sưu tập của thương hiệu này được tung ra thị trường luôn tạo ra cơn sốt thời trang đối với nhiều ngôi sao hàng đầu trên thế giới \r\n<br>- Cũng chính chất liệu này đem đến cho các dòng thời trang của FENDI phong cách sang trọng , quý phái mà thanh lịch hiếm có ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Yves Saint Laurent', 'Yves Saint Laurent là một trong những thương hiệu thời trang cao cấp nhất của kinh độ thời trang Paris được nhà thiết kế huyền thoại Yves Saint Laurent và đối tác của ông là Piere Berge sáng lập năm 1962\r\n<br>-Ngay từ những ngày đầu tiên ra mắt thời trang thế giới Yves Saint Laurent đã khiến cả thế giới thời trang phải sửng sốt và ngạc nhiên vì những mẫu thời trang nam nữ được thiết kế vô cùng tỉ mỉ , tinh xảo và nghệ thuật \r\n<br>-Không chỉ dừng lại thương hiệu thời trang nổi tiếng mà ngày nay Yves Saint Laurent cũng được biến đén là thương hiệu của các dòng mỹ phẩm cao cấp , xa xỉ được nhiều ngôi sao và giới thượng lưu trên thế giới ưa chuộng ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Bottega Veneta', 'Một cái tên đình đám khác của những thương hiệu thời trang nổi tiếng thế giới được ưa chuộng không kém là bottega Veneta - thương hiệu cao cấp của ý \r\n<br>-Với những kỹ thuật tác chế thủ công lâu đời và tinh xảo giúp cho các mẫu thiết kế của thương hiệu này chứa đựng một phong cách rất riêng biệt , mang đậm đặc trưng nước ý :đơn giản ,tinh tế và thời thượng  ', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(11) NOT NULL,
  `TieuDe` text NOT NULL,
  `NoiDung` text NOT NULL,
  `AnhTinTuc` text DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id`, `TieuDe`, `NoiDung`, `AnhTinTuc`, `users_id`, `created_at`, `updated_at`) VALUES
(1, 'Tin Tức về áo  sơ mi', 'Đây là một trong những kiểu áo truyền thống và có tính ứng dụng rất cao. Bạn có thể kết hợp chúng theo phong cách công sở hoặc<br>-thời trang dạo phố. Thiết kế hình học vót nhọn của cổ áo giúp nó hài hòa với cravat hoặc ngay cả để cổ trơn. Tuyệt vời hơn nữa là<br>-sơ mi cổ nhọn còn phù hợp với hầu hết tất cả các loại cổ áo veston nam hiện nay.', 'so-mi-nam-caro.jpg', 2, '2023-05-10 17:45:35', '2023-05-27 15:44:39'),
(2, 'Tin Tức về quần jogger', 'Chiếc quần jogger thể thao đầu tiên được giới thiệu vào những năm 1920 bởi thương nhân quần áo người pháp Émile Camuset và cũng người\r\nsáng lập Le Coq Sportif (Công ty về quần áo thể thao).  Đầu tiên những chiếc quần jogger là những chiếc quần màu xám được may đơn giản để\r\ncho các vận động viên co duỗi và chạy thoải mái..', 'quan-jogger-kaki-bo-lai.png', 2, '2023-05-10 17:46:53', '2023-05-10 17:46:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(50) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `avatar`, `phone`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'cuongnguyen', 'cuong31139@gmail.com', NULL, '1683655879_1682015028_img.jpg', '0818147402', '$2y$10$3FMahKX4ILldRhOlg45YIO2edY8kr242rA6JFy.Y8YNig0KSwx4l6', 1, 1, 'cVmK2C5F3o1WT9NE2Xk7jrr3n5FVNRimbyOEVL128jFHdvaVUKlX8akHoAfw', '2023-05-09 18:11:19', '2023-05-09 18:11:19'),
(2, 'Admin', 'Admin@gmail.com', NULL, '20230513160233.jpg', '0818147402', '$2y$10$3FMahKX4ILldRhOlg45YIO2edY8kr242rA6JFy.Y8YNig0KSwx4l6', 0, 1, 'hNTlQQ3Dpdd7oKSMWcfv9r0CK0W5oK2bsgjk7FiQ7UnIJckinjj7pLsXdkVK', '2023-05-09 20:12:08', '2023-05-13 16:02:33'),
(3, 'cuongnguyenvan', 'cuong2000@gmail.com', NULL, '1683776799_1683655879_1682015028_img.jpg', '0123456789', '$2y$10$k0X1ebnDM0CcSbNCINpaQ.byKM..XiV4i/8/ey0XJg9BTPtmMGV2C', 1, 1, 'WvEnGynlcWDyZ0hOlgjBuV8t8nPUxOAaXoRyyGEwsgUDq8xI4umds2qypuoo', '2023-05-11 03:46:39', '2023-05-11 03:46:39');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietanhsanpham`
--
ALTER TABLE `chitietanhsanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaSanPham` (`sanpham_id`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaDonHang` (`donhang_id`),
  ADD KEY `MaSanPham` (`sanpham_id`);

--
-- Chỉ mục cho bảng `chitiethoadonnhap`
--
ALTER TABLE `chitiethoadonnhap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaHDN` (`hoadonnhap_id`),
  ADD KEY `MaSanPham` (`sanpham_id`);

--
-- Chỉ mục cho bảng `chitietkho`
--
ALTER TABLE `chitietkho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaKho` (`kho_id`),
  ADD KEY `MaSanPham` (`sanpham_id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaKhachHang` (`khachhang_id`);

--
-- Chỉ mục cho bảng `gia`
--
ALTER TABLE `gia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaSanPham` (`sanpham_id`);

--
-- Chỉ mục cho bảng `giamgia`
--
ALTER TABLE `giamgia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaSanPham` (`sanpham_id`);

--
-- Chỉ mục cho bảng `gioithieu`
--
ALTER TABLE `gioithieu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaNhaCungCap` (`nhacungcap_id`),
  ADD KEY `uses_id` (`users_id`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaLoaiSanPham` (`loaisanpham_id`),
  ADD KEY `MaThuongHieu` (`thuonghieu_id`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thongsosanpham`
--
ALTER TABLE `thongsosanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaSanPham` (`sanpham_id`);

--
-- Chỉ mục cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uses_id` (`users_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietanhsanpham`
--
ALTER TABLE `chitietanhsanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `chitiethoadonnhap`
--
ALTER TABLE `chitiethoadonnhap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `chitietkho`
--
ALTER TABLE `chitietkho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `gia`
--
ALTER TABLE `gia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `giamgia`
--
ALTER TABLE `giamgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `gioithieu`
--
ALTER TABLE `gioithieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `kho`
--
ALTER TABLE `kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `thongsosanpham`
--
ALTER TABLE `thongsosanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietanhsanpham`
--
ALTER TABLE `chitietanhsanpham`
  ADD CONSTRAINT `chitietanhsanpham_ibfk_1` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`donhang_id`) REFERENCES `donhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitiethoadonnhap`
--
ALTER TABLE `chitiethoadonnhap`
  ADD CONSTRAINT `chitiethoadonnhap_ibfk_1` FOREIGN KEY (`hoadonnhap_id`) REFERENCES `hoadonnhap` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitiethoadonnhap_ibfk_2` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitietkho`
--
ALTER TABLE `chitietkho`
  ADD CONSTRAINT `chitietkho_ibfk_1` FOREIGN KEY (`kho_id`) REFERENCES `kho` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietkho_ibfk_2` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`khachhang_id`) REFERENCES `khachhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `gia`
--
ALTER TABLE `gia`
  ADD CONSTRAINT `gia_ibfk_1` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `giamgia`
--
ALTER TABLE `giamgia`
  ADD CONSTRAINT `giamgia_ibfk_1` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  ADD CONSTRAINT `hoadonnhap_ibfk_1` FOREIGN KEY (`nhacungcap_id`) REFERENCES `nhacungcap` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hoadonnhap_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`loaisanpham_id`) REFERENCES `loaisanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`thuonghieu_id`) REFERENCES `thuonghieu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `thongsosanpham`
--
ALTER TABLE `thongsosanpham`
  ADD CONSTRAINT `thongsosanpham_ibfk_1` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `tintuc_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
