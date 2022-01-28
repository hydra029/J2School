<?php 

$q = $_GET['q'];

require '../connect_database.php';
$sql_command_select_type = "select * from types where name like '%$q%' ";
$query_sql_select_type = mysqli_query($connect_database, $sql_command_select_type);

$array = [];
foreach ($query_sql_select_type as $each_type) {
	$array[] = $each_type;
}

echo json_encode($array);