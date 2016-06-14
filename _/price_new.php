<?php
echo $_SESSION['id'];
include 'include/themplate/header.php';
if($_SESSION['id']!="" && $_SESSION['access']!="3"){
?>
<style>
.tableStatic tbody td { border-left: 1px solid #e7e7e7; padding: 0px 0px; vertical-align: middle; }
</style>
</head>
<body>
<?php
if($_SESSION['id']!="")
    {
        include 'include/themplate/top_band.php';
        include 'include/themplate/top_menu.php';
    }
?>

<div class="wrapper">
    <div class="content" style="width: 100%;">
    	<div class="title"><h5>Прайс лист (Рабица)</h5></div>
    	<div class="widget" style="width: 100%;">
    	    <input type="button" value="Скачать" class="greenBtn" style="width: 98%;margin-top: 10px;margin-bottom: 10px;margin-left: 10px;" onclick="price_rabica_excell()" />

            <div class="tabs">
                <ul>
                    <li><a href="price_new.php#tabs-1">10-ка</a></li>
                    <li><a href="price_new.php#tabs-2">15-ка</a></li>
                    <li><a href="price_new.php#tabs-3">20-ка</a></li>
                    <li><a href="price_new.php#tabs-4">25-ка</a></li>
                    <li><a href="price_new.php#tabs-5">35-ка</a></li>
                    <li><a href="price_new.php#tabs-6">45-ка</a></li>
                    <li><a href="price_new.php#tabs-7">55-ка</a></li>
                    <li><a href="price_new.php#tabs-8">65-ка</a></li>
                    <li><a href="price_new.php#tabs-9">70-ка</a></li>
                    <li><a href="price_new.php#tabs-10">100-ка</a></li>
                </ul>
                <div id="tabs-1">
                     <?php echo_price(10);?>
                </div>
                <div id="tabs-2">
                     <?php echo_price(15);?>
                </div>
                <div id="tabs-3">
                     <?php echo_price(20);?>
                </div>
                <div id="tabs-4">
                     <?php echo_price(25);?>
                </div>
                <div id="tabs-5">
                     <?php echo_price(35);?>
                </div>
                <div id="tabs-6">
                     <?php echo_price(45);?>
                </div>
                <div id="tabs-7">
                     <?php echo_price(55);?>
                </div>
                <div id="tabs-8">
                     <?php echo_price(65);?>
                </div>
                <div id="tabs-9">
                     <?php echo_price(70);?>
                </div>
                <div id="tabs-10">
                     <?php echo_price(100);?>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="result"></div>
<?php
include 'include/themplate/footer.php';}else{echo '<script language="JavaScript"> window.location.href = "/index.php"</script>';}
?>