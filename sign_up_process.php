<?php 
session_start();
require 'connect.php';
$name = $_POST['name'];

$gender = $_POST['gender'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$password = $_POST['password'];


$sql = "insert into customers(name, gender, dob, email, password, token)
values ('$name', '$gender', '$dob', '$email', '$password', '')";
$result = mysqli_query($connect,$sql);
$sql = "select * from customers where email = '$email' and password = '$password'";
$result = mysqli_query($connect,$sql);
$rows = mysqli_num_rows($result);
$customer = mysqli_fetch_array($result);
$id = $customer['id'];

$token = '';
$_SESSION['customer_id'] = $customer['id'];
$_SESSION['customer_name'] = $name;
$sql = "update customers
set
token = '$token'
where
id = '$id'";
mysqli_query($connect,$sql);
setcookie('remember', $token, time() + 60*60*24);   
echo 1;

?>