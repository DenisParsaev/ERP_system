<?php
include 'include/themplate/header.php';
if($_SESSION['id']!="")
	{

?>

</head>
<body>
<?php
include 'include/themplate/top_band.php';
include 'include/themplate/top_menu.php';
?>
<div class="wrapper">
    <div class="content" style="width: 100%;">
    	<div class="title"><h5>Перечень выполненных заказов</h5></div>
        <div class="table" style="margin-top: 10px;">
            <div class="head"><h5 class="iFrames">Выполненные заказы</h5></div>
            <table  cellpadding="0" cellspacing="0" border="0" class="display" id="example"  >
                <thead>
                    <tr>
                        <th>№ заказа</th>
                        <th>ФИО</th>
						<th>Телефон</th>
						<th>Менеджер</th>
                    </tr>
                </thead>
                <tbody>
				<?php
                if($_SESSION['access']=='3')
                    {
                        $query = "SELECT * FROM `scroll_call` WHERE `status`='11' AND `manager`='".$_SESSION['id']."' ORDER BY `id` DESC";
                    }
                else
                    {
                        $query = "SELECT * FROM `scroll_call` WHERE `status`='11' ORDER BY `id` DESC";
                    }

				$res = mysql_query($query) or die(mysql_error());
					while ($result = mysql_fetch_array($res))
						{
							$number=str_pad($result['id'], 6, '0', STR_PAD_LEFT);
							$status=$result['status'];
							$query_status = "SELECT name FROM `setting_status` WHERE id='".$status."'";
							$res_status = mysql_query($query_status) or die(mysql_error());
							$result_status = mysql_fetch_array($res_status);
							$status=$result_status['name'];
							if($result['status']=="2")
								{
									$status="до ".$result['date_expectation']."";
								}
							$manager=$result['manager'];
							$query_manager = "SELECT login FROM `users` WHERE id='".$manager."'";
							$res_manager = mysql_query($query_manager) or die(mysql_error());
							$result_manager = mysql_fetch_array($res_manager);
							$manager=$result_manager['login'];
							$date_update=strtotime($result['date_update']);

							$name_client=$result['name_client'];
							if($name_client=="")
								{
								    $name_client="Не указано";
								}
							else
								{
								    $name_client=$result['name_client'];
								}

							$order = explode("/", $result['order_content']);
							$order_count=count($order);
							echo '<tr class="gradeA">
								  <td style="vertical-align: middle;" ><center><a href="/info_order.php?id='.$result['id'].'">#'.$number.'</a></center></td>
								  <td style="vertical-align: middle;width: 200px;"><center>'.$name_client.'</center></td>
								  <td style="vertical-align: middle;width: 120px;"><center>'.$result['phone_client'].'</center></td>';
							if($_SESSION['access']=='1')
								{
									echo '<td style="vertical-align: middle;"><center><a href="/info_user.php?id='.$result['manager'].'" target="_blank">'.$manager.'</a></center></td>';
								}
							else
								{
									echo '<td style="vertical-align: middle;"><center>'.$manager.'</center></td>';
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