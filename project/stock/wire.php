<?php
include '../include/themplate/header.php';
if($_SESSION['id']!="")
{
?>

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
include '../include/themplate/top_band.php';
include '../include/themplate/top_menu.php';
?>
<!-- Content wrapper -->
<div class="wrapper">

    <?php
    include '../include/themplate/menu.php';
    ?>


    <!-- Content -->
    <div class="content">
        <div class="title"><h5>Склад проволоки</h5></div>
        <?php if($_SESSION['access']==1){?>
        <div class="widget first acc">
            <div class="head"><h5>Добавление проволоки</h5></div>
            <div class="menu_body">
                <form id="stock_wire_add" action="javascript:void(null);" onsubmit="stock_wire_add()" class="mainForm">
                    <fieldset>
                            <div class="rowElem noborder">
                                <input style="width: 355px;" type="text" required name="weight" placeholder="Масса ввезенной проволоки"/>
                                <input type="hidden" name="member" value="<?php echo $_SESSION['id'];?>"/>
                                <select data-placeholder="Диаметр" required style="width: 100px;" name="diameter" class="select" tabindex="2">
                                    <option value=""></option>
                                    <?php echo_diameter(); ?>
                                </select>
                                <select data-placeholder="Проволока" required style="width: 100px;" name="type_wire" class="select" tabindex="2">
                                    <option value=""></option>
                                    <?php echo_type_wire(); ?>
                                </select>
                                <select data-placeholder="Обработка" required style="width: 100px;" name="type_wire_treatment" class="select" tabindex="2">
                                    <option value="1">ОК</option>
                                    <?php echo_type_treatment(); ?>
                                </select>
                            </div>
                            <div class="submitForm">
                                <input type="submit" value="Добавить" class="greenBtn" style="width: 100%;"/>
                            </div>
                    </fieldset>
                </form>
                <div id="result_update_wire"></div>
            </div>
            <div class="head"><h5>История изменений</h5></div>
            <div class="menu_body">
                <form class="mainForm">
                    <fieldset>
                        <textarea disabled style="height: 300px;" id="log"></textarea>
                        <?php echo_log_wire();?>
                    </fieldset>
                </form>
            </div>
        </div>
        <?php } ?>


            <div class="widget first">
                <div class="head"><h5 class="iFrames">Наличие на складе</h5></div>
                <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
                    <thead>
                    <tr>
                        <td width="20%">Диаметер</td>
                        <td width="20%">Тип проволоки</td>
                        <td width="20%">Тип обработки</td>
                        <td width="20%">Остаток на складе</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php echo_wire_stock();?>




                    </tbody>
                </table>
            </div>

    </div>
</div>

<?php
include '../include/themplate/footer.php';
}
else
{
    echo '<script language="JavaScript"> window.location.href = "/index.php"</script>';
}
?>
