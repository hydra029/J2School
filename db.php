<?php 
require 'connect.php';
$sql = "drop database quan_ly_ban_hang";
mysqli_query($connect,$sql);
$sql = "create database quan_ly_ban_hang SET utf8mb4 COLLATE utf8mb4_general_ci";
mysqli_query($connect,$sql);
mysqli_close($connect);
 ?>