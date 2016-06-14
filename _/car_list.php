<?php 
include 'include/themplate/header.php';
if($_SESSION['id']!="")
{
?>

<script type="text/javascript" language="javascript">
    function add_auto_brand() {
      var msg   = $('#add_auto_brand').serialize();
        $.ajax({
          type: 'POST',
          url: '/function/add_auto_brand.php',
          data: msg,
          success: function(data) {
            $('#result_add_auto_brand').html(data);
          },
          error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
 
    }
</script>

<script type="text/javascript" language="javascript">
    function add_auto_model() {
      var msg   = $('#add_auto_model').serialize();
        $.ajax({
          type: 'POST',
          url: '/function/add_auto_model.php',
          data: msg,
          success: function(data) {
            $('#result_add_auto_model').html(data);
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
<!-- Content wrapper -->
<div class="wrapper">
	
<?php 
include 'include/themplate/menu.php'; 
?>

    
    <!-- Content -->
    <div class="content">
    	<div class="title"><h5>Автомобили</h5></div>
		<?php if($_SESSION['access']=="1" || $_SESSION['responsibility']=="1"){?>
       
        
                <div class="widget first">
                    <div class="head opened" id="toggleOpened"><h5>Добавление марки</h5></div>
                    <div class="body">
						 <form method="POST" id="add_auto_brand" action="javascript:void(null);" onsubmit="add_auto_brand()" class="mainForm">
							<div class="rowElem noborder"><label>Название:</label><div class="formRight"><input style="width:350px;" type="text" name="name"/><input style="margin-left:15px;" type="submit" value="Добавить марку" class="greenBtn" /></div></div>
							<div id="result_add_auto_brand"></div>
						</form>	
					</div>
                    
                    <div class="head closed"><h5>Добавление модели</h5></div>
                    <div class="body">
						 <form method="POST" id="add_auto_model" action="javascript:void(null);" onsubmit="add_auto_model()" class="mainForm">
							<div class="rowElem noborder"><label>Название:</label><div class="formRight"><input style="width:512px;" type="text" name="name"/></div></div>
							<div class="rowElem">
								<label>Марка:</label>
								<div class="formRight">
									<select style="width:512px;" data-placeholder="Выберите марку..." class="select" name="brand" tabindex="2">
										<option value=""></option> 
										<?php 
										$query = "SELECT * FROM `disassembly_brand`";
										$res = mysql_query($query) or die(mysql_error());
										while ($result = mysql_fetch_array($res)) {

											echo '<option value="'.$result['id'].'">'.$result['name'].'</option> ';
										}
										
										?>
									</select>
								</div>
							</div>	
							<div class="submitForm"><input type="submit" value="Добавить модель" class="greenBtn" /></div>							
							<div id="result_add_auto_model"></div>
						</form>						
				
					</div>
                    
                </div>
				
				        <div class="table">
            <div class="head"><h5 class="iFrames">Категории</h5></div>
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                <thead>
                    <tr>
                        <th>Марка</th>
                        <th>Модель</th>
                        <?php if($_SESSION['access']=="1"){ ?> <th>Изменить</th><?php } ?>
						<?php if($_SESSION['access']=="1"){ ?> <th>Удалить</th><?php } ?>
                    </tr>
                </thead>
                <tbody>
				<?php 
				$query = "SELECT * FROM `disassembly_model`";
				$res = mysql_query($query) or die(mysql_error());
				while ($result = mysql_fetch_array($res)) {
					
					$query_brand = "SELECT * FROM `disassembly_brand` WHERE id='".$result['brand_id']."'";
					$res_brand = mysql_query($query_brand) or die(mysql_error());
					$result_brand = mysql_fetch_array($res_brand);

					
					echo '<tr class="gradeA">
						  <td><center>'.$result_brand['name'].'</center></td>
						  <td><center>'.$result['name'].'</center></td>';
						  
					if($_SESSION['access']=="1")
					{ 	
					echo '<td class="center"><center><a href="/info_user.php?id='.$result['id'].'" title="" class="btn14 mr5"><img src="images/icons/color/pencil.png" alt=""></a></center></td>';
					echo '<td class="center"><center><a href="/info_user.php?id='.$result['id'].'" title="" class="btn14 mr5"><img src="images/icons/color/cross.png" alt=""></a></center></td>';
                    } 
				    echo '</tr>';
				}
				
				?>
                </tbody>
            </table>
        </div>
		
		<?php } ?>
               
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
