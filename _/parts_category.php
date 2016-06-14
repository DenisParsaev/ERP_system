<?php 
include 'include/themplate/header.php';
if($_SESSION['id']!="")
{
?>

<script type="text/javascript" language="javascript">
    function add_auto_category() {
      var msg   = $('#add_auto_category').serialize();
        $.ajax({
          type: 'POST',
          url: '/function/add_auto_category.php',
          data: msg,
          success: function(data) {
            $('#result_add_auto_category').html(data);
          },
          error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
 
    }
</script>

<script type="text/javascript" language="javascript">
    function add_auto_subcategory() {
      var msg   = $('#add_auto_subcategory').serialize();
        $.ajax({
          type: 'POST',
          url: '/function/add_auto_subcategory.php',
          data: msg,
          success: function(data) {
            $('#result_add_auto_subcategory').html(data);
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
    	<div class="title"><h5>Категории</h5></div>
		<?php if($_SESSION['access']=="1" || $_SESSION['responsibility']=="1"){?>
       
			<fieldset>
                <div class="widget first">
                    <div class="head opened" id="toggleOpened"><h5>Добавление категории</h5></div>
                    <div class="body">
						 <form method="POST" id="add_auto_category" action="javascript:void(null);" onsubmit="add_auto_category()" class="mainForm">
							<div class="rowElem noborder"><label>Название:</label><div class="formRight"><input style="width:350px;" type="text" id="name_zapchast" name="name"/><input  style="margin-left:15px;" type="submit" value="Добавить категорию" class="greenBtn" /></div></div>
							<div id="result_add_auto_category"></div>
						</form>	
					</div>
                    
                    <div class="head closed"><h5>Добавление подкатегории</h5></div>
                    <div class="body">
						 <form method="POST" id="add_auto_subcategory" action="javascript:void(null);" onsubmit="add_auto_subcategory()" class="mainForm">
							<div class="rowElem noborder"><label>Название:</label><div class="formRight"><input style="width:512px;" id="name_sub" type="text" name="name"/></div></div>
							<div class="rowElem">
								<label>Группа:</label>
								<div class="formRight">
									<select style="width:512px;" data-placeholder="Выберите группу..." class="select" name="category" tabindex="2">
										<option value=""></option> 
										<?php 
										$query = "SELECT * FROM `disassembly_category`";
										$res = mysql_query($query) or die(mysql_error());
										while ($result = mysql_fetch_array($res)) {

											echo '<option value="'.$result['id'].'">'.$result['name'].'</option> ';
										}
										
										?>
									</select>
								</div>
							</div>	
							<div class="submitForm"><input type="submit" value="Добавить подкатегорию" class="greenBtn" /></div>							
							<div id="result_add_auto_subcategory"></div>
						</form>						
				
					</div>
                    
                </div>
			</fieldset>	
				        <!-- Dynamic table -->
        <div class="table">
            <div class="head"><h5 class="iFrames">Категории</h5></div>
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Статус</th>
                        <?php if($_SESSION['access']=="1"){ ?> <th>Изменить</th><?php } ?>
						<?php if($_SESSION['access']=="1"){ ?> <th>Удалить</th><?php } ?>
                    </tr>
                </thead>
                <tbody>
				<?php 
				$query = "SELECT name FROM `disassembly_category`";
				$res = mysql_query($query) or die(mysql_error());
				while ($result = mysql_fetch_array($res)) {
					
					echo '<tr class="gradeA">
                          <td><center>'.$result['name'].'</center></td>
						  <td><center>Родитель</center></td>';
					if($_SESSION['access']=="1")
					{ 	
					echo '<td class="center"><center><a href="/info_user.php?id='.$result['id'].'" title="" class="btn14 mr5"><img src="images/icons/color/pencil.png" alt=""></a></center></td>';
					echo '<td class="center"><center><a href="/info_user.php?id='.$result['id'].'" title="" class="btn14 mr5"><img src="images/icons/color/cross.png" alt=""></a></center></td>';
                    } 
				    echo '</tr>';
				}
				
				$query = "SELECT * FROM `disassembly_subcategory`";
				$res = mysql_query($query) or die(mysql_error());
				while ($result = mysql_fetch_array($res)) {
					
					$query_2 = "SELECT name FROM `disassembly_category` WHERE id='".$result['category_id']."'";
					$res_2 = mysql_query($query_2) or die(mysql_error());
					$result_2 = mysql_fetch_array($res_2);
					
					echo '<tr class="gradeC">
                          <td><center>'.$result['name'].'</center></td>
						  <td><center>'.$result_2['name'].'</center></td>';
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
