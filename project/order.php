<?php 
include 'include/themplate/header.php';
if($_SESSION['id']!="" && $_SESSION['access']!="3")
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
    	<div class="title"><h5>Перечень заказов</h5></div>
        <div class="table" style="margin-top: 10px;">
            <div class="head"><h5 class="iFrames">Заказы</h5></div>
            <table  cellpadding="0" cellspacing="0" border="0" class="display" id="example"  >
                <thead>
                    <tr>
                        <th>№ звонка</th>
                        <th>ФИО</th>
						<th>Телефоны</th>
						<th>Город</th>
						<?php
                            if($_SESSION['access']=="1")
                                {
                                    echo '<th>Расход</th>';
                                }
                        ?>
						<th>Заказ</th>
						<th>Менеджер</th>
                    </tr>
                </thead>
                <tbody>
				<?php
                if($_SESSION['access']=='3')
                    {
                        $query = "SELECT * FROM `scroll_call` WHERE `status`='0' OR `status`='2' OR `status`='5' AND `manager`='".$_SESSION['id']."' ORDER BY `id` DESC";
                    }
                else
                    {
                        $query = "SELECT * FROM `scroll_call` WHERE `status`='0' OR `status`='2' OR `status`='5' ORDER BY `id` DESC";
                    }

				$res = mysql_query($query) or die(mysql_error());
					while ($result = mysql_fetch_array($res)) 
						{
							$number=str_pad($result['id'], 6, '0', STR_PAD_LEFT);
							$manager=str_pad($result['manager'], 3, '0', STR_PAD_LEFT);
							$date=explode(" ", $result['date_update']);

                            $manager_name=$result['manager'];
                            $query_manager_name = "SELECT full_name FROM `users` WHERE id='".$manager."'";
                            $res_manager_name = mysql_query($query_manager_name) or die(mysql_error());
                            $result_manager_name = mysql_fetch_array($res_manager_name);
                            $manager_name=$result_manager_name['full_name'];
							$name_client=$result['name_client'];
							$order = explode("/", $result['order_content']);	
							$order_count=count($order);
							echo '<tr class="gradeA">';
							echo '<td style="vertical-align: middle;width: 65px;" ><center><a href="/info_order.php?id='.$result['id'].'">#'.$number.'</a><br>'.$date[0].'<br>'.$date[1].'</center></td>';
							echo '<td style="vertical-align: middle;width: 150px;"><center>'.$name_client.'</center></td>';
							echo '<td style="vertical-align: middle;width: 120px;"><center>'.$result['phone_client'].'</center></td>';
							echo '<td style="vertical-align: middle;width: 120px;"><center>'.$result['city_client'].'</center></td>';
							if($_SESSION['access']=="1")
                            {
                            echo '<td style="vertical-align: middle;width: 50px;"><center>'.$result['consumption'].'</center></td>';
                            }
                            echo '<td style="vertical-align: middle;"><center>';
							for($i=0;$i<$order_count-1;$i++)
								{	
									$order_arr = explode("|", $order[$i]);							
									     echo '<table width="100%" cellpadding="2" cellspacing="1" style="border: 1px groove black;" >
                                              <tr>
                                                <td ><center>'.$order_arr[0].'</center></td>
                                                <td style="width:35px;border: 1px groove black;"><center>'.$order_arr[1].'</center></td>
                                                <td style="width:35px;border: 1px groove black;"><center>'.$order_arr[2].'</center></td>
                                              </tr>
                                             </table>';
								}
							echo '</center></td>';
							if($_SESSION['access']=='1')		
								{
									echo '<td style="vertical-align: middle;width: 50px;"><center><a href="/info_user.php?id='.$result['manager'].'" target="_blank" title="'.$manager_name.'">'.$manager.'</a></center></td>';
								}
							else
								{
									echo '<td style="vertical-align: middle;width: 50px;"><center>'.$manager.'</center></td>';
								}
							echo '</tr>';
						}
				?>
                </tbody>
            </table>
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