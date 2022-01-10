<?php 
session_start();
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$type_of_date = $_GET['type'];
require '../connect_database.php';
echo $type_of_date;
if ( $type_of_date == 'date' ) {
	$start_date = date("d-m-Y", strtotime($start_date));
	$end_date = date("d-m-Y", strtotime($end_date));
}



$sql_command_select = "select count(*) from receipts where status = 6 and ( order_time >= '$start_date' and order_time <= '$end_date' )";
$query_sql_command_select = mysqli_query($connect_database, $sql_command_select);

$count_receipts = mysqli_fetch_array($query_sql_command_select)['count(*)'];


$_SESSION['count'] = $count_receipts;

header('location:index.php');
