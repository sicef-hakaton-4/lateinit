angular
    .module('app')
    .controller('ViewProfileFirmCtrl', ViewProfileFirmCtrl);

function ViewProfileFirmCtrl($scope, ViewProfileFirmService, Constants) {

    ViewProfileFirmService.getData().then(function(response) {
            $scope.user = response.entity;
            console.log($scope.user);
        },
        function(response){
        });

}