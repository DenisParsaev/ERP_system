<?php

//Редактирование продукта

include '../include/config.php'; 
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

	$date_add=$_POST['date_add'];
	$comment=$_POST['comment'];
	$manager=$_POST['manager'];
	$date_update = date("Y-m-d H:i:s"); //Текущя дате
	$id=$_POST['id'];
	$count_arr=count($_POST['product']);

	$null="0";
	$query_null = "UPDATE `preorder_willingness` SET `shop_one`='".$null."', `shop_two`='".$null."', `shop_three`='".$null."', `shop_four`='".$null."' WHERE `call_id`='".$id."'";
	$res_null = mysql_query($query_null) ;

	for($i=0;$i<$count_arr;$i++)
		{
			if($_POST['delete_'.$i.'']!='on')
				{

					$product = htmlspecialchars($_POST['product'][$i]);
					$product = mysql_escape_string($product);

					$count = htmlspecialchars($_POST['count'][$i]);
					$count = mysql_escape_string($count);

					$price = htmlspecialchars($_POST['price'][$i]);
					$price = mysql_escape_string($price);

					$category = htmlspecialchars($_POST['category'][$i]);
					$category = mysql_escape_string($category);

					if($category=="1"){$shop_one="1";}
					if($category=="2"){$shop_two="1";}
					if($category=="3"){$shop_three="1";}
					if($category=="4"){$shop_four="1";}

					if($category=="1")
					{
						$query = "UPDATE `preorder_willingness` SET `shop_one`='".$shop_one."' WHERE `call_id`='".$id."'";
						$res = mysql_query($query) ;
					}
					if($category=="2")
					{
						$query = "UPDATE `preorder_willingness` SET `shop_two`='".$shop_two."'  WHERE `call_id`='".$id."'";
						$res = mysql_query($query) ;
					}
					if($category=="3")
					{
						$query = "UPDATE `preorder_willingness` SET `shop_three`='".$shop_three."' WHERE `call_id`='".$id."'";
						$res = mysql_query($query) ;
					}
					if($category=="4")
					{
						$query = "UPDATE `preorder_willingness` SET `shop_four`='".$shop_four."' WHERE `call_id`='".$id."'";
						$res = mysql_query($query) ;
					}

					$count = preg_replace('/[^0-9.]/','',$count);
					$price = preg_replace('/[^0-9.]/','',$price);

					$order.=''.$product.'|'.$count.'|'.$price.'|'.$category.'/';
				}
		}

	//echo $order;

//Получение логина менеджера
$query_manager_name = "SELECT login FROM `users` WHERE id='".$manager."'";
$res_manager_name = mysql_query($query_manager_name) or die(mysql_error());
$result_manager_name = mysql_fetch_array($res_manager_name);
$manager_name=$result_manager_name['login'];

$query = "UPDATE `scroll_call` SET `order_content`='".$order."', `date_update`='".$date_update."' WHERE id='".$id."'";
$res = mysql_query($query) ;

if($res==1)
	{
		$text="".$date_update.": Менеджер ".$manager_name." отредактировал заказ";
		$query_log = "INSERT INTO log (`call_id`,`text_log`) VALUES ('".$id."','".$text."')";
		$res_log = mysql_query($query_log) ; 
		//Добавление комментария звонка
		$query = "INSERT INTO coment_call (`call_id`,`manager`,`coment`) VALUES ('".$id."','".$manager."','".$comment."')";
		$res = mysql_query($query);
		echo '<center><div class="nNote nSuccess hideit" style="width:946px;"><p><strong>Успех: </strong>Редактирование заказа прошло успешно!</p></div></center>';	
	}
else
	{
		//Вывод ошибки
		echo '<center><div class="nNote nFailure  hideit" style="width:946px;"><p><strong>Ошибка: </strong>Свяжитесь с администратором!</p></div></center>';	
	}	
?>