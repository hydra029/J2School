<?php 
session_start();
require 'connect.php';
$name = $_POST['name'];

$gender = $_POST['gender'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$password = $_POST['password'];

//name_check
$name_regex = "/^[A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹ]*(?:[ ][A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹ]*)*$/";
if (preg_match($name_regex, $name) == 0) {
    $_SESSION['error'] = 'Tên không hợp lệ';
    header("location:sign_up.php");
    exit;
}
//email_check
$email_regex = "/^\w([\.]?\w)*@[a-z]*\.[a-z]*/";
if (preg_match($email_regex, $email) == 0) {
    $_SESSION['error'] = 'Email không hợp lệ';
    header("location:sign_up.php");
    exit;
}
//password_check
$password_regex = "/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8})/";
if (preg_match($password_regex, $password) == 0) {
    $_SESSION['error'] = 'Mật khẩu ít nhất 8 kí tự, bao gồm chữ hoa, chữ thường, số';
    header("location:sign_up.php");
    exit;
}

$sql = "insert into customers(name, gender, dob, email, password, token)
values ('$name', '$gender', '$dob', '$email', '$password', '')";
$result = mysqli_query($connect,$sql);
mysqli_close($connect);
$_SESSION['success'] = 'Đăng ký thành công';
header('location:sign_in.php');

?>