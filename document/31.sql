-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 10, 2022 at 11:40 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `31`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int NOT NULL,
  `activity` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `activity`, `time`) VALUES
(1, 'superadmin đã thêm nhà sản xuất Test nha san xuat', '2022-01-29 18:27:48'),
(2, 'superadmin đã cập nhật sản phẩm Cây lau nhà DMX CL00555', '2022-01-30 19:12:00'),
(3, 'superadmin đã cập nhật trạng thái của đơn hàng số 14 thành trạng thái đang giao', '2022-01-31 05:45:49'),
(4, 'superadmin đã cập nhật trạng thái của đơn hàng số 14 thành trạng thái đã giao', '2022-01-31 05:46:09'),
(5, 'superadmin đã cập nhật nhà sản xuất Fisslerrrrrrr', '2022-01-31 05:47:44'),
(6, 'superadmin đã cập nhật nhà sản xuất Fisslerrrrr', '2022-01-31 05:47:48'),
(7, 'superadmin đã cập nhật nhà sản xuất Fisslerrrr', '2022-01-31 05:47:50'),
(8, 'superadmin đã cập nhật nhà sản xuất Fisslerrr', '2022-01-31 05:47:53'),
(9, 'superadmin đã cập nhật nhà sản xuất Fisslerr', '2022-01-31 05:47:55'),
(10, 'superadmin đã cập nhật nhà sản xuất Fissler', '2022-01-31 05:47:59'),
(11, 'superadmin đã cập nhật nhà sản xuất Fisslerrr', '2022-01-31 05:48:01'),
(12, 'superadmin đã cập nhật nhà sản xuất Fisslerr', '2022-01-31 05:48:05'),
(13, 'superadmin đã cập nhật nhà sản xuất Fisslerrrrrr', '2022-01-31 05:48:09'),
(14, 'superadmin đã cập nhật nhà sản xuất Fisslerrrr', '2022-01-31 05:48:17'),
(15, 'superadmin đã cập nhật nhà sản xuất Fisslerrrrrr', '2022-01-31 05:48:26'),
(16, 'superadmin đã thêm sản phẩm cacsa', '2022-02-05 06:34:42'),
(17, 'superadmin đã cập nhật trạng thái của đơn hàng số 15 thành trạng thái đang giao', '2022-02-05 06:36:27'),
(18, 'superadmin đã cập nhật trạng thái của đơn hàng số 15 thành trạng thái đã giao', '2022-02-08 04:59:59'),
(19, 'superadmin đã cập nhật trạng thái của đơn hàng số 20 thành trạng thái đang giao', '2022-02-08 05:00:01'),
(20, 'superadmin đã cập nhật trạng thái của đơn hàng số 14 thành trạng thái đang giao', '2022-02-08 05:20:58'),
(21, 'superadmin đã cập nhật trạng thái của đơn hàng số 14 thành trạng thái đã giao', '2022-02-08 05:21:00'),
(22, 'superadmin đã cập nhật trạng thái của đơn hàng số 21 thành trạng thái đang giao', '2022-02-08 05:21:03'),
(23, 'superadmin đã cập nhật trạng thái của đơn hàng số 15 thành trạng thái đang giao', '2022-02-08 05:21:04'),
(24, 'superadmin đã cập nhật trạng thái của đơn hàng số 15 thành trạng thái đã giao', '2022-02-08 05:21:05'),
(25, 'superadmin đã cập nhật trạng thái của đơn hàng số 16 thành trạng thái đang giao', '2022-02-08 05:21:08'),
(26, 'superadmin đã cập nhật trạng thái của đơn hàng số 16 thành trạng thái đã giao', '2022-02-08 05:21:09'),
(27, 'superadmin đã hủy đơn hàng số 17', '2022-02-08 05:21:46'),
(28, 'superadmin đã cập nhật nhà sản xuất Fissler', '2022-02-08 05:33:38'),
(29, 'superadmin đã xóa nhà sản xuất Test nha san xuat', '2022-02-08 05:33:44'),
(30, 'superadmin đã cập nhật sản phẩm Cây lau nhà DMX CL005515', '2022-02-08 05:33:58'),
(31, 'superadmin đã xóa sản phẩm cacsa', '2022-02-08 05:34:04'),
(32, 'superadmin đã thêm sản phẩm cascascsacasc', '2022-02-08 05:34:42'),
(33, 'superadmin đã thêm sản phẩm san pham moi oke', '2022-02-08 05:36:43'),
(34, 'superadmin đã thêm sản phẩm san pham moi nhat nek', '2022-02-08 05:39:09'),
(35, 'superadmin đã thêm sản phẩm them san pham', '2022-02-08 05:42:41'),
(36, 'superadmin đã thêm sản phẩm them san pham', '2022-02-08 05:43:15'),
(37, 'superadmin đã thêm sản phẩm them san pham', '2022-02-08 05:43:26'),
(38, 'superadmin đã thêm sản phẩm them san pham', '2022-02-08 05:44:39'),
(39, 'superadmin đã thêm sản phẩm them san pham', '2022-02-08 05:44:59'),
(40, 'superadmin đã thêm sản phẩm them san pham', '2022-02-08 05:45:43'),
(41, 'superadmin đã thêm sản phẩm them san pham', '2022-02-08 05:46:19'),
(42, 'superadmin đã cập nhật trạng thái của đơn hàng số 19 thành trạng thái đang giao', '2022-02-08 05:51:21'),
(43, 'superadmin đã cập nhật trạng thái của đơn hàng số 19 thành trạng thái đã giao', '2022-02-09 15:33:52'),
(44, 'superadmin đã cập nhật trạng thái của đơn hàng số 20 thành trạng thái đã giao', '2022-02-09 15:33:58'),
(45, 'superadmin đã cập nhật trạng thái của đơn hàng số 14 thành trạng thái đang giao', '2022-02-09 15:34:26'),
(46, 'superadmin đã cập nhật trạng thái của đơn hàng số 20 thành trạng thái đang giao', '2022-02-09 15:35:18'),
(47, 'superadmin đã cập nhật trạng thái của đơn hàng số 20 thành trạng thái đã giao', '2022-02-09 15:35:19'),
(48, 'superadmin đã cập nhật trạng thái của đơn hàng số 14 thành trạng thái đã giao', '2022-02-09 15:35:21'),
(49, 'superadmin đã cập nhật trạng thái của đơn hàng số 19 thành trạng thái đang giao', '2022-02-09 15:35:23'),
(50, 'superadmin đã cập nhật trạng thái của đơn hàng số 19 thành trạng thái đã giao', '2022-02-09 15:35:24'),
(51, 'superadmin đã cập nhật trạng thái của đơn hàng số 21 thành trạng thái đang giao', '2022-02-09 15:36:42'),
(52, 'superadmin đã cập nhật trạng thái của đơn hàng số 21 thành trạng thái đã giao', '2022-02-09 15:36:44'),
(53, 'superadmin đã cập nhật trạng thái của đơn hàng số 14 thành trạng thái đang giao', '2022-02-09 15:37:19'),
(54, 'superadmin đã cập nhật trạng thái của đơn hàng số 20 thành trạng thái đang giao', '2022-02-09 15:37:20'),
(55, 'superadmin đã cập nhật trạng thái của đơn hàng số 14 thành trạng thái đã giao', '2022-02-09 15:37:21'),
(56, 'superadmin đã cập nhật trạng thái của đơn hàng số 19 thành trạng thái đang giao', '2022-02-09 15:37:22'),
(57, 'superadmin đã cập nhật trạng thái của đơn hàng số 19 thành trạng thái đã giao', '2022-02-09 15:37:23'),
(58, 'superadmin đã cập nhật trạng thái của đơn hàng số 20 thành trạng thái đã giao', '2022-02-09 15:37:24'),
(59, 'superadmin đã cập nhật trạng thái của đơn hàng số 21 thành trạng thái đang giao', '2022-02-09 15:37:25'),
(60, 'superadmin đã cập nhật trạng thái của đơn hàng số 21 thành trạng thái đã giao', '2022-02-09 15:37:26'),
(61, 'superadmin đã cập nhật trạng thái của đơn hàng số 14 thành trạng thái đang giao', '2022-02-09 15:38:10'),
(62, 'superadmin đã cập nhật trạng thái của đơn hàng số 19 thành trạng thái đang giao', '2022-02-09 15:38:11'),
(63, 'superadmin đã cập nhật trạng thái của đơn hàng số 14 thành trạng thái đã giao', '2022-02-09 15:38:12'),
(64, 'superadmin đã cập nhật trạng thái của đơn hàng số 19 thành trạng thái đã giao', '2022-02-09 15:38:13'),
(65, 'superadmin đã cập nhật trạng thái của đơn hàng số 20 thành trạng thái đang giao', '2022-02-09 15:38:14'),
(66, 'superadmin đã hủy đơn hàng số 21', '2022-02-09 15:38:15'),
(67, 'superadmin đã hủy đơn hàng số 20', '2022-02-09 15:38:37'),
(68, 'superadmin đã hủy đơn hàng số 14', '2022-02-09 15:39:12'),
(69, 'superadmin đã cập nhật trạng thái của đơn hàng số 19 thành trạng thái đang giao', '2022-02-09 15:39:27'),
(70, 'superadmin đã cập nhật trạng thái của đơn hàng số 19 thành trạng thái đã giao', '2022-02-09 15:39:28'),
(71, 'superadmin đã hủy đơn hàng số 20', '2022-02-09 15:40:45'),
(72, 'superadmin đã hủy đơn hàng số 20', '2022-02-09 15:41:03'),
(73, 'superadmin đã hủy đơn hàng số 21', '2022-02-09 15:41:41'),
(74, 'superadmin đã cập nhật trạng thái của đơn hàng số 14 thành trạng thái đang giao', '2022-02-09 15:42:00'),
(75, 'superadmin đã cập nhật trạng thái của đơn hàng số 14 thành trạng thái đã giao', '2022-02-09 15:42:01'),
(76, 'superadmin đã hủy đơn hàng số 19', '2022-02-09 15:42:02'),
(77, 'superadmin đã cập nhật trạng thái của đơn hàng số 21 thành trạng thái đang giao', '2022-02-09 15:43:06'),
(78, 'superadmin đã cập nhật trạng thái của đơn hàng số 21 thành trạng thái đã giao', '2022-02-09 15:43:07'),
(79, 'superadmin đã xóa sản phẩm Nồi từ FISSLER PRO COLLECTION HIGH STOCK POT 28CM 14L', '2022-02-10 10:03:23'),
(80, 'superadmin đã xóa sản phẩm Nồi từ FISSLER PRO COLLECTION HIGH STOCK POT 28CM 14L', '2022-02-10 10:04:14'),
(81, 'superadmin đã cập nhật sản phẩm Nồi từ FISSLER PROOO COLLECTION HIGH STOCK POT 28CM 14L', '2022-02-10 10:04:49'),
(82, 'superadmin đã xóa sản phẩm Nồi từ FISSLER PROOO COLLECTION HIGH STOCK POT 28CM 14L', '2022-02-10 10:04:51'),
(83, 'superadmin đã xóa sản phẩm Nồi từ FISSLER PROOO COLLECTION HIGH STOCK POT 28CM 14L', '2022-02-10 10:06:00'),
(84, 'superadmin đã xóa sản phẩm Nồi từ FISSLER PROOO COLLECTION HIGH STOCK POT 28CM 14L', '2022-02-10 10:06:01'),
(85, 'superadmin đã xóa sản phẩm Bộ nồi chảo Silit Pisa 10 Món', '2022-02-10 10:11:30'),
(86, 'superadmin đã xóa sản phẩm Bộ nồi chảo Silit Pisa 10 Món', '2022-02-10 10:11:31'),
(87, 'superadmin đã xóa sản phẩm Bộ nồi chảo Silit Pisa 10 Món', '2022-02-10 10:11:33'),
(88, 'superadmin đã cập nhật nhà sản xuất Fissler', '2022-02-10 11:31:50');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `password` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `level`) VALUES
(1, 'admin', 'admin@gmail.com', 'qwer1234', 0),
(2, 'superadmin', 'superadmin@gmail.com', 'qwer1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `gender`, `dob`, `email`, `password`, `token`) VALUES
(1, 'Hydra', 'male', '2021-12-15', 'longthanh@gmail.com', 'Long1234', ''),
(2, 'hydra', 'male', '2000-09-02', 'longthanh1@gmail.com', 'Long1234', ''),
(3, 'My Mi', 'male', '2021-11-29', 'abc@abc.abc', 'Abcd1234', 'user_61cbc3291fd306.214497391640743721'),
(4, 'My My', 'male', '2022-01-19', 'admin123@gmail.com', 'Admin123', 'user_61d014557d9238.626900311641026645'),
(5, 'Ma Ma', 'male', '2018-06-08', 'njknjkn@gmail.com', '$Gl123456789', ''),
(10, 'Tài Khoản Mới', 'male', '2022-01-31', 'taikhoanmoi@gmail.com', '$Glnjkjnjk@', '');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `address`, `phone`, `image`) VALUES
(3, 'Fissler', 'Đức', '0984654789', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/49/Fissler_Logo.svg/2560px-Fissler_Logo.svg.png'),
(4, 'Silit', 'Đức', '0987654321', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Silit-logo.svg/2560px-Silit-logo.svg.png'),
(6, 'Minh Châu', 'Việt Nam', '0147258369', 'https://suminhchau.vn/wp-content/uploads/2019/11/su-minh-chau-fav-400x400.png'),
(7, 'Bodoca', 'Việt Nam', '0369258147', 'https://thietbimiennam.com/wp-content/uploads/2016/10/logo-bodoca.png'),
(8, 'Điện máy xanh', 'Việt Nam', '095184762', 'https://prices.vn/photos/7/store/ma-giam-gia-dienmayxanh.png'),
(9, 'SunHouse', 'Việt Nam', '0159236478', 'https://upload.wikimedia.org/wikipedia/vi/e/ed/Logo_cong_ty_sunhouse.png'),
(10, 'csacsacsac', 'sacsa', '0132456789894', 'asc'),
(11, 'cascasc', 'cascsa', 'csacsa', 'csa'),
(12, 'test', 'cas56c1as6c51sa6c5a1s', '0984564987', 'https://upload.wikimedia.org/wikipedia/commons/4/43/Latin_letter_A_with_acute.svg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `manufacturer_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `manufacturer_id`) VALUES
(2, 'Cây lau nhà DMX CL005515', 'Cây lau nhà có thân bằng inox cứng cáp, chiều dài 128 cm dễ sử dụng.\r\nTay cầm bọc nhựa chống trơn trượt, thân cây có khóa chắc chắn, có móc treo cất giữ.\r\nBông lau nhà bằng sợi cotton bền chắc, thấm hút tốt, giặt rửa dễ dàng.\r\nThương hiệu DMX - độc quyền Điện máy XANH, sản xuất tại Việt Nam.', 40000, 'images/1639849341.jpg', 8),
(4, 'Nồi từ FISSLER PROOO COLLECTION HIGH STOCK POT 28CM 14L', 'Nhập khẩu nguyên chiếc CHLB Đức - Made in Germany\r\nNồi từ Fissler làm từ vật liệu thép không gỉ chất lượng cao 18/10 dày, đặc, truyền nhiệt hiệu quả\r\nĐáy nồi Cookstar Allstove, nấu được trên mọi loại bếp, kể cả bếp từ, hạn chế cháy cục bộ, không cong vênh, lồi lõm\r\nLõi nhôm dày hoa lỏng ở 600ºC trước khi dập các lớp với nhau bởi một lực 1500 tấn\r\nĐường kính nồi 28cm\r\nTổng dung tích 14L\r\nTrọng lượng nồi 4.97Kg\r\nChiều cao nồi 24cm\r\nThước đo mực nước đến 12.5L\r\nVung inox thiết kế lõm lòng chảo giúp đối lưu hơi nước, chịu được 220ºC\r\nTay cầm cách nhiệt, thiết kế thẩm mỹ dạng đũa, cầm nắm thoải mái, chịu lực 150Kg\r\nMiệng rót chống tràn hiệu quả, cực khít với vung\r\nHiệu quả đun nấu nhanh, bảo toàn dinh dưỡng\r\nNồi nấu được trong lò nướng và vệ sinh an toàn với máy rửa bát.', 11500000, 'images/1639849625.jpg', 3),
(5, 'Bộ nồi chảo Silit Pisa 10 Món', 'Nắp vung kính cường lực bền đẹp thuận tiện quan sát đồ ăn\r\nPhù hợp với mọi loại: bếp từ, bếp hồng ngoại…\r\nTỏa nhiệt đều, giữ nhiệt lâu\r\nAn toàn cho sức khỏe\r\nĐáy 3 lớp bắt từ nhanh giúp tiết kiệm điện\r\nXuất xứ: Nhập khẩu từ Đức', 6540000, 'images/1639849720.1000x1000', 4),
(6, 'Cây lau nhà COTONG 90CM SIÊU SẠCH BODOCA', 'Xuất xứ: hàng Việt Nam\r\n\r\nBao gồm: cán, khung và giẻ\r\n\r\n– Chất liệu:\r\n\r\n+ Cán bằng inox, đầu kẹp inox\r\n\r\n+ Khung giẻ nhựa tối\r\n\r\n+ Giẻ bằng sợi Sợi Microfiber mềm, sợi cattong\r\n\r\n– Kích thước:\r\n\r\n+Cán: dài 1,5m\r\n\r\n+ Giẻ : (L)900mm x (H) 150 mm', 250000, 'images/1639849881.jpg', 7),
(7, 'Nồi cơm điện Sunhouse 1.8L SHD8602', 'Thân nồi làm bằng tôn phủ nhũ in hoa chống gỉ bền bỉ \r\nLòng nồi đúc từ hợp kim nhôm phủ lớp chống dính Whitford\r\nMâm nhiệt lớn cùng công suất 700W giúp nhiệt tỏa đều\r\nDung tích 1.8L, phù hợp với gia đình 4 – 6 thành viên\r\n2 chế độ Nấu (cook) và Hâm nóng (warm) dễ dàng sử dụng\r\nThiết kế nhỏ gọn, không chiếm nhiều diện tích', 399000, 'images/1639922713.jpg', 9),
(8, 'Nồi cơm điện KALITE KL-618 đa chức năng', '2 chức năng nấu và giữ ẩm\r\nChất liệu nắp và đáy nhựa ABS\r\nThân vỏ chất liệu hợp kim cao cấp\r\nChất liệu mâm nhiệt cong bền bỉ\r\nLòng niêu truyền nhiệt nhanh, giữ nhiệt đều\r\nĐai ủ trong 8h\r\nQuai sách thường, nắp phụ\r\nNút bấm cơ kiểu dáng mới\r\nDung tích 1.8L', 800000, 'images/1639990119.jpg', 9),
(9, 'Nồi cơm điện 1.8L E2RC1-320W', 'Lòng nồi bằng hợp kim nhôm tráng men chống dính, dễ vệ sinh\r\nXửng hấp đi kèm tiện dụng', 569000, 'images/1639990163.jpg', 8),
(10, 'Bơm Thông hút bồn cầu', 'Sản phẩm là 1 cái bơm\r\nDùng để Thông tắc bồn cầu\r\nKhi bồn cầu bị tắc bạn cần đổ 1 gói Thông cống vào để khoảng 1-2 tiếng xả nước rồi cho bơm vào bơm\r\nĐảm bảo hết tắc\r\nNếu vẫn tắc bạn cần đổ 2 chai CoCa cô la vào để qua đêm, rồi dùng bơm hút sẽ hết tắc', 80000, 'images/1639990223.jpg', 8),
(11, 'Máy hút bụi không túi FC9351/01', 'Máy hút bụi không túi Philips Dòng 3000 với kích cỡ nhỏ gọn, sử dụng công nghệ PowerCyclone 5 và đầu hút MultiClean cho hiệu suất hút cao giúp bạn vệ sinh sạch sẽ mọi ngóc ngách bên trong nhà', 3499000, 'images/1639990283.jpg', 8),
(12, 'Tủ 2 Cửa 1 Ngăn Kéo Modulo Home KAI1334-2', 'Tủ 2 Cửa 1 Ngăn Kéo Modulo Home KAI1334-2 được làm hoàn toàn bằng chất liệu gỗ công nghiệp cao cấp phủ giấy PU vân gỗ, không cong vênh, không co ngót, có độ bền cao và rất thân thiện với môi trường. Qua quá trình xử lý, bề mặt tủ có độ bóng đẹp và nhẵn mịn, các góc cạnh được gia công kỹ lưỡng để không gây trầy xước cho người dùng trong suốt quá trình sử dụng.\r\nTủ được thiết kế với 3 ngăn (trong đó có 01 ngăn kéo phía trên, 2 ngăn dưới kèm cửa đóng) tiện lợi để bạn có thể phân loại và sắp xếp đồ đạc phù hợp với nhiều mục đích sử dụng khác nhau. Bạn có thể sử dụng các ngăn tủ để cất giữ những bộ quần áo, lưu trữ sách, các loại băng đĩa hay đồ lưu niệm một cách gọn gàng và trang nhã. Mỗi ngăn kéo, cửa tủ đều có một tay cầm nhỏ gọn và chắc chắn, đóng mở rất chắc chắn và dễ dàng.\r\nTủ Modulo Home Kai - 1334-2 có màu nâu tự nhiên của gỗ mang đến vẻ đẹp sang trọng. Bạn có thể kết hợp tủ với bàn, ghế hay kệ cùng tông màu để không gian nội thất trong nhà thêm sang trọng, hiện đại.\r\nSản phẩm được giao hàng tháo rời, đóng gói trong thùng carton. Khách hàng lắp ráp sản phẩm tại nhà theo hướng dẫn lắp ráp kèm theo bao bì. Dịch vụ lắp ráp tại nhà có thu phí khu vực Tp. HCM, điện thoại 028 2223 7788', 1250000, 'images/1639990377.jpg', 7),
(13, 'Đèn ngủ LED di động TaoTronics TT-DL23, pin 4000mAh, 110 giờ sử dụng, ánh sáng 360 độ', 'Đèn ngủ di động cao cấp ánh sáng 360 độ.\r\nThiết kế không dây an toàn và di động: Đèn sử dụng bộ điều khiển tích hợp sẵn để có thêm tính di động ở nhà, trong văn phòng và ngay cả khi không có ổ cắm điện xung quanh, như cắm trại và dã ngoại ngoài trời.\r\nPin 110 giờ: Được hưởng lợi từ pin sạc có thể sạc lại với dung lượng lên tới 4000mAh sẽ vượt xa nhu cầu và mong đợi của bạn - lên tới 110 giờ với ánh sáng luôn ở độ sáng tối thiểu.\r\nÁnh sáng 360 ° thân thiện với mắt: Đừng lo lắng về việc đánh thức người đang ngủ bên cạnh bạn (bao gồm cả em bé của bạn) Với bảng điều khiển 360 ° cung cấp tia sáng đồng đều và tinh tế hơn.\r\nĐiều chỉnh độ sáng: Đặt ngón tay của bạn trên bảng điều khiển cảm ứng và tùy chỉnh độ sáng. Tận hưởng nhiều lựa chọn hơn mà không cần phải cài đặt trước.\r\nĐiều khiển một chạm: Dễ dàng bật / tắt đèn bằng cách nhấn một lần bảng điều khiển cảm ứng được đặt ở phía trên cùng của đèn.\r\nSản phẩm chính hãng thương hiệu TaoTronics (Mỹ) bảo hành 12 tháng toàn quốc.', 390000, 'images/1639991046.jpg', 8);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `product_id` int NOT NULL,
  `type_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`product_id`, `type_id`) VALUES
(2, 33),
(6, 33),
(2, 34),
(10, 34),
(4, 35),
(5, 35),
(7, 35),
(8, 35),
(9, 35),
(2, 36),
(6, 36),
(10, 36),
(11, 36),
(12, 37),
(13, 37);

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` int NOT NULL,
  `customer_id` int NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `receiver_id` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `note` mediumtext COLLATE utf8mb4_general_ci,
  `status` int NOT NULL,
  `total` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `customer_id`, `order_time`, `receiver_id`, `note`, `status`, `total`) VALUES
(14, 1, '2022-01-03 14:01:12', '1', NULL, 5, 100000),
(15, 2, '2022-01-11 14:02:19', '1', NULL, 2, 2000),
(16, 2, '2022-01-04 14:02:19', '2', NULL, 2, 900000),
(17, 3, '2022-01-05 14:02:19', '3', NULL, 2, 500000),
(18, 4, '2022-01-10 14:02:19', '1', NULL, 2, 330000),
(19, 1, '2022-01-11 15:28:03', '2', '							', 3, 11580000),
(20, 1, '2022-01-11 15:28:24', '2', '							', 2, 6540000),
(21, 1, '2022-01-30 08:25:46', '1', NULL, 5, 18330000),
(22, 10, '2022-02-10 08:58:34', '', '								', 2, 11540000),
(23, 10, '2022-02-10 08:59:43', '', '								', 2, 6540000);

-- --------------------------------------------------------

--
-- Table structure for table `receipt_detail`
--

CREATE TABLE `receipt_detail` (
  `receipt_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receipt_detail`
--

INSERT INTO `receipt_detail` (`receipt_id`, `product_id`, `quantity`) VALUES
(19, 2, 2),
(19, 4, 1),
(20, 5, 1),
(21, 2, 1),
(21, 4, 1),
(21, 5, 1),
(21, 6, 1),
(22, 2, 3),
(22, 4, 6),
(23, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `receivers`
--

CREATE TABLE `receivers` (
  `customer_id` int NOT NULL,
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receivers`
--

INSERT INTO `receivers` (`customer_id`, `id`, `name`, `phone`, `address`, `status`) VALUES
(1, 1, 'Mi Mi', '0951847632', 'Le Loi', 0),
(1, 2, 'Hang Nga', '0369852147', 'Nguyen Trai', 1),
(3, 1, '1', '1', '1', 0),
(3, 2, '2', '2', '2', 0),
(4, 1, 'Bui Huu Loc', '0987614523', 'Le Loi', 0),
(4, 2, 'Nguyen Nguyen', '0369258147', 'Nguyen Trai', 0);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(33, 'Cây lau nhà'),
(34, 'Dụng cụ WC'),
(35, 'Nồi'),
(37, 'Trang trí'),
(36, 'Vệ sinh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manufacturer_id` (`manufacturer_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`product_id`,`type_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `receipt_detail`
--
ALTER TABLE `receipt_detail`
  ADD PRIMARY KEY (`receipt_id`,`product_id`),
  ADD KEY `receipt_detail_ibfk_1` (`product_id`);

--
-- Indexes for table `receivers`
--
ALTER TABLE `receivers`
  ADD PRIMARY KEY (`customer_id`,`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`);

--
-- Constraints for table `product_type`
--
ALTER TABLE `product_type`
  ADD CONSTRAINT `product_type_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_type_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `receipts_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `receipt_detail`
--
ALTER TABLE `receipt_detail`
  ADD CONSTRAINT `receipt_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `receipt_detail_ibfk_2` FOREIGN KEY (`receipt_id`) REFERENCES `receipts` (`id`);

--
-- Constraints for table `receivers`
--
ALTER TABLE `receivers`
  ADD CONSTRAINT `receivers_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
