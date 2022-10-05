-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 05, 2022 lúc 04:56 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `kiem_tra`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_sach` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ISBN` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tac_gia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `the_loai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_trang` int(11) NOT NULL,
  `nam_xuat_ban` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`id`, `ten_sach`, `ISBN`, `tac_gia`, `the_loai`, `so_trang`, `nam_xuat_ban`, `created_at`, `updated_at`) VALUES
(2, 'Repellat', '12345678912345678909', 'Xuân Diệu', 'Thơ', 661, 1659, '2022-10-04 19:32:59', '2022-10-04 19:32:59'),
(3, 'Distinctio', '12345678912345678909', 'Xuân Diệu', 'Thơ', 102, 1782, '2022-10-04 19:33:53', '2022-10-04 19:36:21'),
(4, 'Repellendus et corrupti.', '12345678912345678909', 'Xuân Quỳnh', 'Văn', 522, 598, '2022-10-04 19:36:38', '2022-10-04 19:36:38'),
(5, 'Aliquid', '12345678912345678909', 'Ngô Tất Tố', 'Thơ', 440, 1810, '2022-10-04 19:36:46', '2022-10-04 19:36:46'),
(6, 'Harum', '12345678912345678909', 'Xuân Quỳnh', 'Sách Giáo khoa', 131, 340, '2022-10-04 19:36:56', '2022-10-04 19:36:56'),
(7, 'Aperiam', '12345678912345678909', 'Xuân Quỳnh', 'Thơ', 509, 1793, '2022-10-04 19:37:05', '2022-10-04 19:37:05');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
