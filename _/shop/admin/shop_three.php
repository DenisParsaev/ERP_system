<div class="widget" style="margin-top: 10px;">
    <div class="head"><h5 class="iImageList">-</h5></div>
    <div class="body">
        <div class="list arrow2Blue">
            <span class="legend">Телефон</span>
            <ul>
                <li>-</li>
            </ul>
            <span class="legend">Обязанности</span>
            <ul>
                <li>-</li>
                <li>-</li>
                <li>-</li>
            </ul>
        </div>
    </div>
</div>
<div class="table" style="margin-top: 20px;">
    <div class="head">
        <h5 style="width: 90%;text-align: center;">
            <input type="button" value="Цеховской" class="blueBtn  ml10" onclick="preorder_shop_kirpish()" />
            <input type="button" value="Офисный" class="greenBtn  ml10" onclick="preorder_office_kirpish()" />
        </h5>
    </div>
    <table  cellpadding="0" cellspacing="0" border="0" class="display" id="example_2"  >
        <thead>
        <tr>
            <th>№</th>
            <th style="width: 509px;">Содержимое</th>
            <th>Готовность</th>
            <th>Менеджер</th>
            <th style="width: 100px;">Статус</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $query = "SELECT * FROM preorder_willingness,scroll_call WHERE preorder_willingness.call_id=scroll_call.id AND preorder_willingness.shop_three='1' AND scroll_call.status='8'";
        $res = mysql_query($query) or die(mysql_error());
        while ($result = mysql_fetch_array($res))
        {
            $order = explode("/", $result['order_content']);
            $order_count=count($order);

            for($i=0;$i<$order_count-1;$i++)
            {
                $order_arr = explode("|", $order[$i]);
                $place=$order_arr[3];

                if($place==3)
                {
                    $number=str_pad($result['id'], 6, '0', STR_PAD_LEFT);

                    $manager=$result['manager'];
                    $query_manager = "SELECT * FROM `users` WHERE id='".$manager."'";
                    $res_manager = mysql_query($query_manager) or die(mysql_error());
                    $result_manager = mysql_fetch_array($res_manager);
                    $manager=$result_manager['full_name'];
                    $manager=explode(' ', $manager);
                    $manager=$manager[1];
                    $phone=$result_manager['personal_phone'];

                    $date=explode(" ", $result['date_preorder']);
                    $time=$date[1];
                    $date=$date[0];
                    $date_explode=explode("-", $date);
                    $year=$date_explode[0];
                    $mon=$date_explode[1];
                    $day=$date_explode[2];

                    $query_date_preorder = "SELECT date_manufacture FROM call_preorder WHERE call_id='".$result['id']."'";
                    $res_date_preorder = mysql_query($query_date_preorder) or die(mysql_error());
                    $result_date_preorder = mysql_fetch_array($res_date_preorder);
                    $date_preorder=$result_date_preorder['date_manufacture'];


                    echo '<tr class="gradeA">';
                    echo '<td style="vertical-align: middle;" ><center><a href="/info_order.php?id='.$result['id'].'"><font color="blue">#'.$number.'</font></a><br>'.$day.'-'.$mon.'-'.$year.'<br>'.$time.'</center></td>';
                    echo '<td style="vertical-align: middle;"><center>';

                    for($i=0;$i<$order_count-1;$i++)
                    {
                        $order_arr = explode("|", $order[$i]);
                        if($order_arr[3]=="3")
                        {
                            echo '<table width="100%" cellpadding="2" cellspacing="1" style="border: 1px groove black;" >
                                  <tr style="border: 1px groove black;">
                                  <td style="border: 1px groove black;"><center>'.$order_arr[0].'</center></td>
                                  <td style="width:40px;border: 1px groove black;"><center>'.$order_arr[1].'</center></td>
                                  <td style="width:40px;border: 1px groove black;"><center>'.$order_arr[2].' ₴</center></td>
                                  </tr>
                                  </table>';
                        }
                    }
                    echo '</center></td>';
                    echo '<td style="vertical-align: middle;"><center><b>'.$date_preorder.'</b></center></td>';
                    echo '<td style="vertical-align: middle;"><center><a href="/info_user.php?id='.$result['manager'].'" target="_blank"><font color="blue">'.$manager.'</font></a><br>'.$phone.'</center></td>';
                    echo '<td style="vertical-align: middle;">
                            <center>
                                <div id="result_ready_preorder_3_'.$result['id'].'">
                                    <input type="button" style="width:95px;" name="submit" onClick = "ready_succes(this)" id="'.$result['id'].'|'.$_SESSION['id'].'|3" value="Готов" class="greenBtn" /><br>
                                    <input type="button" style="width:95px;margin-top:5px;" name="submit" onClick = "return_order(this)" id="'.$result['id'].'|'.$_SESSION['id'].'|3" value="Отказ" class="redBtn" />
                                </div>
                            </center>
                         </td>
                         </tr>';
                }
            }
        }
        ?>

        </tbody>
    </table>
</div>