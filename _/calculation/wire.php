<?php 
$diameter=$_POST['diameter'];
$const=160;
$meter=$_POST['meter'];
$cost_wire=$_POST['cost_wire'];


$cost_price=$diameter*$diameter/$const*$meter*$cost_wire/$meter;
$cost_price=round($cost_price, 2);
$kg=$cost_price*$meter/$cost_wire;
$kg=round($kg, 2);

echo '								<table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
									<tbody>	
										<tr class="noborder">
											<td width="50%">Себестоимость метра:</td>
											<td ><input type="text" name="cost_wire" value="'.$cost_price.'" disabled style="width:180px;"/></td>
										</tr>
										<tr>
											<td width="50%">Себестоимость заказа:</td>
											<td ><input type="text" name="cost_wire" value="'.$cost_price*$meter.'" disabled style="width:180px;"/></td>
										</tr>	
										<tr>
											<td width="50%">Килограмм:</td>
											<td ><input type="text" name="cost_wire" value="'.$kg.'" disabled style="width:180px;"/></td>
										</tr>		
										<tr>
											<td colspan="2">
											<input type="text" name="cost_wire" value="'.$kg.'" disabled style="width:135px;"/>
											<input type="submit" value="Рассчитать" class="greenBtn" style="margin-left:10px;line-height: 10px;width:183px;" />
											
											</td>
										</tr>										
									</tbody>
								</table> ';
?>