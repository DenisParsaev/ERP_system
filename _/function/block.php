<?php

//Блокирование пользователя

session_start();
if($_SESSION['id']!="" & $_SESSION['access']=="1")
	{
		$id=$_GET['id'];
		include($_SERVER['DOCUMENT_ROOT'] . '/include/config.php');
		$query = "SELECT activity FROM `users` WHERE id='".$id."'";
		$res = mysql_query($query) or die(mysql_error());
		$result = mysql_fetch_array($res);
		$activity=$result['activity'];
		
		if($activity=="0")
			{
				$query = "UPDATE `users` SET `activity`='1'";
				$res = mysql_query($query) or die(mysql_error());
				$row = mysql_fetch_array($res);
				echo '<script type="text/javascript" language="javascript">history.back()</script>';
			}
		else
			{
				$query = "UPDATE `users` SET `activity`='0'";
				$res = mysql_query($query) or die(mysql_error());
				$row = mysql_fetch_array($res);	
				echo '<script type="text/javascript" language="javascript">history.back()</script>';				
			}
	}
?>