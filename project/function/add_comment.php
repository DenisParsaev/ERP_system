<?php

//Добавление комментария

include '../include/config.php'; 
$call_id=$_POST['call_id'];   //ID звонка
$comment=$_POST['comment'];   //Комментарий
$manager=$_POST['manager'];   //ID менеджера
$date_add=$_POST['date_add']; //Дата добавления 
$date_update = date("Y-m-d H:i:s"); //Текущя дате
//Получение логина менеджера
$query_manager_name = "SELECT login FROM `users` WHERE id='".$manager."'";
$res_manager_name = mysql_query($query_manager_name) or die(mysql_error());
$result_manager_name = mysql_fetch_array($res_manager_name);
$manager_name=$result_manager_name['login'];
//Текст комментарий
$text="".$date_update.": Менеджер ".$manager_name." добавил новый комментарий к заказу";
//Добавление комментария звонка
$query = "INSERT INTO coment_call (`call_id`,`manager`,`coment`) VALUES ('".$call_id."','".$manager."','".$comment."')";
$res = mysql_query($query);
if($res==1)
	{
		//Обновление звонка (Лата обновления)
		$query = "UPDATE `scroll_call` SET `date_update`='".$date_update."', `date_add`='".$date_add."' WHERE id='".$call_id."'";
		$res = mysql_query($query) ;
		//Запись информации в лог
		$query_log = "INSERT INTO log (`call_id`,`text_log`) VALUES ('".$call_id."','".$text."')";
		$res_log = mysql_query($query_log) ; 
		//Вывод успешного сообщения
		echo '<center><div class="nNote nSuccess hideit" style="width:98%;"><p><strong>Успех: </strong>Комментарий успешно добавлен!</p></div></center>';	
	}
else
	{
		//Вывод ошибки
		echo '<center><div class="nNote nFailure  hideit" style="width:98%"><p><strong>Ошибка: </strong>Свяжитесь с администратором!</p></div></center>';	
	}