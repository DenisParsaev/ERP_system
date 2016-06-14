<!-- Top navigation bar -->
<div id="page-preloader"><span class="spinner"></span></div>
<div id="topNav">
    <div class="fixed">
        <div class="wrapper">
            <div class="welcome"><a href="#" title=""><img src="images/userPic.png" alt="" /></a><span>Добро пожаловать, <?php echo $_SESSION['full_name'];?>!</span></div>
            <div class="userNav">
                <ul>
                    <li><a href="instructions.php" title=""><img src="images/icons/topnav/messages.png" alt="" /><span>Указания</span><?php message($_SESSION['id'],$_SESSION['access']);?></a></li>
                    <?php
                        if($_SESSION['responsibility']!="4" && $_SESSION['responsibility']!="1" && $_SESSION['id']!="1" && $_SESSION['responsibility']!="2")
                            {
                                echo '<li><a href="profile.php" title=""><img src="images/icons/topnav/profile.png" alt="" /><span>Мой профиль</span></a></li>';
                            }
                        if($_SESSION['id']!="1")
                            {
                                echo '<li><a href="mailto:ignatyev.ew@gmail.com" title=""><img src="images/icons/topnav/messages.png" alt="" /><span>Написать адмиистратору</span></a></li>';
                            }
                        if($_SESSION['access']=="1")
                            {
                                echo '<li><a href="/setting.php" title=""><img src="images/icons/topnav/settings.png" alt="" /><span>Настройки</span></a></li>';
                            }
                        if($_SESSION['access']=="4" && $_SESSION['responsibility']=="4")
                            {
                                echo '<li class="dd"><a title=""><img src="images/icons/topnav/messages.png" alt="" /><span>Прайсы</span></a>';
                                echo '<ul class="menu_body">';
                                echo '<li><a href="/price_rabitz_two.php" title="" class="sInbox">Рабица #2</a></li>';
                                echo '<li><a href="/price_rabitz_three.php" title="" class="sInbox">Рабица #3</a></li>';
                                echo '<li><a href="/welded_mesh_price.php" title="" class="sInbox">Армасетка</a></li>';
                                echo '</ul>';
                                echo '</li>';
                            }
                    ?>



                    <li><a href="function/exit.php" title=""><img src="images/icons/topnav/logout.png" alt="" /><span>Выход</span></a></li>
                    <li><a title=""><span>Курс $: <?php dollar_exchange();?></span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>