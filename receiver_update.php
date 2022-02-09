<?php
require 'connect.php';
$customer_id = $_SESSION['customer_id'];
$page = $_SESSION['page'];

$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$sql = "update receivers 
set 
name = '$name',
phone = '$phone',
address = '$address'
where
id = '$id' and customer_id = '$customer_id'";
mysqli_query($connect,$sql);
echo 1;

?>