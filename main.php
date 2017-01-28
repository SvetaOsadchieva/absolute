<?php
include("connect.inc.php");
//include("func.inc.php");

?>

<!-- Currency table section Section -->
<section id="currency" class="container text-center">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2>КУРС ВАЛЮТ НА<br>
                <?php
                    $conn = new PDO("mysql:host=$host;dbname=$dbname", "$login", "$password");
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
                    $stmt = $conn->prepare("SELECT day_time 
                                        from main
                                        order by day_time DESC
                                        LIMIT 1");
                    $stmt->execute();
                    foreach($stmt as $q){
                    echo"<span>".$q['day_time']."</span></h2>";
                    }
                
                    $getFirstTable = $conn->prepare("SELECT * from main where currency='USD' or currency='EUR' or currency='RUB' order by day_time LIMIT 3");
                    
                     echo"<div style='overflow-x:auto;'>
                        <table class='table table-hover'>
                        <thead>
                        <tr>
                            <th class='th-first'></th>
                            <th>ПОКУПКА</th>
                            <th>ПРОДАЖА</th>
                        </tr>
                        </thead>
                        <tbody>";
        
                    $getFirstTable->execute();

                    foreach($getFirstTable as $q){
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
                
                
                     $getSecondTable = $conn->prepare("SELECT * from main where currency='USD/RUB' or currency='EUR/USD' order by day_time LIMIT 2");
                    
                     echo"<div style='overflow-x:auto;'>
                        <table class='table table-hover'>
                        <thead>
                        <tr>
                            <th class='th-first'></th>
                            <th>ПОКУПКА</th>
                            <th>ПРОДАЖА</th>
                        </tr>
                        </thead>
                        <tbody>";
        
                    $getSecondTable->execute();

                    foreach($getSecondTable as $q){
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
                    //getDate($conn);
                
//                    $getFirstTable = $conn->prepare("SELECT * from main where currency='USD' or currency='EUR' or currency='RUB' order by day_time LIMIT 3");
//                    getTable($conn, $getFirstTable);
//                
//                    $getSecondTable = $conn->prepare("SELECT * from main where currency='USD/RUB' or currency='EUR/USD' order by day_time LIMIT 2");
//                    getTable($conn, $getSecondTable);

                ?>
        </div>
    </div>
</section>
<!-- Social section -->
<section id="social" class="parallax">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="sec-title text-center white wow animated fadeInDown">
                    <h2>Почему выбирают нас ?</h2>
                    <br>
                    <br>
                    <div class="col-md-6"> <i class="fa fa-map-pin fa-2x " style="color:#009EE3"></i>
                        <p>Находимся в центре города</p>
                    </div>
                    <div class="col col-md-6"> <i class="fa fa-percent fa-2x " style="color:#009EE3"></i>
                        <p>Скидки постоянным клиентам</p>
                    </div>
                    <div class="col col-lg-8 col-lg-offset-2"> <i class="fa fa-2x">24</i><i class="fa fa-usd fa-2x" style="color:#009EE3"></i><i class="fa fa-2x">7</i>
                        <p>Работаем круглосуточно</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end Social section -->
<!-- Contact Section -->
<section id="contact" class="container content-section text-center">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2>Контакты</h2>
            <br>
            <br> </div>
        <div class="col-lg-10 col-lg-offset-1">
            <div class="col-sm-4 text-center"> <i class="fa fa-phone"> Телефоны:</i>
                <br>
                <br>
                <p> <a href="tel:+380577020426">+38(057) 702-04-26</a>
                    <br><a href="tel:+380994360909">+38(099) 436-09-09</a>
                    <br><a href="tel:+380932690707">+38(093) 269-07-07</a> </p>
            </div>
            <div class="col-sm-4 text-center"> <i class="fa fa-map-marker"> Адрес:</i>
                <br>
                <br>
                <p> <a href="#maps">Харьков, ул. Сумская 73</a>
                    <br> </p>
            </div>
            <div class="col-sm-4 text-center"> <i class="fa fa-envelope"> Почта:</i>
                <br>
                <br> <a href="mailto:sumskaya73.kh@gmail.com">sumskaya73.kh@gmail.com</a> </div>
        </div>
    </div>
</section>
<!-- Map Section -->
<section id="maps" class="map-image">
    <div class="place-photo">
        <a href="https://goo.gl/maps/rTMGwNQn6DH2">
            <div class="caption text-left"> <img src="img/place.JPG"> </div>
        </a>
    </div>
</section>
