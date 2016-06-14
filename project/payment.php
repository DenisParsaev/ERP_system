<?php
include 'include/themplate/header.php';
if($_SESSION['id']!="")
{
?>
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
        <div class="widget first">
            <div class="head"><h5 class="iComputer">Перечень болванок</h5></div>
            <div class="body aligncenter">
                <a href="" title="Рассчетный счет №1" alt="Рассчетный счет №1"><img src="images/excel.png" alt="" class="mr15" /></a>
                <a href="" title="Рассчетный счет №2" alt="Рассчетный счет №2"><img src="images/excel.png" alt="" class="mr15" /></a>
                <a href="" title="Рассчетный счет №3" alt="Рассчетный счет №3"><img src="images/excel.png" alt="" class="mr15" /></a>
                <a href="" title="Рассчетный счет №4" alt="Рассчетный счет №4"><img src="images/excel.png" alt="" class="mr15" /></a>
                <a href="" title="Рассчетный счет №5" alt="Рассчетный счет №5"><img src="images/excel.png" alt="" class="mr15" /></a>
                <a href="" title="Рассчетный счет №6" alt="Рассчетный счет №6"><img src="images/excel.png" alt="" class="mr15" /></a>
                <a href="" title="Рассчетный счет №7" alt="Рассчетный счет №7"><img src="images/excel.png" alt="" class="mr15" /></a>
                <a href="" title="Рассчетный счет №8" alt="Рассчетный счет №8"><img src="images/excel.png" alt="" class="mr15" /></a>
                <a href="" title="Рассчетный счет №9" alt="Рассчетный счет №9"><img src="images/excel.png" alt="" class="mr15" /></a>
                <a href="" title="Рассчетный счет №10" alt="Рассчетный счет №10"><img src="images/excel.png" alt="" class="mr15" /></a>
                <a href="" title="Рассчетный счет №11" alt="Рассчетный счет №11"><img src="images/excel.png" alt="" class="mr15" /></a>
                <a href="" title="Рассчетный счет №12" alt="Рассчетный счет №12"><img src="images/excel.png" alt="" class="mr15" /></a>
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
