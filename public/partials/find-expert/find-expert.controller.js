angular
    .module('app')
    .controller('FindExpertCtrl', FindExpertCtrl);

function FindExpertCtrl($scope, FindExpertService, Constants, $state) {

    FindExpertService.getData().then(function(response) {
            $scope.experts = response.entity;
            console.log($scope.experts);
        },
        function(response){
        });

    $scope.singleViewExpert = function(id) {
        $state.go("menu.singleViewExpert", {id:id});
    }
}