angular
    .module('app')
    .controller('ExpertConcursCtrl', ExpertConcursCtrl);

function ExpertConcursCtrl($scope, $state, ExpertConcursService) {

    ExpertConcursService.getData().then(function(response) {
            $scope.data = response.entity;
            console.log($scope.data);
        },
        function(response){
        });
}