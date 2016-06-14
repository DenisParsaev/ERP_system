<?php 
include '../include/config.php'; 
$name=$_POST['name'];
$category_id=$_POST['category'];

$query = "INSERT INTO disassembly_subcategory (`name`,`category_id`) VALUES('".$name."','".$category_id."')";

$res = mysql_query($query) ;
$row = mysql_fetch_array($res);

if($res==1)
	{
		echo '<script>document.getElementById("name_sub").value="";document.getElementById("name_sub").focus();</script><center><div class="nNote nSuccess hideit" style="width:600px;"><p><strong>Успех: </strong>Подкатегория <b>'.$name.'</b> успешно добавлена!</p></div></center>';	
	}
else
	{
        echo '<center><div class="nNote nFailure  hideit" style="width:600px;"><p><strong>Ошибка: </strong>Свяжитесь с администратором!</p></div></center>';	
	}


?>