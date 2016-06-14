<?php
/**
 * User: Игнатьев Евгений Юрьевич
 */

include '../../include/config.php'; //Подключение к БД
mysql_select_db("egorovka_stock") or die(mysql_error());
mysql_set_charset('utf8');

$weight=$_POST['weight']; //Вес проволоки
$diameter=$_POST['diameter']; //Диаметр проволоки
$type_wire=$_POST['type_wire']; //Тип проволоки
$type_wire_treatment=$_POST['type_wire_treatment']; //Тип обработки
$member=$_POST['member']; //ID пользователя

$query_availability = "SELECT * FROM `stock_wire`";
$res_availability = mysql_query($query_availability) or die(mysql_error());


while ($result_availability = mysql_fetch_array($res_availability))
    {
        if($result_availability['diameter']==$diameter && $result_availability['type_wire']==$type_wire && $result_availability['treatment_wire']==$type_wire_treatment)
            {
                $query = "UPDATE `stock_wire` SET `weight_wire`=weight_wire+".$weight." WHERE diameter='".$diameter."' AND type_wire='".$type_wire."' AND treatment_wire='".$type_wire_treatment."'";
                $res = mysql_query($query);

                mysql_select_db("egorovka") or die(mysql_error());
                mysql_set_charset('utf8');

                $query_type_wire = "SELECT type_wire FROM `setting_type_wire` WHERE id='".$type_wire."'";
                $res_type_wire = mysql_query($query_type_wire) or die(mysql_error());
                $result_type_wire = mysql_fetch_array($res_type_wire);
                $result_type_wire=$result_type_wire['type_wire'];

                $query_diameter = "SELECT diameter FROM `setting_wire_diameter` WHERE id='".$diameter."'";
                $res_diameter = mysql_query($query_diameter) or die(mysql_error());
                $result_diameter = mysql_fetch_array($res_diameter);
                $result_diameter=$result_diameter['diameter'];

                $query_type_wire_treatment = "SELECT name_treatment FROM `setting_type_treatment` WHERE id='".$type_wire_treatment."'";
                $res_type_wire_treatment = mysql_query($query_type_wire_treatment) or die(mysql_error());
                $result_type_wire_treatment = mysql_fetch_array($res_type_wire_treatment);
                $result_type_wire_treatment=$result_type_wire_treatment['name_treatment'];

                mysql_select_db("egorovka_stock") or die(mysql_error());
                mysql_set_charset('utf8');

                $text_log="Добавил ".$weight." кг. проволоки, диаметр: ".$result_diameter.", тип: ".$result_type_wire.", обработка: ".$result_type_wire_treatment."&#010;";
                $query_log = "INSERT INTO stock_wire_log (`member`,`message`) VALUES ('".$member."','".$text_log."')";
                $res_log = mysql_query($query_log);
                echo "<script>$.jGrowl('Добавлена проволока [".$result_diameter."] - ".$weight." кг.!');</script>";
                $status=true;
            }
    }
if($status!=true)
    {
        $query = "INSERT INTO stock_wire (`diameter`,`type_wire`,`treatment_wire`,`weight_wire`) VALUES ('".$diameter."','".$type_wire."','".$type_wire_treatment."','".$weight."')";
        $res = mysql_query($query);

        mysql_select_db("egorovka") or die(mysql_error());
        mysql_set_charset('utf8');

        $query_type_wire = "SELECT type_wire FROM `setting_type_wire` WHERE id='".$type_wire."'";
        $res_type_wire = mysql_query($query_type_wire) or die(mysql_error());
        $result_type_wire = mysql_fetch_array($res_type_wire);
        $result_type_wire=$result_type_wire['type_wire'];

        $query_diameter = "SELECT diameter FROM `setting_wire_diameter` WHERE id='".$diameter."'";
        $res_diameter = mysql_query($query_diameter) or die(mysql_error());
        $result_diameter = mysql_fetch_array($res_diameter);
        $result_diameter=$result_diameter['diameter'];

        $query_type_wire_treatment = "SELECT name_treatment FROM `setting_type_treatment` WHERE id='".$type_wire_treatment."'";
        $res_type_wire_treatment = mysql_query($query_type_wire_treatment) or die(mysql_error());
        $result_type_wire_treatment = mysql_fetch_array($res_type_wire_treatment);
        $result_type_wire_treatment=$result_type_wire_treatment['name_treatment'];

        mysql_select_db("egorovka_stock") or die(mysql_error());
        mysql_set_charset('utf8');

        $text_log="Добавил ".$weight." кг. проволоки, диаметр: ".$result_diameter.", тип: ".$result_type_wire.", обработка: ".$result_type_wire_treatment."&#010;";
        $query_log = "INSERT INTO stock_wire_log (`member`,`message`) VALUES ('".$member."','".$text_log."')";
        $res_log = mysql_query($query_log);
        echo "<script>$.jGrowl('Добавлена проволока [".$result_diameter."] - ".$weight." кг.!');</script>";
    }