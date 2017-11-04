angular
    .module('app')
    .controller('ResultsConcursCtrl', ResultsConcursCtrl);

function ResultsConcursCtrl($scope, ResultsConcursService, Constants, $stateParams) {

    ResultsConcursService.getData($stateParams.id).then(function(response) {
            $scope.results = response.entity;
            console.log($scope.results);
        },
        function(response){
        });
}