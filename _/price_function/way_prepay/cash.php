<?php
$full_cost=$_GET['full_cost'];
?>
<div id="cash">
    <div class="rowElem">
        <label>Cумма:</label>
        <div class="formRight">
            <input type="text" name="prepay_sum" required pattern="^[ 0-9]+$" style="width: 542px;"/>
            <input type="text" disabled value="Сумма заказа: <?php echo $full_cost;?> ₴" style="width: 200px;text-align: center;margin-left: 10px;">
        </div>
    </div>
    <div class="rowElem">
        <label>Получатель денег:</label>
        <div class="formRight">
            <input type="text" name="prepay_recipient_name" placeholder="Иванов Иван Иванович" required style="margin-right:10px;width: 550px;"/>
            Телефон:
            <input class="maskIntPhone" style="width: 125px;margin-left: 10px;" type="text" name="prepay_recipient_phone" placeholder="+38(066)666-66-66" required />
        </div>
    </div>
    <div class="rowElem">
        <label>Плательщик денег:</label>
        <div class="formRight">
            <input type="text" name="prepay_payer_name" placeholder="Иванов Иван Иванович" required style="margin-right:10px;width: 550px;"/>
            Телефон:
            <input class="maskIntPhone" style="width: 125px;margin-left: 10px;" type="text" name="prepay_payer_phone" placeholder="+38(066)666-66-66" required />
        </div>
    </div>
    <div class="submitForm"><input type="submit" value="Оплата наличными. Всё верно. Идём дальше!" class="greenBtn" /></div>

    <script>$(".maskIntPhone").mask("+380 (99) 999-99-99");</script>
</div>