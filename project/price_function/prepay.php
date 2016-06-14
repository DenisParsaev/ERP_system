<?php
$full_cost=$_GET['full_cost'];
$call_id=$_GET['call_id'];
$prepay=$_GET['prepay'];
if($prepay=="no")
    {
echo '<center><div class="submitForm"><input type="submit" style="width: 100%;margin-left: 9px;" value="Без оплаты. Всё верно. Идём дальше!" class="greenBtn" /></div></center>';
    }
else
    {
echo <<<HTML
        <div id="prepay_content">
            <div class="rowElem" id="edit_class">
                <label>Направление:</label>
                <div class="formRight">
                    <select onchange="way_prepay($full_cost,$call_id);" style="width:756px;" data-placeholder="Выберите напраление пред-оплаты..." class="select" name="prepay_way" id="prepay_way" tabindex="2">
                        <option value=""></option>
                        <option name="check" value="check">Р/C</option>
                        <option name="vat" value="vat">НДС</option>
                        <option name="card" value="card">Приват Банк</option>
                        <option name="cash" value="cash">Наличные</option>
                    </select>
                </div>
            </div>
            <div id="result_way_prepay"></div>
        </div>
HTML;
    }
?>