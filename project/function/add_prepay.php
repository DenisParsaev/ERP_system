<?php
include '../include/config.php';
$summ_prepay=$_POST['summ_prepay'];
$direction=$_POST['direction'];
$card_last_number=$_POST['card_last_number'];


$query = "INSERT INTO table_prepay (`direction_prepay`,`card_number`,`sum_prepay`)
				  VALUES('".$direction."','".$card_last_number."','".$summ_prepay."')";
    $res = mysql_query($query) ;

if($res==1)
{
    echo '<center><div class="nNote nSuccess hideit" style="width:650px;"><p><strong>Успех: </strong>Предоплата успешно добавлена!</p></div></center>';
}
else
{
    echo '<center><div class="nNote nFailure  hideit" style="width:650px;"><p><strong>Ошибка: </strong>Свяжитесь с администратором!</p></div></center>';
}


?>