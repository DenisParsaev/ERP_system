<div id="header" class="wrapper">
    <div class="logo"><a href="/" title=""><img style="margin-left:12px;" src="images/loginLogo.png" alt="" /></a></div>
    <ul class="middleNav">
        <?php
            if($_SESSION['responsibility']==4)
                {
                    echo '<li class="iPhone"><a href="order.php" title=""><span>Звонки</span></a></li>';
                    echo '<li class="iOrder"><a href="preorder_list.php" title=""><span>Предзаказы</span></a></li>';
					echo '<li class="iTruck"><a href="shipping_blank.php" title=""><span>Бланк отгрузки</span></a></li>';
                }
            elseif($_SESSION['responsibility']==2)
                {
                    echo '<li class="iOrder"><a href="preorder_list.php" title=""><span>Предзаказы</span></a></li>';
                }
            elseif($_SESSION['responsibility']==1)
            {
                echo '<li class="iCategory"><a href="parts_category.php" title=""><span>Категории</span></a></li>';
                echo '<li class="iBrand"><a href="car_list.php" title=""><span>Автомобили</span></a></li>';
                echo '<li class="iRazor"><a href="parts.php" title=""><span>Запчасти</span></a></li>';
                echo '<li class="iOrder"><a href="preorder_list.php" title=""><span>Предзаказы</span></a></li>';
            }
            else
            {
        ?>
            <?php if($_SESSION['id']!="1"){?>
                <li class="iCall"><a href="new_order.php" title=""><span>Звонок</span></a><span class="numberMiddle" style="top: -7px;right: -9px;">NEW</span></li>

                <li class="iMyCall"><a href="my_call.php" title=""><span>Мои звонки</span></a></li>
            <?php }?>
            <?php if($_SESSION['access']!="3"){?>
            <li class="iPhone"><a href="order.php" title=""><span>Звонки</span></a></li>
            <?php }?>
            <li class="iOrder"><a href="preorder_list.php" title=""><span>Предзаказы</span></a></li>
            <li class="iTruck"><a href="shipping_blank.php" title=""><span>Бланк</span></a></li>
        <?php } ?>
    </ul>
</div>