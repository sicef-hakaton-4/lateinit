angular
    .module('app')
    .service('AuthService', AuthService);

function AuthService($q, $http, Constants, $localStorage, $rootScope) {
    function login(credentials) {
        var deferred = $q.defer();
        $http.post(Constants.ENDPOINT_URL + Constants.LOGIN_API, credentials)
            .then(function (response) {
                $localStorage.token = response.data.entity.token;
                $localStorage.user = response.data.entity.displayData;
                $rootScope.isLoggedIn = true;
                $rootScope.user = $localStorage.user;
                deferred.resolve(response.data);
            })
            .catch(function (error) {
                deferred.reject(error.data);
            });

        return deferred.promise;
    }

    function register(credentials) {
        var deferred = $q.defer();
        console.log(credentials);
        $http.post(Constants.ENDPOINT_URL + Constants.REGISTER_URL, credentials)
            .then(function (response) {
                $localStorage.token = response.data.entity.token;
                $localStorage.user = response.data.entity.displayData;
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
        login: login,
        register: register
    }
}