angular
    .module('app')
    .controller('FirmRegisterCtrl', FirmRegisterCtrl);

function FirmRegisterCtrl($scope, $state, AuthService, Constants, ngToast) {
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