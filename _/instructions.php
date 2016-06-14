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
        <!-- Headings -->
        <?php if($_SESSION['access']=="1"){?>
        <div class="widget first">

            <form  action="/function/add_message.php" method="POST" enctype="multipart/form-data" class="mainForm">
                        <div class="head"><h5 class="iList">Добавить информационное сообщение</h5></div>
                        <div class="rowElem noborder"><label>Заголовок:</label><div class="formRight"><input type="text" name="header"/></div></div>
                        <div class="rowElem"><label>Сообщение:</label><div class="formRight"><textarea rows="8" cols="" name="message"></textarea></div></div>
                        <div class="rowElem">
                            <label>Фото :</label>
                            <div class="formRight">
                                <input type="file" class="fileInput" name="photo[]" id="fileInput" />
                            </div>
                        </div>
                        <div class="rowElem">
                            <label>Направление :</label>
                            <div class="formRight">
                                <input type="radio" id="radio1" name="direction" onclick="document.getElementById('users').style.display = '';document.getElementById('access').style.display = 'none';" /><label for="radio1">Сотрудник</label>
                                <input type="radio" id="radio2" name="direction" onclick="document.getElementById('access').style.display = '';document.getElementById('users').style.display = 'none';" /><label for="radio2">Группа сотрудников</label>
                            </div>
                        </div>

                        <div class="rowElem" id="access" style="display: none;">
                            <label>Группа:</label>
                            <div class="formRight">
                                <select style="width:512px;" data-placeholder="Выберите группу..." class="select" name="access" tabindex="2">
                                    <option value=""></option>
                                    <?php
                                    $query = "SELECT * FROM `access`";
                                    $res = mysql_query($query) or die(mysql_error());
                                    while ($result = mysql_fetch_array($res)) {

                                        echo '<option value="'.$result['id'].'">'.$result['name'].'</option> ';
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="rowElem" id="users" style="display: none;">
                            <label>Сотрудник:</label>
                            <div class="formRight">
                                <select style="width:512px;" data-placeholder="Выберите пользователя..." class="select" name="users" tabindex="2">
                                    <option value=""></option>
                                    <?php
                                    $query = "SELECT * FROM `users`";
                                    $res = mysql_query($query) or die(mysql_error());
                                    while ($result = mysql_fetch_array($res)) {

                                        echo '<option value="'.$result['id'].'">'.$result['full_name'].'</option> ';
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>

                        <input type="hidden" name="target" value="1">
                        <input type="hidden" name="user" value="<?php echo $_SESSION['id'];?>">
                        <div class="submitForm"><input type="submit" value="Добавить сообщение" class="greenBtn" /></div>
            </form>

        </div>
        <?php } ?>
<?php
$query = "SELECT * FROM `information_message`";
$res = mysql_query($query) or die(mysql_error());
while ($result = mysql_fetch_array($res))
{
    if($_SESSION['id']==$result['users'] || $_SESSION['access']==$result['access'])
        {
            $manager=$result['author'];
            $query_manager = "SELECT login FROM `users` WHERE id='".$manager."'";
            $res_manager = mysql_query($query_manager) or die(mysql_error());
            $result_manager = mysql_fetch_array($res_manager);
            $manager=$result_manager['login'];


            $key=strripos($result['familiarization'], '|'.$_SESSION['id'].'|');
            if ($key === false) {
                $echo="<div id='num_".$result['id']."' class='num'><a onclick='familiar_user(".$result['id'].",".$_SESSION['id'].",2)' class='redNum'>Ознакомлен(а)</a></div>";
            } else {
                $echo="";
            }
            echo '<div class="widget">
            <div class="head"><h5 class="iCreate">'.$result['date_add'].' '.$result['header'].' ['.$manager.'] </h5>'.$echo.'</div>
            <div class="body">
                <p>'.$result['content'].'</p>
            </div>
        </div>';
        }
}
?>


    </div>
</div>
<div id="result"></div>
<?php
include 'include/themplate/footer.php';
}
else
{
    echo '<script language="JavaScript"> window.location.href = "/index.php"</script>';
}
?>
