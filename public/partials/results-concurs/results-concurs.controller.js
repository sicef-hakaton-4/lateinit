angular
    .module('app')
    .controller('ResultsConcursCtrl', ResultsConcursCtrl);

function ResultsConcursCtrl($scope, ResultsConcursService, Constants) {

    ResultsConcursService.getData().then(function(response) {
            $scope.results = response.entity;
            console.log($scope.results);
        },
        function(response){
        });
}