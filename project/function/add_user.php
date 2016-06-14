<?php

//Добавление пользователя

include '../include/config.php'; 
$full_name=$_POST['full_name'];
$birthday=$_POST['birthday'];
$login=$_POST['login'];
$password=$_POST['password'];
$personal_mail=$_POST['personal_mail'];
$personal_phone=$_POST['personal_phone'];
$access=$_POST['access'];
$card_number=$_POST['card_number'];

$query = "INSERT INTO users (`full_name`,`birthday`,`login`,`password`,`personal_mail`,`personal_phone`,`access`) 
		  VALUES('".$full_name."','".$birthday."','".$login."','".$password."','".$personal_mail."','".$personal_phone."','".$access."')";

$res = mysql_query($query) ;
$row = mysql_fetch_array($res);

$query = "SELECT COUNT(*) FROM `users`";
$res = mysql_query($query) ;
$row = mysql_fetch_array($res);
$count=$row['COUNT(*)'];


$query = "INSERT INTO `egorovka`.`users_wallet` (`id`, `users_id`, `wallet_number`, `wallet_balance`) VALUES (NULL, '".$count."', '".$card_number."', '0')";

$res = mysql_query($query) ;
$row = mysql_fetch_array($res);

















if($res==1)
	{
		echo '<center><div class="nNote nSuccess hideit" style="width:600px;"><p><strong>Успех: </strong>Сотрудник '.$full_name.' успешно добавлен!</p></div></center>';	
	}
else
	{
        echo '<center><div class="nNote nFailure  hideit" style="width:600px;"><p><strong>Ошибка: </strong>Свяжитесь с администратором!</p></div></center>';	
	}


?>