<?php
//print_r($_POST);
include '../include/config.php';

$explanatory=$_POST['explanatory'];
$id=$_POST['call_id'];
$date_update = date("Y-m-d H:i:s");
$manager=$_POST['user'];

$query = "UPDATE `scroll_call` SET `explanatory`='".$explanatory."', `date_update`='".$date_update."' WHERE id='".$id."'";
$res = mysql_query($query) or die(mysql_error());

$query_manager_name = "SELECT login FROM `users` WHERE id='".$manager."'";
$res_manager_name = mysql_query($query_manager_name) or die(mysql_error());
$result_manager_name = mysql_fetch_array($res_manager_name);
$manager_name=$result_manager_name['login'];

$text="".$date_update.": ".$manager_name." написал объяснительную";
$query_log = "INSERT INTO log (`call_id`,`text_log`) VALUES ('".$id."','".$text."')";
$res_log = mysql_query($query_log);

echo "<script>$.jGrowl('Объяснительная успешно отправлена!');</script>";