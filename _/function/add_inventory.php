<?php
include '../include/config.php';
$users=$_POST['users'];
$name=$_POST['name'];

$query = "INSERT INTO users_inventory (`users_id`,`inventory_text`) VALUES('".$users."','".$name."')";
$res = mysql_query($query) ;

if($res==1)
{
    echo '<center><div class="nNote nSuccess hideit" style="width:650px;"><p><strong>Успех: </strong>Предмет '.$name.' успешно добавлена!</p></div></center>';
}
else
{
    echo '<center><div class="nNote nFailure  hideit" style="width:650px;"><p><strong>Ошибка: </strong>Свяжитесь с администратором!</p></div></center>';
}


?>