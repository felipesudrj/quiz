var objAplication = angular.module('AppAngular', []);
objAplication.controller('adminQuizController', function($scope,$http) {

    $scope.arrType = []
    $scope.arrQuestion = [];
    $scope.question_id = null;
    $scope.formQuestion  ={
        subject:null,
        type_id:null,
        id:null,
        create_at:null,
        update_at:null,
    }


    $scope.clearForm = function()
    {
        $scope.formQuestion  ={
            subject:null,
            type_id:null,
            id:null,
            create_at:null,
            update_at:null,
        }
    }


    $scope.saveQuestion = function()
    {

        var ds_url = "/admin/save-question/"+$scope.question_id;
        $http.post(ds_url,$scope.formQuestion).then(
            function sucesso(objRetorno){
                console.log(objRetorno);
            },
            function erro(objRetorno){
                console.log(objRetorno);
            }
        );
    }




    $scope.setArrType = function(ds_name,cd_id)
    {
        var arrType = {
            id:cd_id,
            name:ds_name
        }

        console.log(arrType);
        $scope.arrType.push(arrType);
    }


    $scope.loadQuestion = function()
    {
        var ds_url = "/admin/load-question/"+$scope.question_id;
        $http.get(ds_url).then(
            function sucesso(objRetorno)
            {
                if(objRetorno.data.sn_status == true){
                    $scope.arrQuestion = objRetorno.data.arrQuestion;
                }
            },
            function erro(objRetorno)
            {
                console.log(objRetorno);
            }
        );
    }
});