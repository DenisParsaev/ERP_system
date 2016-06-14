<?php
include 'include/themplate/header.php';
if($_SESSION['id']!="")
	{

?>

<script language="JavaScript" type="application/javascript" >
    function ready_succes(obj) {
        var id = (obj.id);
        $.ajax({
            type: 'POST',
            url: '/function/ready_shipping.php?id='+id,
            data: id,
            success: function(data) {
                id=id.split('|',1);
                $('#result_ready_shipping_'+id).html(data);
            },
            error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
    }
 </script>
 <script language="JavaScript" type="application/javascript" >
    function return_order(obj) {
        var id = (obj.id);
        $.ajax({
            type: 'POST',
            url: '/function/return_ready_orders_base.php?id='+id,
            data: id,
            success: function(data) {
                id=id.split('|',1);
                $('#result_ready_shipping_'+id).html(data);
            },
            error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
    }
 </script>

</head>
<body>
<?php
include 'include/themplate/top_band.php';
include 'include/themplate/top_menu.php';
?>
<div class="wrapper">
    <div class="content" style="width: 100%;">
    	<div class="title"><h5>Перечень готовых заказов</h5></div>
        <div class="table" style="margin-top: 10px;">
            <div class="head"><h5 class="iFrames" style="width: 96%;">Готовые</h5></div>
            <table  cellpadding="0" cellspacing="0" border="0" class="display" id="example"  >
                <thead>
                    <tr>
                        <th>№ заказа</th>
                        <th>ФИО</th>
						<th>Телефон</th>
						<?php
                            if($_SESSION['access']=='1' || $_SESSION['responsibility']!="")
                                {
                                    echo '<th>Менеджер</th>';
                                }
						?>
						<th>Отгрузка</th>
                    </tr>
                </thead>
                <tbody>
				<?php
				    if($_SESSION['access']=='1')
                        {
                            $query = "SELECT * FROM `scroll_call` WHERE `status`='9' ORDER BY `id` DESC";
                        }
                    else
                        {
                            $query = "SELECT * FROM `scroll_call` WHERE `status`='9' AND `manager`='".$_SESSION['id']."' ORDER BY `id` DESC";
                        }
                    $res = mysql_query($query) or die(mysql_error());
                        while ($result = mysql_fetch_array($res))
                            {
							    $number=str_pad($result['id'], 6, '0', STR_PAD_LEFT);;
                                $name_client=$result['name_client'];
                                $manager=$result['manager'];
                                $query_manager = "SELECT login FROM `users` WHERE id='".$manager."'";
                                $res_manager = mysql_query($query_manager) or die(mysql_error());
                                $result_manager = mysql_fetch_array($res_manager);
                                $manager=$result_manager['login'];
                                if($name_client=="")
                                    {
                                        $name_client="Не указано";
                                    }
                                else
                                    {
                                        $name_client=$result['name_client'];
                                    }

                                echo '<tr class="gradeA">';
                                echo '<td style="vertical-align: middle;"><center><a href="/info_order.php?id='.$result['id'].'">#'.$number.'</a></center></td>';
                                echo '<td style="vertical-align: middle;width: 200px;"><center>'.$name_client.'</center></td>';
                                echo '<td style="vertical-align: middle;width: 120px;"><center>'.$result['phone_client'].'</center></td>';
                                if($_SESSION['access']=='1' || $_SESSION['responsibility']!="")
                                    {
                                        $manager=$result['manager'];
                                        $query_manager = "SELECT * FROM `users` WHERE id='".$manager."'";
                                        $res_manager = mysql_query($query_manager) or die(mysql_error());
                                        $result_manager = mysql_fetch_array($res_manager);
                                        $manager=$result_manager['full_name'];
                                        $manager=explode(' ', $manager);
                                        $manager=$manager[1];
                                        $phone=$result_manager['personal_phone'];

                                        echo '<td style="vertical-align: middle;"><center><a href="/info_user.php?id='.$result['manager'].'" target="_blank">'.$manager.'</a><br>'.$phone.'</center></td>';
                                    }
                                else
                                    {

                                    }
                                $query_post = "SELECT delivery_info FROM `call_preorder` WHERE call_id='".$result['id']."'";
                                $res_post = mysql_query($query_post) or die(mysql_error());
                                $result_post = mysql_fetch_array($res_post);
                                $post=$result_post['0'];
                                $post=explode("|", $post);
                                $post=$post[0];

                                if($post=="PICKUP")
                                    {
										echo '<td style="vertical-align: middle;width: 200px;">
                                     <center>
                                     <div id="result_ready_shipping_'.$result['id'].'">
                                     <input type="button" style="width:125px;margin-top: 5px;" name="submit" onClick = "ready_succes(this)" id="'.$result['id'].'|'.$_SESSION['id'].'|PICKUP" value="Отгружен" class="blueBtn" /><br>
                                     <input type="button" style="width:125px;margin-top: 5px;" name="submit" onClick = "return_order(this)" id="'.$result['id'].'|'.$_SESSION['id'].'|PICKUP" value="Возврат" class="redBtn" />
                                     </div>
                                       </center>
                                       </td>
									   </tr>';
                                        //echo '<td style="vertical-align: middle;width: 200px;"><center><div id="result_ready_shipping_'.$result['id'].'"><input type="button" name="submit" onClick = "ready_succes(this)" id="'.$result['id'].'|'.$_SESSION['id'].'|PICKUP" value="Отгружен" class="blueBtn" style="width:125px;" /></div></center></td>';
                                        //echo '<td style="vertical-align: middle;width: 200px;"><center><div id="result_ready_shipping_'.$result['id'].'"><input type="button" name="submit" onClick = "return_order(this)" id="'.$result['id'].'|'.$_SESSION['id'].'|PICKUP" value="Возврат" class="blueBtn" style="width:125px;" /></div></center></td>';
              
									}
                                elseif($post=="HITCHED")
                                    {
										echo '<td style="vertical-align: middle;width: 200px;">
                                     <center>
                                     <div id="result_ready_shipping_'.$result['id'].'">
                                     <input type="button" style="width:125px;margin-top: 5px;" name="submit" onClick = "ready_succes(this)" id="'.$result['id'].'|'.$_SESSION['id'].'|HITCHED" value="Оформить" class="blackBtn" /><br>
                                     <input type="button" style="width:125px;margin-top: 5px;" name="submit" onClick = "return_order(this)" id="'.$result['id'].'|'.$_SESSION['id'].'|HITCHED" value="Возврат" class="redBtn" />
                                     </div>
                                       </center>
                                       </td>
									   </tr>';
                                        //echo '<td style="vertical-align: middle;width: 200px;"><center><div id="result_ready_shipping_'.$result['id'].'"><input type="button" name="submit" onClick = "ready_succes(this)" id="'.$result['id'].'|'.$_SESSION['id'].'|HITCHED" value="Оформить" class="blackBtn" style="width:125px;" /></div></center></td>';
                                        //echo '<td style="vertical-align: middle;width: 200px;"><center><div id="result_ready_shipping_'.$result['id'].'"><input type="button" name="submit" onClick = "return_order(this)" id="'.$result['id'].'|'.$_SESSION['id'].'|HITCHED" value="Возврат" class="blueBtn" style="width:125px;" /></div></center></td>';
              
									}
                                else
                                    {
										echo '<td style="vertical-align: middle;width: 200px;">
                                     <center>
                                     <div id="result_ready_shipping_'.$result['id'].'">
                                     <input type="button" style="width:125px;margin-top: 5px;" name="submit" onClick = "ready_succes(this)" id="'.$result['id'].'|'.$_SESSION['id'].'|ADDRES" value="Отгрузить" class="greenBtn" /><br>
                                     <input type="button" style="width:125px;margin-top: 5px;" name="submit" onClick = "return_order(this)" id="'.$result['id'].'|'.$_SESSION['id'].'|ADDRES" value="Возврат" class="redBtn" />
                                     </div>
                                       </center>
                                       </td>
									   </tr>';
                                        //echo '<td style="vertical-align: middle;width: 200px;"><center><div id="result_ready_shipping_'.$result['id'].'"><input type="button" name="submit" onClick = "ready_succes(this)" id="'.$result['id'].'|'.$_SESSION['id'].'|ADDRES" value="Отгрузить" class="greenBtn" style="width:125px;" /></div></center></td>';
                                        //echo '<td style="vertical-align: middle;width: 200px;"><center><div id="result_ready_shipping_'.$result['id'].'"><input type="button" name="submit" onClick = "return_order(this)" id="'.$result['id'].'|'.$_SESSION['id'].'|ADDRES" value="Возврат" class="blueBtn" style="width:125px;" /></div></center></td>';
              
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