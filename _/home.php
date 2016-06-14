<?php 
include 'include/themplate/header.php';
if($_SESSION['id']!="")
{
if($_SESSION['access']=="4"){echo '<script language="JavaScript"> window.location.href = "/preorder_list.php"</script>';}
?>


<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>

<style>
    #chartdiv {
        width		: 100%;
        height		: 435px;
        font-size	: 11px;
    }

    #chartdiv_status {
        width		: 100%;
        height		: 435px;
        font-size	: 11px;
    }

    #chartdiv_preorder {
        width		: 100%;
        height		: 435px;
        font-size	: 11px;
    }

    #chartdiv_close {
        width		: 100%;
        height		: 435px;
        font-size	: 11px;
    }
    .amcharts-export-menu-top-right {
        top: 10px;
        right: 0;
    }
</style>

<script type="text/javascript">
    var chart = AmCharts.makeChart("chartdiv_status", {
        "type": "serial",
        "theme": "light",
        "marginRight": 70,

        <?php
        $query_call = "SELECT COUNT(*) FROM `scroll_call` WHERE `status`='2' OR `status`='0' OR `status`='5'";
        $res_call = mysql_query($query_call) or die(mysql_error());
        $result_call = mysql_fetch_array($res_call);

        $query_preorder = "SELECT COUNT(*) FROM `scroll_call` WHERE `status`='8'";
        $res_preorder = mysql_query($query_preorder) or die(mysql_error());
        $result_preorder = mysql_fetch_array($res_preorder);

        $query_made = "SELECT COUNT(*) FROM `scroll_call` WHERE `status`='9'";
        $res_made = mysql_query($query_made) or die(mysql_error());
        $result_made = mysql_fetch_array($res_made);

        $query_deliv = "SELECT COUNT(*) FROM `scroll_call` WHERE `status`='7'";
        $res_deliv = mysql_query($query_deliv) or die(mysql_error());
        $result_deliv = mysql_fetch_array($res_deliv);


        $query_delivery = "SELECT COUNT(*) FROM `scroll_call` WHERE `status`='10'";
        $res_delivery = mysql_query($query_delivery) or die(mysql_error());
        $result_delivery = mysql_fetch_array($res_delivery);

        $query_designed = "SELECT COUNT(*) FROM `scroll_call` WHERE `status`='13'";
        $res_designed = mysql_query($query_designed) or die(mysql_error());
        $result_designed = mysql_fetch_array($res_designed);

        $query_close = "SELECT COUNT(*) FROM `scroll_call` WHERE `status`='11'";
        $res_close = mysql_query($query_close) or die(mysql_error());
        $result_close = mysql_fetch_array($res_close);

        $query_back = "SELECT COUNT(*) FROM `scroll_call` WHERE `status`='12'";
        $res_back = mysql_query($query_back) or die(mysql_error());
        $result_back = mysql_fetch_array($res_back);

        $query_del = "SELECT COUNT(*) FROM `scroll_call` WHERE `status`='99'";
        $res_del = mysql_query($query_del) or die(mysql_error());
        $result_del = mysql_fetch_array($res_del);
        ?>


        "dataProvider": [{
            "country": "Звонок",
            "visits": <?php echo $result_call[0];?>,
            "color": "#FF0F00"
        }, {
            "country": "Предзаказ",
            "visits": <?php echo $result_preorder[0];?>,
            "color": "#FF6600"
        }, {
            "country": "Готов",
            "visits": <?php echo $result_made[0];?>,
            "color": "#FF9E01"
        }, {
            "country": "Отгрузка",
            "visits": <?php echo $result_deliv[0];?>,
            "color": "#FCD202"
        }, {
            "country": "Отгружен",
            "visits": <?php echo $result_delivery[0];?>,
            "color": "#F8FF01"
        }, {
            "country": "Рассчитан",
            "visits": <?php echo $result_designed[0];?>,
            "color": "#009933"
        }, {
            "country": "Закрыт",
            "visits": <?php echo $result_close[0];?>,
            "color": "#B0DE09"
        }, {
            "country": "Возврат",
            "visits": <?php echo $result_back[0];?>,
            "color": "#04D215"
        },   {
            "country": "Удален",
            "visits": <?php echo $result_del[0];?>,
            "color": "#CD0D74"
        }],
        "valueAxes": [{
            "axisAlpha": 0,
            "position": "left",
            "title": "Колличество заказов"
        }],
        "startDuration": 1,
        "graphs": [{
            "balloonText": "<b>[[category]]: [[value]]</b>",
            "fillColorsField": "color",
            "fillAlphas": 0.9,
            "lineAlpha": 0.2,
            "type": "column",
            "valueField": "visits"
        }],
        "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
        },
        "categoryField": "country",
        "categoryAxis": {
            "gridPosition": "start",
            "labelRotation": 45
        },
        "export": {
            "enabled": true
        }

    });


</script>

<script type="text/javascript">
    var chart = AmCharts.makeChart( "chartdiv", {
        "type": "pie",
        "theme": "light",
        "dataProvider": [

            <?php
            $query = "SELECT * FROM `users` WHERE `access`='2'";
			$res = mysql_query($query) or die(mysql_error());
					while ($result = mysql_fetch_array($res))
						{

                            $query_count = "SELECT COUNT(*) FROM `scroll_call` WHERE `status` IN (0,2,5) AND `manager`='".$result['id']."'";
                            $res_count = mysql_query($query_count) or die(mysql_error());
                            $result_count = mysql_fetch_array($res_count);
                            $number=str_pad($result['id'], 3, '0', STR_PAD_LEFT);

                            echo "{";
                            echo '"country": "'.$result['login'].' ['.$number.']",';
                            echo '"value": '. $result_count[0].',';
                            echo '"color" : "'.$result['color'].'"';
                            echo '},';

						}
            ?>
        ],
        "valueField": "value",
        "titleField": "country",
        "colorField": "color",
        "outlineAlpha": 0.4,
        "depth3D": 20,
        "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
        "angle": 30,
        "export": {
            "enabled": true
        }
    } );

    var chart = AmCharts.makeChart( "chartdiv_preorder", {
        "type": "pie",
        "theme": "light",
        "dataProvider": [
            <?php
            $query = "SELECT * FROM `users` WHERE `access`='2'";
			$res = mysql_query($query) or die(mysql_error());
					while ($result = mysql_fetch_array($res))
						{

                            $query_count = "SELECT COUNT(*) FROM `scroll_call` WHERE `status`='8' AND `manager`='".$result['id']."'";
                            $res_count = mysql_query($query_count) or die(mysql_error());
                            $result_count = mysql_fetch_array($res_count);
                            $number=str_pad($result['id'], 3, '0', STR_PAD_LEFT);

                            echo "{";
                            echo '"country": "'.$result['login'].' ['.$number.']",';
                            echo '"visits": '. $result_count[0].',';
                            echo '"color" : "'.$result['color'].'"';
                            echo '},';

						}
            ?>
        ],
        "valueField": "visits",
        "titleField": "country",
        "colorField": "color",
        "startEffect": "elastic",
        "startDuration": 2,
        "labelRadius": 15,
        "innerRadius": "50%",
        "depth3D": 10,
        "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
        "angle": 15,
        "export": {
            "enabled": true
        }
    } );
    jQuery( '.chart-input' ).off().on( 'input change', function() {
        var property = jQuery( this ).data( 'property' );
        var target = chart;
        var value = Number( this.value );
        chart.startDuration = 0;

        if ( property == 'innerRadius' ) {
            value += "%";
        }

        target[ property ] = value;
        chart.validateNow();
    } );
</script>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

        var data = google.visualization.arrayToDataTable([

        ]);

        var options = {
            pieHole: 0.5,
            pieSliceTextStyle: {
                color: 'black',
            },
            legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
        chart.draw(data, options);
    }
</script>
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
    <div class="title"><h5>Рабочий стол</h5></div>

        <div class="stats">
            <ul>
                <li><a href="/my_call.php" class="count grey" title=""><?php return_status_count(0,$_SESSION['id']);?></a><span>Мои<br>звонки</span></li>

                <li><a href="/preorder_list.php" class="count blue" title=""><?php return_status_count(8,$_SESSION['id']);?></a><span>Пред-<br>заказы</span></li>
                <li><a href="/closed_orders.php" class="count green" title=""><?php return_status_count(11,$_SESSION['id']);?></a><span>Закрытые<br>заказы</span></li>
                <li class="last"><a href="/return_orders_base_themplate.php" class="count red" title=""><?php return_status_count(14,$_SESSION['id']);?></a><span>Возврат<br>(База)</span></li>
            </ul>
        </div>

        <form method="POST" id="check_status" action="javascript:void(null);" onsubmit="check_status()" class="mainForm">
            <fieldset>
                <div class="widget first">
                    <div class="head"><h5 class="iList">Проверка статуса заказа</h5></div>
                    <div class="rowElem noborder"><label>Номер заказа:</label><div class="formRight"><input type="text"  style="width: 38%;" name="number"/><input type="submit" style="margin-left: 10px;" value="Проверить" class="greenBtn" /><input type="text" disabled style="width: 38%;margin-left: 10px;text-align: center;" id="status"/></div></div>
                    <div id="result"></div>
                </div>
            </fieldset>
        </form>


        <div class="widget first">
            <div class="head"><h5 class="iCreate">Звонки</h5></div>
            <div class="body">
                <center><div id="chartdiv"></div></center>
            </div>
        </div>
        <div class="widget">
            <div class="head"><h5 class="iCreate">Предзаказы</h5></div>
            <div class="body">
                <center><div id="chartdiv_preorder"></div></center>
            </div>
        </div>
        <div class="widget">
            <div class="head"><h5 class="iCreate">Статусы</h5></div>
            <div class="body">
                <center><div id="chartdiv_status"></div></center>
            </div>
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
