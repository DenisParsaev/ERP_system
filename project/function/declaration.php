<?php
include '../include/config.php';
$nubmer=$_REQUEST['nubmer'];
$id=$_REQUEST['id'];

if($nubmer!="")
{
    $nubmer=explode("|", $nubmer);
    $id=explode("|", $id);
    $date_update = date("d-m-y H:i:s"); //Текущяя дате


    $declaration=$nubmer[0];
    $cost_delivery=$nubmer[1];
    $call_id=$id[0];
    $manager=$id[1];

    $number_id=str_pad($call_id, 6, '0', STR_PAD_LEFT);

    $query = "UPDATE `scroll_call` SET `status`='10', `decration`='".$declaration."',`cost_delivery`='".$cost_delivery."' WHERE `id`='".$call_id."'";
    $res = mysql_query($query) ;

//Получение логина менеджера
    $query_manager_name = "SELECT login FROM `users` WHERE id='".$manager."'";
    $res_manager_name = mysql_query($query_manager_name) or die(mysql_error());
    $result_manager_name = mysql_fetch_array($res_manager_name);
    $manager_name=$result_manager_name['login'];

    $text="".$date_update.": ".$manager_name." указал что заказ отправлен";
    $query_log = "INSERT INTO log (`call_id`,`text_log`) VALUES ('".$call_id."','".$text."')";
    $res_log = mysql_query($query_log) ;

    echo "<script>$.jGrowl('Заказ [".$number_id."] отправлен!');</script>";
    echo '<a title="" class="btn14 mr5" style="height:14px;"><img src="/images/icons/color/tick.png"/></a>';
}
else
{
    $id=explode("|", $id);
    $call_id=$id[0];
    $manager=$id[1];
    $date_update = date("d-m-y H:i:s"); //Текущяя дате

    $query = "UPDATE `scroll_call` SET `status`='10' WHERE `id`='".$call_id."'";
    $res = mysql_query($query);

//Получение логина менеджера
    $query_manager_name = "SELECT login FROM `users` WHERE id='".$manager."'";
    $res_manager_name = mysql_query($query_manager_name) or die(mysql_error());
    $result_manager_name = mysql_fetch_array($res_manager_name);
    $manager_name=$result_manager_name['login'];

    $text="".$date_update.": ".$manager_name." указал что заказ отправлен";
    $query_log = "INSERT INTO log (`call_id`,`text_log`) VALUES ('".$call_id."','".$text."')";
    $res_log = mysql_query($query_log) ;

    $number_id=str_pad($call_id, 6, '0', STR_PAD_LEFT);
    echo "<script>$.jGrowl('Заказ [".$number_id."] отправлен!');</script>";
    echo '<a title="" class="btn14 mr5" style="height:14px;"><img src="/images/icons/color/tick.png"/></a>';
}


?>