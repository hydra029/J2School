<?php 

$id = $_GET['id'];
$status = $_GET['status'];

require '../connect_database.php';

if ($status == 3) {
	$sql_command_update = "update receipts set status = 3 where id = $id";
	mysqli_query($connect_database, $sql_command_update);
} else if ($status == 5 ) {
	$sql_command_update = "update receipts set status = 5 where id = $id";
	mysqli_query($connect_database, $sql_command_update);
} else if ($status == 6 ) {
	$sql_command_update = "update receipts set status = 6 where id = $id";
	mysqli_query($connect_database, $sql_command_update);
}


