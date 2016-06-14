<?php
$full_pay=$_GET['full_cost'];
$prepay_sum=$_GET['prepay_sum'];
$impised=$full_pay-$prepay_sum;
echo <<<HTML
    <div id="imposed_sum">
        <div class="rowElem">
            <label>Cумма платежа:</label>
            <div class="formRight">
                <input type="text" name="imposed_sum" required pattern="^[ 0-9]+$" style="width: 542px;" value="$impised"/>
                <input type="text" disabled value="Сумма заказа: $full_pay ₴" style="width: 200px;text-align: center;margin-left: 10px;">
            </div>
        </div>
    </div>
HTML;
?>