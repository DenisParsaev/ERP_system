<?php
include 'include/themplate/header.php';
if($_SESSION['id']!="" && $_SESSION['access']=="1")
	{

?>
</head>
<body>
<?php
include 'include/themplate/top_band.php';
include 'include/themplate/top_menu.php';
?>
<div class="wrapper">
    <div class="content" style="width: 120%;margin-left: -10%;">
    	<div class="title"><h5>Перечень рассчитаных заказов</h5></div>
        <div class="table" style="margin-top: 10px;">
            <div class="head"><h5 class="iFrames" style="width: 96%;">Рассчитанные товары</h5></div>
            <table  cellpadding="0" cellspacing="0" border="0" class="display" id="example"  >
                <thead>
                    <tr>
                        <th style="width: 85px;">№ заказа</th>
                        <th style="width: 100px;">Офис</th>
                        <th style="width: 100px;">Менеджер</th>
                        <th style="width: 100px;">Наши (Офис)</th>
                        <th style="width: 85px;">Цех</th>
                        <th style="width: 210px;">Управляющий</th>
                        <th >Наши (цех)</th>
						<th style="width: 75px;">Доставка</th>
						<th style="width: 75px;">Менеджер</th>
						<th style="width: 85px;">Статус</th>
                    </tr>
                </thead>
                <tbody>
				<?php
                    $query = "SELECT * FROM `calculated_orders` WHERE `status`='13' ORDER BY `id` DESC";
                    $res = mysql_query($query) or die(mysql_error());
                    $i=0;
                        while ($result = mysql_fetch_array($res))
                            {
							    $number=str_pad($result['call_id'], 6, '0', STR_PAD_LEFT);;

                                echo '<tr class="gradeA">';
                                echo '<td style="vertical-align: middle;"><center><a href="/info_order.php?id='.$result['call_id'].'">#'.$number.'</a></center></td>';
                                echo '<td style="vertical-align: middle;"><center>'.$result['office_earnings'].'</center></td>';
                                echo '<td style="vertical-align: middle;"><center>'.$result['manager_earnings'].'</center></td>';
                                echo '<td style="vertical-align: middle;"><center>'.$result['bosses_earnings'].'</center></td>';
                                echo '<td style="vertical-align: middle;"><center></center></td>';
                                echo '<td style="vertical-align: middle;"><center></center></td>';
                                echo '<td style="vertical-align: middle;"><center></center></td>';
                                echo '<td style="vertical-align: middle;"><center></center></td>';
                                echo '<td style="vertical-align: middle;"><center></center></td>';
                                echo '<td style="vertical-align: middle;width: 200px;"><center><div id="result_designed_'.$result['id'].'"><input type="button" name="submit" onClick = "designed(this)" id="'.$result['id'].'|'.$_SESSION['id'].'|'.$i.'" value="Закрыт" class="greenBtn" /></div></center></td>';
                                echo '</tr>';
                                $i++;


						}
				?>
                </tbody>
            </table>
            <div id="result"></div>
        </div>

    </div>
</div>
<?php
include 'include/themplate/footer.php';
	}
else
	{
		echo '<script language="JavaScript"> window.location.href = "/index.php"</script>';
	}
?>