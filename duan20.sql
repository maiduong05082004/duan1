-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th1 24, 2024 lúc 03:44 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan20`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `acc_id` int(11) NOT NULL,
  `acc_user` varchar(255) NOT NULL,
  `acc_pass` varchar(255) NOT NULL,
  `acc_email` varchar(255) NOT NULL,
  `acc_name` varchar(255) NOT NULL,
  `acc_address` varchar(255) NOT NULL,
  `acc_tel` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`acc_id`, `acc_user`, `acc_pass`, `acc_email`, `acc_name`, `acc_address`, `acc_tel`, `role`) VALUES
(1, 'maiduong0508', 'Duong20@04', 'duongmdph40323@gmail.com', 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 1),
(2, 'mailinh2004', '0939393332', 'dunglinh@gmail.com', 'linh Dung', '', '0396989346', 1),
(3, 'mailinh', 'linh2004@', 'linh@gmail.com', 'Mai Lê Linh', 'Thọ Xuân', '0865643858', 1),
(4, 'vugiahuy922', 'huyV4$@huy', 'vugiahuy@gmail.com', 'Vũ Gia Huy', 'Hà Nội', '093311625', 2),
(5, 'quangle97', 'quangLe97@.$', 'quangle97@gmail.com', 'Lê Văn Quang', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 2),
(6, 'Dương Mai', 'thuyct09', 'thuyvt09@gmail.com', 'Lê Thị Thúy', 'Hải Phòng', '0865643858', 2),
(7, 'tienanh1177', 'tienanh!2pc', 'trontienanh@gmail.com', 'Tron Tiên Anh', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 2),
(8, 'longct991', 'Long2004@', 'long@gmail.com', 'Long ma', 'Hà Nội', '093311625', 3),
(10, 'hoangtc', 'hoang1994@', 'hoangvantham@gmail.com', 'Hoàng Tú Cầu', 'Sơn la', '093311625', 3),
(11, 'tuananh97', 'ph#amTaun21', 'phamtuananh21@gmail.com', 'Phạm Tuấn Anh', 'Kiên Giang', '093311625', 3),
(12, 'anienguyen', 'ng2@eneni@', 'annie@gmail.com', 'Nguyễn Duy Hoàng', 'Thanh Hóa', '093311625', 4),
(14, 'manhot21', 'manh$51r', 'manhot@gmail.com', 'Mạnh Ngơ Tiu', 'Thanh Hóa', '093311625', 4),
(15, 'maiduong2004', 'Duong2004@', 'duongmdph40323@fpt.edu.vn', 'Hoàng Trung Dương', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 3),
(17, 'Mai Đức Dương', 'Duong2004@', 'duongkhongkich@gmail.com', 'Mai Dương', 'ngõ 110 nguyên xá', '0865643858', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `idbill` int(11) NOT NULL,
  `acc_id` int(11) DEFAULT NULL,
  `bill_name` varchar(255) NOT NULL,
  `bill_address` varchar(255) NOT NULL,
  `bill_tel` varchar(15) NOT NULL,
  `bill_email` varchar(255) NOT NULL,
  `bill_pttt` tinyint(1) NOT NULL COMMENT '1.Thanh toán khi nhận hang 2.Thanh toán qua tài khoản ngân hàng',
  `ngaydathang` datetime DEFAULT NULL,
  `bill_total` varchar(255) NOT NULL,
  `bill_status` varchar(1255) NOT NULL COMMENT '1.Đang sử lý 2.Đang giao hàng 3.Đã giao hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`idbill`, `acc_id`, `bill_name`, `bill_address`, `bill_tel`, `bill_email`, `bill_pttt`, `ngaydathang`, `bill_total`, `bill_status`) VALUES
(5, 1, 'Mai Dương', '198 lê thanh tông', 'duongmdph40323@', '0865643858', 1, '2023-11-29 16:55:03', '23970000', '3'),
(6, 2, 'Mai Dương', '198 lê thanh tông', 'duongmdph40323@', '0865643858', 1, '2023-11-29 16:55:03', '23970000', '1'),
(7, 3, 'Mai Dương', '198 lê thanh tông', 'duongmdph40323@', '0865643858', 1, '2023-11-29 17:00:33', '45550000', '1'),
(8, 4, 'Mai Dương', '198 lê thanh tông', 'duongmdph40323@', '0865643858', 1, '2023-11-29 17:00:33', '45550000', '1'),
(12, 5, 'Mai Dương', '198 lê thanh tông', 'duongmdph40323@', '0865643858', 1, '2023-11-29 17:07:26', '45550000', '1'),
(13, 6, 'Mai Dương', '198 lê thanh tông', 'duongmdph40323@', '0865643858', 1, '2023-11-29 17:07:26', '45550000', '1'),
(14, 7, 'Mai Dương', '198 lê thanh tông', 'duongmdph40323@', '0865643858', 1, '2023-11-29 17:08:42', '45550000', '1'),
(15, 8, 'Mai Dương', '198 lê thanh tông', 'duongmdph40323@', '0865643858', 1, '2023-11-29 17:08:42', '45550000', '1'),
(16, 9, 'Mai Dương', '198 lê thanh tông', 'duongmdph40323@', '0865643858', 1, '2023-11-29 17:09:32', '45550000', '1'),
(17, 10, 'Mai Dương', '198 lê thanh tông', 'duongmdph40323@', '0865643858', 1, '2023-11-29 17:09:32', '45550000', '1'),
(18, 1, 'Mai Dương', '198 lê thanh tông', 'duongmdph40323@', '0865643858', 1, '2023-11-29 17:10:23', '45550000', '1'),
(19, 2, 'Mai Dương', '198 lê thanh tông', 'duongmdph40323@', '0865643858', 1, '2023-11-29 17:10:23', '45550000', '1'),
(28, 4, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-29 19:36:05', '15980000', '1'),
(31, 2, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-29 20:07:25', '15980000', '1'),
(32, 3, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-29 20:26:42', '15980000', '1'),
(33, 4, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-29 20:26:42', '15980000', '1'),
(34, 5, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-29 20:26:51', '15980000', '1'),
(35, 6, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-29 20:26:51', '15980000', '1'),
(36, 7, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-29 20:26:59', '15980000', '1'),
(37, 8, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-29 20:26:59', '15980000', '1'),
(38, 9, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-29 20:28:01', '15980000', '1'),
(39, 11, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-29 20:28:01', '15980000', '1'),
(41, 2, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-29 20:33:57', '15980000', '1'),
(42, 12, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-29 20:34:20', '39030000', '1'),
(43, 4, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-29 20:34:20', '39030000', '1'),
(45, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-29 20:37:46', '39030000', '1'),
(47, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-29 20:37:49', '39030000', '1'),
(49, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 02:35:07', '39030000', '1'),
(51, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 02:39:10', '39030000', '1'),
(53, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 02:40:06', '39030000', '1'),
(55, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 02:40:31', '39030000', '1'),
(57, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 02:40:39', '39030000', '1'),
(59, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 02:40:49', '39030000', '1'),
(61, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 02:40:59', '39030000', '1'),
(63, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 02:41:04', '39030000', '1'),
(65, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 02:41:34', '39030000', '1'),
(67, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 02:43:10', '39030000', '1'),
(69, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 02:43:22', '47020000', '1'),
(71, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 02:43:51', '47020000', '1'),
(73, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 02:47:34', '47020000', '1'),
(75, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 2, '2023-11-30 02:47:41', '55010000', '1'),
(77, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 2, '2023-11-30 02:48:40', '55010000', '1'),
(79, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 02:53:48', '92340000', '1'),
(81, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 02:54:02', '92340000', '1'),
(83, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 03:10:25', '92340000', '1'),
(85, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 03:11:11', '92340000', '1'),
(87, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 03:11:16', '92340000', '1'),
(89, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 03:11:17', '92340000', '1'),
(91, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 03:11:18', '92340000', '1'),
(99, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 03:11:19', '92340000', '1'),
(101, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 03:11:20', '92340000', '1'),
(103, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 03:11:21', '92340000', '1'),
(105, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 03:11:22', '92340000', '1'),
(107, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 03:11:54', '92340000', '1'),
(109, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 03:12:00', '92340000', '1'),
(111, 1, 'Mai Dương32232323', '198 lê thánh tông232323', 'duongmdph40323@', '0123456789232', 1, '2023-11-30 03:15:09', '92340000', '1'),
(113, 1, 'Mai Dương32232323', '198 lê thánh tông232323', 'duongmdph40323@', '0123456789232', 1, '2023-11-30 03:18:08', '92340000', '1'),
(115, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 03:20:37', '30780000', '1'),
(117, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 03:22:09', '69810000', '1'),
(119, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 03:31:46', '69810000', '1'),
(120, 3, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 03:46:07', '15390000', '1'),
(121, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 03:46:07', '15390000', '1'),
(127, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 05:15:14', '15390000', '1'),
(129, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 05:27:48', '15390000', '1'),
(131, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 05:28:12', '30780000', '1'),
(133, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 05:30:08', '30780000', '1'),
(135, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 05:31:05', '30780000', '1'),
(137, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 05:31:22', '30780000', '1'),
(139, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 05:32:32', '30780000', '1'),
(140, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 05:33:45', '30780000', '1'),
(199, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 19:43:49', '15060000', '1'),
(213, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 20:49:52', '30120000', '1'),
(215, 1, 'Mai Dương', '198 lê thánh tông', 'duongmdph40323@', '0123456789', 1, '2023-11-30 22:12:03', '15390000', '1'),
(217, 1, 'Mai Dương', '198 lê thánh tông', '0123456789', 'duongmdph40323@gmail.com', 1, '2023-11-30 22:55:44', '15060000', '1'),
(219, 1, 'Mai Dương', '198 lê thánh tông', '0123456789', 'duongmdph40323@gmail.com', 1, '2023-11-30 23:01:11', '15060000', '1'),
(220, 1, 'Mai Dương', '198 lê thánh tông', '0123456789', 'duongmdph40323@gmail.com', 1, '2023-11-30 23:02:04', '15060000', '1'),
(231, 1, 'Mai Dương', '198 lê thánh tông', '0123456789', 'duongmdph40323@gmail.com', 1, '2023-11-30 23:10:37', '45060300', '1'),
(234, 1, 'Mai Dương', '198 lê thánh tông', '0123456789', 'duongmdph40323@gmail.com', 1, '2023-11-30 23:13:36', '15060000', '1'),
(241, 1, 'Mai Dương', '198 lê thánh tông', '0123456789', 'duongmdph40323@gmail.com', 1, '2023-12-01 00:05:02', '210840000', '1'),
(247, 1, 'Mai Dương', 'Bỉm Sơn', '0865643858', 'duongmdph40323@gmail.com', 2, '2023-12-01 11:44:11', '28180000', '1'),
(249, 1, 'Mai Dương', 'Bỉm Sơn', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-01 12:00:02', '29180000', '1'),
(257, 1, 'Mai Dương', 'Bỉm Sơn', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-01 16:24:29', '14590000', '1'),
(283, 1, 'Mai Dương', 'Bỉm Sơnâsxcvx', '0865643858cvcxv', 'duongmdph40323@gmail.comcxvxcv', 1, '2023-12-01 18:23:24', '53170000', '1'),
(284, 3, 'cx', 'cxcxc', 'cxcx', 'cxc', 1, '2023-12-02 05:09:33', '43770000', '1'),
(285, 4, 'cx', 'cxcxc', 'cxcx', 'cxc', 1, '2023-12-02 05:09:33', '43770000', '1'),
(286, 1, 'ưqewqew', 'qeqeqe', 'ưqeqeq', 'eqd@gmail.com', 1, '2023-12-02 05:10:58', '30120000', '1'),
(291, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-02 11:35:18', '51760000', '1'),
(293, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-02 11:54:33', '58830000', '1'),
(297, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-02 11:56:42', '15060000', '1'),
(303, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-02 11:58:55', '15060000', '1'),
(317, 8, 'Long ma', 'Hà Nội', '093311625', 'long@gmail.com', 1, '2023-12-02 12:57:22', '43770000', '1'),
(319, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-02 14:30:10', '102130000', '1'),
(321, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-02 14:32:20', '14590000', '1'),
(323, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-02 14:34:45', '620300000', '1'),
(325, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-02 14:46:03', '79900000', '1'),
(327, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-02 14:53:01', '145900000', '1'),
(329, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-02 14:55:03', '165660000', '1'),
(331, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-02 14:56:57', '145900000', '1'),
(333, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-02 14:57:43', '301200000', '1'),
(335, 12, 'Nguyễn Duy Hoàng', 'Thanh Hóa', '093311625', 'annie@gmail.com', 1, '2023-12-02 15:09:55', '301200000', '1'),
(337, 12, 'Nguyễn Duy Hoàng', 'Thanh Hóa', '093311625', 'annie@gmail.com', 1, '2023-12-02 15:13:15', '150600000', '1'),
(339, 12, 'Nguyễn Duy Hoàng', 'Thanh Hóa', '093311625', 'annie@gmail.com', 1, '2023-12-02 15:13:55', '145900000', '1'),
(341, 12, 'Nguyễn Duy Hoàng', 'Thanh Hóa', '093311625', 'annie@gmail.com', 1, '2023-12-02 15:16:04', '14590000', '1'),
(343, 12, 'Nguyễn Duy Hoàng', 'Thanh Hóa', '093311625', 'annie@gmail.com', 1, '2023-12-02 16:03:15', '15060000', '1'),
(345, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-02 18:35:29', '99550000', '1'),
(347, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-02 18:36:26', '94410000', '1'),
(349, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-02 18:51:58', '148920000', '1'),
(351, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-02 19:21:15', '59770000', '1'),
(353, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-02 19:38:13', '213660000', '1'),
(355, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-02 19:44:40', '43710000', '1'),
(357, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-02 19:47:28', '263870000', '1'),
(359, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-02 19:53:52', '178140000', '1'),
(361, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-02 19:54:31', '509253300', '1'),
(363, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-02 19:55:13', '598190000', '1'),
(365, 7, 'Tron Tiên Anh', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'trontienanh@gmail.com', 1, '2023-12-02 19:58:38', '485781100', '1'),
(367, 7, 'Tron Tiên Anh', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'trontienanh@gmail.com', 1, '2023-12-02 20:04:40', '166580000', '1'),
(369, 7, 'Tron Tiên Anh', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'trontienanh@gmail.com', 1, '2023-12-02 20:06:35', '523590000', '1'),
(371, 7, 'Tron Tiên Anh', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'trontienanh@gmail.com', 1, '2023-12-02 20:13:23', '764820000', '1'),
(373, 7, 'Tron Tiên Anh', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'trontienanh@gmail.com', 1, '2023-12-02 20:13:52', '15060000', '1'),
(375, 7, 'Tron Tiên Anh', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'trontienanh@gmail.com', 1, '2023-12-02 20:15:07', '15060000', '1'),
(377, 7, 'Tron Tiên Anh', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'trontienanh@gmail.com', 1, '2023-12-02 20:15:25', '29650000', '1'),
(379, 7, 'Tron Tiên Anh', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'trontienanh@gmail.com', 1, '2023-12-02 20:18:57', '0', '1'),
(381, 7, 'Tron Tiên Anh', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'trontienanh@gmail.com', 2, '2023-12-02 20:24:24', '23050000', '1'),
(383, 7, 'Tron Tiên Anh', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'trontienanh@gmail.com', 1, '2023-12-02 20:28:43', '25550100', '1'),
(385, 4, 'Vũ Gia Huy', 'Hà Nội', '093311625', 'vugiahuy@gmail.com', 1, '2023-12-02 20:38:51', '25080100', '1'),
(387, 4, 'Vũ Gia Huy', 'Hà Nội', '093311625', 'vugiahuy@gmail.com', 1, '2023-12-02 20:39:19', '15060000', '1'),
(389, 4, 'Vũ Gia Huy', 'Hà Nội', '093311625', 'vugiahuy@gmail.com', 1, '2023-12-02 20:39:42', '15390000', '1'),
(391, 4, 'Vũ Gia Huy', 'Hà Nội', '093311625', 'vugiahuy@gmail.com', 1, '2023-12-02 20:39:57', '7990000', '1'),
(393, 4, 'Vũ Gia Huy', 'Hà Nội', '093311625', 'vugiahuy@gmail.com', 1, '2023-12-02 20:40:34', '251762400', '1'),
(395, 4, 'Vũ Gia Huy', 'Hà Nội', '093311625', 'vugiahuy@gmail.com', 1, '2023-12-02 22:02:08', '317070000', '1'),
(397, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-04 15:29:14', '14590000', '1'),
(399, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 2, '2023-12-04 16:24:45', '14590000', '1'),
(401, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-04 16:47:32', '15060000', '1'),
(403, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-07 22:35:20', '79900000', '1'),
(405, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-08 06:32:28', '15060000', '1'),
(407, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-08 06:44:52', '14590000', '2'),
(409, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-08 06:51:59', '70940400', '2'),
(411, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-08 07:02:18', '105450100', '3'),
(413, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 2, '2023-12-08 11:07:12', '14590000', '1'),
(415, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-08 13:47:48', '15060000', '1'),
(417, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-08 15:17:40', '451800000', '3'),
(419, 1, 'Dương Mai', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@gmail.com', 1, '2023-12-08 18:01:13', '175080000', '3'),
(421, 15, 'Hoàng Trung Dương', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@fpt.edu.vn', 1, '2024-01-04 13:30:46', '14590000', '1'),
(423, 15, 'Hoàng Trung Dương', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@fpt.edu.vn', 1, '2024-01-05 10:32:39', '10490100', '1'),
(425, 15, 'Hoàng Trung Dương', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0865643858', 'duongmdph40323@fpt.edu.vn', 1, '2024-01-05 10:33:11', '15060000', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `thanhtien` varchar(255) NOT NULL,
  `idbill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `thanhtien`, `idbill`) VALUES
(3, 0, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 4, '31960000', 19),
(4, 0, 11, 'Asus Vivo AIO A3402WBAK i3 1215U 23.8 inch', 'a6.jpg', '13590000', 1, '13590000', 19),
(5, 1, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 3, '23970000', 67),
(6, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 1, '15060000', 67),
(7, 1, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 4, '31960000', 69),
(8, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 1, '15060000', 69),
(9, 1, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 4, '31960000', 71),
(10, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 1, '15060000', 71),
(11, 1, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 4, '31960000', 73),
(12, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 1, '15060000', 73),
(13, 1, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 5, '39950000', 75),
(14, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 1, '15060000', 75),
(15, 1, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 5, '39950000', 77),
(16, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 1, '15060000', 77),
(17, 1, 0, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 6, '92340000', 79),
(18, 1, 0, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 6, '92340000', 81),
(19, 1, 0, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 6, '92340000', 107),
(20, 1, 0, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 6, '92340000', 109),
(21, 1, 0, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 6, '92340000', 111),
(22, 1, 0, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 6, '92340000', 113),
(23, 1, 0, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 1, '15390000', 115),
(24, 1, 12, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 1, '15390000', 115),
(25, 1, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 3, '23970000', 117),
(26, 1, 12, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 2, '30780000', 117),
(27, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 1, '15060000', 117),
(28, 1, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 3, '23970000', 119),
(29, 1, 12, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 2, '30780000', 119),
(30, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 1, '15060000', 119),
(31, 1, 12, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 1, '15390000', 121),
(33, 1, 1, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7', 8, '63920000', 123),
(35, 1, 1, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7', 8, '63920000', 125),
(36, 1, 12, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 1, '15390000', 127),
(37, 1, 12, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 1, '15390000', 129),
(38, 1, 12, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 2, '30780000', 131),
(39, 1, 12, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 2, '30780000', 133),
(40, 1, 12, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 2, '30780000', 135),
(41, 1, 12, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 2, '30780000', 137),
(42, 1, 12, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 2, '30780000', 139),
(43, 1, 12, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 2, '30780000', 141),
(44, 1, 12, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 2, '30780000', 143),
(45, 1, 12, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 2, '30780000', 145),
(46, 1, 12, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 2, '30780000', 147),
(47, 1, 12, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 2, '30780000', 149),
(48, 1, 12, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 2, '30780000', 151),
(49, 1, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 1, '7990000', 151),
(50, 1, 12, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 2, '30780000', 153),
(51, 1, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 1, '7990000', 153),
(52, 1, 12, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 2, '30780000', 159),
(53, 1, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 1, '7990000', 159),
(54, 1, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 2, '15980000', 161),
(55, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 10, '150600000', 161),
(56, 1, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 2, '15980000', 163),
(57, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 10, '150600000', 163),
(58, 1, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 2, '15980000', 165),
(59, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 10, '150600000', 165),
(60, 1, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 2, '15980000', 167),
(61, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 10, '150600000', 167),
(62, 1, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 3, '23970000', 169),
(63, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 10, '150600000', 169),
(64, 8, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 1, '15060000', 171),
(65, 8, 0, 'Asus Vivo AIO A3402WBAK i3 1215U 23.8 inch', 'a6.jpg', '13590000', 3, '40770000', 173),
(66, 8, 0, 'Asus Vivo AIO A3402WBAK i3 1215U 23.8 inch', 'a6.jpg', '13590000', 3, '40770000', 175),
(67, 8, 0, 'Asus Vivo AIO A3402WBAK i3 1215U 23.8 inch', 'a6.jpg', '13590000', 3, '40770000', 177),
(68, 8, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 1, '15060000', 177),
(69, 8, 0, 'Asus Vivo AIO A3402WBAK i3 1215U 23.8 inch', 'a6.jpg', '13590000', 3, '40770000', 179),
(70, 8, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 1, '15060000', 179),
(71, 8, 0, 'Asus Vivo AIO A3402WBAK i3 1215U 23.8 inch', 'a6.jpg', '13590000', 3, '40770000', 181),
(72, 8, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 1, '15060000', 181),
(73, 8, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 1, '7990000', 181),
(74, 1, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 1, '7990000', 183),
(75, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 1, '15060000', 199),
(76, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 2, '30120000', 213),
(77, 1, 12, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 1, '15390000', 215),
(78, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 1, '15060000', 217),
(79, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 1, '15060000', 219),
(80, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 1, '15060000', 221),
(81, 1, 11, 'Asus Vivo AIO A3402WBAK i3 1215U 23.8 inch', 'a6.jpg', '13590000', 1, '13590000', 231),
(82, 1, 10, 'Laptop Lenovo Ideapad 3 15IAU7 i3', 'a5.jpg', '10490100', 3, '31470300', 231),
(83, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 1, '15060000', 235),
(84, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 5, '75300000', 239),
(85, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 14, '210840000', 241),
(86, 1, 11, 'Asus Vivo AIO A3402WBAK i3 1215U 23.8 inch', 'a6.jpg', '13590000', 1, '13590000', 247),
(87, 1, 14, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 1, '14590000', 247),
(88, 1, 14, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 2, '29180000', 249),
(89, 1, 14, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 1, '14590000', 257),
(90, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 3, '45180000', 283),
(91, 1, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 1, '7990000', 283),
(92, 1, 11, 'Asus Vivo AIO A3402WBAK i3 1215U 23.8 inch', 'a6.jpg', '13590000', 1, '13590000', 289),
(93, 1, 14, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 3, '43770000', 291),
(94, 1, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 1, '7990000', 291),
(95, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 1, '15060000', 293),
(96, 1, 14, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 3, '43770000', 293),
(97, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 1, '15060000', 297),
(98, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 1, '15060000', 303),
(99, 1, 11, 'Asus Vivo AIO A3402WBAK i3 1215U 23.8 inch', 'a6.jpg', '13590000', 3, '40770000', 315),
(100, 1, 10, 'Laptop Lenovo Ideapad 3 15IAU7 i3', 'a5.jpg', '10490100', 3, '31470300', 315),
(101, 1, 9, 'Laptop Dell Vostro 15 3520 i3', 'a3.jpg', '10490100', 5, '52450500', 315),
(102, 8, 14, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 3, '43770000', 317),
(103, 1, 14, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 7, '102130000', 319),
(104, 1, 14, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 1, '14590000', 321),
(105, 1, 14, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 10, '145900000', 323),
(106, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 10, '150600000', 323),
(107, 1, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 10, '79900000', 323),
(108, 1, 13, 'HP ProOne 440 G9 AIO i7 12700T 23.8 inch', 'a6.jpg', '24390000', 10, '243900000', 323),
(109, 1, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 10, '79900000', 325),
(110, 1, 14, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 10, '145900000', 327),
(111, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 11, '165660000', 329),
(112, 1, 0, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 10, '145900000', 331),
(113, 1, 0, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 20, '301200000', 333),
(114, 12, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 20, '301200000', 335),
(115, 12, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 10, '150600000', 337),
(116, 12, 14, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 10, '145900000', 339),
(117, 12, 14, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 1, '14590000', 341),
(118, 12, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 1, '15060000', 343),
(119, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 3, '45180000', 345),
(120, 1, 14, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 1, '14590000', 345),
(121, 1, 13, 'HP ProOne 440 G9 AIO i7 12700T 23.8 inch', 'a6.jpg', '24390000', 1, '24390000', 345),
(122, 1, 12, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 1, '15390000', 345),
(123, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 1, '15060000', 347),
(124, 1, 14, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 1, '14590000', 347),
(125, 1, 13, 'HP ProOne 440 G9 AIO i7 12700T 23.8 inch', 'a6.jpg', '24390000', 2, '48780000', 347),
(126, 1, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 2, '15980000', 347),
(127, 1, 14, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 1, '14590000', 349),
(128, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 3, '45180000', 349),
(129, 1, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 2, '15980000', 349),
(130, 1, 13, 'HP ProOne 440 G9 AIO i7 12700T 23.8 inch', 'a6.jpg', '24390000', 3, '73170000', 349),
(131, 1, 14, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 1, '14590000', 351),
(132, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 3, '45180000', 351),
(133, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 3, '45180000', 353),
(134, 1, 14, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 11, '160490000', 353),
(135, 1, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 1, '7990000', 353),
(136, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 2, '30120000', 355),
(137, 1, 11, 'Asus Vivo AIO A3402WBAK i3 1215U 23.8 inch', 'a6.jpg', '13590000', 1, '13590000', 355),
(138, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 15, '225900000', 357),
(139, 1, 14, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 1, '14590000', 357),
(140, 1, 12, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 1, '15390000', 357),
(141, 1, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 1, '7990000', 357),
(142, 7, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 12, '180720000', 369),
(143, 7, 14, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 12, '175080000', 369),
(144, 7, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 21, '167790000', 369),
(145, 7, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 1, '15060000', 375),
(146, 7, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 1, '15060000', 377),
(147, 7, 14, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 1, '14590000', 377),
(148, 7, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 1, '15060000', 383),
(149, 7, 10, 'Laptop Lenovo Ideapad 3 15IAU7 i3', 'a5.jpg', '10490100', 1, '10490100', 383),
(150, 4, 9, 'Laptop Dell Vostro 15 3520 i3', 'a3.jpg', '10490100', 1, '10490100', 385),
(151, 4, 14, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 1, '14590000', 385),
(152, 4, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 1, '15060000', 387),
(153, 4, 12, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 1, '15390000', 389),
(154, 4, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 1, '7990000', 391),
(155, 4, 10, 'Laptop Lenovo Ideapad 3 15IAU7 i3', 'a5.jpg', '10490100', 12, '125881200', 393),
(156, 4, 9, 'Laptop Dell Vostro 15 3520 i3', 'a3.jpg', '10490100', 12, '125881200', 393),
(157, 4, 13, 'HP ProOne 440 G9 AIO i7 12700T 23.8 inch', 'a6.jpg', '24390000', 13, '317070000', 395),
(158, 1, 14, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 1, '14590000', 397),
(159, 1, 14, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 1, '14590000', 399),
(160, 1, 15, 'Asus Vivobook X415EA i3', 'a10.jpg', '15060000', 1, '15060000', 401),
(161, 1, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 10, '79900000', 403),
(162, 1, 15, 'Asus Vivobook X415EA i3 5300K (21A200RWVN)', 'a10.jpg', '15060000', 1, '15060000', 405),
(163, 1, 14, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 1, '14590000', 407),
(164, 1, 11, 'Asus Vivo AIO A3402WBAK i3 1215U 23.8 inch', 'a6.jpg', '13590000', 1, '13590000', 409),
(165, 1, 12, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', 'a4.jpg', '15390000', 1, '15390000', 409),
(166, 1, 9, 'Laptop Dell Vostro X415EA 15 3520 i3 5600K', 'a3.jpg', '10490100', 4, '41960400', 409),
(167, 1, 10, 'Laptop Lenovo Ideapad 3 15IAU7 i3 1215U', 'a5.jpg', '10490100', 1, '10490100', 411),
(168, 1, 15, 'Asus Vivobook X415EA i3 5300K (21A200RWVN)', 'a10.jpg', '15060000', 1, '15060000', 411),
(169, 1, 20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', 'anh-trong-suot-3.png', '7990000', 10, '79900000', 411),
(170, 1, 14, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 1, '14590000', 413),
(171, 1, 15, 'Asus Vivobook X415EA i3 5300K (21A200RWVN)', 'a10.jpg', '15060000', 1, '15060000', 415),
(172, 1, 15, 'Asus Vivobook X415EA i3 5300K (21A200RWVN)', 'a10.jpg', '15060000', 30, '451800000', 417),
(173, 1, 14, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 12, '175080000', 419),
(174, 15, 14, 'Asus Vivobook Go 15 E1504FA R5 7520U', 'a7.jpg', '14590000', 1, '14590000', 421),
(175, 15, 10, 'Laptop Lenovo Ideapad 3 15IAU7 i3 1215U', 'a5.jpg', '10490100', 1, '10490100', 423),
(176, 15, 15, 'Asus Vivobook X415EA i3 5300K (21A200RWVN)', 'a10.jpg', '15060000', 1, '15060000', 425);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `cmt_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`cmt_id`, `acc_id`, `product_id`, `content`, `date`) VALUES
(1, 1, 1, 'Sản phẩm chất lượng', '2023-11-24 00:06:04'),
(2, 2, 1, 'Ship hàng nhanh,hàng đẹp chất lượng', '2023-11-24 09:43:04'),
(3, 2, 14, 'Ship hàng nhanh,hàng đẹp chất lượng', '2023-11-24 09:43:04'),
(4, 2, 14, 'Ship hàng nhanh,hàng đẹp chất lượng', '2023-11-24 09:43:04'),
(5, 3, 7, 'Sản phẩm rất tốt', '2023-11-24 09:43:04'),
(6, 4, 7, 'Sản phẩm này rất tuyệt vời, tôi đã sử dụng nó trong một tháng và rất hài lòng', '2023-11-24 09:43:04'),
(7, 5, 8, 'Sản phẩm này rất tuyệt vời, tôi đã sử dụng nó trong một tháng và rất hài lòng', '2023-11-24 09:43:04'),
(8, 6, 9, 'Giá trị tốt cho chất lượng tuyệt vời. Tôi sẽ mua thêm một sản phẩm khác.', '2023-11-24 09:43:04'),
(9, 1, 1, 'Laptop Asus này vận hành mượt mà, hỗ trợ công việc hằng ngày của tôi rất tốt.', '2023-12-02 07:31:44'),
(10, 2, 2, 'Máy chạy êm và nhanh, thiết kế thì cực kỳ sang trọng.', '2023-12-02 07:31:44'),
(11, 3, 3, 'Dell Vostro với thiết kế bền bỉ, phù hợp với môi trường văn phòng.', '2023-12-02 07:31:44'),
(12, 4, 4, 'Chất lượng hình ảnh và âm thanh của HP Pavilion rất đáng khen ngợi.', '2023-12-02 07:31:44'),
(13, 5, 5, 'HP Pavilion này có thời lượng pin khá tốt, phù hợp với nhu cầu di động cao.', '2023-12-02 07:31:44'),
(14, 6, 6, 'Laptop TUF Gaming F15 chơi game mượt mà không lo giật lag.', '2023-12-02 07:31:44'),
(15, 7, 7, 'Dell Vostro 15 có bàn phím thoải mái, thích hợp cho việc gõ lâu.', '2023-12-02 07:31:44'),
(16, 8, 8, 'Lenovo Ideapad 3 thực sự vượt trội về giá trị sử dụng so với giá cả.', '2023-12-02 07:31:44'),
(17, 9, 9, 'Asus Vivo AIO có màn hình cảm ứng rất nhạy, tôi rất thích.', '2023-12-02 07:31:44'),
(18, 10, 10, 'HP AIO ProOne chạy rất mát, không hề phát ra tiếng ồn dù sử dụng lâu.', '2023-12-02 07:31:44'),
(19, 11, 11, 'HP ProOne 440 G9 có thiết kế đẹp mắt, hiện đại phù hợp mọi không gian làm việc.', '2023-12-02 07:31:44'),
(20, 12, 12, 'Asus Vivobook Go 15 tiện lợi cho những chuyến công tác nhờ thiết kế nhẹ nhàng.', '2023-12-02 07:31:44'),
(21, 10, 13, 'Chất lượng bản lề của ThinkBook 14 rất tốt, mở và đóng mượt mà.', '2023-12-02 07:31:44'),
(22, 12, 14, 'Laptop Asus này có độ phân giải màn hình tuyệt vời, rất thích hợp cho thiết kế đồ họa.', '2023-12-02 07:31:44'),
(23, 11, 15, 'Lenovo Ideapad có hiệu suất tốt, nhưng hơi nóng khi sử dụng các ứng dụng nặng.', '2023-12-02 07:31:44'),
(24, 1, 16, 'Laptop HP này có bàn phím rất êm, thích hợp với những người thường xuyên phải gõ văn bản.', '2023-12-02 07:31:44'),
(25, 2, 17, 'Dell Vostro có thời lượng pin khá tốt, tôi có thể dùng cả ngày không cần sạc.', '2023-12-02 07:31:44'),
(26, 3, 18, 'Màn hình của Asus TUF Gaming F15 sáng và rõ nét, rất tốt cho game thủ.', '2023-12-02 07:31:44'),
(27, 4, 19, 'Laptop HP Pavilion này có thiết kế mỏng nhẹ, dễ dàng mang theo mọi nơi.', '2023-12-02 07:31:44'),
(29, 1, 14, 'hi\r\n', '2023-12-10 21:55:47'),
(30, 15, 11, 'ngon', '2023-12-28 23:23:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `genre`
--

INSERT INTO `genre` (`genre_id`, `genre_name`) VALUES
(1, 'Dell'),
(2, 'Lenovo'),
(3, 'HP'),
(4, 'ASUS'),
(5, 'MacBook');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(11) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_content` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_view` int(20) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_img`, `product_content`, `product_quantity`, `product_view`, `genre_id`) VALUES
(1, 'Asus Vivobook X415EA i3 5300U (21A200RWVN)', '15.060.000₫', 'a10.jpg', ' Laptop Asus Vivobook với bộ vi xử lý Intel Core i3 1115G4 thế hệ thứ 11 và tốc độ xung nhịp lên đến 4.1 GHz đảm bảo sức mạnh và hiệu suất cao, đủ tốt để xử lý các tác vụ học tập, làm việc văn phòng trên Word, Excel, PowerPoint,... ', 5454, 90, 4),
(2, 'Asus Vivobook X415EA i3 2100K (21A200RWVN)', '15.060.000₫', 'a10.jpg', ' Laptop Asus Vivobook với bộ vi xử lý Intel Core i3 1115G4 thế hệ thứ 11 và tốc độ xung nhịp lên đến 4.1 GHz đảm bảo sức mạnh và hiệu suất cao, đủ tốt để xử lý các tác vụ học tập, làm việc văn phòng trên Word, Excel, PowerPoint,... ', 342, 90, 4),
(3, 'Laptop Dell Vostro 3400 (70270645)', '18,990,000₫', 'anhtrongsuot1.png', 'Laptop Dell Vostro 3400 (70270645) có lớp vỏ ngoài được làm từ chất liệu nhựa, giúp giảm đáng kể trọng lượng của máy, từ đó không gây ra cảm giác quá nặng khi người sử dụng phải mang laptop theo mình. Màu sơn đen có viền sọc cũng sẽ giúp làm tặng vẻ huyền', 3123, 1452, 1),
(4, 'HP 15s Fq2716TU I3 1115G4 (7C0X3PA)', '10.490.100₫', 'anhtrongsuot5.png', '• Laptop HP sử dụng bộ vi xử lý Intel Core i3 1215U kết hợp cùng hiệu suất xử lý nâng cao của card tích hợp Intel UHD Graphics cho phép người dùng khả năng xử lý công việc trơn tru trên Word, Excel, PowerPoint,... cũng như giải trí, xem phim lướt web và c', 5656, 7542, 3),
(7, 'HP 15s Fq2716TU I3 1115G4 (7C0X3PA)', '10.490.100₫', 'anhtrongsuot5.png', ' Laptop HP sử dụng bộ vi xử lý Intel Core i3 1215U kết hợp cùng hiệu suất xử lý nâng cao của card tích hợp Intel UHD Graphics cho phép người dùng khả năng xử lý công việc trơn tru trên Word, Excel, PowerPoint,... cũng như giải trí, xem phim lướt web và ch', 978, 7542, 3),
(8, 'Asus TUF Gaming F15 FX506HF i5 11400H', '10.490.100₫', 'a2.jpg', 'Với bộ vi xử lý Intel Core i5 dòng H mạnh mẽ và card đồ họa rời NVIDIA GeForce RTX 2050 4 GB, laptop Asus TUF Gaming F15 FX506HF là một trong những lựa chọn tuyệt vời cho các game thủ và những người dùng làm việc đa tác vụ hoặc liên quan đến đồ họa, kỹ th', 689, 904, 4),
(9, 'Laptop Dell Vostro X415EA 15 3520 i3 5600K', '10.490.100₫', 'a3.jpg', 'Laptop Dell Vostro 15 3520 i3 1215U (5M2TT1) là một lựa chọn hoàn hảo dành cho những người tìm kiếm một thiết bị gọn gàng và đa năng. Với sự kết hợp giữa bộ vi xử lý Intel thế hệ 12 và tần số quét cao 120 Hz', 98, 904, 1),
(10, 'Laptop Lenovo Ideapad 3 15IAU7 i3 1215U', '10.490.100₫', 'a5.jpg', 'Laptop Lenovo Ideapad 3 15IAU7 i3 (82RK005LVN) đã trở thành một người bạn đồng hành đắc lực, cùng mình giải quyết mọi vấn đề trong công việc cũng như học tập ', 67, 90, 2),
(11, 'Asus Vivo AIO A3402WBAK i3 1215U 23.8 inch', '13.590.000₫', 'a6.jpg', 'Máy tính để bàn Asus Vivo AIO A3402WBAK i3 1215U 23.8 inch (WA070W) được thiết kế với nhiều tính năng hữu ích và phần cứng hiện đại, giúp tối ưu hóa trải nghiệm làm việc cũng như giải trí của người dùng.', 12, 90, 4),
(12, 'HP AIO ProOne 240 G9 i3 1215U 23.8 inch', '15.390.000₫', 'a4.jpg', 'Máy tính để bàn HP được trang bị bộ vi xử lý Intel Core i3 1215U cùng card đồ họa tích hợp Intel UHD hỗ trợ bạn xử lý mượt mà các tác vụ văn phòng như Word, Excel, PowerPoint,... cũng như tạo ra các sản phẩm về hình ảnh, video,... trên những ứng dụng của ', 32, 90, 3),
(13, 'HP ProOne 440 G9 AIO i7 12700T 23.8 inch', '24.390.000₫', 'a6.jpg', 'Máy tính để bàn HP ProOne 440 G9 AIO i7 12700T 23.8 inch (6M3Y4PA) được thiết kế với tính năng đa dạng và tối ưu hóa để đáp ứng nhu cầu sử dụng của cả doanh nghiệp và người dùng cá nhân, giúp tăng cường hiệu suất làm việc, đáp ứng các nhu cầu công việc đò', 43, 90, 3),
(14, 'Asus Vivobook Go 15 E1504FA R5 7520U', '14.590.000₫', 'a7.jpg', 'Máy tính để bàn HP ProOne 440 G9 AIO i7 12700T 23.8 inch (6M3Y4PA) được thiết kế với tính năng đa dạng và tối ưu hóa để đáp ứng nhu cầu sử dụng của cả doanh nghiệp và người dùng cá nhân, giúp tăng cường hiệu suất làm việc, đáp ứng các nhu cầu công việc đò', 311, 90, 4),
(15, 'Asus Vivobook X415EA i3 5300K (21A200RWVN)', '15.060.000₫', 'a10.jpg', '', 102, 90, 1),
(20, 'Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN)', '7.990.000₫', 'anh-trong-suot-3.png', 'Laptop Lenovo ThinkBook 14 G3 ACL R3 5300U (21A200RWVN) với hiệu năng ổn định giúp vận hành hiệu quả và mượt mà mọi tác vụ thường ngày của bạn, đi kèm với đó là một mức giá phù hợp, chắc chắn sẽ là sự lựa chọn tối ưu trong công việc', 544, 1234, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_of_account`
--

CREATE TABLE `role_of_account` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `role_of_account`
--

INSERT INTO `role_of_account` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Quản lý'),
(3, 'Người dùng'),
(4, 'Người dùng bị chặn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_vnpay`
--

CREATE TABLE `tbl_vnpay` (
  `id` int(11) NOT NULL,
  `vnp_Amount` varchar(50) NOT NULL,
  `vnp_BankCode` varchar(10) NOT NULL,
  `vnp_BankTranNo` varchar(50) NOT NULL,
  `vnp_CardType` varchar(20) NOT NULL,
  `vnp_OrderInfo` varchar(100) NOT NULL,
  `vnp_PayDate` varchar(50) NOT NULL,
  `vnp_TmnCode` varchar(50) NOT NULL,
  `vnp_TransactionNo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_vnpay`
--

INSERT INTO `tbl_vnpay` (`id`, `vnp_Amount`, `vnp_BankCode`, `vnp_BankTranNo`, `vnp_CardType`, `vnp_OrderInfo`, `vnp_PayDate`, `vnp_TmnCode`, `vnp_TransactionNo`) VALUES
(6, '10500000', 'NCB', 'VNP13890085', 'ATM', 'Thanh toan ve xem phim', '20221129154539', 'N87IMUTS', '13890085'),
(10, '15750000', 'NCB', 'VNP13890134', 'ATM', 'Thanh toan ve xem phim', '20221129160848', 'N87IMUTS', '13890134'),
(12, '26250000', 'NCB', 'VNP13890141', 'ATM', 'Thanh toan ve xem phim', '20221129161133', 'N87IMUTS', '13890141'),
(17, '15750000', 'NCB', 'VNP13890419', 'ATM', 'Thanh toan ve xem phim', '20221129201755', 'N87IMUTS', '13890419'),
(23, '15750000', 'NCB', 'VNP13890442', 'ATM', 'Thanh toan ve xem phim', '20221129212116', 'N87IMUTS', '13890442'),
(25, '21000000', 'NCB', 'VNP13891008', 'ATM', 'Thanh toan ve xem phim', '20221130144335', 'N87IMUTS', '13891008'),
(26, '15750000', 'NCB', 'VNP13892338', 'ATM', 'Thanh toan ve xem phim', '20221201163503', 'N87IMUTS', '13892338'),
(27, '15750000', 'NCB', 'VNP13894102', 'ATM', 'Thanh toan ve xem phim', '20221203213013', 'N87IMUTS', '13894102');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `acc_id`, `product_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_id`),
  ADD KEY `acc_of_role` (`role`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`idbill`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cmt_id`);

--
-- Chỉ mục cho bảng `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product-genre` (`genre_id`);

--
-- Chỉ mục cho bảng `role_of_account`
--
ALTER TABLE `role_of_account`
  ADD PRIMARY KEY (`role_id`);

--
-- Chỉ mục cho bảng `tbl_vnpay`
--
ALTER TABLE `tbl_vnpay`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `idbill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=426;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `role_of_account`
--
ALTER TABLE `role_of_account`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_vnpay`
--
ALTER TABLE `tbl_vnpay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `acc_of_role` FOREIGN KEY (`role`) REFERENCES `role_of_account` (`role_id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product-genre` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`genre_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
