<?php 
session_start();
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$type_of_date = $_GET['type'];
require '../connect_database.php';

$start_day_month_year = date("Y-m-d", strtotime($start_date));
$end_day_month_year = date("Y-m-d", strtotime($end_date));

$sql_command_select = "SELECT sum(total_price) as 'tong_tien' from receipts
	where status = 6
	and order_time >= '$start_day_month_year'
	and order_time <= '$end_day_month_year'
";

$query_sql_command_select = mysqli_query($connect_database, $sql_command_select);

$money = mysqli_fetch_array($query_sql_command_select)['tong_tien'];

//lưu vào session để hiển thị cho trang index


if ( $type_of_date == 'date' ) {
	$_SESSION['cash_count_by_date'] = $money;	
	$_SESSION['cash_start_date'] = $start_date;
	$_SESSION['cash_end_date'] = $start_date;
}

if ( $type_of_date == 'month' ) {
	$_SESSION['cash_count_by_month'] = $money;	
	$_SESSION['cash_start_year_month'] = date("Y-m", strtotime($start_date));
	$_SESSION['cash_end_year_month'] = date("Y-m", strtotime($end_date));
}

if ( $type_of_date == 'week' ) {
	$_SESSION['cash_count_by_week'] = $money;	
	$_SESSION['cash_start_year_week'] = date("Y-", strtotime($start_date)) . "W" . date("W", strtotime($start_date));
	$_SESSION['cash_end_year_week'] = date("Y-", strtotime($start_date)) . "W" . date("W", strtotime($end_date));
}


header('location:index.php');
