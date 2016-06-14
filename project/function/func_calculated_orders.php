<?php
include '../include/config.php';
include 'function.php';
$date_add = date("d-m-y H:i:s");
$content=explode("|",$_REQUEST['id']);

$call_id=$content[0];
$manager=$content[1];
$prepay_boses=$_REQUEST['prepay_boses'];
$cost_price=$_REQUEST['cost_price'];
$full_payng=$_REQUEST['full_payng'];
$pre_pay=$_REQUEST['pre_pay'];

$percent_manager=percent_manager();
$login=echo_manager_login($manager);

$office_earnings=$full_payng-$cost_price;
$manager_earnings=$office_earnings/100*$percent_manager;
$bosses_earnings=$office_earnings-$manager_earnings;

//Добавление заказа в рассчитаные
$query = "INSERT INTO calculated_orders (
                  `call_id`,`status`,
                  `office_earnings`,
                  `manager_earnings`,
                  `bosses_earnings`,
                  `manager`)

          VALUES ('".$call_id."','13',
                  '".$office_earnings."',
                  '".$manager_earnings."',
                  '".$bosses_earnings."',
                  '".$manager."')";

$res = mysql_query($query);


//Запись в логи
$log_text="".$date_add.": ".$login." указал(а) что заказ рассчитан";

add_log($log_text,$call_id); //Функция записи лога
update_status_call($call_id,$date_add); //Обнавления статуса звонка

//Вывод об успешном добавление заказа в рассчтаные
if($res==1)
    {
        echo '<a title="" class="btn14 mr5" style="height:14px;"><img src="/images/icons/color/tick.png"/></a>';
        echo "<script>$.jGrowl('Заказ рассчитан!');</script>";
    }
else
    {
        echo '<a title="" class="btn14 mr5" style="height:14px;"><img src="/images/icons/color/cross.png"/></a>';
    }



?>