<?php 
session_start();
if (isset($_SESSION['customer_id'])) {
	$customer_id = $_SESSION['customer_id'];

} else if (isset($_SESSION['admin_id'])) {
	header('location:admin/root/index_admin.php');
} else {
	header('location:index.php');
}
?>