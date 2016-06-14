<?php

//Заказ выполнен

include '../include/config.php';
$id=$_GET['id'];
$manager=$_GET['manager'];

$date_add = date("Y-m-d H:i:s");
$date_add=addslashes($date_add);

$query_manager_name = "SELECT login FROM `users` WHERE id='".$manager."'";
$res_manager_name = mysql_query($query_manager_name) or die(mysql_error());
$result_manager_name = mysql_fetch_array($res_manager_name);
$manager_name=$result_manager_name['login'];

$text="".$date_add.": Менеджер ".$manager_name." закрыл заказ";
$query_log = "INSERT INTO log (`call_id`,`text_log`) VALUES ('".$id."','".$text."')";
$res_log = mysql_query($query_log);

$query_stat = "UPDATE `scroll_call` SET `status`='11', `date_update`='".$date_add."' WHERE id='".$id."'";
$res_stat = mysql_query($query_stat);

echo '<script language="JavaScript">window.location.href = "/preorder_list.php"</script>';