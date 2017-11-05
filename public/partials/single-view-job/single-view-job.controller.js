angular
    .module('app')
    .controller('SingleViewJobCtrl', SingleViewJobCtrl);

function SingleViewJobCtrl($scope, SingleViewJobService, $stateParams, $state) {

    SingleViewJobService.getData($stateParams.id).then(function(response) {
            $scope.job = response.entity;
            console.log($scope.job);
        },
        function(response){
        });

    $scope.goTest = function() {
        $state.go('menu.testquestions', {id: $stateParams.id});
    }
}