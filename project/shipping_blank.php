<?php
include 'include/themplate/header.php';
if($_SESSION['id']!="")
	{

?>
<script type="text/javascript">
function np() {

        $.ajax({
          type: 'POST',
          url: '/shipping/make_excel_from_blank.php?post=NP',
          success: function(data) {
            $('#result').html(data);
          },
          error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });

        }
       function designed(obj) {
        id = (obj.id);
				$.ajax({
					type: 'POST',
					url: '/function/ready_blank.php?id=' + id + '',
					success: function(data) {
                    id=id.split('|',1);
						$('#result_ready_preorder_' + id + '').html(data);
					},
					error:  function(xhr, str){
						alert('Возникла ошибка: ' + xhr.responseCode);
					}
				});
    }
	function not_designed(obj) {
        id = (obj.id);
				$.ajax({
					type: 'POST',
					url: '/function/not_ready_blank.php?id=' + id + '',
					success: function(data) {
                    id=id.split('|',1);
						$('#result_ready_preorder_' + id + '').html(data);
					},
					error:  function(xhr, str){
						alert('Возникла ошибка: ' + xhr.responseCode);
					}
				});
    }
	 function return_order(obj) {
        var id = (obj.id);
        $.ajax({
            type: 'POST',
            url: '/function/return_blank_orders_base.php?id='+id,
            data: id,
            success: function(data) {
                id=id.split('|',1);
                $('#result_ready_preorder_'+id).html(data);
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
    <div class="content" style="width: 120%;margin-left: -10%;">
    	<div class="title"><h5>Перечень готовых к отгрузке заказов</h5></div>
        <div class="table" style="margin-top: 10px;">
            <div class="head"><h5 class="iFrames" style="width: 96%;">Отгрузка<input type="button" value="Скачать" class="greenBtn mr10 ml10" style="float: right;" onclick="np()" /><input type="button" value="Отправить все" class="greenBtn mr10 ml10" style="float: right;" onclick="designed(this)" /></h5></div>
            <table  cellpadding="0" cellspacing="0" border="0" class="display" id="example"  >
                <thead>
                    <tr>
                        <th >Заказ</th>
						<th >Вес</th>
						<th>Город/Адрес</th>
						<th>ФИО</th>
						<th>Телефон</th>
						<th>Товар</th>
						<th> З/м </th>
						<th> З/п </th>
						<th>Доставка</th>
						<th >Менеджер</th>
						<th>Есть</th>
                    </tr>
                </thead>
                <tbody>
				<?php
				    if($_SESSION['access']=='3')
                        {
							$query = "SELECT * FROM `scroll_call` WHERE `status`='15' AND `manager`='".$_SESSION['id']."' ORDER BY `id` DESC";
                            
                        }
                    else
                        {
							$query = "SELECT * FROM `scroll_call` WHERE `status`='15' ORDER BY `id` DESC";
                            
                        }
					$query = "SELECT * FROM call_preorder,scroll_call WHERE call_preorder.call_id=scroll_call.id AND call_preorder.delivery_info LIKE '".$post."%' AND scroll_call.status=15";	
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
                                $name_client=$result['name_client'];
								$order = explode("/", $result['order_content']);	
							    $order_count=count($order);
								$arr=explode("|", $result['delivery_info']);


                                echo '<tr class="gradeA">';
                                echo '<td style="vertical-align: middle;width: 15px;"><center><a href="/info_order.php?id='.$result['id'].'">#'.$number.'</a></center></td>';
								if($arr[1]=="OTDEL" ){
									$mass=explode("/", $arr[5]);
								}
								elseif($arr[1]=="ADDRES")
                                {
									$mass=explode("/", $arr[4]);
								}
								else{
									$mass=explode("/", $arr[3]);
								}
								echo '<td style="vertical-align: middle;width: 5px;"><center>'.$mass[1].'</center></td>';
								echo '<td style="vertical-align: middle;width: 100px;"><center>'.$result['city_client'].'</center></td>';
								$result['phone_client']=preg_replace('/^\+?380? ?\(/','0',$result['phone_client']);
                                $result['phone_client']=preg_replace('/\ /','',$result['phone_client']);
								$result['phone_client']=preg_replace('/\)/','-',$result['phone_client']);
                                echo '<td style="vertical-align: middle;width: 100px;"><center>'.$name_client.'</center></td>';
                                echo '<td style="vertical-align: middle;width: 90px;"><center>'.$result['phone_client'].'</center></td>';
                                
								echo '<td style="vertical-align: middle;"><center>';
							    for($i=0;$i<$order_count-1;$i++)
								{	
									$order_arr = explode("|", $order[$i]);							
									     echo '<table width="100%" cellpadding="2" cellspacing="1" style="border: 1px groove black;" >
                                              <tr>
                                                <td ><center>'.$order_arr[0].'</center></td>
                                                <td style="width:20px;border: 1px groove black;"><center>'.$order_arr[1]."шт.".'</center></td>
                                                <td style="width:20px;border: 1px groove black;"><center>'.$order_arr[2]."₴".'</center></td>
                                              </tr>
                                             </table>';
								}
							    echo '</center></td>';
								echo '<td style="vertical-align: middle;width: 20px;"><center>'."".'</center></td>';
								echo '<td style="vertical-align: middle;width: 20px;"><center>'."".'</center></td>';
								if($arr[1]=="OTDEL")
                                {
									$pay=explode("/", $arr[6]);
								}
								elseif($arr[1]=="ADDRES"){
									$pay=explode("/", $arr[5]);
								}
								else{
								$pay=explode("/", $arr[4]);	
								}
								if($pay[0]=="-") {$plat="Отнять";}
                                elseif($pay[0]==""){$plat="Клиент";}
								echo '<td style="vertical-align: middle;width: 20px;"><center>'.$plat.'</center></td>';
								
								if($_SESSION['access']=='3')
                                    {

                                    }
                                else
                                    {
                                      $manager=$result['manager'];
                                        $query_manager = "SELECT * FROM `users` WHERE id='".$manager."'";
                                        $res_manager = mysql_query($query_manager) or die(mysql_error());
                                        $result_manager = mysql_fetch_array($res_manager);
                                        $manager=$result_manager['full_name'];
                                        $manager=explode(' ', $manager);
                                        $manager=$manager[1];
                                        $phone=$result_manager['personal_phone'];

                                        echo '<td style="vertical-align: middle;width: 20px;"><center><a href="/info_user.php?id='.$result['manager'].'" target="_blank">'.$manager.'</a></center></td>';
                                    }
									
                                
                                $query_post = "SELECT delivery_info FROM `call_preorder` WHERE call_id='".$result['id']."'";
                                $res_post = mysql_query($query_post) or die(mysql_error());
                                $result_post = mysql_fetch_array($res_post);
                                $post=$result_post['0'];
                                $post=explode("|", $post);
                                $post=$post[0];
								if($_SESSION['access']=='4'||$_SESSION['access']=='1'){
									echo '<td style="vertical-align: middle;width: 10px;">
                                     <center>
                                     <div id="result_ready_preorder_'.$result['id'].'">
                                     <input type="button" style="width:75px;margin-top: 5px;" name="submit" onClick = "not_designed(this)" id="'.$result['id'].'|'.$_SESSION['id'].'" value="Не взял" class="blueBtn" /><br>
                                     <input type="button" style="margin-top: 5px;" name="submit" onClick = "return_order(this)" id="'.$result['id'].'|'.$_SESSION['id'].'" value="Возврат" class="redBtn" />
                                     </div>
                                       </center>
                                       </td>
									   </tr>';
									
		                        //echo '<td style="vertical-align: middle;width: 5px;"><center><div id="result_ready_preorder_'.$result['id'].'"><input type="button" name="submit" onClick = "designed(this)" id="'.$result['id'].'|'.$_SESSION['id'].'" value="Да!" class="blueBtn" /></div></center></td>';
                                }
								else{
									echo '<td style="vertical-align: middle;width: 10px;">
                                     <center>
                                     <div id="result_ready_preorder_'.$result['id'].'">
                                     <input type="button" style="width:75px;margin-top: 5px;" name="submit" onClick = "" id="'.$result['id'].'|'.$_SESSION['id'].'" value="Взял" class="blueBtn" /><br>
                                     <input type="button" style="margin-top: 5px;" name="submit" onClick = "return_order(this)" id="'.$result['id'].'|'.$_SESSION['id'].'" value="Возврат" class="redBtn" />
                                     </div>
                                       </center>
                                       </td>
									   </tr>';
							    //echo '<td style="vertical-align: middle;width: 5px;"><center><div id="result_ready_preorder_'.$result['id'].'"><input type="button" name="submit" onClick = "" id="'.$result['id'].'|'.$_SESSION['id'].'" value="Да!" class="blueBtn" /></div></center></td>';
							    }
								echo '</tr>';


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