angular
    .module('app')
    .controller('SingleViewExpertCtrl', SingleViewExpertCtrl);

function SingleViewExpertCtrl($scope, SingleViewExpertService, Constants, $stateParams) {

    SingleViewExpertService.getData($stateParams.id).then(function(response) {
            $scope.expert = response.entity;
            console.log($scope.expert);
        },
        function(response){
        });
}