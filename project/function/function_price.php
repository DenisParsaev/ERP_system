<?php
include('../include/config.php');

function echo_price_three($cell)
{
    ?>
    <input type="hidden" id="cell" name="cell" value="<?php echo $cell;?>">
    <div class="head"><h5 class="iFrames">Таблица прайс-листа <?php echo $cell;?>-ки</h5></div>
    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
        <thead>
        <tr>
            <td style="width: 50px;">Ø</td>
            <td style="width: 50px;">0<1</td>
            <td style="width: 170px;"><?php echo $cell;?>х1</td>
            <td style="width: 170px;"><?php echo $cell;?>х1.2</td>
            <td style="width: 170px;"><?php echo $cell;?>х1.5</td>
            <td style="width: 170px;"><?php echo $cell;?>х1.8</td>
            <td style="width: 170px;"><?php echo $cell;?>х2</td>
            <td style="width: 50px;">2>3</td>
            <td style="width: 50px;">3>~</td>
        </tr>
        </thead>
        <tbody>
        <?php
        mysql_select_db("egorovka_price") or die(mysql_error());
        mysql_set_charset('utf8');
        $query = "SELECT * FROM `rabitz_".$cell."`";
        $res= mysql_query($query) or die(mysql_error());

        while ($result = mysql_fetch_array($res))
        {

            $height_gal_100=$result['height_gal_100']/100*$result['percent_price_two']+$result['height_gal_100'];
            $height_black_100=$result['height_black_100']/100*$result['percent_price_two']+$result['height_black_100'];
            $height_gal_120=$result['height_gal_120']/100*$result['percent_price_two']+$result['height_gal_120'];
            $height_black_120=$result['height_black_120']/100*$result['percent_price_two']+$result['height_black_120'];
            $height_gal_150=$result['height_gal_150']/100*$result['percent_price_two']+$result['height_gal_150'];
            $height_black_150=$result['height_black_150']/100*$result['percent_price_two']+$result['height_black_150'];
            $height_gal_180=$result['height_gal_180']/100*$result['percent_price_two']+$result['height_gal_180'];
            $height_black_180=$result['height_black_180']/100*$result['percent_price_two']+$result['height_black_180'];
            $height_gal_200=$result['height_gal_200']/100*$result['percent_price_two']+$result['height_gal_200'];
            $height_black_200=$result['height_black_200']/100*$result['percent_price_two']+$result['height_black_200'];

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

            ?>
            <tr style="border-top: 1px groove black;">
                <td style="width: 55px;border-left: 1px groove black;">
                    <center>
                        <b><?php echo $result['wire_diameter']; ?></b>
                        <input type="hidden" name="diameter[]" value="<?php echo $result['wire_diameter']; ?>">
                    </center>
                </td>
                <td style="width: 55px;border-left: 1px groove black;">
                    <center>
                        <?php echo $result['height_less_meter'];?>%
                    </center>
                </td>
                <td style="width: 140px;border-left: 1px groove black;">
                    <table width="100%" cellpadding="2" cellspacing="1" style="border: 1px solid #e7e7e7;">
                        <tr>
                            <td style="width: 75px;border-left: 1px groove black;">
                                <center>
                                    <?php echo $height_gal_100; ?>
                                </center>
                            </td>
                            <td style="width: 75px;border-left: 1px groove black;background-color: rgb(235, 235, 228);">
                                <center>
                                    <?php echo $height_black_100; ?>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 140px;border-left: 1px groove black;">
                    <table width="100%" cellpadding="2" cellspacing="1" style="border: 1px solid #e7e7e7;">
                        <tr>
                            <td style="width: 75px;border-left: 1px groove black;">
                                <center>
                                    <?php echo $height_gal_120; ?>
                                </center>
                            </td>
                            <td style="width: 75px;border-left: 1px groove black;background-color: rgb(235, 235, 228);">
                                <center>
                                    <?php echo $height_black_120; ?>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 140px;border-left: 1px groove black;">
                    <table width="100%" cellpadding="2" cellspacing="1" style="border: 1px solid #e7e7e7;">
                        <tr>
                            <td style="width: 75px;border-left: 1px groove black;">
                                <center>
                                    <?php echo $height_gal_150; ?>
                                </center>
                            </td>
                            <td style="width: 75px;border-left: 1px groove black;background-color: rgb(235, 235, 228);">
                                <center>
                                    <?php echo $height_black_150; ?>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 140px;border-left: 1px groove black;">
                    <table width="100%" cellpadding="2" cellspacing="1" style="border: 1px solid #e7e7e7;">
                        <tr>
                            <td style="width: 75px;border-left: 1px groove black;">
                                <center>
                                    <?php echo $height_gal_180; ?>
                                </center>
                            </td>
                            <td style="width: 75px;border-left: 1px groove black;background-color: rgb(235, 235, 228);">
                                <center>
                                    <?php echo $height_black_180; ?>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 140px;border-left: 1px groove black;">
                    <table width="100%" cellpadding="2" cellspacing="1" style="border: 1px solid #e7e7e7;">
                        <tr>
                            <td style="width: 75px;border-left: 1px groove black;">
                                <center>
                                    <?php echo $height_gal_200; ?>
                                </center>
                            </td>
                            <td style="width: 75px;border-left: 1px groove black;background-color: rgb(235, 235, 228);">
                                <center>
                                    <?php echo $height_black_200; ?>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 55px;border-left: 1px groove black;">
                    <center>
                        <?php echo $result['height_more_two'];?>%
                    </center>
                </td>
                <td style="width: 55px;border-left: 1px groove black;">
                    <center>
                        <?php echo $result['height_more_three'];?>%
                    </center>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <?php
}

function echo_price_two($cell)
{
    ?>
    <input type="hidden" id="cell" name="cell" value="<?php echo $cell;?>">
    <div class="head"><h5 class="iFrames">Таблица прайс-листа <?php echo $cell;?>-ки</h5></div>
    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
        <thead>
        <tr>
            <td style="width: 50px;">Ø</td>
            <td style="width: 50px;">0<1</td>
            <td style="width: 170px;"><?php echo $cell;?>х1</td>
            <td style="width: 170px;"><?php echo $cell;?>х1.2</td>
            <td style="width: 170px;"><?php echo $cell;?>х1.5</td>
            <td style="width: 170px;"><?php echo $cell;?>х1.8</td>
            <td style="width: 170px;"><?php echo $cell;?>х2</td>
            <td style="width: 50px;">2>3</td>
            <td style="width: 50px;">3>~</td>
        </tr>
        </thead>
        <tbody>
        <?php
        mysql_select_db("egorovka_price") or die(mysql_error());
        mysql_set_charset('utf8');
        $query = "SELECT * FROM `rabitz_".$cell."`";
        $res= mysql_query($query) or die(mysql_error());

        while ($result = mysql_fetch_array($res))
        {

            $height_gal_100=$result['height_gal_100']/100*$result['percent_price_one']+$result['height_gal_100'];
            $height_black_100=$result['height_black_100']/100*$result['percent_price_one']+$result['height_black_100'];
            $height_gal_120=$result['height_gal_120']/100*$result['percent_price_one']+$result['height_gal_120'];
            $height_black_120=$result['height_black_120']/100*$result['percent_price_one']+$result['height_black_120'];
            $height_gal_150=$result['height_gal_150']/100*$result['percent_price_one']+$result['height_gal_150'];
            $height_black_150=$result['height_black_150']/100*$result['percent_price_one']+$result['height_black_150'];
            $height_gal_180=$result['height_gal_180']/100*$result['percent_price_one']+$result['height_gal_180'];
            $height_black_180=$result['height_black_180']/100*$result['percent_price_one']+$result['height_black_180'];
            $height_gal_200=$result['height_gal_200']/100*$result['percent_price_one']+$result['height_gal_200'];
            $height_black_200=$result['height_black_200']/100*$result['percent_price_one']+$result['height_black_200'];

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

            ?>
            <tr style="border-top: 1px groove black;">
                <td style="width: 55px;border-left: 1px groove black;">
                    <center>
                        <b><?php echo $result['wire_diameter']; ?></b>
                        <input type="hidden" name="diameter[]" value="<?php echo $result['wire_diameter']; ?>">
                    </center>
                </td>
                <td style="width: 55px;border-left: 1px groove black;">
                    <center>
                        <?php echo $result['height_less_meter'];?>%
                    </center>
                </td>
                <td style="width: 140px;border-left: 1px groove black;">
                    <table width="100%" cellpadding="2" cellspacing="1" style="border: 1px solid #e7e7e7;">
                        <tr>
                            <td style="width: 75px;border-left: 1px groove black;">
                                <center>
                                    <?php echo $height_gal_100; ?>
                                </center>
                            </td>
                            <td style="width: 75px;border-left: 1px groove black;background-color: rgb(235, 235, 228);">
                                <center>
                                    <?php echo $height_black_100; ?>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 140px;border-left: 1px groove black;">
                    <table width="100%" cellpadding="2" cellspacing="1" style="border: 1px solid #e7e7e7;">
                        <tr>
                            <td style="width: 75px;border-left: 1px groove black;">
                                <center>
                                    <?php echo $height_gal_120; ?>
                                </center>
                            </td>
                            <td style="width: 75px;border-left: 1px groove black;background-color: rgb(235, 235, 228);">
                                <center>
                                    <?php echo $height_black_120; ?>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 140px;border-left: 1px groove black;">
                    <table width="100%" cellpadding="2" cellspacing="1" style="border: 1px solid #e7e7e7;">
                        <tr>
                            <td style="width: 75px;border-left: 1px groove black;">
                                <center>
                                    <?php echo $height_gal_150; ?>
                                </center>
                            </td>
                            <td style="width: 75px;border-left: 1px groove black;background-color: rgb(235, 235, 228);">
                                <center>
                                    <?php echo $height_black_150; ?>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 140px;border-left: 1px groove black;">
                    <table width="100%" cellpadding="2" cellspacing="1" style="border: 1px solid #e7e7e7;">
                        <tr>
                            <td style="width: 75px;border-left: 1px groove black;">
                                <center>
                                    <?php echo $height_gal_180; ?>
                                </center>
                            </td>
                            <td style="width: 75px;border-left: 1px groove black;background-color: rgb(235, 235, 228);">
                                <center>
                                    <?php echo $height_black_180; ?>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 140px;border-left: 1px groove black;">
                    <table width="100%" cellpadding="2" cellspacing="1" style="border: 1px solid #e7e7e7;">
                        <tr>
                            <td style="width: 75px;border-left: 1px groove black;">
                                <center>
                                    <?php echo $height_gal_200; ?>
                                </center>
                            </td>
                            <td style="width: 75px;border-left: 1px groove black;background-color: rgb(235, 235, 228);">
                                <center>
                                    <?php echo $height_black_200; ?>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 55px;border-left: 1px groove black;">
                    <center>
                        <?php echo $result['height_more_two'];?>%
                    </center>
                </td>
                <td style="width: 55px;border-left: 1px groove black;">
                    <center>
                        <?php echo $result['height_more_three'];?>%
                    </center>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <?php
}

function echo_price($cell)
{
    ?>
    <input type="hidden" id="cell" name="cell" value="<?php echo $cell;?>">
    <div class="head"><h5 class="iFrames">Таблица прайс-листа <?php echo $cell;?>-ки</h5></div>
    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
        <thead>
        <tr>
            <td style="width: 50px;">Ø</td>
            <td style="width: 50px;">0<1</td>
            <td style="width: 170px;"><?php echo $cell;?>х1</td>
            <td style="width: 170px;"><?php echo $cell;?>х1.2</td>
            <td style="width: 170px;"><?php echo $cell;?>х1.5</td>
            <td style="width: 170px;"><?php echo $cell;?>х1.8</td>
            <td style="width: 170px;"><?php echo $cell;?>х2</td>
            <td style="width: 50px;">2>3</td>
            <td style="width: 50px;">3>~</td>
        </tr>
        </thead>
        <tbody>
        <?php
        mysql_select_db("egorovka_price") or die(mysql_error());
        mysql_set_charset('utf8');
        $query = "SELECT * FROM `rabitz_".$cell."`";
        $res= mysql_query($query) or die(mysql_error());

        while ($result = mysql_fetch_array($res))
        {
            ?>
            <tr style="border-top: 1px groove black;">
                <td style="width: 55px;border-left: 1px groove black;">
                    <center>
                        <b><?php echo $result['wire_diameter']; ?></b>
                        <input type="hidden" name="diameter[]" value="<?php echo $result['wire_diameter']; ?>">
                    </center>
                </td>
                <td style="width: 55px;border-left: 1px groove black;">
                    <center>
                        <?php echo $result['height_less_meter'];?>%
                    </center>
                </td>
                <td style="width: 140px;border-left: 1px groove black;">
                    <table width="100%" cellpadding="2" cellspacing="1" style="border: 1px solid #e7e7e7;">
                        <tr>
                            <td style="width: 75px;border-left: 1px groove black;">
                                <center>
                                    <?php echo $result['height_gal_100']; ?>
                                </center>
                            </td>
                            <td style="width: 75px;border-left: 1px groove black;background-color: rgb(235, 235, 228);">
                                <center>
                                    <?php echo $result['height_black_100']; ?>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 140px;border-left: 1px groove black;">
                    <table width="100%" cellpadding="2" cellspacing="1" style="border: 1px solid #e7e7e7;">
                        <tr>
                            <td style="width: 75px;border-left: 1px groove black;">
                                <center>
                                    <?php echo $result['height_gal_120']; ?>
                                </center>
                            </td>
                            <td style="width: 75px;border-left: 1px groove black;background-color: rgb(235, 235, 228);">
                                <center>
                                    <?php echo $result['height_black_120']; ?>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 140px;border-left: 1px groove black;">
                    <table width="100%" cellpadding="2" cellspacing="1" style="border: 1px solid #e7e7e7;">
                        <tr>
                            <td style="width: 75px;border-left: 1px groove black;">
                                <center>
                                    <?php echo $result['height_gal_150']; ?>
                                </center>
                            </td>
                            <td style="width: 75px;border-left: 1px groove black;background-color: rgb(235, 235, 228);">
                                <center>
                                    <?php echo $result['height_black_150']; ?>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 140px;border-left: 1px groove black;">
                    <table width="100%" cellpadding="2" cellspacing="1" style="border: 1px solid #e7e7e7;">
                        <tr>
                            <td style="width: 75px;border-left: 1px groove black;">
                                <center>
                                    <?php echo $result['height_gal_180']; ?>
                                </center>
                            </td>
                            <td style="width: 75px;border-left: 1px groove black;background-color: rgb(235, 235, 228);">
                                <center>
                                    <?php echo $result['height_black_180']; ?>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 140px;border-left: 1px groove black;">
                    <table width="100%" cellpadding="2" cellspacing="1" style="border: 1px solid #e7e7e7;">
                        <tr>
                            <td style="width: 75px;border-left: 1px groove black;">
                                <center>
                                    <?php echo $result['height_gal_200']; ?>
                                </center>
                            </td>
                            <td style="width: 75px;border-left: 1px groove black;background-color: rgb(235, 235, 228);">
                                <center>
                                    <?php echo $result['height_black_200']; ?>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 55px;border-left: 1px groove black;">
                    <center>
                        <?php echo $result['height_more_two'];?>%
                    </center>
                </td>
                <td style="width: 55px;border-left: 1px groove black;">
                    <center>
                        <?php echo $result['height_more_three'];?>%
                    </center>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <?php
}

//Прайс колючки
function barbed_price()
{
    ?>
    <div class="head"><h5 class="iFrames">Таблица просчета прайс-листа</h5><div class="num"><a onclick="calc_price_rabiza(<?php echo $cell;?>)" class="blueBtn" style="margin-left: 3px;">Пересчет</a><a onclick="update_price_rabiza(<?php echo $cell;?>)" class="greenNum" style="margin-left: 3px;">Сохранить</a></div></div>
    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
        <thead>
        <tr>
            <td style="width: 70px;">Ø</td>
            <td style="width: 60px;">Оцинкованная</td>
            <td style="width: 100px;">Черная</td>
            <td style="width: 60px;">#2</td>
            <td style="width: 60px;">#3</td>
        </tr>
        </thead>
        <tbody>
        <?php
        mysql_select_db("egorovka_price") or die(mysql_error());
        mysql_set_charset('utf8');
        $query = "SELECT * FROM `welded_mesh`";
        $res= mysql_query($query) or die(mysql_error());
        $i=1;
        while ($result = mysql_fetch_array($res))
        {
            ?>
            <tr style="border-top: 1px groove black;">
                <td style="width: 55px;border-left: 1px groove black;">
                    <center>
                        <b>Ø <?php echo $result['wire_diameter']; ?></b>
                        <input type="hidden" name="wire_diameter[]" value="<?php echo $result['wire_diameter']; ?>">
                    </center>
                </td>
                <td style="border-left: 1px groove black;">
                    <center>
                        <?php echo $result['position']; ?>
                    </center>
                </td>
                <td style="width: 140px;border-left: 1px groove black;">
                    <table width="100%" cellpadding="2" cellspacing="1" style="border: 1px solid #e7e7e7;">
                        <tr>
                            <td>
                                <center>
                                    <input id="fact_size_40_<?php echo ''.$i.'_'.$cell.'';?>" name="fact_size_40[]" type="text" style="font-size: 10px;width:25px;" value="<?php echo $result['fact_size_40']; ?>"/>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <input id="operation_size_40" name="operation_size_40[]" type="text" style="font-size: 10px;width:25px;" value="<?php echo $result['operation_size_40']; ?>"/>
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>
                                    <input id="mark_size_40" name="mark_size_40[]" type="text" style="margin-top: 2px;font-size: 10px;width:25px;" value="<?php echo $result['mark_size_40']; ?>"/>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <div id="size_40"><input style="width: 25px;" type="text" disabled value="<?php echo $result['size_40']; ?>"/></div>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 140px;border-left: 1px groove black;">
                    <table width="100%" cellpadding="2" cellspacing="1" style="border: 1px solid #e7e7e7;">
                        <tr>
                            <td>
                                <center>
                                    <input id="fact_size_50_<?php echo ''.$i.'_'.$cell.'';?>" name="fact_size_50[]" type="text" style="font-size: 10px;width:25px;" value="<?php echo $result['fact_size_50']; ?>"/>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <input id="operation_size_50" name="operation_size_50[]" type="text" style="font-size: 10px;width:25px;" value="<?php echo $result['operation_size_50']; ?>"/>
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>
                                    <input id="mark_size_50" name="mark_size_50[]" type="text" style="margin-top: 2px;font-size: 10px;width:25px;" value="<?php echo $result['mark_size_50']; ?>"/>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <div id="size_50"><input style="width: 25px;" type="text" disabled value="<?php echo $result['size_50']; ?>"/></div>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 140px;border-left: 1px groove black;">
                    <table width="100%" cellpadding="2" cellspacing="1" style="border: 1px solid #e7e7e7;">
                        <tr>
                            <td>
                                <center>
                                    <input id="fact_size_50_<?php echo ''.$i.'_'.$cell.'';?>" name="fact_size_50[]" type="text" style="font-size: 10px;width:25px;" value="<?php echo $result['fact_size_100']; ?>"/>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <input id="operation_size_100" name="operation_size_100[]" type="text" style="font-size: 10px;width:25px;" value="<?php echo $result['operation_size_100']; ?>"/>
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>
                                    <input id="mark_size_100" name="mark_size_100[]" type="text" style="margin-top: 2px;font-size: 10px;width:25px;" value="<?php echo $result['mark_size_100']; ?>"/>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <div id="size_100"><input style="width: 25px;" type="text" disabled value="<?php echo $result['size_100']; ?>"/></div>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="border-left: 1px groove black;">
                    <center>
                        <input id="price_two" name="price_two[]" type="text" style="margin-top: 2px;font-size: 10px;width:13px;" value="<?php echo $result['price_two']; ?>"/> %
                    </center>
                </td>
                <td style="border-left: 1px groove black;">
                    <center>
                        <input id="price_three" name="price_three[]" type="text" style="margin-top: 2px;font-size: 10px;width:13px;" value="<?php echo $result['price_three']; ?>"/> %
                    </center>
                </td>
            </tr>
            <?php
            $i++;
        }
        ?>
        </tbody>
    </table>
    <?php
}

function welded_mesh()
{
    ?>
    <div class="head"><h5 class="iFrames">Таблица прайс-листа Армосетка</h5></div>
    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
        <thead>
        <tr>
            <td style="width: 50px;">Ø</td>
            <td style="width: 50px;">Позиция</td>
            <td style="width: 170px;">0.40 [м]</td>
            <td style="width: 170px;">0.50 [м]</td>
            <td style="width: 170px;">1 [м]</td>
        </tr>
        </thead>
        <tbody>

        <?php
            mysql_select_db("egorovka_price") or die(mysql_error());
            mysql_set_charset('utf8');
            $query = "SELECT * FROM `welded_mesh`";
            $res = mysql_query($query) or die(mysql_error());

            while ($result = mysql_fetch_array($res))
                {
        ?>
                    <tr>
                        <td>
                            <center>
                                Ø <?php echo $result['wire_diameter'];?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?php echo $result['position'];?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?php echo $result['size_40'];?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?php echo $result['size_50'];?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?php echo $result['size_100'];?>
                            </center>
                        </td>
                    </tr>
        <?php
                }
        ?>
        </tbody>
    </table>
    <?php
}

function welded_mesh_two()
{
    ?>
    <div class="head"><h5 class="iFrames">Таблица прайс-листа Армосетка #2</h5></div>
    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
        <thead>
        <tr>
            <td style="width: 50px;">Ø</td>
            <td style="width: 50px;">Позиция</td>
            <td style="width: 170px;">0.40 [м]</td>
            <td style="width: 170px;">0.50 [м]</td>
            <td style="width: 170px;">1 [м]</td>
        </tr>
        </thead>
        <tbody>

        <?php
        mysql_select_db("egorovka_price") or die(mysql_error());
        mysql_set_charset('utf8');
        $query = "SELECT * FROM `welded_mesh`";
        $res = mysql_query($query) or die(mysql_error());

        while ($result = mysql_fetch_array($res))
        {
            ?>
            <tr>
                <td>
                    <center>
                        Ø <?php echo $result['wire_diameter'];?>
                    </center>
                </td>
                <td>
                    <center>
                        <?php echo $result['position'];?>
                    </center>
                </td>
                <td>
                    <center>
                        <?php echo $result['size_40']/100*$result['price_two']+$result['size_40'];?>
                    </center>
                </td>
                <td>
                    <center>
                        <?php echo $result['size_50']/100*$result['price_two']+$result['size_40'];?>
                    </center>
                </td>
                <td>
                    <center>
                        <?php echo $result['size_100']/100*$result['price_two']+$result['size_40'];?>
                    </center>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <?php
}

function welded_mesh_three()
{
    ?>
    <div class="head"><h5 class="iFrames">Таблица прайс-листа Армосетка #3</h5></div>
    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
        <thead>
        <tr>
            <td style="width: 50px;">Ø</td>
            <td style="width: 50px;">Позиция</td>
            <td style="width: 170px;">0.40 [м]</td>
            <td style="width: 170px;">0.50 [м]</td>
            <td style="width: 170px;">1 [м]</td>
        </tr>
        </thead>
        <tbody>

        <?php
        mysql_select_db("egorovka_price") or die(mysql_error());
        mysql_set_charset('utf8');
        $query = "SELECT * FROM `welded_mesh`";
        $res = mysql_query($query) or die(mysql_error());

        while ($result = mysql_fetch_array($res))
        {
            ?>
            <tr>
                <td>
                    <center>
                        Ø <?php echo $result['wire_diameter'];?>
                    </center>
                </td>
                <td>
                    <center>
                        <?php echo $result['position'];?>
                    </center>
                </td>
                <td>
                    <center>
                        <?php echo $result['size_40']/100*$result['price_three']+$result['size_40'];?>
                    </center>
                </td>
                <td>
                    <center>
                        <?php echo $result['size_50']/100*$result['price_three']+$result['size_40'];?>
                    </center>
                </td>
                <td>
                    <center>
                        <?php echo $result['size_100']/100*$result['price_three']+$result['size_40'];?>
                    </center>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <?php
}

//Прайс армосетки
function welded_mesh_price()
{
    ?>
    <div class="head"><h5 class="iFrames">Таблица просчета прайс-листа Армосетка</h5><div class="num"><a onclick="update_price_welded_mesh()" class="greenNum" style="margin-left: 3px;">Сохранить</a></div></div>
    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
        <thead>
        <tr>
            <td style="width: 70px;">Ø</td>
            <td style="width: 60px;">Позиция</td>
            <td style="width: 100px;">0.40 [м]</td>
            <td style="width: 100px;">0.50 [м]</td>
            <td style="width: 100px;">1 [м]</td>
            <td style="width: 60px;">#2</td>
            <td style="width: 60px;">#3</td>
        </tr>
        </thead>
        <tbody>
        <?php
        mysql_select_db("egorovka_price") or die(mysql_error());
        mysql_set_charset('utf8');
        $query = "SELECT * FROM `welded_mesh`";
        $res= mysql_query($query) or die(mysql_error());
        $i=1;
        while ($result = mysql_fetch_array($res))
        {
            ?>
            <tr style="border-top: 1px groove black;">
                <td style="width: 55px;border-left: 1px groove black;">
                    <center>
                        <b>Ø <?php echo $result['wire_diameter']; ?></b>
                        <input type="hidden" name="wire_diameter[]" value="<?php echo $result['wire_diameter']; ?>">
                    </center>
                </td>
                <td style="border-left: 1px groove black;">
                    <center>
                        <?php echo $result['position']; ?>
                    </center>
                </td>
                <td style="width: 140px;border-left: 1px groove black;">
                    <table width="100%" cellpadding="2" cellspacing="1" style="border: 1px solid #e7e7e7;">
                        <tr>
                            <td>
                                <center>
                                    <input id="fact_size_40_<?php echo ''.$i.'_'.$cell.'';?>" name="fact_size_40[]" type="text" style="font-size: 10px;width:25px;" value="<?php echo $result['fact_size_40']; ?>"/>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <input id="operation_size_40" name="operation_size_40[]" type="text" style="font-size: 10px;width:25px;" value="<?php echo $result['operation_size_40']; ?>"/>
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>
                                    <input id="mark_size_40" name="mark_size_40[]" type="text" style="margin-top: 2px;font-size: 10px;width:25px;" value="<?php echo $result['mark_size_40']; ?>"/>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <div id="size_40"><input style="width: 25px;" type="text" disabled value="<?php echo $result['size_40']; ?>"/></div>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 140px;border-left: 1px groove black;">
                    <table width="100%" cellpadding="2" cellspacing="1" style="border: 1px solid #e7e7e7;">
                        <tr>
                            <td>
                                <center>
                                    <input id="fact_size_50_<?php echo ''.$i.'_'.$cell.'';?>" name="fact_size_50[]" type="text" style="font-size: 10px;width:25px;" value="<?php echo $result['fact_size_50']; ?>"/>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <input id="operation_size_50" name="operation_size_50[]" type="text" style="font-size: 10px;width:25px;" value="<?php echo $result['operation_size_50']; ?>"/>
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>
                                    <input id="mark_size_50" name="mark_size_50[]" type="text" style="margin-top: 2px;font-size: 10px;width:25px;" value="<?php echo $result['mark_size_50']; ?>"/>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <div id="size_50"><input style="width: 25px;" type="text" disabled value="<?php echo $result['size_50']; ?>"/></div>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 140px;border-left: 1px groove black;">
                    <table width="100%" cellpadding="2" cellspacing="1" style="border: 1px solid #e7e7e7;">
                        <tr>
                            <td>
                                <center>
                                    <input id="fact_size_100_<?php echo ''.$i.'_'.$cell.'';?>" name="fact_size_100[]" type="text" style="font-size: 10px;width:25px;" value="<?php echo $result['fact_size_100']; ?>"/>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <input id="operation_size_100" name="operation_size_100[]" type="text" style="font-size: 10px;width:25px;" value="<?php echo $result['operation_size_100']; ?>"/>
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>
                                    <input id="mark_size_100" name="mark_size_100[]" type="text" style="margin-top: 2px;font-size: 10px;width:25px;" value="<?php echo $result['mark_size_100']; ?>"/>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <div id="size_100"><input style="width: 25px;" type="text" disabled value="<?php echo $result['size_100']; ?>"/></div>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="border-left: 1px groove black;">
                    <center>
                        <input id="price_two" name="price_two[]" type="text" style="margin-top: 2px;font-size: 10px;width:13px;" value="<?php echo $result['price_two']; ?>"/> %
                    </center>
                </td>
                <td style="border-left: 1px groove black;">
                    <center>
                        <input id="price_three" name="price_three[]" type="text" style="margin-top: 2px;font-size: 10px;width:13px;" value="<?php echo $result['price_three']; ?>"/> %
                    </center>
                </td>
            </tr>
            <?php
            $i++;
        }
        ?>
        </tbody>
    </table>
    <?php
}

//Вывод шаблона редактирования прайса
function echo_template_price($cell)
{
    ?>
    <input type="hidden" id="cell" name="cell" value="<?php echo $cell;?>">
    <div class="head"><h5 class="iFrames">Таблица просчета прайс-листа <?php echo $cell;?>-ки</h5><div class="num"><a onclick="calc_price_rabiza(<?php echo $cell;?>)" class="blueBtn" style="margin-left: 3px;">Пересчет</a><a onclick="update_price_rabiza(<?php echo $cell;?>)" class="greenNum" style="margin-left: 3px;">Сохранить</a></div></div>
    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
        <thead>
        <tr>
            <td style="width: 50px;">Ø</td>
            <td style="width: 50px;">0<1</td>
            <td style="width: 170px;"><?php echo $cell;?>х1</td>
            <td style="width: 170px;"><?php echo $cell;?>х1.2</td>
            <td style="width: 170px;"><?php echo $cell;?>х1.5</td>
            <td style="width: 170px;"><?php echo $cell;?>х1.8</td>
            <td style="width: 170px;"><?php echo $cell;?>х2</td>
            <td style="width: 50px;">2>3</td>
            <td style="width: 50px;">3>~</td>
            <td style="width: 50px;">#2</td>
            <td style="width: 50px;">#3</td>
        </tr>
        </thead>
        <tbody>
        <?php
        mysql_select_db("egorovka_price") or die(mysql_error());
        mysql_set_charset('utf8');
        $query = "SELECT * FROM `rabitz_".$cell."`";
        $res= mysql_query($query) or die(mysql_error());
        $i=1;
        while ($result = mysql_fetch_array($res))
        {
            ?>
            <tr style="border-top: 1px groove black;">
                <td style="width: 55px;border-left: 1px groove black;">
                    <center>
                        <b><?php echo $result['wire_diameter']; ?></b>
                        <input type="hidden" name="diameter[]" value="<?php echo $result['wire_diameter']; ?>">
                    </center>
                </td>
                <td style="border-left: 1px groove black;">
                    <center>
                        <input type="text" id="height_less_meter" name="height_less_meter[]" style="margin-top: 2px;font-size: 10px;width:13px;" value="<?php echo $result['height_less_meter']; ?>"/> %
                    </center>
                </td>
                <td style="width: 140px;border-left: 1px groove black;">
                    <table width="100%" cellpadding="2" cellspacing="1" style="border: 1px solid #e7e7e7;">
                        <tr>
                            <td>
                                <center>
                                    <input id="fact_weight_gal_100_<?php echo ''.$i.'_'.$cell.'';?>" name="fact_weight_gal_100[]" type="text" style="font-size: 10px;width:35px;" value="<?php echo $result['fact_weight_gal_100']; ?>"/>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <input id="operation_cost_gal_100" name="operation_cost_gal_100[]" type="text" style="font-size: 10px;width:35px;" value="<?php echo $result['operation_cost_gal_100']; ?>"/>
                                </center>
                            </td>
                            <td style="border-left: 2px dotted black;" class="back">
                                <center>
                                    <input id="fact_weight_black_100_<?php echo ''.$i.'_'.$cell.'';?>" name="fact_weight_black_100[]" type="text" style="font-size: 10px;width:35px;" value="<?php echo $result['fact_weight_black_100']; ?>"/>
                                </center>
                            </td>
                            <td class="back">
                                <center>
                                    <input id="operation_cost_black_100" name="operation_cost_black_100[]" type="text" style="font-size: 10px;width:35px;" value="<?php echo $result['operation_cost_black_100']; ?>"/>
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>
                                    <input id="mar_office_gal_100" name="mar_office_gal_100[]" type="text" style="margin-top: 2px;font-size: 10px;width:35px;" value="<?php echo $result['mar_office_gal_100']; ?>"/>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <div id="price_gal_100"><input style="width: 35px;" type="text" disabled value="<?php echo $result['height_gal_100']; ?>"/></div>
                                </center>
                            </td>
                            <td style="border-left: 2px dotted black;" class="back">
                                <center>
                                    <input id="mar_office_black_100" name="mar_office_black_100[]" type="text" style="margin-top: 2px;font-size: 10px;width:35px;" value="<?php echo $result['mar_office_black_100']; ?>"/>
                                </center>
                            </td>
                            <td class="back">
                                <center>
                                    <div id="price_black_100"><input style="width: 35px;" type="text" disabled value="<?php echo $result['height_black_100']; ?>"/></div>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 140px;border-left: 1px groove black;">
                    <table width="100%" cellpadding="2" cellspacing="1" style="border: 1px solid #e7e7e7;">
                        <tr>
                            <td>
                                <center>
                                    <input id="fact_weight_gal_120_<?php echo ''.$i.'_'.$cell.'';?>" name="fact_weight_gal_120[]" type="text" style="font-size: 10px;width:35px;" value="<?php echo $result['fact_weight_gal_120']; ?>"/>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <input id="operation_cost_gal_120" name="operation_cost_gal_120[]" type="text" style="font-size: 10px;width:35px;" value="<?php echo $result['operation_cost_gal_120']; ?>"/>
                                </center>
                            </td>
                            <td style="border-left: 2px dotted black;" class="back">
                                <center>
                                    <input id="fact_weight_black_120_<?php echo ''.$i.'_'.$cell.'';?>" name="fact_weight_black_120[]" type="text" style="font-size: 10px;width:35px;" value="<?php echo $result['fact_weight_black_120']; ?>"/>
                                </center>
                            </td>
                            <td class="back">
                                <center>
                                    <input id="operation_cost_black_120" name="operation_cost_black_120[]" type="text" style="font-size: 10px;width:35px;" value="<?php echo $result['operation_cost_black_120']; ?>"/>
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>
                                    <input id="mar_office_gal_120" name="mar_office_gal_120[]" type="text" style="margin-top: 2px;font-size: 10px;width:35px;" value="<?php echo $result['mar_office_gal_120']; ?>"/>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <div id="height_gal_120"><input style="width: 35px;" type="text" disabled value="<?php echo $result['height_gal_120']; ?>"/></div>
                                </center>
                            </td>
                            <td style="border-left: 2px dotted black;" class="back">
                                <center>
                                    <input id="mar_office_black_120" name="mar_office_black_120[]" type="text" style="margin-top: 2px;font-size: 10px;width:35px;" value="<?php echo $result['mar_office_black_120']; ?>"/>
                                </center>
                            </td>
                            <td class="back">
                                <center>
                                    <div id="height_black_120"><input style="width: 35px;" type="text" disabled value="<?php echo $result['height_black_120']; ?>"/></div>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 140px;border-left: 1px groove black;">
                    <table width="100%" cellpadding="2" cellspacing="1" style="border: 1px solid #e7e7e7;">
                        <tr>
                            <td>
                                <center>
                                    <input id="fact_weight_gal_150_<?php echo ''.$i.'_'.$cell.'';?>" name="fact_weight_gal_150[]" type="text" style="font-size: 10px;width:35px;" value="<?php echo $result['fact_weight_gal_150']; ?>"/>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <input id="operation_cost_gal_150" name="operation_cost_gal_150[]" type="text" style="font-size: 10px;width:35px;" value="<?php echo $result['operation_cost_gal_150']; ?>"/>
                                </center>
                            </td>
                            <td style="border-left: 2px dotted black;" class="back">
                                <center>
                                    <input id="fact_weight_black_150_<?php echo ''.$i.'_'.$cell.'';?>" name="fact_weight_black_150[]" type="text" style="font-size: 10px;width:35px;" value="<?php echo $result['fact_weight_black_150']; ?>"/>
                                </center>
                            </td>
                            <td class="back">
                                <center>
                                    <input id="operation_cost_black_150" name="operation_cost_black_150[]" type="text" style="font-size: 10px;width:35px;" value="<?php echo $result['operation_cost_black_150']; ?>"/>
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>
                                    <input id="mar_office_gal_150" name="mar_office_gal_150[]" type="text" style="margin-top: 2px;font-size: 10px;width:35px;" value="<?php echo $result['mar_office_gal_150']; ?>"/>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <div id="height_gal_150"><input style="width: 35px;" type="text" disabled value="<?php echo $result['height_gal_150']; ?>"/></div>
                                </center>
                            </td>
                            <td style="border-left: 2px dotted black;" class="back">
                                <center>
                                    <input id="mar_office_black_150" name="mar_office_black_150[]" type="text" style="margin-top: 2px;font-size: 10px;width:35px;" value="<?php echo $result['mar_office_black_150']; ?>"/>
                                </center>
                            </td>
                            <td class="back">
                                <center>
                                    <div id="height_black_150"><input style="width: 35px;" type="text" disabled value="<?php echo $result['height_black_150']; ?>"/></div>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 140px;border-left: 1px groove black;">
                    <table width="100%" cellpadding="2" cellspacing="1" style="border: 1px solid #e7e7e7;">
                        <tr>
                            <td>
                                <center>
                                    <input id="fact_weight_gal_180_<?php echo ''.$i.'_'.$cell.'';?>" name="fact_weight_gal_180[]" type="text" style="font-size: 10px;width:35px;" value="<?php echo $result['fact_weight_gal_180']; ?>"/>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <input id="operation_cost_gal_180" name="operation_cost_gal_180[]" type="text" style="font-size: 10px;width:35px;" value="<?php echo $result['operation_cost_gal_180']; ?>"/>
                                </center>
                            </td>
                            <td style="border-left: 2px dotted black;" class="back">
                                <center>
                                    <input id="fact_weight_black_180_<?php echo ''.$i.'_'.$cell.'';?>" name="fact_weight_black_180[]" type="text" style="font-size: 10px;width:35px;" value="<?php echo $result['fact_weight_black_180']; ?>"/>
                                </center>
                            </td>
                            <td class="back">
                                <center>
                                    <input id="operation_cost_black_180" name="operation_cost_black_180[]" type="text" style="font-size: 10px;width:35px;" value="<?php echo $result['operation_cost_black_180']; ?>"/>
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>
                                    <input id="mar_office_gal_180" name="mar_office_gal_180[]" type="text" style="margin-top: 2px;font-size: 10px;width:35px;" value="<?php echo $result['mar_office_gal_180']; ?>"/>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <div id="height_gal_180"><input style="width: 35px;" type="text" disabled value="<?php echo $result['height_gal_180']; ?>"/></div>
                                </center>
                            </td>
                            <td style="border-left: 2px dotted black;" class="back">
                                <center>
                                    <input id="mar_office_black_180" name="mar_office_black_180[]" type="text" style="margin-top: 2px;font-size: 10px;width:35px;" value="<?php echo $result['mar_office_black_180']; ?>"/>
                                </center>
                            </td>
                            <td class="back">
                                <center>
                                    <div id="height_black_180"><input style="width: 35px;" type="text" disabled value="<?php echo $result['height_black_180']; ?>"/></div>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 140px;border-left: 1px groove black;">
                    <table width="100%" cellpadding="2" cellspacing="1" style="border: 1px solid #e7e7e7;">
                        <tr>
                            <td>
                                <center>
                                    <input id="fact_weight_gal_200_<?php echo ''.$i.'_'.$cell.'';?>" name="fact_weight_gal_200[]" type="text" style="font-size: 10px;width:35px;" value="<?php echo $result['fact_weight_gal_200']; ?>"/>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <input id="operation_cost_gal_200" name="operation_cost_gal_200[]" type="text" style="font-size: 10px;width:35px;" value="<?php echo $result['operation_cost_gal_200']; ?>"/>
                                </center>
                            </td>
                            <td style="border-left: 2px dotted black;" class="back">
                                <center>
                                    <input id="fact_weight_black_200_<?php echo ''.$i.'_'.$cell.'';?>" name="fact_weight_black_200[]" type="text" style="font-size: 10px;width:35px;" value="<?php echo $result['fact_weight_black_200']; ?>"/>
                                </center>
                            </td>
                            <td class="back">
                                <center>
                                    <input id="operation_cost_black_200" name="operation_cost_black_200[]" type="text" style="font-size: 10px;width:35px;" value="<?php echo $result['operation_cost_black_200']; ?>"/>
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>
                                    <input id="mar_office_gal_200" name="mar_office_gal_200[]" type="text" style="margin-top: 2px;font-size: 10px;width:35px;" value="<?php echo $result['mar_office_gal_200']; ?>"/>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <div id="height_gal_200"><input style="width: 35px;" type="text" disabled value="<?php echo $result['height_gal_200']; ?>"/></div>
                                </center>
                            </td>
                            <td style="border-left: 2px dotted black;" class="back">
                                <center>
                                    <input id="mar_office_black_200" name="mar_office_black_200[]" type="text" style="margin-top: 2px;font-size: 10px;width:35px;" value="<?php echo $result['mar_office_black_200']; ?>"/>
                                </center>
                            </td>
                            <td class="back">
                                <center>
                                    <div id="height_black_200"><input style="width: 35px;" type="text" disabled value="<?php echo $result['height_black_200']; ?>"/></div>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="border-left: 1px groove black;">
                    <center>
                        <input id="height_more_two" name="height_more_two[]" type="text" style="margin-top: 2px;font-size: 10px;width:13px;" value="<?php echo $result['height_more_two']; ?>"/> %
                    </center>
                </td>
                <td style="border-left: 1px groove black;">
                    <center>
                        <input id="height_more_three" name="height_more_three[]" type="text" style="margin-top: 2px;font-size: 10px;width:13px;" value="<?php echo $result['height_more_three']; ?>"/> %
                    </center>
                </td>
                <td style="border-left: 1px groove black;">
                    <center>
                        <input id="percent_price_one" name="percent_price_one[]" type="text" style="margin-top: 2px;font-size: 10px;width:13px;" value="<?php echo $result['percent_price_one']; ?>"/> %
                    </center>
                </td>
                <td style="border-left: 1px groove black;">
                    <center>
                        <input id="percent_price_two" name="percent_price_two[]" type="text" style="margin-top: 2px;font-size: 10px;width:13px;" value="<?php echo $result['percent_price_two']; ?>"/> %
                    </center>
                </td>
            </tr>
            <?php
            $i++;
        }
        ?>
        </tbody>
    </table>
    <?php
}

//Вывод стоимости диаметра
function output_prices($diameter)
{
    mysql_select_db("egorovka") or die(mysql_error());
    mysql_set_charset('utf8');

    $query = "SELECT * FROM `setting_wire_diameter` WHERE `diameter`='".$diameter."'";
    $res=mysql_query($query) or die(mysql_error());
    $result = mysql_fetch_array($res);
    $cink_12=$result_12[2];
}

//Вывод стоимости диаметра
function output_wire($type)
{
    mysql_select_db("egorovka") or die(mysql_error());
    mysql_set_charset('utf8');

    $query = "SELECT * FROM `setting_wire_diameter`";
    $res=mysql_query($query) or die(mysql_error());

    while ($result = mysql_fetch_array($res))
    {
        mysql_select_db("egorovka") or die(mysql_error());
        mysql_set_charset('utf8');

        $query_id = "SELECT id FROM `setting_wire_diameter` WHERE `diameter`='".$result['diameter']."'";
        $res_id=mysql_query($query_id) or die(mysql_error());
        $result_id = mysql_fetch_array($res_id);
        $id=$result_id['id'];

        mysql_select_db("egorovka_stock") or die(mysql_error());
        mysql_set_charset('utf8');

        $query_weight_gal = "SELECT weight_wire FROM `stock_wire` WHERE `diameter`='".$id."' AND `type_wire`='1'";
        $res_weight_gal=mysql_query($query_weight_gal) or die(mysql_error());
        $result_weight_gal = mysql_fetch_array($res_weight_gal);
        $weight_gal=$result_weight_gal['weight_wire'];

        $query_weight_black = "SELECT weight_wire FROM `stock_wire` WHERE `diameter`='".$id."' AND `type_wire`='2'";
        $res_weight_black=mysql_query($query_weight_black) or die(mysql_error());
        $result_weight_black = mysql_fetch_array($res_weight_black);
        $weight_black=$result_weight_black['weight_wire'];

        if($weight_gal==""){$weight_gal="Нет";} else {$weight_gal=''.$weight_gal.' кг. ';}
        if($weight_black==""){$weight_black="Нет";} else {$weight_black=''.$weight_black.' кг. ';}

        if($type==1)
            {
                if($result['diameter']!='2.3 [ВР]' && $result['diameter']!='3.7 [ВР]')
                    {
                        echo '<tr>';
                        echo '<td><b><center>Ø '.$result['diameter'].'<input type="hidden" name="wire_diameter[]" value="'.$result['diameter'].'"/></center></b></td>';
                        echo '<td><center>'.$weight_gal.'</center></td>';
                        echo '<td><center><input name="cost_galvanized[]" type="text" value="'.$result['cost_galvanized'].'" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_5_galvanized[]" type="text" value="'.$result['mark_5_galvanized'].'" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_10_galvanized[]" type="text" value="'.$result['mark_10_galvanized'].'" style="width: 80px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_20_galvanized[]" type="text" value="'.$result['mark_20_galvanized'].'" style="width: 80px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_50_galvanized[]" type="text" value="'.$result['mark_50_galvanized'].'" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_100_galvanized[]" type="text" value="'.$result['mark_100_galvanized'].'" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_500_galvanized[]" type="text" value="'.$result['mark_500_galvanized'].'" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_1000_galvanized[]" type="text" value="'.$result['mark_1000_galvanized'].'" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_5000_galvanized[]" type="text" value="'.$result['mark_5000_galvanized'].'" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="price_two_galvanized[]" type="text" value="'.$result['price_two_galvanized'].'" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="price_three_galvanized[]" type="text" value="'.$result['price_three_galvanized'].'" style="width: 35px;text-align:center;"/></center></td>';
                        echo '</tr>';
                    }
            }
        elseif($type==2)
            {
                if($result['diameter']!='ПВХ')
                    {
                        echo '<tr>';
                        echo '<td><b><center>Ø ' . $result['diameter'] . '<input type="hidden" name="wire_diameter[]" value="' . $result['diameter'] . '"/></center></b></td>';
                        echo '<td><center>' . $weight_black . '</center></td>';
                        echo '<td><center><input name="cost_black[]" type="text" value="' . $result['cost_black'] . '" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_5_black[]" type="text" value="' . $result['mark_5_black'] . '" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_10_black[]" type="text" value="' . $result['mark_10_black'] . '" style="width: 80px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_20_black[]" type="text" value="' . $result['mark_20_black'] . '" style="width: 80px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_50_black[]" type="text" value="' . $result['mark_50_black'] . '" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_100_black[]" type="text" value="' . $result['mark_100_black'] . '" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_500_black[]" type="text" value="' . $result['mark_500_black'] . '" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_1000_black[]" type="text" value="' . $result['mark_1000_black'] . '" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_5000_black[]" type="text" value="' . $result['mark_5000_black'] . '" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="price_two_black[]" type="text" value="' . $result['price_two_black'] . '" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="price_three_black[]" type="text" value="' . $result['price_three_black'] . '" style="width: 35px;text-align:center;"/></center></td>';
                        echo '</tr>';
                    }
            }
        elseif($type==3)
            {
                if($result['diameter']!='2.3 [ВР]' && $result['diameter']!='3.7 [ВР]')
                    {
                        echo '<tr>';
                        echo '<td><b><center>Ø '.$result['diameter'].'<input type="hidden" name="wire_diameter[]" value="'.$result['diameter'].'"/></center></b></td>';
                        echo '<td><center>'.$weight_gal.'</center></td>';
                        echo '<td><center><input name="cost_soft_galvanized[]" type="text" value="'.$result['cost_soft_galvanized'].'" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_soft_5_galvanized[]" type="text" value="'.$result['mark_soft_5_galvanized'].'" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_soft_10_galvanized[]" type="text" value="'.$result['mark_soft_10_galvanized'].'" style="width: 80px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_soft_20_galvanized[]" type="text" value="'.$result['mark_soft_20_galvanized'].'" style="width: 80px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_soft_50_galvanized[]" type="text" value="'.$result['mark_soft_50_galvanized'].'" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_soft_100_galvanized[]" type="text" value="'.$result['mark_soft_100_galvanized'].'" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_soft_500_galvanized[]" type="text" value="'.$result['mark_soft_500_galvanized'].'" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_soft_1000_galvanized[]" type="text" value="'.$result['mark_soft_1000_galvanized'].'" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_soft_5000_galvanized[]" type="text" value="'.$result['mark_soft_5000_galvanized'].'" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="price_two_soft_galvanized[]" type="text" value="'.$result['price_two_soft_galvanized'].'" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="price_three_soft_galvanized[]" type="text" value="'.$result['price_three_soft_galvanized'].'" style="width: 35px;text-align:center;"/></center></td>';
                        echo '</tr>';
                    }
            }
        elseif($type==4)
            {
                if($result['diameter']!='2.3 [ВР]' && $result['diameter']!='3.7 [ВР]')
                    if($result['diameter']!='2.3 [ВР]' && $result['diameter']!='3.7 [ВР]')
                    {
                        echo '<tr>';
                        echo '<td><b><center>Ø '.$result['diameter'].'<input type="hidden" name="wire_diameter[]" value="'.$result['diameter'].'"/></center></b></td>';
                        echo '<td><center>'.$weight_black.'</center></td>';
                        echo '<td><center><input name="cost_soft_black[]" type="text" value="'.$result['cost_soft_black'].'" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_soft_5_black[]" type="text" value="'.$result['mark_soft_5_black'].'" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_soft_10_black[]" type="text" value="'.$result['mark_soft_10_black'].'" style="width: 80px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_soft_20_black[]" type="text" value="'.$result['mark_soft_20_black'].'" style="width: 80px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_soft_50_black[]" type="text" value="'.$result['mark_soft_50_black'].'" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_soft_100_black[]" type="text" value="'.$result['mark_soft_100_black'].'" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_soft_500_black[]" type="text" value="'.$result['mark_soft_500_black'].'" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_soft_1000_black[]" type="text" value="'.$result['mark_soft_1000_black'].'" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="mark_soft_5000_black[]" type="text" value="'.$result['mark_soft_5000_black'].'" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="price_two_soft_black[]" type="text" value="'.$result['price_two_soft_black'].'" style="width: 35px;text-align:center;"/></center></td>';
                        echo '<td><center><input name="price_three_soft_black[]" type="text" value="'.$result['price_three_soft_black'].'" style="width: 35px;text-align:center;"/></center></td>';
                        echo '</tr>';
                    }
            }
    }
}
?>