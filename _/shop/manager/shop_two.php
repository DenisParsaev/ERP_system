<div class="widget" style="margin-top: 10px;">
    <div class="head"><h5 class="iImageList">Романеко Григорий Григорьевич</h5></div>
    <div class="body">
        <div class="list arrow2Blue">
            <span class="legend">Телефон</span>
            <ul>
                <li>38(098)316-15-62</li>
            </ul>
            <span class="legend">Обязанности</span>
            <ul>
                <li>Армосетка</li>
                <li>Просечка</li>
                <li>Колючая проволока</li>
            </ul>
        </div>
    </div>
</div>
<div class="table" style="margin-top: 20px;">
    <div class="head">
        <h5 style="width: 90%;text-align: center;">
            Мои предзаказы
        </h5>
    </div>
    <table  cellpadding="0" cellspacing="0" border="0" class="display" id="example_1"  >
        <thead>
        <tr>
            <th style="width: 100px;">№</th>
            <th>Содержимое</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $query = "SELECT * FROM preorder_willingness,scroll_call WHERE preorder_willingness.call_id=scroll_call.id AND preorder_willingness.shop_two='1' AND scroll_call.status='8'";
        $res = mysql_query($query) or die(mysql_error());
        while ($result = mysql_fetch_array($res))
        {
            $order = explode("/", $result['order_content']);
            $order_count=count($order);

            for($i=0;$i<$order_count-1;$i++)
            {
                $order_arr = explode("|", $order[$i]);
                $place=$order_arr[3];

                if($place==2)
                {
                    if($result['manager']==$_SESSION['id'])
                        {
                            $number = str_pad($result['id'], 6, '0', STR_PAD_LEFT);


                            $date = explode(" ", $result['date_preorder']);
                            $time = $date[1];
                            $date = $date[0];
                            $date_explode = explode("-", $date);
                            $year = $date_explode[0];
                            $mon = $date_explode[1];
                            $day = $date_explode[2];

                            $query_date_preorder = "SELECT date_manufacture FROM call_preorder WHERE call_id='" . $result['id'] . "'";
                            $res_date_preorder = mysql_query($query_date_preorder) or die(mysql_error());
                            $result_date_preorder = mysql_fetch_array($res_date_preorder);
                            $date_preorder = $result_date_preorder['date_manufacture'];

                            if ($date_preorder != "") {
                                $date_preorder = '<center style="margin-top: 10px;color:red;"><b>Дата выполнения предзаказа: ' . $date_preorder . '</b></center>';
                            }

                            echo '<tr class="gradeA">';
                            echo '<td style="vertical-align: middle;" ><center><a href="/info_order.php?id=' . $result['id'] . '"><font color="blue">#' . $number . '</font></a><br>' . $day . '-' . $mon . '-' . $year . '<br>' . $time . '</center></td>';
                            echo '<td style="vertical-align: middle;"><center>';

                            for ($i = 0; $i < $order_count - 1; $i++) {
                                $order_arr = explode("|", $order[$i]);
                                if ($order_arr[3] == "2") {
                                    echo '<table width="100%" cellpadding="2" cellspacing="1" style="border: 1px groove black;" >
                                      <tr style="border: 1px groove black;">
                                      <td style="border: 1px groove black;"><center>' . $order_arr[0] . '</center></td>
                                      <td style="width:40px;border: 1px groove black;"><center>' . $order_arr[1] . '</center></td>
                                      <td style="width:40px;border: 1px groove black;"><center>' . $order_arr[2] . ' ₴</center></td>
                                      </tr>
                                      </table>';
                                }
                            }
                            echo $date_preorder;
                        }

                }
            }
        }
        ?>

        </tbody>
    </table>
</div>