<?php
include '../include/config.php';

$target=$_REQUEST['target'];

if($target=="1")
    {
        $header=$_POST['header'];
        $message=$_POST['message'];
        $author=$_REQUEST['user'];

        $access=$_REQUEST['access'];
        $users=$_REQUEST['users'];

        $familiarization=''.$author.'|';

        $uploaddir = '../img/information/';
        $uploadfile = $uploaddir.basename($_FILES['photo']['name'][0]);
        copy($_FILES['photo']['tmp_name'][0], $uploadfile);
        $message=$message.'<br><br><center>Открыть: <a href="/img/information/'.$_FILES['photo']['name'][0].'">'.$_FILES['photo']['name'][0].'</a></center>';

        $query = "INSERT INTO information_message (`author`,`header`,`content`,`familiarization`,`access`,`users`) VALUES ('".$author."','".$header."','".$message."','".$familiarization."','".$access."','".$users."')";
        $res = mysql_query($query);

        echo '<script language="JavaScript"> window.location.href = "/instructions.php"</script>';
        echo "<script>$.jGrowl('Указание создано!');</script>";
    }
elseif($target=="2")
    {
        $user=$_REQUEST['user'];
        $id=$_REQUEST['id'];

        $familiarization=''.$user.'|';

        $query = "UPDATE `information_message` SET `familiarization`=concat(familiarization,'".$familiarization."') WHERE id='".$id."'";
        $res = mysql_query($query);
        echo mysql_errno() . ": " . mysql_error(). "\n";

        echo "<script>$.jGrowl('Вы указали что ознкомились с указанием!');document.getElementById('num_".$id."').style.display = 'none';</script>";
    }