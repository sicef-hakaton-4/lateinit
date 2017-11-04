angular
    .module('app')
    .controller('LoginCtrl', LoginCtrl);

function LoginCtrl($scope, AuthService, ngToast, $state, Constants) {
    $scope.isLoading = false;
    $scope.login = function(credentials) {
        $scope.isLoading = true;
        AuthService.login(credentials)
            .then(function(response) {
                $scope.isLoading = false;
                ngToast.success({
                    content: response.message
                });

                if(response.entity.displayData.type == Constants.EXPERT_ROLE) {
                    $state.go('menu.findjob');
                } else {
                    $state.go('menu.createconcurs');
                }
            })
            .catch(function() {
                $scope.isLoading = false;
            });
    }
}