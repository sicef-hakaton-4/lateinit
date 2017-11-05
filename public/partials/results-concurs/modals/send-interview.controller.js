angular
    .module('app')
    .controller('SendInterviewModalCtrl', SendInterviewModalCtrl);

function SendInterviewModalCtrl($scope, $uibModalInstance) {
    // $scope.expert = expert;
    $scope.send = function(data) {
        $uibModalInstance.close(data);
    };

    $scope.cancel = function() {
        $uibModalInstance.dismiss('cancel');
    };
}