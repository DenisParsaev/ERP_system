<?php
include 'include/themplate/header.php';


if($_SESSION['id']!="")
    {
        $id=$_GET['id'];
        $call_id=$_GET['id'];
        $full_cost=$_GET['price'];
        $number_call=str_pad($id, 6, '0', STR_PAD_LEFT);

echo <<<END
            <!-- Подключение стилей предзаказа -->
            <link href="/css/preorder.css" rel="stylesheet" type="text/css" />
            <!-- Подключение функций предзаказа -->
            <script type="text/javascript" src="/js/function_preorder.js"></script>
            </head>
            <body>
END;
            include 'include/themplate/top_band.php';
            include 'include/themplate/top_menu.php';
echo <<<HTML
            <div class="wrapper">
                <div class="content">
                    <div class="title"><h5>Оформление предзаказа</h5></div>
                    <form method="POST" id="end_prepay" action="javascript:void(null);" onsubmit="end_prepay()" class="mainForm">
                        <div class="widget first">
                            <div class="head"><h5 class="iList">Информация об оплате заказа #$number_call</h5></div>
                            <div class="rowElem noborder">
                                <label>Пред-оплата:</label>
                                <div class="formRight">
                                    <input type="radio" name="prepay" id="prepay_yes" value="prepay_yes" onclick="preorder_prepay(1,$full_cost,$call_id)"/>
                                    <label for="prepay_yes">Есть</label>

                                    <input type="radio" name="prepay" id="prepay_no" value="prepay_no"  onclick="preorder_prepay(0,$full_cost,$call_id)"/>
                                    <label for="prepay_no">Нет</label>
                                </div>
                                <!--Вывод результата по рпедоплате-->
                                <input type="hidden" name="full_cost" value="$full_cost"/>
                                <input type="hidden" name="call_id" value="$call_id"/>
                                <div id="result_prepay"></div>
                            </div>
                        </div>
                    </form>
                    <!--Доставка-->
                    <div id="result_delivery"></div>
                    <div id="result_end_delivery"></div>
                </div>
            </div>
HTML;
        include 'include/themplate/footer.php';
    }
else
    {
        echo '<script language="JavaScript"> window.location.href = "/index.php"</script>';
    }
?>
