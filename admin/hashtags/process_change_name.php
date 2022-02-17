<?php 
require '../check_super_admin_login.php'; 

$name = $_POST['name'];
$id = $_POST['id'];

require '../connect_database.php';
$sql_select_type_name = "SELECT name FROM types WHERE id = '$id'";
$type_name_old = mysqli_fetch_array(mysqli_query($connect_database, $sql_select_type_name))['name'];

$sql_update = "UPDATE types SET name = '$name' WHERE id = '$id'";
mysqli_query($connect_database, $sql_update);

//insert vào bảng activity
$admin_id = $_SESSION['id'];
$admin_name = $_SESSION['name'];
$activity = "đổi tên";
$object = "thẻ";
$object_name = "$type_name_old thành $name" ;
require '../activity_log/insert_activity.php';


header('location:index.php');