<?php 
require '../check_admin_login.php';
$q = $_GET['q'];

require '../connect_database.php';
$sql_select = "SELECT * FROM TYPES WHERE name like '%$q%'";
$query_sql_select = mysqli_query($connect_database, $sql_select);

$array = [];
foreach ($query_sql_select as $each_type) {
	$array[] = $each_type;
}

echo json_encode($array);