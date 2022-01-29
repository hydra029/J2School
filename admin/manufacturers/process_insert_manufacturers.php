<?php

require '../check_super_admin_login.php';

 ?>

<?php 

if (empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['address']) || empty($_POST['image'])){
	$_SESSION['error'] = 'Chưa nhập đầy đủ thông tin';
	header('location:form_insert_manufacturers.php');
	exit;
}

$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$image = $_POST['image'];

require '../connect_database.php';

$sql_command_insert = "insert into manufacturers (name, phone, address, image)
values ('$name', '$phone', '$address', '$image')";
mysqli_query($connect_database, $sql_command_insert);

//insert vào bảng activity
$sql_select_last_id_activity = "
	SELECT id from activities 
	ORDER BY id DESC
	LIMIT 1
";
$last_activity_id = mysqli_fetch_array(mysqli_query($connect_database, $sql_select_last_id_activity))['id'];
$activity_id = $last_activity_id + 1;
$person = $_SESSION['name'];
$activity_log = "$person đã thêm nhà sản xuất $name" ;
$sql_insert_activities = "
	INSERT INTO activities(id, activity)
	VALUES('$activity_id', '$activity_log')
";

mysqli_query($connect_database, $sql_insert_activities);


//kiểm tra xem có lỗi
$error = mysqli_error($connect_database);
mysqli_close($connect_database);
if (empty($error)) {
	$_SESSION['success'] = 'Thêm nhà sản xuất thành công';
	header('location:index_manufacturers.php');	
}else {
	$_SESSION['error'] = 'Lỗi truy vấn';
	header('location:index_manufacturers.php');	
}
 
 ?>