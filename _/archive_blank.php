<?php
include 'include/themplate/header.php';
if($_SESSION['id']!="" && $_SESSION['access']!="3")
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
        <div class="title"><h5>Архив бланков отгрузки</h5></div>

        <!-- Tables inside tabs -->
        <div class="widget first rightTabs">
            <div class="head"><h5 class="iFrames">Печерень бланков</h5></div>
            <div class="tabs">
                <ul>
                    <li><a href="archive_blank.php#tab1">Отгрузка</a></li>
                </ul>
                <div id="tab1" class="nopadding">
                    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
                        <thead>
                        <tr>
                            <td width="10%">№</td>
                            <td width="25%">Дата</td>
                            <td width="65%">Файл</td>
                        </tr>
                        </thead>
                        <tbody>
                            <?php archive_blank_shipping();?>
                        </tbody>
                    </table>
                </div>
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
