<?php
include 'include/themplate/header.php';
if($_SESSION['access']=="1")
{
?>

<script type="text/javascript" language="javascript">
    function add_inventory() {
        var msg   = $('#add_inventory').serialize();
        $.ajax({
            type: 'POST',
            url: '/function/add_inventory.php',
            data: msg,
            success: function(data) {
                $('#result_add_inventory').html(data);
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

                    <form method="POST" id="add_inventory" action="javascript:void(null);" onsubmit="add_inventory()" class="mainForm">

                        <!-- Input text fields -->
                        <fieldset>
                            <div class="widget" style="margin-top: 10px;">
                                <div class="head"><h5 class="iList">Форма добавления</h5></div>
                                <div class="rowElem noborder"><label>Инвентарь:</label><div class="formRight"><input type="text" name="name"/></div></div>
                                <div class="rowElem">
                                    <label>ФИО:</label>
                                    <div class="formRight">
                                        <select style="width:512px;" data-placeholder="Выберите сотрудника..." class="select" name="users" tabindex="2">
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
                                <div class="submitForm"><input type="submit" value="Добавить инвентарь" class="greenBtn" /></div>
                                <div id="result_add_inventory"></div>
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
