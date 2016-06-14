<?php
//Готов к отгрузке
include '../include/config.php';
$id=$_GET['id'];
$arr = explode("|", $id);
$id=$arr[0];
$manager=$arr[1];


$date_add = date("d-m-y H:i:s");
$date_add=addslashes($date_add);

$query_manager_name = "SELECT login FROM `users` WHERE id='".$manager."'";
$res_manager_name = mysql_query($query_manager_name) or die(mysql_error());
$result_manager_name = mysql_fetch_array($res_manager_name);
$manager_name=$result_manager_name['login'];

$text="".$date_add.": ".$manager_name." указал что заказ отправлен в бланк отгруки №1";
$query_log = "INSERT INTO log (`call_id`,`text_log`) VALUES ('".$id."','".$text."')";
$res_log = mysql_query($query_log);

$query_stat = "UPDATE `scroll_call` SET `status`='15', `date_update`='".$date_add."' WHERE scroll_call.status = 16";
$res_stat = mysql_query($query_stat);
echo "<script>$.jGrowl('Заказ(ы) отправлен!');</script>";
echo '<a title="" class="btn14 mr5" style="height:14px;"><img src="/images/icons/color/tick.png"/></a>';
?>