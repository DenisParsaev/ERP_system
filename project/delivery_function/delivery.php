<?php
$call_id=$_POST['call_id'];
$full_cost=$_POST['full_cost'];
$prepay_sum=$_POST['prepay_sum'];
if($prepay_sum==""){$prepay_sum=0;}
echo '<pre>';
//var_dump($_POST);
echo '</pre>';
$number_call=str_pad($call_id, 6, '0', STR_PAD_LEFT);
echo <<<HTML
<form method="POST" id="end_delivery" action="javascript:void(null);" onsubmit="end_delivery()" class="mainForm">
    <div class="widget">
        <div class="head"><h5 class="iList">Информация об оплате заказа #$number_call</h5></div>
            <div id="delivery_selection">
                <div class="rowElem noborder">
                    <label>Доставка:</label>
                    <div class="formRight">
                        <input type="radio" name="delivery" id="delivery_np" onclick="preorder_delivery(1,$call_id,$prepay_sum,$full_cost)"/>
                        <label for="delivery_np">Новая Почта</label>

                        <input type="radio" name="delivery" id="delivery_intime" onclick="preorder_delivery(2,$call_id,$prepay_sum,$full_cost)"/>
                        <label for="delivery_intime">InTime</label>

                        <input type="radio" name="delivery" id="delivery_addres" onclick="preorder_delivery(3,$call_id,$prepay_sum,$full_cost)"/>
                        <label for="delivery_addres">Адресная</label>

                        <input type="radio" name="delivery" id="delivery_hitched" onclick="preorder_delivery(4,$call_id,$prepay_sum,$full_cost)"/>
                        <label for="delivery_hitched">Попутка</label>

                        <input type="radio" name="delivery" id="delivery_pickup" onclick="preorder_delivery(5,$call_id,$prepay_sum,$full_cost)"/>
                        <label for="delivery_pickup">Самовывоз</label>

                        <input type="radio" name="delivery" id="delivery_two_pillars" onclick="preorder_delivery(0,$call_id,$prepay_sum,$full_cost)"/>
                        <label for="delivery_two_pillars">Два столба</label>
                    </div>

                    <script>
                        $("#delivery_selection input:radio").uniform();
                    </script>
                </div>
            </div>
            <div id="delivery_type"></div>
    </div>
</form>
HTML;
?>