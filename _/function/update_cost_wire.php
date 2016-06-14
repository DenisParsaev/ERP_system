<?php
include '../include/config.php';
$count=count($_POST['wire_diameter']);

for($i=0;$i<$count;$i++)
    {
        $cost_galvanized=$_POST['cost_galvanized'][$i];
        $cost_black=$_POST['cost_black'][$i];
        $diameter=$_POST['wire_diameter'][$i];

        $query = "UPDATE `setting_wire_diameter` SET `cost_galvanized`='".$cost_galvanized."', `cost_black`='".$cost_black."'  WHERE `diameter`='".$diameter."'";
        $res = mysql_query($query) ;

        //echo mysql_errno() . ": " . mysql_error() . "\n";
    }

echo "<script>$.jGrowl('Стоимость проволоки обновлена!');</script>";
?>