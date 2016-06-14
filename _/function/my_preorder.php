<?php
session_start();
include '../include/config.php';
$call_id=$_REQUEST['call_id'];
$id=$_REQUEST['id'];
$manager=$_SESSION['id'];
$sum_prepay=$_REQUEST['sum_prepay'];
$date_confirmation=date("d-m-Y H:i:s");


$query = "UPDATE `scroll_call` SET `sum_prepay`='".$sum_prepay."'  WHERE `id`='".$call_id."'";
$res = mysql_query($query) ;

$query = "UPDATE `table_prepay` SET `call_id`='".$call_id."',`manager_id`='".$manager."',`date_confirmation`='".$date_confirmation."',`status`='1' WHERE `id`='".$id."'";
$res = mysql_query($query) ;

echo "<script>$.jGrowl('Предоплата успешно подтверждена!');</script>";


?>