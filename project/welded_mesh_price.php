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
<?php
include 'include/themplate/menu.php';
?>
    <div class="content" >
    	<div class="title"><h5>Прайс лист (Армосетка)</h5></div>
        <?php
        if($_SESSION['access']!="3")
            {
            if($_SESSION['access']!="4")
                {
        ?>
    	<div class="widget" style="width: 100%;margin-top: 10px;">
            <?php welded_mesh();?>
        </div>
        <?php
                }
            if($_SESSION['access']=="1" || $_SESSION['access']=="4")
                {
        ?>
        <br>
    	<div class="widget" style="width: 100%;margin-top: 10px;">
            <?php welded_mesh_two();?>
        </div>
        <br>
    	<div class="widget" style="width: 100%;margin-top: 10px;">
            <?php welded_mesh_three();?>
        </div>
        <?php
                }
               }else{
                welded_mesh_two();
               }
        ?>
    </div>
</div>
<div id="result"></div>
<?php
include 'include/themplate/footer.php';}else{echo '<script language="JavaScript"> window.location.href = "/index.php"</script>';}
?>