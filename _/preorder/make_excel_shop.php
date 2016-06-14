<?php
include '../include/config.php';

$shop=$_GET['shop'];

require_once 'lib/PHPExcel.php';
require_once 'lib/PHPExcel/IOFactory.php';
$pExcel = PHPExcel_IOFactory::createReader('Excel2007');

if($shop==1)
{
    $pExcel = $pExcel->load('themplate/rabica.xlsx');
}
if($shop==2)
{
    $pExcel = $pExcel->load('themplate/armasetka.xlsx');
}
if($shop==3)
{
    $pExcel = $pExcel->load('themplate/kirpich.xlsx');
}
if($shop==4)
{
    $pExcel = $pExcel->load('themplate/razbor.xlsx');
}

$pExcel->setActiveSheetIndex(0);
$aSheets = $pExcel->getActiveSheet();

$fp = fopen("lib/preorder.txt", "r");
if ($fp) {$mytext = fgets($fp, 999);}
fclose($fp);
$order_id = explode("|", $mytext);
$date = date("d-m-Y");
if($order_id[1]==$date)
{
    $order=$order_id[0];
}
else
{
    $order=$order_id[0]+1;
    $order=str_pad($order, 3, '0', STR_PAD_LEFT);
    $fp = fopen("lib/preorder.txt", "a"); // Открываем файл в режиме записи
    ftruncate($fp, 0);
    $mytext = "".$order."|".$date.""; // Исходная строка
    $test = fwrite($fp, $mytext);
}



$query = "SELECT * FROM `scroll_call` WHERE `status`='8'";

$res = mysql_query($query) or die(mysql_error());
$j="3";
while ($result = mysql_fetch_array($res))
{

    $query_manufacture = "SELECT date_manufacture FROM `call_preorder` WHERE call_id='".$result['id']."'";
    $res_manufacture = mysql_query($query_manufacture) or die(mysql_error());
    $result_manufacture = mysql_fetch_array($res_manufacture);
    $date_manufacture=$result_manufacture['date_manufacture'];


    $manager=$result['manager'];
    $query_manager = "SELECT login FROM `users` WHERE id='".$manager."'";
    $res_manager = mysql_query($query_manager) or die(mysql_error());
    $result_manager = mysql_fetch_array($res_manager);
    $manager=$result_manager['login'];

    $order_base = explode("/", $result['order_content']);
    $order_count=count($order_base);
    for($i=0;$i<$order_count-1;$i++)
    {
        $order_arr = explode("|", $order_base[$i]);
        $place=$order_arr[3];

        if($place==$shop)
        {
            if($shop==1){$result_shop="shop_one";}
            if($shop==2){$result_shop="shop_two";}
            if($shop==3){$result_shop="shop_three";}
            if($shop==4){$result_shop="shop_four";}

            $query_status = "SELECT ".$result_shop." FROM `preorder_willingness` WHERE call_id='".$result['id']."'";
            $res_status = mysql_query($query_status) or die(mysql_error());
            $result_status = mysql_fetch_array($res_status);
            $result_status=$result_status[$result_shop];
            if($result_status!="0")
                {
                    $order_base = explode("/", $result['order_content']);
                    $order_count=count($order_base);

                    $subject=$j+$order_count-2;
                    $aSheets->mergeCells('A'.$j.':A'.$subject.'');
                    $aSheets->mergeCells('D'.$j.':D'.$subject.'');

                    for($i=0;$i<$order_count-1;$i++)
                    {
                        $order_arr = explode("|", $order_base[$i]);
                        $number=str_pad($result['id'], 6, '0', STR_PAD_LEFT);
                        $aSheets->setCellValue('A'.$j.'',''.$number.'');
                        $aSheets->setCellValue('B'.$j.'',''.$order_arr[0].'');
                        $aSheets->setCellValue('C'.$j.'',''.$order_arr[1].'');
                        $aSheets->setCellValue('D'.$j.'',''.$manager.'');
                        $aSheets->setCellValue('E'.$j.'','-/-');
                        $aSheets->setCellValue('G'.$j.'',''.$date_manufacture.'');
                        $j++;
                    }

                    if ($date_manufacture != "") {
                        $aSheets->setCellValue('G' . $j . '', '' . $date_manufacture . '');
                    }
                }
        }
    }
}


$aSheets->setCellValue('E1',''.$date.'');
$aSheets->setCellValue('A1',''.$order.'');

$objWriter = PHPExcel_IOFactory::createWriter($pExcel, 'Excel2007');

if($shop==1)
{
    $file = "preorder[shop|rabica](".$date.").xlsx";
}
if($shop==2)
{
    $file = "preorder[shop|armasetka](".$date.").xlsx";
}
if($shop==3)
{
    $file = "preorder[shop|kirpich](".$date.").xlsx";
}
if($shop==4)
{
    $file = "preorder[shop|razborka](".$date.").xlsx";
}



$objWriter->save($file);

echo '<script language="JavaScript"> window.location.href = "/preorder/'.$file.'"</script>';
//echo '<script language="JavaScript"> history.go(-1);</script>';

?>
