<?php 

session_start();

if (!isset($_SESSION['level'])) {
	header('location:../index.php?error=Chưa đăng nhập');
	exit();
}
