angular
    .module('app')
    .controller('GlobalController', GlobalController);

function GlobalController($scope, $rootScope, $state, ngToast, $localStorage, Constants) {
    $scope.logout = function () {
        delete $localStorage.token;
        delete $localStorage.user;
        $rootScope.isLoggedIn = false;
        $rootScope.user = {};
        ngToast.success({
            content: Constants.LOGOUT_MESSAGE
        });
        $state.go('menu.home');
    }
}