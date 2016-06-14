<?php
$full_cost=$_GET['full_cost'];
?>
<div id="check">
    <div class="rowElem">
        <label>Поставщик:</label>
        <div class="formRight">
            <input type="text" disabled name="provider" value="ФОП Романенко В.Г." required />
        </div>
    </div>
    <div class="rowElem">
        <div class="formRight">
            <input type="text" disabled name="provider_two" value="філія ПАТ КБ”ПриватБанк” МФО 328704 г. Одеса" required />
        </div>
    </div>
    <div class="rowElem">
        <label>№ Р/С:</label>
        <div class="formRight">
            <input type="text" disabled name="number_check" value="26005054316107" required />
            <input type="hidden" name="number_check" value="26005054316107">
        </div>
    </div>
    <div class="rowElem">
        <label>ЕДРПОУ:</label>
        <div class="formRight">
            <input type="text" disabled name="number_edrpou" value="3090926277" required />
        </div>
    </div>
    <div class="rowElem">
        <label>Cумма:</label>
        <div class="formRight">
            <input type="text" name="prepay_sum" required pattern="^[ 0-9]+$" style="width: 542px;"/>
            <input type="text" disabled value="Сумма заказа: <?php echo $full_cost;?> ₴" style="width: 200px;text-align: center;margin-left: 10px;">
        </div>
    </div>
    <div class="submitForm"><input type="submit" value="Оплата на Р/С. Всё верно. Идём дальше!" class="greenBtn" /></div>
</div>