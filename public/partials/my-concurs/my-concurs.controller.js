angular
    .module('app')
    .controller('MyConcursCtrl', MyConcursCtrl);

function MyConcursCtrl($scope, MyConcursService, Constants, $state) {

    MyConcursService.getData().then(function(response) {
            $scope.concurs = response.entity.openings;
            console.log($scope.concurs);
        },
        function(response){
        });

    $scope.seeOpening = function(id) {
        $state.go("menu.resultsConcurs", {id:id});
    }

}