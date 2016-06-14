<?php
include 'include/themplate/header.php';
if($_SESSION['id']!="")
{
?>

<script type="text/javascript" language="javascript">
    function add_site() {
        var msg   = $('#add_site').serialize();
        $.ajax({
            type: 'POST',
            url: '/function/add_site.php',
            data: msg,
            success: function(data) {
                $('#result_add_site').html(data);
            },
            error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });

    }
</script>

<script>
    $(document).ready(function()
        {
            var i = 2;
            $('#add').click(function() {
                $('<div class="rowElem" id="field"><input type="text" placeholder="Сайт №' + i + '" style="width:500px;" name="site[]"/><input type="text" placeholder="Логин №' + i + '" style="width:220px;margin-left:3px;" name="login[]"/><input type="text" placeholder="Пароль №' + i + '" style="width:219px;margin-left:3px;" name="passwd[]"/></div></div>').fadeIn('slow').appendTo('.inputs');
                i++;
            });
        });

</script>

<style>
    .formRight {
        float: right;
        width: 756px;
        margin: 12px 0;
        display: block;
        position: relative;
    }

</style>
</head>
<body>
<?php
include 'include/themplate/top_band.php';
include 'include/themplate/top_menu.php';
?>
<div class="wrapper">
    <div class="content" style="width: 100%;">
        <div class="title"><h5>Перечень сайтов</h5></div>
        <form method="POST" id="add_site" action="javascript:void(null);" onsubmit="add_site()" class="mainForm">
            <fieldset>
                <div class="widget first">
                    <div class="head"><h5 class="iList">Добавление сайтов</h5></div>
                    <div id="container">
                        <div class="dynamic-form">
                            <div class="inputs">
                                <div class="rowElem noborder" id="field">
                                    <input type="text" placeholder="Сайт №1"  required style="width:500px;" name="site[]"/>
                                    <input type="text" required  placeholder="Логин №1" style="width:220px;" name="login[]"/>
                                    <input type="text" required  placeholder="Пароль №1" style="width:219px;" name="passwd[]"/><br>
                                </div>
                            </div>
                            <div style="margin-left:15px;margin-bottom:10px;">
                                <a   id="add"><input type="button" onclick="" value="Добавить новый сайт" class="greenBtn" style="width:946px;"></a>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="widget">
                    <div class="submitForm">
                        <input type="hidden" name="manager" value="<?php echo $_SESSION['id'];?>"/>
                        <div style="">
                            <center>
                                <input type="submit" value="Добавить сайты" class="greenBtn" style="width:946px;margin-top: 20px;"/>
                            </center>

                        </div>

                    </div>
                    <div id="result_add_site"></div>
                </div>

                <div class="widget">
                    <div class="head"><h5 class="iFrames">Список сайтов</h5></div>
                    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
                        <thead>
                        <tr>
                            <td width="60%">URL</td>
                            <td width="20%">Логин</td>
                            <td width="20%">Пароль</td>
                        </tr>
                        </thead>
                        <tbody>

                                <?php
                                    $query = "SELECT * FROM `users_site` WHERE manager_id='".$_SESSION['id']."'";
                                    $res= mysql_query($query) or die(mysql_error());
                                    while ($result = mysql_fetch_array($res))
                                    {
                                        echo '<tr>';
                                        echo '<td><center>'.$result['url_site'].'</td>';
                                        echo '<td><center>'.$result['site_login'].'</td>';
                                        echo '<td><center>'.$result['site_passwd'].'</td>';
                                        echo '</tr>';
                                    }
                                ?>

                        </tbody>
                    </table>
                </div>
            </fieldset>
        </form>
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
