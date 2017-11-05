angular
    .module('app')
    .controller('ResultsConcursCtrl', ResultsConcursCtrl);

function ResultsConcursCtrl($scope, ResultsConcursService, $uibModal, $stateParams) {

    ResultsConcursService.getData($stateParams.id).then(function(response) {
            $scope.results = response.entity;
            console.log($scope.results);
        },
        function(response){
        });

    $scope.interview = function() {
        var modal = $uibModal.open({
            animation: true,
            templateUrl: 'partials/results-concurs/modals/send-interview.html',
            controller: 'SendInterviewModalCtrl',
            backdrop: true
            // resolve: {
            //     expert: function () {
            //         return expert;
            //     }
            // }
        });

        modal.result.then(function (question) {

        }, function (response) {
            console.log(response);
        });
    }
}