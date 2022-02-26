<?php require '../check_super_admin_login.php'; ?>
<?php 

if ( isset($_GET['days']) ) {
	$max_day_of_this_month_to_get = $_GET['days'];
	$sql_command_select = "
	SELECT products.id as 'ma_san_pham', products.name as 'ten_san_pham', sum(receipt_detail.quantity) as 'so_san_pham_ban_duoc', DATE_FORMAT(order_time, '%e-%m') as 'ngay_ban'
	FROM receipts
	join receipt_detail on receipt_detail.receipt_id = receipts.id
	join products on products.id = receipt_detail.product_id
	WHERE DATE(order_time) >= (CURDATE() - INTERVAL '$max_day_of_this_month_to_get' DAY)
	GROUP BY products.id, DATE_FORMAT(order_time, '%d-%m')
";
}

if ( isset($_GET['day_to_day_1'], $_GET['day_to_day_2']) ) {	
	$day_to_day_1 = $_GET['day_to_day_1'];
	$day_to_day_2 = $_GET['day_to_day_2'];
	$sql_command_select = "
	SELECT products.id as 'ma_san_pham', products.name as 'ten_san_pham', sum(receipt_detail.quantity) as 'so_san_pham_ban_duoc', DATE_FORMAT(order_time, '%e-%m') as 'ngay_ban'
	FROM receipts
	join receipt_detail on receipt_detail.receipt_id = receipts.id
	join products on products.id = receipt_detail.product_id
	WHERE order_time >= '$day_to_day_1' and order_time <= '$day_to_day_2'
	GROUP BY products.id, DATE_FORMAT(order_time, '%d-%m')
";

}
if ( isset($_GET['month']) ) {
	$month = $_GET['month'];
	$max_day_of_month = date("t", strtotime($month));
	$day_1 = $month . '-01';
	$day_2 = $month . '-' . $max_day_of_month;
	$sql_command_select = "
	SELECT products.id as 'ma_san_pham', products.name as 'ten_san_pham', sum(receipt_detail.quantity) as 'so_san_pham_ban_duoc', DATE_FORMAT(order_time, '%e-%m') as 'ngay_ban'
	FROM receipts
	join receipt_detail on receipt_detail.receipt_id = receipts.id
	join products on products.id = receipt_detail.product_id
	WHERE order_time >= '$day_1' and order_time <= '$day_2'
	GROUP BY products.id, DATE_FORMAT(order_time, '%d-%m')
";

}


require '../connect_database.php';




$query_sql_command_select = mysqli_query($connect_database, $sql_command_select);

$day_today = date('d');

// if ( $max_day_of_this_month_to_get > $day_today ) {
// 	$get_days_last_month = $max_day_of_this_month_to_get - $day_today;
// 	$previous_month = date("m",strtotime("-1 month"));
// 	$max_day_of_previous_month = date("t", strtotime($previous_month));
// 	$start_day_of_last_month = $max_day_of_previous_month - $get_days_last_month;	

	
// 	$start_day_of_this_month = 1;
// } else {
// 	$start_day_of_this_month = $day_today - $max_day_of_this_month_to_get;
// }

$array = [];

foreach ($query_sql_command_select as $array_product_each_day ) {
	$product_id = $array_product_each_day['ma_san_pham'];
	if ( empty($array[$product_id]) ) {
		$array[$product_id] = [
			'name' => $array_product_each_day['ten_san_pham'],
			'y' => (int)$array_product_each_day['so_san_pham_ban_duoc'],
			'drilldown' => (int)$array_product_each_day['ma_san_pham']
		];
	} else {
		$array[$product_id]['y'] += (int)$array_product_each_day['so_san_pham_ban_duoc'];
	}
}

$array_detail = [] ;

foreach ($array as $product_id => $each_product) {
	$array_detail[$product_id] = [
		'name' => $each_product['name'],
		'id' => $product_id
	];
	$array_detail[$product_id]['data'] = [];
}

foreach ($query_sql_command_select as $each_product) {
	$product_id = $each_product['ma_san_pham'];
	$key = $each_product['ngay_ban'];
	$array_detail[$product_id]['data'][$key] =[
		$key,
		(int)$each_product['so_san_pham_ban_duoc']
	];
}

$object = json_encode([$array, $array_detail]);
echo $object;
?>