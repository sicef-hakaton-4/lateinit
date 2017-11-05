angular
    .module('app')
    .controller('SingleViewExpertCtrl', SingleViewExpertCtrl);

function SingleViewExpertCtrl($scope, SingleViewExpertService, Constants, $stateParams, ngToast) {

    SingleViewExpertService.getData($stateParams.id).then(function(response) {
            $scope.expert = response.entity;
            console.log($scope.expert);
        },
        function(response){
        });

    $scope.sendMail = function(id, message) {
        ngToast.success({
            content: "Successfully sent!"
        });
    }
}