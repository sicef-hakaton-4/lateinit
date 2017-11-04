angular
    .module('app')
    .controller('ExpertRegisterCtrl', ExpertRegisterCtrl);

function ExpertRegisterCtrl($scope, $state, AuthService, ngToast) {
    $scope.isLoading = false;
    $scope.register = function(credentials) {
        credentials.type = 1;
        $scope.isLoading = true;
        AuthService.register(credentials)
            .then(function(response) {
                $scope.isLoading = false;
                ngToast.success({
                    content: response.message
                });

                $state.go('menu.profileexpert');
            })
            .catch(function() {
                $scope.isLoading = false;
            });
    }
}