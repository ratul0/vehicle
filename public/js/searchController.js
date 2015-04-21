(function(){
    var app = angular.module('app',[]);
    app.controller('searchController',["$scope","$http",function($scope,$http){
        $scope.message = "Hello";
        var url = "http://localhost/pro/vehicle/public/cars";
        var OnCarComplete = function (response) {
           $scope.cars = response.data;
        };
        var OnError = function(response){
            $scope.errors = "Cars Not Found.";
        };
        $http.get(url).then(OnCarComplete,OnError);
    }]);
}());
