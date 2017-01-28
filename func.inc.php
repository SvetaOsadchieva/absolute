<?php 
function getDate($conn){
        $stmt = $conn->prepare("SELECT day_time 
                                        from main
                                        order by day_time DESC
                                        LIMIT 1");
        $stmt->execute();
        foreach($stmt as $q)
        {
        echo"<span>".$q['day_time']."</span></h2>";
    }
};

function getTable($conn, $stmt) {
        echo"<div style='overflow-x:auto;'>
                <table class='table table-hover''>
                    <thead>
                        <tr>
                            <th class='th-first'></th>
                            <th>ПОКУПКА</th>
                            <th>ПРОДАЖА</th>
                        </tr>
                    </thead>
                    <tbody>";
        
         $stmt->execute();
    
        foreach($stmt as $q){
                        echo"<tr>";
                        echo"<td>".$q['currency']."</td>".
                            "<td><i class='fa fa-long-arrow-".$q['td_buy']." fa-lg ".$q['td_buy']."'> </i> ".$q['buy']." <sup>".$q['buy_tender']."</sup></td>".
                            "<td><i class='fa fa-long-arrow-".$q['td_sell']." fa-lg ".$q['td_sell']."'> </i> ".$q['sell']." <sup>".$q['sell_tender']."</sup></td>";
                        echo "</tr>";
                    }
         echo "</tbody>
               </table>
            <br> 
        </div>";
    };?>