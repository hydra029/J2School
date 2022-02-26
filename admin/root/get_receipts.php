<?php require '../check_admin_login.php' ?>
<?php 

if ( isset($_GET['days']) ) {
	$max_day_of_this_month_to_get = $_GET['days'];
	$sql_command_select = "
		SELECT status, round((count(*) * 100.0 / sum(count(status)) over()), 2) as 'percent'
		FROM receipts 
		WHERE DATE(order_time) >= (CURDATE() - INTERVAL '$max_day_of_this_month_to_get' DAY)	
		GROUP BY receipts.status;
	"; 
}

if ( isset($_GET['day_to_day_1'], $_GET['day_to_day_2']) ) {	
	$day_to_day_1 = $_GET['day_to_day_1'];
	$day_to_day_2 = $_GET['day_to_day_2'];
	$sql_command_select = "
		SELECT status, round((count(*) * 100.0 / sum(count(status)) over()), 2) as 'percent'
		FROM receipts 
		WHERE order_time >= '$day_to_day_1' and order_time <= '$day_to_day_2'
		GROUP BY receipts.status;
	";
}

if ( isset($_GET['month']) ) {
	$month = $_GET['month'];
	$max_day_of_month = date("t", strtotime($month));
	$day_1 = $month . '-01';
	$day_2 = $month . '-' . $max_day_of_month;
	$sql_command_select = "
		SELECT status, round((count(*) * 100.0 / sum(count(status)) over()), 2) as 'percent'
		FROM receipts 
		WHERE order_time >= '$day_1' and order_time <= '$day_2'
		GROUP BY receipts.status;
	"; 
}

require '../connect_database.php';

$query_sql_command_select = mysqli_query($connect_database, $sql_command_select);
$array = [];

foreach ($query_sql_command_select as $each_receipt) {
	switch ($each_receipt['status']) {
		case 2:
			$status_name = "Đơn hàng đang chờ xét duyệt";
			break;
		case 3:
			$status_name = "Đơn hàng không được duyệt";
			break;
		case 4:
			$status_name = "Đơn hàng đang giao";
			break;
		case 5:
			$status_name = "Đơn hàng đã giao";
			break;
		case 6:
			$status_name = "Đơn hàng thành công";
			break;
		case 7:
			$status_name = "Đơn hàng khách hàng hủy";
			break;
		case 1:
			$status_name = "Đơn hàng đang trong giỏ";
			break;
	}
	$array[$each_receipt['status']] = [
		'name' => $status_name,
		'y' => (float)$each_receipt['percent']
	];
}

echo json_encode($array);

 ?>