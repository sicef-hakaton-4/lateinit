angular
    .module('app')
    .controller('SendInterviewModalCtrl', SendInterviewModalCtrl);

function SendInterviewModalCtrl($scope, $uibModalInstance, params, ResultsConcursService) {
    $scope.params = params;
    $scope.send = function(data) {
        $scope.params.date = data.date;
        ResultsConcursService.sendInterview($scope.params)
            .then(function(response) {
                    $uibModalInstance.close(data);
                },
                function(response) {
                    $uibModalInstance.dismiss(data);
                });
    };

    $scope.cancel = function() {
        $uibModalInstance.dismiss('cancel');
    };
}