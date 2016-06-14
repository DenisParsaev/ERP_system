<?php
include 'include/themplate/header.php';
if($_SESSION['id']!="" && $_SESSION['access']=="1")
	{

?>

<script type="text/javascript">
    function designed(obj) {
        id = (obj.id);
        tag=id.split('|');

        cost_price = $("#cost_price_"+ tag[2] +"").val();
        prepay_boses = $("#prepay_boses_"+ tag[2] +"").val();
        pre_pay = $("#pre_pay_"+ tag[2] +"").val();
        full_payng =  $("#full_payng_"+ tag[2] +"").val();

                if(cost_price!="" && pre_pay!="")
                    {
                        $.ajax({
                            type: 'POST',
                            url: '/function/func_calculated_orders.php?&id=' + id + '&prepay_boses=' + prepay_boses + '&cost_price=' + cost_price + '&full_payng=' + full_payng + '&pre_pay=' + pre_pay + '',
                            success: function(data) {
                            id=id.split('|',1)
                                $('#result_designed_' + id + '').html(data);
                            },
                            error:  function(xhr, str){
                                alert('Возникла ошибка: ' + xhr.responseCode);
                            }
                        });
                    }
                else
                    {
                    alert('Ошибка ввода данных!');
                    }

    }
	function return_order(obj) {
        var id = (obj.id);
        $.ajax({
            type: 'POST',
            url: '/function/return_shipped_orders_base.php?id='+id,
            data: id,
            success: function(data) {
                id=id.split('|',1);
                $('#result_designed_'+id).html(data);
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
    	<div class="title"><h5>Перечень отгруженых заказов</h5></div>
        <div class="table" style="margin-top: 10px;">
            <div class="head"><h5 class="iFrames" style="width: 96%;">Отгруженные товары</h5></div>
            <table  cellpadding="0" cellspacing="0" border="0" class="display" id="example"  >
                <thead>
                    <tr>
                        <th style="width: 85px;">№ заказа</th>
                        <th style="width: 100px;">Предзаказ</th>
                        <th style="width: 100px;">Изготовление</th>
                        <th style="width: 100px;">Отправка</th>
                        <th style="width: 85px;">ФИО</th>
                        <th style="width: 210px;">Телефон</th>
                        <th >Доставка</th>
						<th style="width: 75px;">Сумма</th>
						<th style="width: 75px;">CС</th>
						<th style="width: 75px;">Предоплата</th>
						<th >Получил</th>
						<th style="width: 85px;">Статус</th>
                    </tr>
                </thead>
                <tbody>
				<?php
				    if($_SESSION['access']=='1')
                        {
                            $query = "SELECT * FROM `scroll_call` WHERE `status`='10' ORDER BY `id` DESC";
                        }
                    else
                        {
                            $query = "SELECT * FROM `scroll_call` WHERE `status`='10' AND `manager`='".$_SESSION['id']."' ORDER BY `id` DESC";
                        }
                    $res = mysql_query($query) or die(mysql_error());
                    $i=0;
                        while ($result = mysql_fetch_array($res))
                            {
							    $number=str_pad($result['id'], 6, '0', STR_PAD_LEFT);;
                                $name_client=$result['name_client'];
                                $manager=$result['manager'];

                                $query_preorder = "SELECT * FROM `call_preorder` WHERE call_id='".$result['id']."'";
                                $res_preorder = mysql_query($query_preorder) or die(mysql_error());
                                $result_preorder = mysql_fetch_array($res_preorder);

                                $pay=$result_preorder['pay_info'];
                                $pay=explode('|',$pay);
                                $type=$pay[0];
                                $full=$pay[1];
                                $prepay=$pay[2];

                                $delivery=$result_preorder['delivery_info'];
                                $delivery=explode('|',$delivery);
                                $delivery=$delivery[0];

                                if($delivery=="ADDRES"){$delivery="Адресная";}
                                if($delivery=="INTIME"){$delivery="InTime";}
                                if($delivery=="NP"){$delivery="Новая Почта";}
                                if($delivery=="PICKUP"){$delivery="Самовывоз";}


                                $query_manager = "SELECT login FROM `users` WHERE id='".$manager."'";
                                $res_manager = mysql_query($query_manager) or die(mysql_error());
                                $result_manager = mysql_fetch_array($res_manager);
                                $manager=$result_manager['login'];
                                $name_client=$result['name_client'];


                                $date_preorder=explode(" ", $result['date_preorder']);
                                $date_ready=explode(" ", $result['date_ready']);
                                $date_shipped=explode(" ", $result['date_shipped']);

                                $date=explode("-", $date_preorder[0]);
                                $year_preorder=$date[0];
                                $mon_preorder=$date[1];
                                $day_preorder=$date[2];

                                $date=explode("-", $date_ready[0]);
                                $year_ready=$date[0];
                                $mon_ready=$date[1];
                                $day_ready=$date[2];

                                $date=explode("-", $date_shipped[0]);
                                $year_shipped=$date[0];
                                $mon_shipped=$date[1];
                                $day_shipped=$date[2];

                                echo '<tr class="gradeA">';
                                echo '<td style="vertical-align: middle;"><center><a href="/info_order.php?id='.$result['id'].'">#'.$number.'</a></center></td>';
                                echo '<td style="vertical-align: middle;"><center>'.$day_preorder.'-'.$mon_preorder.'-'.$year_preorder.'<br>'.$date_preorder[1].'</center></td>';
                                echo '<td style="vertical-align: middle;"><center>'.$day_ready.'-'.$mon_ready.'-'.$year_ready.'<br>'.$date_ready[1].'</center></td>';
                                echo '<td style="vertical-align: middle;"><center>'.$day_shipped.'-'.$mon_shipped.'-'.$year_shipped.'<br>'.$date_shipped[1].'</center></td>';
                                echo '<td style="vertical-align: middle;width: 200px;"><center>'.$name_client.'</center></td>';
                                echo '<td style="vertical-align: middle;width: 120px;"><center>'.$result['phone_client'].'</center></td>';
                                echo '<td style="vertical-align: middle;"><center>'.$delivery.'</center></td>';

                                echo '<td style="vertical-align: middle;"><center>'.$full.' ₴<input type="hidden" id="full_payng_'.$i.'" name="full_payng" value="'.$full.'"/></center></td>';
                                echo '<td style="vertical-align: middle;"><center><input id="cost_price_'.$i.'" style="width: 50px;" name="cost_price" value="'.$result['cost_delivery'].'"/></center></td>';
                                echo '<td style="vertical-align: middle;"><center>'.$prepay.'<input type="hidden" id="pre_pay_'.$i.'" name="pre_pay" value="'.$prepay.'"/></center></td>';
                                echo '<td style="vertical-align: middle;"><center><input id="prepay_boses_'.$i.'" style="width: 50px;" name="prepay_boses"/></center></td>';
								echo '<td style="vertical-align: middle;width: 200px;">
                                     <center>
                                     <div id="result_designed_'.$result['id'].'">
                                     <input type="button" style="margin-top: 5px;" name="submit" onClick = "designed(this)" id="'.$result['id'].'|'.$_SESSION['id'].'|'.$i.'" value="Рассчитан" class="blueBtn" /><br>
                                     <input type="button" style="width:86px;margin-top: 5px;" name="submit" onClick = "return_order(this)" id="'.$result['id'].'|'.$_SESSION['id'].'|'.$i.'" value="Возврат" class="redBtn" />
                                     </div>
                                       </center>
                                       </td>
									   </tr>';
                                //echo '<td style="vertical-align: middle;width: 200px;"><center><div id="result_designed_'.$result['id'].'"><input type="button" name="submit" onClick = "designed(this)" id="'.$result['id'].'|'.$_SESSION['id'].'|'.$i.'" value="Рассчитан" class="blueBtn" /></div></center></td>';
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