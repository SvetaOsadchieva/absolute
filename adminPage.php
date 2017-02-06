<?php
session_start(); 
if($_SESSION['username'] != 'admin'){
      header("location: newlogin.php");
}

include("connect.inc.php");
include("headerAdmin.php");    



?>

 <section id="currency" class="container text-center">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <form id="form" method="post">
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
                
                    $getFirstTable = $conn->prepare("SELECT * from main where currency='USD' or currency='EUR' or currency='RUB' order by day_time DESC LIMIT 3");
                    
                
            
                    $tenderOptions = array("up","down");
                

                    function createSelect($options, $dbValue, $name){
                        echo " <div class='col-lg-4'> <select value='$dbValue' name='$name' class='custom-select form-control'>";
                        foreach($options as $option){
                            if($dbValue == $option){
                                echo "<option value='$option' selected>$option</option>";
                            }
                            else if($option == ""){
                                if($dbValue == ""){
                                    echo "<option disabled selected value>$option</option>";
                                }
                                else{
                                    echo "<option disabled value>$option</option>";         
                                }                                       
                            }
                            else{
                                echo "<option value='$option'>$option</option>";
                            }

                        }
                        echo "</select></div>";
                    }
                        
                
                         echo"<div style='overflow-x:auto;'>
                        <table class='table table-hover' >
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
                        echo"<td><input class='form-control' type='text' value=".$q['currency']." name='currency' ></td>";
                        
                        echo"<td>";
                        createSelect($tenderOptions, $q['td_buy'],'td_buy');
                        echo "<div class='col-lg-4'>
                                    <input class='form-control' type='number' step='0.01' value=".$q['buy']." id='example-number-input' name='buy'> 
                                </div>
                                <div class='col-lg-4'>
                                    <input class='form-control' type='text' value=".$q['buy_tender']." name='buy_tender'> 
                                </div>
                            </td>";
                        echo"<td>";
                        createSelect($tenderOptions, $q['td_sell'],'td_sell');
                        echo "<div class='col-lg-4'>
                                    <input class='form-control' type='number' step='0.01' value=".$q['sell']." id='example-number-input' name='sell'>
                                </div>
                                <div class='col-lg-4'>
                                    <input class='form-control' type='text' value=".$q['sell_tender']." name='sell_tender'> 
                                </div>
                                
                            </td>
                                    <input type='hidden' name='day_time' value=".$q['day_time'].">";
                        echo"</tr>";
                    };
                        
                        
                        
                        
                     $getSecondTable = $conn->prepare("SELECT * from main where currency='USD/RUB' or currency='EUR/USD' order by day_time DESC LIMIT 2");
                        
                        echo"<div style='overflow-x:auto;'>
                        <table class='table table-hover' id='table2'>
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
                        echo"<td><input class='form-control' type='text' value=".$q['currency']." name='currency'></td>";
                        echo"<td>";
                        createSelect($tenderOptions, $q['td_buy'],'td_buy');
                        echo "<div class='col-lg-4'>
                                    <input class='form-control' type='number' step='0.01' value=".$q['buy']." id='example-number-input' name='buy'> 
                                </div>
                                <div class='col-lg-4'>
                                    <input class='form-control' type='text' value=".$q['buy_tender']." name='buy_tender'> 
                                </div>
                            </td>";
                        echo"<td>";
                        createSelect($tenderOptions, $q['td_sell'],'td_sell');
                        echo "<div class='col-lg-4'>
                                    <input class='form-control' type='number' step='0.01' value=".$q['sell']." id='example-number-input' name='sell'>
                                </div>
                                <div class='col-lg-4'>
                                    <input class='form-control' type='text' value=".$q['sell_tender']." name='sell_tender'> 
                                </div>
                            </td>
                                    <input type='hidden' name='day_time' value=".$q['day_time'].">";
                        echo"</tr>";
                    };
         
                        ?>

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
                        
                    
        <!--Confirm section-->
<div class="row" id="confirm">
    <button id="confirmBtn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Обновить</button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLongTitle">Обновить курс</h2>
                    <button type="button" id="closeModal" class="close cancel" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class='modal-body'>
                <div id="results"></div>
                                
<script>
    $(document).ready(function () {
        $("#confirmBtn").click(function () {
            var formData = $("form").serializeArray();
            var tableData = "";
            $("#results").append(tableData);
            tableData = "<div style='overflow-x:auto'><table class='table table-hover'><thead><tr><th></th><th>ПОКУПКА</th><th>ПРОДАЖА</th></tr></thead><tbody>";
            $.each(formData, function (i, field) {
                switch (field.name) {
                case "currency":
                    tableData += "<tr><td>" + field.value + " </td>";
                    break;
                case "td_buy":
                    tableData += "<td><i class='fa fa-long-arrow-" + field.value + " fa-lg " + field.value + "'></i>";
                    break;
                case "buy":
                    tableData += " " + field.value + " ";
                    break;
                case "buy_tender":
                    tableData += "<sup>" + field.value + "</sup></td>";
                    break;
                case "td_sell":
                    tableData += "<td><i class='fa fa-long-arrow-" + field.value + " fa-lg " + field.value + "'></i>";
                    break;
                case "sell":
                    tableData += " " + field.value + " ";
                    break;
                case "sell_tender":
                    tableData += "<sup>" + field.value + "</sup></td></tr>";
                    break;
                }
            });
            tableData += "</tbody></table><br>";
            $("#results").append(tableData);
        });
        $(".cancel").click(function () {
            $('#results').html('');
        });$("#closeModal").click(function () {
                location.reload();
        });
        $('#submitBtn').click(function () {
            var data = []
                , rowChildren;
            for (var i = 0; i < $('tr').length; i++) {
                var rowObj = {};
                rowChildren = $('tr').eq(i).find('input, select');
                if (rowChildren.length < 6) continue;
                for (var j = 0; j < rowChildren.length; j++) {
                    rowObj[$(rowChildren[j]).attr('name')] = $(rowChildren[j]).val();
                }
                data.push(rowObj);
            }
            
            console.log(data);
            data = JSON.stringify(data);
            console.log(data);
            $.ajax({
                url: "insertData.php"
                , type: "POST"
                , data: {'data': data}
                , dataType: "json"
                , cache: false
                , success: alert("Данные обновлены")
                ,
            }).done(function (response) {
//                $("#form").table("refresh");
//                alert("Данные обновлены");
//                location.reload();
            });
        });
    });
</script>
             

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Отменить</button>
                    <button type="button" class="btn btn-primary" id="submitBtn">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<?php
    include("footer.php");    

?>