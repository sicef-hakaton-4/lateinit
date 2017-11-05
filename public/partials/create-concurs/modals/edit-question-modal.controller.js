angular
    .module('app')
    .controller('EditQuestionModalCtrl', EditQuestionModalCtrl);

function EditQuestionModalCtrl($scope, $uibModalInstance, question) {
    $scope.question = question;
    $scope.edit = function(question) {
        $uibModalInstance.close(question);
    };

    $scope.cancel = function() {
        $uibModalInstance.dismiss('cancel');
    };
}