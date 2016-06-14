<?php 
include 'include/themplate/header.php';
if($_SESSION['id']!="" & $_SESSION['access']=="1" || $_SESSION['access']=="2")
{
$id=$_GET['id'];
$query = "SELECT * FROM `disassembly_parts` WHERE id='".$id."'";
$res = mysql_query($query) or die(mysql_error());
$result = mysql_fetch_array($res);

$query_subcategory = "SELECT * FROM `disassembly_category` WHERE id='".$result['category']."'";
$res_subcategory = mysql_query($query_subcategory) or die(mysql_error());
$result_subcategory = mysql_fetch_array($res_subcategory);
$category=$result_subcategory['name'];

$query_brand = "SELECT * FROM `disassembly_brand` WHERE id='".$result['auto_brand']."'";
$res_brand = mysql_query($query_brand) or die(mysql_error());
$result_brand = mysql_fetch_array($res_brand);
$brand=$result_brand['name'];

$query_model = "SELECT * FROM `disassembly_model` WHERE id='".$result['auto_model']."'";
$res_model = mysql_query($query_model) or die(mysql_error());
$result_model = mysql_fetch_array($res_model);
$model=$result_model['name'];

$article=str_pad($result['article'], 9, "0", STR_PAD_LEFT);
?>
</head>
<body>
<?php 
include 'include/themplate/top_band.php'; 
include 'include/themplate/top_menu.php'; 
?>
<!-- Content wrapper -->
<div class="wrapper">

    <!-- Content -->
    <div class="content" style="width: 100%">
    	<div class="title"><h5>Запчасти</h5></div>

        <!-- Widgets -->
        <div class="fluid">
            <!-- Right widgets -->
                <!-- User widget -->
                <div class="widget" style="margin-top: 10px;">
                    <div class="head">
                        <div class="userWidget">
                          <a href="#" title="" class="userLink"><?php echo $result['name'];?></a>
                        </div>
                        <!--
                        <div class="num">
                            <a href="#" class="redNum">Удалить</a>
                            <a href="#" class="greenNum">Изменить</a>
						</div>
						-->
                    </div>
                    <div style="padding:20px;"><center><img style="    width: 958px;" src="<?php echo $result['auto_photo'];?>" /></center></div>
                    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
                        <tbody>
                            <tr>
                                <td width="50%">Артикул:</td>
                                <td align="right"><strong class="red">#<?php echo $article;?></strong></td>
                            </tr>
                            <tr>
                                <td>Категория:</td>
                                <td align="right"><strong><?php echo $category;?></strong></td>
                            </tr>
                            <tr>
                                <td>Ключевые слова:</td>
                                <td align="right"><?php echo $result['meta_key'];?></td>
                            </tr>
                            <tr>
                                <td>Марка автомобиля:</td>
                                <td align="right"><?php echo $brand;?></td>
                            </tr>
                            <tr>
                                <td>Модель автомобиля:</td>
                                <td align="right"><?php echo $model;?></td>
                            </tr>
                            <tr>
                                <td>Год выпуска:</td>
                                <td align="right"><?php echo $result['auto_year'];?></td>
                            </tr>
                            <?php if($_SESSION['access']=="1"){?>
                            <tr>
                                <td>Прайс #1:</td>
                                <td align="right"><input style="background: #fff;width: 78%;border: 1px solid #d5d5d5;padding: 7px;font-size: 11px;font-family: Arial, Helvetica, sans-serif;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;-ms-box-sizing: border-box;box-sizing: border-box;margin-right: 10px;" value="<?php echo $result['price_one'];?>" id="price_one" name="price_one"><input type="submit" onclick="parts_price(1,<?php echo $result['id'];?>);" value="Сохранить" class="greenBtn" /></td>
                            </tr>
                            <tr>
                                <td>Прайс #2:</td>
                                <td align="right"><input style="background: #fff;width: 78%;border: 1px solid #d5d5d5;padding: 7px;font-size: 11px;font-family: Arial, Helvetica, sans-serif;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;-ms-box-sizing: border-box;box-sizing: border-box;margin-right: 10px;" value="<?php echo $result['price_two'];?>" id="price_two" name="price_two"><input type="submit" onclick="parts_price(2,<?php echo $result['id'];?>);" value="Сохранить" class="greenBtn" /></td>
                            </tr>
                            <tr>
                                <td>Прайс #3:</td>
                                <td align="right"><input style="background: #fff;width: 78%;border: 1px solid #d5d5d5;padding: 7px;font-size: 11px;font-family: Arial, Helvetica, sans-serif;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;-ms-box-sizing: border-box;box-sizing: border-box;margin-right: 10px;" value="<?php echo $result['price_three'];?>" id="price_three" name="price_three"><input type="submit" onclick="parts_price(3,<?php echo $result['id'];?>);" value="Сохранить" class="greenBtn" /></td>
                            </tr>
                            <tr>
                                <td>Колличество:</td>
                                <td align="right"><input style="background: #fff;width: 78%;border: 1px solid #d5d5d5;padding: 7px;font-size: 11px;font-family: Arial, Helvetica, sans-serif;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;-ms-box-sizing: border-box;box-sizing: border-box;margin-right: 10px;" value="<?php echo $result['count'];?>" id="count" name="count"><input type="submit" onclick="parts_price(4,<?php echo $result['id'];?>);" value="Сохранить" class="greenBtn" /></td>
                            </tr>
                            <?php }else{ ?>
                                <tr>
                                    <td>Прайс #1:</td>
                                    <td align="right"><?php if($result['price_one']!="" && $result['price_one']!="0"){echo $result['price_one'].' ₴';}else{echo 'Не указано!';}?> </td>
                                </tr>
                                <tr>
                                    <td>Прайс #2:</td>
                                    <td align="right"><?php if($result['price_two']!="" && $result['price_two']!="0"){echo $result['price_two'].' ₴';}else{echo 'Не указано!';}?></td>
                                </tr>
                                <tr>
                                    <td>Прайс #3:</td>
                                    <td align="right"><?php if($result['price_three']!="" && $result['price_three']!="0"){echo $result['price_three'].' ₴';}else{echo 'Не указано!';}?></td>
                                </tr>
                                <tr>
                                    <td>Колличество:</td>
                                    <td align="right"><?php if($result['count']!="" && $result['count']!="0"){echo $result['count'].' шт.';}else{echo 'Не указано!';}?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td>Описание детали:</td>
                                <td align="right"><?php echo $result['comment'];?></td>
                            </tr>
                            <tr>
                                <td>Дата добавления:</td>
                                <td align="right"><?php echo $result['add_date'];?></td>
                            </tr>
                        </tbody>
                    </table>
                                       
                </div>

        </div>


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
