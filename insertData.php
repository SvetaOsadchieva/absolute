<?php 
    include("connect.inc.php");

    $conn = new PDO("mysql:host=$host;dbname=$dbname", "$login", "$password");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
    $conn->exec("set names utf8");	
    $conn->exec("set names latin1");      
    
    $data = json_decode($_POST['data'], true);

    foreach($data as $row) {
    $currency = $row['currency']; 

    $td_buy = $row['td_buy'];
    $buy = $row['buy'];
    $buy_tender = $row['buy_tender'];

    $td_sell = $row['td_sell'];
    $sell = $row['sell'];
    $sell_tender = $row['sell_tender'];

    $day_time = $row['day_time'];

    $rInsert = "INSERT INTO main VALUES ('$currency', '$td_buy', $buy, '$buy_tender', '$td_sell', $sell, '$sell_tender', $day_time )";
    $result= $conn->exec($rInsert);	
    var_dump($result);
    }

//    var_dump($result);
    
    $conn = null; 
?>