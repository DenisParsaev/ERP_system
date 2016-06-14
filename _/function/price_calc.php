<?php
//print_r($_POST);
//$arr=array('100','120','180','200');
$cell=$_GET['cell'];
$count=count($_POST['fact_weight_black_150']);
$count=$count+2;
$j=0;
for($i=1;$i<=$count;$i++)
    {
        $fact_gal=$_POST['fact_weight_gal_150'][$j];
        $fact_black=$_POST['fact_weight_black_150'][$j];

        $fact_gal_100=$fact_gal/15*10;
        $fact_black_100=$fact_black/15*10;

        $fact_gal_120=$fact_gal/15*12;
        $fact_black_120=$fact_black/15*12;

        $fact_gal_180=$fact_gal/15*18;
        $fact_black_180=$fact_black/15*18;

        $fact_gal_200=$fact_gal/15*20;
        $fact_black_200=$fact_black/15*20;

        $fact_gal_100=round($fact_gal_100, 1, PHP_ROUND_HALF_EVEN);
        $fact_black_100=round($fact_black_100, 1, PHP_ROUND_HALF_EVEN);
        $fact_gal_120=round($fact_gal_120, 1, PHP_ROUND_HALF_EVEN);
        $fact_black_120=round($fact_black_120, 1, PHP_ROUND_HALF_EVEN);
        $fact_gal_180=round($fact_gal_180, 1, PHP_ROUND_HALF_EVEN);
        $fact_black_180=round($fact_black_180, 1, PHP_ROUND_HALF_EVEN);
        $fact_gal_200=round($fact_gal_200, 1, PHP_ROUND_HALF_EVEN);
        $fact_black_200=round($fact_black_200, 1, PHP_ROUND_HALF_EVEN);

        $last_symbol = substr($fact_gal_100, -1);
        if($last_symbol==9) {$fact_gal_100=$fact_gal_100+0.1;}
        if($last_symbol==8) {$fact_gal_100=$fact_gal_100+0.1;}
        if($last_symbol==7) {$fact_gal_100=$fact_gal_100+0.1;}
        if($last_symbol==6) {$fact_gal_100=$fact_gal_100+0.1;}
        if($last_symbol==5) {$fact_gal_100=$fact_gal_100+0.1;}
        if($last_symbol==4) {$fact_gal_100=$fact_gal_100+0.1;}
        if($last_symbol==3) {$fact_gal_100=$fact_gal_100+0.1;}
        if($last_symbol==2) {$fact_gal_100=$fact_gal_100+0.1;}
        if($last_symbol==1) {$fact_gal_100=$fact_gal_100+0.1;}

        $last_symbol = substr($fact_black_100, -1);
        if($last_symbol==9) {$fact_black_100=$fact_black_100+0.1;}
        if($last_symbol==8) {$fact_black_100=$fact_black_100+0.1;}
        if($last_symbol==7) {$fact_black_100=$fact_black_100+0.1;}
        if($last_symbol==6) {$fact_black_100=$fact_black_100+0.1;}
        if($last_symbol==5) {$fact_black_100=$fact_black_100+0.1;}
        if($last_symbol==4) {$fact_black_100=$fact_black_100+0.1;}
        if($last_symbol==3) {$fact_black_100=$fact_black_100+0.1;}
        if($last_symbol==2) {$fact_black_100=$fact_black_100+0.1;}
        if($last_symbol==1) {$fact_black_100=$fact_black_100+0.1;}

        $last_symbol = substr($fact_gal_120, -1);
        if($last_symbol==9) {$fact_gal_120=$fact_gal_120+0.1;}
        if($last_symbol==8) {$fact_gal_120=$fact_gal_120+0.1;}
        if($last_symbol==7) {$fact_gal_120=$fact_gal_120+0.1;}
        if($last_symbol==6) {$fact_gal_120=$fact_gal_120+0.1;}
        if($last_symbol==5) {$fact_gal_120=$fact_gal_120+0.1;}
        if($last_symbol==4) {$fact_gal_120=$fact_gal_120+0.1;}
        if($last_symbol==3) {$fact_gal_120=$fact_gal_120+0.1;}
        if($last_symbol==2) {$fact_gal_120=$fact_gal_120+0.1;}
        if($last_symbol==1) {$fact_gal_120=$fact_gal_120+0.1;}

        $last_symbol = substr($fact_black_120, -1);
        if($last_symbol==9) {$fact_black_120=$fact_black_120+0.1;}
        if($last_symbol==8) {$fact_black_120=$fact_black_120+0.1;}
        if($last_symbol==7) {$fact_black_120=$fact_black_120+0.1;}
        if($last_symbol==6) {$fact_black_120=$fact_black_120+0.1;}
        if($last_symbol==5) {$fact_black_120=$fact_black_120+0.1;}
        if($last_symbol==4) {$fact_black_120=$fact_black_120+0.1;}
        if($last_symbol==3) {$fact_black_120=$fact_black_120+0.1;}
        if($last_symbol==2) {$fact_black_120=$fact_black_120+0.1;}
        if($last_symbol==1) {$fact_black_120=$fact_black_120+0.1;}

        $last_symbol = substr($fact_gal_180, -1);
        if($last_symbol==9) {$fact_gal_180=$fact_gal_180+0.1;}
        if($last_symbol==8) {$fact_gal_180=$fact_gal_180+0.1;}
        if($last_symbol==7) {$fact_gal_180=$fact_gal_180+0.1;}
        if($last_symbol==6) {$fact_gal_180=$fact_gal_180+0.1;}
        if($last_symbol==5) {$fact_gal_180=$fact_gal_180+0.1;}
        if($last_symbol==4) {$fact_gal_180=$fact_gal_180+0.1;}
        if($last_symbol==3) {$fact_gal_180=$fact_gal_180+0.1;}
        if($last_symbol==2) {$fact_gal_180=$fact_gal_180+0.1;}
        if($last_symbol==1) {$fact_gal_180=$fact_gal_180+0.1;}

        $last_symbol = substr($fact_black_180, -1);
        if($last_symbol==9) {$fact_black_180=$fact_black_180+0.1;}
        if($last_symbol==8) {$fact_black_180=$fact_black_180+0.1;}
        if($last_symbol==7) {$fact_black_180=$fact_black_180+0.1;}
        if($last_symbol==6) {$fact_black_180=$fact_black_180+0.1;}
        if($last_symbol==5) {$fact_black_180=$fact_black_180+0.1;}
        if($last_symbol==4) {$fact_black_180=$fact_black_180+0.1;}
        if($last_symbol==3) {$fact_black_180=$fact_black_180+0.1;}
        if($last_symbol==2) {$fact_black_180=$fact_black_180+0.1;}
        if($last_symbol==1) {$fact_black_180=$fact_black_180+0.1;}

        $last_symbol = substr($fact_gal_200, -1);
        if($last_symbol==9) {$fact_gal_200=$fact_gal_200+0.1;}
        if($last_symbol==8) {$fact_gal_200=$fact_gal_200+0.1;}
        if($last_symbol==7) {$fact_gal_200=$fact_gal_200+0.1;}
        if($last_symbol==6) {$fact_gal_200=$fact_gal_200+0.1;}
        if($last_symbol==5) {$fact_gal_200=$fact_gal_200+0.1;}
        if($last_symbol==4) {$fact_gal_200=$fact_gal_200+0.1;}
        if($last_symbol==3) {$fact_gal_200=$fact_gal_200+0.1;}
        if($last_symbol==2) {$fact_gal_200=$fact_gal_200+0.1;}
        if($last_symbol==1) {$fact_gal_200=$fact_gal_200+0.1;}

        $last_symbol = substr($fact_black_200, -1);
        if($last_symbol==9) {$fact_black_200=$fact_black_200+0.1;}
        if($last_symbol==8) {$fact_black_200=$fact_black_200+0.1;}
        if($last_symbol==7) {$fact_black_200=$fact_black_200+0.1;}
        if($last_symbol==6) {$fact_black_200=$fact_black_200+0.1;}
        if($last_symbol==5) {$fact_black_200=$fact_black_200+0.1;}
        if($last_symbol==4) {$fact_black_200=$fact_black_200+0.1;}
        if($last_symbol==3) {$fact_black_200=$fact_black_200+0.1;}
        if($last_symbol==2) {$fact_black_200=$fact_black_200+0.1;}
        if($last_symbol==1) {$fact_black_200=$fact_black_200+0.1;}

        echo "<script>$('#fact_weight_gal_100_".$i."_".$cell."').val('".$fact_gal_100."');</script>";
        echo "<script>$('#fact_weight_black_100_".$i."_".$cell."').val('".$fact_black_100."');</script>";

        echo "<script>$('#fact_weight_gal_120_".$i."_".$cell."').val('".$fact_gal_120."');</script>";
        echo "<script>$('#fact_weight_black_120_".$i."_".$cell."').val('".$fact_black_120."');</script>";

        echo "<script>$('#fact_weight_gal_180_".$i."_".$cell."').val('".$fact_gal_180."');</script>";
        echo "<script>$('#fact_weight_black_180_".$i."_".$cell."').val('".$fact_black_180."');</script>";

        echo "<script>$('#fact_weight_gal_200_".$i."_".$cell."').val('".$fact_gal_200."');</script>";
        echo "<script>$('#fact_weight_black_200_".$i."_".$cell."').val('".$fact_black_200."');</script>";



        //echo '<pre>';
        //echo ''.$fact_gal.'|'.$fact_black.'';
        //echo '</pre>';
        $j++;

    }
echo "<script>$.jGrowl('Фактовый ячейки [".$cell."] обновлен!');</script>";
