<?php
$full_cost=$_GET['full_cost'];
?>
<div id="vat">
    <div class="rowElem">
        <label>НДС [%]:</label>
        <div class="formRight">
            <input required type="text" name="percent_vat" id="spinner-default" value="10" />
        </div>
    </div>
    <div class="rowElem">
        <label>Cумма:</label>
        <div class="formRight">
            <input type="text" name="prepay_sum" required pattern="^[ 0-9]+$" style="width: 542px;"/>
            <input type="text" disabled value="Сумма заказа: <?php echo $full_cost;?> ₴" style="width: 200px;text-align: center;margin-left: 10px;">
        </div>
    </div>
    <div class="submitForm"><input type="submit" value="Оплата НДС. Всё верно. Идём дальше!" class="greenBtn" /></div>
</div>