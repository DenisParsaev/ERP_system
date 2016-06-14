<?php

//Редактирование продукта (шаблон)

session_start();
include '../include/config.php'; 
$id=$_GET['id'];
$query = "SELECT * FROM `scroll_call` WHERE id='".$id."'";
$res = mysql_query($query) or die(mysql_error());
$result = mysql_fetch_array($res);
$order = explode("/", $result['order_content']);
$order_count=count($order);
?>

<form method="POST" id="edit_product" action="javascript:void(null);" onsubmit="edit_product()" class="mainForm">    
	<fieldset>	
		<center>   
			<div class="widget" style="margin-top:0px;width:958px;">
				<div class="head"><h5 class="iFrames">Позиции в заказе</h5></div>
				<table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
					<thead>
						<tr>
							<td width="60%">Наименование</td>
							<td width="10%">Производство</td>
							<td width="10%">Колличество</td>
							<td width="10%">Цена</td>
							<td width="10%">Удалить</td>
						</tr>
					</thead>
					<tbody>
								<?php 
								for($i=0;$i<$order_count-1;$i++)
									{	
										$order_arr = explode("|", $order[$i]);	
										echo '<tr>';							
										echo '<td align="center"><input type="text" name="product[]" value="'.$order_arr[0].'" /></td>';
								?>
											<td align="center">
											<select data-placeholder="Категория" class="select" name="category[]"  tabindex="2">

											<?php

											$query_place_name = "SELECT name_property FROM `place_manfacture` WHERE id='".$order_arr[3]."'";
											$res_place_name = mysql_query($query_place_name) or die(mysql_error());
											$result_place_name = mysql_fetch_array($res_place_name);
											$place_name=$result_place_name['name_property'];

											echo '<option value="'.$order_arr[3].'">'.$place_name.'</option>';

											$query_place = "SELECT * FROM `place_manfacture`";
											$res_place = mysql_query($query_place) or die(mysql_error());
											while ($result_place = mysql_fetch_array($res_place)) {
												if($order_arr[3]!=$result_place['id'])
													{
														echo '<option value="'.$result_place['id'].'">'.$result_place['name_property'].'</option> ';
													}

											}
											?>
											</select>
											</td>
								<?php
										echo '<td align="center"><input type="text"  name="count[]" value="'.$order_arr[1].'" /></td>';
										echo '<td align="center"><input type="text"  name="price[]" value="'.$order_arr[2].'" /></td>';
										echo '<td align="center"><input type="checkbox" id="check" name="delete_'.$i.'" /></td>';
										echo '</tr>';
									}
								?>
					</tbody>
				</table>
				<textarea rows="8" cols="" required class="auto" name="comment" placeholder="Текст нового комментария" style="width:946px;margin-top:10px;margin-bottom:10px;"></textarea>
			</div>
		</center>
	</fieldset>	
	<input type="hidden" name="manager" value="<?php echo $_SESSION['id'];?>"/>
	<input type="hidden" name="date_add" value="<?php echo $result['date_add'];?>"/>
	<input type="hidden" value="<?php echo $id;?>" name="id"/>
	<center>
	<input type="submit" value="Сохранить" style="width:98%;margin-top:10px;" class="greenBtn" />
	</center>
</form>	
<div id="result_edit_product"></div>