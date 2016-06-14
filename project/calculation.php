<?php 
include 'include/themplate/header.php';
if($_SESSION['id']!="")
{
$query = "SELECT cost_wire FROM `settings`";
$res = mysql_query($query) or die(mysql_error());
$result = mysql_fetch_array($res);
$cost_wire=$result['cost_wire'];	
?>

<script type="text/javascript" language="javascript">
    function calc_wire() {
      var msg   = $('#calc_wire').serialize();
        $.ajax({
          type: 'POST',
          url: '/calculation/wire.php',
          data: msg,
          success: function(data) {
            $('#result_calc_wire').html(data);
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
    	<div class="title"><h5>Рассчеты</h5></div>
        <form method="POST" id="calc_wire" action="javascript:void(null);" onsubmit="calc_wire()" class="mainForm">
        
        	<!-- Input text fields -->
            <fieldset>
			
                <div class="widget first">
                    <div class="head">
                        <div class="userWidget">
                          <a href="#" title="" class="userLink">Настройки</a>
                        </div>
                    </div>
                    
                    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
                        <tbody>
                            <tr class="noborder">
                                <td width="50%">Стоимость проволоки:</td>
                                <td ><input type="text" name="cost_wire" value="<?php echo $cost_wire;?>" style="width:245px;background: url(images/uah.png) no-repeat 99% 50%;"/><input type="submit" value="Обновить" class="greenBtn" style="margin-left:10px;line-height: 10px;" /></td>
                            </tr>						
                        </tbody>
                    </table> 
                                       
                </div>
				<div class="fluid">				
					<div class="span6">
						<div class="widget">
                    <div class="head">
                        <div class="userWidget">
                          <a href="#" title="" class="userLink">Проволока</a>
                        </div>
						<form method="POST" id="calc_wire" action="javascript:void(null);" onsubmit="calc_wire()" class="mainForm">
						<div class="num"><input type="submit" style="width:100px; line-height: 5px;" value="Рассчитать" class="greenBtn" /></div>
                    </div>
                    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
                        <tbody>								
                            <tr class="noborder">
                                <td width="50%">Диаметр:</td>
                                <td ><input type="text" name="diameter" value="" style="width:260px;"/></td>
                            </tr>
                            <tr>
                                <td width="50%">Метры:</td>
                                <td ><input type="text" name="meter" value="" style="width:260px;"/></td>
								<input type="hidden" value="<?php echo $cost_wire;?>"/>
                            </tr>							
                        </tbody>
                    </table> 
					</form>
								
						</div>
					</div>

					<div class="span6">
						<div class="widget">
							<div class="head">
								<div class="userWidget">
								  <a href="#" title="" class="userLink">Рассчет проволоки</a>
								</div>
							</div>
							<div id="result_calc_wire">
								<table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
									<tbody>	
										<tr class="noborder">
											<td width="50%">Себестоимость метра:</td>
											<td ><input type="text" name="cost_wire" value="" disabled style="width:180px;"/></td>
										</tr>
										<tr>
											<td width="50%">Себестоимость заказа:</td>
											<td ><input type="text" name="cost_wire" value="" disabled style="width:180px;"/></td>
										</tr>		
										<tr>
											<td width="50%">Килограмм:</td>
											<td ><input type="text" name="cost_wire" value="" disabled style="width:180px;"/></td>
										</tr>											
									</tbody>
								</table> 							
							</div>
						</div>
					</div>					
					
				</div>
            </fieldset>
		</form>
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
