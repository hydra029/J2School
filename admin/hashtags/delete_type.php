<?php 
require '../check_super_admin_login.php'; 

$id = $_GET['id'];

require '../connect_database.php';
$sql_select_hashtag_name = "SELECT name FROM types WHERE id = '$id'";
$object_name = mysqli_fetch_array(mysqli_query($connect_database, $sql_select_hashtag_name))['name'];

$sql_delete = "DELETE FROM types WHERE id = '$id'";
mysqli_query($connect_database, $sql_delete);

//insert vào bảng activity
$admin_id = $_SESSION['id'];
$admin_name = $_SESSION['name'];
$activity = "xóa";
$object = "thẻ";
require '../activity_log/insert_activity.php';

header('location:index.php');