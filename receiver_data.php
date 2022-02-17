<?php
session_start();
require 'connect.php';
$customer_id = $_SESSION['customer_id'];
$id = $_POST['id'];
$sql = "select * from receivers where id = '$id' and customer_id = '$customer_id'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
echo json_encode($each);
exit;
?>
