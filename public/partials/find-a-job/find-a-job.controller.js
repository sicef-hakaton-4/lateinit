angular
    .module('app')
    .controller('FindAJobCtrl', FindAJobCtrl);

function FindAJobCtrl($scope, FindAJobService, Constants, $state) {

    FindAJobService.getData().then(function(response) {
        $scope.jobs = response.entity;
        console.log($scope.jobs);
    },
    function(response){
    });

    $scope.singleViewJob = function(id) {
        console.log(id);
        $state.go("menu.singleViewJob");
    }

}