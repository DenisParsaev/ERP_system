<?php

include '../include/config.php';

$full_cost=$_POST['full_cost'];
$call_id=$_POST['call_id'];
$prepay_sum=$_POST['prepay_sum'];

$query = "SELECT name_client,phone_client FROM `scroll_call` WHERE id='$call_id'";
$res = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($res);
$name_client=$row['name_client'];
$phone_client=$row['phone_client'];

echo <<<HTML
<div id="pickup">
    <input type="hidden" name="post_type" value="pickup"/>
    <div class="rowElem noborder">
        <label>Получатель:</label>
        <div class="formRight">
            <input type="text" name="preorder_recipient_name" placeholder="Иванов Иван Иванович" value="$name_client" required style="margin-right:10px;width: 550px;"/>
            Телефон:
            <input class="maskIntPhone" style="width: 125px;margin-left: 10px;" type="text" value="$phone_client" name="preorder_recipient_phone" placeholder="+38(066)666-66-66" required />
        </div>
    </div>
    <div class="rowElem">
        <label>Наложенный платеж:</label>
        <div class="formRight">
            <input type="radio" name="imposed_pay" id="imposed_pay_yes" onclick="imposed_money(1,$full_cost,$prepay_sum)"/>
            <label for="imposed_pay_yes">Да, необходим возврат денег!</label>

            <input checked type="radio" name="imposed_pay" id="imposed_pay_no" onclick="imposed_money(0,$full_cost,$prepay_sum)"/>
            <label for="imposed_pay_no">Нет, заказ полностью оплачен!</label>
        </div>
    </div>
    <div id="result_imposed_pay"></div>
    <div class="submitForm"><input type="submit" value="На 2-а столба. Всё верно. Оформить предзаказ!" class="greenBtn" /></div>
    <script>$(".maskIntPhone").mask("+380 (99) 999-99-99");</script>
    <script>

        $("#pickup input:radio").uniform();
    </script>
</div>
HTML;
?>