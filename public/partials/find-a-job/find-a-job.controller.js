angular
    .module('app')
    .controller('FindAJobCtrl', FindAJobCtrl);

function FindAJobCtrl($scope, FindAJobService, Constants) {

        FindAJobService.getData().then(function(response) {
            $scope.jobs = response.entity;
        },
        function(response){
        });

}