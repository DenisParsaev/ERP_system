<?php
    include 'include/themplate/header.php';
    if($_SESSION['id'] != "")
        {

?>
</head>
<body>
<?php
    include 'include/themplate/top_band.php';
    include 'include/themplate/top_menu.php';
?>
<div class="wrapper">
    <div class="content" style="width: 100%">
        <div class="title">
            <h5>Запчасти</h5>
        </div>
        <form id="sp" target="p_a" action="/function/add_auto_parts.php" method="POST" enctype="multipart/form-data" class="mainForm">
            <input type="hidden" name="act" value="upf">
            <fieldset>
                <div class="widget first">
                    <div class="head">
                        <h5 class="iList">Добавить деталь</h5>
                    </div>
                    <div class="rowElem noborder">
                        <label>Название:</label>
                        <div class="formRight">
                            <input required type="text" name="name"/>
                        </div>
                    </div>
                    <div class="rowElem">
                        <label>Категория:</label>
                        <div class="formRight">
                            <select required style="width:512px;" data-placeholder="Выберите марку..." class="select" name="category" tabindex="2">
                                <option value=""></option>
                                <?php
                                    $query = "SELECT * FROM `disassembly_category`";
                                    $res = mysql_query($query) or die(mysql_error());
                                    while ($result = mysql_fetch_array($res))
                                        {
                                            echo '<option value="' . $result['id'] . '">' . $result['name'] . '</option> ';
                                        }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="rowElem">
                        <label>Ключевые слова:</label>
                        <div class="formRight">
                            <textarea required rows="8" cols="" class="auto" name="meta"></textarea>
                        </div>
                    </div>
                    <div class="rowElem">
                        <label>Марка автомобиля:</label>
                        <div class="formRight">
                            <select required style="width:512px;" data-placeholder="Выберите марку..." class="select"
                                    name="brand" tabindex="2">
                                <option value=""></option>
                                <?php
                                $query = "SELECT * FROM `disassembly_brand`";
                                $res = mysql_query($query) or die(mysql_error());
                                while ($result = mysql_fetch_array($res)) {

                                    echo '<option value="' . $result['id'] . '">' . $result['name'] . '</option> ';
                                }

                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="rowElem">
                        <label>Модель автомобиля:</label>
                        <div class="formRight">
                            <select required style="width:512px;" data-placeholder="Выберите модель..." class="select"
                                    name="model" tabindex="2">
                                <option value=""></option>
                                <?php
                                $query = "SELECT * FROM `disassembly_model`";
                                $res = mysql_query($query) or die(mysql_error());
                                while ($result = mysql_fetch_array($res)) {

                                    echo '<option value="' . $result['id'] . '">' . $result['name'] . '</option> ';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="rowElem">
                        <label>Год выпуска:</label>
                        <div class="formRight">
                            <input required style="width:512px;" type="text" id="spinner-default" name="year" value="2000"/>
                        </div>
                    </div>
                    <div class="rowElem">
                        <label>Фотография:</label>
                        <div class="formRight">
                            <input type="file" class="fileInput" name="photo[]" id="fileInput"/>
                        </div>
                    </div>
                    <div class="rowElem">
                        <label>Описание детали:</label>
                        <div class="formRight">
                            <textarea required rows="8" cols="" class="auto" name="comment"></textarea>
                        </div>
                    </div>

                    <div class="submitForm"><input type="button"
                                                   onclick="javascript:with(document.getElementById('sp')){submit()};document.getElementById('p_a').style.height = '100px';"
                                                   value="Добавить деталь" class="greenBtn"/></div>
                    <iframe name="p_a" id="p_a" style="" frameborder="0" src="/function/add_auto_parts.php" width="100%"
                            height="0" scrolling="no"></iframe>
                </div>

            </fieldset>
        </form>

        <!-- Таблица запчастей -->
        <div class="table">
            <div class="head"><h5 class="iFrames">Детали</h5></div>
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                <thead>
                <tr>
                    <th>Артикул</th>
                    <th>Фото</th>
                    <th>Автомобиль</th>
                    <th>Наименование</th>
                    <? if($_SESSION['access']!=4){ ?>
                    <th>Прайс #1</th>
                    <th>Прайс #2</th>
                    <th>Прайс #3</th>
                    <? } ?>
                    <th>Кол-во</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $query = "SELECT * FROM `disassembly_parts`";
                $res = mysql_query($query) or die(mysql_error());
                while ($result = mysql_fetch_array($res)) {

                    $article = str_pad($result['article'], 9, "0", STR_PAD_LEFT);

                    if($result['price_one']!="" && $result['price_one']!="0") {$price_one='' . $result['price_one'] . ' ₴';} else {$price_one="Не указана";}
                    if($result['price_two']!="" && $result['price_two']!="0") {$price_two='' . $result['price_two'] . ' ₴';} else {$price_two="Не указана";}
                    if($result['price_three']!="" && $result['price_three']!="0") {$price_three='' . $result['price_three'] . ' ₴';} else {$price_three="Не указана";}
                    if($result['count']!="") {$count=$result['count'];} else {$count="Не указано";}

                    $query_brand = "SELECT * FROM `disassembly_brand` WHERE id='".$result['auto_brand']."'";
                    $res_brand = mysql_query($query_brand) or die(mysql_error());
                    $result_brand = mysql_fetch_array($res_brand);
                    $brand=$result_brand['name'];

                    $query_model = "SELECT * FROM `disassembly_model` WHERE id='".$result['auto_model']."'";
                    $res_model = mysql_query($query_model) or die(mysql_error());
                    $result_model = mysql_fetch_array($res_model);
                    $model=$result_model['name'];

                    if($_SESSION['responsibility']!="1")
                    {
                    echo '<tr class="gradeA">
                          <td style="vertical-align: middle" ><center><a href="/info_parts.php?id=' . $result['id'] . '" title="">#' . $article . '</a></center></td>
                          <td style="vertical-align: middle" ><center><img width="100px" height="100px;" src="' . $result['auto_photo'] . '"/></center></td>
						  <td style="vertical-align: middle" ><center>' . $brand . ' ' . $model . '</center></td>
						  <td style="vertical-align: middle" ><center>' . $result['name'] . '</center></td>
                          <td style = "vertical-align: middle" ><center > '.$price_one.'</center ></td >
						  <td style = "vertical-align: middle" ><center > '.$price_two.'</center ></td >
						  <td style = "vertical-align: middle" ><center > '.$price_three.'</center ></td >
						  <td style="vertical-align: middle" ><center>' . $count . ' шт.</center></td>
                    </tr>';
                    }
                    else
                    {
                        echo '<tr class="gradeA">
                          <td style="vertical-align: middle" ><center><a href="/info_parts.php?id=' . $result['id'] . '" title="">#' . $article . '</a></center></td>
                          <td style="vertical-align: middle" ><center><img width="100px" height="100px;" src="' . $result['auto_photo'] . '"/></center></td>
						  <td style="vertical-align: middle" ><center>' . $brand . ' ' . $model . '</center></td>
						  <td style="vertical-align: middle" ><center>' . $result['name'] . '</center></td>
						  <td style="vertical-align: middle" ><center>' . $count . ' шт.</center></td>
                    </tr>';
                    }

                }

                ?>
                </tbody>
            </table>
        </div>


    </div>
</div>
</div>

<?php
include 'include/themplate/footer.php';
}
else {
    echo '<script language="JavaScript"> window.location.href = "/index.php"</script>';
}
?>
