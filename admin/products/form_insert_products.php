<?php require '../check_admin_login.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../index1.css">
	<link rel="stylesheet" href="../style_validate1.css">
</head>
<body>

<?php 
require '../connect_database.php';
$sql_command_select = "select * from manufacturers";
$query_sql_command_select = mysqli_query($connect_database, $sql_command_select);



 ?>


<div class="all">
	<div class="left">
		<?php require '../menu.php'; ?>
	</div> 


	<div class="right">
		<div class="top">

		</div>

		<div class = "bot">

			<div class = "header">
				<h1 class =  "header" >Thêm vào sản phẩm</h1>
			</div>
			<br>


			<?php require '../validate.php' ?>
			<form method="post" action = "process_insert_products.php" enctype="multipart/form-data" id = "form-insert-products">
				Tên sản phẩm
				<input type="text" name="name"><br>
				Mô tả
				<textarea name = "description"></textarea><br>
				Giá thành
				<input type="text" name="price"><br>
				Hình ảnh
				<input type="file" name="image"><br>
				Nhà sản xuất
				
				
				<select name = "manufacturer_id">
					<?php foreach ($query_sql_command_select as $array_manufacturers): ?>
						<option value = "<?php echo $array_manufacturers['id'] ?>">
							<?php echo $array_manufacturers['name'] ?>
						</option>
					<?php endforeach ?>
				</select>
				

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
    }, "Tên nhà sản phẩm sai định dạng");

	$.validator.addMethod("validate_price", function (value, element) {
        return this.optional(element) || /^[0-9]+$/.test(value);
    }, "Giá sản phẩm không hợp lệ");


	$("#form-insert-products").validate({
		rules: {
			"name": {
				required: true,
				minlength: 3,
				validate_name: true
			},
			"description": {
				required: true,
				minlength: 10
				
			},
			"price": {
				required: true,
				validate_price: true
			},
			"image": {
				required: true,
			}
		},
		messages: {
			"name": {
				required: "Bắt buộc nhập tên",
				minlength: "Hãy nhập ít nhất 3 ký tự"
			},
			"description": {
				required: "Bắt buộc nhập mô tả",
				minlength: "Hãy nhập ít nhất 10 ký tự"
			},
			"price": {
				required: "Bắt buộc nhập vào giá sản phẩm",
			},
			"image": {
				required: "Bắt buộc chọn hình ảnh"
			},
		}
	});
})


</script>

</body>
</html>