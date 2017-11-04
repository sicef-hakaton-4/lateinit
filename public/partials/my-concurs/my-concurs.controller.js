angular
    .module('app')
    .controller('MyConcursCtrl', MyConcursCtrl);

function MyConcursCtrl($scope, MyConcursService, Constants) {

    MyConcursService.getData().then(function(response) {
            $scope.concurs = response.entity;
            console.log($scope.concurs);
        },
        function(response){
        });

}