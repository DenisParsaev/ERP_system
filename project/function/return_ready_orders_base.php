<?php
//Готов к отгрузке
include '../include/config.php';
$id=$_GET['id'];
$arr = explode("|", $id);
$id=$arr[0];
$manager=$arr[1];
$shop=$arr[2];

$date_add = date("Y-m-d H:i:s");
$date_add=addslashes($date_add);

$query_manager_name = "SELECT login FROM `users` WHERE id='".$manager."'";
$res_manager_name = mysql_query($query_manager_name) or die(mysql_error());
$result_manager_name = mysql_fetch_array($res_manager_name);
$manager_name=$result_manager_name['login'];

$text="".$date_add.": ".$manager_name." отклонил готовый заказ";
$query_log = "INSERT INTO log (`call_id`,`text_log`) VALUES ('".$id."','".$text."')";
$res_log = mysql_query($query_log);

$query_stat = "UPDATE `scroll_call` SET `status`='14', `date_update`='".$date_add."' WHERE id='".$id."'";
$res_stat = mysql_query($query_stat);

echo '<a title="" class="btn14 mr5" style="height:14px;"><img src="/images/icons/color/tick.png"/></a>';
?>