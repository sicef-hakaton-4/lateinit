angular
    .module('app')
    .controller('FindAJobCtrl', FindAJobCtrl);

function FindAJobCtrl($stateParams, $scope, FindAJobService, $state, $uibModal, ngToast) {
    if($stateParams.fromLogIn) {
        if($stateParams.fromLogIn.pera == 1) {
            var modal = $uibModal.open({
                animation: true,
                templateUrl: 'partials/recension-modal/recension-modal.html',
                controller: 'RecensionModal',
                backdrop: true,
                resolve: {
                    company: function () {
                        return $stateParams.fromLogIn;
                    }
                }
            });

            modal.result.then(function () {
                ngToast.success({
                    content: "Thank you for your time"
                });
            }, function (response) {
                console.log(response);
            });
        }
    }
    FindAJobService.getData().then(function(response) {
        $scope.jobs = response.entity;
        console.log($scope.jobs);
    },
    function(response){
    });

    $scope.singleViewJob = function(id) {
        $state.go("menu.singleViewJob", {id:id});
    }

}