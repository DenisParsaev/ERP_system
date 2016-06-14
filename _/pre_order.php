<?php
include 'include/themplate/header.php';
$id=$_GET['id'];
$price=$_GET['price'];
$number=str_pad($id, 6, '0', STR_PAD_LEFT);
if($_SESSION['id']!="")
    {
        $query = "SELECT * FROM `scroll_call` WHERE id='".$id."'";
        $res = mysql_query($query) or die(mysql_error());
        $result = mysql_fetch_array($res);

        $phone=$result['phone_client'];  //Телефон клиента
        $city=$result['city_client']; //Город клиента
        $name=$result['name_client']; //Имя клиента
        $date_add=$result['date_add']; //Имя клиента
?>

<script  type="text/javascript" language="javascript">

    function add_preorder() {
      var msg   = $('#add_preorder').serialize();
        $.ajax({
          type: 'POST',
          url: '/function/add_preorder.php?price=<?php echo $price; ?>&id=<?php echo $id; ?>&manager=<?php echo $_SESSION['id']; ?>',
          data: msg,
          success: function(data) {
            $('#result_add_preorder').html(data);
          },
          error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
    }

	function full_pay(){
		document.getElementById('full_pay').style.display = '';
		document.getElementById('without_pay').style.display = 'none';
		document.getElementById('prepay').style.display = 'none';
	}

	function without_pay(){
		document.getElementById('without_pay').style.display = '';
		document.getElementById('full_pay').style.display = 'none';
		document.getElementById('prepay').style.display = 'none';
	}

	function prepay(){
		document.getElementById('prepay').style.display = '';
		document.getElementById('full_pay').style.display = 'none';
		document.getElementById('without_pay').style.display = 'none';
	}


/*Почта*/

/*Новая Почта*/

	function nova_post(){
		document.getElementById('nova_post').style.display = '';
		document.getElementById('intime_post').style.display = 'none';
		document.getElementById('addres_post').style.display = 'none';
		document.getElementById('hitched_post').style.display = 'none';
		document.getElementById('pickup_post').style.display = 'none';
	}

	function nova_type_otdel(){
		document.getElementById('nova_type_otdel').style.display = '';
		document.getElementById('nova_type_addres').style.display = 'none';
	}

	function nova_type_addres(){
		document.getElementById('nova_type_addres').style.display = '';
		document.getElementById('nova_type_otdel').style.display = 'none';
	}

	function cash_np_otdel(){
		document.getElementById('cash_np_otdel').style.display = '';
		document.getElementById('cash_np_addres').style.display = 'none';
	}

	function cash_np_addres(){
		document.getElementById('cash_np_addres').style.display = '';
		document.getElementById('cash_np_otdel').style.display = 'none';
	}
/*Новая почта (конец)*/
/*Интайм*/
	function intime_post(){
		document.getElementById('intime_post').style.display = '';
		document.getElementById('nova_post').style.display = 'none';
		document.getElementById('addres_post').style.display = 'none';
		document.getElementById('hitched_post').style.display = 'none';
		document.getElementById('pickup_post').style.display = 'none';
	}

	function intime_type_otdel(){
		document.getElementById('intime_type_otdel').style.display = '';
		document.getElementById('intime_type_addres').style.display = 'none';
	}

	function intime_type_addres(){
		document.getElementById('intime_type_addres').style.display = '';
		document.getElementById('intime_type_otdel').style.display = 'none';
	}

	function cash_intime_otdel(){
		document.getElementById('cash_intime_otdel').style.display = '';
		document.getElementById('cash_intime_addres').style.display = 'none';
	}

	function cash_intime_addres(){
		document.getElementById('cash_intime_addres').style.display = '';
		document.getElementById('cash_intime_otdel').style.display = 'none';
	}
/*Интайм (конец)*/
/*Адресная (начало)*/
	function addres_post(){
		document.getElementById('addres_post').style.display = '';
		document.getElementById('nova_post').style.display = 'none';
		document.getElementById('intime_post').style.display = 'none';
		document.getElementById('hitched_post').style.display = 'none';
		document.getElementById('pickup_post').style.display = 'none';
	}

	function addres_post_cash(){
		document.getElementById('addres_post_cash').style.display = '';
	}
/*Адресная (конец)*/
/*Попутка (начало)*/
	function hitched_post(){
		document.getElementById('hitched_post').style.display = '';
		document.getElementById('nova_post').style.display = 'none';
		document.getElementById('intime_post').style.display = 'none';
		document.getElementById('addres_post').style.display = 'none';
		document.getElementById('pickup_post').style.display = 'none';
	}
/*Попутка (конец)*/
/*Самовывоз (начало)*/
	function pickup_post(){
		document.getElementById('pickup_post').style.display = '';
		document.getElementById('nova_post').style.display = 'none';
		document.getElementById('intime_post').style.display = 'none';
		document.getElementById('addres_post').style.display = 'none';
		document.getElementById('hitched_post').style.display = 'none';
	}
/*Самовывоз (конец)*/
/*Два столба (начало)*/
	function two_pillars_post(){
	    document.getElementById('two_pillars_post').style.display = '';
		document.getElementById('pickup_post').style.display = 'none';
		document.getElementById('nova_post').style.display = 'none';
		document.getElementById('intime_post').style.display = 'none';
		document.getElementById('addres_post').style.display = 'none';
		document.getElementById('hitched_post').style.display = 'none';
	}
/*Два столба (конец)*/



	function pickup_post_cash(){
		document.getElementById('pickup_post_cash').style.display = '';
	}
	function pickup_post_no_cash(){
		document.getElementById('pickup_post_cash').style.display = 'none';
	}
	function hitched_post_cash(){
		document.getElementById('hitched_post_cash').style.display = '';
	}
	function hitched_post_no_cash(){
		document.getElementById('hitched_post_cash').style.display = 'none';
	}
/*Самовывоз (конец)*/
/*Почта (конец)*/

	function hide_full()
	    {
            var sel = document.getElementById("mySelect_full"); // Получаем наш список
            var val = sel.options[sel.selectedIndex].value; // Получаем значение выделенного элемента (в нашем случае fruit2).

            document.getElementById('check_account_full').style.display = 'none';
            document.getElementById('vat_full').style.display = 'none';
            document.getElementById('cash_full').style.display = 'none';
            document.getElementById('card_full').style.display = 'none';

            if(val=='card_full')
                {
                    document.getElementById('check_account_full').style.display = 'none';
                    document.getElementById('vat_full').style.display = 'none';
                    document.getElementById('cash_full').style.display = 'none';
                    document.getElementById('card_full').style.display = '';
                }
            if(val=='check_account_full')
                {
                    document.getElementById('card_full').style.display = 'none';
                    document.getElementById('vat_full').style.display = 'none';
                    document.getElementById('cash_full').style.display = 'none';
                    document.getElementById('check_account_full').style.display = '';
                }
            if(val=='vat_full')
                {
                    document.getElementById('check_account_full').style.display = 'none';
                    document.getElementById('card_full').style.display = 'none';
                    document.getElementById('cash_full').style.display = 'none';
                    document.getElementById('vat_full').style.display = '';
                }
            if(val=='cash_full')
                {
                    document.getElementById('check_account_full').style.display = 'none';
                    document.getElementById('card_full').style.display = 'none';
                    document.getElementById('vat_full').style.display = 'none';
                    document.getElementById('cash_full').style.display = '';
                }
	    }

	function hide_prepay()
	    {
            var sel = document.getElementById("mySelect_prepay"); // Получаем наш список
            var val = sel.options[sel.selectedIndex].value; // Получаем значение выделенного элемента (в нашем случае fruit2).

            document.getElementById('check_account_prepay').style.display = 'none';
            document.getElementById('vat_prepay').style.display = 'none';
            document.getElementById('cash_prepay').style.display = 'none';
            document.getElementById('card_prepay').style.display = 'none';

            if(val=='card_prepay')
                {
                    document.getElementById('check_account_prepay').style.display = 'none';
                    document.getElementById('vat_prepay').style.display = 'none';
                    document.getElementById('cash_prepay').style.display = 'none';
                    document.getElementById('card_prepay').style.display = '';
                }
            if(val=='check_account_prepay')
                {
                    document.getElementById('card_prepay').style.display = 'none';
                    document.getElementById('vat_prepay').style.display = 'none';
                    document.getElementById('cash_prepay').style.display = 'none';
                    document.getElementById('check_account_prepay').style.display = '';
                }
            if(val=='vat_prepay')
                {
                    document.getElementById('check_account_prepay').style.display = 'none';
                    document.getElementById('card_prepay').style.display = 'none';
                    document.getElementById('cash_prepay').style.display = 'none';
                    document.getElementById('vat_prepay').style.display = '';
                }
            if(val=='cash_prepay')
                {
                    document.getElementById('check_account_prepay').style.display = 'none';
                    document.getElementById('card_prepay').style.display = 'none';
                    document.getElementById('vat_prepay').style.display = 'none';
                    document.getElementById('cash_prepay').style.display = '';
                }
	    }
		function without_contract(){
		document.getElementById('without_contract').style.display = '';
		document.getElementById('with_contract').style.display = 'none';
	   
	}
	function with_contract(){
		document.getElementById('with_contract').style.display = '';
		document.getElementById('without_contract').style.display = 'none';
		
		
		}
</script>
<style>
    .formRight {
        float: right;
        width: 756px;
        margin: 12px 0;
        display: block;
        position: relative;
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
        <div class="title"><h5>Оформление предзаказа #<?php echo $number;?></h5></div>
        <form method="POST" id="add_preorder" action="javascript:void(null);" onsubmit="add_preorder()" class="mainForm">
            <fieldset>
                <div class="widget first">
                    <div class="head"><h5 class="iList">Информация об оплате заказа #<?php echo $number;?></h5></div>
                    <div class="rowElem noborder">
                        <label>Тип пред-оплаты :</label>
                        <div class="formRight">
                            <input type="radio" id="radio1" name="pay" onclick="full_pay()" value="full_pay" /><label for="radio1">Полная</label>
                            <input type="radio" id="radio3" name="pay" onclick="prepay()" value="prepay" checked="checked" /><label for="radio3">Частичная</label>
                            <input type="radio" id="radio2" name="pay" onclick="without_pay()" value="without_pay" /><label for="radio2">Нет</label>
                        </div>
                    </div>

                    <div id="full_pay" style="display: none;">
                        <div class="rowElem">
                            <label>Направление:</label>
							<div class="formRight">
								<select onchange="hide_full();" style="width:756px;" data-placeholder="Выберите форму оплаты..." class="select" name="mySelect_full" id="mySelect_full" tabindex="2">
									<option value=""></option>
									<option name="check_account_full" value="check_account_full">Расчетный счет</option>
									<option name="vat_full" value="vat_full">НДС</option>
									<option name="card_full" value="card_full">Карта "ПриватБанк"</option>
									<option name="cash_full" value="cash_full">Наличный расчет</option>
								</select>
							</div>
                        </div>
                        <!--Оплата картой-->
                        <div id="card_full" style="display: none;">
                            <div class="rowElem">
                                <label>Выберите карту:</label>
                                <div class="formRight">
                                    <select style="width:756px;" data-placeholder="Выберите карту..." class="select" name="card_full" id="card_full" tabindex="2">
                                        <option value="CARD-6232">Карта "Универсальная" [5168 7423 1360 6232]</option>
                                        <option value="CARD-9906">Карта "Универсальная" [5168 7420 2410 9906]</option>
                                    </select>
                                </div>
                            </div>
                            <div class="rowElem">
                                <label>Cумма к оплате:</label>
                                <div class="formRight">
                                    <input type="text" name="price" disabled value="<?php echo $price; ?>"/>
                                </div>
                            </div>
                        </div>
                        <!--Расчетный счет-->
                        <div id="check_account_full" style="display: none;">
                            <div class="rowElem">
                                <label>Cумма к оплате:</label>
                                <div class="formRight">
                                    <input type="text" name="price" disabled value="<?php echo $price; ?>"/>
                                </div>
                            </div>
                        </div>
                        <!--НДС-->
                        <div id="vat_full" style="display: none;">
                            <div class="rowElem">
                                <label>Cумма к оплате:</label>
                                <div class="formRight">
                                    <input type="text" name="price" disabled value="<?php echo $price; ?>"/>
                                </div>
                            </div>
                        </div>
                        <!--Наличный расчет-->
                        <div id="cash_full" style="display: none;">
                            <div class="rowElem">
                                <label>Cумма к оплате:</label>
                                <div class="formRight">
                                    <input type="text" name="price" disabled value="<?php echo $price; ?>"/>
                                </div>
                            </div>
                            <div class="rowElem">
                                <label>Получатель:</label>
                                <div class="formRight">
                                    <input type="text" name="name_to_cash_full"  value=""/>
                                </div>
                            </div>
                            <div class="rowElem">
                                <label>Плательщик:</label>
                                <div class="formRight">
                                    <input type="text" name="name_from_cash_full"  value="<?php echo $name; ?>"/>
                                </div>
                            </div>
                             <div class="rowElem">
                                <label>Телефон:</label>
                                <div class="formRight">
                                    <input type="text" name="name_to_cash_full_phone"  value="<?php echo $phone; ?>"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="without_pay" style="display: none;">

                    </div>

                    <div id="prepay">
                        <div class="rowElem">
                            <label>Направление:</label>
							<div class="formRight">
								<select onchange="hide_prepay()" style="width:756px;" data-placeholder="Выберите форму оплаты..." class="select" name="mySelect_prepay" id="mySelect_prepay"" tabindex="2">
									<option value=""></option>
									<option value="check_account_prepay">Расчетный счет</option>
									<option value="vat_prepay">НДС</option>
									<option value="card_prepay">Карта "ПриватБанк"</option>
									<option value="cash_prepay">Наличный расчет</option>
								</select>
							</div>
                        </div>
                        <!--Оплата картой-->
                        <div id="card_prepay" style="display: none;">
                            <div class="rowElem">
                                <label>Выберите карту:</label>
                                <div class="formRight">
                                    <select style="width:756px;" data-placeholder="Выберите карту..." class="select" name="card_prepay" id="card_prepay" tabindex="2">
                                        <option value="CARD-6232">Карта "Универсальная" [5168 7423 1360 6232]</option>
                                        <option value="CARD-9906">Карта "Универсальная" [5168 7420 2410 9906]</option>
                                    </select>
                                </div>
                            </div>
                            <div class="rowElem">
                                <label>Cумма к оплате:</label>
                                <div class="formRight">
                                    <input type="text" name="price" disabled value="<?php echo $price; ?>"/>
                                </div>
                            </div>
                            <div class="rowElem">
                                <label>Cумма предоплаты:</label>
                                <div class="formRight">
                                    <input type="text" name="sum_prepay_card"  value=""/>
                                </div>
                            </div>
                        </div>
                        <!--Расчетный счет-->
                        <div id="check_account_prepay" style="display: none;">
                            <div class="rowElem">
                                <label>Cумма к оплате:</label>
                                <div class="formRight">
                                    <input type="text" name="price" disabled value="<?php echo $price; ?>"/>
                                </div>
                            </div>
                            <div class="rowElem">
                                <label>Cумма предоплаты:</label>
                                <div class="formRight">
                                    <input type="text" name="sum_prepay_check"  value=""/>
                                </div>
                            </div>
                        </div>
                        <!--НДС-->
                        <div id="vat_prepay" style="display: none;">
                            <div class="rowElem">
                                <label>Cумма к оплате:</label>
                                <div class="formRight">
                                    <input type="text" name="price" disabled value="<?php echo $price; ?>"/>
                                </div>
                            </div>
                            <div class="rowElem">
                                <label>Cумма предоплаты:</label>
                                <div class="formRight">
                                    <input type="text" name="sum_prepay_vat"  value=""/>
                                </div>
                            </div>
                        </div>
                        <!--Наличный расчет-->
                        <div id="cash_prepay" style="display: none;">
                            <div class="rowElem">
                                <label>Cумма к оплате:</label>
                                <div class="formRight">
                                    <input type="text" name="price" disabled value="<?php echo $price; ?>"/>
                                </div>
                            </div>
                            <div class="rowElem">
                                <label>Cумма предоплаты:</label>
                                <div class="formRight">
                                    <input type="text" name="sum_prepay_cash"  value=""/>
                                </div>
                            </div>
                            <div class="rowElem">
                                <label>Получатель:</label>
                                <div class="formRight">
                                    <input type="text" name="name_to_cash_prepay"  value=""/>
                                </div>
                            </div>
                            <div class="rowElem">
                                <label>Плательщик:</label>
                                <div class="formRight">
                                    <input type="text" name="name_from_cash_prepay"  value="<?php echo $name; ?>"/>
                                </div>
                            </div>
                             <div class="rowElem">
                                <label>Телефон:</label>
                                <div class="formRight">
                                    <input type="text" name="name_to_phone_cash_prepay"  value="<?php echo $phone; ?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>

<!--Доставка-->

                <div class="widget">
                    <div class="head"><h5 class="iList">Информация о доставке заказа #<?php echo $number;?></h5></div>
                    <div class="rowElem noborder">
                        <label>Служба доставки :</label>
                        <div class="formRight">
                            <input type="radio" id="radio4" name="delivery" onclick="nova_post()" value="nova_post" /><label for="radio4">Новая Почта</label>
                            <input type="radio" id="radio5" name="delivery" onclick="intime_post()" value="intime" /><label for="radio5">InTime</label>
                            <input type="radio" id="radio6" name="delivery" onclick="addres_post()" value="addres"  /><label for="radio6">Адресная</label>
                            <input type="radio" id="radio7" name="delivery" onclick="hitched_post()" value="hitched"  /><label for="radio7">Попутка</label>
                            <input type="radio" id="radio8" name="delivery" onclick="pickup_post()" value="pickup"  /><label for="radio8">Самовывоз</label>
                            <input type="radio" id="radio9" name="delivery" onclick="two_pillars_post()" value="two_pillars"  /><label for="radio9">Два столба</label>
                        </div>
                    </div>
<!--Новая почта (начало)-->
                    <div id="nova_post" style="display: none;">
                        <div class="rowElem">
                            <label>Тип доставки :</label>
                            <div class="formRight">
                                    <input type="radio" id="radio9" name="nova_type" onclick="nova_type_otdel()" value="nova_type_otdel" /><label for="radio9">Отделение</label>
                                    <input type="radio" id="radio10" name="nova_type" onclick="nova_type_addres()" value="nova_type_addres" /><label for="radio10">Адресная</label>
                            </div>
                        </div>
<!--Новая почта [Отделение] (начало)-->
                        <div id="nova_type_otdel" style="display: none;">
                             <div class="rowElem">
                                <label>ФИО:</label>
                                <div class="formRight">
                                    <input type="text" name="name_np_otdel"  value="<?php echo $name; ?>"/>
                                </div>
                             </div>
                             <div class="rowElem">
                                 <label>Телефон:</label>
                                 <div class="formRight">
                                     <input type="text" name="phone_np_otdel"  value="<?php echo $phone; ?>"/>
                                 </div>
                             </div>
                             <div class="rowElem">
                                 <label>Область:</label>
                                 <div class="formRight">
                                     <input type="text" name="region_np_otdel"  value=""/>
                                 </div>
                             </div>
                             <div class="rowElem">
                                 <label>Город:</label>
                                 <div class="formRight">
                                     <input type="text" name="city_np_otdel"  value="<?php echo $city; ?>"/>
                                 </div>
                             </div>
                             <div class="rowElem">
                                 <label>Отделение:</label>
                                 <div class="formRight">
                                       <input type="text" name="office_np_otdel"  value=""/>
                                 </div>
                             </div>
                             <div class="rowElem">
                                  <label>Номер заказа:</label>
                                  <div class="formRight">
                                       <input type="text" name="order_id_np_otdel"  value="<?php echo $number; ?>"/>
                                  </div>
                             </div>
                             <div class="rowElem">
                                   <label>Вес:</label>
                                   <div class="formRight">
                                        <input type="text" name="weight_np_otdel"  value=""/>
                                   </div>
                             </div>
                             <div class="rowElem">
                                <label>Плательщик доставки :</label>
                                <div class="formRight">
                                    <input type="radio" id="radio11" name="postage_charge_np_otdel" value="sender" /><label for="radio11">Отправитель</label>
                                    <input type="radio" id="radio12" name="postage_charge_np_otdel" value="recipient" /><label for="radio12">Получатель</label>
                                </div>
                             </div>
                             <div class="rowElem">
                                <label>Статус оплаты :</label>
                                <div class="formRight">
                                    <input type="radio" id="radio13" name="payment_state_np_otdel" value="paid" /><label for="radio13">Оплачено</label>
                                    <input type="radio" id="radio14" name="payment_state_np_otdel" onclick="cash_np_otdel()" value="cash_np_otdel" /><label for="radio14">Наложеный платеж</label>
                                </div>
                             </div>
                             <div id="cash_np_otdel" style="display: none;">
                                 <div class="rowElem">
                                       <label>Сумма платежа:</label>
                                       <div class="formRight">
                                            <input type="text" name="np_cash_otdel" value=""/>
                                       </div>
                                 </div>
                             </div>
                        </div>
<!--Новая почта [Конец] (начало)-->

<!--Новая почта [Адресная] (начало)-->
                        <div id="nova_type_addres" style="display: none;">
                             <div class="rowElem">
                                <label>ФИО:</label>
                                <div class="formRight">
                                    <input type="text" name="name_np_addres"  value="<?php echo $name; ?>"/>
                                </div>
                             </div>
                             <div class="rowElem">
                                 <label>Телефон:</label>
                                 <div class="formRight">
                                     <input type="text" name="phone_np_addres"  value="<?php echo $phone; ?>"/>
                                 </div>
                             </div>
                             <div class="rowElem">
                                 <label>Область:</label>
                                 <div class="formRight">
                                     <input type="text" name="region_np_addres"  value=""/>
                                 </div>
                             </div>
                             <div class="rowElem">
                                 <label>Город:</label>
                                 <div class="formRight">
                                     <input type="text" name="city_np_addres"  value="<?php echo $city; ?>"/>
                                 </div>
                             </div>
                             <div class="rowElem">
                                 <label>Адрес:</label>
                                 <div class="formRight">
                                       <input type="text" name="addres_np_addres"  value=""/>
                                 </div>
                             </div>
                             <div class="rowElem">
                                  <label>Номер заказа:</label>
                                  <div class="formRight">
                                       <input type="text" name="order_id_np_addres"  value="<?php echo $number; ?>"/>
                                  </div>
                             </div>
                             <div class="rowElem">
                                   <label>Вес:</label>
                                   <div class="formRight">
                                        <input type="text" name="weight_np_addres"  value=""/>
                                   </div>
                             </div>
                             <div class="rowElem">
                                <label>Плательщик доставки :</label>
                                <div class="formRight">
                                    <input type="radio" id="radio15" name="postage_charge_np_addres" value="sender" /><label for="radio15">Отправитель</label>
                                    <input type="radio" id="radio16" name="postage_charge_np_addres" value="recipient" /><label for="radio16">Получатель</label>
                                </div>
                             </div>
                             <div class="rowElem">
                                <label>Статус оплаты :</label>
                                <div class="formRight">
                                    <input type="radio" id="radio17" name="delivery_pay_status_np_addres" value="paid" /><label for="radio17">Оплачено</label>
                                    <input type="radio" id="radio18" name="delivery_pay_status_np_addres" onclick="cash_np_addres()" value="cash_np_addres" /><label for="radio18">Наложеный платеж</label>
                                </div>
                             </div>
                             <div id="cash_np_addres" style="display: none;">
                                 <div class="rowElem">
                                       <label>Сумма платежа:</label>
                                       <div class="formRight">
                                            <input type="text" name="np_cash_addres" value=""/>
                                       </div>
                                 </div>
                             </div>
                        </div>
                    </div>
<!--Новая почта [Адресная] (конец)-->
<!--Новая почта (конец)-->

<!--InTime (начало)-->
                    <div id="intime_post" style="display: none;">
                        <div class="rowElem">
                            <label>Тип доставки :</label>
                            <div class="formRight">
                                    <input type="radio" id="radio19" name="intime_type" onclick="intime_type_otdel()" value="intime_type_otdel" /><label for="radio19">Отделение</label>
                                    <input type="radio" id="radio20" name="intime_type" onclick="intime_type_addres()" value="intime_type_addres" /><label for="radio20">Адресная</label>
                            </div>
                        </div>
<!--InTime [Отделение] (начало)-->
                        <div id="intime_type_otdel" style="display: none;">
                             <div class="rowElem">
                                <label>ФИО:</label>
                                <div class="formRight">
                                    <input type="text" name="name_intime_otdel"  value="<?php echo $name; ?>"/>
                                </div>
                             </div>
                             <div class="rowElem">
                                 <label>Телефон:</label>
                                 <div class="formRight">
                                     <input type="text" name="phone_intime_otdel"  value="<?php echo $phone; ?>"/>
                                 </div>
                             </div>
                             <div class="rowElem">
                                 <label>Область:</label>
                                 <div class="formRight">
                                     <input type="text" name="region_intime_otdel"  value=""/>
                                 </div>
                             </div>
                             <div class="rowElem">
                                 <label>Город:</label>
                                 <div class="formRight">
                                     <input type="text" name="city_intime_otdel"  value="<?php echo $city; ?>"/>
                                 </div>
                             </div>
                             <div class="rowElem">
                                 <label>Отделение:</label>
                                 <div class="formRight">
                                       <input type="text" name="office_intime_otdel"  value=""/>
                                 </div>
                             </div>
                             <div class="rowElem">
                                  <label>Номер заказа:</label>
                                  <div class="formRight">
                                       <input type="text" name="order_id_intime_otdel"  value="<?php echo $number; ?>"/>
                                  </div>
                             </div>
                             <div class="rowElem">
                                   <label>Вес:</label>
                                   <div class="formRight">
                                        <input type="text" name="weight_intime_otdel"  value=""/>
                                   </div>
                             </div>
                             <div class="rowElem">
                                <label>Плательщик доставки :</label>
                                <div class="formRight">
                                    <input type="radio" id="radio21" name="postage_charge_intime_otdel" value="sender" /><label for="radio21">Отправитель</label>
                                    <input type="radio" id="radio22" name="postage_charge_intime_otdel" value="recipient" /><label for="radio22">Получатель</label>
                                </div>
                             </div>
                             <div class="rowElem">
                                <label>Статус оплаты :</label>
                                <div class="formRight">
                                    <input type="radio" id="radio23" name="delivery_pay_status_intime_otdel" value="paid" /><label for="radio23">Оплачено</label>
                                    <input type="radio" id="radio24" name="delivery_pay_status_intime_otdel" onclick="cash_intime_otdel()" value="cash_intime_otdel" /><label for="radio24">Наложеный платеж</label>
                                </div>
                             </div>
                             <div id="cash_intime_otdel" style="display: none;">
                                 <div class="rowElem">
                                       <label>Сумма платежа:</label>
                                       <div class="formRight">
                                            <input type="text" name="intime_cash_otdel" value=""/>
                                       </div>
                                 </div>
                             </div>
                        </div>
<!--InTime [Отделение] (конец)-->
<!--InTime [Адресная] (начало)-->
                        <div id="intime_type_addres" style="display: none;">
                             <div class="rowElem">
                                <label>ФИО:</label>
                                <div class="formRight">
                                    <input type="text" name="name_intime_addres"  value="<?php echo $name; ?>"/>
                                </div>
                             </div>
                             <div class="rowElem">
                                 <label>Телефон:</label>
                                 <div class="formRight">
                                     <input type="text" name="phone_intime_addres"  value="<?php echo $phone; ?>"/>
                                 </div>
                             </div>
                             <div class="rowElem">
                                 <label>Область:</label>
                                 <div class="formRight">
                                     <input type="text" name="region_intime_addres"  value=""/>
                                 </div>
                             </div>
                             <div class="rowElem">
                                 <label>Город:</label>
                                 <div class="formRight">
                                     <input type="text" name="city_intime_addres"  value="<?php echo $city; ?>"/>
                                 </div>
                             </div>
                             <div class="rowElem">
                                 <label>Адрес:</label>
                                 <div class="formRight">
                                       <input type="text" name="addres_intime_addres"  value=""/>
                                 </div>
                             </div>
                             <div class="rowElem">
                                  <label>Номер заказа:</label>
                                  <div class="formRight">
                                       <input type="text" name="order_id_intime_addres"  value="<?php echo $number; ?>"/>
                                  </div>
                             </div>
                             <div class="rowElem">
                                   <label>Вес:</label>
                                   <div class="formRight">
                                        <input type="text" name="weight_intime_addres"  value=""/>
                                   </div>
                             </div>
                             <div class="rowElem">
                                <label>Плательщик доставки :</label>
                                <div class="formRight">
                                    <input type="radio" id="radio25" name="postage_charge_intime_addres" value="sender" /><label for="radio25">Отправитель</label>
                                    <input type="radio" id="radio26" name="postage_charge_intime_addres" value="recipient" /><label for="radio26">Получатель</label>
                                </div>
                             </div>
                             <div class="rowElem">
                                <label>Статус оплаты :</label>
                                <div class="formRight">
                                    <input type="radio" id="radio27" name="delivery_pay_status_intime_addres" value="paid" /><label for="radio27">Оплачено</label>
                                    <input type="radio" id="radio28" name="delivery_pay_status_intime_addres" onclick="cash_intime_addres()" value="cash_intime_addres" /><label for="radio28">Наложеный платеж</label>
                                </div>
                             </div>
                             <div id="cash_intime_addres" style="display: none;">
                                 <div class="rowElem">
                                       <label>Сумма платежа:</label>
                                       <div class="formRight">
                                            <input type="text" name="intime_cash_addres" value=""/>
                                       </div>
                                 </div>
                             </div>
                        </div>
<!--InTime [Адресная] (конец)-->
                    </div>
<!--InTime (конец)-->
<!--Адресная (начало)-->
                    <div id="addres_post" style="display: none;">
                             <div class="rowElem">
                                <label>ФИО:</label>
                                <div class="formRight">
                                    <input type="text" name="name_addres"  value="<?php echo $name; ?>"/>
                                </div>
                             </div>
                             <div class="rowElem">
                                 <label>Телефон:</label>
                                 <div class="formRight">
                                     <input type="text" name="phone_addres"  value="<?php echo $phone; ?>"/>
                                 </div>
                             </div>
                             <div class="rowElem">
                                 <label>Область:</label>
                                 <div class="formRight">
                                     <input type="text" name="region_addres"  value=""/>
                                 </div>
                             </div>
                             <div class="rowElem">
                                 <label>Город:</label>
                                 <div class="formRight">
                                     <input type="text" name="city_addres"  value="<?php echo $city; ?>"/>
                                 </div>
                             </div>
                             <div class="rowElem">
                                 <label>Адрес:</label>
                                 <div class="formRight">
                                       <input type="text" name="addres_addres"  value=""/>
                                 </div>
                             </div>
                             <div class="rowElem">
                                  <label>Номер заказа:</label>
                                  <div class="formRight">
                                       <input type="text" name="order_id_addres"  value="<?php echo $number; ?>"/>
                                  </div>
                             </div>
                             <div class="rowElem">
                                   <label>Вес:</label>
                                   <div class="formRight">
                                        <input type="text" name="weight_addres"  value=""/>
                                   </div>
                             </div>
                             <div class="rowElem">
                                <label>Плательщик доставки :</label>
                                <div class="formRight">
                                    <input type="radio" id="radio29" name="postage_charge_addres" value="sender" /><label for="radio29">Отправитель</label>
                                    <input type="radio" id="radio30" name="postage_charge_addres" value="recipient" /><label for="radio30">Получатель</label>
                                </div>
                             </div>
                             <div class="rowElem">
                                <label>Статус оплаты :</label>
                                <div class="formRight">
                                    <input type="radio" id="radio33" name="delivery_pay_status_addres" value="paid" /><label for="radio33">Оплачено</label>
                                    <input type="radio" id="radio34" name="delivery_pay_status_addres" onclick="addres_post_cash()" value="addres_post_cash" /><label for="radio34">Наложеный платеж</label>
                                </div>
                             </div>
                             <div id="addres_post_cash" style="display: none;">
                                 <div class="rowElem">
                                       <label>Сумма платежа:</label>
                                       <div class="formRight">
                                            <input type="text" name="addres_cash_addres" value=""/>
                                       </div>
                                 </div>
                             </div>
                        </div>

<!--Адресная (конец)-->
<!--Попутка (начало)-->
                    <div id="hitched_post" style="display: none;">
                             <div class="rowElem">
                                <label>ФИО:</label>
                                <div class="formRight">
                                    <input type="text" name="name_hitched"  value="<?php echo $name; ?>"/>
                                </div>
                             </div>
                             <div class="rowElem">
                                 <label>Телефон:</label>
                                 <div class="formRight">
                                     <input type="text" name="phone_hitched"  value="<?php echo $phone; ?>"/>
                                 </div>
                             </div>
                             <div class="rowElem">
                                 <label>Область:</label>
                                 <div class="formRight">
                                     <input type="text" name="region_hitched"  value=""/>
                                 </div>
                             </div>
                             <div class="rowElem">
                                 <label>Город:</label>
                                 <div class="formRight">
                                     <input type="text" name="city_hitched"  value="<?php echo $city; ?>"/>
                                 </div>
                             </div>
                             <div class="rowElem">
                                 <label>Адрес:</label>
                                 <div class="formRight">
                                       <input type="text" name="addres_hitched"  value=""/>
                                 </div>
                             </div>
                             <div class="rowElem">
                                  <label>Номер заказа:</label>
                                  <div class="formRight">
                                       <input disabled type="text" name="order_id_hitched"  value="<?php echo $number; ?>"/>
                                  </div>
                             </div>
                             <div class="rowElem">
                                   <label>Вес:</label>
                                   <div class="formRight">
                                        <input type="text" name="weight_hitched"  value=""/>
                                   </div>
                             </div>
                             <div class="rowElem">
                                <label>Статус оплаты :</label>
                                <div class="formRight">
                                    <input type="radio" id="radio35" name="delivery_pay_status_hitched" onclick="hitched_post_no_cash()" value="paid" /><label for="radio35">Оплачено</label>
                                    <input type="radio" id="radio36" name="delivery_pay_status_hitched" onclick="hitched_post_cash()" value="hitched_post_cash" /><label for="radio36">Наложеный платеж</label>
                                </div>
                             </div>
                             <div id="hitched_post_cash" style="display: none;">
                                 <div class="rowElem">
                                       <label>Сумма платежа:</label>
                                       <div class="formRight">
                                            <input type="text" name="hitched_cash_addres" value=""/>
                                       </div>
                                 </div>
                             </div>
                    </div>

<!--Попутка (конец)-->
<!--Самовывоз (начало)-->
                    <div id="pickup_post" style="display: none;">
                             <div class="rowElem">
                                <label>ФИО:</label>
                                <div class="formRight">
                                    <input type="text" name="name_pickup"  value="<?php echo $name; ?>"/>
                                </div>
                             </div>
                             <div class="rowElem">
                                 <label>Телефон:</label>
                                 <div class="formRight">
                                     <input type="text" name="phone_pickup"  value="<?php echo $phone; ?>"/>
                                 </div>
                             </div>
                             <div class="rowElem">
                                  <label>Номер заказа:</label>
                                  <div class="formRight">
                                       <input type="text" name="order_id_pickup"  value="<?php echo $number; ?>"/>
                                  </div>
                             </div>
                             <div class="rowElem">
                                   <label>Вес:</label>
                                   <div class="formRight">
                                        <input type="text" name="weight_pickup"  value=""/>
                                   </div>
                             </div>
                             <div class="rowElem">
                                <label>Статус оплаты :</label>
                                <div class="formRight">
                                    <input type="radio" id="radio35" name="delivery_pay_status_pickup" value="paid" /><label for="radio35">Оплачено</label>
                                    <input type="radio" id="radio36" name="delivery_pay_status_pickup" onclick="pickup_post_cash()" value="pickup_post_cash" /><label for="radio36">Наложеный платеж</label>
                                </div>
                             </div>
                             <div id="pickup_post_cash" style="display: none;">
                                 <div class="rowElem">
                                       <label>Сумма платежа:</label>
                                       <div class="formRight">
                                            <input type="text" name="pickup_cash_addres" value=""/>
                                       </div>
                                 </div>
                             </div>
                    </div>

<!--Самовывоз (конец)-->
<!--Два столба (начало)-->
                    <div id="two_pillars_post" style="display: none;">
                             <div class="rowElem">
                                <label>ФИО:</label>
                                <div class="formRight">
                                    <input type="text" name="name_two_pillars"  value="<?php echo $name; ?>"/>
                                </div>
                             </div>
                             <div class="rowElem">
                                 <label>Телефон:</label>
                                 <div class="formRight">
                                     <input type="text" name="phone_two_pillars"  value="<?php echo $phone; ?>"/>
                                 </div>
                             </div>
                             <div class="rowElem">
                                  <label>Номер заказа:</label>
                                  <div class="formRight">
                                       <input type="text" disabled name="order_id_two_pillars"  value="<?php echo $number; ?>"/>
                                  </div>
                             </div>
                             <div class="rowElem">
                                <label>Статус оплаты :</label>
                                <div class="formRight">
                                    <input type="radio" id="radio35" name="delivery_pay_status_two_pillars" value="paid" /><label for="radio35">Оплачено</label>
                                    <input type="radio" id="radio36" name="delivery_pay_status_two_pillars" onclick="two_pillars_post_cash()" value="two_pillars_post_cash" /><label for="radio36">Наложеный платеж</label>
                                </div>
                             </div>
                             <div id="two_pillars_post_cash" style="display: none;">
                                 <div class="rowElem">
                                       <label>Сумма платежа:</label>
                                       <div class="formRight">
                                            <input type="text" name="two_pillars_cash_addres" value=""/>
                                       </div>
                                 </div>
                             </div>
                    </div>

<!--Два столба (конец)-->


                </div>
<!--Доставка (конец)-->

			    <div class="widget" style="margin-top: 10px;">
				<div class="head"><h5 class="iCreate">Дата предзаказа</h5></div>
                         <div class="rowElem">
                                <label>Договор</label>
                                <div class="formRight">
                                    <input type="radio" id="radio37" name="contract"  onclick="without_contract()" value="without_contract" /><label for="radio37">Нет</label>
                                    <input type="radio" id="radio38" name="contract"  onclick="with_contract()" value="with_contract" /><label for="radio38">Да</label>
                                </div>
						<div class="rowElem">
						<label>Дата выполнения:</label>
								<div class="formRight">
									<input type="text" name="date_manufactured" class="datepicker" />
								</div>
						</div>
						
                             </div>
			    </div>

			    <div class="widget" style="margin-top: 10px;">
				<div class="head"><h5 class="iCreate">Новый комментарий</h5></div>

				    <center>
						<textarea rows="8" cols="" class="auto" name="comment" placeholder="Текст нового комментария" style="width:98%;margin-top:10px;margin-bottom:10px;"></textarea>
						<input type="submit" value="Оформить предзаказ #<?php echo $number;?>" style="width:98%;" class="greenBtn" />
					</center>
			    </div>

                <div id="result_add_preorder"></div>
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