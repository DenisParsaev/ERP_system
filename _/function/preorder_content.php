<?php
echo '<pre>';
print_r($_POST);
echo '</pre>';

$prepay=$_REQUEST['prepay']; //Статус предоплаты
$full_cost=$_REQUEST['full_cost']; //Общая сумма
$call_id=$_REQUEST['call_id']; //ID звонка

if($prepay=='prepay_yes')
    {
        $preorder_way=$_REQUEST['prepay_way'];

        if($preorder_way=='vat') //Оплата НДС
            {
                $percent_vat=$_REQUEST['percent_vat']; //Процент НДС
                $prepay_sum=$_REQUEST['prepay_sum']; //Сумма предоплаты
                $query = "INSERT INTO preorder_prepay (`call_id`,`type`,`percent_vat`,`prepay_sum`,`full_sum`) VALUES('".$call_id."','".$preorder_way."','".$percent_vat."','".$prepay_sum."','".$full_cost."')";
            }
        elseif($preorder_way=='check') //Оплата РС
            {
                $number_check=$_REQUEST['number_check']; //Номер счета
                $prepay_sum=$_REQUEST['prepay_sum']; //Сумма предоплаты
                $query = "INSERT INTO preorder_prepay (`call_id`,`type`,`number_check`,`prepay_sum`,`full_sum`) VALUES('".$call_id."','".$preorder_way."','".$number_check."','".$prepay_sum."','".$full_cost."')";
            }
        elseif($preorder_way=='card') //Оплата картой
            {
                $card=$_REQUEST['card']; //Номер карты
                $prepay_sum=$_REQUEST['prepay_sum']; //Сумма предоплаты
                $query = "INSERT INTO preorder_prepay (`call_id`,`type`,`card`,`prepay_sum`,`full_sum`) VALUES('".$call_id."','".$preorder_way."','".$card."','".$prepay_sum."','".$full_cost."')";
            }
        elseif($preorder_way=='cash') //Оплата наличные
            {
                $prepay_sum=$_REQUEST['prepay_sum']; //Сумма предоплаты

                $prepay_recipient_name=$_REQUEST['prepay_recipient_name']; //Получатель средств
                $prepay_recipient_phone=$_REQUEST['prepay_recipient_phone']; //Телефон получателя средст

                $prepay_payer_name=$_REQUEST['prepay_payer_name']; //Плательщик средств
                $prepay_payer_phone=$_REQUEST['prepay_payer_phone']; //Телефон плательщика средств

                $query = "INSERT INTO preorder_prepay (`call_id`,`type`,`prepay_recipient_name`,`prepay_recipient_phone`,`prepay_payer_name`,`prepay_payer_phone`,`prepay_sum`,`full_sum`) VALUES('".$call_id."','".$preorder_way."','".$prepay_recipient_name."','".$prepay_recipient_phone."','".$prepay_payer_name."','".$prepay_payer_phone."','".$prepay_sum."','".$full_cost."')";
            }
    }
else
    {
        $query = "INSERT INTO preorder_prepay (`call_id`,`type`,`full_sum`) VALUES('".$call_id."','prepay_no','".$full_cost."')";
    }

$post_type=$_REQUEST['post_type']; //Статус почты

if($post_type="newpost-shop")
    {
        $preorder_recipient_name=$_REQUEST['preorder_recipient_name'];
        $preorder_recipient_phone=$_REQUEST['preorder_recipient_phone'];
        $area=$_REQUEST['area'];
        $city=$_REQUEST['city'];
        $shop=$_REQUEST['shop'];
        $weight=$_REQUEST['weight'];
        $delivery_pay=$_REQUEST['delivery_pay'];
        $imposed_sum=$_REQUEST['imposed_sum'];

        echo $query = "INSERT INTO preorder_delivery (`call_id`,
                                                 `post_type`,
                                                 `preorder_recipient_name`,
                                                 `preorder_recipient_phone`,
                                                 `area`,
                                                 `city`,
                                                 `shop`,
                                                 `weight`,
                                                 `delivery_pay`,
                                                 `imposed_sum`)
                  VALUES('".$call_id."',
                         '".$post_type."',
                         '".$preorder_recipient_name."',
                         '".$preorder_recipient_phone."',
                         '".$area."',
                         '".$city."',
                         '".$shop."',
                         '".$weight."',
                         '".$delivery_pay."',
                         '".$imposed_sum."')";
    }
elseif($post_type="newpost-addres")
    {
        $preorder_recipient_name=$_REQUEST['preorder_recipient_name'];
        $preorder_recipient_phone=$_REQUEST['preorder_recipient_phone'];
        $area=$_REQUEST['area'];
        $city=$_REQUEST['city'];
        $addres=$_REQUEST['addres'];
        $weight=$_REQUEST['weight'];
        $delivery_pay=$_REQUEST['delivery_pay'];
        $imposed_sum=$_REQUEST['imposed_sum'];

        echo $query = "INSERT INTO preorder_delivery (`call_id`,
                                                 `post_type`,
                                                 `preorder_recipient_name`,
                                                 `preorder_recipient_phone`,
                                                 `area`,
                                                 `city`,
                                                 `addres`,
                                                 `weight`,
                                                 `delivery_pay`,
                                                 `imposed_sum`)
                  VALUES('".$call_id."',
                         '".$post_type."',
                         '".$preorder_recipient_name."',
                         '".$preorder_recipient_phone."',
                         '".$area."',
                         '".$city."',
                         '".$addres."',
                         '".$weight."',
                         '".$delivery_pay."',
                         '".$imposed_sum."')";
    }
elseif($post_type="intime-shop")
    {

        $preorder_recipient_name=$_REQUEST['preorder_recipient_name'];
        $preorder_recipient_phone=$_REQUEST['preorder_recipient_phone'];
        $area=$_REQUEST['area'];
        $city=$_REQUEST['city'];
        $shop=$_REQUEST['shop'];
        $weight=$_REQUEST['weight'];
        $delivery_pay=$_REQUEST['delivery_pay'];
        $imposed_sum=$_REQUEST['imposed_sum'];

        echo $query = "INSERT INTO preorder_delivery (`call_id`,
                                                 `post_type`,
                                                 `preorder_recipient_name`,
                                                 `preorder_recipient_phone`,
                                                 `area`,
                                                 `city`,
                                                 `shop`,
                                                 `weight`,
                                                 `delivery_pay`,
                                                 `imposed_sum`)
                  VALUES('".$call_id."',
                         '".$post_type."',
                         '".$preorder_recipient_name."',
                         '".$preorder_recipient_phone."',
                         '".$area."',
                         '".$city."',
                         '".$shop."',
                         '".$weight."',
                         '".$delivery_pay."',
                         '".$imposed_sum."')";
    }
elseif($post_type="intime-addres")
    {
        $preorder_recipient_name=$_REQUEST['preorder_recipient_name'];
        $preorder_recipient_phone=$_REQUEST['preorder_recipient_phone'];
        $area=$_REQUEST['area'];
        $city=$_REQUEST['city'];
        $addres=$_REQUEST['addres'];
        $weight=$_REQUEST['weight'];
        $delivery_pay=$_REQUEST['delivery_pay'];
        $imposed_sum=$_REQUEST['imposed_sum'];

        echo $query = "INSERT INTO preorder_delivery (`call_id`,
                                                 `post_type`,
                                                 `preorder_recipient_name`,
                                                 `preorder_recipient_phone`,
                                                 `area`,
                                                 `city`,
                                                 `addres`,
                                                 `weight`,
                                                 `delivery_pay`,
                                                 `imposed_sum`)
                  VALUES('".$call_id."',
                         '".$post_type."',
                         '".$preorder_recipient_name."',
                         '".$preorder_recipient_phone."',
                         '".$area."',
                         '".$city."',
                         '".$addres."',
                         '".$weight."',
                         '".$delivery_pay."',
                         '".$imposed_sum."')";

    }
elseif($post_type="addres")
    {
        $preorder_recipient_name=$_REQUEST['preorder_recipient_name'];
        $preorder_recipient_phone=$_REQUEST['preorder_recipient_phone'];
        $area=$_REQUEST['area'];
        $city=$_REQUEST['city'];
        $addres=$_REQUEST['addres'];
        $delivery_pay=$_REQUEST['delivery_pay'];
        $imposed_sum=$_REQUEST['imposed_sum'];

        echo $query = "INSERT INTO preorder_delivery (`call_id`,
                                                 `post_type`,
                                                 `preorder_recipient_name`,
                                                 `preorder_recipient_phone`,
                                                 `area`,
                                                 `city`,
                                                 `addres`,
                                                 `weight`,
                                                 `delivery_pay`,
                                                 `imposed_sum`)
                  VALUES('".$call_id."',
                         '".$post_type."',
                         '".$preorder_recipient_name."',
                         '".$preorder_recipient_phone."',
                         '".$area."',
                         '".$city."',
                         '".$addres."',
                         '".$weight."',
                         '".$delivery_pay."',
                         '".$imposed_sum."')";
    }
elseif($post_type="hitched")
    {
        $preorder_recipient_name=$_REQUEST['preorder_recipient_name'];
        $preorder_recipient_phone=$_REQUEST['preorder_recipient_phone'];
        $area=$_REQUEST['area'];
        $city=$_REQUEST['city'];
        $addres=$_REQUEST['addres'];
        $delivery_pay=$_REQUEST['delivery_pay'];
        $imposed_sum=$_REQUEST['imposed_sum'];

        echo $query = "INSERT INTO preorder_delivery (`call_id`,
                                                 `post_type`,
                                                 `preorder_recipient_name`,
                                                 `preorder_recipient_phone`,
                                                 `area`,
                                                 `city`,
                                                 `addres`,
                                                 `delivery_pay`,
                                                 `imposed_sum`)
                  VALUES('".$call_id."',
                         '".$post_type."',
                         '".$preorder_recipient_name."',
                         '".$preorder_recipient_phone."',
                         '".$area."',
                         '".$city."',
                         '".$addres."',
                         '".$delivery_pay."',
                         '".$imposed_sum."')";
    }
elseif($post_type="pickup")
    {
        $preorder_recipient_name=$_REQUEST['preorder_recipient_name'];
        $preorder_recipient_phone=$_REQUEST['preorder_recipient_phone'];
        $imposed_sum=$_REQUEST['imposed_sum'];

        echo $query = "INSERT INTO preorder_delivery (`call_id`,
                                                 `post_type`,
                                                 `preorder_recipient_name`,
                                                 `preorder_recipient_phone`,
                                                 `imposed_sum`)
                  VALUES('".$call_id."',
                         '".$post_type."',
                         '".$preorder_recipient_name."',
                         '".$preorder_recipient_phone."',
                         '".$imposed_sum."')";
    }
elseif($post_type="two_pillars")
    {
        $preorder_recipient_name=$_REQUEST['preorder_recipient_name'];
        $preorder_recipient_phone=$_REQUEST['preorder_recipient_phone'];
        $preorder_payer_name=$_REQUEST['preorder_payer_name'];
        $preorder_payer_phone=$_REQUEST['preorder_payer_phone'];
        $imposed_sum=$_REQUEST['imposed_sum'];

        echo $query = "INSERT INTO preorder_delivery (`call_id`,
                                                 `post_type`,
                                                 `preorder_recipient_name`,
                                                 `preorder_recipient_phone`,
                                                 `preorder_payer_name`,
                                                 `preorder_payer_phone`,
                                                 `imposed_sum`)
                  VALUES('".$call_id."',
                         '".$post_type."',
                         '".$preorder_recipient_name."',
                         '".$preorder_recipient_phone."',
                         '".$preorder_payer_name."',
                         '".$preorder_payer_phone."',
                         '".$imposed_sum."')";
    }







