<?php
include '../include/config.php';
$dollar_exchange=$_POST['dollar_exchange'];
$percent_manager=$_POST['percent_manager'];
$percent_managing=$_POST['percent_managing'];

$query = "UPDATE `setting` SET `dollar_exchange`='".$dollar_exchange."', `percent_manager`='".$percent_manager."', `percent_managing`='".$percent_managing."'";
$res = mysql_query($query) ;
echo "<script>$.jGrowl('Настройки сохранены!');</script>";
