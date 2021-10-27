-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 22, 2021 lúc 09:38 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_nhan_vien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_nv`
--

CREATE TABLE `loai_nv` (
  `ma_loai_NV` varchar(10) NOT NULL,
  `ten_loai_NV` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loai_nv`
--

INSERT INTO `loai_nv` (`ma_loai_NV`, `ten_loai_NV`) VALUES
('HC', 'Hành chính'),
('KD', 'Kinh doanh'),
('KT', 'Kế toán'),
('TK', 'Thư kí');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `ma_NV` varchar(10) NOT NULL,
  `ho` varchar(30) NOT NULL,
  `ten` varchar(10) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `gioi_tinh` varchar(5) NOT NULL,
  `dia_chi` varchar(70) NOT NULL,
  `anh` varchar(20) NOT NULL,
  `ma_loai_NV` varchar(10) NOT NULL,
  `ma_phong` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhan_vien`
--

INSERT INTO `nhan_vien` (`ma_NV`, `ho`, `ten`, `ngay_sinh`, `gioi_tinh`, `dia_chi`, `anh`, `ma_loai_NV`, `ma_phong`) VALUES
('NV01', 'La Thị Hoài', 'Hoa', '2000-09-10', 'Nữ', 'Ninh An - Ninh Hòa', 'hoa.jpg', 'KD', 'P02'),
('NV02', 'Trần Văn ', 'Châu', '2000-02-03', 'Nam', 'Tu Bông - Khánh Hòa', 'chau.jpg', 'HC', 'P04'),
('NV03', 'Võ Đình', 'Chí', '2000-07-08', 'Nam', 'Diên Khánh- Khánh Hòa', 'chi.jpg', 'KT', 'P01'),
('NV04', 'Lê Thị Mỹ ', 'Lê', '2000-09-09', 'Nữ', 'Ninh Diêm - Khánh Hòa', 'le.jpg', 'TK', 'P03'),
('NV05', 'La Thị', 'Hằng', '2000-05-15', 'Nữ', 'Ninh Hòa- Khánh Hòa', 'hang.jpg', 'HC', 'P04'),
('NV06', 'Trần Văn', 'Bình', '2000-03-15', 'Nam', 'Vạn Giã- Khánh Hòa', 'binh.jpg', 'HC', 'P04'),
('NV07', 'Mai Thị Tuyết', 'Lan', '2000-08-03', 'Nữ', 'Phú Yên- Bình Định', 'lan.jpg', 'KT', 'P01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong_ban`
--

CREATE TABLE `phong_ban` (
  `ma_phong` varchar(10) NOT NULL,
  `ten_phong` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `phong_ban`
--

INSERT INTO `phong_ban` (`ma_phong`, `ten_phong`) VALUES
('P01', 'Ban kế toán'),
('P02', 'Ban kinh doanh'),
('P03', 'Ban thư kí'),
('P04', 'Ban hành chính');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `loai_nv`
--
ALTER TABLE `loai_nv`
  ADD PRIMARY KEY (`ma_loai_NV`);

--
-- Chỉ mục cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`ma_NV`),
  ADD KEY `ma_loai_NV` (`ma_loai_NV`),
  ADD KEY `ma_phong` (`ma_phong`);

--
-- Chỉ mục cho bảng `phong_ban`
--
ALTER TABLE `phong_ban`
  ADD PRIMARY KEY (`ma_phong`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD CONSTRAINT `nhan_vien_ibfk_1` FOREIGN KEY (`ma_loai_NV`) REFERENCES `loai_nv` (`ma_loai_NV`),
  ADD CONSTRAINT `nhan_vien_ibfk_2` FOREIGN KEY (`ma_phong`) REFERENCES `phong_ban` (`ma_phong`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
