<h1 align="center">ĐỒ ÁN TRANG WEB BÁN HÀNG</h1>

## Sở hữu: <a href="https://github.com/hydra029">Hydra</a> & <a href="https://github.com/maoleng">Mao Leng</a>

## Mô tả
- [1. Lời mở đầu](#1-Loi-mo-dau)
- [2. Giới thiệu](#2-Gioi-thieu)
- [3. Phân tích yêu cầu người dùng](#3-Phan-tich-yeu-cau-nguoi-dung)
- [4. Thiết kế hệ thống](#4-Thiet-ke-he-thong)
- [5. Kết luận](#5-Ket-luan)
- [6. Xem demo trang sản phẩm](#6-Xem-demo-san-pham)

## 1 Loi mo dau

Trong quá trình làm đồ án do hạn chế về thời gian và điều kiện nên nhóm em khó tránh khỏi sai sót, mong thầy giúp đỡ em hoàn thành tốt nhiệm vụ thiết kế tốt nghiệp<br>
Hiện nay, đất nước ta đang trong giai đoạn phát triển, thực hiện công nghiệp hóa, hiện đại hóa. Cùng với sự phát triển của nền kinh tế thị trường, việc giao lưu buôn bán, trao đổi hàng hóa là một nhu cầu thiết yếu của người dân, các cơ quan xí nghiệp, các tổ chức kinh tế và toan xã hội. <br>
Là học sinh của J2SCHOOL, sau 5, 6 tháng học tập và rèn luyện dưới sự chỉ bảo tận tinh của thầy Nguyễn Nam Long, em đã học hỏi rất nhiều điều bổ ích từ kiến thức trong ngành cho đến đời sống. Đề tài đồ án của nhôm em là: Thiết kế trang web bán đồ gia dụng <br>
Em xin chân thanh cảm ơn thầy Nguyễn Nam Long đã giúp đỡ em trong quá trinh làm đồ án này. <br><br>
<p align="right">Hồ Chí Minh, tháng 2 năm 2022</p>

## 2 Gioi thieu

<h3>2.1 Đưa ra vấn đề</h3>
Do hiện nay, khi buôn bán, ta thường sử dụng phần mềm Excel, hoặc sổ sách để lưu lại những gì ta bán, khách hàng, v/v… Nhận thấy được sự bất tiện nên nhóm đã xây dựng dự án này <br>

<h3>2.2 Hệ thống hiện tại</h3>
Khi khách hàng đặt hàng, lưu vào Excel <br>
Khi cập nhật đơn hàng, thay đổi giá trị cột trong Excel <br>
Các sản phẩm lưu trên Excel, khi có thêm sản phẩm thì thêm 1 bản ghi <br>

<h3>2.3 Hệ thống đề nghị</h3>
Cần có hệ thống mới, tiên tiến, hiện đại hơn, có những chức năng cơ bản để quản lí cửa hàng, có thể xem thống kê, phân quyền rõ ràng cho nhân viên và quản lí, xem lịch sử các thao tác, … <br>

## 3 Phan tich yeu cau nguoi dung

<h3>3.1 Yêu cầu phi chức năng</h3>
Dễ hiểu, giao diện đẹp, đầy đủ tinh năng, dùng được trên trinh duyệt <br>

<h3>3.2 Yêu cầu chức năng</h3>
<h4>	3.2.1 Nhóm người dùng của hệ thống</h4>
<h5>Nhân viên</h5>
<ul>
	<li>Đăng nhập, đăng xuất</li>
	<li>Quản lí sản phẩm ( xem, thêm, chỉnh sửa)</li>
	<li>Quản lí hóa đơn ( cập nhật hóa đơn )</li>
	<li>Quản lí gắn thẻ ( xem, thêm, sửa, xóa )</li>
	<li>Xem lịch sử hoạt động</li>
</ul>
<h5>Quản lí</h5>
<ul>
	<li>Có các quyền của nhân viên</li>
	<li>Xóa sản phẩm</li>
	<li>Quản lí nhà cung cấp ( xem, thêm, sửa, xóa )</li>
	<li>Xem thống kê</li>
	<li>Quản lí khách hàng</li>
</ul>
<h5>Khách hàng chưa có tài khoản</h5>
<ul>	
	<li>Xem tất cả sản phẩm</li>
	<li>Xem sản phẩm chi tiết</li>
	<li>Tìm kiếm sản phẩm</li>
	<li>Đăng nhập</li>
	<li>Đăng ký</li>
</ul>
<h5>Khách hàng có tài khoản</h5>
<ul>
	<li>Có các quyền của khách hàng chưa có tài khoản</li>
	<li>Đăng xuất</li>
	<li>Đặt hàng</li>
	<li>Giỏ hàng</li>
	<li>Địa chỉ nhận hàng</li>
	<li>Hóa đơn</li>
</ul>

<h3>3.3 Phân tích chức năng</h3>
<h4 align="center">Đăng nhập</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Quản lí, nhân viên, khách hàng</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Đăng nhập</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Người dùng nhấn vào nút Đăng nhập</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>
			<ul>
				<li>Email</li>
				<li>Mật khẩu</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Chuyển sang 1 form đăng nhập</li>
				<li>
					<li>Lấy thông tin từ form ( email và mật khẩu ), kiểm tra thông tin không được để trống</li>
					<ul>
						<li>Trống: Chuyển hướng về trang đăng nhập và báo lỗi</li>
					</ul>
				</li>
				<li>Kiểm tra xem có tài khoản và mật khẩu nào khớp với thông tin điền vào hay không
					<ul>
						<li>Khớp: Tạo phiên đăng nhập, lưu tên, mã tài khoản vào phiên</li>
						<li>Không khớp: Chuyển hướng về trang đăng nhập và báo lỗi</li>
					</ul>
				</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>
			<ul>
				<li>Đúng: Chuyển hướng về trang người dùng và báo đăng nhập thành công</li>
				<li>Sai: Chuyển hướng về trang đăng nhập và thông báo đăng nhập thất bại</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>
			<ul>
				<li>Kiểm tra ô nhập không được để trống bằng JavaScript</li>
				<li>Trang đăng nhập của Quản lí và Nhân viên khác với trang đăng nhập của Khách hàng</li>
			</ul>
		</td>
	</tr>
</table>

<h4 align="center">Đăng xuất</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Quản lí, nhân viên, khách hàng</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Đăng xuất</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Người dùng nhấn vào nút Đăng xuất</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>Không</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Sau khi ấn vào nút Đăng xuất thì sẽ xóa phiên đăng nhập khỏi trình duyệt</li>
				<li>huyển hướng về trang đăng nhập</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>Đúng: Chuyển hướng về trang đăng nhập và báo đăng xuất thành công</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>
			<ul>
				<li>Để đăng xuất được thì phải đăng nhập trước</li>
				<li>Trang đăng nhập của Quản lí và Nhân viên khác với trang đăng nhập của Khách hàng</li>
			</ul>
		</td>
	</tr>
</table>

<h4 align="center">Xem sản phẩm</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Quản lí, nhân viên</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Xem các sản phẩm của cửa hàng</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Nhấn vào nút Quản lí sản phẩm trong Menu Vùng nội bộ</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>Không</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Chuyển sang trang xem sản phẩm</li>
				<li>Kết nối CSDL và lấy ra tất cả sản phẩm và hiển thị ra theo dạng danh sách</li>
				<li>
					Hiển thị những thông tin: 
					<ul>
						<li>Về sản phẩm: mã, tên, giá, hình ảnh, nhà sản xuất</li>
						<li>
							Tác động lên sản phẩm: Xem chi tiết, sửa, xóa
							<ul>
								-> Xem chi tiết:
								<ul>
									<li>Xem ở trang đẹp hơn, có những thông tin cơ bản ở trang Quản lí sản phẩm</li>
									<li>
										Có thêm những thông tin:
										Các thẻ được gắn, Số sản phẩm bán được, Số tiền thu được từ sản phẩm, Lần cuối cùng sản phẩm được mua, Mô tả sản phẩm
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>Đúng: Hiển thị ra tất cả sản phẩm</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>
			<ul>
				<li>Để dùng được chức năng này phải là Quản lí hoặc Nhân viên</li>
				<li>Để tiện cho người sử dụng nên có chức năng phân trang và tìm kiếm theo tên sản phẩm</li>
				<li>Quản lí thấy nút Xóa sản phẩm còn Nhân viên thì không thấy</li>
			</ul>
		</td>
	</tr>
</table>

<h4 align="center">Thêm sản phẩm</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Quản lí, nhân viên</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Thêm sản phẩm vào cửa hàng</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Nhấn vào nút thêm sản phẩm trong Menu Vùng nội bộ</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>
			<ul>
				<li>Tên sản phẩm</li>
				<li>Mô tả sản phẩm</li>
				<li>Giá </li>
				<li>Hình ảnh</li>
				<li>Nhà sản xuất</li>
				<li>Thể loại</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Chuyển sang form điền thông tin sản phẩm</li>
				<li>
					Thông tin được lấy từ form và không được trống
					<ul>
						<li>Trống: Chuyển hướng lại form điền thông tin sản phẩm và báo lỗi</li>
					</ul>
				</li>
				<li>Kiểm tra thông tin người dùng điền có hợp lệ, nếu hợp lệ thì bắt đầu xử lí Thêm sản phẩm</li>
				<li>Thêm sản phẩm kèm theo Thể loại của sản phẩm</li>
				<li>Chuyển hướng về trang Quản lí sản phẩm và thông báo thêm thanh công</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>
			<ul>
				<li>Chuyển hướng về trang Quản lí sản phẩm và thông báo thêm thành công</li>
				<li>Chuyển hướng về trang Thêm sản phẩm và báo thông tin đầu vào không hợp lệ</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>
			<ul>
				<li>Để dùng được chức năng này phải là Quản lí hoặc Nhân viên</li>
				<li>Để tiện cho người sử dụng nên có chức năng phân trang và tìm kiếm theo tên sản phẩm</li>
			</ul>
		</td>
	</tr>
</table>

<h4 align="center">Sửa sản phẩm</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Quản lí, nhân viên</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Sửa sản phẩm có sẵn trong cửa hàng</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Nhấn vào nút Sửa sản phẩm trong Menu Vùng nội bộ -> Quản lí sản phẩm</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>Mã sản phẩm</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Chuyển sang form sửa thông tin sản phẩm</li>
				<li>Form sửa sản phẩm hiện ra những thông tin cũ của sản phẩm đó bằng cách kết nối CSDL và lấy ra thông tin</li>
				<li>
					Người dùng có thể sửa thông tin trong form, thông tin không được trống
					<ul>
						<li>Trống: Chuyển hướng lại form sửa sản phẩm và báo lỗi</li>
					</ul>
				</li>
				<li>Kiểm tra thông tin người dùng điền có hợp lệ, nếu hợp lệ thì bắt đầu xử lí Sửa sản phẩm</li>
				<li>Chuyển hướng về trang Quản lí sản phẩm và thông báo sửa thanh công</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>
			<ul>
				<li>Đúng: Chuyển hướng về trang Quản lí sản phẩm và thông báo sửa thành công</li>
				<li>Sai: Chuyển hướng về trang Sửa sản phẩm và báo thông tin đầu vào không hợp lệ</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>
			<ul>
				<li>Để dùng được chức năng này phải là Quản lí hoặc Nhân viên</li>
				<li>Các tệp ảnh sản phẩm sẽ được lưu trong Máy chủ, ảnh cũ không được xóa đi</li>
			</ul>
		</td>
	</tr>
</table>

<h4 align="center">Xóa sản phẩm</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Quản lí</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Xóa sản phẩm có sẵn trong cửa hàng</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Nhấn vào nút Xóa sản phẩm trong Menu Vùng nội bộ -> Quản lí sản phẩm</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>Mã sản phẩm</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Xóa sản phẩm theo mã sản phẩm</li>
				<li>Xóa thành công: Chuyển hướng về trang Quản lí sản phẩm và thông báo xóa thanh công</li>
				<li>
					Xóa thất bại do:
					<ul>
						<li>Sản phẩm đang trong đơn của khách hàng</li>
						<li>Sản phẩm có gắn thẻ</li>
					</ul>
				</li>
				<li>Chuyển hướng về trang Quản lí sản phẩm</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>
			<ul>
				<li>Đúng: Chuyển hướng về trang Quản lí sản phẩm và thông báo xóa thành công</li>
				<li>Sai: Chuyển hướng về trang Sửa sản phẩm và thông báo xóa thất bại</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>
			<ul>
				<li>Để dùng được chức năng này phải là Quản lí</li>
				<li>Ảnh cũ không được xóa đi</li>
			</ul>
		</td>
	</tr>
</table>

<h4 align="center">Xem hóa đơn</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Quản lí, nhân viên</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Xem các hóa đơn ở trạng thái chưa duyệt và đang giao</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Nhấn vào nút Quản lí hóa đơn trong Menu Vùng nội bộ</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>Không</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Chuyển sang trang xem hóa đơn</li>
				<li>Lấy ra tất cả hóa đơn trong CSDL và hiển thị ra theo dạng danh sách</li>
				<li>
					Hiển thị những thông tin: 
					<ul>
						<li>Về hóa đơn: mã, thời gian đặt, thông tin người đặt, người nhận, trạng thai, tổng tiền hóa đơn</li>
						<li>
							Tác động lên hóa đơn: Xem chi tiết, duyệt
							<ul>
								<li>Xem chi tiết từng sản phẩm của đơn hàng, có các thông tin như: Ảnh sản phẩm, Tên, Giá, Số lượng, Tổng tiền từng sản phẩm và tổng tiền toàn bộ</li>
								<li>Duyệt: Duyệt đơn sang trạng thái Đang giao, hoặc từ Đang giao sang Giao thanh công, hoặc Hủy đơn hàng</li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>Đúng: Hiển thị ra tất cả hóa đơn</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>
			<ul>
				<li>Để dùng được chức năng này phải là Quản lí</li>
				<li>Để tiện cho người sử dụng nên có chức năng phân trang và tìm kiếm theo tên hóa đơn</li>
			</ul>
		</td>
	</tr>
</table>

<h4 align="center">Quản lí gắn thẻ</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Quản lí, nhân viên</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Quản lí các thẻ được gắn trên sản phẩm và sản phẩm theo thẻ</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Nhấn vào nút Quản lí gắn thẻ trong Menu Vùng nội bộ</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>Không</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Chuyển sang trang Quản lí gắn thẻ</li>
				<li>
					Có những thông tin:
					<ul>
						<li>Về thẻ: Mã thẻ, Tên thẻ</li>
						<li>
							Chức năng liên quan tới thẻ:
							<ul>
								<li>Xem sản phẩm sử dụng thẻ x: Liệt kê ra các sản phẩm có gắn thẻ x, có thể xóa thẻ x khỏi sản phẩm đó</li>
								<li>Thêm sản phẩm vào thẻ x: Người dùng có thể chọn sản phẩm để thêm thẻ x vào sản phẩm</li>
								<li>Đổi tên thẻ: Chuyển sang trang sửa tên thẻ để sửa, nhấn sửa để Đổi tên thẻ</li>
								<li>Xóa thẻ: Xóa thẻ đó nếu không có sản phẩm nào được gắn thẻ đó</li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>Đúng: Hiển thị ra tất cả thẻ kèm theo chức năng tác động lên thẻ</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>
			<ul>
				<li>Để dùng được chức năng này phải là Quản lí hoặc Nhân viên</li>
				<li>Để tiện cho người sử dụng nên có chức năng phân trang và tìm kiếm theo tên thẻ</li>
			</ul>
		</td>
	</tr>
</table>

<h4 align="center">Thêm thẻ mới vào sản phẩm</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Quản lí, nhân viên</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Thêm nhiều thẻ mới vào sản phẩm</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Nhấn vào nút Thêm thẻ vào sản phẩm trong Menu Vùng nội bộ</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>Các tên thẻ</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Chuyển sang trang Thêm thẻ vào sản phẩm</li>
				<li>Chọn sản phẩm muốn thêm thẻ và ấn vào nút Thêm</li>
				<li>Chuyển hướng sang Trang thêm thẻ vào sản phẩm x</li>
				<li>Có thể nhập nhiều tên thẻ 1 lúc</li>
				<li>Sau khi ấn nút Thêm thẻ thì xử lí thêm những thẻ đó vào sản phẩm x</li>
				<li>Chuyển hướng về trang Thêm thẻ vào sản phẩm</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>
			<ul>
				<li>Đúng: Thông báo thêm thẻ thành công và chuyển hướng về trang Thêm thẻ vào sản phẩm</li>
				<li>Sai: Nhập sai id sản phẩm cần thêm</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>
			<ul>
				<li>Để dùng được chức năng này phải là Quản lí hoặc Nhân viên</li>
				<li>Để tiện cho người sử dụng nên có chức năng phân trang và tìm kiếm theo tên sản phẩm cần thêm thẻ</li>
			</ul>
		</td>
	</tr>
</table>

<h4 align="center">Xem lịch sử hành động</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Quản lí, nhân viên</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Xem lịch sử các hành động phía quản lí trang web</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Nhấn vào nút Lịch sử hoạt động trong Menu Vùng nội bộ</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>Không</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Chuyển sang trang Lịch sử hoạt động</li>
				<li>Trang này sẽ hiển thị những thông tin như Mã hành động, Thông tin hành động ( Ai làm việc gì ), Thời gian thực thi hành động đó</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>Đúng: Hiển thị danh sách các hành động</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>
			<ul>
				<li>Để dùng được chức năng này phải là Quản lí hoặc Nhân viên</li>
				<li>Để tiện cho người sử dụng nên có chức năng phân trang và tìm kiếm theo thông tin hoạt động</li>
			</ul>
		</td>
	</tr>
</table>

<h4 align="center">Xem thống kê sản phẩm theo thời gian</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Quản lí</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Xem thống kê sản phẩm dưới dạng biểu đồ</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Nhấn vào nút Thống kê sản phẩm trong Menu Vùng nội bộ</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>Thời gian: Từ ngày x tới ngày y hoặc x ngày gần đây
		hoặc Tháng x</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Chuyển sang trang Thống kê sản phẩm</li>
				<li>
					Đọc dữ liệu nhập vào của người dùng: 
					<ul>
						<li>Hình thức thống kê: ( Ngày chỉ định tới ngày chỉ định, hoặc Số ngày gần đây, hoặc Tháng )</li>
						<li>
							Giá trị theo hình thức thống kê đã chọn:
							<ul>
								<li>Ví dụ ở hình thức thống kê ngày x tới ngày y: Từ 12-05-2021 đến 12-7-2022, ….</li>
								<li>Ví dụ ở hình thức thống kê số ngày gần đây:
								14 ngày gần đây, 30 ngày gần đây, …</li>
								<li>Ví dụ ở hình thức thống kê theo tháng:
								Tháng 1, Tháng 7, ….</li>
							</ul>
						</li>
					</ul>
				</li>
				<li>Sau khi đọc xong dữ liệu sẽ trả về 1 biểu đồ cột có những thông tin như Tên sản phẩm ứng với Số lượng sản phẩm bán được theo ngày đã chọn</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>Đúng: Hiển thị biểu đồ cột thể hiện số sản phẩm bán được theo thời gian</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>
			<ul>
				<li>Để dùng được chức năng này phải là Quản lí hoặc Nhân viên</li>
				<li>Người dùng có thể xem chi tiết từng sản phẩm đó bán ở ngày nào bằng cách Click chuột vào cột đó</li>
			</ul>
		</td>
	</tr>
</table>

<h4 align="center">Xem thống kê hóa đơn theo thời gian</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Quản lí</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Xem thống kê hóa đơn dưới dạng biểu đồ</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Nhấn vào nút Thống kê hóa đơn trong Menu Vùng nội bộ</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>Thời gian: Từ ngày x tới ngày y hoặc x ngày gần đây
		hoặc Tháng x</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Chuyển sang trang Thống kê sản phẩm</li>
				<li>
					Đọc dữ liệu nhập vào của người dùng: 
					<ul>
						<li>Hình thức thống kê: ( Ngày chỉ định tới ngày chỉ định, hoặc Số ngày gần đây, hoặc Tháng )</li>
						<li>
							Giá trị theo hình thức thống kê đã chọn:
							<ul>
								<li>Ví dụ ở hình thức thống kê ngày x tới ngày y: Từ 12-05-2021 đến 12-7-2022, ….</li>
								<li>Ví dụ ở hình thức thống kê số ngày gần đây:
								14 ngày gần đây, 30 ngày gần đây, …</li>
								<li>Ví dụ ở hình thức thống kê theo tháng:
								Tháng 1, Tháng 7, ….</li>
							</ul>
						</li>
					</ul>
				</li>
				<li>Sau khi đọc xong dữ liệu sẽ trả về 1 biểu đồ tròn có những thông tin như Tên hóa đơn phân theo trạng thái ứng với Số lượng hóa đơn của trạng thái đó theo ngày đã chọn</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>Đúng: Hiển thị biểu đồ tròn thể hiện số hóa đơn phân theo trạng thái theo thời gian đã chọn</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>
			<ul>
				<li>Để dùng được chức năng này phải là Quản lí hoặc Nhân viên</li>
			</ul>
		</td>
	</tr>
</table>

<h4 align="center">Xem thống kê doanh thu theo thời gian</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Quản lí</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Xem thống kê doanh thu dưới dạng biểu đồ</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Nhấn vào nút Thống kê doanh thu trong Menu Vùng nội bộ</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>Thời gian: Theo năm x hoặc x ngày gần đây
		hoặc Tháng x</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Chuyển sang trang Thống kê sản phẩm</li>
				<li>
					Đọc dữ liệu nhập vào của người dùng: 
					<ul>
						<li>Hình thức thống kê: ( Theo năm, hoặc Số ngày gần đây, hoặc Tháng )</li>
						<li>
							Giá trị theo hình thức thống kê đã chọn:
							<ul>
								<li>Ví dụ ở hình thức thống kê theo năm:
								Năm 2022, năm 2021, …</li>
								<li>Ví dụ ở hình thức thống kê số ngày gần đây:
								14 ngày gần đây, 30 ngày gần đây, …</li>
								<li>Ví dụ ở hình thức thống kê theo tháng:
								Tháng 1, Tháng 7, ….</li>
							</ul>
						</li>
					</ul>
				</li>
				<li>Sau khi đọc xong dữ liệu sẽ trả về 1 biểu đồ đường có những thông tin như Số tiền thu được ứng với Mốc thời gian thuộc khoảng thời gian đã chọn</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>Đúng: Hiển thị biểu đồ đường thể hiện doanh thu theo thời gian đã chọn</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>
			<ul>
				<li>Để dùng được chức năng này phải là Quản lí hoặc Nhân viên</li>
			</ul>
		</td>
	</tr>
</table>

<h4 align="center">Xem thống kê khách hàng thân thiết</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Quản lí</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Xem thống kê khách hàng thân thiết dưới dạng biểu đồ</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Nhấn vào nút Thống kê khách hàng trong Menu Khách hàng</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>Không</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Chuyển sang trang Thống kê khách hàng</li>
				<li>Trả về 1 biểu đồ cột có những thông tin như Tên khách hàng ứng với Số tiền mà khách hàng đó đã bỏ ra</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>Đúng: Hiển thị biểu cột đường thể hiện doanh thu theo thời gian đã chọn</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>
			<ul>
				<li>Để dùng được chức năng này phải là Quản lí hoặc Nhân viên</li>
			</ul>
		</td>
	</tr>
</table>

<h4 align="center">Quản lí khách hàng</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Quản lí</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Xem chi tiết thông tin khách hàng đó và những hóa đơn mà khách đó đã đặt</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Nhấn vào nút Quản lí khách hàng trong Menu Khách hàng</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>Không</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Chuyển sang trang Quản lí khách hàng</li>
				<li>
					Trả về 1 bảng có:
					<ul>
						<li>Thông tin của khách hàng: Mã khách hàng, Tên khách hàng, Lần cuối mua hàng, Số tiền bỏ ra</li>
						<li>Chức năng tác động lên khách hàng: Xem chi tiết khách hàng -> Xem được nhiều thông tin hơn ( Giới tinh, Ngày sinh, Email, Những hóa đơn khách hàng đó đã đặt )</li>
					</ul>
				</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>Đúng: Hiển thị bảng có những thông tin về các khách hàng đã đăng ký tài khoản</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>
			<ul>
				<li>Để dùng được chức năng này phải là Quản lí hoặc Nhân viên</li>
				<li>Để tiện cho người sử dụng nên có chức năng phân trang và tìm kiếm theo tên khách hàng</li>
			</ul>
		</td>
	</tr>
</table>

<h4 align="center">Đăng nhập</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Khách hàng</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Xem thông tin sản phẩm một cách chi tiết</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Người dùng ấn vào nút “Xem chi tiết” trên thẻ sản phẩm</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>Mã sản phẩm</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Điều hướng sang trang sản phẩm chi tiết</li>
				<li>
					Lấy thông tin mã sản phẩm từ thanh địa chỉ
					<ul>
						<li>Trống: điều hướng về trang chủ</li>
					</ul>
				</li>
				<li>Kết nối CSDL</li>
				<li>
					Kiểm tra trong CSDL có mã sản phẩm này không
					<ul>
						<li>Không: Điều hướng về trang chủ</li>
						<li>Có: Lấy thông tin sản phẩm theo mã sản phẩm</li>
					</ul>
				</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>
			<ul>
				<li>Đúng: Hiển thị thông tin sản phẩm chi tiết theo mã vừa lấy</li>
				<li>Sai: Điều hướng về trang chủ</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>Trang sản phẩm chi tiết của khách hàng không có tài khoản và có tài khoản có sự khác biệt ở nút thêm vào giỏ hàng</td>
	</tr>
</table>

<h4 align="center">Thêm vào giỏ hàng</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Khách hàng</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Thêm sản phẩm vào giỏ hàng</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Người dùng ấn vào nút “Thêm vào giỏ hàng” trên thẻ sản phẩm</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>
			<ul>
				<li>Mã sản phẩm</li>
				<li>Mã khách hàng</li>
				<li>Kiểu thay đổi</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Lấy thông tin mã sản phẩm từ thanh địa chỉ và mã khách hàng từ phiên đăng nhập</li>
				<li>Kết nối CSDL</li>
				<li>
					Kiểm tra xem giỏ hàng có sản phẩm nào chưa
					<ul>
						<li>
							Chưa có:
							<ul>
								<li>Thêm vào hoá đơn mới(mã khách hàng, trạng thái hoá đơn: mặc định là 1 tức đang trong giỏ hàng)</li>
								<li>Lấy mã hoá đơn vừa thêm vào</li>
								<li>Lấy thông tin sản phẩm theo mã sản phẩm</li>
								<li>Thêm sản phẩm vào hoá đơn chi tiết(mã hoá đơn, mã sản phẩm, số lượng sản phẩm = 1)</li>
							</ul>
						</li>
						<li>
							Đã có:
							<ul>
								<li>Lấy mã hoá đơn có trạng thái bằng 1.</li>
								<li>Lấy thông tin sản phẩm theo mã sản phẩm</li>
								<li>Thêm sản phẩm vào hoá đơn chi tiết(mã hoá đơn, mã sản phẩm, số lượng sản phẩm)</li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>Đúng: Tăng số lượng của sản phẩm lên 1 và thông báo thành công</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>Chỉ có khi khách đã đăng nhập tài khoản</td>
	</tr>
</table>

<h4 align="center">Xem giỏ hàng</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Khách hàng</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Xem giỏ hàng</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Người dùng ấn vào nút “Giỏ hàng” trên thanh menu</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>Mã khách hàng</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Điều hướng sang trang giỏ hàng cá nhân</li>
				<li>Kết nối CSDL</li>
				<li>Lấy mã khách hàng từ phiên đăng nhập</li>
				<li>Kiểm tra trong bảng hoá đơn có hoá đơn nào có cùng mã khách hàng và trạng thái bằng 1 hay không</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>
			<ul>
				<li>Có: Hiển thị các sản phẩm hiện có trong giỏ hàng của khách hàng</li>
				<li>Không có: Hiển thị giỏ hàng hiện không có gì</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>Chỉ có khi khách đã đăng nhập tài khoản</td>
	</tr>
</table>

<h4 align="center">Thay đổi số lượng sản phẩm</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Khách hàng</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Tăng hoặc giảm 1 sản phẩm</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Người dùng ấn vào nút (+) và (-) trong giỏ hàng</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>
			<ul>
				<li>Mã sản phẩm</li>
				<li>Mã khách hàng</li>
				<li>Kiểu thay đổi</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Lấy thông tin mã khách hàng từ phiên đăng nhập, mã sản phẩm và kiểu thay đổi từ dữ liệu của nút (+) hoặc (-)</li>
				<li>Truyền mã sản phẩm và kiểu thay đổi bằng ajax</li>
				<li>Kết nối CSDL</li>
				<li>
					Thay đổi số lượng sản phẩm có mã sản phẩm như trên đi 1 đơn vị dựa trên kiểu thay đổi trong đơn hàng có trạng thái bằng 1
					<ul>
						<li>Tăng lên: tăng lên 1 sản phẩm trong giỏ</li>
						<li>
							Giảm đi:
							<ul>
								<li>Giỏ có 1 sản phẩm: xoá sản phẩm khỏi giỏ</li>
								<li>Giỏ có nhiều hơn 1 sản phẩm: Giảm đi 1 sản phẩm</li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>
			<ul>
				<li>Thông báo tăng giảm số lượng sản phẩm thành công</li>
				<li>Hiển thị giỏ hàng sau khi cập nhật</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>Chỉ có khi khách đã đăng nhập tài khoản</td>
	</tr>
</table>

<h4 align="center">Xoá sản phẩm</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Khách hàng</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Xoá sản phẩm khỏi giỏ hàng</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Người dùng ấn vào nút “Xóa” trong giỏ hàng</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>
			<ul>
				<li>Mã sản phẩm</li>
				<li>Mã khách hàng</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Lấy thông tin id sản phẩm và id khách hàng từ thanh địa chỉ</li>
				<li>Kết nối CSDL</li>
				<li>Xoá sản phẩm khỏi đơn hàng có trạng thái đơn bằng 1</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>
			<ul>
				<li>Thông báo xóa sản phẩm vào giỏ hàng thành công.</li>
				<li>Hiển thị giỏ hàng sau khi cập nhật</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>Chỉ có khi khách đã đăng nhập tài khoản</td>
	</tr>
</table>

<h4 align="center">Đặt hàng</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Khách hàng</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Đặt hàng</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Người dùng ấn vào nút “Đặt hàng” trong giỏ hàng</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>
			<ul>
				<li>Mã sản phẩm</li>
				<li>Mã khách hàng</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Hiển thị modal đặt hàng</li>
				<li>Kết nối CSDL</li>
				<li>Lấy thông tin mã khách hàng từ phiên đăng nhập; thông tin sản phẩm trong giỏ hàng(đơn hàng có trạng thái là 1), thông tin địa chỉ mặc định(trạng thái bằng 1)</li>
				<li>Hiển thị thông tin các sản phẩm trong giỏ, các thông tin về địa chỉ giao hàng hiện có</li>
				<li>Gửi thông tin lên CSDL qua ajax, đổi trạng thái hoá đơn từ 1 sang 2</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>
			<ul>
				<li>Chuyển hướng về trang đơn hàng</li>
				<li>Thông báo đặt hàng thành công</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>Chỉ có khi khách đã đăng nhập tài khoản</td>
	</tr>
</table>

<h4 align="center">Xem chi tiết sản phẩm trong giỏ</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Khách hàng</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Xem chi tiết sản phẩm trong giỏ</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Người dùng ấn vào tên sản phẩm trong giỏ hàng</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>Mã sản phẩm</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Chuyển sang trang chi tiết sản phẩm</li>
				<li>Lấy thông tin mã sản phẩm từ thanh địa chỉ</li>
				<li>Kết nối CSDL</li>
				<li>Hiển thị thông tin chi tiết của sản phẩm có mã trùng với mã sản phẩm vừa lấy</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>Hiển thị thông tin chi tiết của sản phẩm có mã trùng với mã sản phẩm vừa lấy</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>
			<ul>
				<li>Chỉ có khi khách đã đăng nhập tài khoản</li>
				<li>Trang sản phẩm chi tiết của khách hàng không có tài khoản và có tài khoản có sự khác biệt ở nút thêm vào giỏ hàng</li>
			</ul>
		</td>
	</tr>
</table>

<h4 align="center">Xem địa chỉ nhận hàng</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Khách hàng</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Xem các địa chỉ nhận hàng của tài khoản khách</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Người dùng ấn vào nút địa chỉ giao hàng trên thanh menu</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>Mã khách hàng</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Chuyển sang trang địa chỉ nhận hàng</li>
				<li>Lấy thông tin mã khách hàng từ phiên đăng nhập</li>
				<li>Kết nối CSDL</li>
				<li>Lấy thông tin những địa chỉ có mã khách hàng bằng mã khách hàng lấy từ phiên đăng nhập</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>
			<ul>
				<li>Có: Hiển thị các địa chỉ giao hàng</li>
				<li>Không: Hiển thị chưa có địa chỉ nào, mời thêm.</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>Hiển thị các địa chỉ giao hàng</td>
	</tr>
</table>

<h4 align="center">Thêm địa chỉ nhận hàng</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Khách hàng</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Thêm địa chỉ nhận hàng</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Người dùng ấn vào nút “Tạo thêm” ở trang địa chỉ giao hàng hoặc modal địa chỉ giao hàng</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>Mã khách hàng</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Hiển thị modal form thêm địa chỉ nhận hàng</li>
				<li>Lấy thông tin từ form</li>
				<li>
					Kiểm tra thông tin có hợp lệ không
					<ul>
						<li>Không: báo lỗi và yêu cầu nhập lại</li>
					</ul>
				</li>
				<li>Kết nối CSDL</li>
				<li>Thêm địa chỉ mới vào bảng địa chỉ nhận hàng trong CSDL</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>
			<ul>
				<li>Thông báo thêm địa chỉ thành công</li>
				<li>Chỉ có khi khách đã đăng nhập tài khoản</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>Hiển thị các địa chỉ giao hàng</td>
	</tr>
</table>

<h4 align="center">Sửa địa chỉ nhận hàng</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Khách hàng</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Sửa địa chỉ nhận hàng</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Người dùng ấn vào nút “Sửa” trong trang địa chỉ nhận hàng hoặc trong khi đặt hàng</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>
			<ul>
				<li>Mã địa chỉ</li>
				<li>Mã khách hàng</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Kết nối CSDL</li>
				<li>Lấy thông tin mã địa chỉ từ ajax</li>
				<li>Lấy thông tin địa chỉ của mã khách hàng có mã địa chỉ ở trên</li>
				<li>Hiển thị modal form thay đổi thông tin địa chỉ với các thông tin cũ</li>
				<li>Lấy thông tin địa chỉ từ form trên</li>
				<li>Cập nhật lên CSDL</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>
			<ul>
				<li>Thông báo sửa địa chỉ thành công</li>
				<li>Tải lại trang</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>Chỉ có khi khách đã đăng nhập tài khoản</td>
	</tr>
</table>

<h4 align="center">Xoá địa chỉ nhận hàng</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Khách hàng</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Xoá địa chỉ nhận hàng</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Người dùng ấn vào nút “Xoá” trong trang địa chỉ nhận hàng</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>
			<ul>
				<li>Mã địa chỉ</li>
				<li>Mã khách hàng</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Lấy mã địa chỉ từ thanh địa chỉ và mã khách hàng từ phiên đăng nhập</li>
				<li>Kết nối CSDL</li>
				<li>Kiểm tra địa chỉ có mã trùng mã địa chỉ vừa lấy và mã khách hàng trùng mã khách hàng của phiên đăng nhập</li>
				<li>Xoá địa chỉ nhận hàng vừa kiểm tra</li>
				<li>
					Kiểm tra id địa chỉ vừa xoá có phải mặc định
					<ul>
						<li>Đúng: đặt mặc định địa chỉ đầu tiên</li>
					</ul>
				</li>
				<li>Thay đổi id địa chỉ lại theo thứ tự từ 1 đến hết</li>
				<li>Tải lại trang</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>
			<ul>
				<li>Hiển thị các địa chỉ sau khi cập nhật (Nếu đã không còn địa chỉ nào, hiển thị không có địa chỉ nào, mời tạo thêm)</li>
				<li>Thông báo xoá địa chỉ thành công</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>Chỉ có khi khách đã đăng nhập tài khoản</td>
	</tr>
</table>

<h4 align="center">Xem thông tin cá nhân</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Khách hàng</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Xem thông tin cá nhân</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Người dùng ấn vào nút có tên người dùng trên thanh menu</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>Không</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Chuyển sang sang trang thông tin khách hàng</li>
				<li>Lấy mã khách hàng từ phiên đăng nhập</li>
				<li>Kết nối CSDL</li>
				<li>Lấy các thông tin của khách hàng có mã trùng với mã vừa lấy</li>
				<li>Lấy thông tin từ form thay đổi thông tin</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>Hiển thị các thông tin người dùng vừa lấy</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>Chỉ có khi khách đã đăng nhập tài khoản</td>
	</tr>
</table>

<h4 align="center">Sửa thông tin cá nhân</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Khách hàng</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Sửa thông tin cá nhân</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Người dùng ấn vào nút có tên người dùng trên thanh menu</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>Mã khách hàng</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Kết nối CSDL</li>
				<li>Lấy thông tin từ form</li>
				<li>Cập nhật dữ liệu lên CSDL</li>
				<li>Hiển thị các thông tin của khách hàng sau khi cập nhật</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>Thông báo sửa thông tin thành công</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>Chỉ có khi khách đã đăng nhập tài khoản</td>
	</tr>
</table>

<h4 align="center">Đơn hàng</h4>
<table border="1px solid white">
	<tr>
		<td>Các tác nhân</td>
		<td>Khách hàng</td>
	</tr>
	<tr>
		<td>Mô tả</td>
		<td>Đơn hàng</td>
	</tr>
	<tr>
		<td>Kích hoạt</td>
		<td>Người dùng ấn vào nút “Đơn hàng” trên thanh menu</td>
	</tr>
	<tr>
		<td>Đầu vào</td>
		<td>
			<ul>
				<li>Mã khách hàng</li>
				<li>Trạng thái đơn hàng</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Trình tự xử lí</td>
		<td>
			<ul>
				<li>Chuyển sang sang trang đơn hàng</li>
				<li>Lấy thông tin trạng thái đơn hàng trên thanh địa chỉ, mã khách hàng từ phiên đăng nhập</li>
				<li>Kết nối CSDL</li>
				<li>
					Lấy thông tin về các đơn hàng của khách hàng theo trạng thái đơn hàng
					<ul>
						<li>2: Đơn hàng đang chờ xét duyệt</li>
						<li>3: Đơn hàng đang không được duyệt</li>
						<li>4: Đơn hàng đang được giao</li>
						<li>5: Đơn hàng đã giao</li>
						<li>6: Đơn hàng thành công</li>
						<li>7: Đơn hàng đã huỷ</li>
					</ul>
				</li>
				<li>Kiểm tra có đơn hàng nào của khách hàng có cùng trạng thái vừa lấy không</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Đầu ra</td>
		<td>
			<ul>
				<li>Đúng: Hiển thị ra đơn hàng</li>
				<li>Sai: Hiển thị không có đơn hàng</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Lưu ý</td>
		<td>
			<ul>
				<li>Chỉ có khi khách đã đăng nhập tài khoản</li>
				<li>Trang đăng nhập của Super Admin và Admin khác với trang của khách hàng</li>
			</ul>
		</td>
	</tr>
</table>

## 4 Thiet ke he thong

<h3>4.1 Sơ đồ quan hệ thực thể</h3>
<img src="https://github.com/maoleng/store-website/blob/huuloc/document/s%C6%A1%20%C4%91%E1%BB%93%20quan%20h%E1%BB%87%20th%E1%BB%B1c%20th%E1%BB%83.png?raw=true">

<h3>4.2 Sơ đồ cơ sở dữ liệu</h3>

<h4>Từng bảng trong cơ sở dữ liệu</h4>

<table align="center">
	<th colspan="2">Activities</th>
	<tr>
		<td>id</td>
		<td>Int primary key</td>
	</tr>
	<tr>
		<td>admin_id</td>
		<td>Int</td>
	</tr>
	<tr>
		<td>activity</td>
		<td>Varchar(50)</td>
	</tr>
	<tr>
		<td>object</td>
		<td>Varchar(50)</td>
	</tr>
	<tr>
		<td>object_name</td>
		<td>Varchar(250)</td>
	</tr>
	<tr>
		<td>time</td>
		<td>Timestamp CURRENT_TIMESTAMP</td>
	</tr>
</table>

<table align="center">
	<th colspan="2">Admins</th>
	<tr>
		<td>id</td>
		<td>Int primary key auto increment</td>
	</tr>
	<tr>
		<td>name</td>
		<td>Varchar(200)</td>
	</tr>
	<tr>
		<td>email</td>
		<td>Varchar(200) unique</td>
	</tr>
	<tr>
		<td>password</td>
		<td>Mediumtext</td>
	</tr>
	<tr>
		<td>level</td>
		<td>Tinyint(1)</td>
	</tr>
</table>

<table align="center">
	<th colspan="2">Customers</th>
	<tr>
		<td>id</td>
		<td>Int primary key auto increment</td>
	</tr>
	<tr>
		<td>name</td>
		<td>Varchar(200)</td>
	</tr>
	<tr>
		<td>gender</td>
		<td>Varchar(200)</td>
	</tr>
	<tr>
		<td>dob</td>
		<td>date</td>
	</tr>
	<tr>
		<td>email</td>
		<td>Varchar(200) unique</td>
	</tr>
	<tr>
		<td>password</td>
		<td>Varchar(200)</td>
	</tr>
	<tr>
		<td>token</td>
		<td>Varchar(200)</td>
	</tr>
</table>

<table align="center">
	<th colspan="2">receivers</th>
	<tr>
		<td>customer_id</td>
		<td>Int foreigner key(customers.id)</td>
	</tr>
	<tr>
		<td>id</td>
		<td>Int primary key</td>
	</tr>
	<tr>
		<td>name</td>
		<td>Varchar(50)</td>
	</tr>
	<tr>
		<td>phone</td>
		<td>Varchar(20)</td>
	</tr>
	<tr>
		<td>address</td>
		<td>Varchar(200)</td>
	</tr>
	<tr>
		<td>status</td>
		<td>Tinyint(1)</td>
	</tr>
</table>

<table align="center">
	<th colspan="2">manufacturers</th>
	<tr>
		<td>id</td>
		<td>Int primary key auto increment</td>
	</tr>
	<tr>
		<td>name</td>
		<td>Varchar(200)</td>
	</tr>
	<tr>
		<td>address</td>
		<td>Varchar(200)</td>
	</tr>
	<tr>
		<td>phone</td>
		<td>Varchar(15)</td>
	</tr>
	<tr>
		<td>image</td>
		<td>Varchar(200)</td>
	</tr>
</table>

<table align="center">
	<th colspan="2">products</th>
	<tr>
		<td>id</td>
		<td>Int primary key auto increment</td>
	</tr>
	<tr>
		<td>name</td>
		<td>Varchar(200)</td>
	</tr>
	<tr>
		<td>description</td>
		<td>Mediumtext</td>
	</tr>
	<tr>
		<td>price</td>
		<td>Int</td>
	</tr>
	<tr>
		<td>image</td>
		<td>Varchar(200)</td>
	</tr>
	<tr>
		<td>manufacturer_id</td>
		<td>Int foreigner key(manufacturers.id)</td>
	</tr>
</table>

<table align="center">
	<th colspan="2">types</th>
	<tr>
		<td>id</td>
		<td>Int primary key auto increment</td>
	</tr>
	<tr>
		<td>name</td>
		<td>Varchar(50)</td>
	</tr>
</table>

<table align="center">
	<th colspan="2">product_type</th>
	<tr>
		<td>product_id</td>
		<td>Int foreigner key(products.id)</td>
	</tr>
	<tr>
		<td>type_id</td>
		<td>Int foreigner key(types.id)</td>
	</tr>
</table>

<table align="center">
	<th colspan="2">receipts</th>
	<tr>
		<td>id</td>
		<td>Int primary key auto increment</td>
	</tr>
	<tr>
		<td>customer_id</td>
		<td>Int foreigner key(customers.id)</td>
	</tr>
	<tr>
		<td>order_time</td>
		<td>Timestamp CURRENT_TIMESTAMP</td>
	</tr>
	<tr>
		<td>receiver_id</td>
		<td>Int foreigner key(receivers.id)</td>
	</tr>
	<tr>
		<td>note</td>
		<td>Mediumtext</td>
	</tr>
	<tr>
		<td>status</td>
		<td>Int</td>
	</tr>
	<tr>
		<td>total</td>
		<td>Int</td>
	</tr>
</table>

<table align="center">
	<th colspan="2">receipt_detail</th>
	<tr>
		<td>receipt_id</td>
		<td>Int foreigner key(receipts.id)</td>
	</tr>
	<tr>
		<td>product_id</td>
		<td>Int foreigner key(products.id)</td>
	</tr>
	<tr>
		<td>quantity</td>
		<td>Tinyint</td>
	</tr>
</table>

<h4>Sơ đồ cơ sở dữ liệu trên PHPMyAdmin</h4>
<img src="https://github.com/maoleng/store-website/blob/huuloc/document/s%C6%A1%20%C4%91%E1%BB%93%20c%C6%A1%20s%E1%BB%9F%20d%E1%BB%AF%20li%E1%BB%87u.png?raw=true">
<h3>4.3 Sơ đồ trang web</h3>

<h4>Sơ đồ trang quản lí</h4>
<img src="https://github.com/maoleng/store-website/blob/huuloc/document/s%C6%A1%20%C4%91%E1%BB%93%20trang%20web%20qu%E1%BA%A3n%20l%C3%AD.png?raw=true">
<h4>Sơ đồ trang khách hàng</h4>
<img src="https://github.com/maoleng/store-website/blob/huuloc/document/s%C6%A1%20%C4%91%E1%BB%93%20trang%20web%20kh%C3%A1ch%20h%C3%A0ng.png?raw=true">

## 5 Ket luan
Nhóm em đã làm được cơ bản về 1 trang web bán hàng, có đầy đủ các tinh năng cần thiết để quản lí từ nhà cung cấp cho đến quản lí hóa đơn.
Hướng mở rộng mà nhóm em muốn phát triển thêm là rõ ràng hơn ở quản lí nhà cung cấp, số hàng nhập vào, tồn kho, ..
Lời cuối cùng em xin cảm ơn anh Nguyễn Nam Long đã tận tình hướng dẫn, chỉ dạy nhóm em từ lúc không biết gì cho tới lúc hoàn thành đồ án này. Em xin trân trọng cảm ơn !!

## 6 Xem demo san pham
Xem tại: <a href="https://huuloc03.000webhostapp.com/">https://huuloc03.000webhostapp.com/</a>
<br>
Tài khoản phía khách hàng có thể đăng kí để trải nghiệm <br>
Để đăng nhập phía quản lý: <a href="https://huuloc03.000webhostapp.com/admin">https://huuloc03.000webhostapp.com/admin</a> <br>
Tài khoản: admin@gmail.com <br>
Mật khẩu: qwer1234 <br>
Mong các bạn không spam dữ liệu, xin cảm ơn <br>

Chúng mình bảo vệ đồ án như thế nào ? <br>
https://www.youtube.com/watch?v=K_N9Ek6S6SY&t=1950s