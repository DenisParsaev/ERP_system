<?php
include 'include/themplate/header.php';
if($_SESSION['id']!="")
	{
		$id=$_GET['id'];
		$query = "SELECT * FROM `scroll_call` WHERE id='".$id."'";
		$res = mysql_query($query) or die(mysql_error());
		$result = mysql_fetch_array($res);
		$number=str_pad($result['id'], 6, '0', STR_PAD_LEFT);
		//Определение имени менеджера
		$manager=$result['manager'];
		$query_manager = "SELECT login FROM `users` WHERE id='".$manager."'";
		$res_manager = mysql_query($query_manager) or die(mysql_error());
		$result_manager = mysql_fetch_array($res_manager);
		$manager=$result_manager['login'];
		//Разделение строки заказов на отдельные заказы
		$order = explode("/", $result['order_content']);	
		$order_count=count($order);
		//Определение названия статуса заявки
		$status=$result['status'];
		$query_status = "SELECT name FROM `setting_status` WHERE id='".$status."'";
		$res_status = mysql_query($query_status) or die(mysql_error());
		$result_status = mysql_fetch_array($res_status);
		$status=$result_status['name'];
		//Проверка статуса "Ожидание до"
		if($result['status']=="2")
			{
				$status="Ожидание до ".$result['date_expectation']."";
			}

		if($result['name_client']=="")
			{
				$name_client="Не указано";
			}
		else
			{
				$name_client=$result['name_client'];
			}
?>
<script type="text/javascript" language="javascript">
    function update_product() {
      var msg   = $('#update_product').serialize();
        $.ajax({
          type: 'POST',
          url: '/function/update_product.php',
          data: msg,
          success: function(data) {
            $('#result_update_product').html(data);
          },
          error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
    }
	
    function add_comment() {
      var msg   = $('#add_comment').serialize();
        $.ajax({
          type: 'POST',
          url: '/function/add_comment.php',
          data: msg,
          success: function(data) {
            $('#result_add_comment').html(data);
          },
          error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
    }	

    function edit_product() {
      var msg   = $('#edit_product').serialize();
        $.ajax({
          type: 'POST',
          url: '/function/edit_product.php',
          data: msg,
          success: function(data) {
            $('#result_edit_product').html(data);
          },
          error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
    }



</script>
<script>
$(document).ready(function(){
	var i = 1;
	$('#add').click(function() {
		$('<div class="rowElem noborder" id="field"><input type="text" placeholder="Наименования товара №' + i + '" style="width:555px;" name="name_product[]"/><input type="text" pattern="^[ 0-9]+$" placeholder="Кол-во товара №' + i + '" style="width:110px;margin-left:3px;margin-right:3px;" name="col_product[]"/><input type="text" placeholder="Цена товара №' + i + '" style="width:110px;margin-left:0px;margin-right:3px;" name="price_product[]"/><select data-placeholder="Категория" class="select_' + i + '" name="category[]" tabindex="2"><option value=""></option><?php $query_place = "SELECT * FROM `place_manfacture`"; $res_place = mysql_query($query_place) or die(mysql_error()); while ($result_place = mysql_fetch_array($res_place)) {echo '<option value="'.$result_place['id'].'">'.$result_place['name_property'].'</option> ';}?></select><br></div></div>').fadeIn('slow').appendTo('.inputs');
		$(".select_" +  i + "").select2();
		i++;
		document.getElementById('save').style.display = '';
		document.getElementById('save_2').style.display = '';
	});
	
	$('#edit').click(function() {
      var msg   = $('#edit').serialize();
        $.ajax({
          type: 'POST',
          url: '/function/edit_product_themplate.php?id=<?php echo $id;?>',
          data: msg,
          success: function(data) {
            $('#result_edit_product_themplate').html(data);
            $(".select").select2();
          },
          error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });

	});	
	

	
	$('#remove').click(function() {
	if(i > 1) {
		$('#field:last').remove();
		i--; 
	}
	});
});
</script>

<style>
.formRight {
    float: right;
    width: 756px;
    margin: 12px 0;
    display: block;
    position: relative;
}

.select2-container {
    position: relative;
    display: inline-flex;
    zoom: 1;
    *display: inline;
}

.select2-container .select2-choice {
    border: 1px solid #d5d5d5;
    display: block;
    overflow: hidden;
    white-space: nowrap;
    position: relative;
    line-height: 27px;
    height: 27px;
    width: 147px;
    padding: 1px 0 0 10px;
    text-decoration: none;
    font-size: 11px;
    color: #707070;
    background: #fcfcfc;
    background: -moz-linear-gradient(top, #fcfcfc 0%, #f4f4f4 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fcfcfc), color-stop(100%,#f4f4f4));
    background: -webkit-linear-gradient(top, #fcfcfc 0%,#f4f4f4 100%);
    background: -o-linear-gradient(top, #fcfcfc 0%,#f4f4f4 100%);
    background: -ms-linear-gradient(top, #fcfcfc 0%,#f4f4f4 100%);
    background: linear-gradient(top, #fcfcfc 0%,#f4f4f4 100%);
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    box-shadow: 0 1px 0 #fff inset, 0 1px 0px #eeeeee;
    -webkit-box-shadow: 0 1px 0 #fff inset, 0 1px 0px #eeeeee;
    -moz-box-shadow: 0 1px 0 #fff inset, 0 1px 0px #eeeeee;
}

</style>

</head>
<body>
<?php 
include 'include/themplate/top_band.php'; 
include 'include/themplate/top_menu.php'; 
?>
<div class="wrapper">
    <div class="content" style="width: 100%;">
    	<div class="title"><h5>Звонок #<?php echo $number;?></h5></div>
    	    <?php
    	        if($result['status']=="14" && $result['explanatory']!="" )
    	            {
    	    ?>
                <div class="widget first">
                    <div class="head"><h5 class="iCreate">Объяснительная</h5></div>
                    <div class="body">

                        <?php
                        echo $result['explanatory'];
                            if($result['explanatory']=="" && $result['manager']==$_SESSION['id'])
                                {
                        ?>
                        <form method="POST" id="explanatory_id" action="javascript:void(null);" onsubmit="explanatory_id()" class="mainForm">
                            <fieldset>
                                <center>
                                    <input type="hidden" name="call_id" value="<?php echo $result['id'];?>"/>
                                    <input type="hidden" name="user" value="<?php echo $_SESSION['id'];?>"/>
                                    <textarea rows="8" cols="" required class="auto" name="explanatory" placeholder="Объяснительная" style="width:98%;margin-top:10px;margin-bottom:10px;"></textarea>
                                    <input type="submit" value="Отправить объяснительную" style="width:98%;" class="greenBtn" />
                                </center>
                                <div id="result"></div>
                            </fieldset>
                        </form>
                        <?php
                                }
                         ?>
                    </div>
                </div>
    	    <?php
    	            }
            ?>
			<div class="fluid">
				<!--Заказ (начало)-->
                <div class="widget" style="margin-top: 10px;">
                    <div class="head">
                        <div class="userWidget">
                          <a href="#" title="" class="userLink"> Заказ #<?php echo $number;?></a>
                        </div>
                        <div class="num">
                            <?php
                                if($result['status']=="8" || $result['status']=="11"  || $result['status']=="13" || $result['status']=="7"  || $result['status']=="10"  || $result['status']=="9"  || $result['status']=="99")
                                    {

                                    }
                                elseif($result['status']=="14")
                                    {
                                        if( $_SESSION['access']=="1")
                                            {
                                                echo '<a href="/function/del_order.php?id='.$id.'&manager='.$_SESSION['id'].'" class="redNum"  style="margin-right:5px;">Удалить заказ</a>';
                                            }
                                    }
                                else
                                    {
                                        if($_SESSION['id']==$result['manager'] || $_SESSION['access']=="1")
                                            {
                                                echo '<a id="address" href="/pre_order.php?id='.$id.'" class="greenNum" style="margin-right:5px;">Оформить предзаказ</a>';
                                                echo '<a href="/function/del_order.php?id='.$id.'&manager='.$_SESSION['id'].'" class="redNum"  style="margin-right:5px;">Удалить заказ</a>';
                                            }
                                        if($_SESSION['id']!=$result['manager'] || $_SESSION['access']=="1")
                                            {
                                                //echo '<a href="/take_order.php?id='.$id.'" class="redNum">Забрать заказ</a>';
                                            }

                                    }
                            ?>

							<!--<a href="#" class="blueNum">Изменить</a>-->
						</div>
                    </div>
                    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
                        <tbody>
                            <tr class="noborder">
                                <td style="width: 25%;">Номер заказа:</td>
								<td style="width: 25%;"><center>#<?php echo $number;?></center></td>
								<td style="width: 25%;border-left: 2px groove black;">Дата добавления:</td>
                                <td style="width: 25%;"><center><?php echo $result['date_add'];?></center></td>
                            </tr>	
                            <tr>
                                <td style="width: 25%;">Имя клиента:</td>
								<td style="width: 25%;"><center><?php echo $name_client;?></center></td>
								<td style="width: 25%;border-left: 2px groove black;">Дата обновления:</td>
                                <td style="width: 25%;"><center><?php echo $result['date_update'];?></center></td>
                            </tr>	
                            <tr>
                                <td style="width: 25%;">Телефон клиента:</td>
								<td style="width: 25%;"><center><?php echo $result['phone_client'];?></center></td>
								<td style="width: 25%;border-left: 2px groove black;">Статус:</td>
								<?php
								    if($result['status']=="8")
								        {
								            echo '<td style="width: 25%;background-color: #00CC66;"><center><b>'.$status.'</b></center></td>';
								        }
								    elseif($result['status']=="0" || $result['status']=="2")
								        {
								            echo '<td style="width: 25%;background-color: #FFFF99;"><center><b>'.$status.'</b></center></td>';
								        }
								    else
								        {
								            echo '<td style="width: 25%;"><center><b>'.$status.'</b></center></td>';
								        }
								?>

                            </tr>	
                            <tr>
                                <td style="width: 25%;">Город клиента:</td>
								<td style="width: 25%;"><center><?php echo $result['city_client'];?></center></td>
								<td style="width: 25%;border-left: 2px groove black;">Менеджер:</td>
                                <td style="width: 25%;"><center><?php if($_SESSION['access']=="1"){echo '<a href="/info_user.php?id='.$result['manager'].'" target="_blank">'.$manager.'</a>';}else{echo $manager;}?></center></td>
                            </tr>
                            <?php
                                if($result['status']!="0" || $result['status']!="2" || $result['status']!="5")
                                    {
                                        $query_preorder = "SELECT * FROM `call_preorder` WHERE call_id='".$id."'";
                                        $res_preorder = mysql_query($query_preorder) or die(mysql_error());
                                        $result_preorder = mysql_fetch_array($res_preorder);

                                        $pay=$result_preorder['pay_info'];
                                        $delivery=$result_preorder['delivery_info'];

                                        $pay = explode("|", $pay);
                                            if($pay[0]=="FULL")
                                                {
                                                    if($pay[2]=="PC")
                                                        {
                                                            $pay_type="Полная оплата";
                                                            $pay_name="Расчетный счет";
                                                            $pay_sum=$pay[1];
                                                            echo '<tr>';
                                                            echo '<td style="width: 25%;border-top: 2px groove black;">Тип оплаты:</td>';
                                                            echo '<td style="width: 25%;border-top: 2px groove black"><center>'.$pay_type.'</center></td>';
                                                            echo '<td style="width: 25%;border-top: 2px groove black;border-left: 2px groove black;">Форма оплаты:</td>';
                                                            echo '<td style="width: 25%;border-top: 2px groove black"><center>'.$pay_name.'</center></td>';
                                                            echo '</tr>';
                                                            echo '<tr>';
                                                            echo '<td style="width: 25%;">Сумма оплаты:</td>';
                                                            echo '<td style="width: 25%;"><center>'.$pay_sum.' ₴</center></td>';
                                                            echo '<td style="width: 25%;border-left: 2px groove black;">Сумма предоплаты:</td>';
                                                            echo '<td style="width: 25%;"><center>-</center></td>';
                                                            echo '</tr>';
                                                        }
                                                    if($pay[2]=="HDC")
                                                        {
                                                            $pay_type="Полная оплата";
                                                            $pay_name="НДС";
                                                            $pay_sum=$pay[1];
                                                            echo '<tr>';
                                                            echo '<td style="width: 25%;border-top: 2px groove black;">Тип оплаты:</td>';
                                                            echo '<td style="width: 25%;border-top: 2px groove black"><center>'.$pay_type.'</center></td>';
                                                            echo '<td style="width: 25%;border-top: 2px groove black;border-left: 2px groove black;">Форма оплаты:</td>';
                                                            echo '<td style="width: 25%;border-top: 2px groove black"><center>'.$pay_name.'</center></td>';
                                                            echo '</tr>';
                                                            echo '<tr>';
                                                            echo '<td style="width: 25%;">Сумма оплаты:</td>';
                                                            echo '<td style="width: 25%;"><center>'.$pay_sum.' ₴</center></td>';
                                                            echo '<td style="width: 25%;border-left: 2px groove black;">Сумма предоплаты:</td>';
                                                            echo '<td style="width: 25%;"><center>-</center></td>';
                                                            echo '</tr>';
                                                        }
                                                    if($pay[2]=="CARD")
                                                        {
                                                            $pay_type="Полная оплата";
                                                            $pay_name="ПриватБанк [".$pay[3]."]";
                                                            $pay_sum=$pay[1];
                                                            echo '<tr>';
                                                            echo '<td style="width: 25%;border-top: 2px groove black;">Тип оплаты:</td>';
                                                            echo '<td style="width: 25%;border-top: 2px groove black"><center>'.$pay_type.'</center></td>';
                                                            echo '<td style="width: 25%;border-top: 2px groove black;border-left: 2px groove black;">Форма оплаты:</td>';
                                                            echo '<td style="width: 25%;border-top: 2px groove black"><center>'.$pay_name.'</center></td>';
                                                            echo '</tr>';
                                                            echo '<tr>';
                                                            echo '<td style="width: 25%;">Сумма оплаты:</td>';
                                                            echo '<td style="width: 25%;"><center>'.$pay_sum.' ₴</center></td>';
                                                            echo '<td style="width: 25%;border-left: 2px groove black;">Сумма предоплаты:</td>';
                                                            echo '<td style="width: 25%;"><center>-</center></td>';
                                                            echo '</tr>';
                                                        }
                                                    if($pay[2]=="CASH")
                                                        {
                                                            $pay_type="Полная оплата";
                                                            $pay_name="Наличный рассчет";
                                                            $pay_sum=$pay[1];
                                                            $pay_from=$pay[3];

                                                            $pay_cash = explode("/", $pay[4]);
                                                            $pay_to=$pay_cash[0];
                                                            $pay_from_phone=$pay_cash[1];
                                                            echo '<tr>';
                                                            echo '<td style="width: 25%;border-top: 2px groove black;">Тип оплаты:</td>';
                                                            echo '<td style="width: 25%;border-top: 2px groove black"><center>'.$pay_type.'</center></td>';
                                                            echo '<td style="width: 25%;border-top: 2px groove black;border-left: 2px groove black;">Форма оплаты:</td>';
                                                            echo '<td style="width: 25%;border-top: 2px groove black"><center>'.$pay_name.'</center></td>';
                                                            echo '</tr>';
                                                            echo '<tr>';
                                                            echo '<td style="width: 25%;">Сумма оплаты:</td>';
                                                            echo '<td style="width: 25%;"><center>'.$pay_sum.' ₴</center></td>';
                                                            echo '<td style="width: 25%;border-left: 2px groove black;">Телефон плательщика:</td>';
                                                            echo '<td style="width: 25%;"><center>'.$pay_from_phone.'</center></td>';
                                                            echo '</tr>';
                                                            echo '<tr>';
                                                            echo '<td style="width: 25%;">Плательщик:</td>';
                                                            echo '<td style="width: 25%;"><center>'.$pay_from.'</center></td>';
                                                            echo '<td style="width: 25%;border-left: 2px groove black;">Получатель:</td>';
                                                            echo '<td style="width: 25%;"><center>'.$pay_to.'</center></td>';
                                                            echo '</tr>';
                                                        }
                                                }
                                            if($pay[0]=="NO_PAY")
                                                {
                                                    echo '<tr>';
                                                    echo '<td style="width: 25%;border-top: 2px groove black;">Тип оплаты:</td>';
                                                    echo '<td style="width: 25%;border-top: 2px groove black"><center>Без оплаты</center></td>';
                                                    echo '<td style="width: 25%;border-top: 2px groove black;border-left: 2px groove black;">Форма оплаты:</td>';
                                                    echo '<td style="width: 25%;border-top: 2px groove black"><center>Без оплаты</center></td>';
                                                    echo '</tr>';
                                                }
                                            if($pay[0]=="PREPAY")
                                                {
                                                    if($pay[3]=="PC")
                                                        {
                                                            $pay_type="Предоплата";
                                                            $pay_name="Расчетный счет";
                                                            $pay_sum=$pay[1];
                                                            $pay_presum=$pay[2];

                                                            $percent=$pay_presum*100/$pay_sum;
                                                            $percent = number_format($percent, 2, '.', '');
                                                            $pay_presum=''.$pay[2].' ₴ ('.$percent.'%)';
                            ?>
                            <tr>
                                <td style="width: 25%;border-top: 2px groove black;">Тип оплаты:</td>
								<td style="width: 25%;border-top: 2px groove black"><center><?php echo $pay_type;?></center></td>
								<td style="width: 25%;border-top: 2px groove black;border-left: 2px groove black;">Форма оплаты:</td>
                                <td style="width: 25%;border-top: 2px groove black"><center><?php echo $pay_name;?></center></td>
                            </tr>
                            <tr>
                                <td style="width: 25%;">Сумма оплаты:</td>
								<td style="width: 25%;"><center><?php echo $pay_sum;?> ₴</center></td>
								<td style="width: 25%;border-left: 2px groove black;">Сумма предоплаты:</td>
                                <td style="width: 25%;"><center><?php echo $pay_presum;?></center></td>
                            </tr>
                            <?php
                                                        }
                                                    if($pay[3]=="HDC")
                                                        {
                                                        $pay_type="Предоплата";
                                                        $pay_name="НДС";
                                                        $pay_sum=$pay[1];
                                                        $pay_presum=$pay[2];

                                                        $percent=$pay_presum*100/$pay_sum;
                                                        $percent = number_format($percent, 2, '.', '');
                                                        $pay_presum=''.$pay[2].' ₴ ('.$percent.'%)';
                            ?>
                            <tr>
                                <td style="width: 25%;border-top: 2px groove black;">Тип оплаты:</td>
								<td style="width: 25%;border-top: 2px groove black"><center><?php echo $pay_type;?></center></td>
								<td style="width: 25%;border-top: 2px groove black;border-left: 2px groove black;">Форма оплаты:</td>
                                <td style="width: 25%;border-top: 2px groove black"><center><?php echo $pay_name;?></center></td>
                            </tr>
                            <tr>
                                <td style="width: 25%;">Сумма оплаты:</td>
								<td style="width: 25%;"><center><?php echo $pay_sum;?> ₴</center></td>
								<td style="width: 25%;border-left: 2px groove black;">Сумма предоплаты:</td>
                                <td style="width: 25%;"><center><?php echo $pay_presum;?></center></td>
                            </tr>
                            <?php
                                                        }
                                                    if($pay[3]=="CARD")
                                                        {
                                                        $pay_type="Предоплата";
                                                        $pay_name="ПриватБанк [".$pay[4]."]";
                                                        $pay_sum=$pay[1];
                                                        $pay_presum=$pay[2];

                                                        $percent=$pay_presum*100/$pay_sum;
                                                        $percent = number_format($percent, 2, '.', '');
                                                        $pay_presum=''.$pay[2].' ₴ ('.$percent.'%)';

                            ?>
                            <tr>
                                <td style="width: 25%;border-top: 2px groove black;">Тип оплаты:</td>
								<td style="width: 25%;border-top: 2px groove black"><center><?php echo $pay_type;?></center></td>
								<td style="width: 25%;border-top: 2px groove black;border-left: 2px groove black;">Форма оплаты:</td>
                                <td style="width: 25%;border-top: 2px groove black"><center><?php echo $pay_name;?></center></td>
                            </tr>
                            <tr>
                                <td style="width: 25%;">Сумма оплаты:</td>
								<td style="width: 25%;"><center><?php echo $pay_sum;?> ₴</center></td>
								<td style="width: 25%;border-left: 2px groove black;">Сумма предоплаты:</td>
                                <td style="width: 25%;"><center><?php echo $pay_presum;?></center></td>
                            </tr>
                            <?php
                                                        }
                                                     if($pay[3]=="CASH")
                                                        {
                                                            $pay_type="Предоплата";
                                                            $pay_name="Наличный рассчет";
                                                            $pay_sum=$pay[1];
                                                            $pay_presum=$pay[2];

                                                            $percent=$pay_presum*100/$pay_sum;
                                                            $percent = number_format($percent, 2, '.', '');
                                                            $pay_presum=''.$pay[2].' ₴ ('.$percent.'%)';


                                                            $pay_from=$pay[4];

                                                            $pay_cash = explode("/", $pay[5]);
                                                            $pay_to=$pay_cash[0];
                                                            $pay_from_phone=$pay_cash[1];
                            ?>
                            <tr>
                                <td style="width: 25%;border-top: 2px groove black;">Тип оплаты:</td>
								<td style="width: 25%;border-top: 2px groove black"><center><?php echo $pay_type;?></center></td>
								<td style="width: 25%;border-top: 2px groove black;border-left: 2px groove black;">Форма оплаты:</td>
                                <td style="width: 25%;border-top: 2px groove black"><center><?php echo $pay_name;?></center></td>
                            </tr>
                            <tr>
                                <td style="width: 25%;">Сумма оплаты:</td>
								<td style="width: 25%;"><center><?php echo $pay_sum;?> ₴</center></td>
								<td style="width: 25%;border-left: 2px groove black;">Сумма предоплаты:</td>
                                <td style="width: 25%;"><center><?php echo $pay_presum;?></center></td>
                            </tr>
                            <tr>
                                <td style="width: 25%;">Плательщик:</td>
								<td style="width: 25%;"><center><?php echo $pay_from;?></center></td>
								<td style="width: 25%;border-left: 2px groove black;">Получатель:</td>
                                <td style="width: 25%;"><center><?php echo ''.$pay_to.' ['.$pay_from_phone.']';?></center></td>
                            </tr>
                            <?php
                                                        }
                                                }
                                $delivery= explode("|", $delivery);
                                if($delivery[0]=="NP" || $delivery[0]=="INTIME")
                                    {
                                        if($delivery[1]=="OTDEL")
                                            {
                                                $office=$delivery[2];

                                                if($delivery[0]=="NP"){$delivery_post="Новая Почта";}
                                                if($delivery[0]=="INTIME"){$delivery_post="InTime";}

                                                $contact = explode("/", $delivery[3]);
                                                $name=$contact[0];
                                                $phone=$contact[1];

                                                $addres = explode("/", $delivery[4]);
                                                $region=$addres[0];
                                                $city=$addres[1];

                                                $order_delivery = explode("/", $delivery[5]);
                                                $weight=$order_delivery[1];

                                                $price_delivery = explode("/", $delivery[6]);
                                                $postage_charge=$price_delivery[0];
                                                $imposed=$price_delivery[1];

                                                ?>
                                                <tr>
                                                    <td style="width: 25%;border-top: 2px groove black;">Служба доставки:</td>
                                                    <td style="width: 25%;border-top: 2px groove black"><center><?php echo $delivery_post;?></center></td>
                                                    <td style="width: 25%;border-top: 2px groove black;border-left: 2px groove black;">Тип доставки:</td>
                                                    <td style="width: 25%;border-top: 2px groove black"><center>До Отделения</center></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 25%;">Отделение:</td>
                                                    <td style="width: 25%;"><center><?php echo $office;?></center></td>
                                                    <td style="width: 25%;border-left: 2px groove black;">Получатель:</td>
                                                    <td style="width: 25%;"><center><?php echo $name;?></center></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 25%;">Телефон получателя:</td>
                                                    <td style="width: 25%;"><center><?php echo $phone;?></center></td>
                                                    <td style="width: 25%;border-left: 2px groove black;">Область:</td>
                                                    <td style="width: 25%;"><center><?php echo $region;?></center></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 25%;">Город:</td>
                                                    <td style="width: 25%;"><center><?php echo $city;?></center></td>
                                                    <td style="width: 25%;border-left: 2px groove black;">Вес:</td>
                                                    <td style="width: 25%;"><center><?php echo $weight;?></center></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 25%;">Наложеный платеж:</td>
                                                    <td style="width: 25%;"><center><?php echo $imposed;?></center></td>
                                                    <td style="width: 25%;border-left: 2px groove black;">Стоимость доставки:</td>
                                                    <td style="width: 25%;"><center><?php echo $postage_charge;?></center></td>
                                                </tr>
                                                <?php

                                            }
                                        if($delivery[1]=="ADDRES")
                                            {
                                                $office=$delivery[2];

                                                if($delivery[0]=="NP"){$delivery_post="Новая Почта";}
                                                if($delivery[0]=="INTIME"){$delivery_post="InTime";}

                                                $contact = explode("/", $delivery[3]);
                                                $name=$contact[0];
                                                $phone=$contact[1];

                                                $addres = explode("/", $delivery[4]);
                                                $region=$addres[0];
                                                $city=$addres[1];

                                                $order_delivery = explode("/", $delivery[5]);
                                                $weight=$order_delivery[1];

                                                $price_delivery = explode("/", $delivery[6]);
                                                $postage_charge=$price_delivery[0];
                                                $imposed=$price_delivery[1];

                                                ?>
                                                <tr>
                                                    <td style="width: 25%;border-top: 2px groove black;">Служба доставки:</td>
                                                    <td style="width: 25%;border-top: 2px groove black"><center><?php echo $delivery_post;?></center></td>
                                                    <td style="width: 25%;border-top: 2px groove black;border-left: 2px groove black;">Тип доставки:</td>
                                                    <td style="width: 25%;border-top: 2px groove black"><center>Адресная</center></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 25%;">Адрес:</td>
                                                    <td style="width: 25%;"><center><?php echo $office;?></center></td>
                                                    <td style="width: 25%;border-left: 2px groove black;">Получатель:</td>
                                                    <td style="width: 25%;"><center><?php echo $name;?></center></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 25%;">Телефон получателя:</td>
                                                    <td style="width: 25%;"><center><?php echo $phone;?></center></td>
                                                    <td style="width: 25%;border-left: 2px groove black;">Область:</td>
                                                    <td style="width: 25%;"><center><?php echo $region;?></center></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 25%;">Город:</td>
                                                    <td style="width: 25%;"><center><?php echo $city;?></center></td>
                                                    <td style="width: 25%;border-left: 2px groove black;">Вес:</td>
                                                    <td style="width: 25%;"><center><?php echo $weight;?></center></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 25%;">Наложеный платеж:</td>
                                                    <td style="width: 25%;"><center><?php echo $imposed;?></center></td>
                                                    <td style="width: 25%;border-left: 2px groove black;">Стоимость доставки:</td>
                                                    <td style="width: 25%;"><center><?php echo $postage_charge;?></center></td>
                                                </tr>
                                                <?php

                                            }

                                    }


                                        if($delivery[0]=="ADDRES")
                                            {
                                                $contact = explode("/", $delivery[1]);
                                                $name=$contact[0];
                                                $phone=$contact[1];

                                                $address = explode("/", $delivery[2]);
                                                $region=$address[0];
                                                $city=$address[1];
                                                $addres=$address[2];

                                                $order_delivery = explode("/", $delivery[3]);
                                                $weight=$order_delivery[1];

                                                $price_delivery = explode("/", $delivery[4]);
                                                $postage_charge=$price_delivery[0];
                                                $imposed=$price_delivery[1];

                                                ?>
                                                <tr>
                                                    <td style="width: 25%;border-top: 2px groove black;">Служба доставки:</td>
                                                    <td style="width: 25%;border-top: 2px groove black"><center>Адресная</center></td>
                                                    <td style="width: 25%;border-top: 2px groove black;border-left: 2px groove black;">Имя:</td>
                                                    <td style="width: 25%;border-top: 2px groove black"><center><?php echo $name;?></center></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 25%;">Телефон:</td>
                                                    <td style="width: 25%;"><center><?php echo $phone;?></center></td>
                                                    <td style="width: 25%;border-left: 2px groove black;">Область:</td>
                                                    <td style="width: 25%;"><center><?php echo $region;?></center></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 25%;">Город:</td>
                                                    <td style="width: 25%;"><center><?php echo $city;?></center></td>
                                                    <td style="width: 25%;border-left: 2px groove black;">Адрес:</td>
                                                    <td style="width: 25%;"><center><?php echo $addres;?></center></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 25%;">Вес:</td>
                                                    <td style="width: 25%;"><center><?php echo $weight;?></center></td>
                                                    <td style="width: 25%;border-left: 2px groove black;">Вес:</td>
                                                    <td style="width: 25%;"><center><?php echo $weight;?></center></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 25%;">Наложеный платеж:</td>
                                                    <td style="width: 25%;"><center><?php echo $imposed;?> ₴</center></td>
                                                    <td style="width: 25%;border-left: 2px groove black;">Стоимость доставки:</td>
                                                    <td style="width: 25%;"><center><?php echo $postage_charge;?></center></td>
                                                </tr>
                                                <?php

                                            }
                                        if($delivery[0]=="PICKUP")
                                            {
                                                $contact = explode("/", $delivery[1]);
                                                $name=$contact[0];
                                                $phone=$contact[1];

                                                $order_delivery = explode("/", $delivery[2]);
                                                $weight=$order_delivery[1];

                                                ?>
                                                <tr>
                                                    <td style="width: 25%;border-top: 2px groove black;">Служба доставки:</td>
                                                    <td style="width: 25%;border-top: 2px groove black"><center>Самовывоз</center></td>
                                                    <td style="width: 25%;border-top: 2px groove black;border-left: 2px groove black;">Имя:</td>
                                                    <td style="width: 25%;border-top: 2px groove black"><center><?php echo $name;?></center></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 25%;">Телефон:</td>
                                                    <td style="width: 25%;"><center><?php echo $phone;?></center></td>
                                                    <td style="width: 25%;border-left: 2px groove black;">Вес:</td>
                                                    <td style="width: 25%;"><center><?php echo $weight;?></center></td>
                                                </tr>
                                                <?php

                                            }
                                    }
                                    if($result['status']=="10")
                                    {
                                        echo '<tr>';
                                        echo '<td style="width: 25%;border-top: 2px groove black;">Декларация:</td>';
                                        echo '<td style="width: 25%;border-top: 2px groove black;"><center>'.$result['decration'].'</center></td>';
                                        echo '<td style="width: 25%;border-top: 2px groove black;border-left: 2px groove black;">Стоимость доставки:</td>';
                                        echo '<td style="width: 25%;border-top: 2px groove black;"><center>'.$result['cost_delivery'].' ₴</center></td>';
                                        echo '</tr>';
                                    }
                            ?>
                        </tbody>
                    </table>                    
                </div>
				<!--Заказ (конец)-->
				<!--Содержимое заказа (начало)-->
				<div class="widget" style="margin-top: 10px;">
					<div class="head"><h5 class="iFrames">Содержимое заказа #<?php echo $number;?></h5></div>
						<table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
							<thead>
								<tr>
									<td width="70%">Наименование позиции</td>
									<td width="10%">Производство</td>
									<td width="10%">Колличество</td>
									<td width="10%">Цена за единицу</td>
								</tr>
							</thead>
							<tbody>
								<?php 
								for($i=0;$i<$order_count-1;$i++)
									{	
										$order_arr = explode("|", $order[$i]);

									    $query_place_name = "SELECT name_property FROM `place_manfacture` WHERE id='".$order_arr[3]."'";
									    $res_place_name = mysql_query($query_place_name) or die(mysql_error());
									    $result_place_name = mysql_fetch_array($res_place_name);
									    $place_name=$result_place_name['name_property'];

                                        if($result['status']!="8")
                                            {
                                                echo '<tr>';
                                                echo '<td><center>'.$order_arr[0].'</center></td>';
                                                echo '<td><center>'.$place_name.'</center></td>';
                                                echo '<td><center>'.$order_arr[1].'</center></td>';
                                                echo '<td><center>'.$order_arr[2].' ₴</center></td>';
                                                echo '</tr>';
                                                $price+=$order_arr[2]*$order_arr[1];
										    }
										else
										    {
										        $query_status = "SELECT * FROM `preorder_willingness` WHERE call_id='".$result['id']."'";
                                                $res_status = mysql_query($query_status) or die(mysql_error());
                                                $result_status = mysql_fetch_array($res_status);
                                                $one=$result_status['shop_one'];
                                                $two=$result_status['shop_two'];
                                                $three=$result_status['shop_three'];
                                                $four=$result_status['shop_four'];

                                                if($one=="1" && $order_arr[3]=="1")
                                                    {
                                                        echo '<tr>';
                                                        echo '<td><center>'.$order_arr[0].'</center></td>';
                                                        echo '<td><center>'.$place_name.'</center></td>';
                                                        echo '<td><center>'.$order_arr[1].'</center></td>';
                                                        echo '<td><center>'.$order_arr[2].' ₴</center></td>';
                                                        echo '</tr>';
                                                        $price+=$order_arr[2]*$order_arr[1];
                                                    }
                                                elseif($two=="1" && $order_arr[3]=="2")
                                                    {
                                                        echo '<tr>';
                                                        echo '<td><center>'.$order_arr[0].'</center></td>';
                                                        echo '<td><center>'.$place_name.'</center></td>';
                                                        echo '<td><center>'.$order_arr[1].'</center></td>';
                                                        echo '<td><center>'.$order_arr[2].' ₴</center></td>';
                                                        echo '</tr>';
                                                        $price+=$order_arr[2]*$order_arr[1];
                                                    }
                                                elseif($three=="1" && $order_arr[3]=="3")
                                                    {
                                                        echo '<tr>';
                                                        echo '<td><center>'.$order_arr[0].'</center></td>';
                                                        echo '<td><center>'.$place_name.'</center></td>';
                                                        echo '<td><center>'.$order_arr[1].'</center></td>';
                                                        echo '<td><center>'.$order_arr[2].' ₴</center></td>';
                                                        echo '</tr>';
                                                        $price+=$order_arr[2]*$order_arr[1];
                                                    }
                                                elseif($four=="1" && $order_arr[3]=="4")
                                                    {
                                                        echo '<tr>';
                                                        echo '<td><center>'.$order_arr[0].'</center></td>';
                                                        echo '<td><center>'.$place_name.'</center></td>';
                                                        echo '<td><center>'.$order_arr[1].'</center></td>';
                                                        echo '<td><center>'.$order_arr[2].' ₴</center></td>';
                                                        echo '</tr>';
                                                        $price+=$order_arr[2]*$order_arr[1];
                                                    }
                                                else
                                                    {
                                                        echo '<tr style="background-color: #418d4f;color: white;">';
                                                        echo '<td style="background-color: #418d4f;color: white;"><center>'.$order_arr[0].'</center></td>';
                                                        echo '<td style="background-color: #418d4f;color: white;"><center>'.$place_name.'</center></td>';
                                                        echo '<td style="background-color: #418d4f;color: white;"><center>'.$order_arr[1].'</center></td>';
                                                        echo '<td style="background-color: #418d4f;color: white;"><center>'.$order_arr[2].' ₴</center></td>';
                                                        echo '</tr>';
                                                        $price+=$order_arr[2]*$order_arr[1];
                                                    }

										    }
									}
								?>						
								<tr>
									<td colspan="4" align="center" class="webStatsLink">Общая стоимость заказа: <b id="price"><?php echo $price;?></b> ₴</td>
								</tr>							
							</tbody>
						</table>
						<?php
						if($_SESSION['id']==$result['manager'] || $_SESSION['access']=="1")
						    {
						        if($result['status']!="8" && $result['status']!="7" && $result['status']!="11" && $result['status']!="10" && $result['status']!="12" && $result['status']!="99" && $result['status']!="9" && $result['status']!="14" && $result['status']!="13")
                                    {
						?>
                                        <div style="margin-bottom:10px;">
                                            <center>
                                                <a id="add"><input type="submit" value="Добавить новую позицию" class="greenBtn" style="width:49%" /></a>
                                                <a id="edit"><input type="submit" value="Изменить заказ" class="seaBtn" style="width:49%"/></a>
                                            </center>
                                        </div>

                                        <form method="POST" id="update_product" action="javascript:void(null);" onsubmit="update_product()" class="mainForm">
                                            <fieldset>
                                                <div id="container">
                                                    <div class="dynamic-form">
                                                        <div class="inputs">
                                                        </div>
                                                    <div style="margin-left:15px;margin-bottom:10px;">
                                                        <input type="hidden" name="manager" value="<?php echo $_SESSION['id'];?>"/>
                                                        <input type="hidden" name="id" value="<?php echo $id;?>"/>
                                                        <input type="hidden" name="date_add" value="<?php echo $result['date_add'];?>"/>
                                                        <textarea rows="8" id="save" cols="" required class="auto" name="comment" placeholder="Текст нового комментария" style="display:none;width:946px;margin-top:10px;margin-bottom:10px;"></textarea>
                                                        <input type="submit" id="save_2" value="Сохранить" class="greenBtn" style="width:946px;display:none;">
                                                    </div>
                                                    <div id="result_update_product"></div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
						            <?php
                                    }
						            ?>
						<!--Изменение заказа (начало)-->
						<div id="result_edit_product_themplate"></div>							

                </div>
				<!--Содержимое заказа (конец)-->
			    <!--Новый комментарий (начало)-->
			    <div class="widget" style="margin-top: 10px;">
                    <div class="head"><h5 class="iCreate">Новый комментарий</h5></div>
                        <form method="POST" id="add_comment" action="javascript:void(null);" onsubmit="add_comment()" class="mainForm">
                            <fieldset>
                                <center>
                                    <input type="hidden" name="manager" value="<?php echo $_SESSION['id'];?>"/>
                                    <input type="hidden" name="call_id" value="<?php echo $id;?>"/>
                                    <input type="hidden" name="date_add" value="<?php echo $result['date_add'];?>"/>
                                    <textarea rows="8" cols="" required class="auto" name="comment" placeholder="Текст нового комментария" style="width:98%;margin-top:10px;margin-bottom:10px;"></textarea>
                                    <input type="submit" value="Добавить новый комментарий" style="width:98%;" class="greenBtn" />
                                </center>
                                <div id="result_add_comment"></div>
                            </fieldset>
                        </form>
                </div>
                <!--Новый комментарий (конец)-->

				<!--Комментарии (начало)-->
				

				
				<div class="widget" style="margin-top: 10px;">
					<div class="head closed"><h5 class="iCreate">Комментарии к заказу</h5></div>
						<div class="body" style="margin-top:-20px;">
						<?php
							$query_coment = "SELECT * FROM `coment_call` WHERE call_id='".$id."'";
							$res_coment = mysql_query($query_coment) or die(mysql_error());
							while ($result_coment = mysql_fetch_array($res_coment)) 
								{	
									$manager_coment=$result_coment['manager'];
									$query_manager_coment = "SELECT login FROM `users` WHERE id='".$manager_coment."'";
									$res_manager_coment = mysql_query($query_manager_coment) or die(mysql_error());
									$result_manager_coment = mysql_fetch_array($res_manager_coment);
									$manager_coment=$result_manager_coment['login'];
									echo '<h4 class="pt20"><a href="/info_user.php?id='.$result_coment['manager'].'" target="_blank">'.$manager_coment.'</a> от '.$result_coment['date_add'].'</h4><p>'.$result_coment['coment'].'</p>';
								}
						?>
						</div>
				</div>
				<!--Комментарии (конец)-->

                <!--Логи (начало)-->
                <div class="widget" style="margin-top: 10px;">
                    <div class="head  closed"><h5 class="iCreate">Действия по заказу</h5></div>
                        <div class="body" style="margin-top:0px;">
                        <?php
                            $query_coment = "SELECT * FROM `log` WHERE call_id='".$id."'";
                            $res_coment = mysql_query($query_coment) or die(mysql_error());
                            while ($result_coment = mysql_fetch_array($res_coment))
                                {
                                    $log = explode(":", $result_coment['text_log']);
                                    echo '<p><b>'.$log[0].':'.$log[1].':'.$log[2].'</b> : '.$log[3].'</p>';
                                }
                        ?>
                        </div>
                </div>
			<!--Логи (конец)-->
			<?php
            }
			?>
			</div>
		</div>
    </div>								
</div>
<script>
content=document.getElementById("price").innerHTML;
$('#address').attr('href', '/pre_order.php?id=<?php echo $id;?>&price='+content)
</script>
<?php 
include 'include/themplate/footer.php';
	}
else
	{
		echo '<script language="JavaScript"> window.location.href = "/index.php"</script>';
	}
?>