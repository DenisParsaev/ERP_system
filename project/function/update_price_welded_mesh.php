<?php
print_r($_POST);
include '../include/config.php';
$count=count($_POST['wire_diameter']);
$j=1;
for($i=0;$i<$count;$i++)
{
    mysql_select_db("egorovka") or die(mysql_error());
    mysql_set_charset('utf8');

    $diamter=''.$_POST['wire_diameter'][$i].' [ВР]';

    $query = "SELECT * FROM `setting_wire_diameter` WHERE `diameter`='".$diamter."'";
    $res=mysql_query($query) or die(mysql_error());
    $result = mysql_fetch_array($res);
    echo $cost_wire_black=$result['cost_black'];

    $size_40=$_POST['fact_size_40'][$i]*$cost_wire_black+$_POST['operation_size_40'][$i]+$_POST['mark_size_40'][$i];
    $size_50=$_POST['fact_size_50'][$i]*$cost_wire_black+$_POST['operation_size_50'][$i]+$_POST['mark_size_50'][$i];
    $size_100=$_POST['fact_size_100'][$i]*$cost_wire_black+$_POST['operation_size_100'][$i]+$_POST['mark_size_100'][$i];
    //echo '<br>';
    mysql_select_db("egorovka_price") or die(mysql_error());
    mysql_set_charset('utf8');

    $query = "UPDATE `welded_mesh`
          SET

            `fact_size_40`='".$_POST['fact_size_40'][$i]."',
            `operation_size_40`='".$_POST['operation_size_40'][$i]."',
            `mark_size_40`='".$_POST['mark_size_40'][$i]."',
            `size_40`='".$size_40."',

            `fact_size_50`='".$_POST['fact_size_50'][$i]."',
            `operation_size_50`='".$_POST['operation_size_50'][$i]."',
            `mark_size_50`='".$_POST['mark_size_50'][$i]."',
            `size_50`='".$size_50."',

            `fact_size_100`='".$_POST['fact_size_100'][$i]."',
            `operation_size_100`='".$_POST['operation_size_100'][$i]."',
            `mark_size_100`='".$_POST['mark_size_100'][$i]."',
            `size_100`='".$size_100."',

            `price_two`='".$_POST['price_two'][$i]."',
            `price_three`='".$_POST['price_three'][$i]."'
          WHERE `id`='".$j."'
          ";
    $res=mysql_query($query) or die(mysql_error());
    $j++;
}
echo "<script>$.jGrowl('Прайс армосетки обновлен!');</script>";
?>