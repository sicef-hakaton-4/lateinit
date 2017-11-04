angular
    .module('app')
    .service('AuthService', AuthService);

function AuthService($q, $http, Constants) {
    function login(credentials) {
        var deferred = $q.defer();
        $http.post(Constants.ENDPOINT_URL + Constants.LOGIN_API, credentials)
            .then(function (response) {
                $localStorage.token = response.data.entity.token;
                $localStorage.user = response.data.entity.user;
                $rootScope.isLoggedIn = true;
                $rootScope.user = $localStorage.user;
                deferred.resolve(response.data);
            })
            .catch(function (error) {
                deferred.reject(error.data);
            });

        return deferred.promise;
    }

    return {
        login: login
    }
}