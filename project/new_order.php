<?php 
include 'include/themplate/header.php';
if($_SESSION['id']!="")
{
?>

<script type="text/javascript" language="javascript">
    function add_order() {
      var msg   = $('#add_order').serialize();
        $.ajax({
          type: 'POST',
          url: '/function/add_order.php',
          data: msg,
          success: function(data) {
            $('#result_add_order').html(data);
          },
          error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
 
    }
</script>



<script>
$(document).ready(function(){


	var i = 2;
	
	$('#add').click(function() {
		$('<div class="rowElem noborder position" id="field"><input type="text" placeholder="Наименования товара №' + i + '" style="width:555px;" name="name_product[]"/><input type="text" placeholder="Кол-во товара №' + i + '" style="width:110px;margin-left:3px;margin-right:3px;" name="col_product[]"/><input type="text" placeholder="Цена товара №' + i + '" style="width:110px;margin-left:0px;margin-right:3px;" name="price_product[]"/><select data-placeholder="Категория" class="select_' + i + '" name="category[]" required tabindex="2"><option value=""></option><?php $query = "SELECT * FROM `place_manfacture`"; $res = mysql_query($query) or die(mysql_error()); while ($result = mysql_fetch_array($res)) {echo '<option value="'.$result['id'].'">'.$result['name_property'].'</option> ';}?></select><br></div></div>').fadeIn('slow').appendTo('.inputs');
		$(".select_" +  i + "").select2();
        i++;
	});
	
	$('#remove').click(function() {
		$($("div#field").last()).remove();
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

<script type="application/javascript" language="JavaScript">

	function  check_number() {
        var phone = document.getElementById("phone").value;
        $.ajax({
            type: 'POST',
            url: '/function/check_number.php?phone='+phone,
            data: phone,
            success: function(data) {
                $('#result_check_phone').html(data);
            },
            error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
	}

	function  check_status() {
		var status = document.getElementById("status").value;
		if(status==2)
			{
				document.getElementById('check_status').style.display = '';
			}
		else
			{
				document.getElementById('check_status').style.display = 'none';
			}
	}
</script>

</head>
<body>
<?php 
include 'include/themplate/top_band.php'; 
include 'include/themplate/top_menu.php'; 
?>
<!-- Content wrapper -->
<div class="wrapper">
	


    
    <!-- Content -->
    <div class="content" style="width: 100%;">
    	<div class="title"><h5>Новый звонок</h5></div>
        <form method="POST" id="add_order" action="javascript:void(null);" onsubmit="add_order()" class="mainForm">
            <fieldset>
                <div class="widget first">
                    <div class="head"><h5 class="iList">Информация о клиенте</h5>
							<input type="hidden" name="manager" value="<?php echo $_SESSION['id'];?>"/>
							<input type="submit" value="Добавить звонок" class="greenBtn" style="margin-left: 650px;margin-top:5px" />
						</div>
                        <div class="rowElem noborder">
							<label>ФИО клиента:</label>
								<div class="formRight">
									<input type="text" required name="name"/>
								</div>
						</div>
                        <div class="rowElem">
							<label>Телефон:</label>
								<div class="formRight">
									<input required type="text" name="phone" id="phone" onchange="check_number()" class="maskPhone"/>
                                    <span id="result_check_phone" class="formNote">Введите номер для определения сходимости</span>
								</div>
						</div>		
                        <div class="rowElem">
							<label>Город:</label>
								<div class="formRight">
									<input required type="text" name="city"/>
								</div>
						</div>
						<div class="rowElem">
							<label>Расход на заказ:</label>
							<div class="formRight">
								<input required type="text" name="consumption"/>
							</div>
						</div>
					<!--<div class="rowElem">
                        <label>Доставка:</label>
                        <div class="formRight">
                            <input type="radio" id="radio1" name="post" value="np" /><label for="radio1">Нова Пошта</label>
                            <input type="radio" id="radio2" name="post" value="intime" /><label for="radio2">InTime</label>
                            <input type="radio" id="radio3" name="post" value="pickup" /><label for="radio3">Самовывоз</label>
                            <input type="radio" id="radio4" name="post" value="service" /><label for="radio4">Наша доставка</label>
                            <input type="radio" id="radio5" name="post" value="ride" /><label for="radio5">Попутка</label>
                            <input type="text" name="other" style="width: 188px;" placeholder="Другой вариант доставки"/>
                        </div>
                    </div>-->
                </div>

				<blockquote>
					Цех #1 - Рабица - Кисилев Виталий Викторович [+380960238337]<br>
					Цех #2 - Армасетка - Романеко Григорий Григорьевич [+380983161562]<br>
					Цех #3 - Кирпич<br>
					Цех #4 - Разборка - Шаповалов Евгений Валерьевич [+380968009287]
				</blockquote>

                <div class="widget">
                    <div class="head"><h5 class="iList">Содержание заказа</h5></div>
						<div id="container">
							<div class="dynamic-form">
								<div class="inputs">
									<div class="rowElem noborder position" id="field">
										<input type="text" placeholder="Наименования товара №1"  required style="width:555px;" name="name_product[]"/>
										<input type="text" required pattern="\d+(\.\d{1})?" placeholder="Кол-во товара №1" style="width:110px;" name="col_product[]"/>
										<input type="text" required pattern="\d+(\.\d{1})?" placeholder="Цена товара №1" style="width:109px;" name="price_product[]"/>
										<select data-placeholder="Категория" class="select" name="category[]"  tabindex="2">
											<option value=""></option>
                                            <?php
												$query_place = "SELECT * FROM `place_manfacture`";
												$res_place = mysql_query($query_place) or die(mysql_error());
												while ($result_place = mysql_fetch_array($res_place)) {
													echo '<option value="'.$result_place['id'].'">'.$result_place['name_property'].'</option> ';
												}
											?>
										</select><br>
									</div>
							</div>
							<div style="margin-left:15px;margin-bottom:10px;">
								<a   id="add"><input type="button" onclick="" value="Добавить новую позицию" class="greenBtn" style="width:468px;"></a>
								<a   id="remove"><input type="button" onclick="" value="Удалить позицию" class="redBtn" style="width:468px;margin-left: 10px;"></a>
							</div>
						</div>		
							
                </div>
			</div>
	
	
                <div class="widget">
                    <div class="head"><h5 class="iList">Общая информация</h5></div>
						<div class="rowElem noborder">
							<label>Статус заказа:</label>
							<div class="formRight">
								<select style="width:756px;" onchange="check_status()" data-placeholder="Выберите статус..." class="select" id="status" name="status" tabindex="2">
									<option value="0">Ожидание</option> 
									<?php 
										$query = "SELECT * FROM `setting_status` WHERE stage='1'";
										$res = mysql_query($query) or die(mysql_error());
										while ($result = mysql_fetch_array($res)) {
											echo '<option value="'.$result['id'].'">'.$result['name'].'</option> ';
										}
									?>
									</select>
								</div>
						</div>
						<div id="check_status" style="display: none;">
							<div class="rowElem">
								<label>Дата:</label>
								<div class="formRight">
									<input type="text" name="date" class="datepicker" />
								</div>
							</div>'
						</div>
                        <div class="rowElem">
							<label>Коментарий к заказу:</label>
								<div class="formRight">
									<textarea rows="8" cols="" class="auto" name="comment"></textarea>
								</div>
						</div>
                        					
						<!--div class="submitForm">
							<input type="hidden" name="manager" value="<?php echo $_SESSION['id'];?>"/>
							<input type="submit" value="Добавить звонок" class="greenBtn" />
						</div-->
						
						<div id="result_add_order"></div>					 	
                </div>					
			</fieldset>
		</form>
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
