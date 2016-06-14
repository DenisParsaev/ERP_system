<?php
include '../include/config.php';

$type=$_GET['type'];

if($type==1)
    {
        $count=count($_POST['wire_diameter']);
        for($i=0;$i<$count;$i++)
            {
                $query = "UPDATE `setting_wire_diameter` SET

                          `cost_galvanized`='".$_POST['cost_galvanized'][$i]."',
                          `mark_5_galvanized`='".$_POST['mark_5_galvanized'][$i]."',
                          `mark_10_galvanized`='".$_POST['mark_10_galvanized'][$i]."',
                          `mark_20_galvanized`='".$_POST['mark_20_galvanized'][$i]."',
                          `mark_50_galvanized`='".$_POST['mark_50_galvanized'][$i]."',
                          `mark_100_galvanized`='".$_POST['mark_100_galvanized'][$i]."',
                          `mark_500_galvanized`='".$_POST['mark_500_galvanized'][$i]."',
                          `mark_1000_galvanized`='".$_POST['mark_1000_galvanized'][$i]."',
                          `mark_5000_galvanized`='".$_POST['mark_5000_galvanized'][$i]."',
                          `price_two_galvanized`='".$_POST['price_two_galvanized'][$i]."',
                          `price_three_galvanized`='".$_POST['price_three_galvanized'][$i]."'

                          WHERE diameter='".$_POST['wire_diameter'][$i]."'";
                $res = mysql_query($query) ;
            }
    }
elseif($type==2)
    {
        $count=count($_POST['wire_diameter']);
        for($i=0;$i<$count;$i++)
        {
            $query = "UPDATE `setting_wire_diameter` SET

                          `cost_black`='".$_POST['cost_black'][$i]."',
                          `mark_5_black`='".$_POST['mark_5_black'][$i]."',
                          `mark_10_black`='".$_POST['mark_10_black'][$i]."',
                          `mark_20_black`='".$_POST['mark_20_black'][$i]."',
                          `mark_50_black`='".$_POST['mark_50_black'][$i]."',
                          `mark_100_black`='".$_POST['mark_100_black'][$i]."',
                          `mark_500_black`='".$_POST['mark_500_black'][$i]."',
                          `mark_1000_black`='".$_POST['mark_1000_black'][$i]."',
                          `mark_5000_black`='".$_POST['mark_5000_black'][$i]."',
                          `price_two_black`='".$_POST['price_two_black'][$i]."',
                          `price_three_black`='".$_POST['price_three_black'][$i]."'

                          WHERE diameter='".$_POST['wire_diameter'][$i]."'";
            $res = mysql_query($query) ;
        }
    }
elseif($type==3)
    {
        $count=count($_POST['wire_diameter']);
        for($i=0;$i<$count;$i++)
        {
            $query = "UPDATE `setting_wire_diameter` SET

                          `cost_soft_galvanized`='".$_POST['cost_soft_galvanized'][$i]."',
                          `mark_soft_5_galvanized`='".$_POST['mark_soft_5_galvanized'][$i]."',
                          `mark_soft_10_galvanized`='".$_POST['mark_soft_10_galvanized'][$i]."',
                          `mark_soft_20_galvanized`='".$_POST['mark_soft_20_galvanized'][$i]."',
                          `mark_soft_50_galvanized`='".$_POST['mark_soft_50_galvanized'][$i]."',
                          `mark_soft_100_galvanized`='".$_POST['mark_soft_100_galvanized'][$i]."',
                          `mark_soft_500_galvanized`='".$_POST['mark_soft_500_galvanized'][$i]."',
                          `mark_soft_1000_galvanized`='".$_POST['mark_soft_1000_galvanized'][$i]."',
                          `mark_soft_5000_galvanized`='".$_POST['mark_soft_5000_galvanized'][$i]."',
                          `price_two_soft_galvanized`='".$_POST['price_two_soft_galvanized'][$i]."',
                          `price_three_soft_galvanized`='".$_POST['price_three_soft_galvanized'][$i]."'

                          WHERE diameter='".$_POST['wire_diameter'][$i]."'";
            $res = mysql_query($query) ;
        }
    }
elseif($type==4)
    {
        $count=count($_POST['wire_diameter']);
        for($i=0;$i<$count;$i++)
        {
            $query = "UPDATE `setting_wire_diameter` SET

                          `cost_soft_black`='".$_POST['cost_soft_black'][$i]."',
                          `mark_soft_5_black`='".$_POST['mark_soft_5_black'][$i]."',
                          `mark_soft_10_black`='".$_POST['mark_soft_10_black'][$i]."',
                          `mark_soft_20_black`='".$_POST['mark_soft_20_black'][$i]."',
                          `mark_soft_50_black`='".$_POST['mark_soft_50_black'][$i]."',
                          `mark_soft_100_black`='".$_POST['mark_soft_100_black'][$i]."',
                          `mark_soft_500_black`='".$_POST['mark_soft_500_black'][$i]."',
                          `mark_soft_1000_black`='".$_POST['mark_soft_1000_black'][$i]."',
                          `mark_soft_5000_black`='".$_POST['mark_soft_5000_black'][$i]."',
                          `price_two_soft_black`='".$_POST['price_two_soft_black'][$i]."',
                          `price_three_soft_black`='".$_POST['price_three_soft_black'][$i]."'

                          WHERE diameter='".$_POST['wire_diameter'][$i]."'";
            $res = mysql_query($query) ;
        }
    }
echo "<script>$.jGrowl('Прайс лист проволоки обновлен!');</script>";
?>