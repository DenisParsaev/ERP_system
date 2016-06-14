<?php
/**
 * Created by PhpStorm.
 * User: ignat
 * Date: 16.03.2016
 * Time: 13:55
 */
include('../include/config.php');
session_start();

/* Курс доллара*/
function dollar_exchange()
{
    $query = "SELECT dollar_exchange FROM `setting`";
    $res = mysql_query($query) or die(mysql_error());
    $result = mysql_fetch_array($res);
    echo $result['dollar_exchange'];
}

function wallet_number($id)
{
    $query = "SELECT wallet_number FROM `users_wallet` WHERE `users_id`='".$id."'";
    $res = mysql_query($query) or die(mysql_error());
    $result = mysql_fetch_array($res);
    $wallet_number=$result['wallet_number'];
    return $wallet_number;
}

function wallet_balance($id)
{
    $query = "SELECT wallet_balance FROM `users_wallet` WHERE `users_id`='".$id."'";
    $res = mysql_query($query) or die(mysql_error());
    $result = mysql_fetch_array($res);
    $wallet_balance=$result['wallet_balance'];
    return $wallet_balance;
}

function wallet_history($transaction_type,$wallet_number)
{
    $query = "SELECT date_add,transaction_sum,comment FROM `users_wallet_history` WHERE `transaction_type`='".$transaction_type."' AND `wallet_number`='".$wallet_number."' ";
    $res = mysql_query($query) or die(mysql_error());

    while ($result = mysql_fetch_array($res))
        {
            $date=explode(" ", $result['date_add']);
            $time=$date[1];
            $date=$date[0];
            $date_explode=explode("-", $date);
            $year=$date_explode[0];
            $mon=$date_explode[1];
            $day=$date_explode[2];

            if($transaction_type!="-"){$type='gradeC';}else{$type='gradeX';}

            echo '<tr class="'.$type.'">
                        <td class="center">'.$day.'-'.$mon.'-'.$year.' '.$time.'</td>
                        <td class="center">'.$result['transaction_sum'].' ₴</td>
                        <td class="center">'.$result['comment'].'</td>
                    </tr>';

            //echo '<li><span class="tooltip anim" tabindex="0"><b></b> '.$type.'  ₴ <span></span></span></li>';

        }


}

/* Процент менеджера */
function percent_manager()
{
    $query = "SELECT percent_manager FROM `setting`";
    $res = mysql_query($query) or die(mysql_error());
    $result = mysql_fetch_array($res);
    $percent_manager=$result['percent_manager'];
    return $percent_manager;
}

/* Записать лог */
function add_log($log_text,$call_id)
{
    $query = "INSERT INTO log (`call_id`,`text_log`) VALUES ('".$call_id."','".$log_text."')";
    $res = mysql_query($query) ;
}

/* Обновить статус звонка */
function update_status_call($call_id,$date_add)
{
    $query = "UPDATE `scroll_call` SET `status`='13', `date_update`='".$date_add."', `date_calculation`='".$date_add."' WHERE id='".$call_id."'";
    $res = mysql_query($query);
}

/* Процент управляющего */
function percent_managing()
{
    $query = "SELECT percent_managing FROM `setting`";
    $res = mysql_query($query) or die(mysql_error());
    $result = mysql_fetch_array($res);
    echo $result['percent_managing'];
}

//Функция вывода диаметров
function echo_diameter()
    {
        $query = "SELECT * FROM `setting_wire_diameter`";
        $res = mysql_query($query) or die(mysql_error());

        while ($result = mysql_fetch_array($res))
            {
                if($result['id']<22)
                    {
                        echo '<option value="'.$result['id'].'">Ø '.$result['diameter'].'</option> ';
                    }
            }
    }

//Функция вывода типов проволоки
function echo_type_wire()
    {
        $query = "SELECT * FROM `setting_type_wire`";
        $res = mysql_query($query) or die(mysql_error());

        while ($result = mysql_fetch_array($res))
            {
                echo '<option value="'.$result['id'].'">'.$result['type_wire'].'</option> ';
            }
    }

//Функция вывода обработки проволоки
function echo_type_treatment()
    {
        $query = "SELECT * FROM `setting_type_treatment`";
        $res = mysql_query($query) or die(mysql_error());

        while ($result = mysql_fetch_array($res))
            {
                if($result['id']!="1")
                    {
                        echo '<option value="'.$result['id'].'">'.$result['name_treatment'].'</option> ';
                    }
            }
    }

//Функция вывода обработки проволоки
function echo_log_wire()
    {
        mysql_select_db("egorovka_stock") or die(mysql_error());
        mysql_set_charset('utf8');
        $query = "SELECT * FROM `stock_wire_log`";
        $res = mysql_query($query) or die(mysql_error());



        while ($result = mysql_fetch_array($res))
            {
                mysql_select_db("egorovka") or die(mysql_error());
                mysql_set_charset('utf8');
                $query_member = "SELECT login FROM `users` WHERE `id`='".$result['member']."'";
                $res_member = mysql_query($query_member) or die(mysql_error());
                $result_member = mysql_fetch_array($res_member);
                $member=$result_member['login'];

                $text.="".$result['date_add']." | ".$member." | ".$result['message']."";
            }
        echo "<script>document.getElementById('log').innerHTML='".$text."';</script>";
    }

//Наличие проволоки на складе
function echo_wire_stock()
    {
        mysql_select_db("egorovka_stock") or die(mysql_error());
        mysql_set_charset('utf8');
        $query = "SELECT * FROM `stock_wire`";
        $res = mysql_query($query) or die(mysql_error());

        while ($result = mysql_fetch_array($res))
            {
                mysql_select_db("egorovka") or die(mysql_error());
                $query_diameter = "SELECT diameter FROM `setting_wire_diameter` WHERE id='".$result['diameter']."'";
                $res_diameter = mysql_query($query_diameter) or die(mysql_error());
                $result_diameter = mysql_fetch_array($res_diameter);
                $diameter=$result_diameter['diameter'];

                $query_type_wire = "SELECT type_wire FROM `setting_type_wire` WHERE id='".$result['type_wire']."'";
                $res_type_wire  = mysql_query($query_type_wire ) or die(mysql_error());
                $result_type_wire  = mysql_fetch_array($res_type_wire );
                $type_wire =$result_type_wire ['type_wire'];

                $query_type_treatment = "SELECT name_treatment FROM `setting_type_treatment` WHERE id='".$result['treatment_wire']."'";
                $res_type_treatment = mysql_query($query_type_treatment) or die(mysql_error());
                $result_type_treatment = mysql_fetch_array($res_type_treatment);
                $type_treatment=$result_type_treatment['name_treatment'];


                echo '<tr>';
                echo '<td><center>Ø '.$diameter.'</center></td>';
                echo '<td><center>'.$type_wire.'</center></td>';
                echo '<td><center>'.$type_treatment.'</center></td>';
                echo '<td><center>'.$result['weight_wire'].'</center></td>';
                echo '</tr>';
            }
    }
//Вывод имени менджера
function echo_manager_name($id)
    {
        $query = "SELECT full_name FROM `users` WHERE id='".$id."'";
        $res = mysql_query($query) or die(mysql_error());
        $result = mysql_fetch_array($res);
        $name=$result['full_name'];
        $name=explode('', $name);
        echo $name=$name[1];
    }

//Вывод логина менеджера
function echo_manager_login($manager_id)
{
    $query = "SELECT login FROM `users` WHERE id='".$manager_id."'";
    $res = mysql_query($query) or die(mysql_error());
    $result = mysql_fetch_array($res);
    $login=$result['login'];
    return $login;
}

//Кол-во уведомлений
function message($manager,$access)
{
    $query = "SELECT * FROM `information_message`";
    $res = mysql_query($query) or die(mysql_error());
    $i=0;
    while ($result = mysql_fetch_array($res))
        {
            if($manager==$result['users'] || $access==$result['access'])
                {
                    $key = strripos($result['familiarization'], '|' . $_SESSION['id'] . '|');
                    if ($key === false)
                        {
                            $i++;
                        }
                    else
                    {
                    }
                }
        }
    if($i!=0)
        {
            echo '<strong class="numberTop">'.$i.'</strong>';
        }
}

//Вывод банковских карт
function card_list()
{
    $query = "SELECT * FROM `setting_card` WHERE `active`=1";
    $res = mysql_query($query) or die(mysql_error());
    while ($result = mysql_fetch_array($res))
        {
            $card_number=$result['card_number'];
            $card_name=$result['card_name'];
            echo "<option value='$card_number'>$card_name</option>";
        }
}

//Вывод архива прайс листов
function archive_price_rabiza()
    {
        $j=1;
        $dir='price/archive';
        $files = scandir($dir);
        array_shift($files);
        array_shift($files);




        for($i=0; $i<count($files); $i++)
            {
                $date = preg_grep('/\((.+)\)/', '', $files[$i]);
                $date=explode('(', $files[$i]);
                $date=explode(')', $date[1]);
                $date=$date[0];

                echo '<tr>';
                echo '<td><center>'.$j.'</center></td>';
                echo '<td><center>'.$date.'</center></td>';
                echo '<td><center><a href="'.$dir.'/'.$files[$i].'" title="открыть/скачать файл или страницу">Скачать прайс</a></center></td>';
                echo '</tr>';
                $j++;
            }
    }

	//Вывод архива бланков отгрузки
function archive_blank_shipping()
    {
        $j=1;
        $dir='shipping/archiv';
        $files = scandir($dir);
        array_shift($files);
        array_shift($files);




        for($i=0; $i<count($files); $i++)
            {
                $date = preg_grep('/\((.+)\)/', '', $files[$i]);
                $date=explode('[', $files[$i]);
			$date=explode(']', $date[1]);
                $date=$date[0];

                echo '<tr>';
                echo '<td><center>'.$j.'</center></td>';
                echo '<td><center>'.$date.'</center></td>';
                echo '<td><center><a href="'.$dir.'/'.$files[$i].'" title="открыть/скачать файл или страницу">Скачать прайс</a></center></td>';
                echo '</tr>';
                $j++;
            }
    }
	
//Вывод кол-ва заказаов по статусу
function return_status_count($status,$manager)
    {
        if($status=="14")
            {
                $query = "SELECT COUNT(*) FROM `scroll_call` WHERE status='".$status."' AND manager='".$manager."' AND explanatory=''";
                $res = mysql_query($query) or die(mysql_error());
                $result = mysql_fetch_array($res);
                echo $count=$result[0];
            }
        elseif($status=="0")
            {
                $query = "SELECT * FROM `scroll_call` WHERE manager='".$manager."' AND status='".$status."' OR status='2' OR status='5'";
                $res = mysql_query($query) or die(mysql_error());
                $i=0;
                while ($result = mysql_fetch_array($res))
                    {
                        if ($result['manager'] == $manager)
                            {
                                $i++;
                            }
                    }
                echo $i;
            }
        else
            {
                $query = "SELECT COUNT(*) FROM `scroll_call` WHERE status='".$status."' AND manager='".$manager."'";
                $res = mysql_query($query) or die(mysql_error());
                $result = mysql_fetch_array($res);
                echo $count=$result[0];
            }
    }
