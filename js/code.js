var app = angular.module("absolute", []);
var arr;
//var table1Data=$('#table1').serializeArray();
//var table2Data=$('#table2').serializeArray();
//var formData=$('#form').serializeArray();



app.controller('currencyTables', function ($scope, $http) {

    $scope.tableOne = [];
    $scope.tableTwo = [];
    $scope.dataTime;


    $http.get('/HARDCODEJSON.json').then(function (data) {
        $scope.tableOne = data.data[0].data.filter(function (item) {
            return item.currency.indexOf("/") == -1;
        });
        
        $scope.tableTwo = data.data[0].data.filter(function (item) {
            return item.currency.indexOf("/") != -1;
        });
        
        $scope.dataTime = new Date($scope.tableOne[0].day_time);
        $scope.dataTime = $scope.dataTime.toLocaleString("ru");
    });



});

//function confirm(){
//    $("button").click(function(){
//        var x = $("form").serializeArray();
//        $.each(table1Data, function(i, field){
//            $("#results").append(field.name + ":" + field.value + " ");
//        });
//    });
//};
//    
//}