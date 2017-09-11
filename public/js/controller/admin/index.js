var objAplication = angular.module('AppAngular', []);
objAplication.controller('adminQuizController', function($scope,$http) {

    $scope.arrQuiz = [];


    $scope.objQuiz = {
        id:null,
        name:null,
        description:null,
        create_at:null,
        update_at:null
    }

    $scope.loadQuiz = function()
    {
        $http.get('/application/load').then(
            function sucesso(objRetorno){
                $scope.arrQuiz = objRetorno.data.arrQuiz;
            },
            function erro(objRetorno){

            }
        );
    }


    $scope.clearForm = function()
    {
        $scope.objQuiz = {
            id:null,
            name:null,
            description:null,
            create_at:null,
            update_at:null
        }
    }


    $scope.saveQuiz = function()
    {
        console.log($scope.objQuiz);
        $http.post('/admin/save',$scope.objQuiz).then(
            function sucesso(objRetorno){

            },
            function erro(objRetorno){
                alert('Desculpe ocorreu um erro e não foi possível salvar esse quiz.');
            }
        )
    }

});