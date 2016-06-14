<?php 
include '../include/config.php'; 
$name=$_POST['name'];

$query = "INSERT INTO disassembly_category (`name`) VALUES('".$name."')";

$res = mysql_query($query) ;
$row = mysql_fetch_array($res);

if($res==1)
	{

		echo '<script>document.getElementById("name_zapchast").value="";</script><center><div class="nNote nSuccess hideit" style="width:600px;"><p><strong>Успех: </strong>Категория <b>'.$name.'</b> успешно добавлена!</p></div></center>';	
	}
else
	{
        echo '<center><div class="nNote nFailure  hideit" style="width:600px;"><p><strong>Ошибка: </strong>Свяжитесь с администратором!</p></div></center>';	
	}
 

?>