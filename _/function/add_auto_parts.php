<?php
include '../include/config.php';
include '../include/themplate/header.php';

$query = "SELECT COUNT(*) FROM disassembly_parts";
$res = mysql_query($query) ;
$row = mysql_fetch_array($res);
$count=$row[0];

$name_file=$count+1;
$name_file=str_pad($name_file, 9, "0", STR_PAD_LEFT);

$uploaddir = '../img/parts/';
$filename = ''.$name_file.'.jpg';
$uploadfile = $uploaddir.basename($filename);

if(copy($_FILES['photo']['tmp_name'][0], $uploadfile))
	{
		$name=$_POST['name'];
		$category=$_POST['category'];
		$meta=$_POST['meta'];
		$brand=$_POST['brand'];
		$model=$_POST['model'];
		$year=$_POST['year'];
		$comment=$_POST['comment'];
        $uploadfile = substr($uploadfile, 2);

        if($name!="" && $category!="" && $category!="" && $meta!="" && $brand!="" && $model!="" && $year!="" && $comment!="")
			{
				$query = "INSERT INTO disassembly_parts (`article`,`name`,`category`,`meta_key`,`auto_brand`,`auto_model`,`auto_year`,`auto_photo`,`count`,`comment`) VALUES('".$name_file."','".$name."','".$category."','".$meta."','".$brand."','".$model."','".$year."','".$uploadfile ."','".$count."','".$comment."')";
				$res = mysql_query($query) ;
				$row = mysql_fetch_array($res);
				if($res==1)
					{
						echo '<center><div class="nNote nSuccess hideit" style="width: 940px;"><p><strong>Успех: </strong>Деталь '.$name.' успешно добавлена!</p></div></center>';
					}
				else
					{
						echo '<center><div class="nNote nFailure  hideit" style="width: 940px;"><p><strong>Ошибка: </strong>Свяжитесь с администратором!</p></div></center>';
					}
			}
		else
			{
				echo '<center><div class="nNote nFailure  hideit" style="width: 940px;"><p><strong>Ошибка: </strong>Введены не все данные!</p></div></center>';
			}
	}
else
	{
		$uploadfile="/img/no-image.png";
		$name=$_POST['name'];
		$category=$_POST['category'];
		$meta=$_POST['meta'];
		$brand=$_POST['brand'];
		$model=$_POST['model'];
		$year=$_POST['year'];
		$comment=$_POST['comment'];

		if($name!="" && $category!="" && $category!="" && $meta!="" && $brand!="" && $model!="" && $year!="" && $comment!="")
			{
				$query = "INSERT INTO disassembly_parts (`article`,`name`,`category`,`meta_key`,`auto_brand`,`auto_model`,`auto_year`,`auto_photo`,`count`,`comment`) VALUES('".$name_file."','".$name."','".$category."','".$meta."','".$brand."','".$model."','".$year."','".$uploadfile ."','".$count."','".$comment."')";
				$res = mysql_query($query) ;
				$row = mysql_fetch_array($res);
				if($res==1)
					{
						echo '<center><div class="nNote nSuccess hideit" style="width:width: 940px;"><p><strong>Успех: </strong>Деталь '.$name.' успешно добавлена!</p></div></center>';
					}
				else
					{
						echo '<center><div class="nNote nFailure  hideit" style="width:width: 940px;"><p><strong>Ошибка: </strong>Свяжитесь с администратором!</p></div></center>';
					}
			}
		else
			{
				echo '<center><div class="nNote nFailure  hideit" style="width: 940px;"><p><strong>Ошибка: </strong>Введены не все данные!</p></div></center>';
			}
	}
?>