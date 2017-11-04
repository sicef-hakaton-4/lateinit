angular
    .module('app')
    .controller('FirmRegisterCtrl', FirmRegisterCtrl);

function FirmRegisterCtrl($scope, $state, AuthService, ngToast) {
    $scope.years = [];
    for(var i = 2016; i > 1950; i--) {
        $scope.years.push(i);
    }
    $scope.isLoading = false;
    $scope.register = function(credentials) {
        credentials.type = 2;
        $scope.isLoading = true;
        AuthService.register(credentials)
            .then(function(response) {
                $scope.isLoading = false;
                ngToast.success({
                    content: response.message
                });
                $state.go('menu.profilefirm');
            })
            .catch(function() {
                $scope.isLoading = false;
            });
    }
}