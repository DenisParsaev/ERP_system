<?php

//Добавление заказа

include '../include/config.php'; 
$name=$_POST['name']; // ФИО клиента
$phone=$_POST['phone']; // Телефон клиента
$city=$_POST['city']; // Город клиента
$other=$_POST['other']; // Другой вариант почты клиента
$status=$_POST['status']; // Статус звонка
$date=$_POST['date']; // Дата звонка
$comment=$_POST['comment']; // Комментарий к заказу
$consumption=$_POST['consumption']; // Комментарий к заказу
$name_product=$_POST['name_product'];
$price_product=$_POST['price_product'];
$col_product=$_POST['col_product'];
$category_product=$_POST['category'];
$date_update = date("d-m-y H:i:s");  
$manager=$_POST['manager'];;


$query_manager_name = "SELECT login FROM `users` WHERE id='".$manager."'";
$res_manager_name = mysql_query($query_manager_name) or die(mysql_error());
$result_manager_name = mysql_fetch_array($res_manager_name);
$manager_name=$result_manager_name['login'];

$text="".$date_update.": Менеджер ".$manager_name." создал новый заказ";

$count_name_product=count($name_product);

$query_count_call = "SELECT COUNT(*) FROM scroll_call";
$res_count_call = mysql_query($query_count_call) or die(mysql_error());
$result_count_call = mysql_fetch_array($res_count_call);
$count_call=$result_count_call[0]+1;

for($i=0;$i<$count_name_product;$i++)
{
	$product = htmlspecialchars($name_product[$i]);
	$product = mysql_escape_string($product);
	$count = htmlspecialchars($col_product[$i]);
	$count = mysql_escape_string($count);
	$price = htmlspecialchars($price_product[$i]);
	$price = mysql_escape_string($price);
	$category = htmlspecialchars($category_product[$i]);
	$category = mysql_escape_string($category);

	if($category=="1"){$shop_one="1";}
	if($category=="2"){$shop_two="1";}
	if($category=="3"){$shop_three="1";}
	if($category=="4"){$shop_four="1";}



	$count = preg_replace('/[^0-9.]/','',$count);
	$price = preg_replace('/[^0-9.]/','',$price);

	$order.="".$product."|".$count."|".$price."|".$category."/";
}

if($status!="2" && $date=="")
	{
		$query = "INSERT INTO scroll_call (`name_client`,`phone_client`,`city_client`,`status`,`date_update`,`manager`,`comment`,`order_content`,`consumption`)
				  VALUES('".$name."','".$phone."','".$city."','".$status."','".$date_update."','".$manager."','".$comment."','".$order."','".$consumption."')";
		$res = mysql_query($query) ;
		$row = mysql_fetch_array($res);

        $query = "INSERT INTO preorder_willingness (`call_id`,`shop_one`,`shop_two`,`shop_three`,`shop_four`) VALUES ('".$count_call."','".$shop_one."','".$shop_two."','".$shop_three."','".$shop_four."')";
        $res = mysql_query($query) ;

		if($comment!="")
			{
				$query = "INSERT INTO coment_call (`call_id`,`manager`,`coment`) VALUES ('".$count_call."','".$manager."','".$comment."')";
				$res = mysql_query($query) ;
			}


		$query_log = "INSERT INTO log (`call_id`,`text_log`) VALUES ('".$count_call."','".$text."')";
		$res_log = mysql_query($query_log) ;

		if($res==1)
			{
				echo '<center><div class="nNote nSuccess hideit" style="width:600px;"><p><strong>Успех: </strong>Звонок успешно добавлен!</p></div></center>';
				echo '<script language="JavaScript"> window.location.href = "/info_order.php?id='.$count_call.'", 5000</script>';
			}
		else
			{
				echo '<center><div class="nNote nFailure  hideit" style="width:600px;"><p><strong>Ошибка: </strong>Свяжитесь с администратором!</p></div></center>';
			}

	}
elseif($status=="2" && $date!="")
	{
		$query = "INSERT INTO scroll_call (`name_client`,`phone_client`,`city_client`,`status`,`date_expectation`,`date_update`,`manager`,`comment`,`order_content`,`consumption`)
				  VALUES('".$name."','".$phone."','".$city."','".$status."','".$date."','".$date_update."','".$manager."','".$comment."','".$order."','".$consumption."')";
		$res = mysql_query($query) ;
		$row = mysql_fetch_array($res);

        $query = "INSERT INTO preorder_willingness (`call_id`,`shop_one`,`shop_two`,`shop_three`,`shop_four`) VALUES ('".$count_call."','".$shop_one."','".$shop_two."','".$shop_three."','".$shop_four."')";
        $res = mysql_query($query) ;

		if($comment!="")
		{
			$query = "INSERT INTO coment_call (`call_id`,`manager`,`coment`) VALUES ('".$count_call."','".$manager."','".$comment."')";
			$res = mysql_query($query) ;
		}



		$query_log = "INSERT INTO log (`call_id`,`text_log`) VALUES ('".$count_call."','".$text."')";
		$res_log = mysql_query($query_log) ;

		if($res==1)
			{
				echo '<center><div class="nNote nSuccess hideit" style="width:945px;"><p><strong>Успех: </strong>Звонок успешно добавлен!</p></div></center>';
				echo '<script language="JavaScript"> window.location.href = "/info_order.php?id='.$count_call.'", 5000</script>';
			}
		else
			{
				echo mysql_error();
				echo '<center><div class="nNote nFailure  hideit" style="width:945px;"><p><strong>Ошибка: </strong>Свяжитесь с администратором!</p></div></center>';
			}
	}
else
	{
		echo '<center><div class="nNote nWarning   hideit" style="width:945px;"><p><strong>Ошибка: </strong>Несоответствие даты ожидания и статуса!</p></div></center>';
	}
?>