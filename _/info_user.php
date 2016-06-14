<?php 
include 'include/themplate/header.php';
if($_SESSION['id']!="" & $_SESSION['access']=="1")
{
$id=$_GET['id'];
$query = "SELECT * FROM `users` WHERE id='".$id."'";
$res = mysql_query($query) or die(mysql_error());
$result = mysql_fetch_array($res);
if($result['activity']=="1"){$status="Активен";}
if($result['activity']=="0"){$status="Заблокирован";}

$wallet_number=wallet_number($id);
$wallet_balance=wallet_balance($id);

?>

<style>
    .tooltip { /* стиль текста, наведя или нажав на который появится пояснение */
        display: inline-block;
        position: relative;
        text-indent: 0px;
        cursor: help; /* вид курсора */
    }
    .tooltip > span { /* стиль появляющейся подсказки */
        position: absolute;
        bottom: 100%;
        left: -20em; /* = max-width */
        right: -20em; /* = max-width */
        width: -moz-max-content;
        width: -webkit-max-content;
        width: max-content;  /* ширина подсказки может быть не более содержимого */
        max-width: 20em;  /* ширина подсказки может быть не более 20em */
        max-height: 80vh; /* необязательное ограничение по высоте подсказки, 1vh — это 1% от ширины окна */
        overflow: auto;
        visibility: hidden;
        margin: 0 auto .4em; /* поднята на .4em над текстом, наведя или нажав на который появится пояснение */
        padding: .3em;
        border: solid rgb(200,200,200);
        font-size: 90%;
        background: #fff;
        line-height: normal;
        cursor: auto;
    }
    .tooltip.left > span { /* начинается от левого края */
        left: 0;
        right: -20em;
        margin: 0 0 .4em;
    }
    .tooltip.right > span { /* начинается от правого края */
        left: -20em;
        right: 0;
        margin: 0 0 .4em auto;
    }
    .tooltip:after { /* треугольничек под подсказкой; тут тоже везде .4em */
        content: "";
        position: absolute;
        top: -.4em;
        left: 50%;
        visibility: hidden;
        margin: 0 0 0 -.4em;
        border: .4em solid;
        border-color: rgb(200,200,200) transparent transparent transparent;
        cursor: auto;
    }
    .tooltip.left:after {
        left: 1em;
    }
    .tooltip.right:after {
        left: auto;
        right: .6em; /* 1em - .4em */
    }
    .tooltip:before { /* поле между текстом, наведя или нажав на который появится пояснение, и подсказкой нужно чтобы, если перевести курсор мышки на подсказку, та не исчезла; тут тоже везде .4em */
        content: "";
        position: absolute;
        top: -.4em;
        left: 0;
        right: 0;
        height: .4em;
        visibility: hidden;
    }
    .tooltip:hover > span,
    .tooltip:hover:before,
    .tooltip:hover:after,
    .tooltip:focus > span,
    .tooltip:focus:before,
    .tooltip:focus:after {
        visibility: visible;
        transition: 0s .4s;
    }
    .tooltip:focus { /* убрать рамку в Хроме */
        outline: none;
    }
    .tooltip.anim > span,
    .tooltip.anim:after { /* анимация */
        opacity: 0;
        transform: translateY(1.5em) scale(.3);
        transform-origin: center bottom;
    }
    .tooltip.anim:after {
        transform: translateY(.7em) scale(.3); /* 1.7 = 1.5 / (1.4*2) */
    }
    .tooltip.anim:hover > span,
    .tooltip.anim:hover:after,
    .tooltip.anim:focus > span,
    .tooltip.anim:focus:after {
        opacity: 1;
        transition: .6s .4s;
        transform: translateY(0);
    }
    @media (max-width: 20em) { /* ширина подсказки может быть не более ширины окна браузера */
        .tooltip > span {
            max-width: 100vw; /* в 100vw входит полоса прокрутки, но на мобильных она часто отсутствует */
            box-sizing: border-box;
        }
    }
</style>

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
    	<div class="title"><h5>Сотрудники</h5></div>

        <!-- Widgets -->
        <div class="fluid">

            
            <!-- Right widgets -->




                
                <!-- User widget -->
                <div class="widget" style="margin-top: 10px;">
                    <div class="head">
                        <div class="userWidget">
                          <a href="#" title="" class="userLink"><?php echo $result['full_name'];?></a>
                        </div>
                        <div class="num">
						<a href="#" class="redNum">Удалить</a>
						<?php if($result['activity']=="1"){?><a href="/function/block.php?id=<?php echo $result['id'];?>" class="blackNum">Заблокировать</a><?php } ?>
						<?php if($result['activity']=="0"){?><a href="/function/block.php?id=<?php echo $result['id'];?>" class="blackNum">Разблокировать</a><?php } ?>
						<a href="#" class="greenNum">Изменить</a>
						</div>
                    </div>
                    
                    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
                        <tbody>
                            <tr class="noborder">
                                <td width="50%">Логин:</td>
                                <td align="right"><strong class="red"><?php echo $result['login'];?></strong></td>
                            </tr>
                            <tr>
                                <td>Пароль:</td>
                                <td align="right"><strong><?php echo $result['password'];?></strong></td>
                            </tr>							
                            <tr>
                                <td>ФИО:</td>
                                <td align="right"><?php echo $result['full_name'];?></td>
                            </tr>
                            <tr>
                                <td>Дата рождения:</td>
                                <td align="right"><?php echo $result['birthday'];?></td>
                            </tr>							
                            <tr>
                                <td>Личный E-Mail:</td>
                                <td align="right"><a href="mailto:<?php echo $result['personal_mail'];?>"><?php echo $result['personal_mail'];?></a></td>
                            </tr>
                            <tr>
                                <td>Личный телефон:</td>
                                <td align="right"><?php echo $result['personal_phone'];?></td>
                            </tr>
                            <tr>
                                <td>Активность аккаунта:</td>
                                <td align="right"><strong><?php echo $status;?></strong></td>
                            </tr>
                            <tr>
                                <td>Последний вход:</td>
                                <td align="right"><?php echo $result['last_enter'];?></td>
                            </tr>
                            <tr>
                                <td>Дата регистрации:</td>
                                <td align="right"><?php echo $result['date_register'];?></td>
                            </tr>
                            <tr>
                                <td>Баланс кошелька</td>
                                <td align="center"><strong class="red"><a href="/wallet.php"><?php echo $wallet_balance;?> ₴</a></strong></td>
                            </tr>
                        </tbody>
                    </table> 
                                        
                </div>

            <div class="table">
                <div class="head"><h5 class="iFrames">Кошелек #<?php  echo $wallet_number;?></h5></div>
                <table cellpadding="0" cellspacing="0" border="0" class="display" id="example_1">
                    <thead>
                    <tr>
                        <th>Дата</th>
                        <th>Сумма</th>
                        <th>Комментарий</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $transaction_type="+"; wallet_history($transaction_type,$wallet_number); ?>
                    <?php $transaction_type="-"; wallet_history($transaction_type,$wallet_number); ?>
                    </tbody>
                </table>
            </div>



            <div class="table">
                <div class="head"><h5 class="iFrames">Перечень инвентаря</h5></div>
                <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                    <thead>
                    <tr>
                        <th>Номер</th>
                        <th>Позиция</th>
                        <th>Дата присвоения</th>
                        <?php if($_SESSION['access']=="1"){?><th>Удаление</th><?php } ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT * FROM `users_inventory` WHERE users_id='".$id."'";
                    $res = mysql_query($query) or die(mysql_error());
                    while ($result = mysql_fetch_array($res)) {

                        $number=str_pad($result['id'], 4, '0', STR_PAD_LEFT);

                        $date=explode(" ", $result['date_add']);
                        $time=$date[1];
                        $date=$date[0];
                        $date_explode=explode("-", $date);
                        $year=$date_explode[0];
                        $mon=$date_explode[1];
                        $day=$date_explode[2];

                        echo '<tr class="gradeA">
							  <td><center>'.$number.'</center></td>
							  <td><center>'.$result['inventory_text'].'</center></td>
							  <td><center>'.$day.'-'.$mon.'-'.$year.' '.$time.'</center></td>
							  ';
                        if($_SESSION['access']=="1")
                        {
                            echo '<td><center><a href="function/delete_inventory.php?id=' .$result['id'].'"> <img src="images/icons/color/cross.png"/></a></center></td>';
                        }
                        echo '</tr>';
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
else
{
echo '<script language="JavaScript"> window.location.href = "/index.php"</script>';
}
?>
