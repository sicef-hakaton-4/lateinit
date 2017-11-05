angular
    .module('app')
    .controller('RecensionModal', RecensionModal);

function RecensionModal($scope, $uibModalInstance, AuthService, company) {
    $scope.company = company;
    $scope.add = function(recension) {
        recension.application_id = $scope.company.application_id;
        AuthService.recension(recension)
            .then(function(response) {
                $uibModalInstance.close(response);
            })
            .catch(function(response) {
                $uibModalInstance.close(response);
            });
    };

    $scope.cancel = function() {
        $uibModalInstance.dismiss('cancel');
    };
}