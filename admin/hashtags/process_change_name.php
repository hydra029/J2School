<?php 
require '../check_super_admin_login.php'; 

$name = $_POST['name'];
$id = $_POST['id'];

require '../connect_database.php';
$sql_update = "UPDATE types SET name = '$name' WHERE id = '$id'";
mysqli_query($connect_database, $sql_update);
header('location:index.php');