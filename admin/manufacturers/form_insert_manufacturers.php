<?php 
require '../check_super_admin_login.php';
require '../validate.php'; 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../index1.css">
	<link rel="stylesheet" href="../style_validate1.css">
</head>  
<body>

<div class="all">
	<div class="left">
		<?php require '../menu.php'; ?>
	</div> 


	<div class="right">
		<div class="top">

		</div>

		<div class = "bot">

			<div class = "header">
				<h1 class =  "header" >Thêm nhà sản xuất</h1>
			</div>
			<br>

			<form action = "process_insert_manufacturers.php" method = "post" id = "form-insert-manufactures">
				Tên nhà sản xuất
				<input type="text" name="name"><br>
				Số điện thoại
				<input type="text" name="phone"><br>
				Địa chỉ
				<textarea name = "address"></textarea><br>
				Hình ảnh
				<input type="text" name="image"><br>
				<button>Thêm</button>
			</form>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$.validator.addMethod("validate_name", function (value, element) {
        return this.optional(element) || /^[a-zA-ZaAàÀảẢãÃáÁạẠăĂằẰẳẲẵẴắẮặẶâÂầẦẩẨẫẪấẤậẬbBcCdDđĐeEèÈẻẺẽẼéÉẹẸêÊềỀểỂễỄếẾệỆ
fFgGhHiIìÌỉỈĩĨíÍịỊjJkKlLmMnNoOòÒỏỎõÕóÓọỌôÔồỒổỔỗỖốỐộỘơƠờỜởỞỡỠớỚợỢpPqQrRsStTu
UùÙủỦũŨúÚụỤưƯừỪửỬữỮứỨựỰvVwWxXyYỳỲỷỶỹỸýÝỵỴzZ 0-9]+$/.test(value);
    }, "Tên nhà sản xuất sai định dạng"); 

	$.validator.addMethod("validate_phone", function (value, element) {
        return this.optional(element) || /^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/.test(value);
    }, "Số điện thoại không hợp lệ");

	$.validator.addMethod("validate_image", function (value, element) {
        return this.optional(element) || /^[(http(s)?):\/\/(www\.)?a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)$/.test(value);
    }, "Đường dẫn tới ảnh không hợp lệ");


	$("#form-insert-manufactures").validate({
		rules: {
			"name": {
				required: true,
				minlength: 3,
				validate_name: true
			},
			"phone": {
				required: true,
				validate_phone: true
			},
			"address": {
				required: true,
				minlength: 8
				
			},
			"image": {
				required: true,
				validate_image: true
			}
		},
		messages: {
			"name": {
				required: "Bắt buộc nhập tên",
				minlength: "Hãy nhập ít nhất 3 ký tự"
			},
			"phone": {
				required: "Bắt buộc nhập số điện thoại",
			},
			"address": {
				required: "Bắt buộc nhập địa chỉ",
				minlength: "Hãy nhập ít nhất 8 ký tự"
			},
			"image": {
				required: "Bat buoc chon hinh anh"
			},
		}
	});
})


</script>

</body>
</html>