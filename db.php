<?php 
require 'connect.php';
$sql = "drop database quan_ly_ban_hang";
mysqli_query($connect,$sql);
$sql = "create database quan_ly_ban_hang";
mysqli_query($connect,$sql);
mysqli_close($connect);
 ?>