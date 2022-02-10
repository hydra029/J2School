<?php 
require 'connect.php';
$sql = "drop database `31`";
mysqli_query($connect,$sql);
$sql = "create database `31` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";
mysqli_query($connect,$sql);
mysqli_close($connect);
 ?>