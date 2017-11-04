angular
    .module('app')
    .controller('FindExpertCtrl', FindExpertCtrl);

function FindExpertCtrl($scope, FindExpertService, Constants) {

    FindExpertService.getData().then(function(response) {
            $scope.experts = response.entity;
        },
        function(response){
        });
}