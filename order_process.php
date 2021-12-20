<?php 
session_start();
require 'connect.php';
$customer_id = $_SESSION['customer_id'];
$sql = "select * from carts where customer_id = '$customer_id'";
$result = mysqli_query($connect,$sql);
$cart = mysqli_fetch_array($result);
 
$sql = "insert into orders(id"
 ?>