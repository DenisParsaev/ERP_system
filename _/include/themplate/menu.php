<?php 
$active=$_SERVER['SCRIPT_NAME'];
?>
<?php if($_SESSION['responsibility']==4){?>
    <div class="leftNav">
        <ul id="menu">
            <li class="wire"><a href="/stock/wire.php" 		<?php if($active=="/stock/wire.php"){echo 'class="active"';} ?> title="" ><span>Проволока</span></a></li>
            <li class="rabiza"><a href="/stock/rabitz.php" 		<?php if($active=="/stock/rabitz.php"){echo 'class="active"';} ?> title="" ><span>Рабица</span></a></li>
        </ul>
        <br>
    </div>
<?php }elseif($_SESSION['responsibility']==1){?>
    <div class="leftNav">
        <ul id="menu">
            <li class="dash"><a href="parts_category.php" <?php if($active=="/parts_category.php"){echo 'class="active"';} ?> title=""><span>Категории запчастей</span></a></li>
            <li class="forms"><a href="car_list.php" 	  <?php if($active=="/car_list.php"){echo 'class="active"';} ?> title=""><span>Список автомобилей</span></a></li>
            <li class="forms"><a href="parts.php" 		  <?php if($active=="/parts.php"){echo 'class="active"';} ?> title=""><span>Каталог запчастей</span></a></li>
        </ul>
    </div>
<?php }else{ ?>
    <div class="leftNav">
        <ul id="menu">
            <li class="dash"><a href="home.php" 		<?php if($active=="/home.php"){echo 'class="active"';} ?> title="" ><span>Рабочий стол</span></a></li>
            <!--<li class="forms"><a href="calculation.php" <?php //if($active=="/calculation.php"){echo 'class="active"';} ?> title=""><span>Рассчет</span></a></li>-->
            <li class="contacts"><a href="contacts.php" <?php if($active=="/contacts.php"){echo 'class="active"';} ?> title=""><span>Сотрудники</span></a></li>
            <!--<li class="widgets"><a href="order.php"     <?php //if($active=="/order.php"){//echo 'class="active"';} ?> title=""><span>Заказы</span></a></li>-->
            <!--<li class="widgets"><a href="preorder_list.php"     <?php //if($active=="/preorder_list.php"){//echo 'class="active"';} ?> title=""><span>Предзаказы</span></a></li>-->

            <li class="cart"><a href="#" title="" class="exp"><span>Заказы</span></a>
                <ul class="sub">
                    <?php
                    if($_SESSION['access']!="3")
                        {
                            echo '<li><a href="order.php" title="">Звонки</a></li>';
                        }
                    echo '<li><a href="preorder_list.php" title="">Предзаказ</a></li>';
                    echo '<li><a href="ready_list.php" title="">Самовывоз | Попутка</a></li>';
                    echo '<li><a href="shipping_blank.php" title="">Бланк отгрузки</a></li>';
					echo '<li><a href="shipping_blank_2.php" title="">Бланк отгрузки 2</a></li>';
                    echo '<li><a href="shipping_form.php" title="">Отгрузка</a></li>';
                    if($_SESSION['access']=="1")
                        {
                            echo '<li><a href="shipped_orders.php" title="">Отгружен</a></li>';
                            echo '<li><a href="calculated_orders.php" title="">Рассчитан</a></li>';;
                        }
                    //echo '<li><a href="closed_orders.php" title="">Закрытые</a></li>';
                    //echo '<li><a href="return_orders.php" title="">Возврат</a></li>';
                    echo '<li><a href="return_orders_base_themplate.php" title="">Возврат (База)</a></li>';
                    if($_SESSION['access']=="1")
                        {
                            echo '<li class="last"><a href="deleted_orders.php" title="">Удаленые</a></li>';

                        }

                    ?>
                </ul>
            </li>
            <li class="calc"><a href="#" title="" class="exp"><span>Прайсы</span></a>
                <ul class="sub">

                    <?php
                        if($_SESSION['access']!="3")
                            {
                                echo '<li><a href="price_new.php" title="">Рабица</a></li>';

                                    echo '<li><a href="price_rabitz_two.php" title="">Рабица №2</a></li>';
                                    echo '<li><a href="price_rabitz_three.php" title="">Рабица №3</a></li>';


                                echo '<li><a href="welded_mesh_price.php" title="">Армосетка</a></li>';
                            }
                        else
                            {
                                echo '<li><a href="price_rabitz_two.php" title="">Рабица</a></li>';
                                echo '<li><a href="welded_mesh_price.php" title="">Армосетка</a></li>';
                            }
                    ?>
                </ul>
            </li>
            <?php

                        echo '<li class="contacts"><a href="prepay_status.php"';
                        if($active=="/prepay_status.php"){echo 'class="active"';}
                        echo 'title=""><span>Предоплаты</span></a></li>';
                        if($_SESSION['access']=='1')
                        {
                            echo '<li class="contacts"><a href="inventory.php"';
                            if($active=="/inventory.php"){echo 'class="active"';}
                            echo 'title=""><span>Инвентаризация</span></a></li>';

                            echo '<li class="contacts"><a href="wallet.php"';
                            if($active=="/wallet.php"){echo 'class="active"';}
                            echo 'title=""><span>Кошелек</span></a></li>';
                        }

            ?>
        </ul>
        <br>
        <img style="margin-left:12px;" src="images/sklad.png" alt="" />
        <br>
        <ul id="menu">
            <li class="wire"><a href="/stock/wire.php" 		<?php if($active=="/stock/wire.php"){echo 'class="active"';} ?> title="" ><span>Проволока</span></a></li>
            <!--<li class="rabiza"><a href="/stock/rabitz.php" 		<?php //if($active=="/stock/rabitz.php"){echo 'class="active"';} ?> title="" ><span>Рабица</span></a></li>
            <li class="arma"><a href="/stock/welded.php" 		<?php //if($active=="/stock/welded.php"){echo 'class="active"';} ?> title="" ><span>Армосетка</span></a></li>-->
        </ul>

        <br>
        <!--<img style="margin-left:12px;" src="images/doc.png" alt="" />
        <br>
        <ul id="menu">
            <li class="doc"><a href="agreement.php" 		<?php //if($active=="/agreement.php"){echo 'class="active"';} ?> title="" ><span>Договора</span></a></li>
            <li class="payment"><a href="payment.php" 		<?php //if($active=="/payment.php"){echo 'class="active"';} ?> title="" ><span>Рассчетные счета</span></a></li>
            <li class="vat"><a href="vat.php" 		<?php //if($active=="/vat.php"){echo 'class="active"';} ?> title="" ><span>НДС бланки</span></a></li>
            <li class="imagesList"><a href="sertificat.php" 		<?php //if($active=="/sertificat.php"){echo 'class="active"';} ?> title="" ><span>Сертификаты</span></a></li>
        </ul>

        <br>-->
        <?php if($_SESSION['access']!="3"){?>
        <img style="margin-left:12px;" src="images/razbor.png" alt="" />
        <br>
        <ul id="menu">
            <li class="dash"><a href="parts_category.php" <?php if($active=="/parts_category.php"){echo 'class="active"';} ?> title=""><span>Категории запчастей</span></a></li>
            <li class="forms"><a href="car_list.php" 	  <?php if($active=="/car_list.php"){echo 'class="active"';} ?> title=""><span>Список автомобилей</span></a></li>
            <li class="forms"><a href="parts.php" 		  <?php if($active=="/parts.php"){echo 'class="active"';} ?> title=""><span>Каталог запчастей</span></a></li>
        </ul>
        <br>
        <img style="margin-left:12px;" src="images/archive.png" alt="" />
        <br>
        <ul id="menu">
            <li class="doc"><a href="archive_price.php" 		<?php if($active=="/archive_price.php"){echo 'class="active"';} ?> title="" ><span>Прайсы</span></a></li>
            <li class="doc"><a href="archive_blank.php" 		<?php if($active=="/archive_blank.php"){echo 'class="active"';} ?> title="" ><span>Бланки</span></a></li>
		</ul>
        <br>
        <? } ?>
    </div>
<?php } ?>

