<?php
include '../include/config.php';
$target=$_POST['target'];
$data=$_POST['data'];
$parts_id=$_POST['parts_id'];

if($target=="1")
    {
        $query = "UPDATE `disassembly_parts` SET `price_one`='".$data."' WHERE `id`='".$parts_id."'";
        $res = mysql_query($query) ;
        echo "<script>$.jGrowl('Стоимость [Прайс #1] успешно обновлена!');</script>";
    }
if($target=="2")
    {
        $query = "UPDATE `disassembly_parts` SET `price_two`='".$data."' WHERE `id`='".$parts_id."'";
        $res = mysql_query($query) ;
        echo "<script>$.jGrowl('Стоимость [Прайс #2] успешно обновлена!');</script>";
    }
if($target=="3")
    {
        $query = "UPDATE `disassembly_parts` SET `price_three`='".$data."' WHERE `id`='".$parts_id."'";
        $res = mysql_query($query) ;
        echo "<script>$.jGrowl('Стоимость [Прайс #3] успешно обновлена!');</script>";
    }
if($target=="4")
    {
        $query = "UPDATE `disassembly_parts` SET `count`='".$data."' WHERE `id`='".$parts_id."'";
        $res = mysql_query($query) ;
        echo "<script>$.jGrowl('Колличество товара успешно обновлено!');</script>";
    }