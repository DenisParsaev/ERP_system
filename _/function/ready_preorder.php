<?php

//Готов к отгрузке
include '../include/config.php';
$id=$_GET['id'];
$arr = explode("|", $id);
$id=$arr[0];
$manager=$arr[1];
$shop=$arr[2];

$date_add = date("d-m-y H:i:s");
$date_add=addslashes($date_add);

$query_manager_name = "SELECT login FROM `users` WHERE id='".$manager."'";
$res_manager_name = mysql_query($query_manager_name) or die(mysql_error());
$result_manager_name = mysql_fetch_array($res_manager_name);
$manager_name=$result_manager_name['login'];

$query_post = "SELECT delivery_info FROM `call_preorder` WHERE call_id='".$id."'";
$res_post = mysql_query($query_post) or die(mysql_error());
$result_post = mysql_fetch_array($res_post);
$post=$result_post['0'];
$post=explode("|", $post);
$post=$post[0];
if($post=="INTIME" || $post=="NP" || $post=="ADDRES")
    {
        if($shop=="1")
            {
                $query_stat = "UPDATE `preorder_willingness` SET `shop_one`='0' WHERE call_id='".$id."'";
                $res_stat = mysql_query($query_stat);
            }
        elseif($shop=="2")
            {
                $query_stat = "UPDATE `preorder_willingness` SET `shop_two`='0' WHERE call_id='".$id."'";
                $res_stat = mysql_query($query_stat);
            }
        elseif($shop=="3")
            {
                $query_stat = "UPDATE `preorder_willingness` SET `shop_three`='0' WHERE call_id='".$id."'";
                $res_stat = mysql_query($query_stat);
            }
        elseif($shop=="4")
            {
                $query_stat = "UPDATE `preorder_willingness` SET `shop_four`='0' WHERE call_id='".$id."'";
                $res_stat = mysql_query($query_stat);
            }

        $query_ready = "SELECT * FROM `preorder_willingness` WHERE call_id='".$id."'";
        $res_ready = mysql_query($query_ready) or die(mysql_error());
        $result_ready = mysql_fetch_array($res_ready);

        if($result_ready['shop_one']=="0" && $result_ready['shop_two']=="0" && $result_ready['shop_three']=="0" && $result_ready['shop_four']=="0")
            {
                $text="".$date_add.": ".$manager_name." указал что заказ готов";
                $query_log = "INSERT INTO log (`call_id`,`text_log`) VALUES ('".$id."','".$text."')";
                $res_log = mysql_query($query_log);

                $text="".$date_add.": ".$manager_name." указал что заказ отправлен в бланк отгрузки";
                $query_log = "INSERT INTO log (`call_id`,`text_log`) VALUES ('".$id."','".$text."')";
                $res_log = mysql_query($query_log);

                $query_stat = "UPDATE `scroll_call` SET `status`='15', `date_update`='".$date_add."', `date_ready`='".$date_add."' WHERE id='".$id."'";
                $res_stat = mysql_query($query_stat);
            }




    }
else
    {
        if($shop=="1")
            {
                $query_stat = "UPDATE `preorder_willingness` SET `shop_one`='0' WHERE call_id='".$id."'";
                $res_stat = mysql_query($query_stat);
            }
        elseif($shop=="2")
            {
                $query_stat = "UPDATE `preorder_willingness` SET `shop_two`='0' WHERE call_id='".$id."'";
                $res_stat = mysql_query($query_stat);
            }
        elseif($shop=="3")
            {
                $query_stat = "UPDATE `preorder_willingness` SET `shop_three`='0' WHERE call_id='".$id."'";
                $res_stat = mysql_query($query_stat);
            }
        elseif($shop=="4")
            {
                $query_stat = "UPDATE `preorder_willingness` SET `shop_four`='0' WHERE call_id='".$id."'";
                $res_stat = mysql_query($query_stat);
            }

        $query_ready = "SELECT * FROM `preorder_willingness` WHERE call_id='".$id."'";
        $res_ready = mysql_query($query_ready) or die(mysql_error());
        $result_ready = mysql_fetch_array($res_ready);

        if($result_ready['shop_one']=="0" && $result_ready['shop_two']=="0" && $result_ready['shop_three']=="0" && $result_ready['shop_four']=="0")
            {
                $text="".$date_add.": ".$manager_name." указал что заказ готов";
                $query_log = "INSERT INTO log (`call_id`,`text_log`) VALUES ('".$id."','".$text."')";
                $res_log = mysql_query($query_log);

                $query_stat = "UPDATE `scroll_call` SET `status`='9', `date_update`='".$date_add."', `date_ready`='".$date_add."' WHERE id='".$id."'";
                $res_stat = mysql_query($query_stat);
            }

    }



echo '<a title="" class="btn14 mr5" style="height:14px;"><img src="/images/icons/color/tick.png"/></a>';
?>