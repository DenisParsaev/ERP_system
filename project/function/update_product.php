<?php

//Добавления продукта в заказ

include '../include/config.php'; 
$id=$_POST['id'];
$manager=$_POST['manager'];
$name_product=$_POST['name_product'];
$price_product=$_POST['price_product'];
$col_product=$_POST['col_product'];
$category_product=$_POST['category'];

$comment=$_POST['comment'];
$date_add=$_POST['date_add'];
$date_update = date("Y-m-d H:i:s"); //Текущя дате

//Получение логина менеджера
$query_manager_name = "SELECT login FROM `users` WHERE id='".$manager."'";
$res_manager_name = mysql_query($query_manager_name) or die(mysql_error());
$result_manager_name = mysql_fetch_array($res_manager_name);
$manager_name=$result_manager_name['login'];

$count_name_product=count($name_product);	

$query_order = "SELECT order_content FROM `scroll_call` WHERE id='".$id."'";
$res_order = mysql_query($query_order) or die(mysql_error());
$result_order = mysql_fetch_array($res_order);
$order=$result_order['order_content'];

for($i=0;$i<$count_name_product;$i++)
{

	$product = htmlspecialchars($name_product[$i]);
	$product = mysql_escape_string($product);

	$count = htmlspecialchars($col_product[$i]);
	$count = mysql_escape_string($count);

	$price = htmlspecialchars($price_product[$i]);
	$price = mysql_escape_string($price);

	$count = preg_replace('/[^0-9.]/','',$count);
	$price = preg_replace('/[^0-9.]/','',$price);

	$category = htmlspecialchars($category_product[$i]);
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

	$order.="".$product."|".$count."|".$price."|".$category."/";
}

$query = "UPDATE `scroll_call` SET `order_content`='".$order."', `date_update`='".$date_update."' WHERE id='".$id."'";
$res = mysql_query($query) ;

if($res==1)
	{
		$text="".$date_update.": Менеджер ".$manager_name." добавил новый товар к заказу";
		$query_log = "INSERT INTO log (`call_id`,`text_log`) VALUES ('".$id."','".$text."')";
		$res_log = mysql_query($query_log) ; 
		//Добавление комментария звонка
		$query = "INSERT INTO coment_call (`call_id`,`manager`,`coment`) VALUES ('".$id."','".$manager."','".$comment."')";
		$res = mysql_query($query);
		echo '<center><div class="nNote nSuccess hideit" style="width:957px;"><p><strong>Успех: </strong>Товар успешно добавлен!</p></div></center>';	
	}
else
	{
		//Вывод ошибки
		echo '<center><div class="nNote nFailure  hideit" style="width:946px;"><p><strong>Ошибка: </strong>Свяжитесь с администратором!</p></div></center>';	
	}

?>