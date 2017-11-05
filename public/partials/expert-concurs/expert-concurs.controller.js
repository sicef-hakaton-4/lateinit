angular
    .module('app')
    .controller('ExpertConcursCtrl', ExpertConcursCtrl);

function ExpertConcursCtrl($scope, $state, ExpertConcursService) {

    ExpertConcursService.getData().then(function(response) {
            $scope.openings = response.entity.openings;
            console.log($scope.openings);
        },
        function(response){
        });
}