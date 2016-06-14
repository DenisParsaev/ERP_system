<?php
include '../include/config.php';
$id=$_REQUEST['id'];
$id=explode("|",$id);

$call_id=$id[0];
$manager=$id[1];
$date_update = date("Y-m-d H:i:s"); //Текущяя дате

$query = "UPDATE `scroll_call` SET `status`='13' WHERE `id`='".$call_id."'";
$res = mysql_query($query);

//Получение логина менеджера
$query_manager_name = "SELECT login FROM `users` WHERE id='".$manager."'";
$res_manager_name = mysql_query($query_manager_name) or die(mysql_error());
$result_manager_name = mysql_fetch_array($res_manager_name);
$manager_name=$result_manager_name['login'];

$text="".$date_update.": ".$manager_name." указал что заказ рассчитан";
$query_log = "INSERT INTO log (`call_id`,`text_log`) VALUES ('".$call_id."','".$text."')";
$res_log = mysql_query($query_log) ;

$number_id=str_pad($call_id, 6, '0', STR_PAD_LEFT);
echo "<script>$.jGrowl('Заказ [".$number_id."] рассчитан!');</script>";
echo '<a title="" class="btn14 mr5" style="height:14px;"><img src="/images/icons/color/tick.png"/></a>';