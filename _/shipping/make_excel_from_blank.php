<?php
include '../include/config.php';

$post=$_GET['post'];
$date = date("d-m-Y");

require_once 'lib/PHPExcel.php';
require_once 'lib/PHPExcel/IOFactory.php';
$pExcel = PHPExcel_IOFactory::createReader('Excel2007');
$pExcel = $pExcel->load('themplate/ship_np.xlsx');
$pExcel->setActiveSheetIndex(0);
$aSheets = $pExcel->getActiveSheet();

$query = "SELECT * FROM call_preorder,scroll_call WHERE call_preorder.call_id=scroll_call.id AND scroll_call.status=15";

$res = mysql_query($query) or die(mysql_error());
$j="3";
while ($result = mysql_fetch_array($res))
    {
        
        $manager=$result['manager'];
        $query_manager = "SELECT login FROM `users` WHERE id='".$manager."'";
        $res_manager = mysql_query($query_manager) or die(mysql_error());
        $result_manager = mysql_fetch_array($res_manager);
        $manager=$result_manager['login']; 
        $arr=explode("|", $result['delivery_info']);
        if($arr[0]=="INTIME" || $arr[0]=="NP"){
            if($arr[1]=="OTDEL") {
                    $name=explode("/", $arr[3]);
                    $pay=explode("/", $arr[6]);
                    $mass=explode("/", $arr[5]);
                    if($pay[0]=="-") {$plat="Отнять";}
                    elseif($pay[0]==""){$plat="Клиент";}

                    if($pay[1]=="-"){$sum="Б/Н";}
                    elseif($pay[1]!="") {$sum=$pay[1];}

                    $order_base = explode("/", $result['order_content']);
                    $order_count=count($order_base);

                    $subject=$j+$order_count-2;
                    $aSheets->mergeCells('A'.$j.':A'.$subject.'');
                    $aSheets->mergeCells('B'.$j.':B'.$subject.'');
                    $aSheets->mergeCells('C'.$j.':C'.$subject.'');
                    $aSheets->mergeCells('D'.$j.':D'.$subject.'');
                    $aSheets->mergeCells('E'.$j.':E'.$subject.'');
					$aSheets->mergeCells('F'.$j.':F'.$subject.'');
                    
                    $aSheets->mergeCells('I'.$j.':I'.$subject.'');
                    $aSheets->mergeCells('J'.$j.':J'.$subject.'');
                    $aSheets->mergeCells('K'.$j.':K'.$subject.'');
                    $aSheets->mergeCells('L'.$j.':L'.$subject.'');
                    $aSheets->mergeCells('M'.$j.':M'.$subject.'');
					
					
                    for($i=0;$i<$order_count-1;$i++)
                    {
                        $order_arr = explode("|", $order_base[$i]);
                        $number=str_pad($result['call_id'], 6, '0', STR_PAD_LEFT);
						$aSheets->setCellValue('A'.$j.'',''.$arr[0].'');
                        $aSheets->setCellValue('B'.$j.'',''.$number.'');
					    $aSheets->setCellValue('C'.$j.'',''.$mass[1].'');
                        $aSheets->setCellValue('D'.$j.'',''.$arr[4].' №'.$arr[2].'');
                        $aSheets->setCellValue('G'.$j.'',''.$order_arr[0].'');
                        $aSheets->setCellValue('H'.$j.'',''.$order_arr[1].'');
                        $aSheets->setCellValue('E'.$j.'',''.$name[0].'');
                        $name[1]=preg_replace('/^\+?380? ?\(/','0',$name[1]);
                        $name[1]=preg_replace('/\ /','',$name[1]);
						$name[1]=preg_replace('/\)/','-',$name[1]);
                        $aSheets->setCellValue('F'.$j.'',''.$name[1].'');
                        $aSheets->setCellValue('I'.$j.'',''.$sum.'');
                        $aSheets->setCellValue('L'.$j.'',''.$plat.'');
                        $aSheets->setCellValue('M'.$j.'',''.$manager.'');
                        $j++;
                    }
			}
					elseif($arr[1]=="ADDRES")
                {
                
                    $name=explode("/", $arr[2]);
                    $pay=explode("/", $arr[5]);
					$mass=explode("/", $arr[4]);

                    if($pay[0]=="-") {$plat="Отнять";}
                    elseif($pay[0]==""){$plat="Клиент";}

                    if($pay[1]=="-"){$sum="Б/Н";}
                    elseif($pay[1]!="") {$sum=$pay[1];}

                    $order_base = explode("/", $result['order_content']);
                    $order_count=count($order_base);

                    $subject=$j+$order_count-2;
                    $aSheets->mergeCells('A'.$j.':A'.$subject.'');
                    $aSheets->mergeCells('B'.$j.':B'.$subject.'');
                    $aSheets->mergeCells('C'.$j.':C'.$subject.'');
                    $aSheets->mergeCells('D'.$j.':D'.$subject.'');
                    $aSheets->mergeCells('E'.$j.':E'.$subject.'');
					$aSheets->mergeCells('F'.$j.':F'.$subject.'');
                    
                    $aSheets->mergeCells('I'.$j.':I'.$subject.'');
                    $aSheets->mergeCells('J'.$j.':J'.$subject.'');
					$aSheets->mergeCells('K'.$j.':K'.$subject.'');
                    $aSheets->mergeCells('L'.$j.':L'.$subject.'');
                    $aSheets->mergeCells('M'.$j.':M'.$subject.'');
					
					

                    for($i=0;$i<$order_count-1;$i++)
                    {
                        $order_arr = explode("|", $order_base[$i]);
                        $number=str_pad($result['call_id'], 6, '0', STR_PAD_LEFT);
                        $aSheets->setCellValue('A'.$j.'',''.$arr[0].'');
                        $aSheets->setCellValue('B'.$j.'',''.$number.'');
                        $aSheets->setCellValue('C'.$j.'',''.$mass[1].'');
						$aSheets->setCellValue('D'.$j.'',''.$arr[3].'');
                        $aSheets->setCellValue('G'.$j.'',''.$order_arr[0].'');
                        $aSheets->setCellValue('H'.$j.'',''.$order_arr[1].'');
                        $aSheets->setCellValue('E'.$j.'',''.$name[0].'');
                        $name[1]=preg_replace('/^\+?380? ?\(/','0',$name[1]);
                        $name[1]=preg_replace('/\ /','',$name[1]);
						$name[1]=preg_replace('/\)/','-',$name[1]);
                        $aSheets->setCellValue('F'.$j.'',''.$name[1].'');
                        $aSheets->setCellValue('I'.$j.'',''.$sum.'');
                        $aSheets->setCellValue('L'.$j.'',''.$plat.'');
                        $aSheets->setCellValue('M'.$j.'',''.$manager.'');
                        $j++;
                    }
                
		}}
        else
            {
                $name=explode("/", $arr[1]);
                $pay=explode("/", $arr[4]);
				$mass=explode("/", $arr[3]);
                if($pay[0]=="-") {$plat="Отнять";}
                elseif($pay[0]==""){$plat="Клиент";}

                if($pay[1]=="-"){$sum="Б/Н";}
                elseif($pay[1]!="") {$sum=$pay[1];}

                $order_base = explode("/", $result['order_content']);
                $order_count=count($order_base);

                $subject=$j+$order_count-2;
                $aSheets->mergeCells('A'.$j.':A'.$subject.'');
                $aSheets->mergeCells('B'.$j.':B'.$subject.'');
                $aSheets->mergeCells('C'.$j.':C'.$subject.'');
                $aSheets->mergeCells('D'.$j.':D'.$subject.'');
				$aSheets->mergeCells('E'.$j.':E'.$subject.'');
				$aSheets->mergeCells('F'.$j.':F'.$subject.'');
                
                $aSheets->mergeCells('I'.$j.':I'.$subject.'');
				$aSheets->mergeCells('J'.$j.':J'.$subject.'');
                $aSheets->mergeCells('K'.$j.':K'.$subject.'');
                $aSheets->mergeCells('L'.$j.':L'.$subject.'');
                $aSheets->mergeCells('M'.$j.':M'.$subject.'');
				
				
                for($i=0;$i<$order_count-1;$i++)
                {
                    $order_arr = explode("|", $order_base[$i]);
                    $number=str_pad($result['call_id'], 6, '0', STR_PAD_LEFT);
                    $aSheets->setCellValue('A'.$j.'',''.$arr[0].'');
                    $aSheets->setCellValue('B'.$j.'',''.$number.'');
                    $aSheets->setCellValue('C'.$j.'',''.$mass[1].'');
                    $aSheets->setCellValue('D'.$j.'',''.$arr[2].'');
                    $aSheets->setCellValue('E'.$j.'',''.$name[0].'');
                    $name[1]=preg_replace('/^\+?380? ?\(/','0',$name[1]);
                    $name[1]=preg_replace('/\ /','',$name[1]);
					$name[1]=preg_replace('/\)/','-',$name[1]);
                    $aSheets->setCellValue('F'.$j.'',''.$name[1].'');
                    $aSheets->setCellValue('G'.$j.'',''.$order_arr[0].'');
                    $aSheets->setCellValue('H'.$j.'',''.$order_arr[1].'');
                    $aSheets->setCellValue('I'.$j.'',''.$sum.'');
					$aSheets->setCellValue('J'.$j.'',''."".'');
                    $aSheets->setCellValue('K'.$j.'',''."".'');
                    $aSheets->setCellValue('L'.$j.'',''.$plat.'');
                    $aSheets->setCellValue('M'.$j.'',''.$manager.'');
                    $j++;
                }
            }

    }

$aSheets->setCellValue('A1','Дата: '.$date.'');

$objWriter = PHPExcel_IOFactory::createWriter($pExcel, 'Excel2007');

if($post=='NP')
{
    $file = "archiv/Бланк отгрузки[".$date."].xlsx";
}
if($post=='INTIME')
{
    $file = "INTIME(".$date.").xlsx";
}
if($post=='ADDRES')
{
    $file = "ADDRES(".$date.").xlsx";
}
$objWriter->save($file);

echo '<script language="JavaScript"> window.location.href = "/shipping/'.$file.'"</script>';
//echo '<script language="JavaScript"> history.go(-1);</script>';

?>
