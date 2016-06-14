<?php

//Авторизация

session_start();
include '../include/config.php'; 
$name=$_POST['login'];
$password=$_POST['password'];

$query = "SELECT * FROM `users` WHERE login='".$name."' AND password='".$password."'";
$res = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($res);

if($row['id']=="")
	{
		echo '<center><div class="nNote nWarning hideit" style="width:300px;margin-top:0px;">
                <p><strong>Неверные данные ввода!</strong></p>
            </div></center>';
	}
elseif($row['activity']!="1")
	{
		echo '<center><div class="nNote nFailure hideit" style="width:300px;margin-top:0px;">
                <p><strong>Профиль заблокирован!</strong></p>
            </div></center>';
	}	
else
	{
		$_SESSION['id']=$row['id'];
		$_SESSION['login']=$row['login'];
		$_SESSION['full_name']=$row['full_name'];
		$_SESSION['access']=$row['access'];
		$_SESSION['responsibility']=$row['responsibility'];
		
		$now = date("d-m-Y H:i:s"); 
		
		$query = "UPDATE `users` SET `last_enter`='".$now."' WHERE `id`='".$row['id']."'";
		$res = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($res);
		
		echo '<script language="JavaScript">window.location.href = "/home.php"</script>';
	}	


?>