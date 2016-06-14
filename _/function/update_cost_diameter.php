<?php
include '../include/config.php';
$cink=$_POST['cink'];
$black=$_POST['black'];
$diameter = array("1.2", "1.4", "1.5", "1.6", "1.7", "1.8", "1.9", "2.0", "2.2", "2.3", "2.4", "2.5", "2.7", "2.8", "3.0", "3.5", "3.6", "3.8", "4.0", "4.5", "5.0", "ПВХ");
$count=count($cink);

for($i=0;$i<$count;$i++)
{
    if($cink[$i]!="" || $black[$i]!="")
        {
            if($cink[$i]!="" && $black[$i]=="")
                {
                    echo $query = "UPDATE `price_rabica` SET `cost_wire_cink`='".$cink[$i]."' WHERE diameter='".$diameter[$i]."'";
                    $res = mysql_query($query) ;
                }
            elseif($cink[$i]=="" && $black[$i]!="")
                {
                    $query = "UPDATE `price_rabica` SET `cost_wire_black`='".$black[$i]."' WHERE diameter='".$diameter[$i]."'";
                    $res = mysql_query($query) ;
                }
            else
                {
                    $query = "UPDATE `price_rabica` SET `cost_wire_cink`='".$cink[$i]."', `cost_wire_black`='".$black[$i]."' WHERE diameter='".$diameter[$i]."'";
                    $res = mysql_query($query) ;
                }
        }
}
echo "<script>$.jGrowl('Стоимось проволоки обновлена!');</script>";
?>