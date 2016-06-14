<?php
include '../include/config.php';
$id=$_GET['id'];

$query_stat = "DELETE FROM table_prepay WHERE id='".$id."'";
$res_stat = mysql_query($query_stat);

echo '<script language="JavaScript">history.back()</script>';