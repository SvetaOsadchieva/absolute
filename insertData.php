<?php 
    include("connect.inc.php");

    $conn = new PDO("mysql:host=$host;dbname=$dbname", "$login", "$password");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
    $conn->exec("set names utf8");	
    $conn->exec("set names latin1");      
 
    $data = json_decode($_POST['data'], true);


    $currency = $data['currency']; 

    $td_buy = $data['td_buy'];
    $buy = $data['buy'];
    $buy_tender = $data['buy_tender'];

    $td_sell = $data['td_sell'];
    $sell = $data['sell'];
    $sell_tender = $data['sell_tender'];

    $day_time = $data['day_time'];

    $rInsert = "INSERT INTO main VALUES ('$currency', '$td_buy', $buy, '$buy_tender', '$td_sell', $sell, '$sell_tender', '$day_time')";
 
 	
    $result= $conn->exec($rInsert);	

    var_dump($result);
    
    $conn = null; 
?>