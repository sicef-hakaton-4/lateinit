angular
    .module('app')
    .controller('ProfilFirmCtrl', ProfilFirmCtrl);

function ProfilFirmCtrl($scope, ProfilFirmService, Constants) {

    ProfilFirmService.getData().then(function(response) {
            $scope.user = response.entity;
            console.log($scope.user);
        },
        function(response){
        });

}