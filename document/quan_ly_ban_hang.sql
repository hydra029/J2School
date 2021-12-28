-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 28, 2021 at 11:15 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `level`) VALUES
(1, 'admin', 'admin@gmail.com', 'qwer1234', 0),
(2, 'superadmin', 'superadmin@gmail.com', 'qwer1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `token` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `gender`, `dob`, `email`, `password`, `token`) VALUES
(1, 'Hydra', 'male', '2021-12-15', 'longthanh@gmail.com', 'Long1234', 'user_61c9999558b4b5.698596591640602005'),
(2, 'hydra', 'male', '2000-09-02', 'longthanh1@gmail.com', 'Long1234', 'user_61c99960006f46.425270491640601952'),
(3, 'My Mi', 'male', '2021-11-29', 'abc@abc.abc', 'Abcd1234', 'user_61caeef3c18182.522694611640689395');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` int NOT NULL,
  `image` varchar(200) NOT NULL,
  `manufacturer_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `manufacturer_id`) VALUES
(2, 'Cây lau nhà DMX CL005 ', 'Cây lau nhà có thân bằng inox cứng cáp, chiều dài 128 cm dễ sử dụng.\r\nTay cầm bọc nhựa chống trơn trượt, thân cây có khóa chắc chắn, có móc treo cất giữ.\r\nBông lau nhà bằng sợi cotton bền chắc, thấm hút tốt, giặt rửa dễ dàng.\r\nThương hiệu DMX - độc quyền Điện máy XANH, sản xuất tại Việt Nam.', 40000, 'images/1639849341.jpg', 8),
(3, 'Cây lau nhà xoay 360 ĐỘ SUNHOUSE KS-MO350I', 'Chất liệu cao cấp, an toàn cho sức khỏe\r\nCán bằng inox 201 có tay cầm bọc nhựa PP chắc chắn\r\nBộ phận tạo chuyển động bằng thép và nhựa POM siêu bền\r\nBông lau bằng sợi Microfiber thấm hút nước tốt', 459000, 'images/1639849505.jpg', 9),
(4, 'Nồi từ FISSLER PRO COLLECTION HIGH STOCK POT 28CM 14L', 'Nhập khẩu nguyên chiếc CHLB Đức - Made in Germany\r\nNồi từ Fissler làm từ vật liệu thép không gỉ chất lượng cao 18/10 dày, đặc, truyền nhiệt hiệu quả\r\nĐáy nồi Cookstar Allstove, nấu được trên mọi loại bếp, kể cả bếp từ, hạn chế cháy cục bộ, không cong vênh, lồi lõm\r\nLõi nhôm dày hoa lỏng ở 600ºC trước khi dập các lớp với nhau bởi một lực 1500 tấn\r\nĐường kính nồi 28cm\r\nTổng dung tích 14L\r\nTrọng lượng nồi 4.97Kg\r\nChiều cao nồi 24cm\r\nThước đo mực nước đến 12.5L\r\nVung inox thiết kế lõm lòng chảo giúp đối lưu hơi nước, chịu được 220ºC\r\nTay cầm cách nhiệt, thiết kế thẩm mỹ dạng đũa, cầm nắm thoải mái, chịu lực 150Kg\r\nMiệng rót chống tràn hiệu quả, cực khít với vung\r\nHiệu quả đun nấu nhanh, bảo toàn dinh dưỡng\r\nNồi nấu được trong lò nướng và vệ sinh an toàn với máy rửa bát.', 11500000, 'images/1639849625.jpg', 3),
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
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` int NOT NULL,
  `customer_id` int NOT NULL,
  `order_time` varchar(30) DEFAULT NULL,
  `receiver_name` varchar(50) DEFAULT NULL,
  `receiver_phone` varchar(20) DEFAULT NULL,
  `receiver_address` text,
  `note` text,
  `status` int NOT NULL,
  `total_price` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `customer_id`, `order_time`, `receiver_name`, `receiver_phone`, `receiver_address`, `note`, `status`, `total_price`) VALUES
(47, 1, '28-12-2021 04:28:34', '1', '1', '1', '1							\r\n						', 2, NULL),
(48, 1, '28-12-2021 04:32:47', '2', '2', '2', '2							\r\n						', 2, NULL),
(49, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(50, 3, '28-12-2021 05:59:37', 'Mi Mi', '0123456789', 'cacsa', '							\r\n	csacsa					', 2, NULL),
(51, 3, NULL, NULL, NULL, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `receipt_detail`
--

CREATE TABLE `receipt_detail` (
  `receipt_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `receipt_detail`
--

INSERT INTO `receipt_detail` (`receipt_id`, `product_id`, `quantity`) VALUES
(47, 3, 4),
(48, 2, 1),
(49, 2, 2),
(49, 3, 1),
(50, 2, 3),
(50, 3, 2),
(51, 3, 1),
(51, 8, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`);

--
-- Constraints for table `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `receipts_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `receipt_detail`
--
ALTER TABLE `receipt_detail`
  ADD CONSTRAINT `receipt_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
