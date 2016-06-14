<?php

include '../../include/config.php';

$full_cost=$_POST['full_cost'];
$call_id=$_POST['call_id'];
$prepay_sum=$_POST['prepay_sum'];

$query = "SELECT name_client,phone_client,city_client FROM `scroll_call` WHERE id='$call_id'";
$res = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($res);
$name_client=$row['name_client'];
$phone_client=$row['phone_client'];
$city_client=$row['city_client'];

echo <<<HTML
<div id="intime">
    <div class="rowElem noborder">
        <label>Типо доставки:</label>
        <div class="formRight">
            <input type="radio" name="type_post" id="type_post_shop" onclick="select_post_type(1,1,$full_cost,$prepay_sum,$call_id)"/>
            <label for="type_post_shop">Отделение</label>

            <input type="radio" name="type_post" id="type_post_addres" onclick="select_post_type(0,1,$full_cost,$prepay_sum,$call_id)"/>
            <label for="type_post_addres">Адресная</label>
        </div>
    </div>
    <div id="type_post_result"></div>
    <script>

        $("#intime input:radio").uniform();
    </script>
</div>
HTML;
?>