<?php
include '../include/config.php';
$cell=$_POST['cell'];
$count=count($_POST['height_less_meter']);

$j=1;
for($i=0;$i<$count;$i++)
    {
        mysql_select_db("egorovka") or die(mysql_error());
        mysql_set_charset('utf8');

        $query = "SELECT * FROM `setting_wire_diameter` WHERE `diameter`='".$_POST['diameter'][$i]."'";
        $res=mysql_query($query) or die(mysql_error());
        $result = mysql_fetch_array($res);

        $cost_wire_gal=$result['cost_galvanized'];
        $cost_wire_black=$result['cost_black'];



        $height_gal_100=$_POST['fact_weight_gal_100'][$i]*$cost_wire_gal+$_POST['operation_cost_gal_100'][$i]+$_POST['mar_office_gal_100'][$i];
        $height_gal_120=$_POST['fact_weight_gal_120'][$i]*$cost_wire_gal+$_POST['operation_cost_gal_120'][$i]+$_POST['mar_office_gal_120'][$i];
        $height_gal_150=$_POST['fact_weight_gal_150'][$i]*$cost_wire_gal+$_POST['operation_cost_gal_150'][$i]+$_POST['mar_office_gal_150'][$i];
        $height_gal_180=$_POST['fact_weight_gal_180'][$i]*$cost_wire_gal+$_POST['operation_cost_gal_180'][$i]+$_POST['mar_office_gal_180'][$i];
        $height_gal_200=$_POST['fact_weight_gal_200'][$i]*$cost_wire_gal+$_POST['operation_cost_gal_200'][$i]+$_POST['mar_office_gal_200'][$i];

        $height_black_100=$_POST['fact_weight_black_100'][$i]*$cost_wire_black+$_POST['operation_cost_black_100'][$i]+$_POST['mar_office_black_100'][$i];
        $height_black_120=$_POST['fact_weight_black_120'][$i]*$cost_wire_black+$_POST['operation_cost_black_120'][$i]+$_POST['mar_office_black_120'][$i];
        $height_black_150=$_POST['fact_weight_black_150'][$i]*$cost_wire_black+$_POST['operation_cost_black_150'][$i]+$_POST['mar_office_black_150'][$i];
        $height_black_180=$_POST['fact_weight_black_180'][$i]*$cost_wire_black+$_POST['operation_cost_black_180'][$i]+$_POST['mar_office_black_180'][$i];
        $height_black_200=$_POST['fact_weight_black_200'][$i]*$cost_wire_black+$_POST['operation_cost_black_200'][$i]+$_POST['mar_office_black_200'][$i];

        $height_gal_100=ceil($height_gal_100);
        $last_symbol = substr($height_gal_100, -1);
        if($last_symbol==9) {$height_gal_100=$height_gal_100+1;}
        if($last_symbol==8) {$height_gal_100=$height_gal_100+2;}
        if($last_symbol==7) {$height_gal_100=$height_gal_100+3;}
        if($last_symbol==6) {$height_gal_100=$height_gal_100+4;}
        if($last_symbol==5) {$height_gal_100=$height_gal_100;}
        if($last_symbol==4) {$height_gal_100=$height_gal_100+1;}
        if($last_symbol==3) {$height_gal_100=$height_gal_100+2;}
        if($last_symbol==2) {$height_gal_100=$height_gal_100+3;}
        if($last_symbol==1) {$height_gal_100=$height_gal_100+4;}

        $height_black_100=ceil($height_black_100);
        $last_symbol = substr($height_black_100, -1);
        if($last_symbol==9) {$height_black_100=$height_black_100+1;}
        if($last_symbol==8) {$height_black_100=$height_black_100+2;}
        if($last_symbol==7) {$height_black_100=$height_black_100+3;}
        if($last_symbol==6) {$height_black_100=$height_black_100+4;}
        if($last_symbol==5) {$height_black_100=$height_black_100;}
        if($last_symbol==4) {$height_black_100=$height_black_100+1;}
        if($last_symbol==3) {$height_black_100=$height_black_100+2;}
        if($last_symbol==2) {$height_black_100=$height_black_100+3;}
        if($last_symbol==1) {$height_black_100=$height_black_100+4;}

        $height_gal_120=ceil($height_gal_120);
        $last_symbol = substr($height_gal_120, -1);
        if($last_symbol==9) {$height_gal_120=$height_gal_120+1;}
        if($last_symbol==8) {$height_gal_120=$height_gal_120+2;}
        if($last_symbol==7) {$height_gal_120=$height_gal_120+3;}
        if($last_symbol==6) {$height_gal_120=$height_gal_120+4;}
        if($last_symbol==5) {$height_gal_120=$height_gal_120;}
        if($last_symbol==4) {$height_gal_120=$height_gal_120+1;}
        if($last_symbol==3) {$height_gal_120=$height_gal_120+2;}
        if($last_symbol==2) {$height_gal_120=$height_gal_120+3;}
        if($last_symbol==1) {$height_gal_120=$height_gal_120+4;}

        $height_black_120=ceil($height_black_120);
        $last_symbol = substr($height_black_120, -1);
        if($last_symbol==9) {$height_black_120=$height_black_120+1;}
        if($last_symbol==8) {$height_black_120=$height_black_120+2;}
        if($last_symbol==7) {$height_black_120=$height_black_120+3;}
        if($last_symbol==6) {$height_black_120=$height_black_120+4;}
        if($last_symbol==5) {$height_black_120=$height_black_120;}
        if($last_symbol==4) {$height_black_120=$height_black_120+1;}
        if($last_symbol==3) {$height_black_120=$height_black_120+2;}
        if($last_symbol==2) {$height_black_120=$height_black_120+3;}
        if($last_symbol==1) {$height_black_120=$height_black_120+4;}

        $height_gal_150=ceil($height_gal_150);
        $last_symbol = substr($height_gal_150, -1);
        if($last_symbol==9) {$height_gal_150=$height_gal_150+1;}
        if($last_symbol==8) {$height_gal_150=$height_gal_150+2;}
        if($last_symbol==7) {$height_gal_150=$height_gal_150+3;}
        if($last_symbol==6) {$height_gal_150=$height_gal_150+4;}
        if($last_symbol==5) {$height_gal_150=$height_gal_150;}
        if($last_symbol==4) {$height_gal_150=$height_gal_150+1;}
        if($last_symbol==3) {$height_gal_150=$height_gal_150+2;}
        if($last_symbol==2) {$height_gal_150=$height_gal_150+3;}
        if($last_symbol==1) {$height_gal_150=$height_gal_150+4;}

        $height_black_150=ceil($height_black_150);
        $last_symbol = substr($height_black_150, -1);
        if($last_symbol==9) {$height_black_150=$height_black_150+1;}
        if($last_symbol==8) {$height_black_150=$height_black_150+2;}
        if($last_symbol==7) {$height_black_150=$height_black_150+3;}
        if($last_symbol==6) {$height_black_150=$height_black_150+4;}
        if($last_symbol==5) {$height_black_150=$height_black_150;}
        if($last_symbol==4) {$height_black_150=$height_black_150+1;}
        if($last_symbol==3) {$height_black_150=$height_black_150+2;}
        if($last_symbol==2) {$height_black_150=$height_black_150+3;}
        if($last_symbol==1) {$height_black_150=$height_black_150+4;}

        $height_gal_180=ceil($height_gal_180);
        $last_symbol = substr($height_gal_180, -1);
        if($last_symbol==9) {$height_gal_180=$height_gal_180+1;}
        if($last_symbol==8) {$height_gal_180=$height_gal_180+2;}
        if($last_symbol==7) {$height_gal_180=$height_gal_180+3;}
        if($last_symbol==6) {$height_gal_180=$height_gal_180+4;}
        if($last_symbol==5) {$height_gal_180=$height_gal_180;}
        if($last_symbol==4) {$height_gal_180=$height_gal_180+1;}
        if($last_symbol==3) {$height_gal_180=$height_gal_180+2;}
        if($last_symbol==2) {$height_gal_180=$height_gal_180+3;}
        if($last_symbol==1) {$height_gal_180=$height_gal_180+4;}

        $height_black_180=ceil($height_black_180);
        $last_symbol = substr($height_black_180, -1);
        if($last_symbol==9) {$height_black_180=$height_black_180+1;}
        if($last_symbol==8) {$height_black_180=$height_black_180+2;}
        if($last_symbol==7) {$height_black_180=$height_black_180+3;}
        if($last_symbol==6) {$height_black_180=$height_black_180+4;}
        if($last_symbol==5) {$height_black_180=$height_black_180;}
        if($last_symbol==4) {$height_black_180=$height_black_180+1;}
        if($last_symbol==3) {$height_black_180=$height_black_180+2;}
        if($last_symbol==2) {$height_black_180=$height_black_180+3;}
        if($last_symbol==1) {$height_black_180=$height_black_180+4;}

        $height_gal_200=ceil($height_gal_200);
        $last_symbol = substr($height_gal_200, -1);
        if($last_symbol==9) {$height_gal_200=$height_gal_200+1;}
        if($last_symbol==8) {$height_gal_200=$height_gal_200+2;}
        if($last_symbol==7) {$height_gal_200=$height_gal_200+3;}
        if($last_symbol==6) {$height_gal_200=$height_gal_200+4;}
        if($last_symbol==5) {$height_gal_200=$height_gal_200;}
        if($last_symbol==4) {$height_gal_200=$height_gal_200+1;}
        if($last_symbol==3) {$height_gal_200=$height_gal_200+2;}
        if($last_symbol==2) {$height_gal_200=$height_gal_200+3;}
        if($last_symbol==1) {$height_gal_200=$height_gal_200+4;}

        $height_black_200=ceil($height_black_200);
        $last_symbol = substr($height_black_200, -1);
        if($last_symbol==9) {$height_black_200=$height_black_200+1;}
        if($last_symbol==8) {$height_black_200=$height_black_200+2;}
        if($last_symbol==7) {$height_black_200=$height_black_200+3;}
        if($last_symbol==6) {$height_black_200=$height_black_200+4;}
        if($last_symbol==5) {$height_black_200=$height_black_200;}
        if($last_symbol==4) {$height_black_200=$height_black_200+1;}
        if($last_symbol==3) {$height_black_200=$height_black_200+2;}
        if($last_symbol==2) {$height_black_200=$height_black_200+3;}
        if($last_symbol==1) {$height_black_200=$height_black_200+4;}

        mysql_select_db("egorovka_price") or die(mysql_error());
        mysql_set_charset('utf8');

        $query = "UPDATE `rabitz_$cell`
          SET
            `height_less_meter`='".$_POST['height_less_meter'][$i]."',

            `fact_weight_gal_100`='".$_POST['fact_weight_gal_100'][$i]."',
            `operation_cost_gal_100`='".$_POST['operation_cost_gal_100'][$i]."',
            `mar_office_gal_100`='".$_POST['mar_office_gal_100'][$i]."',
            `height_gal_100`='".$height_gal_100."',

            `fact_weight_black_100`='".$_POST['fact_weight_black_100'][$i]."',
            `operation_cost_black_100`='".$_POST['operation_cost_black_100'][$i]."',
            `mar_office_black_100`='".$_POST['mar_office_black_100'][$i]."',
            `height_black_100`='".$height_black_100."',

            `fact_weight_gal_120`='".$_POST['fact_weight_gal_120'][$i]."',
            `operation_cost_gal_120`='".$_POST['operation_cost_gal_120'][$i]."',
            `mar_office_gal_120`='".$_POST['mar_office_gal_120'][$i]."',
            `height_gal_120`='".$height_gal_120."',

            `fact_weight_black_120`='".$_POST['fact_weight_black_120'][$i]."',
            `operation_cost_black_120`='".$_POST['operation_cost_black_120'][$i]."',
            `mar_office_black_120`='".$_POST['mar_office_black_120'][$i]."',
            `height_black_120`='".$height_black_120."',

            `fact_weight_gal_150`='".$_POST['fact_weight_gal_150'][$i]."',
            `operation_cost_gal_150`='".$_POST['operation_cost_gal_150'][$i]."',
            `mar_office_gal_150`='".$_POST['mar_office_gal_150'][$i]."',
            `height_gal_150`='".$height_gal_150."',

            `fact_weight_black_150`='".$_POST['fact_weight_black_150'][$i]."',
            `operation_cost_black_150`='".$_POST['operation_cost_black_150'][$i]."',
            `mar_office_black_150`='".$_POST['mar_office_black_150'][$i]."',
            `height_black_150`='".$height_black_150."',

            `fact_weight_gal_180`='".$_POST['fact_weight_gal_180'][$i]."',
            `operation_cost_gal_180`='".$_POST['operation_cost_gal_180'][$i]."',
            `mar_office_gal_180`='".$_POST['mar_office_gal_180'][$i]."',
            `height_gal_180`='".$height_gal_180."',

            `fact_weight_black_180`='".$_POST['fact_weight_black_180'][$i]."',
            `operation_cost_black_180`='".$_POST['operation_cost_black_180'][$i]."',
            `mar_office_black_180`='".$_POST['mar_office_black_180'][$i]."',
            `height_black_180`='".$height_black_180."',

            `fact_weight_gal_200`='".$_POST['fact_weight_gal_200'][$i]."',
            `operation_cost_gal_200`='".$_POST['operation_cost_gal_200'][$i]."',
            `mar_office_gal_200`='".$_POST['mar_office_gal_200'][$i]."',
            `height_gal_200`='".$height_gal_200."',

            `fact_weight_black_200`='".$_POST['fact_weight_black_200'][$i]."',
            `operation_cost_black_200`='".$_POST['operation_cost_black_200'][$i]."',
            `mar_office_black_200`='".$_POST['mar_office_black_200'][$i]."',
            `height_black_200`='".$height_black_200."',

            `height_more_two`='".$_POST['height_more_two'][$i]."',
            `height_more_three`='".$_POST['height_more_three'][$i]."',
            `percent_price_one`='".$_POST['percent_price_one'][$i]."',
            `percent_price_two`='".$_POST['percent_price_two'][$i]."'
          WHERE `id`='".$j."'
          ";
        $res=mysql_query($query) or die(mysql_error());
        $j++;
    }
echo "<script>$.jGrowl('Прайс ячейки [".$cell."] обновлен!');</script>";
?>