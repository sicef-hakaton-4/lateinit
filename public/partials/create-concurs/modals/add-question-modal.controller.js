angular
    .module('app')
    .controller('AddQuestionModalCtrl', AddQuestionModalCtrl);

function AddQuestionModalCtrl($scope, $uibModalInstance) {
    $scope.add = function(question) {
        $uibModalInstance.close(question);
    };

    $scope.cancel = function() {
        $uibModalInstance.dismiss('cancel');
    };
}