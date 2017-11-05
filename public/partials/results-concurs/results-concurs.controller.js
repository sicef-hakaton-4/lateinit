angular
    .module('app')
    .controller('ResultsConcursCtrl', ResultsConcursCtrl);

function ResultsConcursCtrl($scope, ResultsConcursService, $uibModal, $stateParams, ngToast) {

    ResultsConcursService.getData($stateParams.id)
        .then(function(response) {
            $scope.concurs = response.entity;
        },
        function(response){
        });

    $scope.interview = function(expertId) {
        var params = {
            expert_id: expertId,
            opening_id: $scope.concurs.id
        };
        var modal = $uibModal.open({
            animation: true,
            templateUrl: 'partials/results-concurs/modals/send-interview.html',
            controller: 'SendInterviewModalCtrl',
            backdrop: true,
            resolve: {
                params: function () {
                    return params;
                }
            }
        });

        modal.result.then(function () {
            ngToast.success({
                content: "Invite for interview successfully sent"
            });
        }, function (response) {
            console.log(response);
        });
    }
}