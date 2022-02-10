<?php 
require '../check_super_admin_login.php'; 

$id = $_GET['id'];

require '../connect_database.php';
$sql_delete = "DELETE FROM types WHERE id = '$id'";
mysqli_query($connect_database, $sql_delete);
header('location:index.php');