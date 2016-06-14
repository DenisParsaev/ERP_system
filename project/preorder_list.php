<?php
include 'include/themplate/header.php';
if($_SESSION['id']!="")
	{

?>

<script type="application/javascript" type="text/javascript">

	function preorder_office_rabica() {

        $.ajax({
          type: 'POST',
          url: '/preorder/make_excel.php?shop=1',
          success: function(data) {
            $('#result').html(data);
          },
          error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });

        }

	function preorder_shop_rabica() {

        $.ajax({
          type: 'POST',
          url: '/preorder/make_excel_shop.php?shop=1',
          success: function(data) {
            $('#result').html(data);
          },
          error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });

        }

	function preorder_office_razborka() {

        $.ajax({
          type: 'POST',
          url: '/preorder/make_excel.php?shop=4',
          success: function(data) {
            $('#result').html(data);
          },
          error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });

        }

	function preorder_shop_razborka() {

        $.ajax({
          type: 'POST',
          url: '/preorder/make_excel_shop.php?shop=4',
          success: function(data) {
            $('#result').html(data);
          },
          error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });

        }

 	function preorder_office_armasetka() {

        $.ajax({
          type: 'POST',
          url: '/preorder/make_excel.php?shop=2',
          success: function(data) {
            $('#result').html(data);
          },
          error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });

        }

	function preorder_shop_armasetka() {

        $.ajax({
          type: 'POST',
          url: '/preorder/make_excel_shop.php?shop=2',
          success: function(data) {
            $('#result').html(data);
          },
          error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });

        }

 	function preorder_office_kirpish() {

        $.ajax({
          type: 'POST',
          url: '/preorder/make_excel.php?shop=3',
          success: function(data) {
            $('#result').html(data);
          },
          error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });

        }

	function preorder_shop_kirpish() {

        $.ajax({
          type: 'POST',
          url: '/preorder/make_excel_shop.php?shop=3',
          success: function(data) {
            $('#result').html(data);
          },
          error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });

        }


</script>

<script language="JavaScript" type="application/javascript" >
    function ready_succes(obj) {
        var id = (obj.id);
        var shop = (obj.id);
        $.ajax({
            type: 'POST',
            url: '/function/ready_preorder.php?id='+id,
            data: id,
            success: function(data) {
                id=id.split('|',1);
                shop=shop.split('|',3);
                shop=shop[2];
                $('#result_ready_preorder_'+ shop +'_'+id).html(data);
            },
            error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
    }
 </script>

 <script language="JavaScript" type="application/javascript" >
    function return_order(obj) {
        var id = (obj.id);
        var shop = (obj.id);
        $.ajax({
            type: 'POST',
            url: '/function/return_orders_base.php?id='+id,
            data: id,
            success: function(data) {
                id=id.split('|',1);
                shop=shop.split('|',3);
                shop=shop[2];
                $('#result_ready_preorder_'+ shop +'_'+id).html(data);
            },
            error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
    }
 </script>

</head>
<body>
<?php
include 'include/themplate/top_band.php';
include 'include/themplate/top_menu.php';
?>
<div class="wrapper">
    <div class="content" style="width: 100%;">
    	<div class="title"><h5>Перечень предзаказов</h5></div>
    	    <?php if($_SESSION['access']=="1"){ ?>
            <div class="widget">
                <div class="tabs">
                    <ul>
                        <li><a href="preorder_list.php#tabs-1">Цех #1</a></li>
                        <li><a href="preorder_list.php#tabs-2">Цех #2</a></li>
                        <li><a href="preorder_list.php#tabs-3">Цех #3</a></li>
                        <li><a href="preorder_list.php#tabs-4">Цех #4</a></li>
                    </ul>
                    <div id="tabs-1">
                        <?php include 'shop/admin/shop_one.php';?>
                    </div>
                    <div id="tabs-2">
                        <?php include 'shop/admin/shop_two.php';?>
                    </div>
                    <div id="tabs-3">
                        <?php include 'shop/admin/shop_three.php';?>
                    </div>
                    <div id="tabs-4">
                        <?php include 'shop/admin/shop_four.php';?>
                    </div>
                </div>
            </div>
            <?php

                }
                elseif($_SESSION['access']=='4' && $_SESSION['responsibility']=='4'){include 'shop/responsible/shop_one.php';}
                elseif($_SESSION['access']=='4' && $_SESSION['responsibility']=='2'){include 'shop/responsible/shop_two.php';}
                elseif($_SESSION['access']=='4' && $_SESSION['responsibility']=='3'){include 'shop/responsible/shop_three.php';}
                elseif($_SESSION['access']=='4' && $_SESSION['responsibility']=='1'){include 'shop/responsible/shop_four.php';}
                elseif($_SESSION['access']=='2' || $_SESSION['access']=='3'){
             ?>
                <div class="widget">
                    <div class="tabs">
                        <ul>
                            <li><a href="preorder_list.php#tabs-1">Цех #1</a></li>
                            <li><a href="preorder_list.php#tabs-2">Цех #2</a></li>
                            <li><a href="preorder_list.php#tabs-3">Цех #3</a></li>
                            <li><a href="preorder_list.php#tabs-4">Цех #4</a></li>
                        </ul>
                        <div id="tabs-1">
                            <?php include 'shop/manager/shop_one.php';?>
                        </div>
                        <div id="tabs-2">
                            <?php include 'shop/manager/shop_two.php';?>
                        </div>
                        <div id="tabs-3">
                            <?php include 'shop/manager/shop_three.php';?>
                        </div>
                        <div id="tabs-4">
                            <?php include 'shop/manager/shop_four.php';?>
                        </div>
                    </div>
                </div>
             <?php } ?>
        </div>
    <div id="result"></div>
</div>
<?php
include 'include/themplate/footer.php';
	}
else
	{
		echo '<script language="JavaScript"> window.location.href = "/index.php"</script>';
	}
?>