var objAplication = angular.module('AppAngular', []);
objAplication.controller('adminQuizController', function($scope,$http) {


    $scope.formQuestion  ={
        subject:null,
        type_id:null,
        id:null,
        create_at:null,
        update_at:null,
    }
    $scope.saveQuestion = function()
    {
        console.log($scope.formQuestion);
    }


    $scope.arrType = []

    $scope.createType = function(ds_name,cd_id)
    {
        var arrType = {
            id:cd_id,
            name:ds_name
        }

        console.log(arrType);
        $scope.arrType.push(arrType);
    }
});