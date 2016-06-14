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
            <div class="head"><h5 class="iComputer">Перечень сертификатов</h5></div>
            <div class="body aligncenter">
                <a href="" title="Договор №1" alt="Договор №1"><img src="images/word.png" alt="" class="mr15" /></a>
                <a href="" title="Договор №2" alt="Договор №2"><img src="images/word.png" alt="" class="mr15" /></a>
                <a href="" title="Договор №3" alt="Договор №3"><img src="images/word.png" alt="" class="mr15" /></a>
                <a href="" title="Договор №4" alt="Договор №4"><img src="images/word.png" alt="" class="mr15" /></a>
                <a href="" title="Договор №5" alt="Договор №5"><img src="images/word.png" alt="" class="mr15" /></a>
                <a href="" title="Договор №6" alt="Договор №6"><img src="images/word.png" alt="" class="mr15" /></a>
                <a href="" title="Договор №7" alt="Договор №7"><img src="images/word.png" alt="" class="mr15" /></a>
                <a href="" title="Договор №8" alt="Договор №8"><img src="images/word.png" alt="" class="mr15" /></a>
                <a href="" title="Договор №9" alt="Договор №9"><img src="images/word.png" alt="" class="mr15" /></a>
                <a href="" title="Договор №10" alt="Договор №10"><img src="images/word.png" alt="" class="mr15" /></a>
                <a href="" title="Договор №11" alt="Договор №11"><img src="images/word.png" alt="" class="mr15" /></a>
                <a href="" title="Договор №12" alt="Договор №12"><img src="images/word.png" alt="" class="mr15" /></a>
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
