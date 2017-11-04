angular
    .module('app')
    .controller('LoginCtrl', LoginCtrl);

function LoginCtrl($scope, AuthService) {
    $scope.isLoading = false;
    $scope.login = function(credentials) {
        $scope.isLoading = true;
        AuthService.login(credentials)
            .then(function(response) {
                $scope.isLoading = false;
                ngToast.success({
                    content: response.message
                });
                $state.go('menu.home');
            })
            .catch(function() {
                $scope.isLoading = false;
            });
    }
}