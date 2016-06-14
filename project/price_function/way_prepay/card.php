<?php
include($_SERVER['DOCUMENT_ROOT'] . '/include/config.php');
include($_SERVER['DOCUMENT_ROOT'] . '/function/function.php');
$full_cost=$_GET['full_cost'];
?>
<div id="card">
    <div class="rowElem">
        <label>Карта:</label>
        <div class="formRight">
            <select onchange="" style="width:756px;" data-placeholder="Выберите карту Приват Банк..." class="select_card" name="card" id="select_card" tabindex="2">
                <?php card_list();?>
            </select>
        </div>
    </div>
    <div class="rowElem">
        <label>Cумма:</label>
        <div class="formRight">
            <input type="text" name="prepay_sum" required pattern="^[ 0-9]+$" style="width: 542px;"/>
            <input type="text" disabled value="Сумма заказа: <?php echo $full_cost;?> ₴" style="width: 200px;text-align: center;margin-left: 10px;">
        </div>
    </div>
    <div class="submitForm"><input type="submit" value="Пред-оплата на карту. Всё верно. Идём дальше!" class="greenBtn" /></div>
</div>