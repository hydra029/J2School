<?php 

$max_day_of_this_month_to_get = $_GET['days'];

require '../connect_database.php';
$sql_command_select = "
	SELECT sum(total_price) as 'cash_each_day', DATE_FORMAT(order_time, '%e-%m') as 'day'
	FROM receipts
	WHERE DATE(order_time) >= (CURDATE() - INTERVAL '$max_day_of_this_month_to_get' DAY)
	GROUP BY DATE_FORMAT(order_time, '%d-%m')
";

$query_sql_command_select = mysqli_query($connect_database, $sql_command_select);
$array = [];

$day_today = date('d');
$this_month = date('m');

if ( $max_day_of_this_month_to_get > $day_today ) {
	$get_days_last_month = $max_day_of_this_month_to_get - $day_today;
	$previous_month = date("m",strtotime("-1 month"));
	$max_day_of_previous_month = date("t", strtotime($previous_month));
	$start_day_of_last_month = $max_day_of_previous_month - $get_days_last_month;	

	for ( $i = $start_day_of_last_month; $i <= $max_day_of_previous_month; $i++ ) {
		$index = $i . '-' . $previous_month;
		$array[$index] = 0;
	}
	$start_day_of_this_month = 1;
} else {
	$start_day_of_this_month = $day_today - $max_day_of_this_month_to_get;
}



for ( $i = $start_day_of_this_month; $i <= $day_today; $i++ ) {
	$index = $i . '-' . $this_month;
	$array[$index] = 0;
}
foreach ($query_sql_command_select as $array_cash_each_day ) {
	$array[$array_cash_each_day['day']] = (float)$array_cash_each_day['cash_each_day'];
}

echo json_encode($array);
 ?>