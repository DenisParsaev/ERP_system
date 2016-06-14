<?php

//Проверка номера телефона

include '../include/config.php';
$phone=$_REQUEST['phone'];
$phone = substr($phone, 1);
$phone='+'.$phone.'';
$query = "SELECT * FROM `scroll_call` WHERE phone_client='".$phone."'";
$res = mysql_query($query) or die(mysql_error());

        $ok='Данный номер фигурирует в заказах:';
        while ($result = mysql_fetch_array($res))
            {
                if($result['id']!="")
                    {
                        $trim_phone_result=str_replace(" ","",$result['phone_client']);
                        $number=str_pad($result['id'], 6, '0', STR_PAD_LEFT);
                        $order.='<a href="/info_order.php?id='.$result['id'].'" target="_blank">['.$number.']</a> ';
                    }
            }
        if($order=="")
            {
                echo 'По данному номеру ничего не найдено';
            }
        else
            {
                echo ''.$ok.''.$order.'';
            }
    ?>