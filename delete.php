<?php 
session_start();
require 'connect.php';
$product_id = $_GET['product_id'];
$customer_id =  $_SESSION['customer_id'];
$sql = "delete from carts where product_id = '$product_id' and customer_id = '$customer_id'";
mysqli_query($connect,$sql);
mysqli_close($connect);
header('location:cart.php')
?>