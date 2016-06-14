<?php
include '../include/config.php';
session_start();
$users=$_POST['users'];
$comment=$_POST['comment'];
$sum=$_POST['sum'];
$type_transaction=$_POST['type_transaction'];

$query = "SELECT wallet_number FROM `users_wallet` WHERE users_id='".$users."'";
$res = mysql_query($query) or die(mysql_error());
$result = mysql_fetch_array($res);
$wallet_number=$result['wallet_number'];



$query_add = "INSERT INTO users_wallet_history (`transaction_type`,`transaction_sum`,`comment`,`users_id`,`wallet_number`) VALUES('".$type_transaction."','".$sum."','".$comment."','".$users."','".$wallet_number."')";

if($type_transaction=="+")
{
    $query_update = "UPDATE `users_wallet` SET `wallet_balance` = `wallet_balance` + '".$sum."' WHERE `users_id`='".$users."'";
}
else
{
    $query_update = "UPDATE `users_wallet` SET `wallet_balance` = `wallet_balance` - '".$sum."' WHERE `users_id`='".$users."'";
}

$res_add = mysql_query($query_add) ;
$res_update = mysql_query($query_update) ;


if($res_add==1 && $res_update==1)
{
    echo '<center><div class="nNote nSuccess hideit" style="width:650px;"><p><strong>Успех: </strong>Транзакция успешно проведена!</p></div></center>';
}
else
{
    echo '<center><div class="nNote nFailure  hideit" style="width:650px;"><p><strong>Ошибка: </strong>Свяжитесь с администратором!</p></div></center>';
}


?>