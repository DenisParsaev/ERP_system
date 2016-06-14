<?php
include 'include/themplate/header.php';
if($_SESSION['access']=="1")
{
?>

<script type="text/javascript" language="javascript">
    function add_transaction() {
        var msg   = $('#add_transaction').serialize();
        $.ajax({
            type: 'POST',
            url: '/function/add_transaction.php',
            data: msg,
            success: function(data) {
                $('#result_add_transaction').html(data);
            },
            error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });

    }
</script>
<style>
    .datepicker {
        width: 510px!important;
        cursor: pointer;
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
        <div class="title"><h5>Инвентарь</h5></div>

        <form method="POST" id="add_transaction" action="javascript:void(null);" onsubmit="add_transaction()" class="mainForm">

            <!-- Input text fields -->
            <fieldset>
                <div class="widget" style="margin-top: 10px;">
                    <div class="head"><h5 class="iList">Форма ведения кошельков</h5></div>
                    <div class="rowElem noborder">
                        <label>Тип транзакции:</label>
                        <div class="formRight">
                            <input type="radio" id="radio1" name="type_transaction" value="+" checked="checked" /><label for="radio1">Приход</label>
                            <input type="radio" id="radio2" name="type_transaction" value="-" /><label for="radio2">Расход</label>
                        </div>
                    </div>
                    <div class="rowElem"><label>Сумма:</label><div class="formRight"><input required type="text" name="sum"/></div></div>
                    <div class="rowElem">
                        <label>ФИО:</label>
                        <div class="formRight">
                            <select required style="width:512px;" data-placeholder="Выберите сотрудника..." class="select" name="users" tabindex="2">
                                <option value=""></option>
                                <?php
                                $query = "SELECT * FROM `users`";
                                $res = mysql_query($query) or die(mysql_error());
                                while ($result = mysql_fetch_array($res)) {


                                    echo '<option value="'.$result['id'].'">'.$result['full_name'].'</option> ';
                                }

                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="rowElem">
                        <label>Коментарий:</label>
                        <div class="formRight">
                            <textarea required rows="8" cols="" class="auto" name="comment"></textarea>
                        </div>
                    </div>
                    <div class="submitForm"><input type="submit" value="Добавить транзацию" class="greenBtn" /></div>
                    <div id="result_add_transaction"></div>
                </div>

            </fieldset>
        </form>


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
