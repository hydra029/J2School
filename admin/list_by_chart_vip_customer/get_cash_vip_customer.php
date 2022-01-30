<?php 

require '../connect_database.php';
$sql_select = "
	SELECT customers.name as 'name', sum(receipts.total_price) as 'cash'
	FROM receipts
	JOIN customers on customers.id = receipts.customer_id
	GROUP BY customers.id
";
$query_sql_select = mysqli_query($connect_database, $sql_select);
$array = [];

foreach ($query_sql_select as $each_customer) {
	$index = $each_customer['name'];
	$array[$index] = (float)$each_customer['cash'];
}
echo json_encode($array);