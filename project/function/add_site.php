<?php
include '../include/config.php';
$site=$_POST['site'];
$login=$_POST['login'];
$passwd=$_POST['passwd'];
$manager=$_POST['manager'];

//echo '<pre>';
//print_r($_POST);
//echo '</pre>';

$count_site=count($site);

for($i=0;$i<$count_site;$i++)
    {
        $query = "INSERT INTO users_site (`manager_id`,`url_site`,`site_login`,`site_passwd`)
				  VALUES('".$manager."','".$site[$i]."','".$login[$i]."','".$passwd[$i]."')";
        $res = mysql_query($query) ;
    }

if($res==1)
{
    echo '<center><div class="nNote nSuccess hideit" style="width:943px;"><p><strong>Успех: </strong>Сайты успешно добавлены!</p></div></center>';
}
else
{
    echo '<center><div class="nNote nFailure  hideit" style="width:943px;"><p><strong>Ошибка: </strong>Свяжитесь с администратором!</p></div></center>';
}


?>