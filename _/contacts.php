<?php 
include 'include/themplate/header.php';
if($_SESSION['id']!="")
{
?>

<script type="text/javascript" language="javascript">
    function add_user() {
      var msg   = $('#add_user').serialize();
        $.ajax({
          type: 'POST',
          url: '/function/add_user.php',
          data: msg,
          success: function(data) {
            $('#result_add_user').html(data);
          },
          error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
 
    }
</script>
<style>
	.datepicker {
		width: 510px!important;
		cursor: pointer;
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
		<?php if($_SESSION['access']=="1"){?>
			<div class="widget" style="    margin-top: 20px;">
				<div class="head closed"><h5>Добавить сотрудника</h5></div>
				<div class="body">
					<form method="POST" id="add_user" action="javascript:void(null);" onsubmit="add_user()" class="mainForm">

						<!-- Input text fields -->
						<fieldset>
							<div class="widget" style="margin-top: 10px;">
								<div class="head"><h5 class="iList">Форма добавления</h5></div>
								<div class="rowElem noborder"><label>ФИО:</label><div class="formRight"><input type="text" name="full_name"/></div></div>
								<div class="rowElem"><label>Дата рождения:</label><div class="formRight"><input name="birthday" class="datepicker" style="width:0px;" type="text"></div></div>
								<div class="rowElem">
									<label>Группа:</label>
									<div class="formRight">
										<select style="width:512px;" data-placeholder="Выберите группу..." class="select" name="access" tabindex="2">
											<option value=""></option>
											<?php
											$query = "SELECT * FROM `access`";
											$res = mysql_query($query) or die(mysql_error());
											while ($result = mysql_fetch_array($res)) {


												echo '<option value="'.$result['id'].'">'.$result['name'].'</option> ';
											}

											?>
										</select>
									</div>
								</div>


								<div class="rowElem"><label>Логин:</label><div class="formRight"><input type="text" name="login"/></div></div>
								<div class="rowElem"><label>Карта (ПриватБанк):</label><div class="formRight"><input type="text" name="card_number" value="5168 7420 1811 3831"/></div></div>
								<div class="rowElem"><label>Пароль:</label><div class="formRight"><input type="text" name="password" /></div></div>
								<div class="rowElem"><label>Личный E-Mail:</label><div class="formRight"><input type="text" name="personal_mail" /></div></div>
								<div class="rowElem"><label>Личный телефон:</label><div class="formRight"><input class="maskIntPhone" name="personal_phone" value="" type="text"></div></div>
								<div class="submitForm"><input type="submit" value="Добавить сотрудника" class="greenBtn" /></div>
								<div id="result_add_user"></div>
							</div>

						</fieldset>
					</form>
				</div>
			</div>

		<?php } ?>

			<div class="table" style="margin-top: 20px;">
				<div class="head">
					<h5 class="iFrames">Сотрудники</h5>
				</div>
				<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					<thead>
						<tr>
							<th>№</th>
							<th>ФИО</th>
							<th>Группа</th>
							<th>Телефон</th>
							<?php if($_SESSION['access']=="1"){ ?> <th>Информация</th><?php } ?>
						</tr>
					</thead>
					<tbody>
					<?php
					$query = "SELECT * FROM `users`";
					$res = mysql_query($query) or die(mysql_error());
					while ($result = mysql_fetch_array($res)) {

						$access=$result['access'];
						$query_group = "SELECT name FROM `access` WHERE id='".$access."'";
						$res_group = mysql_query($query_group) or die(mysql_error());
						$result_group = mysql_fetch_array($res_group);
						$group=$result_group['name'];

						preg_match('/\((.+)\)/', $result['personal_phone'], $code);
						if($code[1]=="63" || $code[1]=="73" || $code[1]=="93"){$operator='<img style="margin-bottom: -2.5px;" src="images/life.png" alt="">';}
						if($code[1]=="66" ||  $code[1]=="50" ||  $code[1]=="95" || $code[1]=="99"){$operator='<img style="margin-bottom: -2.5px;" src="images/mts.png" alt="">';}
						if($code[1]=="67" || $code[1]=="68" || $code[1]=="97" || $code[1]=="98" || $code[1]=="96"){$operator='<img style="margin-bottom: -2.5px;" src="images/kv.png" alt="">';}

						if($access=="1"){$style="gradeX";}else{$style="gradeA";}

						if($result['activity']=="0"){$name='<strike>'.$result['full_name'].'</strike>';}
						else {$name=$result['full_name'];}

						$id=str_pad($result['id'], 3, '0', STR_PAD_LEFT);

						echo '<tr class="'.$style.'">
							  <td><center>'.$id.'</center></td>
							  <td><center>'.$name.'</center></td>
							  <td><center>'.$group.'</center></td>
							  <td><center>'.$result['personal_phone'].' '.$operator.'</center></td>';
						if($_SESSION['access']=="1")
						{
						echo '<td class="center"><center><a href="/info_user.php?id='.$result['id'].'" title="" class="btn14 mr5"><img src="images/icons/color/information.png" alt=""></a></center></td>';
						}
						echo '</tr>';
					}

					?>
					</tbody>
				</table>
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
