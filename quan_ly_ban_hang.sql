-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2021 at 05:52 PM
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
-- Database: `quan_ly_ban_hang`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int NOT NULL,
  `quantity` int NOT NULL,
  `customer_id` int NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `address`, `phone`, `image`) VALUES
(3, 'Fissler', 'Đức', '0123456789', 'https://lh3.googleusercontent.com/proxy/o7ojTkGBn2LbPieb7TRVw6wHlnpHYCpXuABugZgbZBxMTX6XCwc3VRPoQkdEJ9UkiIlc6w1R79gJCelYZGPjGoydR42T-Nx35lsYCwMlYLlGnrMQ'),
(4, 'Silit', 'Đức', '0987654321', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Silit-logo.svg/2560px-Silit-logo.svg.png'),
(6, 'Minh Châu', 'Việt Nam', '0147258369', 'https://suminhchau.vn/wp-content/uploads/2019/11/su-minh-chau-fav-400x400.png'),
(7, 'Bodoca', 'Việt Nam', '0369258147', 'https://thietbimiennam.com/wp-content/uploads/2016/10/logo-bodoca.png'),
(8, 'Điện máy xanh', 'Việt Nam', '095184762', 'https://prices.vn/photos/7/store/ma-giam-gia-dienmayxanh.png'),
(9, 'SunHouse', 'Việt Nam', '0159236478', 'https://upload.wikimedia.org/wikipedia/vi/e/ed/Logo_cong_ty_sunhouse.png');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `manufacturer_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `manufacturer_id`) VALUES
(2, 'Cây lau nhà DMX CL005 ', 'Cây lau nhà có thân bằng inox cứng cáp, chiều dài 128 cm dễ sử dụng.\r\nTay cầm bọc nhựa chống trơn trượt, thân cây có khóa chắc chắn, có móc treo cất giữ.\r\nBông lau nhà bằng sợi cotton bền chắc, thấm hút tốt, giặt rửa dễ dàng.\r\nThương hiệu DMX - độc quyền Điện máy XANH, sản xuất tại Việt Nam.', 40000, 'images/1639849341.jpg', 8),
(3, 'CÂY LAU NHÀ XOAY 360 ĐỘ SUNHOUSE KS-MO350I', 'Chất liệu cao cấp, an toàn cho sức khỏe\r\nCán bằng inox 201 có tay cầm bọc nhựa PP chắc chắn\r\nBộ phận tạo chuyển động bằng thép và nhựa POM siêu bền\r\nBông lau bằng sợi Microfiber thấm hút nước tốt', 459000, 'images/1639849505.jpg', 9),
(4, 'NỒI TỪ FISSLER PRO COLLECTION HIGH STOCK POT 28CM 14L', 'Nhập khẩu nguyên chiếc CHLB Đức - Made in Germany\r\nNồi từ Fissler làm từ vật liệu thép không gỉ chất lượng cao 18/10 dày, đặc, truyền nhiệt hiệu quả\r\nĐáy nồi Cookstar Allstove, nấu được trên mọi loại bếp, kể cả bếp từ, hạn chế cháy cục bộ, không cong vênh, lồi lõm\r\nLõi nhôm dày hoa lỏng ở 600ºC trước khi dập các lớp với nhau bởi một lực 1500 tấn\r\nĐường kính nồi 28cm\r\nTổng dung tích 14L\r\nTrọng lượng nồi 4.97Kg\r\nChiều cao nồi 24cm\r\nThước đo mực nước đến 12.5L\r\nVung inox thiết kế lõm lòng chảo giúp đối lưu hơi nước, chịu được 220ºC\r\nTay cầm cách nhiệt, thiết kế thẩm mỹ dạng đũa, cầm nắm thoải mái, chịu lực 150Kg\r\nMiệng rót chống tràn hiệu quả, cực khít với vung\r\nHiệu quả đun nấu nhanh, bảo toàn dinh dưỡng\r\nNồi nấu được trong lò nướng và vệ sinh an toàn với máy rửa bát.', 11500000, 'images/1639849625.jpg', 3),
(5, 'Bộ Nồi Chảo Silit Pisa 10 Món', 'Nắp vung kính cường lực bền đẹp thuận tiện quan sát đồ ăn\r\nPhù hợp với mọi loại: bếp từ, bếp hồng ngoại…\r\nTỏa nhiệt đều, giữ nhiệt lâu\r\nAn toàn cho sức khỏe\r\nĐáy 3 lớp bắt từ nhanh giúp tiết kiệm điện\r\nXuất xứ: Nhập khẩu từ Đức', 6540000, 'images/1639849720.1000x1000', 4),
(6, 'CÂY LAU NHÀ COTONG 90CM SIÊU SẠCH BODOCA', 'Xuất xứ: hàng Việt Nam\r\n\r\nBao gồm: cán, khung và giẻ\r\n\r\n– Chất liệu:\r\n\r\n+ Cán bằng inox, đầu kẹp inox\r\n\r\n+ Khung giẻ nhựa tối\r\n\r\n+ Giẻ bằng sợi Sợi Microfiber mềm, sợi cattong\r\n\r\n– Kích thước:\r\n\r\n+Cán: dài 1,5m\r\n\r\n+ Giẻ : (L)900mm x (H) 150 mm', 250000, 'images/1639849881.jpg', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
