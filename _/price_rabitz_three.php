<?php
echo $_SESSION['id'];
include 'include/themplate/header.php';
if($_SESSION['id']!="" || $_SESSION['id']==""){
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
    	<div class="title"><h5>Прайс лист (Рабица) <?php if($_SESSION['access']==1){echo '#3';}?></h5></div>
    	<div class="widget" style="width: 100%;margin-top: 10px;">
            <div class="tabs">
                <ul>
                    <li><a href="price_rabitz_three.php#tabs-1">10-ка</a></li>
                    <li><a href="price_rabitz_three.php#tabs-2">15-ка</a></li>
                    <li><a href="price_rabitz_three.php#tabs-3">20-ка</a></li>
                    <li><a href="price_rabitz_three.php#tabs-4">25-ка</a></li>
                    <li><a href="price_rabitz_three.php#tabs-5">35-ка</a></li>
                    <li><a href="price_rabitz_three.php#tabs-6">45-ка</a></li>
                    <li><a href="price_rabitz_three.php#tabs-7">55-ка</a></li>
                    <li><a href="price_rabitz_three.php#tabs-8">65-ка</a></li>
                    <li><a href="price_rabitz_three.php#tabs-9">70-ка</a></li>
                    <li><a href="price_rabitz_three.php#tabs-10">100-ка</a></li>
                </ul>
                <div id="tabs-1">
                     <?php echo_price_three(10);?>
                </div>
                <div id="tabs-2">
                     <?php echo_price_three(15);?>
                </div>
                <div id="tabs-3">
                     <?php echo_price_three(20);?>
                </div>
                <div id="tabs-4">
                     <?php echo_price_three(25);?>
                </div>
                <div id="tabs-5">
                     <?php echo_price_three(35);?>
                </div>
                <div id="tabs-6">
                     <?php echo_price_three(45);?>
                </div>
                <div id="tabs-7">
                     <?php echo_price_three(55);?>
                </div>
                <div id="tabs-8">
                     <?php echo_price_three(65);?>
                </div>
                <div id="tabs-9">
                     <?php echo_price_three(70);?>
                </div>
                <div id="tabs-10">
                     <?php echo_price_three(100);?>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="result"></div>
<?php
include 'include/themplate/footer.php';}else{echo '<script language="JavaScript"> window.location.href = "/index.php"</script>';}
?>