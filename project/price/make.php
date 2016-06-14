<?echo
include '../include/config.php';
$array = array("10", "15", "20", "25", "35", "45", "55", "65", "70", "100");
$date = date("d-m-Y");

mysql_select_db("egorovka_price") or die(mysql_error());
mysql_set_charset('utf8');

require_once '../preorder/lib/PHPExcel.php';
require_once '../preorder/lib/PHPExcel/IOFactory.php';
$pExcel = PHPExcel_IOFactory::createReader('Excel2007');
$pExcel = $pExcel->load('price.xlsx');

for($i=0;$i<10;$i++)
    {
        if($i==0){$pExcel->setActiveSheetIndex(0);}
        if($i==1){$pExcel->setActiveSheetIndex(1);}
        if($i==2){$pExcel->setActiveSheetIndex(2);}
        if($i==3){$pExcel->setActiveSheetIndex(3);}
        if($i==4){$pExcel->setActiveSheetIndex(4);}
        if($i==5){$pExcel->setActiveSheetIndex(5);}
        if($i==6){$pExcel->setActiveSheetIndex(6);}
        if($i==7){$pExcel->setActiveSheetIndex(7);}
        if($i==8){$pExcel->setActiveSheetIndex(8);}
        if($i==9){$pExcel->setActiveSheetIndex(9);}

        $aSheets = $pExcel->getActiveSheet();

        $query = "SELECT * FROM `rabitz_".$array[$i]."`";
        $res= mysql_query($query) or die(mysql_error());

        $j=2;
        while ($result = mysql_fetch_array($res))
            {
                $aSheets->setCellValue('A'.$j.'','Ø '.$result['wire_diameter'].'');
                $aSheets->setCellValue('B'.$j.'',''.$result['height_less_meter'].'');

                $aSheets->setCellValue('C'.$j.'',''.$result['height_gal_100'].'');
                $aSheets->setCellValue('D'.$j.'',''.$result['height_black_100'].'');
                $aSheets->setCellValue('E'.$j.'',''.$result['height_gal_120'].'');
                $aSheets->setCellValue('F'.$j.'',''.$result['height_black_120'].'');
                $aSheets->setCellValue('G'.$j.'',''.$result['height_gal_150'].'');
                $aSheets->setCellValue('H'.$j.'',''.$result['height_black_150'].'');
                $aSheets->setCellValue('I'.$j.'',''.$result['height_gal_180'].'');
                $aSheets->setCellValue('J'.$j.'',''.$result['height_black_180'].'');
                $aSheets->setCellValue('K'.$j.'',''.$result['height_gal_200'].'');
                $aSheets->setCellValue('L'.$j.'',''.$result['height_black_200'].'');

                $aSheets->setCellValue('M'.$j.'',''.$result['height_more_two'].'');
                $aSheets->setCellValue('N'.$j.'',''.$result['height_more_three'].'');
                $j++;
            }
    }
$objWriter = PHPExcel_IOFactory::createWriter($pExcel, 'Excel2007');
$file = "archive/price(".$date.").xlsx";
$objWriter->save($file);
echo '<script language="JavaScript"> window.location.href = "/price/'.$file.'"</script>';
?>