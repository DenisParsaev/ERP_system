<?php
include 'include/themplate/header.php';
if($_SESSION['access']=="1")
{
$percent_manager=percent_manager();
?>

<script type="text/javascript" language="javascript">
    function update() {
        var msg   = $('#update_wire').serialize();
        $.ajax({
            type: 'POST',
            url: '/function/update_cost_diameter.php',
            data: msg,
            success: function(data) {
                $('#result_update_wire').html(data);
            },
            error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
    }


</script>


<style>
    .tableStatic tbody td
        {
            border-left: 1px solid #e7e7e7;
            padding: 0px 0px;
            vertical-align: middle;
        }

    .back
        {
            background: linear-gradient(-45deg, transparent 49.9%, #0E0E0E 49.9%, #0E0E0E 60%, transparent 60%),
            linear-gradient(-45deg, #191918 10%, transparent 10%);
            background-size: 1em 1em;
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
    <div class="content" style="width: 100%;">
        <div class="title"><h5>Общие настройки</h5></div>
        <form method="POST" id="setting_update" action="javascript:void(null);" onsubmit="setting_update()" class="mainForm">
            <fieldset>
                <div class="widget first">
                    <div class="head"><h5 class="iList">Добавить сотрудника</h5></div>
                    <div class="rowElem noborder"><label>Курс $:</label><div class="formRight"><input type="text" name="dollar_exchange" value="<?php dollar_exchange();?>"/></div></div>
                    <div class="rowElem"><label>Менеджер %:</label><div class="formRight"><input type="text" name="percent_manager" value="<?php echo $percent_manager;?>"/></div></div>
                    <div class="rowElem"><label>Управляющий %:</label><div class="formRight"><input type="text" name="percent_managing" value="<?php percent_managing();?>"/></div></div>
                    <div class="submitForm"><input type="submit" value="Сохранить" class="greenBtn" /></div>
                </div>
            </fieldset>
        </form>
        <br>
        <div class="title"><h5>Прайс проволока</h5></div>

        <div class="widget first acc">
            <div class="head"><h5>Оцинкованная</h5></div>
            <div class="menu_body">
                <div class="head"><h5>Стоимость проволоки оцинкованной</h5><div class="num"><a onclick="cost_wire(1)" class="greenNum" style="margin-left: 3px;">Сохранить</a></div></div>
                <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
                    <thead>
                    <tr>
                        <td style="width: 65px;">Диаметр</td>
                        <td style="width: 65px;">Наличие</td>
                        <td style="width: 65px;">Цена</td>
                        <td style="width: 55px;">до 5[кг]</td>
                        <td style="width: 55px;">до 10[кг]</td>
                        <td style="width: 55px;">до 20[кг]</td>
                        <td style="width: 55px;">до 50[кг]</td>
                        <td style="width: 55px;">до 100[кг]</td>
                        <td style="width: 55px;">до 500[кг]</td>
                        <td style="width: 55px;">до 1[т]</td>
                        <td style="width: 55px;">до 5[т]</td>
                        <td style="width: 55px;">#2</td>
                        <td style="width: 55px;">#3</td>
                    </tr>
                    </thead>
                    <tbody>
                    <form class="mainForm" method="POST" id="cost_wire_1" action="javascript:void(null);">
                        <?php output_wire(1); ?>
                    </form>
                    </tbody>
                </table>
            </div>
            <div class="head"><h5>Чёрная</h5></div>
            <div class="menu_body">
                <div class="head"><h5>Стоимость проволоки черной</h5><div class="num"><a onclick="cost_wire(2)" class="greenNum" style="margin-left: 3px;">Сохранить</a></div></div>
                <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
                    <thead>
                    <tr>
                        <td style="width: 65px;">Диаметр</td>
                        <td style="width: 65px;">Наличие</td>
                        <td style="width: 65px;">Цена</td>
                        <td style="width: 55px;">до 5[кг]</td>
                        <td style="width: 55px;">до 10[кг]</td>
                        <td style="width: 55px;">до 20[кг]</td>
                        <td style="width: 55px;">до 50[кг]</td>
                        <td style="width: 55px;">до 100[кг]</td>
                        <td style="width: 55px;">до 500[кг]</td>
                        <td style="width: 55px;">до 1[т]</td>
                        <td style="width: 55px;">до 5[т]</td>
                        <td style="width: 55px;">#2</td>
                        <td style="width: 55px;">#3</td>
                    </tr>
                    </thead>
                    <tbody>
                    <form class="mainForm" method="POST" id="cost_wire_2" action="javascript:void(null);">
                        <?php output_wire(2); ?>
                    </form>
                    </tbody>
                </table>
            </div>
            <div class="head"><h5>Мягкая (Оцинкованная)</h5></div>
            <div class="menu_body">
                <div class="head"><h5>Стоимость проволоки мягкой оцинкованной</h5><div class="num"><a onclick="cost_wire(3)" class="greenNum" style="margin-left: 3px;">Сохранить</a></div></div>
                <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
                    <thead>
                    <tr>
                        <td style="width: 65px;">Диаметр</td>
                        <td style="width: 65px;">Наличие</td>
                        <td style="width: 65px;">Цена</td>
                        <td style="width: 55px;">до 5[кг]</td>
                        <td style="width: 55px;">до 10[кг]</td>
                        <td style="width: 55px;">до 20[кг]</td>
                        <td style="width: 55px;">до 50[кг]</td>
                        <td style="width: 55px;">до 100[кг]</td>
                        <td style="width: 55px;">до 500[кг]</td>
                        <td style="width: 55px;">до 1[т]</td>
                        <td style="width: 55px;">до 5[т]</td>
                        <td style="width: 55px;">#2</td>
                        <td style="width: 55px;">#3</td>
                    </tr>
                    </thead>
                    <tbody>
                    <form class="mainForm" method="POST" id="cost_wire_3" action="javascript:void(null);">
                        <?php output_wire(3); ?>
                    </form>
                    </tbody>
                </table>
            </div>
            <div class="head"><h5>Мягкая (Чёрная)</h5></div>
            <div class="menu_body">
                <div class="head"><h5>Стоимость проволоки мягкой черной</h5><div class="num"><a onclick="cost_wire(4)" class="greenNum" style="margin-left: 3px;">Сохранить</a></div></div>
                <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
                    <thead>
                    <tr>
                        <td style="width: 65px;">Диаметр</td>
                        <td style="width: 65px;">Наличие</td>
                        <td style="width: 65px;">Цена</td>
                        <td style="width: 55px;">до 5[кг]</td>
                        <td style="width: 55px;">до 10[кг]</td>
                        <td style="width: 55px;">до 20[кг]</td>
                        <td style="width: 55px;">до 50[кг]</td>
                        <td style="width: 55px;">до 100[кг]</td>
                        <td style="width: 55px;">до 500[кг]</td>
                        <td style="width: 55px;">до 1[т]</td>
                        <td style="width: 55px;">до 5[т]</td>
                        <td style="width: 55px;">#2</td>
                        <td style="width: 55px;">#3</td>
                    </tr>
                    </thead>
                    <tbody>
                    <form class="mainForm" method="POST" id="cost_wire_4" action="javascript:void(null);">
                        <?php output_wire(4); ?>
                    </form>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="title" style="margin-top: 20px;"><h5>Прайс армосетка</h5></div>
            <div class="fluid">
                <div class="span6">
                    <div class="widget">
                        <form method="POST" id="update_price_welded_mesh" action="javascript:void(null);" >
                            <?php welded_mesh_price();?>
                        </form>
                    </div>
                </div>
                <div class="span6">
                    <div class="widget">
                        <form method="POST" id="save_price_1011" action="javascript:void(null);" >
                            <?php barbed_price();?>
                        </form>
                    </div>
                </div>
            </div>
        <div class="title" style="margin-top: 20px;margin-bottom: -30px;"><h5>Прайс рабица</h5></div>
        <div class="widget" style="width: 1100px;margin-left: -50px;">
            <div class="tabs">
                <ul>
                    <li><a href="setting.php#tabs-1">10-ка</a></li>
                    <li><a href="setting.php#tabs-2">15-ка</a></li>
                    <li><a href="setting.php#tabs-3">20-ка</a></li>
                    <li><a href="setting.php#tabs-4">25-ка</a></li>
                    <li><a href="setting.php#tabs-5">35-ка</a></li>
                    <li><a href="setting.php#tabs-6">45-ка</a></li>
                    <li><a href="setting.php#tabs-7">55-ка</a></li>
                    <li><a href="setting.php#tabs-8">65-ка</a></li>
                    <li><a href="setting.php#tabs-9">70-ка</a></li>
                    <li><a href="setting.php#tabs-10">100-ка</a></li>
                </ul>
                <div id="tabs-1">
                    <form method="POST" id="save_price_10" action="javascript:void(null);" >
                        <?php echo_template_price(10);?>
                    </form>
                </div>
                <div id="tabs-2">
                    <form method="POST" id="save_price_15" action="javascript:void(null);" >
                        <?php echo_template_price(15);?>
                    </form>
                </div>
                <div id="tabs-3">
                    <form method="POST" id="save_price_20" action="javascript:void(null);" >
                        <?php echo_template_price(20);?>
                    </form>
                </div>
                <div id="tabs-4">
                    <form method="POST" id="save_price_25" action="javascript:void(null);" >
                        <?php echo_template_price(25);?>
                    </form>
                </div>
                <div id="tabs-5">
                    <form method="POST" id="save_price_35" action="javascript:void(null);" >
                        <?php echo_template_price(35);?>
                    </form>
                </div>
                <div id="tabs-6">
                    <form method="POST" id="save_price_45" action="javascript:void(null);" >
                        <?php echo_template_price(45);?>
                    </form>
                </div>
                <div id="tabs-7">
                    <form method="POST" id="save_price_55" action="javascript:void(null);" >
                        <?php echo_template_price(55);?>
                    </form>
                </div>
                <div id="tabs-8">
                    <form method="POST" id="save_price_65" action="javascript:void(null);" >
                        <?php echo_template_price(65);?>
                    </form>
                </div>
                <div id="tabs-9">
                    <form method="POST" id="save_price_70" action="javascript:void(null);" >
                        <?php echo_template_price(70);?>
                    </form>
                </div>
                <div id="tabs-10">
                    <form method="POST" id="save_price_100" action="javascript:void(null);" >
                        <?php echo_template_price(100);?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="result"></div>
<?php
include 'include/themplate/footer.php';
}
else
{
    //echo '<script language="JavaScript"> window.location.href = "/index.php"</script>';
}
?>
