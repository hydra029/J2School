<?php 
require '../check_super_admin_login.php';

$id = $_GET['id'];

require '../connect_database.php';
$sql_delete_admin = "DELETE FROM admins WHERE id = '$id' ";

$query_sql_delete_admin = mysqli_query($connect_database, $sql_delete_admin);

header('location:index.php');