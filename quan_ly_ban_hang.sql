-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 20, 2021 at 08:20 AM
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
  `customer_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`customer_id`, `product_id`, `quantity`) VALUES
(1, 3, 2);

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
(1, 'Hydra', 'male', '2021-12-15', 'longthanh@gmail.com', 'Long1234', ''),
(2, 'hydra', 'male', '2000-09-02', 'longthanh1@gmail.com', 'Long1234', 'user_61c02f2f3092f9.427462291639984943');

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
(3, 'Fissler', 'Đức', '0123456789', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQll5u9beyD74VkcNb7WvooUelep7IfViC74yXOlxc6CLwhdyA8lcy_ygrfwgd9Eyl-QdE&usqp=CAU'),
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
(8, 'Nồi cơm điện 1.8L E2RC1-320W', 'Lòng nồi bằng hợp kim nhôm tráng men chống dính, dễ vệ sinh\r\nXửng hấp đi kèm tiện dụng', 569000, 'images/1639987805.png', 3),
(9, 'Nồi Cơm Điện COMET CM8036', 'Loại Sản Phẩm	Nồi Cơm Điện - Nắp Rời\r\nModel	CM8036\r\nDung tích thực	1.8 Lít\r\nChức năng giữ ấm	Có\r\nChế độ nấu	Nấu / Hâm\r\nChống dính	Không\r\nPhím điều khiển	Nút nhấn cơ\r\nĐèn báo	Có\r\nLoại nắp	Nắp Rời\r\nDây điện	Tháo rời được.\r\nPhụ kiện	Muỗng xới cơm', 349000, 'images/1639987893.png', 9),
(10, 'hổi bông cỏ quét nhà', 'Bông cỏ dầy , bền , đẹp và không rụng bông .\r\n\r\nSản phẩm làm thủ công bởi những người thợ làng nghề Bình Định nên chất lượng luôn đảm bảo .\r\n\r\nBông cỏ đã qua xử lý tiêu chuẩn xuất khẩu , rất dày , chắc nên tuổi thọ chuổi rất lâu (> 6 tháng ) thay vì < 1 tháng như chổi thông thường . \r\n\r\nCán chổi chắc chắn , tổng cân chổi tới 500g \r\n\r\nVới tất cả ưu điểm trên bạn có thể dễ dàng quét sạch nhà cửa với cây chổi truyền thống không thể thiếu trong gia đình .\r\n\r\nChổi bông cỏ cuốn kẽm Chổi bông cỏ cuốn kẽm (hay còn gọi là chổi đót, chổi quét nhà, chổi bông sậy, chổi chít) thuộc dòng chổi cuốn dây kẽm, đầu lót dây nilon màu để làm tay cầm và tạo thẩm mỹ.\r\n\r\nChổi bông cỏ cuốn kẽm được làm bằng loại đót dài, tức là đót còn nguyên thân để tạo thành cán. \r\n\r\nLưỡi chổi được bện vòng trong bằng dây kẽm và vòng ngoài bằng dây điện chuyên dụng .', 40000, 'images/1639987957.png', 8),
(11, 'Cây chổi cước chà sàn chắn chắn cán chôi siêu khoẻ', 'Chổi cước chà sàn chất lượng cao là sản phẩm chuyên dụng để chà sạch các vết bẩn lâu ngày, cứng đầu. Chà sạch cho mọi loại sàn nhà, nhà vệ sinh, sàn nhà hàng, khách sạn, toà nhà, khu công nghiệp, sân gạch, sân đá,… sử dụng dễ dàng, thao tác nhanh gọn, khả năng làm sạch mạnh mẽ.\r\n\r\nĐặc điểm nổi bật của sản phẩm\r\nPhần thân chổi có chiều dài 120 cm được làm bằng inox chống rỉ sét, không bị hoen ố khi tiếp xúc với nước và ẩm độ. Thiết kế thân chổi vừa tay, cho cảm giác cứng cáp, bền bỉ với thời gian.\r\n\r\nPhần đầu chổi là những sợi cước được bện dày giúp cọ sạch bề mặt bám bẩn cứng đầu nhanh chóng mà không cần đến các loại máy chà sàn cồng kềnh, phức tạp. Sợi cước cứng có độ dẻo, dai khả năng đàn hồi tốt giúp luồn sâu, làm sạch các bề mặt gồ ghề, sàn vân, sàn rãnh, bề mặt khe rạch hiệu quả.\r\n\r\nCó thiết kế thẩm mỹ, thuận tay, dễ sử dụng, độ bền cao và tính năng tiện ích, chổi chà sàn là một dụng cụ vệ sinh đáng để lựa chọn cho công việc quét dọn hàng ngày của bạn', 40000, 'images/1639988055.jpg', 8),
(12, 'Nồi cơm điện KALITE KL-618 đa chức năng', '2 chức năng nấu và giữ ẩm\r\nChất liệu nắp và đáy nhựa ABS\r\nThân vỏ chất liệu hợp kim cao cấp\r\nChất liệu mâm nhiệt cong bền bỉ\r\nLòng niêu truyền nhiệt nhanh, giữ nhiệt đều\r\nĐai ủ trong 8h\r\nQuai sách thường, nắp phụ\r\nNút bấm cơ kiểu dáng mới\r\nDung tích 1.8L', 790000, 'images/1639988163.jpg', 8),
(13, 'Bơm Thông hút bồn cầu', 'Sản phẩm là 1 cái bơm\r\nDùng để Thông tắc bồn cầu\r\nKhi bồn cầu bị tắc bạn cần đổ 1 gói Thông cống vào để khoảng 1-2 tiếng xả nước rồi cho bơm vào bơm\r\nĐảm bảo hết tắc\r\nNếu vẫn tắc bạn cần đổ 2 chai CoCa cô la vào để qua đêm, rồi dùng bơm hút sẽ hết tắc', 70000, 'images/1639988281.jpg', 8),
(14, 'Tủ quần áo', 'Phong cách : Đơn giản và hiện đại\r\n\r\nChất liệu : Thủ công mây tre\r\n\r\nMàu sắc : Vân gỗ\r\n\r\nKích thước : 123x30x145 cm\r\n\r\nThao tác lắp ráp dễ dàng, nhiều ngăn chứa rộng rãi, chất liệu an toàn, không độc hại, kiểu dáng hiện đại bắt mắt, màu sắc trang nhã hài hòa. Sản phẩm vừa là vật dụng tiết kiệm không gian và bảo quản đồ dùng hiệu quả, vừa là món nội thất mang tính thẩm mỹ cao, cho góc nhà trở nên gọn gàng, sang trọng .', 1050000, 'images/1639988377.jpg', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`customer_id`,`product_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

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
-- AUTO_INCREMENT for dumped tables
--

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
