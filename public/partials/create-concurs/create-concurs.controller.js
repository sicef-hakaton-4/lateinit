angular
    .module('app')
    .controller('CreateConcursCtrl', CreateConcursCtrl);

function CreateConcursCtrl($scope, CreateConcursService, Constants) {

    $scope.createConcurs = function(concursData) {
        CreateConcursService.createConcurs(concursData).then(function(response) {
                $scope.concursData = response.entity;
                console.log($scope.concursData);
            },
            function(response){
            });
    }
}