<?php
include 'include/themplate/header.php';
if($_SESSION['id']!="")
{
?>

<script type="text/javascript" language="javascript">
    function add_prepay() {
        var msg   = $('#add_prepay').serialize();
        $.ajax({
            type: 'POST',
            url: '/function/add_prepay.php',
            data: msg,
            success: function(data) {
                $('#result_add_prepay').html(data);
            },
            error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });

    }

    function my_preorder(id_pos) {

        var msg = document.getElementById("type_pay_"+id_pos+"").value;
        var id = document.getElementById("id_"+id_pos+"").value;
        var sum_prepay = document.getElementById("sum_prepay_"+id_pos+"").value;

        $.ajax({
            type: 'POST',
            url: '/function/my_preorder.php?call_id='+msg+'&sum_prepay='+sum_prepay+'&id='+id,
            success: function(data) {
                $('#result_add_prepay').html(data);
            },
            error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });

    }
        function display_card_last_number() {

            var msg = document.getElementById("display_card").value;

            if(msg==3)
                {
                    document.getElementById('display_card_last').style.display="";
                    $("#card_last_number").prop('required',true);
                }



         }
</script>
<style>


    .select2-container {
        position: relative;
        display: inline-flex;
        zoom: 1;
        *display: inline;
    }

    .select2-container .select2-choice {
        border: 1px solid #d5d5d5;
        display: block;
        overflow: hidden;
        white-space: nowrap;
        position: relative;
        line-height: 27px;
        height: 27px;
        width: 147px;
        padding: 1px 0 0 10px;
        text-decoration: none;
        font-size: 11px;
        color: #707070;
        background: #fcfcfc;
        background: -moz-linear-gradient(top, #fcfcfc 0%, #f4f4f4 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fcfcfc), color-stop(100%,#f4f4f4));
        background: -webkit-linear-gradient(top, #fcfcfc 0%,#f4f4f4 100%);
        background: -o-linear-gradient(top, #fcfcfc 0%,#f4f4f4 100%);
        background: -ms-linear-gradient(top, #fcfcfc 0%,#f4f4f4 100%);
        background: linear-gradient(top, #fcfcfc 0%,#f4f4f4 100%);
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        -moz-background-clip: padding;
        -webkit-background-clip: padding-box;
        background-clip: padding-box;
        box-shadow: 0 1px 0 #fff inset, 0 1px 0px #eeeeee;
        -webkit-box-shadow: 0 1px 0 #fff inset, 0 1px 0px #eeeeee;
        -moz-box-shadow: 0 1px 0 #fff inset, 0 1px 0px #eeeeee;
    }

</style>
</head>
<body>
<?php
include 'include/themplate/top_band.php';
include 'include/themplate/top_menu.php';
?>
<!-- Content wrapper -->
<div class="wrapper">
    <?php
    include 'include/themplate/menu.php';
    ?>


    <!-- Content -->
    <div class="content">
        <div class="title"><h5>Предоплаты</h5></div>
        <?php if($_SESSION['access']=="1"){?>
            <div class="widget" style="margin-top: 20px;">
                <div class="head opened inactive" id="opened"><h5>Добавить предоплату</h5></div>
                <div class="body">
                    <form method="POST" id="add_prepay" action="javascript:void(null);" onsubmit="add_prepay()" class="mainForm">
                        <fieldset>
                            <div class="widget" style="margin-top: 10px;">
                                <div class="head"><h5 class="iList">Форма добавления</h5></div>
                                <div class="rowElem noborder"><label>Сумма предоплаты:</label><div class="formRight"><input required type="text" name="summ_prepay"/></div></div>
                                <div class="rowElem">
                                    <label>Направление:</label>
                                    <div class="formRight">
                                        <select id="display_card" required  onchange="display_card_last_number()" data-placeholder="Выберите направление..." class="select" name="direction" tabindex="2">
                                            <option value=""></option>
                                            <?php
                                            $query = "SELECT * FROM `setting_type_pay`";
                                            $res = mysql_query($query) or die(mysql_error());
                                            while ($result = mysql_fetch_array($res)) {
                                                echo '<option value="'.$result['id'].'">'.$result['name'].'</option> ';
                                            }
                                            ?>
                                        </select>
                                        <span id="display_card_last" style="margin-left: 10px;display: none;">Последние 4-ре цифры карты: <input  type="text" style="width:165px;" id="card_last_number" name="card_last_number"/></span>
                                    </div>
                                </div>
                                <div class="submitForm"><input type="submit" value="Добавить" class="greenBtn" /></div>
                                <div id="result_add_prepay"></div>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>

        <?php } ?>

        <div class="table" style="margin-top: 20px;">
            <div class="head">
                <h5 class="iFrames">Предоплаты</h5>
            </div>
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                <thead>
                <tr>
                    <th>Сумма</th>
                    <th >Направление</th>
                    <th style="width: 160px;">Заказ</th>
                    <th style="width: 140px;">Подтверждение</th>
                    <?php if($_SESSION['access']=="1"){?><th>Удаление</th><?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php
                $query = "SELECT * FROM `table_prepay` WHERE `status` IS NULL";
                $res = mysql_query($query) or die(mysql_error());
                while ($result = mysql_fetch_array($res)) {

                    $query_direction = "SELECT * FROM `setting_type_pay` WHERE id='".$result['direction_prepay']."'";
                    $res_direction = mysql_query($query_direction) or die(mysql_error());
                    $result_direction = mysql_fetch_array($res_direction);
                    $direction=$result_direction['name'];

                    if($result['card_number']!="0"){$card="CARD [".$result['card_number']."]";}

                    echo '<tr class="gradeA">
							  <td><center>'.$result['sum_prepay'].' ₴</center></td>
							  <input type="hidden" id="id_'.$result['id'].'" value="'.$result['id'].'"/>
							  <input type="hidden" id="sum_prepay_'.$result['id'].'" value="'.$result['sum_prepay'].'"/>
							  <td><center>'.$direction.' <b>'.$card.'</b></center></td>
							  <td><center>

							  <form method="POST" class="mainForm">
                                        <select required style="width: 150px;" data-placeholder="Выберите номер..." class="select" id="type_pay_'.$result['id'].'" name="type_pay" tabindex="2">
                                            <option value=""></option>';

                                            $query_call = "SELECT * FROM `scroll_call` WHERE status='8'";
                                            $res_call = mysql_query($query_call) or die(mysql_error());
                                            while ($result_call = mysql_fetch_array($res_call)) {
                                                $number=str_pad($result_call['id'], 6, '0', STR_PAD_LEFT);
                                                echo '<option value="'.$result_call['id'].'">#'.$number.'</option> ';
                                            }

                                        echo '</select>
                                </form>

							  </center></td>';
                        echo '<td class="center"><center><input type="submit" onclick="my_preorder('.$result['id'].')" value="Моя предоплата" class="greenBtn"></center></td>';
                    if($_SESSION['access']=="1")
                    {
                        echo '<td><center><a href="function/delete_prepay.php?id=' .$result['id'].'"> <img src="images/icons/color/cross.png"/></a></center></td>';
                    }
                    echo '</tr>';
                }

                ?>
                </tbody>
            </table>
        </div>
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
