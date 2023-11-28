-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 22, 2022 lúc 04:25 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ban_sach`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `makh` varchar(200) NOT NULL,
  `masach` varchar(200) NOT NULL,
  `tensach` varchar(200) NOT NULL,
  `soluong` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `mahd` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thanhtien` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `makh` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkh` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`makh`, `tenkh`, `sdt`, `diachi`, `username`) VALUES
('kh1', 'K', '', '', 'u6'),
('kh2', 'F', '', '', 'u7'),
('kh3', 'G', '', '', 'u8'),
('kh4', 'H', '', '', 'u9'),
('kh5', 'J', '', '', 'u10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `masach` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tensach` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loaisach` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong` int(200) NOT NULL,
  `giaban` int(200) NOT NULL,
  `hinhanh` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`masach`, `tensach`, `loaisach`, `soluong`, `giaban`, `hinhanh`) VALUES
('s1', 'Rèn luyện tư duy phản biện', 'kỹ năng sống', 300, 70000, 'img/rltdpb.jpg'),
('s2', 'Thiên tài bên trái, Kẻ điên bên phải', 'Tâm lý', 612, 90000, 'img/ttbtkdbp.jpg'),
('s3', '39 câu hỏi cho người trẻ', 'Sách cho tuổi mới lớn', 879, 80000, 'img/39chcnt.jpg\r\n'),
('s4', 'Đắc nhân tâm', 'Rèn luyện nhân cách', 155, 40000, 'img/dnt.jpg'),
('s5', 'Bản tính con người', 'Hạt giống tâm hồn', 879, 45000, 'img/btcn.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `username` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`username`, `password`, `avatar`) VALUES
('u1', '111', ''),
('u10', '1000', ''),
('u2', '222', ''),
('u3', '333', ''),
('u4', '444', ''),
('u5', '555', ''),
('u6', '666', ''),
('u7', '777', ''),
('u8', '888', ''),
('u9', '999', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`mahd`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makh`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`masach`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
