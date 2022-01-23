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
$id = $_GET['id'];

//kiểm tra id nhập vào có đúng
$sql_command_select = "select * from products where id = '$id' ";
$query_sql_command_select = mysqli_query($connect_database, $sql_command_select);
$array_products = mysqli_fetch_array($query_sql_command_select);
$check = mysqli_num_rows($query_sql_command_select);
if ( $check !== 1 ) {
	echo $check;
	$_SESSION['error'] = 'Sai id sẩn phẩm';
	header('location:index_products.php');
	exit();
}


$sql_command_select_products = "select * from products where id = '$id' ";
$query_sql_command_select_products = mysqli_query($connect_database, $sql_command_select_products);

$sql_command_select_manufacturers = "select * from manufacturers";
$query_sql_command_select_manufacturers = mysqli_query($connect_database, $sql_command_select_manufacturers);

$array_products = mysqli_fetch_array($query_sql_command_select_products);


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
				<h1 class =  "header" >Sửa sản phẩm</h1>
			</div>
			<br>


			<form method="post" action = "process_update_products.php" enctype="multipart/form-data" id ="form-update-products">
				<input type="" name="id" value = "<?php echo $array_products['id'] ?>" hidden>
				Tên sản phẩm
				<input type="text" name="name" value = "<?php echo $array_products['name'] ?>"><br>
				Mô tả
				<textarea name = "description"><?php echo $array_products['description'] ?></textarea><br>
				Giá thành
				<input type="text" name="price" value = "<?php echo $array_products['price'] ?>"><br>
				Đổi ảnh mới
				<input type="file" name="image_new"><br>
				Hoặc giữ hình ảnh cũ
				<img src="<?php echo $array_products['image'] ?>" width = "100px"><br>
				<input type="hidden" name="image_old" value="<?php echo $array_products['image'] ?>"><br>
				Nhà sản xuất
				
				
				<select name = "manufacturer_id">
					<?php foreach ($query_sql_command_select_manufacturers as $array_manufacturers): ?>
						<option 
							value = "<?php echo $array_manufacturers['id'] ?>"
							<?php if($array_products['manufacturer_id'] == $array_manufacturers['id']) { ?>
							selected
							<?php } ?>
						>
							<?php echo $array_manufacturers['name'] ?>
						</option>
					<?php endforeach ?>
				</select>
				
				<button>Sửa</button>

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


	$("#form-update-products").validate({
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