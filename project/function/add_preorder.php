<?php

//Добавление в предзаказ (это пиздец)

include '../include/config.php';

//echo '<pre>';
//print_r($_POST);
//echo '</pre>';

$price=$_GET['price'];
$id=$_GET['id'];
$manager=$_GET['manager'];
$pay=$_POST['pay'];
//full_pay - Полная оплата
//prepay - Предоплата
//without_pay - Без оплаты

//Опдата
if($pay=="full_pay")
    {
        $type_pay=$_POST['mySelect_full'];
        //check_account_full - Расчетный счет
        //vat_full - НДС
        //card_full - Карта
        //cash_full - Наличные

        if($type_pay=="check_account_full") //Полная оплата рассчетный счет
            {
                $pay_text='FULL|'.$price.'|PC';
            }
        elseif($type_pay=="vat_full") //Полная оплата НДС
            {
                $pay_text='FULL|'.$price.'|HDC';
            }
        elseif($type_pay=="card_full") //Полная оплата карта
            {
                $card=$_POST['card_full']; //Карта банка
                $pay_text='FULL|'.$price.'|CARD|'.$card.'';
            }
        elseif($type_pay=="cash_full") //Полная оплата наличка
            {
                $name_to=$_POST['name_to_cash_full']; //Получатель
                $name_to_phone=$_POST['name_to_cash_full_phone']; //Получатель телефон
                $name_from=$_POST['name_from_cash_full']; //Отправитель
                $pay_text='FULL|'.$price.'|CASH|'.$name_from.'|'.$name_to.'/'.$name_to_phone.'';
            }



    }
elseif($pay=="without_pay") // Без оплаты
    {
        $pay_text='NO_PAY';
    }
elseif($pay=="prepay") // Предоплата
    {
        $type_pay=$_POST['mySelect_prepay'];
        //check_account_prepay  - Расчетный счет
        //vat_prepay - НДС
        //card_prepay - Карта
        //cash_prepay - Наличные

        if($type_pay=="check_account_prepay") //Предоплата рассчетный счет
        {
            $sum_prepay_check=$_POST['sum_prepay_check'];//Сумма предоплаты
            $pay_text='PREPAY|'.$price.'|'.$sum_prepay_check.'|PC';
        }
        elseif($type_pay=="vat_prepay") //Предоплата НДС
        {
            $sum_prepay_vat=$_POST['sum_prepay_vat'];//Сумма предоплаты
            $pay_text='PREPAY|'.$price.'|'.$sum_prepay_vat.'|HDC';
        }
        elseif($type_pay=="card_prepay") //Предоплата карта
        {
            $card=$_POST['card_prepay']; //Карта банка
            $sum_prepay_card=$_POST['sum_prepay_card'];//Сумма предоплаты
            $pay_text='PREPAY|'.$price.'|'.$sum_prepay_card.'|CARD|'.$card.'';
        }
        elseif($type_pay=="cash_prepay") //Предоплата наличка
        {
            $sum_prepay_cash=$_POST['sum_prepay_cash'];//Сумма предоплаты
            $name_to_cash_prepay=$_POST['name_to_cash_prepay']; //Получатель
            $name_to_phone_cash_prepay=$_POST['name_to_phone_cash_prepay']; //Получатель телефон
            $name_from_cash_prepay=$_POST['name_from_cash_prepay']; //Отправитель
            $pay_text='PREPAY|'.$price.'|'.$sum_prepay_cash.'|CASH|'.$name_from_cash_prepay.'|'.$name_to_cash_prepay.'/'.$name_to_phone_cash_prepay.'';
        }
    }

//Доставка

$delivery_post=$_POST['delivery'];
// nova_post - Новая почта
// intime - Интайм
// addres - Адресная
// hitched - Попутка
// pickup - Самовывоз

if($delivery_post=="nova_post")
    {
        $nova_type=$_POST['nova_type'];
        //nova_type_otdel - Отделение
        //nova_type_addres - Адресная

        if($nova_type=="nova_type_otdel")
            {
                $name_np_otdel=$_POST['name_np_otdel']; //Имя получателя
                $phone_np_otdel=$_POST['phone_np_otdel']; //Телефон получателя
                $region_np_otdel=$_POST['region_np_otdel']; //Область
                $city_np_otdel=$_POST['city_np_otdel']; //Город
                $office_np_otdel=$_POST['office_np_otdel']; //Отделение получателя
                $order_id_np_otdel=$_POST['order_id_np_otdel']; //ИД заказа
                $weight_np_otdel=$_POST['weight_np_otdel']; //Вес заказа

                $postage_charge_np_otdel=$_POST['postage_charge_np_otdel']; //Плательщик доставки
                //sender - Отправитель
                //recipient - Получатель

                if($postage_charge_np_otdel=="recipient")
                    {
                        $price_delivery_pay_np_otdel=$_POST['price_delivery_pay_np_otdel'];
                    }
                else
                    {
                        $price_delivery_pay_np_otdel="-";
                    }

                $payment_state_np_otdel=$_POST['payment_state_np_otdel']; //Статус оплаты
                //paid - Оплачено
                //cash_np_otdel - Наложенные платеж

                if($payment_state_np_otdel=="cash_np_otdel")
                {
                    $np_cash_otdel=$_POST['np_cash_otdel'];
                }
                else
                {
                    $np_cash_otdel="-";
                }


                $delivery_text='NP|OTDEL|'.$office_np_otdel.'|'.$name_np_otdel.'/'.$phone_np_otdel.'|'.$region_np_otdel.'/'.$city_np_otdel.'|'.$order_id_np_otdel.'/'.$weight_np_otdel.'|'.$price_delivery_pay_np_otdel.'/'.$np_cash_otdel.'';
            }
        elseif($nova_type=="nova_type_addres")
            {
                $name_np_addres=$_POST['name_np_addres']; //Имя получателя
                $phone_np_addres=$_POST['phone_np_addres']; //Телефон получателя
                $region_np_addres=$_POST['region_np_addres']; //Область
                $city_np_addres=$_POST['city_np_addres']; //Город
                $addres_np_addres=$_POST['addres_np_addres']; //Отделение получателя
                $order_id_np_addres=$_POST['order_id_np_addres']; //ИД заказа
                $weight_np_addres=$_POST['weight_np_addres']; //Вес заказа

                $postage_charge_np_addres=$_POST['postage_charge_np_addres']; //Плательщик доставки
                //sender - Отправитель
                //recipient - Получатель

                if($postage_charge_np_addres=="recipient")
                {
                    $price_delivery_pay_np_addres=$_POST['price_delivery_pay_np_addres'];
                }
                else
                {
                    $price_delivery_pay_np_addres="-";
                }

                $delivery_pay_status_np_addres=$_POST['delivery_pay_status_np_addres']; //Статус оплаты
                //paid - Оплачено
                //cash_np_addres - Наложенные платеж

                if($delivery_pay_status_np_addres=="cash_np_addres")
                {
                    $np_cash_addres=$_POST['np_cash_addres'];
                }
                else
                {
                    $np_cash_addres="-";
                }

                $delivery_text='NP|ADDRES|'.$name_np_addres.'/'.$phone_np_addres.'|'.$region_np_addres.'/'.$city_np_addres.'/'.$addres_np_addres.'|'.$order_id_np_addres.'/'.$weight_np_addres.'|'.$price_delivery_pay_np_addres.'/'.$np_cash_addres.'';
            }
    }

elseif($delivery_post=="intime")
    {
        $intime_type=$_POST['intime_type'];
        //intime_type_otdel - Отделение
        //intime_type_addres - Адресная

        if($intime_type=="intime_type_otdel")
        {
            $name_intime_otdel=$_POST['name_intime_otdel']; //Имя получателя
            $phone_intime_otdel=$_POST['phone_intime_otdel']; //Телефон получателя
            $region_intime_otdel=$_POST['region_intime_otdel']; //Область
            $city_intime_otdel=$_POST['city_intime_otdel']; //Город
            $office_intime_otdel=$_POST['office_intime_otdel']; //Отделение получателя
            $order_id_intime_otdel=$_POST['order_id_intime_otdel']; //ИД заказа
            $weight_intime_otdel=$_POST['weight_intime_otdel']; //Вес заказа

            $postage_charge_intime_otdel=$_POST['postage_charge_intime_otdel']; //Плательщик доставки
            //sender - Отправитель
            //recipient - Получатель

            if($postage_charge_intime_otdel=="recipient")
            {
                $price_delivery_pay_intime_otdel=$_POST['price_delivery_pay_intime_otdel'];
            }
            else
            {
                $price_delivery_pay_intime_otdel="-";
            }

            $delivery_pay_status_intime_otdel=$_POST['delivery_pay_status_intime_otdel']; //Статус оплаты
            //paid - Оплачено
            //cash_intime_otdel - Наложенные платеж

            if($delivery_pay_status_intime_otdel=="cash_intime_otdel")
            {
                $intime_cash_otdel=$_POST['intime_cash_otdel'];
            }
            else
            {
                $intime_cash_otdel="-";
            }

            $delivery_text='INTIME|OTDEL|'.$office_intime_otdel.'|'.$name_intime_otdel.'/'.$phone_intime_otdel.'|'.$region_intime_otdel.'/'.$city_intime_otdel.'|'.$order_id_intime_otdel.'/'.$weight_intime_otdel.'|'.$price_delivery_pay_intime_otdel.'/'.$intime_cash_otdel.'';
        }
        elseif($intime_type=="intime_type_addres")
        {
            $name_intime_addres=$_POST['name_intime_addres']; //Имя получателя
            $phone_intime_addres=$_POST['phone_intime_addres']; //Телефон получателя
            $region_intime_addres=$_POST['region_intime_addres']; //Область
            $city_intime_addres=$_POST['city_intime_addres']; //Город
            $addres_intime_addres=$_POST['addres_intime_addres']; //Отделение получателя
            $order_id_intime_addres=$_POST['order_id_intime_addres']; //ИД заказа
            $weight_intime_addres=$_POST['weight_intime_addres']; //Вес заказа

            $postage_charge_intime_addres=$_POST['postage_charge_intime_addres']; //Плательщик доставки
            //sender - Отправитель
            //recipient - Получатель

            if($postage_charge_intime_addres=="recipient")
            {
                $price_delivery_pay_intime_addres=$_POST['price_delivery_pay_intime_addres'];
            }
            else
            {
                $price_delivery_pay_intime_addres="-";
            }

            $delivery_pay_status_intime_addres=$_POST['delivery_pay_status_intime_addres']; //Статус оплаты
            //paid - Оплачено
            //cash_intime_addres - Наложенные платеж

            if($delivery_pay_status_intime_addres=="cash_intime_addres")
            {
                $intime_cash_addres=$_POST['intime_cash_addres'];
            }
            else
            {
                $intime_cash_addres="-";
            }

            $delivery_text='INTIME|ADDRES|'.$name_intime_addres.'/'.$phone_intime_addres.'|'.$region_intime_addres.'/'.$city_intime_addres.'/'.$addres_intime_addres.'|'.$order_id_intime_addres.'/'.$weight_intime_addres.'|'.$price_delivery_pay_intime_addres.'/'.$intime_cash_addres.'';
        }
    }
elseif($delivery_post=="addres")
    {
        $name_addres=$_POST['name_addres']; //Имя получателя
        $phone_addres=$_POST['phone_addres']; //Телефон получателя
        $region_addres=$_POST['region_addres']; //Область
        $city_addres=$_POST['city_addres']; //Город
        $addres_addres=$_POST['addres_addres']; //Отделение получателя
        $order_id_addres=$_POST['order_id_addres']; //ИД заказа
        $weight_addres=$_POST['weight_addres']; //Вес заказа

        $postage_charge_addres=$_POST['postage_charge_addres']; //Плательщик доставки
            //sender - Отправитель
            //recipient - Получатель

            if($postage_charge_addres=="recipient")
            {
                $price_delivery_pay_addres=$_POST['price_delivery_pay_addres'];
            }
            else
            {
                $price_delivery_pay_addres="-";
            }

            $delivery_pay_status_addres=$_POST['delivery_pay_status_addres']; //Статус оплаты
            //paid - Оплачено
            //addres_post_cash - Наложенные платеж

            if($delivery_pay_status_addres=="addres_post_cash")
            {
                $addres_cash_addres=$_POST['addres_cash_addres'];
            }
            else
            {
                $addres_cash_addres="-";
            }

            $delivery_text='ADDRES|'.$name_addres.'/'.$phone_addres.'|'.$region_addres.'/'.$city_addres.'/'.$addres_addres.'|'.$order_id_addres.'/'.$weight_addres.'|'.$price_delivery_pay_addres.'/'.$addres_cash_addres.'';
    }
elseif($delivery_post=="hitched")
{
    $name_hitched=$_POST['name_hitched']; //Имя получателя
    $phone_hitched=$_POST['phone_hitched']; //Телефон получателя
    $region_hitched=$_POST['region_hitched']; //Область
    $city_hitched=$_POST['city_hitched']; //Город
    $addres_hitched=$_POST['addres_hitched']; //Отделение получателя
    $order_id_hitched=$_POST['order_id_hitched']; //ИД заказа
    $weight_hitched=$_POST['weight_hitched']; //Вес заказа


    $delivery_pay_status_hitched=$_POST['delivery_pay_status_hitched']; //Статус оплаты
    //paid - Оплачено
    //addres_post_cash - Наложенные платеж

    if($delivery_pay_status_hitched=="hitched_post_cash")
    {
        $hitched_cash_addres=$_POST['hitched_cash_addres'];
    }
    else
    {
        $hitched_cash_addres="-";
    }

    $delivery_text='HITCHED|'.$name_hitched.'/'.$phone_hitched.'|'.$region_hitched.'/'.$city_hitched.'/'.$addres_hitched.'|'.$order_id_hitched.'/'.$weight_hitched.'|/'.$hitched_cash_addres.'';
}
elseif($delivery_post=="pickup")
{
    $name_pickup=$_POST['name_pickup']; //Имя получателя
    $phone_pickup=$_POST['phone_pickup']; //Телефон получателя
    $order_id_pickup=$_POST['order_id_pickup']; //Область
    $weight_pickup=$_POST['weight_pickup']; //Город

    if($delivery_pay_status_pickup=="pickup_post_cash")
    {
        $pickup_cash_addres=$_POST['pickup_cash_addres'];
    }
    else
    {
        $pickup_cash_addres="-";
    }

    $delivery_text='PICKUP|'.$name_pickup.'/'.$phone_pickup.'|'.$order_id_addres.'/'.$weight_addres.'';

}

$contractq=$_POST['contract'];
if($contractq=="with_contract"){
	$contract = 2;
}
else{
	$contract = 1;
}

$date_add = date("d-m-y H:i:s");
$date_add=addslashes($date_add);
$pay_text=addslashes($pay_text);
$delivery_text=addslashes($delivery_text);
$date_manufactured=$_POST['date_manufactured'];


$query = "INSERT INTO call_preorder (`call_id`,`date_add`,`pay_info`,`delivery_info`, `date_manufacture`,`contract`) VALUES ('".$id."','".$date_add."','".$pay_text."','".$delivery_text."','".$date_manufactured."','".$contract."')";
$res = mysql_query($query) ;


$query_manager_name = "SELECT login FROM `users` WHERE id='".$manager."'";
$res_manager_name = mysql_query($query_manager_name) or die(mysql_error());
$result_manager_name = mysql_fetch_array($res_manager_name);
$manager_name=$result_manager_name['login'];

$text="".$date_add.": Менеджер ".$manager_name." оформил предзаказ";
$query_log = "INSERT INTO log (`call_id`,`text_log`) VALUES ('".$id."','".$text."')";
$res_log = mysql_query($query_log);

$query_stat = "UPDATE `scroll_call` SET `status`='8', `date_update`='".$date_add."' WHERE id='".$id."'";
$res_stat = mysql_query($query_stat);

$query_preorder = "UPDATE `scroll_call` SET `date_preorder`='".$date_add."' WHERE id='".$id."'";
$res_preorder = mysql_query($query_preorder);

$comment=$_POST['comment'];
if($comment!="")
{
$query = "INSERT INTO coment_call (`call_id`,`manager`,`coment`) VALUES ('".$id."','".$manager."','".$comment."')";
$res = mysql_query($query);
}



if($res==1)
{
    echo '<center><div class="nNote nSuccess hideit" style="width:100%;"><p><strong>Успех: </strong>Предзаказ успешно оформлен!</p></div></center>';
}
else
    {
        echo mysql_error();
    echo '<center><div class="nNote nFailure  hideit" style="width:100%;"><p><strong>Ошибка: </strong>Свяжитесь с администратором!</p></div></center>';
}
?>