<?php
include '../include/config.php';
$number=$_POST['number'];

$query = "SELECT status FROM `scroll_call` WHERE id='".$number."'";
$res = mysql_query($query) or die(mysql_error());
$result = mysql_fetch_array($res);
$status=$result['status'];
if($status!="")
    {
        $query = "SELECT name FROM `setting_status` WHERE id='".$status."'";
        $res = mysql_query($query) or die(mysql_error());
        $result = mysql_fetch_array($res);
        echo $name=$result['name'];
    }
    else
    {
        echo 'Заказ не найден!';
    }