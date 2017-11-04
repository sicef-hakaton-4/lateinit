angular
    .module('app')
    .controller('SingleViewJobCtrl', SingleViewJobCtrl);

function SingleViewJobCtrl($scope, SingleViewJobService, Constants, $stateParams) {

    SingleViewJobService.getData($stateParams.id).then(function(response) {
            $scope.job = response.entity;
            console.log($scope.job);
        },
        function(response){
        });
}