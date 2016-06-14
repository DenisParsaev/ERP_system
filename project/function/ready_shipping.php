<?php
include '../include/config.php';
$content=$_REQUEST['id'];
$content=explode("|", $content);

$date_add = date("d-m-y H:i:s");
$date_add=addslashes($date_add);

$id=$content[0];
$manager_id=$content[1];
$post=$content[2];
$number_id=str_pad($id, 6, '0', STR_PAD_LEFT);

if($post=="ADDRES")
        $query = "UPDATE `scroll_call` SET `status`='15', `date_update`='".$date_add."', `date_shipped`='".$date_add."'  WHERE `id`='".$id."'";
        $res = mysql_query($query) ;

        $query_manager_name = "SELECT login FROM `users` WHERE id='".$manager_id."'";
        $res_manager_name = mysql_query($query_manager_name) or die(mysql_error());
        $result_manager_name = mysql_fetch_array($res_manager_name);
        $manager_name=$result_manager_name['login'];

        $text="".$date_add.": ".$manager_name." указал что заказ готов к отгрузке";
        $query_log = "INSERT INTO log (`call_id`,`text_log`) VALUES ('".$id."','".$text."')";
        $res_log = mysql_query($query_log);

        echo "<script>$.jGrowl('Заказ [".$number_id."] готов к отгрузке!');</script>";
        echo '<a title="" class="btn14 mr5" style="height:14px;"><img src="/images/icons/color/tick.png"/></a>';
    }
    elseif($post=="PICKUP")
    {
        $query = "UPDATE `scroll_call` SET `status`='10', `date_update`='".$date_add."', `date_shipped`='".$date_add."'  WHERE `id`='".$id."'";
        $res = mysql_query($query) ;

        $query_manager_name = "SELECT login FROM `users` WHERE id='".$manager_id."'";
        $res_manager_name = mysql_query($query_manager_name) or die(mysql_error());
        $result_manager_name = mysql_fetch_array($res_manager_name);
        $manager_name=$result_manager_name['login'];

        $text="".$date_add.": ".$manager_name." указал что заказ отгружен";
        $query_log = "INSERT INTO log (`call_id`,`text_log`) VALUES ('".$id."','".$text."')";
        $res_log = mysql_query($query_log);

        echo "<script>$.jGrowl('Заказ [".$number_id."] отгружен!');</script>";
        echo '<a title="" class="btn14 mr5" style="height:14px;"><img src="/images/icons/color/tick.png"/></a>';
    }
?>