<?php 
    include("connect.inc.php");

    $conn = new PDO("mysql:host=$host;dbname=$dbname", "$login", "$password");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
    $conn->exec("set names utf8");	
    $conn->exec("set names latin1");



    $stmt = $conn->prepare("select now() as day_time");
    $stmt->execute();
    foreach($stmt as $q){
    $day_time = $q['day_time'];
        
//    echo "<p>$q['day_time']</p>";    
    }


    $data = json_decode($_POST['data'], true);
    print_r($data);
    
   
    

//    foreach($data as $key => $row) {
//        
//    $currency = $row['currency']; 
//
//    $td_buy = $row['td_buy'];   
//    $buy = $row['buy'];
//    $buy_tender = $row['buy_tender'];
//
//    $td_sell = $row['td_sell'];
//    $sell = $row['sell'];
//    $sell_tender = $row['sell_tender'];
//
////    $day_time = $row['day_time'];
//    $rInsert = "INSERT INTO main VALUES ('$currency', '$td_buy', $buy, '$buy_tender', '$td_sell', $sell, '$sell_tender', $day_time)";
//    $result= $conn->exec($rInsert);	
//        
//    var_dump($result);
//        
//    }

   
    $i=0;
    while($i < count($data) )
    {
        
    $currency = $data[$i]['currency']; 

    $td_buy = $data[$i]['td_buy'];
    $buy = $data[$i]['buy'];
    $buy_tender = $data[$i]['buy_tender'];

    $td_sell = $data[$i]['td_sell'];
    $sell = $data[$i]['sell'];
    $sell_tender = $data[$i]['sell_tender'];
   
    print_r($i);
    print_r(" currency = ");
    print_r($data[$i]['currency']); 
        
    print_r(" td_buy = ");
    print_r($data[$i]['td_buy']);
    print_r(" buy = ");
    print_r($data[$i]['buy']);
        
    print_r(" buy_tender = ");
    print_r($data[$i]['buy_tender']);
        
    print_r(" td_sell = ");
    print_r($data[$i]['td_sell']);
        
        
        
    print_r(" sell = ");
    print_r($data[$i]['sell']);
        
    print_r(" sell_tender = "); 
    print_r($data[$i]['sell_tender']);
        
    print_r(" day_time = ");
    print_r($day_time);
        

    $rInsert = "INSERT INTO main VALUES ('$currency', '$td_buy', $buy, '$buy_tender', '$td_sell', $sell, '$sell_tender', '$day_time')";
//    $conn->exec($rInsert);    
    $result= $conn->exec($rInsert);	
        
    var_dump($result);
    $i++;    
    }
    
    $conn = null; 
?>