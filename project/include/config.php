<?php 
$host='localhost';
$database='';
$user='';
$pswd='';
$dbh = mysql_connect($host, $user, $pswd) or die("Не могу соединиться с MySQL.");
mysql_select_db("".$database."") or die(mysql_error());
mysql_set_charset('utf8'); 
?>