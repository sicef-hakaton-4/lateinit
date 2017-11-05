angular
    .module('app')
    .controller('RecensionModal', RecensionModal);

function RecensionModal($scope, $uibModalInstance, AuthService, appId) {
    $scope.add = function(recension) {
        recension.application_id = appId;
        AuthService.recension(recension)
            .then(function(response) {
                $uibModalInstance.close(question);
            })
            .catch(function() {
                $uibModalInstance.close(question);
            });
    };

    $scope.cancel = function() {
        $uibModalInstance.dismiss('cancel');
    };
}