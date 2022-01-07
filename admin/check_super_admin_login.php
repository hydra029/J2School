<?php 
session_start();

// if (!isset($_SESSION['level']) || $_SESSION['level'] !== 1) {
if (empty($_SESSION['level'])) {
	header('location:../index.php?error=Chưa đăng nhậpp');
	exit();
}
