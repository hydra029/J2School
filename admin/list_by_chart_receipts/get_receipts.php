<?php 

$max_day_of_this_month_to_get = $_GET['days'];

require '../connect_database.php';
$sql_command_select = "
	SELECT status, round((count(*) * 100.0 / sum(count(status)) over()), 2) as 'percent'
	FROM receipts 
	WHERE DATE(order_time) >= (CURDATE() - INTERVAL '$max_day_of_this_month_to_get' DAY)	
	GROUP BY receipts.status;
";

$query_sql_command_select = mysqli_query($connect_database, $sql_command_select);
$array = [];

foreach ($query_sql_command_select as $each_receipt) {
	$array[$each_receipt['status']] = [
		'name' => $each_receipt['status'],
		'y' => (float)$each_receipt['percent']
	];
}


echo json_encode($array);

 ?>