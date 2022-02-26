<?php 
require 'connect.php';
$receipt_id = $_GET['receipt_id'];
$customer_id = $_SESSION['customer_id'];
$sql = "select receiver.*, receipts.note from receivers join receipts on receipts.id = receivers.receipt_id where customer_id = '$customer_id' and receipt_id = '$receipt_id'";
$result = mysqli_query($connect,$sql);
?>